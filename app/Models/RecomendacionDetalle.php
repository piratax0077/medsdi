<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecomendacionDetalle extends Model
{
    use HasFactory;
    protected $table = 'recomendacion_detalle';

    // relaciones
    public function recomendacion()
    {
        return $this->belongsTo(Recomendacion::class, 'id_recomendacion');
    }
    // responsable
    public function responsable()
    {
        return $this->belongsTo(User::class, 'id_responsable');
    }

    public function administraciones()
    {
        return $this->hasMany(RecomendacionDetalleAdministracion::class, 'id_recomendacion_detalle');
    }
}
