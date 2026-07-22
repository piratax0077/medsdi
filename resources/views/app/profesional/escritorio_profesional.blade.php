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
                                <h5 class="m-b-10 font-weight-bold">Escritorio profesional</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Mi escritorio </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones superiores-->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card subir">
                            {{-- <a href="{{ route('profesional.mi_agenda') }}"> --}}
                            <div class="card-body text-center px-2" onclick="seleccionar_lugar_atencion();"
                                style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h6 class="mt-1">Mi <br>agenda</h6>
                            </div>
                            {{-- </a> --}}
                        </div>
                        <div class="card subir">
                            <a href="{{ route('profesional.pacientes') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                    <h6 class="mt-1">Mis <br>pacientes</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('profesional.configuracion') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center"
                                        src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                    <h6 class="mt-1"> Panel de <br>configuración</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('profesional.index_receta_online') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                                    <h6 class="mt-1">Receta <br>Online</h6>
                                </div>
                            </a>
                        </div>
                        @if($agenda_examen)
                        <div class="card subir">
                            <a href="{{ route('profesional.index_transcripcion_examen') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Exámenes<br>transcritos</h6>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--Tabla agenda del día y Farmacrónicos-->
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card h-100 pb-0">
                        <div class="card-header text-center bg-c-info">
                            <div class="row">
                                <div class="col-sm-4 d-inline text-left">
                                     <h6 class="text-white my-2 f-20"><i class="feather icon-calendar"></i> Mi agenda del día</h6>
                                </div>
                                <div class="col-md-4 d-inline text-right mt-1">
									<select name="lugares_atencion_agenda" id="lugares_atencion_agenda" class="form-control form-control-sm" onchange="buscar_hora_medica();">
										<option value="">Seleccione Lugar</option>
									</select>
                                </div>
                                <div class="col-sm-4 d-inline text-right mt-1">
                                    <input type="date" onChange="buscar_hora_medica();" class="form-control form-control-sm" id="buscar_horas" name="buscar_horas" value="{{ $fecha_carga }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="dt-responsive table-responsive" style="height:245px;">
                                <table id="simpletable" class="table table-striped table-bordered nowrap table-sm"
                                    style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class="align-left">Hora</th>
                                            <th class="align-left">Paciente</th>
                                            <th class="align-left">Lugar Atención</th>
                                            <!--<th class="text-center align-middle">Acción</th>-->
                                        </tr>
                                    </thead>
                                   <tbody>
                                        @foreach ($hora_dia as $hd)
                                            <tr>
                                                <td>{{ $hd->hora_inicio }}</td>
                                                <td class="bg-estado-light-amarillo">
                                                    <strong>
                                                        @if ($hd->paciente)
                                                            <span>
                                                                {{ $hd->paciente->nombres . ' ' . $hd->paciente->apellido_uno . ' ' . $hd->paciente->apellido_dos }}
                                                            </span>
                                                        @else
                                                            <span class="text-danger">
                                                                ⚠️ Paciente no encontrado (ID hora: {{ $hd->id }} - paciente_id: {{ $hd->paciente_id }})
                                                            </span>
                                                        @endif
                                                    </strong>
                                                </td>
                                                <td class="text-center align-left">
                                                    {{ $hd->lugar_atencion->nombre ?? '⚠️ Sin lugar de atención' }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="card h-100 profesional-card p-3">
                        <div class="card-body">
                            <div class="media">
                                <div class="profesional-icon mr-4">
                                    <img class="rounded-circle" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}">
                                </div>
                                <div class="media-body">

                                    <h4 class="profesional-title mb-3">
                                        Registro en Crónicos.cl
                                    </h4>

                                    <p class="profesional-text mb-0">
                                        Registre a sus pacientes y manténgalos informados sobre su patología y tratamiento.
                                    </p>

                                </div>
                            </div>
                            <div class="profesional-divider"></div>
                            <a href="http://cronicos.cl/registro.php" target="_blank" class="btn btn-block profesional-btn">
                                Registrar paciente
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--Botones-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-deck">
                        <!--<div class="card social-widget-card bg-c-info opacidad">
                            <a href="{{ route('profesional.mis_estadisticas') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-40 mb-2" src="{{ asset('images/iconos/estadisticas.svg') }}">
                                    <h5 class="my-auto text-white">Mis Estadísticas</h5>
                                </div>
                            </a>
                        </div>-->
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                             <a href="https://www.cronicos.cl/" target="_blank" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-40 mb-2" src="{{ asset('images/iconos/cronicos.svg') }}">
                                    <h5 class="my-auto text-white">Portal Crónicos</h5>
                                </div>
                            </a>
                        </div>
                        @if($director_medico)
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ ROUTE('adm_cm.adm_medico') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/otros_servicios.svg') }}">
                                    <h5 class="my-auto text-white">Direccion medica</h5>
                                </div>
                            </a>
                        </div>
                        @endif
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ ROUTE('profesional.reportes') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/grafico.png') }}">
                                    <h5 class="my-auto text-white">Reportes y estadísticas</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ route('profesional.flujo_caja') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/flujo_caja_3.svg') }}">
                                    <h5 class="my-auto text-white">Flujo de Caja</h5>
                                </div>
                            </a>
                        </div>
						<div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ route('app.descarga') }}" class="btn" type="button" target="_blank">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/lock.svg') }}">
                                    <h5 class="my-auto text-white">Descarga la App SDIPASS</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->

    @include('app.profesional.modales.seleccionar_lugar_atencion')

@endsection
