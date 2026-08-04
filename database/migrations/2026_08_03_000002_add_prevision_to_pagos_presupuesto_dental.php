<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pagos_presupuesto_dental', function (Blueprint $table) {
            if (!Schema::hasColumn('pagos_presupuesto_dental', 'id_prevision')) {
                $table->unsignedBigInteger('id_prevision')->nullable()->after('id_presupuesto');
                $table->index('id_prevision', 'pagos_presupuesto_prevision_idx');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pagos_presupuesto_dental', function (Blueprint $table) {
            if (Schema::hasColumn('pagos_presupuesto_dental', 'id_prevision')) {
                $table->dropIndex('pagos_presupuesto_prevision_idx');
                $table->dropColumn('id_prevision');
            }
        });
    }
};
