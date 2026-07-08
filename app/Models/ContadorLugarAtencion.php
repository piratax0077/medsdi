<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContadorLugarAtencion extends Model
{
    use HasFactory;

    protected $table = 'contadores_lugar_atencion';

    protected $fillable = [
        'id_contador',
        'id_lugar_atencion',
        'token',
        'id_profesional',
        'id_institucion',
        'examen',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'examen' => 'integer'
    ];

    /**
     * Relación con el contador
     */
    public function Contador()
    {
        return $this->belongsTo(Contador::class, 'id_contador', 'id');
    }

    /**
     * Relación con el lugar de atención
     */
    public function LugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion', 'id');
    }

    /**
     * Relación con el profesional
     */
    public function Profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional', 'id');
    }

    /**
     * Relación con la institución
     */
    public function Institucion()
    {
        return $this->belongsTo(Instituciones::class, 'id_institucion', 'id');
    }
}

