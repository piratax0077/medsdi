<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasCmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('areas_cm')->insert([
            'nombre' => 'Admin. Médica',
            'descripcion' => 'Admin. Médica',
            'otro' => 'Otro 1'
        ]);

        DB::table('areas_cm')->insert([
            'nombre' => 'Admin. Comercial',
            'descripcion' => 'Admin. Comercial',
            'otro' => 'Otro 2'


        ]);

        DB::table('areas_cm')->insert([
            'nombre' => 'Boxes y Consultas',
            'descripcion' => 'Boxes y Consultas',
            'otro' => 'Otro 3'
        ]);

        DB::table('areas_cm')->insert([
            'nombre' => 'Confirmacion de hora',
            'descripcion' => 'Confirmacion de hora',
            'otro' => 'Otro 4'
        ]);

        DB::table('areas_cm')->insert([
            'nombre' => 'Mantención y Limpieza',
            'descripcion' => 'Mantención y Limpieza',
            'otro' => 'Otro 5'
        ]);

        DB::table('areas_cm')->insert([
            'nombre' => 'Farmacia y bodega',
            'descripcion' => 'Farmacia y bodega',
            'otro' => 'Otro 6'
        ]);

    }
}
