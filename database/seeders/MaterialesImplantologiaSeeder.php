<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialesImplantologiaSeeder extends Seeder
{
    public function run()
    {
        $materiales = [
            'Sin injerto',
            'Aloinjerto puros cortical particulado 0.5 cc',
            'Aloinjerto puros cortical particulado 1.0 cc',
            'Aloinjerto puros cortical particulado 2.0 cc',
            'Aloinjerto puros esponjoso particulado 0.5 cc',
            'Aloinjerto puros esponjoso particulado 1.0 cc',
            'Aloinjerto puros esponjoso particulado 2.0 cc',
            'Aloinjerto puros mixto particulado 0.5 cc',
            'Aloinjerto puros mixto particulado 1.0 cc',
            'Aloinjerto puros mixto particulado 2.0 cc',
            'Xenoinjerto 250-1000 UM 0.5 cc',
            'Xenoinjerto 250-1000 UM 1.0 cc',
            'Xenoinjerto 250-1000 UM 2.0 cc',
            'Autoinjerto',
            'Injerto aloplástico',
            'Maxgraft cancellous 0.5-2.0 mm 0.5 cc',
            'Maxgraft cancellous 0.5-2.0 mm 1.0 cc',
            'Maxgraft cancellous 0.5-2.0 mm 2.0 cc',
            'REGENEROSS GRAFT PLUG 10MM X 20MM',
            'REGENEROSS GRAFT PLUG 6MM X 25MM'
        ];

        foreach ($materiales as $material) {
            DB::table('materiales_implantologia')->insert([
                'descripcion' => $material,
                'valor' => null,
                'estado' => 1,
                'observaciones' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
