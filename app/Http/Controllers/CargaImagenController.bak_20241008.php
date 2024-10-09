<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CargaImagenController extends Controller
{
    /** IMAGEN */
    public function cargaImagenTemp(Request $req)
    {
        // Validar la solicitud
            $req->validate([
                'archivos.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx,xls,xlsx,ppt,pptx|max:5120', // 5MB máximo
            ]);

            $contador = 0;

            // Manejar archivos adjuntos
            if ($req->hasFile('archivos')) {
                foreach ($req->file('archivos') as $file) {
                    $contador++;
                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->storeAs('uploads/', $filename, 'public');

                    // Aquí puedes guardar la información del archivo en la base de datos si es necesario
                    // Ejemplo:
                    // $archivo = new Archivo();
                    // $archivo->mensaje_id = $nuevo_mensaje->id;
                    // $archivo->ruta = '/storage/uploads/'.$filename;
                    // $archivo->save();
                }
            }

            return response()->json(['success' => true, 'message' => 'Archivos'.$contador.' subidos correctamente']);
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

        // Definir las reglas de validación
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
                'message' => 'The given data was invalid.',
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
