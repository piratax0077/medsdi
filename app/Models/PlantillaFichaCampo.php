<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantillaFichaCampo extends Model
{
    protected $table = 'plantillas_ficha_campos';

    protected $fillable = [
        'id_seccion',
        'id_subseccion',
        'codigo',
        'nombre',
        'tipo_campo',
        'placeholder',
        'obligatorio',
        'activo',
        'configuracion',
        'orden',
    ];

    protected $casts = [
        'obligatorio' => 'boolean',
        'activo' => 'boolean',
        'configuracion' => 'array',
    ];
}
