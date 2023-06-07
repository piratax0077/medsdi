@extends('template.adm_cm.template')
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
                                <h5 class=" font-weight-bold">Administrador general centro médico</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="escritorio.php">Mi escritorio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card subir py-auto bg-info">
                        <div class="card-body text-center">
                            <h5 class=" mb-0 text-white f-20">Centro médico {{ mb_strtoupper($institucion->nombre) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.configuracion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h5 class="mt-1 mb-0">Configurar mi Centro</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.adm_medico') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/perfil_admin.svg') }}">
                                <h5 class="mt-1 mb-0">Administración médica</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.administracion_cm') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/adm_comercial.png') }}">
                                <h5 class="mt-1 mb-0">Administración comercial</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/profesional.svg') }}">
                                <h5 class="mt-1 mb-0">Profesionales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.pacientes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h5 class="mt-1 mb-0">Pacientes</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.personal') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center"  src="{{ asset('images/iconos/personal.png') }}">
                                <h5 class="mt-1 mb-0">Personal del Centro</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card subir py-auto bg-warning">
                        <div class="card-body text-center" style="cursor:pointer">
                            <h5 class=" mb-0 text-white f-20">Areas del centro médico</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                      {{--  <a href="{{ ROUTE('adm_cm.laboratorio') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-70 text-center" src="{{ asset('images/iconos/laboratorio.svg') }}">
                                <h5 class="mt-1 mb-0">Laboratorio</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                      {{-- <a href="{{ ROUTE('adm_cm.laboratorio') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-70 text-center" src="{{ asset('images/iconos/imagenologia.svg') }}">
                                <h5 class="mt-1 mb-0">Imagenología</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                       {{-- <a href="{{ ROUTE('adm_cm.vacunatorio') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-70 text-center" src="{{ asset('images/iconos/vacunatorio.svg') }}">
                                <h5 class="mt-1 mb-0">Vacunatorio</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card subir py-auto" onclick="en_construccion()";>
						<a href="#">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-70 text-center" src="{{ asset('images/iconos/mis_asistentes.svg') }}">
								<h5 class="mt-1">Contratar Asistentes</h5>
							</div>
						</a>
					</div>
				</div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
    @include('app.adm_cm.modales.en_construccion')
@endsection
