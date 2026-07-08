<?php

namespace App\Imports;

use App\Models\RecetaPresentacionHomeopatia;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RecetaPresentacionHomeopatiaImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'receta-presentacion-homeopatia' => new RecetaPresentacionSheet(),
        ];
    }
}

class RecetaPresentacionSheet implements ToArray, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Comienza desde la fila 2 (saltarse los encabezados)
    }

    public function array(array $rows)
    {
        $procesedRows = [];
        $currentParentId = 1; // Contador para cantidad (código padre)

        foreach ($rows as $row) {
            // Validar que al menos uno de los campos principales tenga contenido
            if (empty($row[1]) && empty($row[2]) && empty($row[3])) {
                continue; // Saltar filas completamente vacías
            }

            $cantidad_excel = $row[1] ?? 0;    // Valor original del Excel
            $tipo_presentacion = $row[2] ?? '';// Columna C - Tipo presentación
            $cant = $row[3] ?? '';             // Columna D - Cantidad específica

            if ($cantidad_excel == 0 && !empty($tipo_presentacion)) {
                // REGISTRO PADRE: Define un nuevo tipo de presentación
                $procesedRows[] = [
                    0 => '',                      // Índice 0 (columna A) - no usado
                    1 => 0,                       // Índice 1 (columna B) - cantidad = 0 para padres
                    2 => $tipo_presentacion,      // Índice 2 (columna C) - tipo_presentacion
                    3 => ''                       // Índice 3 (columna D) - cant vacío para padres
                ];
                $currentParentId++;               // Incrementar para el siguiente grupo
            } else {
                // REGISTRO HIJO: Usa la cantidad del grupo actual
                $procesedRows[] = [
                    0 => '',                      // Índice 0 (columna A) - no usado
                    1 => $currentParentId - 1,    // Índice 1 (columna B) - cantidad del grupo
                    2 => '',                      // Índice 2 (columna C) - tipo_presentacion vacío para hijos
                    3 => $cant                    // Índice 3 (columna D) - cantidad específica
                ];
            }
        }

        return $procesedRows;
    }
}
