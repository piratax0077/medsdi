<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaEnfermeriaDocumentoNutricion extends Model
{
    use HasFactory;

    protected $table = 'fichas_enfermeria_documentos_nutricion';

    protected $fillable = [
        'id_ficha_enfermeria',
        'id_ficha_atencion',
        'id_paciente',
        'id_nutricionista',
        'tipo',
        'url',
        'nombre_original',
        'nombre_archivo',
        'extension',
        'estado',
    ];

    public function Nutricionista()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_nutricionista');
    }

    public function FichaEnfermeria()
    {
        return $this->hasOne(FichaAtencionEnfermeria::class, 'id', 'id_ficha_enfermeria');
    }
}
