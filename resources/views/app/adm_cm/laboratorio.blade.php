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
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.laboratorio') }}">Área de Laboratorios {{ mb_strtoupper($institucion->nombre) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--TITULO CON DESCRIPCIÓN-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="wid-60 align-self-start mr-3"  src="{{ asset('images/iconos/laboratorio.svg') }}">
                          <div class="media-body">
                           <h4 class="text-c-blue">Laboratorios</h4>
                           <p>Administra la información de los laboratorios, exámenes y procedimientos.</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('adm_cm.laboratorio_agregar') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-70 text-center" src="{{ asset('images/iconos/lab-lugar.svg') }}">
                            <h5 class="mt-2">Laboratorios del centro médico</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('adm_cm.examenes') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-70 text-center" src="{{ asset('images/iconos/procedimiento-medico.png') }}">
                            <h5 class="mt-2">Exámenes y/o procedimeintos</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
@endsection
