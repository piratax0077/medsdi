<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillaFichaMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas_fichas_medicas', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('id_profesional');
    $table->unsignedBigInteger('id_especialidad');

    $table->string('nombre', 150);
    $table->boolean('activa')->default(true);
    $table->boolean('predeterminada')->default(false);

    /*
     * Sirve para mantener compatibilidad con fichas antiguas
     * cuando el profesional modifica la plantilla.
     */
    $table->unsignedInteger('version')->default(1);

    $table->timestamps();

    $table->foreign('id_profesional')
        ->references('id')
        ->on('profesionales');

    $table->foreign('id_especialidad')
        ->references('id')
        ->on('especialidades');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantilla_ficha_medicas');
    }
}
