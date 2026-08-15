<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGestionInsumosFieldsToProductos extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'id_profesional')) {
                $table->unsignedBigInteger('id_profesional')->nullable()->after('id');
                $table->index('id_profesional');
            }
            if (!Schema::hasColumn('productos', 'ubicacion')) {
                $table->string('ubicacion', 100)->nullable();
            }
            if (!Schema::hasColumn('productos', 'stock_seguridad')) {
                $table->integer('stock_seguridad')->default(0);
            }
            if (!Schema::hasColumn('productos', 'precio_compra')) {
                $table->decimal('precio_compra', 12, 2)->default(0);
            }
            if (!Schema::hasColumn('productos', 'precio_venta')) {
                $table->decimal('precio_venta', 12, 2)->default(0);
            }
            if (!Schema::hasColumn('productos', 'estado')) {
                $table->boolean('estado')->default(true);
            }
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            if (Schema::hasColumn('productos', 'id_profesional')) {
                $table->dropIndex(['id_profesional']);
            }
            foreach (['id_profesional', 'ubicacion', 'stock_seguridad', 'precio_compra', 'precio_venta', 'estado'] as $column) {
                if (Schema::hasColumn('productos', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
