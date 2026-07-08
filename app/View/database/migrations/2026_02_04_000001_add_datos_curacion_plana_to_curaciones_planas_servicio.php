<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatosCuracionPlanaToCuracionesPlanasServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curaciones_planas_servicio', function (Blueprint $table) {
            // Renombrar el campo existente datos_curacion_plana a datos_valoracion_plana
            $table->renameColumn('datos_curacion_plana', 'datos_valoracion_plana');
        });
        
        Schema::table('curaciones_planas_servicio', function (Blueprint $table) {
            // Agregar el nuevo campo datos_curacion_plana para los datos del formulario de curación
            $table->longText('datos_curacion_plana')->nullable()->after('id_responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curaciones_planas_servicio', function (Blueprint $table) {
            // Eliminar el campo datos_curacion_plana
            $table->dropColumn('datos_curacion_plana');
        });
        
        Schema::table('curaciones_planas_servicio', function (Blueprint $table) {
            // Renombrar de vuelta datos_valoracion_plana a datos_curacion_plana
            $table->renameColumn('datos_valoracion_plana', 'datos_curacion_plana');
        });
    }
}
