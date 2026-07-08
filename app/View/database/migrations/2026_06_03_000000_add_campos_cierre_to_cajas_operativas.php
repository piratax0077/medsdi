<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposCierreToCajasOperativas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cajas_operativas', function (Blueprint $table) {
            // Campos para gestión de bonos/transacciones
            $table->text('bonos')->nullable()->after('estado'); // IDs de bonos separados por |

            // Campos para cierre de caja
            $table->decimal('saldo_cierre', 10, 2)->nullable()->after('bonos'); // Monto real contado al cerrar
            $table->decimal('diferencia', 10, 2)->nullable()->after('saldo_cierre'); // Diferencia (puede ser negativa)
            $table->text('observaciones')->nullable()->after('diferencia'); // Notas del cierre

            // Campos de totales (opcionales - se pueden calcular)
            $table->decimal('total_efectivo', 10, 2)->default(0)->after('observaciones');
            $table->integer('total_bonos_fisicos')->default(0)->after('total_efectivo');
            $table->decimal('total_otros', 10, 2)->default(0)->after('total_bonos_fisicos');
            $table->decimal('total_acumulado', 10, 2)->default(0)->after('total_otros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cajas_operativas', function (Blueprint $table) {
            $table->dropColumn([
                'bonos',
                'saldo_cierre',
                'diferencia',
                'observaciones',
                'total_efectivo',
                'total_bonos_fisicos',
                'total_otros',
                'total_acumulado'
            ]);
        });
    }
}
