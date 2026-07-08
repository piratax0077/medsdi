<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasRamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias_ram', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_medicamento');
            $table->string('principio_activo')->nullable();
            $table->string('laboratorio_fabricante')->nullable();
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('tipo_reaccion')->nullable(); // alergia, intolerancia, toxicidad, interaccion, otro
            $table->enum('gravedad', ['leve', 'moderada', 'grave', 'mortal'])->default('leve');
            $table->date('fecha_reaccion')->nullable();
            $table->text('descripcion_reaccion');
            $table->text('observaciones')->nullable();
            $table->string('accion_tomada')->nullable(); // suspendido, disminuido, mantenido, otro
            $table->enum('estado', ['pendiente', 'en_revision', 'cerrado'])->default('pendiente');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('set null');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('set null');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denuncias_ram');
    }
}
