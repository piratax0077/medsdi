<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaAtencionEnfermeria extends Model
{
    use HasFactory;

    protected $table = 'fichas_atenciones_enfermeria';

    protected $fillable = [
        'id_ficha_atencion',
        'id_paciente',
        'id_profesional',
        'id_lugar_atencion',
        'id_hora_medica',
        'motivo',
        'anamnesis',
        'temperatura',
        'pulso',
        'frecuencia_reposo',
        'peso',
        'talla',
        'imc',
        'estado_nutricional',
        'pas',
        'pad',
        'pam',
        'presion_bi',
        'presion_bd',
        'presion_de_pie',
        'presion_sentado',
        'ct_estado_conciencia',
        'ct_lenguaje',
        'ct_traslado',
        'nutricionista_evaluacion',
        'nutricionista_pauta',
        'examenes',
        'examenes_esp',
        'medicamentos',
        'estado',
    ];

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha_atencion');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }
}
