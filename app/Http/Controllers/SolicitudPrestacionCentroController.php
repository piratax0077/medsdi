<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Instituciones;
use App\Models\ProcedimientosCentro;
use App\Models\ProcedimientosCentroLugarAtencionProfesional;
use App\Models\Profesional;
use App\Models\Servicios;
use App\Models\SolicitudPrestacionCentro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudPrestacionCentroController extends Controller
{
    public function store(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->firstOrFail();

        $request->validate([
            'id_lugar_atencion' => 'required|exists:lugares_atencion,id',
            'id_tipo_prestacion' => 'required|exists:tipo_prestaciones,id',
            'cod_examen' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'minutos_bloque' => 'required|integer|min:1',
            'cantidad_bloques' => 'required|integer|min:1',
            'valor_profesional' => 'required|numeric|min:0|max:9999999999.99',
            'valor_centro_propuesto' => 'nullable|numeric|min:0|max:9999999999.99',
            'observacion_profesional' => 'nullable|string',
        ]);

        if (!$profesional->LugaresAtencion()->where('lugares_atencion.id', $request->id_lugar_atencion)->exists()) {
            return response()->json(['estado' => 0, 'mensaje' => 'No perteneces al lugar de atención seleccionado.'], 403);
        }

        $duplicada = SolicitudPrestacionCentro::where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('id_profesional', $profesional->id)
            ->where('estado', 'PENDIENTE')
            ->where(function ($query) use ($request) {
                $query->where('cod_examen', $request->cod_examen)
                    ->orWhere('nombre', $request->nombre);
            })->exists();

        if ($duplicada) {
            return response()->json(['estado' => 0, 'mensaje' => 'Ya tienes una solicitud pendiente con ese código o nombre.'], 422);
        }

        $solicitud = SolicitudPrestacionCentro::create([
            'id_lugar_atencion' => $request->id_lugar_atencion,
            'id_profesional' => $profesional->id,
            'id_tipo_prestacion' => $request->id_tipo_prestacion,
            'id_especialidad' => $profesional->id_especialidad,
            'id_tipo_especialidad' => $profesional->id_tipo_especialidad ?: null,
            'id_sub_tipo_especialidad' => $profesional->id_sub_tipo_especialidad ?: null,
            'cod_examen' => trim($request->cod_examen),
            'nombre' => trim($request->nombre),
            'descripcion' => $request->descripcion,
            'minutos_bloque' => $request->minutos_bloque,
            'cantidad_bloques' => $request->cantidad_bloques,
            'valor_profesional' => $request->valor_profesional,
            'valor_centro_propuesto' => $request->valor_centro_propuesto,
            'observacion_profesional' => $request->observacion_profesional,
            'estado' => 'PENDIENTE',
        ]);

        return response()->json(['estado' => 1, 'mensaje' => 'Solicitud enviada a la administración del centro.', 'solicitud' => $solicitud]);
    }

    public function aprobar(Request $request, SolicitudPrestacionCentro $solicitud)
    {
        $this->autorizarAdministrador($solicitud);
        $request->validate([
            'valor_centro' => 'required|numeric|min:0|max:9999999999.99',
            'observacion_administrador' => 'nullable|string',
        ]);

        if ($solicitud->estado !== 'PENDIENTE') {
            return response()->json(['estado' => 0, 'mensaje' => 'La solicitud ya fue resuelta.'], 422);
        }

        DB::transaction(function () use ($request, $solicitud) {
            $procedimiento = ProcedimientosCentro::create([
                'id_lugar_atencion' => $solicitud->id_lugar_atencion,
                'id_especialidad' => $solicitud->id_especialidad,
                'id_tipo_especialidad' => $solicitud->id_tipo_especialidad,
                'id_sub_tipo_especialidad' => $solicitud->id_sub_tipo_especialidad,
                'id_tipo_prestacion' => $solicitud->id_tipo_prestacion,
                'cod_examen' => $solicitud->cod_examen,
                'tipo_ficha_atencion' => 1,
                'nombre' => $solicitud->nombre,
                'descripcion' => $solicitud->descripcion,
                'minutos_bloque' => $solicitud->minutos_bloque,
                'cantidad_bloques' => $solicitud->cantidad_bloques,
                'valor' => $request->valor_centro,
                'otros' => $solicitud->observacion_profesional,
                'estado' => 1,
            ]);

            ProcedimientosCentroLugarAtencionProfesional::firstOrCreate(
                [
                    'id_procedimiento_centro' => $procedimiento->id,
                    'id_lugar_atencion' => $solicitud->id_lugar_atencion,
                    'id_profesional' => $solicitud->id_profesional,
                ],
                [
                    'nombre' => $procedimiento->nombre,
                    'descripcion' => $procedimiento->descripcion,
                    'minutos_bloque' => $procedimiento->minutos_bloque,
                    'cantidad_bloques' => $procedimiento->cantidad_bloques,
                    'valor' => $solicitud->valor_profesional,
                    'otros' => $solicitud->observacion_profesional,
                    'estado' => 1,
                ]
            );

            $solicitud->update([
                'estado' => 'APROBADA',
                'valor_centro_propuesto' => $request->valor_centro,
                'observacion_administrador' => $request->observacion_administrador,
                'id_procedimiento_centro' => $procedimiento->id,
                'id_usuario_resuelve' => Auth::id(),
                'fecha_resolucion' => now(),
            ]);
        });

        return response()->json(['estado' => 1, 'mensaje' => 'Solicitud aprobada y prestación creada.']);
    }

    public function rechazar(Request $request, SolicitudPrestacionCentro $solicitud)
    {
        $this->autorizarAdministrador($solicitud);
        $request->validate(['observacion_administrador' => 'required|string']);

        if ($solicitud->estado !== 'PENDIENTE') {
            return response()->json(['estado' => 0, 'mensaje' => 'La solicitud ya fue resuelta.'], 422);
        }

        $solicitud->update([
            'estado' => 'RECHAZADA',
            'observacion_administrador' => $request->observacion_administrador,
            'id_usuario_resuelve' => Auth::id(),
            'fecha_resolucion' => now(),
        ]);

        return response()->json(['estado' => 1, 'mensaje' => 'Solicitud rechazada.']);
    }

    private function autorizarAdministrador(SolicitudPrestacionCentro $solicitud): void
    {
        if (Auth::id() === 3) {
            return;
        }

        $responsables = AdminInstServ::where('id_admin', Auth::id())->pluck('id');
        $administra = Instituciones::where('id_lugar_atencion', $solicitud->id_lugar_atencion)
                ->where(function ($query) use ($responsables) {
                    $query->where('id_usuario', Auth::id())->orWhereIn('id_responsable', $responsables);
                })->exists()
            || Servicios::where('id_lugar_atencion', $solicitud->id_lugar_atencion)
                ->where(function ($query) use ($responsables) {
                    $query->where('id_usuario', Auth::id())->orWhereIn('id_responsable', $responsables);
                })->exists();

        abort_unless($administra, 403, 'No tienes permisos para resolver esta solicitud.');
    }
}
