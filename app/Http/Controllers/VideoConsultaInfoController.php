<?php

namespace App\Http\Controllers;

use App\Models\VideoConsultaInfo;
use Illuminate\Http\Request;

class VideoConsultaInfoController extends Controller
{
    /**
     * REGISTRO
     * @param Integer $id_hora_atencion
     * @param Integer $id_profesional
     * @param Integer $id_paciente
     * @param Integer $id_call
     * @param string $pass_call
     * @param text $url_start
     * @param text $url_join
     * @param text $host_id
     * @param string $host_email []
     * @param string $start_time [formato YYYY-mm-ddTHH:ii:ss]
     * @param longText $respon [debe recibir json de response]
     * @return object
     */
    static public function registrar($id_hora_atencion, $id_profesional, $id_paciente, $id_call, $pass_call, $url_start, $url_join, $host_id, $host_email, $start_time, $response)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_hora_atencion))
        {
            $error['id_hora_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_call))
        {
            $error['id_call'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($pass_call))
        {
            $error['pass_call'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($url_start))
        {
            $error['url_start'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($url_join))
        {
            $error['url_join'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($host_id))
        {
            $error['host_id'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($host_email))
        {
            $error['host_email'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($start_time))
        {
            $error['start_time'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new VideoConsultaInfo();
            $registro->id_hora_atencion = $id_hora_atencion;
            $registro->id_profesional = $id_profesional;
            $registro->id_paciente = $id_paciente;
            $registro->id_call = $id_call;
            $registro->pass_call = $pass_call;
            $registro->url_start = $url_start;
            $registro->url_join = $url_join;
            $registro->host_id = $host_id;
            $registro->host_email = $host_email;
            $registro->start_time = $start_time;
            $registro->response = $response;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'campos requeridos';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro exitoso';
                $datos['last_id'] = $registro->id;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    /**
     * BUSCAR REGISTRO
     * @param int $id_hora_atencion
     * @param int $id_profesional
     * @param int $id_paciente
     * @return object
     */
    static public function buscarRegistro($id_hora_atencion, $id_profesional, $id_paciente)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($id_hora_atencion))
        {
            $error['id_hora_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('id_hora_atencion', $id_hora_atencion);
            $filtro[] = array('id_profesional', $id_profesional);
            $filtro[] = array('id_paciente', $id_paciente);

            $registro = VideoConsultaInfo::where($filtro)->first();

            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }
}
