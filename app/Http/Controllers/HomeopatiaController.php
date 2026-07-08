<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ArticulosHomeopatiaImport;
use App\Imports\RecetaDosisHomeopatiaImport;
use App\Imports\RecetaPresentacionHomeopatiaImport;
use App\Models\ArticuloHomeopatia;
use App\Models\RecetaDosisHomeopatia;
use App\Models\RecetaPresentacionHomeopatia;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Exception;

class HomeopatiaController extends Controller
{
    /**
     * Mostrar la vista para importar datos de Excel de homeopatía
     */
    public function importacion_datos_excel_homeopatia()
    {
        return view('app.homeopatia.importar_datos_excel');
    }

    /**
     * Importar artículos de homeopatía desde archivo Excel
     */
    public function importarArticulos(Request $request)
    {
        try {
            // Validar el archivo
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:10240' // Máximo 10MB
            ], [
                'file.required' => 'Debe seleccionar un archivo.',
                'file.mimes' => 'El archivo debe ser de tipo Excel (.xlsx, .xls) o CSV (.csv).',
                'file.max' => 'El archivo no debe exceder los 10MB.'
            ]);

            // Realizar la importación y obtener el array de artículos
            $articulos = Excel::toArray(new ArticulosHomeopatiaImport, $request->file('file'));

            // Obtener los artículos (toArray retorna un array de hojas, tomamos la primera)
            $articulosHomeopatia = $articulos[0] ?? [];

            // Guardar automáticamente en base de datos
            $resultado = $this->guardarArticulosEnBD($articulosHomeopatia);
            $guardados = $resultado['guardados'];
            $errores = $resultado['errores'];

