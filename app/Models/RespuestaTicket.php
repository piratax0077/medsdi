<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaTicket extends Model
{
    protected $table = 'respuestas_tickets';

    protected $fillable = [
        'solicitud_id',
        'usuario_id',
        'contenido',
        'estado_nuevo',
    ];

    public function solicitud()
    {
        return $this->belongsTo(SolicitudSoporte::class, 'solicitud_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function archivos()
    {
        return $this->hasMany(ArchivoSoporte::class, 'respuesta_id');
    }
}
