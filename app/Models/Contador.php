<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    use HasFactory;

    protected $table = 'contadores';

    protected $fillable = [
        'id_asistente_tipo',
        'rut',
        'nombres',
        'apellido_uno',
        'apellido_dos',
        'telefono_uno',
        'telefono_dos',
        'sexo',
        'email',
        'foto_perfil',
        'bienvenido',
        'fecha_nac',
        'id_premium',
        'id_tipo_asistente',
        'id_direccion',
        'id_usuario',
        'buscador',
        'id_modalidad',
        'curriculum'
    ];

    protected $casts = [
        'fecha_nac' => 'date',
        'buscador' => 'integer',
        'bienvenido' => 'string'
    ];

    /**
     * Relación con el tipo de asistente
     */
    public function AsistenteTipo()
    {
        return $this->belongsTo(Asistente::class, 'id_asistente_tipo', 'id');
    }

    /**
     * Relación con dirección
     */
    public function Direccion()
    {
        return $this->belongsTo(Direccion::class, 'id_direccion', 'id');
    }

    /**
     * Relación con usuario
     */
    public function Usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    /**
     * Relación con modalidad
     */
    public function Modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad', 'id');
    }

    /**
     * Relación con lugares de atención
     */
    public function LugaresAtencion()
    {
        return $this->hasMany(ContadorLugarAtencion::class, 'id_contador', 'id');
    }
}
