<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalConvenio extends Model
{
    use HasFactory;

    protected $table = 'profesional_convenios';

    protected $fillable = [
        'nombre_convenio',
        'convenios',
        'tipo_atencion',
        'id_tipo_convenio',
        'porcentaje',
        'valor',
        'valor_garantia',
        'valor_copago_fonasa',
        'valor_bon_fonasa',
        'nivel_fonasa',
        'tpo_espera',
        'productos_convenio',
        'fecha_inicio',
        'fecha_fin',
        'observaciones',
        'id_profesional',
        'id_lugar_atencion',
        'estado',
    ];
}
