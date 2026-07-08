@extends('template.administracion.template')
@section('content')

<style>
    .ticket-thread { position: relative; }
    .ticket-thread::before {
        content: '';
        position: absolute;
        left: 24px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
        z-index: 0;
    }
    .thread-item {
        position: relative;
        z-index: 1;
        margin-bottom: 1.5rem;
    }
    .thread-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        font-weight: bold;
        flex-shrink: 0;
    }
    .thread-bubble {
        flex: 1;
        border-radius: 8px;
        padding: 14px 16px;
        margin-left: 12px;
        border: 1px solid #dee2e6;
        background: #fff;
    }
    .thread-bubble.is-original { background: #f8f9fa; border-color: #ced4da; }
    .thread-bubble.is-admin    { background: #f0f7ff; border-color: #b8d4f8; }
    .estado-cambio {
        display: inline-block;
        font-size: 11px;
        background: #fff3cd;
        border: 1px solid #ffc107;
        border-radius: 20px;
        padding: 2px 10px;
        margin-top: 6px;
    }
    .archivo-adjunto {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #f1f3f5;
        border-radius: 4px;
        padding: 3px 8px;
        font-size: 12px;
        text-decoration: none;
        color: #495057;
        margin: 2px;
        border: 1px solid #dee2e6;
    }
    .archivo-adjunto:hover { background: #e9ecef; color: #212529; }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-content">

        {{-- Breadcrumb --}}
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">
                                <a href="{{ route('administracion.tickets') }}" class="text-muted mr-2">
                                    <i class="feather icon-arrow-left"></i>
                                </a>
                                Ticket: <code>{{ $ticket->numero_ticket }}</code>
                            </h5>
                        </div>
                        <ul class="breadcrumb mb-3">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('administracion.ventas') }}">Ventas</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('administracion.tickets') }}">Tickets</a></li>
                            <li class="breadcrumb-item active">{{ Str::limit($ticket->asunto, 40) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="feather icon-check-circle mr-1"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
        @endif

        {{-- Cabecera del ticket --}}
        @php
            $mapPrioridad = ['baja'=>'badge-secondary','media'=>'badge-warning','alta'=>'badge-danger','urgente'=>'badge-dark'];
            $mapEstado    = ['abierta'=>'badge-success','en_progreso'=>'badge-info','resuelta'=>'badge-primary','cerrada'=>'badge-secondary'];
            $colEstado    = ['abierta'=>'#28a745','en_progreso'=>'#17a2b8','resuelta'=>'#007bff','cerrada'=>'#6c757d'];
            $badgePrioridad = $mapPrioridad[$ticket->prioridad] ?? 'badge-light';
            $badgeEstado    = $mapEstado[$ticket->estado]       ?? 'badge-light';
        @endphp
        <div class="card mb-3" style="border-top: 4px solid {{ $colEstado[$ticket->estado] ?? '#6c757d' }};">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-wrap" style="gap:8px;">
                    <div>
                        <h5 class="font-weight-bold mb-1">{{ $ticket->asunto }}</h5>
                        <div class="d-flex flex-wrap" style="gap:6px; margin-bottom:6px;">
                            <span class="badge {{ $badgeEstado }}">{{ ucfirst(str_replace('_',' ',$ticket->estado)) }}</span>
                            <span class="badge {{ $badgePrioridad }}">Prioridad: {{ ucfirst($ticket->prioridad) }}</span>
                            <span class="badge badge-light border">{{ ucwords(str_replace('_',' ',$ticket->tipo_solicitud)) }}</span>
                        </div>
                        <small class="text-muted">
                            <i class="feather icon-user mr-1"></i>
                            Reportado por: <strong>{{ $ticket->usuario ? $ticket->usuario->name : 'Sin usuario' }}</strong>
                            &nbsp;·&nbsp;
                            <i class="feather icon-calendar mr-1"></i>
                            {{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}
                        </small>
                    </div>
                    <div>
                        <span class="badge badge-light border" style="font-size:12px;">
                            <i class="feather icon-message-circle mr-1"></i>
                            {{ $ticket->respuestas->count() }} respuesta(s)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Hilo de conversación --}}
            <div class="col-lg-8">
                <div class="ticket-thread">

                    {{-- Mensaje original --}}
                    <div class="thread-item d-flex">
                        <div class="thread-avatar bg-secondary text-white">
                            {{ strtoupper(substr($ticket->usuario ? $ticket->usuario->name : 'U', 0, 1)) }}
                        </div>
                        <div class="thread-bubble is-original">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong style="font-size:14px;">
                                    {{ $ticket->usuario ? $ticket->usuario->name : 'Usuario' }}
                                </strong>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}
                                    &nbsp;<span class="badge badge-light border">Ticket original</span>
                                </small>
                            </div>
                            <p style="font-size:14px; white-space:pre-wrap; margin-bottom: 8px;">{{ $ticket->descripcion }}</p>

                            {{-- Archivos del ticket original --}}
                            @if($ticket->archivos->count())
                                <div class="mt-2">
                                    <small class="text-muted"><i class="feather icon-paperclip mr-1"></i>Adjuntos:</small><br>
                                    @foreach($ticket->archivos as $arch)
                                        <a class="archivo-adjunto" href="{{ Storage::url($arch->ruta) }}" target="_blank">
                                            <i class="feather icon-file mr-1"></i>{{ $arch->nombre_original }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Respuestas --}}
                    @foreach($ticket->respuestas as $resp)
                        @php
                            $esAdmin = $resp->usuario && in_array('Admin', $resp->usuario->getRoleNames()->toArray()) || ($resp->usuario && str_contains(strtolower($resp->usuario->name ?? ''), 'admin'));
                            $inicial  = strtoupper(substr($resp->usuario ? $resp->usuario->name : 'R', 0, 1));
                        @endphp
                        <div class="thread-item d-flex">
                            <div class="thread-avatar {{ $esAdmin ? 'bg-primary' : 'bg-info' }} text-white">
                                {{ $inicial }}
                            </div>
                            <div class="thread-bubble {{ $esAdmin ? 'is-admin' : '' }}">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong style="font-size:14px;">
                                        {{ $resp->usuario ? $resp->usuario->name : 'Usuario' }}
                                        @if($esAdmin)
                                            <span class="badge badge-primary ml-1" style="font-size:10px;">Admin</span>
                                        @endif
                                    </strong>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($resp->created_at)->format('d/m/Y H:i') }}
                                    </small>
                                </div>
                                <p style="font-size:14px; white-space:pre-wrap; margin-bottom: 8px;">{{ $resp->contenido }}</p>

                                @if($resp->estado_nuevo)
                                    <div class="estado-cambio">
                                        <i class="feather icon-refresh-cw mr-1"></i>
                                        Estado cambiado a: <strong>{{ ucfirst(str_replace('_',' ',$resp->estado_nuevo)) }}</strong>
                                    </div>
                                @endif

                                @if($resp->archivos->count())
                                    <div class="mt-2">
                                        <small class="text-muted"><i class="feather icon-paperclip mr-1"></i>Adjuntos:</small><br>
                                        @foreach($resp->archivos as $arch)
                                            <a class="archivo-adjunto" href="{{ Storage::url($arch->ruta) }}" target="_blank">
                                                <i class="feather icon-file mr-1"></i>{{ $arch->nombre_original }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>{{-- /ticket-thread --}}

                {{-- Formulario de respuesta --}}
                @if(!in_array($ticket->estado, ['cerrada']))
                    <div class="card mt-4">
                        <div class="card-header bg-light py-2">
                            <h6 class="mb-0"><i class="feather icon-send mr-1"></i>Agregar respuesta</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('administracion.ticket_responder', $ticket->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                @if($errors->any())
                                    <div class="alert alert-danger py-2">
                                        <ul class="mb-0" style="font-size:13px;">
                                            @foreach($errors->all() as $err)
                                                <li>{{ $err }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Respuesta <span class="text-danger">*</span></label>
                                    <textarea name="contenido"
                                              class="form-control form-control-sm @error('contenido') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Escribe tu respuesta aquí...">{{ old('contenido') }}</textarea>
                                    @error('contenido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Cambiar estado</label>
                                        <select name="estado_nuevo"
                                                class="form-control form-control-sm @error('estado_nuevo') is-invalid @enderror">
                                            <option value="">— Sin cambio ({{ ucfirst(str_replace('_',' ',$ticket->estado)) }}) —</option>
                                            <option value="abierta"     {{ old('estado_nuevo')=='abierta'     ? 'selected':'' }}>Abierta</option>
                                            <option value="en_progreso" {{ old('estado_nuevo')=='en_progreso' ? 'selected':'' }}>En Progreso</option>
                                            <option value="resuelta"    {{ old('estado_nuevo')=='resuelta'    ? 'selected':'' }}>Resuelta</option>
                                            <option value="cerrada"     {{ old('estado_nuevo')=='cerrada'     ? 'selected':'' }}>Cerrada</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Adjuntar archivos</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('archivos.*') is-invalid @enderror"
                                                   id="archivos_respuesta"
                                                   name="archivos[]"
                                                   multiple
                                                   accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx">
                                            <label class="custom-file-label text-muted" for="archivos_respuesta" style="font-size:13px;">
                                                Seleccionar archivos...
                                            </label>
                                        </div>
                                        <small class="text-muted">PDF, imágenes, Word, Excel. Máx 5MB por archivo.</small>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <a href="{{ route('administracion.tickets') }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="feather icon-arrow-left mr-1"></i>Volver a tickets
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="feather icon-send mr-1"></i>Enviar respuesta
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-secondary mt-3 text-center">
                        <i class="feather icon-lock mr-1"></i>
                        Este ticket está cerrado. No se pueden agregar más respuestas.
                        <a href="{{ route('administracion.tickets') }}" class="btn btn-sm btn-outline-secondary ml-2">Volver</a>
                    </div>
                @endif

            </div>{{-- /col-8 --}}

            {{-- Sidebar: Info del ticket --}}
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header bg-light py-2">
                        <h6 class="mb-0"><i class="feather icon-info mr-1"></i>Información del ticket</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-borderless mb-0" style="font-size:13px;">
                            <tr>
                                <td class="text-muted pl-3">N° Ticket</td>
                                <td><code class="text-primary">{{ $ticket->numero_ticket }}</code></td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Estado</td>
                                <td><span class="badge {{ $badgeEstado }}">{{ ucfirst(str_replace('_',' ',$ticket->estado)) }}</span></td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Prioridad</td>
                                <td><span class="badge {{ $badgePrioridad }}">{{ ucfirst($ticket->prioridad) }}</span></td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Tipo</td>
                                <td>{{ ucwords(str_replace('_',' ',$ticket->tipo_solicitud)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Reportado por</td>
                                <td>{{ $ticket->usuario ? $ticket->usuario->name : '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Creado</td>
                                <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Última actividad</td>
                                <td>{{ \Carbon\Carbon::parse($ticket->updated_at)->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted pl-3">Respuestas</td>
                                <td>{{ $ticket->respuestas->count() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Historial de cambios de estado --}}
                @php
                    $cambiosEstado = $ticket->respuestas->filter(fn($r) => $r->estado_nuevo);
                @endphp
                @if($cambiosEstado->count())
                    <div class="card mb-3">
                        <div class="card-header bg-light py-2">
                            <h6 class="mb-0"><i class="feather icon-activity mr-1"></i>Historial de estados</h6>
                        </div>
                        <div class="card-body py-2 px-3">
                            @foreach($cambiosEstado as $cambio)
                                <div class="d-flex align-items-center mb-2" style="font-size:12px;">
                                    <i class="feather icon-arrow-right text-primary mr-2"></i>
                                    <span>
                                        <strong>{{ ucfirst(str_replace('_',' ',$cambio->estado_nuevo)) }}</strong>
                                        <br>
                                        <span class="text-muted">
                                            {{ $cambio->usuario ? $cambio->usuario->name : '—' }} ·
                                            {{ \Carbon\Carbon::parse($cambio->created_at)->format('d/m/Y H:i') }}
                                        </span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>{{-- /col-4 sidebar --}}
        </div>{{-- /row --}}

    </div>
</div>

<script>
    // Mostrar nombre del archivo en el input
    document.getElementById('archivos_respuesta').addEventListener('change', function () {
        var nombres = Array.from(this.files).map(f => f.name).join(', ');
        this.nextElementSibling.textContent = nombres || 'Seleccionar archivos...';
    });
</script>

@endsection
