<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlLaboratorio extends Model
{
    use HasFactory;

    protected $table = 'controles_laboratorio';

    protected $fillable = [
        'id_laboratorio',
        'laboratorio_nombre',
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

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, 'id_laboratorio');
    }
}
