<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampanaEmailDistribucion extends Model
{
    protected $table = 'campanas_email_distribucion';

    protected $fillable = [
        'id_institucion',
        'id_profesional',
        'titulo',
        'mensaje',
        'remitente',
        'total_destinatarios',
        'enviados',
        'fallidos',
        'estado',
        'fecha_envio',
        'log_errores'
    ];

    protected $casts = [
        'fecha_envio' => 'datetime',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Relación con Institucion
     */
    public function institucion()
    {
        return $this->belongsTo(Instituciones::class, 'id_institucion');
    }

    /**
     * Relación con Profesional
     */
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    /**
     * Relación con Destinatarios
     */
    public function destinatarios()
    {
        return $this->hasMany(CampanaEmailDestinatarioDistribucion::class, 'id_campana_email');
    }

    /**
     * Scope para obtener campañas enviadas
     */
    public function scopeEnviadas($query)
    {
        return $query->where('estado', 'enviada');
    }

    /**
     * Scope para obtener campañas por institución
     */
    public function scopePorInstitucion($query, $id_institucion)
    {
        return $query->where('id_institucion', $id_institucion);
    }

    /**
     * Accessor para nombre del estado
     */
    public function getEstadoNombreAttribute()
    {
        $estados = [
            'borrador' => 'Borrador',
            'enviando' => 'Enviando',
            'enviada' => 'Enviada',
            'error' => 'Error'
        ];
        return $estados[$this->estado] ?? $this->estado;
    }

    /**
     * Accessor para formatear fecha de envío
     */
    public function getFechaEnvioFormateadaAttribute()
    {
        return $this->fecha_envio ? $this->fecha_envio->format('d/m/Y H:i') : '-';
    }

    /**
     * Calcular porcentaje de éxito
     */
    public function getPorcentajeExitoAttribute()
    {
        if ($this->total_destinatarios == 0) {
            return 0;
        }
        return round(($this->enviados / $this->total_destinatarios) * 100, 2);
    }
}
