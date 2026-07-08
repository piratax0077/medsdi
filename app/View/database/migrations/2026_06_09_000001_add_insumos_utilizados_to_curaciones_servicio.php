<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInsumosUtilizadosToCuracionesServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curaciones_servicio', function (Blueprint $table) {
            // Almacena los insumos utilizados en la curación en formato JSON
            $table->longText('insumos_utilizados')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curaciones_servicio', function (Blueprint $table) {
            $table->dropColumn('insumos_utilizados');
        });
    }
}
