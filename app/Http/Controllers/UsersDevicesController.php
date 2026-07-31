<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\User;
use App\Models\UsersDevices;
use Exception;
use Illuminate\Http\Request;

class UsersDevicesController extends Controller
{
    public function mobileDevice(Request $request)
    {
        $request->validate([
            'uuid' => ['required', 'string', 'max:255'],
        ]);

        $registro = UsersDevices::where('id_user', $request->user()->id)
            ->where('uuid', $request->uuid)
            ->orderByDesc('estado')
            ->orderByDesc('id')
            ->first();

        if (!$registro) {
            return response()->json([
                'estado' => 0,
                'msg' => 'Este dispositivo no está registrado para la cuenta.',
            ]);
        }

        return response()->json([
            'estado' => 1,
            'registros' => [$registro],
            'password' => $registro->password,
        ]);
    }

    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if($request->id!='')
            $filtros[] = array('id',$request->id);
        if($request->id_user!='')
            $filtros[] = array('id_user',$request->id_user);
        if($request->alias!='')
            $filtros[] = array('alias',$request->alias);
        if($request->uuid!='')
            $filtros[] = array('uuid',$request->uuid);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);



        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = UsersDevices::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            // Si existen registros antiguos duplicados para el mismo equipo,
            // prioriza siempre el que ya fue activado y luego el más reciente.
            $datos['registros'] = $registros = UsersDevices::where($filtros)
                ->orderByDesc('estado')
                ->orderByDesc('id')
                ->get();
            $datos['password'] = $registros[0]->password;

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
        if($request->id_user!='')
            $filtros[] = array('id_user',$request->id_user);
        if($request->alias!='')
            $filtros[] = array('alias',$request->alias);
        if($request->uuid!='')
            $filtros[] = array('uuid',$request->uuid);
        if($request->estado!='')
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

        if($request->password=='')
        {
            $error['password'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            //$campos_requeridos = 1;
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
            // Un dispositivo es único por usuario y UUID. Reutilizar el registro
            // evita generar múltiples solicitudes de activación para el mismo equipo.
            $registro = UsersDevices::where('id_user', $request->id_user)
                ->where('uuid', $request->uuid)
                ->orderByDesc('estado')
                ->orderByDesc('id')
                ->first();

            $registroYaActivo = $registro && (int) $registro->estado === 1;

            if(!$registro)
                $registro = new UsersDevices();

            $registro->id_user = $request->id_user;
            $registro->alias = $request->alias;
            $registro->uuid = $request->uuid;
            $registro->password = $request->password;

            // Una nueva clave no debe desactivar un equipo que ya fue enlazado.
            if(!$registroYaActivo)
                $registro->estado = $request->estado;
            $registro->fecha_ingreso = $request->fecha_ingreso;
            $registro->fecha_termino = $request->fecha_termino;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['requiere_activacion'] = (int) $registro->estado !== 1;
                $datos['msg'] = $registro->wasRecentlyCreated ? 'Registro Creado' : 'Registro Actualizado';
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

                    if(!empty($request->password))
                    $registro->password = $request->password;

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

    public function solicitarAutorizacion(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;
        $persona = '';

        /* VALIDACION CAMPOS */
        if(empty($request->uuid))
        {
            $error['uuid'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if(empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($campos_requeridos==0)
        {
            /** buscar user divices */
            $user_divices = UsersDevices::where('id_user', $request->id_user)
                ->where('uuid', $request->uuid)
                ->orderByDesc('estado')
                ->orderByDesc('id')
                ->first();

            if($user_divices)
            {
                /** buscar usuario */
                $usuario = User::find($user_divices->id_user);
                if($usuario)
                {
                    /** buscar informacion de usuario */
                    $persona = Asistente::where('id_usuario',$usuario->id)->first();
                    if($persona == null)
                    {
                        $persona = Profesional::where('id_usuario',$usuario->id)->first();
                        if($persona == null)
                        {
                            $persona = Paciente::where('id_usuario',$usuario->id)->first();
                            if($persona == null)
                            {
                                $persona = AdminInstServ::where('id_usuario',$usuario->id)->first();
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                            else
                            {
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                        }
                        else
                        {
                            $nombre = $persona->nombre.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                            $rut = $persona->rut;
                            $correo = $persona->email;
                        }
                    }
                    else
                    {
                        $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                        $rut = $persona->rut;
                        $correo = $persona->email;
                    }

                    // El correo debe identificar la cuenta que inició sesión.
                    $nombre = trim((string) $usuario->name) ?: $nombre;
                    $correo = trim((string) $usuario->email) ?: $correo;

                    if((int) $user_divices->estado === 1)
                    {
                        $datos['estado'] = 1;
                        $datos['ya_enlazado'] = true;
                        $datos['msg'] = 'El dispositivo ya se encuentra enlazado.';

                        return response($datos)->header('Content-Type', 'application/json');
                    }

                    $token_id = encrypt($user_divices->id);
                    $url = url('/registro/equipo?t='.$token_id);

                    /** envio de correo */
                    $blade = 'registrar_app';
                    // Desvío temporal para pruebas de activación de dispositivos.
                    // No modifica el correo almacenado en la cuenta del usuario.
                    $correo_pruebas_activacion = 'francisco.rojo.gallardo@gmail.com';
                    $to = array(array(
                        'email' => $correo_pruebas_activacion,
                        'name' => $nombre
                    ));
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Solicitud de Registro de Equipo';
                    $body = array('URL'=>$url, 'NOMBRE_CLIENTE'=> $nombre);
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $datos['envio_correo'] = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Usuario no encontrado';
                    $datos['request'] = $request->all();
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msg'] = 'Dispositivo no encontrado';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    /** METODO NO API */
    public function enlazarEquipo(Request $request)
    {
        $nombre_cliente = '';
        $mensaje_resultado = '';
        if(empty($request->t))
        {
            $nombre_cliente = 'Cliente';
            $mensaje_resultado = 'Se presento un problema encontrando la solicitud de Enlace de Equipo, intente de nuevo.1';
        }
        else
        {
            try{
                $id = decrypt($request->t);
            }
            catch(Exception $e)
            {
                $id = $request->t;
            }

            $registro = UsersDevices::find($id);
            if($registro)
            {

                /** buscar usuario */
                $usuario = User::find($registro->id_user);
                if($usuario)
                {
                    /** buscar informacion de usuario */
                    $persona = Asistente::where('id_usuario',$usuario->id)->first();
                    if($persona == null)
                    {
                        $persona = Profesional::where('id_usuario',$usuario->id)->first();
                        if($persona == null)
                        {
                            $persona = Paciente::where('id_usuario',$usuario->id)->first();
                            if($persona == null)
                            {
                                $persona = AdminInstServ::where('id_usuario',$usuario->id)->first();
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                            else
                            {
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                        }
                        else
                        {
                            $nombre = $persona->nombre.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                            $rut = $persona->rut;
                            $correo = $persona->email;
                        }
                    }
                    else
                    {
                        $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                        $rut = $persona->rut;
                        $correo = $persona->email;
                    }

                    $nombre_cliente = trim((string) $usuario->name) ?: $nombre;

                    $equipoYaEnlazado = (int) $registro->estado === 1;

                    // Versiones antiguas podían crear más de un registro para el
                    // mismo usuario y UUID. El enlace debe activar el equipo
                    // completo para que la app no vuelva a encontrar uno pendiente.
                    $registrosActualizados = UsersDevices::where('id_user', $registro->id_user)
                        ->where('uuid', $registro->uuid)
                        ->update([
                            'estado' => 1,
                            'code' => date('YmdHis'),
                            'updated_at' => now(),
                        ]);

                    if($registrosActualizados > 0)
                    {
                        $mensaje_resultado = $equipoYaEnlazado
                            ? 'Su Equipo ya se encuentra Enlazado.'
                            : 'Su Equipo ha sido registrado con exito.';
                    }
                    else
                    {
                        $mensaje_resultado = 'Se presento un problema al enlazar el Equipo, intente de nuevo.';
                    }


                }
                else
                {
                    $nombre_cliente = 'Cliente';
                    $mensaje_resultado = 'Se presento un problema encontrando información del Usuario, intente de nuevo.';
                }
            }
            else
            {
                $nombre_cliente = 'Cliente';
                $mensaje_resultado = 'Se presento un problema encontrando la solicitud de Enlace de Equipo, intente de nuevo.3';
            }
        }

        return view('app.autorizacion.enlace_equipo_app')->with([
            'nombre_cliente' => $nombre_cliente,
            'mensaje_resultado' => $mensaje_resultado,
        ]);
    }
}
