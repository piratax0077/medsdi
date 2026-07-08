<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguimientoCotizacionProveedor extends Model
{
    protected $table = 'seguimiento_cotizacion_proveedor';

    protected $fillable = [
        'id_cotizacion_proveedor',
        'id_usuario',
        'comentarios',
        'tipo_seguimiento'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Relación con CotizacionProveedor
     */
    public function cotizacion()
    {
        return $this->belongsTo(CotizacionProveedor::class, 'id_cotizacion_proveedor');
    }

    /**
     * Relación con Usuario (si existe tabla de usuarios)
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario');
    }

    /**
     * Scope para obtener seguimientos recientes
     */
    public function scopeRecientes($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Accessor para formatear fecha
     */
    public function getFechaFormateadaAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}
