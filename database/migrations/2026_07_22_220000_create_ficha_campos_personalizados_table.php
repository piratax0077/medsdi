<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaCamposPersonalizadosTable extends Migration
{
    public function up()
    {
        Schema::create('ficha_campos_personalizados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_plantilla_subseccion');
            $table->string('seccion_codigo', 100);
            $table->string('seccion_nombre', 150);
            $table->string('subseccion_codigo', 100);
            $table->string('subseccion_nombre', 150);
            $table->string('tipo', 50)->default('textarea');
            $table->longText('valor')->nullable();
            $table->timestamps();

            $table->index('id_ficha_atencion');

            $table->unique([
                'id_ficha_atencion',
                'id_plantilla_subseccion',
            ], 'ficha_campo_personalizado_unico');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ficha_campos_personalizados');
    }
}
