<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_convenio')->insert([
            'nombre' => 'Convenio Marco', // Cambiar 'nombre' por 'descripcion
            'descripcion' => 'lorem ipsum',
        ]);

        DB::table('tipo_convenio')->insert([
            'nombre' => 'Convenio Especifico',
            'descripcion' => 'Convenio Especifico',
        ]);

        DB::table('tipo_convenio')->insert([
            'nombre' => 'Convenio de Suministro',
            'descripcion' => 'Convenio de Suministro',
        ]);

    }
}
