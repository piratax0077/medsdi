<?php

namespace App\Http\Controllers;

use App\Models\HoraMedica;
use App\Models\Bono;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HoraMedicaController extends Controller
{
    public function verHorasMedicas(Request $request)
    {
        try {
            /*
            * Consulta base.
            *
            * Aquí se agregan todos los filtros que deben aplicarse tanto:
            * - a los registros visibles;
            * - como a la búsqueda de la próxima hora médica.
            */
            $queryBase = HoraMedica::query();

            if ($request->filled('id_ficha_atencion')) {
                $queryBase->where(
                    'id_ficha_atencion',
                    $request->id_ficha_atencion
                );
            }

            if ($request->filled('id_profesional')) {
                $queryBase->where(
                    'id_profesional',
                    $request->id_profesional
                );
            }

            if ($request->filled('id_lugar_atencion')) {
                $queryBase->where(
                    'id_lugar_atencion',
                    $request->id_lugar_atencion
                );
            }

            if ($request->filled('id_asistente')) {
                $queryBase->where(
                    'id_asistente',
                    $request->id_asistente
                );
            }

            if ($request->filled('id_paciente')) {
                $queryBase->where(
                    'id_paciente',
                    $request->id_paciente
                );
            }

            if ($request->filled('id_estado')) {
                $queryBase->where(
                    'id_estado',
                    $request->id_estado
                );
            }

            if ($request->filled('id_box')) {
                $queryBase->where(
                    'id_box',
                    $request->id_box
                );
            }

            /*
            * Estados que pueden mostrarse en la agenda.
            */
            $estadosAgenda = [
                1,  // Reservada
                2,  // Confirmada
                4,  // Espera
                5,  // Realizando
                6,  // Realizada
                7,  // Inasistida
                8,  // Llamando
                9,  // Examen realizado sin resultado
                10, // Examen realizado con resultado
                11, // Examen transcrito
                12, // Examen finalizado
                13, // Bloqueo por profesional
                16  // Pre reserva
            ];

            $queryBase->whereIn('id_estado', $estadosAgenda);

            /*
            * Consulta para obtener los registros del rango visible.
            */
            $queryRegistros = clone $queryBase;

            /*
            * Filtro por una fecha específica.
            */
            if ($request->filled('fecha_consulta')) {
                $queryRegistros->whereDate(
                    'fecha_consulta',
                    $request->fecha_consulta
                );
            }

            /*
            * FullCalendar entrega la fecha final como límite exclusivo.
            */
            if (
                $request->filled('fecha_inicio') &&
                $request->filled('fecha_termino')
            ) {
                $fechaInicio = Carbon::parse(
                    $request->fecha_inicio
                )->toDateString();

                $fechaTermino = Carbon::parse(
                    $request->fecha_termino
                )->toDateString();

                $queryRegistros
                    ->whereDate(
                        'fecha_consulta',
                        '>=',
                        $fechaInicio
                    )
                    ->whereDate(
                        'fecha_consulta',
                        '<',
                        $fechaTermino
                    );
            }

            $registros = $queryRegistros
                ->with([
                    'Estado',
                    'Paciente' => function ($pacienteQuery) {
                        $pacienteQuery
                            ->select(
                                'id',
                                'id_prevision',
                                'rut'
                            )
                            ->with([
                                'Prevision' => function ($previsionQuery) {
                                    $previsionQuery->select(
                                        'id',
                                        'nombre'
                                    );
                                }
                            ]);
                    }
                ])
                ->orderBy('fecha_consulta')
                ->orderBy('hora_inicio')
                ->get();

            /*
            * Buscar la próxima fecha con horas médicas desde hoy.
            *
            * Esta consulta no utiliza el rango visible del calendario,
            * porque la próxima hora puede estar en la semana siguiente.
            */
            $proximaHora = (clone $queryBase)
                ->whereDate(
                    'fecha_consulta',
                    '>=',
                    Carbon::today()->toDateString()
                )
                ->orderBy('fecha_consulta')
                ->orderBy('hora_inicio')
                ->first([
                    'id',
                    'fecha_consulta',
                    'hora_inicio'
                ]);

            return response()->json([
                'estado' => 1,
                'registros' => $registros,
                'proxima_fecha' => $proximaHora
                    ? Carbon::parse($proximaHora->fecha_consulta)->toDateString()
                    : null,
                'proxima_hora' => $proximaHora
                    ? $proximaHora->hora_inicio
                    : null,
                'msj' => $registros->isEmpty()
                    ? 'sin registros en el rango visible'
                    : 'registros encontrados'
            ]);
        } catch (\Throwable $e) {
            Log::error('Error al cargar horas médicas', [
                'mensaje' => $e->getMessage(),
                'archivo' => $e->getFile(),
                'linea' => $e->getLine(),
                'request' => $request->all()
            ]);

            return response()->json([
                'estado' => 0,
                'registros' => [],
                'proxima_fecha' => null,
                'proxima_hora' => null,
                'msj' => 'No fue posible cargar las horas médicas.'
            ], 500);
        }
    }

    public function verRegistrosDia(Request $request)
    {
        $datos = array();
        $filtro= array();

        if(!empty($request->fecha_consulta))
        {
            $filtro[] = array('fecha_consulta',$request->fecha_consulta);
        }
        if(!empty($request->id_ficha_atencion))
        {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }

        // Para laboratorio: filtrar por id_box si viene en el request
        if(!empty($request->id_box))
        {
            $filtro[] = array('id_box',$request->id_box);
        }
        // Para agendas normales: filtrar por id_profesional
        else if(!empty($request->id_profesional))
        {
            $filtro[] = array('id_profesional',$request->id_profesional);
        }

        if(!empty($request->id_lugar_atencion))
        {
            $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
        }

        // # ESTADO HORA ATENCION
        // 1. RESERVADA
        // 2. CONFIRMADO
        // 4. ESPERA
        // 5. REALIZANDO
        // 8. LLAMANDO
        // 16. PRERESERVA

        $registros = HoraMedica::where($filtro)
                                ->whereIn('id_estado',[1,2,4,5,8,16])
                                ->with('Estado')
                                ->with(['Paciente'=> function($query){
                                    $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut')
                                            ->with(['Prevision'=>function($query2){
                                                        $query2->select('id','nombre');
                                    }]);
                                }])
                                ->get();
        if(count($registros)>0)
        {
            try {
                foreach($registros as $r){
                    if($r->estado->id !== 2){
                        $bono = Bono::where('id_referencia',$r->id)->first();
                        $r->dato = $bono ? $bono : null;
                    }
                }
            } catch (\Exception $e) {
                //throw $th;
                return $e->getMessage();
            }

            $datos['estado'] = 1;
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

}
