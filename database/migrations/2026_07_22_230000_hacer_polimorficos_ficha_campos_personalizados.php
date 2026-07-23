<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HacerPolimorficosFichaCamposPersonalizados extends Migration
{
    public function up()
    {
        Schema::table('ficha_campos_personalizados', function (Blueprint $table) {
            $table->dropUnique('ficha_campo_personalizado_unico');
            $table->dropIndex(['id_ficha_atencion']);
            $table->renameColumn('id_ficha_atencion', 'id_ficha');
        });

        Schema::table('ficha_campos_personalizados', function (Blueprint $table) {
            $table->string('tipo_ficha', 60)
                ->default('ficha_atencion')
                ->after('id');
            $table->index(['tipo_ficha', 'id_ficha']);
            $table->unique([
                'tipo_ficha',
                'id_ficha',
                'id_plantilla_subseccion',
            ], 'ficha_campo_personalizado_unico');
        });
    }

    public function down()
    {
        Schema::table('ficha_campos_personalizados', function (Blueprint $table) {
            $table->dropUnique('ficha_campo_personalizado_unico');
            $table->dropIndex(['tipo_ficha', 'id_ficha']);
            $table->dropColumn('tipo_ficha');
            $table->renameColumn('id_ficha', 'id_ficha_atencion');
        });

        Schema::table('ficha_campos_personalizados', function (Blueprint $table) {
            $table->index('id_ficha_atencion');
            $table->unique([
                'id_ficha_atencion',
                'id_plantilla_subseccion',
            ], 'ficha_campo_personalizado_unico');
        });
    }
}
