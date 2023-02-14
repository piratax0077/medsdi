<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\LogUsersDevices;

class Funciones{
    function __construct()
    {
     
    }

    public function generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo = 'confirmacion'){

        /** calculo de periodo de vigencia para aprobacion */
        $fecha =date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
        $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '-'.env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
        $fecha_expira = date ( 'Y-m-d H:i:s' ,strtotime ( '-'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+6).' hours' , strtotime ($fecha_actual) ) );

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

        if($log_users_devices->save())
        {
            $datos['app']['estado'] = 1;
            $datos['app']['msj'] = $msj;
            $datos['app']['fecha_inicio'] = $fecha_actual;
            $datos['app']['fecha_termino'] = $fecha_vencimiento;
            $datos['app']['tiempo'] = env('TIEMPO_ESPERA');
            $datos['app']['last_id'] = $log_users_devices->id;

        }
        else
        {
            $datos['app']['estado'] = 0;
            $datos['app']['msj'] = 'Solicitud de aprobacion con falla';
        }

        return $datos;
    }
}