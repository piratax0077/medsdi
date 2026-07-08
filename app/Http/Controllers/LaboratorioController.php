<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminInstServ;
use App\Models\AdminMed;
use App\Models\AdminMantenInst;
use App\Models\AreasCm;
use App\Models\Asistente;
use App\Models\AsistenteTipo;
use App\Models\AsistenteLugarAtencion;
use App\Models\Audifono;
use App\Models\Bancos;
use App\Models\Bono;
use App\Models\Bodega;
use App\Models\CalibracionAudifono;
use App\Models\CampaniaPublicitaria;
use App\Models\Cliente;
use App\Models\ConvenioInstitucion;
use App\Models\DevolucionProducto;
use App\Models\BoxesCm;
use App\Models\CarritoCompra;
use App\Models\CarritoPrestamo;
use App\Models\Compras_detalle;
use App\Models\FichaAtencion;
use App\Models\FichaGinecoObstetrica;
use App\Models\FormasPago;
use App\Models\GastosInstitucionales;
use App\Models\TipoAreasCm;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\ContratoDependiente;
use App\Models\ContratoDependienteProfesional;
use App\Models\ContratoConvenioProfesional;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\EspecialidadesCm;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenMedico;
use App\Models\FichaOtrosProfesionales;
use App\Models\FichaAtencionRayo;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\Laboratorio;
use App\Models\LiquidacionRecibo;
use App\Models\LiquidacionesProfesional;
use App\Models\LugarAtencion;
use App\Models\MensajesDifusion;
use App\Models\MensajesProfesional;
use App\Models\Mensajes;
use App\Models\MisProducto;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\PermisoProfesional;
use App\Models\PedidosDistribucion;
use App\Models\Prevision;
use App\Models\PrestacionesLaboratorio;
use App\Models\ProcedimientosCentro;
use App\Models\Producto;
use App\Models\ProductoSolicitado;
use App\Models\Profesional;
use App\Models\ProfesionalAsistente;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalInstitucionConvenio;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\RendicionCaja;
use App\Models\Remuneraciones;
use App\Models\ReparacionAudifono;
use App\Models\ResponsableBodega;
use App\Models\Roles;
use App\Models\Servicios;
use App\Models\ServiciosInternos;
use App\Models\TerapiaVoz;
use App\Models\TipoConvenio;
use App\Models\TraspasoProducto;
use App\Models\TratamientoVppb;
use App\Models\TipoAdministrador;
use App\Models\TipoProductoConvenios;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoEspecialidad;
use App\Models\TipoProducto;
use App\Models\SubTipoEspecialidad;
use App\Models\Sucursal;
use App\Models\SucursalHorario;
use App\Models\TipoBono;
use App\Models\TipoInstitucion;
use App\Models\User;
use App\Models\LogUsersDevices;
use App\Models\VacacionesProfesional;

use App\Mail\CorreoGenerico;
use App\Mail\NotificacionPrestamoProductos;

// Mail
use Illuminate\Support\Facades\Mail;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// validator
use Illuminate\Support\Facades\Validator;

// pdf
use PDF;

class LaboratorioController extends Controller
{
    /** ADMINISTRACION GENERAL  */
    public function home(){
        return view('app.laboratorio.adm_general.home');
    }
    public function adm_laboratorio(){
        return view('app.laboratorio.adm_general.admin_laboratorio');
    }
	 public function adm_laboratorio_local(){
        return view('app.laboratorio.administrador_local.administracion_admin');
    }
     public function asistentes_laboratorio(){
        return view('app.laboratorio.adm_general.asistentes_laboratorio');
    }

    public function perfil_admin(){
        return view('app.laboratorio.adm_general.perfil_admin');
    }
	public function perfil_laboratorio(){
        return view('app.laboratorio.adm_general.perfil_laboratorio');
    }

    public function sucursales_laboratorio(){
        return view('app.laboratorio.adm_general.sucursales_laboratorio');
    }
    public function admin_laboratorio(){
        return view('app.laboratorio.adm_general.admin_laboratorio');
    }
    public function administracion(){
        return view('app.laboratorio.adm_general.administracion');
    }
    public function administracion_agregar_asistente(){
        return view('app.laboratorio.adm_general.asistentes_laboratorio');
    }
    public function gastos_laboratorio_admin(){
        return view('app.laboratorio.adm_general.gastos_laboratorio_admin');
    }
    public function inventario_laboratorio_admin(){
        return view('app.laboratorio.adm_general.inventario_laboratorio_admin');
    }
    public function lista_exam(){
        return view('app.laboratorio.adm_general.lista_exam');
    }
    public function personal_laboratorio(){
        return view('app.laboratorio.adm_general.personal_laboratorio');
    }
    public function profesionales_laboratorio(){
        return view('app.laboratorio.adm_general.profesionales_laboratorio');
    }
    public function proveedores_laboratorio_admin(){
        return view('app.laboratorio.adm_general.proveedores_laboratorio_admin');
    }
    public function suscripcion_pago_laboratorio(){
        return view('app.laboratorio.adm_general.suscripcion_pago_laboratorio');
    }

    /** ADMINISTRACION LOCAL  */
    public function perfil_administrador_local(){
        return view('app.laboratorio.administrador_local.perfil_admin');
    }
    public function adm_local_laboratorio(){
        return view('app.laboratorio.administrador_local.administracion_admin');
    }
    public function asistente_laboratorio_Local(){
        return view('app.laboratorio.administrador_local.asistentes_laboratorio');
    }
    public function profesional_laboratorio_local(){
        return view('app.laboratorio.administrador_local.profesionales_laboratorio');
    }
    public function inventario_lab_local(){
        return view('app.laboratorio.administrador_local.inventario_laboratorio_admin');
    }
    public function examenes_agregar_local(){
        return view('app.laboratorio.administrador_local.lista_exam');
    }
    public function proveedores_laboratorio_local(){
        return view('app.laboratorio.administrador_local.proveedores_laboratorio_admin');
    }
    public function sucursales_laboratorio_local(){
        return view('app.laboratorio.administrador_local.sucursales_laboratorio');
    }
    public function gastos_laboratorio_local(){
        return view('app.laboratorio.administrador_local.gastos_laboratorio_admin');

    }
    public function sub_administracion_laboratorio(){
        return view('app.laboratorio.administrador_local.subadmin_laboratorio');
    }

    public function suscripcion_laboratorio_local(){
        return view('app.laboratorio.administrador_local.suscripcion_pago_laboratorio');
    }

    /** ASISTENTE LABORATORIO  */
    public function perfil_asistente(){
        return view('app.laboratorio.lab_asistente.perfil');
    }

