@extends('template.adm_cm.template')
@section('content')
<style>
    .ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }
    </style>
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- Header -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Gestión de Medicamentos Crónicos</h5>
                        </div>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Medicamentos Crónicos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navegación por Pestañas -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-gestion-tab" data-toggle="pill" href="#pills-gestion" role="tab" aria-controls="pills-gestion" aria-selected="true">
                                    <i class="feather icon-users"></i> Gestión de Pacientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-entregados-tab" data-toggle="pill" href="#pills-entregados" role="tab" aria-controls="pills-entregados" aria-selected="false" onclick="actualizar_Registros(1, 'entregas_realizadas')">
                                    <i class="feather icon-check-circle"></i> Entregas Realizadas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-pendientes-tab" data-toggle="pill" href="#pills-pendientes" role="tab" aria-controls="pills-pendientes" aria-selected="false" onclick="actualizar_Registros(2, 'acordeonPacientesPendientes')">
                                    <i class="feather icon-clock"></i> Entregas Pendientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-en-curso-tab" data-toggle="pill" href="#pills-en-curso" role="tab" aria-controls="pills-en-curso" aria-selected="false" onclick="actualizar_Registros(3, 'entregas_en_curso')">
                                    <i class="feather icon-clock"></i> Entregas en curso
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-reportes-tab" data-toggle="pill" href="#pills-reportes" role="tab" aria-controls="pills-reportes" aria-selected="false" onclick="actualizar_Reportes()">
                                    <i class="feather icon-bar-chart-2"></i> Reportes
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido de las Pestañas -->
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">

                    <!-- PESTAÑA: Gestión de Pacientes -->
                    <div class="tab-pane fade show active" id="pills-gestion" role="tabpanel" aria-labelledby="pills-gestion-tab">

                        <!-- Buscador de Pacientes -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5 class="text-white mb-0"><i class="feather icon-search"></i> Buscar Paciente</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="buscar_rut">RUT Paciente:</label>
                                                    <input type="text" class="form-control" id="buscar_rut" placeholder="Ej: 12345678-9" oninput="formatoRut(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="buscar_nombre">Nombre:</label>
                                                    <input type="text" class="form-control" id="buscar_nombre" placeholder="Nombre del paciente">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>&nbsp;</label><br>
                                                    <button type="button" class="btn btn-primary" id="buscar_paciente_btn" onclick="buscarPaciente();">
                                                        <i class="feather icon-search"></i> Buscar
                                                    </button>
                                                    <button type="button" class="btn btn-secondary ml-2" onclick="limpiarBusqueda();">
                                                        <i class="feather icon-x"></i> Limpiar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información del Paciente Seleccionado -->
                        <div class="row mb-3" id="paciente_seleccionado" style="display: none;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5 class="text-white mb-0"><i class="feather icon-user"></i> Paciente Seleccionado</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" id="paciente_id" value="">
                                            <div class="col-md-3">
                                                <strong>RUT:</strong> <span id="paciente_rut">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Nombre:</strong> <span id="paciente_nombre">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Fecha Nacimiento:</strong> <span id="paciente_fecha_nac">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Teléfono:</strong> <span id="paciente_telefono">-</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>📍 Dirección:</strong> <span id="paciente_direccion">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medicamentos Crónicos del Paciente -->
                        <div class="row" id="medicamentos_section" style="display: none;">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h4 class="text-white f-20 mb-0 ml-2">Medicamentos Crónicos del Paciente</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" class="btn btn-outline-light btn-sm" onclick="entregarMedicamentos();">
                                                    <i class="feather icon-package"></i> Registrar Entrega
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="alert alert-info" id="medicamentos_info">
                                                    Seleccione un paciente para ver sus medicamentos crónicos
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="medicamentos_cronicos" class="table table-striped table-sm table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 50px;"></th>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Medicamento</th>
                                                        <th class="text-center">Dosis</th>
                                                        <th class="text-center">Frecuencia</th>
                                                        <th class="text-center">Próxima Entrega</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="medicamentos_tbody">
                                                    <tr>
                                                        <td colspan="7" class="text-center text-muted">
                                                            No hay medicamentos registrados para este paciente
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="carrito_section" style="display: none;">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h4 class="text-white f-20 mb-0 ml-2">🛒 Carrito de Entrega</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" class="btn btn-outline-light btn-sm" id="confirmar_carrito_btn" onclick="confirmarCarrito();" style="display:none;">
                                                    <i class="feather icon-check"></i> Confirmar Entrega
                                                </button>
                                                <button type="button" class="btn btn-outline-light btn-sm ml-2" onclick="limpiarCarrito();">
                                                    <i class="feather icon-trash-2"></i> Limpiar Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="carrito_tabla" class="table table-hover table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:5%">#</th>
                                                        <th class="text-left" style="width:30%">Medicamento</th>
                                                        <th class="text-center" style="width:20%">Presentación/Dosis</th>
                                                        <th class="text-center" style="width:20%">Posología</th>
                                                        <th class="text-center" style="width:15%">Cantidad</th>
                                                        <th class="text-center" style="width:10%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="carrito_tbody">
                                                    <tr>
                                                        <td colspan="6" class="text-center text-muted">
                                                            El carrito está vacío
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PESTAÑA: Entregas Realizadas -->
                    <div class="tab-pane fade" id="pills-entregados" role="tabpanel" aria-labelledby="pills-entregados-tab">
                        <div class="row">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h4 class="text-white f-20 mb-0 ml-2">Entregas Realizadas de Medicamentos Crónicos</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" class="btn btn-outline-light btn-sm mr-1" onclick="actualizar_Registros(1, 'entregas_realizadas')">
                                                    <i class="feather icon-refresh-cw"></i> Actualizar
                                                </button>
                                                <button type="button" class="btn btn-outline-light btn-sm">
                                                    <i class="feather icon-download"></i> Exportar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="alert alert-info">
                                                    Aquí se muestran todas las entregas de medicamentos crónicos realizadas
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                        <table id="entregas_realizadas" class="table table-striped table-sm table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Fecha Entrega</th>
                                                    <th class="text-center">Paciente</th>
                                                    <th class="text-center">RUT</th>
                                                    <th class="text-center">Medicamentos</th>
                                                    <th class="text-center">Profesional</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">
                                                        No hay entregas registradas
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PESTAÑA: Entregas Pendientes -->
                    <div class="tab-pane fade" id="pills-pendientes" role="tabpanel" aria-labelledby="pills-pendientes-tab">
                        <div class="row">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h4 class="text-white f-20 mb-0 ml-2">Entregas Pendientes de Medicamentos Crónicos</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" class="btn btn-outline-light btn-sm" onclick="actualizar_Registros(2, 'acordeonPacientesPendientes')">
                                                    <i class="feather icon-refresh-cw"></i> Actualizar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="alert alert-warning">
                                                    Medicamentos con entregas próximas o vencidas
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Botón agregar seleccionados al carrito -->
                                        <button class="btn btn-success btn-sm mb-3" onclick="agregarSeleccionadosAlCarritoPendientes()">
                                            <i class="feather icon-shopping-cart"></i> Agregar seleccionados al carrito
                                        </button>

                                        <!-- LISTADO AGRUPADO POR PACIENTE (ACORDEÓN) -->
                                        <div class="accordion" id="acordeonPacientesPendientes">
                                        @if(isset($entregas_por_paciente) && count($entregas_por_paciente) > 0)
                                                @foreach($entregas_por_paciente as $index => $grupo)
                                                    @php
                                                        $paciente = $grupo['paciente'];
                                                        $entregas = $grupo['entregas'];
                                                        $totalMeds = $grupo['total_medicamentos'];
                                                        $nombrePaciente = ($paciente->nombres ?? '-') . ' ' . ($paciente->apellido_uno ?? '') . ' ' . ($paciente->apellido_dos ?? '');
                                                    @endphp
                                                    <div class="card mb-2">
                                                        <div class="card-header p-0" id="headingPaciente{{ $index }}">
                                                            <div class="d-flex align-items-center justify-content-between p-2" style="cursor: pointer;" data-toggle="collapse" data-target="#collapsePaciente{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapsePaciente{{ $index }}">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="checkbox" class="mr-2 check-paciente-grupo" data-paciente-index="{{ $index }}" onclick="event.stopPropagation(); toggleCheckPaciente(this, {{ $index }});">
                                                                    <i class="feather icon-user mr-2 text-primary"></i>
                                                                    <strong class="text-uppercase">{{ $nombrePaciente }}</strong>
                                                                    <span class="badge badge-secondary ml-2">RUT: {{ $paciente->rut ?? '-' }}</span>
                                                                    <span class="badge badge-info ml-2">{{ $totalMeds }} medicamento{{ $totalMeds > 1 ? 's' : '' }}</span>
                                                                </div>
                                                                <i class="feather icon-chevron-down"></i>
                                                            </div>
                                                        </div>
                                                        <div id="collapsePaciente{{ $index }}" class="collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="headingPaciente{{ $index }}" data-parent="#acordeonPacientesPendientes">
                                                            <div class="card-body p-2">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-sm table-hover mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center" style="width: 40px;">
                                                                                    <input type="checkbox" class="check-all-paciente" data-paciente-index="{{ $index }}" onclick="toggleAllMedicamentosPaciente(this, {{ $index }})">
                                                                                </th>
                                                                                <th class="text-center">Medicamento</th>
                                                                                <th class="text-center">Presentación</th>
                                                                                <th class="text-center">Posología</th>
                                                                                <th class="text-center">Vía Admin.</th>
                                                                                <th class="text-center">Próxima Entrega</th>
                                                                                <th class="text-center">Estado</th>
                                                                                <th class="text-center">Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($entregas as $entrega)
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        <input type="checkbox" class="entrega-pendiente-checkbox entrega-paciente-{{ $index }}" value="{{ $entrega->id }}" data-entrega='@json($entrega)'>
                                                                                    </td>
                                                                                    <td class="text-center">{{ $entrega->nombre_medicamento ?? '-' }}</td>
                                                                                    <td class="text-center">{{ $entrega->presentacion ?? '-' }}</td>
                                                                                    <td class="text-center">{{ $entrega->posologia ?? '-' }}</td>
                                                                                    <td class="text-center">{{ $entrega->via_administracion ?? '-' }}</td>
                                                                                    <td class="text-center">
                                                                                        {{ $entrega->fecha_entrega ? \Carbon\Carbon::parse($entrega->fecha_entrega)->format('d-m-Y') : '-' }}
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        @if($entrega->estado == 1)
                                                                                            <span class="badge badge-success">Próxima</span>
                                                                                        @elseif($entrega->estado == 2)
                                                                                            <span class="badge badge-danger">Vencida</span>
                                                                                        @else
                                                                                            <span class="badge badge-secondary">Desconocido</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        <button class="btn btn-sm btn-primary"
                                                                                            data-paciente='@json($entrega->paciente)'
                                                                                            data-direccion='@json($entrega->paciente->direccion ?? null)'
                                                                                            data-ciudad='@json($entrega->paciente->direccion ? ($entrega->paciente->direccion->comuna ?? $entrega->paciente->direccion->ciudad->nombre ?? null) : null)'
                                                                                            data-medicamento='@json($entrega->nombre_medicamento ?? "-")'
                                                                                            data-fecha_entrega='{{ $entrega->fecha_entrega ? \Carbon\Carbon::parse($entrega->fecha_entrega)->format("d-m-Y") : "-" }}'
                                                                                            onclick="verDetalleEntrega(this);">
                                                                                            <i class="feather icon-eye"></i> Ver Detalle
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <!-- OBSERVACIONES POR PACIENTE -->
                                                                <hr class="my-3">
                                                                <div class="form-group">
                                                                    <label for="observaciones_paciente_{{ $index }}" class="font-weight-bold">
                                                                        <i class="feather icon-message-square mr-1"></i> Observaciones (¿Por qué están pendientes?)
                                                                    </label>
                                                                    <textarea
                                                                        id="observaciones_paciente_{{ $index }}"
                                                                        class="form-control observaciones-pendientes"
                                                                        rows="3"
                                                                        placeholder="Ej: Paciente no disponible, cambio de domicilio, requiere confirmación, etc."
                                                                        data-paciente-id="{{ $paciente->id }}"
                                                                        data-paciente-index="{{ $index }}">{{ $paciente->observaciones_entregas ?? '' }}</textarea>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-sm btn-success mt-2"
                                                                        onclick="guardarObservacionesPaciente('{{ $index }}', '{{ $paciente->id }}');">
                                                                        <i class="feather icon-save mr-1"></i> Guardar Observaciones
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                        @else
                                            <div class="alert alert-info text-center">
                                                <i class="feather icon-info"></i> No hay entregas pendientes
                                            </div>
                                        @endif
                                        </div>

                                        <!-- CARRITO DE ENTREGAS PENDIENTES -->
                                        <hr>
                                        <div class="table-responsive mt-3">
                                            <button class="btn btn-primary mb-2" onclick="abrirModalDireccionesCarrito()">
                                                <i class="feather icon-check"></i> Confirmar Entrega
                                            </button>
                                            <table id="entregas_pendientes_carrito" class="table table-striped table-sm table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 40px;">
                                                            <input type="checkbox" id="check_all_entregas_pendientes_carrito" onclick="toggleAllEntregasPendientesCarrito(this)">
                                                        </th>
                                                        <th class="text-center">Paciente</th>
                                                        <th class="text-center">RUT</th>
                                                        <th class="text-center">Medicamento</th>
                                                        <th class="text-center">Próxima Entrega</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PESTAÑA: Entregas en curso -->
                    <div class="tab-pane fade" id="pills-en-curso" role="tabpanel" aria-labelledby="pills-en-curso-tab">
                        <div class="row">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h4 class="text-white f-20 mb-0 ml-2">Entregas en Curso de Medicamentos Crónicos</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" class="btn btn-outline-light btn-sm" onclick="actualizar_Registros(3, 'entregas_en_curso')">
                                                    <i class="feather icon-refresh-cw"></i> Actualizar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="alert alert-info">
                                                    Aquí se muestran las entregas de medicamentos crónicos que están en proceso de entrega (pendientes de confirmación o notificación)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                        <table id="entregas_en_curso" class="table table-striped table-sm table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Fecha Entrega</th>
                                                    <th class="text-center">Paciente</th>
                                                    <th class="text-center">RUT</th>
                                                    <th class="text-center">Medicamento</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-center">Profesional</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($entregas_en_curso) && $entregas_en_curso->count() > 0)
                                                    @foreach($entregas_en_curso as $entrega_curso)
                                                        <tr>
                                                            <td class="text-center">{{ $entrega_curso->fecha_entrega ? \Carbon\Carbon::parse($entrega_curso->fecha_entrega)->format('d-m-Y') : '-' }}</td>
                                                            <td class="text-center">{{ ($entrega_curso->paciente->nombres ?? '-') . ' ' . ($entrega_curso->paciente->apellido_uno ?? '') }}</td>
                                                            <td class="text-center">{{ $entrega_curso->paciente->rut ?? '-' }}</td>
                                                            <td class="text-center">{{ $entrega_curso->nombre_medicamento ?? '-' }}</td>
                                                            <td class="text-center">{{ $entrega_curso->cantidad_entregada ?? '-' }}</td>
                                                            <td class="text-center">{{ ($entrega_curso->profesional->nombres ?? '-') . ' ' . ($entrega_curso->profesional->apellido_uno ?? '') }}</td>
                                                            <td class="text-center"><span class="badge badge-warning">En camino</span></td>
                                                            <td class="text-center">
                                                                <button class="btn btn-sm btn-success" onclick="confirmarEntregaRecibida({{ $entrega_curso->id }})">
                                                                    <i class="feather icon-check"></i> Confirmar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8" class="text-center text-muted">
                                                            No hay entregas en curso
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
                    </div>

                    <!-- PESTAÑA: Reportes -->
                    <div class="tab-pane fade" id="pills-reportes" role="tabpanel" aria-labelledby="pills-reportes-tab">
                        <div class="row">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h4 class="text-white f-20 mb-0 ml-2">Reportes de Medicamentos Crónicos</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" class="btn btn-outline-light btn-sm mr-1" onclick="actualizar_Reportes()">
                                                    <i class="feather icon-refresh-cw"></i> Actualizar
                                                </button>
                                                <button type="button" class="btn btn-outline-light btn-sm">
                                                    <i class="feather icon-download"></i> Exportar Excel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Estadísticas Principales -->
                                        <div class="row mb-4">
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="card bg-primary mb-0">
                                                    <div class="card-body p-3">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-white mb-1" id="stat_pacientes_activos">{{ $pacientes_activos ?? 0 }}</h4>
                                                                <p class="text-white mb-0" style="font-size:0.85rem;">Pacientes Activos</p>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-users text-white f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="card bg-success mb-0">
                                                    <div class="card-body p-3">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-white mb-1" id="stat_total_entregadas">{{ $total_entregadas ?? 0 }}</h4>
                                                                <p class="text-white mb-0" style="font-size:0.85rem;">Entregas Realizadas</p>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-check-circle text-white f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="card bg-warning mb-0">
                                                    <div class="card-body p-3">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-white mb-1" id="stat_total_pendientes">{{ $total_pendientes ?? 0 }}</h4>
                                                                <p class="text-white mb-0" style="font-size:0.85rem;">Pendientes</p>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-clock text-white f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="card bg-info mb-0">
                                                    <div class="card-body p-3">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-white mb-1" id="stat_total_en_curso">{{ $total_en_curso ?? 0 }}</h4>
                                                                <p class="text-white mb-0" style="font-size:0.85rem;">En Camino</p>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-truck text-white f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Fila secundaria de stats -->
                                        <div class="row mb-4">
                                            <div class="col-md-4 col-6 mb-3">
                                                <div class="card border mb-0">
                                                    <div class="card-body p-3 text-center">
                                                        <h3 class="text-primary mb-1" id="stat_total_medicamentos">{{ $total_medicamentos ?? 0 }}</h3>
                                                        <p class="text-muted mb-0"><i class="feather icon-activity mr-1"></i> Total Registros</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 mb-3">
                                                <div class="card border mb-0">
                                                    <div class="card-body p-3 text-center">
                                                        <h3 class="text-success mb-1" id="stat_entregas_hoy">{{ $entregas_hoy ?? 0 }}</h3>
                                                        <p class="text-muted mb-0"><i class="feather icon-calendar mr-1"></i> Entregas Hoy</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 mb-3">
                                                <div class="card border mb-0">
                                                    <div class="card-body p-3 text-center">
                                                        @php
                                                            $tasa = ($total_medicamentos > 0) ? round(($total_entregadas / $total_medicamentos) * 100, 1) : 0;
                                                        @endphp
                                                        <h3 class="mb-1" id="stat_tasa_entrega" style="color: {{ $tasa >= 70 ? '#28a745' : ($tasa >= 40 ? '#ffc107' : '#dc3545') }};">{{ $tasa }}%</h3>
                                                        <p class="text-muted mb-0"><i class="feather icon-trending-up mr-1"></i> Tasa de Entrega</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Top Medicamentos Más Entregados -->
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <h6 class="font-weight-bold mb-3"><i class="feather icon-bar-chart-2 mr-1"></i> Top Medicamentos Más Entregados</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-striped table-hover">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center" style="width:5%">#</th>
                                                                <th>Medicamento</th>
                                                                <th class="text-center">Total Entregas</th>
                                                                <th class="text-center">Cantidad Total</th>
                                                                <th style="width:35%">Proporción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_top_medicamentos">
                                                            @if(isset($top_medicamentos) && $top_medicamentos->count() > 0)
                                                                @php $max_entregas = $top_medicamentos->max('total_entregas'); @endphp
                                                                @foreach($top_medicamentos as $idx => $med)
                                                                    <tr>
                                                                        <td class="text-center">{{ $idx + 1 }}</td>
                                                                        <td><strong>{{ $med->nombre_medicamento }}</strong></td>
                                                                        <td class="text-center">
                                                                            <span class="badge badge-primary">{{ $med->total_entregas }}</span>
                                                                        </td>
                                                                        <td class="text-center">{{ $med->total_cantidad ?? '-' }}</td>
                                                                        <td>
                                                                            @php $pct = $max_entregas > 0 ? round(($med->total_entregas / $max_entregas) * 100) : 0; @endphp
                                                                            <div class="progress" style="height: 18px;">
                                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $pct }}%" aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100">
                                                                                    {{ $pct }}%
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5" class="text-center text-muted">No hay datos de entregas realizadas</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Entregas por Mes -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="font-weight-bold mb-3"><i class="feather icon-calendar mr-1"></i> Entregas por Mes (Últimos 6 Meses)</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-striped table-hover">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th>Mes</th>
                                                                <th class="text-center">Total Entregas</th>
                                                                <th class="text-center">Pacientes Atendidos</th>
                                                                <th class="text-center">Medicamentos Distintos</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_entregas_por_mes">
                                                            @if(isset($entregas_por_mes) && $entregas_por_mes->count() > 0)
                                                                @foreach($entregas_por_mes as $mes)
                                                                    <tr>
                                                                        <td><strong>{{ ucfirst($mes['mes_nombre']) }}</strong></td>
                                                                        <td class="text-center"><span class="badge badge-success">{{ $mes['total_entregas'] }}</span></td>
                                                                        <td class="text-center">{{ $mes['pacientes'] }}</td>
                                                                        <td class="text-center">{{ $mes['medicamentos'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">No hay datos de entregas en los últimos 6 meses</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal REMOVIDO: Ya no es necesario seleccionar datos en el frontend -->
<!-- Los medicamentos ya vienen configurados desde el sistema -->

<!-- Modal para direcciones de pacientes del carrito -->
<div class="modal fade" id="modal_direcciones_carrito" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Direcciones de Pacientes para Entrega</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- select de enfermeras o encargados -->
                <div class="form-group">
                    <label for="entrega_profesional">Encargado de la Entrega *</label>
                    <select class="form-control" id="entrega_profesional" required>
                        <option value="">Seleccione un encargado</option>
                        @if(isset($profesionales))
                            @foreach($profesionales as $prof)
                                <option value="{{ $prof->id_profesional }}">{{ $prof->nombres }} {{ $prof->apellido_uno }}</option>
                            @endforeach
                        @endif
                        <option value="0">Otro</option>
                    </select>
                </div>
                <!-- Resumen de medicamentos por paciente -->
                <div id="resumen_medicamentos_carrito" style="margin-bottom: 15px;">
                    <!-- Se llena dinámicamente -->
                </div>

                <hr style="border-top: 2px dashed #dee2e6;">

                <h6 class="mb-2" style="color: #17a2b8; font-weight: 600;"><i class="feather icon-map-pin mr-1"></i> Direcciones de Entrega</h6>
                <div id="direcciones_carrito_contenido">
                    <!-- Aquí se mostrarán las direcciones -->
                </div>
                <div id="direcciones_carrito_mapa" style="width:100%; height:320px; margin-top:12px; display:none; border:1px solid #e9ecef; border-radius:6px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info mr-auto" id="btn_mi_ubicacion" onclick="solicitarUbicacionUsuario()">Mi ubicación</button>
                <button type="button" class="btn btn-outline-primary" onclick="registrarSolicitudEntrega()" id="btn_registrar_entrega">Registrar Entrega</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Registrar Entrega -->
<div class="modal fade" id="modal_entrega" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Registrar Entrega de Medicamentos</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Paciente:</label>
                    <p id="entrega_paciente" class="font-weight-bold text-primary">-</p>
                </div>
                <div class="form-group">
                    <label>📍 Dirección:</label>
                    <p id="entrega_direccion" class="font-weight-normal text-secondary">-</p>
                </div>
                <div class="form-group">
                    <label>Mapa de la dirección:</label>
                    <div id="entrega_mapa" style="width:100%; min-height:250px; border:1px solid #e0e0e0; border-radius:8px; overflow:hidden; background:#f8f9fa; display:flex; align-items:center; justify-content:center;">
                        <span class="text-muted">No disponible</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_fecha">Fecha de Entrega *</label>
                    <input type="date" class="form-control" id="entrega_fecha" required>
                </div>
                <div class="form-group">
                    <label for="entrega_cantidad">Cantidad a Entregar *</label>
                    <input type="number" class="form-control" id="entrega_cantidad" min="1" required>
                </div>
                <!-- select de enfermeras o encargados -->
                <div class="form-group">
                    <label for="entrega_profesional">Profesional que Entrega *</label>
                    <select class="form-control" id="entrega_profesional" required>
                        <option value="">Seleccione un profesional</option>
                        @if(isset($profesionales))
                            @foreach($profesionales as $prof)
                                <option value="{{ $prof->id_profesional }}">{{ $prof->nombres }} {{ $prof->apellido_uno }}</option>
                            @endforeach
                        @endif
                        <option value="0">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="entrega_observaciones">Observaciones</label>
                    <textarea class="form-control" id="entrega_observaciones" rows="3" placeholder="Observaciones sobre la entrega..."></textarea>
                </div>
                <div class="form-group">
                    <label>Medicamentos a Entregar:</label>
                    <div id="medicamentos_entrega" class="border rounded p-3 bg-light">
                        <!-- Aquí se cargarán los medicamentos -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="confirmar_entrega_btn" onclick="confirmarEntregaFinal();">
                    <i class="feather icon-check"></i> Registrar Entrega
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Ver Detalle de Entrega Realizada con Mapa -->
<div class="modal fade" id="modal_detalle_entrega_realizada" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Detalle de Entrega Realizada</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Paciente:</strong></label>
                            <p id="detalle_entrega_paciente" class="text-primary">-</p>
                        </div>
                        <div class="form-group">
                            <label><strong>RUT:</strong></label>
                            <p id="detalle_entrega_rut">-</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Profesional:</strong></label>
                            <p id="detalle_entrega_profesional">-</p>
                        </div>
                        <div class="form-group">
                            <label><strong>Dirección:</strong></label>
                            <p id="detalle_entrega_direccion" class="text-muted"><i class="fas fa-spinner fa-spin"></i> Cargando...</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label><strong>Mapa de la dirección:</strong></label>
                    <div id="detalle_entrega_mapa" style="width:100%; height:300px; border:1px solid #e0e0e0; border-radius:8px; overflow:hidden; background:#f8f9fa;">
                        <div class="d-flex align-items-center justify-content-center h-100"><span class="text-muted">No disponible</span></div>
                    </div>
                </div>

                <hr>

                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="font-weight-bold mb-0">Medicamentos Entregados</h6>
                    <span id="detalle_entrega_fecha_hora" class="badge badge-info">-</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-2">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Medicamento</th>
                                <th class="text-center">Presentación</th>
                                <th class="text-center">Posología</th>
                                <th class="text-center">Vía Admin.</th>
                                <th class="text-center">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_entrega_medicamentos_tbody">
                            <tr><td colspan="6" class="text-center text-muted">-</td></tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label><strong>Observaciones:</strong></label>
                    <div id="detalle_entrega_observaciones" class="border rounded p-3 bg-light" style="min-height:60px;">
                        -
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-script')
<script>

// Variables globales
let pacienteSeleccionado = null;
let medicamentosCronicos = [];
let carritoEntrega = []; // Array para almacenar medicamentos en el carrito
let carritoEntregasPendientes = []; // Array separado para almacenar entregas pendientes seleccionadas
let direccionesCarritoMap = null;
let direccionesCarritoMarkers = [];
let direccionesCarritoUserMarker = null;
let direccionesCarritoCache = {}; // Cache de direcciones por RUT para que el mapa las use
let detalleEntregaMap = null;    // Instancia Leaflet del modal de detalle de entrega

// DataTable de entregas_realizadas se inicializa al cargar los datos vía AJAX (ver actualizar_Registros)
// Cache de grupos de entregas para el modal de detalle (estado 1)
let entregasGrupadasCache = {};

// Helper: extrae una representación legible de la dirección desde distintos formatos
const obtenerDireccionDesdeObjeto = (dirObj) => {
    if (!dirObj) return '';
    if (typeof dirObj === 'string') return dirObj;
    const candidates = [
        'direccion', 'calle', 'address', 'direccion_texto', 'domicilio', 'detalle'
    ];
    for (let k of candidates) {
        if (dirObj[k]) return dirObj[k];
    }
    // Campos separados
    const parts = [];
    if (dirObj.calle) parts.push(dirObj.calle);
    if (dirObj.numero) parts.push(dirObj.numero);
    if (dirObj.resto) parts.push(dirObj.resto || dirObj.departamento || '');
    if (parts.length) return parts.filter(Boolean).join(' ');
    try { return JSON.stringify(dirObj); } catch (e) { return '' }
};

// Helper: obtiene nombre de ciudad/comuna si existe
const obtenerCiudadDesdeObjeto = (dirObj) => {
    if (!dirObj) return '';
    if (dirObj.comuna && typeof dirObj.comuna === 'string') return dirObj.comuna;
    if (dirObj.comuna && dirObj.comuna.nombre) return dirObj.comuna.nombre;
    if (dirObj.ciudad && typeof dirObj.ciudad === 'string') return dirObj.ciudad;
    if (dirObj.ciudad && dirObj.ciudad.nombre) return dirObj.ciudad.nombre;
    return '';
};

// Función para mostrar el detalle de la entrega en el modal
function verDetalleEntrega(btn) {
    // btn es el botón que contiene los data-*
    let paciente = btn.getAttribute('data-paciente');
    let direccion = btn.getAttribute('data-direccion');
    let medicamento = btn.getAttribute('data-medicamento');
    let fechaEntrega = btn.getAttribute('data-fecha_entrega');

    try {
        paciente = JSON.parse(paciente);
    } catch (e) { paciente = {}; }
    try {
        direccion = JSON.parse(direccion);
    } catch (e) { direccion = {}; }

    // Llenar campos del modal
    let nombreCompleto = (paciente.nombres || '-') + ' ' + (paciente.apellido_uno || '') + ' ' + (paciente.apellido_dos || '');
    let rut = paciente.rut || '-';
    let telefono = paciente.telefono_uno || paciente.telefono || '-';
    let fechaNac = paciente.fecha_nac || '-';
    // Construir texto de dirección robusto
    let direccionTexto = '';
    // Preferir el objeto `direccion` enviado en el botón; si no, intentar `paciente.direccion`
    const direccionObj = (direccion && Object.keys(direccion).length ? direccion : (paciente.direccion || null));
    direccionTexto = obtenerDireccionDesdeObjeto(direccionObj) || '';
    const ciudad = obtenerCiudadDesdeObjeto(direccionObj);
    if (ciudad && direccionTexto) direccionTexto = direccionTexto + ', ' + ciudad;
    if (!direccionTexto) direccionTexto = '-';

    // Mostrar en el modal
    $('#entrega_paciente').html('<b>' + nombreCompleto + '</b> <br>RUT: ' + rut + '<br>F. Nac: ' + fechaNac + '<br>Tel: ' + telefono);
    $('#entrega_direccion').text(direccionTexto);

    // Mostrar mapa si hay dirección
    let mapaDiv = $('#entrega_mapa');
    if (direccionTexto && direccionTexto !== '-' && direccionTexto.trim() !== '') {
        // Codificar dirección para URL
        let direccionUrl = encodeURIComponent(direccionTexto);
        // Puedes usar tu propia API key de Google Maps si tienes, o dejarlo sin key para modo embed básico
        let src = `https://www.google.com/maps?q=${direccionUrl}&output=embed`;
        let iframe = `<iframe width="100%" height="250" frameborder="0" style="border:0" src="${src}" allowfullscreen loading="lazy"></iframe>`;
        mapaDiv.html(iframe);
    } else {
        mapaDiv.html('<span class="text-muted">No disponible</span>');
    }

    // Limpiar observaciones y fecha
    $('#entrega_observaciones').val('');
    $('#entrega_fecha').val('');

    // Mostrar el modal
    $('#modal_entrega').modal('show');
}

function verDetalleEntregaRealizada(entrega){
    console.log('Ver detalle de entrega realizada:', entrega);

    let nombreCompleto = entrega.paciente_nombre || '-';
    let rut = entrega.paciente_rut || '-';
    let fechaEntrega = entrega.fecha_entrega || '-';
    let horaEntrega = entrega.hora_entrega ? ' ' + entrega.hora_entrega : '';
    let observaciones = entrega.observaciones || '-';
    let profesional = entrega.profesional_nombre || '-';

    // Datos del paciente
    $('#detalle_entrega_paciente').text(nombreCompleto);
    $('#detalle_entrega_rut').text(rut);
    $('#detalle_entrega_profesional').text(profesional);
    $('#detalle_entrega_fecha_hora').text(fechaEntrega + horaEntrega);
    $('#detalle_entrega_observaciones').text(observaciones);
    $('#detalle_entrega_direccion').html('<i class="fas fa-spinner fa-spin"></i> Cargando...');
    $('#detalle_entrega_mapa').html('<div class="d-flex align-items-center justify-content-center h-100"><i class="fas fa-spinner fa-spin fa-2x text-muted"></i></div>');

    // Tabla de medicamentos (compatible con formato plano de un solo medicamento)
    const tbody = $('#detalle_entrega_medicamentos_tbody');
    tbody.empty();
    tbody.append(
        '<tr>' +
        '<td class="text-center">1</td>' +
        '<td><strong>' + (entrega.nombre_medicamento || '-') + '</strong></td>' +
        '<td class="text-center">' + (entrega.presentacion || '-') + '</td>' +
        '<td class="text-center">' + (entrega.posologia || '-') + '</td>' +
        '<td class="text-center">' + (entrega.via_administracion || '-') + '</td>' +
        '<td class="text-center"><span class="badge badge-primary">' + (entrega.cantidad_entregada || '-') + '</span></td>' +
        '</tr>'
    );

    // Mostrar el modal
    $('#modal_detalle_entrega_realizada').modal('show');

    // Cargar dirección y mapa de forma asíncrona
    if (rut && rut !== '-') {
        cargarYMostrarDireccionDetalle(rut);
    } else {
        $('#detalle_entrega_direccion').text('No registrada');
        $('#detalle_entrega_mapa').html('<div class="d-flex align-items-center justify-content-center h-100"><span class="text-muted">Sin dirección</span></div>');
    }
}

// Obtiene la dirección de un paciente por RUT (caché primero, luego AJAX),
// actualiza el texto y renderiza el mapa Leaflet en el modal de detalle.
async function cargarYMostrarDireccionDetalle(rut) {
    let direccionTexto = '';

    // 1) Intentar desde el caché
    if (direccionesCarritoCache[rut]) {
        direccionTexto = direccionesCarritoCache[rut];
    } else {
        // 2) Buscar via AJAX
        try {
            const response = await $.get('{{ route("agenda.buscar_rut_paciente") }}', {
                rut: rut,
                id_profesional: "{{ Auth::user()->profesional_id }}"
            });
            const pac = typeof response === 'string' ? JSON.parse(response) : response;
            const dirObj = pac.Direccion || pac.direccion || null;
            if (dirObj && dirObj.direccion) {
                let texto = (dirObj.direccion || '').trim();
                const ciudad = dirObj.Ciudad?.nombre || dirObj.ciudad?.nombre || '';
                if (ciudad) texto = texto ? texto + ', ' + ciudad : ciudad;
                if (texto) {
                    direccionTexto = texto;
                    direccionesCarritoCache[rut] = texto; // guardar en caché
                }
            }
        } catch(e) {
            console.warn('⚠️ Error al obtener dirección para detalle, RUT:', rut, e);
        }
    }

    // 3) Mostrar texto en el modal
    if (direccionTexto) {
        $('#detalle_entrega_direccion').text(direccionTexto);
    } else {
        $('#detalle_entrega_direccion').text('No registrada');
        $('#detalle_entrega_mapa').html('<div class="d-flex align-items-center justify-content-center h-100"><span class="text-muted">Sin dirección registrada</span></div>');
        return;
    }

    // 4) Geocodificar y mostrar mapa Leaflet
    try {
        await loadLeafletAssets();
    } catch(e) {
        console.warn('Leaflet no cargó para detalle entrega:', e);
        return;
    }

    const coord = await geocodeAddress(direccionTexto);
    if (!coord) {
        $('#detalle_entrega_mapa').html('<div class="d-flex align-items-center justify-content-center h-100"><span class="text-muted">No se pudo geocodificar la dirección</span></div>');
        return;
    }

    const mapContainer = document.getElementById('detalle_entrega_mapa');
    // Limpiar contenido anterior
    mapContainer.innerHTML = '';

    // Destruir instancia previa si existe
    if (detalleEntregaMap) {
        try { detalleEntregaMap.remove(); } catch(e) {}
        detalleEntregaMap = null;
    }

    detalleEntregaMap = L.map(mapContainer).setView([coord.lat, coord.lon], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(detalleEntregaMap);

    L.marker([coord.lat, coord.lon])
        .addTo(detalleEntregaMap)
        .bindPopup(direccionTexto)
        .openPopup();

    // Forzar resize para que el mapa se renderice correctamente dentro del modal
    setTimeout(() => { try { detalleEntregaMap.invalidateSize(); } catch(e) {} }, 350);
}

// Función para ver detalle de entrega realizada CON MAPA (si se tiene información de dirección)
function verDetalleEntregaRealizadaConMapa(entrega, direccion){
    console.log('Ver detalle de entrega realizada con mapa:', entrega, direccion);

    // Extraer datos del nuevo formato (plano)
    let nombreCompleto = entrega.paciente_nombre || '-';
    let rut = entrega.paciente_rut || '-';
    let medicamento = entrega.nombre_medicamento || '-';
    let presentacion = entrega.presentacion || '-';
    let posologia = entrega.posologia || '-';
    let viaAdmin = entrega.via_administracion || '-';
    let cantidad = entrega.cantidad_entregada || '-';
    let fechaEntrega = entrega.fecha_entrega || '-';
    let horaEntrega = entrega.hora_entrega || '-';
    let observaciones = entrega.observaciones || '-';
    let profesional = entrega.profesional_nombre || '-';

    // Mostrar datos del paciente
    $('#detalle_entrega_paciente').text(nombreCompleto);
    $('#detalle_entrega_rut').text(rut);
    $('#detalle_entrega_profesional').text(profesional);

    // Procesar dirección y mostrar mapa
    let mapaDiv = $('#detalle_entrega_mapa');
    if (direccion) {
        try {
            if (typeof direccion === 'string') {
                direccion = JSON.parse(direccion);
            }
        } catch (e) { }

        let direccionTexto = obtenerDireccionDesdeObjeto(direccion) || '';
        const ciudad = obtenerCiudadDesdeObjeto(direccion);
        if (ciudad && direccionTexto) direccionTexto = direccionTexto + ', ' + ciudad;

        if (direccionTexto && direccionTexto !== '-' && direccionTexto.trim() !== '') {
            let direccionUrl = encodeURIComponent(direccionTexto);
            let src = `https://www.google.com/maps?q=${direccionUrl}&output=embed`;
            let iframe = `<iframe width="100%" height="300" frameborder="0" style="border:0" src="${src}" allowfullscreen loading="lazy"></iframe>`;
            mapaDiv.html(iframe);
        } else {
            mapaDiv.html('<span class="text-muted">No disponible</span>');
        }
    } else {
        mapaDiv.html('<span class="text-muted">No disponible</span>');
    }

    // Mostrar detalles del medicamento
    $('#detalle_entrega_medicamento').text(medicamento);
    $('#detalle_entrega_presentacion').text(presentacion);
    $('#detalle_entrega_posologia').text(posologia);
    $('#detalle_entrega_via').text(viaAdmin);
    $('#detalle_entrega_cantidad').text(cantidad);
    $('#detalle_entrega_fecha_hora').text(fechaEntrega + ' ' + horaEntrega);
    $('#detalle_entrega_observaciones').text(observaciones || '-');

    // Mostrar el modal
    $('#modal_detalle_entrega_realizada').modal('show');
}

// Función para notificar al paciente sobre sus medicamentos en el carrito
function notificarPaciente(rut) {
    if (!rut) return swal('Atención', 'RUT inválido', 'warning');
    // Buscar entregas en el carrito para este rut
    const entregas = carritoEntregasPendientes.filter(e => {
        const p = e.paciente || {};
        const r = (p.rut || p.rut_completo || '').toString().toLowerCase();
        return r === rut.toString().toLowerCase();
    });

    if (!entregas || entregas.length === 0) {
        return swal('Sin entregas', 'No se encontraron entregas asociadas a este paciente en el carrito', 'info');
    }

    const medicamentos = entregas.map(e => e.nombre_medicamento || e.medicamento || e.nombre || '-');
    const pacienteNombre = (entregas[0].paciente && (entregas[0].paciente.nombres || entregas[0].paciente.nombre)) || 'Paciente';

    const listaHtml = `<ul>${medicamentos.map(m => `<li>${m}</li>`).join('')}</ul>`;

    swal({
        title: `Notificar a ${pacienteNombre}?`,
        content: {
            element: 'div',
            attributes: {
                innerHTML: `<p>Se enviará una notificación para los siguientes medicamentos:</p>${listaHtml}`
            }
        },
        buttons: {
            cancel: 'Cancelar',
            confirm: { text: 'Enviar', closeModal: false }
        }
    }).then(async (confirm) => {
        if (!confirm) return;
        // TODO: aquí puede ir una llamada AJAX al backend para enviar la notificación
        // Ejemplo (descomentar y ajustar ruta si existe):
        $.ajax({
            url: '{{ route("adm_cm.cronicos.notificar_entrega") }}', // Ajustar ruta
            method: 'POST',
            data: {
                rut: rut,
                medicamentos: medicamentos,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                swal('Enviado', 'Notificación enviada correctamente', 'success');
            },
            error: function(xhr, status, error) {
                console.error('Error enviando notificación:', error);
                swal('Error', 'Hubo un problema al enviar la notificación', 'error');
            }
        });

        // Simulación frontend
        console.log('📨 Enviando notificación a:', rut, { medicamentos });
        await new Promise(r => setTimeout(r, 600));
        swal('Enviado', 'Notificación enviada correctamente (simulado)', 'success');
    });
}

// Delegar clicks del botón de notificar (se crean dinámicamente)
$(document).on('click', '.notificar-paciente-btn', function() {
    const rut = $(this).data('rut');
    notificarPaciente(rut);
});

// Solicitar la ubicación del usuario mediante una interacción explícita (botón)
async function solicitarUbicacionUsuario() {
    if (!direccionesCarritoMap) {
        // Forzar inicialización del mapa si aún no existe
        try { await mostrarMapaDireccionesCarrito(); } catch (e) {}
    }

    if (!navigator.geolocation) {
        swal('Error', 'Su navegador no soporta geolocalización', 'error');
        return;
    }

    // Indicar al usuario que se solicitará permiso
    swal({
        title: 'Permitir ubicación',
        text: 'Se pedirá permiso al navegador para obtener su ubicación y mostrarla en el mapa.',
        icon: 'info',
        buttons: {
            cancel: 'Cancelar',
            confirm: { text: 'Permitir', closeModal: true }
        }
    }).then(async (ok) => {
        if (!ok) return;
        try {
            const pos = await new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(resolve, reject, { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 });
            });
            const lat = pos.coords.latitude;
            const lon = pos.coords.longitude;
            console.log('📍 Ubicación del usuario (solicitada):', lat, lon);

            if (direccionesCarritoUserMarker) {
                try { direccionesCarritoMap.removeLayer(direccionesCarritoUserMarker); } catch (e) {}
            }
            direccionesCarritoUserMarker = L.marker([lat, lon], { title: 'Mi ubicación' }).addTo(direccionesCarritoMap);
            direccionesCarritoUserMarker.bindPopup('<strong>Mi ubicación</strong>').openPopup();

            try {
                // Intentar ajustar bounds para incluir la ubicación del usuario
                const b = L.latLngBounds();
                direccionesCarritoMarkers.forEach(m => b.extend(m.getLatLng()));
                b.extend([lat, lon]);
                if (b.isValid()) direccionesCarritoMap.fitBounds(b.pad(0.12));
            } catch (e) { console.warn('No se pudo ajustar bounds con la ubicación del usuario', e); }

        } catch (err) {
            console.warn('⚠️ Error obteniendo ubicación del usuario:', err);
            swal('No disponible', 'No se pudo obtener su ubicación (permiso denegado o timeout).', 'warning');
        }
    });
}

function toggleAllEntregasPendientes(masterCheckbox) {
    const checked = masterCheckbox.checked;
    $(".entrega-pendiente-checkbox").each(function() {
        this.checked = checked;
    });
}

/**
 * Seleccionar/deseleccionar todos los medicamentos de un paciente específico
 */
function toggleAllMedicamentosPaciente(checkbox, pacienteIndex) {
    const checked = checkbox.checked;
    $(".entrega-paciente-" + pacienteIndex).each(function() {
        this.checked = checked;
    });
}

/**
 * Al hacer check en el checkbox del encabezado del paciente,
 * seleccionar todos sus medicamentos
 */
function toggleCheckPaciente(checkbox, pacienteIndex) {
    const checked = checkbox.checked;
    // Marcar el check-all interno de la tabla
    $(".check-all-paciente[data-paciente-index='" + pacienteIndex + "']").prop('checked', checked);
    // Marcar todos los checkboxes de medicamentos de ese paciente
    $(".entrega-paciente-" + pacienteIndex).each(function() {
        this.checked = checked;
    });
}

function agregarSeleccionadosAlCarritoPendientes() {
    let nuevos = 0;
    $(".entrega-pendiente-checkbox:checked").each(function() {
        const entrega = $(this).data('entrega');
        // usar carritoEntregasPendientes para entregas pendientes
        let existe = carritoEntregasPendientes.some(e => e.id === entrega.id);
        if (!existe) {
            carritoEntregasPendientes.push(entrega);
            nuevos++;
        }
    });
    // actualizar tabla específica de entregas pendientes
    actualizarTablaEntregasPendientesCarrito();
    if (nuevos > 0) {
        swal('Agregado', nuevos + ' entrega(s) agregada(s) al carrito', 'success');
    } else {
        swal('Sin cambios', 'No se agregaron nuevas entregas al carrito', 'info');
    }
}

// Cargar Leaflet (CSS+JS) dinámicamente si no está presente
function loadLeafletAssets() {
    return new Promise((resolve, reject) => {
        if (window.L) return resolve();
        // CSS
        if (!document.querySelector('link[data-leaflet]')) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
            link.setAttribute('data-leaflet', '1');
            document.head.appendChild(link);
        }
        // JS
        const script = document.createElement('script');
        script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
        script.async = true;
        script.onload = () => { resolve(); };
        script.onerror = () => { reject(new Error('No se pudo cargar Leaflet')); };
        document.head.appendChild(script);
    });
}

// Geocodificar dirección usando Nominatim (OpenStreetMap)
async function geocodeAddress(address) {
    if (!address || address.trim() === '' || address.toUpperCase().includes('SIN DIRECCIÓN')) return null;
    const key = 'geo:' + address.trim().toLowerCase();
    try {
        // Intentar cache en sessionStorage para evitar peticiones repetidas
        const cached = sessionStorage.getItem(key);
        if (cached) {
            if (cached === 'null') return null;
            const obj = JSON.parse(cached);
            return obj;
        }

        const attempt = async (qstr) => {
            const url = `https://nominatim.openstreetmap.org/search?format=json&limit=1&q=${encodeURIComponent(qstr)}`;
            const resp = await fetch(url, { headers: { 'Accept': 'application/json', 'Referer': window.location.origin } });
            if (!resp.ok) return null;
            const data = await resp.json();
            if (data && data.length) return { lat: parseFloat(data[0].lat), lon: parseFloat(data[0].lon) };
            return null;
        };

        // 1) Intento exacto
        let result = await attempt(address);
        // 2) Intento con país para mejorar precisión
        if (!result) result = await attempt(address + ', Chile');
        // 3) Si aún no, intentar geocode solo la ciudad/comuna (último segmento tras coma)
        if (!result && address.includes(',')) {
            const parts = address.split(',').map(s => s.trim()).filter(Boolean);
            const city = parts[parts.length - 1];
            if (city && city.length > 2) {
                result = await attempt(city + ', Chile');
            }
        }

        // Guardar en cache (incluso si es null)
        try { sessionStorage.setItem(key, JSON.stringify(result)); } catch (e) { /* ignore */ }
        return result;
    } catch (e) {
        console.warn('⚠️ Error geocoding:', address, e);
        try { sessionStorage.setItem(key, 'null'); } catch (e2) {}
    }
    return null;
}

function clearDireccionesCarritoMarkers() {
    if (!direccionesCarritoMap) return;
    direccionesCarritoMarkers.forEach(m => direccionesCarritoMap.removeLayer(m));
    direccionesCarritoMarkers = [];
}

// Mostrar mapa con marcadores para las direcciones del carrito
async function mostrarMapaDireccionesCarrito() {
    try {
        await loadLeafletAssets();
    } catch (e) {
        console.warn('Leaflet no cargó:', e);
        return;
    }

    const mapContainer = document.getElementById('direcciones_carrito_mapa');
    if (!mapContainer) return;

    // Inicializar mapa si no existe
    if (!direccionesCarritoMap) {
        direccionesCarritoMap = L.map(mapContainer).setView([-33.45, -70.6667], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(direccionesCarritoMap);
    }

    clearDireccionesCarritoMarkers();

    // Recolectar direcciones únicas del carrito
    const direcciones = [];
    const seen = {};
    carritoEntregasPendientes.forEach(entrega => {
        const paciente = (entrega && (entrega.paciente || entrega.paciente_data || entrega.pacienteInfo)) || {};
        const rut = paciente.rut || paciente.rut_completo || '-';
        let direccionTexto = '';
        const origenDir = (entrega && entrega.direccion && Object.keys(entrega.direccion).length) ? entrega.direccion :
                          (paciente && paciente.direccion && Object.keys(paciente.direccion || {}).length) ? paciente.direccion :
                          (Array.isArray(paciente.direcciones) && paciente.direcciones.length ? paciente.direcciones[0] : null);
        direccionTexto = obtenerDireccionDesdeObjeto(origenDir) || '';
        if (!direccionTexto || direccionTexto.trim() === '') {
            const posibles = [paciente && paciente.calle, paciente && paciente.calle_principal, paciente && paciente.domicilio, paciente && paciente.direccion_texto];
            direccionTexto = (posibles.filter(Boolean).join(' ') || '').trim();
        }
        const ciudad = obtenerCiudadDesdeObjeto(origenDir);
        if (ciudad) direccionTexto = direccionTexto ? direccionTexto + ', ' + ciudad : ciudad;

        // Si no se encontró dirección localmente, usar el caché (llenado por abrirModalDireccionesCarrito o fetchDireccionPorRut)
        if ((!direccionTexto || direccionTexto.trim() === '') && rut && rut !== '-' && direccionesCarritoCache[rut]) {
            direccionTexto = direccionesCarritoCache[rut];
        }

        if (direccionTexto && direccionTexto.trim() !== '' && direccionTexto.indexOf('SIN DIRECCIÓN') === -1) {
            if (!seen[rut + '||' + direccionTexto]) {
                direcciones.push({ rut, nombre: (paciente.nombres || paciente.nombre || '-'), direccion: direccionTexto });
                seen[rut + '||' + direccionTexto] = true;
            }
        }
    });

    if (direcciones.length === 0) {
        // No hay direcciones para mapear
        mapContainer.innerHTML = '<div class="text-center text-muted p-3">No hay direcciones válidas para mostrar en el mapa</div>';
        return;
    }

    // Geocodificar secuencialmente (respeto de rate limit)
    const bounds = L.latLngBounds();
    for (let i = 0; i < direcciones.length; i++) {
        const d = direcciones[i];
        // pequeña espera entre peticiones para evitar rate limits
        if (i > 0) await new Promise(r => setTimeout(r, 900));
        const coord = await geocodeAddress(d.direccion);
        if (coord) {
            const marker = L.marker([coord.lat, coord.lon]).addTo(direccionesCarritoMap);
            marker.bindPopup(`<strong>${d.nombre}</strong><br>${d.direccion}`);
            direccionesCarritoMarkers.push(marker);
            bounds.extend([coord.lat, coord.lon]);
        } else {
            console.warn('No se obtuvo coordenada para:', d.direccion);
        }
    }

    if (!bounds.isValid()) {
        // No se obtuvo ninguna coordenada válida
        direccionesCarritoMap.setView([-33.45, -70.6667], 6);
    } else {
        direccionesCarritoMap.fitBounds(bounds.pad(0.25));
    }

    // Forzar resize en caso de que el modal haya cambiado tamaño
    setTimeout(() => { try { direccionesCarritoMap.invalidateSize(); } catch (e) {} }, 300);

    // Intentar obtener la ubicación actual del usuario y mostrarla en el mapa
    try {
        const getCurrentPosition = (opts = {}) => new Promise((resolve, reject) => {
            if (!navigator.geolocation) return reject(new Error('Geolocalización no soportada'));
            let done = false;
            const success = pos => { if (!done) { done = true; resolve(pos); } };
            const error = err => { if (!done) { done = true; reject(err); } };
            navigator.geolocation.getCurrentPosition(success, error, opts);
            // timeout fallback
            setTimeout(() => { if (!done) { done = true; reject(new Error('timeout')); } }, 8000);
        });

        try {
            const pos = await getCurrentPosition({ enableHighAccuracy: true, maximumAge: 0, timeout: 8000 });
            const lat = pos.coords.latitude;
            const lon = pos.coords.longitude;
            console.log('📍 Ubicación del usuario obtenida:', lat, lon);
            // remover marcador previo si existe
            if (direccionesCarritoUserMarker) {
                try { direccionesCarritoMap.removeLayer(direccionesCarritoUserMarker); } catch (e) {}
            }
            direccionesCarritoUserMarker = L.marker([lat, lon], { title: 'Mi ubicación' }).addTo(direccionesCarritoMap);
            direccionesCarritoUserMarker.bindPopup('<strong>Mi ubicación</strong>');
            // Extender bounds para incluir la ubicación del usuario
            try { if (typeof bounds !== 'undefined' && bounds.isValid()) bounds.extend([lat, lon]); } catch (e) {}

            // Reajustar vista si hay bounds válidos
            try {
                if (typeof bounds !== 'undefined' && bounds.isValid()) {
                    direccionesCarritoMap.fitBounds(bounds.pad(0.12));
                }
            } catch (e) { /* ignore */ }

        } catch (err) {
            console.warn('⚠️ No se pudo obtener ubicación del usuario (permiso/timeout):', err);
        }
    } catch (e) {
        console.warn('⚠️ Error durante intento de geolocalización:', e);
    }
}

function actualizarTablaEntregasPendientesCarrito() {
    const tbody = $('#entregas_pendientes_carrito tbody');
    tbody.empty();
    if (carritoEntregasPendientes.length === 0) {
        tbody.html('<tr><td colspan="7" class="text-center text-muted">No hay entregas en el carrito</td></tr>');
        return;
    }
    carritoEntregasPendientes.forEach((entrega, idx) => {
        let paciente = entrega.paciente || {};
        let nombreCompleto = (paciente.nombres || '-') + ' ' + (paciente.apellido_uno || '') + ' ' + (paciente.apellido_dos || '');
        let rut = paciente.rut || '-';
        let medicamento = entrega.nombre_medicamento || '-';
        let fecha = entrega.fecha_entrega ? entrega.fecha_entrega : '-';
        let estado = '-';
        if (entrega.estado == 1) estado = '<span class="badge badge-success">Próxima</span>';
        else if (entrega.estado == 2) estado = '<span class="badge badge-danger">Vencida</span>';
        else estado = '<span class="badge badge-secondary">Desconocido</span>';
        tbody.append(`
            <tr>
                <td class="text-center"><input type="checkbox" class="entrega-pendiente-carrito-checkbox" value="${entrega.id}"></td>
                <td class="text-center">${nombreCompleto}</td>
                <td class="text-center">${rut}</td>
                <td class="text-center">${medicamento}</td>
                <td class="text-center">${fecha}</td>
                <td class="text-center">${estado}</td>
                <td class="text-center">
                    <button class="btn btn-danger btn-sm" onclick="quitarDelCarritoEntregasPendientesCarrito(${idx})"><i class="feather icon-trash-2"></i></button>
                </td>
            </tr>
        `);
    });
}

function quitarDelCarritoEntregasPendientesCarrito(idx) {
    carritoEntregasPendientes.splice(idx, 1);
    actualizarTablaEntregasPendientesCarrito();
}

function toggleAllEntregasPendientesCarrito(masterCheckbox) {
    const checked = masterCheckbox.checked;
    $(".entrega-pendiente-carrito-checkbox").each(function() {
        this.checked = checked;
    });
}

// Mantener el checkbox maestro en sync cuando se marcan/desmarcan filas individuales
$(document).on('change', '.entrega-pendiente-carrito-checkbox', function() {
    const total = $('.entrega-pendiente-carrito-checkbox').length;
    const checked = $('.entrega-pendiente-carrito-checkbox:checked').length;
    $('#check_all_entregas_pendientes_carrito').prop('checked', total > 0 && checked === total);
});

$(document).ready(function() {
    $('#medicamentos_cronicos').DataTable({
        // Configuración de DataTable
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
        }
    });
});

// Función para buscar paciente
function buscarPaciente() {
    const rut = $('#buscar_rut').val().trim();
    const nombre = $('#buscar_nombre').val().trim();

    if (!rut && !nombre) {
        swal('Atención', 'Ingrese RUT o nombre del paciente', 'warning');
        return;
    }

    // Llamada AJAX para buscar pacientes
    $.ajax({
        url: '{{ route("agenda.buscar_rut_paciente") }}',
        method: 'get',
        data: {
            rut: rut,
            id_profesional: "{{ Auth::user()->profesional_id }}",
            _token: '{{ csrf_token() }}'
        },
        beforeSend: function() {
            $('#buscar_paciente_btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Buscando...');
        },
        success: function(response) {
            console.log(response);
            let paciente = JSON.parse(response);
            console.log(paciente);
            if (paciente) {
                if (paciente) {
                    mostrarPacienteSeleccionado(paciente);
                    cargarMedicamentosCronicos(paciente.id);
                } else {
                    // Si hay múltiples resultados, mostrar lista para seleccionar
                    mostrarListaPacientes(paciente.pacientes);
                }
            } else {
                swal('Sin resultados', 'No se encontraron pacientes con ese criterio', 'info');
            }
        },
        error: function() {
            swal('Error', 'Error al buscar pacientes', 'error');
        },
        complete: function() {
            $('#buscar_paciente_btn').prop('disabled', false).html('<i class="feather icon-search"></i> Buscar');
        }
    });
}

// Función para mostrar lista de pacientes cuando hay múltiples resultados
function mostrarListaPacientes(pacientes) {
    let html = '<div class="list-group" style="max-height: 300px; overflow-y: auto;">';
    pacientes.forEach(function(paciente, index) {
        html += `
            <a href="#" class="list-group-item list-group-item-action" onclick="seleccionarPacienteDeLista(${index}); return false;">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">${paciente.nombres} ${paciente.apellido_uno}</h6>
                    <small>${paciente.rut}</small>
                </div>
                <p class="mb-1">Teléfono: ${paciente.telefono_uno || 'No registrado'}</p>
                <small class="text-muted">📍 ${paciente.direccion && paciente.direccion.direccion ? paciente.direccion.direccion : 'Sin dirección'}</small>
            </a>
        `;
    });
    html += '</div>';

    // Guardar en variable temporal para que sea accesible
    window.pacientesListaModal = pacientes;

    swal({
        title: 'Seleccione un paciente',
        content: {
            element: "div",
            attributes: {
                innerHTML: html
            }
        },
        button: "Cancelar"
    });
}

// Función para seleccionar un paciente de la lista modal
function seleccionarPacienteDeLista(index) {
    const paciente = window.pacientesListaModal[index];
    if (paciente) {
        swal.close();
        mostrarPacienteSeleccionado(paciente);
        cargarMedicamentosCronicos(paciente.id);
    }
}

// Función para seleccionar un paciente de la lista
function seleccionarPaciente(id, rut, nombres, apellido_uno, telefono_uno) {
    const paciente = { id, rut, nombres, apellido_uno, telefono_uno };
    swal.close();
    mostrarPacienteSeleccionado(paciente);
    cargarMedicamentosCronicos(id);
}

// Función para mostrar información del paciente
function mostrarPacienteSeleccionado(paciente) {
    pacienteSeleccionado = paciente;

    $('#paciente_id').val(paciente.id);
    $('#EntregaMedicamentoCronico').text(paciente.rut);
    $('#paciente_nombre').text(paciente.nombres + ' ' + paciente.apellido_uno);
    $('#paciente_fecha_nac').text(paciente.fecha_nac || 'No registrada');
    $('#paciente_telefono').text(paciente.telefono_uno || 'No registrado');

    // Mostrar dirección si existe (Laravel puede devolver Direccion con D mayúscula)
    const dirObj = paciente.Direccion || paciente.direccion || null;
    let direccionTexto = 'No registrada';
    if (dirObj) {
        const ciudadNombre = dirObj.Ciudad?.nombre || dirObj.ciudad?.nombre || '';
        direccionTexto = (dirObj.direccion || '').trim();
        if (ciudadNombre) direccionTexto = direccionTexto ? direccionTexto + ', ' + ciudadNombre : ciudadNombre;
        if (!direccionTexto) direccionTexto = 'No registrada';
    }
    $('#paciente_direccion').text(direccionTexto);
    console.log('📍 Dirección del paciente:', direccionTexto);

    $('#paciente_seleccionado').show();
    $('#medicamentos_section').show();
    $('#medicamentos_info').html(`Medicamentos crónicos de: <strong>${paciente.nombres} ${paciente.apellido_uno}</strong>`);
}

// Función para cargar medicamentos crónicos - OPTIMIZADA
function cargarMedicamentosCronicos(idPaciente) {
    var data = {};
    var url = '{{Request::root()}}/api/antecedente/ver_registros';
    var tipo = 7; // Tipo para medicamentos crónicos

    data.id_tipo_antecedente = tipo;
    data.estado = 1;
    data.id_paciente = idPaciente;

    console.log('💊 Cargando medicamentos crónicos (tipo 7) para paciente:', idPaciente);
    console.log('📋 Datos enviados:', data);

    $.ajax({
        url: url,
        type: "GET",
        data: data,
        beforeSend: function() {
            $('#medicamentos_tbody').html('<tr><td colspan="7" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando medicamentos...</td></tr>');
        },
        success: function(response) {
            console.log('📊 Respuesta de medicamentos:', response);

            if (response.estado == 1 && response.registros) {
                console.log('💊 Registros de medicamentos encontrados:', response.registros);
                medicamentosCronicos = response.registros;
                actualizarTablaMedicamentos();
            } else {
                $('#medicamentos_tbody').html('<tr><td colspan="7" class="text-center text-muted">Sin medicamentos registrados</td></tr>');
            }
        },
        error: function(err) {
            console.error('❌ Error cargando medicamentos:', err);
            $('#medicamentos_tbody').html('<tr><td colspan="7" class="text-center text-danger">Error al cargar medicamentos</td></tr>');
        }
    });
}

const cargarRegistrosAntecedentes = (tipo) => {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registros';
        var id_paciente = $('#id_paciente').val();
        data.id_tipo_antecedente = 7;
        data.estado = 1;
        data.id_paciente = id_paciente;

        // Debug para tipo 7
        if(tipo == 7) {
            console.log('🔍 Cargando medicamentos crónicos (tipo 7)');
            console.log('📋 Datos enviados:', data);
        }

        $.ajax({
            url: url,
            type: "GET",
            data: data,
            success: (resp)=>{
                console.log(`📊 Respuesta para tipo ${tipo}:`, resp);

                if(resp.estado==1)
                {
                    var html_ = '';
                    var permiso_ = '';
                    var id_users = parseInt($('#user-id').val());

                    // Debug específico para tipo 7
                    if(tipo == 7) {
                        console.log('💊 Registros de medicamentos encontrados:', resp.registros);
                        console.log('🔢 Cantidad de registros:', resp.registros ? resp.registros.length : 0);
                    }

                    resp.registros.forEach(e => {

                        permiso_ = '';
                        if(e.id_users == id_users)
                        permiso_ = `
                            <buttom class="btn btn-icon btn-info feather icon-edit-2" onclick="verModalAgregar('show',${tipo},${e.id})"></buttom>
                            <buttom class="btn btn-icon btn-danger feather icon-x-square" onclick="verModalDesactivar('show',${tipo},${e.id})"></buttom>
                        `;

                        // Debug para cada registro tipo 7
                        if(tipo == 7) {
                            console.log('💊 Procesando medicamento:', e.antecedente_data);
                        }

                        switch(tipo)
                        {
                            case 1:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 2:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional}<br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 3:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 4:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.profesional}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 5:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.institucion}</td>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 6:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 7:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre_medicamento_cronico || 'Sin nombre'}</td>
                                        <td>${e.antecedente_data.dosis || 'Sin dosis'}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 8:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.discapacidad_tipo}</td>
                                        <td>${e.antecedente_data.discapacidad_grado}</td>
                                        <td>${e.antecedente_data.discapacidad_permanente}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                        }

                    });

                // Debug final para tipo 7
                if(tipo == 7) {
                    console.log('🎯 HTML generado para medicamentos:', html_);
                    console.log('📍 Insertando en:', '#bloque-registros-7');
                }

                $('#bloque-registros-'+tipo).html(html_);
                }
            },
            error: (resp)=>{
                console.warn(`❌ Error cargando tipo ${tipo}:`, resp);
            }
        });
    }

