<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteSalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_sala', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_sala');
            $table->integer('id_cama');
            $table->date('fecha');
            $table->time('hora');
            $table->string('diagnostico');
            $table->integer('id_profesional_medico')->nullable();
            $table->integer('id_profesional_enfermera')->nullable();
            $table->string('otros')->nullable();
            $table->string('otros2')->nullable();
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
        Schema::dropIfExists('paciente_sala');
    }
}
