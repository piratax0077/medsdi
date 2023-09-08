<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\LogUsersDevices;
use App\Models\Profesional;
use App\Models\Paciente;
use App\Models\Asistente;
use App\Models\AdminInstServ;

class Funciones{
    function __construct()
    {

    }

    public function userData($id_usuario)
    {
        /*
        * profesionales
        id,nombre,apellido_uno,apellido_dos,sexo,rut,email,telefono_uno,telefono_dos,

        * pacientes
        id,nombres,apellido_uno,apellido_dos,telefono_uno,telefono_dos,profesion,sexo,email,fecha_nac

        * asistentes
        id,nombres,apellido_uno,apellido_dos,telefono_uno,telefono_dos,sexo,email,fecha_nac

        *admin_inst_serv
        id,rut,nombres,apellido_uno,apellido_dos,telefono_uno,telefono_dos,sexo,email,fecha_nac
        */

         /* DATOS USUARIO - LOGEADO */
         $usuario = array(
            'nombre' => '',
            'apellido_uno' => '',
            'apellido_dos' => '',
            'sexo' => '',
            'rut' => '',
            'email' => '',
            'telefono_uno' => '',
            'telefono_dos' => '',
            'profesion' => '',
            'fecha_nac' => '',
         );

         $profesional_ = Profesional::with('Especialidad')->where('id_usuario',$id_usuario)->first();
         if($profesional_)
         {
            $usuario['nombre'] = $profesional_->nombre;
            $usuario['apellido_uno'] = $profesional_->apellido_uno;
            $usuario['apellido_dos'] = $profesional_->apellido_dos;
            $usuario['sexo'] = $profesional_->sexo;
            $usuario['rut'] = $profesional_->rut;
            $usuario['email'] = $profesional_->email;
            $usuario['telefono_uno'] = $profesional_->telefono_uno;
            $usuario['telefono_dos'] = $profesional_->telefono_dos;
            $usuario['profesion'] = $profesional_->Especialidad->nombre;
            //$usuario['fecha_nac'] = $profesional_->fecha_nac;
         }
         $paciente_ = Paciente::where('id_usuario',$id_usuario)->first();
         if($paciente_)
         {
            $usuario['nombre'] = $paciente_->nombres;
            $usuario['apellido_uno'] = $paciente_->apellido_uno;
            $usuario['apellido_dos'] = $paciente_->apellido_dos;
            $usuario['sexo'] = $paciente_->sexo;
            $usuario['rut'] = $paciente_->rut;
            $usuario['email'] = $paciente_->email;
            $usuario['telefono_uno'] = $paciente_->telefono_uno;
            $usuario['telefono_dos'] = $paciente_->telefono_dos;
            $usuario['profesion'] = $paciente_->profesion;
            $usuario['fecha_nac'] = $paciente_->fecha_nac;
         }
         $asistente_ = Asistente::where('id_usuario',$id_usuario)->first();
         if($asistente_)
         {
            $usuario['nombre'] = $asistente_->nombres;
            $usuario['apellido_uno'] = $asistente_->apellido_uno;
            $usuario['apellido_dos'] = $asistente_->apellido_dos;
            $usuario['sexo'] = $asistente_->sexo;
            //$usuario['rut'] = $asistente_->rut;
            $usuario['email'] = $asistente_->email;
            $usuario['telefono_uno'] = $asistente_->telefono_uno;
            $usuario['telefono_dos'] = $asistente_->telefono_dos;
            //$usuario['profesion'] = $asistente_->profesion;
            $usuario['fecha_nac'] = $asistente_->fecha_nac;
         }
         $adminInstServ_ = AdminInstServ::where('id_admin',$id_usuario)->first();
         if($adminInstServ_)
         {
            $usuario['nombre'] = $adminInstServ_->nombres;
            $usuario['apellido_uno'] = $adminInstServ_->apellido_uno;
            $usuario['apellido_dos'] = $adminInstServ_->apellido_dos;
            $usuario['sexo'] = $adminInstServ_->sexo;
            $usuario['rut'] = $adminInstServ_->rut;
            $usuario['email'] = $adminInstServ_->email;
            $usuario['telefono_uno'] = $adminInstServ_->telefono_uno;
            $usuario['telefono_dos'] = $adminInstServ_->telefono_dos;
            //$usuario['profesion'] = $adminInstServ_->profesion;
            $usuario['fecha_nac'] = $adminInstServ_->fecha_nac;
         }

     /* FIN DATOS USUARIO - LOGEADO */

        return $usuario;
    }

    public function disablePermApp($token){
        $datos = array();
        $registro = LogUsersDevices::where('token',trim($token))->first();
        if($registro)
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
            }else{
                return $state['registro'];
               }
        }else{
            abort(401);
        }
    }

    public function generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo = 'confirmacion',$tipo_id){

        $datos = array();
        /** calculo de periodo de vigencia para aprobacion */
        $fecha = date('Y-m-d');
        $hora =  date('H:i:s');
        $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
        $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.(int)env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
        $fecha_expira = date ('Y-m-d H:i:s' ,strtotime ( '+'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+(int)env('TIEMPO_EXP_PERMISO')).' hours' , strtotime ($fecha_actual) ) );

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
        if($tipo_id != 12)
        {
            if($id_user_create == $id_user_recept)
                $log_users_devices->estado = 1;
            else
                $log_users_devices->estado = 0;
        }
        else
        {
            $log_users_devices->estado = 0;
        }
        $log_users_devices->fecha_ingreso = $fecha_actual;
        $log_users_devices->fecha_termino = $fecha_vencimiento;
        $log_users_devices->tipo = $tipo_id; // check sdi // ESTRUCTURA DE TEXTO
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
