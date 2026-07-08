@extends('template.template_mensajes')
@section('content')

@php
    use Illuminate\Support\Str;

    $mensajesRecibidos = collect($mensajes ?? []);
    $mensajesEnviados  = collect($mensajes_enviados ?? $enviados ?? []);
    $mensajesNoLeidos  = $mensajes_no_leidos ?? $mensajesRecibidos->where('estado', 0)->count();
    $mensajesLeidos    = $mensajesRecibidos->where('estado', 1)->count();
    $totalAdjuntos     = $mensajesRecibidos->filter(function($m) {
        return isset($m->datos_mensaje->archivos) && is_array($m->datos_mensaje->archivos) && count($m->datos_mensaje->archivos) > 0;
    })->count();

    $ticketsAbiertos = isset($tickets) ? collect($tickets)->whereIn('estado', ['abierta','en_progreso'])->count() : 0;
@endphp

<style>
    .msg-kpi-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 6px 18px rgba(20, 35, 80, .08);
        overflow: hidden;
    }

    .msg-kpi-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .msg-shell-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 6px 18px rgba(20, 35, 80, .08);
        overflow: hidden;
    }

    .msg-toolbar {
        border-bottom: 1px solid #eef1f5;
        background: #fff;
    }

    .msg-list-table tbody tr {
        cursor: pointer;
    }

    .msg-list-table tbody tr.table-active td {
        background: #eef7ff !important;
    }

    .msg-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .msg-subject {
        font-weight: 700;
        color: #1f2d3d;
    }

    .msg-preview {
        color: #6c757d;
        font-size: 12px;
        line-height: 1.3;
    }

    .msg-dot-unread {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: #ff4d4f;
        display: inline-block;
        margin-right: 6px;
    }

    .msg-detail-title {
        font-size: 22px;
        font-weight: 700;
        color: #153e90;
        line-height: 1.25;
    }

    .msg-detail-meta {
        background: #f7f9fc;
        border: 1px solid #edf1f7;
        border-radius: 12px;
        padding: 14px;
    }

    .msg-detail-content {
        white-space: pre-wrap;
        color: #3f4d67;
        font-size: 15px;
        line-height: 1.7;
    }

    .msg-empty {
        min-height: 260px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .badge-soft-blue {
        background: #e9f2ff;
        color: #0d6efd;
    }

    .badge-soft-green {
        background: #eaf8f1;
        color: #159957;
    }

    .badge-soft-purple {
        background: #f1eaff;
        color: #7b2cbf;
    }

    .badge-soft-orange {
        background: #fff4e5;
        color: #f59f00;
    }

    @media (max-width: 991px) {
        .msg-detail-panel {
            margin-top: 15px;
        }
    }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h4 class="m-b-10 font-weight-bold text-white">Centro de mensajes</h4>
                            <p class="mb-0 text-white-50">Administre mensajes recibidos, enviados y tickets de soporte.</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-right mt-3 mt-md-0">
                        <a href="{{ route('profesional.home') }}" class="btn btn-light btn-sm">
                            <i class="feather icon-home mr-1"></i> Volver al escritorio
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Resumen superior --}}
        <div class="row mb-3">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card msg-kpi-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="msg-kpi-icon badge-soft-blue mr-3"><i class="feather icon-inbox"></i></div>
                        <div>
                            <div class="text-muted f-12">Recibidos</div>
                            <h4 class="mb-0">{{ $mensajesRecibidos->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card msg-kpi-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="msg-kpi-icon badge-soft-orange mr-3"><i class="feather icon-alert-circle"></i></div>
                        <div>
                            <div class="text-muted f-12">No leídos</div>
                            <h4 class="mb-0">{{ $mensajesNoLeidos }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card msg-kpi-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="msg-kpi-icon badge-soft-green mr-3"><i class="feather icon-send"></i></div>
                        <div>
                            <div class="text-muted f-12">Enviados</div>
                            <h4 class="mb-0">{{ $mensajesEnviados->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card msg-kpi-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="msg-kpi-icon badge-soft-purple mr-3"><i class="feather icon-paperclip"></i></div>
                        <div>
                            <div class="text-muted f-12">Con adjuntos</div>
                            <h4 class="mb-0">{{ $totalAdjuntos }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Bandeja --}}
            <div class="col-sm-12 col-lg-6">
                <div class="card msg-shell-card">
                    <div class="card-header bg-white pb-0">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h5 class="mb-1 font-weight-bold">Bandejas</h5>
                                <small class="text-muted">Seleccione un mensaje para ver el detalle.</small>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 mt-md-0" id="btnNuevoMensaje" disabled title="Pendiente de conectar con backend">
                                <i class="feather icon-edit-2 mr-1"></i> Nuevo mensaje
                            </button>
                        </div>

                        <ul class="nav nav-tabs mt-3" id="tabsMensajeria" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-recibidos-link" data-toggle="tab" href="#tab-recibidos" role="tab">
                                    <i class="feather icon-inbox mr-1"></i> Recibidos
                                    @if($mensajesNoLeidos > 0)
                                        <span class="badge badge-danger ml-1">{{ $mensajesNoLeidos }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-enviados-link" data-toggle="tab" href="#tab-enviados" role="tab">
                                    <i class="feather icon-send mr-1"></i> Enviados
                                    @if($mensajesEnviados->count() > 0)
                                        <span class="badge badge-primary ml-1">{{ $mensajesEnviados->count() }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-adjuntos-link" data-toggle="tab" href="#tab-adjuntos" role="tab">
                                    <i class="feather icon-paperclip mr-1"></i> Adjuntos
                                </a>
                            </li>
                            @if(Auth::user()->hasRole('Administrador-SDI'))
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-tickets-link" data-toggle="tab" href="#tab-tickets" role="tab">
                                        <i class="feather icon-tool mr-1"></i> Tickets
                                        @if($ticketsAbiertos > 0)
                                            <span class="badge badge-warning ml-1">{{ $ticketsAbiertos }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="card-body p-0 tab-content">
                        {{-- Recibidos --}}
                        <div class="tab-pane fade show active p-3" id="tab-recibidos" role="tabpanel">
                            <div class="msg-toolbar mb-3 pb-3">
                                <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-outline-primary filtro-msg active" data-table="tablaRecibidos" data-filter="todos">Todos</button>
                                    <button type="button" class="btn btn-outline-danger filtro-msg" data-table="tablaRecibidos" data-filter="no-leido">No leídos</button>
                                    <button type="button" class="btn btn-outline-secondary filtro-msg" data-table="tablaRecibidos" data-filter="adjunto">Con adjuntos</button>
                                </div>
                            </div>

                            <table id="tablaRecibidos" class="table table-hover msg-list-table w-100">
                                <thead>
                                    <tr>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                        <th class="d-none">Filtro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mensajesRecibidos as $m)
                                        @php
                                            $datos = $m->datos_mensaje ?? null;
                                            $titulo = strtoupper($datos->titulo ?? $datos->asunto ?? 'Sin título');
                                            $texto  = $datos->mensaje ?? 'Sin mensaje';
                                            $tieneAdjuntos = isset($datos->archivos) && is_array($datos->archivos) && count($datos->archivos) > 0;
                                            $esNoLeido = (int)($m->estado ?? 1) === 0;
                                            $emisor = 'Emisor no disponible';

                                            if(isset($m->profesionalEmisor)) {
                                                $emisor = trim(($m->profesionalEmisor->nombre ?? '') . ' ' . ($m->profesionalEmisor->apellido_uno ?? ''));
                                            } elseif(isset($datos->emisor->nombre)) {
                                                $emisor = trim(($datos->emisor->nombre ?? '') . ' ' . ($datos->emisor->apellido_uno ?? ''));
                                            } elseif(isset($datos->emisor->name)) {
                                                $emisor = $datos->emisor->name;
                                            }

                                            $filtros = trim(($esNoLeido ? 'no-leido ' : 'leido ') . ($tieneAdjuntos ? 'adjunto ' : ''));
                                        @endphp
                                        <tr onclick="mostrarMensaje({{ $m->id }}, 'recibido')" id="msg-row-{{ $m->id }}" data-filtro="{{ $filtros }}">
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="msg-avatar mr-3" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Mensaje">
                                                    <div class="media-body" style="min-width:0;">
                                                        <div class="msg-subject text-truncate">
                                                            @if($esNoLeido)<span class="msg-dot-unread"></span>@endif
                                                            {{ $titulo }}
                                                            @if($tieneAdjuntos)<i class="feather icon-paperclip text-muted ml-1"></i>@endif
                                                        </div>
                                                        <div class="msg-preview text-truncate">{{ Str::limit($texto, 80) }}</div>
                                                        <small class="text-primary"><i class="feather icon-user mr-1"></i>{{ $emisor }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="width:110px;">{{ \Carbon\Carbon::parse($m->fecha_envio ?? $m->created_at)->format('d/m/Y') }}</td>
                                            <td class="d-none">{{ $filtros }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Enviados --}}
                        <div class="tab-pane fade p-3" id="tab-enviados" role="tabpanel">
                            @if($mensajesEnviados->isEmpty())
                                <div class="msg-empty">
                                    <div>
                                        <i class="feather icon-send f-40 text-muted"></i>
                                        <p class="text-muted mt-3 mb-1">Aún no hay mensajes enviados disponibles.</p>
                                        <small class="text-muted">Debe enviar desde el backend la variable <code>$mensajes_enviados</code>.</small>
                                    </div>
                                </div>
                            @else
                                <table id="tablaEnviados" class="table table-hover msg-list-table w-100">
                                    <thead>
                                        <tr>
                                            <th>Mensaje enviado</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mensajesEnviados as $m)
                                            @php
                                                $datos = $m->datos_mensaje ?? null;
                                                $titulo = strtoupper($datos->titulo ?? $datos->asunto ?? 'Sin título');
                                                $texto  = $datos->mensaje ?? 'Sin mensaje';
                                                $receptor = $datos->receptor->nombre ?? $datos->destinatario ?? 'Destinatario no disponible';
                                            @endphp
                                            <tr onclick="mostrarMensajeEnviado({{ $m->id }})" id="sent-row-{{ $m->id }}">
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="msg-kpi-icon badge-soft-green mr-3" style="width:44px;height:44px;"><i class="feather icon-send"></i></div>
                                                        <div class="media-body" style="min-width:0;">
                                                            <div class="msg-subject text-truncate">{{ $titulo }}</div>
                                                            <div class="msg-preview text-truncate">{{ Str::limit($texto, 80) }}</div>
                                                            <small class="text-muted"><i class="feather icon-user-check mr-1"></i>Para: {{ $receptor }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width:110px;">{{ \Carbon\Carbon::parse($m->fecha_envio ?? $m->created_at)->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>

                        {{-- Adjuntos --}}
                        <div class="tab-pane fade p-3" id="tab-adjuntos" role="tabpanel">
                            @php
                                $mensajesConAdjuntos = $mensajesRecibidos->filter(function($m) {
                                    return isset($m->datos_mensaje->archivos) && is_array($m->datos_mensaje->archivos) && count($m->datos_mensaje->archivos) > 0;
                                });
                            @endphp

                            @if($mensajesConAdjuntos->isEmpty())
                                <div class="msg-empty">
                                    <div>
                                        <i class="feather icon-paperclip f-40 text-muted"></i>
                                        <p class="text-muted mt-3 mb-1">No hay mensajes con archivos adjuntos.</p>
                                        <small class="text-muted">Cuando existan documentos, aparecerán aquí.</small>
                                    </div>
                                </div>
                            @else
                                @foreach($mensajesConAdjuntos as $m)
                                    @php $datos = $m->datos_mensaje; @endphp
                                    <div class="border rounded p-3 mb-2" onclick="mostrarMensaje({{ $m->id }}, 'recibido')" style="cursor:pointer;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong>{{ strtoupper($datos->titulo ?? 'Sin título') }}</strong>
                                            <span class="badge badge-primary"><i class="feather icon-paperclip"></i> {{ count($datos->archivos) }}</span>
                                        </div>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($m->fecha_envio ?? $m->created_at)->format('d/m/Y') }}</small>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- Tickets --}}
                        @if(Auth::user()->hasRole('Administrador-SDI'))
                            <div class="tab-pane fade p-3" id="tab-tickets" role="tabpanel">
                                @php
                                    $mapPrioridad = ['baja'=>'badge-secondary','media'=>'badge-warning','alta'=>'badge-danger','urgente'=>'badge-dark'];
                                    $mapEstado    = ['abierta'=>'badge-success','en_progreso'=>'badge-info','resuelta'=>'badge-primary','cerrada'=>'badge-secondary'];
                                @endphp
                                @if(!isset($tickets) || collect($tickets)->isEmpty())
                                    <div class="msg-empty">
                                        <div>
                                            <i class="feather icon-tool f-40 text-muted"></i>
                                            <p class="text-muted mt-3 mb-1">No tienes tickets de soporte.</p>
                                            <small class="text-muted">Los reportes de fallas aparecerán aquí.</small>
                                        </div>
                                    </div>
                                @else
                                    @foreach($tickets as $ticket)
                                        <div class="ticket-item py-2 px-2 rounded mb-2"
                                             onclick="mostrarTicket({{ $ticket->id }})"
                                             id="ticket-row-{{ $ticket->id }}"
                                             style="cursor:pointer; border:1px solid #dee2e6; transition:background .15s;">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div style="min-width:0;">
                                                    <code style="font-size:10px; color:#6c757d;">{{ $ticket->numero_ticket }}</code>
                                                    <div class="font-weight-bold text-truncate" style="font-size:13px; max-width:280px;">
                                                        {{ $ticket->asunto }}
                                                    </div>
                                                    <small class="text-muted">
                                                        <i class="feather icon-message-circle mr-1"></i>{{ $ticket->respuestas_count }} resp.
                                                        &nbsp;·&nbsp;
                                                        {{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') }}
                                                    </small>
                                                </div>
                                                <div class="d-flex flex-column align-items-end ml-2" style="gap:3px;flex-shrink:0;">
                                                    <span class="badge {{ $mapEstado[$ticket->estado] ?? 'badge-light' }}" style="font-size:10px;">
                                                        {{ ucfirst(str_replace('_',' ',$ticket->estado)) }}
                                                    </span>
                                                    <span class="badge {{ $mapPrioridad[$ticket->prioridad] ?? 'badge-light' }}" style="font-size:10px;">
                                                        {{ ucfirst($ticket->prioridad) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Detalle --}}
            <div class="col-sm-12 col-lg-6 msg-detail-panel">
                <div id="panel-mensaje" class="card msg-shell-card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 font-weight-bold">Detalle del mensaje</h5>
                            <small class="text-muted" id="detalle_subtitulo">Seleccione un mensaje para revisar la información completa.</small>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-primary" id="btnResponder" disabled title="Pendiente de conectar con backend">
                                <i class="feather icon-corner-up-left"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="btnReenviar" disabled title="Pendiente de conectar con backend">
                                <i class="feather icon-share-2"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger" id="btnEliminar" disabled title="Pendiente de conectar con backend">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="detalle_mensaje_body">
                        @if($mensaje)
                            <div class="media align-items-center mb-3">
                                <img class="msg-avatar mr-3" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Emisor">
                                <div class="media-body">
                                    <div class="text-muted f-12">De</div>
                                    <h5 class="mb-0 text-c-blue" id="nombre_emisor">
                                        {{ $mensaje->emisor->nombre ?? '' }} {{ $mensaje->emisor->apellido_uno ?? '' }}
                                    </h5>
                                </div>
                            </div>

                            <h4 class="msg-detail-title text-uppercase" id="asunto_mensaje">{{ $mensaje->asunto ?? 'Sin asunto' }}</h4>

                            <div class="msg-detail-meta my-3">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <small class="text-muted d-block">Tipo</small>
                                        <span class="badge badge-soft-blue">Recibido</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <small class="text-muted d-block">Fecha</small>
                                        <strong id="fecha_mensaje">{{ isset($mensaje->fecha_envio) ? \Carbon\Carbon::parse($mensaje->fecha_envio)->format('d/m/Y H:i') : '-' }}</strong>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <small class="text-muted d-block">Estado</small>
                                        <span class="badge badge-success" id="estado_mensaje">Leído</span>
                                    </div>
                                </div>
                            </div>

                            <div class="msg-detail-content" id="contenido_mensaje">{{ $mensaje->mensaje ?? 'Sin mensaje' }}</div>
                            <div id="archivos_adjuntos" class="mt-3">
                                @if(isset($mensaje->archivos) && is_array($mensaje->archivos) && count($mensaje->archivos) > 0)
                                    <hr>
                                    <div class="mb-2"><strong><i class="feather icon-paperclip"></i> Archivos adjuntos ({{ count($mensaje->archivos) }})</strong></div>
                                    <div class="list-group">
                                        @foreach($mensaje->archivos as $archivo)
                                            <a href="{{ $archivo->url }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" download>
                                                <span><i class="feather icon-file"></i> {{ $archivo->nombre_original ?? $archivo->nombre_archivo }}</span>
                                                <span class="badge badge-primary badge-pill"><i class="feather icon-download"></i> Descargar</span>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="msg-empty">
                                <div>
                                    <i class="feather icon-inbox f-40 text-muted"></i>
                                    <p class="text-muted mt-3 mb-1">No hay mensajes para mostrar.</p>
                                    <small class="text-muted">Seleccione un mensaje de la bandeja para verlo aquí.</small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div id="panel-ticket" class="card msg-shell-card" style="display:none;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 text-danger">Ticket de soporte</h5>
                            <small class="text-muted" id="ticket-numero"></small>
                        </div>
                        <a id="ticket-link-detalle" href="#" target="_blank" class="btn btn-sm btn-outline-danger">
                            <i class="feather icon-external-link mr-1"></i>Ver conversación
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap mb-3" style="gap:6px;" id="ticket-badges"></div>
                        <h5 class="font-weight-bold" id="ticket-asunto"></h5>
                        <p class="text-muted" id="ticket-descripcion" style="white-space:pre-wrap;font-size:14px;"></p>
                        <hr>
                        <div class="row text-center" style="font-size:12px;">
                            <div class="col-4">
                                <div class="text-muted">Tipo</div>
                                <strong id="ticket-tipo"></strong>
                            </div>
                            <div class="col-4">
                                <div class="text-muted">Respuestas</div>
                                <strong id="ticket-respuestas"></strong>
                            </div>
                            <div class="col-4">
                                <div class="text-muted">Fecha</div>
                                <strong id="ticket-fecha"></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    const mensajesRecibidos = @json($mensajesRecibidos->values());
    const mensajesEnviados  = @json($mensajesEnviados->values());

    $(document).ready(function() {
        inicializarTablaMensajes('#tablaRecibidos');
        inicializarTablaMensajes('#tablaEnviados');
    });

    function inicializarTablaMensajes(selector) {
        if (!$(selector).length) return;

        $(selector).DataTable({
            paging: true,
            pageLength: 6,
            lengthChange: false,
            searching: true,
            ordering: false,
            info: false,
            autoWidth: false,
            language: {
                search: "Buscar:",
                paginate: { previous: "Anterior", next: "Siguiente" },
                zeroRecords: "No se encontraron mensajes"
            }
        });
    }

    $('.filtro-msg').on('click', function() {
        const tableId = $(this).data('table');
        const filtro  = $(this).data('filter');

        $('.filtro-msg[data-table="' + tableId + '"]').removeClass('active');
        $(this).addClass('active');

        const tabla = $('#' + tableId).DataTable();

        if (filtro === 'todos') {
            tabla.column(2).search('').draw();
        } else {
            tabla.column(2).search(filtro).draw();
        }
    });

    $('#tab-recibidos-link, #tab-enviados-link, #tab-adjuntos-link').on('shown.bs.tab', function () {
        window._ticketActivo = false;
        $('#panel-ticket').hide();
        $('#panel-mensaje').show();
    });

    function mostrarMensaje(id, tipo = 'recibido') {
        window._ticketActivo = false;
        $('#panel-ticket').hide();
        $('#panel-mensaje').show();

        $('.msg-list-table tbody tr').removeClass('table-active');
        $('#msg-row-' + id).addClass('table-active');

        $.ajax({
            url: '{{ route("profesional.mensaje.json", ["id" => "__ID__"]) }}'.replace('__ID__', id),
            type: 'GET',
            dataType: 'json',
            success: function(mensaje) {
                renderDetalleMensaje(mensaje, 'recibido');

                // El mensaje fue marcado como leído en backend; quitamos visualmente el punto rojo.
                $('#msg-row-' + id).find('.msg-dot-unread').remove();
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el mensaje:', error);
                swal({ title: 'Error', text: 'No se pudo cargar el mensaje.', icon: 'error' });
            }
        });
    }

    function mostrarMensajeEnviado(id) {
        $('.msg-list-table tbody tr').removeClass('table-active');
        $('#sent-row-' + id).addClass('table-active');
        $('#panel-ticket').hide();
        $('#panel-mensaje').show();

        const mensaje = mensajesEnviados.find(m => Number(m.id) === Number(id));

        if (!mensaje) {
            swal({ title: 'Mensaje no disponible', text: 'No se encontró el mensaje enviado en la vista.', icon: 'warning' });
            return;
        }

        const datos = mensaje.datos_mensaje || {};
        renderDetalleMensaje({
            asunto: datos.asunto || datos.titulo || 'Sin asunto',
            mensaje: datos.mensaje || 'Sin contenido',
            fecha_envio: mensaje.fecha_envio || mensaje.created_at,
            emisor: datos.emisor || { name: 'Usted' },
            receptor: datos.receptor || { name: datos.destinatario || 'Destinatario no disponible' },
            archivos: datos.archivos || []
        }, 'enviado');
    }

    function renderDetalleMensaje(mensaje, tipo) {
        let nombreEmisor = 'Desconocido';
        let nombreReceptor = 'No disponible';

        if (mensaje.emisor) {
            if (mensaje.emisor.nombre) {
                nombreEmisor = (mensaje.emisor.nombre || '') + ' ' + (mensaje.emisor.apellido_uno || '') + ' ' + (mensaje.emisor.apellido_dos || '');
            } else if (mensaje.emisor.name) {
                nombreEmisor = mensaje.emisor.name;
            }
        }

        if (mensaje.receptor) {
            if (mensaje.receptor.nombre) {
                nombreReceptor = (mensaje.receptor.nombre || '') + ' ' + (mensaje.receptor.apellido_uno || '') + ' ' + (mensaje.receptor.apellido_dos || '');
            } else if (mensaje.receptor.name) {
                nombreReceptor = mensaje.receptor.name;
            }
        }

        const fecha = mensaje.fecha_envio ? new Date(mensaje.fecha_envio).toLocaleString('es-CL') : '-';
        const asunto = mensaje.asunto || mensaje.titulo || 'Sin asunto';
        const contenido = mensaje.mensaje || 'Sin contenido';
        const tipoBadge = tipo === 'enviado'
            ? '<span class="badge badge-soft-green">Enviado</span>'
            : '<span class="badge badge-soft-blue">Recibido</span>';

        let html = `
            <div class="media align-items-center mb-3">
                <img class="msg-avatar mr-3" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Emisor">
                <div class="media-body">
                    <div class="text-muted f-12">${tipo === 'enviado' ? 'Para' : 'De'}</div>
                    <h5 class="mb-0 text-c-blue">${escapeHtml(tipo === 'enviado' ? nombreReceptor : nombreEmisor)}</h5>
                </div>
            </div>

            <h4 class="msg-detail-title text-uppercase">${escapeHtml(asunto)}</h4>

            <div class="msg-detail-meta my-3">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <small class="text-muted d-block">Tipo</small>
                        ${tipoBadge}
                    </div>
                    <div class="col-md-4 mb-2">
                        <small class="text-muted d-block">Fecha</small>
                        <strong>${fecha}</strong>
                    </div>
                    <div class="col-md-4 mb-2">
                        <small class="text-muted d-block">Estado</small>
                        <span class="badge badge-success">${tipo === 'enviado' ? 'Enviado' : 'Leído'}</span>
                    </div>
                </div>
            </div>

            <div class="msg-detail-content">${escapeHtml(contenido)}</div>
            <div class="mt-3" id="archivos_adjuntos_render"></div>
        `;

        $('#detalle_mensaje_body').html(html);
        $('#detalle_subtitulo').text(tipo === 'enviado' ? 'Mensaje enviado por usted.' : 'Mensaje recibido en su bandeja.');

        renderAdjuntos(mensaje.archivos || []);
    }

    function renderAdjuntos(archivos) {
        if (!archivos || archivos.length === 0) {
            $('#archivos_adjuntos_render').html('');
            return;
        }

        let html = '<hr><div class="mb-2"><strong><i class="feather icon-paperclip"></i> Archivos adjuntos (' + archivos.length + ')</strong></div><div class="list-group">';

        archivos.forEach(function(archivo) {
            html += '<a href="' + escapeHtml(archivo.url || '#') + '" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" download>';
            html += '<span><i class="feather icon-file"></i> ' + escapeHtml(archivo.nombre_original || archivo.nombre_archivo || 'Archivo') + '</span>';
            html += '<span class="badge badge-primary badge-pill"><i class="feather icon-download"></i> Descargar</span>';
            html += '</a>';
        });

        html += '</div>';
        $('#archivos_adjuntos_render').html(html);
    }

    const mapPrioridad = { baja:'badge-secondary', media:'badge-warning', alta:'badge-danger', urgente:'badge-dark' };
    const mapEstado    = { abierta:'badge-success', en_progreso:'badge-info', resuelta:'badge-primary', cerrada:'badge-secondary' };

    function mostrarTicket(id) {
        window._ticketActivo = true;
        $('#panel-mensaje').hide();
        $('#panel-ticket').show();

        $('.ticket-item').css({'background':'', 'border-color':'#dee2e6'});
        $('#ticket-row-' + id).css({'background':'#fff5f5', 'border-color':'#dc3545'});

        $.ajax({
            url: '{{ route("profesional.ticket.json", ["id" => "__ID__"]) }}'.replace('__ID__', id),
            type: 'GET',
            dataType: 'json',
            success: function(t) {
                $('#ticket-numero').text(t.numero_ticket);
                $('#ticket-asunto').text(t.asunto);
                $('#ticket-descripcion').text(t.descripcion);
                $('#ticket-tipo').text((t.tipo_solicitud || '').replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase()));
                $('#ticket-respuestas').text(t.respuestas_count);
                $('#ticket-fecha').text(new Date(t.created_at).toLocaleDateString('es-CL'));
                $('#ticket-link-detalle').attr('href', t.url_detalle);

                let badges =
                    '<span class="badge ' + (mapEstado[t.estado] || 'badge-light') + '">' + String(t.estado || '').replace(/_/g, ' ') + '</span>' +
                    '<span class="badge ' + (mapPrioridad[t.prioridad] || 'badge-light') + '">Prioridad: ' + (t.prioridad || '-') + '</span>';
                $('#ticket-badges').html(badges);
            },
            error: function() {
                swal({ title: 'Error', text: 'No se pudo cargar el ticket.', icon: 'error' });
            }
        });
    }

    function escapeHtml(text) {
        if (text === null || text === undefined) return '';
        return String(text)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }
</script>
@endsection
