<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesFarmaciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_farmacia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_farmacia')->nullable();
            $table->string('farmacia_nombre');
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_termino')->nullable();
            $table->enum('tipo', ['control_stock','vencimientos','fiscalizacion','coordinacion','otro'])->default('control_stock');
            $table->string('responsable')->nullable();
            $table->string('enlace_jitsi', 500)->nullable();
            $table->enum('estado', ['en_curso','finalizada','cancelada','pendiente'])->default('finalizada');
            $table->text('acta')->nullable();
            $table->json('productos_verificados')->nullable();
            $table->timestamps();

            $table->foreign('id_farmacia')->references('id')->on('farmacias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controles_farmacia');
    }
}
