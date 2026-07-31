<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPagoOnlineToFormasPagoTable extends Migration
{
    public function up()
    {
        Schema::table('formas_pago', function (Blueprint $table) {
            if (!Schema::hasColumn('formas_pago', 'pago_online')) {
                $table->boolean('pago_online')->default(false)->after('dias_plazo')->index();
            }
        });

        $opciones = [
            [
                'nombre' => 'Tarjeta de débito o crédito',
                'descripcion' => 'Pago seguro en línea mediante Webpay.',
            ],
            [
                'nombre' => 'Transferencia bancaria online',
                'descripcion' => 'Pago mediante transferencia electrónica.',
            ],
        ];

        foreach ($opciones as $opcion) {
            DB::table('formas_pago')->updateOrInsert(
                ['nombre' => $opcion['nombre']],
                [
                    'descripcion' => $opcion['descripcion'],
                    'dias_plazo' => 0,
                    'activo' => 1,
                    'pago_online' => 1,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }

        Schema::table('orden', function (Blueprint $table) {
            if (!Schema::hasColumn('orden', 'id_forma_pago')) {
                $table->unsignedBigInteger('id_forma_pago')->nullable()->after('id_paciente_responsable')->index();
            }
        });
    }

    public function down()
    {
        DB::table('formas_pago')->whereIn('nombre', [
            'Tarjeta de débito o crédito',
            'Transferencia bancaria online',
        ])->delete();

        Schema::table('orden', function (Blueprint $table) {
            if (Schema::hasColumn('orden', 'id_forma_pago')) {
                $table->dropColumn('id_forma_pago');
            }
        });

        Schema::table('formas_pago', function (Blueprint $table) {
            if (Schema::hasColumn('formas_pago', 'pago_online')) {
                $table->dropColumn('pago_online');
            }
        });
    }
}
