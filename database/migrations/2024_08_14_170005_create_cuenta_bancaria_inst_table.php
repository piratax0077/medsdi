<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaBancariaInstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_bancaria_inst', function (Blueprint $table) {
            $table->id();
            $table->string('rut_titular');
            $table->string('nombre_titular');
            $table->string('numero_cuenta');
            $table->integer('id_institucion');
            $table->integer('id_banco');
            $table->integer('id_tipo_cuenta');
            $table->integer('id_responsable');
            $table->string('email');
            $table->string('telefono');
            $table->string('estado');
            $table->string('observaciones');
            $table->string('rut_representante')->nullable();
            $table->string('nombre_representante')->nullable();
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
        Schema::dropIfExists('cuenta_bancaria_inst');
    }
}
