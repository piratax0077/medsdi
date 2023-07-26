<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\ExamenEspecialidadTipo;
use App\Models\FichaAtencion;
use App\Models\HoraMedica;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranscripcionController extends Controller
{
    public function CargarExamen(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_hora_medica))
        {
            $error['id_hora_medica'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $hora_medica = HoraMedica::find($request->id_hora_medica);
            if($hora_medica)
            {
                $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();


                $filtro_ala = array();
                $filtro_ala[] = array('id_asistente', $asistente->id);
                $filtro_ala[] = array('id_profesional', $hora_medica->id_profesional);
                $filtro_ala[] = array('id_lugar_atencion', $hora_medica->id_lugar_atencion);
                $asistente_lugar_atension = AsistenteLugarAtencion::where($filtro_ala)->first();

                if($asistente_lugar_atension)
                {
                    if($asistente_lugar_atension->examen == 1)
                    {
                        $tipo_examen = ExamenEspecialidadTipo::where('nombre', $hora_medica->alias_examen )->first();
                        if($tipo_examen)
                        {
                            $tipo_examen_especialidad = ExamenEspecialidadTemplate::find($tipo_examen->id_template);
                            $datos['tipo_examen']['id'] = $tipo_examen_especialidad->id;
                            $datos['tipo_examen']['nombre'] = $tipo_examen_especialidad->nombre;
                            $datos['tipo_examen']['formulario'] = $tipo_examen_especialidad->cuerpo;
                            $datos['tipo_examen']['estructura'] = $tipo_examen_especialidad->estructura;
                            $datos['tipo_examen']['alias'] = $tipo_examen_especialidad->alias;

                            $examen_resultado = ExamenEspecialidad::with('ExamenEspecialidadImg')
                                                                ->where('id_ficha_atencion', $hora_medica->id_ficha_atencion)
                                                                ->where('nombre', $tipo_examen_especialidad->nombre )
                                                                ->first();

                            if($examen_resultado)
                            {
                                $datos['ficha_examen'] = $examen_resultado;
                                $datos['estado'] = 1;
                                $datos['msj'] = 'registro';
                            }
                            else
                            {
                                $datos['estado'] = 0;
                                $datos['msj'] = 'Examan a cargar no encontrado';
                            }

                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Tipo Examen no encontrado';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Asistente sin permiso para transcribir';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Asistente sin relacion';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Hora no encontrada';
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

    public function RegistrarTranscripcion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $mensaje = '';

        if(empty($request->examen_especialidad_id))
        {
            $error['examen_especialidad_id'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_especialidad))
        {
            $error['id_ficha_especialidad'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_examen_tipo))
        {
            $error['id_examen_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->alias))
        {
            $error['alias'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** ESTRUCTURA JSON DESDE TEMPLATE */
            $parametro = $request->all();
            $parametro['id_fichas_atenciones'] = $request->id_ficha_atencion;

            $examen_original = ExamenEspecialidad::find($request->examen_especialidad_id);

            $examen_json = ExamenEspecialidadController::estructuraJson($examen_original->id_template,$parametro);

            $examen_original_cuerpo = json_decode($examen_original->cuerpo);
            // echo $examen_json['json'];
            if($examen_json['estado'] == 1)
            {
                $json_temp = json_decode($examen_json['json']);

                $datos['examen']['examen_json'] = json_encode($json_temp);


                /** CARGA DE DATA BASE */
                foreach ($json_temp as $key1 => $value1)
                {
                    foreach ($examen_original_cuerpo as $key2 => $value2)
                    {
                        if( $key1 == $key2)
                        {
                            $json_temp->$key1 = $value2;
                        }
                    }
                }
                $datos['examen']['examen_original_cuerpo'] = json_encode($examen_original_cuerpo);

                /** CARGA DE DATA DESDE FORMULARIO */
                foreach ($json_temp as $key1 => $value1)
                {
                    foreach ($parametro as $key2 => $value2)
                    {
                        $temp_2 = str_replace('_'.$request->alias,'',$key2);
                        if( $key1 == $temp_2 )
                        {
                            $json_temp->$key1 = $value2;
                        }
                    }
                }

                $datos['examen']['parametro'] = json_encode($parametro);

                $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

                $examen = ExamenEspecialidad::find($request->examen_especialidad_id);
                $examen->id_asistente = $asistente->id;
                $examen->cuerpo = json_encode($json_temp);
                $datos['examen']['cuerpo'] = json_encode($json_temp);

                // if($registro_rfl->save())
                if($examen->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registrado';

                    $datos['examen']['estado'] = 1;
                    $datos['examen']['msj'] = 'registro exitoso';
                    $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía guardada de forma correcta\n';

                    /** CAMBAIR DE ESTADO HORA  */
                    $hora_medica = HoraMedica::where('id_ficha_atencion', $request->id_ficha_atencion)->get()->first();
                    $hora_medica->id_estado = 11; // 11. EXAMEN TRANSCRITO
                    if($hora_medica->save())
                    {
                        $datos['hora_medica']['estado'] = 1;
                        $datos['hora_medica']['msj'] = 'registro actualizado';

                        /** CAMBAIR DE ESTADO FICHA ATENCION */
                        $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
                        $ficha_atencion->finalizada = 3; // 3. EXAMEN TRANSCRITO
                        if($ficha_atencion->save())
                        {
                            $datos['ficha_atencion']['estado'] = 1;
                            $datos['ficha_atencion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['ficha_atencion']['estado'] = 0;
                            $datos['ficha_atencion']['msj'] = 'falla actualizando';
                        }
                    }
                    else
                    {
                        $datos['hora_medica']['estado'] = 0;
                        $datos['hora_medica']['msj'] = 'falla actualizando';
                    }

                    /** registro de imagenes  */
                    if(!empty($request->input_lista_imagenes))
                    {
                        $array_imagenes = json_decode($request->input_lista_imagenes);

                        // var_dump( $request->alias );
                        // var_dump( $array_imagenes->eda );
                        // var_dump( $array_imagenes->{$request->alias} );

                        $resulto_img = array();
                        foreach ($array_imagenes->{$request->alias} as $key => $value)
                        {
                            $paciente = Paciente::find($request->id_paciente);
                            // echo json_encode($value);
                            $ruta_temp = $value[0];
                            $nombre_real = $value[1];
                            $nombre_temp = $value[2];
                            $file_extension = $value[3];
                            $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                            $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                            $registro_img = new ExamenEspecialidadImg();
                            $registro_img->id_examen = $examen->id;
                            $registro_img->url = $resulto_img[$key]['proceso']['url'];
                            $registro_img->nombre = $nombre_final;
                            $registro_img->otro = '';
                            $registro_img->estado = 1;

                            if($registro_img->save())
                            {
                                $resulto_img[$key]['estado'] = 1;
                                $resulto_img[$key]['msj'] = 'imagen registrada';
                            }
                            else
                            {
                                $resulto_img[$key]['estado'] = 0;
                                $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                            }
                        }
                        $datos['examen']['resulto_img'] = $resulto_img;
                    }
                }
                else
                {
                    $datos['examen']['estado'] = 0;
                    $datos['examen']['msj'] = 'registro NO exitoso';
                    $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía No guardada \n';
                }
            }
            else
            {
                $mensaje .= 'Problema al registrar Examen Espacial';
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
}
