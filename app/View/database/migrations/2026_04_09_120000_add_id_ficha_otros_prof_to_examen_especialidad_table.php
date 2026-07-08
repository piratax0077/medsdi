<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdFichaOtrosProfToExamenEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->bigInteger('id_ficha_otros_prof')->nullable()->after('id_ficha_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->dropColumn('id_ficha_otros_prof');
        });
    }
}
