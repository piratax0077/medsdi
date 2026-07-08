<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompinController extends Controller
{
    //
    public function index()
    {
        return view('compin.home');
    }

    public function comision_medica()
    {
        return view('compin.comision_medica');
    }

    public function visto_bueno_controlador()
    {
        return view('compin.visto_bueno_controlador');
    }

    public function pago_subsidios()
    {
        return view('compin.pago');
    }

    public function trazabilidad_completa()
    {
        return view('compin.trazabilidad');
    }

    public function recepcion()
    {
        return view('compin.recepcion');
    }
}
