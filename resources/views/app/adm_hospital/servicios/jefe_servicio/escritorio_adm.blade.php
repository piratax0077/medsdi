
@extends('template.adm_cm.template')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ESCRITORIO JEFE DE SERVICIO: {{ $servicio->nombre }}</strong></h5>
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
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                                    <h5 class="mt-1 mb-0">Configuracion</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/ingreso-pac.png') }}">
                                                    <h5 class="mt-1 mb-0">Permisos y Vacaciones</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="{{ route('administrativo.mis.profesionales') }}">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                                    <h5 class="mt-1 mb-0">Profesionales</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/historico-turnos.png') }}">
                                                    <h5 class="mt-1 mb-0">Configuración Turno</h5>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/contacto-red.png') }}">
                                                    <h5 class="mt-1 mb-0">Contactos Red</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/contacto-pacientes.png') }}">
                                                    <h5 class="mt-1 mb-0">Contacto Pacientes</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/estadisticas.png') }}">
                                                    <h5 class="mt-1 mb-0">Estadisticas</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="#">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/estadisticas.png') }}">
                                                    <h5 class="mt-1 mb-0">Entregas de turno</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card subir">
                                            <a href="{{ route('servicio.salas', ['id' => $servicio->id]) }}">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center"  src="{{ asset('images/iconos_urg/ambulancia.png') }}">
                                                    <h5 class="mt-1 mb-0">Atender Pacientes</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">

            </div>
        </div>




        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")--}}


    </div>
@endsection
