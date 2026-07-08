@extends('template.administracion.template')
@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">

        {{-- Breadcrumb --}}
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Tickets de Mantención</h5>
                        </div>
                        <ul class="breadcrumb mb-3">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('administracion.ventas') }}">Ventas</a></li>
                            <li class="breadcrumb-item active">Tickets</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats --}}
        <div class="row mb-3">
            <div class="col-6 col-md-3 mb-2">
                <div class="card text-center border-left border-success" style="border-left-width:4px!important;">
                    <div class="card-body py-2">
                        <div class="text-success font-weight-bold" style="font-size:1.5rem;">{{ $stats['abierta'] }}</div>
                        <small class="text-muted">Abiertas</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <div class="card text-center border-left border-info" style="border-left-width:4px!important;">
                    <div class="card-body py-2">
                        <div class="text-info font-weight-bold" style="font-size:1.5rem;">{{ $stats['en_progreso'] }}</div>
                        <small class="text-muted">En Progreso</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <div class="card text-center border-left border-primary" style="border-left-width:4px!important;">
                    <div class="card-body py-2">
                        <div class="text-primary font-weight-bold" style="font-size:1.5rem;">{{ $stats['resuelta'] }}</div>
                        <small class="text-muted">Resueltas</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <div class="card text-center border-left border-secondary" style="border-left-width:4px!important;">
                    <div class="card-body py-2">
                        <div class="text-secondary font-weight-bold" style="font-size:1.5rem;">{{ $stats['cerrada'] }}</div>
                        <small class="text-muted">Cerradas</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filtros --}}
        <div class="card mb-3">
            <div class="card-body py-2">
                <form method="GET" action="{{ route('administracion.tickets') }}" class="form-inline flex-wrap" style="gap:8px;">
                    <input type="text" name="buscar" class="form-control form-control-sm" placeholder="Buscar por ticket, asunto..." value="{{ request('buscar') }}" style="min-width:200px;">

                    <select name="estado" class="form-control form-control-sm">
                        <option value="">Todos los estados</option>
                        <option value="abierta"     {{ request('estado')=='abierta'     ? 'selected':'' }}>Abierta</option>
                        <option value="en_progreso" {{ request('estado')=='en_progreso' ? 'selected':'' }}>En Progreso</option>
                        <option value="resuelta"    {{ request('estado')=='resuelta'    ? 'selected':'' }}>Resuelta</option>
                        <option value="cerrada"     {{ request('estado')=='cerrada'     ? 'selected':'' }}>Cerrada</option>
                    </select>

                    <select name="prioridad" class="form-control form-control-sm">
                        <option value="">Todas las prioridades</option>
                        <option value="urgente" {{ request('prioridad')=='urgente' ? 'selected':'' }}>Urgente</option>
                        <option value="alta"    {{ request('prioridad')=='alta'    ? 'selected':'' }}>Alta</option>
                        <option value="media"   {{ request('prioridad')=='media'   ? 'selected':'' }}>Media</option>
                        <option value="baja"    {{ request('prioridad')=='baja'    ? 'selected':'' }}>Baja</option>
                    </select>

                    <select name="tipo" class="form-control form-control-sm">
                        <option value="">Todos los tipos</option>
                        <option value="reporte_error"      {{ request('tipo')=='reporte_error'      ? 'selected':'' }}>Reporte Error</option>
                        <option value="problema_tecnico"   {{ request('tipo')=='problema_tecnico'   ? 'selected':'' }}>Problema Técnico</option>
                        <option value="consulta_general"   {{ request('tipo')=='consulta_general'   ? 'selected':'' }}>Consulta General</option>
                        <option value="solicitud_feature"  {{ request('tipo')=='solicitud_feature'  ? 'selected':'' }}>Solicitud Feature</option>
                        <option value="acceso_cuenta"      {{ request('tipo')=='acceso_cuenta'      ? 'selected':'' }}>Acceso Cuenta</option>
                        <option value="facturacion"        {{ request('tipo')=='facturacion'        ? 'selected':'' }}>Facturación</option>
                        <option value="otros"              {{ request('tipo')=='otros'              ? 'selected':'' }}>Otros</option>
                    </select>

                    <button type="submit" class="btn btn-sm btn-primary"><i class="feather icon-search mr-1"></i>Filtrar</button>
                    @if(request()->hasAny(['buscar','estado','prioridad','tipo']))
                        <a href="{{ route('administracion.tickets') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="feather icon-x mr-1"></i>Limpiar
                        </a>
                    @endif
                </form>
            </div>
        </div>

        {{-- Lista de tickets (estilo blog) --}}
        @if($tickets->isEmpty())
            <div class="alert alert-info">
                <i class="feather icon-info mr-1"></i> No hay tickets que coincidan con los filtros aplicados.
            </div>
        @else
            @foreach($tickets as $ticket)
                @php
                    $mapPrioridad = ['baja'=>'badge-secondary','media'=>'badge-warning','alta'=>'badge-danger','urgente'=>'badge-dark'];
                    $mapEstado    = ['abierta'=>'badge-success','en_progreso'=>'badge-info','resuelta'=>'badge-primary','cerrada'=>'badge-secondary'];
                    $badgePrioridad = $mapPrioridad[$ticket->prioridad] ?? 'badge-light';
                    $badgeEstado    = $mapEstado[$ticket->estado]       ?? 'badge-light';
                @endphp
                <div class="card mb-3 shadow-sm" style="border-left: 4px solid
                    {{ $ticket->prioridad == 'urgente' ? '#343a40' :
                      ($ticket->prioridad == 'alta'    ? '#dc3545' :
                      ($ticket->prioridad == 'media'   ? '#ffc107' : '#6c757d')) }};">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-start flex-wrap" style="gap:6px;">
                            <div>
                                <code class="text-muted" style="font-size:11px;">{{ $ticket->numero_ticket }}</code>
                                <h6 class="mb-1 mt-1 font-weight-bold">{{ $ticket->asunto }}</h6>
                                <p class="text-muted mb-2" style="font-size:13px;">
                                    {{ Str::limit($ticket->descripcion, 120) }}
                                </p>
                                <small class="text-muted">
                                    <i class="feather icon-tag mr-1"></i>{{ ucwords(str_replace('_', ' ', $ticket->tipo_solicitud)) }}
                                    &nbsp;·&nbsp;
                                    <i class="feather icon-user mr-1"></i>{{ $ticket->usuario ? $ticket->usuario->name : 'Sin usuario' }}
                                    &nbsp;·&nbsp;
                                    <i class="feather icon-clock mr-1"></i>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}
                                    &nbsp;·&nbsp;
                                    <i class="feather icon-message-circle mr-1"></i>{{ $ticket->respuestas_count ?? 0 }} respuesta(s)
                                </small>
                            </div>
                            <div class="d-flex flex-column align-items-end" style="gap:4px;">
                                <span class="badge {{ $badgeEstado }}">{{ ucfirst(str_replace('_', ' ', $ticket->estado)) }}</span>
                                <span class="badge {{ $badgePrioridad }}">{{ ucfirst($ticket->prioridad) }}</span>
                                <a href="{{ route('administracion.ticket_show', $ticket->id) }}"
                                   class="btn btn-sm btn-outline-primary mt-1">
                                    <i class="feather icon-eye mr-1"></i>Ver detalle
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-center mt-3">
                {{ $tickets->links() }}
            </div>
        @endif

    </div>
</div>

@endsection
