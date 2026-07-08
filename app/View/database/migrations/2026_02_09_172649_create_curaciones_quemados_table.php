<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuracionesQuemadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curaciones_quemados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_responsable');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->json('datos_valoracion_quemados');
            $table->json('datos_curacion_quemados');
            $table->string('estado')->default('completado');
            $table->boolean('activo')->default(1);
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('ficha_atencion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curaciones_quemados');
    }
}
