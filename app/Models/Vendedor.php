<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedors';

    protected $fillable = [
        'empresa',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'sexo',
        'rut',
        'email',
        'telefono_uno',
        'telefono_dos',
        'id_direccion',
        'id_admin',
        'bienvenido',
        'estado',
    ];
}
