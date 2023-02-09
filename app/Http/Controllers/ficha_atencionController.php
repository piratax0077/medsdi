<?php

namespace App\Http\Controllers;

use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
use App\Models\Articulo;
use App\Models\CertificadoReposo;
use App\Models\Ciudad;
use App\Models\ControlObesidad;
use App\Models\DetalleReceta;
use App\Models\Diabete;

use App\Models\Direccion;
use App\Models\Dosis;
use App\Models\Especialidad;
use App\Models\Examen;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTipo;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\ficha_atencion;
use App\Models\FichaAtencion;
use App\Models\FichaCirugiaDigestivaTipo;
use App\Models\FichaCirugiaGeneralTipo;
use App\Models\FichaOtorrino;
use App\Models\FichaOtorrinoRinof;
use App\Models\FichaOtorrinoTipo;
use App\Models\GesDiagnostico;
use App\Models\GesRegistros;
use App\Models\Grupo_sanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\informe_medico;
use App\Models\InformeMedico;
use App\Models\Interconsulta;
use App\Models\Licencia;
use App\Models\LicenciaPPF;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Presentacion;
use App\Models\PresentacionDosis;
use App\Models\Prevision;
use App\Models\Producto;
use App\Models\Profesional;
use App\Models\ProfesionalProvisorio;
use App\Models\RecetaControl;
use App\Models\Region;
use App\Models\reposo;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SubTipoEspecialidad;
use App\Models\SubTipoExamen;
use App\Models\TipoEspecialidad;
use App\Models\TipoExamen;
use App\Models\User;
use App\Models\UsoPersonal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use PDF;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\Console\Input\Input;

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

                    return view('atencion_medica.atencion_medica');
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
        return view('atencion_medica.atencion_medica');
    }

    public function imprimir()
    {
        $pdf = PDF::loadView('atencion_medica.PDF.pdf_prueba');

        return $pdf->download('ejemplo.pdf');
    }

    public function index(Request $request)
    {
        $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
        $paciente = Paciente::where('id', $hora->id_paciente)->first();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
        $regiones = Region::all();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->get();

        // CONSULTAS PREVIAS
        // $fichas = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 1)->get();
        $filtro_previas = array();
        $filtro_previas[] = array('id_paciente', $hora->id_paciente);
        $filtro_previas[] = array('confidencial', '0');
        $filtro_previas[] = array('finalizada', 1);
        $fichas = FichaAtencion::where($filtro_previas)->get();

        // LUGAR DE ATENCION
        $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();

        // FICHA DE ATENCION ACTUAL
        // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 0)->first();
        // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('finalizada', 0)->first();
        $filtro_fichaAtencion = array();
        $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);
        // $filtro_fichaAtencion[] = array('confidencial', false);
        $filtro_fichaAtencion[] = array('finalizada', 0);
        if(!empty($hora->id_ficha_atencion))
            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
        $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

        $antecedentes = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        if (isset($antecedentes)) {

            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
            $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        } else {
            $medicamentos_cronicos = [];
            $alergias = [];
            $antecedentes_quirurgicos = [];
            $patoligias_cronicas = [];
        }



        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


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

        $prevision = Prevision::all();
        $medicamento = Producto::all();
        $tipoExamen = TipoExamen::all();
        // $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
        $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
        // $hipertension = Hipertension::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        // $diabetes = Diabete::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        $direccion = $paciente->Direccion()->first();
        if (!$direccion == null) {
            $ciudad = $direccion->Ciudad()->first();
        } else {
            $direccion = null;
            $ciudad = null;
        }

        $fichaTipo = array();

        $ruta_blade = '';
        // if( $user == 3)
        // {

        //     // $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
        //     // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

        //     $ruta_blade = 'atencion_medica.atencion_medica_urologia';
        //     $fichaTipo = '';

        //     // $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
        //     // $fichaTipo = '';
        // }
        // else
        // {
            if($profesional->id_sub_tipo_especialidad == 20)
            {
                //oftalmologia
                $ruta_blade = 'atencion_medica.atencion_medica_oftalmologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 21)
            {
                //otorrinolaringologia
                $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
                $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
                $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
            }
            else if($profesional->id_sub_tipo_especialidad == 22)
            {
                //urologia
                $ruta_blade = 'atencion_medica.atencion_medica_urologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 19)
            {
                //dermatologia
                $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 27)
            {
                //gineco obstetricia
                $ruta_blade = 'atencion_gine_obstetricia.atencion_gine_obst_general';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 78)
            {
                //pediatria general
                $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_general';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 72)
            {
                //NEONATOLOGIA
                $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_neonatologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_tipo_especialidad == 108 && empty($profesional->id_sub_tipo_especialidad))
            {
                // ATENCIÓN ENFERMERA CONTROL NIÑO SANO
                $ruta_blade = 'atencion_pediatrica.control_nino_sano';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_tipo_especialidad == 51 && empty($profesional->id_sub_tipo_especialidad))
            {
                // MATRONA CONTROL NIÑO SANO
                $ruta_blade = 'atencion_pediatrica.atencion_matrona_control_nino_sano';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
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
            }
            else if($profesional->id_sub_tipo_especialidad == 7)
            {
                // Cirugía Coloproctológica
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_baja';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 11 )
            {
                // Cirugía digestiva
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
                $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                // $fichaTipo = '';
                // $fichaTipo = FichaCirugiaDigestivaTipo::get();
                // var_dump($profesional->id);
                // var_dump($fichaTipo);
                // die();
                $examen = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 12 )
            {
                // Cirugía Gástrica
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_alta';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
            }

            else
            {
                $ruta_blade = 'atencion_medica.atencion_medica';
                $fichaTipo = '';
                $examen = '';
            }
        // }

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

        // informacion ges
        // $filtro_ges = array();
        // $filtro_ges[] = array('id_ficha_atencion',$id_ficha_atencion);
        // $ges = GesRegistros::where($filtro_ges)->first();

        // ESPECIALIDAD -> PROFESION
        $especialidad = Especialidad::all();

        return view($ruta_blade)->with(
            [
                'paciente' => $paciente,
                'prevision' => $prevision,
                'profesional' => $profesional,
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
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'alergias' => $alergias,
                'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'patoligias_cronicas' => $patoligias_cronicas,
                'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                'id_ficha_atencion' => $id_ficha_atencion,
                'especialidad' => $especialidad,
                'interconsulta' => $interconsulta,
                'fichaTipo' => $fichaTipo,
                'examen' => $examen,
                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/

            ]
        );
    }

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
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $diabetes = new Diabete();
        $diabetes->peso = $request->peso;
        $diabetes->pies = $request->pies;
        $diabetes->hgac1 = $request->hgac1;
        $diabetes->colesterol = $request->colesterol;
        $diabetes->creatina = $request->creatina;
        $diabetes->glicosilada_postprandial = $request->glicosilada_postprandial;
        $diabetes->glicosinada_ayuno = $request->glicosinada_ayuno;
        $diabetes->id_profesional = $profesional->id;
        $diabetes->id_paciente = $hora_medica->id_paciente;
        $diabetes->id_ficha_atencion = $hora_medica->id_ficha_atencion;

        if (!$diabetes->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_control_hipertension(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();


        $hipertension = new Hipertension();
        $hipertension->sistolica = $request->sistolica;
        $hipertension->diastolica = $request->diastolica;
        $hipertension->ideal = $request->ideal;
        $hipertension->id_profesional = $profesional->id;
        $hipertension->id_paciente = $hora_medica->id_paciente;
        $hipertension->id_ficha_atencion = $hora_medica->id_ficha_atencion;
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
        $ges->nombre_ges = $request->nombre_ges;
        $ges->hora_ficha_ges = \Carbon\Carbon::parse($request->hora_ficha_ges)->format('H:i:s');
        $ges->id_profesional = $profesional->id;
        $ges->id_paciente = $hora_medica->id_paciente;
        $ges->id_ficha_atencion = $hora_medica->id_ficha_atencion;
        $ges->id_lugar_atencion = $request->id_lugar_atencion;
        $ges->codigo_verificacion = $request->codigo_verificacion;

        if (!$ges->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
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
            $certificado->id_profesional = $hora_medica->id_profesional;
            $certificado->id_paciente = $hora_medica->id_paciente;
            $certificado->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if (!$certificado->save()) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
            else
            {
                $result_delete = CertificadoReposo::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$certificado->id])->delete();
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';
                $datos['delete'] = $result_delete;
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

    public function registrar_interconsulta(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
        $ficha_atencion = FichaAtencion::find($request->id_fc);

        $nombre_especialidad = '';
        if(!empty($request->sub_tipo_especialidad))
            $nombre_especialidad = SubTipoEspecialidad::find($request->sub_tipo_especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = TipoEspecialidad::find($request->especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = Especialidad::find($request->profesion)->nombre ;

        $interconsulta = new Interconsulta();
        $interconsulta->id_especialidad = $request->profesion;
        $interconsulta->id_tipos_especialidad = $request->especialidad;
        $interconsulta->id_sub_tipo_especialidad = $request->sub_tipo_especialidad;
        $interconsulta->nombre_especialidad = $nombre_especialidad;
        $interconsulta->fecha_solicitud = Carbon::now();
        $interconsulta->id_paciente = $ficha_atencion->id_paciente;
        $interconsulta->id_profesional_soli = $profesional->id;
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
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['id_last'] = $interconsulta->id;
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
            $registro->citado_control_resp = $request->requiere_control?'1':'0';
            $registro->id_ficha_atencion_resp = $ficha_atencion->id;
            $registro->id_lugar_atencion_resp = $ficha_atencion->id_lugar_atencion;
            $registro->id_recuperacion_resp = $request->id_recuperacion_resp;
            $registro->id_sala_resp = $request->id_sala_resp;
            $registro->estado = 2;

            if($registro->save())
            {
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

    public function pdf_interconsulta(Request $request)
    {
        $datos = array();
        $interconsulta = Interconsulta::where('id', $request->id_interconsulta)
                                        ->first();
        if($interconsulta->count()>0)
        {

            $paciente = Paciente::find($interconsulta->id_paciente);

            // info solicitud
            $ficha_atencion_soli = FichaAtencion::find($interconsulta->id_ficha_atencion_soli);
            $lugar_atencion_soli = LugarAtencion::find($interconsulta->id_lugar_atencion_soli);
            $profesional_soli = Profesional::find($interconsulta->id_profesional_soli);
            $token_firma_soli = encrypt( $profesional_soli->rut.'_'.$profesional_soli->email.'_'.$lugar_atencion_soli->id );



            $lugar_atencion = LugarAtencion::find($ficha_atencion_soli->id_lugar_atencion);

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
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
            );
            $array_lugar_atencion_soli = array(
                'id' => $lugar_atencion_soli->id,
                'nombre' => $lugar_atencion_soli->nombre
            );
            $array_profesional_soli = array(
                'id' => $profesional_soli->id,
                'nombre' => $profesional_soli->nombre.' '.$profesional_soli->apellido_uno.' '.$profesional_soli->apellido_dos,
                'rut' => $profesional_soli->rut,
                'especialidad' => $profesional_soli->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_firma_soli,
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
                $token_firma_resp = encrypt( $profesional_resp->rut.'_'.$profesional_resp->email.'_'.$lugar_atencion_resp->id );

                // array respuesta
                $array_ficha_atencion_resp = array(
                    'id' => $ficha_atencion_resp->id,
                    'created_at' => $ficha_atencion_resp->created_at->format('d/m/Y'),
                );
                $array_lugar_atencion_resp = array(
                    'id' => $lugar_atencion_resp->id,
                    'nombre' => $lugar_atencion_resp->nombre
                );
                $array_profesional_resp = array(
                    'id' => $profesional_resp->id,
                    'nombre' => $profesional_resp->nombre.' '.$profesional_resp->apellido_uno.' '.$profesional_resp->apellido_dos,
                    'rut' => $profesional_resp->rut,
                    'especialidad' => $profesional_resp->SubTipoEspecialidad()->first()->nombre,
                    'token' =>  $token_firma_resp,
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

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $informe = new InformeMedico();
            $informe->informe_medico = $request->comentarios_informe_medico;
            $informe->fecha_informe_medico = date('Y-m-d');
            $informe->id_paciente = $hora_medica->id_paciente;
            $informe->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            $informe->id_profesional = $profesional->id;
            $informe->id_lugar_atencion = $request->id_lugar_atencion;

            if (!$informe->save()) {

                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar informe medico';

            }
            else
            {
                $delete  = InformeMedico::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$informe->id])->delete();
                $datos['estado'] = 1;
                $datos['mjs'] = 'registro exitoso';
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

            if (!$uso_personal->save()) {

                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar Uso Personal';

            }
            else
            {
                $delete  = UsoPersonal::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$uso_personal->id])->delete();
                $datos['estado'] = 1;
                $datos['mjs'] = 'registro exitoso';
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

    public function get_tipo_examen(Request $request)
    {
        $tipo_examen = TipoExamen::all();

        return json_encode($tipo_examen);
    }

    public function get_sub_tipo_examen(Request $request)
    {
        $sub_tipo_examen = ExamenMedico::where('cod_parent', $request->tipo_examen)->get();
        return json_encode($sub_tipo_examen);
    }

    public function get_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_parent', $request->sub_tipo_examen)->get();
        return json_encode($examen);
    }

    public function buscar_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_examen', $request->id)->first();
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

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta;
            $ficha->antecedentes = $request->descripcion_antecedentes;
            $ficha->examen_fisico = $request->descripcion_examen_fisico;

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


                /**examenes */
                // $mensaje_examenes = '';
                // if ($request->examenes == '[]') {
                //    $mensaje_examenes = 'No se han agregado Examenes a Ficha Clínica.';
                // } else {
                //     $examenes = json_decode($request->examenes);

                //     if (!$examenes == null) {
                //         for ($i = 0; $i < count($examenes); ++$i) {
                //             $examen = new ExamenPPF();
                //             $examen->examen = $examenes[$i]->nombre_examen;
                //             $examen->tipo_examen = $examenes[$i]->tipo;

                //             switch ($examenes[$i]->prioridad) {
                //                 case 'Baja':
                //                     $examen->id_prioridad = 1;
                //                     break;
                //                 case 'Media':
                //                     $examen->id_prioridad = 2;
                //                     break;
                //                 case 'Alta':
                //                     $examen->id_prioridad = 3;
                //                     break;
                //                 case 'Urgente':
                //                     $examen->id_prioridad = 4;
                //                     break;
                //             }

                //             $examen->id_prioridad = 2;
                //             $examen->id_profesional = $id_profesional;
                //             $examen->id_ficha_atencion = $ficha->id;
                //             $examen->id_paciente = $id_paciente;
                //             $examen->tipo_ficha = 0;

                //             if (!$examen->save()) {
                //                 $mensaje_examenes .= 'Problema al registrar el examen '.$examenes[$i]->nombre_examen.'.';
                //             }
                //         }
                //     }
                // }

                /**medicamentos */
                // $mensaje_medicamento = '';
                // if ($request->medicamentos == '[]' ) {
                //    $mensaje_medicamento = 'No se han agregado Medicamentos a Ficha Clínica.';
                // } else {

                //     $medicamentos = json_decode($request->medicamentos);

                //     for ($i = 0; $i < count($medicamentos); ++$i) {

                //         //dd($medicamentos);
                //         $detalle_receta = new DetalleReceta();
                //         $detalle_receta->id_ficha =  $ficha->id;
                //         // $detalle_receta->id_ingreso_paciente = $medicamentos[$i]->ddd;
                //         // $detalle_receta->id_recuperacion = $medicamentos[$i]->ddd;
                //         // $detalle_receta->id_sala = $medicamentos[$i]->ddd;
                //         $detalle_receta->id_articulo = $medicamentos[$i]->id_producto;
                //         $detalle_receta->producto = $medicamentos[$i]->medicamento;
                //         $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
                //         $detalle_receta->posologia = $medicamentos[$i]->posologia;
                //         $detalle_receta->via_administracion = $medicamentos[$i]->via_administracion;
                //         $detalle_receta->periodo = $medicamentos[$i]->periodo;
                //         $detalle_receta->cantidad_compra = $medicamentos[$i]->compra;
                //         $detalle_receta->cantidad_vendida = 0;
                //         // $detalle_receta->comentario = $medicamentos[$i]->ddd;
                //         // $detalle_receta->receta_token = $token_receta = encrypt( date('Ymd').'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );
                //         $detalle_receta->estado = 1;

                //         if (!$detalle_receta->save()) {
                //             $mensaje_medicamento .= 'Problema al registrar el medicamento '.$$medicamentos[$i]->medicamento.'.';
                //         }
                //     }
                // }


                // if($mensaje_medicamento != '')
                // {
                //     $mensaje .= '\n' . $mensaje_medicamento;
                //     $tipo_mensaje = 'warning';
                // }
                // if($mensaje_examenes != '')
                // {
                //     $mensaje .= '\n' . $mensaje_examenes;
                //     $tipo_mensaje = 'warning';
                // }

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

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta_orl;
            $ficha->antecedentes = $request->antec_especialidad;
            // $ficha->examen_fisico = $request->descripcion_examen_fisico;

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

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
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


                /** registro ficha especialidad */
                $ficha_orl = new FichaOtorrino();
                $ficha_orl->id_fichas_atenciones = $ficha->id;
                $ficha_orl->id_paciente = $id_paciente;
                $ficha_orl->id_usa_audifono = $request->usa_audifono;
                $ficha_orl->audifono = $request->audifono;
                $ficha_orl->apreciacion_auditiva = $request->apreciacion_auditiva;
                $ficha_orl->aprec_auditiva_def = $request->aprec_auditiva_def;
                $ficha_orl->examen_oi = $request->examen_oi;
                $ficha_orl->ex_oi_anormal = $request->ex_oi_anormal;
                $ficha_orl->examen_od = $request->examen_od;
                $ficha_orl->ex_od_anormal = $request->examen_od;
                $ficha_orl->obs_ex_oidos = $request->ex_od_anormal;
                $ficha_orl->examen_bio_oi = $request->examen_bio_oi;
                $ficha_orl->obs_examen_bio_oi = $request->obs_examen_bio_oi;
                $ficha_orl->examen_bio_od = $request->examen_bio_od;
                $ficha_orl->obs_examen_bio_od = $request->obs_examen_bio_od;
                $ficha_orl->obs_ex_biom = $request->obs_ex_biom;

                $ficha_orl->id_tipo_episodios = $request->episodios;
                $ficha_orl->obs_episodios = $request->detalle_episodios;
                $ficha_orl->id_tipo_equilibrio = $request->equilibrio;
                $ficha_orl->obs_equilibrio = $request->detalle_equilibrio;
                $ficha_orl->id_tipo_ng = $request->ng;
                $ficha_orl->obs_ng = $request->detalle_ng;
                $ficha_orl->id_tipo_sint_acomp = $request->sint_acomp;
                $ficha_orl->obs_sint_acomp = $request->detalle_sint_acompanantes;
                $ficha_orl->id_tipo_vertigo = $request->tipo_vertigo;
                $ficha_orl->obs_tipo_vertigo = $request->detalle_tipo_vertigo;
                $ficha_orl->obs_vestibular = $request->obs_vestibular;

                $ficha_orl->nariz_general = $request->nariz_general;
                $ficha_orl->det_nariz_general = $request->det_nariz_general;
                $ficha_orl->apreciacion_resp = $request->apreciacion_resp;
                $ficha_orl->aprec_resp_def = $request->aprec_resp_def;
                $ficha_orl->examen_fni = $request->examen_fni;
                $ficha_orl->ex_fni_anormal = $request->ex_fni_anormal;
                $ficha_orl->examen_fnd = $request->examen_fnd;
                $ficha_orl->ex_fnd_anormal = $request->ex_fnd_anormal;
                $ficha_orl->obs_ex_nasal = $request->obs_ex_nasal;
                $ficha_orl->disfonia = $request->disfonia;
                $ficha_orl->det_disfonia = $request->det_disfonia;
                $ficha_orl->ex_boca = $request->ex_boca;
                $ficha_orl->detalle_ex_boca = $request->detalle_ex_boca;

                $ficha_orl->examen_faringe =$request->examen_faringe;
                $ficha_orl->ex_farige_anormal = $request->ex_farige_anormal;
                $ficha_orl->examen_laringe =$request->examen_laringe;
                $ficha_orl->ex_larige_anormal = $request->ex_larige_anormal;

                $ficha_orl->obs_examen_laringe = $request->obs_examen_laringe;

                $ficha_orl->obs_ex_orl = $request->bs_ex_orl;
                $ficha_orl->hip_diag_orl = $request->diag_spec;
                $ficha_orl->ind_orl = $request->ind_orl;
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
                $parametro['id_ficha_otorrino'] = $ficha_orl->id;
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                if($examen_json['estado'] == 1)
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
                else
                {
                    $mensaje .= 'Problema al registrar Examen Espacial';
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


    public function crear_licencia(Request $request)
    {
        /*  $request->validate([
               'nombre_trabajador' => ' required|max:32',
               'prevision'=> 'required',
               'rut_trabajador' => 'required|max:12',
               'nombre_empleador' => 'required|max:500',
               'rut_empleador' => 'required|max:12',
               'cantidad_dias' => 'required|number|max:365',
               'direccion' => 'required|max:250',
               'telefono' => ' required|max:11',
               'direccion_alternavitva' => ' required',
               'diagnostico_descripcion' => ' required',
               'diagnostico_descripcion_alternativo' => ' required',
               'otros_antecedentes' => ' required',
           ]);*/

        $licencia = new licencia();

        $laboral = 0;
        if ($request->laboral == 'on') {
            $laboral = 1;
        } else {
            $laboral = 0;
        }

        $enfermedad_comun_maternal = 0;
        if ($request->enfermedad_comun_maternal == 'on') {
            $enfermedad_comun_maternal = 1;
        } else {
            $enfermedad_comun_maternal = 0;
        }

        $recuperabilidad_laboral = 0;
        if ($request->recuperabilidad_laboral == 'on') {
            $recuperabilidad_laboral = 1;
        } else {
            $recuperabilidad_laboral = 0;
        }

        $tramite_invalidez = 0;
        if ($request->tramite_invalidez == 'on') {
            $tramite_invalidez = 1;
        } else {
            $tramite_invalidez = 0;
        }

        $licencia->enfermedad_comun_maternal = $enfermedad_comun_maternal;
        $licencia->laboral = $laboral;
        $licencia->nombre_empleador = $request->nombre_empleador;
        $licencia->rut_empleador = $request->rut_empleador;
        $licencia->reposo_inicio = $request->reposo_inicio;
        $licencia->reposo_fin = $request->reposo_fin;
        $licencia->tipo_reposo = $request->tipo_reposo;
        $licencia->lugar_reposo = $request->lugar_reposo;
        $licencia->direccion_reposo = $request->direccion_reposo;
        $licencia->region_reposo = $request->region_reposo;
        $licencia->tipo_licencia = $request->tipo_licencia;
        $licencia->recuperabilidad_laboral = $recuperabilidad_laboral;
        $licencia->tramite_invalidez = $tramite_invalidez;
        $licencia->diagnostico_c10 = $request->diagnostico_c10;
        $licencia->diagnostico = $request->diagnostico;
        $licencia->antecedentes = $request->antecedentes;
        //$licencia->telefono = $request->telefono;
        //$licencia->direccion_alternavitva = $request->direccion_alternavitva;
        //$licencia->diagnostico_alternativo = $request->diagnostico_alternativo;
        //$licencia->diagnostico_descripcion_alternativo = $request->diagnostico_descripcion_alternativo;

        /*
        $file=$request->file("examen_apoyo");

        $nombre = "pdf_examen_apoyo=".$licencia->rut_paciente.".".$file->guessExtension();

        $ruta = public_path("pdf/examenes_apoyo/".$nombre);*/
        //$licencia->examenes_apoyo = $request->examenes_apoyo;

        if (!$licencia->save()) {
            $mensajeLicencia = 'Error al crear la licencia';

            return back()->with('mensajeLicencia', $mensajeLicencia);
        } else {
            //copy($file, $ruta);

            $licenciaPPF = new LicenciaPPF();
            $licenciaPPF->id_paciente = $request->id_paciente_li;
            $licenciaPPF->id_profesional = $request->id_profesional_li;
            $licenciaPPF->id_licencia = $licencia->id;
            $licenciaPPF->id_ficha_atencion = $request->id_ficha_li;

            if (!$licenciaPPF->save()) {
                $mensajeLicencia = 'Error al crear la licencia';

                return back()->with('mensajeLicencia', $mensajeLicencia);
            }
            $mensajeLicencia = 'Se Registro la licencia de forma correcta';

            return back()->with('mensajeLicencia', $mensajeLicencia);

            //return $mensajeLicencia;
        }
    }
    /**
     * creado 20220809
     * subir  manual
     * usado en vista de profesional/receta_online

     johan
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


    public function pdf_receta_medicamentos(Request $request)
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
                $token_receta = $value_detalle_receta->receta_token;


                $nombre_control = $producto->RecetaControl()->first()->descripcion;
                $id_control = $producto->RecetaControl()->first()->cod_control;
                // 1- Receta retenida con control de Psicotrópicos
                // 2- Receta retenida con control de Estupefacientes
                // 3- Receta Cheque

                if(trim($nombre_control) != 'Receta retenida con control de Psicotrópicos' && trim($nombre_control) != 'Receta retenida con control de Estupefacientes' && trim($nombre_control) != 'Receta Cheque')
                    $nombre_control = 'Receta';
                if(trim($nombre_control) == 'Receta retenida con control de Psicotrópicos' || trim($nombre_control) == 'Receta retenida con control de Estupefacientes' || trim($nombre_control) == 'Receta Cheque')
                    $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;

                $detalle_receta->$nombre_control[] = $array_medicamento;

            }

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
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
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function pdf_orden_examenes(Request $request)
    {
        $datos = array();
        $examenesPPF = ExamenPPF::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
        if($examenesPPF->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $detalle_orden = (object)array();

            $token_receta = '';
            foreach ($examenesPPF as $key_examen_ppf => $value_examen_ppf)
            {
                $nombre_examen = $value_examen_ppf->examen;

                $examen_base = ExamenMedico::where('nombre_examen', $value_examen_ppf->examen)->first();

                $id_base =  $examen_base->cod_parent;
                $codigo =  $examen_base->codigo;
                $con_contraste =  $value_examen_ppf->con_contraste;
                $nombre_control = 'orden';
                if( $id_base == 363 || $id_base == 364 || $id_base == 365 || $id_base == 366 || $id_base == 367 )
                {
                    $nombre_control = 'radiologia';
                    if( $id_base == 363 || $id_base == 364 )
                    {
                        $nombre_radiologia = ExamenMedico::where('cod_examen', $id_base)->first();
                        $nombre_examen = $nombre_radiologia->nombre_examen.' '.$value_examen_ppf->examen;
                    }

                }

                /**
                `id_prioridad`,
                `id_paciente`,
                `id_profesional`,
                `id_ficha_atencion`,
                `examen`,
                `tipo_examen`,
                `tipo_ficha`,
                 */
                $prioridad_text = array('','Baja', 'Media', 'Alta', 'Urgente');
                $array_examenes = array(
                    'prioridad' => $prioridad_text[$value_examen_ppf->id_prioridad],
                    'examen'=>$nombre_examen,
                    'contraste'=>$con_contraste,
                    'tipo_examen' => $value_examen_ppf->tipo_examen,
                    'codigo' => $codigo,
                );



                $detalle_orden->$nombre_control[] = $array_examenes;

            }

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
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
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('ORDEN EXAMENES', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_orden'), 'Orden Examenes '.$paciente->rut, 'pdf_orden_examen');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }


    public function pdf_certificado_reposo(Request $request)
    {
        $datos = array();
        $certificadoReposo = CertificadoReposo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        if($certificadoReposo->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';

            $detalle_certificado = array(
                'fecha_inicio' => $certificadoReposo->fecha_inicio,
                'fecha_termino' => $certificadoReposo->fecha_termino,
                'hipotesis' => $certificadoReposo->hipotesis,
                'comentarios' => $certificadoReposo->comentarios,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
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
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('CERTIFICADO REPOSO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_certificado'), 'Certificado Reposo '.$paciente->rut, 'pdf_certificado_reposo');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function pdf_informe_medico(Request $request)
    {
        $datos = array();
        $informMedico = InformeMedico::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        if($informMedico->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';

            $detalle_informe_medico = array(
                'informe_medico' => $informMedico->informe_medico,
                'fecha_informe_medico' => $informMedico->fecha_informe_medico,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
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
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('INFORME MEDICO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_informe_medico'), 'Informe Medico '.$paciente->rut, 'pdf_informe_medico');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
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

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';

            $detalle_uso_personal = array(
                'dirigido' => $usoPersonal->dirigido,
                'cargo' => $usoPersonal->cargo,
                'mensaje' => $usoPersonal->mensaje,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
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
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            $nombre_archivo = strtolower('dirigido_a_'.$usoPersonal->dirigido);
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_uso_personal'), $nombre_archivo, 'pdf_uso_personal');
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

    public function getFichaAtencion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registro = FichaAtencion::find($request->id_ficha_atencion);
            $paciente = Paciente::find($registro->id_paciente);

            $datos['estado'] = 1;
            $datos['registros'] = $registro;
            $datos['paciente'] = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
            );
        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /*
        public function interconsulta(Request $request)
        {
            $interconsulta = new interconsulta;

            $interconsulta->especialidad = $request->especialidad;
            $interconsulta->hipotesis = $request->hipotesis;
            $interconsulta->descripcion = $request->descripcion;
            $interconsulta->diagnostico = $request->diagnostico;
            $interconsulta->tratamiento = $request->tratamiento;
            $interconsulta->comentario = $request->comentario;
            $interconsulta->fecha_control = $request->fecha_control;
            $interconsulta->id_paciente = $request->id_paciente;
            $interconsulta->id_profesional = $request->id_profesional;

            if (!$interconsulta->save()) {
                return 'error al ingresar la interconsulta';
            }

            return back()->with('mensaje', 'se ha registrado la interconsulta');
        }

        public function reposo(Request $request)
        {
            $reposo = new reposo;

            $reposo->fecha_inicio = $request->fecha_inicio;
            $reposo->fecha_termino = $request->fecha_termino;
            $reposo->hipotesis_reposo = $request->hipotesis_reposo;
            $reposo->comentarios_reposo = $request->comentarios_reposo;
            $reposo->id_paciente = $request->id_paciente_reposo;
            $reposo->id_profesional = $request->id_profesional_reposo;

            if ($reposo->save()) {
                return back()->with('mensaje', 'Error al registar el reposo del paciente');
            }

            return back()->with('mensaje', 'Exito al registar el reposo del paciente');
        }

        public function informe_medico(Request $request)
        {
            $informe_medico = new informe_medico;

            $informe_medico->fecha_informe = $request->fecha_informe;
            $informe_medico->descripcion_informe = $request->descripcion_informe;
            $informe_medico->id_paciente = $request->paciente_informe;
            $informe_medico->id_profesional = $request->profesional_informe;

            if (!$informe_medico->save()) {
                return back()->with('mensaje', 'no se pudo almacenar el informe medico');
            }

            return back()->with('mensaje', 'Informe almacenado de forma correcta');
        }

        public function constancia_ges(Request $request)
        {
            $ges = new constancia_ges;
            $ges->nombre_prestador = $request->nombre_prestador;
            $ges->direccion_prestador = $request->direccion_prestador;
            $ges->nombre_responsable = $request->nombre_responsable;
            $ges->rut_responsable = $request->rut_responsable;
            $ges->confirmacion_ges = $request->confirmacion_ges;
            $ges->paciente_tratamiento = $request->paciente_tratamiento;
            $ges->fecha_notificacion = $request->fecha_notificacion;
            $ges->id_paciente = $request->id_paciente_ges;

            if (!$ges->save()) {
                return back()->with('mensaje', 'Error al guardar la constancia ges');
            }

            return back()->with('mensaje', 'Constancia ges  registrada con exito');
        }
        */


}
