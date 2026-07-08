<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudReparacionReclamo extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_reparacion_reclamo';

    protected $fillable = [
        'tipo',
        'id_cliente',
        'id_producto',
        'id_profesional',
        'id_producto_reemplazo',
        'detalles',
        'estado'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function productoReemplazo()
    {
        return $this->belongsTo(Producto::class, 'id_producto_reemplazo');
    }

    // Scopes
    public function scopePorTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    public function scopePorEstado($query, $estado)
    {
        return $query->where('estado', $estado);
    }

    public function scopePorCliente($query, $id_cliente)
    {
        return $query->where('id_cliente', $id_cliente);
    }

    // Accessores
    public function getTipoNombreAttribute()
    {
        return $this->tipo === 'reparacion' ? 'Reparación' : 'Reclamo';
    }

    public function getEstadoNombreAttribute()
    {
        $estados = [
            'pendiente' => 'Pendiente',
            'en_proceso' => 'En proceso',
            'resuelto' => 'Resuelto',
            'rechazado' => 'Rechazado'
        ];
        return $estados[$this->estado] ?? 'Desconocido';
    }

    public function getFechaFormateadaAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}
