<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DiagnosticosDentalImport implements ToArray, WithStartRow, WithMultipleSheets
{
    /**
     * Indica desde qué fila iniciar la importación.
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Empieza desde la fila 2
    }

    public function endRow(): int
    {
        return 13; // Termina en la fila 13
    }

    /**
     * Procesa los datos de la hoja seleccionada y los retorna como un array.
     *
     * @param array $rows
     * @return array
     */
    public function array(array $rows)
    {
        $result = [];

        foreach ($rows as $row) {
            $result[] = [
                'descripcion' => $row[0], // Columna B
                'valor' => $row[1],       // Columna D
            ];
        }

        return $result;
    }

    /**
     * Define qué hojas se procesan.
     *
     * @return array
     */
    public function sheets(): array
    {
        return [
            'ARANCEL DENTOLAB' => $this, // Solo procesar la hoja llamada "ARANCEL DENTOLAB"
        ];
    }
}
