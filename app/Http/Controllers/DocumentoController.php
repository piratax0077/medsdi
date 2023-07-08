<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FichaAtencion;
use App\Models\DetalleReceta;

use PDF;

class DocumentoController extends Controller
{

    public function verRegistrosRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id_paciente)||(int)$request->id_paciente==0)
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $registros = FichaAtencion::join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')
                                        ->where('id_paciente',$request->id_paciente)
                                        ->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registros;
                $datos['request'] = $request->all();

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
                $datos['request'] = $request->all();
            }


        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRecetaPDF(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $detalleReceta = DetalleReceta::where('id_ficha', $request->id)->get();

            $pdf = PDF::loadView('atencion_medica.PDF.pdf_prueba', compact($detalleReceta));

            return $pdf->download($request->id.'.pdf');

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;

            return response($datos)->header('Content-Type', 'application/json');
        }

        

    }
}
