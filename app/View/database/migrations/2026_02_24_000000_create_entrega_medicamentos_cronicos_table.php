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
        Schema::create('entrega_medicamentos_cronicos', function (Blueprint $table) {
            $table->id();

            // Relaciones foráneas
            $table->unsignedBigInteger('id_antecedente')->nullable()->comment('ID del medicamento crónico registrado');
            $table->unsignedBigInteger('id_paciente')->nullable()->comment('ID del paciente que recibe el medicamento');
            $table->unsignedBigInteger('id_profesional')->nullable()->comment('ID del profesional que registra la entrega');
            $table->unsignedBigInteger('id_usuario')->nullable()->comment('ID del usuario que registra la entrega');

            // Datos de la entrega
            $table->integer('cantidad_entregada')->default(1)->comment('Cantidad de unidades entregadas');
            $table->date('fecha_entrega')->nullable()->comment('Fecha de entrega del medicamento');
            $table->time('hora_entrega')->nullable()->comment('Hora de entrega del medicamento');
            $table->text('observaciones')->nullable()->comment('Observaciones adicionales sobre la entrega');

            // Información del medicamento
            $table->string('nombre_medicamento', 255)->nullable()->comment('Nombre del medicamento entregado');
            $table->string('presentacion', 100)->nullable()->comment('Presentación del medicamento (e.g., comprimidos, gotas)');
            $table->string('posologia', 200)->nullable()->comment('Posología del medicamento');
            $table->string('via_administracion', 100)->nullable()->comment('Vía de administración');
            $table->unsignedBigInteger('id_medicamento')->nullable()->comment('ID del artículo/medicamento en el inventario');

            // Control
            $table->tinyInteger('estado')->default(1)->comment('1: Entregado, 2: Pendiente, 3: Cancelado');
            $table->string('comprobante', 255)->nullable()->comment('Referencia de comprobante o documento');
            $table->string('firma_paciente', 255)->nullable()->comment('Ruta de firma digital del paciente');
            $table->string('firma_profesional', 255)->nullable()->comment('Ruta de firma digital del profesional');

            // Auditoría
            $table->timestamps();
            $table->softDeletes()->comment('Eliminación lógica');

            // Índices
            $table->index('id_antecedente');
            $table->index('id_paciente');
            $table->index('id_profesional');
            $table->index('id_usuario');
            $table->index('fecha_entrega');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_medicamentos_cronicos');
    }
};
