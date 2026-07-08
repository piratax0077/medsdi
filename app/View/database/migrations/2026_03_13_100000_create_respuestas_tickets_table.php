<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('respuestas_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->longText('contenido');
            $table->enum('estado_nuevo', ['abierta', 'en_progreso', 'resuelta', 'cerrada'])->nullable();
            $table->timestamps();

            $table->foreign('solicitud_id')->references('id')->on('solicitudes_soporte')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuestas_tickets');
    }
}