    public function agenda_laboratorio(Request $request)
    {

        $array_id_lugare = array();
        $sucursales = collect([]);
        $procedimientos = '';

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$profesional) {
            // Si no existe profesional, buscar en Laboratorio
            $laboratorio = Laboratorio::where('id_usuario', Auth::user()->id)->first();
            if($laboratorio) {
                $lugar_atencion_principal = $laboratorio->id_lugar_atencion;
                $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $lugar_atencion_principal)->get();
                $institucion = collect([
                    (object)[
                        'id' => $laboratorio->id,
                        'id_lugar_atencion' => $laboratorio->id_lugar_atencion,
                        'nombre' => $laboratorio->nombre ?? 'Laboratorio',
                        'sucursales' => 0
                    ]
                ]);
            } else {
                // Fallback: buscar lugares de atención asociados al usuario en profesionales_lugares_atencion
                $lugares_usuario = ProfesionalesLugaresAtencion::where('id_usuario', Auth::user()->id)
                    ->pluck('id_lugar_atencion')
                    ->toArray();
                if (!empty($lugares_usuario)) {
                    // Buscar si alguno de estos lugares es un laboratorio
                    $laboratorio_lugar = Sucursal::whereIn('id', $lugares_usuario)
                        ->where('tipo_sucursal', 3) // 3 = laboratorio (ajustar si el valor es diferente)
                        ->first();
                    if ($laboratorio_lugar) {
                        $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $laboratorio_lugar->id_lugar_atencion)->get();
                        $institucion = collect([
                            (object)[
                                'id' => $laboratorio_lugar->id,
                                'id_lugar_atencion' => $laboratorio_lugar->id_lugar_atencion,
                                'nombre' => $laboratorio_lugar->nombre ?? 'Laboratorio',
                                'sucursales' => 0
                            ]
                        ]);
                    } else {
                        return response()->json([
                            'success' => false,
                            'message' => 'No se encontraron lugares de atención',
                            'error' => 'No se encontraron instituciones, sucursales ni laboratorio asignado'
                        ], 404);
                    }
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'No se encontraron lugares de atención',
                        'error' => 'No se encontraron instituciones, sucursales ni laboratorio asignado'
                    ], 404);
                }
            }
        } else {
            $array_id_lugare = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)
                ->pluck('id_lugar_atencion')
                ->toArray();



            $array_institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare)
                ->pluck('id')
                ->toArray();

            $institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare)
                ->get();



            if($institucion && $institucion->count() > 0)
            {
                // Sucursales de instituciones
                $sucursales = Sucursal::with('Horario')
                    ->whereIn('id_institucion', $array_institucion)
                    ->where('estado',1)
                    ->get();

                foreach ($sucursales as $key => $value) {
                    $inst_tem = Instituciones::find($value->id_institucion);
                    $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $inst_tem->id_lugar_atencion)->get();
                    $sucursales[$key]->procedimiento = $procedimientos;
                }

                // Sucursales de laboratorio por lugares de atención del profesional
                $sucursales_laboratorio = Sucursal::with('Horario')
                    ->whereIn('id_lugar_atencion', $array_id_lugare)
                    ->where('tipo_sucursal', 3) // 3 = laboratorio (ajustar si corresponde)
                    ->where('estado',1)
                    ->get();

                foreach ($sucursales_laboratorio as $key => $value) {
                    $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $value->id_lugar_atencion)->get();
                    $sucursales_laboratorio[$key]->procedimiento = $procedimientos;
                }

                // Unir ambas colecciones, evitando duplicados por id
                $sucursales = $sucursales->merge($sucursales_laboratorio)->unique('id')->values();
            }
            else
            {
                $array_id_lug = Sucursal::whereIn('id_lugar_atencion', $array_id_lugare)
                    ->pluck('id_institucion')
                    ->toArray();



                $array_institucion = Instituciones::whereIn('id', $array_id_lug)->where('id_tipo_institucion', 3)
                    ->pluck('id')
                    ->toArray();
                $institucion = Instituciones::whereIn('id', $array_id_lug)->where('id_tipo_institucion', 3)->get();

                $sucursales = Sucursal::with('Horario')
                    ->whereIn('id_institucion', $array_institucion)
                    ->where('estado',1)
                    ->get();

                foreach ($sucursales as $key => $value) {
                    $inst_tem = Instituciones::find($value->id_institucion);
                    $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $inst_tem->id_lugar_atencion)->get();
                    $sucursales[$key]->procedimiento = $procedimientos;
                }
            }

            // Si no hay institución/sucursal, buscar laboratorios asociados a los lugares de atención del profesional
            // if($institucion->count() === 0) {
                // Buscar laboratorios cuyo id_lugar_atencion esté en el array de lugares de atención
                $laboratorios = Laboratorio::whereIn('id_lugar_atencion', $array_id_lugare)->get();

                if($laboratorios && $laboratorios->count() > 0) {
                    $institucion = collect();
                    foreach ($laboratorios as $lab) {
                        $institucion->push((object)[
                            'id' => $lab->id,
                            'id_lugar_atencion' => $lab->id_lugar_atencion,
                            'nombre' => $lab->nombre ?? 'Laboratorio',
                            'sucursales' => 0
                        ]);
                    }
                    // Opcional: podrías cargar procedimientos del primer laboratorio o de todos
                    $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $laboratorios->first()->id_lugar_atencion)->get();
                } else {
                    // Fallback anterior: buscar por usuario
                    $laboratorio = Laboratorio::where('id_lugar_atencion', $request->input('lugares_atencion'))->first();
                    if($laboratorio) {
                        $lugar_atencion_principal = $laboratorio->id_lugar_atencion;
                        $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $lugar_atencion_principal)->get();
                        $institucion = collect([
                            (object)[
                                'id' => $laboratorio->id,
                                'id_lugar_atencion' => $laboratorio->id_lugar_atencion,
                                'nombre' => $laboratorio->nombre ?? 'Laboratorio',
                                'sucursales' => 0
                            ]
                        ]);
                        $sucursales = collect();
                        $sucursal = new \stdClass();
                        $sucursal->id = $laboratorio->id;
                        $sucursal->id_lugar_atencion = $laboratorio->id_lugar_atencion;
                        $sucursal->nombre = $laboratorio->nombre ?? 'Laboratorio';
                        $sucursal->procedimiento = $procedimientos;
                        $sucursales->push($sucursal);
                    } else {
                        return response()->json([
                            'success' => false,
                            'message' => 'No se encontraron lugares de atención',
                            'error' => 'No se encontraron instituciones, sucursales ni laboratorio asignado'
                        ], 404);
                    }
                }
            // }
        }

        $prevision = Prevision::all();
        $tipo_bonos = TipoBono::where('estado', 1)->get();
        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
        $regiones = Region::orderBy('nombre')->get();

        if($sucursales->count() == 0){
            $sucursales = collect();
            $lugares_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->pluck('id_lugar_atencion')->toArray();
            $laboratorio = Laboratorio::whereIn('id_lugar_atencion', $lugares_atencion)->first();
            if($laboratorio) {
                $sucursal = new \stdClass();
                $sucursal->id = $laboratorio->id;
                $sucursal->id_lugar_atencion = $laboratorio->id_lugar_atencion;
                $sucursal->nombre = $laboratorio->nombre ?? 'Laboratorio';
                $sucursal->procedimiento = ProcedimientosCentro::where('id_lugar_atencion', $laboratorio->id_lugar_atencion)->get();
                $sucursales->push($sucursal);
            }
        }

        $tipo_agendas = [];
        if(isset($laboratorio) && $laboratorio->id_lugar_atencion) {
            $tipo_agendas = ProfesionalHorario::select('tipo_agenda')
                                            ->whereIn('id_lugar_atencion', [$laboratorio->id_lugar_atencion])
                                            ->where('id_profesional', $profesional->id)
                                            ->groupBy('tipo_agenda')
                                            ->pluck('tipo_agenda')
                                            ->toArray();
        }

        $arrayTipoAgenda = array('', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes', 'Laboratorio');
        $listaTipoAgendaProf = array();
        foreach ($tipo_agendas as $keyTA => $valueTA) {
            array_push($listaTipoAgendaProf, array('id' => $valueTA, 'texto' => $arrayTipoAgenda[$valueTA]));
        }

        $arrayTipoAgenda = array('', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes', 'Laboratorio');
        $listaTipoAgendaProf = array();
        foreach ($tipo_agendas as $keyTA => $valueTA) {
            array_push($listaTipoAgendaProf, array('id' => $valueTA, 'texto' => $arrayTipoAgenda[$valueTA]));
        }

        if(isset($laboratorio) && $laboratorio->id_lugar_atencion) {
            $lugar_atencion = LugarAtencion::find($laboratorio->id_lugar_atencion);
        } else {
            $lugar_atencion = null;
        }

        return view('app.laboratorio.agenda_laboratorio')->with([
            'profesional' => $profesional,
            'institucion' => $institucion,
            'institucion_agenda' => $institucion, // Para diferenciarlo en el menu de asistente
            'sucursales' => $sucursales,
            'procedimientos' => $procedimientos,
            'regiones' => $regiones,
            'prevision' => $prevision,
            'tipo_bonos' => $tipo_bonos,
            'reg_confirmacion_hora' => $reg_confirmacion_hora,
            'listaTipoAgendaProf' => $listaTipoAgendaProf,
            'tipo_agendas' => $tipo_agendas,
            'lugar_atencion' => $lugar_atencion ? $lugar_atencion->id : null,
        ]);
    }
    public function cotizar_laboratorio(){
        return view('app.laboratorio.lab_asistente.cotizar_laboratorio');
    }
    public function orden_laboratorio(){
        return view('app.laboratorio.lab_asistente.orden_laboratorio');
    }
    public function pacientes_laboratorio(){
        return view('app.laboratorio.lab_asistente.pacientes_laboratorio');
    }
    public function resultados_examenes_laboratorio(){
        return view('app.laboratorio.lab_asistente.resultados_examenes_laboratorio');
    }
    public function resultados_lab(){
        return view('app.laboratorio.lab_asistente.resultados_laboratorio');
    }
	public function escritorio_asistente_laboratorio(){
        return view('app.laboratorio.lab_asistente.escritorio_asistente_laboratorio');
    }


    /** ASISTENTE LABORATORIO SUBIR EXAMEN */
    public function perfil_asistente_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.perfil');
    }

    public function agenda_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.agenda_laboratorio');
    }

    public function cotizar_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.cotizar_laboratorio');
    }

    public function orden_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.orden_laboratorio');
    }

    public function pacientes_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.pacientes_laboratorio');
    }

    public function resultados_examenes_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.resultados_examenes_laboratorio');
    }

    public function cargar_resultados_examenes_laboratorio_subir_examan()
    {
        $tipo_examen = ExamenMedico::where('cod_parent', 0)->get();

        return view('app.laboratorio.lab_asistente_subir_examen.cargar_resultados_examenes_laboratorio')->with([
            'tipo_examen' => $tipo_examen,
        ]);
    }

    public function registrar_resultados_examenes_laboratorio_subir_examan(Request $request)
    {
        // return ResultadoExamenController::registrar($request->id_lugar_atencion,
        // $request->id_institucion,
        // $request->tipo_examen,
        // $request->id_paciente,
        // $request->rut,
        // $request->nombre,
        // $request->apellido_paterno,
        // $request->apellido_materno,
        // $request->email,
        // $request->observacion,
        // '',
        // $request->lista_examen,
        //  '',
        // '',
        // '');
        return ResultadoExamenController::registrar($request->id_lugar_atencion,
                                        $request->id_institucion,
                                        $request->tipo_examen,
                                        $request->nombre_examen,
                                        $request->id_paciente,
                                        $request->rut,
                                        $request->nombre,
                                        $request->apellido_paterno,
                                        $request->apellido_materno,
                                        $request->email,
                                        $request->observacion,
                                        $request->fecha_regsitro,
                                        $request->lista_archivo,
                                        $request->id_profesional,
                                        $request->profesional_rut,
                                        $request->profesional_nombre);
    }

    public function resultados_lab_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.resultados_laboratorio');
    }

	public function escritorio_asistente_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.escritorio_asistente_laboratorio');
    }


    /** PROFESIONALES LABORATORIO  */
    public function perfil_profesional(){
        return view('app.laboratorio.lab_profesional.perfil');
    }

    public function escritorio_profesional_laboratorio(){
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
            }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */


        return view('app.laboratorio.lab_profesional.escritorio_profesional_laboratorio',[
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
        ]);
    }
    public function gastos_laboratorio(){
        return view('app.laboratorio.lab_profesional.gastos_laboratorio');
    }
    public function inventario_laboratorio(){
        return view('app.laboratorio.lab_profesional.inventario_laboratorio');
    }
    public function pacientes_laboratoriop(){
        return view('app.laboratorio.lab_profesional.pacientes_laboratorio');
    }
    public function procesos_laboratorio(){
        return view('app.laboratorio.lab_profesional.procesos_laboratorio');
    }
    public function proveedores_laboratorio(){
        return view('app.laboratorio.lab_profesional.proveedores_laboratorio');
    }
    public function recepcion_muestras(){
        return view('app.laboratorio.lab_profesional.recepcion_muestras');
    }
    public function resultados(){
        return view('app.laboratorio.lab_profesional.resultados');
    }
    public function solicitud_exam_laboratorio_profesional(){
        return view('app.laboratorio.lab_profesional.solicitud_exam_laboratorio_profesional');
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
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($resultado->last_id, $profesionales->id, $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box,'','', $request->observacion);
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

    public function estadisticas_finanzas($id_institucion = null){

        if($id_institucion){
            $institucion = Instituciones::find($id_institucion);

            if(!$institucion){
                return redirect()->route('laboratorio.escritorio_adm_comercial')->with('error','Institución no encontrada');
            }
        }
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
        return view('app.laboratorio.adm_general.estadisticas_finanzas', compact('institucion', 'profesional', 'profesionales', 'sucursales'));
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
        if(empty($request->sub_tipo_especialidad))
        {
            $error['sub_tipo_especialidad'] = 'campo requerido';
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

            /** REGISTRO INVITACION */
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
                    /** ACTUALIZACION DE PROFESIONAL INSTITUCION CONVENIO */
                    $result_prof_inst_convenio = ProfesionalInstitucionConvenioController::modificar($resul_buscar_conv->id, $result_invitacion->last_id, '', $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box, '', '', $resul_buscar_conv->estado, $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_convenio;
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
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($result_invitacion->last_id, '', $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box,'','', $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv;
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

    public function buscar_profesional($id_profesional)
    {
        $datos = array();
        $profesional = Profesional::where('id', $id_profesional)->first();
        if($profesional)
        {
            $direccion_text = 'No Informada';
            if($profesional->id_direccion != '' || $profesional->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $profesional->id_direccion)->first();
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
                if($registro->UsuarioAdministrador()->first())
                    $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                else
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

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
                                            $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                                            if($registro){
                                                /** LABORATORIO */
                                                $institucion = $registro;
                                                $tipo_institucion = 'laboratorio';
                                            }
                                            else
                                                 return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                                    if($registro){
                                        /** LABORATORIO */
                                        $institucion = $registro;
                                        $tipo_institucion = 'laboratorio';
                                    }
                                    else
                                        return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                    // return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                        if($registro){
                            /** LABORATORIO */
                            $institucion = $registro;
                            $tipo_institucion = 'laboratorio';
                        }
                        else
                            return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            /** CARGA DE ASISTENTES */

            $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();

            $filtro = array();
            $filtro[] = array('id_profesional', $profesional->id);
            // $filtro[] = array('estado', 2);
            $filtro[] = array('id_lugar_atencion', $LugarAtencion->id);

            $profesional->contrato = ContratoDependienteProfesional::where($filtro)->first();

            $profesional->direccion = Direccion::with('Ciudad')->find($profesional->id_direccion);


            if($profesional->contrato !== null){
                $profesional->especialidad = Especialidad::where('id',$profesional['contrato']['id_especialidad'])->first();
                $profesional->tipo_especialidad = TipoEspecialidad::where('id',$profesional['contrato']['id_tipo_especialidad'])->first();
                $profesional->sub_tipo_especialidad = SubTipoEspecialidad::where('id',$profesional['contrato']['id_subtipo_especialidad'])->first();
            }else{
                $profesional->contrato = null;
            }

            $liquidacion = LiquidacionRecibo::where('id_seccion',$profesional->id)->get();

        $liqui_principal = 0;

        if($liquidacion)
        foreach ($liquidacion as $key => $value)
        {
            $id_banco = decrypt($value->casa);
            $banco = Bancos::select('id', 'nombre')->where('id',$id_banco)->first();
            $liquidacion[$key]->banco = $banco;
            if($value->serie!='')
                $liquidacion[$key]->serie  = decrypt($value->serie);
            if($value->autor!='')
                $liquidacion[$key]->autor = decrypt($value->autor);
            if($value->casa!='')
                $liquidacion[$key]->casa = decrypt($value->casa);
            if($value->numero_control!='')
                $liquidacion[$key]->numero_control = decrypt($value->numero_control);
            if($value->email!='')
                $liquidacion[$key]->email = decrypt($value->email);
            if($value->otro!='')
                $liquidacion[$key]->otro = decrypt($value->otro);
            if($liqui_principal == 0 && $value->principal == 1)
                $liqui_principal = 1;
        }

            $convenios = ProfesionalConvenio::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$LugarAtencion->id)->get();

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $profesional;
            $datos['direccion'] = $direccion_text;
            $datos['convenios'] = $convenios;
            $datos['cuentas'] = $liquidacion;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;
    }

    public function agregar_laboratorio(Request $request){
        try {

            // verificar si existe por el rut
            $laboratorio = Sucursal::where('rut', $request->rut_laboratorio)->first();
            if(!$laboratorio){
                $laboratorio = new Sucursal();
            }

            $laboratorio->nombre = $request->nombre_laboratorio;
            $laboratorio->rut = $request->rut_laboratorio;
            $laboratorio->tipo_sucursal = $request->tipo_laboratorio;
            $laboratorio->email = $request->email_laboratorio;
            $laboratorio->telefono = $request->telefono_laboratorio;

            $institucion = Instituciones::find($request->id_institucion);
            $laboratorio->id_institucion = $institucion->id;
            $laboratorio->id_lugar_atencion = $institucion->id_lugar_atencion;
            $laboratorio->ubicacion = $request->ubicacion;

            /* DIRECCION */
            $existe_direccion = Direccion::where('direccion',$request->direccion_laboratorio)->where('numero_dir',$request->numero_laboratorio)->where('id_ciudad',$request->ciudad_laboratorio)->first();
            if($existe_direccion){
                $nueva_direccion = $existe_direccion;
                $laboratorio->id_direccion = $existe_direccion->id;
            }else{
                $nueva_direccion = new Direccion();
                $nueva_direccion->direccion = $request->direccion_laboratorio;
                $nueva_direccion->numero_dir = $request->numero_laboratorio;
                $nueva_direccion->id_ciudad = $request->ciudad_laboratorio;
                if($request->filled('lat_laboratorio')) $nueva_direccion->latitud  = $request->lat_laboratorio;
                if($request->filled('lng_laboratorio')) $nueva_direccion->longitud = $request->lng_laboratorio;
                $nueva_direccion->save();

                $laboratorio->id_direccion = $nueva_direccion->id;
            }
            $laboratorio->estado = 1;
            if($laboratorio->save()){

                // Crear o reutilizar usuario para la sucursal con rol AsistenteLaboratorio
                $lab_user = null;
                if(empty($laboratorio->id_usuario)){
                    $lab_user = User::where('email', $request->email_laboratorio)->first();
                    if(!$lab_user){
                        $lab_user = new User();
                        $lab_user->email = $request->email_laboratorio;
                        $pass_temp = rand(11111, 99999);
                        $lab_user->password = Hash::make($pass_temp);
                        $lab_user->name = $request->nombre_laboratorio;
                        if($lab_user->save()){
                            $lab_user->assignRole('AsistenteLaboratorio');
                            $laboratorio->id_usuario = $lab_user->id;
                            $laboratorio->save();
                        }
                    } else {
                        if(!$lab_user->hasRole('AsistenteLaboratorio')){
                            $lab_user->assignRole('AsistenteLaboratorio');
                        }
                        $laboratorio->id_usuario = $lab_user->id;
                        $laboratorio->save();
                    }
                }

                // Crear o actualizar registro en tabla laboratorios
                $reg_laboratorio = Laboratorio::where('rut', $request->rut_laboratorio)->first();
                if(!$reg_laboratorio){
                    $reg_laboratorio = new Laboratorio();
                }
                $reg_laboratorio->nombre     = $request->nombre_laboratorio;
                $reg_laboratorio->rut        = $request->rut_laboratorio;
                $reg_laboratorio->email      = $request->email_laboratorio;
                $reg_laboratorio->telefono   = $request->telefono_laboratorio;
                $reg_laboratorio->id_direccion = $laboratorio->id_direccion;
                $reg_laboratorio->id_sucursal  = $laboratorio->id;
                if($lab_user){
                    $reg_laboratorio->id_usuario = $lab_user->id;
                } elseif(!empty($laboratorio->id_usuario)){
                    $reg_laboratorio->id_usuario = $laboratorio->id_usuario;
                }
                $reg_laboratorio->save();

                $laboratorios = $this->dame_laboratorios($institucion->id_lugar_atencion);
                $v = view('fragm.laboratorios',[
                    'laboratorios' => $laboratorios
                ])->render();
                return ['estado' => 1, 'msj' => 'Laboratorio agregado correctamente', 'v' => $v];


            }else{
                return ['estado' => 0, 'msj' => 'Error al agregar laboratorio'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dame_laboratorio($id){
        try {
            $laboratorio = Sucursal::select('sucursal.*','tipos_laboratorio.nombre as tipo_laboratorio','direcciones.direccion','direcciones.numero_dir','direcciones.id_ciudad')
                ->leftjoin('tipos_laboratorio','sucursal.tipo_sucursal','=','tipos_laboratorio.id')
                ->join('direcciones','sucursal.id_direccion','=','direcciones.id')
                ->where('sucursal.id',$id)
                ->first();

                $direccion = Direccion::where('id',$laboratorio->id_direccion)->first();
                $laboratorio->direccion = $direccion->direccion;
                $laboratorio->numero_dir = $direccion->numero_dir;
                $laboratorio->id_region = $direccion->ciudad->id_region;

            // buscar la ciudad de cada laboratorio por la direccion
            $ciudad = Ciudad::where('id',$laboratorio->id_ciudad)->first();
            $laboratorio->ciudad = $ciudad->nombre;
            return $laboratorio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function editar_laboratorio(Request $request){
        try {

            $laboratorio = Sucursal::find($request->id_laboratorio);
            $laboratorio->nombre = $request->nombre_laboratorio;
            $laboratorio->rut = $request->rut_laboratorio;
            $laboratorio->email = $request->email_laboratorio;
            $laboratorio->telefono = $request->telefono_laboratorio;
            $laboratorio->tipo_sucursal = $request->tipo_laboratorio;
            $laboratorio->ubicacion = $request->ubicacion;
            $direccion = Direccion::where('id',$laboratorio->id_direccion)->first();
            $direccion->direccion = $request->direccion_laboratorio;
            $direccion->numero_dir = $request->numero_laboratorio;
            $direccion->id_ciudad = $request->ciudad_laboratorio;
            if($request->filled('lat_laboratorio')) $direccion->latitud  = $request->lat_laboratorio;
            if($request->filled('lng_laboratorio')) $direccion->longitud = $request->lng_laboratorio;
            $direccion->save();
            $laboratorio->id_direccion = $direccion->id;
            if($laboratorio->save()){
                $laboratorios = $this->dame_laboratorios($laboratorio->id_lugar_atencion);
                $v = view('fragm.laboratorios',[
                    'laboratorios' => $laboratorios
                ])->render();
                return ['estado' => 1, 'msj' => 'Laboratorio editado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'msj' => 'Error al editar laboratorio'];
            }
        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function eliminar_laboratorio(Request $request){
        try {
            $laboratorio = Sucursal::find($request->id);
            $id_user_lab = $laboratorio->id_usuario;
            $institucion = Instituciones::find($laboratorio->id_institucion);
            if($laboratorio->delete()){
                $laboratorios = $this->dame_laboratorios($institucion->id_lugar_atencion);
                $v = view('fragm.laboratorios',[
                    'laboratorios' => $laboratorios
                ])->render();
                // eliminamos el usuario del laboratorio
                // $user_lab = User::find($id_user_lab);
                // $user_lab->delete();
                return ['estado' => 1, 'msj' => 'Laboratorio eliminado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'msj' => 'Error al eliminar laboratorio'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sincronizar_usuarios_laboratorios(Request $request)
    {
        try {
            $institucion = Instituciones::find($request->id_institucion);
            if (!$institucion) {
                return ['estado' => 0, 'msj' => 'Institución no encontrada'];
            }

            $sucursales = Sucursal::where('id_lugar_atencion', $institucion->id_lugar_atencion)->get();

            $creados   = 0;
            $omitidos  = 0;
            $resultado = [];

            foreach ($sucursales as $sucursal) {

                // Buscar registro en laboratorios por rut
                $reg_lab = Laboratorio::where('rut', $sucursal->rut)->first();

                // Si ya tiene usuario, no hace nada
                if ($reg_lab && !empty($reg_lab->id_usuario)) {
                    $omitidos++;
                    continue;
                }

                // Buscar o crear usuario por email
                $lab_user = User::where('email', $sucursal->email)->first();
                if (!$lab_user) {
                    if (empty($sucursal->email)) {
                        $resultado[] = ['sucursal' => $sucursal->nombre, 'msj' => 'Sin email, omitido'];
                        $omitidos++;
                        continue;
                    }
                    $lab_user = new User();
                    $lab_user->email    = $sucursal->email;
                    $pass_temp          = rand(11111, 99999);
                    $lab_user->password = Hash::make($pass_temp);
                    $lab_user->name     = $sucursal->nombre;
                    $lab_user->save();
                    $resultado[] = ['sucursal' => $sucursal->nombre, 'msj' => 'Usuario creado', 'email' => $sucursal->email, 'pass' => $pass_temp];
                } else {
                    $resultado[] = ['sucursal' => $sucursal->nombre, 'msj' => 'Usuario existente vinculado', 'email' => $sucursal->email];
                }

                if (!$lab_user->hasRole('AsistenteLaboratorio')) {
                    $lab_user->assignRole('AsistenteLaboratorio');
                }

                // Crear o actualizar registro en laboratorios
                if (!$reg_lab) {
                    $reg_lab = new Laboratorio();
                    $reg_lab->nombre      = $sucursal->nombre;
                    $reg_lab->rut         = $sucursal->rut;
                    $reg_lab->email       = $sucursal->email;
                    $reg_lab->telefono    = $sucursal->telefono;
                    $reg_lab->id_direccion = $sucursal->id_direccion;
                }
                $reg_lab->id_usuario = $lab_user->id;
                $reg_lab->save();

                $creados++;
            }

            return [
                'estado'   => 1,
                'msj'      => "Proceso completado. Creados/vinculados: {$creados}, Omitidos: {$omitidos}",
                'detalle'  => $resultado,
            ];

        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
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


    public function buscar_paciente_rut(Request $request)
    {

        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

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

        $registro = Paciente::with(['FichaAtencionOtrosProfesionales' => function($query) use ($id_lugar_atencion){
                                    $query->select('id','id_lugar_atencion','id_paciente')->where('id_lugar_atencion',$id_lugar_atencion);
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
                                /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                                ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
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

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_asistente[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */

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

        return view('app.laboratorio.personal')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_asistente' => $lista_asistente,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'lista_tipo_asistente' => $lista_tipo_asistente,
            'adm_medico' => $adm_medico,
        ]);;
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
                    $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                    $responsable = AdminInstServ::where('id_admin',3)->first();

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
        $cargos = TipoAdministrador::orderBy('nombres', 'ASC')->get();

        $director_cm = null;

        if($institucion->id_director_medico !== '' && $institucion->id_director_medico != null){
            $director_cm = Profesional::where('id_usuario',$institucion->id_director_medico)->first();
        }

        $subdirector_cm = null;
        if($institucion->id_subdirector_medico !== '' && $institucion->id_subdirector_medico != null){
            $subdirector_cm = Profesional::where('id_usuario',$institucion->id_subdirector_medico)->first();
        }

        $director_gestion_cuidado = null;
        if($institucion->id_director_gestion_cuidado !== '' && $institucion->id_director_gestion_cuidado != null){
            $director_gestion_cuidado = Profesional::where('id_usuario',$institucion->id_director_gestion_cuidado)->first();
        }

        $director_tecnico = null;
        if($institucion->id_director_tecnico !== '' && $institucion->id_director_tecnico != null){
           $director_tecnico = Profesional::where('id_usuario',$institucion->id_director_tecnico)->first();
        }


        $filtro_prodce  = array();
        $filtro_prodce[]  = array('id_lugar_atencion', $institucion->id_lugar_atencion);
        $filtro_prodce[]  = array('estado', 1);
        $procedimientos = ProcedimientosCentro::where($filtro_prodce)->get();

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

        $tipos_producto = TipoProducto::all();

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


        // $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        // $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->first();

        $institucion = Instituciones::where('id_lugar_atencion',$registro->id_lugar_atencion)->first();


        return view('app.laboratorio.configuracion')->with([
            'tipo_institucion' => $tipo_institucion,
            'institucion' => $institucion,
            'responsable' => $responsable,
            'director_cm' => $director_cm ? $director_cm : null,
            'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
            'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
            'director_tecnico' => $director_tecnico ? $director_tecnico : null,
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
            'procedimientos' => $procedimientos,
            'sucursales' => $sucursales,
            'tipos_productos' => $tipos_producto,
            'bodegas' => $bodegas,

        ]);
    }

    public function editarDatosPerfilResponsableMedico(Request $request)
    {
        try {

            $datos = array();

            $profesional = Profesional::where('rut', $request->rut)->first();
            $responsable = AdminInstServ::where('rut',$request->rut)->first();



            if($profesional && $responsable)
            {
                $profesional->nombre = $request->nombres;
                $profesional->apellido_uno = $request->apellido_uno;
                $profesional->apellido_dos = $request->apellido_dos;
                $profesional->fecha_nacimiento = $request->fecha_nac;
                $profesional->save();

                $responsable->nombres = $request->nombres;
                $responsable->apellido_uno = $request->apellido_uno;
                $responsable->apellido_dos = $request->apellido_dos;
                $responsable->fecha_nac = $request->fecha_nac;
                $responsable->save();

                $datos['estado'] = 1;
                $datos['msj'] = 'Datos actualizados correctamente';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al actualizar los datos';
            }

            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

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

    public function prestaciones_dentales(){
        $prestaciones = PrestacionesLaboratorio::all();
        $profesional = Profesional::where('id', Auth::user()->id)->first();
        return view('app.laboratorio.prestaciones_dentales',[
            'prestaciones' => $prestaciones,
            'profesional' => $profesional
        ]);
    }

    public function prestaciones(){
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
                    $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                    $responsable = AdminInstServ::where('id_admin',3)->first();

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

        $filtro_prodce  = array();
        $filtro_prodce[]  = array('id_lugar_atencion', $institucion->id_lugar_atencion);
        $filtro_prodce[]  = array('estado', 1);
        $procedimientos = ProcedimientosCentro::where($filtro_prodce)->get();
        if($institucion->id_tipo_institucion && $institucion->id_tipo_institucion == 1){
            $profesionales = Instituciones::find($institucion->id)->LugarAtencion()->first()->Profesionales()->get();
        }else{
            $profesionales = Laboratorio::find($institucion->id)->LugarAtencion()->first()->Profesionales()->get();
        }


        return view('app.laboratorio.prestaciones',[
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'prestaciones' => $procedimientos,
            'profesionales' => $profesionales
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

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();


        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {

            $sucursales = Sucursal::where('id_institucion', $institucion->id)->get();
            $LugaresAtencion = array();
            foreach ($sucursales as $key_suc => $value_suc){
                $lugar_atencion_suc = LugarAtencion::where('id', $value_suc->id_lugar_atencion)->first();
                if($lugar_atencion_suc){
                    array_push($LugaresAtencion, $lugar_atencion_suc);
                }
            }
            array_push($LugaresAtencion, $LugarAtencion);

            $profesionales = array();
            foreach ($LugaresAtencion as $key_lug => $value_lug){
                $profesionales_lug = $value_lug->Profesionales()
                    ->withPivot('estado')
                    ->get();
                if($profesionales_lug){
                    foreach ($profesionales_lug as $key_prof_lug => $value_prof_lug){
                        array_push($profesionales, $value_prof_lug);
                    }
                }
            }

            // Eliminar duplicados por id
            $profesionales = collect($profesionales)->unique('id')->values()->all();

            if($profesionales)
            {

                foreach ($profesionales as $key_prof => $value_prof)
                {
                    // Verificar si tiene vacaciones vigentes hoy
                    $hoy = Carbon::now()->format('Y-m-d');
                    $vacacion_vigente = VacacionesProfesional::where('id_profesional', $value_prof->id)
                        ->where('estado', 1)
                        ->where('fecha_inicio', '<=', $hoy)
                        ->where('fecha_fin', '>=', $hoy)
                        ->first();

                    $value_prof->tiene_vacacion_vigente = $vacacion_vigente ? true : false;

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

                    if($usuario) {
                        $roles = $usuario->roles()->get();

                        $array_roles = array();
                        foreach ($roles as $key_2 => $value_2) {
                            array_push($array_roles, $value_2->name);
                        }

                        if(!empty($array_roles))
                            $lista_asistente[$key]->roles = implode(",",$array_roles);
                        else
                            $lista_asistente[$key]->roles = '';
                    } else {
                        $lista_asistente[$key]->roles = '';
                    }

                    /** tipo asistente */
                    $lista_asistente[$key]->asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_asistente[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }

        $sucursales = Sucursal::where('id_institucion', $institucion->id)
                        ->with('Direccion')
                        ->get();

        $especialidades = Especialidad::all();
        $bancos = Bancos::where('estado',1)->get();

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

        $laboratorio = Laboratorio::where('id_usuario',Auth::user()->id)->first();

        if($laboratorio)
        {
            $institucion->id_tipo_laboratorio = $laboratorio->id_tipo_laboratorio;
        }

        return view('app.laboratorio.profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'regiones' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'lista_administrativo' => $lista_administrativo,
            'lista_asistente' => $lista_asistente,
            'lista_mantencion' => $lista_mantencion,
            'sucursales' => $sucursales,
            'especialidades' => $especialidades,
            'bancos' => $bancos,
        ]);
    }

    public function administrador_tecnico_home()
    {
        return view('app.laboratorio.administrador_tecnico.home');
    }

    public function radiologia(){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $array_id_lugare_prof = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)
                                                                                    ->pluck('id_lugar_atencion')
                                                                                    ->toArray();

        $array_institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                                        ->where('id_tipo_institucion', 3)
                                        ->pluck('id')
                                        ->toArray();

        if($array_institucion)
        {
            $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                ->pluck('id_lugar_atencion')
                                ->toArray();
        }
        else
        {
            $array_id_lug = Sucursal::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                            ->pluck('id_institucion')
                            ->toArray();

            $array_institucion = Instituciones::whereIn($array_id_lug)->where('id_tipo_institucion', 3)
                                                ->pluck('id')
                                                ->toArray();

            $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                                ->pluck('id_lugar_atencion')
                                                ->toArray();
        }

        $horas_medicas = HoraMedica::select('horas_medicas.id','horas_medicas.fecha_consulta','horas_medicas.hora_inicio',
                                            'horas_medicas.hora_termino', 'horas_medicas.tipo_hora_medica', 'horas_medicas.alias_examen',
                                            'horas_medicas.id_box', 'horas_medicas.id_procedimiento', 'horas_medicas.id_jitsi_video_consulta',
                                            'horas_medicas.descripcion','horas_medicas.comentarios_confirmacion','horas_medicas.fecha_confirmacion',
                                            'horas_medicas.comentarios_cancelacion','horas_medicas.fecha_cancelacion','horas_medicas.fecha_realizacion_consulta',
                                            'horas_medicas.id_ficha_atencion','horas_medicas.id_ficha_otros_prof','horas_medicas.id_profesional',
                                            'horas_medicas.id_lugar_atencion','horas_medicas.id_asistente','horas_medicas.id_paciente',
                                            'horas_medicas.acomp_representante','horas_medicas.acomp_acompanante','horas_medicas.acomp_lista',
                                            'horas_medicas.autorizacion_atencion','horas_medicas.id_log_users_devices','horas_medicas.id_estado',
                                            'horas_medicas.created_at','horas_medicas.updated_at')
                                    ->with('Estado')
                                    ->with('Paciente')
                                    ->with('Profesional')
                                    ->with('LugarAtencion')
                                    ->with('ProcedimientoCentro')
                                    ->with(['FichaOtrosProfesionales' => function($query){
                                        $query->where('estado_archivo', 0);
                                    }])
                                    ->with(['FichaAtencion' => function($query){
                                        $query->where('estado_archivo', 0);
                                    }])
                                    // LEFT JOIN para considerar fichas de otros profesionales (fonoaudiología, etc)
                                    ->leftJoin('ficha_otros_profesionales', function($join){
                                        $join->on('ficha_otros_profesionales.id', '=', 'horas_medicas.id_ficha_otros_prof');
                                        $join->where('ficha_otros_profesionales.estado_archivo',0);
                                    })
                                    // LEFT JOIN para considerar fichas de atención (laboratorio, rayos X, etc)
                                    ->leftJoin('fichas_atenciones', function($join){
                                        $join->on('fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion');
                                        $join->where('fichas_atenciones.estado_archivo',0);
                                    })
                                    ->whereIn('horas_medicas.id_lugar_atencion', $array_id_lugar_suc)
                                    ->where('horas_medicas.id_estado', 6)// realizadas
                                    // Verificar que tenga al menos una ficha válida (otros profesionales O atención)
                                    ->where(function($query) {
                                        $query->whereNotNull('ficha_otros_profesionales.id')
                                              ->orWhereNotNull('fichas_atenciones.id');
                                    })
                                    ->get();

        // echo json_encode($horas_medicas);
        // die();



        return view('app.laboratorio.subir_examenes')->with([
            'horas_medicas' => $horas_medicas,
            'array_lugares' => implode(",", $array_id_lugar_suc),
        ]);
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

    public function mi_horario_lugar_atencion(Request $request){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();

        return json_encode($horario);
    }

    public function guardar_permisos(Request $request){

        // Validar datos mínimos
        $request->validate([
            'rut' => 'required|string',
            'permiso_cotizar' => 'required',
            'permiso_vender_audifonos' => 'required',
            'permiso_control_audifonos' => 'required',
            'permiso_prestar_audifonos' => 'required',
            'permiso_estadisticas_laboratorio' => 'required',
            'permiso_anular_hora' => 'required',
            'permiso_subir_ver_archivos' => 'required',
            'permiso_eliminar_archivos' => 'required',
            'permiso_editar_pacientes' => 'required',
            'permiso_ver_pacientes_centro' => 'required',
        ]);

        // Buscar profesional por rut
        $profesional = Profesional::where('rut', $request->rut)->first();
        if (!$profesional) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Profesional no encontrado',
            ], 404);
        }

        // Si tienes id_paciente en el request, úsalo, si no, null
        $id_paciente = $request->has('id_paciente') ? $request->id_paciente : null;

        // Crear o actualizar el permiso
        $permiso = PermisoProfesional::updateOrCreate(
            [
                'id_profesional' => $profesional->id,
                'id_paciente' => $id_paciente,
            ],
            [
                'permiso_cotizar' => $request->permiso_cotizar,
                'permiso_vender_audifonos' => $request->permiso_vender_audifonos,
                'permiso_control_audifonos' => $request->permiso_control_audifonos,
                'permiso_prestar_audifonos' => $request->permiso_prestar_audifonos,
                'permiso_estadisticas_laboratorio' => $request->permiso_estadisticas_laboratorio,
                'permiso_anular_hora' => $request->permiso_anular_hora,
                'permiso_subir_ver_archivos' => $request->permiso_subir_ver_archivos,
                'permiso_eliminar_archivos' => $request->permiso_eliminar_archivos,
                'permiso_editar_pacientes' => $request->permiso_editar_pacientes,
                'permisos_ver_pacientes' => $request->permiso_ver_pacientes_centro,
            ]
        );

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Permisos guardados correctamente',
            'permiso' => $permiso
        ]);
    }

    public function obtener_permisos(Request $request){

        // Validar datos mínimos
        $request->validate([
            'id_profesional' => 'required|integer',
        ]);

        // Buscar profesional por id
        $profesional = Profesional::where('id', $request->id_profesional)->first();
        if (!$profesional) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Profesional no encontrado',
            ]);
        }

        // Si tienes id_paciente en el request, úsalo, si no, null
        $id_paciente = $request->has('id_paciente') ? $request->id_paciente : null;

        // Buscar el permiso
        $permisos = PermisoProfesional::where('id_profesional', $profesional->id)
                    // ->where('id_paciente', $id_paciente)
                    ->get();

        if ($permisos->isEmpty()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Permisos no encontrados',
            ]);
        }

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Permisos obtenidos correctamente',
            'permisos' => $permisos
        ]);
    }

    public function historial_mensajes_profesional($id){
        $mensajes = Mensajes::where('id_receptor', $id)
                    ->with('profesionalEmisor')  // Carga la relación
                    ->orderBy('created_at', 'DESC')
                    ->get();

        foreach($mensajes as $mensaje){
            $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);
            $mensaje->destinatarios = json_decode($mensaje->destinatarios);
            // Ahora puedes acceder al nombre del emisor con:
            // $mensaje->profesionalEmisor->nombre
            // $mensaje->profesionalEmisor->apellido_uno
        }
        return ['estado' => 1, 'mensajes' => $mensajes];
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
                    //return back()->with('error','Institución no encontrada');
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



        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();

        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $institucion->id_lugar_atencion)->with('Profesionales')->get();

        $lista_asistente = array();
        if($LugarAtencion)
        {
            $url = 'app.laboratorio.pacientes'; // institucion
            $array_data = array(
                'lugares_atencion' => $LugarAtencion,
                'institucion' => $institucion,
                'profesionales' => $profesionalesLugarAtencion,
            );
            return view($url, $array_data);
        }
        else
        {
            return back()->with('warning', 'El Lugar de Atencion no se encontro');
        }

    }

    public function registrar_calibracion_audifono(Request $request){
        try {

            // Debug temporal - ver qué datos llegan
            // \Log::info('Datos recibidos en registrar_calibracion_audifono:', $request->all());

            // // Validaciones básicas simplificadas (sin exists para debug)
            // $validaciones = [
            //     'id_producto' => 'required|integer',
            //     'id_lugar_atencion' => 'required|integer',
            //     'id_paciente' => 'required|integer',
            //     'id_profesional' => 'required|integer',
            //     'id_hora_medica' => 'nullable|integer',
            //     'mot_cont_audif' => 'required|string|max:255',
            //     'est_audifono' => 'required|string|max:255',
            //     'marca_audif' => 'required|string|max:255',
            //     'model_audif' => 'required|string|max:255',
            //     'n_serie_aud' => 'required|string|max:255',
            //     'fecha_ent_aud' => 'required|date',
            //     'acciones_calib' => 'nullable|string',
            //     'opinion_calibrado' => 'nullable|string'
            // ];


            // $validator = \Validator::make($request->all(), $validaciones);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'estado' => 0,
            //         'mensaje' => 'Errores de validación',
            //         'errores' => $validator->errors()
            //     ], 422);
            // }

            // Comentado temporalmente para debug
            // Verificar que el producto existe
            $producto = Producto::find($request->id_producto);
            if (!$producto) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'El producto seleccionado no existe'
                ], 404);
            }

            // Verificar que el paciente existe
            $paciente = Paciente::find($request->id_paciente);
            if (!$paciente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'El paciente seleccionado no existe'
                ], 404);
            }

            // Verificar que el profesional existe
            $profesional = Profesional::find($request->id_profesional);
            if (!$profesional) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'El profesional seleccionado no existe'
                ], 404);
            }

            // Verificar hora médica si se proporciona
            $hora_medica = null;
            if ($request->id_hora_medica) {
                $hora_medica = HoraMedica::find($request->id_hora_medica);
                if (!$hora_medica) {
                    return response()->json([
                        'estado' => 0,
                        'mensaje' => 'La hora médica seleccionada no existe'
                    ], 404);
                }
            }

            // Procesar y validar la fecha
            $fecha_entrega = \Carbon\Carbon::now()->toDateString(); // Valor por defecto

            // Validar que la fecha no esté vacía
            if (empty($fecha_entrega)) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'La fecha de entrega es requerida'
                ], 422);
            }

            // Validar formato de fecha y convertir si es necesario
            try {
                // Asegurar que esté en formato correcto para la base de datos
                $fecha_entrega_formateada = \Carbon\Carbon::parse($fecha_entrega)->format('Y-m-d');
            } catch (\Exception $e) {
                \Log::error('Error al procesar fecha_entrega', [
                    'fecha_recibida' => $fecha_entrega,
                    'error' => $e->getMessage()
                ]);

                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Formato de fecha inválido: ' . $fecha_entrega
                ], 422);
            }

            // Preparar el motivo de control con observaciones si las hay
            $motivo_control = $request->mot_cont_audif;
            if ($request->has('obs_mot_cont_audif') && $request->obs_mot_cont_audif) {
                $motivo_control .= ' - Observaciones: ' . $request->obs_mot_cont_audif;
            }

            // Preparar el estado del audífono con observaciones si las hay
            $estado_audifono = $request->est_audifono;
            if ($request->has('obs_est_audifono') && $request->obs_est_audifono) {
                $estado_audifono .= ' - Observaciones: ' . $request->obs_est_audifono;
            }

            // Crear la nueva calibración
            $calibracion = new CalibracionAudifono();
            $calibracion->id_producto = $request->id_producto;
            $calibracion->id_lugar_atencion = $request->id_lugar_atencion;
            $calibracion->id_paciente = $request->id_paciente;
            $calibracion->id_profesional = $request->id_profesional;
            $calibracion->id_hora_medica = $request->id_hora_medica;
            $calibracion->motivo_control = $motivo_control;
            $calibracion->motivo_control_text = $request->mot_cont_audif_text;
            $calibracion->estado_audifono = $estado_audifono;
            $calibracion->estado_audifono_text = $request->est_audifono_text;
            $calibracion->marca = $request->marca_audif;
            $calibracion->modelo = $request->model_audif;
            $calibracion->numero_serie = $request->n_serie_aud;

            // $calibracion->fecha_entrega = $fecha_entrega_formateada;

            $calibracion->acciones_calibrado = $request->acciones_calib;
            $calibracion->opinion_paciente = $request->opinion_calibrado;
            $calibracion->estado = 1;

            if ($calibracion->save()) {
                // Log de la operación exitosa
                \Log::info('Calibración de audífono registrada exitosamente', [
                    'calibracion_id' => $calibracion->id,
                    'producto_id' => $request->id_producto,
                    'paciente_id' => $request->id_paciente,
                    'profesional_id' => $request->id_profesional,
                    'hora_medica_id' => $request->id_hora_medica,
                    'numero_serie' => $request->n_serie_aud
                ]);

                return response()->json([
                    'estado' => 1,
                    'mensaje' => 'Calibración de audífono registrada exitosamente',
                    'calibracion' => [
                        'id' => $calibracion->id,
                        'numero_serie' => $calibracion->numero_serie,
                        'marca' => $calibracion->marca,
                        'modelo' => $calibracion->modelo,
                        'fecha_entrega' => $calibracion->fecha_entrega_formateada ?? $calibracion->fecha_entrega,
                        'motivo_control' => $calibracion->motivo_control_text,
                        'estado_audifono' => $calibracion->estado_audifono_text,
                        'acciones_calibrado' => $calibracion->acciones_calibrado,
                        'opinion_paciente' => $calibracion->opinion_paciente,
                        'producto' => $producto->nombre,
                        'paciente' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                        'profesional' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                        'hora_medica' => $hora_medica ? [
                            'id' => $hora_medica->id,
                            'fecha_consulta' => $hora_medica->fecha_consulta,
                            'hora_inicio' => $hora_medica->hora_inicio
                        ] : null
                    ]
                ]);
            } else {
                \Log::error('Error al guardar calibración de audífono', [
                    'request_data' => $request->all()
                ]);

                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Error al guardar la calibración del audífono'
                ], 500);
            }

        } catch (\Exception $e) {
            \Log::error('Excepción al registrar calibración de audífono', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error inesperado al procesar la calibración: ' . $e->getMessage()
            ], 500);
        }
    }

    public function historial_calibraciones_audifono(Request $request){
        $id_paciente = $request->id_paciente;
        $historial = CalibracionAudifono::where('id_paciente', $id_paciente)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return response()->json([
            'estado' => 1,
            'data' => $historial
        ]);
    }

    public function registrar_reparacion_audifono(Request $request){
        try {

            // Validaciones básicas
            // $validaciones = [
            //     'id_producto' => 'required|integer',
            //     'id_lugar_atencion' => 'required|integer',
            //     'id_paciente' => 'required|integer',
            //     'id_profesional' => 'required|integer',
            //     'id_hora_medica' => 'nullable|integer',
            //     'mot_reparacion' => 'required|string|max:255',
            //     'est_audifono_rep' => 'required|string|max:255',
            //     'marca_audif_rep' => 'required|string|max:255',
            //     'model_audif_rep' => 'required|string|max:255',
            //     'n_serie_aud_rep' => 'required|string|max:255',
            //     'fecha_ent_aud_rep' => 'required|date',
            //     'detalle_reparacion' => 'nullable|string',
            //     'satisfaccion_reparacion' => 'nullable|string'
            // ];

            // $validator = \Validator::make($request->all(), $validaciones);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'estado' => 0,
            //         'mensaje' => 'Errores de validación',
            //         'errores' => $validator->errors()
            //     ], 422);
            // }

            // Crear la nueva reparación
            $reparacion = new ReparacionAudifono();
            $reparacion->id_producto = $request->id_producto;
            $reparacion->id_producto_reparo = $request->id_producto_reparo;
            $reparacion->id_lugar_atencion = $request->id_lugar_atencion;
            $reparacion->id_paciente = $request->id_paciente;
            $reparacion->id_profesional = $request->id_profesional;
            $reparacion->id_hora_medica = $request->id_hora_medica;
            $reparacion->motivo_reparacion = $request->mot_reparacion;
            $reparacion->motivo_reparacion_text = $request->mot_rep_audif_text;
            $reparacion->estado_audifono = $request->est_audifono_rep;
            $reparacion->estado_audifono_text = $request->est_audifono_rep_text;
            $reparacion->marca = $request->marca_audif_rep;
            $reparacion->modelo = $request->model_audif_rep;
            $reparacion->numero_serie = $request->n_serie_aud_rep;
            $reparacion->fecha_entrega = $request->fecha_ent_aud_rep;
            $reparacion->acciones_reparacion = $request->detalle_reparacion;
            $reparacion->opinion_paciente = $request->satisfaccion_reparacion;
            $reparacion->estado = 1;

            $reparacion->save();
            return response()->json([
                'estado' => 1,
                'mensaje' => 'Reparación de audífono registrada exitosamente',
                'reparacion' => $reparacion
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error inesperado al procesar la reparación: ' . $e->getMessage()
            ], 500);
        }
    }

    public function historial_reparaciones_audifono(Request $request){
        $id_paciente = $request->id_paciente;

        // Opción con JOIN para obtener directamente los nombres
        $historial = ReparacionAudifono::where('reparaciones_audifono.id_paciente', $id_paciente)
                        ->leftJoin('productos', 'reparaciones_audifono.id_producto', '=', 'productos.id')
                        ->leftJoin('productos as productos_reparo', 'reparaciones_audifono.id_producto_reparo', '=', 'productos_reparo.id')
                        ->leftJoin('marcas_productos', 'productos.id_marca', '=', 'marcas_productos.id')
                        ->select('reparaciones_audifono.*',
                                'productos.nombre as nombre_producto',
                                'productos_reparo.nombre as nombre_producto_reparo',
                                'marcas_productos.nombre as marca_producto')
                        ->orderBy('reparaciones_audifono.created_at', 'desc')
                        ->get();

        return response()->json([
            'estado' => 1,
            'data' => $historial
        ]);
    }

    public function historial_productos_prestados(Request $request){
        $id_paciente = $request->id_paciente;
        $historial = MisProducto::with([
                                        'producto.marca',
                                        'producto.tipoProducto',
                                        'producto.bodega',
                                        'profesional',
                                        'lugarAtencion'
                                    ])
                                    ->porPaciente($id_paciente)
                                    ->activos()
                                    ->prestados()
                                    ->orderBy('fecha_compra', 'desc')
                                    ->get();
        return response()->json([
            'estado' => 1,
            'data' => $historial
        ]);
    }

    public function guardarAudifonoVenta(Request $request){
        try {
            $ficha_id = $request->ficha_id;

            // Procesar audífono izquierdo si se envían datos
            if ($request->n_serie_aud_izq || $request->marca_aud_izq || $request->fecha_entrega_aud_izq) {
                Audifono::updateOrCreate(
                    [
                        'id_ficha_atencion' => $ficha_id,
                        'lado' => 'izquierdo'
                    ],
                    [
                        'numero_serie' => $request->n_serie_aud_izq,
                        'marca' => $request->marca_aud_izq,
                        'fecha_entrega' => $request->fecha_entrega_aud_izq,
                        'nivel_satisfaccion' => $request->satisf_aud_izq
                    ]
                );
            }

            // Procesar audífono derecho si se envían datos
            if ($request->n_serie_aud_der || $request->marca_aud_der || $request->fecha_entrega_aud_der) {
                Audifono::updateOrCreate(
                    [
                        'id_ficha_atencion' => $ficha_id,
                        'lado' => 'derecho'
                    ],
                    [
                        'numero_serie' => $request->n_serie_aud_der,
                        'marca' => $request->marca_aud_der,
                        'fecha_entrega' => $request->fecha_entrega_aud_der,
                        'nivel_satisfaccion' => $request->satisf_aud_der
                    ]
                );
            }

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Información de audífonos guardada correctamente'
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar la información de audífonos: ' . $e->getMessage()
            ]);
        }

    }

    public function misAudifonos(Request $request){

        $id_ficha = $request->id_ficha;
        $audifonos = Producto::select('productos.*','tipo_producto.nombre as tipo_producto','marcas_productos.nombre as marca')
                    ->join('tipo_producto','productos.id_tipo_producto','=','tipo_producto.id')
                    ->join('marcas_productos','productos.id_marca','=','marcas_productos.id')
                    ->whereIn('tipo_producto.id', [9]) // 9: Audífono
                    ->get();
        return response()->json([
            'estado' => 1,
            'audifonos' => $audifonos
        ]);
    }

    public function mis_convenios(){
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();

        $regiones = Region::all();
        $tipoproducto_convenios = TipoProductoConvenios::where('id_tipo_institucion', $institucion->id_tipo_institucion)->get();
        $convenios_prevision = ConvenioInstitucion::where('id_institucion', $institucion->id)->get();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $tipos_convenio_institucion = TipoProductoConvenios::where('id_tipo_institucion', $institucion->id_tipo_institucion)->get();

        $lugares_atencion = Sucursal::select('lugares_atencion.id as lugar_atencion_id','lugares_atencion.nombre as lugar_atencion_nombre','sucursal.*')
        ->join('lugares_atencion','sucursal.id_lugar_atencion','=','lugares_atencion.id')
        ->where('sucursal.id_institucion', $institucion->id)
        ->get();

        $tipos_convenio = TipoConvenio::all();
        $convenios_profesional = ProfesionalConvenio::where('id_profesional', $profesional->id)->get();

        return view('app.laboratorio.mis_convenios', compact('profesional','institucion','regiones','tipoproducto_convenios','convenios_prevision','institucion','lugares_atencion', 'tipos_convenio_institucion', 'tipos_convenio', 'convenios_profesional'));
    }


    public function adm_inst_mis_profesionales()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $array_id_lugare = array();
        $sucursales = collect([]);
        $institucion = collect([]);
        $procedimientos = '';
        $lugar_atencion_principal = null;

        // Si existe profesional, cargar sus lugares de atención
        if ($profesional) {
            $array_id_lugare = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)
                                                                                        ->pluck('id_lugar_atencion')
                                                                                        ->toArray();

            $array_institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare)
                                            ->pluck('id')
                                            ->toArray();

            $institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare)->get();

            if($institucion && $institucion->count() > 0)
            {
                // Solo cargar sucursales de instituciones que tienen el atributo sucursales = 1
                $array_institucion_con_sucursales = $institucion
                    ->where('sucursales', 1)
                    ->pluck('id')
                    ->toArray();

                if(!empty($array_institucion_con_sucursales)) {
                    $sucursales = Sucursal::with('Horario')
                                        ->whereIn('id_institucion', $array_institucion_con_sucursales)
                                        ->get();

                    foreach ($sucursales as $key => $value) {
                        $inst_tem = Instituciones::find($value->id_institucion);
                        $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $inst_tem->id_lugar_atencion)->get();
                        $sucursales[$key]->procedimiento = $procedimientos;
                    }
                } else {
                    // La institución no registra sucursales: array vacío
                    $sucursales = collect([]);
                    // Cargar procedimientos desde el lugar_atencion principal
                    $lugar_atencion_principal = $institucion[0]->id_lugar_atencion;
                    $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $lugar_atencion_principal)->get();
                }
            }
            else
            {
                // Si no hay institución, buscar en sucursales
                $array_id_lug = Sucursal::whereIn('id_lugar_atencion', $array_id_lugare)
                                ->pluck('id_institucion')
                                ->toArray();

                if(!empty($array_id_lug)) {
                    $array_institucion = Instituciones::whereIn('id', $array_id_lug)->where('id_tipo_institucion', 3)
                                                        ->pluck('id')
                                                        ->toArray();
                    $institucion = Instituciones::whereIn('id', $array_id_lug)->where('id_tipo_institucion', 3)->get();

                    if($institucion && $institucion->count() > 0) {
                        $array_institucion_con_sucursales = $institucion
                            ->where('sucursales', 1)
                            ->pluck('id')
                            ->toArray();

                        if(!empty($array_institucion_con_sucursales)) {
                            $sucursales = Sucursal::with('Horario')
                                                ->whereIn('id_institucion', $array_institucion_con_sucursales)
                                                ->get();

                            foreach ($sucursales as $key => $value) {
                                $inst_tem = Instituciones::find($value->id_institucion);
                                $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $inst_tem->id_lugar_atencion)->get();
                                $sucursales[$key]->procedimiento = $procedimientos;
                            }
                        } else {
                            $sucursales = collect([]);
                            $lugar_atencion_principal = $institucion[0]->id_lugar_atencion;
                            $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $lugar_atencion_principal)->get();
                        }
                    }
                }
            }
        }

        // Si no hay institución/sucursal o no existe profesional, buscar en Laboratorio
        if($institucion->count() === 0) {
            $laboratorio = Laboratorio::where('id_usuario', Auth::user()->id)->first();

            if($laboratorio) {
                $lugar_atencion_principal = $laboratorio->id_lugar_atencion;
                $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $lugar_atencion_principal)->get();
                // Crear una colección con los datos del laboratorio como institución
                $institucion = collect([
                    (object)[
                        'id' => $laboratorio->id,
                        'id_lugar_atencion' => $laboratorio->id_lugar_atencion,
                        'nombre' => $laboratorio->nombre ?? 'Laboratorio',
                        'sucursales' => 0
                    ]
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontraron lugares de atención',
                    'error' => 'No se encontraron instituciones, sucursales ni laboratorio asignado'
                ], 404);
            }
        }

        $prevision = Prevision::all();
        $tipo_bonos = TipoBono::where('estado', 1)->get();
        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();

        // Validar que lugar_atencion_principal esté definido
        if(!$lugar_atencion_principal && $institucion->count() > 0) {
            $lugar_atencion_principal = $institucion[0]->id_lugar_atencion;
        }

        $tipo_agendas = [];
        if($lugar_atencion_principal) {
            $tipo_agendas = ProfesionalHorario::select('tipo_agenda')
                                            ->where('id_lugar_atencion', $lugar_atencion_principal)
                                            ->where('id_profesional', $profesional->id)
                                            ->groupBy('tipo_agenda')
                                            ->pluck('tipo_agenda')
                                            ->toArray();
        }

        $arrayTipoAgenda = array('', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes', 'Laboratorio');
        $listaTipoAgendaProf = array();
        foreach ($tipo_agendas as $keyTA => $valueTA) {
            array_push($listaTipoAgendaProf, array('id' => $valueTA, 'texto' => $arrayTipoAgenda[$valueTA]));
        }

        return view('app.laboratorio.agenda_laboratorio_adm')->with([
            'profesional' => $profesional,
            'institucion' => $institucion,
            'sucursales' => $sucursales,
            'procedimientos' => $procedimientos,
            'listaTipoAgendaProf' => $listaTipoAgendaProf,
            'lugar_atencion' => $lugar_atencion_principal,
            'prevision' => $prevision,
            'tipo_bonos' => $tipo_bonos,
            'reg_confirmacion_hora' => $reg_confirmacion_hora,
        ]);
    }

    public function actualizarPrestacionLab(Request $request)
    {
        try {

            $prestacion = ProcedimientosCentro::find($request->id);

            if (!$prestacion) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Prestación no encontrada'
                ]);
            }
            $prestacion->nombre = $request->nombre;
            $prestacion->descripcion = $request->descripcion;
            $prestacion->cantidad_bloques = $request->cantidad_bloques;
            $prestacion->valor = $request->valor;
            $prestacion->indicaciones = $request->indicaciones;
            $prestacion->save();

            return response()->json([
                'status' => 'ok',
                'message' => 'Prestación actualizada correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
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

    public function dame_profesionales($id_lugar_atencion){
        $profesionales = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
                            ->leftjoin('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
                            ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        return $profesionales;
    }

    public function dame_areas_cm($id_lugar_atencion){
        $areas_cm = AreasCm::select('areas_cm.*','tipos_areas_cm.nombre as tipo_area')
                            ->join('tipos_areas_cm','tipos_areas_cm.id','=','areas_cm.id_tipo_area_cm')
                            ->where('areas_cm.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        return $areas_cm;
    }

    public function dame_servicios_internos($id_institucion){
        $servicios_internos = ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                            ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                            ->where('servicio_interno.id_institucion',$id_institucion)
                            ->get();

        return $servicios_internos;
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
                                        //return back()->with('error','Institución no encontrada');
                                        $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                                        if($registro){
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
                    if($registro){
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
        return view('app.laboratorio.escritorio_adm_comercial',[
            'institucion' => $institucion,
        ]);
    }

    public function dame_profesional(Request $req){
        $profesional = Profesional::where('id', $req->id)->first();
        return ['estado' => 1, 'profesional' => $profesional];
    }

    public function cargarBox(Request $request)
    {
        $datos = array();
        $valido = 1;

        if( empty($request->id_lugar_atencion) )
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = BoxesCm::where('id_lugar_atencion', $request->id_lugar_atencion)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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

    public function cargarAgendaSucursalBox(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            // Si id_sucursal es 0 o vacío la institución no registra sucursales;
            // se usa id_lugar_atencion directamente para resolver la institución.
            $sinSucursal = (empty($request->id_sucursal) || $request->id_sucursal == 0);

            $sucursal = $sinSucursal ? null : Sucursal::find($request->id_sucursal);

            // Horario: sin sucursal se busca por lugar_atencion ignorando id_sucursal
            if($sinSucursal) {
                $horario_suc = SucursalHorario::where('id_lugar_atencion', $request->id_lugar_atencion)->get();
            } else {
                $horario_suc = SucursalHorario::where('id_sucursal', $request->id_sucursal)
                                                ->where('id_lugar_atencion', $request->id_lugar_atencion)
                                                ->get();
            }



            if($horario_suc->count() > 0)
            {

                $horario_data = array();
                $horario_agenda = '0,1,2,3,4,5,6';
                $periodo_agenda = '';
                $periodo_agenda_temp = '01:00';
                $hora_inicio_agenda = '';
                $hora_inicio_agenda_temp = '24:00';
                $hora_termino_agenda = '';
                $hora_termino_agenda_temp = 0;
                foreach ($horario_suc as $hor)
                {
                    $ho = explode(',', $hor->dia);
                    // dd($ho);
                    foreach ($ho as $h)
                    {
                        if ($h == '0')
                        {
                            $horario_agenda = str_replace($h, '', $horario_agenda);
                        }
                        else
                        {
                            $horario_agenda = str_replace(',' . $h, '', $horario_agenda);
                        }
                    }
                    if(strtotime($hor->duracion_consulta) < strtotime($periodo_agenda_temp))
                        $periodo_agenda_temp = $hor->duracion_consulta;

                    if(strtotime($hor->hora_inicio) < strtotime($hora_inicio_agenda_temp))
                        $hora_inicio_agenda_temp = $hor->hora_inicio;

                    if(strtotime($hor->hora_termino) > strtotime($hora_termino_agenda_temp))
                        $hora_termino_agenda_temp = $hor->hora_termino;
                }
                $horario_agenda = ltrim($horario_agenda, ',');
                $periodo_agenda = $periodo_agenda_temp;
                $hora_inicio_agenda = $hora_inicio_agenda_temp;
                $hora_termino_agenda = $hora_termino_agenda_temp;

                $horario_data['horario_agenda'] = $horario_agenda;
                $horario_data['periodo_agenda'] = $periodo_agenda;
                $horario_data['hora_inicio_agenda'] = $hora_inicio_agenda;
                $horario_data['hora_termino_agenda'] = $hora_termino_agenda;


                // Resolver institución: si hay sucursal la obtenemos de ella,
                // si no (sin sucursales) la buscamos directo por id_lugar_atencion.
                if($sucursal) {
                    $id_institucion = $sucursal->id_institucion;
                    $institucion = Instituciones::find($id_institucion);
                } else {
                    $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
                }

                $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $institucion->id_lugar_atencion)->get();

                // dd($procedimientos);

                $datos['estado'] = 1;
                $datos['msj'] = 'horario';
                $datos['horario'] = $horario_suc;
                $datos['horario_data'] = $horario_data;
                $datos['procedimientos'] = $procedimientos;
                // $datos['tipo_agendas'] = $tipo_agendas;
                $datos['request'] = $request->all();
            }
            else
            {
                // Si no hay horarios en SucursalHorario, buscar en ProfesionalHorario
                $horario_prof = ProfesionalHorario::where('id_lugar_atencion', $request->id_lugar_atencion)->get();

                if ($horario_prof && $horario_prof->count() > 0) {
                    // Procesar datos igual que con SucursalHorario
                    $horario_data = array();
                    $horario_agenda = '0,1,2,3,4,5,6';
                    $periodo_agenda = '';
                    $periodo_agenda_temp = '01:00';
                    $hora_inicio_agenda = '';
                    $hora_inicio_agenda_temp = '24:00';
                    $hora_termino_agenda = '';
                    $hora_termino_agenda_temp = 0;
                    foreach ($horario_prof as $hor) {
                        $ho = explode(',', $hor->dia);
                        foreach ($ho as $h) {
                            if ($h == '0') {
                                $horario_agenda = str_replace($h, '', $horario_agenda);
                            } else {
                                $horario_agenda = str_replace(',' . $h, '', $horario_agenda);
                            }
                        }
                        if(strtotime($hor->duracion_consulta) < strtotime($periodo_agenda_temp))
                            $periodo_agenda_temp = $hor->duracion_consulta;

                        if(strtotime($hor->hora_inicio) < strtotime($hora_inicio_agenda_temp))
                            $hora_inicio_agenda_temp = $hor->hora_inicio;

                        if(strtotime($hor->hora_termino) > strtotime($hora_termino_agenda_temp))
                            $hora_termino_agenda_temp = $hor->hora_termino;
                    }
                    $horario_agenda = ltrim($horario_agenda, ',');
                    $periodo_agenda = $periodo_agenda_temp;
                    $hora_inicio_agenda = $hora_inicio_agenda_temp;
                    $hora_termino_agenda = $hora_termino_agenda_temp;

                    $horario_data['horario_agenda'] = $horario_agenda;
                    $horario_data['periodo_agenda'] = $periodo_agenda;
                    $horario_data['hora_inicio_agenda'] = $hora_inicio_agenda;
                    $horario_data['hora_termino_agenda'] = $hora_termino_agenda;

                    $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
                    $procedimientos = ProcedimientosCentro::where('id_lugar_atencion', $request->id_lugar_atencion)->get();

                    $datos['estado'] = 1;
                    $datos['msj'] = 'horario_profesional';
                    $datos['horario'] = $horario_prof;
                    $datos['horario_data'] = $horario_data;
                    $datos['procedimientos'] = $procedimientos;
                    $datos['request'] = $request->all();
                } else {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'sin horario';
                    $datos['request'] = $request->all();
                }
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

    public function distribuidores(){
                // Resolver la institución/laboratorio del usuario autenticado
        $laboratorio = Laboratorio::where('id_usuario', Auth::user()->id)->first();

        if (!$laboratorio) {
            $responsable = AdminInstServ::where('id_admin', Auth::user()->id)->first();
            if ($responsable) {
                $laboratorio = Laboratorio::where('id_responsable', $responsable->id)->first();
            }
        }

        if (!$laboratorio) {
            //return back()->with('error', 'Institución no encontrada');
        }
        return view('app.laboratorio.adm_general.distribuidores.home', [
            'laboratorio' => $laboratorio,
            'institucion' => $laboratorio, // Para mantener compatibilidad con vistas que esperan una variable 'institucion'
        ]);
    }

    public function agendar_horas(Request $request)
    {

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        // $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // var_dump( static::tipoHorario($profesional->id, $request->fecha_consulta) );
        // die();

        $filtro_tipo_hora_medica = array(1);
        $texto_alias_examen = '';
        # TIPO HORA MEDICA
        switch ($request->tipo_hora_medica) {
            case 'C': // 1
                // $filtro_tipo_hora_medica = array(1);
                $filtro_tipo_hora_medica = array('C');
                $texto_alias_examen = 'Consulta';
                break;
            case 'D': // 2
                // $filtro_tipo_hora_medica = array(2);
                $filtro_tipo_hora_medica = array('D');
                $texto_alias_examen = 'Consulta Dental';
                break;
            case 'T': // 3
                // $filtro_tipo_hora_medica = array(3);
                $filtro_tipo_hora_medica = array('T');
                $texto_alias_examen = 'Consulta Telemedicina';
                break;
            case 'E': // 4
                // $filtro_tipo_hora_medica = array(4);
                $filtro_tipo_hora_medica = array('E');
                $texto_alias_examen = 'Consulta Examen';
                break;
        }


        # ESTADOS DE HORA DE ATENCION
        // 1.  Reservada -> celeste
        // 2.  CONFIRMADO -> verde
        // 3.  Rechazada -> Rojo
        // 4.  Espera -> morado
        // 5.  Realizando-> rosa
        // 6.  Realizada -> Azul
        // 7.  Inasistida -> naranjo
        // 8.  Llamando -> morado (monitor sala espera)
        // validar si paciente tiene otra consulta
        // var_dump($paciente->id);
        // var_dump($profesional->id);
        // var_dump($filtro_tipo_hora_medica);
        // var_dump(\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'));

        $validar = HoraMedica::where('id_paciente', $paciente->id)
                                ->whereIn('id_estado',[1,2,4,5,6,8])
                                ->where('id_box',$request->id_box ? $request->id_box : null)
                                ->where('id_lugar_atencion', $request->id_lugar_atencion ? $request->id_lugar_atencion : null)
                                ->whereIn('tipo_hora_medica',$filtro_tipo_hora_medica)
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->first();
        // var_dump($validar);
        // exit();
        if($validar)
        {
            return json_encode(array(
                    'estado' => 'error',
                    'msj' => 'PACIENTE TIENE HORA AGENDADA PARA ESTE DIA'
                    ));
        }
        else
        {

            $hora_cunsulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');

            // DB::enableQueryLog(); // Habilitar el registro de consultas

            $validar = HoraMedica::where('id_paciente', $paciente->id)
                                ->whereIn('id_estado',[1,2,4,5,6,8])
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->where(function($query) use ($hora_cunsulta) {
                                    $query->whereTime('hora_inicio','>=', $hora_cunsulta)
                                        ->whereTime('hora_termino','<=', $hora_cunsulta);
                                })
                                ->first();

            // $queries = DB::getQueryLog();
            // dd($queries);

            if($validar)
            {
                return json_encode(array(
                        'estado' => 'error',
                        'msj' => 'PACIENTE TIENE HORA AGENDADA PARA ESTE DÍA EN OTRO LUGAR DE ATENCIÓN'
                        ));
            }

        }

        $tiempo_consulta = 15;
        $procedimiento = '';

        if(is_array($request->procedimiento))
        {
            $procedimiento = implode('|',$request->procedimiento);
        }
        else
        {
            $procedimiento = $request->procedimiento;
        }

        $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
        $tiempo_consulta = intval($proc_bloque) * 15;

        $hora_medica = new HoraMedica();

        $hora_medica->id_paciente = $request->reserva_hora_id;
        // $hora_medica->id_profesional = '';
        $hora_medica->id_estado = '1';
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

        $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
        $hora_medica->alias_examen = $texto_alias_examen;

        $hora_medica->id_box = $request->id_box;
        $hora_medica->id_procedimiento = $procedimiento;

        $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
        $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

        if (!$hora_medica->save()) {
            return 'error';
        }

        $nombres_procedimientos = '';
        $indicaciones_procedimientos = '';
        if(is_array($request->procedimiento))
        {
            $procedimiento_centro = ProcedimientosCentro::whereIn('id', $request->procedimiento)->get();
            foreach ($procedimiento_centro as $key_pc => $value_pc) {
                $nombres_procedimientos .= $value_pc->nombre.', ';
                if(!empty($value_pc->indicaciones)){
                    $indicaciones_procedimientos .= '<strong>' . $value_pc->nombre . ':</strong><br>' . $value_pc->indicaciones . '<br><br>';
                }
            }
        }
        else
        {
            $procedimiento_centro = ProcedimientosCentro::find($procedimiento);
            $nombres_procedimientos = $procedimiento_centro->nombre;
            if(!empty($procedimiento_centro->indicaciones)){
                $indicaciones_procedimientos = $procedimiento_centro->indicaciones;
            }
        }


        // $details = [
        //     'title' => 'Hora medica Reservada',
        //     'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
        //             Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>' .
        //         'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
        //         'Hora : ' . $hora_medica->hora_inicio . '<br>' .
        //         'Procedimiento: '.$nombres_procedimientos.'<br><br>' .
        //         'Que tenga un excelente día. </br></br>' .
        //         'Saludos.',
        // ];

        $lugar_atencion = LugarAtencion::find($hora_medica->id_lugar_atencion);

        /** envio de correo de confirmacion INSTITUCION */
        $blade = 'hora_agendada_laboratorio';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Nueva Hora Agendada';
        $body = array(
            'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
            'fecha'=> $hora_medica->fecha_consulta,
            'hora'=> $hora_medica->hora_inicio,
            'lugar_atencion'=> $lugar_atencion->nombre,
            'procedimiento'=> $nombres_procedimientos,
            'indicaciones'=> $indicaciones_procedimientos,
            'direccion'=> $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
        );
        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['mail']['institucion']['estado'] = 1;
            $datos['mail']['institucion']['msj'] = 'Notificacion de bienvenida enviado';
        }
        else
        {
            $datos['mail']['institucion']['estado'] = 0;
            $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
        }

        return json_encode($hora_medica);
    }

    public function cargarResultado(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $array_id_lugare_prof = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)
                                                                                    ->pluck('id_lugar_atencion')
                                                                                    ->toArray();



        $array_institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                                        ->where('id_tipo_institucion', 3)
                                        ->pluck('id')
                                        ->toArray();


        if($array_institucion)
        {
            $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                ->pluck('id_lugar_atencion')
                                ->toArray();
        }
        else
        {
            $array_id_lug = Sucursal::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                            ->pluck('id_institucion')
                            ->toArray();

            $array_institucion = Instituciones::whereIn($array_id_lug)->where('id_tipo_institucion', 3)
                                                ->pluck('id')
                                                ->toArray();

            $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                                ->pluck('id_lugar_atencion')
                                                ->toArray();
        }



        $horas_medicas = HoraMedica::select('horas_medicas.id','horas_medicas.fecha_consulta','horas_medicas.hora_inicio',
                                            'horas_medicas.hora_termino', 'horas_medicas.tipo_hora_medica', 'horas_medicas.alias_examen',
                                            'horas_medicas.id_box', 'horas_medicas.id_procedimiento', 'horas_medicas.id_jitsi_video_consulta',
                                            'horas_medicas.descripcion','horas_medicas.comentarios_confirmacion','horas_medicas.fecha_confirmacion',
                                            'horas_medicas.comentarios_cancelacion','horas_medicas.fecha_cancelacion','horas_medicas.fecha_realizacion_consulta',
                                            'horas_medicas.id_ficha_atencion','horas_medicas.id_ficha_otros_prof','horas_medicas.id_profesional',
                                            'horas_medicas.id_lugar_atencion','horas_medicas.id_asistente','horas_medicas.id_paciente',
                                            'horas_medicas.acomp_representante','horas_medicas.acomp_acompanante','horas_medicas.acomp_lista',
                                            'horas_medicas.autorizacion_atencion','horas_medicas.id_log_users_devices','horas_medicas.id_estado',
                                            'horas_medicas.created_at','horas_medicas.updated_at')
                                    ->with('Estado')
                                    ->with('Paciente')
                                    ->with('Profesional')
                                    ->with('LugarAtencion')
                                    ->with('ProcedimientoCentro')
                                    ->with(['FichaOtrosProfesionales' => function($query){
                                        $query->where('estado_archivo', 0);
                                    }])
                                    ->with(['FichaAtencion' => function($query){
                                        $query->where('estado_archivo', 0);
                                    }])
                                    // LEFT JOIN para considerar fichas de otros profesionales (fonoaudiología, etc)
                                    ->leftJoin('ficha_otros_profesionales', function($join){
                                        $join->on('ficha_otros_profesionales.id', '=', 'horas_medicas.id_ficha_otros_prof');
                                        $join->where('ficha_otros_profesionales.estado_archivo',0);
                                    })
                                    // LEFT JOIN para considerar fichas de atención (laboratorio, rayos X, etc)
                                    ->leftJoin('fichas_atenciones', function($join){
                                        $join->on('fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion');
                                        $join->where('fichas_atenciones.estado_archivo',0);
                                    })
                                    ->whereIn('horas_medicas.id_lugar_atencion', $array_id_lugar_suc)
                                    ->where('horas_medicas.id_estado', 6)// realizadas

                                    ->where('horas_medicas.id_profesional', $profesional->id)
                                    // Verificar que tenga al menos una ficha válida (otros profesionales O atención)
                                    ->where(function($query) {
                                        $query->whereNotNull('ficha_otros_profesionales.id')
                                              ->orWhereNotNull('fichas_atenciones.id');
                                    })
                                    ->get();

        // echo json_encode($horas_medicas);
        // die();


                $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->first();

                $institucion = Instituciones::where('id_lugar_atencion',$lugar_atencion->id_lugar_atencion)->first();


        return view('app.laboratorio.subir_examenes')->with([
            'horas_medicas' => $horas_medicas,
            'array_lugares' => implode(",", $array_id_lugar_suc),
            'institucion' => $institucion,
            'profesional' => $profesional,
        ]);
    }

    public function cargarTablaResultado(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $rut = $request->rut;
            $nombre = $request->nombre;
            $apellido = $request->apellido;

            $horas_medicas = HoraMedica::select('horas_medicas.id','horas_medicas.fecha_consulta','horas_medicas.hora_inicio',
                    'horas_medicas.hora_termino', 'horas_medicas.tipo_hora_medica', 'horas_medicas.alias_examen',
                    'horas_medicas.id_box', 'horas_medicas.id_procedimiento', 'horas_medicas.id_jitsi_video_consulta',
                    'horas_medicas.descripcion','horas_medicas.comentarios_confirmacion','horas_medicas.fecha_confirmacion',
                    'horas_medicas.comentarios_cancelacion','horas_medicas.fecha_cancelacion','horas_medicas.fecha_realizacion_consulta',
                    'horas_medicas.id_ficha_atencion','horas_medicas.id_ficha_otros_prof','horas_medicas.id_profesional',
                    'horas_medicas.id_lugar_atencion','horas_medicas.id_asistente','horas_medicas.id_paciente',
                    'horas_medicas.acomp_representante','horas_medicas.acomp_acompanante','horas_medicas.acomp_lista',
                    'horas_medicas.autorizacion_atencion','horas_medicas.id_log_users_devices','horas_medicas.id_estado',
                    'horas_medicas.created_at','horas_medicas.updated_at')
            ->with('Estado')
            ->with('Paciente')
            ->with('Profesional')
            ->with('LugarAtencion')
            ->with('ProcedimientoCentro')
            ->with(['FichaOtrosProfesionales' => function($query){
                $query->where('estado_archivo', 0);
            }])
            ->with(['FichaAtencion' => function($query){
                $query->where('estado_archivo', 0);
            }])
            // LEFT JOIN para considerar fichas de otros profesionales (fonoaudiología, etc)
            ->leftJoin('ficha_otros_profesionales', function($join){
                $join->on('ficha_otros_profesionales.id', '=', 'horas_medicas.id_ficha_otros_prof');
                $join->where('ficha_otros_profesionales.estado_archivo',0);
            })
            // LEFT JOIN para considerar fichas de atención (laboratorio, rayos X, etc)
            ->leftJoin('fichas_atenciones', function($join){
                $join->on('fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion');
                $join->where('fichas_atenciones.estado_archivo',0);
            })
            ->join('pacientes', function($join) use ( $rut, $nombre, $apellido ) {
                $join->on('pacientes.id', '=', 'horas_medicas.id_paciente');
            } )
            ->whereIn('horas_medicas.id_lugar_atencion', explode(",",$request->lista_array))
            ->where('horas_medicas.id_estado', 6)// realizadas
            // Verificar que tenga al menos una ficha válida (otros profesionales O atención)
            ->where(function($query) {
                $query->whereNotNull('ficha_otros_profesionales.id')
                      ->orWhereNotNull('fichas_atenciones.id');
            })
            ->where(function ($query) use ($rut, $nombre, $apellido) {
                if (!empty($rut)) {
                    $query->where('pacientes.rut', 'like', '%' . $rut . '%');
                }
                if (!empty($nombre)) {
                    $query->where('pacientes.nombres', 'like', '%' . $nombre . '%');
                }
                if (!empty($apellido)) {
                    $query->where('pacientes.apellido_uno', 'like', '%' . $apellido . '%')->orWhere('pacientes.apellido_dos', 'like', '%' . $apellido . '%');
                }
            })
            ->get();

            if($horas_medicas)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $horas_medicas;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'campos requeridos';
                $datos['error'] = $error;
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

     public function subirResultado(Request $request)
    {
        $error = array();
        $valido = 1;

        // Validar que se recibió el tipo de ficha
        if(empty($request->tipo_ficha))
        {
            return response()->json([
                'estado' => 0,
                'msj'    => 'tipo de ficha no especificado',
            ]);
        }

        if($valido)
        {
            // Buscar el registro según el tipo de ficha
            $registro = null;
            $tipo_ficha = $request->tipo_ficha;

            if($tipo_ficha === 'otros_prof')
            {
                // Buscar en ficha_otros_profesionales
                $registro = FichaOtrosProfesionales::find($request->id_ficha_otros_profesionales);
            }
            elseif($tipo_ficha === 'ficha_atencion')
            {
                // Buscar en fichas_atenciones (laboratorio, rayos X)
                $registro = FichaAtencion::find($request->id_ficha_otros_profesionales);
            }
            else
            {
                return response()->json([
                    'estado' => 0,
                    'msj'    => 'tipo de ficha inválido: ' . $tipo_ficha,
                ]);
            }

            if($registro)
            {
                // Acumular archivos existentes en lugar de sobrescribir
                $registro_archivo = array();
                if(!empty($registro->archivo))
                {
                    $archivos_existentes = json_decode($registro->archivo, true);
                    if(is_array($archivos_existentes))
                        $registro_archivo = $archivos_existentes;
                }

                if(!empty($request->lista_archivos))
                {
                    $paciente = Paciente::find($request->id_paciente);

                    $array_archivo = json_decode($request->lista_archivos);

                    foreach ($array_archivo as $key => $value)
                    {
                        $nombre_temp      = $value[2];
                        $file_extension   = $value[3];
                        $nombre_final     = $paciente->rut.'_examen_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                        $resulto_archivo  = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
                        $url              = $resulto_archivo['proceso']['url'];

                        array_push($registro_archivo, array(
                            'nombre' => $nombre_final,
                            'url'    => $url
                        ));
                    }

                    $registro->estado_archivo = 1;
                    $registro->archivo        = json_encode($registro_archivo);

                    if($registro->save())
                    {
                        // Notificar al paciente por email
                        if($paciente && $paciente->email)
                        {
                            try
                            {
                                $procedimiento = 'Examen';
                                $hora_medica   = HoraMedica::find($request->id_hora);
                                if($hora_medica && $hora_medica->procedimientocentro)
                                    $procedimiento = $hora_medica->procedimientocentro->nombre;

                                $url_documento = !empty($registro_archivo) ? $registro_archivo[0]['url'] : '';

                                $datos_correo = [
                                    'asunto'      => 'Resultado de examen disponible - Medichile',
                                    'blade'       => 'resultado_examen',
                                    'url_archivo' => null,
                                    'body'        => [
                                        'nombre_cliente' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                                        'mensaje'        => 'El resultado de su examen <strong>'.$procedimiento.'</strong> ya está disponible. Fecha de carga: '.now()->format('d/m/Y H:i').'.',
                                        'url_documento'  => $url_documento,
                                    ],
                                ];
                                Mail::to($paciente->email)->send(new CorreoGenerico($datos_correo));
                            }
                            catch(\Exception $e)
                            {
                                \Log::warning('No se pudo enviar email de resultado examen: '.$e->getMessage());
                            }
                        }

                        return response()->json([
                            'estado'     => 1,
                            'msj'        => 'exito',
                            'tipo_ficha' => $tipo_ficha,
                        ]);
                    }
                    else
                    {
                        return response()->json([
                            'estado' => 0,
                            'msj'    => 'falla en registro',
                        ]);
                    }
                }
                else
                {
                    return response()->json([
                        'estado' => 0,
                        'msj'    => 'No se recibieron archivos',
                    ]);
                }
            }
            else
            {
                return response()->json([
                    'estado' => 0,
                    'msj'    => 'registro no encontrado para tipo: ' . $tipo_ficha,
                ]);
            }
        }
        else
        {
            return response()->json([
                'estado' => 0,
                'msj'    => 'campos requeridos',
                'error'  => $error,
            ]);
        }
    }

    public function buscar_pacientes_profesional_asistente(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if($profesional)
        {
            $array_id_lugare_prof = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)
            ->pluck('id_lugar_atencion')
            ->toArray();

            $array_institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                                            ->where('id_tipo_institucion', 3)
                                            ->pluck('id')
                                            ->toArray();

            if($array_institucion)
            {
                $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                ->pluck('id_lugar_atencion')
                                ->toArray();

                if(count($array_id_lugar_suc) == 0)
                {
                    $array_id_lugar_suc = Laboratorio::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                                            ->pluck('id_lugar_atencion')
                                            ->toArray();
                }
            }
            else
            {
                $array_id_lug = Sucursal::whereIn('id_lugar_atencion', $array_id_lugare_prof)
                                ->pluck('id_institucion')
                                ->toArray();

                $array_institucion = Instituciones::whereIn($array_id_lug)->where('id_tipo_institucion', 3)
                                                    ->pluck('id')
                                                    ->toArray();

                $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                                    ->pluck('id_lugar_atencion')
                                                    ->toArray();
            }
        }
        else
        {
            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

            if($asistente)
            {
                $array_id_lugres_asis = Asistente::where('id_asistente',$asistente->id)
                ->pluck('id_lugar_atencion')
                ->toArray();

                $array_institucion = Instituciones::whereIn('id_lugar_atencion', $array_id_lugres_asis)
                                            ->where('id_tipo_institucion', 3)
                                            ->pluck('id')
                                            ->toArray();

                if($array_institucion)
                {
                    $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                        ->pluck('id_lugar_atencion')
                                        ->toArray();
                }
                else
                {
                    $array_id_lug = Sucursal::whereIn('id_lugar_atencion', $array_id_lugres_asis)
                                    ->pluck('id_institucion')
                                    ->toArray();

                    $array_institucion = Instituciones::whereIn($array_id_lug)->where('id_tipo_institucion', 3)
                                                        ->pluck('id')
                                                        ->toArray();

                    $array_id_lugar_suc = Sucursal::whereIn('id_institucion', $array_institucion)
                                                        ->pluck('id_lugar_atencion')
                                                        ->toArray();
                }
            }
        }

        $url = 'app.laboratorio.pacientes_prof_asis';
        $array_data = array(
            'lugares_atencion' => implode(',',$array_id_lugar_suc),
        );
        return view($url, $array_data);
    }

    public function audifonosVenta($id_lugar_atencion)
    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $permisos = PermisoProfesional::where('id_profesional', $profesional->id)->first();
        $prevision = Prevision::all();
        $regiones = Region::all();


        $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->first();

        $institucion = Instituciones::where('id_lugar_atencion',$lugar_atencion->id_lugar_atencion)->first();

        return view('app.laboratorio.lab_profesional.venta_audifono',[
            'profesional' => $profesional,
            'permiso_profesional' => $permisos,
            'prevision' => $prevision,
            'regiones' => $regiones,
            'id_lugar_atencion' => $id_lugar_atencion,
            'institucion' => $institucion,
        ]);
    }

    public function audifonosControl(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $permisos = PermisoProfesional::where('id_profesional', $profesional->id)->first();

        $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->first();

        $institucion = Instituciones::where('id_lugar_atencion',$lugar_atencion->id_lugar_atencion)->first();
        return view('app.laboratorio.lab_profesional.control_audifono',[
            'profesional' => $profesional,
            'permiso_profesional' => $permisos,
            'institucion' => $institucion,
        ]);
    }

    /**
     * Obtener productos del paciente para devolver a proveedor
     */
    public function obtenerProductosPacienteParaDevolver(Request $request)
    {
        try {
            $id_paciente = $request->input('id_paciente');

            if (!$id_paciente) {
                return response()->json(['estado' => 0, 'mensaje' => 'ID de paciente requerido']);
            }

            // Obtener productos del paciente desde mis_productos
            // Se unen con productos para obtener nombre, código e imagen
            $productos = DB::table('mis_productos')
                ->join('productos', 'mis_productos.id_producto', 'productos.id')
                ->leftJoin('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->select(
                    'mis_productos.id',
                    'productos.id as id_producto',
                    'productos.nombre',
                    'productos.codigo_interno',
                    'productos.image_path',
                    'tipo_producto.nombre as tipo_producto',
                    'mis_productos.fecha_compra',
                    'mis_productos.observaciones'
                )
                ->where('mis_productos.id_paciente', $id_paciente)
                ->where('mis_productos.estado', 1) // Solo productos activos
                ->orderBy('mis_productos.fecha_compra', 'desc')
                ->get();

            if (count($productos) === 0) {
                return response()->json(['estado' => 1, 'mensaje' => 'Sin productos', 'productos' => []]);
            }

            return response()->json(['estado' => 1, 'productos' => $productos]);
        } catch (\Exception $e) {
            return response()->json(['estado' => 0, 'mensaje' => $e->getMessage()]);
        }
    }

    public function estadisticas($id_institucion = null){

        if($id_institucion){
            $institucion = Instituciones::find($id_institucion);

            if(!$institucion){
                $institucion = Laboratorio::where('id_usuario', Auth::user()->id)->first();
                if(!$institucion){
                    return redirect()->back()->with('error', 'Institución no encontrada');
                }
            }
        }

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


        // $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->first();

        $institucion = Instituciones::where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();

        return view('app.laboratorio.lab_profesional.estadisticas',[
            'profesional' => $profesional,
            'institucion' => isset($institucion) ? $institucion : null,
            'sucursales' => $sucursales,
            'profesionales' => $profesionales,
        ]);
    }

    public function estadisticasBuscar(Request $request){

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $id_institucion = $request->id_institucion;
        $id_sucursal = $request->id_sucursal ?? null;
        $id_profesional = $request->id_profesional ?? null;
        $tipo_estadistica = $request->tipo_estadistica ?? null;


        if($tipo_estadistica == 'ventas'){
            $profesional = Profesional::find($id_profesional);
            if($profesional){
                $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                            ->with('Producto')
                            ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                            ->get();

                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio;
                }
                $mis_pacientes = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                    ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                    ->select('horas_medicas.id_profesional')
                    ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                    ->groupBy('horas_medicas.id_profesional')
                    ->with('Profesional')
                    ->get()
                    ->map(function($item) {
                        return [
                            'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                            'cantidad_pacientes' => $item->cantidad_pacientes,
                        ];
                    });
                return view('app.laboratorio.lab_profesional.estadisticas_ventas',[
                    'productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                    'mis_pacientes' => $mis_pacientes,
                ]);
            }else{
                 $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);
                $mis_ventas = MisProducto::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                            ->with('Producto')
                            ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                            ->get();
                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio;
                }

                $mis_pacientes = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                return view('app.laboratorio.lab_profesional.estadisticas_ventas',[
                    'productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                    'mis_pacientes' => $mis_pacientes,
                ]);
            }

        }

        if($tipo_estadistica == 'profesional'){
            $profesional = Profesional::find($id_profesional);
            $institucion = Instituciones::find($id_institucion);
            return $institucion;
            if(!$institucion){
                $institucion = Sucursal::find($id_sucursal);
            }
            if($profesional){
                $mis_pacientes = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_lugar_atencion', $institucion->id_lugar_atencion)
                ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_atendiendo = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 5) // solo horas atendiendose
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_agendados = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 1) // solo horas agendadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_cancelados = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 3) // solo horas canceladas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                return view('app.laboratorio.lab_profesional.estadisticas_profesional',[
                    'mis_pacientes' => $mis_pacientes,
                    'mis_pacientes_atendiendo' => $mis_pacientes_atendiendo,
                    'mis_pacientes_agendados' => $mis_pacientes_agendados,
                    'mis_pacientes_cancelados' => $mis_pacientes_cancelados,
                ]);
            }else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);
                $mis_pacientes = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_atendiendo = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 5) // solo horas atendiendose
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_agendados = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 1) // solo horas agendadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_cancelados = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 3) // solo horas canceladas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                return view('app.laboratorio.lab_profesional.estadisticas_profesional',[
                    'mis_pacientes' => $mis_pacientes,
                    'mis_pacientes_atendiendo' => $mis_pacientes_atendiendo,
                    'mis_pacientes_agendados' => $mis_pacientes_agendados,
                    'mis_pacientes_cancelados' => $mis_pacientes_cancelados,
                ]);
            }

        }

        if($tipo_estadistica == 'tratamientos'){
            $profesional = Profesional::find($id_profesional);
            if($profesional){
                $mis_tratamientos = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                    ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                    ->join('procedimientos_centro', 'horas_medicas.id_procedimiento', '=', 'procedimientos_centro.id')
                    ->select('horas_medicas.id_procedimiento')
                    ->selectRaw('COUNT(*) as cantidad')
                    ->selectRaw('SUM(procedimientos_centro.valor) as total_valor')
                    ->groupBy('horas_medicas.id_procedimiento')
                    ->with('ProcedimientoCentro')
                    ->get()
                    ->map(function($item) {
                        return [
                            'procedimiento' => $item->ProcedimientoCentro ? $item->ProcedimientoCentro->nombre : 'Sin procedimiento',
                            'cantidad' => $item->cantidad,
                            'total_valor' => $item->total_valor,
                        ];
                    });

                return view('app.laboratorio.lab_profesional.estadisticas_tratamientos', [
                    'mis_tratamientos' => $mis_tratamientos,
                ]);
            }else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);

                $mis_tratamientos = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                    ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                    ->join('procedimientos_centro', 'horas_medicas.id_procedimiento', '=', 'procedimientos_centro.id')
                    ->select('horas_medicas.id_procedimiento')
                    ->selectRaw('COUNT(*) as cantidad')
                    ->selectRaw('SUM(procedimientos_centro.valor) as total_valor')
                    ->selectRaw('procedimientos_centro.nombre as nombre_procedimiento')
                    ->groupBy('horas_medicas.id_procedimiento', 'procedimientos_centro.nombre')
                    ->get()
                    ->map(function($item) {
                        return [
                            'procedimiento' => $item->nombre_procedimiento ?? 'Sin procedimiento',
                            'cantidad' => $item->cantidad,
                            'total_valor' => $item->total_valor,
                        ];
                    });

                return view('app.laboratorio.lab_profesional.estadisticas_tratamientos',[
                    'mis_tratamientos' => $mis_tratamientos,
                ]);
            }

        }

        if($tipo_estadistica == 'productos'){
            $profesional = Profesional::find($id_profesional);
            if($profesional){
                // Lógica para estadísticas de productos
                $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                                ->with('Producto')
                                ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->get();
                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio;
                }

                return view('app.laboratorio.lab_profesional.estadisticas_productos',[
                    'productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                ]);
            }else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);
                $mis_ventas = MisProducto::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                                ->with('Producto')
                                ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->get();

                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    $cantidad = $venta['stock']; // Asegúrate que 'stock' es el campo correcto de cantidad vendida
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'cantidad' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio * $cantidad;
                    $productos[$nombre]['cantidad'] += $cantidad;
                }

                return view('app.laboratorio.lab_profesional.estadisticas_productos',[
                    'productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                ]);
            }

        }

        if($tipo_estadistica == 'comisiones_liquidacion_profesional'){
            $profesional = Profesional::find($request->id_profesional);
            $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
            $horas_medicas = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();

            $profesional_convenio = ProfesionalInstitucionConvenio::where('id_profesional', $profesional->id)
                                    ->where('id_institucion', $laboratorio->id)
                                    ->first();

            $porcentaje = $profesional_convenio ? $profesional_convenio->atencion : 10;

            $total_valor = $horas_medicas->sum('valor');

            $total_valor_convenio = $total_valor * ($porcentaje / 100);

            $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                    ->with('Producto')
                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get();

            $productos = [];
            foreach ($mis_ventas as $venta) {
                $nombre = $venta['producto']['nombre'];
                $precio = $venta['producto']['precio_venta'];
                if (!isset($productos[$nombre])) {
                    $productos[$nombre] = [
                        'total' => 0,
                        'color' => null, // puedes asignar colores aquí si quieres
                    ];
                }
                $productos[$nombre]['total'] += $precio;
            }

            $total_Valor_productos = array_sum(array_column($productos, 'total'));

            $bonos = Bono::where('id_profesional', $profesional->id)
                        ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                        ->get();

            return ['horas_medicas' => $horas_medicas,
                'total_valor' => $total_valor,
                'total_valor_convenio' => $total_valor_convenio,
                'productos' => $productos,
                'mis_ventas' => $mis_ventas,
                'porcentaje' => $porcentaje,
                'total_Valor_productos' => $total_Valor_productos,
                'bonos' => $bonos,
            ];
        }

        if($tipo_estadistica == 'comisiones'){
            $profesional = Profesional::find($id_profesional);
            $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if($profesional){
                $horas_medicas = HoraMedica::where('horas_medicas.id_profesional', $id_profesional)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();


                $profesional_convenio = ProfesionalInstitucionConvenio::where('id_profesional', $profesional->id)
                                        ->where('id_institucion', $laboratorio->id)
                                        ->first();

                $porcentaje = $profesional_convenio ? $profesional_convenio->fijo : 10;

                $total_valor = $horas_medicas->sum('valor');

                $total_valor_convenio = $total_valor * ($porcentaje / 100);

                $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                        ->with('Producto')
                        ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                        ->get();

                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio;
                }

                $total_Valor_productos = array_sum(array_column($productos, 'total'));

                return view('app.laboratorio.lab_profesional.estadisticas_comisiones',[
                    'horas_medicas' => $horas_medicas,
                    'total_valor' => $total_valor,
                    'total_valor_convenio' => $total_valor_convenio,
                    'productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                    'porcentaje' => $porcentaje,
                    'total_Valor_productos' => $total_Valor_productos,
                ]);
            }else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                $horas_medicas = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();

                $total_valor = $horas_medicas->sum('valor');

                $mis_ventas = MisProducto::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                        ->with('Producto')
                        ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                        ->get();

                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio;
                }
                $total_Valor_productos = array_sum(array_column($productos, 'total'));
                return view('app.laboratorio.lab_profesional.estadisticas_comisiones',[
                    'horas_medicas' => $horas_medicas,
                    'total_valor' => $total_valor,
                    'productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                    'total_Valor_productos' => $total_Valor_productos,
                ]);
            }

        }

        if($tipo_estadistica == "comisiones_liquidacion_profesional_venta_prod"){
            $profesional = Profesional::find($request->id_profesional);

            $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();

            $profesional_convenio = ProfesionalInstitucionConvenio::where('id_profesional', $profesional->id)
                                    ->where('id_institucion', $laboratorio->id)
                                    ->first();


            $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                        ->with('Producto')
                        ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                        ->get();

            $productos = [];
            $total = 0;
            foreach ($mis_ventas as $venta) {
                $nombre = $venta['producto']['nombre'];
                $precio = $venta['producto']['precio_venta'];
                if (!isset($productos[$nombre])) {
                    $productos[$nombre] = [
                        'total' => 0,
                        'color' => null, // puedes asignar colores aquí si quieres
                    ];

                }
                $productos[$nombre]['total'] += $precio;
                 $total += $precio;
            }

            $total_a_pagar = $total * (($profesional_convenio->ventas ?? 10) / 100);

            return ['productos' => $productos,
                    'mis_ventas' => $mis_ventas,
                    'total_valor' => $total,
                    'total_a_pagar' => $total_a_pagar,
                    'porcentaje' => $profesional_convenio->ventas ?? 10,
            ];
        }

        if($tipo_estadistica == 'bonos'){
            $profesional = Profesional::find($id_profesional);
            $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
            if($profesional){

                $bonos_utilizados = Bono::where('id_profesional', $id_profesional)
                                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                    ->get();

                // $bonos_utilizados = Bono::join('horas_medicas', 'bonos.id_referencia', '=', 'horas_medicas.id')
                //     ->where('bonos.id_profesional', $id_profesional)
                //     ->where('horas_medicas.id_lugar_atencion', $laboratorio->id_lugar_atencion)
                //     ->whereBetween('bonos.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                //     ->get(['bonos.*']);

                $total_bonos = $bonos_utilizados->sum('monto');

                return view('app.laboratorio.lab_profesional.estadisticas_bonos',[
                    'bonos_utilizados' => $bonos_utilizados,
                    'total_bonos' => $total_bonos,
                    ''
                ]);
            }else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);

                $bonos_utilizados = Bono::join('horas_medicas', 'bonos.id_referencia', '=', 'horas_medicas.id')
                    ->whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                    ->whereBetween('bonos.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get(['bonos.*']);

                $total_bonos = $bonos_utilizados->sum('monto');

                return view('app.laboratorio.lab_profesional.estadisticas_bonos',[
                    'bonos_utilizados' => $bonos_utilizados,
                    'total_bonos' => $total_bonos,
                ]);
            }


        }

        if($tipo_estadistica == 'agenda'){
            $profesional = Profesional::find($id_profesional);
            $institucion = Instituciones::find($request->id_institucion);
            if(!$institucion){
                $institucion = Sucursal::find($request->id_sucursal);
            }
            if($profesional){
                $horas_medicas = HoraMedica::where('horas_medicas.id_profesional', $id_profesional)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->where('horas_medicas.id_lugar_atencion', $institucion->id_lugar_atencion)
                                ->with('Estado')
                                ->get();

                $cantidad_citas_rechazadas = $horas_medicas->where('id_estado', 4)->count();
                $cantidad_citas_canceladas = $horas_medicas->where('id_estado', 3)->count();
                $cantidad_citas_realizadas = $horas_medicas->where('id_estado', 6)->count();
                $cantidad_citas_agendadas = $horas_medicas->where('id_estado', 1)->count();

                return view('app.laboratorio.lab_profesional.estadisticas_agenda',[
                    'horas_medicas' => $horas_medicas,
                    'cantidad_citas_rechazadas' => $cantidad_citas_rechazadas,
                    'cantidad_citas_canceladas' => $cantidad_citas_canceladas,
                    'cantidad_citas_realizadas' => $cantidad_citas_realizadas,
                    'cantidad_citas_agendadas' => $cantidad_citas_agendadas,
                ]);
            }else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);

                $horas_medicas = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->with('Estado')
                                ->get();

                $cantidad_citas_rechazadas = $horas_medicas->where('id_estado', 4)->count();
                $cantidad_citas_canceladas = $horas_medicas->where('id_estado', 3)->count();
                $cantidad_citas_realizadas = $horas_medicas->where('id_estado', 6)->count();
                $cantidad_citas_agendadas = $horas_medicas->where('id_estado', 1)->count();

                return view('app.laboratorio.lab_profesional.estadisticas_agenda',[
                    'horas_medicas' => $horas_medicas,
                    'cantidad_citas_rechazadas' => $cantidad_citas_rechazadas,
                    'cantidad_citas_canceladas' => $cantidad_citas_canceladas,
                    'cantidad_citas_realizadas' => $cantidad_citas_realizadas,
                    'cantidad_citas_agendadas' => $cantidad_citas_agendadas,
                ]);
            }


        }

        if($tipo_estadistica == 'pacientes'){

            $profesional = Profesional::find($id_profesional);

            if($profesional){
                $mis_pacientes = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });
            }
            else{
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                $mis_pacientes = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                // ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });
            }


            return view('app.laboratorio.lab_profesional.estadisticas_pacientes',[
                'mis_pacientes' => $mis_pacientes,
            ]);
        }

        if($tipo_estadistica == 'gastos'){
            $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
            $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
            array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);
            $gastos = GastosInstitucionales::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get();

            return view('app.laboratorio.lab_profesional.estadisticas_gastos',[
                'gastos' => $gastos,
            ]);
        }

        if($tipo_estadistica == 'comparativo'){
            if(!$id_institucion){
                // Obtener los lugares de atención de la institución
                $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
                $lugares_atencion_institucion = Sucursal::where('id_institucion', $laboratorio->id)->pluck('id_lugar_atencion')->toArray();
                array_push($lugares_atencion_institucion, LugarAtencion::where('id', $laboratorio->id_lugar_atencion)->first()->id);

                // Ingresos (ventas)
                $mis_ventas = MisProducto::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                    ->with('Producto')
                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get();

                // atenciones
                $horas_medicas = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();

                $total_atenciones = 0;
                foreach($horas_medicas as $hora_medica) {
                    $total_atenciones += $hora_medica->valor;
                }

                $total_ingresos = 0;
                foreach ($mis_ventas as $venta) {
                    $precio = $venta['producto']['precio_venta'];
                    $total_ingresos += $precio;
                }

                $total_ingresos += $total_atenciones;

                // Gastos
                $gastos = GastosInstitucionales::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get();

                $total_gastos = $gastos->sum('monto'); // Asegúrate que el campo sea 'monto' o el que corresponda

                return view('app.laboratorio.lab_profesional.estadisticas_comparativa', [
                    'total_ingresos' => $total_ingresos,
                    'total_gastos' => $total_gastos,
                    'mis_ventas' => $mis_ventas,
                    'gastos' => $gastos,
                ]);
            }else{
                $laboratorio = Sucursal::where('id', $id_institucion)->first();
                $lugares_atencion_institucion = [$laboratorio->id_lugar_atencion];
                // Ingresos (ventas)
                $mis_ventas = MisProducto::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                    ->with('Producto')
                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get();
                // atenciones
                $horas_medicas = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();
                $total_atenciones = 0;
                foreach($horas_medicas as $hora_medica) {
                    $total_atenciones += $hora_medica->valor;
                }
                $total_ingresos = 0;
                foreach ($mis_ventas as $venta) {
                    $precio = $venta['producto']['precio_venta'];
                    $total_ingresos += $precio;
                }
                $total_ingresos += $total_atenciones;
                // Gastos
                $gastos = GastosInstitucionales::whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->get();
                $total_gastos = $gastos->sum('monto'); // Asegúrate que el campo sea 'monto' o el que corresponda
                return view('app.laboratorio.lab_profesional.estadisticas_comparativa', [
                    'total_ingresos' => $total_ingresos,
                    'total_gastos' => $total_gastos,
                    'mis_ventas' => $mis_ventas,
                    'gastos' => $gastos,
                ]);
            }

        }

        $sucursal = Sucursal::find($id_sucursal);

        $institucion = Instituciones::find($id_institucion);

        if(!$institucion && !$sucursal){
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                            ->with('Producto')
                            ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                            ->get();
            $productos = [];
            foreach ($mis_ventas as $venta) {
                $nombre = $venta['producto']['nombre'];
                $precio = $venta['producto']['precio_venta'];
                if (!isset($productos[$nombre])) {
                    $productos[$nombre] = [
                        'total' => 0,
                        'color' => null, // puedes asignar colores aquí si quieres
                    ];
                }
                $productos[$nombre]['total'] += $precio;
            }


            $mis_pacientes = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });

                $mis_pacientes_atendiendo = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 5) // solo horas atendiendose
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });
                $mis_pacientes_agendados = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 1) // solo horas agendadas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });
                $mis_pacientes_cancelados = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 3) // solo horas canceladas
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                    ];
                });
            return view('app.laboratorio.lab_profesional.estadisticas_resultado',[
                'productos' => $productos,
                'mis_ventas' => $mis_ventas,
                'mis_pacientes' => $mis_pacientes,
                'mis_pacientes_atendiendo' => $mis_pacientes_atendiendo,
                'mis_pacientes_agendados' => $mis_pacientes_agendados,
                'mis_pacientes_cancelados' => $mis_pacientes_cancelados,
            ]);
        }

        if(!$institucion){
            return redirect()->route('laboratorio.adm_general.home')->with('error','Institución no encontrada');
        }else{
            $sucursales_institucion = Sucursal::where('id_institucion', $institucion->id)->get();
            $lugares_atencion_institucion = $sucursales_institucion->pluck('id_lugar_atencion')->toArray();
        }

        if($sucursal){
            $lugares_atencion_institucion = [$sucursal->id_lugar_atencion];
        }

        $mis_ventas = MisProducto::where('id_profesional', $id_profesional)
                        ->whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                        ->with('Producto')
                        ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                        ->get();

        $productos = [];
        foreach ($mis_ventas as $venta) {
            $nombre = $venta['producto']['nombre'];
            $precio = $venta['producto']['precio_venta'];
            if (!isset($productos[$nombre])) {
                $productos[$nombre] = [
                    'total' => 0,
                    'color' => null, // puedes asignar colores aquí si quieres
                ];
            }
            $productos[$nombre]['total'] += $precio;
        }

        $mis_pacientes = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
            ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
            ->where('horas_medicas.id_estado', 6) // solo horas realizadas
            ->where('horas_medicas.id_profesional', $id_profesional)
            ->select('horas_medicas.id_profesional')
            ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
            ->groupBy('horas_medicas.id_profesional')
            ->with('Profesional')
            ->get()
            ->map(function($item) {
                return [
                    'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                    'cantidad_pacientes' => $item->cantidad_pacientes,
                ];
            });

            $mis_pacientes_atendiendo = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
            ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
            ->where('horas_medicas.id_estado', 5) // solo horas atendiendose
            ->where('horas_medicas.id_profesional', $id_profesional)
            ->select('horas_medicas.id_profesional')
            ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
            ->groupBy('horas_medicas.id_profesional')
            ->with('Profesional')
            ->get()
            ->map(function($item) {
                return [
                    'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                    'cantidad_pacientes' => $item->cantidad_pacientes,
                ];
            });

            $mis_pacientes_agendados = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
            ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
            ->where('horas_medicas.id_estado', 1) // solo horas agendadas
            ->where('horas_medicas.id_profesional', $id_profesional)
            ->select('horas_medicas.id_profesional')
            ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
            ->groupBy('horas_medicas.id_profesional')
            ->with('Profesional')
            ->get()
            ->map(function($item) {
                return [
                    'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                    'cantidad_pacientes' => $item->cantidad_pacientes,
                ];
            });

           $mis_pacientes_cancelados = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
            ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
            ->where('horas_medicas.id_estado', 3) // solo horas canceladas
            ->where('horas_medicas.id_profesional', $id_profesional)
            ->select('horas_medicas.id_profesional')
            ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
            ->groupBy('horas_medicas.id_profesional')
            ->with('Profesional')
            ->get()
            ->map(function($item) {
                return [
                    'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                    'cantidad_pacientes' => $item->cantidad_pacientes,
                ];
            });

            $mis_profesionales_horas_trabajadas = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                ->where('horas_medicas.id_profesional', $id_profesional)
                ->select('horas_medicas.id_profesional')
                ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                ->selectRaw('SUM(TIMESTAMPDIFF(MINUTE, horas_medicas.hora_inicio, horas_medicas.hora_termino)) as minutos_trabajados')
                ->groupBy('horas_medicas.id_profesional')
                ->with('Profesional')
                ->get()
                ->map(function($item) {
                    $horas = intdiv((int)$item->minutos_trabajados, 60);
                    $minutos = (int)$item->minutos_trabajados % 60;
                    $horas_trabajadas = sprintf('%02d:%02d', $horas, $minutos);
                    return [
                        'profesional' => $item->Profesional ? $item->Profesional->nombre . ' ' . $item->Profesional->apellido_uno : 'Profesional no encontrado',
                        'cantidad_pacientes' => $item->cantidad_pacientes,
                        'horas_trabajadas' => $horas_trabajadas,
                        'minutos_trabajados' => $item->minutos_trabajados,
                    ];
                });

                // Agrupar y contar pacientes por tipo de procedencia
                $pacientes_por_procedencia = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                    ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                    ->where('horas_medicas.id_estado', 6) // solo horas realizadas
                    ->where('horas_medicas.id_profesional', $id_profesional)
                    ->select('horas_medicas.id_procedencia_paciente')
                    ->selectRaw('COUNT(DISTINCT horas_medicas.id_paciente) as cantidad_pacientes')
                    ->groupBy('horas_medicas.id_procedencia_paciente')
                    ->get();


        return view('app.laboratorio.lab_profesional.estadisticas_resultado',[
            'institucion' => $institucion,
            'mis_ventas' => $mis_ventas,
            'mis_pacientes' => $mis_pacientes,
            'mis_pacientes_atendiendo' => $mis_pacientes_atendiendo,
            'mis_pacientes_agendados' => $mis_pacientes_agendados,
            'mis_pacientes_cancelados' => $mis_pacientes_cancelados,
            'mis_profesionales_horas_trabajadas' => $mis_profesionales_horas_trabajadas,
            'pacientes_por_procedencia' => $pacientes_por_procedencia,
        ]);
    }

    public function estadisticasBuscarRemuneraciones(Request $request){
        try {

            $fecha_inicio = $request->fecha_inicio;
            $fecha_fin = $request->fecha_fin;
            $id_institucion = $request->id_institucion;
            $id_sucursal = $request->id_sucursal ?? null;
            $id_profesional = $request->id_profesional ?? null;

            $sucursal = Sucursal::find($id_sucursal);

            $institucion = Instituciones::find($id_institucion);

            if(!$institucion && !$sucursal){

                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
                $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();
                $total_valor = $horas_medicas->sum('valor');
                return view('app.laboratorio.lab_profesional.estadisticas_resultado_remuneraciones',[
                                'institucion' => $institucion,
                                'horas_medicas' => $horas_medicas,
                                'total_valor' => $total_valor,
                            ]);
            }else{
                if(!$institucion){
                    return redirect()->route('laboratorio.adm_general.home')->with('error','Institución no encontrada');
                }else{
                    $sucursales_institucion = Sucursal::where('id_institucion', $institucion->id)->get();
                    $lugares_atencion_institucion = $sucursales_institucion->pluck('id_lugar_atencion')->toArray();
                }

                if($sucursal){
                    $lugares_atencion_institucion = [$sucursal->id_lugar_atencion];
                }

                $sucursales_institucion = Sucursal::whereIn('id_lugar_atencion', $lugares_atencion_institucion)->get();
                $nombres_sucursales = $sucursales_institucion->pluck('nombre')->toArray();

                if($id_profesional == null){
                    $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
                    $id_profesional = $profesional->id;
                }

                $horas_medicas = HoraMedica::whereIn('horas_medicas.id_lugar_atencion', $lugares_atencion_institucion)
                                ->where('horas_medicas.id_profesional', $id_profesional)
                                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();

                $total_valor = $horas_medicas->sum('valor');

                $mis_ventas = MisProducto::where('id_profesional', $id_profesional)
                        ->whereIn('id_lugar_atencion', $lugares_atencion_institucion)
                        ->with('Producto')
                        ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                        ->get();

                $productos = [];
                foreach ($mis_ventas as $venta) {
                    $nombre = $venta['producto']['nombre'];
                    $precio = $venta['producto']['precio_venta'];
                    if (!isset($productos[$nombre])) {
                        $productos[$nombre] = [
                            'total' => 0,
                            'color' => null, // puedes asignar colores aquí si quieres
                        ];
                    }
                    $productos[$nombre]['total'] += $precio;
                }

                return view('app.laboratorio.lab_profesional.estadisticas_resultado_remuneraciones',[
                    'institucion' => $institucion,
                    'horas_medicas' => $horas_medicas,
                    'total_valor' => $total_valor,
                    'nombres_sucursales' => $nombres_sucursales,
                    'mis_ventas' => $mis_ventas,
                    'productos' => $productos,
                ]);
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function finalizar_contrato(Request $request){
        try {

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
            $profesional = Profesional::where('id', $request->id_empleado)->first();
            $sucursales = Sucursal::where('id_institucion', $institucion->id)->get();
            $LugaresAtencion = array();
            foreach ($sucursales as $key_suc => $value_suc){
                $lugar_atencion_suc = LugarAtencion::where('id', $value_suc->id_lugar_atencion)->first();
                if($lugar_atencion_suc){
                    array_push($LugaresAtencion, $lugar_atencion_suc);
                }
            }
            // se agrega el id lugar atencion de la institucion
            array_push($LugaresAtencion, LugarAtencion::where('id', $institucion->id_lugar_atencion)->first());

            $profesional_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)
                                            ->whereIn('id_lugar_atencion', array_column($LugaresAtencion, 'id'))
                                            ->first();
            $profesional_convenio = ProfesionalInstitucionConvenio::where('id_profesional', $profesional->id)
                                        ->where('id_institucion', $institucion->id)
                                        ->first();

            if($profesional_lugar_atencion->delete()){
                $datos['estado'] = 1;
                $datos['mensaje'] = 'Contrato finalizado correctamente';
            }else{
                $datos['estado'] = 0;
                $datos['mensaje'] = 'Error al finalizar contrato';
            }

            if($profesional_convenio){
                $profesional_convenio->delete();
            }

            return $datos;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function guardarAudifonoExterno(Request $request){
        return $request;
    }

    public function mi_horario_lab_agregar(Request $request){

        $laboratorio = Sucursal::find($request->id_lab);
        $institucion = Instituciones::find($laboratorio->id_institucion);
        $hora_inicio = Carbon::parse($request->hora_inicio . ':01')->format('H:i:s');
        $hora_termino = Carbon::parse($request->hora_termino . ':00')->format('H:i:s');

        $validate = SucursalHorario::where('id_sucursal', $laboratorio->id)
            ->where('dia', 'like', "%$request->dia%")
            ->whereRaw("(? BETWEEN hora_inicio AND hora_termino OR ? BETWEEN hora_inicio AND hora_termino)", [$hora_inicio, $hora_termino])
            ->get();


        if (count($validate) > 0) {
            return 'Failed';
        }

        $horario = SucursalHorario::where('hora_inicio', $hora_inicio)
            ->where('hora_termino', $hora_termino)
            ->where('duracion_consulta', $request->duracion)
            ->where('id_sucursal', $laboratorio->id)
            ->first();



        if (isset($horario->id)) {
            $horario->dia = $horario->dia . ',' . $request->dia;
        } else {

            $horario = new SucursalHorario();
            $horario->id_institucion = $institucion->id;
            $horario->hora_inicio = $hora_inicio;
            $horario->hora_termino = $hora_termino;
            $horario->dia = $request->dia;
            $horario->duracion_consulta = $request->duracion;
            $horario->id_sucursal = $laboratorio->id;
            $horario->id_lugar_atencion = $laboratorio->id_lugar_atencion;
            $horario->tipo_Agenda = (int) $request->tipo_agenda_medica;
        }
        if (!$horario->save()) {
            return 'error';
        }

        return json_encode($horario);
    }

    public function mi_horario_lab(Request $request)
    {
        $laboratorio = Sucursal::where('id', $request->id_lab)->first();
        $id_lugar_atencion = $laboratorio->id_lugar_atencion;
        $horario = SucursalHorario::where('id_sucursal', $laboratorio->id)->where('id_lugar_atencion', $id_lugar_atencion)->get();

        return json_encode($horario);
    }

    public function areaVentaAudifonos(){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
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
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    $registro = Laboratorio::where('id_usuario',Auth::user()->id)->first();
                    $responsable = AdminInstServ::where('id_admin',3)->first();

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
        $permisos = PermisoProfesional::where('id_profesional', $profesional->id)->get();
        $regiones = Region::all();
        $prevision = Prevision::all();

         return view('app.laboratorio.escritorio_venta_audifonos', [
             'profesional' => $registro,
             'permisos' => $permisos,
             'regiones' => $regiones,
             'prevision' => $prevision
         ]);
    }

    public function examenVPPB(Request $request){
        try {
            $id_ficha = $request->ficha_id;
            $tipo_tto = $request->tipo_tto;
            $observaciones = $request->observaciones;
            $hora_medica = $request->hora_id;

            $hora = HoraMedica::find($hora_medica);
            $paciente = Paciente::find($hora->id_paciente);
            $profesional = Profesional::find($hora->id_profesional);
            $lugar_atencion = LugarAtencion::find($hora->id_lugar_atencion);

        $pdf = PDF::loadView('app.laboratorio.pdf.vppb', compact(
            'id_ficha',
            'tipo_tto',
            'observaciones',
            'hora',
            'paciente',
            'profesional',
            'lugar_atencion'
            ));
            $timestamp = time();

            // Crear directorio si no existe
            $directorio = public_path('laboratorio/pdf/');
            if (!file_exists($directorio)) {
                mkdir($directorio, 0755, true);
            }

            // Guardar el PDF en la carpeta public
            $fileName = 'examen_vppb_' . $id_ficha . '_'. $timestamp .'.pdf';

            $filePath = $directorio . $fileName;

            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['estado'=>1, 'ruta' => asset('laboratorio/pdf/' . $fileName)]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['estado'=>0,'error' => 'Error al generar el PDF: ' . $e->getMessage()], 500);
        }

    }

    public function examenTerapiaVoz(Request $request){
        try {
            $id_ficha = $request->ficha_id;
            $observaciones = $request->observaciones;
            $id_paciente = $request->id_paciente;
            $id_profesional = $request->id_profesional;
            $tipo_examen = $request->examen;
            if($tipo_examen == 'vppb'){
                $titulo = 'Informe de Tratamiento VPPB';
                $sesiones = TratamientoVppb::where('id_ficha', $id_ficha)
                            ->orderBy('numero_sesion', 'asc')
                            // ->where('estado', 1)
                            ->get();
            }else{
                $titulo = 'Informe de Terapia de Voz';
                $sesiones = TerapiaVoz::where('id_ficha', $id_ficha)
                            ->orderBy('numero_sesion', 'asc')
                            // ->where('estado', 1)
                            ->get();
            }

            // USAR EXACTAMENTE EL MISMO MÉTODO QUE COTIZACIONCONTROLLER
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('app.laboratorio.pdf.terapia_voz', compact(
                'id_ficha',
                'observaciones',
                'tipo_examen',
                'titulo',
                'sesiones'
            ));

            $timestamp = time();
            $filename = 'informe_terapia_voz_' . $id_ficha . '_' . $timestamp . '.pdf';
            $path = 'public/laboratorio/pdf/' . $filename;

            $paciente = Paciente::find($id_paciente);
            $profesional = Profesional::find($id_profesional);

            // Crear directorio si no existe
            $directorio = storage_path('app/public/laboratorio/pdf/');
            if (!file_exists($directorio)) {
                mkdir($directorio, 0755, true);
            }

            // Usar Storage::put() exactamente como en CotizacionController
            \Storage::put($path, $pdf->output());

            // Devolver la URL pública usando Storage::url()
            return response()->json([
                'estado' => 1,
                'mensaje' => 'PDF generado exitosamente',
                'ruta' => \Storage::url($path)
            ]);        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'error' => 'Error al generar el PDF: ' . $e->getMessage(),
                'linea' => $e->getLine(),
                'archivo' => $e->getFile()
            ], 500);
        }
    }

    public function guardarTerapiaVoz(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_ficha' => 'required|integer',
                'id_lugar_atencion' => 'required|integer',
                'id_profesional' => 'required|integer',
                'id_paciente' => 'required|integer',
                'numero_sesion' => 'required|integer',
                'tipo_terapia' => 'required|string',
                'comentarios' => 'required|string',
            ]);
            // verificar si ya existe un registro para la misma ficha y numero de sesion
            $existingRecord = TerapiaVoz::where('id_ficha', $request->id_ficha)
                                        ->where('numero_sesion', $request->numero_sesion)
                                        ->first();

            if ($existingRecord) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Ya existe un registro para esta ficha y número de sesión'
                ], 400);
            }
            $terapiaVoz = TerapiaVoz::create($validatedData);

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Observaciones de terapia de voz guardadas exitosamente',
                'data' => $terapiaVoz
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar las observaciones: ' . $e->getMessage()
            ], 500);
        }
    }

    public function dameSesionesTerapiaVoz(Request $request){
        try {

            $id_ficha = $request->id_ficha;

            $sesiones = TerapiaVoz::where('id_ficha', $id_ficha)
                        ->orderBy('numero_sesion', 'asc')
                        // ->where('estado', 1)
                        ->with('profesional')
                        ->get();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Sesiones obtenidas exitosamente',
                'data' => $sesiones
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener las sesiones: ' . $e->getMessage()
            ], 500);
        }
    }

    public function dameSesionesVPPB(Request $request){
        try {

            $id_ficha = $request->id_ficha;

            $sesiones = TratamientoVppb::where('id_ficha', $id_ficha)
                        ->orderBy('numero_sesion', 'asc')
                        // ->where('estado', 1)
                        ->with('profesional')
                        ->get();



            return response()->json([
                'estado' => 1,
                'mensaje' => 'Sesiones obtenidas exitosamente',
                'data' => $sesiones
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener las sesiones: ' . $e->getMessage()
            ], 500);
        }
    }

    public function guardarExamenAudicion(Request $request){
        return $request->all();
    }

    public function examenInformeVPPB(Request $request){
        return $request->all();
    }

    public function eliminarRegistroTerapiaVoz(Request $request)
    {
        try {
            $id = $request->id;

            $registro = TerapiaVoz::find($id);

            if (!$registro) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Registro no encontrado'
                ], 404);
            }

            $registro->delete();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Registro eliminado exitosamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al eliminar el registro: ' . $e->getMessage()
            ], 500);
        }
    }

    public function guardarVPPB(Request $request){
        try {
            $validatedData = $request->validate([
                'id_ficha' => 'required|integer',
                'id_lugar_atencion' => 'required|integer',
                'id_profesional' => 'required|integer',
                'id_paciente' => 'required|integer',
                'numero_sesion' => 'required|integer',
                'tipo_terapia' => 'required|string',
                'comentarios' => 'required|string',
            ]);

            // Verificar si ya existe un registro para la misma ficha y numero de sesion
            $existingRecord = TratamientoVppb::where('id_ficha', $request->id_ficha)
                                            ->where('numero_sesion', $request->numero_sesion)
                                            ->where('estado',1)
                                            ->first();

            if ($existingRecord) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Ya existe un registro para esta ficha y número de sesión'
                ], 400);
            }

            $tratamientoVppb = TratamientoVppb::create($validatedData);

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Tratamiento VPPB guardado exitosamente',
                'data' => $tratamientoVppb
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar el tratamiento VPPB: ' . $e->getMessage()
            ], 500);
        }
    }

    public function buscarProductosAudifonos(Request $request)
    {
        try {

            $termino = $request->input('termino', '');
            $tipo_producto = $request->input('tipo_producto', '');
            $id_lugar_atencion = $request->input('id_lugar_atencion', '');

            // Si tipo_producto es 0, buscar en ProcedimientosCentro
            if ($tipo_producto == '0') {
                $sucursal = Sucursal::where('id_lugar_atencion', $id_lugar_atencion)->first();

                if($sucursal){
                    $institucion = Instituciones::find($sucursal->id_institucion);
                    $query = ProcedimientosCentro::where('id_lugar_atencion', $institucion->id_lugar_atencion);

                    // Buscar por término en procedimientos
                    if (!empty($termino)) {
                        $query->where(function($q) use ($termino) {
                            $q->where('nombre', 'like', '%' . $termino . '%')
                            ->orWhere('descripcion', 'like', '%' . $termino . '%');
                        });
                    }

                    $procedimientos = $query->orderBy('nombre', 'asc')
                                    ->limit(50)
                                    ->get()
                                    ->map(function($procedimiento) {
                                        return [
                                            'id' => $procedimiento->id,
                                            'codigo_interno' => $procedimiento->id ?? 'N/A',
                                            'nombre' => $procedimiento->nombre,
                                            'stock_minimo' => 0,
                                            'stock_maximo' => 0,
                                            'stock_actual' => 999, // Procedimientos siempre disponibles
                                            'precio_venta' => $procedimiento->valor ?? 0,
                                            'precio_compra' => 0,
                                            'imagen' => null,
                                            'descripcion' => $procedimiento->descripcion ?? '',
                                            'image_path' => 'images/paciente.png',
                                            'observaciones' => '',
                                            'tipo_producto' => 'Procedimiento',
                                            'marca' => 'N/A',
                                            'es_procedimiento' => true,
                                        ];
                                    });

                    return response()->json([
                        'estado' => 1,
                        'mensaje' => 'Búsqueda exitosa',
                        'productos' => $procedimientos,
                        'total' => $procedimientos->count()
                    ]);
                }else{
                    $institucion = Instituciones::where('id_lugar_atencion', $id_lugar_atencion)->first();

                    $query = ProcedimientosCentro::where('id_lugar_atencion', $institucion->id_lugar_atencion);
                    // Buscar por término en procedimientos
                    if (!empty($termino)) {
                        $query->where(function($q) use ($termino) {
                            $q->where('nombre', 'like', '%' . $termino . '%')
                            ->orWhere('descripcion', 'like', '%' . $termino . '%');
                        });
                    }
                    $procedimientos = $query->orderBy('nombre', 'asc')
                                    ->limit(50)
                                    ->get()
                                    ->map(function($procedimiento) {
                                        return [
                                            'id' => $procedimiento->id,
                                            'codigo_interno' => $procedimiento->id ?? 'N/A',
                                            'nombre' => $procedimiento->nombre,
                                            'stock_minimo' => 0,
                                            'stock_maximo' => 0,
                                            'stock_actual' => 999, // Procedimientos siempre disponibles
                                            'precio_venta' => $procedimiento->valor ?? 0,
                                            'precio_compra' => 0,
                                            'imagen' => null,
                                            'descripcion' => $procedimiento->descripcion ?? '',
                                            'image_path' => 'images/paciente.png',
                                            'observaciones' => '',
                                            'tipo_producto' => 'Procedimiento',
                                            'marca' => 'N/A',
                                            'es_procedimiento' => true,
                                        ];
                                    });

                    return response()->json([
                        'estado' => 1,
                        'mensaje' => 'Búsqueda exitosa',
                        'productos' => $procedimientos,
                        'total' => $procedimientos->count()
                    ]);
                }

            }

            // Si no es 0, buscar productos normalmente
            $query = Producto::with(['tipoProducto', 'marca', 'bodega']);

            // Filtrar por bodegas del lugar de atención
            if (!empty($id_lugar_atencion)) {
                $lugar_atencion = LugarAtencion::find($id_lugar_atencion);
                $institucion = Instituciones::where('id_lugar_atencion', $id_lugar_atencion)->first();
                $bodegas_ids = Bodega::where('id_institucion', $institucion->id)
                                     ->pluck('id')
                                     ->toArray();

                if (!empty($bodegas_ids)) {
                    $query->whereIn('id_bodega', $bodegas_ids);
                } else {
                    // Si no hay bodegas asignadas, retornar vacío
                    return response()->json([
                        'estado' => 1,
                        'mensaje' => 'No hay bodegas asignadas a este lugar de atención',
                        'productos' => [],
                        'total' => 0
                    ]);
                }
            }

            // Filtrar por tipo
            if (!empty($tipo_producto)) {
                $query->tipoProducto($tipo_producto);
            } else {
                $query->whereIn('id_tipo_producto', [9]);
            }

            // Buscar por término
            if (!empty($termino)) {
                $query->buscar($termino);
            }

            $productos = $query->orderBy('nombre', 'asc')
                            ->limit(50)
                            ->get()
                            ->map(function($producto) {
                                return [
                                    'id' => $producto->id,
                                    'codigo_interno' => $producto->codigo_interno,
                                    'nombre' => $producto->nombre,
                                    'stock_minimo' => $producto->stock_minimo,
                                    'stock_maximo' => $producto->stock_maximo,
                                    'stock_actual' => $producto->stock_actual,
                                    'precio_venta' => $producto->precio_venta,
                                    'precio_compra' => $producto->precio_compra,
                                    'imagen' => $producto->imagen,
                                    'descripcion' => $producto->descripcion,
                                    'image_path' => $producto->image_path,
                                    'observaciones' => $producto->observaciones,
                                    'tipo_producto' => $producto->tipoProducto->nombre ?? 'N/A',
                                    'marca' => $producto->marca->nombre ?? 'N/A',
                                    'es_procedimiento' => false,
                                ];
                            });

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Búsqueda exitosa',
                'productos' => $productos,
                'total' => $productos->count()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error: ' . $e->getMessage(),
                'productos' => []
            ], 500);
        }
    }

    public function buscarProductosGeneral(Request $request){

        $institucion = Instituciones::find($request->id_institucion);
        $id_lugar_atencion = $institucion->id_lugar_atencion;

        $bodegas = Bodega::where('id_institucion', $institucion->id)->pluck('id')->toArray();

        // $productos = Producto::select(
        //         'productos.*',
        //         'tipo_producto.nombre as tipo_producto',
        //         'unidades_medidas.nombre as unidad_medida',
        //         'marcas_productos.nombre as marca',
        //         'bodega.nombre as bodega',
        //     )
        //     ->join('bodega', 'productos.id_bodega', 'bodega.id')
        //     ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
        //     ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
        //     ->leftJoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
        //     ->where('productos.nombre', 'like', '%' . $request->nombre . '%')
        //     ->get();

        $productos = Producto::select(
                'productos.codigo_interno',
                DB::raw('MAX(productos.id) as id'),
                DB::raw('MAX(productos.nombre) as nombre'),
                DB::raw('MAX(productos.descripcion) as descripcion'),
                DB::raw('MAX(productos.image_path) as image_path'),
                DB::raw('MAX(tipo_producto.nombre) as tipo_producto'),
                DB::raw('MAX(unidades_medidas.nombre) as unidad_medida'),
                DB::raw('MAX(marcas_productos.nombre) as marca'),
                DB::raw('SUM(productos.stock_actual) as stock_actual'),
                DB::raw('MAX(productos.image_path) as imagen_url'),
                DB::raw('MAX(bodega.nombre) as bodega')
            )
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->leftJoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->join('bodega', 'productos.id_bodega', 'bodega.id')
            ->where('productos.nombre', 'like', '%' . $request->nombre . '%')
            ->whereIn('productos.id_bodega', $bodegas)
            ->groupBy('productos.codigo_interno')
            ->get();

        return response()->json([
            'estado' => 1,
            'productos' => $productos,
            'bodegas' => $bodegas
        ]);
    }

    private function dameProductosLugarAtencion($id_lugar_atencion, $termino = null){
        $compras_detalle = CompraDetalle::whereHas('compra', function($q) use ($id_lugar_atencion){
            $q->where('id_lugar_atencion', $id_lugar_atencion);
        })->pluck('id_producto')->toArray();
    }

    public function detalleProductoBodegas(Request $req){
        $producto = Producto::find($req->id_producto);
        $productos = Producto::select('productos.*','bodega.nombre')
        ->join('bodega', 'productos.id_bodega', 'bodega.id')
        ->where('codigo_interno',$producto->codigo_interno)
        ->get();
        return ['bodegas' => $productos,'producto' => $producto];
    }

    public function traspasoProductosGuardar(Request $request){
        try {

            $producto = Producto::find($request->id_bodega_origen);

            $bodega_origen = Bodega::find($producto->id_bodega);
            $bodega_destino = Bodega::find($request->id_bodega_destino);
            // validar que el producto tenga stock suficiente
            if($producto->stock_actual < $request->cantidad){
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente en bodega origen. Stock actual: ' . $producto->stock_actual,
                ]);
            }

            $institucion = Instituciones::find($bodega_origen->id_institucion);

            $nuevo_traspaso = new TraspasoProducto();
            $nuevo_traspaso->fecha = Carbon::now();
            $nuevo_traspaso->id_lugar_atencion = $institucion->id_lugar_atencion;
            $nuevo_traspaso->id_institucion = $bodega_origen->id_institucion;
            $nuevo_traspaso->id_producto = $producto->id;
            $nuevo_traspaso->id_bodega_origen = $producto->id_bodega;
            $nuevo_traspaso->id_bodega_destino = $request->id_bodega_destino;
            $nuevo_traspaso->cantidad = $request->cantidad;
            $nuevo_traspaso->id_responsable = Auth::id();

            $nuevo_traspaso->save();

            $producto->stock_actual -= $request->cantidad;
            if($producto->stock_actual == 0){
                $producto->delete();
            } else {
                $producto->save();
            }

            // preguntar si el producto ya existe en la bodega destino
            $producto_destino = Producto::where('codigo_interno', $producto->codigo_interno)
                                    ->where('id_bodega', $request->id_bodega_destino)
                                    ->first();
            if($producto_destino){
                // actualizar stock del producto destino
                $producto_destino->stock_actual += $request->cantidad;
                $producto_destino->save();

                return response()->json([
                    'estado' => 1,
                    'mensaje' => 'Traspaso realizado con éxito',
                    'producto_origen' => $producto,
                    'producto_destino' => $producto_destino,
                    'bodega_origen' => $bodega_origen,
                    'bodega_destino' => $bodega_destino,
                ]);
            } else {
                // creamos el mismo producto pero con id_bodega sea id_bodega_destino
                $nuevo_producto = new Producto();
                $nuevo_producto->codigo_interno = $producto->codigo_interno;
                $nuevo_producto->nombre = $producto->nombre;
                $nuevo_producto->descripcion = $producto->descripcion;
                $nuevo_producto->imagen = $producto->imagen;
                $nuevo_producto->image_path = $producto->image_path;
                $nuevo_producto->id_tipo_producto = $producto->id_tipo_producto;
                $nuevo_producto->id_marca = $producto->id_marca;
                $nuevo_producto->id_unidad_medida = $producto->id_unidad_medida;
                $nuevo_producto->precio_compra = $producto->precio_compra;
                $nuevo_producto->precio_venta = $producto->precio_venta;
                $nuevo_producto->stock_minimo = $producto->stock_minimo;
                $nuevo_producto->stock_actual = $request->cantidad;
                $nuevo_producto->id_bodega = $request->id_bodega_destino;

                if($nuevo_producto->save()){
                    return response()->json([
                        'estado' => 1,
                        'mensaje' => 'Traspaso realizado con éxito',
                        'producto_origen' => $producto,
                        'producto_destino' => $nuevo_producto,
                        'bodega_origen' => $bodega_origen,
                        'bodega_destino' => $bodega_destino,
                    ]);
                }
            }

        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al realizar el traspaso: ' . $e->getMessage(),
            ]);
        }

    }

    public function rechazarProductosGuardar(Request $request){
        try {
            $producto = Producto::find($request->id_bodega_origen);

            $bodega_origen = Bodega::find($producto->id_bodega);
            $bodega_destino = Bodega::find($request->id_bodega_destino);
            // validar que el producto tenga stock suficiente
            if($producto->stock_actual < $request->cantidad){
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente en bodega origen. Stock actual: ' . $producto->stock_actual,
                ]);
            }

            $institucion = Instituciones::find($bodega_origen->id_institucion);

            $devolucion = new DevolucionProducto();
            $devolucion->fecha = Carbon::now();
            $devolucion->id_lugar_atencion = $institucion->id_lugar_atencion;
            $devolucion->id_institucion = $bodega_origen->id_institucion;
            $devolucion->id_producto = $producto->id;
            $devolucion->id_bodega_origen = $producto->id_bodega;
            $devolucion->cantidad = $request->cantidad_rechazo;
            $devolucion->id_responsable = Auth::id();

            $devolucion->save();

            $producto->stock_actual -= $request->cantidad_rechazo;
            if($producto->stock_actual == 0){
                $producto->estado = 0;
                $producto->save();
            } else {
                $producto->save();
            }

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Devolución realizada con éxito',
                'producto_origen' => $producto,
                'bodega_origen' => $bodega_origen,
                'bodega_destino' => $bodega_destino,
            ]);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al realizar el traspaso: ' . $e->getMessage(),
            ]);
        }
    }

      /**
     * Obtener detalle completo de un producto
     */
    public function detalleProductoAudifono($id)
    {
        try {
            $producto = Producto::with(['tipoProducto', 'marca', 'bodega'])
                        ->find($id);

            if (!$producto) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Producto no encontrado',
                    'producto' => null
                ], 404);
            }

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Producto encontrado',
                'producto' => $producto
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener detalle: ' . $e->getMessage(),
                'producto' => null
            ], 500);
        }
    }

    /**
 * Agregar producto al carrito
 */
