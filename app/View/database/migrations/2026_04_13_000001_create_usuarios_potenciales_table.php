<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios_potenciales', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 12)->nullable();
            $table->string('nombre', 150);
            $table->string('telefono', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->enum('estado', ['pendiente', 'contactado', 'sin_interes'])->default('pendiente');
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios_potenciales');
    }
};
