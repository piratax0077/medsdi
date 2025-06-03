<?php

namespace App\Http\Controllers;

use App\Models\FichaAtencion;
use App\Models\HoraMedica;
use App\Models\Paciente;
use App\Models\ProcedimientosCentro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FichaAtencionRayosController extends Controller
{

    public function store_fono_lab_rayos(Request $request)
    {
        $campos_requeridos = 1;
        $tipo_mensaje = 'success';
        $mensaje = '';
        // if(empty( trim($request->concluciones_examen)))
        // {
        //     $campos_requeridos = 0;
        //     $mensaje = 'La conclucion es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.';
        // }


        /** REGISTRO DE PROFESIONAO SOLICITADO POR */
        if( !empty($request->solicitado_id_profesional) || !empty($request->derivado_por_rut) )
        {

            if( empty($request->solicitado_id_profesional) && !empty($request->derivado_por_rut) )
            {

                if(empty($request->solicitado_nombre))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido NOMBRE del Solicitante.\n';
                }
                if(empty($request->solicitado_apellido))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido APELLIDO del Solicitante.\n';
                }
                if(empty($request->solicitado_telefono) || empty($request->solicitado_email))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                }
            }
        }

        if($campos_requeridos)
        {


            /** FICHA ATENCION  */
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $procedimiento = ProcedimientosCentro::find($hora_medica->id_procedimiento);
            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

            $ficha->motivo = $procedimiento->nombre;
            $ficha->hipotesis_diagnostico = $procedimiento->nombre;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;

            if( !empty($request->solicitado_id_profesional) || !empty($request->derivado_por_rut) )
            {
                if( empty($request->solicitado_id_profesional) && !empty($request->derivado_por_rut) )
                {
                    $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre, $request->solicitado_apellido, '', '', $request->derivado_por_rut, $request->solicitado_email, $request->solicitado_telefono, '', '', '', '', '', '', '', '', '', 1);
                    $ficha->der_por = $profesional_provisorio['last_id'];
                }
                else if( !empty($request->solicitado_id_profesional) )
                {
                    $ficha->der_por = $request->solicitado_id_profesional;
                }
            }


            $ficha->finalizada = 1;


            $registro_archivo = array();
            if(!empty($request->input_lista_archivo))
            {
                $paciente = Paciente::find($request->id_paciente_fc);
                $array_archivo = json_decode($request->input_lista_archivo);

                $resulto_img = array();
                foreach ($array_archivo as $key => $value)
                {
                    $ruta_temp = $value[0];
                    $nombre_real = $value[1];
                    $nombre_temp = $value[2];
                    $file_extension = $value[3];
                    $nombre_final = $paciente->rut.'_examen_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    $resulto_archivo[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
                    $url = $resulto_archivo[$key]['proceso']['url'];

                    $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                    $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                    array_push($registro_archivo, array(
                        'nombre' => $nombre_final,
                        'url' => $url
                    ));
                }

                $registro_archivo = json_encode($registro_archivo);
            }

            if(!empty($registro_archivo))
                $ficha->estado_archivo = 1;
            else
                $ficha->estado_archivo = 0;

            $ficha->archivo = $registro_archivo;


            if ($ficha->save())
            {
                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                $mensaje .= 'Ficha Clínica  guardada de forma correcta\n';

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    // $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');
                }
            }
            else
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }
}
