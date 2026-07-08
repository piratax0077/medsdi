<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaPresentacionHomeopatia extends Model
{
    use HasFactory;

    protected $table = 'receta_presentacion_homeopatia';

    protected $fillable = [
        'cantidad',
        'tipo_presentacion',
        'cant'
    ];
}
