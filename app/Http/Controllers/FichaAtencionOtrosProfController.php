<?php

namespace App\Http\Controllers;

use App\Models\ExamenAudicion;
use App\Models\ExamenEspecialidad;
use App\Models\FichaAtencion;
use App\Models\FichaAtencionEnfermeria;
use App\Models\FichaEnfermeriaDocumentoNutricion;
use App\Models\CuracionesPlanasServicio;
use App\Models\CuracionesLppServicio;
use App\Models\CuracionesPieDiabetico;
use App\Models\CuracionesQuemados;
use App\Models\FichaOtrosProfesionales;
use App\Models\FichaOtProfControl;
use App\Models\FichaGinecoObstetrica;
use App\Models\FichaKinesiologia;
use App\Models\FichaKineNeurologia;
use App\Models\FichaKineTorax;
use App\Models\FichaKineTratamiento;
use App\Models\FichaFonoaudiologia;
use App\Models\FichaFonoHablaLenguaje;
use App\Models\FichaSicoAntPsiquiatricos;
use App\Models\FichaSicoBiopatografia;
use App\Models\FichaSicoExamenMental;
use App\Models\FichaSicoHistFamiliar;
use App\Models\FichaSicoHistFamiliarRelaciones;
use App\Models\FichaSicologia;
use App\Models\FichaSicoOtrosTest;
use App\Models\FichaSicosocial;
use App\Models\FichaSicoTestRorshchach;
use App\Models\FichaSiqui;
use App\Models\FonoInforme;
use App\Models\FonoValoracionEquilibrio;
use App\Models\HoraMedica;
use App\Models\KineInforme;
use App\Models\KinePlanificacion;
use App\Models\OctavoPar;
use App\Models\OtrosProfesionalesSeccionAntecedentes;
use App\Models\Paciente;
use App\Models\ProcedimientosCentro;
use App\Models\Profesional;
use App\Models\PlanTratamientoOtrosProfesionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;

class FichaAtencionOtrosProfController extends Controller
{

    public function store_ot_prof(Request $request, $ficha)//listo - revisado
    {

        $id_profesional = $request->id_profesional_fc;
        $profesional = Profesional::find($id_profesional);
        $id_paciente = $request->id_paciente_fc;
        $id_especialidad = $profesional->id_especialidad;
        $id_tipo_especialidad = $profesional->id_tipo_especialidad;
        /** REGISTRO FICHA OTROS PROFESIONALES */
        $ficha_ot_prof = new FichaOtrosProfesionales();
        // $ficha_ot_prof->id = '';
        $ficha_ot_prof->id_especialidad = $id_especialidad;
        $ficha_ot_prof->id_tipo_especialidad = $id_tipo_especialidad;
        $ficha_ot_prof->id_profesional = $id_profesional;
        $ficha_ot_prof->id_paciente = $id_paciente;
        $ficha_ot_prof->id_lugar_atencion = $request->id_lugar_atencion;
        $ficha_ot_prof->tipo_consulta_d= $request->tipo_consulta_d;
        $ficha_ot_prof->der_por = $request->der_por;
        $ficha_ot_prof->cond_fis_ingreso = $request->cond_fis_ingreso;
        $ficha_ot_prof->num_sesiones = $request->num_sesiones;
        $ficha_ot_prof->dg_ingreso = $request->dg_ingreso;
        $ficha_ot_prof->solicitud_prof= $request->solicitud_prof;
        $ficha_ot_prof->espect_pcte = $request->espect_pcte;
        $ficha_ot_prof->hipotesis = $request->hipotesis;
        $ficha_ot_prof->indicaciones = $request->indicaciones;
        $ficha_ot_prof->otro = $request->otro;
        $ficha_ot_prof->otro1 = $request->otro1;
        $ficha_ot_prof->datos = json_encode($request->all());
        $ficha_ot_prof->estado = 1;

        if($ficha_ot_prof->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Ficha Clínica  guardada de forma correcta\n';
            // /** REGISTRO FICHA CONTROL OTROS PROFESIONALES   */
            // {

            //     $ficha_control = new FichaOtProfControl();
            //     $ficha_control->ficha_ot_prof = $ficha->id;
            //     $ficha_control->id_paciente = $id_paciente;
            //     $ficha_control->id_profesional = $id_profesional;
            //     $ficha_control->cont_n_sesion= $request->cont_n_sesion;
            //     $ficha_control->cont_trabajo_en = $request->cont_trabajo_en;
            //     $ficha_control->cont_colaboracion = $request->cont_colaboracion;
            //     $ficha_control->cont_obj= $request->cont_obj;
            //     $ficha_control->otro = '';
            //     $ficha_control->otro2 = '';
            //     $ficha_control->estado = 1;

            //     if($ficha_control->save())
            //     {
            //         $datos['controles']['estado'] = 1;
            //         $datos['controles']['msj'] = 'Control registrado con exito\n';
            //     }
            //     else
            //     {
            //         $datos['controles']['estado'] = 0;
            //         $datos['controles']['msj'] = 'Control con problema al registrar\n';
            //     }
            // }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Ficha Clínica  con problema al registrar\n';
        }

        return (object)$datos;

    }

    public function store_sico(Request $request)//listo - revisado
    {
        // echo json_encode($request->all());
        // die();

        $campos_requeridos = 1;
        $mensaje = '';
        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
        // buscar plan activo
        $plan = PlanTratamientoOtrosProfesionales::where('id_paciente', $request->id_paciente_fc)
            ->where('id_profesional', $request->id_profesional_fc)
            // ->where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('estado', 1)
            ->first();


        if (!$plan) {
            $campos_requeridos = 0;
            $mensaje .= 'No se encontró un plan de tratamiento psicológico activo para este paciente.<br>';
        }

        // Corregir sesion_actual = 0 de planes antiguos
        if ($plan && ($plan->sesion_actual == 0 || $plan->sesion_actual == null)) {
            $plan->sesion_actual = 1;
            $plan->save();
        }

        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje .= 'El Diagnóstico es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún. <br> Si es solo Control, indicar Control de Patología.';
        }

        // Validar agendamiento solo si no es la última sesión y no es la primera sesión recién creada
        if ($plan && $plan->numero_sesiones > $plan->sesion_actual) {
            // Permitir guardar la primera sesión sin hora agendada inicialmente
            // Las sesiones posteriores sí requieren hora agendada
            if ($plan->sesion_actual > 1 && ($request->hora_agendada == 0 || $request->hora_agendada == '')) {
                $campos_requeridos = 0;
                $mensaje = 'Está en la sesión '. $plan->sesion_actual .' de '. $plan->numero_sesiones .'. Debe seleccionar una hora médica para agendar la próxima sesión.';
            }
        }

