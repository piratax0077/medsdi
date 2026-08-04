<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pagos_urgencia_dental', function (Blueprint $table) {
            $table->unsignedBigInteger('id_presupuesto')->nullable()->after('id_ficha_atencion');
            $table->index('id_presupuesto', 'pagos_urgencia_presupuesto_idx');
        });
    }

    public function down(): void
    {
        Schema::table('pagos_urgencia_dental', function (Blueprint $table) {
            $table->dropIndex('pagos_urgencia_presupuesto_idx');
            $table->dropColumn('id_presupuesto');
        });
    }
};
