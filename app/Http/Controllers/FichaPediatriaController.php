<?php

namespace App\Http\Controllers;

use App\Models\FichaPadiatriaGeneralTunner;
use Illuminate\Http\Request;

class FichaPediatriaController extends Controller
{

    /**** INICIO DE TUNNER */

    public function agergarTunner(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // if(empty($request->id_ficha_atencion))
        // {
        //     $error['id_ficha_atencion'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sexo))
        {
            $error['sexo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tanner))
        {
            $error['tanner'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->edad_biologica))
        {
            $error['edad_biologica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->edad_cronologica))
        {
            $error['edad_cronologica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->comentario))
        {
            $error['comentario'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->fecha))
        // {
        //     $error['fecha'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {
            $tunner = new FichaPadiatriaGeneralTunner();

            $tunner->id_ficha_atencion = $request->id_ficha_atencion;
            $tunner->id_paciente = $request->id_paciente;
            $tunner->id_profesional = $request->id_profesional;
            $tunner->sexo = $request->sexo;
            $tunner->tanner = $request->tanner;
            $tunner->edad_biologica = $request->edad_biologica;
            $tunner->edad_cronologica = $request->edad_cronologica;
            $tunner->comentario = $request->comentario;
            $tunner->fecha = date('Y-m-d H:i:s');
            $tunner->otro = $request->otro;
            $tunner->estado = 1;

            if($tunner->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problemas al registrar';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function verTunner(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sexo))
        {
            $error['sexo'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro= array();
            $filtro[] = array('id_paciente', $request->id_paciente);
            $filtro[] = array('sexo', $request->sexo);
            $registros = FichaPadiatriaGeneralTunner::where($filtro)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problemas al buscar Registros';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }

    /**** CIERRE DE TUNNER */
}
