<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FichaAtencion;
use App\Models\DetalleReceta;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\Articulo;
use App\Models\RecetaAudifono;

use PDF;

class DocumentoController extends Controller
{

    public function verRegistrosRecetasRut(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->rut)||(int)$request->rut==0) // rut paciente
        {
            $error['rut'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if(empty($request->id)||(int)$request->id==0) // id ficha
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $paciente = Paciente::where('rut',$request->rut)->first();

            if($paciente)
            {
            $registros = FichaAtencion::select('fichas_atenciones.id as id','detalles_receta.posologia as posologia','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at','fichas_atenciones.id as id_ficha' )
										->join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')
                                        ->where('fichas_atenciones.id_paciente',$paciente->id)
                                        ->where('fichas_atenciones.id',$request->id)
										->orderBy('fichas_atenciones.id','desc')
                                        ->get();
										
				$id_fichas = array();
				$registro_limpios = array();
				foreach($registros as $key => $value)
				{
					if(in_array($value->id,$id_fichas)==false)
					{
						$registro_limpios[] = $value;
						$id_fichas[] = $value->id;
					}
					
				}		

                if($registros)
                {
                    $datos['estado'] = 1;
					$datos['id_paciente'] = $paciente->id;
                    $datos['registros'] = $registro_limpios;
                    $datos['request'] = $request->all();
    
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
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

    public function verRegistrosRecetasId(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id)||$request->id=='') // id id_usuario
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            
            $registros = FichaAtencion::select('fichas_atenciones.id as id','detalles_receta.posologia as posologia','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at','fichas_atenciones.id as id_ficha' )
										->join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')
                                        ->where('fichas_atenciones.id',decrypt($request->id))
										->orderBy('fichas_atenciones.id','desc')
                                        ->get();
										
				$id_fichas = array();
				$registro_limpios = array();
				foreach($registros as $key => $value)
				{
					if(in_array($value->id,$id_fichas)==false)
					{
						$registro_limpios[] = $value;
						$id_fichas[] = $value->id;
					}
					
				}												

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registro_limpios;
                $datos['request'] = $request->all();
                $datos['id'] = decrypt($request->id);
                //$datos['token'] = encrypt($request->id);

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
                $datos['request'] = $request->all();
            }


        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['token'] = encrypt($request->token);
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verDetalleRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id_ficha)||(int)$request->id_ficha==0) // id_ficha id_usuario
        {
            $error['id_ficha'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $detalle_receta = DetalleReceta::where('id_ficha',$request->id_ficha)
                                            ->where('estado',1)
                                            ->get();

            $datos['estado'] = 1;
            $datos['registros'] = $detalle_receta;                                      
                                             

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function ventaDetalleRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->lista_productos)) // id_ficha id_usuario
        {
            $error['lista_productos'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $lista_productos = json_decode($request->lista_productos, true);           
            $cant = 0;

            foreach($lista_productos as $key => $value)
            {
                $registro = DetalleReceta::find($value['id']);
                $registro->cantidad_vendida = $value['cantidad_vendida'];
                if($registro->save())
                {
                    $value['actualizado'] = 1;
                }else{
                    $value['actualizado'] = 0;
                }
            }

            $datos['estado'] = 1;
            $datos['registros'] = $lista_productos;                                      
                                             

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistrosRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id_paciente)||(int)$request->id_paciente==0) // id_paciente id_usuario
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $paciente = Paciente::where('id_usuario',$request->id_paciente)->first();

            $registros = FichaAtencion::select('fichas_atenciones.id as id','detalles_receta.posologia as posologia','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at','fichas_atenciones.id as id_ficha' )
										->join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')										
                                        ->where('fichas_atenciones.id_paciente',$paciente->id)
										->orderBy('fichas_atenciones.id','desc')										
                                        ->get();
										
			$id_fichas = array();
			$registro_limpios = array();
            foreach($registros as $key => $value)
			{
				if(in_array($value->id,$id_fichas)==false)
				{
					$registro_limpios[] = $value;
					$id_fichas[] = $value->id;
				}
				
			}			

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registro_limpios;
                $datos['request'] = $request->all();

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
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

    

    public function verRecetaPDFBak(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $datos = array();
            $detalleReceta = DetalleReceta::where('id_ficha', $request->id)->get();
            if($detalleReceta->count()>0)
            {
                $ficha_atencion = FichaAtencion::find($request->id);
                $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
                $profesional = Profesional::find($ficha_atencion->id_profesional);
                $paciente = Paciente::find($ficha_atencion->id_paciente);
    
                $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );
    
                $detalle_receta = (object)array();
    
                $token_receta = '';
                $cantidad_recetas = 0;
                foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
                {
                    // var_dump($value_detalle_receta);
                    $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();
    
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
    
                    $temp_token = CertificadoController::certificadoDocumento($request->id, $profesional->id, $paciente->id, 1);
                    if($temp_token['estado'] == 1)
                    {
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoDocumento($request->id, rand(111,999), $paciente->id, 1);
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
    
    
                    $nombre_control = $producto->RecetaControl()->first()->descripcion;
                    $id_control = $producto->RecetaControl()->first()->cod_control;
    
                    // 4 - Receta retenida
                    // 6 - Receta Simple
                    // 7 - Venta Directa
    
                    // 1 - Receta retenida con control de Psicotrópicos
                    // 2 - Receta retenida con control de Estupefacientes
                    // 3 - Receta Cheque
                    // 5 - Receta retenida con control de Codeína
    
    
                    if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
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
    
    
                }
    
                // echo json_encode($detalle_receta);
                // die();
    
                $array_ficha_atencion = array(
                    'id' => $ficha_atencion->id,
                    'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                    'token' => $token_receta,
                    'url' => $url_documento,
                    'qr' => $qr_documento,
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
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontraron medicamentos';
            }

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;

            return response($datos)->header('Content-Type', 'application/json');
        }

        

    }



    public function verRecetaPDF(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $datos = array();
            $detalleReceta = DetalleReceta::where('id_ficha', $request->id)->get();
            if($detalleReceta->count()>0)
            {
                $ficha_atencion = FichaAtencion::find($request->id);
                $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
                $profesional = Profesional::find($ficha_atencion->id_profesional);
                $paciente = Paciente::find($ficha_atencion->id_paciente);

                /** token receta */
                $temp_token = CertificadoController::certificadoDocumento($request->id, $profesional->id, $paciente->id, 1);
                if($temp_token['estado'] == 1)
                {
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoDocumento($request->id, rand(111,999), $paciente->id, 1);
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

                /** MEDICAMENTOS */
                $detalleReceta = DetalleReceta::where('id_ficha', $request->id)->get();
                if($detalleReceta->count()>0)
                {
                    foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
                    {
                        // var_dump($value_detalle_receta);
                        $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

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

                        $nombre_control = $producto->RecetaControl()->first()->descripcion;
                        $id_control = $producto->RecetaControl()->first()->cod_control;

                        // 4 - Receta retenida
                        // 6 - Receta Simple
                        // 7 - Venta Directa

                        // 1 - Receta retenida con control de Psicotrópicos
                        // 2 - Receta retenida con control de Estupefacientes
                        // 3 - Receta Cheque
                        // 5 - Receta retenida con control de Codeína


                        if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
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

                    // return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
                }

                /** ESPECIALIDAD OTORRINOLARINGOLOGÍA (AUDIFONOS) */
                $detalleOrlAudifono = RecetaAudifono::where('id_ficha_atencion', $request->id)->first();
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
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontraron medicamentos';
            }

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;

            return response($datos)->header('Content-Type', 'application/json');
        }

        

    }

}
