<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Instituciones;
use App\Models\AdminInstServ;
use App\Models\Servicios;
use App\Models\Proveedor;
use App\Models\Region;
use App\Models\TipoProducto;

class ProveedoresController extends Controller
{
    //
    public function index(){
        try {
            //code...
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;

            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }

            $regiones = Region::orderBy('nombre')->get();

            // Obtener proveedores sin JOIN (id_tipo_producto es JSON)
            $proveedores = Proveedor::where('id_institucion', $institucion->id)
                ->where('id_tipo_proveedor', 0) // 0 para proveedores no distribucion
                ->orderBy('id', 'asc')
                ->get();

            // Obtener todos los IDs de productos únicos
            $todos_ids_productos = $proveedores
                ->flatMap(function($p) {
                    $ids = $p->id_tipo_producto ?? [];
                    // Convertir a array si es string/integer (compatibilidad con datos antiguos)
                    return is_array($ids) ? $ids : [$ids];
                })
                ->unique()
                ->toArray();

            // Obtener todos los productos en una sola query
            $productos_map = TipoProducto::whereIn('id', $todos_ids_productos)
                                          ->pluck('nombre', 'id')
                                          ->toArray();

            // Asignar los nombres a cada proveedor
            $proveedores = $proveedores->map(function($proveedor) use ($productos_map) {
                $ids = $proveedor->id_tipo_producto ?? [];
                // Convertir a array si es string/integer (compatibilidad con datos antiguos)
                $ids_array = is_array($ids) ? $ids : [$ids];
                $nombres = array_map(function($id) use ($productos_map) {
                    return $productos_map[$id] ?? 'N/A';
                }, $ids_array);
                $proveedor->tipo_producto = implode(', ', $nombres);
                return $proveedor;
            });

            $tipo_producto = TipoProducto::where('id_tipo_institucion', $institucion->id_tipo_institucion)->get();

            return view('app.bodega.proveedores',[
                'region' => $regiones,
                'proveedores' => $proveedores,
                'tipo_producto' => $tipo_producto,
                'institucion' => $institucion,
                'tipo_institucion' => $tipo_institucion
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function guardarProveedor(Request $req){

        $tipoProveedor = (int) ($req->tipo_proveedor ?? 1);
        $esInternacional = $tipoProveedor === 2;

        $reglas = [
            'id_institucion' => 'required',
            'nombre_prov' => 'required',
            'prov_prod' => 'required|array|min:1',
            'prov_prod.*' => 'integer|exists:tipo_producto,id',
            'email' => 'required|email',
            'tipo_proveedor' => 'required|in:1,2'
        ];

        if ($esInternacional) {
            $reglas = array_merge($reglas, [
                'pais_internacional' => 'required|not_in:0',
                'ciudad_internacional' => 'required',
                'sitio_web_internacional' => 'nullable|url',
                'referencias_internacionales' => 'required',
                'contacto_internacional' => 'required'
            ]);
        } else {
            $reglas = array_merge($reglas, [
                'direccion' => 'required',
                'rut' => 'required',
                'telefono' => 'required',
                'numero' => 'required',
                'rol' => 'required',
                'comunas' => 'required',
                'region_agregar' => 'required'
            ]);
        }

        $req->validate($reglas, [
            'id_institucion.required' => 'El campo institución es obligatorio',
            'nombre_prov.required' => 'El campo nombre es obligatorio',
            'prov_prod.required' => 'Debe seleccionar al menos un producto',
            'prov_prod.array' => 'Los productos deben ser un array válido',
            'prov_prod.min' => 'Debe seleccionar al menos un producto',
            'prov_prod.*.integer' => 'Cada producto debe ser un ID válido',
            'prov_prod.*.exists' => 'Uno o más productos no existen',
            'tipo_proveedor.required' => 'El campo tipo de proveedor es obligatorio',
            'tipo_proveedor.in' => 'El tipo de proveedor no es válido',
            'direccion.required' => 'El campo dirección es obligatorio',
            'rut.required' => 'El campo rut es obligatorio',
            'telefono.required' => 'El campo teléfono es obligatorio',
            'numero.required' => 'El campo número es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe tener un formato válido',
            'rol.required' => 'El campo rol es obligatorio',
            'comunas.required' => 'El campo comuna es obligatorio',
            'region_agregar.required' => 'El campo región es obligatorio',
            'pais_internacional.required' => 'El campo país es obligatorio para proveedores internacionales',
            'pais_internacional.not_in' => 'Debe seleccionar un país válido',
            'ciudad_internacional.required' => 'El campo ciudad/estado es obligatorio para proveedores internacionales',
            'sitio_web_internacional.url' => 'El sitio web internacional debe tener un formato válido (https://...)',
            'referencias_internacionales.required' => 'Debe ingresar una referencia comercial internacional',
            'contacto_internacional.required' => 'Debe ingresar un contacto internacional'
        ]);

        $proveedor = new Proveedor();
        $proveedor->id_institucion = $req->id_institucion;
        $proveedor->nombre = $req->nombre_prov;

        // Guardar productos como JSON en id_tipo_producto
        $productos = $req->input('prov_prod', []);
        $proveedor->id_tipo_producto = json_encode($productos);

        if ($esInternacional) {
            $proveedor->direccion = trim(($req->ciudad_internacional ?? '') . ', ' . ($req->pais_internacional ?? ''));
            $proveedor->rut = $req->rut ?? 'SIN-RUT';
            $proveedor->telefono = $req->telefono ?? ($req->telefono_opcional ?? 'N/A');
            $proveedor->rol_tributario = $req->rol ?? null;
            $proveedor->id_comuna = (int) ($req->comunas ?? 0);
            $proveedor->id_region = (int) ($req->region_agregar ?? 0);

            if (Schema::hasColumn('proveedores', 'tipo_procedencia')) {
                $proveedor->tipo_procedencia = 2;
                $proveedor->pais_internacional = $req->pais_internacional;
                $proveedor->ciudad_internacional = $req->ciudad_internacional;
                $proveedor->sitio_web_internacional = $req->sitio_web_internacional;
                $proveedor->referencias_internacionales = $req->referencias_internacionales;
                $proveedor->contacto_internacional = $req->contacto_internacional;
            }

            // Compatibilidad con esquema legacy.
            $proveedor->otro = $req->sitio_web_internacional;
            $proveedor->otro2 = json_encode([
                'pais_internacional' => $req->pais_internacional,
                'ciudad_internacional' => $req->ciudad_internacional,
                'referencias_internacionales' => $req->referencias_internacionales,
                'contacto_internacional' => $req->contacto_internacional
            ], JSON_UNESCAPED_UNICODE);
        } else {
            $proveedor->direccion = $req->direccion;
            $proveedor->rut = $req->rut;
            $proveedor->telefono = $req->telefono;
            $proveedor->rol_tributario = $req->rol;
            $proveedor->id_comuna = $req->comunas;
            $proveedor->id_region = $req->region_agregar;

            if (Schema::hasColumn('proveedores', 'tipo_procedencia')) {
                $proveedor->tipo_procedencia = 1;
                $proveedor->pais_internacional = null;
                $proveedor->ciudad_internacional = null;
                $proveedor->sitio_web_internacional = null;
                $proveedor->referencias_internacionales = null;
                $proveedor->contacto_internacional = null;
            }

            $proveedor->otro = null;
            $proveedor->otro2 = null;
        }

        $proveedor->email = $req->email;
        // 1 corresponde al grupo "distribución" (nacional e internacional).
        $proveedor->id_tipo_proveedor = 1;
        $proveedor->save();

        return redirect()->back()->with('success', 'Proveedor agregado correctamente');
    }

    public function eliminarProveedor(Request $req){
        try {

            //code...
            $proveedor = Proveedor::find($req->id);
            $proveedor->delete();
            return ['mensaje' => 'OK'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function guardarProveedorCompras(Request $req){
        try {
            //code...
            // preguntar si existe el proveedor
            $proveedor = Proveedor::where('rut', $req->rut)->first();
            if($proveedor){
                return ['mensaje' => 'El proveedor ya existe'];
            }
            $proveedor = new Proveedor();
            $proveedor->nombre = $req->nombre;
            $proveedor->id_tipo_producto = $req->tipo_producto;
            $proveedor->direccion = $req->direccion;
            $proveedor->rut = $req->rut;
            $proveedor->telefono = $req->telefono;
            $proveedor->email = $req->email;
            $proveedor->id_comuna = $req->idcomuna;
            $proveedor->id_region = $req->idregion;
            $proveedor->save();

            $proveedores = $this->dameProveedores();
            return ['mensaje' => 'OK', 'proveedores' => $proveedores];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    private function dameProveedores(){
        // Obtener proveedores sin JOIN (id_tipo_producto es JSON)
        $proveedores = Proveedor::get();

        // Obtener todos los IDs de productos únicos
        $todos_ids_productos = $proveedores
            ->flatMap(function($p) {
                $ids = $p->id_tipo_producto ?? [];
                // Convertir a array si es string/integer (compatibilidad con datos antiguos)
                return is_array($ids) ? $ids : [$ids];
            })
            ->unique()
            ->toArray();

        // Obtener todos los productos en una sola query
        $productos_map = TipoProducto::whereIn('id', $todos_ids_productos)
                                      ->pluck('nombre', 'id')
                                      ->toArray();

        // Asignar los nombres a cada proveedor
        $proveedores = $proveedores->map(function($proveedor) use ($productos_map) {
            $ids = $proveedor->id_tipo_producto ?? [];
            // Convertir a array si es string/integer (compatibilidad con datos antiguos)
            $ids_array = is_array($ids) ? $ids : [$ids];
            $nombres = array_map(function($id) use ($productos_map) {
                return $productos_map[$id] ?? 'N/A';
            }, $ids_array);
            $proveedor->tipo_producto = implode(', ', $nombres);
            return $proveedor;
        });

        return $proveedores;
    }

    public function getProveedor($id){
        $proveedor = Proveedor::find($id);

        // Obtener los IDs de productos como array limpio
        $proveedor->productos_ids = $proveedor->getProductosIds();

        // Obtener los objetos de TipoProducto completos
        $proveedor->productos = $proveedor->tiposProducto();

        return json_encode($proveedor);
    }

    public function editarProveedor(Request $req){

        $tipoProveedor = (int) ($req->tipo_proveedor_editar ?? 1);
        $esInternacional = $tipoProveedor === 2;

        $reglas = [
            'id_proveedor' => 'required',
            'nombre' => 'required',
            'prov_prod_' => 'required|array|min:1',
            'prov_prod_.*' => 'integer|exists:tipo_producto,id',
            'email' => 'required|email',
            'tipo_proveedor_editar' => 'required|in:1,2'
        ];

        if ($esInternacional) {
            $reglas = array_merge($reglas, [
                'pais_internacional_editar' => 'required|not_in:0',
                'ciudad_internacional_editar' => 'required',
                'sitio_web_internacional_editar' => 'nullable|url',
                'referencias_internacionales_editar' => 'required',
                'contacto_internacional_editar' => 'required'
            ]);
        } else {
            $reglas = array_merge($reglas, [
                'direccion' => 'required',
                'rut' => 'required',
                'telefono' => 'required',
                'rol_' => 'required',
                'comunas_editar' => 'required',
                'region_editar' => 'required'
            ]);
        }

        $req->validate($reglas);

        $proveedor = Proveedor::find($req->id_proveedor);
        $proveedor->nombre = $req->nombre;

        // Guardar múltiples productos como JSON en id_tipo_producto
        $productos = $req->input('prov_prod_', []);
        $proveedor->id_tipo_producto = json_encode($productos);

        $proveedor->email = $req->email;

        if ($esInternacional) {
            $proveedor->direccion = trim(($req->ciudad_internacional_editar ?? '') . ', ' . ($req->pais_internacional_editar ?? ''));
            $proveedor->rut = $req->rut ?? 'SIN-RUT';
            $proveedor->telefono = $req->telefono ?? 'N/A';
            $proveedor->rol_tributario = $req->rol_ ?? null;
            $proveedor->id_comuna = (int) ($req->comunas_editar ?? 0);
            $proveedor->id_region = (int) ($req->region_editar ?? 0);

            if (Schema::hasColumn('proveedores', 'tipo_procedencia')) {
                $proveedor->tipo_procedencia = 2;
                $proveedor->pais_internacional = $req->pais_internacional_editar;
                $proveedor->ciudad_internacional = $req->ciudad_internacional_editar;
                $proveedor->sitio_web_internacional = $req->sitio_web_internacional_editar;
                $proveedor->referencias_internacionales = $req->referencias_internacionales_editar;
                $proveedor->contacto_internacional = $req->contacto_internacional_editar;
            }

            $proveedor->otro = $req->sitio_web_internacional_editar;
            $proveedor->otro2 = json_encode([
                'pais_internacional' => $req->pais_internacional_editar,
                'ciudad_internacional' => $req->ciudad_internacional_editar,
                'referencias_internacionales' => $req->referencias_internacionales_editar,
                'contacto_internacional' => $req->contacto_internacional_editar
            ], JSON_UNESCAPED_UNICODE);
        } else {
            $proveedor->direccion = $req->direccion;
            $proveedor->rut = $req->rut;
            $proveedor->telefono = $req->telefono;
            $proveedor->rol_tributario = $req->rol_;
            $proveedor->id_comuna = $req->comunas_editar;
            $proveedor->id_region = $req->region_editar;

            if (Schema::hasColumn('proveedores', 'tipo_procedencia')) {
                $proveedor->tipo_procedencia = 1;
                $proveedor->pais_internacional = null;
                $proveedor->ciudad_internacional = null;
                $proveedor->sitio_web_internacional = null;
                $proveedor->referencias_internacionales = null;
                $proveedor->contacto_internacional = null;
            }

            $proveedor->otro = null;
            $proveedor->otro2 = null;
        }

        $proveedor->id_tipo_proveedor = 1;
        $proveedor->save();
        return redirect()->back()->with('success', 'Proveedor editado correctamente');
    }

    public function cambiarEstadoProveedor($id){
        $proveedor = Proveedor::find($id);
        $proveedor->estado = !$proveedor->estado;
        $proveedor->save();
        return ['mensaje' => 'OK'];
    }
}
