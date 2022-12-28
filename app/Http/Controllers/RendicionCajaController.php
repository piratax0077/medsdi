<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\Bono;
use App\Models\RendicionCaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendicionCajaController extends Controller
{
    public function rendirCajaDiariaInstitucion(Request $request)
    {
        // tipo_rendicion
        // bonos
        // id_asistente
        // fecha_rendicion
        // total_documentos
        // total_bono
        // total_efectivo
        // total_otros
        // id_asistente_receptor
        // fecha_recepcion
        // codigo_autorizacion
        // observacion
        // otro
        // estado
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->bonos))
        {
            $error['bonos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente_receptor))
        {
            $error['id_asistente_receptor'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $tipo_rendicion = 1; // rendicion caja institucion
            $asistenteRendicion = Asistente::where('id_usuario', Auth::user()->id)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');
            $asistenteReceptor = Asistente::where('id', $request->id_asistente_receptor)->first();
            $bonos = $request->bonos;

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $detalle_bonos = Bono::whereIn('id',explode('|', $bonos))->get();
            if($detalle_bonos)
            {
                $datos['update_bonos'] = array();
                foreach ($detalle_bonos as $key_bono => $value_bono)
                {
                    $bono = Bono::find($value_bono->id);
                    $bono->rendido = 1;// en proceso de rendicion

                    if($bono->save())
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 1;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 0;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
                    }

                    $total++;
                    // 1->Bono Fisico
                    if($value_bono->id_clase_bono == 1)
                        $total_bonos++;
                    // 2->Sencillito
                    else if($value_bono->id_clase_bono == 2)
                        $total_bonos++;
                    // 3->Caja Vecina
                    else if($value_bono->id_clase_bono == 3)
                        $total_bonos++;
                    // 4->Bono Web
                    else if($value_bono->id_clase_bono == 4)
                        $total_bonos++;
                    // 5->Bono Web Pre-Pago
                    else if($value_bono->id_clase_bono == 5)
                        $total_bonos++;
                    // 6->Particular
                    else if($value_bono->id_clase_bono == 6)
                        $total_efectivo += $value_bono->valor_atencion;
                    else
                        $total_otros++;
                }
            }

            $rendicionCaja = new RendicionCaja();

            $rendicionCaja->tipo_rendicion = $tipo_rendicion;

            $rendicionCaja->bonos = $bonos;

            $rendicionCaja->id_asistente = $asistenteRendicion->id;
            $rendicionCaja->fecha_rendicion = $fecha_rendicion;

            $rendicionCaja->total_documentos = $total;
            $rendicionCaja->total_bono = $total_bonos;
            $rendicionCaja->total_efectivo = $total_efectivo;
            $rendicionCaja->total_otros = $total_otros;

            $rendicionCaja->id_asistente_receptor = $asistenteReceptor->id;
            // $rendicionCaja->fecha_recepcion = ;
            $rendicionCaja->codigo_autorizacion = '';
            $rendicionCaja->observacion = '';
            $rendicionCaja->otro = '';
            $rendicionCaja->estado = 0;

            if($rendicionCaja->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro de Rendicion';
                $datos['last_id'] = $rendicionCaja->id;


                $registro = RendicionCaja::where('id', $rendicionCaja->id)
                    ->with(['Asistente' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    ->with(['AsistenteReceptor' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    ->first();

                $datos['registro'] = $registro;

                /** SOLICITAR AUTORIZACION POR APP */
                if(1==1){
                    $datos['msj_autorizacion'] = 'Solicitud de aprobacion enviada';
                }
                else
                {
                    $datos['msj_autorizacion'] = 'Solicitud de aprobacion con falla';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }
}