public function agregarAlCarrito(Request $request)
{
    try {

        $validatedData = $request->validate([
            'id_producto' => 'required|integer|exists:productos,id',
            'cantidad' => 'integer|min:1',
            'id_paciente' => 'nullable|integer|exists:pacientes,id',
            'id_ficha' => 'nullable|integer',
            'precio_unitario' => 'nullable|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
            'observaciones' => 'nullable|string|max:500',
        ]);

        // Obtener producto
        $producto = Producto::with(['tipoProducto', 'marca', 'bodega'])
                            ->findOrFail($request->id_producto);

        // Verificar stock
        if ($producto->stock_actual < ($request->cantidad ?? 1)) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Stock insuficiente. Disponible: ' . $producto->stock_actual
            ], 400);
        }

        // Obtener datos del usuario/profesional
        $id_usuario = Auth::id();
        $profesional = Profesional::where('id_usuario', $id_usuario)->first();
        $session_id = session()->getId();

        // Verificar si el producto ya está en el carrito
        $itemExistente = CarritoCompra::activos()
                                      ->where('id_producto', $producto->id)
                                      ->where(function($q) use ($id_usuario, $session_id) {
                                          $q->where('id_usuario', $id_usuario)
                                            ->orWhere('session_id', $session_id);
                                      })
                                      ->first();

        if ($itemExistente) {
            // Actualizar cantidad
            $nuevaCantidad = $itemExistente->cantidad + ($request->cantidad ?? 1);

            if ($producto->stock_actual < $nuevaCantidad) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente para la cantidad solicitada. Disponible: ' . $producto->stock_actual
                ], 400);
            }

            $itemExistente->actualizarCantidad($nuevaCantidad);

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Cantidad actualizada en el carrito',
                'item' => $itemExistente,
                'total_carrito' => CarritoCompra::obtenerTotal($id_usuario, $session_id),
                'cantidad_items' => CarritoCompra::contarItems($id_usuario, $session_id)
            ]);
        }

        // Crear nuevo item en el carrito
        $carritoItem = new CarritoCompra();
        $carritoItem->id_usuario = $id_usuario;
        $carritoItem->id_profesional = $profesional ? $profesional->id : null;
        $carritoItem->id_cliente = $request->id_cliente; // Si llega vacío, guardará NULL
        $carritoItem->id_paciente = $request->id_paciente;
        $carritoItem->id_ficha = $request->id_ficha;
        $carritoItem->id_producto = $producto->id;

        // Validar que si viene id_cliente, no sea NULL o vacío
        if (empty($request->id_cliente) && !empty($request->id_paciente)) {
            // OK - es un paciente sin cliente específico
        } elseif (empty($request->id_cliente) && empty($request->id_paciente)) {
            // ERROR - debe venir al menos un identificador
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Debe especificar un cliente o paciente'
            ], 400);
        }

        // Cache de datos del producto
        $carritoItem->codigo_producto = $producto->codigo_interno;
        $carritoItem->nombre_producto = $producto->nombre;
        $carritoItem->marca_producto = $producto->marca ? $producto->marca->nombre : null;
        $carritoItem->tipo_producto = $producto->tipoProducto ? $producto->tipoProducto->nombre : null;
        $carritoItem->image_path = $producto->image_path;

        // Cantidades y precios
        $carritoItem->cantidad = $request->cantidad ?? 1;
        $carritoItem->precio_unitario = $request->precio_unitario ?? 0;
        $carritoItem->descuento = $request->descuento ?? 0;
        $carritoItem->stock_disponible = $producto->stock_actual;

        // Información adicional
        $carritoItem->observaciones = $request->observaciones;
        $carritoItem->session_id = $session_id;
        $carritoItem->id_bodega = $producto->id_bodega;

        // Establecer expiración (opcional - 24 horas)
        $carritoItem->expira_en = now()->addHours(24);

        // Calcular subtotal
        $carritoItem->calcularSubtotal();

        $carritoItem->save();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto agregado al carrito exitosamente',
            'item' => $carritoItem,
            'total_carrito' => CarritoCompra::obtenerTotal($id_usuario, $session_id),
            'cantidad_items' => CarritoCompra::contarItems($id_usuario, $session_id)
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error de validación',
            'errores' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        \Log::error('Error al agregar producto al carrito', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al agregar al carrito: ' . $e->getMessage()
        ], 500);
    }
}

