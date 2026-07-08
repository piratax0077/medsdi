<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosAsistenteTable extends Migration
{
    public function up()
    {
        Schema::create('permisos_asistente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_asistente')->unique();
            $table->boolean('permiso_cotizar')->default(false);
            $table->boolean('permiso_confirmar_hora')->default(false);
            $table->boolean('permiso_anular_hora')->default(false);
            $table->boolean('permiso_subir_ver_archivos')->default(false);
            $table->boolean('permiso_eliminar_archivos')->default(false);
            $table->boolean('permiso_editar_pacientes')->default(false);
            $table->boolean('permiso_ver_pacientes')->default(false);
            $table->boolean('permiso_agendar_horas_extras')->default(false);
            $table->boolean('permiso_agendar_examenes')->default(false);
            $table->boolean('permiso_transcripcion_examenes')->default(false);
            $table->boolean('permiso_entrega_caja')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permisos_asistente');
    }
}
