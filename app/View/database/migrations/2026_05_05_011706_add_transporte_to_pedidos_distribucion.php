<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransporteToPedidosDistribucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_distribucion', function (Blueprint $table) {
            $table->string('medio_transporte')->nullable()->after('observaciones');
            $table->string('empresa_transporte')->nullable()->after('medio_transporte');
            $table->string('numero_seguimiento')->nullable()->after('empresa_transporte');
            $table->string('direccion_envio')->nullable()->after('numero_seguimiento');
            $table->enum('estado_envio', ['pendiente', 'en_preparacion', 'despachado', 'entregado'])->default('pendiente')->after('direccion_envio');
            $table->timestamp('fecha_despacho')->nullable()->after('estado_envio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_distribucion', function (Blueprint $table) {
            $table->dropColumn(['medio_transporte', 'empresa_transporte', 'numero_seguimiento', 'direccion_envio', 'estado_envio', 'fecha_despacho']);
        });
    }
}
