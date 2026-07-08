<?php

namespace App\Http\Controllers;

use App\Models\CertificadoReposo;
use App\Models\DetalleReceta;
use App\Models\Especialidad;
use App\Models\ExamenPPF;
use App\Models\ExamenSolicitudServicio;
use App\Models\FichaAtencion;
use App\Models\FichaGinecoObstetrica;
use App\Models\GesRegistros;
use App\Models\InformeMedico;
use App\Models\Licencia;
use App\Models\LugarAtencion;
use App\Models\OftalmoRecetaLente;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\ProfesionalFirma;
use App\Models\RecetaAudifono;
use App\Models\RecetaControl;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use App\Models\TipoInforme;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CertificadoController extends Controller
{

    public function testCertificacion(Request $request)
    {
        $datos = array();

        // $datos['certificadoProfesional'] = static::certificadoProfesional($request->id_profesional);
        // $datos['validarCertificadoProfesional'] = static::validarCertificadoProfesional($datos['certificadoProfesional']['certificado']);
        $datos['certificadoDocumento'] = static::certificadoDocumento($request->id_ficha, $request->id_profesional, $request->id_paciente, $request->id_tipo);
        $datos['validarCertificadoDocumento'] = static::validarCertificadoDocumento($datos['certificadoDocumento']['certificado']);

        return $datos;
    }

    static public function certificadoProfesional($id_profesional, $auto, $id_tipo_documento, $id_documento)
    {
        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($auto))
        {
            $error['auto'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($id_tipo_documento))
        {
            $error['id_tipo_documento'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($id_documento))
        {
            $error['id_documento'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {
            $profesional = Profesional::select('id', 'nombre', 'apellido_uno','rut','email')->find($id_profesional);

            if($profesional)
            {
                /** datos profesional */
                $id = $profesional->id;

                /** cantidad de caracteres en id */
                // $cantidad = strlen($id);

                /** completando a 10 caracteres */
                $permitted_chars = '#\ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';

                // $certificado = $id.rand(0,9).substr(str_shuffle($permitted_chars), 0, (9-$cantidad));
                $parte_1 = $id.rand(0,9).substr(str_shuffle($permitted_chars), 0, (8-strlen($id)));
                $parte_2 = $id_tipo_documento.rand(0,9).substr(str_shuffle($permitted_chars), 0, (8-strlen($id_tipo_documento)));
                $parte_3 = $id_documento.rand(0,9).substr(str_shuffle($permitted_chars), 0, (8-strlen($id_documento)));
                // $parte_4 = $auto.substr(str_shuffle($permitted_chars), 0, (8-strlen($auto)));
                $parte_4 = $auto;
                $certificado = $parte_1.'-'.$parte_2.'-'.$parte_3.'-'.$parte_4;

                $datos['estado'] = 1;
                $datos['certificado'] = base64_encode($certificado);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional no encontrado';
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

    static public function validarCertificadoProfesional_r(Request $request)
    {
        return static::validarCertificadoProfesional($request->tkx);
    }

    static public function validarCertificadoProfesional($token)
    {
        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($token))
        {
            $error['id'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {
            $token_normal = base64_decode($token);
            $array_token = explode('-',$token_normal);

            // $datos['array_token'] = $array_token;

            if( strlen($array_token[0]) == 9 && strlen($array_token[1]) == 9 && strlen($array_token[2]) == 9 )
            {
                $numeros = array();
                $letras = array();

                foreach($array_token as $key_elementos => $value_elementos)
                {
                    $array_value_elementos = str_split($value_elementos);

                    foreach($array_value_elementos as $value)
                    {
                        if(is_numeric($value))
                        {
                            if(isset($numeros[$key_elementos]))
                                $numeros[$key_elementos] = $numeros[$key_elementos].$value;
                            else
                                $numeros[$key_elementos] = $value;
                        }
                        else
                        {
                            if(isset($letras[$key_elementos]))
                                $letras[$key_elementos] = $letras[$key_elementos].$value;
                            else
                                $letras[$key_elementos] = $value;
                        }
                    }
                }

                $id_profesional = substr($numeros[0],0,(strlen($numeros[0])-1));
                $id_tipo_documento = substr($numeros[1],0,(strlen($numeros[1])-1));
                $id_documento = substr($numeros[2],0,(strlen($numeros[2])-1));
                $auto = $array_token[3];

                // $datos['id_profesional'] = $id_profesional;
                $datos['documento'] = $id_tipo_documento;
                // $datos['id_documento'] = $id_documento;
                // $datos['auto'] = $auto;

                if(  !empty($id_profesional) || !empty($id_tipo_documento) || !empty($id_documento) || !empty($auto) )
                {

                    $profesional = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos','rut','email', 'certificado', 'numero_certificado', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')->find($id_profesional);

                    if($profesional)
                    {
                        $especialidad = Especialidad::select('nombre')->find($profesional->id_especialidad);
                        $tipo_especialidad = TipoEspecialidad::select('nombre')->find($profesional->id_tipo_especialidad);
                        $sub_tipo_especialidad = SubTipoEspecialidad::select('nombre')->find($profesional->id_sub_tipo_especialidad);
                        unset($profesional->id);
                        unset($profesional->id_especialidad);
                        unset($profesional->id_tipo_especialidad);
                        unset($profesional->id_sub_tipo_especialidad);

                        if($especialidad) $profesional->especialidad = $especialidad->nombre;
                        else $profesional->especialidad = '';

                        if($tipo_especialidad) $profesional->tipo_especialidad = $tipo_especialidad->nombre;
                        else $profesional->tipo_especialidad = '';

                        if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad = $sub_tipo_especialidad->nombre;
                        else $profesional->sub_tipo_especialidad = '';
                        unset($profesional->id );
                        unset($profesional->id_especialidad );
                        unset($profesional->id_tipo_especialidad );
                        unset($profesional->id_tipo_especialidad );

                        unset($profesional->certificado );
                        unset($profesional->numero_certificado );

                        $datos['profesional']['estado'] = 1;
                        // $datos['profesional']['token'] = $token;
                        $datos['profesional']['registro'] = $profesional;

                        /** VALIDAR DOCUMENTO RELACIONADO */
                        /** buscar documento por tipo */

                        $datos['inf_documento']['estado'] = 0;

                        /** CARGA DE DETALLE Y/O PDF */
                        switch ($id_tipo_documento) {
                            // 1. RECETA
                            case '1':
                                $request_temp = new Request(array(
                                    'token_auto' => $auto,
                                    'id' => $id_documento,
                                ));

                                $detalles_receta_temp = (object)RecomendacionController::verRecomendaciones($request_temp);

                                if($detalles_receta_temp->estado == 1)
                                {
                                    // var_dump($detalles_receta_temp->registros);
                                    if(!empty($detalles_receta_temp->registros))
                                    {
                                        $detalles_receta = $detalles_receta_temp->registros[0];
                                        if(count($detalles_receta) > 0)
                                        {
                                            $datos['inf_documento']['estado'] = 1;
                                            // $datos['inf_documento']['registros'] = $detalles_receta;
                                            $datos['inf_documento']['url'] = route('profesional.receta.pdf',[ 'id_ficha_atencion' => $detalles_receta['id_ficha_atencion'], 'id_receta' => $detalles_receta['id']]);
                                        }
                                        else
                                        {
                                            $datos['inf_documento']['estado'] = 0;
                                            $datos['inf_documento']['msj'] = 'Receta no encontrada';
                                        }
                                    }
                                    else
                                    {
                                        $datos['inf_documento']['estado'] = 0;
                                        $datos['inf_documento']['msj'] = 'Receta no encontrada';
                                    }
                                }
                                else
                                {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Receta no encontrada';
                                }

                                break;
                            // 2. RECETA ESPECIALIDADES - OTORINO - AUDIFONOS
                            case '2':
                                $filtro = array();
                                $filtro[] = array('cod_auto' ,$auto);
                                $filtro[] = array('id' ,$id_documento);
                                $detalle_audifono = RecetaAudifono::where($filtro)->first();

                                if($detalle_audifono)
                                {
                                    $datos['inf_documento']['estado'] = 1;
                                    // $datos['inf_documento']['registros'] = $detalle_audifono;
                                    $datos['inf_documento']['url'] = route('profesional.receta.pdf',[ 'id_ficha_atencion' => $detalle_audifono['id_ficha_atencion'], 'id_receta' => '']);
                                }
                                else
                                {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Receta no encontrada';
                                }

                                break;
                            // 3. EXAMEN
                            case '3':
                                $filtro_ex = array();
                                $filtro_ex[] = array('id_ficha_atencion', $id_documento);
                                $filtro_ex[] = array('id_profesional', $id_profesional);
                                $examenes_orden = ExamenPPF::where($filtro_ex)->get();

                                if($examenes_orden->count() > 0)
                                {
                                    $datos['inf_documento']['estado'] = 1;
                                    $datos['inf_documento']['url'] = route('pdf.orden_examenes', ['id_ficha_atencion' => $id_documento]);
                                    $datos['inf_documento']['cantidad'] = $examenes_orden->count();
                                }
                                else
                                {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Orden de exámenes no encontrada';
                                }
                                break;
                            // 4. EXAMEN ESPECIALIDADES - ECOGRAFIA - RADIOLOGIA - OTROS
                            case '4':
                                if($profesional->id_especialidad == 1 && $profesional->id_tipo_especialidad == 3 && $profesional->id_sub_tipo_especialidad == 27)
                                {
                                    $filtro = array();
                                    $filtro[] = array('id' ,$id_documento);
                                    $ficha_gineco = FichaGinecoObstetrica::where($filtro)->first();
                                    if($ficha_gineco)
                                    {
                                        $datos['inf_documento']['estado'] = 1;
                                        // $datos['inf_documento']['registros'] = $ficha_gineco;
                                        $datos['inf_documento']['url'] = route('ficha.otro.prof.pdf_lab_eco', ['id_ficha_atencion' => $ficha_gineco->id]);
                                    }
                                    else
                                    {
                                        $datos['inf_documento']['estado'] = 0;
                                        $datos['inf_documento']['msj'] = 'Ecotomografía no encontrada';
                                    }
                                }else{
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Profesional no corresponde a examen de especialidad';
                                }

                                break;
                            // 5. CONSENTIMIENTOS INFORMADOS
                            case '5':
                                break;
                            // 6. INFORME DE EXAMENES
                            case '6':
                                $ficha_val = FichaAtencion::where('id', $id_documento)
                                    ->where('id_profesional', $id_profesional)
                                    ->first();
                                if ($ficha_val) {
                                    $datos['inf_documento']['estado'] = 1;
                                    $datos['inf_documento']['url'] = '';
                                } else {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Informe de Examen no encontrado';
                                }
                                break;
                            // 7. CERTIFICADO DE REPOSO
                            case '7':
                                break;
                            // 8. INTER CONSULTA
                            case '8':
                                break;
                            // 9. RESPUESTA INTERCONSULTA
                            case '9':
                                break;
                            // 10. INFORM MEDICO
                            case '10':
                                $filtro_inf = array();
                                $filtro_inf[] = array('cod_auto', $auto);
                                $filtro_inf[] = array('id', $id_documento);
                                $inform_medico_doc = InformeMedico::where($filtro_inf)->first();
                                if($inform_medico_doc)
                                {
                                    $datos['inf_documento']['estado'] = 1;
                                    $datos['inf_documento']['url'] = route('pdf.informe_medico', ['id_ficha_atencion' => $inform_medico_doc->id_ficha_atencion, 'id_tipo_informe' => $inform_medico_doc->id_tipo_informe]);
                                }
                                else
                                {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Informe/Certificado no encontrado';
                                }
                                break;
                            // 11. CONSTANCIA GES
                            case '11':
                                $ges_doc = GesRegistros::find($id_documento);
                                if($ges_doc)
                                {
                                    $datos['inf_documento']['estado'] = 1;
                                    $datos['inf_documento']['url'] = route('ficha_atencion.pdf.ges', ['id' => $ges_doc->id]);
                                }
                                else
                                {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Constancia GES no encontrada';
                                }
                                break;
                            // 12. REMBOLSO GASTOS MEDICOS
                            case '12':
                                break;
                            // 13. LICENCIA
                            case '13':
                                break;
                            // 14. FICHA MEDICA UNICA
                            case '14':
                                break;
                            // 15. ORDEN HOSPITALIZACION
                            case '15':
                                break;
                            // 17. SOLICITUD DE PABELLON
                            case '17':
                                break;
                            // 18. EPICRISIS
                            case '18':
                                break;
                            // 19. PROTOCOLO OPERATORIO
                            case '19':
                                break;
                            // 20. CARNE DE ALTA
                            case '20':
                                break;
                            // 21. CARNE DE VACUNA
                            case '21':
                                break;
                            // 22. USO INTERNO
                            case '22':
                                break;
                            // 23. CARNET VACUNAS
                            case '23':
                                break;
                            // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                            case '24':
                                $filtro = array();
                                $filtro[] = array('cod_auto' ,$auto);
                                $filtro[] = array('id' ,$id_documento);
                                $receta_lentes = OftalmoRecetaLente::where($filtro)->first();

                                if($receta_lentes)
                                {
                                    $datos['inf_documento']['estado'] = 1;
                                    // $datos['inf_documento']['registros'] = $receta_lentes;
                                    $datos['inf_documento']['url'] = route('profesional.receta.pdf',[ 'id_ficha_atencion' => $receta_lentes['id_ficha_atencion'], 'id_receta' => '']);
                                }
                                else
                                {
                                    $datos['inf_documento']['estado'] = 0;
                                    $datos['inf_documento']['msj'] = 'Receta no encontrada';
                                }
                                break;
                            // 25. USOS PERSONALES
                            case '25':
                                break;

                            default:
                                # code...
                                break;
                        }

                        if($datos['inf_documento']['estado'] == 1 && $datos['profesional']['estado'] == 1)
                        {
                            $datos['estado'] = 1;
                            $datos['msj'] = 'Firma de Profesional valida.';
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Firma de Profesional no Valida o no corresponde al docuemnto.';
                        }

                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Token no valido 1';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Token no valido 2';
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Token no valido 3';
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

    public function validarProfesional(Request $request)
    {
        $valido = 1;
        $validar = '';
        $card_informacion = '';
        if(empty($request->tkx))
        {
            $mensaje = 'Identificador de Documento Faltante.';
            $valido = 0;
        }
        else
        {
            $validar = (object)static::validarCertificadoProfesional($request->tkx);

            // echo json_encode($validar);

            /** DOCUMENTO VALIDO */
            if($validar->estado == 1)
            {
                $mensaje = 'Documento Valido.';
                switch ($validar->documento) {
                    // 1. RECETA
                    case '1':

                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;

                        $html = '';
                        $html .= '<div class="row">';
						$html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Valido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>RECETA MEDICA </span></li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$inf_documento->url.'" target="_blank" class="btn btn-success btn-sm" onclick="">Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';

                        $card_informacion = $html;

                        break;
                    // 2. RECETA ESPECIALIDADES - OTORINO - AUDIFONOS
                    case '2':
                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;

                        $html = '';
                        $html .= '<div class="row">';
						$html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Valido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>RECETA MEDICA </span></li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$inf_documento->url.'" target="_blank" class="btn btn-success btn-sm" onclick="">Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';

                        $card_informacion = $html;

                        break;
                    // 3. EXAMEN
                    case '3':
                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;

                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Firma V&aacute;lida</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>ORDEN DE EX&Aacute;MENES</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$inf_documento->url.'" target="_blank" class="btn btn-success btn-sm"><i class="feather icon-file"></i> Ver Orden</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';

                        $card_informacion = $html;
                        break;
                    // 4. EXAMEN ESPECIALIDADES
                    case '4':
                        break;
                    // 5. CONSENTIMIENTOS INFORMADOS
                    case '5':
                        break;
                    // 6. INFORME DE EXAMENES
                    case '6':
                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Firma V&aacute;lida</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>INFORME DE EX&Aacute;MENES</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                        break;
                    // 7. CERTIFICADO DE REPOSO
                    case '7':
                        break;
                    // 8. INTER CONSULTA
                    case '8':
                        break;
                    // 9. RESPUESTA INTERCONSULTA
                    case '9':
                        break;
                    // 10. INFORM MEDICO
                    case '10':
                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Firma V&aacute;lida</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>INFORME M&Eacute;DICO / CERTIFICADO DE ALTA</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$inf_documento->url.'" target="_blank" class="btn btn-success btn-sm"><i class="feather icon-file"></i> Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                        break;
                    // 11. CONSTANCIA GES
                    case '11':
                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Firma V&aacute;lida</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>CONSTANCIA GES</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$inf_documento->url.'" target="_blank" class="btn btn-success btn-sm"><i class="feather icon-file"></i> Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                        break;
                    // 12. REMBOLSO GASTOS MEDICOS
                    case '12':
                        break;
                    // 13. LICENCIA
                    case '13':
                        break;
                    // 14. FICHA MEDICA UNICA
                    case '14':
                        break;
                    // 15. ORDEN HOSPITALIZACION
                    case '15':
                        break;
                    // 17. SOLICITUD DE PABELLON
                    case '17':
                        break;
                    // 18. EPICRISIS
                    case '18':
                        break;
                    // 19. PROTOCOLO OPERATORIO
                    case '19':
                        break;
                    // 20. CARNE DE ALTA
                    case '20':
                        break;
                    // 21. CARNE DE VACUNA
                    case '21':
                        break;
                    // 22. USO INTERNO
                    case '22':
                        break;
                    // 23. CARNET VACUNAS
                    case '23':
                        break;
                    // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                    case '24':
                        $profesional = (object)$validar->profesional;
                        $inf_documento = (object)$validar->inf_documento;

                        $html = '';
                        $html .= '<div class="row">';
						$html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                        $html .= '        <div class="card" style="color: #000;">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Valido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Tipo</span><br>RECETA MEDICA </span></li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">Profesional</span><br>'.mb_strtoupper($profesional->registro->nombre).' '.mb_strtoupper($profesional->registro->apellido_uno).' '.mb_strtoupper($profesional->registro->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$inf_documento->url.'" target="_blank" class="btn btn-success btn-sm" onclick="">Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';

                        $card_informacion = $html;
                        break;
                    // 25. USOS PERSONALES
                    case '25':
                        break;
                    default:
                        # code...
                        break;
                }
            }
            /** DOCUMENTO NO VALIDO */
            else
            {
                $mensaje = 'Documento NO Valido.';
                /** CON TIPO DE DOCUMENTO */
                if(isset($validar->documento))
                {
                    switch ($validar->documento) {
                        // 1. RECETA
                        case '1':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center "><i class="fa fa-times-circle"></i> Firma No Valida para el Documento</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';

                            $card_informacion = $html;

                            break;
                        // 2. RECETA ESPECIALIDADES
                        case '2':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center "><i class="fa fa-times-circle"></i> Firma No Valida para el Documento</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';

                            $card_informacion = $html;

                            break;
                        // 3. EXAMEN
                        case '3':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Firma NO V&aacute;lida para la Orden de Ex&aacute;menes</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 4. EXAMEN ESPECIALIDADES
                        case '4':
                            break;
                        // 5. CONSENTIMIENTOS INFORMADOS
                        case '5':
                            break;
                        // 6. INFORME DE EXAMENES
                        case '6':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Firma NO V&aacute;lida para el Informe de Ex&aacute;menes</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 7. CERTIFICADO DE REPOSO
                        case '7':
                            break;
                        // 8. INTER CONSULTA
                        case '8':
                            break;
                        // 9. RESPUESTA INTERCONSULTA
                        case '9':
                            break;
                        // 10. INFORM MEDICO
                        case '10':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Firma NO V&aacute;lida para el Informe/Certificado</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 11. CONSTANCIA GES
                        case '11':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Firma NO V&aacute;lida para la Constancia GES</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 12. REMBOLSO GASTOS MEDICOS
                        case '12':
                            break;
                        // 13. LICENCIA
                        case '13':
                            break;
                        // 14. FICHA MEDICA UNICA
                        case '14':
                            break;
                        // 15. ORDEN HOSPITALIZACION
                        case '15':
                            break;
                        // 17. SOLICITUD DE PABELLON
                        case '17':
                            break;
                        // 18. EPICRISIS
                        case '18':
                            break;
                        // 19. PROTOCOLO OPERATORIO
                        case '19':
                            break;
                        // 20. CARNE DE ALTA
                        case '20':
                            break;
                        // 21. CARNE DE VACUNA
                        case '21':
                            break;
                        // 22. USO INTERNO
                        case '22':
                            break;
                        // 23. CARNET VACUNAS
                        case '23':
                            break;
                        // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                        case '24':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center "><i class="fa fa-times-circle"></i> Firma No Valida para el Documento</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';

                            $card_informacion = $html;

                            break;
                        // 25. USOS PERSONALES
                        case '25':
                            break;
                        default:
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center "><i class="fa fa-times-circle"></i> Firma No Valida para el Documento</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';

                            $card_informacion = $html;
                            break;
                    }
                }
                /** SIN TIPO DE DOCUMENTO */
                else
                {
                    $html = '';
                    $html .= '<div class="row">';
                    $html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                    $html .= '        <div class="card" style="color: #000;">';
                    $html .= '            <div class="card-body">';
                    $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center "><i class="fa fa-times-circle"></i> Firma No Valida para el Documento</h4>';
                    $html .= '            </div>';
                    $html .= '        </div>';
                    $html .= '    </div>';
                    $html .= '</div>';

                    $card_informacion = $html;
                }
            }
        }

        return view('documento_validacion.validacion_firma')->with([
            'validacion' => $validar,
            'mensaje' => $mensaje,
            'card_informacion' => $card_informacion,
        ]);
    }


    static public function certificadoDocumento( $id_ficha, $id_profesional, $id_paciente, $tipo_documento, $id_receta = 0 )
    {
        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($id_ficha))
        {
            $error['id_ficha'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($tipo_documento))
        {
            $error['tipo_documento'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {
            //id_ficha 0X id_profesional 0X id_paciente 0x
            $ficha = $id_ficha.rand(0,9);
            $profesional = $id_profesional.rand(0,9);
            $paciente = $id_paciente.rand(0,9);
            $tipo = $tipo_documento.rand(0,9);
            $receta = $id_receta.rand(0,9);

            /** completando a 10 caracteres */
            $permitted_chars = '#\ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';

            $ficha_temp = $ficha.substr(str_shuffle($permitted_chars), 0, max(0, (6-strlen($ficha))));
            $profesional_temp = $profesional.substr(str_shuffle($permitted_chars), 0, max(0, (6-strlen($profesional))));
            $paciente_temp = $paciente.substr(str_shuffle($permitted_chars), 0, max(0, (6-strlen($paciente))));
            $tipo_temp = $tipo.substr(str_shuffle($permitted_chars), 0, max(0, (strlen($tipo_documento)+1)-strlen($tipo)));
            $receta_temp = $receta.substr(str_shuffle($permitted_chars), 0, max(0, (6-strlen($receta))));

            $certificado = $tipo_temp.'-'.$ficha_temp.'-'.$profesional_temp.'-'.$paciente_temp.'-'.$receta_temp;

            $datos['estado'] = 1;
            $datos['certificado'] = base64_encode($certificado);
            // $datos['certificado'] = $certificado;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function validarCertificadoDocumento_r(Request $request)
    {
        return static::validarCertificadoDocumento($request->tkx);
    }

    static public function validarCertificadoDocumento($token)
    {
        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($token))
        {
            $error['token'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {
            $token_normal = base64_decode($token);

            /** token con 30 caracteres (tipo 1-9) o 31 caracteres (tipo 10-19) */
            if(strlen($token_normal)==30 || strlen($token_normal)==31)
            {
                /** divide en tres seccion */
                $array_token = explode('-',$token_normal);
                $numeros = array();
                $letras = array();

                foreach($array_token as $key_elementos => $value_elementos)
                {
                    $array_value_elementos = str_split($value_elementos);
                    foreach($array_value_elementos as $value)
                    {
                        if(is_numeric($value))
                        {
                            if(isset($numeros[$key_elementos]))
                                $numeros[$key_elementos] = $numeros[$key_elementos].$value;
                            else
                                $numeros[$key_elementos] = $value;
                        }
                        else
                        {
                            if(isset($letras[$key_elementos]))
                                $letras[$key_elementos] = $letras[$key_elementos].$value;
                            else
                                $letras[$key_elementos] = $value;
                        }
                    }
                }

                /** quitar numero extra de los id */
                $id_tipo = substr($numeros[0],0,(strlen($numeros[0])-1));
                $id_ficha = substr($numeros[1],0,(strlen($numeros[1])-1));
                $id_profesional = substr($numeros[2],0,(strlen($numeros[2])-1));
                $id_paciente = substr($numeros[3],0,(strlen($numeros[3])-1));
                $id_receta = substr($numeros[4],0,(strlen($numeros[4])-1));

                // 🔍 DEBUG: Logging de valores extraídos del certificado
                \Log::info('📋 Valores extraídos del certificado:', [
                    'id_tipo' => $id_tipo,
                    'id_ficha' => $id_ficha,
                    'id_profesional' => $id_profesional,
                    'id_paciente' => $id_paciente,
                    'id_receta' => $id_receta,
                    'token_original' => $token,
                    'token_decodificado' => $token_normal,
                    'array_numeros' => $numeros,
                    'metodo' => __METHOD__,
                    'linea' => __LINE__
                ]);

				// var_dump($id_tipo);
				// var_dump($id_ficha);
				// var_dump($id_profesional);
				// var_dump($id_paciente);
				// var_dump($id_receta);

                $datos['documento'] = $id_tipo;
                if( !empty($id_ficha) || !empty($id_profesional) || !empty($id_paciente) || !empty($id_receta) )
                {
                    /** carga de datos de carda elemento */
                    // Tipo 26 (Informe Eco/Gineco): buscar en ficha_gineco_obstetrica
                    // Para otros tipos: buscar en fichas_atenciones
                    $ficha = null;

                    if ($id_tipo == '4') {
                        if($profesional->id_especialidad == 1 && $profesional->id_tipo_especialidad == 3 && $profesional->id_sub_tipo_especialidad == 27)
                        {
                            $ficha_gineco = FichaGinecoObstetrica::select('id', 'id_paciente', 'id_lugar_atencion','id_profesional', 'hipotesis_diagnostico', 'created_at')->find($id_ficha);
                            if ($ficha_gineco) {
                                $ficha = (object)[
                                    'id'                    => $ficha_gineco->id,
                                    'id_lugar_atencion'     => $ficha_gineco->id_lugar_atencion,
                                    'motivo'                => 'Ecotomografía',
                                    'hipotesis_diagnostico' => $ficha_gineco->hipotesis_diagnostico,
                                    'id_paciente'           => $ficha_gineco->id_paciente,
                                    'id_profesional'        => $ficha_gineco->id_profesional,
                                ];
                            }
                        }
                    } else {
                        // Para otros tipos de documentos, buscar en fichas_atenciones
                        $ficha = FichaAtencion::select('id', 'id_lugar_atencion', 'motivo', 'hipotesis_diagnostico', 'id_paciente', 'id_profesional')->find($id_ficha);
                    }

                    $profesional = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut', 'email', 'certificado', 'numero_certificado', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')->find($id_profesional);
                    $paciente = Paciente::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'email')->find($id_paciente);

                    /**validacion de ficha encontrada */
                    if($ficha)
                    {
                        /** validar que el profesional se sea el mismo que en ficha */
                        if($ficha->id_profesional == $id_profesional)
                        {
                            /** validar que el paciente sea el mismo que en ficha */
                            if($ficha->id_paciente == $id_paciente)
                            {
                                /** validacion de profesional encontrado */
                                if($profesional)
                                {
                                    /** validacion de paciente encontrado */
                                    if($paciente)
                                    {
                                        /** ficha  */
                                        $lugaratencion = LugarAtencion::select('nombre')->find($ficha->id_lugar_atencion);

                                        unset($ficha->id);
                                        unset($ficha->id_lugar_atencion);
                                        unset($ficha->id_paciente);
                                        unset($ficha->id_profesional);
                                        $ficha->lugar_atencion = $lugaratencion->nombre;

                                        /** profesional */
                                        $especialidad = Especialidad::select('nombre')->find($profesional->id_especialidad);
                                        $tipo_especialidad = TipoEspecialidad::select('nombre')->find($profesional->id_tipo_especialidad);
                                        $sub_tipo_especialidad = SubTipoEspecialidad::select('nombre')->find($profesional->id_sub_tipo_especialidad);
                                        unset($profesional->id);
                                        unset($profesional->id_especialidad);
                                        unset($profesional->id_tipo_especialidad);
                                        unset($profesional->id_sub_tipo_especialidad);

                                        if($especialidad) $profesional->especialidad = $especialidad->nombre;
                                        else $profesional->especialidad = '';

                                        if($tipo_especialidad) $profesional->tipo_especialidad = $tipo_especialidad->nombre;
                                        else $profesional->tipo_especialidad = '';

                                        if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad = $sub_tipo_especialidad->nombre;
                                        else $profesional->sub_tipo_especialidad = '';


                                        /** paciente */
                                        unset($paciente->id);

                                        /** CARGA DE DETALLE Y/O PDF */
                                        switch ($id_tipo) {
                                            // 1. RECETA
                                            case '1':
                                                $valido = 1;
                                                $retorno_valido = 1;

                                                $request_temp = new Request(array(
                                                    'id_ficha' => $id_ficha,
                                                    'id' => $id_receta,
                                                ));

                                                $detalles_receta_temp = (object)RecomendacionController::verRecomendaciones($request_temp);

                                                if($detalles_receta_temp->estado == 1)
                                                {
                                                    $detalles_receta = $detalles_receta_temp->registros;
                                                    if($detalles_receta)
                                                    {
                                                        foreach ($detalles_receta as $key_detalle => $value_detalle)
                                                        {
                                                            // var_dump($value_detalle['id_tipo_control']);
                                                            $control = RecetaControl::where('tipo_control', $value_detalle['id_tipo_control'])->first();
                                                            $detalles_receta[$key_detalle]['tipo_control'] = $control;
                                                            if(static::validarTokenDocumento($token, $value_detalle['token_doc']) == false)
                                                            {
                                                                $valido = 0;
                                                                $retorno_valido = 0;
                                                            }
                                                        }

                                                        if($valido)
                                                        {
                                                            $datos['registros']['detalle'] = $detalles_receta;
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $valido = 0;
                                                        $retorno_valido = 0;
                                                    }
                                                }

                                                break;
                                            // 2. RECETA ESPECIALIDADES
                                            case '2':
                                                break;
                                            // 3. EXAMEN
                                            case '3':
                                                $valido = 1;
                                                $retorno_valido = 1;

                                                $filtro_examen = array();
                                                $filtro_examen[] = array('id_ficha_atencion', $id_ficha);
                                                $filtro_examen[] = array('id_profesional', $id_profesional);
                                                $filtro_examen[] = array('id_paciente', $id_paciente);
                                                // $filtro_examen[] = array('id', $id_receta);

                                                $examan_temp = ExamenPPF::where($filtro_examen)->get();

                                                if($examan_temp->count() > 0)
                                                {
                                                    foreach ($examan_temp as $key_ex => $value_ex)
                                                    {
                                                        $examen_sol_serv = ExamenSolicitudServicio::find($value_ex->id_examen);
                                                        $examan_temp[$key_ex]->examen_solicitud_servicio = $examen_sol_serv;
                                                    }

                                                    $datos['registros']['detalle'] = $examan_temp;
                                                }
                                                else
                                                {
                                                    $valido = 0;
                                                    $retorno_valido = 0;
                                                }

                                                break;
                                            // 4. EXAMEN ESPECIALIDADES
                                            case '4':
                                                break;
                                            // 5. CONSENTIMIENTOS INFORMADOS
                                            case '5':
                                                break;
                                            // 6. INFORME DE EXAMENES
                                            case '6':
                                                // La ficha ya fue validada antes del switch (profesional y paciente coinciden)
                                                $valido = 1;
                                                $retorno_valido = 1;
                                                break;
                                            // 7. CERTIFICADO DE REPOSO
                                            case '7':
                                                $valido = 1;
                                                $retorno_valido = 1;
                                                $certificado_reposo = CertificadoReposo::where('id_ficha_atencion', $id_ficha)->first();
                                                if($certificado_reposo && $certificado_reposo->id_ficha_atencion == $id_ficha && $certificado_reposo->id_profesional == $id_profesional)
                                                {
                                                    $datos['registros']['detalle'] = $certificado_reposo;
                                                }
                                                else
                                                {
                                                    $valido = 0;
                                                    $retorno_valido = 0;
                                                }
                                                break;
                                            // 8. INTER CONSULTA
                                            case '8':
                                                break;
                                            // 9. RESPUESTA INTERCONSULTA
                                            case '9':
                                                break;
                                            // 10. INFORM MEDICO
                                            case '10':
                                                $valido = 1;
                                                $retorno_valido = 1;
                                                $inform_medico = InformeMedico::find($id_receta);
                                                if($inform_medico && $inform_medico->id_ficha_atencion == $id_ficha && $inform_medico->id_profesional == $id_profesional)
                                                {
                                                    $datos['registros']['detalle'] = $inform_medico;
                                                }
                                                else
                                                {
                                                    $valido = 0;
                                                    $retorno_valido = 0;
                                                }
                                                break;
                                            // 11. CONSTANCIA GES
                                            case '11':
                                                $valido = 1;
                                                $retorno_valido = 1;
                                                $ges = GesRegistros::find($id_receta);
                                                if($ges && $ges->id_ficha_atencion == $id_ficha && $ges->id_profesional == $id_profesional)
                                                {
                                                    $datos['registros']['detalle'] = $ges;
                                                }
                                                else
                                                {
                                                    $valido = 0;
                                                    $retorno_valido = 0;
                                                }
                                                break;
                                            // 12. REMBOLSO GASTOS MEDICOS
                                            case '12':
                                                break;
                                            // 13. LICENCIA
                                            case '13':
                                                $id_licencia = $id_receta;
                                                $valido = 1;
                                                $retorno_valido = 1;
                                                $licencia = Licencia::find($id_licencia);
                                                if($licencia && $licencia->id_ficha_atencion == $id_ficha && $licencia->id_profesional == $id_profesional)
                                                {
                                                    $datos['registros']['detalle'] = $licencia;
                                                }
                                                else
                                                {
                                                    $valido = 0;
                                                    $retorno_valido = 0;
                                                }
                                                break;
                                            // 14. FICHA MEDICA UNICA
                                            case '14':
                                                break;
                                            // 15. ORDEN HOSPITALIZACION
                                            case '15':
                                                break;
                                            // 17. SOLICITUD DE PABELLON
                                            case '17':
                                                break;
                                            // 18. EPICRISIS
                                            case '18':
                                                break;
                                            // 19. PROTOCOLO OPERATORIO
                                            case '19':
                                                break;
                                            // 20. CARNE DE ALTA
                                            case '20':
                                                break;
                                            // 21. CARNE DE VACUNA
                                            case '21':
                                                break;
                                            // 22. USO INTERNO
                                            case '22':
                                                break;
                                            // 23. CARNET VACUNAS
                                            case '23':
                                                break;
                                            // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                                            case '24':
                                                break;
                                            // 25. USOS PERSONALES
                                            case '25':
                                                break;
                                            // 26. INFORME LABORATORIO / ECOTOMOGRAFIA GINECO
                                            case '26':
                                                $valido = 1;
                                                $retorno_valido = 1;
                                                $detalle_eco = $ficha_gineco
                                                    ? $ficha_gineco
                                                    : FichaGinecoObstetrica::select('id', 'id_paciente', 'id_profesional', 'hipotesis_diagnostico', 'created_at')->find($id_ficha);
                                                if ($detalle_eco && $detalle_eco->id_profesional == $id_profesional && $detalle_eco->id_paciente == $id_paciente) {
                                                    $datos['registros']['detalle'] = $detalle_eco;
                                                } else {
                                                    $valido = 0;
                                                    $retorno_valido = 0;
                                                }
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }

                                        if($retorno_valido)
                                        {
                                            /** retorno */
                                            $datos['estado'] = 1;
                                            // $datos['token'] = $token;
                                            // $datos['registros']['ficha'] = $ficha;
                                            $datos['registros']['profesional'] = $profesional;
                                            $datos['registros']['paciente'] = $paciente;
                                        }
                                        else
                                        {
                                            $datos['estado'] = 0;
                                            $datos['msj'] = 'Token no valido 8';
                                        }

                                    }
                                    else
                                    {
                                        $datos['estado'] = 0;
                                        $datos['msj'] = 'Token no valido 5';
                                    }
                                }
                                else
                                {
                                    $datos['estado'] = 0;
                                    $datos['msj'] = 'Token no valido 4';
                                }
                            }
                            else
                            {
                                $datos['estado'] = 0;
                                $datos['msj'] = 'Token no valido 7';
                            }
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Token no valido 6';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Token no valido 3';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Token no valido 2';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Token no valido 1';
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

    /**
     * validarTokenDocumento
     *
     * @param [strin] $token1 (base64)
     * @param [strin] $token2 (base64)
     * @return boolean
     */
    static public function validarTokenDocumento($token1, $token2)
    {
        $return = 0;
        $token_normal1 = base64_decode($token1);
        $token_normal2 = base64_decode($token2);
        /** token con 23 caracteres */
        if(strlen($token_normal1)==30 && strlen($token_normal2)==30)
        {
            /** token 1 */
            $array_token1 = explode('-',$token_normal1);
            $numeros1 = array();
            $letras1 = array();

            foreach($array_token1 as $key_elementos => $value_elementos)
            {
                $array_value_elementos = str_split($value_elementos);
                foreach($array_value_elementos as $value)
                {
                    if(is_numeric($value))
                    {
                        if(isset($numeros1[$key_elementos]))
                            $numeros1[$key_elementos] = $numeros1[$key_elementos].$value;
                        else
                            $numeros1[$key_elementos] = $value;
                    }
                    else
                    {
                        if(isset($letras[$key_elementos]))
                            $letras1[$key_elementos] = $letras1[$key_elementos].$value;
                        else
                            $letras1[$key_elementos] = $value;
                    }
                }
            }

            /** quitar numero extra de los id */
            $id_tipo1 = substr($numeros1[0],0,(strlen($numeros1[0])-1));
            $id_ficha1 = substr($numeros1[1],0,(strlen($numeros1[1])-1));
            $id_profesional1 = substr($numeros1[2],0,(strlen($numeros1[2])-1));
            $id_paciente1 = substr($numeros1[3],0,(strlen($numeros1[3])-1));
            $id_receta1 = substr($numeros1[4],0,(strlen($numeros1[4])-1));

            /** token 2 */
            $array_token2 = explode('-',$token_normal2);
            $numeros2 = array();
            $letras2 = array();

            foreach($array_token2 as $key_elementos => $value_elementos)
            {
                $array_value_elementos = str_split($value_elementos);
                foreach($array_value_elementos as $value)
                {
                    if(is_numeric($value))
                    {
                        if(isset($numeros2[$key_elementos]))
                            $numeros2[$key_elementos] = $numeros2[$key_elementos].$value;
                        else
                            $numeros2[$key_elementos] = $value;
                    }
                    else
                    {
                        if(isset($letras[$key_elementos]))
                            $letras2[$key_elementos] = $letras2[$key_elementos].$value;
                        else
                            $letras2[$key_elementos] = $value;
                    }
                }
            }

            /** quitar numero extra de los id */
            $id_tipo2 = substr($numeros2[0],0,(strlen($numeros2[0])-1));
            $id_ficha2 = substr($numeros2[1],0,(strlen($numeros2[1])-1));
            $id_profesional2 = substr($numeros2[2],0,(strlen($numeros2[2])-1));
            $id_paciente2 = substr($numeros2[3],0,(strlen($numeros2[3])-1));
            $id_receta2 = substr($numeros2[4],0,(strlen($numeros2[4])-1));

            if( $id_tipo1 == $id_tipo2 && $id_ficha1 == $id_ficha2 && $id_profesional1 == $id_profesional2 && $id_paciente1 == $id_paciente2 && $id_receta1 == $id_receta2 )
                $return = 1;
            else
                $return = 0;

        }
        else
        {
            $return = 0;
        }

        return $return;

    }

    static public function generarUrlProfesional($token)
    {
        $valido = 1;
        $retorno = '';
        if(empty($token))
        {
            $valido = 0;
        }

        if($valido)
        {
            // $retorno = route('validacion_profesional_').'?tkx='.$token;
            $retorno = action([CertificadoController::class, 'validarProfesional'], ['tkx' => $token]);
        }
        else
        {
            $retorno = env('APP_URL');
        }
        return $retorno;
    }

    static public function generarUrlDocumento($token)
    {

        $valido = 1;
        $retorno = '';
        if(empty($token))
        {
            $valido = 0;
        }

        if($valido)
        {
            // $retorno = route('validacion_documento_').'?tkx='.$token;
            $retorno = action([CertificadoController::class, 'validarDocumento'], ['tkx' => $token]);
            // $retorno = action([CertificadoController::class, 'validarCertificadoDocumento_r'], ['tkx' => $token]);
        }
        else
        {
            $retorno = env('APP_URL');
        }
        return $retorno;
    }

    public function validarDocumento(Request $request)
    {

        $valido = 1;
        $validar = '';
        $card_informacion = '';
        if(empty($request->tkx))
        {
            $mensaje = 'Identificador de Documento Faltante.';
            $valido = 0;
        }
        else
        {
            $validar = (object)static::validarCertificadoDocumento($request->tkx);

            /** DOCUMENTO VALIDO */
            if($validar->estado == 1)
            {
                $mensaje = 'Documento Valido.';
                switch ($validar->documento) {
                    // 1. RECETA
                    case '1':

                        $info = $validar->registros['detalle'][0];
                        $cantidad_item = count($info['detalle']);

                        $paciente = Paciente::select('nombres', 'apellido_uno', 'apellido_dos')->find($info['id_paciente']);
                        $profesional = Profesional::select('nombre', 'apellido_uno', 'apellido_dos')->find($info['id_profesional']);
                        $tipo_control = RecetaControl::where('tipo_control', $info['id_tipo_control'])->first();
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '	<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2 ">';
                        $html .= '     <div class="card" >';
                        $html .= '	    <div class="card-body">';
                        $html .= '			<div class="card-body">';
                        $html .= '				<h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento Valido</h4>';
                        $html .= '    				<ul style="list-style: none;">';
                        $html .= '    					<li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>'.mb_strtoupper($tipo_control->descripcion).'</li>';
                        $html .= '    					<li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>'.date('d-m-Y', strtotime($info['created_at'])).'</li>';
                        $html .= '    					<li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br> '.mb_strtoupper($paciente->nombres).' '.mb_strtoupper($paciente->apellido_uno).' '.mb_strtoupper($paciente->apellido_dos).'</li>';
                        $html .= '    					<li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br> '.mb_strtoupper($profesional->nombre).' '.mb_strtoupper($profesional->apellido_uno).' '.mb_strtoupper($profesional->apellido_dos).'</li>';
                        $html .= '    					<li style="margin-bottom: 5px;"><span class="font-weight-bold">CANTIDAD ITEM</span><br>'.$cantidad_item.'</li>';
                        $url_receta = route('pdf.receta_medicamentos', ['id_ficha_atencion' => $info['id_ficha_atencion'], 'id_receta'=>$info['id'] ]);
                        $html .= '    					<li style="margin-bottom: 5px;"><a href="'.$url_receta.'" target="_blank" class="btn btn-success btn-sm" onclick=""><i class="feather icon-file"></i> Ver Documento</a></li>';
                        $html .= '    				</ul>';
                        $html .= '    			</div>';
                        $html .= '        	</div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                    	$html .= '</div>';

                        $card_informacion = $html;

                        break;
                    // 2. RECETA ESPECIALIDADES
                    case '2':
                        break;
                    // 3. EXAMEN
                    case '3':
                        $detalle_examenes = $validar->registros['detalle'];
                        $paciente_ex = $validar->registros['paciente'];
                        $profesional_ex = $validar->registros['profesional'];
                        $cantidad_examenes = $detalle_examenes->count();
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2">';
                        $html .= '        <div class="card">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento V&aacute;lido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>ORDEN DE EX&Aacute;MENES</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br>'.mb_strtoupper($paciente_ex->nombres).' '.mb_strtoupper($paciente_ex->apellido_uno).' '.mb_strtoupper($paciente_ex->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br>'.mb_strtoupper($profesional_ex->nombre).' '.mb_strtoupper($profesional_ex->apellido_uno).' '.mb_strtoupper($profesional_ex->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">CANTIDAD EX&Aacute;MENES</span><br>'.$cantidad_examenes.'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">EX&Aacute;MENES</span><br>';
                        foreach($detalle_examenes as $ex_item) {
                            $html .= '- '.mb_strtoupper($ex_item->examen).'<br>';
                        }
                        $html .= '                    </li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                        break;
                    // 4. EXAMEN ESPECIALIDADES
                    case '4':
                        break;
                    // 5. CONSENTIMIENTOS INFORMADOS
                    case '5':
                        break;
                    // 6. INFORME DE EXAMENES
                    case '6':
                        break;
                    // 7. CERTIFICADO DE REPOSO
                    case '7':
                            $certificado_reposo = $validar->registros['detalle'];
                            $paciente_rep = $validar->registros['paciente'];
                            $profesional_rep = $validar->registros['profesional'];
                            $url_rep = route('pdf.certificado_reposo', ['id_ficha_atencion' => $certificado_reposo->id_ficha_atencion, 'id_certificado_reposo'=>$certificado_reposo->id ]);
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2">';
                            $html .= '        <div class="card">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento V&aacute;lido</h4>';
                            $html .= '                <ul style="list-style: none;">';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>CERTIFICADO DE REPOSO</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>'.date('d-m-Y', strtotime($certificado_reposo->created_at)).'</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br>'.mb_strtoupper($paciente_rep->nombres).' '.mb_strtoupper($paciente_rep->apellido_uno).' '.mb_strtoupper($paciente_rep->apellido_dos).'</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br>'.mb_strtoupper($profesional_rep->nombre).' '.mb_strtoupper($profesional_rep->apellido_uno).' '.mb_strtoupper($profesional_rep->apellido_dos).'</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$url_rep.'" target="_blank" class="btn btn-success btn-sm"><i class="feather icon-file"></i> Ver Documento</a></li>';
                            $html .= '                </ul>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                        break;
                    // 8. INTER CONSULTA
                    case '8':
                        break;
                    // 9. RESPUESTA INTERCONSULTA
                    case '9':
                        break;
                    // 10. INFORM MEDICO
                    case '10':
                        $inform_med = $validar->registros['detalle'];
                        $paciente_inf = $validar->registros['paciente'];
                        $profesional_inf = $validar->registros['profesional'];
                        $tipo_inf = TipoInforme::find($inform_med->id_tipo_informe);
                        $url_inf = route('pdf.informe_medico', ['id_ficha_atencion' => $inform_med->id_ficha_atencion, 'id_tipo_informe' => $inform_med->id_tipo_informe]);
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2">';
                        $html .= '        <div class="card">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento V&aacute;lido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>'.($tipo_inf ? mb_strtoupper($tipo_inf->nombre) : 'INFORME M&Eacute;DICO').'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>'.date('d-m-Y', strtotime($inform_med->fecha_informe_medico)).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br>'.mb_strtoupper($paciente_inf->nombres).' '.mb_strtoupper($paciente_inf->apellido_uno).' '.mb_strtoupper($paciente_inf->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br>'.mb_strtoupper($profesional_inf->nombre).' '.mb_strtoupper($profesional_inf->apellido_uno).' '.mb_strtoupper($profesional_inf->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$url_inf.'" target="_blank" class="btn btn-success btn-sm"><i class="feather icon-file"></i> Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                        break;
                    // 11. CONSTANCIA GES
                    case '11':
                        $ges = $validar->registros['detalle'];
                        $paciente_ges = $validar->registros['paciente'];
                        $profesional_ges = $validar->registros['profesional'];
                        $url_ges = route('ficha_atencion.pdf.ges', ['id' => $ges->id]);
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2">';
                        $html .= '        <div class="card">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento V&aacute;lido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>CONSTANCIA GES</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>'.date('d-m-Y', strtotime($ges->created_at)).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br>'.mb_strtoupper($paciente_ges->nombres).' '.mb_strtoupper($paciente_ges->apellido_uno).' '.mb_strtoupper($paciente_ges->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br>'.mb_strtoupper($profesional_ges->nombre).' '.mb_strtoupper($profesional_ges->apellido_uno).' '.mb_strtoupper($profesional_ges->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><a href="'.$url_ges.'" target="_blank" class="btn btn-success btn-sm"><i class="feather icon-file"></i> Ver Documento</a></li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                        break;
                    // 12. REMBOLSO GASTOS MEDICOS
                    case '12':
                        break;
                    // 13. LICENCIA
                    case '13':
                        $detalle_licencia = $validar->registros['detalle'];
                        $paciente_lic = $validar->registros['paciente'];
                        $profesional_lic = $validar->registros['profesional'];
                        $url_lic = route('paciente.licencia.pdf', ['id_licencia'=>$detalle_licencia->id ]);
                        $html = '';
                        $html .= '<div class="row">';
                        $html .= '    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2">';
                        $html .= '        <div class="card">';
                        $html .= '            <div class="card-body">';
                        $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento V&aacute;lido</h4>';
                        $html .= '                <ul style="list-style: none;">';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>LICENCIA</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>'.date('d-m-Y', strtotime($detalle_licencia->created_at)).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br>'.mb_strtoupper($paciente_lic->nombres).' '.mb_strtoupper($paciente_lic->apellido_uno).' '.mb_strtoupper($paciente_lic->apellido_dos).'</li>';
                        $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br>'.mb_strtoupper($profesional_lic->nombre).' '.mb_strtoupper($profesional_lic->apellido_uno).' '.mb_strtoupper($profesional_lic->apellido_dos).'</li>';
                        $html .= '                </ul>';
                        $html .= '            </div>';
                        $html .= '        </div>';
                        $html .= '    </div>';
                        $html .= '</div>';
                        $card_informacion = $html;
                    break;
                    // 14. FICHA MEDICA UNICA
                    case '14':
                        break;
                    // 15. ORDEN HOSPITALIZACION
                    case '15':
                        break;
                    // 17. SOLICITUD DE PABELLON
                    case '17':
                        break;
                    // 18. EPICRISIS
                    case '18':
                        break;
                    // 19. PROTOCOLO OPERATORIO
                    case '19':
                        break;
                    // 20. CARNE DE ALTA
                    case '20':
                        break;
                    // 21. CARNE DE VACUNA
                    case '21':
                        break;
                    // 22. USO INTERNO
                    case '22':
                        break;
                    // 23. CARNET VACUNAS
                    case '23':
                        break;
                    // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                    case '24':
                        break;
                    // 25. USOS PERSONALES
                    case '25':
                        break;
                    // 26. INFORME LABORATORIO CLINICO, RADIOLOGICO, ANATOMIA PATOLOGICA / ECOTOMOGRAFIA
                    case '26':
                        if (isset($validar->registros['detalle'])) {
                            $informe       = $validar->registros['detalle'];
                            $paciente_eco  = $validar->registros['paciente'];
                            $profesional_eco = $validar->registros['profesional'];
                            $fecha_doc = isset($informe->created_at) ? date('d-m-Y', strtotime($informe->created_at)) : date('d-m-Y');
                            $html  = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2">';
                            $html .= '        <div class="card">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento V&aacute;lido</h4>';
                            $html .= '                <ul style="list-style: none;">';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>INFORME ECOTOMOGRAF&Iacute;A</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>'.$fecha_doc.'</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br>'.mb_strtoupper($paciente_eco->nombres).' '.mb_strtoupper($paciente_eco->apellido_uno).' '.mb_strtoupper($paciente_eco->apellido_dos).'</li>';
                            $html .= '                    <li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br>'.mb_strtoupper($profesional_eco->nombre).' '.mb_strtoupper($profesional_eco->apellido_uno).' '.mb_strtoupper($profesional_eco->apellido_dos).'</li>';
                            $html .= '                </ul>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            }
            /** DOCUMENTO NO VALIDO */
            else
            {
                $mensaje = 'Documento NO Valido.';
                /** CON TIPO DE DOCUMENTO */
                if(isset($validar->documento))
                {
                    switch ($validar->documento) {
                        // 1. RECETA
                        case '1':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '	<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Documento NO Valido</h4>                            ';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';

                            $card_informacion = $html;

                            break;
                        // 2. RECETA ESPECIALIDADES
                        case '2':
                            break;
                        // 3. EXAMEN
                        case '3':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Documento NO V&aacute;lido</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 4. EXAMEN ESPECIALIDADES
                        case '4':
                            break;
                        // 5. CONSENTIMIENTOS INFORMADOS
                        case '5':
                            break;
                        // 6. INFORME DE EXAMENES
                        case '6':
                            break;
                        // 7. CERTIFICADO DE REPOSO
                        case '7':
                            break;
                        // 8. INTER CONSULTA
                        case '8':
                            break;
                        // 9. RESPUESTA INTERCONSULTA
                        case '9':
                            break;
                        // 10. INFORM MEDICO
                        case '10':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Documento NO V&aacute;lido</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 11. CONSTANCIA GES
                        case '11':
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Documento NO V&aacute;lido</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';
                            $card_informacion = $html;
                            break;
                        // 12. REMBOLSO GASTOS MEDICOS
                        case '12':
                            break;
                        // 13. LICENCIA
                        case '13':
                            break;
                        // 14. FICHA MEDICA UNICA
                        case '14':
                            break;
                        // 15. ORDEN HOSPITALIZACION
                        case '15':
                            break;
                        // 17. SOLICITUD DE PABELLON
                        case '17':
                            break;
                        // 18. EPICRISIS
                        case '18':
                            break;
                        // 19. PROTOCOLO OPERATORIO
                        case '19':
                            break;
                        // 20. CARNE DE ALTA
                        case '20':
                            break;
                        // 21. CARNE DE VACUNA
                        case '21':
                            break;
                        // 22. USO INTERNO
                        case '22':
                            break;
                        // 23. CARNET VACUNAS
                        case '23':
                            break;
                        // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                        case '24':
                            break;
                        // 25. USOS PERSONALES
                        case '25':
                            break;
                        default:
                            $html = '';
                            $html .= '<div class="row">';
                            $html .= '	 <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                            $html .= '        <div class="card" style="color: #000;">';
                            $html .= '            <div class="card-body">';
                            $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Identificador NO Valido</h4>';
                            $html .= '            </div>';
                            $html .= '        </div>';
                            $html .= '    </div>';
                            $html .= '</div>';

                            $card_informacion = $html;
                            break;
                    }
                }
                /** SIN TIPO DE DOCUMENTO */
                else
                {
                    $html = '';
                    $html .= '<div class="row">';
                    $html .= '    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mx-auto mb-2 text-white">';
                    $html .= '        <div class="card" style="color: #000;">';
                    $html .= '            <div class="card-body">';
                    $html .= '                <h4 class="card-subtitle mb-2 text-danger text-center"><i class="fa fa-times-circle"></i> Identificador NO Valido</h4>';
                    $html .= '            </div>';
                    $html .= '        </div>';
                    $html .= '    </div>';
                    $html .= '</div>';

                    $card_informacion = $html;
                }
            }
        }

        return view('documento_validacion.validacion')->with([
            'validacion' => $validar,
            'mensaje' => $mensaje,
            'card_informacion' => $card_informacion,
        ]);
    }

    static public function registroProfesionalFirma($id_profesional, $token, $id_log, $id_tipo_documento, $id_documento)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = new ProfesionalFirma();
            $registro->id_profesional = $id_profesional;
            $registro->id_autorizacion = $token;
            $registro->id_log = $id_log;
            $registro->id_tipo = $id_tipo_documento;
            $registro->id_documento = $id_documento;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }


        return $datos;
    }

    /*** validar seccion */

    public function validarCertificado(Request $request)
    {
        $datos = array();
        $inf_paciente = array();
        $inf_profesional = array();
        $inf_documento = array();

        $info = (object)static::validarCertificadoDocumento($request->tkx_3);
        if($info->estado == 1)
        {

            if(isset($info->registros['paciente']) && !empty($info->registros['paciente']))
            {
                $inf_paciente = array(
                    'nombre' => mb_strtoupper($info->registros['paciente']['nombres']),
                    'apellido_uno' => mb_strtoupper($info->registros['paciente']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['paciente']['apellido_dos']),
                    'rut' => $info->registros['paciente']['rut'],
                    // 'email' => $info->registros['paciente']['email'],
                );
            }

            if(isset($info->registros['profesional']) && !empty($info->registros['profesional']))
            {
                $inf_profesional = array(
                    'nombre' => mb_strtoupper($info->registros['profesional']['nombre']),
                    'apellido_uno' => mb_strtoupper($info->registros['profesional']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['profesional']['apellido_dos']),
                    'rut' => $info->registros['profesional']['rut'],
                    // 'email' => $info->registros['profesional']['email'],
                    // 'especialidad' => $info->registros['profesional']['especialidad'],
                    // 'tipo_especialidad' => $info->registros['profesional']['tipo_especialidad'],
                    // 'sub_tipo_especialidad' => $info->registros['profesional']['sub_tipo_especialidad'],
                    // 'certificado' => $info->registros['profesional']['certificado'],
                    // 'numero_certificado' => $info->registros['profesional']['numero_certificado'],
                );
            }

            switch ($info->documento) {
                // 1. RECETA
                case '1':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper($info->registros['detalle'][0]['tipo_control']['descripcion']),
                                'cantidad_item' => count($info->registros['detalle'][0]['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }
                    break;
                // 2. RECETA ESPECIALIDADES
                case '2':
                    break;
                // 3. EXAMEN
                case '3':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper('Orden de Examen Medico'),
                                'cantidad_item' => count($info->registros['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }
                    break;
                // 4. EXAMEN ESPECIALIDADES
                case '4':
                    break;
                // 5. CONSENTIMIENTOS INFORMADOS
                case '5':
                    break;
                // 6. INFORME DE EXAMENES
                case '6':
                    break;
                // 7. CERTIFICADO DE REPOSO
                case '7':
                    break;
                // 8. INTER CONSULTA
                case '8':
                    break;
                // 9. RESPUESTA INTERCONSULTA
                case '9':
                    break;
                // 10. INFORM MEDICO
                case '10':
                    break;
                // 11. CONSTANCIA GES
                case '11':
                    break;
                // 12. REMBOLSO GASTOS MEDICOS
                case '12':
                    break;
                // 13. LICENCIA
                case '13':
                    break;
                // 14. FICHA MEDICA UNICA
                case '14':
                    break;
                // 15. ORDEN HOSPITALIZACION
                case '15':
                    break;
                // 17. SOLICITUD DE PABELLON
                case '17':
                    break;
                // 18. EPICRISIS
                case '18':
                    break;
                // 19. PROTOCOLO OPERATORIO
                case '19':
                    break;
                // 20. CARNE DE ALTA
                case '20':
                    break;
                // 21. CARNE DE VACUNA
                case '21':
                    break;
                // 22. USO INTERNO
                case '22':
                    break;
                // 23. CARNET VACUNAS
                case '23':
                    break;
                // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                case '24':
                    break;
                // 25. USOS PERSONALES
                case '25':
                    break;
                default:
                    # code...
                    break;
            }

            $datos['estado'] = 1;
            $datos['paciente'] = $inf_paciente;
            $datos['profesional'] = $inf_profesional;
            $datos['documento'] = $inf_documento;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'documento no valido';
        }

        return $datos;

    }
    public function validarFirmaDocumento(Request $request)
    {
        $datos = array();
        $inf_paciente = array();
        $inf_profesional = array();
        $inf_documento = array();
        $inf_prof_firma = array();

        $info = (object)static::validarCertificadoDocumento($request->tkx_3);
        if($info->estado == 1)
        {

            if(isset($info->registros['paciente']) && !empty($info->registros['paciente']))
            {
                $inf_paciente = array(
                    'nombre' => mb_strtoupper($info->registros['paciente']['nombres']),
                    'apellido_uno' => mb_strtoupper($info->registros['paciente']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['paciente']['apellido_dos']),
                    'rut' => $info->registros['paciente']['rut'],
                    // 'email' => $info->registros['paciente']['email'],
                );
            }

            if(isset($info->registros['profesional']) && !empty($info->registros['profesional']))
            {
                $inf_profesional = array(
                    'nombre' => mb_strtoupper($info->registros['profesional']['nombre']),
                    'apellido_uno' => mb_strtoupper($info->registros['profesional']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['profesional']['apellido_dos']),
                    'rut' => $info->registros['profesional']['rut'],
                    // 'email' => $info->registros['profesional']['email'],
                    // 'especialidad' => $info->registros['profesional']['especialidad'],
                    // 'tipo_especialidad' => $info->registros['profesional']['tipo_especialidad'],
                    // 'sub_tipo_especialidad' => $info->registros['profesional']['sub_tipo_especialidad'],
                    // 'certificado' => $info->registros['profesional']['certificado'],
                    // 'numero_certificado' => $info->registros['profesional']['numero_certificado'],
                );
            }
            switch ($info->documento) {
                // 1. RECETA
                case '1':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $filtro_prof_firma = array();
                            $filtro_prof_firma[] = array('id_autorizacion', $info->registros['detalle'][0]['token_auto']);
                            $filtro_prof_firma[] = array('id_tipo', $info->documento);
                            $filtro_prof_firma[] = array('id_documento', $info->registros['detalle'][0]['id']);
                            $prof_firma = ProfesionalFirma::where($filtro_prof_firma)->first();

                            if($prof_firma)
                            {
                                $inf_prof_firma = array(
                                    'estado' => 1,
                                    'tipo_documento' => $prof_firma->id_tipo,
                                    'numero_documento' => $prof_firma->id_documento,
                                    'msj' => 'Firma Valida para Documento especifico.',
                                    'fecha_autorizacion' => date('d-m-Y H:i', strtotime($prof_firma->created_at)),
                                );
                            }
                            else
                            {
                                $inf_prof_firma = array(
                                    'estado' => 0,
                                    'tipo_documento' => 0,
                                    'numero_documento' => 0,
                                    'msj' => 'Firma NO valida para Documento.',
                                    'fecha_autorizacion' => ''
                                );
                            }
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper($info->registros['detalle'][0]['tipo_control']['descripcion']),
                                'cantidad_item' => count($info->registros['detalle'][0]['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }
                    break;
                // 2. RECETA ESPECIALIDADES
                case '2':
                    break;
                // 3. EXAMEN
                case '3':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {

                        // var_dump($info->registros['detalle'][0]);
                        // exit();

                        if(!empty($info->registros['detalle'][0]))
                        {
                            $filtro_prof_firma = array();
                            // $filtro_prof_firma[] = array('id_autorizacion', $info->registros['detalle'][0]['token_auto']);
                            $filtro_prof_firma[] = array('id_tipo', $info->documento);
                            $filtro_prof_firma[] = array('id_documento', $info->registros['detalle'][0]['id']);

                            $prof_firma = ProfesionalFirma::where($filtro_prof_firma)->first();

                            if($prof_firma)
                            {
                                $inf_prof_firma = array(
                                    'estado' => 1,
                                    'tipo_documento' => $prof_firma->id_tipo,
                                    'numero_documento' => $prof_firma->id_documento,
                                    'msj' => 'Firma Valida para Documento especifico.',
                                    'fecha_autorizacion' => date('d-m-Y H:i', strtotime($prof_firma->created_at)),
                                );
                            }
                            else
                            {
                                $inf_prof_firma = array(
                                    'estado' => 0,
                                    'tipo_documento' => 0,
                                    'numero_documento' => 0,
                                    'msj' => 'Firma NO valida para Documento.',
                                    'fecha_autorizacion' => ''
                                );
                            }
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper('Orden de Examen Medico'),
                                'cantidad_item' => count($info->registros['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }
                    break;
                // 4. EXAMEN ESPECIALIDADES
                case '4':
                    break;
                // 5. CONSENTIMIENTOS INFORMADOS
                case '5':
                    break;
                // 6. INFORME DE EXAMENES
                case '6':
                    break;
                // 7. CERTIFICADO DE REPOSO
                case '7':
                    break;
                // 8. INTER CONSULTA
                case '8':
                    break;
                // 9. RESPUESTA INTERCONSULTA
                case '9':
                    break;
                // 10. INFORM MEDICO
                case '10':
                    break;
                // 11. CONSTANCIA GES
                case '11':
                    break;
                // 12. REMBOLSO GASTOS MEDICOS
                case '12':
                    break;
                // 13. LICENCIA
                case '13':
                    break;
                // 14. FICHA MEDICA UNICA
                case '14':
                    break;
                // 15. ORDEN HOSPITALIZACION
                case '15':
                    break;
                // 17. SOLICITUD DE PABELLON
                case '17':
                    break;
                // 18. EPICRISIS
                case '18':
                    break;
                // 19. PROTOCOLO OPERATORIO
                case '19':
                    break;
                // 20. CARNE DE ALTA
                case '20':
                    break;
                // 21. CARNE DE VACUNA
                case '21':
                    break;
                // 22. USO INTERNO
                case '22':
                    break;
                // 23. CARNET VACUNAS
                case '23':
                    break;
                // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                case '24':
                    break;
                // 25. USOS PERSONALES
                case '25':
                    break;
                default:
                    # code...
                    break;
            }

            $datos['estado'] = 1;
            $datos['paciente'] = $inf_paciente;
            $datos['profesional'] = $inf_profesional;
            $datos['profesional_firma'] = $inf_prof_firma;
            $datos['documento'] = $inf_documento;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'documento no valido';
        }

        return $datos;
    }
    public function validarFechaDocumento(Request $request)
    {
        $datos = array();
        $inf_paciente = array();
        $inf_profesional = array();
        $inf_documento = array();
        // $inf_prof_firma = array();

        $info = (object)static::validarCertificadoDocumento($request->tkx_3);
        if($info->estado == 1)
        {

            if(isset($info->registros['paciente']) && !empty($info->registros['paciente']))
            {
                $inf_paciente = array(
                    'nombre' => mb_strtoupper($info->registros['paciente']['nombres']),
                    'apellido_uno' => mb_strtoupper($info->registros['paciente']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['paciente']['apellido_dos']),
                    'rut' => $info->registros['paciente']['rut'],
                    // 'email' => $info->registros['paciente']['email'],
                );
            }

            if(isset($info->registros['profesional']) && !empty($info->registros['profesional']))
            {
                $inf_profesional = array(
                    'nombre' => mb_strtoupper($info->registros['profesional']['nombre']),
                    'apellido_uno' => mb_strtoupper($info->registros['profesional']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['profesional']['apellido_dos']),
                    'rut' => $info->registros['profesional']['rut'],
                    // 'email' => $info->registros['profesional']['email'],
                    // 'especialidad' => $info->registros['profesional']['especialidad'],
                    // 'tipo_especialidad' => $info->registros['profesional']['tipo_especialidad'],
                    // 'sub_tipo_especialidad' => $info->registros['profesional']['sub_tipo_especialidad'],
                    // 'certificado' => $info->registros['profesional']['certificado'],
                    // 'numero_certificado' => $info->registros['profesional']['numero_certificado'],
                );
            }

            switch ($info->documento) {
                // 1. RECETA
                case '1':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $fecha1= new DateTime($info->registros['detalle'][0]['created_at']);
                            $fecha2= new DateTime(date('Y-m-d H:i:s'));
                            $diff = $fecha1->diff($fecha2);

                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper($info->registros['detalle'][0]['tipo_control']['descripcion']),
                                'cantidad_item' => count($info->registros['detalle'][0]['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                                'dias_elaborado' => $diff->days,
                            );
                        }
                    }
                    break;
                // 2. RECETA ESPECIALIDADES
                case '2':
                    break;
                // 3. EXAMEN
                case '3':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $fecha1= new DateTime($info->registros['detalle'][0]['created_at']);
                            $fecha2= new DateTime(date('Y-m-d H:i:s'));
                            $diff = $fecha1->diff($fecha2);

                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper('Orden de Examen Medico'),
                                'cantidad_item' => count($info->registros['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                                'dias_elaborado' => $diff->days,
                            );
                        }
                    }
                    break;
                // 4. EXAMEN ESPECIALIDADES
                case '4':
                    break;
                // 5. CONSENTIMIENTOS INFORMADOS
                case '5':
                    break;
                // 6. INFORME DE EXAMENES
                case '6':
                    break;
                // 7. CERTIFICADO DE REPOSO
                case '7':
                    break;
                // 8. INTER CONSULTA
                case '8':
                    break;
                // 9. RESPUESTA INTERCONSULTA
                case '9':
                    break;
                // 10. INFORM MEDICO
                case '10':
                    break;
                // 11. CONSTANCIA GES
                case '11':
                    break;
                // 12. REMBOLSO GASTOS MEDICOS
                case '12':
                    break;
                // 13. LICENCIA
                case '13':
                    break;
                // 14. FICHA MEDICA UNICA
                case '14':
                    break;
                // 15. ORDEN HOSPITALIZACION
                case '15':
                    break;
                // 17. SOLICITUD DE PABELLON
                case '17':
                    break;
                // 18. EPICRISIS
                case '18':
                    break;
                // 19. PROTOCOLO OPERATORIO
                case '19':
                    break;
                // 20. CARNE DE ALTA
                case '20':
                    break;
                // 21. CARNE DE VACUNA
                case '21':
                    break;
                // 22. USO INTERNO
                case '22':
                    break;
                // 23. CARNET VACUNAS
                case '23':
                    break;
                // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                case '24':
                    break;
                // 25. USOS PERSONALES
                case '25':
                    break;
                default:
                    # code...
                    break;
            }

            $datos['estado'] = 1;
            $datos['paciente'] = $inf_paciente;
            $datos['profesional'] = $inf_profesional;
            $datos['documento'] = $inf_documento;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'documento no valido';
        }

        return $datos;
    }
    // public function validar_estado_documento(Request $request)
    // {
    //     return static::validarCertificadoProfesional($request->tkx_3);
    // }
    public function validarPacienteDocumento(Request $request)
    {
        $datos = array();
        $inf_paciente = array();
        $inf_profesional = array();
        $inf_documento = array();

        $info = (object)static::validarCertificadoDocumento($request->tkx_3);
        if($info->estado == 1)
        {
            if(isset($info->registros['paciente']) && !empty($info->registros['paciente']))
            {
                $inf_paciente = array(
                    'nombre' => mb_strtoupper($info->registros['paciente']['nombres']),
                    'apellido_uno' => mb_strtoupper($info->registros['paciente']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['paciente']['apellido_dos']),
                    'rut' => $info->registros['paciente']['rut'],
                    'email' => $info->registros['paciente']['email'],
                );
            }

            /** CARGA DE DETALLE Y/O PDF */
            switch ($info->documento) {
                // 1. RECETA
                case '1':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper($info->registros['detalle'][0]['tipo_control']['descripcion']),
                                'cantidad_item' => count($info->registros['detalle'][0]['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }
                    break;
                // 2. RECETA ESPECIALIDADES
                case '2':
                    break;
                // 3. EXAMEN
                case '3':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper('Orden de Examen Medico'),
                                'cantidad_item' => count($info->registros['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }
                    break;
                // 4. EXAMEN ESPECIALIDADES
                case '4':
                    break;
                // 5. CONSENTIMIENTOS INFORMADOS
                case '5':
                    break;
                // 6. INFORME DE EXAMENES
                case '6':
                    break;
                // 7. CERTIFICADO DE REPOSO
                case '7':
                    break;
                // 8. INTER CONSULTA
                case '8':
                    break;
                // 9. RESPUESTA INTERCONSULTA
                case '9':
                    break;
                // 10. INFORM MEDICO
                case '10':
                    break;
                // 11. CONSTANCIA GES
                case '11':
                    break;
                // 12. REMBOLSO GASTOS MEDICOS
                case '12':
                    break;
                // 13. LICENCIA
                case '13':
                    break;
                // 14. FICHA MEDICA UNICA
                case '14':
                    break;
                // 15. ORDEN HOSPITALIZACION
                case '15':
                    break;
                // 17. SOLICITUD DE PABELLON
                case '17':
                    break;
                // 18. EPICRISIS
                case '18':
                    break;
                // 19. PROTOCOLO OPERATORIO
                case '19':
                    break;
                // 20. CARNE DE ALTA
                case '20':
                    break;
                // 21. CARNE DE VACUNA
                case '21':
                    break;
                // 22. USO INTERNO
                case '22':
                    break;
                // 23. CARNET VACUNAS
                case '23':
                    break;
                // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                case '24':
                    break;
                // 25. USOS PERSONALES
                case '25':
                    break;
                default:
                    # code...
                    break;
            }

            $datos['estado'] = 1;
            $datos['paciente'] = $inf_paciente;
            $datos['documento'] = $inf_documento;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'documento no valido';
        }

        return $datos;

    }

    public function validarProfesionalDocumento(Request $request)
    {
        $datos = array();
        $inf_paciente = array();
        $inf_profesional = array();
        $inf_documento = array();
        // $inf_prof_firma = array();

        $info = (object)static::validarCertificadoDocumento($request->tkx_3);
        if($info->estado == 1)
        {
            if(isset($info->registros['profesional']) && !empty($info->registros['profesional']))
            {
                $inf_profesional = array(
                    'nombre' => mb_strtoupper($info->registros['profesional']['nombre']),
                    'apellido_uno' => mb_strtoupper($info->registros['profesional']['apellido_uno']),
                    'apellido_dos' => mb_strtoupper($info->registros['profesional']['apellido_dos']),
                    'rut' => $info->registros['profesional']['rut'],
                    'email' => $info->registros['profesional']['email'],
                    'especialidad' => mb_strtoupper($info->registros['profesional']['especialidad']),
                    'tipo_especialidad' => mb_strtoupper($info->registros['profesional']['tipo_especialidad']),
                    'sub_tipo_especialidad' => mb_strtoupper($info->registros['profesional']['sub_tipo_especialidad']),
                    'certificado' => $info->registros['profesional']['certificado'],
                    'numero_certificado' => $info->registros['profesional']['numero_certificado'],
                );
            }

            switch ($info->documento) {
                // 1. RECETA
                case '1':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper($info->registros['detalle'][0]['tipo_control']['descripcion']),
                                'cantidad_item' => count($info->registros['detalle'][0]['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }

                    break;
                // 2. RECETA ESPECIALIDADES
                case '2':

                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper($info->registros['detalle'][0]['tipo_control']['descripcion']),
                                'cantidad_item' => count($info->registros['detalle'][0]['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }

                    break;
                // 3. EXAMEN
                case '3':
                    if(isset($info->registros['detalle']) && !empty($info->registros['detalle']))
                    {
                        if(!empty($info->registros['detalle'][0]))
                        {
                            $inf_documento = array(
                                'tipo_control' => mb_strtoupper('Orden de Examen Medico'),
                                'cantidad_item' => count($info->registros['detalle']),
                                'fecha_elaboracion' => date('d-m-Y', strtotime($info->registros['detalle'][0]['created_at'])),
                            );
                        }
                    }

                    break;
                // 4. EXAMEN ESPECIALIDADES
                case '4':
                    break;
                // 5. CONSENTIMIENTOS INFORMADOS
                case '5':
                    break;
                // 6. INFORME DE EXAMENES
                case '6':
                    break;
                // 7. CERTIFICADO DE REPOSO
                case '7':
                    break;
                // 8. INTER CONSULTA
                case '8':
                    break;
                // 9. RESPUESTA INTERCONSULTA
                case '9':
                    break;
                // 10. INFORM MEDICO
                case '10':
                    break;
                // 11. CONSTANCIA GES
                case '11':
                    break;
                // 12. REMBOLSO GASTOS MEDICOS
                case '12':
                    break;
                // 13. LICENCIA
                case '13':
                    break;
                // 14. FICHA MEDICA UNICA
                case '14':
                    break;
                // 15. ORDEN HOSPITALIZACION
                case '15':
                    break;
                // 17. SOLICITUD DE PABELLON
                case '17':
                    break;
                // 18. EPICRISIS
                case '18':
                    break;
                // 19. PROTOCOLO OPERATORIO
                case '19':
                    break;
                // 20. CARNE DE ALTA
                case '20':
                    break;
                // 21. CARNE DE VACUNA
                case '21':
                    break;
                // 22. USO INTERNO
                case '22':
                    break;
                // 23. CARNET VACUNAS
                case '23':
                    break;
                // 24. RECETA ESPECIALIDADES - OFTALMOLOGIA - LENTES
                case '24':
                    break;
                // 25. USOS PERSONALES
                case '25':
                    break;
                default:
                    # code...
                    break;
            }

            $datos['estado'] = 1;
            $datos['paciente'] = $inf_paciente;
            $datos['profesional'] = $inf_profesional;
            $datos['documento'] = $inf_documento;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'documento no valido';
        }

        return $datos;
    }
}
