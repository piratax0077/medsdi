<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AsistenteController extends Controller
{
    public function index(){
        $code = Crypt::encryptString(Auth::user()->email);
        return view('template.asistenteLabTemplate',['code' => $code]);
    }

    public function getPacientes(){
        $pacientes = Paciente::all();
        foreach ($pacientes as $p) {
            $previcion = $p->Prevision()->first()->nombre;
            $direccion = $p->Direccion()->first();

            $formatDirection = $direccion->direccion.' #'.$direccion->numero_dir.', '.$direccion->Ciudad()->first()->nombre;

            $p->Previcion = $previcion;
            $p->Direccion = $formatDirection;
        }
        $data = [
            'pacientes' => $pacientes
        ];
        return json_encode($data);
    }
}
