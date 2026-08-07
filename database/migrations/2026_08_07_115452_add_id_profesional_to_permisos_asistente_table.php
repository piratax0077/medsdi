<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProfesionalToPermisosAsistenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos_asistente', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profesional')
                ->nullable()
                ->after('id_lugar_atencion');

            $table->foreign('id_profesional')
                ->references('id')
                ->on('profesionales')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos_asistente', function (Blueprint $table) {
            //
        });
    }
}
