<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaDosisHomeopatia extends Model
{
    use HasFactory;

    protected $table = 'receta_dosis_homeopatia';

    protected $fillable = [
        'cod_parent',
        'tipo_prod',
        'indic'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
