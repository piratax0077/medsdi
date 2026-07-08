<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FonoValoracionEquilibrio extends Model
{
    use HasFactory;

    protected $table = 'fono_valoracion_equilibrio';

    protected $fillable = [
        'id_hora_medica',
        'id_ficha_otros_prof',
        'id_profesional',
        'id_paciente',
        'datos',
        'estado',
    ];
}
