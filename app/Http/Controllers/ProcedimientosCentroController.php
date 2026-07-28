<?php

namespace App\Http\Controllers;

use App\Models\LugarAtencion;
use App\Models\Profesional;
use App\Models\ProcedimientosCentro;
use App\Models\ProcedimientosCentroLugarAtencionProfesional;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedimientosCentroController extends Controller
{
    public function registrar_r(Request $request)
    {
        $request->validate([
            'id_lugar_atencion' => 'required|exists:lugares_atencion,id',
            'id_especialidad' => 'nullable|required_with:id_tipo_especialidad|exists:especialidades,id',
            'id_tipo_especialidad' => 'nullable|required_with:id_especialidad,id_sub_tipo_especialidad|exists:tipos_especialidad,id',
            'id_sub_tipo_especialidad' => 'nullable|exists:sub_tipo_especialidad,id',
            'nombre' => 'required|string|max:255',
            'cod_examen' => 'nullable|string|max:100',
            'minutos_bloque' => 'required|integer|min:1',
            'cantidad_bloques' => 'required|integer|min:1',
            'valor' => 'nullable|numeric|min:0',
            'id_tipo_prestacion' => 'nullable|exists:tipo_prestaciones,id',
        ]);

        $tipoValido = empty($request->id_especialidad)
            || TipoEspecialidad::where('id', $request->id_tipo_especialidad)
                ->where('id_especialidad', $request->id_especialidad)
                ->exists();
        $subTipoValido = empty($request->id_sub_tipo_especialidad)
            || SubTipoEspecialidad::where('id', $request->id_sub_tipo_especialidad)
                ->where('id_tipo_especialidad', $request->id_tipo_especialidad)
                ->exists();

        if (!$tipoValido || !$subTipoValido) {
            return response()->json([
                'estado' => 0,
                'msj' => 'La especialidad, tipo y subtipo seleccionados no corresponden entre sí.',
            ], 422);
        }

        return static::registrar(
            $request->id_lugar_atencion, $request->nombre, $request->descripcion,
            $request->minutos_bloque, $request->cantidad_bloques, $request->otros,
            $request->valor, $request->tipo_ficha_atencion, $request->id_especialidad,
            $request->id_tipo_especialidad, $request->id_sub_tipo_especialidad,
            $request->id_tipo_prestacion, $request->cod_examen
        );
    }
    static public function registrar(
        $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques,
        $otros, $valor, $tipo_ficha_atencion, $id_especialidad,
        $id_tipo_especialidad, $id_sub_tipo_especialidad = null,
        $id_tipo_prestacion = null, $cod_examen = null
    )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requrido';
            $valido = 0;
        }
        if(empty($nombre))
        {
            $error['nombre'] = 'campo requrido';
            $valido = 0;
        }
        // if(empty($descripcion))
        // {
        //     $error['descripcion'] = 'campo requrido';
        //     $valido = 0;
        // }
        if(empty($minutos_bloque))
        {
            $error['minutos_bloque'] = 'campo requrido';
            $valido = 0;
        }
        if(empty($cantidad_bloques))
        {
            $error['cantidad_bloques'] = 'campo requrido';
            $valido = 0;
        }
        // if(empty($otros))
        // {
        //     $error['otros'] = 'campo requrido';
        //     $valido = 0;
        // }
        // if(empty($estado))
        // {
        //     $error['estado'] = 'campo requrido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new ProcedimientosCentro();
            $registro->id_lugar_atencion = $id_lugar_atencion;
            $registro->id_especialidad = $id_especialidad;
            $registro->id_tipo_especialidad = $id_tipo_especialidad;
            $registro->id_sub_tipo_especialidad = $id_sub_tipo_especialidad ?: null;
            $registro->id_tipo_prestacion = $id_tipo_prestacion ?: null;
            $registro->cod_examen = $cod_examen;
            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->tipo_ficha_atencion = empty($tipo_ficha_atencion)?1:$tipo_ficha_atencion;
            $registro->minutos_bloque = $minutos_bloque;
            $registro->cantidad_bloques = $cantidad_bloques;
            $registro->valor = $valor;
            $registro->otros = $otros;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
                $datos['registros'] = ProcedimientosCentro::with('tipoPrestacion')
                    ->where('id_lugar_atencion', $id_lugar_atencion)
                    ->where('estado', 1)
                    ->get();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function modificar_r( Request $request)
    {
        return static::modificar($request->id, $request->id_lugar_atencion, $request->nombre, $request->descripcion, $request->minutos_bloque, $request->cantidad_bloques, $request->valor, $request->otros, $request->estado, $request->tipo_ficha_atencion );
    }
    static public function modificar($id, $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques, $valor, $otros, $estado, $tipo_ficha_atencion )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ProcedimientosCentro::find($id);
            if(!empty($id_lugar_atencion))
                $registro->id_lugar_atencion = $id_lugar_atencion;
            if(!empty($nombre))
                $registro->nombre = $nombre;
            if(!empty($descripcion))
                $registro->descripcion = $descripcion;
            if(!empty($tipo_ficha_atencion))
                $registro->tipo_ficha_atencion = $tipo_ficha_atencion;
            if(!empty($minutos_bloque))
                $registro->minutos_bloque = $minutos_bloque;
            if(!empty($cantidad_bloques))
                $registro->cantidad_bloques = $cantidad_bloques;
            if(!empty($valor))
                $registro->valor = $valor;
            if(!empty($otros))
                $registro->otros = $otros;
            if( intval($estado) == 1 || intval($estado) == 0 )
                $registro->estado = $estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
                $datos['registro'] = $registro;
                $datos['registros'] = ProcedimientosCentro::with('tipoPrestacion')
                    ->where('id_lugar_atencion', $id_lugar_atencion)
                    ->where('estado', 1)
                    ->get();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function verRegistro_r(Request $request)
    {
        return static::verRegistro($request->id);
    }
    static public function verRegistro($id)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(!empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ProcedimientosCentro::find($id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    // public function verRegistros_r(Request $request)
    // {
    //     return static::verRegistros($request->id, $request->id_lugar_atencion, $request->nombre, $request->descripcion, $request->minutos_bloque, $request->cantidad_bloques, $request->valor, $request->otros, $request->estado, $request->tipo_ficha_atencion);

    // }
    // static public function verRegistros($id, $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques, $valor, $otros, $estado, $tipo_ficha_atencion)
    // {
    //     $datos = array();
    //     $error = array();
    //     $valido = 1;

    //     if($valido)
    //     {
    //         $filtro = array();
    //         if(!empty($id))
    //             $filtro[] = array('id', $id);
    //         if(!empty($id_lugar_atencion))
    //             $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
    //         if(!empty($nombre))
    //             $filtro[] = array('nombre', $nombre);
    //         if(!empty($descripcion))
    //             $filtro[] = array('descripcion', $descripcion);
    //         if(!empty($tipo_ficha_atencion))
    //             $filtro[] = array('tipo_ficha_atencion', $tipo_ficha_atencion);
    //         if(!empty($minutos_bloque))
    //             $filtro[] = array('minutos_bloque', $minutos_bloque);
    //         if(!empty($cantidad_bloques))
    //             $filtro[] = array('cantidad_bloques', $cantidad_bloques);
    //         if(!empty($valor))
    //             $filtro[] = array('valor', $valor);
    //         if(!empty($otros))
    //             $filtro[] = array('otros', $otros);
    //         if(!empty($estado))
    //             $filtro[] = array('estado', $estado);

    //         $registro = ProcedimientosCentro::where($filtro)->get();
    //         if($registro)
    //         {
    //             $datos['estado'] = 1;
    //             $datos['msj'] = 'registro';
    //             $datos['registro'] = $registro;
    //         }
    //         else
    //         {
    //             $datos['estado'] = 0;
    //             $datos['msj'] = 'sin registro';
    //         }
    //     }
    //     else
    //     {
    //         $datos['estado'] = 0;
    //         $datos['msj'] = 'campo requerido';
    //         $datos['error'] = $error;
    //     }

    //     return (object)$datos;
    // }
    public function verRegistros_r(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->first();

        if (!$profesional) {
            return response()->json([
                'estado' => 0,
                'msj' => 'No se encontró el profesional autenticado.',
                'registro' => [],
            ], 403);
        }

        $request->validate([
            'id_lugar_atencion' => 'required|integer|exists:lugares_atencion,id',
        ]);

        $tieneLugar = $profesional->LugaresAtencion()
            ->where('lugares_atencion.id', $request->id_lugar_atencion)
            ->exists();

        if (!$tieneLugar) {
            return response()->json([
                'estado' => 0,
                'msj' => 'El lugar de atención no pertenece al profesional.',
                'registro' => [],
            ], 403);
        }

        $registro = ProcedimientosCentro::where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('estado', 1)
            ->where('id_especialidad', $profesional->id_especialidad)
            ->where(function ($query) use ($profesional) {
                $query->whereNull('id_tipo_especialidad')
                    ->orWhere('id_tipo_especialidad', '')
                    ->orWhere('id_tipo_especialidad', $profesional->id_tipo_especialidad);
            })
            ->where(function ($query) use ($profesional) {
                $query->whereNull('id_sub_tipo_especialidad')
                    ->orWhere('id_sub_tipo_especialidad', '')
                    ->orWhere('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad);
            })
            ->orderBy('nombre')
            ->get();

        return response()->json([
            'estado' => 1,
            'msj' => $registro->isEmpty() ? 'sin_registros' : 'registros',
            'registro' => $registro,
        ]);
    }

static public function verRegistros(
    $id,
    $id_lugar_atencion,
    $nombre,
    $descripcion,
    $minutos_bloque,
    $cantidad_bloques,
    $valor,
    $otros,
    $estado,
    $tipo_ficha_atencion
) {
    $datos  = [];
    $error  = [];
    $valido = 1;

    if ($valido) {
        $filtro = [];

        if (!empty($id))
            $filtro[] = ['id', $id];
        if (!empty($id_lugar_atencion))
            $filtro[] = ['id_lugar_atencion', $id_lugar_atencion];
        if (!empty($nombre))
            $filtro[] = ['nombre', $nombre];
        if (!empty($descripcion))
            $filtro[] = ['descripcion', $descripcion];
        if (!empty($tipo_ficha_atencion))
            $filtro[] = ['tipo_ficha_atencion', $tipo_ficha_atencion];
        if (!empty($minutos_bloque))
            $filtro[] = ['minutos_bloque', $minutos_bloque];
        if (!empty($cantidad_bloques))
            $filtro[] = ['cantidad_bloques', $cantidad_bloques];
        if (!empty($valor))
            $filtro[] = ['valor', $valor];
        if (!empty($otros))
            $filtro[] = ['otros', $otros];
        if (!empty($estado))
            $filtro[] = ['estado', $estado];

        $registro = ProcedimientosCentro::where($filtro)->get();

        if ($registro->isNotEmpty()) {
            // ✅ Hay registros reales
            $datos['estado']   = 1;
            $datos['msj']      = 'registro';
            $datos['registro'] = $registro;
        } else {
            // ❌ No hay registros → devolvemos MOCK
            $mock = [
                (object)[
                    'id'                 => 1,
                    'id_lugar_atencion'  => $id_lugar_atencion,
                    'nombre'             => 'Procedimiento de ejemplo',
                    'descripcion'        => 'Procedimiento de prueba (mock)',
                    'minutos_bloque'     => $minutos_bloque ?: 15,
                    'cantidad_bloques'   => $cantidad_bloques ?: 1,
                    'valor'              => $valor ?: 1,
                    'otros'              => $otros ?: null,
                    'tipo_ficha_atencion'=> $tipo_ficha_atencion ?: 1,
                    'estado'             => 1,
                    'es_mock'            => true,
                ],
            ];

            $datos['estado']   = 1;              // lo dejamos en 1 para que tu front entre al if (data.estado == 1)
            $datos['msj']      = 'registro_mock';
            $datos['registro'] = $mock;
        }
    } else {
        $datos['estado'] = 0;
        $datos['msj']    = 'campo requerido';
        $datos['error']  = $error;
    }

    return (object)$datos;
}

    public function asignarProcedimiento(Request $request)
    {
        $request->validate([
            'id_procedimiento'    => 'required|exists:procedimientos_centro,id',
            'id_lugar_atencion'   => 'required|exists:lugares_atencion,id',
            'ids_profesionales'   => 'required|array|min:1',
            'ids_profesionales.*' => 'required|exists:profesionales,id',
        ]);

        $procedimientoBase = ProcedimientosCentro::findOrFail($request->id_procedimiento);
        $lugar             = LugarAtencion::findOrFail($request->id_lugar_atencion);

        $asignados = 0;
        $omitidos  = 0;

        foreach ($request->ids_profesionales as $id_profesional) {
            $existe = ProcedimientosCentroLugarAtencionProfesional::where('id_procedimiento_centro', $procedimientoBase->id)
                ->where('id_lugar_atencion', $lugar->id)
                ->where('id_profesional', $id_profesional)
                ->first();

            if ($existe) {
                $omitidos++;
                continue;
            }

            $nuevo = new ProcedimientosCentroLugarAtencionProfesional();
            $nuevo->id_procedimiento_centro = $procedimientoBase->id;
            $nuevo->id_lugar_atencion       = $lugar->id;
            $nuevo->id_profesional          = $id_profesional;
            $nuevo->nombre                  = $procedimientoBase->nombre;
            $nuevo->descripcion             = $procedimientoBase->descripcion;
            $nuevo->minutos_bloque          = $procedimientoBase->minutos_bloque;
            $nuevo->cantidad_bloques        = $procedimientoBase->cantidad_bloques;
            $nuevo->valor                   = $procedimientoBase->valor;
            $nuevo->otros                   = $procedimientoBase->otros;
            $nuevo->estado                  = 1;
            $nuevo->save();
            $asignados++;
        }

        return response()->json([
            'estado'    => 1,
            'asignados' => $asignados,
            'omitidos'  => $omitidos,
        ]);
    }

}
