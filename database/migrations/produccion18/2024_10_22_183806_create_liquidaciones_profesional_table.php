<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidacionesProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidaciones_profesional', function (Blueprint $table) {
            $table->id();
            $table->integer('id_profesional');
            $table->integer('id_institucion');
            $table->integer('id_lugar_atencion');
            $table->double('monto_imponible');
            $table->integer('id_contrato')->nullable();
            $table->date('fecha');
            $table->integer('numero_atenciones');
            $table->double('descuentos');
            $table->double('porcentaje');
            $table->double('total');
            $table->integer('id_usuario');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('liquidaciones_profesional');
    }
}
