<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioInternoSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_interno_salas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_servicio_interno');
            $table->string('id_sala_servicio');
            $table->string('nombre_sala')->nullable();
            $table->string('tipo_sala');
            $table->integer('cantidad_camas');
            $table->integer('estado');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('servicio_interno_salas');
    }
}
