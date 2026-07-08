<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    use HasFactory;

    protected $table = 'farmacias';

    protected $fillable = [
        'nombre',
        'codigo',
        'id_lugar_atencion',
        'tipo',
        'responsable',
        'rut_responsable',
        'telefono',
        'email',
        'direccion',
        'id_region',
        'id_ciudad',
        'horario',
        'dias_atencion',
        'hora_entrada',
        'hora_salida',
        'estado',
        'observaciones',
    ];

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }
}
