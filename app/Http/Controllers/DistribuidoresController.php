<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Bodega;
use App\Models\Cliente;
use App\Models\Compras;
use App\Models\Compras_detalle;
use App\Models\ContratoDependiente;
use App\Models\CotizacionProveedor;
use App\Models\CotizacionProveedorDetalle;
use App\Models\FormasPago;
use App\Models\Pago;
use App\Models\Instituciones;
use App\Models\LugarAtencion;
use App\Models\MarcasProductos;
use Illuminate\Support\Facades\Mail;
use App\Models\PedidosDistribucion;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\TipoProducto;
use App\Models\TipoAlmacenamientoProductos;
use App\Models\Servicios;
use App\Models\SolicitudProveedor;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\SolicitudReparacionReclamo;
use App\Models\SeguimientoCotizacionProveedor;
use App\Models\CampanaPromocionialDistribucion;
use App\Models\CampanaEmailDistribucion;
use App\Models\CampanaEmailDestinatarioDistribucion;
use Illuminate\Http\Request;
// Auth
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DistribuidoresController extends Controller
{
    // Mostrar listado de distribuidores
    public function index()
    {
        // Lógica para mostrar la vista principal de distribuidores
        return view('app.laboratorio.adm_general.distribuidores.home');
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('app.laboratorio.adm_general.distribuidores.create');
    }

    public function clientes(){

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

        $clientes = Cliente::all();
        $regiones = Region::all();
        $pedidos = PedidosDistribucion::where('id_usuario', Auth::user()->id)->get();

        $formas_pago = FormasPago::all();

        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        return view('app.laboratorio.adm_general.distribuidores.clientes',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'clientes' => $clientes,
            'regiones' => $regiones,
            'pedidos' => $pedidos,
            'formas_pago' => $formas_pago
        ]);
    }



    public function ventas(){

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

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $formas_pago = FormasPago::all();

        return view('app.laboratorio.adm_general.distribuidores.ventas', [
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'profesional' => $profesional,
            'formas_pago' => $formas_pago
        ]);
    }

    public function pedidos(){
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
        $pedidos = PedidosDistribucion::where('id_usuario', Auth::user()->id)->get();
        $formas_pago = FormasPago::where('activo', 1)->get();
        return view('app.laboratorio.adm_general.distribuidores.pedidos',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'pedidos' => $pedidos,
            'formas_pago' => $formas_pago
        ]);
    }

    public function existenciaBodega(){
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

        // Obtener bodegas de la institución
        $productos = collect();
        $bodegas = collect();

        if ($institucion && $institucion instanceof Instituciones) {
            $bodegas = Bodega::where('id_institucion', $institucion->id)
                             ->get();

            $bodegas_ids = $bodegas->pluck('id')->toArray();

            if (!empty($bodegas_ids)) {

            $productos_ingresados = Compras_detalle::select('compras_detalle.*',
            'productos.nombre as producto',
            'productos.codigo_interno',
            'productos.image_path',
            'productos.stock_minimo',
            'productos.stock_actual',
            'tipo_producto.nombre as tipo_producto',
            'unidades_medidas.nombre as unidad_medida',
            'marcas_productos.nombre as marca',
            'compras.estado',
            'compras.observaciones',
            'compras.fecha_emision',
            'proveedores.nombre as proveedor'
            )
            ->join('compras','compras_detalle.id_compra','compras.id')
            ->join('productos','compras_detalle.id_producto','productos.id')
            ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
            ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
            ->join('marcas_productos','productos.id_marca','marcas_productos.id')
            ->join('proveedores','compras.id_proveedor','proveedores.id')
            ->where('compras.id_institucion', $institucion->id) // cambiar por la institucion del usuario logueado
            ->get();

            foreach($productos_ingresados as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
                }
            }

         $tipos_productos = TipoProducto::all();

        return view('app.laboratorio.adm_general.distribuidores.existencia_bodega', [
            'institucion' => $institucion,
            'productos' => $productos_ingresados,
            'bodegas' => $bodegas,
            'tipos_productos' => $tipos_productos
        ]);
    }

    public function gestionFinanciera(){
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
        $profesionales_lugar_atencion = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*', 'profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
        ->where('profesionales_lugares_atencion.id_lugar_atencion', $institucion->id_lugar_atencion)
        ->join('profesionales','profesionales_lugares_atencion.id_profesional','profesionales.id')
        ->get();

        return view('app.laboratorio.adm_general.distribuidores.gestion_financiera',[
            'institucion'       => $institucion,
            'tipo_institucion'  => $tipo_institucion,
            'laboratorio'       => $institucion,
            'profesionales'     => $profesionales_lugar_atencion,
            'compras'           => Compras::with(['detalles.producto', 'proveedor'])
                                    ->where('id_proveedor', '!=', 0)
                                    ->where('id_institucion', $institucion->id)
                                    ->orderBy('fecha_emision', 'desc')
                                    ->get(),
            'pagos'             => Pago::with(['cliente', 'pedido'])
                                    ->where(function($query) use ($institucion) {
                                        $query->whereHas('pedido', function($q) use ($institucion) {
                                            $q->where('id_lugar_atencion', $institucion->id_lugar_atencion);
                                        })
                                        ->orWhereNull('id_pedido');
                                    })
                                    ->orderBy('fecha_pago', 'desc')
                                    ->get(),
            'total_gastado'     => Compras::where('id_institucion', $institucion->id)->sum('total_final'),
            'total_pagado'      => Pago::where(function($query) use ($institucion) {
                                        $query->whereHas('pedido', function($q) use ($institucion) {
                                            $q->where('id_lugar_atencion', $institucion->id_lugar_atencion);
                                        })
                                        ->orWhereNull('id_pedido');
                                    })
                                    ->where('estado', 'confirmado')
                                    ->sum('monto'),
            'pagos_pendientes'  => Pago::where(function($query) use ($institucion) {
                                        $query->whereHas('pedido', function($q) use ($institucion) {
                                            $q->where('id_lugar_atencion', $institucion->id_lugar_atencion);
                                        })
                                        ->orWhereNull('id_pedido');
                                    })
                                    ->where('estado', 'pendiente')
                                    ->count(),
            'pagos_confirmados' => Pago::where(function($query) use ($institucion) {
                                        $query->whereHas('pedido', function($q) use ($institucion) {
                                            $q->where('id_lugar_atencion', $institucion->id_lugar_atencion);
                                        })
                                        ->orWhereNull('id_pedido');
                                    })
                                    ->where('estado', 'confirmado')
                                    ->count(),
            'pedidos_pendientes' => PedidosDistribucion::where('id_usuario', Auth::user()->id)
                                        ->where('estado', 'pendiente')
                                        ->count(),
            'pedidos_confirmados' => PedidosDistribucion::where('id_usuario', Auth::user()->id)
                                        ->where('estado', 'confirmado')
                                        ->count(),
            'pedidos_enviados' => PedidosDistribucion::where('id_usuario', Auth::user()->id)
                                        ->where('estado', 'enviado')
                                        ->count(),
            'pedidos_entregados' => PedidosDistribucion::where('id_usuario', Auth::user()->id)
                                        ->where('estado', 'entregado')
                                        ->count(),
            'pedidos_procesados' => PedidosDistribucion::where('id_usuario', Auth::user()->id)
                                        ->whereIn('estado', ['confirmado', 'enviado', 'entregado'])
                                        ->count(),
            'pedidos' => PedidosDistribucion::where('id_usuario', Auth::user()->id)->get()
        ]);
    }

    public function importaciones(){
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
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        // Obtener cotizaciones de la institución
        $cotizaciones = CotizacionProveedor::with(['proveedor'])
            ->where('id_institucion', $institucion->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('app.laboratorio.adm_general.distribuidores.importaciones',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'profesional' => $profesional,
            'cotizaciones' => $cotizaciones
        ]);
    }

    public function reparaciones(){
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
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        return view('app.laboratorio.adm_general.distribuidores.reparaciones',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'profesional' => $profesional
        ]);
    }

    public function cotizaciones(){
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
                                if($registro)                                {
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

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        // Obtener proveedores con sus productos mapeados
        $proveedores = Proveedor::where('id_institucion', $institucion->id)
            ->where('estado', 1)
            ->orderBy('nombre')
            ->get()
            ->map(function($proveedor) {
                $proveedor->tipo_producto_nombre = $proveedor->tiposProducto()
                    ->pluck('nombre')
                    ->implode(', ');
                return $proveedor;
            });

        $cotizaciones = CotizacionProveedor::with(['proveedor'])
            ->where('id_institucion', $institucion->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('app.laboratorio.adm_general.distribuidores.cotizaciones',[
            'institucion'      => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio'      => $institucion,
            'profesional'      => $profesional,
            'proveedores'      => $proveedores,
            'cotizaciones'     => $cotizaciones,
        ]);

    }

    /** -----------------------------------------------------------------------
     * COTIZACIONES A PROVEEDORES — métodos AJAX
     * -----------------------------------------------------------------------*/

    public function guardarCotizacionProveedor(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'id_proveedor'  => 'required|integer',
                'fecha_emision' => 'required|date',
                'mensaje'       => 'required|string|min:10',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 422);
            }

            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if (!$institucion) {
                return response()->json(['error' => 'Institución no encontrada'], 404);
            }

            $proveedor = Proveedor::findOrFail($req->id_proveedor);

            $numero = 'COT-' . date('Ymd') . '-' . str_pad(
                CotizacionProveedor::where('id_institucion', $institucion->id)->count() + 1, 4, '0', STR_PAD_LEFT
            );

            $cotizacion = CotizacionProveedor::create([
                'id_institucion'    => $institucion->id,
                'id_proveedor'      => $req->id_proveedor,
                'id_usuario'        => Auth::user()->id,
                'numero_cotizacion' => $numero,
                'fecha_emision'     => $req->fecha_emision,
                'fecha_validez'     => $req->fecha_validez,
                'estado'            => $req->accion === 'enviar' ? 'enviada' : 'borrador',
                'observaciones'     => $req->mensaje,
                'total_estimado'    => 0,
            ]);

            $emailEnviado = false;
            if ($req->accion === 'enviar' && $proveedor->email) {
                try {
                    $asunto  = 'Solicitud de Cotización ' . $numero . ' - ' . $institucion->nombre;
                    $cuerpo  = "Estimado/a {$proveedor->nombre},\n\n";
                    $cuerpo .= "La institución {$institucion->nombre} le solicita una cotización con el siguiente detalle:\n\n";
                    $cuerpo .= "──────────────────────────────────────────\n";
                    $cuerpo .= $req->mensaje . "\n";
                    $cuerpo .= "──────────────────────────────────────────\n\n";
                    $cuerpo .= "Número de cotización: {$numero}\n";
                    $cuerpo .= "Fecha de emisión: {$req->fecha_emision}\n";
                    if ($req->fecha_validez) {
                        $cuerpo .= "Válido hasta: {$req->fecha_validez}\n";
                    }
                    $cuerpo .= "\nEste correo fue generado automáticamente por el sistema MediChile.\n";

                    Mail::raw($cuerpo, function ($msg) use ($proveedor, $asunto, $institucion) {
                        $msg->to($proveedor->email, $proveedor->nombre)
                            ->subject($asunto);
                        if ($institucion->email ?? null) {
                            $msg->replyTo($institucion->email, $institucion->nombre);
                        }
                    });
                    $emailEnviado = true;
                } catch (\Exception $mailEx) {
                    // El correo falló pero la cotización se guarda igual
                    $emailEnviado = false;
                }
            }

            return response()->json([
                'mensaje'       => 'Cotización ' . ($req->accion === 'enviar' ? 'guardada' : 'guardada como borrador') . ' correctamente.' . ($req->accion === 'enviar' && !$emailEnviado && $proveedor->email ? ' (El envío de email falló, verifique la configuración de correo.)' : ''),
                'email_enviado' => $emailEnviado,
                'id'            => $cotizacion->id,
                'numero'        => $numero,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function anularCotizacionProveedor($id)
    {
        try {
            $cotizacion = CotizacionProveedor::findOrFail($id);
            $cotizacion->update(['estado' => 'anulada']);
            return response()->json(['mensaje' => 'Cotización anulada correctamente.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Obtener detalle de una cotización
     */
    public function obtenerDetalleCotizacion($id)
    {
        try {
            $cotizacion = CotizacionProveedor::with(['proveedor'])->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Cotización encontrada',
                'cotizacion' => [
                    'id' => $cotizacion->id,
                    'numero_cotizacion' => $cotizacion->numero_cotizacion,
                    'fecha_emision' => $cotizacion->fecha_emision,
                    'fecha_validez' => $cotizacion->fecha_validez,
                    'estado' => $cotizacion->estado,
                    'observaciones' => $cotizacion->observaciones,
                    'total_estimado' => $cotizacion->total_estimado,
                    'proveedor' => [
                        'id' => $cotizacion->proveedor->id,
                        'nombre' => $cotizacion->proveedor->nombre,
                        'email' => $cotizacion->proveedor->email,
                        'telefono' => $cotizacion->proveedor->telefono,
                        'rut' => $cotizacion->proveedor->rut,
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener la cotización: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Guardar seguimiento de cotización de proveedor
     */
    public function guardarSeguimientoCotizacion($id, Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'comentarios' => 'required|min:3'
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Por favor ingrese un comentario válido (mínimo 3 caracteres)'
                ], 422);
            }

            // Verificar que la cotización existe
            $cotizacion = CotizacionProveedor::findOrFail($id);

            // Crear el seguimiento
            $seguimiento = SeguimientoCotizacionProveedor::create([
                'id_cotizacion_proveedor' => $id,
                'id_usuario' => Auth::user()->id,
                'comentarios' => $request->comentarios,
                'tipo_seguimiento' => 'comentario'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Seguimiento guardado correctamente',
                'seguimiento' => [
                    'id' => $seguimiento->id,
                    'fecha_formateada' => $seguimiento->fecha_formateada,
                    'comentarios' => $seguimiento->comentarios,
                    'usuario' => Auth::user()->name ?? 'Sistema'
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar el seguimiento: ' . $e->getMessage()
            ], 500);
        }
    }


    public function campanasPromocionales (){
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
                                if($registro)                                {
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
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        return view('app.laboratorio.adm_general.distribuidores.campanas_promocionales',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'profesional' => $profesional
        ]);
    }

    // Guardar nuevo cliente
    public function guardarCliente(Request $request)
    {
        try {
            // Validar datos
            $validator = Validator::make($request->all(), [
                'rut_cliente' => 'required|string',
                'nombre_cliente' => 'required|string|max:255',
                'tipo_producto' => 'required|string',
                'direccion_cliente' => 'required|string',
                'telefono_cliente' => 'required|string',
                'region_cliente' => 'required|numeric',
                'ciudad_cliente' => 'required|numeric',
                'email_cliente' => 'required|email',
                'product_cliente' => 'nullable|array',
                'formas_pago_cliente' => 'nullable|array'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validación fallida',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Crear nuevo cliente
            $cliente = new Cliente();
            $cliente->rut = $request->rut_cliente;
            $cliente->nombre = $request->nombre_cliente;
            $cliente->tipo_producto = $request->tipo_producto;
            $cliente->direccion = $request->direccion_cliente;
            $cliente->telefono = $request->telefono_cliente;
            $cliente->region_id = $request->region_cliente;
            $cliente->ciudad_id = $request->ciudad_cliente;
            $cliente->email = $request->email_cliente;
            $cliente->productos = json_encode($request->product_cliente ?? []);
            $cliente->save();

            // Guardar formas de pago
            if ($request->formas_pago_cliente && is_array($request->formas_pago_cliente)) {
                $formas_pago = [];
                foreach ($request->formas_pago_cliente as $forma_pago_id) {
                    $formas_pago[$forma_pago_id] = ['activo' => 1];
                }
                $cliente->formasPago()->sync($formas_pago);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Cliente guardado correctamente',
                'cliente' => $cliente
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    // Obtener datos del cliente para editar
    public function editarCliente($id)
    {
        try {
            $cliente = Cliente::with('formasPago')->find($id);

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'cliente' => $cliente
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    // Actualizar cliente
    public function actualizarCliente(Request $request, $id)
    {
        try {
            // Validar datos
            $validator = Validator::make($request->all(), [
                'rut_cliente' => 'required|string',
                'nombre_cliente' => 'required|string|max:255',
                'tipo_producto' => 'required|string',
                'direccion_cliente' => 'required|string',
                'telefono_cliente' => 'required|string',
                'region_cliente' => 'required|numeric',
                'ciudad_cliente' => 'required|numeric',
                'email_cliente' => 'required|email',
                'product_cliente' => 'nullable|array',
                'formas_pago_cliente' => 'nullable|array'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validación fallida',
                    'errors' => $validator->errors()
                ], 422);
            }

            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            // Actualizar datos
            $cliente->rut = $request->rut_cliente;
            $cliente->nombre = $request->nombre_cliente;
            $cliente->tipo_producto = $request->tipo_producto;
            $cliente->direccion = $request->direccion_cliente;
            $cliente->telefono = $request->telefono_cliente;
            $cliente->region_id = $request->region_cliente;
            $cliente->ciudad_id = $request->ciudad_cliente;
            $cliente->email = $request->email_cliente;
            $cliente->productos = json_encode($request->product_cliente ?? []);
            $cliente->save();

            // Actualizar formas de pago
            if ($request->formas_pago_cliente && is_array($request->formas_pago_cliente)) {
                $formas_pago = [];
                foreach ($request->formas_pago_cliente as $forma_pago_id) {
                    $formas_pago[$forma_pago_id] = ['activo' => 1];
                }
                $cliente->formasPago()->sync($formas_pago);
            } else {
                // Si no hay formas de pago, desasociar todas
                $cliente->formasPago()->sync([]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Cliente actualizado correctamente',
                'cliente' => $cliente
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    // Cambiar estado activo/inactivo del cliente
    public function cambiarEstadoCliente(Request $request, $id)
    {
        try {
            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            // Cambiar el estado
            $cliente->activo = !$cliente->activo;
            $cliente->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Estado del cliente actualizado correctamente',
                'activo' => $cliente->activo
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al cambiar el estado del cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar cliente por RUT, nombre o email
     */
    public function buscarClienteVenta(Request $request)
    {
        try {
            $termino = $request->input('termino');

            if (!$termino) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Debe ingresar un término de búsqueda'
                ], 400);
            }

            // Limpiar el RUT si viene formateado
            $terminoLimpio = str_replace(['.', '-', ' '], '', $termino);

            // Buscar por RUT, nombre o email
            $cliente = Cliente::where(function($query) use ($termino, $terminoLimpio) {
                $query->whereRaw('REPLACE(REPLACE(REPLACE(rut, ".", ""), "-", ""), " ", "") = ?', [$terminoLimpio])
                      ->orWhere('nombre', 'like', '%' . $termino . '%')
                      ->orWhere('email', 'like', '%' . $termino . '%');
            })
            ->where('activo', true)
            ->first();

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se encontró cliente con los datos ingresados'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Cliente encontrado',
                'cliente' => [
                    'id' => $cliente->id,
                    'rut' => $cliente->rut,
                    'nombre' => $cliente->nombre,
                    'email' => $cliente->email,
                    'telefono' => $cliente->telefono,
                    'direccion' => $cliente->direccion,
                    'region_id' => $cliente->region_id,
                    'ciudad_id' => $cliente->ciudad_id,
                    'tipo_producto' => $cliente->tipo_producto,
                    'productos' => $cliente->productos
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al buscar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar cliente para reparaciones con sus productos adquiridos
     */
    public function buscarClienteReparaciones(Request $request)
    {
        try {
            $termino = $request->input('termino');

            if (!$termino) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Debe ingresar un término de búsqueda'
                ], 400);
            }

            // Limpiar el RUT si viene formateado
            $terminoLimpio = str_replace(['.', '-', ' '], '', $termino);

            // Buscar por RUT, nombre o email
            $cliente = Cliente::where(function($query) use ($termino, $terminoLimpio) {
                $query->whereRaw('REPLACE(REPLACE(REPLACE(rut, ".", ""), "-", ""), " ", "") = ?', [$terminoLimpio])
                      ->orWhere('nombre', 'like', '%' . $termino . '%')
                      ->orWhere('email', 'like', '%' . $termino . '%');
            })
            ->where('activo', true)
            ->first();

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se encontró cliente con los datos ingresados'
                ], 404);
            }

            // Obtener los productos comprados por el cliente (a través de PedidosDistribucion)
            $pedidos = PedidosDistribucion::where('id_cliente', $cliente->id)
                                          ->where('estado', 'procesado')
                                          ->get();

            $productos_comprados = [];
            foreach ($pedidos as $pedido) {
                if ($pedido->items_pedido) {
                    $items = is_array($pedido->items_pedido) ? $pedido->items_pedido : json_decode($pedido->items_pedido, true);
                    if (is_array($items)) {
                        foreach ($items as $item) {
                            $productos_comprados[] = [
                                'id' => $item['id_producto'] ?? null,
                                'nombre' => $item['nombre_producto'] ?? 'Sin nombre',
                                'cantidad' => $item['cantidad'] ?? 1,
                                'precio_unitario' => $item['precio_unitario'] ?? 0,
                                'fecha_compra' => $pedido->created_at->format('d/m/Y') ?? 'N/A',
                                'numero_pedido' => $pedido->numero_pedido ?? 'N/A'
                            ];
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Cliente encontrado',
                'cliente' => [
                    'id' => $cliente->id,
                    'rut' => $cliente->rut,
                    'nombre' => $cliente->nombre,
                    'email' => $cliente->email,
                    'telefono' => $cliente->telefono,
                    'direccion' => $cliente->direccion,
                ],
                'productos_comprados' => $productos_comprados,
                'total_productos' => count($productos_comprados)
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al buscar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    // Obtener estado de cuenta del cliente
    public function obtenerEstadoCuenta($id)
    {
        try {
            $cliente = Cliente::with('formasPago')->find($id);

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            // Obtener todos los pagos del cliente
            $pagos = Pago::where('id_cliente', $id)
                        ->with('formaPago')
                        ->orderBy('fecha_pago', 'desc')
                        ->get()
                        ->map(function($pago) {
                            return [
                                'id' => $pago->id,
                                'monto' => $pago->monto,
                                'fecha_pago' => $pago->fecha_pago->format('d/m/Y'),
                                'forma_pago_nombre' => $pago->formaPago ? $pago->formaPago->nombre : 'N/A',
                                'numero_documento' => $pago->numero_documento,
                                'estado' => $pago->estado
                            ];
                        });

            // Obtener formas de pago disponibles del cliente
            $formas_pago = $cliente->formasPago()->get()->map(function($forma) {
                return [
                    'id' => $forma->id,
                    'nombre' => $forma->nombre
                ];
            });

            // Calcular total de ventas del cliente desde PedidosDistribucion
            $total_ventas = \DB::table('pedidos_distribucion')
                                ->where('id_cliente', $id)
                                ->whereIn('estado', ['procesado', 'enviado'])
                                ->sum('monto_neto'); // Sumar monto_neto (después del descuento)

            // Calcular total de pagos registrados
            $total_pagos = Pago::where('id_cliente', $id)->sum('monto');

            // Deuda total = ventas - pagos
            $deuda_total = max(0, $total_ventas - $total_pagos);

            // Obtener id_lugar_atencion: buscar el primer pedido que tenga lugar de atención asignado
            $id_lugar_atencion = PedidosDistribucion::where('id_cliente', $id)
                                        ->whereNotNull('id_lugar_atencion')
                                        ->value('id_lugar_atencion');

            return response()->json([
                'status' => 'success',
                'cliente' => [
                    'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
                    'rut' => $cliente->rut
                ],
                'estado_cuenta' => [
                    'deuda_total' => $deuda_total,
                    'total_ventas' => $total_ventas,
                    'total_pagos' => $total_pagos,
                    'pagos' => $pagos
                ],
                'formas_pago_disponibles' => $formas_pago,
                'id_lugar_atencion' => $id_lugar_atencion
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener estado de cuenta: ' . $e->getMessage()
            ], 500);
        }
    }

    // Registrar pago de cliente
    public function registrarPago(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                // 'id_pedido' => 'required|exists:pedidos_distribucion,id',
                'monto' => 'required|numeric|min:0.01',
                'fecha_pago' => 'required|date',
                'id_forma_pago' => 'nullable|exists:formas_pago,id',
                'numero_documento' => 'nullable|string|max:100',
                'observaciones' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validación fallida',
                    'errors' => $validator->errors()
                ], 422);
            }

            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            // Validar que el pedido pertenece al cliente
            $pedido = PedidosDistribucion::find($request->id_pedido);
            if (!$pedido || $pedido->id_cliente != $id) {
                // return response()->json([
                //     'status' => 'error',
                //     'message' => 'El pedido no pertenece a este cliente'
                // ], 403);
            }

            // Crear nuevo pago
            $pago = new Pago();
            $pago->id_cliente = $id;
            $pago->id_pedido = $request->id_pedido;
            $pago->monto = $request->monto;
            $pago->fecha_pago = $request->fecha_pago;
            $pago->id_forma_pago = $request->id_forma_pago;
            $pago->numero_documento = $request->numero_documento;
            $pago->observaciones = $request->observaciones;
            $pago->estado = 'confirmado';
            $pago->id_usuario = Auth::id();
            $pago->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Pago registrado correctamente',
                'pago' => $pago
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al registrar pago: ' . $e->getMessage()
            ], 500);
        }
    }

    public function obtenerPedidosPendientes($id)
    {
        try {
            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            // Obtener pedidos pendientes del cliente (no cancelados)
            $pedidos = PedidosDistribucion::where('id_cliente', $id)
                ->where('estado', '!=', 'cancelado')
                ->where('estado', '!=', 'devuelto')
                ->select('id', 'numero_pedido', 'total', 'estado', 'created_at')
                ->get();

            // Calcular el total pagado por cada pedido
            $pedidosConPagos = $pedidos->map(function($pedido) {
                $total_pagado = $pedido->pagos()->sum('monto');
                return [
                    'id' => $pedido->id,
                    'numero_pedido' => $pedido->numero_pedido,
                    'total' => $pedido->total,
                    'total_pagado' => $total_pagado,
                    'saldo_pendiente' => $pedido->total - $total_pagado,
                    'estado' => $pedido->estado,
                    'created_at' => $pedido->created_at->format('Y-m-d')
                ];
            });

            return response()->json([
                'status' => 'success',
                'pedidos' => $pedidosConPagos
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener pedidos: ' . $e->getMessage()
            ], 500);
        }
    }

    public function obtenerDatosLaboratorio($id_lugar_atencion)
    {
        try {
            // Obtener el lugar de atención
            $lugar = LugarAtencion::find($id_lugar_atencion);

            if (!$lugar) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Lugar de atención no encontrado'
                ], 404);
            }

            // Obtener la institución asociada al lugar de atención
            $institucion = Instituciones::where('id_lugar_atencion', $id_lugar_atencion)->first();

            if (!$institucion) {
                return response()->json([
                    'status' => 'success',
                    'laboratorio' => [
                        'nombre' => $lugar->nombre ?? 'Laboratorio',
                        'foto_perfil' => null
                    ]
                ], 200);
            }

            // Preparar URL de la foto de perfil
            $foto_url = null;
            if ($institucion->foto_perfil) {
                $foto_url = asset('storage/' . $institucion->foto_perfil);
            }

            return response()->json([
                'status' => 'success',
                'laboratorio' => [
                    'nombre' => $institucion->nombre ?? $lugar->nombre,
                    'razon_social' => $institucion->razon_social ?? null,
                    'foto_perfil' => $foto_url,
                    'rut' => $institucion->rut ?? null
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener datos del laboratorio: ' . $e->getMessage()
            ], 500);
        }
    }

    public function buscarClienteReparacionesOld(Request $request)
    {
        try {
            $termino = $request->input('termino');

            if (!$termino) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Debe ingresar un término de búsqueda'
                ], 400);
            }

            // Limpiar el RUT si viene formateado
            $terminoLimpio = str_replace(['.', '-', ' '], '', $termino);

            // Buscar por RUT, nombre o email
            $cliente = Cliente::where(function($query) use ($termino, $terminoLimpio) {
                $query->whereRaw('REPLACE(REPLACE(REPLACE(rut, ".", ""), "-", ""), " ", "") = ?', [$terminoLimpio])
                      ->orWhere('nombre', 'like', '%' . $termino . '%')
                      ->orWhere('email', 'like', '%' . $termino . '%');
            })
            ->where('activo', true)
            ->first();

            if (!$cliente) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se encontró cliente con los datos ingresados'
                ], 404);
            }

            // Obtener los productos comprados por el cliente (a través de PedidosDistribucion)
            $pedidos = PedidosDistribucion::where('id_cliente', $cliente->id)
                                          ->where('estado', 'procesado')
                                          ->get();

            $productos_comprados = [];
            foreach ($pedidos as $pedido) {
                if ($pedido->items_pedido) {
                    $items = is_array($pedido->items_pedido) ? $pedido->items_pedido : json_decode($pedido->items_pedido, true);
                    if (is_array($items)) {
                        foreach ($items as $item) {
                            $productos_comprados[] = [
                                'id' => $item['id_producto'] ?? null,
                                'nombre' => $item['nombre_producto'] ?? 'Sin nombre',
                                'cantidad' => $item['cantidad'] ?? 1,
                                'precio_unitario' => $item['precio_unitario'] ?? 0,
                                'fecha_compra' => $pedido->created_at->format('d/m/Y') ?? 'N/A',
                                'numero_pedido' => $pedido->numero_pedido ?? 'N/A'
                            ];
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Cliente encontrado',
                'cliente' => [
                    'id' => $cliente->id,
                    'rut' => $cliente->rut,
                    'nombre' => $cliente->nombre,
                    'email' => $cliente->email,
                    'telefono' => $cliente->telefono,
                    'direccion' => $cliente->direccion,
                ],
                'productos_comprados' => $productos_comprados,
                'total_productos' => count($productos_comprados)
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al buscar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    public function misConvenios(){
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
                                if($registro)                                {
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
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

         return view('app.laboratorio.adm_general.distribuidores.mis_convenios',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorio' => $institucion,
            'profesional' => $profesional
        ]);
    }

    // Guardar nuevo distribuidor
    public function store(Request $request)
    {
        // Lógica para guardar distribuidor
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        // Lógica para mostrar formulario de edición
    }

    // Actualizar distribuidor
    public function update(Request $request, $id)
    {
        // Lógica para actualizar distribuidor
    }

    // Eliminar distribuidor
    public function destroy($id)
    {
        // Lógica para eliminar distribuidor
    }

    // Mostrar detalle de un distribuidor
    public function show($id)
    {
        // Lógica para mostrar detalle
    }

    /**
     * Obtener detalle de un pedido
     */
    public function obtenerDetallePedido($id)
    {
        try {

            $pedido = PedidosDistribucion::with(['cliente', 'usuario', 'lugarAtencion'])
                                        ->find($id);

            if (!$pedido) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Pedido no encontrado'
                ], 404);
            }

            // Verificar que pertenezca al usuario actual
            if ($pedido->id_usuario !== Auth::id()) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No autorizado'
                ], 403);
            }

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Pedido encontrado',
                'pedido' => $pedido
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener el pedido: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Guardar medio de transporte para despacho de pedido
     */
    public function guardarTransportePedido(Request $request, $id)
    {
        try {

            $pedido = PedidosDistribucion::find($id);

            if (!$pedido) {
                return response()->json(['estado' => 0, 'mensaje' => 'Pedido no encontrado'], 404);
            }

            if ($pedido->id_usuario !== Auth::id()) {
                return response()->json(['estado' => 0, 'mensaje' => 'No autorizado'], 403);
            }

            // Determinar el estado del pedido según el estado_envio
            $estado_envio = $request->input('estado_envio', 'en_preparacion');

            $estado_pedido = 'procesado'; // default

            if ($estado_envio === 'despachado') {
                $estado_pedido = 'enviado';
            } elseif ($estado_envio === 'entregado') {
                $estado_pedido = 'entregado';
            }

            $pedido->update([
                'medio_transporte'   => $request->input('medio_transporte'),
                'empresa_transporte' => $request->input('empresa_transporte'),
                'numero_seguimiento' => $request->input('numero_seguimiento'),
                'direccion_envio'    => $request->input('direccion_envio'),
                'estado_envio'       => $estado_envio,
                'estado'             => $estado_pedido,
            ]);

            return response()->json([
                'estado'  => 1,
                'mensaje' => 'Información de despacho guardada correctamente',
                'pedido'  => $pedido->fresh()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado'  => 0,
                'mensaje' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar vista de proveedores
     */
    public function proveedores()
    {
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

            // Obtener proveedores con sus productos mapeados
            $proveedores = Proveedor::where('id_institucion', $institucion->id)
                ->where('id_tipo_proveedor', 1) // Distribución (incluye nacional e internacional)
                ->orderBy('id', 'asc')
                ->get()
                ->map(function($proveedor) {
                    $proveedor->tipo_producto = $proveedor->tiposProducto()
                        ->pluck('nombre')
                        ->implode(', ');
                    return $proveedor;
                });
            $tipo_producto = TipoProducto::where('id_tipo_institucion', $institucion->id_tipo_institucion)
            ->orWhere('id_tipo_institucion', 1) // Incluye tipo producto global
            ->orderBy('nombre', 'asc')
            ->get();
            return view('app.laboratorio.adm_general.distribuidores.proveedores',[
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

    /**
     * Mostrar vista de compras
     */
    public function compras()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
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
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }
        // Obtener proveedores con sus productos mapeados
        $proveedores = Proveedor::where('id_tipo_proveedor', 1) // Distribución (incluye nacional e internacional)
            ->where('id_institucion', $institucion->id)
            ->orderBy('id', 'asc')
            ->get()
            ->map(function($proveedor) {
                $proveedor->tipo_producto = $proveedor->tiposProducto()
                    ->pluck('nombre')
                    ->implode(', ');
                return $proveedor;
            });

        $productos_controller = new ProductosController();

        $tipos_producto = TipoProducto::all();
        $marcas = [];
        $unidades_medidas = $productos_controller->dameMedidas();
        $bodegas = Bodega::where('id_institucion', $institucion->id)->get();
        $tipos_almacenamiento = TipoAlmacenamientoProductos::all();
        $regiones = Region::orderBy('nombre')->get();

        return view('app.laboratorio.adm_general.distribuidores.compras', [
            'proveedores' => $proveedores,
            'tipos_producto' => $tipos_producto,
            'region' => $regiones,
            'marcas' => $marcas,
            'unidades_medidas' => $unidades_medidas,
            'bodegas' => $bodegas,
            'tipos_almacenamiento' => $tipos_almacenamiento,
            'institucion' => $institucion,
        ]);
    }

    /**
     * Estadísticas de distribuidores
     */
    public function estadisticas($id = null)
    {
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
        if (!$institucion) {
            return back()->with('error', 'Institución no encontrada');
        }

        return view('app.laboratorio.adm_general.distribuidores.estadisticas', [
            'institucion' => $institucion,
        ]);
    }

    /**
     * Solicitudes de distribuidores
     */
    public function solicitudes()
    {
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
        if (!$institucion) {
            return back()->with('error', 'Institución no encontrada');
        }

        $solicitudes = SolicitudProveedor::with(['compraDetalle.producto'])
                        ->where('id_institucion', $institucion->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('app.laboratorio.adm_general.distribuidores.solicitudes', [
            'institucion' => $institucion,
            'solicitudes' => $solicitudes,
        ]);
    }

    public function procesarSolicitud(Request $req)
    {
        try {
            $solicitud = SolicitudProveedor::findOrFail($req->id);
            $solicitud->estado = 'procesada';
            $solicitud->save();

            return response()->json(['mensaje' => 'OK']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function buscarProductosBodega(Request $request){
        try {
            $termino = $request->input('termino', '');
            $id_lugar_atencion = $request->input('id_lugar_atencion');

            if (strlen($termino) < 2) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Ingrese al menos 2 caracteres para buscar',
                    'productos' => []
                ], 400);
            }

            // Obtener la institución
            $institucion = Instituciones::where('id_lugar_atencion', $id_lugar_atencion)->first();

            if (!$institucion) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Institución no encontrada',
                    'productos' => []
                ], 404);
            }

            // Buscar productos desde las compras realizadas por la institución
            $productos_comprados = Compras_detalle::select(
                'productos.id',
                'productos.codigo_interno',
                'productos.nombre',
                'productos.descripcion',
                'productos.stock_actual',
                'productos.precio_venta'
            )
            ->join('compras', 'compras_detalle.id_compra', '=', 'compras.id')
            ->join('productos', 'compras_detalle.id_producto', '=', 'productos.id')
            ->where('compras.id_institucion', $institucion->id)
            ->where('productos.stock_actual', '>', 0) // Solo productos con stock disponible
            ->where(function($query) use ($termino) {
                $query->where('productos.nombre', 'like', '%' . $termino . '%')
                      ->orWhere('productos.codigo_interno', 'like', '%' . $termino . '%')
                      ->orWhere('productos.descripcion', 'like', '%' . $termino . '%');
            })
            ->distinct()
            ->limit(15)
            ->get();

            if ($productos_comprados->isEmpty()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'No se encontraron productos disponibles en las compras de la institución',
                    'productos' => []
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Productos encontrados',
                'productos' => $productos_comprados->map(function($producto) {
                    return [
                        'id' => $producto->id,
                        'nombre_producto' => $producto->nombre,
                        'codigo_interno' => $producto->codigo_interno,
                        'descripcion' => $producto->descripcion,
                        'stock_actual' => $producto->stock_actual,
                        'precio_venta' => $producto->precio_venta ? '$' . number_format($producto->precio_venta, 0, ',', '.') : 'N/A'
                    ];
                })->toArray()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al buscar productos: ' . $e->getMessage(),
                'productos' => []
            ], 500);
        }
    }

    public function guardarReparacionReclamo(Request $request){
        try {
            // Validar datos
            $validated = $request->validate([
                'tipo' => 'required|in:reparacion,reclamo',
                'producto_id' => 'required|integer|exists:productos,id',
                'cliente_id' => 'required|integer|exists:clientes,id',
                'detalles' => 'required|string|min:5',
                'reemplazo_id' => 'nullable|integer|exists:productos,id'
            ], [
                'tipo.required' => 'El tipo de solicitud es requerido',
                'tipo.in' => 'El tipo debe ser reparación o reclamo',
                'producto_id.required' => 'El ID del producto es requerido',
                'producto_id.exists' => 'El producto no existe',
                'cliente_id.required' => 'El ID del cliente es requerido',
                'cliente_id.exists' => 'El cliente no existe',
                'detalles.required' => 'Los detalles son requeridos',
                'detalles.min' => 'Los detalles deben tener al menos 5 caracteres',
                'reemplazo_id.exists' => 'El producto de reemplazo no existe'
            ]);

            // Obtener datos del cliente y producto
            $cliente = Cliente::find($validated['cliente_id']);
            $producto = Producto::find($validated['producto_id']);

            if (!$cliente || !$producto) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente o producto no encontrado'
                ], 404);
            }

            // Crear la solicitud
            $solicitud = SolicitudReparacionReclamo::create([
                'tipo' => $validated['tipo'],
                'id_cliente' => $validated['cliente_id'],
                'id_producto' => $validated['producto_id'],
                'id_profesional' => Auth::user()->id ?? null,
                'id_producto_reemplazo' => $validated['reemplazo_id'] ?? null,
                'detalles' => $validated['detalles'],
                'estado' => 'pendiente'
            ]);

            // Preparar mensaje de respuesta
            $tipo_nombre = $validated['tipo'] === 'reparacion' ? 'Reparación' : 'Reclamo';
            $mensaje = "{$tipo_nombre} registrada exitosamente para el producto: {$producto->nombre}";

            if ($validated['reemplazo_id']) {
                $prod_reemplazo = Producto::find($validated['reemplazo_id']);
                if ($prod_reemplazo) {
                    $mensaje .= " | Reemplazo: {$prod_reemplazo->nombre}";
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => $mensaje,
                'solicitud_id' => $solicitud->id,
                'cliente' => $cliente->nombre,
                'producto' => $producto->nombre,
                'tipo' => $tipo_nombre
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener reparaciones y reclamosor de un cliente
     */
    public function obtenerReparacionesReclamosCliente(Request $request)
    {
        try {
            $cliente_id = $request->input('cliente_id');

            if (!$cliente_id) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cliente ID requerido'
                ], 400);
            }

            $reparaciones = SolicitudReparacionReclamo::with(['producto', 'productoReemplazo'])
                                                      ->where('id_cliente', $cliente_id)
                                                      ->orderBy('created_at', 'desc')
                                                      ->get();

            if ($reparaciones->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Sin solicitudes',
                    'reparaciones' => [],
                    'total' => 0
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Solicitudes encontradas',
                'reparaciones' => $reparaciones->map(function($rep) {
                    return [
                        'id' => $rep->id,
                        'tipo' => $rep->tipo,
                        'tipo_nombre' => $rep->tipo === 'reparacion' ? 'Reparación' : 'Reclamo',
                        'producto' => $rep->producto ? $rep->producto->nombre : 'N/A',
                        'detalles' => substr($rep->detalles, 0, 50) . (strlen($rep->detalles) > 50 ? '...' : ''),
                        'estado' => $rep->estado,
                        'estado_nombre' => $this->getEstadoNombre($rep->estado),
                        'reemplazo' => $rep->productoReemplazo ? $rep->productoReemplazo->nombre : null,
                        'fecha' => $rep->created_at->format('d/m/Y H:i'),
                        'color_tipo' => $rep->tipo === 'reparacion' ? 'badge-warning' : 'badge-danger',
                        'color_estado' => $this->getColorEstado($rep->estado)
                    ];
                }),
                'total' => count($reparaciones)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener reparaciones: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener nombre del estado
     */
    private function getEstadoNombre($estado)
    {
        $estados = [
            'pendiente' => 'Pendiente',
            'en_proceso' => 'En proceso',
            'resuelto' => 'Resuelto',
            'rechazado' => 'Rechazado'
        ];
        return $estados[$estado] ?? 'Desconocido';
    }

    /**
     * Obtener color del badge según el estado
     */
    private function getColorEstado($estado)
    {
        $colores = [
            'pendiente' => 'badge-warning',
            'en_proceso' => 'badge-info',
            'resuelto' => 'badge-success',
            'rechazado' => 'badge-danger'
        ];
        return $colores[$estado] ?? 'badge-secondary';
    }

    /**
     * Guardar campaña de email a todos los clientes
     */
    public function guardarCampanaEmail(Request $request)
    {
        try {

            $validated = Validator::make($request->all(), [
                'titulo' => 'required|string|min:3|max:100',
                'mensaje' => 'required|string|min:10',
                'remitente' => 'required|email'
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Datos inválidos: ' . implode(', ', $validated->errors()->all())
                ], 422);
            }

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();

            // Crear campaña
            $campana = CampanaEmailDistribucion::create([
                'id_institucion' => $institucion->id,
                'id_profesional' => $profesional->id,
                'titulo' => $request->titulo,
                'mensaje' => $request->mensaje,
                'remitente' => $request->remitente,
                'estado' => 'borrador'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Campaña guardada en borrador',
                'campana_id' => $campana->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Enviar campaña a todos los clientes
     */
    public function enviarCampanaEmail($id, Request $request)
    {
        try {
            $campana = CampanaEmailDistribucion::findOrFail($id);

            // Validar que la campaña esté en estado correcto
            if ($campana->estado !== 'borrador') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Solo se pueden enviar campañas en estado borrador'
                ], 422);
            }

            // Obtener todos los clientes con email de la institución
            $clientes = Cliente::whereNotNull('email')
                ->where('email', '!=', '')
                ->where('activo', 1)
                ->get();

            if ($clientes->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No hay clientes con email registrados en esta institución'
                ], 422);
            }

            // Cambiar estado a "enviando"
            $campana->update([
                'estado' => 'enviando',
                'total_destinatarios' => $clientes->count()
            ]);

            // Crear registros de destinatarios
            foreach ($clientes as $cliente) {
                CampanaEmailDestinatarioDistribucion::create([
                    'id_campana_email' => $campana->id,
                    'id_cliente' => $cliente->id,
                    'email_cliente' => $cliente->email,
                    'estado_envio' => 'pendiente'
                ]);
            }

            // Procesar envío de emails
            $enviados = 0;
            $fallidos = 0;
            $errores = [];

            foreach ($clientes as $cliente) {
                // [TESTING] Enviar solo a francisco.rojo.gallardo@gmail.com
                if ($cliente->email !== 'francisco.rojo.gallardo@gmail.com') {
                    continue;
                }

                try {
                    // Aquí va la lógica para enviar el email
                    // Por ahora lo marcamos como enviado
                    $destinatario = CampanaEmailDestinatarioDistribucion::where('id_campana_email', $campana->id)
                        ->where('id_cliente', $cliente->id)
                        ->first();

                    // Enviar email con contenido HTML (Quill genera HTML)
                    try {
                        Mail::html($campana->mensaje, function ($message) use ($cliente, $campana) {
                            $message->to($cliente->email, $cliente->nombre ?? $cliente->email)
                                    ->replyTo($campana->remitente)
                                    ->subject($campana->titulo);
                        });

                        $destinatario->update([
                            'estado_envio' => 'enviado',
                            'fecha_envio' => now()
                        ]);
                        $enviados++;
                    } catch (\Exception $mailError) {
                        $destinatario->update([
                            'estado_envio' => 'fallido',
                            'error_mensaje' => $mailError->getMessage()
                        ]);
                        $fallidos++;
                        $errores[] = "Cliente {$cliente->email}: " . $mailError->getMessage();
                    }

                } catch (\Exception $e) {
                    $fallidos++;
                    $errores[] = "Error procesando cliente {$cliente->email}: " . $e->getMessage();
                }
            }

            // Actualizar campana con resultados
            $campana->update([
                'estado' => $fallidos > 0 ? 'error' : 'enviada',
                'enviados' => $enviados,
                'fallidos' => $fallidos,
                'fecha_envio' => now(),
                'log_errores' => count($errores) > 0 ? json_encode($errores) : null
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Campaña enviada. Enviados: $enviados, Fallidos: $fallidos",
                'campana' => [
                    'id' => $campana->id,
                    'titulo' => $campana->titulo,
                    'enviados' => $enviados,
                    'fallidos' => $fallidos,
                    'total' => $clientes->count()
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al enviar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener historial de campañas de email
     */
    public function obtenerCampanasEmailHistorial()
    {
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            if (!$profesional) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Profesional no encontrado'
                ], 404);
            }

            $campanas = CampanaEmailDistribucion::porInstitucion($profesional->id_institucion)
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function($campana) {
                    return [
                        'id' => $campana->id,
                        'titulo' => $campana->titulo,
                        'remitente' => $campana->remitente,
                        'total_destinatarios' => $campana->total_destinatarios,
                        'enviados' => $campana->enviados,
                        'fallidos' => $campana->fallidos,
                        'porcentaje_exito' => $campana->porcentaje_exito,
                        'estado' => $campana->estado_nombre,
                        'fecha_envio' => $campana->fecha_envio_formateada,
                        'fecha_creacion' => $campana->created_at->format('d/m/Y H:i')
                    ];
                });

            return response()->json([
                'status' => 'success',
                'campanas' => $campanas,
                'total' => count($campanas)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener campañas: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener detalles de una campaña de email
     */
    public function obtenerDetalleCampanaEmail($id)
    {
        try {
            $campana = CampanaEmailDistribucion::with('destinatarios')->findOrFail($id);

            // Obtener estadísticas de destinatarios
            $estadisticas = [
                'pendientes' => $campana->destinatarios()->where('estado_envio', 'pendiente')->count(),
                'enviados' => $campana->destinatarios()->where('estado_envio', 'enviado')->count(),
                'fallidos' => $campana->destinatarios()->where('estado_envio', 'fallido')->count()
            ];

            return response()->json([
                'status' => 'success',
                'campana' => [
                    'id' => $campana->id,
                    'titulo' => $campana->titulo,
                    'mensaje' => $campana->mensaje,
                    'remitente' => $campana->remitente,
                    'estado' => $campana->estado_nombre,
                    'total_destinatarios' => $campana->total_destinatarios,
                    'enviados' => $campana->enviados,
                    'fallidos' => $campana->fallidos,
                    'porcentaje_exito' => $campana->porcentaje_exito,
                    'fecha_envio' => $campana->fecha_envio_formateada,
                    'estadisticas' => $estadisticas
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener detalles: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar campaña de email
     */
    public function eliminarCampanaEmail($id)
    {
        try {
            $campana = CampanaEmailDistribucion::findOrFail($id);

            // Solo se pueden eliminar campañas en borrador
            if ($campana->estado !== 'borrador') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Solo se pueden eliminar campañas en estado borrador'
                ], 422);
            }

            $campana->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Campaña eliminada correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener lugares de atención para selects
     */
    public function obtenerLugaresAtencion(Request $request)
    {
        try {

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();

            if (!$profesional) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Profesional no encontrado'
                ], 404);
            }

            $lugares = array();
            array_push($lugares, [
                'id' => $institucion->id_lugar_atencion,
                'nombre' => $institucion->nombre
            ]);

            return response()->json([
                'status' => 'success',
                'lugares' => $lugares
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener lugares de atención: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Guardar nuevo convenio
     */
    public function guardarConvenio(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'convenios' => 'required|array|min:1',
                'tipo_atencion' => 'required|string',
                'porcentaje' => 'required|numeric|min:0|max:100',
                'valor' => 'required|numeric|min:0',
                'lugar_atencion' => 'required|exists:profesionales_lugares_atencion,id'
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Datos inválidos: ' . implode(', ', $validated->errors()->all())
                ], 422);
            }

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $institucion = $profesional->institucion ?? Instituciones::find($profesional->id_institucion);

            // Crear convenio (almacenar convenios como JSON)
            $convenio = \App\Models\Convenio::create([
                'id_institucion' => $institucion->id,
                'id_profesional' => $profesional->id,
                'convenios' => json_encode($request->convenios),
                'tipo_atencion' => $request->tipo_atencion,
                'porcentaje' => $request->porcentaje,
                'valor' => $request->valor,
                'valor_garantia' => $request->valor_garantia ?? null,
                'valor_copago_fonasa' => $request->valor_copago_fonasa ?? null,
                'valor_bon_fonasa' => $request->valor_bon_fonasa ?? null,
                'id_lugar_atencion' => $request->lugar_atencion
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Convenio guardado correctamente',
                'convenio_id' => $convenio->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar convenio: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener detalle de un convenio
     */
    public function obtenerDetalleConvenio($id)
    {
        try {
            $convenio = \App\Models\Convenio::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'convenio' => [
                    'id' => $convenio->id,
                    'convenios_array' => json_decode($convenio->convenios, true),
                    'tipo_atencion' => $convenio->tipo_atencion,
                    'porcentaje' => $convenio->porcentaje,
                    'valor' => $convenio->valor,
                    'valor_garantia' => $convenio->valor_garantia,
                    'valor_copago_fonasa' => $convenio->valor_copago_fonasa,
                    'valor_bon_fonasa' => $convenio->valor_bon_fonasa,
                    'id_lugar_atencion' => $convenio->id_lugar_atencion
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener convenio: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar convenio
     */
    public function actualizarConvenio($id, Request $request)
    {
        try {
            $convenio = \App\Models\Convenio::findOrFail($id);

            $validated = Validator::make($request->all(), [
                'convenios' => 'required|array|min:1',
                'tipo_atencion' => 'required|string',
                'porcentaje' => 'required|numeric|min:0|max:100',
                'valor' => 'required|numeric|min:0',
                'lugar_atencion' => 'required|exists:profesionales_lugares_atencion,id'
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Datos inválidos'
                ], 422);
            }

            $convenio->update([
                'convenios' => json_encode($request->convenios),
                'tipo_atencion' => $request->tipo_atencion,
                'porcentaje' => $request->porcentaje,
                'valor' => $request->valor,
                'valor_garantia' => $request->valor_garantia ?? null,
                'valor_copago_fonasa' => $request->valor_copago_fonasa ?? null,
                'valor_bon_fonasa' => $request->valor_bon_fonasa ?? null,
                'id_lugar_atencion' => $request->lugar_atencion
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Convenio actualizado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar convenio: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar convenio
     */
    public function eliminarConvenio($id)
    {
        try {
            $convenio = \App\Models\Convenio::findOrFail($id);
            $convenio->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Convenio eliminado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar convenio: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Guardar nueva campaña promocional de distribución
     */
    public function guardarCampanaDistribucion(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'nombre' => 'required|string|min:3',
                'descripcion' => 'required|string|min:5',
                'fecha_inicio' => 'required|date',
                'fecha_termino' => 'nullable|date|after_or_equal:fecha_inicio',
                'tipo_descuento' => 'required|in:porcentaje,valor_fijo,otro',
                'descuento_porcentaje' => 'nullable|numeric|min:0|max:100',
                'descuento_valor' => 'nullable|numeric|min:0'
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Datos inválidos: ' . implode(', ', $validated->errors()->all())
                ], 422);
            }

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $institucion = $profesional->institucion ?? Instituciones::find($profesional->id_institucion);

            $campana = CampanaPromocionialDistribucion::create([
                'id_institucion' => $institucion->id,
                'id_profesional' => $profesional->id,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_termino' => $request->fecha_termino,
                'tipo_descuento' => $request->tipo_descuento,
                'descuento_porcentaje' => $request->descuento_porcentaje,
                'descuento_valor' => $request->descuento_valor,
                'observaciones' => $request->observaciones ?? null
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Campaña registrada correctamente',
                'campana_id' => $campana->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener todas las campañas de distribución
     */
    public function obtenerCampanasDistribucion()
    {
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            if (!$profesional) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Profesional no encontrado'
                ], 404);
            }

            $campanas = CampanaPromocionialDistribucion::porInstitucion($profesional->id_institucion)
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function($campana) {
                    return [
                        'id' => $campana->id,
                        'nombre' => $campana->nombre,
                        'descripcion' => $campana->descripcion,
                        'fecha_inicio' => $campana->fecha_inicio_formateada,
                        'fecha_termino' => $campana->fecha_termino_formateada,
                        'tipo_descuento' => $campana->tipo_descuento_nombre,
                        'descuento_aplicable' => $campana->getDescuentoAplicable(),
                        'estado' => $campana->estado_nombre,
                        'vigente' => $campana->esVigente()
                    ];
                });

            return response()->json([
                'status' => 'success',
                'campanas' => $campanas,
                'total' => count($campanas)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener campañas: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar estado de campaña de distribución
     */
    public function actualizarEstadoCampana($id, Request $request)
    {
        try {
            $campana = CampanaPromocionialDistribucion::findOrFail($id);

            $validated = Validator::make($request->all(), [
                'estado' => 'required|in:activa,inactiva,finalizada'
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Estado inválido'
                ], 422);
            }

            $campana->update(['estado' => $request->estado]);

            return response()->json([
                'status' => 'success',
                'message' => 'Estado de campaña actualizado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar campaña de distribución
     */
    public function eliminarCampanaDistribucion($id)
    {
        try {
            $campana = CampanaPromocionialDistribucion::findOrFail($id);
            $campana->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Campaña eliminada correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar página de renovación de stock
     */
    public function renovacionStock()
    {
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
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';
        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();
                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';
                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                    }
                }
            }
        }

        // Obtener bodegas de la institución
        $productos = collect();
        $bodegas = collect();

        if ($institucion && $institucion instanceof Instituciones) {
            $bodegas = Bodega::where('id_institucion', $institucion->id)
                             ->get();

            $bodegas_ids = $bodegas->pluck('id')->toArray();

            if (!empty($bodegas_ids)) {

            $productos_ingresados = Compras_detalle::select('compras_detalle.*',
            'productos.nombre as producto',
            'productos.codigo_interno',
            'productos.image_path',
            'productos.stock_minimo',
            'productos.stock_actual',
            'tipo_producto.nombre as tipo_producto',
            'unidades_medidas.nombre as unidad_medida',
            'marcas_productos.nombre as marca',
            'compras.estado',
            'compras.observaciones',
            'compras.fecha_emision',
            'proveedores.nombre as proveedor'
            )
            ->join('compras','compras_detalle.id_compra','compras.id')
            ->join('productos','compras_detalle.id_producto','productos.id')
            ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
            ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
            ->join('marcas_productos','productos.id_marca','marcas_productos.id')
            ->join('proveedores','compras.id_proveedor','proveedores.id')
            ->where('compras.id_institucion', $institucion->id) // cambiar por la institucion del usuario logueado
            ->get();

            foreach($productos_ingresados as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
                }
            }

         $tipos_productos = TipoProducto::all();

        // Contar productos con stock bajo
        $productos_con_stock_bajo = 0;
        if(!empty($productos_ingresados) && count($productos_ingresados) > 0) {
            foreach($productos_ingresados as $producto) {
                if($producto->stock_actual < $producto->stock_minimo) {
                    $productos_con_stock_bajo++;
                }
            }
        }

        return view('app.laboratorio.adm_general.distribuidores.renovacion_stock', [
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'productos' => $productos_ingresados,
            'tipos_productos' => $tipos_productos,
            'productos_con_stock_bajo' => $productos_con_stock_bajo
        ]);
    }

    /**
     * Mostrar estadísticas financieras
     */
    public function estadisticasFinanzas()
    {
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
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';
        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();
                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';
                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                    }
                }
            }
        }

        return view('app.laboratorio.adm_general.distribuidores.estadisticas_finanzas', [
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }
}