        if($campos_requeridos)
        {

            if($plan->sesion_actual == 1){
                /** FICHA OTROS PROFESIONALES - PSICOLOGÍA */

                $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();

                if($ficha){
                    $id_profesional = $request->id_profesional_fc;
                    $id_paciente = $request->id_paciente_fc;
                    $profesional = Profesional::find($id_profesional);

                    // Actualizar campos de la ficha existente
                    $ficha->id_especialidad = $profesional->id_especialidad;
                    $ficha->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha->id_profesional = $id_profesional;
                    $ficha->id_paciente = $id_paciente;
                    $ficha->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha->tipo_consulta_d = $request->tipo_consulta_d;
                    $ficha->der_por = $request->der_por;
                    $ficha->cond_fis_ingreso = $request->cond_fis_ingreso;
                    $ficha->num_sesiones = $request->num_sesiones;
                    $ficha->dg_ingreso = $request->dg_ingreso;
                    $ficha->solicitud_prof = $request->solicitud_prof;
                    $ficha->espect_pcte = $request->espect_pcte;
                    $ficha->hipotesis = $request->hipotesis;
                    $ficha->indicaciones = $request->indicaciones;
                    $ficha->datos = json_encode($request->all());
                    $ficha->estado = 1;
                    $ficha->finalizada = 1;
                }


                if (!$ficha->save())
                {
                    return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
                }
                else
                {
                    $mensaje = 'Se ha Iniciado el plan de psicología del paciente\n';
                    $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
                    $id_profesional = $profesional->id;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';
                }

                // Incrementar sesión si se agendó próxima hora
                $sesion_completada = $plan->sesion_actual;
                $mensaje .= " Sesión {$sesion_completada}/{$plan->numero_sesiones} completada.";

                // Incrementar a próxima sesión si se agendó hora y no es la última
                if ($plan->sesion_actual < $plan->numero_sesiones && $request->hora_agendada == 1) {
                    $plan->sesion_actual += 1;
                    $plan->save();
                    $mensaje .= " Próxima sesión ({$plan->sesion_actual}) agendada.";
                }
                else if ($plan->sesion_actual >= $plan->numero_sesiones) {
                    $plan->estado = 0;
                    $plan->save();
                    $mensaje .= " Plan de tratamiento finalizado.";
                }

                $hora_medica->id_estado = 6;
                $hora_medica->save();

                return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
            }
            // Sesiones posteriores (controles)
            else {
                // Registrar control/evolución
                if ($request->finalizando_sesiones == 1) {
                    $plan->estado = 0; // Finalizar plan si es la última sesión
                    $plan->save();
                    $tipo_mensaje = 'info';
                    $mensaje = 'Ha finalizado el plan de tratamiento psicológico.';
                } else {
                    $tipo_mensaje = 'success';
                    $mensaje = 'Sesión de control registrada correctamente.';
                }

                // Incrementar sesión si se agendó próxima hora
                $sesion_completada = $plan->sesion_actual;
                $mensaje .= " Sesión {$sesion_completada}/{$plan->numero_sesiones} completada.";

                // Incrementar sesión para sesiones posteriores si se agendó próxima hora
                if ($plan->sesion_actual < $plan->numero_sesiones && $request->hora_agendada == 1) {
                    $plan->sesion_actual += 1;
                    $plan->save();
                    $mensaje .= " Próxima sesión ({$plan->sesion_actual}) agendada.";
                }
                else if ($plan->sesion_actual >= $plan->numero_sesiones) {
                    $plan->estado = 0;
                    $plan->save();
                    $mensaje .= " Plan de tratamiento finalizado.";
                }

                $hora_medica->id_estado = 6;
                $hora_medica->save();

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    // $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }



        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_laboratorio_clinico(Request $request){
        return $request;
        $diagnostico = "Examen de Laboratorio Clínico: " . $request->examen_solicitado . ". Resultado: " . $request->resultado_examen;

    }

    public function store_enfermeria(Request $request)
    {

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $id_profesional = $request->id_profesional_fc;
        $id_paciente = $request->id_paciente_fc;
        $profesional = Profesional::find($id_profesional);

        // Validamos que al menos tenga un motivo
        if (empty(trim($request->motivo)) || $request->motivo == 'Seleccione' || $request->motivo == '0') {
            return back()->with('error', 'El motivo de la atención es requerido para guardar la ficha de enfermería.')->withInput();
        }

        // Recuperar o crear la ficha de otros profesionales asociada a la hora médica
        $ficha = null;
        if ($hora_medica) {
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
        }
        if (!$ficha) {
            $ficha = new FichaOtrosProfesionales();
        }


        // Guardar en FichaOtrosProfesionales usando los campos correctos de la tabla
        $ficha->id_especialidad = $profesional ? $profesional->id_especialidad : null;
        $ficha->id_tipo_especialidad = $profesional ? $profesional->id_tipo_especialidad : null;
        $ficha->id_profesional = $id_profesional;
        $ficha->id_paciente = $id_paciente;
        $ficha->id_lugar_atencion = $request->id_lugar_atencion;
        $ficha->tipo_consulta_d = $request->tipo_consulta_d ?: null;
        $ficha->der_por = $request->der_por ?: null;
        $ficha->cond_fis_ingreso = $request->anamnesis; // Anamnesis va aquí
        $ficha->num_sesiones = $request->num_sesiones ?: null;
        $ficha->dg_ingreso = 'ATENCIÓN DE ENFERMERÍA'; // Diagnóstico de ingreso
        $ficha->solicitud_prof = $request->solicitud_prof ?: null;
        $ficha->espect_pcte = $request->espect_pcte ?: null;
        $ficha->hipotesis = 'ATENCIÓN DE ENFERMERÍA'; // Hipótesis diagnóstica
        $ficha->indicaciones = $request->indicaciones;
        $ficha->datos = json_encode($request->all()); // Guardar toda la data en JSON
        $ficha->estado = 1;
        $ficha->finalizada = 1;

        if (!$ficha->save()) {
            return back()->with('error', 'Ficha de Enfermería con problema al guardar')->withInput();
        }

        $tipo_mensaje = 'success';
        $mensaje = 'Ficha de Enfermería guardada de forma correcta\n';

        // Registro de la ficha de enfermería con todos los datos de la atención
        // Verificar si existe una ficha de enfermería para actualizar o crear nueva
        if ($request->id_ficha_enfermeria) {
            $ficha_enfermeria = FichaAtencionEnfermeria::find($request->id_ficha_enfermeria);
            if (!$ficha_enfermeria) {
                $ficha_enfermeria = new FichaAtencionEnfermeria();
            }
        } else {
            $ficha_enfermeria = new FichaAtencionEnfermeria();
        }

        $ficha_enfermeria->id_ficha_atencion = $ficha->id;
        $ficha_enfermeria->id_paciente = $id_paciente;
        $ficha_enfermeria->id_profesional = $id_profesional;
        $ficha_enfermeria->id_lugar_atencion = $request->id_lugar_atencion;
        $ficha_enfermeria->id_hora_medica = $request->hora_medica;
        $ficha_enfermeria->motivo = $request->motivo;
        $ficha_enfermeria->anamnesis = $request->anamnesis;
        $ficha_enfermeria->temperatura = $request->temperatura;
        $ficha_enfermeria->pulso = $request->pulso;
        $ficha_enfermeria->frecuencia_reposo = $request->frecuencia_reposo;
        $ficha_enfermeria->peso = $request->peso;
        $ficha_enfermeria->talla = $request->talla;
        $ficha_enfermeria->imc = $request->imc;
        $ficha_enfermeria->estado_nutricional = $request->estado_nutricional;
        $ficha_enfermeria->pas = $request->pas;
        $ficha_enfermeria->pad = $request->pad;
        $ficha_enfermeria->pam = $request->pam;
        $ficha_enfermeria->presion_bi = $request->presion_bi;
        $ficha_enfermeria->presion_bd = $request->presion_bd;
        $ficha_enfermeria->presion_de_pie = $request->presion_de_pie;
        $ficha_enfermeria->presion_sentado = $request->presion_sentado;
        $ficha_enfermeria->ct_estado_conciencia = $request->ct_estado_conciencia;
        $ficha_enfermeria->ct_lenguaje = $request->ct_lenguaje;
        $ficha_enfermeria->ct_traslado = $request->ct_traslado;
        $ficha_enfermeria->nutricionista_evaluacion = $request->nutricionista_evaluacion ?: null;
        $ficha_enfermeria->nutricionista_pauta = $request->nutricionista_pauta ?: null;
        $ficha_enfermeria->examenes = $request->examenes;
        $ficha_enfermeria->examenes_esp = $request->examenes_esp;
        $ficha_enfermeria->medicamentos = $request->medicamentos;
        $ficha_enfermeria->estado = 1;

        if ($ficha_enfermeria->save()) {
            $mensaje .= 'Datos de la atención registrados correctamente\n';
        } else {
            $mensaje .= 'Problema al registrar los datos de la atención\n';
        }

        // Guardar documentos de nutrición adjuntos (referenciados a un nutricionista)
        $paciente = Paciente::find($id_paciente);
        $documentos_nutricion = array(
            'evaluacion' => $request->docs_nutricion_evaluacion,
            'pauta'      => $request->docs_nutricion_pauta,
        );

        foreach ($documentos_nutricion as $tipo_doc => $json_docs) {
            if (empty($json_docs)) {
                continue;
            }

            $lista_docs = json_decode($json_docs, true);
            if (!is_array($lista_docs)) {
                continue;
            }

            // Si estamos actualizando, eliminar solo los documentos del tipo específico
            if ($request->id_ficha_enfermeria) {
                FichaEnfermeriaDocumentoNutricion::where('id_ficha_enfermeria', $ficha_enfermeria->id)
                    ->where('tipo', $tipo_doc)
                    ->delete();
            }

            foreach ($lista_docs as $doc) {
                // Estructura: [url, nombre_original, nombre_img, extension, id_nutricionista]
                $nombre_temp = $doc[2] ?? null;
                $extension = $doc[3] ?? '';
                $id_nutricionista = !empty($doc[4]) ? $doc[4] : null;

                if (empty($nombre_temp)) {
                    continue;
                }

                $rut_paciente = $paciente ? $paciente->rut : $id_paciente;
                $nombre_final = $rut_paciente . '_nutricion_' . $tipo_doc . '_' . date('YmdHis') . '_' . uniqid() . '.' . $extension;

                $resultado_mov = CargaImagenController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
                $url_final = $resultado_mov['estado'] == 1 ? $resultado_mov['proceso']['url'] : ($doc[0] ?? '');

                $documento = new FichaEnfermeriaDocumentoNutricion();
                $documento->id_ficha_enfermeria = $ficha_enfermeria->id;
                $documento->id_ficha_atencion = $ficha->id;
                $documento->id_paciente = $id_paciente;
                $documento->id_nutricionista = $id_nutricionista;
                $documento->tipo = $tipo_doc;
                $documento->url = $url_final;
                $documento->nombre_original = $doc[1] ?? '';
                $documento->nombre_archivo = $nombre_final;
                $documento->extension = $extension;
                $documento->estado = 1;
                $documento->save();
            }
        }

        // Finalizar hora médica
        if ($hora_medica) {
            $hora_medica->id_estado = 6;
            if (!$hora_medica->save()) {
                $mensaje .= 'Hora Medica con Problemas para finalizar.\n';
            } else {
                $mensaje .= 'Hora medica Finalizada con Exito.\n';
            }
        }

        // =========================================================
        // Guardar curaciones si se enviaron datos desde el formulario
        // =========================================================
        $now = now();

        // Curación Plana
        if (!empty($request->curacion_plana_data)) {
            $datos_cp = json_decode($request->curacion_plana_data, true);
            if ($datos_cp) {
                $cp = new CuracionesPlanasServicio();
                $cp->id_paciente = $id_paciente;
                $cp->id_responsable = auth()->id();
                $cp->id_ficha_atencion = $ficha->id;
                $cp->fecha = $now->format('Y-m-d');
                $cp->hora = $now->format('H:i:s');
                $cp->datos_curacion_plana = json_encode($datos_cp);
                $cp->otros = $datos_cp['obs_cur_plana'] ?? null;
                $cp->activo = 1;
                $cp->save();
                $mensaje .= 'Curación plana guardada.\n';
            }
        }

        // Curación LPP
        if (!empty($request->curacion_lpp_data)) {
            $datos_lpp = json_decode($request->curacion_lpp_data, true);
            if ($datos_lpp) {
                $lpp = new CuracionesLppServicio();
                $lpp->id_paciente = $id_paciente;
                $lpp->id_responsable = auth()->id();
                $lpp->id_ficha_atencion = $ficha->id;
                $lpp->fecha = $now->format('Y-m-d');
                $lpp->hora = $now->format('H:i:s');
                $lpp->datos_curacion_lpp = json_encode($datos_lpp);
                $lpp->activo = 1;
                $lpp->save();
                $mensaje .= 'Curación LPP guardada.\n';
            }
        }

        // Pie Diabético
        if (!empty($request->curacion_pie_diabetico_data)) {
            $datos_pie = json_decode($request->curacion_pie_diabetico_data, true);
            if ($datos_pie) {
                $pie = new CuracionesPieDiabetico();
                $pie->id_paciente = $id_paciente;
                $pie->id_responsable = auth()->id();
                $pie->id_ficha_atencion = $ficha->id;
                $pie->fecha = $now->format('Y-m-d');
                $pie->hora = $now->format('H:i:s');
                $pie->datos_valoracion_pie_diabetico = json_encode($datos_pie['valoracion'] ?? $datos_pie);
                $pie->datos_curacion_pie_diabetico = json_encode($datos_pie['curacion'] ?? []);
                $pie->estado = 'completado';
                $pie->activo = 1;
                $pie->save();
                $mensaje .= 'Curación pie diabético guardada.\n';
            }
        }

        // Quemados
        if (!empty($request->curacion_quemados_data)) {
            $datos_qm = json_decode($request->curacion_quemados_data, true);
            if ($datos_qm) {
                $qm = new CuracionesQuemados();
                $qm->id_paciente = $id_paciente;
                $qm->id_responsable = auth()->id();
                $qm->id_ficha_atencion = $ficha->id;
                $qm->fecha = $now->format('Y-m-d');
                $qm->hora = $now->format('H:i:s');
                $qm->datos_valoracion_quemados = json_encode($datos_qm['valoracion'] ?? $datos_qm);
                $qm->datos_curacion_quemados = json_encode($datos_qm['curacion'] ?? []);
                $qm->activo = 1;
                $qm->save();
                $mensaje .= 'Curación quemados guardada.\n';
            }
        }

        if ($request->cerrarsession == 1) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return \Redirect::route('home.ingreso');
        }

        $array_tem = array(
            'lugares_atencion' => $request->id_lugar_atencion,
            'pdf' => $request->mostrarpdf,
            'tipo' => $request->tipopdf,
            'id_examen' => 0,
        );

        return \Redirect::route('profesional.mi_agenda', $array_tem)->with($tipo_mensaje, $mensaje);
    }

    public function store_siqui(Request $request)//listo - revisado
    {

        // echo json_encode($request->all());
        // die();
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            // return $hora_medica;
            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            // $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->motivo = $request->motivo;
            $ficha->finalizada = 1;
            $ficha->confidencial = 1; // siempre es confidencial para siquiatría
            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                /** REGISTRO FICHA SICOLOGIA */
                 /** registro ficha especialidad */
                $ficha_siqui = new FichaSiqui();
                $ficha_siqui->id_fichas_atenciones = $ficha->id;
                $ficha_siqui->id_paciente = $id_paciente;
				$ficha_siqui->id_profesional = $id_profesional;
                $ficha_siqui->datos = json_encode($request->all());
                $ficha_siqui->estado = 1;

                if($ficha_siqui->save())
                {
                    $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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



                    if($request->cerrarsession == 0 || $request->cerrarsession =='')
                    {
                        /** redireccion Redirect funciona correcto */
                        return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
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
                    $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_kine(Request $request)// revisado
    {

        echo json_encode($request->all());
        die();

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION OTROS PROFESIONALES*/
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();

            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->tipo_consulta_d = $request->tipo_consulta_d;
            $ficha->cond_fis_ingreso = $request->cond_fis_ingreso;
            $ficha->num_sesiones = $request->num_sesiones;
            $ficha->dg_ingreso = $request->dg_ingreso;
            $ficha->solicitud_prof = $request->solicitud_prof;
            $ficha->espect_pcte = $request->espect_pcte;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->indicaciones = $request->indicaciones;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;

                    /** REGISTRO FICHA KINESIOLOGIA */
                    $ficha_kine = new FichaKinesiologia();

                    $ficha_kine->id_ficha_atencion_otros = $ficha->id;
                    $ficha_kine->id_profesional = $id_profesional;
                    $ficha_kine->id_paciente = $id_paciente;
                    $ficha_kine->postura = $request->postura;
                    $ficha_kine->alineacion_post = $request->alineacion_post;
                    $ficha_kine->post_descripcion = $request->post_descripcion;
                    $ficha_kine->exp_post = $request->exp_post;
                    $ficha_kine->obs_post = $request->obs_post;
                    $ficha_kine->expl_lateral = $request->expl_lateral;
                    $ficha_kine->aprec_expl_lateral = $request->aprec_expl_lateral;
                    $ficha_kine->obs_exp_columna_total = $request->obs_exp_columna_total;
                    $ficha_kine->resultado_examenes_ct = $request->resultado_examenes_ct;
                    $ficha_kine->cerv_insp = $request->cerv_insp;
                    $ficha_kine->ex_cerv_insp = $request->ex_cerv_insp;
                    $ficha_kine->cerv_palp = $request->cerv_palp;
                    $ficha_kine->ex_cerv_palp =$request->ex_cerv_palp;
                    $ficha_kine->obs_ex_col_cerv =$request->obs_ex_col_cerv;
                    $ficha_kine->resultado_examenes_cc =$request->resultado_examenes_cc;
                    $ficha_kine->dorso_lum_insp =$request->dorso_lum_insp;
                    $ficha_kine->ex_dorso_lum_insp =$request->ex_dorso_lum_insp;
                    $ficha_kine->dors_lumb_palp =$request->dors_lumb_palp;
                    $ficha_kine->ex_dors_lumb_palp = $request->ex_dors_lumb_palp;
                    $ficha_kine->obs_ex_col_dors_lumb = $request->obs_ex_col_dors_lumb;
                    $ficha_kine->resultado_examenes_dl = $request->resultado_examenes_dl;
                    $ficha_kine->sacro_dol = $request->sacro_dol;
                    $ficha_kine->detalle_sacro_dol =$request->detalle_sacro_dol;
                    $ficha_kine->sacro_palp = $request->sacro_palp;
                    $ficha_kine->detalle_sacro_palp = $request->detalle_sacro_palp;
                    $ficha_kine->obs_sacro_palp = $request->obs_sacro_palp;
                    $ficha_kine->obs_ex_sacrocoxis = $request->obs_ex_sacrocoxis;
                    $ficha_kine->ex_articulacion = $request->ex_articulacion;
                        //Json
                        // ex_articulacion = [
                                // [
                                    // articulacion => '',
                                    // dolor => '',
                                    // funcionalidad=> '',
                                    // deformaciones
                                    //observaciones
                                // ]
                            // ]
                    $ficha_kine->obs_gen_artic = $request->obs_gen_artic;
                    $ficha_kine->ex_tendones = $request->ex_tendones;


                            // ex_tendones = [
                                    // [
                                        // tendon => '',
                                        // dolor => '',
                                        // funcionalidad=> '',
                                        // deformaciones
                                        //observaciones
                                    // ]
                                // ]
                    $ficha_kine->obs_gen_tendon = $request->obs_gen_tendon;
                    $ficha_kine->otro = '';
                    $ficha_kine->otro1 = '';
                    $ficha_kine->estado = 1;

                    if($ficha_kine->save())
                    {
                        $mensaje .= 'Ficha Clínica Kinesiogía guardada de forma correcta\n';

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


                        /** REGISTRO FICHA KINESIOLOGIA NEUROLOGIA   */

                        {

                            $ficha_kine_neuro = new FichaKineNeurologia();
                            $ficha_kine_neuro->id_ficha_atencion_otros = $ficha->id;
                            $ficha_kine_neuro->id_ficha_kine = $ficha_kine->id;
                            $ficha_kine_neuro->id_paciente = $id_paciente;
                            $ficha_kine_neuro->id_profesional = $id_profesional;
                            $ficha_kine_neuro->lenguaje= $request->lenguaje;
                            $ficha_kine_neuro->t_alt_leng = $request->t_alt_leng;
                            $ficha_kine_neuro->leng_alt_mod = $request->leng_alt_mod;
                            $ficha_kine_neuro->audio= $request->audio;
                            $ficha_kine_neuro->audifono = $request->audifono;
                            $ficha_kine_neuro->ap_capac = $request->ap_capac;
                            $ficha_kine_neuro->leng_descrip_alt = $request->leng_descrip_alt;
                            $ficha_kine_neuro->obs_leng = $request->obs_leng;
                            $ficha_kine_neuro->mem_exam= $request->mem_exam;
                            $ficha_kine_neuro->descrip_mem = $request->descrip_mem;
                            $ficha_kine_neuro->praxias = $request->praxias;
                            $ficha_kine_neuro->fcs_descripcion = $request->fcs_descripcion;
                            $ficha_kine_neuro->capvis_tipo = $request->capvis_tipo;
                            $ficha_kine_neuro->capvis_descrip = $request->capvis_descrip;
                            $ficha_kine_neuro->percve_ex = $request->percve_ex;
                            $ficha_kine_neuro->percve_descrip = $request->percve_descrip;
                            $ficha_kine_neuro->otro = '';
                            $ficha_kine_neuro->otro2 = '';
                            $ficha_kine_neuro->estado = 1;

                            if($ficha_kine_neuro->save())
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-NEUROLOGIA registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-NEUROLOGIA con problema al registrar\n';
                            }
                        }

                        /** REGISTRO FICHA KINESIOLOGIA TORAX   */

                        {

                            $ficha_kine_torax = new FichaKineTorax();

                            $ficha_kine_torax->id_ficha_otros_prof = $ficha->id;
                            $ficha_kine_torax->id_ficha_kine = $ficha_kine->id;
                            $ficha_kine_torax->id_paciente = $id_paciente;
                            $ficha_kine_torax->id_profesional = $id_profesional;
                            $ficha_kine_torax->resp_tipo= $request->resp_tipo;
                            $ficha_kine_torax->ftorax = $request->ftorax;
                            $ficha_kine_torax->storax = $request->storax;
                            $ficha_kine_torax->resp_desc= $request->resp_desc;
                            $ficha_kine_torax->resp_piel = $request->resp_piel;
                            $ficha_kine_torax->resp_cian = $request->resp_cian;
                            $ficha_kine_torax->resp_mov = $request->resp_mov;
                            $ficha_kine_torax->resp_tiraje = $request->resp_tiraje;
                            $ficha_kine_torax->resp_descrip= $request->resp_descrip;
                            $ficha_kine_torax->palp_pd= $request->palp_pd;
                            $ficha_kine_torax->palp_vv = $request->palp_vv;
                            $ficha_kine_torax->palp_exp = $request->palp_exp;
                            $ficha_kine_torax->palp_elast = $request->palp_elast;
                            $ficha_kine_torax->palp_frem = $request->palp_frem;
                            $ficha_kine_torax->palp_desc = $request->palp_desc;
                            $ficha_kine_torax->perc_descrip = $request->perc_descrip;
                            $ficha_kine_torax->r_normal_pre = $request->r_normal_pre;
                            $ficha_kine_torax->r_adv_pre = $request->r_adv_pre;
                            $ficha_kine_torax->r_normal_post = $request->r_normal_post;
                            $ficha_kine_torax->r_adv_post = $request->r_adv_post;
                            $ficha_kine_torax->resp_comen = $request->resp_comen;
                            $ficha_kine_torax->ex_resp_descrip = $request->ex_resp_descrip;
                            $ficha_kine_torax->resp_desc_obj = $request->resp_desc_obj;
                            $ficha_kine_torax->otro = '';
                            $ficha_kine_torax->otro2 = '';
                            $ficha_kine_torax->estado = 1;

                            if($ficha_kine_torax->save())
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-RESPIRATORIA registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-RESPIRATORIA con problema al registrar\n';

                            }
                        }




                        /** REGISTRO FICHA TRATAMIENTO KINESIOLOGIA   */

                        {

                            $ficha_kine_trat= new FichaKineTratamiento();

                            $ficha_kine_trat->id_ficha_otros_prof = $ficha->id;
                            $ficha_kine_trat->id_ficha_kine = $ficha_kine->id;
                            $ficha_kine_trat->id_paciente = $id_paciente;
                            $ficha_kine_trat->id_profesional = $id_profesional;
                            $ficha_kine_trat->tipo_trat= $request->tipo_trat;
                            $ficha_kine_trat->r_comentario = $request->r_comentario;
                            $ficha_kine_trat->otro = '';
                            $ficha_kine_trat->otro2 = '';
                            $ficha_kine_trat->estado = 1;

                            if($ficha_kine_trat->save())
                            {
                                $mensaje .= 'Ficha CONTROL registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha CONTROL con problema al registrar\n';

                            }
                        }

                        if($request->cerrarsession == 0 || $request->cerrarsession =='')
                        {
                            /** redireccion Redirect funciona correcto */
                            return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                        }
                        else if($request->cerrarsession == 1)
                        {
                        //si funciona
                            $request->session()->invalidate();
                            $request->session()->regenerateToken();
                            return \Redirect::route('home.ingreso');

                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Kinesiología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

	public function store_fono(Request $request)//listo - revisado
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();

            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;


            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;





            $ficha->hipotesis = $request->hipotesis;


            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA FONOAUDIOLOGIA */
                    $ficha_fono = new FichaFonoaudiologia();

                    $ficha_fono->id_ficha_otros_prof = $ficha->id;
                    $ficha_fono->id_profesional = $id_profesional;
                    $ficha_fono->id_paciente = $id_paciente;
                    $ficha_fono->eval_g_le = $request->eval_g_le;
                    $ficha_fono->eval_g_le_obs = $request->eval_g_le_obs;
                    $ficha_fono->eval_g_leti = $request->eval_g_leti;
                    $ficha_fono->eval_g_leti_obs = $request->eval_g_leti_obs;
                    $ficha_fono->eval_g_lr = $request->eval_g_lr;
                    $ficha_fono->eval_g_lr_obs = $request->eval_g_lr_obs;
                    $ficha_fono->eval_g_lrti = $request->eval_g_lrti;
                    $ficha_fono->eval_g_lrti_obs = $request->eval_g_lrti_obs;
                    $ficha_fono->eval_g_leng_obs = $request->eval_g_leng_obs;
                    $ficha_fono->eval_aud = $request->eval_aud;
                    $ficha_fono->eval_ofa = $request->eval_ofa;
                    $ficha_fono->obs_ex_ofa = $request->obs_ex_ofa;
                    $ficha_fono->vo_flu_voz =$request->vo_flu_voz;
                    $ficha_fono->vo_flu_voz_obs =$request->vo_flu_voz_obs;
                    $ficha_fono->vo_tpo_voz =$request->vo_tpo_voz;
                    $ficha_fono->vo_tpo_voz_obs =$request->vo_tpo_voz_obso;
                    $ficha_fono->vo_ritm =$request->vo_ritm;
                    $ficha_fono->vo_ritm_obs =$request->vo_ritm_obs;
                    $ficha_fono->vo_pro = $request->vo_pro;
                    $ficha_fono->vo_pro_obs = $request->vo_pro_obs;
                    $ficha_fono->ex_voz_obs = $request->ex_voz_obs;
                    $ficha_fono->ex_gral_obs = $request->ex_gral_obs;
                    $ficha_fono->otro = '';
                    $ficha_fono->otro1 = '';
                    $ficha_fono->estado = 1;

                    if($ficha_fono->save())
                    {
                        $mensaje .= 'Ficha Clínica Fonoaudiogía guardada de forma correcta\n';

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


                        /** REGISTRO FICHA FONOAUDIOLOGIA HABLA Y LENGUAJE   */

                        {

                            $ficha_hablaleng = new FichaFonoHablaLenguaje();

                            $ficha_fono->id_ficha_otros_prof = $ficha->id;
                            $ficha_hablaleng->id_ficha_fono = $ficha_fono->id;
                            $ficha_hablaleng->id_paciente = $id_paciente;
                            $ficha_hablaleng->id_profesional = $id_profesional;
                            $ficha_hablaleng->ex_resp = $request->ex_resp;
                            $ficha_hablaleng->ex_resp_obs = $request->ex_resp_obs;
                            $ficha_hablaleng->ex_fonac = $request->ex_fonac;
                            $ficha_hablaleng->ex_fonac_obs = $request->ex_fonac_obs;
                            $ficha_hablaleng->ex_art_pal = $request->ex_art_pal;
                            $ficha_hablaleng->ex_art_pal_obs = $request->ex_art_pal_obs;
                            $ficha_hablaleng->ex_prosodia = $request->ex_prosodia;
                            $ficha_hablaleng->ex_prosodia_obs = $request->ex_prosodia_obs;
                            $ficha_hablaleng->habla_obs = $request->habla_obs;
                            $ficha_hablaleng->res_tp = $request->res_tp;
                            $ficha_hablaleng->res_tp_obs = $request->res_tp_obs;
                            $ficha_hablaleng->res_mod = $request->res_mod;
                            $ficha_hablaleng->res_mod_obs = $request->res_mod_obs;
                            $ficha_hablaleng->res_cfr = $request->res_cfr;
                            $ficha_hablaleng->res_cfr_obs = $request->res_cfr_obs;
                            $ficha_hablaleng->alt_esp_leng = $request->alt_esp_leng;
                            $ficha_hablaleng->alt_esp_leng_obs = $request->alt_esp_leng_obs;
                            $ficha_hablaleng->g_leng_obs = $request->g_leng_obs;
                            $ficha_hablaleng->otro = '';
                            $ficha_hablaleng->otro2 = '';
                            $ficha_hablaleng->estado = 1;

                            if($ficha_hablaleng->save())
                            {
                                $mensaje .= 'Ficha Habla y Lenguaje registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Habla y Lenguaje con problema al registrar\n';
                            }
                        }


                        if($request->cerrarsession == 0 || $request->cerrarsession =='')
                        {
                            /** redireccion Redirect funciona correcto */
                            return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                        }
                        else if($request->cerrarsession == 1)
                        {
                        //si funciona
                            $request->session()->invalidate();
                            $request->session()->regenerateToken();
                            return \Redirect::route('home.ingreso');

                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Oftalmolagia con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

     public function guardar_planificacion(Request $request)
    {

        $ficha = FichaOtrosProfesionales::find($request->id_ficha_atencion);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if (!$ficha) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Ficha de atención no encontrada'
            ], 404);
        }

        // Verificar si hay un plan existente activo
        $planExistente = PlanTratamientoOtrosProfesionales::where('id_paciente', $ficha->id_paciente)
            ->where('id_profesional', $profesional->id)
            ->where('estado', 1) // solo activos
            ->orderBy('id', 'desc')
            ->first();

        if ($planExistente) {
            // Si existe un plan activo, actualizarlo
            $plan = $planExistente;

            // Actualizar los datos del plan existente
            $plan->diagnostico = $request->diagnostico;
            $plan->tratamiento = json_encode($request->tratamiento);
            $plan->numero_sesiones = $request->numero_sesiones;
            $plan->tipo_sesiones = $request->tipo_sesiones;
            $plan->objetivos = $request->objetivos;
            $plan->peso_inicial = $request->peso_inicial;

            $accion = 'actualizado';
        } else {
            // Si no existe plan activo, crear uno nuevo
            $plan = new PlanTratamientoOtrosProfesionales();

            $plan->id_ficha_atencion = $request->id_ficha_atencion;
            $plan->id_profesional = $profesional->id;
            $plan->id_paciente = $ficha->id_paciente;
            $plan->id_lugar_atencion = $ficha->id_lugar_atencion;
            // $plan->fecha_inicio = Carbon::now()->format('Y-m-d');
            $plan->fecha = Carbon::now()->format('Y-m-d');
            $plan->diagnostico = $request->diagnostico;
            $plan->tratamiento = json_encode($request->tratamiento);
            $plan->numero_sesiones = $request->numero_sesiones;
            $plan->sesion_actual = 0; // Empezar desde sesión 0 para un nuevo plan
            $plan->tipo_sesiones = $request->tipo_sesiones;
            $plan->objetivos = $request->objetivos;
            $plan->peso_inicial = $request->peso_inicial;
            $plan->estado = 1; // Activo

            $accion = 'creado';
        }

        if ($plan->save()) {
            return response()->json([
                'mensaje' => 'ok',
                'detalle' => "Plan de tratamiento nutricional {$accion} correctamente",
                'plan_id' => $plan->id
            ]);
        } else {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Error al guardar el plan de tratamiento nutricional'
            ], 500);
        }
    }

    public function store_nutri(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
        // buscar plan activo
        $plan = PlanTratamientoOtrosProfesionales::where('id_paciente', $request->id_paciente_fc)
            ->where('id_profesional', $request->id_profesional_fc)
            ->where('estado', 1)
            ->first();

        if (!$plan) {
            $campos_requeridos = 0;
            $mensaje .= 'No se encontró un plan de nutrición activo para este paciente.<br>';
        }

        // Corregir sesion_actual = 0 de planes antiguos
        if ($plan && ($plan->sesion_actual == 0 || $plan->sesion_actual == null)) {
            $plan->sesion_actual = 1;
            $plan->save();
        }

        if (empty(trim($request->hipotesis))) {
            $campos_requeridos = 0;
            $mensaje .= 'El Diagnóstico es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún. <br> Si es solo Control, indicar Control de Patología.';
        }

        // Validar agendamiento solo si no es la última sesión y no es la primera sesión recién creada
        if ($plan && $plan->numero_sesiones > $plan->sesion_actual) {
            // Permitir guardar la primera sesión sin hora agendada inicialmente
            // Las sesiones posteriores sí requieren hora agendada
            if ($plan->sesion_actual > 1 && ($request->hora_agendada == 0 || $request->hora_agendada == '')) {
                $campos_requeridos = 0;
                $mensaje = 'Está en la sesión '. $plan->sesion_actual .' de '. $plan->numero_sesiones .'. Debe seleccionar una hora médica para agendar la próxima sesión.';
            }
        }

        if($campos_requeridos)
        {

            if($plan->sesion_actual == 1){
                /** FICHA OTROS PROFESIONALES - NUTRICIÓN */

                $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();

                if($ficha){
                    $id_profesional = $request->id_profesional_fc;
                    $id_paciente = $request->id_paciente_fc;
                    $profesional = Profesional::find($id_profesional);

                    // Actualizar campos de la ficha existente
                    $ficha->id_especialidad = $profesional->id_especialidad;
                    $ficha->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha->id_profesional = $id_profesional;
                    $ficha->id_paciente = $id_paciente;
                    $ficha->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha->tipo_consulta_d = $request->tipo_consulta_d;
                    $ficha->der_por = $request->der_por;
                    $ficha->cond_fis_ingreso = $request->cond_fis_ingreso;
                    $ficha->num_sesiones = $request->num_sesiones;
                    $ficha->dg_ingreso = $request->dg_ingreso;
                    $ficha->solicitud_prof = $request->solicitud_prof;
                    $ficha->espect_pcte = $request->espect_pcte;
                    $ficha->hipotesis = $request->hipotesis;
                    $ficha->indicaciones = $request->indicaciones;
                    $ficha->datos = json_encode($request->all());
                    $ficha->estado = 1;
                    $ficha->finalizada = 1;
                }


                if (!$ficha->save())
                {
                    return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
                }
                else
                {
                    $mensaje = 'Se ha Iniciado el plan de nutrición del paciente\n';
                    $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
                    $id_profesional = $profesional->id;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';
                }

                // Incrementar sesión si se agendó próxima hora
                $sesion_completada = $plan->sesion_actual;
                $mensaje .= " Sesión {$sesion_completada}/{$plan->numero_sesiones} completada.";

                // Incrementar a próxima sesión si se agendó hora y no es la última
                if ($plan->sesion_actual < $plan->numero_sesiones && $request->hora_agendada == 1) {
                    $plan->sesion_actual += 1;
                    $plan->save();
                    $mensaje .= " Próxima sesión ({$plan->sesion_actual}) agendada.";
                }
                else if ($plan->sesion_actual >= $plan->numero_sesiones) {
                    $plan->estado = 0;
                    $plan->save();
                    $mensaje .= " Plan de tratamiento finalizado.";
                }

                $hora_medica->id_estado = 6;
                $hora_medica->save();

                return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
            }
            // Sesiones posteriores (controles)
            else {
                // Registrar control/evolución
                if ($request->finalizando_sesiones == 1) {
                    $plan->estado = 0; // Finalizar plan si es la última sesión
                    $plan->save();
                    $tipo_mensaje = 'info';
                    $mensaje = 'Ha finalizado el plan de tratamiento nutricional.';
                } else {
                    $tipo_mensaje = 'success';
                    $mensaje = 'Sesión de control registrada correctamente.';
                }

                // Incrementar sesión si se agendó próxima hora
                $sesion_completada = $plan->sesion_actual;
                $mensaje .= " Sesión {$sesion_completada}/{$plan->numero_sesiones} completada.";

                // Incrementar sesión para sesiones posteriores si se agendó próxima hora
                if ($plan->sesion_actual < $plan->numero_sesiones && $request->hora_agendada == 1) {
                    $plan->sesion_actual += 1;
                    $plan->save();
                    $mensaje .= " Próxima sesión ({$plan->sesion_actual}) agendada.";
                }
                else if ($plan->sesion_actual >= $plan->numero_sesiones) {
                    $plan->estado = 0;
                    $plan->save();
                    $mensaje .= " Plan de tratamiento finalizado.";
                }

                $hora_medica->id_estado = 6;
                $hora_medica->save();

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    // $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }



        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }


    public function store_terapia(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA SICOLOGIA */
                    $ficha_sico = new FichaSicologia();
                    $ficha_sico->id_ficha_otros_prof = $ficha->id;

                    $ficha_sico->id_profesional = $id_profesional;
                    $ficha_sico->id_paciente = $id_paciente;
                    $ficha_sico->presentacion= $request->presentacion;
                    $ficha_sico->conciencias = $request->conciencia;
                    $ficha_sico->actitud = $request->actitud;
                    $ficha_sico->atencion_concentracion = $request->atencion_concentracion;
                    $ficha_sico->afectividad = $request->afectividad;
                    $ficha_sico->pensamiento = $request->pensamiento;
                    $ficha_sico->sensopercepcion = $request->sensopercepcion;
                    $ficha_sico->psicomotricidad = $request->psicomotricidad;
                    $ficha_sico->sueno = $request->sueno;
                    $ficha_sico->higiene = $request->higiene;
                    $ficha_sico->alimentacion = $request->alimentacion;
                    $ficha_sico->psi_solo_control = $request->psi_solo_control;
                    $ficha_sico->psi_ter_indiv =$request->psi_ter_indiv;
                    $ficha_sico->psi_ter_grup =$request->psi_ter_grup;
                    $ficha_sico->psi_sol_hosp =$request->psi_sol_hosp;
                    $ficha_sico->obs_plan_tratamiento =$request->obs_plan_tratamiento;
                    $ficha_sico->otro = '';
                    $ficha_sico->otro1 = '';
                    $ficha_sico->estado = 1;

                    if($ficha_sico->save())
                    {
                        $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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


                        /** REGISTRO FICHA SICOSOCIAL   */

                        {

                            $ficha_sicosocial = new FichaSicosocial();
                            $ficha_sicosocial->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicosocial->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicosocial->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicosocial->id_paciente = $id_paciente;
                            $ficha_sicosocial->id_profesional = $id_profesional;
                            $ficha_sicosocial->lugar_nacimiento = $request->lugar_nacimiento;
                            $ficha_sicosocial->estado_civil = $request->estado_civil;
                            $ficha_sicosocial->niv_ed = $request->niv_ed;
                            $ficha_sicosocial->ocupacion = $request->ocupacion;
                            $ficha_sicosocial->religion = $request->religion;
                            $ficha_sicosocial->vive_con = $request->vive_con;
                            $ficha_sicosocial->vive_obs = $request->vive_obs;
                            $ficha_sicosocial->alcohol = $request->alcohol;
                            $ficha_sicosocial->tabaco = $request->tabaco;
                            $ficha_sicosocial->sustancias_ilicitas = $request->sustancias_ilicitas;
                            $ficha_sicosocial->sexualidad = $request->sexualidad;
                            $ficha_sicosocial->com_generales = $request->com_generales;
                            $ficha_sicosocial->ant_laborales = $request->ant_laborales;
                            $ficha_sicosocial->ant_esparc = $request->ant_esparc;
                            $ficha_sicosocial->obs_generales = $request->obs_generales;
                            $ficha_sicosocial->otro = '';
                            $ficha_sicosocial->otro2 = '';
                            $ficha_sicosocial->estado = 1;

                            if($ficha_sicosocial->save())
                            {
                                $mensaje .= 'Ficha Sico-Social registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Social con problema al registrar\n';
                            }
                        }
                        /** REGISTRO FICHA SICOBIOPATOGRAFIA   */

                        {

                            $ficha_sicobiopatografia = new FichaSicoBiopatografia();
                            $ficha_sicobiopatografia->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicobiopatografia->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicobiopatografia->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicobiopatografia->id_paciente = $id_paciente;
                            $ficha_sicobiopatografia->id_profesional = $id_profesional;
                            $ficha_sicobiopatografia->prenatal = $request->prenatal;
                            $ficha_sicobiopatografia->natal = $request->natal;
                            $ficha_sicobiopatografia->infancia = $request->infancia;
                            $ficha_sicobiopatografia->adolescencia = $request->adolescencia;
                            $ficha_sicobiopatografia->edad_adulta = $request->edad_adulta;
                            $ficha_sicobiopatografia->ad_mayor = $request->ad_mayor;
                            $ficha_sicobiopatografia->actualidad = $request->actualidad;
                            $ficha_sicobiopatografia->otro = '';
                            $ficha_sicobiopatografia->otro2 = '';
                            $ficha_sicobiopatografia->estado = 1;

                            if($ficha_sicobiopatografia->save())
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOHISTORIAFAMILIAR   */

                         {

                            $ficha_sico_hist_fam = new FichaSicoHistFamiliar();
                            $ficha_sico_hist_fam->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_hist_fam->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_hist_fam->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_hist_fam->id_paciente = $id_paciente;
                            $ficha_sico_hist_fam->id_profesional = $id_profesional;
                            $ficha_sico_hist_fam->nombre_padre = $request->nombre_padre;
                            $ficha_sico_hist_fam->rel_padre = $request->rel_padre;
                            $ficha_sico_hist_fam->nombre_madre = $request->nombre_madre;
                            $ficha_sico_hist_fam->rel_madre = $request->rel_madre;
                            $ficha_sico_hist_fam->rel_entre_padres = $request->rel_entre_padres;
                            $ficha_sico_hist_fam->tiene_hnos = $request->tiene_hnos;
                            $ficha_sico_hist_fam->cantidad_hnos = $request->cantidad_hnos;
                            $ficha_sico_hist_fam->nombre_hno = $request->nombre_hno;
                            $ficha_sico_hist_fam->rel_hf_hno = $request->rel_hf_hno;
                            $ficha_sico_hist_fam->rel_entre_hnos = $request->rel_entre_hnos;
                            $ficha_sico_hist_fam->nombre_pareja = $request->nombre_pareja;
                            $ficha_sico_hist_fam->rel_pareja = $request->rel_pareja;
                            $ficha_sico_hist_fam->rel_hf_pareja_obs = $request->rel_hf_pareja_obs;
                            $ficha_sico_hist_fam->tiene_hijos = $request->tiene_hijos;
                            $ficha_sico_hist_fam->cantidad_hijos = $request->cantidad_hijos;
                            $ficha_sico_hist_fam->nombre_hijo = $request->nombre_hijo;
                            $ficha_sico_hist_fam->rel_hijo = $request->rel_hijo;
                            $ficha_sico_hist_fam->rel_entre_hijos = $request->rel_entre_hijos;
                            $ficha_sico_hist_fam->nombre_ot_per = $request->nombre_ot_per;
                            $ficha_sico_hist_fam->rel_ot_per = $request->rel_ot_per;
                            $ficha_sico_hist_fam->rel_obs_generales = $request->rel_obs_generales;
                            $ficha_sico_hist_fam->otro = '';
                            $ficha_sico_hist_fam->otro2 = '';
                            $ficha_sico_hist_fam->estado = 1;
                            if($ficha_sico_hist_fam->save())
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOANTECEDENTES PSIQUIATRICOS   */

                         {

                            $ficha_sicoantpsiq = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoantpsiq->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoantpsiq->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoantpsiq->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoantpsiq->id_paciente = $id_paciente;
                            $ficha_sicoantpsiq->id_profesional = $id_profesional;
                            $ficha_sicoantpsiq->ant_medicos = $request->ant_medicos;
                            $ficha_sicoantpsiq->ant_suicidio = $request->ant_suicidio;
                            $ficha_sicoantpsiq->enf_mentales = $request->enf_mentales;
                            $ficha_sicoantpsiq->trat_psicologicos_prev = $request->trat_psicologicos_prev;
                            $ficha_sicoantpsiq->trat_psiquiatricos_prev = $request->trat_psiquiatricos_prev;
                            $ficha_sicoantpsiq->medicacion_actual = $request->medicacion_actual;
                            $ficha_sicoantpsiq->otro = '';
                            $ficha_sicoantpsiq->otro2 = '';
                            $ficha_sicoantpsiq->estado = 1;
                            if($ficha_sicoantpsiq->save())
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO EXAMEN MENTAL   */

                         {

                            $ficha_sicoexamenmental = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoexamenmental->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoexamenmental->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoexamenmental->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoexamenmental->id_paciente = $id_paciente;
                            $ficha_sicoexamenmental->id_profesional = $id_profesional;
                            $ficha_sicoexamenmental->presentacion = $request->presentacion;
                            $ficha_sicoexamenmental->conciencia = $request->conciencia;
                            $ficha_sicoexamenmental->actitud = $request->actitud;
                            $ficha_sicoexamenmental->tencion_concentracion = $request->tencion_concentracion;
                            $ficha_sicoexamenmental->afectividad = $request->afectividad;
                            $ficha_sicoexamenmental->pensamiento = $request->pensamiento;
                            $ficha_sicoexamenmental->sensopercepcion = $request->sensopercepcion;
                            $ficha_sicoexamenmental->psicomotricidad = $request->psicomotricidad;
                            $ficha_sicoexamenmental->sueno = $request->sueno;
                            $ficha_sicoexamenmental->higiene = $request->higiene;
                            $ficha_sicoexamenmental->alimentacion = $request->alimentacion;
                            $ficha_sicoexamenmental->otro = '';
                            $ficha_sicoexamenmental->otro2 = '';
                            $ficha_sicoexamenmental->estado = 1;
                            if($ficha_sicoexamenmental->save())
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO TEST DE RORSHCHARCH   */

                         {

                            $ficha_sico_test_rorschach = new FichaSicoTestRorshchach();
                            $ficha_sico_test_rorschach->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_test_rorschach->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_test_rorschach->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_test_rorschach->id_paciente = $id_paciente;
                            $ficha_sico_test_rorschach->id_profesional = $id_profesional;
                            $ficha_sico_test_rorschach->lam_uno_resp = $request->lam_uno_resp;
                            $ficha_sico_test_rorschach->lam_uno_com = $request->lam_uno_com;
                            $ficha_sico_test_rorschach->lam_dos_resp = $request->lam_dos_resp;
                            $ficha_sico_test_rorschach->lam_dos_com = $request->rlam_dos_com;
                            $ficha_sico_test_rorschach->lam_tres_resp = $request->lam_tres_resp;
                            $ficha_sico_test_rorschach->lam_tres_com = $request->lam_tres_com;
                            $ficha_sico_test_rorschach->lam_cuatro_resp = $request->lam_cuatro_resp;
                            $ficha_sico_test_rorschach->lam_cuatro_com= $request->lam_cuatro_com;
                            $ficha_sico_test_rorschach->lam_cinco_resp = $request->lam_cinco_resp;
                            $ficha_sico_test_rorschach->lam_cinco_com = $request->lam_cinco_com;
                            $ficha_sico_test_rorschach->lam_seis_resp= $request->lam_seis_resp;
                            $ficha_sico_test_rorschach->lam_seis_com = $request->rlam_seis_com;
                            $ficha_sico_test_rorschach->lam_siete_resp = $request->lam_siete_resp;
                            $ficha_sico_test_rorschach->lam_siete_com = $request->lam_siete_com;
                            $ficha_sico_test_rorschach->lam_ocho_resp = $request->lam_ocho_resp;
                            $ficha_sico_test_rorschach->lam_ocho_com = $request->lam_ocho_com;
                            $ficha_sico_test_rorschach->lam_nueve_resp = $request->lam_nueve_resp;
                            $ficha_sico_test_rorschach->lam_nueve_com = $request->lam_nueve_com;
                            $ficha_sico_test_rorschach->lam_diez_resp= $request->lam_diez_resp;
                            $ficha_sico_test_rorschach->lam_diez_com = $request->lam_diez_com;
                            $ficha_sico_test_rorschach->comentarios_gen = $request->comentarios_gen;
                            $ficha_sico_test_rorschach->otro = '';
                            $ficha_sico_test_rorschach->otro2 = '';
                            $ficha_sico_test_rorschach->estado = 1;
                            if($ficha_sico_test_rorschach->save())
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach con problema al registrar\n';
                            }
                        }
                          /** REGISTRO FICHA OTROS TEST SICOLOGICOS  */

                          {

                            $ficha_sicootrostest = new FichaSicoOtrosTest();
                            $ficha_sicootrostest->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicootrostest->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicootrostest->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicootrostest->id_paciente = $id_paciente;
                            $ficha_sicootrostest->id_profesional = $id_profesional;
                            $ficha_sicootrostest->nomb_test = $request->nomb_test;
                            $ficha_sicootrostest->resp = $request->resp;
                            $ficha_sicootrostest->com = $request->com;
                            $ficha_sicootrostest->ind = $request->ind;
                            $ficha_sicootrostest->comentarios_gen = $request->comentarios_gen;
                            $ficha_sicootrostest->otro = '';
                            $ficha_sicootrostest->otro2 = '';
                            $ficha_sicootrostest->estado = 1;
                            if($ficha_sicootrostest->save())
                            {
                                $mensaje .= 'Ficha Sico-Otros Test registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Otros Test con problema al registrar\n';
                            }
                        }

                        if($request->cerrarsession == 0 || $request->cerrarsession =='')
                        {
                            /** redireccion Redirect funciona correcto */
                            return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                        }
                        else if($request->cerrarsession == 1)
                        {
                        //si funciona
                            $request->session()->invalidate();
                            $request->session()->regenerateToken();
                            return \Redirect::route('home.ingreso');

                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_tec_orl(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA SICOLOGIA */
                    $ficha_sico = new FichaSicologia();
                    $ficha_sico->id_ficha_otros_prof = $ficha->id;

                    $ficha_sico->id_profesional = $id_profesional;
                    $ficha_sico->id_paciente = $id_paciente;
                    $ficha_sico->presentacion= $request->presentacion;
                    $ficha_sico->conciencias = $request->conciencia;
                    $ficha_sico->actitud = $request->actitud;
                    $ficha_sico->atencion_concentracion = $request->atencion_concentracion;
                    $ficha_sico->afectividad = $request->afectividad;
                    $ficha_sico->pensamiento = $request->pensamiento;
                    $ficha_sico->sensopercepcion = $request->sensopercepcion;
                    $ficha_sico->psicomotricidad = $request->psicomotricidad;
                    $ficha_sico->sueno = $request->sueno;
                    $ficha_sico->higiene = $request->higiene;
                    $ficha_sico->alimentacion = $request->alimentacion;
                    $ficha_sico->psi_solo_control = $request->psi_solo_control;
                    $ficha_sico->psi_ter_indiv =$request->psi_ter_indiv;
                    $ficha_sico->psi_ter_grup =$request->psi_ter_grup;
                    $ficha_sico->psi_sol_hosp =$request->psi_sol_hosp;
                    $ficha_sico->obs_plan_tratamiento =$request->obs_plan_tratamiento;
                    $ficha_sico->otro = '';
                    $ficha_sico->otro1 = '';
                    $ficha_sico->estado = 1;

                    if($ficha_sico->save())
                    {
                        $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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


                        /** REGISTRO FICHA SICOSOCIAL   */

                        {

                            $ficha_sicosocial = new FichaSicosocial();
                            $ficha_sicosocial->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicosocial->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicosocial->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicosocial->id_paciente = $id_paciente;
                            $ficha_sicosocial->id_profesional = $id_profesional;
                            $ficha_sicosocial->lugar_nacimiento = $request->lugar_nacimiento;
                            $ficha_sicosocial->estado_civil = $request->estado_civil;
                            $ficha_sicosocial->niv_ed = $request->niv_ed;
                            $ficha_sicosocial->ocupacion = $request->ocupacion;
                            $ficha_sicosocial->religion = $request->religion;
                            $ficha_sicosocial->vive_con = $request->vive_con;
                            $ficha_sicosocial->vive_obs = $request->vive_obs;
                            $ficha_sicosocial->alcohol = $request->alcohol;
                            $ficha_sicosocial->tabaco = $request->tabaco;
                            $ficha_sicosocial->sustancias_ilicitas = $request->sustancias_ilicitas;
                            $ficha_sicosocial->sexualidad = $request->sexualidad;
                            $ficha_sicosocial->com_generales = $request->com_generales;
                            $ficha_sicosocial->ant_laborales = $request->ant_laborales;
                            $ficha_sicosocial->ant_esparc = $request->ant_esparc;
                            $ficha_sicosocial->obs_generales = $request->obs_generales;
                            $ficha_sicosocial->otro = '';
                            $ficha_sicosocial->otro2 = '';
                            $ficha_sicosocial->estado = 1;

                            if($ficha_sicosocial->save())
                            {
                                $mensaje .= 'Ficha Sico-Social registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Social con problema al registrar\n';
                            }
                        }
                        /** REGISTRO FICHA SICOBIOPATOGRAFIA   */

                        {

                            $ficha_sicobiopatografia = new FichaSicoBiopatografia();
                            $ficha_sicobiopatografia->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicobiopatografia->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicobiopatografia->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicobiopatografia->id_paciente = $id_paciente;
                            $ficha_sicobiopatografia->id_profesional = $id_profesional;
                            $ficha_sicobiopatografia->prenatal = $request->prenatal;
                            $ficha_sicobiopatografia->natal = $request->natal;
                            $ficha_sicobiopatografia->infancia = $request->infancia;
                            $ficha_sicobiopatografia->adolescencia = $request->adolescencia;
                            $ficha_sicobiopatografia->edad_adulta = $request->edad_adulta;
                            $ficha_sicobiopatografia->ad_mayor = $request->ad_mayor;
                            $ficha_sicobiopatografia->actualidad = $request->actualidad;
                            $ficha_sicobiopatografia->otro = '';
                            $ficha_sicobiopatografia->otro2 = '';
                            $ficha_sicobiopatografia->estado = 1;

                            if($ficha_sicobiopatografia->save())
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOHISTORIAFAMILIAR   */

                         {

                            $ficha_sico_hist_fam = new FichaSicoHistFamiliar();
                            $ficha_sico_hist_fam->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_hist_fam->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_hist_fam->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_hist_fam->id_paciente = $id_paciente;
                            $ficha_sico_hist_fam->id_profesional = $id_profesional;
                            $ficha_sico_hist_fam->nombre_padre = $request->nombre_padre;
                            $ficha_sico_hist_fam->rel_padre = $request->rel_padre;
                            $ficha_sico_hist_fam->nombre_madre = $request->nombre_madre;
                            $ficha_sico_hist_fam->rel_madre = $request->rel_madre;
                            $ficha_sico_hist_fam->rel_entre_padres = $request->rel_entre_padres;
                            $ficha_sico_hist_fam->tiene_hnos = $request->tiene_hnos;
                            $ficha_sico_hist_fam->cantidad_hnos = $request->cantidad_hnos;
                            $ficha_sico_hist_fam->nombre_hno = $request->nombre_hno;
                            $ficha_sico_hist_fam->rel_hf_hno = $request->rel_hf_hno;
                            $ficha_sico_hist_fam->rel_entre_hnos = $request->rel_entre_hnos;
                            $ficha_sico_hist_fam->nombre_pareja = $request->nombre_pareja;
                            $ficha_sico_hist_fam->rel_pareja = $request->rel_pareja;
                            $ficha_sico_hist_fam->rel_hf_pareja_obs = $request->rel_hf_pareja_obs;
                            $ficha_sico_hist_fam->tiene_hijos = $request->tiene_hijos;
                            $ficha_sico_hist_fam->cantidad_hijos = $request->cantidad_hijos;
                            $ficha_sico_hist_fam->nombre_hijo = $request->nombre_hijo;
                            $ficha_sico_hist_fam->rel_hijo = $request->rel_hijo;
                            $ficha_sico_hist_fam->rel_entre_hijos = $request->rel_entre_hijos;
                            $ficha_sico_hist_fam->nombre_ot_per = $request->nombre_ot_per;
                            $ficha_sico_hist_fam->rel_ot_per = $request->rel_ot_per;
                            $ficha_sico_hist_fam->rel_obs_generales = $request->rel_obs_generales;
                            $ficha_sico_hist_fam->otro = '';
                            $ficha_sico_hist_fam->otro2 = '';
                            $ficha_sico_hist_fam->estado = 1;
                            if($ficha_sico_hist_fam->save())
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOANTECEDENTES PSIQUIATRICOS   */

                         {

                            $ficha_sicoantpsiq = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoantpsiq->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoantpsiq->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoantpsiq->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoantpsiq->id_paciente = $id_paciente;
                            $ficha_sicoantpsiq->id_profesional = $id_profesional;
                            $ficha_sicoantpsiq->ant_medicos = $request->ant_medicos;
                            $ficha_sicoantpsiq->ant_suicidio = $request->ant_suicidio;
                            $ficha_sicoantpsiq->enf_mentales = $request->enf_mentales;
                            $ficha_sicoantpsiq->trat_psicologicos_prev = $request->trat_psicologicos_prev;
                            $ficha_sicoantpsiq->trat_psiquiatricos_prev = $request->trat_psiquiatricos_prev;
                            $ficha_sicoantpsiq->medicacion_actual = $request->medicacion_actual;
                            $ficha_sicoantpsiq->otro = '';
                            $ficha_sicoantpsiq->otro2 = '';
                            $ficha_sicoantpsiq->estado = 1;
                            if($ficha_sicoantpsiq->save())
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO EXAMEN MENTAL   */

                         {

                            $ficha_sicoexamenmental = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoexamenmental->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoexamenmental->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoexamenmental->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoexamenmental->id_paciente = $id_paciente;
                            $ficha_sicoexamenmental->id_profesional = $id_profesional;
                            $ficha_sicoexamenmental->presentacion = $request->presentacion;
                            $ficha_sicoexamenmental->conciencia = $request->conciencia;
                            $ficha_sicoexamenmental->actitud = $request->actitud;
                            $ficha_sicoexamenmental->tencion_concentracion = $request->tencion_concentracion;
                            $ficha_sicoexamenmental->afectividad = $request->afectividad;
                            $ficha_sicoexamenmental->pensamiento = $request->pensamiento;
                            $ficha_sicoexamenmental->sensopercepcion = $request->sensopercepcion;
                            $ficha_sicoexamenmental->psicomotricidad = $request->psicomotricidad;
                            $ficha_sicoexamenmental->sueno = $request->sueno;
                            $ficha_sicoexamenmental->higiene = $request->higiene;
                            $ficha_sicoexamenmental->alimentacion = $request->alimentacion;
                            $ficha_sicoexamenmental->otro = '';
                            $ficha_sicoexamenmental->otro2 = '';
                            $ficha_sicoexamenmental->estado = 1;
                            if($ficha_sicoexamenmental->save())
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO TEST DE RORSHCHARCH   */

                         {

                            $ficha_sico_test_rorschach = new FichaSicoTestRorshchach();
                            $ficha_sico_test_rorschach->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_test_rorschach->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_test_rorschach->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_test_rorschach->id_paciente = $id_paciente;
                            $ficha_sico_test_rorschach->id_profesional = $id_profesional;
                            $ficha_sico_test_rorschach->lam_uno_resp = $request->lam_uno_resp;
                            $ficha_sico_test_rorschach->lam_uno_com = $request->lam_uno_com;
                            $ficha_sico_test_rorschach->lam_dos_resp = $request->lam_dos_resp;
                            $ficha_sico_test_rorschach->lam_dos_com = $request->rlam_dos_com;
                            $ficha_sico_test_rorschach->lam_tres_resp = $request->lam_tres_resp;
                            $ficha_sico_test_rorschach->lam_tres_com = $request->lam_tres_com;
                            $ficha_sico_test_rorschach->lam_cuatro_resp = $request->lam_cuatro_resp;
                            $ficha_sico_test_rorschach->lam_cuatro_com= $request->lam_cuatro_com;
                            $ficha_sico_test_rorschach->lam_cinco_resp = $request->lam_cinco_resp;
                            $ficha_sico_test_rorschach->lam_cinco_com = $request->lam_cinco_com;
                            $ficha_sico_test_rorschach->lam_seis_resp= $request->lam_seis_resp;
                            $ficha_sico_test_rorschach->lam_seis_com = $request->rlam_seis_com;
                            $ficha_sico_test_rorschach->lam_siete_resp = $request->lam_siete_resp;
                            $ficha_sico_test_rorschach->lam_siete_com = $request->lam_siete_com;
                            $ficha_sico_test_rorschach->lam_ocho_resp = $request->lam_ocho_resp;
                            $ficha_sico_test_rorschach->lam_ocho_com = $request->lam_ocho_com;
                            $ficha_sico_test_rorschach->lam_nueve_resp = $request->lam_nueve_resp;
                            $ficha_sico_test_rorschach->lam_nueve_com = $request->lam_nueve_com;
                            $ficha_sico_test_rorschach->lam_diez_resp= $request->lam_diez_resp;
                            $ficha_sico_test_rorschach->lam_diez_com = $request->lam_diez_com;
                            $ficha_sico_test_rorschach->comentarios_gen = $request->comentarios_gen;
                            $ficha_sico_test_rorschach->otro = '';
                            $ficha_sico_test_rorschach->otro2 = '';
                            $ficha_sico_test_rorschach->estado = 1;
                            if($ficha_sico_test_rorschach->save())
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach con problema al registrar\n';
                            }
                        }
                          /** REGISTRO FICHA OTROS TEST SICOLOGICOS  */

                          {

                            $ficha_sicootrostest = new FichaSicoOtrosTest();
                            $ficha_sicootrostest->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicootrostest->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicootrostest->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicootrostest->id_paciente = $id_paciente;
                            $ficha_sicootrostest->id_profesional = $id_profesional;
                            $ficha_sicootrostest->nomb_test = $request->nomb_test;
                            $ficha_sicootrostest->resp = $request->resp;
                            $ficha_sicootrostest->com = $request->com;
                            $ficha_sicootrostest->ind = $request->ind;
                            $ficha_sicootrostest->comentarios_gen = $request->comentarios_gen;
                            $ficha_sicootrostest->otro = '';
                            $ficha_sicootrostest->otro2 = '';
                            $ficha_sicootrostest->estado = 1;
                            if($ficha_sicootrostest->save())
                            {
                                $mensaje .= 'Ficha Sico-Otros Test registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Otros Test con problema al registrar\n';
                            }
                        }

                        if($request->cerrarsession == 0 || $request->cerrarsession =='')
                        {
                            /** redireccion Redirect funciona correcto */
                            return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                        }
                        else if($request->cerrarsession == 1)
                        {
                        //si funciona
                            $request->session()->invalidate();
                            $request->session()->regenerateToken();
                            return \Redirect::route('home.ingreso');

                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO INFORME KINE - Registro*/
    public function KineInformeRegistro(Request $request)
    {

        {

            $kine_informe = new KineInforme();
            $kine_informe->id_ficha_atencion = $ficha->id;
            $kine_informe->id_ficha_otros_prof = $ficha->id;
            $kine_informe->id_especialidad = $profesional->id_especialidad;
            $kine_informe->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $kine_informe->id_paciente = $id_paciente;
            $kine_informe->id_profesional = $id_profesional;
            $kine_informe->med_tte = $request->med_tte;
            $kine_informe->dg_kine = $request->dg_kine;
            $kine_informe->ses_real = $request->ses_real;
            $kine_informe->ses_pend= $request->ses_pend;
            $kine_informe->tto_realizado = $request->tto_realizado;
            $kine_informe->com_inf_kine = $request->com_inf_kine;
            $kine_informe->prox_cont = $request->prox_cont;
            $kine_informe->otro = '';
            $kine_informe->otro2 = '';
            $kine_informe->estado = 1;
            if($kine_informe->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    /** REGISTRO INFORME KINE - Registro*/
    public function KinePlanificacionRegistro(Request $request)
    {

        {

            $kine_planificacion = new KinePlanificacion();
            $kine_planificacion->id_ficha_atencion = $ficha->id;
            $kine_planificacion->id_ficha_otros_prof = $ficha->id;
            $kine_planificacion->id_especialidad = $profesional->id_especialidad;
            $kine_planificacion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $kine_planificacion->id_paciente = $id_paciente;
            $kine_planificacion->id_profesional = $id_profesional;
            $kine_planificacion->fec_inicio_tto = $request->fec_inicio_tto;
            $kine_planificacion->dg_ingreso = $request->dg_ingreso;
            $kine_planificacion->n_sesione = $request->n_sesione;
            $kine_planificacion->obj= $request->obj;
            $kine_planificacion->otro = '';
            $kine_planificacion->otro2 = '';
            $kine_planificacion->estado = 1;
            if($kine_planificacion->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
      /** REGISTRO INFORME FONO - Registro*/
    public function FonoInformeRegistro(Request $request)
    {

        {

            $fono_informe = new FonoInforme();

            $fono_informe->id_ficha_otros_prof = $ficha_otros_prof->id;
            $fono_informe->id_ficha_fonoaudiologia = $ficha_fonoaudiologia;
            $fono_informe->id_paciente = $id_paciente;
            $fono_informe->id_profesional = $id_profesional;

            $fono_informe->med_tte = $request->med_tte;
            $fono_informe->nombre_paciente = $request->nombre_paciente;
            $fono_informe->edad = $request->nedad;
            $fono_informe->email = $request->email;
            $fono_informe->dg_fono = $request->ddg_fono;
            $fono_informe->ses_real= $request->ses_real;
            $fono_informe->ses_pend = $request->ses_pend;
            $fono_informe->tto_realizado = $request->tto_realizado;
            $fono_informe->com_inf_fono = $request->com_inf_fono;
            $fono_informe->nomb_fono= $request->nomb_fono;
            $fono_informe->prox_cont_fono= $request->prox_cont_fono;
            $fono_informe->otro = '';
            $fono_informe->otro2 = '';
            $fono_informe->estado = 1;
            if($fono_informe->save())
            {
                $mensaje .= 'Informe registrado con exito\n';
            }
            else
            {
                $mensaje .= 'Informe con problema al registrar\n';
            }
        }
    }

    // public function store_fono_octa_par(Request $request)
    // {
    //     try {
    //         $campos_requeridos = 1;
    //         $tipo_mensaje = 'success';
    //         $mensaje = '';
    //         if(empty( trim($request->concluciones_examen)))
    //         {
    //             $campos_requeridos = 0;
    //             $mensaje = 'La conclucion es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.';
    //         }


    //         /** REGISTRO DE PROFESIONAO SOLICITADO POR */
    //         if( !empty($request->solicitado_id_profesional_oct_par) || !empty($request->derivado_por_rut) )
    //         {

    //             if( empty($request->solicitado_id_profesional_oct_par) && !empty($request->derivado_por_rut) )
    //             {

    //                 if(empty($request->derivado_por))
    //                 {
    //                     $campos_requeridos = 0;
    //                     $mensaje .= 'Campo requerido NOMBRE del Solicitante.\n';
    //                 }
    //                 if(empty($request->solicitado_apellido_oct_par))
    //                 {
    //                     $campos_requeridos = 0;
    //                     $mensaje .= 'Campo requerido APELLIDO del Solicitante.\n';
    //                 }
    //                 if(empty($request->solicitado_telefono_oct_par) || empty($request->solicitado_email_oct_par))
    //                 {
    //                     $campos_requeridos = 0;
    //                     $mensaje .= 'Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
    //                 }
    //             }
    //         }

    //         if($campos_requeridos == 1)
    //         {
    //             if( !empty($request->solicitado_id_profesional_oct_par) || !empty($request->derivado_por_rut) )
    //             {

    //                 if( empty($request->solicitado_id_profesional_oct_par) && !empty($request->derivado_por_rut) )
    //                 {
    //                     $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_oct_par, $request->solicitado_apellido_oct_par, '', '', $request->derivado_por_rut, $request->solicitado_email_oct_par, $request->solicitado_telefono_oct_par, '', '', '', '', '', '', '', '', '', 1);
    //                 }
    //             }
    //             /** FICHA ATENCION  */
    //             $id_profesional = $request->id_profesional_fc;
    //             $id_paciente = $request->id_paciente_fc;


    //             $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

    //             try {
    //                 //code...
    //                 $procedimiento = ProcedimientosCentro::find($request->id_procedimiento);

    //                 // $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
    //                 $ficha = FichaAtencion::where('id', $request->id_fc)->first();

    //                 if($ficha){
    //                     $ficha->dg_ingreso = $procedimiento->nombre;
    //                     $ficha->hipotesis = $request->concluciones_examen;
    //                     $ficha->id_paciente = $id_paciente;
    //                     $ficha->id_profesional = $id_profesional;
    //                     $ficha->finalizada = 1;
    //                 }

    //             } catch (\Exception $e) {
    //                 //throw $th;
    //                 return ['error' => $e->getMessage()];
    //             }


    //             $registro_archivo = array();
    //             if(!empty($request->input_lista_archivo))
    //             {
    //                 $paciente = Paciente::find($request->id_paciente_fc);

    //                 $array_archivo = json_decode($request->input_lista_archivo);

    //                 $resulto_img = array();
    //                 foreach ($array_archivo as $key => $value)
    //                 {
    //                     $ruta_temp = $value[0];
    //                     $nombre_real = $value[1];
    //                     $nombre_temp = $value[2];
    //                     $file_extension = $value[3];
    //                     $nombre_final = $paciente->rut.'_examen_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

    //                     $resulto_archivo[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
    //                     return $resulto_archivo[$key];
    //                     $url = $resulto_archivo[$key]['proceso']['url'];

    //                     $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
    //                     $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

    //                     array_push($registro_archivo, array(
    //                         'nombre' => $nombre_final,
    //                         'url' => $url
    //                     ));
    //                 }

    //                 $registro_archivo = json_encode($registro_archivo);
    //             }

    //             if(!empty($registro_archivo))
    //                 $ficha->estado_archivo = 1;
    //             else
    //                 $ficha->estado_archivo = 0;

    //             $ficha->archivo = $registro_archivo;

    //             return $ficha;

    //             if ($ficha->save())
    //             {
    //                 //  finalizar hora medica
    //                 $hora_medica->id_estado = 6;
    //                 $mensaje_estado_hora_medica = '';
    //                 if (!$hora_medica->save()) {
    //                     $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
    //                 }
    //                 else
    //                 {
    //                     $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
    //                 }
    //                 $mensaje .= $mensaje_estado_hora_medica;

    //                 $mensaje .= 'Ficha Clínica  guardada de forma correcta\n';

    //                 /** REGISTRO FICHA  OCTAVO PAR */
    //                 {
    //                     $ficha_octavo_par = new OctavoPar();
    //                     $ficha_octavo_par->id_otros_profesionales = $request->id_fc;
    //                     $ficha_octavo_par->id_examen = $request->id_examen;
    //                     $ficha_octavo_par->id_lugar_atencion = $request->id_lugar_atencion;
    //                     $ficha_octavo_par->id_institucion = $request->id_institucion;
    //                     $ficha_octavo_par->token = uniqid();
    //                     $ficha_octavo_par->id_profesional = $request->id_profesional_fc;
    //                     $ficha_octavo_par->id_paciente = $request->id_paciente_fc;
    //                     $ficha_octavo_par->fecha_ex = $request->fecha_ex;
    //                     $ficha_octavo_par->profesional = $request->profesional;

    //                     if(empty($request->solicitado_id_profesional_oct_par))
    //                         $ficha_octavo_par->id_derivado_por = $request->solicitado_id_profesional_oct_par;
    //                     else
    //                         $ficha_octavo_par->id_derivado_por = $profesional_provisorio['last_id'];
    //                     $ficha_octavo_par->derivado_por = $request->derivado_por;
    //                     $ficha_octavo_par->nombre_pcte = $request->nombre_pcte;
    //                     $ficha_octavo_par->edad = $request->edad;
    //                     $ficha_octavo_par->rut = $request->rut;
    //                     $ficha_octavo_par->direccion = $request->direccion;
    //                     $ficha_octavo_par->email = $request->email;
    //                     $ficha_octavo_par->ant_especialidad = $request->ant_especialidad;
    //                     $ficha_octavo_par->romberg = $request->romberg;
    //                     $ficha_octavo_par->romberg_sens = $request->romberg_sens;
    //                     $ficha_octavo_par->marcha_ojo_ab = $request->marcha_ojo_ab;
    //                     $ficha_octavo_par->babinsky = $request->babinsky;
    //                     $ficha_octavo_par->romberg_barre = $request->romberg_barre;
    //                     $ficha_octavo_par->untenberg_fak = $request->untenberg_fak;
    //                     $ficha_octavo_par->indicacion = $request->indicacion;
    //                     $ficha_octavo_par->temblor = $request->temblor;
    //                     $ficha_octavo_par->dismetria = $request->dismetria;
    //                     $ficha_octavo_par->discinergia = $request->discinergia;
    //                     $ficha_octavo_par->disdiadoco = $request->disdiadoco;
    //                     $ficha_octavo_par->hipotonia = $request->hipotonia;
    //                     $ficha_octavo_par->otras_pruebas = $request->otras_pruebas;
    //                     $ficha_octavo_par->observaciones_equilibrio = $request->observaciones_equilibrio;
    //                     $ficha_octavo_par->ng_1 = $request->ng_1;
    //                     $ficha_octavo_par->ng_2 = $request->ng_2;
    //                     $ficha_octavo_par->ng_3 = $request->ng_3;
    //                     $ficha_octavo_par->ng_4 = $request->ng_4;
    //                     $ficha_octavo_par->ng_5 = $request->ng_5;
    //                     $ficha_octavo_par->ng_6 = $request->ng_6;
    //                     $ficha_octavo_par->ng_7 = $request->ng_7;
    //                     $ficha_octavo_par->ng_8 = $request->ng_8;
    //                     $ficha_octavo_par->ng_9 = $request->ng_9;
    //                     $ficha_octavo_par->ng_10 = $request->ng_10;
    //                     $ficha_octavo_par->mov_oculares = $request->mov_oculares;
    //                     $ficha_octavo_par->dismetria_ocular = $request->dismetria_ocular;
    //                     $ficha_octavo_par->obs_comentarios = $request->obs_comentarios;
    //                     $ficha_octavo_par->ex_ng_provocado = OctavoParController::estructuraExaNistagmoProvocado($request);
    //                     $ficha_octavo_par->ex_p_calorica = OctavoParController::estructuraExaPruebaCalorica($request);
    //                     // $ficha_octavo_par->otro = $request->otro;
    //                     // $ficha_octavo_par->otro1 = $request->otro1;
    //                     $ficha_octavo_par->estado = 1;

    //                     if($ficha_octavo_par->save())
    //                     {
    //                         $tipo_mensaje = 'success';
    //                         $mensaje .= 'Ficha Examen Octavo Par registrada con exito\n';
    //                     }
    //                     else
    //                     {
    //                         $tipo_mensaje = 'danger';
    //                         $mensaje .= 'Ficha Examen Octavo Par con problema al registrar\n';
    //                     }

    //                     if($request->cerrarsession == 0 || $request->cerrarsession =='')
    //                     {
    //                         /** redireccion Redirect funciona correcto */
    //                         return \Redirect::route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
    //                     }
    //                     else if($request->cerrarsession == 1)
    //                     {
    //                         //si funciona
    //                         // $request->session()->invalidate();
    //                         $request->session()->regenerateToken();
    //                         return \Redirect::route('home.ingreso');

    //                     }
    //                 }
    //             }
    //             else
    //             {
    //                 return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
    //             }

    //         }
    //         else
    //         {
    //             return ['success' => false, 'estado' => 0, 'msj' => $mensaje];
    //         }
    //     } catch (\Exception $e) {
    //         //throw $th;
    //         return ['error' => $e->getMessage()];
    //     }

    // }

     public function store_fono_octa_par(Request $request)
    {

        $campos_requeridos = 1;
        $tipo_mensaje = 'success';
        $mensaje = '';
        if(empty( trim($request->concluciones_examen)))
        {
            $campos_requeridos = 0;
            $mensaje = 'La conclucion es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.';
        }


        /** REGISTRO DE PROFESIONAO SOLICITADO POR */
        if( !empty($request->solicitado_id_profesional_oct_par) || !empty($request->derivado_por_rut) )
        {

            if( empty($request->solicitado_id_profesional_oct_par) && !empty($request->derivado_por_rut) )
            {

                if(empty($request->solicitado_nombre_oct_par))
                {
                    $campos_requeridos = 0;
                    $mensaje .= 'Campo requerido NOMBRE del Solicitante.\n';
                }
                if(empty($request->solicitado_apellido_oct_par))
                {
                    $campos_requeridos = 0;
                    $mensaje .= 'Campo requerido APELLIDO del Solicitante.\n';
                }
                if(empty($request->solicitado_telefono_oct_par) || empty($request->solicitado_email_oct_par))
                {
                    $campos_requeridos = 0;
                    $mensaje .= 'Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                }
            }
        }

        if($campos_requeridos == 1)
        {
            if( !empty($request->solicitado_id_profesional_oct_par) || !empty($request->derivado_por_rut) )
            {

                if( empty($request->solicitado_id_profesional_oct_par) && !empty($request->derivado_por_rut) )
                {
                    $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_oct_par, $request->solicitado_apellido_oct_par, '', '', $request->derivado_por_rut, $request->solicitado_email_oct_par, $request->solicitado_telefono_oct_par, '', '', '', '', '', '', '', '', '', 1);
                }
            }
            /** FICHA ATENCION  */
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;


            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            try {
                //code...
                $procedimiento = ProcedimientosCentro::find($request->id_procedimiento);

                $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
                //$ficha = FichaAtencion::where('id', $request->id_fc)->first();

                if($ficha){
                    // ACUMULAR diagnósticos separados por comas
                    if(empty($ficha->dg_ingreso)) {
                        $ficha->dg_ingreso = $procedimiento->nombre;
                    } else {
                        // Solo agregar si no existe ya en la lista
                        $diagnosticos_existentes = explode(',', $ficha->dg_ingreso);
                        $diagnosticos_existentes = array_map('trim', $diagnosticos_existentes);
                        if(!in_array($procedimiento->nombre, $diagnosticos_existentes)) {
                            $ficha->dg_ingreso = $ficha->dg_ingreso . ', ' . $procedimiento->nombre;
                        }
                    }

                    // ACUMULAR hipótesis separadas por comas
                    if(empty($ficha->hipotesis)) {
                        $ficha->hipotesis = $request->concluciones_examen;
                    } else {
                        // Solo agregar si no está vacía la nueva conclusión
                        if(!empty(trim($request->concluciones_examen))) {
                            $ficha->hipotesis = $ficha->hipotesis . ', ' . $request->concluciones_examen;
                        }
                    }

                    $ficha->id_paciente = $id_paciente;
                    $ficha->id_profesional = $id_profesional;
                    $ficha->finalizada = 1;
                }

            } catch (\Exception $e) {
                //throw $th;
                return ['error' => $e->getMessage()];
            }



            $registro_archivo = array();

            $paciente = Paciente::find($request->id_paciente_fc);

            $paciente->edad = Carbon::parse($paciente->fecha_nac)->age;

            if(!empty($request->input_lista_archivo))
            {

                // Decodificar JSON con parámetro true para obtener array asociativo
                $array_archivo = json_decode($request->input_lista_archivo, true);

                $resulto_archivo = array();
                $archivo_correo = array();

                foreach ($array_archivo as $key => $archivo_info)
                {
                    // Manejar la nueva estructura de datos del JavaScript
                    if (is_array($archivo_info)) {
                        // Verificar si es array con claves nombradas o array con índices numéricos
                        if (isset($archivo_info['url']) || isset($archivo_info['nombre_original'])) {
                            // Estructura nueva (objeto con propiedades)
                            $ruta_temp = $archivo_info['url'] ?? '';
                            $nombre_real = $archivo_info['nombre_original'] ?? '';
                            $nombre_temp = $archivo_info['nombre_archivo'] ?? '';
                            $file_extension = $archivo_info['file_extension'] ?? '';
                            $tipo_dropzone = $archivo_info['tipo_dropzone'] ?? 'general'; // Nuevo campo
                        } else {
                            // Estructura legacy (array con índices numéricos) - por compatibilidad
                            $ruta_temp = $archivo_info[0] ?? '';
                            $nombre_real = $archivo_info[1] ?? '';
                            $nombre_temp = $archivo_info[2] ?? '';
                            $file_extension = $archivo_info[3] ?? '';
                            $tipo_dropzone = 'general'; // Por defecto para estructura legacy
                        }
                    } else {
                        // Caso donde no es array (no debería pasar, pero por seguridad)
                        Log::error('Estructura de archivo no reconocida', [
                            'key' => $key,
                            'archivo_info' => $archivo_info,
                            'tipo' => gettype($archivo_info)
                        ]);
                        continue;
                    }

                    // Validar que tenemos los datos necesarios
                    if (empty($nombre_temp) || empty($file_extension)) {
                        Log::warning('Archivo incompleto, saltando', [
                            'key' => $key,
                            'nombre_temp' => $nombre_temp,
                            'file_extension' => $file_extension
                        ]);
                        continue;
                    }

                    // Buscar archivo en disco temporal - primero intentar nombre exacto
                    $existe_exacto = Storage::disk('archivo_temp')->exists($nombre_temp);
                    $archivo_a_mover = $nombre_temp;

                    if (!$existe_exacto) {
                        Log::warning('Archivo exacto no encontrado, buscando similares', [
                            'nombre_buscado' => $nombre_temp,
                            'nombre_original' => $nombre_real
                        ]);

                        // Buscar archivos similares por nombre original y extensión
                        try {
                            $archivos_temp = Storage::disk('archivo_temp')->files();
                            $archivos_similares = [];

                            // Buscar archivos con la misma extensión y nombre original similar
                            foreach ($archivos_temp as $archivo) {
                                $nombre_archivo = basename($archivo);

                                // Verificar si contiene el nombre original y tiene la misma extensión
                                if (pathinfo($archivo, PATHINFO_EXTENSION) === $file_extension) {
                                    // Primero: búsqueda exacta por nombre original
                                    $nombre_original_limpio = str_replace([' ', '.', '-', '_'], ['_', '_', '_', '_'], pathinfo($nombre_real, PATHINFO_FILENAME));
                                    if (strpos($nombre_archivo, $nombre_original_limpio) !== false) {
                                        $archivos_similares[] = $archivo;
                                    }
                                    // Segundo: búsqueda más flexible - solo archivos .pdf recientes
                                    elseif ($file_extension === 'pdf') {
                                        // Buscar archivos PDF que empiecen con timestamp del día actual
                                        $timestamp_hoy = date('Y');  // Al menos del año actual
                                        if (strpos($nombre_archivo, $timestamp_hoy) !== false ||
                                            preg_match('/^\d{10,}_[a-f0-9]+\.pdf$/', $nombre_archivo)) {
                                            $archivos_similares[] = $archivo;
                                        }
                                    }
                                }
                            }

                            if (count($archivos_similares) > 0) {
                                // Tomar el más reciente (último en la lista)
                                $archivo_a_mover = end($archivos_similares);
                                Log::info('Usando archivo similar encontrado', [
                                    'archivo_original' => $nombre_temp,
                                    'archivo_encontrado' => $archivo_a_mover,
                                    'total_candidatos' => count($archivos_similares)
                                ]);
                            } else {
                                // Último recurso: buscar el archivo PDF más reciente si no encontramos nada
                                if ($file_extension === 'pdf') {
                                    $archivos_pdf = array_filter($archivos_temp, function($archivo) {
                                        return pathinfo($archivo, PATHINFO_EXTENSION) === 'pdf';
                                    });

                                    if (count($archivos_pdf) > 0) {
                                        // Ordenar por tiempo de modificación (más reciente primero)
                                        usort($archivos_pdf, function($a, $b) {
                                            return Storage::disk('archivo_temp')->lastModified($b) - Storage::disk('archivo_temp')->lastModified($a);
                                        });

                                        $archivo_a_mover = $archivos_pdf[0]; // El más reciente
                                        Log::warning('Usando archivo PDF más reciente como último recurso', [
                                            'archivo_original' => $nombre_temp,
                                            'archivo_encontrado' => $archivo_a_mover,
                                            'total_pdfs_disponibles' => count($archivos_pdf)
                                        ]);
                                    } else {
                                        Log::error('No se encontraron archivos similares ni PDFs', [
                                            'nombre_buscado' => $nombre_temp,
                                            'nombre_original' => $nombre_real,
                                            'archivos_disponibles' => $archivos_temp
                                        ]);
                                        continue;
                                    }
                                } else {
                                    Log::error('No se encontraron archivos similares', [
                                        'nombre_buscado' => $nombre_temp,
                                        'nombre_original' => $nombre_real,
                                        'archivos_disponibles' => $archivos_temp
                                    ]);
                                    continue;
                                }
                            }
                        } catch (\Exception $e) {
                            Log::error('Error buscando archivos similares', [
                                'error' => $e->getMessage(),
                                'nombre_buscado' => $nombre_temp
                            ]);
                            continue;
                        }
                    }

                    $nombre_final = $paciente->rut.'_examen_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    Log::info('Preparando movimiento de archivo', [
                        'key' => $key,
                        'nombre_temp_original' => $nombre_temp,
                        'archivo_a_mover' => $archivo_a_mover,
                        'nombre_final' => $nombre_final,
                        'extension' => $file_extension,
                        'encontrado_exacto' => $existe_exacto
                    ]);

                    $resultado_mover = CargaArchivoController::moverArchivo($archivo_a_mover, 'archivo_archivo', $nombre_final);
                    $resulto_archivo[$key] = $resultado_mover;

                    // Log detallado del resultado del movimiento
                    Log::info('Resultado detallado del movimiento', [
                        'key' => $key,
                        'resultado_completo' => $resultado_mover,
                        'estado_exacto' => $resultado_mover['estado'] ?? 'no definido',
                        'estado_tipo' => gettype($resultado_mover['estado'] ?? null),
                        'estado_igual_1' => ($resultado_mover['estado'] ?? null) == 1,
                        'estado_identico_1' => ($resultado_mover['estado'] ?? null) === 1
                    ]);

                    // Verificar si el movimiento fue exitoso
                    if ($resultado_mover['estado'] == 1) {
                        $url = $resultado_mover['proceso']['url'];
                        $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                        $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                        Log::info('Archivo movido exitosamente', [
                            'key' => $key,
                            'url' => $url,
                            'nombre_final' => $nombre_final
                        ]);

                        array_push($registro_archivo, array(
                            'nombre' => $nombre_final,
                            'url' => $url,
                            'tipo_dropzone' => $tipo_dropzone,
                            'nombre_original' => $nombre_real
                        ));

                        Log::info('Archivo agregado al registro_archivo', [
                            'key' => $key,
                            'elemento_agregado' => ['nombre' => $nombre_final, 'url' => $url],
                            'total_elementos_ahora' => count($registro_archivo)
                        ]);
                    } else {
                        Log::error('Error al mover archivo', [
                            'key' => $key,
                            'resultado' => $resultado_mover,
                            'nombre_temp_original' => $nombre_temp,
                            'archivo_intentado_mover' => $archivo_a_mover,
                            'nombre_final' => $nombre_final
                        ]);
                    }
                }

                // Log antes de json_encode para ver el estado del array
                Log::info('Estado del array antes de json_encode', [
                    'registro_archivo_array' => $registro_archivo,
                    'count_registro_archivo' => count($registro_archivo),
                    'resulto_archivo' => $resulto_archivo,
                    'count_resulto_archivo' => count($resulto_archivo ?? [])
                ]);

                $registro_archivo = json_encode($registro_archivo);

                // Log final para debugging
                Log::info('Estado final del registro de archivos', [
                    'registro_archivo_json' => $registro_archivo,
                    'cantidad_archivos_procesados' => count(json_decode($registro_archivo, true) ?? []),
                    'archivo_correo_count' => count($archivo_correo ?? [])
                ]);
            }


            // ACUMULAR archivos existentes con los nuevos
            $archivos_finales = [];

            // Obtener archivos existentes si los hay
            if(!empty($ficha->archivo)) {
                $archivos_existentes = json_decode($ficha->archivo, true);
                if(is_array($archivos_existentes)) {
                    $archivos_finales = $archivos_existentes;
                    Log::info('Archivos existentes encontrados en octavo par', [
                        'cantidad_existentes' => count($archivos_existentes)
                    ]);
                }
            }

            // Agregar nuevos archivos si los hay
            if(!empty($registro_archivo)) {
                $nuevos_archivos = json_decode($registro_archivo, true);
                if(is_array($nuevos_archivos)) {
                    $archivos_finales = array_merge($archivos_finales, $nuevos_archivos);
                    Log::info('Archivos nuevos agregados en octavo par', [
                        'cantidad_nuevos' => count($nuevos_archivos),
                        'cantidad_total' => count($archivos_finales)
                    ]);
                }
            }

            // Log del estado antes de guardar en la ficha
            Log::info('Preparando guardar en ficha octavo par', [
                'archivos_existentes_previos' => !empty($ficha->archivo) ? count(json_decode($ficha->archivo, true) ?? []) : 0,
                'archivos_nuevos_agregados' => !empty($registro_archivo) ? count(json_decode($registro_archivo, true) ?? []) : 0,
                'archivos_totales_finales' => count($archivos_finales),
                'estado_archivo_a_asignar' => !empty($archivos_finales) ? 1 : 0
            ]);

            // Actualizar estado y contenido de archivos
            if(!empty($archivos_finales)) {
                $ficha->estado_archivo = 1;
                $ficha->archivo = json_encode($archivos_finales);
            } else {
                // Solo cambiar a 0 si no había archivos previos
                if(empty($ficha->archivo)) {
                    $ficha->estado_archivo = 0;
                    $ficha->archivo = json_encode([]); // Array vacío como JSON
                }
            }

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

                /** REGISTRO FICHA  OCTAVO PAR */
                {
                                        // Extraer datos de los arrays JSON
                    $nistagmo_espontaneo = $request->nistagmo_espontaneo ?? [];
                    $nistagmo_provocado = $request->nistagmo_provocado ?? [];
                    $prueba_calorica = $request->prueba_calorica ?? [];

                    $ficha_octavo_par = new OctavoPar();
                    $ficha_octavo_par->id_otros_profesionales = $request->id_fc;
                    $ficha_octavo_par->id_examen = $request->id_examen;
                    $ficha_octavo_par->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_octavo_par->id_institucion = $request->id_institucion;
                    $ficha_octavo_par->token = uniqid();
                    $ficha_octavo_par->id_profesional = $request->id_profesional_fc;
                    $ficha_octavo_par->id_paciente = $request->id_paciente_fc;
                    $ficha_octavo_par->fecha_ex = $request->fecha_ex;
                    $ficha_octavo_par->profesional = $request->profesional;

                    if(empty($request->solicitado_id_profesional_oct_par))
                        $ficha_octavo_par->id_derivado_por = $request->solicitado_id_profesional_oct_par;
                    else
                        $ficha_octavo_par->id_derivado_por = $profesional_provisorio['last_id'];
                    $ficha_octavo_par->derivado_por = $request->derivado_por;
                    $ficha_octavo_par->nombre_pcte = $paciente->nombre.' '.$paciente->apellido_uno;
                    $ficha_octavo_par->edad = $request->edad;
                    $ficha_octavo_par->rut = $request->rut;
                    $ficha_octavo_par->direccion = $request->direccion;
                    $ficha_octavo_par->email = $request->email;
                    $ficha_octavo_par->ant_especialidad = $request->ant_especialidad;
                    $ficha_octavo_par->otros_pares_craneanos = $request->otros_pares_craneanos;
                    $ficha_octavo_par->romberg = $request->romberg;
                    $ficha_octavo_par->romberg_sens = $request->romberg_sens;
                    $ficha_octavo_par->marcha_ojo_ab = $request->marcha_ojo_ab;
                    $ficha_octavo_par->babinsky = $request->babinsky;
                    $ficha_octavo_par->romberg_barre = $request->romberg_barre;
                    $ficha_octavo_par->untenberg_fak = $request->untenberg_fak;
                    $ficha_octavo_par->indicacion = $request->indicacion;
                    $ficha_octavo_par->temblor = $request->temblor;
                    $ficha_octavo_par->dismetria = $request->dismetria;
                    $ficha_octavo_par->discinergia = $request->discinergia;
                    $ficha_octavo_par->disdiadoco = $request->disdiadoco;
                    $ficha_octavo_par->hipotonia = $request->hipotonia;
                    $ficha_octavo_par->otras_pruebas = $request->otras_pruebas;
                    $ficha_octavo_par->observaciones_equilibrio = $request->observaciones_equilibrio;

                    // Extraer ng_1 a ng_9 del array nistagmo_espontaneo
                    $ficha_octavo_par->ng_1 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_1'] ?? '') : ($request->ng_1 ?? '');
                    $ficha_octavo_par->ng_2 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_2'] ?? '') : ($request->ng_2 ?? '');
                    $ficha_octavo_par->ng_3 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_3'] ?? '') : ($request->ng_3 ?? '');
                    $ficha_octavo_par->ng_4 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_4'] ?? '') : ($request->ng_4 ?? '');
                    $ficha_octavo_par->ng_5 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_5'] ?? '') : ($request->ng_5 ?? '');
                    $ficha_octavo_par->ng_6 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_6'] ?? '') : ($request->ng_6 ?? '');
                    $ficha_octavo_par->ng_7 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_7'] ?? '') : ($request->ng_7 ?? '');
                    $ficha_octavo_par->ng_8 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_8'] ?? '') : ($request->ng_8 ?? '');
                    $ficha_octavo_par->ng_9 = is_array($nistagmo_espontaneo) ? ($nistagmo_espontaneo['ng_9'] ?? '') : ($request->ng_9 ?? '');

                    // Extraer ng_10 del array nistagmo_provocado
                    $ficha_octavo_par->ng_10 = is_array($nistagmo_provocado) ? ($nistagmo_provocado['ng_10'] ?? '') : ($request->ng_10 ?? '');

                    $ficha_octavo_par->mov_oculares = $request->mov_oculares;
                    $ficha_octavo_par->dismetria_ocular = $request->dismetria_ocular;
                    $ficha_octavo_par->obs_comentarios = $request->obs_comentarios;
                    $ficha_octavo_par->ex_ng_provocado = OctavoParController::estructuraExaNistagmoProvocado($request);
                    $ficha_octavo_par->ex_p_calorica = OctavoParController::estructuraExaPruebaCalorica($request);
                    // $ficha_octavo_par->otro = $request->otro;
                    // $ficha_octavo_par->otro1 = $request->otro1;
                    $ficha_octavo_par->estado = 1;

                    if($ficha_octavo_par->save())
                    {
                        $tipo_mensaje = 'success';
                        $mensaje .= 'Ficha Examen Octavo Par registrada con exito\n';
                    }
                    else
                    {
                        $tipo_mensaje = 'danger';
                        $mensaje .= 'Ficha Examen Octavo Par con problema al registrar\n';
                    }

                    if($request->cerrarsession == 0 || $request->cerrarsession =='')
                    {
                        /** redireccion Redirect funciona correcto */
                        // return \Redirect::route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                        return ['success' => true, 'estado' => 1, 'msj' => $mensaje, 'redirect' => route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)];
                    }
                    else if($request->cerrarsession == 1)
                    {
                        //si funciona
                        // $request->session()->invalidate();
                        // $request->session()->regenerateToken();
                        // return \Redirect::route('home.ingreso');
                        return ['success' => true, 'estado' => 1, 'msj' => $mensaje, 'redirect' => route('home.ingreso')];

                    }
                }
            }
            else
            {
                // return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
                return ['success' => false, 'estado' => 0, 'msj' => 'Ficha Clínica con problema al guardar'];
            }

        }
        else
        {
            return ['success' => false, 'estado' => 0, 'msj' => $mensaje];
        }
    }

    public function store_fono_audicion(Request $request){
        /** FICHA ATENCION  */
        $id_profesional = $request->id_profesional_fc;
        $id_paciente = $request->id_paciente_fc;


        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        try {
            //code...
            $procedimiento = ProcedimientosCentro::find($request->id_procedimiento);

            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            //$ficha = FichaAtencion::where('id', $request->id_fc)->first();

            if($ficha){
                // ACUMULAR diagnósticos separados por comas
                if(empty($ficha->dg_ingreso)) {
                    $ficha->dg_ingreso = $procedimiento->nombre;
                } else {
                    // Solo agregar si no existe ya en la lista
                    $diagnosticos_existentes = explode(',', $ficha->dg_ingreso);
                    $diagnosticos_existentes = array_map('trim', $diagnosticos_existentes);
                    if(!in_array($procedimiento->nombre, $diagnosticos_existentes)) {
                        $ficha->dg_ingreso = $ficha->dg_ingreso . ', ' . $procedimiento->nombre;
                    }
                }

                // ACUMULAR hipótesis separadas por comas
                if(empty($ficha->hipotesis)) {
                    $ficha->hipotesis = $request->concluciones_examen;
                } else {
                    // Solo agregar si no está vacía la nueva conclusión
                    if(!empty(trim($request->concluciones_examen))) {
                        $ficha->hipotesis = $ficha->hipotesis . ', ' . $request->concluciones_examen;
                    }
                }

                $ficha->id_paciente = $id_paciente;
                $ficha->id_profesional = $id_profesional;
                $ficha->finalizada = 1;
            }

             $registro_archivo = array();

            $paciente = Paciente::find($request->id_paciente_fc);

            $paciente->edad = Carbon::parse($paciente->fecha_nac)->age;

            if(!empty($request->input_lista_archivo))
            {

                // Decodificar JSON con parámetro true para obtener array asociativo
                $array_archivo = json_decode($request->input_lista_archivo, true);

                $resulto_archivo = array();
                $archivo_correo = array();

                foreach ($array_archivo as $key => $archivo_info)
                {
                    // Manejar la nueva estructura de datos del JavaScript
                    if (is_array($archivo_info)) {
                        // Verificar si es array con claves nombradas o array con índices numéricos
                        if (isset($archivo_info['url']) || isset($archivo_info['nombre_original'])) {
                            // Estructura nueva (objeto con propiedades)
                            $ruta_temp = $archivo_info['url'] ?? '';
                            $nombre_real = $archivo_info['nombre_original'] ?? '';
                            $nombre_temp = $archivo_info['nombre_archivo'] ?? '';
                            $file_extension = $archivo_info['file_extension'] ?? '';
                            $tipo_dropzone = $archivo_info['tipo_dropzone'] ?? 'general'; // Nuevo campo
                        } else {
                            // Estructura legacy (array con índices numéricos) - por compatibilidad
                            $ruta_temp = $archivo_info[0] ?? '';
                            $nombre_real = $archivo_info[1] ?? '';
                            $nombre_temp = $archivo_info[2] ?? '';
                            $file_extension = $archivo_info[3] ?? '';
                            $tipo_dropzone = 'general'; // Por defecto para estructura legacy
                        }
                    } else {
                        // Caso donde no es array (no debería pasar, pero por seguridad)
                        Log::error('Estructura de archivo no reconocida', [
                            'key' => $key,
                            'archivo_info' => $archivo_info,
                            'tipo' => gettype($archivo_info)
                        ]);
                        continue;
                    }

                    // Validar que tenemos los datos necesarios
                    if (empty($nombre_temp) || empty($file_extension)) {
                        Log::warning('Archivo incompleto, saltando', [
                            'key' => $key,
                            'nombre_temp' => $nombre_temp,
                            'file_extension' => $file_extension
                        ]);
                        continue;
                    }

                    // Buscar archivo en disco temporal - primero intentar nombre exacto
                    $existe_exacto = Storage::disk('archivo_temp')->exists($nombre_temp);
                    $archivo_a_mover = $nombre_temp;

                    if (!$existe_exacto) {
                        Log::warning('Archivo exacto no encontrado, buscando similares', [
                            'nombre_buscado' => $nombre_temp,
                            'nombre_original' => $nombre_real
                        ]);

                        // Buscar archivos similares por nombre original y extensión
                        try {
                            $archivos_temp = Storage::disk('archivo_temp')->files();
                            $archivos_similares = [];

                            // Buscar archivos con la misma extensión y nombre original similar
                            foreach ($archivos_temp as $archivo) {
                                $nombre_archivo = basename($archivo);

                                // Verificar si contiene el nombre original y tiene la misma extensión
                                if (pathinfo($archivo, PATHINFO_EXTENSION) === $file_extension) {
                                    // Primero: búsqueda exacta por nombre original
                                    $nombre_original_limpio = str_replace([' ', '.', '-', '_'], ['_', '_', '_', '_'], pathinfo($nombre_real, PATHINFO_FILENAME));
                                    if (strpos($nombre_archivo, $nombre_original_limpio) !== false) {
                                        $archivos_similares[] = $archivo;
                                    }
                                    // Segundo: búsqueda más flexible - solo archivos .pdf recientes
                                    elseif ($file_extension === 'pdf') {
                                        // Buscar archivos PDF que empiecen con timestamp del día actual
                                        $timestamp_hoy = date('Y');  // Al menos del año actual
                                        if (strpos($nombre_archivo, $timestamp_hoy) !== false ||
                                            preg_match('/^\d{10,}_[a-f0-9]+\.pdf$/', $nombre_archivo)) {
                                            $archivos_similares[] = $archivo;
                                        }
                                    }
                                }
                            }

                            if (count($archivos_similares) > 0) {
                                // Tomar el más reciente (último en la lista)
                                $archivo_a_mover = end($archivos_similares);
                                Log::info('Usando archivo similar encontrado', [
                                    'archivo_original' => $nombre_temp,
                                    'archivo_encontrado' => $archivo_a_mover,
                                    'total_candidatos' => count($archivos_similares)
                                ]);
                            } else {
                                // Último recurso: buscar el archivo PDF más reciente si no encontramos nada
                                if ($file_extension === 'pdf') {
                                    $archivos_pdf = array_filter($archivos_temp, function($archivo) {
                                        return pathinfo($archivo, PATHINFO_EXTENSION) === 'pdf';
                                    });

                                    if (count($archivos_pdf) > 0) {
                                        // Ordenar por tiempo de modificación (más reciente primero)
                                        usort($archivos_pdf, function($a, $b) {
                                            return Storage::disk('archivo_temp')->lastModified($b) - Storage::disk('archivo_temp')->lastModified($a);
                                        });

                                        $archivo_a_mover = $archivos_pdf[0]; // El más reciente
                                        Log::warning('Usando archivo PDF más reciente como último recurso', [
                                            'archivo_original' => $nombre_temp,
                                            'archivo_encontrado' => $archivo_a_mover,
                                            'total_pdfs_disponibles' => count($archivos_pdf)
                                        ]);
                                    } else {
                                        Log::error('No se encontraron archivos similares ni PDFs', [
                                            'nombre_buscado' => $nombre_temp,
                                            'nombre_original' => $nombre_real,
                                            'archivos_disponibles' => $archivos_temp
                                        ]);
                                        continue;
                                    }
                                } else {
                                    Log::error('No se encontraron archivos similares', [
                                        'nombre_buscado' => $nombre_temp,
                                        'nombre_original' => $nombre_real,
                                        'archivos_disponibles' => $archivos_temp
                                    ]);
                                    continue;
                                }
                            }
                        } catch (\Exception $e) {
                            Log::error('Error buscando archivos similares', [
                                'error' => $e->getMessage(),
                                'nombre_buscado' => $nombre_temp
                            ]);
                            continue;
                        }
                    }

                    $nombre_final = $paciente->rut.'_examen_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    Log::info('Preparando movimiento de archivo', [
                        'key' => $key,
                        'nombre_temp_original' => $nombre_temp,
                        'archivo_a_mover' => $archivo_a_mover,
                        'nombre_final' => $nombre_final,
                        'extension' => $file_extension,
                        'encontrado_exacto' => $existe_exacto
                    ]);

                    $resultado_mover = CargaArchivoController::moverArchivo($archivo_a_mover, 'archivo_archivo', $nombre_final);
                    $resulto_archivo[$key] = $resultado_mover;

                    // Log detallado del resultado del movimiento
                    Log::info('Resultado detallado del movimiento', [
                        'key' => $key,
                        'resultado_completo' => $resultado_mover,
                        'estado_exacto' => $resultado_mover['estado'] ?? 'no definido',
                        'estado_tipo' => gettype($resultado_mover['estado'] ?? null),
                        'estado_igual_1' => ($resultado_mover['estado'] ?? null) == 1,
                        'estado_identico_1' => ($resultado_mover['estado'] ?? null) === 1
                    ]);

                    // Verificar si el movimiento fue exitoso
                    if ($resultado_mover['estado'] == 1) {
                        $url = $resultado_mover['proceso']['url'];
                        $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                        $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                        Log::info('Archivo movido exitosamente', [
                            'key' => $key,
                            'url' => $url,
                            'nombre_final' => $nombre_final
                        ]);

                        array_push($registro_archivo, array(
                            'nombre' => $nombre_final,
                            'url' => $url,
                            'tipo_dropzone' => $tipo_dropzone,
                            'nombre_original' => $nombre_real
                        ));

                        Log::info('Archivo agregado al registro_archivo', [
                            'key' => $key,
                            'elemento_agregado' => ['nombre' => $nombre_final, 'url' => $url],
                            'total_elementos_ahora' => count($registro_archivo)
                        ]);
                    } else {
                        Log::error('Error al mover archivo', [
                            'key' => $key,
                            'resultado' => $resultado_mover,
                            'nombre_temp_original' => $nombre_temp,
                            'archivo_intentado_mover' => $archivo_a_mover,
                            'nombre_final' => $nombre_final
                        ]);
                    }
                }

                // Log antes de json_encode para ver el estado del array
                Log::info('Estado del array antes de json_encode', [
                    'registro_archivo_array' => $registro_archivo,
                    'count_registro_archivo' => count($registro_archivo),
                    'resulto_archivo' => $resulto_archivo,
                    'count_resulto_archivo' => count($resulto_archivo ?? [])
                ]);

                $registro_archivo = json_encode($registro_archivo);

                // Log final para debugging
                Log::info('Estado final del registro de archivos', [
                    'registro_archivo_json' => $registro_archivo,
                    'cantidad_archivos_procesados' => count(json_decode($registro_archivo, true) ?? []),
                    'archivo_correo_count' => count($archivo_correo ?? [])
                ]);
            }


            // Log del estado antes de guardar en la ficha
            Log::info('Preparando guardar en ficha', [
                'registro_archivo_vacio' => empty($registro_archivo),
                'registro_archivo_contenido' => $registro_archivo,
                'estado_archivo_a_asignar' => !empty($registro_archivo) ? 1 : 0
            ]);

            // ACUMULAR archivos existentes con los nuevos
            $archivos_finales = [];

            // Obtener archivos existentes si los hay
            if(!empty($ficha->archivo)) {
                $archivos_existentes = json_decode($ficha->archivo, true);
                if(is_array($archivos_existentes)) {
                    $archivos_finales = $archivos_existentes;
                    Log::info('Archivos existentes encontrados', [
                        'cantidad_existentes' => count($archivos_existentes)
                    ]);
                }
            }

            // Agregar nuevos archivos si los hay
            if(!empty($registro_archivo)) {
                $nuevos_archivos = json_decode($registro_archivo, true);
                if(is_array($nuevos_archivos)) {
                    $archivos_finales = array_merge($archivos_finales, $nuevos_archivos);
                    Log::info('Archivos nuevos agregados', [
                        'cantidad_nuevos' => count($nuevos_archivos),
                        'cantidad_total' => count($archivos_finales)
                    ]);
                }
            }

            // Actualizar estado y contenido de archivos
            if(!empty($archivos_finales)) {
                $ficha->estado_archivo = 1;
                $ficha->archivo = json_encode($archivos_finales);
            } else {
                // Solo cambiar a 0 si no había archivos previos
                if(empty($ficha->archivo)) {
                    $ficha->estado_archivo = 0;
                    $ficha->archivo = json_encode([]); // Array vacío como JSON
                }
            }

            if ($ficha->save())
            {
				//  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                $mensaje = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                $mensaje .= 'Ficha Clínica  guardada de forma correcta\n';

                /** REGISTRO FICHA  AUDICIÓN */
                {
                    $ficha_audicion = new ExamenAudicion();
                    $ficha_audicion->id_ficha = $ficha->id;
                    $ficha_audicion->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_audicion->id_profesional = $request->id_profesional_fc;
                    $ficha_audicion->id_paciente = $request->id_paciente_fc;
                    $ficha_audicion->archivo = $registro_archivo;

                    if($ficha_audicion->save())
                    {
                        $tipo_mensaje = 'success';
                        $mensaje .= 'Ficha Examen Audición registrada con exito\n';

                        /** REGISTRO EN EXAMEN ESPECIALIDAD */
                        $examen_esp = new ExamenEspecialidad();
                        $examen_esp->id_ficha_atencion   = $hora_medica->id_ficha_atencion ?? null;
                        $examen_esp->id_ficha_otros_prof = $ficha->id;
                        $examen_esp->id_paciente         = $request->id_paciente_fc;
                        $examen_esp->id_profesional      = $request->id_profesional_fc;
                        $examen_esp->nombre              = 'Examen Audición';
                        $examen_esp->cuerpo              = json_encode([
                            'examenes'    => $request->examenes,
                            'archivos'    => $archivos_finales,  // array PHP, no double-encoded
                            'hora_medica' => $request->hora_medica,
                        ]);
                        $examen_esp->estado              = 1;
                        $examen_esp->save();
                    }
                    else
                    {
                        $tipo_mensaje = 'danger';
                        $mensaje .= 'Ficha Examen Audición con problema al registrar\n';
                    }

                    if($request->cerrarsession == 0 || $request->cerrarsession =='')
                    {
                        /** redireccion Redirect funciona correcto */
                        // return \Redirect::route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                        return ['success' => true, 'estado' => 1, 'msj' => $mensaje, 'redirect' => route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)];
                    }
                    else if($request->cerrarsession == 1)
                    {
                        //si funciona
                        // $request->session()->invalidate();
                        // $request->session()->regenerateToken();
                        // return \Redirect::route('home.ingreso');
                        return ['success' => true, 'estado' => 1, 'msj' => $mensaje, 'redirect' => route('home.ingreso')];

                    }
                }
            }
            else
            {
                // return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
                return ['success' => false, 'estado' => 0, 'msj' => 'Ficha Clínica con problema al guardar'];
            }

        } catch (\Exception $e) {
            //throw $th;
            return ['error' => $e->getMessage()];
        }
    }

    public function store_fono_lab_general(Request $request)
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
        if( !empty($request->solicitado_id_profesional_oct_par) || !empty($request->derivado_por_rut) )
        {

            if( empty($request->solicitado_id_profesional_oct_par) && !empty($request->derivado_por_rut) )
            {

                if(empty($request->solicitado_nombre_oct_par))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido NOMBRE del Solicitante.\n';
                }
                if(empty($request->solicitado_apellido_oct_par))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido APELLIDO del Solicitante.\n';
                }
                if(empty($request->solicitado_telefono_oct_par) || empty($request->solicitado_email_oct_par))
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
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();

            // ACUMULAR diagnósticos separados por comas
            if(empty($ficha->dg_ingreso)) {
                $ficha->dg_ingreso = $procedimiento->nombre;
            } else {
                // Solo agregar si no existe ya en la lista
                $diagnosticos_existentes = explode(',', $ficha->dg_ingreso);
                $diagnosticos_existentes = array_map('trim', $diagnosticos_existentes);
                if(!in_array($procedimiento->nombre, $diagnosticos_existentes)) {
                    $ficha->dg_ingreso = $ficha->dg_ingreso . ', ' . $procedimiento->nombre;
                }
            }

            // ACUMULAR hipótesis separadas por comas
            if(empty($ficha->hipotesis)) {
                $ficha->hipotesis = 'Realizado';
            } else {
                // Solo agregar si no contiene ya "Realizado"
                if(strpos($ficha->hipotesis, 'Realizado') === false) {
                    $ficha->hipotesis = $ficha->hipotesis . ', Realizado';
                }
            }

            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;

            if( !empty($request->solicitado_id_profesional_oct_par) || !empty($request->derivado_por_rut) )
            {
                if( empty($request->solicitado_id_profesional_oct_par) && !empty($request->derivado_por_rut) )
                {
                    $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_oct_par, $request->solicitado_apellido_oct_par, '', '', $request->derivado_por_rut, $request->solicitado_email_oct_par, $request->solicitado_telefono_oct_par, '', '', '', '', '', '', '', '', '', 1);
                    $ficha->der_por = $profesional_provisorio['last_id'];
                }
                else if( !empty($request->solicitado_id_profesional_oct_par) )
                {
                    $ficha->der_por = $request->solicitado_id_profesional_oct_par;
                }
            }

            // ACUMULAR observaciones generales separadas por comas
            if(empty($ficha->otro)) {
                $ficha->otro = $request->obs_general;
            } else {
                // Solo agregar si no está vacía la nueva observación
                if(!empty(trim($request->obs_general))) {
                    $ficha->otro = $ficha->otro . ', ' . $request->obs_general;
                }
            }

            // ACUMULAR antecedentes de especialidad separados por comas
            if(empty($ficha->otro1)) {
                $ficha->otro1 = $request->ant_especialidad;
            } else {
                // Solo agregar si no está vacío el nuevo antecedente
                if(!empty(trim($request->ant_especialidad))) {
                    $ficha->otro1 = $ficha->otro1 . ', ' . $request->ant_especialidad;
                }
            }

            $ficha->finalizada = 1;


            $registro_archivo = array();
            if(!empty($request->listado_archivos))
            {
                $paciente = Paciente::find($request->id_paciente_fc);

                // Decodificar JSON con parámetro true para obtener array asociativo
                $array_archivo = json_decode($request->listado_archivos, true);

                $resulto_archivo = array();
                $archivo_correo = array();

                foreach ($array_archivo as $key => $archivo_info)
                {
                    // Manejar la nueva estructura de datos del JavaScript
                    if (is_array($archivo_info)) {
                        // Verificar si es array con claves nombradas o array con índices numéricos
                        if (isset($archivo_info['url']) || isset($archivo_info['nombre_original'])) {
                            // Estructura nueva (objeto con propiedades)
                            $ruta_temp = $archivo_info['url'] ?? '';
                            $nombre_real = $archivo_info['nombre_original'] ?? '';
                            $nombre_temp = $archivo_info['nombre_archivo'] ?? '';
                            $file_extension = $archivo_info['file_extension'] ?? '';
                            $tipo_dropzone = $archivo_info['tipo_dropzone'] ?? 'general'; // Nuevo campo
                        } else {
                            // Estructura legacy (array con índices numéricos) - por compatibilidad
                            $ruta_temp = $archivo_info[0] ?? '';
                            $nombre_real = $archivo_info[1] ?? '';
                            $nombre_temp = $archivo_info[2] ?? '';
                            $file_extension = $archivo_info[3] ?? '';
                            $tipo_dropzone = 'general'; // Por defecto para estructura legacy
                        }
                    } else {
                        // Caso donde no es array (no debería pasar, pero por seguridad)
                        \Log::error('Estructura de archivo no reconocida en store_fono_lab_general', [
                            'key' => $key,
                            'archivo_info' => $archivo_info,
                            'tipo' => gettype($archivo_info)
                        ]);
                        continue;
                    }

                    // Validar que tenemos los datos necesarios
                    if (empty($nombre_temp) || empty($file_extension)) {
                        \Log::warning('Archivo incompleto, saltando en store_fono_lab_general', [
                            'key' => $key,
                            'nombre_temp' => $nombre_temp,
                            'file_extension' => $file_extension
                        ]);
                        continue;
                    }

                    $nombre_final = $paciente->rut.'_examen_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    \Log::info('Procesando archivo en store_fono_lab_general', [
                        'key' => $key,
                        'nombre_temp' => $nombre_temp,
                        'nombre_final' => $nombre_final,
                        'tipo_dropzone' => $tipo_dropzone,
                        'extension' => $file_extension
                    ]);

                    $resultado_mover = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
                    $resulto_archivo[$key] = $resultado_mover;

                    // Verificar si el movimiento fue exitoso
                    if ($resultado_mover['estado'] == 1) {
                        $url = $resultado_mover['proceso']['url'];
                        $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                        $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                        \Log::info('Archivo movido exitosamente en store_fono_lab_general', [
                            'key' => $key,
                            'url' => $url,
                            'nombre_final' => $nombre_final
                        ]);

                        array_push($registro_archivo, array(
                            'nombre' => $nombre_final,
                            'url' => $url,
                            'tipo_dropzone' => $tipo_dropzone,
                            'nombre_original' => $nombre_real
                        ));
                    } else {
                        \Log::error('Error al mover archivo en store_fono_lab_general', [
                            'key' => $key,
                            'resultado' => $resultado_mover,
                            'nombre_temp' => $nombre_temp,
                            'nombre_final' => $nombre_final
                        ]);
                    }
                }

                $registro_archivo = json_encode($registro_archivo);
            }

            // ACUMULAR archivos existentes con los nuevos
            $archivos_finales = [];

            // Obtener archivos existentes si los hay
            if(!empty($ficha->archivo)) {
                $archivos_existentes = json_decode($ficha->archivo, true);
                if(is_array($archivos_existentes)) {
                    $archivos_finales = $archivos_existentes;
                    \Log::info('Archivos existentes encontrados en lab general', [
                        'cantidad_existentes' => count($archivos_existentes)
                    ]);
                }
            }

            // Agregar nuevos archivos si los hay
            if(!empty($registro_archivo)) {
                $nuevos_archivos = json_decode($registro_archivo, true);
                if(is_array($nuevos_archivos)) {
                    $archivos_finales = array_merge($archivos_finales, $nuevos_archivos);
                    \Log::info('Archivos nuevos agregados en lab general', [
                        'cantidad_nuevos' => count($nuevos_archivos),
                        'cantidad_total' => count($archivos_finales)
                    ]);
                }
            }

            // Actualizar estado y contenido de archivos
            if(!empty($archivos_finales)) {
                $ficha->estado_archivo = 1;
                $ficha->archivo = json_encode($archivos_finales);
            } else {
                // Solo cambiar a 0 si no había archivos previos
                if(empty($ficha->archivo)) {
                    $ficha->estado_archivo = 0;
                    $ficha->archivo = json_encode([]); // Array vacío como JSON
                }
            }


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

    public function get_fono_valoracion_equilibrio(Request $request)
    {
        $query = FonoValoracionEquilibrio::where('id_paciente', $request->id_paciente)
                    ->where('estado', 1);

        if ($request->filled('id_hora_medica')) {
            $query->where('id_hora_medica', $request->id_hora_medica);
        }

        $registros = $query->orderBy('created_at', 'desc')->get()->map(function ($item) {
            $item->datos_parsed = json_decode($item->datos, true) ?? [];
            return $item;
        });

        return response()->json([
            'success'   => true,
            'registros' => $registros,
            'total'     => $registros->count(),
        ]);
    }

    public function store_fono_valoracion_equilibrio(Request $request)
    {

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        if (!$hora_medica) {
            return response()->json(['success' => false, 'mensaje' => 'Hora médica no encontrada']);
        }

        FonoValoracionEquilibrio::updateOrCreate(
            ['id_hora_medica' => $hora_medica->id],
            [
                'id_ficha_otros_prof' => $hora_medica->id_ficha_otros_prof ?? null,
                'id_profesional'      => $request->id_profesional_fc,
                'id_paciente'         => $request->id_paciente_fc,
                'datos'               => $request->datos,
            ]
        );

        return response()->json(['success' => true, 'mensaje' => 'Valoración guardada correctamente']);
    }

    public function generar_pdf_valoracion_equilibrio(Request $request)
    {
        try {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $paciente    = Paciente::find($request->id_paciente_fc);
            $profesional = Profesional::find($request->id_profesional_fc);

            $edad = '';
            if ($paciente && $paciente->fecha_nac) {
                $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->age . ' años';
            }

            $datos = json_decode($request->datos, true) ?? [];

            // Mapas de leyenda IMD
            $leyendasIMD = [
                '0' => 'No puede caminar sin ayuda, desviaciones severas de la marcha o equilibrio',
                '1' => 'Velocidad lenta, patrón de marcha anormal, evidencia de desequilibrio',
                '2' => 'Utiliza dispositivos de asistencia, velocidad lenta, desviaciones leves',
                '3' => 'Camina sin dispositivos de asistencia, buena velocidad, patrón normal',
            ];

            $data = [
                'paciente'     => $paciente,
                'profesional'  => $profesional,
                'hora_medica'  => $hora_medica,
                'edad'         => $edad,
                'fecha'        => now()->format('d/m/Y'),
                'datos'        => $datos,
                'leyendasIMD'  => $leyendasIMD,
            ];

            $pdf = Pdf::loadView('PDF.pdf_valoracion_equilibrio', $data);
            $pdf->setPaper('A4', 'portrait');

            $reportesPath = public_path('reportes');
            if (!file_exists($reportesPath)) {
                mkdir($reportesPath, 0777, true);
            }

            $rut = $paciente ? str_replace(['.', '-'], '', $paciente->rut) : 'paciente';
            $filename = 'valoracion_equilibrio_' . $rut . '_' . date('YmdHis') . '.pdf';
            file_put_contents($reportesPath . '/' . $filename, $pdf->output());

            return response()->json([
                'success'  => true,
                'ruta'     => asset('reportes/' . $filename),
                'filename' => $filename,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al generar el PDF: ' . $e->getMessage()], 500);
        }
    }

    public function generar_pdf_informe_rehab_vestibular(Request $request)
    {
        try {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $paciente    = Paciente::find($request->id_paciente_fc);
            $profesional = Profesional::find($request->id_profesional_fc);

            $edad = '';
            if ($paciente && $paciente->fecha_nac) {
                $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->age . ' años';
            }

            $datos = json_decode($request->datos, true) ?? [];

            $data = [
                'paciente'    => $paciente,
                'profesional' => $profesional,
                'hora_medica' => $hora_medica,
                'edad'        => $edad,
                'fecha'       => now()->format('d/m/Y'),
                'datos'       => $datos,
            ];

            $pdf = Pdf::loadView('PDF.pdf_informe_rehab_vestibular', $data);
            $pdf->setPaper('A4', 'portrait');

            $reportesPath = public_path('reportes');
            if (!file_exists($reportesPath)) {
                mkdir($reportesPath, 0777, true);
            }

            $rut      = $paciente ? str_replace(['.', '-'], '', $paciente->rut) : 'paciente';
            $filename = 'informe_rehab_vestibular_' . $rut . '_' . date('YmdHis') . '.pdf';
            file_put_contents($reportesPath . '/' . $filename, $pdf->output());

            return response()->json([
                'success'  => true,
                'ruta'     => asset('reportes/' . $filename),
                'filename' => $filename,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al generar el PDF: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Guardar ficha de ecotomografía (laboratorio)
     * POST: Ficha_Atencion/crear/laboratorio/ecotomografia
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|array
     */
    public function store_lab_eco(Request $request)
    {

        $campos_requeridos = 1;
        $tipo_mensaje = 'success';
        $mensaje = '';

        // Validar campos requeridos
        if (empty(trim($request->informe_radio ?? ''))) {
            $campos_requeridos = 0;
            $mensaje = 'El informe radiológico es requerido.\n Su Ficha Clínica NO ha sido Guardada aún.';
        }

        if ($campos_requeridos) {
            try {
                // Obtener datos básicos
                $id_profesional = $request->id_profesional_fc;
                $id_paciente = $request->id_paciente_fc;
                $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

                if (!$hora_medica) {
                    return [
                        'success' => false,
                        'estado' => 0,
                        'msj' => 'No se encontró la hora médica registrada.'
                    ];
                }

                // Obtener ficha de otros profesionales
                $ficha = FichaGinecoObstetrica::where('id', $hora_medica->id_ficha_otros_prof)->first();

                if (!$ficha) {
                    return [
                        'success' => false,
                        'estado' => 0,
                        'msj' => 'No se encontró la ficha de atención.'
                    ];
                }

                // Actualizar ficha con datos de ecotomografía
                // $ficha->dg_ingreso = $request->dg_ingreso ?? 'Ecotomografía';
                $ficha->hipotesis_diagnostico = 'Realizado';
                $ficha->diagnostico_html = $request->informe_radio ?? '';
                $ficha->id_paciente = $id_paciente;
                $ficha->id_profesional = $id_profesional;
                // $ficha->finalizada = 1;

                // Procesar archivos cargados
                $registro_archivo = [];
                $paciente = Paciente::find($id_paciente);

                if (!empty($request->input_lista_archivo)) {
                    $array_archivo = json_decode($request->input_lista_archivo, true);

                    foreach ($array_archivo as $key => $archivo_info) {
                        if (!is_array($archivo_info)) {
                            Log::warning('Estructura de archivo no reconocida en store_lab_eco', [
                                'key' => $key,
                                'tipo' => gettype($archivo_info)
                            ]);
                            continue;
                        }

                        // Manejar estructura de datos del JavaScript
                        if (isset($archivo_info['url']) || isset($archivo_info['nombre_original'])) {
                            $nombre_temp = $archivo_info['nombre_archivo'] ?? '';
                            $file_extension = $archivo_info['file_extension'] ?? '';
                            $nombre_real = $archivo_info['nombre_original'] ?? '';
                        } else {
                            // Estructura legacy
                            $nombre_temp = $archivo_info[2] ?? '';
                            $file_extension = $archivo_info[3] ?? '';
                            $nombre_real = $archivo_info[1] ?? '';
                        }

                        if (empty($nombre_temp) || empty($file_extension)) {
                            continue;
                        }

                        // Generar nombre final
                        $nombre_final = $paciente->rut . '_eco_' . date('YmdHis') . '_' . uniqid() . '.' . $file_extension;

                        // Mover archivo
                        $resultado_mover = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        if ($resultado_mover['estado'] == 1) {
                            $url = $resultado_mover['proceso']['url'];

                            array_push($registro_archivo, [
                                'nombre' => $nombre_final,
                                'url' => $url,
                                'tipo_dropzone' => $archivo_info['tipo_dropzone'] ?? 'general',
                                'nombre_original' => $nombre_real
                            ]);

                            Log::info('Archivo ecotomografía guardado exitosamente', [
                                'nombre_final' => $nombre_final,
                                'url' => $url
                            ]);
                        } else {
                            Log::error('Error al mover archivo en ecotomografía', [
                                'nombre_temp' => $nombre_temp,
                                'resultado' => $resultado_mover
                            ]);
                        }
                    }
                }

                // Guardar archivos en ficha
                if (!empty($registro_archivo)) {
                    $ficha->estado_archivo = 1;
                    $ficha->archivo = json_encode($registro_archivo);
                } else {
                    $ficha->estado_archivo = 0;
                    $ficha->archivo = json_encode([]);
                }

                $ficha->estado = 6; // Estado 6 para finalizada

                // Guardar ficha
                if (!$ficha->save()) {
                    return [
                        'success' => false,
                        'estado' => 0,
                        'msj' => 'Error al guardar la ficha de ecotomografía'
                    ];
                }

                $mensaje = 'Ficha de ecotomografía guardada correctamente.\n';

                // Finalizar hora médica
                $hora_medica->id_estado = 6;
                if ($hora_medica->save()) {
                    $mensaje .= 'Hora médica finalizada.\n';
                } else {
                    $mensaje .= 'Advertencia: No se pudo finalizar la hora médica.\n';
                }

                // Registrar examen de especialidad (gineco-obstetricia, sub_tipo 27)
                $examen_esp = new ExamenEspecialidad();
                $examen_esp->id_ficha_atencion      = $hora_medica->id_ficha_atencion ?? null;
                $examen_esp->id_ficha_especialidad  = $ficha->id;
                $examen_esp->id_tipo = 1; // Tipo 1 para gineco-obstetricia
                $examen_esp->id_template = 9; // Template 9 para ecotomografía
                $examen_esp->id_examen_tipo = 8; // Examen tipo 8 para ecotomografía
                $examen_esp->id_sub_tipo_especialidad = 27;
                $examen_esp->id_paciente            = $id_paciente;
                $examen_esp->id_profesional         = $id_profesional;
                $examen_esp->nombre                 = 'Ecotomografía';
                $examen_esp->cuerpo                 = json_encode([
                    'informe'    => $request->informe_radio ?? '',
                    'dg_ingreso' => $request->dg_ingreso ?? '',
                    'hora_medica'=> $request->hora_medica,
                ]);
                $examen_esp->revisado               = 0;
                $examen_esp->estado                 = 1;
                $examen_esp->save();

                // Redireccionamiento (respuesta JSON para AJAX)
                if ($request->cerrarsession == 0 || $request->cerrarsession == '') {
                    return ['success' => true, 'estado' => 1, 'msj' => $mensaje, 'redirect' => route('profesional.mi_agenda', 'lugares_atencion='.$request->id_lugar_atencion)];
                } else if ($request->cerrarsession == 1) {
                    return ['success' => true, 'estado' => 1, 'msj' => $mensaje, 'redirect' => route('home.ingreso')];
                }

            } catch (\Exception $e) {
                Log::error('Error en store_lab_eco', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);

                return [
                    'success' => false,
                    'estado' => 0,
                    'msj' => 'Error al procesar la ficha: ' . $e->getMessage()
                ];
            }
        } else {
            return [
                'success' => false,
                'estado' => 0,
                'msj' => $mensaje
            ];
        }
    }

    public function generarPdfEcotomografia(Request $request)
    {
        if (empty($request->id_ficha)) {
            return response()->json(['estado' => 0, 'msj' => 'ID de ficha requerido']);
        }

        try {
            // Obtener ficha gineco obstetrica
            $ficha = FichaGinecoObstetrica::find($request->id_ficha);

            if (!$ficha) {
                return response()->json(['estado' => 0, 'msj' => 'Ficha no encontrada']);
            }

            $paciente    = Paciente::find($ficha->id_paciente);
            $profesional = Profesional::find($ficha->id_profesional);

            if (!$paciente || !$profesional) {
                return response()->json(['estado' => 0, 'msj' => 'Paciente o profesional no encontrado']);
            }

            // Buscar HoraMedica para obtener id_ficha_atencion (es obligatoria para validar firma)
            $hora_medica = HoraMedica::where('id_ficha_otros_prof', $ficha->id)->first();

            if (!$hora_medica) {
                Log::warning('No se encontró HoraMedica para ficha gineco', [
                    'id_ficha_gineco' => $ficha->id,
                    'id_paciente' => $ficha->id_paciente,
                    'id_profesional' => $ficha->id_profesional
                ]);
                return response()->json(['estado' => 0, 'msj' => 'No se encontró la hora médica asociada a la ficha']);
            }

            // El documento certificado ES la ficha gineco — siempre usar su propio ID.
            // id_ficha_atencion pertenece al médico general, no al ginecólogo, por eso no se usa.
            $doc_id = $ficha->id;

            $lugar_atencion = \App\Models\LugarAtencion::find($hora_medica->id_lugar_atencion);

            Log::info('Generando PDF ecotomografía', [
                'id_ficha_gineco' => $ficha->id,
                'id_hora_medica' => $hora_medica->id,
                'doc_id' => $doc_id,
                'id_profesional' => $profesional->id
            ]);

            // Generar certificados QR — tipo 4 para documento, tipo 1 para profesional, sub_tipo 26 para ecotomografía
            $temp_token = CertificadoController::certificadoDocumento($doc_id, $profesional->id, $paciente->id, 4);

            if ($temp_token['estado'] != 1) {
                return response()->json(['estado' => 0, 'msj' => 'No se pudo generar el certificado QR del documento']);
            }
            $token_receta  = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);

            $qr_documento  = GeneradorQrController::generar($url_documento);

            $temp_token2 = CertificadoController::certificadoProfesional($profesional->id, 1, 4, $doc_id);

            if ($temp_token2['estado'] != 1) {
                return response()->json(['estado' => 0, 'msj' => 'No se pudo generar el certificado QR del profesional']);
            }
            $token_profesional = $temp_token2['certificado'];
            $url_profesional   = CertificadoController::generarUrlProfesional($token_profesional);

            $qr_profesional    = GeneradorQrController::generar($url_profesional);

            $array_ficha_atencion = [
                'id'         => $ficha->id,
                'created_at' => \Carbon\Carbon::parse($ficha->created_at)->format('d/m/Y'),
                'token'      => $token_receta,
                'url'        => $url_documento,
                'qr'         => $qr_documento,
            ];

            $array_lugar_atencion = [
                'id'     => $lugar_atencion ? $lugar_atencion->id : '',
                'nombre' => $lugar_atencion ? $lugar_atencion->nombre : '',
            ];

            $array_profesional = [
                'id'          => $profesional->id,
                'nombre'      => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                'rut'         => $profesional->rut,
                'especialidad'=> optional($profesional->SubTipoEspecialidad()->first())->nombre,
                'token'       => $token_profesional,
                'url'         => $url_profesional,
                'qr'          => $qr_profesional,
            ];

            $direccion_pac = $paciente->Direccion()->first();
            $array_paciente = [
                'id'        => $paciente->id,
                'nombre'    => $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut'       => $paciente->rut,
                'sexo'      => $paciente->sexo,
                'direccion' => $direccion_pac
                    ? $direccion_pac->direccion . ' ' . $direccion_pac->numero_dir . ', ' . optional($direccion_pac->Ciudad()->first())->nombre
                    : 'No informada',
            ];

            $fichaEco = [
                'id'      => $ficha->id,
                'informe' => !empty($request->informe_texto)
                    ? $request->informe_texto
                    : ($ficha->diagnostico_html ?? $ficha->hipotesis_diagnostico ?? ''),
            ];

            $cuerpo = [
                'array_ficha_atencion' => $array_ficha_atencion,
                'array_lugar_atencion' => $array_lugar_atencion,
                'array_profesional'    => $array_profesional,
                'array_paciente'       => $array_paciente,
                'fichaEco'             => $fichaEco,
            ];

            $titulo         = 'Informe Ecotomografía';
            $nombre_archivo = 'InformeEco_' . $paciente->rut;

            $resultado = PdfController::generarPDF(
                $titulo,
                compact('fichaEco', 'array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'cuerpo'),
                $nombre_archivo,
                'pdf_informe_eco',
                'G'
            );

            if ($resultado->estado == 1) {
                return response()->json([
                    'estado'  => 1,
                    'msj'     => 'PDF generado correctamente',
                    'pdf_url' => $resultado->pdf_url,
                ]);
            }

            return response()->json(['estado' => 0, 'msj' => 'Error al generar el PDF']);

        } catch (\Exception $e) {
            Log::error('Error en generarPdfEcotomografia', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['estado' => 0, 'msj' => 'Error: ' . $e->getMessage()]);
        }
    }

    /**
     * Enviar PDF de ecotomografía por email al paciente
     * @param Request $request - Contiene id_ficha, informe_texto, enviar_email
     * @return JSON
     */
    public function enviarPdfEcotomografia(Request $request)
    {
        if (empty($request->id_ficha)) {
            return response()->json(['estado' => 0, 'msj' => 'ID de ficha requerido']);
        }

        try {
            // Generar PDF primero
            $pdf_response = $this->generarPdfEcotomografia($request);
            $pdf_data = json_decode($pdf_response->getContent(), true);

            if ($pdf_data['estado'] != 1) {
                return response()->json($pdf_data);
            }

            // Obtener ficha y paciente para enviar email
            $ficha = FichaGinecoObstetrica::find($request->id_ficha);
            if (!$ficha) {
                return response()->json(['estado' => 0, 'msj' => 'Ficha no encontrada']);
            }

            $paciente = Paciente::find($ficha->id_paciente);
            if (!$paciente || !$paciente->email) {
                return response()->json([
                    'estado' => 1,
                    'msj' => 'PDF generado correctamente. (Advertencia: El paciente no tiene email registrado)',
                    'pdf_url' => $pdf_data['pdf_url'],
                    'email_enviado' => false
                ]);
            }

            // Extraer nombre del PDF de la URL
            $pdf_url = $pdf_data['pdf_url'];
            $filename = basename($pdf_url);

            // Intentar encontrar el archivo PDF
            $pdf_path = null;

            // Intento 1: Ruta principal public/storage/pdf/ (donde PdfController guarda los PDFs)
            $pdf_path_primary = public_path('storage' . DIRECTORY_SEPARATOR . 'pdf' . DIRECTORY_SEPARATOR . $filename);
            if (file_exists($pdf_path_primary)) {
                $pdf_path = $pdf_path_primary;
            }

            // Intento 2: Ruta alternativa storage/app/pdf/
            if (!$pdf_path) {
                $pdf_path_secondary = storage_path('app' . DIRECTORY_SEPARATOR . 'pdf' . DIRECTORY_SEPARATOR . $filename);
                if (file_exists($pdf_path_secondary)) {
                    $pdf_path = $pdf_path_secondary;
                }
            }

            // Intento 3: Búsqueda con glob pattern en ambas ubicaciones
            if (!$pdf_path) {
                $rut_limpio = str_replace(['.', '-'], '', $paciente->rut);

                // Buscar en public/storage/pdf/
                $pdf_dir_1 = public_path('storage' . DIRECTORY_SEPARATOR . 'pdf') . DIRECTORY_SEPARATOR;
                $files_1 = glob($pdf_dir_1 . '*' . $rut_limpio . '*.pdf');

                // Buscar en storage/app/pdf/
                $pdf_dir_2 = storage_path('app' . DIRECTORY_SEPARATOR . 'pdf') . DIRECTORY_SEPARATOR;
                $files_2 = glob($pdf_dir_2 . '*' . $rut_limpio . '*.pdf');

                $all_files = array_merge($files_1 ?: [], $files_2 ?: []);

                if (!empty($all_files)) {
                    usort($all_files, function($a, $b) {
                        return filemtime($b) - filemtime($a);
                    });
                    $pdf_path = $all_files[0];
                }
            }

            $email_enviado = false;
            $msj_email = '';

            if ($pdf_path && file_exists($pdf_path)) {
                try {
                    $contenido_email = "Estimado(a) {$paciente->nombres},\n\n";
                    $contenido_email .= "Le enviamos el informe de su ecotomografía realizada.\n\n";
                    $contenido_email .= "Datos del paciente:\n";
                    $contenido_email .= "- Nombres: {$paciente->nombres} {$paciente->apellido_uno} {$paciente->apellido_dos}\n";
                    $contenido_email .= "- RUT: {$paciente->rut}\n";
                    $contenido_email .= "- Fecha: " . date('d/m/Y') . "\n\n";
                    $contenido_email .= "Por favor, revise el PDF adjunto con los detalles del informe.\n\n";
                    $contenido_email .= "Saludos cordiales,\n";
                    $contenido_email .= "Sistema MediChile\n";

                    \Illuminate\Support\Facades\Mail::raw($contenido_email, function($message) use ($paciente, $pdf_path, $filename) {
                        $message->to($paciente->email, $paciente->nombres)
                                ->subject('Informe de Ecotomografía - MediChile')
                                ->from(config('mail.from.address'), config('app.name'))
                                ->attach($pdf_path, [
                                    'as' => 'Informe_Ecotomografia_' . $paciente->rut . '.pdf',
                                    'mime' => 'application/pdf',
                                ]);
                    });

                    $email_enviado = true;
                    $msj_email = ' Email enviado al paciente correctamente.';

                    Log::info('Email de ecotomografía enviado', [
                        'id_paciente' => $paciente->id,
                        'email_destino' => $paciente->email,
                        'pdf_path' => $pdf_path
                    ]);
                } catch (\Exception $mailError) {
                    $msj_email = ' (Advertencia: Error al enviar email: ' . $mailError->getMessage() . ')';
                    Log::error('Error al enviar email de ecotomografía', [
                        'id_paciente' => $paciente->id,
                        'error' => $mailError->getMessage(),
                        'trace' => $mailError->getTraceAsString()
                    ]);
                }
            } else {
                $msj_email = ' (Advertencia: No se pudo ubicar el PDF para adjuntar)';
                Log::warning('No se pudo encontrar el PDF para adjuntar', [
                    'pdf_url_original' => $pdf_url,
                    'filename_extraido' => $filename,
                    'rutas_intentadas' => [
                        'public_storage_pdf' => public_path('storage' . DIRECTORY_SEPARATOR . 'pdf'),
                        'storage_app_pdf' => storage_path('app' . DIRECTORY_SEPARATOR . 'pdf'),
                    ],
                    'archivo_encontrado' => $pdf_path ? 'sí' : 'no',
                    'rut_paciente' => $paciente->rut
                ]);
            }

            return response()->json([
                'estado'  => 1,
                'msj'     => 'PDF generado correctamente.' . $msj_email,
                'pdf_url' => $pdf_url,
                'email_enviado' => $email_enviado,
            ]);

        } catch (\Exception $e) {
            Log::error('Error en enviarPdfEcotomografia', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['estado' => 0, 'msj' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function guardar_pares_craneanos(Request $request)
    {

        $ficha = FichaAtencion::find($request->id_ficha_atencion);

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$ficha) {
            return response()->json(['estado' => 0, 'msj' => 'Ficha de atención no encontrada'], 404);
        }

        $cuerpo = [
            'pc_uno'         => $request->pc_uno,
            'pc_dos'         => $request->pc_dos,
            'pc_tres'        => $request->pc_tres,
            'pc_cuatro'      => $request->pc_cuatro,
            'pc_cinco'       => $request->pc_cinco,
            'pc_seis'        => $request->pc_seis,
            'pc_siete'       => $request->pc_siete,
            'pc_ocho'        => $request->pc_ocho,
            'pc_nueve'       => $request->pc_nueve,
            'pc_diez'        => $request->pc_diez,
            'pc_once'        => $request->pc_once,
            'pc_doce'        => $request->pc_doce,
            'pc_conclusiones' => $request->pc_conclusiones,
        ];

        $examen = ExamenEspecialidad::updateOrCreate(
            [
                'id_ficha_atencion' => $ficha->id,
                'nombre'            => 'Evaluación Pares Craneanos',
            ],
            [
                'id_tipo'                  => '1',
                'id_template'              => '1',
                'id_examen_tipo'           => '1',
                'id_sub_tipo_especialidad' => $profesional->id_sub_tipo_especialidada,
                'id_paciente'              => $ficha->id_paciente,
                'id_profesional'           => $profesional->id,
                'cuerpo'                   => json_encode($cuerpo),
                'estado'                   => 1,
            ]
        );

        if ($examen) {
            $msj = $examen->wasRecentlyCreated ? 'Evaluación guardada correctamente' : 'Evaluación actualizada correctamente';

            // Generar PDF
            $paciente       = Paciente::find($ficha->id_paciente);
            $nombre_archivo = 'ParesCraneanos_' . str_replace(['.', '-'], '', $paciente->rut ?? $ficha->id_paciente) . '_' . date('YmdHis');

            $resultado_pdf = PdfController::generarPDF(
                'Evaluación Pares Craneanos',
                [
                    'paciente'    => $paciente,
                    'profesional' => $profesional,
                    'datos'       => $cuerpo,
                    'fecha'       => now()->format('d/m/Y'),
                ],
                $nombre_archivo,
                'pdf_pares_craneanos',
                'G'
            );

            $pdf_url = (is_object($resultado_pdf) && ($resultado_pdf->estado ?? 0) == 1)
                ? $resultado_pdf->pdf_url
                : null;

            return response()->json([
                'estado'  => 1,
                'msj'     => $msj,
                'id'      => $examen->id,
                'pdf_url' => $pdf_url,
            ]);
        }

        return response()->json(['estado' => 0, 'msj' => 'Error al guardar la evaluación'], 500);
    }

    public function guardar_reflejos(Request $request)
    {
        $ficha = FichaAtencion::find($request->id_ficha_atencion);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$ficha) {
            return response()->json(['estado' => 0, 'msj' => 'Ficha de atención no encontrada'], 404);
        }

        $cuerpo = [
            'ref_bicip'    => $request->ref_bicip,
            'ref_tricip'   => $request->ref_tricip,
            'ref_est_rad'  => $request->ref_est_rad,
            'ref_rot'      => $request->ref_rot,
            'ref_aquil'    => $request->ref_aquil,
            'ref_cut'      => $request->ref_cut,
            'ref_cut_abd'  => $request->ref_cut_abd,
            'ref_cremast'  => $request->ref_cremast,
            'ref_plant'    => $request->ref_plant,
            'ref_pat'      => $request->ref_pat,
            'ref_concl'    => $request->ref_concl,
        ];

        $examen = ExamenEspecialidad::updateOrCreate(
            [
                'id_ficha_atencion' => $ficha->id,
                'nombre'            => 'Evaluación Reflejos Osteotendineos',
            ],
            [
                'id_tipo'                  => '1',
                'id_template'              => '1',
                'id_examen_tipo'           => '1',
                'id_sub_tipo_especialidad' => $profesional->id_sub_tipo_especialidada,
                'id_paciente'              => $ficha->id_paciente,
                'id_profesional'           => $profesional->id,
                'cuerpo'                   => json_encode($cuerpo),
                'estado'                   => 1,
            ]
        );

        if ($examen) {
            $msj = $examen->wasRecentlyCreated ? 'Evaluación guardada correctamente' : 'Evaluación actualizada correctamente';

            $paciente       = Paciente::find($ficha->id_paciente);
            $nombre_archivo = 'Reflejos_' . str_replace(['.', '-'], '', $paciente->rut ?? $ficha->id_paciente) . '_' . date('YmdHis');

            $resultado_pdf = PdfController::generarPDF(
                'Evaluación Reflejos Osteotendineos',
                [
                    'paciente'    => $paciente,
                    'profesional' => $profesional,
                    'datos'       => $cuerpo,
                    'fecha'       => now()->format('d/m/Y'),
                ],
                $nombre_archivo,
                'pdf_reflejos',
                'G'
            );

            $pdf_url = (is_object($resultado_pdf) && ($resultado_pdf->estado ?? 0) == 1)
                ? $resultado_pdf->pdf_url
                : null;

            return response()->json([
                'estado'  => 1,
                'msj'     => $msj,
                'id'      => $examen->id,
                'pdf_url' => $pdf_url,
            ]);
        }

        return response()->json(['estado' => 0, 'msj' => 'Error al guardar la evaluación'], 500);
    }

    public function guardar_fuerza_superior(Request $request)
    {
        $ficha = FichaAtencion::find($request->id_ficha_atencion);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$ficha) {
            return response()->json(['estado' => 0, 'msj' => 'Ficha de atención no encontrada'], 404);
        }

        $cuerpo = [
            // Cintura Escapular
            'ace_flex_d'   => $request->ace_flex_d,
            'ace_flex_i'   => $request->ace_flex_i,
            'ace_exten_d'  => $request->ace_exten_d,
            'ace_exten_i'  => $request->ace_exten_i,
            'ace_abd_d'    => $request->ace_abd_d,
            'ace_abd_i'    => $request->ace_abd_i,
            'ace_aduc_d'   => $request->ace_aduc_d,
            'ace_aduc_i'   => $request->ace_aduc_i,
            'ace_obs'      => $request->ace_obs,
            // Hombro
            'ah_flex_d'    => $request->ah_flex_d,
            'ah_flex_i'    => $request->ah_flex_i,
            'ah_ext_d'     => $request->ah_ext_d,
            'ah_ext_i'     => $request->ah_ext_i,
            'ah_abd_d'     => $request->ah_abd_d,
            'ah_abd_i'     => $request->ah_abd_i,
            'ah_aduc_d'    => $request->ah_aduc_d,
            'ah_aduc_i'    => $request->ah_aduc_i,
            'ah_obs'       => $request->ah_obs,
            // Codo
            'ac_flex_d'    => $request->ac_flex_d,
            'ac_flex_i'    => $request->ac_flex_i,
            'ac_ext_d'     => $request->ac_ext_d,
            'ac_ext_i'     => $request->ac_ext_i,
            'ac_abd_d'     => $request->ac_abd_d,
            'ac_abd_i'     => $request->ac_abd_i,
            'ac_aduc_d'    => $request->ac_aduc_d,
            'ac_aduc_i'    => $request->ac_aduc_i,
            'ac_obs'       => $request->ac_obs,
            // Radio-Cubital Distal
            'arcd_flex_d'  => $request->arcd_flex_d,
            'arcd_flex_i'  => $request->arcd_flex_i,
            'arcd_ext_d'   => $request->arcd_ext_d,
            'arcd_ext_i'   => $request->arcd_ext_i,
            'arcd_abd_d'   => $request->arcd_abd_d,
            'arcd_abd_i'   => $request->arcd_abd_i,
            'arcd_aduc_d'  => $request->arcd_aduc_d,
            'arcd_aduc_i'  => $request->arcd_aduc_i,
            'arcd_obs'     => $request->arcd_obs,
            // Muñeca
            'amu_flex_d'   => $request->amu_flex_d,
            'amu_flex_i'   => $request->amu_flex_i,
            'amu_ext_d'    => $request->amu_ext_d,
            'amu_ext_i'    => $request->amu_ext_i,
            'amu_abd_d'    => $request->amu_abd_d,
            'amu_abd_i'    => $request->amu_abd_i,
            'amu_aduc_d'   => $request->amu_aduc_d,
            'amu_aduc_i'   => $request->amu_aduc_i,
            'amu_obs'      => $request->amu_obs,
            // Dedos
            'aded_flex_d'  => $request->aded_flex_d,
            'aded_flex_i'  => $request->aded_flex_i,
            'aded_ext_d'   => $request->aded_ext_d,
            'aded_ext_i'   => $request->aded_ext_i,
            'aded_abd_d'   => $request->aded_abd_d,
            'aded_abd_i'   => $request->aded_abd_i,
            'aded_aduc_d'  => $request->aded_aduc_d,
            'aded_aduc_i'  => $request->aded_aduc_i,
            'aded_obs'     => $request->aded_obs,
            // Prueba de Mingazzini
            'minga'        => $request->minga,
            // Observaciones y Conclusiones
            'extsup_coment' => $request->extsup_coment,
        ];

        $examen = ExamenEspecialidad::updateOrCreate(
            [
                'id_ficha_atencion' => $ficha->id,
                'nombre'            => 'Evaluación Fuerza Extremidad Superior',
            ],
            [
                'id_tipo'                  => '1',
                'id_template'              => '1',
                'id_examen_tipo'           => '1',
                'id_sub_tipo_especialidad' => $profesional->id_sub_tipo_especialidada,
                'id_paciente'              => $ficha->id_paciente,
                'id_profesional'           => $profesional->id,
                'cuerpo'                   => json_encode($cuerpo),
                'estado'                   => 1,
            ]
        );

        if ($examen) {
            $msj = $examen->wasRecentlyCreated ? 'Evaluación guardada correctamente' : 'Evaluación actualizada correctamente';

            $paciente       = Paciente::find($ficha->id_paciente);
            $nombre_archivo = 'FuerzaSuperior_' . str_replace(['.', '-'], '', $paciente->rut ?? $ficha->id_paciente) . '_' . date('YmdHis');

            $resultado_pdf = PdfController::generarPDF(
                'Evaluación Fuerza Extremidad Superior',
                [
                    'paciente'    => $paciente,
                    'profesional' => $profesional,
                    'datos'       => $cuerpo,
                    'fecha'       => now()->format('d/m/Y'),
                ],
                $nombre_archivo,
                'pdf_fuerza_superior',
                'G'
            );

            $pdf_url = (is_object($resultado_pdf) && ($resultado_pdf->estado ?? 0) == 1)
                ? $resultado_pdf->pdf_url
                : null;

            return response()->json([
                'estado'  => 1,
                'msj'     => $msj,
                'id'      => $examen->id,
                'pdf_url' => $pdf_url,
            ]);
        }

        return response()->json(['estado' => 0, 'msj' => 'Error al guardar la evaluación'], 500);
    }

    public function guardar_fuerza_inferior(Request $request)
    {
        $ficha = FichaAtencion::find($request->id_ficha_atencion);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$ficha) {
            return response()->json(['estado' => 0, 'msj' => 'Ficha de atención no encontrada'], 404);
        }

        $cuerpo = [
            // Cadera
            'acad_flex_d'   => $request->acad_flex_d,
            'acad_flex_i'   => $request->acad_flex_i,
            'acad_exten_d'  => $request->acad_exten_d,
            'acad_exten_i'  => $request->acad_exten_i,
            'acad_abd_d'    => $request->acad_abd_d,
            'acad_abd_i'    => $request->acad_abd_i,
            'acad_aduc_d'   => $request->acad_aduc_d,
            'acad_aduc_i'   => $request->acad_aduc_i,
            'acad_obs'      => $request->acad_obs,
            // Rodilla
            'arod_flex_d'   => $request->arod_flex_d,
            'arod_flex_i'   => $request->arod_flex_i,
            'arod_exten_d'  => $request->arod_exten_d,
            'arod_exten_i'  => $request->arod_exten_i,
            'arod_abd_d'    => $request->arod_abd_d,
            'arod_abd_i'    => $request->arod_abd_i,
            'arod_aduc_d'   => $request->arod_aduc_d,
            'arod_aduc_i'   => $request->arod_aduc_i,
            'arod_obs'      => $request->arod_obs,
            // Tobillo
            'atob_flex_d'   => $request->atob_flex_d,
            'atob_flex_i'   => $request->atob_flex_i,
            'atob_exten_d'  => $request->atob_exten_d,
            'atob_exten_i'  => $request->atob_exten_i,
            'atob_abd_d'    => $request->atob_abd_d,
            'atob_abd_i'    => $request->atob_abd_i,
            'atob_aduc_d'   => $request->atob_aduc_d,
            'atob_aduc_i'   => $request->atob_aduc_i,
            'atob_obs'      => $request->atob_obs,
            // Pie
            'apie_flex_d'   => $request->apie_flex_d,
            'apie_flex_i'   => $request->apie_flex_i,
            'apie_exten_d'  => $request->apie_exten_d,
            'apie_exten_i'  => $request->apie_exten_i,
            'apie_abd_d'    => $request->apie_abd_d,
            'apie_abd_i'    => $request->apie_abd_i,
            'apie_aduc_d'   => $request->apie_aduc_d,
            'apie_aduc_i'   => $request->apie_aduc_i,
            'apie_obs'      => $request->apie_obs,
            // Dedos
            'aded_flex_d'   => $request->aded_flex_d,
            'aded_flex_i'   => $request->aded_flex_i,
            'aded_exten_d'  => $request->aded_exten_d,
            'aded_exten_i'  => $request->aded_exten_i,
            'aded_abd_d'    => $request->aded_abd_d,
            'aded_abd_i'    => $request->aded_abd_i,
            'aded_aduc_d'   => $request->aded_aduc_d,
            'aded_aduc_i'   => $request->aded_aduc_i,
            'aded_obs'      => $request->aded_obs,
            // Prueba de Barré
            'extinf_barre'  => $request->extinf_barre,
            // Observaciones y Conclusiones
            'extinf_coment' => $request->extinf_coment,
        ];

        $examen = ExamenEspecialidad::updateOrCreate(
            [
                'id_ficha_atencion' => $ficha->id,
                'nombre'            => 'Evaluación Fuerza Extremidad Inferior',
            ],
            [
                'id_tipo'                  => '1',
                'id_template'              => '1',
                'id_examen_tipo'           => '1',
                'id_sub_tipo_especialidad' => $profesional->id_sub_tipo_especialidada,
                'id_paciente'              => $ficha->id_paciente,
                'id_profesional'           => $profesional->id,
                'cuerpo'                   => json_encode($cuerpo),
                'estado'                   => 1,
            ]
        );

        if ($examen) {
            $msj = $examen->wasRecentlyCreated ? 'Evaluación guardada correctamente' : 'Evaluación actualizada correctamente';

            $paciente       = Paciente::find($ficha->id_paciente);
            $nombre_archivo = 'FuerzaInferior_' . str_replace(['.', '-'], '', $paciente->rut ?? $ficha->id_paciente) . '_' . date('YmdHis');

            $resultado_pdf = PdfController::generarPDF(
                'Evaluación Fuerza Extremidad Inferior',
                [
                    'paciente'    => $paciente,
                    'profesional' => $profesional,
                    'datos'       => $cuerpo,
                    'fecha'       => now()->format('d/m/Y'),
                ],
                $nombre_archivo,
                'pdf_fuerza_inferior',
                'G'
            );

            $pdf_url = (is_object($resultado_pdf) && ($resultado_pdf->estado ?? 0) == 1)
                ? $resultado_pdf->pdf_url
                : null;

            return response()->json([
                'estado'  => 1,
                'msj'     => $msj,
                'id'      => $examen->id,
                'pdf_url' => $pdf_url,
            ]);
        }

        return response()->json(['estado' => 0, 'msj' => 'Error al guardar la evaluación'], 500);
    }
}
