<?php

namespace App\Http\Controllers;

use App\Models\CodigoFonasa;
use App\Models\ExamenMedico;
use Illuminate\Http\Request;

class CodigoFonasaController extends Controller
{
    public function buscarPorCodigo(Request $request)
    {
        $datos = [];
        $error = [];
        $valido = 1;

        if (empty($request->valor)) {
            $error['valor'] = 'campo requerido';
            $valido = 0;
        }

        if ($valido == 0) {
            return response()->json([
                'estado' => 0,
                'error' => $error,
                'msj' => 'Campo requerido'
            ]);
        }

        $valor = trim($request->valor);

        $registrosFonasa = CodigoFonasa::select(
                'id',
                'nombre',
                'codigo'
            )
            ->where('codigo', 'like', '%' . $valor . '%')
            ->addSelect(\DB::raw("'codigo_fonasa' as origen"));

        $registrosExamenes = ExamenMedico::select(
                'id',
                'nombre_examen as nombre',
                'codigo'
            )
            ->where('codigo', 'like', '%' . $valor . '%')
            ->addSelect(\DB::raw("'examen_medico' as origen"));

        $registros = $registrosFonasa
            ->union($registrosExamenes)
            ->limit(30)
            ->get();

        return response()->json([
            'estado' => 1,
            'registros' => $registros,
            'cantidad' => $registros->count(),
            'msj' => $registros->count() > 0 ? 'Registros encontrados' : 'Registro no encontrado'
        ]);
    }

    public function buscarPorNombre(Request $request)
    {
        $valor = trim((string) $request->valor);

        if ($valor === '') {
            return response()->json([
                'estado' => 0,
                'error' => ['valor' => 'campo requerido'],
                'msj' => 'Campo requerido',
            ]);
        }

        $registrosFonasa = CodigoFonasa::select('id', 'nombre', 'codigo')
            ->where(function ($query) use ($valor) {
                $query->where('nombre', 'like', '%'.$valor.'%')
                    ->orWhere('codigo', 'like', '%'.$valor.'%');
            })
            ->addSelect(\DB::raw("'codigo_fonasa' as origen"));

        $registrosExamenes = ExamenMedico::select('id', 'nombre_examen as nombre', 'codigo')
            ->where(function ($query) use ($valor) {
                $query->where('nombre_examen', 'like', '%'.$valor.'%')
                    ->orWhere('codigo', 'like', '%'.$valor.'%');
            })
            ->addSelect(\DB::raw("'examen_medico' as origen"));

        $registros = $registrosFonasa->union($registrosExamenes)->limit(30)->get();

        return response()->json([
            'estado' => 1,
            'registros' => $registros,
            'cantidad' => $registros->count(),
            'msj' => $registros->isEmpty() ? 'Registro no encontrado' : 'Registros encontrados',
        ]);
    }

    public function buscarPorNombreAutocomplete(Request $request)
    {
        $search = trim((string) $request->search);
        if (mb_strlen($search) < 2) {
            return response()->json([]);
        }

        $registrosFonasa = CodigoFonasa::select('id', 'nombre', 'codigo')
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'like', '%'.$search.'%')
                    ->orWhere('codigo', 'like', '%'.$search.'%');
            })
            ->orderBy('nombre')
            ->limit(15)
            ->get();

        $registrosExamenes = ExamenMedico::select('id', 'nombre_examen as nombre', 'codigo')
            ->where(function ($query) use ($search) {
                $query->where('nombre_examen', 'like', '%'.$search.'%')
                    ->orWhere('codigo', 'like', '%'.$search.'%');
            })
            ->orderBy('nombre_examen')
            ->limit(15)
            ->get();

        $registros = $registrosFonasa
            ->map(function ($registro) {
                $registro->origen = 'codigo_fonasa';
                return $registro;
            })
            ->concat($registrosExamenes->map(function ($registro) {
                $registro->origen = 'examen_medico';
                return $registro;
            }))
            ->sortBy('nombre')
            ->take(15);

        $response = array();
        foreach ($registros as $registro)
        {
            $response[] = [
                'value' => $registro->id,
                'label' => $registro->codigo.' - '.$registro->nombre,
                'codigo' => $registro->codigo,
                'nombre' => $registro->nombre,
                'origen' => $registro->origen,
            ];
        }
        return response()->json($response);
    }
}
