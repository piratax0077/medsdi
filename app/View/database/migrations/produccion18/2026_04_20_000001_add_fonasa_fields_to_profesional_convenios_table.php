<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFonasaFieldsToProfesionalConveniosTable extends Migration
{
    public function up()
    {
        Schema::table('profesional_convenios', function (Blueprint $table) {
            if (!Schema::hasColumn('profesional_convenios', 'nivel_fonasa')) {
                $table->tinyInteger('nivel_fonasa')->nullable()->after('valor_bon_fonasa');
            }
            if (!Schema::hasColumn('profesional_convenios', 'tpo_espera')) {
                $table->integer('tpo_espera')->nullable()->comment('Tiempo de espera en días')->after('nivel_fonasa');
            }
        });
    }

    public function down()
    {
        Schema::table('profesional_convenios', function (Blueprint $table) {
            $cols = ['nivel_fonasa', 'tpo_espera'];
            $existing = array_filter($cols, fn($c) => Schema::hasColumn('profesional_convenios', $c));
            if ($existing) {
                $table->dropColumn(array_values($existing));
            }
        });
    }
}
