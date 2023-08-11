<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalizar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalizar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_institucion');
            $table->integer('id_lugar_atencion');
            $table->integer('id_profesional');
            $table->string('seccion_especialidad_hosp')->nullable(); // general / traumatologia / quemado / oncologiza / pediatra
            $table->integer('id_paciente');
            $table->integer('id_sol_pabellon');
            $table->integer('id_orden_hosp');
            $table->string('hospen');
            $table->string('obs_hospen');
            $table->string('nom_inst');
            $table->string('hosp_enserv');
            $table->string('obs_hosp_enserv');
            $table->string('motivo_hosp');
            $table->string('obs_motivo_hosp');
            $table->string('obs_hospitalizar');
            $table->string('estado');
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
        Schema::dropIfExists('hospitalizar');
    }
}
