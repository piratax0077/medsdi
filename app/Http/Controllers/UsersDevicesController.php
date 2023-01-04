<?php

namespace App\Http\Controllers;

use App\Models\UsersDevices;
use Illuminate\Http\Request;

class UsersDevicesController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_user))
            $filtros[] = array('id_user',$request->id_user);
        if(!empty($request->alias))
            $filtros[] = array('alias',$request->alias);
        if(!empty($request->uuid))
            $filtros[] = array('uuid',$request->uuid);
        if(!empty($request->estado))
            $filtros[] = array('estado',$request->estado);


        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = UsersDevices::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            $datos['registros'] = $registros = UsersDevices::where($filtros)->get();

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Sin registros';
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistro(Request $request){

        $datos = array();
        $filtros = array();
        $error = array();
        $campos_requeridos = 0;


        /* VALIDACION CAMPOS */
        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* CAMPOS FILTRO */
        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_user))
            $filtros[] = array('id_user',$request->id_user);
        if(!empty($request->alias))
            $filtros[] = array('alias',$request->alias);
        if(!empty($request->uuid))
            $filtros[] = array('uuid',$request->uuid);
        if(!empty($request->estado))
            $filtros[] = array('estado',$request->estado);

        if($campos_requeridos==0)
        {

            $cant_reg = UsersDevices::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = UsersDevices::where($filtros)->find($request->id);

                if($registros->count())
                {
                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['request'] = $request->all();

                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Sin registros';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');

    }

    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new UsersDevices();


        /* VALIDACION CAMPOS */
        if($request->id_user=='')
        {
            $error['id_user'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->alias=='')
        {
            $error['alias'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->uuid=='')
        {
            $error['uuid'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_ingreso=='')
        {
            $error['fecha_ingreso'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_termino=='')
        {
            $error['fecha_termino'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->id_user = $request->id_user;
            $registro->alias = $request->alias;
            $registro->uuid = $request->uuid;

            $registro->estado = $request->estado;
            $registro->fecha_ingreso = $request->fecha_ingreso;
            $registro->fecha_termino = $request->fecha_termino;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function modificar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if((int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_user=='')
        {
            $error['id_user'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->alias=='')
        {
            $error['alias'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->uuid=='')
        {
            $error['uuid'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_ingreso=='')
        {
            $error['fecha_ingreso'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_termino=='')
        {
            $error['fecha_termino'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($campos_requeridos==0)
        {

            $registro = UsersDevices::find($request->id);

            if(count($registro))
            {

                if(!empty($request->id_user))
                    $registro->id_user = $request->id_user;
                if(!empty($request->alias))
                    $registro->alias = $request->alias;
                if(!empty($request->uuid))
                    $registro->uuid = $request->uuid;

                if(!empty($request->estado))
                    $registro->estado = $request->estado;
                if(!empty($request->fecha_ingreso))
                    $registro->fecha_ingreso = $request->fecha_ingreso;
                if(!empty($request->fecha_termino))
                    $registro->fecha_termino = $request->fecha_termino;


                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Modificado';
                    $datos['request_data'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al Modificar';
                    $datos['request_data'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function estado(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if(empty($request->id)||(int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->estado==null){
            $error['estado'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $registro = UsersDevices::find($request->id);

            if(count($registro)>0)
            {
                $registro->estado = $request->estado;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Actualizado';
                    $datos['request'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al actualizar el registro';
                    $datos['request'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existe';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }
}
