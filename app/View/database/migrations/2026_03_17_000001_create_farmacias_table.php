<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmaciasTable extends Migration
{
    public function up()
    {
        // Si la tabla ya existe (creación parcial previa), no volver a crearla
        if (!Schema::hasTable('farmacias')) {
            Schema::create('farmacias', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                // Limitado a 191 caracteres para evitar error de clave demasiado larga en MySQL con utf8mb4
                $table->string('codigo', 191)->nullable()->unique()->comment('Código o identificador interno');
                $table->unsignedBigInteger('id_lugar_atencion')->nullable();
                $table->string('tipo')->nullable()->comment('hospitalaria, comunitaria, dispensario, otra');
                $table->string('responsable')->nullable()->comment('Nombre del responsable/encargado');
                $table->string('rut_responsable')->nullable();
                $table->string('telefono')->nullable();
                $table->string('email')->nullable();
                $table->string('direccion')->nullable();
                $table->unsignedBigInteger('id_region')->nullable()->comment('FK tabla regiones');
                $table->unsignedBigInteger('id_ciudad')->nullable()->comment('FK tabla ciudades (comuna)');
                $table->text('horario')->nullable()->comment('Descripción libre del horario de atención');
                $table->string('dias_atencion')->nullable()->comment('Días de atención, separados por coma. Ej: 1,2,3,4,5');
                $table->time('hora_entrada')->nullable()->comment('Hora de entrada / apertura');
                $table->time('hora_salida')->nullable()->comment('Hora de salida / cierre');
                $table->tinyInteger('estado')->default(1)->comment('1=activo, 0=inactivo');
                $table->text('observaciones')->nullable();
                $table->timestamps();

                $table->foreign('id_lugar_atencion')
                      ->references('id')
                      ->on('lugares_atencion')
                      ->onDelete('set null');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('farmacias');
    }
}
