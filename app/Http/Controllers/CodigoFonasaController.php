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
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->valor))
        {
            $error['valor'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('nombre', 'like', '%'.$request->valor.'%');
            $registros_a = CodigoFonasa::select('id', 'nombre as nombre', 'codigo as codigo')->where($filtro);

            $filtro_2 = array();
            $filtro_2[] = array('nombre_examen', 'like', '%'.$request->valor.'%');
            $registros_b = ExamenMedico::select('id', 'nombre_examen as nombre', 'codigo as codigo')->where($filtro_2);

            $registros = $registros_a->union($registros_b)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registros;
                $datos['cantidad'] = $registros->count();
                $datos['msj'] = 'Registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
            $datos['msj'] = 'Campo requerido';
        }

        return $datos;
    }

    public function buscarPorNombreAutocomplete(Request $request)
    {
        $search = $request->search;
        if ($search == '')
        {
            $registros = CodigoFonasa::orderby('nombre', 'asc')->select('id', 'nombre', 'codigo')->limit(15)->get();
        }
        else
        {
            $registros = CodigoFonasa::orderby('nombre', 'asc')->select('id', 'nombre','codigo')->where('nombre', 'like', '%'.$search.'%')->limit(15)->get();
        }

        $response = array();
        foreach ($registros as $registro)
        {
            $response[] = array("value" => $registro->id, "label" => $registro->codigo.' - '.$registro->nombre, "codigo" => $registro->codigo);
        }
        return response()->json($response);
    }
}
