<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagosPresupuestoDental extends Model
{
    use HasFactory;
    protected $table = 'pagos_presupuesto_dental';

    protected $casts = [
        'asignado' => 'boolean',
        'fecha_asignacion' => 'datetime',
    ];

    public function prevision()
    {
        return $this->belongsTo(Prevision::class, 'id_prevision');
    }
}
