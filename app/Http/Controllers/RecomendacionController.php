<?php

namespace App\Http\Controllers;

use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use Illuminate\Http\Request;

class RecomendacionController extends Controller
{
    /** RECOMENDACIONES */
    public function registrarRecomendacion_r(Request $request)
    {
        return $this->registrarRecomendacion($request->atencion, $request->salida, $request->herir, $request->cuadro, $request->activo, $request->aficionado, $request->control, $request->cod_doc, $request->cod_auto, $request->info);
    }

    public function registrarRecomendacion($atencion, $salida, $herir, $cuadro, $activo, $aficionado, $control, $cod_doc, $cod_auto, $info)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($atencion) && empty($salida) && empty($herir) && empty($cuadro))
        {
            $error['ID ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($atencion)) // id_ficha_atencion
        // {
        //     $error['FICHA ATENCION'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($salida)) // id_ingreso_paciente
        // {
        //     $error['INGRESO PACIENTE'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($herir)) // id_recuperacion
        // {
        //     $error['RECUPERACION'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($cuadro)) // id_sala
        // {
        //     $error['SALA'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($activo)) // id_paciente
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($aficionado)) // id_profesional
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($control)) // id_tipo_control
        {
            $error['TIPO CONTROL'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($cod_doc)) // token_doc
        // {
        //     $error['TOKEN DOC'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($cod_auto)) // token_auto
        // {
        //     $error['TOKEN AUTO'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($info)) // token_auto
        // {
        //     $error['PDF'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {
            $registro = new Recomendacion();
            $registro->atencion = $atencion;
            $registro->salida = $salida;
            $registro->herir = $herir;
            $registro->cuadro = $cuadro;
            $registro->activo = $activo;
            $registro->aficionado = $aficionado;
            $registro->control = $control;
            $registro->cod_doc = $cod_doc; // AGREGAR CLAVE DE SEGURIDAD DIARIA
            $registro->cod_auto = $cod_auto;
            $registro->info = $info;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Exito';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en registro Recomendacion';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /** RECOMENDACION DETALLE */
    public function registrarDetalle_r(Request $request)
    {
        return $this->registrarDetalle($request->id_recomendacion, $request->control, $request->id_articulo, $request->articulo, $request->componente, $request->id_apariencia, $request->apariencia, $request->id_cuota, $request->cuota, $request->id_regimen, $request->regimen, $request->id_lapso, $request->lapso, $request->uso_frecuente, $request->volumen_compra, $request->volumen, $request->volumen_entregado, $request->comentario, $request->cod_doc);
    }

    public function registrarDetalle($id_recomendacion, $control, $id_articulo, $articulo, $componente, $id_apariencia, $apariencia, $id_cuota, $cuota, $id_regimen, $regimen, $id_lapso, $lapso, $uso_frecuente, $volumen_compra, $volumen, $volumen_entregado, $comentario, $cod_doc)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_recomendacion)) //id_receta
        {
            $error['RECETA'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($control)) //id_tipo_control
        {
            $error['TIPO CONTROL'] = 'campo requerido';
            $valido = 0;
        }
        else if($control != 8)
        {
            if(empty($componente)) //producto
            {
                $error['FARMACO'] = 'campo requerido';
                $valido = 0;
            }
        }

        // if(empty($id_articulo)) //id_producto
        // {
        //     $error['N° PRODUCTO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($articulo)) //producto
        {
            $error['PRODUCTO'] = 'campo requerido';
            $valido = 0;
        }



        // if(empty($id_apariencia)) //id_presentacion
        // {
        //     $error['ID PRESENTACION'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($apariencia)) //presentacion
        {
            $error['PRESENTACION'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($id_cuota)) //id_receta_dosis
        // {
        //     $error['ID POSOLOGIA'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($cuota)) //posologia
        {
            $error['POSOLOGIA'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($id_regimen)) //id_via_administracion
        // {
        //     $error['ID VIA ADMINISTRACION'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($regimen)) //via_administracion
        {
            $error['VIA ADMINISTRACION'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($id_lapso)) //id_periodo
        // {
        //     $error['ID PERIODO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($lapso)) //periodo
        {
            $error['PERIODO'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($uso_frecuente)) //uso_cronico
        // {
        //     $error['USO CRONICO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($volumen_compra)) //cantidad_compra
        {
            $error['CANTIDAD COMPRA'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($volumen)) //cantidad
        {
            $error['CANTIDAD'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($volumen_entregado)) //cantidad_vendida
        // {
        //     $error['CANTIDAD VENDIDA'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($comentario)) //comentario
        // {
        //     $error['COMENTARIO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($cod_doc)) //token_doc
        {
            $error['TOKEN DOC'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new RecomendacionDetalle();
            $registro->id_recomendacion = $id_recomendacion; //id_receta
            $registro->control = encrypt($control); //id_tipo_control
            if($control == 8)
            {
                $registro->id_articulo = encrypt('0'); //id_producto
                $registro->articulo = encrypt($id_articulo); //producto
            }
            else
            {
                $registro->id_articulo = encrypt($id_articulo); //id_producto
                $registro->articulo = encrypt($articulo); //producto
            }
            $registro->componente = encrypt($componente); //farmaco
            $registro->id_apariencia = encrypt($id_apariencia); //id_presentacion
            $registro->apariencia = encrypt($apariencia); //presentacion
            $registro->id_cuota = encrypt($id_cuota); //id_receta_dosis
            $registro->cuota = encrypt($cuota);//posologia
            $registro->id_regimen = encrypt($id_regimen); //id_via_administracion
            $registro->regimen = encrypt($regimen); //via_administracion
            $registro->id_lapso = encrypt($id_lapso); //id_periodo
            $registro->lapso = encrypt($lapso); //periodo
            $registro->uso_frecuente = encrypt($uso_frecuente); //uso_cronico
            $registro->volumen_compra = encrypt($volumen_compra); //cantidad_compra
            $registro->volumen = encrypt($volumen); //cantidad
            $registro->volumen_entregado = encrypt($volumen_entregado); //cantidad_vendida
            $registro->comentario = encrypt($comentario); //comentario
            $registro->cod_doc = encrypt($cod_doc); //token_doc

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Exito';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en registro de detalle';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /** REGISTRO DE RECETA  */
    public function registroRecomendacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($request->id_ficha) && empty($request->id_ingreso_paciente) && empty($request->id_recuperacion) && empty($request->id_sala) )
        {
            $error['ID ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->id_tipo_control))
        // {
        //     $error['TIPO RECETA'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {
            $id_receta = $request->id_receta;
            $id_ficha_atencion = $request->id_ficha;
            $id_ingreso_paciente = $request->id_ingreso_paciente;
            $id_recuperacion = $request->id_recuperacion;
            $id_sala = $request->id_sala;
            $id_paciente = $request->id_paciente;
            $id_profesional = $request->id_profesional;
            $id_lugar_atencion = $request->id_lugar_atencion;
            // $id_tipo_control = $request->id_tipo_control;
            $pdf = '';
            $token_doc_temp = (object)CertificadoController::certificadoDocumento((int)$id_ficha_atencion, (int)$id_profesional, (int)$id_paciente, 1);
            $token_doc = $token_doc_temp->certificado;


            /** BUSCAR CABECERA */
            $registros_recomendacion = Recomendacion::where( 'atencion', $id_ficha_atencion )->get();

            if($registros_recomendacion)
            {
                foreach ($registros_recomendacion as $key => $value)
                {
                    /** LIMPIAR DETALLE */
                    $borrar_detalle = RecomendacionDetalle::where( 'id_recomendacion', $value->id )->delete();

                    /** LIMPIAR CABECERAS */
                    $borrar_cabecera = Recomendacion::where( 'id', $value->id )->delete();

                    $datos['borrar_detalle'][] = $borrar_detalle;
                    $datos['borrar_cabecera'][] = $borrar_cabecera;
                }
            }

            /** DIVIDIR DETALLE */
            $med_tipo_control = array();
            $medicamentos = json_decode($request->medicamentos);
            if ($request->medicamentos !== '[]' )
            {
                foreach ($medicamentos as $key => $value)
                {
                    switch (intval($value->id_tipo_control))
                    {
                        case 4: //Receta retenida
                        case 6: //Receta Simple
                        case 7: //Venta Directa
                            $med_tipo_control[6][] = $value;
                            break;
                        case 1: //Receta retenida con control de Psicotrópicos
                            $med_tipo_control[1][] = $value;
                            break;
                        case 2: //Receta retenida con control de Estupefacientes
                            $med_tipo_control[2][] = $value;
                            break;
                        case 3: //Receta Cheque
                            $med_tipo_control[3][] = $value;
                            break;
                        case 5: //Receta retenida con control de Codeína
                            $med_tipo_control[5][] = $value;
                            break;
                        case 8: //Magistral
                            $med_tipo_control[8][] = $value;
                            break;
                    }
                }
            }

            // echo json_encode($med_tipo_control);
            /** RECORRER TIPO CONTROL */
            foreach ($med_tipo_control as $key_2 => $value_2)
            {

                if(!empty($value_2))
                {
                    // var_dump($value_2);

                    /** CREAR CABECERA POR TIPO TIPO CONTRO */
                    $registro = (object)$this->registrarRecomendacion(  $id_ficha_atencion, // $atencion
                                                                $id_ingreso_paciente, // $salida
                                                                $id_recuperacion, // $herir
                                                                $id_sala, // $cuadro
                                                                $id_paciente, // $activo
                                                                $id_profesional, // $aficionado
                                                                $key_2, // $control
                                                                $token_doc, // $cod_doc
                                                                session('lic_token'),// $token_auto, // $cod_auto
                                                                $pdf, // $info
                                                            );
                    if($registro->estado)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Registro de Receta';
                        $datos['recomendacion'][$key_2]['cabecera'] = $registro;

                        $exito = 0;
                        $falla = 0;
                        /** CARGA DETALLE  */
                        foreach ($value_2 as $key_3 => $value_3)
                        {
                            $detalle_registro = (object) $this->registrarDetalle(   $registro->last_id,
                                                                                    $value_3->id_tipo_control, // $control
                                                                                    $value_3->id_producto, // $id_articulo
                                                                                    $value_3->producto, // $articulo
                                                                                    $value_3->componente, // $farmaco
                                                                                    $value_3->id_dosis, // $id_apariencia
                                                                                    $value_3->dosis, // $apariencia
                                                                                    $value_3->id_posologia, // $id_cuota
                                                                                    $value_3->posologia, // $cuota
                                                                                    $value_3->id_via_administracion, // $id_regimen
                                                                                    $value_3->via_administracion, // $regimen
                                                                                    $value_3->id_periodo, // $id_lapso
                                                                                    $value_3->periodo, // $lapso
                                                                                    $value_3->uso_cronico, // $uso_frecuente
                                                                                    $value_3->cantidad_comprar, // $volumen_compra
                                                                                    $value_3->cantidad, // $volumen
                                                                                    0, // $volumen_entregado
                                                                                    '', // $comentario
                                                                                    $token_doc, // $cod_doc
                                                                        );
                            if($detalle_registro->estado == 1)
                            {
                                $datos['recomendacion'][$key_2]['detalle'][$key_3] = $detalle_registro;
                                $exito++;
                            }
                            else
                            {
                                $datos['recomendacion'][$key_2]['detalle'][$key_3] = $detalle_registro;
                                $falla++;
                            }
                        }
                        $datos['exito'] = $exito;
                        $datos['falla'] = $falla;
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Falla registro de Receta';
                    }
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    /** CARGAR RECETAS */
    public function verRecomendaciones(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $filtros = array();

        if(!empty($request->id_ficha))
            $filtros[] = array('atencion', $request->id_ficha);
        if(!empty($request->id_ingreso_paciente))
            $filtros[] = array('salida', $request->id_ingreso_paciente);
        if(!empty($request->id_recuperacion))
            $filtros[] = array('herir', $request->id_recuperacion);
        if(!empty($request->id_sala))
            $filtros[] = array('cuadro', $request->id_sala);
        if(!empty($request->id_paciente))
            $filtros[] = array('activo', $request->id_paciente);
        if(!empty($request->id_profesional))
            $filtros[] = array('aficionado', $request->id_profesional);
        if(!empty($request->id_tipo_control))
            $filtros[] = array('control', $request->id_tipo_control);
        if(!empty($request->token_doc))
            $filtros[] = array('cod_doc', $request->token_doc);

        $registros = Recomendacion::where($filtros)->get();

        if($registros)
        {
            $regisrto_result = array();
            foreach ($registros as $key => $value)
            {
                $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                $detalle_temp = array();
                if($detalle)
                {
                    $detalle_temp = array();
                    foreach ($detalle as $key_det => $value_det)
                    {
                        $detalle_temp[] = array(
                            'id' => $value_det->id,
                            'id_receta' => $value_det->id_recomendacion,
                            'id_tipo_control' => decrypt($value_det->control),
                            'id_producto' => decrypt($value_det->id_articulo),
                            'producto' => decrypt($value_det->articulo),
                            'farmaco' => decrypt($value_det->componente),
                            'id_presentacion' => decrypt($value_det->id_apariencia),
                            'presentacion' => decrypt($value_det->apariencia),
                            'id_receta_dosis' => decrypt($value_det->id_cuota),
                            'posologia' => decrypt($value_det->cuota),
                            'id_via_administracion' => decrypt($value_det->id_regimen),
                            'via_administracion' => decrypt($value_det->regimen),
                            'id_periodo' => decrypt($value_det->id_lapso),
                            'periodo' => decrypt($value_det->lapso),
                            'uso_cronico' => decrypt($value_det->uso_frecuente),
                            'cantidad_compra' => decrypt($value_det->volumen_compra),
                            'cantidad' => decrypt($value_det->volumen),
                            'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                            'comentario' => decrypt($value_det->comentario),
                            'token_doc' => decrypt($value_det->cod_doc),
                            'estado' => $value_det->estado,
                            'created_at' => $value_det->created_at,
                            'updated_at' => $value_det->updated_at,
                        );
                    }
                }

                $regisrto_result[] = array(
                    'id' => $value->id,
                    'id_ficha_atencion' => $value->atencion,
                    'id_ingreso_paciente' => $value->salida,
                    'id_recuperacion' => $value->herir,
                    'id_sala' => $value->cuadro,
                    'id_paciente' => $value->activo,
                    'id_profesional' => $value->aficionado,
                    'id_tipo_control' => $value->control,
                    'token_doc' => $value->cod_doc,
                    'token_auto' => $value->cod_auto,
                    'pdf' => $value->info,
                    'estado' => $value->estado,
                    'detalle' => $detalle_temp,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                );
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $regisrto_result;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function verPDF(Request $request)
    {
        $tipo_control = 0;
        $datos = array();

        if(!empty($request->tipo_control))
            $tipo_control = 1;

        $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $profesional = Profesional::find($ficha_atencion->id_profesional);
        $paciente = Paciente::find($ficha_atencion->id_paciente);

        /** token receta */
        $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
        if($temp_token['estado'] == 1)
        {
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);
        }

        /** token profesional */
        $temp_token = CertificadoController::certificadoProfesional($profesional->id);
        if($temp_token['estado'] == 1)
        {
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }

        $qr_id = GeneradorQrController::generar(encrypt($ficha_atencion->id));

        /** cantidad de hojas (secciones) */
        $cantidad_recetas = 0;

        /** detalle de receta */
        $detalle_receta = (object)array();


        /** TIPO DE CONTROL */
        // 1	Receta retenida con control de Psicotrópicos
        // 2	Receta retenida con control de Estupefacientes
        // 3	Receta Cheque
        // 4	Receta retenida
        // 5	Receta retenida con control de Codeína
        // 6	Receta Simple
        // 7	Venta Directa
        $med = array(0,6,7);
        $med_ret = array(0,1,2,3,4,5);
        $control = array($med, $med_ret);
        /** MEDICAMENTOS */
        $detalleReceta = DetalleReceta::where('id_ficha', $request->id_ficha_atencion)->get();
        if($detalleReceta->count()>0)
        {
            foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
            {
                $array_medicamento = array();
                $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                if($producto)
                {
                    $nombre_control = $producto->RecetaControl()->first()->descripcion;
                    $id_control = $producto->RecetaControl()->first()->cod_control;
                    if( array_search( $id_control, $control[$tipo_control] ) != false )
                    {
                        $array_medicamento = array(
                            'nombre_medicamento' => $producto->nombre,
                            'droga'=>$producto->droga,
                            'presentacion' => $value_detalle_receta->presentacion,
                            'posologia' => $value_detalle_receta->posologia,
                            'via_administracion' => $value_detalle_receta->via_administracion,
                            'periodo' => $value_detalle_receta->periodo,
                            'uso_cronico' => $value_detalle_receta->uso_cronico,
                            'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                            'receta_token' => $value_detalle_receta->receta_token,
                        );
                    }
                }
                else
                {
                    if(!empty($tipo_control))
                    {
                        $med_faltante = ArticuloFaltante::where('nombre', $value_detalle_receta->producto)->orderBy('id', 'DESC')->get()->first();

                        $droga = '';
                        if($med_faltante)
                        {
                            $droga = '('.$med_faltante->droga.')';
                        }
                        else
                        {
                            $droga = '(Droga no indicada)';
                        }
                        $array_medicamento = array(
                            'nombre_medicamento' => $value_detalle_receta->producto,
                            'droga'=>$droga,
                            'presentacion' => $value_detalle_receta->presentacion,
                            'posologia' => $value_detalle_receta->posologia,
                            'via_administracion' => $value_detalle_receta->via_administracion,
                            'periodo' => $value_detalle_receta->periodo,
                            'uso_cronico' => $value_detalle_receta->uso_cronico,
                            'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                            'receta_token' => $value_detalle_receta->receta_token,
                        );

                        $nombre_control = 'Receta Simple';
                        $id_control = 6;
                    }
                }

                // 4 - Receta retenida
                // 6 - Receta Simple
                // 7 - Venta Directa

                // 1 - Receta retenida con control de Psicotrópicos
                // 2 - Receta retenida con control de Estupefacientes
                // 3 - Receta Cheque
                // 5 - Receta retenida con control de Codeína
                if(!empty($array_medicamento))
                {
                    // if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                    if(trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                    {
                        $nombre_control = 'Receta';
                        if(!isset($detalle_receta->$nombre_control))
                            $cantidad_recetas ++;
                    }
                    else
                    {
                        $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;
                        if(!isset($detalle_receta->$nombre_control))
                            $cantidad_recetas ++;
                    }
                    $detalle_receta->$nombre_control[] = $array_medicamento;
                }
            }

            // return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }

        if($tipo_control == 0)
        {
            /** ESPECIALIDAD OTORRINOLARINGOLOGÍA (AUDIFONOS) */
            $detalleOrlAudifono = RecetaAudifono::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
            if($detalleOrlAudifono)
            {
                $cantidad_recetas ++;
                $arrayTipo = array('','Intracanal', 'Retroauricular', 'Audigafas', 'Implante', 'Otro Tipo');
                $array_medicamento = array(
                    'tipo' => $arrayTipo[$detalleOrlAudifono->tipo],
                    'od' => $detalleOrlAudifono->od,
                    'especificacion_od' => $detalleOrlAudifono->especificacion_od,
                    'oi' => $detalleOrlAudifono->oi,
                    'especificacion_oi' => $detalleOrlAudifono->especificacion_oi,
                    'bi' => $detalleOrlAudifono->bi,
                    'especificacion_bi' => $detalleOrlAudifono->especificacion_bi,
                    'especificacion_general' => $detalleOrlAudifono->especificacion_general,
                );
                $nombre_control = 'ORL_AUDIFONO';
                $detalle_receta->$nombre_control[] = $array_medicamento;
            }
        }

        $array_ficha_atencion = array(
            'id' => $ficha_atencion->id,
            'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            'token' => $token_receta,
            'url' => $url_documento,
            'qr' => $qr_documento,
            'qr_id' => $qr_id,
        );
        $array_lugar_atencion = array(
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre
        );
        $array_profesional = array(
            'id' => $profesional->id,
            'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
            'rut' => $profesional->rut,
            'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
            'token' =>  $token_profesional,
            'url' =>  $url_profesional,
            'qr' =>  $qr_profesional,
        );
        $array_paciente = array(
            'id' => $paciente->id,
            'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
        );
        return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');

    }

}
