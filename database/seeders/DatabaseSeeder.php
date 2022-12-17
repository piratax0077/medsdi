<?php

namespace Database\Seeders;

use App\Models\profesionales;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(especialidades_medicasSeeder::class);
        $this->call(diagnostico_ciesSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(ParametrosSeeder::class);
        $this->call(regionSeeder::class);
        $this->call(ciudadSeeder::class);
        $this->call(direccionSeeder::class);
        $this->call(previsionSeeder::class);
        //$this->call(pacientesSeeder::class);
        $this->call(productoSeeder::class);
        $this->call(presentacionSeeder::class);
        $this->call(dosisSeeder::class);
        $this->call(producto_presentacionSeeder::class);
        $this->call(presentacion_dosisSeeder::class);
        $this->call(tipo_examenSeeder::class);
        $this->call(sub_tipo_examenSeeder::class);
        $this->call(examenSeeder::class);
        $this->call(especialidadSeeder::class);
        // $this->call(tipo_especialidadSeeder::class);
        //$this->call(profesionalesSeeder::class);
        // $this->call(especialidad_profesionalSeeder::class);
        // $this->call(contacto_emergenciaSeeder::class);
        // $this->call(paciente_contacto_emergenciaSeeder::class);
        // $this->call(ficha_atencionSeeder::class);
        $this->call(lugares_atencionSeeder::class);
        //$this->call(profesional_lugares_atencionSeeder::class);
        //$this->call(detalle_recetaSeeder::class);
        // $this->call(examen_ppfSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(proveedoresSeeder::class);
        $this->call(laboratoriosSeeder::class);
        // $this->call(horaMedicaSeeder::class);
        $this->call(grupo_sanguineoSeeder::class);
        $this->call(temperaturaSeeder::class);
        $this->call(articulosSeeder::class);
        $this->call(receta_dosisSeeder::class);
        $this->call(receta_presentacionSeeder::class);
        $this->call(examenes_medicosSeeder::class);




        /*


          $this->call(alergiasSeeder::class);
          $this->call(Alergias_pacientesSeeder::class);
          $this->call(OperacionesSeeder::class);

          $this->call(profesional_especialidadSeeder::class);
          $this->call(recetaSeeder::class);

          */
    }
}