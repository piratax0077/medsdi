<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoConsultaInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_consulta_info', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_hora_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_call');
            $table->string('pass_call');
            $table->text('url_start');
            $table->text('url_join');
            $table->text('host_id');
            $table->string('host_email');
            $table->string('start_time');
            $table->longText('response');
            $table->integer('estado')->default( 1 ); //0: atendido, 1: en espera, 2: cancelado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_consulta_info');
    }
}
