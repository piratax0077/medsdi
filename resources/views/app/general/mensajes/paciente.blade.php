@extends('template.paciente.template')
@section('content')
<style>
    .msg-page-wrap {
        max-width: 1280px;
        margin: 0 auto;
    }

    .msg-hero {
        border-radius: 18px;
        background: linear-gradient(135deg, #1f8efa 0%, #35b8e0 100%);
        color: #fff;
        padding: 22px 24px;
        box-shadow: 0 12px 30px rgba(31, 142, 250, .18);
        margin-bottom: 18px;
    }

    .msg-hero h4 {
        margin-bottom: 4px;
        font-weight: 700;
    }

    .msg-stat-card {
        border: 1px solid #e9eef5;
        border-radius: 16px;
        background: #fff;
        padding: 16px;
        min-height: 92px;
        box-shadow: 0 8px 20px rgba(35, 45, 65, .04);
    }

    .msg-stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-right: 10px;
    }

    .msg-stat-icon.blue { background: #eef7ff; color: #1f8efa; }
    .msg-stat-icon.red { background: #fff1f1; color: #dc3545; }
    .msg-stat-icon.green { background: #effaf3; color: #28a745; }

    .msg-panel {
        border: 1px solid #e9eef5;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 24px rgba(35, 45, 65, .04);
        overflow: hidden;
    }

    .msg-panel-header {
        padding: 16px 18px;
        border-bottom: 1px solid #eef2f7;
        background: #fbfcfe;
    }

    .msg-list {
        max-height: 690px;
        overflow-y: auto;
    }

    .msg-item {
        padding: 14px 16px;
        border-bottom: 1px solid #eef2f7;
        cursor: pointer;
        transition: all .15s ease-in-out;
        color: inherit;
        display: block;
        text-decoration: none !important;
    }

    .msg-item:hover {
        background: #f8fbff;
    }

    .msg-item.active {
        background: #eef7ff;
        border-left: 4px solid #1f8efa;
    }

    .msg-item.unread .msg-title {
        font-weight: 800;
    }

    .msg-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        background: #ced4da;
        margin-right: 6px;
    }

    .msg-dot.unread {
        background: #dc3545;
    }

    .msg-title {
        color: #253858;
        font-size: 14px;
        margin-bottom: 3px;
    }

    .msg-preview {
        color: #6c757d;
        font-size: 12px;
        line-height: 1.35;
    }

    .msg-detail-empty {
        min-height: 520px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #6c757d;
        padding: 40px;
    }

    .msg-detail-body {
        padding: 22px;
    }

    .msg-meta-box {
        background: #f8fbfd;
        border: 1px solid #e9eef5;
        border-radius: 14px;
        padding: 14px 16px;
        margin-bottom: 18px;
    }

    .msg-content {
        white-space: pre-wrap;
        font-size: 14px;
        line-height: 1.7;
        color: #263238;
    }

    .msg-badge-soft {
        border-radius: 50px;
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 700;
    }

    .msg-badge-direct { background: #eef7ff; color: #1f8efa; }
    .msg-badge-difusion { background: #fff8e6; color: #b7791f; }
    .msg-badge-read { background: #effaf3; color: #28a745; }
    .msg-badge-unread { background: #fff1f1; color: #dc3545; }

    .attachment-card {
        border: 1px solid #e9eef5;
        border-radius: 12px;
        padding: 10px 12px;
        margin-bottom: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }

    .msg-search-input {
        border-radius: 50px;
        padding-left: 38px;
    }

    .msg-search-wrap {
        position: relative;
    }

    .msg-search-wrap i {
        position: absolute;
        left: 14px;
        top: 10px;
        color: #8a98a8;
    }

    @media (max-width: 991px) {
        .msg-list {
            max-height: 420px;
            margin-bottom: 18px;
        }
    }
</style>

@php
    $coleccionMensajes = collect($mensajes ?? []);
    $mensajesNoLeidos = isset($mensajes_no_leidos)
        ? (int) $mensajes_no_leidos
        : $coleccionMensajes->where('estado', 0)->count();

    $totalMensajes = $coleccionMensajes->count();
    $mensajesLeidos = $coleccionMensajes->where('estado', 1)->count();

    $mensajeActual = $mensaje ?? null;

    $asuntoActual = $mensajeActual->asunto ?? $mensajeActual->titulo ?? 'Seleccione un mensaje';
    $contenidoActual = $mensajeActual->mensaje ?? null;
    $fechaActual = $mensajeActual->fecha_envio ?? null;
    $emisorActual = $mensajeActual->emisor ?? null;
    $archivosActuales = $mensajeActual->archivos ?? [];
    $tipoEnvioActual = $mensajeActual->tipo_envio ?? null;
@endphp

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="msg-page-wrap">

            <div class="page-header mb-3">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb mb-0 pt-3">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mis mensajes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="msg-hero">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4><i class="feather icon-mail mr-1"></i> Centro de mensajes</h4>
                        <div>Revise aquí los mensajes enviados por sus profesionales o el centro médico.</div>
                    </div>
                    <div class="col-md-4 text-md-right mt-3 mt-md-0">
                        @if($mensajesNoLeidos > 0)
                            <span class="badge badge-danger p-2">{{ $mensajesNoLeidos }} sin leer</span>
                        @else
                            <span class="badge badge-light p-2">Sin mensajes pendientes</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12 col-md-4 mb-3 mb-md-0">
                    <div class="msg-stat-card">
                        <div class="d-flex align-items-center">
                            <span class="msg-stat-icon red"><i class="feather icon-bell"></i></span>
                            <div>
                                <div class="text-muted small">Sin leer</div>
                                <h4 class="mb-0">{{ $mensajesNoLeidos }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3 mb-md-0">
                    <div class="msg-stat-card">
                        <div class="d-flex align-items-center">
                            <span class="msg-stat-icon blue"><i class="feather icon-inbox"></i></span>
                            <div>
                                <div class="text-muted small">Total mensajes</div>
                                <h4 class="mb-0">{{ $totalMensajes }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="msg-stat-card">
                        <div class="d-flex align-items-center">
                            <span class="msg-stat-icon green"><i class="feather icon-check-circle"></i></span>
                            <div>
                                <div class="text-muted small">Leídos</div>
                                <h4 class="mb-0">{{ $mensajesLeidos }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 col-xl-4 mb-3 mb-lg-0">
                    <div class="msg-panel">
                        <div class="msg-panel-header">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="feather icon-inbox mr-1"></i> Bandeja</h5>
                                <span class="badge badge-light">{{ $totalMensajes }}</span>
                            </div>

                            <div class="msg-search-wrap">
                                <i class="feather icon-search"></i>
                                <input type="text" id="buscarMensajePaciente" class="form-control form-control-sm msg-search-input" placeholder="Buscar por asunto o contenido...">
                            </div>

                            <div class="mt-3 d-flex flex-wrap" style="gap:6px;">
                                <button type="button" class="btn btn-sm btn-info filtro-mensaje" data-filtro="todos">Todos</button>
                                <button type="button" class="btn btn-sm btn-light filtro-mensaje" data-filtro="no_leidos">No leídos</button>
                                <button type="button" class="btn btn-sm btn-light filtro-mensaje" data-filtro="adjuntos">Con adjuntos</button>
                            </div>
                        </div>

                        <div class="msg-list" id="listaMensajesPaciente">
                            @forelse($coleccionMensajes as $m)
                                @php
                                    $datos = is_string($m->datos_mensaje ?? null) ? json_decode($m->datos_mensaje) : ($m->datos_mensaje ?? null);
                                    $titulo = $datos->asunto ?? $datos->titulo ?? 'Sin asunto';
                                    $texto = $datos->mensaje ?? 'Sin contenido';
                                    $archivos = $datos->archivos ?? [];
                                    $tieneAdjuntos = is_array($archivos) && count($archivos) > 0;
                                    $esNoLeido = (int)($m->estado ?? 1) === 0;
                                    $tipoMensaje = (int)($m->tipo_mensaje ?? 0);
                                    $esDifusion = $tipoMensaje === 4 || (($datos->tipo_envio ?? '') === 'difusion_pacientes');
                                    $urlMensaje = route('paciente.mensaje', ['id' => $m->id]);
                                @endphp

                                <a href="{{ $urlMensaje }}"
                                   class="msg-item {{ isset($id) && $id == $m->id ? 'active' : '' }} {{ $esNoLeido ? 'unread' : '' }}"
                                   data-estado="{{ $esNoLeido ? 'no_leido' : 'leido' }}"
                                   data-adjuntos="{{ $tieneAdjuntos ? '1' : '0' }}"
                                   data-search="{{ strtolower($titulo . ' ' . $texto) }}">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div style="min-width:0;">
                                            <div class="msg-title text-truncate">
                                                <span class="msg-dot {{ $esNoLeido ? 'unread' : '' }}"></span>
                                                {{ $titulo }}
                                            </div>
                                            <div class="msg-preview">
                                                {{ Str::limit($texto, 85) }}
                                            </div>
                                            <div class="mt-2">
                                                @if($esDifusion)
                                                    <span class="msg-badge-soft msg-badge-difusion"><i class="feather icon-radio mr-1"></i>Difusión</span>
                                                @else
                                                    <span class="msg-badge-soft msg-badge-direct"><i class="feather icon-user mr-1"></i>Personal</span>
                                                @endif

                                                @if($tieneAdjuntos)
                                                    <span class="badge badge-light"><i class="feather icon-paperclip"></i> {{ count($archivos) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <small class="text-muted ml-2" style="white-space:nowrap;">
                                            {{ !empty($m->fecha_envio) ? \Carbon\Carbon::parse($m->fecha_envio)->format('d/m/Y') : '' }}
                                        </small>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-5 px-3 text-muted">
                                    <i class="feather icon-inbox f-40"></i>
                                    <p class="mt-3 mb-1">No tiene mensajes.</p>
                                    <small>Cuando un profesional le envíe un mensaje, aparecerá aquí.</small>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-xl-8">
                    <div class="msg-panel">
                        @if($mensajeActual)
                            <div class="msg-panel-header">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="mb-1 text-c-blue">{{ $asuntoActual }}</h5>
                                        <small class="text-muted">
                                            {{ $fechaActual ? \Carbon\Carbon::parse($fechaActual)->format('d/m/Y H:i') : 'Fecha no disponible' }}
                                        </small>
                                    </div>
                                    <div class="text-right">
                                        @if(($tipoEnvioActual ?? '') === 'difusion_pacientes')
                                            <span class="msg-badge-soft msg-badge-difusion"><i class="feather icon-radio mr-1"></i>Difusión</span>
                                        @else
                                            <span class="msg-badge-soft msg-badge-direct"><i class="feather icon-user mr-1"></i>Mensaje personal</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="msg-detail-body">
                                <div class="msg-meta-box">
                                    <div class="row">
                                        <div class="col-md-6 mb-2 mb-md-0">
                                            <small class="text-muted d-block">De</small>
                                            <strong>
                                                @if($emisorActual)
                                                    {{ $emisorActual->nombre ?? $emisorActual->name ?? 'Profesional' }}
                                                    {{ $emisorActual->apellido_uno ?? '' }}
                                                    {{ $emisorActual->apellido_dos ?? '' }}
                                                @else
                                                    {{ $mensajeActual->profesional_nombre ?? 'Centro médico' }}
                                                @endif
                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted d-block">Estado</small>
                                            <span class="msg-badge-soft msg-badge-read"><i class="feather icon-check-circle mr-1"></i>Leído</span>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="font-weight-bold mb-3">Mensaje</h6>
                                <div class="msg-content mb-4">{{ $contenidoActual ?? 'Sin contenido.' }}</div>

                                @if(is_array($archivosActuales) && count($archivosActuales) > 0)
                                    <hr>
                                    <h6 class="font-weight-bold mb-3"><i class="feather icon-paperclip mr-1"></i> Adjuntos</h6>
                                    @foreach($archivosActuales as $archivo)
                                        @php
                                            $nombreArchivo = $archivo->nombre_original ?? $archivo->nombre_archivo ?? 'Archivo adjunto';
                                            $urlArchivo = $archivo->url ?? '#';
                                        @endphp
                                        <div class="attachment-card">
                                            <span><i class="feather icon-file mr-1"></i> {{ $nombreArchivo }}</span>
                                            <a href="{{ $urlArchivo }}" target="_blank" class="btn btn-sm btn-outline-info">
                                                <i class="feather icon-download"></i> Descargar
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @else
                            <div class="msg-detail-empty">
                                <div>
                                    <i class="feather icon-mail f-50 text-muted"></i>
                                    <h5 class="mt-3">Seleccione un mensaje</h5>
                                    <p class="mb-0">El detalle del mensaje se mostrará en este panel.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    $(document).ready(function () {
        let filtroActual = 'todos';

        function aplicarFiltrosMensajesPaciente() {
            let texto = ($('#buscarMensajePaciente').val() || '').toLowerCase().trim();

            $('#listaMensajesPaciente .msg-item').each(function () {
                let $item = $(this);
                let contenido = ($item.data('search') || '').toString();
                let estado = $item.data('estado');
                let adjuntos = $item.data('adjuntos').toString();

                let coincideTexto = !texto || contenido.indexOf(texto) !== -1;
                let coincideFiltro = true;

                if (filtroActual === 'no_leidos') {
                    coincideFiltro = estado === 'no_leido';
                }

                if (filtroActual === 'adjuntos') {
                    coincideFiltro = adjuntos === '1';
                }

                $item.toggle(coincideTexto && coincideFiltro);
            });
        }

        $('#buscarMensajePaciente').on('keyup', aplicarFiltrosMensajesPaciente);

        $('.filtro-mensaje').on('click', function () {
            filtroActual = $(this).data('filtro');
            $('.filtro-mensaje').removeClass('btn-info').addClass('btn-light');
            $(this).removeClass('btn-light').addClass('btn-info');
            aplicarFiltrosMensajesPaciente();
        });
    });
</script>
@endsection
