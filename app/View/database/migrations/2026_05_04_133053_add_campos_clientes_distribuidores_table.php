<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposClientesDistribuidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            // Agregar campos para distribuidores/clientes si no existen
            if (!Schema::hasColumn('clientes', 'email')) {
                $table->string('email')->nullable()->after('correo');
            }

            if (!Schema::hasColumn('clientes', 'tipo_producto')) {
                $table->string('tipo_producto')->nullable()->after('email');
            }

            if (!Schema::hasColumn('clientes', 'productos')) {
                $table->json('productos')->nullable()->after('tipo_producto');
            }

            if (!Schema::hasColumn('clientes', 'activo')) {
                $table->boolean('activo')->default(true)->after('productos');
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
        Schema::table('clientes', function (Blueprint $table) {
            // Eliminar los campos agregados
            if (Schema::hasColumn('clientes', 'email')) {
                $table->dropColumn('email');
            }

            if (Schema::hasColumn('clientes', 'tipo_producto')) {
                $table->dropColumn('tipo_producto');
            }

            if (Schema::hasColumn('clientes', 'productos')) {
                $table->dropColumn('productos');
            }

            if (Schema::hasColumn('clientes', 'activo')) {
                $table->dropColumn('activo');
            }
        });
    }
}
