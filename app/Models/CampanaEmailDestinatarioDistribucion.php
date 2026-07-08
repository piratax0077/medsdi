<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampanaEmailDestinatarioDistribucion extends Model
{
    protected $table = 'campana_email_destinatarios_distribucion';

    protected $fillable = [
        'id_campana_email',
        'id_cliente',
        'email_cliente',
        'estado_envio',
        'fecha_envio',
        'error_mensaje'
    ];

    protected $casts = [
        'fecha_envio' => 'datetime',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Relación con Campaña
     */
    public function campana()
    {
        return $this->belongsTo(CampanaEmailDistribucion::class, 'id_campana_email');
    }

    /**
     * Relación con Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Scope para obtener destinatarios pendientes
     */
    public function scopePendientes($query)
    {
        return $query->where('estado_envio', 'pendiente');
    }

    /**
     * Scope para obtener destinatarios enviados
     */
    public function scopeEnviados($query)
    {
        return $query->where('estado_envio', 'enviado');
    }

    /**
     * Scope para obtener destinatarios fallidos
     */
    public function scopeFallidos($query)
    {
        return $query->where('estado_envio', 'fallido');
    }

    /**
     * Accessor para nombre del estado
     */
    public function getEstadoNombreAttribute()
    {
        $estados = [
            'pendiente' => 'Pendiente',
            'enviado' => 'Enviado',
            'fallido' => 'Fallido'
        ];
        return $estados[$this->estado_envio] ?? $this->estado_envio;
    }
}