            // Retornar el array de artículos
            return [
                'success' => true,
                'message' => "Artículos procesados y guardados correctamente. {$guardados} registros guardados en base de datos.",
                'total' => count($articulosHomeopatia),
                'guardados' => $guardados,
                'errores' => !empty($errores) ? array_slice($errores, 0, 10) : [], // Solo los primeros 10 errores si los hay
                'archivo' => $request->file('file')->getClientOriginalName()
            ];

        } catch (Exception $e) {


            return [
                'success' => false,
                'error' => 'Error al procesar el archivo: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Importar dosis de recetas de homeopatía desde archivo Excel
     */
    public function importarDosis(Request $request)
    {
        try {
            // Validar el archivo
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:10240' // Máximo 10MB
            ], [
                'file.required' => 'Debe seleccionar un archivo.',
                'file.mimes' => 'El archivo debe ser de tipo Excel (.xlsx, .xls) o CSV (.csv).',
                'file.max' => 'El archivo no debe exceder los 10MB.'
            ]);

            // Log del inicio de importación
            Log::info('Iniciando importación de dosis de homeopatía', [
                'usuario' => auth()->user()->name ?? 'No autenticado',
                'archivo' => $request->file('file')->getClientOriginalName(),
                'tamaño' => $request->file('file')->getSize()
            ]);

            // Realizar la importación y obtener el array de dosis
            $dosis = Excel::toArray(new RecetaDosisHomeopatiaImport, $request->file('file'));

            // Obtener las dosis de la hoja específica "receta-dosis-homeopatia"
            $dosisHomeopatia = $dosis['receta-dosis-homeopatia'] ?? [];

            // Guardar automáticamente en base de datos
            $resultado = $this->guardarDosisEnBD($dosisHomeopatia);
            $guardados = $resultado['guardados'];
            $errores = $resultado['errores'];

            // Log del éxito
            Log::info('Importación de dosis de homeopatía completada exitosamente', [
                'total_dosis' => count($dosisHomeopatia),
                'guardados_bd' => $guardados
            ]);

            // Retornar el array de dosis
            return [
                'success' => true,
                'message' => "Dosis procesadas y guardadas correctamente. {$guardados} registros guardados en base de datos.",
                'total' => count($dosisHomeopatia),
                'guardados' => $guardados,
                'errores' => !empty($errores) ? array_slice($errores, 0, 10) : [], // Solo los primeros 10 errores si los hay
                'archivo' => $request->file('file')->getClientOriginalName()
            ];

        } catch (Exception $e) {
            // Log del error
            Log::error('Error al importar dosis de homeopatía', [
                'error' => $e->getMessage(),
                'usuario' => auth()->user()->name ?? 'No autenticado',
                'archivo' => $request->file('file')->getClientOriginalName() ?? 'Archivo no disponible'
            ]);

            return [
                'success' => false,
                'error' => 'Error al procesar el archivo: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Importar presentaciones de recetas de homeopatía desde archivo Excel
     */
    public function importarPresentaciones(Request $request)
    {
        try {
            // Validar el archivo
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:10240' // Máximo 10MB
            ], [
                'file.required' => 'Debe seleccionar un archivo.',
                'file.mimes' => 'El archivo debe ser de tipo Excel (.xlsx, .xls) o CSV (.csv).',
                'file.max' => 'El archivo no debe exceder los 10MB.'
            ]);

            // Log del inicio de importación
            Log::info('Iniciando importación de presentaciones de homeopatía', [
                'usuario' => auth()->user()->name ?? 'No autenticado',
                'archivo' => $request->file('file')->getClientOriginalName(),
                'tamaño' => $request->file('file')->getSize()
            ]);

            // Realizar la importación y obtener el array de presentaciones
            $presentaciones = Excel::toArray(new RecetaPresentacionHomeopatiaImport, $request->file('file'));

            // Obtener las presentaciones de la hoja específica "receta-presentacion-homeopatia"
            $presentacionesHomeopatia = $presentaciones['receta-presentacion-homeopatia'] ?? [];

            // Guardar automáticamente en base de datos
            $resultado = $this->guardarPresentacionesEnBD($presentacionesHomeopatia);
            $guardados = $resultado['guardados'];
            $errores = $resultado['errores'];

            // Log del éxito
            Log::info('Importación de presentaciones de homeopatía completada exitosamente', [
                'total_presentaciones' => count($presentacionesHomeopatia),
                'guardados_bd' => $guardados
            ]);

            // Retornar el array de presentaciones
            return [
                'success' => true,
                'message' => "Presentaciones procesadas y guardadas correctamente. {$guardados} registros guardados en base de datos.",
                'total' => count($presentacionesHomeopatia),
                'guardados' => $guardados,
                'errores' => !empty($errores) ? array_slice($errores, 0, 10) : [], // Solo los primeros 10 errores si los hay
                'archivo' => $request->file('file')->getClientOriginalName()
            ];

        } catch (Exception $e) {
            // Log del error
            Log::error('Error al importar presentaciones de homeopatía', [
                'error' => $e->getMessage(),
                'usuario' => auth()->user()->name ?? 'No autenticado',
                'archivo' => $request->file('file')->getClientOriginalName() ?? 'Archivo no disponible'
            ]);

            return [
                'success' => false,
                'error' => 'Error al procesar el archivo: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Guardar artículos en la base de datos desde un array
     */
    public function guardarArticulosEnBD($articulos)
    {
        $guardados = 0;
        $errores = [];

        foreach ($articulos as $index => $articulo) {
            try {
                // Validar que el nombre no esté vacío (índice 1 = columna B)
                if (empty($articulo[1])) {
                    $errores[] = "Fila " . ($index + 2) . ": Nombre vacío";
                    continue;
                }

                // Mapear desde array indexado a datos para BD
                $datos = [
                    'nombre' => $articulo[1],           // Columna B - Nombre
                    'cont_rec' => $articulo[2] ?? null, // Columna C - Cantidad
                    'dosis' => $articulo[3] ?? null,    // Columna D - Dosis
                    'cant_comp' => $articulo[4] ?? null,// Columna E - Cant-comprar
                    'droga' => $articulo[5] ?? null,    // Columna F - Recomendaciones
                    'present' => $this->extraerPresentacionControlador($articulo[1]),
                    'grupo' => 'HOMEOPATIA'
                ];

                // Crear o actualizar el registro
                ArticuloHomeopatia::updateOrCreate(
                    ['nombre' => $datos['nombre']], // Buscar por nombre
                    $datos
                );

                $guardados++;

            } catch (Exception $e) {
                $errores[] = "Fila " . ($index + 2) . ": " . $e->getMessage();
            }
        }

        return [
            'guardados' => $guardados,
            'errores' => $errores
        ];
    }

    /**
     * Guardar dosis de homeopatía en la base de datos desde un array
     */
    public function guardarDosisEnBD($dosis)
    {
        $guardados = 0;
        $errores = [];

        foreach ($dosis as $index => $dosisItem) {
            try {
                // Saltar filas completamente vacías o sin datos relevantes
                if (empty($dosisItem[1]) && empty($dosisItem[2]) && empty($dosisItem[3])) {
                    continue;
                }

                // Obtener valores del array
                $cod_parent = $dosisItem[1] ?? null;
                $tipo_prod = $dosisItem[2] ?? '';
                $indic = $dosisItem[3] ?? '';

                // Saltar si no hay datos útiles
                if (is_null($cod_parent) && empty($tipo_prod) && empty($indic)) {
                    continue;
                }

                // Mapear desde array indexado a datos para BD
                $datos = [
                    'cod_parent' => $cod_parent,     // Índice 1 - Código padre
                    'tipo_prod' => $tipo_prod,       // Índice 2 - Tipo producto
                    'indic' => $indic,               // Índice 3 - Indicación
                ];

                // Crear nuevo registro en RecetaDosisHomeopatia
                RecetaDosisHomeopatia::create($datos);
                $guardados++;

            } catch (Exception $e) {
                $errores[] = "Fila " . ($index + 2) . ": " . $e->getMessage();
            }
        }

        return [
            'guardados' => $guardados,
            'errores' => $errores
        ];
    }

    /**
     * Guardar presentaciones de homeopatía en la base de datos desde un array
     */
    public function guardarPresentacionesEnBD($presentaciones)
    {
        $guardados = 0;
        $errores = [];

        foreach ($presentaciones as $index => $presentacionItem) {
            try {
                // Saltar filas completamente vacías o sin datos relevantes
                if (empty($presentacionItem[1]) && empty($presentacionItem[2]) && empty($presentacionItem[3])) {
                    continue;
                }

                // Obtener valores del array
                $cantidad = $presentacionItem[1] ?? null;
                $tipo_presentacion = $presentacionItem[2] ?? '';
                $cant = $presentacionItem[3] ?? '';

                // Saltar si no hay datos útiles
                if (is_null($cantidad) && empty($tipo_presentacion) && empty($cant)) {
                    continue;
                }

                // Mapear desde array indexado a datos para BD
                $datos = [
                    'cantidad' => $cantidad,                    // Índice 1 - Cantidad (código padre)
                    'tipo_presentacion' => $tipo_presentacion, // Índice 2 - Tipo presentación
                    'cant' => $cant,                           // Índice 3 - Cantidad específica
                ];

                // Crear nuevo registro en RecetaPresentacionHomeopatia
                RecetaPresentacionHomeopatia::create($datos);
                $guardados++;

            } catch (Exception $e) {
                $errores[] = "Fila " . ($index + 2) . ": " . $e->getMessage();
            }
        }

        return [
            'guardados' => $guardados,
            'errores' => $errores
        ];
    }

    /**
     * Método separado para guardar artículos desde request
     */
    public function guardarArticulos(Request $request)
    {
        try {
            $articulos = $request->input('articulos', []);

            if (empty($articulos)) {
                return [
                    'success' => false,
                    'error' => 'No hay artículos para guardar'
                ];
            }

            $resultado = $this->guardarArticulosEnBD($articulos);

            Log::info('Guardado de artículos de homeopatía completado', [
                'usuario' => auth()->user()->name ?? 'No autenticado',
                'guardados' => $resultado['guardados'],
                'errores' => count($resultado['errores'])
            ]);

            return [
                'success' => true,
                'message' => "Se guardaron {$resultado['guardados']} artículos correctamente",
                'guardados' => $resultado['guardados'],
                'errores' => $resultado['errores']
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => 'Error al guardar los artículos: ' . $e->getMessage()
            ];
        }
    }
}
