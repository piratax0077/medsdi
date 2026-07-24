<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\Ciudad;
use App\Models\UsuarioPotencial;
use App\Services\WhatsAppService;
use App\Models\Direccion;
use App\Models\Instituciones;
use App\Models\Invitacion;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalEspecialidad;
use App\Models\ProfesionalInstitucionConvenio;
use App\Models\Servicios;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function ingreso(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return view('auth.Registros.ingreso_registro');
        }

        $usuario = User::where('id', Auth::user()->id)->first();


        $roles = $usuario->roles()->orderBy('id', 'DESC')->get();

		// if(Auth::user()->id == 3)
		// 	return redirect('/Acceso');
		// else
        // Los perfiles clínicos tienen prioridad sobre roles secundarios
        // (por ejemplo, Vendedor). Si posee ambos, se prioriza Profesional.
        $roles_principal = $roles->firstWhere('name', 'Profesional')
            ?? $roles->firstWhere('name', 'Paciente')
            ?? $roles->first();

        if (!$roles_principal) {
            return redirect('/Acceso');
        }

        switch ($roles_principal->name) {
            case 'Admin':
                return redirect('/Acceso');
                break;
            case 'Profesional':
                $profesional = Profesional::where('id_usuario', $usuario->id)->first();

                /** laboratorio */
                if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
                {
                    // $prof_lug_at = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where()->get();
                    return redirect()->route('laboratorio.lab_profesional.escritorio_profesional_laboratorio');
                }
                /** laboratorio Rayo */
                else if($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                {
                    // $prof_lug_at = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where()->get();
                    return redirect()->route('laboratorio.lab_profesional.escritorio_profesional_laboratorio');
                }
                else
                {
                    return redirect()->route('profesional.home');
                }
                break;
            case 'Asistente': //asistente consulta
                return redirect()->route('asistente.home');
                break;
            case 'Adm_Comercial': // asistente Comercial (institucion)
                return redirect()->route('administrador_comercial.home');
                break;
            case 'AsistenteAdm': // asistente administrativa (institucion)
                return redirect()->route('asistente_adm.home');
                break;
            case 'AsistenteJefaCaja': // asistente jefe de caja (institucion)
                return redirect()->route('asistentejcm.home');
                break;
            case 'AsistenteLaboratorio': // asistente de laboratorio (institucion)
                return redirect()->route('asistente.lab.home');
                break;
            case 'AsistenteCaja': // asistente de caja (institucion)
                return redirect()->route('asistentecm.home');
                break;
            case 'AsistenteDentalTecn':// asistente tecnico dental
                return redirect()->route('asistentedentaltecn.home');
                break;
            case 'AsistenteDental':// asistente dental
                return redirect()->route('asistentedental.home');
                break;
            case 'AsistenteOnline': // asistente online (institucion / consulta)
                return redirect()->route('asistenteon.home');
                break;
            case 'AsistenteManejoAgenda': // asistente Manejo de Agenda (institucion)
                return redirect()->route('asistentecm.ma.home');
                break;
            case 'AsistenteCargaExamenExterno': // asistente externo caga de examen (usuario para lab - temporal)
                return redirect()->route('lab.exa.asistente.home');
                break;
            case 'AsistenteEnfermeria': // asistente de enfermeria (institucion)
                return redirect()->route('asistente.enfermeria.home');
                break;
            case 'Paciente':
                return redirect()->route('paciente.home');
                break;
            case 'Vendedor':
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return response()
                    ->view('auth.redireccion_vendedor', ['url_destino' => 'https://ventas.med-sdi.cl'])
                    ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
                break;

            case 'Servicio':
                return redirect()->route('servicio.home');
                break;
            case 'Institucion':
                return redirect()->route('institucion.home');
                break;
            case 'Adm_Institucion':
                return redirect()->route('adm_cm.home');
                break;
            case 'Ministerio':
                return redirect()->route('ministerio.home');
                break;
            case 'AdministradorMedico':
                return redirect()->route('profesional.home');
                break;
            case 'AdministradorLaboratorio':
                // return redirect()->route('institucion.home');
                return redirect()->route('laboratorio.adm_general.home');
                break;
			case 'Administrador-SDI':
				return redirect()->route('administracion.home');
				break;
            case 'Contador':
                return redirect()->route('contabilidad.home');
                break;
            case 'Compin':
                return redirect()->route('compin.home');
                break;
            case 'AdministradorTecnico':
                $profesional = Profesional::where('id_usuario', $usuario->id)->first();

                /** laboratorio */
                if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
                {
                    // $prof_lug_at = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where()->get();
                    return redirect()->route('laboratorio.lab_profesional.escritorio_profesional_laboratorio');
                }
                /** laboratorio Rayo */
                else if($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                {
                    // $prof_lug_at = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where()->get();
                    return redirect()->route('laboratorio.lab_profesional.escritorio_profesional_laboratorio');
                }
                else
                {
                    return redirect()->route('laboratorio.administrador_tecnico.home');
                }
                break;
            case 'Chofer':
                return redirect()->route('chofer.home');
                break;
            default:
                return redirect('/Acceso');
                break;
        }
    }

    public function index()
    {
        $usuario = User::where('id', Auth::user()->id)->first();

        $roles = $usuario->roles()->get();
        // if (count($roles) > 1) {
        //     return redirect('/Acceso');
        // }

        switch ($roles[0]->name) {
            case 'Admin':
                return redirect('/Acceso');
                break;
            case 'Asistente': //asistente consulta
                return redirect()->route('asistente.home');
                break;
            case 'Adm_Comercial': // asistente Comercial (institucion)
                return redirect()->route('administrador_comercial.home');
                break;
            case 'AsistenteAdm': // asistente administrativa (institucion)
                return redirect()->route('asistente_adm.home');
                break;
            case 'AsistenteJefaCaja': // asistente jefe de caja (institucion)
                return redirect()->route('asistentejcm.home');
                break;
            case 'AsistenteCaja': // asistente de caja (institucion)
                return redirect()->route('asistentecm.home');
                break;
			case 'AsistenteDentalTecn':// asistente tecnico dental
                return redirect()->route('asistentedentaltecn.home');
                break;
            case 'AsistenteDental':// asistente dental
                return redirect()->route('asistentedental.home');
                break;
            case 'AsistenteOnline': // asistente online (institucion / consulta)
                return redirect()->route('asistenteon.home');
                break;
            case 'AsistenteManejoAgenda': // asistente Manejo de Agenda (institucion)
                return redirect()->route('asistentecm.ma.home');
                break;
            case 'Paciente':
                return redirect()->route('paciente.home');
                break;
            case 'Profesional':
                $profesional = Profesional::where('id_usuario', $usuario->id)->first();
                if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
                {
                    // $prof_lug_at = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where()->get();
                    return redirect()->route('laboratorio.lab_profesional.escritorio_profesional_laboratorio');
                }
                else
                {
                    return redirect()->route('profesional.home');
                }
                break;
			case 'Servicio':
                return redirect()->route('servicio.home');
                break;
            case 'Institucion':
                return redirect()->route('institucion.home');
                break;
            case 'Ministerio':
                return redirect()->route('ministerio.home');
                break;
            default:
                return redirect('/');
                break;
        }
    }

    public function acceso()
    {
        return view('app.home.acceso');
    }

    public function registro(Request $request)
    {

        $user = User::where('email', $request->email_registro)->first();
        if($user == NULL)
        {
            $user = new User();
            $user->email = $request->email_registro;
            $user->password = Hash::make($request->password_registro);
            // $user->name = $request->nombre_registro;
            if (!$user->save()) {
                return back()->with('mensaje', 'error al crear el usuario');
            }
        }

        switch ($request->cuenta_registro) {
            case '1':
                $user->assignRole('Admin');
                break;
            case '2':
                $user->assignRole('Paciente');
                break;
            case '3':
                $user->assignRole('Profesional');
                break;
            case '4':
                $user->assignRole('Asistente');
                break;
			case '5':
                $user->assignRole('Institucion');
                break;
            case '6':
                $user->assignRole('Servicio');
                break;
			case '7':
                $user->assignRole('Adm_Institucion');
                break;
            case '8':
                $user->assignRole('Adm_Comercial');
                break;
            case '9':
                $user->assignRole('Contador');
                break;
            case '10':
                $user->assignRole('AsistenteAdm');
                break;
            case '11':
                $user->assignRole('AsistenteJefaCaja');
                break;
            case '12':
                $user->assignRole('AsistenteCaja');
                break;
            case '13':
                $user->assignRole('AsistenteOnline');
                break;
            case '14':
                $user->assignRole('AsistenteManejoAgenda');
                break;
            case '15':
                $user->assignRole('AsistenteDentalTecn');
                break;
            case '16':
                $user->assignRole('AsistenteDental');
                break;
            default:
                // code...
                break;
        }

        return back()->with('mensaje', 'Usuario creado de forma correcta');
    }

    public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }

    public function buscar_especialidad(Request $request)
    {
        $tipo_especialidad = TipoEspecialidad::where('id_especialidad', $request->especialidad)->get();

        return json_encode($tipo_especialidad);
    }

	public function buscar_sub_tipo_especialidad(Request $request)
    {
        $tipo_especialidad = SubTipoEspecialidad::where('id_tipo_especialidad', $request->especialidad)->get();

        return json_encode($tipo_especialidad);
    }

    public function registro_asistente(Request $request)
    {
        $datos = array();

        $validacionEmail = Asistente::where('email',@Auth::user()->email)->first();

        if(!$validacionEmail)
        {
            $asistente = new Asistente();
            $asistente->rut = $request->rut_verificacion;
            $asistente->nombres = $request->nombre_registro;
            $asistente->apellido_uno = $request->primer_apellido_registro;
            $asistente->apellido_dos = $request->segundo_apellido_registro;
            $asistente->fecha_nac = $request->fecha_nacimiento_registro;
            $asistente->sexo = $request->sexo_registro;
            $asistente->id_usuario = @Auth::user()->id;
            $asistente->bienvenido = 1;
            $asistente->email = @Auth::user()->email;
            $asistente->telefono_uno = $request->telefono_registro;
            $asistente->telefono_dos = $request->telefono_dos_registro;

            $direccion = new Direccion();
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            $direccion->id_ciudad = $request->id_ciudad;
            if (!$direccion->save()) {
                // return 'error';
                $asistente->id_direccion = 0;
                $datos['direccion']['estado'] = 0;
                $datos['direccion']['msj'] = 'falla al registrar';
            } else {
                $asistente->id_direccion = $direccion->id;
                $datos['direccion']['estado'] = 1;
                $datos['direccion']['msj'] = 'registro exitoso';
            }

            if (!$asistente->save()) {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla al registrar asistente';
            } else {

                $user = User::find( @Auth::user()->id );
                $user->name = $request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro;
                if($user->save())
                {
                    $datos['user']['estado'] = 1;
                    $datos['user']['msj'] = 'registro exitoso';
                }

                /** envio de correo de confirmacion  */
                $blade = 'bienvenida_asistente';
                $to = array(
                        array('email' => @Auth::user()->email,'name' => $request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro),
                    );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Bienvenido!';
                $body = array('nombre'=>$request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro);
                $archivo = '';/** pendiente */
                $id_institucion = '';

                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                if($result_mail['estado'])
                {
                    $datos['mail']['estado'] = 1;
                    $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
                }
                else
                {
                    $datos['mail']['estado'] = 0;
                    $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['email'] = @Auth::user()->email;

            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'correo de asistente ya registrado';
        }

        return $datos;
    }

	/**
     * REGISTRO DE PACIENTE
     */
    public function registro_paciente(Request $request)
    {
        $datos = array();

        $validacionEmail = Paciente::where('email',@Auth::user()->email)->first();

        if(!$validacionEmail)
        {
            $paciente = new Paciente();
            $paciente->token = md5(uniqid());
            $paciente->rut = $request->rut_verificacion;
            $paciente->nombres = $request->nombre_registro;
            $paciente->apellido_uno = $request->primer_apellido_registro;
            $paciente->apellido_dos = $request->segundo_apellido_registro;
            $paciente->fecha_nac = $request->fecha_nacimiento_registro;
            $paciente->sexo = $request->sexo_registro;
            $paciente->id_usuario = @Auth::user()->id;
            $paciente->email = @Auth::user()->email;
            $paciente->id_prevision = $request->prevision_registro;
            $paciente->telefono_uno = $request->telefono_registro;
            $paciente->telefono_dos = $request->telefono_dos_registro;

            $direccion = new Direccion();
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            $direccion->id_ciudad = $request->id_ciudad;
            if (!$direccion->save()) {
                // return 'error';
                $paciente->id_direccion = 0;
                $datos['direccion']['estado'] = 0;
                $datos['direccion']['msj'] = 'falla al registrar';
            } else {
                $paciente->id_direccion = $direccion->id;
                $datos['direccion']['estado'] = 1;
                $datos['direccion']['msj'] = 'registro exitoso';
            }

            if (!$paciente->save()) {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla al registrar paciente';
            } else {

                $user = User::find( @Auth::user()->id );
                $user->name = $request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro;
                if($user->save())
                {
                    $datos['user']['estado'] = 1;
                    $datos['user']['msj'] = 'registro exitoso';
                }

                /** envio de correo de confirmacion  */
                $blade = 'bienvenida_paciente';
                $to = array(
                        array('email' => @Auth::user()->email,'name' => $request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro),
                    );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Bienvenido!';
                $body = array('nombre'=>$request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro);
                $archivo = '';/** pendiente */
                $id_institucion = '';

                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                if($result_mail['estado'])
                {
                    $datos['mail']['estado'] = 1;
                    $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
                }
                else
                {
                    $datos['mail']['estado'] = 0;
                    $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                }


                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['email'] = @Auth::user()->email;

            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'correo de paciente ya registrado';
        }

        return $datos;
    }

	/**
     * REGISTRO DE PROFESIONAL
     */
    public function registro_profesional(Request $request)
    {
        $datos = array();

        $validacionEmail = Profesional::where('email',@Auth::user()->email)->first();

        if(!$validacionEmail)
        {
            $profesional = new Profesional();
            $profesional->rut = $request->rut_verificacion;
            $profesional->nombre = $request->nombre_registro;
            $profesional->apellido_uno = $request->primer_apellido_registro;
            $profesional->apellido_dos = $request->segundo_apellido_registro;
            $profesional->certificado = mt_rand(1, 10);
            $profesional->sexo = $request->sexo_registro;
            $profesional->id_usuario = @Auth::user()->id;
            $profesional->email = @Auth::user()->email;
            $profesional->id_especialidad = $request->especialidad_registro;
            $profesional->id_tipo_especialidad = $request->tipo_specialidad_registro;
            $profesional->id_sub_tipo_especialidad = $request->sub_tipo_specialidad_registro;
            $profesional->telefono_uno = $request->telefono_registro;
            $profesional->telefono_dos = $request->telefono_dos_registro;

            $direccion = new Direccion();
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            $direccion->id_ciudad = $request->id_ciudad;
            if (!$direccion->save())
            {
                // return 'error';
                $profesional->id_direccion = 0;
                $datos['direccion']['estado'] = 0;
                $datos['direccion']['msj'] = 'falla al registrar';
            }
            else
            {
                $profesional->id_direccion = $direccion->id;
                $datos['direccion']['estado'] = 1;
                $datos['direccion']['msj'] = 'registro exitoso';
            }

            if (!$profesional->save())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla al registrar profesional';
            }
            else
            {

                $user = User::find( @Auth::user()->id );
                $user->name = $request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro;
                if($user->save())
                {
                    $datos['user']['estado'] = 1;
                    $datos['user']['msj'] = 'registro exitoso';
                }


                /** buscar invitacione */
                $filtro_inv = array();
                $filtro_inv[] = array('id_user_invitado', @Auth::user()->id);
                $filtro_inv[] = array('estado', 0);
                $registro_invitaciones = Invitacion::where($filtro_inv)->get();

                if($registro_invitaciones)
                {
                    $datos['invitaciones']['estado'] = 0;
                    $datos['invitaciones']['msj'] = 'Se encontraron Invitaciones al profesional';
                    $datos['invitaciones']['cant'] = $registro_invitaciones->count();
                    $datos['invitaciones']['registro_invitaciones'] = $registro_invitaciones;

                    foreach ($registro_invitaciones as $key => $value)
                    {
                        $buscar_prof_lugar = ProfesionalesLugaresAtencion::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$value->id_lugar_atencion)->first();
                        if($buscar_prof_lugar)
                        {
                            $invitacion = Invitacion::find($value->id);
                            $invitacion->procesado = 1;
                            $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                            $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                            $invitacion->estado = 1;
                            if($invitacion->save())
                            {
                                $datos['invitacion']['inv'][$key]['estado'] = 1;
                                $datos['invitacion']['inv'][$key]['msj'] = 'Ya pertenese al Lugar de Atencion';
                                $datos['invitacion'] = $invitacion;

                                $filtro_con = array();
                                $filtro_con[] = array('id_invitacion', $invitacion->id);
                                $convenio = ProfesionalInstitucionConvenio::where($filtro_con)->first();
                                if($convenio)
                                {
                                    $datos['convenio'] = $convenio;
                                    $convenio->id_profesional = $profesional->id;
                                    if($convenio->save())
                                    {
                                        $datos['convenio_update']['estado'] = 1;
                                        $datos['convenio_update']['msj'] = 'exito';
                                    }
                                    else
                                    {
                                        $datos['convenio_update']['estado'] = 0;
                                        $datos['convenio_update']['msj'] = 'falla';
                                    }

                                }
                                else
                                {
                                    $datos['convenio'] = 'sin convenio';
                                }
                            }
                            else
                            {
                                $datos['invitacion']['inv'][$key]['estado'] = 0;
                                $datos['invitacion']['inv'][$key]['msj'] = 'Ya pertenese al Lugar de Atencion, invitacion no actualizadad';
                            }

                        }
                        else
                        {
                            /** profesional existente */
                            $reg_prof_lugar = new ProfesionalesLugaresAtencion();
                            $reg_prof_lugar->id_profesional = $profesional->id;
                            $reg_prof_lugar->id_lugar_atencion = $value->id_lugar_atencion;
                            $reg_prof_lugar->estado = 1;
                            if($reg_prof_lugar->save())
                            {
                                $invitacion = Invitacion::find($value->id);
                                $invitacion->procesado = 1;
                                $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                $invitacion->estado = 1;
                                if($invitacion->save())
                                {
                                    $datos['invitacion']['inv'][$key]['estado'] = 1;
                                    $datos['invitacion']['inv'][$key]['msj'] = 'Profesional relacionado al Lugar de Atencion';

                                    $filtro_con = array();
                                    $filtro_con[] = array('id_invitacion', $invitacion->id);
                                    $convenio = ProfesionalInstitucionConvenio::where($filtro_con)->first();
                                    if($convenio)
                                    {
                                        $datos['convenio'] = $convenio;
                                        $convenio->id_profesional = $profesional->id;
                                        if($convenio->save())
                                        {
                                            $datos['convenio_update']['estado'] = 1;
                                            $datos['convenio_update']['msj'] = 'exito';
                                        }
                                        else
                                        {
                                            $datos['convenio_update']['estado'] = 0;
                                            $datos['convenio_update']['msj'] = 'falla';
                                        }
                                    }
                                    else
                                    {
                                        $datos['convenio'] = 'sin convenio';
                                    }
                                }
                                else
                                {
                                    $datos['invitacion']['inv'][$key]['estado'] = 0;
                                    $datos['invitacion']['inv'][$key]['msj'] = 'Profesional relacionado al Lugar de Atencion, invitacion no actualizadad';
                                }
                            }
                            else
                            {
                                $datos['invitacion']['inv'][$key]['estado'] = 0;
                                $datos['invitacion']['inv'][$key]['msj'] = 'Problema relacionando Lugar de Atencion';
                            }
                        }
                    }
                }
                else
                {
                    $datos['invitaciones']['estado'] = 0;
                    $datos['invitaciones']['msj'] = 'no tiene invitaciones pendiente que procesar';
                }
                /** envio de correo de confirmacion  */
                $blade = 'bienvenida_profesional';
                $to = array(
                        array('email' => @Auth::user()->email,'name' => $request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro),
                    );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Bienvenido!';
                $body = array('nombre'=>$request->nombre_registro.' '.$request->primer_apellido_registro.' '.$request->segundo_apellido_registro);
                $archivo = '';/** pendiente */
                $id_institucion = '';

                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                if($result_mail['estado'])
                {
                    $datos['mail']['estado'] = 1;
                    $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
                }
                else
                {
                    $datos['mail']['estado'] = 0;
                    $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['email'] = @Auth::user()->email;

            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'correo de profesional ya registrado';
        }

        Log::warning(json_encode($datos));
        return $datos;
    }

	/** REGISTRO SERVICIO */
    public function registro_servicio(Request $request)
    {
        $datos = array();

        $validacionEmail = Servicios::where('email',@Auth::user()->email)->first();

        if(!$validacionEmail)
        {
            $servicio = new Servicios();

            $servicio->nombre = $request->nombre;
            $servicio->rut = $request->rut;
            $servicio->id_usuario = @Auth::user()->id;
            $servicio->email = @Auth::user()->email;
            $servicio->logo = $request->logo;
            $servicio->telefono = $request->telefono;

            $servicio->rut_responsable = $request->responsable_rut;
            $servicio->nombre_responsable = $request->responsable_nombre.' '.$request->responsable_apellido_uno.' '.$request->responsable_apellido_dos;

            $servicio->id_servicio = $request->id_tiposervicio;
            $servicio->estado = 1;

            $direccion = new Direccion();
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero;
            $direccion->id_ciudad = $request->ciudad;
            if (!$direccion->save()) {
                // return 'error';
                $servicio->id_direccion = 0;
                $datos['direccion']['estado'] = 0;
                $datos['direccion']['msj'] = 'falla al registrar';
            } else {
                $servicio->id_direccion = $direccion->id;
                $datos['direccion']['estado'] = 1;
                $datos['direccion']['msj'] = 'registro exitoso';
            }

            /* crear usuario responsable*/
            $user_responsable = User::where('email', $request->responsable_email_registro)->first();
            if($user_responsable == NULL)
            {
                $user_responsable = new User();
                $user_responsable->email = $request->responsable_email_registro;
                $user_responsable->password = Hash::make($request->responsable_password_registro);
                $user_responsable->name = $request->responsable_nombre.' '.$request->responsable_apellido_uno.' '.$request->responsable_apellido_dos;
                if ($user_responsable->save())
                {
                    /** asignando rol de adminstrador de institucion */
                    $user_responsable->assignRole('Adm_Institucion');
                }
                else
                {
                    $datos['responsable']['user']['estado'] = 0;
                    $datos['responsable']['user']['reuslt'] = $user_responsable;
                }
            }
            else
            {
                $user_responsable->assignRole('Adm_Institucion');
            }

            /** crear administrador institucion o servicio */
            $adminInstserv = new AdminInstServ();

            $adminInstserv->rut = $request->responsable_rut;
            $adminInstserv->nombres = $request->responsable_nombre;
            $adminInstserv->apellido_uno = $request->responsable_apellido_uno;
            $adminInstserv->apellido_dos = $request->responsable_apellido_dos;
            $adminInstserv->telefono_uno = $request->responsable_celular;
            $adminInstserv->telefono_dos = $request->responsable_telefono;
            $adminInstserv->email = $request->responsable_email_registro;
            $adminInstserv->id_tipo_administrador = 2; /** administrador de SERVICIO */
            $adminInstserv->id_admin = $user_responsable->id;
            $adminInstserv->estado = 1;

            /** crear direccion */
            $responsable_direccion = new Direccion();
            $responsable_direccion->direccion = $request->responsable_direccion;
            $responsable_direccion->numero_dir = $request->responsable_numero;
            $responsable_direccion->id_ciudad = $request->responsable_ciudad;
            if (!$responsable_direccion->save()) {
                // return 'error';
                $adminInstserv->id_direccion = 0;
                $datos['responsable']['direccion']['estado'] = 0;
                $datos['responsable']['direccion']['msj'] = 'falla al registrar';
            } else {
                $adminInstserv->id_direccion = $responsable_direccion->id;
                $datos['responsable']['direccion']['estado'] = 1;
                $datos['responsable']['direccion']['msj'] = 'registro exitoso';
            }

            if($adminInstserv->save())
            {
                $datos['responsable']['registro']['estado'] = 1;
                $datos['responsable']['registro']['msj'] = 'registro exitoso';
                $servicio->id_responsable = $adminInstserv->id;

                if (!$servicio->save()) {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla al registrar servicio';
                } else {

                    $user = User::find( @Auth::user()->id );
                    $user->name = $request->nombre;
                    if($user->save())
                    {
                        $datos['user']['estado'] = 1;
                        $datos['user']['msj'] = 'registro exitoso';
                    }
                    /** envio de correo de confirmacion  */
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                    $datos['email'] = @Auth::user()->email;
                }
            }
            else
            {
                $datos['responsable']['registro']['estado'] = 0;
                $datos['responsable']['registro']['msj'] = 'registro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'correo de profesional ya registrado';
        }

        return $datos;
    }

    /** REGISTRO INSTITUCION */
    public function registro_institucion(Request $request)
    {
        $datos = array();

        $validacionEmail = Instituciones::where('email',@Auth::user()->email)->first();

        if(!$validacionEmail)
        {
            $institucion = new Instituciones();

            $institucion->nombre = $request->institucion_nombre;
            $institucion->rut = $request->institucion_rut;
            $institucion->id_usuario = @Auth::user()->id;
            $institucion->email = @Auth::user()->email;
            // $institucion->logo = $request->logo;
            $institucion->telefono = $request->institucion_telefono;

            $institucion->rut_responsable = $request->responsable_rut;
            $institucion->nombre_responsable = $request->responsable_nombre.' '.$request->responsable_apellido_uno.' '.$request->responsable_apellido_dos;

            // $institucion->id_servicio = $request->id_servicio;
            $institucion->id_tipo_institucion = $request->institucion_id_tipo_institucion;
            $institucion->estado = 1;

            $direccion = new Direccion();
            $direccion->direccion = $request->institucion_direccion;
            $direccion->numero_dir = $request->institucion_numero;
            $direccion->id_ciudad = $request->institucion_ciudad;
            if (!$direccion->save()) {
                // return 'error';
                $institucion->id_direccion = 0;
                $datos['direccion']['estado'] = 0;
                $datos['direccion']['msj'] = 'falla al registrar';
            } else {
                $institucion->id_direccion = $direccion->id;
                $datos['direccion']['estado'] = 1;
                $datos['direccion']['msj'] = 'registro exitoso';
            }


            /* crear usuario responsable*/
            $user_responsable = User::where('email', $request->responsable_email_registro)->first();
            if($user_responsable == NULL)
            {
                $user_responsable = new User();
                $user_responsable->email = $request->responsable_email_registro;
                $user_responsable->password = Hash::make($request->responsable_password_registro);
                $user_responsable->name = $request->responsable_nombre.' '.$request->responsable_apellido_uno.' '.$request->responsable_apellido_dos;
                if ($user_responsable->save())
                {
                    /** asignando rol de adminstrador de institucion */
                    $user_responsable->assignRole('Adm_Institucion');
                }
                else
                {
                    $datos['responsable']['user']['estado'] = 0;
                    $datos['responsable']['user']['reuslt'] = $user_responsable;
                }
            }
            else
            {
                $user_responsable->assignRole('Adm_Institucion');
            }

            $busqueda_admInsSer = AdminInstServ::where('rut', $request->responsable_rut)->get()->first();
            if($busqueda_admInsSer)
            {
                $institucion->id_responsable = $busqueda_admInsSer->id;

                /** crear lugar de atencion (casa matriz) */
                $lugar_atencion = new LugarAtencion();

                $lugar_atencion->nombre = $request->institucion_nombre;
                $lugar_atencion->rut = $request->institucion_rut;
                $lugar_atencion->email = @Auth::user()->email;
                $lugar_atencion->telefono = $request->institucion_telefono;
                $lugar_atencion->id_direccion = $direccion->id;
                $lugar_atencion->tipo = 1;

                $id_lugar_atencion_casa_matriz = 0;
                if($lugar_atencion->save())
                {
                    $datos['lugar_atencion']['estado'] = 1;
                    $datos['lugar_atencion']['msj'] = 'lugar atencion casa matriz creado';

                    $id_lugar_atencion_casa_matriz = $lugar_atencion->id;
                }
                else
                {
                    $datos['lugar_atencion']['estado'] = 0;
                    $datos['lugar_atencion']['msj'] = 'fallo al crear lugar atencion casa matriz';

                    $id_lugar_atencion_casa_matriz = 0;
                }

                if(!empty($id_lugar_atencion_casa_matriz))
                    $institucion->id_lugar_atencion = $id_lugar_atencion_casa_matriz;

                if (!$institucion->save())
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla al registrar institucion';
                }
                else
                {
                    $user = User::find( @Auth::user()->id );
                    $user->name = $request->institucion_nombre;
                    if($user->save())
                    {
                        $datos['user']['estado'] = 1;
                        $datos['user']['msj'] = 'registro exitoso';
                    }

                    /** envio de correo de confirmacion INSTITUCION */
                    $blade = 'bienvenida_institucion';
                    $to = array(
                            array('email' => @Auth::user()->email,'name' => $request->institucion_nombre),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Bienvenido!';
                    $body = array('nombre'=>$request->institucion_nombre);
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

                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                    $datos['email'] = @Auth::user()->email;

                }
            }
            else
            {

                /** crear administrador institucion o servicio */
                $adminInstserv = new AdminInstServ();

                $adminInstserv->rut = $request->responsable_rut;
                $adminInstserv->nombres = $request->responsable_nombre;
                $adminInstserv->apellido_uno = $request->responsable_apellido_uno;
                $adminInstserv->apellido_dos = $request->responsable_apellido_dos;
                $adminInstserv->telefono_uno = $request->responsable_celular;
                $adminInstserv->telefono_dos = $request->responsable_telefono;
                $adminInstserv->email = $request->responsable_email_registro;
                $adminInstserv->id_tipo_administrador = 1; /** administrador de CM */
                $adminInstserv->id_admin = $user_responsable->id;
                $adminInstserv->estado = 1;

                /** crear direccion */
                $responsable_direccion = new Direccion();
                $responsable_direccion->direccion = $request->responsable_direccion;
                $responsable_direccion->numero_dir = $request->responsable_numero;
                $responsable_direccion->id_ciudad = $request->responsable_ciudad;
                if (!$responsable_direccion->save()) {
                    // return 'error';
                    $adminInstserv->id_direccion = 0;
                    $datos['responsable']['direccion']['estado'] = 0;
                    $datos['responsable']['direccion']['msj'] = 'falla al registrar';
                } else {
                    $adminInstserv->id_direccion = $responsable_direccion->id;
                    $datos['responsable']['direccion']['estado'] = 1;
                    $datos['responsable']['direccion']['msj'] = 'registro exitoso';
                }

                if($adminInstserv->save())
                {
                    /** envio de correo de confirmacion  ADMINISTRADOR INSTITUCION*/
                    $blade = 'bienvenida_admin_institucion';
                    $to = array(
                            array('email' => $request->responsable_email_registro,'name' => $request->responsable_nombre.' '.$request->responsable_apellido_uno.' '.$request->responsable_apellido_dos),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Bienvenido!';
                    $body = array(
                            'nombre'=> $request->responsable_nombre.' '.$request->responsable_apellido_uno.' '.$request->responsable_apellido_dos,
                            'nombre_institucion'=> $request->institucion_nombre,
                            'usuario' => $request->responsable_email_registro,
                            'contrasena'=> $request->responsable_password_registro,
                        );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail_amdin =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail_amdin['estado'])
                    {
                        $datos['mail']['admin_institucion']['estado'] = 1;
                        $datos['mail']['admin_institucion']['msj'] = 'Notificacion de bienvenida enviado';
                    }
                    else
                    {
                        $datos['mail']['admin_institucion']['estado'] = 0;
                        $datos['mail']['admin_institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                    }

                    $datos['responsable']['registro']['estado'] = 1;
                    $datos['responsable']['registro']['msj'] = 'registro exitoso';


                    /** crear lugar de atencion (casa matriz) */
                    $lugar_atencion = new LugarAtencion();

                    $lugar_atencion->nombre = $request->institucion_nombre;
                    $lugar_atencion->rut = $request->institucion_rut;
                    $lugar_atencion->email = @Auth::user()->email;
                    $lugar_atencion->telefono = $request->institucion_telefono;
                    $lugar_atencion->id_direccion = $direccion->id;
                    $lugar_atencion->tipo = 1;

                    $id_lugar_atencion_casa_matriz = 0;
                    if($lugar_atencion->save())
                    {
                        $datos['lugar_atencion']['estado'] = 1;
                        $datos['lugar_atencion']['msj'] = 'lugar atencion casa matriz creado';

                        $id_lugar_atencion_casa_matriz = $lugar_atencion->id;
                    }
                    else
                    {
                        $datos['lugar_atencion']['estado'] = 0;
                        $datos['lugar_atencion']['msj'] = 'fallo al crear lugar atencion casa matriz';

                        $id_lugar_atencion_casa_matriz = 0;
                    }

                    if(!empty($id_lugar_atencion_casa_matriz))
                        $institucion->id_lugar_atencion = $id_lugar_atencion_casa_matriz;

                    $institucion->id_responsable = $adminInstserv->id;
                    if (!$institucion->save())
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'falla al registrar institucion';
                    }
                    else
                    {
                        $user = User::find( @Auth::user()->id );
                        $user->name = $request->institucion_nombre;
                        if($user->save())
                        {
                            $datos['user']['estado'] = 1;
                            $datos['user']['msj'] = 'registro exitoso';
                        }

                        /** envio de correo de confirmacion INSTITUCION */
                        $blade = 'bienvenida_institucion';
                        $to = array(
                                array('email' => @Auth::user()->email,'name' => $request->institucion_nombre),
                            );
                        $cc = array();
                        $bcc = array();
                        $asunto = 'MED-SDI - Bienvenido!';
                        $body = array('nombre'=>$request->institucion_nombre);
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

                        $datos['estado'] = 1;
                        $datos['msj'] = 'registro exitoso';
                        $datos['email'] = @Auth::user()->email;

                    }
                }
                else
                {
                    $datos['responsable']['registro']['estado'] = 0;
                    $datos['responsable']['registro']['msj'] = 'registro con falla';
                }
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'correo de Intitucion  ya registrado';
        }

        return $datos;
    }

    public function verificar_rut(Request $request)
    {
        switch ($request->tipo) {
            case 'profesional':
                $profesional = Profesional::where('rut', $request->rut)->first();
                if (isset($profesional)) {
                    return 'ok';
                } else {
                    return 'fail';
                }
                break;

            default:
                // code...
                break;
        }
        $paciente = Paciente::where('rut', $request->rut)->first();

        //return json_encode($paciente);
        if (isset($paciente)) {
            return 'ok';
        } else {
            return 'fail';
        }
    }

    /* Vue */
    public function EscritorioDental(){
        return view('template.dentalTemplate');
    }

    /** BUSCAR EXISTENCIA DE EMAIL EN USUARIOS */
    public function buscar_user_email(Request $request)
    {
        $datos = array();

        $registro = User::where('email',$request->email)->first();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Rut encontrado';
            $roles = $registro->roles()->get();
            $list_roles = array();
            $list_roles_id = array();
            if (count($roles) > 1)
            {
                foreach ($roles as $key_r => $value_r) {
                    array_push($list_roles,array($value_r->id,$value_r->name));
                    array_push($list_roles_id,$value_r->id);
                }
            }
            $datos['roles_actuales'] = $list_roles;
            $datos['roles_actuales_id'] = $list_roles_id;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Rut NO encontrado';
        }

        return $datos;
    }

    /** RECUPERAR CONTRASEÑA */
    public function recuperarcontrasena(Request $request)
    {
		// var_dump($request->input('g-recaptcha-response'));
		// var_dump($request->ip());
		// die();
        $email = $request->email;

		if(!empty($request->input('g-recaptcha-response')))
        {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            $result = $response->json();

            if (!($result['success'] ?? false)) {
                return back()->withErrors(['captcha' => 'Verifica que no eres un robot.']);
            }

			if(!empty($email))
			{
				if(static::validarEmail($email))
				{
					$user = User::where('email', $email)->get()->first();
					if($user)
					{
						$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						// Output: iNCHNGzByPjhApvn7XBD
						$contrasena = static::generate_string($permitted_chars, 5);

						$user->password = Hash::make($contrasena);
						if ($user->save())
						{
							/** envio de correo de confirmacion  */
							$blade = 'recuperacion_contrasena';
							$to = array(
									array('email' => $user->email,'name' => $user->name),
								);
							$cc = array();
							$bcc = array();
							$asunto = 'MED-SDI - Recuperacion Contraseña';
							$body = array(
								'nombre'=>$user->name,
								'pass'=>$contrasena,
							);
							$archivo = '';/** pendiente */
							$id_institucion = '';

							$result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

							if($result_mail['estado'])
							{
								// return view('auth.Registros.ingreso_registro')->with('mensaje', 'Se a actualizado la contraseña.\n Se ha enviado un correo con la nueva contraseña.');
								return back()->with('mensaje', 'Se a actualizado la contraseña. Se ha enviado un correo con la nueva contraseña.');
							}
							else
							{
								// return view('auth.Registros.ingreso_registro')->with('mensaje', 'Se a actualizado la contraseña.\n El envio de correo con la nueva contraseña a fallado.');
								return back()->with('mensaje', 'Se a actualizado la contraseña. El envio de correo con la nueva contraseña a fallado.');
							}
						}
						else
						{
							// return view('auth.Registros.ingreso_registro')->with('mensaje', 'Se a presentado una falla al actualizar la contraseña.');
							return back()->with('mensaje', 'Se a presentado una falla al actualizar la contraseña.');
						}
					}
					else
					{
						// return view('auth.Registros.ingreso_registro')->with('mensaje', 'El correo indicado no se encuentra en nuestra base de datos.\n Por favor verifique el correo.');
						return back()->with('mensaje', 'El correo indicado no se encuentra en nuestra base de datos. Por favor verifique el correo.');
					}
				}
				else
				{
					// return view('auth.Registros.ingreso_registro')->with('mensaje', 'Email no es valido.');
					return back()->with('mensaje', 'Email no es valido.');
				}
			}
			else
			{
				// return view('auth.Registros.ingreso_registro')->with('mensaje', 'Debe ingresar Email.');
				return back()->with('mensaje', 'Debe ingresar Email.');
			}
		}
        else
        {
            return back()->withErrors(['captcha' => 'Verifica que no eres un robot.']);
        }
    }

    /** REGISTRO DE USUARIO POTENCIAL (lead/contacto de venta) */
    public function registrar_potencial(Request $request)
    {
        // Validar reCAPTCHA
        $recaptcha_token = $request->input('g-recaptcha-response');

        if (!$recaptcha_token) {
            return back()->withErrors(['g-recaptcha-response' => 'Por favor, verifica que no eres un robot.'], 'registro')->withInput();
        }

        // Verificar el token de reCAPTCHA con Google
        $recaptcha_secret = config('services.recaptcha.secret_key');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_token
        ]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        curl_close($ch);

        $response_data = json_decode($response, true);

        // Verificar que la respuesta sea válida y tenga un score mínimo
        if (!$response_data['success'] || ($response_data['score'] ?? 0) < 0.5) {
            return back()->withErrors(['g-recaptcha-response' => 'La verificación de reCAPTCHA falló. Por favor, intenta de nuevo.'], 'registro')->withInput();
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nombre'   => 'required|string|max:150',
            'rut'      => 'nullable|string|max:12',
            'telefono' => 'nullable|string|max:20',
            'email'    => 'nullable|email|max:150',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.email'     => 'El correo ingresado no es válido.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'registro')->withInput();
        }

        UsuarioPotencial::create([
            'rut'      => $request->rut,
            'nombre'   => $request->nombre,
            'telefono' => $request->telefono,
            'email'    => $request->email,
            'estado'   => 'pendiente',
        ]);

        // Enviar correo de bienvenida si proporcionó email
        if (!empty($request->email)) {
            try {
                SendMailController::envioCorreo(
                    'bienvenida_usuario_potencial',
                    [['email' => $request->email, 'name' => $request->nombre]],
                    [],
                    [],
                    'Medichile – ¡Gracias por tu interés!',
                    ['nombre' => $request->nombre],
                    '',
                    ''
                );
            } catch (\Exception $e) {
                Log::warning('No se pudo enviar correo a usuario potencial: ' . $e->getMessage());
            }
        }

        // Enviar WhatsApp de saludo si proporcionó teléfono
        if (!empty($request->telefono)) {
            try {
                $mensaje_wa = "¡Hola {$request->nombre}! 👋\n\n"
                    . "Gracias por tu interés en *Medichile – SDI*, el sistema de gestión clínica más completo de Chile.\n\n"
                    . "Pronto uno de nuestros asesores se comunicará contigo para contarte todo sobre nuestra plataforma. 😊\n\n"
                    . "_Equipo Medichile_";

                $resultado_wa = WhatsAppService::enviar($request->telefono, $mensaje_wa);
                Log::info('WhatsApp usuario potencial', [
                    'telefono' => $request->telefono,
                    'estado'   => $resultado_wa['estado'],
                    'msj'      => $resultado_wa['msj'],
                    'sid'      => $resultado_wa['sid'] ?? null,
                ]);
            } catch (\Exception $e) {
                Log::warning('No se pudo enviar WhatsApp a usuario potencial: ' . $e->getMessage());
            }
        }

        return back()->with('mensaje', '¡Gracias! Pronto nos comunicaremos contigo.');
    }

    static public function validarEmail($email)
    {
        // Patrón de expresión regular para validar correos electrónicos
        $patron = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

        // Utilizar la función preg_match para verificar si el correo cumple con el patrón
        if (preg_match($patron, $email)) {
            return true; // El correo es válido
        } else {
            return false; // El correo no es válido
        }
    }


    static public function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

}
