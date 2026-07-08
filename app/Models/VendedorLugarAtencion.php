<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendedorLugarAtencion extends Model
{
    use HasFactory;

    protected $table = 'vendedor_lugar_atencions';

    protected $fillable = [
        'id_vendedor',
        'id_lugar_atencion',
        'token',
        'id_profesional',
        'id_institucion',
        'estado',
    ];
    // Relaciones
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor');
    }
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

}
