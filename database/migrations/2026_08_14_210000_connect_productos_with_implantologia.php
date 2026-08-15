<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectProductosWithImplantologia extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('productos', 'es_implante')) {
            Schema::table('productos', function (Blueprint $table) {
                $table->boolean('es_implante')->default(false)->after('estado');
                $table->unsignedBigInteger('id_marca_implante')->nullable()->after('es_implante');
                $table->unsignedTinyInteger('id_tipo_insumo_implantologia')->nullable()->after('id_marca_implante');
            });
        }
        if (!Schema::hasColumn('materiales_implantologia', 'id_producto')) {
            Schema::table('materiales_implantologia', function (Blueprint $table) {
                $table->unsignedBigInteger('id_producto')->nullable()->after('id');
                $table->index('id_producto');
            });
        }
    }

    public function down()
    {
        Schema::table('materiales_implantologia', function (Blueprint $table) {
            $table->dropIndex(['id_producto']);
            $table->dropColumn('id_producto');
        });
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['es_implante', 'id_marca_implante', 'id_tipo_insumo_implantologia']);
        });
    }
}
