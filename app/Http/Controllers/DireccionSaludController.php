<?php

namespace App\Http\Controllers;

use App\Models\DeclaracionEno;
use App\Models\GesRegistros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DireccionSaludController extends Controller
{
    public function index()
    {
        $ruta_blade = 'direccion_salud.escritorio_direccion_salud';
        return view($ruta_blade)->with(
            []
        );
    }

    /** INICIO GES */
    public function cargarGes()
    {
        $anio = date('Y');
        $mes = date('m');

        $registros = GesRegistros::select('ges_registros.nombre_ges',
                                'ges_registros.fecha_ficha_ges',
                                'ges_registros.hora_ficha_ges',

                                DB::raw('CONCAT( pacientes.nombres, " ", pacientes.apellido_uno, " ", pacientes.apellido_dos) AS paciente_nombre'),
                                'pacientes.rut AS paciente_rut',
                                DB::raw('CONCAT( profesionales.nombre, " ", profesionales.apellido_uno, " ", profesionales.apellido_dos) AS profesional_nombre'),
                                'profesionales.rut AS profesional_rut',

                                'ges_registros.nombre_institucion_ficha_ges',
                                'ges_registros.direccion_institucion_ficha_ges',

                                'ges_registros.confirmacion_diagnostica_ficha_ges',
                                'ges_registros.paciente_tratamiento_ficha_ges',

                                'ges_registros.codigo_verificacion',
                                'ges_registros.created_at')
                        ->join('pacientes', 'ges_registros.id_paciente', '=', 'pacientes.id')
                        ->join('profesionales', 'ges_registros.id_profesional', '=', 'profesionales.id')
                        ->whereYear('ges_registros.fecha_ficha_ges', $anio)
                        ->whereMonth('ges_registros.fecha_ficha_ges', $mes)
                        ->get();

        return view('direccion_salud.escritorio_ges')->with([
            'registros' => $registros,
            'anio' => $anio,
            'mes' => $mes,
        ]);
    }
    public function buscarGes(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->anio))
        {
            $error['anio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->mes))
        {
            $error['mes'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = GesRegistros::select('ges_registros.nombre_ges',
                                'ges_registros.fecha_ficha_ges',
                                'ges_registros.hora_ficha_ges',

                                DB::raw('CONCAT( pacientes.nombres, " ", pacientes.apellido_uno, " ", pacientes.apellido_dos) AS paciente_nombre'),
                                'pacientes.rut AS paciente_rut',
                                DB::raw('CONCAT( profesionales.nombre, " ", profesionales.apellido_uno, " ", profesionales.apellido_dos) AS profesional_nombre'),
                                'profesionales.rut AS profesional_rut',

                                'ges_registros.nombre_institucion_ficha_ges',
                                'ges_registros.direccion_institucion_ficha_ges',

                                'ges_registros.confirmacion_diagnostica_ficha_ges',
                                'ges_registros.paciente_tratamiento_ficha_ges',

                                'ges_registros.codigo_verificacion',
                                'ges_registros.created_at')
                        ->join('pacientes', 'ges_registros.id_paciente', '=', 'pacientes.id')
                        ->join('profesionales', 'ges_registros.id_profesional', '=', 'profesionales.id')
                        ->whereYear('ges_registros.fecha_ficha_ges', $request->anio)
                        ->whereMonth('ges_registros.fecha_ficha_ges', $request->mes)
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
                $datos['msj'] = 'Sin registros';
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
    /** FIN GES */

    /** INICIO ENO */
    public function cargarEnfNotiOblig()
    {
        $anio = date('Y');
        $mes = date('m');

        $registros = DeclaracionEno::select(    'declaraciones_eno.diagnostico_cie',
                                                'declaraciones_eno.diagnositico_confirmado',
                                                'declaraciones_eno.primeros_sintomas',
                                                DB::raw("CASE WHEN declaraciones_eno.pais_contagio = 1 THEN 'CHILE' WHEN declaraciones_eno.pais_contagio = 2 THEN 'EXTRANJERO' END pais_contagio"),
                                                'declaraciones_eno.pais',

                                                DB::raw(" CASE WHEN declaraciones_eno.vacunacion = 1 THEN 'SI' WHEN declaraciones_eno.vacunacion = 2 THEN 'NO' WHEN declaraciones_eno.vacunacion = 3 THEN 'IGNORADO' WHEN declaraciones_eno.vacunacion = 4 THEN 'NO CORRESPONDE' ELSE 'NO' END vacunacion"),
                                                'declaraciones_eno.fecha_ultima_dosis',
                                                'declaraciones_eno.numero_ultima_dosis',

                                                'declaraciones_eno.tbc',
                                                'declaraciones_eno.tbc_recaidas',

                                                'declaraciones_eno.fecha_notificacion',
                                                'declaraciones_eno.hora_notificacion',

                                                DB::raw("CONCAT( pacientes.nombres, ' ', pacientes.apellido_uno, ' ', pacientes.apellido_dos) AS paciente_nombre"),
                                                'pacientes.rut AS paciente_rut',

                                                'declaraciones_eno.nacionalidad_paciente',
                                                'declaraciones_eno.ocupacion_paciente',
                                                DB::raw("CASE WHEN declaraciones_eno.pueblo_originario_paciente = 1 THEN 'Ninguna' WHEN declaraciones_eno.pueblo_originario_paciente = 2 THEN 'Atacameño' WHEN declaraciones_eno.pueblo_originario_paciente = 3 THEN 'Aimara' WHEN declaraciones_eno.pueblo_originario_paciente = 5 THEN 'Colla' WHEN declaraciones_eno.pueblo_originario_paciente = 6 THEN 'Otro' ELSE 'Ninguna' END pueblo_originario_paciente"),
                                                DB::raw("CASE WHEN declaraciones_eno.condicion_paciente = 1 THEN 'Inactivo/a' WHEN declaraciones_eno.condicion_paciente = 2 THEN 'Activo/a' ELSE 'Inactivo/a' END condicion_paciente"),
                                                DB::raw("CASE WHEN declaraciones_eno.categoria_paciente = 1 THEN 'Patrón / Empresario' WHEN declaraciones_eno.categoria_paciente = 2 THEN 'Empleado' WHEN declaraciones_eno.categoria_paciente = 3 THEN 'Obrero' WHEN declaraciones_eno.categoria_paciente = 4 THEN 'Trabajador Independiente' END categoria_paciente"),

                                                DB::raw("CONCAT( profesionales.nombre, ' ', profesionales.apellido_uno, ' ', profesionales.apellido_dos) AS profesional_nombre"),
                                                'profesionales.rut AS profesional_rut',

                                                'declaraciones_eno.nombre_establecimiento',
                                                'declaraciones_eno.codigo_establecimiento',
                                                'declaraciones_eno.nombre_oficina',
                                                'declaraciones_eno.codigo_oficina')
                        ->join('pacientes', 'declaraciones_eno.id_paciente', '=', 'pacientes.id')
                        ->join('profesionales', 'declaraciones_eno.id_profesional', '=', 'profesionales.id')
                        ->whereYear('declaraciones_eno.fecha_notificacion', $anio)
                        ->whereMonth('declaraciones_eno.fecha_notificacion', $mes)
                        ->get();

        return view('direccion_salud.escritorio_enfer_noti_obliga')->with([
            'registros' => $registros,
            'anio' => $anio,
            'mes' => $mes,
        ]);
    }
    public function buscarEnfNotiOblig(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->anio))
        {
            $error['anio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->mes))
        {
            $error['mes'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = DeclaracionEno::select(    'declaraciones_eno.diagnostico_cie',
                                                    'declaraciones_eno.diagnositico_confirmado',
                                                    'declaraciones_eno.primeros_sintomas',
                                                    DB::raw("CASE WHEN declaraciones_eno.pais_contagio = 1 THEN 'CHILE' WHEN declaraciones_eno.pais_contagio = 2 THEN 'EXTRANJERO' END pais_contagio"),
                                                    'declaraciones_eno.pais',

                                                    DB::raw(" CASE WHEN declaraciones_eno.vacunacion = 1 THEN 'SI' WHEN declaraciones_eno.vacunacion = 2 THEN 'NO' WHEN declaraciones_eno.vacunacion = 3 THEN 'IGNORADO' WHEN declaraciones_eno.vacunacion = 4 THEN 'NO CORRESPONDE' ELSE 'NO' END vacunacion"),
                                                    'declaraciones_eno.fecha_ultima_dosis',
                                                    'declaraciones_eno.numero_ultima_dosis',

                                                    'declaraciones_eno.tbc',
                                                    'declaraciones_eno.tbc_recaidas',

                                                    'declaraciones_eno.fecha_notificacion',
                                                    'declaraciones_eno.hora_notificacion',

                                                    DB::raw("CONCAT( pacientes.nombres, ' ', pacientes.apellido_uno, ' ', pacientes.apellido_dos) AS paciente_nombre"),
                                                    'pacientes.rut AS paciente_rut',

                                                    'declaraciones_eno.nacionalidad_paciente',
                                                    'declaraciones_eno.ocupacion_paciente',
                                                    DB::raw("CASE WHEN declaraciones_eno.pueblo_originario_paciente = 1 THEN 'Ninguna' WHEN declaraciones_eno.pueblo_originario_paciente = 2 THEN 'Atacameño' WHEN declaraciones_eno.pueblo_originario_paciente = 3 THEN 'Aimara' WHEN declaraciones_eno.pueblo_originario_paciente = 5 THEN 'Colla' WHEN declaraciones_eno.pueblo_originario_paciente = 6 THEN 'Otro' ELSE 'Ninguna' END pueblo_originario_paciente"),
                                                    DB::raw("CASE WHEN declaraciones_eno.condicion_paciente = 1 THEN 'Inactivo/a' WHEN declaraciones_eno.condicion_paciente = 2 THEN 'Activo/a' ELSE 'Inactivo/a' END condicion_paciente"),
                                                    DB::raw("CASE WHEN declaraciones_eno.categoria_paciente = 1 THEN 'Patrón / Empresario' WHEN declaraciones_eno.categoria_paciente = 2 THEN 'Empleado' WHEN declaraciones_eno.categoria_paciente = 3 THEN 'Obrero' WHEN declaraciones_eno.categoria_paciente = 4 THEN 'Trabajador Independiente' END categoria_paciente"),

                                                    DB::raw("CONCAT( profesionales.nombre, ' ', profesionales.apellido_uno, ' ', profesionales.apellido_dos) AS profesional_nombre"),
                                                    'profesionales.rut AS profesional_rut',

                                                    'declaraciones_eno.nombre_establecimiento',
                                                    'declaraciones_eno.codigo_establecimiento',
                                                    'declaraciones_eno.nombre_oficina',
                                                    'declaraciones_eno.codigo_oficina')
                        ->join('pacientes', 'declaraciones_eno.id_paciente', '=', 'pacientes.id')
                        ->join('profesionales', 'declaraciones_eno.id_profesional', '=', 'profesionales.id')
                        ->whereYear('declaraciones_eno.fecha_notificacion', $request->anio)
                        ->whereMonth('declaraciones_eno.fecha_notificacion', $request->mes)
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
                $datos['msj'] = 'Sin registros';
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
    /** FIN ENO */

    public function CargarControlMedicamento()
    {
        return view('direccion_salud.escritorio_control_medicamento')->with([]);
    }
    public function CargarControlFarmacia()
    {
        return view('direccion_salud.escritorio_control_farmacia')->with([]);
    }
}