// Función para actualizar tabla de medicamentos - OPTIMIZADA (basada en cargarRegistrosAntecedentes)
function actualizarTablaMedicamentos() {
    const tbody = $('#medicamentos_tbody');
    tbody.empty();

    if (medicamentosCronicos.length === 0) {
        tbody.html('<tr><td colspan="8" class="text-center text-muted">No hay medicamentos registrados</td></tr>');
        return;
    }

    var id_users = parseInt($('#user-id').val());
    var permiso_ = '';

    medicamentosCronicos.forEach((registro, index) => {
        const med = registro.antecedente_data;

        // Mapeo inteligente de campos - adaptar los datos que vienen del servidor
        // Los medicamentos pueden tener diferentes estructuras de datos
        const nombre = med.nombre_medicamento_cronico || med.nombre || 'Sin nombre';

        // Dosis: preferir presentacion primero, luego dosis
        const dosis = med.presentacion || med.dosis || 'No especificada';

        // Frecuencia: usar posologia primero, luego frecuencia
        const frecuencia = med.posologia || med.frecuencia || 'No especificada';

        // Próxima entrega: buscar en varios campos posibles
        const proximaEntrega = med.proxima_entrega || med.fecha_regitro || med.fecha || 'No definida';

        // Stock disponible: buscar en varios campos
        const stockDisponible = med.stock_disponible !== undefined ? med.stock_disponible : 1;

        // Vía de administración (dato adicional útil)
        const viaAdmin = med.via_administracion || 'No especificada';

        // Determinar permisos de edición (solo si el registro es del usuario actual)
        permiso_ = '';
        if(registro.id_users == id_users)
        {
            permiso_ = `
                <button class="btn btn-sm btn-info" onclick="verModalAgregar('show', 7, ${registro.id})" title="Editar"><i class="feather icon-edit-2"></i></button>
                <button class="btn btn-sm btn-danger" onclick="verModalDesactivar('show', 7, ${registro.id})" title="Eliminar"><i class="feather icon-x"></i></button>
            `;
        }
        else
        {
            permiso_ = '<span class="text-muted text-sm">No disponible</span>';
        }

        console.log('💊 Procesando medicamento:', {
            nombre: nombre,
            dosis: dosis,
            frecuencia: frecuencia,
            proximaEntrega: proximaEntrega,
            stockDisponible: stockDisponible,
            viaAdmin: viaAdmin,
            datosOriginales: med
        });

        const fila = `
            <tr>
                <td class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input medicamento-checkbox" id="med_${registro.id}" value="${index}">
                        <label class="custom-control-label" for="med_${registro.id}"></label>
                    </div>
                </td>
                <td class="text-center"><strong>${index + 1}</strong></td>
                <td>
                    <div><strong>${nombre}</strong></div>
                    <small class="text-muted">${viaAdmin}</small>
                </td>
                <td class="text-center">
                    <small>${dosis}</small>
                </td>
                <td class="text-center">
                    <small>${frecuencia}</small>
                </td>
                <td class="text-center">
                    <small>${proximaEntrega}</small>
                </td>
                <td class="text-center">
                    <span class="badge badge-${stockDisponible > 0 ? 'success' : 'warning'}">
                        ${stockDisponible > 0 ? '✓ Disponible' : '✗ Agotado'}
                    </span>
                </td>
                <td class="text-center">
                    ${permiso_}
                </td>
            </tr>
        `;
        tbody.append(fila);
    });

    console.log('🎯 Tabla de medicamentos actualizada con ' + medicamentosCronicos.length + ' medicamentos');
}

