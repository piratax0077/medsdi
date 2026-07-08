<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
use App\Models\AntecedentesUrgencias;
use App\Models\AsignacionUrgencia;
use App\Models\BoxAtencionServicio;
use App\Models\BoletaAlcoholemiaPaciente;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\ControlDomiciliario;
use App\Models\ControlObesidad;
use App\Models\CuracionesTipo;
use App\Models\CuracionesServicio;
use App\Models\CuracionesPlanasServicio;
use App\Models\CuracionesLppServicio;
use App\Models\CuracionesPieDiabetico;
use App\Models\CuracionesQuemados;
use App\Models\CuracionRegistro;
use App\Models\DetalleRecetaInterna;
use App\Models\Diabete;
use App\Models\Direccion;
use App\Models\DrogasPaciente;
use App\Models\EvolucionUrgencia;
use App\Models\EvolucionPacienteHospital;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenSadPerson;
use App\Models\ExamenSolicitudServicio;
use App\Models\ExamenMedico;
use App\Models\FichaAtencion;
use App\Models\GrupoSanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\InformesUrgenciasPuntaje;
use App\Models\JefeTurnosUrgencias;
use App\Models\NovedadesUrgencia;
use App\Models\Paciente;
use App\Models\PacienteSala;
use App\Models\PacienteBox;
use App\Models\PacienteTriage;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacientesDependientes;
use App\Models\Profesional;
use App\Models\ProcedimientoServicio;
use App\Models\ProfesionalesTurnos;
use App\Models\RecetaControl;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use App\Models\Region;
use App\Models\RescatePaciente;
use App\Models\Responsable;
use App\Models\ReponsableBodega;
use App\Models\ResultadoExamen;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\TiposReceta;
use App\Models\TipoApreciacionClinicaPaciente;
use App\Models\TipoRolesIncidentePaciente;
use App\Models\TratamientoInyectable;
use App\Models\User;

// PDF
use PDF;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\DetalleRecetaController;

class EscritorioEnfermerasController extends Controller
{
    /**
     * index manejado en el index de EscritorioProfesionalController
     */

    /** METODOS DE ENFERMERIA */
    public function atencion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            $id_paciente = $request->id_paciente;
            if(empty($request->id_paciente)) $id_paciente = 6;
            $paciente = Paciente::where('pacientes.id', $id_paciente)->first();
            return $request;
            /** carga de direccion en paciente */
            $direccion = Direccion::find($paciente->id_direccion);
            if (!$direccion == null)
            {
                $ciudad = Ciudad::find($direccion->id_ciudad);
                if($ciudad)
                    $region = Region::find($ciudad->id_region);
                else
                    $region = null;
            }
            else
            {
                $direccion = null;
                $ciudad = null;
                $region = null;
            }

            $paciente->direccion = (object)array(
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
            );

            /* FMU CONTACTO EMERGENCIA */
            $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();

            /* CONTACTO EMERGENCIA */
            $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();
            if(is_object($pacientes_contacto_emergencia))
            {
                $contacto_emergencia = ContactoEmergencia::find($pacientes_contacto_emergencia->id_contacto);

                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
                $contacto_emergencia->edad = $edad;

            }
            else
            {
                $contacto_emergencia = (object) array(
                    'nombre'=>'N/A',
                    'apellido_uno'=>'N/A',
                    'apellido_dos'=>'N/A',
                    'rut'=>'N/A',
                    'edad'=>'N/A',
                    'email'=>'N/A',
                    'fecha_nac'=>'N/A',
                    'telefono'=>'N/A',
                    'parentezco'=>'N/A'
                );
            }

            /** FMU ALERGIAS */
            $paciente_alergias = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente', 5)->get();

            /* ANTECEDENTES */
            $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->get();

            foreach ($antecedentes as $valor)
            {
                $valor['antecedente_data'] = json_decode($valor['data']);
            }

