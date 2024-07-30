@extends('template.direccion_salud.template')

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
                                <h5 class="m-b-10 font-weight-bold">Escritorio Dirección Salud</h5>
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
                            <a href="{{ route('ministerio.ges') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                    <h6 class="mt-1">GES</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('ministerio.enfer_noti_obliga') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                    <h6 class="mt-1">Enfermedad de<br/>Notificacion Obligatoria</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_medicamento') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                                    <h6 class="mt-1">Control<br>Medicamentos</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_farmacia') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Control<br>Farmacia</h6>
                                </div>
                            </a>
                        </div>

                        <div class="card subir">
                            <a href="{{ route('ministerio.control_licencia') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Control de licencias medicas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!--Botones-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-deck">

                        <div class="card social-widget-card bg-c-info opacidad px-0">
                             <a href="https://www.cronicos.cl/" target="_blank" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-40 mb-2" src="{{ asset('images/iconos/cronicos.svg') }}">
                                    <h5 class="my-auto text-white">Portal Crónicos</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="#" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/otros_servicios.svg') }}">
                                    <h5 class="my-auto text-white">Otros Servicios</h5>
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
                    </div>
                </div>
            </div>
            <!--Cierre: Botones-->

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection

