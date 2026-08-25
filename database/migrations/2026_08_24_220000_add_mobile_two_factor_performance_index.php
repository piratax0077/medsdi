<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileTwoFactorPerformanceIndex extends Migration
{
    public function up()
    {
        Schema::table('login_approval_challenges', function (Blueprint $table) {
            $table->index(['user_id', 'status', 'expires_at', 'id'], 'idx_login_challenges_user_status_exp_id');
        });
    }

    public function down()
    {
        Schema::table('login_approval_challenges', function (Blueprint $table) {
            $table->dropIndex('idx_login_challenges_user_status_exp_id');
        });
    }
}
