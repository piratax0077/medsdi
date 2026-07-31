<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationToLoginApprovalChallenges extends Migration
{
    public function up()
    {
        Schema::table('login_approval_challenges', function (Blueprint $table) {
            $table->string('location_city', 120)->nullable()->after('ip_address');
            $table->string('location_country', 120)->nullable()->after('location_city');
        });
    }

    public function down()
    {
        Schema::table('login_approval_challenges', function (Blueprint $table) {
            $table->dropColumn(['location_city', 'location_country']);
        });
    }
}
