<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillaFichaSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas_ficha_secciones', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('id_plantilla');

    /*
     * Código interno estable.
     * Ejemplo: motivo_consulta, diagnostico, examen_orl.
     */
    $table->string('codigo', 100);

    $table->string('nombre', 150);
    $table->string('tipo', 50)->default('sistema');

    $table->boolean('visible')->default(true);
    $table->boolean('obligatoria')->default(false);
    $table->boolean('personalizada')->default(false);

    $table->unsignedInteger('orden')->default(0);

    $table->timestamps();

    $table->foreign('id_plantilla')
        ->references('id')
        ->on('plantillas_fichas_medicas')
        ->cascadeOnDelete();

    $table->unique([
        'id_plantilla',
        'codigo',
    ]);
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantilla_ficha_seccions');
    }
}
