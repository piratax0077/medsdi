<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orden', function (Blueprint $table) {
            if (!Schema::hasColumn('orden', 'id_profesional_convenio')) {
                $table->unsignedBigInteger('id_profesional_convenio')
                    ->nullable()
                    ->index()
                    ->after('id_profesional');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orden', function (Blueprint $table) {
            if (Schema::hasColumn('orden', 'id_profesional_convenio')) {
                $table->dropIndex(['id_profesional_convenio']);
                $table->dropColumn('id_profesional_convenio');
            }
        });
    }
};
