<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPedidoToPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pedido')->nullable()->after('id_cliente')->comment('Referencia al pedido de distribución');
            $table->foreign('id_pedido')
                ->references('id')
                ->on('pedidos_distribucion')
                ->onDelete('set null');
            $table->index('id_pedido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign(['id_pedido']);
            $table->dropIndex(['id_pedido']);
            $table->dropColumn('id_pedido');
        });
    }
}
