<?php

namespace App\Http\Controllers;

use App\Models\ExamenMedico;
use App\Models\ResultadoExamen;
use App\Models\ResultadoExamenArchivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResultadoExamenController extends Controller
{

    static public function registrar($id_lugar_atencion,$id_institucion,$tipo_examen,$id_paciente,$rut,$nombre,$apellido_paterno,$apellido_materno,$email,$observacion, $lista_archivo)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($tipo_examen))
        {
            $error['tipo_examen'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($apellido_paterno))
        {
            $error['apellido_paterno'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($apellido_materno))
        {
            $error['apellido_materno'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($email))
        {
            $error['email'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $id_user = Auth::user()->id;

            $registro = new ResultadoExamen();
            $registro->id_lugar_atencion = $id_lugar_atencion;
            $registro->id_institucion = $id_institucion;
            $registro->id_user = $id_user;
            $registro->tipo_examen = $tipo_examen;
            $registro->id_paciente = $id_paciente;
            $registro->rut = $rut;
            $registro->nombre = $nombre;
            $registro->apellido_paterno = $apellido_paterno;
            $registro->apellido_materno = $apellido_materno;
            $registro->email = $email;
            $registro->observacion = $observacion;
            $registro->fecha_registro = date('Y-m-d');

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';

                /** REGISTROS DE ARCHIVOS */
                if(!empty($lista_archivo))
                {
                    $lista_archivo_array = json_decode($lista_archivo);
                    $canidad_archivos = count($lista_archivo_array);

                    $datos['update_cantidad'] = ResultadoExamen::where('id', $registro->id)->update(['cantidad' => $canidad_archivos]);

                    $resulto_archivo = array();
                    foreach ($lista_archivo_array as $key => $value)
                    {
                        $ruta_temp = $value[0];
                        $nombre_real = $value[1];
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];
                        $nombre_final = $rut.'_resultado_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                        $resulto_archivo[$key] = CargaExamenController::moverArchivo($nombre_temp, 'examen', $nombre_final);

                        $archivo = new ResultadoExamenArchivo();
                        $archivo->id_resultado_examen = $registro->id;
                        $archivo->nombre = $nombre_final;
                        $archivo->url = $resulto_archivo[$key]['proceso']['url'];

                        if($archivo->save())
                        {

                            $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                            $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                            $datos['archivo'][$key]['estado'] = 1;
                            $datos['archivo'][$key]['msj'] = 'registro';
                            $datos['archivo'][$key]['url_temp'] = $url_temp;
                            $datos['archivo'][$key]['archivo_correo'] = $archivo_correo;
                            $datos['archivo'][$key]['resulto_archivo'] = $resulto_archivo;
                        }
                        else
                        {
                            $datos['archivo'][$key]['estado'] = 0;
                            $datos['archivo'][$key]['msj'] = 'falla';
                        }
                    }

                    $datos['notificacion'] = ResultadoExamenController::notificar($registro->id);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en registro';
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

    public function notificar_r(Request $request)
    {
        return static::notificar($request->id);
    }
    static public function notificar($id_resultado_examen)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {

            $registro = ResultadoExamen::find($id_resultado_examen);

            if($registro)
            {
                $archivos = ResultadoExamenArchivo::where('id_resultado_examen', $id_resultado_examen)->get();
                if($archivos)
                {
                    $lista_archivo = array();
                    foreach ($archivos as $key => $value)
                    {
                        $arrayTemp = array(
                            'url'=> Storage::disk('examen')->path($value->nombre),
                            'mime'=> Storage::disk('examen')->mimeType($value->nombre),
                        );
                        array_push($lista_archivo, $arrayTemp );
                    }

                    $tipo_examen_medico = ExamenMedico::find($registro->tipo_examen);
                    /** envio correo */
                    $blade = 'resultado_examen_lab';
                    $to = array(
                            array('email' => $registro->email, 'name' => $registro->nombre.' '.$registro->apellido_paterno.' '.$registro->apellido_materno),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Resultado Examen';
                    $body = array(
                        'NOMBRE_PACIENTE' => mb_strtoupper($registro->nombre.' '.$registro->apellido_paterno.' '.$registro->apellido_materno),
                        'TIPO_EXAMEN' => mb_strtoupper($tipo_examen_medico->nombre_examen),
                        'OBSERVACION' => $registro->observacion,
                    );
                    $archivo = $lista_archivo;
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);
                    if($result_mail['estado'] == 1)
                    {
                        $datos['notificacion']['estado'] = 1;
                        $datos['notificacion']['msj'] = 'correo enviado';
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'falle en envio de correo';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'archivo de resultado examen no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resultado examen no encontrado';
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'notificado';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;

    }

    public function testArchivo()
    {
        echo Storage::disk('examen')->exists('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->size('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->url('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->path('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->mimeType('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        $contenido = Storage::disk('examen')->get('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo ($contenido);
        echo '<br/>';
    }

    public function verRegistrosRut(Request $request)
    {
        $datos = array();
        $error = array();
        $filtro = array();
        $valido = 1;

        if($valido)
        {
            $filtro[] = array('rut', $request->rut);

            $registros = ResultadoExamen::rangoFecha($request->rango_dias)->where($filtro)->get();

            if($registros)
            {

                foreach ($registros as $key => $value)
                {
                    $tipoE = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $registros[$key]['tipo_examen'] = $tipoE;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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
