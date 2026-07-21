<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantillaFichaMedica extends Model
{
    protected $table = 'plantillas_fichas_medicas';

    protected $fillable = [
        'id_profesional',
        'id_especialidad',
        'nombre',
        'activa',
        'predeterminada',
        'version',
    ];

    public function profesional()
    {
        return $this->belongsTo(
            Profesional::class,
            'id_profesional'
        );
    }

    public function especialidad()
    {
        return $this->belongsTo(
            Especialidad::class,
            'id_especialidad'
        );
    }

    public function secciones()
    {
        return $this->hasMany(
            PlantillaFichaSeccion::class,
            'id_plantilla'
        )->orderBy('orden');
    }
}
