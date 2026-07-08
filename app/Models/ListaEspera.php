<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaEspera extends Model
{
    use HasFactory;

    protected $table = 'lista_espera';

    // Asegurar que se incluyan siempre estos campos en las consultas
    protected $fillable = [
        'id_institucion',
        'id_lugar_atencion',
        'id_asistente',
        'id_profesional',
        'id_paciente',
        'observacion',
        'estado'
    ];

    public function institucion()
    {
        return $this->belongsTo(Instituciones::class, 'id_institucion', 'id');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion', 'id');
    }

    public function asistente()
    {
        return $this->belongsTo(Asistente::class, 'id_asistente', 'id');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional', 'id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id');
    }

}
