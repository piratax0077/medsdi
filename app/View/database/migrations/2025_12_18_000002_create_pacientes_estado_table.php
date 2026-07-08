<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_estado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->integer('estado')->comment('1=Conflictivo, 2=VIP, 3=Restricciones, 4=Deuda, 5=Moroso, 6=Prioritario, 7=Otro');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_responsable')->comment('ID del profesional responsable');
            $table->date('fecha');
            $table->text('observaciones');
            $table->timestamps();

            // Índices
            $table->index('id_paciente');
            $table->index('id_lugar_atencion');
            $table->index('estado');
            
            // Llaves foráneas (opcional, descomentar si deseas agregarlas)
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugar_atencion')->onDelete('cascade');
            // $table->foreign('id_responsable')->references('id')->on('profesionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes_estado');
    }
}
