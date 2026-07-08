<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'orden';

    protected $fillable = [
        'id_profesional',
        'id_paciente',
        'tipo',
        'total',
        'estado',
        'fecha',
        'notas'
    ];

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional', 'id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function getEstadoTextoAttribute()
    {
        $estados = [
            0 => 'Ocupado',
            1 => 'Pendiente',
        ];

        return $estados[$this->estado] ?? 'Desconocido';
    }

    public function getEstadoBadgeAttribute()
    {
        $badges = [
            0 => 'success',
            1 => 'warning',
        ];

        return $badges[$this->estado] ?? 'secondary';
    }
}
