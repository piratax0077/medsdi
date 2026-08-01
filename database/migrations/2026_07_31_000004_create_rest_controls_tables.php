<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rest_controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professional_user_id');
            $table->unsignedBigInteger('patient_user_id');
            $table->unsignedBigInteger('professional_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('license_id')->nullable();
            $table->string('status', 30)->default('pending_acceptance');
            $table->decimal('radius_km', 6, 2)->default(1);
            $table->unsignedSmallInteger('frequency_hours')->default(4);
            $table->boolean('verify_medications')->default(false);
            $table->boolean('verify_location')->default(true);
            $table->text('base_address')->nullable();
            $table->decimal('base_latitude', 10, 7)->nullable();
            $table->decimal('base_longitude', 10, 7)->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
            $table->index(['professional_user_id', 'status']);
            $table->index(['patient_user_id', 'status']);
        });

        Schema::create('rest_control_checkins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rest_control_id');
            $table->unsignedBigInteger('patient_user_id');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('accuracy_meters', 9, 2)->nullable();
            $table->decimal('distance_km', 8, 3)->nullable();
            $table->boolean('inside_radius')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('status', 30)->default('submitted');
            $table->timestamp('consent_given_at');
            $table->timestamp('captured_at');
            $table->timestamps();
            $table->index(['rest_control_id', 'captured_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rest_control_checkins');
        Schema::dropIfExists('rest_controls');
    }
};
