<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesProfesionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones_profesionales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_profesional');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('total_dias');
            $table->text('observaciones')->nullable();
            $table->tinyInteger('notificar_profesional')->default(0);
            $table->tinyInteger('estado')->default(1);
            $table->unsignedBigInteger('id_usuario_registro')->nullable();
            $table->timestamps();

            // Índices y relaciones
            $table->foreign('id_profesional')->references('id')->on('profesional');
            $table->foreign('id_usuario_registro')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacaciones_profesionales');
    }
}
