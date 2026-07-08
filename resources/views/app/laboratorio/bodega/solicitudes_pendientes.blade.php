@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Solicitudes pendientes</h5>

                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.area_comercial') }}">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="#">Bodegas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitudes a bodega</h4>
                            <button class="btn btn-primary btn-sm float-right" onclick="abrir_modal_solicitudes()">Agregar solicitud</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tab_productos_solicitados" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">ID</th>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Responsable</th>
                                    <th class="text-center align-middle">Nombre del producto</th>
                                    <th class="text-center align-middle">Tipo de producto</th>
                                    <th class="text-center align-middle">Cantidad</th>
                                    <th class="text-center align-middle">Observaciones</th>
                                    <th class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($productosSolicitados))
                                    @foreach($productosSolicitados as $producto)
                                        <tr>
                                            <td class="align-middle text-center">{{ $producto->id }}</td>
                                            <td class="align-middle text-center">{{ $producto->fecha }}</td>
                                            <td class="align-middle text-center">
                                                @if(isset($producto->responsable))
                                                    {{ $producto->responsable->name ?? $producto->responsable->nombre ?? 'N/A' }}
                                                @else
                                                    {{ $producto->id_responsable }}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">{{ $producto->nombre_producto }}</td>
                                            <td class="align-middle text-center">{{ $producto->tipo_producto }}</td>
                                            <td class="align-middle text-center">{{ $producto->cantidad }}</td>
                                            <td class="align-middle text-center">{{ $producto->observaciones }}</td>
                                            <td class="align-middle text-center">
                                                <button class="btn btn-success btn-sm" onclick="aprobar_solicitud({{ $producto->id }})" title="Aprobar"><i class="fas fa-check"></i></button>
                                                <button class="btn btn-danger btn-sm" onclick="rechazar_solicitud({{ $producto->id }})" title="Rechazar"><i class="fas fa-times"></i></button>
                                                <button class="btn btn-info btn-sm" onclick="editar_solicitud({{ $producto->id }})" title="Editar"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-warning btn-sm" onclick="suspender_solicitud({{ $producto->id }})" title="Suspender"><i class="fas fa-ban"></i></button>
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
@include('app.bodega.modals_bodega.solicitud_pedido')
<!-- MODAL nueva solicitud -->
<div id="modalNuevaSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalNuevaSolicitudLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Nueva Solicitud de Producto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body" id="nueva_solicitud_body">
                <form id="formNuevaSolicitudProducto">
                    <div class="form-group">
                        <label for="nombre_producto" class="font-weight-bold">Nombre del producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required placeholder="Ej: Audífono, Cable, etc">
                    </div>
                    <div class="form-group">
                        <label for="tipo_producto" class="font-weight-bold">Tipo de producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" required placeholder="Ej: Accesorio, Repuesto, etc">
                    </div>
                    <div class="form-group">
                        <label for="cantidad" class="font-weight-bold">Cantidad <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required placeholder="Cantidad a solicitar">
                    </div>
                    <div class="form-group">
                        <label for="observaciones" class="font-weight-bold">Observaciones</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="2" placeholder="Detalles adicionales"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-success" onclick="solicitar()">Solicitar</button>
                    <button class="btn btn-danger" onclick="cancelar()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL nueva solicitud -->

<!-- MODAL SUSPENDER SOLICITUD -->
<div id="modalSuspenderSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalSuspenderSolicitudLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white text-center">Suspender Solicitud</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_solicitud_suspender">
                <div class="form-group">
                    <label for="motivo_suspension" class="font-weight-bold">Motivo de la suspensión <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="motivo_suspension" name="motivo_suspension" rows="3" required placeholder="Describa el motivo por el cual suspende esta solicitud"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-warning" onclick="confirmar_suspension()">Confirmar Suspensión</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL SUSPENDER SOLICITUD -->

<!-- MODAL RECHAZAR SOLICITUD -->
<div id="modalRechazarSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRechazarSolicitudLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white text-center">Rechazar Solicitud</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_solicitud_rechazar">
                <div class="form-group">
                    <label for="motivo_rechazo" class="font-weight-bold">Motivo del rechazo <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="motivo_rechazo" name="motivo_rechazo" rows="3" required placeholder="Describa el motivo por el cual rechaza esta solicitud"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" onclick="confirmar_rechazo()">Confirmar Rechazo</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL RECHAZAR SOLICITUD -->
    </div>
</div>

