@extends('template.profesional.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Panel de Configuración</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Panel de configuración</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card subir py-3">
                            <a href="{{ ROUTE('profesional.lugares_atencion') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3" src="{{ asset('images/iconos/lugar.svg') }}"
                                        alt="Mis Lugares de Atención">
                                    <h5>
                                        Mis Lugares de Atención
                                    </h5>
                                </div>
                            </a>
                        </div>
                        <div class="card subir py-3">
                            <a href="{{ route('profesional.mis_asistentes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/mis_asistentes.svg') }}" alt="Mis Asistentes">
                                    <h5>
                                        Mis Asistentes
                                    </h5>
                                </div>
                            </a>
                        </div>

                        <div class="card subir py-3">
                            <a href="{{ route('profesional.diagnosticos_cie10') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/diagnosticos_cie10.svg') }}"
                                        alt="Diagnósticos Frecuentes CIE 10">
                                    <h5>
                                        Diagnósticos Frecuentes CIE 10
                                    </h5>
                                </div>
                            </a>
                        </div>
						<div class="card subir py-3">
                            <a href="busq_secretaria.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3" 
									src="{{ asset('images/iconos/usuario_asistente.svg') }}"
									
									alt="Profesional">
                                    <h5 class="f-16">
                                       Contratar asistente Online
                                    </h5>
                                </div>
                             </a>
                        </div>

                    </div>
                </div>
            </div>
            <!--CIERRE:Botones-->
            <!--Botones-->
            <div class="row m-b-10">
                <div class="col-md-12">
                    <div class="card-deck">

                        {{--  <div class="card subir py-4">
                            <a href="{{ route('profesional.diagnosticos_frecuentes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/diagnosticos_frecuentes.svg') }}"
                                        alt="Diagnósticos Frecuentes">
                                    <h5>
                                        Diagnósticos Frecuentes
                                    </h5>
                                </div>
                            </a>
                        </div>  --}}
                        {{--  <div class="card subir py-4">
                            <a href="{{ route('profesional.examenes_frecuentes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/examenes_frecuentes.svg') }}"
                                        alt="Examenes Frecuentes">
                                    <h5>
                                        Exámenes Frecuentes
                                    </h5>
                                </div>
                            </a>
                        </div>  --}}
                        {{--  <div class="card subir py-4">
                            <a href="https://www.redmedichile.cl/admin/login.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/panel_administracion.svg') }}"
                                        alt="Panel de Administración">
                                    <h5>
                                        Panel de Administración
                                    </h5>
                                </div>
                            </a>
                        </div>  --}}


                    </div>
                </div>
            </div>
            <!--CIERRE:Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
