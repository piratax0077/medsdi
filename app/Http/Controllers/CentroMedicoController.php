<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\ProcedimientosCentro;
use Illuminate\Support\Facades\Auth;
use App\Models\AcompananteDependiente;
use App\Models\Instituciones;
use App\Models\Sucursal;
use App\Models\SucursalHorario;
use App\Models\Profesional;
use App\Models\ProfesionalHorario;
use App\Models\HoraMedica;
use App\Events\HoraMedicaUpdated;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\TipoEspecialidad;
use App\Models\SubTipoEspecialidad;
use App\Models\Direccion;
use App\Models\LugarAtencion;
use App\Models\Prevision;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CentroMedicoController extends Controller
{
    //
    public function buscarProfesional(Request $req){

        $id_lugar_atencion = $req->id_centro_medico;

        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();

        $especialidades = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::find($p->id_profesional);
            if($profesional){
                $especialidad = Especialidad::find($profesional->id_especialidad);
                array_push($especialidades, $especialidad);
            }
        }
        return array_values(array_unique($especialidades));
    }

    public function buscarEspecialidades(Request $req){
        $id_especialidad = $req->id_profesion;
        $id_lugar_atencion = $req->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $tipos_especialidad = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_especialidad', $id_especialidad)->first();
            if($profesional){
                $especialidad = TipoEspecialidad::find($profesional->id_tipo_especialidad);
                array_push($tipos_especialidad, $especialidad);
            }
        }
        return array_values(array_unique($tipos_especialidad));
    }

    public function buscarSubEspecialidades(Request $req){
        $id_tipo_especialidad = $req->id_tipo_especialidad;

        $id_lugar_atencion = $req->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $sub_tipos_especialidad = [];
        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_tipo_especialidad', $id_tipo_especialidad)->first();
            if($profesional){
                $especialidad = SubTipoEspecialidad::find($profesional->id_sub_tipo_especialidad);
                if($especialidad){
                    array_push($sub_tipos_especialidad, $especialidad);
                }else{
                    array_push($profesionales, $profesional);
                }

            }
        }
        if(count($sub_tipos_especialidad) > 0){
            $valores = array_values(array_unique($sub_tipos_especialidad));
            return ['value' => 'tipos_especialidades', 'tipos_especialidades' => $valores ];
        }else{
            $valores = array_values(array_unique($profesionales));
            return ['value' => 'profesionales', 'profesionales' => $valores];
        }

    }

    public function buscarProfesionales(Request $req){

        $id_lugar_atencion = $req->id_lugar_atencion;
        $id_profesion = $req->id_profesion;
        $id_especialidad = $req->id_especialidad;
        $id_tipo_especialidad = $req->id_tipo_especialidad;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_especialidad',$id_profesion)->where('id_tipo_especialidad', $id_especialidad)->where('id_sub_tipo_especialidad',$id_tipo_especialidad)->first();
            if($profesional){
                array_push($profesionales, $profesional);
            }


        }
        $result = array_values(array_unique($profesionales));

        return ['profesionales' => $profesionales];
    }

    public function obtenerDatosPacientePorRut(Request $request){

        $datos = array();
        if(empty($request->id_dependiente_activo))
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();
        }
        else
        {
            $paciente = Paciente::where('id', $request->id_dependiente_activo)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();

            /** BUSCAR INFORMACION DE DEPENDIENTES */
            $info_depen = PacientesDependientes::where('id_paciente', $paciente->id)->first();

            if($info_depen)
            {
                /** BUSCAR RESPONSABLES */
                $filtro_temp = array();
                $filtro_temp[] = array('id_dependiente', $info_depen->id_paciente);
                $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
                $registro_temp = AcompananteDependiente::where('id_responsable', $info_depen->id_responsable)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
                $paciente['acompanante'] = $registro_temp;

                /** BUSCAR REPRESENTANTE */
                // $registro_representante = Paciente::where('id_usuario', Auth::user()->id)->first();
                // $paciente['representante'] = $registro_representante;
            }
            else
            {
                $paciente['acompanante'] = null;
                $paciente['representante'] = null;
            }

            $paciente['edad'] = $this->obtener_edad_segun_fecha($paciente->fecha_nac);
        }


        if($paciente)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Registros';
            $datos['registro'] = $paciente;
            $datos['profesional'] = Profesional::where('id', $request->id_profesional)
                                                ->with('Especialidad')
                                                ->with('TipoEspecialidad')
                                                ->with('SubTipoEspecialidad')
                                                ->first();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;
    }

    public function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $fecha_actual = new \DateTime();
        $fecha_nac = new \DateTime($fecha_nacimiento);
        $edad = $fecha_actual->diff($fecha_nac);
        return $edad->y;
    }

    public function confirmarReserva(Request $request)
    {
        try {
            $profesional = Profesional::find($request->id_profesional);
            if (!$profesional) return ['estado' => 0, 'msj' => 'Profesional no encontrado'];

            $paciente = Paciente::find($request->id_paciente);
            if (!$paciente) return ['estado' => 0, 'msj' => 'Paciente no encontrado'];

            // Obtener duración de consulta desde el horario del profesional
            $dia_de_semana = Carbon::parse($request->fecha_consulta)->format('w');
            $profesional_horarios = ProfesionalHorario::where('id_profesional', $profesional->id)
                ->where('id_lugar_atencion', $request->id_lugar_atencion)
                ->where('dia', 'like', '%' . $dia_de_semana . '%')
                ->first();

            $tiempo_consulta = 30; // default 30 minutos
            if ($profesional_horarios && $profesional_horarios->duracion_consulta) {
                $horas   = date('H', strtotime($profesional_horarios->duracion_consulta));
                $minutos = date('i', strtotime($profesional_horarios->duracion_consulta));
                $tiempo_consulta = ($horas * 60) + $minutos;
            }

            $hora_medica = new HoraMedica();
            $hora_medica->id_paciente       = $paciente->id;
            $hora_medica->id_profesional    = $profesional->id;
            $hora_medica->id_asistente      = null;
            $hora_medica->id_estado         = 1;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
            $hora_medica->fecha_consulta    = Carbon::parse($request->fecha_consulta)->format('Y-m-d');
            $hora_medica->hora_inicio       = $request->hora_consulta;
            $hora_medica->hora_termino      = Carbon::parse($request->hora_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');
            $hora_medica->tipo_hora_medica  = 'C';
            $hora_medica->alias_examen      = 'Consulta';
            $hora_medica->descripcion       = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

            if ($hora_medica->save()) {
                // Enviar correo si el paciente tiene email real
                if (!empty($paciente->email) && strpos($paciente->email, '@med-sdi.cl') === false) {
                    $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);
                    $blade  = 'hora_agendada';
                    $to     = [['email' => $paciente->email, 'name' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos]];
                    $asunto = 'MED-SDI - Nueva Hora Agendada';
                    $body   = [
                        'nombre_paciente'                   => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                        'fecha'                             => $hora_medica->fecha_consulta,
                        'hora'                              => $hora_medica->hora_inicio,
                        'profesional_nombre'                => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                        'profesional_especialidad'          => $profesional->Especialidad()->first() ? $profesional->Especialidad()->first()->nombre : '',
                        'profesional_tipo_especialidad'     => $profesional->TipoEspecialidad()->first() ? $profesional->TipoEspecialidad()->first()->nombre : '',
                        'profesional_sub_tipo_especialidad' => $profesional->subTipoEspecialidad()->exists() ? $profesional->subTipoEspecialidad()->first()->nombre : '',
                        'lugar_atencion'                    => $lugar_atencion ? $lugar_atencion->nombre : '',
                        'direccion'                         => '',
                    ];
                    SendMailController::envioCorreo($blade, $to, [], [], $asunto, $body, '', '');
                }
                return ['estado' => 1, 'msj' => 'Hora agendada exitosamente'];
            }

            return ['estado' => 0, 'msj' => 'Error al guardar la hora médica'];

        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function buscarExamenes(Request $request){
        $examenes = ProcedimientosCentro::where('id_lugar_atencion', $request->id_centro_medico)->get();
        return $examenes;
    }

    public function buscarSucursalesLaboratorio(Request $request){
        $institucion = Instituciones::where('id_lugar_atencion', $request->id_laboratorio)->first();
        $sucursales = Sucursal::where('id_institucion', $institucion->id)->get();
        return $sucursales;
    }

    public function buscarProfesionalesExamen(Request $request){

        $sucursal = Sucursal::where('id', $request->id_sucursal)->first();
        $institucion = Instituciones::where('id', $sucursal->id_institucion)->first();

        $id_examen = $request->id_examen;
        $id_lugar_atencion = $institucion->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();

        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->first();
            if($profesional){
                array_push($profesionales, $profesional);
            }
        }
        return ['profesionales' => $profesionales];
    }

    public function horasExamenProfesionalLugarAtencion(Request $request){
        $datos = array();
        $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
        $horario = SucursalHorario::where('id_institucion', $institucion->id)
                                        // ->where('id_lugar_atencion', $request->lugar_atencion)
                                        // ->tipoAgenda($request->tipo_agenda)
                                        ->orderBy('dia', 'ASC')
                                        ->get();

        $dias_no_laborales = ['1','2','3','4','5','6','7'];
        $dias_laborales = [];

        foreach ($horario as $hor) {
            $ho = explode(',', $hor->dia);
            foreach ($ho as $h) {
                $h = trim($h);
                // Agregar a días laborales si no está ya
                if (!in_array($h, $dias_laborales)) {
                    $dias_laborales[] = $h;
                }

                // Quitar de los días no laborales si está presente
                if (($key = array_search($h, $dias_no_laborales)) !== false) {
                    unset($dias_no_laborales[$key]);
                }
            }
        }

        // Ordenar los arrays si quieres mantener un orden consistente
        sort($dias_laborales);
        sort($dias_no_laborales);

        $horario_agenda_laboral = implode(',', $dias_laborales);
        $horario_agenda_no_laboral = implode(',', $dias_no_laborales);

        $datos['estado'] = 1;
        $datos['msj'] = 'registros';
        $datos['registros'] = array(
            'horario_agenda_laboral' => $horario_agenda_laboral,
            'horario_agenda_no_laboral' => $horario_agenda_no_laboral
        );

        return $datos;
    }

    public function confirmarReservaExamen(Request $request)
    {
        try {

            $profesional = Profesional::find($request->id_profesional);
            if (!$profesional) return ['estado' => 0, 'msj' => 'Profesional no encontrado'];

            $paciente = Paciente::find($request->id_paciente);
            if (!$paciente) return ['estado' => 0, 'msj' => 'Paciente no encontrado'];

            $fecha_examen  = Carbon::parse($request->fecha_examen)->format('Y-m-d');
            $hora_examen   = Carbon::parse($request->hora_examen)->format('H:i:s');

            // Decodificar id_tipo_examen (puede llegar como JSON string o array)
            $tipos_raw = $request->id_tipo_examen;
            if (is_string($tipos_raw)) {
                $tipos_raw = json_decode($tipos_raw, true) ?? [];
            }
            $examenes_string = implode(',', array_filter((array) $tipos_raw));

            // Validar que el paciente no tenga ya un examen/hora en esa misma fecha con ese profesional
            $duplicado = HoraMedica::where('id_paciente', $paciente->id)
                ->whereIn('id_estado', [1, 2, 4, 5, 6, 8])
                ->where('id_profesional', $profesional->id)
                ->where('id_lugar_atencion', $request->id_lugar_atencion)
                ->where('fecha_consulta', $fecha_examen)
                ->first();

            if ($duplicado) {
                return ['estado' => 0, 'msj' => 'El paciente ya tiene una hora agendada para este profesional en esta fecha'];
            }

            // Validar cruce de horario
            $crucePrevio = HoraMedica::where('id_paciente', $paciente->id)
                ->whereIn('id_estado', [1, 2, 4, 5, 6, 8])
                ->where('fecha_consulta', $fecha_examen)
                ->where(function ($query) use ($hora_examen) {
                    $query->whereTime('hora_inicio', '<=', $hora_examen)
                          ->whereTime('hora_termino', '>=', $hora_examen);
                })
                ->first();

            if ($crucePrevio) {
                return ['estado' => 0, 'msj' => 'El paciente ya tiene una hora agendada en ese horario'];
            }

            // Calcular duración: total_bloques * 15 min. Si hay horario configurado, usar ese valor.
            $proc_bloque      = max(1, intval($request->total_bloques ?? 1));
            $tiempo_consulta  = $proc_bloque * 15;

            $dia_semana = Carbon::parse($fecha_examen)->format('w');
            $horario    = ProfesionalHorario::where('id_profesional', $profesional->id)
                ->where('id_lugar_atencion', $request->id_lugar_atencion)
                ->where('dia', 'like', '%' . $dia_semana . '%')
                ->first();

            if ($horario && $horario->duracion_consulta) {
                $horas   = date('H', strtotime($horario->duracion_consulta));
                $minutos = date('i', strtotime($horario->duracion_consulta));
                // Usar duración de horario si es > 0, multiplicada por los bloques
                $duracion_base = ($horas * 60) + $minutos;
                if ($duracion_base > 0) {
                    $tiempo_consulta = $duracion_base * $proc_bloque;
                }
            }

            $hora_medica                  = new HoraMedica();
            $hora_medica->id_paciente     = $paciente->id;
            $hora_medica->id_profesional  = $profesional->id;
            $hora_medica->id_asistente    = null;
            $hora_medica->id_box          = 6; // Box por defecto para exámenes
            $hora_medica->id_procedimiento = $examenes_string ?: null;
            $hora_medica->id_estado       = 1;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
            $hora_medica->fecha_consulta  = $fecha_examen;
            $hora_medica->hora_inicio     = $hora_examen;
            $hora_medica->hora_termino    = Carbon::parse($hora_examen)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');
            $hora_medica->tipo_hora_medica = 'E';
            $hora_medica->alias_examen    = 'Examen';
            $hora_medica->descripcion     = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

            if (!$hora_medica->save()) {
                return ['estado' => 0, 'msj' => 'Error al guardar la reserva de examen'];
            }

            // Enviar correo de confirmación si el paciente tiene email real
            if (!empty($paciente->email) && strpos($paciente->email, '@med-sdi.cl') === false) {
                $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);
                $blade  = 'hora_agendada';
                $to     = [['email' => $paciente->email, 'name' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos]];
                $asunto = 'MED-SDI - Nueva Hora de Examen Agendada';
                $body   = [
                    'nombre_paciente'                   => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                    'fecha'                             => $hora_medica->fecha_consulta,
                    'hora'                              => $hora_medica->hora_inicio,
                    'profesional_nombre'                => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                    'profesional_especialidad'          => $profesional->Especialidad()->first() ? $profesional->Especialidad()->first()->nombre : '',
                    'profesional_tipo_especialidad'     => $profesional->TipoEspecialidad()->first() ? $profesional->TipoEspecialidad()->first()->nombre : '',
                    'profesional_sub_tipo_especialidad' => $profesional->subTipoEspecialidad()->exists() ? $profesional->subTipoEspecialidad()->first()->nombre : '',
                    'lugar_atencion'                    => $lugar_atencion ? $lugar_atencion->nombre : '',
                    'direccion'                         => '',
                ];
                SendMailController::envioCorreo($blade, $to, [], [], $asunto, $body, '', '');
            }

            return ['estado' => 1, 'msj' => 'Reserva de examen confirmada exitosamente', 'id_hora_medica' => $hora_medica->id];

        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    /**
     * Agenda una hora médica para un NUEVO paciente desde la página pública del INSI.
     * Basado en EscritorioAsistente::agendar_hora_nuevo_paciente.
     */
    public function agendarHoraPacientePublico(Request $request)
    {
        try {
            $emailIngresado = trim((string) $request->email);

            // Verificar que el email no esté en uso
            if (!empty($emailIngresado)) {
                $emailEnUso = Paciente::where(DB::raw('UPPER(email)'), mb_strtoupper($emailIngresado))->count();
                if ($emailEnUso > 0) {
                    return ['estado' => 0, 'msj' => 'El correo ya está siendo utilizado por otro paciente.'];
                }
            }

            $profesional = Profesional::find($request->id_profesional);
            if (!$profesional) return ['estado' => 0, 'msj' => 'Profesional no encontrado'];

            // Crear dirección
            $direccion             = new Direccion();
            $direccion->direccion  = $request->direccion;
            $direccion->numero_dir = $request->numero_dir ?? 'S/N';
            $direccion->id_ciudad  = $request->id_ciudad;
            $direccion->save();

            // Crear paciente
            $paciente               = new Paciente();
            $paciente->rut          = $request->rut_paciente;
            $paciente->nombres      = $request->nombres;
            $paciente->apellido_uno = $request->apellido_uno;
            $paciente->apellido_dos = $request->apellido_dos ?? '';
            $paciente->sexo         = $request->sexo;

            try {
                if (strpos($request->fecha_nac, '/') !== false) {
                    $fechaConvertida = Carbon::createFromFormat('d/m/Y', $request->fecha_nac)->format('Y-m-d');
                } else {
                    $fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->fecha_nac)->format('Y-m-d');
                }
            } catch (\Exception $e) {
                return ['estado' => 0, 'msj' => 'Formato de fecha de nacimiento inválido'];
            }

            $paciente->fecha_nac    = $fechaConvertida;
            $edad                   = Carbon::parse($fechaConvertida)->age;
            $paciente->id_prevision = $request->id_convenio ?? null;

            if (!empty($emailIngresado)) {
                $paciente->email = $emailIngresado;
            } else {
                $paciente->email = PacienteController::generarEmailPacienteTemporal(
                    $request->nombres, $request->apellido_uno, $request->apellido_dos ?? ''
                );
            }

            $paciente->telefono_uno = !empty($request->telefono) ? $request->telefono : '569';
            $paciente->id_direccion = $direccion->id;

            if (!$paciente->save()) {
                return ['estado' => 0, 'msj' => 'Error al registrar el paciente'];
            }

            // Crear cuenta de usuario para mayores de edad
            if ($edad >= 18) {
                $existingUser = User::where(DB::raw('UPPER(email)'), mb_strtoupper($paciente->email))->first();
                if (!$existingUser) {
                    $user        = new User();
                    $user->name  = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
                    $user->email = (strpos($paciente->email, '@med-sdi.cl') !== false)
                        ? str_replace(['.', '-', ' '], '', $paciente->rut)
                        : $paciente->email;
                    $pass_temp      = random_int(1111, 9999);
                    $user->password = Hash::make($pass_temp);
                    if ($user->save()) {
                        $user->assignRole('Paciente');
                        $paciente->id_usuario = $user->id;
                        $paciente->save();
                    }
                }
            }

            // Obtener duración de consulta
            $dia_de_semana = Carbon::parse($request->fecha_consulta)->format('w');
            $profesional_horarios = ProfesionalHorario::where('id_profesional', $profesional->id)
                ->where('id_lugar_atencion', $request->id_lugar_atencion)
                ->where('dia', 'like', '%' . $dia_de_semana . '%')
                ->first();

            $tiempo_consulta = 30;
            if ($profesional_horarios && $profesional_horarios->duracion_consulta) {
                $horas   = date('H', strtotime($profesional_horarios->duracion_consulta));
                $minutos = date('i', strtotime($profesional_horarios->duracion_consulta));
                $tiempo_consulta = ($horas * 60) + $minutos;
            }

            // Crear hora médica
            $hora_medica = new HoraMedica();
            $hora_medica->id_paciente       = $paciente->id;
            $hora_medica->id_profesional    = $profesional->id;
            $hora_medica->id_asistente      = null;
            $hora_medica->id_estado         = 1;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
            $hora_medica->fecha_consulta    = Carbon::parse($request->fecha_consulta)->format('Y-m-d');
            $hora_medica->hora_inicio       = $request->hora_consulta;
            $hora_medica->hora_termino      = Carbon::parse($request->hora_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');
            $hora_medica->tipo_hora_medica  = $request->tipo_hora_medica ?? 'C';
            $hora_medica->alias_examen      = 'Consulta';
            $hora_medica->descripcion       = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

            if ($hora_medica->save()) {
                // emitir evento pusher
                event(new HoraMedicaUpdated('create', $hora_medica));
                // Enviar correo si el paciente tiene email real
                if (!empty($emailIngresado) && strpos($paciente->email, '@med-sdi.cl') === false) {
                    $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);
                    $blade  = 'hora_agendada';
                    $to     = [['email' => $paciente->email, 'name' => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos]];
                    $asunto = 'MED-SDI - Nueva Hora Agendada';
                    $body   = [
                        'nombre_paciente'                   => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                        'fecha'                             => $hora_medica->fecha_consulta,
                        'hora'                              => $hora_medica->hora_inicio,
                        'profesional_nombre'                => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                        'profesional_especialidad'          => $profesional->Especialidad()->first() ? $profesional->Especialidad()->first()->nombre : '',
                        'profesional_tipo_especialidad'     => $profesional->TipoEspecialidad()->first() ? $profesional->TipoEspecialidad()->first()->nombre : '',
                        'profesional_sub_tipo_especialidad' => $profesional->subTipoEspecialidad()->exists() ? $profesional->subTipoEspecialidad()->first()->nombre : '',
                        'lugar_atencion'                    => $lugar_atencion ? $lugar_atencion->nombre : '',
                        'direccion'                         => '',
                    ];
                    SendMailController::envioCorreo($blade, $to, [], [], $asunto, $body, '', '');
                }
                return ['estado' => 1, 'msj' => 'Paciente registrado y hora agendada exitosamente', 'id_paciente' => $paciente->id];
            }

            return ['estado' => 0, 'msj' => 'Error al guardar la hora médica'];

        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function damePrevisiones()
    {
        return Prevision::orderBy('nombre')->get();
    }

}

