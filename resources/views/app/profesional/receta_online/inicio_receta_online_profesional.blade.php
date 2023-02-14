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
                                <h5 class="m-b-10 font-weight-bold">Escritorio Profesional</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Receta Online</a>
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
                        <div class="card subir py-5">
                            <a href="{{ route('profesional.mis_recetas') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/recetas.svg') }}"
                                        alt="Mis Recetas">
                                    <h4 class="titulos_tarjetas">
                                        Mis Recetas
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="card subir py-5">
                            <a href="{{ route('profesional.mis_examenes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/examen.svg') }}"
                                        alt="Mis Examenes">
                                    <h4 class="titulos_tarjetas">
                                        Mis Exámenes
                                    </h4>
                                </div>
                            </a>
                        </div>
						<div class="card subir py-5">
                            <a href="{{ route('profesional.mis_certificados') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3"
                                        src="{{ asset('images/iconos/certificado.svg') }}" alt="Mis Certificados">
                                    <h4 class="titulos_tarjetas">
                                        Mis Certificados
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="card subir py-5">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3"
                                        src="{{ asset('images/iconos/certificado.svg') }}" alt="Mis Certificados">
                                    <h4 class="titulos_tarjetas">
                                        Mis Documentos
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE:Botones-->
            <!--Botones-->
            <!--<div class="row m-b-10">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card subir py-5">
                            <a href="{{ route('profesional.mis_certificados') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3"
                                        src="{{ asset('images/iconos/certificado.svg') }}" alt="Mis Certificados">
                                    <h4 class="titulos_tarjetas">
                                        Mis Certificados
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="card subir py-5">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/licencia.svg') }}"
                                        alt="Mis Licencias">
                                    <h4 class="titulos_tarjetas">
                                        Mis Licencias
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--CIERRE:Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection
