<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialesImplantologiaSeeder extends Seeder
{
    public function run()
    {
        $materiales = [
            'Tornillo de fijación 1.5 D, 3.5 MM',
            'Tornillo de fijación 1.5 D, 7 MM',
            'Tornillo de fijación 1.5 D, 9 MM',
            'Tornillo de fijación 1.5 D, 11 MM',
            'Tornillo FIXING SCREW 1.6 MM, 3 L',
            'Tornillo FIXING SCREW 1.6 MM, 5 L',
            'Tornillo FIXING SCREW 1.6 MM, 7 L',
            'Tornillo TENT SCREW 2 MM, 7 L',
            'Tornillo TENT SCREW 2 MM, 10 L',
            'Tornillo TENT SCREW 2 MM, 13 L',
            'Tornillo TENT SCREW 2 MM, 15 L',
            'Tornillo autoperforante 1.2 MM',
            'Tornillo autoperforante 1.5 MM',
            'Chincheta 3 MM BMK',
            'Chincheta TRUTACK ø 2.5 MM, 3L, 10U',
            'Chincheta TRUTACK ø 2.5 MM, 5L, 10U'
        ];

        foreach ($materiales as $material) {
            DB::table('materiales_implantologia')->insert([
                'descripcion' => $material,
                'valor' => null, // Aquí puedes asignar un valor si es necesario
                'estado' => 1, // Aquí puedes cambiar el estado si es necesario
                'observaciones' => null, // Aquí puedes agregar observaciones si es necesario
                'id_tipo_insumo' => 7, // Asignamos el valor 7 para el campo id_tipo_insumo
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
