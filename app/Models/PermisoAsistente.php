<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermisoAsistente extends Model
{
    protected $table = 'permisos_asistente';

    protected $fillable = [
        'id_asistente',
        'id_lugar_atencion',
        'permiso_cotizar',
        'permiso_confirmar_hora',
        'permiso_anular_hora',
        'permiso_subir_ver_archivos',
        'permiso_eliminar_archivos',
        'permiso_editar_pacientes',
        'permiso_ver_pacientes',
        'permiso_agendar_horas_extras',
        'permiso_agendar_examenes',
        'permiso_transcripcion_examenes',
        'permiso_entrega_caja',
    ];

    protected $casts = [
        'permiso_cotizar'           => 'boolean',
        'permiso_confirmar_hora'    => 'boolean',
        'permiso_anular_hora'       => 'boolean',
        'permiso_subir_ver_archivos'=> 'boolean',
        'permiso_eliminar_archivos' => 'boolean',
        'permiso_editar_pacientes'  => 'boolean',
        'permiso_ver_pacientes'     => 'boolean',
        'permiso_agendar_horas_extras' => 'boolean',
        'permiso_agendar_examenes' => 'boolean',
        'permiso_transcripcion_examenes' => 'boolean',
        'permiso_entrega_caja' => 'boolean',
    ];

    public function Asistente()
    {
        return $this->belongsTo(Asistente::class, 'id_asistente', 'id');
    }

    public function LugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion', 'id');
    }
}
