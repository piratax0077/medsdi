<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\LogUsersDevices;
use Illuminate\Http\Request;

class LicenciaAprobacionController extends Controller
{
    public function licenciaEvaluacion(Request $request)
    {
        $datos = array();
        $error = array();
        $mensaje = '';
        $mensaje_final = '';
        $valido = 1;

        if($valido)
        {
            $return_check = Funciones::checkStatePermApp($request->token);
            if($return_check['estado'] == 1)
            {
                /** token encontrado */
                $registro = $return_check['registro'];

                if($registro->estado == 1)
                {
                    $mensaje_final = 'Autorización ya Confirmada.';
                }
                else if($registro->estado == 2)
                {
                    $mensaje_final = 'Autorización ya Rechazada.';
                }
                else if($registro->estado == 3)
                {
                    $mensaje_final = 'Autorización ya Cancelada o Vencida.';
                }
                else
                {
                    $log_user = LogUsersDevices::find($registro->id);
                    if($log_user)
                    {
                        if($request->proceso == 'aceptar')
                        {
                            $log_user->estado = 1;
                            $mensaje = 'Usted ha Confirmado el Inicio de la Licencia';
                        }
                        else if($request->proceso == 'rechazar')
                        {
                            $log_user->estado = 2;
                            $mensaje = 'Usted ha Rechazado el Inicio de la Licencia';
                        }
                        else
                        {
                            $log_user->estado = 3;
                            $mensaje = 'Se ha Cancelado el Inicio de la Licencia';
                        }

                        if($log_user->save())
                        {
                            $mensaje_final = $mensaje;
                        }
                    }
                    else
                    {
                        $mensaje_final = 'Autorización no encontrada.';
                    }
                }

            }
            else
            {
                // token no encontrado
                $mensaje_final = 'Autorización no encontrada.';
            }
        }
        else
        {
            $mensaje_final = 'Autorización no encontrada.<br/>Token no valido';
        }

        return view('general.licencia.procesar')->with(array('mensaje' => $mensaje_final ));

    }
}
