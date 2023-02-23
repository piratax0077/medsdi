@extends('template.paciente.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio paciente</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones superiores-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.agendar_hora') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1"> Reservar hora médica </h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.mis_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                                <h5 class="mt-1"> Mis profesionales </h5>
                            </div>
                        </a>
                    </div>
                    <!--
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.mi_ficha') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/fmu.svg') }}">
                                <h5 class="mt-1"> Mi Ficha Médica Única </h5>
                            </div>
                        </a>
                    </div>
                    -->
                    <div class="card subir">
                        <a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/fmu.svg') }}">
                                <h5 class="mt-1"> Mi Ficha Médica Única </h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.receta') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                                <h5 class="mt-1">Receta online </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE: Row Botones -->
        <!--Tabla agenda del día y atención por profesional-->
        <div class="row mt-3">
            <div class="col-md-8 mb-3">
                <div class="card h-100 pb-0">
                    <div class="card-header text-center bg-c-info">
                        <h4 class="text-white d-inline text-center f-20">Mis horas médicas del día</h4>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Acción</th>
                                        <th class="text-center align-middle">Profesional</th>
                                        <th class="text-center align-middle">Información de Atención</th>
                                        <th class="text-center align-middle">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-info btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            Nombre y Apellidos<br>
                                            Medicina General<br>
                                        </td>
                                        <td class="text-center align-middle">
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge badge-danger">Hora rechazada</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-info btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            Nombre y Apellidos<br>
                                            Medicina General<br>
                                        </td>
                                        <td class="text-center align-middle">
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge badge-warning">Hora pendiente</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-info btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            Nombre y Apellidos<br>
                                            Medicina General<br>
                                        </td>
                                        <td class="text-center align-middle">
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge badge-success">Hora aprobada</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card subir text-center h-100">
                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}"
                        alt="Flujo de caja">
                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn btn-arrastre"
                        type="button">
                        <div class="card-body">
                            <h5 style="font-size: 1.1rem;" class="card-title pt-2">Atención por profesional no registrado</h5>
                            <p class="card-text">
                                Haga click acá para ser atendido, los datos de su atención quedarán
                                registrados en su Ficha Médica Única
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--Cierre: Botones acceso examenes y profesional no inscrito-->
        <!--Row Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="https://www.cronicos.cl/" class="btn" type="button">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="my-auto text-white ml-3 text-left">Portal Crónicos</h5>
                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="http://cronicos.cl/registro.php" target="_blank"  class="btn" type="button">
                            <div class="card-body">
                                <div class="row my-auto">
                                    <h5 class="my-auto text-white text-left">Inscriba sus<br> medicamentos</h5>
                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Row Botones-->
    </div>
</div>
@endsection