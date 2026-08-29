<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;
    protected $table = 'tipo_producto';

    protected $fillable = [
        'nombre',
        'area',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_tipo_producto');
    }

    public function scopeOdontologia($query)
    {
        return $query->where('area', 'odontologia');
    }
}
