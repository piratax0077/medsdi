<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdLugarAtencionToPermisosAsistenteTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('permisos_asistente')) {
            return;
        }

        Schema::table('permisos_asistente', function (Blueprint $table) {
            if (!Schema::hasColumn('permisos_asistente', 'id_lugar_atencion')) {
                $table->unsignedBigInteger('id_lugar_atencion')->nullable()->after('id_asistente');
            }
        });

        // Ajustar unicidad para permitir permisos por asistente + lugar de atencion.
        try {
            Schema::table('permisos_asistente', function (Blueprint $table) {
                $table->dropUnique('permisos_asistente_id_asistente_unique');
            });
        } catch (\Throwable $th) {
            // El indice unico puede no existir dependiendo del estado de la BD.
        }

        try {
            Schema::table('permisos_asistente', function (Blueprint $table) {
                $table->unique(['id_asistente', 'id_lugar_atencion'], 'permisos_asistente_asistente_lugar_unique');
            });
        } catch (\Throwable $th) {
            // Si ya existe el indice compuesto, no hacemos nada.
        }
    }

    public function down()
    {
        // Sin rollback destructivo por seguridad en productivo.
    }
}
