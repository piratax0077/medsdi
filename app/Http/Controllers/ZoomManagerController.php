<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jubaer\Zoom\Zoom;

class ZoomManagerController extends Controller
{
    public function index()
    {
        return view('zoom_manager.index');
    }

    static public function crearMeeting(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_hora_atencion))
        {
            $error['id_hora_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_atencion))
        {
            $error['hora_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->profesional_correo))
        {
            $error['profesional_correo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->paciente_nombre))
        {
            $error['paciente_nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tiempo_consulta))
        {
            $error['tiempo_consulta'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $zoom = new Zoom();
            $meetings = $zoom->createMeeting([
                "agenda" => 'Agenda Consulta',
                "topic" => 'Consulta Paciente '.$request->paciente_nombre,
                "type" => 2, // 1 => instant, 2 => scheduled, 3 => recurring with no fixed time, 8 => recurring with fixed time
                // "duration" => 45, // in minutes
                "duration" => $request->tiempo_consulta, // in minutes
                "timezone" => 'America/Santiago', // set your timezone
                "default_password" => false,
                "password" => '',
                // "start_time" => '2024-02-29T01:30:00', // set your start time
                "start_time" => $request->hora_atencion, // set your start time
                // "template_id" => 'set your template id', // set your template id  Ex: "Dv4YdINdTk+Z5RToadh5ug==" from https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingtemplates
                "pre_schedule" => false,  // set true if you want to create a pre-scheduled meeting
                "schedule_for" => env('ZOOM_EMAIL'), // set your schedule for
                // "schedule_for" => $request->profesional_correo, // set your schedule for
                "settings" => [
                    'jbh_time' => 5,
                    'join_before_host' => true, // if you want to join before host set true otherwise set false
                    'host_video' => true, // if you want to start video when host join set true otherwise set false
                    'participant_video' => false, // if you want to start video when participants join set true otherwise set false
                    'mute_upon_entry' => false, // if you want to mute participants when they join the meeting set true otherwise set false
                    'waiting_room' => false, // if you want to use waiting room for participants set true otherwise set false
                    'audio' => 'both', // values are 'both', 'telephony', 'voip'. default is both.
                    'auto_recording' => 'none', // values are 'none', 'local', 'cloud'. default is none.
                    'approval_type' => 0, // 0 => Automatically Approve, 1 => Manually Approve, 2 => No Registration Required
                    'meeting_authentication' => false, // If true, only authenticated users can join the meeting.
                ],
            ]);

            if($meetings['status'])
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'reunion creada';
                $datos['meetings'] = $meetings;

                // echo $meetings['status'];
                // echo '**********';
                // echo json_encode($meetings);

                $registro = VideoConsultaInfoController::registrar(
                        $request->id_hora_atencion,
                        $request->id_profesional,
                        $request->id_paciente,
                        $meetings['data']['id'],
                        $meetings['data']['password'],
                        $meetings['data']['start_url'],
                        $meetings['data']['join_url'],
                        $meetings['data']['host_id'],
                        $meetings['data']['host_email'],
                        $meetings['data']['start_time'],
                        json_encode($meetings)
                    );

                if($registro->estado)
                {
                    $datos['video_consulta']['estado'] = 1;
                    $datos['video_consulta']['msj'] = 'reunion registrada';
                    $datos['video_consulta']['result'] = $registro;
                }
                else
                {
                    $datos['video_consulta']['estado'] = 0;
                    $datos['video_consulta']['msj'] = 'falla registro reunion';
                    $datos['video_consulta']['result'] = $registro;
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'reunion con falla';
                $datos['meetings'] = $meetings;
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
     * ELIMINAR REUNION
     * @param Request $request [meetingId]
     * @return array
     *
     */
    public function EliminarMeeting(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $zoom = new Zoom();
            $meetings = $zoom->deleteMeeting( $request->meetingId);
            if($meetings['status'])
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'reunion eliminada';
                $datos['meetings'] = $meetings;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en eliminar';
                $datos['meetings'] = $meetings;
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
}
