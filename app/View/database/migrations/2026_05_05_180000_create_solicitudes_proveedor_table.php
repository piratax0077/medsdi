<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesProveedorTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes_proveedor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->enum('tipo_pedido', ['mismo', 'nuevo'])->default('nuevo');
            $table->integer('cantidad')->nullable();
            $table->enum('urgencia', ['normal', 'urgente', 'critica'])->default('normal');
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['pendiente', 'enviada', 'recibida', 'cancelada'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes_proveedor');
    }
}
