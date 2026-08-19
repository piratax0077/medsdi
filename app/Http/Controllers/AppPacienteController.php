<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use App\Models\AntecedentesPaciente;
// carbon
use Carbon\Carbon;
// modelos
use App\Models\Ciudad;
use App\Models\ControlObesidad;
use App\Models\Diabete;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenMedico;
use App\Models\FichaAtencion;
use App\Models\GrupoSanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\LogUserDevice;
use App\Models\LugarAtencion;
use App\Models\NotificacionConfirmacion;
use App\Models\LogUsersDevices;
use App\Models\OdontogramaPaciente;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacienteOdontograma;
use App\Models\PacientesDependientes;
use App\Models\Profesional;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProcedimientosCentroLugarAtencionProfesional;
use App\Models\Region;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use App\Models\ResultadoExamen;
use App\Models\ResultadoExamenArchivo;
use App\Models\JitsiVideo;
use App\Models\Licencia;
use App\Models\CertificadoReposo;
use App\Models\ExamenPPF;
use App\Models\DocumentoFcPaciente;
use App\Models\ConConsentimientosPcte;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use App\Models\UsersDevices;
use App\Models\Mensajes;
use App\Models\User;
use App\Models\ContactoEmergencia;
use App\Models\ExamenesBocaGeneral;
use Illuminate\Http\Request;

use ArrayObject;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\PersonalAccessToken;

class AppPacienteController extends Controller
{
    public function getMensajesApp(Request $request)
    {
        $user = $request->user();
        $rol = ucfirst(strtolower((string) $request->query('rol', 'Paciente')));
        $recipientId = $user->id;

        if ($rol === 'Profesional') {
            $profesional = Profesional::where('id_usuario', $user->id)->first();
            if (!$profesional) {
                return response()->json(['estado' => 0, 'mensaje' => 'Perfil profesional no encontrado.'], 404);
            }
            $recipientId = $profesional->id;
        }

        $mensajes = Mensajes::where('id_receptor', $recipientId)
            ->orderByDesc('fecha_envio')
            ->orderByDesc('id')
            ->limit(100)
            ->get()
            ->map(function ($mensaje) use ($request) {
                $datos = json_decode($mensaje->datos_mensaje, true) ?: [];
                $emisor = Profesional::where('id_usuario', $mensaje->id_usuario)->first();
                $usuario = $emisor ? null : User::find($mensaje->id_usuario);
                $archivos = collect($datos['archivos'] ?? [])->map(function ($archivo, $indice) use ($mensaje, $request) {
                    return [
                        'nombre' => $archivo['nombre_original'] ?? ('Adjunto '.($indice + 1)),
                        'mime' => $archivo['mime'] ?? 'application/octet-stream',
                        'size' => $archivo['size'] ?? null,
                        'url' => $request->getSchemeAndHttpHost().URL::temporarySignedRoute(
                            'api.mensajes.adjunto',
                            now()->addMinutes(30),
                            ['mensaje' => $mensaje->id, 'archivo' => $indice],
                            false
                        ),
                    ];
                })->values();

                return [
                    'id' => $mensaje->id,
                    'asunto' => $datos['asunto'] ?? $datos['titulo'] ?? 'Mensaje',
                    'mensaje' => $datos['mensaje'] ?? '',
                    'emisor' => $emisor
                        ? trim($emisor->nombre.' '.$emisor->apellido_uno.' '.$emisor->apellido_dos)
                        : ($usuario->name ?? 'MED-SDI'),
                    'fecha_envio' => $mensaje->fecha_envio
                        ? Carbon::parse($mensaje->fecha_envio)->format('d-m-Y H:i')
                        : null,
                    'leido' => (int) $mensaje->estado === 1,
                    'archivos' => $archivos,
                ];
            });

        return response()->json([
            'estado' => 1,
            'cantidad' => $mensajes->count(),
            'no_leidos' => $mensajes->where('leido', false)->count(),
            'registros' => $mensajes->values(),
        ]);
    }

    public function leerMensajeApp(Request $request, Mensajes $mensaje)
    {
        if (!$this->mensajePerteneceAlUsuario($request, $mensaje)) {
            abort(403, 'No tiene permiso para abrir este mensaje.');
        }

        if ((int) $mensaje->estado === 0) {
            $mensaje->estado = 1;
            $mensaje->save();
        }

        return response()->json(['estado' => 1, 'mensaje' => 'Mensaje marcado como leído.']);
    }