// Opción A: Agregar medicamentos directamente al carrito sin necesidad de modal
// Los medicamentos ya tienen todos los datos configurados (presentación, posología, cantidad)
// Las dosis YA NO se cargan dinámicamente - vienen configuradas desde el registro del medicamento
// Función para obtener las dosis disponibles de un medicamento (FUNCIÓN HEREDADA - NO SE USA ACTUALMENTE)
function getDosisParaMedicamento(idMedicamento, indexCarrito) {
    // Esta función se mantiene por compatibilidad pero NO se utiliza
    // Las dosis ya vienen configuradas en el momento del registro del medicamento
    console.log('⚠️ FUNCIÓN HEREDADA: getDosisParaMedicamento NO se usa - las dosis vienen configuradas');
}

// Función para extraer cantidad de formato "(1) Una   caja" → 1
function extraerCantidad(cantidadString) {
    if (!cantidadString) return 1;

    try {
        // Extraer el número entre paréntesis: (1) → 1
        const match = cantidadString.match(/\((\d+)\)/);
        if (match && match[1]) {
            const cantidad = parseInt(match[1]);
            return isNaN(cantidad) ? 1 : cantidad;
        }
    } catch (e) {
        console.warn('⚠️ Error al extraer cantidad:', e);
    }
    return 1;
}

