<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenEspecialidadTemplatev2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen_especialidad_template', function (Blueprint $table)
        {
            $table->text('alias')->nullable()->after('estructura');
        });

        Schema::table('examen_laboratorio_template', function (Blueprint $table)
        {
            $table->text('alias')->nullable()->after('estructura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen_especialidad_template', function (Blueprint $table) {
            $table->drop('alias');
        });

        Schema::table('examen_laboratorio_template', function (Blueprint $table) {
            $table->drop('alias');
        });
    }
}
