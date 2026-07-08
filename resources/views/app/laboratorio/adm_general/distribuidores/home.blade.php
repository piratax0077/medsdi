@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-4">
                        <div class="page-header-title">
                            <!--<h5 class="m-b-10 font-weight-bold">Escritorio Gestión Distribuidores</h5>-->
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Escritorio Distribución / Administración General</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--MODULOS AGRUPADOS - LAYOUT 2x2-->
        <div class="row">
            <!-- FILA 1 -->
            <!-- COLUMNA 1: Ventas y Clientes -->
            <div class="col-md-6 mb-3">
                <div class="card py-3 bg-info mb-3">
                    <div class="text-center">
                        <h5 class="mb-0 text-white f-18">
                            <i class="feather icon-shopping-cart mr-2"></i>Ventas y Clientes
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card subir">
                            <a href="{{ ROUTE('laboratorio.distribucion.clientes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/clientes.png') }}">
                                    <h6 class="mt-1 mb-0">Clientes</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card subir">
                            <a href="{{ ROUTE('laboratorio.distribucion.ventas') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/ventas.png') }}">
                                    <h6 class="mt-1 mb-0">Ventas</h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card subir">
                            <a href="{{ route('laboratorio.distribucion.campanas_promocionales') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/megafono.png') }}">
                                    <h6 class="mt-1 mb-0">Campañas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-0">
                        <div class="card subir">
                            <a href="{{ route('laboratorio.distribucion.cotizaciones') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/cotizacion.png') }}">
                                    <h6 class="mt-1 mb-0">Cotizaciones</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMNA 2: Postventa y Soporte -->
            <div class="col-md-6 mb-3">
                <div class="card py-3 bg-secondary mb-3">
                    <div class="text-center">
                        <h5 class="mb-0 text-white f-18">
                            <i class="feather icon-monitor mr-2"></i>Postventa y Soporte
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card subir">
                            <a href="{{ ROUTE('laboratorio.distribucion.pedidos') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/pedido.png') }}">
                                    <h6 class="mt-1 mb-0">Pedidos</h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 mb-0">
                        <div class="card subir">
                            <a href="{{ route('laboratorio.distribucion.reparaciones') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/reparacion.png') }}">
                                    <h6 class="mt-1 mb-0">Reparaciones / Reclamos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FILA 2 -->
            <!-- COLUMNA 3: Gestión de Stock y Compras -->
            <div class="col-md-6 mb-3">
                <div class="card py-3 bg-warning mb-3">
                    <div class="text-center">
                        <h5 class="mb-0 text-white f-18">
                            <i class="feather icon-package mr-2"></i>Gestión de Stock y Compras
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card subir ">
                            <a href="{{ ROUTE('laboratorio.distribucion.existencia_bodega') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/bodega.png') }}">
                                    <h6 class="mt-1 mb-0">Bodega</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card subir ">
                            <a href="{{ route('laboratorio.distribucion.renovacion_stock') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/renovacion.png') }}">
                                    <h6 class="mt-1 mb-0">Renovación</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card subir ">
                            <a href="{{ ROUTE('laboratorio.distribucion.compras') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/comprar.png') }}">
                                    <h6 class="mt-1 mb-0">Compras</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card subir ">
                            <a href="{{ ROUTE('laboratorio.distribucion.proveedores') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/proveedores.svg') }}">
                                    <h6 class="mt-1 mb-0">Proveedores</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-0">
                        <div class="card subir">
                            <a href="{{ route('laboratorio.distribucion.importaciones') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/importar.png') }}">
                                    <h6 class="mt-1 mb-0">Importaciones</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card subir">
                            <a href="{{ ROUTE('laboratorio.distribucion.solicitudes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/solicitud.png') }}">
                                    <h6 class="mt-1 mb-0">Solicitudes</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMNA 4: Gestión Financiera -->
            <div class="col-md-6 mb-3">
                <div class="card py-3 bg-success mb-3">
                    <div class="text-center">
                        <h5 class="mb-0 text-white f-18">
                            <i class="feather icon-trending-up mr-2"></i>Gestión Financiera
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card subir ">
                            <a href="{{ ROUTE('laboratorio.distribucion.gestion_financiera') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/gastos-pagos.png') }}">
                                    <h6 class="mt-1 mb-0">Finanzas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-0">
                        <div class="card subir ">
                            <a href="{{ route('laboratorio.distribucion.estadisticas', $institucion->id) }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/estadisticas.png') }}">
                                    <h6 class="mt-1 mb-0">Estadísticas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--CIERRE: MODULOS AGRUPADOS - LAYOUT 2x2-->
    </div>
</div>
@include('app.adm_cm.modales.en_construccion')
<!--Cierre: Container Completo-->
@endsection
