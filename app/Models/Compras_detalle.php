<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras_detalle extends Model
{
    use HasFactory;
    protected $table = 'compras_detalle';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function compra()
    {
        return $this->belongsTo(Compras::class, 'id_compra');
    }
}
