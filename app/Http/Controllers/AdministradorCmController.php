<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\AsistenteTipo;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\ContratoDependiente;
use App\Models\Direccion;
use App\Models\Instituciones;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\Servicios;
use App\Models\TipoAdministrador;
use App\Models\TipoInstitucion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministradorCmController extends Controller
{
    public function index(){
        return view('app.adm_cm.home');
    }

    public function centroMedico(){
        return view('app.adm_cm.home');
    }

    public function adm_medico(){
        return view('app.adm_cm.adm_medico');
    }
	public function escritorio_asist_adm(){
        return view('app.asistente_adm_cm.escritorio_asist_adm');
    }

    public function asistente_adm_pedidos(){
        return view('app.asistente_adm_cm.asistente_adm_pedidos');
    }

    public function configuracion()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
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

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }


        /** CONVENIOS */
        /** cargar convenios */

        /** CARGA TIPO DE CONTRATO (TIPO DE ASISTENTE, INSTITUCION, ADMINISTRADOR) */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        // $lista_tipo_institucion = TipoInstitucion::select('id', 'nombre',)->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        // foreach ($lista_tipo_institucion as $key => $value) {
        //     array_push($lista_tipo_contrato,array(
        //         'id' => $value->id,
        //         'nombre' => strtoupper($value->nombre),
        //     ));
        // }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }

        // var_dump((object)$lista_tipo_contrato);

        return view('app.adm_cm.configuracion')->with([
            'tipo_institucion' => $tipo_institucion,
            'institucion' => $institucion,
            'responsable' => $responsable,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'personal' => $personal,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,

        ]);
    }

    public function editarDatosPerfil(Request $request)
    {
        $datos = array();


        $id_institucion = $request->id_institucion;
        $tipo_institucion = $request->tipo_institucion;
        $nombre = '';
        $razon_social = '';
        $rut = '';
        $certificado_supersalud = '';
        $id_direccion = '';
        $logo = '';
        $telefono = '';
        $whatsapp = '';
        $sucursales = '';
        $horario_atencion = '';
        $id_usuario = '';
        $email = '';
        $rut_responsable = '';
        $id_responsable = '';
        $nombre_responsable = '';
        $id_servicio = '';
        $id_tipo_institucion = '';
        $sitio_web = '';
        $region = '';
        $direccion = '';
        $numero_dir = '';

        if(!empty($request->nombre))
            $nombre = $request->nombre;
        if(!empty($request->razon_social))
            $razon_social = $request->razon_social;
        if(!empty($request->rut))
            $rut = $request->rut;
        if(!empty($request->certificado_supersalud))
            $certificado_supersalud = $request->certificado_supersalud;
        // if(!empty($request->id_direccion))
        //     $id_direccion = $request->id_direccion;
        if(!empty($request->logo))
            $logo = $request->logo;
        if(!empty($request->telefono))
            $telefono = $request->telefono;
        if(!empty($request->whatsapp))
            $whatsapp = $request->whatsapp;
        if(isset($request->sucursales) && ($request->sucursales == 1 || $request->sucursales == 0))
            $sucursales = $request->sucursales;
        if(!empty($request->horario_atencion))
            $horario_atencion = $request->horario_atencion;
        if(!empty($request->id_usuario))
            $id_usuario = $request->id_usuario;
        if(!empty($request->email))
            $email = $request->email;
        if(!empty($request->rut_responsable))
            $rut_responsable = $request->rut_responsable;
        if(!empty($request->id_responsable))
            $id_responsable = $request->id_responsable;
        if(!empty($request->nombre_responsable))
            $nombre_responsable = $request->nombre_responsable;
        if(!empty($request->id_servicio))
            $id_servicio = $request->id_servicio;
        if(!empty($request->id_tipo_institucion))
            $id_tipo_institucion = $request->id_tipo_institucion;
        if(!empty($request->sitio_web))
            $sitio_web = $request->sitio_web;

        if(isset($request->region))
            $region = $request->region;
        if(isset($request->ciudad))
            $ciudad = $request->ciudad;
        if(isset($request->direccion))
            $direccion = $request->direccion;
        if(isset($request->numero_dir))
            $numero_dir = $request->numero_dir;




        if($tipo_institucion == 'institucion')
        {
            $registro = Instituciones::find($id_institucion);
            if($registro)
            {
                if(!empty($nombre))
                    $registro->nombre = $nombre;
                if(!empty($razon_social))
                    $registro->razon_social = $razon_social;
                if(!empty($rut))
                    $registro->rut = $rut;
                if(!empty($certificado_supersalud))
                    $registro->certificado_supersalud = $certificado_supersalud;
                if(!empty($id_direccion))
                    $registro->id_direccion = $id_direccion;
                if(!empty($logo))
                    $registro->logo = $logo;
                if(!empty($telefono))
                    $registro->telefono = $telefono;
                if(!empty($whatsapp))
                    $registro->whatsapp = $whatsapp;
                if($sucursales == '1' || $sucursales == '0')
                    $registro->sucursales = $sucursales;
                if(!empty($horario_atencion))
                    $registro->horario_atencion = $horario_atencion;
                if(!empty($id_usuario))
                    $registro->id_usuario = $id_usuario;
                if(!empty($email))
                    $registro->email = $email;
                if(!empty($rut_responsable))
                    $registro->rut_responsable = $rut_responsable;
                if(!empty($id_responsable))
                    $registro->id_responsable = $id_responsable;
                if(!empty($nombre_responsable))
                    $registro->nombre_responsable = $nombre_responsable;
                if(!empty($id_servicio))
                    $registro->id_servicio = $id_servicio;
                if(!empty($id_tipo_institucion))
                    $registro->id_tipo_institucion = $id_tipo_institucion;
                if(!empty($sitio_web))
                    $registro->sitio_web = $sitio_web;


                if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
                {
                    $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                    if($registro_direccion)
                    {
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'registro no actualizado';
                        }
                    }
                    else
                    {
                        $registro_direccion = new Direccion();
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'direccion registrada';
                            $registro->id_direccion = $registro_direccion->id;
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'direccion no registrada';
                        }
                    }
                }

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros modificados satifactoriamente';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'registros No modificados';
                }
            }
        }
        else if($tipo_institucion == 'servicio')
        {
            /**pendiente */
        }


        return $datos;
    }

    public function editarDatosPerfilResponsable(Request $request)
    {
        $datos = array();

        $rut = '';
        $nombres = '';
        $apellido_uno = '';
        $apellido_dos = '';
        $telefono_uno = '';
        $telefono_dos = '';
        $sexo = '';
        $email = '';
        $fecha_nac = '';
        $id_tipo_administrador = '';
        $id_premium = '';
        $id_direccion = '';
        // $id_antecedente = '';
        $id_admin = '';
        $region = '';
        $ciudad = '';
        $direccion = '';
        $numero_dir = '';

        $id_responsable = $request->id_responsable;

        if(!empty($request->rut))
            $rut = $request->rut;
        if(!empty($request->nombres))
            $nombres = $request->nombres;
        if(!empty($request->apellido_uno))
            $apellido_uno = $request->apellido_uno;
        if(!empty($request->apellido_dos))
            $apellido_dos = $request->apellido_dos;
        if(!empty($request->telefono_uno))
            $telefono_uno = $request->telefono_uno;
        if(!empty($request->telefono_dos))
            $telefono_dos = $request->telefono_dos;
        if(!empty($request->sexo))
            $sexo = $request->sexo;
        if(!empty($request->email))
            $email = $request->email;
        if(!empty($request->fecha_nac))
            $fecha_nac = $request->fecha_nac;
        if(!empty($request->id_tipo_administrador))
            $id_tipo_administrador = $request->id_tipo_administrador;
        if(!empty($request->id_premium))
            $id_premium = $request->id_premium;
        if(!empty($request->id_direccion))
            $id_direccion = $request->id_direccion;
        // if(!empty($request->id_antecedente))
        //     $id_antecedente = $request->id_antecedente;
        // if(!empty($request->id_admin))
            $id_admin = $request->id_admin;


        if(isset($request->region))
            $region = $request->region;
        if(isset($request->ciudad))
            $ciudad = $request->ciudad;
        if(isset($request->direccion))
            $direccion = $request->direccion;
        if(isset($request->numero_dir))
            $numero_dir = $request->numero_dir;


        $registro = AdminInstServ::find($id_responsable);
        if($registro)
        {
            if(!empty($rut))
                $registro->rut = $rut;
            if(!empty($nombres))
                $registro->nombres = $nombres;
            if(!empty($apellido_uno))
                $registro->apellido_uno = $apellido_uno;
            if(!empty($apellido_dos))
                $registro->apellido_dos = $apellido_dos;
            if(!empty($telefono_uno))
                $registro->telefono_uno = $telefono_uno;
            if(!empty($telefono_dos))
                $registro->telefono_dos = $telefono_dos;
            if(!empty($sexo))
                $registro->sexo = $sexo;
            if(!empty($email))
                $registro->email = $email;
            if(!empty($fecha_nac))
                $registro->fecha_nac = $fecha_nac;
            if(!empty($id_tipo_administrador))
                $registro->id_tipo_administrador = $id_tipo_administrador;
            if(!empty($id_premium))
                $registro->id_premium = $id_premium;
            if(!empty($id_direccion))
                $registro->id_direccion = $id_direccion;
            if(!empty($id_admin))
                $registro->id_admin = $id_admin;


            if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
            {
                $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                if($registro_direccion)
                {
                    $registro_direccion->direccion = $direccion;
                    $registro_direccion->numero_dir = $numero_dir;
                    $registro_direccion->id_ciudad = $ciudad;
                    if($registro_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'registro no actualizado';
                    }
                }
                else
                {
                    $registro_direccion = new Direccion();
                    $registro_direccion->direccion = $direccion;
                    $registro_direccion->numero_dir = $numero_dir;
                    $registro_direccion->id_ciudad = $ciudad;
                    if($registro_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'direccion registrada';
                        $registro->id_direccion = $registro_direccion->id;
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'direccion no registrada';
                    }
                }
            }

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros modificados satifactoriamente';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros No modificados';
            }
        }

        return $datos;
    }

    // ACTUALIZAR CONTRASEÑA DEL RESPONSABLE DE LA INSTITUCION
    public function cambioContrasenaPerfilResponsable(Request $request)
    {
        $mensaje_error = '';
        $mensaje_error2 = '';
        $mensaje_success = '';
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->responsable_actual)) {
            $error['responsable_actual'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }
        else
        {
            $filtro = array();
            $filtro[] = array('id', $request->responsable_id);
            $user = User::where( $filtro )->first();


            if($user == NULL){
                $error['contrasena_actual'] = 'Contraseña actual no es valida';
                $mensaje_error2 .= 'Contraseña actual no es valida\n';
                $valido = 0;
            }
            else
            {
                $password = $request->responsable_actual;
                if (!password_verify($password, $user->password)) {
                    $error['contrasena_actual'] = 'Contraseña actual no es valida';
                    $mensaje_error2 .= 'Contraseña actual no es valida\n';
                    $valido = 0;
                }
            }

        }

        if(empty($request->responsable_nueva)) {
            $error['responsable_nueva'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(empty($request->responsable_validacion)) {
            $error['responsable_validacion'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(!empty($request->responsable_nueva)  && !empty($request->responsable_validacion))
        {
            if($request->responsable_nueva != $request->responsable_validacion)
            {
                $error['password_confirmacion'] = 'Contraseñas no son iguales';
                $mensaje_error2 .= 'Contraseñas no son iguales\n';
                $valido = 0;
            }
        }

        if($valido == 1)
        {
            $user->password = Hash::make($request->responsable_nueva);
            if($user->save())
            {
                $datos['estado'] = 1 ;
                $datos['msj'] = 'Contraseña actualizada' ;
                $mensaje_success = 'Contraseña Actualizada';
            }
            else
            {
                $datos['estado'] = 0 ;
                $datos['msj'] = 'Problemas al Actualizar la Contraseña' ;
                $mensaje_error = 'Problemas al Actualizar la Contraseña';
            }
        }
        else
        {
            $datos['estado'] = 0 ;
            $datos['msj'] = 'campos requeridos' ;
            $datos['error'] = $error;
            $mensaje_error = 'Campos requeridos.';
        }

        // return $datos;

        if(!empty($mensaje_error))
            return back()->with(['error' => $mensaje_error.'\n'.$mensaje_error2, 'titulo_error' => 'Cambio de Contraseña']);
        else
        {
            //envio de correo
            return back()->with(['mensaje' => $mensaje_success,'titulo_mensaje'=> 'Perfil Administrador De Institución']);
            // return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');
            // return back()->with( 'mensaje', 'Contraseña actualizada');

        }
    }

    public function cargaPersonalPersona(Request $request)
    {
        $datos = array();
        $nombre_tipo = $request->nombre_tipo;
        $id_tipo = $request->id_tipo;
        $id = $request->id;
        $id_lugar_atencion = $request->id_lugar_atencion;
        $datos['test1'] = strpos(strtoupper($nombre_tipo), 'ASISTENTE');
        $datos['test2'] = strpos(strtoupper($nombre_tipo), 'ADMINISTRADOR');

        if(strstr(strtoupper($nombre_tipo), 'ASISTENTE') !== FALSE)
        {
            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                    ->with(['AsistenteTipo' => function($query){
                                        $query->select('id', 'nombre', 'descripcion');
                                    }])
                                    ->where('id', $id)
                                    ->first();
            $asistente_lugar = AsistenteLugarAtencion::where('id_asistente',$id)->where('id_lugar_atencion', $id_lugar_atencion)->first();
            $asistente->asistente_lugar = $asistente_lugar;

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $asistente;
            $datos['tipo'] = 'ASISTENTE';
            $datos['request'] = $request->all();
        }
        // adm_insitucion
        else if(strpos(strtoupper($nombre_tipo), 'ADMINISTRADOR') >= 0)
        {
            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                    ->with(['TipoAdministrador' => function($query){
                                        $query->select('id', 'nombre','descripcion');
                                    }])
                                    ->where('id', $id)
                                    ->first();

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $administrador;
            $datos['tipo'] = 'ADMINISTRADOR';
            $datos['request'] = $request->all();
        }
        // contador
        else if(strpos(strtoupper($nombre_tipo), 'CONTADOR') >= 0)
        {

        }
        // profesional
        else if(strpos(strtoupper($nombre_tipo), 'PROFESIONAL') >= 0)
        {

        }

        return $datos;
    }

    public function actualizarAccesoPersonal(Request $request)
    {
        $datos = array();
        // tipo_personal
        // id_persona
        // id_personal
        // id_lugar_atencion
        // clave
        // id_edit

        if(strstr(strtoupper($request->tipo_personal), 'ASISTENTE') !== FALSE)
        {
            $registro = AsistenteLugarAtencion::where('id', $request->id_edit)->first();
            $registro->token = $request->clave;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'actualizacion exitosa';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'actualizacion fallida';
            }


        }
        else if(strpos(strtoupper($request->tipo_personal), 'ADMINISTRADOR') >= 0)
        {
            // $registro = AsistenteLugarAtencion::where('id', $request->id_edit)->first();
            // $registro->token = $request->clave;

            // if($registro->save())
            // {
            //     $datos['estado'] = 1;
            //     $datos['msj'] = 'actualizacion exitosa';
            // }
            $datos['estado'] = 0;
                $datos['msj'] = 'actualizacion fallida';
        }
        // contador
        else if(strpos(strtoupper($request->tipo_personal), 'CONTADOR') >= 0)
        {

        }
        // profesional
        else if(strpos(strtoupper($request->tipo_personal), 'PROFESIONAL') >= 0)
        {

        }

        return $datos;
    }

    public function estadisticas(){
        return view('app.adm_cm.estadisticas');
    }
    public function perfil(){
        return view('app.adm_cm.perfil_cm');
    }

    public function laboratorio(){
        return view('app.adm_cm.laboratorio');
    }
    public function laboratorio_agregar(){
        return view('app.adm_cm.laboratorio_agregar');
    }
    public function examenes(){
        return view('app.adm_cm.examenes');
    }
	public function vacunatorio_instalaciones(){
        return view('app.adm_cm.vacunatorio_instalaciones');
    }
	public function vacunatorio_pedidos(){
        return view('app.adm_cm.vacunatorio_pedidos');
    }
	public function vacunatorio_personal(){
        return view('app.adm_cm.vacunatorio_personal');
    }
	public function vacunatorio_felicitreclamos(){
        return view('app.adm_cm.vacunatorio_felicitreclamos');
    }
    public function sucursales_cm(){
        return view('app.adm_cm.sucursales_cm');
    }
    public function procedimientos(){
        return view('app.adm_cm.procedimientos');
    }
	public function at_profesionales(){
        return view('app.adm_cm.at_profesionales');
    }
    public function profesionales()
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

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();
            if($profesionales)
            {

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        return view('app.adm_cm.profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
        ]);
    }

	public function liquidacion_profesionales(){
        return view('app.adm_cm.liquidacion_profesionales');
    }

    public function asistente_adm_liquidacion_profesionales(){
        return view('app.asistente_adm_cm.liquidacion_profesionales');
    }

    public function personal()
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

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

        }
        /** FIN CARGA DE PROFESIONALES */

        /** LISTA CONTRATO */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }
        /** FIN LISTA CONTRATO */

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();


        return view('app.adm_cm.personal')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_asistente' => $lista_asistente,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ]);;
    }


	public function asistente_adm_buscar_pacientes()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',strtoupper($asistente_tipo->nombre));
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $url = 'app.asistente_adm_cm.buscar_paciente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
        );

        return view($url, $array_data);
    }
    public function administracion_cm(){
        return view('app.adm_cm.administracion_cm');
    }

    public function insumos(){
        return view('app.adm_cm.insumos');
    }
    public function proveedores(){
        return view('app.adm_cm.proveedores');
    }
    public function asistente_adm_gastos(){
        return view('app.adm_cm.gastos');
    }
    public function pagos(){
        return view('app.adm_cm.pagos');
    }
    public function departamentos(){
        return view('app.adm_cm.departamentos_servicios');
    }
	public function vacunatorio(){
        return view('app.adm_cm.vacunatorio');
    }

	public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }

    public function asociarProfesionalExistente(Request $request)
    {
        $datos = array();

        $profesionales = Profesional::where('id', $request->id_profesional)->first();
        if($profesionales)
        {
            // id_lugar_atencion
            // id_profesional
            // creo invitacion
            $rut = $profesionales->rut;
            $nombre = $profesionales->nombre;
            $apellido_uno = $profesionales->apellido_uno;
            $apellido_dos = $profesionales->apellido_dos;
            $telefono = $profesionales->telefono;
            $email = $profesionales->email;
            $id_user_solicitud = Auth::user()->id;
            $id_user_invitado = $profesionales->id_usuario;
            $resultado = InvitacionController::registroInvtacionProfesional($request->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_user_solicitud, $id_user_invitado);
            $datos = $resultado;
            $datos['estado'] = 1;
            $datos['msj'] = 'profesional invitado';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'profesional no encontrado';
        }

        return $datos;
    }

    public function asociarProfesionalNuevo(Request $request)
    {
        $datos = array();

        $nombre = $request->nombre;
        $apellido_uno = $request->apellido_uno;
        $apellido_dos = $request->apellido_dos;
        $telefono = $request->telefono;
        $email = $request->email;
        $id_user_solicitud = Auth::user()->id;

        $resultado = InvitacionController::registroInvtacionProfesional($request->id_lugar_atencion, '', $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_user_solicitud, '');
        $datos = $resultado;
        return $datos;
    }

    public function buscar_profesional(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id', $request->id)->first();

        if($profesional)
        {
            $direccion_text = 'No Informada';
            if($profesional->id_direccion != '' || $profesional->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $profesional->id_direccion)->first();
                if($direccion)
                    $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
            }
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $profesional;
            $datos['direccion'] = $direccion_text;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;
    }

    public function buscar_asistente(Request $request)
    {
        $datos = array();

        $asistente = Asistente::where('id', $request->id)->first();

        if($asistente)
        {
            $direccion_text = 'No Informada';
            if($asistente->id_direccion != '' || $asistente->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $asistente->id_direccion)->first();
                if($direccion)
                    $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
            }
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $asistente;
            $datos['direccion'] = $direccion_text;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;
    }


    public function buscar_paciente_rut(Request $request)
    {
        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        // $filtro = array();
        // $filtro[] = array('rut',$rut);
        // $filtro[] = array('nombres','like','%'.$nombre.'%');

        // $filtro_2 = array();
        // $filtro_2[] = array('apellido_uno','like','%'.$apellido.'%');
        // $filtro_2[] = array('apellido_dos','like','%'.$apellido.'%');
        // 1=1
        // rut='26340063-1' and (nombres like '%'.$nombre.'%'; or apellido_uno like '%daviladasda%' or apellido_dos like '%fdavila%')

        $sql  = '';
        $sql_val = array();
        if(!empty($rut))
        {
            $sql .= " rut=? ";
            $sql_val[] = $rut;
        }
        if(!empty($nombre))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " nombres like ? ";
            $sql_val[] = '%'.$nombre.'%';
        }
        if(!empty($apellido))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " apellido_uno like ?  OR  apellido_dos like ? ";
            $sql_val[] = '%'.$apellido.'%';
            $sql_val[] = '%'.$apellido.'%';
        }

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($id_lugar_atencion){
                                $query->select('id','id_lugar_atencion','id_paciente')->where('id_lugar_atencion',$id_lugar_atencion);
                            }])
                            ->with(['Prevision' =>function($query){
                                $query->select('id','nombre');
                            }])
                            ->with(['Direccion' =>function($query){
                                $query->select('id','direccion','numero_dir','id_ciudad')
                                            ->with(['Ciudad' => function($query2){
                                                $query2->select('id','nombre','id_region')
                                                    // ->Region()
                                                    ;
                                            }]);
                            }])
                            /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                            ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
                            ->get();
        if($registro)
        {
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

    public function asistente_adm_mis_profesionales()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $profesionales = $lugares_atencion->profesionales()->get();


        $url = 'app.asistente_adm_cm.mis_profesionales'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
            'profesionales' => $profesionales,
        );

        return view($url, $array_data);
    }

    public function asistente_adm_cargar_contrato(Request $request)
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->where('id_asistente_tipo',3)->first();
        if($asistente)
        {
            $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

            $filtro = array();
            $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
            $filtro[] = array('estado',2) ;
            $contrato = ContratoDependiente::where($filtro)->first();
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $id_institucion = $contrato->id_institucion;

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos_nuevos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',1)
                                            // ->persona()
                                            ->get();
            $contratos_activos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',2)
                                            ->get();
            $contratos_vencidos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',3)
                                            ->get();
            $contratos_finalizados = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',4)
                                            ->get();

            /** PROFESIONALES */
            $profesionales = array();

            $url = 'app.asistente_adm_cm.contratos';
            $array_data = array(
                'asistente' => $asistente,
                'contratos_nuevos' => $contratos_nuevos,
                'contratos_activos' => $contratos_activos,
                'contratos_vencidos' => $contratos_vencidos,
                'contratos_finalizados' => $contratos_finalizados,
                'profesionales' => $profesionales,
            );

            return view($url, $array_data);
        }
        else
        {
            return back()->with('error','Asistente sin permiso de visualizar Contratos');
        }
    }

    public function asistente_adm_detalle_contrato(Request $request)
    {
        $datos = array();

        if(!empty($request->id))
        {
            $registros = ContratoDependiente::where('id', $request->id)->first();
            if($registros)
            {
                if(strstr(strtoupper($registros->tipo_empleado), 'ASISTENTE') !== FALSE)
                {
                    $registro = Asistente::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );

                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'ADMINISTRADOR') >= 0)
                {
                    $registro = AdminInstServ::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );
                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'CONTADOR') >= 0)
                {

                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'PROFESIONAL') >= 0)
                {
                    $registro = Profesional::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );
                }

                $registros->persona = $registro;

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registro'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
            }
        }
        else
        {
            $datos['estado']=0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = array('id'=>'Campo requerido');
        }

        return $datos;
    }


}