public function agregarAlCarritoPrestamo(Request $request){
    try {

        $validatedData = $request->validate([
            'id_producto' => 'required|integer|exists:productos,id',
            'cantidad' => 'integer|min:1',
            'id_paciente' => 'nullable|integer|exists:pacientes,id',
            'id_ficha' => 'nullable|integer',
            'precio_unitario' => 'nullable|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
            'observaciones' => 'nullable|string|max:500',
        ]);

        // Obtener producto
        $producto = Producto::with(['tipoProducto', 'marca', 'bodega'])
                            ->findOrFail($request->id_producto);

        // Verificar stock
        if ($producto->stock_actual < ($request->cantidad ?? 1)) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Stock insuficiente. Disponible: ' . $producto->stock_actual
            ], 400);
        }

        // Obtener datos del usuario/profesional
        $id_usuario = Auth::id();
        $id_paciente = $request->id_paciente;
        $profesional = Profesional::where('id_usuario', $id_usuario)->first();
        $session_id = session()->getId();

        // Verificar si el producto ya está en el carrito de préstamo
        $itemExistente = CarritoPrestamo::prestados()
                                      ->where('id_producto', $producto->id)
                                      ->where(function($q) use ($id_paciente, $id_usuario, $session_id) {
                                          $q->where('id_paciente', $id_paciente);
                                      })
                                      ->first();

        if ($itemExistente) {
            // Actualizar cantidad
            $nuevaCantidad = $itemExistente->cantidad + ($request->cantidad ?? 1);

            if ($producto->stock_actual < $nuevaCantidad) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente para la cantidad solicitada. Disponible: ' . $producto->stock_actual
                ], 400);
            }

            $itemExistente->cantidad = $nuevaCantidad;
            $itemExistente->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Cantidad actualizada en el carrito de préstamo',
                'item' => $itemExistente,
                'total_carrito' => CarritoPrestamo::prestados()->where('id_usuario', $id_usuario)->orWhere('session_id', $session_id)->count(),
                'cantidad_items' => CarritoPrestamo::prestados()->where('id_usuario', $id_usuario)->orWhere('session_id', $session_id)->sum('cantidad')
            ]);
        }

        // Crear nuevo item en el carrito de préstamo
        $carritoItem = new CarritoPrestamo();
        $carritoItem->id_usuario = $id_usuario;
        $carritoItem->id_profesional = $profesional ? $profesional->id : null;
        $carritoItem->id_paciente = $request->id_paciente;
        $carritoItem->id_ficha = $request->id_ficha;
        $carritoItem->id_producto = $producto->id;

        // Cache de datos del producto
        $carritoItem->codigo_producto = $producto->codigo_interno;
        $carritoItem->nombre_producto = $producto->nombre;
        $carritoItem->marca_producto = $producto->marca ? $producto->marca->nombre : null;
        $carritoItem->tipo_producto = $producto->tipoProducto ? $producto->tipoProducto->nombre : null;
        $carritoItem->image_path = $producto->image_path;

        // Cantidades y precios
        $carritoItem->cantidad = $request->cantidad ?? 1;
        $carritoItem->precio_unitario = $request->precio_unitario ?? 0;
        $carritoItem->descuento = $request->descuento ?? 0;
        $carritoItem->stock_disponible = $producto->stock_actual;

        // Información adicional
        $carritoItem->observaciones = $request->observaciones;
        $carritoItem->session_id = $session_id;
        $carritoItem->id_bodega = $producto->id_bodega;

        // Fechas de préstamo
        $carritoItem->fecha_prestamo = now();
        $carritoItem->fecha_devolucion_esperada = $request->fecha_devolucion_esperada ? Carbon::parse($request->fecha_devolucion_esperada) : Carbon::now()->addDays(7);
        $carritoItem->estado_prestamo = 'prestado';

        // Establecer expiración (opcional - 24 horas)
        $carritoItem->expira_en = now()->addHours(24);

        // Calcular subtotal (si aplica)
        $carritoItem->subtotal = ($carritoItem->precio_unitario * $carritoItem->cantidad) - $carritoItem->descuento;

        $carritoItem->save();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto agregado al carrito de préstamo exitosamente',
            'item' => $carritoItem,
            'total_carrito' => CarritoPrestamo::prestados()->where('id_paciente', $id_paciente)->orWhere('session_id', $session_id)->count(),
            'cantidad_items' => CarritoPrestamo::prestados()->where('id_paciente', $id_paciente)->orWhere('session_id', $session_id)->sum('cantidad')
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error de validación',
            'errores' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        \Log::error('Error al agregar producto al carrito de préstamo', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al agregar al carrito de préstamo: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Obtener items del carrito
 */
public function obtenerCarrito(Request $request)
{
    try {

        $id_usuario = Auth::id();
        $session_id = session()->getId();
        $id_cliente = $request->input('id_cliente');
        $id_paciente = $request->input('id_paciente');

        // Si no viene ni id_cliente ni id_paciente, devolver carrito vacío
        if (empty($id_cliente) && empty($id_paciente)) {
            return response()->json([
                'estado' => 1,
                'items' => [],
                'total' => 0,
                'cantidad_items' => 0,
                'mensaje' => 'Carrito vacío (sin cliente o paciente seleccionado)'
            ]);
        }

        // Construir query base - IMPORTANTE: filtrar siempre por id_usuario primero
        $query = CarritoCompra::with(['producto', 'paciente'])
                              ->activos()
                              ->noExpirados()
                              ->where('id_usuario', $id_usuario);

        // Filtrar por cliente o paciente
        if (!empty($id_cliente)) {
            // Buscar items que coincidan exactamente con el cliente
            $query->where('id_cliente', $id_cliente);
        } elseif (!empty($id_paciente)) {
            // Si no hay id_cliente pero sí id_paciente, filtrar por paciente
            $query->where('id_paciente', $id_paciente);
        }

        $items = $query->orderBy('created_at', 'desc')->get();

        // Calcular totales directamente desde los items obtenidos
        $total = $items->sum('subtotal');
        $cantidadTotal = $items->sum('cantidad');

        return response()->json([
            'estado' => 1,
            'items' => $items,
            'total' => $total,
            'cantidad_items' => $cantidadTotal,
            'mensaje' => 'Carrito obtenido exitosamente'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al obtener carrito: ' . $e->getMessage()
        ], 500);
    }
}


/**
 * Obtener items del carrito de préstamos
 */
public function obtenerCarritoPrestamo(Request $request)
{
    try {

        $id_usuario = $request->id_paciente;


        $items = CarritoPrestamo::with(['producto', 'paciente'])
                              ->prestados()
                              ->where(function($q) use ($id_usuario) {
                                  $q->where('id_paciente', $id_usuario);
                              })
                              ->orderBy('created_at', 'desc')
                              ->get();



        $total = CarritoPrestamo::obtenerTotal($id_usuario);
        $cantidadTotal = CarritoPrestamo::contarItems($id_usuario);

        return response()->json([
            'estado' => 1,
            'items' => $items,
            'total' => $total,
            'cantidad_items' => $cantidadTotal,
            'mensaje' => 'Carrito de préstamos obtenido exitosamente'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al obtener carrito de préstamos: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Actualizar cantidad de un item
 */
public function actualizarCantidadCarrito(Request $request)
{
    try {
        $validated = $request->validate([
            'id_item' => 'required|integer|exists:carrito_compras,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $item = CarritoCompra::findOrFail($request->id_item);

        // Verificar que el item pertenece al usuario
        $id_usuario = Auth::id();
        if ($item->id_usuario != $id_usuario) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No autorizado'
            ], 403);
        }

        // Verificar stock
        if ($item->producto && $item->producto->stock_actual < $request->cantidad) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Stock insuficiente. Disponible: ' . $item->producto->stock_actual
            ], 400);
        }

        $item->actualizarCantidad($request->cantidad);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Cantidad actualizada',
            'item' => $item,
            'total_carrito' => CarritoCompra::obtenerTotal($id_usuario)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al actualizar cantidad: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Eliminar item del carrito
 */
public function eliminarDelCarrito(Request $request)
{
    try {
        $validated = $request->validate([
            'id_item' => 'required|integer|exists:carrito_compras,id'
        ]);

        $item = CarritoCompra::findOrFail($request->id_item);

        // Verificar que el item pertenece al usuario
        $id_usuario = Auth::id();
        if ($item->id_usuario != $id_usuario) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No autorizado'
            ], 403);
        }

        $item->delete(); // Soft delete

        $session_id = session()->getId();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto eliminado del carrito',
            'total_carrito' => CarritoCompra::obtenerTotal($id_usuario, $session_id),
            'cantidad_items' => CarritoCompra::contarItems($id_usuario, $session_id)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al eliminar del carrito: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Eliminar item del carrito de préstamos
 */
public function eliminarDelCarritoPrestamo(Request $request)
{
    try {

        $validated = $request->validate([
            'id_item' => 'required|integer|exists:carrito_prestamo,id'
        ]);

        $item = CarritoPrestamo::findOrFail($request->id_item);

        // Verificar que el item pertenece al usuario
        $id_usuario = $request->id_paciente;
        if ($item->id_paciente != $id_usuario) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No autorizado'
            ], 403);
        }

        $item->delete(); // Soft delete

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto eliminado del carrito de préstamos',
            'total_carrito' => CarritoPrestamo::obtenerTotal($id_usuario),
            'cantidad_items' => CarritoPrestamo::contarItems($id_usuario)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al eliminar del carrito de préstamos: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Vaciar carrito completo
 */
public function vaciarCarrito(Request $request)
{
    try {
        $id_usuario = Auth::id();
        $session_id = session()->getId();

        CarritoCompra::vaciarCarrito($id_usuario, $session_id);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Carrito vaciado exitosamente'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al vaciar carrito: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Vaciar carrito de préstamos completo
 */
public function vaciarCarritoPrestamo(Request $request)
{
    try {
        $id_usuario = $request->id_paciente;

        CarritoPrestamo::vaciarCarrito($id_usuario);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Carrito de préstamos vaciado exitosamente'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al vaciar carrito de préstamos: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Procesar venta (finalizar carrito)
 */
public function procesarVentaCarrito(Request $request)
{
    try {

        $validated = $request->validate([
            'id_cliente' => 'nullable|integer|exists:clientes,id',
            'id_paciente' => 'nullable|integer|exists:pacientes,id',
            'id_ficha' => 'nullable|integer',
            'id_forma_pago' => 'required|integer|exists:formas_pago,id',
            'observaciones' => 'nullable|string',
            'id_lugar_atencion' => 'required|integer|exists:lugares_atencion,id'
        ]);

        // Obtener valores usando input() para evitar Undefined index
        $id_cliente = $request->input('id_cliente');
        $id_paciente = $request->input('id_paciente');
        $id_forma_pago = $validated['id_forma_pago'];

        // Validar que al menos uno esté presente
        if (empty($id_cliente) && empty($id_paciente)) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Debe enviar id_cliente o id_paciente'
            ], 400);
        }

        $id_usuario = Auth::id();
        $session_id = session()->getId();

        DB::beginTransaction();

        // Obtener items del carrito (filtrar por cliente o paciente según lo que llegue)
        $query = CarritoCompra::activos()
                              ->noExpirados()
                              ->where('id_usuario', $id_usuario);

        if ($id_cliente) {
            // Si llega id_cliente, filtrar por cliente
            $query->where('id_cliente', $id_cliente);
        } elseif ($id_paciente) {
            // Si llega id_paciente, filtrar por paciente
            $query->where('id_paciente', $id_paciente);
        }

        $items = $query->get();

        if ($items->isEmpty()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'El carrito está vacío'
            ], 400);
        }

        // Verificar stock de todos los productos
        foreach ($items as $item) {
            if (!$item->tieneStockDisponible()) {
                DB::rollBack();
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente para: ' . $item->nombre_producto
                ], 400);
            }
        }

        // Calcular totales
        $total = $items->sum('subtotal');
        $descuento_total = $items->sum('descuento');
        $monto_neto = $total - $descuento_total;

        // Determinar id_paciente para guardar el producto
        $paciente_para_guardar = $id_paciente;

        if (!$paciente_para_guardar && $id_cliente) {
            // Si no hay id_paciente pero sí id_cliente, obtener del cliente
            $cliente = Cliente::find($id_cliente);
            if ($cliente && $cliente->id_paciente) {
                $paciente_para_guardar = $cliente->id_paciente;
            }
        }

        // Si aún no hay id_paciente, intentar obtener del primer item del carrito
        if (!$paciente_para_guardar && $items->isNotEmpty() && $items->first()->id_paciente) {
            $paciente_para_guardar = $items->first()->id_paciente;
        }

        // Si es CLIENTE (distribuidores), guardar en PedidosDistribucion
        if ($id_cliente && !empty($id_cliente)) {
            $items_pedido = $items->map(function($item) {
                return [
                    'id_producto' => $item->id_producto,
                    'nombre_producto' => $item->nombre_producto,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->precio_unitario,
                    'descuento' => $item->descuento,
                    'subtotal' => $item->subtotal,
                    'observaciones' => $item->observaciones
                ];
            })->toArray();

            $pedido = new PedidosDistribucion();
            $pedido->id_cliente = $id_cliente;
            $pedido->id_usuario = $id_usuario;
            $pedido->id_lugar_atencion = $validated['id_lugar_atencion'];
            $pedido->numero_pedido = PedidosDistribucion::generarNumeroPedido();
            $pedido->estado = 'procesado';
            $pedido->items_pedido = $items_pedido;
            $pedido->total = $total;
            $pedido->descuento_total = $descuento_total;
            $pedido->monto_neto = $monto_neto;
            $pedido->metodo_pago = $id_forma_pago; // Guardar el ID de la forma de pago
            $pedido->observaciones = $validated['observaciones'];
            $pedido->fecha_procesamiento = now();
            $pedido->save();

            //registramos el pago solo si el id forma pago es efectivo, si es credito se registrara el pago cuando se realice el pago del pedido
            $forma_pago = FormasPago::find($id_forma_pago);
            if($forma_pago && $forma_pago->id == 2){ // Suponiendo que el ID 2 corresponde a efectivo

                // Crear registro en tabla pagos para el cliente
                $pago = new Pago();
                $pago->id_cliente = $id_cliente;
                $pago->monto = $monto_neto;
                $pago->fecha_pago = now()->format('Y-m-d');
                $pago->id_forma_pago = $id_forma_pago;
                $pago->numero_documento = $pedido->numero_pedido; // Usar el número del pedido como referencia
                $pago->observaciones = $validated['observaciones'] ?? 'Venta procesada';
                $pago->estado = 'pendiente';
                $pago->id_usuario = $id_usuario;
                $pago->activo = 1;
                $pago->save();
            }
        }

        // Guardar producto de la venta (si existe id_paciente - aplica para ambos casos)
        if ($paciente_para_guardar) {
            $producto_paciente_controller = new ProductoPacienteController();
            foreach ($items as $item) {
                $producto_paciente_controller->guardar(
                    $item->id_producto,
                    $paciente_para_guardar,
                    $item->cantidad,
                    $item->precio_unitario,
                    $item->descuento,
                    $item->observaciones,
                    0,                                      // $tiene_garantia
                    null,                                   // $tipo_garantia
                    null,                                   // $valor_garantia
                    $id_usuario,                            // $id_usuario
                    $item->fecha_devolucion_esperada,       // $fecha_devolucion
                    $validated['id_lugar_atencion'],        // $id_lugar_atencion
                    'vendido'                               // $estado
                );
            }
        }

        // Marcar items como procesados y descontar stock
        foreach ($items as $item) {
            $item->marcarProcesado();

            // Descontar stock
            $producto = $item->producto;
            if ($producto) {
                $producto->stock_actual -= $item->cantidad;
                $producto->save();
            }
        }

        DB::commit();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Venta procesada exitosamente',
            'items_procesados' => $items->count(),
            'total' => $monto_neto
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        \Log::error('Error al procesar venta del carrito', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al procesar venta: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Procesar prestamo (finalizar carrito)
 */

public function procesarPrestamoCarrito(Request $request)
{
    try {

        $validated = $request->validate([
            'id_paciente' => 'required|integer|exists:pacientes,id',
            'observaciones' => 'nullable|string'
        ]);

        $id_paciente = $validated['id_paciente'];

        DB::beginTransaction();

        // Obtener items del carrito de préstamos
        $items = CarritoPrestamo::with(['producto', 'paciente'])
                              ->prestados()
                              ->where(function($q) use ($id_paciente) {
                                  $q->where('id_paciente', $id_paciente);
                              })
                              ->orderBy('created_at', 'desc')
                              ->get();

        if ($items->isEmpty()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'El carrito de préstamos está vacío'
            ], 400);
        }

        // Procesar cada préstamo: descontar stock y guardar en productos del paciente
        $producto_paciente_controller = new ProductoPacienteController();

        foreach ($items as $item) {

            // Guardar producto en el paciente con estado 'prestado'
            $result = $producto_paciente_controller->guardar(
                $item->id_producto,
                $id_paciente,
                $item->cantidad,
                $item->precio_unitario,
                $item->descuento,
                $item->observaciones,
                $request->tiene_garantia,
                $request->tipo_garantia,
                $request->valor_garantia,
                $item->id_usuario,
                $item->fecha_devolucion_esperada,
                $request->id_lugar_atencion,
                'prestado' // Estado personalizado para préstamo
            );

            // Descontar stock
            $producto = $item->producto;
            if ($producto && $producto->stock_actual >= $item->cantidad) {
                $producto->stock_actual -= $item->cantidad;
                $producto->save();
            }

            // Marcar el item como procesado
            $item->estado = 'procesado';
            $item->fecha_prestamo = now();
            $item->save();
        }

        DB::commit();

        // envio de correo al paciente notificando el prestamo
        $paciente = Paciente::find($id_paciente);
        if($paciente && $paciente->email){
            Mail::to($paciente->email)->send(new NotificacionPrestamoProductos($paciente, $items));
        }

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Préstamo procesado exitosamente',
            'items_procesados' => $items->count(),
            'total' => $items->sum('subtotal'),
            'resultados' => $result
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        \Log::error('Error al procesar préstamo del carrito', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al procesar préstamo: ' . $e->getMessage()
        ], 500);
    }
}

