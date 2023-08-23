<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antecedente;
use App\Models\Articulo;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\TipoAntecedente;

class AntecedenteController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente',$request->id_paciente);
        if(!empty($request->id_tipo_antecedente))
            $filtros[] = array('id_tipo_antecedente',$request->id_tipo_antecedente);
        if(!empty($request->id_usuario))
            $filtros[] = array('id_usuario',$request->id_usuario);
        if(!empty($request->comentario))
            $filtros[] = array('comentario',$request->comentario);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        

        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = Antecedente::where($filtros)->count();

        if($cant_reg >0){

            $registros = Antecedente::where($filtros)->with('users','paciente','tipo_antecendente')->get();

            foreach ($registros as $valor) {
                $valor['antecedente_data'] = json_decode($valor['data'],true);
            }

            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();           
            $datos['registros'] = $registros;

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Sin registros';
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistro(Request $request){

        $datos = array();
        $filtros = array();
        $error = array();
        $campos_requeridos = 0;


        /* VALIDACION CAMPOS */
        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* CAMPOS FILTRO */
        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente',$request->id_paciente);
        if(!empty($request->id_tipo_antecedente))
            $filtros[] = array('id_tipo_antecedente',$request->id_tipo_antecedente);
        if(!empty($request->id_users))
            $filtros[] = array('id_users',$request->id_users);
        if(!empty($request->comentario))
            $filtros[] = array('comentario',$request->comentario);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        if($campos_requeridos==0)
        {

            $cant_reg = Antecedente::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = Antecedente::where($filtros)->with('users','paciente','tipo_antecendente')->find($request->id);

                if($registros->count())
                {
                    
                        $registros['antecedente_data'] = json_decode($registros['data'],true);

                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['request'] = $request->all();

                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Sin registros';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');

    }

    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new Antecedente();

        /* VALIDACION CAMPOS */
        if($request->id_paciente=='')
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_tipo_antecedente=='')
        {
            $error['id_tipo_antecedente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_users=='')
        {
            $error['id_users'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        /*
        if($request->comentario=='')
        {
            $error['comentario'] = 'campo requerido';
            $campos_requeridos = 1;
        }*/

        /*
        if($request->data=='')
        {
            $error['data'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        
        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->id_paciente = $request->id_paciente;
            $registro->id_tipo_antecedente = $request->id_tipo_antecedente;

            $registro->id_users = $request->id_users;
            $registro->comentario = $request->comentario;
            //GUARDADO DE DATOS
            $data_json = $this->estructuraJson($request);                                    
            $registro->data = $data_json;

            $registro->estado = $request->estado;

            if($registro->save())
            {
				$datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();
				
				if( $request->id_tipo_antecedente == 7)
                {
					$profesional = Profesional::where('id_usuario', $request->id_users)->get()->first();

					$registro_med_cronico = new MedicamentoUsoCronicoGeneral();
					$registro_med_cronico->id_ficha_atencion = NULL;
					$registro_med_cronico->id_paciente = $request->id_paciente;
					$registro_med_cronico->id_profesional = $profesional->id;
					$registro_med_cronico->nombre_medicamento = $request->nombre_medicamento_cronico;
					$registro_med_cronico->cantidad = $request->dosis;
					$registro_med_cronico->cliente = 0;
					$registro_med_cronico->tipo_enfermedad = 'cronica';
					$registro_med_cronico->estado = 1;

					if($registro_med_cronico->save())
					{
						$datos['med_cronico']['estado'] = 1;
						$datos['med_cronico']['msg'] = 'Registros Creado';
					}
					else
					{
						$datos['med_cronico']['estado'] = 0;
						$datos['med_cronico']['msg'] = 'Falla Registros';
					}
                }
            }
			else
			{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }
        }
		else
		{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function modificar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if((int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_paciente=='')
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_tipo_antecedente=='')
        {
            $error['id_tipo_antecedente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_users=='')
        {
            $error['id_users'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        /*
        if($request->comentario=='')
        {
            $error['comentario'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */
        /*
        if($request->data=='')
        {
            $error['data'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */

        if($campos_requeridos==0)
        {

            $registro = Antecedente::find($request->id);

            if($registro)
            {

                if(!empty($request->id_paciente))
                    $registro->id_paciente = $request->id_paciente;
                if(!empty($request->id_tipo_antecedente))
                    $registro->id_tipo_antecedente = $request->id_tipo_antecedente;

                if(!empty($request->id_users))
                    $registro->id_users = $request->id_users;
                if(!empty($request->comentario))
                    $registro->comentario = $request->comentario;

                //GUARDADO DE DATOS
                $data_json = $this->estructuraJson($request);                                    
                $registro->data = $data_json;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Modificado';
                    $datos['request_data'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al Modificar';
                    $datos['request_data'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function estado(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if(empty($request->id)||(int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->estado==null){
            $error['estado'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $registro = Antecedente::find($request->id);

            if($registro->count()>0)
            {
             
                    $registro->estado = $request->estado;
                    if($registro->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msg'] = 'Registro Actualizado';
                        $datos['request'] = $request->all();
                    }else{
                        $datos['estado'] = 0;
                        $datos['msg'] = 'Problemas al actualizar el registro';
                        $datos['request'] = $request->all();
                    }
                

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existe';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }


    public function estructuraJson($request)
    {
        $params = $request->all();

        extract($params);        
        $nombre = isset($nombre)==true?$nombre:'';
        $fecha = isset($fecha)==true?$fecha:'';
        $procedimiento = isset($procedimiento)==true?$procedimiento:'';
        $detalle = isset($detalle)==true?$detalle:'';
        $profesional = isset($profesional)==true?$profesional:'';
        $rut_responsable = isset($rut_responsable)==true?$rut_responsable:'';
        $comentario = isset($comentario)==true?$comentario:'';
        $transfusion = isset($transfusion)==true?$transfusion:'';
        $dona_organos = isset($dona_organos)==true?$dona_organos:'';
        $dona_organos_parcial = isset($dona_organos_parcial)==true?$dona_organos_parcial:'';
        $dona_sangre = isset($dona_sangre)==true?$dona_sangre:'';
        $impedimento_donar = isset($impedimento_donar)==true?$impedimento_donar:'';
        $comentario_gs = isset($comentario_gs)==true?$comentario_gs:'';
        $hepatitis = isset($hepatitis)==true?$hepatitis:'';
        $comentario_hepa = isset($comentario_hepa)==true?$comentario_hepa:'';
        $id_grupo_sanguineo = isset($id_grupo_sanguineo)==true?$id_grupo_sanguineo:'';
        $nombre_enfermedad_cronica = isset($nombre_enfermedad_cronica)==true?$nombre_enfermedad_cronica:'';
        $id_enfermedad_cronica = isset($id_enfermedad_cronica)==true?$id_enfermedad_cronica:'';
        $id_medicamento = isset($id_medicamento)==true?$id_medicamento:'';
        $nombre_medicamento_cronico = isset($nombre_medicamento_cronico)==true?$nombre_medicamento_cronico:'';
        $id_dosis = isset($id_dosis)==true?$id_dosis:'';
        $dosis = isset($dosis)==true?$dosis:'';
        $institucion = isset($institucion)==true?$institucion:'';
        $discapacidad_tipo = isset($discapacidad_tipo)==true?$discapacidad_tipo:'';
        $discapacidad_grado = isset($discapacidad_grado)==true?$discapacidad_grado:'';
        $discapacidad_permanente = isset($discapacidad_permanente)==true?$discapacidad_permanente:'';
        
        $json_data = array(
            'nombre'=>$nombre,
            'fecha'=>$fecha,
            'procedimiento'=>$procedimiento,
            'detalle'=>$detalle,
            'profesional'=>$profesional,
            'rut_responsable'=>$rut_responsable,
            'comentario'=>$comentario,
            'transfusion'=>$transfusion,
            'dona_organos'=>$dona_organos,
            'dona_organos_parcial'=>$dona_organos_parcial,
            'dona_sangre'=>$dona_sangre,
            'impedimento_donar'=>$impedimento_donar,
            'comentario_gs'=>$comentario_gs,
            'hepatitis'=>$hepatitis,
            'comentario_hepa'=>$comentario_hepa,
            'id_grupo_sanguineo'=>$id_grupo_sanguineo,
            'nombre_enfermedad_cronica'=> $nombre_enfermedad_cronica,
            'id_enfermedad_cronica'=>$id_enfermedad_cronica,
            'id_medicamento'=>$id_medicamento,
            'nombre_medicamento_cronico'=>$nombre_medicamento_cronico,
            'id_dosis'=>$id_dosis,
            'dosis'=>$dosis,
            'institucion'=>$institucion,
            'discapacidad_tipo'=>$discapacidad_tipo,
            'discapacidad_grado'=>$discapacidad_grado,
            'discapacidad_permanente'=>$discapacidad_permanente,
            'fecha_regitro'=>date('d-m-Y')
        );

        /* JSON */ 
        /*
          {
            "nombre":"",
            "fecha":"",
            "procedimiento":"",
            "detalle":"",
            "rut_responsable":"",
            "comentario":"",
            "transfusion":"",
            "dona_organos":"",
            "dona_organos_parcial":"",
            "dona_sangre":"",
            "impedimento_donar":"",
            "comentario_gs":"",
            "hepatitis":"",
            "comentario_hepa":"",
            "id_grupo_sanguineo":"",
            "nombre_enfermedad_cronica":"",
            "id_enfermedad_cronica":"",
            "id_medicamento":"",
            "nombre_medicamento_cronico":"",
            "id_dosis":"",
            "dosis":"",
            "institucion":"",
            "discapacidad_tipo":"",
            "discapacidad_grado":"",
            "discapacidad_permanente":"",
          } 
        */

        return json_encode($json_data);
    }
}
