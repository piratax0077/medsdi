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
                                            <img src="{{ asset('images/iconos/equipamiento-odonto.svg') }}" class="wid-30 mr-2" alt="">
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
                                <table class="table table-hover" id="tabla_equipamiento">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>N° Serie</th>
                                            <th>Fecha Adquisición</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($equipamientos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->marca ?? '-' }}</td>
                                            <td>{{ $item->modelo ?? '-' }}</td>
                                            <td>{{ $item->numero_serie ?? '-' }}</td>
                                            <td>{{ $item->fecha_adquisicion ? \Carbon\Carbon::parse($item->fecha_adquisicion)->format('d/m/Y') : '-' }}</td>
                                            <td>
                                                @if($item->estado == 1)
                                                    <span class="badge badge-success">Activo</span>
                                                @else
                                                    <span class="badge badge-danger">Inactivo</span>
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
                                            <td colspan="8" class="text-center text-muted">No hay equipamiento registrado</td>
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
