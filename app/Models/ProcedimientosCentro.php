<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcedimientosCentro extends Model
{
    use HasFactory;
    protected $table = 'procedimientos_centro';

    protected $fillable = [
        'id_lugar_atencion',
        'id_especialidad',
        'id_tipo_especialidad',
        'id_sub_tipo_especialidad',
        'id_tipo_prestacion',
        'cod_examen',
        'tipo_ficha_atencion',
        'nombre',
        'descripcion',
        'indicaciones',
        'cantidad_bloques',
        'minutos_bloque',
        'valor',
        'otros',
        'estado'
    ];

    public function tipoPrestacion(): BelongsTo
    {
        return $this->belongsTo(TipoPrestacion::class, 'id_tipo_prestacion');
    }
}
