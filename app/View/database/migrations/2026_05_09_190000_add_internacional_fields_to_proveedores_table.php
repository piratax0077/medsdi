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
            $table->tinyInteger('tipo_procedencia')->default(1)->after('id_tipo_proveedor');
            $table->string('pais_internacional')->nullable()->after('otro2');
            $table->string('ciudad_internacional')->nullable()->after('pais_internacional');
            $table->string('sitio_web_internacional')->nullable()->after('ciudad_internacional');
            $table->text('referencias_internacionales')->nullable()->after('sitio_web_internacional');
            $table->string('contacto_internacional')->nullable()->after('referencias_internacionales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->dropColumn([
                'tipo_procedencia',
                'pais_internacional',
                'ciudad_internacional',
                'sitio_web_internacional',
                'referencias_internacionales',
                'contacto_internacional',
            ]);
        });
    }
};
