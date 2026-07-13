<?php

namespace App\Http\Controllers;

use App\Models\HoraMedica;
use App\Models\JitsiVideo;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Services\Mensajeria\MensajeriaService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JitsiController extends Controller
{

    public function index($id, $nombre)
    {
        $error = '';
        $token_invitado = '';
        $registro = JitsiVideo::where('nombre_grupo', $nombre)->get()->first();
        // var_dump( $nombre ) ;
        // var_dump( $registro ) ;
        // die();
        if($registro)
        {
            $token_invitado = $registro->$token_invitado;
        }
        else
        {
            $error = 'Link de llamada no valido';
        }

        return view('videollamada')->with([
            'id' => $id,
            'nombre' => $nombre,
            'error' => $error,
            'token_invitado' => $token_invitado,
        ]);
    }
    /** REGISTRO DE LLAMADA CON JITSI */
    public function registrar_r( Request $request )
    {
        return static::registrar( $request->id_profesional,
                                    $request->id_paciente,
                                    $request->nombre_grupo,
                                    $request->token,
                                    $request->token_inicio,
                                    $request->token_termino,
                                    $request->llamada_inicio,
                                    $request->llamada_termino,
                                    $request->estado );

    }

    static public function registrar( $id_profesional, $id_paciente, $nombre_grupo, $token_moderator, $token_invitado, $hora_inicio, $hora_termino, $llamada_inicio, $llamada_termino)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if( empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if( empty($nombre_grupo))
        {
            $error['nombre_grupo'] = 'campo requerido';
            $valido = 0;
        }

        // if( empty($token_moderator))
        // {
        //     $error['token_moderator'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($token_invitado))
        // {
        //     $error['token_invitado'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($hora_inicio))
        // {
        //     $error['hora_inicio'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($hora_termino))
        // {
        //     $error['hora_termino'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($llamada_inicio))
        // {
        //     $error['llamada_inicio'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($llamada_termino))
        // {
        //     $error['llamada_termino'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( $estado == '')
        // {
        //     $error['estado'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {

            $registros = new JitsiVideo();

            $registros->id_profesional = $id_profesional;
            $registros->id_paciente = $id_paciente;
            $registros->nombre_grupo = $nombre_grupo;
            $registros->token_moderator = $token_moderator;
            $registros->token_invitado = $token_invitado;
            $registros->hora_inicio = $hora_inicio;
            $registros->hora_termino = $hora_termino;
            if(!empty($llamada_inicio))
                $registros->llamada_inicio = $llamada_inicio;
            if(!empty($llamada_termino))
                $registros->llamada_termino = $llamada_termino;
            $registros->estado = 1;

            if($registros->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['last_id'] = $registros->id;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'capos requeridos';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }


    public function generarJWT_r(Request $request)
    {
        return $this->generarJWT(   $request->id_lugar_atencion,
                                    $request->id_usuario,
                                    $request->nombre_usuario,
                                    $request->imagen_usuario,
                                    $request->correo_usuario,
                                    $request->moderador,
                                    $request->nombre_profesional,
                                    $request->nombre_paciente,
                                    $request->fecha_inicio
                                );

    }
    /** GENERAR JWT */
    /**
     * @param $id_lugar_atencion int
     * @param $id_usuario int
     * @param $nombre_usuario string
     * @param $imagen_usuario string
     * @param $correo_usuario string
     * @param $moderador boolean
     * @param $nombre_profesional string
     * @param $nombre_paciente string
     * @param $fecha_inicio dateTime 2024-09-19 16:31:01
     */
    static public function generarJWT($id_lugar_atencion, $id_usuario, $nombre_usuario, $imagen_usuario, $correo_usuario, $moderador, $nombre_profesional, $nombre_paciente, $fecha_inicio)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($id_usuario))
        {
            $error['id_usuario'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_usuario))
        {
            $error['nombre_usuario'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($imagen_usuario))
        // {
        //     $error['imagen_usuario'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($correo_usuario))
        {
            $error['correo_usuario'] = 'campo requerido';
            $valido = 0;
        }

        if(!isset($moderador))
        {
            $error['moderador'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_profesional))
        {
            $error['nombre_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_paciente))
        {
            $error['nombre_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($fecha_inicio))
        {
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $app_id = env('JITSI_APP_ID');
            $api_key = env('JITSI_API_KEY');

            // $inicio = strtotime("2024-09-19 16:31:01");
            // $inicio = strtotime("now");
            $inicio = strtotime($fecha_inicio);
            // $termino = strtotime($inicio)+strtotime("2024-09-19 18:30:00");
            $termino = strtotime ( '+90 minute' , $inicio );
            // $termino = strtotime ( '+1 year' , $inicio );

            // var_dump($inicio);
            // var_dump($termino);


            /** NOMBRE PROFESIONAL  */
            $nombre_profesional = mb_strtoupper($nombre_profesional);
            $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
            $nombre_profesional = strtr( $nombre_profesional, $unwanted_array );
            $nombre_profesional_temp = str_replace(' ', '', $nombre_profesional);

            /** NOMBRE PACIENTE */
            $nombre_paciente = mb_strtoupper($nombre_paciente);
            $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
            $nombre_paciente = strtr( $nombre_paciente, $unwanted_array );
            $nombre_paciente_temp = str_replace(' ', '', $nombre_paciente);

            $nombre_consulta ='Consulta.'.$nombre_profesional_temp.'.'.$nombre_paciente_temp.'.'.$inicio;
            // $nombre_consulta = '*';

            $payload = [
                "aud"=> "jitsi",
                "iss"=> "chat",
                "iat"=> $inicio,
                "exp"=> $termino,
                "nbf"=> $inicio,
                "sub"=> $app_id,
                "context"=> array(
                    "features"=> array(
                        "livestreaming"=> true,
                        "outbound-call"=> true,
                        "sip-outbound-call"=> false,
                        "transcription"=> true,
                        "recording"=> true
                    ),
                    "user"=> array(
                        "hidden-from-recorder"=> false,
                        "id"=> $id_usuario.'-'.$id_lugar_atencion.uniqid('',true),
                        "name"=> $nombre_usuario,
                        "avatar"=> $imagen_usuario,
                        "email"=> $correo_usuario,
                        "moderator"=> $moderador
                    )
                ),
                "room"=> $nombre_consulta
            ];

            /** sin enviar el public key */
            $jwt = JWT::encode($payload, env('JITSI_PRIVATE_KEY'), 'RS256', $api_key);

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['jwt'] = $jwt;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return (object)$datos;

    }


    /** MEODO PARA REGISTRAR LLAMDA DE CONSULTA */
    public function jitsiRegistroMeet_r( Request $request )
    {
        return static::jitsiRegistroMeet( $request->id_profesional, $request->id_paciente, $request->id_hora );
    }
    static public function jitsiRegistroMeet( $id_profesional, $id_paciente, $id_hora )
    {

        $profesional = Profesional::find($id_profesional);
        // busqueda de imagen
        $array_rut = explode('-',$profesional->rut);
        $nombre_imagen = asset('images/iconos/usuario_profesional.svg');
        if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
        {
            $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
        }
        $profesional->img_profesional = $nombre_imagen;


        $paciente = Paciente::find($id_paciente);
        $hora_medica = HoraMedica::find($id_hora);

        $token_profesional = '';
        $token_profesional_temp = static::generarJWT(
            $hora_medica->id_lugar_atencion,
            $profesional->id_usuario,
            'Dr. '.$profesional->apellido_uno,
            $profesional->img_profesional,
            $profesional->email,
            true,
            'Dr. '.$profesional->apellido_uno,
            explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio . ' -5 minutes'))
        );

        // echo json_encode($token_profesional_temp);
        // echo $token_profesional_temp->estado;

        if($token_profesional_temp->estado == 1)
        {
            $token_profesional = $token_profesional_temp->jwt;
        }
        else
        {
            return (object)array(
                'estado' => 0,
                'mjs' => 'falla en la generacion de Token para registro de llamada de profesional'
            );
        }

        $token_paciente = '';
        $token_paciente_temp = static::generarJWT(
            $hora_medica->id_lugar_atencion,
            empty($paciente->id_usuario)?$paciente->id:$paciente->id_usuario,
            explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
            '',
            $paciente->email,
            false,
            'Dr. '.$profesional->apellido_uno,
            explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio . ' -5 minutes'))
        );

        // echo json_encode($token_paciente_temp);
        // echo $token_paciente_temp->estado;

        if($token_paciente_temp->estado == 1)
        {
            $token_paciente = $token_paciente_temp->jwt;
        }
        else
        {
            return (object)array(
                'estado' => 0,
                'mjs' => 'falla en la generacion de Token para registro de llamada de Paciente',
                'error' => $token_paciente_temp->error
            );
        }


        /** INICIO NOMBRE DE GRUPO  */
        /** NOMBRE PROFESIONAL  */
        $nombre_profesional = mb_strtoupper('Dr. '.$profesional->apellido_uno);
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $nombre_profesional = strtr( $nombre_profesional, $unwanted_array );
        $nombre_profesional_temp = str_replace(' ', '', $nombre_profesional);

        /** NOMBRE PACIENTE */
        $nombre_paciente = mb_strtoupper(explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,);
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $nombre_paciente = strtr( $nombre_paciente, $unwanted_array );
        $nombre_paciente_temp = str_replace(' ', '', $nombre_paciente);

        $nombre_consulta ='Consulta.'.$nombre_profesional_temp.'.'.$nombre_paciente_temp.'.'.strtotime(date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio . ' -5 minutes' )));
        /** FIN NOMBRE DE GRUPO  */

        $registro_meet = static::registrar(  $id_profesional,
                                            $id_paciente,
                                            $nombre_consulta,
                                            $token_profesional,
                                            $token_paciente,
                                            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio)),
                                            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_termino)),
                                            '',
                                            ''
                                        );
        if($registro_meet->estado == 1)
        {
            $hora = HoraMedica::find($id_hora);
            $hora->id_jitsi_video_consulta = $registro_meet->last_id;
            $hora->save();
        }
        return $registro_meet;
    }

    public function buscarLlamadaJitsi(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id llamada'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = JitsiVideo::find($request->id);
            if($registro)
            {
                // Regenerar token siempre con la hora actual para evitar expiración
                // independiente de cuándo fue agendada la consulta
                $profesional = Profesional::find($registro->id_profesional);
                $paciente    = Paciente::find($registro->id_paciente);
                $hora_medica = HoraMedica::where('id_jitsi_video_consulta', $registro->id)->first();
                $id_lugar    = $hora_medica ? $hora_medica->id_lugar_atencion : 1;

                if ($profesional && $paciente) {
                    $now     = time();
                    $app_id  = env('JITSI_APP_ID');
                    $api_key = env('JITSI_API_KEY');

                    // Imagen profesional
                    $array_rut   = explode('-', $profesional->rut);
                    $imagen_prof = file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png'))
                        ? asset('images/img_perfil/'.$array_rut[0].'.png')
                        : asset('images/iconos/usuario_profesional.svg');

                    // Token moderador (profesional) — válido 2 horas desde ahora
                    $payload_prof = [
                        "aud" => "jitsi",
                        "iss" => "chat",
                        "iat" => $now,
                        "exp" => $now + (120 * 60),
                        "nbf" => $now,
                        "sub" => $app_id,
                        "context" => [
                            "features" => [
                                "livestreaming"      => true,
                                "outbound-call"      => true,
                                "sip-outbound-call"  => false,
                                "transcription"      => true,
                                "recording"          => true,
                            ],
                            "user" => [
                                "hidden-from-recorder" => false,
                                "id"        => $profesional->id_usuario.'-'.$id_lugar.uniqid('', true),
                                "name"      => 'Dr. '.$profesional->apellido_uno,
                                "avatar"    => $imagen_prof,
                                "email"     => $profesional->email,
                                "moderator" => true,
                            ],
                        ],
                        "room" => $registro->nombre_grupo,
                    ];
                    $registro->token_moderator = JWT::encode($payload_prof, env('JITSI_PRIVATE_KEY'), 'RS256', $api_key);

                    // Token invitado (paciente) — mismo tiempo
                    $payload_pac = $payload_prof;
                    $payload_pac["context"]["user"] = [
                        "hidden-from-recorder" => false,
                        "id"        => (empty($paciente->id_usuario) ? $paciente->id : $paciente->id_usuario).'-'.$id_lugar.uniqid('', true),
                        "name"      => explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
                        "avatar"    => '',
                        "email"     => $paciente->email,
                        "moderator" => false,
                    ];
                    $registro->token_invitado = JWT::encode($payload_pac, env('JITSI_PRIVATE_KEY'), 'RS256', $api_key);
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registo';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    public static function buildMensajeRecordatorioWhatsapp($paciente, $profesional, $fechaConsulta, $horaConsulta, $link): string
    {
        $nombrePaciente = trim(($paciente->nombres ?? '') . ' ' . ($paciente->apellido_uno ?? ''));
        $nombreProfesional = trim(($profesional->nombres ?? '') . ' ' . ($profesional->apellido_uno ?? ''));

        return "MED-SDI - Recordatorio de consulta\n"
            . "Hola {$nombrePaciente}.\n"
            . "Tu consulta con {$nombreProfesional} está programada para {$fechaConsulta} a las {$horaConsulta}.\n"
            . "Accede a la videollamada aquí:\n{$link}";
    }


    public function envioNotificacionLlamada(MensajeriaService $mensajeria)
    {
        $fecha = date('Y-m-d');
        $horaActual = date('H:i:s');
        $horaMasCinco = date('H:i:s', strtotime('+5 minutes'));

        $registros = HoraMedica::whereDate('fecha_consulta', $fecha)
            ->where('tipo_hora_medica', 'T')
            ->whereNotNull('id_jitsi_video_consulta')
            ->where('id_jitsi_video_consulta', '<>', '')
            ->whereIn('id_estado', [1, 2, 4, 8])
            /*
             * Descomentar estas dos líneas cuando quieras limitar
             * el envío a consultas dentro de los próximos 5 minutos.
             */
            // ->whereTime('hora_inicio', '>', $horaActual)
            // ->whereTime('hora_inicio', '<=', $horaMasCinco)
            ->get();

        $resultados = [];

        foreach ($registros as $value) {
            $correo = [
                'estado' => 0,
                'msj' => 'Correo no procesado.',
            ];

            $resultadoWhatsapp = [
                'estado' => 0,
                'msj' => 'WhatsApp no procesado.',
                'sid' => null,
            ];

            try {
                $registroJitsi = JitsiVideo::find($value->id_jitsi_video_consulta);

                if (!$registroJitsi) {
                    throw new \Exception('No se encontró el registro Jitsi.');
                }

                if ((int) $registroJitsi->estado !== 1) {
                    $resultados[] = [
                        'id_hora_medica' => $value->id,
                        'correo' => [
                            'estado' => 0,
                            'msj' => 'La notificación ya fue procesada.',
                        ],
                        'whatsapp' => [
                            'estado' => 0,
                            'msj' => 'La notificación ya fue procesada.',
                            'sid' => null,
                        ],
                    ];

                    continue;
                }

                $profesional = Profesional::find($registroJitsi->id_profesional);
                $paciente = Paciente::find($registroJitsi->id_paciente);
                $lugarAtencion = LugarAtencion::find($value->id_lugar_atencion);

                if (!$profesional) {
                    throw new \Exception('No se encontró el profesional.');
                }

                if (!$paciente) {
                    throw new \Exception('No se encontró el paciente.');
                }

                if (!$lugarAtencion) {
                    throw new \Exception('No se encontró el lugar de atención.');
                }

                $linkConsulta = rtrim(env('JITSI_LINK_MEET'), '/')
                    . '/'
                    . trim(env('JITSI_APP_ID'), '/')
                    . '/'
                    . ltrim($registroJitsi->nombre_grupo, '/');

                /*
                 * Envío de correo.
                 */
                if (!empty($paciente->email)) {
                    $correo = SendMailController::envioCorreo(
                        'notificacion_video_llamada',
                        [
                            [
                                'email' => trim($paciente->email),
                                'name' => trim(
                                    ($paciente->nombres ?? '')
                                    . ' '
                                    . ($paciente->apellido_uno ?? '')
                                ),
                            ],
                        ],
                        [],
                        [],
                        'MED-SDI - Notificación Link de Consulta',
                        [
                            'nombre_paciente' => trim(
                                ($paciente->nombres ?? '')
                                . ' '
                                . ($paciente->apellido_uno ?? '')
                            ),
                            'nombre_profesional' => trim(
                                ($profesional->nombres ?? '')
                                . ' '
                                . ($profesional->apellido_uno ?? '')
                            ),
                            'link_meet' => $linkConsulta,
                            'lugar_atencion' => $lugarAtencion->nombre,
                            'fecha_consulta' => $value->fecha_consulta,
                            'hora_consulta' => $value->hora_inicio,
                        ],
                        '',
                        ''
                    );
                } else {
                    $correo = [
                        'estado' => 0,
                        'msj' => 'El paciente no tiene correo electrónico.',
                    ];
                }

                /*
                 * Envío de WhatsApp usando MensajeriaService,
                 * el mismo servicio utilizado por /test/mensajeria.
                 */
                $telefono = $this->normalizarTelefonoWhatsapp(
                    $paciente->telefono_uno ?? null
                );

                if ($telefono) {
                    $mensajeWhatsapp = self::buildMensajeRecordatorioWhatsapp(
                        $paciente,
                        $profesional,
                        date('d-m-Y', strtotime($value->fecha_consulta)),
                        substr((string) $value->hora_inicio, 0, 5),
                        $linkConsulta
                    );

                    $resultadoWhatsapp = $mensajeria->enviarWhatsapp(
                        $telefono,
                        $mensajeWhatsapp,
                        [
                            'tipo' => 'recordatorio_telemedicina',
                            'id_hora_medica' => $value->id,
                            'id_paciente' => $paciente->id,
                            'id_profesional' => $profesional->id,
                            'id_jitsi_video_consulta' => $registroJitsi->id,
                        ]
                    );

                    if (!is_array($resultadoWhatsapp)) {
                        $resultadoWhatsapp = [
                            'estado' => (bool) $resultadoWhatsapp,
                            'msj' => $resultadoWhatsapp
                                ? 'WhatsApp enviado correctamente.'
                                : 'No fue posible enviar el WhatsApp.',
                            'sid' => null,
                        ];
                    }
                } else {
                    $resultadoWhatsapp = [
                        'estado' => 0,
                        'msj' => 'El paciente no tiene un teléfono móvil chileno válido.',
                        'sid' => null,
                    ];
                }

                $correoEnviado = !empty($correo['estado']);
                $whatsappEnviado = !empty($resultadoWhatsapp['estado']);

                /*
                 * Mientras se valida WhatsApp, solo se marca como notificado
                 * cuando ambos canales fueron enviados correctamente.
                 * Así el cron puede reintentar si WhatsApp falla.
                 */
                if ($correoEnviado && $whatsappEnviado) {
                    $registroJitsi->estado = 2;
                    $registroJitsi->save();
                }

                $resultadoActual = [
                    'id_hora_medica' => $value->id,
                    'id_paciente' => $paciente->id,
                    'telefono_original' => $paciente->telefono_uno ?? null,
                    'telefono_normalizado' => $telefono,
                    'correo' => $correo,
                    'whatsapp' => $resultadoWhatsapp,
                ];

                $resultados[] = $resultadoActual;

                Log::build([
                    'path' => storage_path(
                        'logs/log_envio_notificacion_link_consulta_'
                        . date('Ymd')
                        . '.log'
                    ),
                ])->info(
                    'Resultado recordatorio de telemedicina',
                    $resultadoActual
                );
            } catch (\Throwable $e) {
                $resultadoError = [
                    'id_hora_medica' => $value->id ?? null,
                    'correo' => $correo,
                    'whatsapp' => $resultadoWhatsapp,
                    'error' => $e->getMessage(),
                ];

                $resultados[] = $resultadoError;

                Log::error(
                    'Error enviando recordatorio de telemedicina',
                    [
                        'id_hora_medica' => $value->id ?? null,
                        'error' => $e->getMessage(),
                        'archivo' => $e->getFile(),
                        'linea' => $e->getLine(),
                    ]
                );
            }
        }

        return response()->json([
            'estado' => 1,
            'fecha_ejecucion' => date('Y-m-d H:i:s'),
            'cantidad' => count($resultados),
            'resultados' => $resultados,
        ]);
    }

    private function normalizarTelefonoWhatsapp($telefono)
    {
        if ($telefono === null) {
            return null;
        }

        $telefono = preg_replace('/\D+/', '', (string) $telefono);

        if ($telefono === '' || $telefono === '569') {
            return null;
        }

        /*
         * Ejemplos aceptados:
         * 995474660    -> 56995474660
         * 56995474660  -> 56995474660
         * +56 9 9547 4660 -> 56995474660
         */
        if (strlen($telefono) === 9 && substr($telefono, 0, 1) === '9') {
            $telefono = '56' . $telefono;
        }

        if (!preg_match('/^569\d{8}$/', $telefono)) {
            return null;
        }

        return $telefono;
    }

}
