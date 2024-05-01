<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bodega')->insert([
            'id_institucion' => 1,
            'nombre' => 'Bodega Central',
            'descripcion' => 'Bodega Central',
            'direccion' => 'Calle 1',
            'telefono' => '123456',
            'email' => 'sinemqil@gmail.com',
            'id_responsable' => 1
        ]);

        DB::table('bodega')->insert([
            'id_institucion' => 1,
            'nombre' => 'Bodega 2',
            'descripcion' => 'Bodega 2',
            'direccion' => 'Calle 2',
            'telefono' => '123456',
            'email' => 'hola@gmail.com',
            'id_responsable' => 1
        ]);
    }
}
