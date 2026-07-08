<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUsuarioToSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('sucursal', function (Blueprint $table) {
        //     $table->unsignedBigInteger('id_usuario')->nullable()->after('estado');
        // });

        Schema::table('laboratorios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sucursal')->nullable()->after('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('sucursal', function (Blueprint $table) {
        //     $table->dropColumn('id_usuario');
        // });

        Schema::table('laboratorios', function (Blueprint $table) {
            $table->dropColumn('id_sucursal');
        });
    }
}
