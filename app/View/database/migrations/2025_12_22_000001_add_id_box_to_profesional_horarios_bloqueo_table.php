<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('profesional_horarios_bloqueo', function (Blueprint $table) {
            $table->unsignedBigInteger('id_box')->nullable()->after('id_profesional');

            // Si tienes una tabla de boxes y quieres agregar la foreign key, descomenta la siguiente línea
            // $table->foreign('id_box')->references('id')->on('boxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('profesional_horarios_bloqueo', function (Blueprint $table) {
            // Primero eliminar la foreign key si existe
            // $table->dropForeign(['id_box']);

            $table->dropColumn('id_box');
        });
    }
};
