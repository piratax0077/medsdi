<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProveedor extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones_proveedor';

    protected $fillable = [
        'id_institucion',
        'id_proveedor',
        'id_usuario',
        'numero_cotizacion',
        'fecha_emision',
        'fecha_validez',
        'estado',
        'observaciones',
        'total_estimado',
        'respuesta_proveedor',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function detalles()
    {
        return $this->hasMany(CotizacionProveedorDetalle::class, 'id_cotizacion');
    }

    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario');
    }
}