public function solicitarProductoBodega(Request $request){
    $validated = $request->validate([
        'nombre_producto' => 'required|string|max:255',
        'tipo_producto' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:1',
        'observaciones' => 'nullable|string',
    ]);

    $id_responsable = auth()->id();

    $productoSolicitado = ProductoSolicitado::create([
        'nombre_producto' => $validated['nombre_producto'],
        'tipo_producto' => $validated['tipo_producto'],
        'cantidad' => $validated['cantidad'],
        'observaciones' => $validated['observaciones'] ?? null,
        'id_responsable' => $id_responsable,
        'fecha' => now(),
    ]);

    return response()->json([
        'estado' => 1,
        'mensaje' => 'Solicitud registrada correctamente',
        'data' => $productoSolicitado
    ]);
}

public function productos_tipos(){
    $tipos = TipoProducto::where('id_tipo_institucion',3)->get();
    return response()->json([
        'estado' => 1,
        'tipos' => $tipos
    ]);
}

public function dameAtencionesPrevias(Request $request){

    $hora_medica = HoraMedica::find($request->id_hora);

    if (!$hora_medica) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Hora médica no encontrada'
        ], 404);
    }

    $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

    if ($profesional && $profesional->id_sub_tipo_especialidad == 27) {
        // Gineco-Obstetricia: la ficha está en ficha_gineco_obstetrica
        $ficha_atencion = FichaGinecoObstetrica::where('id', $hora_medica->id_ficha_otros_prof)->first();

        $atenciones = HoraMedica::where('horas_medicas.id_paciente', $hora_medica->id_paciente)
                        ->where('horas_medicas.id_profesional', $hora_medica->id_profesional)
                        ->where('horas_medicas.id_lugar_atencion', $hora_medica->id_lugar_atencion)
                        ->where('horas_medicas.id_estado', 6)
                        ->join('ficha_gineco_obstetrica', 'horas_medicas.id_ficha_otros_prof', '=', 'ficha_gineco_obstetrica.id')
                        ->with(['lugarAtencion', 'profesional', 'paciente'])
                        ->get();
    } else {
        // Otros profesionales: ficha_otros_profesionales con fallback a fichas_atenciones
        $ficha_atencion = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
        if (!$ficha_atencion) $ficha_atencion = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

        $atenciones = HoraMedica::where('horas_medicas.id_paciente', $hora_medica->id_paciente)
                        ->where('horas_medicas.id_profesional', $hora_medica->id_profesional)
                        ->where('horas_medicas.id_lugar_atencion', $hora_medica->id_lugar_atencion)
                        ->where('horas_medicas.id_estado', 6)
                        ->join('ficha_otros_profesionales', 'horas_medicas.id_ficha_otros_prof', '=', 'ficha_otros_profesionales.id')
                        ->with(['lugarAtencion', 'profesional', 'paciente'])
                        ->get();

        if ($atenciones->isEmpty()) {
            $atenciones = HoraMedica::where('horas_medicas.id_paciente', $hora_medica->id_paciente)
                            ->where('horas_medicas.id_profesional', $hora_medica->id_profesional)
                            ->where('horas_medicas.id_lugar_atencion', $hora_medica->id_lugar_atencion)
                            ->where('horas_medicas.id_estado', 6)
                            ->join('fichas_atenciones', 'horas_medicas.id_ficha_atencion', '=', 'fichas_atenciones.id')
                            ->with(['lugarAtencion', 'profesional', 'paciente'])
                            ->get();
        }
    }

    // Procesar cada atención para agregar los procedimientos
    foreach ($atenciones as $atencion) {
        $procedimientos = [];

        if (!empty($atencion->id_procedimiento)) {
            // Separar los IDs de procedimientos (pueden estar separados por |)
            $procedimiento_ids = explode('|', $atencion->id_procedimiento);

            // Limpiar y validar los IDs
            $procedimiento_ids = array_filter(array_map('trim', $procedimiento_ids), function($id) {
                return is_numeric($id) && $id > 0;
            });

            if (!empty($procedimiento_ids)) {
                // Obtener los procedimientos de la tabla procedimientos_centro
                // filtrando por el lugar de atención de esta hora médica
                $procedimientos_data = ProcedimientosCentro::whereIn('id', $procedimiento_ids)
                    // ->where('id_lugar_atencion', $atencion->id_lugar_atencion)
                    ->select('id', 'nombre', 'descripcion', 'valor', 'minutos_bloque', 'tipo_ficha_atencion')
                    ->get();

                foreach ($procedimientos_data as $proc) {
                    $procedimientos[] = [
                        'id' => $proc->id,
                        'nombre' => $proc->nombre ?? null,
                        'descripcion' => $proc->descripcion ?? null,
                        'valor' => $proc->valor ?? null,
                        'minutos_bloque' => $proc->minutos_bloque ?? null,
                        'tipo_ficha_atencion' => $proc->tipo_ficha_atencion ?? null
                    ];
                }
            }
        }

        // Agregar los procedimientos al objeto de atención
        $atencion->procedimientos = $procedimientos;

        // También agregar un campo de texto con los nombres de los procedimientos
        $atencion->procedimientos_texto = collect($procedimientos)->map(function($proc) {
            return $proc['descripcion'] ?: $proc['nombre'];
        })->filter()->implode(', ');

        if($profesional->id_tipo_especialidad == 59){
            $informe = FichaAtencionRayo::where('id_ficha_atencion', $atencion->id)
                            ->first();
            $atencion->informe_rayos = $informe ?? null;
        }

    }



    return response()->json([
        'estado' => 1,
        'atenciones' => $atenciones,
        'ficha' => $ficha_atencion
    ]);
}

