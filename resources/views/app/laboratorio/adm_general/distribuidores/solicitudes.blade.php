@extends('template.laboratorio.laboratorio_profesional.template')

@section('style')
<style>
    .request-card { border-left: 4px solid #27ae60; }
    .badge-estado { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 0.75rem; }
</style>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- Header -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">SOLICITUDES DE DISTRIBUCIÓN</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                               <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Solicitudes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h6 class="mb-0 font-weight-bold">
                            <i class="feather icon-filter mr-2"></i>Filtros de búsqueda
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="font-weight-bold">Tipo de solicitud</label>
                                <select class="form-control form-control-sm">
                                    <option value="">-- Todos --</option>
                                    <option value="cotizacion">Cotizaciones</option>
                                    <option value="compra">Compras</option>
                                    <option value="devolucion">Devoluciones</option>
                                    <option value="reclamo">Reclamos</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="font-weight-bold">Estado</label>
                                <select class="form-control form-control-sm">
                                    <option value="">-- Todos --</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="procesada">Procesada</option>
                                    <option value="completada">Completada</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="font-weight-bold">Fecha</label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de solicitudes -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 font-weight-bold">
                    <i class="feather icon-list mr-2"></i>Solicitudes registradas
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nº</th>
                                <th>Producto</th>
                                <th>Tipo pedido</th>
                                <th>Cantidad</th>
                                <th>Urgencia</th>
                                <th>Observaciones</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($solicitudes) && count($solicitudes) > 0)
                                @foreach($solicitudes as $solicitud)
                                    @php
                                        $nombreProducto = $solicitud->compraDetalle && $solicitud->compraDetalle->producto ? $solicitud->compraDetalle->producto->nombre : 'N/A';
                                        $urgenciaClass = $solicitud->urgencia === 'urgente' ? 'badge-warning' : ($solicitud->urgencia === 'critica' ? 'badge-danger' : 'badge-secondary');
                                        $estadoClass   = $solicitud->estado === 'pendiente' ? 'badge-warning' : ($solicitud->estado === 'procesada' ? 'badge-info' : ($solicitud->estado === 'completada' ? 'badge-success' : 'badge-light'));
                                    @endphp
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $nombreProducto }}</td>
                                        <td>
                                            @if($solicitud->tipo_pedido === 'mismo')
                                                <span class="badge badge-info"><i class="feather icon-refresh-cw mr-1"></i>Repetir último</span>
                                            @else
                                                <span class="badge badge-success"><i class="feather icon-plus-circle mr-1"></i>Nuevo</span>
                                            @endif
                                        </td>
                                        <td>{{ $solicitud->cantidad ?? '-' }}</td>
                                        <td>
                                            <span class="badge badge-estado {{ $urgenciaClass }}">{{ ucfirst($solicitud->urgencia ?? 'normal') }}</span>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $solicitud->observaciones ?? '-' }}</small>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge badge-estado {{ $estadoClass }}">{{ ucfirst($solicitud->estado) }}</span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="ver_solicitud(
                                                    {{ $solicitud->id }},
                                                    '{{ addslashes($nombreProducto) }}',
                                                    '{{ $solicitud->tipo_pedido }}',
                                                    {{ $solicitud->cantidad ?? 'null' }},
                                                    '{{ $solicitud->urgencia ?? 'normal' }}',
                                                    '{{ addslashes($solicitud->observaciones ?? '') }}',
                                                    '{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y H:i') }}',
                                                    '{{ $solicitud->estado }}'
                                                )"
                                                data-toggle="tooltip" title="Ver detalle">
                                                <i class="feather icon-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="feather icon-inbox f-30 mb-2"></i><br>
                                    No hay solicitudes registradas aún.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Detalle Solicitud -->
<div class="modal fade" id="modal_detalle_solicitud" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"><i class="feather icon-file-text mr-2"></i>Detalle de la solicitud</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered mb-3">
                    <tbody>
                        <tr><th class="bg-light" style="width:40%">Nº Solicitud</th><td id="det_id"></td></tr>
                        <tr><th class="bg-light">Producto</th><td id="det_producto"></td></tr>
                        <tr><th class="bg-light">Tipo pedido</th><td id="det_tipo"></td></tr>
                        <tr><th class="bg-light">Cantidad</th><td id="det_cantidad"></td></tr>
                        <tr><th class="bg-light">Urgencia</th><td id="det_urgencia"></td></tr>
                        <tr><th class="bg-light">Observaciones</th><td id="det_observaciones"></td></tr>
                        <tr><th class="bg-light">Fecha</th><td id="det_fecha"></td></tr>
                        <tr><th class="bg-light">Estado</th><td id="det_estado"></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success d-none" id="btn_procesar_solicitud" onclick="procesar_solicitud()">
                    <i class="feather icon-check mr-1"></i>Marcar como procesada
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal -->

@endsection

@section('page-script')
<script>
    var _solicitudIdActual = null;

    function ver_solicitud(id, producto, tipo, cantidad, urgencia, observaciones, fecha, estado) {
        _solicitudIdActual = id;

        $('#det_id').text('#' + id);
        $('#det_producto').text(producto);
        $('#det_tipo').html(tipo === 'mismo'
            ? '<span class="badge badge-info"><i class="feather icon-refresh-cw mr-1"></i>Repetir último</span>'
            : '<span class="badge badge-success"><i class="feather icon-plus-circle mr-1"></i>Nuevo</span>');
        $('#det_cantidad').text(cantidad !== null ? cantidad : '-');

        var urgenciaClass = urgencia === 'urgente' ? 'badge-warning' : (urgencia === 'critica' ? 'badge-danger' : 'badge-secondary');
        $('#det_urgencia').html('<span class="badge ' + urgenciaClass + '">' + urgencia.charAt(0).toUpperCase() + urgencia.slice(1) + '</span>');

        $('#det_observaciones').text(observaciones || '-');
        $('#det_fecha').text(fecha);

        var estadoClass = estado === 'pendiente' ? 'badge-warning' : (estado === 'procesada' ? 'badge-info' : 'badge-success');
        $('#det_estado').html('<span class="badge ' + estadoClass + '">' + estado.charAt(0).toUpperCase() + estado.slice(1) + '</span>');

        // Mostrar botón procesar solo si está pendiente
        if (estado === 'pendiente') {
            $('#btn_procesar_solicitud').removeClass('d-none');
        } else {
            $('#btn_procesar_solicitud').addClass('d-none');
        }

        $('#modal_detalle_solicitud').modal('show');
    }

    function procesar_solicitud() {
        if (!_solicitudIdActual) return;

        $('#btn_procesar_solicitud').prop('disabled', true).html('<i class="feather icon-loader mr-1"></i>Procesando...');

        $.ajax({
            url: '{{ route("laboratorio.distribucion.solicitudes.procesar") }}',
            type: 'POST',
            data: {
                id: _solicitudIdActual,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                if (resp.mensaje === 'OK') {
                    $('#modal_detalle_solicitud').modal('hide');
                    swal({
                        title: '¡Procesada!',
                        text: 'La solicitud fue marcada como procesada.',
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function() {
                $('#btn_procesar_solicitud').prop('disabled', false).html('<i class="feather icon-check mr-1"></i>Marcar como procesada');
                swal({ title: 'Error', text: 'No se pudo procesar la solicitud.', icon: 'error', button: 'Aceptar' });
            }
        });
    }
</script>
@endsection
