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
                            <div class="col-md-12 align-botton d-flex justify-content-between">
                                <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Mis pacientes</h4>
                                <button class="btn btn-primary btn-sm" onclick="enviar_difusion_pacientes()">Mensaje Difusion a mis pacientes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <table id="res-config" class="display table table-striped dt-responsive nowrap table-xs"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Nacimiento</th>
                                            <th>Convenio</th>
                                            <th>Contacto</th>
                                            <th>Acción</th>
                                            <th>Mensaje</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($paciente) && count($paciente) > 0 && $paciente != null && $paciente != '')
                                            @foreach ($paciente as $p)
                                                <tr>
                                                    <td>
                                                        {{ $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos }}<br>
                                                        {{ $p->rut }}<br>
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($p->fecha_nac)->format('d/m/Y') }}</td>
                                                    <td class="text-center align-middle">{{ $p->Prevision()->first()->nombre }}
                                                    </td>
                                                    <td>
                                                        {{ $p->email }}<br>
                                                        {{ $p->telefono_uno }}
                                                    </td>
                                                    <td>
                                                        @if($p->id_usuario)
                                                        <a href="{{ ROUTE('check_sdi', ['id_recept' => $p->id_usuario,'urla'=> 'Profesional/Mis_pacientes','urln' => 'Mi_Ficha_Medica']) }}"
                                                            class="btn btn-primary btn-icon" data-toggle="tooltip"
                                                            data-placement="top" title="Ficha Médica Única"><i
                                                                class="feather icon-file-plus"></i></a>
                                                        @endif
                                                        <a href="{{ ROUTE('profesional.atenciones_previas_paciente', $p->id) }}"
                                                            class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top"
                                                            title="Atenciones previas"><i class="feather icon-activity"></i></a>

                                                        <!--<a onclick="autorizacion_ficha_medica_unica({{ $p->id }});"
                                                            class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"
                                                            data-placement="top" title="Ficha Médica Única"><i
                                                                class="feather icon-file-plus"></i></a>-->
														@if($p->id_usuario)
                                                        <a href="{{ ROUTE('check_sdi', ['id_recept' => $p->id_usuario,'urla'=> 'Profesional/Mis_pacientes','urln' => 'Profesional/Editar_paciente/'.$p->id, 'id_tipo' => 9]) }}"
                                                            class="btn btn-secondary btn-sm btn-icon" data-toggle="tooltip"
                                                            data-placement="top" title="Editar datos medicos del paciente"><i
                                                                class="feather icon-edit"></i></a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-outline-warning btn-icon btn-sm" onclick="enviar_mensaje_paciente({{ $p->id }})"><i class="fas fa-mail"></i></button>
                                                    </td>
                                                    @if ($p->id_premium == null)
                                                        <td><span
                                                                class="badge badge-primary">Normal</span>
                                                        </td>
                                                    @else
                                                        <td><span
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

    @include('app.profesional.modales.autorizacion_ficha_medica_unica')
    @include('app.profesional.modales.mensaje_paciente')
    @include('app.profesional.modales.mensaje_difusion_pacientes')
@endsection

@section('page-script')
<script>
    function enviar_mensaje_paciente(id_paciente){
        $('#modalMensajePaciente').modal('show');
        $('#id_paciente_mensaje').val(id_paciente);
    }

    function enviar_difusion_pacientes(){
        $('#modalMensajeDifusionPacientes').modal('show');
    }
</script>
@endsection
