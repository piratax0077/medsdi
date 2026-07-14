<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminInstServ;
use App\Models\AdminMed;
use App\Models\AdminMantenInst;
use App\Models\Antecedente;
use App\Models\AreasCm;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\AsistenteTipo;
use App\Models\PermisoAsistente;
use App\Models\Bono;
use App\Models\Bancos;
use App\Models\Bodega;
use App\Models\BoxCm;
use App\Models\Caja;
use App\Models\CajaOperativa;
use App\Models\Contador;
use App\Models\ConvenioInstitucion;
use App\Models\ContratoDependienteProfesional;
use App\Models\ContratoProfesionalInstitucion;
use App\Models\ContratoConvenioProfesional;
use App\Models\CuentaBancariaInst;
use App\Models\EmpresasConvenios;
use App\Models\TipoAreasCm;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\Compras;
use App\Models\ContratoDependiente;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\EspecialidadesCm;
use App\Models\EntregaMedicamentoCronico;
use App\Models\GastosInstitucionales;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\Laboratorio;
use App\Models\LiquidacionesProfesional;
use App\Models\LugarAtencion;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\MensajesDifusion;
use App\Models\MensajesProfesional;
use App\Models\Mensajes;
use App\Models\Paciente;
use App\Models\PacienteEstado;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\ProcedimientosCentro;
use App\Models\ProductoSolicitado;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalInstitucionConvenio;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionalConvenio;
use App\Models\RecetaControl;
use App\Models\RendicionCaja;
use App\Models\Remuneraciones;
use App\Models\Responsable;
use App\Models\ResponsableBodega;
use App\Models\Roles;
use App\Models\SalaEspera;
use App\Models\Servicios;
use App\Models\ServiciosInternos;
use App\Models\Sucursal;
use App\Models\InstitucionAdministrador;
use App\Models\TipoAdministrador;
use App\Models\TipoCuentaBancaria;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoEspecialidad;
use App\Models\TipoInstitucion;
use App\Models\TiposLaboratorio;
use App\Models\TipoProductoConvenios;
use App\Models\SubTipoEspecialidad;
use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// storage
use Illuminate\Support\Facades\Storage;

