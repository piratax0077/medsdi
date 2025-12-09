<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\ProcedimientosCentro;
use Illuminate\Support\Facades\Auth;
use App\Models\AcompananteDependiente;
use App\Models\Instituciones;
use App\Models\Sucursal;
use App\Models\SucursalHorario;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\TipoEspecialidad;
use App\Models\SubTipoEspecialidad;
use Illuminate\Http\Request;

class CentroMedicoController extends Controller
{
    //
    public function buscarProfesional(Request $req){

        $id_lugar_atencion = $req->id_centro_medico;

        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();

        $especialidades = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::find($p->id_profesional);
            if($profesional){
                $especialidad = Especialidad::find($profesional->id_especialidad);
                array_push($especialidades, $especialidad);
            }
        }
        return array_values(array_unique($especialidades));
    }

    public function buscarEspecialidades(Request $req){
        $id_especialidad = $req->id_profesion;
        $id_lugar_atencion = $req->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $tipos_especialidad = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_especialidad', $id_especialidad)->first();
            if($profesional){
                $especialidad = TipoEspecialidad::find($profesional->id_tipo_especialidad);
                array_push($tipos_especialidad, $especialidad);
            }
        }
        return array_values(array_unique($tipos_especialidad));
    }

    public function buscarSubEspecialidades(Request $req){
        $id_tipo_especialidad = $req->id_tipo_especialidad;

        $id_lugar_atencion = $req->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $sub_tipos_especialidad = [];
        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_tipo_especialidad', $id_tipo_especialidad)->first();
            if($profesional){
                $especialidad = SubTipoEspecialidad::find($profesional->id_sub_tipo_especialidad);
                if($especialidad){
                    array_push($sub_tipos_especialidad, $especialidad);
                }else{
                    array_push($profesionales, $profesional);
                }

            }
        }
        if(count($sub_tipos_especialidad) > 0){
            $valores = array_values(array_unique($sub_tipos_especialidad));
            return ['value' => 'tipos_especialidades', 'tipos_especialidades' => $valores ];
        }else{
            $valores = array_values(array_unique($profesionales));
            return ['value' => 'profesionales', 'profesionales' => $valores];
        }

    }

    public function buscarProfesionales(Request $req){

        $id_lugar_atencion = $req->id_lugar_atencion;
        $id_profesion = $req->id_profesion;
        $id_especialidad = $req->id_especialidad;
        $id_tipo_especialidad = $req->id_tipo_especialidad;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_especialidad',$id_profesion)->where('id_tipo_especialidad', $id_especialidad)->where('id_sub_tipo_especialidad',$id_tipo_especialidad)->first();
            if($profesional){
                array_push($profesionales, $profesional);
            }


        }
        $result = array_values(array_unique($profesionales));

        return ['profesionales' => $profesionales];
    }

    public function obtenerDatosPacientePorRut(Request $request){

        $datos = array();
        if(empty($request->id_dependiente_activo))
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();
        }
        else
        {
            $paciente = Paciente::where('id', $request->id_dependiente_activo)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();

            /** BUSCAR INFORMACION DE DEPENDIENTES */
            $info_depen = PacientesDependientes::where('id_paciente', $paciente->id)->first();

            if($info_depen)
            {
                /** BUSCAR RESPONSABLES */
                $filtro_temp = array();
                $filtro_temp[] = array('id_dependiente', $info_depen->id_paciente);
                $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
                $registro_temp = AcompananteDependiente::where('id_responsable', $info_depen->id_responsable)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
                $paciente['acompanante'] = $registro_temp;

                /** BUSCAR REPRESENTENATE */
                $registro_representante = Paciente::where('id_usuario', Auth::user()->id)->first();
                $paciente['representante'] = $registro_representante;
            }
            else
            {
                $paciente['acompanante'] = null;
                $paciente['representante'] = null;
            }

            $paciente['edad'] = $this->obtener_edad_segun_fecha($paciente->fecha_nac);
        }


        if($paciente)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Registros';
            $datos['registro'] = $paciente;
            $datos['profesional'] = Profesional::where('id', $request->id_profesional)
                                                ->with('Especialidad')
                                                ->with('TipoEspecialidad')
                                                ->with('SubTipoEspecialidad')
                                                ->first();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;
    }

    public function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $fecha_actual = new \DateTime();
        $fecha_nac = new \DateTime($fecha_nacimiento);
        $edad = $fecha_actual->diff($fecha_nac);
        return $edad->y;
    }

    public function confirmarReserva(Request $request){
        $datos = array();
        // Aquí debes implementar la lógica para guardar la reserva en la base de datos
        // Usando los datos recibidos en $request

        // Ejemplo de datos recibidos:
        $id_paciente = $request->id_paciente;
        $id_profesional = $request->id_profesional;
        $id_lugar_atencion = $request->id_lugar_atencion;
        $fecha_consulta = $request->fecha_consulta;
        $hora_consulta = $request->hora_consulta;

        // Lógica para guardar la reserva (debes adaptarla a tu modelo y base de datos)
        // ...

        // Suponiendo que la reserva se guarda correctamente
        $datos['estado'] = 1;
        $datos['msj'] = 'Reserva confirmada exitosamente';

        return $datos;
    }

    public function buscarExamenes(Request $request){
        $examenes = ProcedimientosCentro::where('id_lugar_atencion', $request->id_centro_medico)->get();
        return $examenes;
    }

    public function buscarSucursalesLaboratorio(Request $request){
        $institucion = Instituciones::where('id_lugar_atencion', $request->id_laboratorio)->first();
        $sucursales = Sucursal::where('id_institucion', $institucion->id)->get();
        return $sucursales;
    }

    public function buscarProfesionalesExamen(Request $request){

        $sucursal = Sucursal::where('id', $request->id_sucursal)->first();
        $institucion = Instituciones::where('id', $sucursal->id_institucion)->first();

        $id_examen = $request->id_examen;
        $id_lugar_atencion = $institucion->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();

        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->first();
            if($profesional){
                array_push($profesionales, $profesional);
            }
        }
        return ['profesionales' => $profesionales];
    }

    public function horasExamenProfesionalLugarAtencion(Request $request){
        $datos = array();
        $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
        $horario = SucursalHorario::where('id_institucion', $institucion->id)
                                        // ->where('id_lugar_atencion', $request->lugar_atencion)
                                        // ->tipoAgenda($request->tipo_agenda)
                                        ->orderBy('dia', 'ASC')
                                        ->get();

        $dias_no_laborales = ['1','2','3','4','5','6','7'];
        $dias_laborales = [];

        foreach ($horario as $hor) {
            $ho = explode(',', $hor->dia);
            foreach ($ho as $h) {
                $h = trim($h);
                // Agregar a días laborales si no está ya
                if (!in_array($h, $dias_laborales)) {
                    $dias_laborales[] = $h;
                }

                // Quitar de los días no laborales si está presente
                if (($key = array_search($h, $dias_no_laborales)) !== false) {
                    unset($dias_no_laborales[$key]);
                }
            }
        }

        // Ordenar los arrays si quieres mantener un orden consistente
        sort($dias_laborales);
        sort($dias_no_laborales);

        $horario_agenda_laboral = implode(',', $dias_laborales);
        $horario_agenda_no_laboral = implode(',', $dias_no_laborales);

        $datos['estado'] = 1;
        $datos['msj'] = 'registros';
        $datos['registros'] = array(
            'horario_agenda_laboral' => $horario_agenda_laboral,
            'horario_agenda_no_laboral' => $horario_agenda_no_laboral
        );

        return $datos;
    }



}
