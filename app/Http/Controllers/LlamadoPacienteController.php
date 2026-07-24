<?php

namespace App\Http\Controllers;

use App\Events\NuevoLlamado;
use App\Models\LlamadoPaciente;
use App\Models\SalaEsperaBox;
use App\Models\Televisor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LlamadoPacienteController extends Controller
{
    public function registrar(Request $request)
    {
        $datos = [];
        $valido = true;
        $error = [];

        // Validaciones básicas
        if (empty($request->id_lugar_atencion)) {
            $error['id_lugar_atencion'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_televisor)) {
            $error['id_televisor'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_box)) {
            $error['id_box'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_paciente)) {
            $error['id_paciente'] = 'Campo requerido';
            $valido = false;
        }

        if ($valido) {
            try {
                $registro = new LlamadoPaciente();
                $registro->id_lugar_atencion = $request->id_lugar_atencion;
                $registro->id_sala_espera = $request->id_sala_espera;
                $registro->id_televisor = $request->id_televisor;
                $registro->id_box = $request->id_box;
                $registro->id_paciente = $request->id_paciente;
                $registro->id_profesional = $request->id_profesional;
                $registro->id_hora_medica = $request->id_hora_medica;
                $registro->id_usuario_llama = $request->id_usuario_llama;
                $registro->cantidad_llamados = $request->cantidad_llamados ?? 0;
                $registro->fecha_llamado = $request->fecha_llamado ?? date('Y-m-d');
                $registro->hora_llamado = $request->hora_llamado ?? date('H:i:s');
                $registro->estado = $request->estado ?? 1;
                if ($registro->save()) {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registro exitoso';
                    $datos['registro'] = $registro;
                } else {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Error al guardar';
                }
            } catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error en el servidor';
                $datos['error'] = $e->getMessage();
            }
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Validación fallida';
            $datos['error'] = $error;
        }
        return response()->json($datos);
    }

    public function verRegistro(Request $request)
    {
        $datos = [];
        $registro = LlamadoPaciente::with([
            'lugarAtencion', 'salaEspera', 'televisor', 'box', 'paciente', 'profesional', 'usuarioLlama'
        ])->find($request->id);

        if ($registro) {
            $datos['estado'] = 1;
            $datos['msj'] = 'Registro encontrado';
            $datos['registro'] = $registro;
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Registro no encontrado';
        }
        return response()->json($datos);
    }

    public function verRegistros(Request $request)
    {
        $datos = [];
        $filtros = [];
        if (!empty($request->id_lugar_atencion))
            $filtros[] = ['id_lugar_atencion', $request->id_lugar_atencion];
        if (!empty($request->id_televisor))
            $filtros[] = ['id_televisor', $request->id_televisor];
        if (!empty($request->id_box))
            $filtros[] = ['id_box', $request->id_box];
        if (!empty($request->id_paciente))
            $filtros[] = ['id_paciente', $request->id_paciente];
        if (!empty($request->id_profesional))
            $filtros[] = ['id_profesional', $request->id_profesional];
        if (!empty($request->id_usuario_llama))
            $filtros[] = ['id_usuario_llama', $request->id_usuario_llama];
        if (!empty($request->estado))
            $filtros[] = ['estado', $request->estado];

        $registros = LlamadoPaciente::with([
            'lugarAtencion', 'salaEspera', 'televisor', 'box', 'paciente', 'profesional', 'usuarioLlama'
        ])->where($filtros)->get();

        if ($registros->count() > 0) {
            $datos['estado'] = 1;
            $datos['msj'] = 'Registros encontrados';
            $datos['registros'] = $registros;
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'No hay registros disponibles';
        }
        return response()->json($datos);
    }

    public function modificar(Request $request)
    {
        $datos = [];
        $registro = LlamadoPaciente::find($request->id);
        if ($registro) {
            try {
                $registro->id_lugar_atencion = $request->id_lugar_atencion ?? $registro->id_lugar_atencion;
                $registro->id_sala_espera = $request->id_sala_espera ?? $registro->id_sala_espera;
                $registro->id_televisor = $request->id_televisor ?? $registro->id_televisor;
                $registro->id_box = $request->id_box ?? $registro->id_box;
                $registro->id_paciente = $request->id_paciente ?? $registro->id_paciente;
                $registro->id_profesional = $request->id_profesional ?? $registro->id_profesional;
                $registro->id_hora_medica = $request->id_hora_medica ?? $registro->id_hora_medica;
                $registro->id_usuario_llama = $request->id_usuario_llama ?? $registro->id_usuario_llama;
                $registro->cantidad_llamados = $request->cantidad_llamados ?? $registro->cantidad_llamados;
                $registro->fecha_llamado = $request->fecha_llamado ?? $registro->fecha_llamado;
                $registro->hora_llamado = $request->hora_llamado ?? $registro->hora_llamado;
                $registro->estado = $request->estado ?? $registro->estado;
                if ($registro->save()) {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Actualización exitosa';
                    $datos['registro'] = $registro;
                } else {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Error al actualizar';
                }
            } catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error en el servidor';
                $datos['error'] = $e->getMessage();
            }
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Registro no encontrado';
        }
        return response()->json($datos);
    }


    public function llamarPaciente(Request $request)
    {
        $datos = [];
        $valido = true;
        $error = [];

        // Validaciones básicas
        if (empty($request->id_box)) {
            $error['id_box'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_profesional)) {
            $error['id_profesional'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_paciente)) {
            $error['id_paciente'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_lugar_atencion)) {
            $error['id_lugar_atencion'] = 'Campo requerido';
            $valido = false;
        }
        if (empty($request->id_hora_medica)) {
            $error['id_hora_medica'] = 'Campo requerido';
            $valido = false;
        }

        if ($valido) {
            // Buscar sala_espera y televisor relacionados al box y lugar de atención
            $id_sala_espera = null;
            $id_televisor = null;

            // Buscar sala_espera_box
            $salaEsperaBox = SalaEsperaBox::join('sala_espera', 'sala_espera_box.id_sala_espera', '=', 'sala_espera.id')
                ->where('sala_espera_box.id_box', $request->id_box)
                ->where('sala_espera.id_lugar_atencion', $request->id_lugar_atencion)
                ->where('sala_espera.estado', 1)
                ->where('sala_espera_box.estado', 1)
                ->select('sala_espera_box.id_sala_espera')
                ->first();

            if ($salaEsperaBox) {
                $id_sala_espera = $salaEsperaBox->id_sala_espera;
            }

            // Buscar televisor asociado a la sala de espera y lugar de atención
            if ($id_sala_espera) {
                $televisor = Televisor::where('id_sala_espera', $id_sala_espera)
                    ->where('id_lugar_atencion', $request->id_lugar_atencion)
                    ->where('estado', 1)
                    ->first();
                if ($televisor) {
                    $id_televisor = $televisor->id;
                }
            }

            if (!$id_sala_espera || !$id_televisor) {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontró sala de espera o televisor asociado al box y lugar de atención.';
                return response()->json($datos);
            }

            // Buscar si ya existe un llamado activo con los mismos datos clave
            try {
                $registro = LlamadoPaciente::where('id_lugar_atencion', $request->id_lugar_atencion)
                    ->where('id_sala_espera', $id_sala_espera)
                    ->where('id_televisor', $id_televisor)
                    ->where('id_box', $request->id_box)
                    ->where('id_paciente', $request->id_paciente)
                    ->where('id_profesional', $request->id_profesional)
                    ->where('id_hora_medica', $request->id_hora_medica)
                    ->first();

                if ($registro) {
                    // Si existe, solo actualiza cantidad_llamados, id_usuario_llama y updated_at
                    $registro->cantidad_llamados = $registro->cantidad_llamados + 1;
                    $registro->id_usuario_llama = Auth::user()->id;
                    $registro->updated_at = now();
                    if ($registro->save()) {

                        // 1. Obtener datos completos del llamado
                        $llamadoCompleto = LlamadoPaciente::with(['paciente', 'box'])
                            ->find($registro->id);

                        // 2. Transformar para la pantalla
                        $llamadoPantalla = [
                            'id' => $llamadoCompleto->id,
                            'cantidad_llamados' => $llamadoCompleto->cantidad_llamados,
                            'nombre_paciente' => $llamadoCompleto->paciente->nombre_completo,
                            'nombre_box' => $llamadoCompleto->box->nombre,
                            'hora_llamado' => $llamadoCompleto->hora_llamado,
                        ];

                        // 3. Disparar evento de broadcasting
                        broadcast(new NuevoLlamado($llamadoPantalla, $id_televisor))->toOthers();
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Llamado actualizado correctamente';
                        $datos['registro'] = $registro;
                    } else {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Error al actualizar el llamado';
                    }
                } else {
                    // Si no existe, crea uno nuevo
                    $registro = new LlamadoPaciente();
                    $registro->id_lugar_atencion = $request->id_lugar_atencion;
                    $registro->id_sala_espera = $id_sala_espera;
                    $registro->id_televisor = $id_televisor;
                    $registro->id_box = $request->id_box;
                    $registro->id_paciente = $request->id_paciente;
                    $registro->id_profesional = $request->id_profesional;
                    $registro->id_hora_medica = $request->id_hora_medica;
                    $registro->id_usuario_llama = Auth::user()->id;
                    $registro->cantidad_llamados = 1;
                    $registro->fecha_llamado = date('Y-m-d');
                    $registro->hora_llamado = date('H:i:s');
                    $registro->estado = 1;
                    if ($registro->save()) {
                        // 1. Obtener datos completos del llamado
                        $llamadoCompleto = LlamadoPaciente::with(['paciente', 'box'])
                            ->find($registro->id);

                        // 2. Transformar para la pantalla
                        $llamadoPantalla = [
                            'id' => $llamadoCompleto->id,
                            'cantidad_llamados' => $llamadoCompleto->cantidad_llamados,
                            'nombre_paciente' => $llamadoCompleto->paciente->nombre_completo,
                            'nombre_box' => $llamadoCompleto->box->nombre,
                            'hora_llamado' => $llamadoCompleto->hora_llamado,
                        ];

                        // 3. Disparar evento de broadcasting
                        broadcast(new NuevoLlamado($llamadoPantalla, $id_televisor))->toOthers();

                        $datos['estado'] = 1;
                        $datos['msj'] = 'Llamado registrado correctamente';
                        $datos['registro'] = $registro;
                    } else {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Error al guardar el llamado';
                    }
                }
            } catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error en el servidor';
                $datos['error'] = $e->getMessage();
            }
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Validación fallida';
            $datos['error'] = $error;
        }
        return response()->json($datos);
    }

    public function getLlamadosPorTelevisor($idTelevisor)
    {
        $televisor = Televisor::find($idTelevisor);
        $hoy = Carbon::now()->format('Y-m-d');

        $llamados = LlamadoPaciente::with(['paciente', 'box'])
            ->where('id_televisor', $idTelevisor)
            ->where('estado', 1)
            ->where('fecha_llamado', $hoy)
            ->orderBy('updated_at', 'desc')
            ->limit($televisor->cantidad)
            ->get()
            ->map(function ($llamado) {
                $minutos = Carbon::parse($llamado->hora_llamado)->diffInMinutes(now());
                return [
                    'id' => $llamado->id,
                    'minutos' => $minutos,
                    'cantidad_llamados' => $llamado->cantidad_llamados,
                    'nombre_paciente' => mb_strtoupper($llamado->paciente->nombres . ' ' . $llamado->paciente->apellido_uno),
                    'nombre_box' => $llamado->box->numero_box,
                    'hora_llamado' => $llamado->hora_llamado,
                ];
            });

        return response()->json([
            'turnos' => $llamados
        ]);
    }
}
