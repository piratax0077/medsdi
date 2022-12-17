<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\Bono;
use App\Models\Especialidad;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\Invitacion;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\Servicios;
use App\Models\Parametro;
use App\Models\Personas;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EscritorioGeneral extends Controller
{
    /**
     * BUSQUEDA DE PROFESIONAL
     *
     * @param Request $request
     * @return array (Profesional)
     */
    public function buscarProfesional(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->nombre))
            $filtro[] = array('nombre','like',$request->nombre.'%');
        if(!empty($request->apellido_uno))
            $filtro[] = array('apellido_uno','like',$request->apellido_uno.'%');
        if(!empty($request->apellido_dos))
            $filtro[] = array('apellido_dos','like',$request->apellido_dos.'%');
        // if(!empty($request->id_direccion))
        //     $filtro[] = array('id_direccion',request->id_direccion);
        if(!empty($request->id_especialidad))
            $filtro[] = array('id_especialidad', $request->id_especialidad);
        if(!empty($request->id_tipo_especialidad))
            $filtro[] = array('id_tipo_especialidad', $request->id_tipo_especialidad);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);

        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);


        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registros = Profesional::where($filtro)->whereNotIn('id',[$profesional->id])->get();


        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }
        return $datos;
    }
    /**
     * BUSQUEDA DE PROFESIONAL buscador
     *
     * @param Request $request
     * @return array (Profesional)
     */
    public function buscarProfesionalBuscador(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->nombre))
            $filtro[] = array('nombre','like',$request->nombre.'%');
        if(!empty($request->apellido_uno))
            $filtro[] = array('apellido_uno','like',$request->apellido_uno.'%');
        if(!empty($request->apellido_dos))
            $filtro[] = array('apellido_dos','like',$request->apellido_dos.'%');
        // if(!empty($request->id_direccion))
        //     $filtro[] = array('id_direccion',request->id_direccion);
        if(!empty($request->id_especialidad))
            $filtro[] = array('id_especialidad', $request->id_especialidad);
        if(!empty($request->id_tipo_especialidad))
            $filtro[] = array('id_tipo_especialidad', $request->id_tipo_especialidad);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);


        // if(Auth::user()->hasRole('Profesional'))
        // {
        //     $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        //     $registros = Profesional::where($filtro)->whereNotIn('id',[$profesional->id])->get();
        // }
        // else
        {
            // $registros = Profesional::where($filtro)
            //                 ->with(['Direccion'=>function($query) use ($request){
            //                         $query->where('id_ciudad',$request->id_ciudad);
            //                 }])
            //                 ->Dire
            //                 ->get();
            $sql  = "SELECT ";
            $sql .= "    profesionales.id profesionales_id, ";
            $sql .= "    profesionales.nombre profesionales_nombre, ";
            $sql .= "    profesionales.apellido_uno profesionales_apellido_uno, ";
            $sql .= "    profesionales.apellido_dos profesionales_apellido_dos, ";
            $sql .= "    profesionales.rut profesionales_rut, ";
            $sql .= "    profesionales.telefono_uno profesional_telefono_uno, ";
            $sql .= "    profesionales.email profesional_email, ";
            $sql .= "    profesionales.certificado profesional_certificado, ";
            $sql .= "    profesionales.numero_certificado profesional_numero_certificado, ";
            $sql .= "    profesionales.dv_certiicado profesional_dv_certiicado , ";
            $sql .= "    profesionales.id_direccion profesional_id_direccion, ";

            $sql .= "    profesionales.id_especialidad profesional_id_especialidad, ";
            $sql .= "    especialidades.nombre especialidades_nombre, ";

            $sql .= "    profesionales.id_tipo_especialidad profesional_id_tipo_especialidad, ";
            $sql .= "    tipos_especialidad.nombre tipos_especialidad_nombre, ";

            $sql .= "    profesionales.id_sub_tipo_especialidad profesional_id_sub_tipo_especialidad, ";
            $sql .= "    sub_tipo_especialidad.nombre sub_tipo_especialidad_nombre, ";

            $sql .= "    direcciones.id direcciones_id, ";
            $sql .= "    direcciones.direccion direcciones_direccion, ";
            $sql .= "    direcciones.id_ciudad direcciones_id_ciudad, ";

            $sql .= "    ciudades.nombre ciudades_nombre, ";
            $sql .= "    ciudades.id_region ciudades_id_region, ";

            $sql .= "    regiones.nombre  regiones_nombre ";
            $sql .= " FROM profesionales ";

            $sql .= " INNER JOIN direcciones ON (direcciones.id = profesionales.id_direccion ";
            if(!empty($request->id_ciudad))
                $sql .= " AND direcciones.id_ciudad = ".$request->id_ciudad."";
            $sql .= ")";

            $sql .= " INNER JOIN ciudades ON (ciudades.id = direcciones.id_ciudad) ";

            $sql .= " INNER JOIN regiones ON (regiones.id = ciudades.id_region ";
            if(!empty($request->id_region))
                $sql .= " AND regiones.id = ".$request->id_region." ";
            $sql .= " ) ";

            $sql .= " INNER JOIN especialidades ON (profesionales.id_especialidad = especialidades.id) ";

            $sql .= " LEFT JOIN tipos_especialidad ON (profesionales.id_tipo_especialidad = tipos_especialidad.id) ";

            $sql .= " LEFT JOIN sub_tipo_especialidad ON (profesionales.id_sub_tipo_especialidad = sub_tipo_especialidad.id) ";

            $sql .= " WHERE 1=1";
            if(!empty($request->id_especialidad))
                $sql .= " AND profesionales.id_especialidad = ".$request->id_especialidad."";
            if(!empty($request->id_tipo_especialidad))
                $sql .= " AND profesionales.id_tipo_especialidad = ".$request->id_tipo_especialidad."";
            if(!empty($request->id_sub_tipo_especialidad))
                $sql .= " AND profesionales.id_sub_tipo_especialidad = ".$request->id_sub_tipo_especialidad."";
            if(!empty($request->nombre))
                $sql .= " AND profesionales.nombre LIKE '".$request->nombre."%'";
            if(!empty($request->apellido_uno))
                $sql .= " AND profesionales.apellido_uno LIKE '".$request->apellido_uno."%'";
            if(!empty($request->apellido_dos))
                $sql .= " AND profesionales.apellido_dos LIKE '".$request->apellido_dos."%'";
            if(!empty($request->rut))
                $sql .= " AND profesionales.rut = '".$request->rut."'";
            if(!empty($request->id_institucion))
                $sql .= " AND profesionales.id in (SELECT id_profesional FROM profesionales_lugares_atencion WHERE id_lugar_atencion = (SELECT id_lugar_atencion FROM instituciones WHERE id = ".$request->id_institucion.") and estado=1 )";

                // var_dump($sql);
            $registros = DB::select($sql);
            $registros_validos = array();
            foreach ($registros as $key_r => $value_r)
            {
                // $profesional_horarios = ProfesionalHorario::where('id_profesional',$value_r->profesionales_id)->get();
                // $registros[$key_r]->profesional_horarios = $profesional_horarios;
                $registros[$key_r]->profesional_hora_mas_proxima = $this->cargarFechaMasProxima($value_r->profesionales_id);

                // busqueda de imagen
                $array_rut = explode('-',$value_r->profesionales_rut);
                $nombre_imagen = asset('images/iconos/usuario_profesional.svg');
                if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
                {
                    $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
                }
                $registros[$key_r]->img_profesional = $nombre_imagen;


                if($request->buscar_especialidad_hora24 == '1')
                {
                    if(count($registros[$key_r]->profesional_hora_mas_proxima)>0)
                    {
                        $dia = $registros[$key_r]->profesional_hora_mas_proxima['dia'];
                        $hora = $registros[$key_r]->profesional_hora_mas_proxima['hora'];
                        $dia_hora = date('Y-m-d H:i:s',strtotime($dia.' '.$hora));

                        // var_dump('****'.$value_r->profesionales_id.'****');
                        // var_dump('dia_hora:'.$dia_hora);
                        $dia_hoy = date('Y-m-d H:i:s');
                        // var_dump('dia_hoy:'.$dia_hoy);
                        $dia_hoy_24 = date('Y-m-d H:i:s', strtotime('+24 hours',strtotime($dia_hoy)) );
                        // var_dump('dia_hoy_24:'.$dia_hoy_24);


                        if(strtotime($dia_hora) > strtotime( date('Y-m-d H:i:s', strtotime($dia_hoy_24) )))
                        {
                            unset($registros[$key_r]);
                        }
                        else
                        {
                            $registros_validos[] = $registros[$key_r];
                        }

                    }
                    else
                    {
                        unset($registros[$key_r]);
                    }
                }
                else
                {
                    $registros_validos[] = $registros[$key_r];
                }
            }
        }

        $registros =  $registros_validos;

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
            $datos['cant'] = count($registros);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }
        return $datos;
    }

    public function cargarFechaMasProxima($id_profesional)
    {
        $datos = array();

        $profesional_horarios = ProfesionalHorario::where('id_profesional',$id_profesional)->orderBy('id_lugar_atencion', 'ASC')->orderBy('dia', 'ASC')->get();
        $mes_inicio = date('m');
        $anio_inicio = date('Y');
        $dia_hoy = date('Y-m-d');
        $array_bloques = array();

        $fechas_mas_proxima = array();
        $fechas_mas_proxima_final = array(
            // 'id_lugar_atencion' => '',
            // 'dia' => date('Y-m-d') ,
            // 'hora' => date('H:i:s')
        );

        foreach ($profesional_horarios as $key_prof_hora => $value_prof_hora)
        {
            if(!isset($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion]))
                $fechas_mas_proxima[$value_prof_hora->id_lugar_atencion] = array();

            $finalizar = 0;
            // echo 'paso 0'.$finalizar;
            // if($finalizar == 1) break;
            $hora_inicio_turno  = $value_prof_hora->hora_inicio;
            $hora_termino_turno  = $value_prof_hora->hora_termino;

            /** duracion de consulta en minutos */
            $duracion =  $value_prof_hora->duracion_consulta;
            $array_duracion = explode(':', $duracion);
            $duracion_total = 0;

            if((int)$array_duracion[0]>0)
                $duracion_total += (int)$array_duracion[0]*60;
            if((int)$array_duracion[1]>0)
                $duracion_total += (int)$array_duracion[1];

            $array_dia = explode(',',$value_prof_hora->dia);

            foreach ($array_dia as $key_dia => $value_dia)
            {
                // echo 'paso 1'.$finalizar;
                if($finalizar == 1) break;

                $dia_termino_for = strtotime('+1 days', strtotime($dia_hoy));
                for ($dia=strtotime($dia_hoy); $dia <= $dia_termino_for ; $dia = strtotime('+1 days',$dia)) {
                    if(date('N',$dia) == $value_dia)
                    {
                        for ($hora=strtotime($hora_inicio_turno); $hora <= strtotime( '+'. $duracion_total.' minute', strtotime($hora_termino_turno) ); $hora = strtotime('+'. $duracion_total.' minute',$hora))
                        {
                            if($finalizar == 1) break;

                            $hora_medica = HoraMedica::where('fecha_consulta',date('Y-m-d',$dia))->where('hora_inicio',date('H:i:s',$hora))->first();
                            if($hora_medica)
                            {
                                $finalizar = 0;
                                $dia_termino_for = strtotime('+1 days', $dia_termino_for);
                            }
                            else
                            {
                                $finalizar = 1;
                                if(count($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion]) > 0)
                                {
                                    $dias_registrado = strtotime($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0]['dia']);
                                    $hora_registrado = strtotime($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0]['hora']);
                                    if($dias_registrado >= $dia)
                                    {
                                        if($hora_registrado >= $hora)
                                        {
                                            $fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0] = array('dia' => date('Y-m-d',$dia) , 'hora' => date('H:i:s',$hora) );

                                            if(count($fechas_mas_proxima_final)>0)
                                            {
                                                $dias_registrado_final = strtotime($fechas_mas_proxima_final['dia']);
                                                $hora_registrado_final = strtotime($fechas_mas_proxima_final['hora']);
                                                if($dias_registrado_final >= $dia)
                                                {
                                                    if($hora_registrado_final >= $hora)
                                                    {
                                                        $fechas_mas_proxima_final = array(
                                                            'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                                            'dia' => date('Y-m-d',$dia) ,
                                                            'hora' => date('H:i:s',$hora)
                                                        );
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $fechas_mas_proxima_final = array(
                                                    'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                                    'dia' => date('Y-m-d',$dia) ,
                                                    'hora' => date('H:i:s',$hora)
                                                );
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    $fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0] = array('dia' => date('Y-m-d',$dia) , 'hora' => date('H:i:s',$hora) );

                                    if(count($fechas_mas_proxima_final)>0)
                                    {
                                        $dias_registrado_final = strtotime($fechas_mas_proxima_final['dia']);
                                        $hora_registrado_final = strtotime($fechas_mas_proxima_final['hora']);
                                        if($dias_registrado_final >= $dia)
                                        {
                                            if($hora_registrado_final >= $hora)
                                            {
                                                $fechas_mas_proxima_final = array(
                                                    'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                                    'dia' => date('Y-m-d',$dia) ,
                                                    'hora' => date('H:i:s',$hora)
                                                );
                                            }
                                        }
                                    }
                                    else
                                    {
                                        $fechas_mas_proxima_final = array(
                                            'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                            'dia' => date('Y-m-d',$dia) ,
                                            'hora' => date('H:i:s',$hora)
                                        );
                                    }
                                }
                                break;
                            }
                        }
                    }
                    else
                    {
                        $dia_termino_for = strtotime('+1 days', $dia_termino_for);
                    }
                }
            }
        }
        // echo json_encode($fechas_mas_proxima);
        // echo '*******';
        // echo json_encode($fechas_mas_proxima_final);

        return $fechas_mas_proxima_final;

    }

    public function informacionProfesional(Request $request)
    {
        $datos = array();

        $profesional = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'sexo', 'rut', 'email', 'telefono_uno', 'telefono_dos', 'estado', 'certificado',
                                            'numero_certificado', 'dv_certiicado', 'id_direccion', 'id_especialidad', 'id_usuario', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')

                                    ->with(['Especialidad' => function($query){
                                        $query->select('id', 'nombre')->get();
                                    }])

                                    ->with(['TipoEspecialidad' => function($query){
                                        $query->select('id', 'nombre')->get();
                                    }])

                                    ->with(['SubTipoEspecialidad' => function($query){
                                        $query->select('id', 'nombre')->get();
                                    }])

                                    ->with(['Direccion' => function($query){
                                        $query->select('id', 'direccion', 'numero_dir', 'id_ciudad')
                                            ->with(['Ciudad' => function($query){
                                                $query->select('id', 'nombre')->get();
                                            }])
                                            ->get();
                                    }])

                                    ->with(['AntecedenteAcademico' => function($query){
                                        $query->select('id', 'id_profesional', 'id_tipo_antecedente_academico', 'nombre', 'universidad', 'anio', 'ciudad_pais', 'numero_inscripcion', 'supersalud', 'numero_colegio')
                                                    ->with(['TipoAntecedenteAcademico' => function($query){
                                                        $query->select('id', 'nombre')->get();
                                                    }])
                                            ->get();
                                    }])

                                    ->where('id', $request->id_profesional)
                                    ->first();




        if($profesional)
        {

            $lugares_atencion = $profesional->LugaresAtencion()
                                            ->select('lugares_atencion.id', 'lugares_atencion.nombre', 'lugares_atencion.rut', 'lugares_atencion.email', 'lugares_atencion.telefono', 'lugares_atencion.id_direccion')
                                            ->with(['Direccion' => function($query){
                                                $query->select('id', 'direccion', 'numero_dir', 'id_ciudad')
                                                    ->with(['Ciudad' => function($query){
                                                        $query->select('id', 'nombre')->get();
                                                    }])
                                                    ->get();
                                            }])
											->where('estado', 1)
                                            ->get();

            foreach ($lugares_atencion as $key => $lg)
            {
                $profesional_convenios = ProfesionalConvenio::where('id_profesional', $request->id_profesional)->where('id_lugar_atencion', $lg->id)->first();
                if($profesional_convenios)
                {
                    $lugares_atencion[$key]->convenio = $profesional_convenios;
                }
                else
                {
                    $lugares_atencion[$key]->convenio = '';
                }
            }
            $array_rut = explode('-',$profesional->rut);
            $nombre_imagen = asset('images/iconos/usuario_profesional.svg');

            if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
            {
                $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
            }
            $profesional->img_profesional = $nombre_imagen;

            $datos['estado'] = 1;
            $datos['msj'] = 'Registros';
            $datos['profesional'] = $profesional;
            $datos['lugares_atencion'] = $lugares_atencion;
            $datos['array_rut'] = $array_rut[0];



        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Informacion Profesional no encotnrada';
        }

        return $datos;

    }


    // listar lugares de atenciones
    /**
     * busqueda de lugares de  atencion por profesional
     * @param Request $requst
     *
     * @return array()
     */
    public function lugaresAtencionProfesionalBuscador(Request $request){
        $datos = array();

        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $lugares_atencion = $profesional->LugaresAtencion()->get();

        if($lugares_atencion)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $lugares_atencion;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    // carga de dias laborales profesional por profesional y lugar atenciones (dias laborables)
    /**
     * busqueda de dias laborables del profesional en un lugar de atencion
     * @param Request $requst
     *
     * @return array()
     */
    public function diasLaboralesProfesionaLugarAtencionBuscador(Request $request){
        $datos = array();

        $horario = ProfesionalHorario::where('id_profesional', $request->id_profesional)->where('id_lugar_atencion', $request->lugar_atencion)->get();

        $horario_agenda_no_laboral = '1,2,3,4,5,6,7';
        $horario_agenda_laboral = '';

        foreach ($horario as $hor) {
            $ho = explode(',', $hor->dia);
            // dd($ho);
            foreach ($ho as $h) {
                if ($h == '1') {
                    $horario_agenda_no_laboral = str_replace($h, '', $horario_agenda_no_laboral);
                    $horario_agenda_laboral .= $h;
                } else {
                    $horario_agenda_no_laboral = str_replace(',' . $h, '', $horario_agenda_no_laboral);
                    $horario_agenda_laboral .= ',' . $h;
                }
            }
        }
        $horario_agenda_no_laboral = ltrim($horario_agenda_no_laboral, ',');
        $horario_agenda_laboral = ltrim($horario_agenda_laboral, ',');


        $datos['estado'] = 1;
        $datos['msj'] = 'registros';
        $datos['registros'] = array('horario_agenda_laboral' => $horario_agenda_laboral,'horario_agenda_no_laboral' => $horario_agenda_no_laboral);

        return $datos;
    }

    // carga de horas disponibles para profesional por profesional lugar atencion y dia (horas disponibles)
    /**
     * busqueda de horas disponibles del profesional en una fecha especifica en un lugar de atencion
     * @param Request $requst
     *
     * @return array()
     */
    public function horasDisponiblesProfesionalLugarAtencionBuscador(Request $request){
        // id_profesional
        // id_lugar_atencion
        // dia
        $texto_dia = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        $texto_mes = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $datos = array();

        $dia_semana = date('N',strtotime($request->dia));

        $profesional_horarios = ProfesionalHorario::where('id_profesional',$request->id_profesional)
                                                ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                ->where('dia','like','%'.$dia_semana.'%')
                                                ->orderBy('dia', 'ASC')
                                                ->first();
        if($profesional_horarios)
        {
            $array_bloques = array();

            $hora_inicio_turno  = $request->dia.' '.$profesional_horarios->hora_inicio;
            $hora_termino_turno  = $request->dia.' '.$profesional_horarios->hora_termino;

            /** duracion de consulta en minutos */
            $duracion =  $profesional_horarios->duracion_consulta;
            $array_duracion = explode(':', $duracion);
            $duracion_total = 0;

            if((int)$array_duracion[0]>0)
                $duracion_total += (int)$array_duracion[0]*60;
            if((int)$array_duracion[1]>0)
                $duracion_total += (int)$array_duracion[1];

            for ($hora=strtotime($hora_inicio_turno); $hora <= strtotime( '+'. $duracion_total.' minute', strtotime($hora_termino_turno) ); $hora = strtotime('+'. $duracion_total.' minute',$hora))
            {
                $hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))->where('hora_inicio',date('H:i:s',$hora))->first();
                if($hora_medica)
                {
                    // con reserva
                }
                else
                {
                    // sin reserva
                    $array_bloques[] = array(
                                            'dia' => date('Y-m-d',$hora),
                                            'hora' => date('H:i:s',$hora),
                                            'fecha_hora' => date('Y-m-d H:i:s',$hora)
                                        );

                }
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $array_bloques;
            $datos['text_fecha'] = $texto_dia[$dia_semana].' '. date('d',strtotime($request->dia)).' '.$texto_mes[date('m',strtotime($request->dia))];

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['profesional_horario'] = $profesional_horarios;
        }

        return $datos;
    }

    public function getPersona(Request $request)
    {
        $datos = array();
        $registro = Personas::select('rut', 'nombre1', 'nombre2', 'appaterno', 'apmaterno')->where('rut', $request->rut)->first();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }
        return $datos;
    }

    public function invitacionProfesionalConfirmacionRechazo(Request $request)
    {
        // var_dump($request->all);
        $mensaje ='';
        $valido = 1;
        if(empty($request->inv)){
            $valido = 0;
            $mensaje .= 'Problema al manejar invitacion';
        }
        if(empty($request->tpi))
        {
            $valido = 0;
            $mensaje .= 'Problema al manejar el tipo de proceso de la invitacion';
        }

        if($valido == 1)
        {
            $id_invitacion = $request->inv;
            $tipo_proceso = $request->tpi;

            $invitacion = Invitacion::where('id',$id_invitacion)->first();

            if($invitacion->procesado == 0)
            {
                switch ($tipo_proceso) {
                    case '1':// acepto
                        if($invitacion->id_user_invitado)
                        {
                            $profesional = Profesional::where('id_usuario',$invitacion->id_user_invitado)->first();
                            $buscar_prof_lugar = ProfesionalesLugaresAtencion::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$invitacion->id_lugar_atencion)->first();
                            if($buscar_prof_lugar)
                            {
                                $invitacion->procesado = 1;
                                $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                $invitacion->estado = 1;
                                if($invitacion->save())
                                {
                                    $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ya se encuentra como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                }
                                else
                                {
                                    $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ya se encuentra como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                    $mensaje .= '<br>Invitacion no actualizada. ';
                                }

                            }
                            else
                            {
                                /** profesional existente */
                                $reg_prof_lugar = new ProfesionalesLugaresAtencion();
                                $reg_prof_lugar->id_profesional = $profesional->id;
                                $reg_prof_lugar->id_lugar_atencion = $invitacion->id_lugar_atencion;
                                $reg_prof_lugar->estado = 1;
                                if($reg_prof_lugar->save())
                                {
                                    $invitacion->procesado = 1;
                                    $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                    $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                    $invitacion->estado = 1;
                                    if($invitacion->save())
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                        $mensaje .= '<br>Invitacion no actualizada. ';
                                    }
                                }
                                else
                                {
                                    $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', se ha presentado un problema al confirmar como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                }
                            }
                        }
                        else
                        {
                            /** profesional nuevo  */
                            $user = User::where('email', $invitacion->email)->first();
                            if($user == NULL)
                            {
                                $user = new User();
                                $user->name = $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos;
                                $user->email = $invitacion->email;
                                $user->password = Hash::make(rand(1111,9999));
                                if ($user->save()) {
                                    $user->assignRole('Profesional');
                                    $invitacion->procesado = 1;
                                    $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                    $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                    $invitacion->id_user_invitado = $user->id;
                                    $invitacion->estado = 1;
                                    if($invitacion->save())
                                    {
                                        $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                        $mensaje .= 'Usuario creado con exito.<br>Recibirá un correo con la información de acceso al sistema. ';
                                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. ';
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                        $mensaje .= 'Usuario creado con exito.<br>Recibirá un correo con la información de acceso al sistema. ';
                                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. ';
                                        $mensaje .= 'Invitacion no actualizada. ';
                                    }
                                }
                                else
                                {
                                    $mensaje .= 'Se presento un problema al generar su Usuario, intente nuevamente. ';
                                }
                            }
                            else
                            {
                                $mensaje .= 'El correo "'.$invitacion->email.'" ya esta siendo utilizado o su usuario ya ha sido creado. ';
                            }

                        }

                        break;
                    case '2': // rechazo
                            $invitacion->procesado = 1;
                            $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                            $invitacion->fecha_rechazo = date('Y-m-d H:i:s');
                            $invitacion->estado = 2;
                            if($invitacion->save())
                            {
                                $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha RECHAZADO la invitacion para ser integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                            }
                            else
                            {
                                $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha RECHAZADO la invitacion para ser integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. ';
                                $mensaje .= 'Invitacion no actualizada. ';
                            }
                            /** CORREO NOTIFICACION AL CENTRO MEDICO DE RECHAZO DE INVITACION */
                            /** CORREO AL PROFESIONAL INDICANDO RECHAZO A LA INVITACION */

                        break;

                    default:
                            $mensaje .= 'Proceso solicitado no aceptado. ';
                        break;
                }
            }
            else
            {
                $mensaje .= 'Invitacion Ya se encuentra procesada. ';
            }
        }
        return view('app.general.validaciones.invitacion')->with([
                'mensaje' => $mensaje,
            ]);

    }

    /** especialidad */
    public function cargar_especialidad(Request $request)
    {
        $datos = array();
        $filtro = array();
        $filtro[] = array('estado',1);
        $registros = Especialidad::select('id', 'nombre')->where($filtro)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }
        return $datos;
    }
    /** tipo especialidad */
    public function cargar_tipo_especialidad(Request $request)
    {
        $datos = array();
        $filtro = array();
        $filtro[] = array('estado',1);
        if(!empty($request->id_especialidad))
            $filtro[] = array('id_especialidad',$request->id_especialidad);

        $registros = TipoEspecialidad::select('id', 'nombre','id_especialidad')->where($filtro)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }
        return $datos;
    }
    /** sub tipo especialidad */
    public function cargar_sub_tipo_especialidad(Request $request)
    {
        $datos = array();
        $filtro = array();
        $filtro[] = array('estado',1);

        if(!empty($request->id_tipo_especialidad))
            $filtro[] = array('id_tipo_especialidad',$request->id_tipo_especialidad);

        $registros = SubTipoEspecialidad::select('id', 'nombre','id_tipo_especialidad')->where($filtro)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }
        return $datos;
    }

}
