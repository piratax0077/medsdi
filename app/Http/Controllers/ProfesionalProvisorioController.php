<?php

namespace App\Http\Controllers;

use App\Models\ProfesionalProvisorio;
use Illuminate\Http\Request;

class ProfesionalProvisorioController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $filtros = array();

        if($request->id!='')
            $filtros[] = array('id',$request->id);
        if($request->nombre!='')
            $filtro[] = array('nombre',$request->nombre);
        if($request->apellido_uno!='')
            $filtro[] = array('apellido_uno',$request->apellido_uno);
        if($request->apellido_dos!='')
            $filtro[] = array('apellido_dos',$request->apellido_dos);
        if($request->sexo!='')
            $filtro[] = array('sexo',$request->sexo);
        if($request->rut!='')
            $filtro[] = array('rut',$request->rut);
        if($request->email!='')
            $filtro[] = array('email',$request->email);
        if($request->telefono_uno!='')
            $filtro[] = array('telefono_uno',$request->telefono_uno);
        if($request->telefono_dos!='')
            $filtro[] = array('telefono_dos',$request->telefono_dos);
        if($request->id_direccion!='')
            $filtro[] = array('id_direccion',$request->id_direccion);
        if($request->id_usuario!='')
            $filtro[] = array('id_usuario',$request->id_usuario);
        if($request->id_especialidad!='')
            $filtro[] = array('id_especialidad',$request->id_especialidad);
        if($request->id_tipo_especialidad!='')
            $filtro[] = array('id_tipo_especialidad',$request->id_tipo_especialidad);
        if($request->id_sub_tipo_especialidad!='')
            $filtro[] = array('id_sub_tipo_especialidad',$request->id_sub_tipo_especialidad);
        if($request->supersalud!='')
            $filtro[] = array('supersalud',$request->supersalud);
        if($request->contactado!='')
            $filtro[] = array('contactado',$request->contactado);
        if($request->otro!='')
            $filtro[] = array('otro',$request->otro);
        if($request->estado!='')
            $filtro[] = array('estado',$request->estado);



        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = ProfesionalProvisorio::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            $datos['registros'] = $registros = ProfesionalProvisorio::where($filtros)->get();

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
        if($request->id!='')
            $filtros[] = array('id',$request->id);
        if($request->nombre!='')
            $filtro[] = array('nombre',$request->nombre);
        if($request->apellido_uno!='')
            $filtro[] = array('apellido_uno',$request->apellido_uno);
        if($request->apellido_dos!='')
            $filtro[] = array('apellido_dos',$request->apellido_dos);
        if($request->sexo!='')
            $filtro[] = array('sexo',$request->sexo);
        if($request->rut!='')
            $filtro[] = array('rut',$request->rut);
        if($request->email!='')
            $filtro[] = array('email',$request->email);
        if($request->telefono_uno!='')
            $filtro[] = array('telefono_uno',$request->telefono_uno);
        if($request->telefono_dos!='')
            $filtro[] = array('telefono_dos',$request->telefono_dos);
        if($request->id_direccion!='')
            $filtro[] = array('id_direccion',$request->id_direccion);
        if($request->id_usuario!='')
            $filtro[] = array('id_usuario',$request->id_usuario);
        if($request->id_especialidad!='')
            $filtro[] = array('id_especialidad',$request->id_especialidad);
        if($request->id_tipo_especialidad!='')
            $filtro[] = array('id_tipo_especialidad',$request->id_tipo_especialidad);
        if($request->id_sub_tipo_especialidad!='')
            $filtro[] = array('id_sub_tipo_especialidad',$request->id_sub_tipo_especialidad);
        if($request->supersalud!='')
            $filtro[] = array('supersalud',$request->supersalud);
        if($request->contactado!='')
            $filtro[] = array('contactado',$request->contactado);
        if($request->otro!='')
            $filtro[] = array('otro',$request->otro);
        if($request->estado!='')
            $filtro[] = array('estado',$request->estado);

        if($campos_requeridos==0)
        {

            $cant_reg = ProfesionalProvisorio::where($filtros)->count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = ProfesionalProvisorio::where($filtros)->find($request->id);

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

        $registro = new ProfesionalProvisorio();


        /* VALIDACION CAMPOS */
        if($request->nombre == '')
        {
            $error['nombre'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->apellido_uno == '')
        {
            $error['apellido_uno'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->apellido_dos == '')
        // {
        //     $error['apellido_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->sexo == '')
        // {
        //     $error['sexo'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        if($request->rut == '')
        {
            $error['rut'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->email == '')
        // {
        //     $error['email'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_uno == '')
        // {
        //     $error['telefono_uno'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_dos == '')
        // {
        //     $error['telefono_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_direccion == '')
        // {
        //     $error['id_direccion'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_usuario == '')
        // {
        //     $error['id_usuario'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_especialidad == '')
        // {
        //     $error['id_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_tipo_especialidad == '')
        // {
        //     $error['id_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_sub_tipo_especialidad == '')
        // {
        //     $error['id_sub_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->supersalud == '')
        // {
        //     $error['supersalud'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->contactado == '')
        // {
        //     $error['contactado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->otro == '')
        // {
        //     $error['otro'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->estado == '')
        // {
        //     $error['estado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }

        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->id_user = $request->id_user;
            $registro->nombre = $request->nombre;
            $registro->apellido_uno = $request->apellido_uno;
            $registro->apellido_dos = $request->apellido_dos;
            $registro->sexo = $request->sexo;
            $registro->rut = $request->rut;
            $registro->email = $request->email;
            $registro->telefono_uno = $request->telefono_uno;
            $registro->telefono_dos = $request->telefono_dos;
            $registro->id_direccion = $request->id_direccion;
            $registro->id_usuario = $request->id_usuario;
            $registro->id_especialidad = $request->id_especialidad;
            $registro->id_tipo_especialidad = $request->id_tipo_especialidad;
            $registro->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;
            $registro->supersalud = $request->supersalud;
            $registro->contactado = $request->contactado;
            $registro->otro = $request->otro;
            // $registro->estado = $request->estado;

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

        if($request->nombre == '')
        {
            $error['nombre'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->apellido_uno == '')
        {
            $error['apellido_uno'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->apellido_dos == '')
        // {
        //     $error['apellido_dos'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->sexo == '')
        // {
        //     $error['sexo'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        if($request->rut == '')
        {
            $error['rut'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->email == '')
        // {
        //     $error['email'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_uno == '')
        // {
        //     $error['telefono_uno'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_dos == '')
        // {
        //     $error['telefono_dos'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_direccion == 0)
        // {
        //     $error['id_direccion'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_usuario == 0)
        // {
        //     $error['id_usuario'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_especialidad == 0)
        // {
        //     $error['id_especialidad'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_tipo_especialidad == 0)
        // {
        //     $error['id_tipo_especialidad'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_sub_tipo_especialidad == 0)
        // {
        //     $error['id_sub_tipo_especialidad'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->supersalud == '')
        // {
        //     $error['supersalud'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->contactado == '')
        // {
        //     $error['contactado'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->otro == '')
        // {
        //     $error['otro'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->estado == '')
        // {
        //     $error['estado'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }

        if($campos_requeridos==0)
        {

            $registro = ProfesionalProvisorio::find($request->id);

            if(count($registro))
            {

                if(!empty($request->nombre))
                    $registro->nombre = $request->nombre;
                if(!empty($request->apellido_uno))
                    $registro->apellido_uno = $request->apellido_uno;
                if(!empty($request->apellido_dos))
                    $registro->apellido_dos = $request->apellido_dos;
                if(!empty($request->sexo))
                    $registro->sexo = $request->sexo;
                if(!empty($request->rut))
                    $registro->rut = $request->rut;
                if(!empty($request->email))
                    $registro->email = $request->email;
                if(!empty($request->telefono_uno))
                    $registro->telefono_uno = $request->telefono_uno;
                if(!empty($request->telefono_dos))
                    $registro->telefono_dos = $request->telefono_dos;
                if(!empty($request->id_direccion))
                    $registro->id_direccion = $request->id_direccion;
                if(!empty($request->id_usuario))
                    $registro->id_usuario = $request->id_usuario;
                if(!empty($request->id_especialidad))
                    $registro->id_especialidad = $request->id_especialidad;
                if(!empty($request->id_tipo_especialidad))
                    $registro->id_tipo_especialidad = $request->id_tipo_especialidad;
                if(!empty($request->id_sub_tipo_especialidad))
                    $registro->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;
                if(!empty($request->supersalud))
                    $registro->supersalud = $request->supersalud;
                if(!empty($request->contactado))
                    $registro->contactado = $request->contactado;
                if(!empty($request->otro))
                    $registro->otro = $request->otro;
                if($request->estado != '')
                    $registro->estado = $request->estado;


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

            $registro = ProfesionalProvisorio::find($request->id);

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
