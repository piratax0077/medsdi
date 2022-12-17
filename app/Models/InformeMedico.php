<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeMedico extends Model
{
    use HasFactory;

    protected $table = 'informes_medicos';


    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }
}