<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdClienteToCarritoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrito_compras', function (Blueprint $table) {
            if (!Schema::hasColumn('carrito_compras', 'id_cliente')) {
                $table->unsignedBigInteger('id_cliente')->nullable()->after('id_paciente')->comment('Cliente al que se venderá (para distribuidores)');
                $table->index('id_cliente');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrito_compras', function (Blueprint $table) {
            if (Schema::hasColumn('carrito_compras', 'id_cliente')) {
                $table->dropIndex(['id_cliente']);
                $table->dropColumn('id_cliente');
            }
        });
    }
}
