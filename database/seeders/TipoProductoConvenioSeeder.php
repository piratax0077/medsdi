<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposConvenios = [
            'Descuento a las consultas',
            'Descuento en laboratorios',
            'Descuento en farmacias',
            'Descuento en farmacias y laboratorios',
            'Descuento en procedimientos quirúrgicos',
            'Descuento en tratamientos estéticos dentales',
            'Descuento en radiografías y diagnósticos por imágenes',
            'Descuento en prótesis dentales',
            'Descuento en urgencias dentales',
            'Descuento en controles preventivos y limpiezas',
            'Descuento en insumos odontológicos',
            'Descuento en tratamientos de ortodoncia',
            'Descuento en tratamientos para niños',
            'Descuento en atención domiciliaria odontológica',
        ];

        foreach ($tiposConvenios as $tipo) {
            DB::table('tipoproducto_convenios')->insert([
                'descripcion' => $tipo,
                'id_tipo_convenio' => 2,
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
