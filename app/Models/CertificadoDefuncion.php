<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificadoDefuncion extends Model
{
    use HasFactory;

    protected $table = 'certificados_defuncion';

    protected $fillable = [
        'id_paciente',
        'id_ficha_atencion',
        'id_profesional',
        'id_lugar_atencion',

        // 1. Identidad del fallecido
        'nombre_fallecido',
        'rut_fallecido',
        'sexo_fallecido',
        'fecha_nacimiento',
        'edad_fallecido',
        'fecha_hora_menor_ano',

        // Testigos
        'testigo_1_nombre',
        'testigo_1_rut',
        'testigo_1_firma',
        'testigo_2_nombre',
        'testigo_2_rut',
        'testigo_2_firma',

        // 2. Datos defunción
        'fecha_fallecimiento',
        'hora_fallecimiento',
        'peso_nacer',
        'semanas_gestacion',
        'estado_nutricional',
        'lugar_defuncion',
        'establecimiento_direccion',
        'region_defuncion',
        'comuna_defuncion',

        // 3. Causas de muerte
        'causa_inmediata',
        'causas_originarias',
        'estados_morbosos_concomitantes',

        // 4. Fundamento
        'fundamento_causa_muerte',
        'lugar_ocurrencia',
        'circunstancias',
        'tipo_muerte',

        // 5. Atención médica
        'atencion_medica_ultima_enfermedad',

        // 6. Médico certificante
        'calidad_firmante',
        'otros_firmantes',
        'nombre_medico',
        'rut_medico',
        'telefono_medico',
        'domicilio_medico',
        'firma_medico',
        'autenticacion_documento',

        // Registro Civil
        'residencia_fallecido',
        'region_residencia',
        'ciudad_residencia',
        'ocupacion_fallecido',
        'nivel_educacion',
        'ultimo_curso',
        'nivel_ocupacional',

        // Menores de 1 año
        'tipo_menor_ano',
        'nombre_gestante',
        'estado_civil_madre',
        'hijos_vivos',
        'hijos_fallecidos',
        'hijos_mortinatos',
        'hijos_total',
        'tipo_parto_aborto_anterior',
        'fecha_parto_anterior',
        'nombre_padre',
        'edad_padre',
        'ultimo_curso_padre',
        'instruccion_padre',
        'ocupacion_padre',
        'nivel_ocupacional_padre',

        'cod_auto',
    ];

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function FichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }

    public function Profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function LugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }
}
