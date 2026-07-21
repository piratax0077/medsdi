<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillaFichaSubseccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas_ficha_subsecciones', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('id_seccion');

    $table->string('codigo', 100);
    $table->string('nombre', 150);

    $table->boolean('visible')->default(true);
    $table->boolean('personalizada')->default(false);

    $table->unsignedInteger('orden')->default(0);

    $table->timestamps();

    $table->foreign('id_seccion')
        ->references('id')
        ->on('plantillas_ficha_secciones')
        ->cascadeOnDelete();

    $table->unique([
        'id_seccion',
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
        Schema::dropIfExists('plantilla_ficha_subseccions');
    }
}
