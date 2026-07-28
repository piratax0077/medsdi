<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('procedimientos_lugar_atencion_profesional', 'valor')) {
            Schema::table('procedimientos_lugar_atencion_profesional', function (Blueprint $table) {
                $table->decimal('valor', 12, 2)
                    ->nullable()
                    ->after('cantidad_bloques');
            });
        }

        DB::statement(
            'UPDATE procedimientos_lugar_atencion_profesional AS profesional
             INNER JOIN procedimientos_centro AS centro
                ON centro.id = profesional.id_procedimiento_centro
             SET profesional.valor = centro.valor
             WHERE profesional.valor IS NULL'
        );
    }

    public function down(): void
    {
        // No se elimina porque algunas instalaciones ya tenían esta columna
        // antes de que existiera la presente migración.
    }
};
