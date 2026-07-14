<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorios';

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function LugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion', 'id');
    }

    public function Usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }
}
