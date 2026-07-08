<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProfesionalIdPacienteToOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('orden')) {
            return;
        }

        Schema::table('orden', function (Blueprint $table) {
            if (!Schema::hasColumn('orden', 'id_profesional')) {
                $table->unsignedBigInteger('id_profesional')->nullable()->after('id')->index();
            }
            if (!Schema::hasColumn('orden', 'id_paciente')) {
                $table->unsignedBigInteger('id_paciente')->nullable()->after('id_profesional')->index();
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
        if (!Schema::hasTable('orden')) {
            return;
        }

        Schema::table('orden', function (Blueprint $table) {
            if (Schema::hasColumn('orden', 'id_profesional')) {
                $table->dropColumn('id_profesional');
            }
            if (Schema::hasColumn('orden', 'id_paciente')) {
                $table->dropColumn('id_paciente');
            }
        });
    }
}
