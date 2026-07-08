<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlDomiciliario extends Model
{
    use HasFactory;
    protected $table = 'control_domiciliario';

    // relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

}
