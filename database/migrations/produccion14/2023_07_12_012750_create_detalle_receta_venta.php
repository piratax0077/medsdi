<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRecetaVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_receta_venta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_detalle_receta');
            $table->string('producto')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('estado')->default('1')->nullable();
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
        Schema::dropIfExists('detalle_receta_venta');
    }
}
