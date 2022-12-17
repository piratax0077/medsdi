<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Region;
use App\Models\Servicios;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscritorioServicio extends Controller
{
    public function index()
    {
        $servicio = Servicios::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $tipo_servicio = TipoServicio::all();
        

        if (isset($servicio)) {
            
            // return view('app.profesional.escritorio_profesional')->with(['region' => $region, 'profesional' => $profesional, 'hora_dia' => $horas_dia]);
        }

        
        return view('auth.Registros.registro_servicio')->with([
            'region' => $region, 
            'tipo_servicio' => $tipo_servicio, 
        ]);
    }
}
