<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_profesional', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->integer('id_profesional');
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
        Schema::dropIfExists('mensajes_profesional');
    }
}
