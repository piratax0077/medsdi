<?php

namespace App\Http\Controllers;

use App\Models\LugarAtencion;
use App\Models\Profesional;
use App\Models\ProcedimientosCentro;
use App\Models\ProcedimientosCentroLugarAtencionProfesional;
use Illuminate\Http\Request;

class ProcedimientosCentroController extends Controller
{
    public function registrar_r(Request $request)
    {
        return static::registrar( $request->id_lugar_atencion, $request->nombre, $request->descripcion, $request->minutos_bloque, $request->cantidad_bloques, $request->otros, $request->valor, $request->tipo_ficha_atencion );
    }
    static public function registrar( $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques, $otros, $valor, $tipo_ficha_atencion )
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
                $datos['registros'] = ProcedimientosCentro::where('id_lugar_atencion', $id_lugar_atencion)->where('estado', 1)->get();
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
                $datos['registros'] = ProcedimientosCentro::where('id_lugar_atencion', $id_lugar_atencion)->where('estado', 1)->get();
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
    // puedes filtrar sólo por lugar de atención y estado activo
    $resp = static::verRegistros(
        $request->id,
        $request->id_lugar_atencion,
        $request->nombre,
        $request->descripcion,
        $request->minutos_bloque,
        $request->cantidad_bloques,
        $request->valor,
        $request->otros,
        $request->estado,
        $request->tipo_ficha_atencion
    );

    // devolver JSON “bonito” para tu $.ajax
    return response()->json($resp);
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
