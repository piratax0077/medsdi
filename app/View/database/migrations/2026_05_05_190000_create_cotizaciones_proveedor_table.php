<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesProveedorTable extends Migration
{
    public function up()
    {
        Schema::create('cotizaciones_proveedor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_proveedor');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('numero_cotizacion', 50)->nullable();
            $table->date('fecha_emision');
            $table->date('fecha_validez')->nullable();
            $table->enum('estado', ['borrador', 'enviada', 'respondida', 'aceptada', 'rechazada', 'anulada'])->default('borrador');
            $table->text('observaciones')->nullable();
            $table->double('total_estimado')->default(0);
            $table->text('respuesta_proveedor')->nullable();
            $table->timestamps();
        });

        Schema::create('cotizaciones_proveedor_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cotizacion');
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->string('descripcion_producto')->nullable();
            $table->integer('cantidad')->default(1);
            $table->double('precio_estimado')->nullable();
            $table->double('precio_ofertado')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizaciones_proveedor_detalle');
        Schema::dropIfExists('cotizaciones_proveedor');
    }
}
