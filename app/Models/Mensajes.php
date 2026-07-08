<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    use HasFactory;

    protected $table = 'mensajes';

    /**
     * Relación con el usuario emisor del mensaje
     */
    public function usuarioEmisor()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    /**
     * Relación con el profesional emisor del mensaje
     */
    public function profesionalEmisor()
    {
        return $this->hasOneThrough(
            Profesional::class,
            User::class,
            'id',              // Foreign key en users table
            'id_usuario',      // Foreign key en profesionales table
            'id_usuario',      // Local key en mensajes table
            'id'               // Local key en users table
        );
    }

    /**
     * Relación con el profesional receptor del mensaje
     */
    public function profesionalReceptor()
    {
        return $this->belongsTo(Profesional::class, 'id_receptor', 'id');
    }
}
