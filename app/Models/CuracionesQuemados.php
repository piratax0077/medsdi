<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuracionesQuemados extends Model
{
    use HasFactory;

    protected $table = 'curaciones_quemados';

    protected $fillable = [
        'id_paciente',
        'id_responsable',
        'id_ficha_atencion',
        'fecha',
        'hora',
        'datos_valoracion_quemados',
        'datos_curacion_quemados',
        'estado',
        'activo',
        'observaciones',
    ];

    protected $casts = [
        'datos_valoracion_quemados' => 'array',
        'datos_curacion_quemados' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'id_paciente');
    }

    public function responsable()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_responsable');
    }

    public function fichaAtencion()
    {
        return $this->belongsTo(\App\Models\FichaAtencion::class, 'id_ficha_atencion');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    public function scopeDelPaciente($query, $idPaciente)
    {
        return $query->where('id_paciente', $idPaciente);
    }

    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }
}
