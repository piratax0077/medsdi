<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudSoporte extends Model
{
    protected $table = 'solicitudes_soporte';

    protected $fillable = [
        'usuario_id',
        'tipo_solicitud',
        'asunto',
        'descripcion',
        'prioridad',
        'estado',
        'numero_ticket',
        'respuesta',
        'fecha_respuesta',
    ];

    protected $dates = ['created_at', 'updated_at', 'fecha_respuesta'];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'usuario_id');
    }

    public function archivos()
    {
        return $this->hasMany('App\Models\ArchivoSoporte', 'solicitud_id');
    }

    public function respuestas()
    {
        return $this->hasMany('App\Models\RespuestaTicket', 'solicitud_id')->orderBy('created_at', 'asc');
    }

    // Generar número de ticket automático
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->numero_ticket = 'TKT-' . date('Ymd') . '-' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        });
    }
}
