<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPacienteIdToTratamientosInyectablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tratamientos_inyectables', function (Blueprint $table) {
            $table->unsignedBigInteger('paciente_id')->nullable()->after('ficha_atencion_id');
            $table->index('paciente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tratamientos_inyectables', function (Blueprint $table) {
            $table->dropIndex(['paciente_id']);
            $table->dropColumn('paciente_id');
        });
    }
}
