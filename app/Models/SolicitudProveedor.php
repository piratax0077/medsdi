<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudProveedor extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_proveedor';

    protected $fillable = [
        'id_producto',
        'id_institucion',
        'id_usuario',
        'tipo_pedido',
        'cantidad',
        'urgencia',
        'observaciones',
        'estado',
    ];

    // id_producto es en realidad un ID de Compras_detalle
    public function compraDetalle()
    {
        return $this->belongsTo(Compras_detalle::class, 'id_producto');
    }
}
