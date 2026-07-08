<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacacionesProfesional extends Model
{
    use HasFactory;

    protected $table = 'vacaciones_profesionales';

    protected $fillable = [
        'id_profesional',
        'fecha_inicio',
        'fecha_fin',
        'total_dias',
        'observaciones',
        'notificar_profesional',
        'estado',
        'id_usuario_registro'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    // Relación con profesional
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    // Relación con usuario que registró
    public function usuarioRegistro()
    {
        return $this->belongsTo(User::class, 'id_usuario_registro');
    }
}
