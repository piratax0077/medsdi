<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TratamientoProfesionalInsumo extends Model
{
    protected $table = 'tratamientos_profesional_insumos';
    protected $fillable = ['id_diagnostico_profesional', 'id_producto', 'cantidad', 'valor_unitario', 'observaciones', 'estado'];
}
