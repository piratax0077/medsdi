<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatosValoracionLppToCuracionesLppServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Primero renombramos el campo existente datos_curacion_lpp a datos_valoracion_lpp
        Schema::table('curaciones_lpp_servicio', function (Blueprint $table) {
            $table->renameColumn('datos_curacion_lpp', 'datos_valoracion_lpp');
        });

        // Luego agregamos el nuevo campo datos_curacion_lpp
        Schema::table('curaciones_lpp_servicio', function (Blueprint $table) {
            $table->longText('datos_curacion_lpp')->nullable()->after('datos_valoracion_lpp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminamos el nuevo campo
        Schema::table('curaciones_lpp_servicio', function (Blueprint $table) {
            $table->dropColumn('datos_curacion_lpp');
        });

        // Revertimos el nombre del campo
        Schema::table('curaciones_lpp_servicio', function (Blueprint $table) {
            $table->renameColumn('datos_valoracion_lpp', 'datos_curacion_lpp');
        });
    }
}
