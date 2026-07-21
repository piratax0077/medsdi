<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantillaFichaSeccion extends Model
{
    protected $table = 'plantillas_ficha_secciones';

    protected $fillable = [
        'id_plantilla',
        'codigo',
        'nombre',
        'tipo',
        'visible',
        'obligatoria',
        'personalizada',
        'orden',
    ];

    protected $casts = [
        'visible' => 'boolean',
        'obligatoria' => 'boolean',
        'personalizada' => 'boolean',
    ];

    public function plantilla()
    {
        return $this->belongsTo(
            PlantillaFichaMedica::class,
            'id_plantilla'
        );
    }

    public function subsecciones()
    {
        return $this->hasMany(
            PlantillaFichaSubseccion::class,
            'id_seccion'
        )->orderBy('orden');
    }

    public function campos()
    {
        return $this->hasMany(
            PlantillaFichaCampo::class,
            'id_seccion'
        )->orderBy('orden');
    }
}
