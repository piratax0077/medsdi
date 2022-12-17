<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MedicamentoUsoCronicoGeneral;
use Illuminate\Http\Request;

class MedicamentoUsoCronicoGeneralController extends Controller
{
    public function registrar(Request $request){
        $datos = array();
        $error = array();
        $valido = 0;
        if(empty($request->id_ficha_atencion)){
            $valido = 1;
            $error['id_ficha_atencion'] = 'Campo requerido id_ficha_atencion';
        }
        if(empty($request->id_paciente)){
            $valido = 1;
            $error['id_paciente'] = 'Campo requerido id_paciente';
        }
        if(empty($request->id_profesional)){
            $valido = 1;
            $error['id_profesional'] = 'Campo requerido id_profesional';
        }
        if(empty($request->nombre_medicamento)){
            $valido = 1;
            $error['nombre_medicamento'] = 'Campo requerido nombre_medicamento';
        }
        if(empty($request->cantidad)){
            $valido = 1;
            $error['cantidad'] = 'Campo requerido cantidad';
        }
        // if(empty($request->cliente)){
        //     $valido = 1;
        //     $error['cliente'] = 'Campo requerido cliente';
        // }
        // if(empty($request->estado)){
        //     $valido = 1;
        //     $error['estado'] = 'Campo requerido estado';
        // }
        if(empty($request->tipo_enfermedad)){
            $valido = 1;
            $error['tipo_enfermedad'] = 'Campo requerido tipo enfermedad';
        }

        if($valido == 0 )
        {
            $medicamento = new MedicamentoUsoCronicoGeneral();

            $medicamento->id_ficha_atencion = $request->id_ficha_atencion;
            $medicamento->id_paciente = $request->id_paciente;
            $medicamento->id_paciente = $request->id_paciente;
            $medicamento->id_profesional = $request->id_profesional;
            $medicamento->id_profesional = $request->id_profesional;
            $medicamento->nombre_medicamento = $request->nombre_medicamento;
            $medicamento->cantidad = $request->cantidad;
            $medicamento->tipo_enfermedad = $request->tipo_enfermedad;
            // $medicamento->cliente = $request->cliente;
            // $medicamento->estado = $request->estado;

            if($medicamento->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Exitoso';
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['error'] = $medicamento;
                $datos['request'] = $request->all();
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;

    }

    public function getRegsitros(Request $request)
    {

        $datos = array();
        $filtro = array();

        if(!empty($request->id_ficha_atencion)){
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }
        if(!empty($request->id_paciente)){
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_profesional)){
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
        if(!empty($request->nombre_medicamento)){
            $filtro[] = array('nombre_medicamento', 'like' ,$request->nombre_medicamento.'%');
        }
        if(!empty($request->cantidad)){
            $filtro[] = array('cantidad',$request->cantidad);
        }
        if(!empty($request->cliente)){
            $filtro[] = array('cliente',$request->cliente);
        }
        if(!empty($request->tipo_enfermedad)){
            $filtro[] = array('tipo_enfermedad',$request->tipo_enfermedad);
        }
        if(!empty($request->estado)){
            $filtro[] = array('estado',$request->estado);
        }

        $medicamento = Medicamentousocronicogeneral::where($filtro)->get();

        if($medicamento->count() > 0) {
            $datos['estado'] = 1;
            $datos['msj'] = 'busqueda exitosa';
            $datos['registros'] = $medicamento;
            $datos['request'] = $request->all();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Sin Registros';
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function getRegsitro(Request $request)
    {

        $datos = array();
        $filtro = array();
        $valido = 0;
        $error = array();

        if(empty($request->id)){
           $valido = 1;
           $error[] = 'Campo Requerido ID';
        }

        if($valido == 0){
             $medicamento = Medicamentousocronicogeneral::find($request->id);

            if($medicamento->count() > 0) {
                $datos['estado'] = 1;
                $datos['msj'] = 'busqueda exitosa';
                $datos['registros'] = $medicamento;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al buscar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Camppo Requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function deleteRegsitro(Request $request)
    {

        $datos = array();
        $filtro = array();
        $valido = 0;
        $error = array();

        if(empty($request->id)){
           $valido = 1;
           $error[] = 'Campo Requerido ID';
        }

        if($valido == 0){
            $medicamento = Medicamentousocronicogeneral::find($request->id);
            $medicamento->delete();

            if($medicamento->count() > 0) {
                $datos['estado'] = 1;
                $datos['msj'] = 'busqueda exitosa';
                $datos['registros'] = $medicamento;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al buscar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Camppo Requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }
}
