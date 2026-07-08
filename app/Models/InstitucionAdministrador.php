<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionAdministrador extends Model
{
    use HasFactory;

    protected $table = 'institucion_administradores';

    protected $fillable = [
        'id_institucion',
        'id_usuario',
        'id_tipo_administrador',
        'estado',
    ];

    public function TipoAdministrador()
    {
        return $this->hasOne(TipoAdministrador::class, 'id', 'id_tipo_administrador');
    }

    public function Usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

    public function Profesional()
    {
        return $this->hasOneThrough(
            Profesional::class,
            User::class,
            'id',            // FK en users (PK)
            'id_usuario',    // FK en profesionales
            'id_usuario',    // FK local (en institucion_administradores)
            'id'             // PK en users
        );
    }
}
