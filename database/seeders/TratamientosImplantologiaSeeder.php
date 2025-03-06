<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientosImplantologiaSeeder extends Seeder
{
    public function run()
    {
        $tratamientos = [
            'Instalación de implante de titanio',
            'Instalación de implante de zirconio',
            'Instalación de implante cigomático',
            'Preservación alveolar',
            'Implante inmediato',
            'Regeneración ósea guiada horizontal',
            'Regeneración ósea guiada vertical',
            'Regeneración ósea guiada',
            'Regeneración ósea guiada mixta',
            'Regeneración ósea técnica Khoury',
            'Regeneración ósea técnica Split o expansión ósea',
            'Mejoramiento de fenotipo',
            'Tratamiento de peri-implantitis',
            'Mantención de implantes',
            'Frenectomía',
            'Profundización de vestíbulo',
            'Control post-tratamiento',
            'Exodoncia simple',
            'Exodoncia compleja',
            'Exodoncia a colgajo',
            'Retiro de Implante oseointegrado',
            'Retiro de Implante no oseointegrado',
            'Consulta de Especialidad',
            'Confección de guía quirúrgica estricta',
            'Confección de guía quirúrgica no estricta',
            'Montaje en articulador y confección de encerado de diagnóstico',
            'Confección de guía radiográfica',
            'Cirugía de conexión',
            'Cirugía de tejidos blandos',
            'Injerto de tejido conectivo por zona',
            'Injerto de tejido conectivo por sextante',
            'Injerto gingival libre por zona',
            'Injerto alodérmico por zona',
            'Injerto alodérmico por sextante',
            'Elevación de seno maxilar Ventana lateral',
            'Elevación de seno maxilar técnica transalveolar',
            'Instalación de implante',
            'Cambio o reapriete de tornillos protésicos',
            'Cambio acondicionador de tejidos',
            'Desmontaje de prótesis y profilaxis',
            'Recambio de gomas o ring – locator',
            'Reconstrucción de rebordes con autoinjerto extraorales',
            'Reconstrucción de rebordes con autoinjerto intraorales',
            'Reconstrucción de rebordes con homo, hetero injerto o aloplásticos',
            'Plasma rico en plaquetas - fibrina',
            'Análisis de estudio tomográfico y registro fotográfico',
            'Tratamiento de complicaciones post quirúrgicas por sesión',
            'Evaluación de especialidad Implantología'
        ];

        foreach ($tratamientos as $tratamiento) {
            DB::table('tratamientos_implantologia')->insert([
                'descripcion' => $tratamiento,
                'valor' => null,
                'estado' => 1,
                'observaciones' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
