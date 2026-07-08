<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaPresentacionHomeopatiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_presentacion_homeopatia', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad', 255)->nullable()->comment('Cantidad');
            $table->string('tipo_presentacion', 255)->nullable()->comment('Tipo de presentación');
            $table->string('cant', 255)->nullable()->comment('Cantidad abreviada');
            $table->timestamps();

            // Índices para mejorar performance
            $table->index('tipo_presentacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receta_presentacion_homeopatia');
    }
}
