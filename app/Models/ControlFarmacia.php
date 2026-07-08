<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlFarmacia extends Model
{
    use HasFactory;

    protected $table = 'controles_farmacia';

    protected $fillable = [
        'id_farmacia',
        'farmacia_nombre',
        'fecha',
        'hora_inicio',
        'hora_termino',
        'tipo',
        'responsable',
        'enlace_jitsi',
        'estado',
        'acta',
        'productos_verificados',
    ];

    protected $casts = [
        'productos_verificados' => 'array',
        'fecha' => 'date',
    ];

    public function farmacia()
    {
        return $this->belongsTo(Farmacia::class, 'id_farmacia');
    }
}
