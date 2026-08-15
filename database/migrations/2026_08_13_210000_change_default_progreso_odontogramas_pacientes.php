<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE odontogramas_pacientes MODIFY progreso TINYINT UNSIGNED NOT NULL DEFAULT 0');
        // Estado clínico 0 + progreso 25 identifica registros que conservaron
        // el valor inicial anterior y nunca fueron avanzados manualmente.
        DB::table('odontogramas_pacientes')
            ->where('estado', 0)
            ->where('progreso', 25)
            ->update(['progreso' => 0]);
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE odontogramas_pacientes MODIFY progreso TINYINT UNSIGNED NOT NULL DEFAULT 25');
    }
};
