<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContratoDependiente;
use App\Models\ContratoHistorico;
use Illuminate\Http\Request;

class ManejoContratoController extends Controller
{
    /** MANEJO DE CONTRATO  */
    public function verContrato(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registro = ContratoDependiente::where($filtro)
                                            ->with(['Historico' => function ($query){
                                                $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                            }])
                                            ->first();
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function verContratoEmpleado(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registros = ContratoDependiente::where($filtro)
                                        ->with(['Historico' => function ($query){
                                            $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                        }])
                                        ->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function verHorarioEmpleado(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registros = ContratoDependiente::select('id','tipo_empleado','id_empleado','id_institucion','id_lugar_atencion','dias_laborales','hora_ingreso','hora_salida','hora_inicio_colacion','hora_termino_colacion')
                                        ->where($filtro)
                                        ->with(['Historico' => function ($query){
                                            $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                        }])
                                        ->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrarContrato(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();


        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_contrato))
        {
            $error['tipo_contrato'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha_inicio))
        {
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->monto_imponible))
        {
            $error['monto_imponible'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->dias_laborales))
        {
            $error['dias_laborales'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_ingreso))
        {
            $error['hora_ingreso'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_salida))
        {
            $error['hora_salida'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_inicio_colacion))
        {
            $error['hora_inicio_colacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_termino_colacion))
        {
            $error['hora_termino_colacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_admin_creador))
        {
            $error['id_admin_creador'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_admin_creador))
        {
            $error['id_tipo_admin_creador'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $contrato = new ContratoDependiente();

            $contrato->tipo_empleado = $request->tipo_empleado;
            $contrato->id_empleado = $request->id_empleado;
            $contrato->id_institucion = $request->id_institucion;
            $contrato->id_lugar_atencion = $request->id_lugar_atencion;
            $contrato->tipo_contrato = $request->tipo_contrato;
            $contrato->fecha_inicio = $request->fecha_inicio;
            $contrato->fecha_termino = $request->fecha_termino;
            $contrato->monto_imponible = $request->monto_imponible;
            $contrato->locomocion = $request->locomocion;
            $contrato->locomocion_porcentaje = $request->locomocion_porcentaje;
            $contrato->colacion = $request->colacion;
            $contrato->colacion_porcentaje = $request->colacion_porcentaje;
            $contrato->asignacion_familiar = $request->asignacion_familiar;
            $contrato->asignacion_familiar_cantidad = $request->asignacion_familiar_cantidad;
            $contrato->caja_compensacion = $request->caja_compensacion;
            $contrato->caja_compensacion_porcentaje = $request->caja_compensacion_porcentaje;
            $contrato->otro = $request->otro;
            $contrato->dias_laborales = $request->dias_laborales;
            $contrato->hora_ingreso = $request->hora_ingreso;
            $contrato->hora_salida = $request->hora_salida;
            $contrato->hora_inicio_colacion = $request->hora_inicio_colacion;
            $contrato->hora_termino_colacion = $request->hora_termino_colacion;
            $contrato->fecha_creacion = $request->fecha_creacion;
            $contrato->id_admin_creador = $request->id_admin_creador;
            $contrato->id_tipo_admin_creador = $request->id_tipo_admin_creador;
            $contrato->texto_contrato = $request->texto_contrato;
            $contrato->pdf_base = $request->pdf_base;
            $contrato->estado_firmado = $request->estado_firmado;
            $contrato->pdf_firmado = $request->pdf_firmado;
            $contrato->estado_inspeccion_trabajo = $request->estado_inspeccion_trabajo;
            $contrato->otro_2 = $request->otro_2;
            $contrato->estado = $request->estado;

            if($contrato->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro realizado';
                $datos['last_id'] = $contrato->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registro';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
    }

    /** MANEJO DE HISTORICO */
    public function registrarHistorico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(!empty($request->id_contrato))
        {
            $error['id_contrato'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->data))
        {
            $error['data'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->fecha))
        {
            $error['fecha'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->hora))
        {
            $error['hora'] = 'campo requerido';
            $valido = 1;
        }

        if($valido == 1)
        {
            $historico = new ContratoHistorico();
            $historico->id_contrato = $request->id_contrato;
            $historico->id_user = $request->id_user;
            $historico->data = $request->data;
            $historico->fecha = $request->fecha;
            $historico->hora = $request->hora;
            $historico->tipo_verificacion_usuario = $request->tipo_verificacion_usuario;
            $historico->codigo_verificacion_usuario = $request->codigo_verificacion_usuario;
            $historico->fecha_codigo_usuario = $request->fecha_codigo_usuario;
            $historico->tipo_verificacion_tercero = $request->tipo_verificacion_tercero;
            $historico->codigo_verificacion_tercero = $request->codigo_verificacion_tercero;
            $historico->fecha_codigo_tercero = $request->fecha_codigo_tercero;
            $historico->procesado = $request->procesado;

            if($historico->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['last_id'] = $historico->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registro';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }


        return $datos;
    }

}
