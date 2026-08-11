<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfesionalTonsToControlesEnviosLaboratoriosTable extends Migration
{
    public function up()
    {
        Schema::table('controles_envios_laboratorios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profesional_tons')
                ->nullable()
                ->after('id_profesional');
            $table->index('id_profesional_tons', 'controles_envios_profesional_tons_index');
        });
    }

    public function down()
    {
        Schema::table('controles_envios_laboratorios', function (Blueprint $table) {
            $table->dropIndex('controles_envios_profesional_tons_index');
            $table->dropColumn('id_profesional_tons');
        });
    }
}