// DB
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class AdministradorCmController extends Controller
{
    public function index()
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
        $usuario = Auth::user();
        $roles = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
        $adm_medico = false;
        foreach($roles as $rol){
            if($rol == 'AdministradorMedico'){
                $adm_medico = true;
                break;
            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        $areas_cm = $this->dame_areas_cm($institucion->id_lugar_atencion);

        return view('app.adm_cm.home')->with(['institucion' => $institucion, 'adm_medico' => $adm_medico, 'areas_cm' => $areas_cm]);
    }

    public function areaContratosNuevos(){
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

        $regiones = Region::all();
        $bancos = Bancos::all();
        $especialidades = Especialidad::all();
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();



        foreach($profesionales_contratados as $profesional){
            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();
            if($contrato){
                $profesional->contrato = $contrato;
                $profesional->es_convenio = false;
                $especialidad_contrato = Especialidad::find($contrato->id_especialidad);
                $profesional->especialidad_contrato = $especialidad_contrato;
                $tipo_especialidad = TipoEspecialidad::find($contrato->id_tipo_especialidad);
                if($tipo_especialidad) $profesional->tipo_especialidad_contrato = $tipo_especialidad->nombre;
                $sub_tipo_especialidad = SubTipoEspecialidad::find($contrato->id_sub_tipo_especialidad);
                if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad_contrato = $sub_tipo_especialidad->nombre;

            }else{
                $profesional->contrato = null;
            }
            $profesional->horas_semanales = 45;
        }

        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();

        $lista_administrativo = array();
        if($LugarAtencion)
        {
            $lista_administrativo = $LugarAtencion->AdministrativoInstitucion()->get();

            if($lista_administrativo)
            {
                $array_roles = array();
                foreach ($lista_administrativo as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', 2860)->first();

                    $roles = $usuario->roles()->get();


                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->alias);
                    }

                    if(!empty($array_roles))
                        $lista_administrativo[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_administrativo[$key]->roles = '';

                    /** tipo administrativo */
                    $lista_administrativo[$key]->tipo_administrativo = TipoAdministrador::find($value->id_tipo_administrador);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_administrativo[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion','tipo_empleado')->where($filtro_cont)->first();
                }
            }
        }

        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_mantencion = array();
        if($LugarAtencion)
        {
            $lista_mantencion = $LugarAtencion->MantencionInstitucion()->get();

            if($lista_mantencion)
            {
                foreach ($lista_mantencion as $key => $value)
                {
                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    if($usuario){
                        $roles = $usuario->roles()->get();
                        $array_roles = array();
                        foreach ($roles as $key_2 => $value_2) {
                            array_push($array_roles, $value_2->name);
                        }

                        if(!empty($array_roles))
                            $lista_mantencion[$key]->roles = implode(",",$array_roles);
                        else
                            $lista_mantencion[$key]->roles = '';
                    }

                    if($value->empresa == 1){
                        $lista_mantencion[$key]->empresa = true;
                    }else{
                        $lista_mantencion[$key]->empresa = false;
                    }

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_mantencion[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion','tipo_empleado')->where($filtro_cont)->first();
                }
            }
        }

        /** LISTA CONTRATO */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }
        /** FIN LISTA CONTRATO */

        $lista_tipo_administrativo = TipoAdministrador::where('estado', 1)->get();

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        return view('app.adm_cm.contratos_nuevos',
            [
                'regiones' => $regiones,
                'bancos' => $bancos,
                'especialidades' => $especialidades,
                'profesionales_contratados' => $profesionales_contratados,
                'institucion' => $institucion,
                'lista_administrativo' => $lista_administrativo,
                'lista_tipo_contrato' => (object)$lista_tipo_contrato,
                'lista_tipo_administrativo' => $lista_tipo_administrativo,
                'lista_mantencion' => $lista_mantencion,
                'tipo_convenio' => $tipo_convenio
            ]
        );
    }

    public function agregar_area_cm(Request $request){
        try {

            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if(!$institucion){
                $institucion = Instituciones::find($request->id_institucion);
            }
            $profesional_responsable = Profesional::find($request->responsable_cargo);

            $area = new AreasCm();
            $area->id_institucion = $institucion->id;
            $area->id_lugar_atencion = $institucion->id_lugar_atencion;
            $area->id_tipo_area_cm = $request->tipo_area;
            $area->nombre = $profesional_responsable->nombre;
            $area->apellido_uno = $profesional_responsable->apellido_uno;
            $area->apellido_dos = $profesional_responsable->apellido_dos;
            $area->email = $profesional_responsable->email;
            $area->telefono = $profesional_responsable->telefono_uno;
            $area->descripcion = $request->descripcion_area;
            $area->ubicacion = $request->ubicacion_area;
            $area->id_responsable = $request->responsable_cargo;
            $area->save();
            $areas_cm = $this->dame_areas_cm($institucion->id_lugar_atencion);
            $v = view('fragm.areas_cm',[
                'areas_cm' => $areas_cm,
                'institucion' => $institucion
            ])->render();
            return response()->json(['estado' => 1, 'mensaje' => 'Área agregada correctamente', 'v' => $v]);
        } catch (\Exception $e) {
            return response()->json(['estado' => 0, 'mensaje' => $e->getMessage()]);
        }
    }

    public function editar_area_cm(Request $request){
        try {

            $area = AreasCm::find($request->id_area);

            $profesional_responsable = Profesional::find($request->id_responsable);
            $institucion = Instituciones::find($request->id_institucion);
            $area->id_tipo_area_cm = $request->tipo_area;
            $area->id_responsable = $request->id_responsable;
            $area->id_institucion = $request->id_institucion;
            $area->id_lugar_atencion = $institucion->id_lugar_atencion;
            $area->nombre = $profesional_responsable->nombre;
            $area->apellido_uno = $profesional_responsable->apellido_uno;
            $area->apellido_dos = $profesional_responsable->apellido_dos;
            $area->email = $profesional_responsable->email;
            $area->telefono = $profesional_responsable->telefono_uno;
            $area->ubicacion = $request->ubicacion;
            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if(!$institucion){
                $institucion = Instituciones::find($request->id_institucion);
            }
            if($area->save()){
                $areas = $this->dame_areas_cm($area->id_lugar_atencion);
                $v = view('fragm.areas_cm',[
                    'areas_cm' => $areas,
                    'institucion' => $institucion
                ])->render();
                return ['estado' => 1, 'mensaje' => 'Área actualizada correctamente', 'v' => $v];
            }else{
                return response()->json(['estado' => 0, 'mensaje' => 'Error al actualizar el área']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function asignar_profesionales_area(Request $request){
        try {

            // Buscar el área por ID
            $area_cm = AreasCm::find($request->id_area);


            // Verificar si el área existe
            if (!$area_cm) {
                return response()->json(['mensaje' => 'Área no encontrada'], 404);
            }

            // Convertir los datos de profesionales a JSON
            $datos_profesionales_json = json_encode($request->profesionales);

            // Asignar los datos JSON a la propiedad datos_profesionales
            $area_cm->datos_profesionales = $datos_profesionales_json;

            // Guardar los cambios en la base de datos
            $area_cm->save();

            $areas_cm = $this->dame_areas_cm($area_cm->id_lugar_atencion);

            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if(!$institucion){
                $institucion = Instituciones::find($request->id_institucion);
            }

            $v = view('fragm.areas_cm',[
                'area' => $area_cm,
                'areas_cm' => $areas_cm,
                'institucion' => $institucion
            ])->render();

            // Devolver el objeto actualizado
            return response()->json(['mensaje' => 'OK','areas_cm' => $area_cm,'v' => $v], 200);
        } catch (\Exception $e) {
            // Manejar la excepción y devolver el mensaje de error
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function centroMedico(){
        return view('app.adm_cm.home');
    }

    public function mi_horario_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();
        return $horario;
    }

    public function adm_medico(){
        $usuario = Auth::user();
        $instituciones = Instituciones::where('id_director_medico', $usuario->id)->get();
        if($instituciones->count() == 1){
            return view('app.adm_cm.adm_medico_id',[
                'institucion' => $instituciones[0]
            ]);
        }

        return view('app.adm_cm.adm_medico',[
            'instituciones' => $instituciones
        ]);

    }

    public function adm_medico_id($id){
        $usuario = Auth::user();
        $institucion = Instituciones::find($id);

        return view('app.adm_cm.adm_medico_id',[
            'institucion' => $institucion
        ]);
    }

	public function escritorio_asist_adm(){
        return view('app.asistente_adm_cm.escritorio_asist_adm');
    }

    public function asistente_adm_pedidos(){
        return view('app.asistente_adm_cm.asistente_adm_pedidos');
    }

    public function configuracion()
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
            // $responsable_comercial = AdminInstServ::where('id',$registro->UsuarioComercial()->first()->id)->first();
            // $responsable_farmacia = AdminInstServ::where('id',$registro->UsuarioFarmacia()->first()->id)->first();
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


        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }


        /** CONVENIOS */
        /** cargar convenios */

        /** CARGA TIPO DE CONTRATO (TIPO DE ASISTENTE, INSTITUCION, ADMINISTRADOR) */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        // $lista_tipo_institucion = TipoInstitucion::select('id', 'nombre',)->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        // foreach ($lista_tipo_institucion as $key => $value) {
        //     array_push($lista_tipo_contrato,array(
        //         'id' => $value->id,
        //         'nombre' => strtoupper($value->nombre),
        //     ));
        // }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }

        // var_dump((object)$lista_tipo_contrato);

        // echo json_encode($personal);

        $especialidades = TipoEspecialidad::where('id_especialidad',1)->get();

        $especialidades_cm = $this->dame_especialidades_cm($institucion->id);
        $otras_especialidades_cm = $this->dame_otras_especialidades_cm($institucion->id);
        $profesionales = $this->dame_profesionales($institucion->id_lugar_atencion);
        $tipos_areas_cm = TipoAreasCm::all();
        $areas_cm = $this->dame_areas_cm($institucion->id_lugar_atencion);

        $servicios = Servicios::all();

        $servicios_internos = $this->dame_servicios_internos($institucion->id);

        // buscar si el responsable tiene una area asignada
        $areas_institucion = AreasCm::where('id_institucion',$institucion->id)->get();
        $responsable_medico = Profesional::find(3);

        foreach($areas_institucion as $area){
            if($area->id_tipo_area_cm == 1){
                $responsable_medico = Profesional::find($area->id_responsable);
                break;
            }
        }

        $cargos = $lista_tipo_administrador;

        $usuario_director_cm = User::find($institucion->id_director_medico);

        $usuario_subdirector_cm = User::find($institucion->id_subdirector_medico);
        $usuario_director_gestion_cuidado = User::find($institucion->id_director_gestion_cuidado);
        $usuario_direccion_tecnica = User::find($institucion->id_director_tecnico);

        if($usuario_director_cm){
            $director_cm = Profesional::where('id_usuario',$usuario_director_cm->id)->first();
        }else{
            $director_cm = null;
        }

        if($usuario_subdirector_cm){
            $subdirector_cm = Profesional::where('id_usuario',$usuario_subdirector_cm->id)->first();
        }else{
            $subdirector_cm = null;
        }

        if($usuario_director_gestion_cuidado){
            $director_gestion_cuidado = Profesional::where('id_usuario',$usuario_director_gestion_cuidado->id)->first();
        }else{
            $director_gestion_cuidado = null;
        }

        if($usuario_direccion_tecnica){
            $direccion_tecnica = Profesional::where('id_usuario',$usuario_direccion_tecnica->id)->first();
        }else{
            $direccion_tecnica = null;
        }

        // Cargar todos los administradores asignados a la institución desde la tabla pivot
        $administradores_cm = InstitucionAdministrador::where('id_institucion', $institucion->id)
            ->where('estado', 1)
            ->get();
        // Resolver profesional para cada registro
        foreach ($administradores_cm as $adm) {
            $adm->profesional = Profesional::where('id_usuario', $adm->id_usuario)->first();
            $adm->tipo = TipoAdministrador::find($adm->id_tipo_administrador);
        }

        $tipos_laboratorio = TiposLaboratorio::all();
        $laboratorios = $this->dame_laboratorios($institucion->id_lugar_atencion);

        $boxes_cm = $this->dame_boxes_cm($institucion->id_lugar_atencion);

        $tipos_productos = TipoProducto::all();

        $bodegas = Bodega::where('id_institucion',$institucion->id)->get();

        foreach($bodegas as $bodega){
            $bodega->tipo_productos_autorizacion = json_decode($bodega->tipos_productos_autorizacion);
            $bodega->tipos_productos = json_decode($bodega->tipos_productos);
            $responsables = ResponsableBodega::select('responsable_bodega.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
                ->join('profesionales','responsable_bodega.id_responsable','=','profesionales.id')
                ->where('responsable_bodega.id_bodega',$bodega->id)
                ->get();
            $bodega->responsables = $responsables;
        }

		$filtro_se = array();
        $filtro_se[] = array('estado', 1);
        $filtro_se[] = array('id_institucion', $institucion->id);
        $sala_espera = SalaEspera::where($filtro_se)->get();

		$sucursales = Sucursal::where('id_institucion', $institucion->id)
                        ->with('Direccion')
                        ->get();
        foreach ($sucursales as $key => $value)
        {
            $ciudad_suc = Ciudad::find($value->direccion->id_ciudad);
            $region_suc = Region::find($ciudad_suc->id_region);
            $sucursales[$key]->ciudadObj = $ciudad_suc;
            $sucursales[$key]->regionObj = $region_suc;
        }

        return view('app.adm_cm.configuracion')->with([
            'tipo_institucion' => $tipo_institucion,
            'institucion' => $institucion,
            'responsable' => $responsable,
            'director_cm' => $director_cm ? $director_cm : null,
            'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
            'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
            'director_tecnico' => $direccion_tecnica ? $direccion_tecnica : null,
            'administradores_cm' => $administradores_cm,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'cargos' => $cargos,
            'personal' => $personal,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'especialidades' => $especialidades,
            'especialidades_cm' => $especialidades_cm,
            'otras_especialidades_cm' => $otras_especialidades_cm,
            'profesionales' => $profesionales,
            'tipos_areas_cm' => $tipos_areas_cm,
            'areas_cm' => $areas_cm,
            'servicios' => $servicios,
            'servicios_internos' => $servicios_internos,
            'tipos_laboratorio' => $tipos_laboratorio,
            'laboratorios' => $laboratorios,
            'boxes_servicio' => $boxes_cm,
            'tipos_productos' => $tipos_productos,
            'bodegas' => $bodegas,
            'sala_espera' => $sala_espera,
			'sucursales' => $sucursales,
        ]);
    }

    public function dame_boxes_cm($id_lugar_atencion){
        $boxes = BoxCm::where('id_lugar_atencion',$id_lugar_atencion)->get();
        foreach($boxes as $box){
            if($box->seccion == '1') $box->seccion = 'Pediatría';
            if($box->seccion == '2') $box->seccion = 'General';
            if($box->seccion == '3') $box->seccion = 'Gineco-Obstetricia';
            if($box->seccion == '4') $box->seccion = 'Rehabilitación';
        }
        return $boxes;
    }

    public function dame_laboratorios($id_lugar_atencion){
        $laboratorios = Sucursal::select('sucursal.*','direcciones.direccion','direcciones.numero_dir','direcciones.id_ciudad','laboratorios.id as id_laboratorio','laboratorios.id_usuario')
            ->join('direcciones','sucursal.id_direccion','=','direcciones.id')
            ->leftJoin('laboratorios', function($join) {
                $join->on('laboratorios.rut', '=', 'sucursal.rut')
                     ->whereNotNull('laboratorios.rut');
            })
            ->where('sucursal.id_lugar_atencion',$id_lugar_atencion)
            ->get();

        foreach($laboratorios as $laboratorio){
            $ciudad = Ciudad::where('id',$laboratorio->id_ciudad)->first();
            $laboratorio->ciudad = $ciudad->nombre;

            // Asignar nombre del tipo de sucursal
            switch ($laboratorio->tipo_sucursal) {
                case 1:
                    $laboratorio->tipo_sucursal_nombre = 'Clínico';
                    break;
                case 2:
                    $laboratorio->tipo_sucursal_nombre = 'Cardiológico';
                    break;
                case 3:
                    $laboratorio->tipo_sucursal_nombre = 'Anatomía patológica';
                    break;
                case 4:
                    $laboratorio->tipo_sucursal_nombre = 'Otorrinolaringología';
                    break;
                case 5:
                    $laboratorio->tipo_sucursal_nombre = 'Oftalmología';
                    break;
                case 6:
                    $laboratorio->tipo_sucursal_nombre = 'Radiología e Imágenes';
                    break;
                case 7:
                    $laboratorio->tipo_sucursal_nombre = 'Respiratorio';
                    break;
                case 8:
                    $laboratorio->tipo_sucursal_nombre = 'TAC y RNM';
                    break;
                default:
                    $laboratorio->tipo_sucursal_nombre = 'No definido';
            }
        }

        return $laboratorios;
    }

    public function dame_area($id, $id_lugar_atencion){

        $area = AreasCm::where('id',$id)->where('id_lugar_atencion',$id_lugar_atencion)->first();
        return $area;

    }

    public function eliminar_admin_cm(Request $req){

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
                $registro = Instituciones::find($req->id_institucion);
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

            $regiones = Region::all();
            $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                            ->where('id_institucion',$institucion->id)
                                            ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                            ->get();
            // var_dump($contratos);

            $personal = array();
            if($contratos)
            {
                // var_dump($contratos->count());
                if($contratos->count()>0)
                {
                    foreach ($contratos as $key_contratos => $value_contratos)
                    {
                        // Asistente Publico
                        // Asistente Jefa Caja
                        // Asistente Adm
                        // Asistente Online
                        if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                        {
                            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                    ->with(['AsistenteTipo' => function($query){
                                                        $query->select('id', 'nombre', 'descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            if($asistente)
                                array_push($personal, $asistente);
                        }
                        // adm_insitucion
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                        {
                            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                    ->with(['TipoAdministrador' => function($query){
                                                        $query->select('id', 'nombres as nombre','descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            // var_dump($administrador);
                            if($administrador)
                                array_push($personal, $administrador);
                        }
                        // contador
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                        {

                        }
                        // profesional (dependiente-> ej: admin medico)
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                        {

                        }

                    }
                }
            }

            if($req->tipo_admin == 1){
                $institucion->id_director_medico = null;
            }else if($req->tipo_admin == 2){
                $institucion->id_subdirector_medico = null;
            }else if($req->tipo_admin == 3){
                $institucion->id_director_gestion_cuidado = null;
            }else if($req->tipo_admin == 8){
                $institucion->id_director_tecnico = null;
            }
            $institucion->update();

            // Eliminar de la tabla pivot
            InstitucionAdministrador::where('id_institucion', $institucion->id)
                ->where('id_tipo_administrador', $req->tipo_admin)
                ->delete();

            // se elimina el rol de director medico
            $rol = Role::where('name','AdministradorMedico')->first();
            $usuario = User::where('id',$responsable->id)->first();
            $usuario->removeRole($rol);

            // Cargar colección actualizada para el fragmento
            $administradores_cm = InstitucionAdministrador::where('id_institucion', $institucion->id)
                ->where('estado', 1)
                ->get();
            foreach ($administradores_cm as $adm) {
                $adm->profesional = Profesional::where('id_usuario', $adm->id_usuario)->first();
                $adm->tipo = TipoAdministrador::find($adm->id_tipo_administrador);
            }

            if($institucion->id_director_medico){
                $director_cm = Profesional::where('id_usuario', $institucion->id_director_medico)->first();
                $cargo = 'director_cm';
            }else{
                $director_cm = null;
                $cargo = null;
            }

            if($institucion->id_subdirector_medico){
                $subdirector_cm = Profesional::where('id_usuario', $institucion->id_subdirector_medico)->first();
                $cargo = 'subdirector_cm';
            }else{
                $subdirector_cm = null;
                $cargo = null;
            }

            if($institucion->id_director_gestion_cuidado){
                $director_gestion_cuidado = Profesional::where('id_usuario', $institucion->id_director_gestion_cuidado)->first();
                $cargo = 'director_gestion_cuidado';
            }else{
                $director_gestion_cuidado = null;
                $cargo = null;
            }

            if($institucion->id_director_comercial){
                $director_comercial = Profesional::where('id_usuario', $institucion->id_director_comercial)->first();
                $cargo = 'director_comercial';
            }else{
                $director_comercial = null;
                $cargo = null;
            }

            if($institucion->id_director_tecnico){
                $director_tecnico = Profesional::where('id_usuario', $institucion->id_director_tecnico)->first();
                $cargo = 'director_tecnico';
            }else{
                $director_tecnico = null;
                $cargo = null;
            }

            $v = view('fragm.administradores_cm',[
                'director_cm' => $director_cm ? $director_cm : null,
                'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
                'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
                'director_tecnico' => $director_tecnico ? $director_tecnico : null,
                'responsable' => $responsable ? $responsable : null,
                'institucion' => $institucion,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
                'cargo' => $req->tipo_admin,
                'administradores_cm' => $administradores_cm,
            ])->render();

            return ['estado' => 1, 'mensaje' => 'Administrador eliminado', 'v' => $v];
    }

    public function registrar_servicio_cm(Request $req){
        try {

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

            $regiones = Region::all();
            $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                            ->where('id_institucion',$institucion->id)
                                            ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                            ->get();
            // var_dump($contratos);

            $personal = array();
            if($contratos)
            {
                // var_dump($contratos->count());
                if($contratos->count()>0)
                {
                    foreach ($contratos as $key_contratos => $value_contratos)
                    {
                        // Asistente Publico
                        // Asistente Jefa Caja
                        // Asistente Adm
                        // Asistente Online
                        if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                        {
                            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                    ->with(['AsistenteTipo' => function($query){
                                                        $query->select('id', 'nombre', 'descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            if($asistente)
                                array_push($personal, $asistente);
                        }
                        // adm_insitucion
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                        {
                            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                    ->with(['TipoAdministrador' => function($query){
                                                        $query->select('id', 'nombres as nombre','descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            // var_dump($administrador);
                            if($administrador)
                                array_push($personal, $administrador);
                        }
                        // contador
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                        {

                        }
                        // profesional (dependiente-> ej: admin medico)
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                        {

                        }

                    }
                }
            }
            $servicio = Servicios::find($req->id_servicio);
            $nuevo_servicio = new ServiciosInternos();

            // $responsable = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
            // ->leftjoin('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
            // ->where('profesionales_lugares_atencion.id',$req->id_responsable)
            // ->first();
            $profesional = Profesional::find($req->id_responsable);

            $nuevo_servicio->id_institucion = $institucion->id;
            $nuevo_servicio->id_lugar_atencion = $institucion->id_lugar_atencion;
            $nuevo_servicio->id_servicio = $req->id_servicio;
            $nuevo_servicio->nombre = $servicio->nombre;
            $nuevo_servicio->id_responsable = $profesional->id;
            $nuevo_servicio->numero_salas = $req->numero_salas;
            $nuevo_servicio->numero_camas = $req->numero_camas;
            $nuevo_servicio->camas_disponibles = $req->numero_camas;
            $nuevo_servicio->save();

            $servicios_internos = $this->dame_servicios_internos($institucion->id);

            return ['estado' => 1, 'mensaje' => 'Servicio registrado', 'servicios_internos' => $servicios_internos];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' =>'error','mensaje' => $e->getMessage()];
        }
    }

    public function dame_servicios_internos($id_institucion){
        $servicios_internos = ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                            ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                            ->where('servicio_interno.id_institucion',$id_institucion)
                            ->get();

        return $servicios_internos;
    }

    public function registrar_servicio(Request $req){
        try {
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

            $regiones = Region::all();
            $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                            ->where('id_institucion',$institucion->id)
                                            ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                            ->get();
            // var_dump($contratos);

            $personal = array();
            if($contratos)
            {
                // var_dump($contratos->count());
                if($contratos->count()>0)
                {
                    foreach ($contratos as $key_contratos => $value_contratos)
                    {
                        // Asistente Publico
                        // Asistente Jefa Caja
                        // Asistente Adm
                        // Asistente Online
                        if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                        {
                            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                    ->with(['AsistenteTipo' => function($query){
                                                        $query->select('id', 'nombre', 'descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            if($asistente)
                                array_push($personal, $asistente);
                        }
                        // adm_insitucion
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                        {
                            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                    ->with(['TipoAdministrador' => function($query){
                                                        $query->select('id', 'nombres as nombre','descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            // var_dump($administrador);
                            if($administrador)
                                array_push($personal, $administrador);
                        }
                        // contador
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                        {

                        }
                        // profesional (dependiente-> ej: admin medico)
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                        {

                        }

                    }
                }
            }

            // buscar al responsable
            $responsable = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','profesionales.rut')
            ->leftjoin('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
            ->where('profesionales_lugares_atencion.id',$req->id_responsable_servicio)
            ->first();

            $direccion = new Direccion();
            $direccion->direccion = $req->direccion_servicio;
            $direccion->numero_dir = 1;
            $direccion->id_ciudad = 1;
            $direccion->save();

            $servicio = new Servicios();
            $servicio->nombre = $req->nombre_servicio;
            $servicio->id_direccion = $direccion->id;
            $servicio->rut = $req->rut_servicio;
            $servicio->telefono = $req->telefono_servicio;
            $servicio->email = $req->email_servicio;
            $servicio->id_usuario = Auth::user()->id;
            $servicio->rut_responsable = $responsable->rut;
            $servicio->id_responsable = $responsable->id_profesional;
            $servicio->nombre_responsable = $responsable->nombre.' '.$responsable->apellido_uno.' '.$responsable->apellido_dos;
            $servicio->estado = 1;
            $servicio->id_servicio = 1;
            $servicio->save();

            // guardar el servicio interno en la institucion
            $servicio_interno = new ServiciosInternos();
            $servicio_interno->id_institucion = $institucion->id;
            $servicio_interno->id_lugar_atencion = $institucion->id_lugar_atencion;
            $servicio_interno->id_servicio = $servicio->id;
            $servicio_interno->nombre = $req->nombre_servicio;
            $servicio_interno->id_responsable = $responsable->id_profesional;
            $servicio_interno->save();

            return ['estado' => 1, 'mensaje' => 'Servicio registrado'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function eliminar_servicio_cm(Request $req){
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

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }
        $servicio = ServiciosInternos::find($req->id);
        $servicio->delete();

        $servicios_internos = $this->dame_servicios_internos($institucion->id);
        return ['estado' => 1, 'mensaje' => 'Servicio eliminado','servicios_internos' => $servicios_internos];
    }

    public function dame_areas_cm($id_lugar_atencion){
        $areas_cm = AreasCm::select('areas_cm.*','tipos_areas_cm.nombre as tipo_area','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('tipos_areas_cm','tipos_areas_cm.id','=','areas_cm.id_tipo_area_cm')
                            ->leftjoin('profesionales','profesionales.id','=','areas_cm.id_responsable')
                            ->where('areas_cm.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        foreach ($areas_cm as $key => $area_cm) {
            if($area_cm->datos_profesionales){
                $area_cm->datos_profesionales = json_decode($area_cm->datos_profesionales);
                $profesionales = array();
                foreach ($area_cm->datos_profesionales as $key => $value) {
                    $profesional = Profesional::find($value);
                    array_push($profesionales,$profesional);
                }
                $area_cm->profesionales = $profesionales;
            }else{
                $area_cm->profesionales = null;
            }
        }

        return $areas_cm;
    }

    public function dame_profesionales($id_lugar_atencion){
        $profesionales = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','profesionales.rut')
                            ->join('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
                            ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                            ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        foreach($profesionales as $p){
            $p->nombre = strtoupper($p->nombre);
            $p->apellido_uno = strtoupper($p->apellido_uno);
            $p->apellido_dos = strtoupper($p->apellido_dos);
        }
        return $profesionales;
    }

    public function editarDatosPerfil(Request $request)
    {
        $datos = array();

        $id_institucion = $request->id_institucion;
        $tipo_institucion = $request->tipo_institucion;
        $nombre = '';
        $razon_social = '';
        $rut = '';
        $certificado_supersalud = '';
        $id_direccion = '';
        $logo = '';
        $telefono = '';
        $whatsapp = '';
        $sucursales = '';
        $horario_atencion = '';
        $id_usuario = '';
        $email = '';
        $rut_responsable = '';
        $id_responsable = '';
        $nombre_responsable = '';
        $id_servicio = '';
        $id_tipo_institucion = '';
        $sitio_web = '';
        $region = '';
        $direccion = '';
        $numero_dir = '';

        if(!empty($request->nombre))
            $nombre = $request->nombre;
        if(!empty($request->razon_social))
            $razon_social = $request->razon_social;
        if(!empty($request->rut))
            $rut = $request->rut;
        if(!empty($request->certificado_supersalud))
            $certificado_supersalud = $request->certificado_supersalud;
        // if(!empty($request->id_direccion))
        //     $id_direccion = $request->id_direccion;
        if(!empty($request->logo))
            $logo = $request->logo;
        if(!empty($request->telefono))
            $telefono = $request->telefono;
        if(!empty($request->whatsapp))
            $whatsapp = $request->whatsapp;
        if(isset($request->sucursales) && ($request->sucursales == 1 || $request->sucursales == 0))
            $sucursales = $request->sucursales;
        if(!empty($request->horario_atencion))
            $horario_atencion = $request->horario_atencion;
        if(!empty($request->id_usuario))
            $id_usuario = $request->id_usuario;
        if(!empty($request->email))
            $email = $request->email;
        if(!empty($request->rut_responsable))
            $rut_responsable = $request->rut_responsable;
        if(!empty($request->id_responsable))
            $id_responsable = $request->id_responsable;
        if(!empty($request->nombre_responsable))
            $nombre_responsable = $request->nombre_responsable;
        if(!empty($request->id_servicio))
            $id_servicio = $request->id_servicio;
        if(!empty($request->id_tipo_institucion))
            $id_tipo_institucion = $request->id_tipo_institucion;
        if(!empty($request->sitio_web))
            $sitio_web = $request->sitio_web;

        if(isset($request->region))
            $region = $request->region;
        if(isset($request->ciudad))
            $ciudad = $request->ciudad;
        if(isset($request->direccion))
            $direccion = $request->direccion;
        if(isset($request->numero_dir))
            $numero_dir = $request->numero_dir;




        if($tipo_institucion == 'institucion')
        {
            $registro = Instituciones::find($id_institucion);
            if($registro)
            {
                if(!empty($nombre))
                    $registro->nombre = $nombre;
                if(!empty($razon_social))
                    $registro->razon_social = $razon_social;
                if(!empty($rut))
                    $registro->rut = $rut;
                if(!empty($certificado_supersalud))
                    $registro->certificado_supersalud = $certificado_supersalud;
                if(!empty($id_direccion))
                    $registro->id_direccion = $id_direccion;
                if(!empty($logo))
                    $registro->logo = $logo;
                if(!empty($telefono))
                    $registro->telefono = $telefono;
                if(!empty($whatsapp))
                    $registro->whatsapp = $whatsapp;
                if($sucursales == '1' || $sucursales == '0')
                    $registro->sucursales = $sucursales;
                if(!empty($horario_atencion))
                    $registro->horario_atencion = $horario_atencion;
                if(!empty($id_usuario))
                    $registro->id_usuario = $id_usuario;
                if(!empty($email))
                    $registro->email = $email;
                if(!empty($rut_responsable))
                    $registro->rut_responsable = $rut_responsable;
                if(!empty($id_responsable))
                    $registro->id_responsable = $id_responsable;
                if(!empty($nombre_responsable))
                    $registro->nombre_responsable = $nombre_responsable;
                if(!empty($id_servicio))
                    $registro->id_servicio = $id_servicio;
                if(!empty($id_tipo_institucion))
                    $registro->id_tipo_institucion = $id_tipo_institucion;
                if(!empty($sitio_web))
                    $registro->sitio_web = $sitio_web;


                if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
                {
                    $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                    if($registro_direccion)
                    {
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'registro no actualizado';
                        }
                    }
                    else
                    {
                        $registro_direccion = new Direccion();
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'direccion registrada';
                            $registro->id_direccion = $registro_direccion->id;
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'direccion no registrada';
                        }
                    }
                }

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros modificados satifactoriamente';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'registros No modificados';
                }
            }
        }
        else if($tipo_institucion == 'servicio')
        {
            /**pendiente */
        }
        else if($tipo_institucion == 'laboratorio')
        {
            $registro = Laboratorio::find($id_institucion);
            if($registro)
            {
                if(!empty($nombre))
                    $registro->nombre = $nombre;
                if(!empty($rut))
                    $registro->rut = $rut;
                if(!empty($telefono))
                    $registro->telefono = $telefono;
                if(!empty($email))
                    $registro->email = $email;
                if($sucursales == '1' || $sucursales == '0')
                    $registro->sucursales = $sucursales;

                if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
                {
                    $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                    if($registro_direccion)
                    {
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'registro no actualizado';
                        }
                    }
                }

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros modificados satifactoriamente';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'registros No modificados';
                }
            }
        }


        return $datos;
    }

    public function editarDatosPerfilResponsable(Request $request)
    {
        $datos = array();

        $rut = '';
        $nombres = '';
        $apellido_uno = '';
        $apellido_dos = '';
        $telefono_uno = '';
        $telefono_dos = '';
        $sexo = '';
        $email = '';
        $fecha_nac = '';
        $id_tipo_administrador = '';
        $id_premium = '';
        $id_direccion = '';
        // $id_antecedente = '';
        $id_admin = '';
        $region = '';
        $ciudad = '';
        $direccion = '';
        $numero_dir = '';

        $id_responsable = $request->id_responsable;

        if(!empty($request->rut))
            $rut = $request->rut;
        if(!empty($request->nombres))
            $nombres = $request->nombres;
        if(!empty($request->apellido_uno))
            $apellido_uno = $request->apellido_uno;
        if(!empty($request->apellido_dos))
            $apellido_dos = $request->apellido_dos;
        if(!empty($request->telefono_uno))
            $telefono_uno = $request->telefono_uno;
        if(!empty($request->telefono_dos))
            $telefono_dos = $request->telefono_dos;
        if(!empty($request->sexo))
            $sexo = $request->sexo;
        if(!empty($request->email))
            $email = $request->email;
        if(!empty($request->fecha_nac))
            $fecha_nac = $request->fecha_nac;
        if(!empty($request->id_tipo_administrador))
            $id_tipo_administrador = $request->id_tipo_administrador;
        if(!empty($request->id_premium))
            $id_premium = $request->id_premium;
        if(!empty($request->id_direccion))
            $id_direccion = $request->id_direccion;
        // if(!empty($request->id_antecedente))
        //     $id_antecedente = $request->id_antecedente;
        // if(!empty($request->id_admin))
            $id_admin = $request->id_admin;


        if(isset($request->region))
            $region = $request->region;
        if(isset($request->ciudad))
            $ciudad = $request->ciudad;
        if(isset($request->direccion))
            $direccion = $request->direccion;
        if(isset($request->numero_dir))
            $numero_dir = $request->numero_dir;


        $registro = AdminInstServ::find($id_responsable);
        if($registro)
        {
            if(!empty($rut))
                $registro->rut = $rut;
            if(!empty($nombres))
                $registro->nombres = $nombres;
            if(!empty($apellido_uno))
                $registro->apellido_uno = $apellido_uno;
            if(!empty($apellido_dos))
                $registro->apellido_dos = $apellido_dos;
            if(!empty($telefono_uno))
                $registro->telefono_uno = $telefono_uno;
            if(!empty($telefono_dos))
                $registro->telefono_dos = $telefono_dos;
            if(!empty($sexo))
                $registro->sexo = $sexo;
            if(!empty($email))
                $registro->email = $email;
            if(!empty($fecha_nac))
                $registro->fecha_nac = $fecha_nac;
            if(!empty($id_tipo_administrador))
                $registro->id_tipo_administrador = $id_tipo_administrador;
            if(!empty($id_premium))
                $registro->id_premium = $id_premium;
            if(!empty($id_direccion))
                $registro->id_direccion = $id_direccion;
            if(!empty($id_admin))
                $registro->id_admin = $id_admin;


            if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
            {
                $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                if($registro_direccion)
                {
                    $registro_direccion->direccion = $direccion;
                    $registro_direccion->numero_dir = $numero_dir;
                    $registro_direccion->id_ciudad = $ciudad;
                    if($registro_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'registro no actualizado';
                    }
                }
                else
                {
                    $registro_direccion = new Direccion();
                    $registro_direccion->direccion = $direccion;
                    $registro_direccion->numero_dir = $numero_dir;
                    $registro_direccion->id_ciudad = $ciudad;
                    if($registro_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'direccion registrada';
                        $registro->id_direccion = $registro_direccion->id;
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'direccion no registrada';
                    }
                }
            }

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros modificados satifactoriamente';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros No modificados';
            }
        }

        return $datos;
    }

    public function editarDatosPerfilResponsableMedico(Request $req){

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

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }

        $profesional = Profesional::with(['Direccion'])->where('id', $req->id_responsable)->first();

        $profesional->nombre = $req->nombres;
        $profesional->apellido_uno = $req->apellido_uno;
        $profesional->apellido_dos = $req->apellido_dos;
        $profesional->sexo = $req->sexo;
        $profesional->fecha_nacimiento = $req->fecha_nac;
        $profesional->email = $req->email;
        $profesional->telefono_uno = $req->telefono_uno;
        $profesional->telefono_dos = $req->telefono_dos;

        $profesional->save();

        $direccion = Direccion::where('id', $profesional->id_direccion)->first();

        if($direccion)
        {
            // $direccion->region = $request->region;
            $direccion->id_ciudad = $req->ciudad;
            $direccion->direccion = $req->direccion;
            $direccion->numero_dir = $req->numero_dir;
            if($direccion->save())
            {
                $success = true;
            }
            else
            {
                $success = false;
            }
        }
        else
        {
            $direccion = new Direccion();
            // $direccion->region = $request->region;
            $direccion->id_ciudad = $req->ciudad;
            $direccion->direccion = $req->direccion;
            $direccion->numero_dir = $req->numero_dir;
            if($direccion->save())
            {
                $success = true;
            }
            else
            {
                $success = false;
            }
        }
        $administradores_cm = InstitucionAdministrador::where('id_institucion', $institucion->id)
            ->where('estado', 1)
            ->get();
        foreach ($administradores_cm as $adm) {
            $adm->profesional = Profesional::where('id_usuario', $adm->id_usuario)->first();
            $adm->tipo = TipoAdministrador::find($adm->id_tipo_administrador);
        }

        $v = view('fragm.administradores_cm', [
            'administradores_cm' => $administradores_cm,
            'institucion' => $institucion,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ])->render();

        return ['estado' => 1, 'mensaje' => 'Datos actualizados', 'profesional' => $profesional, 'v' => $v];
    }

    // ACTUALIZAR CONTRASEÑA DEL RESPONSABLE DE LA INSTITUCION
    public function cambioContrasenaPerfilResponsable(Request $request)
    {
        $mensaje_error = '';
        $mensaje_error2 = '';
        $mensaje_success = '';
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->responsable_actual)) {
            $error['responsable_actual'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }
        else
        {
            $filtro = array();
            $filtro[] = array('id', $request->responsable_id);
            $user = User::where( $filtro )->first();


            if($user == NULL){
                $error['contrasena_actual'] = 'Contraseña actual no es valida';
                $mensaje_error2 .= 'Contraseña actual no es valida\n';
                $valido = 0;
            }
            else
            {
                $password = $request->responsable_actual;
                if (!password_verify($password, $user->password)) {
                    $error['contrasena_actual'] = 'Contraseña actual no es valida';
                    $mensaje_error2 .= 'Contraseña actual no es valida\n';
                    $valido = 0;
                }
            }

        }

        if(empty($request->responsable_nueva)) {
            $error['responsable_nueva'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(empty($request->responsable_validacion)) {
            $error['responsable_validacion'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(!empty($request->responsable_nueva)  && !empty($request->responsable_validacion))
        {
            if($request->responsable_nueva != $request->responsable_validacion)
            {
                $error['password_confirmacion'] = 'Contraseñas no son iguales';
                $mensaje_error2 .= 'Contraseñas no son iguales\n';
                $valido = 0;
            }
        }

        if($valido == 1)
        {
            $user->password = Hash::make($request->responsable_nueva);
            if($user->save())
            {
                $datos['estado'] = 1 ;
                $datos['msj'] = 'Contraseña actualizada' ;
                $mensaje_success = 'Contraseña Actualizada';
            }
            else
            {
                $datos['estado'] = 0 ;
                $datos['msj'] = 'Problemas al Actualizar la Contraseña' ;
                $mensaje_error = 'Problemas al Actualizar la Contraseña';
            }
        }
        else
        {
            $datos['estado'] = 0 ;
            $datos['msj'] = 'campos requeridos' ;
            $datos['error'] = $error;
            $mensaje_error = 'Campos requeridos.';
        }

        // return $datos;

        if(!empty($mensaje_error))
            return back()->with(['error' => $mensaje_error.'\n'.$mensaje_error2, 'titulo_error' => 'Cambio de Contraseña']);
        else
        {
            //envio de correo
            return back()->with(['mensaje' => $mensaje_success,'titulo_mensaje'=> 'Perfil Administrador De Institución']);
            // return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');
            // return back()->with( 'mensaje', 'Contraseña actualizada');

        }
    }

    public function cargaPersonalPersona(Request $request)
    {
        $datos = array();
        $nombre_tipo = $request->nombre_tipo;
        $id_tipo = $request->id_tipo;
        $id = $request->id;
        $id_lugar_atencion = $request->id_lugar_atencion;
        $datos['test'] = mb_strtoupper($nombre_tipo);
        $datos['test1'] = strpos(strtoupper($nombre_tipo), 'ASISTENTE');
        $datos['test2'] = strpos(strtoupper($nombre_tipo), 'ADMINISTRADOR');

        if(strstr(strtoupper($nombre_tipo), 'ASISTENTE') !== FALSE)
        {
            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                    ->with(['AsistenteTipo' => function($query){
                                        $query->select('id', 'nombre', 'descripcion');
                                    }])
                                    ->with(['Direccion' => function($query){
                                        $query->with('Ciudad');
                                    }])
                                    ->where('id', $id)
                                    ->first();

            if(!empty($id_lugar_atencion))
            {
                $asistente_lugar = AsistenteLugarAtencion::where('id_asistente',$id)->where('id_lugar_atencion', $id_lugar_atencion)->first();
                $asistente->asistente_lugar = $asistente_lugar;
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $asistente;
            $datos['tipo'] = 'ASISTENTE';
            $datos['request'] = $request->all();
        }
        // adm_insitucion
        else if(strpos(strtoupper($nombre_tipo), 'ADMINISTRADOR') >= 0)
        {
            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                    ->with(['TipoAdministrador' => function($query){
                                        $query->select('id', 'nombres','descripcion');
                                    }])
                                    ->with(['Direccion' => function($query){
                                        $query->with('Ciudad');
                                    }])
                                    ->where('id', $id)
                                    ->first();

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $administrador;
            $datos['tipo'] = 'ADMINISTRADOR';
            $datos['request'] = $request->all();
        }
        // contador
        else if(strpos(strtoupper($nombre_tipo), 'CONTADOR') >= 0)
        {

        }
        // profesional
        else if(strpos(strtoupper($nombre_tipo), 'PROFESIONAL') >= 0)
        {

        }

        return $datos;
    }

    public function actualizarAccesoPersonal(Request $request)
    {
        $datos = array();
        // tipo_personal
        // id_persona
        // id_personal
        // id_lugar_atencion
        // clave
        // id_edit

        if(strstr(strtoupper($request->tipo_personal), 'ASISTENTE') !== FALSE)
        {
            $registro = AsistenteLugarAtencion::where('id', $request->id_edit)->first();
            $registro->token = $request->clave;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'actualizacion exitosa';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'actualizacion fallida';
            }


        }
        else if(strpos(strtoupper($request->tipo_personal), 'ADMINISTRADOR') >= 0)
        {
            // $registro = AsistenteLugarAtencion::where('id', $request->id_edit)->first();
            // $registro->token = $request->clave;

            // if($registro->save())
            // {
            //     $datos['estado'] = 1;
            //     $datos['msj'] = 'actualizacion exitosa';
            // }
            $datos['estado'] = 0;
                $datos['msj'] = 'actualizacion fallida';
        }
        // contador
        else if(strpos(strtoupper($request->tipo_personal), 'CONTADOR') >= 0)
        {

        }
        // profesional
        else if(strpos(strtoupper($request->tipo_personal), 'PROFESIONAL') >= 0)
        {

        }

        return $datos;
    }

    public function estadisticas(){
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
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */


        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $profesionales = [];
        if(isset($institucion)){
            $sucursales = Sucursal::where('id_institucion', $institucion->id)->get();
            $LugaresAtencion = [];
            foreach ($sucursales as $sucursal) {
                $lugar = LugarAtencion::where('id', $sucursal->id_lugar_atencion)->first();
                if ($lugar) {
                    $LugaresAtencion[] = $lugar;
                }
            }
            foreach ($LugaresAtencion as $lugar) {
                $profesionales_lugar = $lugar->Profesionales()->get();
                foreach ($profesionales_lugar as $prof) {
                    $profesionales[] = $prof;
                }
            }
            // Agregar profesionales que trabajen directamente en la institución
            $profesionales_institucion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $institucion->id_lugar_atencion)->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')->get();
            foreach ($profesionales_institucion as $prof_inst) {
                $profesionales[] = $prof_inst;
            }
            // Eliminar duplicados por id
            $profesionales = collect($profesionales)->unique('id')->values()->all();
        }else{
            $sucursales = [];
        }

        if($institucion->id_tipo_institucion == 3){
            return view('app.laboratorio.lab_profesional.estadisticas',[
                'institucion' => $institucion,
                'tipo_institucion' => $tipo_institucion
            ]);
        }

        $dashboard_stats = [];
        $admin_professionals = [];
        $fecha_inicio_filtro = request('fecha_inicio');
        $fecha_fin_filtro = request('fecha_fin');
        $filtro_rango_activo = false;
        if (isset($institucion) && !empty($institucion->id_lugar_atencion)) {
            $fecha = Carbon::now();
            $fechaInicio = null;
            $fechaFin = null;

            if (!empty($fecha_inicio_filtro) && !empty($fecha_fin_filtro)) {
                try {
                    $fechaInicio = Carbon::parse($fecha_inicio_filtro)->startOfDay();
                    $fechaFin = Carbon::parse($fecha_fin_filtro)->endOfDay();

                    if ($fechaInicio->gt($fechaFin)) {
                        $tmp = $fechaInicio->copy();
                        $fechaInicio = $fechaFin->copy()->startOfDay();
                        $fechaFin = $tmp->copy()->endOfDay();
                    }

                    $filtro_rango_activo = true;
                    $fecha_inicio_filtro = $fechaInicio->format('Y-m-d');
                    $fecha_fin_filtro = $fechaFin->format('Y-m-d');
                } catch (\Throwable $e) {
                    $fechaInicio = null;
                    $fechaFin = null;
                    $filtro_rango_activo = false;
                }
            }

            $idLugarAtencion = (int) $institucion->id_lugar_atencion;
            $bonoReferenciaColumn = Schema::hasColumn('bonos', 'referencia') ? 'referencia' : 'id_referencia';

            $bonosBase = Bono::query()->whereIn('bonos.' . $bonoReferenciaColumn, function ($sub) use ($idLugarAtencion) {
                $sub->select('horas_medicas.id')
                    ->from('horas_medicas');

                // id_referencia/referencia apunta a horas_medicas.id.
                if (Schema::hasColumn('horas_medicas', 'id_lugar_atencion')) {
                    $sub->where('horas_medicas.id_lugar_atencion', $idLugarAtencion);
                } else {
                    // Fallback defensivo para instalaciones antiguas.
                    $sub->join('fichas_atenciones', 'fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion')
                        ->where('fichas_atenciones.id_lugar_atencion', $idLugarAtencion);
                }
            });

            $bonosMesBase = (clone $bonosBase);
            if ($filtro_rango_activo) {
                $bonosMesBase->whereBetween('fecha_atencion', [$fechaInicio, $fechaFin]);
            } else {
                $bonosMesBase
                    ->whereMonth('fecha_atencion', $fecha->month)
                    ->whereYear('fecha_atencion', $fecha->year);
            }

            $total_dia = (clone $bonosMesBase)
                ->whereDate('fecha_atencion', $fecha)
                ->sum('valor_atencion');

            $total_mes = (clone $bonosMesBase)
                ->sum('valor_atencion');

            $total_anio = (clone $bonosMesBase)
                ->sum('valor_atencion');

            $cant_bonos = (clone $bonosMesBase)
                ->count();

            $total_rendido = (clone $bonosMesBase)
                ->where('rendido', 1)
                ->sum('valor_atencion');

            $total_pendiente = (clone $bonosMesBase)
                ->where('rendido', 0)
                ->sum('valor_atencion');

            // Ingresos/Egresos contables del mes para dashboard.
            $ingresos_mes = (float) $total_mes;


            $comprasQueryDashboard = Compras::query();

            if (Schema::hasColumn('compras', 'id_institucion')) {
                $idsInstitucionValidos = [(int) $institucion->id];
                if (!empty($institucion->id_lugar_atencion)) {
                    $idsInstitucionValidos[] = (int) $institucion->id_lugar_atencion;
                }

                $comprasQueryDashboard->where(function ($query) use ($institucion, $idsInstitucionValidos) {
                    $query->whereIn('id_institucion', array_values(array_unique($idsInstitucionValidos)))
                        ->orWhere(function ($q) use ($institucion) {
                            $q->whereNull('id_institucion')
                                ->whereHas('proveedor', function ($proveedorQuery) use ($institucion) {
                                    if (Schema::hasColumn('proveedores', 'id_institucion')) {
                                        $proveedorQuery->where('id_institucion', $institucion->id);
                                    }
                                });
                        });
                });
            }

            $aplicarFiltroPeriodoCompras = function ($query) use ($filtro_rango_activo, $fechaInicio, $fechaFin, $fecha) {
                $tieneFechaEmision = Schema::hasColumn('compras', 'fecha_emision');
                $tieneCreatedAt = Schema::hasColumn('compras', 'created_at');
                $tieneFechaPago = Schema::hasColumn('compras', 'fecha_pago');

                $query->where(function ($q) use ($filtro_rango_activo, $fechaInicio, $fechaFin, $fecha, $tieneFechaEmision, $tieneCreatedAt, $tieneFechaPago) {
                    if ($filtro_rango_activo) {
                        if ($tieneFechaEmision) {
                            $q->whereBetween('fecha_emision', [$fechaInicio, $fechaFin]);

                            $q->orWhere(function ($qFallback) use ($fechaInicio, $fechaFin, $tieneCreatedAt, $tieneFechaPago) {
                                $qFallback->whereNull('fecha_emision')
                                    ->where(function ($qFallbackFecha) use ($fechaInicio, $fechaFin, $tieneCreatedAt, $tieneFechaPago) {
                                        if ($tieneCreatedAt) {
                                            $qFallbackFecha->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                                        }

                                        if ($tieneFechaPago) {
                                            if ($tieneCreatedAt) {
                                                $qFallbackFecha->orWhereBetween('fecha_pago', [$fechaInicio, $fechaFin]);
                                            } else {
                                                $qFallbackFecha->whereBetween('fecha_pago', [$fechaInicio, $fechaFin]);
                                            }
                                        }
                                    });
                            });
                        } elseif ($tieneCreatedAt || $tieneFechaPago) {
                            if ($tieneCreatedAt) {
                                $q->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                            }

                            if ($tieneFechaPago) {
                                if ($tieneCreatedAt) {
                                    $q->orWhereBetween('fecha_pago', [$fechaInicio, $fechaFin]);
                                } else {
                                    $q->whereBetween('fecha_pago', [$fechaInicio, $fechaFin]);
                                }
                            }
                        }
                    } else {
                        if ($tieneFechaEmision) {
                            $q->whereMonth('fecha_emision', $fecha->month)
                                ->whereYear('fecha_emision', $fecha->year);

                            $q->orWhere(function ($qFallback) use ($fecha, $tieneCreatedAt, $tieneFechaPago) {
                                $qFallback->whereNull('fecha_emision')
                                    ->where(function ($qFallbackFecha) use ($fecha, $tieneCreatedAt, $tieneFechaPago) {
                                        if ($tieneCreatedAt) {
                                            $qFallbackFecha->whereMonth('created_at', $fecha->month)
                                                ->whereYear('created_at', $fecha->year);
                                        }

                                        if ($tieneFechaPago) {
                                            if ($tieneCreatedAt) {
                                                $qFallbackFecha->orWhere(function ($qFechaPago) use ($fecha) {
                                                    $qFechaPago->whereMonth('fecha_pago', $fecha->month)
                                                        ->whereYear('fecha_pago', $fecha->year);
                                                });
                                            } else {
                                                $qFallbackFecha->whereMonth('fecha_pago', $fecha->month)
                                                    ->whereYear('fecha_pago', $fecha->year);
                                            }
                                        }
                                    });
                            });
                        } elseif ($tieneCreatedAt || $tieneFechaPago) {
                            if ($tieneCreatedAt) {
                                $q->whereMonth('created_at', $fecha->month)
                                    ->whereYear('created_at', $fecha->year);
                            }

                            if ($tieneFechaPago) {
                                if ($tieneCreatedAt) {
                                    $q->orWhere(function ($qFechaPago) use ($fecha) {
                                        $qFechaPago->whereMonth('fecha_pago', $fecha->month)
                                            ->whereYear('fecha_pago', $fecha->year);
                                    });
                                } else {
                                    $q->whereMonth('fecha_pago', $fecha->month)
                                        ->whereYear('fecha_pago', $fecha->year);
                                }
                            }
                        }
                    }
                });
            };


            $comprasMesDashboard = (clone $comprasQueryDashboard);
            $aplicarFiltroPeriodoCompras($comprasMesDashboard);
            $comprasMesDashboard = $comprasMesDashboard
                ->get(['id', 'numero_factura', 'fecha_emision', 'fecha_pago', 'created_at', 'total', 'iva', 'descuento', 'total_final']);

            $total_compras_mes = (float) $comprasMesDashboard->sum(function ($compra) {
                return (float) ($compra->total_final ?? 0);
            });

            $gastosQueryDashboard = GastosInstitucionales::query();
            if (Schema::hasColumn('gastos_institucionales', 'id_institucion')) {
                $gastosQueryDashboard->where('id_institucion', $institucion->id);
            }

            $mesInt = (int) $fecha->month;
            $mesPadded = str_pad((string) $mesInt, 2, '0', STR_PAD_LEFT);
            $anioActual = (string) $fecha->year;

            $gastosMesDashboard = (clone $gastosQueryDashboard);
            if ($filtro_rango_activo && Schema::hasColumn('gastos_institucionales', 'created_at')) {
                $gastosMesDashboard->whereBetween('created_at', [$fechaInicio, $fechaFin]);
            } else {
                $gastosMesDashboard->where(function ($query) use ($mesInt, $mesPadded, $anioActual) {
                    $query->where(function ($q) use ($mesInt, $mesPadded, $anioActual) {
                        $q->whereIn('mes_pago', [(string) $mesInt, $mesPadded])
                            ->where('ano_pago', $anioActual);
                    });

                    if (Schema::hasColumn('gastos_institucionales', 'created_at')) {
                        $query->orWhere(function ($q) use ($mesInt, $anioActual) {
                            $q->where(function ($qq) {
                                $qq->whereNull('mes_pago')->orWhere('mes_pago', '');
                            })->where(function ($qq) {
                                $qq->whereNull('ano_pago')->orWhere('ano_pago', '');
                            })->whereYear('created_at', $anioActual)
                              ->whereMonth('created_at', $mesInt);
                        });
                    }
                });
            }
            $gastosMesDashboard = $gastosMesDashboard->get(['id', 'nombre', 'emisor', 'monto', 'created_at']);

            $total_gastos_mes = (float) $gastosMesDashboard->sum(function ($gasto) {
                return $this->normalizarMontoFloat($gasto->monto ?? 0);
            });

            // Para dashboard admin: egresos del periodo = compras del lugar de atencion.
            $egresos_mes = (float) $total_compras_mes;

            // Se utiliza para construir los ultimos movimientos de tesoreria.
            $rendiciones = collect();
            if (isset($responsable) && !empty($responsable->id)) {
                $rendicionesQuery = RendicionCaja::where('id_asistente_receptor', $responsable->id)
                    ->where('rendicion', '0')
                    ->where('estado', 2);

                $rendicionTable = (new RendicionCaja())->getTable();
                if (Schema::hasColumn($rendicionTable, 'created_at')) {
                    if ($filtro_rango_activo) {
                        $rendicionesQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                    } else {
                        $rendicionesQuery
                            ->whereMonth('created_at', $fecha->month)
                            ->whereYear('created_at', $fecha->year);
                    }
                }

                $rendiciones = $rendicionesQuery->get();
            }

            $ultimosMovimientos = collect();

            $movimientosBonosQuery = (clone $bonosBase)
                ->where(function ($query) use ($filtro_rango_activo, $fechaInicio, $fechaFin, $fecha) {
                    if ($filtro_rango_activo) {
                        $query->where(function ($q) use ($fechaInicio, $fechaFin) {
                            $q->whereBetween('fecha_atencion', [$fechaInicio, $fechaFin]);
                        });

                        if (Schema::hasColumn('bonos', 'created_at')) {
                            $query->orWhere(function ($q) use ($fechaInicio, $fechaFin) {
                                $q->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                            });
                        }
                    } else {
                        $query->where(function ($q) use ($fecha) {
                            $q->whereMonth('fecha_atencion', $fecha->month)
                                ->whereYear('fecha_atencion', $fecha->year);
                        });

                        if (Schema::hasColumn('bonos', 'created_at')) {
                            $query->orWhere(function ($q) use ($fecha) {
                                $q->whereMonth('created_at', $fecha->month)
                                    ->whereYear('created_at', $fecha->year);
                            });
                        }
                    }
                });

            $movimientosBonos = $movimientosBonosQuery
                ->with([
                    'TipoBono:id,nombre,detalle',
                    'Paciente:id,nombres,apellido_uno,apellido_dos',
                    'Profesional:id,nombre,apellido_uno,apellido_dos',
                ])
                ->orderByDesc('created_at')
                ->orderByDesc('fecha_atencion')
                ->limit(10)
                ->get(['id', 'numero_bono', 'fecha_atencion', 'created_at', 'glosa', 'valor_atencion', 'rendido', 'estado_consulta', 'id_tipo_bono', 'id_paciente', 'id_profesional'])
                ->map(function ($bono) {
                    $rendido = (int) ($bono->rendido ?? 0) === 1;
                    $fechaMovimiento = !empty($bono->created_at)
                        ? Carbon::parse($bono->created_at)
                        : (!empty($bono->fecha_atencion) ? Carbon::parse($bono->fecha_atencion) : null);
                    $tipoBono = trim((string) ($bono->TipoBono->nombre ?? ''));
                    $claseBono = trim((string) ($bono->TipoBono->detalle ?? ''));
                    $pacienteNombre = trim(implode(' ', array_filter([
                        $bono->Paciente->nombres ?? null,
                        $bono->Paciente->apellido_uno ?? null,
                        $bono->Paciente->apellido_dos ?? null,
                    ])));

                    if (empty($pacienteNombre)) {
                        $pacienteNombre = 'Paciente #' . (string) ($bono->id_paciente ?? '');
                    }

                    $profesionalNombre = trim(implode(' ', array_filter([
                        $bono->Profesional->nombre ?? null,
                        $bono->Profesional->apellido_uno ?? null,
                        $bono->Profesional->apellido_dos ?? null,
                    ])));

                    if (empty($profesionalNombre)) {
                        $profesionalNombre = 'Profesional #' . (string) ($bono->id_profesional ?? '');
                    }

                    $categoriaBono = collect([$tipoBono, $claseBono])
                        ->filter(function ($valor) {
                            return !empty($valor);
                        })
                        ->implode(' · ');

                    if (empty($categoriaBono)) {
                        $categoriaBono = 'Bonos';
                    }

                    return [
                        'date' => !empty($fechaMovimiento)
                            ? $fechaMovimiento->format('Y-m-d')
                            : null,
                        'time' => !empty($fechaMovimiento)
                            ? $fechaMovimiento->format('H:i')
                            : null,
                        'type' => 'ingreso',
                        'category' => $categoriaBono,
                        'description' => !empty($bono->glosa)
                            ? (string) $bono->glosa . ' · ' . $pacienteNombre . ' · ' . $profesionalNombre
                            : 'Bono #' . (string) ($bono->numero_bono ?? $bono->id) . ' · ' . $pacienteNombre . ' · ' . $profesionalNombre,
                        'amount' => (float) ($bono->valor_atencion ?? 0),
                        'status' => $rendido ? 'Rendido' : 'Pendiente',
                    ];
                });

            $movimientosRendiciones = $rendiciones
                ->sortByDesc(function ($rendicion) {
                    return !empty($rendicion->created_at)
                        ? Carbon::parse($rendicion->created_at)->timestamp
                        : 0;
                })
                ->take(10)
                ->map(function ($rendicion) {
                    $monto = (float) (
                        (int) ($rendicion->total_efectivo ?? 0)
                        + (int) ($rendicion->total_copago ?? 0)
                        + (int) ($rendicion->total_otros ?? 0)
                    );

                    return [
                        'date' => !empty($rendicion->created_at)
                            ? Carbon::parse($rendicion->created_at)->format('Y-m-d')
                            : null,
                        'time' => !empty($rendicion->created_at)
                            ? Carbon::parse($rendicion->created_at)->format('H:i')
                            : null,
                        'type' => 'ingreso',
                        'category' => 'Rendiciones',
                        'description' => 'Rendicion de caja #' . (string) ($rendicion->id ?? ''),
                        'amount' => $monto,
                        'status' => 'Cerrada',
                    ];
                });

            $movimientosCompras = $comprasMesDashboard
                ->sortByDesc(function ($compra) {
                    $fechaMovimiento = !empty($compra->fecha_emision)
                        ? $compra->fecha_emision
                        : (!empty($compra->created_at)
                            ? $compra->created_at
                            : $compra->fecha_pago);

                    return !empty($fechaMovimiento)
                        ? Carbon::parse($fechaMovimiento)->timestamp
                        : 0;
                })
                ->take(10)
                ->map(function ($compra) {
                    $monto = (float) ($compra->total_final ?? 0);
                    $fechaMovimiento = !empty($compra->fecha_emision)
                        ? Carbon::parse($compra->fecha_emision)
                        : (!empty($compra->created_at)
                            ? Carbon::parse($compra->created_at)
                            : (!empty($compra->fecha_pago) ? Carbon::parse($compra->fecha_pago) : null));

                    return [
                        'date' => !empty($fechaMovimiento)
                            ? $fechaMovimiento->format('Y-m-d')
                            : null,
                        'time' => !empty($fechaMovimiento)
                            ? $fechaMovimiento->format('H:i')
                            : null,
                        'type' => 'egreso',
                        'category' => 'Compras',
                        'description' => 'Compra factura #' . (string) ($compra->numero_factura ?? $compra->id),
                        'amount' => (float) $monto,
                        'status' => 'Pagado',
                    ];
                });

            $movimientosGastos = $gastosMesDashboard
                ->sortByDesc(function ($gasto) {
                    return !empty($gasto->created_at)
                        ? Carbon::parse($gasto->created_at)->timestamp
                        : 0;
                })
                ->take(10)
                ->map(function ($gasto) {
                    return [
                        'date' => !empty($gasto->created_at)
                            ? Carbon::parse($gasto->created_at)->format('Y-m-d')
                            : null,
                        'time' => !empty($gasto->created_at)
                            ? Carbon::parse($gasto->created_at)->format('H:i')
                            : null,
                        'type' => 'egreso',
                        'category' => 'Gasto institucional',
                        'description' => (string) ($gasto->nombre ?? $gasto->emisor ?? ('Gasto #' . (string) ($gasto->id ?? ''))),
                        'amount' => (float) $this->normalizarMontoFloat($gasto->monto ?? 0),
                        'status' => 'Pagado',
                    ];
                });

            $ultimosMovimientos = $ultimosMovimientos
                ->concat($movimientosBonos)
                ->concat($movimientosRendiciones)
                ->concat($movimientosCompras)
                ->concat($movimientosGastos)
                ->filter(function ($item) {
                    return !empty($item['date']);
                })
                ->sortByDesc(function ($item) {
                    $date = (string) ($item['date'] ?? '');
                    $time = (string) ($item['time'] ?? '00:00');
                    return Carbon::parse(trim($date . ' ' . $time))->timestamp;
                })
                ->take(8)
                ->values();

            // Flujo de ingresos/egresos de los ultimos 6 meses para el grafico del dashboard.
            $mesesEtiquetas = [
                1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun',
                7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic',
            ];
            $flujo_6_meses = [];
            for ($i = 5; $i >= 0; $i--) {
                $mesCursor = $fecha->copy()->startOfMonth()->subMonths($i);
                $mesNumero = (int) $mesCursor->month;
                $mesNombre = $mesesEtiquetas[$mesNumero] ?? $mesCursor->format('M');

                $ingresosMesCursor = (float) (clone $bonosBase)
                    ->whereMonth('fecha_atencion', $mesCursor->month)
                    ->whereYear('fecha_atencion', $mesCursor->year)
                    ->sum('valor_atencion');

                $comprasMesCursor = (clone $comprasQueryDashboard);
                $comprasMesCursor->where(function ($query) use ($mesCursor) {
                    if (Schema::hasColumn('compras', 'fecha_emision')) {
                        $query->whereMonth('fecha_emision', $mesCursor->month)
                            ->whereYear('fecha_emision', $mesCursor->year)
                            ->orWhere(function ($q) use ($mesCursor) {
                                $q->whereNull('fecha_emision')
                                    ->where(function ($qFallback) use ($mesCursor) {
                                        if (Schema::hasColumn('compras', 'created_at')) {
                                            $qFallback->whereMonth('created_at', $mesCursor->month)
                                                ->whereYear('created_at', $mesCursor->year);
                                        }

                                        if (Schema::hasColumn('compras', 'fecha_pago')) {
                                            if (Schema::hasColumn('compras', 'created_at')) {
                                                $qFallback->orWhere(function ($qPago) use ($mesCursor) {
                                                    $qPago->whereMonth('fecha_pago', $mesCursor->month)
                                                        ->whereYear('fecha_pago', $mesCursor->year);
                                                });
                                            } else {
                                                $qFallback->whereMonth('fecha_pago', $mesCursor->month)
                                                    ->whereYear('fecha_pago', $mesCursor->year);
                                            }
                                        }
                                    });
                            });
                    } else {
                        if (Schema::hasColumn('compras', 'created_at')) {
                            $query->whereMonth('created_at', $mesCursor->month)
                                ->whereYear('created_at', $mesCursor->year);
                        }

                        if (Schema::hasColumn('compras', 'fecha_pago')) {
                            if (Schema::hasColumn('compras', 'created_at')) {
                                $query->orWhere(function ($qPago) use ($mesCursor) {
                                    $qPago->whereMonth('fecha_pago', $mesCursor->month)
                                        ->whereYear('fecha_pago', $mesCursor->year);
                                });
                            } else {
                                $query->whereMonth('fecha_pago', $mesCursor->month)
                                    ->whereYear('fecha_pago', $mesCursor->year);
                            }
                        }
                    }
                });

                $comprasMesCursor = $comprasMesCursor
                    ->get(['id', 'total', 'iva', 'descuento', 'total_final']);

                $totalComprasMesCursor = (float) $comprasMesCursor->sum(function ($compra) {
                    return (float) ($compra->total_final ?? 0);
                });

                $mesCursorInt = (int) $mesCursor->month;
                $mesCursorPadded = str_pad((string) $mesCursorInt, 2, '0', STR_PAD_LEFT);
                $anioCursor = (string) $mesCursor->year;

                $gastosMesCursor = (clone $gastosQueryDashboard)
                    ->where(function ($query) use ($mesCursorInt, $mesCursorPadded, $anioCursor) {
                        $query->where(function ($q) use ($mesCursorInt, $mesCursorPadded, $anioCursor) {
                            $q->whereIn('mes_pago', [(string) $mesCursorInt, $mesCursorPadded])
                                ->where('ano_pago', $anioCursor);
                        });

                        if (Schema::hasColumn('gastos_institucionales', 'created_at')) {
                            $query->orWhere(function ($q) use ($mesCursorInt, $anioCursor) {
                                $q->where(function ($qq) {
                                    $qq->whereNull('mes_pago')->orWhere('mes_pago', '');
                                })->where(function ($qq) {
                                    $qq->whereNull('ano_pago')->orWhere('ano_pago', '');
                                })->whereYear('created_at', $anioCursor)
                                  ->whereMonth('created_at', $mesCursorInt);
                            });
                        }
                    })
                    ->get(['id', 'monto']);

                $totalGastosMesCursor = (float) $gastosMesCursor->sum(function ($gasto) {
                    return $this->normalizarMontoFloat($gasto->monto ?? 0);
                });

                $flujo_6_meses[] = [
                    'mes' => $mesNombre,
                    'anio' => (int) $mesCursor->year,
                    'ingresos' => (float) $ingresosMesCursor,
                    'egresos' => (float) ($totalComprasMesCursor + $totalGastosMesCursor),
                ];
            }

            $bonos_fonasa = (clone $bonosMesBase)
                ->whereIn('convenio', [1, '1'])
                ->get(['id', 'valor_atencion']);

            $bonos_otros = (clone $bonosMesBase)
                ->where('numero_sesiones', '0')
                ->where('rendido', '1')
                ->where('estado_consulta', 6)
                ->where('convenio', 3)
                ->get();

            $bonos_rendidos = (clone $bonosMesBase)
                ->where('numero_sesiones', '0')
                ->where('rendido', '1')
                ->where('estado_consulta', '<>', 8)
                ->where('id_clase_bono', '<>', 6)
                ->get();

            $bonos_rendidos_generados = (clone $bonosMesBase)
                ->where('numero_sesiones', '0')
                ->where('rendido', '1')
                ->where('estado_consulta', 8)
                ->get();

            $bonos_profesionales = (clone $bonosMesBase)
                ->where('numero_sesiones', '0')
                ->whereIn('estado_consulta', [4, 6, 8])
                ->get(['id_profesional', 'valor_atencion', 'a_pagar', 'bonificacion']);

            $horasMedicasMesBase = HoraMedica::query()
                ->where('id_lugar_atencion', $idLugarAtencion);

            if ($filtro_rango_activo) {
                $horasMedicasMesBase->whereBetween('fecha_consulta', [$fechaInicio, $fechaFin]);
            } else {
                $horasMedicasMesBase
                    ->whereMonth('fecha_consulta', $fecha->month)
                    ->whereYear('fecha_consulta', $fecha->year);
            }

            $horas_medicas_total_mes = (clone $horasMedicasMesBase)->count();

            $horas_medicas_por_estado = (clone $horasMedicasMesBase)
                ->leftJoin('parametros as p', 'p.id', '=', 'horas_medicas.id_estado')
                ->select(
                    'horas_medicas.id_estado',
                    DB::raw("COALESCE(p.valor, 'Sin estado') as estado"),
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('horas_medicas.id_estado', 'p.valor')
                ->orderByDesc('total')
                ->get();

            $nombresEstadoHoras = [
                1 => 'Reservada',
                2 => 'Confirmada',
                3 => 'Rechazada',
                4 => 'Llamando',
                5 => 'Realizando',
                6 => 'Realizada',
            ];

            $totalesPorEstadoId = [];
            foreach ($horas_medicas_por_estado as $item) {
                $totalesPorEstadoId[(int) ($item->id_estado ?? 0)] = (int) ($item->total ?? 0);
            }

            $horas_reservadas = (int) ($totalesPorEstadoId[1] ?? 0);
            $horas_confirmadas = (int) ($totalesPorEstadoId[2] ?? 0);
            $horas_rechazadas = (int) ($totalesPorEstadoId[3] ?? 0);
            $horas_llamando = (int) ($totalesPorEstadoId[4] ?? 0);
            $horas_realizando = (int) ($totalesPorEstadoId[5] ?? 0);
            $horas_realizadas = (int) ($totalesPorEstadoId[6] ?? 0);

            // Compatibilidad con llaves ya usadas por el dashboard.
            $horas_espera = $horas_llamando;
            $horas_inasistidas = $horas_rechazadas;

            $porcentajeEstado = function ($cantidad) use ($horas_medicas_total_mes) {
                if ((int) $horas_medicas_total_mes === 0) {
                    return 0;
                }
                return (int) round(($cantidad * 100) / $horas_medicas_total_mes);
            };

            $horas_medicas_estados = $horas_medicas_por_estado->map(function ($item) use ($porcentajeEstado, $nombresEstadoHoras) {
                $cantidad = (int) ($item->total ?? 0);
                $idEstado = (int) ($item->id_estado ?? 0);
                return [
                    'id_estado' => $idEstado,
                    'estado' => (string) ($nombresEstadoHoras[$idEstado] ?? ($item->estado ?? 'Sin estado')),
                    'cantidad' => $cantidad,
                    'porcentaje' => $porcentajeEstado($cantidad),
                ];
            })->values();

            $ids_profesionales_bonos = $bonos_profesionales
                ->pluck('id_profesional')
                ->filter()
                ->unique()
                ->values()
                ->all();

            $profesionales_lookup = Profesional::whereIn('id', $ids_profesionales_bonos)
                ->get(['id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut'])
                ->keyBy('id');

            $admin_professionals = $bonos_profesionales
                ->groupBy('id_profesional')
                ->map(function ($items, $idProfesional) use ($profesionales_lookup) {
                    $prof = $profesionales_lookup->get((int) $idProfesional);
                    $nombreCompleto = $prof
                        ? trim(($prof->nombre ?? '') . ' ' . ($prof->apellido_uno ?? '') . ' ' . ($prof->apellido_dos ?? ''))
                        : 'Profesional #' . $idProfesional;

                    return [
                        'id_profesional' => (int) $idProfesional,
                        'nombre' => $nombreCompleto,
                        'rut' => $prof->rut ?? '',
                        'bonos' => (int) $items->count(),
                        'copagos' => (int) $items->sum(function ($item) {
                            return (int) ($item->a_pagar ?? 0);
                        }),
                        'a_cobrar' => (int) $items->sum(function ($item) {
                            return (int) ($item->bonificacion ?? 0);
                        }),
                    ];
                })
                ->sortByDesc('a_cobrar')
                ->values()
                ->all();

            $rendiciones = collect();
            if (isset($responsable) && !empty($responsable->id)) {
                $rendicionesQuery = RendicionCaja::where('id_asistente_receptor', $responsable->id)
                    ->where('rendicion', '0')
                    ->where('estado', 2);

                $rendicionTable = (new RendicionCaja())->getTable();
                if (Schema::hasColumn($rendicionTable, 'created_at')) {
                    if ($filtro_rango_activo) {
                        $rendicionesQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                    } else {
                        $rendicionesQuery
                            ->whereMonth('created_at', $fecha->month)
                            ->whereYear('created_at', $fecha->year);
                    }
                }

                $rendiciones = $rendicionesQuery->get();
            }

            $total_documentos_rendiciones = 0;
            $total_bonos_rendiciones = 0;
            $total_efectivo_rendicion = 0;
            $total_copago_rendicion = 0;
            $total_otros_rendicion = 0;

            foreach ($rendiciones as $rendicion) {
                $total_documentos_rendiciones += (int) ($rendicion->total_documentos ?? 0);
                $total_bonos_rendiciones += (int) ($rendicion->total_bono ?? 0);
                $total_efectivo_rendicion += (int) ($rendicion->total_efectivo ?? 0);
                $total_copago_rendicion += (int) ($rendicion->total_copago ?? 0);
                $total_otros_rendicion += (int) ($rendicion->total_otros ?? 0);
            }

            $responsables_count = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $institucion->id_lugar_atencion)
                ->count();

            $cajasAbiertasQuery = CajaOperativa::with('caja')
                ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                ->where('estado', 'abierta');

            $cajasCerradasQuery = CajaOperativa::where('id_lugar_atencion', $institucion->id_lugar_atencion)
                ->where('estado', 'cerrada');

            $cajaOperativaTable = (new CajaOperativa())->getTable();
            if (Schema::hasColumn($cajaOperativaTable, 'created_at')) {
                if ($filtro_rango_activo) {
                    $cajasAbiertasQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                    $cajasCerradasQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
                } else {
                    $cajasAbiertasQuery
                        ->whereMonth('created_at', $fecha->month)
                        ->whereYear('created_at', $fecha->year);

                    $cajasCerradasQuery
                        ->whereMonth('created_at', $fecha->month)
                        ->whereYear('created_at', $fecha->year);
                }
            }

            $cajas_abiertas = $cajasAbiertasQuery->get(['id', 'id_caja', 'monto_inicial', 'monto_final', 'monto_entregado']);

            $cajas_cerradas_count = $cajasCerradasQuery->count();

            $dashboard_stats = [
                'fecha' => $fecha->toDateString(),
                'total_dia' => (int) $total_dia,
                'total_mes' => (int) $total_mes,
                'total_anio' => (int) $total_anio,
                'ingresos_mes' => (float) $ingresos_mes,
                'egresos_mes' => (float) $egresos_mes,
                'total_compras_mes' => (float) $total_compras_mes,
                'total_gastos_mes' => (float) $total_gastos_mes,
                'cantidad_egresos_mes' => (int) $comprasMesDashboard->count(),
                'flujo_6_meses' => $flujo_6_meses,
                'ultimos_movimientos' => $ultimosMovimientos,
                'cant_bonos_mes' => (int) $cant_bonos,
                'total_rendido' => (int) $total_rendido,
                'total_pendiente' => (int) $total_pendiente,
                'total_fonasa' => (int) $bonos_fonasa->sum('valor_atencion'),
                'bonos_fonasa_count' => (int) $bonos_fonasa->count(),
                'total_fonasa_por_cobrar' => (int) $bonos_fonasa->sum('valor_atencion'),
                'bonos_fonasa_por_cobrar_count' => (int) $bonos_fonasa->count(),
                'total_otros_bonos' => (int) $bonos_otros->sum('valor_atencion'),
                'bonos_otros_count' => (int) $bonos_otros->count(),
                'bonos_rendidos_count' => (int) $bonos_rendidos->count(),
                'bonos_rendidos_generados_count' => (int) $bonos_rendidos_generados->count(),
                'total_rendiciones' => (int) $rendiciones->count(),
                'total_documentos_rendiciones' => (int) $total_documentos_rendiciones,
                'total_bonos_rendiciones' => (int) $total_bonos_rendiciones,
                'total_efectivo_rendicion' => (int) $total_efectivo_rendicion,
                'total_copago_rendicion' => (int) $total_copago_rendicion,
                'total_otros_rendicion' => (int) $total_otros_rendicion,
                'responsables_count' => (int) $responsables_count,
                'cajas_abiertas_count' => (int) $cajas_abiertas->count(),
                'cajas_cerradas_count' => (int) $cajas_cerradas_count,
                'horas_medicas_total_mes' => (int) $horas_medicas_total_mes,
                'horas_medicas_reservadas' => $horas_reservadas,
                'horas_medicas_confirmadas' => $horas_confirmadas,
                'horas_medicas_rechazadas' => $horas_rechazadas,
                'horas_medicas_llamando' => $horas_llamando,
                'horas_medicas_realizando' => $horas_realizando,
                'horas_medicas_realizadas' => $horas_realizadas,
                'horas_medicas_inasistidas' => $horas_inasistidas,
                'horas_medicas_reservadas_pct' => $porcentajeEstado($horas_reservadas),
                'horas_medicas_confirmadas_pct' => $porcentajeEstado($horas_confirmadas),
                'horas_medicas_rechazadas_pct' => $porcentajeEstado($horas_rechazadas),
                'horas_medicas_llamando_pct' => $porcentajeEstado($horas_llamando),
                'horas_medicas_realizando_pct' => $porcentajeEstado($horas_realizando),
                'horas_medicas_realizadas_pct' => $porcentajeEstado($horas_realizadas),
                'horas_medicas_inasistidas_pct' => $porcentajeEstado($horas_inasistidas),
                'horas_medicas_ocupacion' => (int) ($horas_reservadas + $horas_confirmadas + $horas_espera + $horas_realizando + $horas_realizadas),
                'horas_medicas_ocupacion_pct' => $porcentajeEstado((int) ($horas_reservadas + $horas_confirmadas + $horas_espera + $horas_realizando + $horas_realizadas)),
                'horas_medicas_estados' => $horas_medicas_estados,
                'cajas_abiertas' => $cajas_abiertas->map(function ($caja) {
                    return [
                        'id' => (int) $caja->id,
                        'id_caja' => (int) ($caja->id_caja ?? 0),
                        'nombre_caja' => optional($caja->caja)->nombre_caja ?? 'Caja sin nombre',
                        'ubicacion' => optional($caja->caja)->ubicacion ?? '-',
                        'monto_inicial' => (int) ($caja->monto_inicial ?? 0),
                        'monto_final' => (int) ($caja->monto_final ?? 0),
                        'monto_entregado' => (int) ($caja->monto_entregado ?? 0),
                    ];
                })->values(),
            ];
        }

        return view('app.adm_cm.estadisticas_dashboard',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'profesional' => $profesional,
            'profesionales' => $profesionales,
            'sucursales' => $sucursales,
            'responsable' => $responsable,
            'dashboard_stats' => $dashboard_stats,
            'admin_professionals' => $admin_professionals,
            'fecha_inicio_filtro' => $fecha_inicio_filtro,
            'fecha_fin_filtro' => $fecha_fin_filtro,
            'filtro_rango_activo' => $filtro_rango_activo,
        ]);
    }


    // public function estadisticas(){
    //     return view('estadisticas');
    // }

    // public function getEstadisticas(){
    //     return view('estadisticas_');
    // }


    public function perfil(){
        return view('app.adm_cm.perfil_cm');
    }

    public function laboratorio(){
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
        $laboratorios = $this->dame_laboratorios($institucion->id_lugar_atencion);
        return view('app.adm_cm.laboratorio',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorios' => $laboratorios
        ]);
    }
    public function laboratorio_agregar(){
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
        $laboratorios = $this->dame_laboratorios($institucion->id_lugar_atencion);
        $tipos_laboratorio = TiposLaboratorio::all();
        $regiones = Region::all();
        return view('app.adm_cm.laboratorio_agregar',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'laboratorios' => $laboratorios,
            'tipos_laboratorio' => $tipos_laboratorio,
            'regiones' => $regiones
        ]);
    }
    public function examenes(){
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
        $filtro_prodce  = array();
        $filtro_prodce[]  = array('id_lugar_atencion', $institucion->id_lugar_atencion);
        $filtro_prodce[]  = array('estado', 1);
        $procedimientos = ProcedimientosCentro::where($filtro_prodce)->get();
        $profesionales = LugarAtencion::where('id', $institucion->id_lugar_atencion)->first()->Profesionales()->orderBy('nombre')->get();

        return view('app.adm_cm.examenes',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'examenes' => $procedimientos,
            'profesionales_lugar_atencion' => $profesionales
        ]);
    }
	public function vacunatorio_instalaciones(){
        return view('app.adm_cm.vacunatorio_instalaciones');
    }

	public function vacunatorio_personal(){
        return view('app.adm_cm.vacunatorio_personal');
    }

    public function examen(Request $request){

        $examen = ProcedimientosCentro::where('id', $request->id)->first();
        return ['estado' => 1, 'examen' => $examen];
    }

    public function examen_eliminar(Request $request){

        $examen = ProcedimientosCentro::where('id', $request->id)->first();
        if($examen)
        {
            // Primero eliminar los asignamentos en la tabla procedimientos_lugar_atencion_profesional
            DB::table('procedimientos_lugar_atencion_profesional')
                ->where('id_procedimiento_centro', $examen->id)
                ->delete();

            $examenes = ProcedimientosCentro::where('id_lugar_atencion', $examen->id_lugar_atencion)->get();
            if($examen->delete())
            {

                return ['estado' => 1, 'mensaje' => 'Examen eliminado', 'procedimientos' => $examenes];
            }
            else
            {
                return ['estado' => 0, 'mensaje' => 'Error al eliminar examen', 'procedimientos' => $examenes];
            }
        }
        else
        {
            return ['estado' => 0, 'mensaje' => 'Examen no encontrado', 'procedimientos' => []];
        }
    }

    public function sucursales_cm(){
        return view('app.adm_cm.sucursales_cm');
    }
    public function procedimientos(){
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
        $filtro_prodce  = array();
        $filtro_prodce[]  = array('id_lugar_atencion', $institucion->id_lugar_atencion);
        $filtro_prodce[]  = array('estado', 1);
        $procedimientos = ProcedimientosCentro::where($filtro_prodce)->get();
        return view('app.adm_cm.procedimientos',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'procedimientos' => $procedimientos
        ]);
    }
	public function at_profesionales(){
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

        return view('app.adm_cm.at_profesionales',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }

    public function vacunatorio_pedidos(){
        return view('app.vacunatorio.vacunatorio_pedidos');
    }
    public function centro_enfermeria_integral_pedidos(){
        return view('centro_enfermeria_integral.cei_pedidos');
    }
	// public function vacunatorio_personal(){
    //     return view('app.adm_cm.vacunatorio_personal');
    // }
	public function vacunatorio_felicitreclamos(){
        return view('app.adm_cm.vacunatorio_felicitreclamos');
    }
    public function centro_enfermeria_integral_felicitreclamos(){
        return view('app.adm_cm.centro_enfermeria_integral_felicitreclamos');
    }

    public function imagenologia(){
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
        // $imagenologias = $this->dame_imagenologias($institucion->id_lugar_atencion);
        return view('app.adm_cm.imagenologia',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'imagenologias' => []
        ]);
    }

    public function profesionales()
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();

            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();
        $roles = Roles::orderBy('alias','ASC')->where('difusion',1)->get();

        $usuario = Auth::user();
        $roles_ = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
        $adm_medico = false;
        foreach($roles_ as $rol){
            if($rol == 'AdministradorMedico'){
                $adm_medico = true;
                break;
            }
        }

        $servicios = Servicios::all();

        return view('app.adm_cm.profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios
        ]);
    }

    public function profesionales_id($id){

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
            // Modificado por Francisco para traer la institucion buscada por id
            // $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $registro = Instituciones::where('id',$id)->first();
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        $institucion = Instituciones::find($id);

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();
            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();
        $roles = Roles::orderBy('alias','ASC')->where('difusion',1)->get();

        $usuario = Auth::user();
        $roles_ = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();

        $adm_medico = false;
        foreach($roles_ as $rol){
            if($rol == 'AdministradorMedico'){
                $adm_medico = true;
                break;
            }
        }

        $servicios = Servicios::all();

        return view('app.adm_cm.profesionales_id')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios
        ]);
    }

    public function profesionales_institucion(){
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();
            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();
        $roles = Roles::orderBy('alias','ASC')->where('difusion',1)->get();

        $usuario = Auth::user();
        $roles_ = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
        $adm_medico = true;

        $servicios = Servicios::all();

        return view('app.adm_cm.profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios
        ]);
    }

    public function perfiladm_dental(){
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

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();

            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */
        $tipos_odontologos = TipoEspecialidad::where('id_especialidad',2)->where('estado',1)->get();
        $regiones = Region::all();
        return view('app.adm_cm.dental',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'odontologos' => $lista_profesionales['ODONTOLOG'],
            'tipos_odontologos' => $tipos_odontologos,
            'regiones' => $regiones
        ]);
    }

    public function mensaje_difusion(Request $req){
        try {
            // Obtener destinatarios - puede venir como string o array
            $destinatarios = $req->msj_para_difusion;
            if (!is_array($destinatarios)) {
                $destinatarios = [$destinatarios];
            }

            // Obtener los roles correspondientes
            $roles = Role::whereIn('id', $destinatarios)->get();
            // Obtener los nombres de los roles
            $roleNames = $roles->pluck('name');

            // Obtener todos los usuarios que tienen esos roles
            $usuariosConRoles = User::whereHas('roles', function($query) use ($roleNames) {
                $query->whereIn('name', $roleNames);
            })->get();

            $datos_mensaje = [
                'titulo' => $req->titulo_msj_difusion,
                'asunto' => $req->detalle_msj_difusion,
                'mensaje' => $req->mensaje_msj_difusion,
            ];

            foreach($usuariosConRoles as $usuario){
                // enviar un mensaje a cada usuario
                $nuevo_mensaje = new Mensajes();
                $nuevo_mensaje->id_usuario = Auth::user()->id;
                $nuevo_mensaje->destinatarios = json_encode($destinatarios);
                $nuevo_mensaje->id_receptor = $usuario->id;
                $nuevo_mensaje->datos_mensaje = json_encode($datos_mensaje);
                $nuevo_mensaje->tipo_mensaje = 2; // Difusion
                $nuevo_mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
                $nuevo_mensaje->estado = 1; // 1: No leido, 2: Leido

                $nuevo_mensaje->save();
            }

            $datos = array();
            $datos['estado'] = 1;
            $datos['msj'] = 'mensaje enviado';

            // Manejar archivos adjuntos
            if ($req->hasFile('misArchivosGes')) {
                foreach ($req->file('misArchivosGes') as $file) {
                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->storeAs('uploads/', $filename, 'public');

                    // Aquí puedes guardar la información del archivo en la base de datos si es necesario
                    // Ejemplo:
                    // $archivo = new Archivo();
                    // $archivo->mensaje_id = $nuevo_mensaje->id;
                    // $archivo->ruta = '/storage/uploads/'.$filename;
                    // $archivo->save();
                }
            }

            return $datos;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mensaje_difusion_ministerio(Request $req){
        try {
            // verificar si viene un archivo de tipo file adjunto
            $destinatarios = $req->receptores;
            // Obtener los roles correspondientes
            $roles = Role::whereIn('id', $destinatarios)->get();
            // Obtener los nombres de los roles
            $roleNames = $roles->pluck('name');

            // Obtener todos los usuarios que tienen esos roles
            $usuariosConRoles = User::whereHas('roles', function($query) use ($roleNames) {
                $query->whereIn('name', $roleNames);
            })->get();

            $datos_mensaje = [
                'titulo' => $req->titulo,
                'asunto' => $req->detalle,
                'mensaje' => $req->message,
            ];

            foreach($usuariosConRoles as $usuario){
                // enviar un mensaje a cada usuario
                $nuevo_mensaje = new Mensajes();
                $nuevo_mensaje->id_usuario = Auth::user()->id;
                $nuevo_mensaje->destinatarios = json_encode($destinatarios);
                $nuevo_mensaje->id_receptor = $usuario->id;
                $nuevo_mensaje->datos_mensaje = json_encode($datos_mensaje);
                $nuevo_mensaje->tipo_mensaje = 2; // Difusion
                $nuevo_mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
                $nuevo_mensaje->estado = 1; // 1: No leido, 2: Leido

                $nuevo_mensaje->save();
            }

            $datos = array();
            $datos['estado'] = 1;
            $datos['msj'] = 'mensaje enviado';

            // Manejar archivos adjuntos
            if ($req->hasFile('archivos')) {

                foreach ($req->file('archivos') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->storeAs('uploads/', $filename, 'public');

                    // Aquí puedes guardar la información del archivo en la base de datos si es necesario
                    // Ejemplo:
                    // $archivo = new Archivo();
                    // $archivo->mensaje_id = $nuevo_mensaje->id;
                    // $archivo->ruta = '/storage/uploads/'.$filename;
                    // $archivo->save();
                }
            }else{
                $datos['msj'] = 'mensaje enviado sin archivos';
            }

            return $datos;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function historial_mensajes_profesional($id){
        $mensajes = Mensajes::where('id_receptor', $id)->orderBy('fecha_envio', 'DESC')->get();
        foreach($mensajes as $mensaje){
            $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);
            $mensaje->destinatarios = json_decode($mensaje->destinatarios);
        }
        return ['estado' => 1, 'mensajes' => $mensajes];
    }

    public function mensaje_profesional(Request $req){
        try {
            $id_receptor = intval($req->id_profesional_mensaje);

            // Log para debugging
            \Log::info('Guardando mensaje para profesional', [
                'id_receptor' => $id_receptor,
                'titulo' => $req->titulo,
                'archivos_temporales' => $req->archivos
            ]);

            $datos_mensaje = [
                'titulo' => $req->titulo,
                'asunto' => $req->detalle,
                'mensaje' => $req->mensaje,
            ];

            // Mover archivos temporales a ubicación permanente y guardar URLs
            $archivos_permanentes = [];
            if ($req->has('archivos') && is_array($req->archivos) && count($req->archivos) > 0) {
                foreach ($req->archivos as $archivo_temporal) {
                    // Generar nombre único para archivo permanente
                    $nombre_permanente = 'mensaje_prof_' . $id_receptor . '_' . time() . '_' . uniqid() . '_' . basename($archivo_temporal);

                    // Mover archivo de temporal a permanente usando el helper estático
                    $resultado = \App\Http\Controllers\CargaImagenController::moverArchivo(
                        $archivo_temporal,
                        'archivo_archivo', // Disco de destino (ya configurado en config/filesystems.php)
                        $nombre_permanente
                    );

                    if ($resultado['estado'] == 1) {
                        $archivos_permanentes[] = [
                            'nombre_original' => basename($archivo_temporal),
                            'nombre_archivo' => $nombre_permanente,
                            'url' => $resultado['proceso']['url']
                        ];

                        \Log::info('Archivo movido exitosamente', [
                            'temporal' => $archivo_temporal,
                            'permanente' => $nombre_permanente,
                            'url' => $resultado['proceso']['url']
                        ]);
                    } else {
                        \Log::warning('No se pudo mover archivo', [
                            'archivo' => $archivo_temporal,
                            'error' => $resultado['msj']
                        ]);
                    }
                }

                // Guardar información de archivos permanentes
                if (count($archivos_permanentes) > 0) {
                    $datos_mensaje['archivos'] = $archivos_permanentes;
                }
            }

            $mensaje = new Mensajes;
            $mensaje->id_usuario = Auth::user()->id;
            $mensaje->destinatarios = null;
            $mensaje->id_receptor = $id_receptor ? $id_receptor : null;
            $mensaje->datos_mensaje = json_encode($datos_mensaje);
            $mensaje->tipo_mensaje = 1; // Directo a profesional
            $mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
            $mensaje->estado = 1; // 1: No leido, 2: Leido

            $mensaje->save();

            \Log::info('Mensaje guardado exitosamente', [
                'mensaje_id' => $mensaje->id,
                'id_receptor' => $id_receptor,
                'archivos_guardados' => count($archivos_permanentes)
            ]);

            return [
                'estado' => 1,
                'msj' => 'Mensaje enviado correctamente',
                'mensaje_id' => $mensaje->id,
                'archivos_guardados' => count($archivos_permanentes)
            ];
        } catch (\Exception $e) {
            \Log::error('Error al guardar mensaje profesional', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return ['estado' => 0, 'msj' => 'Error al enviar el mensaje: ' . $e->getMessage()];

        }
    }

	public function liquidacion_profesionales(){
        return view('app.adm_cm.liquidacion_profesionales');
    }

    public function asistente_adm_liquidacion_profesionales(){
        return view('app.asistente_adm_cm.liquidacion_profesionales');
    }

	public function adm_liquidacion_profesionales(){
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

        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();

            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        $liquidaciones = LiquidacionesProfesional::where('id_institucion', $institucion->id)->get();
        foreach($profesionales as $prof){
            $prof->liquidacion = LiquidacionesProfesional::where('id_profesional', $prof->id)
                                    // ->where('id_institucion', $institucion->id)
                                    ->orderBy('fecha_emision', 'DESC')
                                    ->first();
        }
        if($institucion->id_tipo_institucion == 3){

            return view('app.laboratorio.liquidacion_profesionales',[
                'institucion' => $institucion,
                'profesional' => $institucion,
                'profesionales' => $profesionales,
                'liquidaciones' => $liquidaciones,
                'tipo_institucion' => $tipo_institucion,
                'lista_profesionales' => $lista_profesionales
            ]);
        }
        return view('app.adm_cm.liquidacion_profesionales',[
            'institucion' => $institucion,
            'profesional' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'profesionales' => $profesionales,
            'liquidaciones' => $liquidaciones,
            'lista_profesionales' => $lista_profesionales
        ]);
    }

    public function dame_profesional(Request $req){
        $profesional = Profesional::where('id', $req->id)
            ->with('Direccion.Ciudad')
            ->first();
        return ['estado' => 1, 'profesional' => $profesional];
    }

    public function personal()
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

            if($lista_asistente)
            {
                foreach ($lista_asistente as $key => $value)
                {
                    // Log para identificar la asistente en caso de error
                    \Log::info('Procesando asistente', [
                        'id' => $value->id,
                        'nombre' => $value->nombres ?? 'Sin nombre',
                        'id_usuario' => $value->id_usuario,
                        'id_asistente_tipo' => $value->id_asistente_tipo
                    ]);

                    /** roles */
                    $usuario = User::where('id', $value->id_usuario)->first();

                    // Verificar que el usuario existe antes de acceder a sus roles
                    if($usuario) {
                        $roles = $usuario->roles()->get();

                        // Comentado: asignación automática de rol
                        // if($roles->isEmpty()) {
                        //     $usuario->roles()->attach(7);
                        //     $roles = $usuario->roles()->get();
                        // }

                        $array_roles = array();
                        foreach ($roles as $key_2 => $value_2) {
                            array_push($array_roles, $value_2->name);
                        }

                        if(!empty($array_roles))
                            $lista_asistente[$key]->roles = implode(",",$array_roles);
                        else
                            $lista_asistente[$key]->roles = '';
                    } else {
                        // Si no existe el usuario, dejar roles vacío
                        $lista_asistente[$key]->roles = '';
                        \Log::warning('Usuario no encontrado para asistente', ['id_asistente' => $value->id]);
                    }

                    /** tipo asistente */
                    $asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);
                    if($asistente_tipo) {
                        $lista_asistente[$key]->asistente_tipo = $asistente_tipo;
                    } else {
                        // Si no existe el tipo de asistente, crear un objeto vacío para evitar errores
                        $lista_asistente[$key]->asistente_tipo = (object)['nombre' => 'Sin tipo asignado', 'id' => null];
                        \Log::warning('Tipo de asistente no encontrado', [
                            'id_asistente' => $value->id,
                            'id_asistente_tipo' => $value->id_asistente_tipo
                        ]);
                    }

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_asistente[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */

        /** CARGA DE ADMINISTRATIVOS */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_administrativo = array();
        if($LugarAtencion)
        {
            $lista_administrativo = $LugarAtencion->AdministrativoInstitucion()->get();

            if($lista_administrativo)
            {
                foreach ($lista_administrativo as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_administrativo[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_administrativo[$key]->roles = '';

                    /** tipo administrativo */
                    $lista_administrativo[$key]->tipo_administrativo = TipoAdministrador::find($value->id_tipo_administrador);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_administrativo[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }


        /** LISTA CONTRATO */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }
        /** FIN LISTA CONTRATO */

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        $usuario = Auth::user();

        $roles = $usuario->roles()->orderBy('id', 'DESC')->get();
        $adm_medico = false;
        foreach($roles as $rol){
            if($rol->name == 'AdministradorMedico'){
                $adm_medico = true;
                // salir del bucle
                break;
            }
        }

        $lista_tipo_administrativo = TipoAdministrador::where('estado', 1)->get();

        return view('app.adm_cm.personal')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_asistente' => $lista_asistente,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'lista_tipo_asistente' => $lista_tipo_asistente,
            'adm_medico' => $adm_medico,
            'lista_tipo_administrativo' => $lista_tipo_administrativo,
            'lista_administrativo' => $lista_administrativo
        ]);;
    }

    public function personal_asistentes()
    {
        $datos = array();
        $errro = array();
        $valido = 1;


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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

            if($lista_asistente)
            {
                foreach ($lista_asistente as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_usuario)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_asistente[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_asistente[$key]->roles = '';

                    /** tipo asistente */
                    $lista_asistente[$key]->asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);

                    $lista_asistente[$key]->direccion = $value->direccion()->first()->direccion;
                    $lista_asistente[$key]->numero_dir = $value->direccion()->first()->numero_dir;
                    $lista_asistente[$key]->ciudad = $value->direccion()->first()->ciudad()->first()->nombre;
                    $lista_asistente[$key]->institucion = $institucion;
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */

        if($lista_asistente)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $lista_asistente;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }


        return $datos;
    }


	public function asistente_adm_buscar_pacientes()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',strtoupper($asistente_tipo->nombre));
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $url = 'app.asistente_adm_cm.buscar_paciente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
        );

        return view($url, $array_data);
    }

    public function adm_buscar_pacientes()
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();


        if($LugarAtencion)
        {
            $url = 'app.adm_cm.pacientes'; // institucion
            $array_data = array(
                'lugares_atencion' => $LugarAtencion,
                'institucion' => $institucion,
                'profesionales' => $profesionales_contratados
            );
            return view($url, $array_data);
        }
        else
        {
            return back()->with('warning', 'El Lugar de Atencion no se encontro');
        }

    }

    public function detalle_paciente(Request $req)
    {
        // Cargar paciente con su estado más reciente y relaciones anidadas
        $paciente = Paciente::with([
            'estadosPaciente' => function($query) {
                $query->latest()->limit(1);
            },
            'estadosPaciente.lugarAtencion',
            'estadosPaciente.responsable'
        ])->find($req->id_paciente);

        if (!$paciente) {
            return ['estado' => 0, 'mensaje' => 'Paciente no encontrado'];
        }

        // Obtener el estado más reciente
        $estado_paciente = $paciente->estadosPaciente->first();

        // Preparar respuesta con información estructurada
        $respuesta = [
            'estado' => 1,
            'paciente' => $paciente,
            'estado_paciente' => $estado_paciente,
        ];

        // Si existe estado, agregar información adicional
        if ($estado_paciente) {
            $respuesta['info_estado'] = [
                'tipo_estado' => $estado_paciente->tipo_estado, // Usa el accesor
                'fecha_registro' => $estado_paciente->fecha,
                'observaciones' => $estado_paciente->observaciones,
                'lugar_atencion' => $estado_paciente->lugarAtencion ? $estado_paciente->lugarAtencion->nombre : null,
                'responsable' => $estado_paciente->responsable ?
                    $estado_paciente->responsable->nombre . ' ' . $estado_paciente->responsable->apellido_uno : null,
            ];
        }

        return $respuesta;
    }

	public function adm_cm_area_contabilidad(){
        return view('adm_cm.area_contabilidad');
    }

    public function administracion_cm(){
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
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('app.adm_cm.administracion_cm',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }

    public function insumos(){
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
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('app.bodega.escritorio_bodega_insumo',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }
    public function proveedores(){
        return view('app.adm_cm.proveedores');
    }
    public function controles_almacenamiento(){

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
                                }
                            }
                        }
                    }
                }
            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        $producto_controller = new ProductosController();
        // dame productos que necesitan almacenamiento
        $productos = $producto_controller->dameProductosAlmacenamiento();

        return view('app.bodega.controles_almacenamiento',[
            'productos' => $productos,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }

    public function pagos(){
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
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('app.adm_cm.pagos',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }
    public function departamentos(){
        return view('app.adm_cm.departamentos_servicios');
    }
	public function vacunatorio(){
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
        if($registro)        {
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
                                }
                            }
                        }
                    }
                }
            }
        }
        $especialidad = Especialidad::all();
        $tipo_convenio = TipoConvenioInstitucion::all();
        $enfermeras = ProfesionalesLugaresAtencion::select('profesionales.*','profesionales_lugares_atencion.id as id_profesional_lugar','profesionales_lugares_atencion.estado as estado_contrato')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->where('profesionales.id_especialidad', 8) // Enfermería
            ->get();
            $filtro_prodce = array();
            $filtro_prodce[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
        $procedimientos = ProcedimientosCentro::where($filtro_prodce)->get();
        return view('app.adm_cm.vacunatorio',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'especialidades' => $especialidad,
            'tipo_convenio' => $tipo_convenio,
            'enfermeras' => $enfermeras,
            'procedimientos' => $procedimientos
        ]);
    }

	public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }

    public function asociarProfesionalExistente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_institucion))
        // {
        //     $error['id_institucion'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_convenio_institucion))
        {
            $error['id_tipo_convenio_institucion'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            if($request->id_tipo_convenio_institucion == 1)
            {
                if(empty($request->fijo))
                {
                    $error['fijo'] = 'campo requerido';
                    $valido = 0;
                }
            }
            else if($request->id_tipo_convenio_institucion == 2)
            {
                if(empty($request->atencion))
                {
                    $error['atencion'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->ventas)){
                    $error['ventas'] = 'campo requerido';
                    // $valido = 0;
                    $request->ventas = 30;
                }
                if(empty($request->confirmacion_agenda))
                {
                    $error['confirmacion_agenda'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->ggcc))
                {
                    $error['ggcc'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->box))
                {
                    $error['box'] = 'campo requerido';
                    $valido = 0;
                }
            }
        }

        if($valido)
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
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */


            $profesionales = Profesional::where('id', $request->id_profesional)->first();
            if($profesionales)
            {
                // id_lugar_atencion
                // id_profesional
                // creo invitacion
                $rut = $profesionales->rut;
                $nombre = $profesionales->nombre;
                $apellido_uno = $profesionales->apellido_uno;
                $apellido_dos = $profesionales->apellido_dos;
                $telefono = $profesionales->telefono;
                $email = $profesionales->email;
                $id_user_solicitud = Auth::user()->id;
                $id_user_invitado = $profesionales->id_usuario;
                $id_especialidad = $profesionales->id_especialidad;
                $id_tipo_especialidad = $profesionales->id_tipo_especialidad;
                $id_sub_tipo_especialidad = $profesionales->id_sub_tipo_especialidad;
                $resultado = InvitacionController::registroInvtacionProfesional($request->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, $id_user_solicitud, $id_user_invitado, '0');
                if($resultado->estado == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'profesional invitado';

                    /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($resultado->last_id, $profesionales->id, $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->ventas, $request->confirmacion_agenda, $request->ggcc, $request->box,'','', $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv;

                    if($registro_prof_inst_conv->estado == 1)
                    {
                        /** ENVIO NOTIFICACION */
                        $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $resultado->last_id);

                        $datos['notificacion'] = $result_notificacion;
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'notificacion no enviada';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'invitacion al profesional con falla';
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'profesional no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }



        return $datos;
    }

    public function asociarProfesionalNuevo(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_uno))
        {
            $error['apellido_uno'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_dos))
        {
            $error['apellido_dos'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->correo))
        {
            $error['correo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->telefono_uno))
        {
            $error['telefono_uno'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->profesion))
        {
            $error['profesion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->especialidad))
        {
            $error['especialidad'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->sub_tipo_especialidad))
        // {
        //     $error['sub_tipo_especialidad'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_tipo_convenio_institucion))
        {
            $error['id_tipo_convenio_institucion'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            if($request->id_tipo_convenio_institucion == 1)
            {
                if(empty($request->fijo))
                {
                    $error['fijo'] = 'campo requerido';
                    $valido = 0;
                }
            }
            else if($request->id_tipo_convenio_institucion == 2)
            {
                if(empty($request->atencion))
                {
                    $error['atencion'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->ventas)){
                    $error['ventas'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->confirmacion_agenda))
                {
                    $error['confirmacion_agenda'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->ggcc))
                {
                    $error['ggcc'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->box))
                {
                    $error['box'] = 'campo requerido';
                    $valido = 0;
                }
            }
        }

        if($valido)
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
                        $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                        if($registro)
                        {
                            /** LABORATORIO */
                            $institucion = $registro;
                            $tipo_institucion = 'laboratorio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */


            // VALIDAMOS QUE EL PROFESIONAL NO EXISTA
            $filtro_profesional = array();
            $filtro_profesional[] = array('rut', $request->rut);;
            $filtro_profesional[] = array('estado', '!=', 0);
            $buscar_profesional = Profesional::where($filtro_profesional)->first();
            if($buscar_profesional)
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'El profesional ya se encuentra registrado en el sistema, por favor buscar en profesionales existentes';
                return $datos;
            }

            /** REGISTRO INVITACION */
            $sexo = $request->sexo;
            $rut = $request->rut;
            $nombre = $request->nombre;
            $apellido_uno = $request->apellido_uno;
            $apellido_dos = $request->apellido_dos;
            $telefono = $request->telefono_uno;
            $email = $request->correo;
            $profesion = $request->profesion;
            $especialidad = $request->especialidad;
            $sub_tipo_especialidad = $request->sub_tipo_especialidad;
            $id_user_solicitud = Auth::user()->id;

            $nuevo_profesional = new Profesional;
            $nuevo_profesional->rut = $rut;
            $nuevo_profesional->nombre = $nombre;
            $nuevo_profesional->apellido_uno = $apellido_uno;
            $nuevo_profesional->apellido_dos = $apellido_dos;
            $nuevo_profesional->sexo = $sexo;
            $nuevo_profesional->fecha_nacimiento = null;
            $nuevo_profesional->email = $email;
            $nuevo_profesional->bienvenida = 0;
            $nuevo_profesional->telefono_uno = $telefono;
            $nuevo_profesional->estado = 1;
            $nuevo_profesional->certificado = 3;

            $lugar_atencion = LugarAtencion::where('id', $request->id_lugar_atencion)->first();

            $nuevo_profesional->id_direccion = $lugar_atencion->id_direccion;
            $nuevo_profesional->id_especialidad = $profesion;
            $nuevo_profesional->id_tipo_especialidad = $especialidad;
            $nuevo_profesional->id_sub_tipo_especialidad = $sub_tipo_especialidad;

            $nuevo_profesional->save();
            $result_invitacion = InvitacionController::registroInvtacionProfesional($request->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $profesion, $especialidad, $sub_tipo_especialidad, $id_user_solicitud, '', '0');

            if($result_invitacion->estado == 1)
            {
                /** CREAR CONVENIO PROFESIONAL INSTITUCION */
                /** ENVIO NOTIFICACION */
                $datos['estado'] = 1;
                $datos['msj'] = 'profesional invitado';


                /** VALIDAR CONVENIO */
                $filtro = array();
                $filtro[] = array('id_invitacion',$result_invitacion->last_id);
                $filtro[] = array('id_institucion',$institucion->id);
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
                $filtro[] = array('estado',1);


                $resul_buscar_conv = ProfesionalInstitucionConvenio::where($filtro)->first();

                if($resul_buscar_conv)
                {

                    // Asociamos el profesional al lugar de atencion si no lo esta
                    $reg_prof_lugar = new ProfesionalesLugaresAtencion;
                    $reg_prof_lugar->id_profesional = $request->id_profesional;
                    $reg_prof_lugar->id_lugar_atencion = $request->id_lugar_atencion;
                    $reg_prof_lugar->estado = 1;
                    $reg_prof_lugar->save();

                    /** ACTUALIZACION DE PROFESIONAL INSTITUCION CONVENIO */
                    $result_prof_inst_convenio = ProfesionalInstitucionConvenioController::modificar($resul_buscar_conv->id, $result_invitacion->last_id, '', $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->ventas, $request->confirmacion_agenda, $request->ggcc, $request->box, '', '', $resul_buscar_conv->estado, $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv = $result_prof_inst_convenio;
                    if($registro_prof_inst_conv->estado == 1)
                    {
                        /** ENVIO NOTIFICACION */
                        $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $result_invitacion->last_id);
                        $datos['notificacion'] = $result_notificacion;
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'notificacion no enviada';
                    }
                }
                else
                {
                    /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar(
                        $result_invitacion->last_id,
                        $nuevo_profesional->id,
                        $institucion->id,
                        $request->id_lugar_atencion,
                        $request->id_tipo_convenio_institucion,
                        $request->fijo,
                        $request->atencion,
                        $request->ventas,
                        $request->confirmacion_agenda,
                        $request->ggcc,
                        $request->box,
                        '',
                        '',
                        $request->observacion);

                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv;
                    if($registro_prof_inst_conv->estado == 1)
                    {
                        /** ENVIO NOTIFICACION */
                        $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $result_invitacion->last_id, $nuevo_profesional->id);

                        $datos['notificacion'] = $result_notificacion;
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'notificacion no enviada';
                    }
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en invitacion';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function buscar_profesional(Request $req)
    {
        try {
            $datos = array();
            $profesional = Profesional::where('id', $req->id_profesional)->first();

            if($profesional)
            {
                $direccion_text = 'No Informada';
                if($profesional->id_direccion != '' || $profesional->id_direccion!=0)
                {
                    $direccion = Direccion::where('id', $profesional->id_direccion)->first();
                    if($direccion)
                        $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
                }
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $profesional;
                $datos['direccion'] = $direccion_text;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }

            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function buscar_asistente(Request $request)
    {
        $datos = array();

        $asistente = Asistente::where('id', $request->id)->first();

        if($asistente)
        {
            $direccion_text = 'No Informada';
            if($asistente->id_direccion != '' || $asistente->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $asistente->id_direccion)->first();
                if($direccion)
                    $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
            }

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
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            /** CARGA DE ASISTENTES */
            $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
            $filtro = array();
            $filtro[] = array('id_empleado', $asistente->id);
            $filtro[] = array('estado', 2);
            $filtro[] = array('id_lugar_atencion', $LugarAtencion->id);
            $asistente->contrato = ContratoDependiente::where($filtro)->first();

            $filtro_d = array();
            $filtro_d[] = array();
            $asistente->direccion = Direccion::with('Ciudad')->find($asistente->id_direccion);

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $asistente;
            $datos['direccion'] = $direccion_text;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;
    }

    public function buscar_administrativo(Request $req){

        $datos = array();
        $administrativo = AdminInstServ::where('id', $req->id)->first();
        // buscamos al profesional relacionado

        if($administrativo)
        {
            $direccion_text = 'No Informada';
            if($administrativo->id_direccion != '' || $administrativo->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $administrativo->id_direccion)->first();
                if($direccion)
                    $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
            }

            $administrativo->contrato = ContratoDependiente::where('id_empleado', $administrativo->id)->first();

            $administrativo->direccion = Direccion::with('Ciudad')->find($administrativo->id_direccion);

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $administrativo;
            $datos['direccion'] = $direccion_text;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;

    }

    public function buscar_mantencion(Request $req){

            $datos = array();
            $mantencion = AdminMantenInst::where('id', $req->id)->first();

            // buscamos al profesional relacionado

            if($mantencion)
            {
                $direccion_text = 'No Informada';
                if($mantencion->id_direccion != '' || $mantencion->id_direccion!=0)
                {
                    $direccion = Direccion::where('id', $mantencion->id_direccion)->first();
                    if($direccion)
                        $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
                }

                $mantencion->contrato = ContratoDependiente::where('id_empleado', $mantencion->id)->first();

                $mantencion->direccion = Direccion::with('Ciudad')->find($mantencion->id_direccion);

                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $mantencion;
                $datos['direccion'] = $direccion_text;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }

            return $datos;
    }

    public function buscar_paciente_rut(Request $request)
    {

        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        $institucion = Instituciones::where('id_lugar_atencion', $id_lugar_atencion)->first();

        if($institucion){
            $sucursales = Sucursal::where('id_institucion', $institucion->id)->get();
            if(count($sucursales) > 0){
                $ids_lugares_atencion = array();
                foreach($sucursales as $sucursal){
                    $lugares_atencion_sucursal = LugarAtencion::where('id', $sucursal->id_lugar_atencion)->get();
                    if(count($lugares_atencion_sucursal) > 0){
                        foreach($lugares_atencion_sucursal as $lugar_atencion_sucursal){
                            $ids_lugares_atencion[] = $lugar_atencion_sucursal->id;
                        }

                    }
                }
                $ids_lugares_atencion[] = intval($institucion->id_lugar_atencion);
            }else{
                $ids_lugares_atencion = array($id_lugar_atencion);
            }
        }

        // $filtro = array();
        // $filtro[] = array('rut',$rut);
        // $filtro[] = array('nombres','like','%'.$nombre.'%');

        // $filtro_2 = array();
        // $filtro_2[] = array('apellido_uno','like','%'.$apellido.'%');
        // $filtro_2[] = array('apellido_dos','like','%'.$apellido.'%');
        // 1=1
        // rut='26340063-1' and (nombres like '%'.$nombre.'%'; or apellido_uno like '%daviladasda%' or apellido_dos like '%fdavila%')

        $sql  = '';
        $sql_val = array();
        if(!empty($rut))
        {
            $sql .= " rut=? ";
            $sql_val[] = $rut;
        }
        if(!empty($nombre))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " nombres like ? ";
            $sql_val[] = '%'.$nombre.'%';
        }
        if(!empty($apellido))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " apellido_uno like ?  OR  apellido_dos like ? ";
            $sql_val[] = '%'.$apellido.'%';
            $sql_val[] = '%'.$apellido.'%';
        }

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($ids_lugares_atencion){
                                // Usar whereIn para array de IDs
                                $query->select('id','id_lugar_atencion','id_paciente')
                                      ->whereIn('id_lugar_atencion', $ids_lugares_atencion);
                            }])
                            ->with(['Prevision' =>function($query){
                                $query->select('id','nombre');
                            }])
                            ->with(['Direccion' =>function($query){
                                $query->select('id','direccion','numero_dir','id_ciudad')
                                            ->with(['Ciudad' => function($query2){
                                                $query2->select('id','nombre','id_region');
                                            }]);
                            }])
                            // Para el filtro principal, puedes hacer dos opciones:

                            // OPCIÓN 1: Si tienes un scope que acepta array
                            ->porLuAt_Rut_Nom_Ape($ids_lugares_atencion, $rut, $nombre, $apellido)

                            // OPCIÓN 2: O filtrar directamente con whereHas
                            ->whereHas('FichaAtencion', function($query) use ($ids_lugares_atencion) {
                                $query->whereIn('id_lugar_atencion', $ids_lugares_atencion);
                            })
                            ->where(function($query) use ($rut, $nombre, $apellido) {
                                if(!empty($rut)) {
                                    $query->orWhere('rut', $rut);
                                }
                                if(!empty($nombre)) {
                                    $query->orWhere('nombres', 'like', '%'.$nombre.'%');
                                }
                                if(!empty($apellido)) {
                                    $query->orWhere('apellido_uno', 'like', '%'.$apellido.'%')
                                          ->orWhere('apellido_dos', 'like', '%'.$apellido.'%');
                                }
                            })
                            ->get();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function guardar_estado_paciente(Request $req){

        $paciente = Paciente::where('id', $req->id_paciente)->first();
        $datos = array();

        if($paciente){
            try {
                // Actualizar el campo estado en la tabla pacientes
                $paciente->estado = $req->tipo_estado;
                $paciente->save();

                // verificamos si ya existe un estado igual para no duplicar
                $estado_existente = PacienteEstado::where('id_paciente', $req->id_paciente)
                                        ->where('id_lugar_atencion', $req->id_lugar_atencion)
                                        // ->where('id_profesional', $req->id_profesional)
                                        ->first();
                if($estado_existente){
                    // eliminamos el estado existente
                    $estado_existente->delete();
                }

                // Crear registro en la tabla pacientes_estado
                PacienteEstado::create([
                    'id_paciente' => $req->id_paciente,
                    'estado' => $req->tipo_estado,
                    'id_lugar_atencion' => $req->id_lugar_atencion,
                    'id_responsable' => $req->id_profesional,
                    'fecha' => now(),
                    'observaciones' => $req->observaciones,
                ]);

                $datos['estado'] = 1;
                $datos['msj'] = 'Estado actualizado correctamente';
            } catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al guardar el estado: ' . $e->getMessage();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'Paciente no encontrado';
        }

        return $datos;
    }

    public function asistente_adm_mis_profesionales()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();
        $institucion = Instituciones::where('id_lugar_atencion', $id_lugar_atencion)->first();

        $profesionales = $lugares_atencion->profesionales()->get();


        $url = 'app.asistente_adm_cm.mis_profesionales'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
            'profesionales' => $profesionales,
            'institucion' => $institucion,
        );

        return view($url, $array_data);
    }
	public function adm_inst_mis_profesionales()
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();

        $profesionales = $LugarAtencion->profesionales()->get();


        $url = 'app.adm_cm.mis_profesionales'; // institucion
        $array_data = array(
            'lugares_atencion' => $LugarAtencion,
            'profesionales' => $profesionales,
            'institucion' => $institucion,
        );

        return view($url, $array_data);
    }
    public function asistente_adm_cargar_contrato(Request $request)
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->where('id_asistente_tipo',3)->first();
        if($asistente)
        {
            $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

            $filtro = array();
            $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
            $filtro[] = array('estado',2) ;
            $contrato = ContratoDependiente::where($filtro)->first();
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $id_institucion = $contrato->id_institucion;

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos_nuevos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',1)
                                            // ->persona()
                                            ->get();
            $contratos_activos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',2)
                                            ->get();
            $contratos_vencidos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',3)
                                            ->get();
            $contratos_finalizados = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',4)
                                            ->get();

            /** PROFESIONALES */
            $profesionales = array();

            $url = 'app.asistente_adm_cm.contratos';
            $array_data = array(
                'asistente' => $asistente,
                'contratos_nuevos' => $contratos_nuevos,
                'contratos_activos' => $contratos_activos,
                'contratos_vencidos' => $contratos_vencidos,
                'contratos_finalizados' => $contratos_finalizados,
                'profesionales' => $profesionales,
            );

            return view($url, $array_data);
        }
        else
        {
            return back()->with('error','Asistente sin permiso de visualizar Contratos');
        }
    }

    public function asistente_adm_detalle_contrato(Request $request)
    {
        $datos = array();

        if(!empty($request->id))
        {
            $registros = ContratoDependiente::where('id', $request->id)->first();
            if($registros)
            {
                if(strstr(strtoupper($registros->tipo_empleado), 'ASISTENTE') !== FALSE)
                {
                    $registro = Asistente::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );

                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'ADMINISTRADOR') >= 0)
                {
                    $registro = AdminInstServ::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );
                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'CONTADOR') >= 0)
                {

                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'PROFESIONAL') >= 0)
                {
                    $registro = Profesional::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );
                }

                $registros->persona = $registro;

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registro'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
            }
        }
        else
        {
            $datos['estado']=0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = array('id'=>'Campo requerido');
        }

        return $datos;
    }

    public function modificar_rol_asistente(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_movimiento))
        {
            $error['id_tipo_movimiento'] = 'campo requerido';
            $valido = 0;
        }
        if($request->movimiento == '')
        {
            $error['movimiento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            // Buscar al administrativo primero, y luego el usuario asociado
            $administrativo = AdminInstServ::find($request->id_user);
            $user = null;

            if($administrativo && $administrativo->id_admin) {
                $user = User::find($administrativo->id_admin);
            }

            if(!$user) {
                // Intentar buscar directamente como usuario si no se encuentra como administrativo
                $user = User::find($request->id_user);
            }

            $rol = '';

            if($user)
            {
                // roles
                // 4 - Asistente
                // 10 - AsistenteAdm
                // 11 - AsistenteJefaCaja
                // 12 - AsistenteCaja
                // 13 - AsistenteOnline

                // 2 - Paciente
                // 3 - Profesional
                // 5 - Institucion
                // 6 - Servicio

                // 7 - Adm_Institucion
                // 8 - Adm_Servicio

                // 9 - Contador

                switch (mb_strtoupper($request->id_tipo_movimiento))
                {
                    case 'ASISTENTE':
                        // asistente tipo
                        // 1 - Asistente Publico
                        // 2 - Asistente Jefa Caja
                        // 3 - Asistente Administrativo
                        // 4 - Asistente Online
                        // 5 - Asistente Consulta
                        $rol = $request->id_tipo;
                        /** actualizar asistente */

                        break;
                    case 'ADMINISTRADOR':
                        // TIPO ADMINISTRADO
                        // 1 - Administrador de CM
                        // 2 - Administrador de Servicios
                        $rol = $request->id_tipo;
                        break;
                    case 'CONTADOR':
                        $rol = $request->id_tipo;
                        break;
                    // default:
                    //     # code...
                    //     break;
                }

                /** AGREGAR ROL */
                if($request->movimiento == 1)
                {
                    try {

                        $user->assignRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
                /** QUITAR ROL */
                else
                {
                    try {
                        $user->removeRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'usuario no encontrado - ID administrativo: ' . $request->id_user . ($administrativo ? ' (Administrativo encontrado, pero sin usuario asociado)' : ' (Administrativo no encontrado)');
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /**
     * GET permisos de un asistente
     */
    public function get_permisos_asistente(Request $request)
    {
        $id_asistente = $request->id_asistente;
        $id_lugar_atencion = $request->id_lugar_atencion;

        if (empty($id_asistente)) {
            return response()->json(['estado' => 0, 'msj' => 'id_asistente requerido']);
        }
        if (empty($id_lugar_atencion)) {
            return response()->json(['estado' => 0, 'msj' => 'id_lugar_atencion requerido']);
        }

        $permiso = PermisoAsistente::firstOrNew([
            'id_asistente' => $id_asistente,
            'id_lugar_atencion' => $id_lugar_atencion,
        ]);

        return response()->json([
            'estado'   => 1,
            'permisos' => [
                'permiso_cotizar'            => (bool) $permiso->permiso_cotizar,
                'permiso_confirmar_hora'     => (bool) $permiso->permiso_confirmar_hora,
                'permiso_anular_hora'        => (bool) $permiso->permiso_anular_hora,
                'permiso_subir_ver_archivos' => (bool) $permiso->permiso_subir_ver_archivos,
                'permiso_eliminar_archivos'  => (bool) $permiso->permiso_eliminar_archivos,
                'permiso_editar_pacientes'   => (bool) $permiso->permiso_editar_pacientes,
                'permiso_ver_pacientes'      => (bool) $permiso->permiso_ver_pacientes,
                'permiso_agendar_horas_extras' => (bool) $permiso->permiso_agendar_horas_extras,
                'permiso_agendar_examenes' => (bool) $permiso->permiso_agendar_examenes,
                'permiso_transcripcion_examenes' => (bool) $permiso->permiso_transcripcion_examenes,
                'permiso_entrega_caja' => (bool) $permiso->permiso_entrega_caja,
            ],
        ]);
    }

    /**
     * POST guardar permisos de un asistente
     */
    public function guardar_permisos_asistente(Request $request)
    {

        $id_asistente = $request->id_asistente;
        $id_lugar_atencion = $request->id_lugar_atencion;

        if (empty($id_asistente)) {
            return response()->json(['estado' => 0, 'msj' => 'id_asistente requerido']);
        }
        if (empty($id_lugar_atencion)) {
            return response()->json(['estado' => 0, 'msj' => 'id_lugar_atencion requerido']);
        }

        $permiso = PermisoAsistente::firstOrNew([
            'id_asistente' => $id_asistente,
            'id_lugar_atencion' => $id_lugar_atencion,
        ]);
        $permiso->id_asistente = $id_asistente;
        $permiso->id_lugar_atencion = $id_lugar_atencion;
        $permiso->permiso_cotizar = (int) $request->input('permiso_cotizar', 0) === 1;
        $permiso->permiso_confirmar_hora = (int) $request->input('permiso_confirmar_hora', 0) === 1;
        $permiso->permiso_anular_hora = (int) $request->input('permiso_anular_hora', 0) === 1;
        $permiso->permiso_subir_ver_archivos = (int) $request->input('permiso_subir_ver_archivos', 0) === 1;
        $permiso->permiso_eliminar_archivos = (int) $request->input('permiso_eliminar_archivos', 0) === 1;
        $permiso->permiso_editar_pacientes = (int) $request->input('permiso_editar_pacientes', 0) === 1;
        $permiso->permiso_ver_pacientes = (int) $request->input('permiso_ver_pacientes', 0) === 1;
        $permiso->permiso_agendar_horas_extras = (int) $request->input('permiso_agendar_horas_extras', 0) === 1;
        $permiso->permiso_agendar_examenes = (int) $request->input('permiso_agendar_examenes', 0) === 1;
        $permiso->permiso_transcripcion_examenes = (int) $request->input('permiso_transcripcion_examenes', 0) === 1;
        $permiso->permiso_entrega_caja = (int) $request->input('permiso_entrega_caja', 0) === 1;
        $permiso->save();

        return response()->json(['estado' => 1, 'msj' => 'Permisos guardados correctamente']);
    }

    public function modificar_rol_asistente_bak(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_movimiento))
        {
            $error['id_tipo_movimiento'] = 'campo requerido';
            $valido = 0;
        }
        if($request->movimiento == '')
        {
            $error['movimiento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $user = User::find($request->id_user);
            $rol = '';
            if($user)
            {
                // roles
                // 4 - Asistente
                // 10 - AsistenteAdm
                // 11 - AsistenteJefaCaja
                // 12 - AsistenteCaja
                // 13 - AsistenteOnline

                // 2 - Paciente
                // 3 - Profesional
                // 5 - Institucion
                // 6 - Servicio

                // 7 - Adm_Institucion
                // 8 - Adm_Servicio

                // 9 - Contador

                switch (mb_strtoupper($request->id_tipo_movimiento))
                {
                    case 'ASISTENTE':
                        // asistente tipo
                        // 1 - Asistente Publico
                        // 2 - Asistente Jefa Caja
                        // 3 - Asistente Administrativo
                        // 4 - Asistente Online
                        // 5 - Asistente Consulta
                        switch ($request->id_tipo) {

                            case '1':
                                $rol = 'AsistenteCaja';
                                break;
                            case '2':
                                $rol = 'AsistenteJefaCaja';
                                break;
                            case '3':
                                $rol = 'AsistenteAdm';
                                break;
                            case '4':
                                $rol = 'AsistenteOnline';
                                break;
                            case '5':
                                $rol = 'Asistente';
                                break;

                            // default:
                            //     $rol = '';
                            //     break;
                        }
                        break;
                    case 'ADMINISTRADOR':
                        switch ($request->id_tipo) {
                            // TIPO ADMINISTRADO
                            // 1 - Administrador de CM
                            // 2 - Administrador de Servicios
                            case '1':
                                $rol = 'Adm_Institucion';
                                break;
                            case '2':
                                $rol = 'Adm_Servicio';
                                break;
                            // default:
                            //     $rol = '';
                            //     break;
                        }
                        break;
                    case 'CONTADOR':
                         $rol = 'Contador';
                        break;
                    // default:
                    //     # code...
                    //     break;
                }

                /** AGREGAR ROL */
                if($request->movimiento == 1)
                {
                    try {
                        $user->assignRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
                /** QUITAR ROL */
                else
                {
                    try {
                        $user->removeRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'usuario no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

	public function areaComercial(Request $request)
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
                return back()->with('error','Institución no encontrada');
            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        return view('app.adm_cm.escritorio_adm_comercial',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
        ]);
    }

    public function sueldos(Request $request)
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
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        $ano_toma = '';
        $mes_toma = '';
        if( empty($request->filtro_anio) && empty($request->filtro_mes))
        {
            $ano_toma = date('Y');
            $mes_toma = date('m');
        }
        else
        {
            $ano_toma = $request->filtro_anio;
            $mes_toma = $request->filtro_mes;
        }

        $filtro_contrato = array();
        $filtro_contrato[] = array('id_institucion', $institucion->id);
        $filtro_contrato[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);

        // echo json_encode($filtro_contrato);

        $registro_personal = ContratoDependiente::with('Persona')
                                                    ->with('Institucion')
                                                    ->with('LugarAtencion')
                                                    ->where($filtro_contrato)
                                                    ->whereIn('estado', [2,3])
                                                    ->filtroFechaContratoActivo($ano_toma, $mes_toma, $institucion->id_lugar_atencion)
                                                    ->get();

        foreach ($registro_personal as $key => $value)
        {
            $filtro_remu = array();
            $filtro_remu[] = array('r_ano_liq', $ano_toma);
            $filtro_remu[] = array('r_mes_liq', $mes_toma);
            $filtro_remu[] = array('id_contrato_dependiente', $value->id);
            $filtro_remu[] = array('id_empleado', $value->id_empleado);
            $remuneracion_result = Remuneraciones::where($filtro_remu)->whereIn('estado', [1,2])->first();
            if($remuneracion_result)
            {
                $registro_personal[$key]->remuneracion = $remuneracion_result;
            }
            else
            {
                $registro_personal[$key]->remuneracion = array();
            }
        }

        return view('app.adm_cm.sueldos')->with([
            'registro_personal' => $registro_personal,
            'institucion' => $institucion,
            'ano_toma' => $ano_toma,
            'mes_toma' => $mes_toma,
        ]);
    }

    public function areaContabilidad(Request $request)
    {
        return view('app.contabilidad.escritorio_contabilidad');
    }
	public function ContadorRrHh(Request $request)
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

        $regiones = Region::all();
        $bancos = Bancos::all();
        $especialidades = Especialidad::all();
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();



        foreach($profesionales_contratados as $profesional){
            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();
            if($contrato){
                $profesional->contrato = $contrato;
                $profesional->es_convenio = false;
                $especialidad_contrato = Especialidad::find($contrato->id_especialidad);
                $profesional->especialidad_contrato = $especialidad_contrato;
                $tipo_especialidad = TipoEspecialidad::find($contrato->id_tipo_especialidad);
                if($tipo_especialidad) $profesional->tipo_especialidad_contrato = $tipo_especialidad->nombre;
                $sub_tipo_especialidad = SubTipoEspecialidad::find($contrato->id_sub_tipo_especialidad);
                if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad_contrato = $sub_tipo_especialidad->nombre;

            }else{
                $profesional->contrato = null;
            }
            $profesional->horas_semanales = 45;
        }

        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_administrativo = array();
        if($LugarAtencion)
        {
            $lista_administrativo = $LugarAtencion->AdministrativoInstitucion()->get();

            if($lista_administrativo)
            {
                foreach ($lista_administrativo as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_administrativo[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_administrativo[$key]->roles = '';

                    /** tipo administrativo */
                    $lista_administrativo[$key]->tipo_administrativo = TipoAdministrador::find($value->id_tipo_administrador);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_administrativo[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion','tipo_empleado')->where($filtro_cont)->first();
                }
            }
        }

        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_mantencion = array();
        if($LugarAtencion)
        {
            $lista_mantencion = $LugarAtencion->MantencionInstitucion()->get();

            if($lista_mantencion)
            {
                foreach ($lista_mantencion as $key => $value)
                {
                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    if($usuario){
                        $roles = $usuario->roles()->get();
                        $array_roles = array();
                        foreach ($roles as $key_2 => $value_2) {
                            array_push($array_roles, $value_2->name);
                        }

                        if(!empty($array_roles))
                            $lista_mantencion[$key]->roles = implode(",",$array_roles);
                        else
                            $lista_mantencion[$key]->roles = '';
                    }

                    if($value->empresa == 1){
                        $lista_mantencion[$key]->empresa = true;
                    }else{
                        $lista_mantencion[$key]->empresa = false;
                    }

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_mantencion[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion','tipo_empleado')->where($filtro_cont)->first();
                }
            }
        }

        /** LISTA CONTRATO */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }
        /** FIN LISTA CONTRATO */

        $lista_tipo_administrativo = TipoAdministrador::where('estado', 1)->get();
        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        return view('app.contabilidad.secciones_contabilidad.rrhh',
            [
                'regiones' => $regiones,
                'bancos' => $bancos,
                'especialidades' => $especialidades,
                'profesionales_contratados' => $profesionales_contratados,
                'institucion' => $institucion,
                'lista_administrativo' => $lista_administrativo,
                'lista_tipo_contrato' => (object)$lista_tipo_contrato,
                'lista_tipo_administrativo' => $lista_tipo_administrativo,
                'lista_mantencion' => $lista_mantencion,
                'tipo_convenio' => $tipo_convenio
            ]
        );
    }
    public function ContadorSueldos(Request $request)
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

            // $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();;

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
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();

        foreach($profesionales_contratados as $profesional){
            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();
            if($contrato){
                $profesional->contrato = $contrato;
                $especialidad_contrato = Especialidad::find($contrato->id_especialidad);
                $profesional->especialidad_contrato = $especialidad_contrato;
                $tipo_especialidad = TipoEspecialidad::find($contrato->id_tipo_especialidad);
                if($tipo_especialidad) $profesional->tipo_especialidad_contrato = $tipo_especialidad->nombre;
                $sub_tipo_especialidad = SubTipoEspecialidad::find($contrato->id_sub_tipo_especialidad);
                if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad_contrato = $sub_tipo_especialidad->nombre;

            }else{
                $profesional->contrato = null;
            }
            $profesional->horas_semanales = 45;
        }

        return view('app.contabilidad.secciones_contabilidad.remuneraciones',[
            'profesionales_contratados' => $profesionales_contratados,
            'institucion' => $institucion,
        ]);
    }

    public function adm_liquidacion_profesional(Request $request){
        try{
            $profesional = Profesional::find($request->id);
            $liquidaciones = LiquidacionesProfesional::where('id_profesional',$profesional->id)->get();
            return ['profesional' => $profesional, 'liquidaciones' => $liquidaciones];
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function finalizar_contrato(Request $request){
        try {
            $profesional = Profesional::find($request->id);
            $anio = 2024;
            // Renderizar la vista del reporte anual
            $pdf = Pdf::loadView('app.contabilidad.secciones_contabilidad.finalizar_contrato', compact('profesional'));
            // Guardar el PDF en la carpeta public
            $fileName = 'termino_contrato_' . $anio . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function generar_liquidacion_profesional(Request $request){
        try{
            $profesional = Profesional::find($request->id_profesional);
            $liquidacion = new LiquidacionesProfesional();
            $liquidacion->id_profesional = $profesional->id;
            $liquidacion->id_institucion = $request->id_institucion;
            $liquidacion->id_lugar_atencion = $request->id_lugar_atencion;
            $contrato = ContratoDependienteProfesional::find($request->id_contrato);
            $liquidacion->monto_imponible = $contrato->monto_imponible;
            $liquidacion->id_contrato = $contrato->id;
            $liquidacion->fecha = Carbon::now();
            $liquidacion->numero_atenciones = $request->numero_atenciones;
            $liquidacion->descuentos = $request->descuentos;
            $liquidacion->porcentaje = $request->porcentaje;
            $liquidacion->total = $request->total_pago;
            $liquidacion->id_usuario = Auth::user()->id;

            if($liquidacion->save()){
                return ['estado' => 'OK','mensaje' => 'Exito'];
            }else{
                return ['estado' => 'error','mensaje' => 'Error'];
            }
        }catch(Exception $e){
            return ['estado' => 'error','mensaje' => $e->getMessage()];
        }
    }

    public function eliminar_liquidacion_profesional(Request $request){
        try {
            $liquidacion = LiquidacionesProfesional::find($request->id);
            $id_profesional = $liquidacion->id_profesional;
            if($liquidacion->delete()){
                $liquidaciones = LiquidacionesProfesional::where('id_profesional',$id_profesional)->get();
                return ['estado' => 'OK','mensaje' => 'Liquidacion eliminada con éxito.', 'liquidaciones' => $liquidaciones];
            }else{
                return ['estado' => 'error', 'mensaje' => 'ha ocurrido un problema'];
            }
        } catch (\Exception $e) {
            return ['estado' => 'error', 'mensaje' => $e->getMessage()];
        }
    }

    public function ContadorLiquidaciones(Request $request)
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

            // $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();;

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
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();

        foreach($profesionales_contratados as $profesional){
            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();
            if($contrato){
                $profesional->contrato = $contrato;
                $especialidad_contrato = Especialidad::find($contrato->id_especialidad);
                $profesional->especialidad_contrato = $especialidad_contrato;
                $tipo_especialidad = TipoEspecialidad::find($contrato->id_tipo_especialidad);
                if($tipo_especialidad) $profesional->tipo_especialidad_contrato = $tipo_especialidad->nombre;
                $sub_tipo_especialidad = SubTipoEspecialidad::find($contrato->id_sub_tipo_especialidad);
                if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad_contrato = $sub_tipo_especialidad->nombre;

            }else{
                $profesional->contrato = null;
            }
            $profesional->horas_semanales = 45;
        }
        $profesionales = $this->dame_profesionales($institucion->id_lugar_atencion);
        $bancos = Bancos::all();
        $liquidaciones_institucion = $this->dame_liquidaciones_institucion($institucion->id);

        return view('app.contabilidad.secciones_contabilidad.liquidaciones',[
            'profesionales_contratados' => $profesionales_contratados,
            'profesionales' => $profesionales,
            'institucion' => $institucion,
            'bancos' => $bancos,
            'liquidaciones' => $liquidaciones_institucion
        ]);
    }

    public function dame_liquidaciones_institucion($id_institucion){
        try {
            $institucion = Instituciones::find($id_institucion);
            $liquidaciones = LiquidacionesProfesional::select('liquidaciones_profesional.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','profesionales.rut','profesionales.id_especialidad','profesionales.id_tipo_especialidad')
                                                        ->join('profesionales','liquidaciones_profesional.id_profesional','profesionales.id')
                                                        ->where('liquidaciones_profesional.id_institucion', $institucion->id)
                                                        ->where('liquidaciones_profesional.id_lugar_atencion',$institucion->id_lugar_atencion)
                                                        ->get();
            foreach($liquidaciones as $l){
                $especialidad = Especialidad::find($l->id_especialidad);
                $tipo_especialidad = TipoEspecialidad::find($l->id_tipo_especialidad);
                $l->especialidad = $especialidad->nombre;
                $l->tipo_especialidad = $tipo_especialidad->nombre;
            }

            return $liquidaciones;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function ContadorRemuneraciones(Request $request)
    {
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

            // $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();;

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


        $ano_toma = date('Y');
        $mes_toma = date('m');
        $registro_personal = ContratoDependiente::with('Persona')
                                                    ->with('Institucion')
                                                    ->with('LugarAtencion')
                                                    ->whereIn('estado', [2,3])
                                                    ->filtroFechaContratoActivo($ano_toma, $mes_toma,$registro->id_lugar_atencion)
                                                    ->get();

        $registro_profesional = ContratoDependienteProfesional::with('Persona')
                                                ->with('Institucion')
                                                ->with('LugarAtencion')
                                                ->whereIn('estado', [2,3])
                                                ->filtroFechaContratoActivo($ano_toma, $mes_toma,$registro->id_lugar_atencion)
                                                ->get();


        // Junta los dos conjuntos en una sola colección
        $registros = $registro_personal;

        // Recorre todos los registros combinados
        foreach ($registros as $key => $value) {
            $filtro_remu = [
                ['r_ano_liq', $ano_toma],
                ['r_mes_liq', $mes_toma],
                ['id_contrato_dependiente', $value->id],
                ['id_empleado', $value->id_empleado]
            ];

            $remuneracion_result = Remuneraciones::where($filtro_remu)->whereIn('estado', [1,2])->first();

            // Asigna el resultado de remuneración
            $value->remuneracion = $remuneracion_result ? $remuneracion_result : [];
        }

        // Depuración final para confirmar el resultado de remuneraciones
        // dd('Registros combinados con remuneraciones:', $registros);

        return view('app.contabilidad.secciones_contabilidad.info-pago_sueldos',[
            'mes_toma' => $mes_toma,
            'registro_personal' => $registros,
            'registro_profesional' => $registro_profesional
        ]);
    }
    public function ContadorLibroContable(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.contable');
    }
    public function ContadorIngresos(Request $request)
    {
        $contexto = $this->resolverContextoInstitucionContable();
        if ($contexto instanceof \Illuminate\Http\RedirectResponse) {
            return $contexto;
        }

        $institucion = $contexto['institucion'];
        $fechaActual = Carbon::now();
        $bonoReferenciaColumn = Schema::hasColumn('bonos', 'referencia')
            ? 'referencia'
            : (Schema::hasColumn('bonos', 'id_referencia') ? 'id_referencia' : null);

        $bonosBase = Bono::query();
        if (!empty($institucion->id_lugar_atencion) && !empty($bonoReferenciaColumn)) {
            $idLugarAtencion = (int) $institucion->id_lugar_atencion;

            $bonosBase = Bono::query()->where(function ($query) use ($idLugarAtencion, $bonoReferenciaColumn) {
                $query->whereIn('bonos.' . $bonoReferenciaColumn, function ($sub) use ($idLugarAtencion) {
                    $sub->select('id')
                        ->from('fichas_atenciones')
                        ->where('id_lugar_atencion', $idLugarAtencion);
                })
                ->orWhereIn('bonos.' . $bonoReferenciaColumn, function ($sub) use ($idLugarAtencion) {
                    $sub->select('horas_medicas.id')
                        ->from('horas_medicas')
                        ->join('fichas_atenciones', 'fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion')
                        ->where('fichas_atenciones.id_lugar_atencion', $idLugarAtencion);
                });
            });
        }

        $ingresosMes = (clone $bonosBase)
            ->whereMonth('fecha_atencion', $fechaActual->month)
            ->whereYear('fecha_atencion', $fechaActual->year)
            ->orderByDesc('fecha_atencion')
            ->get(['id', 'numero_bono', 'fecha_atencion', 'glosa', 'valor_atencion', 'rendido']);

        return view('app.contabilidad.secciones_contabilidad.ingresos', [
            'institucion' => $institucion,
            'fecha_actual' => $fechaActual,
            'total_ingresos_mes' => (float) $ingresosMes->sum('valor_atencion'),
            'cantidad_ingresos_mes' => (int) $ingresosMes->count(),
            'ingresos_mes' => $ingresosMes,
        ]);
    }
    public function ContadorEgresos(Request $request)
    {
        $contexto = $this->resolverContextoInstitucionContable();
        if ($contexto instanceof \Illuminate\Http\RedirectResponse) {
            return $contexto;
        }

        $institucion = $contexto['institucion'];
        $fechaActual = Carbon::now();

        $comprasQuery = Compras::query();
        if (Schema::hasColumn('compras', 'id_institucion')) {
            $comprasQuery->where('id_institucion', $institucion->id);
        }

        $comprasMes = $comprasQuery
            ->whereMonth('fecha_emision', $fechaActual->month)
            ->whereYear('fecha_emision', $fechaActual->year)
            ->orderByDesc('fecha_emision')
            ->get(['id', 'numero_factura', 'fecha_emision', 'fecha_pago', 'total', 'total_final', 'estado']);

        $totalComprasMes = (float) $comprasMes->sum(function ($compra) {
            $totalFinal = (float) ($compra->total_final ?? 0);
            $total = (float) ($compra->total ?? 0);
            return $totalFinal > 0 ? $totalFinal : $total;
        });

        $gastosQuery = GastosInstitucionales::query();
        if (Schema::hasColumn('gastos_institucionales', 'id_institucion')) {
            $gastosQuery->where('id_institucion', $institucion->id);
        }

        $mesInt = (int) $fechaActual->month;
        $mesPadded = str_pad((string) $mesInt, 2, '0', STR_PAD_LEFT);
        $anioActual = (string) $fechaActual->year;

        $gastosMes = $gastosQuery
            ->where(function ($query) use ($mesInt, $mesPadded, $anioActual) {
                $query->where(function ($q) use ($mesInt, $mesPadded, $anioActual) {
                    $q->whereIn('mes_pago', [(string) $mesInt, $mesPadded])
                        ->where('ano_pago', $anioActual);
                });

                if (Schema::hasColumn('gastos_institucionales', 'created_at')) {
                    $query->orWhere(function ($q) use ($mesInt, $anioActual) {
                        $q->where(function ($qq) {
                            $qq->whereNull('mes_pago')->orWhere('mes_pago', '');
                        })->where(function ($qq) {
                            $qq->whereNull('ano_pago')->orWhere('ano_pago', '');
                        })->whereYear('created_at', $anioActual)
                          ->whereMonth('created_at', $mesInt);
                    });
                }
            })
            ->orderByDesc('created_at')
            ->get(['id', 'nombre', 'folio', 'emisor', 'vencimiento', 'mes_pago', 'ano_pago', 'monto', 'estado', 'created_at']);

        $totalGastosMes = (float) $gastosMes->sum(function ($gasto) {
            return $this->normalizarMontoFloat($gasto->monto ?? 0);
        });

        return view('app.contabilidad.secciones_contabilidad.egresos', [
            'institucion' => $institucion,
            'fecha_actual' => $fechaActual,
            'compras_mes' => $comprasMes,
            'gastos_mes' => $gastosMes,
            'total_compras_mes' => $totalComprasMes,
            'total_gastos_mes' => $totalGastosMes,
            'total_egresos_mes' => (float) ($totalComprasMes + $totalGastosMes),
            'cantidad_egresos_mes' => (int) ($comprasMes->count() + $gastosMes->count()),
        ]);
    }
    public function ContadorFacturas(Request $request)
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
        return view('app.contabilidad.secciones_contabilidad.factura',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion
        ]);
    }
    public function areaBodega(Request $request)
    {
        return view('');
    }

    public function areaEstadistica()
    {

        return view('app.contabilidad.secciones_contabilidad.estadisticas_inicio');
    }

    public function areaLiquidaciones(){
        return view('app.contabilidad.secciones_contabilidad.liquidaciones');
    }

    /** ADMINISTRADOR COMERCIAL */
    public function configuracion_comercial(){
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

        $director_comercial = Profesional::find($institucion->id_director_comercial);
        $tipo_cuentas_bancarias = TipoCuentaBancaria::all();
        $cuenta_bancaria = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
                                                ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
                                                ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
                                                ->where('id_institucion', $institucion->id)
                                                ->get();

        $bancos = Bancos::all();

        return view('app.adm_cm.configuracion_esc_comercial',[
            'institucion' => $institucion,
            'director_comercial' => $director_comercial,
            'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
            'cuentas_bancarias' => $cuenta_bancaria ? $cuenta_bancaria : null,
            'bancos' => $bancos
        ]);
    }

    public function escritorioAdminComercial()
    {
        return view('app.adm_cm.escritorio_adm_comercial_adm');
    }

    public function registrar_especialidad_cm(Request $req){
        try {
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

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }


            $especialidadesCm = new EspecialidadesCm();
            $especialidadesCm->id_tipo_especialidad = $req->especialidad;
            $especialidadesCm->id_sub_tipo_especialidad = $req->sub_tipo_especialidad;
            $especialidadesCm->id_lugar_atencion = $institucion->id_lugar_atencion;
            $especialidadesCm->id_institucion = $institucion->id;
            $especialidadesCm->num_profesionales = $req->num_profesionales;
            $especialidadesCm->id_admin = Auth::user()->id;
            $especialidadesCm->estado = 1;
            $especialidadesCm->principal = $req->principal;
            $especialidadesCm->save();

            $especialidades = $this->dame_especialidades_cm($req->id_institucion);
            $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);

            return ['estado' => 1, 'msj' => 'Especialidad registrada', 'especialidades' => $especialidades, 'otras_especialidades' => $otras_especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }

    }

    public function eliminar_especialidad_cm(Request $req){
        try {
            $especialidadesCm = EspecialidadesCm::where('id', $req->id)->first();
            $especialidadesCm->delete();

            $especialidades = $this->dame_especialidades_cm($req->id_institucion);
            $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);

            return ['estado' => 1, 'msj' => 'Especialidad eliminada', 'especialidades' => $especialidades,'otras_especialidades' => $otras_especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function eliminar_otra_especialidad(Request $req){
        try {
            $especialidadesCm = EspecialidadesCm::where('id', $req->id)->first();
            $especialidadesCm->delete();

            $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);
            $especialidades = $this->dame_especialidades_cm($req->id_institucion);

            return ['estado' => 1, 'msj' => 'Especialidad eliminada', 'especialidades' => $especialidades,'otras_especialidades' => $otras_especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function dame_especialidades_cm($id_institucion){
        $especialidades = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','especialidades_cm.num_profesionales','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id_institucion', $id_institucion)
                                        ->where('especialidades_cm.principal',1)
                                        ->get();
        return $especialidades;
    }

    public function dame_otras_especialidades_cm($id_institucion){
        $especialidades = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id_institucion', $id_institucion)
                                        ->where('especialidades_cm.principal',0)
                                        ->get();
        return $especialidades;
    }

    public function dame_especialidad($id){
        $especialidad = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','especialidades_cm.num_profesionales','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo','sub_tipo_especialidad.id as id_sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id', $id)
                                        ->first();
        return $especialidad;
    }

    public function toggleSalaEspera(Request $req)
    {
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
        if (!$institucion) {
            return response()->json(['estado' => 0, 'msj' => 'Institución no encontrada.']);
        }
        $institucion->sala_espera = $req->sala_espera ? 1 : 0;
        $institucion->save();
        $texto = $institucion->sala_espera ? 'Salas de espera habilitadas.' : 'Salas de espera deshabilitadas.';
        return response()->json(['estado' => 1, 'msj' => $texto, 'sala_espera' => $institucion->sala_espera]);
    }

    public function cambiar_estado_especialidad(Request $req){

        $estado = $req->estado;
        $especialidad = EspecialidadesCm::where('id', $req->id)->first();

        if($estado == 1){
            $especialidad->estado = 1;
        }else{
            $especialidad->estado = 0;
        }
        $especialidad->save();
        $especialidades = $this->dame_especialidades_cm($req->id_institucion);
        $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);

        return ['estado' => 1, 'msj' => 'Especialidad actualizada', 'especialidades' => $especialidades, 'otras_especialidades' => $otras_especialidades];
    }

    public function editar_direccion_medica(Request $req){

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


        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }
        try {
            $profesional = Profesional::find($req->responsable);
            if(!$profesional){
                return ['estado' => 0, 'msj' => 'Profesional no encontrado'];
            }

            $user = User::find($profesional->id_usuario);
            if(!$user){
                return ['estado' => 0, 'msj' => 'Usuario asociado al profesional no encontrado'];
            }

            // Tabla donde estan todos los tipos de administraciones medicas
            $cargo = TipoAdministrador::where('id', $req->cargo)->first();
            if(!$cargo){
                return ['estado' => 0, 'msj' => 'Cargo no encontrado'];
            }

            $institucion = Instituciones::where('id', $req->id_institucion)->first();
            if(!$institucion){
                return ['estado' => 0, 'msj' => 'Institución no encontrada'];
            }

            $ciudad = Ciudad::find($req->ciudad);
            if(!$ciudad){
                return ['estado' => 0, 'msj' => 'Ciudad no encontrada'];
            }

            if(!empty($req->region) && intval($ciudad->id_region) !== intval($req->region)){
                return ['estado' => 0, 'msj' => 'La ciudad no corresponde a la región seleccionada'];
            }

            DB::beginTransaction();

            $profesional->rut = $req->rut;
            $profesional->email = $req->correo;
            $profesional->telefono_uno = $req->telefono;
            $profesional->save();

            $direccion = $profesional->Direccion()->first();
            if(!$direccion){
                $direccion = new Direccion();
            }
            $direccion->direccion = $req->direccion;
            $direccion->numero_dir = $req->numero_dir;
            $direccion->id_ciudad = $req->ciudad;
            $direccion->save();

            $profesional->id_direccion = $direccion->id;
            $profesional->save();

            $user->email = $req->correo;

            if($cargo->id == 1 || $cargo->id == 7){
                $institucion->id_director_medico = intval($user->id);
                $user->assignRole(3); // Profesional
                $user->assignRole(23); // Director Médico
            }

            if($cargo->id == 2){
                $institucion->id_subdirector_medico = intval($user->id);
                $user->assignRole(3); // Profesional
                $user->assignRole(8); // Administrador comercial
            }


            if($cargo->id == 3){
                $institucion->id_director_gestion_cuidado = intval($user->id);
                $user->assignRole(3); // Profesional
                $user->assignRole(17); // Administrador farmacia
            }



            if($cargo->id == 4){
                $institucion->id_director_comercial = intval($user->id);
                $user->assignRole(19); // Profesional MINISTERIO
            }

            if($cargo->id == 5) {
                $user->assignRole(3); // Profesional
                $user->assignRole(9); // Contador
            }

            if($cargo->id == 8){
                $institucion->id_director_tecnico = intval($user->id);
                $user->assignRole(32); // Administrador Técnico
            }


            $institucion->update();
            $user->save();

            // Guardar también en la tabla pivot (nueva arquitectura)
            InstitucionAdministrador::updateOrCreate(
                [
                    'id_institucion'        => $institucion->id,
                    'id_tipo_administrador' => $cargo->id,
                ],
                [
                    'id_usuario' => $user->id,
                    'estado'     => 1,
                ]
            );

            // Cargar colección completa para el fragmento
            $administradores_cm = InstitucionAdministrador::where('id_institucion', $institucion->id)
                ->where('estado', 1)
                ->get();
            foreach ($administradores_cm as $adm) {
                $adm->profesional = Profesional::where('id_usuario', $adm->id_usuario)->first();
                $adm->tipo = TipoAdministrador::find($adm->id_tipo_administrador);
            }

            if($institucion->id_director_medico){
                $director_cm = Profesional::where('id_usuario', $institucion->id_director_medico)->first();
            }else{
                $director_cm = null;
            }

            if($institucion->id_subdirector_medico){
                $subdirector_cm = Profesional::where('id_usuario', $institucion->id_subdirector_medico)->first();
            }else{
                $subdirector_cm = null;
            }

            if($institucion->id_director_gestion_cuidado){
                $director_gestion_cuidado = Profesional::where('id_usuario', $institucion->id_director_gestion_cuidado)->first();
            }else{
                $director_gestion_cuidado = null;
            }

            if($institucion->id_director_comercial){
                $director_comercial = Profesional::where('id_usuario', $institucion->id_director_comercial)->first();
            }else{
                $director_comercial = null;
            }

            if($institucion->id_director_tecnico){
                $director_tecnico = Profesional::where('id_usuario', $institucion->id_director_tecnico)->first();
            }else{
                $director_tecnico = null;
            }

           if ($cargo->id == 1 || $cargo->id == 7) {
                $cargo_str = 'director_cm';
            } elseif ($cargo->id == 2) {
                $cargo_str = 'subdirector_cm';
            } elseif ($cargo->id == 3) {
                $cargo_str = 'director_gestion_cuidado';
            } elseif ($cargo->id == 4) {
                $cargo_str = 'director_comercial';
            } else if($cargo->id == 8){
                $cargo_str = 'director_tecnico';
            } else {
                $cargo_str = null;
            }


            $v = view('fragm.administradores_cm',[
                'director_cm' => $director_cm ? $director_cm : null,
                'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
                'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
                'director_tecnico' => $director_tecnico ? $director_tecnico : null,
                'responsable' => $responsable ? $responsable : null,
                'institucion' => $institucion,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
                'cargo' => $cargo_str,
                'administradores_cm' => $administradores_cm,

            ])->render();
            DB::commit();
            return ['estado' => 1, 'msj' => 'Cargo registrado', 'v' => $v];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }

    }

    public function eliminar_area_profesional(Request $req){
        try {
            $area_cm = AreasCm::where('id', $req->id)->first();
            $lugar_atencion = $area_cm->id_lugar_atencion;
            $area_cm->delete();
            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if(!$institucion){
                $institucion = Instituciones::find($req->id_institucion);
            }
            $areas = $this->dame_areas_cm($lugar_atencion);
            $v = view('fragm.areas_cm',[
                'areas_cm' => $areas,
                'institucion' => $institucion
            ])->render();
            return ['estado' => 1, 'msj' => 'Area eliminada', 'areas' => $areas, 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function editar_especialidad_cm(Request $req){
        try {
            //code...
            $especialidadesCm = EspecialidadesCm::where('id', $req->id_especialidad_cm)->first();
            $especialidadesCm->num_profesionales = intval($req->numero_profesionales);
            $especialidadesCm->id_sub_tipo_especialidad = $req->id_tipo_especialidad;
            $especialidadesCm->save();
            $especialidades = $this->dame_especialidades_cm($req->id_institucion);
            $v = view('fragm.especialidades_cm',[
                'especialidades_cm' => $especialidades
            ])->render();
            return ['estado' => 1, 'msj' => 'Especialidad actualizada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function editar_cuenta_bancaria_institucion(Request $req){

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

        try {

            $nueva_cuenta = CuentaBancariaInst::find($req->id);

            $nueva_cuenta->rut_titular = $req->rut_titular;
            $nueva_cuenta->nombre_titular = $req->nombre_titular;

            $nueva_cuenta->numero_cuenta = $req->numero_cuenta;
            $nueva_cuenta->rut_representante = $req->rut_representante;
            $nueva_cuenta->nombre_representante = $req->nombre_representante;
            $nueva_cuenta->id_institucion = $institucion->id;

            $nueva_cuenta->id_banco = $req->banco_titular;
            $nueva_cuenta->id_tipo_cuenta = intval($req->tipo_cuenta);

            $nueva_cuenta->id_responsable = Auth::user()->id;
            $nueva_cuenta->email = $req->email_titular;
            $nueva_cuenta->telefono = "123456789";
            $nueva_cuenta->estado = 1;
            $nueva_cuenta->observaciones = "Cuenta Bancaria Institucion";
            $nueva_cuenta->update();

            $cuentas_bancarias = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
            ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
            ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
            ->where('id_institucion', $institucion->id)
            ->get();

            $tipo_cuentas_bancarias = TipoCuentaBancaria::all();

            $bancos = Bancos::all();

            $v = view('fragm.cuentas_bancarias_inst',[
            'cuentas_bancarias' => $cuentas_bancarias,
            'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
            'bancos' => $bancos
            ])->render();

            return ['estado' => 1, 'msj' => 'Cuenta editada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function agregar_cuenta_bancaria_institucion(Request $req){
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

        try {

            // verificar si el rut ya existe en la base de datos de cuentas bancarias
            $cuenta_bancaria = CuentaBancariaInst::where('rut_titular', $req->rut_titular)->first();
            if($cuenta_bancaria)
                return ['estado' => 0, 'msj' => 'El rut ya se encuentra registrado'];

            $nueva_cuenta = new CuentaBancariaInst();

            $nueva_cuenta->rut_titular = $req->rut_titular;
            $nueva_cuenta->nombre_titular = $req->nombre_titular;

            $nueva_cuenta->numero_cuenta = intval($req->numero_cuenta);
            $nueva_cuenta->id_institucion = $institucion->id;

            $nueva_cuenta->id_banco = $req->banco_titular;
            $nueva_cuenta->id_tipo_cuenta = intval($req->tipo_cuenta);
            $nueva_cuenta->rut_representante = $req->rut_representante;
            $nueva_cuenta->nombre_representante = $req->nombre_representante;
            $nueva_cuenta->id_responsable = Auth::user()->id;
            $nueva_cuenta->email = $req->email_titular;
            $nueva_cuenta->telefono = "123456789";
            $nueva_cuenta->estado = 1;
            $nueva_cuenta->observaciones = "Cuenta Bancaria Institucion";
            $nueva_cuenta->save();

            $cuentas_bancarias = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
                                                    ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
                                                    ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
                                                    ->where('id_institucion', $institucion->id)
                                                    ->get();

            $tipo_cuentas_bancarias = TipoCuentaBancaria::all();

            $bancos = Bancos::all();

            $v = view('fragm.cuentas_bancarias_inst',[
                'cuentas_bancarias' => $cuentas_bancarias,
                'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
                'bancos' => $bancos
            ])->render();

            return ['estado' => 1, 'msj' => 'Cuenta creada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function eliminar_cuenta_bancaria_institucion(Request $req){
        try {
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
            $cuenta_bancaria = CuentaBancariaInst::where('id', $req->id)->first();
            $cuenta_bancaria->delete();

            $cuentas_bancarias = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
                                                    ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
                                                    ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
                                                    ->where('id_institucion', $institucion->id)
                                                    ->get();

            $tipo_cuentas_bancarias = TipoCuentaBancaria::all();

            $bancos = Bancos::all();

            $v = view('fragm.cuentas_bancarias_inst',[
                'cuentas_bancarias' => $cuentas_bancarias,
                'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
                'bancos' => $bancos
            ])->render();

            return ['estado' => 1, 'msj' => 'Cuenta eliminada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function registrar_profesional(Request $req){
        try {
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

            // verificar que el rut no este contratado en la institucion
            $contrato = ContratoProfesionalInstitucion::where('rut', $req->rut)->where('id_institucion', $institucion->id)->where('email',$req->email)->first();
            if($contrato)
                return ['estado' => 0, 'msj' => 'El rut o email ya se encuentra registrado'];

            $nuevo_contrato = new ContratoProfesionalInstitucion();
            $nuevo_contrato->rut = $req->rut;
            $nuevo_contrato->fecha_ingreso = $req->f_ingreso;
            $nuevo_contrato->nombre = $req->nombre;
            $nuevo_contrato->primer_apellido = $req->apellido1;
            $nuevo_contrato->segundo_apellido = $req->apellido2;
            $nuevo_contrato->email = $req->email;
            $nuevo_contrato->telefono = $req->telefono1;
            $nuevo_contrato->telefono_dos = $req->telefono2;
            $nuevo_contrato->direccion = $req->direccion;
            $nuevo_contrato->id_cargo = 1;
            $nuevo_contrato->id_region = $req->region;
            $nuevo_contrato->id_comuna = $req->comuna;
            $nuevo_contrato->id_profesion = $req->profesion;
            $nuevo_contrato->id_especialidad = $req->especialidad;
            $nuevo_contrato->id_sub_tipo_especialidad = $req->sub_especialidad;
            $nuevo_contrato->dias_laborales = $req->dias_laborales;
            $nuevo_contrato->horario_atencion = $req->horario;
            $nuevo_contrato->pacientes_hora = $req->p_hora;
            $nuevo_contrato->id_banco = $req->banco;
            $nuevo_contrato->numero_cuenta = $req->n_cta;
            $nuevo_contrato->sucursal = $req->sucursal;
            $nuevo_contrato->id_institucion = $institucion->id;
            $nuevo_contrato->id_tipo_contrato = 1; // contrato indefinido (por defecto)

            $nuevo_contrato->save();

            $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();

            foreach($profesionales_contratados as $profesional){
                $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();
                if($contrato){
                    $profesional->contrato = $contrato;
                    $especialidad_contrato = Especialidad::find($contrato->id_especialidad);
                    $profesional->especialidad_contrato = $especialidad_contrato;
                    $tipo_especialidad = TipoEspecialidad::find($contrato->id_tipo_especialidad);
                    if($tipo_especialidad) $profesional->tipo_especialidad_contrato = $tipo_especialidad->nombre;
                    $sub_tipo_especialidad = SubTipoEspecialidad::find($contrato->id_sub_tipo_especialidad);
                    if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad_contrato = $sub_tipo_especialidad->nombre;

                }else{
                    $profesional->contrato = null;
                }
                $profesional->horas_semanales = 45;
            }

            $v = view('fragm.profesionales_contratados',[
                'profesionales_contratados' => $profesionales_contratados,
            ])->render();

            return ['estado' => 1, 'msj' => 'Profesional registrado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function registrar_asistente(Request $req){
        try {
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

            // verificar que el rut no este contratado en la institucion
            $contrato = ContratoAsistenteInstitucion::where('rut', $req->rut)->where('id_institucion', $institucion->id)->where('email',$req->email)->first();
            if($contrato)
                return ['estado' => 0, 'msj' => 'El rut o email ya se encuentra registrado'];

            $nuevo_contrato = new ContratoAsistenteInstitucion();
            $nuevo_contrato->rut = $req->rut;
            $nuevo_contrato->fecha_ingreso = $req->fecha_ingreso;
            $nuevo_contrato->nombre = $req->nombre;
            $nuevo_contrato->apellido_paterno = $req->apellido_paterno;
            $nuevo_contrato->apellido_materno = $req->apellido_materno;
            $nuevo_contrato->email = $req->email;
            $nuevo_contrato->telefono = $req->telefono;
            $nuevo_contrato->direccion = $req->direccion;
            $nuevo_contrato->numero = $req->numero;
            $nuevo_contrato->id_cargo = $req->profesion;
            $nuevo_contrato->id_region = $req->region;
            $nuevo_contrato->id_comuna = $req->ciudad;
            $nuevo_contrato->id_funcion = $req->funcion;
            $nuevo_contrato->horas_contratadas = $req->horas_contrato;
            $nuevo_contrato->sueldo_bruto = intval($req->remuneracion);
            $nuevo_contrato->id_banco = $req->banco;
            $nuevo_contrato->numero_cuenta = $req->n_cta;
            $nuevo_contrato->sucursal = $req->sucursal;
            $nuevo_contrato->id_institucion = $institucion->id;
            $nuevo_contrato->id_tipo_contrato = 1; // contrato indefinido (por defecto)

            if($nuevo_contrato->save()){
                $asistentes_contratados = ContratoAsistenteInstitucion::where('id_institucion',$institucion->id)->get();
                $v = view('fragm.asistentes_contratados',[
                    'asistentes_contratados' => $asistentes_contratados,
                ])->render();
                return ['estado' => 1, 'msj' => 'Asistente registrado', 'v' => $v];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function dame_convenio(Request $req){
        try {
            //code...
            $convenio = ProfesionalConvenio::where('id', $req->id)->first();

            if(!$convenio){
                return ['estado' => 0, 'msj' => 'Convenio no encontrado'];
            }

            return ['estado' => 1, 'convenio' => $convenio];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_convenio_profesional(Request $request){
        $filtros = [];
        $filtros['id_profesional'] = $request->id_profesional;
        if($request->id_lugar_atencion){
            $filtros['id_lugar_atencion'] = $request->id_lugar_atencion;
        }

        $profesional_convenios = ProfesionalConvenio::where($filtros)->get();
        if($profesional_convenios)
        {
            return ['estado' => 1, 'profesional_convenios' => $profesional_convenios];
        }
        else
        {
            return ['estado' => 0, 'msj' => 'No se encontraron convenios'];
        }
    }

    public function registrar_convenio(Request $req){
        try {
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
            $nuevo_convenio = new ConvenioInstitucion();
            $nuevo_convenio->nombre_representante_convenio_institucion = $req->nombre_representante_convenio;
            $nuevo_convenio->id_tipo_convenio = intval($req->tipo_convenio);
            $nuevo_convenio->id_tipo_convenio_institucion = intval($req->tipo_convenio_institucion);
            $nuevo_convenio->nombre_convenio_institucion = $req->nombre_convenio;
            $nuevo_convenio->fecha_inicio_convenio_institucion = $req->fecha_inicial_pago_convenio;
            $nuevo_convenio->fecha_fin_convenio_institucion = $req->fecha_final_pago_convenio;
            $nuevo_convenio->rut_representante_convenio_institucion = $req->rut_representante_convenio;
            $nuevo_convenio->nombre_representante_convenio_institucion = $req->nombre_representante_convenio;
            $nuevo_convenio->telefono_representante_convenio_institucion = $req->telefono_representante_convenio;
            $nuevo_convenio->email_representante_convenio_institucion = $req->email_representante_convenio;
            $nuevo_convenio->direccion_representante_convenio_institucion = $req->direccion_representante_convenio;
            $nuevo_convenio->observaciones_convenio_institucion = $req->observaciones_nuevo_convenio;
            $nuevo_convenio->productos_convenio_institucion = json_encode($req->productos_convenio);
            $nuevo_convenio->porcentaje_convenio_institucion = intval($req->porcentaje_dcto);
            $nuevo_convenio->id_institucion = $institucion->id;
            $nuevo_convenio->estado = 1;

            if($nuevo_convenio->save()){
                $convenios = ConvenioInstitucion::select('convenio_institucion.*','tipo_convenio_institucion.nombre as tipo_convenio')
                                                            ->join('tipo_convenio_institucion','convenio_institucion.id_tipo_convenio_institucion','=','tipo_convenio_institucion.id')
                                                            ->where('convenio_institucion.id_institucion',$institucion->id)
                                                            ->get();


                foreach($convenios as $convenio)
                {
                    $tipos_productos = [];
                    // pasar el json a array
                    $convenio->productos = json_decode($convenio->productos_convenio_institucion);
                    foreach($convenio->productos as $producto)
                    {
                        $tipo_producto = TipoProductoConvenios::find($producto);
                        array_push($tipos_productos,$tipo_producto->descripcion);
                    }

                    $convenio->tipos_productos = $tipos_productos;
                }

                $tipo_convenios = TipoConvenioInstitucion::all();

                $v = view('fragm.convenios_institucion',[
                    'convenios_institucion' => $convenios,
                    'tipo_convenios' => $tipo_convenios
                ])->render();
                return ['estado' => 1, 'msj' => 'Convenio registrado', 'v' => $v];
            }
            return $nuevo_convenio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function eliminar_convenio(Request $req){
        try {
            // Buscar y eliminar en el modelo ProfesionalConvenio
            $convenio = ProfesionalConvenio::find($req->id);

            if(!$convenio){
                return ['estado' => 0, 'msj' => 'Convenio no encontrado'];
            }

            $convenio->delete();

            return ['estado' => 1, 'msj' => 'Convenio eliminado correctamente'];
        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function editar_convenio(Request $req){
        try {
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
                            // else: puede ser profesional, se continúa
                        }
                    }
                    else
                    {
                        $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                        if($registro)                        {
                            /** LABORATORIO */
                            $institucion = $registro;
                            $tipo_institucion = 'laboratorio';
                        }
                        else
                        {
                            $registro = Profesional::where('id_usuario',Auth::user()->id)->first();
                            if($registro)                        {
                                /** PROFESIONAL */
                                $institucion = $registro;
                                $tipo_institucion = 'profesional';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                }
            }

            $convenio = ProfesionalConvenio::find($req->id_convenio);

            if(!$convenio){
                return ['estado' => 0, 'msj' => 'Convenio no encontrado'];
            }

            // Actualizar campos del convenio
            $convenio->convenios = $req->convenios ?: $convenio->convenios;
            $convenio->tipo_atencion = $req->tipo_atencion ?: $convenio->tipo_atencion;
            $convenio->valor = ($req->valor !== null && $req->valor !== '') ? $req->valor : $convenio->valor;
            $convenio->fecha_inicio = $req->fecha_inicio ?: $convenio->fecha_inicio;
            $convenio->fecha_fin = $req->fecha_fin ?: $convenio->fecha_fin;
            $convenio->valor_garantia = ($req->valor_garantia !== null && $req->valor_garantia !== '') ? $req->valor_garantia : $convenio->valor_garantia;
            $convenio->porcentaje = ($req->porcentaje !== null && $req->porcentaje !== '') ? $req->porcentaje : ($convenio->porcentaje ?? 0);
            $convenio->valor_copago_fonasa = ($req->copago_fonasa !== null && $req->copago_fonasa !== '') ? $req->copago_fonasa : $convenio->valor_copago_fonasa;
            $convenio->valor_bon_fonasa = ($req->bono_fonasa !== null && $req->bono_fonasa !== '') ? $req->bono_fonasa : $convenio->valor_bon_fonasa;
            $convenio->nivel_fonasa = ($req->nivel_fonasa !== null && $req->nivel_fonasa !== '') ? $req->nivel_fonasa : $convenio->nivel_fonasa;
            $convenio->tpo_espera = ($req->tpo_espera !== null && $req->tpo_espera !== '') ? intval($req->tpo_espera) : $convenio->tpo_espera;
            $convenio->id_lugar_atencion = $req->lugar_atencion ?: $convenio->id_lugar_atencion;

            // Campos de la pestaña Empresas (si vienen)
            if($req->nombre_convenio_edicion){
                $convenio->nombre_convenio_institucion = $req->nombre_convenio_edicion;
            }
            if($req->tipo_convenio_edicion){
                $convenio->id_tipo_convenio = intval($req->tipo_convenio_edicion);
            }
            if($req->porcentaje_dcto_edicion){
                $convenio->porcentaje_convenio_institucion = intval($req->porcentaje_dcto_edicion);
            }
            if($req->fecha_inicial_pago_convenio_edicion){
                $convenio->fecha_inicio_convenio_institucion = $req->fecha_inicial_pago_convenio_edicion;
            }
            if($req->fecha_final_pago_convenio_edicion){
                $convenio->fecha_fin_convenio_institucion = $req->fecha_final_pago_convenio_edicion;
            }
            if($req->observaciones_edicion_convenio){
                $convenio->observaciones_convenio_institucion = $req->observaciones_edicion_convenio;
            }

            if($req->has('productos_convenio')){
                $productosConvenio = $req->productos_convenio;
                if (is_array($productosConvenio)) {
                    $convenio->productos_convenio = count($productosConvenio) > 0 ? json_encode($productosConvenio) : null;
                } elseif (is_string($productosConvenio)) {
                    $convenio->productos_convenio = trim($productosConvenio) !== '' ? $productosConvenio : null;
                }
            }

            if($convenio->save()){
                return ['estado' => 1, 'msj' => 'Convenio editado correctamente', 'convenio' => $convenio];
            }

            return ['estado' => 0, 'msj' => 'Error al guardar el convenio'];
        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function eliminar_asistente(Request $req){
        try {
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
            $asistente = ContratoAsistenteInstitucion::find($req->id);

            $asistente->delete();
            $asistentes_contratados = ContratoAsistenteInstitucion::where('id_institucion',$institucion->id)->get();

            $v = view('fragm.asistentes_contratados',[
                'asistentes_contratados' => $asistentes_contratados,
            ])->render();
            return ['estado' => 1, 'msj' => 'Asistente eliminado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }


    }

    public function registrar_personal_mantencion(Request $req){
        try {
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

            $nuevo_contrato_mantencion = new ContratoMantencionInstitucion();
            $nuevo_contrato_mantencion->rut = $req->rut;
            $nuevo_contrato_mantencion->fecha_ingreso = $req->fecha;
            $nuevo_contrato_mantencion->nombre = $req->nombre;
            $nuevo_contrato_mantencion->primer_apellido = $req->apellido1;
            $nuevo_contrato_mantencion->segundo_apellido = $req->apellido2;
            $nuevo_contrato_mantencion->email = $req->email;
            $nuevo_contrato_mantencion->telefono = $req->telefono;
            $nuevo_contrato_mantencion->direccion = $req->direccion;
            $nuevo_contrato_mantencion->numero = $req->numero;
            $nuevo_contrato_mantencion->id_cargo = $req->profesion;
            $nuevo_contrato_mantencion->id_region = $req->region;
            $nuevo_contrato_mantencion->id_comuna = $req->comuna;
            $nuevo_contrato_mantencion->id_tipo_mantencion = $req->tipo;
            $nuevo_contrato_mantencion->id_funcion = $req->funcion;
            $nuevo_contrato_mantencion->horas_trabajadas = $req->horas_trabajadas;
            $nuevo_contrato_mantencion->remuneracion = intval($req->remuneracion);
            $nuevo_contrato_mantencion->id_banco = $req->banco;
            $nuevo_contrato_mantencion->numero_cuenta = $req->n_cta;
            $nuevo_contrato_mantencion->sucursal = $req->sucursal;
            $nuevo_contrato_mantencion->id_institucion = $institucion->id;
            $nuevo_contrato_mantencion->id_tipo_contrato = 1; // contrato indefinido (por defecto)
            $nuevo_contrato->estado = 2;
            if($nuevo_contrato_mantencion->save()){
                $mantenedores_contratados = ContratoMantencionInstitucion::where('id_institucion',$institucion->id)->get();
                $v = view('fragm.mantenedores_contratados',[
                    'mantenedores_contratados' => $mantenedores_contratados,
                ])->render();
                return ['estado' => 1, 'msj' => 'Mantenedor registrado', 'v' => $v];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }


    }

    public function eliminar_personal_mantencion(Request $req){
        try {
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
            $mantenedor = ContratoMantencionInstitucion::find($req->id);
            $mantenedor->delete();
            $mantenedores_contratados = ContratoMantencionInstitucion::where('id_institucion',$institucion->id)->get();
            $v = view('fragm.mantenedores_contratados',[
                'mantenedores_contratados' => $mantenedores_contratados,
            ])->render();
            return ['estado' => 1, 'msj' => 'Mantenedor eliminado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function solicitudes_pendientes(){
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

        $tipos_producto = TipoProducto::all();
        $empleados = User::all();
        $pedidos = Pedido::select('pedido.*', 'users.name as usuario')
            ->leftjoin('users', 'pedido.id_usuario', '=', 'users.id')
            ->where('pedido.estado', 1)
            ->get();

        if($institucion->id_tipo_institucion == 3){
            $productos_solicitados = ProductoSolicitado::where('id_institucion', $institucion->id)->get();
            return view('app.laboratorio.bodega.solicitudes_pendientes',[
                'institucion' => $institucion,
                'pedidos' => $pedidos,
                'tipos_producto' => $tipos_producto,
                'empleados' => $empleados,
                'productosSolicitados' => $productos_solicitados
            ]);
        }
        return view('app.bodega.solicitudes_pendientes',[
            'pedidos' => $pedidos,
            'tipos_producto' => $tipos_producto,
            'empleados' => $empleados,
            'institucion' => $institucion
        ]);
    }

    public function ver_solicitud(Request $req){
        try {
            //code...
            $tipos_producto = TipoProducto::all();
            $empleados = User::all();
            $pedido = Pedido::select('pedido.*', 'users.name as usuario')
                ->leftjoin('users', 'pedido.id_usuario', '=', 'users.id')
                ->where('pedido.id', $req->id)
                ->first();
            $bodega_controlador = new BodegasController();
            $todos_productos = $bodega_controlador->dameProductosEntregados($req->id);
            $productos_pedido = $todos_productos['entregados'];
            $productos_pendientes = $todos_productos['pendientes'];
            foreach($productos_pedido as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            foreach($productos_pendientes as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            return view('app.bodega.solicitud',[
                'pedido' => $pedido,
                'productos_pedido' => $productos_pedido,
                'productos_pendientes' => $productos_pendientes,
                'tipos_producto' => $tipos_producto,
                'empleados' => $empleados
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function generarPdfLiquidacion(Request $request){
        try {

            //code...
            $liquidacion = LiquidacionesProfesional::select('liquidaciones_profesional.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','instituciones.nombre as nombre_institucion','instituciones.rut as rut_institucion','instituciones.id as id_institucion','instituciones.telefono as telefono_institucion','profesionales.id_direccion as id_direccion_profesional','profesionales.telefono_uno')
            ->where('liquidaciones_profesional.id_institucion',$request->id_institucion)
            ->join('profesionales','liquidaciones_profesional.id_profesional','profesionales.id')
            ->leftjoin('instituciones','liquidaciones_profesional.id_institucion','instituciones.id')
            ->where('liquidaciones_profesional.id_lugar_atencion',$request->id_lugar_atencion)
            ->where('liquidaciones_profesional.id_profesional',$request->id_profesional)
            ->where('liquidaciones_profesional.estado',1)
            ->first();
            if(!$liquidacion){
                return 'error';
            }
            $institucion = Instituciones::find($liquidacion->id_institucion);
            $direccion = $institucion->Direccion()->first();
            $ciudad = $direccion->Ciudad()->first();
            $liquidacion->direccion_institucion =$direccion->direccion;
            $liquidacion->ciudad_institucion = $ciudad->nombre;

            $direccion_profesional = Direccion::find($liquidacion->id_direccion_profesional);
            $ciudad_profesional = $direccion_profesional->Ciudad()->first();
            $liquidacion->direccion_profesional = $direccion_profesional->direccion.' #'.$direccion_profesional->numero_dir;
            $liquidacion->ciudad_profesional = $ciudad_profesional->nombre;

            // Renderizar la vista del reporte diario
            $pdf = Pdf::loadView('app.adm_cm.liquidacion_pdf', compact('liquidacion'));
            // Guardar el PDF en la carpeta public
            $fileName = 'liquidacion_prof_' . $request->id_profesional . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // desasociar el profesional del lugar de atencion
            // $profesional_lugar_atencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion',$request->id_lugar_atencion)->where('id_profesional',$request->id_profesional)->first();
            // if($profesional_lugar_atencion) $profesional_lugar_atencion->delete();

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function actualizarFoto(Request $request)
    {
        try {

            // $request->validate([
            //     'foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            //     'id_institucion' => 'required|integer|exists:instituciones,id'
            // ]);

            $institucion = Instituciones::where('id', $request->id_institucion)->first();

            if (!$institucion) {
                return response()->json([
                    'success' => false,
                    'message' => 'Institución no encontrada'
                ], 404);
            }

            if ($institucion->foto_perfil) {
                Storage::disk('public')->delete($institucion->foto_perfil);
            }

            $path = $request->file('foto_perfil')->store('fotos_perfil', 'public');
            $institucion->update(['foto_perfil' => $path]);

            return response()->json([
                'success' => true,
                'message' => 'Foto actualizada correctamente',
                'foto_url' => asset('storage/' . $path)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la foto: ' . $e->getMessage()
            ], 500);
        }
    }

public function eliminarFoto(Request $request)
{
    try {
        $institucion = Instituciones::where('id', $request->id_institucion)->first();
        if (!$institucion) {
            return response()->json([
                'success' => false,
                'message' => 'Institución no encontrada'
            ], 404);
        }

        if ($institucion->foto_perfil) {
            Storage::disk('public')->delete($institucion->foto_perfil);
            $institucion->update(['foto_perfil' => null]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Foto eliminada correctamente'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al eliminar la foto: ' . $e->getMessage()
        ], 500);
    }
}

    public function cronicos(){
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

        $receta_control = RecetaControl::orderBy('Descripcion')->get();
        $entregas_pendientes = EntregaMedicamentoCronico::where('estado', 2)->with('paciente')->get();
        $entregas_en_curso = EntregaMedicamentoCronico::where('estado', 3)->with(['paciente', 'profesional'])->orderBy('updated_at', 'desc')->get();

        // Agrupar entregas pendientes por paciente
        $entregas_por_paciente = $entregas_pendientes->groupBy('id_paciente')->map(function($entregas) {
            $paciente = $entregas->first()->paciente;
            return [
                'paciente' => $paciente,
                'entregas' => $entregas,
                'total_medicamentos' => $entregas->count(),
            ];
        })->values();



        $profesionales_institucion = $this->dame_profesionales($institucion->id_lugar_atencion);

        // === Estadísticas para pestaña Reportes ===
        $entregas_entregadas = EntregaMedicamentoCronico::where('estado', 1)->with('paciente')->get();
        $total_medicamentos = EntregaMedicamentoCronico::count();
        $pacientes_activos = EntregaMedicamentoCronico::distinct('id_paciente')->count('id_paciente');
        $entregas_hoy = EntregaMedicamentoCronico::whereDate('fecha_entrega', now()->toDateString())->count();
        $total_pendientes = $entregas_pendientes->count();
        $total_en_curso = $entregas_en_curso->count();
        $total_entregadas = $entregas_entregadas->count();

        // Entregas por mes (últimos 6 meses) para tabla de reportes
        $entregas_por_mes = EntregaMedicamentoCronico::where('estado', 1)
            ->where('fecha_entrega', '>=', now()->subMonths(6)->startOfMonth())
            ->get()
            ->groupBy(function($entrega) {
                return Carbon::parse($entrega->fecha_entrega)->format('Y-m');
            })
            ->map(function($grupo, $mes) {
                return [
                    'mes' => $mes,
                    'mes_nombre' => Carbon::createFromFormat('Y-m', $mes)->translatedFormat('F Y'),
                    'total_entregas' => $grupo->count(),
                    'pacientes' => $grupo->unique('id_paciente')->count(),
                    'medicamentos' => $grupo->unique('nombre_medicamento')->count(),
                ];
            })
            ->sortKeys()
            ->values();

        // Top medicamentos más entregados
        $top_medicamentos = EntregaMedicamentoCronico::where('estado', 1)
            ->selectRaw('nombre_medicamento, COUNT(*) as total_entregas, SUM(cantidad_entregada) as total_cantidad')
            ->groupBy('nombre_medicamento')
            ->orderByDesc('total_entregas')
            ->limit(10)
            ->get();

        return view('app.centro_enfermeria_integral.cronicos',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'receta_control' => $receta_control,
            'entregas_pendientes' => $entregas_pendientes,
            'entregas_por_paciente' => $entregas_por_paciente,
            'entregas_en_curso' => $entregas_en_curso,
            'entregas_entregadas' => $entregas_entregadas,
            'profesionales' => $profesionales_institucion,
            // Estadísticas
            'total_medicamentos' => $total_medicamentos,
            'pacientes_activos' => $pacientes_activos,
            'entregas_hoy' => $entregas_hoy,
            'total_pendientes' => $total_pendientes,
            'total_en_curso' => $total_en_curso,
            'total_entregadas' => $total_entregadas,
            'entregas_por_mes' => $entregas_por_mes,
            'top_medicamentos' => $top_medicamentos,
        ]);
    }

    public function notificarEntregaMedicamento(Request $request){
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
                    $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

                    $asistente_lugar_atencion = AsistenteLugarAtencion::where('id_asistente',$asistente->id)->first();

                    $institucion = Instituciones::where('id_lugar_atencion',$asistente_lugar_atencion->id_lugar_atencion)->first();
                }
            }
        }
        try {

            $rut_paciente = $request->input('rut');
            $medicamentos_entregados = $request->input('medicamentos'); // Array de medicamentos entregados
            $paciente = Paciente::where('rut', $rut_paciente)->first();

            // se envia un correo promocional informando la entrega de los medicamentos
            $lugar_atencion = LugarAtencion::find($institucion->id_lugar_atencion);
            $profesional = Profesional::where('id_usuario', 3)->first();

            // Calcular fecha de entrega estimada (5 días hábiles desde hoy)
            $fecha_entrega = $this->calcularDiasHabiles(now(), 5);

            // Generar token único para la URL de solicitud
            $token = base64_encode($paciente->id . '|' . now()->timestamp . '|' . md5($paciente->rut));
            $url_solicitud = route('paciente.solicitud_medicamentos_cronicos', ['token' => $token]);

            /** envio de correo de confirmacion INSTITUCION */
            $blade = 'entrega_medicamentos_cronicos';
            $to = array(
                    array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                );

            $cc = array();
            $bcc = array();
            $asunto = 'MED-SDI - Entrega de Medicamentos Crónicos';


            $body = array(
                'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,

                'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
                'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
                'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre ?? null,
                'medicamentos' => $medicamentos_entregados,
                'lugar_atencion'=> $lugar_atencion->nombre,
                'direccion'=> $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
                'fecha_entrega_estimada' => $fecha_entrega->format('d/m/Y'),
                'url_solicitud' => $url_solicitud,
            );



            $archivo = '';/** pendiente */
            $id_institucion = $institucion->id ?? null;

            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

            if($result_mail['estado'])
            {
                $datos['mail']['institucion']['estado'] = 1;
                $datos['mail']['institucion']['msj'] = 'Notificacion de entrega de medicamentos crónicos enviado';
            }
            else
            {
                $datos['mail']['institucion']['estado'] = 0;
                $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de entrega de medicamentos crónicos';
            }

            return response()->json($datos);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Error al notificar la entrega: ' . $e->getMessage()
            ], 500);
        }

    }

    /**
     * Buscar pacientes para medicamentos crónicos
     */
    public function buscarPacientesCronicos(Request $request)
    {
        try {
            $termino = $request->input('termino');

            if (empty($termino)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Debe ingresar un término de búsqueda'
                ]);
            }

            $pacientes = Paciente::where('rut', 'LIKE', '%' . $termino . '%')
                ->orWhere('nombres', 'LIKE', '%' . $termino . '%')
                ->orWhere('apellidos', 'LIKE', '%' . $termino . '%')
                ->limit(10)
                ->get()
                ->map(function($paciente) {
                    return [
                        'id' => $paciente->id,
                        'rut' => $paciente->rut,
                        'nombres' => $paciente->nombres,
                        'apellidos' => $paciente->apellidos,
                        'telefono' => $paciente->telefono ?? 'No registrado',
                        'email' => $paciente->email ?? 'No registrado'
                    ];
                });

            return response()->json([
                'success' => true,
                'pacientes' => $pacientes
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al buscar pacientes: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Obtener medicamentos crónicos de un paciente
     */
    public function obtenerMedicamentosCronicos($paciente_id)
    {
        try {
            // Aquí deberías obtener los medicamentos crónicos del paciente desde la base de datos
            // Por ahora retornamos datos de ejemplo
            $medicamentos = [
                [
                    'id' => 1,
                    'medicamento' => 'Losartán 50mg',
                    'dosis' => '1 comprimido',
                    'frecuencia' => 'Cada 12 horas',
                    'indicaciones' => 'Con alimentos',
                    'fecha_inicio' => '2024-01-15',
                    'proxima_entrega' => '2024-02-15',
                    'stock_disponible' => 30
                ],
                [
                    'id' => 2,
                    'medicamento' => 'Metformina 850mg',
                    'dosis' => '1 comprimido',
                    'frecuencia' => 'Cada 8 horas',
                    'indicaciones' => 'Con las comidas',
                    'fecha_inicio' => '2024-01-10',
                    'proxima_entrega' => '2024-02-10',
                    'stock_disponible' => 45
                ]
            ];

            return response()->json([
                'success' => true,
                'medicamentos' => $medicamentos
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener medicamentos: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Agregar nuevo medicamento crónico
     */
    public function agregarMedicamentoCronico(Request $request)
    {
        try {
            $request->validate([
                'paciente_id' => 'required|integer',
                'medicamento' => 'required|string|max:255',
                'dosis' => 'required|string|max:100',
                'frecuencia' => 'required|string|max:100',
                'indicaciones' => 'nullable|string|max:500',
                'fecha_inicio' => 'required|date'
            ]);

            // Aquí deberías crear el medicamento en la base de datos
            // Por ahora retornamos éxito con datos de ejemplo

            return response()->json([
                'success' => true,
                'message' => 'Medicamento agregado correctamente',
                'medicamento' => [
                    'id' => rand(100, 999),
                    'medicamento' => $request->medicamento,
                    'dosis' => $request->dosis,
                    'frecuencia' => $request->frecuencia,
                    'indicaciones' => $request->indicaciones,
                    'fecha_inicio' => $request->fecha_inicio,
                    'proxima_entrega' => date('Y-m-d', strtotime($request->fecha_inicio . ' +30 days')),
                    'stock_disponible' => 0
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al agregar medicamento: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Editar medicamento crónico
     */
    public function editarMedicamentoCronico(Request $request, $medicamento_id)
    {
        try {
            $request->validate([
                'medicamento' => 'required|string|max:255',
                'dosis' => 'required|string|max:100',
                'frecuencia' => 'required|string|max:100',
                'indicaciones' => 'nullable|string|max:500'
            ]);

            // Aquí deberías actualizar el medicamento en la base de datos

            return response()->json([
                'success' => true,
                'message' => 'Medicamento actualizado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar medicamento: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Eliminar medicamento crónico
     */
    public function eliminarMedicamentoCronico($medicamento_id)
    {
        try {
            // Aquí deberías eliminar el medicamento de la base de datos

            return response()->json([
                'success' => true,
                'message' => 'Medicamento eliminado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar medicamento: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Registrar entrega de medicamento
     */
    public function registrarEntregaMedicamento(Request $request)
    {
        try {

            // Procesar si viene un array de medicamentos o una sola entrega
            $medicamentos = $request->input('medicamentos') ?: [$request->all()];
            $observaciones = $request->input('observaciones');

            $entregas = [];
            $errores = [];

            foreach ($medicamentos as $med) {
                // Validar cada medicamento
                if (empty($med['medicamento_id']) || empty($med['cantidad_entregada'])) {
                    $errores[] = 'Medicamento sin ID o cantidad';
                    continue;
                }

                // Procesar ID de medicamento (puede venir como "med_26" o número)
                $medicamento_id = $med['medicamento_id'];
                if (is_string($medicamento_id) && strpos($medicamento_id, 'med_') === 0) {
                    $medicamento_id = (int)str_replace('med_', '', $medicamento_id);
                }


                // Obtener el medicamento crónico
                $medicamento = MedicamentoUsoCronicoGeneral::find($medicamento_id);

                if (!$medicamento) {
                    $errores[] = "Medicamento ID {$medicamento_id} no encontrado";
                    continue;
                }

                // Obtener datos del medicamento
                $dataMedicamento = is_string($medicamento->antecedente_data)
                    ? json_decode($medicamento->antecedente_data, true)
                    : $medicamento->antecedente_data;

                $pacienteId = $medicamento->id_paciente ?? null;
                $idArticulo = $dataMedicamento['id_articulo'] ?? null;

                // Resolver id_profesional: viene del request (asistente selecciona profesional)
                // o se intenta resolver desde el usuario autenticado si es un profesional
                $id_profesional_request = $request->input('id_profesional');
                if (empty($id_profesional_request)) {
                    $prof = Profesional::where('id_usuario', Auth::user()->id)->first();
                    $id_profesional_request = $prof ? $prof->id : null;
                }

                // Crear registro de entrega
                $entrega = EntregaMedicamentoCronico::create([
                    'id_antecedente' => $medicamento_id,
                    'id_paciente' => $request->input('id_paciente') ?? $pacienteId,
                    'id_profesional' => $id_profesional_request,
                    'id_usuario' => Auth::user()->id,
                    'cantidad_entregada' => $med['cantidad_entregada'],
                    'fecha_entrega' => now()->toDateString(),
                    'hora_entrega' => now()->toTimeString(),
                    'observaciones' => $med['observaciones'] ?? $observaciones,
                    'nombre_medicamento' => $medicamento->nombre_medicamento ?? 'Medicamento sin nombre',
                    'presentacion' => $medicamento->presentacion ?? 'No especificada',
                    'posologia' => $medicamento->posologia ?? 'No especificada',
                    'via_administracion' => $medicamento->via_administracion ?? 'No especificada',
                    'id_medicamento' => $medicamento->id_articulo ?? $idArticulo,
                    'estado' => 2  // 2 = Pendiente
                ]);

                $entregas[] = $entrega;
            }

            // Respuesta con estatus de entregas y errores si los hay
            $response = [
                'success' => count($entregas) > 0,
                'entregas_registradas' => count($entregas),
                'total_solicitadas' => count($medicamentos),
                'entregas' => $entregas
            ];

            if (!empty($errores)) {
                $response['errores'] = $errores;
                $response['message'] = count($entregas) . ' de ' . count($medicamentos) . ' entregas registradas, con ' . count($errores) . ' error(es)';
            } else {
                $response['message'] = 'Todas las entregas (' . count($entregas) . ') registradas correctamente';
            }

            return response()->json($response, count($entregas) > 0 ? 200 : 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar entregas: ' . $e->getMessage(),
                'trace' => env('APP_DEBUG') ? $e->getTraceAsString() : null
            ], 500);
        }
    }

    /**
     * Calcula una fecha sumando N días hábiles (excluye sábados y domingos)
     *
     * @param Carbon $fechaInicio
     * @param int $diasHabiles
     * @return Carbon
     */
    private function calcularDiasHabiles($fechaInicio, $diasHabiles)
    {
        $fecha = $fechaInicio->copy();
        $diasContados = 0;

        while ($diasContados < $diasHabiles) {
            $fecha->addDay();
            // Si no es sábado (6) ni domingo (0), cuenta como día hábil
            if (!$fecha->isWeekend()) {
                $diasContados++;
            }
        }

        return $fecha;
    }

    private function resolverContextoInstitucionContable()
    {
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        $responsable = null;

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

        return [
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'responsable' => $responsable,
        ];
    }

    private function normalizarMontoFloat($monto)
    {
        $valor = trim((string) $monto);
        if ($valor === '') {
            return 0.0;
        }

        $valor = str_replace(['$', ' '], '', $valor);
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);

        return is_numeric($valor) ? (float) $valor : 0.0;
    }

    private function obtenerMontoCompraDashboard($compra)
    {
        $totalFinal = (float) $this->normalizarMontoFloat($compra->total_final ?? 0);
        if ($totalFinal > 0) {
            return $totalFinal;
        }

        $total = (float) $this->normalizarMontoFloat($compra->total ?? 0);
        $iva = (float) $this->normalizarMontoFloat($compra->iva ?? 0);
        $descuento = (float) $this->normalizarMontoFloat($compra->descuento ?? 0);

        $totalConIva = $total + $iva - $descuento;
        if ($totalConIva > 0) {
            return $totalConIva;
        }

        if (!isset($compra->detalles) || empty($compra->detalles)) {
            return 0.0;
        }

        return (float) collect($compra->detalles)->sum(function ($detalle) {
            $cantidad = (float) $this->normalizarMontoFloat($detalle->cantidad ?? 0);
            $precio = (float) $this->normalizarMontoFloat($detalle->precio_compra ?? 0);
            return $cantidad * $precio;
        });
    }

    /**
     * Muestra la vista pública para que el paciente solicite medicamentos adicionales
     */
    public function solicitudMedicamentosCronicos(Request $request)
    {
        try {
            $token = $request->query('token');

            if (empty($token)) {
                return view('app.paciente.solicitud_medicamentos_cronicos', [
                    'paciente' => null,
                    'token' => null,
                    'error' => 'Token no proporcionado'
                ]);
            }

            // Decodificar token: id_paciente|timestamp|hash
            $decoded = base64_decode($token);
            $parts = explode('|', $decoded);

            if (count($parts) !== 3) {
                return view('app.paciente.solicitud_medicamentos_cronicos', [
                    'paciente' => null,
                    'token' => null,
                    'error' => 'Token inválido'
                ]);
            }

            $id_paciente = $parts[0];
            $timestamp = $parts[1];

            // Verificar que el token no tenga más de 30 días
            $fecha_token = Carbon::createFromTimestamp($timestamp);
            if ($fecha_token->diffInDays(now()) > 30) {
                return view('app.paciente.solicitud_medicamentos_cronicos', [
                    'paciente' => null,
                    'token' => null,
                    'error' => 'Este enlace ha expirado. Solicite uno nuevo a su centro de salud.'
                ]);
            }

            $paciente = Paciente::find($id_paciente);

            if (!$paciente) {
                return view('app.paciente.solicitud_medicamentos_cronicos', [
                    'paciente' => null,
                    'token' => null,
                    'error' => 'Paciente no encontrado'
                ]);
            }

            return view('app.paciente.solicitud_medicamentos_cronicos', [
                'paciente' => $paciente,
                'token' => $token,
                'error' => null
            ]);

        } catch (\Exception $e) {
            return view('app.paciente.solicitud_medicamentos_cronicos', [
                'paciente' => null,
                'token' => null,
                'error' => 'Error al procesar la solicitud: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Guardar la solicitud de medicamentos adicionales del paciente
     */
    public function guardarSolicitudMedicamentosCronicos(Request $request)
    {
        try {
            $id_paciente = $request->input('id_paciente');
            $token = $request->input('token');
            $medicamentos = $request->input('medicamentos');
            $observaciones = $request->input('observaciones_generales');

            if (empty($id_paciente) || empty($medicamentos)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Datos incompletos. Se requiere paciente y al menos un medicamento.'
                ], 422);
            }

            $paciente = Paciente::find($id_paciente);
            if (!$paciente) {
                return response()->json([
                    'success' => false,
                    'message' => 'Paciente no encontrado.'
                ], 404);
            }

            // Guardar cada medicamento solicitado como entrega pendiente (estado 2)
            $entregas_creadas = [];
            foreach ($medicamentos as $med) {
                $entrega = EntregaMedicamentoCronico::create([
                    'id_paciente' => $id_paciente,
                    'id_profesional' => null,
                    'id_usuario' => null,
                    'cantidad_entregada' => $med['cantidad'] ?? 0,
                    'fecha_entrega' => now()->toDateString(),
                    'hora_entrega' => now()->toTimeString(),
                    'observaciones' => ($med['observaciones'] ?? '') . ($observaciones ? ' | Obs. general: ' . $observaciones : ''),
                    'nombre_medicamento' => $med['nombre'] ?? 'Sin nombre',
                    'presentacion' => $med['presentacion'] ?? 'No especificada',
                    'posologia' => 'Solicitado por paciente',
                    'via_administracion' => 'No especificada',
                    'estado' => 2 // Pendiente
                ]);
                $entregas_creadas[] = $entrega;
            }

            return response()->json([
                'success' => true,
                'message' => 'Solicitud de ' . count($entregas_creadas) . ' medicamento(s) registrada correctamente.',
                'entregas' => $entregas_creadas
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cambiar entregas pendientes (estado 2) a "en camino" (estado 3)
     * Registra el profesional encargado de la entrega
     */
    public function iniciarEntregaEnCurso(Request $request)
    {
        try {
            $ids = $request->input('ids', []);
            $id_profesional = $request->input('id_profesional');

            if (empty($ids) || !is_array($ids)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se recibieron entregas para procesar'
                ], 422);
            }

            if (empty($id_profesional)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Debe seleccionar un encargado de la entrega'
                ], 422);
            }

            $actualizadas = 0;
            $errores = [];

            foreach ($ids as $id) {
                $entrega = EntregaMedicamentoCronico::find($id);

                if (!$entrega) {
                    $errores[] = "Entrega ID {$id} no encontrada";
                    continue;
                }

                if ($entrega->estado != 2) {
                    $errores[] = "Entrega ID {$id} no está en estado pendiente (estado actual: {$entrega->estado})";
                    continue;
                }

                $entrega->estado = 3; // 3 = En camino
                $entrega->id_profesional = $id_profesional;
                $entrega->fecha_entrega = now()->toDateString();
                $entrega->hora_entrega = now()->toTimeString();
                $entrega->save();

                $actualizadas++;
            }

            $response = [
                'success' => $actualizadas > 0,
                'message' => $actualizadas . ' entrega(s) actualizada(s) a "en camino"',
                'actualizadas' => $actualizadas,
                'total_solicitadas' => count($ids)
            ];

            if (!empty($errores)) {
                $response['errores'] = $errores;
            }

            return response()->json($response, $actualizadas > 0 ? 200 : 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar las entregas: ' . $e->getMessage(),
                'trace' => env('APP_DEBUG') ? $e->getTraceAsString() : null
            ], 500);
        }
    }

    /**
     * Confirmar que una entrega en curso (estado 3) fue recibida → estado 1 (entregado)
     */
    public function confirmarEntregaRecibida(Request $request)
    {
        try {
            $id = $request->input('id');

            if (empty($id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID de entrega no proporcionado'
                ], 422);
            }

            $entrega = EntregaMedicamentoCronico::find($id);

            if (!$entrega) {
                return response()->json([
                    'success' => false,
                    'message' => 'Entrega no encontrada'
                ], 404);
            }

            if ($entrega->estado != 3) {
                return response()->json([
                    'success' => false,
                    'message' => 'Esta entrega no está en estado "en camino" (estado actual: ' . $entrega->estado . ')'
                ], 422);
            }

            $entrega->estado = 1; // 1 = Entregado
            $entrega->fecha_entrega = now()->toDateString();
            $entrega->hora_entrega = now()->toTimeString();
            $entrega->save();

            return response()->json([
                'success' => true,
                'message' => 'Entrega confirmada como recibida correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al confirmar la entrega: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener entregas de medicamentos crónicos filtradas por estado
     * Estado: 1 = Entregado, 2 = Pendiente, 3 = En camino
     * Retorna JSON con las entregas incluyendo datos de paciente y profesional
     */
    public function obtenerEntregasPorEstado(Request $request)
    {
        try {
            $estado = $request->input('estado');

            if (!in_array($estado, [1, 2, 3])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Estado inválido. Debe ser 1 (Entregado), 2 (Pendiente) o 3 (En camino)'
                ], 422);
            }

            $registros = EntregaMedicamentoCronico::where('estado', $estado)
                ->with(['paciente', 'profesional'])
                ->orderBy('updated_at', 'desc')
                ->get();

            // Para estado 1 (Entregado): agrupar por paciente + fecha de entrega
            if ((int)$estado === 1) {
                $entregas = $registros
                    ->groupBy(function($entrega) {
                        $pacienteId = $entrega->paciente->id ?? 'sin_paciente';
                        $fecha = $entrega->fecha_entrega
                            ? Carbon::parse($entrega->fecha_entrega)->format('Y-m-d')
                            : 'sin_fecha';
                        return $pacienteId . '_' . $fecha;
                    })
                    ->map(function($grupo) {
                        $primera = $grupo->first();
                        return [
                            'ids'                => $grupo->pluck('id')->toArray(),
                            'id'                 => $primera->id,
                            'fecha_entrega'      => $primera->fecha_entrega ? Carbon::parse($primera->fecha_entrega)->format('d-m-Y') : '-',
                            'estado'             => $primera->estado,
                            'paciente_nombre'    => $primera->paciente
                                ? trim(($primera->paciente->nombres ?? '-') . ' ' . ($primera->paciente->apellido_uno ?? '') . ' ' . ($primera->paciente->apellido_dos ?? ''))
                                : '-',
                            'paciente_rut'       => $primera->paciente->rut ?? '-',
                            'paciente_id'        => $primera->paciente->id ?? null,
                            'profesional_nombre' => $primera->profesional
                                ? trim(($primera->profesional->nombre ?? '-') . ' ' . ($primera->profesional->apellido_uno ?? ''))
                                : '-',
                            'medicamentos'       => $grupo->map(function($e) {
                                return [
                                    'id'                 => $e->id,
                                    'nombre_medicamento' => $e->nombre_medicamento ?? '-',
                                    'cantidad_entregada' => $e->cantidad_entregada ?? '-',
                                    'presentacion'       => $e->presentacion ?? '-',
                                    'posologia'          => $e->posologia ?? '-',
                                    'via_administracion' => $e->via_administracion ?? '-',
                                ];
                            })->values()->toArray(),
                        ];
                    })
                    ->values();
            } else {
                $entregas = $registros->map(function($entrega) {
                    return [
                        'id'                             => $entrega->id,
                        'nombre_medicamento'             => $entrega->nombre_medicamento ?? '-',
                        'presentacion'                   => $entrega->presentacion ?? '-',
                        'posologia'                      => $entrega->posologia ?? '-',
                        'via_administracion'             => $entrega->via_administracion ?? '-',
                        'cantidad_entregada'             => $entrega->cantidad_entregada ?? '-',
                        'fecha_entrega'                  => $entrega->fecha_entrega ? Carbon::parse($entrega->fecha_entrega)->format('d-m-Y') : '-',
                        'hora_entrega'                   => $entrega->hora_entrega ?? '-',
                        'observaciones'                  => $entrega->observaciones ?? '',
                        'estado'                         => $entrega->estado,
                        'paciente_nombre'                => $entrega->paciente ? trim(($entrega->paciente->nombres ?? '-') . ' ' . ($entrega->paciente->apellido_uno ?? '') . ' ' . ($entrega->paciente->apellido_dos ?? '')) : '-',
                        'paciente_rut'                   => $entrega->paciente->rut ?? '-',
                        'paciente_id'                    => $entrega->paciente->id ?? null,
                        'paciente_observaciones_entregas'=> $entrega->paciente->observaciones_entregas ?? '',
                        'profesional_nombre'             => $entrega->profesional ? trim(($entrega->profesional->nombre ?? '-') . ' ' . ($entrega->profesional->apellido_uno ?? '')) : '-',
                        'paciente'                       => $entrega->paciente,
                    ];
                });
            }

            $labels = [1 => 'Entregado', 2 => 'Pendiente', 3 => 'En camino'];

            return response()->json([
                'success' => true,
                'estado' => (int)$estado,
                'estado_label' => $labels[$estado] ?? 'Desconocido',
                'total' => $entregas->count(),
                'entregas' => $entregas
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener entregas: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Devuelve todas las estadísticas del tab Reportes en formato JSON.
     * Se usa desde la función JS actualizar_Reportes() para actualizar sin recargar la página.
     */
    public function obtenerReportesData(Request $request)
    {
        try {
            $total_medicamentos   = EntregaMedicamentoCronico::count();
            $pacientes_activos    = EntregaMedicamentoCronico::distinct('id_paciente')->count('id_paciente');
            $entregas_hoy         = EntregaMedicamentoCronico::whereDate('fecha_entrega', now()->toDateString())->count();
            $total_pendientes     = EntregaMedicamentoCronico::where('estado', 2)->count();
            $total_en_curso       = EntregaMedicamentoCronico::where('estado', 3)->count();
            $total_entregadas     = EntregaMedicamentoCronico::where('estado', 1)->count();

            $tasa_entrega = $total_medicamentos > 0
                ? round(($total_entregadas / $total_medicamentos) * 100, 1)
                : 0;

            // Entregas por mes (últimos 6 meses)
            $entregas_por_mes = EntregaMedicamentoCronico::where('estado', 1)
                ->where('fecha_entrega', '>=', now()->subMonths(6)->startOfMonth())
                ->get()
                ->groupBy(function($entrega) {
                    return Carbon::parse($entrega->fecha_entrega)->format('Y-m');
                })
                ->map(function($grupo, $mes) {
                    return [
                        'mes'           => $mes,
                        'mes_nombre'    => Carbon::createFromFormat('Y-m', $mes)->translatedFormat('F Y'),
                        'total_entregas' => $grupo->count(),
                        'pacientes'     => $grupo->unique('id_paciente')->count(),
                        'medicamentos'  => $grupo->unique('nombre_medicamento')->count(),
                    ];
                })
                ->sortKeys()
                ->values();

            // Top 10 medicamentos más entregados
            $top_medicamentos = EntregaMedicamentoCronico::where('estado', 1)
                ->selectRaw('nombre_medicamento, COUNT(*) as total_entregas, SUM(cantidad_entregada) as total_cantidad')
                ->groupBy('nombre_medicamento')
                ->orderByDesc('total_entregas')
                ->limit(10)
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'pacientes_activos'  => $pacientes_activos,
                    'total_entregadas'   => $total_entregadas,
                    'total_pendientes'   => $total_pendientes,
                    'total_en_curso'     => $total_en_curso,
                    'total_medicamentos' => $total_medicamentos,
                    'entregas_hoy'       => $entregas_hoy,
                    'tasa_entrega'       => $tasa_entrega,
                    'entregas_por_mes'   => $entregas_por_mes,
                    'top_medicamentos'   => $top_medicamentos,
                ],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener reportes: ' . $e->getMessage()
            ], 500);
        }
    }

    public function obtenerDetalleEntrega(Request $request)
    {
        $entrega_id = $request->input('id');

        try {
            $entrega = EntregaMedicamentoCronico::with(['paciente', 'profesional'])->find($entrega_id);

            if (!$entrega) {
                return response()->json([
                    'success' => false,
                    'message' => 'Entrega no encontrada'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'entrega' => [
                    'id' => $entrega->id,
                    'nombre_medicamento' => $entrega->nombre_medicamento ?? '-',
                    'presentacion' => $entrega->presentacion ?? '-',
                    'posologia' => $entrega->posologia ?? '-',
                    'via_administracion' => $entrega->via_administracion ?? '-',
                    'cantidad_entregada' => $entrega->cantidad_entregada ?? '-',
                    'fecha_entrega' => $entrega->fecha_entrega ? Carbon::parse($entrega->fecha_entrega)->format('d-m-Y') : '-',
                    'hora_entrega' => $entrega->hora_entrega ?? '-',
                    'observaciones' => $entrega->observaciones ?? '',
                    'estado' => $entrega->estado,
                    'paciente_nombre' => $entrega->paciente ? (($entrega->paciente->nombres ?? '-') . ' ' . ($entrega->paciente->apellido_uno ?? '') . ' ' . ($entrega->paciente->apellido_dos ?? '')) : '-',
                    'paciente_rut' => $entrega->paciente->rut ?? '-',
                    'profesional_nombre' => $entrega->profesional ? (($entrega->profesional->nombres ?? '-') . ' ' . ($entrega->profesional->apellido_uno ?? '')) : '-',
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener detalle de la entrega: ' . $e->getMessage()
            ], 500);
        }
    }

    public function controlCronicos(){
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

        return view('app.centro_enfermeria_integral.control_cronicos',compact('institucion','tipo_institucion'));

    }

    /**
     * GUARDAR OBSERVACIONES DE ENTREGAS PENDIENTES
     * Guarda observaciones por paciente en las entregas pendientes (ej: por qué están pendientes)
     */
    public function guardarObservacionesPaciente(Request $request)
    {
        try {
            $pacienteId = $request->paciente_id;
            $observaciones = $request->observaciones;

            if (!$pacienteId) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'ID de paciente no proporcionado'
                ], 400);
            }

            // Buscar el paciente
            $paciente = Paciente::find($pacienteId);
            if (!$paciente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Paciente no encontrado'
                ], 404);
            }


            // Guardar observaciones (puedes usar un campo nuevo en la tabla de pacientes o crear una tabla dedicada)
            // Si usas el campo observaciones_entregas en la tabla pacientes:
            $paciente->observaciones_entregas = $observaciones;
            $paciente->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Observaciones guardadas correctamente'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error al guardar observaciones: ' . $e->getMessage());
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar observaciones: ' . $e->getMessage()
            ], 500);
        }
    }

    public function reportes()
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

        $view = view('app.adm_cm.reportes', compact('institucion','tipo_institucion'));
        return $view;
    }
}
