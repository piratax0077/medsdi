<?php

namespace App\Http\Controllers;

use App\Models\UrgenciaReceta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrgenciaRecetaController extends Controller
{
    /** ver registros API */
    public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id_urgencia,
                                    $request->id_tipo_control,
                                    $request->id_articulo,
                                    $request->articulo,
                                    $request->id_presentacion,
                                    $request->presentacion,
                                    $request->id_posologia,
                                    $request->posologia,
                                    $request->id_via_administracion,
                                    $request->via_administracion,
                                    $request->fecha_registro,
                                    $request->hora_registro);
    }

    /** ver registros */
    /**
     * consulta de registros de reta por atencion
     * @param id_urgencia integer - ID URGENCIA - REQUERIDO
     * @param id_tipo_control integer - ID TIPO CONTROL - OPCIONAL
     * @param id_articulo integer - ID ARTICULO - OPCIONAL
     * @param articulo string - NOMBRE ARTICULO - OPCIONAL
     * @param id_presentacion integer - ID PRESENTACION - OPCIONAL
     * @param presentacion string - NOMBRE PRESENTACION - OPCIONAL
     * @param id_posologia integer - ID POSOLOGIA - OPCIONAL
     * @param posologia string - NOMBRE POSOLOGIA -OPCIONAL
     * @param id_via_administracion integer - ID VIA ADMINISTRACION - OPCIONAL
     * @param via_administracion string - NOMBRE VIA ADMINSION -OPCIONAL
     * @param fecha_registro date - fecha registro (Y-m-d) - OPCIONAL
     * @param hora_registro time - hora registro (H:i:s) - OPCIONAL
     * @param estado int - estado - OPCIONAL
     * @return object
     */
    static public function verRegistros($id_urgencia,  $id_tipo_control = '', $id_articulo = '', $articulo = '', $id_presentacion = '', $presentacion = '', $id_posologia = '', $posologia = '', $id_via_administracion = '', $via_administracion = '', $id_usuario = '', $fecha_registro = '', $hora_registro = '', $estado = '')
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_urgencia))
        {
            $error['ID URGENCIA'] = 'campo requediro';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            if( !empty($id_urgencia))
            {
                $filtro[] = array('id_urgencia', $id_urgencia);
            }
            if( !empty($id_tipo_control))
            {
                $filtro[] = array('id_tipo_control', $id_tipo_control);
            }
            if( !empty($id_articulo))
            {
                $filtro[] = array('id_articulo', $id_articulo);
            }
            if( !empty($articulo))
            {
                $filtro[] = array('articulo', 'like', $articulo.'%');
            }
            if( !empty($id_presentacion))
            {
                $filtro[] = array('id_presentacion', $id_presentacion);
            }
            if( !empty($presentacion))
            {
                $filtro[] = array('presentacion', 'like', $presentacion.'%');
            }
            if( !empty($id_posologia))
            {
                $filtro[] = array('id_posologia', $id_posologia);
            }
            if( !empty($posologia))
            {
                $filtro[] = array('posologia', 'like', $posologia.'%');
            }
            if( !empty($id_via_administracion))
            {
                $filtro[] = array('id_via_administracion', $id_via_administracion);
            }
            if( !empty($via_administracion))
            {
                $filtro[] = array('via_administracion', 'like', $via_administracion.'%');
            }
            if( !empty($id_usuario))
            {
                $filtro[] = array('id_usuario', $id_usuario);
            }
            if( !empty($fecha_registro))
            {
                $filtro[] = array('fecha_registro', $fecha_registro);
            }
            if( !empty($hora_registro))
            {
                $filtro[] = array('hora_registro', $hora_registro);
            }
            if( $estado !== '')
            {
                $filtro[] = array('estado', $estado);
            }

            $registros = UrgenciaReceta::where($filtro)->get();
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
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    /** registrar API */
    public function registrar_r(Request $request)
    {
        return static::registrar( $request->id_urgencia, $request->id_tipo_control, $request->id_articulo, $request->articulo, $request->id_presentacion, $request->presentacion, $request->id_posologia, $request->posologia, $request->id_via_administracion, $request->via_administracion, $request->comentario );
    }
    /** registrar */
    /**
     * consulta de registros de reta por atencion
     * @param id_urgencia integer - ID URGENCIA - REQUERIDO
     * @param id_tipo_control integer - xx - REQUERIDO
     * @param id_articulo integer - xx - REQUERIDO
     * @param articulo string - xx - REQUERIDO
     * @param id_presentacion integer - xx - REQUERIDO
     * @param presentacion string - xx - REQUERIDO
     * @param id_posologia integer - xx - REQUERIDO
     * @param posologia string - xx - REQUERIDO
     * @param id_via_administracion integer - xx - REQUERIDO
     * @param via_administracionstring - xx - REQUERIDO
     * @param comentario string - COMENTARIO - OPCIONAL
     * @return object
     */
    static public function registrar( $id_urgencia, $id_tipo_control, $id_articulo, $articulo, $id_presentacion, $presentacion, $id_posologia, $posologia, $id_via_administracion, $via_administracion, $comentario )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($id_urgencia) )
        {
            $error['id_urgencia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_tipo_control) )
        {
            $error['id_tipo_control'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_articulo) )
        {
            $error['id_articulo'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($articulo) )
        {
            $error['articulo'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_presentacion) )
        {
            $error['id_presentacion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($presentacion) )
        {
            $error['presentacion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_posologia) )
        {
            $error['id_posologia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($posologia) )
        {
            $error['posologia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_via_administracion) )
        {
            $error['id_via_administracion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($via_administracion) )
        {
            $error['via_administracion'] = 'campo requerido';
            $valido = 0;
        }
        // if( empty($comentario) )
        // {
        //     $error['comentario'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registrar = new UrgenciaReceta();
            $registrar->id_urgencia = $id_urgencia;
            $registrar->id_tipo_control = $id_tipo_control;
            $registrar->id_articulo = $id_articulo;
            $registrar->articulo = $articulo;
            $registrar->id_presentacion = $id_presentacion;
            $registrar->presentacion = $presentacion;
            $registrar->id_posologia = $id_posologia;
            $registrar->posologia = $posologia;
            $registrar->id_via_administracion = $id_via_administracion;
            $registrar->via_administracion = $via_administracion;
            $registrar->comentario = $comentario;
            $registrar->id_usuario = Auth::user()->id;
            $registrar->fecha_registro = date('Y-m-d');
            $registrar->hora_registro = date('H:m:s');
            $registrar->estado = 1;

            if($registrar->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
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
}
