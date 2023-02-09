<?php

namespace App\Http\Controllers;

use App\Models\ExamenEspecialidadTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExamenEspecialidadController extends Controller
{


    public function estructurajson_r(Request $request)
    {
        return static::estructuraJson($request->id_template, $request->all());
    }

    static public function estructuraJson($id_template, $parametros)
    {
        Log::channel('notificacion_confirmacion_hora')->info(json_encode($id_template));
        Log::channel('notificacion_confirmacion_hora')->info(json_encode($parametros));
        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($id_template))
        {
            $error['id_template'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($parametros))
        {
            $error['parametros'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {

            $template = ExamenEspecialidadTemplate::find($id_template);
            if($template)
            {
                $estructura = explode('|',$template->estructura);
                $alias = $template->alias;
                $info = array();
                foreach ($estructura as $key => $value){
                    if($value == 'estado')
                        $info[$value] = '1';
                    else
                        $info[$value] = '';
                }
                foreach ($parametros as $key_param => $value_param) {
                    $temp = str_replace('id_fc','id_fichas_atenciones',$key_param);
                    $temp = str_replace('_'.$alias,'',$temp);//
                    $temp = str_replace('_fc','',$temp);

                    if(key_exists($temp,$info))
                        $info[$temp] = $value_param;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'json';
                $datos['json'] = json_encode($info);
                // $datos['json'] = ($info);

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Template no encontrado';
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
}
