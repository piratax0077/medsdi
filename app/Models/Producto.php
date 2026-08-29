<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presentacion;


class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'id_profesional',
        'codigo_interno',
        'numero_serie',
        'nombre',
        'stock_minimo',
        'stock_maximo',
        'stock_actual',
        'stock_seguridad',
        'ubicacion',
        'imagen',
        'descripcion',
        'id_tipo_producto',
        'id_unidad_medida',
        'id_marca',
        'id_bodega',
        'observaciones',
        'almacenamiento',
        'id_tipo_almacenamiento',
        'temperatura',
        'id_temperatura',
        'image_path',
        'otros',
        'precio_unitario', // Precio del producto
        'precio_compra',
        'precio_venta',    // Precio de venta (opcional)
        'estado',          // Estado del producto (activo/inactivo)
        'es_implante',
        'id_marca_implante',
        'id_tipo_insumo_implantologia',
    ];

    // Relaciones
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'id_tipo_producto');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(Unidades_medidas::class, 'id_unidad_medida');
    }

    public function marca()
    {
        return $this->belongsTo(Marcas_productos::class, 'id_marca');
    }

    public function marcaImplante()
    {
        return $this->belongsTo(MarcasImplantes::class, 'id_marca_implante');
    }

     public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }

    public function Presentaciones()
    {
        return $this->belongsToMany(Presentacion::class, 'productos_presentacion', 'id_producto', 'id_presentacion');
    }

    // Scope para buscar
    public function scopeBuscar($query, $termino)
    {
        return $query->where(function($q) use ($termino) {
            $q->where('codigo_interno', 'LIKE', "%{$termino}%")
              ->orWhere('nombre', 'LIKE', "%{$termino}%")
              ->orWhere('descripcion', 'LIKE', "%{$termino}%");
        });
    }

    // Scope para tipo de producto
    public function scopeTipoProducto($query, $tipo)
    {
        return $query->where('id_tipo_producto', $tipo);
    }

    public function scopeArea($query, $area)
    {
        return $query->whereHas('tipoProducto', function ($q) use ($area) {
            $q->where('area', $area);
        });
    }

    public function scopeOdontologia($query)
    {
        return $query->area('odontologia');
    }
}
