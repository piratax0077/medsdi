<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprasDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('compras_detalle')->insert([
            // Agrega aquí los datos que deseas sembrar
            [
                'id_compra' => '1', 
                'id_producto' => '1',
                'fecha_compra' => '2024-04-15',
                'cantidad' => 10,
                'fecha_vencimiento' => '2025-10-10',
                'observaciones' => 'asklfasl',
                'otros' => null
            ],
            [
                'id_compra' => '2', 
                'id_producto' => '1',
                'fecha_compra' => '2024-04-15',
                'cantidad' => 10,
                'fecha_vencimiento' => '2025-10-10',
                'observaciones' => 'asklfasl',
                'otros' => null
            ],
            [
                'id_compra' => '3', 
                'id_producto' => '1',
                'fecha_compra' => '2024-04-15',
                'cantidad' => 10,
                'fecha_vencimiento' => '2025-10-10',
                'observaciones' => 'asklfasl',
                'otros' => null
            ],
            [
                'id_compra' => '2', 
                'id_producto' => '1',
                'fecha_compra' => '2024-04-15',
                'cantidad' => 10,
                'fecha_vencimiento' => '2025-10-10',
                'observaciones' => 'asklfasl',
                'otros' => null
            ],
            // etc.
        ]);
    }
}