// Función para actualizar dosis en el carrito (YA NO SE USA - las dosis vienen configuradas)
function actualizarDosisCarrito(indexCarrito, dosisSeleccionada) {
    if (indexCarrito >= 0 && indexCarrito < carritoEntrega.length) {
        carritoEntrega[indexCarrito].dosis = dosisSeleccionada;
        console.log(`📝 Dosis actualizada para ${carritoEntrega[indexCarrito].nombre}: ${dosisSeleccionada}`);
    }
}

function entregarMedicamentos() {
    if (!pacienteSeleccionado) {
        swal('Atención', 'Seleccione un paciente primero', 'warning');
        return;
    }

    // Obtener medicamentos seleccionados desde los checkboxes
    const indicesSeleccionados = [];
    $('.medicamento-checkbox:checked').each(function() {
        indicesSeleccionados.push(parseInt($(this).val()));
    });

    if (indicesSeleccionados.length === 0) {
        swal('Atención', 'Seleccione al menos un medicamento para agregar al carrito', 'warning');
        return;
    }

    console.log('🛒 Agregando medicamentos al carrito (datos ya configurados). Índices:', indicesSeleccionados);

    let contadorAgregados = 0;
    let contadorDuplicados = 0;

    // Agregar cada medicamento seleccionado al carrito CON LOS DATOS YA EXISTENTES
    indicesSeleccionados.forEach(index => {
        if (index >= 0 && index < medicamentosCronicos.length) {
            const registro = medicamentosCronicos[index];
            const med = registro.antecedente_data;

            // Verificar si ya está en el carrito
            const itemCarrito = carritoEntrega.find(item => item.id === registro.id);

            if (itemCarrito) {
                console.log('⚠️ Medicamento duplicado:', med.nombre_medicamento_cronico);
                contadorDuplicados++;
            } else {
                // Obtener id_medicamento del registro (busca también en id_articulo)
                const idMedicamento = med.id_medicamento || med.id_articulo || registro.id_medicamento || null;

                // Mapeo inteligente de campos - misma lógica que actualizarTablaMedicamentos
                const nombre = med.nombre_medicamento_cronico || med.nombre || 'Sin nombre';
                const dosis = med.presentacion || med.dosis || 'No especificada';
                const frecuencia = med.posologia || med.frecuencia || 'No especificada';
                const viaAdmin = med.via_administracion || 'No especificada';

                // Extraer cantidad del campo cantidad que viene como "(1) Una   caja"
                const cantidadExtraida = extraerCantidad(med.cantidad);
                const cantidadTexto = med.cantidad || '(1) Una caja'; // Guardar el texto original para mostrar

                // Agregar al carrito DIRECTAMENTE con los datos que ya están configurados
                const nuevoItem = {
                    id: registro.id,
                    id_medicamento: idMedicamento, // ID crucal para obtener dosis dinámicamente
                    nombre: nombre,
                    dosis: dosis,
                    frecuencia: frecuencia,
                    viaAdmin: viaAdmin,
                    cantidad: cantidadExtraida,
                    cantidadTexto: cantidadTexto, // Guardar el texto original
                    registro: registro
                };
                carritoEntrega.push(nuevoItem);
                contadorAgregados++;
                console.log('✅ Medicamento agregado:', nombre, '| ID Med:', idMedicamento, '| Dosis:', dosis, '| Freq:', frecuencia, '| Cantidad:', cantidadExtraida);
            }
        }
    });

    // Actualizar carrito
    actualizarCarrito();

    // Desmarcar checkboxes después de agregar
    $('.medicamento-checkbox').prop('checked', false);

    // Mostrar resultado
    let mensaje = `Se agregaron ${contadorAgregados} medicamento(s) al carrito`;
    if (contadorDuplicados > 0) {
        mensaje += ` (${contadorDuplicados} ya estaban en el carrito)`;
    }
    swal('Éxito', mensaje, 'success');
}

