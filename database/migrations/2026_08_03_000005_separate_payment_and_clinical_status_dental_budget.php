<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('presupuestos_dental', function (Blueprint $table) {
            $table->boolean('pago_completado')->default(false)->after('estado');
            $table->timestamp('fecha_pago_completo')->nullable()->after('pago_completado');
        });

        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->json('tratamientos_presupuesto')->nullable()->after('id_presupuesto');
        });

        // Recupera presupuestos que se cerraron al pagar, pero aún tienen trabajo clínico pendiente.
        DB::table('presupuestos_dental')
            ->where('estado', 0)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('pagos_presupuesto_dental')
                    ->whereColumn('pagos_presupuesto_dental.id_presupuesto', 'presupuestos_dental.id');
            })
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('odontogramas_pacientes')
                    ->whereColumn('odontogramas_pacientes.id_presupuesto', 'presupuestos_dental.id')
                    ->where('odontogramas_pacientes.estado', 0)
                    ->where(function ($pending) {
                        $pending->whereNull('odontogramas_pacientes.atendido')
                            ->orWhere('odontogramas_pacientes.atendido', 0);
                    });
            })
            ->update([
                'estado' => 1,
                'pago_completado' => true,
                'fecha_pago_completo' => now(),
            ]);
    }

    public function down(): void
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->dropColumn('tratamientos_presupuesto');
        });
        Schema::table('presupuestos_dental', function (Blueprint $table) {
            $table->dropColumn(['pago_completado', 'fecha_pago_completo']);
        });
    }
};
