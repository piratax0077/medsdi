@extends('template.laboratorio.adm_general.template')
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
                        <h5 class="m-b-10 font-weight-bold">Escritorio Administrador Laboratorio</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_admin_general_laboratorio.php">Mi Escritorio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones superiores-->
        <div class="row">
            <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.admin_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/perfil_admin.svg') }}">

                                <h5 class="mt-2">Mis administradores</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.sucursales_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/laboratorio_1.svg') }}">
                                <h5 class="mt-2">Mis sucursales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.profesionales_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/profesional_2.svg') }}">
                                <h5 class="mt-2">Mis profesionales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.asistentes_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/mis_asistentes.svg') }}">
                                <h5 class="mt-2">Mis asistentes</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.lista_exam') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Mis exámenes</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.administracion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/perfiles.svg') }}">
                                <h5 class="mt-2">Administración</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                       <a href="{{ ROUTE('app.laboratorio.adm_general.perfil_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/perfiles.svg') }}">
                                <h5 class="mt-2">Perfil laboratorio</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                       <a href="{{ ROUTE('app.laboratorio.adm_general.perfil_admin') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/perfil_admin.svg') }}">
                                <h5 class="mt-2">Mi Perfil</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.suscripcion_pago_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/suscripcion_pago.svg') }}">
                                <h5 class="mt-2">Suscripciones y pagos</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo--> 

@endsection