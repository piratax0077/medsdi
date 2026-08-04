<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresupuestosDental extends Model
{
    use HasFactory;
    protected $table = 'presupuestos_dental';

    protected $casts = [
        'pago_completado' => 'boolean',
        'fecha_pago_completo' => 'datetime',
    ];
}
