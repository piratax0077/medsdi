<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasCm2024table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_cm', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo_area_cm');
            $table->integer('id_responsable');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('otro')->nullable();
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
        Schema::dropIfExists('areas_cm');
    }
}
