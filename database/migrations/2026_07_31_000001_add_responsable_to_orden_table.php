<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponsableToOrdenTable extends Migration
{
    public function up()
    {
        Schema::table('orden', function (Blueprint $table) {
            if (!Schema::hasColumn('orden', 'id_paciente_responsable')) {
                $table->unsignedBigInteger('id_paciente_responsable')->nullable()->after('id_paciente')->index();
            }
        });
    }

    public function down()
    {
        Schema::table('orden', function (Blueprint $table) {
            if (Schema::hasColumn('orden', 'id_paciente_responsable')) {
                $table->dropColumn('id_paciente_responsable');
            }
        });
    }
}
