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
        Schema::table('ficha_gineco_obstetrica', function (Blueprint $table) {
            $table->longText('diagnostico_html')->nullable()->after('hipotesis_diagnostico')->comment('HTML del informe escrito');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ficha_gineco_obstetrica', function (Blueprint $table) {
            $table->dropColumn('diagnostico_html');
        });
    }
};
