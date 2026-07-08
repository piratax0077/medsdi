<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoCotizacionProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('seguimiento_cotizacion_proveedor')) {
            Schema::create('seguimiento_cotizacion_proveedor', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_cotizacion_proveedor');
                $table->unsignedBigInteger('id_usuario')->nullable();
                $table->longText('comentarios');
                $table->enum('tipo_seguimiento', ['comentario', 'estado_actualizado', 'archivo_adjunto', 'recordatorio'])->default('comentario');
                $table->timestamps();

                // Indexes
                $table->index('id_cotizacion_proveedor');
                $table->index('created_at');

                // Foreign keys
                $table->foreign('id_cotizacion_proveedor')
                    ->references('id')
                    ->on('cotizacion_proveedor')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('seguimiento_cotizacion_proveedor');
    }
}
