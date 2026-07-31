<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyDoctorLinksTable extends Migration
{
    public function up()
    {
        Schema::create('emergency_doctor_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_user_id');
            $table->unsignedBigInteger('professional_user_id');
            $table->string('status', 20)->default('pending');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('revoked_at')->nullable();
            $table->timestamps();
            $table->unique(['patient_user_id', 'professional_user_id'], 'emergency_link_users_unique');
            $table->index(['patient_user_id', 'status']);
            $table->index(['professional_user_id', 'status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('emergency_doctor_links');
    }
}
