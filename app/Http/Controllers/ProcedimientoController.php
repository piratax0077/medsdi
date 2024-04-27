<?php

namespace App\Http\Controllers;

use App\Models\Procedimiento;
use Illuminate\Http\Request;

class ProcedimientoController extends Controller
{
    /** ver registros API */
    static public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id, $request->id_tipo_procedimiento, $request->nombre, $request->detalle, $request->comentario, $request->estado);
    }

    /** ver registros */
    /**
     * consulta de registros de reta por atencion
     * @param id int - ID- OPCIONAL
     * @param id_tipo_procedimiento interger - ID TIPO PROCEDIMIENTO - OPCIONAL
     * @param nombre string - NOMBRE - OPCIONAL
     * @param detalle date - DETALLE - OPCIONAL
     * @param comentario time - COMENTARIO - OPCIONAL
     * @param estado int - ESTADO - OPCIONAL
     * @return object
     */
    static public function verRegistros( $id = '', $id_tipo_procedimiento ='', $nombre = '', $detalle = '', $comentario = '', $estado = '' )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            if( !empty($id))
            {
                $filtro[] = array('id', $id);
            }
            if( !empty($id_tipo_procedimiento))
            {
                $filtro[] = array('id_tipo_procedimiento', $id_tipo_procedimiento);
            }
            if( !empty($nombre))
            {
                $filtro[] = array('nombre', 'like', $nombre.'%');
            }
            If( !empty($detalle))
            {
                $filtro[] = array('detalle', 'like', $detalle.'%');
            }
            if( !empty($comentario))
            {
                $filtro[] = array('comentario', 'like', $comentario.'%');
            }
            if( $estado !== '')
            {
                $filtro[] = array('estado', $estado);
            }

            $registros = Procedimiento::where($filtro)->get();
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
}
