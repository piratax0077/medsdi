<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasImplantesDentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['descripcion' => 'AlphaBio', 'estado' => 1],
            ['descripcion' => 'Biohorizons', 'estado' => 1],
            ['descripcion' => 'Biomet 3i', 'estado' => 1],
            ['descripcion' => 'GMI', 'estado' => 1],
            ['descripcion' => 'Mis', 'estado' => 1],
            ['descripcion' => 'Neodent', 'estado' => 1],
            ['descripcion' => 'Nobel', 'estado' => 1],
            ['descripcion' => 'Straumann', 'estado' => 1],
            ['descripcion' => 'Zimbie', 'estado' => 1],
        ];

        DB::table('marcas_implantes_dental')->insert($marcas);
    }
}
