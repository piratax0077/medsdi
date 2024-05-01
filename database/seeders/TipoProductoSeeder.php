<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_producto')->insert([
            ['nombre' => 'Escritorio'],
            ['nombre' => 'Aseo'],
            ['nombre' => 'Desinfectante de uso clinico'],
            ['nombre' => 'Farmacia'],
        ]);
    }
}
