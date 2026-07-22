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
                                <h5 class="m-b-10 font-weight-bold"></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Exámenes Transcritos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!--Tabla Examenes transcritos-->
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card h-100 pb-0">
                        <div class="card-header-principal bg-white">
                            <h5 class=" f-20 d-inline mt-1 float-left"><i class="feather icon-file-text icono-primary"></i> Exámenes Transcritos</h5>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="dt-responsive table-responsive align-middle pb-0">
                                <table id="table_examenes_transcritos" class="table table-striped table-bordered nowrap table-sm" style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class=" align-middle">Fecha Examen</th>
                                            <th class=" align-middle">Paciente</th>
                                            <th class=" align-middle">Examen</th>
                                            <th class=" align-middle">Asistente</th>
                                            <th class=" align-middle">Acción</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                        @if (isset($examenes_transcritos))
                                            @foreach ($examenes_transcritos as $ex_t)
                                                <tr>
                                                    <td>
                                                        {{ date('d-m-Y', strtotime($ex_t->horas_medicas_fecha_consulta)) }}
                                                    </td>
                                                    <td>
                                                        {{ $ex_t->paciente_nombres.' '.$ex_t->paciente_apellido_uno }}<br/>
                                                        {{ $ex_t->paciente_rut }}
                                                    </td>
                                                    <td class="bg-estado-light-amarillo">
                                                        {{ $ex_t->examen_especialidad_nombre }}
                                                    </td>
                                                    <td class="bg-estado-light-amarillo">
                                                        {{ $ex_t->asistentes_nombres.' '.$ex_t->asistentes_apellido_uno }}<br/>
                                                        {{ $ex_t->asistentes_rut }}
                                                    </td>
                                                    <td class="bg-estado-light-amarillo">
                                                        {{-- boton de ver  --}}
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver examen" onclick="abrir_transcripcion_examen('{{ $ex_t->horas_medicas_id }}')"><i class="feather icon-eye"></i> VER - CONFIRMAR</button>
                                                        {{-- aprobar --}}
                                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Aprobar"><i class="feather icon-check"></i>APROBAR</button> --}}
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
    </div>
    <!--Cierre: Container Completo-->

    @include('app.profesional.modales.transcribir_examen')
@endsection
