<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('pagos_presupuesto_dental')
            ->whereNull('id_prevision')
            ->orderBy('id')
            ->chunkById(200, function ($pagos) {
                $previsiones = DB::table('pacientes')
                    ->whereIn('id', $pagos->pluck('id_paciente')->filter()->unique())
                    ->pluck('id_prevision', 'id');

                foreach ($pagos as $pago) {
                    $idPrevision = $previsiones->get($pago->id_paciente);
                    if ($idPrevision) {
                        DB::table('pagos_presupuesto_dental')
                            ->where('id', $pago->id)
                            ->update(['id_prevision' => $idPrevision]);
                    }
                }
            });
    }

    public function down(): void
    {
        // Los datos históricos no se eliminan al revertir esta migración.
    }
};
