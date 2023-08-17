@extends('template.asistente.template')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Asistente</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('asistente.home') }}">Mi Escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Row Botones-->
        <div class="row m-b-30">
            <div class="col-md-12">
                <div class="card-deck">
                    <!--Cierre de Card-->
                    <div class="card  subir py-auto">
                        <a href="{{ ROUTE('asistente.buscar_paciente') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center mt-1 mb-2" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h5 class="mt-1 mb-0">Buscar Pacientes</h5>
                            </div>
                        </a>
                    </div>
					<!--<div class="card  subir py-auto">
                        <a href="{{ ROUTE('asistente.reservar_hora') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/profesional_2.svg') }}">
                                <h5 class="mt-1 mb-0">Reservar Hora Médica</h5>
                            </div>
                        </a>
                    </div>
					-->
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('asistente.agenda_por_profesional') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Agenda de Mis Profesionales</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('asistente.flujo_caja') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0">Flujo de Caja</h5>
                            </div>
                        </a>
                    </div>
					<!--
                    <div class="card py-auto subir">
                        <!--<a href="{{ ROUTE('asistente.venta_productos') }}">
                        <a href="{{ ROUTE('asistente.registro_paciente') }}" class="btn" type="button">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/otros_servicios_1.svg') }}">
                                <h5 class="mt-1 mb-0"> Venta de Productos</h5>
                            </div>
                        </a>
                    </div>
					-->
                </div>
            </div>
        </div>
        <!--CIERRE: Row Botones -->
        <!--Tabla agenda del día y flujo de caja-->
        <div class="row m-b-30">
            <div class="col-md-8">
                <div class="card h-100 pb-0">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 d-inline text-center">
                                <h5 class="text-white my-2" style="font-size: 1.4rem;">Información de mis profesionales</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Profesional</th>
										<th class="text-center align-middle">Ver Información</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $asistente->Profesionales()->get() as $profesional)
                                        <tr>
                                            <td class="text-center align-middle">
                                                <span><strong>{{ $profesional->nombre.' '. $profesional->apellido_uno.' '.$profesional->apellido_dos}}a</strong></span><br>
                                                <span>
                                                    {{ $profesional->TipoEspecialidad()->first()->nombre }} </br>
                                                    @if($profesional->SubTipoEspecialidad()->first())
                                                        {{ $profesional->SubTipoEspecialidad()->first()->nombre }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="info_profesional({{ $profesional->id }});"><i class="fa fa-plus"></i> Ver Información</button>
                                            </td>
                                        </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card subir text-center h-100">
					<a href="http://www.cronicos.cl/registro.php" target="_blank">
                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}" alt="Inscripciones" class="btn  btn-arrastre" type="button">
                    <!--<a href="{{ ROUTE('asistente.registro_paciente') }}" class="btn" type="button">-->

					<div class="card-body">
						<h4 class="card-title f-20 pt-3">Inscripciones</h4>
						<p class="card-text">Registre pacientes a Farmacrónicos</p>
					</div>
					</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection

@section('modals')
    @include('app.asistente.modales.modal_profesional_informacion')
    @include('general.asistentes.modal_consulta_agenda')
@endsection
