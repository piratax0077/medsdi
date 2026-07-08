<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prevision extends Model
{
    protected $table = 'previsiones';

    protected $fillable = [
        'nombre',
        'codigo',
        'pagina_web',
        'telefono',
        'tipo',
        'usa_api',
        'permite_bonos',
        'proveedor_api',
        'configuracion',
    ];

    protected $casts = [
        'usa_api' => 'boolean',
        'permite_bonos' => 'boolean',
        'configuracion' => 'array',
    ];
}
