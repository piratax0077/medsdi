<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioPotencial extends Model
{
    protected $table = 'usuarios_potenciales';

    protected $fillable = [
        'rut',
        'nombre',
        'telefono',
        'email',
        'estado',
        'notas',
    ];
}
