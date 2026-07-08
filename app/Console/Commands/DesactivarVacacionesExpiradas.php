<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VacacionesProfesional;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DesactivarVacacionesExpiradas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vacaciones:desactivar-expiradas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desactiva automáticamente las vacaciones que han expirado y actualiza el estado de los profesionales';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Iniciando proceso de desactivación de vacaciones expiradas...');

        $hoy = Carbon::now()->format('Y-m-d');

        // Buscar vacaciones expiradas (activas pero con fecha_fin < hoy)
        $vacaciones_expiradas = VacacionesProfesional::where('estado', 1)
            ->where('fecha_fin', '<', $hoy)
            ->get();

        $total_desactivadas = 0;
        $profesionales_actualizados = [];

        foreach($vacaciones_expiradas as $vacacion) {
            // Desactivar la vacación
            $vacacion->estado = 0;
            $vacacion->save();
            $total_desactivadas++;

            $id_profesional = $vacacion->id_profesional;

            // Si ya procesamos este profesional, continuar
            if(in_array($id_profesional, $profesionales_actualizados)) {
                continue;
            }

            // Verificar si el profesional tiene otras vacaciones vigentes
            $vacaciones_vigentes = VacacionesProfesional::where('id_profesional', $id_profesional)
                ->where('estado', 1)
                ->where('fecha_inicio', '<=', $hoy)
                ->where('fecha_fin', '>=', $hoy)
                ->first();

            if(!$vacaciones_vigentes) {
                // No hay vacaciones vigentes, reactivar profesional en todas sus ubicaciones
                DB::table('profesionales_lugares_atencion')
                    ->where('id_profesional', $id_profesional)
                    ->update(['estado' => 1]);

                $profesionales_actualizados[] = $id_profesional;
                $this->info("Profesional ID {$id_profesional} reactivado");
            }
        }

        $this->info("Proceso completado:");
        $this->info("- Vacaciones desactivadas: {$total_desactivadas}");
        $this->info("- Profesionales reactivados: " . count($profesionales_actualizados));

        return 0;
    }
}
