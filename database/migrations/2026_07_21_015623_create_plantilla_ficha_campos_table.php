<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillaFichaCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas_ficha_campos', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('id_seccion')->nullable();
    $table->unsignedBigInteger('id_subseccion')->nullable();

    $table->string('codigo', 100);
    $table->string('nombre', 150);

    $table->string('tipo_campo', 50);
    $table->string('placeholder', 255)->nullable();

    $table->boolean('obligatorio')->default(false);
    $table->boolean('activo')->default(true);

    $table->json('configuracion')->nullable();
    $table->unsignedInteger('orden')->default(0);

    $table->timestamps();

    $table->foreign('id_seccion')
        ->references('id')
        ->on('plantillas_ficha_secciones')
        ->cascadeOnDelete();

    $table->foreign('id_subseccion')
        ->references('id')
        ->on('plantillas_ficha_subsecciones')
        ->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantilla_ficha_campos');
    }
}
