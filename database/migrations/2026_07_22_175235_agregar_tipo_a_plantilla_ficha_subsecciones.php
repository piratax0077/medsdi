<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarTipoAPlantillaFichaSubsecciones extends Migration
{
     /**
     * Agrega el tipo de control a las subsecciones y corrige los registros
     * base que antiguamente quedaron guardados como NULL o textarea.
     */
    public function up()
    {
        $tabla = 'plantillas_ficha_subsecciones';

        if (!Schema::hasTable($tabla)) {
            throw new RuntimeException(
                "No existe la tabla {$tabla}. Revise el nombre definido en el modelo de subsecciones."
            );
        }

        if (!Schema::hasColumn($tabla, 'tipo')) {
            Schema::table($tabla, function (Blueprint $table) {
                $table->string('tipo', 50)
                    ->nullable()
                    ->after('nombre');
            });
        }

        /*
         * Subsecciones que en la ficha real se representan mediante
         * interruptores/checkbox y no mediante campos de texto.
         */
        DB::table($tabla)
            ->whereIn('codigo', [
                'agregar_antecedente',
                'control_cronico',
                'ges',
                'confidencial',
                'urgencia_quirurgica',
                'interconsulta_psiquiatria',
                'informe_psicologico',
            ])
            ->update([
                'tipo' => 'switch',
            ]);

        /*
         * Los registros antiguos sin tipo continúan siendo campos de texto,
         * que es el comportamiento predeterminado del personalizador.
         */
        DB::table($tabla)
            ->whereNull('tipo')
            ->update([
                'tipo' => 'textarea',
            ]);
    }

    /**
     * No se elimina la columna al revertir para evitar pérdida de los tipos
     * que ya hayan sido guardados por los profesionales.
     */
    public function down()
    {
        // Reversión intencionalmente no destructiva.
    }
}
