<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteEstado extends Model
{
    use HasFactory;

    protected $table = 'pacientes_estado';

    protected $fillable = [
        'id_paciente',
        'estado',
        'id_lugar_atencion',
        'id_responsable',
        'fecha',
        'observaciones',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Relación con el modelo Paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    /**
     * Relación con el modelo LugarAtencion
     */
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    /**
     * Relación con el modelo Profesional (responsable)
     */
    public function responsable()
    {
        return $this->belongsTo(Profesional::class, 'id_responsable');
    }

    /**
     * Obtener el nombre del tipo de estado
     */
    public function getTipoEstadoAttribute()
    {
        $estados = [
            1 => 'Conflictivo',
            2 => 'VIP',
            3 => 'Con Restricciones',
            4 => 'Con Deuda',
            5 => 'Moroso',
            6 => 'Prioritario',
            7 => 'Otro',
        ];

        return $estados[$this->estado] ?? 'Desconocido';
    }
}
