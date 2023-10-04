<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaManualReceta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_manual_receta', function (Blueprint $table) {

            $table->id();

            $table->longText('id_ficha');
            $table->longText('id_paciente');
            $table->longText('id_profesional');
            $table->longText('id_institucion');
            $table->longText('id_medicamento');
            $table->longText('medicamento')->nullable();
            $table->longText('cantidad');
            $table->longText('vendida');
            $table->longText('tipo')->nullable();
            $table->longText('control')->nullable();

            $table->longText('nombre')->nullable();
            $table->longText('rut')->nullable();
            $table->longText('edad')->nullable();
            $table->longText('direccion')->nullable();
            $table->longText('estado_manual')->nullable();

            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('venta_manual_receta');
    }
}
