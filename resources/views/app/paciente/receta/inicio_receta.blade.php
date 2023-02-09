@extends('template.paciente.template')
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
                            <h5 class="m-b-10 font-weight-bold">Receta Online</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.receta') }}">Receta Online</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones-->
        <div class="row m-b-20">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.receta.receta') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center mb-3" src="{{ asset('images/iconos/recetas-ro.svg') }}"
                                    alt="Mis ecetas">
                                <h5 class="f-20">
                                    Mis recetas
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.receta.examen') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center mb-3" src="{{ asset('images/iconos/examenes-ro.svg') }}"
                                    alt="Mis examenes">
                                <h5 class="f-20">
                                    Mis exámenes
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:Botones-->
        <!--Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.receta.certificado') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center mb-3" src="{{ asset('images/iconos/certificados-ro.svg') }}"
                                    alt="Mis certificados">
                                <h5 class="f-20">
                                    Mis certificados
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.receta.licencia') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center mb-3" src="{{ asset('images/iconos/documentos-ro.svg') }}"
                                    alt="Mis Licencias">
                                <h5 class="f-20">
                                    Mis Licencias
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:Botones-->
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection
