@extends('template.laboratorio.laboratorio_profesional.template')


@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">ADMINISTRACIÓN DE PEDIDOS</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('laboratorio.distribucion_mayor') }}">Distribucion</a></li>
                            <li class="breadcrumb-item"><a href="#">Manejo de pedidos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <ul class="nav nav-pills" id="pills-tab" role="tablist">
                             <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-solicitudes-tab" data-toggle="pill" href="#pills-solicitudes" role="tab" aria-controls="pills-solicitudes" aria-selected="false">Pedidos clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 " id="pills-estado_pedidos-tab" data-toggle="pill" href="#pills-estado_pedidos" role="tab" aria-controls="pills-estado_pedidos" aria-selected="false">Estado de Pedidos</a>
                            </li>
                        </ul> --}}

                        <!-- FILTRO DE FECHAS -->
                        <div class="row mt-3 pt-2 border-top">
                            <div class="col-md-3">
                                <label class="font-weight-bold f-13 mb-2"><i class="feather icon-calendar mr-1"></i>Fecha Inicio</label>
                                <input type="date" class="form-control form-control-sm" id="filtro_fecha_inicio" placeholder="Fecha inicio">
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold f-13 mb-2"><i class="feather icon-calendar mr-1"></i>Fecha Fin</label>
                                <input type="date" class="form-control form-control-sm" id="filtro_fecha_fin" placeholder="Fecha fin">
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold f-13 mb-2">&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-sm btn-block" onclick="aplicarFiltroFechas()">
                                    <i class="feather icon-filter mr-1"></i> Filtrar
                                </button>
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold f-13 mb-2">&nbsp;</label>
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="limpiarFiltroFechas()">
                                    <i class="feather icon-refresh-cw mr-1"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-solicitudes" role="tabpanel" aria-labelledby="pills-solicitudes-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Pedidos de clientes</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="pedidos_a_distribuidor" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Pedido</th>
                                                        <th class="text-center align-middle">Cliente</th>
                                                        <th class="text-center align-middle">Fecha de Pedido</th>
                                                        <th class="text-center align-middle">Total</th>
                                                        <th class="text-center align-middle">Método Pago</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Ver Detalle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($pedidos as $pedido)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span class="badge badge-info">{{ $pedido->numero_pedido }}</span>
                                                        </td>
                                                        <td class="align-middle text-left">
                                                            <strong>{{ $pedido->cliente ? $pedido->cliente->nombre : 'N/A' }}</strong><br>
                                                            <small class="text-muted">{{ $pedido->cliente ? $pedido->cliente->email : 'N/A' }}</small>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>{{ $pedido->fecha_procesamiento ? $pedido->fecha_procesamiento->format('d/m/Y H:i') : 'N/A' }}</span>
                                                        </td>
                                                        <td class="align-middle text-right">
                                                            <strong>${{ number_format($pedido->monto_neto, 0, ',', '.') }}</strong>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="badge badge-primary" title="ID: {{ $pedido->metodo_pago }}">{{ optional($formas_pago->where('id', $pedido->metodo_pago)->first())->nombre ?? 'N/A' }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            @if($pedido->estado === 'procesado')
                                                                <span class="badge badge-success">Procesado</span>
                                                            @elseif($pedido->estado === 'pendiente')
                                                                <span class="badge badge-warning">Pendiente</span>
                                                            @elseif($pedido->estado === 'enviado')
                                                                <span class="badge badge-info">Enviado</span>
                                                            @elseif($pedido->estado === 'entregado')
                                                                <span class="badge badge-success">Entregado</span>
                                                            @elseif($pedido->estado === 'cancelado')
                                                                <span class="badge badge-danger">Cancelado</span>
                                                            @elseif($pedido->estado === 'devuelto')
                                                                <span class="badge badge-secondary">Devuelto</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="verDetallePedido({{ $pedido->id }});" title="Ver Detalle"><i class="fas fa-eye"></i></button>
                                                            <!-- boton para seleccionar medio de transporte para envio -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="seleccionarMedioTransporte({{ $pedido->id }});" title="Seleccionar Medio de Transporte"><i class="fas fa-truck"></i></button>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center align-middle py-4">
                                                            <p class="text-muted">No hay pedidos registrados</p>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="pills-estado_pedidos" role="tabpanel" aria-labelledby="pills-estado_pedidos-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Estado Pedidos  clientes</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="estado_pedidos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Pedido</th>
                                                        <th class="text-center align-middle">Cliente</th>
                                                        <th class="text-center align-middle">Fecha de Pedido</th>
                                                        <th class="text-center align-middle">Total</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Ver Detalle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($pedidos as $pedido)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span class="badge badge-info">{{ $pedido->numero_pedido }}</span>
                                                        </td>
                                                        <td class="align-middle text-left">
                                                            <strong>{{ $pedido->cliente ? $pedido->cliente->nombre : 'N/A' }}</strong><br>
                                                            <small class="text-muted">RUT: {{ $pedido->cliente ? $pedido->cliente->rut : 'N/A' }}</small>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>{{ $pedido->fecha_procesamiento ? $pedido->fecha_procesamiento->format('d/m/Y') : 'N/A' }}</span>
                                                        </td>
                                                        <td class="align-middle text-right">
                                                            <strong>${{ number_format($pedido->monto_neto, 0, ',', '.') }}</strong>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            @if($pedido->estado === 'procesado')
                                                                <span class="badge badge-success">Procesado</span>
                                                            @elseif($pedido->estado === 'pendiente')
                                                                <span class="badge badge-warning">Pendiente</span>
                                                            @elseif($pedido->estado === 'enviado')
                                                                <span class="badge badge-info">Enviado</span>
                                                            @elseif($pedido->estado === 'entregado')
                                                                <span class="badge badge-success">Entregado</span>
                                                            @elseif($pedido->estado === 'cancelado')
                                                                <span class="badge badge-danger">Cancelado</span>
                                                            @elseif($pedido->estado === 'devuelto')
                                                                <span class="badge badge-secondary">Devuelto</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="verDetallePedido({{ $pedido->id }});" title="Ver Detalle"><i class="fas fa-eye"></i></button>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center align-middle py-4">
                                                            <p class="text-muted">No hay pedidos registrados</p>
                                                        </td>
                                                    </tr>
                                                    @endforelse
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
<!--****Cierre Container Completo****-->
<!-- MODAL FICHA CLIENTE -->
<div class="modal fade" id="modal_ficha_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_ficha_cliente_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_agregar_cliente_label"><i class="feather icon-plus"></i> Ficha cliente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_ficha_cliente').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                        <div class="row info-basica" id="info-basica-1">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Rut</h6>
                                <div id="contacto_cliente_rut"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Correo electrónico</h6>
                                <div id="contacto_cliente_email">ejemplo jkriman@gmail.com</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Teléfonos</h6>
                                <div  >
                                    <ul>
                                        <li id="contacto_cliente_telefono1"><span></span></li>
                                        <li id="contacto_cliente_telefono2"><span></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Dirección</h6>
                                <div id="contacto_cliente_direccion"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Productos</h6>
                                <div id="contacto_cliente_direccion">Audifonos accesorios y otros</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Clasificación</h6>
                                <div id="contacto_cliente_direccion">ejemplo moroso demora en pagos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modal_ficha_cliente').modal('hide')">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL ENVIO / DESPACHO PEDIDO -->
<div class="modal fade" id="modal_envio_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_envio_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #1a73e8, #0d47a1);">
                <h5 class="modal-title text-white" id="modal_envio_label">
                    <i class="fas fa-truck mr-2"></i> Configurar Despacho del Pedido
                    <small class="d-block f-12 mt-1" id="envio_numero_pedido_label" style="opacity:0.85;"></small>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <input type="hidden" id="envio_id_pedido">

                <!-- Pasos visuales -->
                <div class="d-flex align-items-center p-3 border-bottom" style="background:#f8f9fa;">
                    <div class="text-center flex-fill">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-primary text-white" style="width:32px;height:32px;font-size:14px;">1</div>
                        <div class="f-12 mt-1 text-primary font-weight-bold">Tipo de envío</div>
                    </div>
                    <div class="flex-fill border-top" style="height:2px;"></div>
                    <div class="text-center flex-fill">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-secondary text-white" id="paso2_circle" style="width:32px;height:32px;font-size:14px;">2</div>
                        <div class="f-12 mt-1 text-muted" id="paso2_label">Detalles</div>
                    </div>
                    <div class="flex-fill border-top" style="height:2px;"></div>
                    <div class="text-center flex-fill">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-secondary text-white" id="paso3_circle" style="width:32px;height:32px;font-size:14px;">3</div>
                        <div class="f-12 mt-1 text-muted" id="paso3_label">Confirmar</div>
                    </div>
                </div>

                <div class="p-4">
                    <!-- PASO 1: Tipo de envío -->
                    <div id="paso_1">
                        <h6 class="font-weight-bold mb-3 text-dark"><i class="fas fa-shipping-fast mr-2 text-primary"></i>Selecciona el tipo de envío</h6>
                        <div class="row">
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card border h-100 transporte-option" onclick="seleccionarTipoTransporte(this, 'courier')" style="cursor:pointer;transition:.2s;">
                                    <div class="card-body text-center py-3">
                                        <i class="fas fa-box fa-2x text-primary mb-2"></i>
                                        <div class="font-weight-bold f-14">Courier</div>
                                        <small class="text-muted">Envío por empresa</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card border h-100 transporte-option" onclick="seleccionarTipoTransporte(this, 'retiro_tienda')" style="cursor:pointer;transition:.2s;">
                                    <div class="card-body text-center py-3">
                                        <i class="fas fa-store fa-2x text-success mb-2"></i>
                                        <div class="font-weight-bold f-14">Retiro en tienda</div>
                                        <small class="text-muted">El cliente retira</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card border h-100 transporte-option" onclick="seleccionarTipoTransporte(this, 'despacho_propio')" style="cursor:pointer;transition:.2s;">
                                    <div class="card-body text-center py-3">
                                        <i class="fas fa-car fa-2x text-warning mb-2"></i>
                                        <div class="font-weight-bold f-14">Despacho propio</div>
                                        <small class="text-muted">Vehículo propio</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card border h-100 transporte-option" onclick="seleccionarTipoTransporte(this, 'correo_chile')" style="cursor:pointer;transition:.2s;">
                                    <div class="card-body text-center py-3">
                                        <i class="fas fa-envelope fa-2x text-danger mb-2"></i>
                                        <div class="font-weight-bold f-14">Correo Chile</div>
                                        <small class="text-muted">Servicio postal</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card border h-100 transporte-option" onclick="seleccionarTipoTransporte(this, 'starken')" style="cursor:pointer;transition:.2s;">
                                    <div class="card-body text-center py-3">
                                        <i class="fas fa-truck fa-2x text-info mb-2"></i>
                                        <div class="font-weight-bold f-14">Starken</div>
                                        <small class="text-muted">Courier nacional</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card border h-100 transporte-option" onclick="seleccionarTipoTransporte(this, 'chilexpress')" style="cursor:pointer;transition:.2s;">
                                    <div class="card-body text-center py-3">
                                        <i class="fas fa-truck-moving fa-2x text-danger mb-2"></i>
                                        <div class="font-weight-bold f-14">Chilexpress</div>
                                        <small class="text-muted">Courier nacional</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="tipo_transporte_sel" value="">
                    </div>

                    <!-- PASO 2: Detalles -->
                    <div id="paso_2" style="display:none;">
                        <h6 class="font-weight-bold mb-3 text-dark"><i class="fas fa-clipboard-list mr-2 text-primary"></i>Detalles del despacho</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold f-13">Empresa de transporte</label>
                                <input type="text" class="form-control form-control-sm" id="campo_empresa_transporte" placeholder="Ej: Chilexpress, Starken...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold f-13">Número de seguimiento <small class="text-muted">(opcional)</small></label>
                                <input type="text" class="form-control form-control-sm" id="campo_numero_seguimiento" placeholder="Ej: CX-123456789">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="font-weight-bold f-13">Dirección de envío</label>
                                <input type="text" class="form-control form-control-sm" id="campo_direccion_envio" placeholder="Calle, número, ciudad...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold f-13">Estado del envío</label>
                                <select class="form-control form-control-sm" id="campo_estado_envio">
                                    <option value="en_preparacion">En preparación</option>
                                    <option value="despachado">Despachado</option>
                                    <option value="entregado">Entregado</option>
                                </select>
                            </div>
                        </div>
                        <div class="alert alert-info py-2 f-13">
                            <i class="fas fa-info-circle mr-1"></i>
                            El cliente será notificado cuando el pedido sea actualizado.
                        </div>
                    </div>

                    <!-- PASO 3: Confirmación -->
                    <div id="paso_3" style="display:none;">
                        <h6 class="font-weight-bold mb-3 text-dark"><i class="fas fa-check-circle mr-2 text-success"></i>Resumen del despacho</h6>
                        <div class="card border-success">
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <small class="text-muted d-block">Pedido</small>
                                        <strong id="confirm_numero_pedido"></strong>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <small class="text-muted d-block">Tipo de envío</small>
                                        <strong id="confirm_tipo_transporte"></strong>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <small class="text-muted d-block">Empresa</small>
                                        <strong id="confirm_empresa"></strong>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <small class="text-muted d-block">Nº Seguimiento</small>
                                        <strong id="confirm_seguimiento"></strong>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <small class="text-muted d-block">Dirección</small>
                                        <strong id="confirm_direccion"></strong>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted d-block">Estado</small>
                                        <span id="confirm_estado" class="badge badge-info"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-light" id="btn_anterior_transporte" onclick="pasoTransporte('anterior')" style="display:none;">
                    <i class="fas fa-arrow-left mr-1"></i> Anterior
                </button>
                <div class="ml-auto">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_siguiente_transporte" onclick="pasoTransporte('siguiente')" disabled>
                        Siguiente <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                    <button type="button" class="btn btn-success" id="btn_guardar_transporte" onclick="guardarTransporte()" style="display:none;">
                        <i class="fas fa-save mr-1"></i> Guardar Despacho
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL VER PEDIDO -->
<div class="modal fade" id="modal_verPedido_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_verPedido_cliente_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_agregar_cliente_label"><i class="feather icon-plus"></i> Ver pedido</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_verPedido_cliente').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="row info-basica" id="info-basica-pedido">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Nº Pedido</h6>
                                <div id="detalle_numero_pedido"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Cliente</h6>
                                <div id="detalle_cliente"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Fecha Procesamiento</h6>
                                <div id="detalle_fecha"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <h6 class="text-c-blue">Método Pago</h6>
                                <div id="detalle_metodo_pago"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h6 class="text-c-blue">Observaciones</h6>
                                <div id="detalle_observaciones" style="padding: 10px; background: #f5f5f5; border-radius: 4px; min-height: 60px;"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-3">Items del Pedido</h6>
                            <div style="overflow-x:auto;">
                                <table id="tabla_items_pedido" class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-right">Precio Unit.</th>
                                            <th class="text-right">Descuento</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_items_pedido">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row border-top pt-2">
                                <div class="col-sm-6 text-right">
                                    <h6>Subtotal:</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6 id="detalle_total"></h6>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <h6>Descuento Total:</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6 id="detalle_descuento"></h6>
                                </div>
                                <div class="col-sm-6 text-right border-top pt-2">
                                    <h6 class="font-weight-bold">Monto Neto:</h6>
                                </div>
                                <div class="col-sm-6 border-top pt-2">
                                    <h6 class="font-weight-bold text-success" id="detalle_monto_neto"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modal_verPedido_cliente').modal('hide')">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    // Mapeo de formas de pago
    var formasPagoMap = @json($formas_pago->pluck('nombre', 'id'));

    // Función para traducir ID de forma de pago a nombre
    function getFormasPagoNombre(id) {
        if (id && formasPagoMap[id]) {
            return formasPagoMap[id];
        }
        return 'N/A';
    }

    $(document).ready(function() {
        $('#pedidos_a_distribuidor').DataTable({
            responsive: true,
        });
          $('#estado_pedidos').DataTable({
            responsive: true,
        });
         $('#product_cliente').select2();
         $('#product_cliente-edit').select2();




    });

    function ficha_cliente() {
        // abrir modal para agregar cliente
        $('#modal_ficha_cliente').modal('show');
    }
     function ficha_envio() {
        // abrir modal para agregar cliente
        $('#modal_envio_cliente').modal('show');
    }

    function verDetallePedido(id_pedido) {
        $.ajax({
            url: '{{ route("laboratorio.adm_general.distribuidores.pedido.detalle", ":id") }}'.replace(':id', id_pedido),
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                try {
                    console.log('Respuesta del servidor:', response);
                    if(response.estado === 1) {
                        var pedido = response.pedido;

                        // Llenar información básica
                        $('#detalle_numero_pedido').html('<strong>' + (pedido.numero_pedido || 'N/A') + '</strong>');
                        $('#detalle_cliente').html('<strong>' + (pedido.cliente && pedido.cliente.nombre ? pedido.cliente.nombre : 'N/A') + '</strong>');
                        $('#detalle_fecha').html(pedido.fecha_procesamiento ? new Date(pedido.fecha_procesamiento).toLocaleDateString('es-ES') : 'N/A');
                        $('#detalle_metodo_pago').html('<span class="badge badge-primary">' + getFormasPagoNombre(pedido.metodo_pago) + '</span>');
                        $('#detalle_observaciones').html(pedido.observaciones || '<span class="text-muted">Sin observaciones</span>');

                        // Llenar items
                        var tbody = $('#tbody_items_pedido');
                        tbody.empty();

                        if(pedido.items_pedido && pedido.items_pedido.length > 0) {
                            pedido.items_pedido.forEach(function(item) {
                                var subtotal = (item.cantidad * item.precio_unitario) - item.descuento;
                                tbody.append(
                                    '<tr>' +
                                        '<td>' + (item.nombre_producto || 'N/A') + '</td>' +
                                        '<td class="text-center">' + (item.cantidad || 0) + '</td>' +
                                        '<td class="text-right">$' + parseFloat(item.precio_unitario || 0).toLocaleString('es-ES') + '</td>' +
                                        '<td class="text-right">$' + parseFloat(item.descuento || 0).toLocaleString('es-ES') + '</td>' +
                                        '<td class="text-right"><strong>$' + parseFloat(subtotal).toLocaleString('es-ES') + '</strong></td>' +
                                    '</tr>'
                                );
                            });
                        }

                        // Mostrar totales
                        $('#detalle_total').html('$' + parseFloat(pedido.total || 0).toLocaleString('es-ES'));
                        $('#detalle_descuento').html('$' + parseFloat(pedido.descuento_total || 0).toLocaleString('es-ES'));
                        $('#detalle_monto_neto').html('$' + parseFloat(pedido.monto_neto || 0).toLocaleString('es-ES'));

                        // Abrir modal
                        $('#modal_verPedido_cliente').modal('show');
                    } else {
                        var mensaje = response.mensaje || 'Error al cargar el pedido';
                        swal("Error", mensaje, "error");
                    }
                } catch(e) {
                    console.error('Error procesando respuesta:', e);
                    swal("Error", "Error al procesar los datos del pedido", "error");
                }
            },
            error: function(xhr, status, error) {
                console.error('Error AJAX:', error);
                console.error('Status:', xhr.status);
                console.error('Response:', xhr.responseText);
                swal("Error", "No se pudo cargar el detalle del pedido", "error");
            }
        });
    }

    function editar_cliente() {
        // abrir modal para agregar cliente
        $('#modal_editar_cliente').modal('show');
    }

    // ============================================================
    // SELECCIONAR MEDIO DE TRANSPORTE
    // ============================================================
    var _pasoActual = 1;
    var _pedidoTransporte = null;

    function seleccionarMedioTransporte(id_pedido) {
        _pasoActual = 1;
        _pedidoTransporte = id_pedido;

        // Cargar info del pedido para mostrar el número
        $.ajax({
            url: '{{ route("laboratorio.adm_general.distribuidores.pedido.detalle", ":id") }}'.replace(':id', id_pedido),
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.estado === 1) {
                    var p = response.pedido;
                    $('#envio_id_pedido').val(p.id);
                    $('#envio_numero_pedido_label').text('Pedido N° ' + p.numero_pedido + '  —  ' + (p.cliente ? p.cliente.nombre : ''));
                    $('#confirm_numero_pedido').text(p.numero_pedido);
                    // Pre-fill dirección si hay datos del cliente
                    if (p.cliente && p.cliente.direccion) {
                        $('#campo_direccion_envio').val(p.cliente.direccion);
                    }
                }
            }
        });

        // Resetear formulario y pasos
        resetModalTransporte();
        ir_paso(1);
        $('#modal_envio_cliente').modal('show');
    }

    function resetModalTransporte() {
        $('.transporte-option').removeClass('border-primary shadow').find('.card-body').css('background','');
        $('#tipo_transporte_sel').val('');
        $('#campo_empresa_transporte').val('');
        $('#campo_numero_seguimiento').val('');
        $('#campo_direccion_envio').val('');
        $('#campo_estado_envio').val('en_preparacion');
        $('#btn_siguiente_transporte').prop('disabled', true);
    }

    function seleccionarTipoTransporte(el, tipo) {
        // Quitar selección anterior
        $('.transporte-option').removeClass('border-primary shadow-sm');
        $('.transporte-option .card-body').css({'background': '', 'border-radius': ''});

        // Marcar seleccionado
        $(el).addClass('border-primary shadow-sm');
        $(el).find('.card-body').css({'background': '#e8f0fe', 'border-radius': '8px'});

        $('#tipo_transporte_sel').val(tipo);
        $('#btn_siguiente_transporte').prop('disabled', false);

        // Autocompletar empresa si es conocida
        var empresas = {
            'starken': 'Starken',
            'chilexpress': 'Chilexpress',
            'correo_chile': 'Correo Chile',
            'retiro_tienda': 'Retiro en tienda',
            'despacho_propio': 'Despacho propio'
        };
        if (empresas[tipo]) {
            $('#campo_empresa_transporte').val(empresas[tipo]);
        }
    }

    function pasoTransporte(direccion) {
        if (direccion === 'siguiente') {
            if (_pasoActual === 1) {
                if (!$('#tipo_transporte_sel').val()) {
                    swal('Atención', 'Por favor selecciona un tipo de envío', 'warning');
                    return;
                }
                ir_paso(2);
            } else if (_pasoActual === 2) {
                // Llenar resumen
                var tipoLabel = {
                    'courier': 'Courier', 'retiro_tienda': 'Retiro en tienda',
                    'despacho_propio': 'Despacho propio', 'correo_chile': 'Correo Chile',
                    'starken': 'Starken', 'chilexpress': 'Chilexpress'
                };
                var estadoLabel = {
                    'en_preparacion': 'En preparación', 'despachado': 'Despachado', 'entregado': 'Entregado'
                };
                $('#confirm_tipo_transporte').text(tipoLabel[$('#tipo_transporte_sel').val()] || $('#tipo_transporte_sel').val());
                $('#confirm_empresa').text($('#campo_empresa_transporte').val() || '-');
                $('#confirm_seguimiento').text($('#campo_numero_seguimiento').val() || '-');
                $('#confirm_direccion').text($('#campo_direccion_envio').val() || '-');
                $('#confirm_estado').text(estadoLabel[$('#campo_estado_envio').val()] || '-');
                ir_paso(3);
            }
        } else if (direccion === 'anterior') {
            if (_pasoActual > 1) ir_paso(_pasoActual - 1);
        }
    }

    function ir_paso(n) {
        _pasoActual = n;
        $('#paso_1, #paso_2, #paso_3').hide();
        $('#paso_' + n).show();

        // Botones
        $('#btn_anterior_transporte').toggle(n > 1);
        $('#btn_siguiente_transporte').toggle(n < 3);
        $('#btn_guardar_transporte').toggle(n === 3);

        // Indicadores visuales
        [1, 2, 3].forEach(function(i) {
            var circle = i === 1 ? null : $('#paso' + i + '_circle');
            var label  = i === 1 ? null : $('#paso' + i + '_label');
            if (circle) {
                if (i <= n) {
                    circle.removeClass('bg-secondary').addClass('bg-primary');
                    label.removeClass('text-muted').addClass('text-primary font-weight-bold');
                } else {
                    circle.removeClass('bg-primary').addClass('bg-secondary');
                    label.removeClass('text-primary font-weight-bold').addClass('text-muted');
                }
            }
        });
    }

    function guardarTransporte() {
        var btn = $('#btn_guardar_transporte');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Guardando...');

        $.ajax({
            url: '{{ route("laboratorio.distribucion.pedido.transporte", ":id") }}'.replace(':id', _pedidoTransporte),
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                medio_transporte:   $('#tipo_transporte_sel').val(),
                empresa_transporte: $('#campo_empresa_transporte').val(),
                numero_seguimiento: $('#campo_numero_seguimiento').val(),
                direccion_envio:    $('#campo_direccion_envio').val(),
                estado_envio:       $('#campo_estado_envio').val()
            },
            success: function(response) {
                console.log('Respuesta del servidor:', response);
                if (response.estado === 1) {
                    $('#modal_envio_cliente').modal('hide');
                    swal({ title: '¡Listo!', text: 'Información de despacho guardada correctamente.', icon: 'success', timer: 2000, button: false });
                } else {
                    swal('Error', response.mensaje || 'No se pudo guardar', 'error');
                }
            },
            error: function(error) {
                console.error('Error AJAX:', error);
                swal('Error', 'No se pudo conectar con el servidor', 'error');
            },
            complete: function() {
                btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Guardar Despacho');
            }
        });
    }

    // ============================================================
    // FILTRO DE FECHAS
    // ============================================================
    function aplicarFiltroFechas() {
        var fechaInicio = $('#filtro_fecha_inicio').val();
        var fechaFin = $('#filtro_fecha_fin').val();

        if (!fechaInicio || !fechaFin) {
            swal('Atención', 'Por favor completa ambas fechas', 'warning');
            return;
        }

        if (new Date(fechaInicio) > new Date(fechaFin)) {
            swal('Atención', 'La fecha inicio no puede ser mayor a la fecha fin', 'warning');
            return;
        }

        // Filtrar en ambas tablas
        filtrarTabla('pedidos_a_distribuidor', fechaInicio, fechaFin);
        filtrarTabla('estado_pedidos', fechaInicio, fechaFin);

        swal({ title: 'Filtro aplicado', text: 'Se muestran los pedidos entre ' + fechaInicio + ' y ' + fechaFin, icon: 'success', timer: 1500, button: false });
    }

    function filtrarTabla(tablaId, fechaInicio, fechaFin) {
        var tabla = $('#' + tablaId).DataTable();

        // Convertir fechas a timestamp para comparación
        var inicio = new Date(fechaInicio).getTime();
        var fin = new Date(fechaFin).getTime();

        tabla.rows().every(function() {
            var row = this.node();
            var fechaTexto = $(row).find('td:eq(2)').text().trim(); // Columna de fecha

            // Convertir fecha del formato d/m/Y H:i o d/m/Y a timestamp
            var partes = fechaTexto.split(' ')[0].split('/');
            var fecha = new Date(partes[2], partes[1] - 1, partes[0]).getTime();

            if (fecha >= inicio && fecha <= fin + 86400000) { // +1 día para incluir todo el día final
                $(row).show();
            } else {
                $(row).hide();
            }
        });

        tabla.draw();
    }

    function limpiarFiltroFechas() {
        $('#filtro_fecha_inicio').val('');
        $('#filtro_fecha_fin').val('');

        // Mostrar todas las filas nuevamente
        var tabla1 = $('#pedidos_a_distribuidor').DataTable();
        var tabla2 = $('#estado_pedidos').DataTable();

        tabla1.rows().every(function() {
            $(this.node()).show();
        });
        tabla1.draw();

        tabla2.rows().every(function() {
            $(this.node()).show();
        });
        tabla2.draw();

        swal({ title: 'Filtro limpiado', text: 'Se muestran todos los pedidos', icon: 'info', timer: 1500, button: false });
    }
</script>
@endsection
