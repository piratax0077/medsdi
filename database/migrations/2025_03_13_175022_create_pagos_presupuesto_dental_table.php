<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosPresupuestoDentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_presupuesto_dental', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_lugar_atencion');
            $table->integer('id_ficha_atencion');
            $table->integer('id_presupuesto');
            $table->integer('id_metodo_pago');
            $table->string('metodo_pago');
            $table->double('total');
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('pagos_presupuesto_dental');
    }
}
