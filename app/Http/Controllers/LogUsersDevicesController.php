<?php

namespace App\Http\Controllers;

use App\Models\LogLogUsersDevices;
use App\Models\LogUsersDevices;
use Illuminate\Http\Request;

class LogUsersDevicesController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_user_create))
            $filtros[] = array('id_user_create',$request->id_user_create);
        if(!empty($request->id_user_recept))
            $filtros[] = array('id_user_recept',$request->id_user_recept);
        if(!empty($request->msg))
            $filtros[] = array('msg',$request->msg);
        if(!empty($request->tipo))
            $filtros[] = array('tipo',$request->tipo);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        if(!empty($request->fecha_ingreso))
            $filtros[] = array('fecha_ingreso',$request->fecha_ingreso);
        if(!empty($request->fecha_termino))
            $filtros[] = array('fecha_termino',$request->fecha_termino);


        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = LogUsersDevices::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            $registros = LogUsersDevices::where($filtros)->orderBy('id', 'DESC')->get();

             foreach($registros as $key => $value)
             {
                $msg_html_estructura = '';

                switch($value['tipo'])
                {
                    case 1: // rendicion
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        /** peticion */
                        $value['msg_estado'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";
                        else
                            $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada</span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Rechazada</span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Cancelada</span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                    break;

                    case 2: // ficha única
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        else
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada</span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Rechazada</span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Cancelada</span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                    break;

                    case 3: // reserva de hora
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $evento = $data->evento;
                        $fecha = $data->fecha;
                        $hora = $data->hora;
                        $lugar_atencion = $data->lugar_atencion;
                        $profesional = $data->profesional;

                        /** peticion */
                        $value['msg_estado'] = "Usted tiene una Reserva <span class='color-azul txt_bold'>{$evento}</span> por Confirmar, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Usted ha Confirmado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Usted ha Rechazado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";
                        else
                            $value['msg_body'] = "Se ha cancelado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Reserva Confirmada</span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Reserva Rechazada</span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Reserva Cancelada</span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                    break;

                    case 4: // consentimiento informado
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_consentimiento_pcte;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar un Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}. Puede leerlo en su escritorio de Paciente o email.";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Usted ha Autorizado el Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Usted ha Rechazado el Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                        else
                            $value['msg_body'] = "Se ha cancelado la solicitud de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}. Por sobrepasar el tiempo de aprobación.";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Consentimiento Autorizado</span> Consentimiento de {$consentimiento}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Consentimiento Rechazada</span> Consentimiento de {$consentimiento}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Consentimiento Cancelada</span> Consentimiento de {$consentimiento}</p><br>";
                    break;

                    case 5: // revocacion de consentimiento informado
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_consentimiento_pcte;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar una Revocacionde Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Usted ha Confirmado la Revocación de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Usted ha Rechazado la Revocacion de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                        else
                            $value['msg_body'] = "Se ha cancelado la Revocación de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}. Por sobrepasar el tiempo de aprobación.";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Revocación de Consentimiento Confirmada</span> {$consentimiento}.<br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Revocación de Consentimiento Rechazada</span> {$consentimiento}.<br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Revocación de Consentimiento Cancelada</span> {$consentimiento}.<br>";
                    break;

                    case 6: //  solicitud alta voluntaria
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_sol_alta;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar una <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span>.";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Usted ha Autorizado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span></span>.";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Usted ha Rechazado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span>.";
                        else
                            $value['msg_body'] = "Se ha cancelado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span>. Por sobrepasar el tiempo de aprobación.";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud de Alta Voluntaria Autorizada</span></p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud de Alta Voluntaria Rechazada</span></p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud de Alta Voluntaria Cancelada</span></p><br>";
                    break;

                    case 7: //  rechazo de tratamiento
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_rechazo_trtt;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span>.";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Usted ha Autorizado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span></span>.";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Usted ha Rechazado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span>.";
                        else
                            $value['msg_body'] = "Se ha cancelado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span>. Por sobrepasar el tiempo de aprobación.";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Autorizada</span></p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Rechazada</span></p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Cancelada</span></p><br>";
                    break;


                    case 8: //  Profesional Provisorio
                         $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span>.";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Usted ha Autorizado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span></span>.";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Usted ha Rechazado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span>.";
                        else
                            $value['msg_body'] = "Se ha cancelado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span>. Por sobrepasar el tiempo de aprobación.";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Invitación a un Profesional Provisorio Autorizada</span></p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Invitación a un Profesional Provisorio Rechazada</span></p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Invitación a un Profesional Provisorio Cancelada</span></p><br>";
                    break;

					case 9: //  modificar antecedentes medicos de paciente
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando su autorizacion para modificar sus antecedentes médicos";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha sido Autorizado con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha sido Rechazado con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        else
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha cancelado su autorización con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada</span> El Profesional {$nombre} ha sido autorizado con fecha {$fecha}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Rechazada</span> El Profesional {$nombre} ha sido notificado con fecha {$fecha}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Cancelada</span> El Profesional {$nombre} ha recibido la cancelacion de autorización con fecha {$fecha}</p><br>";
                    break;

                    case 10: //  notificar ges
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> Notifica Patologia GES";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha<span class='color-azul txt_bold'>{$fecha}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha<span class='color-azul txt_bold'>{$fecha}</span>";
                        else
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                    break;

                    case 11: //  autorizacion compin paciente
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> Notificación COMPIN";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita Notificación COMPIN con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita Notificación COMPIN con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        else
                            $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita Notificación COMPIN con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita Notificación COMPIN con fecha {$fecha}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita Notificación COMPIN con fecha {$fecha}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita Notificación COMPIN con fecha {$fecha}</p><br>";
                    break;

                    case 12: //  autorizacion compin profesional
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Profesional esta por Iniciar Licencia";

                        /** resultado */
                        if($value['estado'] == 1)
                            $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        elseif($value['estado'] == 2)
                            $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                        else
                            $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** lista log */
                        if($value['estado'] == 1)
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Creacion de Licencia</span> con fecha {$fecha}</p><br>";
                        elseif($value['estado'] == 2)
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Creacion de Licencia</span> con fecha {$fecha}</p><br>";
                        else
                            $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Creacion de Licencia</span> con fecha {$fecha}</p><br>";
                    break;


                }


                $value['msg_html'] = $msg_html_estructura;
             }

             $datos['registros'] = $registros;

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
        if(!empty($request->id_user_create))
            $filtros[] = array('id_user_create',$request->id_user_create);
        if(!empty($request->id_user_recept))
            $filtros[] = array('id_user_recept',$request->id_user_recept);
        if(!empty($request->msg))
            $filtros[] = array('msg',$request->msg);
        if(!empty($request->tipo))
            $filtros[] = array('tipo',$request->tipo);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        if(!empty($request->fecha_ingreso))
            $filtros[] = array('fecha_ingreso',$request->fecha_ingreso);
        if(!empty($request->fecha_termino))
            $filtros[] = array('fecha_termino',$request->fecha_termino);

        if($campos_requeridos==0)
        {

            $cant_reg = LogUsersDevices::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = LogUsersDevices::where($filtros)->find($request->id);

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

        $registro = new LogUsersDevices();


        /* VALIDACION CAMPOS */
        if($request->id_user_create=='')
        {
            $error['id_user_create'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_user_recept=='')
        {
            $error['id_user_recept'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->msg=='')
        {
            $error['msg'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->tipo=='')
        {
            $error['tipo'] = 'campo requerido';
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
            $registro->id_user_create = $request->id_user_create;
            $registro->id_user_recept = $request->id_user_recept;

            $registro->msg = $request->msg;
            $registro->tipo = $request->tipo;

            $registro->estado = $request->estado;


            $fecha =date('Y-m-d');
            $hora = date('H:i:s');
            $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
            $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '-'.env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
            $fecha_expira = date ( 'Y-m-d H:i:s' ,strtotime ( '-'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+6).' hours' , strtotime ($fecha_actual) ) );

            $registro->fecha_ingreso = $fecha_actual;
            $registro->fecha_termino = $fecha_vencimiento;
            $registro->fecha_exp = $fecha_expira;
            $registro->token = md5(uniqid());

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

        if($request->id_user_create=='')
        {
            $error['id_user_create'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_user_recept=='')
        {
            $error['id_user_recept'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->msg=='')
        {
            $error['msg'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->tipo=='')
        {
            $error['tipo'] = 'campo requerido';
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

            $registro = LogUsersDevices::find($request->id);

            if(count($registro))
            {

                if(!empty($request->id_user_create))
                    $registro->id_user_create = $request->id_user_create;
                if(!empty($request->id_user_recept))
                    $registro->id_user_recept = $request->id_user_recept;

                if(!empty($request->msg))
                    $registro->msg = $request->msg;
                if(!empty($request->tipo))
                    $registro->tipo = $request->tipo;
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

            $registro = LogUsersDevices::find($request->id);

            if($registro->count()>0)
            {
                if($registro->estado == 0)
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
                    $datos['estado'] = 2;
                    $datos['estado_registro'] = $registro->estado;
                    $datos['msg'] = 'Registro ya actualizado';
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

    public function checkStateSol(){ // CRON CADA 1 MIN

        $registros = LogUsersDevices::whereIn('estado',[0,1])->get();

        if($registros)
        {
            foreach($registros as $key => $value)
            {

                $fecha_actual = date('Y-m-d H:i:s');
                $fecha_exp = $value['fecha_exp'];
                if($fecha_exp==null)
                {
                    $value->estado = 3;
                    $value->save();
                }else{
                    $segundos = strtotime($fecha_exp) - strtotime($fecha_actual);
                    if($segundos<0)
                    {
                        $value->estado = 3;
                        $value->save();
                    }
                }
            }
        }

    }

    public function genSolicitud(Request $request)
    {
        /* params generatePermApp() */
        /* $id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo = 'confirmacion' */
        $id_user_create = 3;
        $id_user_recept = 3;
        $evento = 'Ficha Única';
        $nombre = 'Paul';
        $apellido_p = 'Baeza';
        $apellido_m = 'Del Canto';
        $lugar = 'Clinica';
        $profesional = 'Jaime Kriman';
        $tipo = 'confirmacion';

        $datos = Funciones::generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo);

        return response($datos)->header('Content-Type', 'application/json');
    }
}
