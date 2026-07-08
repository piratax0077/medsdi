<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{

    /**
     * GENERAR PDF
     *
     * @param STRING $titulo
     * @param ARRAY $detalle
     * @param STRING $nombre
     * @param STRING $template
     * @param STRING $funcionalida
     * @param ARRAY $datos_adicionales
     * @return PFD VISTA
     */
    static function generarPDF($titulo, $detalle, $nombre, $template, $funcionalida = 'V', $datos_adicionales = [])
    {
        try {
            ini_set('display_errors', '1');
            // return response($detalle)->header('Content-Type', 'application/json');
            $date = date('Y-m-d');
            $titulo = $titulo;
            $cuerpo = $detalle;
            $nombre_pdf = str_replace('/', '-', $nombre);

            // Combinar datos por defecto con datos adicionales
            $datos_vista = array_merge(compact('date', 'titulo', 'cuerpo'), $datos_adicionales);


            $view =  View::make('PDF.'.$template, $datos_vista)->render();
            // $view =  View::make('PDF.pdf_receta_medica', compact('date', 'titulo', 'cuerpo'))->render();


            $pdf = App::make('dompdf.wrapper');

            /** tamaño de pagina */
            // $customPaper = array(0,0,600,765);
            // $pdf->setPaper($customPaper);
            // $pdf->setPaper('A4', 'portrait');

            /** contraseña para editar documento */
            $permitted_chars = '0123456789=!abcdefghijklmnopqrstuvwxyz.$阿贝色德饿艾弗日阿什伊鸡卡艾勒艾马艾娜哦佩苦艾和艾丝特玉维独布勒维伊克斯伊格黑克贼德ABCDEFGHIJKLMNOPQRSTUVWXYZ&בגדהוזחטיכלמנסעפצקרשת';

            $tempPass = substr(str_shuffle($permitted_chars), 0, 150);
            $pdf->get_canvas()->get_cpdf()->setEncryption('',$tempPass,array( 'modify','add' ));


            $pdf->loadHTML(ob_get_clean());
            $pdf->loadHTML($view);
            $pdf->getDomPDF()->set_option('isRemoteEnabled', true);

            $pdf->render();

            switch ($funcionalida) {
                case 'V':
                    return $pdf->stream($nombre_pdf.'.pdf', array("Attachment" => 0));
                break;
                case 'G': //GUARDAR
                    $datos = array();
                    // Usar public_path() para obtener la ruta correcta del sistema de archivos
                    $pdf_save_path = public_path('storage' . DIRECTORY_SEPARATOR . 'pdf' . DIRECTORY_SEPARATOR . $nombre_pdf . '.pdf');

                    // Crear directorio si no existe
                    $pdf_dir = public_path('storage' . DIRECTORY_SEPARATOR . 'pdf');
                    if (!file_exists($pdf_dir)) {
                        mkdir($pdf_dir, 0755, true);
                    }

                    if($pdf->save($pdf_save_path))
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'pdf generado correctamente';
                        $datos['pdf'] = $nombre_pdf . '.pdf';
                        $datos['pdf_url'] = asset('storage/pdf/').'/'.$nombre_pdf . '.pdf';
                        Log::info('PDF guardado exitosamente', [
                            'nombre' => $nombre_pdf,
                            'ruta' => $pdf_save_path,
                            'url' => $datos['pdf_url']
                        ]);
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Error al guardar el PDF en la ruta: ' . $pdf_save_path;
                        Log::error('Error al guardar PDF', [
                            'nombre' => $nombre_pdf,
                            'ruta_intentada' => $pdf_save_path,
                            'directorio_existe' => file_exists($pdf_dir),
                            'directorio_escribible' => is_writable($pdf_dir)
                        ]);
                    }
                    return (object)$datos;
                break;
                case 'D': //DESCARGAR
                    return $pdf->download($nombre_pdf.'.pdf');
                break;
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }
}
