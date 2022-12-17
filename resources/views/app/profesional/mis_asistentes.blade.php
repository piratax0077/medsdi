@extends('template.profesional.template')
@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis Asistentes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a panel de configuración">
                                        Panel de
                                        Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis Asistentes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="card-body">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 pt-1">
                                    <h4 class="text-primary f-20">Mis asistentes</h4>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#nuevo_asistente" aria-hidden="true"><i class="feather icon-plus"></i> Registrar asistente</button>       
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <a class="btn btn-block btn-sm btn-warning" href="busq_secretaria.php" role="button"><i class="feather icon-user"></i> Contratar asistente</a>
                                </div>
                            </div>
                        </div> 
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                </div>
                            </div>
                            <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Lugar Atencion</th>
                                        <th class="text-center align-middle">Rut</th>
                                        <th class="text-center align-middle">Nombre</th>
                                        <th class="text-center align-middle">Contacto</th>
                                        <th class="text-center align-middle">Contacto Emergencia</th>
                                        <th class="text-center align-middle">Dirección</th>
                                        <th class="text-center align-middle">Desasociar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{--  @if (isset($asistentes))
                                        @foreach ($asistentes as $a)
                                            <tr>
                                                <input type="hidden" name="id_asistente" id="id_asistente" value="{{ $a->id }}">
                                                <td class="align-middle text-center">-</td>
                                                <td class="align-middle text-center">{{ $a->rut }}</td>
                                                <td class="align-middle text-center">
                                                    {{ $a->nombres . ' ' . $a->apellido_uno . ' ' . $a->apellido_dos }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>{{ $a->email }}</span><br>
                                                    <span>{{ $a->telefono_uno }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span></span><br>
                                                    <span></span><br>
                                                    <span></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    @if(issset($a->id_direccion))
                                                        {{ $a->Direccion()->first()->direccion }}<br>
                                                        {{ $a->Direccion()->first()->Ciudad()->first()->nombre }}
                                                    @else
                                                        NO DISPONIBLE
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button onclick="desasociar_asistente({{ $a->id }});"
                                                        type="button" class="btn btn-danger btn-sm btn-icon"
                                                        data-toggle="tooltip" data-placement="top" title="Desasociar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif  --}}

                                    @if (isset($asistentes_lugar_atencion))
                                        @foreach ($asistentes_lugar_atencion as $asis_la)

                                            <tr>
                                                <input type="hidden" name="id_asistente" id="id_asistente"
                                                    value="{{ $asis_la->id }}">
                                                <td class="align-middle text-center">{{ $asis_la->LugarAtencion()->first()->nombre }}</td>
                                                <td class="align-middle text-center">
                                                    {{ $asis_la->Asistentes()->first()->rut }}</td>
                                                <td class="align-middle text-center">
                                                    {{ $asis_la->Asistentes()->first()->nombres .' ' .$asis_la->Asistentes()->first()->apellido_uno .' ' .$asis_la->Asistentes()->first()->apellido_dos }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>{{ $asis_la->Asistentes()->first()->email }}</span><br>
                                                    <span>{{ $asis_la->Asistentes()->first()->telefono_uno }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span></span><br>
                                                    <span></span><br>
                                                    <span></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    @if(isset($asis_la->Asistentes()->first()->id_direccion))
                                                        {{ $asis_la->Asistentes()->first()->Direccion()->first()->direccion }}<br>
                                                        {{ $asis_la->Asistentes()->first()->Direccion()->first()->Ciudad()->first()->nombre }}
                                                    @else
                                                        NO DISPONIBLE
                                                    @endif

                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        onclick="desasociar_asistente({{ $asis_la->Asistentes()->first()->id }})"
                                                        class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                                        data-placement="top" title="Desasociar"><i
                                                            class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('app.profesional.modales.nuevo_asistente')
