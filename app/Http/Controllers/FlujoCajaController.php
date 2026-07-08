<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\Bono;
use Carbon\Carbon;
use App\Models\CajaOperativa;
use App\Models\ContratoDependiente;
use App\Models\Instituciones;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Parametro;
use App\Models\PermisoAsistente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalAsistente;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\RendicionCaja;
use App\Models\Caja;
use App\Models\Servicios;
use App\Models\Sucursal;
use App\Models\TipoBono;
use App\Models\HoraMedica;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\RendicionAprobadaMail;
use Illuminate\Support\Facades\Mail;

// PDF
use Barryvdh\DomPDF\Facade\Pdf;

class FlujoCajaController extends Controller
{
    // Devuelve el total rendido al profesional autenticado según mes y año
    public function totalRendidoMes(Request $request)
    {
        $mes = $request->input('mes');
        $anio = $request->input('anio');

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if (!$profesional) {
            return response()->json(['total_rendido' => '0'], 200);
        }

        $total_rendido = Bono::where('id_profesional', $profesional->id)
            ->where('rendido', 1)
            ->whereMonth('fecha_atencion', $mes)
            ->whereYear('fecha_atencion', $anio)
            ->sum('valor_atencion');

        return response()->json([
            'total_rendido' => number_format($total_rendido, 0, ',', '.')
        ]);
    }
    public function ver_flujo_caja()
    {
        // ...otras variables...

        // Desglose mensual del total recaudado en el año actual para el profesional autenticado
        $desglose_meses = [];
        if (isset($profesional) && isset($fecha)) {
            for ($i = 1; $i <= 12; $i++) {
                $desglose_meses[$i] = Bono::where('id_profesional', $profesional->id)
                    ->whereYear('fecha_atencion', $fecha->year)
                    ->whereMonth('fecha_atencion', $i)
                    ->sum('valor_atencion');
            }
        }

        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();
        $lista_lugares_atencion_activos = LugarAtencion::all();

        $filtro = array();
        $filtro_rendicion = array();
        // if(Auth::user()->hasRole('Admin'))
        // {
        //     $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        //     $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        //     $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();


        //     $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','=','0')
        //                 ->get();

        //     $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','>','0')
        //                 ->get();

        //     $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','=','0')
        //                 ->where('rendido','1')
        //                 ->get();

        //     $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','>','0')
        //                 ->where('rendido','1')
        //                 ->get();

        //     $rendiciones = RendicionCaja::where('id_asistente',$asistente->id)
        //                     ->where('rendicion','0')
        //                     ->get();


        //     $total = 0;
        //     $total_bonos = 0;
        //     $total_efectivo = 0;
        //     $total_otros = 0;
        //     $lista_bonos = array();

        //     foreach ($bonos as $bono){
        //         $lista_bonos[] = $bono->id;

        //         $total++;
        //         // 1->Bono Fisico
        //         if($bono->id_clase_bono == 1)
        //             $total_bonos++;
        //         // 2->Sencillito
        //         else if($bono->id_clase_bono == 2)
        //             $total_bonos++;
        //         // 3->Caja Vecina
        //         else if($bono->id_clase_bono == 3)
        //             $total_bonos++;
        //         // 4->Bono Web
        //         else if($bono->id_clase_bono == 4)
        //             $total_bonos++;
        //         // 5->Bono Web Pre-Pago
        //         else if($bono->id_clase_bono == 5)
        //             $total_bonos++;
        //         // 6->Particular
        //         else if($bono->id_clase_bono == 6)
        //             $total_efectivo += $bono->valor_atencion;
        //         else
        //             $total_otros++;

        //     }


        //     // return view('app.general.flujo_caja.flujo_caja')->with([
        //     return view('app.general.asistente.flujo_caja.home')->with([
        //         'bono' => $bonos,
        //         'bonos_programa' => $bonos_programa,
        //         'bonos_rendidos' => $bonos_rendidos,
        //         'bonos_rendidos_programa' => $bonos_rendidos_programa,
        //         'lista_asistente' => $lista_asistente,
        //         'lista_prevision' => $lista_prevision,
        //         'lista_estado_consulta' => $lista_estado_consulta,

        //         /** */
        //         'asistente' => $asistente,
        //         'lista_bonos' => implode('|',$lista_bonos),
        //         'bono' => $bonos,
        //         'listado_recibe' => $listado_recibe,
        //         'total' => $total,
        //         'total_bonos' => $total_bonos,
        //         'total_efectivo' => $total_efectivo,
        //         'total_otros' => $total_otros,

        //         'listado_recibe_prof' => $profesionales,

        //         'bonos_profesionales' => $bonos_profesionales,

        //         'prevision' => $prevision,

        //         'listado_recibe_prof' => $profesionales,
        //     ]);

        // }
        // else
        if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro_rendicion[] = array('id_profesional_receptor',$profesional->id);

            /** Buscar Asistentes de profesional y/o profesional */
            $profesional_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where('estado',1)->pluck('id_lugar_atencion')->toArray();
            $lista_lugares_atencion_activos = LugarAtencion::whereIn('id', $profesional_lugar_atencion)->get();
            $asistentes_lugar_atencion = AsistenteLugarAtencion::whereIn('id_lugar_atencion', $profesional_lugar_atencion)->where('estado', 1)->pluck('id_asistente')->toArray();
            $lista_asistente = Asistente::whereIn('id', $asistentes_lugar_atencion)->get();
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Institucion'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Servicio'))
        {
            $servicio = AdminInstServ::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Contador'))
        {
            // $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            // ->where('estado_consulta','<>',8)
            ->get();

        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();

        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta','<>',8)
            ->where('id_clase_bono','<>',6)
            ->get();

        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        $rendiciones = RendicionCaja::where($filtro_rendicion)
                    ->where('rendicion','0')
                    ->get();

        $fecha = Carbon::now();

        // Calcular total rendido al médico solo para el mes/año actual (igual que AJAX)
        $total_rendido_mes = 0;
        if (isset($profesional)) {
            $total_rendido_mes = Bono::where('id_profesional', $profesional->id)
                ->where('rendido', 1)
                ->whereMonth('fecha_atencion', $fecha->month)
                ->whereYear('fecha_atencion', $fecha->year)
                ->sum('valor_atencion');
        }

        $bonos_diarios = Bono::where($filtro)
        ->with('Asistente')
        ->where('numero_sesiones', 0)
        ->whereDate('fecha_atencion', $fecha)
        ->get();

        // agregar el rut del paciente a los bonos rendidos por el id_cliente
        foreach ($bonos_rendidos as $key => $value) {
                $paciente = Paciente::where('id',$value->id_paciente)->first();
                $value->rut_paciente = $paciente->rut;
                $profesional = Profesional::where('id',$value->id_profesional)->first();
                $value->rut_profesional = $profesional->rut;
        }


        $bonos_fonasa = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',6)
            ->where('convenio',1)
            ->get();

        foreach ($bonos_fonasa as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        $bonos_otros = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',6)
            ->where('convenio',3)
            ->get();

        foreach ($bonos_otros as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        $bonos_ = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->whereIn('estado_consulta',[4,6])
            ->where('id_clase_bono','<>',6)
            ->get();

        foreach ($bonos_ as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        $bonosAgrupadosPorConvenio = $bonos_->groupBy('convenio');

        $bonos_rendidos_generados = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',8)
            ->get();

        foreach ($bonos_rendidos_generados as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }


        $fecha = Carbon::now();

        // Cálculos para el resumen financiero
        $total_dia = Bono::where($filtro)
            ->whereDate('fecha_atencion', $fecha)
            ->sum('valor_atencion');

        $total_mes = Bono::where($filtro)
            ->whereMonth('fecha_atencion', $fecha->month)
            ->whereYear('fecha_atencion', $fecha->year)
            ->sum('valor_atencion');

        $total_anio = Bono::where($filtro)
            ->whereYear('fecha_atencion', $fecha->year)
            ->sum('valor_atencion');

        $cant_bonos = Bono::where($filtro)
            ->whereMonth('fecha_atencion', $fecha->month)
            ->whereYear('fecha_atencion', $fecha->year)
            ->count();

        $total_rendido = Bono::where($filtro)
            ->where('rendido', 1)
            ->sum('valor_atencion');

        $total_pendiente = Bono::where($filtro)
            ->where('rendido', 0)
            ->sum('valor_atencion');

        // return view('page.flujo_cajas.profesional.flujo_caja')->with([
        return view('app.profesional.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
            'lista_lugares_atencion_activos' => $lista_lugares_atencion_activos,
            'rendiciones' => $rendiciones,
            'bonos_fonasa' => $bonos_fonasa,
            'bonos_otros' => $bonos_otros,
            'bonos_agrupados_convenio' => $bonosAgrupadosPorConvenio,
            'bonos_rendidos_generados' => $bonos_rendidos_generados,
            'bonos_diarios' => $bonos_diarios,
            'institucion' => $institucion ?? null,
            'servicio' => $servicio ?? null,
            'total_dia' => $total_dia,
            'total_mes' => $total_mes,
            'total_anio' => $total_anio,
            'cant_bonos' => $cant_bonos,
            'total_rendido' => $total_rendido,
            'total_pendiente' => $total_pendiente,
            'total_rendido_mes' => $total_rendido_mes,
            'desglose_meses' => $desglose_meses,
            'profesional' => $profesional,
        ]);

    }

    public function flujoCajaAnio(Request $request)
    {
        $anio = $request->input('anio'); // Ejemplo: 2026

        // Filtrar por profesional autenticado igual que en ver_flujo_caja
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $filtro = [];
        if ($profesional) {
            $filtro[] = ['id_profesional', $profesional->id];
        } else {
            // Si no hay profesional, retorna 0 para evitar sumar toda la base
            return response()->json([
                'total_anio' => '0',
            ]);
        }

        $total_anio = Bono::where($filtro)
            ->whereYear('fecha_atencion', $anio)
            ->sum('valor_atencion') ?: 0;

        // Desglose mensual
        $desglose_meses = [];
        for ($i = 1; $i <= 12; $i++) {
            $desglose_meses[$i] = Bono::where($filtro)
                ->whereYear('fecha_atencion', $anio)
                ->whereMonth('fecha_atencion', $i)
                ->sum('valor_atencion');
        }

        return response()->json([
            'total_anio' => number_format($total_anio, 0, ',', '.'),
            'desglose_meses' => $desglose_meses,
        ]);
    }

    public function cargar_total_pendiente(Request $request)
    {
        $mes = $request->input('mes'); // número de mes (1-12)
        $anio = $request->input('anio'); // año (ej: 2026)

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if (!$profesional) {
            return response()->json(['total_pendiente' => '0'], 200);
        }

        $total_pendiente = Bono::where('id_profesional', $profesional->id)
            ->where('rendido', 0)
            ->whereMonth('fecha_atencion', $mes)
            ->whereYear('fecha_atencion', $anio)
            ->sum('valor_atencion');

        return response()->json([
            'total_pendiente' => number_format($total_pendiente, 0, ',', '.')
        ]);
    }

    public function flujoCajaMes(Request $request)
    {
        $mes = $request->input('mes'); // Ejemplo: 5 para mayo
        $anio = $request->input('anio'); // Ejemplo: 2026

        // Filtrar por profesional autenticado igual que en ver_flujo_caja
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $filtro = [];
        if ($profesional) {
            $filtro[] = ['id_profesional', $profesional->id];
        }

        $total_mes = Bono::where($filtro)
            ->whereMonth('fecha_atencion', $mes)
            ->whereYear('fecha_atencion', $anio)
            ->sum('valor_atencion');

        $cant_bonos = Bono::where($filtro)
            ->whereMonth('fecha_atencion', $mes)
            ->whereYear('fecha_atencion', $anio)
            ->count();

        return response()->json([
            'total_mes' => number_format($total_mes, 0, ',', '.'),
            'cant_bonos' => $cant_bonos,
        ]);
    }

    public function home(){
        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        if (!$asistente) {
            return redirect()->route('asistentecm.home')->with('error', 'Asistente no encontrado.');
        }

        // buscamos las rendiciones de los bonos para el asistente
        $rendiciones = RendicionCaja::where('id_asistente_receptor',$asistente->id)
                    ->where('rendicion','0')
                    ->whereDate('fecha_rendicion', Carbon::now())
                    ->get();

        // Paso 1: Obtener bonos desde las rendiciones
        $ids_bonos_rendidos = [];

        foreach ($rendiciones as $rendicion) {
            $ids = explode('|', $rendicion->bonos); // separar por "|"
            $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
        }

        // Limpiar IDs vacíos y convertirlos a enteros
        $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

        // Paso 2: Buscar bonos por ID en base de datos
        $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->where('tipo_empleado','like','%Asistente%')->first();

        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        $permiso_entrega_caja = PermisoAsistente::where('id_asistente', $asistente->id)
            ->whereIn('id_lugar_atencion', $id_lugar_atencion)
            ->where('permiso_entrega_caja', 1)
            ->exists();

        if (!$permiso_entrega_caja) {
            return redirect()->route('asistentecm.home')->with('error', 'No tienes permiso para entrega de caja en este lugar de atencion.');
        }


        if(!empty($id_lugar_atencion))
        {

             // Paso 3: Bonos del mes (no rendidos)
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->get();

            // Paso 4: Unir los dos conjuntos
            $bonos = $bonos_dia->merge($bonos_rendidos);

            // Paso 5 (opcional): Eliminar duplicados por ID
            $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

            foreach($bonos as $b){
                $responsable = Asistente::where('id',$b->id_asistente)->first();
                $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
            }

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
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
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }


            if($es_institucion)
            {

                $institucion = Instituciones::whereIn('id_lugar_atencion',$id_lugar_atencion)->first();

                $lista_asistente_lugar = AsistenteLugarAtencion::whereIn('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

                /** PERSONAL QUE RECIBE */
                /** ASISTENTE */
                $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [1,2,3])
                                                ->whereIn('id', $lista_asistente_lugar)
                                                ->whereNotIn('id',[$asistente->id]);

                /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
                $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                    ->where('id_institucion', $institucion->id)
                                    ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->whereNotIn('id_empleado',[$asistente->id])
                                    ->union($listado_recibe_a)
                                    ->get();

                $institucion = Instituciones::whereIn('id_lugar_atencion',$id_lugar_atencion)->first();
                $lista_asistente_lugar = AsistenteLugarAtencion::whereIn('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_lugar_atencion')->toArray();

                /** PERSONAL QUE RECIBE */
                /** profesional */
                $lista_profesionales = ProfesionalesLugaresAtencion::whereIn('id_lugar_atencion', $lista_asistente_lugar)->pluck('id_profesional')->toArray();

                $profesionales = Profesional::whereIn('id', $lista_profesionales)->orderBy('apellido_uno', 'ASC')->get();
            }
            else
            {
                $listado_recibe = '';
                $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                if($asistentes_lugar_atencion)
                {
                    $profesionales = $listado_recibe = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos')->whereIn('id', $asistentes_lugar_atencion)->get();
                }
            }


            $bonos_profesionales = Bono::where($filtro)
                                    ->whereDay('fecha_atencion','<=', date('d'))
                                    ->whereMonth('fecha_atencion',  date('m'))
                                    ->whereYear('fecha_atencion', date('Y'))
                                    ->get();

             $cajas = Caja::select('cajas.*','lugares_atencion.nombre as nombre_lugar_atencion')
                            ->where('estado', 'abierta')
                            ->join('lugares_atencion', 'cajas.id_lugar_atencion', '=', 'lugares_atencion.id')
                            ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                            ->get();

            $cajas_operativas = CajaOperativa::where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                                ->where('estado','abierta')
                                                ->with('caja')
                                                ->with('responsable')
                                                ->get();

            // Todos los bonos vendidos por la asistente en el día (adicional)
            $bonos_vendidos_dia = Bono::where('id_asistente', $asistente->id)
                                    ->where('numero_sesiones', '=', '0')
                                    ->whereDate('fecha_atencion', Carbon::now())
                                    ->get();

            // Bonos con id_clase_bono = 8 vendidos por la asistente logueada (pendientes y pagados)
            $bonos_clase_8_todos = Bono::where('id_asistente', $asistente->id)
                                ->where('id_clase_bono', 8)
                                ->where('numero_sesiones', '=', '0')
                                ->whereDate('fecha_atencion', Carbon::now())
                                ->with(['paciente', 'profesional', 'convenio', 'tipoBono'])
                                ->get();

            // Separar en pendientes y pagados
            $bonos_clase_8 = $bonos_clase_8_todos->where('pagado_garantia', false);
            $bonos_clase_8_pagados = $bonos_clase_8_todos->where('pagado_garantia', true);

            // Enriquecer bonos_clase_8 (pendientes) con información de profesional_convenio
            foreach ($bonos_clase_8 as $bono) {
                $profesional_convenio = ProfesionalConvenio::where('id_profesional', $bono->id_profesional)
                                                            ->where('id_lugar_atencion', $bono->id_lugar_atencion)
                                                            ->first();

                if ($profesional_convenio) {
                    $bono->valor_garantia = $profesional_convenio->valor_garantia ?? 0;
                    $bono->tpo_espera = $profesional_convenio->tpo_espera ?? 0;

                    // Calcular fecha de vencimiento basándose en el tiempo de espera
                    if ($bono->tpo_espera > 0) {
                        $bono->fecha_vencimiento = Carbon::parse($bono->fecha_atencion)->addDays($bono->tpo_espera);
                    } else {
                        $bono->fecha_vencimiento = null;
                    }
                } else {
                    $bono->valor_garantia = 0;
                    $bono->tpo_espera = 0;
                    $bono->fecha_vencimiento = null;
                }
            }

            // Enriquecer bonos_clase_8_pagados con información de profesional_convenio
            foreach ($bonos_clase_8_pagados as $bono) {
                $profesional_convenio = ProfesionalConvenio::where('id_profesional', $bono->id_profesional)
                                                            ->where('id_lugar_atencion', $bono->id_lugar_atencion)
                                                            ->first();

                if ($profesional_convenio) {
                    $bono->valor_garantia = $profesional_convenio->valor_garantia ?? 0;
                    $bono->tpo_espera = $profesional_convenio->tpo_espera ?? 0;

                    // Calcular fecha de vencimiento basándose en el tiempo de espera
                    if ($bono->tpo_espera > 0) {
                        $bono->fecha_vencimiento = Carbon::parse($bono->fecha_atencion)->addDays($bono->tpo_espera);
                    } else {
                        $bono->fecha_vencimiento = null;
                    }
                } else {
                    $bono->valor_garantia = 0;
                    $bono->tpo_espera = 0;
                    $bono->fecha_vencimiento = null;
                }
            }

            // Obtener todas las asistentes del lugar de atención usando AsistenteLugarAtencion
            $ids_asistentes_lugar = AsistenteLugarAtencion::where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->where('id_institucion', $institucion->id)
                                        ->pluck('id_asistente')
                                        ->toArray();

            $lista_asistentes = Asistente::whereIn('id', $ids_asistentes_lugar)->get();

            // Obtener histórico de cajas operativas (cajas cerradas, entregadas y pendientes de entrega)
            $cajas_operativas_historico = CajaOperativa::where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                                        ->whereIn('estado', ['cerrada', 'entregada', 'pendiente_entrega'])
                                                        ->with(['caja.lugarAtencion', 'responsable', 'entregador'])
                                                        ->orderBy('fecha_apertura', 'desc')
                                                        ->get();

            // Obtener cajas pendientes de entrega para el usuario actual
            // Una caja está pendiente cuando tiene estado 'pendiente_entrega' y el id_usuario coincide con el asistente logueado
            $caja_pendiente_entrega = CajaOperativa::where('id_usuario', $asistente->id)
                                                    ->where('estado', 'pendiente_entrega')
                                                    ->with(['caja.lugarAtencion', 'entregador'])
                                                    ->first();

            return view('app.general.asistente.flujo_caja.home')->with([
                'es_institucion' => $es_institucion,
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'bonos_profesionales' => $bonos_profesionales,
                'bonos_vendidos_dia' => $bonos_vendidos_dia,
                'bonos_clase_8' => $bonos_clase_8,
                'bonos_clase_8_pagados' => $bonos_clase_8_pagados,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                'prevision' => $prevision,
                'listado_recibe_prof' => $profesionales,
                'cajas' => $cajas,
                'cajas_operativas' => $cajas_operativas,
                'cajas_operativas_historico' => $cajas_operativas_historico,
                'lista_asistentes' => $lista_asistentes,
                'caja_pendiente_entrega' => $caja_pendiente_entrega,
            ]);
        }
        else
        {
            return back()->with('mensaje','Lugar de Atención no valido');
        }

    }

    public function pdfBonosDia(){
        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        // buscamos las rendiciones de los bonos para el asistente
        $rendiciones = RendicionCaja::where('id_profesional',$profesional->id)
        ->where('rendicion','0')
        ->whereDate('fecha_rendicion', Carbon::now())
        ->get();

        // Paso 1: Obtener bonos desde las rendiciones
        $ids_bonos_rendidos = [];
        if($rendiciones->isEmpty()) {
            return response()->json(['error' => 'No hay bonos rendidos para generar el PDF.'], 404);
        }
        foreach ($rendiciones as $rendicion) {
            $ids = explode('|', $rendicion->bonos); // separar por "|"
            $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
        }

        // Limpiar IDs vacíos y convertirlos a enteros
        $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

        // Paso 2: Buscar bonos por ID en base de datos
        $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$profesional->id)->first();
        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $profesionales_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->pluck('id_lugar_atencion')->toArray();
            if($profesionales_lugar_atencion)
            {
                $id_lugar_atencion = $profesionales_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        if(!empty($id_lugar_atencion))
        {
            $filtro = array();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro[] = array('numero_sesiones','=','0');
            // $filtro[] = array('rendido','0');
            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */

            $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->get();


            // Paso 4: Unir los dos conjuntos
            $bonos = $bonos_dia->merge($bonos_rendidos);

            // Paso 5 (opcional): Eliminar duplicados por ID
            $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

            foreach($bonos as $b){
                $responsable = Profesional::where('id',$b->id_profesional)->first();
                $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
            }

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
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
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion[0]);

            // generamos el pdf
            $pdf = Pdf::loadView('app.general.asistente.flujo_caja.PDF.pdf_bonos_dia', [
                'bonos' => $bonos,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                'prevision' => $prevision,
                'asistente' => $profesional,
                'lugar_atencion' => $lugar_atencion,
                'fecha_rendicion' => Carbon::now()->format('d-m-Y'),
            ]);
            // Guardar el PDF en la carpeta public
            $fileName = 'rendicion_caja_' . $profesional->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        }
    }

    public function pdfBonosDiaProf($id){
        $profesional_agenda = Profesional::where('id',$id)->first();
        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();
        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        if(!empty($id_lugar_atencion))
        {
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('id_profesional',$profesional_agenda->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');
            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */

            $bonos = Bono::where($filtro)
             ->whereDate('fecha_atencion', Carbon::now())
             ->get();

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
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
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion[0]);

            // generamos el pdf
            $pdf = Pdf::loadView('app.general.asistente.flujo_caja.PDF.pdf_bonos_dia', [
                'bonos' => $bonos,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                'prevision' => $prevision,
                'asistente' => $asistente,
                'lugar_atencion' => $lugar_atencion,
                'profesional_agenda' => $profesional_agenda,
                'fecha_rendicion' => Carbon::now()->format('d-m-Y'),
            ]);
            // Guardar el PDF en la carpeta public
            $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        }
    }

    public function dataFlujoCaja(Request $request)
    {
        $datos = array();

        $registro = '';
        $search_fecha = '';
        // $search_lugares = '';
        $search_asistente = '';
        $search_convenio = '';
        $search_estado_consulta = '';
        if(!empty($request->fecha))
            $search_fecha = $request->fecha;
        // if(!empty($request->lugares))
        //     $search_lugares = $request->lugares;
        if(!empty($request->asistente))
            $search_asistente = $request->asistente;
        if(!empty($request->convenio))
            $search_convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $search_estado_consulta = $request->estado_consulta;

        $filtro_user = array();
        // if(Auth::user()->hasRole('Admin'))
        // {
        //     $filtro = array();
        //     if(!empty($search_fecha))
        //         $filtro[] = array('fecha_atencion','like', $search_fecha.'%');
        //     if(!empty($search_asistente))
        //         $filtro[] = array('id_asistente',$search_asistente);
        //     if(!empty($search_convenio))
        //         $filtro[] = array('convenio',$search_convenio);
        //     if(!empty($search_estado_consulta))
        //         $filtro[] = array('estado_consulta',$search_estado_consulta);

        //     $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        //     $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        //     $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        //     // $registro = Bono::where(function($query) use($profesional, $paciente, $asistente) {
        //     //             $query->where('id_profesional',$profesional->id)
        //     //                 ->orWhere('id_paciente',$paciente->id)
        //     //                 ->orWhere('id_asistente',$asistente->id);
        //     //             })
        //     //             ->where('numero_sesiones','=','0')
        //     //             ->where('rendido','0')
        //     //             ->where($filtro)
        //     //             ->with(['TipoBono' => function($query){
        //     //                 $query->select('id','nombre');
        //     //             }])
        //     //             ->with(['Convenio' => function($query){
        //     //                 $query->select('id','nombre');
        //     //             }])
        //     //             ->with(['Paciente' => function($query){
        //     //                 $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
        //     //             }])
        //     //             ->with(['Parametro' => function($query){
        //     //                 $query->select('id','valor');
        //     //             }])
        //     //             ->with(['Profesional' => function($query){
        //     //                 $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
        //     //             }])
        //     //             ->get();
        //         $registro = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','=','0')
        //                 ->where('rendido','0')
        //                 ->where($filtro)
        //                 ->with(['TipoBono' => function($query){
        //                     $query->select('id','nombre');
        //                 }])
        //                 ->with(['Convenio' => function($query){
        //                     $query->select('id','nombre');
        //                 }])
        //                 ->with(['Paciente' => function($query){
        //                     $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
        //                 }])
        //                 ->with(['Parametro' => function($query){
        //                     $query->select('id','valor');
        //                 }])
        //                 ->with(['Profesional' => function($query){
        //                     $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
        //                 }])
        //                 ->get();

        // }
        // else
        if(Auth::user()->hasRole('Paciente'))
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
            // if(!empty($search_lugares))
            //     $filtro[] = array('fecha_atencion', $search_lugares);
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
                // ->with(['Asistente' => function($query){
                //     $query->select('id','nombres', 'apellido_uno', 'apellido_dos');
                // }])
                ->get();
        }


        if($registro){

            foreach ($registro as $key => $value) {
                $asistente = array( 'id' => '',
                                    'nombres' => '',
                                    'apellido_uno' => '',
                                    'apellido_dos' => ''
                                );
                if(!empty($value->id_asistente))
                {
                    $asistente_temp = Asistente::select('id','nombres', 'apellido_uno', 'apellido_dos')->find($value->id_asistente);
                    if($asistente_temp)
                        $asistente = $asistente_temp;
                }
                $registro[$key]->asistente = $asistente;
            }

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
            $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
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
            $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();

            $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();

            $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();

            $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
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

            $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
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
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');


            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */
            $bonos = Bono::where($filtro)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->get();

            // echo json_encode($bonos);
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

            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

            /** PERSONAL QUE RECIBE */
            /** ASISTENTE */
            $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id]);
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$asistente->id])
                                ->union($listado_recibe_a)
                                ->get();



            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_lugar_atencion')->toArray();

            /** PERSONAL QUE RECIBE */
            /** profesional */
            $lista_profesionales = ProfesionalesLugaresAtencion::whereIn('id_lugar_atencion', $lista_asistente_lugar)->pluck('id_profesional')->toArray();

            $profesionales = Profesional::whereIn('id', $lista_profesionales)->orderBy('apellido_uno', 'ASC')->get();

            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            $bonos_profesionales = Bono::where($filtro)
                                    ->whereDay('fecha_atencion','<=', date('d'))
                                    ->whereMonth('fecha_atencion',  date('m'))
                                    ->whereYear('fecha_atencion', date('Y'))
                                    ->get();

            $prevision = Prevision::all();

            return view('app.asistente_cm_publico.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,

                'listado_recibe_prof' => $profesionales,

                'bonos_profesionales' => $bonos_profesionales,

                'prevision' => $prevision,

            ]);
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    public function rendirCajaDiariaFecha(Request $request){
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');
            if(!empty($request->fecha))
                $filtro[] = array('fecha_atencion','like', $request->fecha.'%');
            // echo json_encode($filtro);
            /** rendicion a cm */
            /** bono  */
            $bonos = Bono::where($filtro)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->get();
            // echo json_encode($bonos);
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
            return response()->json([
                'estado' => 1,
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
            ]);
        }
        else
        {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Contrato no encontrado',
            ]);
        }
    }

    /** Asistentes CM Manejo de Agenda*/
    public function rendirCajaDiariaMa(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');


            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */
            $bonos = Bono::where($filtro)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->get();

            // echo json_encode($bonos);
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

            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

            /** PERSONAL QUE RECIBE */
            /** ASISTENTE */
            $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id]);
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$asistente->id])
                                ->union($listado_recibe_a)
                                ->get();



            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_lugar_atencion')->toArray();

            /** PERSONAL QUE RECIBE */
            /** profesional */
            $lista_profesionales = ProfesionalesLugaresAtencion::whereIn('id_lugar_atencion', $lista_asistente_lugar)->pluck('id_profesional')->toArray();

            $profesionales = Profesional::whereIn('id', $lista_profesionales)->orderBy('apellido_uno', 'ASC')->get();

            return view('app.asistente_cm_manejo_agenda.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,

                'listado_recibe_prof' => $profesionales,

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
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            /** bono  */
            $bonos = Bono::where($filtro)
                // ->where('numero_sesiones','=','0')
                // ->where('rendido','0')
                // ->where('id_asistente', $asistente->id)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
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

            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

            /** PERSONAL QUE RECIBE */
            /** ASISTENTE */
            $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id]);
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$asistente->id])
                                ->union($listado_recibe_a)
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
        try {
            $id_lugar_atencion = array();
            $es_institucion = 0;

            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            if(!$asistente){
                $asistente = Profesional::where('id_usuario',Auth::user()->id)->first();
            }
            $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

            // buscamos las rendiciones de los bonos para el asistente
            $rendiciones = RendicionCaja::where('id_asistente_receptor',$asistente->id)
            ->where('rendicion','0')
            ->whereDate('fecha_rendicion', Carbon::now())
            ->where('id_profesional_receptor',$request->id_profesional)
            ->get();

            // Paso 1: Obtener bonos desde las rendiciones
            $ids_bonos_rendidos = [];

            foreach ($rendiciones as $rendicion) {
                $ids = explode('|', $rendicion->bonos); // separar por "|"
                $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
            }

            // Limpiar IDs vacíos y convertirlos a enteros
            $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

            // Paso 2: Buscar bonos por ID en base de datos
            $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

            if($contrato)
            {
                $id_lugar_atencion = array($contrato->id_lugar_atencion);
                $es_institucion = 1;
            }
            else
            {
                $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
                if($asistentes_lugar_atencion)
                {
                    $id_lugar_atencion = $asistentes_lugar_atencion;
                }
                else
                {
                    /** no manejar por que se debe evaluar con jaime */
                    // $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                    $id_lugar_atencion = array();
                }
            }



            if(!empty($id_lugar_atencion))
            // if($contrato)
            {
                $filtro = array();
                $filtro[] = array('id_asistente',$asistente->id);
                $filtro[] = array('numero_sesiones','=','0');
                $filtro[] = array('rendido','0');


                if(!empty($request->id_profesional))
                    $filtro[] = array('id_profesional',$request->id_profesional);

                /** rendicion a cm */
                /** bono  */
                // $bonos_dia = Bono::where($filtro)
                //     ->whereDate('fecha_atencion', Carbon::today())
                //     ->with(['TipoBono' => function($query){
                //         $query->select('id', 'nombre');
                //     }])
                //     ->with(['Convenio' => function($query){
                //         $query->select('id', 'nombre');
                //     }])
                //     ->with(['Paciente' => function($query){
                //         $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut');
                //     }])
                //     ->with(['Profesional' => function($query){
                //         $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut');
                //     }])
                //     ->get();
                $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->get();
                // Paso 4: Unir los dos conjuntos
                $bonos = $bonos_dia->merge($bonos_rendidos);

                // Paso 5 (opcional): Eliminar duplicados por ID
                $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

                foreach($bonos as $b){
                    $responsable = Asistente::where('id',$b->id_asistente)->first();
                    $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
                    $b->convenio = Prevision::where('id',$b->id_clase_bono)->first();
                    $b->tipo_bono = TipoBono::where('id',$b->id_tipo_bono)->first();
                    $b->paciente = Paciente::where('id',$b->id_paciente)->first();
                    $b->profesional = Profesional::where('id',$b->id_profesional)->first();
                }


                // var_dump($bonos);
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
                // return back()->with('mensaje','Contrato no encontrado');
                return array(
                    'estado' => 0,
                    'msj' => 'sin contrato',

                );
            }
        } catch (Exception $th) {
            return $th->getMessage();
        }

    }

    public function cargaBonosAsistenteFecha(Request $request)
    {
        try {
            $id_lugar_atencion = array();
            $es_institucion = 0;

            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

            // buscamos las rendiciones de los bonos para el asistente
            $rendiciones = RendicionCaja::where('id_profesional_receptor',$asistente->id)
            ->where('rendicion','0')
            ->whereDate('fecha_rendicion', $request->fecha)
            ->where('id_profesional_receptor',$request->id_profesional)
            ->get();

            // Paso 1: Obtener bonos desde las rendiciones
            $ids_bonos_rendidos = [];

            foreach ($rendiciones as $rendicion) {
                $ids = explode('|', $rendicion->bonos); // separar por "|"
                $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
            }

            // Limpiar IDs vacíos y convertirlos a enteros
            $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

            // Paso 2: Buscar bonos por ID en base de datos
            $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

            if($contrato)
            {
                $id_lugar_atencion = array($contrato->id_lugar_atencion);
                $es_institucion = 1;
            }
            else
            {
                $profesionales_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $asistente->id)->pluck('id_lugar_atencion')->toArray();
                if($profesionales_lugar_atencion)
                {
                    $id_lugar_atencion = $profesionales_lugar_atencion;
                }
                else
                {
                    /** no manejar por que se debe evaluar con jaime */
                    // $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                    $id_lugar_atencion = array();
                }
            }



            if(!empty($id_lugar_atencion))
            // if($contrato)
            {
                $filtro = array();
                $filtro[] = array('id_profesional',$asistente->id);
                $filtro[] = array('numero_sesiones','=','0');
                $filtro[] = array('rendido','0');


                if(!empty($request->id_profesional))
                    $filtro[] = array('id_profesional',$request->id_profesional);

                /** rendicion a cm */
                /** bono  */
                // $bonos_dia = Bono::where($filtro)
                //     ->whereDate('fecha_atencion', Carbon::today())
                //     ->with(['TipoBono' => function($query){
                //         $query->select('id', 'nombre');
                //     }])
                //     ->with(['Convenio' => function($query){
                //         $query->select('id', 'nombre');
                //     }])
                //     ->with(['Paciente' => function($query){
                //         $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut');
                //     }])
                //     ->with(['Profesional' => function($query){
                //         $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut');
                //     }])
                //     ->get();
                $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', $request->fecha)
                            ->get();
                // Paso 4: Unir los dos conjuntos
                $bonos = $bonos_dia->merge($bonos_rendidos);

                // Paso 5 (opcional): Eliminar duplicados por ID
                $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

                foreach($bonos as $b){
                    $responsable = Profesional::where('id',$b->id_profesional)->first();
                    $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
                    $b->convenio = Prevision::where('id',$b->id_clase_bono)->first();
                    $b->tipo_bono = TipoBono::where('id',$b->id_tipo_bono)->first();
                    $b->paciente = Paciente::where('id',$b->id_paciente)->first();
                    $b->profesional = Profesional::where('id',$b->id_profesional)->first();
                }


                // var_dump($bonos);
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
                    if($bono->id_clase_bono == 1){
                        $total_bonos++;
                        $bono->tipo = 'Bono Físico';
                    }
                    // 2->Sencillito
                    else if($bono->id_clase_bono == 2){
                        $total_bonos++;
                        $bono->tipo = 'Sencillito';
                    }
                    // 3->Caja Vecina
                    else if($bono->id_clase_bono == 3){
                        $total_bonos++;
                        $bono->tipo = 'Caja Vecina';
                    }
                    // 4->Bono Web
                    else if($bono->id_clase_bono == 4){
                        $total_bonos++;
                        $bono->tipo = 'Bono Web';
                    }
                    // 5->Bono Web Pre-Pago
                    else if($bono->id_clase_bono == 5){
                        $total_bonos++;
                        $bono->tipo = 'Bono Web Pre-Pago';
                    }
                    // 6->Particular
                    else if($bono->id_clase_bono == 6){
                        $bono->tipo = 'Particular';
                        $total_efectivo += $bono->valor_atencion;
                    }
                    else{
                        $bono->tipo = 'Otro';
                        $total_otros++;
                    }


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
                // return back()->with('mensaje','Contrato no encontrado');
                return array(
                    'estado' => 0,
                    'msj' => 'sin contrato',

                );
            }
        } catch (Exception $th) {
            return $th->getMessage();
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

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
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
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
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
             /** RENDICION */
             $rendiciones = RendicionCaja::where('id_asistente_receptor', $responsable->id)
                                    ->where('rendicion','0')
                                    ->where('estado',2)
                                    ->get();

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

            /** PERSONAL QUE RECIBE */
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$responsable->id])
                                ->get();
            // var_dump($listado_recibe);

        $fecha = Carbon::now();

        $filtro = array();


        // Cálculos para el resumen financiero
        $total_dia = Bono::where($filtro)
            ->whereDate('fecha_atencion', $fecha)
            ->sum('valor_atencion');

        $total_mes = Bono::where($filtro)
            ->whereMonth('fecha_atencion', $fecha->month)
            ->whereYear('fecha_atencion', $fecha->year)
            ->sum('valor_atencion');

        $total_anio = Bono::where($filtro)
            ->whereYear('fecha_atencion', $fecha->year)
            ->sum('valor_atencion');

        $cant_bonos = Bono::where($filtro)
            ->whereMonth('fecha_atencion', $fecha->month)
            ->whereYear('fecha_atencion', $fecha->year)
            ->count();

        $total_rendido = Bono::where($filtro)
            ->where('rendido', 1)
            ->sum('valor_atencion');

        $total_pendiente = Bono::where($filtro)
            ->where('rendido', 0)
            ->sum('valor_atencion');

        $responsables = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','lugares_atencion.nombre','lugares_atencion.id as id_lugar_atencion','profesionales.nombre as nombre_profesional','profesionales.apellido_uno as apellido_uno_profesional','profesionales.apellido_dos as apellido_dos_profesional')
                                    ->join('lugares_atencion','profesionales_lugares_atencion.id_lugar_atencion','=','lugares_atencion.id')
                                    ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
                                    ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
                                    ->get();

        $cajas = Caja::select('cajas.*','lugares_atencion.nombre as nombre_lugar_atencion')
        ->where('estado', 'abierta')
        ->join('lugares_atencion', 'cajas.id_lugar_atencion', '=', 'lugares_atencion.id')
        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
        ->get();

        $cajas_cerradas = Caja::select('cajas.*','lugares_atencion.nombre as nombre_lugar_atencion')
        ->where('estado', 'cerrada')
        ->join('lugares_atencion', 'cajas.id_lugar_atencion', '=', 'lugares_atencion.id')
        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
        ->get();

        $lugares_atencion_profesional = ProfesionalesLugaresAtencion::where('id_profesional', $responsable->id)->pluck('id_lugar_atencion')->toArray();

        $sucursales = Sucursal::whereIn('id_lugar_atencion', [$institucion->id_lugar_atencion])->get();
        $institucionSucursal = Instituciones::find($institucion->id); // Instancia real del modelo Instituciones
        $sucursales->prepend($institucionSucursal);

            return view('app.adm_cm.flujo_caja')->with([
                /** informacion de rendiciones */
                'listado_recibe' => $listado_recibe,
                'rendiciones' => $rendiciones,
                'total_rendiciones' => $total_rendiciones,
                'total_documentos_rendiciones' => $total_documentos_rendiciones,
                'total_bonos_rendiciones' => $total_bonos_rendiciones,
                'total_efectivo_rendicion' => $total_efectivo_rendicion,
                'total_copago_rendicion' => $total_copago_rendicion,
                'total_otros_rendicion' => $total_otros_rendicion,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
                'institucion' => $institucion,
                'tipo_institucion' => $tipo_institucion,
                /** informacion financiera */
                'total_dia' => $total_dia,
                'total_mes' => $total_mes,
                'total_anio' => $total_anio,
                'cant_bonos' => $cant_bonos,
                'total_rendido' => $total_rendido,
                'total_pendiente' => $total_pendiente,
                'responsables' => $responsables,
                'cajas' => $cajas,
                'cajas_cerradas' => $cajas_cerradas,
                'sucursales' => $sucursales,
            ]);
        }
        else
        {
            return back()->with('error', 'no se encontro institucion asociada');
        }
    }

    public function dameCaja(Request $req){

        $caja = Caja::find($req->id);
        if($caja){
            return response()->json([
                'estado' => 1,
                'caja' => $caja
            ]);
        }
        else{
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Caja no encontrada'
            ]);
        }
    }

    public function actualizarCaja(Request $request)
    {

        $request->validate([
            'nombre_caja' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'id_lugar_atencion' => 'required|exists:lugares_atencion,id',
        ]);

        $caja = Caja::findOrFail($request->id);

        $caja->update([
            'nombre_caja' => $request->nombre_caja,
            'id_usuario' => $request->responsable_caja,
            'ubicacion' => $request->ubicacion,
            'id_lugar_atencion' => $request->id_lugar_atencion,
        ]);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Caja actualizada correctamente',
            'caja' => $caja
        ]);
    }

    public function eliminarCaja(Request $request)
    {
        $caja = Caja::findOrFail($request->id);

        if ($caja->estado === 'abierta') {
            return response()->json(['estado' => 0, 'mensaje' => 'No se puede eliminar una caja abierta.']);
        }

        $caja->delete();

        return response()->json(['estado' => 1, 'mensaje' => 'Caja eliminada correctamente']);
    }

    public function abrirCaja(Request $request)
    {
        $request->validate([
            'nombre_caja' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'id_lugar_atencion' => 'required|exists:lugares_atencion,id',
        ]);

        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

        $caja = Caja::create([
            'nombre_caja' => $request->nombre_caja,
            'id_usuario' => $asistente->id,
            'ubicacion' => $request->ubicacion,
            'id_lugar_atencion' => $request->id_lugar_atencion,
            'estado' => 'abierta'
        ]);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Caja abierta correctamente',
            'caja' => $caja
        ]);
    }

    public function abrirCajaOperativa(Request $request){
        try {
            // Obtener el asistente actual
            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

            if (!$asistente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Asistente no encontrado.'
                ], 404);
            }

            // Validación 1: Verificar si el usuario ya tiene una caja abierta
            $cajaAbiertaUsuario = CajaOperativa::where('id_usuario', $asistente->id)
                                                ->whereIn('estado', ['abierta', 'pendiente_entrega'])
                                                ->with('caja')
                                                ->first();

            if ($cajaAbiertaUsuario) {
                $nombreCajaAbierta = $cajaAbiertaUsuario->caja ? $cajaAbiertaUsuario->caja->nombre_caja : 'una caja';
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Ya tienes ' . $nombreCajaAbierta . ' abierta. Debes cerrarla o entregarla antes de abrir otra caja.'
                ], 400);
            }

            // Validación 2: Verificar si la caja seleccionada ya está abierta por otro usuario
            $cajaOcupada = CajaOperativa::where('id_caja', $request->id_caja)
                                        ->whereIn('estado', ['abierta', 'pendiente_entrega'])
                                        ->with(['responsable', 'caja'])
                                        ->first();

            if ($cajaOcupada) {
                $nombreResponsable = $cajaOcupada->responsable ?
                    $cajaOcupada->responsable->nombres . ' ' . $cajaOcupada->responsable->apellido_uno :
                    'otro usuario';

                $nombreCaja = $cajaOcupada->caja ? $cajaOcupada->caja->nombre_caja : 'La caja';

                return response()->json([
                    'estado' => 0,
                    'mensaje' => $nombreCaja . ' ya está abierta por ' . $nombreResponsable . '. No puedes abrir una caja que ya está en uso.'
                ], 400);
            }

            // Si todas las validaciones pasan, crear la nueva caja operativa
            $cajas_operativas = new CajaOperativa();
            $cajas_operativas->id_caja = $request->id_caja;
            $cajas_operativas->id_usuario = $asistente->id;
            $cajas_operativas->id_lugar_atencion = $request->id_lugar_atencion;
            $cajas_operativas->estado = 'abierta';
            $cajas_operativas->monto_inicial = $request->abono_inicial_caja;
            $cajas_operativas->monto_final = $request->saldo_final_caja_anterior;
            $cajas_operativas->fecha_apertura = now();

            $cajas_operativas->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Caja operativa abierta correctamente',
                'caja_operativa' => $cajas_operativas
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al abrir la caja: ' . $e->getMessage()
            ], 500);
        }
    }

    public function obtenerUltimaCajaOperativa($id_caja)
    {
        try {
            // Obtener la última caja operativa cerrada de esta caja
            $ultimaCaja = CajaOperativa::where('id_caja', $id_caja)
                                       ->whereIn('estado', ['cerrada', 'entregada'])
                                       ->orderBy('fecha_cierre', 'desc')
                                       ->first();

            if ($ultimaCaja) {
                return response()->json([
                    'estado' => 1,
                    'tiene_historial' => true,
                    'saldo_cierre' => $ultimaCaja->saldo_cierre ?? 0,
                    'monto_final' => $ultimaCaja->monto_final ?? 0,
                    'fecha_cierre' => $ultimaCaja->fecha_cierre,
                    'responsable' => $ultimaCaja->responsable ?
                        $ultimaCaja->responsable->nombres . ' ' .
                        $ultimaCaja->responsable->apellido_uno : 'N/A'
                ]);
            } else {
                return response()->json([
                    'estado' => 1,
                    'tiene_historial' => false,
                    'mensaje' => 'Esta caja no tiene historial de cierres anteriores'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener información de la caja: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cerrarCaja(Request $request, $id)
    {
        $caja = CajaOperativa::findOrFail($id);

        if ($caja->estado === 'cerrada') {
            return response()->json(['estado' => 0, 'mensaje' => 'La caja ya está cerrada.']);
        }

        $caja->update([
            'fecha_cierre' => now(),
            'saldo_cierre' => $request->saldo_cierre ?? 0,
            'diferencia' => $request->diferencia ?? 0,
            'observaciones' => $request->observaciones,
            'estado' => 'cerrada'
        ]);

        return response()->json(['estado' => 1, 'mensaje' => 'Caja cerrada correctamente', 'caja' => $caja]);
    }

    public function entregarCaja(Request $request, $id)
    {
        try {
            $caja = CajaOperativa::findOrFail($id);

            // Validar que la caja esté abierta (no cerrada ni ya entregada)
            if ($caja->estado === 'cerrada') {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No se puede entregar una caja cerrada. Debe reabrirla primero.'
                ], 400);
            }

            // Validar que el nuevo responsable exista
            $nuevoResponsable = Asistente::find($request->nuevo_responsable);
            if (!$nuevoResponsable) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'El nuevo responsable no existe.'
                ], 404);
            }

            // Validar que no se esté entregando a la misma persona
            if ($caja->id_usuario == $nuevoResponsable->id) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No puede entregar la caja al mismo responsable actual.'
                ], 400);
            }

            // Guardar el responsable anterior (quien entrega)
            $idUsuarioAnterior = $caja->id_usuario;

            // Actualizar la caja con la información de entrega
            // El estado queda como 'pendiente_entrega' hasta que el receptor acepte o rechace
            $caja->update([
                'id_usuario_entrega' => $idUsuarioAnterior, // Quien entregó
                'id_usuario' => $nuevoResponsable->id, // Nuevo responsable (receptor)
                'monto_entregado' => $request->saldo_entregar,
                'observaciones_entrega' => $request->observaciones,
                'estado' => 'pendiente_entrega',
                'fecha_entrega' => now(),
            ]);

            // Obtener nombre del asistente que entregó
            $asistenteAnterior = Asistente::find($idUsuarioAnterior);
            $nombreAnterior = $asistenteAnterior ?
                $asistenteAnterior->nombres . ' ' . $asistenteAnterior->apellido_uno :
                'Usuario anterior';

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Caja enviada para aprobación a ' . $nuevoResponsable->nombres . ' ' . $nuevoResponsable->apellido_uno,
                'caja' => $caja
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al entregar la caja: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Aceptar una entrega de caja pendiente
     */
    public function aceptarTraspasoCaja($id)
    {
        try {
            $caja = CajaOperativa::findOrFail($id);
            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

            if (!$asistente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Asistente no encontrado.'
                ], 404);
            }

            // Validar que la caja esté en estado pendiente de entrega
            if ($caja->estado !== 'pendiente_entrega') {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Esta caja no está pendiente de entrega.'
                ], 400);
            }

            // Validar que el usuario actual sea el destinatario de la entrega
            if ($caja->id_usuario != $asistente->id) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No tiene permiso para aceptar esta caja.'
                ], 403);
            }

            // Verificar que el usuario no tenga ya una caja abierta
            $cajaAbiertaUsuario = CajaOperativa::where('id_usuario', $asistente->id)
                                                ->where('id', '!=', $id) // Excluir la caja actual en estado pendiente
                                                ->where('estado', 'abierta')
                                                ->with('caja')
                                                ->first();

            if ($cajaAbiertaUsuario) {
                $nombreCajaAbierta = $cajaAbiertaUsuario->caja ? $cajaAbiertaUsuario->caja->nombre_caja : 'una caja';
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Ya tienes ' . $nombreCajaAbierta . ' abierta. Debes cerrarla antes de aceptar este traspaso.'
                ], 400);
            }

            // Marcar la caja anterior como 'entregada' (cerrar el ciclo)
            $caja->update([
                'estado' => 'entregada',
                'fecha_cierre' => now(),
            ]);

            // Crear una NUEVA caja operativa para el receptor con el monto entregado
            $nuevaCaja = new CajaOperativa();
            $nuevaCaja->id_caja = $caja->id_caja;
            $nuevaCaja->id_usuario = $asistente->id;
            $nuevaCaja->id_lugar_atencion = $caja->id_lugar_atencion;
            $nuevaCaja->estado = 'abierta';
            $nuevaCaja->monto_inicial = $caja->monto_entregado; // El monto entregado es el nuevo monto inicial
            $nuevaCaja->monto_final = $caja->monto_entregado; // Saldo anterior = monto entregado
            $nuevaCaja->total_efectivo = 0;
            $nuevaCaja->total_bonos_fisicos = 0;
            $nuevaCaja->total_otros = 0;
            $nuevaCaja->total_acumulado = 0;
            $nuevaCaja->fecha_apertura = now();
            $nuevaCaja->save();

            // Obtener nombre del asistente que entregó
            $entregador = Asistente::find($caja->id_usuario_entrega);
            $nombreEntregador = $entregador ?
                $entregador->nombres . ' ' . $entregador->apellido_uno :
                'Usuario anterior';

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Traspaso aceptado. Has recibido $' . number_format($caja->monto_entregado, 0, ',', '.') . ' en ' . $caja->caja->nombre_caja . '. La caja está ahora abierta bajo tu responsabilidad.',
                'caja_anterior' => $caja,
                'caja_nueva' => $nuevaCaja
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al aceptar el traspaso: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Rechazar una entrega de caja pendiente
     */
    public function rechazarCaja(Request $request, $id)
    {
        try {
            $caja = CajaOperativa::findOrFail($id);
            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

            if (!$asistente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Asistente no encontrado.'
                ], 404);
            }

            // Validar que la caja esté en estado pendiente de entrega
            if ($caja->estado !== 'pendiente_entrega') {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Esta caja no está pendiente de entrega.'
                ], 400);
            }

            // Validar que el usuario actual sea el destinatario de la entrega
            if ($caja->id_usuario != $asistente->id) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No tiene permiso para rechazar esta caja.'
                ], 403);
            }

            // Obtener motivo de rechazo
            $motivoRechazo = $request->input('motivo_rechazo', 'Sin motivo especificado');

            // Guardar el ID del usuario que rechazó (para trazabilidad)
            $idUsuarioOriginal = $caja->id_usuario_entrega;

            // Devolver la caja al responsable anterior
            $caja->update([
                'id_usuario' => $idUsuarioOriginal,  // Regresa al responsable anterior
                'id_usuario_entrega' => null,         // Limpiar el campo de entrega
                'estado' => 'abierta',                // Volver a estado abierta
                'monto_entregado' => null,
                'observaciones_entrega' => 'RECHAZADO: ' . $motivoRechazo . ' (Rechazado por: ' . $asistente->nombres . ' ' . $asistente->apellido_uno . ' el ' . now()->format('d/m/Y H:i') . ')',
                'fecha_entrega' => null,
            ]);

            // Obtener nombre del asistente original
            $entregador = Asistente::find($idUsuarioOriginal);
            $nombreEntregador = $entregador ?
                $entregador->nombres . ' ' . $entregador->apellido_uno :
                'Usuario anterior';

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Traspaso de caja rechazado. La caja ha sido devuelta a ' . $nombreEntregador,
                'caja' => $caja
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al rechazar el traspaso: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cajaProfesional(){
        return view('page.flujo_cajas.profesional.flujo_caja');
    }

    public function obtenerDetalleCajaOperativa($id){
        try {
            // Validar que el usuario esté autenticado
            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

            if (!$asistente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Asistente no encontrado'
                ], 404);
            }

            // Obtener la caja operativa
            $caja = CajaOperativa::with('caja', 'responsable')->findOrFail($id);

            // Obtener bonos de la caja del día actual
            $bonos_dia = Bono::where('id_asistente', $asistente->id)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->where('numero_sesiones', '=', '0')
                            ->get();

            // Calcular totales
            $total_efectivo = 0;
            $total_bonos = 0;
            $total_otros = 0;

            foreach ($bonos_dia as $bono) {
                // 6 = Particular (efectivo)
                if ($bono->id_clase_bono == 6) {
                    $total_efectivo += $bono->valor_atencion;
                }
                // 1-5 = Bonos físicos y web
                else if (in_array($bono->id_clase_bono, [1, 2, 3, 4, 5])) {
                    $total_bonos++;
                }
                // 7 = Institucional, otros
                else {
                    $total_otros += $bono->valor_atencion;
                }
            }

            // Total acumulado = saldo anterior + abono inicial + efectivo + otros
            $total_acumulado = ($caja->monto_final ?? 0) + ($caja->monto_inicial ?? 0) + $total_efectivo + $total_otros;

            // Total caja (lo que debería estar físicamente)
            $total_caja = $total_acumulado;

            return response()->json([
                'estado' => 1,
                'caja' => $caja,
                'totales' => [
                    'saldo_anterior' => number_format($caja->monto_final ?? 0, 0, ',', '.'),
                    'abono_inicial' => number_format($caja->monto_inicial ?? 0, 0, ',', '.'),
                    'total_efectivo' => number_format($total_efectivo, 0, ',', '.'),
                    'total_bonos' => $total_bonos,
                    'total_otros' => number_format($total_otros, 0, ',', '.'),
                    'total_acumulado' => number_format($total_acumulado, 0, ',', '.'),
                    'total_caja' => number_format($total_caja, 0, ',', '.'),
                ],
                'responsable' => $caja->responsable ?
                    $caja->responsable->nombre . ' ' .
                    $caja->responsable->apellido_uno . ' ' .
                    $caja->responsable->apellido_dos : 'Sin responsable',
                'nombre_caja' => $caja->caja->nombre_caja ?? 'Caja',
                'fecha_apertura' => $caja->fecha_apertura ?
                    Carbon::parse($caja->fecha_apertura)->format('d/m/Y - H:i') : '--/--/---- - --:--',
                'fecha_cierre' => $caja->fecha_cierre ?
                    Carbon::parse($caja->fecha_cierre)->format('d/m/Y - H:i') : '--/--/---- - --:--',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener detalle de caja operativa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function recepcionRendicion(){
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        $rendiciones = RendicionCaja::select('rendicion_caja.*','asistentes.nombres','asistentes.apellido_uno','asistentes.apellido_dos')
            ->join('asistentes','asistentes.id','=','rendicion_caja.id_asistente')
            ->where('rendicion_caja.id_asistente_receptor',$asistente->id)
            ->get();

        return view('page.flujo_cajas.profesional.recepcion_rendicion',[
            'rendiciones' => $rendiciones
        ]);
    }

    public function dameRendicion($id){
        $rendicion = RendicionCaja::select(
            'rendicion_caja.*',
            'asistentes.nombres',
            'asistentes.apellido_uno',
            'asistentes.apellido_dos',
            'asistentes_lugar_atencion.id_lugar_atencion'
        )
        ->join('asistentes','asistentes.id','=','rendicion_caja.id_asistente')
        ->join('asistentes_lugar_atencion','asistentes_lugar_atencion.id_asistente','=','asistentes.id')
        ->where('rendicion_caja.id',$id)
        ->first();

        $archivos = explode('|',$rendicion->archivos);

        // Buscar el lugar de atención y su dirección
        $lugar_atencion = null;
        $direccion = null;
        if ($rendicion && $rendicion->id_lugar_atencion) {
            $lugar_atencion = \App\Models\LugarAtencion::find($rendicion->id_lugar_atencion);
            $direccion = $lugar_atencion ? $lugar_atencion->Direccion : null;
        }

        $rendicion->lugar_atencion = $lugar_atencion ? $lugar_atencion->nombre : 'N/A';
        $rendicion->direccion = $direccion ? $direccion->calle . ' ' . $direccion->numero : 'N/A';

        return view('app.profesional.dame_rendicion', [
            'rendicion' => $rendicion,
            'archivos' => $archivos,
            'lugar_atencion' => $lugar_atencion,
            'direccion' => $direccion
        ]);
    }

    public function dameRendicionPdf($id, $id_asistente){
        $rendicion = RendicionCaja::select('rendicion_caja.*','asistentes.nombres','asistentes.apellido_uno','asistentes.apellido_dos')
                                        ->join('asistentes','asistentes.id','=','rendicion_caja.id_asistente')
                                        ->where('rendicion_caja.id',$id)
                                        ->first();

        $ids_bonos = explode('|', $rendicion->bonos); // Convierte "12|15|19" → [12, 15, 19]

        $asistente = Asistente::where('id',$id_asistente)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();
        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        if(!empty($id_lugar_atencion))
        {

            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            if ($profesional) {
                $filtro[] = ['id_profesional', $profesional->id];
            }
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','1');
            // echo json_encode($filtro);
            $fecha = Carbon::parse($rendicion->fecha_rendicion)->toDateString(); // "2024-05-09"
            /** rendicion a cm */
            /** bono  */

            // $bonos = Bono::where($filtro)
            //  ->whereDate('fecha_atencion', $fecha)
            //  ->get();

            $bonos = Bono::whereIn('id', $ids_bonos)
             ->where('rendido', 1)
             ->get();

             if($bonos->isEmpty()) {
                $bonos = Bono::whereIn('id', $ids_bonos)
                ->where('rendido', 0)
                ->get();
            }

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
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
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion[0]);

            // generamos el pdf
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('app.general.asistente.flujo_caja.PDF.pdf_bonos_dia', [
                'bonos' => $bonos,
                'fecha_rendicion' => $rendicion->fecha_rendicion,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                // 'prevision' => $prevision,
                'asistente' => $asistente,
                'lugar_atencion' => $lugar_atencion,
                'profesional_agenda' => $profesional,
            ]);
            // Guardar el PDF en la carpeta public
            $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        }
    }

    public function aprobarRendicion($id)
    {
        $rendicion = RendicionCaja::find($id);
        $rendicion->estado = 3; // Cambia el estado a "Aprobada"
        $rendicion->save();
        $asistente = Asistente::find($rendicion->id_asistente);

        $filtro_rendicion[] = array('id_profesional_receptor',$rendicion->id_profesional_receptor);

        $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
        $filePath = public_path('reportes/' . $fileName);

        if (!file_exists($filePath)) {
            // Asegúrate de que el PDF esté generado
            // Aquí puedes reutilizar el método que ya genera el PDF
            // Ejemplo: $this->dameRendicionPdf($rendicion->id, $asistente->id);
        }

        Mail::to('l.mena.insi@gmail.com')->send(new RendicionAprobadaMail($asistente, $filePath));
        Mail::to('jkriman@gmail.com')->send(new RendicionAprobadaMail($asistente, $filePath));
        $rendiciones =  $rendiciones = RendicionCaja::where($filtro_rendicion)
        ->where('rendicion','0')
        ->get();
        foreach ($rendiciones as $rendicion) {
            $asistente = Asistente::find($rendicion->id_asistente);
            $rendicion->asistente = $asistente;
            if($rendicion->estado == 3){
                $rendicion->estado = 'APROBADA';
            }else if($rendicion->estado == 2){
                $rendicion->estado = 'OTRO';
            }else if($rendicion->estado == 1){
                $rendicion->estado = 'EN ESPERA';
            }else if($rendicion->estado == 4){
                $rendicion->estado = 'RECHAZADA';
            }
        }
        return response()->json(['mensaje' => 'Rendición aprobada y correo enviado.', 'rendiciones' => $rendiciones]);
    }

    public function rechazarRendicion($id)
    {
        $rendicion = RendicionCaja::find($id);
        $rendicion->estado = 4; // Cambia el estado a "Rechazada"
        $rendicion->save();
        $filtro_rendicion[] = array('id_profesional_receptor',$rendicion->id_profesional_receptor);
        $rendiciones =  $rendiciones = RendicionCaja::where($filtro_rendicion)
        ->where('rendicion','0')
        ->get();
        foreach ($rendiciones as $rendicion) {
            $asistente = Asistente::find($rendicion->id_asistente);
            $rendicion->asistente = $asistente;
            if($rendicion->estado == 3){
                $rendicion->estado = 'APROBADA';
            }else if($rendicion->estado == 2){
                $rendicion->estado = 'OTRO';
            }else if($rendicion->estado == 1){
                $rendicion->estado = 'EN ESPERA';
            }else if($rendicion->estado == 4){
                $rendicion->estado = 'RECHAZADA';
            }
        }
        return response()->json(['mensaje' => 'Rendición rechazada.', 'rendiciones' => $rendiciones]);
    }

    public function cambiarEstado(Request $req){
        try {
            $bonos_fonasa = json_decode($req->bonos_fonasa);
            $bonos_otros = json_decode($req->bonos_otros);
            $bonos_agrupados = json_decode($req->bonos_agrupados);

            foreach ($bonos_agrupados as $key => $bonos) {
                foreach ($bonos as $bono) {
                    // Aquí puedes acceder a cada bono y cambiar su estado
                    // Suponiendo que 'id' es la clave única para cada bono y 'estado' es el campo que quieres cambiar
                    $bonoEncontrado = Bono::find($bono->id);
                    if ($bonoEncontrado) {
                        $bonoEncontrado->estado_consulta = 8; // Reemplaza 'nuevo_estado' con el estado que quieras
                        $bonoEncontrado->save();
                    }
                }
            }

            return 'ok';
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dameBonosDiarios(Request $req){
        $fecha = $req->fecha;
        if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro_rendicion[] = array('id_profesional_receptor',$profesional->id);

            /** Buscar Asistentes de profesional y/o profesional */
            $profesional_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where('estado',1)->pluck('id_lugar_atencion')->toArray();
            $lista_lugares_atencion_activos = LugarAtencion::whereIn('id', $profesional_lugar_atencion)->get();
            $asistentes_lugar_atencion = AsistenteLugarAtencion::whereIn('id_lugar_atencion', $profesional_lugar_atencion)->where('estado', 1)->pluck('id_asistente')->toArray();
            $lista_asistente = Asistente::whereIn('id', $asistentes_lugar_atencion)->get();
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Institucion'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Servicio'))
        {
            $servicio = AdminInstServ::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Contador'))
        {
            // $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }

        $bonos_diarios = Bono::where($filtro)

        ->with('Convenio')
         ->with('TipoBono')
         ->with('Paciente')
         ->with('Asistente')
         ->where('numero_sesiones', 0)
        ->whereDate('fecha_atencion', $fecha)
        ->get();

        // foreach($bonos_diarios as $b){
        //     $paciente = paciente::find($b->id_paciente);
        //     if($paciente) $b->paciente = $paciente;
        //     $convenio = Prevision::where('id',$b->id_clase_bono)->first();
        //     if($convenio) $b->convenio = $convenio;
        //     $tipo_bono = TipoBono::where('id',$b->id_tipo_bono)->first();
        //     if($tipo_bono) $b->tipo = $tipo_bono;
        // }

        return ['estado' => 1, 'bonos' => $bonos_diarios];
    }

    public function dataProfesionalRendiciones(Request $request)
    {
        $datos = array();
        $filtro = array();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional_receptor',$profesional->id);
        // if(!empty($request->fecha))
        //     $filtro[] = array('fecha_recepcion',$request->fecha);
        // if(!empty($request->convenio))
        //     $filtro[] = array('convenio',$request->convenio);
        if(!empty($request->asistente))
            $filtro[] = array('id_asistente',$request->asistente);
        // if(!empty($request->estado_consulta))
        //     $filtro[] = array('id_profesional_receptor',$request->estado_consulta);

        $rendiciones = RendicionCaja::where($filtro)
                    ->where('rendicion','0')
                    ->filtrofecha($request->fecha)
                    ->with('Asistente')
                    ->with('ProfesionalReceptor')
                    ->get();

        foreach($rendiciones as $r){
            if($r->estado == 3){
                $r->estado = 'APROBADA';
            }else if($r->estado == 2){
                $r->estado = 'OTRO';
            }else if($r->estado == 1){
                $r->estado = 'EN ESPERA';
            }else if($r->estado == 4){
                $r->estado = 'RECHAZADA';
            }
        }

        $datos['estado'] = 1;
        $datos['registros'] = $rendiciones;

        return $datos;
    }

    public function dataProfesionalBonosRendidosPrograma(Request $request)
    {
        $datos = array();
        $filtro = array();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional',$profesional->id);

        // if(!empty($request->fecha))
        //     $filtro[] = array('fecha_atencion',$request->fecha);
        if(!empty($request->asistente))
            $filtro[] = array('id_asistente',$request->asistente);
        if(!empty($request->convenio))
            $filtro[] = array('convenio',$request->convenio);
        if(!empty($request->estado_consulta))
            $filtro[] = array('estado_consulta',$request->estado_consulta);

        $bonos_programa = Bono::where($filtro)
            ->with('TipoBono')
            ->with('Convenio')
            ->with('Paciente')
            ->with('Parametro')
            ->with('Profesional')
            ->with('Asistente')
            ->where('numero_sesiones','>','0')
            ->filtroFechaAtencion($request->fecha)
            ->get();

        $datos['estado'] = 1;
        $datos['registros'] = $bonos_programa;

        return $datos;
    }

    public function dataProfesionalGestionBonos(Request $request)
    {
        $datos = array();
        $filtro = array();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional',$profesional->id);

        // if(!empty($request->fecha))
        //     $filtro[] = array('fecha_atencion',$request->fecha);
        if(!empty($request->asistente))
            $filtro[] = array('id_asistente',$request->asistente);
        if(!empty($request->convenio))
            $filtro[] = array('convenio',$request->convenio);
        if(!empty($request->estado_consulta))
            $filtro[] = array('estado_consulta',$request->estado_consulta);


            // var_dump($filtro);

        $bonos_rendidos = Bono::where($filtro)
            ->where('rendido','1')
            ->where('id_clase_bono','<>',6)
            ->where('numero_sesiones','=','0')
            ->where('estado_consulta','<>',8)
            ->filtroFechaAtencion($request->fecha)
            ->with('TipoBono')
            ->with('Convenio')
            ->with('Paciente')
            ->with('Parametro')
            ->with('Profesional')
            ->with('Asistente')
            ->get();

        $bonos_rendidos_generados = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',8)
            ->filtroFechaAtencion($request->fecha)
            ->with('TipoBono')
            ->with('Convenio')
            ->with('Paciente')
            ->with('Parametro')
            ->with('Profesional')
            ->with('Asistente')
            ->get();


        $datos['estado'] = 1;
        $datos['registros']['bonos_rendidos'] = $bonos_rendidos;
        $datos['registros']['bonos_rendidos_generados'] = $bonos_rendidos_generados;

        return $datos;
    }

    public function iniciar_cobro(Request $request){
        $rendiciones = $request->rendiciones;

        // Lógica para iniciar el proceso de cobro
        return response()->json(['mensaje' => 'Proceso de cobro iniciado para las rendiciones: ' . implode(', ', $rendiciones)]);
    }

    public function detalleGarantia($id){
        try {
            // Buscar el bono
            $bono = Bono::with(['paciente', 'profesional.especialidad', 'convenio', 'tipoBono'])->find($id);

            if (!$bono) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No se encontró la garantía especificada.'
                ], 404);
            }

            // Obtener información del profesional_convenio para completar datos
            $profesional_convenio = ProfesionalConvenio::where('id_profesional', $bono->id_profesional)
                                                        ->where('id_lugar_atencion', $bono->id_lugar_atencion)
                                                        ->first();

            // Buscar la hora médica asociada al bono
            $hora_medica = HoraMedica::where('id', $bono->id_referencia)->first();

            // Preparar información del paciente
            $paciente_data = [
                'nombre_completo' => ($bono->paciente->nombres ?? '') . ' ' . ($bono->paciente->apellido_uno ?? '') . ' ' . ($bono->paciente->apellido_dos ?? ''),
                'rut' => $bono->paciente->rut ?? 'Sin información',
                'email' => $bono->paciente->email ?? 'Sin información',
                'telefono' => $bono->paciente->telefono ?? 'Sin información',
            ];

            // Preparar información del profesional
            $profesional_data = [
                'nombre_completo' => ($bono->profesional->nombre ?? '') . ' ' . ($bono->profesional->apellido_uno ?? '') . ' ' . ($bono->profesional->apellido_dos ?? ''),
                'rut' => $bono->profesional->rut ?? 'Sin información',
                'especialidad' => $bono->profesional->especialidad->nombre ?? 'Sin especialidad',
            ];

            // Calcular días restantes y estado
            $dias_restantes = null;
            $estado_badge = '<span class="badge badge-secondary">Sin vencimiento</span>';

            if ($bono->fecha_vencimiento) {
                $fecha_vencimiento = Carbon::parse($bono->fecha_vencimiento);
                $dias = Carbon::now()->diffInDays($fecha_vencimiento, false);
                $dias_restantes = $dias . ' día' . ($dias != 1 ? 's' : '');

                if ($dias < 0) {
                    $estado_badge = '<span class="badge badge-danger">Vencido (' . abs($dias) . ' días)</span>';
                } elseif ($dias <= 7) {
                    $estado_badge = '<span class="badge badge-warning">Por vencer (' . $dias . ' días)</span>';
                } else {
                    $estado_badge = '<span class="badge badge-success">Vigente (' . $dias . ' días)</span>';
                }
            }

            // Preparar información del bono
            $bono_data = [
                'fecha_atencion' => $bono->fecha_atencion ? Carbon::parse($bono->fecha_atencion)->format('d-m-Y') : 'Sin información',
                'hora_atencion' => $bono->hora_atencion ?? 'Sin información',
                'tipo_bono' => $bono->tipoBono->nombre ?? 'Sin información',
                'convenio' => $bono->convenio->nombre ?? 'Sin información',
                'valor_garantia' => $profesional_convenio ? '$' . number_format($profesional_convenio->valor_garantia ?? 0, 0, ',', '.') : '$0',
                'tiempo_espera' => $profesional_convenio ? ($profesional_convenio->tpo_espera ?? 0) . ' días' : '0 días',
                'fecha_vencimiento' => $bono->fecha_vencimiento ? Carbon::parse($bono->fecha_vencimiento)->format('d-m-Y') : 'Sin vencimiento',
                'estado_badge' => $estado_badge,
                'dias_restantes' => $dias_restantes ?? 'N/A',
            ];

            // Preparar información de la hora médica si existe
            $hora_medica_data = null;
            if ($hora_medica) {
                $hora_medica_data = [
                    'fecha' => $hora_medica->fecha ? Carbon::parse($hora_medica->fecha)->format('d-m-Y') : 'Sin información',
                    'hora' => $hora_medica->hora ?? 'Sin información',
                    'estado' => $hora_medica->estado ?? 'Sin información',
                    'observaciones' => $hora_medica->observaciones ?? 'Sin observaciones',
                ];
            }

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Detalle de garantía obtenido correctamente.',
                'paciente' => $paciente_data,
                'profesional' => $profesional_data,
                'bono' => $bono_data,
                'hora_medica' => $hora_medica_data,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener el detalle de la garantía: ' . $e->getMessage()
            ], 500);
        }
    }

    public function pagarGarantia($id){
        try {
            // Buscar el bono
            $bono = Bono::find($id);

            if (!$bono) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'No se encontró el bono especificado.'
                ], 404);
            }

            // Verificar que sea una garantía (clase 8)
            if ($bono->id_clase_bono != 8) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Este bono no es una garantía.'
                ], 400);
            }

            // Verificar que no esté ya pagado
            if ($bono->pagado_garantia) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Esta garantía ya ha sido marcada como pagada.'
                ], 400);
            }

            // Marcar como pagado
            $bono->pagado_garantia = true;
            $bono->fecha_pago_garantia = Carbon::now();
            $bono->id_usuario_pago_garantia = Auth::user()->id;
            $bono->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'La garantía ha sido marcada como pagada correctamente.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al procesar el pago de la garantía: ' . $e->getMessage()
            ], 500);
        }
    }

}