// Función para limpiar búsqueda
function limpiarBusqueda() {
    $('#buscar_rut').val('');
    $('#buscar_nombre').val('');
    $('#paciente_seleccionado').hide();
    $('#medicamentos_section').hide();
    $('#carrito_section').hide();
    pacienteSeleccionado = null;
    medicamentosCronicos = [];
    carritoEntrega = [];
}

// Función para agregar medicamento al carrito
function agregarAlCarrito(index) {
    if (index < 0 || index >= medicamentosCronicos.length) {
        swal('Error', 'Medicamento no válido', 'error');
        return;
    }

    const registro = medicamentosCronicos[index];
    const med = registro.antecedente_data;

    // Verificar si el medicamento ya está en el carrito
    const itemCarrito = carritoEntrega.find(item => item.id === registro.id);

    if (itemCarrito) {
        swal('Atención', 'Este medicamento ya está en el carrito', 'info');
        return;
    }

    // Obtener id_medicamento del registro
    const idMedicamento = med.id_medicamento || registro.id_medicamento || null;

    // Mapeo inteligente de campos - misma lógica que actualizarTablaMedicamentos
    const nombre = med.nombre_medicamento_cronico || med.nombre || 'Sin nombre';
    const dosis = med.presentacion || med.dosis || 'No especificada';
    const frecuencia = med.posologia || med.frecuencia || 'No especificada';
    const viaAdmin = med.via_administracion || 'No especificada';

    // Extraer cantidad del campo cantidad que viene como "(1) Una   caja"
    const cantidadExtraida = extraerCantidad(med.cantidad);
    const cantidadTexto = med.cantidad || '(1) Una caja'; // Guardar el texto original para mostrar

    // Agregar al carrito
    carritoEntrega.push({
        id: registro.id,
        id_medicamento: idMedicamento,
        nombre: nombre,
        dosis: dosis,
        frecuencia: frecuencia,
        viaAdmin: viaAdmin,
        cantidad: cantidadExtraida,
        cantidadTexto: cantidadTexto
    });

    console.log('✅ Medicamento agregado al carrito:', nombre);
    actualizarCarrito();
    swal('Éxito', `${nombre} fue agregado al carrito`, 'success');
}

// Función para actualizar vista del carrito
function actualizarCarrito() {
    const tbody = $('#carrito_tbody');
    const carritoSection = $('#carrito_section');

    if (carritoEntrega.length === 0) {
        tbody.html('<tr><td colspan="6" class="text-center text-muted">El carrito está vacío</td></tr>');
        carritoSection.hide();
        return;
    }

    carritoSection.show();
    tbody.empty();

    let total = 0;

    carritoEntrega.forEach((item, index) => {
        const fila = `
            <tr>
                <td class="text-center"><strong>${index + 1}</strong></td>
                <td>
                    <strong>${item.nombre}</strong>
                    <br><small class="text-muted">${item.viaAdmin || 'No especificada'}</small>
                </td>
                <td class="text-center">
                    <small>${item.dosis}</small>
                </td>
                <td class="text-center">
                    <small>${item.frecuencia}</small>
                </td>
                <td class="text-center">
                    <small><strong>${item.cantidadTexto || item.cantidad + ' unidades'}</strong></small>
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-danger" onclick="eliminarDelCarrito(${index})" title="Eliminar">
                        <i class="feather icon-trash-2"></i>
                    </button>
                </td>
            </tr>
        `;
        tbody.append(fila);
        total++;
    });

    $('#confirmar_carrito_btn').show();
    console.log('🛒 Carrito actualizado. Total items:', total);
}

