<?php



namespace App\Http\Controllers;



use App\Models\DeclaracionEno;

use App\Models\GesRegistros;

use App\Models\Instituciones;

use App\Models\Paciente;

use App\Models\Profesional;

use App\Models\Producto;

use App\Models\TipoProducto;

use App\Models\Farmacia;

use App\Models\Laboratorio;

use App\Models\Direccion;

use App\Models\LugarAtencion;

use App\Models\Region;
use App\Models\Ciudad;

use App\Models\ControlFarmacia;

use App\Models\ControlLaboratorio;

use App\Models\DenunciaRam;

use App\Models\EntregaMedicamentoCronico;
use App\Models\Antecedente;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\Bono;

use App\Models\Prevision;

use App\Models\TipoBono;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;

use Barryvdh\DomPDF\Facade\Pdf;



class DireccionSaludController extends Controller

{

    public function index()

    {

        $ruta_blade = 'direccion_salud.escritorio_direccion_salud';

        $regiones = Region::all();



        return view($ruta_blade)->with(

            [

                'regiones' => $regiones,

            ]

        );

    }



    /** INICIO GES */

    public function cargarGes()

    {

        $anio = date('Y');

        $mes = date('m');



        $registros = GesRegistros::select('ges_registros.nombre_ges',

                                'ges_registros.fecha_ficha_ges',

                                'ges_registros.hora_ficha_ges',



                                DB::raw('CONCAT( pacientes.nombres, " ", pacientes.apellido_uno, " ", pacientes.apellido_dos) AS paciente_nombre'),

                                'pacientes.rut AS paciente_rut',

                                DB::raw('CONCAT( profesionales.nombre, " ", profesionales.apellido_uno, " ", profesionales.apellido_dos) AS profesional_nombre'),

                                'profesionales.rut AS profesional_rut',



                                'ges_registros.nombre_institucion_ficha_ges',

                                'ges_registros.direccion_institucion_ficha_ges',



                                'ges_registros.confirmacion_diagnostica_ficha_ges',

                                'ges_registros.paciente_tratamiento_ficha_ges',



                                'ges_registros.codigo_verificacion',

                                'ges_registros.created_at')

                        ->join('pacientes', 'ges_registros.id_paciente', '=', 'pacientes.id')

                        ->join('profesionales', 'ges_registros.id_profesional', '=', 'profesionales.id')

                        ->whereYear('ges_registros.fecha_ficha_ges', $anio)

                        ->whereMonth('ges_registros.fecha_ficha_ges', $mes)

                        ->get();



        return view('direccion_salud.escritorio_ges')->with([

            'registros' => $registros,

            'anio' => $anio,

            'mes' => $mes,

        ]);

    }

    public function buscarGes(Request $request)

    {

        $datos = array();

        $error = array();

        $valido = 1;



        if(empty($request->anio))

        {

            $error['anio'] = 'campo requerido';

            $valido = 0;

        }

        if(empty($request->mes))

        {

            $error['mes'] = 'campo requerido';

            $valido = 0;

        }



        if($valido)

        {

            $registros = GesRegistros::select('ges_registros.nombre_ges',

                                'ges_registros.fecha_ficha_ges',

                                'ges_registros.hora_ficha_ges',



                                DB::raw('CONCAT( pacientes.nombres, " ", pacientes.apellido_uno, " ", pacientes.apellido_dos) AS paciente_nombre'),

                                'pacientes.rut AS paciente_rut',

                                DB::raw('CONCAT( profesionales.nombre, " ", profesionales.apellido_uno, " ", profesionales.apellido_dos) AS profesional_nombre'),

                                'profesionales.rut AS profesional_rut',



                                'ges_registros.nombre_institucion_ficha_ges',

                                'ges_registros.direccion_institucion_ficha_ges',



                                'ges_registros.confirmacion_diagnostica_ficha_ges',

                                'ges_registros.paciente_tratamiento_ficha_ges',



                                'ges_registros.codigo_verificacion',

                                'ges_registros.created_at')

                        ->join('pacientes', 'ges_registros.id_paciente', '=', 'pacientes.id')

                        ->join('profesionales', 'ges_registros.id_profesional', '=', 'profesionales.id')

                        ->whereYear('ges_registros.fecha_ficha_ges', $request->anio)

                        ->whereMonth('ges_registros.fecha_ficha_ges', $request->mes)

                        ->get();

            if($registros)

            {

                $datos['estado'] = 1;

                $datos['msj'] = 'registros';

                $datos['registros'] = $registros;

            }

            else

            {

                $datos['estado'] = 0;

                $datos['msj'] = 'Sin registros';

            }

        }

        else

        {

            $datos['estado'] = 0;

            $datos['msj'] = 'Campos requeridos';

            $datos['error'] = $error;

        }

        return $datos;

    }

    /** FIN GES */



    /** INICIO ENO */

    public function cargarEnfNotiOblig()

    {

        $anio = date('Y');

        $mes = date('m');



        $registros = DeclaracionEno::select(    'declaraciones_eno.diagnostico_cie',

                                                'declaraciones_eno.diagnositico_confirmado',

                                                'declaraciones_eno.primeros_sintomas',

                                                DB::raw("CASE WHEN declaraciones_eno.pais_contagio = 1 THEN 'CHILE' WHEN declaraciones_eno.pais_contagio = 2 THEN 'EXTRANJERO' END pais_contagio"),

                                                'declaraciones_eno.pais',



                                                DB::raw(" CASE WHEN declaraciones_eno.vacunacion = 1 THEN 'SI' WHEN declaraciones_eno.vacunacion = 2 THEN 'NO' WHEN declaraciones_eno.vacunacion = 3 THEN 'IGNORADO' WHEN declaraciones_eno.vacunacion = 4 THEN 'NO CORRESPONDE' ELSE 'NO' END vacunacion"),

                                                'declaraciones_eno.fecha_ultima_dosis',

                                                'declaraciones_eno.numero_ultima_dosis',



                                                'declaraciones_eno.tbc',

                                                'declaraciones_eno.tbc_recaidas',



                                                'declaraciones_eno.fecha_notificacion',

                                                'declaraciones_eno.hora_notificacion',



                                                DB::raw("CONCAT( pacientes.nombres, ' ', pacientes.apellido_uno, ' ', pacientes.apellido_dos) AS paciente_nombre"),

                                                'pacientes.rut AS paciente_rut',



                                                'declaraciones_eno.nacionalidad_paciente',

                                                'declaraciones_eno.ocupacion_paciente',

                                                DB::raw("CASE WHEN declaraciones_eno.pueblo_originario_paciente = 1 THEN 'Ninguna' WHEN declaraciones_eno.pueblo_originario_paciente = 2 THEN 'Atacameño' WHEN declaraciones_eno.pueblo_originario_paciente = 3 THEN 'Aimara' WHEN declaraciones_eno.pueblo_originario_paciente = 5 THEN 'Colla' WHEN declaraciones_eno.pueblo_originario_paciente = 6 THEN 'Otro' ELSE 'Ninguna' END pueblo_originario_paciente"),

                                                DB::raw("CASE WHEN declaraciones_eno.condicion_paciente = 1 THEN 'Inactivo/a' WHEN declaraciones_eno.condicion_paciente = 2 THEN 'Activo/a' ELSE 'Inactivo/a' END condicion_paciente"),

                                                DB::raw("CASE WHEN declaraciones_eno.categoria_paciente = 1 THEN 'Patrón / Empresario' WHEN declaraciones_eno.categoria_paciente = 2 THEN 'Empleado' WHEN declaraciones_eno.categoria_paciente = 3 THEN 'Obrero' WHEN declaraciones_eno.categoria_paciente = 4 THEN 'Trabajador Independiente' END categoria_paciente"),



                                                DB::raw("CONCAT( profesionales.nombre, ' ', profesionales.apellido_uno, ' ', profesionales.apellido_dos) AS profesional_nombre"),

                                                'profesionales.rut AS profesional_rut',



                                                'declaraciones_eno.nombre_establecimiento',

                                                'declaraciones_eno.codigo_establecimiento',

                                                'declaraciones_eno.nombre_oficina',

                                                'declaraciones_eno.codigo_oficina')

                        ->join('pacientes', 'declaraciones_eno.id_paciente', '=', 'pacientes.id')

                        ->join('profesionales', 'declaraciones_eno.id_profesional', '=', 'profesionales.id')

                        ->whereYear('declaraciones_eno.fecha_notificacion', $anio)

                        ->whereMonth('declaraciones_eno.fecha_notificacion', $mes)

                        ->get();



        return view('direccion_salud.escritorio_enfer_noti_obliga')->with([

            'registros' => $registros,

            'anio' => $anio,

            'mes' => $mes,

        ]);

    }

    public function buscarEnfNotiOblig(Request $request)

