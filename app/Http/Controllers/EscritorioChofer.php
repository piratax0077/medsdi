<?php

namespace App\Http\Controllers;

use App\Models\JitsiVideo;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscritorioChofer extends Controller
{
    public function index()
    {
        $usuario = User::where('id', Auth::user()->id)->first();

        return view('app.chofer.escritorio_chofer', [
            'usuario' => $usuario,
        ]);
    }

    public function iniciarEmergencia(Request $request)
    {
        $usuario      = Auth::user();
        $fecha_inicio = date('Y-m-d H:i:s');
        $inicio       = strtotime($fecha_inicio);
        $termino      = strtotime('+2 hours', $inicio);

        $unwanted_array = [
            'Š'=>'S','š'=>'s','Ž'=>'Z','ž'=>'z','À'=>'A','Á'=>'A','Â'=>'A','Ã'=>'A','Ä'=>'A','Å'=>'A','Æ'=>'A','Ç'=>'C',
            'È'=>'E','É'=>'E','Ê'=>'E','Ë'=>'E','Ì'=>'I','Í'=>'I','Î'=>'I','Ï'=>'I','Ñ'=>'N','Ò'=>'O','Ó'=>'O','Ô'=>'O',
            'Õ'=>'O','Ö'=>'O','Ø'=>'O','Ù'=>'U','Ú'=>'U','Û'=>'U','Ü'=>'U','Ý'=>'Y','Þ'=>'B','ß'=>'Ss','à'=>'a','á'=>'a',
            'â'=>'a','ã'=>'a','ä'=>'a','å'=>'a','æ'=>'a','ç'=>'c','è'=>'e','é'=>'e','ê'=>'e','ë'=>'e','ì'=>'i','í'=>'i',
            'î'=>'i','ï'=>'i','ð'=>'o','ñ'=>'n','ò'=>'o','ó'=>'o','ô'=>'o','õ'=>'o','ö'=>'o','ø'=>'o','ù'=>'u','ú'=>'u',
            'û'=>'u','ý'=>'y','þ'=>'b','ÿ'=>'y',
        ];

        $nombre_chofer_clean   = str_replace(' ', '', strtr(mb_strtoupper($usuario->name), $unwanted_array));
        $nombre_paciente_raw   = $request->nombre_paciente ?: 'Paciente';
        $nombre_paciente_clean = str_replace(' ', '', strtr(mb_strtoupper($nombre_paciente_raw), $unwanted_array));

        $nombre_consulta = 'Emergencia.' . $nombre_chofer_clean . '.' . $nombre_paciente_clean . '.' . $inicio;

        $app_id  = env('JITSI_APP_ID');
        $api_key = env('JITSI_API_KEY');

        // JWT Moderador (chofer)
        $payload_mod = [
            'aud' => 'jitsi',
            'iss' => 'chat',
            'iat' => $inicio,
            'exp' => $termino,
            'nbf' => $inicio,
            'sub' => $app_id,
            'context' => [
                'features' => [
                    'livestreaming'     => true,
                    'outbound-call'     => true,
                    'sip-outbound-call' => false,
                    'transcription'     => true,
                    'recording'         => true,
                ],
                'user' => [
                    'hidden-from-recorder' => false,
                    'id'       => $usuario->id . '-chofer-' . uniqid('', true),
                    'name'     => $usuario->name,
                    'avatar'   => asset('images/iconos/usuario_asistente.svg'),
                    'email'    => $usuario->email ?? '',
                    'moderator'=> true,
                ],
            ],
            'room' => $nombre_consulta,
        ];
        $jwt_mod = JWT::encode($payload_mod, env('JITSI_PRIVATE_KEY'), 'RS256', $api_key);

        // JWT Invitado (médico / central)
        $payload_inv = $payload_mod;
        $payload_inv['context']['user']['id']        = 'inv-medico-' . uniqid('', true);
        $payload_inv['context']['user']['name']      = 'Médico Central';
        $payload_inv['context']['user']['moderator'] = false;
        $jwt_inv = JWT::encode($payload_inv, env('JITSI_PRIVATE_KEY'), 'RS256', $api_key);

        // Guardar registro (si falla por constraint de BD, la llamada igual puede iniciarse)
        $link_medico = null;
        try {
            $jitsi = new JitsiVideo();
            $jitsi->id_profesional  = $usuario->id;
            $jitsi->id_paciente     = null;
            $jitsi->nombre_grupo    = $nombre_consulta;
            $jitsi->token_moderator = $jwt_mod;
            $jitsi->token_invitado  = $jwt_inv;
            $jitsi->hora_inicio     = $fecha_inicio;
            $jitsi->hora_termino    = date('Y-m-d H:i:s', $termino);
            $jitsi->estado          = 1;
            $jitsi->save();

            $link_medico = url('/paciente/videollamada/' . $app_id . '/' . $nombre_consulta);
        } catch (\Exception $e) {
            // El registro no pudo guardarse; la llamada funciona igual
        }

        return response()->json([
            'estado'       => 1,
            'jwt'          => $jwt_mod,
            'nombre_grupo' => $nombre_consulta,
            'link_medico'  => $link_medico,
        ]);
    }
}
