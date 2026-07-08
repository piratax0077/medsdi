<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivoSoporte extends Model
{
    protected $table = 'archivos_soporte';

    protected $fillable = [
        'solicitud_id',
        'nombre_original',
        'nombre_guardado',
        'ruta',
        'tipo_mime',
        'tamaño',
    ];

    // Relaciones
    public function solicitud()
    {
        return $this->belongsTo('App\Models\SolicitudSoporte', 'solicitud_id');
    }

    public function respuesta()
    {
        return $this->belongsTo('App\Models\RespuestaTicket', 'respuesta_id');
    }
}