    {

        $datos = array();

        $error = array();

        $valido = 1;



        if(empty($request->anio))

        {

            $error['anio'] = 'campo requerido';

            $valido = 0;

        }

        if(empty($request->mes))

        {

            $error['mes'] = 'campo requerido';

            $valido = 0;

        }



        if($valido)

        {

            $registros = DeclaracionEno::select(    'declaraciones_eno.diagnostico_cie',

                                                    'declaraciones_eno.diagnositico_confirmado',

                                                    'declaraciones_eno.primeros_sintomas',

                                                    DB::raw("CASE WHEN declaraciones_eno.pais_contagio = 1 THEN 'CHILE' WHEN declaraciones_eno.pais_contagio = 2 THEN 'EXTRANJERO' END pais_contagio"),

                                                    'declaraciones_eno.pais',



                                                    DB::raw(" CASE WHEN declaraciones_eno.vacunacion = 1 THEN 'SI' WHEN declaraciones_eno.vacunacion = 2 THEN 'NO' WHEN declaraciones_eno.vacunacion = 3 THEN 'IGNORADO' WHEN declaraciones_eno.vacunacion = 4 THEN 'NO CORRESPONDE' ELSE 'NO' END vacunacion"),

                                                    'declaraciones_eno.fecha_ultima_dosis',

                                                    'declaraciones_eno.numero_ultima_dosis',



                                                    'declaraciones_eno.tbc',

                                                    'declaraciones_eno.tbc_recaidas',



                                                    'declaraciones_eno.fecha_notificacion',

                                                    'declaraciones_eno.hora_notificacion',



                                                    DB::raw("CONCAT( pacientes.nombres, ' ', pacientes.apellido_uno, ' ', pacientes.apellido_dos) AS paciente_nombre"),

                                                    'pacientes.rut AS paciente_rut',



                                                    'declaraciones_eno.nacionalidad_paciente',

                                                    'declaraciones_eno.ocupacion_paciente',

                                                    DB::raw("CASE WHEN declaraciones_eno.pueblo_originario_paciente = 1 THEN 'Ninguna' WHEN declaraciones_eno.pueblo_originario_paciente = 2 THEN 'Atacameño' WHEN declaraciones_eno.pueblo_originario_paciente = 3 THEN 'Aimara' WHEN declaraciones_eno.pueblo_originario_paciente = 5 THEN 'Colla' WHEN declaraciones_eno.pueblo_originario_paciente = 6 THEN 'Otro' ELSE 'Ninguna' END pueblo_originario_paciente"),

                                                    DB::raw("CASE WHEN declaraciones_eno.condicion_paciente = 1 THEN 'Inactivo/a' WHEN declaraciones_eno.condicion_paciente = 2 THEN 'Activo/a' ELSE 'Inactivo/a' END condicion_paciente"),

                                                    DB::raw("CASE WHEN declaraciones_eno.categoria_paciente = 1 THEN 'Patrón / Empresario' WHEN declaraciones_eno.categoria_paciente = 2 THEN 'Empleado' WHEN declaraciones_eno.categoria_paciente = 3 THEN 'Obrero' WHEN declaraciones_eno.categoria_paciente = 4 THEN 'Trabajador Independiente' END categoria_paciente"),



                                                    DB::raw("CONCAT( profesionales.nombre, ' ', profesionales.apellido_uno, ' ', profesionales.apellido_dos) AS profesional_nombre"),

                                                    'profesionales.rut AS profesional_rut',



                                                    'declaraciones_eno.nombre_establecimiento',

                                                    'declaraciones_eno.codigo_establecimiento',

                                                    'declaraciones_eno.nombre_oficina',

                                                    'declaraciones_eno.codigo_oficina')

                        ->join('pacientes', 'declaraciones_eno.id_paciente', '=', 'pacientes.id')

                        ->join('profesionales', 'declaraciones_eno.id_profesional', '=', 'profesionales.id')

                        ->whereYear('declaraciones_eno.fecha_notificacion', $request->anio)

                        ->whereMonth('declaraciones_eno.fecha_notificacion', $request->mes)

                        ->get();

            if($registros)

            {

                $datos['estado'] = 1;

                $datos['msj'] = 'registros';

                $datos['registros'] = $registros;

            }

            else

            {

                $datos['estado'] = 0;

                $datos['msj'] = 'Sin registros';

            }

        }

        else

        {

            $datos['estado'] = 0;

            $datos['msj'] = 'Campos requeridos';

            $datos['error'] = $error;

        }

        return $datos;

    }

    /** FIN ENO */



    /** INICIO MEDICAMENTOS CONTROLADOS */

    public function CargarControlMedicamento()

    {

        $anio = date('Y');

        $mes = date('m');



        $consulta_req = new Request( array(

                                        'id_tipo_control' => '1,2,3,4,5',

                                        'anio' => $anio,

                                        'mes' => $mes,

                                    ));

        $registros = (object)RecomendacionController::verRecomendaciones($consulta_req);

        if($registros->estado == 1)

        {

            foreach ($registros->registros as $key => $value)

            {

                $value = (object)$value;

                $registros->registros[$key]['paciente'] = Paciente::select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut')->find($value->id_paciente);

                $registros->registros[$key]['profesional'] = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut')->find($value->id_profesional);

            }

        }

        $regiones = Region::all();

        return view('direccion_salud.escritorio_control_medicamento')->with([

            'registros' => $registros->registros,

            'anio' => $anio,

            'mes' => $mes,

            'regiones' => $regiones,

        ]);

    }

    public function buscarControlMedicamento(Request $request)

    {

        $datos = array();

        $error = array();

        $valido = 1;



        if(empty($request->anio))

        {

            $error['anio'] = 'campo requerido';

            $valido = 0;

        }

        if(empty($request->mes))

        {

            $error['mes'] = 'campo requerido';

            $valido = 0;

        }



        if($valido)

        {

            $consulta_req = new Request( array(

                'id_tipo_control' => '1,2,3,4,5',

                'anio' => $request->anio,

                'mes' => $request->mes,

            ));

            $registros = (object)RecomendacionController::verRecomendaciones($consulta_req);



            if($registros->estado == 1)

            {

                if($registros->estado == 1)

                {

                    foreach ($registros->registros as $key => $value)

                    {

                        $value = (object)$value;

                        $registros->registros[$key]['paciente'] = Paciente::select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut')->find($value->id_paciente);

                        $registros->registros[$key]['profesional'] = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut')->find($value->id_profesional);

                    }

                }

                $datos['estado'] = 1;

                $datos['msj'] = 'registros';

                $datos['registros'] = $registros->registros;

            }

            else

            {

                $datos['estado'] = 0;

                $datos['msj'] = 'Sin registros';

            }

        }

        else

        {

            $datos['estado'] = 0;

            $datos['msj'] = 'Campos requeridos';

            $datos['error'] = $error;

        }

        return $datos;

    }

    /** FIN MEDICAMENTOS CONTROLADOS */



    public function CargarControlFarmacia()

    {

        $farmacias = Farmacia::orderBy('nombre')->get();

        $lugares_atencion = LugarAtencion::orderBy('nombre')->get();

        return view('direccion_salud.escritorio_control_farmacia')->with([

            'farmacias' => $farmacias,

            'lugares_atencion' => $lugares_atencion,

        ]);

    }



