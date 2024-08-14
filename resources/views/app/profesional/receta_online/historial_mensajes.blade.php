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
                            <button class="btn btn-primary btn-sm float-right"><i class="feather icon-mail"></i> Enviar mensaje</button>
                        </div>
                        <div class="card-body">
                            <table id="historial_mensajes"
                                class="display table table-striped dt-responsive nowrap table-xs"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        {{--  <th class="text-wrap align-middle" hidden="hidden">Nº de Orden</th>  --}}
                                        <th class="align-middle">Fecha</th>
                                        <th class="align-middle">Remitente</th>
                                        <th class="align-middle">Titulo</th>
                                        <th class="align-middle">Tipo</th>


                                        <th class="align-middle">Estado</th>
                                        <th class="align-middle">Ver Mensaje</th>
                                        <th class="align-middle">Eliminar</th>
                                        <th class="align-middle">Descargar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_mensajes_a_profesional">

                                    @if (isset($mis_mensajes) && count($mis_mensajes) > 0)
                                        @foreach ($mis_mensajes as $mensaje)
                                            <tr>
                                                {{--  <td class="text-wrap align-middle">{{ $mensaje->id }}</td>  --}}
                                                <td class="text-wrap align-middle" style="font-size:12px">
                                                    {{ $mensaje->created_at }}
                                                </td>

                                                <td class="align-middle" style="font-size:12px">
                                                    {{ $mensaje->remitente }}
                                                </td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $mensaje->datos_mensaje->mensaje }}</label></td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $mensaje->tipo_mensaje }}</label></td>
                                                <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar mensaje a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>-->
                                                 <!--<td class="align-middle text-center">Enviado</td>-->


                                                <td class="align-middle"><span id="estado-{{ $mensaje->id }}">{{ $mensaje->estado }}</span></td>
                                                <td class="align-middle"> <button class="btn btn-icon btn-warning"><i class="feather icon-mail" onclick="ver_mensaje({{ $mensaje->id  }})"></i></button><!--<img src="{{ asset('images/talk.png') }}" alt="Documento" height="35px">--></div></td>
                                                <td class="align-middle"><button class="btn btn-danger btn-icon btn-icon" onclick="eliminar_mensaje({{ $mensaje->id }})"><i class="feather icon-x"></i></button></td>
                                                <td class="align-middle"><button class="btn btn-icon btn-primary" onclick="descargar_mensaje({{ $mensaje->id }})"><i class="feather icon-download"></i></button></td>
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
        <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_mensaje()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-4">
                            <label class="floating-label-activo-sm">Fecha</label>
                             <input type="text" class="form-control form-control-sm" id="fecha_msj" name="fecha_msj" disabled>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-8">
                            <label class="floating-label-activo-sm">Remitente</label>
                             <input type="text" class="form-control form-control-sm" id="remitente_msj" name="remitente_msj" disabled>
                        </div>
                         <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Titulo</label>
                             <input type="text" class="form-control form-control-sm" id="titulo_msj" name="titulo_msj" disabled>
                        </div>
                         <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Asunto</label>
                             <input type="text" class="form-control form-control-sm" id="asunto_msj" name="asunto_msj" disabled>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Mensaje</label>
                            <textarea class="form-control" rows="10" onfocus="this.rows=12" onblur="this.rows=10;" id="mensaje_msj" name="mensaje_msj" disabled></textarea>
                        </div>

                        <!--<div class="col-12">
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
                        </div>-->
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrar_modal_mensaje();">Cerrar</button>
                </div>-->
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
                $('#titulo_msj').val(mensaje.datos_mensaje.titulo);
                $('#asunto_msj').val(mensaje.datos_mensaje.asunto);
                $('#mensaje_msj').val(mensaje.datos_mensaje.mensaje);
                $('#estado-'+id).text('LEIDO');
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function cerrar_modal_mensaje(){
        $('#modal_mensaje_a_profesional').modal('hide');
    }

    function eliminar_mensaje(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este mensaje",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ URL('Profesional/eliminar_mensaje') }}"+"/"+id,
                    type: "get",
                    success: function(response){
                        console.log(response);
                        if(response.estado == 1){
                            let mensajes = response.mensajes;
                            console.log(mensajes);
                            $('#tbody_mensajes_a_profesional').empty();
                            mensajes.forEach(mensaje => {
                                $('#tbody_mensajes_a_profesional').append(`
                                    <tr>
                                        <td class="text-wrap text-center align-middle" style="font-size:12px">${mensaje.created_at}</td>
                                        <td class="align-middle" style="font-size:12px">${mensaje.remitente}</td>
                                        <td class="align-middle text-wrap" style="font-size:10px"><label>${mensaje.datos_mensaje.mensaje}</label></td>
                                        <td class="align-middle text-wrap" style="font-size:10px"><label>${mensaje.tipo_mensaje}</label></td>
                                        <td class="align-middle"><span id="estado-${mensaje.id}">${mensaje.estado}</span></td>
                                        <td class="align-middle"> <div style="cursor: pointer;" onclick="ver_mensaje(${mensaje.id})"><img src="{{ asset('images/talk.png') }}" alt="Documento" height="35px"></div></td>
                                        <td class="align-middle"><button class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_mensaje(${mensaje.id})"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                `);
                            });
                            swal("El mensaje ha sido eliminado", {
                                icon: "success",
                            });
                            //location.reload();
                        }else{
                            swal("Error al eliminar el mensaje", {
                                icon: "error",
                            });
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            } else {
                swal("El mensaje no ha sido eliminado");
            }
        });
    }

    function descargar_mensaje(id){
        // confirmar la descarga con swal
        swal({
            title: "¿Estás seguro?",
            text: "Una vez descargado, no podrás recuperar este mensaje",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((descargar) => {
            if (descargar) {
                descargar_mensaje_confirmar(id);
            } else {
                console.log("No se descargó el mensaje");
            }
        });
    }

    function descargar_mensaje_confirmar(id) {
        $.ajax({
            url: "{{ URL('Profesional/descargar_mensaje') }}"+"/"+id,
            type: "get",
            success: function(response) {
                console.log(response);
                if (response.estado == 1) {
                    let mensaje = response.mensaje;
                    let { jsPDF } = window.jspdf;
                    let doc = new jsPDF();

                    // Añadir el mensaje al documento PDF
                    doc.text(mensaje.datos_mensaje.mensaje, 10, 10,{
                        align: "left",
                        maxWidth: 190
                    });


                    // Descargar el PDF
                    doc.save(mensaje.datos_mensaje.titulo + ".pdf");
                } else {
                    swal("Error al descargar el mensaje", {
                        icon: "error",
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
@endsection
