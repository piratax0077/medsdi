<?php

namespace App\Imports;

use App\Models\RecetaDosisHomeopatia;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RecetaDosisHomeopatiaImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'receta-dosis-homeopatia' => new RecetaDosisSheet(),
        ];
    }
}

class RecetaDosisSheet implements ToArray, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Comienza desde la fila 2 (saltarse los encabezados)
    }

    public function array(array $rows)
    {
        $procesedRows = [];
        $currentParentId = 1; // Contador para cod_parent

        foreach ($rows as $row) {
            // Validar que al menos uno de los campos principales tenga contenido
            if (empty($row[1]) && empty($row[2]) && empty($row[3])) {
                continue; // Saltar filas completamente vacías
            }

            $cod_parent_excel = $row[1] ?? 0;  // Valor original del Excel
            $tipo_prod = $row[2] ?? '';        // Columna C - Tipo producto
            $indic = $row[3] ?? '';            // Columna D - Indicación

            if ($cod_parent_excel == 0 && !empty($tipo_prod)) {
                // REGISTRO PADRE: Define un nuevo tipo de producto
                $procesedRows[] = [
                    0 => '',                  // Índice 0 (columna A) - no usado
                    1 => 0,                   // Índice 1 (columna B) - cod_parent = 0 para padres
                    2 => $tipo_prod,          // Índice 2 (columna C) - tipo_prod
                    3 => ''                   // Índice 3 (columna D) - indic vacío para padres
                ];
                $currentParentId++;           // Incrementar para el siguiente grupo
            } else {
                // REGISTRO HIJO: Usa el cod_parent del grupo actual
                $procesedRows[] = [
                    0 => '',                  // Índice 0 (columna A) - no usado
                    1 => $currentParentId - 1, // Índice 1 (columna B) - cod_parent del grupo
                    2 => '',                  // Índice 2 (columna C) - tipo_prod vacío para hijos
                    3 => $indic               // Índice 3 (columna D) - indicación
                ];
            }
        }

        return $procesedRows;
    }
}