public function finalizarSesiones(Request $request){

    $tipo = $request->examen; // 'VPPB' o 'TerapiaVoz'
    if($tipo == 'vppb'){
        $sesiones = TratamientoVppb::where('id_paciente', $request->id_paciente)
                    ->where('id_profesional', $request->id_profesional)
                    ->where('id_lugar_atencion', $request->id_lugar_atencion)
                    ->where('estado',1)
                    ->get();
    }else{
        $sesiones = TerapiaVoz::where('id_paciente', $request->id_paciente)
                    ->where('id_profesional', $request->id_profesional)
                    ->where('id_lugar_atencion', $request->id_lugar_atencion)
                    ->where('estado',1)
                    ->get();
    }
    foreach($sesiones as $sesion){
        $sesion->estado = 0;
        $sesion->save();
    }

    // Aquí puedes procesar las sesiones como desees
    return response()->json([
        'estado' => 1,
        'sesiones' => $sesiones
    ]);
}

    public function registrarCampaniaPublicitaria(Request $request){
        try {
            $data = $request->all();
            $archivos = [];
            $archivos_imagenes = [];
            if ($request->hasFile('archivos')) {
                foreach ($request->file('archivos') as $file) {
                    $path = $file->storeAs('campanias', $file->getClientOriginalName(), 'public');
                    $archivos[] = $path;
                }
            }
            if ($request->hasFile('imagenes')) {
                foreach ($request->file('imagenes') as $file) {
                    $path = $file->storeAs('campanias', $file->getClientOriginalName(), 'public');
                    $archivos_imagenes[] = $path;
                }
            }

            $emails_destinatarios = [];

            // Si los destinatarios son pacientes, realiza la lógica y retorna el resultado para pruebas
            if (is_array($data['campana_destinatarios']) && in_array('pacientes', $data['campana_destinatarios'])) {
                $institucion = Instituciones::where('id_lugar_atencion', $data['id_lugar_atencion'])->first();

                $fichas = FichaOtrosProfesionales::where('id_lugar_atencion', $institucion->id_lugar_atencion)->distinct()->get(['id_paciente']);

                $pacientes = [];
                foreach ($fichas as $f) {
                    $paciente_temp = Paciente::find($f->id_paciente);

                    $edad = Carbon::parse($paciente_temp->fecha_nac)->age;

                    $paciente_audifono = MisProducto::with([
                                        'producto.marca',
                                        'producto.tipoProducto',
                                        'producto.bodega',
                                        'profesional',
                                        'lugarAtencion'
                                    ])
                                    ->porPaciente($paciente_temp->id)
                                    ->activos()
                                    ->whereHas('producto', function($q) {
                                        $q->where('id_tipo_producto', 9);
                                    })
                                    ->orderBy('fecha_compra', 'desc')
                                    ->get();


                    $paciente_temp->tiene_audifonos = $paciente_audifono->isNotEmpty();

                    if ($paciente_temp) {
                         // Filtro: tercera edad
                        if ($data['filtro_tercera_edad'] == "1" && $edad < 65) continue;
                        // Filtro: pacientes con audífonos (ejemplo, ajusta según tu lógica)
                        if ($data['filtro_pacientes_audifonos'] == "1" && !$paciente_temp->tiene_audifonos) continue;
                        // Filtro: sexo
                        if (isset($data['filtro_sexo']) && is_array($data['filtro_sexo']) && !in_array($paciente_temp->sexo, $data['filtro_sexo'])) continue;

                        $pacientes[] = $paciente_temp;
                    }
                }


                foreach ($pacientes as $paciente) {
                    if (filter_var($paciente->email, FILTER_VALIDATE_EMAIL)) {
                        $emails_destinatarios[] = $paciente->email;
                    }
                }
            }


            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();


            // Si no son pacientes, sigue el flujo normal
            $existe = CampaniaPublicitaria::where('id_institucion', $data['id_institucion'])
                        ->where('titulo', $data['titulo'])
                        ->where('remitente', $data['remitente'])
                        ->where('mensaje', $data['mensaje'])
                        ->where('destinatarios', $data['campana_destinatarios'])
                        ->where('estado', 'pendiente')
                        ->first();

            if ($existe) {
                $campania = $existe;
            }else{
                $campania = new CampaniaPublicitaria();
            }

            // Guardar campaña en la base de datos
            $campania->id_institucion = $institucion->id;
            $campania->titulo = $data['titulo'];
            $campania->remitente = $data['remitente'];
            $campania->mensaje = $data['mensaje'];
            $destinatarios_enum = ['pacientes','profesionales','personal','custom'];
            $campania->destinatarios = is_array($data['campana_destinatarios'])
                ? (in_array($data['campana_destinatarios'][0], $destinatarios_enum) ? $data['campana_destinatarios'][0] : 'custom')
                : (in_array($data['campana_destinatarios'], $destinatarios_enum) ? $data['campana_destinatarios'] : 'custom');
            $campania->destinatarios_custom = isset($data['custom']) ? $data['custom'] : (isset($data['destinatarios_custom']) ? $data['destinatarios_custom'] : null);
            // $campania->total_enviados = 0;
            // $campania->total_errores = 0;
            $campania->estado = 'pendiente';
            $campania->log_envio = null;
            $campania->id_profesional = $profesional->id;
            $campania->archivos = json_encode($archivos);

            $campania->save();

            // Enviar correos a los destinatarios
            $enviados = 0;
            $fallidos = [];

            // Obtener archivos asociados a la campaña
            $archivos = $campania->archivos;
            if (is_string($archivos)) {
                $archivos = json_decode($archivos, true) ?: [];
            }

            $imagen_url = null;
            if (!empty($archivos_imagenes)) {
                // Solo la primera imagen, puedes adaptar para varias si lo necesitas
                $imagen_url = asset('storage/' . $archivos_imagenes[0]);
            }

            foreach ($emails_destinatarios as $email) {
                try {
                    $blade = 'campania_promocional'; // Usa la plantilla creada en resources/views
                    $to = [ ['email' => $email, 'name' => $email] ];
                    $cc = [];
                    $bcc = [];
                    $asunto = $data['titulo'];
                    $body = array(
                        'nombre_paciente'=> $email,
                        'fecha'=> date('d-m-Y'),
                        'hora'=> date('H:i'),
                        'lugar_atencion'=> 'PRUEBAS',
                        'procedimiento'=> 'pruebas',
                        'direccion'=> 'PRUEBAS',
                        'mensaje' => $data['mensaje'],
                        'remitente' => $data['remitente'],
                        'imagen_url' => $imagen_url ? $imagen_url : null
                    );
                    $archivo = '';
                    $id_institucion = '';

                    // Adjuntar archivos si existen
                    $adjuntos = [];
                    if (!empty($archivos)) {
                        foreach ($archivos as $filePath) {
                            $fullPath = storage_path('app/public/' . $filePath);
                            if (file_exists($fullPath)) {
                                $adjuntos[] = $fullPath;
                            }
                        }
                    }

                    $result_mail = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $adjuntos, $institucion->id);

                    if ($result_mail['estado']) {
                        $enviados++;
                    } else {
                        $fallidos[] = $email;
                    }

                } catch (\Exception $e) {
                    $fallidos[] = $email;
                }
            }

            // Actualizar estado y log
            $campania->estado = ($enviados > 0 && count($fallidos) == 0) ? 'enviada' : 'parcial';
            $campania->log_envio = json_encode([
                'enviados' => $enviados,
                'fallidos' => $fallidos
            ]);
            $campania->save();

            return response()->json([
                'success' => true,
                'message' => 'Campaña registrada y correos enviados.',
                'enviados' => $enviados,
                'fallidos' => $fallidos,
                'campania_id' => $campania->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar/enviar campaña: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Subir archivo y asociarlo a la campaña publicitaria
     */
    public function subirArchivoCampania(Request $request)
    {
        $request->validate([
            'campania_id' => 'required|integer|exists:campanias_publicitarias,id',
            'file' => 'required|file'
        ]);

        $campania = CampaniaPublicitaria::find($request->campania_id);

        // Guardar archivo en storage/app/public/campanias
        $path = $request->file('file')->store('campanias', 'public');

        // Guardar el path en el campo archivos (array json)
        $archivos = $campania->archivos ?? [];
        if (is_string($archivos)) $archivos = json_decode($archivos, true) ?: [];
        $archivos[] = $path;
        $campania->archivos = $archivos;
        $campania->save();

        return response()->json(['success' => true, 'path' => $path]);
    }

    public function historialCampaniasPublicitarias(Request $request){
        $id_institucion = $request->id_institucion;
        $campanias = CampaniaPublicitaria::where('id_institucion', $id_institucion)
                        ->with(['institucion', 'profesional'])
                        ->orderBy('created_at', 'desc')
                        ->get();
        return response()->json([
            'estado' => 1,
            'data' => $campanias
        ]);
    }

    public function detalleCampaniaPublicitaria(Request $request){
        $id_campania = $request->id_campania;
        $campania = CampaniaPublicitaria::where('id', $id_campania)
                        ->with(['institucion', 'profesional'])
                        ->first();
        return response()->json([
            'estado' => 1,
            'data' => $campania
        ]);
    }

    public function rendicionCajaLaboratorio(){
        $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();

        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $profesional->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $profesional->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

         // Paso 3: Bonos del mes (no rendidos)
            $filtro = array();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            $bonos_dia = Bono::where($filtro)
                            // ->whereDate('fecha_atencion', Carbon::now())
                            ->get();

            $bonos = $bonos_dia;

            foreach($bonos as $b){
                $responsable = Profesional::where('id',$b->id_profesional)->first();
                $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
            }

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }

            $listado_recibe = [];

            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional',$profesional->id)->first();
            if($lugar_atencion){
                $institucion = Instituciones::where('id_lugar_atencion',$lugar_atencion->id_lugar_atencion)->first();

                $contrato_dependiente = ContratoDependiente::where('id_empleado',$profesional->id)->first();

                if($contrato_dependiente){
                    $listado_recibe = ContratoDependiente::where('id_institucion',$institucion->id)
                                        ->where('tipo_empleado','like','%ADMINISTRADOR%')
                                        ->where('id_empleado','!=',$profesional->id)
                                        ->get();
                }else{
                    $profesionales_lugares_atencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugar_atencion->id_lugar_atencion)->pluck('id_profesional')->toArray();
                    if($profesionales_lugares_atencion)
                    {
                        $listado_recibe = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos')->whereIn('id', $profesionales_lugares_atencion)
                                                ->where('id','!=',$profesional->id)
                                                ->get();
                    }
                }
            }

            return view('app.laboratorio.adm_general.rendiciones',[
                    'es_institucion' => $es_institucion,
                    'asistente' => $profesional,
                    'institucion' => isset($institucion) ? $institucion : null,
                    'lista_bonos' => implode('|',$lista_bonos),
                    'bono' => $bonos,
                    'total' => $total,
                    'total_bonos' => $total_bonos,
                    'total_efectivo' => $total_efectivo,
                    'total_otros' => $total_otros,
                    'prevision' => $prevision,
                    'listado_recibe_prof' => $listado_recibe,
                    'listado_recibe' => $listado_recibe,
                    'fecha_rendicion' => date('Y-m-d'),
            ]);

    }

     public function cargarRendicionLaboratorio(Request $request)
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

        if($institucion)
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

            /** RENDICION */
            $rendiciones = RendicionCaja::where('id_profesional_receptor', $profesional->id)
                                ->where('rendicion','0')
                                ->where('estado',4)
                                ->with('ProfesionalEmisor')
                                ->with('ProfesionalReceptor')
                                ->get();

            $total_rendiciones = 0;
            $total_documentos_rendiciones = 0;
            $total_bonos_rendiciones = 0;
            $total_efectivo_rendicion = 0;
            $total_copago_rendicion = 0;
            $total_otros_rendicion = 0;
            $total_archivos_rendicion = 0;
            $lista_rendiciones = array();

            if($rendiciones)
            {
                foreach ($rendiciones as $rendicion)
                {
                    $lista_rendiciones[] = $rendicion->id;

                    $total_rendiciones++;
                    $total_documentos_rendiciones += $rendicion->total_documentos;
                    $total_bonos_rendiciones += $rendicion->total_bono;
                    $total_efectivo_rendicion += $rendicion->total_efectivo;
                    $total_copago_rendicion += $rendicion->total_copago;
                    $total_otros_rendicion += $rendicion->total_otros;

                    if(!empty($rendicion->archivos))
                    {
                        $archivos_array  = explode('|',$rendicion->archivos);
                        $total_archivos_rendicion += count($archivos_array);
                        $rendicion->cantidad_archivos = count($archivos_array);
                    }
                    else
                    {
                        $rendicion->cantidad_archivos = 0;
                    }
                }
            }

            /** PERSONAL QUE RECIBE */
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$responsable->id])
                                ->get();
            // var_dump($listado_recibe);

             return view('app.laboratorio.flujo_caja')->with([
                /** informacion de rendiciones */
                'listado_recibe' => $listado_recibe,
                'rendiciones' => $rendiciones,
                'total_rendiciones' => $total_rendiciones,
                'total_documentos_rendiciones' => $total_documentos_rendiciones,
                'total_bonos_rendiciones' => $total_bonos_rendiciones,
                'total_efectivo_rendicion' => $total_efectivo_rendicion,
                'total_copago_rendicion' => $total_copago_rendicion,
                'total_otros_rendicion' => $total_otros_rendicion,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
                'institucion' => $institucion,
                'tipo_institucion' => $tipo_institucion,
             ]);
        }
        else
        {
            return back()->with('error', 'no se encontro institucion asociada');
        }
    }

    public function lab_liquidacion_profesionales(Request $request){

        // Definir fechas: primer día del mes actual y fecha actual
        $fecha_inicio = now()->startOfMonth()->format('Y-m-d');
        $fecha_fin = now()->format('Y-m-d');

        $contrato = ContratoDependienteProfesional::where('id_profesional',$request->id)->first();

        $profesional_convenio = ProfesionalInstitucionConvenio::where('id_profesional', $request->id)
                        ->where('id_institucion', $request->id_institucion)
                        ->first();

        $horas_medicas = HoraMedica::where('horas_medicas.id_profesional', $request->id)
                ->whereBetween('horas_medicas.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                ->where('id_estado', 6) // realizadas
                ->get();

        $porcentaje = $profesional_convenio ? $profesional_convenio->fijo : 10;

        $total_valor = $horas_medicas->sum('valor');

        $total_valor_convenio = $total_valor * ($porcentaje / 100);

        $mis_ventas = MisProducto::where('id_profesional', $request->id)
                ->with('Producto')
                ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                ->get();

        $productos = [];
        foreach ($mis_ventas as $venta) {
            $nombre = $venta['producto']['nombre'];
            $precio = $venta['producto']['precio_venta'];
            if (!isset($productos[$nombre])) {
                $productos[$nombre] = [
                    'total' => 0,
                    'color' => null, // puedes asignar colores aquí si quieres
                ];
            }
            $productos[$nombre]['total'] += $precio;
        }

         $bonos_utilizados = Bono::where('id_profesional', $request->id)
                                    // ->where('id_tipo_bono', 1) // FONASA
                                    ->whereBetween('created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
                                    ->get();

        // $bonos_utilizados = Bono::join('horas_medicas', 'bonos.id_referencia', '=', 'horas_medicas.id')
        //     ->where('bonos.id_profesional', $id_profesional)
        //     ->where('horas_medicas.id_lugar_atencion', $laboratorio->id_lugar_atencion)
        //     ->whereBetween('bonos.created_at', [$fecha_inicio.' 00:00:00', $fecha_fin.' 23:59:59'])
        //     ->get(['bonos.*']);

        $total_bonos = $bonos_utilizados->sum('monto');

        $total_Valor_productos = array_sum(array_column($productos, 'total'));
        if(!$contrato){
            $convenio = ProfesionalInstitucionConvenio::where('id_profesional',$request->id)->first();
            return [
                'convenio'=>$convenio,
                'contrato'=>null,
                'estado' =>1,
                'total_valor_productos'=>$total_Valor_productos,
                'bonos_utilizados'=>$bonos_utilizados,
                'total_bonos' => $total_bonos,
                'total_valor_convenio'=>$total_valor_convenio,
                'horas_medicas' => $horas_medicas,
                'profesional' => Profesional::where('id',$request->id)->first(),
            ];
        }else{
            return [
                'contrato'=>$contrato,
                'convenio'=>null,
                'estado' =>1,
                'total_valor_productos'=>$total_Valor_productos,
                'bonos_utilizados'=>$total_bonos,
                'total_valor_convenio'=>$total_valor_convenio,
                'horas_medicas' => $horas_medicas,
                'profesional' => Profesional::where('id',$request->id)->first(),
            ];
        }
    }

    public function solicitarRendicionCajaLaboratorio(Request $request){

        // tipo_rendicion
        // bonos
        // id_asistente
        // fecha_rendicion
        // total_documentos
        // total_bono
        // total_efectivo
        // total_otros
        // id_asistente_receptor
        // fecha_recepcion
        // codigo_autorizacion
        // observacion
        // otro
        // estado

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->bonos))
        {
            $error['bonos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente_receptor))
        {
            $error['id_asistente_receptor'] = 'Campo requerido';
            $valido = 0;
        }



        // if(empty($request->observaciones)){
        //     $error['observaciones'] = 'Campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $tipo_rendicion = 1; // rendicion caja institucion
            $asistenteRendicion = Profesional::where('id_usuario', Auth::user()->id)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');

            $asistenteReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();

            if($asistenteReceptor)
            {
                 $asistenteReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();
            }
            else
            {
                $asistenteReceptor = AdminInstServ::where('id', $request->id_asistente_receptor)->first();
            }


            $bonos = $request->bonos;
            $observaciones = $request->observaciones;

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $detalle_bonos = Bono::whereIn('id',explode('|', $bonos))->get();

            if($detalle_bonos)
            {
                $datos['update_bonos'] = array();
                foreach ($detalle_bonos as $key_bono => $value_bono)
                {
                    $bono = Bono::find($value_bono->id);
                    $bono->rendido = 1;// en proceso de rendicion

                    if($bono->save())
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 1;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 0;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
                    }

                    $total++;
                    // 1->Bono Fisico
                    if($value_bono->id_clase_bono == 1)
                        $total_bonos++;
                    // 2->Sencillito
                    else if($value_bono->id_clase_bono == 2)
                        $total_bonos++;
                    // 3->Caja Vecina
                    else if($value_bono->id_clase_bono == 3)
                        $total_bonos++;
                    // 4->Bono Web
                    else if($value_bono->id_clase_bono == 4)
                        $total_bonos++;
                    // 5->Bono Web Pre-Pago
                    else if($value_bono->id_clase_bono == 5)
                        $total_bonos++;
                    // 6->Particular
                    else if($value_bono->id_clase_bono == 6)
                        $total_efectivo += $value_bono->valor_atencion;
                    else
                        $total_otros++;
                }
            }

            $rendicionCaja = new RendicionCaja();

            $rendicionCaja->tipo_rendicion = $tipo_rendicion;

            $rendicionCaja->bonos = $bonos;

            // $rendicionCaja->id_asistente = $asistenteRendicion->id;
            $rendicionCaja->id_profesional = $asistenteRendicion->id;
            $rendicionCaja->fecha_rendicion = $fecha_rendicion;

            $rendicionCaja->total_documentos = $total;
            $rendicionCaja->total_bono = $total_bonos;
            $rendicionCaja->total_efectivo = $total_efectivo;
            $rendicionCaja->total_otros = $total_otros;

            // $rendicionCaja->id_asistente_receptor = $asistenteReceptor->id;
            $rendicionCaja->id_profesional_receptor = $asistenteReceptor->id;
            $rendicionCaja->fecha_recepcion = Carbon::now()->format('Y-m-d H:i:s');
            $rendicionCaja->codigo_autorizacion = '';
            $rendicionCaja->observacion = $observaciones;
            $rendicionCaja->otro = '';
            $rendicionCaja->estado = 0;
            if($rendicionCaja->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro de Rendicion';
                $datos['last_id'] = $rendicionCaja->id;


                /** MANEJO DE ARCHIVOS */
                $archivos = json_decode($request->archivos);
                $info_archivos = '';
                $resulto_img = [];
                if($archivos)
                {
                    foreach ($archivos as $key => $value)
                    {
                        // [0] = url
                        // [1] = nombre_original
                        // [2] = nombre_archivo
                        // [3] = file_extension
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];


                        $nombre_final = 'rendicion_'.$rendicionCaja->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;
                        $resulto_img[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        $info_archivos .= $nombre_final.'|';
                    }

                    if(!empty($info_archivos))
                    {
                        $info_archivos = substr($info_archivos, 0, -1);
                        $rendicionCaja->archivos = $info_archivos;
                        if($rendicionCaja->save())
                        {
                            $datos['rendicion_archivo']['estado'] = 1;
                            $datos['rendicion_archivo']['msj'] = 'archivo registrado';
                        }
                        else
                        {
                            $datos['rendicion_archivo']['estado'] = 0;
                            $datos['rendicion_archivo']['msj'] = 'falla en registro de archivo';
                        }
                    }
                    else
                    {
                        $datos['rendicion_archivo']['estado'] = 0;
                        $datos['rendicion_archivo']['msj'] = 'problema en lectura de archivos';
                    }
                }
                else
                {
                    $datos['rendicion_archivo']['estado'] = 1;
                    $datos['rendicion_archivo']['msj'] = 'sin archivos a registrar';
                }


                $registro = RendicionCaja::where('id', $rendicionCaja->id)
                    ->with(['Asistente' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    // ->with(['AsistenteReceptor' => function($query){
                    //     $query->select('id','nombres','apellido_uno','apellido_dos');
                    // }])
                    ->first();

                /** informacion de asistente o admin_inst_serv */
                $registro_receptor = Profesional::where('id', $registro->id_profesional_receptor)->first();
                if($registro_receptor)
                {
                    $registro->asistente_receptor = $registro_receptor;
                }
                else
                {
                    $registro_receptor = AdminInstServ::where('id', $registro->id_asistente_receptor)->first();
                    $registro->asistente_receptor = $registro_receptor;
                }
                $datos['registro'] = $registro;

                /** SOLICITAR AUTORIZACION POR APP */
                $msj = array(
                    'id' => $rendicionCaja->id,
                    'nombre' => $asistenteRendicion->nombres.' '.$asistenteRendicion->apellido_uno.' '.$asistenteRendicion->apellido_dos,
                    'fecha' => $fecha_rendicion,
                    'tipo' => 'rendicion',
                    // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
                );

                /** calculo de periodo de vigencia para aprobacion */
                $fecha_actual  = date('Y-m-d H:i:s');
                $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

                $log_users_devices = new LogUsersDevices();
                $log_users_devices->id_user_create = $asistenteRendicion->id_usuario;
                if($asistenteReceptor->id_usuario)
                    $log_users_devices->id_user_recept = $asistenteReceptor->id_usuario;
                else
                    $log_users_devices->id_user_recept = $asistenteReceptor->id_admin;
                $log_users_devices->msg = json_encode($msj);
                $log_users_devices->estado = 0;
                $log_users_devices->fecha_ingreso = $fecha_actual;
                $log_users_devices->fecha_termino = $fecha_vencimiento;
                $log_users_devices->tipo = 1; // rendicion

                if($log_users_devices->save())
                {
                    $datos['autorizacion']['estado'] = 1;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                    $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                    $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                    $datos['autorizacion']['tiempo'] = 10;
                    $datos['autorizacion']['last_id'] = $log_users_devices->id;

                    $rendicionCaja->id_log_users_devices = $log_users_devices->id;
                    $rendicionCaja->estado = 1;
                    if($rendicionCaja->save())
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';
                    }
                    else
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                    }
                }
                else
                {
                    $datos['autorizacion']['estado'] = 0;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion con falla';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    // public function cajaRendirBonos(Request $request){

    //     $datos = array();
    //     $error = array();
    //     $valido = 1;

    //     if(empty($request->bonos))
    //     {
    //         $error['bonos'] = 'Campo requerido';
    //         $valido = 0;
    //     }
    //     if(empty($request->id_asistente_receptor))
    //     {
    //         $error['id_asistente_receptor'] = 'Campo requerido';
    //         $valido = 0;
    //     }



    //     // if(empty($request->observaciones)){
    //     //     $error['observaciones'] = 'Campo requerido';
    //     //     $valido = 0;
    //     // }

    //     if($valido)
    //     {
    //         $tipo_rendicion = 1; // rendicion caja institucion
    //         $profesionalRendicion = Profesional::where('id_usuario', Auth::user()->id)->first();

    //         $fecha_rendicion = date('Y-m-d H:i:s');

    //         $profesionalReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();

    //         if($profesionalReceptor)
    //         {
    //             // $profesionalReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();
    //         }
    //         else
    //         {
    //             $profesionalReceptor = AdminInstServ::where('id', $request->id_asistente_receptor)->first();
    //         }

    //         $bonos = $request->bonos;

    //         $observaciones = $request->observaciones;

    //         $total = 0;
    //         $total_bonos = 0;
    //         $total_efectivo = 0;
    //         $total_otros = 0;
    //         $detalle_bonos = Bono::whereIn('id',explode('|', $bonos))->get();
    //         if($detalle_bonos)
    //         {
    //             $datos['update_bonos'] = array();
    //             foreach ($detalle_bonos as $key_bono => $value_bono)
    //             {
    //                 $bono = Bono::find($value_bono->id);
    //                 $bono->rendido = 1;// en proceso de rendicion

    //                 if($bono->save())
    //                 {
    //                     $datos['update_bonos'][$bono->id]['estado'] = 1;
    //                     $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
    //                 }
    //                 else
    //                 {
    //                     $datos['update_bonos'][$bono->id]['estado'] = 0;
    //                     $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
    //                 }

    //                 $total++;
    //                 // 1->Bono Fisico
    //                 if($value_bono->id_clase_bono == 1)
    //                     $total_bonos++;
    //                 // 2->Sencillito
    //                 else if($value_bono->id_clase_bono == 2)
    //                     $total_bonos++;
    //                 // 3->Caja Vecina
    //                 else if($value_bono->id_clase_bono == 3)
    //                     $total_bonos++;
    //                 // 4->Bono Web
    //                 else if($value_bono->id_clase_bono == 4)
    //                     $total_bonos++;
    //                 // 5->Bono Web Pre-Pago
    //                 else if($value_bono->id_clase_bono == 5)
    //                     $total_bonos++;
    //                 // 6->Particular
    //                 else if($value_bono->id_clase_bono == 6)
    //                     $total_efectivo += $value_bono->valor_atencion;
    //                 else
    //                     $total_otros++;
    //             }
    //         }

    //         $rendicionCaja = new RendicionCaja();

    //         $rendicionCaja->tipo_rendicion = $tipo_rendicion;

    //         $rendicionCaja->bonos = $bonos;

    //         // $rendicionCaja->id_asistente = $asistenteRendicion->id;
    //         $rendicionCaja->id_profesional = $profesionalRendicion->id;
    //         $rendicionCaja->fecha_rendicion = $fecha_rendicion;

    //         $rendicionCaja->total_documentos = $total;
    //         $rendicionCaja->total_bono = $total_bonos;
    //         $rendicionCaja->total_efectivo = $total_efectivo;
    //         $rendicionCaja->total_otros = $total_otros;

    //         // $rendicionCaja->id_asistente_receptor = $asistenteReceptor->id;
    //         $rendicionCaja->id_profesional_receptor = $profesionalReceptor->id;
    //         $rendicionCaja->fecha_recepcion = Carbon::now()->format('Y-m-d H:i:s');
    //         $rendicionCaja->codigo_autorizacion = '';
    //         $rendicionCaja->observacion = $observaciones;
    //         $rendicionCaja->otro = '';
    //         $rendicionCaja->estado = 0;

    //         if($rendicionCaja->save())
    //         {
    //             $datos['estado'] = 1;
    //             $datos['msj'] = 'Registro de Rendicion';
    //             $datos['last_id'] = $rendicionCaja->id;


    //             /** MANEJO DE ARCHIVOS */
    //             $archivos = json_decode($request->archivos);
    //             $info_archivos = '';
    //             $resulto_img = [];
    //             if($archivos)
    //             {
    //                 foreach ($archivos as $key => $value)
    //                 {
    //                     // [0] = url
    //                     // [1] = nombre_original
    //                     // [2] = nombre_archivo
    //                     // [3] = file_extension
    //                     $nombre_temp = $value[2];
    //                     $file_extension = $value[3];


    //                     $nombre_final = 'rendicion_'.$rendicionCaja->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;
    //                     $resulto_img[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

    //                     $info_archivos .= $nombre_final.'|';
    //                 }

    //                 if(!empty($info_archivos))
    //                 {
    //                     $info_archivos = substr($info_archivos, 0, -1);
    //                     $rendicionCaja->archivos = $info_archivos;
    //                     if($rendicionCaja->save())
    //                     {
    //                         $datos['rendicion_archivo']['estado'] = 1;
    //                         $datos['rendicion_archivo']['msj'] = 'archivo registrado';
    //                     }
    //                     else
    //                     {
    //                         $datos['rendicion_archivo']['estado'] = 0;
    //                         $datos['rendicion_archivo']['msj'] = 'falla en registro de archivo';
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $datos['rendicion_archivo']['estado'] = 0;
    //                     $datos['rendicion_archivo']['msj'] = 'problema en lectura de archivos';
    //                 }
    //             }
    //             else
    //             {
    //                 $datos['rendicion_archivo']['estado'] = 1;
    //                 $datos['rendicion_archivo']['msj'] = 'sin archivos a registrar';
    //             }


    //             $registro = RendicionCaja::where('id', $rendicionCaja->id)
    //                 ->with(['ProfesionalEmisor' => function($query){
    //                     $query->select('id','nombre','apellido_uno','apellido_dos');
    //                 }])
    //                 // ->with(['AsistenteReceptor' => function($query){
    //                 //     $query->select('id','nombres','apellido_uno','apellido_dos');
    //                 // }])
    //                 ->first();

    //             /** informacion de asistente o admin_inst_serv */
    //             $registro_receptor = Profesional::where('id', $profesionalReceptor->id)->first();
    //             if($registro_receptor)
    //             {
    //                 $registro->asistente_receptor = $registro_receptor;
    //             }
    //             else
    //             {
    //                 $registro_receptor = AdminInstServ::where('id', $registro->id_asistente_receptor)->first();
    //                 $registro->asistente_receptor = $registro_receptor;
    //             }
    //             $datos['registro'] = $registro;

    //             /** ENVIO DE AUTORIZACION POR EMAIL */
    //             $blade = 'solicitud_aprobacion_rendicion_caja';
    //             $to = array(
    //                 array('email' => $profesionalReceptor->email, 'name' => $profesionalReceptor->nombres.' '.$profesionalReceptor->apellido_uno.' '.$profesionalReceptor->apellido_dos)
    //             );
    //             $cc = array();
    //             $bcc = array();
    //             $asunto = 'MED-SDI - Solicitud de Aprobación de Rendición de Caja N°'.$rendicionCaja->id;
    //             $body = array(
    //                 'id_rendicion' => $rendicionCaja->id,
    //                 'nombre_asistente' => $profesionalRendicion->nombres.' '.$profesionalRendicion->apellido_uno.' '.$profesionalRendicion->apellido_dos,
    //                 'fecha_rendicion' => $fecha_rendicion,
    //             );
    //             $archivo = ''; // pendiente
    //             $id_institucion = '';

    //             $result_email = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

    //             if($result_email['estado'])
    //             {
    //                 $datos['mail']['institucion']['estado'] = 1;
    //                 $datos['mail']['institucion']['msj'] = 'Notificacion de rendicion enviado';
    //             }
    //             else
    //             {
    //                 $datos['mail']['institucion']['estado'] = 0;
    //                 $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de rendicion';
    //             }

    //             /** SOLICITAR AUTORIZACION POR APP */
    //             $msj = array(
    //                 'id' => $rendicionCaja->id,
    //                 'nombre' => $profesionalReceptor->nombres.' '.$profesionalReceptor->apellido_uno.' '.$profesionalReceptor->apellido_dos,
    //                 'fecha' => $fecha_rendicion,
    //                 'tipo' => 'rendicion',
    //                 // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
    //             );

    //             /** calculo de periodo de vigencia para aprobacion */
    //             $fecha_actual  = date('Y-m-d H:i:s');
    //             $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

    //             $log_users_devices = new LogUsersDevices();
    //             $log_users_devices->id_user_create = $profesionalRendicion->id_usuario;
    //             if($profesionalReceptor->id_usuario)
    //                 $log_users_devices->id_user_recept = $profesionalReceptor->id_usuario;
    //             else
    //                 $log_users_devices->id_user_recept = $profesionalReceptor->id_usuario;
    //             $log_users_devices->msg = json_encode($msj);
    //             $log_users_devices->estado = 0;
    //             $log_users_devices->fecha_ingreso = $fecha_actual;
    //             $log_users_devices->fecha_termino = $fecha_vencimiento;
    //             $log_users_devices->tipo = 1; // rendicion

    //             if($log_users_devices->save())
    //             {
    //                 $datos['autorizacion']['estado'] = 1;
    //                 $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
    //                 $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
    //                 $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
    //                 $datos['autorizacion']['tiempo'] = 10;
    //                 $datos['autorizacion']['last_id'] = $log_users_devices->id;

    //                 $rendicionCaja->id_log_users_devices = $log_users_devices->id;
    //                 $rendicionCaja->estado = 1;
    //                 if($rendicionCaja->save())
    //                 {
    //                     $datos['update_log_users_devices']['estado'] = 1;
    //                     $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';
    //                 }
    //                 else
    //                 {
    //                     $datos['update_log_users_devices']['estado'] = 1;
    //                     $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
    //                 }
    //             }
    //             else
    //             {
    //                 $datos['autorizacion']['estado'] = 0;
    //                 $datos['autorizacion']['msj'] = 'Solicitud de aprobacion con falla';
    //             }
    //         }
    //     }
    //     else
    //     {
    //         $datos['estado'] = 0;
    //         $datos['msj'] = 'Campos requeridos';
    //         $datos['error'] = $error;
    //     }
    //     return $datos;
    // }

     public function cajaRendirBonos(Request $request){

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->bonos))
        {
            $error['bonos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente_receptor))
        {
            $error['id_asistente_receptor'] = 'Campo requerido';
            $valido = 0;
        }



        // if(empty($request->observaciones)){
        //     $error['observaciones'] = 'Campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $tipo_rendicion = 1; // rendicion caja institucion
            $profesionalRendicion = Profesional::where('id_usuario', Auth::user()->id)->first();

            $fecha_rendicion = date('Y-m-d H:i:s');

            $profesionalReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();

            if($profesionalReceptor)
            {
                // $profesionalReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();
            }
            else
            {
                $profesionalReceptor = AdminInstServ::where('id', $request->id_asistente_receptor)->first();
            }

            $bonos = $request->bonos;

            $observaciones = $request->observaciones;

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $detalle_bonos = Bono::whereIn('id',explode('|', $bonos))->get();

            if($detalle_bonos)
            {
                $datos['update_bonos'] = array();
                foreach ($detalle_bonos as $key_bono => $value_bono)
                {
                    $bono = Bono::find($value_bono->id);
                    $bono->rendido = 1;// en proceso de rendicion

                    if($bono->save())
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 1;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 0;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
                    }

                    $total++;
                    // 1->Bono Fisico
                    if($value_bono->id_clase_bono == 1){
                        $total_bonos++;
                        $total_efectivo += $value_bono->valor_atencion;
                    }

                    // 2->Sencillito
                    else if($value_bono->id_clase_bono == 2){
                        $total_bonos++;
                        $total_efectivo += $value_bono->valor_atencion;
                    }
                    // 3->Caja Vecina
                    else if($value_bono->id_clase_bono == 3)
                        $total_bonos++;
                    // 4->Bono Web
                    else if($value_bono->id_clase_bono == 4)
                        $total_bonos++;
                    // 5->Bono Web Pre-Pago
                    else if($value_bono->id_clase_bono == 5)
                        $total_bonos++;
                    // 6->Particular
                    else if($value_bono->id_clase_bono == 6)
                        $total_efectivo += $value_bono->valor_atencion;
                    else
                        $total_otros++;
                }
            }

            $rendicionCaja = new RendicionCaja();

            $rendicionCaja->tipo_rendicion = $tipo_rendicion;

            $rendicionCaja->bonos = $bonos;

            // $rendicionCaja->id_asistente = $asistenteRendicion->id;
            $rendicionCaja->id_profesional = $profesionalRendicion->id;
            $rendicionCaja->fecha_rendicion = $fecha_rendicion;

            $rendicionCaja->total_documentos = $total;
            $rendicionCaja->total_bono = $total_bonos;
            $rendicionCaja->total_efectivo = $total_efectivo;
            $rendicionCaja->total_otros = $total_otros;

            // $rendicionCaja->id_asistente_receptor = $asistenteReceptor->id;
            $rendicionCaja->id_profesional_receptor = $profesionalReceptor->id;
            $rendicionCaja->fecha_recepcion = Carbon::now()->format('Y-m-d H:i:s');
            $rendicionCaja->codigo_autorizacion = '';
            $rendicionCaja->observacion = $observaciones;
            $rendicionCaja->otro = '';
            $rendicionCaja->estado = 0;

            if($rendicionCaja->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro de Rendicion';
                $datos['last_id'] = $rendicionCaja->id;


                /** MANEJO DE ARCHIVOS */
                $archivos = json_decode($request->archivos);
                $info_archivos = '';
                $resulto_img = [];
                if($archivos)
                {
                    foreach ($archivos as $key => $value)
                    {
                        // [0] = url
                        // [1] = nombre_original
                        // [2] = nombre_archivo
                        // [3] = file_extension
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];


                        $nombre_final = 'rendicion_'.$rendicionCaja->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;
                        $resulto_img[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        $info_archivos .= $nombre_final.'|';
                    }

                    if(!empty($info_archivos))
                    {
                        $info_archivos = substr($info_archivos, 0, -1);
                        $rendicionCaja->archivos = $info_archivos;
                        if($rendicionCaja->save())
                        {
                            $datos['rendicion_archivo']['estado'] = 1;
                            $datos['rendicion_archivo']['msj'] = 'archivo registrado';
                        }
                        else
                        {
                            $datos['rendicion_archivo']['estado'] = 0;
                            $datos['rendicion_archivo']['msj'] = 'falla en registro de archivo';
                        }
                    }
                    else
                    {
                        $datos['rendicion_archivo']['estado'] = 0;
                        $datos['rendicion_archivo']['msj'] = 'problema en lectura de archivos';
                    }
                }
                else
                {
                    $datos['rendicion_archivo']['estado'] = 1;
                    $datos['rendicion_archivo']['msj'] = 'sin archivos a registrar';
                }


                $registro = RendicionCaja::where('id', $rendicionCaja->id)
                    ->with(['ProfesionalEmisor' => function($query){
                        $query->select('id','nombre','apellido_uno','apellido_dos');
                    }])
                    // ->with(['AsistenteReceptor' => function($query){
                    //     $query->select('id','nombres','apellido_uno','apellido_dos');
                    // }])
                    ->first();

                /** informacion de asistente o admin_inst_serv */
                $registro_receptor = Profesional::where('id', $profesionalReceptor->id)->first();
                if($registro_receptor)
                {
                    $registro->asistente_receptor = $registro_receptor;
                }
                else
                {
                    $registro_receptor = AdminInstServ::where('id', $registro->id_asistente_receptor)->first();
                    $registro->asistente_receptor = $registro_receptor;
                }
                $datos['registro'] = $registro;

                /** ENVIO DE AUTORIZACION POR EMAIL */
                $blade = 'solicitud_aprobacion_rendicion_caja';
                $to = array(
                    array('email' => $profesionalReceptor->email, 'name' => $profesionalReceptor->nombres.' '.$profesionalReceptor->apellido_uno.' '.$profesionalReceptor->apellido_dos)
                );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Solicitud de Aprobación de Rendición de Caja N°'.$rendicionCaja->id;

                // Generar URLs firmadas con expiración de 24 horas
                $url_aprobar = url('/api/laboratorio/aprobar-rendicion/' . $rendicionCaja->id . '/' . base64_encode($profesionalReceptor->email));
                $url_rechazar = url('/api/laboratorio/rechazar-rendicion/' . $rendicionCaja->id . '/' . base64_encode($profesionalReceptor->email));

                $body = array(
                    'id_rendicion' => $rendicionCaja->id,
                    'nombre_asistente' => $profesionalRendicion->nombres.' '.$profesionalRendicion->apellido_uno.' '.$profesionalRendicion->apellido_dos,
                    'fecha_rendicion' => $fecha_rendicion,
                    'url_aprobar' => $url_aprobar,
                    'url_rechazar' => $url_rechazar,
                    'total_documentos' => $total,
                    'total_bonos' => $total_bonos,
                    'total_efectivo' => $total_efectivo,
                );

                $archivo = ''; // pendiente
                $id_institucion = '';

                $result_email = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                if($result_email['estado'])
                {
                    $datos['mail']['institucion']['estado'] = 1;
                    $datos['mail']['institucion']['msj'] = 'Notificacion de rendicion enviado';

                    // Cambiar estado de la rendición a pendiente de aprobación
                    $rendicionCaja->estado = 1; // Pendiente de aprobación
                    $rendicionCaja->save();
                }
                else
                {
                    $datos['mail']['institucion']['estado'] = 0;
                    $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de rendicion';
                }
                /** SOLICITAR AUTORIZACION POR APP */
                $msj = array(
                    'id' => $rendicionCaja->id,
                    'nombre' => $profesionalReceptor->nombres.' '.$profesionalReceptor->apellido_uno.' '.$profesionalReceptor->apellido_dos,
                    'fecha' => $fecha_rendicion,
                    'tipo' => 'rendicion',
                    // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
                );

                /** calculo de periodo de vigencia para aprobacion */
                $fecha_actual  = date('Y-m-d H:i:s');
                $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

                $log_users_devices = new LogUsersDevices();
                $log_users_devices->id_user_create = $profesionalReceptor->id_usuario;
                if($profesionalReceptor->id_usuario)
                    $log_users_devices->id_user_recept = $profesionalReceptor->id_usuario;
                else
                    $log_users_devices->id_user_recept = $profesionalReceptor->id_admin;
                $log_users_devices->msg = json_encode($msj);
                $log_users_devices->estado = 0;
                $log_users_devices->fecha_ingreso = $fecha_actual;
                $log_users_devices->fecha_termino = $fecha_vencimiento;
                $log_users_devices->tipo = 1; // rendicion

                if($log_users_devices->save())
                {
                    $datos['autorizacion']['estado'] = 1;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                    $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                    $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                    $datos['autorizacion']['tiempo'] = 10;
                    $datos['autorizacion']['last_id'] = $log_users_devices->id;

                    $rendicionCaja->id_log_users_devices = $log_users_devices->id;
                    $rendicionCaja->estado = 1;
                    if($rendicionCaja->save())
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';
                    }
                    else
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                    }
                }
                else
                {
                    $datos['autorizacion']['estado'] = 0;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion con falla';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

     /**
     * Aprobar rendición desde correo electrónico
     */
    public function aprobarRendicionEmail($id_rendicion, $email_encoded)
    {
        try {
            $email = base64_decode($email_encoded);

            // Buscar la rendición
            $rendicion = RendicionCaja::find($id_rendicion);

            if (!$rendicion) {
                return view('respuesta_email', [
                    'estado' => 'error',
                    'titulo' => 'Rendición no encontrada',
                    'mensaje' => 'La rendición solicitada no existe en el sistema.'
                ]);
            }

            // Verificar que el email coincida con el receptor
            $profesional = Profesional::find($rendicion->id_profesional_receptor);
            if (!$profesional || $profesional->email !== $email) {
                $admin = AdminInstServ::find($rendicion->id_profesional_receptor);
                if (!$admin || $admin->email !== $email) {
                    return view('respuesta_email', [
                        'estado' => 'error',
                        'titulo' => 'No autorizado',
                        'mensaje' => 'No tienes permisos para aprobar esta rendición.'
                    ]);
                }
            }

            // actualizamos el registro en log_users_devices
            $log = LogUsersDevices::find($rendicion->id_log_users_devices);

            if ($log) {
                $log->estado = 1; // aprobado
                $log->save();
            }

            // Verificar que la rendición esté en estado pendiente (1)
            if ($rendicion->estado != 1) {
                $estados = [
                    0 => 'Creada',
                    1 => 'Pendiente de aprobación',
                    2 => 'Rechazada',
                    4 => 'Aprobada'
                ];
                return view('respuesta_email', [
                    'estado' => 'warning',
                    'titulo' => 'Rendición ya procesada',
                    'mensaje' => 'Esta rendición ya fue procesada. Estado actual: ' . ($estados[$rendicion->estado] ?? 'Desconocido')
                ]);
            }

            // Aprobar la rendición
            $rendicion->estado = 4; // Aprobada
            // $rendicion->fecha_aprobacion = now();
            $rendicion->save();

            // Actualizar estado de bonos a rendidos (2)
            $bonos = explode('|', $rendicion->bonos);
            foreach ($bonos as $id_bono) {
                $bono = Bono::find($id_bono);
                if ($bono) {
                    $bono->rendido = 2; // Completamente rendido
                    $bono->save();
                }
            }

            // Notificar al emisor de la aprobación
            $profesionalEmisor = Profesional::find($rendicion->id_profesional);
            if ($profesionalEmisor && $profesionalEmisor->email) {
                $blade = 'notificacion_aprobacion_rendicion';
                $to = [['email' => $profesionalEmisor->email, 'name' => $profesionalEmisor->nombres.' '.$profesionalEmisor->apellido_uno]];
                $asunto = 'Rendición de Caja N°'.$rendicion->id.' - APROBADA';
                $body = [
                    'id_rendicion' => $rendicion->id,
                    'nombre_receptor' => $profesional ? ($profesional->nombres.' '.$profesional->apellido_uno) : ($admin->nombre ?? 'Administrador'),
                    'fecha_aprobacion' => now()->format('d/m/Y H:i'),
                ];
                SendMailController::envioCorreo($blade, $to, [], [], $asunto, $body, '', '');
            }

            // Nombre del aprobador
            $nombre_aprobador = $profesional ? ($profesional->nombres.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos) : ($admin->nombre ?? 'Administrador');

            return view('rendicion_aprobada', [
                'id_rendicion' => $rendicion->id,
                'total_documentos' => $rendicion->total_documentos,
                'total_bonos' => $rendicion->total_bono,
                'total_efectivo' => $rendicion->total_efectivo,
                'nombre_aprobador' => $nombre_aprobador,
                'fecha_aprobacion' => now()->format('d/m/Y H:i'),
                'observaciones' => $rendicion->observacion
            ]);

        } catch (\Exception $e) {
            return view('respuesta_email', [
                'estado' => 'error',
                'titulo' => 'Error al procesar',
                'mensaje' => 'Ocurrió un error al aprobar la rendición: ' . $e->getMessage()
            ]);
        }
    }

    public function rechazarRendicionEmail($id_rendicion, $email_encoded)
    {
        try {
            $email = base64_decode($email_encoded);

            // Buscar la rendición
            $rendicion = RendicionCaja::find($id_rendicion);

            if (!$rendicion) {
                return view('respuesta_email', [
                    'estado' => 'error',
                    'titulo' => 'Rendición no encontrada',
                    'mensaje' => 'La rendición solicitada no existe en el sistema.'
                ]);
            }

            // Verificar que el email coincida con el receptor
            $profesional = Profesional::find($rendicion->id_profesional_receptor);
            if (!$profesional || $profesional->email !== $email) {
                $admin = AdminInstServ::find($rendicion->id_profesional_receptor);
                if (!$admin || $admin->email !== $email) {
                    return view('respuesta_email', [
                        'estado' => 'error',
                        'titulo' => 'No autorizado',
                        'mensaje' => 'No tienes permisos para rechazar esta rendición.'
                    ]);
                }
            }

            // actualizamos el registro en log_users_devices
            $log = LogUsersDevices::find($rendicion->id_log_users_devices);

            if ($log) {
                $log->estado = 2; // rechazado
                $log->save();
            }

            // Verificar que la rendición esté en estado pendiente (1)
            if ($rendicion->estado != 1) {
                $estados = [
                    0 => 'Creada',
                    1 => 'Pendiente de aprobación',
                    2 => 'Rechazada',
                    4 => 'Aprobada'
                ];
                return view('respuesta_email', [
                    'estado' => 'warning',
                    'titulo' => 'Rendición ya procesada',
                    'mensaje' => 'Esta rendición ya fue procesada. Estado actual: ' . ($estados[$rendicion->estado] ?? 'Desconocido')
                ]);
            }

            // Rechazar la rendición
            $rendicion->estado = 2; // Rechazada
            $rendicion->save();

            return view('respuesta_email', [
                'estado' => 'success',
                'titulo' => 'Rendición Rechazada',
                'mensaje' => 'Has rechazado correctamente la rendición N°' . $rendicion->id . '.'
            ]);

        } catch (\Exception $e) {
            return view('respuesta_email', [
                'estado' => 'error',
                'titulo' => 'Error al procesar',
                'mensaje' => 'Ocurrió un error al rechazar la rendición: ' . $e->getMessage()
            ]);
        }

    }

    public function lab_liquidacion_profesionales_pdf(Request $request){
        try {
            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            $titulo = 'Liquidación de Profesionales';
            $detalle = '';
            $nombre = 'liquidacion_profesionales_'.$institucion->id.'_'.$request->id_profesional.'_'.date('YmdHis');
            $template = 'lab_liquidacion_profesionales';
            $lugar_atencion = LugarAtencion::where('id', $institucion->id_lugar_atencion)->first();
            $profesional = Profesional::where('id', $request->id_profesional)->first();
            $funcionalidad = $request->funcionalidad ? $request->funcionalidad : 'V';
            $profesional = Profesional::find($request->id_profesional);

            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->first();

            $laboratorio = Instituciones::where('id_usuario', Auth::user()->id)->first();
            $horas_medicas = HoraMedica::where('horas_medicas.id_profesional', $profesional->id)
                                ->whereBetween('horas_medicas.created_at', [$request->fecha_inicio.' 00:00:00', $request->fecha_termino.' 23:59:59'])
                                ->join('procedimientos_centro', 'procedimientos_centro.id', 'horas_medicas.id_procedimiento')
                                ->where('id_estado', 6) // realizadas
                                ->get();

            $profesional_convenio = ProfesionalInstitucionConvenio::where('id_profesional', $profesional->id)
                                    ->where('id_institucion', $laboratorio->id)
                                    ->first();

            $porcentaje = $profesional_convenio ? $profesional_convenio->atencion : 10;

            if($contrato){
                $total_valor = $contrato->monto_imponible;
                $total_valor_convenio = $total_valor;
            }else{
                $total_valor = $horas_medicas->sum('valor');
                $total_valor_convenio = $total_valor * ($porcentaje / 100);
            }


            $mis_ventas = MisProducto::where('id_profesional', $profesional->id)
                    ->with('Producto')
                    ->whereBetween('created_at', [$request->fecha_inicio.' 00:00:00', $request->fecha_termino.' 23:59:59'])
                    ->get();

            $productos = [];
            $total = 0;
            foreach ($mis_ventas as $venta) {
                $nombre = $venta['producto']['nombre'];
                $precio = $venta['producto']['precio_venta'];
                if (!isset($productos[$nombre])) {
                    $productos[$nombre] = [
                        'total' => 0,
                        'color' => null, // puedes asignar colores aquí si quieres
                    ];
                }
                $productos[$nombre]['total'] += $precio;
                $total += $precio;
            }

            if($contrato){
                $total_a_pagar = $total;
            }else{
                $total_a_pagar = $total * (($profesional_convenio->ventas ?? 10) / 100);
            }

            $total_Valor_productos = $total_a_pagar;

            $bonos = Bono::where('id_profesional', $profesional->id)
                        ->whereBetween('created_at', [$request->fecha_inicio.' 00:00:00', $request->fecha_termino.' 23:59:59'])
                        ->get();

            $total_bonos = $bonos->sum('monto');

            // Preparar datos para la vista PDF
            $datos = [
                'titulo' => $titulo,
                'periodo' => date('m/Y', strtotime($request->fecha_inicio)) . ' - ' . date('m/Y', strtotime($request->fecha_termino)),
                'empresa' => [
                    'nombre' => $institucion->nombre_institucion ?? 'Institución',
                    'rut' => $institucion->rut ?? 'N/A',
                    'direccion' => $lugar_atencion->direccion->direccion ?? 'N/A',
                    'telefono' => $institucion->telefono ?? 'N/A'
                ],
                'trabajador' => [
                    'nombre' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                    'rut' => $profesional->rut,
                    'cargo' => $profesional->especialidad->nombre ?? 'Profesional',
                    'fecha_ingreso' => $profesional->created_at ? $profesional->created_at->format('d/m/Y') : 'N/A',
                    'afp' => 'N/A',
                    'salud' => 'N/A'
                ],
                'haberes' => [
                    ['concepto' => 'Comisión por Atenciones (' . $porcentaje . '%)', 'monto' => $total_valor_convenio],
                    ['concepto' => 'Venta de Productos', 'monto' => $total_a_pagar],
                    ['concepto' => 'Bonos', 'monto' => $total_bonos],
                ],
                'descuentos' => [
                    // Aquí puedes agregar descuentos si los hay
                ],
                'total_haberes' => $total_valor_convenio + $total_a_pagar + $total_bonos,
                'total_descuentos' => 0, // Calcula según tus descuentos
                'liquido_pagar' => $total_valor_convenio + $total_a_pagar + $total_bonos,
                'fecha_emision' => date('d/m/Y'),
                'codigo' => 'LIQ-' . $institucion->id . '-' . $request->id_profesional . '-' . date('Ymd'),
                'observaciones' => 'Liquidación correspondiente al período ' . date('d/m/Y', strtotime($request->fecha_inicio)) . ' al ' . date('d/m/Y', strtotime($request->fecha_termino)),
            ];

            $liquidacion = new LiquidacionesProfesional();
            $liquidacion->id_profesional = $profesional->id;
            $liquidacion->id_institucion = $institucion->id;
            $liquidacion->id_lugar_atencion = $lugar_atencion->id;

            $liquidacion->monto_imponible = $total_valor_convenio + $total_a_pagar;
            // $liquidacion->id_contrato = 0;
            $liquidacion->fecha_emision = Carbon::now();
            $liquidacion->fecha_inicio = $request->fecha_inicio;
            $liquidacion->fecha_termino = $request->fecha_termino;
            $liquidacion->numero_atenciones = count($horas_medicas);
            $liquidacion->descuentos = 0;
            $liquidacion->porcentaje = $porcentaje;
            $liquidacion->total = $total_valor_convenio + $total_a_pagar + $total_bonos;
            $liquidacion->id_usuario = Auth::user()->id;
            $liquidacion->estado = 1; // generado
            $liquidacion->save();

            return PdfController::generarPDF($titulo, $detalle, $nombre, $template, $funcionalidad, $datos);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function historialLiquidacionesProfesional(Request $request){
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
        $liquidaciones = LiquidacionesProfesional::where('id_institucion', $institucion->id)
                            ->where('id_profesional', $request->id_profesional)
                            ->with('Profesional')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return [
            'estado' => 1,
            'liquidaciones' => $liquidaciones,
        ];
    }

    public function cambiarEstadoSucursal(Request $request){
        $sucursal = Sucursal::find($request->id_sucursal);
        if($sucursal){
            $sucursal->estado = $request->estado;
            if($sucursal->save()){
                return [
                    'estado' => 1,
                    'msj' => 'Estado de sucursal actualizado',
                ];
            }else{
                return [
                    'estado' => 0,
                    'msj' => 'Falla al actualizar estado de sucursal',
                ];
            }
        }
    }

    public function eliminarSucursal(Request $request){

        $sucursal = Sucursal::find($request->id);
        if($sucursal){
            if($sucursal->delete()){
                return [
                    'estado' => 1,
                    'msj' => 'Sucursal eliminada',
                ];
            }else{
                return [
                    'estado' => 0,
                    'msj' => 'Falla al eliminar sucursal',
                ];
            }
        }
    }

    /**
     * MÉTODOS PARA GESTIÓN DE VACACIONES DE PROFESIONALES
     */

    // Guardar vacaciones de un profesional
    public function guardarVacaciones(Request $request) {
        $datos = array();
        $error = array();
        $valido = 1;

        // Validaciones
        if(empty($request->id_profesional)) {
            $error['id_profesional'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha_inicio)) {
            $error['fecha_inicio'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha_fin)) {
            $error['fecha_fin'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido) {
            // Validar que la fecha fin sea mayor que la fecha inicio
            $fecha_inicio = Carbon::parse($request->fecha_inicio);
            $fecha_fin = Carbon::parse($request->fecha_fin);

            if($fecha_fin->lt($fecha_inicio)) {
                return [
                    'estado' => 0,
                    'msj' => 'La fecha de fin debe ser posterior a la fecha de inicio'
                ];
            }

            // Calcular días
            $total_dias = $fecha_inicio->diffInDays($fecha_fin) + 1;

            // Crear registro de vacaciones
            try {
                $vacacion = new VacacionesProfesional();
                $vacacion->id_profesional = $request->id_profesional;
                $vacacion->fecha_inicio = $request->fecha_inicio;
                $vacacion->fecha_fin = $request->fecha_fin;
                $vacacion->total_dias = $total_dias;
                $vacacion->observaciones = $request->observaciones;
                $vacacion->notificar_profesional = $request->notificar_profesional ?? 0;
                $vacacion->estado = 1;
                $vacacion->id_usuario_registro = Auth::user()->id;
                $vacacion->save();

                // Si se debe notificar al profesional
                if($request->notificar_profesional == 1) {
                    $profesional = Profesional::find($request->id_profesional);
                    if($profesional) {
                        // Aquí puedes enviar un correo de notificación
                        // SendMailController::envioCorreo(...);
                    }
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'Vacaciones registradas correctamente';
                $datos['total_dias'] = $total_dias;

                // Verificar si la vacación es vigente hoy
                $hoy = Carbon::now()->format('Y-m-d');
                $es_vigente = $request->fecha_inicio <= $hoy && $request->fecha_fin >= $hoy;

                // Actualizar estado en profesionales_lugares_atencion
                if($es_vigente) {
                    // Vacación vigente hoy, desactivar profesional
                    DB::table('profesionales_lugares_atencion')
                        ->where('id_profesional', $request->id_profesional)
                        ->update(['estado' => 0]);
                } else {
                    // Vacación no vigente aún o ya pasada, verificar si hay otras vigentes
                    $vacacion_vigente = VacacionesProfesional::where('id_profesional', $request->id_profesional)
                        ->where('estado', 1)
                        ->where('fecha_inicio', '<=', $hoy)
                        ->where('fecha_fin', '>=', $hoy)
                        ->first();

                    if($vacacion_vigente) {
                        DB::table('profesionales_lugares_atencion')
                            ->where('id_profesional', $request->id_profesional)
                            ->update(['estado' => 0]);
                    } else {
                        DB::table('profesionales_lugares_atencion')
                            ->where('id_profesional', $request->id_profesional)
                            ->update(['estado' => 1]);
                    }
                }

            } catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al registrar vacaciones: ' . $e->getMessage();
            }
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos incompletos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    // Ver historial de vacaciones de un profesional
    public function historialVacaciones($id_profesional) {
        $datos = array();

        try {
            // Desactivar vacaciones expiradas antes de consultar
            $this->desactivarVacacionesExpiradas($id_profesional);

            // Buscar vacaciones del profesional
            $vacaciones = VacacionesProfesional::where('id_profesional', $id_profesional)
                                                ->where('estado', 1)
                                                ->orderBy('fecha_inicio', 'desc')
                                                ->get();

            $datos['estado'] = 1;
            $datos['msj'] = 'Historial de vacaciones';
            $datos['vacaciones'] = $vacaciones;

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al obtener historial: ' . $e->getMessage();
            $datos['vacaciones'] = [];
        }

        return $datos;
    }

    // Listar vacaciones
    public function listarVacaciones($id_profesional = null) {
        $datos = array();

        try {
            // Si se especifica id_profesional, filtrar por ese profesional
            // De lo contrario, obtener todas las vacaciones de la institución

            if($id_profesional) {
                $vacaciones = VacacionesProfesional::where('id_profesional', $id_profesional)
                                                    ->where('estado', 1)
                                                    ->with('profesional')
                                                    ->orderBy('fecha_inicio', 'desc')
                                                    ->get();
            } else {
                $vacaciones = VacacionesProfesional::where('estado', 1)
                                                    ->with('profesional')
                                                    ->orderBy('fecha_inicio', 'desc')
                                                    ->get();
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'Listado de vacaciones';
            $datos['vacaciones'] = $vacaciones;

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al listar vacaciones: ' . $e->getMessage();
        }

        return $datos;
    }

    // Eliminar vacaciones
    public function eliminarVacaciones(Request $request) {
        $datos = array();

        if(empty($request->id)) {
            return [
                'estado' => 0,
                'msj' => 'ID de vacaciones requerido'
            ];
        }

        try {
            $vacacion = VacacionesProfesional::find($request->id);
            if($vacacion) {
                $id_profesional = $vacacion->id_profesional;

                $vacacion->estado = 0; // Inactivar en lugar de eliminar
                $vacacion->save();

                // Verificar si quedan vacaciones activas
                $vacaciones_activas = VacacionesProfesional::where('id_profesional', $id_profesional)
                    ->where('estado', 1)
                    ->get();

                if($vacaciones_activas->isEmpty()) {
                    // No quedan vacaciones, volver estado a 1 (Activo) en todas las relaciones
                    DB::table('profesionales_lugares_atencion')
                        ->where('id_profesional', $id_profesional)
                        ->update(['estado' => 1]);
                } else {
                    // Verificar si alguna vacación está vigente hoy
                    $hoy = Carbon::now()->format('Y-m-d');
                    $vacacion_vigente = $vacaciones_activas->filter(function($vac) use ($hoy) {
                        return $vac->fecha_inicio <= $hoy && $vac->fecha_fin >= $hoy;
                    })->first();

                    if($vacacion_vigente) {
                        // Hay vacaciones vigentes, mantener estado = 0 (Vacaciones)
                        DB::table('profesionales_lugares_atencion')
                            ->where('id_profesional', $id_profesional)
                            ->update(['estado' => 0]);
                    } else {
                        // No hay vacaciones vigentes, volver estado a 1 (Activo)
                        DB::table('profesionales_lugares_atencion')
                            ->where('id_profesional', $id_profesional)
                            ->update(['estado' => 1]);
                    }
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'Vacaciones eliminadas correctamente';
            } else {
                $datos['estado'] = 0;
                $datos['msj'] = 'Vacaciones no encontradas';
            }

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al eliminar vacaciones: ' . $e->getMessage();
        }

        return $datos;
    }

    // Actualizar vacaciones
    public function actualizarVacaciones(Request $request) {
        $datos = array();

        if(empty($request->id)) {
            return [
                'estado' => 0,
                'msj' => 'ID de vacaciones requerido'
            ];
        }

        try {
            // Validar fechas
            $fecha_inicio = Carbon::parse($request->fecha_inicio);
            $fecha_fin = Carbon::parse($request->fecha_fin);

            if($fecha_fin->lt($fecha_inicio)) {
                return [
                    'estado' => 0,
                    'msj' => 'La fecha de fin debe ser posterior a la fecha de inicio'
                ];
            }

            $total_dias = $fecha_inicio->diffInDays($fecha_fin) + 1;

            $vacacion = VacacionesProfesional::find($request->id);
            if($vacacion) {
                $id_profesional = $vacacion->id_profesional;

                $vacacion->fecha_inicio = $request->fecha_inicio;
                $vacacion->fecha_fin = $request->fecha_fin;
                $vacacion->total_dias = $total_dias;
                $vacacion->observaciones = $request->observaciones;
                $vacacion->save();

                // Verificar si alguna vacación está vigente hoy después de la actualización
                $hoy = Carbon::now()->format('Y-m-d');
                $vacacion_vigente = VacacionesProfesional::where('id_profesional', $id_profesional)
                    ->where('estado', 1)
                    ->where('fecha_inicio', '<=', $hoy)
                    ->where('fecha_fin', '>=', $hoy)
                    ->first();

                if($vacacion_vigente) {
                    // Hay vacaciones vigentes, estado = 0 (Vacaciones)
                    DB::table('profesionales_lugares_atencion')
                        ->where('id_profesional', $id_profesional)
                        ->update(['estado' => 0]);
                } else {
                    // No hay vacaciones vigentes, estado = 1 (Activo)
                    DB::table('profesionales_lugares_atencion')
                        ->where('id_profesional', $id_profesional)
                        ->update(['estado' => 1]);
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'Vacaciones actualizadas correctamente';
            } else {
                $datos['estado'] = 0;
                $datos['msj'] = 'Vacaciones no encontradas';
            }

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al actualizar vacaciones: ' . $e->getMessage();
        }

        return $datos;
    }

    // Método para desactivar vacaciones expiradas
    public function desactivarVacacionesExpiradas($id_profesional = null) {
        try {
            $hoy = Carbon::now()->format('Y-m-d');

            $query = VacacionesProfesional::where('estado', 1)
                ->where('fecha_fin', '<', $hoy);

            if($id_profesional) {
                $query->where('id_profesional', $id_profesional);
            }

            $vacaciones_expiradas = $query->get();

            foreach($vacaciones_expiradas as $vacacion) {
                $vacacion->estado = 0;
                $vacacion->save();

                // Verificar si quedan vacaciones activas para este profesional
                $vacaciones_vigentes = VacacionesProfesional::where('id_profesional', $vacacion->id_profesional)
                    ->where('estado', 1)
                    ->where('fecha_inicio', '<=', $hoy)
                    ->where('fecha_fin', '>=', $hoy)
                    ->first();

                if(!$vacaciones_vigentes) {
                    // No hay vacaciones vigentes, activar profesional
                    DB::table('profesionales_lugares_atencion')
                        ->where('id_profesional', $vacacion->id_profesional)
                        ->update(['estado' => 1]);
                }
            }

            return [
                'estado' => 1,
                'msj' => 'Vacaciones expiradas desactivadas: ' . $vacaciones_expiradas->count(),
                'total' => $vacaciones_expiradas->count()
            ];

        } catch (\Exception $e) {
            return [
                'estado' => 0,
                'msj' => 'Error al desactivar vacaciones: ' . $e->getMessage()
            ];
        }
    }

    public function transcripcionExamenes()
    {
        // Resolver la institución/laboratorio del usuario autenticado
        $laboratorio = Laboratorio::where('id_usuario', Auth::user()->id)->first();

        if (!$laboratorio) {
            $responsable = AdminInstServ::where('id_admin', Auth::user()->id)->first();
            if ($responsable) {
                $laboratorio = Laboratorio::where('id_responsable', $responsable->id)->first();
            }
        }

        if (!$laboratorio) {
            return back()->with('error', 'Institución no encontrada');
        }

        $examenes_transcritos = FichaAtencion::select(
                                    'fichas_atenciones.id as fichas_atenciones_id',
                                    'fichas_atenciones.id_lugar_atencion as fichas_atenciones_id_lugar_atencion',
                                    'fichas_atenciones.id_paciente as fichas_atenciones_id_paciente',
                                    'fichas_atenciones.id_profesional as fichas_atenciones_id_profesional',
                                    'fichas_atenciones.finalizada as fichas_atenciones_finalizada',

                                    'examen_especialidad.id as examen_especialidad_id',
                                    'examen_especialidad.nombre as examen_especialidad_nombre',
                                    'examen_especialidad.cuerpo as examen_especialidad_cuerpo',
                                    'examen_especialidad.estado as examen_especialidad_estado',
                                    'examen_especialidad.id_ficha_atencion as examen_especialidad_id_ficha_atencion',
                                    'examen_especialidad.id_paciente as examen_especialidad_id_paciente',
                                    'examen_especialidad.id_profesional as examen_especialidad_id_profesional',
                                    'examen_especialidad.id_asistente as examen_especialidad_id_asistente',
                                    'examen_especialidad.id_tipo as examen_especialidad_id_tipo',
                                    'examen_especialidad.id_template as examen_especialidad_id_template',
                                    'examen_especialidad.id_examen_tipo as examen_especialidad_id_examen_tipo',
                                    'examen_especialidad.id_sub_tipo_especialidad as examen_especialidad_id_sub_tipo_especialidad',
                                    'examen_especialidad.id_ficha_especialidad as examen_especialidad_id_ficha_especialidad',

                                    'pacientes.id as paciente_id',
                                    'pacientes.rut as paciente_rut',
                                    'pacientes.nombres as paciente_nombres',
                                    'pacientes.apellido_uno as paciente_apellido_uno',
                                    'pacientes.apellido_dos as paciente_apellido_dos',
                                    'pacientes.telefono_uno as paciente_telefono_uno',
                                    'pacientes.email as paciente_email',
                                    'pacientes.fecha_nac as paciente_fecha_nac',

                                    'asistentes.id as asistentes_id',
                                    'asistentes.rut as asistentes_rut',
                                    'asistentes.nombres as asistentes_nombres',
                                    'asistentes.apellido_uno as asistentes_apellido_uno',
                                    'asistentes.apellido_dos as asistentes_apellido_dos',

                                    'horas_medicas.id as horas_medicas_id',
                                    'horas_medicas.fecha_consulta as horas_medicas_fecha_consulta',
                                    'horas_medicas.hora_inicio as horas_medicas_hora_inicio',
                                    'horas_medicas.hora_termino as horas_medicas_hora_termino',
                                    'horas_medicas.alias_examen as horas_medicas_alias_examen',
                                    'horas_medicas.descripcion as horas_medicas_descripcion',
                                    'horas_medicas.id_ficha_atencion as horas_medicas_id_ficha_atencion',
                                    'horas_medicas.id_estado as horas_medicas_id_estado'
                                )
                                ->join('examen_especialidad', 'examen_especialidad.id_ficha_atencion', '=', 'fichas_atenciones.id')
                                ->join('pacientes', 'pacientes.id', '=', 'fichas_atenciones.id_paciente')
                                ->join('asistentes', 'asistentes.id', '=', 'examen_especialidad.id_asistente')
                                ->join('horas_medicas', 'horas_medicas.id_ficha_atencion', '=', 'fichas_atenciones.id')
                                ->where('fichas_atenciones.id_lugar_atencion', $laboratorio->id_lugar_atencion)
                                ->whereIn('fichas_atenciones.finalizada', [2, 3])
                                ->get();

        return view('app.laboratorio.transcripcion_examenes', [
            'examenes_transcritos' => $examenes_transcritos,
            'laboratorio'          => $laboratorio,
        ]);
    }

    public function generarPdfInformeDictado(Request $request)
    {
        try {
            $ficha_atencion = FichaAtencion::where('id', $request->id_ficha_atencion)->first();
            $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);
            $paciente = Paciente::where('id', $ficha_atencion->id_paciente)->first();
            $lugar_atencion = LugarAtencion::where('id', $ficha_atencion->id_lugar_atencion)->first();
            $profesional = Profesional::where('id', $ficha_atencion->id_profesional)->first();
            // Certificados y QR - tipo 6 = Informe de Exámenes (transcripción)
            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 6);
            if ($temp_token['estado'] != 1) {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 6);
            }
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);

            $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 6, $ficha_atencion->id);
            if ($temp_token['estado'] != 1) {
                $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 6, $ficha_atencion->id);
            }
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_profesional);

            // Arreglos para la vista
            $array_ficha_atencion = [
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            ];

            $array_lugar_atencion = [
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
            ];

            $array_profesional = [
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'direccion' => $profesional->direccion->direccion.' '.$profesional->direccion->numero_dir.', '.$profesional->direccion->Ciudad()->first()->nombre,
                'especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre,
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'region' => $profesional->direccion->Ciudad()->first()->Region()->first()->nombre,
                'token' => $token_profesional,
                'url' => $url_profesional,
                'qr' => $qr_profesional,
            ];

            $direccion = $paciente->Direccion()->first();
            $array_paciente = [
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $direccion->direccion.' '.$direccion->numero_dir.', '.$direccion->Ciudad()->first()->nombre
            ];
            $contenido_html = $request->input('contenido_html', '');

            // Generar PDF
            $titulo  = 'Informe de Examen';
            $nombre  = 'informe_dictado_'.$ficha_atencion->id.'_'.date('YmdHis');
            $template = 'pdf_informe_dictado';

            $datos = [
                'array_ficha_atencion' => $array_ficha_atencion,
                'array_lugar_atencion' => $array_lugar_atencion,
                'array_profesional'    => $array_profesional,
                'array_paciente'       => $array_paciente,
                'contenido_html'       => $contenido_html,
            ];

            $resultado = PdfController::generarPDF($titulo, $datos, $nombre, $template, 'G');

            if ($resultado->estado == 1) {
                return response()->json([
                    'estado' => 1,
                    'msj'    => 'PDF generado correctamente',
                    'url'    => $resultado->pdf_url,
                ]);
            }

            return response()->json(['estado' => 0, 'msj' => 'Error al guardar el PDF']);

        } catch (\Exception $e) {
            return response()->json(['estado' => 0, 'msj' => 'Error al generar PDF: ' . $e->getMessage()]);
        }

    }
}
