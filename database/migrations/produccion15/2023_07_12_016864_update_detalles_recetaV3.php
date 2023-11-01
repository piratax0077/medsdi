<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDetalleRecetaV3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalles_receta', function (Blueprint $table) {
            $table->integer('cantidad')->default(0)->after('cantidad_compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalles_receta', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
}
