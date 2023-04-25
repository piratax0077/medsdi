<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSugerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugerencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_prof_sugerencias');
            $table->dateTime('prof_sugerencias_fecha');
            $table->string('form_sugerencia');
            $table->string('form_sugerencias_especialidad');
            $table->string('obs_sugerencias');
            $table->bigInteger('estado');
            $table->string('otro');
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
        Schema::dropIfExists('sugerencias');
    }
}
