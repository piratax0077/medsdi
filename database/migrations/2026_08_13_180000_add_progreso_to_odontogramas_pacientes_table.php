<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('odontogramas_pacientes', function (Blueprint $table) {
            $table->unsignedTinyInteger('progreso')->default(25)->after('estado');
        });

        DB::table('odontogramas_pacientes')
            ->where('estado', 1)
            ->update(['progreso' => 100]);
    }

    public function down(): void
    {
        Schema::table('odontogramas_pacientes', function (Blueprint $table) {
            $table->dropColumn('progreso');
        });
    }
};
