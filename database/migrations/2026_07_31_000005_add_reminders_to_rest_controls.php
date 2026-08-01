<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rest_controls', function (Blueprint $table) {
            $table->timestamp('last_reminder_at')->nullable()->after('accepted_at');
            $table->timestamp('next_reminder_at')->nullable()->after('last_reminder_at')->index();
        });
    }

    public function down(): void
    {
        Schema::table('rest_controls', function (Blueprint $table) {
            $table->dropIndex(['next_reminder_at']);
            $table->dropColumn(['last_reminder_at', 'next_reminder_at']);
        });
    }
};
