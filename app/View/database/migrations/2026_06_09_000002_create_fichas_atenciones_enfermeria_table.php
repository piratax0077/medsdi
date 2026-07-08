<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasAtencionesEnfermeriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_atenciones_enfermeria', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_hora_medica')->nullable();

            // Motivo de la consulta
            $table->string('motivo')->nullable();
            $table->text('anamnesis')->nullable();

            // Signos vitales
            $table->string('temperatura')->nullable();
            $table->string('pulso')->nullable();
            $table->string('frecuencia_reposo')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('estado_nutricional')->nullable();
            $table->string('pas')->nullable();
            $table->string('pad')->nullable();
            $table->string('pam')->nullable();

            // Presión arterial
            $table->string('presion_bi')->nullable();
            $table->string('presion_bd')->nullable();
            $table->string('presion_de_pie')->nullable();
            $table->string('presion_sentado')->nullable();

            // Comunicación y traslado
            $table->string('ct_estado_conciencia')->nullable();
            $table->string('ct_lenguaje')->nullable();
            $table->string('ct_traslado')->nullable();

            // Nutricionistas referenciados en documentos adjuntos
            $table->unsignedBigInteger('nutricionista_evaluacion')->nullable();
            $table->unsignedBigInteger('nutricionista_pauta')->nullable();

            // Datos adicionales enviados desde el formulario (JSON)
            $table->longText('examenes')->nullable();
            $table->longText('examenes_esp')->nullable();
            $table->longText('medicamentos')->nullable();

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
        Schema::dropIfExists('fichas_atenciones_enfermeria');
    }
}
