<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantillaFichaSubseccion extends Model
{
    protected $table = 'plantillas_ficha_subsecciones';

    protected $fillable = [
        'id_seccion',
        'codigo',
        'nombre',
        'tipo',
        'visible',
        'personalizada',
        'orden',
    ];

    protected $casts = [
        'visible' => 'boolean',
        'personalizada' => 'boolean',
    ];

    public function seccion()
    {
        return $this->belongsTo(
            PlantillaFichaSeccion::class,
            'id_seccion'
        );
    }

    public function campos()
    {
        return $this->hasMany(
            PlantillaFichaCampo::class,
            'id_subseccion'
        )->orderBy('orden');
    }
}
