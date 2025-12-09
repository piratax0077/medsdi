<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidacionesProfesional extends Model
{
    use HasFactory;
    protected $table = 'liquidaciones_profesional';

    protected $fillable = [
        'id_profesional',
        'id_institucion',
        'fecha_inicio',
        'fecha_fin',
        'total_horas_medicas',
        'total_bonos_utilizados',
        'total_valor_convenio',
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'total_valor_convenio' => 'decimal:2',
        'estado' => 'integer',
    ];

    // Relaciones
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }
}
