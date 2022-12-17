<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;
    protected $table = 'instituciones';


    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

    public function UsuarioAdministrador()
    {
        return $this->hasOne(AdminInstServ::class, 'id', 'id_responsable');
    }

    public function TipoInstitucion()
    {
        return $this->hasOne(TipoInstitucion::class, 'id', 'id_tipo_institucion');
    }
    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }
}
