<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Models\Region;
use App\Models\Servicios;
use App\Models\TipoInstitucion;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
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
            if($servicio->bienvenida == 1)
            {
                $servicio->bienvenida = 0;
                $servicio->save();
                return view('bienvenida.instituciones')->with(['regiones' => $region ]);
            }
            else
            {
                return view('app.adm_cm.home');
            }
            // return view('app.profesional.escritorio_profesional')->with(['region' => $region, 'profesional' => $profesional, 'hora_dia' => $horas_dia]);
            return view('app.adm_cm.home');
        }

        return view('auth.Registros.registro_institucion')->with([
            'region' => $region,
            'tipo_servicio' => $tipo_servicio,
            'tipo_institucion' => $tipo_institucion,
        ]);
    }
}
