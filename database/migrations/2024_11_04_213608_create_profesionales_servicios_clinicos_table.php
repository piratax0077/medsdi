<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesServiciosClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales_servicios_clinicos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_servicio_interno');
            $table->integer('id_profesional');
            $table->string('observaciones')->nullable();
            $table->integer('estado')->default(1);
            $table->date('fecha');
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
        Schema::dropIfExists('profesionales_servicios_clinicos');
    }
}
