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
        Schema::create('curaciones_registros', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_ficha_atencion')->nullable()->index();
            $table->unsignedBigInteger('id_profesional')->nullable()->index();
            $table->unsignedBigInteger('id_paciente')->index();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable()->index();

            // Tipos sugeridos: plana, lpp, pie_diabetico, quemados
            $table->string('tipo_curacion', 50)->index();
            // etapa: valoracion, curacion o mixta (si guarda ambos bloques)
            $table->string('etapa', 20)->default('mixta')->index();

            $table->json('datos_valoracion')->nullable();
            $table->json('datos_curacion')->nullable();
            $table->text('observaciones')->nullable();

            $table->string('estado', 30)->default('completado')->index();
            $table->boolean('activo')->default(true)->index();

            $table->date('fecha')->nullable()->index();
            $table->time('hora')->nullable();

            $table->timestamps();

            $table->index(['id_ficha_atencion', 'tipo_curacion']);
            $table->index(['id_paciente', 'tipo_curacion', 'activo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curaciones_registros');
    }
};
