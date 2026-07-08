<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_laboratorio')->nullable();
            $table->string('laboratorio_nombre');
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_termino')->nullable();
            $table->string('tipo')->default('control_stock');
            $table->string('responsable')->nullable();
            $table->string('enlace_jitsi')->nullable();
            $table->string('estado')->default('finalizada');
            $table->text('acta')->nullable();
            $table->json('productos_verificados')->nullable();
            $table->timestamps();

            $table->foreign('id_laboratorio')->references('id')->on('laboratorios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controles_laboratorio');
    }
}
