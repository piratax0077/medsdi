<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaMedicamentoCronico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entrega_medicamentos_cronicos';

    protected $fillable = [
        'id_antecedente',
        'id_paciente',
        'id_profesional',
        'id_usuario',
        'cantidad_entregada',
        'fecha_entrega',
        'hora_entrega',
        'observaciones',
        'nombre_medicamento',
        'presentacion',
        'posologia',
        'via_administracion',
        'id_medicamento',
        'estado',
        'comprobante',
        'firma_paciente',
        'firma_profesional'
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Relación con el modelo Paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    /**
     * Relación con el modelo Profesional
     */
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    /**
     * Relación con el modelo User
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Relación con el modelo Antecedente (medicamento crónico)
     */
    public function antecedente()
    {
        return $this->belongsTo(Antecedente::class, 'id_antecedente');
    }

    /**
     * Scopes útiles
     */
    public function scopeEntregados($query)
    {
        return $query->where('estado', 1);
    }

    public function scopePendientes($query)
    {
        return $query->where('estado', 2);
    }

    public function scopePorFecha($query, $fecha)
    {
        return $query->whereDate('fecha_entrega', $fecha);
    }

    public function scopePorPaciente($query, $paciente_id)
    {
        return $query->where('id_paciente', $paciente_id);
    }

    public function scopePorProfesional($query, $profesional_id)
    {
        return $query->where('id_profesional', $profesional_id);
    }
}
