<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasEnfermeriaDocumentosNutricionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_enfermeria_documentos_nutricion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_ficha_enfermeria')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_nutricionista')->nullable();

            // tipo: evaluacion | pauta
            $table->string('tipo')->nullable();

            $table->string('url')->nullable();
            $table->string('nombre_original')->nullable();
            $table->string('nombre_archivo')->nullable();
            $table->string('extension')->nullable();

            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('fichas_enfermeria_documentos_nutricion');
    }
}
