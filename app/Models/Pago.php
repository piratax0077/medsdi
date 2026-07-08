<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'id_cliente',
        'id_pedido',
        'monto',
        'fecha_pago',
        'id_forma_pago',
        'numero_documento',
        'observaciones',
        'estado',
        'id_usuario',
        'activo'
    ];

    protected $dates = [
        'fecha_pago',
        'created_at',
        'updated_at'
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Models\PedidosDistribucion', 'id_pedido');
    }

    public function formaPago()
    {
        return $this->belongsTo('App\Models\FormasPago', 'id_forma_pago');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'id_usuario');
    }
}
