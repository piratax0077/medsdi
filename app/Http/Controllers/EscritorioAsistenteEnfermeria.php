<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\Prevision;
use App\Models\Region;
use App\Models\AsistenteTipo;
use App\Models\ProfesionalHorario;
use App\Models\Profesional;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\LugarAtencion;
use App\Models\Instituciones;
use App\Models\ContratoDependiente;
use App\Models\BoxesCm;
use App\Models\TipoBono;
use App\Models\ProfesionOficio;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EscritorioAsistenteEnfermeria extends Controller
{
    //
    public function index()
    {

        $array_data = array();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $prevision = Prevision::all();

        if (!isset($asistente))
            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);

        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();
        $profesion_oficio = ProfesionOficio::all();

        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;

        // $filtro[] = array('tipo_empleado','ASISTENTE PUBLICO');
        $array_tipo_empleado = array('ASISTENTE ADMINISTRATIVO', 'ASISTENTE CONSULTA', 'ASISTENTE JEFA CAJA', 'ASISTENTE MANEJO DE AGENDA', 'ASISTENTE ONLINE', 'ASISTENTE PUBLICO','ASISTENTE ENFERMERIA');

        $contrato = ContratoDependiente::where($filtro)->whereIn('tipo_empleado',$array_tipo_empleado)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

            $id_institucion = $contrato->id_institucion;
            $institucion = Instituciones::where('id', $id_institucion)->first();
            $profesionales = $lugares_atencion->profesionales()
            ->orderBy('apellido_uno','asc')
            ->get();

            foreach ($profesionales as $key_tipo_agenda => $value_tipo_agenda)
            {
                $registro_tipo_agenda = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $id_lugar_atencion)->orderBy('id', 'ASC')->get();
                $registro_tipo_agenda_cantidad = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $id_lugar_atencion)->count();

                if($registro_tipo_agenda_cantidad > 0)
				{
                    $profesionales[$key_tipo_agenda]['id_tipo_agenda'] = $registro_tipo_agenda[0]->tipo_agenda;
				}
                else
				{
                    $profesionales[$key_tipo_agenda]['id_tipo_agenda'] = 0;
				}
            }

            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $tipo_bonos = TipoBono::where('estado', 1)->get();

            $url = 'app.asistente_enfermeria.escritorio_asistente'; // institucion
            $asistente->id_lugar_atencion = $id_lugar_atencion;

			// box de institucion
            $filtro_box = array();
            $filtro_box[] = array('estado',1);
            $filtro_box[] = array('id_lugar_atencion',$id_lugar_atencion);
            $boxes = BoxesCm::where($filtro_box)->get();

            $array_data = array(
                'asistente' => $asistente,
                'prevision' => $prevision,
                'profesionales' => $profesionales,
                'lugares_atencion' => $lugares_atencion,
                'reg_confirmacion_hora' => $reg_confirmacion_hora,
                'region' => $region,
                'profesion_oficio' => $profesion_oficio,
                'tipo_bonos' => $tipo_bonos,
                'boxes' => $boxes,
                'institucion' => $institucion,
            );

            if (isset($asistente)) {
                if($asistente->bienvenido == 0)
                    return view('bienvenida.inicio_asistente');
                else
                    return view($url)->with($array_data);
            }

            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);
        }
        else
        {
            return 'revisar el contrato';
            return back()->with('error','Contrato de usuario no encontrado');
        }

    }

    /**
     * Retorna las visitas de enfermería de un paciente.
     * TODO: Implementar modelo VisitaEnfermeria cuando se cree la migración.
     */
    public function obtenerVisitasEnfermeria(Request $request, $paciente_id)
    {
        // Una vez creado el modelo y la migración, reemplazar por:
        // $visitas = \App\Models\VisitaEnfermeria::where('id_paciente', $paciente_id)
        //     ->orderBy('fecha', 'desc')
        //     ->get();
        // return response()->json(['estado' => 1, 'data' => $visitas]);

        return response()->json([
            'estado' => 1,
            'data'   => [],
            'mensaje' => 'Módulo de visitas pendiente de implementación.'
        ]);
    }
}
