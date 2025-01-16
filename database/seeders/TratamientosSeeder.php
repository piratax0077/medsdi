<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tratamientos_dental')->insert([
            ['descripcion' => 'Caries','estado' => 1],
            ['descripcion' => 'Fractura','estado' => 1],
            ['descripcion' => 'Periodontopatia','estado' => 1],
            ['descripcion' => 'Profilaxis','estado' => 1],
            ['descripcion' => 'Restos radiculares','estado' => 1]
        ]);
    }
}
