<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parametro;

class HoraMedica extends Model
{
    use HasFactory;
    protected $table = 'horas_medicas';

    public function Estado()
    {
        return $this->hasOne(Parametro::class,'id','id_estado');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class,'id','id_paciente');
    }
}
