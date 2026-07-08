<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaRecomendacionHomeopatia extends Model
{
    use HasFactory;
    protected $table = 'receta_recomendaciones_homeopatia';
    protected $fillable = ['nombre'];
}
