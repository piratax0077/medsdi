<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaCampoPersonalizado extends Model
{
    protected $table = 'ficha_campos_personalizados';

    protected $fillable = [
        'tipo_ficha',
        'id_ficha',
        'id_plantilla_subseccion',
        'seccion_codigo',
        'seccion_nombre',
        'subseccion_codigo',
        'subseccion_nombre',
        'tipo',
        'valor',
    ];
}
