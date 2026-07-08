<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaDosisHomeopatiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_dosis_homeopatia', function (Blueprint $table) {
            $table->id();
            $table->string('cod_parent', 255)->nullable()->comment('Código padre');
            $table->string('tipo_prod', 255)->nullable()->comment('Tipo de producto');
            $table->string('indic', 255)->nullable()->comment('Indicaciones');
            $table->timestamps();

            // Índices para mejorar performance
            $table->index('cod_parent');
            $table->index('tipo_prod');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receta_dosis_homeopatia');
    }
}