    public function descargarAdjuntoMensajeApp(Request $request, Mensajes $mensaje, int $archivo)
    {
        $datos = json_decode($mensaje->datos_mensaje, true) ?: [];
        $adjunto = $datos['archivos'][$archivo] ?? null;
        $ruta = $adjunto['ruta'] ?? null;

        if (!$adjunto || !$ruta || !Storage::disk('public')->exists($ruta)) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $ruta,
            $adjunto['nombre_original'] ?? basename($ruta),
            ['Content-Type' => $adjunto['mime'] ?? 'application/octet-stream']
        );
    }

    private function mensajePerteneceAlUsuario(Request $request, Mensajes $mensaje): bool
    {
        $user = $request->user();
        if ((int) $mensaje->id_receptor === (int) $user->id) {
            return true;
        }

        $profesional = Profesional::where('id_usuario', $user->id)->first();
        return $profesional && (int) $mensaje->id_receptor === (int) $profesional->id;
    }

    //
    public function getMiFichaMedica(Request $request){

        // Validación de token X-Auth-Token
        $authToken = $request->header('X-Auth-Token');
        if (!$authToken) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación requerido'
            ], 401);
        }

        // Buscar el token en la base de datos
        $token = PersonalAccessToken::findToken($authToken);
        if (!$token) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación inválido'
            ], 401);
        }

        // Verificar que el token no haya expirado
        if ($token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación expirado'
            ], 401);
        }

        // Obtener el usuario autenticado del token
        $user = $token->tokenable;
        if (!$user) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Usuario no encontrado'
            ], 401);
        }

        // La ficha siempre pertenece al usuario autenticado por el token.
        // No confiar en un id enviado por el cliente, porque puede quedar
        // desfasado en localStorage o apuntar a otro paciente.
        $id_usuario = (int) $user->id;
        // return response()->json([
        //     'estado' => 1,
        //     'id_usuario' => $id_usuario,
        //     'registros' => $request->all()
        // ]);
        /* PACIENTE */
        $paciente = Paciente::where('id_usuario', $id_usuario)->first();
        // return response()->json([
        //     'estado' => 1,
        //     'paciente' => $paciente
        // ]);
         if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Paciente no encontrado',
                'registros' => []
            ]);
        }

        list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;

        $edad = $ano_diferencia;
        $paciente->fecha_nac = $dia.'-'.$mes.'-'.$ano;
        $paciente->edad = $edad;

        /* DIRECCION */
        $direccion = Direccion::find($paciente->id_direccion);

        if($direccion)
        {
            $direccion_nombre = $direccion->direccion;
            $numero_dir = $direccion->numero_dir;
            $id_ciudad = $direccion->id_ciudad;

            $ciudad = Ciudad::find($id_ciudad);
            $ciudad_nombre = $ciudad->nombre;
            $region = Region::find($ciudad->id_region);
            $region_nombre = $region->nombre;
        }else{
            $direccion_nombre = "";
            $numero_dir = "";
            $ciudad_nombre = "";
            $region_nombre = "";
        }

        // $direccion = (object)$direccion = array(
        //     'direccion' => $direccion_nombre,
        //     'numero' => $numero_dir,
        //     'ciudad' => $ciudad_nombre,
        //     'region' => $region_nombre,
        // );

        /* CONTACTO EMERGENCIA */
        $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();
        if(is_object($pacientes_contacto_emergencia))
        {
            $contacto_emergencia = ContactoEmergencia::find($pacientes_contacto_emergencia->id_contacto);

            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
            $contacto_emergencia->edad = $edad;

        }
        else
        {
            $contacto_emergencia = (object) array(
                'nombre'=>'N/A',
                'apellido_uno'=>'N/A',
                'apellido_dos'=>'N/A',
                'rut'=>'N/A',
                'edad'=>'N/A',
                'email'=>'N/A',
                'fecha_nac'=>'N/A',
                'telefono'=>'N/A',
                'parentezco'=>'N/A'
            );
        }

        /* ANTECEDENTES */
        $id_antecedente = $paciente->id_antecedente;
        if($id_antecedente!=null)
        {
            $antecedentes_paciente = AntecedentesPaciente::find($id_antecedente);
        }
        else
        {
            $antecedentes_paciente = (object) array(
                'id'=>'',
                'transfusion'=>'N/A',
                'dona_organos'=>'N/A',
                'dona_organos_parcial'=>'N/A',
                'dona_sangre'=>'N/A',
                'impedimento_donar'=>'N/A',
                'comentario_gs'=>'N/A',
                'comentarios'=>'N/A',
                'hepatitis'=>'N/A',
                'comentario_hepa'=>'N/A',
                'id_grupo_sanguineo'=>0,
            );
        }

        /* SANGUINEO */
        $id_grupo_sanguineo = $antecedentes_paciente->id_grupo_sanguineo;
        if($id_grupo_sanguineo!=0)
        {
            $grupo_sanguineo = GrupoSanguineo::find($id_grupo_sanguineo);
        }
        else
        {
            $grupo_sanguineo = (object) array(
                'id'=> 0,
                'nombre_gs'=> 'N/A',
                'descripcion_gs'=> 'N/A'
            );
        }

        /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_paciente', $paciente->id)
            ->where('estado', 1)
            ->with('users', 'paciente', 'tipo_antecendente', 'profesional')
            ->get();
        foreach ($antecedentes as $valor)
        {
            $valor['antecedente_data'] = json_decode($valor['data']);
        }

        $medicamentos_cronicos = $antecedentes
            ->where('id_tipo_antecedente', 7)
            ->map(function ($antecedente) {
                return [
                    'id' => $antecedente->id,
                    'nombre' => data_get(
                        $antecedente->antecedente_data,
                        'nombre_medicamento_cronico',
                        'Medicamento sin nombre'
                    ),
                    'comentario' => $antecedente->comentario,
                    'fecha' => optional($antecedente->created_at)->toDateString(),
                ];
            })
            ->values();

        /** RESPONSABLES */
        $responsables = '';
        /** validar si es dependiente */
        $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();
        if(count($array_id_responsable) > 0)
        {
            $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
        }

        /** RECETAS */
        $fecha_actual = date("d-m-Y");
        $regisrto_result = array();
        $lista_recetas = Recomendacion::whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 week")) )->where('activo',$paciente->id)->pluck('id')->toArray();
        if($lista_recetas)
        {
            $registros = Recomendacion::whereIn('id', $lista_recetas)->get();
            if($registros)
            {
                $regisrto_result = array();
                foreach ($registros as $key => $value)
                {
                    $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                    $detalle_temp = array();
                    if($detalle)
                    {
                        $detalle_temp = array();
                        foreach ($detalle as $key_det => $value_det)
                        {
                            $detalle_temp[] = array(
                                'id' => $value_det->id,
                                'id_receta' => $value_det->id_recomendacion,
                                'id_tipo_control' => decrypt($value_det->control),
                                'id_producto' => decrypt($value_det->id_articulo),
                                'producto' => decrypt($value_det->articulo),
                                'farmaco' => decrypt($value_det->componente),
                                'id_presentacion' => decrypt($value_det->id_apariencia),
                                'presentacion' => decrypt($value_det->apariencia),
                                'id_receta_dosis' => decrypt($value_det->id_cuota),
                                'posologia' => decrypt($value_det->cuota),
                                'id_via_administracion' => decrypt($value_det->id_regimen),
                                'via_administracion' => decrypt($value_det->regimen),
                                'id_periodo' => decrypt($value_det->id_lapso),
                                'periodo' => decrypt($value_det->lapso),
                                'uso_cronico' => decrypt($value_det->uso_frecuente),
                                'cantidad_compra' => decrypt($value_det->volumen_compra),
                                'cantidad' => decrypt($value_det->volumen),
                                'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                                'comentario' => decrypt($value_det->comentario),
                                'token_doc' => $value_det->cod_doc,
                                'estado' => $value_det->estado,
                                'created_at' => $value_det->created_at,
                                'updated_at' => $value_det->updated_at,
                            );
                        }
                    }

                    $regisrto_result[] = array(
                        'id' => $value->id,
                        'id_ficha_atencion' => $value->atencion,
                        'id_ingreso_paciente' => $value->salida,
                        'id_recuperacion' => $value->herir,
                        'id_sala' => $value->cuadro,
                        'id_paciente' => $value->activo,
                        'id_profesional' => $value->aficionado,
                        'id_tipo_control' => $value->control,
                        'token_doc' => $value->cod_doc,
                        'token_auto' => $value->cod_auto,
                        'pdf' => $value->info,
                        'estado' => $value->estado,
                        'detalle' => $detalle_temp,
                        'created_at' => $value->created_at,
                        'updated_at' => $value->updated_at,
                    );
                }
            }
        }

        $ultimos_medicamentos = collect($regisrto_result)
            ->flatMap(function ($receta) {
                return collect($receta['detalle'])->map(function ($detalle) use ($receta) {
                    return [
                        'nombre' => $detalle['producto'] ?: $detalle['farmaco'],
                        'fecha' => optional($receta['created_at'])->toDateString(),
                    ];
                });
            })
            ->take(10)
            ->values();

        /** Control enfermedades Cronicas */
        $control_enfer_cronicas = array();
        /** obsidad */
        $obesidad = ControlObesidad::where('id_paciente', $paciente->id)->get();
        if($obesidad)
        {
            foreach ($obesidad as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Obesidad',
                    'detalle' => array(
                        'Peso' => $value->peso,
                        'Variación' => $value->variacion,
                        'Ideal' => $value->ideal,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }

        /** diabetes */
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        if($diabetes)
        {
            foreach ($diabetes as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Diabetes',
                    'detalle' => array(
                        'Peso' => $value->peso,
                        'Piés' => $value->pies,
                        'HG A1c' => $value->hgac1,
                        'Colesterol' => $value->colesterol,
                        'Creatina' => $value->creatina,
                        'Glicosilada postprandial' => $value->glicosilada_postprandial,
                        'Glicosilada ayuno' => $value->glicosinada_ayuno,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }

        /** hipertensiones */
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        if($hipertension)
        {
            foreach ($hipertension as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Hipertensión',
                    'detalle' => array(
                        'Presión Sistólica' => $value->sistolica,
                        'Presión Diastólica' => $value->diastolica,
                        'Presión Ideal' => $value->ideal,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }


        /* ATENCIONES MEDICAS */
		$profesional = Profesional::where('id_usuario',$id_usuario)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        if($fichas->count() == 0){
             $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        }
        // $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        $especialidad = Especialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

        /** EXAMENES DE ESPECIALIDAD REALIZADOS */
        $examenes_especialidad_realizados = ExamenEspecialidad::select('id', 'id_tipo', 'id_template', 'id_examen_tipo', 'id_sub_tipo_especialidad', 'id_ficha_atencion', 'id_ficha_especialidad', 'id_paciente', 'id_profesional', 'id_asistente', 'nombre', 'revisado', 'estado')
                                                            ->with(['HoraMedica' => function($query){
                                                                $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                                            }])
                                                            ->with(['ExamenEspecialidadTemplate' => function($query){
                                                                $query->select('id', 'nombre', 'alias');
                                                            }])
                                                            ->with(['ExamenEspecialidadTipo' => function($query){
                                                                $query->select('id', 'nombre', 'descripcion');
                                                            }])
                                                            ->with(['SubTipoEspecialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }])
                                                            ->where('id_paciente', $paciente->id)
                                                            ->get();

        /** resultado de examenes */
        // $resultado_examen = ResultadoExamen::where('id_paciente', $paciente->id)->get();
        $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
        if($resultado_examen)
        {
            foreach ($resultado_examen as $key => $value)
            {
                $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
            }
        }

        /* --------------------------- HTML MODAL -------------------------- */
        //MODALS - Externos
        $contacto_emergencia_html = "
            <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
                        <th>Rut</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Parentezco</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$contacto_emergencia->nombre</td>
                        <td>$contacto_emergencia->apellido_uno</td>
                        <td>$contacto_emergencia->apellido_dos</td>

                        <td>$contacto_emergencia->rut</td>
                        <td>$contacto_emergencia->edad</td>
                        <td>$contacto_emergencia->email</td>

                        <td>$contacto_emergencia->fecha_nac</td>
                        <td>$contacto_emergencia->telefono</td>
                        <td>$contacto_emergencia->parentezco</td>
                    </tr>
                </tbody>
            </table>
        ";

        $responsables_html = "
            <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
                        <th>Rut</th>
                        <th>Email</th>
                        <th>Teléfono </th>
                    </tr>
                </thead>
                <tbody>";
                if($responsables)
                {
                    foreach ($responsables as $key => $value)
                    {
                        $responsables_html .= "<tr>
                            <td>$value->nombres</td>
                            <td>$value->apellido_uno</td>
                            <td>$value->apellido_dos</td>
                            <td>$value->rut</td>
                            <td>$value->email</td>
                            <td>$value->telefono</td>
                        </tr>";
                    }
                }
        $responsables_html .=     "</tbody>
            </table>";

        // $regisrto_result
        $receta_activa_html = "
            <table class='table table-bordered table-xs'>
            <thead>
                <tr>
                    <th>Fecha Receta</th>
                    <th>Producto</th>
                    <th>Presentación</th>
                    <th>Posologia</th>
                    <th>Via<br/>Administracion</th>
                    <th>Periodo</th>
                    <th>Cantidad Compra</th>
                </tr>
            </thead>
            <tbody>";
            if($regisrto_result)
            {
                foreach ($regisrto_result as $key => $value)
                {
                    foreach ($value['detalle'] as $key_detalle => $value_detalle)
                    {
                        $receta_activa_html .= "
                            <tr>
                                <td>".date('d-m-Y', strtotime($value['created_at']))."</td>
                                <td>".$value_detalle['producto']."<br/><span style=\"font-size:10px;\">".$value_detalle['farmaco']."</span></td>
                                <td>".$value_detalle['presentacion']."</td>
                                <td>".$value_detalle['posologia']."</td>
                                <td>".$value_detalle['via_administracion']."</td>
                                <td>".$value_detalle['periodo']."</td>
                                <td>".$value_detalle['cantidad_compra']."</td>
                            </tr>";
                    }
                }
            }
        $receta_activa_html .= "
            </tbody>
        </table>";

        // $datos = (object)array(
        //     'contacto_emergencia' =>  $contacto_emergencia_html,
        //     'tratamientos_activos' => $receta_activa_html,
        //     'confidencial' => '',
        //     'responsables' => $responsables_html,
        //     'estado' => 'ok'

        // );


        /* FIN --------------------------- HTML MODAL -------------------------- */

        $odontograma = $this->dameOdontogramaPaciente($paciente->id);

        $datos = (object)array(
            'paciente' => $paciente,
            'odontograma' => $odontograma,
            'contacto_emergencia' => $contacto_emergencia,
            'antecedentes_paciente' => $antecedentes_paciente,
            'grupo_sanguineo' => $grupo_sanguineo,
            'antecedentes' => $antecedentes,
            'token' => $request->token,
            'fichas' => $fichas,
            'especialidad' => $especialidad,
            'sub_tipo_especialidad' => $sub_tipo_especialidad,
            'direccion' => $direccion,
            'tratamiento_activo' => $regisrto_result,
            'medicamentos_cronicos' => $medicamentos_cronicos,
            'ultimos_medicamentos' => $ultimos_medicamentos,
            'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
            'resultado_examen' => $resultado_examen,
            'control_enfer_cronicas' => $control_enfer_cronicas,

        );

        return response()->json([
                'estado' => 1,
                'paciente' => $paciente,
                'odontograma' => $odontograma,
                'contacto_emergencia' => $contacto_emergencia,
                'antecedentes_paciente' => $antecedentes_paciente,
                'grupo_sanguineo' => $grupo_sanguineo,
                'antecedentes' => $antecedentes,
                'token' => $request->token,
                'fichas' => $fichas,
                'especialidad' => $especialidad,
                'sub_tipo_especialidad' => $sub_tipo_especialidad,
                'direccion' => $direccion,
                'tratamiento_activo' => $regisrto_result,
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'ultimos_medicamentos' => $ultimos_medicamentos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                'resultado_examen' => $resultado_examen,
                'control_enfer_cronicas' => $control_enfer_cronicas,
            ]);

    }

    public function getMisHorasMedicas(Request $request){

        // Validación de token X-Auth-Token
        $authToken = $request->header('X-Auth-Token');
        if (!$authToken) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación requerido'
            ], 401);
        }

        // Buscar el token en la base de datos
        $token = PersonalAccessToken::findToken($authToken);
        if (!$token) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación inválido'
            ], 401);
        }

        // Verificar que el token no haya expirado
        if ($token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación expirado'
            ], 401);
        }

        // Obtener el usuario autenticado del token
        $user = $token->tokenable;
        if (!$user) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Usuario no encontrado'
            ], 401);
        }

        $id_usuario = $request->id_paciente;
        $paciente = Paciente::where('id', $id_usuario)->first();

        // return response()->json([
        //     'estado' => 1,
        //     'paciente' => $paciente
        // ]);
        if($paciente){
             $hora_medica = HoraMedica::select('horas_medicas.id', 'horas_medicas.fecha_consulta', 'horas_medicas.hora_inicio', 'horas_medicas.hora_termino', 'horas_medicas.alias_examen',
                                                'horas_medicas.comentarios_confirmacion', 'horas_medicas.fecha_confirmacion', 'horas_medicas.comentarios_cancelacion', 'horas_medicas.fecha_cancelacion',
                                                'horas_medicas.fecha_realizacion_consulta', 'horas_medicas.id_ficha_atencion', 'horas_medicas.id_profesional', 'horas_medicas.id_lugar_atencion',
                                                'horas_medicas.id_asistente', 'horas_medicas.id_paciente', 'horas_medicas.acomp_representante', 'horas_medicas.acomp_acompanante',
                                                'horas_medicas.acomp_lista', 'horas_medicas.autorizacion_atencion', 'horas_medicas.id_log_users_devices', 'horas_medicas.id_estado',
                                                'profesionales.nombre as nombre_profesional', 'profesionales.apellido_uno as apellido_uno_profesional','profesionales.foto_perfil',
                                                'lugares_atencion.nombre as nombre_lugar_atencion', 'direcciones.direccion as direccion_lugar_atencion', 'direcciones.numero_dir as numero_dir_lugar_atencion',
                                                'especialidades.nombre as nombre_especialidad', 'tipos_especialidad.nombre as nombre_tipo_especialidad', 'sub_tipo_especialidad.nombre as nombre_sub_tipo_especialidad',
                                                'parametros.valor as texto_estado', 'parametros.color as color_estado')
                                        ->join('profesionales', 'profesionales.id', '=', 'horas_medicas.id_profesional')
                                        ->join('especialidades', 'especialidades.id', '=', 'profesionales.id_especialidad')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'profesionales.id_tipo_especialidad')
                                        ->leftJoin('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'profesionales.id_sub_tipo_especialidad')
                                        ->join('lugares_atencion', 'lugares_atencion.id', '=', 'horas_medicas.id_lugar_atencion')
                                        ->join('direcciones', 'direcciones.id', '=', 'lugares_atencion.id_direccion')
                                        ->join('parametros', function ($join) {
                                            $join->on('parametros.id', '=', 'horas_medicas.id_estado')
                                                    ->where('parametros.referencia', '=', 'Agenda_Estado');
                                        })
                                        ->where('id_paciente', $paciente->id)
                                        // ->whereRaw("fecha_consulta >= NOW() AND hora_inicio >= NOW()")
                                        ->whereRaw("date(fecha_consulta) >= '".date('Y-m-d')."' ")
                                        // ->whereIn('id_estado',[1,2,4,5,6,8])
                                        ->orderBy('fecha_consulta', 'ASC')
                                        ->orderBy('hora_inicio', 'DESC')
                                        ->get();

            return response()->json([
                'estado' => 1,
                'horas' => $hora_medica
            ]);
        }else{
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Paciente no encontrado',
                'horas' => []
            ]);
        }
    }

    public function guardarAtencionMedica(Request $request){
    // Validación de token X-Auth-Token
        $authToken = $request->header('X-Auth-Token');
        if (!$authToken) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación requerido'
            ], 401);
        }

        // Buscar el token en la base de datos
        $token = PersonalAccessToken::findToken($authToken);
        if (!$token) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación inválido'
            ], 401);
        }

        // Verificar que el token no haya expirado
        if ($token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación expirado'
            ], 401);
        }

        // Obtener el usuario autenticado del token
        $user = $token->tokenable;
        if (!$user) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Usuario no encontrado'
            ], 401);
        }
        $id_ficha_atencion = $request->id_ficha_atencion;
        $id_paciente = $request->id_paciente;
        $id_profesional = $request->id_profesional;
        $observaciones = $request->observaciones;

        $ficha = FichaAtencion::where('id', $id_ficha_atencion)
                                ->where('id_paciente', $id_paciente)
                                ->where('id_profesional', $id_profesional)
                                ->first();
        if($ficha){
            $ficha->observaciones_paciente = $observaciones;
            $ficha->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Atención médica guardada correctamente',
                'ficha' => $ficha
            ]);
        }else{
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Ficha de atención no encontrada',
                'ficha' => null
            ]);
        }
    }

    public function getEspecialidadesProfesionales(Request $request){
        $especialidades = Especialidad::where('estado',1)->get();
        return response()->json([
            'estado' => 1,
            'especialidades' => $especialidades
        ]);
    }

    public function getTipoEspecialidadesProfesionales(Request $request){
        $id = $request->id_especialidad;
        $tipo_especialidades = TipoEspecialidad::where('estado',1)
                                ->where('id_especialidad',$id)
                                ->get();
        return response()->json([
            'estado' => 1,
            'tipo_especialidades' => $tipo_especialidades
        ]);
    }

    public function getSubTipoEspecialidadesProfesionales(Request $request){
        $id = $request->id_tipo_especialidad;
        $sub_tipo_especialidades = SubTipoEspecialidad::where('estado',1)
                                ->where('id_tipo_especialidad',$id)
                                ->get();
        return response()->json([
            'estado' => 1,
            'sub_tipo_especialidades' => $sub_tipo_especialidades
        ]);
    }

      public function dameOdontogramaPaciente($id_paciente, $id_ficha_atencion = null, $id_lugar_atencion = null,$id_presupuesto = null){
        $query = OdontogramaPaciente::select(
            'odontogramas_pacientes.*',
            'diagnosticos_dental.descripcion',
            'diagnosticos_dental.cantidad_bloques',
            'diagnosticos_dental.valor',
            'tratamientos_dental.descripcion as diagnostico')
            ->join('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
            ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
            ->where('odontogramas_pacientes.id_paciente', $id_paciente);
            // ->where('odontogramas_pacientes.id_ficha_atencion', $id_ficha_atencion)
            // ->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion);

            // Verificar si el parámetro $id_presupuesto no es nulo
            if (!is_null($id_presupuesto)) {
                $query->where('odontogramas_pacientes.id_presupuesto', $id_presupuesto);
            }

            // Obtener los resultados
            $odontogramas = $query->get();

            return $odontogramas;
    }

    public function getMisProfesionales(Request $request){

        // Validación de token X-Auth-Token
        $authToken = $request->header('X-Auth-Token');
        if (!$authToken) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación requerido'
            ], 401);
        }

        // Buscar el token en la base de datos
        $token = PersonalAccessToken::findToken($authToken);
        if (!$token) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación inválido'
            ], 401);
        }

        // Verificar que el token no haya expirado
        if ($token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación expirado'
            ], 401);
        }

        // Obtener el usuario autenticado del token
        $user = $token->tokenable;
        if (!$user) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Usuario no encontrado'
            ], 401);
        }

        // VER lista de profesionales
        //capturamos el id_usuario receptor
        $id_usuario = $user->id;
        $paciente = Paciente::where('id_usuario', $id_usuario)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get()->unique('id_profesional');

        $fichas_desvinculados = FichaAtencion::select('id_profesional')
                                        ->where('id_paciente', $paciente->id)
                                        ->where('desvincular', 1)
                                        ->get()
                                        ->unique('id_profesional');

        $profesional = [];
        $desvinculados = [];
        $profesion = [];

        foreach ($fichas as $f) {

            $profesional_ = Profesional::with('Especialidad')->find($f->id_profesional);
            if($profesional_){
                $profesion[$profesional_->Especialidad->id] = $profesional_->Especialidad->nombre;

                // busqueda de imagen
                $array_rut = explode('-',$profesional_->rut);
                $nombre_imagen = asset('images/iconos/usuario_profesional.svg');

                if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
                {
                    $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
                    $profesional_temp['img_profesional2'] = $nombre_imagen;
                }
                $profesional_temp = $f->profesional()->first();
                $profesional_temp['img_profesional'] = $nombre_imagen;
                $profesional_temp['especialidad'] = $profesional_->Especialidad->nombre;
                $profesional_temp['tipo_especialidad'] = $profesional_->TipoEspecialidad ? $profesional_->TipoEspecialidad->nombre : '';
                if($profesional_->SubTipoEspecialidad){
                    $profesional_temp['sub_tipo_especialidad'] = $profesional_->SubTipoEspecialidad->nombre;
                }

                array_push($profesional, $profesional_temp);
            }

        }

        foreach ($fichas_desvinculados as $d) {
            array_push($desvinculados, $d->id_profesional);
        }


        //$lista_especialidad = array_unique($profesion);
        $lista_especialidad = $profesion;

        // var_dump(Auth::user()->id);
        // echo json_encode($profesional);
        // die();
        return response()->json([
            'estado' => 1,
            'medicos' => $profesional,
            'desvinculados' => $desvinculados,
            'lista_especialidad' => $lista_especialidad,
            'id_usuario' => $id_usuario,
        ]);
    }

    public function getLugaresAtencionProfesional(Request $request){
        $id_profesional = $request->id_profesional;
        $datos = array();

        $profesional = Profesional::where('id', $id_profesional)->first();
        $lugares_atencion = $profesional->LugaresAtencion()->where('estado',1)->get();
        foreach ($lugares_atencion as $key => $value) {
            $direccion = Direccion::where('id', $value->id_direccion)->first();
            $lugares_atencion[$key]['direccion'] = $direccion->direccion.' '.$direccion->numero_dir;
        }
        if($lugares_atencion)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $lugares_atencion;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return response()->json($datos);
    }

    public function getDiasLaboralesLugarAtencionProfesional(Request $request){
        $id_profesional = $request->id_profesional;
        $id_lugar_atencion = $request->id_lugar;
        $id_tipo_agenda = $request->tipo_agenda; // 1=Agenda normal, 2=Agenda horas bloqueadas, 3=Agenda horas especiales
        $datos = array();
        $horario = ProfesionalHorario::where('id_profesional', $id_profesional)
                                        ->where('id_lugar_atencion', $id_lugar_atencion)
                                        ->tipoAgenda($id_tipo_agenda)
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

        return response()->json($datos);
    }

    public function getTiposAgendaLugarAtencionProfesional(Request $request)
    {
        $request->validate([
            'id_profesional' => ['required', 'integer', 'exists:profesionales,id'],
            'id_lugar' => ['required', 'integer', 'exists:lugares_atencion,id'],
        ]);

        $nombres = [
            1 => ['nombre' => 'Atención presencial', 'descripcion' => 'Consulta en el lugar de atención', 'tipo_hora_medica' => 'C'],
            2 => ['nombre' => 'Atención dental', 'descripcion' => 'Consulta odontológica presencial', 'tipo_hora_medica' => 'D'],
            3 => ['nombre' => 'Telemedicina', 'descripcion' => 'Consulta remota por videollamada', 'tipo_hora_medica' => 'T'],
            4 => ['nombre' => 'Exámenes', 'descripcion' => 'Agenda para toma o realización de exámenes', 'tipo_hora_medica' => 'E'],
            5 => ['nombre' => 'Laboratorio', 'descripcion' => 'Agenda de prestaciones de laboratorio', 'tipo_hora_medica' => 'E'],
        ];

        $tipos = ProfesionalHorario::where('id_profesional', $request->id_profesional)
            ->where('id_lugar_atencion', $request->id_lugar)
            ->whereNotNull('tipo_agenda')
            ->distinct()
            ->orderBy('tipo_agenda')
            ->pluck('tipo_agenda')
            ->map(function ($tipo) use ($nombres) {
                $id = (int) $tipo;
                $datos = $nombres[$id] ?? [
                    'nombre' => 'Agenda '.$id,
                    'descripcion' => 'Horario configurado por el profesional',
                    'tipo_hora_medica' => 'C',
                ];

                return array_merge(['id' => $id], $datos);
            })
            ->values();

        return response()->json([
            'estado' => 1,
            'registros' => $tipos,
            'cantidad' => $tipos->count(),
        ]);
    }

    public function getPrestacionesLugarAtencionProfesional(Request $request)
    {
        $request->validate([
            'id_profesional' => ['required', 'integer', 'exists:profesionales,id'],
            'id_lugar' => ['required', 'integer', 'exists:lugares_atencion,id'],
        ]);

        $prestaciones = ProcedimientosCentroLugarAtencionProfesional::query()
            ->join(
                'procedimientos_centro',
                'procedimientos_centro.id',
                '=',
                'procedimientos_lugar_atencion_profesional.id_procedimiento_centro'
            )
            ->leftJoin(
                'tipo_prestaciones',
                'tipo_prestaciones.id',
                '=',
                'procedimientos_centro.id_tipo_prestacion'
            )
            ->where('procedimientos_lugar_atencion_profesional.id_profesional', $request->id_profesional)
            ->where('procedimientos_lugar_atencion_profesional.id_lugar_atencion', $request->id_lugar)
            ->where('procedimientos_lugar_atencion_profesional.estado', 1)
            ->where('procedimientos_centro.estado', 1)
            ->orderBy('tipo_prestaciones.nombre')
            ->orderBy('procedimientos_centro.nombre')
            ->get([
                'procedimientos_lugar_atencion_profesional.id as id_asignacion',
                'procedimientos_centro.id as id_procedimiento',
                'procedimientos_centro.cod_examen as codigo',
                'procedimientos_centro.nombre',
                'procedimientos_centro.descripcion',
                'tipo_prestaciones.codigo as tipo_codigo',
                'tipo_prestaciones.nombre as tipo_nombre',
                'procedimientos_lugar_atencion_profesional.minutos_bloque',
                'procedimientos_lugar_atencion_profesional.cantidad_bloques',
                'procedimientos_lugar_atencion_profesional.valor',
            ])
            ->map(function ($prestacion) {
                return [
                    'id_asignacion' => (int) $prestacion->id_asignacion,
                    'id_procedimiento' => (int) $prestacion->id_procedimiento,
                    'codigo' => $prestacion->codigo,
                    'nombre' => $prestacion->nombre,
                    'descripcion' => $prestacion->descripcion,
                    'tipo_codigo' => $prestacion->tipo_codigo ?: 'OTRA',
                    'tipo_nombre' => $prestacion->tipo_nombre ?: 'Otra prestación',
                    'minutos_bloque' => (int) $prestacion->minutos_bloque,
                    'cantidad_bloques' => (int) $prestacion->cantidad_bloques,
                    'valor' => $prestacion->valor !== null ? (float) $prestacion->valor : null,
                ];
            })
            ->values();

        return response()->json([
            'estado' => 1,
            'registros' => $prestaciones,
            'cantidad' => $prestaciones->count(),
        ]);
    }

    public function getHorasDisponiblesProfesionalLugarAtencionBuscador(Request $request){
        $id_profesional = $request->id_profesional;
        $id_lugar_atencion = $request->id_lugar;
        $tipo_agenda = $request->tipo_agenda; // 1=Agenda normal
        $texto_dia = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        $texto_mes = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $datos = array();

        $dia_semana = date('N',strtotime($request->fecha));

        $profesional_horarios = ProfesionalHorario::where('id_profesional',$id_profesional)
                                                ->where('id_lugar_atencion',$id_lugar_atencion)
                                                ->where('dia','like','%'.$dia_semana.'%')
                                                ->tipoAgenda($tipo_agenda)
                                                ->orderBy('dia', 'ASC')
                                                ->first();
        if($profesional_horarios)
        {
            $array_bloques = array();

            $hora_inicio_turno  = $request->fecha.' '.$profesional_horarios->hora_inicio;
            $hora_termino_turno  = $request->fecha.' '.$profesional_horarios->hora_termino;

            /** duracion de consulta en minutos */
            $duracion =  $profesional_horarios->duracion_consulta;
            $array_duracion = explode(':', $duracion);
            $duracion_total = 0;

            if((int)$array_duracion[0]>0)
                $duracion_total += (int)$array_duracion[0]*60;
            if((int)$array_duracion[1]>0)
                $duracion_total += (int)$array_duracion[1];

            for ($hora=strtotime($hora_inicio_turno); $hora <= strtotime( '+'. $duracion_total.' minute', strtotime($hora_termino_turno) ); $hora = strtotime('+'. $duracion_total.' minute',$hora) )
            {
                // $hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))->where('hora_inicio',date('H:i:s',$hora))->first();
                $hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))
                                            ->where('id_profesional', $id_profesional)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->whereRaw("'".date('H:i',strtotime( '+1 second', $hora))."' BETWEEN hora_inicio and hora_termino")
                                            ->first();

                $datos['hora'][strtotime( '+1 second', $hora)] = date('H:i',strtotime( '+1 second', $hora));
                $datos['hora_medica'][strtotime( '+1 second', $hora)] = $hora_medica;

                if($hora_medica)
                {
                    // con reserva
                }
                else
                {
                    // sin reserva
                    $array_bloques[] = array(
                                            'dia' => date('Y-m-d',$hora),
                                            'hora' => date('H:i',$hora),
                                            'fecha_hora' => date('Y-m-d H:i',$hora)
                                        );
                }
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['horarios'] = $array_bloques;
            $datos['text_fecha'] = $texto_dia[(int)$dia_semana].' '. date('d',strtotime($request->fecha)).' '.$texto_mes[(int)date('m',strtotime($request->fecha))].' '.date('Y',strtotime($request->fecha));

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['profesional_horario'] = $profesional_horarios;
        }

        return response()->json($datos);
    }

    public function agendarHoraMedica(Request $request){

        // Validación de token X-Auth-Token
        $authToken = $request->header('X-Auth-Token');
        if (!$authToken) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación requerido'
            ], 401);
        }

        // Buscar el token en la base de datos
        $token = PersonalAccessToken::findToken($authToken);
        if (!$token) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación inválido'
            ], 401);
        }

        // Verificar que el token no haya expirado
        if ($token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación expirado'
            ], 401);
        }

        // Obtener el usuario autenticado del token
        $user = $token->tokenable;
        if (!$user) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Usuario no encontrado'
            ], 401);
        }
        // return response()->json([
        //     'estado' => 0,
        //     'mensaje' => 'Funcionalidad temporalmente deshabilitada',
        //     'registros' => $request->all()
        // ], 200);

        $datos = array();
        $valido = 1;

        // El token identifica un usuario; hora_medica.id_paciente debe guardar
        // siempre el ID de la tabla pacientes, nunca users.id.
        $paciente = Paciente::where('id_usuario', $user->id)->first();
        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $lugar_atencion = LugarAtencion::where('id', $request->id_lugar)->first();

        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'msj' => 'El usuario autenticado no tiene un perfil de paciente asociado.',
            ], 422);
        }

        if (!$profesional || !$lugar_atencion) {
            return response()->json([
                'estado' => 0,
                'msj' => 'El profesional o lugar de atención seleccionado no es válido.',
            ], 422);
        }

        $tipoAgenda = $request->filled('tipo_agenda') ? (int) $request->tipo_agenda : null;
        $tiposHoraPorAgenda = [1 => 'C', 2 => 'D', 3 => 'T', 4 => 'E', 5 => 'E'];

        if ($tipoAgenda !== null) {
            $agendaConfigurada = ProfesionalHorario::where('id_profesional', $profesional->id)
                ->where('id_lugar_atencion', $lugar_atencion->id)
                ->where('tipo_agenda', $tipoAgenda)
                ->exists();

            if (!$agendaConfigurada || !isset($tiposHoraPorAgenda[$tipoAgenda])) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'La modalidad seleccionada no está disponible para este profesional.',
                ], 422);
            }

            $request->merge(['tipo_hora_medica' => $tiposHoraPorAgenda[$tipoAgenda]]);
        }

        $prestacionSeleccionada = null;
        if ($request->tipo_hora_medica === 'E') {
            $prestacionSeleccionada = ProcedimientosCentroLugarAtencionProfesional::query()
                ->join(
                    'procedimientos_centro',
                    'procedimientos_centro.id',
                    '=',
                    'procedimientos_lugar_atencion_profesional.id_procedimiento_centro'
                )
                ->where('procedimientos_lugar_atencion_profesional.id_profesional', $profesional->id)
                ->where('procedimientos_lugar_atencion_profesional.id_lugar_atencion', $lugar_atencion->id)
                ->where('procedimientos_lugar_atencion_profesional.id_procedimiento_centro', $request->id_procedimiento)
                ->where('procedimientos_lugar_atencion_profesional.estado', 1)
                ->where('procedimientos_centro.estado', 1)
                ->first([
                    'procedimientos_centro.id',
                    'procedimientos_centro.nombre',
                ]);

            if (!$prestacionSeleccionada) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'El examen o procedimiento seleccionado ya no está disponible con este profesional.',
                ], 422);
            }
        }

        $texto_alias_examen = '';
        # TIPO HORA MEDICA
        switch ($request->tipo_hora_medica) {
            case 'C': // 1
                $texto_alias_examen = 'Consulta';
                break;
            case 'D': // 2
                $texto_alias_examen = 'Consulta Dental';
                break;
            case 'T': // 3
                $texto_alias_examen = 'Consulta Telemedicina';
                break;
            case 'E': // 4
                $texto_alias_examen = $prestacionSeleccionada->nombre;
                break;
        }

        $validar = HoraMedica::where('id_paciente', $paciente->id)
                            ->where('id_profesional',$profesional->id)
                            ->where('tipo_hora_medica',$request->tipo_hora_medica)
                            ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha)->format('Y-m-d'))
                            ->first();

        if($validar)
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Paciente ya tiene Hora para este dia';
            $valido = 0;
            return json_encode(array(
                'estado' => 'error',
                'id_profesional' => $profesional->id,
                'msj' => 'Paciente ya tiene Hora para este dia'
            ));
        }

        if($valido)
        {
            $tiempo_consulta = 15;
            $procedimiento = '';

            if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
            {
                $procedimiento = $request->procedimiento;
                $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
                $tiempo_consulta = intval($proc_bloque) * 15;
            }else if($profesional->id_especialidad == 2){
                // $procedimiento = $request->procedimiento;
                // $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
                // $tiempo_consulta = intval($proc_bloque) * 15;
                $procedimiento = $request->procedimiento;
                $proc_bloque = (!empty($request->proc_bloque) ? intval($request->proc_bloque) : 1);
                $tiempo_consulta = intval($proc_bloque) * 15;

                // Calcular hora de inicio y término
                $hora_inicio = \Carbon\Carbon::parse($request->fecha)->format('H:i:s');
                $hora_termino = \Carbon\Carbon::parse($request->fecha)->addMinutes($tiempo_consulta)->format('H:i:s');

                // Validar si ya hay una hora médica que se solape
                $choque_horario = HoraMedica::where('id_profesional', $profesional->id)
                    ->where('id_lugar_atencion', $request->id_lugar)
                    ->where('fecha_consulta', \Carbon\Carbon::parse($request->fecha)->format('Y-m-d'))
                    ->where(function ($query) use ($hora_inicio, $hora_termino) {
                        $query->whereBetween('hora_inicio', [$hora_inicio, $hora_termino])
                            ->orWhereBetween('hora_termino', [$hora_inicio, $hora_termino])
                            ->orWhere(function ($query) use ($hora_inicio, $hora_termino) {
                                $query->where('hora_inicio', '<=', $hora_inicio)
                                        ->where('hora_termino', '>=', $hora_termino);
                            });
                    })
                    ->exists();

                if ($choque_horario) {
                    return json_encode([
                        'estado' => 'error',
                        'id_profesional' => $profesional->id,
                        'msj' => 'La hora médica se superpone con otra ya registrada.<br> Eliga un bloque mayor'
                    ]);
                }
            }
            else
            {
                /** buscar tiempo de la consult */
                $dia_de_semana = \Carbon\Carbon::parse($request->fecha)->format('w');
                $profesional_horarios = ProfesionalHorario::select('duracion_consulta')
                                                            ->where('id_profesional', $profesional->id)
                                                            ->where('id_lugar_atencion',$request->id_lugar)
                                                            ->where('dia','like','%'.$dia_de_semana.'%')
                                                            ->when($tipoAgenda, function ($query) use ($tipoAgenda) {
                                                                $query->where('tipo_agenda', $tipoAgenda);
                                                            })
                                                            ->first();

                // $profesional_horarios = '00:30:00';
                // $tiempo_consulta = 30;
                $horas = date('H',strtotime($profesional_horarios->duracion_consulta));
                $minutos = date('i',strtotime($profesional_horarios->duracion_consulta));
                $totales = ($horas*60) + $minutos;
                $tiempo_consulta = $totales;
            }

            $hora_medica = new HoraMedica();

            $hora_medica->id_paciente = $paciente->id;
            $hora_medica->id_profesional = $profesional->id;
            $hora_medica->id_asistente = $request->id_asistente;
            $hora_medica->id_estado = '1';
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->hora)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->hora)->addMinutes($tiempo_consulta)->format('H:i:s');

            $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
            $hora_medica->alias_examen = $texto_alias_examen;
            $hora_medica->id_procedimiento = $request->id_procedimiento;

            $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
            $hora_medica->id_lugar_atencion = $request->id_lugar;

            $hora_medica->acomp_representante = $request->representante;
            $hora_medica->acomp_acompanante = $request->acompanante;
            if(!empty($request->lista_Acompanante))
            $hora_medica->acomp_lista = json_encode($request->lista_Acompanante);

            $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
            // $hora_medica->id_log_users_devices = '';

            // $hora_medica->origen = $request->origen;

            if ($hora_medica->save())
            {
                if($request->tipo_hora_medica == 'T')
                {
                    $jitsi = JitsiController::jitsiRegistroMeet( $profesional->id, $paciente->id, $hora_medica->id );
					$hora_medica->video_llamada = $jitsi;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'Hora Reservada';
                $datos['registro'] = array(
                    'fecha' => \Carbon\Carbon::parse($request->fecha)->format('Y-m-d'),
                    'hora' => \Carbon\Carbon::parse($request->fecha)->format('H:i:s'),
                    'profesional' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos ,
                    'lugar_atencion' => $lugar_atencion->nombre,
                );

                /**  */
                /** menor edad? */
                $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y');
                if( $edad < 18 )
                {

                    if( $request->autorizacion_atencion == 1 )
                    {
                        $usuario = Auth::user()->id;
                        $id_user_create = $usuario;
                        $id_user_recept = $usuario;
                        $evento = 'Autorizacion Atencion a Menor de Edad';
                        $nombre = $paciente->nombre;
                        $apellido_p = $paciente->apellido_uno;
                        $apellido_m = $paciente->apellido_dos;
                        $lugar = $lugar_atencion->nombre;
                        $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                        $tipo = 'Autorizacion Atencion a Menor de Edad';
                        $tipo_id = '15';

                        // $log_users_devices = new LogUsersDevices();
                        $funcion = new Funciones();
                        $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                        $datos['log_users_devices'] = $log_users_devices;

                        if($log_users_devices->app['estado'] == 1)
                        {
                            $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
                            $hora_medica->id_log_users_devices = $log_users_devices->app['last_id'];
                            if($hora_medica->save())
                            {
                                $datos['hora_medica_update']['estado'] = 1;
                                $datos['hora_medica_update']['msj'] = 'autorizacion';
                            }
                        }
                    }
                }
            }
        }

        // nombre_paciente
        // fecha
        // hora
        // profesional_nombre
        // profesional_especialidad
        // profesional_tipo_especialidad
        // profesional_sub_tipo_especialidad
        // profesional_sub_tipo_especialidad
        // lugar_atencion
        // direccion

        /** envio de correo de confirmacion INSTITUCION */
        $blade = 'hora_agendada';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Nueva Hora Agendada';
        $body = array(
            'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
            'fecha'=> $hora_medica->fecha_consulta,
            'hora'=> $hora_medica->hora_inicio,
            'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
            'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
            'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
            'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre ?? null, // Si no existe, no se muestra
            // 'institucion'=> $nombre_institucion,
            'lugar_atencion'=> $lugar_atencion->nombre,
            'direccion'=> $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
        );
        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['mail']['institucion']['estado'] = 1;
            $datos['mail']['institucion']['msj'] = 'Notificacion de bienvenida enviado';
        }
        else
        {
            $datos['mail']['institucion']['estado'] = 0;
            $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
        }

        // $details = [
        //     'title' => 'Hora medica Reservada',
        //     'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
        //             Junto con saludar, por medio de este correo le informamos que se ha reservado su hora con exito <br>' .
        //         'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
        //         'Hora : ' . $hora_medica->hora_inicio . '<br>' .
        //         'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
        //         'Que tenga un excelente día. </br></br>' .
        //         'Saludos.',
        // ];

        //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

        $datos['estado'] = 1;
        return response()->json($datos);
    }

    public function getPerfilProfesional(Request $request){
        $id_profesional = $request->id_profesional;
        $datos = array();

        // PRUEBA: Si ves este mensaje, el archivo se está ejecutando correctamente
        $datos['debug_test'] = 'ARCHIVO_CORRECTO_EJECUTANDOSE';

        $profesional = Profesional::where('id', $id_profesional)->with('Especialidad', 'TipoEspecialidad', 'SubTipoEspecialidad', 'LugaresAtencion')->first();
        if($profesional)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';

            // busqueda de imagen
            $array_rut = explode('-',$profesional->rut);
            $nombre_imagen = asset('images/iconos/usuario_profesional.svg');

            if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
            {
                $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
            }

            // lugar atencion con direcciones
            $lugares_atencion_originales = $profesional->LugaresAtencion()->where('estado',1)->get();
            $lugares_atencion = [];

            $lugares_html = "<ul>";
            foreach ($lugares_atencion_originales as $lugar) {
                // Convertir el modelo a array y agregar información de dirección
                $lugar_array = $lugar->toArray();

                $direccion = Direccion::where('id', $lugar->id_direccion)->first();

                // Debug temporal - VERSIÓN ACTUALIZADA
                $lugar_array['debug_id_direccion'] = $lugar->id_direccion;
                $lugar_array['debug_direccion_encontrada'] = $direccion ? 'SI' : 'NO';
                $lugar_array['debug_version'] = 'V2024_ACTUALIZADA';

                if($direccion) {
                    $direccion_texto = trim($direccion->direccion).' '.trim($direccion->numero_dir);
                    $lugar_array['direccion'] = $direccion_texto;
                    $lugar_array['direccion_completa'] = $direccion_texto;
                    $lugar_array['debug_direccion_campos'] = [
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir
                    ];
                    $lugares_html .= "<li>".$lugar->nombre." - ".$direccion_texto."</li>";
                } else {
                    $lugar_array['direccion'] = 'Dirección no disponible';
                    $lugar_array['direccion_completa'] = 'Dirección no disponible';
                    $lugares_html .= "<li>".$lugar->nombre." - Dirección no disponible</li>";
                }

                $lugares_atencion[] = $lugar_array;
            }
            $lugares_html .= "</ul> <!-- VERSION_ACTUALIZADA -->";

            // Convertir el profesional a array y modificar
            $profesional_array = $profesional->toArray();
            $profesional_array['lugares_atencion'] = $lugares_atencion;
            $profesional_array['lugares_atencion_html'] = $lugares_html;
            $profesional_array['img_profesional'] = $nombre_imagen;

            // Asignar el profesional modificado
            $datos['profesional'] = $profesional_array;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return response()->json($datos);
    }

    //RECETAS ONLINE
    public function getMisExamenes(Request $request)
    {
        $user = $request->user('api');
        $paciente = $user
            ? Paciente::where('id_usuario', $user->id)->first()
            : null;

        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No se encontró un perfil de paciente asociado a la cuenta.',
                'registros' => [],
            ], 404);
        }

        $ordenes = ExamenPPF::query()
            ->select([
                'examenes_ppf.*',
                'profesionales.nombre as profesional_nombre',
                'profesionales.apellido_uno as profesional_apellido_uno',
                'profesionales.apellido_dos as profesional_apellido_dos',
            ])
            ->leftJoin(
                'profesionales',
                'profesionales.id',
                '=',
                'examenes_ppf.id_profesional'
            )
            ->where('examenes_ppf.id_paciente', $paciente->id)
            ->latest('examenes_ppf.created_at')
            ->latest('examenes_ppf.id')
            ->get()
            ->groupBy(function ($examen) {
                return $examen->id_ficha_atencion
                    ? 'ficha-'.$examen->id_ficha_atencion
                    : 'examen-'.$examen->id;
            })
            ->map(function ($examenes) use ($request) {
                $primero = $examenes->first();
                $idFicha = $primero->id_ficha_atencion;
                $profesional = trim(implode(' ', array_filter([
                    $primero->profesional_nombre,
                    $primero->profesional_apellido_uno,
                    $primero->profesional_apellido_dos,
                ])));

                return [
                    'id' => 'orden-'.$primero->id,
                    'tipo_registro' => 'orden',
                    'numero_orden' => $idFicha ?: $primero->id,
                    'fecha' => $primero->created_at
                        ? Carbon::parse($primero->created_at)->format('Y-m-d H:i:s')
                        : null,
                    'nombre' => $examenes->pluck('examen')->filter()->unique()->implode(', '),
                    'profesional' => $profesional ?: null,
                    'estado_examen' => 'Orden emitida',
                    'cantidad_examenes' => $examenes->count(),
                    'archivos' => $idFicha ? [[
                        'nombre' => 'Ver orden de exámenes',
                        'url' => $request->getSchemeAndHttpHost().URL::temporarySignedRoute(
                            'api.paciente.examenes.orden.pdf',
                            now()->addMinutes(15),
                            ['ficha' => $idFicha],
                            false
                        ),
                    ]] : [],
                    'orden_fecha' => $primero->created_at,
                ];
            });

        $resultados = ResultadoExamen::query()
            ->with('ResultadoExamenArchivo')
            ->where('id_paciente', $paciente->id)
            ->where('estado', 1)
            ->latest('fecha_registro')
            ->latest('id')
            ->get()
            ->map(function (ResultadoExamen $resultado) use ($request) {
                $archivos = $resultado->ResultadoExamenArchivo
                    ->map(function (ResultadoExamenArchivo $archivo) use ($request, $resultado) {
                        return [
                            'nombre' => $archivo->nombre ?: 'Ver resultado',
                            'url' => $request->getSchemeAndHttpHost().URL::temporarySignedRoute(
                                'api.paciente.examenes.resultado',
                                now()->addMinutes(15),
                                [
                                    'resultado' => $resultado->id,
                                    'archivo' => $archivo->id,
                                ],
                                false
                            ),
                        ];
                    })
                    ->values()
                    ->all();

                return [
                    'id' => 'resultado-'.$resultado->id,
                    'tipo_registro' => 'resultado',
                    'numero_orden' => $resultado->id,
                    'fecha' => $resultado->fecha_registro
                        ?: optional($resultado->created_at)->format('Y-m-d H:i:s'),
                    'nombre' => $resultado->nombre_examen ?: 'Resultado de examen',
                    'profesional' => $resultado->profesional_nombre,
                    'estado_examen' => !empty($archivos)
                        ? 'Resultado disponible'
                        : 'Resultado en proceso',
                    'cantidad_examenes' => (int) ($resultado->cantidad ?: 1),
                    'archivos' => $archivos,
                    'orden_fecha' => $resultado->fecha_registro ?: $resultado->created_at,
                ];
            });

        $registros = $resultados
            ->concat($ordenes)
            ->sortByDesc('orden_fecha')
            ->map(function ($registro) {
                unset($registro['orden_fecha']);
                return $registro;
            })
            ->values();

        return response()->json([
            'estado' => 1,
            'mensaje' => $registros->isEmpty()
                ? 'No hay órdenes ni resultados de exámenes registrados.'
                : 'Exámenes obtenidos correctamente.',
            'cantidad' => $registros->count(),
            'registros' => $registros,
        ]);
    }

    public function verMiOrdenExamenPdf(Request $request, $ficha)
    {
        abort_unless(
            ExamenPPF::where('id_ficha_atencion', $ficha)->exists(),
            404
        );

        return app(DocumentoController::class)
            ->verExamenPDF(new Request(['id' => $ficha]));
    }

    public function verMiResultadoExamen(Request $request, $resultado, $archivo)
    {
        $registro = ResultadoExamenArchivo::where('id', $archivo)
            ->where('id_resultado_examen', $resultado)
            ->where('estado', 1)
            ->firstOrFail();

        return redirect()->away($registro->url);
    }

    private function agendaApp($query, Request $request, $rol)
    {
        return $query->select([
                'horas_medicas.*',
                'pacientes.nombres as paciente_nombres',
                'pacientes.apellido_uno as paciente_apellido',
                'profesionales.nombre as profesional_nombre',
                'profesionales.apellido_uno as profesional_apellido',
                'lugares_atencion.nombre as lugar_nombre',
                'parametros.valor as estado_nombre',
            ])
            ->join('pacientes', 'pacientes.id', '=', 'horas_medicas.id_paciente')
            ->join('profesionales', 'profesionales.id', '=', 'horas_medicas.id_profesional')
            ->join('lugares_atencion', 'lugares_atencion.id', '=', 'horas_medicas.id_lugar_atencion')
            ->leftJoin('parametros', function ($join) {
                $join->on('parametros.id', '=', 'horas_medicas.id_estado')
                    ->where('parametros.referencia', '=', 'Agenda_Estado');
            })
            ->when(
                $request->filled('fecha'),
                function ($agenda) use ($request) {
                    $agenda->whereDate('horas_medicas.fecha_consulta', $request->input('fecha'));
                },
                function ($agenda) {
                    $agenda->whereDate('horas_medicas.fecha_consulta', '>=', now()->subDay()->toDateString());
                }
            )
            ->orderBy('horas_medicas.fecha_consulta')
            ->orderBy('horas_medicas.hora_inicio')
            ->get()
            ->map(function ($hora) use ($request, $rol) {
                $inicio = Carbon::parse($hora->fecha_consulta.' '.$hora->hora_inicio);
                $termino = Carbon::parse($hora->fecha_consulta.' '.$hora->hora_termino);
                $telemedicina = in_array((string) $hora->tipo_hora_medica, ['T', '3'], true)
                    || !empty($hora->id_jitsi_video_consulta);
                $puedeConectarse = $telemedicina
                    && !empty($hora->id_jitsi_video_consulta)
                    && now()->between($inicio->copy()->subMinutes(15), $termino->copy()->addMinutes(60));

                return [
                    'id' => $hora->id,
                    'fecha' => $hora->fecha_consulta,
                    'fecha_consulta' => $hora->fecha_consulta,
                    'hora_inicio' => $hora->hora_inicio,
                    'hora_termino' => $hora->hora_termino,
                    'id_estado' => $hora->id_estado,
                    'estado' => $hora->estado_nombre ?: 'Sin estado',
                    'es_telemedicina' => $telemedicina,
                    'puede_conectarse' => $puedeConectarse,
                    'lugar' => $hora->lugar_nombre,
                    'id_lugar_atencion' => $hora->id_lugar_atencion,
                    'paciente' => trim($hora->paciente_nombres.' '.$hora->paciente_apellido),
                    'profesional' => trim($hora->profesional_nombre.' '.$hora->profesional_apellido),
                    'nombre_profesional' => $hora->profesional_nombre,
                    'apellido_uno_profesional' => $hora->profesional_apellido,
                    'nombre_lugar_atencion' => $hora->lugar_nombre,
                    'video_url' => $puedeConectarse
                        ? $request->getSchemeAndHttpHost().URL::temporarySignedRoute(
                            'api.agenda.videollamada',
                            $termino->copy()->addMinutes(60),
                            ['hora' => $hora->id, 'rol' => $rol],
                            false
                        )
                        : null,
                ];
            });
    }

    public function getAgendaPacienteApp(Request $request)
    {
        $paciente = Paciente::where('id_usuario', $request->user('api')->id)->first();
        abort_unless($paciente, 404);

        $agenda = $this->agendaApp(
            HoraMedica::query()->where('horas_medicas.id_paciente', $paciente->id),
            $request,
            'paciente'
        );

        return response()->json(['estado' => 1, 'registros' => $agenda, 'horas' => $agenda]);
    }

    public function getAgendaProfesionalApp(Request $request)
{
    $request->validate([
        'id_lugar_atencion' => ['nullable', 'integer'],
        'fecha' => ['nullable', 'date_format:Y-m-d'],
    ]);

    $profesional = Profesional::where(
        'id_usuario',
        $request->user('api')->id
    )->first();

    abort_unless($profesional, 404);

    /*
     * Solo lugares actualmente activos para el profesional.
     * ProfesionalesLugaresAtencion es la relación vigente.
     */
    $idsLugaresActivos = ProfesionalesLugaresAtencion::where(
            'id_profesional',
            $profesional->id
        )
        ->where('estado', 1)
        ->pluck('id_lugar_atencion');

    /*
     * La agenda también queda restringida a lugares activos.
     * Así no mostramos horas médicas asociadas a lugares
     * que actualmente están deshabilitados.
     */
    $base = HoraMedica::query()
        ->where('horas_medicas.id_profesional', $profesional->id)
        ->whereIn(
            'horas_medicas.id_lugar_atencion',
            $idsLugaresActivos
        );

    /*
     * Selector de lugares:
     * solo lugares activos que además tengan horas médicas.
     */
    $lugares = (clone $base)
        ->join(
            'lugares_atencion',
            'lugares_atencion.id',
            '=',
            'horas_medicas.id_lugar_atencion'
        )
        ->select(
            'lugares_atencion.id',
            'lugares_atencion.nombre'
        )
        ->distinct()
        ->orderBy('lugares_atencion.nombre')
        ->get();

    /*
     * Si el usuario selecciona un lugar específico,
     * debe estar dentro de los lugares activos.
     */
    if ($request->filled('id_lugar_atencion')) {

        $idLugar = (int) $request->input('id_lugar_atencion');

        if (!$idsLugaresActivos->contains($idLugar)) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'El lugar de atención seleccionado no está activo.',
                'lugares' => $lugares,
                'registros' => [],
            ], 422);
        }

        $base->where(
            'horas_medicas.id_lugar_atencion',
            $idLugar
        );
    }

    return response()->json([
        'estado' => 1,
        'lugares' => $lugares,
        'registros' => $this->agendaApp(
            $base,
            $request,
            'profesional'
        ),
    ]);
}

    public function getMisPacientesProfesionalApp(Request $request)
    {
        $data = $request->validate([
            'buscar' => ['nullable', 'string', 'max:100'],
            'pagina' => ['nullable', 'integer', 'min:1'],
            'por_pagina' => ['nullable', 'integer', 'min:1', 'max:50'],
        ]);

        $profesional = Profesional::where('id_usuario', $request->user('api')->id)->first();
        abort_unless($profesional, 404);

        $atenciones = FichaAtencion::query()
            ->select('id_paciente')
            ->selectRaw('MAX(created_at) as ultima_atencion')
            ->selectRaw('COUNT(*) as total_atenciones')
            ->where('id_profesional', $profesional->id)
            ->where('finalizada', 1)
            ->groupBy('id_paciente');

        $pacientes = Paciente::query()
            ->joinSub($atenciones, 'atenciones_profesional', function ($join) {
                $join->on('atenciones_profesional.id_paciente', '=', 'pacientes.id');
            })
            ->select([
                'pacientes.id',
                'pacientes.nombres',
                'pacientes.apellido_uno',
                'pacientes.apellido_dos',
                'pacientes.rut',
                'pacientes.email',
                'pacientes.telefono_uno',
                'pacientes.fecha_nac',
                'atenciones_profesional.ultima_atencion',
                'atenciones_profesional.total_atenciones',
            ]);

        $buscar = trim((string) ($data['buscar'] ?? ''));
        if ($buscar !== '') {
            foreach (preg_split('/\s+/', $buscar) as $termino) {
                $pacientes->where(function ($query) use ($termino) {
                    $like = '%'.$termino.'%';
                    $query->where('pacientes.nombres', 'like', $like)
                        ->orWhere('pacientes.apellido_uno', 'like', $like)
                        ->orWhere('pacientes.apellido_dos', 'like', $like)
                        ->orWhere('pacientes.rut', 'like', $like)
                        ->orWhere('pacientes.email', 'like', $like)
                        ->orWhere('pacientes.telefono_uno', 'like', $like);
                });
            }
        }

        $porPagina = (int) ($data['por_pagina'] ?? 20);
        $resultado = $pacientes
            ->orderByDesc('atenciones_profesional.ultima_atencion')
            ->orderBy('pacientes.apellido_uno')
            ->paginate($porPagina, ['*'], 'pagina', (int) ($data['pagina'] ?? 1));

        return response()->json([
            'estado' => 1,
            'registros' => collect($resultado->items())->map(function ($paciente) {
                return [
                    'id' => $paciente->id,
                    'nombre' => trim($paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                    'rut' => $paciente->rut,
                    'email' => $paciente->email,
                    'telefono' => $paciente->telefono_uno,
                    'fecha_nacimiento' => $paciente->fecha_nac,
                    'ultima_atencion' => $paciente->ultima_atencion,
                    'total_atenciones' => (int) $paciente->total_atenciones,
                ];
            })->values(),
            'paginacion' => [
                'pagina_actual' => $resultado->currentPage(),
                'ultima_pagina' => $resultado->lastPage(),
                'por_pagina' => $resultado->perPage(),
                'total' => $resultado->total(),
            ],
        ]);
    }

    public function ingresarVideollamadaApp(Request $request, $hora, $rol)
    {
        $cita = HoraMedica::findOrFail($hora);
        $jitsi = JitsiVideo::findOrFail($cita->id_jitsi_video_consulta);

        return redirect()->away(
            rtrim(env('JITSI_LINK_MEET'), '/').'/'.trim(env('JITSI_APP_ID'), '/').'/'.$jitsi->nombre_grupo
        );
    }

    public function getPerfilApp(Request $request)
    {
        $rol = $request->input('rol') === 'Profesional' ? 'Profesional' : 'Paciente';
        $perfil = $rol === 'Profesional'
            ? Profesional::where('id_usuario', $request->user('api')->id)->first()
            : Paciente::where('id_usuario', $request->user('api')->id)->first();

        abort_unless($perfil, 404);

        return response()->json([
            'estado' => 1,
            'rol' => $rol,
            'perfil' => [
                'nombres' => $rol === 'Profesional' ? $perfil->nombre : $perfil->nombres,
                'apellido_uno' => $perfil->apellido_uno,
                'apellido_dos' => $perfil->apellido_dos,
                'telefono_uno' => $perfil->telefono_uno,
                'telefono_dos' => $perfil->telefono_dos,
                'email' => $perfil->email,
                'foto_perfil' => $perfil->foto_perfil,
                'foto_perfil_url' => $perfil->foto_perfil
                    ? asset('storage/'.ltrim($perfil->foto_perfil, '/'))
                    : null,
            ],
        ]);
    }

    public function actualizarPerfilApp(Request $request)
    {
        $data = $request->validate([
            'rol' => ['required', 'in:Paciente,Profesional'],
            'nombres' => ['required', 'string', 'max:120'],
            'apellido_uno' => ['required', 'string', 'max:80'],
            'apellido_dos' => ['nullable', 'string', 'max:80'],
            'telefono_uno' => ['required', 'string', 'max:30'],
            'telefono_dos' => ['nullable', 'string', 'max:30'],
        ]);

        $perfil = $data['rol'] === 'Profesional'
            ? Profesional::where('id_usuario', $request->user('api')->id)->first()
            : Paciente::where('id_usuario', $request->user('api')->id)->first();
        abort_unless($perfil, 404);

        $perfil->{$data['rol'] === 'Profesional' ? 'nombre' : 'nombres'} = trim($data['nombres']);
        $perfil->apellido_uno = trim($data['apellido_uno']);
        $perfil->apellido_dos = trim((string) ($data['apellido_dos'] ?? ''));
        $perfil->telefono_uno = trim($data['telefono_uno']);
        $perfil->telefono_dos = trim((string) ($data['telefono_dos'] ?? ''));
        $perfil->save();

        return response()->json(['estado' => 1, 'msj' => 'Perfil actualizado correctamente.']);
    }

    public function actualizarFotoPerfilApp(Request $request)
    {
        $data = $request->validate([
            'rol' => ['required', 'in:Paciente,Profesional'],
            'foto' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ]);

        $perfil = $data['rol'] === 'Profesional'
            ? Profesional::where('id_usuario', $request->user('api')->id)->first()
            : Paciente::where('id_usuario', $request->user('api')->id)->first();
        abort_unless($perfil, 404);

        $fotoAnterior = $perfil->foto_perfil;
        $carpeta = $data['rol'] === 'Profesional'
            ? 'perfiles/profesionales'
            : 'perfiles/pacientes';
        $ruta = $request->file('foto')->store($carpeta, 'public');

        $perfil->foto_perfil = $ruta;
        $perfil->save();

        if ($fotoAnterior && $fotoAnterior !== $ruta && Storage::disk('public')->exists($fotoAnterior)) {
            Storage::disk('public')->delete($fotoAnterior);
        }

        return response()->json([
            'estado' => 1,
            'msj' => 'Foto de perfil actualizada correctamente.',
            'foto_perfil' => $ruta,
            'foto_perfil_url' => asset('storage/'.$ruta),
        ]);
    }

    public function cambiarClaveDispositivoApp(Request $request)
    {
        $data = $request->validate([
            'uuid' => ['required', 'string', 'max:255'],
            'clave_actual' => ['required', 'digits:4'],
            'clave_nueva' => ['required', 'digits:4', 'different:clave_actual'],
            'clave_nueva_confirmation' => ['required', 'same:clave_nueva'],
        ]);

        $dispositivo = UsersDevices::where('id_user', $request->user('api')->id)
            ->where('uuid', $data['uuid'])
            ->where('estado', 1)
            ->orderByDesc('id')
            ->first();

        if (!$dispositivo) {
            return response()->json([
                'estado' => 0,
                'message' => 'El dispositivo activo no pertenece a esta cuenta.',
            ], 404);
        }

        if (!hash_equals((string) $dispositivo->password, (string) $data['clave_actual'])) {
            return response()->json([
                'estado' => 0,
                'message' => 'La clave actual no es correcta.',
                'errors' => ['clave_actual' => ['La clave actual no es correcta.']],
            ], 422);
        }

        $dispositivo->password = $data['clave_nueva'];
        $dispositivo->save();

        return response()->json([
            'estado' => 1,
            'msj' => 'Clave del dispositivo actualizada correctamente.',
        ]);
    }

    public function getMisRecetas(Request $request)
    {
        $user = $request->user('api');
        $paciente = $user
            ? Paciente::where('id_usuario', $user->id)->first()
            : null;

        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No se encontró un perfil de paciente asociado a la cuenta.',
                'registros' => [],
            ], 404);
        }

        $recetas = Recomendacion::query()
            ->select([
                'recomendacion.id',
                'recomendacion.atencion',
                'recomendacion.created_at',
                'fichas_atenciones.hipotesis_diagnostico',
                'profesionales.nombre as profesional_nombre',
                'profesionales.apellido_uno as profesional_apellido_uno',
                'profesionales.apellido_dos as profesional_apellido_dos',
            ])
            ->join(
                'fichas_atenciones',
                'fichas_atenciones.id',
                '=',
                'recomendacion.atencion'
            )
            ->leftJoin(
                'profesionales',
                'profesionales.id',
                '=',
                'fichas_atenciones.id_profesional'
            )
            ->where('fichas_atenciones.id_paciente', $paciente->id)
            ->whereExists(function ($query) {
                $query->selectRaw('1')
                    ->from('recomendacion_detalle')
                    ->whereColumn(
                        'recomendacion_detalle.id_recomendacion',
                        'recomendacion.id'
                    );
            })
            ->latest('recomendacion.created_at')
            ->latest('recomendacion.id')
            ->get();

        $registros = $recetas->map(function ($receta) use ($request) {
            $detalles = RecomendacionDetalle::where('id_recomendacion', $receta->id)
                ->get(['control']);
            $tipos = [];

            foreach ($detalles as $detalle) {
                try {
                    $idControl = decrypt($detalle->control);
                    $descripcion = \App\Models\RecetaControl::where('tipo_control', $idControl)
                        ->value('descripcion');

                    if ($descripcion) {
                        $tipos[] = trim($descripcion);
                    }
                } catch (\Throwable $exception) {
                    // Registros históricos pueden no tener el formato cifrado actual.
                }
            }

            $tipos = array_values(array_unique($tipos));
            $nombreProfesional = trim(implode(' ', array_filter([
                $receta->profesional_nombre,
                $receta->profesional_apellido_uno,
                $receta->profesional_apellido_dos,
            ])));

            return [
                'id' => $receta->id,
                'id_ficha_atencion' => $receta->atencion,
                'fecha_emision' => $receta->created_at
                    ? Carbon::parse($receta->created_at)->format('Y-m-d H:i:s')
                    : null,
                'tipo' => !empty($tipos) ? implode(', ', $tipos) : 'Receta médica',
                'diagnostico' => $receta->hipotesis_diagnostico,
                'profesional' => $nombreProfesional ?: null,
                'cantidad_medicamentos' => $detalles->count(),
                'pdf_url' => $request->getSchemeAndHttpHost().URL::temporarySignedRoute(
                    'api.paciente.recetas.pdf',
                    now()->addMinutes(15),
                    ['receta' => $receta->id],
                    false
                ),
            ];
        })->values();

        return response()->json([
            'estado' => 1,
            'mensaje' => $registros->isEmpty()
                ? 'No hay recetas registradas.'
                : 'Recetas obtenidas correctamente.',
            'cantidad' => $registros->count(),
            'registros' => $registros,
        ]);
    }

    public function verMiRecetaPdf(Request $request, $receta)
    {
        $registro = Recomendacion::findOrFail($receta);
        $pdfRequest = new Request(['id' => $registro->id]);

        return app(DocumentoController::class)->verRecetaPDF($pdfRequest);
    }
    public function getMisLicencias(Request $request) {

        $datos = [];
        $error = [];
        $campos_requeridos = 0;

        // Validación mínima
        if (empty($request->id_paciente) || (int)$request->id_paciente == 0) {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if ($campos_requeridos == 0) {

            // Buscar paciente en base al id_usuario recibido
            $paciente = Paciente::where('id_usuario', $request->id_paciente)->first();

            if (!$paciente) {
                return response([
                    'estado' => 0,
                    'msg' => 'Paciente no encontrado',
                    'request' => $request->all()
                ])->header('Content-Type', 'application/json');
            }

            // ⚡ NUEVO: obtener todas las licencias del paciente
            $licencias = Licencia::where('id_paciente', $paciente->id)
                                ->orderBy('id', 'desc')
                                ->get();

            // Si tiene licencias
            $datos['estado'] = 1;
            $datos['licencias'] = $licencias;
            $datos['total'] = $licencias->count();
            $datos['request'] = $request->all();

        } else {

            // Error por falta de campos
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function getMisCertificados(Request $request) {

        $datos = [];
        $error = [];
        $campos_requeridos = 0;

        // Validación mínima
        if (empty($request->id_paciente) || (int)$request->id_paciente == 0) {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if ($campos_requeridos == 0) {

            // Buscar paciente por id_usuario
            $paciente = Paciente::where('id_usuario', $request->id_paciente)->first();

            if (!$paciente) {
                return response([
                    'estado' => 0,
                    'msg' => 'Paciente no encontrado',
                    'request' => $request->all()
                ])->header('Content-Type', 'application/json');
            }

            // ⚡ NUEVO: obtener certificados de reposo
            $certificados = CertificadoReposo::where('id_paciente', $paciente->id)
                                            ->orderBy('id', 'desc')
                                            ->get();

            // Respuesta final
            $datos['estado'] = 1;
            $datos['certificados'] = $certificados;
            $datos['total'] = $certificados->count();
            $datos['request'] = $request->all();

        } else {
            // Error por falta de campos
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function getMisDocumentos(Request $request) {

        $datos = [];
        $error = [];
        $campos_requeridos = 0;

        // Validación mínima
        if (empty($request->id_paciente) || (int)$request->id_paciente == 0) {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if ($campos_requeridos == 0) {

            // Buscar paciente por id_usuario
            $paciente = Paciente::where('id_usuario', $request->id_paciente)->first();

            if (!$paciente) {
                return response([
                    'estado' => 0,
                    'msg' => 'Paciente no encontrado',
                    'request' => $request->all()
                ])->header('Content-Type', 'application/json');
            }

            // 🔥 NUEVO: obtener documentos del paciente
            $documentos = DocumentoFcPaciente::where('id_paciente', $paciente->id)
                                            ->orderBy('id', 'desc')
                                            ->get();

            // Respuesta final
            $datos['estado'] = 1;
            $datos['documentos'] = $documentos;
            $datos['total'] = $documentos->count();
            $datos['request'] = $request->all();

        } else {
            // Error por falta de campos
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function getMisControles(Request $request) {
        return $request;
    }

    public function anularHoraMedica(Request $request){
        $hora_medica = HoraMedica::where('id', $request->id_hora)->first();

        $hora_medica->comentarios_cancelacion = 'Cancelada por paciente desde app';
        $hora_medica->fecha_cancelacion = Carbon::now();
        $hora_medica->id_estado = 3;
        $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }


        $notificacion = NotificacionConfirmacion::where('tipo_notificacion',1)
                                                ->where('id_evento',$hora_medica->id)
                                                ->first();
        $datos['notificacion'] = $notificacion;
        if($notificacion)
        {
            /** cambiar estado notificacion */
            $notificacion->medio_confirmacion = $request->medio_confirmacion;
            $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
            $notificacion->estado_confirmacion = 3; // RECHAZADA
            if($notificacion->save())
            {
                /** notificacion actualizada */
                $datos['notificacion']['update'] = 'notificacion Actualzada';
            }
            else
            {
                $datos['notificacion']['update'] = 'falla al actualizar notificacion';
            }

            /** cambiar estado de log */
            $id_log_users_devices = $notificacion->id_log_users_devices;
            if(!empty($id_log_users_devices))
            {
                $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                $log_users_devices->estado = 3; //RECHAZADA
                if($log_users_devices->save())
                {
                    /** log_users_devices */
                    $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                }
                else
                {
                    $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                }
            }
            else
            {
                $datos['log_users_devices']['update'] = 'no posee log_users_devices';
            }
        }

        /** enviar correo de confirmada */
        $paciente = $hora_medica->Paciente()->first();
        $profesional = $hora_medica->Profesional()->first();
        $lugar_atencion = $hora_medica->LugarAtencion()->first();

        $blade = 'hora_cancelada_paciente';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Reserva de Hora Cancelada';
        if(!empty($profesional))
        {
            $body = array(
                'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                'fecha'=> $hora_medica->fecha_evento,
                'hora'=> $hora_medica->hora_evento,
                'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
                'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre ?? null, // Si no existe, no se muestra
                // 'institucion'=> $nombre_institucion,
                'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
            );
        }
        else
        {
            $body = array(
                'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                'fecha'=> $hora_medica->fecha_evento,
                'hora'=> $hora_medica->hora_evento,
                // 'institucion'=> $nombre_institucion,
                'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
            );
        }

        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['mail'] = 'Notificacion de cancelacion enviado';
        }
        else
        {
            $datos['mail'] = 'Falle en envio de Notificacion de cancelada';
        }

        $datos['estado'] = 1;
        $datos['msj'] = 'Hora Cancelada';

        return response()->json($datos);
    }

    public function dameRegiones(){
        $regiones = Region::all();
        return response()->json([
            'estado' => 1,
            'regiones' => $regiones
        ]);
    }

    public function dameCiudades(Request $request){
        $id = $request->id_region;
        $ciudades = Ciudad::where('id_region',$id)->get();
        return response()->json([
            'estado' => 1,
            'ciudades' => $ciudades
        ]);
    }

    public function buscarProfesionales(Request $request){
        // Validación de token X-Auth-Token
        $authToken = $request->header('X-Auth-Token');
        if (!$authToken) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación requerido'
            ], 401);
        }

        // Buscar el token en la base de datos
        $token = PersonalAccessToken::findToken($authToken);
        if (!$token) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación inválido'
            ], 401);
        }

        // Verificar que el token no haya expirado
        if ($token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Token de autenticación expirado'
            ], 401);
        }

        // Obtener el usuario autenticado del token
        $user = $token->tokenable;
        if (!$user) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Usuario no encontrado'
            ], 401);
        }

        // Validar y limpiar parámetros de entrada
        $id_region = $request->filled('id_region') && $request->id_region != '0' && $request->id_region != '' ? $request->id_region : null;
        $id_ciudad = $request->filled('id_ciudad') && $request->id_ciudad != '0' && $request->id_ciudad != '' ? $request->id_ciudad : null;
        $id_especialidad = $request->filled('id_especialidad') && $request->id_especialidad != '0' && $request->id_especialidad != '' ? $request->id_especialidad : null;
        $id_tipo_especialidad = $request->filled('id_tipo_especialidad') && $request->id_tipo_especialidad != '0' && $request->id_tipo_especialidad != '' ? $request->id_tipo_especialidad : null;
        $id_sub_tipo_especialidad = $request->filled('id_sub_tipo_especialidad') && $request->id_sub_tipo_especialidad != '0' && $request->id_sub_tipo_especialidad != '' ? $request->id_sub_tipo_especialidad : null;
        $nombre_profesional = $request->filled('nombre_profesional') && trim($request->nombre_profesional) != '' ? strtolower(trim($request->nombre_profesional)) : null;

        // Validar que al menos se envíe región o ciudad
        if (!$id_region && !$id_ciudad) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Debe seleccionar al menos una región o ciudad para realizar la búsqueda',
                'registros' => []
            ], 400);
        }

        // buscamos las ciudades correspondiente a la region o ciudad específica
        $ciudades = collect();
        $ciudad = null;

        if ($id_ciudad) {
            // Si se especifica ciudad, buscar esa ciudad específica
            $ciudad = Ciudad::find($id_ciudad);
            if ($ciudad) {
                $ciudades = collect([$ciudad]);
            }
        } elseif ($id_region) {
            // Si solo se especifica región, buscar todas las ciudades de esa región
            $ciudades = Ciudad::where('id_region', $id_region)->get();
        }

        if ($ciudades->isEmpty()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No se encontraron ciudades para los criterios especificados',
                'registros' => []
            ], 404);
        }

        // direcciones en las ciudades encontradas
        $ids_ciudades = $ciudades->pluck('id')->toArray();
        $direcciones = Direccion::whereIn('id_ciudad', $ids_ciudades)->get();

        // lugares de atención
        $ids_direcciones = $direcciones->pluck('id')->toArray();
        $lugares_atencion = LugarAtencion::whereIn('id_direccion', $ids_direcciones)->get();

        // Obtener profesionales con todos los filtros aplicados
        $ids_lugares_atencion = $lugares_atencion->pluck('id')->toArray();

        // Construir query base para profesionales
        $query = Profesional::whereHas('LugaresAtencion', function($q) use ($ids_lugares_atencion) {
            $q->whereIn('lugares_atencion.id', $ids_lugares_atencion)
              ->where('profesionales_lugares_atencion.estado', 1);
        })->with(['Especialidad', 'TipoEspecialidad', 'SubTipoEspecialidad']);

        // Aplicar filtros si están presentes
        if ($id_especialidad) {
            $query->where('id_especialidad', $id_especialidad);
        }

        if ($id_tipo_especialidad) {
            $query->where('id_tipo_especialidad', $id_tipo_especialidad);
        }

        if ($id_sub_tipo_especialidad) {
            $query->where('id_sub_tipo_especialidad', $id_sub_tipo_especialidad);
        }

        // Filtro por nombre del profesional
        if ($nombre_profesional) {
            $query->where(function($q) use ($nombre_profesional) {
                $q->whereRaw('LOWER(nombre) LIKE ?', ["%{$nombre_profesional}%"])
                  ->orWhereRaw('LOWER(apellido_uno) LIKE ?', ["%{$nombre_profesional}%"])
                  ->orWhereRaw('LOWER(apellido_dos) LIKE ?', ["%{$nombre_profesional}%"])
                  ->orWhereRaw('LOWER(CONCAT(nombre, " ", apellido_uno, " ", apellido_dos)) LIKE ?', ["%{$nombre_profesional}%"]);
            });
        }

        $profesionales_lugares_atencion = $query->get();

        // Enriquecer información de profesionales
        foreach($profesionales_lugares_atencion as $prof){
            // Obtener lugares de atención del profesional
            $lugares_prof = $prof->LugaresAtencion()->where('profesionales_lugares_atencion.estado', 1)->get();
            $nombres_lugares = $lugares_prof->pluck('nombre')->toArray();

            $prof->nombre_lugar_atencion = implode(', ', $nombres_lugares);
            $prof->lugares_atencion_detalle = $lugares_prof;

            // Información de especialidad
            $prof->nombre_especialidad = $prof->Especialidad ? $prof->Especialidad->nombre : '';
            $prof->nombre_tipo_especialidad = $prof->TipoEspecialidad ? $prof->TipoEspecialidad->nombre : '';
            $prof->nombre_sub_tipo_especialidad = $prof->SubTipoEspecialidad ? $prof->SubTipoEspecialidad->nombre : '';

            // Buscar imagen de perfil
            $array_rut = explode('-', $prof->rut);
            $nombre_imagen = asset('images/iconos/usuario_profesional.svg');

            if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png'))) {
                $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
            }
            $prof->img_profesional = $nombre_imagen;
        }

        $profesionales_lugares_atencion = $profesionales_lugares_atencion
            ->map(function ($prof) use ($ids_lugares_atencion) {
                $lugares = collect($prof->lugares_atencion_detalle)
                    ->whereIn('id', $ids_lugares_atencion)
                    ->map(function ($lugar) {
                        return [
                            'id' => $lugar->id,
                            'nombre' => $lugar->nombre,
                        ];
                    })
                    ->values();

                return [
                    'id' => $prof->id,
                    'nombre' => $prof->nombre,
                    'apellido_uno' => $prof->apellido_uno,
                    'apellido_dos' => $prof->apellido_dos,
                    'sexo' => $prof->sexo,
                    'foto_perfil' => $prof->foto_perfil,
                    'img_profesional' => $prof->img_profesional,
                    'nombre_especialidad' => $prof->nombre_especialidad,
                    'nombre_tipo_especialidad' => $prof->nombre_tipo_especialidad,
                    'nombre_sub_tipo_especialidad' => $prof->nombre_sub_tipo_especialidad,
                    'nombre_lugar_atencion' => $lugares->pluck('nombre')->implode(', '),
                    'lugares_atencion' => $lugares,
                ];
            })
            ->values();

        return response()->json([
            'estado' => 1,
            'mensaje' => count($profesionales_lugares_atencion) . ' profesionales encontrados',
            'total_resultados' => count($profesionales_lugares_atencion),
            'filtros_aplicados' => [
                'region' => $id_region,
                'ciudad' => $id_ciudad,
                'especialidad' => $id_especialidad,
                'tipo_especialidad' => $id_tipo_especialidad,
                'sub_tipo_especialidad' => $id_sub_tipo_especialidad,
                'nombre_profesional' => $nombre_profesional
            ],
            'ciudades' => $ciudades,
            'direcciones' => $direcciones,
            'ciudad' => $ciudad,
            'lugares_atencion' => $lugares_atencion,
            'profesionales' => $profesionales_lugares_atencion
        ]);


    }

    public function confirmarHoraMedica(Request $request){
        $request->validate([
            'id_hora' => ['required', 'integer'],
        ]);

        $paciente = Paciente::where('id_usuario', $request->user('api')->id)->first();
        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'msj' => 'No se encontró el perfil del paciente.',
            ], 404);
        }

        return DB::transaction(function () use ($request, $paciente) {
            $horaMedica = HoraMedica::where('id', (int) $request->input('id_hora'))
                ->where('id_paciente', $paciente->id)
                ->lockForUpdate()
                ->first();

            if (!$horaMedica) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'La hora médica no existe o no pertenece al paciente.',
                ], 404);
            }

            $inicio = Carbon::parse($horaMedica->fecha_consulta.' '.$horaMedica->hora_inicio);
            if ($inicio->isPast()) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'No es posible confirmar una hora que ya comenzó.',
                ], 422);
            }

            if ((int) $horaMedica->id_estado === 2) {
                return response()->json([
                    'estado' => 1,
                    'msj' => 'La hora ya se encontraba confirmada.',
                    'hora' => $horaMedica,
                ]);
            }

            if ((int) $horaMedica->id_estado !== 1) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'La hora no se encuentra en estado Reservada.',
                ], 422);
            }

            $fechaConfirmacion = now();
            $horaMedica->id_estado = 2;
            $horaMedica->estado_confirmacion_paciente = 1;
            $horaMedica->fecha_confirmacion_paciente = $fechaConfirmacion;
            $horaMedica->fecha_confirmacion = $fechaConfirmacion;
            $horaMedica->comentarios_confirmacion = 'Confirmada por el paciente desde la app MED-SDI';
            $horaMedica->save();

            $notificacion = NotificacionConfirmacion::where('tipo_notificacion', 1)
                ->where('id_evento', $horaMedica->id)
                ->latest('id')
                ->first();

            if ($notificacion) {
                $notificacion->medio_confirmacion = 'app_movil';
                $notificacion->fecha_confirmacion = $fechaConfirmacion;
                $notificacion->estado_confirmacion = 2;
                $notificacion->save();

                if ($notificacion->id_log_users_devices) {
                    LogUsersDevices::where('id', $notificacion->id_log_users_devices)
                        ->update(['estado' => 2]);
                }
            }

            return response()->json([
                'estado' => 1,
                'msj' => 'Hora confirmada correctamente.',
                'hora' => [
                    'id' => $horaMedica->id,
                    'id_estado' => $horaMedica->id_estado,
                    'estado' => 'Confirmada',
                    'fecha_confirmacion' => $fechaConfirmacion->toDateTimeString(),
                ],
            ]);
        });
    }

    /**
     * Devuelve los consentimientos del paciente asociado al token móvil.
     *
     * El paciente se resuelve desde el usuario autenticado. No se acepta un
     * id_paciente enviado por la aplicación para evitar consultar documentos
     * pertenecientes a otra persona.
     */
    public function getMisConsentimientos(Request $request)
    {
        $user = $request->user('api');
        $paciente = $user
            ? Paciente::where('id_usuario', $user->id)->first()
            : null;

        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No se encontró un perfil de paciente asociado a la cuenta.',
                'registros' => [],
            ], 404);
        }

        $registros = ConConsentimientosPcte::query()
            ->with([
                'Consentimiento:id,nombre',
                'Profesional:id,nombre,apellido_uno,apellido_dos',
            ])
            ->where('id_paciente', $paciente->id)
            ->latest('fecha_cons')
            ->latest('id')
            ->get()
            ->map(function (ConConsentimientosPcte $registro) use ($request) {
                $profesional = $registro->Profesional;
                $nombreProfesional = $profesional
                    ? trim(implode(' ', array_filter([
                        $profesional->nombre,
                        $profesional->apellido_uno,
                        $profesional->apellido_dos,
                    ])))
                    : null;

                $estado = (int) $registro->revocacion === 1
                    ? 'Revocado'
                    : ((int) $registro->confirmacion === 1 ? 'Confirmado' : 'Pendiente');

                return [
                    'id' => $registro->id,
                    'numero' => $registro->num_consentimiento,
                    'tipo' => optional($registro->Consentimiento)->nombre ?: 'Consentimiento informado',
                    'fecha_emision' => $registro->fecha_cons
                        ? Carbon::parse($registro->fecha_cons)->format('Y-m-d H:i:s')
                        : null,
                    'profesional' => $nombreProfesional,
                    'estado_consentimiento' => $estado,
                    'pdf_url' => $request->getSchemeAndHttpHost().URL::temporarySignedRoute(
                        'api.paciente.consentimientos.pdf',
                        now()->addMinutes(15),
                        ['consentimiento' => $registro->id],
                        false
                    ),
                ];
            })
            ->values();

        return response()->json([
            'estado' => 1,
            'mensaje' => $registros->isEmpty()
                ? 'No hay consentimientos informados registrados.'
                : 'Consentimientos informados obtenidos correctamente.',
            'cantidad' => $registros->count(),
            'registros' => $registros,
        ]);
    }

    /**
     * Abre el PDF mediante una URL temporal firmada.
     */
    public function verMiConsentimientoPdf(Request $request, $consentimiento)
    {
        $registro = ConConsentimientosPcte::findOrFail($consentimiento);
        $pdfRequest = new Request([
            'id_consentimiento' => $registro->id,
            'id_ficha_atencion' => $registro->id_fc,
        ]);

        return app(ConsentimientosController::class)->pdf_consentimineto($pdfRequest);
    }

}
