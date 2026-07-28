<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes_prestaciones_centro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lugar_atencion')->constrained('lugares_atencion')->restrictOnDelete();
            $table->foreignId('id_profesional')->constrained('profesionales')->restrictOnDelete();
            $table->foreignId('id_tipo_prestacion')->constrained('tipo_prestaciones')->restrictOnDelete();
            $table->unsignedBigInteger('id_especialidad');
            $table->unsignedBigInteger('id_tipo_especialidad')->nullable();
            $table->unsignedBigInteger('id_sub_tipo_especialidad')->nullable();
            $table->string('cod_examen', 100);
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('minutos_bloque');
            $table->unsignedInteger('cantidad_bloques');
            $table->decimal('valor_profesional', 12, 2);
            $table->decimal('valor_centro_propuesto', 12, 2)->nullable();
            $table->text('observacion_profesional')->nullable();
            $table->text('observacion_administrador')->nullable();
            $table->string('estado', 20)->default('PENDIENTE')->index();
            // procedimientos_centro es una tabla heredada que en algunas
            // instalaciones no admite claves foráneas.
            $table->unsignedBigInteger('id_procedimiento_centro')->nullable()->index();
            $table->foreignId('id_usuario_resuelve')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('fecha_resolucion')->nullable();
            $table->timestamps();
            $table->index(['id_lugar_atencion', 'estado'], 'idx_solicitud_lugar_estado');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes_prestaciones_centro');
    }
};
