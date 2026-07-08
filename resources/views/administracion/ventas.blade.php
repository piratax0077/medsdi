@extends('template.administracion.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">

        {{-- ── Breadcrumb ── --}}
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Escritorio Ventas Administración S_D_I</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Ventas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Tabs principales ── --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="tabsVentas" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-vendedores" data-toggle="tab" href="#panel-vendedores" role="tab">
                                    <i class="feather icon-users mr-1"></i> Vendedores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-tickets" data-toggle="tab" href="#panel-tickets" role="tab">
                                    <i class="feather icon-tool mr-1"></i> Tickets Mantención
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">

                        {{-- ══ Tab: Vendedores ══ --}}
                        <div class="tab-pane fade show active" id="panel-vendedores" role="tabpanel">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <i class="feather icon-users mr-1"></i>
                                        Total vendedores: <strong>{{ count($vendedores_lugar_atencion) }}</strong>
                                    </h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <input type="text" id="buscador_vendedores" class="form-control form-control-sm d-inline-block" style="max-width:250px;" placeholder="Buscar vendedor...">
                                </div>
                            </div>

                            @if($vendedores_lugar_atencion->isEmpty())
                                <div class="alert alert-info">
                                    <i class="feather icon-info mr-1"></i> No hay vendedores registrados para este lugar de atención.
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table id="tabla_vendedores" class="table table-sm table-bordered table-hover" style="font-size:13px;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nombre</th>
                                                <th>RUT</th>
                                                <th>Email</th>
                                                <th>Teléfono</th>
                                                <th class="text-center">Token</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Registro</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vendedores_lugar_atencion as $index => $vla)
                                                @php
                                                    $v = $vla->vendedor;
                                                    $nombre_completo = $v->nombre . ' ' . $v->apellido_paterno . ' ' . $v->apellido_materno;
                                                @endphp
                                                <tr>
                                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                    <td class="align-middle">
                                                        <strong>{{ $nombre_completo }}</strong>
                                                        @if($v->empresa)
                                                            <br><small class="text-muted">Empresa</small>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">{{ $v->rut }}</td>
                                                    <td class="align-middle">
                                                        <a href="mailto:{{ $v->email }}">{{ $v->email }}</a>
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $v->telefono_uno }}
                                                        @if($v->telefono_dos)
                                                            <br><small>{{ $v->telefono_dos }}</small>
                                                        @endif
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <code class="text-info">{{ $vla->token }}</code>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if($vla->estado == 1)
                                                            <span class="badge badge-success">Activo</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <small class="text-muted">
                                                            {{ \Carbon\Carbon::parse($vla->created_at)->format('d/m/Y') }}
                                                        </small>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        {{-- ══ Tab: Tickets Mantención ══ --}}
                        <div class="tab-pane fade" id="panel-tickets" role="tabpanel">

                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <h6 class="text-muted">
                                        <i class="feather icon-tool mr-1"></i>
                                        Total tickets: <strong>{{ count($tickets) }}</strong>
                                    </h6>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{ route('administracion.tickets') }}" class="btn btn-sm btn-primary">
                                        <i class="feather icon-external-link mr-1"></i>Gestionar tickets
                                    </a>
                                </div>
                            </div>

                            @php
                                $resumen = [
                                    'abierta'     => $tickets->where('estado','abierta')->count(),
                                    'en_progreso' => $tickets->where('estado','en_progreso')->count(),
                                    'resuelta'    => $tickets->where('estado','resuelta')->count(),
                                    'cerrada'     => $tickets->where('estado','cerrada')->count(),
                                ];
                            @endphp
                            <div class="row mb-3">
                                <div class="col-6 col-md-3">
                                    <div class="card text-center border-left border-success" style="border-left-width:4px!important;">
                                        <div class="card-body py-2">
                                            <div class="text-success font-weight-bold" style="font-size:1.4rem;">{{ $resumen['abierta'] }}</div>
                                            <small class="text-muted">Abiertas</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card text-center border-left border-info" style="border-left-width:4px!important;">
                                        <div class="card-body py-2">
                                            <div class="text-info font-weight-bold" style="font-size:1.4rem;">{{ $resumen['en_progreso'] }}</div>
                                            <small class="text-muted">En Progreso</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card text-center border-left border-primary" style="border-left-width:4px!important;">
                                        <div class="card-body py-2">
                                            <div class="text-primary font-weight-bold" style="font-size:1.4rem;">{{ $resumen['resuelta'] }}</div>
                                            <small class="text-muted">Resueltas</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card text-center border-left border-secondary" style="border-left-width:4px!important;">
                                        <div class="card-body py-2">
                                            <div class="text-secondary font-weight-bold" style="font-size:1.4rem;">{{ $resumen['cerrada'] }}</div>
                                            <small class="text-muted">Cerradas</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($tickets->isEmpty())
                                <div class="alert alert-info">
                                    <i class="feather icon-info mr-1"></i> No hay tickets registrados.
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table id="tabla_tickets" class="table table-sm table-bordered table-hover" style="font-size:13px;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>N° Ticket</th>
                                                <th>Asunto</th>
                                                <th class="text-center">Prioridad</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Creado</th>
                                                <th class="text-center">Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets->take(10) as $index => $ticket)
                                                @php
                                                    $mapPrioridad = ['baja'=>'badge-secondary','media'=>'badge-warning','alta'=>'badge-danger','urgente'=>'badge-dark'];
                                                    $mapEstado    = ['abierta'=>'badge-success','en_progreso'=>'badge-info','resuelta'=>'badge-primary','cerrada'=>'badge-secondary'];
                                                    $badgePrioridad = $mapPrioridad[$ticket->prioridad] ?? 'badge-light';
                                                    $badgeEstado    = $mapEstado[$ticket->estado]       ?? 'badge-light';
                                                @endphp
                                                <tr>
                                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                    <td class="align-middle">
                                                        <code class="text-primary" style="font-size:11px;">{{ $ticket->numero_ticket }}</code>
                                                    </td>
                                                    <td class="align-middle"><strong>{{ Str::limit($ticket->asunto, 50) }}</strong></td>
                                                    <td class="text-center align-middle">
                                                        <span class="badge {{ $badgePrioridad }}">{{ ucfirst($ticket->prioridad) }}</span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="badge {{ $badgeEstado }}">{{ ucfirst(str_replace('_', ' ', $ticket->estado)) }}</span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <small class="text-muted">{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}</small>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('administracion.ticket_show', $ticket->id) }}" class="btn btn-xs btn-outline-primary" style="font-size:11px; padding:2px 8px;">
                                                            <i class="feather icon-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($tickets->count() > 10)
                                    <div class="text-center mt-2">
                                        <a href="{{ route('administracion.tickets') }}" class="btn btn-sm btn-outline-primary">
                                            Ver todos los {{ $tickets->count() }} tickets <i class="feather icon-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>

                    </div>{{-- /tab-content --}}
                </div>{{-- /card --}}
            </div>
        </div>

    </div>
</div>

<script>
    // Filtro búsqueda vendedores
    document.getElementById('buscador_vendedores').addEventListener('keyup', function () {
        var filtro = this.value.toLowerCase();
        document.querySelectorAll('#tabla_vendedores tbody tr').forEach(function (fila) {
            fila.style.display = fila.innerText.toLowerCase().includes(filtro) ? '' : 'none';
        });
    });

    $(document).ready(function() {
        $('#tabla_vendedores').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "paginate": {
                    "previous": "<i class='feather icon-chevron-left'></i>",
                    "next": "<i class='feather icon-chevron-right'></i>"
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ vendedores",
                "zeroRecords": "No se encontraron vendedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 vendedores"
            }
        });

        $('#tabla_tickets').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "paginate": {
                    "previous": "<i class='feather icon-chevron-left'></i>",
                    "next": "<i class='feather icon-chevron-right'></i>"
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ tickets",
                "zeroRecords": "No se encontraron tickets",
                "infoEmpty": "Mostrando 0 a 0 de 0 tickets"
            }
        });
    });

</script>

@endsection
