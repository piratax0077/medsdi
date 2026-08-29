<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('examenes_boca_general', 'id_presupuesto')) {
            Schema::table('examenes_boca_general', function (Blueprint $table) {
                $table->unsignedBigInteger('id_presupuesto')->nullable()->after('id_ficha_atencion')->index();
            });
        }

        // Vincula los grupos antiguos que ya estaban marcados para presupuesto.
        DB::table('examenes_boca_general')
            ->where('presupuesto', 1)
            ->whereNull('id_presupuesto')
            ->orderBy('id')
            ->chunkById(200, function ($grupos) {
                foreach ($grupos as $grupo) {
                    $presupuestoId = DB::table('presupuestos_dental')
                        ->where('id_ficha_atencion', $grupo->id_ficha_atencion)
                        ->where('id_paciente', $grupo->id_paciente)
                        ->where('id_profesional', $grupo->id_profesional)
                        ->where('id_lugar_atencion', $grupo->id_lugar_atencion)
                        ->orderByDesc('id')
                        ->value('id');

                    if ($presupuestoId) {
                        DB::table('examenes_boca_general')
                            ->where('id', $grupo->id)
                            ->update(['id_presupuesto' => $presupuestoId]);
                    }
                }
            }, 'id');
    }

    public function down(): void
    {
        if (Schema::hasColumn('examenes_boca_general', 'id_presupuesto')) {
            Schema::table('examenes_boca_general', function (Blueprint $table) {
                $table->dropColumn('id_presupuesto');
            });
        }
    }
};
