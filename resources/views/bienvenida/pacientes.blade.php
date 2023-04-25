@extends('template.bienvenida.profesionales')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center pb-2">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="text-white d-inline f-16 mt-1"><strong>SDI le da la Bienvenida paciente nuevo</strong></h5>
                            <p class="font-italic mt-0 mb-0 text-white">
                                @php
                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    $fecha = \Carbon\Carbon::parse(now());
                                    $mes = $meses[($fecha->format('n')) - 1];
                                    $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                @endphp
                                {{ $fecha }}
                            </p>

                        </div>
                    </div>
                    <div class="col-md-6">
                        {{--  <div class="page-header-title">
                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
            <div class="col-md-12 py-0 px-2 shadow-none">
                <div class="row mx-0">
                    <div class="col-md-12">
                    </div>
                </div>
                <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mt-3 mb-0">
                                <h6 class="f-16 text-c-blue"> <div class="page-header-title">
                                    <h5 class="m-b-10 font-weight-bold">Escritorio Configuración Usuario Paciente Nuevo</h5>
                                </div></h6>
                                <hr>
                            </div>
                        </div>
                        <!--Botones superiores-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-deck">
                                    <div class="card subir">
                                        <a onclick="b_dt_medicos();" class="btn" type="button">
                                        {{--<a href="{{ ROUTE('paciente.receta') }}">--}}
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                            <h5 class="mt-1"> Paso 1</h5><br> <h6>Configurar Mis Datos Médicos </h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card subir">
                                        {{-- <a href="{{ ROUTE('paciente.receta') }}">--}}
                                            <a onclick="b_dependientes();" class="btn" type="button">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/reloj_1.svg') }}">
                                                <h5 class="mt-1"> Paso 2</h5><br> <h6>Configurar Mis Dependientes </h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card subir">
                                        {{-- <a href="{{ ROUTE('paciente.receta') }}">--}}
                                            <a onclick="b_enf_cronicas();" class="btn" type="button">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/usuario_asistente.svg') }}">
                                                <h5 class="mt-1"> Paso 3</h5><br> <h6>Configurar mis Patologías Crónicas </h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card subir">
                                        {{-- <a href="{{ ROUTE('paciente.receta') }}">--}}
                                            <a onclick="b_medicamentos();" class="btn" type="button">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/usuario_profesional.svg') }}">
                                                <h5 class="mt-1"> Paso 4</h5><br> <h6> Configurar Mis Medicamentos de Uso Crónico</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card subir">
                                        {{-- <a href="{{ ROUTE('paciente.receta') }}">--}}
                                            <a onclick="b_cont_emerg();" class="btn" type="button">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/usuario_profesional.svg') }}">
                                                <h5 class="mt-1"> Paso 5</h5><br> <h6>Configure sus Contactos de Emergencia</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="card social-widget-card bg-c-info opacidad">
                                        <a href="#" class="btn" type="button">
                                            <div class="card-body">
                                                <div class="row">
                                                    <h5 class="my-auto text-white ml-3 text-left">Baje La Aplicación SDI-PASS</h5>
                                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card social-widget-card bg-c-info opacidad">
                                        <a onclick=" b_perf_util();" class="btn" type="button">
                                            <div class="card-body">
                                                <div class="row my-auto">
                                                    <h5 class="my-auto text-white text-left">SDI le Invita Disfrutar de sus diferentes aplicaciones y utilidades</h5>
                                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm mb-3 " onclick="b_instrucciones();" >Acceda a su el instructivo de uso</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal datos medicos-->
                <div id="datos_medicos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="datos_medicos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Agregar mis datos médicos</h5>

                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="form_datos_medicos">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group fill">
                                                <label class="floating-label">Alérgias</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Cirugías</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Enfermedades Crónicas</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">grupo sanguineo</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">donante de organos</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">acepta transfusiones de Sangre</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Otros</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" id="cerrar_modal_horario">Cancelar</button>
                                <button type="button" class="btn btn-info btn-sm" id="cerrar_modal_horario1">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mis_dependientes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mis_dependientes">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar
                                    asistentes</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="form_datos_medicos">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group fill">
                                                <label class="floating-label">Alérgias</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Cirugías</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Enfermedades Crónicas.</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h5 class="floating-label">Medicamentos de uso crónico</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento uno de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento dos de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento tres de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento uno de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer pt-2">
                                <button type="button" class="btn btn-danger" id="cerrar_editar_asistentes1">Cancelar</button>
                                <button type="button" id="cerrar_editar_asistentes2" class="btn btn-info">Guardar
                                    Cambios</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal enfermedades cronicas-->
                <div id="b_enf_cronicas" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="b_enf_cronicas" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white text-center" id="editar_lugar_atencion_titulo">Configurar mis enfermedades crónicas</h5>

                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span×</span></button>
                            </div>
                            <div class="modal-body">
                                <form id="form_datos_medicos">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group fill">
                                                <label class="floating-label">Enfermedad uno</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Enfermedad dos</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Enfermedad tres</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Enfermedad cuatro</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" id="cerrar_modal_horario">Cancelar</button>
                                <button type="button" class="btn btn-info btn-sm" id="cerrar_modal_horario1">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal medicamentos uso cronico-->
                <div id="modal_medicamentos" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="modal_medicamentos" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content" >
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white mt-1">Medicamentos de uso crónico</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form id="form_datos_medicos">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group fill">
                                                <label class="floating-label">Alérgias</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Cirugías</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label">Enfermedades Crónicas.</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h5 class="floating-label">Medicamentos de uso crónico</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento uno de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento dos de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento tres de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Medicamento uno de uso crónico</label>
                                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">cantidad por mes</label>
                                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="button" onclick="editar_lugar_atencion();" class="btn btn-info">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal mostrar utilidades y secciones-->
                <div id="modal_mostrar_utilidades" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="modal_mostrar_utilidades" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content" >
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white mt-1">FONEMA P</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link-wizard active" id="unop_tab" data-toggle="pill" href="#unop" role="tab" aria-controls="pills-home" aria-selected="true">Pato</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="dosp_tab" data-toggle="pill" href="#dosp" role="tab" aria-controls="pills-home" aria-selected="true">Payaso</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="tresp_tab" data-toggle="pill" href="#tresp" role="tab" aria-controls="pills-home" aria-selected="true">Pelota</a>
                                            </li>
                                                <li class="nav-item">
                                                <a class="nav-link-wizard " id="cuatrop_tab" data-toggle="pill" href="#cuatrop" role="tab" aria-controls="pills-home" aria-selected="true">Pera</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="cincop_tab" data-toggle="pill" href="#cincop" role="tab" aria-controls="pills-home" aria-selected="true">Palmera</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="seisp_tab" data-toggle="pill" href="#seisp" role="tab" aria-controls="pills-home" aria-selected="true">Cepillo</a>
                                            </li>
                                                <li class="nav-item">
                                                <a class="nav-link-wizard " id="sietep_tab" data-toggle="pill" href="#sietep" role="tab" aria-controls="pills-home" aria-selected="true">Chupete</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="ochop_tab" data-toggle="pill" href="#ochop" role="tab" aria-controls="pills-home" aria-selected="true">Lapiz</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="nuevep_tab" data-toggle="pill" href="#nuevep" role="tab" aria-controls="pills-home" aria-selected="true">Zapato</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" id="diezp_tab" data-toggle="pill" href="#diezp" role="tab" aria-controls="pills-home" aria-selected="true">Zapallo</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content" id="pills-tablas_examenes">
                                            <!--TAB 1-->
                                            <div class="tab-pane fade show active" id="unop" role="tabpanel" aria-labelledby="unop_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill"  style="text-center">
                                                            <img src="{{ asset('images\fono\fonemap\pato.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 2-->
                                            <div class="tab-pane fade show" id="dosp" role="tabpanel" aria-labelledby="dosp_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\payaso.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 3-->
                                            <div class="tab-pane fade show" id="tresp" role="tabpanel" aria-labelledby="tresp_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\pelota.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 4-->
                                            <div class="tab-pane fade show" id="cuatrop" role="tabpanel" aria-labelledby="cuatrop_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\pera.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 5-->
                                            <div class="tab-pane fade show" id="cincop" role="tabpanel" aria-labelledby="cincop_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\palmera.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 6-->
                                            <div class="tab-pane fade show" id="seisp" role="tabpanel" aria-labelledby="seisp_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\cepillo.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 7-->
                                            <div class="tab-pane fade show" id="sietep" role="tabpanel" aria-labelledby="sietep_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\chupete.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 8-->
                                            <div class="tab-pane fade show" id="ochop" role="tabpanel" aria-labelledby="ochop_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\lapiz.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 9-->
                                            <div class="tab-pane fade show" id="nuevep" role="tabpanel" aria-labelledby="nuevep_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\zapato.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TAB 10-->
                                            <div class="tab-pane fade show" id="diezp" role="tabpanel" aria-labelledby="diezp_tab">
                                                <div class="form-row" >
                                                    <div class="col-sm-12 mt-2" >
                                                        <div class="form-group fill">
                                                            <img src="{{ asset('images\fono\fonemap\zapallo.png') }}" style="width:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-3 mt-2">
                                                    <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                                    <input type="text" class="form-control form-control-sm" name="fonema_p_com" id="fonema_p_com">
                                                </div>
                                                <div class="col-sm-9 mt-2">
                                                    <label id="" name="" class="floating-label-activo-sm">Objetivos y Logros</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fon_p_obj y logros" id="fon_p_obj y logros"></textarea>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal CONTACTOS DE EMERGENCIA-->
                <div id="agregar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_contacto_emergencia" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white text-center">Agregar contacto de emergencia</h5>
                                <button type="button" class="close text-white" onclick="cerrar_agregar_contacto_emergencia();" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    @csrf
                                    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <h6 class="text-c-blue ml-1 mb-3">Ingrese los datos de su contacto de emergencia</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Rut</label>
                                                <input type="text" class="form-control" name="rut_nuevo_contacto" id="rut_nuevo_contacto">
                                                <span id="mensaje_asistente"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-info" onclick="buscar_contacto()" type="button" id="">Buscar</button>
                                        </div>
                                    </div>
                                    <div class="row" id="form_contacto_nuevo" name="form_contacto_nuevo" style="display: none">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Nombres</label>
                                                <input type="text" class="form-control" name="nombres_contacto_emergencia" id="nombres_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Primer Apellido</label>
                                                <input type="text" class="form-control" name="apellido_uno_contacto_emergencia" id="apellido_uno_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Segundo Apellido</label>
                                                <input type="text" class="form-control" name="apellido_dos_contacto_emergencia" id="apellido_dos_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Fecha Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nac_contacto_emergencia" id="fecha_nac_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Direcci&oacute;n</label>
                                                <input type="address" class="form-control" name="direccion_contacto_emergencia" id="direccion_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo">N&uacute;mero</label>
                                                <input type="address" class="form-control" name="numero_dir_contacto_emergencia" id="numero_dir_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Regi&oacute;n</label>
                                                <select id="region_agregar" onchange="buscar_ciudades();" name="region_agregar" class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    @if (isset($regiones))
                                                        @foreach ($regiones as $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Comuna</label>
                                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                                    <option value="0">Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Correo Electrónico</label>
                                                <input type="email" class="form-control" name="email_contacto_emergencia" id="email_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Teléfono</label>
                                                <input type="tel" class="form-control" name="telefono_contacto_emergencia" id="telefono_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Parentezco</label>
                                                <select id="parentezco_contacto_emergencia" name="parentezco_contacto_emergencia" class="form-control">
                                                    <option value="0">Seleccione una opción</option>
                                                    <option value="Pareja">Pareja</option>
                                                    <option value="Padre">Padre</option>
                                                    <option value="Madre">Madre</option>
                                                    <option value="Hermano/a">Hermano/a</option>
                                                    <option value="Abuelo/a">Abuelo/a</option>
                                                    <option value="Tío/a">Tío/a</option>
                                                    <option value="Primo/a">Primo/a</option>
                                                    <option value="Amigo/a">Amigo/a</option>
                                                    <option value="Otro">Otro</option> el parentezco-->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo">Prioridad</label>
                                                <select id="prioridad_contacto_emergencia" name="prioridad_contacto_emergencia" class="form-control">
                                                    <option>Seleccione una opción</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="cerrar_agregar_contacto_emergencia();" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button" onclick="registrar_contacto_emergencia();" class="btn btn-info">Guardar Contacto</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Modal INSTRUCTIVO-->
                <div id="b_modal_instructivo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="b_modal_instructivo" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Informativo</h5>

                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="form_datos_medicos">
                                    <div class="row">
                                        <div class="form-row" >
                                            <div class="col-sm-12 mt-2" >
                                                <div class="form-group fill"  style="text-center">
                                                    <img src="{{ asset('images\fono\fonemap\instrucciones.png') }}" style="width:100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" id="cerrar_modal_horario">Cancelar</button>
                                <button type="button" class="btn btn-info btn-sm" id="cerrar_modal_horario1">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            function b_dt_medicos() {
                $('#datos_medicos').modal('show');
            }
            function b_medicamentos() {
                $('#modal_medicamentos').modal('show');
            }
            function b_enf_cronicas() {
                $('#b_enf_cronicas').modal('show');
            }
            function b_cont_emerg() {
                $('#agregar_contacto_emergencia').modal('show');
            }
            function b_perf_util() {
                $('#modal_mostrar_utilidades').modal('show');
            }
            function b_dependientes() {
                $('#mis_dependientes').modal('show');
            }
            function b_instrucciones() {
                $('#b_modal_instructivo').modal('show');
            }
        </script>
@endsection

