<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDomiciliarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_domiciliario', function (Blueprint $table) {
            $table->id();
            $table->text('medicamentos')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_termino')->nullable();
            $table->date('fecha')->nullable();
            $table->string('cc_hora')->nullable();
            $table->string('sitio_puncion')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->string('procedimiento')->nullable();
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->timestamps();

            // Foreign keys (opcional, ajustar según tus necesidades)
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('set null');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('ficha_atencion')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugar_atencion')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_domiciliario');
    }
}
