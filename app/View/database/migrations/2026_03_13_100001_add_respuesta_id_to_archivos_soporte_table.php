<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRespuestaIdToArchivosSoporteTable extends Migration
{
    public function up()
    {
        Schema::table('archivos_soporte', function (Blueprint $table) {
            $table->unsignedBigInteger('respuesta_id')->nullable()->after('solicitud_id');
            $table->foreign('respuesta_id')->references('id')->on('respuestas_tickets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('archivos_soporte', function (Blueprint $table) {
            $table->dropForeign(['respuesta_id']);
            $table->dropColumn('respuesta_id');
        });
    }
}
