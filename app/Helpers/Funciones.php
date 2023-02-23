<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\LogUsersDevices;

class Funciones{
    function __construct()
    {
     
    }

    public function disablePermApp($token){
        $datos = array();
        $registro = LogUsersDevices::where('token',trim($token))->first();
        if($registro->count() > 0)
        {
            $registro->estado = 3;
            $registro->save();
            $datos['estado'] = 1;
            $datos['msj'] = 'registro encontrado';
           
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;
    }

    public function checkStatePermApp($token)
    {
        $datos = array();
        $registro = LogUsersDevices::where('token',trim($token))->first();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro encontrado';
            $datos['registro'] = $registro;
            /* Fecha Exp */
            $fechaInicial = $registro->fecha_ingreso;
            $fechaFinal = $registro->fecha_termino;
            $fechaExp = $registro->fecha_exp;
            $segundos = strtotime($fechaExp) - strtotime($fechaInicial);
            $datos['tiempo'] = $segundos;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['registro']['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;

    }

    public function validTokenPermApp($token)
    {
        if($token)
        {
            $state = Funciones::checkStatePermApp($token);   
            if($state['registro']['estado'] != 1)
            {
             abort(401);
            }
        }else{
            abort(401);
        }
    }

    public function generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo = 'confirmacion'){

        $datos = array();
        /** calculo de periodo de vigencia para aprobacion */
        $fecha =date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
        $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.(int)env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
        $fecha_expira = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+(int)env('TIEMPO_EXP_PERMISO')).' hours' , strtotime ($fecha_actual) ) );

        $id = LogUsersDevices::latest()->first();
        if(is_object($id)==false)
        $id=0;
        else
        $id = LogUsersDevices::latest()->first()->id;

        $msj = array(
            'id' => ($id+1),
            'nombre' => mb_strtoupper($nombre.' '.$apellido_p.' '.$apellido_m),
            'evento' => $evento,
            'fecha' => $fecha,
            'hora' => $hora,
            'lugar_atencion' => $lugar,
            'profesional' => $profesional,
            'tipo' => $tipo
        );

        $log_users_devices = new LogUsersDevices();
        $log_users_devices->id_user_create = $id_user_create;
        $log_users_devices->id_user_recept = $id_user_recept;
        $log_users_devices->msg = json_encode($msj);
        $log_users_devices->estado = 0;
        $log_users_devices->fecha_ingreso = $fecha_actual;
        $log_users_devices->fecha_termino = $fecha_vencimiento;
        $log_users_devices->tipo = 3; // confirmacion hora
        $log_users_devices->token = md5(uniqid());
        $log_users_devices->fecha_exp = $fecha_expira;

        if($log_users_devices->save())
        {
            $datos['app']['estado'] = 1;
            $datos['app']['msj'] = $msj;
            $datos['app']['fecha_inicio'] = $fecha_actual;
            $datos['app']['fecha_termino'] = $fecha_vencimiento;
            $datos['app']['fecha_exp'] = $fecha_expira;
            $datos['app']['tiempo'] = env('TIEMPO_ESPERA');
            $datos['app']['last_id'] = $log_users_devices->id;
            $datos['app']['token'] = $log_users_devices->token;

        }
        else
        {
            $datos['app']['estado'] = 0;
            $datos['app']['msj'] = 'Solicitud de aprobacion con falla';
        }

        return $datos;
    }
}