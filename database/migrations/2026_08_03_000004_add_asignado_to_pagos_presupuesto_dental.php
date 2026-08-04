<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pagos_presupuesto_dental', function (Blueprint $table) {
            if (!Schema::hasColumn('pagos_presupuesto_dental', 'asignado')) {
                $table->boolean('asignado')->default(false)->after('id_prevision');
                $table->timestamp('fecha_asignacion')->nullable()->after('asignado');
            }
        });

        // Los pagos históricos ya se encuentran reflejados en los estados actuales.
        DB::table('pagos_presupuesto_dental')->update([
            'asignado' => true,
            'fecha_asignacion' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::table('pagos_presupuesto_dental', function (Blueprint $table) {
            if (Schema::hasColumn('pagos_presupuesto_dental', 'asignado')) {
                $table->dropColumn(['asignado', 'fecha_asignacion']);
            }
        });
    }
};
