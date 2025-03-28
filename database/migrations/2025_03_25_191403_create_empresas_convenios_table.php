<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_convenios', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->integer('id_convenio');
            $table->string('nombre_convenio');
            $table->double('porcentaje');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('observaciones');
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
        Schema::dropIfExists('empresas_convenios');
    }
}
