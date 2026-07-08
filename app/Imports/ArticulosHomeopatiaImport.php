<?php

namespace App\Imports;

use App\Models\ArticuloHomeopatia;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ArticulosHomeopatiaImport implements ToArray, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Comienza desde la fila 2 (saltarse los encabezados)
    }

    public function array(array $rows)
    {
        $articulos = [];

        foreach ($rows as $index => $row) {
            // Validar que el nombre no esté vacío (columna B = índice 1)
            if (empty($row[1])) {
                continue;
            }

            $articulos[] = [
                'nombre' => $row[1] ?? null,         // Columna B - Nombre del producto
                'cont_rec' => $row[2] ?? null,       // Columna C - Cantidad
                'dosis' => $row[3] ?? null,          // Columna D - Dosis
                'cant_comp' => $row[4] ?? null,      // Columna E - Cant-comprar
                'droga' => $row[5] ?? null,          // Columna F - Recomendaciones
                'present' => $this->extraerPresentacion($row[1] ?? ''),
                'grupo' => 'HOMEOPATIA',
                'datos_originales' => $row // Para debugging
            ];
        }

        return $articulos;
    }

    /**
     * Extrae la presentación del nombre del producto
     */
    private function extraerPresentacion($nombre)
    {
        // Buscar patrones comunes de presentación
        if (preg_match('/(\d+\s*(ml|ML|gr|GR|Gr|comp|COMP|cáps|CÁPS|caps|CAPS|comprimidos|COMPRIMIDOS|cápsula|CÁPSULA))/i', $nombre, $matches)) {
            return $matches[1];
        }

        // Buscar al final del nombre
        if (preg_match('/\s+(\d+\s*[a-zA-Z]+)$/', $nombre, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
