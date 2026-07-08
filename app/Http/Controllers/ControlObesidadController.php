<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ControlObesidad;
use App\Models\Diabete;
use App\Models\Hipertension;
use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ControlObesidadController extends Controller
{
    public function reporteCronicoPdf(Request $request)
    {
        $idPaciente = $request->id_paciente;
        $tipo       = $request->tipo; // 'obesidad' | 'hipertension' | 'diabetes'

        $paciente = Paciente::with('Direccion')->find($idPaciente);

        if (!$paciente) {
            abort(404, 'Paciente no encontrado');
        }

        $registros = collect();

        if ($tipo === 'obesidad') {
            $registros = ControlObesidad::where('id_paciente', $idPaciente)->orderBy('id', 'ASC')->get();
        } elseif ($tipo === 'hipertension') {
            $registros = Hipertension::where('id_paciente', $idPaciente)->orderBy('id', 'ASC')->get();
        } elseif ($tipo === 'diabetes') {
            $registros = Diabete::where('id_paciente', $idPaciente)->orderBy('id', 'ASC')->get();
        }

        $data = [
            'paciente'     => $paciente,
            'tipo'         => $tipo,
            'registros'    => $registros,
            'fecha'        => now()->format('d/m/Y'),
            'chart_image'  => $request->input('chart_image'), // base64 PNG enviado desde el frontend
        ];

        $pdf = Pdf::loadView('app.centro_enfermeria_integral.pdf.reporte_cronico', $data);
        $pdf->setPaper('A4', 'portrait');

        $rut      = str_replace(['.', '-'], '', $paciente->rut ?? $idPaciente);
        $filename = 'reporte_' . $tipo . '_' . $rut . '_' . now()->format('Ymd') . '.pdf';

        return $pdf->stream($filename);
    }

    public function getControlObesidad(Request $request)
    {
        $datos= array();
        $filtro = array();


        if(!empty($request->id)) {
            $filtro[] = array('id',$request->id);
        }
       if(!empty($request->peso)) {
            $filtro[] = array('peso',$request->peso);
        }
       if(!empty($request->variacion)) {
            $filtro[] = array('variacion',$request->variacion);
        }
       if(!empty($request->ideal)) {
            $filtro[] = array('ideal',$request->ideal);
        }
       if(!empty($request->id_paciente)) {
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
       if(!empty($request->id_profesional)) {
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
       if(!empty($request->id_ficha_atencion)) {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }


        $registros = ControlObesidad::where($filtro)->get();
        if(count($registros))
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros encontrados';
            $datos['registros'] = $registros;
        }
        else{
            $datos['estado'] = 1;
            $datos['msj'] = 'sin registros encontrados';
            $datos['registros'] = array();
        }

        return $datos;
    }
}
