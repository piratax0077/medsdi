<?php

namespace Database\Seeders;

use App\Models\FormasPago;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table to avoid duplicate key errors
        DB::table('formas_pago')->truncate();

        FormasPago::create([
            'nombre' => 'Deposito 15 días',
            'descripcion' => 'Depósito bancario con plazo de 15 días',
            'dias_plazo' => 15,
            'activo' => 1,
            'created_at' => '2024-09-30 14:33:19',
            'updated_at' => '2024-09-30 14:33:19'
        ]);

        FormasPago::create([
            'nombre' => 'Efectivo',
            'descripcion' => 'Pago en efectivo inmediato',
            'dias_plazo' => 0,
            'activo' => 1,
            'created_at' => '2019-08-19 15:34:42',
            'updated_at' => '2019-08-19 15:34:42'
        ]);

        FormasPago::create([
            'nombre' => 'Cheque 30/60 días',
            'descripcion' => 'Cheque con plazo de 30 a 60 días',
            'dias_plazo' => 30,
            'activo' => 1,
            'created_at' => '2019-08-19 15:34:55',
            'updated_at' => '2019-08-19 15:34:55'
        ]);

        FormasPago::create([
            'nombre' => 'Cheque 30/60/90 días',
            'descripcion' => 'Cheque con plazo de 30 a 90 días',
            'dias_plazo' => 30,
            'activo' => 1,
            'created_at' => '2019-08-19 15:35:06',
            'updated_at' => '2019-08-19 15:35:06'
        ]);

        FormasPago::create([
            'nombre' => 'Contra Transferencia',
            'descripcion' => 'Pago contra transferencia bancaria',
            'dias_plazo' => 0,
            'activo' => 1,
            'created_at' => '2019-08-19 15:36:42',
            'updated_at' => '2019-08-19 15:36:42'
        ]);

        FormasPago::create([
            'nombre' => 'Transferencia 30 días',
            'descripcion' => 'Transferencia bancaria con plazo de 30 días',
            'dias_plazo' => 30,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:04',
            'updated_at' => '2019-08-19 15:37:04'
        ]);

        FormasPago::create([
            'nombre' => 'Transferencia 30/60 días',
            'descripcion' => 'Transferencia bancaria con plazo de 30 a 60 días',
            'dias_plazo' => 30,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:20',
            'updated_at' => '2019-08-19 15:37:20'
        ]);

        FormasPago::create([
            'nombre' => 'Contra entrega',
            'descripcion' => 'Pago contra entrega del producto',
            'dias_plazo' => 0,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:20',
            'updated_at' => '2019-08-19 15:37:20'
        ]);

        FormasPago::create([
            'nombre' => 'Cheque al día',
            'descripcion' => 'Cheque pagadero al día',
            'dias_plazo' => 0,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:20',
            'updated_at' => '2019-08-19 15:37:20'
        ]);

        FormasPago::create([
            'nombre' => 'Cheque 30 días',
            'descripcion' => 'Cheque con plazo de 30 días',
            'dias_plazo' => 30,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:20',
            'updated_at' => '2019-08-19 15:37:20'
        ]);

        FormasPago::create([
            'nombre' => 'Contra Deposito',
            'descripcion' => 'Pago contra depósito en cuenta',
            'dias_plazo' => 0,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:20',
            'updated_at' => '2019-08-19 15:37:20'
        ]);

        FormasPago::create([
            'nombre' => 'Contra Entrega 30 días',
            'descripcion' => 'Pago contra entrega con plazo de 30 días',
            'dias_plazo' => 30,
            'activo' => 1,
            'created_at' => '2019-08-19 15:37:20',
            'updated_at' => '2019-08-19 15:37:20'
        ]);
    }
}
