<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesDifusionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_difusion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->json('destinatarios');
            $table->string('titulo');
            $table->string('asunto');
            $table->string('mensaje');
            $table->string('otros');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes_difusion');
    }
}
