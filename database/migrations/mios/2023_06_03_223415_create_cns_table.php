<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_responsable');
            $table->bigInteger('id_tipo_control');
            $table->longtext('data');
            $table->longtext('diagnosticos');
            $table->string('template',5);
            $table->string('estado',3);
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
        Schema::dropIfExists('cns');
    }
}
