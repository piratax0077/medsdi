<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProfesionalIdPacienteToOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            if (!Schema::hasColumn('ordenes', 'id_profesional')) {
                $table->unsignedBigInteger('id_profesional')->nullable()->after('profesional_id')->index();
            }
            if (!Schema::hasColumn('ordenes', 'id_paciente')) {
                $table->unsignedBigInteger('id_paciente')->nullable()->after('paciente_id')->index();
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
        Schema::table('ordenes', function (Blueprint $table) {
            if (Schema::hasColumn('ordenes', 'id_profesional')) {
                $table->dropColumn('id_profesional');
            }
            if (Schema::hasColumn('ordenes', 'id_paciente')) {
                $table->dropColumn('id_paciente');
            }
        });
    }
}
