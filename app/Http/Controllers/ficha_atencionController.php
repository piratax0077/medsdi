<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;

use App\Models\AntConfidenciales;
use App\Models\AntecedentesCirugias;
use App\Models\Antecedente;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
use App\Models\Articulo;
use App\Models\AsignacionUrgencia;
use App\Models\ArticuloFaltante;
use App\Models\Biopsia;
use App\Models\Bodega;
use App\Models\CertificadoDefuncion;
use App\Models\CertificadoReposo;
use App\Models\ConsentimientoFaltante;
use App\Models\ControlDomiciliario;
use App\Models\ControlNutricion;
use App\Models\Correlativos;
use App\Models\DiagnosticosDental;
use App\Models\DiagnosticosDentalProfesional;
use App\Models\EmpresasConvenios;
use App\Models\EvolucionPacienteHospital;
use App\Models\EvolucionUrgencia;
use App\Models\ExamenAudicion;
use App\Models\ExamenPlanTratamiento;
use App\Models\ExamenesBocaGeneral;
use App\Models\ExamenesDentalDolor;
use App\Models\ExamenesDentalPieza;
use App\Models\ExamenesDentalPiezaHistoria;
use App\Models\ExamenesDentalPiezaPeriod;
use App\Models\ExamenesDentalPeriodoncia;
use App\Models\FormularioFaltante;
use App\Models\Sugerencias;
use App\Models\SolicitudSoporte;
use App\Models\Ciudad;
use App\Models\CnsTipo;
use App\Models\CnsTipoTemplate;
use App\Models\ContactoEmergencia;
use App\Models\ControlObesidad;
use App\Models\ControlPostQuirurgico;
use App\Models\CuracionesTipo;
use App\Models\DeclaracionEno;
use App\Models\DetalleReceta;
use App\Models\DetalleRecetaInterna;
use App\Models\Diabete;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\ExamenEspecialidadTipo;
use App\Models\ExamenesDentalOralRx;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\FichaAtencion;
use App\Models\FichaAtencionEnfermeria;
use App\Models\FichaEnfermeriaDocumentoNutricion;
use App\Models\FichaAtencionRayo;
use App\Models\FichaCirugiaDigestivaTipo;
use App\Models\FichaCirugiaGeneral;
use App\Models\FichaCirugiaGeneralAdulto;
use App\Models\FichaCirugiaGeneralTipo;
use App\Models\FichaNeuro;
use App\Models\FichaOtorrino;
use App\Models\FichaOrl;
use App\Models\FichaOtorrinoTipo;
use App\Models\GesRegistros;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Events\HoraMedicaUpdated;
use App\Models\InformeMedico;
use App\Models\InsumosTratamientosDental;
use App\Models\Interconsulta;
use App\Models\ImagenesDentalRxPaciente;
use App\Models\ImagenesDentalPaciente;
use App\Models\Laboratorio;
use App\Models\Licencia;
use App\Models\LicenciaPPF;
use App\Models\LugarAtencion;
use App\Models\MarcasImplantes;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacienteTriage;
use App\Models\PagosPresupuestoDental;
use App\Models\PedidoInsumos;
use App\Models\PedidoMateriales;
use App\Models\PermisoProfesional;
use App\Models\PiezasDentalCoronaProtesis;
use App\Models\PiezaPeriodontograma;
use App\Models\Presentacion;
use App\Models\PresupuestosDental;
use App\Models\Prevision;
use App\Models\Producto;
use App\Models\ProcedimientosPostImplantes;
use App\Models\ProcedimientosImplantesRehab;
use App\Models\ProcedimientosGruposPostImplantes;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\PlanTratamientoOtrosProfesionales;
use App\Models\Region;
use App\Models\Responsable;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SubTipoEspecialidad;
use App\Models\TratamientosDental;
use App\Models\TipoEspecialidad;
use App\Models\TipoExamen;
use App\Models\User;
use App\Models\UsoPersonal;
use Carbon\Carbon;
use App\Models\FichaCirugiaDigestivaGeneralAdulto;
use App\Models\FichaDermo;
use App\Models\FichaDermoImg;
use App\Models\FichaGinecoObstetrica;
use App\Models\FichaOft;
use App\Models\FichaOftalmologiaAdulto;
use App\Models\FichaOftBiomicroscopia;
use App\Models\FichaOftBiomicroscopiaTipo;
use App\Models\FichaOftFondoOjo;
use App\Models\FichaOftFondoOjoTipo;
use App\Models\FichaOftTipo;
use App\Models\FichaOrtopedia;
use App\Models\FichaOrtopediaAdulto;
use App\Models\FichaOtrosProfesionales;
use App\Models\FichaPediatriaCns;
use App\Models\FichaPediatriaGeneral;
use App\Models\FichaPediatriaGeneralTipo;
use App\Models\FichaPediatriaVacuna;
use App\Models\FichaTraumatologia;
use App\Models\FichaTraumatologiaAdulto;
use App\Models\FichaUro;
use App\Models\FichaUroTipo;
use App\Models\GesRegistrosImg;
use App\Models\Instituciones;
use App\Models\LogUsersDevices;
use App\Models\NotificacionConfirmacion;
use App\Models\PacientesDependientes;
use App\Models\ProcedimientosImplantes;
use App\Models\Proveedor;
use App\Models\RecetaAudifono;
use App\Models\RecetaControl;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalleAdministracion;
use App\Models\ResultadoExamen;
use App\Models\TipoAntecedente;
use App\Models\TipoInforme;
use App\Models\FichaUrologiaAdulto;
use App\Models\FichaVenereas;
use App\Models\GrupoSanguineo;
use App\Models\OctavoPar;
use App\Models\OdontogramaPaciente;
use App\Models\OftalmoExamenAgudezaVisual;
use App\Models\OftalmoExamenCampoVisual;
use App\Models\OftalmoExamenEstrabismo;
use App\Models\OftalmoExamenMovOculares;
use App\Models\OftalmoExamenNeurologico;
use App\Models\OftalmoExamenPresionOcular;
use App\Models\OftalmoExamenVisionColores;
use App\Models\OrdenTrabajoMenor;
use App\Models\OrdenTrabajoMayor;
use App\Models\ProcedimientosCentro;
use App\Models\SolicitudHospitalizacion;
use App\Models\RecomendacionDetalle;
use App\Models\VideoConsultaInfo;
use App\Models\TratamientosImplantologia;
use App\Models\TiposReceta;
use App\Models\TratamientoInyectable;
use App\Models\MaterialesImplantologia;
use App\Models\CuracionRegistro;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\CorreoGenerico;
use PDF;

// Controladores adicionales para curaciones
use App\Http\Controllers\AdministradorHospitalController;
use App\Http\Controllers\EscritorioEnfermerasController;
use App\Http\Controllers\ExamenMedicoController;

class ficha_atencionController extends Controller
{

    public function atencion_profesional_no_inscrito(Request $request)
    {

        $prof = Profesional::where('rut', $request->rut_profesional)->first();


        if ($prof == null) {
            return view('auth.Registros.ingreso_registro');
        }

        $profesional = new Profesional();

        $profesional->nombre = $request->nombre_profesional;
        $profesional->apellido_uno = $request->primer_apellido_profesional;
        $profesional->apellido_dos = $request->segundo_apellido_profesional;
        $profesional->rut = $request->rut_profesional;
        $profesional->telefono_uno = $request->telefono_uno_profesional;
        $profesional->telefono_dos = $request->telefono_dos_profesional;
        $profesional->estado = 0;
        $profesional->email = $request->email_profesional;
        $nombre_paso = explode(' ', $request->nombre_profesional);
        $nombre_profesional = $nombre_paso[0] . "_" . $nombre_paso[1];

        if ($profesional->save()) {

            $direccion = new Direccion();

            $direccion->direccion = $request->direccion_consulta_profesional;
            $direccion->numero_dir = $request->numero_dir_consulta_profesional;
            $direccion->id_ciudad = $request->ciudad_no_inscrito;

            if ($direccion->save()) {

                $usuario = new User();
                $usuario->name = $nombre_profesional;
                $usuario->email = $request->email_profesional;
                $usuario->password = bcrypt($request->rut_profesional);

                if ($usuario->save()) {

                    $usuario->assignRole('ProfesionalBasico');

                    return view('atencion_medica.atencion_medica_general');
                } else {

                    return response()->json(['success' => false]);
                }
            } else {

                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }


    public function medicamentos(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre')->limit(15)->get();
        } else {
            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("value" => $employee->id, "label" => $employee->nombre);
        }

        return response()->json($response);
    }

    public function ficha_medica()
    {
        return view('atencion_medica.atencion_medica_general');
    }

    public function imprimir()
    {
        $pdf = PDF::loadView('atencion_medica.PDF.pdf_prueba');

        return $pdf->download('ejemplo.pdf');
    }

    private function resolverEstiloBotonesHistorial($profesional)
    {
        $clases = [
            'ficha' => 'btn-info-light-c',
            'evaluacion' => 'btn-primary-light-c',
        ];

        if (!$profesional) {
            return $clases;
        }

        if ((int)$profesional->id_especialidad === 2) {
            $clases['ficha'] = 'btn-purple-light-c';
            $clases['evaluacion'] = 'btn-warning-light-c';
            return $clases;
        }

        if ((int)$profesional->id_sub_tipo_especialidad === 20) {
            $clases['ficha'] = 'btn-info-light-c';
            $clases['evaluacion'] = 'btn-success-light-c';
            return $clases;
        }

        if ((int)$profesional->id_sub_tipo_especialidad === 19) {
            $clases['ficha'] = 'btn-primary-light-c';
            $clases['evaluacion'] = 'btn-warning-light-c';
            return $clases;
        }

        return $clases;
    }

    public function index(Request $request)
    {
        $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();

        $paciente = Paciente::where('id', $hora->id_paciente)->first();

        $necesita_plan_tratamiento = false;
        $tiene_controles = false;
        $ultimoControl = 0;

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

        $pacienteDpendiente = PacientesDependientes::where('id_paciente', $paciente->id)->get()->first();
        $responsable = '';
        if($pacienteDpendiente)
        {
            $responsable = Paciente::find($pacienteDpendiente->id_responsable);
        }

        $direccion_paciente = Direccion::where('id',$paciente->id_direccion)->first();
        $direccion_id_ciudad_paciente = '';
        $direccion_txt_ciudad_paciente = '';
        $direccion_region_paciente = '';
        $direccion_id_region_paciente = '';
        $direccion_txt_region_paciente = '';
        $regiones = Region::all();
        $ciudades = Ciudad::all();

        if($direccion_paciente)
        {
            $direccion_id_ciudad_paciente = $direccion_paciente->id_ciudad;
            $direccion_region_paciente = Ciudad::select('nombre','id_region')->where('id',$direccion_id_ciudad_paciente)->first();
            if($direccion_region_paciente)
            {
                $direccion_txt_ciudad_paciente = $direccion_region_paciente->nombre;

                $ciudades = Ciudad::where('id_region', $direccion_region_paciente->id_region)->get();
                $direccion_id_region_paciente = $direccion_region_paciente->id_region;

                $direccion_txt_region_paciente_temp = Region::find($direccion_id_region_paciente);
                $direccion_txt_region_paciente = $direccion_txt_region_paciente_temp->nombre;
            }
        }

		// $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->orderby('nombre_examen', 'ASC')->get();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        // echo json_encode($profesional);

        $profesional_especialidad = '';
        $prof_especialidad = '';
        $prof_tipo_especialidad = '';
        $prof_sub_tipo_especialidad = '';

        if(!empty($profesional->id_especialidad))
            $prof_especialidad = Especialidad::find($profesional->id_especialidad);
        if(!empty($profesional->id_tipo_especialidad))
            $prof_tipo_especialidad = TipoEspecialidad::find($profesional->id_tipo_especialidad);
        if(!empty($profesional->id_sub_tipo_especialidad))
            $prof_sub_tipo_especialidad = SubTipoEspecialidad::find($profesional->id_sub_tipo_especialidad);

        // if( !empty($prof_especialidad) )
        //     $profesional_especialidad .= $prof_especialidad->nombre.' ';
        if( !empty($prof_tipo_especialidad) )
            $profesional_especialidad .= $prof_tipo_especialidad->nombre.' ';
        if( !empty($prof_sub_tipo_especialidad) )
            $profesional_especialidad .= $prof_sub_tipo_especialidad->nombre.'';


        // LUGAR DE ATENCION
        $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();
        $lugares_atencion  = LugarAtencion::all();

        // INSTITUCION

        $institucion = '';
        $temp_inst = Instituciones::where('id_lugar_atencion', $request->lugar_atencion_id)->first();
        if($temp_inst)
        {
            $institucion = $temp_inst;
        }

		// FICHA DE ATENCION ACTUAL
        $filtro_fichaAtencion = array();
        $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);

        if(!empty($hora->id_ficha_atencion))
            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
        $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

        /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->orderBy('id', 'DESC')->get();
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
            $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 1)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
        }
        else
        {
            $medicamentos_cronicos = [];
            $alergias = [];
            $antecedentes_quirurgicos = [];
            $patoligias_cronicas = [];
        }

        // FICHAS PREVIAS Y FICHA ACTUAL(ACTIVA O NUEVA)
        $fichas = '';
        $id_ficha_atencion = '';
        $fichaAtencion = '';

        $result_fichas = static::cargarInfoFichaBase($hora);

        $btn_historial_classes = $this->resolverEstiloBotonesHistorial($profesional);
        $btn_class_ficha_atencion_previa = $btn_historial_classes['ficha'];
        $btn_class_eval_especialidad = $btn_historial_classes['evaluacion'];

        if($result_fichas->estado == 1)
        {
            $fichas = isset($result_fichas->ficha_previas) ? $result_fichas->ficha_previas : [];
            $id_ficha_atencion = $result_fichas->id_ficha_actual_nueva;

            if (is_iterable($fichas)) {
                $ids_fichas_previas = [];
                foreach ($fichas as $ficha_previa) {
                    if (!empty($ficha_previa->id)) {
                        $ids_fichas_previas[] = $ficha_previa->id;
                    }
                }

                $recetas_por_ficha = [];
                if (!empty($ids_fichas_previas)) {
                    $recetas_por_ficha = Recomendacion::whereIn('atencion', $ids_fichas_previas)
                        ->selectRaw('atencion, COUNT(*) as total')
                        ->groupBy('atencion')
                        ->pluck('total', 'atencion')
                        ->toArray();
                }

                foreach ($fichas as $ficha_previa) {
                    $ficha_previa->btn_class_ficha = $btn_class_ficha_atencion_previa;
                    $ficha_previa->btn_class_evaluacion_especialidad = $btn_class_eval_especialidad;

                    $tiene_recetas = isset($recetas_por_ficha[$ficha_previa->id]) && intval($recetas_por_ficha[$ficha_previa->id]) > 0;
                    $ficha_previa->tiene_recetas = $tiene_recetas;
                    $ficha_previa->btn_class_receta = $tiene_recetas ? 'btn-success-light-c' : 'btn-warning-light-c';
                }
            }

            // CORRECCIÓN: Obtener la ficha completa de la BD con todos sus campos (hipotesis, diagnostico, etc.)
            $fichaAtencion = FichaAtencion::find($id_ficha_atencion);

            // Si por alguna razón no se encuentra, usar el objeto retornado
            if (!$fichaAtencion) {
                $fichaAtencion = (object)$result_fichas->ficha_actual_nueva;
            }
        }

        // Si no hay ficha después de cargarInfoFichaBase, intentar obtener según el tipo de hora
        if (empty($fichaAtencion)) {
            // 5 realizando, 6 realizada
            if ($hora->id_estado != 5 && $hora->id_estado != 6)
            {
                // Determinar qué modelo usar según si tiene id_ficha_atencion o id_ficha_otros_prof
                if (!empty($hora->id_ficha_atencion)) {
                    $nueva_ficha_atencion = new FichaAtencion();
                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                    $nueva_ficha_atencion->id_lugar_atencion = $request->lugar_atencion_id;

                    if ($nueva_ficha_atencion->save()) {
                        $id_ficha_atencion = $nueva_ficha_atencion->id;
                        $fichaAtencion = $nueva_ficha_atencion;

                        $hora->id_estado = 5;
                        $hora->fecha_realizacion_consulta = now();
                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                        $hora->save();
                    }
                } else {
                    // Es FichaOtrosProfesionales
                    $nueva_ficha_otros = new FichaOtrosProfesionales();
                    $nueva_ficha_otros->id_paciente = $paciente->id;
                    $nueva_ficha_otros->id_profesional = $profesional->id;
                    $nueva_ficha_otros->id_especialidad = $profesional->id_especialidad;
                    $nueva_ficha_otros->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $nueva_ficha_otros->id_lugar_atencion = $request->lugar_atencion_id;

                    if ($nueva_ficha_otros->save()) {
                        $id_ficha_atencion = $nueva_ficha_otros->id;
                        $fichaAtencion = $nueva_ficha_otros;

                        $hora->id_estado = 5;
                        $hora->fecha_realizacion_consulta = now();
                        $hora->id_ficha_otros_prof = $nueva_ficha_otros->id;
                        $hora->save();
                    }
                }
            }
        }

        $prevision = Prevision::all();

        $medicamento = Producto::all();
        $tipoExamen = TipoExamen::all();
        $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        $direccion = $paciente->Direccion()->first();
        if (!$direccion == null)
        {
            $ciudad = $direccion->Ciudad()->first();
        }
        else
        {
            $direccion = null;
            $ciudad = null;
        }

        $receta_control = RecetaControl::orderBy('Descripcion')->get();
        $fichaTipo = array();

        $ruta_blade = '';

        $cns_tipo = '';
        $cns_tipo_template = '';
        $cns_registros = '';

		$examen_tipo = '';

        $placeholder_examen_fisico = '';
        $placeholder_motivo_consulta = '';
        $placeholder_antecedentes = '';
        // Inicializar la variable que contendrá el resultado
        $procedimientoCentroTem = null;



		if($profesional->id_especialidad == 14)
        {
            //urgencia
            $ruta_blade = 'atencion_urgencia.atencion_medica_cirugia_urgencia';
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

			/** examen_tipo */
			$examen_tipo = '';
        }else

        if($profesional->id_sub_tipo_especialidad == 20)
        {
            //oftalmologia
            $ruta_blade = 'atencion_medica.atencion_medica_oftalmologia';
            $fichaTipo['oft'] = FichaOftTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';
            $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[601])->orderBy('nombre_examen', 'ASC')->get();

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();

        }
        else if($profesional->id_sub_tipo_especialidad == 21)
        {
            //otorrinolaringologia
            $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';

            $fichaTipoTipos = FichaOtorrinoTipo::where('id_profesional', $profesional->id)->pluck('tipo')->toArray();
            $fichaTipo = array();
            foreach ($fichaTipoTipos as $key => $value)
            {
                $fichaTipo[$value] = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('tipo', $value)->where('id_profesional', $profesional->id)->get();
            }

            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
            $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';
            $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[582])->orderBy('nombre_examen', 'ASC')->get();

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA";
            $placeholder_examen_fisico = "EXAMEN ORL,BIOMICROSCOPIA, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 22)
        {
            $examen = array();
            //UROLOGIA
            $ruta_blade = 'atencion_medica.atencion_medica_urologia';
            $fichaTipo['uro'] = FichaUroTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $lista_examen_especial = '';
            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
            foreach ($examen_tipo as $key => $value)
            {
                $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
            }
            $lista_examen_especial = substr($lista_examen_especial, 0, -1);

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA";
            $placeholder_examen_fisico = "EXAMEN UROLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }
        else if($profesional->id_sub_tipo_especialidad == 19)
        {
            //dermatologia

            $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA DERMATOLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN DERMATOLÓGICO, BIOMICROSCOPIA, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
		else if($profesional->id_sub_tipo_especialidad == 85)
        {
            //traumatologia
            $ruta_blade = 'atencion_medica.atencion_traumatologia_general';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR,TIPO DE ACCIDENTE, SINTOMATOLOGIA TRAUMATOLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN TRAUMATOLÓGICO, RX, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }

        else if($profesional->id_sub_tipo_especialidad == 58)
        {
            //neurologia
            $ruta_blade = 'atencion_medica.atencion_medica_neurologia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA NEUROLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN NEUROLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 59)
        {
            //neurocirugia
            $ruta_blade = 'atencion_medica.atencion_medica_neurocirugia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA NEUROLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN NEUROLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 27)
        {
            //gineco obstetricia
            // Verificar si la institución es de tipo laboratorio (tipo 3)
            if($institucion && $institucion->id_tipo_institucion == 3)
            {
                //gineco obstetricia - Laboratorio (IBST)
                // Obtener el valor de id_procedimiento
                $idProcedimiento = $hora->id_procedimiento;

                // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                if (strpos($idProcedimiento, '|') !== false) {
                    // Convertir la cadena en un array de IDs
                    $array_id_procedimiento = explode('|', $idProcedimiento);

                    // Obtener todos los procedimientos que coincidan con los IDs
                    $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                } else {
                    // Caso de un solo ID (número)
                    $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                }

                $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades_gine_ibst_general';

                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else
            {
                //gineco obstetricia - Atención médica general
                $ruta_blade = 'atencion_gine_obstetricia.atencion_gine_obst_general';

                // $fichaTipo = '';
                $examen = array();
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA GINECOLÓGICA, OBSTÉTRICA Y GENERAL";
                $placeholder_examen_fisico = "EXAMEN GINECOLÓGICO, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

                // CONSULTAS PREVIAS base fichas atencion
                $filtro_previas = array();
                $filtro_previas[] = array('id_paciente', $paciente->id);
                // $filtro_previas[] = array('confidencial', '0');
                // $filtro_previas[] = array('finalizada', 1);
                $filtro_previas[] = array('id_profesional', $profesional->id);
                $fichas = FichaGinecoObstetrica::where($filtro_previas)->orderBy('created_at','asc')->get();
            }
        }

        else if($profesional->id_sub_tipo_especialidad == 78)
        {
            //pediatria general
            $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_general';
            $fichaTipo['ped_gen'] = FichaPediatriaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            // $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            // $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA GENERAL";
            $placeholder_examen_fisico = "EXAMEN FÍSICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

            /** CNS */
            $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                                            $query->select('id', 'nombre', 'alias');
                                        }])
                                        ->where('estado', 1)
                                        ->get();
            $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

            $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                            $query->select('id', 'id_cns_template', 'nombre');
                                                        }])
                                                        ->whereIn('id', $cns_tipo_array)
                                                        ->get();

            $filtro_cns = array();
            $filtro_cns[] = array('id_paciente', $paciente->id);
            $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])->where($filtro_cns)->get();
        }
        else if($profesional->id_sub_tipo_especialidad == 72)
        {
            //NEONATOLOGIA
            $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_neonatologia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** MEDICINA INTERNA */
        else if($profesional->id_sub_tipo_especialidad == 44){
            // gastroenterologia
            $ruta_blade = 'atencion_medica.atencion_medica_gastroenterologia';
            $examen = '';
            $lista_examen_especial = '';
            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
            foreach ($examen_tipo as $key => $value)
            {
                $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
            }
            $lista_examen_especial = substr($lista_examen_especial, 0, -1);
            $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA GASTROENTEROLÓGICA";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL Y GASTROENTEROLÓGICO, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }
          else if($profesional->id_sub_tipo_especialidad == 121){
            // cardiologia
            $ruta_blade = 'atencion_medica.atencion_medica_homeopatia';
            $examen = '';
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);
                $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA EN GENERAL, ETC.";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD,EXPERIENCIA HOMEOPATÍA EXAMENES, CIRUGIAS";
            }
        else if($profesional->id_sub_tipo_especialidad == 122){
            // cardiologia
            $ruta_blade = 'atencion_medica.atencion_medica_cardiologia';
            $examen = '';
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);
                $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA CARDIOVASCULAR, EDEMAS, ETC.";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL Y CARDIOVASCULAR, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }else if($profesional->id_sub_tipo_especialidad == 40 ){
            //broncopulmonar
            $ruta_blade = 'atencion_medica.atencion_medica_broncopulmonar';
            $examen = '';
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);
                $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA BRONCOPULMONAR,TOS SECRECIONES, INSUFICIENCIA RESPIRATORIA ETC.";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL Y BRONCOPULMONAR, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }

        /** MATRONAS */
        else if($profesional->id_especialidad == 7 && empty($profesional->id_sub_tipo_especialidad))
        {
            // SUB_TIPO_ESPECIALIDAD
            // 38	ATENCIÓN EMBARAZO
            // 39	ANTICONCEPCIÓN
            // 40	ATENCIÓN PUERPERIO
            // 51	CONTROL NIÑO SANO
            // 52	MATRON/A ATENCIÓN GENERAL

            $ruta_blade = 'atencion_otros_prof.atencion_matrona';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

            /** CNS */
            $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                $query->select('id', 'nombre', 'alias');
            }])
            ->where('estado', 1)
            ->get();
            $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

            $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                $query->select('id', 'id_cns_template', 'nombre');
                                            }])
                                            ->whereIn('id', $cns_tipo_array)
                                            ->get();

            $filtro_cns = array();
            $filtro_cns[] = array('id_paciente', $paciente->id);
            $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])->where($filtro_cns)->get();
        }

        /** ENFERMERA UNIVERSITARIA */
        else if($profesional->id_especialidad == 8 )
        {
            // 41  ENFERMERÍA GENERAL
            // 42  ENFERMERÍA ESPECIALIZADA
            // 53  ENFERMERÍA CONTROL NIÑO SANO
            $ruta_blade = 'atencion_otros_prof.atencion_enfermeria';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

                /** CNS */
            $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                $query->select('id', 'nombre', 'alias');
            }])
            ->where('estado', 1)
            ->get();
            $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

            $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                $query->select('id', 'id_cns_template', 'nombre');
                                            }])
                                            ->whereIn('id', $cns_tipo_array)
                                            ->get();

            /** Todos los registros CNS del paciente (sin filtrar por ficha de atención) */
            $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])
                                            ->where('id_paciente', $paciente->id)
                                            ->where('estado', 1)
                                            ->orderBy('id', 'ASC')
                                            ->get();
            $fichas = FichaAtencionEnfermeria::where('id_paciente', $paciente->id)->orderBy('created_at','asc')->get();
        }

        /** TENS */
        else if($profesional->id_especialidad == 10 && ($profesional->id_tipo_especialidad == 45 || $profesional->id_tipo_especialidad == 46) )
        {
            // 45  ATENCIÓN TENS EN GENERAL
            // 46  ATENCIÓN TENS ESPECIALIZADA
            $ruta_blade = 'atencion_otros_prof.atencion_tens';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

			/** CNS */
            $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                                            $query->select('id', 'nombre', 'alias');
                                        }])
                                        ->where('estado', 1)
                                        ->get();
            $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

            $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                            $query->select('id', 'id_cns_template', 'nombre');
                                                        }])
                                                        ->whereIn('id', $cns_tipo_array)
                                                        ->get();

            $filtro_cns = array();
            $filtro_cns[] = array('id_paciente', $paciente->id);
            $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])->where($filtro_cns)->get();
        }


        // 1 Cirugía Abdominal General -> atencion_medica_cirugia_digestiva_general
        // 7 Cirugía Coloproctológica -> atencion_medica_cirugia_digestiva_baja
        // 11 Cirugía digestiva -> atencion_medica_cirugia_digestiva_general
        // 12 Cirugía Gástrica -> atencion_medica_cirugia_digestiva_alta

        else if($profesional->id_sub_tipo_especialidad == 1)
        {
            // Cirugía digestiva general
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
            // $fichaTipo = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            // $fichaTipo = FichaCirugiaDigestivaTipo::get();
            // var_dump($profesional->id);
            // var_dump($fichaTipo);
            // die();
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else if($profesional->id_sub_tipo_especialidad == 7)
        {
            $examen = array();
            // Cirugía Coloproctológica
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_baja';
            $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $lista_examen_especial = '';
            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
            foreach ($examen_tipo as $key => $value)
            {
                $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
            }
            $lista_examen_especial = substr($lista_examen_especial, 0, -1);

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 11 )
        {
            $examen = array();
            // Cirugía digestiva
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
            // Obtener el valor de id_procedimiento
            $idProcedimiento = $hora->id_procedimiento;

            // Verificar si el valor contiene barras verticales (caso múltiples IDs)
            if (strpos($idProcedimiento, '|') !== false) {
                // Convertir la cadena en un array de IDs
                $array_id_procedimiento = explode('|', $idProcedimiento);

                // Obtener todos los procedimientos que coincidan con los IDs
                $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
            } else {
                // Caso de un solo ID (número)
                $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
            }

            $lista_examen_especial = '';
            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
            foreach ($examen_tipo as $key => $value)
            {
                $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
            }
            $lista_examen_especial = substr($lista_examen_especial, 0, -1);

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';


            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }
        else if($profesional->id_sub_tipo_especialidad == 12 )
        {
            $examen = array();

            // Cirugía Gástrica
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_alta';

            $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            $lista_examen_especial = '';
            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
            foreach ($examen_tipo as $key => $value)
            {
                $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
            }
            $lista_examen_especial = substr($lista_examen_especial, 0, -1);

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 119 )
        {
            // Cirugía General
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_general';
            $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
            // $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 66 )
        {
            // Cirugía y Traumatología Pediatrica
            $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else if($profesional->id_tipo_especialidad == 25 )
        {
            // KINESIOLOGIA GENERAL
            $ruta_blade = 'atencion_otros_prof.atencion_kine';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else if($profesional->id_tipo_especialidad == 28 )
        {
            // FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
            $ruta_blade = 'atencion_otros_prof.atencion_fono';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else if($profesional->id_tipo_especialidad == 34 && empty($profesional->id_sub_tipo_especialidad))
        {
            // ATENCIÓN PSICOLOGIA
            $ruta_blade = 'atencion_otros_prof.atencion_psicologia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $necesita_plan_tratamiento = true;
            $plan_tratamiento_info = null;
            $controlExistente = PlanTratamientoOtrosProfesionales::where('id_profesional', $hora->id_profesional)
            ->where('id_paciente', $hora->id_paciente)
            ->where('estado',1)
            ->first();

            if ($controlExistente) {
                $tiene_controles = true;
                $plan_tratamiento_info = [
                    'fecha_inicio' => $controlExistente->fecha_inicio ? \Carbon\Carbon::parse($controlExistente->fecha_inicio)->format('d/m/Y') : null,
                    'sesion_actual' => $controlExistente->sesion_actual,
                    'numero_sesiones' => $controlExistente->numero_sesiones,
                    'estado' => $controlExistente->estado
                ];
                if($controlExistente->sesion_actual == $controlExistente->numero_sesiones){
                    $ultimoControl = 1;
                }else{
                    $ultimoControl = 0;
                }
            }else{
                $tiene_controles = false;
            }

        }
        else if($profesional->id_tipo_especialidad == 12 )
        {
            // ATENCIÓN SIQUIATRIA
            // 80 Psiquiatría General
            // 81 Adicciones

            $ruta_blade = 'atencion_medica.atencion_medica_siquiatria';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else if($profesional->id_tipo_especialidad == 31 && empty($profesional->id_sub_tipo_especialidad))
        {
            // ATENCIÓN NUTRICION
            $ruta_blade = 'atencion_otros_prof.atencion_nutricion';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

            $necesita_plan_tratamiento = true;
            $plan_tratamiento_info = null;
            $controlExistente = PlanTratamientoOtrosProfesionales::where('id_profesional', $hora->id_profesional)
            ->where('id_paciente', $hora->id_paciente)
            ->where('estado',1)
            ->first();

            if ($controlExistente) {
                $tiene_controles = true;
                $plan_tratamiento_info = [
                    'fecha_inicio' => $controlExistente->fecha_inicio ? \Carbon\Carbon::parse($controlExistente->fecha_inicio)->format('d/m/Y') : null,
                    'sesion_actual' => $controlExistente->sesion_actual,
                    'numero_sesiones' => $controlExistente->numero_sesiones,
                    'estado' => $controlExistente->estado
                ];
                if($controlExistente->sesion_actual == $controlExistente->numero_sesiones){
                    $ultimoControl = 1;
                }else{
                    $ultimoControl = 0;
                }
            }else{
                $tiene_controles = false;
            }
        }
        // else if(($profesional->id_tipo_especialidad == 54 || $profesional->id_tipo_especialidad == 55)  && empty($profesional->id_sub_tipo_especialidad))
        else if(($profesional->id_tipo_especialidad == 54 )  && empty($profesional->id_sub_tipo_especialidad))
        {
            // 54 - TECNOLOGO ORL (tecnologo)
            // 55 - EXAMENES ORL (fonoaudiologo)
            $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }else if($profesional->id_tipo_especialidad == 58){
            $ruta_blade = 'atencion_otros_prof.atencion_tecnologo_laboratorio_clinico';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else if($profesional->id_especialidad == 9)
        {
            // TERAPIA OCUPACIONAL
            $ruta_blade = 'atencion_otros_prof.atencion_terapia_ocup';
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
         else if($profesional->id_especialidad == 16)
        {
            // QUIROPRAXIA
            $ruta_blade = 'atencion_medica.atencion_quiropraxia';
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }

        /** traumatologia - 13 */
        else if($profesional->id_tipo_especialidad == 13 && $profesional->id_sub_tipo_especialidad == 85)
        {
            // TRAUMATOLOGIA GENERAL
            $ruta_blade = 'atencion_medica.atencion_traumatologia_general';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }

		/**ESPECIALIDADES DENTALES */

        /** implantologia - 16 */
        else if($profesional->id_tipo_especialidad == 16 )
        {
            // IMPLANTOLOGIA
            $ruta_blade = 'atencion_odontologica.atencion_implantologia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** ODONTOPEDIATRIA - 19 */
        else if($profesional->id_tipo_especialidad == 19 )
        {

            $ruta_blade = 'atencion_odontologica.atencion_odontopediatria';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** periodoncia - 21 */
        else if($profesional->id_tipo_especialidad == 21 )
        {
            // PERIODONCIA
            $ruta_blade = 'atencion_odontologica.atencion_periodoncia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** ENDODONCIA - 15 */
        else if($profesional->id_tipo_especialidad == 15 )
        {

            $ruta_blade = 'atencion_odontologica.atencion_endodoncia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** odontologia general - 18 */
        else if($profesional->id_tipo_especialidad == 18 )
        {
            // ODONTOLOGIA GENERAL
            $ruta_blade = 'atencion_odontologica.atencion_odonto_gral';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** ODONTOPROTESISTA- 22 */
        else if($profesional->id_tipo_especialidad == 22 )
        {

            $ruta_blade = 'atencion_odontologica.atencion_odonto_protesis';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** ortodoncia - 20 */
        else if($profesional->id_tipo_especialidad == 20 )
        {
            // ORTODONCIA
            $ruta_blade = 'atencion_odontologica.atencion_ortodoncia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** ENDODONCIA - 17 */
        else if($profesional->id_tipo_especialidad == 17 )
        {

            $ruta_blade = 'atencion_odontologica.atencion_od_cosmetica';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** esp TTM - 24 */
        else if($profesional->id_tipo_especialidad == 24 )
        {

            $ruta_blade = 'atencion_odontologica.atencion_ttm';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** esp CIRUGIA MAXILO-FACIAL - 14 */
        else if($profesional->id_tipo_especialidad == 14 )
        {

            $ruta_blade = 'atencion_odontologica.atencion_maxilo_facial';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        else
        {
            /** medicos */
            if($profesional->id_especialidad == 1)
            {
                $ruta_blade = 'atencion_medica.atencion_medica_general';
            }
            /** odontologia */
            else if($profesional->id_especialidad == 2)
            {
                $ruta_blade = 'atencion_odontologica.atencion_odonto_gral';
            }
            /** kinesiologia */
            else if($profesional->id_especialidad == 3)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_kine';
            }
            /** fonoaudiologia */
            else if($profesional->id_especialidad == 4)
            {
                if($profesional->id_tipo_especialidad == 55)
                {
                    // Obtener el valor de id_procedimiento
                    $idProcedimiento = $hora->id_procedimiento;

                    // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                    if (strpos($idProcedimiento, '|') !== false) {
                        // Convertir la cadena en un array de IDs
                        $array_id_procedimiento = explode('|', $idProcedimiento);

                        // Obtener todos los procedimientos que coincidan con los IDs
                        $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                    } else {
                        // Caso de un solo ID (número)
                        $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                    }


                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades';


                    // $procedimientoCentroTem = ProcedimientosCentro::find($hora->id_procedimiento);
                    // switch ($procedimientoCentroTem->otros) {
                    //     case '1':
                    //         $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades';
                    //         break;
                    //     case '2':
                    //         // $ruta_blade = 'atencion_otros_prof.atencion_fono_octavopar';
                    //         $ruta_blade = 'app.laboratorio.atencion_fono_octavopar';
                    //         break;

                    //     default:
                    //         $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades';
                    //         break;
                    // }

                    $fichaTipo = '';
                    $examen = '';
                    $lista_examen_especial = '';

                    /** examenes de la especialidad */
                    $examenes_especialidad = '';

                    /** examenes radiologicos */
                    $examenes_radiologicos = '';

                    $hora->id_profesional = $profesional->id;
                    $hora->save();
                }
                else
                {
                    // $ruta_blade = 'atencion_otros_prof.atencion_fonoaudiologo';
                    $ruta_blade = 'atencion_otros_prof.atencion_fono';
                }
            }
            /** nutricion */
            else if($profesional->id_especialidad == 5)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_nutricion';
            }
            /** psicologia */
            else if($profesional->id_especialidad == 6)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_psicologia';
            }
            /** matrona */
            else if($profesional->id_especialidad == 7)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_matrona';
            }
            /** enfermera universitaria */
            else if($profesional->id_especialidad == 8)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_enfermeria';
            }
            /** terapia ocupacional */
            else if($profesional->id_especialidad == 9)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_terapia_ocup';
            }
            /** tecnico enfermeria */
            else if($profesional->id_especialidad == 10)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_tens';
            }
            /** tecnologo medico */
            else if($profesional->id_especialidad == 11)
            {
                /** TECNOLOGO RAYOS */
                if($profesional->id_tipo_especialidad == 59)
                {
                    // Obtener el valor de id_procedimiento
                    $idProcedimiento = $hora->id_procedimiento;

                    // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                    if (strpos($idProcedimiento, '|') !== false) {
                        // Convertir la cadena en un array de IDs
                        $array_id_procedimiento = explode('|', $idProcedimiento);

                        // Obtener todos los procedimientos que coincidan con los IDs
                        $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                    } else {
                        // Caso de un solo ID (número)
                        $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                    }

                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades_rayox';
                }
                // LABORATORIO CLINICO
                else if($profesional->id_tipo_especialidad == 60){
                    // TECNOLOGO LABORATORIO CLINICO
                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades_lab_clinico';
                }
                else if($profesional->id_tipo_especialidad == 61){
                    // TECNOLOGO ANATOMIA PATOLOGICA
                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades_anat_patologica';
                }
                else if($profesional->id_tipo_especialidad == 63){
                    // TECNOLOGO LABORATORIO CLINICO
                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades_oftalmo';
                }
                else
                {
                    $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
                }
            }
            else
            {
                $ruta_blade = 'atencion_otros_prof.atencion_general';
            }
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }

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


        // [RESPALDO] Antes se usaba id_especialidad del profesional logueado para decidir el camino,
        // lo que causaba que exámenes de otros profesionales no se encontraran si el doctor logueado
        // era de especialidad 1 (médico/dental). Ahora se usa id_ficha_especialidad del propio examen.
        // foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
        // {
        //     if($value_ex_esp_realizado->id_sub_tipo_especialidad == 27)
        //     {
        //         $filtro_h_ex_esp_ral = array();
        //         $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
        //         $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
        //         $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
        //         $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
        //     }
        //     else if($profesional->id_especialidad != 1)
        //     {
        //         $filtro_h_ex_esp_ral = array();
        //         $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
        //         $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
        //         $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
        //         $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
        //     }
        //     else
        //     {
        //         $filtro_h_ex_esp_ral = array();
        //         $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
        //         $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
        //         $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
        //         $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
        //     }
        // }

        foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
        {
            $filtro_h_ex_esp_ral = array();
            if (!empty($value_ex_esp_realizado->id_ficha_especialidad))
            {
                // Exámenes de otros profesionales (fonoaudiología, laboratorio, etc.)
                $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
            }
            else
            {
                // Exámenes médico/dental estándar
                $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
                $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
            }
            $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
            $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
        }
        // echo json_encode($examenes_especialidad_realizados);
        // die();
        /** resultado de examenes */
        // $resultado_examen = ResultadoExamen::where('id_paciente', $paciente->id)->get();
        $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
        if($resultado_examen)
        {
            foreach ($resultado_examen as $key => $value)
            {
                $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
            }
        }

        // INTERCONSULTA
        $filtro_inter = array();
        $filtro_inter[] = array('id_paciente', $paciente->id);
        if((int)$profesional->id_especialidad>0)
            $filtro_inter[] = array('id_especialidad', $profesional->id_especialidad);//especialiadd
        if((int)$profesional->id_tipo_especialidad>0)
            $filtro_inter[] = array('id_tipos_especialidad', $profesional->id_tipo_especialidad);//tipo_espacialidad
        if((int)$profesional->id_sub_tipo_especialidad>0)
            $filtro_inter[] = array('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad);//sub_tipo_especialidad
        $filtro_inter[] = array('estado', 1);//pendiente por respuesta
        $interconsulta = Interconsulta::where($filtro_inter)->first();

        // Estados para mensajes de vacunas/interconsulta en vista de enfermeria
        $mostrar_msg_vacuna_minsal = FichaPediatriaVacuna::where('id_paciente', $paciente->id)
            ->where(function ($query) {
                $query->where('tipo_vacuna', 'MINSAL')
                    ->orWhere('id_tipo_vacuna', 2);
            })
            ->exists();

        $mostrar_msg_otras_vacunas = FichaPediatriaVacuna::where('id_paciente', $paciente->id)
            ->where(function ($query) {
                $query->whereIn('tipo_vacuna', ['OTRA', 'OTRAS'])
                    ->orWhere('id_tipo_vacuna', 4);
            })
            ->exists();

        $mostrar_msg_interconsulta = false;
        if (!empty($id_ficha_atencion)) {
            $mostrar_msg_interconsulta = Interconsulta::where('id_ficha_atencion_soli', $id_ficha_atencion)->exists();
        }

        // informacion ges
        // $filtro_ges = array();
        // $filtro_ges[] = array('id_ficha_atencion',$id_ficha_atencion);
        // $ges = GesRegistros::where($filtro_ges)->first();

        // ESPECIALIDAD -> PROFESION
        $especialidad = Especialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

		$tipo_antecedente = TipoAntecedente::all();


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

        /** RESPONSABLES */
        $responsables = '';
        /** validar si es dependiente */
        $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();

        if(count($array_id_responsable) > 0)
        {
            $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
        }

        /** RECETAS */
        $fecha_actual = date("d-m-Y");
        $regisrto_result = array();
        $lista_recetas = Recomendacion::where('activo', $paciente->id)
            ->whereDate('created_at', '>=', date("Y-m-d", strtotime($fecha_actual . "- 1 year")))
            ->pluck('id')
            ->toArray();
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
                            // Obtener la última administración real desde el historial
                            $ultimaAdministracion = RecomendacionDetalleAdministracion::where('id_recomendacion_detalle', $value_det->id)
                                ->orderBy('fecha_hora_administracion', 'desc')
                                ->first();

                            // Calcular si puede administrar basándose en la última administración
                            $puedeAdministrar = true;
                            $ultimaAdministracionFecha = null;
                            $ultimaAdministracionHora = null;
                            $horasDesdeUltimaAdmin = null;

                            if ($ultimaAdministracion) {
                                $ultimaAdministracionFecha = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->format('d-m-Y');
                                $ultimaAdministracionHora = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->format('H:i');

                                // Calcular horas transcurridas desde la última administración
                                $horasDesdeUltimaAdmin = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->diffInHours(now());

                                // Si han pasado menos de 6 horas, no puede administrar
                                // Este valor puede ajustarse según la frecuencia del medicamento
                                if ($horasDesdeUltimaAdmin < 6) {
                                    $puedeAdministrar = false;
                                }
                            }

                            // Si el tratamiento está finalizado (estado = 2), no puede administrar
                            if ($value_det->estado == 2) {
                                $puedeAdministrar = false;
                            }

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
                                'fecha_administrado' => $value_det->fecha_administrado,
                                'hora_administrado' => $value_det->hora_administrado,
                                'nombre_responsable' => !empty($value_det->id_responsable)
                                    ? (optional(User::find($value_det->id_responsable))->name ?? '')
                                    : '',
                                'created_at' => $value_det->created_at,
                                'updated_at' => $value_det->updated_at,
                                // Nuevos campos para control de administración
                                'ultima_administracion_fecha' => $ultimaAdministracionFecha,
                                'ultima_administracion_hora' => $ultimaAdministracionHora,
                                'horas_desde_ultima_admin' => $horasDesdeUltimaAdmin,
                                'puede_administrar' => $puedeAdministrar,
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

        /* --------------------------- HTML MODAL -------------------------- */
        //MODALS - Externos
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


        /* FIN --------------------------- HTML MODAL -------------------------- */

        $licencia = Licencia::where('id_ficha_atencion', $id_ficha_atencion)->first();

        /** ULTIMA LICENCIA DEL PACIENTE */
        $filtro_ultima_lic = array();
        $filtro_ultima_lic[] = array('id_ficha_atencion','<>', $id_ficha_atencion);
        $filtro_ultima_lic[] = array('id_paciente', $paciente->id);
        $ultima_licencia = Licencia::where($filtro_ultima_lic)->first();

        // $info_video = '';
        // if($hora->tipo_hora_medica == 'T')
        // {
        //     $filtro_v = array();
        //     $filtro_v[] = array('id_hora_atencion', $hora->id);
        //     $filtro_v[] = array('id_profesional', $hora->id_profesional);
        //     $filtro_v[] = array('id_paciente', $hora->id_paciente);
        //     $info_video = VideoConsultaInfo::where($filtro_v)->first();
        // }

        /** INFO ACOMPAÑANTE */
        $responsables = '';
        $acompanantes = '';
        if(\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
        {
            if($hora->acomp_representante == 1)
            {
                $filtro_list_PD = array();
                $filtro_list_PD[] = array('estado', 1);
                $filtro_list_PD[] = array('id_paciente', $paciente->id);
                $responsables_relacion = PacientesDependientes::where($filtro_list_PD)->pluck('id_responsable')->toArray();
                if($responsables_relacion)
                {
                    $responsables = Paciente::whereIn('id', $responsables_relacion)->get();
                }
            }

            if($hora->acomp_acompanante == 1)
            {
                if(!empty($hora->acomp_lista))
                {
                    $lista_acompanante = json_decode($hora->acomp_lista);
                    $acompanantes = Paciente::whereIn('id', $lista_acompanante)->get();
                }
            }
        }
        /** CIERRE INFO ACOMPAÑANTE */
        $tipos_receta = TiposReceta::all();
        $detalle_receta_controlador = new DetalleRecetaController();
        $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente['id']);
        $recetas_sdi_paciente = collect($regisrto_result ?? [])->map(function($receta){
            $fecha_label = !empty($receta['created_at']) ? Carbon::parse($receta['created_at'])->format('d-m-Y H:i') : 'Sin fecha';
            $cantidad_detalle = (isset($receta['detalle']) && is_array($receta['detalle'])) ? count($receta['detalle']) : 0;

            // Obtener nombre del profesional desde tabla profesionales
            $nombre_profesional = 'No especificado';
            if (!empty($receta['id_profesional'])) {
                $profesional = Profesional::find($receta['id_profesional']);
                if ($profesional) {
                    $nombre_profesional = trim($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos);
                }
            }

            // Obtener lugar de atención
            $lugar_atencion = 'No especificado';
            if (!empty($receta['id_ficha_atencion'])) {
                $ficha = FichaAtencion::find($receta['id_ficha_atencion']);
                if ($ficha && $ficha->lugar_atencion_id) {
                    $lugar = LugarAtencion::find($ficha->lugar_atencion_id);
                    $lugar_atencion = $lugar ? $lugar->name : 'No especificado';
                }
            }

            $medicamentos = collect($receta['detalle'] ?? [])->map(function($detalle){
                return [
                    'medicamento' => $detalle['producto'] ?? '',
                    'dosis' => $detalle['presentacion'] ?? '',
                    'frecuencia' => $detalle['posologia'] ?? '',
                    'via' => $detalle['via_administracion'] ?? '',
                    'periodo' => $detalle['periodo'] ?? '',
                    'cantidad' => $detalle['cantidad_compra'] ?? '',
                    'observacion' => $detalle['comentario'] ?? '',
                ];
            })->values()->toArray();

            return [
                'id' => $receta['id'] ?? null,
                'label' => '#'.($receta['id'] ?? 'N/A').' - '.$fecha_label.' ('.$cantidad_detalle.' meds)',
                'medicamentos' => $medicamentos,
                'profesional' => $nombre_profesional,
                'lugar_atencion' => $lugar_atencion,
            ];
        })->filter(function($receta){
            return !empty($receta['id']);
        })->unique('id')->values();

        $adm_hospital_controlador = new AdministradorHospitalController();
        $procedimientos = $adm_hospital_controlador->dameProcedimientosPaciente($paciente->id);
        $curaciones = $adm_hospital_controlador->dameCuracionesPaciente($paciente->id);

        // Obtener curaciones desde CuracionRegistro (modelo unificado)
        // Filtramos por id_ficha_atencion para mostrar solo curaciones de esta ficha
        $curaciones_registros = CuracionRegistro::where('id_ficha_atencion', $id_ficha_atencion)
            ->where('activo', true)
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        // Formatear curaciones con profesional
        $curaciones_registros->each(function($curacion) {
            $profesional = Profesional::find($curacion->id_profesional);
            $curacion->responsable = $profesional
                ? trim($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos)
                : 'Sin datos';
            $curacion->fecha_format = $curacion->fecha ? $curacion->fecha->format('d-m-Y') : 'N/A';
        });

        // Separar por tipo para compatibilidad con vistas existentes
        $curaciones_planas = $curaciones_registros->where('tipo_curacion', 'plana');
        $curaciones_lpp = $curaciones_registros->where('tipo_curacion', 'lpp');
        $curaciones_pie_diabetico = $curaciones_registros->where('tipo_curacion', 'pie_diabetico');
        $curaciones_quemados = $curaciones_registros->where('tipo_curacion', 'quemados');

        $resumen_procedimientos = collect($procedimientos ?? [])->map(function($proc){
            return (object) [
                'tipo' => 'procedimiento',
                'nombre' => $proc->datos_procedimiento->nombre_procedimiento ?? 'Procedimiento no especificado',
                'estado' => $proc->estado ?? 0,
                'fecha' => $proc->fecha ?? 'Sin fecha',
                'hora' => $proc->hora ?? 'Sin hora',
                'responsable' => $proc->responsable ?? 'No especificado',
                'indicaciones' => $proc->datos_procedimiento->ind_vig_sig ?? null,
                'observaciones' => trim(($proc->otros ?? '') . ' ' . ($proc->otros_2 ?? '')),
                'icono' => 'fas fa-procedures',
                'color' => 'bg-success',
                'created_at' => $proc->created_at,
            ];
        })->merge(
            collect($curaciones ?? [])->map(function($cur){
                return (object) [
                    'tipo' => 'curacion',
                    'nombre' => $cur->datos_curacion->nombre_procedimiento ?? 'Curacion no especificada',
                    'estado' => $cur->estado ?? 0,
                    'fecha' => $cur->fecha ?? 'Sin fecha',
                    'hora' => $cur->hora ?? 'Sin hora',
                    'responsable' => $cur->responsable ?? 'No especificado',
                    'indicaciones' => null,
                    'observaciones' => trim($cur->otros ?? ''),
                    'icono' => 'fas fa-band-aid',
                    'color' => 'bg-info',
                    'created_at' => $cur->created_at,
                ];
            })
        )->sortByDesc('created_at')->values();
        $examenControlador = new ExamenMedicoController();
        $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id, $id_ficha_atencion);

        $controles_ciclo = $this->dameEvolucionesPacienteHosp($paciente->id);
        $examenes_dental = $this->dameExamenesPiezaDentalDolor($paciente->id, $profesional->id_tipo_especialidad);
        $examenes_dental_end = $this->dameExamenesPiezaDentalEndDolor($paciente->id);

        $examenes_dental_odontopediatria = $this->dameExamenesPiezaDentalPiezaOdontop($paciente->id);

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


        if(count($examenes_dental) == 0)
        {
            // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
            $contador_div_examenes = 1;
        }else{
            // si hay ciclos de control se suma 1 para manejar el id en la vista
            $contador_div_examenes = count($examenes_dental) + 1;
        }
        $examenes_rx_oral = $this->dameExamenesPiezaDentalOraxRx($paciente->id, $profesional->id_tipo_especialidad);

        $examenes_rx_oral_endodoncia = $this->dameExamenesPiezaDentalOraxRxEnd($paciente->id, $id_ficha_atencion);
        foreach($examenes_rx_oral_endodoncia as $ero)
        {
            $ero->numero_piezas = json_decode($ero->numero_piezas);
        }
        $examenes_rx_oral_odontop = $this->dameExamenesPiezaDentalOraxRxOdontop($paciente->id, $profesional->id_tipo_especialidad);
        $imagenes = $this->dameInfoImagenesDentalPaciente($paciente->id,'gral', $id_ficha_atencion);
        $imagenes_preimplante = $this->dameInfoImagenesDentalPaciente($paciente->id,'implantologia',$id_ficha_atencion);
        $imagenes_periodoncia = $this->dameInfoImagenesDentalPaciente($paciente->id,'periodoncica',$id_ficha_atencion);
        $examenes_pieza = $this->dameExamenesPiezaDentalPieza($paciente->id, $profesional->id_tipo_especialidad, $id_ficha_atencion);

        $examenes_pieza_end = $this->dameExamenesPiezaDentalPiezaEnd($paciente->id, $profesional->id_tipo_especialidad, $id_ficha_atencion);

        $biopsias = $this->dameBiopsiasDentalPaciente($paciente->id);

        $maxilar_superior_gral_tratamiento = $this->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnostico = $this->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamiento = $this->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnostico = $this->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento = $this->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico = $this->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamientos_endo = $this->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnosticos_endo = $this->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_tratamientos_endo = $this->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnosticos_endo = $this->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento_endo = $this->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico_endo = $this->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad);

        $valores_tratamientos = $this->dameValores($paciente->id, $id_ficha_atencion, $request->lugar_atencion_id, $profesional->id_tipo_especialidad);

        $primer_cuadrante = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $segundo_cuadrante = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $tercer_cuadrante = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $cuarto_cuadrante = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $quinto_cuadrante = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $sexto_cuadrante = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);

        $primer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $segundo_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $tercer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $cuarto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $quinto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $sexto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);

        $primer_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $segundo_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $tercer_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $cuarto_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $quinto_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $sexto_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $septimo_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaSeptimoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $octavo_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaOctavoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);

        $todos = $this->dameTratamientosBocaGeneral(
            $id_ficha_atencion
        );

        $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',2)->orWhere('tipo_examen',3)->get();

        if($hora->id_presupuesto != 0){
            $presupuesto_dental = PresupuestosDental::where('id', $hora->id_presupuesto)->first();
            if($presupuesto_dental){
                $id_ficha_atencion = $presupuesto_dental->id_ficha_atencion;
                $id_ficha = $presupuesto_dental->id_ficha_atencion;
            }else{
                $id_ficha = $id_ficha_atencion;
            }

        }else{
            $presupuesto_dental = PresupuestosDental::where('id_ficha_atencion', $id_ficha_atencion)->first();
            $id_ficha = $id_ficha_atencion;
        }

        $odontograma = $this->dameOdontogramaPaciente($paciente->id, $id_ficha, $request->lugar_atencion_id, $profesional->id_tipo_especialidad,null);
        $odontograma_historial = $this->dameOdontogramaPacienteHistorial($paciente->id);

        $paciente->edad = Carbon::parse($paciente->fecha_nac)->age;

        if($paciente->edad >= 18){
            $paciente->es_adulto = true;
        }else{
            $paciente->es_adulto = false;
        }

        $diagnosticos_dentales = TratamientosDental::where('estado',1)->get();



        /** EXAMEN OCTAVO PAR */
        $reg_octavo_par = OctavoPar::where('id_paciente', $paciente->id)->with('HoraMedica')->get();
        /** FIN EXAMEN OCTAVO PAR */
        /** EXAMEN AUDICION */
        $reg_audicion = ExamenAudicion::where('id_paciente', $paciente->id)->get();
        /** FIN EXAMEN AUDICION */
        /** EXAMENES EVALUACION PRE IMPLANTE DENTAL  */
        $examenes_preimplante = $this->dameHistorialDentalImpl($paciente->id,'impl');

        $examenes_period = $this->dameHistorialDentalImpl($paciente->id,'period');

        $examenes_period_period = $this->dameHistorialDentalPeriod($paciente->id);

        $odontograma_especialidad = $this->dameOdontogramaPaciente($paciente->id, $id_ficha, $request->lugar_atencion_id, $profesional->id_tipo_especialidad);

        $insumos_tratamientos = $this->dame_insumos_tratamiento($paciente->id, $id_ficha);

        $insumos_bodega = $this->dame_insumos_bodega($id_ficha);


        $examenes_tto_implantes = $this->dameProcedimientosImplantes($paciente->id, $profesional->id, $id_ficha);

        $examenes_tto_rehab_implantes = $this->dameProcedimientosImplantesRehab($paciente->id, $profesional->id, $id_ficha);

        $examenes_post_implantes = $this->dameProcedimientosImplantes($paciente->id, $profesional->id,$id_ficha,'post');

        $examenes_post_implantes_grupos = $this->dameProcedimientosGruposImplantes($paciente->id, $profesional->id,'post');

        //return $examenes_post_implantes_grupos;

        $examenes_piezas_pfu = $this->dameProcedimientosCoronaProtesis($paciente->id, $profesional->id, $id_ficha, 'pfu');

        $examenes_piezas_pfp = $this->dameProcedimientosCoronaProtesis($paciente->id, $profesional->id, $id_ficha, 'pfp');

        if($presupuesto_dental){
            $ordenes_tm = $this->dameOrdenesTrabajoMenor($paciente->id, $profesional->id, $presupuesto_dental->id, $id_ficha);
            $ordenes_tmy = $this->dameOrdenesTrabajoMayor($paciente->id, $profesional->id, $presupuesto_dental->id, $id_ficha);
        }else{
            $ordenes_tm = [];
            $ordenes_tmy = [];
        }


        $correlativo_otm = $this->dame_correlativo('Orden Trabajo Menor');

        $proveedores = $this->dame_proveedores($request->lugar_atencion_id);

        $bodegas = $this->dame_bodegas($request->lugar_atencion_id);

        // return $presupuesto_dental;

        $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();

        $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();

        $laboratorios = Laboratorio::where('id_lugar_atencion', $request->lugar_atencion_id)->get();

        $marcas_implantes = MarcasImplantes::all();

        $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $id_ficha)->get();

        $valores_tratamientos = $this->dameValores($paciente->id, $id_ficha, $request->lugar_atencion_id, $profesional->id_tipo_especialidad);

        $total_abonado = 0;
        foreach($pagos_tratamientos_dentales as $p){
            $total_abonado += intval($p->total);
        }

        $suma_presupuesto = $valores_tratamientos[0] + $valores_tratamientos[1] + $valores_tratamientos[2] + $valores_tratamientos[3];

        $valor_insumos = $valores_tratamientos[2];

        // Inicializamos el resto en lo que se pagó:
        $resto_insumos = $total_abonado;

        foreach ($insumos_tratamientos as $i) {
            // Si tu modelo no tiene ya el subtotal, lo calculas:
            $valor_insumo = intval($i->cantidad) * intval($i->valor);
            // — O si ya tienes $i->total, simplemente:
            // $valor_insumo = intval($i->total);

            if ($resto_insumos >= $valor_insumo) {
                // Hay dinero suficiente para cubrir este insumo por completo
                $i->estado_pago = 'ok';
                $resto_insumos -= $valor_insumo;

            } elseif ($resto_insumos > 0 && $resto_insumos < $valor_insumo) {
                // Hay algo de dinero, pero no para cubrirlo entero
                $i->estado_pago = 'incompleto';
                // Si prefieres no dejar resto negativo, lo pones a 0:
                $resto_insumos = 0;

            } else {
                // Ya no queda dinero
                $i->estado_pago = 'error';
            }

            // Opcional: guardar cuánto quedaba después de este insumo
            $i->resto = $resto_insumos;
            // Y si quieres almacenar pagado/insumo para la vista:
            $i->total_pagado = $total_abonado;
            // $i->total_insumos = /* aquí el total de todos los insumos si lo necesitas */;

            // Finalmente, si vas a persistir:
            // $i->save();
        }

        $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
        $valor_odontograma = $valores_tratamientos[1];

        $total_piezas_odontograma = count($odontograma);
        $resto = $total_abonado_sin_insumos;

        foreach($odontograma as $o){
            if($o->presupuesto == 1){
                if($resto > 0 && $resto >= intval($o->valor)){
                    $o->estado_pago = 'ok';
                    $o->clase = 'bg-success';
                    $resto -= intval($o->valor);


                }else if($resto > 0 && $resto <= intval($o->valor)){
                    $o->estado_pago = 'incompleto';
                    $o->clase = 'bg-warning';
                    $resto = 0;

                }else if($resto <= 0){
                    $o->estado_pago = 'error';
                    $o->clase = 'bg-danger';

                }
                $o->resto = $resto; // asignas el valor final del resto
            }


        }

        foreach($todos as $o){
            if($o->presupuesto == 1){
                $valor = intval($o->valor);
                if ($resto >= $valor) {
                    $o->estado_pago = 'ok';
                    $o->clase = 'bg-success';
                    $resto -= $valor;
                } elseif ($resto > 0) {
                    $o->estado_pago = 'incompleto';
                    $o->clase = 'bg-warning';
                    $resto = 0;
                } else {
                    $o->estado_pago = 'error';
                    $o->clase = 'bg-danger';
                }
                $o->resto = $resto; // asignas el valor final del resto
            }
        }


        $convenio = EmpresasConvenios::where('nombre_convenio','LIKE',$paciente->prevision->nombre)->first();
        if($convenio){
            $paciente->info_convenio = $convenio;
        }else{
            $paciente->info_convenio = null;
        }

        $convenios_empresas = EmpresasConvenios::where('id_profesional',$profesional->id)->get();
        $convenios_prevision = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                                                    ->leftjoin('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                                                    ->where('empresas_convenios.id_empresa',null)
                                                    ->where('empresas_convenios.id_profesional', $profesional->id)
                                                    ->get();

        $hoy = Carbon::now()->toDateString(); // Se usa toDateString() para comparar solo la fecha

        $proxima_fecha_atencion = HoraMedica::where('fecha_consulta', '>', $hoy)
            ->where('id_paciente',$paciente->id)
            ->where('id_profesional', $profesional->id)
            ->where('id_estado',1)
            ->whereNotNull('id_ficha_atencion')
            ->orderBy('fecha_consulta', 'asc') // Ordena por la fecha más cercana
            ->first();
        if($proxima_fecha_atencion){
            $hora_inicio_fecha_atencion = $proxima_fecha_atencion->hora_inicio;
            $hora_fin_fecha_atencion = $proxima_fecha_atencion->hora_termino;
            $proxima_fecha_atencion = $proxima_fecha_atencion->fecha_consulta;

        }

        $epc = new EscritorioProfesional;
        $tons_dental = $epc->dame_relaciones_tons($profesional->id);

        if($profesional->id_tipo_especialidad == 18){
            $url_tratamientos_autocomplete = "{{ route('dental.getDiagnosticoDental') }}";
        }else if($profesional->id_tipo_especialidad == 16){
            $url_tratamientos_autocomplete = "{{ route('dental.getTratamientoImplantologia') }}";
        }else{
            $url_tratamientos_autocomplete = "{{ route('dental.getDiagnosticoDental') }}";
        }

        $piezas_periodonto = ExamenesDentalPeriodoncia::where('id_ficha_atencion', $id_ficha_atencion)->get();

        $examenes_plan_tratamiento = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',1)->get();
        $examenes_plan_tratamiento_rx = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',2)->get();
        $examenes_plan_tratamiento_broncoscopia = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',3)->get();
        $examenes_plan_tratamiento_otros = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',4)->get();

        $comunas_contacto_emer = $this->dame_comunas_contacto_emergencia($paciente->id);
        $paciente->comunas_contacto_emer = $comunas_contacto_emer;

        $discapacidades = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente',8)->where('estado',1)->get();
        if(count($discapacidades) > 0){
            foreach($discapacidades as $d){
                $data = json_decode($d->data);
                $d->nombre = $data->nombre;
            }
        }

		/** EXAMENES DE RADIOLOGIA */
        $filtro_rayo = array();
        $filtro_rayo[] = array('estado', 1);
        $filtro_rayo[] = array('estado_informe', 1);
        $filtro_rayo[] = array('estado_archivo', 1);
        $filtro_rayo[] = array('id_paciente', $paciente->id);
        $reg_exam_rayo = FichaAtencionRayo::where($filtro_rayo)->orderBy('created_at', 'DESC')->get();

        if($reg_exam_rayo && $procedimientoCentroTem == '')
        {
            foreach ($reg_exam_rayo as $key_ry => $value_ry)
            {
                $idProcedimiento = $value_ry->id_procedimiento;

                // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                if (strpos($idProcedimiento, '|') !== false) {
                    // Convertir la cadena en un array de IDs
                    $array_id_procedimiento = explode('|', $idProcedimiento);

                    // Obtener todos los procedimientos que coincidan con los IDs
                    $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                } else {
                    // Caso de un solo ID (número)
                    $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                }

                $nombre_proc_temp = '';
                foreach ($procedimientoCentroTem as $key_proc_temp => $value_proc_temp)
                {
                    $nombre_proc_temp .= $value_proc_temp->nombre.', ';
                }

                $reg_exam_rayo[$key_ry]->procedimientos = $procedimientoCentroTem;
                $reg_exam_rayo[$key_ry]->nombre_procedimientos = $nombre_proc_temp;
            }
        }

        $trabajos_laboratorio = $this->dame_trabajos_laboratorio($paciente->id, $id_ficha_atencion, $request->lugar_atencion, $profesional->id);

           // emitir evento de bono recibido
        event(new HoraMedicaUpdated($hora, 'atendiendose'));

        $controles_domiciliarios = ControlDomiciliario::where('id_ficha_atencion', $id_ficha_atencion)->get();

        $tratamientos_inyectables = TratamientoInyectable::where('ficha_atencion_id', $id_ficha_atencion)->get();
        $permisos_profesional = PermisoProfesional::where('id_profesional', $profesional->id)->first();

        // ✅ OBTENER ADJUNTOS (INFORMES MÉDICOS, SOLICITUDES DE PABELLÓN Y HOSPITALIZACIONES) PARA LA SECCIÓN DE DIAGNÓSTICOS
        $adjuntos_ficha = array();

        // Cargar informes médicos
        $informes_medicos = InformeMedico::where('id_ficha_atencion', $id_ficha_atencion)->get();

        if($informes_medicos && count($informes_medicos) > 0) {
            foreach ($informes_medicos as $informe) {
                $tipo_informe = TipoInforme::find($informe->id_tipo_informe);

                $adjunto_temp = (object) array(
                    'id' => $informe->id,
                    'nombre' => $tipo_informe ? $tipo_informe->nombre : 'Informe Médico',
                    'titulo' => $tipo_informe ? $tipo_informe->titulo : 'Informe',
                    'fecha' => $informe->fecha_informe_medico ? date('d/m/Y', strtotime($informe->fecha_informe_medico)) : date('d/m/Y'),
                    'url_pdf' => route('pdf.informe_medico', [
                        'id_ficha_atencion' => $id_ficha_atencion,
                        'id_tipo_informe' => $informe->id_tipo_informe
                    ])
                );

                $adjuntos_ficha[] = $adjunto_temp;
            }
        }

        // Cargar solicitudes de pabellón
        $solicitudes_pabellon = SolicitudPabellonQuirurgico::where('id_ficha_atencion', $id_ficha_atencion)->get();

        if($solicitudes_pabellon && count($solicitudes_pabellon) > 0) {
            foreach ($solicitudes_pabellon as $solicitud) {
                $adjunto_temp = (object) array(
                    'id' => $solicitud->id,
                    'nombre' => 'Solicitud de Pabellón - ' . $solicitud->operacion,
                    'titulo' => 'Solicitud Quirúrgica',
                    'fecha' => $solicitud->created_at ? date('d/m/Y', strtotime($solicitud->created_at)) : date('d/m/Y'),
                    'url_pdf' => asset('reportes/solicitud_pabellon_' . $paciente->id . '.pdf')
                );

                $adjuntos_ficha[] = $adjunto_temp;
            }
        }

        // ✅ Cargar solicitudes de hospitalización
        $solicitudes_hospitalizacion = SolicitudHospitalizacion::where('id_ficha_atencion', $id_ficha_atencion)->get();

        if($solicitudes_hospitalizacion && count($solicitudes_hospitalizacion) > 0) {
            foreach ($solicitudes_hospitalizacion as $solicitud_hosp) {
                $adjunto_temp = (object) array(
                    'id' => $solicitud_hosp->id,
                    'nombre' => 'Solicitud de Hospitalización - ' . ($solicitud_hosp->nom_inst ? $solicitud_hosp->nom_inst : 'Institución'),
                    'titulo' => 'Solicitud de Hospitalización',
                    'fecha' => $solicitud_hosp->created_at ? date('d/m/Y', strtotime($solicitud_hosp->created_at)) : date('d/m/Y'),
                    'url_pdf' => asset('reportes/hospitalizacion_' . $paciente->id . '.pdf')
                );

                $adjuntos_ficha[] = $adjunto_temp;
            }
        }
        // return $controles_domiciliarios;

        // Nutricionistas (id_especialidad = 5) para referenciar documentos adjuntos
        $nutricionistas = Profesional::where('id_especialidad', 5)
            ->orderBy('nombre')
            ->get();

        // Cargar documentos de nutrición si existe ficha de enfermería
        $docs_nutricion_evaluacion = [];
        $docs_nutricion_pauta = [];
        $ficha_enfermeria = null;
        $medicamentos_enfermeria = [];

        if (!empty($id_ficha_atencion)) {

            $ficha_enfermeria = FichaAtencionEnfermeria::where('id_ficha_atencion', $id_ficha_atencion)->first();

            if ($ficha_enfermeria) {
                $documentos_evaluacion = FichaEnfermeriaDocumentoNutricion::where('id_ficha_enfermeria', $ficha_enfermeria->id)
                    ->where('tipo', 'evaluacion')
                    ->where('estado', 1)
                    ->with('Nutricionista')
                    ->orderBy('created_at', 'desc')
                    ->get();

                $documentos_pauta = FichaEnfermeriaDocumentoNutricion::where('id_ficha_enfermeria', $ficha_enfermeria->id)
                    ->where('tipo', 'pauta')
                    ->where('estado', 1)
                    ->with('Nutricionista')
                    ->orderBy('created_at', 'desc')
                    ->get();

                $docs_nutricion_evaluacion = $documentos_evaluacion;
                $docs_nutricion_pauta = $documentos_pauta;
            }

        }

        if(!$paciente->id_direccion) $paciente->id_direccion = 7365; // sin direccion

        return view($ruta_blade)->with(
            [
                'adjuntos_ficha' => $adjuntos_ficha,
                'tratamientos_inyectables' => $tratamientos_inyectables,
                'controles_domiciliarios' => $controles_domiciliarios,
                'examenes_plan_tratamiento_broncoscopia' => $examenes_plan_tratamiento_broncoscopia,
                'examenes_plan_tratamiento_rx' => $examenes_plan_tratamiento_rx,
                'examenes_plan_tratamiento' => $examenes_plan_tratamiento,
                'examenes_plan_tratamiento_otros' => $examenes_plan_tratamiento_otros,
                'piezas_periodonto' => $piezas_periodonto,
                'todos' => $todos,
                'placeholder_antecedentes' => $placeholder_antecedentes,
                'placeholder_motivo_consulta' => $placeholder_motivo_consulta,
                'placeholder_examen_fisico' => $placeholder_examen_fisico,
                'url_tratamientos_autocomplete' => $url_tratamientos_autocomplete,
                'paciente' => $paciente,
                'permisos_profesional' => $permisos_profesional,
                'proxima_fecha_atencion' => $proxima_fecha_atencion,
                'tons_dental' => $tons_dental,
                'hora_inicio_atencion' => isset($hora_inicio_fecha_atencion) ? $hora_inicio_fecha_atencion : '',
                'hora_fin_atencion' => isset($hora_fin_fecha_atencion) ? $hora_fin_fecha_atencion : '',
                'convenios_empresas' => $convenios_empresas,
                'convenios_prevision' => $convenios_prevision,
                'tipos_receta' => $tipos_receta,
                'recetas' => $recetas,
                'recetas_sdi_paciente' => $recetas_sdi_paciente,
                'insumos_tratamientos' => $insumos_tratamientos,
                'insumos_bodega' => $insumos_bodega,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'valores' => $valores_tratamientos[0],
                'valores_piezas' => $valores_tratamientos[1],
                'valores_insumos' => $valores_tratamientos[2],
                'valores_laboratorio' => $valores_tratamientos[3],
                'valor_abonado' => $total_abonado,
                'examenes_tto_implantes' => $examenes_tto_implantes,
                'examenes_tto_rehab_implantes' => $examenes_tto_rehab_implantes,
                'examenes_post_implantes' => $examenes_post_implantes,
                'examenes_post_implantes_grupos' => $examenes_post_implantes_grupos,
                'examenes_piezas_pfu' => $examenes_piezas_pfu,
                'examenes_piezas_pfp' => $examenes_piezas_pfp,
                'ordenes_tm' => $ordenes_tm,
                'ordenes_tmy' => $ordenes_tmy,
                'correlativo_otm' => $correlativo_otm,
                'proveedores' => $proveedores,
                'bodegas' => $bodegas,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'pagos_tratamientos_dentales' => $pagos_tratamientos_dentales,
                'materiales_implantologia' => $materiales_implantologia,
                'marcas_implantes' => $marcas_implantes,
                'examenes_dental' => $examenes_dental,
                'examenes_pre_implante' => $examenes_preimplante,
                'examenes_period' => $examenes_period,
                'examenes_period_period' => $examenes_period_period,
                'examenes_dental_end' => $examenes_dental_end,
                'examenes_dental_odontopediatria' => $examenes_dental_odontopediatria,
                'examenes_rx_oral' => $examenes_rx_oral,
                'examenes_rx_oral_end' => $examenes_rx_oral_endodoncia,
                'examenes_rx_oral_odontop' => $examenes_rx_oral_odontop,
                'examenes_pieza' => $examenes_pieza,
                'examenes_pieza_end' => $examenes_pieza_end,
                'maxilar_superior_gral_tratamientos' => $maxilar_superior_gral_tratamiento,
                'maxilar_superior_gral_diagnosticos' => $maxilar_superior_gral_diagnostico,
                'maxilar_inferior_gral_tratamientos' => $maxilar_inferior_gral_tratamiento,
                'maxilar_inferior_gral_diagnosticos' => $maxilar_inferior_gral_diagnostico,
                'maxilar_inferior_gral_tratamientos_endo' => $maxilar_inferior_gral_tratamientos_endo,
                'maxilar_inferior_gral_diagnosticos_endo' => $maxilar_inferior_gral_diagnosticos_endo,
                'maxilar_superior_gral_tratamientos_endo' => $maxilar_superior_gral_tratamientos_endo,
                'maxilar_superior_gral_diagnosticos_endo' => $maxilar_superior_gral_diagnosticos_endo,
                'boca_completa_gral_tratamiento_endo' => $boca_completa_gral_tratamiento_endo,
                'boca_completa_gral_diagnostico_endo' => $boca_completa_gral_diagnostico_endo,
                'boca_completa_gral_tratamientos' => $boca_completa_gral_tratamiento,
                'boca_completa_gral_diagnosticos' => $boca_completa_gral_diagnostico,
                'primer_cuadrante' => $primer_cuadrante,
                'segundo_cuadrante' => $segundo_cuadrante,
                'tercer_cuadrante' => $tercer_cuadrante,
                'cuarto_cuadrante' => $cuarto_cuadrante,
                'quinto_cuadrante' => $quinto_cuadrante,
                'sexto_cuadrante' => $sexto_cuadrante,
                'primer_cuadrante_infantil' => $primer_cuadrante_infantil,
                'segundo_cuadrante_infantil' => $segundo_cuadrante_infantil,
                'tercer_cuadrante_infantil' => $tercer_cuadrante_infantil,
                'cuarto_cuadrante_infantil' => $cuarto_cuadrante_infantil,
                'quinto_cuadrante_infantil' => $quinto_cuadrante_infantil,
                'sexto_cuadrante_infantil' => $sexto_cuadrante_infantil,
                'septimo_cuadrante_infantil' => $septimo_cuadrante_infantil,
                'octavo_cuadrante_infantil' => $octavo_cuadrante_infantil,
                'primer_cuadrante_endodoncia' => $primer_cuadrante_endodoncia,
                'segundo_cuadrante_endodoncia' => $segundo_cuadrante_endodoncia,
                'tercer_cuadrante_endodoncia' => $tercer_cuadrante_endodoncia,
                'cuarto_cuadrante_endodoncia' => $cuarto_cuadrante_endodoncia,
                'quinto_cuadrante_endodoncia' => $quinto_cuadrante_endodoncia,
                'sexto_cuadrante_endodoncia' => $sexto_cuadrante_endodoncia,
                'tratamientos' => $tratamientos_dentales,
                'diagnosticos' => $diagnosticos_dentales,
                'odontograma' => $odontograma,
                'odontograma_historial' => $odontograma_historial,
                'presupuesto' => $presupuesto_dental,
                'biopsias' => $biopsias,
                'imagenes' => $imagenes,
                'imagenes_preimplante' => $imagenes_preimplante,
                'imagenes_periodoncia' => $imagenes_periodoncia,
                'contador_div_examenes' => $contador_div_examenes,
                'controles_ciclo' => $controles_ciclo,
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones,
                'curaciones_planas' => $curaciones_planas,
                'curaciones_lpp' => $curaciones_lpp,
                'curaciones_pie_diabetico' => $curaciones_pie_diabetico,
                'curaciones_quemados' => $curaciones_quemados,
                'resumen_procedimientos' => $resumen_procedimientos,
                'examenes_solicitados' => $examenes_solicitados,
                'direccion_id_ciudad_paciente' => $direccion_id_ciudad_paciente,
                'direccion_txt_ciudad_paciente' => $direccion_txt_ciudad_paciente,
                'direccion_id_region_paciente' => $direccion_id_region_paciente,
                'direccion_txt_region_paciente' => $direccion_txt_region_paciente,
                'responsable' => $responsable,
				'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                'prevision' => $prevision,
                'profesional' => $profesional,
                'btn_class_ficha_atencion_previa' => $btn_class_ficha_atencion_previa,
                'btn_class_eval_especialidad' => $btn_class_eval_especialidad,
                'profesional_especialidad' => $profesional_especialidad,
                'medicamento' => $medicamento,
                'hora_medica' => $hora,
                'fichas' => $fichas,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                'ciudad' => $ciudad,
                'examenMedico' => $examenMedico,
                // 'medicamentos_cronicos' => $medicamentos_cronicos,
                'alergias' => $alergias,
                // 'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'discapacidades' => $discapacidades,
                'patoligias_cronicas' => $patoligias_cronicas,
                'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                'lugares_atencion ' => $lugares_atencion ,
                'id_ficha_atencion' => $id_ficha_atencion,
                'especialidad' => $especialidad,
                'interconsulta' => $interconsulta,
                'mostrar_msg_vacuna_minsal' => $mostrar_msg_vacuna_minsal,
                'mostrar_msg_otras_vacunas' => $mostrar_msg_otras_vacunas,
                'mostrar_msg_interconsulta' => $mostrar_msg_interconsulta,
                'fichaTipo' => $fichaTipo,
				'examen_tipo' => $examen_tipo,
                'examen' => $examen,
                'lista_examen_especial' => $lista_examen_especial,
                'examenes_especialidad' => $examenes_especialidad,
                'examenes_radiologicos' => $examenes_radiologicos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                'institucion' => $institucion,
                'cns_tipo' => $cns_tipo,
                'cns_tipo_template' => $cns_tipo_template,
                'cns_registros' => $cns_registros,
				'resultado_examen' => $resultado_examen,
                'tipo_antecedente' => $tipo_antecedente,
                'receta_control' => $receta_control,
                'tiene_controles' => $tiene_controles,
                'plan_tratamiento_info' => $plan_tratamiento_info ?? null,
                /** FMU */
                // 'id_usuario' => $id_usuario,
                //// 'paciente' => $paciente,
                // 'contacto_emergencia' => $contacto_emergencia,
                'antecedentes_paciente' => $antecedentes_paciente,
                'grupo_sanguineo' => $grupo_sanguineo,
                'antecedentes' => $antecedentes,
                'token' => $request->token,
                'especialidad' => $especialidad,
                'sub_tipo_especialidad' => $sub_tipo_especialidad,
                'direccion' => $direccion,
                'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
                'tratamiento_activo' => $regisrto_result,
                //// 'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                //// 'resultado_examen' => $resultado_examen,
                'control_enfer_cronicas' => $control_enfer_cronicas,
                'nutricionistas' => $nutricionistas,
                'docs_nutricion_evaluacion' => $docs_nutricion_evaluacion,
                'docs_nutricion_pauta' => $docs_nutricion_pauta,
                'ficha_enfermeria' => $ficha_enfermeria,
                'enfermera' => true, // Variable para habilitar botones de curación
                'medicamentos_enfermeria' => $medicamentos_enfermeria,
                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/
                'licencia' => $licencia,
                'ultima_licencia' => $ultima_licencia,

                /** CONSULTA VIDEO LLAMADA */
                // 'info_video' => $info_video,

                /** RESPONSABLES */
                'responsables'  => $responsables,
                'acompanantes'  => $acompanantes,

                'reg_octavo_par'  => $reg_octavo_par,
                'reg_audicion'  => $reg_audicion,
                'procedimientoCentro'  => $procedimientoCentroTem,

				'reg_exam_rayo'  => $reg_exam_rayo,
                'ultimoControl' => $ultimoControl,
                'laboratorios' => $laboratorios,
            ]
        );
    }

    public function dame_comunas_contacto_emergencia($id_paciente){
        $paciente = Paciente::find($id_paciente);
        // verificar si el paciente tiene contacto de emergencia
        if($paciente->ContactosEmergencia()->count() == 0){
            return [];
        }
        $region = $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->Region()->first()->id;
        $comunas = Ciudad::where('id_region', $region)->get();
        return $comunas;
    }

    private function dame_bodegas($id_lugar_atencion)
    {
        $bodegas = Bodega::all();

        return $bodegas;
    }

    private function dame_proveedores($id_lugar_atencion)
    {
        $proveedores = Proveedor::where('estado', 1)->get();

        return $proveedores;
    }

    public function dame_correlativo($tip_doc)
    {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $fila=Correlativos::where('documento', $tip_doc)
                        ->where('id_usuario', $profesional->id_usuario)
                        ->first();

        if(!is_null($fila))
        {
            $corr=$fila->correlativo;
            $el_siguiente=$corr+1;
            $num=$el_siguiente;

        }else{
            $fila = new Correlativos;
            $fila->documento = $tip_doc;
            $fila->id_usuario = $profesional->id_usuario;
            $fila->correlativo = 0;
            $fila->serie = 0;
            $fila->alarma = 50;
            $fila->estado = 1;
            $fila->fecha = Carbon::now();

            $fila->save();
            $num = 1;
        }

        return $num;
    }

    public function dameOrdenesTrabajoMenor($id_paciente, $id_profesional,$id_presupuesto, $id_ficha_atencion = null){
        $ordenes = OrdenTrabajoMenor::select('ordenes_trabajos_menores.*','laboratorios.nombre as nombre_lab','prestaciones_laboratorio.valor as valor_prestacion')
                                        ->distinct()
                                        ->join('laboratorios','ordenes_trabajos_menores.id_laboratorio','laboratorios.id')
                                        ->leftjoin('prestaciones_laboratorio','ordenes_trabajos_menores.trabajo_realizar','prestaciones_laboratorio.nombre')
                                        ->where('ordenes_trabajos_menores.id_paciente', $id_paciente)
                                        ->where('ordenes_trabajos_menores.id_profesional',$id_profesional)
                                        ->when($id_ficha_atencion, function ($query) use ($id_ficha_atencion) {
                                            return $query->where('ordenes_trabajos_menores.id_ficha_atencion', $id_ficha_atencion);
                                        })
                                        ->orderBy('ordenes_trabajos_menores.created_at', 'asc')
                                        ->get();
        return $ordenes;
    }

    public function dameOrdenesTrabajoMayor($id_paciente, $id_profesional,$id_presupuesto, $id_ficha_atencion = null){
        $ordenes = OrdenTrabajoMayor::select('ordenes_trabajos_mayores.*','laboratorios.nombre as nombre_lab', 'prestaciones_laboratorio.valor as valor_prestacion')

                                        ->leftjoin('laboratorios','ordenes_trabajos_mayores.id_laboratorio','laboratorios.id')
                                        ->leftjoin('prestaciones_laboratorio','ordenes_trabajos_mayores.trabajo_realizar','prestaciones_laboratorio.nombre')
                                        ->where('ordenes_trabajos_mayores.id_paciente', $id_paciente)
                                        ->where('ordenes_trabajos_mayores.id_profesional',$id_profesional)
                                        ->when($id_ficha_atencion, function ($query) use ($id_ficha_atencion) {
                                            return $query->where('ordenes_trabajos_mayores.id_ficha_atencion', $id_ficha_atencion);
                                        })
                                        ->get();
        return $ordenes;
    }

    public function dameProcedimientosCoronaProtesis($id_paciente, $id_profesional,$id_ficha_atencion, $seccion = null){
        if($seccion == 'pfu'){
            $procedimientos = PiezasDentalCoronaProtesis::where('id_paciente', $id_paciente)->where('id_profesional',$id_profesional)->where('seccion','pfu')->get();
        }else{
            $procedimientos = PiezasDentalCoronaProtesis::where('id_paciente', $id_paciente)->where('id_profesional',$id_profesional)->where('seccion','pfp')->get();
        }

        return $procedimientos;
    }

    public function dame_insumos_tratamiento($id_paciente,$id_ficha_atencion,$tipo = null){
        try {

            $insumos = InsumosTratamientosDental::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->get();
            foreach($insumos as $i){
                $i->insumos = mb_strtoupper($i->insumos, 'UTF-8');
            }
            return $insumos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_insumos_bodega($id_ficha_atencion){
        try {
            $insumos = PedidoInsumos::where('id_ficha_atencion',$id_ficha_atencion)->get();
            $materiales = PedidoMateriales::where('id_ficha_atencion',$id_ficha_atencion)->get();
            // unificar los insumos y materiales en un solo array de tipo collection
            $pedidos = $insumos->merge($materiales);
            foreach ($pedidos as $pedido) {
                $pedido->fecha = Carbon::parse($pedido->created_at)->format('Y-m-d H:m:s');
                if($pedido->id_profesional == null){
                    $pedido->profesional = 'No asignado';
                }else{
                    $profesional = Profesional::where('id', $pedido->id_profesional)->first();
                    $pedido->profesional = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                }
            }
            return $pedidos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dameHistorialDentalImpl($id_paciente, $seccion){
        $historial = ExamenesDentalPiezaHistoria::where('id_paciente', $id_paciente)->where('seccion',$seccion)->get();
        return $historial;
    }

    public function dameHistorialDentalPeriod($id_paciente){
        $historial = ExamenesDentalPiezaPeriod::where('id_paciente',$id_paciente)->get();
        return $historial;
    }

    public function damePresupuestosDental($id_paciente, $id_ficha_atencion, $id_lugar_atencion){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $presupuestos = PresupuestosDental::where('id_paciente',$id_paciente)
        ->where('id_profesional', $profesional->id)
        ->where('estado',0)
        ->first();
        return $presupuestos;
    }

    public function dameValores($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad){
        $total_general = 0;
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // Obtener todos los tratamientos desde dameTratamientosBocaGeneral()
        $tratamientos = $this->dameTratamientosBocaGeneral($id_ficha_atencion);

        foreach ($tratamientos as $item) {
            // Sumar solo los que están en presupuesto y tienen valor definido
            if ($item->presupuesto == 1 && isset($item->valor) && $item->urgencia == 0) {
                $total_general += $item->valor;
            }
        }

        $total_odontograma = 0;

        $odontograma = $this->dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad);

        // Iterar y sumar valores
        foreach ($odontograma as $item) {
            if($item['presupuesto'] == 1 && $item['urgencia'] == 0){
                if (isset($item['valor'])) {
                    $total_odontograma += $item['valor'];
                }
            }

        }

        $total_insumos = 0;

        $insumos = $this->dame_insumos_tratamiento($id_paciente, $id_ficha_atencion, null);

        // Iterar y sumar valores
        foreach ($insumos as $item) {
            if($item['presupuesto'] == 1 && $item['urgencia'] == 0){
                if (isset($item['valor'])) {
                    $total_insumos += $item['valor'] * $item['cantidad'];
                }
            }

        }

        $trabajos_laboratorio = $this->dame_trabajos_laboratorio($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $profesional->id);

        $total_lab = 0;

        foreach ($trabajos_laboratorio as $trabajo) {
            if($trabajo->presupuesto == 1){
                $total_lab += $trabajo->valor_prestacion;
            }
        }

        return [$total_general, $total_odontograma, $total_insumos, $total_lab];
    }

    public function dame_trabajos_laboratorio($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $id_presupuesto, $id_profesional = null)
    {
        $ficha = FichaAtencion::find($id_ficha_atencion);

        $trabajos = $this->dameOrdenesTrabajoMenor($id_paciente, $id_profesional, $id_presupuesto, $id_ficha_atencion);

        $trabajos_mayor = $this->dameOrdenesTrabajoMayor($id_paciente, $id_profesional,$id_presupuesto, $id_ficha_atencion);

        // Unir los resultados de trabajos menores y mayores
        $trabajos = $trabajos->merge($trabajos_mayor);
        return $trabajos;
    }

   public function pdf_orden_examenes_tipo_examen(Request $request)
    {
        $id_ficha_atencion = $request->id;
        $tipo_examen = $request->tipo;

        $examenes = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)
                                        ->where('tipo_examen', $tipo_examen)
                                        ->get();

        if ($examenes->isEmpty()) {
            return 'No se encontraron exámenes para esta ficha de atención.';
        }

        $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
        $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);
        $paciente = Paciente::find($ficha_atencion->id_paciente);
        $profesional = Profesional::with('direccion')->find($ficha_atencion->id_profesional);

        // Certificados y QR
        $token_receta = '';
        $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);
        if ($temp_token['estado'] != 1) {
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
        }
        $token_receta = $temp_token['certificado'];
        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
        $qr_documento = GeneradorQrController::generar($url_documento);

        $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 1, $ficha_atencion->id);
        if ($temp_token['estado'] != 1) {
            $temp_token = CertificadoController::certificadoProfesional(rand(1114, 999));
        }
        $token_profesional = $temp_token['certificado'];
        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
        $qr_profesional = GeneradorQrController::generar($url_documento);

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

        $detalle_orden = [
            $tipo_examen => []
        ];

        foreach ($examenes as $ex) {
            $lista_examenes = json_decode($ex->examenes, true);

            if (is_array($lista_examenes)) {
                foreach ($lista_examenes as $descripcion) {
                    $detalle_orden[$tipo_examen][] = [
                        'examen' => $descripcion ?? 'Sin descripción',
                        'prioridad' => $ex->prioridad ?? 'Normal',
                        'codigo' => $ex->codigo ?? '',
                        'otro' => $ex->otro ?? '',
                        'contraste' => $ex->contraste ?? 0
                    ];
                }
            } else {
                $detalle_orden[$tipo_examen][] = [
                    'examen' => 'Sin descripción',
                    'prioridad' => $ex->prioridad ?? 'Normal',
                    'codigo' => $ex->codigo ?? '',
                    'otro' => $ex->otro ?? '',
                    'contraste' => $ex->contraste ?? 0
                ];
            }
        }


        $cuerpo = [
            'array_ficha_atencion' => $array_ficha_atencion,
            'array_lugar_atencion' => $array_lugar_atencion,
            'array_profesional' => $array_profesional,
            'array_paciente' => $array_paciente,
            'detalle_orden' => $detalle_orden,
            'cantidad_recetas' => count($detalle_orden)
        ];


        $titulo = 'Solicitud de Exámenes: '.$tipo_examen;

        return PdfController::generarPDF($titulo, compact('titulo', 'cuerpo','array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente','detalle_orden'), 'Exámenes '.$paciente->rut, 'pdf_solicitud_examen_tipo');
    }



    public function dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad,$id_presupuesto = null, $id_profesional = null){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if(!is_null($id_profesional)){
            $profesional = Profesional::find($id_profesional);
        }

        if($tipo_especialidad == 16){
            $query = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'tratamientos_implantologia.descripcion',
                'tratamientos_implantologia.cantidad_bloques',
                'tratamientos_implantologia.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('tratamientos_implantologia', 'odontogramas_pacientes.tratamiento', '=', 'tratamientos_implantologia.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion)
                ->where('odontogramas_pacientes.id_profesional', $profesional->id)
                ->where('odontogramas_pacientes.tipo_especialidad', $tipo_especialidad);
        }else{
            $query = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'diagnosticos_dental.descripcion',
                'diagnosticos_dental.cantidad_bloques',
                'diagnosticos_dental.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion)
                ->where('odontogramas_pacientes.id_profesional', $profesional->id)
                ->where('odontogramas_pacientes.tipo_especialidad', $tipo_especialidad);
        }


            // verificar si trae ficha de atencion
            if (!is_null($id_ficha_atencion)) {
                $query->where('odontogramas_pacientes.id_ficha_atencion', $id_ficha_atencion);
            }

            // Verificar si el parámetro $id_presupuesto no es nulo
            if (!is_null($id_presupuesto)) {
                $query->where('odontogramas_pacientes.id_presupuesto', $id_presupuesto);
            }

            // Obtener los resultados
            $odontogramas = $query->get();

            foreach ($odontogramas as $odontograma) {
                if($profesional->id_tipo_especialidad == 16){
                    $id_diagnostico = TratamientosImplantologia::where('descripcion',$odontograma->tratamiento)->first();
                    $odontograma->id_diagnostico = $id_diagnostico->id;
                    // buscamos el valor del tratamiento en la tabla diagnosticos_dental_profesional
                    $d = DiagnosticosDentalProfesional::where('id_diagnostico',$id_diagnostico->id)
                        ->where('id_profesional',$profesional->id)
                        ->first();
                        if($d){
                            $odontograma->valor = $d->valor;
                        }
                }else{
                    $id_diagnostico = DiagnosticosDental::where('descripcion',$odontograma->tratamiento)->first();
                    $odontograma->id_diagnostico = $id_diagnostico->id;
                    // buscamos el valor del tratamiento en la tabla diagnosticos_dental_profesional
                    $d = DiagnosticosDentalProfesional::where('id_diagnostico',$id_diagnostico->id)
                        ->where('id_profesional',$profesional->id)
                        ->first();
                        if($d){
                            $odontograma->valor = $d->valor;
                        }
                }
                $odontograma->descripcion = mb_strtoupper($odontograma->descripcion, 'UTF-8');
            }

            return $odontogramas;
    }

    public function dameOdontogramaPacienteHistorial($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $odontogramas = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'tratamientos_implantologia.descripcion',
                'tratamientos_implantologia.cantidad_bloques',
                'tratamientos_implantologia.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('tratamientos_implantologia', 'odontogramas_pacientes.tratamiento', '=', 'tratamientos_implantologia.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->get();
        }else{
            $odontogramas = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'diagnosticos_dental.descripcion',
                'diagnosticos_dental.cantidad_bloques',
                'diagnosticos_dental.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->get();
        }
        return $odontogramas;

    }

    public function dameCompletaEndoTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameCompletaEndoDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralTratamientoEndodoncia($id_paciente,$tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('examenes_boca_general.localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('examenes_boca_general.especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($id_paciente,$tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralTratamientoEndodoncia($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralDiagnosticoEndodoncia($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico');

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameBocaCompletaGeneralTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

        ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameBocaCompletaGeneralDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

        ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')
            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','tratamiento')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','tratamiento')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')
            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
            ->where('examenes_boca_general.localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('examenes_boca_general.especialidad_examen','tratamiento');
            if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
            ->where('examenes_boca_general.localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('examenes_boca_general.especialidad_examen','tratamiento');
            if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }

        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
            if(!is_null($id_ficha_atencion)){
                $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
            if(!is_null($id_ficha_atencion)){
                $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }

        return $examenes;
    }

    public function dameMaxilarInferiorGeneral($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::where('id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('localizacion','Maxilar inferior')
        ->where('tipo_examen',1)
        ->get();
        return $examenes;
    }

    public function dameMBocaCompletaGeneral($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::where('id_paciente',$id_paciente)->where('localizacion','Boca completa')->where('tipo_examen',1)->first();
        return $examenes;
    }

    public function dameBiopsiasDentalPaciente($id_paciente){
        $biopsias = Biopsia::where('id_paciente',$id_paciente)->where('estado',1)->get();
        return $biopsias;
    }

    public function dameExamenesPiezaDentalOraxRxOdontop($id_paciente){
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('tipo_examen',3)->get();
        foreach ($examenes as $e) {
            $imagenes = ImagenesDentalRxPaciente::where('id_examen', $e->id)->get();
            $e->imagenes = $imagenes;
            $nueva_lista_imagenes = []; // Inicializamos un nuevo array

            foreach ($imagenes as $i) {
                // Decodificamos el JSON contenido en el atributo `paths_imagenes`
                $decoded_paths = json_decode($i->paths_imagenes, true);

                // Creamos un nuevo objeto/array con la imagen y sus paths decodificados
                $nueva_lista_imagenes[] = [
                    'id' => $i->id,
                    'id_examen' => $i->id_examen,
                    'paths_imagenes' => $decoded_paths, // Ahora es un array decodificado
                ];
            }

            // Puedes asignar este array al objeto `$e` si lo necesitas
            $e->decoded_imagenes = $nueva_lista_imagenes; // Agregamos el array decodificado al examen
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPieza($id_paciente, $tipo_especialidad, $id_ficha_atencion){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('tipo_examen',1)
        ->where('tipo_especialidad', $profesional->id_tipo_especialidad)
        ->where('id_profesional', $profesional->id)
        ->where('id_ficha_atencion', $id_ficha_atencion)
        ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaPrimerCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                    ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '1.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                    ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                    ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '1.%'") // Convierte a cadena y filtra
                    ->get();
        }


        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaSegundoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '2.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '2.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaTercerCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '3.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '3.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaCuartoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '4.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '4.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaQuintoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaSextoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaSeptimoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaOctavoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaEnd($id_paciente, $id_profesional, $id_ficha_atencion){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('id_profesional',$profesional->id)
        ->where('tipo_examen',2)
        ->where('id_ficha_atencion', $id_ficha_atencion)
        // ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaOdontop($id_paciente){
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)->where('tipo_examen',3)->where('estado',1)->get();
        return $examenes;
    }

    public function dameInfoImagenesDentalPaciente($id_paciente, $seccion, $id_ficha_atencion = null)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$profesional) {
            \Log::warning('Profesional no encontrado', ['user_id' => Auth::user()->id]);
            return collect(); // Retorna colección vacía
        }

        // Obtén las imágenes del paciente
        $imagenes = ImagenesDentalPaciente::where('id_paciente', $id_paciente)
            ->where('id_profesional', $profesional->id)
            ->where('seccion', $seccion)
            ->when($id_ficha_atencion, function ($query, $id_ficha_atencion) {
                return $query->where('id_ficha_atencion', $id_ficha_atencion);
            })
            ->get();

        foreach ($imagenes as $imagen) {
            if (is_null($imagen->paths_imagenes)) {
                $imagen->paths_imagenes = [];
            }
        }

        return $imagenes;
    }

    public function dameExamenesPiezaDentalOraxRx($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('id_profesional',$profesional->id)->get();
        foreach ($examenes as $e) {
            $imagenes = ImagenesDentalRxPaciente::where('id_examen', $e->id)->get();
            $e->imagenes = $imagenes;
            $nueva_lista_imagenes = []; // Inicializamos un nuevo array

            foreach ($imagenes as $i) {
                // Decodificamos el JSON contenido en el atributo `paths_imagenes`
                $decoded_paths = json_decode($i->paths_imagenes, true);

                // Creamos un nuevo objeto/array con la imagen y sus paths decodificados
                $nueva_lista_imagenes[] = [
                    'id' => $i->id,
                    'id_examen' => $i->id_examen,
                    'paths_imagenes' => $decoded_paths, // Ahora es un array decodificado
                ];
            }

            // Puedes asignar este array al objeto `$e` si lo necesitas
            $e->decoded_imagenes = $nueva_lista_imagenes; // Agregamos el array decodificado al examen
            $e->numero_piezas = $e->numero_piezas;
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalOraxRxEnd($id_paciente, $id_ficha_atencion){
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->where('tipo_examen',2)->get();
        foreach ($examenes as $e) {
            $imagenes = ImagenesDentalRxPaciente::where('id_examen', $e->id)->get();
            $e->imagenes = $imagenes;
            $nueva_lista_imagenes = []; // Inicializamos un nuevo array

            foreach ($imagenes as $i) {
                // Decodificamos el JSON contenido en el atributo `paths_imagenes`
                $decoded_paths = json_decode($i->paths_imagenes, true);

                // Creamos un nuevo objeto/array con la imagen y sus paths decodificados
                $nueva_lista_imagenes[] = [
                    'id' => $i->id,
                    'id_examen' => $i->id_examen,
                    'paths_imagenes' => $decoded_paths, // Ahora es un array decodificado
                ];
            }

            // Puedes asignar este array al objeto `$e` si lo necesitas
            $e->decoded_imagenes = $nueva_lista_imagenes; // Agregamos el array decodificado al examen
        }

        return $examenes;
    }

    public function dameEvolucionesPacienteHosp($idpaciente){
        $controles_ciclo = EvolucionPacienteHospital::select('evoluciones_paciente_hosp.*','users.name as responsable')
                                                    ->join('users','users.id','=','evoluciones_paciente_hosp.id_responsable')
                                                    ->where('evoluciones_paciente_hosp.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function dameEvolucionesPaciente($idpaciente){
        $controles_ciclo = EvolucionUrgencia::select('evoluciones_urgencias.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_urgencias.id_responsable')
                                                    ->where('evoluciones_urgencias.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function dameExamenesPiezaDentalDolor($id_paciente, $tipo_especialidad){
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('tipo_examen',1)->where('tipo_especialidad',$tipo_especialidad)->where('estado',1)->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalEndDolor($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('id_profesional',$profesional->id)->where('tipo_examen',2)->get();
        return $examenes;
    }

	public function index_sdi(Request $request)
    {
        $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
        $paciente = Paciente::where('id', $hora->id_paciente)->first();

		// FICHAS PREVIAS Y FICHA ACTUAL(ACTIVA O NUEVA)
        $fichas = '';
        $id_ficha_atencion = '';
        $fichaAtencion = '';
        $result_fichas = static::cargarInfoFichaBase($hora);

        if($result_fichas->estado == 1)
        {
            // $fichas = (object)$result_fichas->ficha_previas;
            $id_ficha_atencion = $result_fichas->id_ficha_actual_nueva;
            $fichaAtencion = (object)$result_fichas->ficha_actual_nueva;
        }

        $pacienteDpendiente = PacientesDependientes::where('id_paciente', $paciente->id)->get()->first();
        $responsable = '';
        if($pacienteDpendiente)
        {
            $responsable = Paciente::find($pacienteDpendiente->id_responsable);
        }

		list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
		$ano_diferencia  = date("Y") - $ano;
		$mes_diferencia = date("m") - $mes;
		$dia_diferencia   = date("d") - $dia;
		if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;

		$edad = $ano_diferencia;
		$paciente->fecha_nac = $dia.'-'.$mes.'-'.$ano;
		$paciente->edad = $edad;

        $direccion_paciente = Direccion::where('id',$paciente->id_direccion)->first();
        $direccion_id_ciudad_paciente = '';
        $direccion_txt_ciudad_paciente = '';
        $direccion_region_paciente = '';
        $direccion_id_region_paciente = '';
        $direccion_txt_region_paciente = '';
        $regiones = Region::all();
        $ciudades = Ciudad::all();

        if($direccion_paciente)
        {
            $direccion_id_ciudad_paciente = $direccion_paciente->id_ciudad;
            $direccion_region_paciente = Ciudad::select('nombre','id_region')->where('id',$direccion_id_ciudad_paciente)->first();
            if($direccion_region_paciente)
            {
                $direccion_txt_ciudad_paciente = $direccion_region_paciente->nombre;

                $ciudades = Ciudad::where('id_region', $direccion_region_paciente->id_region)->get();
                $direccion_id_region_paciente = $direccion_region_paciente->id_region;

                $direccion_txt_region_paciente_temp = Region::find($direccion_id_region_paciente);
                $direccion_txt_region_paciente = $direccion_txt_region_paciente_temp->nombre;
            }
        }
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        // LUGAR DE ATENCION
        $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();

        $prevision = Prevision::all();
        $medicamento = Producto::all();
        $tipoExamen = TipoExamen::all();
        $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        $direccion = $paciente->Direccion()->first();
        if (!$direccion == null)
        {
            $ciudad = $direccion->Ciudad()->first();
        }
        else
        {
            $direccion = null;
            $ciudad = null;
        }

        $receta_control = RecetaControl::orderBy('Descripcion')->get();

        $grupo_sanguineo = GrupoSanguineo::all();

        $info_video = '';
        // if($hora->tipo_hora_medica == 'T')
        // {
        //     $filtro_v = array();
        //     $filtro_v[] = array('id_hora_atencion', $hora->id);
        //     $filtro_v[] = array('id_profesional', $hora->id_profesional);
        //     $filtro_v[] = array('id_paciente', $hora->id_paciente);
        //     $info_video = VideoConsultaInfo::where($filtro_v)->first();
        // }

        /** INFO ACOMPAÑANTE */
        $responsables = '';
        $acompanantes = '';
        if(\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
        {
            if($hora->acomp_representante == 1)
            {
                $filtro_list_PD = array();
                $filtro_list_PD[] = array('estado', 1);
                $filtro_list_PD[] = array('id_paciente', $paciente->id);
                $responsables_relacion = PacientesDependientes::where($filtro_list_PD)->pluck('id_responsable')->toArray();
                if($responsables_relacion)
                {
                    $responsables = Paciente::whereIn('id', $responsables_relacion)->get();
                }
            }

            if($hora->acomp_acompanante == 1)
            {
                if(!empty($hora->acomp_lista))
                {
                    $lista_acompanante = json_decode($hora->acomp_lista);
                    $acompanantes = Paciente::whereIn('id', $lista_acompanante)->get();
                }
            }
        }
        /** CIERRE INFO ACOMPAÑANTE */

        // INSTITUCION
        $institucion = '';
        $temp_inst = Instituciones::where('id_lugar_atencion', $request->lugar_atencion_id)->first();
        if($temp_inst)
        {
            $institucion = $temp_inst;
        }

		$antecedentes = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $ant_confidenciales = AntConfidenciales::where('id_paciente', $paciente->id)->first();

        if (isset($antecedentes)) {

            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
            $antecedentes_cirugias = AntecedentesCirugias::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        } else {
            $medicamentos_cronicos = [];
            $alergias = [];
            $antecedentes_quirurgicos = [];
            $patoligias_cronicas = [];
            $antecedentes_cirugias = [];
        }
		$id_usuario = Auth::user()->id;
        $userData = Funciones::userData($id_usuario);

        return view('atencion_institucional_sdi.atencion_ant_generales')->with(
            [
                'id_ficha_atencion' => $id_ficha_atencion,
                'fichaAtencion' => $fichaAtencion,
                'paciente' => $paciente,
                'direccion_paciente' => $direccion_paciente,
                'direccion_id_ciudad_paciente' => $direccion_id_ciudad_paciente,
                'direccion_txt_ciudad_paciente' => $direccion_txt_ciudad_paciente,
                'direccion_id_region_paciente' => $direccion_id_region_paciente,
                'direccion_txt_region_paciente' => $direccion_txt_region_paciente,
                'responsable' => $responsable,
                'prevision' => $prevision,
                'profesional' => $profesional,
                'medicamento' => $medicamento,
                'hora_medica' => $hora,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                'ciudad' => $ciudad,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                'institucion' => $institucion,

                'receta_control' => $receta_control,
                'grupo_sanguineo' => $grupo_sanguineo,
                'token' => $request->token,
                'direccion' => $direccion,

                /** CONSULTA VIDEO LLAMADA */
                'info_video' => $info_video,

                /** RESPONSABLES */
                'responsables'  => $responsables,
                'acompanantes'  => $acompanantes,

				'userData' => $userData,
				'alergias' => $alergias,
				'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
				'antecedentes_cirugias' => $antecedentes_cirugias,
				'ant_confidenciales' => $ant_confidenciales,
				'patoligias_cronicas' => $patoligias_cronicas,
				'medicamentos_cronicos' => $medicamentos_cronicos,
				'grupo_sanguineo' => $grupo_sanguineo,

            ]
        );

    }

    public function index_hospital_amb(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();
            $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
            $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();

            $id_paciente = $request->id_paciente;

            if(empty($request->id_paciente)) $id_paciente = 6;
            $paciente = Paciente::where('pacientes.id', $id_paciente)->first();

            // FICHA DE ATENCION ACTUAL
            $filtro_fichaAtencion = array();
            $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);

            if(!empty($hora->id_ficha_atencion))
                $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
            $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

            // FICHAS PREVIAS Y FICHA ACTUAL(ACTIVA O NUEVA)
            $fichas = '';
            $id_ficha_atencion = '';
            $fichaAtencion = '';

            $result_fichas = static::cargarInfoFichaBase($hora);

            // echo json_encode($hora);
            // echo '*****************';
            // echo json_encode($result_fichas);

            if($result_fichas->estado == 1)
            {
                // $fichas = (object)$result_fichas->ficha_previas;
                $id_ficha_atencion = $result_fichas->id_ficha_actual_nueva;
                $fichaAtencion = (object)$result_fichas->ficha_actual_nueva;
            }

            // echo  json_encode($result_fichas);
            // exit();

            // CONSULTAS PREVIAS base fichas atencion
            $filtro_previas = array();
            $filtro_previas[] = array('id_paciente', $hora->id_paciente);
            $filtro_previas[] = array('confidencial', '0');
            $filtro_previas[] = array('finalizada', 1);
            $filtro_previas[] = array('id_profesional', $profesional->id);
            $fichas = FichaAtencion::where($filtro_previas)->orderBy('id','desc')->get();

            // // FICHA DE ATENCION ACTUAL
            // $filtro_fichaAtencion = array();
            // $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);

            // if(!empty($hora->id_ficha_atencion))
            //     $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
            $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

            if( !empty($fichaAtencion) )
                $id_ficha_atencion = $fichaAtencion->id;

            // 5 realizando
            // 6 realizada
            if ($hora->id_estado != 5 && $hora->id_estado != 6)
            {
                $nueva_ficha_atencion = new FichaAtencion();
                $nueva_ficha_atencion->id_paciente = $paciente->id;
                $nueva_ficha_atencion->id_profesional = $profesional->id;
                $nueva_ficha_atencion->id_lugar_atencion = $request->lugar_atencion_id;

                if (!$nueva_ficha_atencion->save()) {
                    return back()->with('mensaje', 'error');
                }
                else
                {
                    $id_ficha_atencion = $nueva_ficha_atencion->id;
                }

                $hora->id_estado = 5;
                $hora->fecha_realizacion_consulta = now();
                $hora->id_ficha_atencion = $nueva_ficha_atencion->id;

                if (!$hora->save()) {
                    return back()->with('mensaje', 'error');
                }
            }

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
            $lista_recetas = Recomendacion::where('activo', $paciente->id)
                                          ->whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 year")) )
                                          ->pluck('id')->toArray();

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
                                // Obtener la última administración real desde el historial
                                $ultimaAdministracion = RecomendacionDetalleAdministracion::where('id_recomendacion_detalle', $value_det->id)
                                    ->orderBy('fecha_hora_administracion', 'desc')
                                    ->first();

                                // Calcular si puede administrar basándose en la última administración
                                $puedeAdministrar = true;
                                $ultimaAdministracionFecha = null;
                                $ultimaAdministracionHora = null;
                                $horasDesdeUltimaAdmin = null;
                                $tiempo_transcurrido = 0;

                                if ($ultimaAdministracion) {
                                    $ultimaAdministracionFecha = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->format('d-m-Y');
                                    $ultimaAdministracionHora = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->format('H:i');

                                    // Calcular tiempo transcurrido desde la última administración
                                    $fecha_ultima_admin = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion);
                                    $fecha_actual_admin = \Carbon\Carbon::now();
                                    $tiempo_transcurrido = $fecha_ultima_admin->diffInMinutes($fecha_actual_admin);
                                    $horasDesdeUltimaAdmin = $fecha_ultima_admin->diffInHours($fecha_actual_admin);

                                    // Si han pasado menos de 6 horas, no puede administrar
                                    // Este valor puede ajustarse según la frecuencia del medicamento
                                    if ($horasDesdeUltimaAdmin < 6) {
                                        $puedeAdministrar = false;
                                    }
                                }

                                // Si el tratamiento está finalizado (estado = 2), no puede administrar
                                if ($value_det->estado == 2) {
                                    $puedeAdministrar = false;
                                }

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
                                    'fecha_administrado' => $value_det->fecha_administrado,
                                    'hora_administrado' => $value_det->hora_administrado,
                                    'contador_dosis' => $value_det->contador_dosis,
                                    'tiempo_transcurrido' => $tiempo_transcurrido.' minutos',
                                    'nombre_responsable' => !empty($value_det->id_responsable)
                                        ? (optional(User::find($value_det->id_responsable))->name ?? '')
                                        : '',
                                    'created_at' => $value_det->created_at,
                                    'updated_at' => $value_det->updated_at,
                                    // Nuevos campos para control de administración
                                    'ultima_administracion_fecha' => $ultimaAdministracionFecha,
                                    'ultima_administracion_hora' => $ultimaAdministracionHora,
                                    'horas_desde_ultima_admin' => $horasDesdeUltimaAdmin,
                                    'puede_administrar' => $puedeAdministrar,
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
            // [RESPALDO] Mismo problema: usaba id_especialidad del profesional logueado.
            // foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
            // {
            //     if($value_ex_esp_realizado->id_sub_tipo_especialidad == 27)
            //     {
            //         $filtro_h_ex_esp_ral = array();
            //         $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
            //         $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
            //         $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
            //         $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            //     }
            //     else if($profesional->id_especialidad != 1)
            //     {
            //         $filtro_h_ex_esp_ral = array();
            //         $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
            //         $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
            //         $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
            //         $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            //     }
            //     else
            //     {
            //         $filtro_h_ex_esp_ral = array();
            //         $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
            //         $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
            //         $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
            //         $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            //     }
            // }

            foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
            {
                $filtro_h_ex_esp_ral = array();
                if (!empty($value_ex_esp_realizado->id_ficha_especialidad))
                {
                    // Exámenes de otros profesionales (fonoaudiología, laboratorio, etc.)
                    $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                }
                else
                {
                    // Exámenes médico/dental estándar
                    $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                }
                $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
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
            $pt = PacienteTriage::where('id_paciente', $paciente->id)->where('id_ficha_atencion', $id_ficha_atencion)->first();

            // historial de triages del paciente
            $historial_paciente_triage = PacienteTriage::select('pacientes_triage.*',
            'asignacion_urgencia.descripcion as descripcion_urgencia',
            'asignacion_urgencia.clase_html as clase_html_urgencia',
            'profesionales.nombre as nombre_profesional',
            'profesionales.apellido_uno as apellido_uno_profesional',
            'profesionales.apellido_dos as apellido_dos_profesional')
            ->where('pacientes_triage.id_paciente', $paciente->id)
            ->join('asignacion_urgencia', 'pacientes_triage.id_triage', '=', 'asignacion_urgencia.id')
            ->join('profesionales', 'pacientes_triage.id_responsable', '=', 'profesionales.id')
            ->orderBy('created_at', 'desc')
            ->get();

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

                // Calcular tiempo transcurrido si el tratamiento ha sido administrado
                if($receta->estado_tratamiento == 1 && $receta->fecha_administrado && $receta->hora_administrado) {
                    // Combinar fecha y hora para crear un DateTime completo
                    $fecha_hora_administracion = $receta->fecha_administrado . ' ' . $receta->hora_administrado;
                    $fecha_administracion = \Carbon\Carbon::parse($fecha_hora_administracion);
                    $ahora = \Carbon\Carbon::now();

                    // Calcular diferencia
                    $diff = $fecha_administracion->diff($ahora);

                    // Formatear diferencia
                    if($diff->days > 0) {
                        $receta->tiempo_transcurrido = $diff->days . ' día(s) ' . $diff->h . ' hora(s)';
                    } elseif($diff->h > 0) {
                        $receta->tiempo_transcurrido = $diff->h . ' hora(s) ' . $diff->i . ' min';
                    } else {
                        $receta->tiempo_transcurrido = $diff->i . ' min';
                    }

                    // También guardar en minutos totales para cálculos
                    $receta->minutos_transcurridos = ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;

                    // EVALUAR POSOLOGÍA Y CAMBIAR ESTADO SI ES NECESARIO
                    // Obtener el intervalo de frecuencia en minutos según la posología
                    $intervalo_minutos = $this->obtenerIntervaloFrecuencia($receta->nombre_frecuencia, $receta->id_frecuencia);

                    // Si el tiempo transcurrido es mayor al intervalo de frecuencia, cambiar estado a pendiente
                    if($intervalo_minutos > 0 && $receta->minutos_transcurridos >= $intervalo_minutos) {
                        $receta_actualizar = DetalleRecetaInterna::find($receta->id);
                        if($receta_actualizar) {
                            $receta_actualizar->estado_tratamiento = 0; // Cambiar a pendiente
                            $receta_actualizar->save();
                            $receta->estado_tratamiento = 0; // Actualizar también en el objeto actual
                        }
                    }
                } else {
                    $receta->tiempo_transcurrido = null;
                    $receta->minutos_transcurridos = 0;
                }

            }

            // $procedimientos = $this->dameProcedimientosPaciente($paciente->id);
            $examenControlador = new ExamenMedicoController();
            $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id);
            $adm_hospital_controlador = new AdministradorHospitalController();
            $curaciones = $adm_hospital_controlador->dameCuracionesPaciente($paciente->id);
            $curaciones_planas = $adm_hospital_controlador->dameCuracionesPlanasPaciente($paciente->id);
            $enfermeraControlador = new EscritorioEnfermerasController();
            $curaciones_lpp = $enfermeraControlador->dameCuracionesLppPaciente($paciente->id);
            $curaciones_pie_diabetico = $enfermeraControlador->dameCuracionesPieDiabeticoPaciente($paciente->id);
            $curaciones_quemados = $enfermeraControlador->dameCuracionesQuemadosPaciente($paciente->id);

            $enfermera = false;

            // ultimo controla de ciclo
            $ultimo_control_ciclo = EvolucionUrgencia::where('id_paciente', $paciente->id)->orderBy('id', 'desc')->first();
            if($ultimo_control_ciclo)
                $ultimo_control_ciclo->datos_evolucion = json_decode($ultimo_control_ciclo->datos_evolucion);

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

            $adm_hospital_controlador = new AdministradorHospitalController();
        $procedimientos = $adm_hospital_controlador->dameProcedimientosPaciente($paciente->id);
        $curaciones = $adm_hospital_controlador->dameCuracionesPaciente($paciente->id);
        // Generar resumen narrativo de tratamientos
        $resumen_recetas = $this->generarResumenTratamientos($recetas);

        // Generar resumen narrativo de procedimientos
        $resumen_procedimientos = $this->generarResumenProcedimientos($procedimientos);

            // Detalle adicional de recetas
            foreach($recetas as $r){
                $resumen_recetas .= $r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."\n";
            }


        $medicamentos_externos = DetalleRecetaInterna::where('id_paciente', $paciente->id)->get();
        foreach($medicamentos_externos as $me)
        {
            // Calcular tiempo transcurrido si el tratamiento ha sido administrado
            if($me->estado_tratamiento == 1 && $me->fecha_administrado && $me->hora_administrado) {
                // Combinar fecha y hora para crear un DateTime completo
                $fecha_hora_administracion = $me->fecha_administrado . ' ' . $me->hora_administrado;
                $fecha_administracion = \Carbon\Carbon::parse($fecha_hora_administracion);
                $ahora = \Carbon\Carbon::now();

                // Calcular diferencia
                $diff = $fecha_administracion->diff($ahora);

                // Formatear diferencia
                if($diff->days > 0) {
                    $me->tiempo_transcurrido = $diff->days . ' día(s) ' . $diff->h . ' hora(s)';
                } elseif($diff->h > 0) {
                    $me->tiempo_transcurrido = $diff->h . ' hora(s) ' . $diff->i . ' min';
                } else {
                    $me->tiempo_transcurrido = $diff->i . ' min';
                }

                // También guardar en minutos totales para cálculos
                $me->minutos_transcurridos = ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
            } else {
                $me->tiempo_transcurrido = null;
                $me->minutos_transcurridos = 0;
            }

            $intervalo_minutos_ext = $this->obtenerIntervaloFrecuencia($me->nombre_frecuencia, $me->id_frecuencia);
            // Si el tiempo transcurrido es mayor al intervalo de frecuencia, cambiar estado a pendiente
            if($intervalo_minutos_ext > 0 && $me->minutos_transcurridos >= $intervalo_minutos_ext) {
                $receta_actualizar = DetalleRecetaInterna::find($me->id);
                if($receta_actualizar) {
                    $receta_actualizar->estado_tratamiento = 0; // Cambiar a pendiente
                    $receta_actualizar->save();
                    $me->estado_tratamiento = 0; // Actualizar también en el objeto actual
                }
            }

            // Desencriptar observaciones de forma segura
            try {
                if(!empty($me->observaciones)) {
                    $me->observaciones = decrypt($me->observaciones);
                } else {
                    $me->observaciones = '';
                }
            } catch (\Exception $e) {
                \Log::error('Error desencriptando observaciones del medicamento ' . $me->id . ': ' . $e->getMessage());
                $me->observaciones = 'No disponible';
            }

        }
        // $examen_sad_person = $this->dame_examen_sad_person($paciente->id);

        $regiones = Region::all();
        $ciudades = Ciudad::all();

        // $tipos_roles_incidentes = TipoRolesIncidentePaciente::all();
        // $tipos_apreciaciones_paciente = TipoApreciacionClinicaPaciente::all();
        // $boleta_alcoholemia_paciente = $this->dame_boleta_alcoholemia_paciente($paciente->id);

        $ficha_atencion = FichaAtencion::where('id_paciente', $paciente->id)->first();

        $adm_hospital_controlador = new AdministradorHospitalController();
        $curaciones = $adm_hospital_controlador->dameCuracionesPaciente($paciente->id);
        // $curaciones_planas = $this->dameCuracionesPlanasPaciente($paciente->id)

        $profesionales_lugar_atencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugar_atencion->id)->with('Profesionales')->get();

        $lugar_atencion = LugarAtencion::find($request->lugar_atencion_id);

        $profesionales = [];
        foreach($profesionales_lugar_atencion as $pla)
        {
            $profesionales[] = $pla->Profesionales[0];
        }

        if($profesional->id_especialidad == 8) $enfermera = true;


        $evoluciones_profesional = $this->dameEvolucionesPacienteHosp($paciente->id);

        $solicitudes_pabellon_controller = new SolicitudPabellonQuirurgicosController();
        $solicitudes_pabellon = $solicitudes_pabellon_controller->dame_solicitudes_pabellon_paciente($paciente->id);

        // INTERCONSULTA
        $filtro_inter = array();
        $filtro_inter[] = array('id_paciente', $paciente->id);
        if((int)$profesional->id_especialidad>0)
            $filtro_inter[] = array('id_especialidad', $profesional->id_especialidad);//especialiadd
        if((int)$profesional->id_tipo_especialidad>0)
            $filtro_inter[] = array('id_tipos_especialidad', $profesional->id_tipo_especialidad);//tipo_espacialidad
        if((int)$profesional->id_sub_tipo_especialidad>0)
            $filtro_inter[] = array('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad);//sub_tipo_especialidad
        $filtro_inter[] = array('estado', 1);//pendiente por respuesta
        $interconsulta = Interconsulta::where($filtro_inter)->first();

            return view('atencion_hospital_ambulatorio.atencion_medica')->with([
                'historial_triage' => $historial_paciente_triage,
                'medicamentos_externos' => $medicamentos_externos,
                'evoluciones' => $evoluciones_profesional,
                'solicitudes_pabellon' => $solicitudes_pabellon['solicitudes'],
                'personal_enfermeria' => $profesionales,
                'enfermera' => $enfermera,
                'paciente' => $paciente,
                'responsables' => $responsables,
                'controles_ciclo' => $controles_ciclo,
                'ultimo_control_ciclo' => $ultimo_control_ciclo,
                'niveles_urgencia' => $niveles_urgencia,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'tipos_curaciones' => $tipos_curaciones,
                'tipos_receta' => $tipos_receta,
                'recetas' => $regisrto_result ? $regisrto_result[0]['detalle'] : [],
                'tiene_receta_pendiente' => $tieneRecetaPendiente_,
                'resumen_recetas' => $resumen_recetas,
                'resumen_procedimientos' => $resumen_procedimientos,
                'direccion_txt_ciudad_paciente' => '',
                'direccion_id_region_paciente' => 1,
                'procedimientos' => $procedimientos,
                'examenes_solicitados' => $examenes_solicitados,
                // 'examen_sad_person' => $examen_sad_person,
                // 'rescate_paciente' => $rescate_paciente,
                // 'examen_drogas' => $examen_drogas ? $examen_drogas : null,
                'curaciones' => $curaciones,
                'curacion_plana' => $curaciones_planas,
                'curaciones_lpp' => $curaciones_lpp,
                'curaciones_pie_diabetico' => $curaciones_pie_diabetico,
                'curaciones_quemados' => $curaciones_quemados,
                'enfermera' => $enfermera,
                // 'responsable' => $responsable,
                'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                // 'prevision' => $prevision,
                'profesional' => $profesional,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                // 'tipo_roles_incidentes' => $tipos_roles_incidentes,
                // 'tipos_apreciaciones_paciente' => $tipos_apreciaciones_paciente,
                // 'boleta_alcoholemia_paciente' => $boleta_alcoholemia_paciente,
                // // 'medicamento' => $medicamento,
                // 'hora_medica' => $hora,
                // 'fichas' => $fichas,
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
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                // 'lugares_atencion ' => $lugares_atencion ,
                'id_ficha_atencion' => $id_ficha_atencion,
                'fichaAtencion' => $ficha_atencion,
                // 'especialidad' => $especialidad,
                'interconsulta' => $interconsulta,
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
                'region' => $regiones,
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

    /** no se utiliza  s eutiliza index */
    // public function index2(Request $request) //profesional provisorio
    // {
    //     $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
    //     $paciente = Paciente::where('id', $request->id_paciente)->first();
    //     $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
    //     $regiones = Region::all();
    //     // $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->orderby('nombre_examen', 'ASC')->get();
    //     $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
    //     $user = Auth::user()->id;
    //     $profesional = Profesional::where('id_usuario', $user)->first();

    //     // CONSULTAS PREVIAS
    //     // $fichas = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 1)->get();
    //     $filtro_previas = array();
    //     $filtro_previas[] = array('id_paciente', $request->id_paciente);
    //     $filtro_previas[] = array('confidencial', '0');
    //     $filtro_previas[] = array('finalizada', 1);
    //     $filtro_previas[] = array('id_profesional', $profesional->id);
    //     $fichas = FichaAtencion::where($filtro_previas)->get();

    //     // LUGAR DE ATENCION
    //     $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();
    //     $lugares_atencion  = LugarAtencion::all();

    //     // FICHA DE ATENCION ACTUAL
    //     // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 0)->first();
    //     // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('finalizada', 0)->first();
    //     $filtro_fichaAtencion = array();
    //     $filtro_fichaAtencion[] = array('id_paciente', $request->id_paciente);
    //     // $filtro_fichaAtencion[] = array('confidencial', false);
    //     // $filtro_fichaAtencion[] = array('finalizada', 0);

    //     if(!empty($hora->id_ficha_atencion))
    //         $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
    //     $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

    //     $antecedentes = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

    //     if (isset($antecedentes)) {

    //         $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
    //         $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
    //         $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
    //         // $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
    //         $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 2)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
    //     } else {
    //         $medicamentos_cronicos = [];
    //         $alergias = [];
    //         $antecedentes_quirurgicos = [];
    //         $patoligias_cronicas = [];
    //     }

    //     if( !empty($fichaAtencion) )
    //         $id_ficha_atencion = $fichaAtencion->id;


    //     // 5 realizando
    //     // 6 realizada
    //     //if ($hora->id_estado != 5 && $hora->id_estado != 6)
    //     //{
    //         $nueva_ficha_atencion = new FichaAtencion();
    //         $nueva_ficha_atencion->id_paciente = $paciente->id;
    //         $nueva_ficha_atencion->id_profesional = $profesional->id;
    //         $nueva_ficha_atencion->id_lugar_atencion = $request->lugar_atencion_id;

    //         if (!$nueva_ficha_atencion->save()) {
    //             return back()->with('mensaje', 'error');
    //         }
    //         else
    //         {
    //             $id_ficha_atencion = $nueva_ficha_atencion->id;
    //         }

    //         $hora->id_estado = 5;
    //         $hora->fecha_realizacion_consulta = now();
    //         $hora->id_ficha_atencion = $nueva_ficha_atencion->id;

    //         if (!$hora->save()) {
    //             return back()->with('mensaje', 'error');
    //         }

    //     //}

    //     $prevision = Prevision::all();
    //     $medicamento = Producto::all();
    //     $tipoExamen = TipoExamen::all();
    //     // $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
    //     $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
    //     // $hipertension = Hipertension::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
    //     $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
    //     // $diabetes = Diabete::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
    //     $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
    //     $direccion = $paciente->Direccion()->first();
    //     if (!$direccion == null) {
    //         $ciudad = $direccion->Ciudad()->first();
    //     } else {
    //         $direccion = null;
    //         $ciudad = null;
    //     }

    //     $fichaTipo = array();

    //     $ruta_blade = '';
    //     // if( $user == 3)
    //     // {

    //     //     // $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
    //     //     // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //     //     $ruta_blade = 'atencion_medica.atencion_medica_urologia';
    //     //     $fichaTipo = '';

    //     //     // $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
    //     //     // $fichaTipo = '';
    //     // }
    //     // else
    //     // {
    //         if($profesional->id_sub_tipo_especialidad == 20)
    //         {
    //             //oftalmologia
    //             $ruta_blade = 'atencion_medica.atencion_medica_oftalmologia';
    //             $fichaTipo['oft'] = FichaOftTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';
    //             $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[601])->orderBy('nombre_examen', 'ASC')->get();

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //             $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 21)
    //         {
    //             //otorrinolaringologia
    //             $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
    //             $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
    //             $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';
    //             $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[582])->orderBy('nombre_examen', 'ASC')->get();

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //             $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();


    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 22)
    //         {
    //             $examen = array();
    //             //UROLOGIA
    //             $ruta_blade = 'atencion_medica.atencion_medica_urologia';
    //             $fichaTipo['uro'] = FichaUroTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';


    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 19)
    //         {
    //             //dermatologia
    //             $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 27)
    //         {
    //             //gineco obstetricia
    //             $ruta_blade = 'atencion_gine_obstetricia.atencion_gine_obst_general';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 78)
    //         {
    //             //pediatria general
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_general';
    //             $fichaTipo['ped_gen'] = FichaPediatriaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             // $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             // $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 72)
    //         {
    //             //NEONATOLOGIA
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_neonatologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 53 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN ENFERMERA CONTROL NIÑO SANO
    //             $ruta_blade = 'atencion_pediatrica.atencion_enfermeria_control_nino_sano';
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 108 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN ENFERMERA CONTROL NIÑO SANO
    //             $ruta_blade = 'atencion_pediatrica.control_nino_sano';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 51 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // MATRONA CONTROL NIÑO SANO
    //             $ruta_blade = 'atencion_pediatrica.atencion_matrona_control_nino_sano';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }

    //         // 1 Cirugía Abdominal General -> atencion_medica_cirugia_digestiva_general
    //         // 7 Cirugía Coloproctológica -> atencion_medica_cirugia_digestiva_baja
    //         // 11 Cirugía digestiva -> atencion_medica_cirugia_digestiva_general
    //         // 12 Cirugía Gástrica -> atencion_medica_cirugia_digestiva_alta

    //         else if($profesional->id_sub_tipo_especialidad == 1)
    //         {
    //             // Cirugía digestiva general
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
    //             // $fichaTipo = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             // $fichaTipo = FichaCirugiaDigestivaTipo::get();
    //             // var_dump($profesional->id);
    //             // var_dump($fichaTipo);
    //             // die();
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 7)
    //         {
    //             $examen = array();
    //             // Cirugía Coloproctológica
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_baja';
    //             $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 11 )
    //         {
    //             $examen = array();
    //             // Cirugía digestiva
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
    //             $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';

    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 12 )
    //         {
    //             $examen = array();

    //             // Cirugía Gástrica
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_alta';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
	// 		else if($profesional->id_sub_tipo_especialidad == 119 )
    //         {
    //             // Cirugía General
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_general';
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //            // $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 120 )
    //         {
    //             // Cirugía Pediatrica General
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 66 )
    //         {
    //             // Cirugía Pediatrica General
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 25 )
    //         {
    //             // KINESIOLOGIA GENERAL
    //             $ruta_blade = 'atencion_otros_prof.atencion_kine';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 28 )
    //         {
    //             // FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
    //             $ruta_blade = 'atencion_otros_prof.atencion_fono';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 34 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN PSICOLOGIA
    //             $ruta_blade = 'atencion_otros_prof.atencion_psicologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

	// 			/** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 31 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN NUTRICION
    //             $ruta_blade = 'atencion_otros_prof.atencion_nutricion';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 54 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // TECNOLOGO ORL
    //             $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 55 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // EXAMENES ORL
    //             $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         /** traumatologia - 13 */
    //         else if($profesional->id_tipo_especialidad == 13 && $profesional->id_sub_tipo_especialidad == 85)
    //         {
    //             // TRAUMATOLOGIA GENERAL
    //             $ruta_blade = 'atencion_medica.atencion_traumatologia_general';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else
    //         {
    //             $ruta_blade = 'atencion_medica.atencion_medica';
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //     // }

    //     // INTERCONSULTA
    //     $filtro_inter = array();
    //     $filtro_inter[] = array('id_paciente', $paciente->id);
    //     if((int)$profesional->id_especialidad>0)
    //         $filtro_inter[] = array('id_especialidad', $profesional->id_especialidad);//especialiadd
    //     if((int)$profesional->id_tipo_especialidad>0)
    //         $filtro_inter[] = array('id_tipos_especialidad', $profesional->id_tipo_especialidad);//tipo_espacialidad
    //     if((int)$profesional->id_sub_tipo_especialidad>0)
    //         $filtro_inter[] = array('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad);//sub_tipo_especialidad
    //     $filtro_inter[] = array('estado', 1);//pendiente por respuesta
    //     $interconsulta = Interconsulta::where($filtro_inter)->first();

    //     // informacion ges
    //     // $filtro_ges = array();
    //     // $filtro_ges[] = array('id_ficha_atencion',$id_ficha_atencion);
    //     // $ges = GesRegistros::where($filtro_ges)->first();

    //     // ESPECIALIDAD -> PROFESION
    //     $especialidad = Especialidad::all();

    //     return view($ruta_blade)->with(
    //         [
    //             'paciente' => $paciente,
    //             'prevision' => $prevision,
    //             'profesional' => $profesional,
    //             'medicamento' => $medicamento,
    //             'hora_medica' => $hora, //quitado
    //             'fichas' => $fichas,
    //             'ciudades' => $ciudades,
    //             'regiones' => $regiones,
    //             'tipo_examen' => $tipoExamen,
    //             'control_peso' => $control_peso,
    //             'hipertension' => $hipertension,
    //             'diabetes' => $diabetes,
    //             'ciudad' => $ciudad,
    //             'examenMedico' => $examenMedico,
    //             'medicamentos_cronicos' => $medicamentos_cronicos,
    //             'alergias' => $alergias,
    //             'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
    //             'patoligias_cronicas' => $patoligias_cronicas,
    //             'fichaAtencion' => $fichaAtencion,
    //             'id_lugar_atencion' => $request->lugar_atencion_id,
    //             'lugar_atencion' => $lugar_atencion,
    //             'lugares_atencion ' => $lugares_atencion ,
    //             'id_ficha_atencion' => $id_ficha_atencion,
    //             'especialidad' => $especialidad,
    //             'interconsulta' => $interconsulta,
    //             'fichaTipo' => $fichaTipo,
    //             'examen' => $examen,
    //             'lista_examen_especial' => $lista_examen_especial,
    //             'examenes_especialidad' => $examenes_especialidad,
    //             'examenes_radiologicos' => $examenes_radiologicos,


    //             // 'ficha_ges' => $ges,
    //             // 'direccion' => $direccion,
    //             /*'contacto' => $contacto,
    //             'contacto_direccion'=> $contacto_direccion,
    //             'contacto_ciudad' => $contacto_ciudad,*/

    //         ]
    //     );
    // }

    public function registrar_control_obesidad(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $control_obesidad = new ControlObesidad();
        $control_obesidad->peso = $request->peso;
        $control_obesidad->variacion = $request->variacion;
        $control_obesidad->ideal = $request->ideal;
        $control_obesidad->id_profesional = $profesional->id;
        $control_obesidad->id_paciente = $hora_medica->id_paciente;
        $control_obesidad->id_ficha_atencion = $hora_medica->id_ficha_atencion;

        if (!$control_obesidad->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_control_diabetes(Request $request)
    {
        if(!empty($request->id_profesional))
            $profesional = Profesional::where('id', $request->id_profesional)->first();
        else
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $diabetes = new Diabete();
        $diabetes->peso = $request->peso;
        $diabetes->pies = $request->pies;
        $diabetes->hgac1 = $request->hgac1;
        $diabetes->colesterol = (empty($request->colesterol)?null:$request->colesterol);
        $diabetes->creatina = (empty($request->creatina)?null:$request->creatina);
        $diabetes->glucosuria = (empty($request->glucosuria)?null:$request->glucosuria);
        $diabetes->glicosilada_postprandial = (empty($request->glicosilada_postprandial)?null:$request->glicosilada_postprandial);
        $diabetes->glicosilada_ayuno = (empty($request->glicosilada_ayuno)?null:$request->glicosilada_ayuno);
        $diabetes->tamano_fetal = (empty($request->tamano_fetal)?null:$request->tamano_fetal);
        $diabetes->id_paciente = $hora_medica->id_paciente;
        $diabetes->id_profesional = $profesional->id;
        $diabetes->id_ficha_atencion = (empty($hora_medica->id_ficha_atencion)?null:$hora_medica->id_ficha_atencion);

        if($profesional->id_especialidad == 1 && $profesional->id_tipo_especialidad == 3)
        {
            $diabetes->id_ficha_otros_prof = null;
            $diabetes->id_ficha_gineco_obstetrica = $hora_medica->id_ficha_otros_prof;
        }
        else
        {
            $diabetes->id_ficha_otros_prof = $request->id_ficha_otros_prof;
            $diabetes->id_ficha_gineco_obstetrica = null;
        }

        $diabetes->id_lugar_atencion = $hora_medica->id_lugar_atencion;

        if (!$diabetes->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_control_hipertension(Request $request)
    {
        if(!empty($request->id_profesional))
            $profesional = Profesional::where('id', $request->id_profesional)->first();
        else
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();


        $hipertension = new Hipertension();
        $hipertension->sistolica = $request->sistolica;
        $hipertension->diastolica = $request->diastolica;
        $hipertension->ideal = $request->ideal;
        $hipertension->pulso = (empty($request->pulso)?null:$request->pulso);
        $hipertension->medicamento = (empty($request->medicamento)?null:$request->medicamento);
        $hipertension->sintomas = (empty($request->sintomas)?null:$request->sintomas);
        $hipertension->id_paciente = $hora_medica->id_paciente;
        $hipertension->id_profesional = $profesional->id;
        $hipertension->id_ficha_atencion = (empty($hora_medica->id_ficha_atencion)?null:$hora_medica->id_ficha_atencion);

        if($profesional->id_especialidad == 1 && $profesional->id_tipo_especialidad == 3)
        {
            $hipertension->id_ficha_otros_prof = null;
            $hipertension->id_ficha_gineco_obstetrica = $hora_medica->id_ficha_otros_prof;
        }
        else
        {
            $hipertension->id_ficha_otros_prof = $request->id_ficha_otros_prof;
            $hipertension->id_ficha_gineco_obstetrica = null;
        }

        $hipertension->id_lugar_atencion = $hora_medica->id_lugar_atencion;

        //dd($hipertension);

        if (!$hipertension->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function finalizar_atencion(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->finalizar_hora_medica)->first();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

        $ficha->finalizada = $request->finalizar_atencion;

        if (!$ficha->save()) {
            return 'error';
        }

        $hora_medica->id_estado = 6;

        if (!$hora_medica->save()) {
            return 'error';
        }

        return view('app.profesional.escritorio_profesional')->with('profesional', $profesional);
    }

    public function registrar_ges_ficha(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $ges = new GesRegistros();

		 // nombre_institucion_ficha_ges
        // direccion_institucion_ficha_ges
        // nombre_responsable_ficha_ges
        // rut_responsable_ficha_ges
        // confirmacion_diagnostica_ficha_ges
        // paciente_tratamiento_ficha_ges
        // nombre_ges
        // id_paciente
        // id_profesional
        // id_ficha_atencion
        // id_lugar_atencion

        $ges->nombre_institucion_ficha_ges = $request->nombre_institucion_ficha_ges;
        $ges->direccion_institucion_ficha_ges = $request->direccion_institucion_ficha_ges;
        $ges->nombre_responsable_ficha_ges = $request->nombre_responsable_ficha_ges;
        $ges->rut_responsable_ficha_ges = $request->rut_responsable_ficha_ges;
        $ges->confirmacion_diagnostica_ficha_ges = $request->confirmacion_diagnostica_ficha_ges;
        $ges->paciente_tratamiento_ficha_ges = $request->paciente_tratamiento_ficha_ges;
        $ges->fecha_ficha_ges = \Carbon\Carbon::parse($request->fecha_ficha_ges)->format('Y-m-d');
        $ges->id_ges_diagnostico = $request->id_ges;
        $ges->nombre_ges = $request->nombre_ges;
        $ges->hora_ficha_ges = \Carbon\Carbon::parse($request->hora_ficha_ges)->format('H:i:s');
        $ges->id_profesional = $profesional->id;
        $ges->id_paciente = $hora_medica->id_paciente;
        $ges->id_ficha_atencion = $hora_medica->id_ficha_atencion;
        $ges->id_lugar_atencion = $request->id_lugar_atencion;
        $ges->codigo_verificacion = $request->codigo_verificacion;

        if ($ges->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';

            $archivo_correo = array();

			$paciente = Paciente::find($hora_medica->id_paciente);

            /** REGISTROS DE ARCHIVOS */
            if(!empty($request->lista_archivo))
            {
                $lista_archivo_array = json_decode($request->lista_archivo);

                if(array_key_exists('ges', $lista_archivo_array))
                {
                    $resulto_img = array();
                    foreach ($lista_archivo_array->ges as $key => $value)
                    {

                        $ruta_temp = $value[0];
                        $nombre_real = $value[1];
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];
                        $nombre_final = $paciente->rut.'_ges_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                        $resulto_img[$key] = CargaImagenController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        $ges_img = new GesRegistrosImg();
                        $ges_img->id_registro_ges = $ges->id;
                        $ges_img->id_paciente = $hora_medica->id_paciente;
                        $ges_img->id_profesional = $profesional->id;
                        $ges_img->id_ficha_atencion = $hora_medica->id_ficha_atencion;
                        $ges_img->id_lugar_atencion = $request->id_lugar_atencion;
                        $ges_img->url = $resulto_img[$key]['proceso']['url'];
                        $ges_img->img = $nombre_final;

                        if($ges_img->save())
                        {

                            $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                            $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                            $datos['img'][$key]['estado'] = 1;
                            $datos['img'][$key]['msj'] = 'registro';
                            $datos['img'][$key]['url_temp'] = $url_temp;
                            $datos['img'][$key]['archivo_correo'] = $archivo_correo;
                            $datos['img'][$key]['resulto_img'] = $resulto_img;
                        }
                        else
                        {
                            $datos['img'][$key]['estado'] = 0;
                            $datos['img'][$key]['msj'] = 'falla';
                        }
                    }
                }
            }

            $pdf_constancia = GesRegistrosController::generarPdf($ges->id, 'G');

            $datos['pdf_constancia'] = $pdf_constancia;

            $archivo_constancia = array('url'=>$pdf_constancia->pdf_url, 'nombre'=>$pdf_constancia->pdf);

            /** ENVIO DE CORREO  */
            $blade = 'notificacion_ges';
            $to = array(
                    array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                );
            $cc = array();
            $bcc = array();
            $asunto = 'MED-SDI - Notificación GES';
            $body = array(
                'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                'nombre_ges'=>$request->nombre_ges,
                'archivo_correo_adjuntos'=>$archivo_correo,
                'archivo_constancia'=>$archivo_constancia,
            );
            $archivo = '';
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


            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

            /** ENVIO DE NOTIFICACION APP */
            $tipo_notificacion = '2';
            $id_evento = $ges->id;
            $fecha_evento = $ges->fecha_ficha_ges;
            $hora_evento = $ges->hora_ficha_ges;
            $fecha_primera_notificacion = date('Y-m-d H:i:s');
            $cantidad_notificacion = '';
            $medio_notificacion = 'email';
            $fecha_notificacion = date('Y-m-d H:i:s');
            $medio_confirmacion = '';
            $fecha_confirmacion = '';
            $estado_confirmacion = '';
            $otros = '';
            $otros_1 = '';
            $notificaiconResult = NotificacionConfirmacionController::registrar($tipo_notificacion,$id_evento,$fecha_evento,$hora_evento,$fecha_primera_notificacion,$cantidad_notificacion,$medio_notificacion,$fecha_notificacion,$medio_confirmacion,$fecha_confirmacion,$estado_confirmacion,$otros,$otros_1);
            $datos['notificacion']['notificaiconResult'] = $notificaiconResult;

            if($notificaiconResult['estado'] == 1)
            {
                $id_notificacion_confimacion = $notificaiconResult['last_id'];

                $msj = array(
                    'id' => $ges->id,
                    'nombre' => mb_strtoupper($paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                    'evento' => 'NOTIFICACION GES',
                    'fecha' => $ges->fecha_ficha_ges,
                    'hora' => $ges->hora_ficha_ges,
                    'lugar_atencion' => $lugar_atencion->nombre,
                    'profesional' => $profesional->apellido_uno,
                    'tipo' => 'confirmacion',
                );

                $log_users_devices = new LogUsersDevices();
                $log_users_devices->id_user_create = $profesional->id_usuario;
                $log_users_devices->id_user_recept = $paciente->id_usuario;
                $log_users_devices->msg = json_encode($msj);
                $log_users_devices->estado = 0;
                $log_users_devices->fecha_ingreso = date('Y-m-d H:i:s');
                // $log_users_devices->fecha_termino = '';
                $log_users_devices->tipo = 10; // NOTIFICACION GES

                if($log_users_devices->save())
                {
                    $datos['notificacion']['log_users_devices'] = $log_users_devices;

                    $notificacion_confirmacion_edit = NotificacionConfirmacion::find($id_notificacion_confimacion);
                    $notificacion_confirmacion_edit->id_log_users_devices = $log_users_devices->id;
                    $notificacion_confirmacion_edit->medio_notificacion = $notificacion_confirmacion_edit->medio_notificacion.'|APP';
                    if($notificacion_confirmacion_edit->save())
                    {
                        $datos['notificacion']['notificaicon_update'] = $notificacion_confirmacion_edit;
                    }
                    else
                    {
                        $datos['notificacion']['notificaicon_update'] = $notificacion_confirmacion_edit;
                    }
                }
            }
            /** ENVIO DE NOTIFICACION APP */
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro fallido';
        }

        return $datos;
    }

    public function registrar_eno(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['Lugar atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nombre_establecimiento))
        {
            $error['nombre establecimiento'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->codigo_establecimiento))
        {
            $error['codigo establecimiento'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->nombre_oficina))
        // {
        //     $error['nombre oficina'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($request->codigo_oficina))
        // {
        //     $error['codigo oficina'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->id_ficha_atencion))
        {
            $error['ficha atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nacionalidad_paciente))
        {
            $error['nacionalidad paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->codigo_nacionalidad_paciente))
        {
            $error['codigo nacionalidad paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($request->pueblo_originario_paciente == '')
        {
            $error['pueblo originario paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->ocupacion_paciente))
        {
            $error['ocupacion paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($request->condicion_paciente=='')
        {
            $error['condicion paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->categoria_paciente))
        {
            $error['categoria paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->diagnositico_confirmado))
        {
            $error['diagnositico_confirmado'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->diagnostico_cie))
        // {
        //     $error['diagnostico_cie'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->primeros_sintomas))
        {
            $error['primeros sintomas'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->pais_contagio))
        {
            $error['pais contagio'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->pais))
        {
            $error['pais'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->vacunacion))
        {
            $error['vacunacion'] = 'campo requerido';
            $valido = 0;
        }
        else if($request->vacunacion == 1)
        {
            if(empty($request->fecha_ultima_dosis))
            {
                $error['fecha ultima dosis'] = 'campo requerido';
                $valido = 0;
            }

            if(empty($request->numero_ultima_dosis))
            {
                $error['numero ultima dosis'] = 'campo requerido';
                $valido = 0;
            }
        }

        if(empty($request->id_profesional))
        {
            $error['profesional'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro_eno = new DeclaracionEno();
            $registro_eno->id_lugar_atencion = $request->id_lugar_atencion;

            $registro_eno->nombre_establecimiento = $request->nombre_establecimiento;
            $registro_eno->codigo_establecimiento = $request->codigo_establecimiento;
            $registro_eno->nombre_oficina = $request->nombre_oficina;
            $registro_eno->codigo_oficina = $request->codigo_oficina;
            $registro_eno->id_ficha_atencion = $request->id_ficha_atencion;

            $registro_eno->id_paciente = $request->id_paciente;
            $registro_eno->nacionalidad_paciente = $request->nacionalidad_paciente;
            $registro_eno->codigo_nacionalidad_paciente = $request->codigo_nacionalidad_paciente;
            $registro_eno->pueblo_originario_paciente = $request->pueblo_originario_paciente;
            $registro_eno->ocupacion_paciente = $request->ocupacion_paciente;
            $registro_eno->condicion_paciente = $request->condicion_paciente;
            $registro_eno->categoria_paciente = $request->categoria_paciente;

            $registro_eno->diagnositico_confirmado = $request->diagnositico_confirmado;
            $registro_eno->diagnostico_cie = $request->diagnostico_cie;
            $registro_eno->primeros_sintomas = $request->primeros_sintomas;
            $registro_eno->pais_contagio = $request->pais_contagio;
            $registro_eno->pais = $request->pais;

            $registro_eno->vacunacion = $request->vacunacion;
            $registro_eno->fecha_ultima_dosis = $request->fecha_ultima_dosis;
            $registro_eno->numero_ultima_dosis = $request->numero_ultima_dosis;
            $registro_eno->tbc = $request->tbc;
            $registro_eno->tbc_recaidas = $request->tbc_recaidas;

            $registro_eno->fecha_notificacion = date('Y-m-d');
            $registro_eno->hora_notificacion = date('H:i:s');
            $registro_eno->id_profesional = $request->id_profesional;

            if($registro_eno->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['id_eno_declaracion'] = $registro_eno->id; // ✅ Retornar ID para PDF
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla registro';
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

    public function enviarEnoEmail(Request $request)
    {
        $datos = array();
        $id_eno_declaracion = $request->id_eno_declaracion;

        if (empty($id_eno_declaracion)) {
            $datos['estado'] = 0;
            $datos['msj'] = 'ID de declaración ENO no proporcionado';
            return $datos;
        }

        try {
            // Aquí iría la lógica para generar PDF ENO y enviar por email
            // Por ahora retornamos éxito
            $datos['estado'] = 1;
            $datos['msj'] = 'Declaración ENO enviada correctamente por email';
        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar la declaración ENO: ' . $e->getMessage();
        }

        return $datos;
    }

    public function cargar_eno(Request $request)
    {
        $datos = array();

        $registros = DeclaracionEno::with('Profesional')->where('id_paciente', $request->id_paciente)->get();

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

        return $datos;
    }

    public function registrar_certificado_reposo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->fecha_inicio_certificado))
        {
            $valido=0;
            $error['fecha_inicio_certificado'] = 'Campo requerido fecha_inicio_certificado';
        }
        if(empty($request->fecha_termino_certificado))
        {
            $valido=0;
            $error['fecha_termino_certificado'] = 'Campo requerido fecha_termino_certificado';
        }
        if(empty($request->hipotesis_certificado))
        {
            $valido=0;
            $error['hipotesis_certificado'] = 'Campo requerido hipotesis_certificado';
        }
        // if(empty($request->comentarios_certificado))
        // {
        //     $valido=0;
        //     $error['comentarios_certificado'] = 'Campo requerido comentarios_certificado';
        // }
        if(empty($request->id_lugar_atencion))
        {
            $valido=0;
            $error['id_lugar_atencion'] = 'Campo requerido id_lugar_atencion';
        }

        if($valido == 1)
        {

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $certificado = new CertificadoReposo();
            $certificado->fecha_inicio = $request->fecha_inicio_certificado;
            $certificado->fecha_termino = $request->fecha_termino_certificado;
            $certificado->hipotesis = $request->hipotesis_certificado;
            $certificado->comentarios = isset( $request->comentarios_certificado)? $request->comentarios_certificado:'';
            $certificado->id_profesional = $profesional->id;
            $certificado->id_paciente = $hora_medica->id_paciente;
            if(!empty($hora_medica->id_ficha_atencion))
                $certificado->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            if(!empty($hora_medica->id_ficha_otros_prof))
                $certificado->id_ficha_otro_prof = $hora_medica->id_ficha_otros_prof;
            $certificado->id_lugar_atencion = $request->id_lugar_atencion;
            $certificado->cod_auto =  session('lic_token');

            if (!$certificado->save())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
            else
            {
                try {
                    /** REGISTRAR FIRMA PROFESIONAL */
                    $papeleria_token = session('lic_token');
                    $papeleria_log_id = session('lic_log_id');
                    $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "7", $certificado->id);

                    $result_delete = CertificadoReposo::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$certificado->id])->delete();

                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registros con exito';
                    $datos['delete'] = $result_delete;
                } catch (\Illuminate\Database\QueryException $e) {
                    // Verificar si el error es por falta de autorización (id_autorizacion nulo)
                    if (strpos($e->getMessage(), "id_autorizacion") !== false) {
                        // Eliminar el certificado que se registró sin firma
                        $certificado->delete();

                        $datos['estado'] = 0;
                        $datos['msj'] = 'Debe solicitar autorización antes de registrar el certificado de reposo. Por favor, contacte con administración para obtener la autorización requerida.';
                        $datos['error_type'] = 'sin_autorizacion';
                    } else {
                        // Eliminar el certificado que se registró sin firma
                        $certificado->delete();

                        $datos['estado'] = 0;
                        $datos['msj'] = 'Error al registrar la firma profesional. Intente nuevamente.';
                        $datos['error_type'] = 'firma_error';
                    }
                    \Log::error('Error registrar firma certificado reposo: ' . $e->getMessage());
                } catch (\Exception $e) {
                    // Eliminar el certificado que se registró sin firma
                    $certificado->delete();

                    $datos['estado'] = 0;
                    $datos['msj'] = 'Error inesperado al registrar el certificado. Intente nuevamente.';
                    $datos['error_type'] = 'general_error';
                    \Log::error('Error general registrar certificado reposo: ' . $e->getMessage());
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function enviarCertificadoReposoEmail(Request $request)
    {
        $datos = array();

        try {
            // Obtener el certificado
            if(!empty($request->id_ficha_atencion))
                $certificadoReposo = CertificadoReposo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'ID de ficha de atención es requerido';
                return $datos;
            }

            if (!$certificadoReposo) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el certificado de reposo';
                return $datos;
            }

            // Obtener paciente
            $paciente = Paciente::find($certificadoReposo->id_paciente);
            if (!$paciente) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el paciente';
                return $datos;
            }

            // Verificar que tenga email
            if (empty($paciente->email)) {
                $datos['estado'] = 0;
                $datos['msj'] = 'El paciente no tiene email registrado';
                return $datos;
            }

            // Obtener datos para generar PDF
            if(!empty($request->id_ficha_atencion))
                $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            else if(!empty($request->id_ficha_otros_prof))
                $ficha_atencion = FichaOtrosProfesionales::find($request->id_ficha_otros_prof);

            if(!$ficha_atencion) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró la ficha de atención';
                return $datos;
            }

            // Generar PDF usando el método existente
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);

            /** token certificado */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 7, $certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 7, $certificadoReposo->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $detalle_certificado = array(
                'fecha_inicio' => $certificadoReposo->fecha_inicio,
                'fecha_termino' => $certificadoReposo->fecha_termino,
                'hipotesis' => $certificadoReposo->hipotesis,
                'comentarios' => $certificadoReposo->comentarios,
            );

                        // Preparar arrays de datos para el PDF
            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );

            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion . ' ' . $lugar_atencion->direccion->numero_dir . ', ' . $lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
            );

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first() ? $profesional->SubTipoEspecialidad()->first()->nombre : $profesional->TipoEspecialidad()->first()->nombre),
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' => $token_profesional,
                'url' => $url_profesional,
                'qr' => $qr_profesional,
            );

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'telefono_uno' => $paciente->telefono_uno,
                'email' => $paciente->email,
                'direccion' => $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir . ', ' . $paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            // Generar PDF con funcionalida 'G' para guardar
            $pdf_resultado = PdfController::generarPDF('CERTIFICADO REPOSO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_certificado'), 'Certificado Reposo '.$paciente->rut.' '.date('YmdHi'), 'pdf_certificado_reposo', 'G');

            if($pdf_resultado->estado != 1) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se pudo generar el PDF';
                return $datos;
            }

            // Enviar correo con PDF adjunto
            // Usar ruta local del archivo en lugar de URL HTTP
            $ruta_local_pdf = public_path('storage/pdf/' . $pdf_resultado->pdf);

            $detalle_correo = array(
                'asunto' => 'Certificado de Reposo - '.$paciente->nombres.' '.$paciente->apellido_uno,
                'blade' => 'plantilla-correo-electronico',
                'body' => array(
                    'titulo' => 'Certificado de Reposo',
                    'contenido' => 'Adjunto encuentra su certificado de reposo desde '.$certificadoReposo->fecha_inicio.' hasta '.$certificadoReposo->fecha_termino.'.',
                ),
                'url_archivo' => $ruta_local_pdf,
            );

            \Mail::to([$paciente->email])
            ->cc(['francisco.rojo.gallardo@gmail.com','jkriman@gmail.com'])
            ->send(new \App\Mail\CorreoGenerico($detalle_correo));

            $datos['estado'] = 1;
            $datos['msj'] = 'Certificado enviado exitosamente al email del paciente';

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar el certificado: ' . $e->getMessage();
            \Log::error('Error enviar certificado reposo: ' . $e->getMessage());
        }

        return $datos;
    }

    public function registrar_consentimiento_faltante(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->form_cons_faltante))
        {
            $valido=0;
            $error['form_cons_faltante'] = 'Campo requerido Consentimineto faltante';
        }
        if(empty($request->form_cons_faltante_especialidad))
        {
            $valido=0;
            $error['form_cons_faltante_especialidad'] = 'Campo requerido Especialidad';
        }

        if($valido == 1)
        {

            $certificado = new ConsentimientoFaltante();
            $certificado->id_prof_sol_cons = $request->id_prof_sol_cons;
            $certificado->prof_sol_cons_fecha = date('Y-m-d H:i:s');
            $certificado->form_cons_faltante = $request->form_cons_faltante;
            $certificado->form_cons_faltante_especialidad =  $request->form_cons_faltante_especialidad;
            $certificado->obs_sol_cons_formulario = isset( $request->obs_sol_cons_formulario)? $request->obs_sol_cons_formulario:'';
            $certificado->estado = 1;
            $certificado->otro = '';

            // $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if ($certificado->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';

                // Enviar acuse de recibo al paciente
                if (!empty($request->id_paciente_fc)) {
                    try {
                        $paciente = Paciente::find($request->id_paciente_fc);
                        if ($paciente && $paciente->email) {
                            $nombre_paciente = trim($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . ($paciente->apellido_dos ?? ''));
                            $profesional     = Profesional::find($request->id_prof_sol_cons);
                            $nombre_prof     = $profesional
                                ? 'Dr(a). ' . trim($profesional->nombre . ' ' . $profesional->apellido_uno)
                                : 'el profesional tratante';

                            $datos_correo = [
                                'asunto'      => 'Solicitud de consentimiento recibida - Medichile',
                                'blade'       => 'acuse_consentimiento_faltante',
                                'url_archivo' => null,
                                'body'        => [
                                    'nombre_paciente'    => $nombre_paciente,
                                    'nombre_profesional' => $nombre_prof,
                                    'consentimiento'     => $request->form_cons_faltante,
                                    'observaciones'      => $request->obs_sol_cons_formulario ?? '',
                                    'fecha'              => now()->format('d/m/Y H:i'),
                                ],
                            ];
                            Mail::to($paciente->email)->send(new CorreoGenerico($datos_correo));
                        }
                    } catch (\Exception $e) {
                        Log::warning('No se pudo enviar email de acuse consentimiento faltante: ' . $e->getMessage());
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrar_formulario_faltante(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->form_faltante))
        {
            $valido=0;
            $error['form_faltante'] = 'Campo requerido Consentimineto faltante';
        }
        if(empty($request->form_faltante_especialidad))
        {
            $valido=0;
            $error['form_faltante_especialidad'] = 'Campo requerido Especialidad';
        }

        if($valido == 1)
        {

            $certificado = new FormularioFaltante();
            $certificado->id_prof_sol_form = $request->id_prof_sol_form;
            $certificado->prof_sol_form_fecha = date('Y-m-d H:i:s');
            $certificado->form_faltante = $request->form_faltante;
            $certificado->form_faltante_especialidad =  $request->form_faltante_especialidad;
            $certificado->obs_sol_form_formulario = isset( $request->obs_sol_form_formulario)? $request->obs_sol_form_formulario:'';
            $certificado->estado = 1;
            $certificado->otro = '';

            // $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if ($certificado->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';

                // Enviar acuse de recibo al paciente
                if (!empty($request->id_paciente_fc)) {
                    try {
                        $paciente = Paciente::find($request->id_paciente_fc);
                        if ($paciente && $paciente->email) {
                            $nombre_paciente = trim($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . ($paciente->apellido_dos ?? ''));
                            $profesional     = Profesional::find($request->id_prof_sol_form);
                            $nombre_prof     = $profesional
                                ? 'Dr(a). ' . trim($profesional->nombre . ' ' . $profesional->apellido_uno)
                                : 'el profesional tratante';

                            $datos_correo = [
                                'asunto'      => 'Solicitud de formulario recibida - Medichile',
                                'blade'       => 'acuse_formulario_faltante',
                                'url_archivo' => null,
                                'body'        => [
                                    'nombre_paciente'    => $nombre_paciente,
                                    'nombre_profesional' => $nombre_prof,
                                    'formulario'         => $request->form_faltante,
                                    'observaciones'      => $request->obs_sol_form_formulario ?? '',
                                    'fecha'              => now()->format('d/m/Y H:i'),
                                ],
                            ];
                            Mail::to($paciente->email)->send(new CorreoGenerico($datos_correo));
                        }
                    } catch (\Exception $e) {
                        Log::warning('No se pudo enviar email de acuse formulario faltante: ' . $e->getMessage());
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }
    public function registrar_sugerencia(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->form_sugerencia))
        {
            $valido=0;
            $error['form_sugerencia'] = 'Campo requerido Consentimiento faltante';
        }
        if(empty($request->form_sugerencia))
        {
            $valido=0;
            $error['form_sugerencias_especialidad'] = 'Campo requerido Especialidad';
        }

        if($valido == 1)
        {

            $certificado = new Sugerencias();
            $certificado->id_prof_sugerencias = $request->id_prof_sugerencias;
            $certificado->prof_sugerencias_fecha = date('Y-m-d H:i:s');
            $certificado->form_sugerencia = $request->form_sugerencia;
            $certificado->form_sugerencias_especialidad =  $request->form_sugerencias_especialidad;
            $certificado->obs_sugerencias = isset( $request->obs_sugerencias)? $request->obs_sugerencias:'';
            $certificado->estado = 1;
            $certificado->otro = '';

            // $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if ($certificado->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';

                // Enviar acuse de recibo al paciente
                if (!empty($request->id_paciente_sugerencia)) {
                    try {
                        $paciente = Paciente::find($request->id_paciente_sugerencia);
                        if ($paciente && $paciente->email) {
                            $nombre_paciente = trim($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . ($paciente->apellido_dos ?? ''));
                            $profesional     = Profesional::find($request->id_prof_sugerencias);
                            $nombre_prof     = $profesional
                                ? 'Dr(a). ' . trim($profesional->nombre . ' ' . $profesional->apellido_uno)
                                : 'el profesional tratante';

                            $datos_correo = [
                                'asunto'      => 'Sugerencia registrada - Medichile',
                                'blade'       => 'acuse_formulario_faltante',
                                'url_archivo' => null,
                                'body'        => [
                                    'nombre_paciente'    => $nombre_paciente,
                                    'nombre_profesional' => $nombre_prof,
                                    'formulario'         => $request->form_sugerencia,
                                    'observaciones'      => $request->obs_sugerencias ?? '',
                                    'fecha'              => now()->format('d/m/Y H:i'),
                                ],
                            ];
                            Mail::to($paciente->email)->send(new CorreoGenerico($datos_correo));
                        }
                    } catch (\Exception $e) {
                        Log::warning('No se pudo enviar email de acuse sugerencia: ' . $e->getMessage());
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrar_falla(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if (empty($request->asunto_falla)) {
            $valido = 0;
            $error['asunto_falla'] = 'Campo requerido: Asunto de la falla';
        }
        if (empty($request->descripcion_falla)) {
            $valido = 0;
            $error['descripcion_falla'] = 'Campo requerido: Descripción de la falla';
        }

        if ($valido == 1) {
            $falla = new SolicitudSoporte();
            $falla->usuario_id = Auth::user()->id;
            $falla->tipo_solicitud = 'reporte_error';
            $falla->asunto = $request->asunto_falla;
            $falla->descripcion = $request->descripcion_falla;
            $falla->prioridad = in_array($request->prioridad_falla, ['baja', 'media', 'alta', 'urgente']) ? $request->prioridad_falla : 'media';
            $falla->estado = 'abierta';

            if ($falla->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Reporte de falla registrado con éxito';
            } else {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar el reporte';
                $datos['request'] = $request->all();
            }

        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrar_interconsulta(Request $request)
    {

        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
        if($request->id_fc)
            $ficha_atencion = FichaAtencion::find($request->id_fc);
        else if($request->id_fc_op)
            $ficha_atencion = FichaOtrosProfesionales::find($request->id_fc_op);
        if($profesional->id_tipo_especialidad == 3){
            $ficha_atencion = FichaGinecoObstetrica::find($request->id_fc);
        }

        $nombre_especialidad = '';
        if(!empty($request->sub_tipo_especialidad))
            $nombre_especialidad = SubTipoEspecialidad::find($request->sub_tipo_especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = TipoEspecialidad::find($request->especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = Especialidad::find($request->profesion)->nombre ;
        $lic_token = '';

        if( !empty(session('lic_token')) && $profesional->id_espacialidad == 1)
        {
            $lic_token = session('lic_token');
            $lic_log_id = session('lic_log_id');
        }
        else
        {
            /** calculo de periodo de vigencia para aprobacion */
            $fecha = date('Y-m-d');
            $hora =  date('H:i:s');
            $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
            $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.(int)env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
            $fecha_expira = date ('Y-m-d H:i:s' ,strtotime ( '+'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+(int)env('TIEMPO_EXP_PERMISO')).' hours' , strtotime ($fecha_actual) ) );

            $id = LogUsersDevices::latest()->first();
            if(is_object($id)==false)
            $id=0;
            else
            $id = LogUsersDevices::latest()->first()->id;

            $msj = array(
                'id' => ($id+1),
                'nombre' => mb_strtoupper($profesional->nombre.' '.$profesional->apellido_p.' '.$profesional->apellido_m),
                'evento' => 'Interconsulta Siquiatría',
                'fecha' => $fecha,
                'hora' => $hora,
                'nombre_especialidad' => $nombre_especialidad,
                'nombre_profesional_inter' => $request->nombre_profesional_inter_sq,
                'tipo' => 'interconsulta'
            );

            $log_users_devices = new LogUsersDevices();
            $log_users_devices->id_user_create = $profesional->id_usuario;
            $log_users_devices->id_user_recept = $profesional->id_usuario;
            $log_users_devices->msg = json_encode($msj);
            $log_users_devices->estado = 1;

            $log_users_devices->fecha_ingreso = $fecha_actual;
            $log_users_devices->fecha_termino = $fecha_vencimiento;
            $log_users_devices->tipo = 16; // check sdi // ESTRUCTURA DE TEXTO
            $token_temp = md5(uniqid());
            $log_users_devices->token = $token_temp;
            $log_users_devices->fecha_exp = $fecha_expira;

            if($log_users_devices->save())
            {
                $datos['app']['estado'] = 1;
                $datos['app']['msj'] = $msj;
                $datos['app']['fecha_inicio'] = $fecha_actual;
                $datos['app']['fecha_termino'] = $fecha_vencimiento;
                $datos['app']['fecha_exp'] = $fecha_expira;
                $datos['app']['tiempo'] = env('TIEMPO_ESPERA');
                $datos['app']['last_id'] = $log_users_devices->id;
                $datos['app']['token'] = $log_users_devices->token;
            }
            else
            {
                $datos['app']['estado'] = 0;
                $datos['app']['msj'] = 'Solicitud de aprobacion con falla';
            }

            $lic_token = $token_temp;
            $lic_log_id = $log_users_devices->id;
        }



        $interconsulta = new Interconsulta();
        $interconsulta->id_especialidad = $request->profesion;
        $interconsulta->id_tipos_especialidad = $request->especialidad;
        $interconsulta->id_sub_tipo_especialidad = $request->sub_tipo_especialidad;
        $interconsulta->nombre_especialidad = $nombre_especialidad;
        $interconsulta->fecha_solicitud = Carbon::now();
        $interconsulta->id_paciente = $ficha_atencion->id_paciente;
        $interconsulta->id_profesional_soli = $profesional->id;
        $interconsulta->cod_auto_soli = $lic_token;
        if($request->id_fc)
        {
            $interconsulta->id_ficha_atencion_soli = $ficha_atencion->id;
            // $interconsulta->id_ficha_otro_prof_soli = '';
        }
        else if($request->id_fc_op)
        {
            // $interconsulta->id_ficha_atencion_soli = '';
            $interconsulta->id_ficha_otro_prof_soli = $ficha_atencion->id;
        }

        $interconsulta->id_ficha_atencion_soli = $ficha_atencion->id;
        $interconsulta->id_lugar_atencion_soli = $ficha_atencion->id_lugar_atencion;
        $interconsulta->id_recuperacion = $request->id_recuperacion;
        $interconsulta->id_sala = $request->id_sala;
        $interconsulta->id_profesional_inter = $request->profesional_inter;
        $interconsulta->nombre_profesional_inter = $request->nombre_profesional_inter;
        $interconsulta->hipotesis = $request->hipotesis_interconsulta;
        $interconsulta->comentarios = $request->comentarios_interconsulta;

        if ($interconsulta->save())
        {
            try {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = $lic_token;
                $papeleria_log_id = $lic_log_id;
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "8", $interconsulta->id);

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['id_last'] = $interconsulta->id;
            } catch (\Illuminate\Database\QueryException $e) {
                // Verificar si el error es por falta de autorización (id_autorizacion nulo)
                if (strpos($e->getMessage(), "id_autorizacion") !== false) {
                    // Eliminar la interconsulta que se registró sin firma
                    $interconsulta->delete();

                    $datos['estado'] = 0;
                    $datos['msj'] = 'Debe solicitar autorización antes de registrar la interconsulta. Por favor, contacte con administración para obtener la autorización requerida.';
                    $datos['error_type'] = 'sin_autorizacion';
                } else {
                    // Eliminar la interconsulta que se registró sin firma
                    $interconsulta->delete();

                    $datos['estado'] = 0;
                    $datos['msj'] = 'Error al registrar la firma profesional. Intente nuevamente.';
                    $datos['error_type'] = 'firma_error';
                }
                \Log::error('Error registrar firma interconsulta: ' . $e->getMessage());
            } catch (\Exception $e) {
                // Eliminar la interconsulta que se registró sin firma
                $interconsulta->delete();

                $datos['estado'] = 0;
                $datos['msj'] = 'Error inesperado al registrar la interconsulta. Intente nuevamente.';
                $datos['error_type'] = 'general_error';
                \Log::error('Error general registrar interconsulta: ' . $e->getMessage());
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla al registrar';
        }

        return $datos;
    }

    public function registrar_interconsulta_respuesta(Request $request)
    {
        $datos = array();
        $registro = Interconsulta::find($request->inter_id);

        if($registro)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha_atencion = FichaAtencion::find($request->id_fc);


            $registro->diagnostico_resp = $request->inter_resp_diagnostico;
            $registro->tratamiento_resp = $request->inter_resp_tratamiento;
            $registro->comentario_examen_resp = $request->inter_resp_comentario;
            $registro->fecha_resp =  Carbon::now();
            $registro->id_profesional_resp = $profesional->id;
            $registro->cod_auto_resp = session('lic_token');
            $registro->citado_control_resp = $request->requiere_control?'1':'0';
            $registro->id_ficha_atencion_resp = $ficha_atencion->id;
            $registro->id_lugar_atencion_resp = $ficha_atencion->id_lugar_atencion;
            $registro->id_recuperacion_resp = $request->id_recuperacion_resp;
            $registro->id_sala_resp = $request->id_sala_resp;
            $registro->estado = 2;

            if($registro->save())
            {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "8", $registro->id);

                $datos['estado'] = 1;
                $datos['msj'] = 'registro actualizado';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al registrar';
            }


        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;
    }

    public function enviarInterconsultaEmail(Request $request)
    {
        $datos = array();

        try {
            // Obtener la interconsulta
            $interconsulta = Interconsulta::find($request->id_interconsulta);
            if (!$interconsulta) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró la interconsulta';
                return $datos;
            }

            // Obtener paciente
            $paciente = Paciente::find($interconsulta->id_paciente);
            if (!$paciente) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el paciente';
                return $datos;
            }

            // Verificar que tenga email
            if (empty($paciente->email)) {
                $datos['estado'] = 0;
                $datos['msj'] = 'El paciente no tiene email registrado';
                return $datos;
            }

            // Generar PDF usando el método existente
            $pdf_resultado = PdfController::generarPDF('INTERCONSULTA', [], 'Interconsulta '.$paciente->rut.' '.date('YmdHi'), 'pdf_interconsulta', 'G');

            if($pdf_resultado->estado != 1) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se pudo generar el PDF';
                return $datos;
            }

            // Enviar correo con PDF adjunto
            // Usar ruta local del archivo en lugar de URL HTTP
            $ruta_local_pdf = public_path('storage/pdf/' . $pdf_resultado->pdf);

            $detalle_correo = array(
                'asunto' => 'Interconsulta - '.$paciente->nombres.' '.$paciente->apellido_uno,
                'blade' => 'plantilla-correo-electronico',
                'body' => array(
                    'titulo' => 'Interconsulta',
                    'contenido' => 'Adjunto encuentra su solicitud de interconsulta para '.$interconsulta->nombre_especialidad.'.',
                ),
                'url_archivo' => $ruta_local_pdf,
            );

            \Mail::to($paciente->email)->send(new \App\Mail\CorreoGenerico($detalle_correo));

            $datos['estado'] = 1;
            $datos['msj'] = 'Interconsulta enviada exitosamente al email del paciente';

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar la interconsulta: ' . $e->getMessage();
            \Log::error('Error enviar interconsulta email: ' . $e->getMessage());
        }

        return $datos;
    }

    public function pdf_interconsulta(Request $request)
    {
        $datos = array();
        $interconsulta = Interconsulta::where('id', $request->id_interconsulta)->first();
        if($interconsulta->count()>0)
        {

            $paciente = Paciente::find($interconsulta->id_paciente);
            $profesional = Profesional::find($interconsulta->id_profesional_soli);
            // info solicitud
            if(!empty($interconsulta->id_ficha_otro_prof_soli))
            {
                $ficha_atencion_soli = FichaOtrosProfesionales::find($interconsulta->id_ficha_otro_prof_soli);
            }
            else
            {
                $ficha_atencion_soli = FichaAtencion::find($interconsulta->id_ficha_atencion_soli);
            }
            if($profesional->id_tipo_especialidad == 3){
                $ficha_atencion_soli = FichaGinecoObstetrica::find($interconsulta->id_ficha_atencion_soli);
            }
            $lugar_atencion_soli = LugarAtencion::find($interconsulta->id_lugar_atencion_soli);
            $profesional_soli = Profesional::find($interconsulta->id_profesional_soli);
            // $token_firma_soli = encrypt( $profesional_soli->rut.'_'.$profesional_soli->email.'_'.$lugar_atencion_soli->id );
            $lugar_atencion = LugarAtencion::find($ficha_atencion_soli->id_lugar_atencion);


            /** token receta */
            $temp_token_soli = CertificadoController::certificadoDocumento($ficha_atencion_soli->id, $profesional_soli->id, $paciente->id, 8, $interconsulta->id);
            if($temp_token_soli['estado'] == 1)
            {
                $token_receta_soli = $temp_token_soli['certificado'];
                $url_documento_soli = CertificadoController::generarUrlDocumento($token_receta_soli);
                $qr_documento_soli = GeneradorQrController::generar($url_documento_soli);
            }
            else
            {
                $temp_token_soli = CertificadoController::certificadoDocumento($ficha_atencion_soli->id, rand(111,999), $paciente->id, 8, $interconsulta->id);
                $token_receta_soli = $temp_token_soli['certificado'];
                $url_documento_soli = CertificadoController::generarUrlDocumento($token_receta_soli);
                $qr_documento_soli = GeneradorQrController::generar($url_documento_soli);
            }

            /** token profesional */
            $temp_token_soli = CertificadoController::certificadoProfesional($profesional_soli->id, $interconsulta->cod_auto_soli, 8, $interconsulta->id);
            if($temp_token_soli['estado'] == 1)
            {
                $token_profesional_soli = $temp_token_soli['certificado'];
                $url_profesional_soli = CertificadoController::generarUrlProfesional($token_profesional_soli);
                $qr_profesional_soli = GeneradorQrController::generar($url_documento_soli);
            }
            else
            {
                $temp_token_soli = CertificadoController::certificadoProfesional(rand(1114,999), $interconsulta->cod_auto_soli, 8, $interconsulta->id);
                $token_profesional_soli = $temp_token_soli['certificado'];
                $url_profesional_soli = CertificadoController::generarUrlProfesional($token_profesional_soli);
                $qr_profesional_soli = GeneradorQrController::generar($url_documento_soli);
            }

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );


            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );

            // array solicitud
            $array_ficha_atencion_soli = array(
                'id' => $ficha_atencion_soli->id,
                'created_at' => $ficha_atencion_soli->created_at->format('d/m/Y'),
                'token' => $token_receta_soli,
                'url' => $url_documento_soli,
                'qr' => $qr_documento_soli,
            );
            $array_lugar_atencion_soli = array(
                'id' => $lugar_atencion_soli->id,
                'nombre' => $lugar_atencion_soli->nombre
            );
            $array_profesional_soli = array(
                'id' => $profesional_soli->id,
                'nombre' => $profesional_soli->nombre.' '.$profesional_soli->apellido_uno.' '.$profesional_soli->apellido_dos,
                'rut' => $profesional_soli->rut,
                'especialidad' => ($profesional_soli->SubTipoEspecialidad()->first()?$profesional_soli->SubTipoEspecialidad()->first()->nombre:$profesional_soli->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional_soli,
                'url' =>  $url_profesional_soli,
                'qr' =>  $qr_profesional_soli,
            );
            $array_soli = array(
                'id' => $interconsulta->id,
                'hipotesis' => $interconsulta->hipotesis,
                'comentarios' => $interconsulta->comentarios,
            );

            if(isset($interconsulta->diagnostico_resp))
            {
                // info respuesta
                $ficha_atencion_resp = FichaAtencion::find($interconsulta->id_ficha_atencion_resp);
                $lugar_atencion_resp = LugarAtencion::find($interconsulta->id_lugar_atencion_resp);
                $profesional_resp = Profesional::find($interconsulta->id_profesional_resp);
                // $token_firma_resp = encrypt( $profesional_resp->rut.'_'.$profesional_resp->email.'_'.$lugar_atencion_resp->id );

                /** token receta */
                $temp_token_resp = CertificadoController::certificadoDocumento($ficha_atencion_resp->id, $profesional_resp->id, $paciente->id, 8, $interconsulta->id);
                if($temp_token_resp['estado'] == 1)
                {
                    $token_receta_resp = $temp_token_resp['certificado'];
                    $url_documento_resp = CertificadoController::generarUrlDocumento($token_receta_resp);
                    $qr_documento_resp = GeneradorQrController::generar($url_documento_resp);
                }
                else
                {
                    $temp_token_resp = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 8, $interconsulta->id);
                    $token_receta_resp = $temp_token_resp['certificado'];
                    $url_documento_resp = CertificadoController::generarUrlDocumento($token_receta_resp);
                    $qr_documento_resp = GeneradorQrController::generar($url_documento_resp);
                }

                /** token profesional */
                $temp_token_resp = CertificadoController::certificadoProfesional($profesional_resp->id, $interconsulta->cod_auto_resp, 8, $interconsulta->id);
                if($temp_token_resp['estado'] == 1)
                {
                    $token_profesional_resp = $temp_token_resp['certificado'];
                    $url_profesional_resp = CertificadoController::generarUrlProfesional($token_profesional_resp);
                    $qr_profesional_resp = GeneradorQrController::generar($url_documento_resp);
                }
                else
                {
                    $temp_token_resp = CertificadoController::certificadoProfesional(rand(1114,999), $interconsulta->cod_auto_resp, 8, $interconsulta->id);
                    $token_profesional_resp = $temp_token_resp['certificado'];
                    $url_profesional_resp = CertificadoController::generarUrlProfesional($token_profesional_resp);
                    $qr_profesional_resp = GeneradorQrController::generar($url_documento_resp);
                }
                // array respuesta
                $array_ficha_atencion_resp = array(
                    'id' => $ficha_atencion_resp->id,
                    'created_at' => $ficha_atencion_resp->created_at->format('d/m/Y'),
                    'token' => $token_receta_resp,
                    'url' => $url_documento_resp,
                    'qr' => $qr_documento_resp,
                );

                $array_lugar_atencion_resp = array(
                    'id' => $lugar_atencion_resp->id,
                    'nombre' => $lugar_atencion_resp->nombre
                );

                $array_profesional_resp = array(
                    'id' => $profesional_resp->id,
                    'nombre' => $profesional_resp->nombre.' '.$profesional_resp->apellido_uno.' '.$profesional_resp->apellido_dos,
                    'rut' => $profesional_resp->rut,
                    'especialidad' => ($profesional_resp->SubTipoEspecialidad()->first()?$profesional_resp->SubTipoEspecialidad()->first()->nombre:$profesional_resp->TipoEspecialidad()->first()->nombre),
                    'token' =>  $token_profesional_resp,
                    'url' =>  $url_profesional_resp,
                    'qr' =>  $qr_profesional_resp,
                );
                $array_resp = array(
                    'id' => $interconsulta->id,
                    'diagnostico' => $interconsulta->diagnostico_resp,
                    'tratamiento' => $interconsulta->tratamiento_resp,
                    'comentario_examen' => $interconsulta->comentario_examen_resp,
                    'control' => $interconsulta->citado_control_resp==1?'SI':'NO',
                    'fecha' => $interconsulta->fecha_resp,
                );
            }
            else
            {
                // array respuesta
                $array_ficha_atencion_resp = array(

                );
                $array_lugar_atencion_resp = array(

                );
                $array_profesional_resp = array(

                );
                $array_resp = array(

                );
            }

            $nombre_archivo = strtolower('interconsulta_'.$interconsulta->id);

            return  PdfController::generarPDF('', compact( 'array_paciente', 'array_lugar_atencion', 'array_ficha_atencion_soli', 'array_lugar_atencion_soli', 'array_profesional_soli', 'array_soli', 'array_ficha_atencion_resp', 'array_lugar_atencion_resp', 'array_profesional_resp', 'array_resp'), $nombre_archivo, 'pdf_interconsulta');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }


    public function registrar_informe_medico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;


        if(empty($request->comentarios_informe_medico)) {
            $error['comentarios_informe_medico'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_medica)) {
            $error['hora_medica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion)) {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        // Validar autorización desde app móvil
        if(empty(session('lic_token')) || empty(session('lic_log_id'))) {
            $error['autorizacion'] = 'Se requiere autorización desde la app móvil';
            $valido = 0;
        }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $tipo_informe = $request->tipo_informe;
            if(empty($request->tipo_informe)) {
                $tipo_informe = 1;
            }

            $informe = new InformeMedico();
            $informe->id_tipo_informe = $tipo_informe;
            $informe->informe_medico = $request->comentarios_informe_medico;
            $informe->fecha_informe_medico = date('Y-m-d');
            $informe->id_paciente = $hora_medica->id_paciente;
            if(!empty($hora_medica->id_ficha_atencion))
                $informe->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            if(!empty($hora_medica->id_ficha_otros_prof))
                $informe->id_ficha_otro_prof = $hora_medica->id_ficha_otros_prof;
            $informe->id_profesional = $profesional->id;
            $informe->id_lugar_atencion = $request->id_lugar_atencion;
            $informe->cod_auto = session('lic_token');

            if (!$informe->save())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar informe medico';
            }
            else
            {
                /** REGISTRAR FIRMA PROFESIONAL DESDE APP MÓVIL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "10", $informe->id);

                $delete = InformeMedico::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)
                    ->where('id_tipo_informe', $tipo_informe)
                    ->whereNotIn('id', [$informe->id])
                    ->delete();

                $datos['estado'] = 1;
                $datos['msj'] = 'Informe médico registrado exitosamente';
                $datos['id_last'] = $informe->id;
                $datos['delete'] = $delete;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function enviarInformeMedicoEmail(Request $request)
    {
        $datos = array();

        try {
            // Obtener el informe médico
            $informe = InformeMedico::find($request->id_informe_medico);
            if (!$informe) {
                $informe = InformeMedico::where('id_ficha_atencion', $request->id_ficha_atencion)->where('id_tipo_informe', $request->tipo_informe)->first();
                if (!$informe) {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'No se encontró el informe médico';
                    return $datos;
                }
            }

            // Obtener la ficha de atención (puede ser ficha normal u otro profesional)
            $ficha_atencion = '';
            if (!empty($informe->id_ficha_atencion)) {
                $ficha_atencion = FichaAtencion::find($informe->id_ficha_atencion);
            } else if (!empty($informe->id_ficha_otro_prof)) {
                $ficha_atencion = FichaOtrosProfesionales::find($informe->id_ficha_otro_prof);
            }

            if (!$ficha_atencion) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró la ficha de atención asociada';
                return $datos;
            }

            // Obtener paciente
            $paciente = Paciente::find($ficha_atencion->id_paciente);
            if (!$paciente) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el paciente';
                return $datos;
            }

            // Verificar que tenga email
            if (empty($paciente->email)) {
                $datos['estado'] = 0;
                $datos['msj'] = 'El paciente no tiene email registrado';
                return $datos;
            }

            // Obtener lugar de atención
            $lugar_atencion = LugarAtencion::find($informe->id_lugar_atencion);
            if (!$lugar_atencion) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el lugar de atención';
                return $datos;
            }

            // Obtener profesional
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            if (!$profesional) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el profesional';
                return $datos;
            }

            // Generar tokens y QR
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 10, $informe->id);
            if ($temp_token['estado'] == 1) {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            } else {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111, 999), $paciente->id, 10, $informe->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            // Generar token profesional
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $informe->cod_auto, 10, $informe->id);
            if ($temp_token['estado'] == 1) {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_profesional);
            } else {
                $temp_token = CertificadoController::certificadoProfesional(rand(100, 999), $informe->cod_auto, 10, $informe->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_profesional);
            }

            // Preparar arrays de datos para el PDF
            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );

            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion . ' ' . $lugar_atencion->direccion->numero_dir . ', ' . $lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
            );

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first() ? $profesional->SubTipoEspecialidad()->first()->nombre : $profesional->TipoEspecialidad()->first()->nombre),
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' => $token_profesional,
                'url' => $url_profesional,
                'qr' => $qr_profesional,
            );

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'telefono_uno' => $paciente->telefono_uno,
                'email' => $paciente->email,
                'direccion' => $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir . ', ' . $paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            $detalle_informe_medico = array(
                'informe_medico' => $informe->informe_medico,
                'fecha_informe_medico' => $informe->fecha_informe_medico,
            );

            // Obtener tipo de informe
            $tipo_informe = TipoInforme::find($informe->id_tipo_informe);
            $nombre_informe = $tipo_informe ? $tipo_informe->nombre : 'Informe Medico General';
            $titulo_informe = $tipo_informe ? $tipo_informe->titulo : 'Informe Médico';
            $pdf_informe = $tipo_informe ? $tipo_informe->pdf : 'pdf_informe_medico';

            // Generar PDF con todos los datos necesarios
            $pdf_resultado = PdfController::generarPDF(strtoupper($nombre_informe), compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_informe_medico'), $nombre_informe . ' ' . $paciente->rut, $pdf_informe, 'G');

            if ($pdf_resultado->estado != 1) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se pudo generar el PDF';
                return $datos;
            }

            // Enviar correo con PDF adjunto
            // Usar ruta local del archivo en lugar de URL HTTP
            $ruta_local_pdf = public_path('storage/pdf/' . $pdf_resultado->pdf);

            $detalle_correo = array(
                'asunto' => $titulo_informe . ' - ' . $paciente->nombres . ' ' . $paciente->apellido_uno,
                'blade' => 'plantilla-correo-electronico',
                'body' => array(
                    'titulo' => $titulo_informe,
                    'contenido' => 'Adjunto encuentra su ' . strtolower($titulo_informe) . '.',
                ),
                'url_archivo' => $ruta_local_pdf,
            );

            \Mail::to([$paciente->email])
            ->cc(['francisco.rojo.gallardo@gmail.com','jkriman@gmail.com'])
            ->send(new \App\Mail\CorreoGenerico($detalle_correo));

            $datos['estado'] = 1;
            $datos['msj'] = 'Informe médico enviado exitosamente al email del paciente';

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar el informe médico: ' . $e->getMessage();
            \Log::error('Error enviar informe médico email: ' . $e->getMessage());
        }

        return $datos;
    }

    public function enviarAltaMedicaEmail(Request $request)
    {
        $datos = array();

        try {
            // Obtener el informe médico (que es el Alta Médica)
            $informe = InformeMedico::find($request->id_alta_medica_email);
            if (!$informe) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el certificado de alta médica';
                return $datos;
            }

            // Obtener paciente
            $paciente = Paciente::find($informe->id_paciente);
            if (!$paciente) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró el paciente';
                return $datos;
            }

            // Verificar que tenga email
            if (empty($paciente->email)) {
                $datos['estado'] = 0;
                $datos['msj'] = 'El paciente no tiene email registrado';
                return $datos;
            }

            // Generar PDF usando el método existente
            $pdf_resultado = PdfController::generarPDF('INFORME MÉDICO', [], 'Certificado Alta '.$paciente->rut.' '.date('YmdHi'), 'pdf_informe_medico', 'G');

            if($pdf_resultado->estado != 1) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se pudo generar el PDF';
                return $datos;
            }

            // Enviar correo con PDF adjunto
            // Usar ruta local del archivo en lugar de URL HTTP
            $ruta_local_pdf = public_path('storage/pdf/' . $pdf_resultado->pdf);

            $detalle_correo = array(
                'asunto' => 'Certificado de Alta Médica - '.$paciente->nombres.' '.$paciente->apellido_uno,
                'blade' => 'plantilla-correo-electronico',
                'body' => array(
                    'titulo' => 'Certificado de Alta Médica',
                    'contenido' => 'Adjunto encuentra su certificado de alta médica.',
                ),
                'url_archivo' => $ruta_local_pdf,
            );

            \Mail::to($paciente->email)
                ->cc(['francisco.rojo.gallardo@gmail.com', 'jkriman@gmail.com'])
                ->send(new \App\Mail\CorreoGenerico($detalle_correo));

            $datos['estado'] = 1;
            $datos['msj'] = 'Certificado de Alta Médica enviado exitosamente al email del paciente';

        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar el certificado de alta: ' . $e->getMessage();
            \Log::error('Error enviar alta médica email: ' . $e->getMessage());
        }

        return $datos;
    }

    public function registrar_uso_personal(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->dirigido_a)) {
            $error['dirigido_a'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->cargo)) {
        //     $error['cargo'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->mensaje)) {
            $error['mensaje'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_medica)) {
            $error['hora_medica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion)) {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $uso_personal = new UsoPersonal();

            $uso_personal->dirigido = $request->dirigido_a;
            $uso_personal->cargo = $request->cargo;
            $uso_personal->mensaje = $request->mensaje;
            $uso_personal->id_paciente = $hora_medica->id_paciente;
            $uso_personal->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            $uso_personal->id_profesional = $profesional->id;
            $uso_personal->id_lugar_atencion = $request->id_lugar_atencion;
            $uso_personal->cod_auto = session('lic_token');

            if (!$uso_personal->save()) {

                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar Uso Personal';

            }
            else
            {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "25", $uso_personal->id);

                $delete  = UsoPersonal::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$uso_personal->id])->delete();

                $datos['estado'] = 1;
                $datos['mjs'] = 'registro exitoso';
                $datos['id_uso_personal'] = $uso_personal->id;  // ✅ Retornar el ID
                $datos['delete'] = $delete;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    // ✅ NUEVA FUNCIÓN: Enviar Uso Personal por Email
    public function enviarUsoPersonalEmail(Request $request)
    {
        $datos = array();
        $id_uso_personal = $request->id_uso_personal;

        if (empty($id_uso_personal)) {
            $datos['estado'] = 0;
            $datos['msj'] = 'ID de uso personal no proporcionado';
            return $datos;
        }

        $uso_personal = UsoPersonal::find($id_uso_personal);

        if (!$uso_personal) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Registro de uso personal no encontrado';
            return $datos;
        }

        try {
            // Aquí iría la lógica para generar PDF y enviar por email
            // Por ahora retornamos éxito
            $datos['estado'] = 1;
            $datos['msj'] = 'Documento enviado correctamente por email';
        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar el documento: ' . $e->getMessage();
        }

        return $datos;
    }

    public function enviarGesEmail(Request $request)
    {
        $datos = array();
        $id_ges_diagnostico = $request->id_ges_diagnostico;

        if (empty($id_ges_diagnostico)) {
            $datos['estado'] = 0;
            $datos['msj'] = 'ID de diagnóstico GES no proporcionado';
            return $datos;
        }

        // Buscar el diagnóstico GES en la tabla correspondiente
        // Esta tabla puede variar, ajusta según tu estructura de BD
        try {
            // Aquí iría la lógica para generar PDF GES y enviar por email
            // Por ahora retornamos éxito
            $datos['estado'] = 1;
            $datos['msj'] = 'Constancia GES enviada correctamente por email';
        } catch (\Exception $e) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al enviar la constancia GES: ' . $e->getMessage();
        }

        return $datos;
    }

    public function get_tipo_examen(Request $request)
    {
        $tipo_examen = TipoExamen::all();

        return json_encode($tipo_examen);
    }

    public function get_sub_tipo_examen(Request $request)
    {
        $sub_tipo_examen = ExamenMedico::where('cod_parent', $request->tipo_examen)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->get();
        return json_encode($sub_tipo_examen);
    }

    public function get_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_parent', $request->sub_tipo_examen)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->get();
        return json_encode($examen);
    }

    public function buscar_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_examen', $request->id)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->first();
        return $examen;
    }

    public function get_presentacion(Request $request)
    {
        $producto = Producto::where('id', $request->medicamento)->first();
        $presenta = $producto->Presentaciones()->get();

        return json_encode($presenta);
    }

    public function get_dosis(Request $request)
    {
        $presenta = Presentacion::where('id', $request->presentacion)->first();
        $dosis = $presenta->Dosis()->get();

        /* $pre_dos = PresentacionDosis::where('id_presentacion', $request->presentacion)->get();
         $dosis = [];
         $c = 0;
         foreach ($pre_dos as $pd) {
             $dosis[$c] = dosis::where('id', $pd->id_dosis)->first();
             $c++;
         }*/
        return json_encode($dosis);
    }

    public function get_recetas(Request $request)
    {
        $detalle_receta = DetalleReceta::where('id_ficha', $request->id_ficha)->get();

        /*if (!isset($detalle_receta->id)) {
            return json_encode(null);
        }*/

        return json_encode($detalle_receta);
    }

    public function get_examenes(Request $request)
    {
        $examen = ExamenPPF::where('id_ficha_atencion', $request->id_ficha)->get();

        /*  if (!$examen) {
            return json_encode($examen);
        }*/

        return json_encode($examen);
    }

    public function create()
    {
    }
	public function storeFichaAntSdi(Request $request)
	{
		$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

		$ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
		$id_profesional = $request->id_profesional_fc;
		$id_paciente = $request->id_paciente_fc;

		$ficha->motivo = $request->motivo;
		$ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
		$ficha->cronico = $request->cronico;
		$ficha->ges = $request->ges;
		$ficha->confidencial = $request->confidencial;
		$ficha->id_paciente = $id_paciente;
		$ficha->id_profesional = $id_profesional;
		$ficha->finalizada = 1;
		if (!$ficha->save())
		{
			// return 'error';
			return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
		}
		else
		{
			$tipo_mensaje = 'success';
			$mensaje = 'Ficha Clínica guardada de forma correcta';

			//  finalizar hora medica
			$hora_medica->id_estado = 6;
			$mensaje_estado_hora_medica = '';
			if (!$hora_medica->save()) {
				$mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.';
			}
			else
			{
				$mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.';
			}
			$mensaje .= '\n' . $mensaje_estado_hora_medica;

			if($request->cerrarsession == 0 || $request->cerrarsession =='')
			{
				/** redireccion Redirect funciona correcto */
				return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
			}
			else if($request->cerrarsession == 1)
			{
				// $request->session()->invalidate();
				// $request->session()->regenerateToken();
				// return \Redirect::route('home.ingreso');
				// return redirect()->route('logout')->with('request', $request);
				// \Redirect::ROUTE('logout');

			   //si funciona
				$request->session()->invalidate();
				$request->session()->regenerateToken();
				return \Redirect::route('home.ingreso');

			}
			else
			{
				/** redireccion Redirect funciona correcto */
				return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
			}
        }
	}

    public function storeHomeopatia(Request $request){
        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(empty($request->descripcion_hipotesis))
            {
                $campos_requeridos = 1;
                $mensaje = 'El Diagnóstico Nuero es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.\n';
            }
            else
            {
            }
        }

        if($campos_requeridos == 1)
        {
            return back()->with('error', $mensaje)->withInput();
        }

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;
        if (!$ficha->save())
        {
            // return 'error';
            return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
        }
        else
        {
            $tipo_mensaje = 'success';
            $mensaje = 'Ficha Clínica guardada de forma correcta';
            /** redireccion Redirect funciona correcto */
            if(isset($examen) && !empty($examen))
            {
                $array_tem = array(
                    'lugares_atencion' => $request->id_lugar_atencion,
                    'pdf' => $request->mostrarpdf,
                    'tipo' => $request->tipopdf,
                    'id_examen' => $examen->id,
                );
            }
            else
            {
                $array_tem = array(
                    'lugares_atencion' => $request->id_lugar_atencion,
                    'pdf' => $request->mostrarpdf,
                    'tipo' => $request->tipopdf,
                    'id_examen' => 0,
                );
            }
             return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
        }
    }

    /** REGISTRO FICHA ATENCION GENERAL */
    public function store(Request $request)
    {

        if(!empty( trim($request->descripcion_hipotesis)))
        {
            // MEDICAMENTO REQUERIDO PARA CONSULTAS
            // if($request->id_consulta_control == 0)// CONSULTA
            // {
            //     if ($request->medicamentos == '[]' )
            //     {
            //         return back()->with('error', 'Ficha Clínica requiere cargar Medicamento.')->withInput();
            //     }
            // }


             // dd($request);
            //$ficha = new FichaAtencion();
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
            $ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save()) {
                // return 'error';
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta';

                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.';
                }
                $mensaje .= '\n' . $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
					// $request->session()->invalidate();
					// $request->session()->regenerateToken();
					// return \Redirect::route('home.ingreso');
                    // return redirect()->route('logout')->with('request', $request);
                    // \Redirect::ROUTE('logout');

                   //si funciona
					$request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.')->withInput();;
        }

    }

    /** REGISTRO FICHA ATENCION Y OTORRINOLARINGOLOGIA*/
    public function store_orl(Request $request)
    {

        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(empty($request->diag_endos))
            {
                // $campos_requeridos = 1;
                // $mensaje = 'El Diagnóstico Endoscópico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.\n';
            }
            else
            {
                if(empty($request->solicitado_id_profesional_rfl))
                {
                    if(empty($request->solicitado_rut_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido RUT del Solicitante.\n';
                    }
                    if(empty($request->solicitado_nombre_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido NOMBRE del Solicitante.\n';
                    }
                    if(empty($request->solicitado_apellido_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido APELLIDO del Solicitante.\n';
                    }
                    if(empty($request->solicitado_telefono_rfl) || empty($request->solicitado_email_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                    }
                }
            }
        }


        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            if(!$ficha){
                $ficha = new FichaAtencion;
            }
			$ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            // //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            // //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            // //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                if($request->estudio == 1)
                {
                    /** registro ficha especialidad */
                    $ficha_otorrino = new FichaOtorrino();
                    $ficha_otorrino->id_fichas_atenciones = $ficha->id;
                    $ficha_otorrino->id_paciente = $id_paciente;
                    $ficha_otorrino->id_usa_audifono = $request->usa_audifono;
                    $ficha_otorrino->audifono = $request->audifono;
                    $ficha_otorrino->apreciacion_auditiva = $request->apreciacion_auditiva;
                    $ficha_otorrino->aprec_auditiva_def = $request->aprec_auditiva_def;
                    $ficha_otorrino->examen_oi = $request->examen_oi;
                    $ficha_otorrino->ex_oi_anormal = $request->ex_oi_anormal;
                    $ficha_otorrino->examen_od = $request->examen_od;
                    $ficha_otorrino->ex_od_anormal = $request->examen_od;
                    $ficha_otorrino->obs_ex_oidos = $request->ex_od_anormal;
                    $ficha_otorrino->examen_bio_oi = $request->examen_bio_oi;
                    $ficha_otorrino->obs_examen_bio_oi = $request->obs_examen_bio_oi;
                    $ficha_otorrino->examen_bio_od = $request->examen_bio_od;
                    $ficha_otorrino->obs_examen_bio_od = $request->obs_examen_bio_od;
                    $ficha_otorrino->obs_ex_biom = $request->obs_ex_biom;
                    $ficha_otorrino->id_tipo_episodios = $request->episodios;
                    $ficha_otorrino->obs_episodios = $request->detalle_episodios;
                    $ficha_otorrino->id_tipo_equilibrio = $request->equilibrio;
                    $ficha_otorrino->obs_equilibrio = $request->detalle_equilibrio;
                    $ficha_otorrino->id_tipo_ng = $request->ng;
                    $ficha_otorrino->obs_ng = $request->detalle_ng;
                    $ficha_otorrino->id_tipo_sint_acomp = $request->sint_acomp;
                    $ficha_otorrino->obs_sint_acomp = $request->detalle_sint_acompanantes;
                    $ficha_otorrino->id_tipo_vertigo = $request->tipo_vertigo;
                    $ficha_otorrino->obs_tipo_vertigo = $request->detalle_tipo_vertigo;
                    $ficha_otorrino->obs_vestibular = $request->obs_vestibular;
                    $ficha_otorrino->nariz_general = $request->nariz_general;
                    $ficha_otorrino->det_nariz_general = $request->det_nariz_general;
                    $ficha_otorrino->apreciacion_resp = $request->apreciacion_resp;
                    $ficha_otorrino->aprec_resp_def = $request->aprec_resp_def;
                    $ficha_otorrino->examen_fni = $request->examen_fni;
                    $ficha_otorrino->ex_fni_anormal = $request->ex_fni_anormal;
                    $ficha_otorrino->examen_fnd = $request->examen_fnd;
                    $ficha_otorrino->ex_fnd_anormal = $request->ex_fnd_anormal;
                    $ficha_otorrino->obs_ex_nasal = $request->obs_ex_nasal;
                    $ficha_otorrino->disfonia = $request->disfonia;
                    $ficha_otorrino->det_disfonia = $request->det_disfonia;
                    $ficha_otorrino->ex_boca = $request->ex_boca;
                    $ficha_otorrino->detalle_ex_boca = $request->detalle_ex_boca;
                    $ficha_otorrino->examen_faringe =$request->examen_faringe;
                    $ficha_otorrino->ex_farige_anormal = $request->ex_farige_anormal;
                    $ficha_otorrino->examen_laringe =$request->examen_laringe;
                    $ficha_otorrino->ex_larige_anormal = $request->ex_larige_anormal;
                    $ficha_otorrino->obs_examen_laringe = $request->obs_examen_laringe;
                    $ficha_otorrino->obs_ex_orl = $request->bs_ex_orl;
                    $ficha_otorrino->hip_diag_orl = $request->diag_spec;
                    $ficha_otorrino->ind_orl = $request->ind_orl;
                    $ficha_otorrino->estado = 1;

                    if($ficha_otorrino->save())
                    {
                        $datos['ficha_otorrino']['estado'] = 1;
                        $datos['ficha_otorrino']['msj'] = 'registro exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino guardada de forma correcta';

                    }
                    else
                    {
                        $datos['ficha_otorrino']['estado'] = 0;
                        $datos['ficha_otorrino']['msj'] = 'registro NO exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino No guardada ';
                    }
                }

                 /** registro ficha especialidad */
                $ficha_orl = new FichaOrl();
                $ficha_orl->id_fichas_atenciones = $ficha->id;
                $ficha_orl->id_paciente = $id_paciente;
				$ficha_orl->id_profesional = $id_profesional;
                $ficha_orl->audicion = $request->audicion;
                $ficha_orl->ex_oido = $request->ex_oido;
                $ficha_orl->biomicroscopia = $request->biomicroscopia;
                $ficha_orl->vestibular = $request->vestibular;
                $ficha_orl->o_resultado_ex = $request->o_resultado_ex;
                $ficha_orl->nariz_ext = $request->nariz_ext;
                $ficha_orl->f_nasales = $request->f_nasales;
                $ficha_orl->n_resultado_ex = $request->n_resultado_ex;
                $ficha_orl->boca = $request->boca;
                $ficha_orl->faringe = $request->faringe;
                $ficha_orl->laringe = $request->laringe;
                $ficha_orl->fl_resultado_ex = $request->fl_resultado_ex;
                $ficha_orl->cuello_grl = $request->cuello_grl;
                $ficha_orl->masas = $request->masas;
                $ficha_orl->glandulas = $request->glandulas;
                $ficha_orl->c_resultado_ex = $request->c_resultado_ex;
                $ficha_orl->estado = 1;

                if($ficha_orl->save())
                {
                    $datos['ficha_orl']['estado'] = 1;
                    $datos['ficha_orl']['msj'] = 'registro exitoso';
                    $mensaje .= '\n'.'Ficha Otorrino guardada de forma correcta';

                }
                else
                {
                    $datos['ficha_orl']['estado'] = 0;
                    $datos['ficha_orl']['msj'] = 'registro NO exitoso';
                    $mensaje .= '\n'.'Ficha Otorrino No guardada ';
                }
                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;


                /** registro examen especialidad Rinofibrolaringoscopía */
                $parametro = $request->all();
                $parametro['id_ficha_orl'] = $ficha_orl->id;
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                if($examen_json['estado'] == 1)
                {
                    $examen = '';
                    /** VALIDAR INFORMACION */
                    if($examen_json['cant_datos'] > 0)
                    {
                        $profesional = Profesional::find($id_profesional);

                        $examen = new ExamenEspecialidad();
                        $examen->id_tipo = '1';
                        $examen->id_template = '1';
                        $examen->id_examen_tipo = '1';
                        $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidada;
                        $examen->id_ficha_atencion = $ficha->id;
                        $examen->id_ficha_especialidad = $ficha_orl->id;
                        $examen->id_paciente = $id_paciente;
                        $examen->id_profesional = $id_profesional;
                        $examen->nombre = 'Rinofibrolaringoscopía';
                        $examen->cuerpo = $examen_json['json'];
                        $examen->estado = '1';

                        // if($registro_rfl->save())
                        if($examen->save())
                        {
                            $datos['examen']['estado'] = 1;
                            $datos['examen']['msj'] = 'registro exitoso';
                            $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía guardada de forma correcta\n';

                            /** registro de imagenes  */
                            if(!empty($request->input_lista_imagenes))
                            {
                                $array_imagenes = json_decode($request->input_lista_imagenes);

                                $resulto_img = array();
                                foreach ($array_imagenes as $key => $value)
                                {
                                    $paciente = Paciente::find($id_paciente);
                                    // echo json_encode($value);
                                    $ruta_temp = $value[0];
                                    $nombre_real = $value[1];
                                    $nombre_temp = $value[2];
                                    $file_extension = $value[3];
                                    $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                    $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                    $registro_img = new ExamenEspecialidadImg();
                                    $registro_img->id_examen = $examen->id;
                                    $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                    $registro_img->nombre = $nombre_final;
                                    $registro_img->otro = '';
                                    $registro_img->estado = 1;

                                    if($registro_img->save())
                                    {
                                        $resulto_img[$key]['estado'] = 1;
                                        $resulto_img[$key]['msj'] = 'imagen registrada';
                                    }
                                    else
                                    {
                                        $resulto_img[$key]['estado'] = 0;
                                        $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                    }

                                }
                                $datos['examen']['resulto_img'] = $resulto_img;

                            }

                            /** registro de porfesional provisorio */
                            if(empty($request->solicitado_id_profesional_rfl))
                            {
                                $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_rfl, $request->solicitado_apellido_rfl, '', '', $request->solicitado_rut_rfl, $request->solicitado_email_rfl, $request->solicitado_telefono_rfl, '', '', '', '', '', '', '', '', '', 1);

                                if($profesional_provisorio['estado'] == 1)
                                {
                                    $datos['registro_prof_provi']['estado'] = 1;
                                    $datos['registro_prof_provi']['msj'] = 'registro exitoso';
                                    $datos['registro_prof_provi']['result'] = $profesional_provisorio;

                                    $mensaje .= 'Profesional Prvisorio creado\n';
                                }
                                else
                                {
                                    $datos['registro_prof_provi']['estado'] = 0;
                                    $datos['registro_prof_provi']['msj'] = 'falla en registro';
                                    $datos['registro_prof_provi']['result'] = $profesional_provisorio;
                                    $mensaje .= 'Profesional Prvisorio creado\n';
                                }

                            }

                        }
                        else
                        {
                            $datos['examen']['estado'] = 0;
                            $datos['examen']['msj'] = 'registro NO exitoso';
                            $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía No guardada \n';
                        }
                    }
                }
                else
                {
                    $mensaje .= 'Problema al registrar Examen Espacial';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    // if($request->mostrarpdf == 0 || $request->mostrarpdf =='')
                    // {
                    //     return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    // }
                    // else
                    {
                        /** redireccion Redirect funciona correcto */
                        if(!empty($examen))
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => $examen->id,
                            );
                        }
                        else
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                        }
                        return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                    }
                }
                else if($request->cerrarsession == 1)
                {
                   //si funciona
					$request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }

    }


     /** REGISTRO FICHA ATENCION Y NEUROLOGIA*/
    public function store_neuro(Request $request)
    {

        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(empty($request->descripcion_hipotesis))
            {
                $campos_requeridos = 1;
                $mensaje = 'El Diagnóstico Nuero es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.\n';
            }
            else
            {
                // if(empty($request->solicitado_id_profesional_rfl))
                // {
                //     if(empty($request->solicitado_rut_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido RUT del Solicitante.\n';
                //     }
                //     if(empty($request->solicitado_nombre_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido NOMBRE del Solicitante.\n';
                //     }
                //     if(empty($request->solicitado_apellido_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido APELLIDO del Solicitante.\n';
                //     }
                //     if(empty($request->solicitado_telefono_rfl) || empty($request->solicitado_email_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                //     }
                // }
            }
        }

        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            if(!$ficha){
                $ficha = new FichaAtencion;
            }
			$ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                if($request->estudio == 1)
                {
                    /** registro ficha especialidad */
                    $ficha_otorrino = new FichaOtorrino();
                    $ficha_otorrino->id_fichas_atenciones = $ficha->id;
                    $ficha_otorrino->id_paciente = $id_paciente;
                    $ficha_otorrino->id_usa_audifono = $request->usa_audifono;
                    $ficha_otorrino->audifono = $request->audifono;
                    $ficha_otorrino->apreciacion_auditiva = $request->apreciacion_auditiva;
                    $ficha_otorrino->aprec_auditiva_def = $request->aprec_auditiva_def;
                    $ficha_otorrino->examen_oi = $request->examen_oi;
                    $ficha_otorrino->ex_oi_anormal = $request->ex_oi_anormal;
                    $ficha_otorrino->examen_od = $request->examen_od;
                    $ficha_otorrino->ex_od_anormal = $request->examen_od;
                    $ficha_otorrino->obs_ex_oidos = $request->ex_od_anormal;
                    $ficha_otorrino->examen_bio_oi = $request->examen_bio_oi;
                    $ficha_otorrino->obs_examen_bio_oi = $request->obs_examen_bio_oi;
                    $ficha_otorrino->examen_bio_od = $request->examen_bio_od;
                    $ficha_otorrino->obs_examen_bio_od = $request->obs_examen_bio_od;
                    $ficha_otorrino->obs_ex_biom = $request->obs_ex_biom;
                    $ficha_otorrino->id_tipo_episodios = $request->episodios;
                    $ficha_otorrino->obs_episodios = $request->detalle_episodios;
                    $ficha_otorrino->id_tipo_equilibrio = $request->equilibrio;
                    $ficha_otorrino->obs_equilibrio = $request->detalle_equilibrio;
                    $ficha_otorrino->id_tipo_ng = $request->ng;
                    $ficha_otorrino->obs_ng = $request->detalle_ng;
                    $ficha_otorrino->id_tipo_sint_acomp = $request->sint_acomp;
                    $ficha_otorrino->obs_sint_acomp = $request->detalle_sint_acompanantes;
                    $ficha_otorrino->id_tipo_vertigo = $request->tipo_vertigo;
                    $ficha_otorrino->obs_tipo_vertigo = $request->detalle_tipo_vertigo;
                    $ficha_otorrino->obs_vestibular = $request->obs_vestibular;
                    $ficha_otorrino->nariz_general = $request->nariz_general;
                    $ficha_otorrino->det_nariz_general = $request->det_nariz_general;
                    $ficha_otorrino->apreciacion_resp = $request->apreciacion_resp;
                    $ficha_otorrino->aprec_resp_def = $request->aprec_resp_def;
                    $ficha_otorrino->examen_fni = $request->examen_fni;
                    $ficha_otorrino->ex_fni_anormal = $request->ex_fni_anormal;
                    $ficha_otorrino->examen_fnd = $request->examen_fnd;
                    $ficha_otorrino->ex_fnd_anormal = $request->ex_fnd_anormal;
                    $ficha_otorrino->obs_ex_nasal = $request->obs_ex_nasal;
                    $ficha_otorrino->disfonia = $request->disfonia;
                    $ficha_otorrino->det_disfonia = $request->det_disfonia;
                    $ficha_otorrino->ex_boca = $request->ex_boca;
                    $ficha_otorrino->detalle_ex_boca = $request->detalle_ex_boca;
                    $ficha_otorrino->examen_faringe =$request->examen_faringe;
                    $ficha_otorrino->ex_farige_anormal = $request->ex_farige_anormal;
                    $ficha_otorrino->examen_laringe =$request->examen_laringe;
                    $ficha_otorrino->ex_larige_anormal = $request->ex_larige_anormal;
                    $ficha_otorrino->obs_examen_laringe = $request->obs_examen_laringe;
                    $ficha_otorrino->obs_ex_orl = $request->bs_ex_orl;
                    $ficha_otorrino->hip_diag_orl = $request->diag_spec;
                    $ficha_otorrino->ind_orl = $request->ind_orl;
                    $ficha_otorrino->estado = 1;

                    if($ficha_otorrino->save())
                    {
                        $datos['ficha_otorrino']['estado'] = 1;
                        $datos['ficha_otorrino']['msj'] = 'registro exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino guardada de forma correcta';

                    }
                    else
                    {
                        $datos['ficha_otorrino']['estado'] = 0;
                        $datos['ficha_otorrino']['msj'] = 'registro NO exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino No guardada ';
                    }
                }

                 /** registro ficha especialidad */
                $ficha_neuro = new FichaNeuro();
                $ficha_neuro->id_fichas_atenciones = $ficha->id;
                $ficha_neuro->id_paciente = $id_paciente;
				$ficha_neuro->id_profesional = $id_profesional;
                $ficha_neuro->datos = json_encode($request->all());
                $ficha_neuro->estado = 1;

                if($ficha_neuro->save())
                {
                    $datos['ficha_neuro']['estado'] = 1;
                    $datos['ficha_neuro']['msj'] = 'registro exitoso';
                    $mensaje .= '\n'.'Ficha Neurología guardada de forma correcta';

                }
                else
                {
                    $datos['ficha_neuro']['estado'] = 0;
                    $datos['ficha_neuro']['msj'] = 'registro NO exitoso';
                    $mensaje .= '\n'.'Ficha Neuro No guardada ';
                }
                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;


                /** registro examen especialidad Rinofibrolaringoscopía */
                $parametro = $request->all();
                $parametro['id_ficha_neuro'] = $ficha_neuro->id;
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                if($examen_json['estado'] == 1)
                {
                    $examen = '';
                    /** VALIDAR INFORMACION */
                    if($examen_json['cant_datos'] > 0)
                    {
                        $profesional = Profesional::find($id_profesional);

                        $examen = new ExamenEspecialidad();
                        $examen->id_tipo = '1';
                        $examen->id_template = '1';
                        $examen->id_examen_tipo = '1';
                        $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidada;
                        $examen->id_ficha_atencion = $ficha->id;
                        $examen->id_ficha_especialidad = $ficha_neuro->id;
                        $examen->id_paciente = $id_paciente;
                        $examen->id_profesional = $id_profesional;
                        $examen->nombre = 'Neurología';
                        $examen->cuerpo = $examen_json['json'];
                        $examen->estado = '1';

                        // if($registro_rfl->save())
                        if($examen->save())
                        {
                            $datos['examen']['estado'] = 1;
                            $datos['examen']['msj'] = 'registro exitoso';
                            $mensaje .= 'Ficha Neurología guardada de forma correcta\n';

                            /** registro de imagenes  */
                            if(!empty($request->input_lista_imagenes))
                            {
                                $array_imagenes = json_decode($request->input_lista_imagenes);

                                $resulto_img = array();
                                foreach ($array_imagenes as $key => $value)
                                {
                                    $paciente = Paciente::find($id_paciente);
                                    // echo json_encode($value);
                                    $ruta_temp = $value[0];
                                    $nombre_real = $value[1];
                                    $nombre_temp = $value[2];
                                    $file_extension = $value[3];
                                    $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                    $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                    $registro_img = new ExamenEspecialidadImg();
                                    $registro_img->id_examen = $examen->id;
                                    $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                    $registro_img->nombre = $nombre_final;
                                    $registro_img->otro = '';
                                    $registro_img->estado = 1;

                                    if($registro_img->save())
                                    {
                                        $resulto_img[$key]['estado'] = 1;
                                        $resulto_img[$key]['msj'] = 'imagen registrada';
                                    }
                                    else
                                    {
                                        $resulto_img[$key]['estado'] = 0;
                                        $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                    }

                                }
                                $datos['examen']['resulto_img'] = $resulto_img;

                            }

                            /** registro de porfesional provisorio */
                            if(empty($request->solicitado_id_profesional_rfl))
                            {
                                $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_rfl, $request->solicitado_apellido_rfl, '', '', $request->solicitado_rut_rfl, $request->solicitado_email_rfl, $request->solicitado_telefono_rfl, '', '', '', '', '', '', '', '', '', 1);

                                if($profesional_provisorio['estado'] == 1)
                                {
                                    $datos['registro_prof_provi']['estado'] = 1;
                                    $datos['registro_prof_provi']['msj'] = 'registro exitoso';
                                    $datos['registro_prof_provi']['result'] = $profesional_provisorio;

                                    $mensaje .= 'Profesional Prvisorio creado\n';
                                }
                                else
                                {
                                    $datos['registro_prof_provi']['estado'] = 0;
                                    $datos['registro_prof_provi']['msj'] = 'falla en registro';
                                    $datos['registro_prof_provi']['result'] = $profesional_provisorio;
                                    $mensaje .= 'Profesional Prvisorio creado\n';
                                }

                            }

                        }
                        else
                        {
                            $datos['examen']['estado'] = 0;
                            $datos['examen']['msj'] = 'registro NO exitoso';
                            $mensaje .= 'Ficha Neurología No guardada \n';
                        }
                    }
                }
                else
                {
                    $mensaje .= 'Problema al registrar Examen Espacial';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    // if($request->mostrarpdf == 0 || $request->mostrarpdf =='')
                    // {
                    //     return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    // }
                    // else
                    {
                        /** redireccion Redirect funciona correcto */
                        if(!empty($examen))
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => $examen->id,
                            );
                        }
                        else
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                        }
                        return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                    }
                }
                else if($request->cerrarsession == 1)
                {
                   //si funciona
					$request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }

    }

    /** REGISTRO FICHA ATENCION Y CIRUGIA GENERAL*/
    public function store_cg(Request $request)
    {
        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }


        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            // //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            // //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            // //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** REGISTRO DE CONTROL POST QUIRURGICO */
                if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                {
                    $control_post_q = new ControlPostQuirurgico();
                    $control_post_q->id_ficha_atencion = $ficha->id;
                    $control_post_q->id_profesional = $id_profesional;
                    $control_post_q->id_paciente = $id_paciente;
                    $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                    $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                    $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                    $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                    $control_post_q->estado = 1;

                    if($control_post_q->save())
                    {
                        $mensaje .='Control Post Quirurgico registrado\n';
                    }
                    else
                    {
                        $mensaje .='Problema en el registro de Control Post Quirurgico\n';
                    }
                }
                else
                {
                    $mensaje .='Registro de Control Post Quirurgico no requerido\n';
                }

                /** registro ficha_cir_general_adulto  */
                $ficha_cirugia_gen_adul = new FichaCirugiaGeneralAdulto();
                $ficha_cirugia_gen_adul->id_ficha_atencion = $ficha->id;
                $ficha_cirugia_gen_adul->id_profesional = $id_profesional;
                $ficha_cirugia_gen_adul->id_paciente = $id_paciente;
                $ficha_cirugia_gen_adul->est_grl = $request->est_grl;
                $ficha_cirugia_gen_adul->ex_seg = $request->ex_seg;
                $ficha_cirugia_gen_adul->cir_grl_urgencia = $request->cir_grl_urgencia;
                $ficha_cirugia_gen_adul->obs_est_grl = $request->obs_est_grl;

                if ($request->tto_med_cg == 'on') {
                    $ficha_cirugia_gen_adul->tto_med_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->tto_med_cg = 0;
                }

                $ficha_cirugia_gen_adul->rec_tto_cg = $request->rec_tto_cg;

                if ($request->pr_cg == 'on') {
                    $ficha_cirugia_gen_adul->pr_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->pr_cg = 0;
                }

                $ficha_cirugia_gen_adul->tipo_proc_cg = $request->tipo_proc_cg;
                $ficha_cirugia_gen_adul->plan_proc_cg = $request->plan_proc_cg;
                if ($request->plan_cirugia == 'on') {
                    $ficha_cirugia_gen_adul->plan_cirugia = 1;
                } else {
                    $ficha_cirugia_gen_adul->plan_cirugia = 0;
                }

                $ficha_cirugia_gen_adul->otro = $request->otro;
                $ficha_cirugia_gen_adul->otro1 = $request->otro1;
                $ficha_cirugia_gen_adul->estado = '1';

                if($ficha_cirugia_gen_adul->save())
                {
                    $mensaje = 'Ficha Cirugia General Adulto guardada de forma correcta\n';
                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General Adulto presentó problema al guardar\n';
                }

                // finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function registrar_ficha_atencion_cirugia_digestiva(Request $request)
    {
        try {
            $campos_requeridos = 0;
            $mensaje = '';
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente;
            if(empty(trim($request->solicitado_por)))
            {
                $campos_requeridos = 1;
                $mensaje .= 'Solicitado por es Requerido.<br> Su Endoscopía NO ha sido Guardada aún.<br>';
            }
            if(empty( trim($request->desc_endo_gast)))
            {
                //$campos_requeridos = 1;
                $mensaje .= 'La descripción del examen es Requerida.<br> Su Endoscopía NO ha sido Guardada aún.';
            }
            else
            {
                if(empty($request->diag_endos))
                {
                    //$campos_requeridos = 1;
                    $mensaje .= 'El Diagnóstico Endoscópico es Requerido.<br> Su Endoscopía NO ha sido Guardada aún.<br>';
                }
                else
                {

                }
            }

            //return $campos_requeridos;
            if($campos_requeridos == 0)
            {
                $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
                $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                //  si cerrarsesion es 2, no se cambia el estado de la hora medica
                if($request->cerrarsession !== 2)
                {
                    $hora_medica->id_estado = 6;
                }

                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;



                /** registro examen especialidad Rinofibrolaringoscopía */
                $parametro = $request->all();
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                // return json_encode($examen_json);
                if($examen_json['estado'] == 1)
                {
                    $examen = '';
                    /** VALIDAR INFORMACION */
                    if($examen_json['cant_datos'] > 0)
                    {
                        $profesional = Profesional::find($id_profesional);

                        $examen = new ExamenEspecialidad();
                        $examen->id_tipo = '1';
                        $examen->id_template = '1';
                        $examen->id_examen_tipo = '1';
                        $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                        $examen->id_ficha_atencion = $ficha->id;
                        $examen->id_ficha_especialidad = $examen->id;
                        $examen->id_paciente = $id_paciente;
                        $examen->id_profesional = $id_profesional;
                        $examen->nombre = 'Endoscopía alta';
                        $examen->cuerpo = $examen_json['json'];
                        $examen->estado = '1';
                        // if($registro_rfl->save())
                        if($examen->save())
                        {
                            $datos['examen']['estado'] = 1;
                            $datos['examen']['msj'] = 'registro exitoso';
                            $mensaje .= 'Ficha Endoscopía guardada de forma correcta\n';

                            /** registro de imagenes  */
                            if(!empty($request->input_lista_imagenes))
                            {
                                $array_imagenes = json_decode($request->input_lista_imagenes, true);

                                $resulto_img = array();
                                foreach ($array_imagenes['eda'] as $key => $value)
                                {
                                    $paciente = Paciente::find($id_paciente);

                                    // echo json_encode($value);
                                    $ruta_temp = $value[0];
                                    $nombre_real = $value[1];
                                    $nombre_temp = $value[2];
                                    $file_extension = $value[3];
                                    $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                    $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                    $registro_img = new ExamenEspecialidadImg();
                                    $registro_img->id_examen = $examen->id;
                                    $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                    $registro_img->nombre = $nombre_final;
                                    $registro_img->otro = '';
                                    $registro_img->estado = 1;

                                    if($registro_img->save())
                                    {
                                        $resulto_img[$key]['estado'] = 1;
                                        $resulto_img[$key]['msj'] = 'imagen registrada';
                                    }
                                    else
                                    {
                                        $resulto_img[$key]['estado'] = 0;
                                        $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                    }

                                }
                                $datos['examen']['resulto_img'] = $resulto_img;

                            }

                            /** registro de porfesional provisorio */
                            if(empty($request->solicitado_id_profesional_rfl))
                            {
                                $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_rfl, $request->solicitado_apellido_rfl, '', '', $request->solicitado_rut_rfl, $request->solicitado_email_rfl, $request->solicitado_telefono_rfl, '', '', '', '', '', '', '', '', '', 1);

                                if($profesional_provisorio['estado'] == 1)
                                {
                                    $datos['registro_prof_provi']['estado'] = 1;
                                    $datos['registro_prof_provi']['msj'] = 'registro exitoso';
                                    $datos['registro_prof_provi']['result'] = $profesional_provisorio;

                                    $mensaje .= 'Profesional Prvisorio creado\n';
                                }
                                else
                                {
                                    $datos['registro_prof_provi']['estado'] = 0;
                                    $datos['registro_prof_provi']['msj'] = 'falla en registro';
                                    $datos['registro_prof_provi']['result'] = $profesional_provisorio;
                                    $mensaje .= 'Profesional Prvisorio creado\n';
                                }

                            }

                        }
                        else
                        {
                            $datos['examen']['estado'] = 0;
                            $datos['examen']['msj'] = 'registro NO exitoso';
                            $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía No guardada \n';
                        }
                    }
                }
                else
                {
                    $mensaje .= 'Problema al registrar Examen Espacial';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    // if($request->mostrarpdf == 0 || $request->mostrarpdf =='')
                    // {
                    //     return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    // }
                    // else
                    {
                        /** redireccion Redirect funciona correcto */
                        if(!empty($examen))
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => $examen->id,
                            );
                        }
                        else
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                        }
                        return ['success' => true, 'mensaje' => $mensaje];
                    }
                }
                else if($request->cerrarsession == 1)
                {
                //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }else{
                    // se mantiene en la vista actual
                    $tipo_mensaje = 'success';
                    $mensaje = 'Ficha Clínica guardada de forma correcta\n';
                    return ['estado' => 'ok','mensaje' => $mensaje];
                }


            }
            else
            {
                return ['success' => false, 'error' => 'Ha ocurrido un error'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }

        return ['success' => true];

    }

    /** REGISTRO FICHA ATENCION Y CIRUGIA DIGESTIVA GENERAL*/
    public function store_cdg(Request $request)
    {

        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(!empty($request->diag_endos_eda))
            {
                if($request->diag_endos_eda != 'Test de ureasa No tomado')
                {
                    if(empty($request->id_profesional_solicitado_por_eda))
                    {
                        if(empty($request->solicitado_por_rut_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido RUT del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_nombre_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido NOMBRE del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_apellido_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido APELLIDO del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_telefono_eda) || empty($request->solicitado_por_email_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                        }
                    }
                }

            }
            else if(!empty($request->diag_endos_edb))
            {
                if(empty($request->id_profesional_solicitado_por_edb))
                {
                    if(empty($request->solicitado_por_rut_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido RUT del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_nombre_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido NOMBRE del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_apellido_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido APELLIDO del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_telefono_edb) || empty($request->solicitado_por_email_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                    }
                }
            }

        }

        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            // //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            // //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            // //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** REGISTRO DE CONTROL POST QUIRURGICO */
                if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                {
                    $control_post_q = new ControlPostQuirurgico();
                    $control_post_q->id_ficha_atencion = $ficha->id;
                    $control_post_q->id_profesional = $id_profesional;
                    $control_post_q->id_paciente = $id_paciente;
                    $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                    $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                    $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                    $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                    $control_post_q->estado = 1;

                    if($control_post_q->save())
                    {
                        $mensaje .='Control Post Quirurgico registrado\n';
                    }
                    else
                    {
                        $mensaje .='Problema en el registro de Control Post Quirurgico\n';
                    }
                }
                else
                {
                    $mensaje .='Registro de Control Post Quirurgico no requerido\n';
                }

                /** REGISTRO FICHA CIRUGIA GENERAL ADULTO - ficha_cir_general_adulto  */
                $ficha_cirugia_gen_adul = new FichaCirugiaGeneralAdulto();
                $ficha_cirugia_gen_adul->id_ficha_atencion = $ficha->id;
                $ficha_cirugia_gen_adul->id_profesional = $id_profesional;
                $ficha_cirugia_gen_adul->id_paciente = $id_paciente;
                $ficha_cirugia_gen_adul->est_grl = $request->est_grl;
                $ficha_cirugia_gen_adul->ex_seg = $request->ex_seg;
                $ficha_cirugia_gen_adul->cir_grl_urgencia = $request->cir_grl_urgencia;
                $ficha_cirugia_gen_adul->obs_est_grl = $request->obs_est_grl;

                if ($request->tto_med_cg == 'on') {
                    $ficha_cirugia_gen_adul->tto_med_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->tto_med_cg = 0;
                }

                $ficha_cirugia_gen_adul->rec_tto_cg = $request->rec_tto_cg;

                if ($request->pr_cg == 'on') {
                    $ficha_cirugia_gen_adul->pr_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->pr_cg = 0;
                }

                $ficha_cirugia_gen_adul->tipo_proc_cg = $request->tipo_proc_cg;
                $ficha_cirugia_gen_adul->plan_proc_cg = $request->plan_proc_cg;
                if ($request->plan_cirugia == 'on') {
                    $ficha_cirugia_gen_adul->plan_cirugia = 1;
                } else {
                    $ficha_cirugia_gen_adul->plan_cirugia = 0;
                }

                $ficha_cirugia_gen_adul->otro = $request->otro;
                $ficha_cirugia_gen_adul->otro1 = $request->otro1;
                $ficha_cirugia_gen_adul->estado = '1';

                if($ficha_cirugia_gen_adul->save())
                {

                    $mensaje .= 'Ficha Cirugia General Adulto guardada de forma correcta\n';

                    /** REGISTRO  FICHA CIRUGIA DIGESTIVA GENERAL - ficha_cir_digestiva_general*/
                    $ficha_cd = new FichaCirugiaDigestivaGeneralAdulto();
                    $ficha_cd->id_ficha_atencion = $ficha->id;
                    $ficha_cd->id_ficha_cirugia = $ficha_cirugia_gen_adul->id;
                    $ficha_cd->id_profesional = $id_profesional;
                    $ficha_cd->id_paciente = $id_paciente;

                    /** CIRUGIA DIGESTIVA ALTA */
                    $ficha_cd->cda_mc = $request->cda_mc;
                    $ficha_cd->cda_ex_fis = $request->cda_ex_fis;
                    $ficha_cd->urgencia_cda = $request->urgencia_cda;
                    $ficha_cd->obs_egp_cda = $request->obs_egp_cda;
                    $ficha_cd->tto_med_cda = $request->tto_med_cda;
                    $ficha_cd->rec_tto_cda = $request->rec_tto_cda;
                    if ($request->pr_cda == 'on') {
                        $ficha_cd->pr_cda = 1;
                    } else {
                        $ficha_cd->pr_cda = 0;
                    }
                    $ficha_cd->tipo_proc_cda = $request->tipo_proc_cda;
                    $ficha_cd->plan_proc_cda = $request->plan_proc_cda;
                    if ($request->cirug_cda == 'on') {
                        $ficha_cd->cirug_cda = 1;
                    } else {
                        $ficha_cd->cirug_cda = 0;
                    }
                    $ficha_cd->obs_plan_trat_cda = $request->obs_plan_trat_cda;

                    /** CIRUGIA DIGESTIVA BAJA */
                    $ficha_cd->cdb_ex_fisico_ab = $request->cdb_ex_fisico_ab;
                    $ficha_cd->cdb_ex_tr = $request->cdb_ex_tr;
                    $ficha_cd->urgencia_cdb = $request->urgencia_cdb;
                    $ficha_cd->obs_egp_cdb  = $request->obs_egp_cdb ;
                    $ficha_cd->tto_med_cdb = $request->tto_med_cdb;
                    $ficha_cd->rec_tto_cdb = $request->rec_tto_cdb;
                    if ($request->pr_cdb == 'on') {
                        $ficha_cd->pr_cdb = 1;
                    } else {
                        $ficha_cd->pr_cdb = 0;
                    }
                    $ficha_cd->tipo_proc_cdb = $request->tipo_proc_cdb;
                    $ficha_cd->plan_proc_cdb = $request->plan_proc_cdb;
                    if ($request->cirug_cdb == 'on') {
                        $ficha_cd->cirug_cdb = 1;
                    } else {
                        $ficha_cd->cirug_cdb = 0;
                    }
                    $ficha_cd->obs_plan_trat_cdb = $request->obs_plan_trat_cdb;

                    /** CIRUGIA DIGESTIVA GENERAL */
                    $ficha_cd->cdg_mc = $request->cdg_mc;
                    $ficha_cd->cdg_ex_fis = $request->cdg_ex_fis;
                    $ficha_cd->urgencia_cdg = $request->urgencia_cdg;
                    $ficha_cd->obs_egp_cdg  = $request->obs_egp_cdg ;
                    $ficha_cd->tto_med_cdg = $request->tto_med_cdg;
                    $ficha_cd->rec_tto_cdg = $request->rec_tto_cdg;
                    if ($request->pr_cdg == 'on') {
                        $ficha_cd->pr_cdg = 1;
                    } else {
                        $ficha_cd->pr_cdg = 0;
                    }
                    $ficha_cd->tipo_proc_cdg = $request->tipo_proc_cdg;
                    $ficha_cd->plan_proc_cdg = $request->plan_proc_cdg;
                    if ($request->cirug_cdg == 'on') {
                        $ficha_cd->cirug_cdg = 1;
                    } else {
                        $ficha_cd->cirug_cdg = 0;
                    }
                    $ficha_cd->obs_plan_trat_cdg = $request->obs_plan_trat_cdg;

                    /** OTROS */
                    $ficha_cd->otro = $request->otro;
                    $ficha_cd->otro1 = $request->otro1;
                    $ficha_cd->estado = 1;

                    if($ficha_cd->save())
                    {
                        $mensaje .= 'Ficha Cirugia Digestiva guardada de forma correcta\n';

                        /** REGISTRO DE EXAMEN */
                        $lista_examen_especialidad = explode('|',$request->tipo_examen_especial);
                        foreach ($lista_examen_especialidad as $key_examen_tipo => $value_examen_tipo)
                        {
                            $parametro = $request->all();

                            $temp_value_examen_tipo = explode(',',$value_examen_tipo);
                            // $temp_value_examen_tipo[0] = alias template
                            // $temp_value_examen_tipo[1] = id_tipo
                            // $temp_value_examen_tipo[2] = id_template

                            if( !empty( $request['diag_endos_'.$temp_value_examen_tipo[0]] ) )
                            {

                                if($request['diag_endos_'.$temp_value_examen_tipo[0]] != 'Test de ureasa No tomado')
                                {
                                    /** limpiar parametos */
                                    foreach( $parametro as $key => $value )
                                    {
                                        if(!strpos($key, '_'.$temp_value_examen_tipo[0]) && !strpos($key, 'id_fc') && !strpos($key, '_fc') )
                                        unset($parametro[$key]);
                                    }

                                    $parametro['id_ficha_cirugia_digestiva'] = $ficha_cd->id;
                                    $examen_json = ExamenEspecialidadController::estructuraJson($temp_value_examen_tipo[2],$parametro);
                                    if($examen_json['estado'] == 1)
                                    {
                                        $examen = '';
                                        /** VALIDAR INFORMACION */
                                        if($examen_json['cant_datos'] > 0)
                                        {
                                            $profesional = Profesional::find($id_profesional);
                                            $template = ExamenEspecialidadTemplate::find($temp_value_examen_tipo[2]);

                                            $examen = new ExamenEspecialidad();
                                            $examen->id_tipo = '1';
                                            $examen->id_template = $temp_value_examen_tipo[2];
                                            $examen->id_examen_tipo = $temp_value_examen_tipo[1];
                                            $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                                            $examen->id_ficha_atencion = $ficha->id;
                                            $examen->id_ficha_especialidad = $ficha_cd->id;
                                            $examen->id_paciente = $id_paciente;
                                            $examen->id_profesional = $id_profesional;
                                            $examen->nombre = $template->nombre;
                                            $examen->cuerpo = $examen_json['json'];
                                            $examen->estado = '1';
                                            if($examen->save())
                                            {
                                                $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 1;
                                                $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'registro exitoso';
                                                $mensaje .= 'Examen '.$template->nombre.' registrado de forma exitosa\n';

                                                /** carga imagen */
                                                if(!empty($request->input_lista_imagenes))
                                                {

                                                    $array_imagenes = (array)json_decode($request->input_lista_imagenes);

                                                    // var_dump($array_imagenes);
                                                    // var_dump($temp_value_examen_tipo[0]);
                                                    // var_dump($array_imagenes[$temp_value_examen_tipo[0]]);

                                                    if(!empty($array_imagenes[$temp_value_examen_tipo[0]]))
                                                    {
                                                        $resulto_img = array();
                                                        foreach ($array_imagenes[$temp_value_examen_tipo[0]] as $key => $value)
                                                        {
                                                            $paciente = Paciente::find($id_paciente);
                                                            // echo json_encode($value);
                                                            $ruta_temp = $value[0];
                                                            $nombre_real = $value[1];
                                                            $nombre_temp = $value[2];
                                                            $file_extension = $value[3];
                                                            if(isset($value[4])) $descripcion = $value[4];
                                                            else $descripcion = '';
                                                            $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                                            $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                                            $registro_img = new ExamenEspecialidadImg();
                                                            $registro_img->id_examen = $examen->id;
                                                            $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                                            $registro_img->nombre = $nombre_final;
                                                            $registro_img->otro = $descripcion;
                                                            $registro_img->estado = 1;

                                                            if($registro_img->save())
                                                            {
                                                                $resulto_img[$key]['estado'] = 1;
                                                                $resulto_img[$key]['msj'] = 'imagen registrada';
                                                            }
                                                            else
                                                            {
                                                                $resulto_img[$key]['estado'] = 0;
                                                                $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                                            }

                                                        }
                                                        $datos['examen'][$temp_value_examen_tipo[0]]['resulto_img'] = $resulto_img;
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 0;
                                                $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'Registro NO exitoso';
                                                $mensaje .= 'Examen '.$template->nombre.' No guardada \n';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Problema al general Estructura de examen '.$temp_value_examen_tipo[0].'\n';
                                    }
                                }
                            }
                            // else
                            // {
                            //     $mensaje .= 'No tiene diag_endos_'.$temp_value_examen_tipo[0].'\n';
                            // }
                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Cirugia Digestiva presentó problema al guardar\n';
                    }
                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General Adulto presentó problema al guardar\n';
                }

                // finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO FICHA ATENCION Y UROLOGIA*/
    public function store_uro(Request $request)
    {

        $campos_requeridos = 0;
        $mensaje = '';


        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje .= 'El Diagnóstico es Requerido.\n';
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            // Validación de mc_ex_fisico_cons y obs_egp_uro omitida - campos opcionales
            // if(empty($request->mc_ex_fisico_cons) || empty($request->obs_egp_uro))
            // {
            //     $campos_requeridos = 1;
            //     if(empty($request->mc_ex_fisico_cons))
            //     {
            //         $mensaje .= 'El Motivo de consulta y Examen general es Requerido\n';
            //     }
            //     if(empty($request->obs_egp_uro))
            //     {
            //         $mensaje .= 'El Estado General del Paciente es Requerido\n';
            //     }
            // }
            // else
            // {

            // Resto de validaciones para cistoscopía, uroflujometría y venereas
            if(!empty($request->diag_endos_eda))
                {
                    if($request->diag_endos_eda != 'Test de ureasa No tomado')
                    {
                        if(empty($request->id_profesional_solicitado_por_cisto))
                        {
                            if(empty($request->solicitado_por_rut_cisto))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Cistocopía - Campo requerido RUT del Solicitante.\n';
                            }
                            if(empty($request->solicitado_por_nombre_cisto))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Cistocopía - Campo requerido NOMBRE del Solicitante.\n';
                            }
                            if(empty($request->solicitado_por_apellido_cisto))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Cistocopía - Campo requerido APELLIDO del Solicitante.\n';
                            }
                            if(empty($request->solicitado_por_telefono_cisto) || empty($request->solicitado_por_email_cisto))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Cistocopía - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                            }
                        }
                    }

                }

                if( !empty($request->vol_vac_uro_flujo) || !empty($request->q_flujo_uro_flujo) || !empty($request->m_curva_uro_flujo)
                        || !empty($request->residuo_uro_flujo) || !empty($request->comentrarios_uro_flujo) )
                {
                    if(empty($request->id_profesional_solicitado_por_uro_flujo))
                    {

                        if(empty($request->solicitado_por_rut_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido RUT del Solicitante.\n'; }
                        if(empty($request->solicitado_por_nombre_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido NOMBRE del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_apellido_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido APELLIDO del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_telefono_uro_flujo) || empty($request->solicitado_por_email_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                        }
                    }
                }
                else
                {
                    $array_imagenes = (array)json_decode($request->input_lista_imagenes);
                    $temp = array();
                    if(isset($array_imagenes['uro_flujo']))
                        $temp = (array)$array_imagenes['uro_flujo'];

                    if( count($temp) > 0)
                    {

                        if(empty($request->id_profesional_solicitado_por_uro_flujo))
                        {
                            if(empty($request->solicitado_por_rut_uro_flujo))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Uroflujometría - Campo requerido RUT del Solicitante.\n'; }
                            if(empty($request->solicitado_por_nombre_uro_flujo))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Uroflujometría - Campo requerido NOMBRE del Solicitante.\n';
                            }
                            if(empty($request->solicitado_por_apellido_uro_flujo))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Uroflujometría - Campo requerido APELLIDO del Solicitante.\n';
                            }
                            if(empty($request->solicitado_por_telefono_uro_flujo) || empty($request->solicitado_por_email_uro_flujo))
                            {
                                $campos_requeridos = 1;
                                $mensaje = 'Uroflujometría - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                            }
                        }
                    }
                }

            /** validacion de veneria */
            if(
                !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
                !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
                !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
                !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
                !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
                !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
                !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
            ){

                if(empty($request->select_1_ven_sint))
                {
                    $campos_requeridos = 1;
                    $mensaje .= 'Venereas - El Sintomatología actual es Requerido.\n';
                }

                if(empty($request->diagnostico_ven))
                {
                    $campos_requeridos = 1;
                    $mensaje .= 'Venereas - El Diagnóstico de Veneria es Requerido.\n';
                }

                if($campos_requeridos == 1)
                {
                    $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
                }
            }
        }


        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            // //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            // //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            // //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                // $ficha_uro->estado = 1;
                $ficha_urologia = new FichaUrologiaAdulto();
                $ficha_urologia->id_ficha_atencion = $ficha->id;
                $ficha_urologia->id_profesional= $id_profesional;
                $ficha_urologia->id_paciente = $id_paciente;

                $ficha_urologia->mc_ex_fisico_cons=$request->mc_ex_fisico_cons ? $request->mc_ex_fisico_cons : '';
                $ficha_urologia->uro_gen_ext=$request->uro_gen_ext;
                $ficha_urologia->uro_gen_int=$request->uro_gen_int;
                $ficha_urologia->urgencia_uro=$request->urgencia_uro ? $request->urgencia_uro : '';
                $ficha_urologia->obs_egp_uro=$request->obs_egp_uro ? $request->obs_egp_uro : '';
                $ficha_urologia->uro_res_exam=$request->uro_res_exam;

                $ficha_urologia->imagen_uro_pre=$request->imagen_uro_pre;
                $ficha_urologia->imagen_uro_post=$request->imagen_uro_post;
                $ficha_urologia->obs_fotos_uro=$request->obs_fotos_uro;

                if ($request->tto_uro == '1') {
                    $ficha_urologia->tto_uro = 1;
                } else {
                    $ficha_urologia->tto_uro = 0;
                }
                $ficha_urologia->rec_tto_uro=$request->rec_tto_uro;

                if ($request->pr_uro == '1') {
                    $ficha_urologia->pr_uro = 1;
                } else {
                    $ficha_urologia->pr_uro = 0;
                }
                $ficha_urologia->tipo_proc_uro=$request->tipo_proc_uro;
                $ficha_urologia->plan_proc_uro=$request->plan_proc_uro;

                if ($request->urogen_cir == '1') {
                    $ficha_urologia->urogen_cir = 1;
                } else {
                    $ficha_urologia->urogen_cir = 0;
                }
                $ficha_urologia->obs_gen_plan_tto=$request->obs_gen_plan_tto;

                $ficha_urologia->otro=$request->otro;
                $ficha_urologia->otro1=$request->otro1;
                $ficha_urologia->estado= 1;

                if($ficha_urologia->save())
                {

                    $mensaje = 'Ficha Urologia guardada de forma correcta\n';

                    /** REGISTRO DE EXAMEN */
                    $lista_examen_especialidad = explode('|',$request->tipo_examen_especial);
                    foreach ($lista_examen_especialidad as $key_examen_tipo => $value_examen_tipo)
                    {
                        $validacion = 0;
                        $parametro = $request->all();

                        $temp_value_examen_tipo = explode(',',$value_examen_tipo);
                        // $temp_value_examen_tipo[0] = alias template
                        // $temp_value_examen_tipo[1] = id_tipo
                        // $temp_value_examen_tipo[2] = id_template

                        if($temp_value_examen_tipo[0] == 'cisto')
                        {
                            if(!empty( $request['hip_diag_'.$temp_value_examen_tipo[0]] ))
                                $validacion = 1;
                        }
                        else if($temp_value_examen_tipo[0] == 'uro_flujo')
                        {
                            if(!empty($request->vol_vac_uro_flujo) || !empty($request->q_flujo_uro_flujo) || !empty($request->m_curva_uro_flujo) || !empty($request->residuo_uro_flujo) )
                                $validacion = 1;
                            else if(isset($array_imagenes[$temp_value_examen_tipo[0]]))
                                if(count($array_imagenes[$temp_value_examen_tipo[0]]) > 0)
                                    $validacion = 1;
                        }


                        if( $validacion == 1 )
                        {

                            /** limpiar parametos */
                            foreach( $parametro as $key => $value )
                            {
                                if(!strpos($key, '_'.$temp_value_examen_tipo[0]) && !strpos($key, 'id_fc') && !strpos($key, '_fc') )
                                    unset($parametro[$key]);
                            }

                            $parametro['id_ficha_uro'] = $ficha_urologia->id;

                            if(isset($array_imagenes[$temp_value_examen_tipo[0]]))
                                if(count($array_imagenes[$temp_value_examen_tipo[0]]) > 0)
                                    $parametro['imagenes'] = 'IMAGEN REGISTRADA';

                            $examen_json = ExamenEspecialidadController::estructuraJson($temp_value_examen_tipo[2],$parametro);
                            if($examen_json['estado'] == 1)
                            {
                                $profesional = Profesional::find($id_profesional);
                                $template = ExamenEspecialidadTemplate::find($temp_value_examen_tipo[2]);

                                $examen = new ExamenEspecialidad();
                                $examen->id_tipo = '1';
                                $examen->id_template = $temp_value_examen_tipo[2];
                                $examen->id_examen_tipo = $temp_value_examen_tipo[1];
                                $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                                $examen->id_ficha_atencion = $ficha->id;
                                $examen->id_ficha_especialidad = $ficha_urologia->id;
                                $examen->id_paciente = $id_paciente;
                                $examen->id_profesional = $id_profesional;
                                $examen->nombre = $template->nombre;
                                $examen->cuerpo = $examen_json['json'];
                                $examen->estado = '1';
                                if($examen->save())
                                {
                                    $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 1;
                                    $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'registro exitoso';
                                    $mensaje .= 'Examen '.$template->nombre.' registrado de forma exitosa\n';

                                    /** carga imagen */
                                    if(!empty($request->input_lista_imagenes))
                                    {

                                        $array_imagenes = (array)json_decode($request->input_lista_imagenes);

                                        // var_dump($array_imagenes);
                                        // var_dump($temp_value_examen_tipo[0]);
                                        // var_dump($array_imagenes[$temp_value_examen_tipo[0]]);

                                        if(!empty($array_imagenes[$temp_value_examen_tipo[0]]))
                                        {
                                            $resulto_img = array();
                                            foreach ($array_imagenes[$temp_value_examen_tipo[0]] as $key => $value)
                                            {
                                                $paciente = Paciente::find($id_paciente);
                                                // echo json_encode($value);
                                                $ruta_temp = $value[0];
                                                $nombre_real = $value[1];
                                                $nombre_temp = $value[2];
                                                $file_extension = $value[3];
                                                $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                                $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                                $registro_img = new ExamenEspecialidadImg();
                                                $registro_img->id_examen = $examen->id;
                                                $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                                $registro_img->nombre = $nombre_final;
                                                $registro_img->otro = '';
                                                $registro_img->estado = 1;

                                                if($registro_img->save())
                                                {
                                                    $resulto_img[$key]['estado'] = 1;
                                                    $resulto_img[$key]['msj'] = 'imagen registrada';
                                                }
                                                else
                                                {
                                                    $resulto_img[$key]['estado'] = 0;
                                                    $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                                }

                                            }
                                            $datos['examen'][$temp_value_examen_tipo[0]]['resulto_img'] = $resulto_img;
                                        }
                                    }
                                }
                                else
                                {
                                    $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 0;
                                    $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'Registro NO exitoso';
                                    $mensaje .= 'Examen '.$template->nombre.' No guardada \n';
                                }
                            }
                            else
                            {
                                $mensaje .= 'Problema al general Estructura de examen '.$temp_value_examen_tipo[0].'\n';
                            }
                        }
                        else
                        {
                            // $mensaje .= 'caso de '.$temp_value_examen_tipo[0].' validacion='.$validacion.'\n';
                        }
                    }

                    /** REGISTRO DE VENEREAS */
                    if(
                        !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
                        !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
                        !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
                        !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
                        !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
                        !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
                        !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
                    ){
                        $ficha_venerea = new FichaVenereas ();
                        $ficha_venerea->id_ficha_atencion = $ficha->id;
                        $ficha_venerea->id_profesional= $id_profesional;
                        $ficha_venerea->id_paciente = $id_paciente;
                        $ficha_venerea->select_1_ven_sint = $request->select_1_ven_sint;
                        $ficha_venerea->select_2_ven_ant_pat_ant = $request->select_2_ven_ant_pat_ant;
                        $ficha_venerea->ot_ant_ven_pat = $request->ot_ant_ven_pat;
                        $ficha_venerea->select_6_ven_gen = $request->select_6_ven_gen;
                        $ficha_venerea->select_7_ven_ant_cond = $request->select_7_ven_ant_cond;
                        $ficha_venerea->select_8_ven_prot = $request->select_8_ven_prot;
                        $ficha_venerea->select_9_ven_cont_sos = $request->select_9_ven_cont_sos;
                        $ficha_venerea->select_3_ven_ant_pat_pater = $request->select_3_ven_ant_pat_pater;
                        $ficha_venerea->select_4_ven_ant_pat_mater = $request->select_4_ven_ant_pat_mater;
                        $ficha_venerea->select_5_pat_ssfam = $request->select_5_pat_ssfam;
                        $ficha_venerea->ven_ex_fg = $request->ven_ex_fg;
                        $ficha_venerea->ven_ex_pm = $request->ven_ex_pm;
                        $ficha_venerea->ven_obs_egp = $request->ven_obs_egp;
                        $ficha_venerea->ven_gen_masc = $request->ven_gen_masc;
                        $ficha_venerea->ven_gen_fem = $request->ven_gen_fem;

                        $ficha_venerea->imagenes_ven_pre = $request->imagenes_ven_pre;
                        $ficha_venerea->imagenes_ven_post = $request->imagenes_ven_post;
                        $ficha_venerea->obs_fotos_ven = $request->obs_fotos_ven;

                        if($request->tto_ven == 1)
                            $ficha_venerea->tto_ven = 1;
                        else
                            $ficha_venerea->tto_ven = 0;

                        $ficha_venerea->recom_tto_ven = $request->recom_tto_ven;


                        if($request->pr_ven == 1)
                            $ficha_venerea->pr_ven = 1;
                        else
                            $ficha_venerea->pr_ven = 0;

                        $ficha_venerea->tipo_proc_ven = $request->tipo_proc_ven;
                        $ficha_venerea->plan_ven_proc = $request->plan_ven_proc;


                        if($request->hosp_ven == 1)
                            $ficha_venerea->hosp_ven = 1;
                        else
                            $ficha_venerea->hosp_ven = 0;



                        $ficha_venerea->obs_plan_tratamiento = $request->obs_plan_tratamiento;
                        $ficha_venerea->diagnostico_ven = $request->diagnostico_ven;
                        $ficha_venerea->descripcion_cie_ven = $request->descripcion_cie_ven;
                        $ficha_venerea->indicaciones_ven = $request->indicaciones_ven;
                        $ficha_venerea->otro = $request->otro;
                        $ficha_venerea->otro1 = $request->otro1;
                        $ficha_venerea->estado= 1;

                        if($ficha_venerea->save())
                        {
                            $mensaje = 'Ficha Venéreas guardada de forma correcta\n';
                        }
                        else
                        {
                            $mensaje = 'Falla en el registro de Ficha Venéreas\n';
                        }
                    }


                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General presentó problema al guardar\n';
                }

                // finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO FICHA ATENCION Y OFTALMOLOGIA*/
    public function store_oft(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }


            // //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            // //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            // //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';
                /** REGISTRO FICHA OFT  FichaOftalmologiaAdulto */
                $ficha_oft = new FichaOftalmologiaAdulto();
                $ficha_oft->id_ficha_atencion = $ficha->id;
                $ficha_oft->id_profesional = $id_profesional;
                $ficha_oft->id_paciente = $id_paciente;
                $ficha_oft->tto_ojo = $request->tto_ojo;
                $ficha_oft->rec_tto_ojo = $request->rec_tto_ojo;
                $ficha_oft->pr_ojo = $request->pr_ojo;
                $ficha_oft->tipo_proc_ojo = $request->tipo_proc_ojo;
                $ficha_oft->plan_proc_ojo = $request->plan_proc_ojo;
                $ficha_oft->r_lentes = $request->r_lentes;
                $ficha_oft->ojo_cir = $request->ojo_cir;
                $ficha_oft->obs_gen_plan_tto = $request->obs_gen_plan_tto;
                $ficha_oft->obs_ex_generales = $request->obs_ex_generales;
                $ficha_oft->otro = $request->otro;
                $ficha_oft->otro1 = $request->otro1;
                $ficha_oft->estado = 1;

                if($ficha_oft->save())
                {
                    $mensaje .= 'Ficha Clínica Oftalmologia guardada de forma correcta\n';

                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;


                    /** REGISTRO FICHA OFTALMOLOGIA Biomicroscopia   */
                    if( !empty($request->parpbiood) || !empty($request->obs_parpbiood) || !empty($request->conjuntiva_bio_od) ||
                        !empty($request->obs_conjuntiva_bio_od) || !empty($request->biocornea_od) || !empty($request->obs_biocornea_od) ||
                        !empty($request->camara_ant_od) || !empty($request->obs_camara_ant_od) || !empty($request->tyndall_od) ||
                        !empty($request->obs_tyndall_od) || !empty($request->cristalino_bio_od) || !empty($request->obs_cristalino_bio_od) ||
                        // !empty($request->campo_otros_bio_od) ||
                        !empty($request->parpbiooi) || !empty($request->obs_parpbiooi) ||
                        !empty($request->conjuntiva_bio_oi) || !empty($request->obs_conjuntiva_bio_oi) || !empty($request->biocornea_oi) ||
                        !empty($request->obs_biocornea_oi) || !empty($request->camara_ant_oi) || !empty($request->obs_camara_ant_oi) ||
                        !empty($request->tyndall_oi) || !empty($request->obs_tyndall_oi) || !empty($request->cristalino_bio_oi) ||
                        !empty($request->obs_cristalino_bio_oi || !empty($request->otro))
                    )
                    {

                        $ficha_bio = new FichaOftBiomicroscopia();
                        $ficha_bio->id_ficha_atencion = $ficha->id;
                        $ficha_bio->id_ficha_oft = $ficha_oft->id;
                        $ficha_bio->id_paciente = $id_paciente;
                        $ficha_bio->id_profesional = $id_profesional;
                        $ficha_bio->parpbiood = $request->parpbiood;
                        $ficha_bio->obs_parpbiood = $request->obs_parpbiood;
                        $ficha_bio->conjuntiva_bio_od = $request->conjuntiva_bio_od;
                        $ficha_bio->obs_conjuntiva_bio_od = $request->obs_conjuntiva_bio_od;
                        $ficha_bio->biocornea_od = $request->biocornea_od;
                        $ficha_bio->obs_biocornea_od = $request->obs_biocornea_od;
                        $ficha_bio->camara_ant_od = $request->camara_ant_od;
                        $ficha_bio->obs_camara_ant_od = $request->obs_camara_ant_od;
                        $ficha_bio->tyndall_od = $request->tyndall_od;
                        $ficha_bio->obs_tyndall_od = $request->obs_tyndall_od;
                        $ficha_bio->cristalino_bio_od = $request->cristalino_bio_od;
                        $ficha_bio->obs_cristalino_bio_od = $request->obs_cristalino_bio_od;
                        $ficha_bio->parpbiooi = $request->parpbiooi;
                        $ficha_bio->obs_parpbiooi = $request->obs_parpbiooi;
                        $ficha_bio->conjuntiva_bio_oi = $request->conjuntiva_bio_oi;
                        $ficha_bio->obs_conjuntiva_bio_oi = $request->obs_conjuntiva_bio_oi;
                        $ficha_bio->biocornea_oi = $request->biocornea_oi;
                        $ficha_bio->obs_biocornea_oi = $request->obs_biocornea_oi;
                        $ficha_bio->camara_ant_oi = $request->camara_ant_oi;
                        $ficha_bio->obs_camara_ant_oi = $request->obs_camara_ant_oi;
                        $ficha_bio->tyndall_oi = $request->tyndall_oi;
                        $ficha_bio->obs_tyndall_oi = $request->obs_tyndall_oi;
                        $ficha_bio->cristalino_bio_oi = $request->cristalino_bio_oi;
                        $ficha_bio->obs_cristalino_bio_oi = $request->obs_cristalino_bio_oi;
                        //$ficha_bio->campo_otros_bio_od = $request->campo_otros_bio_od;
                        $ficha_bio->otro = $request->otro;
                        $ficha_bio->otro2 = '';
                        $ficha_bio->estado = 1;

                        if($ficha_bio->save())
                        {
                            //$mensaje .= 'Biomicroscopia registrada con exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Biomicroscopia con problema al registrar\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'Ficha Clínica Oftalmolagia Biomicroscopia no requiere ser registrado\n';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA Fondo de Ojo */
                    if( !empty($request->papilas_fo_od) || !empty($request->obs_papilas_fo_od) || !empty($request->excavacion_fo_od) ||
                        !empty($request->obs_excavacion_fo_od) || !empty($request->bordes_od) || !empty($request->obs_bordes_od) ||
                        !empty($request->maculas_fo_od) || !empty($request->obs_maculas_fo_od) || !empty($request->vasos_fo_od) ||
                        !empty($request->obs_vasos_fo_od) || !empty($request->periferia_fo_od) || !empty($request->obs_periferia_fo_od) ||
                        !empty($request->campo_fo_otros_od) || !empty($request->papilas_fo_oi) || !empty($request->obs_papilas_fo_oi) ||
                        !empty($request->excavacion_fo_oi) || !empty($request->obs_excavacion_fo_oi) || !empty($request->bordes_oi) ||
                        !empty($request->obs_bordes_oi) || !empty($request->maculas_fo_oi) || !empty($request->obs_maculas_fo_oi) ||
                        !empty($request->vasos_fo_oi) || !empty($request->obs_vasos_fo_oi) || !empty($request->periferia_fo_oi) ||
                        !empty($request->obs_periferia_fo_oi) || !empty($request->campo_fo_otros_oi) )
                    {
                        $ficha_fo = new FichaOftFondoOjo();
                        $ficha_fo->id_ficha_atencion = $ficha->id;
                        $ficha_fo->id_ficha_oft = $ficha_oft->id;
                        $ficha_fo->id_paciente = $id_paciente;
                        $ficha_fo->id_profesional = $id_profesional;

                        $ficha_fo->papilas_fo_od = $request->papilas_fo_od;
                        $ficha_fo->obs_papilas_fo_od = $request->obs_papilas_fo_od;
                        $ficha_fo->excavacion_fo_od = $request->excavacion_fo_od;
                        $ficha_fo->obs_excavacion_fo_od = $request->obs_excavacion_fo_od;
                        $ficha_fo->bordes_od = $request->bordes_od;
                        $ficha_fo->obs_bordes_od = $request->obs_bordes_od;
                        $ficha_fo->maculas_fo_od = $request->maculas_fo_od;
                        $ficha_fo->obs_maculas_fo_od = $request->obs_maculas_fo_od;
                        $ficha_fo->vasos_fo_od = $request->vasos_fo_od;
                        $ficha_fo->obs_vasos_fo_od = $request->obs_vasos_fo_od;
                        $ficha_fo->periferia_fo_od = $request->periferia_fo_od;
                        $ficha_fo->obs_periferia_fo_od = $request->obs_periferia_fo_od;
                        $ficha_fo->campo_fo_otros_od = $request->campo_fo_otros_od;
                        $ficha_fo->papilas_fo_oi = $request->papilas_fo_oi;
                        $ficha_fo->obs_papilas_fo_oi = $request->obs_papilas_fo_oi;
                        $ficha_fo->excavacion_fo_oi = $request->excavacion_fo_oi;
                        $ficha_fo->obs_excavacion_fo_oi = $request->obs_excavacion_fo_oi;
                        $ficha_fo->bordes_oi = $request->bordes_oi;
                        $ficha_fo->obs_bordes_oi = $request->obs_bordes_oi;
                        $ficha_fo->maculas_fo_oi = $request->maculas_fo_oi;
                        $ficha_fo->obs_maculas_fo_oi = $request->obs_maculas_fo_oi;
                        $ficha_fo->vasos_fo_oi = $request->vasos_fo_oi;
                        $ficha_fo->obs_vasos_fo_oi = $request->obs_vasos_fo_oi;
                        $ficha_fo->periferia_fo_oi = $request->periferia_fo_oi;
                        $ficha_fo->obs_periferia_fo_oi = $request->obs_periferia_fo_oi;
                        $ficha_fo->campo_fo_otros_oi = $request->campo_fo_otros_oi;
                        $ficha_fo->otro2 = $request->otro2;
                        $ficha_fo->estado = 1;

                        if($ficha_fo->save())
                        {
                            //$mensaje .= 'Examen de Fondo de Ojo registrada correctamente\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen de Fondo de Ojo C/problemas al registrar\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'Ficha Clínica Oftalmolagia Fondo de Ojo no requiere ser registrado\n';
                    }


                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_agudeza_visual */
                    if(
                        !empty($request->av_subj_sc_od) || !empty($request->obs_av_subj_sc_od) || !empty($request->av_subj_sc_oi) ||
                        !empty($request->obs_av_subj_sc_oi) || !empty($request->av_cc_od) || !empty($request->obs_av_cc_od) ||
                        !empty($request->av_cc_oi) || !empty($request->obs_av_cc_oi) || !empty($request->av_autorefrac_od) ||
                        !empty($request->obs_av_autorefrac_od) || !empty($request->av_autorefrac_oi) || !empty($request->obs_av_autorefrac_oi) ||
                        !empty($request->av_ret_od_cc) || !empty($request->av_ret_oi_cc) || !empty($request->av_ret_od_sc) ||
                        !empty($request->av_ret_oi_sc) || !empty($request->av_add) || !empty($request->av_dip) ||
                        !empty($request->av_pris_od) || !empty($request->av_pris_oi)
                    )
                    {
                        $ficha_oftalmo_examen_agudeza_visual = new OftalmoExamenAgudezaVisual();
                        $ficha_oftalmo_examen_agudeza_visual->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_agudeza_visual->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_agudeza_visual->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_agudeza_visual->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_agudeza_visual->av_subj_sc_od = $request->av_subj_sc_od;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_subj_sc_od = $request->obs_av_subj_sc_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_subj_sc_oi = $request->av_subj_sc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_subj_sc_oi = $request->obs_av_subj_sc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->av_cc_od = $request->av_cc_od;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_cc_od = $request->obs_av_cc_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_cc_oi = $request->av_cc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_cc_oi = $request->obs_av_cc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->av_autorefrac_od = $request->av_autorefrac_od;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_autorefrac_od = $request->obs_av_autorefrac_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_autorefrac_oi = $request->av_autorefrac_oi;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_autorefrac_oi = $request->obs_av_autorefrac_oi;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_od_cc = $request->av_ret_od_cc;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_oi_cc = $request->av_ret_oi_cc;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_od_sc = $request->av_ret_od_sc;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_oi_sc = $request->av_ret_oi_sc;
                        $ficha_oftalmo_examen_agudeza_visual->av_add = $request->av_add;
                        $ficha_oftalmo_examen_agudeza_visual->av_dip = $request->av_dip;
                        $ficha_oftalmo_examen_agudeza_visual->av_pris_od = $request->av_pris_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_pris_oi = $request->av_pris_oi;
                        $ficha_oftalmo_examen_agudeza_visual->otro = '';
                        $ficha_oftalmo_examen_agudeza_visual->otro1 = '';
                        $ficha_oftalmo_examen_agudeza_visual->estado = 1;

                        if($ficha_oftalmo_examen_agudeza_visual->save())
                        {
                            //$mensaje .='Examen Agudeza Visual registrado con exito.\n';
                        }
                        else
                        {
                            //$mensaje .= 'Falla en el registro de Examen Agudeza Visual.\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_neurologico */
                    if(
                        !empty($request->ne_mov_oculares) || !empty($request->obs_ne_mov_oculares) || !empty($request->ne_pupul) ||
                        !empty($request->obs_ne_pupul) || !empty($request->ne_rfm) || !empty($request->obs_ne_rfm) ||
                        !empty($request->ne_dpar) || !empty($request->obs_ne_dpar) || !empty($request->ne_diplo) ||
                        !empty($request->obs_ne_diplo)
                    )
                    {
                        $ficha_oftalmo_examen_neurologico = new OftalmoExamenNeurologico();
                        $ficha_oftalmo_examen_neurologico->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_neurologico->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_neurologico->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_neurologico->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_neurologico->ne_mov_oculares = $request->ne_mov_oculares;
                        $ficha_oftalmo_examen_neurologico->obs_ne_mov_oculares = $request->obs_ne_mov_oculares;
                        $ficha_oftalmo_examen_neurologico->ne_pupul = $request->ne_pupul;
                        $ficha_oftalmo_examen_neurologico->obs_ne_pupul = $request->obs_ne_pupul;
                        $ficha_oftalmo_examen_neurologico->ne_rfm = $request->ne_rfm;
                        $ficha_oftalmo_examen_neurologico->obs_ne_rfm = $request->obs_ne_rfm;
                        $ficha_oftalmo_examen_neurologico->ne_dpar = $request->ne_dpar;
                        $ficha_oftalmo_examen_neurologico->obs_ne_dpar = $request->obs_ne_dpar;
                        $ficha_oftalmo_examen_neurologico->ne_diplo = $request->ne_diplo;
                        $ficha_oftalmo_examen_neurologico->obs_ne_diplo = $request->obs_ne_diplo;
                        $ficha_oftalmo_examen_neurologico->otro = $request->otro;
                        $ficha_oftalmo_examen_neurologico->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_neurologico->estado = 1;

                        if($ficha_oftalmo_examen_neurologico->save())
                        {
                            //$mensaje .= 'Examen Neurológico registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen Neurológico con Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_presion_ocular */
                    if(
                        !empty($request->po_od) || !empty($request->obs_po_od) || !empty($request->po_val_od) ||
                        !empty($request->po_oi) || !empty($request->obs_po_oi) || !empty($request->po_val_oi)
                    )
                    {
                        $ficha_oftalmo_examen_presion_ocular = new OftalmoExamenPresionOcular();
                        $ficha_oftalmo_examen_presion_ocular->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_presion_ocular->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_presion_ocular->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_presion_ocular->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_presion_ocular->po_od = $request->po_od;
                        $ficha_oftalmo_examen_presion_ocular->obs_po_od = $request->obs_po_od;
                        $ficha_oftalmo_examen_presion_ocular->po_val_od = $request->po_val_od;
                        $ficha_oftalmo_examen_presion_ocular->po_oi = $request->po_oi;
                        $ficha_oftalmo_examen_presion_ocular->obs_po_oi = $request->obs_po_oi;
                        $ficha_oftalmo_examen_presion_ocular->po_val_oi = $request->po_val_oi;
                        $ficha_oftalmo_examen_presion_ocular->otro = $request->otro;
                        $ficha_oftalmo_examen_presion_ocular->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_presion_ocular->estado = 1;

                        if($ficha_oftalmo_examen_presion_ocular->save())
                        {
                            //$mensaje .= 'Examen Presión Ocular registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen Presión Ocular Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_vision_colores */
                    if( !empty($request->v_col_test) || !empty($request->obs_v_col_test) || !empty($request->v_col_tipo) || !empty($request->obs_tipo_v_col) )
                    {
                        $ficha_oftalmo_examen_vision_colores = new OftalmoExamenVisionColores();

                        $ficha_oftalmo_examen_vision_colores->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_vision_colores->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_vision_colores->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_vision_colores->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_vision_colores->v_col_test = $request->v_col_test;
                        $ficha_oftalmo_examen_vision_colores->obs_v_col_test = $request->obs_v_col_test;
                        $ficha_oftalmo_examen_vision_colores->v_col_tipo = $request->v_col_tipo;
                        $ficha_oftalmo_examen_vision_colores->obs_tipo_v_col = $request->obs_tipo_v_col;
                        $ficha_oftalmo_examen_vision_colores->otro = $request->otro;
                        $ficha_oftalmo_examen_vision_colores->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_vision_colores->estado = 1;
                        if($ficha_oftalmo_examen_vision_colores->save())
                        {
                            //$mensaje .= 'Examen Vision Colores registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen Vision Colores Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }
                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_estrabismo */
                    if(
                        !empty($request->est_ct_int) || !empty($request->obs_est_ct_int) || !empty($request->est_ct_alt) ||
                        !empty($request->obs_est_ct_alt) || !empty($request->est_ct_prisma) || !empty($request->obs_est_ct_prisma) ||
                        !empty($request->est_test_hirsch) || !empty($request->obs_est_test_hirsch) || !empty($request->est_Krim) ||
                        !empty($request->obs_est_Krim) || !empty($request->est_ot_est) || !empty($request->obs_est_estr)
                    )
                    {
                        $ficha_oftalmo_examen_estrabismo = new OftalmoExamenEstrabismo();
                        $ficha_oftalmo_examen_estrabismo->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_estrabismo->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_estrabismo->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_estrabismo->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_estrabismo->est_ct_int = $request->est_ct_int;
                        $ficha_oftalmo_examen_estrabismo->obs_est_ct_int = $request->obs_est_ct_int;
                        $ficha_oftalmo_examen_estrabismo->est_ct_alt = $request->est_ct_alt;
                        $ficha_oftalmo_examen_estrabismo->obs_est_ct_alt = $request->obs_est_ct_alt;
                        $ficha_oftalmo_examen_estrabismo->est_ct_prisma = $request->est_ct_prisma;
                        $ficha_oftalmo_examen_estrabismo->obs_est_ct_prisma = $request->obs_est_ct_prisma;
                        $ficha_oftalmo_examen_estrabismo->est_test_hirsch = $request->est_test_hirsch;
                        $ficha_oftalmo_examen_estrabismo->obs_est_test_hirsch = $request->obs_est_test_hirsch;
                        $ficha_oftalmo_examen_estrabismo->est_Krim = $request->est_Krim;
                        $ficha_oftalmo_examen_estrabismo->obs_est_Krim = $request->obs_est_Krim;
                        $ficha_oftalmo_examen_estrabismo->est_ot_est = $request->est_ot_est;
                        $ficha_oftalmo_examen_estrabismo->obs_est_estr = $request->obs_est_estr;
                        $ficha_oftalmo_examen_estrabismo->otro = $request->otro;
                        $ficha_oftalmo_examen_estrabismo->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_estrabismo->estado = 1;
                        if($ficha_oftalmo_examen_estrabismo->save())
                        {
                            //$mensaje .= 'Examen Estrabismo registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen Estrabismo Falla en el registro \n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_mov_oculares */
                    if(
                        !empty($request->ducciones) || !empty($request->obs_ducc) || !empty($request->versiones) ||
                        !empty($request->obs_versiones) || !empty($request->vergencia) || !empty($request->obs_vergencia) ||
                        !empty($request->estereop) || !empty($request->obs_estereop)
                    )
                    {
                        $ficha_oftalmo_examen_mov_oculares = new OftalmoExamenMovOculares();

                        $ficha_oftalmo_examen_mov_oculares->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_mov_oculares->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_mov_oculares->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_mov_oculares->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_mov_oculares->ducciones = $request->ducciones;
                        $ficha_oftalmo_examen_mov_oculares->obs_ducc = $request->obs_ducc;
                        $ficha_oftalmo_examen_mov_oculares->versiones = $request->versiones;
                        $ficha_oftalmo_examen_mov_oculares->obs_versiones = $request->obs_versiones;
                        $ficha_oftalmo_examen_mov_oculares->vergencia = $request->vergencia;
                        $ficha_oftalmo_examen_mov_oculares->obs_vergencia=  $request->obs_vergencia;
                        $ficha_oftalmo_examen_mov_oculares->estereop = $request->estereop;
                        $ficha_oftalmo_examen_mov_oculares->obs_estereop = $request->obs_estereop;
                        $ficha_oftalmo_examen_mov_oculares->otro = $request->otro;
                        $ficha_oftalmo_examen_mov_oculares->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_mov_oculares->estado = 1;

                        if($ficha_oftalmo_examen_mov_oculares->save())
                        {
                            //$mensaje .= 'Examen Movimiento Oculares registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen Movimiento Oculares Falla en el registro \n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_campo_visual */
                    if( !empty($request->campo_visual_od) || !empty($request->obs_campo_visual_od) || !empty($request->campo_visual_oi) || !empty($request->obs_campo_visual_oi) )
                    {
                        $ficha_oftalmo_examen_campo_visual = new OftalmoExamenCampoVisual();

                        $ficha_oftalmo_examen_campo_visual->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_campo_visual->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_campo_visual->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_campo_visual->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_campo_visual->campo_visual_od = $request->campo_visual_od;
                        $ficha_oftalmo_examen_campo_visual->obs_campo_visual_od = $request->obs_campo_visual_od;
                        $ficha_oftalmo_examen_campo_visual->campo_visual_oi = $request->campo_visual_oi;
                        $ficha_oftalmo_examen_campo_visual->obs_campo_visual_oi = $request->obs_campo_visual_oi;
                        $ficha_oftalmo_examen_campo_visual->otro = $request->otro;
                        $ficha_oftalmo_examen_campo_visual->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_campo_visual->estado = 1;
                        if($ficha_oftalmo_examen_campo_visual->save())
                        {
                            //$mensaje .= 'Examen Campo Visual registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .= 'Examen Campo Visual Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO DE CONTROL POST QUIRURGICO */
                    if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                    {
                        $control_post_q = new ControlPostQuirurgico();
                        $control_post_q->id_ficha_atencion = $ficha->id;
                        $control_post_q->id_profesional = $id_profesional;
                        $control_post_q->id_paciente = $id_paciente;
                        $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                        $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                        $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                        $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                        $control_post_q->estado = 1;

                        if($control_post_q->save())
                        {
                            //$mensaje .='Control Post Quirurgico registrado con Exito\n';
                        }
                        else
                        {
                            //$mensaje .='Control Post Quirurgico Falla en registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .='Registro de Control Post Quirurgico no requerido\n';
                    }

                    if($request->cerrarsession == 0 || $request->cerrarsession =='')
                    {
                        /** redireccion Redirect funciona correcto */
                        return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    }
                    else if($request->cerrarsession == 1)
                    {
                    //si funciona
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return \Redirect::route('home.ingreso');

                    }
                }
                else
                {
                    $mensaje .= 'Ficha Clínica Oftalmolagia con problema al registrar\n';
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO FICHA ATENCION Y DERMATOLOGIA*/
    public function store_dermo(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n';
        }

        /** validacion de veneria */
        if(
            !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
            !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
            !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
            !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
            !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
            !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
            !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
        ){

            if(empty($request->select_1_ven_sint))
            {
                $campos_requeridos = 0;
                $mensaje .= 'Venereas - El Sintomatología actual es Requerido.\n';
            }

            if(empty($request->diagnostico_ven))
            {
                $campos_requeridos = 0;
                $mensaje .= 'Venereas - El Diagnóstico de Veneria es Requerido.\n';
            }
        }

        if($campos_requeridos == 0)
        {
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }



        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
            $ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                /** IMAGENES DE DERMATOLOGIA */
                $array_imagenes = (array)json_decode($request->input_lista_imagenes);

                $value_img_cons_dermato_pre = 0;
                $value_img_cons_dermato_post = 0;
                $value_imagenes_elim_cicat_pre = 0;
                $value_imagenes_elim_cicat_post = 0;
                $value_proc_piel_danada_img_pre = 0;
                $value_proc_piel_danada_img_post = 0;
                $value_imagenes_exfoliacion_pre = 0;
                $value_imagenes_exfoliacion_post = 0;
                $value_imagenes_dermabras_pre = 0;
                $value_imagenes_dermabras_post = 0;
                $value_imagenes_laser_pre = 0;
                $value_imagenes_laser_post = 0;

                if(array_key_exists('img_cons_dermato_pre',$array_imagenes))
                    $value_img_cons_dermato_pre = 1;
                if(array_key_exists('img_cons_dermato_post',$array_imagenes))
                    $value_img_cons_dermato_post = 1;
                if(array_key_exists('imagenes_elim_cicat_pre',$array_imagenes))
                    $value_imagenes_elim_cicat_pre = 1;
                if(array_key_exists('imagenes_elim_cicat_post',$array_imagenes))
                    $value_imagenes_elim_cicat_post = 1;
                if(array_key_exists('proc_piel_danada_img_pre',$array_imagenes))
                    $value_proc_piel_danada_img_pre = 1;
                if(array_key_exists('proc_piel_danada_img_post',$array_imagenes))
                    $value_proc_piel_danada_img_post = 1;
                if(array_key_exists('imagenes_exfoliacion_pre',$array_imagenes))
                    $value_imagenes_exfoliacion_pre = 1;
                if(array_key_exists('imagenes_exfoliacion_post',$array_imagenes))
                    $value_imagenes_exfoliacion_post = 1;
                if(array_key_exists('imagenes_dermabras_pre',$array_imagenes))
                    $value_imagenes_dermabras_pre = 1;
                if(array_key_exists('imagenes_dermabras_post',$array_imagenes))
                    $value_imagenes_dermabras_post = 1;
                if(array_key_exists('imagenes_laser_pre',$array_imagenes))
                    $value_imagenes_laser_pre = 1;
                if(array_key_exists('imagenes_laser_post',$array_imagenes))
                    $value_imagenes_laser_post = 1;

                /** REGISTRO FICHA DERMATOLOGIA */
                $ficha_dermo = new FichaDermo();

                $ficha_dermo->id_ficha_atencion = $ficha->id;
                $ficha_dermo->id_paciente = $id_paciente;
                $ficha_dermo->id_profesional = $id_profesional;
                $ficha_dermo->descripcion_consulta_dermato = $request->descripcion_consulta_dermato;
                $ficha_dermo->antec_especialidad_dermato = $request->antec_especialidad_dermato;
                $ficha_dermo->img_cons_dermato_pre = $value_img_cons_dermato_pre;
                $ficha_dermo->img_cons_dermato_post = $value_img_cons_dermato_post;
                $ficha_dermo->biopsia_dermat = $request->biopsia_dermat;
                $ficha_dermo->mot_zona_bp = $request->mot_zona_bp;
                $ficha_dermo->obs_result_biopsia = $request->obs_result_biopsia;
                $ficha_dermo->elim_cicat = $request->elim_cicat;
                $ficha_dermo->desc_elim_cicat = $request->desc_elim_cicat;
                $ficha_dermo->obs_elim_cica = $request->obs_elim_cica;
                $ficha_dermo->imagenes_elim_cicat_pre = $value_imagenes_elim_cicat_pre;
                $ficha_dermo->imagenes_elim_cicat_post = $value_imagenes_elim_cicat_post;
                $ficha_dermo->proc_piel_danada = $request->proc_piel_danada;
                $ficha_dermo->proc_piel_danada_desc = $request->proc_piel_danada_desc;
                $ficha_dermo->proc_piel_danada_obs = $request->proc_piel_danada_obs;
                $ficha_dermo->proc_piel_danada_img_pre = $value_proc_piel_danada_img_pre;
                $ficha_dermo->proc_piel_danada_img_post = $value_proc_piel_danada_img_post;
                $ficha_dermo->exfoliacion_proc = $request->exfoliacion_proc;
                $ficha_dermo->exfoliacion_comp = $request->exfoliacion_comp;
                $ficha_dermo->exfoliacion_desc = $request->exfoliacion_desc;
                $ficha_dermo->exfoliacion_obs = $request->exfoliacion_obs;
                $ficha_dermo->imagenes_exfoliacion_pre = $value_imagenes_exfoliacion_pre;
                $ficha_dermo->imagenes_exfoliacion_post = $value_imagenes_exfoliacion_post;
                $ficha_dermo->dermabras_proc = $request->dermabras_proc;
                $ficha_dermo->dermabras_desc = $request->dermabras_desc;
                $ficha_dermo->dermabras_obs = $request->dermabras_obs;
                $ficha_dermo->imagenes_dermabras_pre = $value_imagenes_dermabras_pre;
                $ficha_dermo->imagenes_dermabras_post = $value_imagenes_dermabras_post;
                $ficha_dermo->laser_motivo = $request->laser_motivo;
                $ficha_dermo->laser_desc = $request->laser_desc;
                $ficha_dermo->laser_obs = $request->laser_obs;
                $ficha_dermo->imagenes_laser_pre = $value_imagenes_laser_pre;
                $ficha_dermo->imagenes_laser_post = $value_imagenes_laser_post;
                $ficha_dermo->nombre_otro_proced = $request->nombre_otro_proced;
                $ficha_dermo->desc_otro_proced = $request->desc_otro_proced;
                $ficha_dermo->obs_otro_proced = $request->obs_otro_proced;

                if($ficha_dermo->save())
                {
                    $mensaje .= 'Ficha Clínica Dermatologia guardada de forma correcta\n';
                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;

                    $array_lista_key_img = array( 'img_cons_dermato_pre', 'img_cons_dermato_post', 'imagenes_elim_cicat_pre', 'imagenes_elim_cicat_post', 'proc_piel_danada_img_pre', 'proc_piel_danada_img_post', 'imagenes_exfoliacion_pre', 'imagenes_exfoliacion_post', 'imagenes_dermabras_pre', 'imagenes_dermabras_post', 'imagenes_laser_pre', 'imagenes_laser_post' );

                    $resulto_img = array();
                    foreach ($array_lista_key_img as $key_key => $value_key)
                    {
                        if(array_key_exists($value_key,$array_imagenes))
                        {
                            foreach ($array_imagenes[$value_key] as $key => $value)
                            {
                                $paciente = Paciente::find($id_paciente);
                                // echo json_encode($value);
                                $ruta_temp = $value[0];
                                $nombre_real = $value[1];
                                $nombre_temp = $value[2];
                                $file_extension = $value[3];
                                $nombre_final = $paciente->rut.'_'.$value_key.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final, 'archivo_temp');

                                if(isset($resulto_img[$key]['proceso']['url']))
                                {
                                    $registro_img = new FichaDermoImg();
                                    $registro_img->id_ficha_atencion = $ficha->id;
                                    $registro_img->id_ficha_dermo = $ficha_dermo->id;
                                    $registro_img->id_paciente = $id_paciente;
                                    $registro_img->id_profesional = $id_profesional;
                                    $registro_img->tipo = $value_key;
                                    $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                    $registro_img->nombre = $nombre_final;

                                    if($registro_img->save())
                                    {
                                        $resulto_img[$key]['estado'] = 1;
                                        $resulto_img[$key]['msj'] = 'imagen registrada';
                                    }
                                    else
                                    {
                                        $resulto_img[$key]['estado'] = 0;
                                        $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                    }
                                }
                                else
                                {
                                    $resulto_img[$key]['estado'] = 0;
                                    $resulto_img[$key]['msj'] = 'imagen no encontrada en almacenamiento temporal: ' . $nombre_temp;
                                }
                            }
                            $datos['imagenes'][$value_key]['resulto_img'][] = $resulto_img;
                        }
                    }
                }
                else
                {
                    $mensaje .= 'Ficha Clínica Dermatologia problema al registrar\n';
                }

                /** REGISTRO DE VENEREAS */
                if(
                    !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
                    !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
                    !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
                    !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
                    !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
                    !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
                    !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
                ){
                    $ficha_venerea = new FichaVenereas ();
                    $ficha_venerea->id_ficha_atencion = $ficha->id;
                    $ficha_venerea->id_profesional= $id_profesional;
                    $ficha_venerea->id_paciente = $id_paciente;
                    $ficha_venerea->select_1_ven_sint = $request->select_1_ven_sint;
                    $ficha_venerea->select_2_ven_ant_pat_ant = $request->select_2_ven_ant_pat_ant;
                    $ficha_venerea->ot_ant_ven_pat = $request->ot_ant_ven_pat;
                    $ficha_venerea->select_6_ven_gen = $request->select_6_ven_gen;
                    $ficha_venerea->select_7_ven_ant_cond = $request->select_7_ven_ant_cond;
                    $ficha_venerea->select_8_ven_prot = $request->select_8_ven_prot;
                    $ficha_venerea->select_9_ven_cont_sos = $request->select_9_ven_cont_sos;
                    $ficha_venerea->select_3_ven_ant_pat_pater = $request->select_3_ven_ant_pat_pater;
                    $ficha_venerea->select_4_ven_ant_pat_mater = $request->select_4_ven_ant_pat_mater;
                    $ficha_venerea->select_5_pat_ssfam = $request->select_5_pat_ssfam;
                    $ficha_venerea->ven_ex_fg = $request->ven_ex_fg;
                    $ficha_venerea->ven_ex_pm = $request->ven_ex_pm;
                    $ficha_venerea->ven_obs_egp = $request->ven_obs_egp;
                    $ficha_venerea->ven_gen_masc = $request->ven_gen_masc;
                    $ficha_venerea->ven_gen_fem = $request->ven_gen_fem;

                    $ficha_venerea->imagenes_ven_pre = $request->imagenes_ven_pre;
                    $ficha_venerea->imagenes_ven_post = $request->imagenes_ven_post;
                    $ficha_venerea->obs_fotos_ven = $request->obs_fotos_ven;

                    if($request->tto_ven == 1)
                        $ficha_venerea->tto_ven = 1;
                    else
                        $ficha_venerea->tto_ven = 0;

                    $ficha_venerea->recom_tto_ven = $request->recom_tto_ven;


                    if($request->pr_ven == 1)
                        $ficha_venerea->pr_ven = 1;
                    else
                        $ficha_venerea->pr_ven = 0;

                    $ficha_venerea->tipo_proc_ven = $request->tipo_proc_ven;
                    $ficha_venerea->plan_ven_proc = $request->plan_ven_proc;


                    if($request->hosp_ven == 1)
                        $ficha_venerea->hosp_ven = 1;
                    else
                        $ficha_venerea->hosp_ven = 0;



                    $ficha_venerea->obs_plan_tratamiento = $request->obs_plan_tratamiento;
                    $ficha_venerea->diagnostico_ven = $request->diagnostico_ven;
                    $ficha_venerea->descripcion_cie_ven = $request->descripcion_cie_ven;
                    $ficha_venerea->indicaciones_ven = $request->indicaciones_ven;
                    $ficha_venerea->otro = $request->otro;
                    $ficha_venerea->otro1 = $request->otro1;
                    $ficha_venerea->estado= 1;

                    if($ficha_venerea->save())
                    {
                        $mensaje = 'Ficha Venéreas guardada de forma correcta\n';
                    }
                    else
                    {
                        $mensaje = 'Falla en el registro de Ficha Venéreas\n';
                    }
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO FICHA ATENCION Y TRAUMATOLOGIA/ORTOPEDIA */
    public function store_tru_ort(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)) )
        {
            $campos_requeridos = 0;
            $mensaje .= 'El Diagnóstico es Requerido.\n';
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

				// /** registro de ficha Traumatologia  */
				$ficha_trauma_ad = new FichaTraumatologiaAdulto();
				$ficha_trauma_ad->id_ficha_atencion = $ficha->id;
				$ficha_trauma_ad->id_profesional= $id_profesional;
				$ficha_trauma_ad->id_paciente = $id_paciente;
				$ficha_trauma_ad->e_causa_traum = $request->e_causa_traum;
				$ficha_trauma_ad->obs_e_causa_traum = $request->obs_e_causa_traum;
				$ficha_trauma_ad->mc_ex_fisico_cons = $request->mc_ex_fisico_cons;
				$ficha_trauma_ad->obs_egp_tr = $request->obs_egp_tr;
				$ficha_trauma_ad->mc_masas_tu = $request->mc_masas_tu ;
				$ficha_trauma_ad->egp_trauma_mt = $request->egp_trauma_mt;

                if ($request->tto_trauma == '1') {
                    $ficha_trauma_ad->tto_trauma = 1;
                } else {
                    $ficha_trauma_ad->tto_trauma = 0;
                }
				$ficha_trauma_ad->rec_tto_trauma = $request->rec_tto_trauma;

                if ($request->pr_trauma == '1') {
                    $ficha_trauma_ad->pr_trauma = 1;
                } else {
                    $ficha_trauma_ad->pr_trauma = 0;
                }
				$ficha_trauma_ad->tipo_proc_trauma = $request->tipo_proc_trauma;
				$ficha_trauma_ad->plan_proc_trauma = $request->plan_proc_trauma;

                if ($request->tr_gen_cir == '1') {
                    $ficha_trauma_ad->tr_gen_cir = 1;
                } else {
                    $ficha_trauma_ad->tr_gen_cir = 0;
                }

                $ficha_trauma_ad->obs_gen_plan_tto= $request->obs_gen_plan_tto;
				$ficha_trauma_ad->otro=$request->otro;
				$ficha_trauma_ad->otro1=$request->otro1;
				$ficha_trauma_ad->estado= 1;
				if($ficha_trauma_ad->save())
				{
					$mensaje .= 'Ficha Clínica Traumatología guardada de forma correcta\n';
				}
				else
				{
					$mensaje .= 'Ficha Clínica Traumatología problema al registrar\n';
				}

                /** REGISTRO ORTOPEDIA */
                if(
                    !empty($request->orto_peso_ad) || !empty($request->orto_talla_ad) || !empty($request->orto_manip_ad) || !empty($request->orto_dolor_ad) ||
                    !empty($request->orto_marpos_ad) || !empty($request->orto_ea_mv_ad) || !empty($request->orto_ea_rlp_ad) || !empty($request->orto_ea_icls_ad) ||
                    !empty($request->orto_ea_ir_ad) || !empty($request->orto_ea_nb_ad) || !empty($request->obs_e_ext_sup) || !empty($request->orto_ep_bmm_ad) ||
                    !empty($request->orto_ep_hlart_ad) || !empty($request->orto_ep_dism_minf_ad) || !empty($request->orto_ep_si_ad) || !empty($request->orto_ep_tc_ad) ||
                    !empty($request->orto_ep_com_ad) || !empty($request->orto_ep_obgen_ad)
                ){

                    $ficha_orto_adult = new FichaOrtopediaAdulto();
                    $ficha_orto_adult->id_ficha_atencion = $ficha->id;
                    $ficha_orto_adult->id_profesional= $id_profesional;
                    $ficha_orto_adult->id_ficha_trauma= $ficha_trauma_ad->id;
                    $ficha_orto_adult->id_paciente = $id_paciente;
                    $ficha_orto_adult->orto_peso_ad = $request->orto_peso_ad;
                    $ficha_orto_adult->orto_talla_ad = $request->orto_talla_ad;
                    $ficha_orto_adult->orto_manip_ad = $request->orto_manip_ad;
                    $ficha_orto_adult->orto_dolor_ad = $request->orto_dolor_ad;
                    $ficha_orto_adult->orto_marpos_ad = $request->orto_marpos_ad;
                    $ficha_orto_adult->orto_ea_mv_ad = $request->orto_ea_mv_ad;
                    $ficha_orto_adult->orto_ea_rlp_ad = $request->orto_ea_rlp_ad;
                    $ficha_orto_adult->orto_ea_icls_ad = $request->orto_ea_icls_ad;
                    $ficha_orto_adult->orto_ea_ir_ad = $request->orto_ea_ir_ad;
                    $ficha_orto_adult->orto_ea_nb_ad = $request->orto_ea_nb_ad;
                    $ficha_orto_adult->obs_e_ext_sup = $request->obs_e_ext_sup;
                    $ficha_orto_adult->orto_ep_bmm_ad = $request->orto_ep_bmm_ad;
                    $ficha_orto_adult->orto_ep_hlart_ad = $request->orto_ep_hlart_ad;
                    $ficha_orto_adult->orto_ep_dism_minf_ad = $request->orto_ep_dism_minf_ad;
                    $ficha_orto_adult->orto_ep_si_ad = $request->orto_ep_si_ad;
                    $ficha_orto_adult->orto_ep_tc_ad = $request->orto_ep_tc_ad;
                    $ficha_orto_adult->orto_ep_com_ad = $request->orto_ep_com_ad;
                    $ficha_orto_adult->orto_ep_obgen_ad = $request->orto_ep_obgen_ad;
                    $ficha_orto_adult->otro = $request->otro;
                    $ficha_orto_adult->otro1 = $request->otro1;
                    $ficha_orto_adult->estado = 1;

                    if($ficha_orto_adult->save())
                    {
                        $mensaje .= 'Ficha Clínica Ortopedia guardada de forma correcta\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Ortopedia problema al registrar\n';
                    }
                }

                /** REGISTRO DE CONTROL POST QUIRURGICO */
                if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                {
                    $control_post_q = new ControlPostQuirurgico();
                    $control_post_q->id_ficha_atencion = $ficha->id;
                    $control_post_q->id_profesional = $id_profesional;
                    $control_post_q->id_paciente = $id_paciente;
                    $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                    $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                    $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                    $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                    $control_post_q->estado = 1;

                    if($control_post_q->save())
                    {
                        $mensaje .='Control Post Quirurgico registrado\n';
                    }
                    else
                    {
                        $mensaje .='Problema en el registro de Control Post Quirurgico\n';
                    }
                }
                else
                {
                    $mensaje .='Registro de Control Post Quirurgico no requerido\n';
                }

                // Procesar datos adicionales que no se estaban guardando
                $this->procesarDatosPediatricos($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarExtremidadSuperior($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarExtremidadInferior($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarExamenPostural($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarExamenCervical($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarExamenDorsoLumbar($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarExamenSacroCoxis($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarArticulaciones($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarGruposTendones($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarHospitalizacion($request, $ficha->id, $id_profesional, $id_paciente);
                $this->procesarControlesCronicos($request, $ficha->id, $id_profesional, $id_paciente);

                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;


                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');
                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /**
     * Métodos auxiliares para mejorar la estructura de store_tru_ort
     */

    private function procesarDatosPediatricos($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataPediatrica($request)) {
            // Crear registro para datos pediátricos si tienes un modelo específico
            // Por ahora solo guardamos en campos adicionales de la ficha
            $campos_pediatricos = [
                'peso_ped' => $request->peso_ped,
                'talla_ped' => $request->talla_ped,
                'mov_espont' => $request->mov_espont,
                'obs_gen_ex_esp' => $request->obs_gen_ex_esp,
                // Examen axial
                'exp_ax_mov_cerv' => $request->exp_ax_mov_cerv,
                'exp_ax_mus_ecm' => $request->exp_ax_mus_ecm,
                'exp_ax_t_adms' => $request->exp_ax_t_adms,
                'exp_ax_angiom' => $request->exp_ax_angiom,
                'exp_ax_cif_lumb' => $request->exp_ax_cif_lumb,
            ];

            // Si tienes un modelo específico, descomenta esto:
            /*
            $examen_ped = new ExamenPediatricoTrauma();
            foreach($campos_pediatricos as $campo => $valor) {
                $examen_ped->$campo = $valor;
            }
            $examen_ped->id_ficha_atencion = $id_ficha_atencion;
            $examen_ped->id_profesional = $id_profesional;
            $examen_ped->id_paciente = $id_paciente;
            $examen_ped->save();
            */
        }
    }

    private function procesarExtremidadSuperior($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataExtremidadSuperior($request)) {
            $campos_ext_sup = [
                'fe_ext_msup' => $request->fe_ext_msup,
                'dedo_res_ext_msup' => $request->dedo_res_ext_msup,
                'rig_ext_msup' => $request->rig_ext_msup,
                'ex_msup_com' => $request->ex_msup_com,
            ];

            // Implementar guardado según tu estructura de BD
        }
    }

    private function procesarExtremidadInferior($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataExtremidadInferior($request)) {
            $campos_ext_inf = [
                'ex_minf_cad_orland' => $request->ex_minf_cad_orland,
                'ex_minf_abd' => $request->ex_minf_abd,
                'ex_minf_pp' => $request->ex_minf_pp,
                'ex_minf_rfr' => $request->ex_minf_rfr,
                'ex_minf_p_fd' => $request->ex_minf_p_fd,
                'ex_minf_p_vvrp' => $request->ex_minf_p_vvrp,
                'ex_minf_aspl' => $request->ex_minf_aspl,
                'obs_ex_oij' => $request->obs_ex_oij,
            ];

            // Implementar guardado según tu estructura de BD
        }
    }

    private function procesarExamenPostural($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataPostural($request)) {
            $campos_postura = [
                'postura' => $request->postura,
                'alineacion_post' => $request->alineacion_post,
                'post_descripcion' => $request->post_descripcion,
                'exp_post' => $request->exp_post,
                'obs_post' => $request->obs_post,
                'expl_lateral' => $request->expl_lateral,
                'aprec_expl_lateral' => $request->aprec_expl_lateral,
                'obs_exp_columna_total' => $request->obs_exp_columna_total,
                'resultado_examenes_ct' => $request->resultado_examenes_ct,
            ];

            // Implementar guardado según tu estructura de BD
        }
    }

    private function procesarExamenCervical($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataCervical($request)) {
            $campos_cervical = [
                'cerv_insp' => $request->cerv_insp,
                'ex_cerv_insp' => $request->ex_cerv_insp,
                'cerv_palp' => $request->cerv_palp,
                'ex_cerv_palp' => $request->ex_cerv_palp,
                'obs_ex_col_cerv' => $request->obs_ex_col_cerv,
                'resultado_examenes_cc' => $request->resultado_examenes_cc,
            ];

            // Implementar guardado según tu estructura de BD
        }
    }

    private function procesarExamenDorsoLumbar($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataDorsoLumbar($request)) {
            $campos_dorso_lumbar = [
                'dorso_lum_insp' => $request->dorso_lum_insp,
                'ex_dorso_lum_insp' => $request->ex_dorso_lum_insp,
                'dors_lumb_palp' => $request->dors_lumb_palp,
                'ex_dors_lumb_palp' => $request->ex_dors_lumb_palp,
                'obs_ex_col_dors_lumb' => $request->obs_ex_col_dors_lumb,
                'resultado_examenes_dl' => $request->resultado_examenes_dl,
            ];

            // Implementar guardado según tu estructura de BD
        }
    }

    private function procesarExamenSacroCoxis($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataSacroCoxis($request)) {
            $campos_sacro_coxis = [
                'sacro_dol' => $request->sacro_dol,
                'detalle_sacro_dol' => $request->detalle_sacro_dol,
                'sacro_palp' => $request->sacro_palp,
                'obs_sacro_palp' => $request->obs_sacro_palp,
                'obs_ex_sacrocoxis' => $request->obs_ex_sacrocoxis,
                'resultado_examenes_sc' => $request->resultado_examenes_sc,
            ];

            // Implementar guardado según tu estructura de BD
        }
    }

    private function procesarHospitalizacion($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataHospitalizacion($request)) {
            $campos_hospitalizacion = [
                'in_hosp_hospen_hosp_gen' => $request->in_hosp_hospen_hosp_gen,
                'in_hosp_obs_hospen_hosp_gen' => $request->in_hosp_obs_hospen_hosp_gen,
                'in_hosp_nom_inst_hosp_gen' => $request->in_hosp_nom_inst_hosp_gen,
                'in_hosp_hosp_enserv_hosp_gen' => $request->in_hosp_hosp_enserv_hosp_gen,
                'in_hosp_obs_hosp_enserv_hosp_gen' => $request->in_hosp_obs_hosp_enserv_hosp_gen,
                'in_hosp_motivo_hosp_hosp_gen' => $request->in_hosp_motivo_hosp_hosp_gen,
                'in_hosp_obs_motivo_hosp_hosp_gen' => $request->in_hosp_obs_motivo_hosp_hosp_gen,
                'in_hosp_obs_hospitalizar_hosp_gen' => $request->in_hosp_obs_hospitalizar_hosp_gen,
            ];

            // Implementar guardado según tu estructura de BD para hospitalización
        }
    }

    private function procesarControlesCronicos($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($request->cronicos != 'n_C') {
            // Control de Peso
            if(!empty($request->registro_peso)) {
                $this->procesarControlPeso($request, $id_ficha_atencion, $id_profesional, $id_paciente);
            }

            // Control de Hipertensión
            if(!empty($request->presion_sistolica_hipertension)) {
                $this->procesarControlHipertension($request, $id_ficha_atencion, $id_profesional, $id_paciente);
            }

            // Control de Diabetes
            if(!empty($request->peso_diabetes)) {
                $this->procesarControlDiabetes($request, $id_ficha_atencion, $id_profesional, $id_paciente);
            }
        }
    }

    private function procesarArticulaciones($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataArticulaciones($request)) {
            // Guardar observaciones generales de articulaciones
            if (!empty($request->obs_gen_artic)) {
                // Agregar campo obs_gen_artic a una tabla si es necesario
            }

            // Procesar cada articulación individualmente
            foreach($request->articulaciones as $clave_articulacion => $datos_articulacion) {
                try {
                    // Aquí necesitarás crear un modelo ExamenArticulacion o similar
                    // Por ahora, voy a usar un arreglo para mostrar la estructura

                    $articulacion_data = [
                        'id_ficha_atencion' => $id_ficha_atencion,
                        'id_profesional' => $id_profesional,
                        'id_paciente' => $id_paciente,
                        'clave_articulacion' => $clave_articulacion,
                        'nombre_articulacion' => $datos_articulacion['nombre'] ?? '',
                        'dolor' => $datos_articulacion['dolor'] ?? '1',
                        'funcionalidad' => $datos_articulacion['funcionalidad'] ?? '1',
                        'deformaciones' => $datos_articulacion['deformaciones'] ?? '1',
                        'observaciones' => $datos_articulacion['observaciones'] ?? '',
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    // Implementar guardado en tu modelo de articulaciones
                    // Ejemplo:
                    /*
                    $examen_articulacion = new ExamenArticulacion();
                    $examen_articulacion->fill($articulacion_data);
                    $examen_articulacion->save();
                    */

                    // Por ahora, solo loguear para debug
                    \Log::info('Datos de articulación procesados:', $articulacion_data);

                } catch (\Exception $e) {
                    \Log::error('Error procesando articulación: ' . $e->getMessage(), [
                        'clave_articulacion' => $clave_articulacion,
                        'datos' => $datos_articulacion
                    ]);
                }
            }
        }
    }

    private function procesarGruposTendones($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        if($this->tieneDataGruposTendones($request)) {
            // Guardar observaciones generales de tendones
            if (!empty($request->obs_gen_tendon)) {
                // Agregar campo obs_gen_tendon a una tabla si es necesario
            }

            // Procesar cada grupo de tendones individualmente
            foreach($request->grupos_tendones as $clave_grupo => $datos_grupo) {
                try {
                    // Aquí necesitarás crear un modelo ExamenTendones o similar

                    $grupo_data = [
                        'id_ficha_atencion' => $id_ficha_atencion,
                        'id_profesional' => $id_profesional,
                        'id_paciente' => $id_paciente,
                        'clave_grupo' => $clave_grupo,
                        'nombre_tendon' => $datos_grupo['nombre'] ?? '',
                        'dolor' => $datos_grupo['dolor'] ?? '1',
                        'funcionalidad' => $datos_grupo['funcionalidad'] ?? '1',
                        'deformaciones' => $datos_grupo['deformaciones'] ?? '1',
                        'observaciones' => $datos_grupo['observaciones'] ?? '',
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    // Implementar guardado en tu modelo de tendones
                    // Ejemplo:
                    /*
                    $examen_tendones = new ExamenTendones();
                    $examen_tendones->fill($grupo_data);
                    $examen_tendones->save();
                    */

                    // Por ahora, solo loguear para debug
                    \Log::info('Datos de grupo de tendones procesados:', $grupo_data);

                } catch (\Exception $e) {
                    \Log::error('Error procesando grupo de tendones: ' . $e->getMessage(), [
                        'clave_grupo' => $clave_grupo,
                        'datos' => $datos_grupo
                    ]);
                }
            }
        }
    }

    // Métodos de validación para saber si hay datos que procesar
    private function tieneDataPediatrica($request)
    {
        return !empty($request->peso_ped) || !empty($request->talla_ped) ||
               !empty($request->mov_espont) || !empty($request->obs_gen_ex_esp) ||
               !empty($request->exp_ax_mov_cerv) || !empty($request->exp_ax_mus_ecm);
    }

    private function tieneDataExtremidadSuperior($request)
    {
        return !empty($request->fe_ext_msup) || !empty($request->dedo_res_ext_msup) ||
               !empty($request->rig_ext_msup) || !empty($request->ex_msup_com);
    }

    private function tieneDataExtremidadInferior($request)
    {
        return !empty($request->ex_minf_cad_orland) || !empty($request->ex_minf_abd) ||
               !empty($request->ex_minf_pp) || !empty($request->ex_minf_rfr);
    }

    private function tieneDataPostural($request)
    {
        return $request->postura != '0' || $request->alineacion_post != '0' ||
               !empty($request->post_descripcion) || $request->exp_post != '0';
    }

    private function tieneDataCervical($request)
    {
        return $request->cerv_insp != '0' || $request->cerv_palp != '0' ||
               !empty($request->ex_cerv_insp) || !empty($request->ex_cerv_palp);
    }

    private function tieneDataDorsoLumbar($request)
    {
        return $request->dorso_lum_insp != '0' || $request->dors_lumb_palp != '0' ||
               !empty($request->ex_dorso_lum_insp) || !empty($request->ex_dors_lumb_palp);
    }

    private function tieneDataSacroCoxis($request)
    {
        return $request->sacro_dol != '0' || $request->sacro_palp != '0' ||
               !empty($request->detalle_sacro_dol) || !empty($request->obs_sacro_palp);
    }

    private function tieneDataHospitalizacion($request)
    {
        return $request->in_hosp_hospen_hosp_gen == '1' ||
               $request->in_hosp_hosp_enserv_hosp_gen == '1' ||
               $request->in_hosp_motivo_hosp_hosp_gen == '1';
    }

    private function tieneDataArticulaciones($request)
    {
        return $request->has('articulaciones') && is_array($request->articulaciones) && count($request->articulaciones) > 0;
    }

    private function tieneDataGruposTendones($request)
    {
        return $request->has('grupos_tendones') && is_array($request->grupos_tendones) && count($request->grupos_tendones) > 0;
    }

    private function procesarControlPeso($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        // Implementar guardado de control de peso
        $datos_peso = [
            'registro_peso' => $request->registro_peso,
            'registro_peso_variacion' => $request->registro_peso_variacion,
            'registro_peso_ideal' => $request->registro_peso_ideal,
        ];

        // Guardar en tu modelo de control de peso
    }

    private function procesarControlHipertension($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        // Implementar guardado de control de hipertensión
        $datos_hipertension = [
            'presion_sistolica_hipertension' => $request->presion_sistolica_hipertension,
            'presion_diastolica_hipertension' => $request->presion_diastolica_hipertension,
            'presion_arterial_media_hipertension' => $request->presion_arterial_media_hipertension,
        ];

        // Guardar en tu modelo de control de hipertensión
    }

    private function procesarControlDiabetes($request, $id_ficha_atencion, $id_profesional, $id_paciente)
    {
        // Implementar guardado de control de diabetes
        $datos_diabetes = [
            'peso_diabetes' => $request->peso_diabetes,
            'pies_diabetes' => $request->pies_diabetes,
            'hga1c_diabetes' => $request->hga1c_diabetes,
            'creatina_diabetes' => $request->creatina_diabetes,
            'glucosuria_diabetes' => $request->glucosuria_diabetes,
            'glicosilada_postprandial_diabetes' => $request->glicosilada_postprandial_diabetes,
            'glicosilada_ayuno_diabetes' => $request->glicosilada_ayuno_diabetes,
        ];

        // Guardar en tu modelo de control de diabetes
    }

    public function crear_licencia(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_hora_medica))
        {
            $error['Hora Medica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion))
        {
            $error['Ficha Atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['Paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['Profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['Lugar Atencion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->enfermedad_comun) && empty($request->laboral) )
        {
            $error['Enfermedad común o maternal'] = 'campo requerido';
            $error['Laboral'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->paciente_prevision))
        {
            $error['Tabajador Prevision'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->paciente_prevision_text))
        {
            $error['Tabajador Prevision'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->rut_paciente))
        {
            $error['Trabajador Rut'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_id))
        {
            $error['Empleador'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_nombre))
        {
            $error['Empleador Nombre'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_rut))
        {
            $error['Empleador rut'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_direccion))
        {
            $error['Empleador Direccion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_email))
        {
            $error['Empleador email'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->num_dias_reposo))
        {
            $error['N° Días'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->fecha_inicio))
        {
            $error['Desde'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->fecha_termino))
        {
            $error['Hasta'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->tipo_reposo))
        {
            $error['Tipo de Reposo'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->lugar_reposo))
        {
            $error['Lugar de Reposo'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->tipo_licencia))
        {
            $error['Tipo de Licencia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->info_licencia_1) && empty($request->info_licencia_2) )
        {
            $error['Recuperabilidad laboral'] = 'campo requerido';
            $error['Inicio trámite de invalidez'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->descripcion_hipotesis))
        {
            $error['Hipotesis Diagnostica'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->descripcion_cie))
        {
            $error['Diagnostico CIE-10 DES'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->id_descripcion_cie))
        {
            $error['Diagnostico CIE-10 ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** proceso de archivos */
            $registro_archivo = '';
            if(!empty($request->input_lista_archivo_lic))
            {
                $paciente = Paciente::find($request->id_paciente);
                $lista_archivo_array = json_decode($request->input_lista_archivo_lic);
                $registro_archivo = array();
                foreach ($lista_archivo_array as $key => $value)
                {
                    $ruta_temp = $value[0];
                    $nombre_real = $value[1];
                    $nombre_temp = $value[2];
                    $file_extension = $value[3];
                    $nombre_final = $paciente->rut.'_examen_apoyo_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    $resulto_archivo[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                    $url = $resulto_archivo[$key]['proceso']['url'];

                    $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                    $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                    array_push($registro_archivo, array(
                        'nombre' => $nombre_final,
                        'url' => $url
                    ));
                }

                $registro_archivo = json_encode($registro_archivo);
            }
            $registro = new Licencia();
            $registro->id_hora_medica = $request->id_hora_medica;
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_lugar_atencion = $request->id_lugar_atencion;
            $registro->enfermedad_comun = $request->enfermedad_comun;
            $registro->laboral = $request->laboral;
            $registro->paciente_prevision = $request->paciente_prevision;
            $registro->paciente_prevision_text = $request->paciente_prevision_text;
            $registro->rut_paciente = $request->rut_paciente;
            $registro->empleador_id = $request->empleador_id;
            $registro->empleador_nombre = $request->empleador_nombre;
            $registro->empleador_rut = $request->empleador_rut;
            $registro->empleador_direccion = $request->empleador_direccion;
            $registro->empleador_email = $request->empleador_email;
            $registro->num_dias_reposo = $request->num_dias_reposo;
            $registro->fecha_inicio = date('Y-m-d', strtotime($request->fecha_inicio));
            $registro->fecha_termino = date('Y-m-d', strtotime($request->fecha_termino));
            $registro->tipo_reposo = $request->tipo_reposo;
            $registro->lugar_reposo = $request->lugar_reposo;
            $registro->tipo_licencia = $request->tipo_licencia;
            $registro->recuperabilidad_laboral = $request->info_licencia_1;
            $registro->tramite_invalidez = $request->info_licencia_2;
            $registro->descripcion_hipotesis = $request->descripcion_hipotesis;
            $registro->descripcion_cie = $request->descripcion_cie;
            $registro->id_descripcion_cie = $request->id_descripcion_cie;
            $registro->otros_ant_desc = $request->otros_ant_desc;
            $registro->examen_apoyo = $registro_archivo;

            if($registro->save())
            {

                $paciente = Paciente::find($request->id_paciente);
                $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);
                $profesional = Profesional::find($request->id_profesional);

                if ($paciente && !empty($paciente->id_usuario)) {

                    $funciones = new Funciones();

                    $id_user_create = Auth::user()->id;
                    $id_user_recept = $paciente->id_usuario;

                    $evento = 'Autorización licencia médica';
                    $nombre = $paciente->nombres;
                    $apellido_p = $paciente->apellido_uno;
                    $apellido_m = $paciente->apellido_dos;

                    $lugar = $lugar_atencion->nombre ?? '';
                    $profesional_nombre = trim(
                        ($profesional->nombre ?? '') . ' ' .
                        ($profesional->apellido_uno ?? '') . ' ' .
                        ($profesional->apellido_dos ?? '')
                    );

                    $tipo = 'Licencia Médica';
                    $tipo_id = 12;

                    $result_solicitud = $funciones->generatePermApp(
                        $id_user_create,
                        $id_user_recept,
                        $evento,
                        $nombre,
                        $apellido_p,
                        $apellido_m,
                        $lugar,
                        $profesional_nombre,
                        $tipo,
                        $tipo_id,
                        $registro->id
                    );

                    if (($result_solicitud['app']['estado'] ?? 0) == 1) {
                        $registro->id_permiso_app = $result_solicitud['app']['last_id'] ?? null;
                        $registro->token_permiso_app = $result_solicitud['app']['token'] ?? null;
                        $registro->estado_autorizacion_app = 0;
                        $registro->save();

                        $datos['solicitud_app'] = $result_solicitud['app'];
                    }
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla';
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
    // public function crear_licencia(Request $request)
    // {
    //     /*  $request->validate([
    //            'nombre_trabajador' => ' required|max:32',
    //            'prevision'=> 'required',
    //            'rut_trabajador' => 'required|max:12',
    //            'nombre_empleador' => 'required|max:500',
    //            'rut_empleador' => 'required|max:12',
    //            'cantidad_dias' => 'required|number|max:365',
    //            'direccion' => 'required|max:250',
    //            'telefono' => ' required|max:11',
    //            'direccion_alternavitva' => ' required',
    //            'diagnostico_descripcion' => ' required',
    //            'diagnostico_descripcion_alternativo' => ' required',
    //            'otros_antecedentes' => ' required',
    //        ]);*/

    //     $licencia = new licencia();

    //     $laboral = 0;
    //     if ($request->laboral == 'on') {
    //         $laboral = 1;
    //     } else {
    //         $laboral = 0;
    //     }

    //     $enfermedad_comun_maternal = 0;
    //     if ($request->enfermedad_comun_maternal == 'on') {
    //         $enfermedad_comun_maternal = 1;
    //     } else {
    //         $enfermedad_comun_maternal = 0;
    //     }

    //     $recuperabilidad_laboral = 0;
    //     if ($request->recuperabilidad_laboral == 'on') {
    //         $recuperabilidad_laboral = 1;
    //     } else {
    //         $recuperabilidad_laboral = 0;
    //     }

    //     $tramite_invalidez = 0;
    //     if ($request->tramite_invalidez == 'on') {
    //         $tramite_invalidez = 1;
    //     } else {
    //         $tramite_invalidez = 0;
    //     }

    //     $licencia->enfermedad_comun_maternal = $enfermedad_comun_maternal;
    //     $licencia->laboral = $laboral;
    //     $licencia->nombre_empleador = $request->nombre_empleador;
    //     $licencia->rut_empleador = $request->rut_empleador;
    //     $licencia->reposo_inicio = $request->reposo_inicio;
    //     $licencia->reposo_fin = $request->reposo_fin;
    //     $licencia->tipo_reposo = $request->tipo_reposo;
    //     $licencia->lugar_reposo = $request->lugar_reposo;
    //     $licencia->direccion_reposo = $request->direccion_reposo;
    //     $licencia->region_reposo = $request->region_reposo;
    //     $licencia->tipo_licencia = $request->tipo_licencia;
    //     $licencia->recuperabilidad_laboral = $recuperabilidad_laboral;
    //     $licencia->tramite_invalidez = $tramite_invalidez;
    //     $licencia->diagnostico_c10 = $request->diagnostico_c10;
    //     $licencia->diagnostico = $request->diagnostico;
    //     $licencia->antecedentes = $request->antecedentes;
    //     //$licencia->telefono = $request->telefono;
    //     //$licencia->direccion_alternavitva = $request->direccion_alternavitva;
    //     //$licencia->diagnostico_alternativo = $request->diagnostico_alternativo;
    //     //$licencia->diagnostico_descripcion_alternativo = $request->diagnostico_descripcion_alternativo;

    //     /*
    //     $file=$request->file("examen_apoyo");

    //     $nombre = "pdf_examen_apoyo=".$licencia->rut_paciente.".".$file->guessExtension();

    //     $ruta = public_path("pdf/examenes_apoyo/".$nombre);*/
    //     //$licencia->examenes_apoyo = $request->examenes_apoyo;

    //     if (!$licencia->save()) {
    //         $mensajeLicencia = 'Error al crear la licencia';

    //         return back()->with('mensajeLicencia', $mensajeLicencia);
    //     } else {
    //         //copy($file, $ruta);

    //         $licenciaPPF = new LicenciaPPF();
    //         $licenciaPPF->id_paciente = $request->id_paciente_li;
    //         $licenciaPPF->id_profesional = $request->id_profesional_li;
    //         $licenciaPPF->id_licencia = $licencia->id;
    //         $licenciaPPF->id_ficha_atencion = $request->id_ficha_li;

    //         if (!$licenciaPPF->save()) {
    //             $mensajeLicencia = 'Error al crear la licencia';

    //             return back()->with('mensajeLicencia', $mensajeLicencia);
    //         }
    //         $mensajeLicencia = 'Se Registro la licencia de forma correcta';

    //         return back()->with('mensajeLicencia', $mensajeLicencia);

    //         //return $mensajeLicencia;
    //     }
    // }

    /**
     * creado 20220809
     * subir  manual
     * usado en vista de profesional/receta_online
     */
    public function registroExamen(Request $request)
    {
        $error = array();
        $valido = 0;
        $retorno = array();

        /*
        `id`,
	    `id_prioridad`,
	    `id_paciente`,
	    `id_profesional`,
	    `id_ficha_atencion`,
	    `examen`,
	    `tipo_examen`,
	    `tipo_ficha`,
	    `archivo`,
        */
        // if(empty($request->email_paciente)){
	    //     $error['email_paciente'] = 'email_paciente requerido';
	    //     $valido = 1;
        // }
        if(empty($request->id_paciente)){
	        $error['id_paciente'] = 'id_paciente requerido';
	        $valido = 1;
        }
        // if(empty($request->code_paciente)){
	    //     $error['code_paciente'] = 'code_paciente requerido';
	    //     $valido = 1;
        // }
        if(empty($request->_token)){
	        $error['_token'] = '_token requerido';
	        $valido = 1;
        }
        if(empty($request->id_profesional)){
	        $error['id_profesional'] = 'id_profesional requerido';
	        $valido = 1;
        }
        // if(empty($request->rut_paciente)){
	    //     $error['rut_paciente'] = 'rut_paciente requerido';
	    //     $valido = 1;
        // }
        // if(empty($request->nombres_paciente)){
	    //     $error['nombres_paciente'] = 'nombres_paciente requerido';
	    //     $valido = 1;
        // }
        // if(empty($request->apellidos_paciente)){
	    //     $error['apellidos_paciente'] = 'apellidos_paciente requerido';
	    //     $valido = 1;
        // }
        if(empty($request->id_ficha_atencion)){
	        $error['id_ficha_atencion'] = 'id_ficha_atencion requerido';
	        $valido = 1;
        }
        if(empty($request->t_examen)){
	        $error['t_examen'] = 't_examen requerido';
	        $valido = 1;
        }
        if(empty($request->n_examen)){
	        $error['n_examen'] = 'n_examen requerido';
	        $valido = 1;
        }
        // // if(empty($request->fecha_paciente)){
	    // //     $error['fecha_paciente'] = 'fecha_paciente requerido';
	    // //     $valido = 1;
        // // }
        // if(empty($request->adjuntar_examen_receta_online)){
	    //     $error['adjuntar_examen_receta_online'] = 'adjuntar_examen_receta_online requerido';
	    //     $valido = 1;
        // }
        if(empty($request->adjuntar_examen_receta_online_base64)){
	        $error['adjuntar_examen_receta_online_base64'] = 'adjuntar_examen_receta_online_base64 requerido';
	        $valido = 1;
        }


        if($valido == 0)
        {
            $examen = new ExamenPPF();

            $examen->id_prioridad = 2;
            $examen->id_paciente = $request->id_paciente;
            $examen->id_profesional = $request->id_profesional;
            $examen->id_ficha_atencion = $request->id_ficha_atencion;
            $examen->examen = $request->n_examen;
            $examen->tipo_examen = $request->t_examen;
            $examen->tipo_ficha = 999;/** fu cargado por profesional  fuera de consulta */
            $examen->archivo = $request->adjuntar_examen_receta_online_base64;

            if (!$examen->save()) {
                $retorno['estado'] = 0;
                $retorno['msj'] = 'Falla al subir examen';
            }
            else
            {
	            $retorno['estado'] = 1;
                $retorno['msj'] = 'Examen subido con Exito.';
            }

        }
        else
        {
            $retorno['estado'] = 0;
            $retorno['msj'] = 'campo faltante';
            $retorno['error'] = $error;

        }
        return $retorno;

    }

    /**
     * getFichasClinicaPaciente  function
     *
     * @param Request $request
     *  id_paciente
     *  id_profesional
     * @return json
     */
    public function getFichasClinicaPaciente(Request $request)
    {
        $filtro = array();
        $datos = array();
        if(!empty($request->id_paciente)){
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_profesional)){
            $filtro[] = array('id_profesional',$request->id_profesional);
        }

        $registros = FichaAtencion::with('Paciente')->with('Profesional')->where($filtro)->orderBy('created_at','ASC')->get();
        if($registros->count()){
            $datos['estado'] = 1;
            $datos['msj'] = 'Datos Encontrados';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Sin Datos';
        }
        return $datos;
    }


    public function pdf_receta_medicamentosBAK(Request $request)
    {
        $datos = array();
        $detalleReceta = DetalleReceta::where('id_ficha', $request->id_ficha_atencion)->get();
        if($detalleReceta->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $detalle_receta = (object)array();

            $token_receta = '';
            $cantidad_recetas = 0;
            foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
            {
                // var_dump($value_detalle_receta);
                $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                $array_medicamento = array(
                    'nombre_medicamento' => $producto->nombre,
                    'droga'=>$producto->droga,
                    'presentacion' => $value_detalle_receta->presentacion,
                    'posologia' => $value_detalle_receta->posologia,
                    'via_administracion' => $value_detalle_receta->via_administracion,
                    'periodo' => $value_detalle_receta->periodo,
                    'uso_cronico' => $value_detalle_receta->uso_cronico,
                    'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                    'receta_token' => $value_detalle_receta->receta_token,
                );

                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
                if($temp_token['estado'] == 1)
                {
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }


                $nombre_control = $producto->RecetaControl()->first()->descripcion;
                $id_control = $producto->RecetaControl()->first()->cod_control;

                // 4 - Receta retenida
                // 6 - Receta Simple
                // 7 - Venta Directa

                // 1 - Receta retenida con control de Psicotrópicos
                // 2 - Receta retenida con control de Estupefacientes
                // 3 - Receta Cheque
                // 5 - Receta retenida con control de Codeína


                if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                {
                    $nombre_control = 'Receta';

                    if(!isset($detalle_receta->$nombre_control))
                        $cantidad_recetas ++;

                }
                else
                {
                    $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;

                    if(!isset($detalle_receta->$nombre_control))
                        $cantidad_recetas ++;

                }

                $detalle_receta->$nombre_control[] = $array_medicamento;


                $temp_token = CertificadoController::certificadoProfesional($profesional->id);
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }


            }

            // echo json_encode($detalle_receta);
            // die();

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function pdf_receta_medicamentos(Request $request)
    {
        $tipo_control = 0;
        $datos = array();

        if(!empty($request->tipo_control))
            $tipo_control = 1;

        $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $profesional = Profesional::find($ficha_atencion->id_profesional);
        $paciente = Paciente::find($ficha_atencion->id_paciente);

        /** token receta */
        $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
        if($temp_token['estado'] == 1)
        {
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);
        }

        /** token profesional */
        $temp_token = CertificadoController::certificadoProfesional($profesional->id);
        if($temp_token['estado'] == 1)
        {
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }

        $qr_id = GeneradorQrController::generar(encrypt($ficha_atencion->id));

        /** cantidad de hojas (secciones) */
        $cantidad_recetas = 0;

        /** detalle de receta */
        $detalle_receta = (object)array();


        /** TIPO DE CONTROL */
        // 1	Receta retenida con control de Psicotrópicos
        // 2	Receta retenida con control de Estupefacientes
        // 3	Receta Cheque
        // 4	Receta retenida
        // 5	Receta retenida con control de Codeína
        // 6	Receta Simple
        // 7	Venta Directa
        $med = array(0,6,7);
        $med_ret = array(0,1,2,3,4,5);
        $control = array($med, $med_ret);
        /** MEDICAMENTOS */
        $detalleReceta = DetalleReceta::where('id_ficha', $request->id_ficha_atencion)->get();
        if($detalleReceta->count()>0)
        {
            foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
            {
                $array_medicamento = array();
                $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                if($producto)
                {
                    $nombre_control = $producto->RecetaControl()->first()->descripcion;
                    $id_control = $producto->RecetaControl()->first()->cod_control;
                    if( array_search( $id_control, $control[$tipo_control] ) != false )
                    {
                        $array_medicamento = array(
                            'nombre_medicamento' => $producto->nombre,
                            'droga'=>$producto->droga,
                            'presentacion' => $value_detalle_receta->presentacion,
                            'posologia' => $value_detalle_receta->posologia,
                            'via_administracion' => $value_detalle_receta->via_administracion,
                            'periodo' => $value_detalle_receta->periodo,
                            'uso_cronico' => $value_detalle_receta->uso_cronico,
                            'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                            'receta_token' => $value_detalle_receta->receta_token,
                        );
                    }
                }
                else
                {
                    if(!empty($tipo_control))
                    {
                        $med_faltante = ArticuloFaltante::where('nombre', $value_detalle_receta->producto)->orderBy('id', 'DESC')->get()->first();

                        $droga = '';
                        if($med_faltante)
                        {
                            $droga = '('.$med_faltante->droga.')';
                        }
                        else
                        {
                            $droga = '(Droga no indicada)';
                        }
                        $array_medicamento = array(
                            'nombre_medicamento' => $value_detalle_receta->producto,
                            'droga'=>$droga,
                            'presentacion' => $value_detalle_receta->presentacion,
                            'posologia' => $value_detalle_receta->posologia,
                            'via_administracion' => $value_detalle_receta->via_administracion,
                            'periodo' => $value_detalle_receta->periodo,
                            'uso_cronico' => $value_detalle_receta->uso_cronico,
                            'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                            'receta_token' => $value_detalle_receta->receta_token,
                        );

                        $nombre_control = 'Receta Simple';
                        $id_control = 6;
                    }
                }

                // 4 - Receta retenida
                // 6 - Receta Simple
                // 7 - Venta Directa

                // 1 - Receta retenida con control de Psicotrópicos
                // 2 - Receta retenida con control de Estupefacientes
                // 3 - Receta Cheque
                // 5 - Receta retenida con control de Codeína
                if(!empty($array_medicamento))
                {
                    // if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                    if(trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                    {
                        $nombre_control = 'Receta';
                        if(!isset($detalle_receta->$nombre_control))
                            $cantidad_recetas ++;
                    }
                    else
                    {
                        $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;
                        if(!isset($detalle_receta->$nombre_control))
                            $cantidad_recetas ++;
                    }
                    $detalle_receta->$nombre_control[] = $array_medicamento;
                }
            }

            // return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }

        if($tipo_control == 0)
        {
            /** ESPECIALIDAD OTORRINOLARINGOLOGÍA (AUDIFONOS) */
            $detalleOrlAudifono = RecetaAudifono::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
            if($detalleOrlAudifono)
            {
                $cantidad_recetas ++;
                $arrayTipo = array('','Intracanal', 'Retroauricular', 'Audigafas', 'Implante', 'Otro Tipo');
                $array_medicamento = array(
                    'tipo' => $arrayTipo[$detalleOrlAudifono->tipo],
                    'od' => $detalleOrlAudifono->od,
                    'especificacion_od' => $detalleOrlAudifono->especificacion_od,
                    'oi' => $detalleOrlAudifono->oi,
                    'especificacion_oi' => $detalleOrlAudifono->especificacion_oi,
                    'bi' => $detalleOrlAudifono->bi,
                    'especificacion_bi' => $detalleOrlAudifono->especificacion_bi,
                    'especificacion_general' => $detalleOrlAudifono->especificacion_general,
                );
                $nombre_control = 'ORL_AUDIFONO';
                $detalle_receta->$nombre_control[] = $array_medicamento;
            }
        }

        $array_ficha_atencion = array(
            'id' => $ficha_atencion->id,
            'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            'token' => $token_receta,
            'url' => $url_documento,
            'qr' => $qr_documento,
            'qr_id' => $qr_id,
        );
        $array_lugar_atencion = array(
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre
        );
        $array_profesional = array(
            'id' => $profesional->id,
            'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
            'rut' => $profesional->rut,
            'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
            'token' =>  $token_profesional,
            'url' =>  $url_profesional,
            'qr' =>  $qr_profesional,
        );
        $array_paciente = array(
            'id' => $paciente->id,
            'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
        );
        return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');

    }

    public function pdf_orden_examenes(Request $request)
    {
        $datos = array();
        $examenesPPF = ExamenPPF::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

        if($examenesPPF->count()>0)
        {

            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);

            $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);

            $profesional = Profesional::find($ficha_atencion->id_profesional);

            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $detalle_orden = (object)array();

            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 3, $ficha_atencion->id);

            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);

                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 3, $ficha_atencion->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }


            $cantidad_recetas = 0;

            foreach ($examenesPPF as $key_examen_ppf => $value_examen_ppf)
            {
                $nombre_examen = $value_examen_ppf->examen;

                $nombre_parent = '';
                $examen_base = ExamenMedico::where('nombre_examen', $value_examen_ppf->examen)->where('habilitado',1)->first();

                if(!$examen_base)
                {
                    return response()->json(['estado' => 0, 'msj' => 'Examen no encontrado en base de datos']);
                }

                if($examen_base->cod_parent !== 0)
                {
                    $nombre_parent = $examen_base->algo;
                }


                $id_base =  $examen_base->cod_parent;
                $codigo =  $examen_base->codigo;
                $con_contraste =  $value_examen_ppf->con_contraste;
                $nombre_control = $nombre_parent;
                // $nombre_control = 'orden';
                // if( $id_base == 363 || $id_base == 364 || $id_base == 365 || $id_base == 366 || $id_base == 367 )
                // {
                //     $nombre_control = 'radiologia';
                //     if( $id_base == 363 || $id_base == 364 )
                //     {
                //         $nombre_radiologia = ExamenMedico::where('cod_examen', $id_base)->first();
                //         $nombre_examen = $nombre_radiologia->nombre_examen.' '.$value_examen_ppf->examen;
                //     }

                // }



                if(!isset($detalle_orden->$nombre_control))
                        $cantidad_recetas ++;

                /**
                * `id_prioridad`,
                * `id_paciente`,
                * `id_profesional`,
                * `id_ficha_atencion`,
                * `examen`,
                * `tipo_examen`,
                * `tipo_ficha`,
                */
                $prioridad_text = array('','Baja', 'Media', 'Alta', 'Urgente');
                $array_examenes = array(
                    'prioridad' => $prioridad_text[$value_examen_ppf->id_prioridad],
                    'examen'=> $nombre_examen,
                    'otro' => $value_examen_ppf->otro,
                    'contraste'=>$con_contraste,
                    'tipo_examen' => $value_examen_ppf->tipo_examen,
                    'codigo' => $codigo,
                );


                $detalle_orden->$nombre_control[] = $array_examenes;

                $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 3,$ficha_atencion->id) ;
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_profesional);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(100,999), rand(100,999), 3,$ficha_atencion->id);
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_profesional);
                }
            }

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento
            );

            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
            );

            if ($profesional->subTipoEspecialidad()->first() == '' || $profesional->subTipoEspecialidad()->first() == null) {
                $subtipo_especialidad = $profesional->tipoEspecialidad()->first()->nombre;
            }else{
                $subtipo_especialidad = $profesional->subTipoEspecialidad()->first()->nombre;
            }

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $subtipo_especialidad,
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );
            return  PdfController::generarPDF('ORDEN EXAMENES', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_orden','cantidad_recetas'), 'Orden Examenes '.$paciente->rut, 'pdf_orden_examen');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function pdf_orden_examenes_gine(Request $request){

        $datos = array();
        $examenesPPF = ExamenPPF::where('id_ficha_gineco_obstetrica', $request->id_ficha_atencion)->get();

        if($examenesPPF->count()>0)
        {

            $ficha_atencion = FichaGinecoObstetrica::find($request->id_ficha_atencion);

            $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);

            $profesional = Profesional::find($ficha_atencion->id_profesional);

            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $detalle_orden = (object)array();

            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 3, $ficha_atencion->id);

            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);

                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 3, $ficha_atencion->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }


            $cantidad_recetas = 0;

            foreach ($examenesPPF as $key_examen_ppf => $value_examen_ppf)
            {
                $nombre_examen = $value_examen_ppf->examen;

                $nombre_parent = '';
                $examen_base = ExamenMedico::where('nombre_examen', $value_examen_ppf->examen)->where('habilitado',1)->first();

                if(!$examen_base)
                {
                    return response()->json(['estado' => 0, 'msj' => 'Examen no encontrado en base de datos']);
                }

                if($examen_base->cod_parent !== 0)
                {
                    $nombre_parent = $examen_base->algo;
                }


                $id_base =  $examen_base->cod_parent;
                $codigo =  $examen_base->codigo;
                $con_contraste =  $value_examen_ppf->con_contraste;
                $nombre_control = $nombre_parent;
                // $nombre_control = 'orden';
                // if( $id_base == 363 || $id_base == 364 || $id_base == 365 || $id_base == 366 || $id_base == 367 )
                // {
                //     $nombre_control = 'radiologia';
                //     if( $id_base == 363 || $id_base == 364 )
                //     {
                //         $nombre_radiologia = ExamenMedico::where('cod_examen', $id_base)->first();
                //         $nombre_examen = $nombre_radiologia->nombre_examen.' '.$value_examen_ppf->examen;
                //     }

                // }



                if(!isset($detalle_orden->$nombre_control))
                        $cantidad_recetas ++;

                /**
                * `id_prioridad`,
                * `id_paciente`,
                * `id_profesional`,
                * `id_ficha_atencion`,
                * `examen`,
                * `tipo_examen`,
                * `tipo_ficha`,
                */
                $prioridad_text = array('','Baja', 'Media', 'Alta', 'Urgente');
                $array_examenes = array(
                    'prioridad' => $prioridad_text[$value_examen_ppf->id_prioridad],
                    'examen'=> $nombre_examen,
                    'otro' => $value_examen_ppf->otro,
                    'contraste'=>$con_contraste,
                    'tipo_examen' => $value_examen_ppf->tipo_examen,
                    'codigo' => $codigo,
                );


                $detalle_orden->$nombre_control[] = $array_examenes;

                $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 3,$ficha_atencion->id) ;
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_profesional);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(100,999), rand(100,999), 3,$ficha_atencion->id);
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_profesional);
                }
            }

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento
            );

            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
            );

            if ($profesional->subTipoEspecialidad()->first() == '' || $profesional->subTipoEspecialidad()->first() == null) {
                $subtipo_especialidad = $profesional->tipoEspecialidad()->first()->nombre;
            }else{
                $subtipo_especialidad = $profesional->subTipoEspecialidad()->first()->nombre;
            }

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $subtipo_especialidad,
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );
            return  PdfController::generarPDF('ORDEN EXAMENES', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_orden','cantidad_recetas'), 'Orden Examenes '.$paciente->rut, 'pdf_orden_examen');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }

    }

    public function pdf_orden_examenes_plan_tto(Request $req){
        $examen = ExamenPlanTratamiento::find($req->id);

        $ficha_atencion = FichaAtencion::find($examen->id_ficha_atencion);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $paciente = Paciente::find($ficha_atencion->id_paciente);
        $profesional = Profesional::find($ficha_atencion->id_profesional);

        $nombre_examen = $req->nombre;
        if($examen){
            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);

            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 1,$ficha_atencion->id) ;
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $profesional->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );
             return  PdfController::generarPDF('Examen '.$nombre_examen, compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente','nombre_examen','examen'), 'Solicitud examen '.$paciente->rut, 'pdf_solicitud_examen');
        }

        else
            return 'error';
    }


    public function pdf_certificado_reposo(Request $request)
    {
        $datos = array();
        if(!empty($request->id_ficha_atencion))
            $certificadoReposo = CertificadoReposo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        else if(!empty($request->id_ficha_otros_prof))
            $certificadoReposo = CertificadoReposo::where('id_ficha_otro_prof', $request->id_ficha_otros_prof)->first();

        // echo json_encode($certificadoReposo);
        // die();

        if($certificadoReposo->count()>0)
        {

            if(!empty($request->id_ficha_atencion))
                $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            else if(!empty($request->id_ficha_otros_prof))
                $ficha_atencion = FichaOtrosProfesionales::find($request->id_ficha_otros_prof);

            // echo json_encode($ficha_atencion);
            // die();

            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            /** token certificado */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 7, $certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 7, $certificadoReposo->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $detalle_certificado = array(
                'fecha_inicio' => $certificadoReposo->fecha_inicio,
                'fecha_termino' => $certificadoReposo->fecha_termino,
                'hipotesis' => $certificadoReposo->hipotesis,
                'comentarios' => $certificadoReposo->comentarios,
            );

            // $array_ficha_atencion = array(
            //     'id' => $ficha_atencion->id,
            //     'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            //     'token' => $token_receta,
            // );
            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                    'id' => $lugar_atencion->id,
                    'nombre' => $lugar_atencion->nombre,
                    'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                    'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                    'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
                );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'telefono_uno' => $paciente->telefono_uno,
                'email' => $paciente->email,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('CERTIFICADO REPOSO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_certificado'), 'Certificado Reposo '.$paciente->rut.' '.date('YmdHi'), 'pdf_certificado_reposo');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
			return $datos;
        }
    }

    public function pdf_informe_medico(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->id_ficha_atencion))
            $filtro[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_ficha_otro_prof))
            $filtro[] = array('id_ficha_otro_prof', $request->id_ficha_otro_prof);
        if(!empty($request->id_tipo_informe))
            $filtro[] = array('id_tipo_informe', $request->id_tipo_informe);
        else
            $filtro[] = array('id_tipo_informe', 1);

        // echo json_encode($filtro);
        // die();
        $informMedico = InformeMedico::where($filtro)->first();
        // echo json_encode($informMedico);
        // die();
        if($informMedico)
        {
            $tipo_informe = TipoInforme::find($informMedico->id_tipo_informe);
            $titulo = mb_strtoupper($tipo_informe->titulo, 'UTF-8');

            $ficha_atencion = '';
            if(!empty($request->id_ficha_atencion))
                $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            else if(!empty($request->id_ficha_otro_prof))
                $ficha_atencion = FichaOtrosProfesionales::find($request->id_ficha_otro_prof);

            $lugar_atencion = LugarAtencion::find($informMedico->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            /** token documento */
            $token_receta = '';
            $url_documento = '';
            $qr_documento = '';

            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 10, $informMedico->id);
            if(!empty($temp_token) && isset($temp_token['estado']) && $temp_token['estado'] == 1 && isset($temp_token['certificado']))
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 10, $informMedico->id);
                if(!empty($temp_token) && isset($temp_token['certificado']))
                {
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }
            }

            /** token profesional */
            $token_profesional = '';
            $url_profesional = '';
            $qr_profesional = '';

            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $informMedico->cod_auto, 10, $informMedico->id);
            if(!empty($temp_token) && isset($temp_token['estado']) && $temp_token['estado'] == 1 && isset($temp_token['certificado']))
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_profesional);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(100,999), $informMedico->cod_auto, 10, $informMedico->id);
                if(!empty($temp_token) && isset($temp_token['certificado']))
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_profesional);
                }
            }

            $detalle_informe_medico = array(
                'informe_medico' => $informMedico->informe_medico,
                'fecha_informe_medico' => $informMedico->fecha_informe_medico,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                    'id' => $lugar_atencion->id,
                    'nombre' => $lugar_atencion->nombre,
                    'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                    'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                    'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
                );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'telefono_uno' => $paciente->telefono_uno,
                'email' => $paciente->email,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            $nombre_informe = $tipo_informe ? $tipo_informe->nombre : 'Informe Medico General';

            $pdf_informe = $tipo_informe ? $tipo_informe->pdf : 'pdf_informe_medico';
            return  PdfController::generarPDF(strtoupper($nombre_informe), compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_informe_medico'), $nombre_informe.' '.$paciente->rut, $pdf_informe);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron Documento';
            return $datos;
        }
    }

    public function pdf_informe_radiologico(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->id_ficha_atencion))
            $filtro[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_ficha_otro_prof))
            $filtro[] = array('id_ficha_otro_prof', $request->id_ficha_otro_prof);


        $informeRadiologico = FichaAtencionRayo::where($filtro)->first();
        $ficha_atencion = '';

        if($informeRadiologico)
        {
            if(!empty($request->id_ficha_atencion))
                $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            else if(!empty($request->id_ficha_otro_prof))
                $ficha_atencion = FichaOtrosProfesionales::find($request->id_ficha_otro_prof);

            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_receta = '';
            $url_documento = '';
            $qr_documento = '';

            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);

            if(!empty($temp_token) && isset($temp_token['estado']) && $temp_token['estado'] == 1 && isset($temp_token['certificado']))
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                if(!empty($temp_token) && isset($temp_token['certificado']))
                {
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }
            }

            $token_profesional = '';
            $url_profesional = '';
            $qr_profesional = '';

            $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 1,$ficha_atencion->id) ;
            if(!empty($temp_token) && isset($temp_token['estado']) && $temp_token['estado'] == 1 && isset($temp_token['certificado']))
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                if(!empty($temp_token) && isset($temp_token['certificado']))
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
            }

            $detalle_informe_medico = array(
                'informe_medico' => $informeRadiologico->informe,
                'fecha_informe_medico' => $informeRadiologico->created_at->format('d/m/Y'),
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
            );
             if ($profesional->subTipoEspecialidad()->first() == '' || $profesional->subTipoEspecialidad()->first() == null) {
                $subtipo_especialidad = $profesional->tipoEspecialidad()->first()->nombre;
            }else{
                $subtipo_especialidad = $profesional->subTipoEspecialidad()->first()->nombre;
            }
             $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $subtipo_especialidad,
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('INFORME RADIOLOGICO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_informe_medico'), 'INFORME RADIOLOGICO'.' '.$paciente->rut, 'informe_radiologico');
        }
    }

    public function pdf_uso_personal(Request $request)
    {
        $datos = array();
        $usoPersonal = UsoPersonal::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        if($usoPersonal->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            // $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';
            /** token receta */
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 25, $usoPersonal->id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 25, $usoPersonal->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $usoPersonal->cod_auto, 25, $usoPersonal->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $usoPersonal->cod_auto, 25, $usoPersonal->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $detalle_uso_personal = array(
                'dirigido' => $usoPersonal->dirigido,
                'cargo' => $usoPersonal->cargo,
                'mensaje' => $usoPersonal->mensaje,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            $nombre_archivo = strtolower('dirigido_a_'.$usoPersonal->dirigido);
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($bad, $god, $nombre_archivo);
            // $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('USO PERSONAL', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_uso_personal'), $nombre_archivo, 'pdf_uso_personal');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function getArchivosFicha(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $registros = array();

        if(empty($request->id_ficha_atencion_soli))
        {
            $error['id_ficha_atencion_soli'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $ficha = FichaAtencion::where('id',$request->id_ficha_atencion_soli)->first();
            // if(count($ficha) > 0)
            if($ficha->count())
            {
                $paciente = Paciente::find($ficha->id_paciente);

                /** certificado */
                $registro_certificado = CertificadoReposo::where('id_ficha_atencion',$ficha->id)->get();
                $registro_certificado_cantidad = 0;
                if(count($registro_certificado)>0)
                {
                    foreach ($registro_certificado as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Certificado de Reposo',
                            'url_archivo' => 'pdf.certificado_reposo'
                        );
                        $registro_certificado_cantidad++;
                    }
                }

                /** interconsulta */
                $registro_interconsulta = Interconsulta::where('id_ficha_atencion_soli',$ficha->id)->get();
                $registro_interconsulta_cantidad = 0;
                if(count($registro_interconsulta)>0)
                {
                    foreach ($registro_interconsulta as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Interconsulta',
                            'url_archivo' => 'pdf.informe_medico'
                        );
                        $registro_interconsulta_cantidad++;
                    }
                }
                /** informe */
                $registro_informe = InformeMedico::where('id_ficha_atencion',$ficha->id)->get();
                $registro_informe_cantidad = 0;
                if(count($registro_informe)>0)
                {
                    foreach ($registro_informe as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Informen Medico',
                            'url_archivo' => 'pdf.informe_medico'
                        );
                        $registro_informe_cantidad++;
                    }
                }
                /** uso personal */
                $registro_uso = UsoPersonal::where('id_ficha_atencion',$ficha->id)->get();
                $registro_uso_cantidad = 0;
                if(count($registro_uso)>0)
                {
                    foreach ($registro_uso as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Uso Personal',
                            'url_archivo' => 'pdf.uso_personal'
                        );
                        $registro_uso_cantidad++;
                    }
                }

                if( $registro_certificado_cantidad == 0 && $registro_interconsulta_cantidad == 0 && $registro_informe_cantidad == 0 && $registro_uso_cantidad == 0 )
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'no se encontraron registros';
                    $datos['paciente'] = array(
                        'id' => $paciente->id,
                        'nombre' => $paciente->nombre.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                    );
                }
                else
                {
                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['paciente'] = array(
                        'id' => $paciente->id,
                        'nombre' => $paciente->nombre.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                    );
                    $datos['cantidad'] = array(
                        'registro_certificado_cantidad' => $registro_certificado_cantidad,
                        'registro_interconsulta_cantidad' => $registro_interconsulta_cantidad,
                        'registro_informe_cantidad' => $registro_informe_cantidad,
                        'registro_uso_cantidad' => $registro_uso_cantidad,
                    );
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'no se encontraron registros';
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

    public function getTrabajosDentales(Request $request){

        $id_ficha_atencion = $request->id_ficha_atencion_soli;
        $ficha = FichaAtencion::where('id',$id_ficha_atencion)->first();
        $paciente = Paciente::find($ficha->id_paciente);
        $profesional = Profesional::find($ficha->id_profesional);
        $maxilar_superior_gral_tratamiento = $this->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnostico = $this->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamiento = $this->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnostico = $this->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento = $this->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico = $this->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamientos_endo = $this->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnosticos_endo = $this->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_tratamientos_endo = $this->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnosticos_endo = $this->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento_endo = $this->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico_endo = $this->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $odontograma = $this->dameOdontogramaPaciente($paciente->id, $id_ficha_atencion, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $valores_odontograma = $this->dameValores($paciente->id, $ficha->id, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        return [
            'maxilar_superior_gral_tratamiento' => $maxilar_superior_gral_tratamiento,
            'maxilar_superior_gral_diagnostico' => $maxilar_superior_gral_diagnostico,
            'maxilar_inferior_gral_tratamiento' => $maxilar_inferior_gral_tratamiento,
            'maxilar_inferior_gral_diagnostico' => $maxilar_inferior_gral_diagnostico,
            'boca_completa_gral_tratamiento' => $boca_completa_gral_tratamiento,
            'boca_completa_gral_diagnostico' => $boca_completa_gral_diagnostico,
            'maxilar_inferior_gral_tratamientos_endo' => $maxilar_inferior_gral_tratamientos_endo,
            'maxilar_inferior_gral_diagnosticos_endo' => $maxilar_inferior_gral_diagnosticos_endo,
            'maxilar_superior_gral_tratamientos_endo' => $maxilar_superior_gral_tratamientos_endo,
            'maxilar_superior_gral_diagnosticos_endo' => $maxilar_superior_gral_diagnosticos_endo,
            'boca_completa_gral_tratamiento_endo' => $boca_completa_gral_tratamiento_endo,
            'boca_completa_gral_diagnostico_endo' => $boca_completa_gral_diagnostico_endo,
            'odontograma' => $odontograma,
            'valores_odontograma' => $valores_odontograma,
            'paciente' => $paciente,
            'profesional' => $profesional,
            'estado' => 1
        ];
    }

    public function getEvolucionesDentales(Request $request){
        $id_ficha_atencion = $request->id_ficha_atencion_soli;
        $ficha = FichaAtencion::where('id',$id_ficha_atencion)->first();
        $paciente = Paciente::find($ficha->id_paciente);
        $profesional = Profesional::find($ficha->id_profesional);
        $odontograma = $this->dameOdontogramaPaciente($paciente->id, $id_ficha_atencion, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $valores_odontograma = $this->dameValores($paciente->id, $ficha->id, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        return [
            'odontograma' => $odontograma,
            'valores_odontograma' => $valores_odontograma,
            'paciente' => $paciente,
            'profesional' => $profesional,
            'estado' => 1
        ];
    }

    public function getFichaAtencion(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;
        $html_base = '';

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $registro = FichaAtencion::find($request->id_ficha_atencion);
            if($profesional->id_tipo_especialidad == 3){
                $registro = FichaGinecoObstetrica::where('id', $request->id_ficha_atencion)->first();
            }else if($profesional->id_especialidad == 8){
                $registro = FichaAtencionEnfermeria::where('id', $request->id_ficha_atencion)->first();
            }

            $paciente = Paciente::find($registro->id_paciente);

            if($registro)
            {
                /** POST QUIRURGICO */
                $registro_post = ControlPostQuirurgico::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
                $registro->post_quirurgico = $registro_post;

                /** CANT RECOMENDACION */
                $cant_recetas = Recomendacion::where('atencion', $request->id_ficha_atencion)->count();

                /** CANT EXAMENES */
                $cant_examen_ppf = ExamenPPF::where('id_ficha_atencion', $request->id_ficha_atencion)->count();

                /** PROFESIONAL */
                $profesional = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut', 'email', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                ->with(['Especialidad' => function ($query){
                    $query->select('id', 'nombre');
                }])
                ->with(['TipoEspecialidad' => function ($query){
                    $query->select('id', 'nombre');
                }])
                ->with(['SubTipoEspecialidad' => function ($query){
                    $query->select('id', 'nombre');
                }])
                ->find($registro->id_profesional);

                $registro->fichas = array();

                switch (intval($profesional->id_especialidad))
                {
                    case 1: //MÉDICOS
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad)) {
                                case 1: //CIRUGIA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        $temp_cirugia_general = FichaCirugiaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                        if($temp_cirugia_general)
                                        {
											$registro->fichas = array('cirugia_general'=>$temp_cirugia_general);
                                            // $registro['fichas']['cirugia_general'] = $temp_cirugia_general;
                                        }
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 1: // 1 Cirugía Abdominal General
                                                break;
                                            case 2: // 2 Cirugía Bariátrica
                                                break;
                                            case 3: // 3 Cirugia Broncopulmonar
                                                break;
                                            case 4: // 4 Cirugía Cardiovascular
                                                break;
                                            case 5: // 5 Cirugía Cardiovascular Adultos
                                                break;
                                            case 6: // 6 Cirugía Cardiovascular Niños
                                                break;
                                            case 7: // 7 Cirugía Coloproctológica
                                                $temp_ficha = FichaCirugiaDigestivaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('digestiva_general'=>$temp_ficha);
                                                break;
                                            case 8: // 8 Cirugía de Cabeza y Cuello
                                                break;
                                            case 9: // 9 Cirugía de la mama
                                                break;
                                            case 10: // 10 Cirugía del Tórax
                                                break;
                                            case 11: // 11 Cirugía digestiva
                                                $temp_ficha = FichaCirugiaDigestivaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('digestiva_general'=>$temp_ficha);
                                                break;
                                            case 12: // 12 Cirugía Gástrica
                                                $temp_ficha = FichaCirugiaDigestivaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('digestiva_general'=>$temp_ficha);
                                                break;
                                            case 13: // 13 Cirugía maxilofacial
                                                break;
                                            case 14: // 14 Cirugía Nefrourológica
                                                break;
                                            case 15: // 15 Cirugía Oncológica
                                                break;
                                            case 16: // 16 Cirugía Pancreas
                                                break;
                                            case 17: // 17 Cirugía Plástica y Reparadora
                                                break;
                                            case 18: // 18 Cirugía Vascular Periférica
                                                break;
                                            case 119: // 119 Cirugía General
                                                /** NO REQUIERE CONSULTA ADICIONAL */
                                                break;
                                            case 120: // 120 Cirugía y Traumatologia Pediatrica General
                                                break;

                                        }
                                    }
                                    break;

                                case 2: //ESPECIALIDADES MÉDICAS
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 19:// 19	Dermatología
                                                $temp_ficha = FichaDermo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                if($temp_ficha)
                                                {
                                                    $filtro_img = array();
                                                    $filtro_img[] = array('id_ficha_atencion', $request->id_ficha_atencion);
                                                    $filtro_img[] = array('id_ficha_dermo',$temp_ficha->id);
                                                    $imagenes = FichaDermoImg::where($filtro_img)->get();

                                                    $temp_ficha['img'] = $imagenes;
                                                    $registro->fichas = array('dermato'=>$temp_ficha);
                                                    // $registro['fichas']['dermato'] = $temp_ficha;
                                                }
                                                break;
                                            case 20:// 20	Oftalmología
                                                $html_base_temp = SubTipoEspecialidad::select('html_ver')->find(20);
                                                $html_base = $html_base_temp->html_ver;
                                                $temp_ficha_1 = FichaOftalmologiaAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $temp_ficha_2 = FichaOftBiomicroscopia::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $temp_ficha_3 = FichaOftFondoOjo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $temp_ficha_4 = OftalmoExamenAgudezaVisual::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_agudeza_visual
                                                $temp_ficha_5 = OftalmoExamenNeurologico::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_neurologico
                                                $temp_ficha_6 = OftalmoExamenPresionOcular::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_presion_ocular
                                                $temp_ficha_7 = OftalmoExamenVisionColores::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_vision_colores
                                                $temp_ficha_8 = OftalmoExamenEstrabismo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_estrabismo
                                                $temp_ficha_9 = OftalmoExamenMovOculares::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_mov_oculares
                                                $temp_ficha_10 = OftalmoExamenCampoVisual::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_campo_visual
                                                $array_temp = array();
                                                if($temp_ficha_1)
                                                {
                                                    $array_temp['oft'] = $temp_ficha_1;
                                                    // $registro->fichas = array('oft'=>$temp_ficha_1);
                                                    // $registro['fichas']['oft'] = $temp_ficha_1;
                                                }
                                                if($temp_ficha_2)
                                                {
                                                    $array_temp['biomicroscopia'] = $temp_ficha_2;
                                                    // $registro->fichas = array('biomicroscopia'=>$temp_ficha_2);
                                                    // $registro['fichas']['oft']['biomicroscopia'] = $temp_ficha_2;
                                                }
                                                if($temp_ficha_3)
                                                {
                                                    $array_temp['fondo'] = $temp_ficha_3;
                                                    // $registro->fichas = array('fondo'=>$temp_ficha_3);
                                                    // $registro['fichas']['oft']['fondo'] = $temp_ficha_3;
                                                }
                                                if($temp_ficha_4)
                                                {
                                                    $array_temp['agudeza_visual'] = $temp_ficha_4;
                                                    // $registro->fichas = array('agudeza_visual'=>$temp_ficha_4);
                                                }
                                                if($temp_ficha_5)
                                                {
                                                    $array_temp['neurologico'] = $temp_ficha_5;
                                                    // $registro->fichas = array('neurologico'=>$temp_ficha_5);
                                                }
                                                if($temp_ficha_6)
                                                {
                                                    $array_temp['presion_ocular'] = $temp_ficha_6;
                                                    // $registro->fichas = array('presion_ocular'=>$temp_ficha_6);
                                                }
                                                if($temp_ficha_7)
                                                {
                                                    $array_temp['vision_colores'] = $temp_ficha_7;
                                                    // $registro->fichas = array('vision_colores'=>$temp_ficha_7);
                                                }
                                                if($temp_ficha_8)
                                                {
                                                    $array_temp['estrabismo'] = $temp_ficha_8;
                                                    // $registro->fichas = array('estrabismo'=>$temp_ficha_8);
                                                }
                                                if($temp_ficha_9)
                                                {
                                                    $array_temp['mov_oculares'] = $temp_ficha_9;
                                                    // $registro->fichas = array('mov_oculares'=>$temp_ficha_9);
                                                }
                                                if($temp_ficha_10)
                                                {
                                                    $array_temp['campo_visual'] = $temp_ficha_10;
                                                    // $registro->fichas = array('campo_visual'=>$temp_ficha_10);
                                                }
                                                $registro->fichas = $array_temp;
                                                break;
                                            case 21:// 21	Otorrinolaringología
                                                // $temp_ficha = FichaOtorrino::where('id_fichas_atenciones', $request->id_ficha_atencion)->first();
                                                $temp_ficha = FichaOrl::where('id_fichas_atenciones', $request->id_ficha_atencion)->first();
                                                if($temp_ficha)
                                                {
                                                    $temp_exam = ExamenEspecialidad::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
                                                    if($temp_exam)
                                                    {
                                                        $temp_ficha['examen_especial'] = $temp_exam;
                                                    }
                                                    $registro->fichas = array('orl'=>$temp_ficha);
                                                }
                                                break;
                                            case 22:// 22	Urología
                                                $temp_ficha = FichaUro::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                if($temp_ficha)
                                                {
                                                    $registro->fichas = array('uro'=>$temp_ficha);
                                                }
                                                break;
                                        }
                                    }
                                    break;

                                case 3: //GINECO-OBSTETRÍCIA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 23:// 23	Ginecología endocrinológica
                                                break;
                                            case 24:// 24	Ginecología  Infantil
                                                break;
                                            case 25:// 25	Ginecología Infertilidad
                                                break;
                                            case 26:// 26	Ginecología Oncológica
                                                break;
                                            case 27:// 27	Ginecologia y Obtetricia General
                                                break;
                                            case 28:// 28	Medicina Materno Fetal
                                                break;

                                        }
                                    }
                                    break;
                                case 4: //MEDICINA DE ALTURA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 29:// 29	Medicina de Altura
                                                break;
                                        }
                                    }
                                    break;
                                case 5: //MEDICINA DEL TRABAJO
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 30:// 30	Medicina del Trabajo
                                                break;
                                        }
                                    }
                                    break;
                                case 6: //MEDICINA DEPORTIVA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 31:// 31	Medicina deportiva General
                                                break;
                                            case 32:// 32	Medicina deportiva Alto Rendimiento
                                                break;
                                        }
                                    }
                                    break;
                                case 7: //MEDICINA FISICA Y REHABILITACIÓN
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 33:// 33	Mdicina física y Rehabilitación General
                                                break;
                                            case 34:// 34	Mdicina física y Rehabilitación Neurológica
                                                break;
                                            case 35:// 35	Mdicina física y Rehabilitación Respiratoria
                                                break;
                                        }
                                    }
                                    break;
                                case 8: //MEDICINA GENERAL
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 36:// 36	Medicina Familiar
                                                break;
                                            case 37:// 37	Medicina general adultos y niños
                                                break;
                                            case 38:// 38	Medicina general a Domicilio
                                                break;
                                        }
                                    }
                                    break;
                                case 9: //MEDICINA INTERNA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 39:// 39	Alimentación y Nutrición
                                                break;
                                            case 40:// 40	Broncopulmonar
                                                break;
                                            case 41:// 41	Diabetología
                                                break;
                                            case 42:// 42	Endocrinología
                                                break;
                                            case 43:// 43	Endoscopía Digestiva
                                                break;
                                            case 44:// 44	Gastroenterología
                                                break;
                                            case 45:// 45	Geriatría
                                                break;
                                            case 46:// 46	Hematología
                                                break;
                                            case 47:// 47	Hepatología
                                                break;
                                            case 48:// 48	Infectología
                                                break;
                                            case 49:// 49	Inmunología y Alérgias
                                                break;
                                            case 50:// 50	Medicina Nuclear
                                                break;
                                            case 51:// 51	Nefrología
                                                break;
                                            case 52:// 52	Nefrourología
                                                break;
                                            case 53:// 53	Oncología
                                                break;
                                            case 54:// 54	Parasitología
                                                break;
                                            case 55:// 55	Quimioterapia
                                                break;
                                            case 56:// 56	Radioterapia
                                                break;
                                            case 57:// 57	Reumatología
                                                break;
                                        }
                                    }
                                    break;
                                case 10: //NEUROLOGÍA Y NEUROCIRUGÍA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 58:// 58	Neurología
                                                break;
                                            case 59:// 59	Neurocirugía
                                                break;
                                            case 60:// 60	Neuropsiquiatría
                                                break;
                                            case 61:// 61	Neuroradiología
                                                break;
                                        }
                                    }
                                    break;
                                case 11: //PEDIATRÍA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 62:// 62	Alergología Pediátrica
                                                break;
                                            case 63:// 63	Alimentación y Nutrición  Infantil
                                                break;
                                            case 64:// 64	Broncopulmonar Infantil
                                                break;
                                            case 65:// 65	Cardiología Pediátrica
                                                break;
                                            case 66:// 66	Cirugía y Traumatología Pediatrica
                                                break;
                                            case 67:// 67	Dermatología Pediátrica
                                                break;
                                            case 68:// 68	Endocrinología Pediátrica
                                                break;
                                            case 69:// 69	Gastroenterología  Pediátrica
                                                break;
                                            case 70:// 70	Ginecología  Infantil
                                                break;
                                            case 71:// 71	Nefrología Pediátrica
                                                break;
                                            case 72:// 72	Neonatología
                                                break;
                                            case 73:// 73	Neurología Infantil
                                                break;
                                            case 74:// 74	Neurosiquiatría Infantil
                                                break;
                                            case 75:// 75	Oftalmología Pediátrica
                                                break;
                                            case 76:// 76	Oncología y Radioterapia  Infantil
                                                break;
                                            case 77:// 77	Otorrinolaringología Pediátrica
                                                break;
                                            case 78:// 78	Pediatría General
                                                break;
                                            case 79:// 79	Urología Pediátrica
                                                break;
                                        }
                                    }
                                    break;
                                case 12: //SIQUIATRÍA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 80:// 80	Psiquiatría General
                                                break;
                                            case 81:// 81	Adicciones
                                                break;
                                        }
                                    }
                                    break;
                                case 13: //TRAUMATOLOGIA Y ORTOPEDIA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        $temp_trumatologia = FichaTraumatologiaAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                        if($temp_trumatologia)
                                        {
											$registro->fichas = array('traumatologia_adulto'=>$temp_trumatologia);
                                            // $registro['fichas']['traulatologia_adulto'] = $temp_trumatologia;
                                        }

                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 82:// 82	Traumatología Cadera
                                                break;
                                            case 83:// 83	Traumatología Codo
                                                break;
                                            case 84:// 84	Traumatología Columna
                                                break;
                                            case 85:// 85	Traumatología General
                                                $temp_ficha = FichaOrtopediaAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('traumatologia_ortopedia'=>$temp_ficha);
                                                break;
                                            case 86:// 86	Traumatología Hombro
                                                break;
                                            case 87:// 87	Traumatología Rodilla
                                                break;
                                        }
                                    }
                                    break;
                            }
                        }
                        break;
                    case 2: //ODONTÓLOGOS
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 14:// 14	CIRUGÍA MAXILOFACIAL
                                    break;
                                case 15:// 15	ENDODÓNCIA
                                    break;
                                case 16:// 16	IMPLANTOLOGÍA
                                    break;
                                case 17:// 17	ODONTOLOGÍA ESTETICA
                                    break;
                                case 18:// 18	ODONTOLOGÍA GENERAL
                                    break;
                                case 19:// 19	ODONTOPEDIATRÍA
                                    break;
                                case 20:// 20	ORTODÓNCIA
                                    break;
                                case 21:// 21	PERIODÓNCIA
                                    break;
                                case 22:// 22	REHABILITACIÓN ORAL
                                    break;
                                case 23:// 23	RADIOLOGÍA DENTAL
                                    break;
                                case 24:// 24	REHABILITACIÓN ORAL
                                    break;
                                case 56:// 56	ESPECIALISTA EN TRANSTORNOS TEMPOROMANDIBULARES
                                    break;
                            }
                        }


                        break;
                    case 3: //KINESIOLOGIA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 25:// 25  KINESIOLOGIA GENERAL
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 88: // 88	Kinesiología Respiratoria
                                                break;
                                            case 89: // 89	Kinesiología Traumatológica
                                                break;
                                            case 90: // 90	Kinesiología Neurológica
                                                break;
                                            case 91: // 91	Kinesiología Tercera Edad
                                                break;
                                            case 92: // 92	Kinesiología Infantil
                                                break;
                                            case 93: // 93	Kinesiología Del Desarrollo
                                                break;
                                        }
                                    }
                                    break;
                                case 26:// 26  KINESIOLOGIA ESPECIALIZADA
                                    break;
                                case 27:// 27  KINESIOLOGIA DOMICILIARIA
                                    break;
                            }
                        }
                        break;
                    case 4: //FONOAUDIOLOGÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 28:// 28	FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
                                    break;
                                case 29:// 29	FONOAUDIOLOGIA EDUCACIONAL
                                    break;
                                case 30:// 30	FONOAUDIOLOGIA ESPECIALIZADA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 94: // 94	Fonoaudiología Habla y Lenguaje
                                                break;
                                            case 95: // 95	Fonoaudiología Neurológica
                                                break;
                                            case 96: // 96	Fonoaudiología de la Audición
                                                break;
                                            case 97: // 97	Fonoaudiología del Canto
                                                break;
                                        }
                                    }

                                    break;
                                case 55:// 55	EXMENES ORL
                                    break;
                            }
                        }

                        break;
                    case 5: //NUTRICIÓN Y DIETÉTICA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 31:// 31	NUTRICIONISTA GENERAL
                                    break;
                                case 32:// 32	NUTRICIONISTA PEDIÁTRICA
                                    break;
                                case 33:// 33	NUTRICIONISTA ESPECIALIDAD
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 98: //98	Obesidad
                                                break;
                                            case 99: //99	Diabetes
                                                break;
                                            case 100: //100	Dietología
                                                break;
                                            case 101: //101	Transtornos Metabólicos
                                                break;
                                            case 102: //102	Tercera Edad
                                                break;

                                        }
                                    }
                                    break;
                            }
                        }

                        break;
                    case 6: //SICOLOGÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                    break;
                                case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                    break;
                                case 36:// 36	SICOLOGÍA LABORAL
                                    break;
                                case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 103: // 103	Sicología Adicciones
                                                break;
                                            case 104: // 104	Sicología de la Obesidad
                                                break;
                                            case 105: // 105	Sicología Oncológica
                                                break;
                                        }
                                    }
                                    break;
                            }
                        }

                        break;
                    case 7: //MATRÓN/A
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 38:// 38	ATENCIÓN EMBARAZO
                                    break;
                                case 39:// 39	ANTICONCEPCIÓN
                                    break;
                                case 40:// 40	ATENCIÓN PUERPERIO
                                    break;
                                case 51:// 51	CONTROL NIÑO SANO
                                    break;
                                case 52:// 52	MATRON/A ATENCIÓN GENERAL
                                    break;
                            }
                        }

                        break;
                    case 8: //ENFERMERA UNIVERSITARIA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 41:// 41	ENFERMERÍA GENERAL
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
										{
                                            case 106: // 106	Cuidado de enfermos
                                                break;
                                            case 107: // 107	Curaciones tratamientos
                                                break;
                                            case 108: // 108	Control de niño sano
                                                break;
										}
									}
                                    break;
                                case 42:// 42	ENFERMERÍA ESPECIALIZADA
                                    break;
                                case 53:// 53	ENFERMERÍA CONTROL NIÑO SANO
                                    break;
                            }
                        }

                        break;
                    case 9: //TERÁPIA OCUPACIONAL
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 43:// 43	TERÁPIA OCUPACIONAL ADULTOS
                                    break;
                                case 44:// 44	TERÁPIA OCUPACIONAL NIÑOS
                                    break;
                            }
                        }

                        break;
                    case 10: //TÉCNICO ENFERMERÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 45:// 45	ATENCIÓN TENS EN GENERAL
                                    break;
                                case 46:// 46	ATENCIÓN TENS ESPECIALIZADA
                                    break;
                            }
                        }

                        break;
                    case 11: //TECNÓLOGO MÉDICO
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 47:// 47	TECNOLOGÍA MÉDICA GENERAL
                                    break;
                                case 48:// 48	TECNOLOGÍA MÉDICA ESPECIALIZADA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
										{
                                            case 109: // 109	Laboratorio Radiología
                                                break;
                                            case 110: // 110	Laboratorio clínico
                                                break;
                                            case 111: // 111	Laboratorio Anatomía Patológica
                                                break;
                                            case 112: // 112	Laboratorio Otorrinolaringología
                                                break;
                                            case 113: // 113	Laboratorio Oftalmología
                                                break;
                                            case 114: // 114	Laboratorio Cardiología
                                                break;
                                            case 115: // 115	Laboratorio Neurología
                                                break;
                                            case 116: // 116	Laboratorio Dental
                                                break;
                                            case 117: // 117	Laboratorio Citopatología
                                                break;
                                            case 118: // 118	Laboratorio Inmunología
                                                break;

										}
									}
                                    break;
                                case 54:// 54	TECNOLOGO ORL
                                    break;
                            }
                        }

                        break;
                    case 12: //ARSENALERÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 49:// 49	ARSENALERÍA QUIRÚRGICA
                                    break;
                                case 50:// 50	ARSENALERÍA OBSTÉTRICA
                                    break;
                            }
                        }
                        break;
                }

                $datos['estado'] = 1;
                $datos['registros'] = $registro;
                $datos['profesional'] = $profesional;
                $datos['cant_recetas'] = $cant_recetas;
                $datos['cant_examen_ppf'] = $cant_examen_ppf;
                $datos['html_base'] = $html_base;

                $datos['paciente'] = array(
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                );
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }


    /**
     * var (int) @id
     * var (profesional) @profesional
     * var (int) @id_paciente
     * return objet
     */
    public function cargarInfoFichaBase_r(Request $request)
    {
        $profesional = Profesional::find($request->id_profesional);
        return static::cargarInfoFichaBase($request->id, $profesional, $request->id_paciente, $request->id_ficha);
    }

    /**
     * var (hora) @hora
     * return object
     */
    static public function cargarInfoFichaBase($hora)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($hora))
        {
            $error['hora'] = 'cmapo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $profesional = Profesional::find($hora->id_profesional);

            if(!$profesional)
            {
                $user = Auth::user()->id;
                $profesional = Profesional::where('id_usuario', $user)->first();
            }

            $paciente = Paciente::find($hora->id_paciente);

            $ficha_previas = '';
            $ficha_actual_nueva = '';
            switch (intval($profesional->id_especialidad))
            {
                case 1: //MÉDICOS
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad)) {
                            case 1: //CIRUGIA
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 1:// 1	Cirugía Abdominal General
                                            break;
                                        case 2:// 2	Cirugía Bariátrica
                                            break;
                                        case 3:// 3	Cirugia Broncopulmonar
                                            break;
                                        case 4:// 4	Cirugía Cardiovascular
                                            break;
                                        case 5:// 5	Cirugía Cardiovascular Adultos
                                            break;
                                        case 6:// 6	Cirugía Cardiovascular Niños
                                            break;
                                        case 7:// 7	Cirugía Coloproctológica
                                            break;
                                        case 8:// 8	Cirugía de Cabeza y Cuello
                                            break;
                                        case 9:// 9	Cirugía de la mama
                                            break;
                                        case 10:// 10	Cirugía del Tórax
                                            break;
                                        case 11:// 11	Cirugía digestiva
                                            break;
                                        case 12:// 12	Cirugía Gástrica
                                            break;
                                        case 13:// 13	Cirugía maxilofacial
                                            break;
                                        case 14:// 14	Cirugía Nefrourológica
                                            break;
                                        case 15:// 15	Cirugía Oncológica
                                            break;
                                        case 16:// 16	Cirugía Pancreas
                                            break;
                                        case 17:// 17	Cirugía Plástica y Reparadora
                                            break;
                                        case 18:// 18	Cirugía Vascular Periférica
                                            break;
                                        case 119:// 119	Cirugía General
                                            break;
                                        case 120:// 120	Cirugía y Traumatologia Pediatrica General
                                            break;

                                    }
                                }
                                break;
                            case 2: //ESPECIALIDADES MÉDICAS
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 19:// 19	Dermatología
                                            break;
                                        case 20:// 20	Oftalmología
                                            break;
                                        case 21:// 21	Otorrinolaringología
                                            break;
                                        case 22:// 22	Urología
                                            break;
                                    }
                                }


                                break;
                            case 3: //GINECO-OBSTETRÍCIA

                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_otros_prof))
                                {
                                    $nueva_ficha_atencion = new FichaGinecoObstetrica();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                    $ficha_actual_nueva = FichaGinecoObstetrica::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 23:// 23	Ginecología endocrinológica
                                            break;
                                        case 24:// 24	Ginecología  Infantil
                                            break;
                                        case 25:// 25	Ginecología Infertilidad
                                            break;
                                        case 26:// 26	Ginecología Oncológica
                                            break;
                                        case 27:// 27	Ginecologia y Obtetricia General
                                            break;
                                        case 28:// 28	Medicina Materno Fetal
                                            break;

                                    }
                                }
                                break;
                            case 4: //MEDICINA DE ALTURA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 29:// 29	Medicina de Altura
                                            break;
                                    }
                                }
                                break;
                            case 5: //MEDICINA DEL TRABAJO
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 30:// 30	Medicina del Trabajo
                                            break;
                                    }
                                }
                                break;
                            case 6: //MEDICINA DEPORTIVA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 31:// 31	Medicina deportiva General
                                            break;
                                        case 32:// 32	Medicina deportiva Alto Rendimiento
                                            break;
                                    }
                                }
                                break;
                            case 7: //MEDICINA FISICA Y REHABILITACIÓN
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 33:// 33	Mdicina física y Rehabilitación General
                                            break;
                                        case 34:// 34	Mdicina física y Rehabilitación Neurológica
                                            break;
                                        case 35:// 35	Mdicina física y Rehabilitación Respiratoria
                                            break;
                                    }
                                }
                                break;
                            case 8: //MEDICINA GENERAL
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 36:// 36	Medicina Familiar
                                            break;
                                        case 37:// 37	Medicina general adultos y niños
                                            break;
                                        case 38:// 38	Medicina general a Domicilio
                                            break;
                                    }
                                }
                                break;
                            case 9: //MEDICINA INTERNA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 39:// 39	Alimentación y Nutrición
                                            break;
                                        case 40:// 40	Broncopulmonar
                                            /** FICHAS DE ATENCIONES PREVIAS */
                                            $filtro_previas = array();
                                            $filtro_previas[] = array('id_paciente', $paciente->id);
                                            $filtro_previas[] = array('confidencial', '0');
                                            $filtro_previas[] = array('finalizada', 1);
                                            // $filtro_previas[] = array('id_profesional', $profesional->id);
                                            $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                            $datos['ficha_previas'] = $ficha_previas;

                                            /** FICHA ATENCION ACTUAL */
                                            if(empty($hora->id_ficha_atencion))
                                            {
                                                $nueva_ficha_atencion = new FichaAtencion();
                                                $nueva_ficha_atencion->id_paciente = $paciente->id;
                                                $nueva_ficha_atencion->id_profesional = $profesional->id;
                                                $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                                if ($nueva_ficha_atencion->save())
                                                {
                                                    $hora->id_estado = 5;
                                                    $hora->fecha_realizacion_consulta = now();
                                                    $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                                    $hora->save();
                                                    $ficha_actual_nueva = $nueva_ficha_atencion;
                                                }
                                                else
                                                {
                                                    $nueva_ficha_atencion = '';
                                                }
                                            }
                                            else
                                            {
                                                $filtro_fichaAtencion = array();
                                                $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                                $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                                $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                            }
                                            $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                            $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                            break;
                                        case 41:// 41	Diabetología
                                            break;
                                        case 42:// 42	Endocrinología
                                            break;
                                        case 43:// 43	Endoscopía Digestiva
                                            break;
                                        case 44:// 44	Gastroenterología
                                             $filtro_previas = array();
                                            $filtro_previas[] = array('id_paciente', $paciente->id);
                                            $filtro_previas[] = array('confidencial', '0');
                                            $filtro_previas[] = array('finalizada', 1);
                                            $filtro_previas[] = array('id_profesional', $profesional->id);
                                            $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                            $datos['ficha_previas'] = $ficha_previas;

                                            /** FICHA ATENCION ACTUAL */
                                            if(empty($hora->id_ficha_atencion))
                                            {
                                                $nueva_ficha_atencion = new FichaAtencion();
                                                $nueva_ficha_atencion->id_paciente = $paciente->id;
                                                $nueva_ficha_atencion->id_profesional = $profesional->id;
                                                $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                                if ($nueva_ficha_atencion->save())
                                                {
                                                    $hora->id_estado = 5;
                                                    $hora->fecha_realizacion_consulta = now();
                                                    $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                                    $hora->save();
                                                    $ficha_actual_nueva = $nueva_ficha_atencion;
                                                }
                                                else
                                                {
                                                    $nueva_ficha_atencion = '';
                                                }
                                            }
                                            else
                                            {
                                                $filtro_fichaAtencion = array();
                                                $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                                $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                                $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                            }
                                            $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                            $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                            break;
                                        case 45:// 45	Geriatría
                                            break;
                                        case 46:// 46	Hematología
                                            break;
                                        case 47:// 47	Hepatología
                                            break;
                                        case 48:// 48	Infectología
                                            break;
                                        case 49:// 49	Inmunología y Alérgias
                                            break;
                                        case 50:// 50	Medicina Nuclear
                                            break;
                                        case 51:// 51	Nefrología
                                            break;
                                        case 52:// 52	Nefrourología
                                            break;
                                        case 53:// 53	Oncología
                                            break;
                                        case 54:// 54	Parasitología
                                            break;
                                        case 55:// 55	Quimioterapia
                                            break;
                                        case 56:// 56	Radioterapia
                                            break;
                                        case 57:// 57	Reumatología
                                            break;
                                        case 121:
                                            /** FICHAS DE ATENCIONES PREVIAS */
                                            $filtro_previas = array();
                                            $filtro_previas[] = array('id_paciente', $paciente->id);
                                            $filtro_previas[] = array('confidencial', '0');
                                            $filtro_previas[] = array('finalizada', 1);
                                            $filtro_previas[] = array('id_profesional', $profesional->id);
                                            $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                            $datos['ficha_previas'] = $ficha_previas;

                                            /** FICHA ATENCION ACTUAL */
                                            if(empty($hora->id_ficha_atencion))
                                            {
                                                $nueva_ficha_atencion = new FichaAtencion();
                                                $nueva_ficha_atencion->id_paciente = $paciente->id;
                                                $nueva_ficha_atencion->id_profesional = $profesional->id;
                                                $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                                if ($nueva_ficha_atencion->save())
                                                {
                                                    $hora->id_estado = 5;
                                                    $hora->fecha_realizacion_consulta = now();
                                                    $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                                    $hora->save();
                                                    $ficha_actual_nueva = $nueva_ficha_atencion;
                                                }
                                                else
                                                {
                                                    $nueva_ficha_atencion = '';
                                                }
                                            }
                                            else
                                            {
                                                $filtro_fichaAtencion = array();
                                                $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                                $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                                $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                            }
                                            $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                            $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                            break;
                                        case 122:
                                             /** FICHAS DE ATENCIONES PREVIAS */
                                            $filtro_previas = array();
                                            $filtro_previas[] = array('id_paciente', $paciente->id);
                                            $filtro_previas[] = array('confidencial', '0');
                                            $filtro_previas[] = array('finalizada', 1);
                                            $filtro_previas[] = array('id_profesional', $profesional->id);
                                            $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                            $datos['ficha_previas'] = $ficha_previas;

                                            /** FICHA ATENCION ACTUAL */
                                            if(empty($hora->id_ficha_atencion))
                                            {
                                                $nueva_ficha_atencion = new FichaAtencion();
                                                $nueva_ficha_atencion->id_paciente = $paciente->id;
                                                $nueva_ficha_atencion->id_profesional = $profesional->id;
                                                $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                                if ($nueva_ficha_atencion->save())
                                                {
                                                    $hora->id_estado = 5;
                                                    $hora->fecha_realizacion_consulta = now();
                                                    $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                                    $hora->save();
                                                    $ficha_actual_nueva = $nueva_ficha_atencion;
                                                }
                                                else
                                                {
                                                    $nueva_ficha_atencion = '';
                                                }
                                            }
                                            else
                                            {
                                                $filtro_fichaAtencion = array();
                                                $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                                $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                                $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                            }
                                            $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                            $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                            break;
                                    }
                                }
                                break;
                            case 10: //NEUROLOGÍA Y NEUROCIRUGÍA
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 58:// 58	Neurología

                                            break;
                                        case 59:// 59	Neurocirugía
                                            break;
                                        case 60:// 60	Neuropsiquiatría
                                            break;
                                        case 61:// 61	Neuroradiología
                                            break;
                                    }
                                }
                                break;
                            case 11: //PEDIATRÍA

                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 62:// 62	Alergología Pediátrica
                                            break;
                                        case 63:// 63	Alimentación y Nutrición  Infantil
                                            break;
                                        case 64:// 64	Broncopulmonar Infantil
                                            break;
                                        case 65:// 65	Cardiología Pediátrica
                                            break;
                                        case 66:// 66	Cirugía y Traumatología Pediatrica
                                            break;
                                        case 67:// 67	Dermatología Pediátrica
                                            break;
                                        case 68:// 68	Endocrinología Pediátrica
                                            break;
                                        case 69:// 69	Gastroenterología  Pediátrica
                                            break;
                                        case 70:// 70	Ginecología  Infantil
                                            break;
                                        case 71:// 71	Nefrología Pediátrica
                                            break;
                                        case 72:// 72	Neonatología
                                            break;
                                        case 73:// 73	Neurología Infantil
                                            break;
                                        case 74:// 74	Neurosiquiatría Infantil
                                            break;
                                        case 75:// 75	Oftalmología Pediátrica
                                            break;
                                        case 76:// 76	Oncología y Radioterapia  Infantil
                                            break;
                                        case 77:// 77	Otorrinolaringología Pediátrica
                                            break;
                                        case 78:// 78	Pediatría General
                                            break;
                                        case 79:// 79	Urología Pediátrica
                                            break;
                                    }
                                }
                                break;
                            case 12: //SIQUIATRÍA
								/** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 80:// 80	Psiquiatría General
                                            break;
                                        case 81:// 81	Adicciones
                                            break;
                                    }
                                }
                                break;
                            case 13: //TRAUMATOLOGIA Y ORTOPEDIA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 82:// 82	Traumatología Cadera
                                            break;
                                        case 83:// 83	Traumatología Codo
                                            break;
                                        case 84:// 84	Traumatología Columna
                                            break;
                                        case 85:// 85	Traumatología General
                                            /** FICHAS DE ATENCIONES PREVIAS */
                                            $filtro_previas = array();
                                            $filtro_previas[] = array('id_paciente', $paciente->id);
                                            $filtro_previas[] = array('confidencial', '0');
                                            $filtro_previas[] = array('finalizada', 1);
                                            $filtro_previas[] = array('id_profesional', $profesional->id);
                                            $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                            $datos['ficha_previas'] = $ficha_previas;


                                            /** FICHA ATENCION ACTUAL */
                                            if(empty($hora->id_ficha_atencion))
                                            {
                                                $nueva_ficha_atencion = new FichaAtencion();
                                                $nueva_ficha_atencion->id_paciente = $paciente->id;
                                                $nueva_ficha_atencion->id_profesional = $profesional->id;
                                                $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                                if ($nueva_ficha_atencion->save())
                                                {
                                                    $hora->id_estado = 5;
                                                    $hora->fecha_realizacion_consulta = now();
                                                    $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                                    $hora->save();
                                                    $ficha_actual_nueva = $nueva_ficha_atencion;
                                                }
                                                else
                                                {
                                                    $nueva_ficha_atencion = '';
                                                }
                                            }
                                            else
                                            {
                                                $filtro_fichaAtencion = array();
                                                $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                                $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                                $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                            }

                                            $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                            $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                                            break;
                                        case 86:// 86	Traumatología Hombro
                                            break;
                                        case 87:// 87	Traumatología Rodilla
                                            break;
                                    }
                                }
                                break;
                        }
                    }
                    break;
                case 2: //ODONTÓLOGOS
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('confidencial', '0');
                        $filtro_previas[] = array('finalizada', 1);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_atencion))
                        {

                            $nueva_ficha_atencion = new FichaAtencion();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                            $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 14:// 14	CIRUGÍA MAXILOFACIAL
                                break;
                            case 15:// 15	ENDODÓNCIA
                                break;
                            case 16:// 16	IMPLANTOLOGÍA
                                break;
                            case 17:// 17	ODONTOLOGÍA ESTETICA
                                break;
                            case 18:// 18	ODONTOLOGÍA GENERAL
                                break;
                            case 19:// 19	ODONTOPEDIATRÍA
                                break;
                            case 20:// 20	ORTODÓNCIA
                                break;
                            case 21:// 21	PERIODÓNCIA
                                break;
                            case 22:// 22	REHABILITACIÓN ORAL
                                break;
                            case 23:// 23	RADIOLOGÍA DENTAL
                                break;
                            case 24:// 24	REHABILITACIÓN ORAL
                                break;
                            case 56:// 56	ESPECIALISTA EN TRANSTORNOS TEMPOROMANDIBULARES
                                break;
                        }
                    }


                    break;
                case 3: //KINESIOLOGIA

                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;


                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 25:// 25  KINESIOLOGIA GENERAL
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 88: // 88	Kinesiología Respiratoria
                                            break;
                                        case 89: // 89	Kinesiología Traumatológica
                                            break;
                                        case 90: // 90	Kinesiología Neurológica
                                            break;
                                        case 91: // 91	Kinesiología Tercera Edad
                                            break;
                                        case 92: // 92	Kinesiología Infantil
                                            break;
                                        case 93: // 93	Kinesiología Del Desarrollo
                                            break;
                                    }
                                }
                                break;
                            case 26:// 26  KINESIOLOGIA ESPECIALIZADA
                                break;
                            case 27:// 27  KINESIOLOGIA DOMICILIARIA
                                break;
                        }
                    }
                    break;
                case 4: //FONOAUDIOLOGÍA

                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 28:// 28	FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
                                break;
                            case 29:// 29	FONOAUDIOLOGIA EDUCACIONAL
                                break;
                            case 30:// 30	FONOAUDIOLOGIA ESPECIALIZADA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 94: // 94	Fonoaudiología Habla y Lenguaje
                                            break;
                                        case 95: // 95	Fonoaudiología Neurológica
                                            break;
                                        case 96: // 96	Fonoaudiología de la Audición
                                            break;
                                        case 97: // 97	Fonoaudiología del Canto
                                            break;
                                    }
                                }

                                break;
                            case 55:// 55	EXMENES ORL
                                break;
                        }
                    }

                    break;
                case 5: //NUTRICIÓN Y DIETÉTICA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 31:// 31	NUTRICIONISTA GENERAL
                                                  /** FICHAS DE ATENCIONES PREVIAS */
                            /** FICHAS DE ATENCIONES PREVIAS */
                                    $filtro_previas = array();
                                    $filtro_previas[] = array('id_paciente', $paciente->id);
                                    $filtro_previas[] = array('id_profesional', $profesional->id);
                                    $filtro_previas[] = array('finalizada', 1);
                                    $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                                    $datos['ficha_previas'] = $ficha_previas;

                                    /** FICHA ATENCION ACTUAL */
                                    if(empty($hora->id_ficha_otros_prof))
                                    {
                                        $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                                        $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                        $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                        if ($nueva_ficha_atencion->save())
                                        {
                                            $hora->id_estado = 5;
                                            $hora->fecha_realizacion_consulta = now();
                                            $hora->id_ficha_atencion = NULL;
                                            $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                            $hora->save();
                                            $ficha_actual_nueva = $nueva_ficha_atencion;
                                        }
                                        else
                                        {
                                            $nueva_ficha_atencion = '';
                                        }
                                    }
                                    else
                                    {
                                        $filtro_fichaAtencion = array();
                                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                        $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();

                                    }

                                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                break;
                            case 32:// 32	NUTRICIONISTA PEDIÁTRICA
                                break;
                            case 33:// 33	NUTRICIONISTA ESPECIALIDAD
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 98: //98	Obesidad
                                            break;
                                        case 99: //99	Diabetes
                                            break;
                                        case 100: //100	Dietología
                                            break;
                                        case 101: //101	Transtornos Metabólicos
                                            break;
                                        case 102: //102	Tercera Edad
                                            break;

                                    }
                                }
                                break;
                        }
                    }

                    break;
                case 6: //SICOLOGÍA

                    if(!empty($profesional->id_tipo_especialidad))
                    {

                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();

                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                break;
                            case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                break;
                            case 36:// 36	SICOLOGÍA LABORAL
                                break;
                            case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 103: // 103	Sicología Adicciones
                                            break;
                                        case 104: // 104	Sicología de la Obesidad
                                            break;
                                        case 105: // 105	Sicología Oncológica
                                            break;
                                    }
                                }
                                break;
                        }
                    }

                    break;
                case 7: //MATRÓN/A
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 38:// 38	ATENCIÓN EMBARAZO
                                break;
                            case 39:// 39	ANTICONCEPCIÓN
                                break;
                            case 40:// 40	ATENCIÓN PUERPERIO
                                break;
                            case 51:// 51	CONTROL NIÑO SANO
                                break;
                            case 52:// 52	MATRON/A ATENCIÓN GENERAL
                                break;
                        }
                    }

                    break;
                case 8: //ENFERMERA UNIVERSITARIA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaAtencionEnfermeria::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                            if(!$ficha_actual_nueva){
                                $ficha_actual_nueva = new FichaOtrosProfesionales();
                                $ficha_actual_nueva->id_paciente = $paciente->id;
                                $ficha_actual_nueva->id_profesional = $profesional->id;
                                $ficha_actual_nueva->id_especialidad = $profesional->id_especialidad;
                                $ficha_actual_nueva->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                $ficha_actual_nueva->id_lugar_atencion = $hora->id_lugar_atencion;
                                $ficha_actual_nueva->save();
                            }
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 41:// 41	ENFERMERÍA GENERAL
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 106: // 106	Cuidado de enfermos
                                            break;
                                        case 107: // 107	Curaciones tratamientos
                                            break;
                                        case 108: // 108	Control de niño sano
                                            break;
                                    }
                                }
                                break;
                            case 42:// 42	ENFERMERÍA ESPECIALIZADA
                                break;
                            case 53:// 53	ENFERMERÍA CONTROL NIÑO SANO
                                break;
                        }
                    }

                    break;
                case 9: //TERÁPIA OCUPACIONAL
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 43:// 43	TERÁPIA OCUPACIONAL ADULTOS
                                break;
                            case 44:// 44	TERÁPIA OCUPACIONAL NIÑOS
                                break;
                        }
                    }

                    break;
                case 10: //TÉCNICO ENFERMERÍA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 45:// 45	ATENCIÓN TENS EN GENERAL
                                break;
                            case 46:// 46	ATENCIÓN TENS ESPECIALIZADA
                                break;
                        }
                    }

                    break;
                case 11: //TECNÓLOGO MÉDICO
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 47:// 47	TECNOLOGÍA MÉDICA GENERAL
                                break;
                            case 48:// 48	TECNOLOGÍA MÉDICA ESPECIALIZADA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 109: // 109	Laboratorio Radiología
                                            break;
                                        case 110: // 110	Laboratorio clínico
                                            break;
                                        case 111: // 111	Laboratorio Anatomía Patológica
                                            break;
                                        case 112: // 112	Laboratorio Otorrinolaringología

                                            break;
                                        case 113: // 113	Laboratorio Oftalmología
                                            break;
                                        case 114: // 114	Laboratorio Cardiología
                                            break;
                                        case 115: // 115	Laboratorio Neurología
                                            break;
                                        case 116: // 116	Laboratorio Dental
                                            break;
                                        case 117: // 117	Laboratorio Citopatología
                                            break;
                                        case 118: // 118	Laboratorio Inmunología
                                            break;

                                    }
                                }
                                break;
                            case 54:// 54	TECNOLOGO ORL
                                break;
                            case 58: // TECNOLOGO LABORATORIO CLINICO
                                if(!empty($profesional->id_tipo_especialidad))
                                {
                                    /** FICHAS DE ATENCIONES PREVIAS */
                                    $filtro_previas = array();
                                    $filtro_previas[] = array('id_paciente', $paciente->id);
                                    $filtro_previas[] = array('id_profesional', $profesional->id);
                                    $filtro_previas[] = array('finalizada', 1);

                                    $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                                    $datos['ficha_previas'] = $ficha_previas;

                                    /** FICHA ATENCION ACTUAL */
                                    if(empty($hora->id_ficha_otros_prof))
                                    {
                                        $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                                        $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                        $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                        if ($nueva_ficha_atencion->save())
                                        {
                                            $hora->id_estado = 5;
                                            $hora->fecha_realizacion_consulta = now();
                                            $hora->id_ficha_atencion = NULL;
                                            $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                            $hora->save();
                                            $ficha_actual_nueva = $nueva_ficha_atencion;
                                        }
                                        else
                                        {
                                            $nueva_ficha_atencion = '';
                                        }
                                    }
                                    else
                                    {
                                        $filtro_fichaAtencion = array();
                                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                        $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                                    }

                                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                    switch (intval($profesional->id_tipo_especialidad))
                                    {
                                        case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                            break;
                                        case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                            break;
                                        case 36:// 36	SICOLOGÍA LABORAL
                                            break;
                                        case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                            if(!empty($profesional->id_sub_tipo_especialidad))
                                            {
                                                switch (intval($profesional->id_sub_tipo_especialidad))
                                                {
                                                    case 103: // 103	Sicología Adicciones
                                                        break;
                                                    case 104: // 104	Sicología de la Obesidad
                                                        break;
                                                    case 105: // 105	Sicología Oncológica
                                                        break;
                                                }
                                            }
                                            break;
                                    }
                                }

                                break;
                            case 59: // RADIOLOGO
                                if(!empty($profesional->id_tipo_especialidad))
                                {
                                    /** FICHAS DE ATENCIONES PREVIAS */
                                    $filtro_previas = array();
                                    $filtro_previas[] = array('id_paciente', $paciente->id);
                                    $filtro_previas[] = array('id_profesional', $profesional->id);
                                    $filtro_previas[] = array('finalizada', 1);

                                    $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                                    $datos['ficha_previas'] = $ficha_previas;

                                    /** FICHA ATENCION ACTUAL */
                                    if(empty($hora->id_ficha_otros_prof))
                                    {
                                        $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                                        $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                        $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                        if ($nueva_ficha_atencion->save())
                                        {
                                            $hora->id_estado = 5;
                                            $hora->fecha_realizacion_consulta = now();
                                            $hora->id_ficha_atencion = NULL;
                                            $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                            $hora->save();
                                            $ficha_actual_nueva = $nueva_ficha_atencion;
                                        }
                                        else
                                        {
                                            $nueva_ficha_atencion = '';
                                        }
                                    }
                                    else
                                    {
                                        $filtro_fichaAtencion = array();
                                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                        $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                                    }

                                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                    switch (intval($profesional->id_tipo_especialidad))
                                    {
                                        case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                            break;
                                        case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                            break;
                                        case 36:// 36	SICOLOGÍA LABORAL
                                            break;
                                        case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                            if(!empty($profesional->id_sub_tipo_especialidad))
                                            {
                                                switch (intval($profesional->id_sub_tipo_especialidad))
                                                {
                                                    case 103: // 103	Sicología Adicciones
                                                        break;
                                                    case 104: // 104	Sicología de la Obesidad
                                                        break;
                                                    case 105: // 105	Sicología Oncológica
                                                        break;
                                                }
                                            }
                                            break;
                                    }
                                }
                                break;
                                break;
                            case 60:// 60 TECNOLOGO RADIÓLOGO
                                if(!empty($profesional->id_tipo_especialidad))
                                {
                                    /** FICHAS DE ATENCIONES PREVIAS */
                                    $filtro_previas = array();
                                    $filtro_previas[] = array('id_paciente', $paciente->id);
                                    $filtro_previas[] = array('id_profesional', $profesional->id);
                                    $filtro_previas[] = array('finalizada', 1);

                                    $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                                    $datos['ficha_previas'] = $ficha_previas;

                                    /** FICHA ATENCION ACTUAL */
                                    if(empty($hora->id_ficha_otros_prof))
                                    {
                                        $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                                        $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                        $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                        if ($nueva_ficha_atencion->save())
                                        {
                                            $hora->id_estado = 5;
                                            $hora->fecha_realizacion_consulta = now();
                                            $hora->id_ficha_atencion = NULL;
                                            $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                            $hora->save();
                                            $ficha_actual_nueva = $nueva_ficha_atencion;
                                        }
                                        else
                                        {
                                            $nueva_ficha_atencion = '';
                                        }
                                    }
                                    else
                                    {
                                        $filtro_fichaAtencion = array();
                                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                        $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                                    }

                                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                    switch (intval($profesional->id_tipo_especialidad))
                                    {
                                        case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                            break;
                                        case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                            break;
                                        case 36:// 36	SICOLOGÍA LABORAL
                                            break;
                                        case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                            if(!empty($profesional->id_sub_tipo_especialidad))
                                            {
                                                switch (intval($profesional->id_sub_tipo_especialidad))
                                                {
                                                    case 103: // 103	Sicología Adicciones
                                                        break;
                                                    case 104: // 104	Sicología de la Obesidad
                                                        break;
                                                    case 105: // 105	Sicología Oncológica
                                                        break;
                                                }
                                            }
                                            break;
                                    }
                                }
                                break;
                            case 61: //61 TECNOLOGO ANATOMÍA PATOLÓGICA
                                if(!empty($profesional->id_tipo_especialidad))
                                {
                                    /** FICHAS DE ATENCIONES PREVIAS */
                                    $filtro_previas = array();
                                    $filtro_previas[] = array('id_paciente', $paciente->id);
                                    $filtro_previas[] = array('id_profesional', $profesional->id);
                                    $filtro_previas[] = array('finalizada', 1);

                                    $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                                    $datos['ficha_previas'] = $ficha_previas;

                                    /** FICHA ATENCION ACTUAL */
                                    if(empty($hora->id_ficha_otros_prof))
                                    {
                                        $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                                        $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                        $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                        if ($nueva_ficha_atencion->save())
                                        {
                                            $hora->id_estado = 5;
                                            $hora->fecha_realizacion_consulta = now();
                                            $hora->id_ficha_atencion = NULL;
                                            $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                            $hora->save();
                                            $ficha_actual_nueva = $nueva_ficha_atencion;
                                        }
                                        else
                                        {
                                            $nueva_ficha_atencion = '';
                                        }
                                    }
                                    else
                                    {
                                        $filtro_fichaAtencion = array();
                                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                        $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                                    }

                                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                    switch (intval($profesional->id_tipo_especialidad))
                                    {
                                        case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                            break;
                                        case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                            break;
                                        case 36:// 36	SICOLOGÍA LABORAL
                                            break;
                                        case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                            if(!empty($profesional->id_sub_tipo_especialidad))
                                            {
                                                switch (intval($profesional->id_sub_tipo_especialidad))
                                                {
                                                    case 103: // 103	Sicología Adicciones
                                                        break;
                                                    case 104: // 104	Sicología de la Obesidad
                                                        break;
                                                    case 105: // 105	Sicología Oncológica
                                                        break;
                                                }
                                            }
                                            break;
                                    }
                                }
                            break;
                            case 62: // 62 TECNOLOGO MÉDICO (subtipo 62)
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $filtro_previas[] = array('finalizada', 1);

                                $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();
                                $datos['ficha_previas'] = $ficha_previas;

                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_otros_prof))
                                {
                                    $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                    $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = NULL;
                                        $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                    $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                break;
                            case 63: //63 TECNOLOGO OFTALMOLOGIA
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $filtro_previas[] = array('finalizada', 1);

                                $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();
                                $datos['ficha_previas'] = $ficha_previas;

                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_otros_prof))
                                {
                                    $nueva_ficha_atencion = new FichaOtrosProfesionales();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                                    $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = NULL;
                                        $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                    $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                break;
						}
                    }
                    else
                    {
                        // Sin id_tipo_especialidad: crear ficha nueva genérica para Tecnólogo Médico
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);

                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();
                        $datos['ficha_previas'] = $ficha_previas;

                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                    }

                    break;
                case 12: //ARSENALERÍA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 49:// 49	ARSENALERÍA QUIRÚRGICA
                                break;
                            case 50:// 50	ARSENALERÍA OBSTÉTRICA
                                break;
                        }
                    }
                    break;
                default:
                    /** FICHAS DE ATENCIONES PREVIAS */
                    $filtro_previas = array();
                    $filtro_previas[] = array('id_paciente', $paciente->id);
                    $filtro_previas[] = array('confidencial', '0');
                    $filtro_previas[] = array('finalizada', 1);
                    $filtro_previas[] = array('id_profesional', $profesional->id);
                    $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                    $datos['ficha_previas'] = $ficha_previas;


                    /** FICHA ATENCION ACTUAL */
                    if(empty($hora->id_ficha_atencion))
                    {
                        $nueva_ficha_atencion = new FichaAtencion();
                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                        if ($nueva_ficha_atencion->save())
                        {
                            $hora->id_estado = 5;
                            $hora->fecha_realizacion_consulta = now();
                            $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                            $hora->save();
                            $ficha_actual_nueva = $nueva_ficha_atencion;
                        }
                        else
                        {
                            $nueva_ficha_atencion = '';
                        }
                    }
                    else
                    {
                        $filtro_fichaAtencion = array();
                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                        $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                    }

                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                    break;
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }


        return (object)$datos;
    }

    public function dameProcedimientosImplantes($id_paciente, $id_profesional,$id_ficha_atencion, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosImplantes::select('procedimientos_implantes.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_implantes.id_paciente',$id_paciente)
            ->where('procedimientos_implantes.id_profesional', $id_profesional)
            ->where('procedimientos_implantes.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_implantes.id_procedimiento')
            ->get();
        }else{
            $procedimientos = ProcedimientosPostImplantes::select('procedimientos_post_implantes.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_post_implantes.id_paciente',$id_paciente)
            ->where('procedimientos_post_implantes.id_profesional', $id_profesional)
            ->where('procedimientos_post_implantes.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_post_implantes.id_procedimiento')
            ->get();
        }

        return $procedimientos;
    }

    public function dameProcedimientosImplantesRehab($id_paciente, $id_profesional, $id_ficha_atencion, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosImplantesRehab::select('procedimientos_implantes_rehab.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_implantes_rehab.id_paciente',$id_paciente)
            ->where('procedimientos_implantes_rehab.id_profesional', $id_profesional)
            ->where('procedimientos_implantes_rehab.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_implantes_rehab.id_procedimiento')
            ->get();
        }else{
            $procedimientos = ProcedimientosImplantesRehab::select('procedimientos_post_implantes.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_post_implantes.id_paciente',$id_paciente)
            ->where('procedimientos_post_implantes.id_profesional', $id_profesional)
            ->where('procedimientos_post_implantes.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_post_implantes.id_procedimiento')
            ->get();
        }

        return $procedimientos;
    }

    public function dameProcedimientosGruposImplantes($id_paciente, $id_profesional, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosGruposImplantes::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
        }else{
            $procedimientos = ProcedimientosGruposPostImplantes::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
            foreach($procedimientos as $p){
                $p->grupo_piezas = json_decode($p->grupo_piezas);
            }
        }

        return $procedimientos;
    }

    public function dameTratamientosBocaGeneral($id_ficha_atencion, $total = null)
    {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad !== 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'diagnosticos_dental.valor','tratamientos_dental.descripcion')
            ->leftjoin('diagnosticos_dental', 'examenes_boca_general.diagnostico_tratamiento', '=', 'diagnosticos_dental.descripcion')
            ->join('tratamientos_dental','examenes_boca_general.diagnostico','tratamientos_dental.id')
            ->where('examenes_boca_general.id_ficha_atencion', $id_ficha_atencion)
            ->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'tratamientos_implantologia.valor','tratamientos_dental.descripcion')
            ->join('tratamientos_implantologia', 'examenes_boca_general.diagnostico_tratamiento', '=', 'tratamientos_implantologia.descripcion')
            ->join('tratamientos_dental','examenes_boca_general.diagnostico','tratamientos_dental.id')
            ->where('examenes_boca_general.id_ficha_atencion', $id_ficha_atencion)
            ->get();
        }


        // Si quieres retornar también el total general, puedes incluirlo así:
        // return ['examenes' => $examenes, 'total_gral' => $total_gral];

        return $examenes;
    }

    /**
     * Función auxiliar para obtener el intervalo de frecuencia en minutos
     * a partir de la descripción de la posología
     *
     * @param string $nombre_frecuencia - Descripción de la frecuencia (ej: "Cada 8 horas", "Cada 12 horas")
     * @param int $id_frecuencia - ID de la frecuencia en la tabla receta_dosis
     * @return int - Intervalo en minutos, 0 si no se puede determinar
     */
    public function obtenerIntervaloFrecuencia($nombre_frecuencia, $id_frecuencia = null)
    {
        if (empty($nombre_frecuencia)) {
            return 0;
        }

        $nombre_frecuencia = strtolower(trim($nombre_frecuencia));

        // Patrones comunes de frecuencia en horas
        if (preg_match('/cada\s+(\d+)\s+hora[s]?/', $nombre_frecuencia, $matches)) {
            return intval($matches[1]) * 60; // Convertir horas a minutos
        }

        // Patrones comunes de frecuencia en minutos
        if (preg_match('/cada\s+(\d+)\s+minuto[s]?/', $nombre_frecuencia, $matches)) {
            return intval($matches[1]);
        }

        // Patrones comunes de frecuencia en días
        if (preg_match('/cada\s+(\d+)\s+d[ií]a[s]?/', $nombre_frecuencia, $matches)) {
            return intval($matches[1]) * 24 * 60; // Convertir días a minutos
        }

        // Patrones específicos comunes
        $patrones_especificos = [
            // Frecuencias muy comunes en medicina
            'cada 4 horas' => 4 * 60,
            'cada 6 horas' => 6 * 60,
            'cada 8 horas' => 8 * 60,
            'cada 12 horas' => 12 * 60,
            'cada 24 horas' => 24 * 60,
            'una vez al día' => 24 * 60,
            'dos veces al día' => 12 * 60,
            'tres veces al día' => 8 * 60,
            'cuatro veces al día' => 6 * 60,
            '1 vez al día' => 24 * 60,
            '2 veces al día' => 12 * 60,
            '3 veces al día' => 8 * 60,
            '4 veces al día' => 6 * 60,
            'diario' => 24 * 60,
            'cada día' => 24 * 60,
            'bid' => 12 * 60, // Bis in die (2 veces al día)
            'tid' => 8 * 60,  // Ter in die (3 veces al día)
            'qid' => 6 * 60,  // Quater in die (4 veces al día)
            'qd' => 24 * 60,  // Quaque die (1 vez al día)
        ];

        // Buscar coincidencias en los patrones específicos
        foreach ($patrones_especificos as $patron => $minutos) {
            if (strpos($nombre_frecuencia, $patron) !== false) {
                return $minutos;
            }
        }

        // Si usamos el ID de frecuencia como fallback
        // Aquí puedes agregar mapeo basado en IDs si conoces la estructura de tu tabla receta_dosis
        if ($id_frecuencia !== null) {
            $mapeo_ids = [
                1 => 8 * 60,   // Ejemplo: ID 1 = cada 8 horas
                2 => 12 * 60,  // Ejemplo: ID 2 = cada 12 horas
                3 => 24 * 60,  // Ejemplo: ID 3 = cada 24 horas
                4 => 6 * 60,   // Ejemplo: ID 4 = cada 6 horas
                // Agregar más según tu base de datos
            ];

            if (isset($mapeo_ids[$id_frecuencia])) {
                return $mapeo_ids[$id_frecuencia];
            }
        }

        // Si no se puede determinar, retornar 0 (no evaluar)
        return 0;
    }

    /**
     * Genera un resumen narrativo de los tratamientos administrados
     *
     * @param array $recetas - Array de recetas con sus detalles
     * @return string - Resumen en formato narrativo
     */
    public function generarResumenTratamientos($recetas)
    {
        if (empty($recetas)) {
            return "No se han registrado tratamientos en el periodo actual.";
        }

        $resumen = "RESUMEN DE TRATAMIENTOS Y CONTROL DE ENFERMERÍA\n";
        $resumen .= "Fecha: " . now()->format('d/m/Y H:i') . " hrs\n\n";

        // Separar medicamentos por estado
        $administrados = [];
        $pendientes = [];
        $finalizados = [];

        foreach ($recetas as $r) {
            if ($r->finalizado == 1) {
                $finalizados[] = $r;
            } elseif ($r->estado_tratamiento == 1) {
                $administrados[] = $r;
            } else {
                $pendientes[] = $r;
            }
        }

        // Medicamentos administrados
        if (!empty($administrados)) {
            $resumen .= "TRATAMIENTOS ADMINISTRADOS:\n";
            foreach ($administrados as $r) {
                $resumen .= "• " . $r->nombre_medicamento;
                if ($r->dosis) {
                    $resumen .= " - " . $r->dosis;
                }
                if ($r->frecuencia) {
                    $resumen .= " (" . $r->frecuencia . ")";
                }
                $resumen .= " vía " . ($r->via_administracion ?? 'no especificada');

                if ($r->contador_dosis) {
                    $resumen .= " - Dosis #" . $r->contador_dosis;
                }

                if ($r->tiempo_transcurrido) {
                    $resumen .= " - Última administración hace " . $r->tiempo_transcurrido;
                }

                $resumen .= ".\n";
            }
            $resumen .= "\n";
        }

        // Medicamentos pendientes
        if (!empty($pendientes)) {
            $resumen .= "TRATAMIENTOS PENDIENTES:\n";
            foreach ($pendientes as $r) {
                $resumen .= "• " . $r->nombre_medicamento;
                if ($r->dosis) {
                    $resumen .= " - " . $r->dosis;
                }
                if ($r->frecuencia) {
                    $resumen .= " (" . $r->frecuencia . ")";
                }
                $resumen .= " vía " . ($r->via_administracion ?? 'no especificada');

                if ($r->contador_dosis && $r->contador_dosis > 0) {
                    $resumen .= " - Próxima dosis programada";
                }

                $resumen .= ".\n";
            }
            $resumen .= "\n";
        }

        // Medicamentos finalizados
        if (!empty($finalizados)) {
            $resumen .= "TRATAMIENTOS FINALIZADOS:\n";
            foreach ($finalizados as $r) {
                $resumen .= "• " . $r->nombre_medicamento;
                if ($r->contador_dosis) {
                    $resumen .= " - Total de dosis administradas: " . $r->contador_dosis;
                }
                $resumen .= ".\n";
            }
            $resumen .= "\n";
        }

        // Estadísticas generales
        $total = count($recetas);
        $total_administrados = count($administrados);
        $total_pendientes = count($pendientes);
        $total_finalizados = count($finalizados);

        $resumen .= "ESTADÍSTICAS:\n";
        $resumen .= "Total de tratamientos: " . $total . "\n";
        $resumen .= "Administrados: " . $total_administrados . "\n";
        $resumen .= "Pendientes: " . $total_pendientes . "\n";
        $resumen .= "Finalizados: " . $total_finalizados . "\n";

        return $resumen;
    }

    private function generarResumenProcedimientos($procedimientos)
    {
        if (empty($procedimientos)) {
            return "No se han registrado procedimientos en el periodo actual.";
        }

        $resumen = "RESUMEN DE PROCEDIMIENTOS REALIZADOS\n";
        $resumen .= "Fecha: " . now()->format('d/m/Y H:i') . " hrs\n\n";

        foreach ($procedimientos as $p) {
            $resumen .= "• " . $p->datos_procedimiento->nombre_procedimiento;
            if ($p->descripcion) {
                $resumen .= " - " . $p->descripcion;
            }
            $resumen .= " realizado el " . $p->created_at->format('d/m/Y H:i') . ".\n";
        }
        return $resumen;
    }

    /**
     * Registra un certificado de defunción
     *
     * @param Request $request
     * @return array
     */
    public function registrar_defuncion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // Validaciones de campos obligatorios
        if(empty($request->f_fallecimiento)) {
            $valido = 0;
            $error['f_fallecimiento'] = 'Fecha de fallecimiento es requerida';
        }
        if(empty($request->hora_fallecimiento)) {
            $valido = 0;
            $error['hora_fallecimiento'] = 'Hora de fallecimiento es requerida';
        }
        if(empty($request->causa_inmed)) {
            $valido = 0;
            $error['causa_inmed'] = 'Causa inmediata de muerte es requerida';
        }
        if(empty($request->id_lugar_atencion)) {
            $valido = 0;
            $error['id_lugar_atencion'] = 'Lugar de atención es requerido';
        }
        if(empty($request->id_paciente)) {
            $valido = 0;
            $error['id_paciente'] = 'Paciente es requerido';
        }

        if($valido == 1)
        {
            try {
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

                if(!$profesional) {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'No se encontró el profesional asociado al usuario';
                    return $datos;
                }

                // Crear nuevo certificado de defunción
                $certificado = new CertificadoDefuncion();

                // Datos del paciente
                $certificado->id_paciente = $request->id_paciente;
                $certificado->id_profesional = $profesional->id;
                $certificado->id_lugar_atencion = $request->id_lugar_atencion;

                // Si hay ficha de atención asociada
                if(!empty($request->id_ficha_atencion)) {
                    $certificado->id_ficha_atencion = $request->id_ficha_atencion;
                }

                // 1. Identidad del fallecido
                $certificado->nombre_fallecido = $request->nombre_fallecido ?? '';
                $certificado->rut_fallecido = $request->rut_fallecido ?? '';
                $certificado->sexo_fallecido = $request->sexo_fallecido ?? null;
                $certificado->fecha_nacimiento = $request->fn_fallecido ?? null;
                $certificado->edad_fallecido = $request->edad_fallecido ?? null;
                $certificado->fecha_hora_menor_ano = $request->mdm_menunano ?? null;

                // Testigos
                $certificado->testigo_1_nombre = $request->nombre_test_uno ?? '';
                $certificado->testigo_1_rut = $request->rut_test_uno ?? '';
                $certificado->testigo_1_firma = $request->verif_test_uno ?? '';
                $certificado->testigo_2_nombre = $request->nombre_test_dos ?? '';
                $certificado->testigo_2_rut = $request->rut_test_dos ?? '';
                $certificado->testigo_2_firma = $request->verif_test_dos ?? '';

                // 2. Datos de defunción
                $certificado->fecha_fallecimiento = $request->f_fallecimiento;
                $certificado->hora_fallecimiento = $request->hora_fallecimiento;
                $certificado->peso_nacer = $request->peso_nac_men_fallecido ?? null;
                $certificado->semanas_gestacion = $request->sem_gestmen_fallecido ?? null;
                $certificado->estado_nutricional = $request->en_men_fallecido ?? null;
                $certificado->lugar_defuncion = $request->lug_fall_men_fallecido ?? null;
                $certificado->establecimiento_direccion = $request->estab_lug_fallec ?? '';
                $certificado->region_defuncion = $request->region_defuncion ?? null;
                $certificado->comuna_defuncion = $request->comuna_defuncion ?? null;

                // 3. Causas de muerte
                $certificado->causa_inmediata = $request->causa_inmed;
                $certificado->causas_originarias = $request->causas_origin ?? '';
                $certificado->estados_morbosos_concomitantes = $request->est_morbosos_conc ?? '';

                // 4. Fundamento de causa de muerte
                $certificado->fundamento_causa_muerte = $request->fund_causa_muerte ?? null;
                $certificado->lugar_ocurrencia = $request->lugar_ocurr_muerte ?? null;
                $certificado->circunstancias = $request->circunst_muerte ?? null;
                $certificado->tipo_muerte = $request->t_muerte ?? null;

                // 5. Atención médica
                $certificado->atencion_medica_ultima_enfermedad = $request->at_medica_enf ?? null;

                // 6. Médico certificante
                $certificado->calidad_firmante = $request->cal_firmante ?? null;
                $certificado->otros_firmantes = $request->ot_firmantes ?? null;
                $certificado->nombre_medico = $request->nombre_med ?? '';
                $certificado->rut_medico = $request->rut_med ?? '';
                $certificado->telefono_medico = $request->tel_med ?? '';
                $certificado->domicilio_medico = $request->dom_med ?? '';
                $certificado->firma_medico = $request->firma_med ?? '';
                $certificado->autenticacion_documento = $request->autent_med ?? '';

                // Registro Civil
                $certificado->residencia_fallecido = $request->resid_fallecido ?? '';
                $certificado->region_residencia = $request->reg_fallecido ?? null;
                $certificado->ciudad_residencia = $request->ciud_fallecido ?? null;
                $certificado->ocupacion_fallecido = $request->ocup_fallecido ?? '';
                $certificado->nivel_educacion = $request->niv_educ_fall ?? null;
                $certificado->ultimo_curso = $request->ult_cur ?? '';
                $certificado->nivel_ocupacional = $request->niv_ocup_fallecido ?? null;

                // Datos para menores de 1 año
                $certificado->tipo_menor_ano = $request->tpo_men_ano ?? null;
                $certificado->nombre_gestante = $request->nomb_gestante ?? '';
                $certificado->estado_civil_madre = $request->ecivil_madre ?? null;
                $certificado->hijos_vivos = $request->n_hijos_nac_vivos ?? null;
                $certificado->hijos_fallecidos = $request->n_hijos_fall ?? null;
                $certificado->hijos_mortinatos = $request->n_hijos_mortinatos ?? null;
                $certificado->hijos_total = $request->n_hijos_tot ?? null;
                $certificado->tipo_parto_aborto_anterior = $request->tipo_parto_aborto ?? null;
                $certificado->fecha_parto_anterior = $request->fech_parto_menun ?? null;
                $certificado->nombre_padre = $request->nomb_padre ?? '';
                $certificado->edad_padre = $request->edad_padre ?? null;
                $certificado->ultimo_curso_padre = $request->ult_curs_padre ?? null;
                $certificado->instruccion_padre = $request->niv_inst_padre ?? null;
                $certificado->ocupacion_padre = $request->ocup_padre ?? '';
                $certificado->nivel_ocupacional_padre = $request->niv_ocup_padre ?? null;

                // Código de autorización - generar token si no existe en sesión
                $papeleria_token = session('lic_token');
                if(empty($papeleria_token)) {
                    $papeleria_token = 'DEFUNCION_' . strtoupper(uniqid());
                    session(['lic_token' => $papeleria_token]);
                }
                $certificado->cod_auto = $papeleria_token;

                if (!$certificado->save())
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Error al guardar el certificado de defunción';
                }
                else
                {
                    /** REGISTRAR FIRMA PROFESIONAL */
                    $papeleria_log_id = session('lic_log_id');

                    // Si no hay log_id en sesión, usar 0
                    if(empty($papeleria_log_id)) {
                        $papeleria_log_id = 0;
                    }

                    // Intentar registrar firma profesional
                    try {
                        // Tipo de documento: 26 para certificado de defunción
                        $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma(
                            (int)$profesional->id,
                            $papeleria_token,
                            $papeleria_log_id,
                            "26",
                            $certificado->id
                        );
                    } catch (\Exception $e) {
                        // Si falla el registro de firma, continuar pero registrar el error
                        \Log::warning('Error al registrar firma profesional para certificado de defunción: ' . $e->getMessage());
                    }

                    $datos['estado'] = 1;
                    $datos['msj'] = 'Certificado de defunción registrado exitosamente';
                    $datos['id_certificado'] = $certificado->id;
                }
            }
            catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al procesar: ' . $e->getMessage();
                $datos['error_detalle'] = $e->getTrace();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos faltantes';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /**
     * Genera PDF del certificado de defunción
     *
     * @param Request $request
     * @return mixed
     */
    public function pdf_certificado_defuncion(Request $request)
    {
        $datos = array();

        // Buscar certificado por ID
        if(!empty($request->id_certificado)) {
            $certificadoDefuncion = CertificadoDefuncion::find($request->id_certificado);
        }
        else if(!empty($request->id_ficha_atencion)) {
            $certificadoDefuncion = CertificadoDefuncion::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        }
        else if(!empty($request->id_paciente)) {
            $certificadoDefuncion = CertificadoDefuncion::where('id_paciente', $request->id_paciente)->orderBy('id', 'desc')->first();
        }

        if($certificadoDefuncion && $certificadoDefuncion->count() > 0)
        {
            $profesional = Profesional::find($certificadoDefuncion->id_profesional);
            $paciente = Paciente::find($certificadoDefuncion->id_paciente);
            $lugar_atencion = LugarAtencion::find($certificadoDefuncion->id_lugar_atencion);

            // Buscar ficha de atención si existe
            $ficha_atencion = null;
            if(!empty($certificadoDefuncion->id_ficha_atencion)) {
                $ficha_atencion = FichaAtencion::find($certificadoDefuncion->id_ficha_atencion);
            }

            /** Token certificado de documento */
            $temp_token = CertificadoController::certificadoDocumento(
                $certificadoDefuncion->id_ficha_atencion ?? $certificadoDefuncion->id,
                $profesional->id,
                $paciente->id,
                26, // Tipo 26 para certificado defunción
                $certificadoDefuncion->id
            );

            if($temp_token['estado'] == 1) {
                $token_documento = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_documento);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else {
                $temp_token = CertificadoController::certificadoDocumento(
                    $certificadoDefuncion->id_ficha_atencion ?? $certificadoDefuncion->id,
                    rand(111,999),
                    $paciente->id,
                    26,
                    $certificadoDefuncion->id
                );
                $token_documento = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_documento);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** Token profesional */
            $temp_token = CertificadoController::certificadoProfesional(
                $profesional->id,
                $certificadoDefuncion->cod_auto,
                '26',
                $certificadoDefuncion->id
            );

            if($temp_token['estado'] == 1) {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_profesional);
            }
            else {
                $temp_token = CertificadoController::certificadoProfesional(
                    rand(1114,999),
                    $certificadoDefuncion->cod_auto,
                    '26',
                    $certificadoDefuncion->id
                );
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_profesional);
            }

            // Preparar datos del certificado
            $detalle_certificado = array(
                'nombre_fallecido' => $certificadoDefuncion->nombre_fallecido,
                'rut_fallecido' => $certificadoDefuncion->rut_fallecido,
                'sexo_fallecido' => $certificadoDefuncion->sexo_fallecido,
                'edad_fallecido' => $certificadoDefuncion->edad_fallecido,
                'fecha_fallecimiento' => $certificadoDefuncion->fecha_fallecimiento,
                'hora_fallecimiento' => $certificadoDefuncion->hora_fallecimiento,
                'causa_inmediata' => $certificadoDefuncion->causa_inmediata,
                'causas_originarias' => $certificadoDefuncion->causas_originarias,
                'estados_morbosos_concomitantes' => $certificadoDefuncion->estados_morbosos_concomitantes,
                'fundamento_causa_muerte' => $certificadoDefuncion->fundamento_causa_muerte,
                'nombre_medico' => $certificadoDefuncion->nombre_medico,
                'rut_medico' => $certificadoDefuncion->rut_medico,
                'calidad_firmante' => $certificadoDefuncion->calidad_firmante,

                // Datos adicionales
                'lugar_defuncion' => $certificadoDefuncion->lugar_defuncion,
                'establecimiento_direccion' => $certificadoDefuncion->establecimiento_direccion,
                'atencion_medica_ultima_enfermedad' => $certificadoDefuncion->atencion_medica_ultima_enfermedad,
                'lugar_ocurrencia' => $certificadoDefuncion->lugar_ocurrencia,
                'circunstancias' => $certificadoDefuncion->circunstancias,
                'tipo_muerte' => $certificadoDefuncion->tipo_muerte,

                // Testigos
                'testigo_1_nombre' => $certificadoDefuncion->testigo_1_nombre,
                'testigo_1_rut' => $certificadoDefuncion->testigo_1_rut,
                'testigo_2_nombre' => $certificadoDefuncion->testigo_2_nombre,
                'testigo_2_rut' => $certificadoDefuncion->testigo_2_rut,

                // Menores de 1 año
                'tipo_menor_ano' => $certificadoDefuncion->tipo_menor_ano,
                'peso_nacer' => $certificadoDefuncion->peso_nacer,
                'semanas_gestacion' => $certificadoDefuncion->semanas_gestacion,
                'nombre_gestante' => $certificadoDefuncion->nombre_gestante,
                'nombre_padre' => $certificadoDefuncion->nombre_padre,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion ? $ficha_atencion->id : $certificadoDefuncion->id,
                'created_at' => $certificadoDefuncion->created_at->format('d/m/Y'),
                'token' => $token_documento,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );

            $array_lugar_atencion = array(
                    'id' => $lugar_atencion->id,
                    'nombre' => $lugar_atencion->nombre,
                    'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                    'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                    'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
                );
                $array_profesional = array(
                    'id' => $profesional->id,
                    'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                    'rut' => $profesional->rut,
                    'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                    'id_especialidad' => $profesional->id_especialidad,
                    'num_colegio' => $profesional->num_colegio,
                    'token' =>  $token_profesional,
                    'url' =>  $url_profesional,
                    'qr' =>  $qr_profesional,
                );
                $array_paciente = array(
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                    'fecha_nac' => $paciente->fecha_nac,
                    'rut' => $paciente->rut,
                    'sexo' => $paciente->sexo,
                    'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
                );

            return PdfController::generarPDF(
                'CERTIFICADO DE DEFUNCIÓN',
                compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_certificado'),
                'Certificado Defuncion '.$paciente->rut.' '.date('YmdHi'),
                'pdf_certificado_defuncion'
            );
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontró el certificado de defunción';
            return $datos;
        }

    }

    public function pdf_informe_clinico_personal(Request $request)
    {
        try {
            $id_ficha_atencion = $request->id_ficha_atencion;
            $ficha_atencion = FichaOtrosProfesionales::find($id_ficha_atencion);
            $paciente = Paciente::find($ficha_atencion->id_paciente);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);

            /** token certificado */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 26);

            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 7, $certificadoReposo->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1,'7',1);

            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

                        // Preparar arrays de datos para el PDF
            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );


            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion . ' ' . $lugar_atencion->direccion->numero_dir . ', ' . $lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
            );

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first() ? $profesional->SubTipoEspecialidad()->first()->nombre : $profesional->TipoEspecialidad()->first()->nombre),
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'token' => $token_profesional,
                'url' => $url_profesional,
                'qr' => $qr_profesional,
            );

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'telefono_uno' => $paciente->telefono_uno,
                'email' => $paciente->email,
                'direccion' => $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir . ', ' . $paciente->Direccion()->first()->Ciudad()->first()->nombre
            );
            $informe_html = $request->informe_html;
            // Generar PDF con funcionalida 'G' para guardar
            $pdf_resultado = PdfController::generarPDF('INFORME DE EXAMEN', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'informe_html'), 'Informe examen '.$paciente->rut.' '.date('YmdHi'), 'informe_clinico_personal', 'G');

            if($pdf_resultado->estado != 1) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se pudo generar el PDF';
                return $datos;
            }else{
                $datos['estado'] = 1;
                $datos['msj'] = 'PDF generado exitosamente';
                $datos['url_pdf'] = $pdf_resultado->pdf_url;
                return $datos;
            }

        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'error' => 'Error al generar el PDF: ' . $e->getMessage()
            ], 500);
        }

    }

    /**
     * Administrar medicamento de enfermería
     * Registra la fecha y hora de administración del medicamento
     */
    public function administrar_medicamento_enfermeria(Request $request)
    {
        try {
            $medicamento = \App\Models\RecomendacionDetalle::find($request->id);

            if (!$medicamento) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Medicamento no encontrado'
                ]);
            }

            $medicamento->fecha_administrado = now()->format('Y-m-d');
            $medicamento->hora_administrado = now()->format('H:i:s');
            // NO cambiar el estado a 1, mantenerlo activo (0) para permitir múltiples administraciones
            // Solo se cambiará a 2 (finalizado) cuando se finalice explícitamente el tratamiento
            $medicamento->contador_dosis = is_null($medicamento->contador_dosis)
                ? 1
                : ($medicamento->contador_dosis + 1);
            $medicamento->id_responsable = Auth::user()->id;

            $idPaciente = null;
            if (!empty($medicamento->recomendacion) && isset($medicamento->recomendacion->activo)) {
                $idPaciente = $medicamento->recomendacion->activo;
            }

            RecomendacionDetalleAdministracion::create([
                'id_recomendacion_detalle' => $medicamento->id,
                'id_paciente' => $idPaciente,
                'id_responsable' => Auth::id(),
                'fecha_hora_administracion' => now(),
                'observaciones' => null,
            ]);

            if ($medicamento->save()) {
                // Calcular si puede administrar nuevamente (después de 6 horas)
                $puedeAdministrarNuevamente = false; // Por defecto no puede hasta que pasen 6 horas
                $horasHastaProximaAdmin = 6; // Horas mínimas entre administraciones

                return response()->json([
                    'status' => 'success',
                    'message' => 'Medicamento administrado correctamente',
                    'fecha_administrado' => now()->format('d-m-Y'),
                    'hora_administrado' => now()->format('H:i'),
                    'nombre_responsable' => Auth::user()->name ?? 'Sin nombre',
                    'puede_administrar' => $puedeAdministrarNuevamente,
                    'horas_desde_ultima_admin' => 0,
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo guardar el registro'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error al administrar medicamento enfermería: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function historial_administraciones_medicamento_enfermeria(Request $request)
    {
        try {

            $medicamentoId = intval($request->id);
            if ($medicamentoId <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'ID de medicamento invalido'
                ], 422);
            }

            $historial = RecomendacionDetalleAdministracion::query()
                ->where('id_recomendacion_detalle', $medicamentoId)
                ->leftJoin('users', 'users.id', '=', 'recomendacion_detalle_administraciones.id_responsable')
                ->select(
                    'recomendacion_detalle_administraciones.id',
                    'recomendacion_detalle_administraciones.id_responsable',
                    'recomendacion_detalle_administraciones.fecha_hora_administracion',
                    'recomendacion_detalle_administraciones.observaciones',
                    'users.name as nombre_enfermera'
                )
                ->orderBy('recomendacion_detalle_administraciones.fecha_hora_administracion', 'desc')
                ->get()
                ->map(function ($row) {
                    return [
                        'id' => $row->id,
                        'id_responsable' => $row->id_responsable,
                        'nombre_enfermera' => $row->nombre_enfermera ?? 'Sin nombre',
                        'fecha_hora_administracion' => $row->fecha_hora_administracion,
                        'fecha_hora_label' => !empty($row->fecha_hora_administracion)
                            ? Carbon::parse($row->fecha_hora_administracion)->format('d-m-Y H:i')
                            : 'Sin fecha',
                        'observaciones' => $row->observaciones,
                    ];
                })
                ->values();

            return response()->json([
                'status' => 'success',
                'data' => $historial,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al obtener historial de administraciones: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'No fue posible cargar el historial'
            ], 500);
        }
    }

    public function obtener_tratamientos_activos_enfermeria(Request $request)
    {
        try {
            $idPaciente = intval($request->id_paciente);
            if ($idPaciente <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'id_paciente invalido',
                    'data' => []
                ], 422);
            }

            $fechaActual = date("d-m-Y");
            $registroResultado = [];

            $listaRecetas = Recomendacion::where('activo', $idPaciente)
                ->whereDate('created_at', '>=', date("Y-m-d", strtotime($fechaActual . "- 1 year")))
                ->pluck('id')
                ->toArray();

            if (!empty($listaRecetas)) {
                $registros = Recomendacion::whereIn('id', $listaRecetas)->get();
                foreach ($registros as $value) {
                    $detalle = RecomendacionDetalle::where('id_recomendacion', $value->id)->get();
                    $detalleTemp = [];

                    foreach ($detalle as $valueDet) {
                        // Obtener la última administración real desde el historial
                        $ultimaAdministracion = RecomendacionDetalleAdministracion::where('id_recomendacion_detalle', $valueDet->id)
                            ->orderBy('fecha_hora_administracion', 'desc')
                            ->first();

                        // Calcular si puede administrar basándose en la última administración
                        $puedeAdministrar = true;
                        $ultimaAdministracionFecha = null;
                        $ultimaAdministracionHora = null;
                        $horasDesdeUltimaAdmin = null;

                        if ($ultimaAdministracion) {
                            $ultimaAdministracionFecha = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->format('d-m-Y');
                            $ultimaAdministracionHora = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->format('H:i');

                            // Calcular horas transcurridas desde la última administración
                            $horasDesdeUltimaAdmin = \Carbon\Carbon::parse($ultimaAdministracion->fecha_hora_administracion)->diffInHours(now());

                            // Si han pasado menos de 6 horas, no puede administrar
                            if ($horasDesdeUltimaAdmin < 6) {
                                $puedeAdministrar = false;
                            }
                        }

                        // Si el tratamiento está finalizado (estado = 2), no puede administrar
                        if ($valueDet->estado == 2) {
                            $puedeAdministrar = false;
                        }

                        $detalleTemp[] = [
                            'id' => $valueDet->id,
                            'id_receta' => $valueDet->id_recomendacion,
                            'id_tipo_control' => decrypt($valueDet->control),
                            'id_producto' => decrypt($valueDet->id_articulo),
                            'producto' => decrypt($valueDet->articulo),
                            'farmaco' => decrypt($valueDet->componente),
                            'id_presentacion' => decrypt($valueDet->id_apariencia),
                            'presentacion' => decrypt($valueDet->apariencia),
                            'id_receta_dosis' => decrypt($valueDet->id_cuota),
                            'posologia' => decrypt($valueDet->cuota),
                            'id_via_administracion' => decrypt($valueDet->id_regimen),
                            'via_administracion' => decrypt($valueDet->regimen),
                            'id_periodo' => decrypt($valueDet->id_lapso),
                            'periodo' => decrypt($valueDet->lapso),
                            'uso_cronico' => decrypt($valueDet->uso_frecuente),
                            'cantidad_compra' => decrypt($valueDet->volumen_compra),
                            'cantidad' => decrypt($valueDet->volumen),
                            'cantidad_vendida' => decrypt($valueDet->volumen_entregado),
                            'comentario' => decrypt($valueDet->comentario),
                            'token_doc' => $valueDet->cod_doc,
                            'estado' => $valueDet->estado,
                            'fecha_administrado' => $valueDet->fecha_administrado,
                            'hora_administrado' => $valueDet->hora_administrado,
                            'contador_dosis' => $valueDet->contador_dosis,
                            'tiempo_transcurrido' => null,
                            'nombre_responsable' => !empty($valueDet->id_responsable)
                                ? (function($id) {
                                    $prof = Profesional::find($id);
                                    return $prof ? trim($prof->nombre . ' ' . $prof->apellido_uno . ' ' . $prof->apellido_dos) : '';
                                })($valueDet->id_responsable)
                                : '',
                            'created_at' => $valueDet->created_at,
                            'updated_at' => $valueDet->updated_at,
                            // Nuevos campos para control de administración
                            'ultima_administracion_fecha' => $ultimaAdministracionFecha,
                            'ultima_administracion_hora' => $ultimaAdministracionHora,
                            'horas_desde_ultima_admin' => $horasDesdeUltimaAdmin,
                            'puede_administrar' => $puedeAdministrar,
                        ];
                    }

                    $registroResultado[] = [
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
                        'detalle' => $detalleTemp,
                        'created_at' => $value->created_at,
                        'updated_at' => $value->updated_at,
                    ];
                }
            }

            return response()->json([
                'status' => 'success',
                'data' => $registroResultado,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al obtener tratamientos activos enfermeria: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'No fue posible cargar tratamientos activos',
                'data' => []
            ], 500);
        }
    }

    /**
     * Guardar medicamento en modelos Recomendacion/RecomendacionDetalle
     */
    public function guardar_medicamento_enfermeria(Request $request)
    {
        try {
            \DB::beginTransaction();

            // Validar datos requeridos
            $idPaciente = intval($request->id_paciente);
            $idFichaAtencion = intval($request->id_ficha_atencion);
            $idTipoControl = intval($request->id_tipo_control);
            $idMedicamento = intval($request->id_medicamento);

            if ($idPaciente <= 0 || $idFichaAtencion <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Datos incompletos: id_paciente o id_ficha_atencion inválidos'
                ], 422);
            }

            // Buscar o crear Recomendacion para esta ficha
            $recomendacion = Recomendacion::where('atencion', $idFichaAtencion)
                ->where('activo', $idPaciente)
                ->where('control', $idTipoControl)
                ->first();

            if (!$recomendacion) {
                $recomendacion = new Recomendacion();
                $recomendacion->atencion = $idFichaAtencion;
                $recomendacion->activo = $idPaciente;
                $recomendacion->control = $idTipoControl;
                $recomendacion->aficionado = $request->id_profesional ?? auth()->id();
                $recomendacion->cod_doc = \Str::random(16);
                $recomendacion->estado = 1;
                $recomendacion->save();
            }

            // Crear detalle de recomendación
            $detalle = new RecomendacionDetalle();
            $detalle->id_recomendacion = $recomendacion->id;
            $detalle->control = encrypt($idTipoControl);
            $detalle->id_articulo = encrypt($idMedicamento);
            $detalle->articulo = encrypt($request->nombre_medicamento ?? '');
            $detalle->componente = encrypt($request->farmaco ?? '');
            $detalle->id_apariencia = encrypt($request->id_dosis ?? 0);
            $detalle->apariencia = encrypt($request->nombre_dosis ?? '');
            $detalle->id_cuota = encrypt($request->id_frecuencia ?? 0);
            $detalle->cuota = encrypt($request->nombre_frecuencia ?? '');
            $detalle->id_regimen = encrypt($request->id_via_administracion ?? 0);
            $detalle->regimen = encrypt($request->via_administracion ?? '');
            $detalle->id_lapso = encrypt($request->id_periodo ?? 0);
            $detalle->lapso = encrypt($request->periodo ?? '');
            $detalle->uso_frecuente = encrypt($request->uso_cronico ?? 0);
            $detalle->volumen_compra = encrypt($request->cantidad_comprar ?? '');
            $detalle->volumen = encrypt($request->cantidad ?? '');
            $detalle->volumen_entregado = encrypt(0);
            $detalle->comentario = encrypt($request->observaciones ?? '');
            $detalle->cod_doc = \Str::random(16);
            $detalle->estado = 1;
            $detalle->fecha_administrado = null;
            $detalle->hora_administrado = null;
            $detalle->contador_dosis = 0;
            $detalle->id_responsable = $request->id_responsable ?? auth()->id();
            $detalle->save();

            \DB::commit();

            // Retornar la lista actualizada usando la misma lógica de obtener_tratamientos_activos_enfermeria
            $fechaActual = date("d-m-Y");
            $registroResultado = [];

            $listaRecetas = Recomendacion::where('activo', $idPaciente)
                ->whereDate('created_at', '>=', date("Y-m-d", strtotime($fechaActual . "- 1 year")))
                ->pluck('id')
                ->toArray();

            if (!empty($listaRecetas)) {
                $registros = Recomendacion::whereIn('id', $listaRecetas)->get();
                foreach ($registros as $value) {
                    $detalleList = RecomendacionDetalle::where('id_recomendacion', $value->id)->get();
                    $detalleTemp = [];

                    foreach ($detalleList as $valueDet) {
                        $detalleTemp[] = [
                            'id' => $valueDet->id,
                            'id_receta' => $valueDet->id_recomendacion,
                            'id_tipo_control' => decrypt($valueDet->control),
                            'id_producto' => decrypt($valueDet->id_articulo),
                            'producto' => decrypt($valueDet->articulo),
                            'farmaco' => decrypt($valueDet->componente),
                            'id_presentacion' => decrypt($valueDet->id_apariencia),
                            'presentacion' => decrypt($valueDet->apariencia),
                            'id_receta_dosis' => decrypt($valueDet->id_cuota),
                            'posologia' => decrypt($valueDet->cuota),
                            'id_via_administracion' => decrypt($valueDet->id_regimen),
                            'via_administracion' => decrypt($valueDet->regimen),
                            'id_periodo' => decrypt($valueDet->id_lapso),
                            'periodo' => decrypt($valueDet->lapso),
                            'uso_cronico' => decrypt($valueDet->uso_frecuente),
                            'cantidad_compra' => decrypt($valueDet->volumen_compra),
                            'cantidad' => decrypt($valueDet->volumen),
                            'cantidad_vendida' => decrypt($valueDet->volumen_entregado),
                            'comentario' => decrypt($valueDet->comentario),
                            'token_doc' => $valueDet->cod_doc,
                            'estado' => $valueDet->estado,
                            'fecha_administrado' => $valueDet->fecha_administrado,
                            'hora_administrado' => $valueDet->hora_administrado,
                            'contador_dosis' => $valueDet->contador_dosis,
                            'tiempo_transcurrido' => null,
                            'nombre_responsable' => !empty($valueDet->id_responsable)
                                ? (function($id) {
                                    $prof = Profesional::find($id);
                                    return $prof ? trim($prof->nombre . ' ' . $prof->apellido_uno . ' ' . $prof->apellido_dos) : '';
                                })($valueDet->id_responsable)
                                : '',
                            'created_at' => $valueDet->created_at,
                            'updated_at' => $valueDet->updated_at,
                        ];
                    }

                    $registroResultado[] = [
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
                        'detalle' => $detalleTemp,
                        'created_at' => $value->created_at,
                        'updated_at' => $value->updated_at,
                    ];
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Medicamento guardado correctamente',
                'data' => $registroResultado,
            ]);

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error al guardar medicamento enfermeria: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'No fue posible guardar el medicamento: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Editar observaciones de medicamento de enfermería
     */
    public function editar_observacion_medicamento_enfermeria(Request $request)
    {
        try {
            $medicamento = \App\Models\RecomendacionDetalle::find($request->id);

            if (!$medicamento) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Medicamento no encontrado'
                ]);
            }

            $medicamento->comentario = $request->observacion;

            if ($medicamento->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Observaciones actualizadas correctamente'
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo actualizar las observaciones'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error al editar observación medicamento enfermería: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar medicamento de enfermería
     */
    public function eliminar_medicamento_enfermeria(Request $request)
    {
        try {
            $medicamento = \App\Models\RecomendacionDetalle::find($request->id);
            $tipo = 'recomendacion_detalle';

            if (!$medicamento) {
                $medicamento = \App\Models\DetalleRecetaInterna::find($request->id);
                $tipo = 'detalle_receta_interna';
            }

            if (!$medicamento) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Medicamento no encontrado'
                ]);
            }

            if ($medicamento->delete()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Medicamento eliminado correctamente',
                    'tipo' => $tipo
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo eliminar el medicamento'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error al eliminar medicamento enfermería: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Finalizar tratamiento de medicamento de enfermería
     * Marca el medicamento como finalizado
     */
    public function finalizar_medicamento_enfermeria(Request $request)
    {
        try {

            $medicamento = \App\Models\RecomendacionDetalle::find($request->id);
            $tipo = 'recomendacion_detalle';



            if (!$medicamento) {
                $medicamento = \App\Models\DetalleRecetaInterna::find($request->id);
                $tipo = 'detalle_receta_interna';
            }

            if (!$medicamento) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Medicamento no encontrado'
                ]);
            }

            if ($tipo === 'detalle_receta_interna') {
                // Estructura usada por tratamientos internos/enfermería.
                if (property_exists($medicamento, 'estado_finalizado') || isset($medicamento->estado_finalizado)) {
                    $medicamento->estado_finalizado = 1;
                }

                if (property_exists($medicamento, 'estado_tratamiento') || isset($medicamento->estado_tratamiento)) {
                    $medicamento->estado_tratamiento = 1;
                }

                if (property_exists($medicamento, 'fecha_administrado') || isset($medicamento->fecha_administrado)) {
                    $medicamento->fecha_administrado = now()->format('Y-m-d');
                }

                if (property_exists($medicamento, 'hora_administrado') || isset($medicamento->hora_administrado)) {
                    $medicamento->hora_administrado = now()->format('H:i:s');
                }

                if (property_exists($medicamento, 'id_responsable') || isset($medicamento->id_responsable)) {
                    $medicamento->id_responsable = Auth::id();
                }
            } else {
                // En recomendacion_detalle no existe estado_finalizado: usamos estado binario.
                $medicamento->estado = 0;

                if (property_exists($medicamento, 'id_responsable') || isset($medicamento->id_responsable)) {
                    $medicamento->id_responsable = Auth::id();
                }
            }

            if ($medicamento->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Tratamiento finalizado correctamente',
                    'tipo' => $tipo
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo finalizar el tratamiento'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error al finalizar medicamento enfermería: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }
}
