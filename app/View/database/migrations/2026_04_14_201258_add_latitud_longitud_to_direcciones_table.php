<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatitudLongitudToDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('direcciones', function (Blueprint $table) {
            $table->decimal('latitud', 10, 7)->nullable()->after('numero_dir');
            $table->decimal('longitud', 10, 7)->nullable()->after('latitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('direcciones', function (Blueprint $table) {
            $table->dropColumn(['latitud', 'longitud']);
        });
    }
}