            $antecedentes_paciente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
            if (isset($antecedentes_paciente))
            {
                $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
                $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
                $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
                $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 2)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
            }
            else
            {
                $medicamentos_cronicos = [];
                $alergias = [];
                $antecedentes_quirurgicos = [];
                $patoligias_cronicas = [];
            }

            $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
            $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
            $diabetes = Diabete::where('id_paciente', $paciente->id)->get();


            /** resultado de examenes */
            $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
            if($resultado_examen)
            {
                foreach ($resultado_examen as $key => $value)
                {
                    $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
                }
            }


            /* ANTECEDENTES */
            $id_antecedente = $paciente->id_antecedente;
            if($id_antecedente!=null)
            {
                $antecedentes_paciente = AntecedentesPaciente::find($id_antecedente);
            }
            else
            {
                $antecedentes_paciente = (object) array(
                    'id'=>'',
                    'transfusion'=>'N/A',
                    'dona_organos'=>'N/A',
                    'dona_organos_parcial'=>'N/A',
                    'dona_sangre'=>'N/A',
                    'impedimento_donar'=>'N/A',
                    'comentario_gs'=>'N/A',
                    'comentarios'=>'N/A',
                    'hepatitis'=>'N/A',
                    'comentario_hepa'=>'N/A',
                    'id_grupo_sanguineo'=>0,
                );
            }

            /* SANGUINEO */
            $id_grupo_sanguineo = $antecedentes_paciente->id_grupo_sanguineo;
            if($id_grupo_sanguineo!=0)
            {
                $grupo_sanguineo = GrupoSanguineo::find($id_grupo_sanguineo);
            }
            else
            {
                $grupo_sanguineo = (object) array(
                    'id'=> 0,
                    'nombre_gs'=> 'N/A',
                    'descripcion_gs'=> 'N/A'
                );
            }

            /** Control enfermedades Cronicas */
            $control_enfer_cronicas = array();
            /** obsidad */
            $obesidad = ControlObesidad::where('id_paciente', $paciente->id)->get();
            if($obesidad)
            {
                foreach ($obesidad as $key => $value)
                {
                    $temp = array(
                        'fecha' => date('d-m-Y', strtotime($value->created_at)),
                        'tipo' => 'Obesidad',
                        'detalle' => array(
                            'Peso' => $value->peso,
                            'Variación' => $value->variacion,
                            'Ideal' => $value->ideal,
                        )
                    );
                    $control_enfer_cronicas[] = $temp;
                }
            }

            /** diabetes */
            $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
            if($diabetes)
            {
                foreach ($diabetes as $key => $value)
                {
                    $temp = array(
                        'fecha' => date('d-m-Y', strtotime($value->created_at)),
                        'tipo' => 'Diabetes',
                        'detalle' => array(
                            'Peso' => $value->peso,
                            'Piés' => $value->pies,
                            'HG A1c' => $value->hgac1,
                            'Colesterol' => $value->colesterol,
                            'Creatina' => $value->creatina,
                            'Glicosilada postprandial' => $value->glicosilada_postprandial,
                            'Glicosilada ayuno' => $value->glicosinada_ayuno,
                        )
                    );
                    $control_enfer_cronicas[] = $temp;
                }
            }

            /** hipertensiones */
            $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
            if($hipertension)
            {
                foreach ($hipertension as $key => $value)
                {
                    $temp = array(
                        'fecha' => date('d-m-Y', strtotime($value->created_at)),
                        'tipo' => 'Hipertensión',
                        'detalle' => array(
                            'Presión Sistólica' => $value->sistolica,
                            'Presión Diastólica' => $value->diastolica,
                            'Presión Ideal' => $value->ideal,
                        )
                    );
                    $control_enfer_cronicas[] = $temp;
                }
            }

            /** RESPONSABLES */
            $responsables = '';
            /** validar si es dependiente */
            $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();

            if(count($array_id_responsable) > 0)
            {
                $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
            }

            $contacto_emergencia_html = "
                <table class='table table-bordered table-xs'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Materno</th>
                            <th>Apellido Paterno</th>
                            <th>Rut</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Fecha Nacimiento</th>
                            <th>Teléfono</th>
                            <th>Parentezco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>$contacto_emergencia->nombre</td>
                            <td>$contacto_emergencia->apellido_uno</td>
                            <td>$contacto_emergencia->apellido_dos</td>

                            <td>$contacto_emergencia->rut</td>
                            <td>$contacto_emergencia->edad</td>
                            <td>$contacto_emergencia->email</td>

                            <td>$contacto_emergencia->fecha_nac</td>
                            <td>$contacto_emergencia->telefono</td>
                            <td>$contacto_emergencia->parentezco</td>
                        </tr>
                    </tbody>
                </table>
            ";

            $responsables_html = "
                <table class='table table-bordered table-xs'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Materno</th>
                            <th>Apellido Paterno</th>
                            <th>Rut</th>
                            <th>Email</th>
                            <th>Teléfono </th>
                        </tr>
                    </thead>
                    <tbody>";
                    if($responsables)
                    {
                        foreach ($responsables as $key => $value)
                        {
                            $responsables_html .= "<tr>
                                <td>$value->nombres</td>
                                <td>$value->apellido_uno</td>
                                <td>$value->apellido_dos</td>
                                <td>$value->rut</td>
                                <td>$value->email</td>
                                <td>$value->telefono</td>
                            </tr>";
                        }
                    }
            $responsables_html .=     "</tbody>
                </table>";

            /** RECETAS */
            $fecha_actual = date("d-m-Y");
            $regisrto_result = array();
            $lista_recetas = Recomendacion::whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 week")) )->pluck('id')->toArray();
            if($lista_recetas)
            {
                $registros = Recomendacion::whereIn('id', $lista_recetas)->get();
                if($registros)
                {
                    $regisrto_result = array();
                    foreach ($registros as $key => $value)
                    {
                        $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                        $detalle_temp = array();
                        if($detalle)
                        {
                            $detalle_temp = array();
                            foreach ($detalle as $key_det => $value_det)
                            {
                                $detalle_temp[] = array(
                                    'id' => $value_det->id,
                                    'id_receta' => $value_det->id_recomendacion,
                                    'id_tipo_control' => decrypt($value_det->control),
                                    'id_producto' => decrypt($value_det->id_articulo),
                                    'producto' => decrypt($value_det->articulo),
                                    'farmaco' => decrypt($value_det->componente),
                                    'id_presentacion' => decrypt($value_det->id_apariencia),
                                    'presentacion' => decrypt($value_det->apariencia),
                                    'id_receta_dosis' => decrypt($value_det->id_cuota),
                                    'posologia' => decrypt($value_det->cuota),
                                    'id_via_administracion' => decrypt($value_det->id_regimen),
                                    'via_administracion' => decrypt($value_det->regimen),
                                    'id_periodo' => decrypt($value_det->id_lapso),
                                    'periodo' => decrypt($value_det->lapso),
                                    'uso_cronico' => decrypt($value_det->uso_frecuente),
                                    'cantidad_compra' => decrypt($value_det->volumen_compra),
                                    'cantidad' => decrypt($value_det->volumen),
                                    'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                                    'comentario' => decrypt($value_det->comentario),
                                    'token_doc' => $value_det->cod_doc,
                                    'estado' => $value_det->estado,
                                    'created_at' => $value_det->created_at,
                                    'updated_at' => $value_det->updated_at,
                                );
                            }
                        }

                        $regisrto_result[] = array(
                            'id' => $value->id,
                            'id_ficha_atencion' => $value->atencion,
                            'id_ingreso_paciente' => $value->salida,
                            'id_recuperacion' => $value->herir,
                            'id_sala' => $value->cuadro,
                            'id_paciente' => $value->activo,
                            'id_profesional' => $value->aficionado,
                            'id_tipo_control' => $value->control,
                            'token_doc' => $value->cod_doc,
                            'token_auto' => $value->cod_auto,
                            'pdf' => $value->info,
                            'estado' => $value->estado,
                            'detalle' => $detalle_temp,
                            'created_at' => $value->created_at,
                            'updated_at' => $value->updated_at,
                        );
                    }
                }
            }
            // $regisrto_result
            $receta_activa_html = "
                <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Fecha Receta</th>
                        <th>Producto</th>
                        <th>Presentación</th>
                        <th>Posologia</th>
                        <th>Via<br/>Administracion</th>
                        <th>Periodo</th>
                        <th>Cantidad Compra</th>
                    </tr>
                </thead>
                <tbody>";
                if($regisrto_result)
                {
                    foreach ($regisrto_result as $key => $value)
                    {
                        foreach ($value['detalle'] as $key_detalle => $value_detalle)
                        {
                            $receta_activa_html .= "
                                <tr>
                                    <td>".date('d-m-Y', strtotime($value['created_at']))."</td>
                                    <td>".$value_detalle['producto']."<br/><span style=\"font-size:10px;\">".$value_detalle['farmaco']."</span></td>
                                    <td>".$value_detalle['presentacion']."</td>
                                    <td>".$value_detalle['posologia']."</td>
                                    <td>".$value_detalle['via_administracion']."</td>
                                    <td>".$value_detalle['periodo']."</td>
                                    <td>".$value_detalle['cantidad_compra']."</td>
                                </tr>";
                        }
                    }
                }
            $receta_activa_html .= "
                </tbody>
            </table>";

            $datos = (object)array(
                'contacto_emergencia' =>  $contacto_emergencia_html,
                'tratamientos_activos' => $receta_activa_html,
                'confidencial' => '',
                'responsables' => $responsables_html,

            );


            /** EXAMENES DE ESPECIALIDAD REALIZADOS */
            $examenes_especialidad_realizados = ExamenEspecialidad::select('id', 'id_tipo', 'id_template', 'id_examen_tipo', 'id_sub_tipo_especialidad', 'id_ficha_atencion', 'id_ficha_especialidad', 'id_paciente', 'id_profesional', 'id_asistente', 'nombre', 'revisado', 'estado')
                                                                // ->with(['HoraMedica' => function($query){
                                                                //     $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                                                // }])
                                                                ->with(['ExamenEspecialidadTemplate' => function($query){
                                                                    $query->select('id', 'nombre', 'alias');
                                                                }])
                                                                ->with(['ExamenEspecialidadTipo' => function($query){
                                                                    $query->select('id', 'nombre', 'descripcion');
                                                                }])
                                                                ->with(['SubTipoEspecialidad' => function($query){
                                                                    $query->select('id', 'nombre');
                                                                }])
                                                                ->where('id_paciente', $paciente->id)
                                                                ->get();
            foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
            {
                if($value_ex_esp_realizado->id_sub_tipo_especialidad == 27)
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
                else if($profesional->id_especialidad != 1)
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
                else
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
            }

            /** resultado de examenes */
            $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
            if($resultado_examen)
            {
                foreach ($resultado_examen as $key => $value)
                {
                    $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
                }
            }

            $receta_control = RecetaControl::orderBy('Descripcion')->get();

            $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();

            // triage del paciente
            $pt = PacienteTriage::where('id_paciente', $paciente->id)->first();


            $niveles_urgencia = AsignacionUrgencia::all();
            // Si existe un paciente en espera
            if($pt){
                foreach($niveles_urgencia as $nu){
                    if($nu->id == $pt->id_triage){
                        $paciente->clase = $nu->clase_html;
                        $paciente->descripcion = $nu->descripcion;
                    }
                }
            }

            // $datos['estado'] = 1;
            // $datos['msj'] = 'exito';
            $responsables = Responsable::all();

            $controles_ciclo = $this->dameEvolucionesPaciente($paciente->id);

            if(count($controles_ciclo) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_evaluaciones = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_evaluaciones = count($controles_ciclo) + 1;
            }

            foreach($controles_ciclo as $cc)
            {
                $cc->datos_evolucion = json_decode($cc->datos_evolucion);
            }

            $tipos_curaciones = CuracionesTipo::all();

            $tipos_receta = TiposReceta::all();

            $detalle_receta_controlador = new DetalleRecetaController();
            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente['id']);

            foreach($recetas as $receta)
            {
                if($receta->id_dosis == null){
                    $receta->dosis = $receta->nombre_dosis;
                }

                $receta->frecuencia = $receta->nombre_frecuencia;

            }

            $procedimientos = $this->dameProcedimientosPaciente($paciente->id);
            $curaciones = $this->dameCuracionesPaciente($paciente->id);
            $examenControlador = new ExamenMedicoController();
            $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id);
            $curaciones_planas = $this->dameCuracionesPlanasPaciente($paciente->id, $request->id_ficha_atencion ?? null);
            $curaciones_lpp = $this->dameCuracionesLppPaciente($paciente->id, $request->id_ficha_atencion ?? null);
            // variable que identifica si el usuario es enfermera
            $enfermera = true;

            // ultimo controla de ciclo
            $ultimo_control_ciclo = EvolucionUrgencia::where('id_paciente', $paciente->id)->orderBy('id', 'desc')->first();
            if($ultimo_control_ciclo)
                $ultimo_control_ciclo->datos_evolucion = json_decode($ultimo_control_ciclo->datos_evolucion);

            $resumen_recetas = "";
            foreach($recetas as $r){
                $resumen_recetas .= "<p>".$r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."</p>";
            }

            $tieneRecetaPendiente_ = false;
            // buscar recetas con estado 1
            foreach($recetas as $key => $receta)
            {
                if($receta->estado_tratamiento == 1)
                {
                    $tieneRecetaPendiente_ = true;
                    break;
                }
            }

            $bc = new BoxController();
            $boxes = $bc->dame_boxes_atencion();

                    // dame los pacientes que esten en cada box
        foreach($boxes as $box)
        {
            $box->pacientes = $this->dame_pacientes_box($box->id);
            // guardar la edad de cada paciente por el atributo fecha_nac
            foreach($box->pacientes as $paciente_box)
            {
                list($ano,$mes,$dia) = explode("-",$paciente_box->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente_box->edad = $edad;

                $detalle_receta_controlador = new DetalleRecetaController();
                $recetas_ = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente_box->id_paciente);

                // Inicializar la variable booleana como false
                $tieneRecetaPendiente = false;
                // Recorrer las recetas
                foreach ($recetas_ as $receta) {
                    // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                    if ($receta->estado_tratamiento == 1) {
                        // Si se encuentra una receta pendiente, cambiar la variable a true
                        $tieneRecetaPendiente = true;
                        // Salir del ciclo
                        break;
                    }
                }

                $paciente_box->tieneRecetaPendiente = $tieneRecetaPendiente;
            }
        }

        $pacientes_esperando = $this->dame_pacientes_en_espera();

        $examen_sad_person = $this->dame_examen_sad_person($paciente->id);

        $regiones = Region::all();
        $ciudades = Ciudad::all();

        $tipos_roles_incidentes = TipoRolesIncidentePaciente::all();
        $tipos_apreciaciones_paciente = TipoApreciacionClinicaPaciente::all();


        $ficha_atencion = FichaAtencion::where('id_paciente', $paciente->id)->first();

        $boleta_alcoholemia_paciente = $this->dame_boleta_alcoholemia_paciente($paciente->id, $ficha_atencion->id);

        $rescate_paciente = RescatePaciente::where('id_paciente', $paciente->id)->where('id_ficha_atencion',$ficha_atencion->id)->first();

        $examen_drogas = $this->dame_examen_drogas($paciente->id, $ficha_atencion->id);

        $antecedentes_urgencia_paciente = $this->dame_antecedentes_urgencia_paciente($paciente->id, $ficha_atencion->id);

        $puntajes_informes = InformesUrgenciasPuntaje::where('id_ficha_atencion', $ficha_atencion->id)->where('id_paciente', $paciente->id)->first();

        // Cargar tratamientos inyectables
        $tratamientos_inyectables = TratamientoInyectable::where('ficha_atencion_id', $ficha_atencion->id)
            ->where('paciente_id', $paciente->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $servicio_interno = ServiciosInternos::find(12);
            // return redirect()->to('page/tens/escritorio_atencion')->with([
            return view('page.enfermera.escritorio_atencion')->with([
                'paciente' => $paciente,
                'responsables' => $responsables,
                'controles_ciclo' => $controles_ciclo,
                'ultimo_control_ciclo' => $ultimo_control_ciclo,
                'niveles_urgencia' => $niveles_urgencia,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'tipos_curaciones' => $tipos_curaciones,
                'tipos_receta' => $tipos_receta,
                'recetas' => $recetas,
                'tiene_receta_pendiente' => $tieneRecetaPendiente_,
                'resumen_recetas' => $resumen_recetas,
                'procedimientos' => $procedimientos,
                'examenes_solicitados' => $examenes_solicitados,
                'examen_sad_person' => $examen_sad_person,
                'rescate_paciente' => $rescate_paciente ? $rescate_paciente : null,
                'examen_drogas' => $examen_drogas ? $examen_drogas : null,
                'antecedentes_urgencia_paciente' => $antecedentes_urgencia_paciente,
                'puntajes_informes' => $puntajes_informes,
                'curaciones' => $curaciones,
                'curacion_plana' => $curaciones_planas,
                'curaciones_lpp' => $curaciones_lpp,
                'tratamientos_inyectables' => $tratamientos_inyectables,
                'enfermera' => $enfermera,
                'boxes' => $boxes,
                'pacientes_esperando' => $pacientes_esperando,
                // 'responsable' => $responsable,
                'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                // 'prevision' => $prevision,
                'profesional' => $profesional,
                // 'medicamento' => $medicamento,
                // 'hora_medica' => $hora_medica,
                // 'fichas' => $fichas,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                'tipo_roles_incidentes' => $tipos_roles_incidentes,
                'tipos_apreciaciones_paciente' => $tipos_apreciaciones_paciente,
                'boleta_alcoholemia_paciente' => $boleta_alcoholemia_paciente,
                // 'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                // 'ciudad' => $ciudad,
                'examenMedico' => $examenMedico,
                // 'medicamentos_cronicos' => $medicamentos_cronicos,
                // 'alergias' => $alergias,
                // 'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'patoligias_cronicas' => $patoligias_cronicas,
                // 'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' =>87, // lugar de atencion de prueba
                'id_ficha_atencion' => $ficha_atencion ? $ficha_atencion->id : null,
                // 'lugar_atencion' => $lugar_atencion,
                // 'lugares_atencion ' => $lugares_atencion ,
                // 'id_ficha_atencion' => $id_ficha_atencion,
                // 'especialidad' => $especialidad,
                // 'interconsulta' => $interconsulta,
                // 'fichaTipo' => $fichaTipo,
                // 'examen_tipo' => $examen_tipo,
                // 'examen' => $examen,
                // 'lista_examen_especial' => $lista_examen_especial,
                // 'examenes_especialidad' => $examenes_especialidad,
                // 'examenes_radiologicos' => $examenes_radiologicos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                // 'institucion' => $institucion,
                // 'cns_tipo' => $cns_tipo,
                // 'cns_tipo_template' => $cns_tipo_template,
                // 'cns_registros' => $cns_registros,
                'resultado_examen' => $resultado_examen,
                // 'tipo_antecedente' => $tipo_antecedente,
                'receta_control' => $receta_control,

                /** FMU */
                // 'id_usuario' => $id_usuario,
                //// 'paciente' => $paciente,
                // 'contacto_emergencia' => $contacto_emergencia,
                'antecedentes_paciente' => $antecedentes_paciente,
                'grupo_sanguineo' => $grupo_sanguineo,
                'antecedentes' => $antecedentes,
                'token' => $request->token,
                // 'fichas' => $fichas,
                // 'especialidad' => $especialidad,
                // 'sub_tipo_especialidad' => $sub_tipo_especialidad,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
                'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
                'tratamiento_activo' => $regisrto_result,
                //// 'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                //// 'resultado_examen' => $resultado_examen,
                'control_enfer_cronicas' => $control_enfer_cronicas,

                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/
                // 'licencia' => $licencia,

                /** RESPONSABLES */
                // 'responsables'  => $responsables,
                // 'acompanantes'  => $acompanantes,
            ]);
        }
        else
        {

            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
            return redirect()->back()->with(['mensaje'=>'Paciente reuqerido']);
        }
    }

    public function guardar_informes(Request $req){
        try {
            $existe = InformesUrgenciasPuntaje::where('id_paciente', $req->id_paciente)->where('id_ficha_atencion', $req->id_ficha_atencion)->first();
            if($existe){
                return ['estado'=>0, 'mensaje'=>'Ya existe un informe para este paciente'];
            }
            $informe_urgencia = new InformesUrgenciasPuntaje();
            $informe_urgencia->id_paciente = $req->id_paciente;
            $informe_urgencia->id_ficha_atencion = $req->id_ficha_atencion;
            $informe_urgencia->id_lugar_atencion = $req->id_lugar_atencion;
            $informe_urgencia->barthel = $req->puntos_barthel;
            $informe_urgencia->braden = $req->puntos_braden;
            $informe_urgencia->cudyr_riesgo = $req->ptos_criesg_;
            $informe_urgencia->cudyr_dependencia = $req->puntos_cdep;
            $informe_urgencia->riesgo_caida = $req->puntos_riesgo_caida;
            $informe_urgencia->eva = $req->puntos_eva;
            $informe_urgencia->balance_hidrico = $req->puntos_balance;
            $informe_urgencia->glasgow = $req->puntos_glasgow;
            $informe_urgencia->id_profesional = Auth::user()->id;
            $informe_urgencia->fecha = Carbon::now()->format('Y-m-d');
            $informe_urgencia->id_estado = 1;
            if($informe_urgencia->save()){
                return ['estado'=>1, 'mensaje'=>'Informe guardado correctamente'];
            }else{
                return ['estado'=>0, 'mensaje'=>'Error al guardar el informe'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado'=>0, 'mensaje'=>$e->getMessage()];
        }
    }

    public function dame_antecedentes_urgencia_paciente($id_paciente, $id_ficha_atencion)
    {
        $antecedentes_urgencia_paciente = AntecedentesUrgencias::where('id_paciente', $id_paciente)->where('id_ficha_atencion', $id_ficha_atencion)->first();
        if($antecedentes_urgencia_paciente){
            return $antecedentes_urgencia_paciente;
        }else{
            return null;
        }
    }

    public function entrega_turno()
    {
        try {
            $pacientes_finalizados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('estado', 'FINALIZADO')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();
            $pacientes_ingresados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','paciente_box.id_box')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->join('paciente_box','paciente_box.id_paciente','=','pacientes_triage.id_paciente')
                                        ->where('estado', 'INGRESADO')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $pacientes_rechazados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('estado', 'RECHAZO')
                                        ->orWhere('estado','ALTA')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $pacientes_fallecidos = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('estado', 'FALLECIDO')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $pacientes_graves = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('id_triage', 1)
                                        ->orWhere('id_triage', 2)
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $novedades_turno_urgencias = NovedadesUrgencia::where('fecha', date('Y-m-d'))->where('tipo_novedad','urgencias')->get();
            $novedades_turno_hospital = NovedadesUrgencia::where('fecha', date('Y-m-d'))->where('tipo_novedad','hospital')->get();

            foreach($pacientes_graves as $paciente){
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            foreach($pacientes_fallecidos as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            foreach($pacientes_rechazados as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }


            foreach($pacientes_finalizados as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            foreach($pacientes_ingresados as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            $equipo_trabajo = JefeTurnosUrgencias::where('id_profesional', Auth::user()->id)->first();
            if($equipo_trabajo){
                $equipo_trabajo->profesional = Profesional::find($equipo_trabajo->id_profesional);
            }else{
                $equipo_trabajo = JefeTurnosUrgencias::where('id_profesional',3)->first();
            }
            // buscar los profesionales que pertenecen al equipo
            $profesionales = ProfesionalesTurnos::where('equipo', $equipo_trabajo->equipo)
                                                ->where('id_lugar_atencion', $equipo_trabajo->id_lugar_atencion)
                                                ->where('tipo_turno', $equipo_trabajo->tipo_turno)
                                                ->first();

            $profesionales->ids_profesionales = json_decode($profesionales->ids_profesionales);
            $profesionales->profesionales = Profesional::whereIn('id', $profesionales->ids_profesionales)->get();

            return view('page.enfermera.entrega_turno')->with([
                'pacientes_finalizados' => $pacientes_finalizados,
                'pacientes_ingresados' => $pacientes_ingresados,
                'pacientes_despachados' => $pacientes_rechazados,
                'pacientes_fallecidos' => $pacientes_fallecidos,
                'pacientes_graves' => $pacientes_graves,
                'novedades' => $novedades_turno_urgencias,
                'profesionales'=> $profesionales->profesionales,
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_examen_drogas($id_paciente, $id_ficha_atencion)
    {
        $examen_drogas = DrogasPaciente::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->first();
        if($examen_drogas){
            $examen_drogas->datos_examen_drogas = json_decode($examen_drogas->datos_examen_drogas);
            return $examen_drogas;
        }

    }

    public function dame_boleta_alcoholemia_paciente($id_paciente, $id_ficha_atencion)
    {
        $boleta_alcoholemia_paciente = BoletaAlcoholemiaPaciente::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->first();
        if($boleta_alcoholemia_paciente){
            $boleta_alcoholemia_paciente->datos_paciente_alcoholemia = json_decode($boleta_alcoholemia_paciente->datos_paciente_alcoholemia);
            return $boleta_alcoholemia_paciente;
        }

    }

    public function dame_examen_sad_person($id_paciente)
    {
        $examen_sad_person = ExamenSadPerson::where('id_paciente', $id_paciente)->first();
        return $examen_sad_person;
    }


    public function triage()
    {
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->get();

        $niveles_urgencia = AsignacionUrgencia::all();

        return view('page.enfermera.escritorio_triage')->with([
            'pacientes' => $pacientes,
            'niveles_urgencia' => $niveles_urgencia,
        ]);
    }

    public function box()
    {
        $bc = new BoxController();
        $boxes = $bc->dame_boxes_atencion();
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.estado',"EN ESPERA")
                                    ->orderBy('asignacion_urgencia.codigo','asc')
                                    ->get();

        // dame los pacientes que esten en cada box
        foreach($boxes as $box)
        {
            $box->pacientes = $this->dame_pacientes_box($box->id);
            foreach($box->pacientes as $paciente)
            {
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;

                $detalle_receta_controlador = new DetalleRecetaController();
                $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                // Inicializar la variable booleana como false
                $tieneRecetaPendiente = false;
                // Recorrer las recetas
                foreach ($recetas as $receta) {
                    // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                    if ($receta->estado_tratamiento == 1) {
                        // Si se encuentra una receta pendiente, cambiar la variable a true
                        $tieneRecetaPendiente = true;
                        // Salir del ciclo
                        break;
                    }
                }

                $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;

                $ficha_atencion = FichaAtencion::where('id_paciente', $paciente->id_paciente)->first();
                if($ficha_atencion) $paciente->id_ficha = $ficha_atencion->id; else $paciente->id_ficha = 0;
            }
        }

        $pacientes_graves = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes.sexo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_triage', 1)
                                    ->orWhere('pacientes_triage.id_triage', 2)
                                    ->get();

        $pacientes_urgentes = [];

        foreach($pacientes_graves as $paciente){
            // calcular edad del paciente por fecha de nacimiento
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
            // pacientes que no esten en ningun box
            $p = PacienteBox::where('id_paciente', $paciente->id_paciente)->first();
            if(!$p){
                $pacientes_urgentes[] = $paciente;
            }
        }

        // dar formato de colección a los pacientes
        $pacientes_urgentes = collect($pacientes_urgentes);

        // agregar a pacientes_triage los pacientes urgentes
        $pacientes = $pacientes->merge($pacientes_urgentes);

        // por cada paciente, buscar su ficha de atencion
        // foreach($pacientes as $paciente){
        //     $ficha = FichaAtencion::where('id_paciente', $paciente->id_paciente)->first();
        //     if($ficha) $paciente->id_ficha = $ficha->id; else $paciente->id_ficha = 0;
        // }

        return view('page.enfermera.escritorio_box')->with([
            'boxes' => $boxes,
            'pacientes_triage' => $pacientes,
            'pacientes_graves' => $pacientes_urgentes,
        ]);
    }

    public function ambulancia()
    {
        return view('page.enfermera.escritorio_ambulancia')->with([]);
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

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($id_lugar_atencion) {
                                        $query->select('id', 'id_lugar_atencion', 'id_paciente')->where('id_lugar_atencion', $id_lugar_atencion);
                                    }])
                                    ->with(['Prevision' => function($query) {
                                        $query->select('id', 'nombre');
                                    }])
                                    ->with(['Direccion' => function($query) {
                                        $query->select('id', 'direccion', 'numero_dir', 'id_ciudad')
                                              ->with(['Ciudad' => function($query2) {
                                                  $query2->select('id', 'nombre', 'id_region');
                                              }]);
                                    }])
                                    /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                                    ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
                                    ->get();

        try {
            foreach($registro as $paciente){
                /* FMU CONTACTO EMERGENCIA */
                $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();

                /* CONTACTO EMERGENCIA */
                $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();
                if(is_object($pacientes_contacto_emergencia))
                {
                    $contacto_emergencia = ContactoEmergencia::find($pacientes_contacto_emergencia->id_contacto);

                    list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                    $ano_diferencia  = date("Y") - $ano;
                    $mes_diferencia = date("m") - $mes;
                    $dia_diferencia   = date("d") - $dia;
                    if ($dia_diferencia < 0 || $mes_diferencia < 0)
                    $ano_diferencia--;

                    $edad = $ano_diferencia;
                    $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
                    $contacto_emergencia->edad = $edad;

                    $paciente->contacto_emergencia = $contacto_emergencia;

                }
                else
                {
                    $contacto_emergencia = (object) array(
                        'nombre'=>'N/A',
                        'apellido_uno'=>'N/A',
                        'apellido_dos'=>'N/A',
                        'rut'=>'N/A',
                        'edad'=>'N/A',
                        'email'=>'N/A',
                        'fecha_nac'=>'N/A',
                        'telefono'=>'N/A',
                        'parentezco'=>'N/A'
                    );

                    $paciente->contacto_emergencia = $contacto_emergencia;
                }
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

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

    public function camas()
    {
        return view('page.enfermera.escritorio_camas')->with([]);
    }

    public function buscarPaciente()
    {
        return view('page.enfermera.buscar_paciente')->with([]);
    }

    public function asignar_nuevo_triage_paciente (Request $req){
        try {
            // Buscar el paciente triage directamente en la tabla sin joins
            $paciente_triage = PacienteTriage::where('id_paciente', $req->id_paciente)->where('id_ficha_atencion', $req->id_ficha_atencion)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            if (!$paciente_triage) {
                $paciente_triage = new PacienteTriage();
                $paciente_triage->id_paciente = $req->id_paciente;
                $paciente_triage->id_responsable = $profesional->id;
                $paciente_triage->id_ficha_atencion = $req->id_ficha_atencion;
                $paciente_triage->fecha = date('Y-m-d');
                $paciente_triage->hora = date('H:i:s');
                $paciente_triage->observaciones = 'ASIGNACION INICIAL DE TRIAGE';
            }

            // Actualizar el triage
            $paciente_triage->id_triage = $req->id_triage;
            $paciente_triage->save();

            // Obtener el paciente con toda la información para retornar
            $p = $this->buscarPacienteTriage($req->id_paciente, $req->id_ficha_atencion);
            return ['mensaje' => 'OK','paciente' => $p];
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => 'ERROR', 'error' => $e->getMessage()];
        }

    }

    public function asignar_nueva_urgencia_paciente (Request $req){
        try {
            // Buscar el paciente sala directamente en la tabla sin joins
            $paciente_sala = PacienteSala::where('id_paciente', $req->id_paciente)->where('id_ficha_atencion', $req->id_ficha_atencion)->first();

            if (!$paciente_sala) {
                return ['mensaje' => 'ERROR', 'error' => 'Paciente no encontrado en sala'];
            }

            // Actualizar el nivel de urgencia
            $paciente_sala->nivel_urgencia = $req->id_triage;
            $paciente_sala->save();

            // Obtener el paciente con toda la información para retornar
            $p = $this->buscarPacienteNivelUrgencia($req->id_paciente, $req->id_ficha_atencion);
            return ['mensaje' => 'OK','paciente' => $p];
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => 'ERROR', 'error' => $e->getMessage()];
        }

    }

    public function buscarPacienteTriage($id_paciente, $id_ficha_atencion)
    {
        $paciente = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html as clase','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_paciente', $id_paciente)
                                    ->where('pacientes_triage.id_ficha_atencion', $id_ficha_atencion)
                                    ->first();
        return $paciente;
    }

    public function buscarPacienteNivelUrgencia($id_paciente, $id_ficha_atencion)
    {
        $paciente = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos')
                                    ->join('pacientes','pacientes.id','=','paciente_sala.id_paciente')
                                    ->where('paciente_sala.id_paciente', $id_paciente)
                                    ->where('paciente_sala.id_ficha_atencion', $id_ficha_atencion)
                                    ->first();
        return $paciente;
    }

    public function agregar_evolucion_paciente_hosp(Request $req){
       try {
        //code...
        $evolucion_hospital = new EvolucionPacienteHospital();
        $evolucion_hospital->id_responsable = Auth::user()->id;
        $evolucion_hospital->id_paciente = $req->id_paciente;
        $evolucion_hospital->fecha =  date('Y-m-d');
        $evolucion_hospital->hora =  date('H:i:s');
        $evolucion_hospital->evolucion = $req->evolucion;
        $evolucion_hospital->resumen = $req->resumen ? $req->resumen : 'SIN OBSERVACIONES';

        if($evolucion_hospital->save()){
            $idCounter = $req->idCounter;
            $detalle_receta_controlador = new DetalleRecetaController();
            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($req->id_paciente);
            $procedimientos = $this->dameProcedimientosPaciente($req->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($req->id_paciente);
            $controles_ciclo = $this->dameEvolucionesPacienteHosp($req->id_paciente);
            $examenControlador = new ExamenMedicoController();
            $examenes_solicitados = $examenControlador->dame_examenes_solicitados($req->id_paciente);
            foreach ($controles_ciclo as $index => &$evolucion) {
                // Construir fecha y hora de la evolución actual
                $fechaHoraEvolucionActual = Carbon::parse($evolucion['fecha'] . ' ' . $evolucion['hora']);

                // Construir fecha y hora de la evolución siguiente (si existe)
                $fechaHoraEvolucionSiguiente = isset($controles_ciclo[$index + 1])
                    ? Carbon::parse($controles_ciclo[$index + 1]['fecha'] . ' ' . $controles_ciclo[$index + 1]['hora'])
                    : null;

                // Filtrar exámenes que ocurren después de la evolución actual y antes de la siguiente
                $examenesFiltrados = collect($examenes_solicitados)->filter(function ($examen) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                    // Construir fecha y hora del examen
                    $fechaHoraExamen = Carbon::parse($examen['fecha'] . ' ' . $examen['hora']);
                    return $fechaHoraExamen->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                           ($fechaHoraEvolucionSiguiente === null || $fechaHoraExamen->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                });

                  // Filtrar recetas que ocurren después de la evolución actual y antes de la siguiente
                $recetasFiltradas = collect($recetas)->filter(function ($receta) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                    // Construir fecha y hora de la receta
                    $fechaHoraReceta = Carbon::parse($receta['fecha'] . ' ' . $receta['hora']);
                    return $fechaHoraReceta->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                        ($fechaHoraEvolucionSiguiente === null || $fechaHoraReceta->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                });

                 // Filtrar procedimientos que ocurren después de la evolución actual y antes de la siguiente
                $procedimientosFiltrados = collect($procedimientos)->filter(function ($procedimiento) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                    // Construir fecha y hora del procedimiento
                    $fechaHoraProcedimiento = Carbon::parse($procedimiento['fecha'] . ' ' . $procedimiento['hora']);
                    return $fechaHoraProcedimiento->greaterThan($fechaHoraEvolucionActual) && // Después de la evolución actual
                        ($fechaHoraEvolucionSiguiente === null || $fechaHoraProcedimiento->lessThan($fechaHoraEvolucionSiguiente)); // Antes de la siguiente evolución
                });

                // Asignar exámenes a la evolución actual
                $evolucion['examenes'] = $examenesFiltrados->values(); // Asegurar que sea una lista indexada
                // Asignar recetas a la evolución actual
                $evolucion['recetas'] = $recetasFiltradas->values(); // Asegurar que sea una lista indexada
                // Asignar procedimientos a la evolución actual
                $evolucion['procedimientos'] = $procedimientosFiltrados->values(); // Asegurar que sea una lista indexada
            }

            if(count($controles_ciclo) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_evaluaciones = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_evaluaciones = count($controles_ciclo) + 1;
            }

            $enfermera = true;

            $v = view('app.adm_hospital.servicios.enfermera.control_ciclo', compact('controles_ciclo','idCounter','enfermera','contador_div_evaluaciones'))->render();

            return ['mensaje' => 'OK','vista' => $v,'idCounter' => $idCounter,'controles_ciclo' => $controles_ciclo];
        }
       } catch (\Exception $e) {
        //throw $th;
        return ['mensaje' => $e->getMessage()];
       }

    }

    public function agregar_evolucion_paciente(Request $req){
        try {

         //code...
         $evolucion_urgencia = new EvolucionUrgencia();
         $evolucion_urgencia->id_responsable = Auth::user()->id;
         $evolucion_urgencia->id_paciente = $req->id_paciente;
         // Crear un objeto con los datos de la evolución
         $datos_evolucion = [
             'pulso' => $req->pulso,
             'temperatura' => $req->temperatura,
             'pas' => $req->pas,
             'pad' => $req->pad,
             'pam' => $req->pam,
             'fr' => $req->frec_resp,
             'peso' => $req->peso,
             'talla' => $req->talla,
             'imc' => $req->imc,
             'tipo_respiracion' => $req->tipo_respiracion_servicio,
             'sat_fio2' => $req->sat_fio2,
             'sat_o2' => $req->sat_o2,
             'dispositivo_servicio' => $req->dispositivo_servicio,
             'hemoglucotest' => $req->hemoglucotest,
             'glasgow' => $req->glasgow,
             'eva' => $req->c_eva,
             'otras_pruebas' => $req->otras_pruebas,
             'gravedad' => $req->gravedad_e_conc,
         ];
         // Convertir el objeto a una cadena JSON y guardarla en la base de datos
         $evolucion_urgencia->datos_evolucion = json_encode($datos_evolucion);
         if($evolucion_urgencia->save()){
             // $idCounter = $req->idCounter;
             // $user = Auth::user()->id;
             // $responsable = Profesional::where('id_usuario', $user)->first();
             // $v= view('page.enfermera.agregar_evolucion_paciente', compact('idCounter','responsable'))->render();


             $controles_ciclo = $this->dameEvolucionesPaciente($req->id_paciente);


                     foreach($controles_ciclo as $cc)
                     {
                         $cc->datos_evolucion = json_decode($cc->datos_evolucion);
                     }
                    //  $v = view('app.adm_hospital.servicios.enfermera.controles_ciclo_urg', compact('controles_ciclo'))->render();
                     return ['mensaje' => 'OK','controles_ciclo' => $controles_ciclo];
         }
        } catch (\Exception $e) {
         //throw $th;
         return ['mensaje' => $e->getMessage()];
        }

     }

     public function agregar_evolucion_profesional(Request $req){

        $institucion = Instituciones::where('id_lugar_atencion', $req->id_lugar_atencion)->first();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $evolucion_profesional = new EvolucionPacienteHospital();
        $evolucion_profesional->id_responsable = Auth::user()->id;
        $evolucion_profesional->id_paciente = $req->id_paciente;
        $evolucion_profesional->fecha =  date('Y-m-d');
        $evolucion_profesional->hora =  date('H:i:s');
        $evolucion_profesional->evolucion = $req->evolucion_medica;
        $evolucion_profesional->resumen = 'SIN OBSERVACIONES';
        $evolucion_profesional->id_institucion = $institucion->id;
        $evolucion_profesional->id_lugar_atencion = $req->id_lugar_atencion;

        if($evolucion_profesional->save()){
            $responsable = Profesional::where('id_usuario', Auth::user()->id)->first();
            $evolucion_profesional->nombre_responsable = $responsable->nombre . ' ' . $responsable->apellido_paterno . ' ' . $responsable->apellido_materno;
            return ['mensaje' => 'OK','evolucion' => $evolucion_profesional];
        }else{
            return ['mensaje' => 'ERROR'];
        }
     }

    public function dameEvolucionesPacienteHosp($idpaciente){
        $controles_ciclo = EvolucionPacienteHospital::select('evoluciones_paciente_hosp.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_paciente_hosp.id_responsable')
                                                    ->where('evoluciones_paciente_hosp.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function eliminar_evolucion_profesional(Request $req){
        try {
            //code...
                $evolucion = EvolucionPacienteHospital::find($req->id_evolucion);

                if($evolucion->delete()){
                    return ['mensaje' => 'OK'];
                }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function generar_pdf_resumen_evoluciones(Request $req){
        try {

            // Validar que el paciente exista
            $paciente = Paciente::find($req->id_paciente);
            if (!$paciente) {
                return response()->json(['mensaje' => 'ERROR', 'error' => 'Paciente no encontrado'], 404);
            }

            // Si viene resumen_text (desde textarea), procesarlo
            if ($req->has('resumen_text') && !empty($req->resumen_text)) {
                $resumen_text = $req->resumen_text;

                // Construir nombre completo del paciente
                $nombre_completo = trim($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos);
                $observaciones = $req->has('observaciones') ? $req->observaciones : '';
                // Generar PDF simple con el texto del resumen
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('app.adm_hospital.servicios.enfermera.pdf_resumen_evoluciones_texto',
                    compact('resumen_text', 'paciente', 'nombre_completo','observaciones'));

                // Guardar el PDF en la carpeta public
                $fileName = 'evoluciones_' . $req->id_paciente . '.pdf';

                $filePath = public_path('reportes/' . $fileName);
                file_put_contents($filePath, $pdf->output());

                // Devolver la ruta accesible del archivo PDF
                return response()->json(['ruta' => asset('reportes/' . $fileName)]);
            }

            // Si viene resumen como array (formato original)
            $resumen = is_string($req->resumen) ? json_decode($req->resumen, true) : $req->resumen;

            // Validar que haya evoluciones
            if (empty($resumen) || !is_array($resumen)) {
                return response()->json(['mensaje' => 'ERROR', 'error' => 'No hay evoluciones para generar el PDF'], 400);
            }

            // Construir nombre completo del paciente
            $nombre_completo = trim($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos);

            // Generar PDF con paciente y resumen
            $pdf = PDF::loadView('app.adm_hospital.servicios.enfermera.pdf_resumen_evoluciones', compact('resumen', 'paciente'));

            // Guardar el PDF en la carpeta public
            $fileName = 'evoluciones_' . $req->id_paciente . '.pdf';
            $filePath = public_path('reportes/' . $fileName);

            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            \Log::error('Error generando PDF resumen evoluciones: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json(['mensaje' => 'ERROR', 'error' => $e->getMessage()], 500);
        }
    }

    public function agregar_observaciones_curacion(Request $req){
        $curacion = CuracionesServicio::find($req->id_curacion);
        if(!$curacion){
            return response()->json(['mensaje' => 'ERROR', 'error' => 'Curación no encontrada'], 404);
        }

        $curacion->otros = $req->observaciones;

        if($curacion->save()){
            return response()->json(['mensaje' => 'OK']);
        }else{
            return response()->json(['mensaje' => 'ERROR', 'error' => 'No se pudieron guardar las observaciones'], 500);
        }
    }

    public function guardarCuracionProcedimiento(Request $request){
        try {
            $request->validate([
                'id_paciente' => 'required|integer|exists:pacientes,id',
                'id_lugar_atencion' => 'required|integer',
                'procedimiento' => 'required|string',
            ]);

            $user = Auth::user();
            $profesional = Profesional::where('id_usuario', $user->id)->first();

            if (!$profesional) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No se encontró el profesional asociado al usuario'
                ], 400);
            }

            $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
            if (!$institucion) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No se encontró la institución para el lugar de atención seleccionado'
                ], 404);
            }

            DB::beginTransaction();

            $now = Carbon::now();

            $procedimientoServicio = new ProcedimientoServicio();
            $procedimientoServicio->id_institucion = $institucion->id;
            $procedimientoServicio->id_servicio = 4;
            $procedimientoServicio->id_ficha_atencion = $request->id_ficha_atencion ?? null;
            $procedimientoServicio->id_paciente = $request->id_paciente;
            $procedimientoServicio->id_responsable = $user->id;
            $procedimientoServicio->datos_procedimiento = json_encode([
                'nombre_procedimiento' => $request->procedimiento,
                'ind_vig_sig' => '',
            ]);
            $procedimientoServicio->save();

            $curacion = new CuracionesServicio();
            $curacion->id_institucion = $institucion->id;
            $curacion->id_servicio = 4;
            $curacion->id_paciente = $request->id_paciente;
            $curacion->id_responsable = $user->id;
            $curacion->id_procedimiento = $procedimientoServicio->id;
            $curacion->otros = $request->observaciones ?? '';
            $curacion->otros_2 = '';
            $curacion->estado = 0;
            $curacion->datos_curacion = json_encode([
                'nombre_procedimiento' => $request->procedimiento,
                'ind_vig_sig' => '',
            ]);
            $curacion->save();

            DB::commit();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Curación o procedimiento guardado correctamente',
                'procedimiento' => [
                    'id' => $procedimientoServicio->id,
                    'nombre_procedimiento' => $request->procedimiento,
                    'observaciones' => $request->observaciones ?? '',
                    'fecha_hora' => $now->format('d/m/Y H:i'),
                    'responsable' => $user->name,
                ],
                'curacion' => [
                    'id' => $curacion->id,
                    'nombre_procedimiento' => $request->procedimiento,
                    'otros' => $request->observaciones ?? '',
                    'estado' => 0,
                    'fecha' => $now->format('d-m-Y'),
                    'hora' => $now->format('H:i'),
                    'responsable' => $user->name,
                ]
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Datos de entrada inválidos',
                'errores' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function modificar_evolucion_profesional(Request $req){

        $evolucion_profesional = EvolucionPacienteHospital::find($req->id_evolucion);
        $evolucion_profesional->evolucion = $req->evolucion_medica;

        if($evolucion_profesional->save()){
            return ['mensaje' => 'OK','evolucion' => $evolucion_profesional];
        }else{
            return ['mensaje' => 'ERROR'];
        }
     }

    public function mostrar_nueva_evolucion_paciente(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);

        return view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente', compact('idCounter','responsable'));
    }

    public function administrar_tratamiento(Request $req){

        // Verificar el tipo de tratamiento (externo o normal)
        $tipo = $req->tipo ?? 'normal';

        // Si no viene ficha_atencion_id, intentar obtenerla del tratamiento
        if (!$req->ficha_atencion_id && $tipo == 'externo') {
            // Para medicamentos externos, la ficha_atencion_id puede no ser requerida
            // o puede estar asociada al tratamiento
        }

        // Validar ficha de atención solo si es necesaria
        if ($req->ficha_atencion_id) {
            $ficha_atencion = FichaAtencion::find($req->ficha_atencion_id);
            if (!$ficha_atencion) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'estado' => 0,
                    'msj' => 'Ficha de atención no encontrada'
                ], 404);
            }
        }

        // Determinar qué modelo usar según el tipo
        if ($tipo == 'externo') {
            // Buscar en DetalleRecetaInterna (medicamentos externos)
            $receta = DetalleRecetaInterna::find($req->id_tratamiento);
            if (!$receta) {
                return response()->json(['mensaje' => 'No se encontró el medicamento externo'], 404);
            }

            // Actualizar estado de administración para medicamento externo
            $fecha_actual = date('Y-m-d');
            $receta->fecha_administrado = $fecha_actual;
            $receta->hora_administrado = date('H:i:s');
            $receta->estado_tratamiento = 1; // administrado

            if($receta->contador_dosis == null){
                $receta->contador_dosis = 1;
            }else{
                $receta->contador_dosis = $receta->contador_dosis + 1;
            }
            $receta->save();

            // Calcular tiempo transcurrido
            $fecha_ultima_admin = \Carbon\Carbon::parse($receta->fecha_administrado . ' ' . $receta->hora_administrado);
            $fecha_actual_admin = \Carbon\Carbon::now();
            $diff = $fecha_ultima_admin->diff($fecha_actual_admin);

            // Formatear diferencia
            if($diff->days > 0) {
                $tiempo_transcurrido_texto = $diff->days . ' día(s) ' . $diff->h . ' hora(s)';
            } elseif($diff->h > 0) {
                $tiempo_transcurrido_texto = $diff->h . ' hora(s) ' . $diff->i . ' min';
            } else {
                $tiempo_transcurrido_texto = $diff->i . ' min';
            }

            $minutos_transcurridos = ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;

            // Armar respuesta para medicamento externo
            $detalle = [
                'id' => $receta->id,
                'id_responsable' => $receta->id_responsable,
                'id_enfermera' => $receta->id_enfermera,
                'id_ficha_atencion' => $receta->id_ficha_atencion,
                'id_medicamento' => $receta->id_medicamento,
                'nombre_medicamento' => $receta->nombre_medicamento,
                'composicion' => $receta->composicion,
                'nombre_dosis' => $receta->nombre_dosis,
                'nombre_frecuencia' => $receta->nombre_frecuencia,
                'via_administracion' => $receta->via_administracion,
                'observaciones' => $receta->observaciones,
                'estado_tratamiento' => $receta->estado_tratamiento,
                'estado_finalizado' => $receta->estado_finalizado,
                'contador_dosis' => $receta->contador_dosis,
                'fecha_administrado' => $receta->fecha_administrado,
                'hora_administrado' => $receta->hora_administrado,
                'tiempo_transcurrido' => $tiempo_transcurrido_texto,
                'minutos_transcurridos' => $minutos_transcurridos,
                'created_at' => $receta->created_at,
                'updated_at' => $receta->updated_at,
            ];

            return [
                'mensaje' => 'OK',
                'receta' => $detalle,
                'tiempo_transcurrido' => $tiempo_transcurrido_texto,
                'minutos_transcurridos' => $minutos_transcurridos,
                'tipo' => 'externo'
            ];

        } else {
            // Buscar en RecomendacionDetalle (tratamiento normal)
            $receta = RecomendacionDetalle::find($req->id_tratamiento);
            if (!$receta) {
                return response()->json(['mensaje' => 'No se encontró la receta'], 404);
            }

            // Actualizar estado de administración
            $fecha_actual = date('Y-m-d');
            $receta->fecha_administrado = $fecha_actual;
            $receta->hora_administrado = date('H:i:s');
            $receta->estado = 1; // administrado
            if($receta->contador_dosis == null){
                $receta->contador_dosis = 1;
            }else{
                $receta->contador_dosis = $receta->contador_dosis + 1;
            }
            $receta->save();

            // Buscar la recomendación asociada
            $recomendacion = Recomendacion::find($receta->id_recomendacion);

            // Armar respuesta con datos relevantes
            $detalle = [
                'id' => $receta->id,
                'id_receta' => $receta->id_recomendacion,
                'producto' => decrypt($receta->articulo),
                'farmaco' => decrypt($receta->componente),
                'presentacion' => decrypt($receta->apariencia),
                'posologia' => decrypt($receta->cuota),
                'via_administracion' => decrypt($receta->regimen),
                'periodo' => decrypt($receta->lapso),
                'cantidad' => decrypt($receta->volumen),
                'comentario' => decrypt($receta->comentario),
                'estado' => $receta->estado,
                'created_at' => $receta->created_at,
                'updated_at' => $receta->updated_at,
                'fecha_administrado' => $receta->fecha_administrado,
                'hora_administrado' => $receta->hora_administrado,
                'contador_dosis' => $receta->contador_dosis,
                'recomendacion' => $recomendacion ? [
                    'id' => $recomendacion->id,
                    'id_paciente' => $recomendacion->id_paciente,
                    'created_at' => $recomendacion->created_at,
                    'updated_at' => $recomendacion->updated_at,
                    // Agrega aquí más campos si necesitas
                ] : null
            ];

            // Calcular tiempo transcurrido desde la última administración
            $fecha_ultima_admin = Carbon::parse($receta->fecha_administrado . ' ' . $receta->hora_administrado);
            $fecha_actual_admin = Carbon::now();
            $tiempo_transcurrido = $fecha_ultima_admin->diffInMinutes($fecha_actual_admin);

            return [
                'mensaje' => 'OK',
                'receta' => $detalle,
                'tiempo_transcurrido' => $tiempo_transcurrido,
                'tipo' => 'normal'
            ];
        }
    }

    public function guardarCuracionPieDiabeticoServicio(Request $req){
        try {

            // Validación básica - datos_curacion ahora es opcional
            $req->validate([
                'id_paciente' => 'required|integer|exists:pacientes,id',
                'datos_valoracion' => 'required|array',
                'datos_curacion' => 'nullable|array' // Cambiado a nullable para permitir solo valoración
            ]);

            // Obtener el usuario autenticado
            $user = Auth::user();
            $profesional = Profesional::where('id_usuario', $user->id)->first();

            if (!$profesional) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'No se encontró el profesional asociado al usuario'
                ], 400);
            }

            // Verificar que el paciente existe
            $paciente = Paciente::find($req->id_paciente);
            if (!$paciente) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'Paciente no encontrado'
                ], 404);
            }

            // Obtener la fecha y hora actual
            $now = Carbon::now();

            // Crear la nueva curación usando el modelo unificado CuracionRegistro
            $curacion = new CuracionRegistro();
            $curacion->id_paciente = $req->id_paciente;
            $curacion->id_profesional = $profesional->id; // Usar id del profesional, no del usuario
            $curacion->id_ficha_atencion = $req->id_ficha_atencion ?? null;
            $curacion->id_lugar_atencion = $req->id_lugar_atencion ?? null;
            $curacion->tipo_curacion = 'pie_diabetico'; // Tipo de curación
            $curacion->etapa = 'mixta'; // valoracion, curacion o mixta
            $curacion->fecha = $now->format('Y-m-d');
            $curacion->hora = $now->format('H:i:s');
            $curacion->datos_valoracion = $req->datos_valoracion; // Ya es array, se guardará como JSON
            $curacion->datos_curacion = $req->datos_curacion ?? []; // Usar array vacío si no se proporciona
            $curacion->observaciones = $req->observaciones ?? '';
            $curacion->estado = 'completado';
            $curacion->activo = true;

            // Guardar en la base de datos
            if ($curacion->save()) {
                return response()->json([
                    'mensaje' => 'OK',
                    'msj' => 'Curación de pie diabético guardada exitosamente',
                    'curacion_id' => $curacion->id,
                    'fecha_registro' => $now->format('d/m/Y H:i:s')
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'No se pudo guardar la curación de pie diabético'
                ], 500);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Datos de entrada inválidos',
                'errores' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Error interno del servidor: ' . $e->getMessage()
            ], 500);
        }
    }

    public function dameCuracionesPieDiabeticoPaciente($id_paciente){
        $curacion = CuracionesPieDiabetico::select('curaciones_pie_diabetico.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_pie_diabetico.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activo', 1)
                                        ->get();

            // foreach($curacion as $curacion)
            // {
            //     // convertir el atributo datos_procedimiento de longtext a array
            //     $curacion->datos_curacion_pie_diabetico = json_decode($curacion->datos_curacion_pie_diabetico);
            //     // sacar la fecha y hora del campo created_at
            //     $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
            //     $curacion->hora = date('H:i', strtotime($curacion->created_at));
            // }

        return $curacion;
    }

    public function dameCuracionesQuemadosPaciente($id_paciente){
        $curacion = CuracionesQuemados::select('curaciones_quemados.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_quemados.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activo', 1)
                                        ->get();

            // foreach($curacion as $curacion)
            // {
            //     // convertir el atributo datos_procedimiento de longtext a array
            //     $curacion->datos_curacion_quemados = json_decode($curacion->datos_curacion_quemados);
            //     // sacar la fecha y hora del campo created_at
            //     $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
            //     $curacion->hora = date('H:i', strtotime($curacion->created_at));
            // }

        return $curacion;
    }

    public function guardarCuracionQuemadosServicio(Request $req){
        try {
            // Validación básica - datos_curacion ahora es opcional
            $req->validate([
                'id_paciente' => 'required|integer|exists:pacientes,id',
                'datos_valoracion' => 'required|array',
                'datos_curacion' => 'nullable|array' // Cambiado a nullable
            ]);

            // Obtener el usuario autenticado
            $user = Auth::user();
            $profesional = Profesional::where('id_usuario', $user->id)->first();

            if (!$profesional) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'No se encontró el profesional asociado al usuario'
                ], 400);
            }

            // Verificar que el paciente existe
            $paciente = Paciente::find($req->id_paciente);
            if (!$paciente) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'Paciente no encontrado'
                ], 404);
            }

            // Obtener la fecha y hora actual
            $now = Carbon::now();

            // Crear la nueva curación usando el modelo unificado CuracionRegistro
            $curacion = new CuracionRegistro();
            $curacion->id_paciente = $req->id_paciente;
            $curacion->id_profesional = $profesional->id;
            $curacion->id_ficha_atencion = $req->id_ficha_atencion ?? null;
            $curacion->id_lugar_atencion = $req->id_lugar_atencion ?? null;
            $curacion->tipo_curacion = 'quemados';
            $curacion->etapa = 'mixta';
            $curacion->fecha = $now->format('Y-m-d');
            $curacion->hora = $now->format('H:i:s');
            $curacion->datos_valoracion = $req->datos_valoracion;
            $curacion->datos_curacion = $req->datos_curacion ?? [];
            $curacion->observaciones = $req->observaciones ?? '';
            $curacion->estado = 'completado';
            $curacion->activo = true;

            // Guardar en la base de datos
            if ($curacion->save()) {
                return response()->json([
                    'mensaje' => 'OK',
                    'msj' => 'Curación de quemados guardada exitosamente',
                    'curacion_id' => $curacion->id,
                    'fecha_registro' => $now->format('d/m/Y H:i:s')
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'No se pudo guardar la curación de quemados'
                ], 500);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Datos de entrada inválidos',
                'errores' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Error interno del servidor: ' . $e->getMessage()
            ], 500);
        }
    }

    public function finalizar_tratamiento(Request $req){
        try {
            $detalle_receta = RecomendacionDetalle::find($req->id_tratamiento);
            if(!$detalle_receta){
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'Tratamiento no encontrado'
                ], 404);
            }

            $detalle_receta->estado = ($detalle_receta->estado == 1) ? 0 : 1;

            if($detalle_receta->save()){
                $detalle_receta_controlador = new DetalleRecetaController();
                $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($detalle_receta->id_paciente);

                return response()->json([
                    'mensaje' => 'OK',
                    'finalizado' => $detalle_receta->estado,
                    'recetas' => $recetas
                ]);
            }

            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'No se pudo finalizar el tratamiento'
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => $e->getMessage()
            ], 500);
        }
    }

    public function eliminar_tratamiento(Request $request)
    {
        try {
            $id_detalle = $request->id_detalle;

            if (empty($id_detalle)) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'ID de detalle requerido'
                ], 400);
            }

            $detalle = RecomendacionDetalle::find($id_detalle);

            if (!$detalle) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Medicamento no encontrado'
                ], 404);
            }

            // Eliminar el detalle
            $detalle->delete();

            // Verificar si la recomendación (cabecera) quedó sin detalles
            $id_recomendacion = $detalle->id_recomendacion;
            $detalles_restantes = RecomendacionDetalle::where('id_recomendacion', $id_recomendacion)->count();

            // Si no quedan detalles, eliminar también la cabecera
            if ($detalles_restantes == 0) {
                Recomendacion::where('id', $id_recomendacion)->delete();
            }

            return response()->json([
                'estado' => 1,
                'mensaje' => 'OK',
                'detalles_restantes' => $detalles_restantes
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al eliminar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function eliminar_tratamiento_domiciliario(Request $request){
        $control_domiciliario = ControlDomiciliario::find($request->id);
        if (!$control_domiciliario) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Control domiciliario no encontrado'
            ], 404);
        }
        try {
            $control_domiciliario->delete();
            return response()->json([
                'estado' => 1,
                'mensaje' => 'OK'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al eliminar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function actualizar_tratamiento_domiciliario(Request $request){
        try {
            $control_domiciliario = ControlDomiciliario::find($request->id);

            if (!$control_domiciliario) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Control domiciliario no encontrado'
                ], 404);
            }

            // Actualizar campos según los datos recibidos
            if ($request->has('medicamentos')) {
                $control_domiciliario->medicamentos = $request->medicamentos;
            }

            if ($request->has('hora_inicio')) {
                $control_domiciliario->hora_inicio = $request->hora_inicio;
            }

            if ($request->has('hora_termino')) {
                $control_domiciliario->hora_termino = $request->hora_termino;
            }

            if ($request->has('cc_hora')) {
                $control_domiciliario->cc_hora = $request->cc_hora;
            }

            if ($request->has('sitio_puncion')) {
                $control_domiciliario->sitio_puncion = $request->sitio_puncion;
            }

            if ($request->has('procedimiento')) {
                $control_domiciliario->procedimiento = $request->procedimiento;
            }

            if ($request->has('fecha')) {
                $control_domiciliario->fecha = $request->fecha;
            }

            if ($request->has('observaciones')) {
                $control_domiciliario->observaciones = $request->observaciones;
            }

            $control_domiciliario->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Tratamiento actualizado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al actualizar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function guardar_receta_medica_inyectable(Request $request){
        try {

            // Procesar las imágenes si existen
            $imagenes = [];
            if ($request->has('imagenes') && $request->imagenes != '[]') {
                $imagenes = json_decode($request->imagenes, true);
            }

            // Crear un nuevo registro en la base de datos (permitir múltiples recetas por ficha)
            $tratamiento = TratamientoInyectable::create([
                'ficha_atencion_id' => $request->ficha_atencion_id,
                'tipo' => TratamientoInyectable::TIPO_RECETA_MEDICA,
                'paciente_id' => $request->id_paciente,
                'id_receta_sdi' => $request->id_receta_sdi ?? null,
                'buscar_receta' => $request->buscar_receta == 1 ? true : false,
                'observaciones_receta' => $request->observaciones,
                'imagenes' => $imagenes,
                'usuario_registro_id' => auth()->id(),
            ]);

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Receta médica guardada correctamente',
                'imagenes_guardadas' => count($imagenes),
                'imagenes' => $imagenes, // Devolver las imágenes completas
                'tratamiento_id' => $tratamiento->id,
                'tratamiento' => [
                    'id' => $tratamiento->id,
                    'tipo' => $tratamiento->tipo,
                    'tipo_nombre' => 'Receta Médica',
                    'id_receta_sdi' => $tratamiento->id_receta_sdi,
                    'buscar_receta' => $tratamiento->buscar_receta,
                    'observaciones_receta' => $tratamiento->observaciones_receta,
                    'imagenes' => $imagenes,
                    'created_at' => $tratamiento->created_at->format('d/m/Y H:i')
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function guardar_inyectable_im_iv(Request $request){
        try {
            // Crear o actualizar el registro en la base de datos
            $tratamiento = TratamientoInyectable::updateOrCreate(
                [
                    'ficha_atencion_id' => $request->ficha_atencion_id,
                    'tipo' => TratamientoInyectable::TIPO_INYECTABLE_IM_IV,
                ],
                [
                    'paciente_id' => $request->id_paciente,
                    'incidentes_procedimiento' => $request->incidentes_procedimiento,
                    'otras_observaciones_procedimiento' => $request->otras_observaciones,
                    'usuario_registro_id' => auth()->id(),
                ]
            );

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Inyectable IM/IV guardado correctamente',
                'tratamiento_id' => $tratamiento->id,
                'tratamiento' => [
                    'id' => $tratamiento->id,
                    'tipo' => $tratamiento->tipo,
                    'tipo_nombre' => 'Inyectable IM/IV',
                    'incidentes_procedimiento' => $tratamiento->incidentes_procedimiento,
                    'otras_observaciones_procedimiento' => $tratamiento->otras_observaciones_procedimiento,
                    'imagenes' => [],
                    'created_at' => $tratamiento->created_at->format('d/m/Y H:i')
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function guardar_control_sueros(Request $request){
        try {
            // Crear o actualizar el registro en la base de datos
            $tratamiento = TratamientoInyectable::updateOrCreate(
                [
                    'ficha_atencion_id' => $request->ficha_atencion_id,
                    'tipo' => TratamientoInyectable::TIPO_CONTROL_SUEROS,
                ],
                [
                    'paciente_id' => $request->id_paciente,
                    'descripcion_sueros' => $request->descripcion_sueros,
                    'otros_tratamientos_parenterales' => $request->otras_tratamientos,
                    'observaciones_examen_control' => $request->observaciones_examen,
                    'control_signos_vitales' => $request->control_signos_vitales,
                    'usuario_registro_id' => auth()->id(),
                ]
            );

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Control de sueros guardado correctamente',
                'tratamiento_id' => $tratamiento->id,
                'tratamiento' => [
                    'id' => $tratamiento->id,
                    'tipo' => $tratamiento->tipo,
                    'tipo_nombre' => 'Control de Sueros',
                    'descripcion_sueros' => $tratamiento->descripcion_sueros,
                    'otros_tratamientos_parenterales' => $tratamiento->otros_tratamientos_parenterales,
                    'observaciones_examen_control' => $tratamiento->observaciones_examen_control,
                    'control_signos_vitales' => $tratamiento->control_signos_vitales,
                    'imagenes' => [],
                    'created_at' => $tratamiento->created_at->format('d/m/Y H:i')
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function eliminar_tratamiento_inyectable(Request $request){
        try {
            $tratamiento = TratamientoInyectable::find($request->tratamiento_id);

            if (!$tratamiento) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Tratamiento no encontrado'
                ], 404);
            }

            $tratamiento->delete();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Tratamiento eliminado correctamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al eliminar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function actualizar_observacion_tratamiento(Request $request)
    {
        try {

            $id_detalle = $request->id_detalle;

            $observacion = $request->observacion ?? '';

            if (empty($id_detalle)) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'ID de detalle requerido'
                ], 400);
            }

            $detalle = RecomendacionDetalle::find($id_detalle);
            if($request->enfermera){
                $detalle = DetalleRecetaInterna::find($id_detalle);
            }
            if (!$detalle) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Medicamento no encontrado'
                ], 404);
            }

            // Actualizar observación (encriptada)
            $detalle->observaciones = encrypt($observacion);
            $detalle->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'OK',
                'observacion' => $observacion
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al actualizar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function mostrar_nueva_evolucion_paciente_hosp(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);

        return view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente_', compact('idCounter','responsable'));
    }



    public function mostrar_nuevo_tratamiento_paciente(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        return view('page.enfermera.agregar_tratamiento_paciente', compact('idCounter','responsable'));
    }

    public function eliminar_evolucion_agregada(Request $req){
        try {
            //code...

                $evolucion = EvolucionUrgencia::find($req->id);

                if($evolucion->delete()){
                    $controles_ciclo = $this->dameEvolucionesPaciente($req->id_paciente);
                    foreach($controles_ciclo as $cc)
                    {
                        $cc->datos_evolucion = json_decode($cc->datos_evolucion);
                    }

                    // $v = view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente', compact('controles_ciclo'))->render();
                    return ['mensaje' => 'OK', 'controles_ciclo' => $controles_ciclo];
                }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function eliminar_evolucion_agregada_hosp(Request $req){
        try {
            //code...

                $evolucion = EvolucionPacienteHospital::find($req->id);

                if($evolucion->delete()){
                    $idCounter = $req->id_counter;
                    $detalle_receta_controlador = new DetalleRecetaController();
                    $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($req->id_paciente);
                    $procedimientos = $this->dameProcedimientosPaciente($req->id_paciente);
                    $curaciones = $this->dameCuracionesPaciente($req->id_paciente);
                    $controles_ciclo = $this->dameEvolucionesPacienteHosp($req->id_paciente);
                    $examenControlador = new ExamenMedicoController();
                    $examenes_solicitados = $examenControlador->dame_examenes_solicitados($req->id_paciente);
                    foreach ($controles_ciclo as $index => &$evolucion) {
                        // Construir fecha y hora de la evolución actual
                        $fechaHoraEvolucionActual = Carbon::parse($evolucion['fecha'] . ' ' . $evolucion['hora']);

                        // Construir fecha y hora de la evolución siguiente (si existe)
                        $fechaHoraEvolucionSiguiente = isset($controles_ciclo[$index + 1])
                            ? Carbon::parse($controles_ciclo[$index + 1]['fecha'] . ' ' . $controles_ciclo[$index + 1]['hora'])
                            : null;

                        // Filtrar exámenes que ocurren después de la evolución actual y antes de la siguiente
                        $examenesFiltrados = collect($examenes_solicitados)->filter(function ($examen) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                            // Construir fecha y hora del examen
                            $fechaHoraExamen = Carbon::parse($examen['fecha'] . ' ' . $examen['hora']);
                            return $fechaHoraExamen->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                                   ($fechaHoraEvolucionSiguiente === null || $fechaHoraExamen->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                        });

                          // Filtrar recetas que ocurren después de la evolución actual y antes de la siguiente
                        $recetasFiltradas = collect($recetas)->filter(function ($receta) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                            // Construir fecha y hora de la receta
                            $fechaHoraReceta = Carbon::parse($receta['fecha'] . ' ' . $receta['hora']);
                            return $fechaHoraReceta->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                                ($fechaHoraEvolucionSiguiente === null || $fechaHoraReceta->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                        });

                         // Filtrar procedimientos que ocurren después de la evolución actual y antes de la siguiente
                        $procedimientosFiltrados = collect($procedimientos)->filter(function ($procedimiento) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                            // Construir fecha y hora del procedimiento
                            $fechaHoraProcedimiento = Carbon::parse($procedimiento['fecha'] . ' ' . $procedimiento['hora']);
                            return $fechaHoraProcedimiento->greaterThan($fechaHoraEvolucionActual) && // Después de la evolución actual
                                ($fechaHoraEvolucionSiguiente === null || $fechaHoraProcedimiento->lessThan($fechaHoraEvolucionSiguiente)); // Antes de la siguiente evolución
                        });

                        // Asignar exámenes a la evolución actual
                        $evolucion['examenes'] = $examenesFiltrados->values(); // Asegurar que sea una lista indexada
                        // Asignar recetas a la evolución actual
                        $evolucion['recetas'] = $recetasFiltradas->values(); // Asegurar que sea una lista indexada
                        // Asignar procedimientos a la evolución actual
                        $evolucion['procedimientos'] = $procedimientosFiltrados->values(); // Asegurar que sea una lista indexada
                    }

                    if(count($controles_ciclo) == 0)
                    {
                        // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                        $contador_div_evaluaciones = 1;
                    }else{
                        // si hay ciclos de control se suma 1 para manejar el id en la vista
                        $contador_div_evaluaciones = count($controles_ciclo) + 1;
                    }

                    foreach($controles_ciclo as $cc)
                    {
                        $cc->datos_evolucion = json_decode($cc->datos_evolucion);
                    }

                    $v = view('app.adm_hospital.servicios.enfermera.control_ciclo', compact('controles_ciclo'))->render();
                    return ['mensaje' => 'OK','vista' => $v,'controles_ciclo' => $controles_ciclo];
                }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function dameEvolucionesPaciente($idpaciente){
        $controles_ciclo = EvolucionUrgencia::select('evoluciones_urgencias.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_urgencias.id_responsable')
                                                    ->where('evoluciones_urgencias.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function pacientes(){
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','paciente_box.id_box')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->join('paciente_box','paciente_box.id_paciente','=','pacientes_triage.id_paciente')
                                    ->get();


        foreach($pacientes as $paciente)
        {
            $box = BoxAtencionServicio::find($paciente->id_box);
            if($box){
                $paciente->tipo_box = $box->tipo_box;
                $paciente->numero_box = $box->numero_box;
            }else{
                $paciente->tipo_box = '';
                $paciente->numero_box = '';
            }
        }

        $pacientes_finalizados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','paciente_box.id_box')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->join('paciente_box','paciente_box.id_paciente','=','pacientes_triage.id_paciente')
                                    ->where('pacientes_triage.estado','FINALIZADO')
                                    ->get();

        foreach($pacientes_finalizados as $paciente)
        {
            $box = BoxAtencionServicio::find($paciente->id_box);
            $paciente->tipo_box = $box->tipo_box;
            $paciente->numero_box = $box->numero_box;
            // calcular la edad del paciente
            $fecha_nac = $paciente->fecha_nac;
            $fecha_actual = date('Y-m-d');
            $edad = Carbon::parse($fecha_nac)->diff(Carbon::parse($fecha_actual))->format('%y años');
            $paciente->edad = $edad;
        }
        return view('page.enfermera.pacientes')->with([
            'pacientes' => $pacientes,
            'pacientes_finalizados' => $pacientes_finalizados,
        ]);
    }

    public function cambiar_estado_paciente_triage(Request $req){

        $paciente_triage = PacienteTriage::find($req->id_paciente_triage);
        $paciente_triage->estado = "INGRESADO";
        $paciente_triage->save();

        return ['mensaje' => 'OK'];
    }

    public function dameProcedimientosPaciente($idpaciente){
           $procedimientos =  ProcedimientoServicio::select('procedimientos_servicio.*','users.name as responsable')
                                                    ->join('users','users.id','=','procedimientos_servicio.id_responsable')
                                                    ->where('id_paciente', $idpaciente)
                                                    ->get();

            foreach($procedimientos as $procedimiento)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $procedimiento->datos_procedimiento = json_decode($procedimiento->datos_procedimiento);
                // sacar la fecha y hora del campo created_at
                $procedimiento->fecha = date('d-m-Y', strtotime($procedimiento->created_at));
                $procedimiento->hora = date('H:i', strtotime($procedimiento->created_at));
            }

            return $procedimientos;
    }

    public function dameCuracionesPaciente($idpaciente){
        $curaciones =  CuracionesServicio::select('curaciones_servicio.*','users.name as responsable')
                                             ->join('users','users.id','=','curaciones_servicio.id_responsable')
                                             ->where('id_paciente', $idpaciente)
                                             ->get();

            foreach($curaciones as $curacion)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $curacion->datos_curacion = json_decode($curacion->datos_curacion);
                // sacar la fecha y hora del campo created_at
                $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
                $curacion->hora = date('H:i', strtotime($curacion->created_at));
            }

            return $curaciones;
    }

    public function guardarCuracionPlanaServicio(Request $req){
       try {

        if (empty($req->id_ficha_atencion)) {
            return ['mensaje' => 'ERROR', 'msj' => 'id_ficha_atencion es obligatorio para guardar curacion plana'];
        }

        $institucion = Instituciones::where('id_lugar_atencion',$req->id_lugar_atencion)->first();
        // Validar unicidad por ficha: si ya existe una curacion activa para esta ficha,
        // se actualiza ese registro en lugar de crear uno nuevo.
        $curacion_existente = CuracionesPlanasServicio::where('id_ficha_atencion', $req->id_ficha_atencion)
                                                    ->where('activa', 1)
                                                    ->first();

        if($curacion_existente){
            $nueva_curacion_plana = $curacion_existente;
        }else{
            $nueva_curacion_plana = new CuracionesPlanasServicio();
        }

        $nueva_curacion_plana->id_institucion = $institucion->id;
        $nueva_curacion_plana->id_ficha_atencion = $req->id_ficha_atencion;
        $nueva_curacion_plana->id_paciente = $req->id_paciente;
        $nueva_curacion_plana->id_responsable = Auth::user()->id;

        // Obtener datos existentes si hay un registro previo
        $datos_valoracion_existentes = $curacion_existente && $curacion_existente->datos_valoracion_plana
            ? json_decode($curacion_existente->datos_valoracion_plana, true) ?? []
            : [];
        $datos_curacion_existentes = $curacion_existente && $curacion_existente->datos_curacion_plana
            ? json_decode($curacion_existente->datos_curacion_plana, true) ?? []
            : [];

        // Datos de valoración (se guardan en datos_valoracion_plana)
        $datos_valoracion_nuevos = [
            'cp_asp' => $req->cp_asp,
            'cp_dol' => $req->cp_dol,
            'cp_ecal' => $req->cp_ecal,
            'cp_ecant' => $req->cp_ecant,
            'cp_ed' => $req->cp_ed,
            'cp_me' => $req->cp_me,
            'cp_pielc' => $req->cp_pielc,
            'cp_pro' => $req->cp_pro,
            'cp_tg' => $req->cp_tg,
            'cp_tn' => $req->cp_tn,
            'cp_obs' => $req->cp_obs,
            'tpo_les_curgen' => $req->tpo_les_curgen,
            'obs_cp_gral' => $req->obs_cp_gral,
            'obs_cur_plana' => $req->obs_cur_plana,
            'ptos_tot_ev' => $req->ptos_tot_ev,
            'observaciones' => $req->observaciones,
        ];

        // Datos de curación (se guardan en datos_curacion_plana)
        $datos_curacion_nuevos = [
            'cp_cult_plana' => $req->cp_cult_plana,
            'obs_cp_cult_plana' => $req->obs_cp_cult_plana,
            'cp_td_plana' => $req->cp_td_plana,
            'obs_cp_td_plana' => $req->obs_cp_td_plana,
            'cp_duch_plana' => $req->cp_duch_plana,
            'obs_cp_duch_plana' => $req->obs_cp_duch_plana,
            'desinf_plana' => $req->desinf_plana,
            'tpo_cub_plana' => $req->tpo_cub_plana,
            'obs_cur_plana' => $req->obs_cur_plana,
        ];

        // Filtrar solo los campos que vienen en el request (no null)
        $datos_valoracion_nuevos = array_filter($datos_valoracion_nuevos, function($value) {
            return $value !== null;
        });

        $datos_curacion_nuevos = array_filter($datos_curacion_nuevos, function($value) {
            return $value !== null;
        });

        // Hacer merge con los datos existentes (los nuevos sobrescriben los existentes)
        $datos_valoracion_final = array_merge($datos_valoracion_existentes, $datos_valoracion_nuevos);
        $datos_curacion_final = array_merge($datos_curacion_existentes, $datos_curacion_nuevos);

        $nueva_curacion_plana->datos_valoracion_plana = json_encode($datos_valoracion_final);
        $nueva_curacion_plana->datos_curacion_plana = json_encode($datos_curacion_final);
        $nueva_curacion_plana->activa = 1;

        if($nueva_curacion_plana->save()){
            $curacion = $this->dameCuracionesPlanasPaciente($req->id_paciente, $req->id_ficha_atencion);
            return ['mensaje' => 'OK', 'curacion' => $curacion];
        }
       } catch (\Exception $e) {
        //throw $th;
        return ['mensaje' => $e->getMessage()];
       }

    }

    public function dameCuracionesPlanasPaciente($id_paciente, $id_ficha_atencion = null){
        $query = CuracionesPlanasServicio::select('curaciones_planas_servicio.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_planas_servicio.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activa', 1);

            if(!empty($id_ficha_atencion))
            {
                $query->where('curaciones_planas_servicio.id_ficha_atencion', $id_ficha_atencion);
            }

            $curacion = $query->first();

            if($curacion)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $curacion->datos_curacion_plana = json_decode($curacion->datos_curacion_plana);
                // sacar la fecha y hora del campo created_at
                $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
                $curacion->hora = date('H:i', strtotime($curacion->created_at));
            }


        return $curacion;
    }

    public function guardarCuracionLPPServicio(Request $req){
        try {
            if (empty($req->id_ficha_atencion)) {
                return ['mensaje' => 'ERROR', 'msj' => 'id_ficha_atencion es obligatorio para guardar curacion LPP'];
            }

            // Validar unicidad por ficha: si ya existe una curación LPP activa para esta ficha,
            // se actualiza ese registro en lugar de crear uno nuevo.
            $curacion_existente = CuracionesLppServicio::where('id_ficha_atencion', $req->id_ficha_atencion)
                                                    ->where('activo', 1)
                                                    ->first();

            if($curacion_existente){
                $nueva_curacion_lpp = $curacion_existente;
            }else{
                $nueva_curacion_lpp = new CuracionesLppServicio();
            }

            $nueva_curacion_lpp->id_institucion = 19;
            $nueva_curacion_lpp->id_servicio = 4;
            $nueva_curacion_lpp->id_ficha_atencion = $req->id_ficha_atencion;
            $nueva_curacion_lpp->id_paciente = $req->id_paciente;
            $nueva_curacion_lpp->id_responsable = Auth::user()->id;

            // Obtener datos existentes si hay un registro previo
            $datos_valoracion_existentes = $curacion_existente && $curacion_existente->datos_valoracion_lpp
                ? json_decode($curacion_existente->datos_valoracion_lpp, true) ?? []
                : [];
            $datos_curacion_existentes = $curacion_existente && $curacion_existente->datos_curacion_lpp
                ? json_decode($curacion_existente->datos_curacion_lpp, true) ?? []
                : [];

            // Datos de valoración (se guardan en datos_valoracion_lpp)
            $datos_valoracion_nuevos = [
                'upp_local_eval' => $req->upp_local_eval,
                'upp_gr_eval' => $req->upp_gr_eval,
                'upp_diam_eval' => $req->upp_diam_eval,
                'upp_prof_eval' => $req->upp_prof_eval,
                'upp_Infec_eval' => $req->upp_Infec_eval,
                'obs_pa_eval_upp' => $req->obs_pa_eval_upp,
                'patologias_asociadas' => $req->patologias,
            ];

            // Datos de curación (se guardan en datos_curacion_lpp)
            $datos_curacion_nuevos = [
                'cp_cult' => $req->cp_cult,
                'obs_cp_cult' => $req->obs_cp_cult,
                'cp_td' => $req->cp_td,
                'obs_cp_td' => $req->obs_cp_td,
                'cp_duch' => $req->cp_duch,
                'obs_cp_duch' => $req->obs_cp_duch,
                'desinf' => $req->desinf,
                'tpo_cub' => $req->tpo_cub,
                'obs_cur' => $req->obs_cur,
            ];

            // Filtrar solo los campos que vienen en el request (no null)
            $datos_valoracion_nuevos = array_filter($datos_valoracion_nuevos, function($value) {
                return $value !== null;
            });

            $datos_curacion_nuevos = array_filter($datos_curacion_nuevos, function($value) {
                return $value !== null;
            });

            // Hacer merge con los datos existentes (los nuevos sobrescriben los existentes)
            $datos_valoracion_final = array_merge($datos_valoracion_existentes, $datos_valoracion_nuevos);
            $datos_curacion_final = array_merge($datos_curacion_existentes, $datos_curacion_nuevos);

            $nueva_curacion_lpp->datos_valoracion_lpp = json_encode($datos_valoracion_final);
            $nueva_curacion_lpp->datos_curacion_lpp = json_encode($datos_curacion_final);
            $nueva_curacion_lpp->activo = 1;

            if($nueva_curacion_lpp->save()){
                $curaciones_lpp = $this->dameCuracionesLppPaciente($req->id_paciente, $req->id_ficha_atencion);
                return ['mensaje' => 'OK','curaciones_lpp' => $curaciones_lpp];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function dameCuracionesLppPaciente($id_paciente, $id_ficha_atencion = null){
        $query = CuracionesLppServicio::select('curaciones_lpp_servicio.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_lpp_servicio.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activo', 1);

        if(!empty($id_ficha_atencion)){
            $query->where('curaciones_lpp_servicio.id_ficha_atencion', $id_ficha_atencion);
        }

        $curaciones = $query->get();

        foreach($curaciones as $curacion)
        {
            // Decodificar ambos campos JSON
            $curacion->datos_valoracion_lpp = json_decode($curacion->datos_valoracion_lpp);
            $curacion->datos_curacion_lpp = json_decode($curacion->datos_curacion_lpp);
            // sacar la fecha y hora del campo created_at
            $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
            $curacion->hora = date('H:i', strtotime($curacion->created_at));
        }

        return $curaciones;
    }

    public function eliminarCuracionLPPServicio($id){
        try {
            //code...
            $curacion = CuracionesLppServicio::find($id);
            $curacion->activo = 0;
            if($curacion->save()){
                $curaciones_lpp = $this->dameCuracionesLppPaciente($curacion->id_paciente, $curacion->id_ficha_atencion);
                return ['mensaje' => 'OK','curaciones_lpp' => $curaciones_lpp];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function llamar_paciente(Request $req){
        try {

            // verificar si ya existe ese paciente ingresado en el box
            $existe = PacienteBox::where('id_paciente',$req->id_paciente)->first();
            if(!$existe){
                $paciente_box = new PacienteBox();
                $paciente_box->id_paciente = $req->id_paciente;
                $paciente_box->id_box = $req->id_box;
                $paciente_box->id_camilla = $req->id_camilla;
                $paciente_box->id_responsable = Auth::user()->id;
                $paciente_box->fecha = date('Y-m-d');
                $paciente_box->hora = date('H:i:s');
                $paciente_box->observaciones = "SIN OBSERVACIONES";

                if($paciente_box->save()){
                    $bc = new BoxController();
                    $boxes = $bc->dame_boxes_atencion();
                    $pacientes_triage = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

                    // dame los pacientes que esten en cada box
                    foreach($boxes as $box)
                    {
                        $box->pacientes = $this->dame_pacientes_box($box->id);
                        foreach($box->pacientes as $paciente)
                        {
                            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                            $ano_diferencia  = date("Y") - $ano;
                            $mes_diferencia = date("m") - $mes;
                            $dia_diferencia   = date("d") - $dia;
                            if ($dia_diferencia < 0 || $mes_diferencia < 0)
                            $ano_diferencia--;

                            $edad = $ano_diferencia;
                            $paciente->edad = $edad;

                            $detalle_receta_controlador = new DetalleRecetaController();
                            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                            // Inicializar la variable booleana como false
                            $tieneRecetaPendiente = false;
                            // Recorrer las recetas
                            foreach ($recetas as $receta) {
                                // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                                if ($receta->estado_tratamiento == 1) {
                                    // Si se encuentra una receta pendiente, cambiar la variable a true
                                    $tieneRecetaPendiente = true;
                                    // Salir del ciclo
                                    break;
                                }
                            }

                            $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;
                        }
                    }



                    $paciente_triage = PacienteTriage::where('id_paciente',$req->id_paciente)->first();
                    $paciente_triage->estado = "INGRESADO";
                    $paciente_triage->save();

                    $pacientes_triage = $this->dame_pacientes_en_espera();

                    $pacientes_graves = $this->dame_pacientes_graves();

                    $v = view('page.fragm.boxes', compact('pacientes_triage','boxes'))->render();
                    return ['mensaje' => 'OK','vista' => $v,'pacientes' => $pacientes_triage,'pacientes_graves' => $pacientes_graves];
                }else{
                    return ['mensaje' => 'ERROR'];
                }
            }else{
                return ['mensaje'=> 'ERROR'];
            }

        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }

    }

    public function dame_pacientes_graves(){
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes.sexo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_triage', 1)
                                    ->orWhere('pacientes_triage.id_triage', 2)
                                    ->get();

        $pacientes_urgentes = [];

        foreach($pacientes as $paciente){
            // calcular edad del paciente por fecha de nacimiento
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
            // pacientes que no esten en ningun box
            $p = PacienteBox::where('id_paciente', $paciente->id_paciente)->first();
            if(!$p){
                $pacientes_urgentes[] = $paciente;
            }
        }

        // dar formato de colección a los pacientes
        $pacientes_urgentes = collect($pacientes_urgentes);

        // agregar a pacientes_triage los pacientes urgentes
        $pacientes = $pacientes_urgentes;
        return $pacientes;
    }

    public function dame_pacientes_en_espera(){
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.estado',"EN ESPERA")
                                    ->orderBy('asignacion_urgencia.codigo','asc')
                                    ->get();

        foreach($pacientes as $paciente)
        {
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
        }

        $pacientes_graves = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes.sexo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_triage', 1)
                                    ->orWhere('pacientes_triage.id_triage', 2)
                                    ->get();

        $pacientes_urgentes = [];

        foreach($pacientes_graves as $paciente){
            // calcular edad del paciente por fecha de nacimiento
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
            // pacientes que no esten en ningun box
            $p = PacienteBox::where('id_paciente', $paciente->id_paciente)->first();
            if(!$p){
                $pacientes_urgentes[] = $paciente;
            }
        }

        // dar formato de colección a los pacientes
        $pacientes_urgentes = collect($pacientes_urgentes);

        // agregar a pacientes_triage los pacientes urgentes
        $pacientes = $pacientes->merge($pacientes_urgentes);
        return $pacientes;
    }

    public function dame_pacientes_box($id_box, $id_paciente = null){
        try {
            $query = PacienteBox::select('paciente_box.*','pacientes.apellido_uno','pacientes.sexo','pacientes.fecha_nac','pacientes.rut','pacientes.nombres','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes_triage.id as id_paciente_triage')
                            ->join('pacientes','pacientes.id','=','paciente_box.id_paciente')
                            ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_box.id_paciente')
                            ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                            ->where('pacientes_triage.estado',"INGRESADO")
                            ->where('paciente_box.id_box', $id_box);

            if ($id_paciente !== null) {
                $query->where('paciente_box.id_paciente', $id_paciente);
            }

            $pacientes = $query->get();
            return $pacientes;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_camillas_box($id_box){
        $box = BoxAtencionServicio::find($id_box);
        return $box;
    }

    public function sacar_paciente_box(Request $req){
        try {
            //code...
            $paciente_box = PacienteBox::where('id_paciente', $req->id_paciente)->where('id_box', $req->id_box)->first();

            if($paciente_box->delete()){
                // volver al estado del paciente a INGRESADO
                $paciente_triage = PacienteTriage::where('id_paciente',$req->id_paciente)->first();
                $paciente_triage->estado = "EN ESPERA";
                $paciente_triage->save();
                $bc = new BoxController();
                $boxes = $bc->dame_boxes_atencion();

                $pacientes_triage = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

                    // dame los pacientes que esten en cada box
                    foreach($boxes as $box)
                    {
                        $box->pacientes = $this->dame_pacientes_box($box->id);
                        foreach($box->pacientes as $paciente)
                        {
                            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                            $ano_diferencia  = date("Y") - $ano;
                            $mes_diferencia = date("m") - $mes;
                            $dia_diferencia   = date("d") - $dia;
                            if ($dia_diferencia < 0 || $mes_diferencia < 0)
                            $ano_diferencia--;

                            $edad = $ano_diferencia;
                            $paciente->edad = $edad;

                            $detalle_receta_controlador = new DetalleRecetaController();
                            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                            // Inicializar la variable booleana como false
                            $tieneRecetaPendiente = false;
                            // Recorrer las recetas
                            foreach ($recetas as $receta) {
                                // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                                if ($receta->estado_tratamiento == 1) {
                                    // Si se encuentra una receta pendiente, cambiar la variable a true
                                    $tieneRecetaPendiente = true;
                                    // Salir del ciclo
                                    break;
                                }
                            }

                            $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;
                        }
                    }

                $pacientes_triage = $this->dame_pacientes_en_espera();
                $pacientes_graves = $this->dame_pacientes_graves();

                $v = view('page.fragm.boxes', compact('pacientes_triage','boxes'))->render();

                $ec = new EscritorioAdministracionController();
                $boxes_alerta = $ec->boxAlerta();
                return ['mensaje' => 'OK','vista' => $v,'pacientes' => $pacientes_triage,'pacientes_graves' => $pacientes_graves,'boxes_alerta' => $boxes_alerta];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function clave1(Request $req){
        $box = BoxAtencionServicio::find($req->id_box);
        if($box->alerta == 1) {
            $box->alerta = 0;
            $mensaje = "ALERTA DESACTIVADA";
            $tipo_mensaje = "success";
        }else{
            $box->alerta = 1;
            $mensaje = "ALERTA ACTIVADA";
            $tipo_mensaje = "warning";
        }
        if($box->save()){
            $bc = new BoxController();
            $boxes = $bc->dame_boxes_atencion();

            foreach($boxes as $box)
            {
                $box->pacientes = $this->dame_pacientes_box($box->id);
                foreach($box->pacientes as $paciente)
                {
                    list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                    $ano_diferencia  = date("Y") - $ano;
                    $mes_diferencia = date("m") - $mes;
                    $dia_diferencia   = date("d") - $dia;
                    if ($dia_diferencia < 0 || $mes_diferencia < 0)
                    $ano_diferencia--;

                    $edad = $ano_diferencia;
                    $paciente->edad = $edad;

                    $detalle_receta_controlador = new DetalleRecetaController();
                    $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                    // Inicializar la variable booleana como false
                    $tieneRecetaPendiente = false;
                    // Recorrer las recetas
                    foreach ($recetas as $receta) {
                        // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                        if ($receta->estado_tratamiento == 1) {
                            // Si se encuentra una receta pendiente, cambiar la variable a true
                            $tieneRecetaPendiente = true;
                            // Salir del ciclo
                            break;
                        }
                    }

                    $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;
                }
            }

            $pacientes_triage = $this->dame_pacientes_en_espera();
            $v = view('page.fragm.boxes', compact('pacientes_triage','boxes'))->render();
            $ec = new EscritorioAdministracionController();
                $boxes_alerta = $ec->boxAlerta();
            return ['mensaje' => 'OK','vista' => $v,'mensaje' => $mensaje,'tipo_mensaje' => $tipo_mensaje,'boxes_alerta' => $boxes_alerta];
        }
    }

    public function cambiar_estado_tratamiento(Request $req){
        try {
            $receta_interna = DetalleRecetaInterna::find($req->id_tratamiento);
            if($receta_interna->estado_tratamiento == 1){
                $receta_interna->estado_tratamiento = 0;
                $receta_interna->observaciones = $req->observaciones;

                // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
                $fecha_inicio = new \DateTime($receta_interna->created_at);
                $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
                $diferencia = $fecha_inicio->diff($fecha_actual);
                $dias = $diferencia->days;
                $horas = $diferencia->h;
                $minutos = $diferencia->i;
                if($dias == 0){
                    if($horas == 0){
                        $diferencia_formateada = $diferencia->format('%i m');
                    }else{
                        if($horas == 1){
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }else{
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }
                    }
                }else{
                    $diferencia_formateada = $diferencia->format('%d d %h h %i m');
                }

                //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
            }else{
                $receta_interna->estado_tratamiento = 1;
                $receta_interna->observaciones = '';
                $diferencia_formateada = '';
            }
            $receta_interna->otros_2 = $diferencia_formateada;
            if($receta_interna->save()){
                return ['mensaje' => 'OK','dif' => $diferencia_formateada,'estado' => $receta_interna->estado_tratamiento];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
        // $receta_interna = DetalleRecetaInterna::find($req->id_tratamiento);
        // if($receta_interna->estado_tratamiento == 1){
        //     $receta_interna->estado_tratamiento = 0;
        //     $receta_interna->observaciones = $req->observaciones;

        //     // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
        //     $fecha_inicio = new \DateTime($receta_interna->created_at);
        //     $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
        //     $diferencia = $fecha_inicio->diff($fecha_actual);
        //     $dias = $diferencia->days;
        //     $horas = $diferencia->h;
        //     $minutos = $diferencia->i;

        //     //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
        // }else{
        //     $receta_interna->estado_tratamiento = 1;
        //     $receta_interna->observaciones = '';
        // }
        // $receta_interna->otros_2 = $diferencia->format('%d dias %h horas %i minutos');
        // if($receta_interna->save()){
        //     return ['mensaje' => 'OK','dif' => $diferencia->format('%d dias %h horas %i minutos'),'estado' => $receta_interna->estado_tratamiento];
        // }
    }

    public function cambiar_estado_curacion(Request $req){
        try {
            $curacion_servicio = CuracionesServicio::find($req->id_tratamiento);

            if($curacion_servicio->estado == 1){
                $curacion_servicio->estado = 0;

                // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
                $fecha_inicio = new \DateTime($curacion_servicio->created_at);
                $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
                $diferencia = $fecha_inicio->diff($fecha_actual);
                $dias = $diferencia->days;
                $horas = $diferencia->h;
                $minutos = $diferencia->i;
                if($dias == 0){
                    if($horas == 0){
                        $diferencia_formateada = $diferencia->format('%i m');
                    }else{
                        if($horas == 1){
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }else{
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }
                    }
                }else{
                    $diferencia_formateada = $diferencia->format('%d d %h h %i m');
                }

                //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
            }else{
                $curacion_servicio->estado = 1;
                $diferencia_formateada = '';
            }
            $curacion_servicio->otros_2 = $diferencia_formateada;
            if($curacion_servicio->save()){
                return ['mensaje' => 'OK','dif' => $diferencia_formateada,'estado' => $curacion_servicio->estado];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function cambiar_estado_examen(Request $req){
        try {

            $examen_servicio = ExamenSolicitudServicio::find($req->id_examen);

            if($examen_servicio->estado == 1){
                $examen_servicio->estado = 0;

                // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
                $fecha_inicio = new \DateTime($examen_servicio->created_at);
                $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
                $diferencia = $fecha_inicio->diff($fecha_actual);
                $dias = $diferencia->days;
                $horas = $diferencia->h;
                $minutos = $diferencia->i;
                if($dias == 0){
                    if($horas == 0){
                        $diferencia_formateada = $diferencia->format('%i m');
                    }else{
                        if($horas == 1){
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }else{
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }
                    }
                }else{
                    $diferencia_formateada = $diferencia->format('%d d %h h %i m');
                }

                //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
            }else{
                $examen_servicio->estado = 1;
                $diferencia_formateada = '';
            }
            $examen_servicio->otros_2 = $diferencia_formateada;
            if($examen_servicio->save()){
                return ['mensaje' => 'OK','dif' => $diferencia_formateada,'estado' => $examen_servicio->estado];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function agregar_observaciones_tratamiento(Request $req){
        try {
            //code...
            $detalle_receta_interna = DetalleRecetaInterna::find($req->id_tratamiento);
            $detalle_receta_interna->observaciones = $req->observaciones;
            if($detalle_receta_interna->save()){
                return ['mensaje' => 'OK'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    /**
     * Guarda los insumos de una curación indicada
     */
    public function guardarInsumosCuracion(Request $req){
        try {
            $id_curacion = $req->id_curacion;
            $insumos = $req->insumos;

            // Buscar la curación
            $curacion = CuracionesServicio::find($id_curacion);

            if (!$curacion) {
                return response()->json(['exito' => false, 'mensaje' => 'Curación no encontrada']);
            }

            // Guardar insumos en JSON
            $curacion->insumos_utilizados = json_encode($insumos);

            if ($curacion->save()) {
                return response()->json(['exito' => true, 'mensaje' => 'Insumos guardados correctamente']);
            } else {
                return response()->json(['exito' => false, 'mensaje' => 'Error al guardar insumos']);
            }
        } catch (\Exception $e) {
            return response()->json(['exito' => false, 'mensaje' => $e->getMessage()]);
        }
    }

    /**
     * Actualiza el estado de una curación
     */
    public function actualizarEstadoCuracion(Request $req){
        try {
            $id_curacion = $req->id_curacion;
            $estado = $req->estado;

            $curacion = CuracionesServicio::find($id_curacion);

            if (!$curacion) {
                return response()->json(['exito' => false, 'mensaje' => 'Curación no encontrada']);
            }

            $curacion->estado = $estado;

            if ($curacion->save()) {
                return response()->json(['exito' => true, 'mensaje' => 'Estado actualizado']);
            } else {
                return response()->json(['exito' => false, 'mensaje' => 'Error al actualizar estado']);
            }
        } catch (\Exception $e) {
            return response()->json(['exito' => false, 'mensaje' => $e->getMessage()]);
        }
    }

    /**
     * Actualiza las observaciones de una curación
     */
    public function actualizarObservacionesCuracion(Request $req){
        try {
            $id_curacion = $req->id_curacion;
            $otros = $req->otros;

            $curacion = CuracionesServicio::find($id_curacion);

            if (!$curacion) {
                return response()->json(['exito' => false, 'mensaje' => 'Curación no encontrada']);
            }

            $curacion->otros = $otros;

            if ($curacion->save()) {
                return response()->json(['exito' => true, 'mensaje' => 'Observaciones guardadas']);
            } else {
                return response()->json(['exito' => false, 'mensaje' => 'Error al guardar observaciones']);
            }
        } catch (\Exception $e) {
            return response()->json(['exito' => false, 'mensaje' => $e->getMessage()]);
        }
    }

    /**
     * Elimina una curación indicada
     */
    public function eliminarCuracion(Request $req){
        try {
            $id_curacion = $req->id_curacion;

            $curacion = CuracionesServicio::find($id_curacion);

            if (!$curacion) {
                return response()->json(['exito' => false, 'mensaje' => 'Curación no encontrada']);
            }

            if ($curacion->delete()) {
                return response()->json(['exito' => true, 'mensaje' => 'Curación eliminada correctamente']);
            } else {
                return response()->json(['exito' => false, 'mensaje' => 'Error al eliminar curación']);
            }
        } catch (\Exception $e) {
            return response()->json(['exito' => false, 'mensaje' => $e->getMessage()]);
        }
    }

    public function guardarAntecedentesServicio(Request $req){
        return $req;
    }

    /**
     * ============================================================================
     * NUEVOS MÉTODOS USANDO CURACION_REGISTRO
     * ============================================================================
     */

    /**
     * Método genérico para guardar cualquier tipo de curación usando CuracionRegistro
     */
    public function guardarCuracionRegistro(Request $req)
    {
        try {

            // Validaciones
            if (empty($req->id_ficha_atencion)) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'id_ficha_atencion es obligatorio'
                ], 400);
            }

            if (empty($req->tipo_curacion)) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'tipo_curacion es obligatorio'
                ], 400);
            }

            // Obtener profesional actual
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            if (!$profesional) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'Profesional no encontrado'
                ], 404);
            }

            // Crear nuevo registro de curación
            $curacion = new CuracionRegistro();
            $curacion->id_ficha_atencion = $req->id_ficha_atencion;
            $curacion->id_profesional = $profesional->id;
            $curacion->id_paciente = $req->id_paciente;
            $curacion->id_lugar_atencion = $req->id_lugar_atencion;
            $curacion->tipo_curacion = $req->tipo_curacion; // plana, lpp, pie_diabetico, quemados
            $curacion->etapa = $req->etapa ?? 'mixta'; // valoracion, curacion, mixta
            $curacion->estado = 1; // 0 = pendiente, 1 = completado
            $curacion->activo = true;
            $curacion->fecha = now()->format('Y-m-d');
            $curacion->hora = now()->format('H:i:s');

            // Preparar datos según el tipo de curación
            $datos_valoracion = [];
            $datos_curacion = [];
            $observaciones = $req->observaciones ?? '';

            switch ($req->tipo_curacion) {
                case 'plana':
                    $datos_valoracion = $this->prepararDatosValoracionPlana($req);
                    $datos_curacion = $this->prepararDatosCuracionPlana($req);
                    break;

                case 'lpp':
                    $datos_valoracion = $this->prepararDatosValoracionLpp($req);
                    $datos_curacion = $this->prepararDatosCuracionLpp($req);
                    break;

                case 'pie_diabetico':
                    $datos_valoracion = $this->prepararDatosValoracionPieDiabetico($req);
                    $datos_curacion = $this->prepararDatosCuracionPieDiabetico($req);
                    break;

                case 'quemados':
                    $datos_valoracion = $this->prepararDatosValoracionQuemados($req);
                    $datos_curacion = $this->prepararDatosCuracionQuemados($req);
                    break;

                default:
                    return response()->json([
                        'mensaje' => 'ERROR',
                        'msj' => 'Tipo de curación no válido'
                    ], 400);
            }

            $curacion->datos_valoracion = $datos_valoracion;
            $curacion->datos_curacion = $datos_curacion;
            $curacion->observaciones = $observaciones;
            $curacion->save();

            // Preparar datos para la respuesta
            $response = [
                'mensaje' => 'OK',
                'msj' => 'Curación registrada exitosamente',
                'data' => $curacion,
                'curacion' => [
                    'id' => $curacion->id,
                    'fecha' => \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y'),
                    'fecha_format' => \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y'),
                    'hora' => \Carbon\Carbon::parse($curacion->hora)->format('H:i'),
                    'responsable' => $profesional->nombre . ' ' . $profesional->apellido_uno,
                    'nombre_procedimiento' => $curacion->getNombreProcedimiento(),
                    'otros' => $curacion->observaciones ?? '',
                    'observaciones' => $curacion->observaciones ?? '',
                    'estado' => $curacion->estado,
                    'tipo_curacion' => $curacion->tipo_curacion,
                    'etapa' => $curacion->etapa,
                    'datos_valoracion' => $datos_valoracion,
                    'datos_curacion' => $datos_curacion,
                ],
                'curaciones' => CuracionRegistro::where('id_ficha_atencion', $req->id_ficha_atencion)
                            ->where('activo', 1)
                            ->where('tipo_curacion', $req->tipo_curacion)
                            ->orderBy('fecha', 'desc')
                            ->orderBy('hora', 'desc')
                            ->get()
            ];

            // Si es valoración plana, agregar datos para actualizar el gráfico
            if ($req->tipo_curacion == 'plana' && $req->etapa == 'valoracion') {
                $response['datos_grafico'] = $this->obtenerDatosGraficoCuracionPlana($req->id_ficha_atencion);
            }

            // Si es valoración de pie diabético, agregar datos para actualizar el gráfico
            if ($req->tipo_curacion == 'pie_diabetico' && $req->etapa == 'valoracion') {
                $response['datos_grafico_pie_diabetico'] = $this->obtenerDatosGraficoPieDiabetico($req->id_ficha_atencion);
            }

            if ($req->tipo_curacion == 'lpp' && $req->etapa == 'valoracion') {
                $response['datos_grafico_lpp'] = $this->obtenerDatosGraficoLPP($req->id_ficha_atencion);
            }

            return response()->json($response);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Error al guardar curación: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cargar_informacion_atencion(Request $req){
        $curaciones = CuracionRegistro::where('id_ficha_atencion', $req->id_ficha_atencion)->where('activo', 1)->orderBy('fecha', 'desc')->orderBy('hora', 'desc')->get();
        foreach($curaciones as $curacion) {
            $profesional = Profesional::find($curacion->id_profesional);
            $curacion->responsable = $profesional ? $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . ($profesional->apellido_dos ?? '') : '';
            $curacion->detalle = $this->obtenerDetallesCuracion($curacion);
            $curacion->fecha = \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y');
            $curacion->hora = \Carbon\Carbon::parse($curacion->hora)->format('H:i');
            $curacion->color = $this->obtenerConfigTipo($curacion->tipo_curacion)['color'];
            $curacion->icono = $this->obtenerConfigTipo($curacion->tipo_curacion)['icono'];
        }

        return response()->json([
            'mensaje' => 'OK',
            'msj' => 'Información de atención cargada exitosamente',
            'data' => $curaciones
        ]);
    }


    function dame_curacion(Request $req){
        $curacion = CuracionRegistro::find($req->id);
        if($curacion) {
            $profesional = Profesional::find($curacion->id_profesional);
            $curacion->responsable = $profesional ? $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . ($profesional->apellido_dos ?? '') : '';
            $curacion->detalle = $this->obtenerDetallesCuracion($curacion);
            $curacion->fecha = \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y');
            $curacion->hora = \Carbon\Carbon::parse($curacion->hora)->format('H:i');
            $curacion->color = $this->obtenerConfigTipo($curacion->tipo_curacion)['color'];
            $curacion->icono = $this->obtenerConfigTipo($curacion->tipo_curacion)['icono'];

            return response()->json([
                'mensaje' => 'OK',
                'msj' => 'Curación encontrada',
                'data' => $curacion
            ]);
        } else {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Curación no encontrada'
            ], 404);
        }
    }
    function obtenerConfigTipo($tipo) {
        $config = [
            'plana' => ['nombre' => 'Curación Plana', 'color' => 'info', 'icono' => 'fas fa-band-aid'],
            'lpp' => ['nombre' => 'Curación LPP', 'color' => 'warning', 'icono' => 'fas fa-heartbeat'],
            'pie_diabetico' => ['nombre' => 'Pie Diabético', 'color' => 'danger', 'icono' => 'fas fa-socks'],
            'quemados' => ['nombre' => 'Quemaduras', 'color' => 'success', 'icono' => 'fas fa-fire-alt'],
        ];
        return $config[$tipo] ?? ['nombre' => 'Curación', 'color' => 'secondary', 'icono' => 'fas fa-medkit'];
    }

    function obtenerDetallesCuracion($curacion) {
        $tipo = $curacion->tipo_curacion;
        $datos_val = is_string($curacion->datos_valoracion)
            ? json_decode($curacion->datos_valoracion, true)
            : (array)$curacion->datos_valoracion;

        $datos_cur = is_string($curacion->datos_curacion)
            ? json_decode($curacion->datos_curacion, true)
            : (array)$curacion->datos_curacion;

        // Arrays de opciones locales
        $superficie_quemada = ['0'=>'No selec.', '1'=>'< 9%', '2'=>'9-18%', '3'=>'>18%', '4'=>'Otros'];
        $tipo_quemadura = ['0'=>'No selec.', '1'=>'Solar', '2'=>'Por Líquidos', '3'=>'Vapores y gases', '4'=>'Sust. Químicas', '5'=>'Eléctricidad', '6'=>'Fuego directo', '11'=>'Otros'];
        $toma_cultivo = ['0'=>'No selec.', '1'=>'No', '2'=>'Si', '3'=>'Observaciones'];
        $tipo_debridamiento = ['0'=>'No selec.', '1'=>'Quirúrgico', '2'=>'Cortante', '3'=>'Enzimático', '4'=>'Autolítico', '5'=>'Osmótico', '6'=>'Larval', '7'=>'Mecánico', '8'=>'Otros'];
        $duchoterapia = ['0'=>'No selec.', '1'=>'Si', '2'=>'No', '3'=>'Observaciones'];
        $aspectos_pd = ['0'=>'No selec.','1'=>'Erimatoso','2'=>'Enrojecido','3'=>'Amarillo pálido','4'=>'Necrótico grisáceo','5'=>'Necrótico negruzco'];
        $profundidad_pd = ['0'=>'No selec.','1'=>'Epidermis','2'=>'Dermis','3'=>'Subcutáneo','4'=>'Tendón/Músculo','5'=>'Hueso/Articulación'];

        switch($tipo) {
            case 'plana':
                return 'Tipo: ' . ($datos_val['tpo_les_curgen'] ?? 'N/A');
            case 'lpp':
                return 'Categoría: ' . ($datos_val['categoria_lpp'] ?? 'N/A');
            case 'pie_diabetico':
                $puntaje = $datos_val['ptos_tot_ev_diab'] ?? 'N/A';
                $aspecto = $aspectos_pd[$datos_val['aspecto_pie_diab'] ?? '0'] ?? 'N/A';
                $profund = $profundidad_pd[$datos_val['profundidad_curacion'] ?? '0'] ?? 'N/A';
                return 'P.Total: ' . $puntaje . ' | Aspecto: ' . $aspecto . ' | Profundidad: ' . $profund;
            case 'quemados':
                // Si hay datos de curación, mostrar esos
                if (!empty($datos_cur) && isset($datos_cur['cp_cult'])) {
                    $cult = $toma_cultivo[$datos_cur['cp_cult'] ?? '0'] ?? 'N/A';
                    $debrid = $tipo_debridamiento[$datos_cur['cp_td'] ?? '0'] ?? 'N/A';
                    $ducho = $duchoterapia[$datos_cur['cp_duch'] ?? '0'] ?? 'N/A';
                    return 'Cultivo: ' . $cult . ' | Debridamiento: ' . $debrid . ' | Ducho: ' . $ducho;
                }
                // Si solo hay valoración
                $sup = $superficie_quemada[$datos_val['qmsupqm'] ?? '0'] ?? 'N/A';
                $tq = $tipo_quemadura[$datos_val['qm_tq'] ?? '0'] ?? 'N/A';
                return 'Superficie: ' . $sup . ' | Tipo: ' . $tq;
            default:
                return 'Sin detalles';
        }
    }

    /**
     * Preparar datos de valoración para curación plana
     */
    private function prepararDatosValoracionPlana(Request $req)
    {
        return [
            'cp_asp' => $req->cp_asp,
            'cp_dol' => $req->cp_dol,
            'cp_ecal' => $req->cp_ecal,
            'cp_ecant' => $req->cp_ecant,
            'cp_ed' => $req->cp_ed,
            'cp_me' => $req->cp_me,
            'cp_pielc' => $req->cp_pielc,
            'cp_pro' => $req->cp_pro,
            'cp_tg' => $req->cp_tg,
            'cp_tn' => $req->cp_tn,
            'cp_obs' => $req->cp_obs,
            'tpo_les_curgen' => $req->tpo_les_curgen,
            'obs_cp_gral' => $req->obs_cp_gral,
            'obs_cur_plana' => $req->obs_cur_plana,
            'ptos_tot_ev' => $req->ptos_tot_ev,
            'obs_cp_asp' => $req->obs_cp_asp,
            'obs_cp_me' => $req->obs_cp_me,
            'obs_cp_pro' => $req->obs_cp_pro,
            'obs_cp_ecant' => $req->obs_cp_ecant,
            'obs_cp_ecal' => $req->obs_cp_ecal,
            'obs_cp_tn' => $req->obs_cp_tn,
            'obs_cp_tg' => $req->obs_cp_tg,
            'obs_cp_ed' => $req->obs_cp_ed,
            'obs_cp_dol' => $req->obs_cp_dol,
            'obs_cp_pielc' => $req->obs_cp_pielc,
        ];
    }

    /**
     * Preparar datos de curación para curación plana
     */
    private function prepararDatosCuracionPlana(Request $req)
    {
        return [
            'cp_cult_plana' => $req->cp_cult_plana,
            'cp_observaciones' => $req->cp_observaciones,
            'cp_td_plana' => $req->cp_td_plana,
            'cp_duch_plana' => $req->cp_duch_plana,
            'cp_antisepticos' => $req->cp_antisepticos,
            'cp_apositos' => $req->cp_apositos,
        ];
    }

    /**
     * Preparar datos de valoración para LPP
     */
   private function prepararDatosValoracionLpp(Request $req)
{
    return [
        // Datos clínicos generales
        'upp_local_eval' => $req->upp_local_eval,
        'obs_upp_local_eval' => $req->obs_upp_local_eval,
        'upp_gr_eval' => $req->upp_gr_eval,
        'upp_prof_eval' => $req->upp_prof_eval,
        'obs_upp_prof_eval' => $req->obs_upp_prof_eval,
        'upp_infeccion_eval' => $req->upp_infeccion_eval,

        // Datos PUSH
        'upp_largo_eval' => $req->upp_largo_eval,
        'upp_ancho_eval' => $req->upp_ancho_eval,
        'upp_superficie_eval' => $req->upp_superficie_eval,
        'upp_exudado_eval' => $req->upp_exudado_eval,
        'upp_tejido_eval' => $req->upp_tejido_eval,
        'upp_puntaje' => $req->upp_puntaje,

        // Observaciones
        'obs_pa_eval_upp' => $req->obs_pa_eval_upp,
        'obs_val_eval_upp' => $req->obs_val_eval_upp,

        // Compatibilidad antigua
        'lpp_puntaje_total' => $req->upp_puntaje,
    ];
}

    /**
     * Preparar datos de curación para LPP
     */
    private function prepararDatosCuracionLpp(Request $req)
    {
        return [
            'lpp_cultivo' => $req->lpp_cultivo,
            'lpp_td' => $req->lpp_td,
            'lpp_ducha' => $req->lpp_ducha,
            'lpp_antisep' => $req->lpp_antisep,
            'lpp_apositos' => $req->lpp_apositos,
            'lpp_obs_curacion' => $req->lpp_obs_curacion,
        ];
    }

    /**
     * Preparar datos de valoración para pie diabético
     */
    private function prepararDatosValoracionPieDiabetico(Request $req)
    {
        return [
            'aspecto_pie_diab' => $req->aspecto_pie_diab,
            'obs_aspecto_pie_diab' => $req->obs_aspecto_pie_diab,
            'mayor_extension' => $req->mayor_extension,
            'obs_mayor_extension' => $req->obs_mayor_extension,
            'profundidad_curacion' => $req->profundidad_curacion,
            'obs_profundidad_curacion' => $req->obs_profundidad_curacion,
            'exudado_cantidad_curacion' => $req->exudado_cantidad_curacion,
            'obs_exudado_cantidad_curacion' => $req->obs_exudado_cantidad_curacion,
            'exudado_calidad_curacion' => $req->exudado_calidad_curacion,
            'obs_exudado_calidad_curacion' => $req->obs_exudado_calidad_curacion,
            'tejido_esf' => $req->tejido_esf,
            'obs_tejido_esf' => $req->obs_tejido_esf,
            'tejido_granu' => $req->tejido_granu,
            'obs_tejido_granu' => $req->obs_tejido_granu,
            'edema_curacion' => $req->edema_curacion,
            'obs_edema_curacion' => $req->obs_edema_curacion,
            'dolor_curacion' => $req->dolor_curacion,
            'obs_dolor_curacion' => $req->obs_dolor_curacion,
            'piel_circun' => $req->piel_circun,
            'obs_piel_circun' => $req->obs_piel_circun,
            'ptos_tot_ev_diab' => $req->ptos_tot_ev_diab,
            'obs_orin' => $req->obs_orin,
            'pat_prop' => $req->pat_prop,
            'sint_act' => $req->sint_act,
            'ot_pat_act' => $req->ot_pat_act,
        ];
    }

    /**
     * Preparar datos de curación para pie diabético
     */
    private function prepararDatosCuracionPieDiabetico(Request $req)
    {
        return [
            'pd_cultivo' => $req->pd_cultivo,
            'pd_desbridamiento' => $req->pd_desbridamiento,
            'pd_lavado' => $req->pd_lavado,
            'pd_antiseptico' => $req->pd_antiseptico,
            'pd_apositos' => $req->pd_apositos,
            'pd_obs_curacion' => $req->pd_obs_curacion,
        ];
    }

    /**
     * Preparar datos de valoración para quemados
     */
    private function prepararDatosValoracionQuemados(Request $req)
    {
        return [
            'quem_zona_afectada' => $req->quem_zona_afectada,
            'quem_grado' => $req->quem_grado,
            'quem_infeccion' => $req->quem_infeccion,
            'quem_tipo_quemadura' => $req->quem_tipo_quemadura,
            'quem_tipo_curacion' => $req->quem_tipo_curacion,
            'quem_enfermedad_actual' => $req->quem_enfermedad_actual,
            'med_quem' => $req->med_quem,
            'quem_obs_valoracion' => $req->quem_obs_valoracion,
        ];
    }

    /**
     * Preparar datos de curación para quemados
     */
    private function prepararDatosCuracionQuemados(Request $req)
    {
        return [
            'quem_limpieza' => $req->quem_limpieza,
            'quem_desbridamiento' => $req->quem_desbridamiento,
            'quem_duchoterapia' => $req->quem_duchoterapia,
            'quem_aposito' => $req->quem_aposito,
            'quem_antiseptico' => $req->quem_antiseptico,
            'quem_obs_curacion' => $req->quem_obs_curacion,
        ];
    }

    /**
     * Obtener curaciones registradas por ficha y tipo
     */
    public function obtenerCuracionesRegistro(Request $req)
    {
        try {
            $curaciones = CuracionRegistro::where('id_ficha_atencion', $req->id_ficha_atencion)
                ->where('tipo_curacion', $req->tipo_curacion)
                ->where('activo', true)
                ->orderBy('created_at', 'desc')
                ->get();

            // Formatear datos para la vista
            $curaciones->each(function ($curacion) {
                $curacion->fecha_format = $curacion->fecha ? date('d-m-Y', strtotime($curacion->fecha)) : 'N/A';
                $profesional = Profesional::find($curacion->id_profesional);
                $curacion->responsable = $profesional
                    ? trim($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos)
                    : 'Sin datos';
            });

            return response()->json([
                'mensaje' => 'OK',
                'data' => $curaciones
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Error al obtener curaciones: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener el detalle de una curación específica por ID
     */
    public function obtenerCuracionRegistroDetalle($id)
    {
        try {
            $curacion = CuracionRegistro::where('id', $id)
                ->where('activo', true)
                ->first();

            if (!$curacion) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'Curación no encontrada'
                ], 404);
            }

            $profesional = Profesional::find($curacion->id_profesional);
            $responsable = $profesional
                ? trim($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos)
                : 'Sin datos';

            $datos_valoracion = is_string($curacion->datos_valoracion)
                ? json_decode($curacion->datos_valoracion, true)
                : (array) $curacion->datos_valoracion;

            $datos_curacion = is_string($curacion->datos_curacion)
                ? json_decode($curacion->datos_curacion, true)
                : (array) $curacion->datos_curacion;

            return response()->json([
                'mensaje' => 'OK',
                'curacion' => [
                    'id' => $curacion->id,
                    'tipo_curacion' => $curacion->tipo_curacion,
                    'etapa' => $curacion->etapa,
                    'fecha' => $curacion->fecha ? date('d-m-Y', strtotime($curacion->fecha)) : 'N/A',
                    'hora' => $curacion->hora ? date('H:i', strtotime($curacion->hora)) : 'N/A',
                    'responsable' => $responsable,
                    'observaciones' => $curacion->observaciones ?? '',
                    'datos_valoracion' => $datos_valoracion,
                    'datos_curacion' => $datos_curacion,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Error al obtener detalle: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar (desactivar) una curación
     */
    public function eliminarCuracionRegistro(Request $req)
    {        try {
            $curacion = CuracionRegistro::find($req->id);
            if (!$curacion) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'msj' => 'Curación no encontrada'
                ], 404);
            }

            $curacion->activo = false;
            $curacion->save();

            if($curacion->tipo_curacion == 'plana' && $curacion->etapa == 'valoracion') {
                $datos_grafico = $this->obtenerDatosGraficoCuracionPlana($curacion->id_ficha_atencion);
            }

            if($curacion->tipo_curacion == 'pie_diabetico' && $curacion->etapa == 'valoracion') {
                $datos_grafico_pie_diabetico = $this->obtenerDatosGraficoPieDiabetico($curacion->id_ficha_atencion);
            }

            if($curacion->tipo_curacion == 'lpp' && $curacion->etapa == 'valoracion') {
                $datos_grafico_lpp = $this->obtenerDatosGraficoLPP($curacion->id_ficha_atencion);
            }

            return response()->json([
                'mensaje' => 'OK',
                'msj' => 'Curación eliminada exitosamente',
                'datos_grafico' => $datos_grafico ?? null,
                'datos_grafico_pie_diabetico' => $datos_grafico_pie_diabetico ?? null,
                'datos_grafico_lpp' => $datos_grafico_lpp ?? null,
                'curaciones' => CuracionRegistro::where('id_ficha_atencion', $curacion->id_ficha_atencion)
                    ->where('tipo_curacion', $curacion->tipo_curacion)
                    ->where('activo', 1)
                    ->orderBy('created_at', 'desc')
                    ->get()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'msj' => 'Error al eliminar curación: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener datos para el gráfico de Curación Plana
     */
    private function obtenerDatosGraficoCuracionPlana($id_ficha_atencion)
    {
        $curaciones = CuracionRegistro::where('id_ficha_atencion', $id_ficha_atencion)
            ->where('tipo_curacion', 'plana')
            ->where('etapa', 'valoracion')
            ->where('activo', true)
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'asc')
            ->get();

        $fechas = [];
        $puntajes = [];
        $valores = [];

        foreach ($curaciones as $curacion) {
            $datos_val = is_string($curacion->datos_valoracion)
                ? json_decode($curacion->datos_valoracion, true)
                : (array)$curacion->datos_valoracion;

            if (!empty($datos_val)) {
                $fechas[] = \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y');
                $puntajes[] = (int)($datos_val['ptos_tot_ev'] ?? 0);
                $valores[] = $datos_val['tpo_les_curgen'] ?? 'Sin valor';
            }
        }

        return [
            'fechas' => $fechas,
            'puntajes' => $puntajes,
            'valores' => $valores
        ];
    }

    /**
     * Obtener datos para el gráfico de Pie Diabético
     */
    private function obtenerDatosGraficoPieDiabetico($id_ficha_atencion)
    {
        $curaciones = CuracionRegistro::where('id_ficha_atencion', $id_ficha_atencion)
            ->where('tipo_curacion', 'pie_diabetico')
            ->where('etapa', 'valoracion')
            ->where('activo', true)
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'asc')
            ->get();

        $fechas = [];
        $puntajes = [];

        foreach ($curaciones as $curacion) {
            $datos_val = is_string($curacion->datos_valoracion)
                ? json_decode($curacion->datos_valoracion, true)
                : (array)$curacion->datos_valoracion;

            if (!empty($datos_val)) {
                $fechas[] = \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y');
                $puntajes[] = (int)($datos_val['ptos_tot_ev_diab'] ?? 0);
            }
        }

        return [
            'fechas' => $fechas,
            'puntajes' => $puntajes
        ];
    }

    private function obtenerDatosGraficoLPP($id_ficha_atencion)
{
    $curaciones = CuracionRegistro::where('id_ficha_atencion', $id_ficha_atencion)
        ->where('activo', 1)
        ->where('tipo_curacion', 'lpp')
        ->where('etapa', 'valoracion')
        ->orderBy('fecha', 'asc')
        ->orderBy('hora', 'asc')
        ->get();

    $fechas = [];
    $puntajes = [];

    foreach ($curaciones as $curacion) {
        $datos = is_string($curacion->datos_valoracion)
            ? json_decode($curacion->datos_valoracion, true)
            : (array)$curacion->datos_valoracion;

        $fechas[] = \Carbon\Carbon::parse($curacion->fecha)->format('d-m-Y');
        $puntajes[] = (int)($datos['upp_puntaje'] ?? $datos['lpp_puntaje_total'] ?? 0);
    }

    return [
        'fechas' => $fechas,
        'puntajes' => $puntajes,
    ];
}
}
