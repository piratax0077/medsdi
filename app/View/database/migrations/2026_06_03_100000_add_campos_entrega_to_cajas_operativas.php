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
        Schema::table('cajas_operativas', function (Blueprint $table) {
            // Campo para registrar quién entregó la caja (responsable anterior)
            $table->unsignedBigInteger('id_usuario_entrega')->nullable()->after('id_usuario');

            // Fecha cuando se entregó la caja
            $table->timestamp('fecha_entrega')->nullable()->after('fecha_cierre');

            // Observaciones específicas de la entrega (separadas del cierre)
            $table->text('observaciones_entrega')->nullable()->after('observaciones');

            // Monto entregado (puede ser diferente al monto final si hay ajustes)
            $table->decimal('monto_entregado', 10, 2)->nullable()->after('monto_final');

            // Relación con la tabla de usuarios (asistente que entregó)
            $table->foreign('id_usuario_entrega')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cajas_operativas', function (Blueprint $table) {
            $table->dropForeign(['id_usuario_entrega']);
            $table->dropColumn([
                'id_usuario_entrega',
                'fecha_entrega',
                'observaciones_entrega',
                'monto_entregado'
            ]);
        });
    }
};
