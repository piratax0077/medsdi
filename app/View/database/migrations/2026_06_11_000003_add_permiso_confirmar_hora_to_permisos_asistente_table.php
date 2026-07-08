<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermisoConfirmarHoraToPermisosAsistenteTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('permisos_asistente')) {
            return;
        }

        Schema::table('permisos_asistente', function (Blueprint $table) {
            if (!Schema::hasColumn('permisos_asistente', 'permiso_confirmar_hora')) {
                $table->boolean('permiso_confirmar_hora')->default(false)->after('permiso_cotizar');
            }
        });
    }

    public function down()
    {
        // No eliminamos columna en rollback para evitar impacto en producción.
    }
}
