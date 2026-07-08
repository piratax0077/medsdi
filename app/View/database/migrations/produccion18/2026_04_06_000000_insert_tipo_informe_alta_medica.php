<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertTipoInformeAltaMedica extends Migration
{
    public function up()
    {
        DB::table('tipo_informe')->insert([
            'id'          => 2,
            'alias'       => 'certificado_alta_medica',
            'nombre'      => 'Certificado de Alta Médica',
            'descripcion' => 'Certificado de Alta Médica emitido por el profesional tratante',
            'pdf'         => 'pdf_informe_medico',
            'texto'       => null,
            'estado'      => 1,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }

    public function down()
    {
        DB::table('tipo_informe')->where('alias', 'certificado_alta_medica')->delete();
    }
}
