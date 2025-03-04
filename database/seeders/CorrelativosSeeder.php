<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrelativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
         DB::table('correlativos')->insert([
            ['documento' => 'Orden Trabajo Menor','correlativo' => 0, 'serie' => 0, 'alarma' => 50, 'estado' => 1,'id_usuario' => 3, 'fecha' => '2025/02/24'],
            ['documento' => 'Orden Trabajo Mayor','correlativo' => 0, 'serie' => 0, 'alarma' => 50, 'estado' => 1,'id_usuario' => 3, 'fecha' => '2025/02/24'],
            ['documento' => 'Orden Trabajo Especial','correlativo' => 0, 'serie' => 0, 'alarma' => 50, 'estado' => 1,'id_usuario' => 3, 'fecha' => '2025/02/24'],
            ['documento' => 'Orden Trabajo Urgente','correlativo' => 0, 'serie' => 0, 'alarma' => 50, 'estado' => 1,'id_usuario' => 3, 'fecha' => '2025/02/24'],
            ['documento' => 'Orden Trabajo Externo','correlativo' => 0, 'serie' => 0, 'alarma' => 50, 'estado' => 1,'id_usuario' => 3, 'fecha' => '2025/02/24']
        ]);
    }
}
