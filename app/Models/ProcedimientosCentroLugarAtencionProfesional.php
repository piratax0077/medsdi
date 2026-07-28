<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedimientosCentroLugarAtencionProfesional extends Model
{
    use HasFactory;
    protected $table = 'procedimientos_lugar_atencion_profesional';

    protected $fillable = [
        'id_procedimiento_centro',
        'id_lugar_atencion',
        'id_profesional',
        'nombre',
        'descripcion',
        'minutos_bloque',
        'cantidad_bloques',
        'valor',
        'otros',
        'estado',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
    ];
}