@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('#tab_productos_solicitados').DataTable();
    });
    function ver_solicitud(id) {
        $.ajax({
            url: "{{ route('adm_cm.ver_solicitud') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(response) {
                console.log(response);
                // ABRIR MODAL CON LA INFORMACION DE LA SOLICITUD
                $('#modalSolicitudDetalle').modal('show');

                $('#detalle_pedido_body').html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function abrir_modal_solicitudes() {
        $('#modalNuevaSolicitud').modal('show');
    }

    function solicitar() {
        let nombre_producto = $('#nombre_producto').val();
        let tipo_producto = $('#tipo_producto').val();
        let cantidad = $('#cantidad').val();
        let observaciones = $('#observaciones').val();

        if(!nombre_producto || !tipo_producto || !cantidad) {
            swal('Error', 'Por favor, complete todos los campos obligatorios.', 'error');
            return;
        }

        $.ajax({
            url: "{{ route('laboratorio.profesional.solicitar_producto_bodega') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "nombre_producto": nombre_producto,
                "tipo_producto": tipo_producto,
                "cantidad": cantidad,
                "observaciones": observaciones
            },
            success: function(response) {
                console.log(response);
                swal({
                    title: 'Éxito',
                    text: 'La solicitud ha sido enviada correctamente.',
                    icon: 'success'
                }).then(() => {
                    location.reload();
                })
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: 'Error',
                    text: 'Ha ocurrido un error al enviar la solicitud. Por favor, inténtelo de nuevo.',
                    icon: 'error'
                })
            }
        });
    }

    function cancelar() {
        $('#modalNuevaSolicitud').modal('hide');
        $('#formNuevaSolicitudProducto')[0].reset();
    }

    function editar_solicitud(id) {
        // Función para editar solicitud - implementar según necesidad
        console.log('Editar solicitud:', id);
    }

    function suspender_solicitud(id) {
        swal({
            title: '¿Está seguro?',
            text: 'Está a punto de suspender esta solicitud. Esta acción requiere que indique un motivo.',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Continuar',
                    value: true,
                    visible: true,
                    className: 'btn-warning',
                    closeModal: true
                }
            },
            dangerMode: true,
        }).then((willSuspend) => {
            if (willSuspend) {
                // Abrir modal para pedir motivo
                $('#id_solicitud_suspender').val(id);
                $('#motivo_suspension').val('');
                $('#modalSuspenderSolicitud').modal('show');
            }
        });
    }

    function confirmar_suspension() {
        let id = $('#id_solicitud_suspender').val();
        let motivo = $('#motivo_suspension').val();

        if(!motivo || motivo.trim() === '') {
            swal('Error', 'Debe indicar un motivo para suspender la solicitud.', 'error');
            return;
        }

        swal({
            title: '¿Confirmar suspensión?',
            text: 'Se suspenderá la solicitud con el motivo indicado.',
            icon: 'warning',
            buttons: {
                cancel: 'No, volver',
                confirm: {
                    text: 'Sí, suspender',
                    value: true,
                    className: 'btn-warning'
                }
            },
        }).then((confirmado) => {
            if (confirmado) {
                ejecutar_suspension(id, motivo);
            }
        });
    }

    function ejecutar_suspension(id, motivo) {
        $.ajax({
            url: "{{ route('adm_cm.suspender_solicitud') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "motivo": motivo
            },
            success: function(response) {
                console.log(response);
                $('#modalSuspenderSolicitud').modal('hide');
                swal({
                    title: 'Solicitud Suspendida',
                    text: 'La solicitud ha sido suspendida correctamente.',
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: 'Error',
                    text: 'Ha ocurrido un error al suspender la solicitud. Por favor, inténtelo de nuevo.',
                    icon: 'error'
                });
            }
        });
    }

    function aprobar_solicitud(id) {
        swal({
            title: '¿Aprobar solicitud?',
            text: 'Está a punto de aprobar esta solicitud. Una vez aprobada, se procesará el pedido.',
            icon: 'info',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Sí, aprobar',
                    value: true,
                    visible: true,
                    className: 'btn-success',
                    closeModal: true
                }
            },
        }).then((willApprove) => {
            if (willApprove) {
                ejecutar_aprobacion(id);
            }
        });
    }

    function ejecutar_aprobacion(id) {
        $.ajax({
            url: "{{ route('adm_cm.aprobar_solicitud') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(response) {
                console.log(response);
                swal({
                    title: 'Solicitud Aprobada',
                    text: 'La solicitud ha sido aprobada correctamente.',
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: 'Error',
                    text: 'Ha ocurrido un error al aprobar la solicitud. Por favor, inténtelo de nuevo.',
                    icon: 'error'
                });
            }
        });
    }

    function rechazar_solicitud(id) {
        swal({
            title: '¿Está seguro?',
            text: 'Está a punto de rechazar esta solicitud. Esta acción requiere que indique un motivo.',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Continuar',
                    value: true,
                    visible: true,
                    className: 'btn-danger',
                    closeModal: true
                }
            },
            dangerMode: true,
        }).then((willReject) => {
            if (willReject) {
                // Abrir modal para pedir motivo
                $('#id_solicitud_rechazar').val(id);
                $('#motivo_rechazo').val('');
                $('#modalRechazarSolicitud').modal('show');
            }
        });
    }

    function confirmar_rechazo() {
        let id = $('#id_solicitud_rechazar').val();
        let motivo = $('#motivo_rechazo').val();

        if(!motivo || motivo.trim() === '') {
            swal('Error', 'Debe indicar un motivo para rechazar la solicitud.', 'error');
            return;
        }

        swal({
            title: '¿Confirmar rechazo?',
            text: 'Se rechazará la solicitud con el motivo indicado.',
            icon: 'warning',
            buttons: {
                cancel: 'No, volver',
                confirm: {
                    text: 'Sí, rechazar',
                    value: true,
                    className: 'btn-danger'
                }
            },
            dangerMode: true,
        }).then((confirmado) => {
            if (confirmado) {
                ejecutar_rechazo(id, motivo);
            }
        });
    }

    function ejecutar_rechazo(id, motivo) {
        $.ajax({
            url: "{{ route('adm_cm.rechazar_solicitud') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "motivo": motivo
            },
            success: function(response) {
                console.log(response);
                $('#modalRechazarSolicitud').modal('hide');
                swal({
                    title: 'Solicitud Rechazada',
                    text: 'La solicitud ha sido rechazada correctamente.',
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: 'Error',
                    text: 'Ha ocurrido un error al rechazar la solicitud. Por favor, inténtelo de nuevo.',
                    icon: 'error'
                });
            }
        });
    }
</script>
@endsection
