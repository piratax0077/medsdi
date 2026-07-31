<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyAlertsTable extends Migration
{
    public function up()
    {
        Schema::create('emergency_alerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emergency_doctor_link_id');
            $table->unsignedBigInteger('patient_user_id');
            $table->unsignedBigInteger('professional_user_id');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('status', 20)->default('sent');
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamps();
            $table->index(['professional_user_id', 'status']);
            $table->index(['patient_user_id', 'created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('emergency_alerts');
    }
}
