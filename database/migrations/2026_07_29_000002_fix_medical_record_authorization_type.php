<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Una llamada con argumentos desplazados guardó accesos a la Ficha
        // Médica Única como tipo 1 (rendición). El evento dentro de msg permite
        // distinguirlos sin modificar rendiciones reales.
        DB::table('log_users_devices')
            ->where('tipo', 1)
            ->where('msg', 'like', '%Ficha%')
            ->update(['tipo' => 2]);
    }

    public function down()
    {
        // No se revierte: devolver estos registros a tipo 1 los mostraría
        // nuevamente como rendiciones, que nunca fue su naturaleza real.
    }
};
