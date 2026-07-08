<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampanaPromocionialDistribucion extends Model
{
    protected $table = 'campanas_promocionales_distribucion';

    protected $fillable = [
        'id_institucion',
        'id_profesional',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_termino',
        'descuento_porcentaje',
        'descuento_valor',
        'tipo_descuento',
        'estado',
        'observaciones'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
        'descuento_porcentaje' => 'decimal:2',
        'descuento_valor' => 'decimal:2',
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
     * Scope para obtener campañas activas
     */
    public function scopeActivas($query)
    {
        return $query->where('estado', 'activa')
                    ->whereDate('fecha_inicio', '<=', now())
                    ->where(function($q) {
                        $q->whereNull('fecha_termino')
                          ->orWhereDate('fecha_termino', '>=', now());
                    });
    }

    /**
     * Scope para obtener campañas por institución
     */
    public function scopePorInstitucion($query, $id_institucion)
    {
        return $query->where('id_institucion', $id_institucion);
    }

    /**
     * Scope para obtener campañas por profesional
     */
    public function scopePorProfesional($query, $id_profesional)
    {
        return $query->where('id_profesional', $id_profesional);
    }

    /**
     * Accessor para obtener el nombre del estado
     */
    public function getEstadoNombreAttribute()
    {
        $estados = [
            'activa' => 'Activa',
            'inactiva' => 'Inactiva',
            'finalizada' => 'Finalizada'
        ];
        return $estados[$this->estado] ?? $this->estado;
    }

    /**
     * Accessor para obtener el nombre del tipo de descuento
     */
    public function getTipoDescuentoNombreAttribute()
    {
        $tipos = [
            'porcentaje' => 'Descuento porcentual',
            'valor_fijo' => 'Descuento valor fijo',
            'otro' => 'Otro tipo'
        ];
        return $tipos[$this->tipo_descuento] ?? $this->tipo_descuento;
    }

    /**
     * Accessor para formatear fecha de inicio
     */
    public function getFechaInicioFormateadaAttribute()
    {
        return $this->fecha_inicio ? $this->fecha_inicio->format('d/m/Y') : '-';
    }

    /**
     * Accessor para formatear fecha de término
     */
    public function getFechaTerminoFormateadaAttribute()
    {
        return $this->fecha_termino ? $this->fecha_termino->format('d/m/Y') : '-';
    }

    /**
     * Método para verificar si la campaña está vigente
     */
    public function esVigente()
    {
        if ($this->estado !== 'activa') {
            return false;
        }

        $hoy = now()->toDateString();
        if ($this->fecha_inicio->toDateString() > $hoy) {
            return false;
        }

        if ($this->fecha_termino && $this->fecha_termino->toDateString() < $hoy) {
            return false;
        }

        return true;
    }

    /**
     * Método para obtener el descuento aplicable
     */
    public function getDescuentoAplicable()
    {
        if ($this->tipo_descuento === 'porcentaje') {
            return $this->descuento_porcentaje . '%';
        } elseif ($this->tipo_descuento === 'valor_fijo') {
            return '$' . number_format($this->descuento_valor, 0, ',', '.');
        }
        return '-';
    }
}
