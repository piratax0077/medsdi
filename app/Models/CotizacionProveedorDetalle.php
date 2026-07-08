<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProveedorDetalle extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones_proveedor_detalle';

    protected $fillable = [
        'id_cotizacion',
        'id_producto',
        'descripcion_producto',
        'cantidad',
        'precio_estimado',
        'precio_ofertado',
        'notas',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(CotizacionProveedor::class, 'id_cotizacion');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
