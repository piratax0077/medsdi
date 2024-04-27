<?php

namespace App\Http\Controllers;

use App\Models\TipoProcedimiento;
use Illuminate\Http\Request;

class TipoProcedimientoController extends Controller
{
    /** ver registros API */
    static public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id, $request->nombre, $request->detalle, $request->comentario, $request->estado);
    }

    /** ver registros */
    /**
     * consulta de registros de reta por atencion
     * @param id int - ID- OPCIONAL
     * @param nombre string - NOMBRE - OPCIONAL
     * @param detalle date - DETALLE - OPCIONAL
     * @param comentario time - COMENTARIO - OPCIONAL
     * @param estado int - ESTADO - OPCIONAL
     * @return object
     */
    static public function verRegistros( $id = '', $nombre = '', $detalle = '', $comentario = '', $estado = '' )
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

            $registros = TipoProcedimiento::where($filtro)->get();
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
