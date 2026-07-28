<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoPrestacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_prestaciones';

    protected $fillable = [
        'codigo',
        'nombre',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function procedimientos(): HasMany
    {
        return $this->hasMany(ProcedimientosCentro::class, 'id_tipo_prestacion');
    }
}
