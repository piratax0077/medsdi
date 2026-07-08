<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->integer('estado')->default(0)->after('id')->comment('0=Normal, 1=Conflictivo, 2=VIP, 3=Restricciones, 4=Deuda, 5=Moroso, 6=Prioritario, 7=Otro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
}
