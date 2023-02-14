<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaCirugiaGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table)
        {
            $table->string('eg_cpq_cg')->nullable()->after('obs_gen_ex_esp_cg');
            $table->string('hoc_cpa_cg')->nullable()->after('eg_cpq_cg');
            $table->string('masas_cpq_cg')->nullable()->after('hoc_cpa_cg');
            $table->string('obs_egp_cpq_cg')->nullable()->after('masas_cpq_cg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {
            $table->drop('eg_cpq_cg');
            $table->drop('hoc_cpa_cg');
            $table->drop('masas_cpq_cg');
            $table->drop('obs_egp_cpq_cg');
        });

    }
}
