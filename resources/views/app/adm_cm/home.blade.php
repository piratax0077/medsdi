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
                                <h5 class=" font-weight-bold">Administrador general Centro Médico</h5>
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
                <div class="col-md-12">
                    <div class="card subir py-auto bg-info">
                        <div class="card-body text-center">
                             <h5 class=" mb-0 text-white f-24">Centro Médico {{ mb_strtoupper($institucion->nombre) }}</h5>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.configuracion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h6 class="mt-2 mb-0">Configurar mi CM</h6>
                            </div>
                        </a>
                    </div>
                </div>
                {{--  <div class="col">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.adm_medico') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/adm_medica.png') }}">
                                <h6 class="mt-2 mb-0">Administración médica</h6>
                            </div>
                        </a>
                    </div>
                </div>  --}}
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.area_contratos_nuevos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/cotizacion.svg') }}">
                                <h6 class="mt-2 mb-0">Contratos e incorporaciones</h6>
                            </div>
                        </a>
                    </div>
                </div>
                @if($institucion->id_tipo_institucion != 8)
                <div class="col">

                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.area_comercial') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/adm_comercial.png') }}">
                                <h6 class="mt-2 mb-0">Administración comercial</h6>
                            </div>
                        </a>
                    </div>

                </div>
                @endif
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.profesionales_institucion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                                <h6 class="mt-2 mb-0">Profesionales del CM</h6>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col">
                     <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.mis_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-45 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h6 class="mt-2 mb-0">Info profesionales del CM</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.pacientes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h6 class="mt-2 mb-0">Pacientes</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.personal') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/mis_asistentes.svg') }}">
                                <h6 class="mt-1 mb-0">Manejo de Asistentes</h6>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                        <a href="{{ ROUTE('flujo.caja.index') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center mb-1" src="{{ asset('images/iconos/caja.png') }}">
                                <h5 class="mt-1 mb-0"> Recepción de Cajas</h5>
                            </div>
                        </a>
                    </div>
                </div>

            </div>



            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card subir py-auto bg-warning">
                        <div class="card-body text-center" style="cursor:pointer">
                            <h6 class="mb-0 text-white f-20">Áreas del Centro Médico</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto">
                       <a href="{{ ROUTE('adm_cm.laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/laboratorio.svg') }}">
                                <h6 class="mt-2 mb-0">Laboratorio</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto" >
                      <a href="{{ ROUTE('adm_cm.imagenologia') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/imagenologia.png') }}">
                                <h6 class="mt-2 mb-0">Imagenología</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto" >
                      <a href="#">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/rx.svg') }}">
                                <h6 class="mt-2 mb-0">Rayos</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto" >
                       <a href="{{ ROUTE('adm_cm.vacunatorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/vacunatorio.svg') }}">
                                <h6 class="mt-2 mb-0">Enfermería</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto" >
                       <a href="{{ ROUTE('adm_cm.dental') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/dental.png') }}">
                                <h6 class="mt-2 mb-0">Dental</h6>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-12">
					<div class="card subir py-auto" onclick="en_construccion()";>
						<a href="#">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-50 text-center rounded" src="{{ asset('images/iconos/mis_asistentes.svg') }}">
								<h6 class="mt-1">Contratar asistentes en linea</h6>
							</div>
						</a>
					</div>
				</div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card subir py-auto bg-warning">
                        <div class="card-body text-center" style="cursor:pointer">
                            <h6 class="mb-0 text-white f-20">Áreas del Centro Médico</h6>
                        </div>
                    </div>
                </div>

                @php
                    // Mapeo de tipo_area a icono y ruta
                    $iconos = [
                        'Laboratorio'   => ['icon' => 'laboratorio.svg', 'route' => route('adm_cm.laboratorio')],
                        'Imagenología'  => ['icon' => 'imagenologia.png', 'route' => route('adm_cm.imagenologia')],
                        'Rayos'         => ['icon' => 'rx.svg', 'route' => '#'],
                        'Enfermería'    => ['icon' => 'vacunatorio.svg', 'route' => route('adm_cm.vacunatorio')],
                        'Dental'        => ['icon' => 'dental.png', 'route' => route('adm_cm.dental')],
                    ];
                @endphp

                @foreach($areas_cm as $area)
                    @if(isset($iconos[$area['tipo_area']]))
                        <div class="col">
                            <div class="card subir py-auto">
                                <a href="{{ $iconos[$area['tipo_area']]['route'] }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-50 text-center" src="{{ asset('images/iconos/' . $iconos[$area['tipo_area']]['icon']) }}">
                                        <h6 class="mt-2 mb-0">{{ $area['tipo_area'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="col-md-12">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                        <a href="#">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center rounded" src="{{ asset('images/iconos/mis_asistentes.svg') }}">
                                <h6 class="mt-1">Contratar asistentes en linea</h6>
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
