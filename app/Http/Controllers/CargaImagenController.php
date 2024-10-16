<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CargaImagenController extends Controller
{
    /** IMAGEN */
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

    /** ARCHIVO */
    public function cargaArchivoTemp(Request $request)
    {
        $datos = array();

        $request->validate([
            // 'file' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,application/x-msexcel,application/x-excel|max:4096'
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:4096',
            // 'file' => 'required|in:doc,csv,xlsx,xls,docx,pdf|max:4096'
        ]);
        // verificar si existe un archivo
        if (!$request->hasFile('file')) {
            return response()->json([
                'message' => 'ARCHIVO: No se ha seleccionado un archivo.'
            ], 422);
        }

        $rules = [
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:10240', // 10MB
        ];
		// Mensajes de error personalizados
        $messages = [
            'file.required' => 'El archivo es obligatorio.',
            'file.file' => 'El campo debe ser un archivo.',
            'file.mimes' => 'El archivo debe ser de tipo: pdf, doc, docx, xls, xlsx, csv.',
            'file.max' => 'El archivo no debe ser mayor a 10MB.',
        ];

        // Validar la solicitud
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ARCHIVO: Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        $file_extension = $request->file->extension();
        $file_mime_type = $request->file->getClientMimeType();
        $original_file_name = $request->file->getClientOriginalName();

        // $imagenes = $request->file->store('public/archivo/temp'); /** ok */
        $imagenes = $request->file('file')->store('public/archivo/temp');  /** ok */

        /** guardar con nombre */
        // $imagenes = $request->file->storeAs('public/archivo/temp', $original_file_name);

        $url = Storage::url($imagenes);
        $nombre_archivo = str_replace('/storage/archivo/temp/','',$url);
        $datos['estado'] = 1;
        $datos['archivo']['url'] = $url;
        $datos['archivo']['original_file_name'] = $original_file_name;
        $datos['archivo']['nombre_archivo'] = $nombre_archivo;
        $datos['archivo']['file_extension'] = $file_extension;
        $datos['archivo']['file_mime_type'] = $file_mime_type;

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
    public function moverArchivo_r(Request $request)
    {
        return static::moverArchivo($request->nombreArchivo, $request->dirDestino, $request->nombreNuevo);
    }

    /**
     * mover y renombrar archivo
     *
     * @param [string] $nombreArchivo
     * @param [string] $dirDestino (config\filesystems.php)
     * @param [string] $nombreNuevo
     * @return array
     */
    static public function moverArchivo($nombreArchivo, $dirDestino, $nombreNuevo)
    {
        $datos = array();

        // img_temp
        // img_examen
        $exists = Storage::disk('archivo_temp')->exists($nombreArchivo);
        $datos['proceso']['exists'] = $exists;

        if($exists)
        {
            $contents = Storage::disk('archivo_temp')->get($nombreArchivo);
            $copy = Storage::disk($dirDestino)->put($nombreNuevo, $contents);
            $datos['proceso']['copy'] = $copy;

            if($copy)
            {
                $url = Storage::disk($dirDestino)->url($nombreNuevo);
                Storage::disk('archivo_temp')->delete($nombreArchivo);
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
