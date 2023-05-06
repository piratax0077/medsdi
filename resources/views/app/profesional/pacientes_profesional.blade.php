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
                                <h5 class="m-b-10 font-weight-bold">Mis pacientes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mis pacientes </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- Tabla mis pacientes -->
            <!--Este formulario muestra los pacientes que alguna vez atendió el profesional (relacion: id_paciente/id_profesional)-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <div class="row">
                            <div class="col-md-12 align-botton">
                                <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Mis pacientes</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <table id="res-config" class="display table table-striped  dt-responsive nowrap table-xs"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Paciente</th>
                                            <th class="text-center align-middle">Nacimiento</th>
                                            <th class="text-center align-middle">Convenio</th>
                                            <th class="text-center align-middle">Contacto</th>
                                            <th class="text-center align-middle">Acción</th>
                                            <th class="text-center align-middle">Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($paciente) && count($paciente) > 0 && $paciente != null && $paciente != '')
                                            @foreach ($paciente as $p)
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        {{ $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos }}<br>
                                                        {{ $p->rut }}<br>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ \Carbon\Carbon::parse($p->fecha_nac)->format('d/m/Y') }}</td>
                                                    <td class="text-center align-middle">{{ $p->Prevision()->first()->nombre }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $p->email }}<br>
                                                        {{ $p->telefono_uno }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <a href="#"
                                                            class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top"
                                                            title="Ficha Médica Única"><i class="feather icon-file-plus"></i></a>

                                                        <a href="{{ ROUTE('profesional.atenciones_previas_paciente', $p->id) }}"
                                                            class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top"
                                                            title="Atenciones previas"><i class="feather icon-activity"></i></a>

                                                        <!--<a onclick="autorizacion_ficha_medica_unica({{ $p->id }});"
                                                            class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"
                                                            data-placement="top" title="Ficha Médica Única"><i
                                                                class="feather icon-file-plus"></i></a>-->

                                                        <a href="{{ ROUTE('profesional.editar_paciente', $p->id) }}"
                                                            class="btn btn-secondary btn-sm btn-icon" data-toggle="tooltip"
                                                            data-placement="top" title="Editar datos medicos del paciente"><i
                                                                class="feather icon-edit"></i></a>

                                                        <!--<a target="_blank" class="btn btn-icon btn-success text-white"
                                                            data-toggle="modal" data-target="#modal_correo" data-placement="top"
                                                            title="Enviar Email"><i class="fas feather icon-mail"></i></a>-->
                                                    </td>
                                                    @if ($p->id_premium == null)
                                                        <td class="text-left align-middle"><span
                                                                class="badge badge-primary">Normal</span>
                                                        </td>
                                                    @else
                                                        <td class="text-left align-middle"><span
                                                                class="badge badge-success">Premium</span>
                                                        </td>
                                                    @endif
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
        <!-- Cierre: Tabla mis pacientes -->
    </div>
    <!--Cierre: Container Completo-->

    <!--Modal envio de correo-->
    <div class="modal fade" id="modal_correo" tabindex="-1" role="dialog" aria-labelledby="enviar_email"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h4 class="modal-title text-white w-100 font-weight-bold">Nuevo Correo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form34">
                                @if (isset($p))
                                    {{ $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos }}
                                @endif
                            </label>
                        </i><br>
                        <i class="fas fa-envelope prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form29">
                                @if (isset($p))
                                    {{ $p->email }}
                                @endif

                            </label>
                        </i><br>

                        <i class="fas fa-tag prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form32">
                                Asunto
                            </label>
                        </i>
                        <input type="text" id="titulo_email" name="titulo_email" class="form-control validate"><br>

                        <i class="fas fa-pencil prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form8">
                                Mensaje
                            </label>
                        </i>
                        <textarea type="text" id="mensaje_email" name="mensaje_email" class="md-textarea form-control" rows="4"></textarea>

                    </div>

                </div>
                <div class="modal-footer bg-info d-flex justify-content-center">
                    <button class="btn btn-unique bg-white"
                        @if (isset($p)) onclick="enviar_email({{ $p->id }});" @endif>Enviar</button>


                </div>
            </div>
        </div>
    </div>

    @include( 'app.profesional.modales.autorizacion_ficha_medica_unica')
@endsection
