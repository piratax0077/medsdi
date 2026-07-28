<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudPrestacionCentro extends Model
{
    protected $table = 'solicitudes_prestaciones_centro';

    protected $guarded = [];

    protected $casts = [
        'valor_profesional' => 'decimal:2',
        'valor_centro_propuesto' => 'decimal:2',
        'fecha_resolucion' => 'datetime',
    ];

    public function profesional() { return $this->belongsTo(Profesional::class, 'id_profesional'); }
    public function lugarAtencion() { return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion'); }
    public function tipoPrestacion() { return $this->belongsTo(TipoPrestacion::class, 'id_tipo_prestacion'); }
    public function procedimientoCentro() { return $this->belongsTo(ProcedimientosCentro::class, 'id_procedimiento_centro'); }
}
