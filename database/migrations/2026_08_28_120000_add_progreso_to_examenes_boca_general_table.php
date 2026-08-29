<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('examenes_boca_general', 'progreso')) {
            Schema::table('examenes_boca_general', function (Blueprint $table) {
                $table->unsignedTinyInteger('progreso')->default(0)->after('terminado');
            });

            DB::table('examenes_boca_general')
                ->where('terminado', 1)
                ->update(['progreso' => 100]);
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('examenes_boca_general', 'progreso')) {
            Schema::table('examenes_boca_general', function (Blueprint $table) {
                $table->dropColumn('progreso');
            });
        }
    }
};
