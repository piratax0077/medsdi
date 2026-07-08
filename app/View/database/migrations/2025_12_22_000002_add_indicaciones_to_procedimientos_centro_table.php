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
        Schema::table('procedimientos_centro', function (Blueprint $table) {
            $table->text('indicaciones')->nullable()->after('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('procedimientos_centro', function (Blueprint $table) {
            $table->dropColumn('indicaciones');
        });
    }
};
