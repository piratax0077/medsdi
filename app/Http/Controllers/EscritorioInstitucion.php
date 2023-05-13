<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Models\Region;
use App\Models\TipoInstitucion;
use App\Models\TipoServicio;
use Illuminate\Support\Facades\Auth;

class EscritorioInstitucion extends Controller
{
    public function index()
    {
        $servicio = Instituciones::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $tipo_servicio = TipoServicio::all();
        $tipo_institucion = TipoInstitucion::all();

        if (isset($servicio))
        {
            if($servicio->bienvenido == 0)
                return view('bienvenida.inicio_instituciones')->with(['regiones' => $region ]);
            else
                return view('app.adm_cm.home');

            // return view('app.profesional.escritorio_profesional')->with(['region' => $region, 'profesional' => $profesional, 'hora_dia' => $horas_dia]);
            return view('app.adm_cm.home');
        }
        else
        {
            return view('auth.Registros.registro_institucion')->with([
                'region' => $region,
                'tipo_servicio' => $tipo_servicio,
                'tipo_institucion' => $tipo_institucion,
            ]);
        }
    }
}
