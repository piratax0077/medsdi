<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesReparacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('solicitudes_reparacion_reclamo')) {
            Schema::create('solicitudes_reparacion_reclamo', function (Blueprint $table) {
                $table->id();
                $table->enum('tipo', ['reparacion', 'reclamo'])->comment('Tipo de solicitud');
                $table->unsignedBigInteger('id_cliente')->comment('ID del cliente');
                $table->unsignedBigInteger('id_producto')->comment('ID del producto');
                $table->unsignedBigInteger('id_profesional')->nullable()->comment('ID del profesional que gestiona');
                $table->unsignedBigInteger('id_producto_reemplazo')->nullable()->comment('ID del producto de reemplazo (si aplica)');
                $table->longText('detalles')->comment('Detalles del problema o reclamo');
                $table->enum('estado', ['pendiente', 'en_proceso', 'resuelto', 'rechazado'])->default('pendiente')->comment('Estado de la solicitud');
                $table->timestamps();

                // Índices
                $table->index('id_cliente');
                $table->index('id_producto');
                $table->index('tipo');
                $table->index('estado');
                $table->index('created_at');

                // Foreign keys
                $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
                $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
                $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('set null');
                $table->foreign('id_producto_reemplazo')->references('id')->on('productos')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_reparacion_reclamo');
    }
}
