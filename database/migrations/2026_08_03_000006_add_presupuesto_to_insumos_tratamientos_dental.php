<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('insumos_tratamientos_dental', 'id_presupuesto')) {
            Schema::table('insumos_tratamientos_dental', function (Blueprint $table) {
                $table->unsignedBigInteger('id_presupuesto')->nullable()->after('id_tratamiento');
                $table->index('id_presupuesto', 'insumos_dental_presupuesto_idx');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('insumos_tratamientos_dental', 'id_presupuesto')) {
            Schema::table('insumos_tratamientos_dental', function (Blueprint $table) {
                $table->dropIndex('insumos_dental_presupuesto_idx');
                $table->dropColumn('id_presupuesto');
            });
        }
    }
};
