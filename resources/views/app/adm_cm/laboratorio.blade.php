@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold"></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.laboratorio') }}">Área de Laboratorios {{ mb_strtoupper($institucion->nombre) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.laboratorio_agregar') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/laboratorio_1.svg') }}">
                                <h5 class="mt-2">Laboratorio del centro médico</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.examenes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Exámenes</h5>
                            </div>
                        </a>
                    </div>
                </div>
               {{-- <div class="col-md-6">
                    <div class="card subir">
                         <a href="{{ ROUTE('adm_cm.procedimientos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Procedimientos</h5>
                            </div>
                        </a>
                    </div>
                </div> --}}
            </div>

            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="wid-60 align-self-start mr-3"  src="{{ asset('images/iconos/laboratorio.svg') }}">
                          <div class="media-body">
                           <h4 class="text-c-blue">Laboratorios</h4>
                           <p>Área destinada a la realización de análisis, estudios y procedimientos especializados.</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card py-0">
                    <div class="card-body pb-2 pt-2">
                        <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="laboratorios-cm-tab" data-toggle="pill" href="#laboratorios-cm" role="tab" aria-controls="laboratorios-cm" aria-selected="true">
                                   Laboratorios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ex-lab-cm-tab" data-toggle="pill" href="#exlabo-cm" role="tab" aria-controls="ex-lab-cm" aria-selected="false">
                                    Exámenes
                                </a>
                            </li>
                             {{--<li class="nav-item">
                                <a class="nav-link-aten text-reset" id="proc-lab-cm-tab" data-toggle="pill" href="#proc-lab-cm" role="tab" aria-controls="proc-lab-cm" aria-selected="false">
                                   Procedimientos
                                </a>
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
@endsection
