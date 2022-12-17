<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Permission;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('administracion.home');
    }

    public function roles_permisos()
    {
        $usuario = User::where('id', Auth::user()->id)->first();
        $usuarios = User::all();
        $permisos = Permission::all();
        foreach ($usuarios as $u) {
            switch ($u->getRoleNames()->first()) {
               case 'Admin':
                $paciente = Paciente::where('id_usuario', $u->id)->first();
                if (isset($paciente->nombres)) {
                    $u->Nombre = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
                    $u->Rut = $paciente->rut;
                } else {
                    $u->Nombre = '';
                    $u->Rut = '';
                }
                break;

                case 'Paciente':
                $paciente = Paciente::where('id_usuario', $u->id)->first();
                if (isset($paciente->nombres)) {
                    $u->Nombre = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
                    $u->Rut = $paciente->rut;
                } else {
                    $u->Nombre = '';
                    $u->Rut = '';
                }
                break;
            }
        }

        return view('administracion.roles_permisos')->with(['usuario' => $usuario, 'usuarios' => $usuarios, 'permisos' => $permisos]);
    }

    public function agregar_permiso(Request $request)
    {
        $user->givePermissionTo('admin.role.create');

        return json_encode($user);
    }
}