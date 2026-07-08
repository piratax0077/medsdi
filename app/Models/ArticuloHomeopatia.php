<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloHomeopatia extends Model
{
    use HasFactory;

    protected $table = 'articulos_homeopatia';

    protected $fillable = [
        'cod_parent',
        'nombre',
        'present',
        'cont_rec',
        'tipo_cont',
        'dosis',
        'cant_comp',
        'cod_isp',
        'vigencia',
        'droga',
        'grupo',
        'temperatura'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
