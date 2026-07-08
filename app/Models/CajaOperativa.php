<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaOperativa extends Model
{
    use HasFactory;
    protected $table = 'cajas_operativas';
    protected $fillable = [
        'id_caja',
        'id_usuario',
        'id_usuario_entrega',
        'id_lugar_atencion',
        'estado',
        'monto_inicial',
        'monto_final',
        'monto_entregado',
        'bonos',
        'saldo_cierre',
        'diferencia',
        'observaciones',
        'observaciones_entrega',
        'total_efectivo',
        'total_bonos_fisicos',
        'total_otros',
        'total_acumulado',
        'fecha_apertura',
        'fecha_cierre',
        'fecha_entrega',
    ];

    // Relación con el modelo Caja
    public function caja()
    {
        return $this->belongsTo(Caja::class, 'id_caja');
    }

    // Relación con el modelo LugarAtencion
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    // Relación con el modelo Asistente (responsable actual)
    public function responsable()
    {
        return $this->belongsTo(Asistente::class, 'id_usuario');
    }

    // Relación con el modelo Asistente (quien entregó la caja)
    public function entregador()
    {
        return $this->belongsTo(Asistente::class, 'id_usuario_entrega');
    }
}
