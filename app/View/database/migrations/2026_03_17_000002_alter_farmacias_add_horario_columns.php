<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterFarmaciasAddHorarioColumns extends Migration
{
    public function up()
    {
        Schema::table('farmacias', function (Blueprint $table) {
            if (!Schema::hasColumn('farmacias', 'id_region')) {
                $table->unsignedBigInteger('id_region')->nullable()
                      ->comment('FK tabla regiones')
                      ->after('direccion');
            }
            if (!Schema::hasColumn('farmacias', 'id_ciudad')) {
                $table->unsignedBigInteger('id_ciudad')->nullable()
                      ->comment('FK tabla ciudades (comuna)')
                      ->after('id_region');
            }
            if (!Schema::hasColumn('farmacias', 'dias_atencion')) {
                $table->string('dias_atencion')->nullable()
                      ->comment('Días de atención, separados por coma. Ej: 1,2,3,4,5')
                      ->after('horario');
            }
            if (!Schema::hasColumn('farmacias', 'hora_entrada')) {
                $table->time('hora_entrada')->nullable()
                      ->comment('Hora de entrada / apertura')
                      ->after('dias_atencion');
            }
            if (!Schema::hasColumn('farmacias', 'hora_salida')) {
                $table->time('hora_salida')->nullable()
                      ->comment('Hora de salida / cierre')
                      ->after('hora_entrada');
            }
        });

        // Agregar índice único en 'codigo' si no existe (puede haber quedado pendiente por error de longitud)
        $indices = DB::select("SHOW INDEX FROM `farmacias` WHERE Key_name = 'farmacias_codigo_unique'");
        if (empty($indices)) {
            // Modificar la columna a VARCHAR(191) y agregar el índice único
            DB::statement('ALTER TABLE `farmacias` MODIFY `codigo` VARCHAR(191) NULL COMMENT \'Código o identificador interno\'');
            DB::statement('ALTER TABLE `farmacias` ADD UNIQUE INDEX `farmacias_codigo_unique` (`codigo`)');
        }
    }

    public function down()
    {
        Schema::table('farmacias', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('farmacias', 'id_region'))     $columns[] = 'id_region';
            if (Schema::hasColumn('farmacias', 'id_ciudad'))     $columns[] = 'id_ciudad';
            if (Schema::hasColumn('farmacias', 'dias_atencion')) $columns[] = 'dias_atencion';
            if (Schema::hasColumn('farmacias', 'hora_entrada'))  $columns[] = 'hora_entrada';
            if (Schema::hasColumn('farmacias', 'hora_salida'))   $columns[] = 'hora_salida';
            if (!empty($columns)) $table->dropColumn($columns);
        });
    }
}
