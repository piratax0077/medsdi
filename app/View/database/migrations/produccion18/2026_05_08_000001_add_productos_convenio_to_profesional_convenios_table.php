<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductosConvenioToProfesionalConveniosTable extends Migration
{
    public function up()
    {
        Schema::table('profesional_convenios', function (Blueprint $table) {
            if (!Schema::hasColumn('profesional_convenios', 'productos_convenio')) {
                $table->text('productos_convenio')->nullable()->after('tpo_espera');
            }
        });
    }

    public function down()
    {
        Schema::table('profesional_convenios', function (Blueprint $table) {
            if (Schema::hasColumn('profesional_convenios', 'productos_convenio')) {
                $table->dropColumn('productos_convenio');
            }
        });
    }
}
