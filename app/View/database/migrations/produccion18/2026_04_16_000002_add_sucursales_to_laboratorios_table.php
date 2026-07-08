<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSucursalesToLaboratoriosTable extends Migration
{
    public function up()
    {
        Schema::table('laboratorios', function (Blueprint $table) {
            if (!Schema::hasColumn('laboratorios', 'sucursales')) {
                $table->tinyInteger('sucursales')->default(0)->after('id_direccion');
            }
        });
    }

    public function down()
    {
        Schema::table('laboratorios', function (Blueprint $table) {
            if (Schema::hasColumn('laboratorios', 'sucursales')) {
                $table->dropColumn('sucursales');
            }
        });
    }
}
