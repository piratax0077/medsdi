<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContadoresLugarAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contadores_lugar_atencion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contador');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->string('token')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->bigInteger('id_institucion')->nullable();
            $table->integer('examen')->default(0);
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('contadores_lugar_atencion');
    }
}
