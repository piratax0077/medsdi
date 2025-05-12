<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesCmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes_cm', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_box');
            $table->string('tipo_box');
            $table->string('tipo_especializacion')->nullable();
            $table->string('ubicacion');
            $table->string('seccion');
            $table->string('observaciones')->nullable();
            $table->integer('id_servicio')->nullable();
            $table->integer('estado')->default(1);
            $table->integer('id_usuario')->nullable();
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
        Schema::dropIfExists('boxes_cm');
    }
}
