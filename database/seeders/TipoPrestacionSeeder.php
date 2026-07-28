<?php

namespace Database\Seeders;

use App\Models\TipoPrestacion;
use Illuminate\Database\Seeder;

class TipoPrestacionSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['codigo' => 'CONSULTA', 'nombre' => 'Consulta'],
            ['codigo' => 'TELEATENCION', 'nombre' => 'Teleatención'],
            ['codigo' => 'EXAMEN', 'nombre' => 'Examen'],
            ['codigo' => 'PROCEDIMIENTO', 'nombre' => 'Procedimiento'],
            ['codigo' => 'TERAPIA', 'nombre' => 'Terapia'],
            ['codigo' => 'EVALUACION', 'nombre' => 'Evaluación'],
            ['codigo' => 'CONTROL', 'nombre' => 'Control'],
        ];

        foreach ($tipos as $tipo) {
            TipoPrestacion::updateOrCreate(
                ['codigo' => $tipo['codigo']],
                [
                    'nombre' => $tipo['nombre'],
                    'estado' => true,
                ]
            );
        }
    }
}
