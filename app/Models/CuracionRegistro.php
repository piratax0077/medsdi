<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuracionRegistro extends Model
{
    use HasFactory;

    protected $table = 'curaciones_registros';

    protected $fillable = [
        'id_ficha_atencion',
        'id_profesional',
        'id_paciente',
        'id_lugar_atencion',
        'tipo_curacion',
        'etapa',
        'datos_valoracion',
        'datos_curacion',
        'observaciones',
        'estado',
        'activo',
        'fecha',
        'hora',
    ];

    protected $casts = [
        'datos_valoracion' => 'array',
        'datos_curacion' => 'array',
        'activo' => 'boolean',
        'fecha' => 'date:Y-m-d',
    ];

    /**
     * Método público para obtener el nombre del procedimiento
     */
    public function getNombreProcedimiento()
    {
        $nombres = [
            'plana' => [
                'valoracion' => 'Valoración Curación Plana',
                'curacion' => 'Curación Plana',
                'mixta' => 'Valoración y Curación Plana'
            ],
            'lpp' => [
                'valoracion' => 'Valoración LPP',
                'curacion' => 'Curación LPP',
                'mixta' => 'Valoración y Curación LPP'
            ],
            'pie_diabetico' => [
                'valoracion' => 'Valoración Pie Diabético',
                'curacion' => 'Curación Pie Diabético',
                'mixta' => 'Valoración y Curación Pie Diabético'
            ],
            'quemados' => [
                'valoracion' => 'Valoración Quemados',
                'curacion' => 'Curación Quemados',
                'mixta' => 'Valoración y Curación Quemados'
            ]
        ];

        return $nombres[$this->tipo_curacion][$this->etapa] ?? 'Procedimiento';
    }

    // Relaciones
    public function Profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function LugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    public function FichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }
}
