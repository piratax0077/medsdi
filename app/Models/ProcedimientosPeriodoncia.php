<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedimientosPeriodoncia extends Model
{
    use HasFactory;

    /**
     * La tabla existente usa el nombre singular. Sin esta declaración,
     * Eloquent intenta guardar en "procedimientos_periodoncias".
     */
    protected $table = 'procedimientos_periodoncia';
}
