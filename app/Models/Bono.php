<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Bono extends Model
{
    use HasFactory;
    protected $table = 'bonos';

    public function TipoBono()
    {
        return $this->belongsTo(TipoBono::class, 'id_tipo_bono', 'id');
    }

    public function Convenio()
    {
        return $this->belongsTo(Prevision::class, 'convenio', 'id');
    }

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id');
    }

    public function Parametro()
    {
        return $this->belongsTo(Parametro::class, 'estado_consulta', 'id');
    }

    public function Profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional', 'id');
    }

    public function scopeFiltroRelacion($query, $profesional, $paciente, $asistente)
    {
        if(!empty($profesional->id))
            $query->where('id_profesional',$profesional->id);
        if(!empty($paciente->id))
            $query->orWhere('id_paciente',$paciente->id);
        if(!empty($asistente->id))
            $query->orWhere('id_asistente',$asistente->id);
    }
}
