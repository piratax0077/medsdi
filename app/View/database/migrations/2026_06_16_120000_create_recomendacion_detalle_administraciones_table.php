<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recomendacion_detalle_administraciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recomendacion_detalle');
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_responsable');
            $table->dateTime('fecha_hora_administracion');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->index('id_recomendacion_detalle', 'idx_rda_detalle');
            $table->index('id_paciente', 'idx_rda_paciente');
            $table->index('id_responsable', 'idx_rda_responsable');
            $table->index('fecha_hora_administracion', 'idx_rda_fecha_hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendacion_detalle_administraciones');
    }
};
