<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';

    /**
     * Castear el campo id_tipo_producto como array
     * Convierte automáticamente el JSON a array y array a JSON
     */
    protected $casts = [
        'id_tipo_producto' => 'array',
    ];

    /**
     * Relación: obtener los tipos de productos asociados
     * Carga los productos basándose en los IDs almacenados en JSON
     */
    public function tiposProducto()
    {
        $ids = $this->id_tipo_producto ?? [];

        // Si es string (fallback), parsearlo
        if (is_string($ids)) {
            $ids = json_decode($ids, true) ?? [];
        }

        // Si está vacío, retornar colección vacía
        if (empty($ids)) {
            return collect([]);
        }

        return TipoProducto::whereIn('id', $ids)->get();
    }

    /**
     * Retorna los IDs de productos como array (siempre array, nunca string JSON)
     */
    public function getProductosIds()
    {
        $ids = $this->id_tipo_producto ?? [];

        if (is_string($ids)) {
            return json_decode($ids, true) ?? [];
        }

        if (is_array($ids)) {
            return $ids;
        }

        return [$ids];
    }
}
