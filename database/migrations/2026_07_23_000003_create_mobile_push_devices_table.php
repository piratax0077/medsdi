<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilePushDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('mobile_push_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('platform', 20)->default('android');
            $table->string('device_uuid')->nullable()->index();
            $table->text('fcm_token');
            $table->string('token_hash', 64)->unique();
            $table->boolean('enabled')->default(true)->index();
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobile_push_devices');
    }
}
