<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_pago')->insert([
            ['nombre' => 'Efectivo', 'descripcion' => 'Pago en efectivo'],
            ['nombre' => 'Transferencia', 'descripcion' => 'Pago por transferencia'],
            ['nombre' => 'Cheque', 'descripcion' => 'Pago con cheque'],
            ['nombre' => 'Tarjeta de Credito', 'descripcion' => 'Pago con tarjeta de credito'],
        ]);
    }
}
