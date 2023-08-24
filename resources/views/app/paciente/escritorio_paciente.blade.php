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

        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col mb-3">
                <div class="card subir mb-2 h-100">
                    <a href="{{ ROUTE('paciente.agendar_hora') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-50 text-center mt-1" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-2"> Reservar hora médica </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-3 h-100">
                    <a href="{{ ROUTE('paciente.mis_profesionales') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                            <h5 class="mt-2"> Mis profesionales </h5>
                        </div>
                    </a>
                </div>
            </div>
                <!--
                <div class="card subir">
                    <a href="{{ ROUTE('paciente.mi_ficha') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/ficha_1.svg') }}">
                            <h5 class="mt-2"> Mi Ficha Médica Única </h5>
                        </div>
                    </a>
                </div>
                -->
            <div class="col mb-3">
                <div class="card subir mb-2 h-100">
                    <a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/fmu.svg') }}">
                            <h5 class="mt-1"> Mi Ficha Médica Única </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-2 h-100">
                    <a href="{{ ROUTE('paciente.receta') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                            <h5 class="mt-2">Receta Online </h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--CIERRE: Row Botones -->
        <!--Row Mis Horas Médicas y Botón Examenes-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-3">
                <div class="card h-100 pb-0 mb-3">
                    <div class="card-header text-center bg-c-info">
                        <h5 class="text-white d-inline text-center" style="font-size: 1.2rem;">Mis horas médicas del día</h5>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th>Acción</th>
                                        <th>Profesional</th>
                                        <th>Información de Atención</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <button href="#!" class="btn btn-info btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td>
                                            Nombre y Apellidos<br>
                                            Medicina General<br>
                                        </td>
                                        <td>
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-danger">Hora rechazada</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">
                                            <button href="#!" class="btn btn-info btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar Hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular Hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td>
                                            Nombre y Apellidos<br>
                                            Medicina General<br>
                                        </td>
                                        <td>
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-warning">Hora pendiente</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">
                                            <button href="#!" class="btn btn-info btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar Hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular Hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td>
                                            Nombre y Apellidos<br>
                                            Medicina General<br>
                                        </td>
                                        <td>
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-success">Hora aprobada</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="card h-100 mb-3 d-none d-lg-block">
                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}"
                        alt="Flujo de caja">
                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn btn-arrastre"
                        type="button">
                        <div class="card-body px-0">
                            <h5>Atención por profesional no registrado</h5>
                            <p>
                                Haga click acá para ser atendido, los datos de su atención quedarán
                                registrados en su Ficha Médica Única
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                <div class="card bg-primary h-100 mb-3 d-block d-lg-none">
                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn  btn-arrastre"
                        type="button">
                        <div class="card-body">
                            <h5 class=" text-white">Atención por profesional no registrado</h5>
                            <p class="text-white">
                                Haga click acá para ser atendido, los datos de su atención quedarán registrados en su Ficha Médica Única
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
                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="http://cronicos.cl/registro.php" target="_blank"  class="btn" type="button">
                            <div class="card-body">
                                <div class="row my-auto">
                                    <h5 class="my-auto text-white text-left">Inscriba sus<br> Medicamentos</h5>
                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">
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
