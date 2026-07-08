<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmacionPacienteToHorasMedicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->tinyInteger('estado_confirmacion_paciente')->nullable()->after('id_estado');
            $table->timestamp('fecha_confirmacion_paciente')->nullable()->after('estado_confirmacion_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->dropColumn(['estado_confirmacion_paciente', 'fecha_confirmacion_paciente']);
        });
    }
}
