<?php

namespace App\Http\Controllers;

use App\Models\LugarAtencion;
use App\Models\ProcedimientosCentro;
use App\Models\ProcedimientosCentroLugarAtencionProfesional;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedimientosProfesionalController extends Controller
{
    /**
     * Pantalla principal de mis procedimientos.
     */
    public function index()
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->firstOrFail();

        $lugares = $profesional->LugaresAtencion()->get();

        $procedimientos = ProcedimientosCentroLugarAtencionProfesional::select(
                'procedimientos_lugar_atencion_profesional.*',
                'lugares_atencion.nombre as lugar_nombre',
                'procedimientos_centro.nombre as procedimiento_base'
            )
            ->leftJoin('lugares_atencion', 'procedimientos_lugar_atencion_profesional.id_lugar_atencion', '=', 'lugares_atencion.id')
            ->leftJoin('procedimientos_centro', 'procedimientos_lugar_atencion_profesional.id_procedimiento_centro', '=', 'procedimientos_centro.id')
            ->where('procedimientos_lugar_atencion_profesional.id_profesional', $profesional->id)
            ->get();

        return view('app.profesional.mis_procedimientos', [
            'profesional' => $profesional,
            'lugares' => $lugares,
            'procedimientos' => $procedimientos,
        ]);
    }

    /**
     * Actualizar un procedimiento propio (por ejemplo, para cambiar minutos o cantidad de bloques).
     */
    public function update(Request $request, ProcedimientosCentroLugarAtencionProfesional $procedimiento){
        $profesional = Profesional::where('id_usuario', Auth::id())->firstOrFail();

        if ($procedimiento->id_profesional !== $profesional->id) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No tienes permisos para actualizar este procedimiento.',
            ], 403);
        }

        $request->validate([
            'minutos_bloque' => 'required|integer|min:1',
            'cantidad_bloques' => 'required|integer|min:1',
            'otros' => 'nullable|string',
        ]);

        $procedimiento->minutos_bloque = $request->minutos_bloque;
        $procedimiento->cantidad_bloques = $request->cantidad_bloques;
        $procedimiento->otros = $request->otros;
        $procedimiento->save();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Procedimiento actualizado con éxito.',
            'procedimiento' => $procedimiento,
        ]);
    }

    /**
     * Registrar un nuevo procedimiento propio en un lugar de atención.
     */
    public function store(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->firstOrFail();

        $request->validate([
            'id_lugar_atencion' => 'required|exists:lugares_atencion,id',
            'id_procedimiento_centro' => 'required|exists:procedimientos_centro,id',
            'minutos_bloque' => 'required|integer|min:1',
            'cantidad_bloques' => 'required|integer|min:1',
            'otros' => 'nullable|string',
        ]);

        $existe = ProcedimientosCentroLugarAtencionProfesional::where('id_profesional', $profesional->id)
            ->where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('id_procedimiento_centro', $request->id_procedimiento_centro)
            ->first();

        if ($existe) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'El procedimiento ya existe en este lugar de atención.',
            ], 422);
        }

        $procedimientoBase = ProcedimientosCentro::find($request->id_procedimiento_centro);
        $lugar = LugarAtencion::find($request->id_lugar_atencion);

        $nuevo = new ProcedimientosCentroLugarAtencionProfesional();
        $nuevo->id_procedimiento_centro = $procedimientoBase->id;
        $nuevo->id_lugar_atencion = $lugar->id;
        $nuevo->id_profesional = $profesional->id;
        $nuevo->nombre = $procedimientoBase->nombre;
        $nuevo->descripcion = $procedimientoBase->descripcion;
        $nuevo->minutos_bloque = $request->minutos_bloque;
        $nuevo->cantidad_bloques = $request->cantidad_bloques;
        $nuevo->otros = $request->otros;
        $nuevo->estado = 1;
        $nuevo->save();

        $nuevo->lugar_nombre = $lugar->nombre;
        $nuevo->procedimiento_base = $procedimientoBase->nombre;

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Procedimiento registrado con éxito.',
            'procedimiento' => $nuevo,
        ]);
    }

    /**
     * Eliminar (desactivar) un procedimiento propio.
     */
    public function destroy(ProcedimientosCentroLugarAtencionProfesional $procedimiento)
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->firstOrFail();

        if ($procedimiento->id_profesional !== $profesional->id) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No tienes permisos para eliminar este procedimiento.',
            ], 403);
        }

        $procedimiento->delete();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Procedimiento eliminado.',
        ]);
    }

    /**
     * Activar o desactivar un procedimiento propio.
     */
    public function toggleEstado(ProcedimientosCentroLugarAtencionProfesional $procedimiento)
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->firstOrFail();

        if ($procedimiento->id_profesional !== $profesional->id) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No tienes permisos para modificar este procedimiento.',
            ], 403);
        }

        $procedimiento->estado = $procedimiento->estado == 1 ? 0 : 1;
        $procedimiento->save();

        return response()->json([
            'estado'    => 1,
            'nuevo_estado' => $procedimiento->estado,
            'mensaje'   => $procedimiento->estado == 1 ? 'Procedimiento activado.' : 'Procedimiento desactivado.',
        ]);
    }
}
