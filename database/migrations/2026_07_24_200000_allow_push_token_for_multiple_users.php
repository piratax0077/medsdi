<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mobile_push_devices', function (Blueprint $table) {
            $table->dropUnique('mobile_push_devices_token_hash_unique');
            $table->unique(
                ['user_id', 'token_hash'],
                'mobile_push_devices_user_token_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::table('mobile_push_devices', function (Blueprint $table) {
            $table->dropUnique('mobile_push_devices_user_token_unique');
            $table->unique('token_hash', 'mobile_push_devices_token_hash_unique');
        });
    }
};