// Función para actualizar cantidad en el carrito
function actualizarCantidadCarrito(index, cantidad) {
    if (index >= 0 && index < carritoEntrega.length) {
        carritoEntrega[index].cantidad = parseInt(cantidad) || 1;
        console.log(`📝 Cantidad actualizada para ${carritoEntrega[index].nombre}: ${carritoEntrega[index].cantidad}`);
    }
}

// Función para eliminar medicamento del carrito
function eliminarDelCarrito(index) {
    if (index >= 0 && index < carritoEntrega.length) {
        const nombre = carritoEntrega[index].nombre;
        carritoEntrega.splice(index, 1);
        console.log(`🗑️ Medicamento eliminado del carrito: ${nombre}`);
        actualizarCarrito();
        swal('Eliminado', `${nombre} fue removido del carrito`, 'success');
    }
}

// Función para limpiar el carrito
function limpiarCarrito() {
    swal({
        title: '¿Limpiar carrito?',
        text: 'Se eliminarán todos los medicamentos del carrito',
        icon: 'warning',
        buttons: {
            cancel: 'Cancelar',
            confirm: 'Limpiar'
        },
        dangerMode: true
    })
    .then((confirmar) => {
        if (confirmar) {
            carritoEntrega = [];
            actualizarCarrito();
            swal('Carrito Limpio', 'Se removieron todos los medicamentos', 'success');
        }
    });
}

