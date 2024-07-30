<?php

namespace App\Http\Controllers;

use App\Models\AntConfidenciales;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesCirugias;
use App\Models\AntecedentesPaciente;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\Bono;
use App\Models\Bancos;
use App\Models\CertificadoReposo;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\ControlObesidad;
use App\Models\DetalleReceta;
use App\Models\DiagnosticoCie;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\ExamenPPF;
use App\Models\FichaAtencion;
use App\Models\FichaCirugiaDigestivaTipo;
use App\Models\FichaCirugiaGeneral;
use App\Models\FichaCirugiaGeneralTipo;
use App\Models\FichaOftBiomicroscopiaTipo;
use App\Models\FichaOftFondoOjoTipo;
use App\Models\FichaOftTipo;
use App\Models\FichaOtorrinoTipo;
use App\Models\FichaUroTipo;
use App\Models\GrupoSanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\InformeMedico;
use App\Models\Interconsulta;
use App\Models\LugarAtencion;
use App\Models\LiquidacionRecibo;
use App\Models\LogUsersDevices;
use App\Models\NotificacionConfirmacion;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalAntecedenteAcademico;
use App\Models\ProfesionalAsistente;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalDiagnosticoCie;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\RecetaAudifono;
use App\Models\ProfesionalProvisorio;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\TipoAntecedenteAcademico;
use App\Models\TipoEspecialidad;
use App\Models\SubTipoEspecialidad;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Helpers\Funciones;
use App\Models\AcompananteDependiente;
use App\Models\FichaPediatriaGeneralTipo;
use App\Models\Invitacion;
use App\Models\PacienteHistoricoDatosMedicos;
use App\Models\PacientesDependientes;
use App\Models\ProfesionalHorariosBloqueo;
use App\Models\TipoBono;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EscritorioProfesional extends Controller
{

    public function eliminar_horario_agenda(Request $request)
    {

        // $profesional = Profesional::where('id_usuario', Auth::user()->id);
        $horario = ProfesionalHorario::where('id', $request->id_horario)->first();

        if ($horario->delete()) {

            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
        // dd($horario);
    }

    public function ver_ficha_atencion(Request $request)
    {

        $ficha = FichaAtencion::where('id', $request->id_ficha)->first();
        return json_encode($ficha);
    }

    public function examenes_frecuentes()
    {
        // $profesional = Profesional::find(Auth::user()->id_profesional);
        // $diagnosticos = $profesional->diagnosticos_frecuentes;
        return view('app.profesional.configuracion.examenes_frecuentes');
    }

    public function editar_datos_personales_perfil(Request $request)
    {

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();

        $profesional->nombre = $request->nombre;
        $profesional->apellido_uno = $request->apellido_uno;
        $profesional->apellido_dos = $request->apellido_dos;
        $profesional->sexo = $request->sexo;
        $profesional->id_especialidad = $request->id_especialidad;
        $profesional->id_tipo_especialidad = $request->id_tipo_especialidad;
        $profesional->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;
        $profesional->id_tipo_atencion = $request->id_tipo_atencion;
        $profesional->save();

        if (!$profesional->save()) {

            return response()->json(['success' => false, 'message' => 'Error al editar el profesional.']);
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Profesional Editado correctamente.',
                    'profesional' => $profesional
                ]
            );
        }
    }

    public function editar_datos_contacto_perfil(Request $request)
    {

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();

        $profesional->email = $request->email;
        $profesional->telefono_uno = $request->telefono_uno;

        $profesional->save();

        if (!$profesional->save()) {

            return response()->json(['success' => false, 'message' => 'Error al editar el profesional.']);
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Profesional Editado correctamente.',
                    'profesional' => $profesional
                ]
            );
        }
    }

    public function editar_datos_residencia_perfil(Request $request)
    {

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();
        $direccion = Direccion::where('id', $profesional->id_direccion)->first();

        if($direccion)
        {
            // $direccion->region = $request->region;
            $direccion->id_ciudad = $request->ciudad;
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            if($direccion->save())
            {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Profesional Editado correctamente.',
                        'profesional' => $profesional
                    ]
                );
            }
            else
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'proble a al actualziar direcion del Profesional.',
                        'profesional' => $profesional
                    ]
                );
            }
        }
        else
        {
            $direccion = new Direccion();
            // $direccion->region = $request->region;
            $direccion->id_ciudad = $request->ciudad;
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            if($direccion->save())
            {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Profesional Editado correctamente.',
                        'profesional' => $profesional
                    ]
                );
            }
            else
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'problema a al actualziar direcion del Profesional.',
                        'profesional' => $profesional
                    ]
                );
            }
        }
    }

    public function agregar_medicamento_cronico_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $medicamento_cronico = new AntecedenteMedicamentoCronico();
        $medicamento_cronico->id_antecedentes = $antecedente->id;
        $medicamento_cronico->id_medicamento = $request->id_medicamento_cronico;
        $medicamento_cronico->nombre_medicamento_cronico = $request->medicamento_cronico;
        $medicamento_cronico->id_dosis = $request->id_dosis;
        $medicamento_cronico->dosis = $request->dosis;

        if ($medicamento_cronico->save())
        {

            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Medicamento agregado correctamente.',
                    'medicamentos_cronicos' => $medicamentos_cronicos
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar el medicamento crónica.']);
        }
    }

    public function eliminar_medicamento_cronico_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antecedenteMedCronico = AntecedenteMedicamentoCronico::where('id',$request->id)->first()->delete();

        $med_cronico = AntecedenteMedicamentoCronico::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Medicamento eliminada correctamente.',
                'medicamento' => $med_cronico,
                'result' => $antecedenteMedCronico
            ]
        );
    }

    public function agregar_cirugias_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $antCirugia = new AntecedentesCirugias();
        $antCirugia->nombre = $request->nombre;
        $antCirugia->fecha_cirugia = $request->fecha_cirugia;
        $antCirugia->comentarios = $request->comentarios;
        $antCirugia->id_antecedentes = $antecedente->id;

        if ($antCirugia->save())
        {

            $antCirugias = AntecedentesCirugias::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Cirugia agregada correctamente.',
                    'cirugias' => $antCirugias
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar el medicamento crónica.']);
        }
    }

    public function eliminar_cirugias_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antCirugia = AntecedentesCirugias::where('id',$request->id)->first()->delete();

        $antCirugias = AntecedentesCirugias::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Cirugia eliminada correctamente.',
                'cirugias' => $antCirugias,
                'result' => $antCirugia
            ]
        );
    }

    public function agregar_patologia_cronica_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $patologia_cronica = new AntecedenteEnferCronica();
        $patologia_cronica->id_antecedentes = $antecedente->id;
        $patologia_cronica->id_enfermedad_cronica = $request->id_patologia_cronica;
        $patologia_cronica->nombre_patologia_cronica = $request->patologia_cronica;

        if ($patologia_cronica->save()) {

            $patologias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Alergia agregada correctamente.',
                    'patologias_cronicas' => $patologias_cronicas
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar la patologia crónica.']);
        }
    }

    public function eliminarPatologiaCronicaPaciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antecedentesEnferCronicas = AntecedenteEnferCronica::where('id',$request->id)->first()->delete();

        $cronicas = AntecedenteEnferCronica::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Alergia eliminada correctamente.',
                'cronicas' => $cronicas,
                'result' => $antecedentesEnferCronicas
            ]
        );
    }

    public function agregar_alergia_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $alergiaPaciente = new AntecedenteAlergiaPaciente();
        $alergiaPaciente->id_antecedentes = $antecedente->id;
        $alergiaPaciente->nombre_alergia = $request->alergia;
        $alergiaPaciente->id_alergia = $request->id_alergia;
        $alergiaPaciente->comentario = $request->comentario;



        if ($alergiaPaciente->save()) {

            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Alergia agregada correctamente.',
                    'alergias' => $alergias
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar la alergia.']);
        }
        // $paciente->alergias()->attach($request->alergia_id);
        return response()->json(['success' => 'Alergia agregada correctamente.']);
    }

    public function eliminarAlergiaPaciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antecedente_alergia_paciente = AntecedenteAlergiaPaciente::where('id',$request->id_alergia_paciente)->first()->delete();

        $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Alergia eliminada correctamente.',
                'alergias' => $alergias
            ]
        );
    }

    public function solicitar_codigo_fmu(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $paciente->fecha_autorizacion = Carbon::now();
        $paciente->codigo_autorizacion = mt_Rand(1, 10000000);

        if ($paciente->save()) {

            $details = [
                'title' => 'Código autorización FMU',
                'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br/>
                        Junto con saludar, por medio de este correo le informamos que el profesional Dr. ' .
                    $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos .
                    ' <br/> ha solicitado acceder a su Ficha Medica Unica (FMU), favor entregar siguiente codigo al profesional:  <br/>' .
                    $paciente->codigo_autorizacion . ' <br/>' .
                    '<br/> Que tenga un excelente día. <br/><br/> \n' .
                    ' Saludos.',
            ];
            //dd($details);

            Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));
            //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

            return 'success';
        } else {
            return 'error';
        }
    }

    public function lugares_atencion_profesional_agenda()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // $lugares_atencion_profesional = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where('estado', 1)->get();
        // dd($lugares_atencion_profesional);
        $lugares_atencion_profesional = $profesional->LugaresAtencion()->get();
        // dd($lugares_atencion_profesional);
        //$lugares_atencion_profesional = null;
        //dd($lugares_atencion_profesional);
        //$lugares_atencion_profesional = '';
        // dd($lugares_atencion_profesional);


        if (count($lugares_atencion_profesional) == 0) {
            return 'fail';
        }

        return json_encode($lugares_atencion_profesional);
    }

    public function ver_receta_pdf($id)
    {
        $detalleReceta = DetalleReceta::where('id_ficha', $id)->get();


        // return PdfController::generarPDF('RECETA MEDICA');
        // return $detalleReceta;

        $pdf = PDF::loadView('atencion_medica.PDF.pdf_prueba', compact($detalleReceta));

        return $pdf->download('ejemplo.pdf');

        // return 'hola';
    }

    public function index()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $region = Region::all();
        $especialidad = Especialidad::all();

        if (isset($profesional)) {
            $tipo_agendas = ProfesionalHorario::select('tipo_agenda')->where('id_profesional', $profesional->id)->groupBy('tipo_agenda')->pluck('tipo_agenda')->toArray();
            $horas_dia = HoraMedica::where('id_profesional', $profesional->id)->whereDate('fecha_consulta', \Carbon\Carbon::now()->format('Y-m-d'))->get();
            foreach ($horas_dia as $h) {
                $h->paciente = Paciente::where('id', $h->id_paciente)->first();
                $h->lugar_atencion = LugarAtencion::where('id', $h->id_lugar_atencion)->first();
            }

            $lugar_atencion_prof = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->count();

            //if($profesional->bienvenida == 0)
            if( $lugar_atencion_prof == 0 )
            {
                return view('bienvenida.inicio_profesionales')->with([
                    'region' => $region,
                    'profesional' => $profesional,
                ]);
            }
            else
            {
                return view('app.profesional.escritorio_profesional')->with([
                    'region' => $region,
                    'profesional' => $profesional,
                    'hora_dia' => $horas_dia,
                    'tipo_agendas' => $tipo_agendas,
                ]);
            }
        }


        $filtro = array();
        $filtro[] = array('id_user_invitado', Auth::user()->id);
        $filtro[] = array('procesado', 1);
        // $filtro[] = array('estado', 2);
        $invitacion = Invitacion::where($filtro)->whereNotNull('fecha_aprobacion')->first();
        $tipo_especialidad = '';
        $sub_tipo_especialidad = '';
        if($invitacion)
        {
            $tipo_especialidad = TipoEspecialidad::where('id_especialidad', $invitacion->id_especialidad)->get();
            $sub_tipo_especialidad = SubTipoEspecialidad::where('id_tipo_especialidad', $invitacion->id_tipo_especialidad)->get();
        }

        return view('auth.Registros.registro_profesional')->with([
            'region' => $region,
            'especialidad' => $especialidad,
            'tipo_especialidad' => $tipo_especialidad,
            'sub_tipo_especialidad' => $sub_tipo_especialidad,
            'invitacion' => $invitacion,
        ]);
    }


    public function validar_rut(Request $request)
    {
        $email = User::where('email', $request->email)->first();

        if (isset($email) || $email != '') {
            return 'fail';
        }

        return 'ok';
    }

    public function registro()
    {
        return view('auth.Registros.registro_profesional');
    }

    public function ficha_medica_unica_auth(Request $request)
    {
        // dd($request);
        $paciente = Paciente::where('id', $request->id_paciente_fmu)->first();

        if ($paciente->codigo_autorizacion == $request->paciente_codigo) {
            return view('app.paciente.ficha_medica', ['paciente' => $paciente]);
            // return json_encode($paciente->id);
        }

        return redirect()->back()->with('mensaje_codigo', $paciente->id);
    }



    public function miFichaMedicaAtencion(Request $request)
    {
        $paciente = Paciente::where('id', $request->id)->first();

        return view('app.paciente.ficha_medica', ['paciente' => $paciente]);
    }

    public function diagnosticos_frecuentes()
    {
        return view('app.profesional.diagnosticos_frecuentes_configuracion');
    }

    public function ver_flujo_caja()
    {

        $rendicion_caja = array();
        return view('app.profesional.flujo_caja_profesional')->with([
            'rendicion' => $rendicion_caja
        ]);
    }

    public function diagnosticos_cie10()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // $df_cies = DB::table('diagnosticos_cies')->paginate(25);
        $diagnoticos_profesional = ProfesionalDiagnosticoCie::where('id_profesional', $profesional->id)->get();

        // return view('app.profesional.diagnosticos_cie10_configuracion')->with(['diagnostico' => $df_cies, 'diagnoticos_profesional' => $diagnoticos_profesional]);
        return view('app.profesional.diagnosticos_cie10_configuracion')->with(['diagnoticos_profesional' => $diagnoticos_profesional]);
    }

    public function buscarDiagnostico_cie10(Request $request)
    {
        $datos = array();
        $registros = DiagnosticoCie::where('descripcion', 'like', ''.$request->descripcion.'%')->get();

        $datos['count'] = $registros->count();
        if($registros->count())
        {
            foreach ($registros as $key => $value) {
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
                $filtro = array();
                $filtro[] = array('id_diagnostico_cie',$value->id);
                $filtro[] = array('id_profesional', $profesional->id);
                $diagnoticos_profesional = ProfesionalDiagnosticoCie::where($filtro)->first();
                if( $diagnoticos_profesional )
                {
                    $registros[$key]['activo'] = 1;
                }
                else
                {
                    $registros[$key]['activo'] = 0;
                }
            }
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

    public function registrarDiagnosticoCie10Profesional(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $lista_diagnosticos = $request->lista_diagnostico;
        if(count($lista_diagnosticos) > 0)
        {
            foreach ($lista_diagnosticos as $key => $value)
            {
                $id_diagnostico = $value[0];
                $estado_diagnostico = $value[1];
                /** buscar registro esxistene */
                $filtro = array();
                $filtro[] = array('id_diagnostico_cie',$id_diagnostico);
                $filtro[] = array('id_profesional',Auth::user()->id);
                $registro = ProfesionalDiagnosticoCie::where($filtro)->first();

                if($registro)
                {
                    $datos['diagnostico_encontrado'][] = $registro;
                    /** encontrado */
                    /** inactivo */
                    if($estado_diagnostico == 'false')
                    {
                        if($registro->delete()){
                            /** eliminado  */
                            $datos['diagnostico'][$key]['estado'] = 1;
                            $datos['diagnostico'][$key]['msj'] = 'desactivacion exitosa';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                        else
                        {
                            /** falla al eliminar */
                            $datos['diagnostico'][$key]['estado'] = 0;
                            $datos['diagnostico'][$key]['msj'] = 'problemas al desactivacion';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                    }
                }
                else
                {
                    /** no encotrnado */
                    /** activo */
                    if($estado_diagnostico== 'true')
                    {
                        $nuevo_registro = new ProfesionalDiagnosticoCie();
                        $nuevo_registro->id_profesional = Auth::user()->id;
                        $nuevo_registro->id_diagnostico_cie = $id_diagnostico;
                        if($nuevo_registro->save()){
                            /** registro con exito */
                            $datos['diagnostico'][$key]['estado'] = 1;
                            $datos['diagnostico'][$key]['msj'] = 'registro exitoso';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                        else
                        {
                            /** falla en el registro */
                            $datos['diagnostico'][$key]['estado'] = 0;
                            $datos['diagnostico'][$key]['msj'] = 'registro con error al registrar';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                    }
                }

            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros actualizados';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'debe ingresar lista de diagnostico cie 10';
        }
        return $datos;

    }


    public function buscar_contacto(Request $request)
    {
        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->get();

        foreach ($contacto as $con) {
            $contacto_paciente = PacienteContactoEmergencia::where('id_contacto', $con->id)->where('id_paciente', $request->id_paciente_contacto)->first();
            if ($contacto_paciente != '') {
                return 'existe';
            }
        }

        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->first();

        // $contacto_paciente = PacienteContactoEmergencia::where('id_contacto', $contacto->id)->where('id_paciente', $request->id_paciente_contacto)->first();

        //$contacto = $resultado->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre;
        $region = region::all();
        if ($contacto == null) {
            $contacto = Paciente::where('rut', $request->rut_contacto)->first();

            if ($contacto == null) {
                $contacto = Profesional::where('rut', $request->rut_contacto)->first();

                if ($contacto == null) {
                    $contacto = Asistente::where('rut', $request->rut_contacto)->first();
                    if ($contacto == null) {
                        return 'vacio';
                    } else {
                        //$contacto->nombres = $contacto->nombre;
                        $contacto->direccion = $contacto->Direccion()->first()->direccion;
                        $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                        $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                        $contacto->region = $region;

                        return json_encode($contacto);
                    }
                } else {
                    $contacto->direccion = $contacto->Direccion()->first()->direccion;
                    $contacto->nombres = $contacto->nombre;
                    $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                    $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                    $contacto->region = $region;

                    return json_encode($contacto);
                }
            } else {
                $contacto->direccion = $contacto->Direccion()->first()->direccion;
                $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                $contacto->region = $region;

                return json_encode($contacto);
            }
        } else {
            $contacto->telefono_uno = $contacto->telefono;
            $contacto->nombres = $contacto->nombre;
            $contacto->direccion = $contacto->Direccion()->first()->direccion;
            $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
            $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
            $contacto->region = $region;

            return json_encode($contacto);
        }
    }

    public function mis_estadisticas()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $now = Carbon::now();
        $last = Carbon::now()->add(-30, 'day');
        $total_pacientes = FichaAtencion::where('id_profesional', $profesional->id)->distinct()->count('id_paciente');
        $treinta_dias = FichaAtencion::where('id_profesional', $profesional->id)->whereBetween('created_at', [$last, $now])->distinct()->count('id_paciente');

        return view('app.profesional.estadisticas_profesional')->with(['total_pacientes' => $total_pacientes, 'treinta_dias' => $treinta_dias]);
    }

    public function mis_pacientes()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha_atencion = FichaAtencion::where('id_profesional', $profesional->id)->distinct()->get(['id_paciente']);
        $prevision = Prevision::all();
        $region = Region::all();
        $paciente = [];
        foreach ($ficha_atencion as $f) {
            array_push($paciente, $f->Paciente()->first());
        }
        // dd($paciente);

        return view('app.profesional.pacientes_profesional')->with(
            [
                'ficha_atencion' => $ficha_atencion,
                'prevision' => $prevision,
                'paciente' => $paciente,
                'profesional' => $profesional,
                'region' => $region
            ]
        );
    }

    public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }

    public function mis_asistentes()
    {
        /*$sistentes = Profesional::where('id', 3)->first();
        $ficha_atencion = FichaAtencion::where('id_profesional', $profesional->id)->get();
        $paciente = [];
        foreach ($ficha_atencion as $f) {
            array_push($paciente, $f->Paciente()->first());
        }*/
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $region = Region::all();

        $asistentes = $profesional->Asistentes()->get();
        $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_profesional', $profesional->id)->get();
        // dd($asistentes_lugar_atencion);

        return view('app.profesional.mis_asistentes')->with(['asistentes' => $asistentes, 'region' => $region, 'asistentes_lugar_atencion' => $asistentes_lugar_atencion]);
    }

    public function crear_asistente(Request $request)
    {
        /** REGISTRO DE ASISTENTE EXISTENTE */
        if ($request->id_asistente_registrado != null) {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();
            $asistente = Asistente::find($request->id_asistente_registrado);
            $asistente->rut = $request->rut_nuevo_asistente;
            $asistente->nombres = $request->nombre_nuevo_asistente;
            $asistente->apellido_uno = $request->apellido_nuevo_asistente;
            $asistente->apellido_dos = $request->apellido_dos_nuevo_asistente;
            $asistente->telefono_uno = $request->telefono_nuevo_asistente;

            $direccion = $asistente->Direccion()->first();
            $direccion->direccion = $request->direccion_nuevo_asistente;
            $direccion->numero_dir = $request->numero_nuevo_asistente;
            $direccion->id_ciudad = $request->ciudad_agregar;

            $asistente->save();
            $direccion->save();

            $profesional_asistente = new ProfesionalAsistente();
            $profesional_asistente->id_profesional = $profesional->id;
            $profesional_asistente->id_asistente = $asistente->id;

            if (!$profesional_asistente->save()) {
                return back()->with('mensaje', 'error al registrar asistente');
            }

            return back()->with('mensaje', "Se ha registrado asistente $asistente->nombre");
        }
        /** REGISTRO DE ASISTENTE NUEVA */
        else
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();
            $asistente = new Asistente();
            $asistente->rut = $request->rut_nuevo_asistente;
            $asistente->nombres = $request->nombre_nuevo_asistente;
            $asistente->apellido_uno = $request->apellido_nuevo_asistente;
            $asistente->apellido_dos = $request->apellido_dos_nuevo_asistente;
            $asistente->telefono_uno = $request->telefono_nuevo_asistente;
            //$asistente->telefono_dos = $request->;
            //$asistente->sexo = $request->;
            $asistente->email = $request->email_nuevo_asistente;
            //$asistente->fecha_nac = $request->;

            $direccion = new Direccion();
            $direccion->direccion = $request->direccion_nuevo_asistente;
            $direccion->numero_dir = $request->numero_nuevo_asistente;
            $direccion->id_ciudad = $request->ciudad_agregar;

            if ($direccion->save()) {
                $asistente->id_direccion = $direccion->id;
            }

            if (!$asistente->save()) {
                return back()->with('mensaje', 'error al registrar asistente');
            }

            $profesional_asistente = new ProfesionalAsistente();
            $profesional_asistente->id_profesional = $profesional->id;
            $profesional_asistente->id_asistente = $asistente->id;

            if (!$profesional_asistente->save()) {
                return back()->with('mensaje', 'error al registrar asistente');
            }

            return back()->with('mensaje', "Se ha registrado asistente $asistente->nombre");
        }

    }

    public function ver_lugar_atencion(Request $request)
    {
        $lugar_atencion = LugarAtencion::where('id', $request->lugar_atencion)->first();
        $direccion = Direccion::where('id', $lugar_atencion->id_direccion)->first();

        $direccion->Ciudad = $direccion->Ciudad()->first();
        $region = Region::all();
        $ciudad = Ciudad::where('id_region', $direccion->Ciudad->id_region)->orderBy('nombre')->get();

        $data = [
            'LugarAtencion' => $lugar_atencion,
            'Direccion' => $direccion,
            'Regiones' => $region,
            'Ciudades' => $ciudad,
        ];

        return json_encode($data);
    }

    public function editar_lugar_atencion(Request $request)
    {
        $lugar_atencion = LugarAtencion::where('id', $request->id_lugar_atencion)->first();
        $lugar_atencion->email = $request->email;
        $lugar_atencion->telefono = $request->telefono;
        $lugar_atencion->nombre = $request->nombre;
        $lugar_atencion->tipo = $request->tipo;

        $direccion = Direccion::where('id', $lugar_atencion->id_direccion)->first();

        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = $request->numero_dir;
        $direccion->id_ciudad = $request->id_ciudad;

        if (!$lugar_atencion->save()) {
            return 'error';
        }

        if (!$direccion->save()) {
            return 'error';
        }

        if ($request->notificar_pacientes_modificar == 'on') {
            $fichas = FichaAtencion::where('id_profesional', Auth::user()->id)->get();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();

            $pacientes = [];
            foreach ($fichas as $f) {
                array_push($pacientes, $f->Paciente()->first());
            }

            foreach ($pacientes as $p) {
                $details = [
                    'title' => 'Edición lugar de atención',
                    'body' => 'Estimado/a ' . $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos . ',<br/>
                    Junto con saludar, por medio de este correo le informamos que el profesional Dr. ' .
                        $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos .
                        ' <br/> ha Editado los datos del lugar de atención:  <br/>' .
                        'Nombre:' . $lugar_atencion->nombre . ' <br/>' .
                        'Dirección: ' . $direccion->direccion . ' ' . $direccion->numero_dir . ' <br/>' .
                        'Ciudad: ' . $ciudad->nombre .
                        '<br/> Que tenga un excelente día. <br/><br/> \n' .
                        ' Saludos.',
                ];

                //Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));
            }
        }

        return json_encode($lugar_atencion);
    }

    public function buscar_hora_medica(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();
        $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        $edad = (\Carbon\Carbon::parse($paciente->fecha_nac)->age);

        $responsable = '';
        if($edad < 18)
        {
            $result_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->first();
            if($result_responsable)
                $responsable = Paciente::where('id', $result_responsable->id_responsable)->first();
            else
                $responsable = null;
        }

        // return json_encode($paciente);
        return array(
            'paciente' => $paciente,
            'profesional' =>$profesional,
            'estado_hora' =>$hora_medica->id_estado,
            'edad' => $edad,
            'responsable' => $responsable,
        );
    }

    //funciones mis lugares de atencion
    public function mi_asistente_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $asistenteLugar = AsistenteLugarAtencion::where('id_lugar_atencion', $request->id_lugar_atencion)->where('id_profesional', $profesional->id)->get();

        $asistente = [];
        $pos = 0;
        foreach ($asistenteLugar as  $key => $a) {
            // array_push($asistente, $a->Asistentes()->first());
            $asistente[$pos] = $a->Asistentes()->first();
            $asistente[$pos]['estado'] = $a->estado;
            $pos++;
        }

        return json_encode($asistente);
    }

    public function cambio_estado_asistente(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $filtro = array();
        if(!empty($request->id_lugar_atencion))
            $filtro[] = array('id_lugar_atencion', $request->id_lugar_atencion);

        $filtro[] = array('id_asistente', $request->id_asistente);
        $filtro[] = array('id_profesional', $profesional->id);
        $asistenteLugar = AsistenteLugarAtencion::where($filtro)
                                        ->where('id_profesional', $profesional->id)
                                        ->first();

        $asistenteLugar->estado = $request->estado;
        if (!$asistenteLugar->save()) {
            return 'fail';
        }
        //$asistente = $asistenteLugar->Asistentes()->first();
        return 'ok';
    }

    public function cambio_estado_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ProfesionalLugar = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $request->id_lugar_atencion)->where('id_profesional', $profesional->id)->first();

        $ProfesionalLugar->estado = $request->estado;
        if (!$ProfesionalLugar->save()) {
            return 'fail';
        }
        //$asistente = $asistenteLugar->Asistentes()->first();
        return 'ok';
    }

    public function mis_valores_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $valores = ProfesionalConvenio::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();

        return json_encode($valores);
    }

    public function eliminar_contacto_paciente(Request $request)
    {
        $pacienteContacto = PacienteContactoEmergencia::where('id_paciente', $request->id_paciente)->where('id_contacto', $request->id_contacto)->first();
        if (!$pacienteContacto->delete()) {
            return 'error';
        } else {
            return 'ok';
        }
    }

    public function guardar_valores_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $profesional_convenio = new ProfesionalConvenio();

        $profesional_convenio->convenios = $request->convenios;
        $profesional_convenio->tipo_atencion = $request->lugar_atencion_convenio;
        $profesional_convenio->valor = $request->valor;
        $profesional_convenio->id_profesional = $profesional->id;
        $profesional_convenio->id_lugar_atencion = $request->id_lugar_atencion_valor;

        if (!$profesional_convenio->save()) {
            return 'Error';
        }

        return json_encode($profesional_convenio);
    }

    public function paciente_esperando(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();
        $hora_medica->id_estado = 4;
        // $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        // $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function buscar_asistente_profesional(Request $request)
    {
        $asistente = Asistente::where('rut', $request->rut_asistente)->first();

        if ($asistente == null) {
            return 'null';
        }

        $usuario = Auth::user();

        $profesional = Profesional::where('id_usuario', $usuario->id)->first();

        $asistenteP = ProfesionalAsistente::where('id_asistente', $asistente->id)->where('id_profesional', $profesional->id)->first();
        if ($asistenteP == null) {
            $asistente->ciudad = $asistente->Direccion()->first()->id_ciudad;
            $asistente->region = $asistente->Direccion()->first()->Ciudad()->first()->id_region;
            $asistente->direccion = $asistente->Direccion()->first()->direccion;
            $asistente->numero_dir = $asistente->Direccion()->first()->numero_dir;

            return json_encode($asistente);
        } else {
            return 'existe';
        }
    }

    public function buscar_asistente(Request $request)
    {
        $profesional = '';
        $profesional_temp = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($profesional_temp)
            $profesional = $profesional_temp;

        $asistente = Asistente::where('rut', $request->rut)->first();
        $lugar = LugarAtencion::where('id', $request->id_lugar)->first();

        if ($asistente == null) {
            return 'null';
        }

        if($profesional)
            $asistenteL = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->where('id_lugar_atencion', $lugar->id)->where('id_profesional', $profesional->id)->first();
        else
            $asistenteL = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->where('id_lugar_atencion', $lugar->id)->first();

        if ($asistenteL == null) {
            return json_encode($asistente);
        } else {
            return 'existe';
        }

        /* if ($asistente == null) {
             $paciente = Paciente::where('rut', $request->rut_asistente)->first();
             if ($paciente == null) {
                 $profesional = Paciente::where('rut', $request->rut_asistente)->first();
                 if ($profesional == null) {
                     return 'null';
                 } else {
                     return json_encode($profesional);
                 }
             } else {
                 return json_encode($paciente);
             }
         } else {
             return json_encode($asistente);
         }*/
    }

    public function agregar_asistente_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $asistente_lugar_atencion = new AsistenteLugarAtencion();
        $asistente_lugar_atencion->id_asistente = $request->id_asistente;
        $asistente_lugar_atencion->id_lugar_atencion = $request->id_lugar_atencion;
        $asistente_lugar_atencion->id_profesional = $profesional->id;
        if(!empty($request->examen))
            $asistente_lugar_atencion->examen = $request->examen;

        if (!$asistente_lugar_atencion->save()) {
            return 'error';
        }

        return json_encode($asistente_lugar_atencion);
    }

    public function ver_paciente($id)
    {
        $paciente = Paciente::where('id', $id)->first();
        //$contacto_emergencia = PacienteContactoEmergencia::where('id_paciente', $paciente->id)->first();
        //$contacto = ContactoEmergencia::where('id', $contacto_emergencia->id_contacto)->first();
        $prevision = Prevision::all();
        $direccion = $paciente->Direccion()->first();
        $ciudad = $direccion->Ciudad()->first();
        $contacto = $paciente->ContactosEmergencia()->get();
        $region = Region::all();
        $ciudades = Ciudad::orderBy('nombre');
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

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


        // $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        // $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
        // $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        //$contacto = $paciente->ContactosEmergencia()->first();
        //$alergias = $paciente->alergias()->get();
        //$operaciones = $paciente->operaciones()->get();
        //$organosDonar = $paciente->organosDonar()->get();
        //$EnfeCronica = $paciente->enf_cronicas()->get();
        // $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        $fichasConfi = FichaAtencion::where('id_paciente', 4)->where('confidencial', true)->get();
        $grupo_sanguineo = GrupoSanguineo::all();

        $id_usuario = Auth::user()->id;
        $userData = Funciones::userData($id_usuario);


        return view('app.profesional.editar_perfil_paciente_profesional')
            ->with([
                'userData' => $userData,
                'paciente' => $paciente,
                'prevision' => $prevision,
                'contacto' => $contacto,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
                'ciudades' => $ciudades,
                'profesional' => $profesional,
                'alergias' => $alergias,
                'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'antecedentes_cirugias' => $antecedentes_cirugias,
                'ant_confidenciales' => $ant_confidenciales,
                //'organosDonar'=>$organosDonar,
                'patoligias_cronicas' => $patoligias_cronicas,
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'grupo_sanguineo' => $grupo_sanguineo,
            ]);
    }

    public function editar_antecedentes_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $paciente = Paciente::where('id', $request->id_paciente)->first();

        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $nuevo = 0;
        $previo = array();
        $texto_datos = '';
        if ($antecedente == null) {
            $antecedente = new AntecedentesPaciente();
            $nuevo = 1;
        }
        else
        {
            $previo = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        }

        $antecedente->transfusion = $request->edit_transfusion;
        $antecedente->dona_organos = $request->edit_donante_total;
        $antecedente->dona_organos_parcial = $request->edit_donante_parcial;
        $antecedente->dona_sangre = $request->edit_dona_sangre;
        $antecedente->impedimento_donar = $request->comentarios_impedimento;
        // $antecedente->comentario_gs = $request->comentarios_gruposangre;
        $antecedente->comentarios = $request->comentarios_organo;
        $antecedente->hepatitis = $request->edit_hepatitis;
        $antecedente->comentario_hepa = $request->comentarios_hepatitis;
        if(!empty($request->editar_grupo_sanguineo))
        $antecedente->id_grupo_sanguineo = $request->editar_grupo_sanguineo;

        if ($antecedente->save()) {
            $paciente->id_antecedente = $antecedente->id;
            $paciente->save();

            if($nuevo == 1)
            {
                if(!empty($request->edit_transfusion))
                    $texto_datos .= 'Registro Transfusión:'.(($request->edit_transfusion==1)?'SI':'NO').' | ';
                if(!empty($request->edit_donante_total))
                    $texto_datos .= 'Registro Donante Total:'.(($request->edit_donante_total==1)?'SI':'NO').' | ';
                if(!empty($request->edit_donante_parcial))
                    $texto_datos .= 'Registro Donante Parcial:'.(($request->edit_donante_parcial==1)?'SI':'NO').' | ';
                if(!empty($request->edit_dona_sangre))
                    $texto_datos .= 'Registro Donante Sangre:'.(($request->edit_dona_sangre==1)?'SI':'NO').' | ';
                if(!empty($request->comentarios_impedimento))
                    $texto_datos .= 'Registro Posee Impedimento:'.$request->comentarios_impedimento.' | ';
                if(!empty($request->comentarios_organo))
                    $texto_datos .= 'Registro Organo a Donar:'.$request->comentarios_organo.' | ';
                if(!empty($request->edit_hepatitis))
                    $texto_datos .= 'Registro Vacuna o Hepatitis:'.(($request->edit_hepatitis==1)?'SI':'NO').' | ';
                if(!empty($request->comentarios_hepatitis))
                    $texto_datos .= 'Registro Comentrio Hepatitis o VIH:'.$request->comentarios_hepatitis.' | ';
                if(!empty($request->editar_grupo_sanguineo))
                {
                    $grupo_sang = GrupoSanguineo::find($request->editar_grupo_sanguineo);
                    if($grupo_sang)
                        $texto_datos .= 'Registro GrupoSangineo:'.$grupo_sang->nombre_gs.' | ';
                }
            }
            else
            {
                if(!empty($request->edit_transfusion) && ($previo->edit_transfusion != $request->edit_transfusion))
                    $texto_datos .= 'Actualización Transfusión:'.(($previo->edit_transfusion==1)?'SI':'NO').' a '.(($request->edit_transfusion==1)?'SI':'NO').' | ';

                if(!empty($request->edit_donante_total) && ($previo->edit_donante_total != $request->edit_donante_total))
                    $texto_datos .= 'Actualización Donante Total:'.(($previo->edit_donante_total==1)?'SI':'NO').' a '.(($request->edit_donante_total==1)?'SI':'NO').' | ';

                if(!empty($request->edit_donante_parcial) && ($previo->edit_donante_parcial != $request->edit_donante_parcial))
                    $texto_datos .= 'Actualización Donante Parcial:'.(($previo->edit_donante_parcial==1)?'SI':'NO').' a '.(($request->edit_donante_parcial==1)?'SI':'NO').' | ';

                if(!empty($request->edit_dona_sangre) && ($previo->edit_dona_sangre != $request->edit_dona_sangre))
                    $texto_datos .= 'Actualización Donante Sangre:'.(($previo->edit_dona_sangre==1)?'SI':'NO').' a '.(($request->edit_dona_sangre==1)?'SI':'NO').' | ';

                if(!empty($request->comentarios_impedimento) && ($previo->comentarios_impedimento != $request->comentarios_impedimento))
                    $texto_datos .= 'Actualización Posee Impedimento:'.$request->comentarios_impedimento.' | ';

                if(!empty($request->comentarios_organo) && ($previo->comentarios_organo != $request->comentarios_organo))
                    $texto_datos .= 'Actualización Organo a Donar:'.$request->comentarios_organo.' | ';

                if(!empty($request->edit_hepatitis) && ($previo->edit_hepatitis != $request->edit_hepatitis))
                    $texto_datos .= 'Actualización Vacuna o Hepatitis:'.(($previo->edit_hepatitis==1)?'SI':'NO').' a '.(($request->edit_hepatitis==1)?'SI':'NO').' | ';

                if(!empty($request->comentarios_hepatitis) && ($previo->comentarios_hepatitis != $request->comentarios_hepatitis))
                    $texto_datos .= 'Actualización Comentrio Hepatitis o VIH:'.$request->comentarios_hepatitis.' | ';

                if(!empty($request->editar_grupo_sanguineo) && ($previo->editar_grupo_sanguineo != $request->editar_grupo_sanguineo))
                {
                    $grupo_sang_prev = GrupoSanguineo::find($previo->editar_grupo_sanguineo);
                    $grupo_sang = GrupoSanguineo::find($request->editar_grupo_sanguineo);
                    if($grupo_sang)
                        $texto_datos .= 'Actualización GrupoSangineo:'.$grupo_sang_prev.' a '.$grupo_sang->nombre_gs.' | ';
                }
            }

            if(!empty($texto_datos))
            {
                $return_log = PacienteHistoricoDatosMedicosController::registrar($paciente->id, $profesional->id, $texto_datos);
                // Log::useFiles(storage_path() . '/logs/log_datos_medicos_' . date('Ymd') . '.log');
                // Log::debug( json_encode($return_log) );
                Log::build([
                    'path' => storage_path('logs/log_datos_medicos_' . date('Ymd') . '.log'),
                  ])->info(json_encode($return_log) );
            }


            return json_encode($antecedente);
        }


        return 'failed';
    }

    public function editar_antecedentes_confidenciales_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $paciente = Paciente::where('id', $request->id_paciente)->first();

        $antecedente = AntConfidenciales::where('id_paciente', $request->id_paciente)->first();

        if ($antecedente == null) {
            $antecedente = new AntConfidenciales();
        }


        $antecedente->id_paciente = $request->id_paciente;
        $antecedente->rompeclave = $request->rompeclave;
        $antecedente->antecedentes = $request->antecedentes;
        $antecedente->otros_antecedentes = $request->otros_antecedentes;

        if ($antecedente->save()) {
            $paciente->id_antecedente = $antecedente->id;
            $paciente->save();

            return json_encode($antecedente);
        }


        return 'failed';
    }

    public function mi_perfil()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $direccion_profesional = Direccion::where('id',$profesional->id_direccion)->first();
        $direccion_id_ciudad_profesional = '';
        $direccion_txt_ciudad_profesional = '';
        $direccion_region_profesional = '';
        $direccion_id_region_profesional = '';
        $direccion_txt_region_profesional = '';

        $regiones = Region::all();
        $ciudades = Ciudad::all();

        if($direccion_profesional)
        {
            $direccion_id_ciudad_profesional = $direccion_profesional->id_ciudad;
            $direccion_region_profesional = Ciudad::select('nombre','id_region')->where('id',$direccion_id_ciudad_profesional)->first();

            if($direccion_region_profesional)
            {
                $direccion_txt_ciudad_profesional = $direccion_region_profesional->nombre;

                $ciudades = Ciudad::where('id_region', $direccion_region_profesional->id_region)->get();
                $direccion_id_region_profesional = $direccion_region_profesional->id_region;

                $direccion_txt_region_profesional_temp = Region::find($direccion_id_region_profesional);
                $direccion_txt_region_profesional = $direccion_txt_region_profesional_temp->nombre;
            }
        }

        $txt_especialidades = '';
        $txt_tipo_especialidades = '';
        $txt_sub_tipo_especialidades = '';

        $especialidades = Especialidad::all();

        $tipo_especialidades = TipoEspecialidad::all();
        if($profesional->id_especialidad)
        {
            $tipo_especialidades = TipoEspecialidad::where('id_especialidad', $profesional->id_especialidad)->get();
            $txt_especialidades = '';
            $especialidad_temp = Especialidad::where('id', $profesional->id_especialidad)->get()->first();
            if($especialidad_temp)
                $txt_especialidades = $especialidad_temp->nombre;
        }

        $sub_tipo_especialidades = SubTipoEspecialidad::all();
        if($profesional->id_tipo_especialidad)
        {
            $sub_tipo_especialidades = SubTipoEspecialidad::where('id_tipo_especialidad', $profesional->id_tipo_especialidad)->get();
            $txt_tipo_especialidades = '';
            $tipo_especialidad_temp = TipoEspecialidad::where('id', $profesional->id_tipo_especialidad)->get()->first();
            if($especialidad_temp)
                $txt_tipo_especialidades = $tipo_especialidad_temp->nombre;
        }

        if($profesional->id_sub_tipo_especialidad)
        {
            $txt_sub_tipo_especialidades = '';
            $sub_tipo_especialidades_temp = SubTipoEspecialidad::where('id', $profesional->id_sub_tipo_especialidad)->get()->first();

            if($sub_tipo_especialidades_temp)
                $txt_sub_tipo_especialidades = $sub_tipo_especialidades_temp->nombre;

        }

        $perfil_academico = ProfesionalAntecedenteAcademico::where('id_profesional',$profesional->id)->get();
        $tipo_ant_academico = TipoAntecedenteAcademico::all();
        $bancos = Bancos::where('estado',1)->get();
        $liquidacion = LiquidacionRecibo::where('id_seccion',Auth::user()->id)->get();

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
        // $user = Auth::user()->password;
        // // $pass = Crypt::decryptString($user);
        // dd($user);

        return view('app.profesional.perfil_profesional')->with(
            [
                'profesional' => $profesional,
                'direccion_id_ciudad_profesional' => $direccion_id_ciudad_profesional,
                'direccion_txt_ciudad_profesional' => $direccion_txt_ciudad_profesional,
                'direccion_region_profesional' => $direccion_region_profesional,
                'direccion_id_region_profesional' => $direccion_id_region_profesional,
                'direccion_txt_region_profesional' => $direccion_txt_region_profesional,
                'especialidades' => $especialidades,
                'tipo_especialidades' => $tipo_especialidades,
                'sub_tipo_especialidades' => $sub_tipo_especialidades,
                'txt_especialidades' => $txt_especialidades,
                'txt_tipo_especialidades' => $txt_tipo_especialidades,
                'txt_sub_tipo_especialidades' => $txt_sub_tipo_especialidades,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
                'perfil_academico' => $perfil_academico,
                'tipo_ant_academico' => $tipo_ant_academico,
                'bancos' => $bancos,
                'liquidacion' => $liquidacion,
                'liqui_principal' => $liqui_principal,
                // 'pass' => $pass,
            ]
        );
    }

    public function index_receta()
    {
        return view('app.profesional.receta_online.inicio_receta_online_profesional');
    }

    public function mis_examenes()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha = FichaAtencion::where('id_profesional', $profesional->id)->get();

        $examenes = array();
        foreach ($ficha as $key_f => $value_f)
        {
            $nombre_paciente = $value_f->Paciente()->first()->nombres .' ' .$value_f->Paciente()->first()->apellido_uno .' ' .$value_f->Paciente()->first()->apellido_dos;
            $rut_paciente = $value_f->Paciente()->first()->rut;
            $created_at = $value_f->created_at;

            $registros = ExamenPPF::where('id_ficha_atencion', $value_f->id)->get();


            if($registros->count())
            {

                $examen = '';
                $examen_array = array();
                $tipo_examen = '';
                $tipo_examen_array = array();
                foreach ($registros as $key_examen => $value_examen) {
                    if(!in_array($value_examen->examen, $examen_array)){
                        $examen .= $value_examen->examen.' | ';
                        array_push($examen_array,$value_examen->examen);
                    }
                    if(!in_array($value_examen->tipo_examen, $tipo_examen_array)){
                        $tipo_examen .= $value_examen->tipo_examen.' | ';
                        array_push($tipo_examen_array,$value_examen->tipo_examen);
                    }
                }

                $examen_temp = array(
                    'created_at'=>\Carbon\Carbon::parse($created_at)->format('Y-m-d'),
                    'id_ficha_atencion'=>$value_f->id,
                    'examen'=>$examen,
                    'tipo_examen'=>$tipo_examen,
                    'Paciente' => array(
                        'nombre' => $nombre_paciente,
                        'rut' => $rut_paciente,
                    ),
                );

                array_push($examenes,$examen_temp);
            }
        }
        // $examenes = $profesional->Examenes()->get();
        return view('app.profesional.receta_online.mis_examenes_profesional')->with(
            [
                'examenes' => $examenes,
            ]
        );
    }

    public function mis_recetas()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_profesional',$profesional->id)->with('Recetas')->get();
        return view('app.profesional.receta_online.mis_recetas_profesional')->with(['ficha' => $fichas]);
    }

    public function mis_certificados()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha = FichaAtencion::where('id_profesional', $profesional->id)->get();
        $reposo = array();
        $interconsulta = array();
        $informesMedicos = array();
        $controlObesidad = array();
        $hipertensiones = array();
        foreach ($ficha as $key_f => $value_f) {
            $result_CertificadoReposo = CertificadoReposo::where('id_ficha_atencion', $value_f->id)->first();
            $result_Interconsulta = Interconsulta::where('id_ficha_atencion_soli', $value_f->id)->first();
            $result_InformeMedico = InformeMedico::where('id_ficha_atencion', $value_f->id)->first();
            if(!empty($result_CertificadoReposo))
                array_push($reposo,$result_CertificadoReposo);
            if(!empty($result_Interconsulta))
                array_push($interconsulta,$result_Interconsulta);
            if(!empty($result_InformeMedico))
                array_push($informesMedicos,$result_InformeMedico);

        }

        // $reposo = CertificadoReposo::where('id_profesional', $profesional->id)->get();
        // $interconsulta = Interconsulta::where('id_profesional', $profesional->id)->get();
        // $informesMedicos = InformeMedico::where('id_profesional', $profesional->id)->get();
        // $controlObesidad = ControlObesidad::where('id_profesional', $profesional->id)->get();
        // $hipertensiones = Hipertension::where('id_profesional', $profesional->id)->get();

        return view('app.profesional.receta_online.mis_certificados_profesional')->with(
            [
                'ficha' => $ficha,
                'reposo' => $reposo,
                'interconsulta' => $interconsulta,
                'informesMedicos' => $informesMedicos,
                'controlObesidad' => $controlObesidad,
                'hipertensiones' => $hipertensiones,
            ]
        );
    }

    public function config_profesional()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        return view('app.profesional.configuracion_profesional')->with(['profesional' => $profesional]);
    }

    public function mis_lugares()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        //$lugarAtencion = LugarAtencion::where()
        $lugares = $profesional->LugaresAtencion()->get();
        //ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->get();

        // echo json_encode($lugares);

        //$lugares = [];
        //
        //foreach ($lugares as $lt) {
        //     $lt->lugar = $lt->LugaresAtencion()->first();
        //array_push($lugares, $a->LugaresAtencion()->first()->estado);
        //}

        //$lugares = $profesional->LugaresAtencion()->get();
        $region = Region::all();

        return view('app.profesional.mis_lugares_atencion')->with(['lugares' => $lugares, 'region' => $region]);
    }

    public function eliminar_valor_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $convenio = ProfesionalConvenio::where('id', $request->id_convenio)->first();

        if (!$convenio->delete()) {
            return 'failed';
        }

        return 'ok';
    }

    public function mi_agenda(Request $request)
    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->lugares_atencion)->where('tipo_agenda', 1)->get();
        $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)
                                    ->whereIn('id_estado',[1,2,4,5,6,7,8])
                                    ->with(['Paciente'=> function($query){
                                                $query->select('id','id_prevision','rut')
                                                        ->with(['Prevision'=>function($query2){
                                                                    $query2->select('id','nombre');
                                                }]);
                                            }])
                                    ->get();
        $lugares = $profesional->LugaresAtencion()->get();
        //$horario = ProfesionalHorario::where('id_profesional', $profesional->id)->get();
        $prevision = Prevision::all();
        $region = Region::all();
        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
        $lugarAtencion = LugarAtencion::find($request->lugares_atencion);



        if (count($horario) == 0) {
            return view('app.profesional.mis_lugares_atencion')->with(['lugares' => $lugares, 'region' => $region, 'mensaje' => 'Para abrir Agenda debe ingresar horario de atención en el botón correspondiente']);
        }

        // dd($horario);

        $horario_agenda = '0,1,2,3,4,5,6';
        $periodo_agenda = '';
        $periodo_agenda_temp = '01:00';
        $hora_inicio_agenda = '';
        $hora_inicio_agenda_temp = '24:00';
        $hora_termino_agenda = '';
        $hora_termino_agenda_temp = 0;
        foreach ($horario as $hor) {
            $ho = explode(',', $hor->dia);
            // dd($ho);
            foreach ($ho as $h) {
                if ($h == '1') {
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



        if (!isset($horario)) {
            return view('app.profesional.mis_lugares_atencion')->with(['lugares' => $lugares, 'region' => $region, 'mensaje' => 'Para abrir Agenda debe ingresar horario de atención en el botón correspondiente']);
        }
        $tipo_agendas = ProfesionalHorario::select('tipo_agenda')->where('id_profesional', $profesional->id)->groupBy('tipo_agenda')->pluck('tipo_agenda')->toArray();

        $arrayTipoAgenda = array('', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes');
        $listaTipoAgendaProf = array();
        foreach ($tipo_agendas as $keyTA => $valueTA) {
            array_push($listaTipoAgendaProf, array('id' => $valueTA, 'texto' => $arrayTipoAgenda[$valueTA]));
        }

        /** BLOQUEOS DE HORARIOS */
        $filtro_bloqueos = array();
        $filtro_bloqueos[] = array('id_profesional', $profesional->id);
        $filtro_bloqueos[] = array('id_lugar_atencion', $lugarAtencion->id);
        $bloque_horario = ProfesionalHorariosBloqueo::where($filtro_bloqueos)->get();
        $tipo_bonos = TipoBono::where('estado', 1)->get();

        return view('app.profesional.agenda')->with(
            [
                'horas_medicas' => $horas_medicas,
                'horario' => $horario,
                'horario_agenda' => $horario_agenda,
                'periodo_agenda' => $periodo_agenda,
                'hora_inicio_agenda' => $hora_inicio_agenda,
                'hora_termino_agenda' => $hora_termino_agenda,
                'prevision' => $prevision,
                'region' => $region,
                'lugar_atencion' => $request->lugares_atencion,
                'lugar_atencion_nombre' => $lugarAtencion->nombre,
                'reg_confirmacion_hora' => $reg_confirmacion_hora,
                'profesional' => $profesional,
                'tipo_agendas' => $tipo_agendas,
                'listaTipoAgendaProf' => $listaTipoAgendaProf,
                'bloque_horario' => $bloque_horario,
                'tipo_bonos' => $tipo_bonos,
            ]

        );
    }

    public function atenciones_previas_paciente($id)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $fichas = FichaAtencion::where('id_paciente', $id)->where('id_profesional', $profesional->id)->where('finalizada', 1)->get();

        //$detalle_receta = $fichas->Recetas()->get();
        //dd($detalle_receta);

        return view('app.profesional.atenciones_previas_paciente')->with(['fichas' => $fichas]);
    }

    public function buscar_receta_ficha(Request $request)
    {
        $ficha = FichaAtencion::where('id', $request->id_ficha)->first();

        $detalle_receta = DetalleReceta::where('id_ficha', $request->id_ficha)->get();

        return json_encode($detalle_receta);
    }

    public function buscar_examen_ficha(Request $request)
    {
        $ficha = FichaAtencion::where('id', $request->id_ficha)->first();
        $examenes = $ficha->Examenes()->get();

        return json_encode($examenes);
    }

    public function agregar_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $direccion = new Direccion();
        $direccion->direccion = $request->direccion_lugar_atencion;
        $direccion->numero_dir = $request->numero_lugar_atencion;
        $direccion->id_ciudad = $request->ciudad_agregar;

        $lugar_existente = LugarAtencion::where('email', $request->email_lugar_atencion)->first();

        if ($lugar_existente != '') {
            return back()->with('mensaje', 'email ya existe');
        }

        $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();

        if (!$direccion->save()) {
            return 'error';
        }

        $lugar_atencion = new LugarAtencion();
        $lugar_atencion->nombre = $request->nombre_lugar_atencion;
        $lugar_atencion->email = $request->email_lugar_atencion;
        $lugar_atencion->rut = $request->rut_lugar_atencion;
        $lugar_atencion->telefono = $request->telefono_lugar_atencion;
        $lugar_atencion->id_direccion = $direccion->id;
        $lugar_atencion->tipo = $request->tipo_agregar_lugar_atencion;

        if ($lugar_atencion->save()) {
            $profesional_lugar_atencion = new ProfesionalesLugaresAtencion();
            $profesional_lugar_atencion->id_profesional = $profesional->id;
            $profesional_lugar_atencion->id_lugar_atencion = $lugar_atencion->id;

            if (!$profesional_lugar_atencion->save()) {
                return 'error';
            }

            if ($request->notificar_pacientes == 'on') {
                $fichas = FichaAtencion::where('id_profesional', Auth::user()->id)->get();

                $pacientes = [];
                foreach ($fichas as $f) {
                    array_push($pacientes, $f->Paciente()->first());
                }

                foreach ($pacientes as $p) {
                    $details = [
                        'title' => 'Nuevo lugar de atención',
                        'body' => 'Estimado/a ' . $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos . ',<br/>
                    Junto con saludar, por medio de este correo le informamos que el profesional Dr. ' .
                            $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos .
                            ' <br/> ha agregado un nuevo lugar de atención:  <br/>' .
                            'Nombre:' . $lugar_atencion->nombre . ' <br/>' .
                            'Dirección: ' . $direccion->direccion . ' ' . $direccion->numero_dir . ' <br/>' .
                            'Ciudad: ' . $ciudad->nombre .
                            '<br/> Que tenga un excelente día. <br/><br/> \n' .
                            ' Saludos.',
                    ];

                    //Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));
                }
            }

            return back()->with(['mensaje' => 'se agregado centro de atención','titulo_mensaje'=>'Mis Lugares de Atención']);
        }

        return 'error';
    }

    public function crear_contacto_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $apellidoPaso = explode(' ', $request->apellidos_paciente);

        $contacto = new ContactoEmergencia();
        $contacto->rut = $request->rut_paciente;
        $contacto->nombre = $request->nombres_paciente;
        $contacto->apellido_uno = $apellidoPaso[0];
        $contacto->apellido_dos = $apellidoPaso[1];
        $contacto->id_direccion = mt_rand(1, 10);
        $contacto->email = $request->email_paciente;
        $contacto->telefono = $request->telefono_paciente;
        $contacto->fecha_nac = $request->fecha_nac_paciente;
        $contacto->prioridad = $request->prioridad;

        $paciente = paciente::where('id', $request->id_paciente)->first();

        if ($contacto->save()) {
            $paciente->ContactosEmergencia()->attach($contacto->id);

            return back()->with('mensaje', 'se agregado centro de atención');
        }

        return 'error';
    }

    public function mis_horas()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $horas_medicas = $profesional->mis_horas()->get();

        $duracion = 15;

        $datos = [];
        foreach ($horas_medicas as $hora_medica) {
            array_push(
                $datos,
                [
                    'id' => $hora_medica->id_hora_medica,
                    'title' => $hora_medica->descripcion_estado_hora_medica+'Bienvenido!!',
                    'extendedProps' => ['estado' => $hora_medica->id_estado_hora_medica],
                    'start' => $hora_medica->fecha_hora_medica . 'T' . $hora_medica->hora_hora_medica . ':10',
                    'end' => $hora_medica->fecha_hora_medica . 'T' . date('H:i', strtotime($hora_medica->hora_hora_medica) + (60 * $duracion)) . ':00',
                    'color' => $hora_medica->color_estado_hora_medica,
                ]
            );
        }

        return json_encode($datos);
    }

    public function datos_hora_paciente($id_hora_medica)
    {
        if (!is_numeric($id_hora_medica)) {
            print_r(json_encode(['success' => 0, 'message' => 'Hora médica no válida']));
            exit();
        }

        $respuesta = $this->Agenda_profesional_model->datos_hora_paciente($id_hora_medica);
        print_r(json_encode($respuesta));
    }

    public function desasociar_asistente(Request $request)
    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $asistente = ProfesionalAsistente::where('id_asistente', $request->id)->first();

        if ($asistente == null) {

            $asistentes = AsistenteLugarAtencion::where('id_asistente', $request->id)->first();
            if (!$asistentes->delete()) {

                return 'fail';
            }
        } else {
            if (!$asistente->delete()) {
                return 'fail';
            }
        }

        return 'ok';
    }

    public function buscar_rut_paciente(Request $request)
    {
        if ($request->tipo == 'asistente') {
            $asistente = Asistente::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();

            if ($asistente != null) {
                return 'asistente';
            }
        }

        $tipo_paciente = 1;
        $paciente = Paciente::where('rut', $request->rut)->with('Prevision')->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
        if ($paciente == null) {
            $tipo_paciente++;
            $paciente = Asistente::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
            if ($paciente == null) {
                $tipo_paciente++;
                $paciente = Profesional::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
            }
        }
        if(isset($paciente))
            $paciente['code'] = Crypt::encryptString( $paciente['email'] );
        else
            $paciente = null;

        // validar si es paciente
        if($tipo_paciente > 1)
        {
            $paciente['tipo_paciente'] = 'NO';
            $paciente['edad'] = 99;
            $paciente['nombre_responsable'] = '';
            $paciente['id_responsable'] = '';
        }
        else
        {
            $paciente['tipo_paciente'] = 'SI';
            $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y');
            $paciente['edad'] = $edad;

            $nombres_representante = '';
            $id_representante = '';
            $registro_temp = '';

            /** datos de representeante y acompañantes */
            if( $edad < 18)
            {
                $lista_representante = PacientesDependientes::where('id_paciente', $paciente->id)->get();
                if($lista_representante)
                {
                    $array_resp = array();
                    foreach ($lista_representante as $key => $value)
                    {
                        $paciente_temp = Paciente::find($value->id_responsable);
                        $array_resp[] = $paciente_temp->id;
                        if(!empty($nombres_representante))
                        {
                            $nombres_representante .= ' - ';
                            $id_representante .= '-';
                        }
                        $nombres_representante .= $paciente_temp->nombres.' '.$paciente_temp->apellido_uno.' '.$paciente_temp->apellido_dos;
                        $id_representante .= $paciente_temp->id;
                    }

                    /** BUSCAR RESPONSABLES */
                    $filtro_temp = array();
                    $filtro_temp[] = array('id_dependiente', $paciente->id);
                    $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
                    $registro_temp = AcompananteDependiente::whereIn('id_responsable', $array_resp)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
                }
            }
            $paciente['nombre_responsable'] = $nombres_representante;
            $paciente['id_responsable'] = $id_representante;
            $paciente['acompanante'] = $registro_temp;
        }

        return json_encode($paciente);
    }

    /** METODO PARA VALIDAR EL TIPO AGENDA POR HORA SELECCIONADA Y RPOFESIONAL */
    public function tipoHorario_r(Request $request)
    {
        return static::tipoHorario($request->id_profesional, $request->fecha_consulta);
    }

    static public function tipoHorario($id_profesional, $fecha_consulta)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'Campos requeridos';
            $valido = 0;
        }
        if(empty($fecha_consulta))
        {
            $error['fecha_consulta'] = 'Campos requeridos';
            $valido = 0;
        }

        if($valido)
        {
            $fecha_consulta = \Carbon\Carbon::parse($fecha_consulta); //2024-01-05T08:00:01-03:00
            // var_dump($fecha_consulta);
            $dia_semana = $fecha_consulta->dayOfWeek;
            // var_dump($dia_semana);
            $hora_inicio = $fecha_consulta->format('H:i:s');
            // var_dump($hora_inicio);
            $horario = ProfesionalHorario::where('dia','like','%'.$dia_semana.'%')
                                        ->where('id_profesional', $id_profesional)
                                        // ->whereBetween($hora_inicio, ['hora_inicio' , 'hora_termino'])
                                        ->whereRaw("'".$hora_inicio."' BETWEEN hora_inicio and hora_termino")
                                        ->first();
            // echo json_encode($horario);
            // die();
            if($horario)
            {
                $datos['estado'] = 1;
                $datos['tipo_agenda'] = $horario->tipo_agenda;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['tipo_agenda'] = 1;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['tipo_agenda'] = 1;
        }

        return $datos;
    }
    /** FIN METODO PARA VALIDAR EL TIPO AGENDA POR HORA SELECCIONADA Y RPOFESIONAL */

    public function agendar_horas(Request $request)
    {

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

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
                                ->where('id_profesional',$profesional->id)
                                ->whereIn('tipo_hora_medica',$filtro_tipo_hora_medica)
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->first();
        // var_dump($validar);
        // exit();
        if($validar)
        {
            return json_encode(array(
                    'estado' => 'error',
                    'id_profesional' => $profesional->id,
                    'msj' => 'Paciente ya tiene Hora para este dia'
                    ));
        }

        /** buscar tiempo de la consult */
        $dia_de_semana = \Carbon\Carbon::parse($request->fecha_consulta)->format('w');
        $profesional_horarios = ProfesionalHorario::select('duracion_consulta')
                                                    ->where('id_profesional', $profesional->id)
                                                    ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                    ->where('dia','like','%'.$dia_de_semana.'%')
                                                    ->first();

        // $profesional_horarios = '00:30:00';
        // $tiempo_consulta = 30;
        $horas = date('H',strtotime($profesional_horarios->duracion_consulta));
        $minutos = date('i',strtotime($profesional_horarios->duracion_consulta));
        $totales = ($horas*60) + $minutos;
        $tiempo_consulta = $totales;

        $hora_medica = new HoraMedica();

        $hora_medica->id_paciente = $request->reserva_hora_id;
        $hora_medica->id_profesional = $profesional->id;
        $hora_medica->id_estado = '1';
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

        $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
        $hora_medica->alias_examen = $texto_alias_examen;

        $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
        $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

        if (!$hora_medica->save()) {
            return 'error';
        }

        if($request->tipo_hora_medica == 'T')
        {
            $apertura = new DateTime($hora_medica->hora_inicio);
            $cierre = new DateTime($hora_medica->hora_termino);

            $tiempo = $apertura->diff($cierre);

            $request_meeting = new Request(array(
                'id_hora_atencion' => $hora_medica->id,
                'hora_atencion' => $hora_medica->fecha_consulta.'T'.$hora_medica->hora_inicio,
                'id_profesional' => $profesional->id,
                // 'profesional_correo' => $profesional->email,
                'profesional_correo' => 'johan.e.davilap@gmail.com',
                'id_paciente' => $paciente->id,
                'paciente_nombre' => $paciente->nombres . " " . $paciente->apellido_uno,
                'tiempo_consulta' =>$tiempo->format('%i')
            ));
            $meeting = ZoomManagerController::crearMeeting($request_meeting);
        }

        $details = [
            'title' => 'Hora medica Reservada',
            'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
                    Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>' .
                'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
                'Hora : ' . $hora_medica->hora_inicio . '<br>' .
                'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
                'Que tenga un excelente día. </br></br>' .
                'Saludos.',
        ];

        //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

        return json_encode($hora_medica);
    }

    public function buscar_horas_medicas(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)->where('fecha_consulta', $request->buscar_horas)->get();
        $filtro = array();
        $filtro[] = array('id_profesional', $profesional->id);
        $filtro[] = array('fecha_consulta', $request->buscar_horas);
        if(!empty($request->id_lugares_atencion))
            $filtro[] = array('id_lugar_atencion', $request->id_lugares_atencion);
        $horas_medicas = HoraMedica::where($filtro)->get();

        foreach ($horas_medicas as $h) {
            $h->id_paciente = Paciente::where('id', $h->id_paciente)->first();
            $h->lugar_atencion = LugarAtencion::where('id', $h->id_lugar_atencion)->first();
        }

        return json_encode($horas_medicas);
    }

    public function agendar_hora_nuevo_paciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        /** validacion de correo en paciente */
        $temp_valid_email = Paciente::where(DB::raw('UPPER(email)'), mb_strtoupper($request->reserva_hora_email))->count();

        if($temp_valid_email == 0)
        {

            $user = Auth::user()->id;
            $paciente = new Paciente();
            $direccion = new Direccion();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $direccion->direccion = $request->reserva_hora_direccion;
            $direccion->numero_dir = $request->reserva_hora_numero_dir;
            $direccion->id_ciudad = $request->reserva_hora_comuna;
            $direccion->save();
            $paciente->rut = $request->rut_paciente_reserva;
            $paciente->nombres = $request->reserva_hora_nombre;
            $paciente->apellido_uno = $request->reserva_hora_primer_apellido;
            $paciente->apellido_dos = $request->reserva_hora_segundo_apellido;
            $paciente->sexo = $request->reserva_hora_sexo;
            $paciente->profesion = $request->reserva_hora_profesion;
            $paciente->fecha_nac = $request->reserva_hora_fecha_nac;
            $paciente->id_prevision = $request->reserva_hora_convenio;

            $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
            $temp = substr(str_shuffle($permitted_chars), 0, 10);

            if( (\Carbon\Carbon::parse($request->fecha_nac)->age) < 18 && !empty($request->reserva_hora_email))
            {
                $paciente->email = $request->reserva_hora_email;
            }
            else
            {

                if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 )
                {
                    if($request->dependiente == 1)
                    {
                        if(!empty($request->reserva_hora_email))
                        {
                            $paciente->email = $request->reserva_hora_email;
                        }
                        else
                        {
                            $paciente->email = $temp.'@'.$temp.'.cl';
                        }
                    }
                    else if($request->dependiente == 0)
                    {
                        if( $request->reserva_result_codigo_validacion == 1 )
                        {
                            if(!empty($request->reserva_hora_email))
                            {
                                $paciente->email = $request->reserva_hora_email;
                            }
                            else
                            {
                                $paciente->email = $temp.'@'.$temp.'.cl';
                            }
                        }
                        else
                        {
                            $paciente->email = $request->reserva_hora_email;
                        }
                    }
                }
                else
                {
                    $paciente->email = $temp.'@'.$temp.'.cl';
                }
            }


			$paciente->telefono_uno = '569';
            if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 && $request->reserva_representante_nuevo_exitente == 1)
            {
                $representante_temp = Paciente::find($request->reserva_representante_id);
				if(!empty($representante_temp->telefono_uno))
                    $paciente->telefono_uno = $representante_temp->telefono_uno;
            }
            else if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 && $request->reserva_representante_nuevo_exitente == 0)
            {
                if(!empty($reserva_hora_representante_telefono_uno))
				$paciente->telefono_uno = $request->reserva_hora_representante_telefono_uno;;
            }
            else
            {
                if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 0 && !empty($request->reserva_hora_telefono) )
                {
                    $paciente->telefono_uno = $request->reserva_hora_telefono;
                }
                else if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 0 && empty($request->reserva_hora_telefono) && $request->reserva_result_codigo_validacion == 0 )
                {
                    $paciente->telefono_uno = '569';
                }
                else if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 0 && !empty($request->reserva_hora_telefono) && $request->reserva_result_codigo_validacion == 1 )
                {
                    $paciente->telefono_uno = $request->reserva_hora_telefono;
                }
                else if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 1 )
                {
                    if( !empty($request->reserva_hora_telefono) )
                        $paciente->telefono_uno = $request->reserva_hora_telefono;
                    else
                        $paciente->telefono_uno = '569';
                }
            }

            $paciente->id_direccion = $direccion->id;

            if ($paciente->save())
            {
                $datos['paciente']['estado'] = 1;
                $datos['paciente']['msj'] = 'Paciente registrado';

                /** CREACION DE USUARIO  */
                if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) >= 18)
                {
                    // $user = User::where('email', $paciente->email)->first();
                    if( $request->reserva_result_codigo_validacion == 1 )
                    {
                        $temp_rut = $paciente->rut;
                        $temp_rut = str_replace('.','' , $temp_rut);
                        $temp_rut = str_replace('-','' , $temp_rut);
                        $temp_rut = str_replace(' ','' , $temp_rut);
                        /** buscar por rut */
                        $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($temp_rut))->first();
                    }
                    else
                    {
                        /** buscar por correo */
                        $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($paciente->email))->first();
                    }

                    if($user == NULL)
                    {
                        $user = new User();
                        $user->name = $paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos;

                        if( $request->reserva_result_codigo_validacion == 1 )
                        {
                            $temp_rut = $paciente->rut;
                            $temp_rut = str_replace('.','' , $temp_rut);
                            $temp_rut = str_replace('-','' , $temp_rut);
                            $temp_rut = str_replace(' ','' , $temp_rut);
                            $user->email = $temp_rut;
                        }
                        else
                        {
                            if( strpos($paciente->email, $temp) !== false )
                            {
                                $temp_rut = $paciente->rut;
                                $temp_rut = str_replace('.','' , $temp_rut);
                                $temp_rut = str_replace('-','' , $temp_rut);
                                $temp_rut = str_replace(' ','' , $temp_rut);
                                $user->email = $temp_rut;
                            }
                            else
                                $user->email = $paciente->email;

                        }

                        $pass_temp = random_int(1111,9999);
                        $user->password = Hash::make($pass_temp);

                        if($user->save())
                        {
                            $user->assignRole('Paciente');
                            $paciente->id_usuario = $user->id;
                            if($paciente->save())
                            {
                                $datos['paciente']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                if( $request->reserva_result_codigo_validacion == 1 )
                                {
                                    /** envio de sms */
                                }
                                else
                                {
                                    /** envio de correo de confirmacion  */
                                    $blade = 'bienvenida_paciente_usuario';
                                    $to = array(
                                            array('email' => $paciente->email,'name' => $paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos),
                                        );
                                    $cc = array();
                                    $bcc = array();
                                    $asunto = 'MED-SDI - Bienvenido!';
                                    $body = array(
                                                'nombre'=>$paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos,
                                                'user' => $paciente->email,
                                                'pass' => $pass_temp
                                                );
                                    $archivo = '';/** pendiente */
                                    $id_institucion = '';

                                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                    if($result_mail['estado'])
                                    {
                                        $datos['paciente']['user']['mail']['estado'] = 1;
                                        $datos['paciente']['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                    }
                                    else
                                    {
                                        $datos['paciente']['user']['mail']['estado'] = 0;
                                        $datos['paciente']['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                    }
                                    /** cerrar envio de correo de confirmacion  */
                                }
                            }
                        }
                    }
                    else
                    {
                        $user->assignRole('Paciente');
                        $paciente->id_usuario = $user->id;
                        if($paciente->save())
                        {
                            $datos['paciente']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                        }
                    }
                }
                /** CIERRE CREACION DE USUARIO  */

                /** REGISTRO DE REPRESENTANTE */
                if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 || $request->dependiente == 1 )
                {
                    $id_representante = '';
                    $id_user_representante = '';

                    if($request->reserva_representante_nuevo_exitente == 0)
                    {
                        $representante_direccion = $request->reserva_hora_representante_direccion;
                        $representante_numero_dir = $request->reserva_hora_representante_numero_dir;
                        $representante_region_agregar = $request->reserva_hora_representante_region_agregar;
                        $representante_ciudad_agregar = $request->reserva_hora_representante_ciudad_agregar;

                        $direccion_representante = new Direccion();
                        $direccion_representante->direccion = $representante_direccion;
                        $direccion_representante->numero_dir = $representante_numero_dir;
                        $direccion_representante->id_ciudad = $representante_ciudad_agregar;
                        $direccion_representante->save();


                        $representante_rut = $request->reserva_hora_representante_rut;
                        $representante_nombres_paciente = $request->reserva_hora_representante_nombres_paciente;
                        $representante_apellido_uno = $request->reserva_hora_representante_apellido_uno;
                        $representante_apellido_dos = $request->reserva_hora_representante_apellido_dos;
                        $representante_fecha_nac = $request->reserva_hora_representante_fecha_nac;
                        $representante_sexo = $request->reserva_hora_representante_sexo;
                        $representante_convenio = $request->reserva_hora_representante_convenio;
                        $representante_correo = $request->reserva_hora_representante_correo;
                        $representante_telefono_uno = $request->reserva_hora_representante_telefono_uno;
                        $representante_result_codigo_validacion = $request->reserva_hora_representante_result_codigo_validacion;

                        $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
                        $representante_temp = substr(str_shuffle($permitted_chars), 0, 10);


                        $paciente_representante = new Paciente();
                        $paciente_representante->rut = $representante_rut;
                        $paciente_representante->nombres = $representante_nombres_paciente;
                        $paciente_representante->apellido_uno = $representante_apellido_uno;
                        $paciente_representante->apellido_dos = $representante_apellido_dos;
                        $paciente_representante->sexo = $representante_sexo;
                        // $paciente_representante->profesion = $request->reserva_hora_profesion;
                        $paciente_representante->fecha_nac = $representante_fecha_nac;
                        $paciente_representante->id_prevision = $representante_convenio;

                        if( $representante_result_codigo_validacion == 1 && empty($paciente_representante->email))
                            $paciente_representante->email = $representante_temp.'@'.$representante_temp.'.com';
                        else if( $representante_result_codigo_validacion == 1 && !empty($paciente_representante->email))
                            $paciente_representante->email = $representante_correo;
                        else
                            $paciente_representante->email = $representante_correo;

                        $paciente_representante->telefono_uno = $representante_telefono_uno;
                        $paciente_representante->id_direccion = $direccion_representante->id;

                        if ($paciente_representante->save())
                        {
                            $datos['paciente_representante']['estado'] = 1;
                            $datos['paciente_representante']['msj'] = 'Paciente registrado';

                            $id_representante = $paciente_representante->id;
                            /** CREACION DE USUARIO  */
                            // $user_representante = User::where('email', $paciente_representante->email)->first();
                            if( $request->reserva_result_codigo_validacion == 1 )
                            {
                                $temp_representante_rut = $paciente_representante->rut;
                                $temp_representante_rut = str_replace('.','' , $temp_representante_rut);
                                $temp_representante_rut = str_replace('-','' , $temp_representante_rut);
                                $temp_representante_rut = str_replace(' ','' , $temp_representante_rut);
                                /** buscar por rut */
                                $user_representante = User::where(DB::raw('UPPER(email)'), mb_strtoupper($temp_representante_rut))->first();
                            }
                            else
                            {
                                /** buscar por correo */
                                $user_representante = User::where(DB::raw('UPPER(email)'), mb_strtoupper($paciente_representante->email))->first();
                            }


                            if($user_representante == NULL)
                            {
                                $user_representante = new User();
                                $user_representante->name = $representante_nombres_paciente . ' ' .$representante_apellido_uno . ' ' .$representante_apellido_dos;

                                if(!empty($representante_correo))
                                    $user_representante->email = $representante_correo;
                                else
                                {
                                    $temp_representante_rut = $representante_rut;
                                    $temp_representante_rut = str_replace('.','' , $temp_representante_rut);
                                    $temp_representante_rut = str_replace('-','' , $temp_representante_rut);
                                    $temp_representante_rut = str_replace(' ','' , $temp_representante_rut);
                                    $user_representante->email = $temp_representante_rut;
                                }

                                $pass_temp_repre = random_int(1111,9999);
                                $user_representante->password = Hash::make($pass_temp_repre);

                                if($user_representante->save())
                                {
                                    $id_user_representante = $user_representante->id;
                                    $user_representante->assignRole('Paciente');
                                    $paciente_representante->id_usuario = $user_representante->id;
                                    if($paciente_representante->save())
                                    {
                                        $datos['paciente_representante']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                        if( $request->reserva_result_codigo_validacion == 1 )
                                        {
                                            /** envio de sms */
                                        }
                                        else
                                        {
                                            if(strpos($paciente_representante->email, $representante_temp) !== false)
                                            {
                                                /** envio de sms */
                                            }
                                            else
                                            {
                                                /** envio de correo de confirmacion  */
                                                $blade = 'bienvenida_paciente_usuario';
                                                $to = array(
                                                        array('email' => $representante_correo,'name' => $representante_nombres_paciente . ' ' .$representante_apellido_uno . ' ' .$representante_apellido_dos),
                                                    );
                                                $cc = array();
                                                $bcc = array();
                                                $asunto = 'MED-SDI - Bienvenido!';
                                                $body = array(
                                                            'nombre'=>$representante_nombres_paciente . ' ' .$representante_apellido_uno . ' ' .$representante_apellido_dos,
                                                            'user' => $representante_correo,
                                                            'pass' => $pass_temp_repre
                                                            );
                                                $archivo = '';/** pendiente */
                                                $id_institucion = '';

                                                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                                if($result_mail['estado'])
                                                {
                                                    $datos['paciente_representante']['user']['mail']['estado'] = 1;
                                                    $datos['paciente_representante']['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                                }
                                                else
                                                {
                                                    $datos['paciente_representante']['user']['mail']['estado'] = 0;
                                                    $datos['paciente_representante']['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                                }
                                                /** cerrar envio de correo de confirmacion  */
                                            }
                                        }
                                    }
                                }
                            }
                            else
                            {
                                $user->assignRole('Paciente');
                                $paciente_representante->id_usuario = $user->id;

                                $id_user_representante = $user->id;;

                                if($paciente_representante->save())
                                {
                                    $datos['paciente_representante']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                }
                            }
                        }
                    }
                    else
                    {
                        $id_representante = $request->reserva_representante_id;
                        $id_user_representante = $request->reserva_representante_id_usuario;
                    }

                    $representante_relacion = $request->reserva_hora_representante_agregar_relacion;

                    /** CREAR RELACION DE DEPENDENCIA */
                    $registro_dependencia = new PacientesDependientes();

                    $registro_dependencia->id_responsable = $id_representante;
                    $registro_dependencia->id_paciente = $paciente->id;
                    $registro_dependencia->relacion = $representante_relacion;
                    $registro_dependencia->tipo_dependencia = 1;
                    $registro_dependencia->fecha_inicio = date('Y-m-d');
                    $registro_dependencia->comentario = '';
                    // $registro_dependencia->confirmacion_inscripcion = $request->confirmacion_inscripcion;
                    // $registro_dependencia->id_log_users_devices = $request->id_log_users_devices;
                    // $registro_dependencia->otro = $request->otro;
                    $registro_dependencia->id_user = $id_user_representante;
                    $registro_dependencia->estado = 1;

                    if($registro_dependencia->save())
                    {
                        $datos['registro_dependencia']['estado'] = 1;
                        $datos['registro_dependencia']['msj'] = 'Dependencia creada con exito.';
                    }
                    else
                    {
                        $datos['registro_dependencia']['estado'] = 0;
                        $datos['registro_dependencia']['msj'] = 'Problemas en el registro de Dependencia.';
                    }
                    /** CIERRE CREAR RELACION DE DEPENDENCIA */

                }
                /** CIERRE REGISTRO DE REPRESENTANTE */

                /** buscar tiempo de la consult */
                $dia_de_semana = \Carbon\Carbon::parse($request->fecha_consulta)->format('w');
                $profesional_horarios = ProfesionalHorario::select('duracion_consulta')
                                                            ->where('id_profesional', $profesional->id)
                                                            ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                            ->where('dia','like','%'.$dia_de_semana.'%')
                                                            ->first();

                // $profesional_horarios = '00:30:00';
                // $tiempo_consulta = 30;
                $horas = date('H',strtotime($profesional_horarios->duracion_consulta));
                $minutos = date('i',strtotime($profesional_horarios->duracion_consulta));
                $totales = ($horas*60) + $minutos;
                $tiempo_consulta = $totales;

                $texto_alias_examen = '';
                # TIPO HORA MEDICA
                switch ($request->tipo_hora_medica) {
                    case 'C': // 1
                        $texto_alias_examen = 'Consulta';
                        break;
                    case 'D': // 2
                        $texto_alias_examen = 'Consulta Dental';
                        break;
                    case 'T': // 3
                        $texto_alias_examen = 'Consulta Telemedicina';
                        break;
                    case 'E': // 4
                        $texto_alias_examen = 'Consulta Examen';
                        break;
                }

                $hora_medica = new HoraMedica();

                $hora_medica->id_paciente = $paciente->id;
                $hora_medica->id_profesional = $profesional->id;
                $hora_medica->id_estado = 1;
                $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
                $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

                $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
                $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

                $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
                $hora_medica->alias_examen = $texto_alias_examen;

                $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

                if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 || $request->dependiente == 1 )
                {
                    $hora_medica->acomp_representante = 1;
                    $hora_medica->acomp_acompanante = 0;
                    $hora_medica->acomp_lista = '';

                    $hora_medica->autorizacion_atencion = '1234567890';
                }

                if ($hora_medica->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Hora Medica creada';
                    $datos['hora_medica'] = $hora_medica;

                    $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                    /** envio de correo de confirmacion INSTITUCION */
                    $blade = 'hora_agendada';
                    // if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 || $request->dependiente == 1 )
                    // {
                    //     /** buscar representante de paciente */
                    //     $to = array(
                    //         array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                    //     );
                    // }
                    // else
                    {
                        $to = array(
                            array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        );
                    }

                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Nueva Hora Agendada';
                    $body = array(
                        'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                        'fecha'=> $hora_medica->fecha_consulta,
                        'hora'=> $hora_medica->hora_inicio,
                        'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                        'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
                        'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
                        'profesional_sub_tipo_especialidad'=> $profesional->SubTipoEspecialidad()->first()->nombre,
                        // 'institucion'=> $nombre_institucion,
                        'lugar_atencion'=> $lugar_atencion->nombre,
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
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al crear Hora Medica';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al crear Paciente';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'el correo ya esta siendo utilizado por otro paciente.';
        }

        return $datos;
    }

    public function confirmar_hora(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();

        $hora_medica->comentarios_confirmacion = $request->comentario;
        $hora_medica->fecha_confirmacion = Carbon::now();
        $hora_medica->id_estado = 2;
        $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }

        /** actualizacion de notificacion confirmacion */
        $notificacion = NotificacionConfirmacion::where('tipo_notificacion', 1)
                                                ->where('id_evento', $hora_medica->id)
                                                ->first();
        $datos['notificacion'] = $notificacion;
        if($notificacion)
        {
            /** cambiar estado notificacion */
            $notificacion->medio_confirmacion = $request->medio_confirmacion;
            $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
            $notificacion->estado_confirmacion = 2; //CONFIRMADA
            if($notificacion->save())
            {
                /** notificacion actualizada */
                // echo 'notificacion actualizada';
                $datos['notificacion']['update'] = 'notificacion Actualzada';
            }
            else
            {
                $datos['notificacion']['update'] = 'falla al actualizar notificacion';
            }

            /** actualizacion de notificacion confirmacion */
            $id_log_users_devices = $notificacion->id_log_users_devices;
            if(!empty($id_log_users_devices))
            {
                $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                $log_users_devices->estado = 1;
                if($log_users_devices->save())
                {
                    /** log_users_devices */
                    $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                }
                else
                {
                    $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                }
            }
            else
            {
                $datos['log_users_devices']['update'] = 'no posee log_users_devices';
            }
        }




        $lugar_atencion = LugarAtencion::find($hora_medica->id_lugar_atencion);

        /** envio correo */
        /** envio de correo de confirmacion INSTITUCION */
        $blade = 'hora_confirmada_paciente';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Reserva de Hora Confirmada';
        $body = array(
            'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            'fecha'=> $hora_medica->fecha_consulta,
            'hora'=> $hora_medica->hora_inicio,
            'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
            'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
            'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
            'profesional_sub_tipo_especialidad'=> $profesional->SubTipoEspecialidad()->first()?mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre):'',
            // 'institucion'=> $nombre_institucion,
            'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
            'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
        );
        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['registros'][$hora_medica->id]['mail']['estado'] = 1;
            $datos['registros'][$hora_medica->id]['mail']['msj'] = 'Notificacion de bienvenida enviado';
        }
        else
        {
            $datos['registros'][$hora_medica->id]['mail']['estado'] = 0;
            $datos['registros'][$hora_medica->id]['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
        }

        return json_encode($hora_medica);
    }

    public function recibir_bono(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->convenio))
        {
            $error['convenio'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->numero_bono))
        // {
        //     $error['numero_bono'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->valor_atencion))
        {
            $error['valor_atencion'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->glosa))
        // {
        //     $error['glosa'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente))
        {
            $error['id_asistente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_bono))
        {
            $error['id_tipo_bono'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_referencia))
        {
            $error['id_referencia'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->numero_sesiones))
        // {
        //     $error['numero_sesiones'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido == 1)
        {
            /** registro bono */
            $bono = new Bono();
            $bono->convenio = $request->convenio;
            // $bono->convenio = $request->convenio_nombre;
            $bono->numero_bono = $request->numero_bono;
            $bono->fecha_atencion = date('Y-m-d H:i:s');
            $bono->valor_atencion = $request->valor_atencion;
            $bono->glosa = empty($request->glosa)?'0':$request->glosa;
            $bono->rendido = 0;
            $bono->id_profesional = $request->id_profesional;
            $bono->id_asistente = $request->id_asistente;
            $bono->id_paciente = $request->id_paciente;
            $bono->id_clase_bono = $request->id_clase_bono;
            $bono->id_tipo_bono = $request->id_tipo_bono;
            $bono->id_referencia = $request->id_referencia;// id_hora/id_hora_dental/..
            $bono->numero_sesiones = empty($request->numero_sesiones)?'0':$request->numero_sesiones;
            $bono->estado_consulta = 4;

            $usuario = User::where('id', Auth::user()->id)->first();
            $roles = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
            if( in_array( 'Profesional', $roles) )
            {
                $bono->rendido = 1;
            }

            if($bono->save())
            {
                $datos['bono']['estado'] = 1;
                $datos['bono']['mensaje'] = 'Bonos registrado';
                /** cambio estado hora medica */
                switch ($request->id_tipo_bono) {
                    case  '1': /** hora medica -> Bonos de Consultas Medicas */
                            $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '2': /** Bono de Examen */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '3': /** Bonos de Cirugía */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '4': /** Bonos Parto Normal */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '5': /** Bonos de Cesarea */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '6': /** Bonos de Laboratorio */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '7': /** Bonos de Radiologia */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '8': /** Bonos de Fonaudiología */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '9': /** Bonos de Kinesiología */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case '10': /** Bonos de Nutrición */
                        /** code */
                    break;
                    case '11': /** Bonos de Procedimiento */
                        /** code */
                    break;
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al registrar pago';
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

    public function enviar_email(Request $request)
    {

        if ($request->titulo_email == '' || $request->mensaje_email == '') {
            return 'error';
        }

        $titulo = $request->titulo_email;
        $mensaje = $request->mensaje_email;
        $paciente = Paciente::where('id', $request->id_paciente)->first();

        $details = [
            'title' => $titulo,
            'body' => $mensaje,
        ];

        ////Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));
        Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));

        return 'ok';
    }

    public function cancelar_hora(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();

        $hora_medica->comentarios_cancelacion = $request->comentario;
        $hora_medica->fecha_cancelacion = Carbon::now();
        $hora_medica->id_estado = 3;
        $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }


        $notificacion = NotificacionConfirmacion::where('tipo_notificacion',1)
                                                ->where('id_evento',$hora_medica->id)
                                                ->first();
        $datos['notificacion'] = $notificacion;
        if($notificacion)
        {
            /** cambiar estado notificacion */
            $notificacion->medio_confirmacion = $request->medio_confirmacion;
            $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
            $notificacion->estado_confirmacion = 3; // RECHAZADA
            if($notificacion->save())
            {
                /** notificacion actualizada */
                $datos['notificacion']['update'] = 'notificacion Actualzada';
            }
            else
            {
                $datos['notificacion']['update'] = 'falla al actualizar notificacion';
            }

            /** cambiar estado de log */
            $id_log_users_devices = $notificacion->id_log_users_devices;
            if(!empty($id_log_users_devices))
            {
                $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                $log_users_devices->estado = 3; //RECHAZADA
                if($log_users_devices->save())
                {
                    /** log_users_devices */
                    $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                }
                else
                {
                    $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                }
            }
            else
            {
                $datos['log_users_devices']['update'] = 'no posee log_users_devices';
            }
        }

        /** enviar correo de confirmada */
        $paciente = $hora_medica->Paciente()->first();
        $profesional = $hora_medica->Profesional()->first();
        $lugar_atencion = $hora_medica->LugarAtencion()->first();

        $blade = 'hora_cancelada_paciente';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Reserva de Hora Cancelada';
        $body = array(
            'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            'fecha'=> $hora_medica->fecha_evento,
            'hora'=> $hora_medica->hora_evento,
            'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
            'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
            'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
            'profesional_sub_tipo_especialidad'=> mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre),
            // 'institucion'=> $nombre_institucion,
            'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
            'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),

        );
        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['mail'] = 'Notificacion de cancelacion enviado';
        }
        else
        {
            $datos['mail'] = 'Falle en envio de Notificacion de cancelada';
        }

        return json_encode($hora_medica);
    }

    public function mi_horario_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();

        return json_encode($horario);
    }

    public function mi_horario_lugar_atencion_agregar(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $hora_inicio = \Carbon\Carbon::parse($request->hora_inicio . ':01')->format('H:i:s');
        $hora_termino = \Carbon\Carbon::parse($request->hora_termino . ':00')->format('H:i:s');

        $validate = ProfesionalHorario::where('id_profesional', $profesional->id)
            ->where('dia', 'like', "%$request->dia%")
            ->whereRaw("('$hora_inicio' BETWEEN hora_inicio AND hora_termino OR '$hora_termino' BETWEEN hora_inicio AND hora_termino)", [0])
            ->get();

        if (count($validate) > 0) {
            return 'Failed';
        }

        $horario = ProfesionalHorario::where('hora_inicio', $hora_inicio)
            ->where('hora_termino', $hora_termino)
            ->where('duracion_consulta', $request->duracion)
            ->where('id_profesional', $profesional->id)
            ->first();



        if (isset($horario->id)) {
            $horario->dia = $horario->dia . ',' . $request->dia;
        } else {

            $horario = new ProfesionalHorario();
            $horario->hora_inicio = $hora_inicio;
            $horario->hora_termino = $hora_termino;
            $horario->dia = $request->dia;
            $horario->duracion_consulta = $request->duracion;
            $horario->id_profesional = $profesional->id;
            $horario->id_lugar_atencion = $request->id_lugar_atencion;
            $horario->tipo_Agenda = (int) $request->tipo_agenda_medica;
        }
        if (!$horario->save()) {
            return 'error';
        }

        return json_encode($horario);
    }

    // modulo editar perfil paciente
    public function registrar_contacto_emergencia(Request $request)
    {
        $id_paciente = Paciente::where('id', $request->id_paciente)->first();
        $contacto_emergencia = ContactoEmergencia::where('rut', $request->rut)->first();
        //$direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();

        if ($contacto_emergencia == null) {
            $contacto_emergencia = new ContactoEmergencia();
            $direccion_contacto = new Direccion();
        } else {
            $direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();
        }

        $direccion_contacto->direccion = $request->direccion;
        $direccion_contacto->numero_dir = $request->numero_dir;
        $direccion_contacto->id_ciudad = $request->id_ciudad;

        $direccion_contacto->save();

        $contacto_emergencia->rut = $request->rut;
        $contacto_emergencia->nombre = $request->nombres;
        $contacto_emergencia->apellido_uno = $request->apellido_uno;
        $contacto_emergencia->apellido_dos = $request->apellido_dos;
        $contacto_emergencia->parentezco = $request->parentezco;
        $contacto_emergencia->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto_emergencia->prioridad = $request->prioridad;
        $contacto_emergencia->id_direccion = $direccion_contacto->id;

        if ($contacto_emergencia->email != $request->email) {
            $contacto_emergencia->email = $request->email;
        }
        $contacto_emergencia->telefono = $request->telefono;

        //$direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();

        if ($contacto_emergencia->save()) {
            $pacienteContacto = new PacienteContactoEmergencia();

            $pacienteContacto->id_paciente = $request->id_paciente;
            $pacienteContacto->id_contacto = $contacto_emergencia->id;
            $contacto_emergencia->relacion = $request->parentezco;

            if (!$pacienteContacto->save()) {
                return 'error';
            }

            return json_encode($contacto_emergencia);
        } else {
            return 'error al registrar el contacto de emergencia';
        }

        /*

        $contacto = new ContactoEmergencia();
        $direccion = new Direccion();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = mt_rand(100, 9999);
        $direccion->id_ciudad = $request->id_ciudad;
        $direccion->save();
        $contacto->rut = $request->rut;
        $contacto->nombre = $request->nombres;
        $contacto->apellido_uno = $request->apellido_uno;
        $contacto->apellido_dos = $request->apellido_dos;
        $contacto->parentezco = $request->parentezco;
        $contacto->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto->prioridad = $request->prioridad;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->id_direccion = $direccion->id;

        if ($contacto->save()) {
            $pacienteContacto = new PacienteContactoEmergencia();

            $pacienteContacto->id_paciente = $request->id_paciente;
            $pacienteContacto->id_contacto = $contacto->id;
            $contacto->relacion = $request->parentezco;

            if (!$pacienteContacto->save()) {
                return 'error';
            }

            /*  $details = [
                      'title' => 'Hora medica Reservada',
                      'body' => 'Estimado/a '.$contacto->nombres.' '.$contacto->apellido_uno.' '.$contacto->apellido_dos.',<br>
                      Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>'.
                      'Fecha: '.$contacto->fecha_consulta.'<br>'.
                      'Hora : '.$hora_medica->hora_inicio.'<br>'.
                      'Profesional: <b>'.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.'<b> <br><br>'.
                      'Que tenga un excelente día. </br></br>'.
                      'Saludos.',
                  ];

              //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

            return json_encode($contacto);
        }

        return 'algo';*/
    }

    public function cargar_datos_contacto(Request $request)
    {
        $contacto = ContactoEmergencia::where('id', $request->id_contacto)->first();
        $contacto->direccion = $contacto->Direccion()->first();
        $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
        $contacto->region = Region::find($contacto->Direccion()->first()->Ciudad()->first()->id_region);
        //$contacto->region  = $contacto->Direccion()->first()->Ciudad()->first()->Region()->first();

        return $contacto;
    }

    public function editar_contacto_emergencia(Request $request)
    {
        $contacto = ContactoEmergencia::where('id', $request->id_contacto)->first();
        $direccion = Direccion::where('id', $contacto->id_direccion)->first();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = $request->numero_dir;
        $direccion->id_ciudad = $request->id_ciudad;
        $direccion->save();

        $contacto->rut = $request->rut;
        $contacto->nombre = $request->nombres;
        $contacto->apellido_uno = $request->apellido_uno;
        $contacto->apellido_dos = $request->apellido_dos;
        $contacto->parentezco = $request->parentezco;
        //$contacto->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto->prioridad = $request->prioridad;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->id_direccion = $direccion->id;

        if ($contacto->save()) {
            /*  $details = [
                      'title' => 'Hora medica Reservada',
                      'body' => 'Estimado/a '.$contacto->nombres.' '.$contacto->apellido_uno.' '.$contacto->apellido_dos.',<br>
                      Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>'.
                      'Fecha: '.$contacto->fecha_consulta.'<br>'.
                      'Hora : '.$hora_medica->hora_inicio.'<br>'.
                      'Profesional: <b>'.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.'<b> <br><br>'.
                      'Que tenga un excelente día. </br></br>'.
                      'Saludos.',
                  ];

              //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));
        */
            return json_encode($contacto);
        }

        return 'error';
    }

    public function modificarAntecedenteAademico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id)){
            $error['id'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre)){
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->universidad)){
            $error['universidad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->anio)){
            $error['anio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ciudad_pais)){
            $error['ciudad_pais'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->supersalud)){
        //     $error['supersalud'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->numero_colegio)){
        //     $error['numero_colegio'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $filtro = array();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro[] = array('id',$request->id);
            $registro = ProfesionalAntecedenteAcademico::where($filtro)->first();
            if($registro)
            {
                $registro->nombre = $request->nombre;
                $registro->universidad = $request->universidad;
                $registro->anio = $request->anio;
                $registro->ciudad_pais = $request->ciudad_pais;
                if(!empty($request->supersalud))
                    $registro->supersalud = $request->supersalud;
                if(!empty($request->numero_colegio))
                    $registro->numero_colegio = $request->numero_colegio;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registro Academico Actualizado.';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Registro Academico no actualizado.';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro Academico no disponible.';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function agregarAntecedenteAademico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_tipo_antecedente_academico)){
            $error['id_tipo_antecedente_academico'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre)){
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->universidad)){
            $error['universidad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->anio)){
            $error['anio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ciudad_pais)){
            $error['ciudad_pais'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->supersalud)){
        //     $error['supersalud'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->numero_colegio)){
        //     $error['numero_colegio'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $registro = new ProfesionalAntecedenteAcademico();

            $registro->id_profesional = $profesional->id;
            $registro->id_tipo_antecedente_academico = $request->id_tipo_antecedente_academico;
            $registro->nombre = $request->nombre;
            $registro->universidad = $request->universidad;
            $registro->anio = $request->anio;
            $registro->ciudad_pais = $request->ciudad_pais;
            if(!empty($request->supersalud))
                $registro->supersalud = $request->supersalud;
            if(!empty($request->numero_colegio))
                $registro->numero_colegio = $request->numero_colegio;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Academico Agregado.';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro Academico no Agregado.';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function agregarFichaTipoOtorrino(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOtorrinoTipo();
        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->tipo = $request->tipo;
        $ficha_tipo->nombre = $request->registro_f_t_orl_nombre;
        $ficha_tipo->descripcion = $request->registro_f_t_orl_descripcion;
        $ficha_tipo->id_usa_audifono = $request->modal_agregar_tipo_usa_audifono;
        $ficha_tipo->audifono = $request->observaciones_audifono;
        $ficha_tipo->apreciacion_auditiva = $request->modal_agregar_tipo_apreciacion_auditiva;
        $ficha_tipo->aprec_auditiva_def = $request->observaciones_aprec_auditiva_def;
        $ficha_tipo->examen_oi = $request->modal_agregar_tipo_examen_oi;
        $ficha_tipo->ex_oi_anormal = $request->observaciones_ex_oi_anormal;
        $ficha_tipo->examen_od = $request->modal_agregar_tipo_examen_od;
        $ficha_tipo->ex_od_anormal = $request->observaciones_ex_od_anormal;
        $ficha_tipo->obs_ex_oidos = $request->observaciones_obs_ex_oidos;
        $ficha_tipo->examen_bio_oi = $request->modal_agregar_tipo_examen_bio_oi;
        $ficha_tipo->obs_examen_bio_oi = $request->observaciones_obs_examen_bio_oi;
        $ficha_tipo->examen_bio_od = $request->modal_agregar_tipo_examen_bio_od;
        $ficha_tipo->obs_examen_bio_od = $request->observaciones_obs_examen_bio_od;
        $ficha_tipo->obs_ex_biom = $request->observaciones_obs_ex_biom;
        $ficha_tipo->id_tipo_episodios = $request->modal_agregar_tipo_episodios;
        $ficha_tipo->obs_episodios = $request->observaciones_detalle_episodios;
        $ficha_tipo->id_tipo_equilibrio = $request->modal_agregar_tipo_equilibrio;
        $ficha_tipo->obs_equilibrio = $request->observaciones_detalle_equilibrio;
        $ficha_tipo->id_tipo_ng = $request->modal_agregar_tipo_ng;
        $ficha_tipo->obs_ng = $request->observaciones_detalle_ng;
        $ficha_tipo->id_tipo_sint_acomp = $request->modal_agregar_tipo_sint_acomp;
        $ficha_tipo->obs_sint_acomp = $request->observaciones_detalle_sint_acompanantes;
        $ficha_tipo->id_tipo_vertigo = $request->modal_agregar_tipo_vertigo;
        $ficha_tipo->obs_tipo_vertigo = $request->observaciones_detalle_tipo_vertigo;
        $ficha_tipo->obs_vestibular = $request->observaciones_vestibular;
        $ficha_tipo->nariz_general = $request->modal_agregar_tipo_nariz_general;
        $ficha_tipo->det_nariz_general = $request->observaciones_det_nariz_general;
        $ficha_tipo->apreciacion_resp = $request->modal_agregar_tipo_apreciacion_resp;
        $ficha_tipo->aprec_resp_def = $request->observaciones_aprec_resp_def;
        $ficha_tipo->examen_fni = $request->modal_agregar_tipo_examen_fni;
        $ficha_tipo->ex_fni_anormal = $request->observaciones_ex_fni_anormal;
        $ficha_tipo->examen_fnd = $request->modal_agregar_tipo_examen_fnd;
        $ficha_tipo->ex_fnd_anormal = $request->observaciones_ex_fnd_anormal;
        $ficha_tipo->obs_ex_nasal = $request->observaciones_obs_ex_nasal;
        $ficha_tipo->disfonia = $request->modal_agregar_tipo_disfonia;
        $ficha_tipo->det_disfonia = $request->observaciones_det_disfonia;
        $ficha_tipo->ex_boca = $request->modal_agregar_tipo_ex_boca;
        $ficha_tipo->detalle_ex_boca = $request->observaciones_detalle_ex_boca;
        $ficha_tipo->examen_faringe =$request->modal_agregar_tipo_examen_faringe;
        $ficha_tipo->ex_farige_anormal = $request->observaciones_ex_farige_anormal;
        $ficha_tipo->examen_laringe =$request->modal_agregar_tipo_examen_laringe;
        $ficha_tipo->ex_larige_anormal = $request->observaciones_ex_larige_anormal;
        $ficha_tipo->obs_examen_laringe =$request->observaciones_obs_examen_laringe;
        $ficha_tipo->obs_ex_orl = $request->observaciones_obs_ex_orl;
        $ficha_tipo->hip_diag_orl = '';
        $ficha_tipo->ind_orl = '';

        $ficha_tipo->piel_tegumnto = $request->modal_agregar_tipo_piel_tegumnto;
        $ficha_tipo->obs_piel_tegumnto = $request->observaciones_obs_piel_tegumnto;
        $ficha_tipo->adenopatias = $request->modal_agregar_tipo_adenopatias;
        $ficha_tipo->obs_adenopatias = $request->observaciones_obs_adenopatias;
        $ficha_tipo->tumores_masas = $request->modal_agregar_tipo_tumores_masas;
        $ficha_tipo->obs_tumores_masas = $request->observaciones_obs_tumores_masas;
        $ficha_tipo->gland_anexas = $request->modal_agregar_tipo_gland_anexas;
        $ficha_tipo->obs_gland_anexas = $request->observaciones_obs_gland_anexas;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOtorrino(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOtorrinoTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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



    public function agregarAudifono(Request $request)
    {
        $datos = array();

        $filtro = array();
        $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        $filtro[] = array('id_paciente',$request->id_paciente);
        $filtro[] = array('id_profesional',$request->id_profesional);
        $registro_existente = RecetaAudifono::where($filtro)->first();

        if($registro_existente)
        {
            $registros = $registro_existente;
        }
        else
        {
            $registros = new RecetaAudifono();
        }

        $registros->id_ficha_atencion = $request->id_ficha_atencion;
        $registros->id_paciente = $request->id_paciente;
        $registros->id_profesional = $request->id_profesional;
        $registros->fecha = date('Y-m-d H:i:s');
        $registros->tipo = $request->tipo;
        $registros->od = $request->od;
        $registros->especificacion_od = $request->especificacion_od;
        $registros->oi = $request->oi;
        $registros->especificacion_oi = $request->especificacion_oi;
        $registros->bi = $request->bi;
        $registros->especificacion_bi = $request->especificacion_bi;
        $registros->especificacion_general = $request->especificacion_general;
        $registros->cod_auto = session('lic_token');

        if($registros->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro con exito';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro con falla';
        }

        return $datos;
    }

    public function verAudifono(Request $request)
    {
        $datos = array();
        $filtro = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $valido = 0;
            $error['id_ficha_atencion'] = 'campo requerido';
        }
        if(empty($request->id_paciente))
        {
            $valido = 0;
            $error['id_paciente'] = 'campo requerido';
        }
        if(empty($request->id_profesional))
        {
            $valido = 0;
            $error['id_profesional'] = 'campo requerido';
        }

        if($valido == 1)
        {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
            $filtro[] = array('id_paciente',$request->id_paciente);
            $filtro[] = array('id_profesional',$request->id_profesional);
            $registro = RecetaAudifono::where($filtro)->first();
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

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;

        }

        return $datos;
    }

	public function agregarLiquidacion(Request $request)
    {
        $result = LiquidacionReciboController::store( Auth::user()->id, $request->rut, $request->nombre, $request->banco, $request->cuenta, $request->email, $request->principal, $request->tipo_cuenta,1);
        return $result;
    }

    public function modificarLiquidacion(Request $request)
    {
        $result = LiquidacionReciboController::edit($request->id, Auth::user()->id, $request->rut, $request->nombre, $request->banco, $request->cuenta, $request->email, $request->principal, $request->tipo_cuenta,1);
        return $result;
    }

    /** FICHA CIRUGIA DIGESTIVA TIPO */
    public function agregarFichaTipoCDG(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaCirugiaDigestivaTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->ind_esp_cirugia = $request->ind_esp_cirugia;
        $ficha_tipo->dolor_cdg = $request->dolor_cdg;
        $ficha_tipo->obs_dolor_cdg = $request->obs_dolor_cdg;

        $ficha_tipo->transito_intest = $request->transito_intest;
        $ficha_tipo->obs_transito_intest = $request->obs_transito_intest;
        $ficha_tipo->dolor_def = $request->dolor_def;
        $ficha_tipo->obs_dolor_def = $request->obs_dolor_def;
        $ficha_tipo->sangre_otros = $request->sangre_otros;
        $ficha_tipo->obs_sangre_otros = $request->obs_sangre_otros;

        $ficha_tipo->otros_sintomas_cdg = $request->otros_sintomas_cdg;
        $ficha_tipo->obs_otros_sintomas_cdg = $request->obs_otros_sintomas_cdg;
        $ficha_tipo->ceg_cdg = $request->ceg_cdg;
        $ficha_tipo->obs_ceg_cdg = $request->obs_ceg_cdg;
        $ficha_tipo->masa_cdg = $request->masa_cdg;
        $ficha_tipo->obs_masa_cdg = $request->obs_masa_cdg;
        $ficha_tipo->urgencia_cdg = $request->urgencia_cdg;
        $ficha_tipo->obs_urgencia_cdg = $request->obs_urgencia_cdg;
        $ficha_tipo->so_cdg = $request->so_cdg;
        $ficha_tipo->obs_so_cdg = $request->obs_so_cdg;
        $ficha_tipo->obs_egp_cdg = $request->obs_egp_cdg;
        $ficha_tipo->obs_gen_ex_esp_cdg = $request->obs_gen_ex_esp_cdg;
        // $ficha_tipo->otro = $request->otro;
        // $ficha_tipo->estado = $request->estado;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoCDG(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaDigestivaTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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

    public function cargarFichasTipoCDG()
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaDigestivaTipo::where('id_profesional',$profesional->id)->get();

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
    /** CIERRE FICHA CIRUGIA DIGESTIVA TIPO */

    /** FICHA CIRUGIA GENERAL TIPO */
    public function agregarFichaTipoCG(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaCirugiaGeneralTipo();
        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->ind_esp_cirugia = $request->ind_esp_cirugia;
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->e_general = $request->e_general;
        $ficha_tipo->obs_e_general = $request->obs_e_general;
        $ficha_tipo->e_signos_vit = $request->e_signos_vit;
        $ficha_tipo->obs_e_signos_vit = $request->obs_e_signos_vit;
        $ficha_tipo->e_dolor_loc = $request->e_dolor_loc;
        $ficha_tipo->obs_e_dolor_loc = $request->obs_e_dolor_loc;
        $ficha_tipo->masas_pal = $request->masas_pal;
        $ficha_tipo->obs_masas_pal = $request->obs_masas_pal;
        $ficha_tipo->e_piel_fan = $request->e_piel_fan;
        $ficha_tipo->obs_e_piel_fan = $request->obs_e_piel_fan;
        $ficha_tipo->ex_cabcuello = $request->ex_cabcuello;
        $ficha_tipo->obs_ex_cabcuello = $request->obs_ex_cabcuello;
        $ficha_tipo->ex_torax = $request->ex_torax;
        $ficha_tipo->obs_ex_torax = $request->obs_ex_torax;
        $ficha_tipo->ex_abdomen = $request->ex_abdomen;
        $ficha_tipo->obs_ex_abdomen = $request->obs_ex_abdomen;
        $ficha_tipo->ex_muscesq = $request->ex_muscesq;
        $ficha_tipo->obs_ex_muscesq = $request->obs_ex_muscesq;
        $ficha_tipo->ex_o_sent = $request->ex_o_sent;
        $ficha_tipo->obs_ex_o_sent = $request->obs_ex_o_sent;
        $ficha_tipo->obs_ex_segmentario = $request->obs_ex_segmentario;
        $ficha_tipo->urgencia_cg = $request->urgencia_cg;
        $ficha_tipo->obs_urgencia_cg = $request->obs_urgencia_cg;
        $ficha_tipo->hosp_cg = $request->hosp_cg;
        $ficha_tipo->obs_hosp_cg = $request->obs_hosp_cg;
        $ficha_tipo->otrotto_cg = $request->otrotto_cg;
        $ficha_tipo->obs_otrotto_cg = $request->obs_otrotto_cg;
        $ficha_tipo->obs_plan_tratamiento = $request->obs_plan_tratamiento;
        $ficha_tipo->hospen_cg = $request->hospen_cg;
        $ficha_tipo->obs_hospen_cg = $request->obs_hospen_cg;
        $ficha_tipo->hosp_enserv_cg = $request->hosp_enserv_cg;
        $ficha_tipo->obs_hosp_enserv_cg = $request->obs_hosp_enserv_cg;
        $ficha_tipo->otro_tto_cg = $request->otro_tto_cg;
        $ficha_tipo->obs_otro_tto_cg = $request->obs_otro_tto_cg;
        $ficha_tipo->obs_hospitalizacion_cg = $request->obs_hospitalizacion_cg;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->estado = 1;


        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoCG(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaGeneralTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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

    public function cargarFichasTipoCG(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaGeneralTipo::where('id_profesional',$profesional->id)->get();

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
    /** CIERRE FICHA CIRUGIA GENERAL TIPO */


    /**************** FICHA TIPO OFTALMOLOGIA ******************** */
    /** FICHA OFTALMOLOGIA GENERAL TIPO */
    public function agregarFichaTipoOft(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOftTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->agudeza_visual_subj_od = $request->agudeza_visual_subj_od;
        $ficha_tipo->obs_agudeza_visual_subj_od = $request->obs_agudeza_visual_subj_od;
        $ficha_tipo->agudeza_visual_subj_oi = $request->agudeza_visual_subj_oi;
        $ficha_tipo->obs_agudeza_visual_subj_oi = $request->obs_agudeza_visual_subj_oi;
        $ficha_tipo->agudeza_visual_obj_od = $request->agudeza_visual_obj_od;
        $ficha_tipo->obs_agudeza_visual_obj_od = $request->obs_agudeza_visual_obj_od;
        $ficha_tipo->agudeza_visual_obj_oi = $request->agudeza_visual_obj_oi;
        $ficha_tipo->obs_agudeza_visual_obj_oi = $request->obs_agudeza_visual_obj_oi;
        $ficha_tipo->mov_oculares = $request->mov_oculares;
        $ficha_tipo->obs_mov_oculares = $request->obs_mov_oculares;
        $ficha_tipo->autorefracto_od = $request->autorefracto_od;
        $ficha_tipo->obs_autorefracto_od = $request->obs_autorefracto_od;
        $ficha_tipo->autorefracto_oi = $request->autorefracto_oi;
        $ficha_tipo->obs_autorefracto_oi = $request->obs_autorefracto_oi;
        $ficha_tipo->presion_ocular_od = $request->presion_ocular_od;
        $ficha_tipo->obs_presion_ocular_od = $request->obs_presion_ocular_od;
        $ficha_tipo->valor_presion_ocular_od = $request->valor_presion_ocular_od;
        $ficha_tipo->presion_ocular_oi = $request->presion_ocular_oi;
        $ficha_tipo->obs_presion_ocular_oi = $request->obs_presion_ocular_oi;
        $ficha_tipo->valor_presion_ocular_oi = $request->valor_presion_ocular_oi;
        $ficha_tipo->campo_visual_od = $request->campo_visual_od;
        $ficha_tipo->obs_campo_visual_od = $request->obs_campo_visual_od;
        $ficha_tipo->campo_visual_oi = $request->campo_visual_oi;
        $ficha_tipo->obs_campo_visual_oi = $request->obs_campo_visual_oi;
        $ficha_tipo->campo_otros_ex_general = $request->campo_otros_ex_general;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->otro2 = $request->otro2;

        $ficha_tipo->estado = 1;


        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOft(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOftTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE FICHA OFTALMOLOGIA GENERAL TIPO */

    /** EXAMEN EXAMEN BIOMICROSCOPIA TIPO */
    public function agregarFichaTipoOftBio(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOftBiomicroscopiaTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->parpbiood = $request->parpbiood;
        $ficha_tipo->obs_parpbiood = $request->obs_parpbiood;
        $ficha_tipo->conjuntiva_bio_od = $request->conjuntiva_bio_od;
        $ficha_tipo->obs_conjuntiva_bio_od = $request->obs_conjuntiva_bio_od;
        $ficha_tipo->biocornea_od = $request->biocornea_od;
        $ficha_tipo->obs_biocornea_od = $request->obs_biocornea_od;
        $ficha_tipo->camara_ant_od = $request->camara_ant_od;
        $ficha_tipo->obs_camara_ant_od = $request->obs_camara_ant_od;
        $ficha_tipo->tyndall_od = $request->tyndall_od;
        $ficha_tipo->obs_tyndall_od = $request->obs_tyndall_od;
        $ficha_tipo->cristalino_bio_od = $request->cristalino_bio_od;
        $ficha_tipo->obs_cristalino_bio_od = $request->obs_cristalino_bio_od;
        $ficha_tipo->campo_otros_bio_od = $request->campo_otros_bio_od;
        $ficha_tipo->parpbiooi = $request->parpbiooi;
        $ficha_tipo->obs_parpbiooi = $request->obs_parpbiooi;
        $ficha_tipo->conjuntiva_bio_oi = $request->conjuntiva_bio_oi;
        $ficha_tipo->obs_conjuntiva_bio_oi = $request->obs_conjuntiva_bio_oi;
        $ficha_tipo->biocornea_oi = $request->biocornea_oi;
        $ficha_tipo->obs_biocornea_oi = $request->obs_biocornea_oi;
        $ficha_tipo->camara_ant_oi = $request->camara_ant_oi;
        $ficha_tipo->obs_camara_ant_oi = $request->obs_camara_ant_oi;
        $ficha_tipo->tyndall_oi = $request->tyndall_oi;
        $ficha_tipo->obs_tyndall_oi = $request->obs_tyndall_oi;
        $ficha_tipo->cristalino_bio_oi = $request->cristalino_bio_oi;
        $ficha_tipo->obs_cristalino_bio_oi = $request->obs_cristalino_bio_oi;
        $ficha_tipo->campo_otros_bio_oi = $request->campo_otros_bio_oi;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->otro2 = $request->otro2;

        $ficha_tipo->estado = 1;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOftBio(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOftBiomicroscopiaTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE EXAMEN EXAMEN BIOMICROSCOPIA TIPO */

    /** EXAMEN FONDO DE OJO TIPO */
    public function agregarFichaTipoOftFondo(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOftFondoOjoTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->papilas_fo_od = $request->papilas_fo_od;
        $ficha_tipo->obs_papilas_fo_od = $request->obs_papilas_fo_od;
        $ficha_tipo->excavacion_fo_od = $request->excavacion_fo_od;
        $ficha_tipo->obs_excavacion_fo_od = $request->obs_excavacion_fo_od;
        $ficha_tipo->bordes_od = $request->bordes_od;
        $ficha_tipo->obs_bordes_od = $request->obs_bordes_od;
        $ficha_tipo->maculas_fo_od = $request->maculas_fo_od;
        $ficha_tipo->obs_maculas_fo_od = $request->obs_maculas_fo_od;
        $ficha_tipo->vasos_fo_od = $request->vasos_fo_od;
        $ficha_tipo->obs_vasos_fo_od = $request->obs_vasos_fo_od;
        $ficha_tipo->periferia_fo_od = $request->periferia_fo_od;
        $ficha_tipo->obs_periferia_fo_od = $request->obs_periferia_fo_od;
        $ficha_tipo->campo_fo_otros_od = $request->campo_fo_otros_od;
        $ficha_tipo->papilas_fo_oi = $request->papilas_fo_oi;
        $ficha_tipo->obs_papilas_fo_oi = $request->obs_papilas_fo_oi;
        $ficha_tipo->excavacion_fo_oi = $request->excavacion_fo_oi;
        $ficha_tipo->obs_excavacion_fo_oi = $request->obs_excavacion_fo_oi;
        $ficha_tipo->bordes_oi = $request->bordes_oi;
        $ficha_tipo->obs_bordes_oi = $request->obs_bordes_oi;
        $ficha_tipo->maculas_fo_oi = $request->maculas_fo_oi;
        $ficha_tipo->obs_maculas_fo_oi = $request->obs_maculas_fo_oi;
        $ficha_tipo->vasos_fo_oi = $request->vasos_fo_oi;
        $ficha_tipo->obs_vasos_fo_oi = $request->obs_vasos_fo_oi;
        $ficha_tipo->periferia_fo_oi = $request->periferia_fo_oi;
        $ficha_tipo->obs_periferia_fo_oi = $request->obs_periferia_fo_oi;
        $ficha_tipo->campo_fo_otros_oi = $request->campo_fo_otros_oi;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->otro2 = $request->otro2;

        $ficha_tipo->estado = 1;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOftFondo(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOftFondoOjoTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE EXAMEN FONDO DE OJO TIPO */
    /**************** CIERRE FICHA TIPO OFTALMOLOGIA ******************** */

    /**************** FICHA TIPO UROLOGIA ******************** */
    /** FICHA UROLOGIA GENERAL TIPO */
    public function agregarFichaTipoUro(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaUroTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->costo_vert_ld = $request->costo_vert_ld;
        $ficha_tipo->obs_costo_vert_ld = $request->obs_costo_vert_ld;
        $ficha_tipo->costo_vert_li = $request->costo_vert_li;
        $ficha_tipo->obs_costo_vert_li = $request->obs_costo_vert_li;
        $ficha_tipo->examen_abd = $request->examen_abd;
        $ficha_tipo->obs_examen_abd = $request->obs_examen_abd;
        $ficha_tipo->tacto_rec = $request->tacto_rec;
        $ficha_tipo->obs_tacto_rec = $request->obs_tacto_rec;
        $ficha_tipo->antigeno_prost = $request->antigeno_prost;
        $ficha_tipo->obs_antigeno_prost = $request->obs_antigeno_prost;
        $ficha_tipo->biopsia_uro = $request->biopsia_uro;
        $ficha_tipo->obs_biopsia_uro = $request->obs_biopsia_uro;
        $ficha_tipo->ingle = $request->ingle;
        $ficha_tipo->obs_detalle_ingle = $request->obs_detalle_ingle;
        $ficha_tipo->habitos_micionales = $request->habitos_micionales;
        $ficha_tipo->obs_habitos_micionales = $request->obs_habitos_micionales;
        $ficha_tipo->funcion_pene = $request->funcion_pene;
        $ficha_tipo->obs_funcion_pene = $request->obs_funcion_pene;
        $ficha_tipo->sintomas_funcionales = $request->sintomas_funcionales;
        $ficha_tipo->obs_sintomas_funcionales = $request->obs_sintomas_funcionales;
        $ficha_tipo->uretra_masc = $request->uretra_masc;
        $ficha_tipo->obs_detalle_uretra_masc = $request->obs_detalle_uretra_masc;
        $ficha_tipo->examen_pene = $request->examen_pene;
        $ficha_tipo->obs_pene_anormal = $request->obs_pene_anormal;
        $ficha_tipo->examen_test = $request->examen_test;
        $ficha_tipo->obs_test_anormal = $request->obs_test_anormal;
        $ficha_tipo->vulva = $request->vulva;
        $ficha_tipo->obs_det_vulva = $request->obs_det_vulva;
        $ficha_tipo->vagina = $request->vagina;
        $ficha_tipo->obs_det_vagina = $request->obs_det_vagina;
        $ficha_tipo->examen_horm = $request->examen_horm;
        $ficha_tipo->obs_examen_horm = $request->obs_examen_horm;
        $ficha_tipo->obs_ex_uro = $request->obs_ex_uro;


        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoUro(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaUroTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE FICHA UROLOGIA GENERAL TIPO */


    /**************** FICHA TIPO PEDIATRIA ******************** */
    /** FICHA PEDIATRIA GENERAL TIPO */
    public function agregarFichaTipoPedGen(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaPediatriaGeneralTipo();

        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->e_nutricional = $request->e_nutricional;
        $ficha_tipo->obs_e_nutricional = $request->obs_e_nutricional;
        $ficha_tipo->e_vacunas = $request->e_vacunas;
        $ficha_tipo->obs_e_vacunas = $request->obs_e_vacunas;
        $ficha_tipo->obs_ex_nutricional_vacunas = $request->obs_ex_nutricional_vacunas;
        $ficha_tipo->e_piel = $request->e_piel;
        $ficha_tipo->obs_e_piel = $request->obs_e_piel;
        $ficha_tipo->e_cabcuello = $request->e_cabcuello;
        $ficha_tipo->obs_e_cabcuello = $request->obs_e_cabcuello;
        $ficha_tipo->e_torax = $request->e_torax;
        $ficha_tipo->obs_e_torax = $request->obs_e_torax;
        $ficha_tipo->e_abdomen = $request->e_abdomen;
        $ficha_tipo->obs_e_abdomen = $request->obs_e_abdomen;
        $ficha_tipo->e_muscesq = $request->e_muscesq;
        $ficha_tipo->obs_e_muscesq = $request->obs_e_muscesq;
        $ficha_tipo->e_o_sent = $request->e_o_sent;
        $ficha_tipo->obs_e_o_sent = $request->obs_e_o_sent;
        $ficha_tipo->obs_ex_segmentario = $request->obs_ex_segmentario;
        $ficha_tipo->obs_ex_pedgen = $request->obs_ex_pedgen;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoPedGen(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaPediatriaGeneralTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE FICHA PEDIATRIA GENERAL TIPO */


    /** buscar profesionales autocomplete */
    public function buscarPorNombreAutocomplete(Request $request)
    {
        $search = $request->search;
        if ($search == '')
        {
            $registros = Profesional::orderby('nombre', 'asc')->select('id', 'nombre', 'apellido_uno')->limit(5)->get();
        }
        else
        {
            $registros = Profesional::orderby('nombre', 'asc')
                ->select('id', 'nombre', 'apellido_uno')
                ->where(function($query) use($search){
                    $query->where('nombre', 'like', '%'.$search.'%')
                            ->orWhere('apellido_uno', 'like', '%'.$search.'%');
                })
                ->limit(5)
                ->get();
        }

        $response = array();
        foreach ($registros as $registro)
        {
            $response[] = array("value" => $registro->id, "label" => $registro->nombre.' '.$registro->apellido_uno, "codigo" => $registro->codigo);
        }
        return response()->json($response);
    }
    /** fin buscar profesionales autocomplete */

     /*Acceso Profecional no Inscrito*/
     public function acceso_pni(Request $request)
     {

        $token = $request->token;

        $profesional_provisorio = ProfesionalProvisorio::where([['token',$token],['estado_token',0]])->first();

        if($profesional_provisorio)
        {

           $id_registro = $profesional_provisorio->id;

           if($profesional_provisorio->id_direccion)
           {
                $direccion = Direccion::find($profesional_provisorio->id_direccion);



                if($direccion)
                {
                    $direccion_nombre =  $direccion->direccion;
                    $direccion_numero =  $direccion->numero_dir;
                    $id_ciudad = $direccion->id_ciudad;

                    $ciudad = Ciudad::find($direccion->id_ciudad);

                    if($ciudad)
                    {
                    $id_region =  $ciudad->id_region;
                    }else{
                        $id_region =  0;
                    }
                }else{
                    $direccion_nombre =  '';
                    $direccion_numero =  '';
                    $id_ciudad = 0;
                    $id_region =  0;
                }

           }else{
                    $direccion_nombre =  '';
                    $direccion_numero =  '';
                    $id_ciudad = 0;
                    $id_region =  0;
           }

        }else{
            abort(401);
        }



         $regiones = Region::all();
         $ciudades = Ciudad::all();


         $especialidades = Especialidad::where('estado',1)->get();
         $tipo_especialidad = TipoEspecialidad::where('estado',1)->get();
         $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

         return view('app.profesional.acceso_profesional_no_inscrito')->with([
             'id_registro' => $id_registro,
             'registro' => $profesional_provisorio,
             'regiones' => $regiones,
             'ciudades' => $ciudades,

             'direccion_nombre' => $direccion_nombre,
             'direccion_numero' => $direccion_numero,
             'id_ciudad' => $id_ciudad,
             'id_region' => $id_region,

             'profesion' => $especialidades,
             'especialidad' => $tipo_especialidad,
             'subespecialidad' => $sub_tipo_especialidad,
             'token' => $token
         ]);
     }

     public function agregar_profesional_provisorio(Request $request)
     {
        $datos = array();
        $error = array();
        $estado = 0;
        $profesional_nuevo = 0;

        $lugar_atencion_id_ = 0;
        $id_usuario_genera_ = 0;
        $id_usuario_ = 0;
        $id_profesional_ = 0;
        $id_hora_realizar_ = 0;
        $clave_ = rand(1111,9999);

        $id_registro = $request->id_registro;
        $nombre = $request->nombre_profesional;
        $primer_apellido = $request->primer_apellido_profesional;
        $segundo_apellido = $request->segundo_apellido_profesional;
        $lista_profesion = $request->lista_profesion;
        $sexo = $request->sexo_profesional;
        $rut = $request->rut_profesional;
        $email = $request->email_profesional;
        $lista_especialidad = $request->lista_especialidad;
        $lista_sub_especialidad = $request->lista_sub_especialidad;
        $telefono_uno = $request->telefono_uno_profesional;
        $telefono_dos = $request->telefono_dos_profesional;

        $direccion = $request->direccion_consulta_profesional;
        $numero_dir = $request->numero_dir_consulta_profesional;
        $lista_ciudades = $request->lista_ciudades;
        $token_profesional_provisorio = $request->token_profesional_provisorio;


        //VALIDAMOS TOKEN
        // PROFESIONAL PROVISORIO
        $profesional_provisorio = ProfesionalProvisorio::find($request->id_registro);

        if($profesional_provisorio->estado_token==1||empty($request->id_registro))
        {
            return view('app.profesional.estado_acceso_profesional_no_inscrito')->with([
                'estado' => 0,
                'error' => 'Token invalido'
            ]);
        }

        if($profesional_provisorio)
        {
            $id_usuario_ = $profesional_provisorio->id_usuario;
            $id_usuario_genera_ = $profesional_provisorio->id_usuario_genera; // ID USUARIO QUE CREO INVITACION

            $profesional_provisorio->nombre = $nombre;
            $profesional_provisorio->apellido_uno = $primer_apellido;
            $profesional_provisorio->apellido_dos = $segundo_apellido;
            $profesional_provisorio->sexo = $sexo;
            $profesional_provisorio->rut = str_replace('.','',$rut);
            $profesional_provisorio->email = $email;
            $profesional_provisorio->telefono_uno = $telefono_uno;
            $profesional_provisorio->telefono_dos = $telefono_dos;
            //$profesional_provisorio->id_direccion = $id_direccion;
            //$profesional_provisorio->id_usuario = $id_usuario;
            $profesional_provisorio->id_especialidad = $lista_profesion;
            $profesional_provisorio->id_tipo_especialidad = $lista_especialidad;
            //desactivamos token
            $profesional_provisorio->estado_token = 1;
            $profesional_provisorio->save();
        }


        // PROFESIONAL EXISTENTE
        $validar_profesional = Profesional::where('email',$email)->first();
        if($validar_profesional)
        {
            $id_profesional_ = $validar_profesional->id;
            $validar_profesional->nombre = $nombre;
            $validar_profesional->apellido_uno = $primer_apellido;
            $validar_profesional->apellido_dos = $segundo_apellido;
            $validar_profesional->sexo = $sexo;
            $validar_profesional->rut = str_replace('.','',$rut);
            $validar_profesional->email = $email;

            $validar_profesional->id_especialidad = $lista_profesion; //id_especialidad
            $validar_profesional->id_tipo_especialidad = $lista_especialidad; //id_tipo_especialidad
            $validar_profesional->id_sub_tipo_especialidad = $lista_sub_especialidad; //id_sub_tipo_especialidad

            $validar_profesional->telefono_uno = $telefono_uno;
            $validar_profesional->telefono_dos = $telefono_dos;
            $validar_profesional->estado = 1;
            $validar_profesional->certificado = 0;

            $validar_profesional->provisorio = 1;
            $validar_profesional->save();

            $id_usuario_ = $validar_profesional->id_usuario; // ID USUARIO PROFESIONAL EXISTENTE

            //ACTUALIZAMOS REGISTRO PROFESIONAL PROVISORIO ID USUARIO
            $profesional_provisorio2 = ProfesionalProvisorio::find($request->id_registro);
            $profesional_provisorio2->id_usuario = $id_usuario_;
            $profesional_provisorio2->save();

            //AUTH USUARIO
            //var_dump($id_usuario_);
            if(Auth::loginUsingId($id_usuario_))
            {
                $estado = 1;
                $datos['login_msg'] = 'Usuario Logeado';
            }else{
                $datos['login_msg'] = 'Usuario no se pudo Logear';
                $error = 'Usuario no se pudo Logear';
                $estado = 0;
            }

            //LUGAR ATENCION
            $lugarAtencion = LugarAtencion::where('email',$email)->first();
            $lugar_atencion_id_ = $lugarAtencion->id;

            $datos['estado'] = 1;
            $datos['msj'] = 'Profesional ya existe';

        }else{ // PROFESIONAL NUEVO
            $profesional_nuevo = 1;
            $profesionales = new Profesional();

            $profesionales->nombre = $nombre;
            $profesionales->apellido_uno = $primer_apellido;
            $profesionales->apellido_dos = $segundo_apellido;
            $profesionales->sexo = $sexo;
            $profesionales->rut = str_replace('.','',$rut);
            $profesionales->email = $email;

            $profesionales->id_especialidad = $lista_profesion; //id_especialidad
            $profesionales->id_tipo_especialidad = $lista_especialidad; //id_tipo_especialidad
            $profesionales->id_sub_tipo_especialidad = $lista_sub_especialidad; //id_sub_tipo_especialidad

            $profesionales->telefono_uno = $telefono_uno;
            $profesionales->telefono_dos = $telefono_dos;
            $profesionales->estado = 1;
            $profesionales->certificado = 0;

            $profesionales->id_direccion = NULL;
            $profesionales->id_usuario = NULL;
            $profesionales->provisorio = 1;

            if($profesionales->save())
            {

                $id_profesional_ = $profesionales->id;
                //DIRECCIONES
                $direcciones = new Direccion();
                $direcciones->direccion = $direccion;
                $direcciones->numero_dir = $numero_dir;
                $direcciones->id_ciudad = $lista_ciudades;

                //USER
                $validar_user = User::where('email',$email)->first();
                if($validar_user == NULL)
                {
                    $user = new User();
                    $pass = Hash::make($clave_);
                    $user->name = $nombre.' '.$primer_apellido.' '.$segundo_apellido;
                    $user->email = $email;
                    $user->password = $pass;

                    if($user->save())
                    {
                        //ACTUALIZAMOS REGISTRO PROFESIONAL PROVISORIO ID USUARIO
                        $profesional_provisorio2 = ProfesionalProvisorio::find($request->id_registro);
                        $profesional_provisorio2->id_usuario = $user->id;
                        $profesional_provisorio2->save();

                        $id_usuario_ = $user->id; // GUARDAMOS ID USUARIO NUEVO

                        $user->assignRole('Profesional');
                        $datos['user_msg'] = 'Usuario Creado';

                        //AUTH USUARIO
                        if (Auth::attempt(['email' => $email, 'password' =>  $clave_])) {
                            $datos['login_msg'] = 'Usuario Logeado';
                        }else{
                            $datos['login_msg'] = 'Usuario no se pudo Logear';
                        }

                    }else{
                        $datos['user_msg'] = 'Usuario No Creado';
                    }
                }else{
                    //AUTH USUARIO
                    if (Auth::attempt(['email' => $validar_user->email, 'password' =>  $validar_user->password])) {
                        $datos['login_msg'] = 'Usuario Logeado';
                    }else{
                        $datos['login_msg'] = 'Usuario no se pudo Logear';
                    }
                }

                if($direcciones->save())
                {
                    $error = 'direccion creado';
                    $profesionales->id_direccion = $direcciones->id;
                    if($validar_user == NULL)
                    $profesionales->id_usuario = $user->id;
                    $profesionales->save();


                    //LUGARES ATENCION
                    $lugar_atencion = new LugarAtencion();
                    $lugar_atencion->nombre = $nombre.' '.$primer_apellido.' '.$segundo_apellido;
                    $lugar_atencion->rut = $rut;
                    $lugar_atencion->email = $email;
                    $lugar_atencion->telefono = $telefono_uno;
                    $lugar_atencion->id_direccion = $direcciones->id;

                    if($lugar_atencion->save()){
                        $datos['lugar_atencion_msg'] = 'Lugar Atención Creado';
                        $lugar_atencion_id_ = $lugar_atencion->id;
                    }else{
                        $datos['lugar_atencion_msg'] = 'Lugar Atención No Creado';
                    }

                    //PROFESIONALES LUGARES ATENCION
                    $profesionales_lugares_atencion = new ProfesionalesLugaresAtencion();
                    $profesionales_lugares_atencion->id_profesional = $profesionales->id;
                    $profesionales_lugares_atencion->id_lugar_atencion = $lugar_atencion->id;
                    $profesionales_lugares_atencion->estado = 1;

                    if($profesionales_lugares_atencion->save())
                    {
                        $datos['profesionales_lugar_atencion_msg'] = 'Profesional Lugar Atención Creado';
                    }else{
                        $datos['profesionales_lugar_atencion_msg'] = 'Profesional Lugar Atención No Creado';
                    }

                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';



                }else{
                    $error = 'direccion no creado';
                }

                $error = 'Profesional creado';
                $estado = 1;

            }else{
                $error = 'Profesional no creado';
                $estado = 0;
            }
        }

        // HORA MEDICA
        $paciente = Paciente::where('id_usuario', $id_usuario_genera_)->first();
        $hora_medica = new HoraMedica();

        $hora_medica->id_paciente = $paciente->id;
        $hora_medica->id_profesional = $id_profesional_;
        $hora_medica->id_asistente = 2;
        $hora_medica->id_estado = 1;
        $hora_medica->id_lugar_atencion = $lugar_atencion_id_;
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse(date('Y-m-d'))->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse(date('H:i:s'))->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse(date('H:i:s'))->addMinutes(15)->subSecond()->format('H:i:s');
        $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
        if($hora_medica->save()){
            $id_hora_realizar_ = $hora_medica->id;
            $datos['hora_medica_msg'] = 'Hora Medica Creada';
        }else{
            $datos['hora_medica_msg'] = 'Hora Medica no Creada';
            $error['hora_medica_msg'] = 'Hora Medica no Creada';
        }



        /** envio de correo de confirmacion  */
        if($profesional_nuevo == 1) // VALIDANDO SI ES UN PROFESIONAL NUEVO O EXISTENTE
        {
            $blade = 'profesional_usuario_creado';
            $to = array(
                    array('email' => $email,'name' => $nombre.' '.$primer_apellido.' '.$segundo_apellido),
                );
            $cc = array();
            $bcc = array();
            $asunto = 'MED-SDI - Bienvenido!';
            $body = array(
                'nombre' => $nombre.' '.$primer_apellido.' '.$segundo_apellido,
                'user'=> $email,
                'pass' => $clave_
            );
            $archivo = '';/** pendiente */
            $id_institucion = '';

            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

            if($result_mail['estado'])
            {
                $datos['mail']['estado'] = 1;
                $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
            }else{
                $datos['mail']['estado'] = 0;
                $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
            }
        }else{
            $datos['mail']['estado'] = 1;
            $datos['mail']['msj'] = 'Usuario existente, redirigiendo al sistema';
        }

        return view('app.profesional.estado_acceso_profesional_no_inscrito')->with([
            'estado' => $estado,
            'error' => $error,
            'datos'=> $datos,
            'token_'=> $token_profesional_provisorio,

            'id_paciente' => $paciente->id,
            'lugar_atencion_id' => $lugar_atencion_id_,
            'id_hora_realizar' =>$id_hora_realizar_,
            'profesional_nuevo' => $profesional_nuevo
        ]);


     }




}
