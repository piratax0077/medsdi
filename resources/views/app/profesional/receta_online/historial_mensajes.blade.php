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
                                <h5 class="m-b-10 font-weight-bold">Mis mensajes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.index_receta_online') }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="#">Mis mensajes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <h4 class="text-c-blue f-22">Mis mensajes</h4>
                            <button class="btn btn-primary btn-sm float-right">Enviar mensaje</button>
                        </div>
                        <div class="card-body">
                            <table id="tabla_examenes_profesional_ro"
                                class="display table table-striped dt-responsive nowrap table-xs"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        {{--  <th class="text-wrap text-center align-middle" hidden="hidden">Nº de Orden</th>  --}}
                                        <th class="text-wrap text-center align-middle">Fecha</th>
                                        <th class=" align-middle">Remitente</th>
                                        <th class=" align-middle">Titulo</th>
                                        <th class=" align-middle">Asunto</th>
                                        <th class=" align-middle">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($mensajes) && count($mensajes) > 0)
                                        @foreach ($mensajes as $mensaje)
                                            <tr>
                                                {{--  <td class="text-wrap align-middle">{{ $mensaje->id }}</td>  --}}
                                                <td class="text-wrap text-center align-middle" style="font-size:12px">
                                                    {{ $mensaje->created_at }}
                                                </td>

                                                <td class="align-middle" style="font-size:12px">
                                                    {{ $mensaje->usuario }}
                                                </td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $mensaje->mensaje }}</label></td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>DIRECTO</label></td>
                                                <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar mensaje a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>-->
                                                 <!--<td class="align-middle text-center">Enviado</td>-->
                                               <td class="align-middle"> <div onclick="ver_mensaje({{ $mensaje->id  }})"><img src="{{ asset('images/talk.png') }}" alt="Documento" height="35px"></div></td>
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

    <!-- MODAL A PROFESIONAL -->
    <div class="modal fade" id="modal_mensaje_a_profesional" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_a_profesional" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_mensaje()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fecha_msj" name="fecha_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Remitente:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="remitente_msj" name="remitente_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Titulo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="titulo_msj" name="titulo_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Asunto:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="asunto_msj" name="asunto_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mensaje:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="mensaje_msj" name="mensaje_msj" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrar_modal_mensaje();">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
<script>
    function ver_mensaje(id){
        // mostrar el modal
        $.ajax({
            url: "{{ URL('Profesional/ver_mensaje') }}"+"/"+id,
            type: "get",
            success: function(response){
                let mensaje = response;
                console.log(mensaje);
                // abrir modal
                $('#modal_mensaje_a_profesional').modal('show');
                $('#fecha_msj').val(mensaje.fecha_emision);
                $('#remitente_msj').val(mensaje.remitente);
                $('#titulo_msj').val(mensaje.titulo);
                $('#asunto_msj').val(mensaje.asunto);
                $('#mensaje_msj').val(mensaje.mensaje);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function cerrar_modal_mensaje(){
        $('#modal_mensaje_a_profesional').modal('hide');
    }
</script>
@endsection
