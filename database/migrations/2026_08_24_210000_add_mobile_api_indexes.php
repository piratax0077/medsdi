<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddMobileApiIndexes extends Migration
{
    public function up()
    {
        // Prefijo 191 para compatibilidad con servidores cuyo límite de clave es 1000 bytes.
        DB::statement('ALTER TABLE users_devices ADD INDEX idx_users_devices_user_uuid (id_user, uuid(191))');
        DB::statement('ALTER TABLE log_users_devices ADD INDEX idx_log_devices_recept_estado_id (id_user_recept, estado, id)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE users_devices DROP INDEX idx_users_devices_user_uuid');
        DB::statement('ALTER TABLE log_users_devices DROP INDEX idx_log_devices_recept_estado_id');
    }
}
