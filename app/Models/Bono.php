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

}
