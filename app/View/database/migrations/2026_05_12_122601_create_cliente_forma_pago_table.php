<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteFormaPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_forma_pago', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_forma_pago');
            $table->tinyInteger('predeterminada')->default(0)->comment('Si es la forma de pago predeterminada');
            $table->tinyInteger('activo')->default(1);
            $table->timestamps();

            // Relaciones
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_forma_pago')->references('id')->on('formas_pago')->onDelete('cascade');

            // Índices
            $table->unique(['id_cliente', 'id_forma_pago']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_forma_pago');
    }
}
