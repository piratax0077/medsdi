<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use DateTime;

class PdfController extends Controller
{

    /**
     * GENERAR PDF
     *
     * @param STRING $titulo
     * @param ARRAY $detalle
     * @param STRING $nombre
     * @param STRING $template
     * @return PFD VISTA
     */
    static function generarPDF($titulo, $detalle, $nombre, $template)
    {

        // return response($detalle)->header('Content-Type', 'application/json');
        $date = date('Y-m-d');
        $titulo = $titulo;
        $cuerpo = $detalle;
        $nombre_pdf = str_replace('/', '-', $nombre);

        $view =  View::make('PDF.'.$template, compact('date', 'titulo', 'cuerpo'))->render();
        // $view =  View::make('PDF.pdf_receta_medica', compact('date', 'titulo', 'cuerpo'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        /** 1_1_20190903.pdf */

        /** guardar */
        // $pdf->save('../pdf/' . $nombre_pdf . '.pdf');
        /** descarga */
        // return $pdf->download($nombre_pdf.'.pdf');
        /** ver */
        return $pdf->stream($nombre_pdf.'.pdf');
    }
}
