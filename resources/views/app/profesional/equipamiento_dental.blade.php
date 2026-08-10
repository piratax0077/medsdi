@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb mt-3">
                                <li class="breadcrumb-item">
                                 
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                 
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a panel de configuración">
                                        Panel de Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Equipamiento Dental</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header-principal bg-white">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8 pl-0">
                                        <h5 class="f-20 d-inline">
                                            <i class="icono-primary feather icon-file-plus"></i>
                                            Equipamiento Dental
                                        </h5>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevo_equipamiento">
                                            <i class="feather icon-plus"></i> Agregar Equipamiento
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection
