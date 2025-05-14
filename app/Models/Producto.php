<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presentacion;


class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    public function Presentaciones()
    {
        return $this->belongsToMany(Presentacion::class, 'productos_presentacion', 'id_producto', 'id_presentacion');
    }
}
