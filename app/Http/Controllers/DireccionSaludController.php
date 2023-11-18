<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DireccionSaludController extends Controller
{
    public function index()
    {
        $ruta_blade = 'direccion_salud.escritorio_direccion_salud';
        return view($ruta_blade)->with(
            []
        );
    }

    public function cargarGes()
    {
        return view('direccion_salud.escritorio_ges')->with([]);
    }
    public function cargarEnfNotiOblig()
    {
        return view('direccion_salud.escritorio_enfer_noti_obliga')->with([]);
    }
    public function CargarControlMedicamento()
    {
        return view('direccion_salud.escritorio_control_medicamento')->with([]);
    }
    public function CargarControlFarmacia()
    {
        return view('direccion_salud.escritorio_control_farmacia')->with([]);
    }
}
