<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenEspecialidad extends Model
{
    use HasFactory;
    protected $table = 'examen_especialidad';

    //examen_especialidad_img
    public function ExamenEspecialidadImg()
    {
        return $this->hasMany(ExamenEspecialidadImg::class,'id_examen', 'id');
    }
}
