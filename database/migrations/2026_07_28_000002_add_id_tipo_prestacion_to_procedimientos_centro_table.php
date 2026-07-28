<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('procedimientos_centro', function (Blueprint $table) {
            $table->foreignId('id_tipo_prestacion')
                ->nullable()
                ->after('id_sub_tipo_especialidad')
                ->constrained('tipo_prestaciones')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('procedimientos_centro', function (Blueprint $table) {
            $table->dropForeign(['id_tipo_prestacion']);
            $table->dropColumn('id_tipo_prestacion');
        });
    }
};
