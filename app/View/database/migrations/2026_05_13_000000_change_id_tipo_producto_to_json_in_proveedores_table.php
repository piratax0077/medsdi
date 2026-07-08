<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('proveedores', function (Blueprint $table) {
            // Cambiar id_tipo_producto a JSON para soportar múltiples productos
            $table->json('id_tipo_producto')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proveedores', function (Blueprint $table) {
            // Restaurar a integer
            $table->integer('id_tipo_producto')->nullable()->change();
        });
    }
};
