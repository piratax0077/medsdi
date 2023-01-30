<?php

namespace App\Http\Controllers;

use App\Models\AntConfidenciales;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesCirugias;
use App\Models\AntecedentesPaciente;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\EspecialidadMedica;
use App\Models\FichaAtencion;
use App\Models\GrupoSanguineo;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\ContactosEmergencia;

use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EscritorioPaciente extends Controller
{

    public function buscar_especialidad(Request $request)
    {
        $profesion_profesional = $request->profesion_profesional;
        $especialidades = TipoEspecialidad::where('id_especialidad', $profesion_profesional)->get();

        return json_encode($especialidades);
    }


    public function buscar_sub_especialidad(Request $request)
    {
        $especialidad = $request->especialidad;
        $sub_especialidades = SubTipoEspecialidad::where('id_tipo_especialidad', $especialidad)->get();

        return json_encode($sub_especialidades);
    }

    public function registrar_paciente(Request $request)
    {

        $paciente = new Paciente();
        $paciente->rut = $request->txt_rut;
        $paciente->nombres = $request->nombre_registro;
        $paciente->apellido_uno = $request->primer_apellido_registro;
        $paciente->apellido_dos = $request->segundo_apellido_registro;
        $paciente->fecha_nac = $request->fecha_nacimiento_registro;
        $paciente->sexo = $request->sexo_registro;
        $paciente->id_prevision = $request->prevision_registro;
        $paciente->telefono_uno = $request->telefono_registro;
        $paciente->telefono_dos = $request->telefono_dos_registro;
        $paciente->id_usuario = Auth::user()->id;
        $paciente->email = Auth::user()->email;

        if (!$paciente->save()) {
            return back()->with('error', 'Error al registrar el paciente');
        } else {
            $direccion = new Direccion();

            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            $direccion->id_ciudad = $request->id_ciudad;


            if (!$direccion->save()) {
                return back()->with('error', 'Error al registrar la dirección');
            } else {

                $paciente->id_direccion = $direccion->id;
                $paciente->save();
                return redirect()->route('paciente.home')->with('success', 'Paciente registrado correctamente');
            }
        }
    }

    public function index()
    {
        // dd(Auth::user());
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $prevision = Prevision::all();

        if (isset($paciente)) {
            return view('app.paciente.escritorio_paciente')->with('paciente', $paciente);
        }

        return view('auth.Registros.registro_paciente')->with(['region' => $region, 'prevision' => $prevision]);
    }

    public function agendarHora()
    {
        $profesiones = Especialidad::where('estado', 1)->whereNotIn('id',[8,10,11,12])->get();
        $especialidades = TipoEspecialidad::where('estado', 1)->whereNotIn('id_especialidad',[8,10,11,12])->get();
        // $sub_especialidades = SubTipoEspecialidad::where('estado', 1)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::all();
        $previsiones = Prevision::all();

        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();

        if(Auth::user()->hasRole('Paciente'))
        {
            $user = Auth::user();
            $paciente = Paciente::where('id_usuario', $user->id)->first();
            // return view('app.paciente.buscador_profesional_paciente')->with(
            return view('app.general.buscador_profesionales.buscador')->with(
                [
                    'profesiones' => $profesiones,
                    'especialidades' => $especialidades,
                    // 'sub_especialidades' => $sub_especialidades,
                    'previsiones' => $previsiones,
                    'paciente' => $paciente,
                    'regiones' => $regiones,
                    'ciudades' => $ciudades,
                    'reg_confirmacion_hora' => $reg_confirmacion_hora,

                ]
            );
        }
        else
        {
            // return view('app.paciente.buscador_profesional_paciente')->with(
            return view('app.general.buscador_profesionales.buscador')->with(
                [
                    'profesiones' => $profesiones,
                    'especialidades' => $especialidades,
                    // 'sub_especialidades' => $sub_especialidades,
                    'regiones' => $regiones,
                    'ciudades' => $ciudades

                ]
            );
        }


    }

    public function miProfesionales()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        $profesional = [];
        foreach ($fichas as $f) {
            array_push($profesional, $f->profesional()->first());
        }

        return view('app.paciente.medicos_paciente', ['profesional' => $profesional]);
    }

    public function miFichaMedica()
    {
        $id_usuario = Auth::user()->id;

        /* PACIENTE */
        $paciente = Paciente::where('id_usuario', $id_usuario)->first();
        
        list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;
        
        $edad = $ano_diferencia;
        $paciente->fecha_nac = $dia.'-'.$mes.'-'.$ano;
        $paciente->edad = $edad;

        /* CONTACTO EMERGENCIA */
        $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();
        
        if(is_object($pacientes_contacto_emergencia))
        {
            $contacto_emergencia = ContactosEmergencia::where('id',$pacientes_contacto_emergencia->id_contacto);

            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
            
            $edad = $ano_diferencia;
            $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
            $contacto_emergencia->edad = $edad;

        }else{
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

        /* ANTECEDENTES */

        $id_antecedente = $paciente->id_antecedente;

        if($id_antecedente!=null)
        {
            $antecedentes_paciente = AntecedentesPaciente::find($id_antecedente);
        }else{
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
                'id_grupo_sanguineo '=>0,
            );
        }

        /* SANGUINEO */ 

        $id_grupo_sanguineo = $antecedentes_paciente->id_grupo_sanguineo;
        if($id_grupo_sanguineo!=0)
        {
            $grupo_sanguineo = GrupoSanguineo::find($id_grupo_sanguineo);
        }else{
            $grupo_sanguineo = (object) array(
                'id'=> 0,
                'nombre_gs'=> 'N/A',
                'descripcion_gs'=> 'N/A'
            );
        }
        
        

        return view('ficha_medica', [
            'id_usuario' => $id_usuario,
            'paciente' => $paciente,
            'contacto_emergencia' => $contacto_emergencia,
            'antecedentes_paciente' => $antecedentes_paciente,
            'grupo_sanguineo' => $grupo_sanguineo

        ]);
    }

    function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }

    public function miFichaMedica2()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        return view('app.paciente.ficha_medica', ['paciente' => $paciente]);

    }


    public function recetaOnline()
    {
        return view('app.paciente.receta.inicio_receta');
    }

    /*Acceso Profecional no Inscrito*/
    public function acceso_pni()
    {
        $regiones = Region::all();
        $ciudades = Ciudad::all();
        return view('app.paciente.acceso_profesional_no_inscrito')->with(['regiones' => $regiones, 'ciudades' => $ciudades]);
    }

    public function perfil()
    {


        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $previsiones = Prevision::all();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->direccion()->first()->ciudad()->first()->Region()->first()->id)->get();
        $contacto = $paciente->ContactosEmergencia()->get();

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

        $fichasConfi = FichaAtencion::where('id_paciente', $paciente->id)->where('confidencial', true)->get();
        $grupo_sanguineo = GrupoSanguineo::all();

        return view(
            'app.paciente.perfil_paciente',
            [
                'paciente' => $paciente,
                'previsiones' => $previsiones,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
                'contacto' => $contacto,
                'alergias' => $alergias,
                'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'antecedentes_cirugias' => $antecedentes_cirugias,
                'ant_confidenciales' => $ant_confidenciales,
                //'organosDonar'=>$organosDonar,
                'patoligias_cronicas' => $patoligias_cronicas,
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'grupo_sanguineo' => $grupo_sanguineo,
            ]
        );
    }

    public function rompeclave()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $direcion = $paciente->Direccion()->first();

        return view('app.paciente.perfil_paciente', ['paciente' => $paciente, 'direcion' => $direcion]);
    }

    public function subcripcion()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $direcion = $paciente->Direccion()->first();

        return view('app.paciente.perfil_paciente', ['paciente' => $paciente, 'direcion' => $direcion]);
    }

    /* Reservar Hora Médica */
    public function getEspecialidad(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $especialidades = Especialidad::all();
        $previsiones = Prevision::all();
        $regiones = Region::all();
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        $profesion_profesional = $request->profesion_profesional;
        $esp = $request->especialidad;
        $sub_especialidad = $request->sub_especialidad;
        $ciudad_paciente = $request->ciudad_paciente;
        // dd($request->all());

        if ($ciudad_paciente != '0') {

            // ->
            $profesionales = Profesional::select(
                [
                    'profesionales.id',
                    'profesionales.nombre',
                    'profesionales.apellido_uno',
                    'profesionales.apellido_dos',
                    'e.nombre as especialidad',
                    'se.nombre as sub_tipo_especialidad',
                    'te.nombre as tipo_especialidad',
                    'h.id as id_horario',
                    'h.hora_inicio',
                    'h.hora_termino',
                    'h.dia',
                    'hm.hora_inicio as hora_inicio_consulta',
                    'hm.hora_termino as hora_termino_consulta',
                ]
            )->leftjoin('profesionales_lugares_atencion as la', 'la.id_profesional', '=', 'profesionales.id')
                ->leftjoin('lugares_atencion as l', 'l.id', '=', 'la.id_lugar_atencion')
                ->join('direcciones as d', 'd.id', '=', 'l.id_direccion')
                ->join('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                ->leftjoin('profesional_horarios as h', 'h.id_profesional', '=', 'profesionales.id', 'and', 'h.id_lugar_atencion', '=', 'la.id')
                ->leftjoin('horas_medicas as hm', 'hm.id_profesional', '=', 'h.id_profesional')
                ->where('d.id_ciudad', $ciudad_paciente)
                ->get();


            foreach ($profesionales as $p) {

                $dias_atencion =  ProfesionalHorario::select(
                    [
                        'dia',
                    ]
                )
                    ->where('id_profesional', $p->id)
                    ->get();

                $p->dias_atencion = $dias_atencion;
            }




            // dd($profesionales);

            // $lugares_atencion = LugarAtencion::where('id_ciudad', $ciudad_paciente)->get();
            // $lugares_atencion_array = [];
            // foreach ($lugares_atencion as $lugar) {
            //     $profesionales = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugar->id)->get();
            //     dd($profesionales);
            //     array_push($lugares_atencion_array, $lugar->id);
            // }
            // $profesionales = Profesional::where('', $sub_especialidad)->get();
        } else {
            if ($sub_especialidad != '0') {
                $profesionales = Profesional::select(
                    [
                        'profesionales.nombre',
                        'profesionales.apellido_uno',
                        'profesionales.apellido_dos',
                        'e.nombre as especialidad',
                        'se.nombre as sub_tipo_especialidad',
                        'te.nombre as tipo_especialidad',
                    ]
                )->join('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                    ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                    ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                    ->where('profesionales.id_sub_tipo_especialidad', $sub_especialidad)->get();
            } else {
                if ($esp != '0') {
                    // $profesionales = Profesional::where('profesionales.id_especialidad', $esp)->get();

                    $profesionales = Profesional::select(
                        [
                            'profesionales.nombre',
                            'profesionales.apellido_uno',
                            'profesionales.apellido_dos',
                            'e.nombre as especialidad',
                            'se.nombre as sub_tipo_especialidad',
                            'te.nombre as tipo_especialidad',
                        ]
                    )->leftjoin('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                        ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                        ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                        ->where('profesionales.id_tipo_especialidad', $esp)->get();
                } else {
                    $profesionales = Profesional::select(
                        [
                            'profesionales.nombre',
                            'profesionales.apellido_uno',
                            'profesionales.apellido_dos',
                            'e.nombre as especialidad',
                            'se.nombre as sub_tipo_especialidad',
                            'te.nombre as tipo_especialidad',
                        ]
                    )->join('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                        ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                        ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                        ->where('profesionales.id_especialidad', $profesion_profesional)->get();
                }
            }
        }

        return view(
            'app.paciente.buscador_profesional_paciente',
            [
                'profesionales' => $profesionales,
                'especialidades' => $especialidades,
                'previsiones' => $previsiones,
                'regiones' => $regiones,
                'paciente' => $paciente
            ]
        );
    }

    public function getProfesional(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $this->validate($request, [
            'nombrerut_profesional' => 'required',
            'comuna_paciente2' => 'required|between:2,999',
        ]);

        $nombrerut = (isset($request->nombrerut_profesional)) ? $request->nombrerut_profesional : null;
        $comuna = (isset($request->comuna_paciente2)) ? $request->comuna_paciente2 : null;

        $profesional = Profesional::where(function ($query) use ($nombrerut) {
            $query->where('nombre', 'like', '%' . $nombrerut . '%')->orWhere('rut', '=', $nombrerut);
        })->get();

        return view('app.paciente.buscador_profesional_paciente', ['profesional' => $profesional]);
    }

    public function getVideoConsulta(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $this->validate($request, [
            'especialidad_profesional3' => 'required',
            'convenios3' => 'required|between:2,999',
            'comuna_paciente3' => 'required|between:2,999',
        ]);

        $especialidad = (isset($request->especialidad_profesional3)) ? $request->especialidad_profesional3 : null;
        $convenios = (isset($request->convenios3)) ? $request->convenios3 : null;
        $comuna = (isset($request->comuna_paciente3)) ? $request->comuna_paciente3 : null;

        $Especialidad = Especialidad::where('nombre', 'like', '%' . $especialidad . '%')->get();
        $profesional = [];
        foreach ($Especialidad as $e) {
            if (isset($e->id)) {
                foreach ($e->Profesionales()->get() as $p) {
                    array_push($profesional, $p);
                }
            }
        }

        return view('app.paciente.buscador_profesional_paciente', ['profesional' => $profesional]);
    }

    /* Receta Online*/
    public function receta_misrecetas()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        return view('app.paciente.receta.mis_recetas', ['fichas' => $fichas]);
    }

    public function receta_misexamenes()
    {
        return view('app.paciente.receta.mis_examenes');
    }

    public function receta_miscertificados()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        return view('app.paciente.receta.mis_certificados', ['fichas' => $fichas]);
    }

    public function receta_mislicencias()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        return view('app.paciente.receta.mis_licencias', ['fichas' => $fichas]);
    }

    /* Perfil */
    public function editInfor(Request $request)
    {

        // $this->validate($request, [
        //     'perfil_nombre' => 'required',
        //     'perfil_apellido_uno' => 'required',
        //     'perfil_apellido_dos' => 'required',
        //     'perfil_sexo' => 'required',
        //     'perfil_nac' => 'required|date',
        //     'perfil_prevision' => 'required|between:2,999',
        // ]);



        $nombre = (isset($request->perfil_nombre)) ? $request->perfil_nombre : null;
        $apellido_uno = (isset($request->perfil_apellido_uno)) ? $request->perfil_apellido_uno : null;
        $apellido_dos = (isset($request->perfil_apellido_dos)) ? $request->perfil_apellido_dos : null;
        $sexo = (isset($request->perfil_sexo)) ? $request->perfil_sexo : null;
        $fecha_nac = (isset($request->perfil_nac)) ? $request->perfil_nac : null;
        $prevision = (isset($request->perfil_prevision)) ? $request->perfil_prevision : null;


        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $paciente->nombres = $nombre;
        $paciente->apellido_uno = $apellido_uno;
        $paciente->apellido_dos = $apellido_dos;
        $paciente->sexo = $sexo;
        $paciente->fecha_nac = $fecha_nac;
        $paciente->id_prevision = $prevision;
        $paciente->save();

        return json_encode(['success' => true]);

        // return redirect()->route('paciente.perfil');
    }

    public function editcontacto(Request $request)
    {
        // $this->validate($request, [
        //     'Perfil_email' => 'required|email',
        //     'Perfil_fono' => 'required',
        // ]);

        $email = (isset($request->perfil_email)) ? $request->perfil_email : null;
        $fono = (isset($request->perfil_fono)) ? $request->perfil_fono : null;

        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $paciente->email = $email;
        $paciente->telefono_uno = $fono;
        $paciente->save();
        return json_encode(['success' => true]);

        // return redirect()->route('paciente.perfil');
    }

    public function editdirec(Request $request)
    {
        // $this->validate($request, [
        //     'perfil_dire' => 'required',
        //     'perfil_comuna' => 'required|between:2,999',
        // ]);

        $perfil_dire = (isset($request->perfil_dire)) ? $request->perfil_dire : null;
        $ciudad = (isset($request->perfil_ciudad)) ? $request->perfil_ciudad : null;
        $numero_dir = (isset($request->perfil_numero_dir)) ? $request->perfil_numero_dir : null;
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $direccion = Direccion::where('id', $paciente->id_direccion)->first();

        $direccion->direccion = $perfil_dire;
        $direccion->numero_dir = $numero_dir;
        $direccion->id_ciudad = $ciudad;


        $direccion->save();

        return json_encode(['success' => true]);
        // return redirect()->route('paciente.perfil');
    }

    //Falta revisar el modelo y valdiaciones
    public function crearcontacto(Request $request)
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        $contacto = new ContactoEmergencia();
        $contacto->rut_contacto = $request->rut_paciente;
        $contacto->nombre_contacto = $request->nombres_paciente;
        $contacto->apellido_uno_contacto = $request->apellidos_paciente;
        $contacto->apellido_dos_contacto = $request->apellidos_paciente;
        $contacto->direccion_contacto = $request->direccion_paciente;
        $contacto->ciudad_contacto = $request->comuna_paciente;
        $contacto->telefono_uno_contacto = $request->telefono_paciente;

        $contacto->fecha_nac_contacto = Carbon::now();
        $contacto->region_contacto = 'algo';
        $contacto->telefono_dos_contacto = 111;
        $contacto->save();

        $paciente->Contacto_emergencia()->attach($contacto);

        return redirect()->route('paciente.perfil');
    }

    public function getPacienteUser()
    {
        $datos = array();

        $paciente = Paciente::where('id_usuario', Auth::user()->id)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();

        if($paciente)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Registros';
            $datos['registro'] = $paciente;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;
    }

    public function agendar_horas(Request $request)
    {
        $datos = array();
        $valido = 1;

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $lugar_atencion = LugarAtencion::where('id', $request->id_lugar_atencion)->first();

        // validar si paciente tiene otra consulta
        $validar = HoraMedica::where('id_paciente', $paciente->id)
                ->where('id_profesional',$profesional->id)
                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                ->first();
        if($validar)
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Paciente ya tiene Hora para este dia';
            $valido = 0;
            return json_encode(array(
                'estado' => 'error',
                'id_profesional' => $profesional->id,
                'msj' => 'Paciente ya tiene Hora para este dia'
            ));
        }

        if($valido)
        {
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
            $hora_medica->id_asistente = $request->id_asistente;
            $hora_medica->id_estado = '1';
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');
            $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
            // $hora_medica->origen = $request->origen;

            if ($hora_medica->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Hora Reservada';
                $datos['registro'] = array(
                    'fecha' => \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'),
                    'hora' => \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s'),
                    'profesional' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos ,
                    'lugar_atencion' => $lugar_atencion->nombre,
                );
            }
        }


        // $details = [
        //     'title' => 'Hora medica Reservada',
        //     'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
        //             Junto con saludar, por medio de este correo le informamos que se ha reservado su hora con exito <br>' .
        //         'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
        //         'Hora : ' . $hora_medica->hora_inicio . '<br>' .
        //         'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
        //         'Que tenga un excelente día. </br></br>' .
        //         'Saludos.',
        // ];

        //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

        return json_encode($hora_medica);
    }
}
