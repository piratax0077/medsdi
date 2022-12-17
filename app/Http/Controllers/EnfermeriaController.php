<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
class EnfermeriaController extends Controller
{
    public function enfermera_administrativa(){
        return view('app.enfermeria.enfermera_administrativa');
    }
    public function enfermera_tratante(){
        return view('app.enfermeria.enfermera_tratante');
    }
    public function enfermera_tens(){
        return view('app.enfermeria.enfermera_tens');
    }



}
