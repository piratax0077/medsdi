<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosHomeopatiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_homeopatia', function (Blueprint $table) {
            $table->id();
            $table->string('cod_parent', 255)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->string('present', 255)->nullable();
            $table->string('cont_rec', 255)->nullable()->comment('Contenido por recipiente');
            $table->string('tipo_cont', 255)->nullable()->comment('Tipo de contenido');
            $table->string('dosis', 255)->nullable();
            $table->string('cant_comp', 255)->nullable()->comment('Cantidad de comprimidos');
            $table->string('cod_isp', 255)->nullable()->comment('Código ISP');
            $table->string('vigencia', 255)->nullable();
            $table->text('droga')->nullable()->comment('Descripción de la droga - hasta 5000 caracteres');
            $table->string('grupo', 255)->nullable();
            $table->string('temperatura', 255)->nullable()->comment('Condiciones de temperatura');
            $table->timestamps();

            // Índices para mejorar performance
            $table->index('cod_parent');
            $table->index('nombre');
            $table->index('cod_isp');
            $table->index('grupo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_homeopatia');
    }
}
