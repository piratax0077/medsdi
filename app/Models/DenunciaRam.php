<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DenunciaRam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'denuncias_ram';

    protected $fillable = [
        'nombre_medicamento',
        'principio_activo',
        'laboratorio_fabricante',
        'id_paciente',
        'id_profesional',
        'id_usuario',
        'tipo_reaccion',
        'gravedad',
        'fecha_reaccion',
        'descripcion_reaccion',
        'observaciones',
        'accion_tomada',
        'estado',
    ];

    protected $casts = [
        'fecha_reaccion' => 'date',
    ];

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function Profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function Usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
