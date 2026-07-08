<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CajasOperativas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cajas_operativas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_caja');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->decimal('monto_inicial', 10, 2);
            $table->decimal('monto_final', 10, 2)->nullable();
            $table->timestamp('fecha_apertura')->useCurrent();
            $table->timestamp('fecha_cierre')->nullable();
            $table->timestamps();

            $table->foreign('id_caja')->references('id')->on('cajas');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajas_operativas');
    }
}
