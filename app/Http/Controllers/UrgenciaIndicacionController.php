<?php

namespace App\Http\Controllers;

use App\Models\UrgenciaIndicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrgenciaIndicacionController extends Controller
{
    /** ver registros API */
    static public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id_urgencia, $request->indicaciones, $request->comentario, $request->fecha_registro, $request->hora_registro,  $request->estado);
    }

    /** ver registros */
    /**
     * consulta de registros de reta por atencion
     * @param id_urgencia integer - ID URGENCIA - REQUERIDO
     * @param indicaciones string - NOMBRE INDICACIONES - OPCIONAL
     * @param comentario string - COMENTARIO - OPCIONAL
     * @param id_usuario integer - ID USUARIO - OPCIONAL
     * @param fecha_registro date - fecha registro (Y-m-d) - OPCIONAL
     * @param hora_registro time - hora registro (H:i:s) - OPCIONAL
     * @param estado int - estado - OPCIONAL
     * @return object
     */
    static public function verRegistros($id_urgencia, $indicaciones = '', $comentario = '', $id_usuario = '', $fecha_registro = '', $hora_registro = '',  $estado = '')
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_urgencia))
        {
            $error['ID URGENCIA'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            if( !empty($id_urgencia))
            {
                $filtro[] = array('id_urgencia', $id_urgencia);
            }
            if( !empty($indicaciones))
            {
                $filtro[] = array('indicaciones', 'like', $indicaciones.'%');
            }
            if( !empty($comentario))
            {
                $filtro[] = array('comentario', 'like', $comentario.'%');
            }
            if( !empty($id_usuario))
            {
                $filtro[] = array('id_usuario', $id_usuario);
            }
            if( !empty($fecha_registro))
            {
                $filtro[] = array('fecha_registro', $fecha_registro);
            }
            if( !empty($hora_registro))
            {
                $filtro[] = array('hora_registro', $hora_registro);
            }
            if( $estado !== '')
            {
                $filtro[] = array('estado', $estado);
            }

            $registros = UrgenciaIndicacion::where($filtro)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    /** registrar API */
    public function registrar_r(Request $request)
    {
        return static::registrar($request->id_urgencia, $request->id_tipo_procedimiento, $request->tipo_procedimiento, $request->id_procedimiento, $request->procedimiento, $request->comentario);
    }
    /** registrar */
    /**
     * consulta de registros de reta por atencion
     * @param id_urgencia integer - ID URGENCIA - REQUERIDO
     * @param indicacion string - NOMBRE PROCEDIMIENTO - REQUERIDO
     * @param comentario string - COMENTARIO - OPCIONAL
     * @return object
     */
    static public function registrar($id_urgencia, $indicacion, $comentario)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($id_urgencia) )
        {
            $error['id_urgencia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($indicacion) )
        {
            $error['indicacion'] = 'campo requerido';
            $valido = 0;
        }
        // if( empty($comentario) )
        // {
        //     $error['comentario'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registrar = new UrgenciaIndicacion();
            $registrar->id_urgencia = $id_urgencia;
            $registrar->indicacion = $indicacion;
            $registrar->comentario = $comentario;
            $registrar->id_usuario = Auth::user()->id;
            $registrar->fecha_registro = date('Y-m-d');
            $registrar->hora_registro = date('H:m:s');
            $registrar->estado = 1;

            if($registrar->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }
}
