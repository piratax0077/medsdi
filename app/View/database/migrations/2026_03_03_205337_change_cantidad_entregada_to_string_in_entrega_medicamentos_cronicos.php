<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCantidadEntregadaToStringInEntregaMedicamentosCronicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('string_in_entrega_medicamentos_cronicos', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('string_in_entrega_medicamentos_cronicos', function (Blueprint $table) {
            //
        });
    }
}
