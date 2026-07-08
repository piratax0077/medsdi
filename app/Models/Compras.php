<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $table = 'compras';

    protected $fillable = [
        'id_institucion'
    ];

    public function detalles()
    {
        return $this->hasMany(Compras_detalle::class, 'id_compra');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
