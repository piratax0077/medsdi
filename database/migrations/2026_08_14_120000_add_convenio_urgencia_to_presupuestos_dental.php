<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('presupuestos_dental', function (Blueprint $table) {
            if (!Schema::hasColumn('presupuestos_dental', 'id_convenio_urgencia_aplicado')) {
                $table->unsignedBigInteger('id_convenio_urgencia_aplicado')
                    ->nullable()
                    ->after('id_convenio_aplicado');
            }
        });
    }

    public function down(): void
    {
        Schema::table('presupuestos_dental', function (Blueprint $table) {
            if (Schema::hasColumn('presupuestos_dental', 'id_convenio_urgencia_aplicado')) {
                $table->dropColumn('id_convenio_urgencia_aplicado');
            }
        });
    }
};
