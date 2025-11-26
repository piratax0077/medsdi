<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudHospitalizacionExtendidaTable extends Migration
{
    public function up(): void
    {
        Schema::create('solicitud_hospitalizacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_paciente');
            $table->string('tipo')->nullable(); // en caso de que uses tipo textual
            $table->string('hospen')->nullable();
            $table->text('obs_hosp')->nullable();
            $table->string('nom_inst')->nullable();
            $table->string('hosp_enserv')->nullable();
            $table->text('obs_hosp_enserv')->nullable();
            $table->string('motivo_hosp')->nullable();
            $table->text('obs_motivo_hosp')->nullable();
            $table->text('obs_hospitalizar')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();

            // Opcionalmente, puedes agregar relaciones foráneas:
            $table->foreign('id_ficha_atencion')->references('id')->on('ficha_atencion')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitud_hospitalizacion');
    }
}
