<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\Bono;
use App\Models\ContratoDependiente;
use App\Models\Instituciones;
use App\Models\Paciente;
use App\Models\Parametro;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\RendicionCaja;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FlujoCajaController extends Controller
{
    public function ver_flujo_caja()
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $filtro = array();
        if(Auth::user()->hasRole('Admin'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            // $filtro[] = array('id_paciente',$paciente->id);
            // $filtro[] = array('id_profesional',$profesional->id);
            // $filtro[] = array('id_asistente',$asistente->id);
            $bonos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->get();
            $bonos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->get();
            $bonos_rendidos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->get();
            $bonos_rendidos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('AsistenteAdm') || Auth::user()->hasRole('AsistenteJefaCaja') || Auth::user()->hasRole('AsistenteCaja') || Auth::user()->hasRole('AsistenteOnline'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Institucion'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Servicio'))
        {
            $servicio = AdminInstServ::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Contador'))
        {
            // $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    public function dataFlujoCaja(Request $request)
    {
        $datos = array();
        $registro = '';
        $search_fecha = '';
        $search_asistente = '';
        $search_convenio = '';
        $search_estado_consulta = '';
        if(!empty($request->fecha))
            $search_fecha = $request->fecha;
        if(!empty($request->asistente))
            $search_asistente = $request->asistente;
        if(!empty($request->convenio))
            $search_convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $search_estado_consulta = $request->estado_consulta;

        $filtro_user = array();
        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            if(!empty($search_fecha))
                $filtro[] = array('fecha_atencion','like', $search_fecha.'%');
            if(!empty($search_asistente))
                $filtro[] = array('id_asistente',$search_asistente);
            if(!empty($search_convenio))
                $filtro[] = array('convenio',$search_convenio);
            if(!empty($search_estado_consulta))
                $filtro[] = array('estado_consulta',$search_estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            $registro = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->with(['TipoBono' => function($query){
                            $query->select('id','nombre');
                        }])
                        ->with(['Convenio' => function($query){
                            $query->select('id','nombre');
                        }])
                        ->with(['Paciente' => function($query){
                            $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
                        }])
                        ->with(['Parametro' => function($query){
                            $query->select('id','valor');
                        }])
                        ->with(['Profesional' => function($query){
                            $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
                        }])
                        ->get();

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array();
        }

        if(!$registro)
        {
            $filtro = array();
            if(!empty($search_fecha))
                $filtro[] = array('fecha_atencion','like', $search_fecha.'%');
            if(!empty($search_asistente))
                $filtro[] = array('id_asistente',$search_asistente);
            if(!empty($search_convenio))
                $filtro[] = array('convenio',$search_convenio);
            if(!empty($search_estado_consulta))
                $filtro[] = array('estado_consulta',$search_estado_consulta);

                $registro = Bono::where($filtro_user)
                ->where('numero_sesiones','=','0')
                ->where($filtro)
                ->with(['TipoBono' => function($query){
                    $query->select('id','nombre');
                }])
                ->with(['Convenio' => function($query){
                    $query->select('id','nombre');
                }])
                ->with(['Paciente' => function($query){
                    $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
                }])
                ->with(['Parametro' => function($query){
                    $query->select('id','valor');
                }])
                ->with(['Profesional' => function($query){
                    $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
                }])
                ->get();
        }


        if($registro){
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function dataFlujoCajaPrograma(Request $request)
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $fecha = '';
        $asistente = '';
        $convenio = '';
        $estado_consulta = '';
        if(!empty($request->fecha))
            $fecha = $request->fecha;
        if(!empty($request->asistente))
            $asistente = $request->asistente;
        if(!empty($request->convenio))
            $convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $estado_consulta = $request->estado_consulta;

        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            $filtro[] = array('fecha_atencion',$fecha);
            $filtro[] = array('id_asistente',$asistente);
            $filtro[] = array('convenio',$convenio);
            $filtro[] = array('estado_consulta',$estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            // $filtro[] = array('id_paciente',$paciente->id);
            // $filtro[] = array('id_profesional',$profesional->id);
            // $filtro[] = array('id_asistente',$asistente->id);
            $bonos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    public function dataFlujoCajaRendidos(Request $request)
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $fecha = '';
        $asistente = '';
        $convenio = '';
        $estado_consulta = '';
        if(!empty($request->fecha))
            $fecha = $request->fecha;
        if(!empty($request->asistente))
            $asistente = $request->asistente;
        if(!empty($request->convenio))
            $convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $estado_consulta = $request->estado_consulta;

        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            $filtro[] = array('fecha_atencion',$fecha);
            $filtro[] = array('id_asistente',$asistente);
            $filtro[] = array('convenio',$convenio);
            $filtro[] = array('estado_consulta',$estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            // $filtro[] = array('id_paciente',$paciente->id);
            // $filtro[] = array('id_profesional',$profesional->id);
            // $filtro[] = array('id_asistente',$asistente->id);
            $bonos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();

            $bonos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();

            $bonos_rendidos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();

            $bonos_rendidos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    public function dataFlujoCajaRendidosProgramas(Request $request)
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $fecha = '';
        $asistente = '';
        $convenio = '';
        $estado_consulta = '';
        if(!empty($request->fecha))
            $fecha = $request->fecha;
        if(!empty($request->asistente))
            $asistente = $request->asistente;
        if(!empty($request->convenio))
            $convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $estado_consulta = $request->estado_consulta;

        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            $filtro[] = array('fecha_atencion',$fecha);
            $filtro[] = array('id_asistente',$asistente);
            $filtro[] = array('convenio',$convenio);
            $filtro[] = array('estado_consulta',$estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            $bonos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos_programa = Bono::where(function($query) use($profesional, $paciente, $asistente) {
                        $query->where('id_profesional',$profesional->id)
                            ->orWhere('id_paciente',$paciente->id)
                            ->orWhere('id_asistente',$asistente->id);
                        })
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    /** Asistentes CM*/
    public function rendirCajaDiaria(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);

            /** bono  */
            $bonos = Bono::where($filtro)
                ->where('numero_sesiones','=','0')
                ->where('rendido','0')
                ->whereDay('fecha_atencion', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->where('id_asistente', $asistente->id)
                ->get();

            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1)
                    $total_bonos++;
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else
                    $total_otros++;

            }

            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->pluck('id_asistente')->toArray();
            $listado_recibe = Asistente::whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id])
                                            ->get();


            return view('app.asistente_cm_publico.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                // 'bonos_programa' => $bonos_programa,
            ]);
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    /** Asistente CM JEFA */
    public function rendirCajaDiariaJefe(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);

            /** bono  */
            $bonos = Bono::where($filtro)
                ->where('numero_sesiones','=','0')
                ->where('rendido','0')
                ->whereDay('fecha_atencion', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->where('id_asistente', $asistente->id)
                ->get();

            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_copago = 0;
            $total_otros = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1)
                    $total_bonos++;
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                // 7->copago
                else if($bono->id_clase_bono == 7)
                    $total_copago += $bono->valor_atencion;
                else
                    $total_otros++;

            }

            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->pluck('id_asistente')->toArray();
            $listado_recibe = Asistente::whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id])
                                            ->get();

            /** RENDICION */
            $rendiciones = RendicionCaja::where('id_asistente_receptor', $asistente->id)->where('rendicion','0')->where('estado',2)->get();

            $total_rendiciones = 0;
            $total_documentos_rendiciones = 0;
            $total_bonos_rendiciones = 0;
            $total_efectivo_rendicion = 0;
            $total_copago_rendicion = 0;
            $total_otros_rendicion = 0;
            $total_archivos_rendicion = 0;
            $lista_rendiciones = array();

            if($rendiciones)
            {
                foreach ($rendiciones as $rendicion)
                {
                    $lista_rendiciones[] = $rendicion->id;

                    $total_rendiciones++;
                    $total_documentos_rendiciones += $rendicion->total_documentos;
                    $total_bonos_rendiciones += $rendicion->total_bono;
                    $total_efectivo_rendicion += $rendicion->total_efectivo;
                    $total_copago_rendicion += $rendicion->total_copago;
                    $total_otros_rendicion += $rendicion->total_otros;

                    if(!empty($rendicion->archivos))
                    {
                        $archivos_array  = explode('|',$rendicion->archivos);
                        $total_archivos_rendicion += count($archivos_array);
                        $rendicion->cantidad_archivos = count($archivos_array);
                    }
                    else
                    {
                        $rendicion->cantidad_archivos = 0;
                    }
                }
            }

            return view('app.asistente_cm.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_copago' => $total_copago,
                'total_otros' => $total_otros,
                'rendiciones' => $rendiciones,
                'total_rendiciones' => $total_rendiciones,
                'total_documentos_rendiciones' => $total_documentos_rendiciones,
                'total_bonos_rendiciones' => $total_bonos_rendiciones,
                'total_efectivo_rendicion' => $total_efectivo_rendicion,
                'total_copago_rendicion' => $total_copago_rendicion,
                'total_otros_rendicion' => $total_otros_rendicion,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
                // 'bonos_programa' => $bonos_programa,
            ]);
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    public function cargaBonosAsistenteDia(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);

            /** bono  */
            $bonos = Bono::where($filtro)
                ->where('numero_sesiones','=','0')
                ->where('rendido','0')
                ->whereDay('fecha_atencion', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->where('id_asistente', $asistente->id)
                ->with(['TipoBono' => function($query){
                    $query->select('id', 'nombre');
                }])
                ->with(['Convenio' => function($query){
                    $query->select('id', 'nombre');
                }])
                ->with(['Paciente' => function($query){
                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut');
                }])
                ->with(['Profesional' => function($query){
                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut');
                }])
                ->get();

            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1)
                    $total_bonos++;
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else
                    $total_otros++;

            }

            return array(
                'estado' => 1,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
            );
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    public function rendicionDetalle(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro_rendicion = RendicionCaja::find($request->id_rendicion);
            $info_bonos = array();
            if($registro_rendicion)
            {
                $bonos = $registro_rendicion->bonos;
                if(!empty($bonos))
                {
                    $bonos_array = explode('|',$bonos);
                    foreach ($bonos_array as $key => $value)
                    {
                        $registro_bono = Bono::with('TipoBono')
                                                ->with(['Convenio' => function($query){
                                                    $query->select('id', 'nombre');
                                                }])
                                                ->with(['Paciente' => function($query){
                                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut', 'telefono_uno', 'email');
                                                }])
                                                ->with(['Parametro' => function($query){
                                                    $query->select('id', 'valor', 'color');
                                                }])
                                                ->with(['Profesional' => function($query){
                                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut', 'telefono_uno', 'email', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                            ->with(['Especialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }])
                                                            ->with(['TipoEspecialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }])
                                                            ->with(['SubTipoEspecialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }]);
                                                }])
                                                ->find($value);
                        if($registro_bono)
                        {
                            // $info_bonos[$key]['estado'] = 0;
                            // $info_bonos[$key]['msj'] = 'registro';
                            // $info_bonos[$key]['registro'] = $registro_bono;
                            $info_bonos[$key] = $registro_bono;
                        }
                        else
                        {
                            $info_bonos[$key]['estado'] = 0;
                            $info_bonos[$key]['msj'] = 'sin registro';
                            $info_bonos[$key]['registro'] = '';
                        }
                    }
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros';
                    $datos['registros'] = $info_bonos;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Rendicion sin bonos registrados';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rendicion no encontrada';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function rendicionDetalleArchivos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro_rendicion = RendicionCaja::find($request->id_rendicion);

            if($registro_rendicion)
            {
                $archivos = $registro_rendicion->archivos;
                if(!empty($archivos))
                {
                    $datos['estado'] = 1;
                    $archivos_array = explode('|', $archivos);
                    foreach ($archivos_array as $key => $value)
                    {
                        $url_temp = Storage::disk('archivo_archivo')->url($value);
                        $datos['registro'][] = (object)array(
                            'nombre' => $value,
                            'url' => $url_temp,
                        );
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Sin archivos a visualizar';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rendicion no encontrada';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function historicoCajaDiaria(Request $request)
    {

    }

    /** Asistente Jefe | Asistente Administrativa */
    public function recibirCaja(Request $request)
    {

    }

    public function cargaRendicionesAsistenteDia(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);

            /** rendiciones  */
            $rendiciones = RendicionCaja::where('id_asistente_receptor', $asistente->id)
                                ->with(['Asistente' => function($query){
                                    $query->select('id','nombres','apellido_uno','apellido_dos', 'rut');
                                }])
                                ->with(['AsistenteReceptor' => function($query){
                                    $query->select('id','nombres','apellido_uno','apellido_dos', 'rut');
                                }])
                                ->where('rendicion','0')
                                ->where('estado',2)
                                ->get();

            $total_rendiciones = 0;
            $total_documentos_rendiciones = 0;
            $total_bonos_rendiciones = 0;
            $total_efectivo_rendicion = 0;
            $total_otros_rendicion = 0;
            $total_archivos_rendicion = 0;
            $lista_rendiciones = array();

            if($rendiciones)
            {
                foreach ($rendiciones as $rendicion){
                    $lista_rendiciones[] = $rendicion->id;

                    $total_rendiciones++;
                    $total_documentos_rendiciones += $rendicion->total_documentos;
                    $total_bonos_rendiciones += $rendicion->total_bono;
                    $total_efectivo_rendicion += $rendicion->total_efectivo;
                    $total_otros_rendicion += $rendicion->total_otros;

                    if(!empty($rendicion->archivos))
                    {
                        $archivos_array  = explode('|',$rendicion->archivos);
                        $total_archivos_rendicion += count($archivos_array);
                        $rendicion->cantidad_archivos = count($archivos_array);
                    }
                    else
                    {
                        $rendicion->cantidad_archivos = 0;
                    }
                }
            }


            return array(
                'estado' => 1,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
                'total_rendiciones' => $total_rendiciones,
                'total_documentos' => $total_documentos_rendiciones,
                'total_bonos' => $total_bonos_rendiciones,
                'total_efectivo' => $total_efectivo_rendicion,
                'total_otros' => $total_otros_rendicion,
                'rendiciones' => $rendiciones,
            );
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }


    public function cargaRendicionCmAdm(Request $request)
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        if($institucion)
        {
            $rendiciones_asistente = RendicionCaja::with('Asistente')->with('AsistenteReceptor')->where('tipo_rendicion', 1)->get();
            $rendiciones_realizadas = RendicionCaja::with('Asistente')->with('AsistenteReceptor')->where('tipo_rendicion', 2)->get();

            return view('app.adm_cm.flujo_caja')->with([
                'rendiciones_asistente' => $rendiciones_asistente,
                'rendiciones_realizadas' => $rendiciones_realizadas,
            ]);
        }
        else
        {
            return back()->with('error', 'no se encontro institucion asociada');
        }
    }



}
