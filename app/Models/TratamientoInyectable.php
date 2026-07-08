<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TratamientoInyectable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tratamientos_inyectables';

    protected $fillable = [
        'ficha_atencion_id',
        'paciente_id',
        'tipo',
        // Campos para Receta Médica
        'id_receta_sdi',
        'buscar_receta',
        'observaciones_receta',
        'imagenes',
        // Campos para Inyectable IM/IV
        'incidentes_procedimiento',
        'otras_observaciones_procedimiento',
        // Campos para Control de Sueros
        'descripcion_sueros',
        'otros_tratamientos_parenterales',
        'observaciones_examen_control',
        'control_signos_vitales',
        // Campos comunes
        'usuario_registro_id',
    ];

    protected $casts = [
        'imagenes' => 'array',
        'buscar_receta' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Constantes para los tipos
    const TIPO_RECETA_MEDICA = 'receta_medica';
    const TIPO_INYECTABLE_IM_IV = 'inyectable_im_iv';
    const TIPO_CONTROL_SUEROS = 'control_sueros';

    /**
     * Relación con FichaAtencion
     */
    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'ficha_atencion_id');
    }

    /**
     * Relación con Paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    /**
     * Relación con el usuario que registró
     */
    public function usuarioRegistro()
    {
        return $this->belongsTo(User::class, 'usuario_registro_id');
    }

    /**
     * Scope para filtrar por tipo
     */
    public function scopeTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope para filtrar por ficha de atención
     */
    public function scopeFichaAtencion($query, $fichaAtencionId)
    {
        return $query->where('ficha_atencion_id', $fichaAtencionId);
    }

    /**
     * Accessor para obtener el nombre del tipo
     */
    public function getTipoNombreAttribute()
    {
        $tipos = [
            self::TIPO_RECETA_MEDICA => 'Receta Médica',
            self::TIPO_INYECTABLE_IM_IV => 'Inyectable IM/IV',
            self::TIPO_CONTROL_SUEROS => 'Control de Sueros',
        ];

        return $tipos[$this->tipo] ?? $this->tipo;
    }
}
