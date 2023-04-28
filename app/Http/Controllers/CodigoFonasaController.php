<?php

namespace App\Http\Controllers;

use App\Models\CodigoFonasa;
use Illuminate\Http\Request;

class CodigoFonasaController extends Controller
{
    public function buscarPorCodigo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->valor))
        {
            $error['valor'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('codigo', 'like', '%'.$request->valor.'%');
            $registros = CodigoFonasa::where($filtro)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registros;
                $datos['cantidad'] = $registros->count();
                $datos['msj'] = 'Registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
            $datos['msj'] = 'Campo requerido';
        }

        return $datos;
    }

    public function buscarPorNombre(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->valor))
        {
            $error['valor'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('nombre', 'like', '%'.$request->valor.'%');
            $registros = CodigoFonasa::where($filtro)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registros;
                $datos['cantidad'] = $registros->count();
                $datos['msj'] = 'Registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
            $datos['msj'] = 'Campo requerido';
        }

        return $datos;
    }
}
