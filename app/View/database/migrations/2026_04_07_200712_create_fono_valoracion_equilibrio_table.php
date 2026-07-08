<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonoValoracionEquilibrioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fono_valoracion_equilibrio', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_hora_medica')->index();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->text('datos')->nullable()->comment('JSON con todos los campos del formulario');
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('fono_valoracion_equilibrio');
    }
}
