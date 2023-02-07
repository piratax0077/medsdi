<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CargaImagenController extends Controller
{
    public function cargaImagenTemp(Request $request)
    {
        $datos = array();

        $request->validate([
            'file' => 'required|image|max:4096'
        ]);

        $file_extension = $request->file->extension();
        $file_mime_type = $request->file->getClientMimeType();
        $original_file_name = $request->file->getClientOriginalName();

        // $imagenes = $request->file->store('public/imagenes/temp'); /** ok */
        $imagenes = $request->file('file')->store('public/imagenes/temp');  /** ok */

        /** guardar con nombre */
        // $imagenes = $request->file->storeAs('public/imagenes/temp', $original_file_name);

        $url = Storage::url($imagenes);
        $nombre_img = str_replace('/storage/imagenes/temp/','',$url);
        $datos['estado'] = 1;
        $datos['img']['url'] = $url;
        $datos['img']['original_file_name'] = $original_file_name;
        $datos['img']['nombre_img'] = $nombre_img;
        $datos['img']['file_extension'] = $file_extension;
        $datos['img']['file_mime_type'] = $file_mime_type;

        return $datos;
    }


    /**
     * mover y renombrar archivo
     *
     * @param [Request] $request
     *  [string] $nombreArchivo
     *  [string] $dirDestino (config\filesystems.php)
     *  [string] $nombreNuevo
     * @return array
     */
    public function moverImagen_r(Request $request)
    {
        return static::moverImagen($request->nombreArchivo, $request->dirDestino, $request->nombreNuevo);
    }

    /**
     * mover y renombrar archivo
     *
     * @param [string] $nombreArchivo
     * @param [string] $dirDestino (config\filesystems.php)
     * @param [string] $nombreNuevo
     * @return array
     */
    static public function moverImagen($nombreArchivo, $dirDestino, $nombreNuevo)
    {
        $datos = array();

        // img_temp
        // img_examen
        $exists = Storage::disk('img_temp')->exists($nombreArchivo);
        $datos['proceso']['exists'] = $exists;

        if($exists)
        {
            $contents = Storage::disk('img_temp')->get($nombreArchivo);
            $copy = Storage::disk($dirDestino)->put($nombreNuevo, $contents);
            $datos['proceso']['copy'] = $copy;

            if($copy)
            {
                $url = Storage::disk($dirDestino)->url($nombreNuevo);
                Storage::disk('img_temp')->delete($nombreArchivo);
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['proceso']['url'] = $url;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'fallo';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'no encontrado';
        }



        return $datos;
    }
}
