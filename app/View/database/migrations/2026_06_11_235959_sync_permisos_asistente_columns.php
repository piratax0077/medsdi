<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SyncPermisosAsistenteColumns extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('permisos_asistente')) {
            return;
        }

        Schema::table('permisos_asistente', function (Blueprint $table) {
            if (!Schema::hasColumn('permisos_asistente', 'permiso_cotizar')) {
                $table->boolean('permiso_cotizar')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_confirmar_hora')) {
                $table->boolean('permiso_confirmar_hora')->default(false)->after('permiso_cotizar');
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_anular_hora')) {
                $table->boolean('permiso_anular_hora')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_subir_ver_archivos')) {
                $table->boolean('permiso_subir_ver_archivos')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_eliminar_archivos')) {
                $table->boolean('permiso_eliminar_archivos')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_editar_pacientes')) {
                $table->boolean('permiso_editar_pacientes')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_ver_pacientes')) {
                $table->boolean('permiso_ver_pacientes')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_agendar_horas_extras')) {
                $table->boolean('permiso_agendar_horas_extras')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_agendar_examenes')) {
                $table->boolean('permiso_agendar_examenes')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_transcripcion_examenes')) {
                $table->boolean('permiso_transcripcion_examenes')->default(false);
            }
            if (!Schema::hasColumn('permisos_asistente', 'permiso_entrega_caja')) {
                $table->boolean('permiso_entrega_caja')->default(false);
            }
        });
    }

    public function down()
    {
        // Sin rollback destructivo para entorno productivo.
    }
}
