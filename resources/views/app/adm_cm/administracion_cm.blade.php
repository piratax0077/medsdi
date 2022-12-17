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
                            <h5 class="m-b-10 font-weight-bold">Administración Comercial del centro médico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.administracion_cm') }}">Administración del centro médico</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.at_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                                <h5 class="mt-2">Farmacia</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.pagos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                                <h5 class="mt-2"> Bodega e Insumos </h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.insumos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                                <h5 class="mt-2">Inventario y Reportes</h5>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.insumos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                                <h5 class="mt-2">Insumos y Medicamentos</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.proveedores') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/proveedores.svg') }}">
                                <h5 class="mt-2">Proveedores</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.gastos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/gastos.svg') }}">
                                <h5 class="mt-2">Administración Contable</h5>
                            </div>
                        </a>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.estadisticas') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/estadisticas_2.svg') }}">
                                <h5 class="mt-2">Estadísticas del Centro</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
@endsection
