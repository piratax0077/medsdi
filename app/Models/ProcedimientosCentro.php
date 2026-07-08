<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedimientosCentro extends Model
{
    use HasFactory;
    protected $table = 'procedimientos_centro';

    protected $fillable = [
        'nombre',
        'descripcion',
        'indicaciones',
        'cantidad_bloques',
        'minutos_bloque',
        'valor',
        'otros',
        'estado'
    ];
}
