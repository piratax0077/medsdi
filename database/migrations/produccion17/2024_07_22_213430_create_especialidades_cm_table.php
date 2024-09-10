<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesCmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades_cm', function (Blueprint $table) {
            $table->id();
            $table->integer('id_especialidad');
            $table->integer('id_servicio');
            $table->integer('id_institucion');
            $table->integer('id_admin');
            $table->integer('estado');
            $table->integer('numero_especialistas');
            $table->integer('numero_pacientes')->nullable();
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('especialidades_cm');
    }
}
