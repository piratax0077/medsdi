<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidosDistribucion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pedidos_distribucion';

    protected $fillable = [
        'id_cliente',
        'id_usuario',
        'id_lugar_atencion',
        'numero_pedido',
        'estado',
        'items_pedido',
        'total',
        'descuento_total',
        'monto_neto',
        'metodo_pago',
        'observaciones',
        'fecha_procesamiento',
        'medio_transporte',
        'empresa_transporte',
        'numero_seguimiento',
        'direccion_envio',
        'estado_envio',
        'fecha_despacho'
    ];

    protected $casts = [
        'items_pedido' => 'array',
        'total' => 'decimal:2',
        'descuento_total' => 'decimal:2',
        'monto_neto' => 'decimal:2',
        'fecha_procesamiento' => 'datetime',
        'fecha_despacho' => 'datetime'
    ];

    /**
     * Relación con Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Relación con Usuario (vendedor)
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Relación con Lugar de Atención
     */
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    /**
     * Relación con Pagos (un pedido puede tener múltiples pagos)
     */
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_pedido');
    }

    /**
     * Generar número de pedido único
     */
    public static function generarNumeroPedido()
    {
        $prefijo = 'PED-' . date('Ymd') . '-';
        $ultimo = self::whereRaw("numero_pedido LIKE '{$prefijo}%'")->latest('id')->first();

        if ($ultimo) {
            $numero = intval(substr($ultimo->numero_pedido, -4)) + 1;
        } else {
            $numero = 1;
        }

        return $prefijo . str_pad($numero, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Scope: filtrar por estado
     */
    public function scopePorEstado($query, $estado)
    {
        return $query->where('estado', $estado);
    }

    /**
     * Scope: filtrar por cliente
     */
    public function scopePorCliente($query, $id_cliente)
    {
        return $query->where('id_cliente', $id_cliente);
    }

    /**
     * Scope: pedidos activos (no cancelados ni devueltos)
     */
    public function scopeActivos($query)
    {
        return $query->whereNotIn('estado', ['cancelado', 'devuelto']);
    }
}