// Función para confirmar entrega desde el carrito
function confirmarCarrito() {
    if (carritoEntrega.length === 0) {
        swal('Atención', 'El carrito está vacío', 'warning');
        return;
    }

    // Mostrar modal de entrega con datos del carrito
    const nombreCompleto = pacienteSeleccionado.nombres + ' ' + pacienteSeleccionado.apellido_uno;
    $('#entrega_paciente').text(nombreCompleto);

    // Mostrar dirección en el modal (Laravel puede devolver Direccion con D mayúscula)
    const dirModalObj = pacienteSeleccionado.Direccion || pacienteSeleccionado.direccion || null;
    let direccionTexto = 'No registrada';
    if (dirModalObj) {
        const ciudadNombre = dirModalObj.Ciudad?.nombre || dirModalObj.ciudad?.nombre || '';
        direccionTexto = (dirModalObj.direccion || '').trim();
        if (ciudadNombre) direccionTexto = direccionTexto ? direccionTexto + ', ' + ciudadNombre : ciudadNombre;
        if (!direccionTexto) direccionTexto = 'No registrada';
    }
    $('#entrega_direccion').text(direccionTexto);

    $('#entrega_fecha').val(new Date().toISOString().split('T')[0]);

    // Construir tabla con la información del carrito
    const medicamentosHtml = `
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center" style="width:5%">#</th>
                        <th style="width:35%">Medicamento</th>
                        <th class="text-center" style="width:20%">Presentación</th>
                        <th class="text-center" style="width:20%">Posología</th>
                        <th class="text-center" style="width:20%">Cantidad a Entregar</th>
                    </tr>
                </thead>
                <tbody>
                    ${carritoEntrega.map((item, index) => `
                        <tr>
                            <td class="text-center"><strong>${index + 1}</strong></td>
                            <td>
                                <strong>${item.nombre}</strong>
                                <br><small class="text-muted">${item.viaAdmin}</small>
                            </td>
                            <td class="text-center"><small>${item.dosis}</small></td>
                            <td class="text-center"><small>${item.frecuencia}</small></td>
                            <td class="text-center">
                                <small><strong>${item.cantidadTexto || item.cantidad + ' unidades'}</strong></small>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        </div>
    `;

    $('#medicamentos_entrega').html(medicamentosHtml);
    $('#modal_entrega').modal('show');
}

// Función para confirmar entrega final
function confirmarEntregaFinal() {
    if (carritoEntrega.length === 0) {
        swal('Atención', 'El carrito está vacío', 'warning');
        return;
    }

    const observaciones = $('#entrega_observaciones').val();

    // Preparar array de medicamentos para enviar
    const medicamentos_array = carritoEntrega.map(function(item) {
        return {
            medicamento_id: item.id,
            cantidad_entregada: item.cantidad,
            id_paciente: $('#paciente_id').val(),
            observaciones: item.observaciones || null
        };
    });

    console.log('🏥 Enviando array de medicamentos para registrar:', medicamentos_array);

    $('#confirmar_entrega_btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Registrando...');

    // Enviar TODO el array en una sola request
    $.ajax({
        url: '{{ route("adm_cm.cronicos.registrar_entrega") }}',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            medicamentos: medicamentos_array,
            observaciones: observaciones,
            id_paciente: $('#paciente_id').val(),
            _token: '{{ csrf_token() }}'
        }),
        success: function(response) {
            console.log('✅ Respuesta del servidor:', response);
            if (response.success) {
                $('#modal_entrega').modal('hide');
                carritoEntrega = []; // Limpiar carrito
                actualizarCarrito();
                swal('Éxito', response.message || 'Entregas registradas correctamente', 'success');
                cargarMedicamentosCronicos(pacienteSeleccionado.id); // Recargar medicamentos
            } else {
                swal('Advertencia', response.message || 'Algunas entregas no pudieron registrarse', 'warning');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('❌ Error al registrar entregas:', jqXHR.responseJSON);
            const mensajeError = jqXHR.responseJSON?.message || 'Error al registrar entregas';
            swal('Error', mensajeError, 'error');
        },
        complete: function() {
            $('#confirmar_entrega_btn').prop('disabled', false).html('<i class="feather icon-check"></i> Registrar Entrega');
        }
    });
}

// Función para editar medicamento
function editarMedicamento(medicamentoId) {
    // Integración con sistema de antecedentes tipo 7
    console.log('✏️ Editando medicamento:', medicamentoId);
    verModalAgregar('show', 7, medicamentoId);
}

// Función para eliminar medicamento
function eliminarMedicamento(medicamentoId) {
    // Integración con sistema de antecedentes tipo 7
    console.log('🗑️ Eliminando medicamento:', medicamentoId);
    verModalDesactivar('show', 7, medicamentoId);
}

// Función para cargar dosis disponibles de un medicamento
// Opción A: No necesitamos cargar dosis por modal
// Los medicamentos ya vienen con sus datos configurados desde el sistema

// Evento para marcar checkboxes (solo registrar la selección visual)
$(document).on('change', '.medicamento-checkbox', function() {
    const index = parseInt($(this).val());
    if (index >= 0 && index < medicamentosCronicos.length) {
        const registro = medicamentosCronicos[index];
        const med = registro.antecedente_data;
        if ($(this).is(':checked')) {
            console.log('✓ Seleccionado:', med.nombre_medicamento_cronico);
        } else {
            console.log('✗ Deseleccionado:', med.nombre_medicamento_cronico);
        }
    }
});

// Inicialización al cargar la página
$(document).ready(function() {
    // Configuración inicial
    console.log('🏥 Sistema de Medicamentos Crónicos cargado');

    // Permitir buscar paciente con Enter
    $('#buscar_rut, #buscar_nombre').on('keypress', function(e) {
        if (e.which === 13) {
            buscarPaciente();
        }
    });
});

// Busca la dirección de un paciente por RUT y actualiza la celda TD indicada.
// Devuelve una Promise que resuelve cuando la petición termina (éxito o error).
function fetchDireccionPorRut(rut, tdElement) {
    return new Promise(function(resolve) {
        $.get('{{ route("agenda.buscar_rut_paciente") }}', {
            rut: rut,
            id_profesional: "{{ Auth::user()->profesional_id }}"
        }, function(response) {
            try {
                const pac = typeof response === 'string' ? JSON.parse(response) : response;
                const dirObj = pac.Direccion || pac.direccion || null;
                if (dirObj && dirObj.direccion) {
                    let texto = (dirObj.direccion || '').trim();
                    const ciudad = dirObj.Ciudad?.nombre || dirObj.ciudad?.nombre || '';
                    if (ciudad) texto = texto ? texto + ', ' + ciudad : ciudad;
                    if (texto) {
                        $(tdElement).text(texto);
                        direccionesCarritoCache[rut] = texto; // Guardar en caché para el mapa
                        console.log('📍 Dirección obtenida para RUT', rut, ':', texto);
                    } else {
                        $(tdElement).text('(Sin dirección registrada)');
                    }
                } else {
                    $(tdElement).text('(Sin dirección registrada)');
                }
            } catch(e) {
                console.warn('⚠️ Error al parsear dirección para RUT', rut, e);
                $(tdElement).text('(Sin dirección registrada)');
            }
            resolve();
        }).fail(function() {
            $(tdElement).text('(Sin dirección registrada)');
            resolve();
        });
    });
}

// Función para mostrar el modal de direcciones de pacientes del carrito
function abrirModalDireccionesCarrito() {
    let html = '';
    const cont = $('#direcciones_carrito_contenido');
    const resumenCont = $('#resumen_medicamentos_carrito');
    cont.empty();
    resumenCont.empty();

    if (carritoEntregasPendientes.length === 0) {
        cont.html('<div class="alert alert-warning text-center">No hay pacientes en el carrito</div>');
        resumenCont.html('');
    } else {
        const table = $('<table>').addClass('table table-bordered table-sm');
        const thead = $('<thead>');
        thead.append('<tr><th>Paciente</th><th>RUT</th><th>Dirección</th><th>Acción</th></tr>');
        table.append(thead);
        const tbody = $('<tbody>');
        // Guardará la referencia al <tr> creado por rut para permitir actualizaciones posteriores
        let pacientesMostrados = {};
        // Promesas de fetch de direcciones para esperar antes de mostrar el mapa
        let pendingFetches = [];
        carritoEntregasPendientes.forEach(entrega => {
            console.log('📍 Procesando entrega pendiente:', entrega);
            const paciente = (entrega && (entrega.paciente || entrega.paciente_data || entrega.pacienteInfo))
                || ((entrega && (entrega.rut || entrega.nombres || entrega.nombre)) ? entrega : {}) || {};
            console.log('📍 Paciente normalizado:', paciente);
            const nombreCompleto = ((paciente.nombres || paciente.nombre || '-') + ' ' + (paciente.apellido_uno || paciente.apellido1 || '') + ' ' + (paciente.apellido_dos || paciente.apellido2 || '')).trim();
            const rut = paciente.rut || paciente.rut_completo || '-';

            // Construcción robusta de la dirección: preferir entrega.direccion, luego paciente.direccion,
            // luego paciente.direcciones[0], luego campos planos; siempre limpiar y añadir ciudad cuando exista.
            let direccionTexto = '';
            try {
                // Laravel puede devolver Direccion (mayúscula) o direccion (minúscula)
                const pacienteDirObj = paciente.Direccion || paciente.direccion || null;
                const origenDir = (entrega && entrega.Direccion && Object.keys(entrega.Direccion).length) ? entrega.Direccion :
                                  (entrega && entrega.direccion && Object.keys(entrega.direccion).length) ? entrega.direccion :
                                  (pacienteDirObj && Object.keys(pacienteDirObj).length) ? pacienteDirObj :
                                  (Array.isArray(paciente.direcciones) && paciente.direcciones.length ? paciente.direcciones[0] : null);

                direccionTexto = obtenerDireccionDesdeObjeto(origenDir) || '';

                // Si todavía vacío, intentar campos sueltos del paciente
                if (!direccionTexto || direccionTexto.trim() === '') {
                    const posibles = [paciente && paciente.calle, paciente && paciente.calle_principal, paciente && paciente.domicilio, paciente && paciente.direccion_texto];
                    direccionTexto = (posibles.filter(Boolean).join(' ') || '').trim();
                }

                // Añadir ciudad/comuna si existe - también acepta Ciudad (mayúscula)
                const ciudad = obtenerCiudadDesdeObjeto(origenDir)
                    || (origenDir && origenDir.Ciudad && (origenDir.Ciudad.nombre || origenDir.Ciudad)) || '';
                if (ciudad) {
                    if (direccionTexto && direccionTexto.trim() !== '') direccionTexto = direccionTexto.trim() + ', ' + ciudad;
                    else direccionTexto = ciudad;
                }

                console.log('👉 direccionTexto calculada:', direccionTexto);

                // Guardar en caché si es válida (el mapa la usará)
                if (rut && rut !== '-' && direccionTexto && direccionTexto.trim() !== '') {
                    direccionesCarritoCache[rut] = direccionTexto;
                }

                // Fallback adicional: usar paciente.Direccion.direccion o paciente.direccion.direccion directamente
                if (!direccionTexto || direccionTexto.trim() === '') {
                    const d = paciente.Direccion || paciente.direccion;
                    if (d && d.direccion) {
                        direccionTexto = d.direccion;
                        const c = d.Ciudad?.nombre || d.ciudad?.nombre || '';
                        if (c) direccionTexto += ', ' + c;
                        console.log('👉 Fallback usando paciente.Direccion.direccion:', direccionTexto);
                    }
                }

            } catch (err) {
                console.warn('⚠️ Error al construir direccionTexto:', err);
                direccionTexto = '';
            }

            if (!direccionTexto || (typeof direccionTexto === 'string' && direccionTexto.trim() === '')) {
                direccionTexto = '(Cargando dirección...)';
            }

            if (!pacientesMostrados[rut]) {
                const tr = $('<tr>');
                tr.append($('<td>').text(nombreCompleto));
                tr.append($('<td>').text(rut));
                const tdDireccion = $('<td>').text(direccionTexto);
                tr.append(tdDireccion);
                // Columna de acción: botón para notificar al paciente
                const btn = $('<button>').addClass('btn btn-sm btn-primary notificar-paciente-btn').text('Notificar');
                btn.data('rut', rut);
                tr.append($('<td>').append(btn));
                tbody.append(tr);
                pacientesMostrados[rut] = tr;

                // Si la dirección no está disponible en los datos locales, buscarla via AJAX
                if (direccionTexto === '(Cargando dirección...)' && rut && rut !== '-') {
                    pendingFetches.push(fetchDireccionPorRut(rut, tdDireccion));
                }
            } else {
                // Si ya existe una fila para este rut pero tenía dirección vacía,
                // y ahora tenemos una dirección válida, actualizar la celda correspondiente.
                try {
                    const existingTr = pacientesMostrados[rut];
                    const currentDireccion = existingTr.find('td').eq(2).text().trim();
                    if ((currentDireccion === '' || currentDireccion === '(SIN DIRECCIÓN REGISTRADA)' || currentDireccion === '(Sin dirección registrada)' || currentDireccion === '(Cargando dirección...)') && direccionTexto && direccionTexto.trim() !== '' && direccionTexto !== '(Cargando dirección...)') {
                        existingTr.find('td').eq(2).text(direccionTexto);
                        try {
                            const actionTd = existingTr.find('td').eq(3);
                            if (actionTd.length === 0) {
                                const btn = $('<button>').addClass('btn btn-sm btn-primary notificar-paciente-btn').text('Notificar');
                                btn.data('rut', rut);
                                existingTr.append($('<td>').append(btn));
                            }
                        } catch(e) {}
                    }
                } catch (e) {
                    console.warn('⚠️ No se pudo actualizar fila existente para rut', rut, e);
                }
            }
        });
        table.append(tbody);
        // Log HTML generado para depuración
        try { console.log('🧾 HTML tabla direcciones (preview):', table.prop('outerHTML')); } catch (e) {}
        cont.append(table);

        // === RESUMEN DE MEDICAMENTOS POR PACIENTE ===
        const agrupado = {};
        carritoEntregasPendientes.forEach(entrega => {
            const paciente = (entrega && (entrega.paciente || entrega.paciente_data || entrega.pacienteInfo))
                || ((entrega && (entrega.rut || entrega.nombres || entrega.nombre)) ? entrega : {}) || {};
            const rut = paciente.rut || paciente.rut_completo || '-';
            const nombreCompleto = ((paciente.nombres || paciente.nombre || '-') + ' ' + (paciente.apellido_uno || paciente.apellido1 || '') + ' ' + (paciente.apellido_dos || paciente.apellido2 || '')).trim();

            if (!agrupado[rut]) {
                agrupado[rut] = { nombre: nombreCompleto, rut: rut, medicamentos: [] };
            }
            agrupado[rut].medicamentos.push({
                nombre: entrega.nombre_medicamento || entrega.medicamento || entrega.nombre || '-',
                presentacion: entrega.presentacion || '-',
                posologia: entrega.posologia || '-',
                cantidad: entrega.cantidad_entregada || entrega.cantidad || '-',
                observaciones: entrega.observaciones || ''
            });
        });

        let resumenHtml = '<h6 style="color: #17a2b8; font-weight: 600; margin-bottom: 10px;"><i class="feather icon-package mr-1"></i> Resumen de Medicamentos en el Carrito</h6>';
        resumenHtml += '<div class="alert alert-light border" style="padding: 8px 12px; margin-bottom: 8px;"><strong>Total entregas:</strong> ' + carritoEntregasPendientes.length + ' | <strong>Pacientes:</strong> ' + Object.keys(agrupado).length + '</div>';

        Object.keys(agrupado).forEach((rut, idx) => {
            const grupo = agrupado[rut];
            const collapseId = 'resumen_paciente_' + idx;
            resumenHtml += `
                <div class="card mb-2" style="border-left: 3px solid #17a2b8;">
                    <div class="card-header p-2" style="background: #f0f9ff; cursor: pointer;" data-toggle="collapse" data-target="#${collapseId}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong style="color: #0071bc;"><i class="feather icon-user mr-1"></i> ${grupo.nombre}</strong>
                                <small class="text-muted ml-2">RUT: ${grupo.rut}</small>
                            </div>
                            <span class="badge badge-info">${grupo.medicamentos.length} medicamento(s)</span>
                        </div>
                    </div>
                    <div id="${collapseId}" class="collapse show">
                        <div class="card-body p-2">
                            <div class="table-responsive">
                            <table class="table table-sm table-striped mb-0" style="font-size: 0.85rem;">
                                <thead>
                                    <tr class="bg-light">
                                        <th style="width:5%">#</th>
                                        <th style="width:30%">Medicamento</th>
                                        <th class="text-center" style="width:20%">Presentación</th>
                                        <th class="text-center" style="width:20%">Posología</th>
                                        <th class="text-center" style="width:10%">Cant.</th>
                                        <th style="width:15%">Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${grupo.medicamentos.map((med, i) => `
                                        <tr>
                                            <td>${i + 1}</td>
                                            <td><strong>${med.nombre}</strong></td>
                                            <td class="text-center">${med.presentacion}</td>
                                            <td class="text-center">${med.posologia}</td>
                                            <td class="text-center">${med.cantidad}</td>
                                            <td><small class="text-muted">${med.observaciones || '-'}</small></td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        resumenCont.html(resumenHtml);

        // Mostrar el contenedor del mapa y preparar mapa/markers.
        // Esperar a que todos los AJAX de fetchDireccionPorRut resuelvan antes de geocodificar.
        $('#direcciones_carrito_mapa').show();
        Promise.all(pendingFetches).then(function() {
            mostrarMapaDireccionesCarrito();
        });
    }
    $('#modal_direcciones_carrito').modal('show');
}

/**
 * Actualizar registros de entregas de medicamentos crónicos según estado
 * @param {number} estado - 1: Entregado, 2: Pendiente, 3: En camino
 * @param {string} idContenedor - ID de la tabla o contenedor del acordeón (sin #)
 *   - Para estado 1 y 3: ID de la tabla HTML (ej: 'entregas_realizadas', 'entregas_en_curso')
 *   - Para estado 2: ID del div del acordeón (ej: 'acordeonPacientesPendientes')
 */
function actualizar_Registros(estado, idContenedor) {
    estado = parseInt(estado);
    if (!estado || ![1, 2, 3].includes(estado)) {
        console.warn('⚠️ Estado inválido:', estado);
        return;
    }
    if (!idContenedor) {
        console.warn('⚠️ ID de contenedor no proporcionado');
        return;
    }

    const estadoLabels = { 1: 'Entregado', 2: 'Pendiente', 3: 'En camino' };
    const estadoBadges = {
        1: '<span class="badge badge-success">Entregado</span>',
        2: '<span class="badge badge-danger">Pendiente</span>',
        3: '<span class="badge badge-warning">En camino</span>'
    };

    // Para estado 2 (pendientes) → acordeón agrupado por paciente
    if (estado === 2) {
        const acordeon = $('#' + idContenedor);
        if (acordeon.length === 0) {
            console.warn('⚠️ No se encontró el contenedor con ID:', idContenedor);
            return;
        }

        // Mostrar loading
        acordeon.html('<div class="text-center p-4"><i class="fas fa-spinner fa-spin fa-2x"></i><br><small class="text-muted mt-2">Cargando entregas pendientes...</small></div>');

        $.ajax({
            url: '{{ route("adm_cm.cronicos.entregas_por_estado") }}',
            method: 'GET',
            data: { estado: 2 },
            success: function(response) {
                console.log('📊 Respuesta actualizar_Registros (estado 2 - pendientes):', response);

                if (!response.success || !response.entregas || response.entregas.length === 0) {
                    acordeon.html('<div class="alert alert-info text-center"><i class="feather icon-info"></i> No hay entregas pendientes</div>');
                    return;
                }

                // Agrupar entregas por paciente (usando paciente_rut como key)
                const agrupado = {};
                response.entregas.forEach(function(entrega) {
                    const rut = entrega.paciente_rut || '-';
                    if (!agrupado[rut]) {
                        agrupado[rut] = {
                            nombre: entrega.paciente_nombre || '-',
                            rut: rut,
                            id: entrega.paciente_id || null,
                            observaciones: entrega.paciente_observaciones_entregas || '',
                            entregas: []
                        };
                    }
                    agrupado[rut].entregas.push(entrega);
                });

                let html = '';
                let index = 0;

                Object.keys(agrupado).forEach(function(rut) {
                    const grupo = agrupado[rut];
                    const totalMeds = grupo.entregas.length;
                    const collapseId = 'collapsePacienteDyn' + index;
                    const isFirst = index === 0;

                    html += '<div class="card mb-2">';
                    html += '  <div class="card-header p-0" id="headingPacienteDyn' + index + '">';
                    html += '    <div class="d-flex align-items-center justify-content-between p-2" style="cursor: pointer;" data-toggle="collapse" data-target="#' + collapseId + '" aria-expanded="' + (isFirst ? 'true' : 'false') + '">';
                    html += '      <div class="d-flex align-items-center">';
                    html += '        <input type="checkbox" class="mr-2 check-paciente-grupo" data-paciente-index="' + index + '" onclick="event.stopPropagation(); toggleCheckPaciente(this, ' + index + ');">';
                    html += '        <i class="feather icon-user mr-2 text-primary"></i>';
                    html += '        <strong class="text-uppercase">' + grupo.nombre + '</strong>';
                    html += '        <span class="badge badge-secondary ml-2">RUT: ' + grupo.rut + '</span>';
                    html += '        <span class="badge badge-info ml-2">' + totalMeds + ' medicamento' + (totalMeds > 1 ? 's' : '') + '</span>';
                    html += '      </div>';
                    html += '      <i class="feather icon-chevron-down"></i>';
                    html += '    </div>';
                    html += '  </div>';
                    html += '  <div id="' + collapseId + '" class="collapse ' + (isFirst ? 'show' : '') + '" data-parent="#' + idContenedor + '">';
                    html += '    <div class="card-body p-2">';
                    html += '      <div class="table-responsive">';
                    html += '        <table class="table table-striped table-sm table-hover mb-0">';
                    html += '          <thead>';
                    html += '            <tr>';
                    html += '              <th class="text-center" style="width: 40px;"><input type="checkbox" class="check-all-paciente" data-paciente-index="' + index + '" onclick="toggleAllMedicamentosPaciente(this, ' + index + ')"></th>';
                    html += '              <th class="text-center">Medicamento</th>';
                    html += '              <th class="text-center">Presentación</th>';
                    html += '              <th class="text-center">Posología</th>';
                    html += '              <th class="text-center">Vía Admin.</th>';
                    html += '              <th class="text-center">Próxima Entrega</th>';
                    html += '              <th class="text-center">Estado</th>';
                    html += '              <th class="text-center">Acciones</th>';
                    html += '            </tr>';
                    html += '          </thead>';
                    html += '          <tbody>';

                    grupo.entregas.forEach(function(entrega) {
                        // Construir el data-entrega JSON para el checkbox
                        const entregaJson = JSON.stringify(entrega).replace(/'/g, '&#39;').replace(/"/g, '&quot;');

                        html += '<tr>';
                        html += '  <td class="text-center">';
                        html += '    <input type="checkbox" class="entrega-pendiente-checkbox entrega-paciente-' + index + '" value="' + entrega.id + '" data-entrega="' + entregaJson + '">';
                        html += '  </td>';
                        html += '  <td class="text-center">' + (entrega.nombre_medicamento || '-') + '</td>';
                        html += '  <td class="text-center">' + (entrega.presentacion || '-') + '</td>';
                        html += '  <td class="text-center">' + (entrega.posologia || '-') + '</td>';
                        html += '  <td class="text-center">' + (entrega.via_administracion || '-') + '</td>';
                        html += '  <td class="text-center">' + (entrega.fecha_entrega || '-') + '</td>';
                        html += '  <td class="text-center"><span class="badge badge-danger">Pendiente</span></td>';
                        html += '  <td class="text-center">';
                        html += '    <button class="btn btn-sm btn-primary" onclick="verDetalleEntregaAjax(' + entrega.id + ')">';
                        html += '      <i class="feather icon-eye"></i> Ver Detalle';
                        html += '    </button>';
                        html += '  </td>';
                        html += '</tr>';
                    });

                    html += '          </tbody>';
                    html += '        </table>';
                    html += '      </div>';
                    // OBSERVACIONES POR PACIENTE
                    const pacienteId = grupo.id || '';
                    const pacienteObs = (grupo.observaciones || '').replace(/"/g, '&quot;');
                    html += '      <hr class="my-3">';
                    html += '      <div class="form-group">';
                    html += '        <label for="observaciones_paciente_' + index + '" class="font-weight-bold"><i class="feather icon-message-square mr-1"></i> Observaciones (¿Por qué están pendientes?)</label>';
                    html += '        <textarea id="observaciones_paciente_' + index + '" class="form-control observaciones-pendientes" rows="3" placeholder="Ej: Paciente no disponible, cambio de domicilio, requiere confirmación, etc." data-paciente-id="' + pacienteId + '" data-paciente-index="' + index + '">' + pacienteObs + '</textarea>';
                    html += '      </div>';
                    html += '      <div class="d-flex justify-content-end">';
                    html += '        <button type="button" class="btn btn-sm btn-success mt-2" onclick="guardarObservacionesPaciente(\'' + index + '\', \'' + pacienteId + '\')"><i class="feather icon-save mr-1"></i> Guardar Observaciones</button>';
                    html += '      </div>';
                    html += '    </div>';  // end card-body
                    html += '  </div>';   // end collapse
                    html += '</div>';     // end card

                    index++;
                });

                acordeon.html(html);
                console.log('✅ Acordeón "' + idContenedor + '" actualizado con ' + response.entregas.length + ' entrega(s) en ' + Object.keys(agrupado).length + ' paciente(s)');
            },
            error: function(xhr, status, error) {
                console.error('❌ Error al cargar pendientes:', xhr, error);
                acordeon.html('<div class="alert alert-danger text-center">Error al cargar las entregas pendientes</div>');
            }
        });
        return;
    }

    // Para estado 1 y 3 → tabla normal
    const tabla = $('#' + idContenedor);
    if (tabla.length === 0) {
        console.warn('⚠️ No se encontró la tabla con ID:', idContenedor);
        return;
    }

    // Destruir DataTable existente antes de manipular el DOM directamente
    if ($.fn.DataTable.isDataTable('#' + idContenedor)) {
        tabla.DataTable().destroy();
    }

    const tbody = tabla.find('tbody');
    const numCols = tabla.find('thead th').length || 8;

    // Mostrar loading
    tbody.html('<tr><td colspan="' + numCols + '" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando registros...</td></tr>');

    $.ajax({
        url: '{{ route("adm_cm.cronicos.entregas_por_estado") }}',
        method: 'GET',
        data: { estado: estado },
        success: function(response) {
            console.log('📊 Respuesta actualizar_Registros (estado ' + estado + '):', response);

            if (!response.success || !response.entregas || response.entregas.length === 0) {
                const mensajes = {
                    1: 'No hay entregas realizadas',
                    3: 'No hay entregas en curso'
                };
                tbody.html('<tr><td colspan="' + numCols + '" class="text-center text-muted">' + (mensajes[estado] || 'Sin registros') + '</td></tr>');
                return;
            }

            tbody.empty();
            if (estado === 1) entregasGrupadasCache = {};

            response.entregas.forEach(function(entrega) {
                let acciones = '';

                if (estado === 1) {
                    // Guardar en caché para el modal de detalle
                    entregasGrupadasCache[entrega.id] = entrega;
                    acciones = '<button class="btn btn-sm btn-info" onclick="verDetalleGrupoEntregas(' + entrega.id + ')">' +
                        '<i class="feather icon-eye"></i></button>';
                } else if (estado === 3) {
                    acciones = '<button class="btn btn-sm btn-success" onclick="confirmarEntregaRecibida(' + entrega.id + ')">' +
                        '<i class="feather icon-check"></i> Confirmar</button>';
                }

                // Celda de medicamentos: agrupada (estado 1) o individual (estado 3)
                let medCell = '';
                if (estado === 1 && entrega.medicamentos && entrega.medicamentos.length > 0) {
                    medCell = '<ul class="list-unstyled mb-0 text-left" style="min-width:180px">';
                    entrega.medicamentos.forEach(function(med) {
                        medCell += '<li class="d-flex align-items-center mb-1">' +
                            '<span class="badge badge-pill badge-secondary mr-2" style="min-width:22px">' + med.cantidad_entregada + '</span>' +
                            '<span style="font-size:0.85em">' + med.nombre_medicamento + '</span>' +
                            '</li>';
                    });
                    medCell += '</ul>';
                } else {
                    medCell = (entrega.nombre_medicamento || '-');
                }

                let fila = '<tr>';
                fila += '<td class="text-center">' + (entrega.fecha_entrega || '-') + '</td>';
                fila += '<td class="text-center">' + (entrega.paciente_nombre || '-') + '</td>';
                fila += '<td class="text-center">' + (entrega.paciente_rut || '-') + '</td>';
                fila += '<td class="text-center">' + medCell + '</td>';
                if (estado !== 1) {
                    fila += '<td class="text-center">' + (entrega.cantidad_entregada || '-') + '</td>';
                }
                fila += '<td class="text-center">' + (entrega.profesional_nombre || '-') + '</td>';

                if (numCols >= 8) {
                    fila += '<td class="text-center">' + (estadoBadges[estado] || '-') + '</td>';
                }

                fila += '<td class="text-center">' + acciones + '</td>';
                fila += '</tr>';

                tbody.append(fila);
            });

            console.log('✅ Tabla "' + idContenedor + '" actualizada con ' + response.entregas.length + ' registro(s) (estado: ' + estadoLabels[estado] + ')');

            // Reinicializar DataTable para tablas que lo requieren
            if (idContenedor === 'entregas_realizadas') {
                tabla.DataTable({
                    "order": [[ 0, "desc" ]],
                    "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "emptyTable": "No hay entregas realizadas"
                    }
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('❌ Error al cargar registros:', xhr, error);
            tbody.html('<tr><td colspan="' + numCols + '" class="text-center text-danger">Error al cargar los registros</td></tr>');
        }
    });
}

/**
 * Registrar solicitud de entrega: cambia las entregas del carrito a estado 3 (en camino)
 * Captura los IDs de las entregas y el profesional encargado
 */
function registrarSolicitudEntrega() {
    // Validar que haya entregas en el carrito
    if (carritoEntregasPendientes.length === 0) {
        return swal('Sin entregas', 'No hay entregas en el carrito para procesar', 'warning');
    }

    // Validar que se haya seleccionado un encargado
    const idProfesional = $('#entrega_profesional').val();
    if (!idProfesional || idProfesional === '') {
        return swal('Atención', 'Debe seleccionar un encargado de la entrega', 'warning');
    }

    // Recopilar IDs de entregas
    const idsEntregas = carritoEntregasPendientes.map(e => e.id);

    // Agrupar info para mostrar resumen de confirmación
    const agrupado = {};
    carritoEntregasPendientes.forEach(entrega => {
        const paciente = entrega.paciente || {};
        const rut = paciente.rut || '-';
        const nombre = ((paciente.nombres || '-') + ' ' + (paciente.apellido_uno || '')).trim();
        if (!agrupado[rut]) {
            agrupado[rut] = { nombre: nombre, medicamentos: [] };
        }
        agrupado[rut].medicamentos.push(entrega.nombre_medicamento || entrega.medicamento || '-');
    });

    // Construir HTML de confirmación
    let resumenHtml = '<div style="text-align:left; max-height: 300px; overflow-y: auto;">';
    resumenHtml += '<p><strong>Total entregas:</strong> ' + idsEntregas.length + '</p>';
    Object.keys(agrupado).forEach(rut => {
        const g = agrupado[rut];
        resumenHtml += '<div style="margin-bottom:8px; padding:6px; background:#f8f9fa; border-radius:4px; border-left:3px solid #17a2b8;">';
        resumenHtml += '<strong>' + g.nombre + '</strong> <small class="text-muted">(RUT: ' + rut + ')</small>';
        resumenHtml += '<ul style="margin:4px 0 0 0; padding-left:18px;">';
        g.medicamentos.forEach(m => { resumenHtml += '<li>' + m + '</li>'; });
        resumenHtml += '</ul></div>';
    });
    resumenHtml += '</div>';
    resumenHtml += '<p class="mt-2"><strong>Estado:</strong> Se marcarán como <span class="badge badge-warning">En camino</span></p>';

    // Confirmar con swal
    swal({
        title: '¿Confirmar entregas en camino?',
        content: {
            element: 'div',
            attributes: {
                innerHTML: resumenHtml
            }
        },
        icon: 'info',
        buttons: {
            cancel: { text: 'Cancelar', visible: true },
            confirm: { text: 'Confirmar', closeModal: false }
        }
    }).then((confirm) => {
        if (!confirm) return;

        $.ajax({
            url: '{{ route("adm_cm.cronicos.iniciar_entrega_en_curso") }}',
            method: 'POST',
            data: {
                ids: idsEntregas,
                id_profesional: idProfesional,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('✅ Respuesta iniciar entrega:', response);
                if (response.success) {
                    swal('Éxito', response.message, 'success').then(() => {
                        // Limpiar carrito
                        carritoEntregasPendientes = [];
                        actualizarTablaEntregasPendientesCarrito();
                        // Cerrar modal
                        $('#modal_direcciones_carrito').modal('hide');
                        // Recargar para refrescar las pestañas
                        // location.reload();
                    });
                } else {
                    let msg = response.message || 'Ocurrió un error';
                    if (response.errores && response.errores.length) {
                        msg += '\n\nErrores:\n' + response.errores.join('\n');
                    }
                    swal('Atención', msg, 'warning');
                }
            },
            error: function(xhr, status, error) {
                console.error('❌ Error al iniciar entrega:', xhr, error);
                let msg = 'Error al procesar la solicitud';
                try {
                    const resp = JSON.parse(xhr.responseText);
                    if (resp.message) msg = resp.message;
                } catch(e) {}
                swal('Error', msg, 'error');
            }
        });
    });
}

function verDetalleEntregaAjax(idEntrega) {
    if (!idEntrega) return;

    $.ajax({
        url: '{{ route("adm_cm.cronicos.detalle_entrega") }}',
        method: 'GET',
        data: { id: idEntrega },
        success: function(response) {
            console.log('📦 Detalle de entrega:', response);
            if (response.success && response.entrega) {
                verDetalleEntregaRealizada(response.entrega);
            } else {
                swal('Atención', response.message || 'No se pudo cargar el detalle de la entrega', 'warning');
            }
        },
        error: function(xhr) {
            console.error('❌ Error al cargar detalle de entrega:', xhr);
            let msg = 'Error al cargar el detalle de la entrega';
            try {
                const resp = JSON.parse(xhr.responseText);
                if (resp.message) msg = resp.message;
            } catch(e) {}
            swal('Error', msg, 'error');
        }
    });
}

/**
 * Muestra el detalle de un grupo de entregas (estado 1) usando la caché local.
 * No requiere AJAX adicional: los datos ya están en entregasGrupadasCache.
 */
function verDetalleGrupoEntregas(idGrupo) {
    const entrega = entregasGrupadasCache[idGrupo];
    if (!entrega) {
        swal('Atención', 'No se encontraron los datos de la entrega', 'warning');
        return;
    }

    // Datos del paciente
    $('#detalle_entrega_paciente').text(entrega.paciente_nombre || '-');
    $('#detalle_entrega_rut').text(entrega.paciente_rut || '-');
    $('#detalle_entrega_profesional').text(entrega.profesional_nombre || '-');
    $('#detalle_entrega_fecha_hora').text(entrega.fecha_entrega || '-');
    $('#detalle_entrega_observaciones').text('-');
    $('#detalle_entrega_direccion').html('<i class="fas fa-spinner fa-spin"></i> Cargando...');
    $('#detalle_entrega_mapa').html('<div class="d-flex align-items-center justify-content-center h-100"><i class="fas fa-spinner fa-spin fa-2x text-muted"></i></div>');

    // Tabla de medicamentos
    const tbody = $('#detalle_entrega_medicamentos_tbody');
    tbody.empty();
    if (entrega.medicamentos && entrega.medicamentos.length > 0) {
        entrega.medicamentos.forEach(function(med, idx) {
            tbody.append(
                '<tr>' +
                '<td class="text-center">' + (idx + 1) + '</td>' +
                '<td><strong>' + (med.nombre_medicamento || '-') + '</strong></td>' +
                '<td class="text-center">' + (med.presentacion || '-') + '</td>' +
                '<td class="text-center">' + (med.posologia || '-') + '</td>' +
                '<td class="text-center">' + (med.via_administracion || '-') + '</td>' +
                '<td class="text-center"><span class="badge badge-primary">' + (med.cantidad_entregada || '-') + '</span></td>' +
                '</tr>'
            );
        });
    } else {
        tbody.html('<tr><td colspan="6" class="text-center text-muted">Sin medicamentos</td></tr>');
    }

    // Mostrar modal
    $('#modal_detalle_entrega_realizada').modal('show');

    // Cargar dirección y mapa de forma asíncrona
    const rut = entrega.paciente_rut;
    if (rut && rut !== '-') {
        cargarYMostrarDireccionDetalle(rut);
    } else {
        $('#detalle_entrega_direccion').text('No registrada');
        $('#detalle_entrega_mapa').html('<div class="d-flex align-items-center justify-content-center h-100"><span class="text-muted">Sin dirección</span></div>');
    }
}

/**
 * Confirmar que una entrega en curso fue recibida (estado 3 → estado 1 entregado)
 */
function confirmarEntregaRecibida(idEntrega) {
    if (!idEntrega) return;

    swal({
        title: '¿Confirmar recepción?',
        text: 'Se marcará esta entrega como recibida/entregada.',
        icon: 'info',
        buttons: {
            cancel: { text: 'Cancelar', visible: true },
            confirm: { text: 'Confirmar entrega', closeModal: false }
        }
    }).then((confirm) => {
        if (!confirm) return;

        $.ajax({
            url: '{{ route("adm_cm.cronicos.confirmar_entrega_recibida") }}',
            method: 'POST',
            data: {
                id: idEntrega,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    swal('Éxito', response.message, 'success').then(() => {
                        // location.reload();
                        actualizar_Registros(3, 'entregas_en_curso');
                        actualizar_Registros(1, 'entregas_realizadas');
                    });
                } else {
                    swal('Atención', response.message || 'Ocurrió un error', 'warning');
                }
            },
            error: function(xhr) {
                let msg = 'Error al confirmar la entrega';
                try {
                    const resp = JSON.parse(xhr.responseText);
                    if (resp.message) msg = resp.message;
                } catch(e) {}
                swal('Error', msg, 'error');
            }
        });
    });
}

/**
 * Actualizar la sección de Reportes con datos en tiempo real desde el servidor
 * Actualiza: tarjetas de estadísticas, tabla top medicamentos, tabla entregas por mes
 */
function actualizar_Reportes() {
    // Mostrar indicadores de carga en cada stat
    const statIds = ['stat_pacientes_activos', 'stat_total_entregadas', 'stat_total_pendientes',
                     'stat_total_en_curso', 'stat_total_medicamentos', 'stat_entregas_hoy', 'stat_tasa_entrega'];
    statIds.forEach(function(id) {
        const el = document.getElementById(id);
        if (el) el.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    });

    const tbodyTop = document.getElementById('tbody_top_medicamentos');
    const tbodyMes = document.getElementById('tbody_entregas_por_mes');
    if (tbodyTop) tbodyTop.innerHTML = '<tr><td colspan="5" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando...</td></tr>';
    if (tbodyMes) tbodyMes.innerHTML = '<tr><td colspan="4" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando...</td></tr>';

    $.ajax({
        url: '{{ route("adm_cm.cronicos.reportes_data") }}',
        method: 'GET',
        success: function(response) {
            if (!response.success) {
                console.warn('⚠️ actualizar_Reportes: respuesta sin éxito', response);
                return;
            }

            const d = response.data;

            // --- Tarjetas principales ---
            $('#stat_pacientes_activos').text(d.pacientes_activos ?? 0);
            $('#stat_total_entregadas').text(d.total_entregadas ?? 0);
            $('#stat_total_pendientes').text(d.total_pendientes ?? 0);
            $('#stat_total_en_curso').text(d.total_en_curso ?? 0);

            // --- Tarjetas secundarias ---
            $('#stat_total_medicamentos').text(d.total_medicamentos ?? 0);
            $('#stat_entregas_hoy').text(d.entregas_hoy ?? 0);

            // Tasa de entrega con color dinámico
            const tasa = d.tasa_entrega ?? 0;
            const colorTasa = tasa >= 70 ? '#28a745' : (tasa >= 40 ? '#ffc107' : '#dc3545');
            $('#stat_tasa_entrega').text(tasa + '%').css('color', colorTasa);

            // --- Tabla Top Medicamentos ---
            if (tbodyTop) {
                if (!d.top_medicamentos || d.top_medicamentos.length === 0) {
                    tbodyTop.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No hay datos de entregas realizadas</td></tr>';
                } else {
                    const maxEntregas = Math.max(...d.top_medicamentos.map(m => m.total_entregas));
                    let htmlTop = '';
                    d.top_medicamentos.forEach(function(med, idx) {
                        const pct = maxEntregas > 0 ? Math.round((med.total_entregas / maxEntregas) * 100) : 0;
                        htmlTop += '<tr>';
                        htmlTop += '  <td class="text-center">' + (idx + 1) + '</td>';
                        htmlTop += '  <td><strong>' + (med.nombre_medicamento || '-') + '</strong></td>';
                        htmlTop += '  <td class="text-center"><span class="badge badge-primary">' + med.total_entregas + '</span></td>';
                        htmlTop += '  <td class="text-center">' + (med.total_cantidad ?? '-') + '</td>';
                        htmlTop += '  <td>';
                        htmlTop += '    <div class="progress" style="height:18px;">';
                        htmlTop += '      <div class="progress-bar bg-primary" role="progressbar" style="width:' + pct + '%">' + pct + '%</div>';
                        htmlTop += '    </div>';
                        htmlTop += '  </td>';
                        htmlTop += '</tr>';
                    });
                    tbodyTop.innerHTML = htmlTop;
                }
            }

            // --- Tabla Entregas por Mes ---
            if (tbodyMes) {
                if (!d.entregas_por_mes || d.entregas_por_mes.length === 0) {
                    tbodyMes.innerHTML = '<tr><td colspan="4" class="text-center text-muted">No hay datos de entregas en los últimos 6 meses</td></tr>';
                } else {
                    let htmlMes = '';
                    d.entregas_por_mes.forEach(function(mes) {
                        htmlMes += '<tr>';
                        htmlMes += '  <td><strong>' + (mes.mes_nombre || mes.mes || '-') + '</strong></td>';
                        htmlMes += '  <td class="text-center"><span class="badge badge-success">' + mes.total_entregas + '</span></td>';
                        htmlMes += '  <td class="text-center">' + mes.pacientes + '</td>';
                        htmlMes += '  <td class="text-center">' + mes.medicamentos + '</td>';
                        htmlMes += '</tr>';
                    });
                    tbodyMes.innerHTML = htmlMes;
                }
            }

            console.log('✅ Reportes actualizados correctamente:', d);
        },
        error: function(xhr, status, error) {
            console.error('❌ Error al actualizar reportes:', xhr, error);
            statIds.forEach(function(id) {
                const el = document.getElementById(id);
                if (el) el.innerHTML = '<span class="text-danger">-</span>';
            });
            if (tbodyTop) tbodyTop.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Error al cargar datos</td></tr>';
            if (tbodyMes) tbodyMes.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Error al cargar datos</td></tr>';
        }
    });
}

// Función para guardar observaciones de cada paciente
function guardarObservacionesPaciente(index, pacienteId) {
    let textareaId = 'observaciones_paciente_' + index;
    let observaciones = $('#' + textareaId).val();

    $.ajax({
        type: 'POST',
        url: '{{ route("adm_cm.cronicos.guardar_observaciones") }}',
        data: {
            paciente_id: pacienteId,
            observaciones: observaciones,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if(response.estado == 1) {
                swal({
                    icon: 'success',
                    title: 'Observaciones Guardadas',
                    text: response.mensaje,
                    timer: 2000
                });
            } else {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: response.mensaje || 'Error al guardar observaciones'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr);
            swal({
                icon: 'error',
                title: 'Error en la solicitud',
                text: 'No se pudo guardar las observaciones. Intenta nuevamente.'
            });
        }
    });
}

</script>

@endsection
