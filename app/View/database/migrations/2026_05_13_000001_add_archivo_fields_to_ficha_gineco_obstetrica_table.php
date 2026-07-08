<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivoFieldsToFichaGinecoObstetricaTable extends Migration
{
    public function up()
    {
        Schema::table('ficha_gineco_obstetrica', function (Blueprint $table) {
            $table->string('archivo')->nullable()->after('indicaciones');
            $table->tinyInteger('estado_archivo')->default(0)->after('archivo');
        });
    }

    public function down()
    {
        Schema::table('ficha_gineco_obstetrica', function (Blueprint $table) {
            $table->dropColumn(['archivo', 'estado_archivo']);
        });
    }
}