    public function guardarControlFarmacia(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'farmacia_nombre' => 'required|string|max:255',

            'fecha'           => 'required|date',

            'acta'            => 'required|string',

        ]);



        if ($validator->fails()) {

            return response()->json(['estado' => 'error', 'mensaje' => $validator->errors()->first()], 422);

        }



        $control = ControlFarmacia::create([

            'id_farmacia'          => $request->id_farmacia ?: null,

            'farmacia_nombre'      => $request->farmacia_nombre,

            'fecha'                => $request->fecha,

            'hora_inicio'          => $request->hora_inicio ?: null,

            'hora_termino'         => $request->hora_termino ?: null,

            'tipo'                 => $request->tipo ?? 'control_stock',

            'responsable'          => $request->responsable,

            'enlace_jitsi'         => $request->enlace_jitsi,

            'estado'               => $request->estado ?? 'finalizada',

            'acta'                 => $request->acta,

            'productos_verificados'=> $request->productos_verificados,

        ]);



        return response()->json(['estado' => 'ok', 'id' => $control->id, 'mensaje' => 'Control registrado correctamente.']);

    }



    public function listarControlesFarmacia(Request $request)

    {

        $query = ControlFarmacia::select(

                'controles_farmacia.*',

                DB::raw("IFNULL(farmacias.nombre, controles_farmacia.farmacia_nombre) as farmacia_display")

            )

            ->leftJoin('farmacias', 'controles_farmacia.id_farmacia', '=', 'farmacias.id');



        if (!empty($request->farmacia)) {

            $query->where('controles_farmacia.farmacia_nombre', 'like', '%' . $request->farmacia . '%');

        }

        if (!empty($request->tipo)) {

            $query->where('controles_farmacia.tipo', $request->tipo);

        }

        if (!empty($request->estado)) {

            $query->where('controles_farmacia.estado', $request->estado);

        }

        if (!empty($request->fecha_desde)) {

            $query->whereDate('controles_farmacia.fecha', '>=', $request->fecha_desde);

        }

        if (!empty($request->fecha_hasta)) {

            $query->whereDate('controles_farmacia.fecha', '<=', $request->fecha_hasta);

        }



        $controles = $query->orderByDesc('controles_farmacia.fecha')

                           ->orderByDesc('controles_farmacia.created_at')

                           ->get();



        $totales = [

            'total'      => $controles->count(),

            'finalizada' => $controles->where('estado', 'finalizada')->count(),

            'en_curso'   => $controles->where('estado', 'en_curso')->count(),

            'cancelada'  => $controles->where('estado', 'cancelada')->count(),

            'pendiente'  => $controles->where('estado', 'pendiente')->count(),

        ];



        return response()->json(['estado' => 'ok', 'controles' => $controles, 'totales' => $totales]);

    }



    public function enviarActaEmail(Request $request)

    {

        try {

            $idControl = $request->id_control_farmacia;

            $farmaciaNombre = $request->farmacia_nombre;

            $htmlPdf = $request->html_pdf;



            // Obtener el control de farmacia y la farmacia

            $control = ControlFarmacia::with('farmacia')->find($idControl);

            if (!$control) {

                return response()->json(['estado' => 'error', 'mensaje' => 'Control de farmacia no encontrado'], 404);

            }



            // Obtener email de la farmacia

            $farmacia = $control->farmacia;

            $email = $farmacia->email ?? null;



            if (!$email) {

                return response()->json(['estado' => 'error', 'mensaje' => 'La farmacia no tiene email registrado'], 422);

            }



            // Convertir HTML a PDF usando dompdf

            $pdf = Pdf::loadHTML($htmlPdf);

            $nombreArchivo = 'Acta_Reunion_' . str_replace(' ', '_', $farmaciaNombre) . '_' . date('Y-m-d_His') . '.pdf';



            // Enviar email con PDF adjunto

            Mail::send('emails.acta_farmacia',

                ['farmacia' => $farmaciaNombre],

                function ($message) use ($email, $pdf, $nombreArchivo) {

                    $message->to($email)

                            ->subject('Acta de Reunión - Control de Farmacia')

                            ->attachData($pdf->output(), $nombreArchivo, [

                                'mime' => 'application/pdf'

                            ]);

                }

            );



            return response()->json(['estado' => 'ok', 'mensaje' => 'Acta enviada correctamente al email de la farmacia']);

        } catch (\Exception $e) {

            return response()->json(['estado' => 'error', 'mensaje' => 'Error: ' . $e->getMessage()], 500);

        }

    }



    public function buscarProductosFarmacia(Request $request)

    {

        $query = Producto::select(

                'productos.*',

                'tipo_producto.nombre as tipo_producto',

                DB::raw("IFNULL(unidades_medidas.nombre, '') as unidad_medida"),

                DB::raw("IFNULL(marcas_productos.nombre, '') as marca")

            )

            ->join('tipo_producto', 'productos.id_tipo_producto', '=', 'tipo_producto.id')

            ->leftJoin('unidades_medidas', 'productos.id_unidad_medida', '=', 'unidades_medidas.id')

            ->leftJoin('marcas_productos', 'productos.id_marca', '=', 'marcas_productos.id');



        if (!empty($request->buscar)) {

            $termino = $request->buscar;

            $query->where(function ($q) use ($termino) {

                $q->where('productos.nombre', 'like', "%{$termino}%")

                  ->orWhere('productos.codigo_interno', 'like', "%{$termino}%")

                  ->orWhere('productos.descripcion', 'like', "%{$termino}%");

            });

        }



        if (!empty($request->tipo) && $request->tipo != '0') {

            $query->where('productos.id_tipo_producto', $request->tipo);

        }



        if (!empty($request->stock_estado)) {

            switch ($request->stock_estado) {

                case 'critico':

                    $query->whereRaw('productos.stock_actual <= productos.stock_minimo');

                    break;

                case 'bajo':

                    $query->whereRaw('productos.stock_actual > productos.stock_minimo')

                          ->whereRaw('productos.stock_actual <= (productos.stock_minimo * 1.5)');

                    break;

                case 'normal':

                    $query->whereRaw('productos.stock_actual > (productos.stock_minimo * 1.5)');

                    break;

            }

        }



        $productos = $query->orderBy('productos.nombre')->get();



        $totales = [

            'total'   => $productos->count(),

            'critico' => $productos->filter(fn($p) => $p->stock_actual <= $p->stock_minimo)->count(),

            'bajo'    => $productos->filter(fn($p) => $p->stock_actual > $p->stock_minimo && $p->stock_actual <= ($p->stock_minimo * 1.5))->count(),

            'normal'  => $productos->filter(fn($p) => $p->stock_actual > ($p->stock_minimo * 1.5))->count(),

        ];



        return response()->json([

            'estado'   => 1,

            'productos' => $productos,

            'totales'  => $totales,

        ]);

    }



    public function CargarControlLicencia()

    {

        return view('direccion_salud.escritorio_control_licencia')->with([]);

    }



    /* ========== CRUD FARMACIAS ========== */



    public function listarFarmacias(Request $request)

    {

        $query = Farmacia::with('lugarAtencion');



        if (!empty($request->buscar)) {

            $t = $request->buscar;

            $query->where(function ($q) use ($t) {

                $q->where('nombre', 'like', "%{$t}%")

                  ->orWhere('codigo', 'like', "%{$t}%")

                  ->orWhere('responsable', 'like', "%{$t}%");

            });

        }



        if (isset($request->estado) && $request->estado !== '') {

            $query->where('estado', $request->estado);

        }

        if (!empty($request->region)) {
            $query->where('id_region', $request->region);
        }

        if (!empty($request->ciudad)) {
            $query->where('id_ciudad', $request->ciudad);
        }



        $farmacias = $query->orderBy('nombre')->get()->map(function ($f) {
        return [
            'id'                => $f->id,
            'nombre'            => $f->nombre,
            'codigo'            => $f->codigo,
            'tipo'              => $f->tipo,
            'responsable'       => $f->responsable,
            'rut_responsable'   => $f->rut_responsable,
            'telefono'          => $f->telefono,
            'email'             => $f->email,
            'direccion'         => $f->direccion,
            'id_region'         => $f->id_region,
            'id_ciudad'         => $f->id_ciudad,
            'horario'           => $f->horario,
            'dias_atencion'     => $f->dias_atencion,
            'hora_entrada'      => $f->hora_entrada,
            'hora_salida'       => $f->hora_salida,
            'estado'            => $f->estado,
            'observaciones'     => $f->observaciones,
            'id_lugar_atencion' => $f->id_lugar_atencion,
            'lugar_atencion'    => $f->lugarAtencion ? $f->lugarAtencion->nombre : null,
            'created_at'        => $f->created_at,
        ];

        });



        return response()->json(['estado' => 1, 'farmacias' => $farmacias]);

    }


    public function cargarSubirBaseDatos(){

        return view('direccion_salud.cargar_base_datos')->with([]);
    }

    public function cargarControlCronicos(){
        $regiones = Region::all();
        return view('direccion_salud.escritorio_control_cronicos')->with([
            'regiones' => $regiones,
        ]);
    }

    public function listarCronicos(Request $request)
    {

        // Si se solicita agrupación, devolver conteos por patología y por región/ciudad
        $agrupar = $request->input('agrupar'); // 'region' | 'ciudad'

        if ($agrupar === 'region' || $agrupar === 'ciudad') {
            try {
                // Nested whereHas: pacientes cuya entidad Antecedentes tenga EnfermedadesCronicas
                $pacientesQuery = Paciente::whereHas('Antecedentes', function ($q) {
                    $q->whereHas('EnfermedadesCronicas');
                });

                if (!empty($request->region)) {
                    // Preferimos filtrar por direcciones cuyo ciudad pertenezca a la región
                    $ciudadesIds = Ciudad::where('id_region', $request->region)->pluck('id')->toArray();
                    if (count($ciudadesIds) > 0) {
                        $dirs = Direccion::whereIn('id_ciudad', $ciudadesIds)->pluck('id')->toArray();
                        if (count($dirs) > 0) {
                            $pacientesQuery->whereIn('id_direccion', $dirs);
                        } else {
                            // fallback a whereHas si no hay direcciones encontradas
                            $pacientesQuery->whereHas('Direccion', function($q) use ($request) {
                                $q->whereHas('Ciudad', function($q2) use ($request) { $q2->where('id_region', $request->region); });
                            });
                        }
                    } else {
                        // fallback directo a whereHas
                        $pacientesQuery->whereHas('Direccion', function($q) use ($request) {
                            $q->whereHas('Ciudad', function($q2) use ($request) { $q2->where('id_region', $request->region); });
                        });
                    }
                }
                if (!empty($request->ciudad)) {
                    // Filtrar pacientes por ciudad: buscamos direcciones con esa ciudad y filtramos por id_direccion
                    $dirs = Direccion::where('id_ciudad', $request->ciudad)->pluck('id')->toArray();
                    if (count($dirs) > 0) {
                        $pacientesQuery->whereIn('id_direccion', $dirs);
                    } else {
                        // fallback a whereHas anidado
                        $pacientesQuery->whereHas('Direccion', function($q) use ($request) {
                            $q->whereHas('Ciudad', function($q2) use ($request) { $q2->where('id', $request->ciudad); });
                        });
                    }
                }

                $pacientes = $pacientesQuery->with(['Antecedentes.EnfermedadesCronicas', 'Direccion.Ciudad'])->get();

                // Contar pacientes únicos por (enfermedad, área)
                $map = [];
                foreach ($pacientes as $p) {
                    // Determinar id de área (region o ciudad) a partir de Paciente->Direccion->Ciudad
                    $areaId = null;
                    // Soporte para Collection/objeto u array
                    $dir = is_array($p) ? ($p['Direccion'] ?? $p['direccion'] ?? null) : ($p->Direccion ?? null);
                    $ciudad = null;
                    if (is_array($dir)) {
                        $ciudad = $dir['Ciudad'] ?? $dir['ciudad'] ?? null;
                    } else {
                        $ciudad = $dir ? ($dir->Ciudad ?? $dir->ciudad ?? null) : null;
                    }
                    if ($ciudad) {
                        if (is_array($ciudad)) {
                            $cityId = $ciudad['id'] ?? ($ciudad['Id'] ?? null);
                            $cityRegion = $ciudad['id_region'] ?? null;
                        } else {
                            $cityId = $ciudad->id ?? ($ciudad->Id ?? null);
                            $cityRegion = $ciudad->id_region ?? null;
                        }
                        if ($agrupar === 'region') {
                            $areaId = $cityRegion ?? null;
                        } else {
                            $areaId = $cityId ?? null;
                        }
                    }

                    // Obtener el nodo de antecedentes (puede venir como 'antecedentes' array u objeto, o 'Antecedentes')
                    $ante = null;
                    if (is_array($p)) {
                        $ante = $p['antecedentes'] ?? $p['Antecedentes'] ?? null;
                    } else {
                        $ante = $p->antecedentes ?? $p->Antecedentes ?? null;
                    }
                    if (!$ante) continue;

                    // Obtener lista de enfermedades: soportar 'EnfermedadesCronicas', 'enfermedades_cronicas', etc.
                    $diseases = null;
                    if (is_array($ante)) {
                        $diseases = $ante['enfermedades_cronicas'] ?? $ante['EnfermedadesCronicas'] ?? $ante['enfermedadesCronicas'] ?? null;
                    } else {
                        // $ante puede ser una Collection u objeto Eloquent
                        $diseases = $ante->EnfermedadesCronicas ?? $ante->enfermedades_cronicas ?? null;
                    }
                    if (!$diseases) continue;

                    foreach ($diseases as $ec) {
                        // Extraer id y nombre robustamente (array u objeto, diferentes claves)
                        $ecId = null;
                        $ecName = null;
                        if (is_array($ec)) {
                            $ecId = $ec['id'] ?? $ec['Id'] ?? null;
                            $ecName = $ec['nombre'] ?? $ec['Nombre'] ?? $ec['nombre_enfermedad_cronica'] ?? null;
                        } else {
                            $ecId = $ec->id ?? $ec->Id ?? null;
                            $ecName = $ec->nombre ?? $ec->Nombre ?? $ec->nombre_enfermedad_cronica ?? null;
                        }
                        if (!$ecId) continue;

                        $patientId = $p->id ?? ($p['id'] ?? null);
                        if (!$patientId) continue;

                        $key = $ecId . '|' . ($areaId ?? '0');
                        if (!isset($map[$key])) {
                            $map[$key] = [
                                'enfermedad_id' => $ecId,
                                'enfermedad_nombre' => $ecName ?? null,
                                'area_id' => $areaId,
                                'pacientes_set' => []
                            ];
                        }
                        $map[$key]['pacientes_set'][$patientId] = true;
                    }
                }

                $results = [];
                foreach ($map as $entry) {
                    $areaName = null;
                    if ($agrupar === 'region') {
                        $reg = $entry['area_id'] ? Region::find($entry['area_id']) : null;
                        $areaName = $reg ? $reg->nombre : null;
                    } else {
                        $ci = $entry['area_id'] ? Ciudad::find($entry['area_id']) : null;
                        $areaName = $ci ? $ci->nombre : null;
                    }

                    $results[] = [
                        'enfermedad_id' => $entry['enfermedad_id'],
                        'enfermedad_nombre' => $entry['enfermedad_nombre'],
                        'area_id' => $entry['area_id'],
                        'area_nombre' => $areaName,
                        'pacientes' => count($entry['pacientes_set']),
                    ];
                }

                // Si no hay resultados construidos usando relaciones Eloquent,
                // intentar un fallback usando AntecedenteController::verRegistros
                // (usa conversiones/formatos alternativos como MedicamentoUsoCronicoGeneral)
                if (empty($results)) {
                    try {
                        $anteController = new AntecedenteController();
                        $resp = $anteController->verRegistros($request);
                        $content = $resp->getContent();
                        $dataRegs = json_decode($content, true);
                        if (is_array($dataRegs) && isset($dataRegs['registros'])) {
                            // recolectar direcciones en batch
                            $ids_dir = [];
                            foreach ($dataRegs['registros'] as $reg) {
                                $pac = $reg['paciente'] ?? null;
                                if (!$pac) continue;
                                $id_dir = is_array($pac) ? ($pac['id_direccion'] ?? null) : ($pac->id_direccion ?? null);
                                if ($id_dir) $ids_dir[] = $id_dir;
                            }
                            $ids_dir = array_values(array_unique($ids_dir));
                            $direcciones = [];
                            if (count($ids_dir) > 0) {
                                $dirs = Direccion::with('Ciudad')->whereIn('id', $ids_dir)->get();
                                foreach ($dirs as $d) { $direcciones[$d->id] = $d; }
                            }

                            $map2 = [];
                            foreach ($dataRegs['registros'] as $reg) {
                                $pac = $reg['paciente'] ?? null;
                                if (!$pac) continue;
                                $id_dir = is_array($pac) ? ($pac['id_direccion'] ?? null) : ($pac->id_direccion ?? null);

                                // determinar areaId según agrupar
                                $areaId = null;
                                if ($id_dir && isset($direcciones[$id_dir]) && $direcciones[$id_dir]->Ciudad) {
                                    $city = $direcciones[$id_dir]->Ciudad;
                                    $areaId = ($agrupar === 'region') ? ($city->id_region ?? null) : ($city->id ?? null);
                                }

                                // identificar enfermedad en el registro
                                $ecId = null; $ecName = null;
                                // registros pueden tener 'antecedente_data' o 'enfermedad_nombre' u otros
                                if (isset($reg['antecedente_data'])) {
                                    $ad = $reg['antecedente_data'];
                                    if (is_array($ad)) {
                                        $ecId = $ad['id'] ?? null;
                                        $ecName = $ad['nombre'] ?? $ad['Nombre'] ?? null;
                                    } else {
                                        $ecId = $ad->id ?? null;
                                        $ecName = $ad->nombre ?? null;
                                    }
                                }
                                if (!$ecId && isset($reg['enfermedad_id'])) { $ecId = $reg['enfermedad_id']; }
                                if (!$ecName && isset($reg['enfermedad_nombre'])) { $ecName = $reg['enfermedad_nombre']; }

                                // si sigue sin id, intentar extraer de descripcion
                                if (!$ecId && !$ecName && isset($reg['descripcion'])) { $ecName = substr($reg['descripcion'], 0, 80); }

                                if (!$ecId && !$ecName) continue;

                                $patientId = is_array($pac) ? ($pac['id'] ?? null) : ($pac->id ?? null);
                                if (!$patientId) continue;

                                $key = ($ecId ?? $ecName) . '|' . ($areaId ?? '0');
                                if (!isset($map2[$key])) {
                                    $map2[$key] = [
                                        'enfermedad_id' => $ecId,
                                        'enfermedad_nombre' => $ecName,
                                        'area_id' => $areaId,
                                        'pacientes_set' => []
                                    ];
                                }
                                $map2[$key]['pacientes_set'][$patientId] = true;
                            }

                            foreach ($map2 as $entry) {
                                $areaName = null;
                                if ($agrupar === 'region') {
                                    $regm = $entry['area_id'] ? Region::find($entry['area_id']) : null;
                                    $areaName = $regm ? $regm->nombre : null;
                                } else {
                                    $cim = $entry['area_id'] ? Ciudad::find($entry['area_id']) : null;
                                    $areaName = $cim ? $cim->nombre : null;
                                }
                                $results[] = [
                                    'enfermedad_id' => $entry['enfermedad_id'],
                                    'enfermedad_nombre' => $entry['enfermedad_nombre'],
                                    'area_id' => $entry['area_id'],
                                    'area_nombre' => $areaName,
                                    'pacientes' => count($entry['pacientes_set']),
                                ];
                            }
                        }
                    } catch (Exception $e) {
                        Log::warning('listarCronicos fallback verRegistros error: ' . $e->getMessage());
                    }
                }

                return response()->json(['estado' => 1, 'agrupado_por' => $agrupar, 'datos' => $results]);
            } catch (Exception $e) {
                Log::error('listarCronicos agrupar error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString(), 'request' => $request->all()]);
                return response()->json(['estado' => 0, 'mensaje' => 'Error al generar estadísticas', 'error' => $e->getMessage()], 500);
            }
        }

        // Reutilizar la lógica existente en AntecedenteController::verRegistros
        // Si el request incluye `region` o `ciudad`, filtramos los registros devueltos
        $anteController = new AntecedenteController();
        $response = $anteController->verRegistros($request);

        // Normalizar contenido a array asociativo
        $content = $response->getContent();
        $data = json_decode($content, true);

        if (is_array($data) && isset($data['registros']) && ( !empty($request->region) || !empty($request->ciudad) )) {
            // Recolectar id_direccion de los pacientes y obtener direcciones + ciudad en batch
            $ids_dir = [];
            foreach ($data['registros'] as $reg) {
                $pac = $reg['paciente'] ?? null;
                if (!$pac) continue;
                $id_dir = is_array($pac) ? ($pac['id_direccion'] ?? null) : ($pac->id_direccion ?? null);
                if ($id_dir) $ids_dir[] = $id_dir;
            }
            $ids_dir = array_values(array_unique($ids_dir));
            $direcciones = [];
            if (count($ids_dir) > 0) {
                $dirs = \App\Models\Direccion::with('Ciudad')->whereIn('id', $ids_dir)->get();
                foreach ($dirs as $d) { $direcciones[$d->id] = $d; }
            }

            $filtered = [];
            foreach ($data['registros'] as $reg) {
                $pac = $reg['paciente'] ?? null;
                if (!$pac) continue;
                $id_dir = is_array($pac) ? ($pac['id_direccion'] ?? null) : ($pac->id_direccion ?? null);

                $matchRegion = true;
                $matchCiudad = true;

                if (!empty($request->region)) {
                    // si hay direccion conocida y ciudad relacionada
                    if ($id_dir && isset($direcciones[$id_dir]) && $direcciones[$id_dir]->Ciudad) {
                        $matchRegion = (string)($direcciones[$id_dir]->Ciudad->id_region ?? '') === (string)$request->region;
                    } else {
                        $matchRegion = false;
                    }
                }
                if (!empty($request->ciudad)) {
                    if ($id_dir && isset($direcciones[$id_dir]) && $direcciones[$id_dir]->Ciudad) {
                        $matchCiudad = (string)($direcciones[$id_dir]->Ciudad->id ?? '') === (string)$request->ciudad;
                    } else {
                        $matchCiudad = false;
                    }
                }

                if ($matchRegion && $matchCiudad) {
                    $filtered[] = $reg;
                }
            }

            $data['registros'] = array_values($filtered);
            $data['cantidad_registros'] = count($data['registros']);
            $data['estado'] = count($data['registros']) ? 1 : 0;
            if ($data['estado'] === 0) {
                $data['msg'] = 'Sin registros';
            }
        }

        return response()->json($data);
    }

    public function cargarSubirListaEspera (){
        return view('direccion_salud.publicar_lista_espera')->with([]);
    }

    public function listarMedicamentos(Request $request)
    {
        $agrupar = $request->input('agrupar'); // 'region' | 'ciudad' or null

        // Si se solicita agrupación por región o ciudad, recolectar y agrupar
        if ($agrupar === 'region' || $agrupar === 'ciudad') {
            try {
                // Construir query base para medicamentos
                $q = MedicamentoUsoCronicoGeneral::query();

                // Si se filtra territorialmente, limitar a pacientes de esa área
                if (!empty($request->region) || !empty($request->ciudad)) {
                    $pacientesQuery = Paciente::query();

                    if (!empty($request->region)) {
                        $ciudadesIds = Ciudad::where('id_region', $request->region)->pluck('id')->toArray();
                        if (count($ciudadesIds) > 0) {
                            $dirs = Direccion::whereIn('id_ciudad', $ciudadesIds)->pluck('id')->toArray();
                            if (count($dirs) > 0) {
                                $pacientesQuery->whereIn('id_direccion', $dirs);
                            } else {
                                $pacientesQuery->whereHas('Direccion', function ($q2) use ($request) {
                                    $q2->whereHas('Ciudad', function ($q3) use ($request) {
                                        $q3->where('id_region', $request->region);
                                    });
                                });
                            }
                        } else {
                            $pacientesQuery->whereHas('Direccion', function ($q2) use ($request) {
                                $q2->whereHas('Ciudad', function ($q3) use ($request) {
                                    $q3->where('id_region', $request->region);
                                });
                            });
                        }
                    }

                    if (!empty($request->ciudad)) {
                        $dirs = Direccion::where('id_ciudad', $request->ciudad)->pluck('id')->toArray();
                        if (count($dirs) > 0) {
                            $pacientesQuery->whereIn('id_direccion', $dirs);
                        } else {
                            $pacientesQuery->whereHas('Direccion', function ($q2) use ($request) {
                                $q2->whereHas('Ciudad', function ($q3) use ($request) {
                                    $q3->where('id', $request->ciudad);
                                });
                            });
                        }
                    }

                    $patientIds = $pacientesQuery->pluck('id')->toArray();
                    if (empty($patientIds)) {
                        return response()->json(['estado' => 0, 'msj' => 'Sin registros', 'datos' => []]);
                    }
                    $q->whereIn('id_paciente', $patientIds);
                }

                // filtros comunes
                if (!empty($request->nombre_medicamento)) {
                    $q->where('nombre_medicamento', 'like', $request->nombre_medicamento . '%');
                }
                if (!empty($request->cliente)) {
                    $q->where('cliente', $request->cliente);
                }
                if (!empty($request->tipo_enfermedad)) {
                    $q->where('tipo_enfermedad', $request->tipo_enfermedad);
                }
                if (!empty($request->estado)) {
                    $q->where('estado', $request->estado);
                }

                $medicamentos = $q->get();

                if ($medicamentos->count() === 0) {
                    return response()->json(['estado' => 0, 'msj' => 'Sin registros', 'datos' => []]);
                }

                // Obtener ids de pacientes referenciados por estos registros
                $patientIds = $medicamentos->pluck('id_paciente')->unique()->filter()->values()->all();
                $pacientes = Paciente::with(['Direccion.Ciudad'])->whereIn('id', $patientIds)->get()->keyBy('id');

                // Función auxiliar para extraer número desde campo 'cantidad'
                $parseCantidad = function ($texto) {
                    if ($texto === null) return 0;
                    // Buscar primer número (entero o decimal con , o .)
                    if (preg_match('/([0-9]+(?:[\.,][0-9]+)?)/', $texto, $m)) {
                        $num = $m[1];
                        $num = str_replace(',', '.', $num);
                        return floatval($num);
                    }
                    // Si no encontramos número, contar como 1 (registro)
                    return 1;
                };

                $map = [];
                foreach ($medicamentos as $rec) {
                    $areaId = null;
                    $p = $pacientes->get($rec->id_paciente);
                    if ($p && $p->Direccion && $p->Direccion->Ciudad) {
                        if ($agrupar === 'region') $areaId = $p->Direccion->Ciudad->id_region ?? null;
                        else $areaId = $p->Direccion->Ciudad->id ?? null;
                    }

                    $medName = trim(strtoupper($rec->nombre_medicamento ?? 'NO ESPECIFICADO'));
                    $cantidadVal = $parseCantidad($rec->cantidad ?? null);

                    $key = $medName . '|' . ($areaId ?? '0');
                    if (!isset($map[$key])) {
                        $map[$key] = [
                            'medicamento' => $medName,
                            'area_id' => $areaId,
                            'suma_cantidad' => 0,
                            'registros' => 0,
                            'pacientes_set' => [],
                        ];
                    }
                    $map[$key]['suma_cantidad'] += $cantidadVal;
                    $map[$key]['registros'] += 1;
                    if ($rec->id_paciente) $map[$key]['pacientes_set'][$rec->id_paciente] = true;
                }

                $results = [];
                foreach ($map as $entry) {
                    $areaName = null;
                    if ($entry['area_id']) {
                        if ($agrupar === 'region') {
                            $reg = Region::find($entry['area_id']);
                            $areaName = $reg ? $reg->nombre : null;
                        } else {
                            $ci = Ciudad::find($entry['area_id']);
                            $areaName = $ci ? $ci->nombre : null;
                        }
                    }
                    $results[] = [
                        'medicamento' => $entry['medicamento'],
                        'area_id' => $entry['area_id'],
                        'area_nombre' => $areaName,
                        'suma_cantidad' => $entry['suma_cantidad'],
                        'registros' => $entry['registros'],
                        'pacientes' => count($entry['pacientes_set']),
                    ];
                }

                return response()->json(['estado' => 1, 'agrupado_por' => $agrupar, 'datos' => $results]);
            } catch (\Throwable $e) {
                return response()->json(['estado' => 0, 'msj' => 'Error al agrupar medicamentos', 'error' => $e->getMessage()], 500);
            }
        }

        // Si no se solicita agrupación, mantener comportamiento previo: usar filtros territoriales si se envían, sino delegar a getRegsitros
        // Si se especifica region o ciudad, mantener la búsqueda por pacientes (sin agrupar)
        if (!empty($request->region) || !empty($request->ciudad)) {
            try {
                $pacientesQuery = Paciente::query();

                if (!empty($request->region)) {
                    $ciudadesIds = Ciudad::where('id_region', $request->region)->pluck('id')->toArray();
                    if (count($ciudadesIds) > 0) {
                        $dirs = Direccion::whereIn('id_ciudad', $ciudadesIds)->pluck('id')->toArray();
                        if (count($dirs) > 0) {
                            $pacientesQuery->whereIn('id_direccion', $dirs);
                        } else {
                            $pacientesQuery->whereHas('Direccion', function ($q) use ($request) {
                                $q->whereHas('Ciudad', function ($q2) use ($request) {
                                    $q2->where('id_region', $request->region);
                                });
                            });
                        }
                    } else {
                        $pacientesQuery->whereHas('Direccion', function ($q) use ($request) {
                            $q->whereHas('Ciudad', function ($q2) use ($request) {
                                $q2->where('id_region', $request->region);
                            });
                        });
                    }
                }

                if (!empty($request->ciudad)) {
                    $dirs = Direccion::where('id_ciudad', $request->ciudad)->pluck('id')->toArray();
                    if (count($dirs) > 0) {
                        $pacientesQuery->whereIn('id_direccion', $dirs);
                    } else {
                        $pacientesQuery->whereHas('Direccion', function ($q) use ($request) {
                            $q->whereHas('Ciudad', function ($q2) use ($request) {
                                $q2->where('id', $request->ciudad);
                            });
                        });
                    }
                }

                $patientIds = $pacientesQuery->pluck('id')->toArray();

                if (empty($patientIds)) {
                    return response()->json(['estado' => 0, 'msj' => 'Sin registros', 'registros' => []]);
                }

                // Construir consulta sobre MedicamentoUsoCronicoGeneral (mismo comportamiento de getRegsitros)
                $q = MedicamentoUsoCronicoGeneral::whereIn('id_paciente', $patientIds);

                if (!empty($request->nombre_medicamento)) {
                    $q->where('nombre_medicamento', 'like', $request->nombre_medicamento . '%');
                }

                if (!empty($request->cantidad)) {
                    $q->where('cantidad', $request->cantidad);
                }

                if (!empty($request->cliente)) {
                    $q->where('cliente', $request->cliente);
                }

                if (!empty($request->tipo_enfermedad)) {
                    $q->where('tipo_enfermedad', $request->tipo_enfermedad);
                }

                if (!empty($request->estado)) {
                    $q->where('estado', $request->estado);
                }

                $medicamentos = $q->get();

                return response()->json([
                    'estado' => $medicamentos->count() ? 1 : 0,
                    'msj' => $medicamentos->count() ? 'registros' : 'Sin registros',
                    'registros' => $medicamentos,
                    'cantidad_registros' => $medicamentos->count(),
                ]);
            } catch (\Throwable $e) {
                return response()->json(['estado' => 0, 'msj' => 'Error al listar medicamentos', 'error' => $e->getMessage()], 500);
            }
        }

        // Si no hay filtros territoriales y no se solicita agrupación, reutilizar getRegsitros tal cual
        $medController = new MedicamentoUsoCronicoGeneralController();
        $resp = $medController->getRegsitros($request);
        return response()->json($resp);
    }

    public function registrarFarmacia(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'nombre' => 'required|string|max:255',

            'codigo' => 'nullable|string|max:50|unique:farmacias,codigo',

            'tipo'   => 'nullable|string|max:100',

            'email'  => 'nullable|email|max:255',

        ]);



        if ($validator->fails()) {

            return response()->json(['estado' => 0, 'errores' => $validator->errors()], 422);

        }



        $farmacia = Farmacia::create([

            'nombre'                 => $request->nombre,

            'codigo'                 => $request->codigo ?: null,

            'id_lugar_atencion'      => $request->id_lugar_atencion ?: null,

            'tipo'                   => $request->tipo ?: null,

            'responsable'            => $request->responsable ?: null,

            'rut_responsable'        => $request->rut_responsable ?: null,

            'telefono'               => $request->telefono ?: null,

            'email'                  => $request->email ?: null,

            'direccion'              => $request->direccion ?: null,

            'id_region'              => $request->id_region ?: null,

            'id_ciudad'              => $request->id_ciudad ?: null,

            'horario'                => $request->horario ?: null,

            'dias_atencion'          => $request->dias_atencion ?: null,

            'hora_entrada'           => $request->hora_entrada ?: null,

            'hora_salida'            => $request->hora_salida ?: null,

            'estado'                 => 1,

            'observaciones'          => $request->observaciones ?: null,

        ]);



        return response()->json(['estado' => 1, 'msj' => 'Farmacia registrada correctamente.', 'farmacia' => $farmacia]);

    }



    public function actualizarFarmacia(Request $request, $id)

    {

        $farmacia = Farmacia::find($id);

        if (!$farmacia) {

            return response()->json(['estado' => 0, 'msj' => 'Farmacia no encontrada.'], 404);

        }



        $validator = Validator::make($request->all(), [

            'nombre' => 'required|string|max:255',

            'codigo' => 'nullable|string|max:50|unique:farmacias,codigo,' . $id,

            'tipo'   => 'nullable|string|max:100',

            'email'  => 'nullable|email|max:255',

        ]);



        if ($validator->fails()) {

            return response()->json(['estado' => 0, 'errores' => $validator->errors()], 422);

        }



        $farmacia->update([

            'nombre'                 => $request->nombre,

            'codigo'                 => $request->codigo ?: null,

            'id_lugar_atencion'      => $request->id_lugar_atencion ?: null,

            'tipo'                   => $request->tipo ?: null,

            'responsable'            => $request->responsable ?: null,

            'rut_responsable'        => $request->rut_responsable ?: null,

            'telefono'               => $request->telefono ?: null,

            'email'                  => $request->email ?: null,

            'direccion'              => $request->direccion ?: null,

            'id_region'              => $request->id_region ?: null,

            'id_ciudad'              => $request->id_ciudad ?: null,

            'horario'                => $request->horario ?: null,

            'dias_atencion'          => $request->dias_atencion ?: null,

            'hora_entrada'           => $request->hora_entrada ?: null,

            'hora_salida'            => $request->hora_salida ?: null,

            'estado'                 => $request->has('estado') ? (int)$request->estado : $farmacia->estado,

            'observaciones'          => $request->observaciones ?: null,

        ]);



        return response()->json(['estado' => 1, 'msj' => 'Farmacia actualizada correctamente.']);

    }



    public function eliminarFarmacia($id)

    {

        $farmacia = Farmacia::find($id);

        if (!$farmacia) {

            return response()->json(['estado' => 0, 'msj' => 'Farmacia no encontrada.'], 404);

        }

        $farmacia->delete();

        return response()->json(['estado' => 1, 'msj' => 'Farmacia eliminada correctamente.']);

    }



    public function difusionComunicados(Request $req){

        return $req;

    }



    public function comunicados()

    {

        $profesionales = Profesional::all();

        $pacientes = Paciente::all();

        $directores_cm = Instituciones::select('instituciones.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')

                                        ->join('profesionales','instituciones.id_director_medico','profesionales.id')

                                        ->get();



        $laboratorios = Instituciones::where('id_tipo_institucion', 3)->get();

        return view('direccion_salud.escritorio_comunicados')->with([

            'adm_medico' => false,

            'lista_profesionales' => $profesionales,

            'lista_pacientes' => $pacientes,

            'lista_directores_cm' => $directores_cm,

            'lista_laboratorios' => $laboratorios,

        ]);

    }



    public function cargarSubirBaseMedicos()

    {

        return view('direccion_salud.subir_base_medicos');

    }



    public function cargarListaEspera()

    {

        return view('direccion_salud.lista_espera');

    }



    public function cargarEstadisticasCronicos()

    {

        return view('direccion_salud.estadisticas_cronicos');

    }



    public function mensajeDifusionMinisterio(Request $request){

        $datos = array();

        $error = array();

        $valido = 1;



        if(empty($request->mensaje))

        {

            $error['mensaje'] = 'campo requerido';

            $valido = 0;

        }



        if($valido)

        {

            $datos['estado'] = 1;

            $datos['msj'] = 'mensaje enviado';

        }

        else

        {

            $datos['estado'] = 0;

            $datos['msj'] = 'Campos requeridos';

            $datos['error'] = $error;

        }

        // retornar a la vista anterior con mensaje

        return redirect()->back()->with($datos);

    }



     public function conectfarma()

    {

        $farmacias = Farmacia::all();

        $lugares_atencion = LugarAtencion::orderBy('nombre')->get();

        $regiones = Region::all();

        return view('direccion_salud.conect_farmacia')->with([

            'farmacias' => $farmacias,

            'lugares_atencion' => $lugares_atencion,

            'regiones' => $regiones

        ]);

    }



    public function cargarNotificacionesSnss()

    {

        return view('direccion_salud.escritorio_notificaciones_snss')->with([]);

    }

    public function guardarNotificacionesSnss(Request $request)

    {
        // Validación mínima
        $validator = Validator::make($request->all(), [
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['estado' => 0, 'errores' => $validator->errors()], 422);
        }

        // Obtener correos destino (desde el formulario: destinatarios_emails[])
        $dest_emails = $request->input('destinatarios_emails', []);
        if (!is_array($dest_emails)) {
            $dest_emails = [$dest_emails];
        }
        $dest_emails = array_filter(array_map('trim', $dest_emails));

        // HARDCODE para pruebas: enviar siempre a esta dirección
        $dest_emails = ['francisco.rojo.gallardo@gmail.com'];

        // Guardar archivos temporalmente en disco 'public' (storage/app/public/notificaciones)
        $attachments = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            if (!is_array($files)) $files = [$files];
            foreach ($files as $f) {
                if ($f && $f->isValid()) {
                    // almacenar en disco public
                    $stored = $f->store('notificaciones', 'public');
                    if ($stored) {
                        $attachments[] = [
                            'path' => storage_path('app/public/' . $stored),
                            'name' => $f->getClientOriginalName(),
                            'mime' => $f->getClientMimeType() ?: $f->getClientOriginalExtension()
                        ];
                    }
                }
            }
        }

        // Preparar parámetros para SendMailController::envioCorreo
        $blade = 'plantilla-correo-electronico';
        $to = [];
        foreach ($dest_emails as $email) {
            $to[] = ['email' => $email, 'name' => ''];
        }
        $cc = [];
        $bcc = [];
        $asunto = $request->input('asunto');

        // Armar body que será pasado a la vista del correo
        $body = [
            'mensaje' => $request->input('mensaje'),
            'tipo_notificacion' => $request->input('tipo_notificacion'),
            'numero_resolucion' => $request->input('numero_resolucion'),
            'fecha' => $request->input('fecha'),
            'remitente' => $request->input('remitente')
        ];



        // Convertir adjuntos al formato esperado por SendMailController (url + mime)
        $archivo = '';
        if (count($attachments) > 0) {
            $archivo = [];
            foreach ($attachments as $att) {
                // enviar la ruta de archivo físico a la clase de correo
                $archivo[] = ['url' => $att['path'], 'mime' => $att['mime']];
            }
        }

        try {
            $result_mail = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, '');

            // si hay fallo, lo registramos en logs
            if (isset($result_mail['estado']) && $result_mail['estado'] == 0) {
                return response()->json(['estado' => 0, 'mensaje' => 'Error al enviar notificación: ' . ($result_mail['mensaje'] ?? 'Error desconocido')], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['estado' => 0, 'mensaje' => 'Excepción al enviar notificación: ' . $e->getMessage()], 500);
        }

        // limpiar archivos temporales
        foreach ($attachments as $att) {
            try {
                if (file_exists($att['path'])) @unlink($att['path']);
            } catch (\Exception $e) {}
        }

        return response()->json(['estado' => 1, 'mensaje' => 'Notificación enviada', 'destinos' => $dest_emails, 'adjuntos_count' => count($attachments)]);


    }




    public function cargarControlBonosFonasa()
    {
        $regiones = Region::all();
        return view('direccion_salud.escritorio_control_bonos_fonasa')->with([
            'regiones' => $regiones,
        ]);
    }



    public function listarBonosFonasa(Request $request)
    {
        // Buscar IDs de previsión cuyo nombre contenga "FONASA"
        $ids_fonasa = Prevision::where('nombre', 'like', '%fonasa%')->pluck('id');
        $query = Bono::with(['Paciente', 'Profesional', 'TipoBono', 'Convenio'])
            ->whereIn('convenio', $ids_fonasa)
            ->orderByDesc('id');

        if (!empty($request->fecha_desde)) {
            $query->whereDate('fecha_atencion', '>=', $request->fecha_desde);
        }

        if (!empty($request->fecha_hasta)) {
            $query->whereDate('fecha_atencion', '<=', $request->fecha_hasta);
        }

        if (!empty($request->buscar)) {
            $b = $request->buscar;
            $query->where(function ($q) use ($b) {
                $q->where('numero_bono', 'like', "%{$b}%")
                  ->orWhere('numero_boleta', 'like', "%{$b}%")
                  ->orWhere('glosa', 'like', "%{$b}%")
                  ->orWhereHas('Paciente', function ($qp) use ($b) {
                      $qp->where('nombres', 'like', "%{$b}%")
                         ->orWhere('apellido_uno', 'like', "%{$b}%")
                         ->orWhere('rut', 'like', "%{$b}%");
                  });
            });
        }

        $bonos = $query->get()->map(function ($b) {
            return [
                'id'             => $b->id,
                'numero_bono'    => $b->numero_bono,
                'numero_boleta'  => $b->numero_boleta,
                'fecha_atencion' => $b->fecha_atencion
                                    ? \Carbon\Carbon::parse($b->fecha_atencion)->format('d/m/Y H:i')
                                    : '—',
                'valor_atencion' => $b->valor_atencion,
                'a_pagar'        => $b->a_pagar,
                'bonificacion'   => $b->bonificacion,
                'aporte_seguro'  => $b->aporte_seguro,
                'glosa'          => $b->glosa,
                'rendido'        => $b->rendido,
                'convenio_nombre' => $b->Convenio ? $b->Convenio->nombre : '—',
                'tipo_bono'      => $b->TipoBono ? $b->TipoBono->nombre : '—',
                'paciente_nombre' => $b->Paciente
                                    ? $b->Paciente->nombres . ' ' . $b->Paciente->apellido_uno . ' ' . $b->Paciente->apellido_dos
                                    : '—',
                'paciente_rut'   => $b->Paciente ? $b->Paciente->rut : '—',
                'profesional_nombre' => $b->Profesional
                                    ? $b->Profesional->nombre . ' ' . $b->Profesional->apellido_uno . ' ' . $b->Profesional->apellido_dos
                                    : '—',
            ];
        });



        return response()->json(['estado' => 1, 'bonos' => $bonos]);

    }



    public function cargarControlLaboratorios()

    {
        $regiones = Region::all();
        return view('direccion_salud.escritorio_control_laboratorios')->with([
            'regiones' => $regiones,
        ]);

    }



    public function listarLaboratorios(Request $request)

    {

        $query = Laboratorio::with(['Direccion.Ciudad']);



        if (!empty($request->buscar)) {

            $t = $request->buscar;

            $query->where(function ($q) use ($t) {

                $q->where('nombre', 'like', "%{$t}%")

                  ->orWhere('rut', 'like', "%{$t}%")

                  ->orWhere('email', 'like', "%{$t}%");

            });

        }

        if(isset($request->estado) && $request->estado !== '') {

            $query->where('estado', $request->estado);

        }

        if($request->region){
            $query->whereHas('Direccion.Ciudad', function($q) use ($request) {

                $q->where('id_region', $request->region);

            });
        }

            if($request->ciudad){
                $query->whereHas('Direccion.Ciudad', function($q) use ($request) {

                    $q->where('id', $request->ciudad);

                });
            }



        $laboratorios = $query->orderBy('nombre')->get()->map(function ($lab) {

            return [

                'id'          => $lab->id,

                'nombre'      => $lab->nombre,

                'rut'         => $lab->rut,

                'email'       => $lab->email,

                'telefono'    => $lab->telefono,

                'direccion'   => $lab->Direccion->direccion ?? null,

                'numero_dir'  => $lab->Direccion->numero_dir ?? null,

                'ciudad'      => $lab->Direccion->Ciudad->nombre ?? null,

                'id_direccion' => $lab->id_direccion,

            ];

        });



        return response()->json([

            'estado'       => 1,

            'laboratorios' => $laboratorios,

        ]);

    }



    public function actualizarLaboratorio(Request $request, $id)

    {

        $validator = Validator::make($request->all(), [

            'nombre'   => 'required|string|max:255',

            'rut'      => 'required|string|max:20',

            'email'    => 'required|email|max:255',

            'telefono' => 'required|string|max:20',

        ]);



        if ($validator->fails()) {

            return response()->json([

                'estado'  => 0,

                'errores' => $validator->errors(),

            ], 422);

        }



        $lab = Laboratorio::findOrFail($id);

        $lab->nombre   = $request->nombre;

        $lab->rut      = $request->rut;

        $lab->email    = $request->email;

        $lab->telefono = $request->telefono;

        $lab->save();



        if ($lab->id_direccion && ($request->filled('direccion') || $request->filled('numero_dir'))) {

            Direccion::where('id', $lab->id_direccion)->update([

                'direccion'  => $request->direccion  ?? '',

                'numero_dir' => $request->numero_dir ?? '',

            ]);

        }



        return response()->json([

            'estado' => 1,

            'msj'    => 'Laboratorio actualizado correctamente.',

        ]);

    }



    public function guardarControlLaboratorio(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'laboratorio_nombre' => 'required|string|max:255',

            'fecha'              => 'required|date',

            'acta'               => 'required|string',

        ]);



        if ($validator->fails()) {

            return response()->json(['estado' => 'error', 'mensaje' => $validator->errors()->first()], 422);

        }



        $control = ControlLaboratorio::create([

            'id_laboratorio'       => $request->id_laboratorio ?: null,

            'laboratorio_nombre'   => $request->laboratorio_nombre,

            'fecha'                => $request->fecha,

            'hora_inicio'          => $request->hora_inicio ?: null,

            'hora_termino'         => $request->hora_termino ?: null,

            'tipo'                 => $request->tipo ?? 'control_stock',

            'responsable'          => $request->responsable,

            'enlace_jitsi'         => $request->enlace_jitsi,

            'estado'               => $request->estado ?? 'finalizada',

            'acta'                 => $request->acta,

            'productos_verificados'=> $request->productos_verificados,

        ]);



        return response()->json(['estado' => 'ok', 'id_control_laboratorio' => $control->id, 'mensaje' => 'Control de laboratorio registrado correctamente.']);

    }



    public function enviarActaEmailLaboratorio(Request $request)

    {

        try {

            $idControl = $request->id_control_laboratorio;

            $laboratorioNombre = $request->laboratorio_nombre;

            $htmlPdf = $request->html_pdf;



            $control = ControlLaboratorio::with('laboratorio')->find($idControl);

            if (!$control) {

                return response()->json(['estado' => 'error', 'mensaje' => 'Control de laboratorio no encontrado'], 404);

            }



            $laboratorio = $control->laboratorio;

            $email = $laboratorio->email ?? null;



            if (!$email) {

                return response()->json(['estado' => 'error', 'mensaje' => 'El laboratorio no tiene email registrado'], 422);

            }



            $pdf = Pdf::loadHTML($htmlPdf);

            $nombreArchivo = 'Acta_Reunion_Lab_' . str_replace(' ', '_', $laboratorioNombre) . '_' . date('Y-m-d_His') . '.pdf';



            Mail::send('emails.acta_laboratorio',

                ['laboratorio' => $laboratorioNombre],

                function ($message) use ($email, $pdf, $nombreArchivo) {

                    $message->to($email)

                            ->subject('Acta de Reunión - Control de Laboratorio')

                            ->attachData($pdf->output(), $nombreArchivo, [

                                'mime' => 'application/pdf'

                            ]);

                }

            );



            return response()->json(['estado' => 'ok', 'mensaje' => 'Acta enviada correctamente al email del laboratorio']);

        } catch (\Exception $e) {

            return response()->json(['estado' => 'error', 'mensaje' => 'Error: ' . $e->getMessage()], 500);

        }

    }



    public function cargarControlDenunciaRam()

    {

        return view('direccion_salud.escritorio_control_denuncia_ram')->with([]);

    }

    public function cargarControlSaludPublica()
    {
        $anio = date('Y');

        $total_eno = \App\Models\DeclaracionEno::whereYear('declaraciones_eno.fecha_notificacion', $anio)->count();

        return view('direccion_salud.escritorio_control_salud_publica')->with([
            'anio'            => $anio,
            'total_eno'       => $total_eno,
            'total_vacunados' => 0,
        ]);
    }

    public function indicadoresSaludPublica(Request $request)
    {
        $anio = $request->anio ?? date('Y');
        $mes  = $request->mes  ?? null;

        $qEno = \App\Models\DeclaracionEno::whereYear('declaraciones_eno.fecha_notificacion', $anio);

        if ($mes) {
            $qEno->whereMonth('declaraciones_eno.fecha_notificacion', $mes);
        }

        return response()->json([
            'total_eno'       => $qEno->count(),
            'total_vacunados' => 0,
        ]);
    }



    /** Devuelve lista de medicamentos únicos registrados en el sistema */

    public function listarMedicamentosRam(Request $request)

    {

        $buscar = $request->buscar;



        $query = EntregaMedicamentoCronico::select('nombre_medicamento')

            ->whereNotNull('nombre_medicamento')

            ->where('nombre_medicamento', '!=', '');



        if ($buscar) {

            $query->where('nombre_medicamento', 'like', "%{$buscar}%");

        }



        $medicamentos = $query->groupBy('nombre_medicamento')

            ->orderBy('nombre_medicamento')

            ->get()

            ->map(function ($m) {

                return [

                    'nombre'          => $m->nombre_medicamento,

                    'total_denuncias' => DenunciaRam::where('nombre_medicamento', $m->nombre_medicamento)->count(),

                ];

            });



        // También incluir medicamentos de denuncias ya registradas que no estén en la lista

        $desde_denuncias = DenunciaRam::select('nombre_medicamento')

            ->whereNotNull('nombre_medicamento')

            ->groupBy('nombre_medicamento')

            ->pluck('nombre_medicamento');



        if ($buscar) {

            $desde_denuncias = $desde_denuncias->filter(fn($n) => stripos($n, $buscar) !== false);

        }



        $nombres_existentes = $medicamentos->pluck('nombre')->toArray();

        foreach ($desde_denuncias as $nombre) {

            if (!in_array($nombre, $nombres_existentes)) {

                $medicamentos->push([

                    'nombre'          => $nombre,

                    'total_denuncias' => DenunciaRam::where('nombre_medicamento', $nombre)->count(),

                ]);

            }

        }



        return response()->json([

            'estado'       => 1,

            'medicamentos' => $medicamentos->values(),

        ]);

    }



    /** Devuelve todas las denuncias RAM con filtros opcionales */

    public function listarDenunciasRam(Request $request)

    {

        $query = DenunciaRam::with(['Paciente', 'Profesional'])->orderByDesc('id');



        if (!empty($request->medicamento)) {

            $query->where('nombre_medicamento', 'like', '%' . $request->medicamento . '%');

        }

        if (!empty($request->estado)) {

            $query->where('estado', $request->estado);

        }

        if (!empty($request->gravedad)) {

            $query->where('gravedad', $request->gravedad);

        }



        $denuncias = $query->get()->map(function ($d) {

            return [

                'id'                     => $d->id,

                'nombre_medicamento'     => $d->nombre_medicamento,

                'principio_activo'       => $d->principio_activo,

                'laboratorio_fabricante' => $d->laboratorio_fabricante,

                'tipo_reaccion'          => $d->tipo_reaccion,

                'gravedad'               => $d->gravedad,

                'estado'                 => $d->estado,

                'fecha_reaccion'         => $d->fecha_reaccion ? $d->fecha_reaccion->format('d/m/Y') : '—',

                'descripcion_reaccion'   => $d->descripcion_reaccion,

                'observaciones'          => $d->observaciones,

                'accion_tomada'          => $d->accion_tomada,

                'paciente_nombre'        => $d->Paciente

                                            ? $d->Paciente->nombres . ' ' . $d->Paciente->apellido_uno . ' ' . $d->Paciente->apellido_dos

                                            : '—',

                'paciente_rut'           => $d->Paciente ? $d->Paciente->rut : '—',

                'profesional_nombre'     => $d->Profesional

                                            ? $d->Profesional->nombre . ' ' . $d->Profesional->apellido_uno

                                            : '—',

            ];

        });



        return response()->json(['estado' => 1, 'denuncias' => $denuncias]);

    }



    /** Guarda una nueva denuncia RAM */

    public function guardarDenunciaRam(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'nombre_medicamento'   => 'required|string|max:255',

            'descripcion_reaccion' => 'required|string',

            'gravedad'             => 'required|in:leve,moderada,grave,mortal',

        ]);



        if ($validator->fails()) {

            return response()->json(['estado' => 0, 'errores' => $validator->errors()], 422);

        }



        $denuncia = new DenunciaRam();

        $denuncia->nombre_medicamento    = $request->nombre_medicamento;

        $denuncia->principio_activo      = $request->principio_activo;

        $denuncia->laboratorio_fabricante = $request->laboratorio_fabricante;

        $denuncia->id_paciente           = $request->id_paciente ?: null;

        $denuncia->id_profesional        = $request->id_profesional ?: null;

        $denuncia->id_usuario            = auth()->id();

        $denuncia->tipo_reaccion         = $request->tipo_reaccion;

        $denuncia->gravedad              = $request->gravedad;

        $denuncia->fecha_reaccion        = $request->fecha_reaccion ?: now()->toDateString();

        $denuncia->descripcion_reaccion  = $request->descripcion_reaccion;

        $denuncia->observaciones         = $request->observaciones;

        $denuncia->accion_tomada         = $request->accion_tomada;

        $denuncia->estado                = 'pendiente';

        $denuncia->save();



        return response()->json(['estado' => 1, 'msj' => 'Denuncia RAM registrada exitosamente.', 'id' => $denuncia->id]);

    }



    /** Actualiza el estado o las observaciones de una denuncia RAM */

    public function actualizarEstadoDenunciaRam(Request $request, $id)

    {

        $denuncia = DenunciaRam::findOrFail($id);

        if ($request->filled('estado')) {

            $denuncia->estado = $request->estado;

        }

        if ($request->filled('observaciones')) {

            $denuncia->observaciones = $request->observaciones;

        }

        $denuncia->save();



        return response()->json(['estado' => 1, 'msj' => 'Denuncia actualizada.']);

    }



    /** Busca pacientes por RUT o nombre para el autocompletado del modal */

    public function buscarPacienteRam(Request $request)

    {

        $q = $request->q;

        if (empty($q) || strlen($q) < 2) {

            return response()->json([]);

        }



        $pacientes = Paciente::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos')

            ->where(function ($query) use ($q) {

                $query->where('rut', 'like', "%{$q}%")

                      ->orWhere('nombres', 'like', "%{$q}%")

                      ->orWhere('apellido_uno', 'like', "%{$q}%");

            })

            ->orderBy('nombres')

            ->limit(10)

            ->get()

            ->map(fn($p) => [

                'id'    => $p->id,

                'texto' => $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos . ' (' . $p->rut . ')',

            ]);



        return response()->json($pacientes);

    }



}

