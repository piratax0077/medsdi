<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecomendacionDetalleAdministracion extends Model
{
    use HasFactory;

    protected $table = 'recomendacion_detalle_administraciones';

    protected $fillable = [
        'id_recomendacion_detalle',
        'id_paciente',
        'id_responsable',
        'fecha_hora_administracion',
        'observaciones',
    ];

    public function recomendacionDetalle()
    {
        return $this->belongsTo(RecomendacionDetalle::class, 'id_recomendacion_detalle');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'id_responsable');
    }
}
