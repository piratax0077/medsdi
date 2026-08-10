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
                                    @if(Auth::user()->hasRole('Profesional'))
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <a href="{{ route('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @endif
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a panel de configuración">
                                        Panel de Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Gestión de Insumos</a></li>
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
                                            <img src="{{ asset('images/iconos/insumos-bodega.png') }}" class="wid-30 mr-2" alt="">
                                            Gestión de Insumos
                                        </h5>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevo_insumo">
                                            <i class="feather icon-plus"></i> Agregar Insumo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla_insumos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Stock</th>
                                            <th>Unidad</th>
                                            <th>Stock Mínimo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($insumos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->categoria ?? '-' }}</td>
                                            <td>{{ $item->stock ?? 0 }}</td>
                                            <td>{{ $item->unidad ?? '-' }}</td>
                                            <td>{{ $item->stock_minimo ?? '-' }}</td>
                                            <td>
                                                @if($item->stock > $item->stock_minimo)
                                                    <span class="badge badge-success">Normal</span>
                                                @elseif($item->stock > 0)
                                                    <span class="badge badge-warning">Stock bajo</span>
                                                @else
                                                    <span class="badge badge-danger">Sin stock</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" title="Editar">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">No hay insumos registrados</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection
