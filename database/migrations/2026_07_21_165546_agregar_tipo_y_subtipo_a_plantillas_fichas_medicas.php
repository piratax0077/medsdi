<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarTipoYSubtipoAPlantillasFichasMedicas extends Migration
{
    public function up()
    {
        Schema::table('plantillas_fichas_medicas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tipo_especialidad')
                ->nullable()
                ->after('id_especialidad');

            $table->unsignedBigInteger('id_sub_tipo_especialidad')
                ->nullable()
                ->after('id_tipo_especialidad');

            $table->index([
                'id_profesional',
                'id_especialidad',
                'id_tipo_especialidad',
                'id_sub_tipo_especialidad',
                'activa'
            ], 'idx_plantilla_prof_especialidad');
        });
    }

    public function down()
    {
        Schema::table('plantillas_fichas_medicas', function (Blueprint $table) {
            $table->dropIndex('idx_plantilla_prof_especialidad');

            $table->dropColumn([
                'id_tipo_especialidad',
                'id_sub_tipo_especialidad'
            ]);
        });
    }
}

