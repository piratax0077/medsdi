@extends('template.laboratorio.laboratorio_profesional.template')

@section('style')
<style>
    .card-kpi { border-left: 4px solid; border-radius: 6px; }
    .card-kpi.gasto  { border-color: #e74c3c; }
    .card-kpi.ingreso { border-color: #27ae60; }
    .card-kpi.balance { border-color: #2980b9; }
    .card-kpi.pendiente { border-color: #f39c12; }
    .kpi-value { font-size: 1.7rem; font-weight: 700; line-height: 1.1; }
    .badge-urgencia-normal   { background:#17a2b8; color:#fff; }
    .badge-urgencia-urgente  { background:#f39c12; color:#fff; }
    .badge-urgencia-critica  { background:#e74c3c; color:#fff; }
    .nav-tabs .nav-link.active { font-weight: 600; border-bottom: 3px solid #17a2b8; }
    .table th { font-size: .78rem; }
    .table td { font-size: .82rem; vertical-align: middle; }
    .chart-container { position: relative; height: 280px; }
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
                            <h5 class="m-b-10 font-weight-bold">GESTIÓN FINANCIERA</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adm_cm.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item">
                               <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Gestión Financiera</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Filtro de fechas -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card border-info shadow-sm">
                            <div class="card-body p-3">
                                <div class="row align-items-end">
                                    <div class="col-md-3">
                                        <label class="font-weight-bold mb-2">
                                            <i class="feather icon-calendar mr-1"></i>Fecha inicial
                                        </label>
                                        <input type="date" id="filtro_fecha_inicio" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="font-weight-bold mb-2">
                                            <i class="feather icon-calendar mr-1"></i>Fecha final
                                        </label>
                                        <input type="date" id="filtro_fecha_fin" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-sm" onclick="aplicar_filtro_fechas()">
                                            <i class="feather icon-filter mr-1"></i>Aplicar filtro
                                        </button>
                                        <button class="btn btn-secondary btn-sm ml-2" onclick="limpiar_filtro_fechas()">
                                            <i class="feather icon-x mr-1"></i>Limpiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KPIs -->
        @php
            $balance = $total_pagado - $total_gastado;
        @endphp
        <div class="row mb-3">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi gasto h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3"><i class="feather icon-shopping-cart f-36 text-danger"></i></div>
                        <div>
                            <p class="text-muted mb-0 f-12">Total gastado (compras)</p>
                            <div class="kpi-value text-danger">${{ number_format($total_gastado, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi ingreso h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3"><i class="feather icon-trending-up f-36 text-success"></i></div>
                        <div>
                            <p class="text-muted mb-0 f-12">Total pagado (confirmado)</p>
                            <div class="kpi-value text-success">${{ number_format($total_pagado, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi balance h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3"><i class="feather icon-activity f-36 text-primary"></i></div>
                        <div>
                            <p class="text-muted mb-0 f-12">Balance neto</p>
                            <div class="kpi-value {{ $balance >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ $balance >= 0 ? '+' : '' }}${{ number_format($balance, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi pendiente h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3"><i class="feather icon-clock f-36 text-warning"></i></div>
                        <div>
                            <p class="text-muted mb-0 f-12">Pedidos pendientes</p>
                            <div class="kpi-value text-warning">{{ $pedidos_pendientes }}</div>
                            <small class="text-muted">{{ $pedidos_procesados }} procesados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico comparativo -->
        <div class="row mb-3">
            <div class="col-md-8 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header"><h6 class="mb-0 font-weight-bold">Comparativa mensual: Gastos vs Pagos</h6></div>
                    <div class="card-body">
                        <div class="chart-container"><canvas id="chartComparativa"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header"><h6 class="mb-0 font-weight-bold">Estado de pagos</h6></div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="chart-container w-100"><canvas id="chartPagos"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs: Compras / Pagos -->
        <div class="card shadow-sm">
            <div class="card-header p-0">
                <ul class="nav nav-tabs card-header-tabs ml-2 mt-1" id="tabsFinanciero" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-compras" data-toggle="tab" href="#panel-compras" role="tab">
                            <i class="feather icon-shopping-cart mr-1"></i>Compras
                            <span class="badge badge-danger ml-1">{{ $compras->count() }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-pagos" data-toggle="tab" href="#panel-pagos" role="tab">
                            <i class="feather icon-credit-card mr-1"></i>Pagos registrados
                            <span class="badge badge-info ml-1">{{ $pagos->count() }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-2">
                <div class="tab-content" id="tabsFinancieroContent">

                    <!-- Panel Compras -->
                    <div class="tab-pane fade show active" id="panel-compras" role="tabpanel">
                        <div class="table-responsive">
                            <table id="tabla_compras" class="table table-sm table-striped table-hover dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nº Factura</th>
                                        <th>Fecha emisión</th>
                                        <th>Proveedor</th>
                                        <th>Productos</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right">IVA</th>
                                        <th class="text-right">Total final</th>
                                        <th>Estado</th>
                                        <th class="text-center">Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($compras as $compra)
                                    <tr>
                                        <td><span class="badge badge-secondary">{{ $compra->numero_factura }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($compra->fecha_emision)->format('d/m/Y') }}</td>
                                        <td>{{ $compra->proveedor->nombre ?? 'N/A' }}</td>
                                        <td>
                                            @foreach($compra->detalles as $det)
                                                <small class="d-block">
                                                    <i class="feather icon-box mr-1 text-muted"></i>
                                                    {{ $det->producto->nombre ?? 'Producto #'.$det->id_producto }}
                                                    <span class="text-muted">(x{{ $det->cantidad }})</span>
                                                </small>
                                            @endforeach
                                        </td>
                                        <td class="text-right">${{ number_format($compra->total, 0, ',', '.') }}</td>
                                        <td class="text-right">${{ number_format($compra->iva, 0, ',', '.') }}</td>
                                        <td class="text-right font-weight-bold">${{ number_format($compra->total_final, 0, ',', '.') }}</td>
                                        <td>
                                            @if($compra->estado == 1)
                                                <span class="badge badge-success">Pagada</span>
                                            @else
                                                <span class="badge badge-warning">Pendiente</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-info btn-sm" onclick="ver_detalle_compra({{ $compra->id }})">
                                                <i class="feather icon-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="9" class="text-center text-muted py-4">No hay compras registradas</td></tr>
                                    @endforelse
                                </tbody>
                                @if($compras->count())
                                <tfoot>
                                    <tr class="table-danger font-weight-bold">
                                        <td colspan="6" class="text-right">Total compras:</td>
                                        <td class="text-right">${{ number_format($total_gastado, 0, ',', '.') }}</td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tfoot>
                                @else
                                <tfoot></tfoot>
                                @endif
                            </table>
                        </div>
                    </div>

                    <!-- Panel Pagos -->
                    <div class="tab-pane fade" id="panel-pagos" role="tabpanel">
                        <div class="table-responsive">
                            <table id="tabla_pagos" class="table table-sm table-striped table-hover dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID Pago</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Nº Pedido</th>
                                        <th>Forma de Pago</th>
                                        <th>Documento</th>
                                        <th class="text-right">Monto</th>
                                        <th>Estado</th>
                                        <th>Estado envío</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pagos as $pago)
                                    <tr>
                                        <td><span class="badge badge-secondary">#{{ $pago->id }}</span></td>
                                        <td>{{ $pago->fecha_pago->format('d/m/Y') }}</td>
                                        <td>{{ $pago->cliente->nombre ?? 'N/A' }}</td>
                                        <td>
                                            @if($pago->pedido)
                                                <span class="badge badge-info">{{ $pago->pedido->numero_pedido ?? '#'.$pago->pedido->id }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $pago->formaPago->nombre ?? '-' }}</td>
                                        <td>{{ $pago->numero_documento ?? '-' }}</td>
                                        <td class="text-right font-weight-bold">${{ number_format($pago->monto, 0, ',', '.') }}</td>
                                        <td>
                                            @switch($pago->estado)
                                                @case('pendiente')   <span class="badge badge-warning">Pendiente</span>   @break
                                                @case('confirmado')  <span class="badge badge-success">Confirmado</span>  @break
                                                @case('rechazado')   <span class="badge badge-danger">Rechazado</span>    @break
                                                @default             <span class="badge badge-light">{{ $pago->estado }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @if($pago->pedido)
                                                @switch($pago->pedido->estado_envio)
                                                    @case('en_preparacion')   <span class="badge badge-warning">En preparación</span>   @break
                                                    @case('despachado')       <span class="badge badge-info">Despachado</span>       @break
                                                    @case('entregado')        <span class="badge badge-success">Entregado</span>        @break
                                                    @default                   <span class="badge badge-light">{{ $pago->pedido->estado_envio }}</span>
                                                @endswitch
                                            @else
                                                <span class="badge badge-secondary">Sin pedido</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" onclick="imprimir_pago({{ $pago->id }})" title="Imprimir comprobante">
                                                <i class="feather icon-printer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="10" class="text-center text-muted py-4">No hay pagos registrados</td></tr>
                                    @endforelse
                                </tbody>
                                @if($pagos->where('estado', 'confirmado')->count())
                                <tfoot>
                                    <tr class="table-success font-weight-bold">
                                        <td colspan="6" class="text-right">Total pagado (confirmados):</td>
                                        <td class="text-right">${{ number_format($total_pagado, 0, ',', '.') }}</td>
                                        <td colspan="3"></td>
                                    </tr>
                                </tfoot>
                                @else
                                <tfoot></tfoot>
                                @endif
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Detalle Compra -->
<div id="modal_detalle_compra" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white"><i class="feather icon-file-text mr-2"></i>Detalle de compra</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body" id="contenido_detalle_compra">
                <div class="text-center py-4"><i class="feather icon-loader f-30"></i> Cargando...</div>
            </div>
        </div>
    </div>
</div>


<input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $laboratorio->id_lugar_atencion }}">
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
// Variables globales para almacenar datos originales
var datosComprasOriginales = @json($compras);
var datosPagosOriginales = @json($pagos);
var chartComparativa = null;
var chartPagos = null;
var tabla_compras_dt = null;
var tabla_pagos_dt = null;

/**
 * Aplicar filtro por rango de fechas
 */
function aplicar_filtro_fechas() {
    var fechaInicio = $('#filtro_fecha_inicio').val();
    var fechaFin = $('#filtro_fecha_fin').val();

    if (!fechaInicio || !fechaFin) {
        swal({
            title: 'Falta información',
            text: 'Por favor seleccione ambas fechas',
            icon: 'warning',
            button: 'Aceptar'
        });
        return;
    }

    if (new Date(fechaInicio) > new Date(fechaFin)) {
        swal({
            title: 'Fecha inválida',
            text: 'La fecha inicial no puede ser mayor que la fecha final',
            icon: 'error',
            button: 'Aceptar'
        });
        return;
    }

    // Filtrar datos comparando solo la parte de fecha (YYYY-MM-DD) para evitar problemas de timezone
    var comprasFiltradas = datosComprasOriginales.filter(function(c) {
        var fechaStr = c.fecha_emision ? c.fecha_emision.substring(0, 10) : '';
        return fechaStr >= fechaInicio && fechaStr <= fechaFin;
    });

    var pagosFiltrados = datosPagosOriginales.filter(function(p) {
        var fechaStr = p.fecha_pago ? p.fecha_pago.substring(0, 10) : '';
        return fechaStr >= fechaInicio && fechaStr <= fechaFin;
    });

    // Actualizar KPIs
    actualizar_kpis(comprasFiltradas, pagosFiltrados);

    // Actualizar gráficos
    actualizar_graficos(comprasFiltradas, pagosFiltrados);

    // Actualizar tablas
    actualizar_tablas(comprasFiltradas, pagosFiltrados);

    swal({
        title: 'Filtro aplicado',
        text: 'Los datos se han filtrado correctamente',
        icon: 'success',
        button: 'Aceptar'
    });
}

/**
 * Limpiar filtro y mostrar todos los datos
 */
function limpiar_filtro_fechas() {
    $('#filtro_fecha_inicio').val('');
    $('#filtro_fecha_fin').val('');

    // Restaurar datos originales
    actualizar_kpis(datosComprasOriginales, datosPagosOriginales);
    actualizar_graficos(datosComprasOriginales, datosPagosOriginales);
    actualizar_tablas(datosComprasOriginales, datosPagosOriginales);
}

/**
 * Actualizar KPIs con datos filtrados
 */
function actualizar_kpis(compras, pagos) {
    var totalGastado = parseFloat(compras.reduce((sum, c) => sum + (parseFloat(c.total_final) || 0), 0)) || 0;
    var totalPagado = parseFloat(pagos.filter(p => p.estado === 'confirmado').reduce((sum, p) => sum + (parseFloat(p.monto) || 0), 0)) || 0;
    var balance = totalPagado - totalGastado;
    var pagosPendientes = pagos.filter(p => p.estado === 'pendiente').length;
    var pagosConfirmados = pagos.filter(p => p.estado === 'confirmado').length;

    // Actualizar KPI de gastos
    $('div.card-kpi.gasto .kpi-value').text('$' + totalGastado.toLocaleString('es-CL', { maximumFractionDigits: 0 }));

    // Actualizar KPI de pagos
    $('div.card-kpi.ingreso .kpi-value').text('$' + totalPagado.toLocaleString('es-CL', { maximumFractionDigits: 0 }));

    // Actualizar KPI de balance
    var balanceClass = balance >= 0 ? 'text-success' : 'text-danger';
    $('div.card-kpi.balance .kpi-value').removeClass('text-success text-danger').addClass(balanceClass)
        .text((balance >= 0 ? '+' : '') + '$' + balance.toLocaleString('es-CL', { maximumFractionDigits: 0 }));

    // Actualizar KPI de pendientes
    $('div.card-kpi.pendiente .kpi-value').text(pagosPendientes);
    $('div.card-kpi.pendiente small').text(pagosConfirmados + ' confirmados');
}

// Variable global para almacenar datos del laboratorio
    let datos_laboratorio_actual = null;

    function imprimir_pago(pago_id) {
        // Calcular posición centrada para la ventana emergente
        const ancho = 900;
        const alto = 700;
        const izquierda = (window.innerWidth - ancho) / 2 + window.screenX;
        const arriba = (window.innerHeight - alto) / 2 + window.screenY;

        // Crear una ventana emergente (popup) con características específicas
        const opciones = `width=${ancho},height=${alto},left=${izquierda},top=${arriba},resizable=yes,scrollbars=yes,toolbar=no,location=no,menubar=no,status=yes`;
        const ventana = window.open('', '_blank', opciones);
        // Obtener datos del pago del DOM
        const tabla_pagos = document.querySelectorAll('#tabla_pagos tbody tr');
        let pago_data = null;

        tabla_pagos.forEach(fila => {
            const botones = fila.querySelectorAll('button');
            botones.forEach(btn => {
                if (btn.onclick && btn.onclick.toString().includes(pago_id)) {
                    const celdas = fila.querySelectorAll('td');
                    pago_data = {
                        fecha: celdas[1].textContent.trim(),
                        monto: celdas[6].textContent.trim(),
                        forma_pago: celdas[4].textContent.trim(),
                        documento: celdas[5].textContent.trim(),
                        estado: celdas[7].textContent.trim()
                    };
                }
            });
        });

        const cliente_nombre = $('#cliente_nombre_estado').text();
        const cliente_rut = $('#cliente_rut_estado').text();

        // Preparar datos del laboratorio
        let logo_html = '';
        let nombre_laboratorio = 'MediChile';

        if (datos_laboratorio_actual) {
            if (datos_laboratorio_actual.foto_perfil) {
                logo_html = `<img src="${datos_laboratorio_actual.foto_perfil}" alt="Logo" style="max-width: 100px; max-height: 100px; margin-bottom: 10px;">`;
            }
            nombre_laboratorio = datos_laboratorio_actual.nombre || 'MediChile';
        }

        const contenido = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Comprobante de Pago</title>
                <style>
                    * { margin: 0; padding: 0; box-sizing: border-box; }
                    body {
                        font-family: 'Arial', sans-serif;
                        margin: 20px;
                        background-color: #f5f5f5;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: white;
                        padding: 30px;
                        border-radius: 8px;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 30px;
                        border-bottom: 2px solid #007bff;
                        padding-bottom: 20px;
                    }
                    .logo-section {
                        text-align: center;
                        margin-bottom: 15px;
                    }
                    .logo-section img {
                        max-width: 100px;
                        max-height: 100px;
                        margin-bottom: 10px;
                    }
                    .header h1 {
                        margin: 10px 0 5px 0;
                        font-size: 22px;
                        color: #333;
                    }
                    .header h2 {
                        margin: 0;
                        font-size: 18px;
                        color: #666;
                        font-weight: normal;
                    }
                    .header p {
                        margin: 5px 0;
                        font-size: 12px;
                        color: #999;
                    }
                    .info {
                        margin-bottom: 25px;
                        background-color: #f9f9f9;
                        padding: 15px;
                        border-left: 4px solid #007bff;
                    }
                    .info-row {
                        display: flex;
                        margin-bottom: 10px;
                        font-size: 14px;
                    }
                    .info-label {
                        font-weight: bold;
                        width: 120px;
                        color: #333;
                    }
                    .info-value {
                        flex: 1;
                        color: #555;
                    }
                    .detalles {
                        margin-top: 25px;
                        border: 2px solid #007bff;
                        padding: 20px;
                        border-radius: 4px;
                        background-color: #f0f8ff;
                    }
                    .detalles h3 {
                        margin: 0 0 15px 0;
                        font-size: 16px;
                        color: #007bff;
                        border-bottom: 1px solid #007bff;
                        padding-bottom: 10px;
                    }
                    .monto-pago {
                        background-color: #d4edda;
                        border: 1px solid #c3e6cb;
                        padding: 15px;
                        border-radius: 4px;
                        text-align: center;
                        margin: 15px 0;
                    }
                    .monto-pago .label {
                        font-size: 12px;
                        color: #155724;
                        margin-bottom: 5px;
                    }
                    .monto-pago .valor {
                        font-weight: bold;
                        font-size: 24px;
                        color: #155724;
                    }
                    .footer {
                        text-align: center;
                        margin-top: 30px;
                        padding-top: 15px;
                        border-top: 1px solid #ddd;
                        font-size: 11px;
                        color: #999;
                    }
                    .estado {
                        display: inline-block;
                        padding: 6px 12px;
                        border-radius: 4px;
                        font-size: 12px;
                        font-weight: bold;
                    }
                    .confirmado {
                        background-color: #d4edda;
                        color: #155724;
                    }
                    .pendiente {
                        background-color: #fff3cd;
                        color: #856404;
                    }
                    .divider {
                        border-top: 1px dashed #ddd;
                        margin: 15px 0;
                    }
                    @media print {
                        body { margin: 0; padding: 0; background: white; }
                        .container { box-shadow: none; }
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <div class="logo-section">
                            ${logo_html}
                        </div>
                        <h1>COMPROBANTE DE PAGO</h1>
                        <h2>${nombre_laboratorio}</h2>
                        <p>Sistema de Distribución</p>
                    </div>

                    <div class="info">
                        <div class="info-row">
                            <div class="info-label">Cliente:</div>
                            <div class="info-value"><strong>${cliente_nombre}</strong></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">RUT:</div>
                            <div class="info-value">${cliente_rut}</div>
                        </div>
                    </div>

                    <div class="detalles">
                        <h3>Detalles del Pago</h3>

                        <div class="info-row">
                            <div class="info-label">Fecha:</div>
                            <div class="info-value">${pago_data.fecha}</div>
                        </div>

                        <div class="monto-pago">
                            <div class="label">MONTO PAGADO</div>
                            <div class="valor">${pago_data.monto}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Forma de Pago:</div>
                            <div class="info-value">${pago_data.forma_pago}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Documento:</div>
                            <div class="info-value">${pago_data.documento || 'N/A'}</div>
                        </div>

                        <div class="divider"></div>

                        <div class="info-row">
                            <div class="info-label">Estado:</div>
                            <div class="info-value">
                                <span class="estado ${pago_data.estado.toLowerCase().includes('confirmado') ? 'confirmado' : 'pendiente'}">
                                    ${pago_data.estado}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        <p><strong>Documento generado el:</strong> ${new Date().toLocaleString('es-CL')}</p>
                        <p>Este es un comprobante de pago registrado en el sistema de distribución MediChile.</p>
                        <p>Para consultas, contacte con el área de facturación.</p>
                    </div>
                </div>
            </body>
            </html>
        `;

        ventana.document.write(contenido);
        ventana.document.close();

        // Esperar a que cargue y luego imprimir
        ventana.onload = function() {
            ventana.print();
        };
    }

    function cargar_datos_laboratorio(id_lugar_atencion = null) {
        if(!id_lugar_atencion) {
            id_lugar_atencion = $('#id_lugar_atencion').val();
        }
        $.ajax({
            url: '/Laboratorio/Distribuidores/laboratorio/' + id_lugar_atencion + '/datos',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    datos_laboratorio_actual = response.laboratorio;
                    console.log('Datos del laboratorio cargados:', datos_laboratorio_actual);
                } else {
                    console.log('No se pudieron cargar los datos del laboratorio');
                    datos_laboratorio_actual = null;
                }
            },
            error: function(xhr) {
                console.error('Error al cargar datos del laboratorio:', xhr);
                datos_laboratorio_actual = null;
            }
        });
    }

/**
 * Actualizar gráficos con datos filtrados
 */
function actualizar_graficos(compras, pagos) {
    // Limpiar gráficos anteriores de forma segura
    try {
        if (chartComparativa) {
            chartComparativa.destroy();
            chartComparativa = null;
        }
        // Reiniciar canvas completamente
        var canvasComp = document.getElementById('chartComparativa');
        if (canvasComp) {
            var newCanvasComp = canvasComp.cloneNode(true);
            canvasComp.parentNode.replaceChild(newCanvasComp, canvasComp);
        }
    } catch(e) {
        console.log('Error limpiando gráfico comparativa:', e);
    }

    try {
        if (chartPagos) {
            chartPagos.destroy();
            chartPagos = null;
        }
        // Reiniciar canvas completamente
        var canvasPag = document.getElementById('chartPagos');
        if (canvasPag) {
            var newCanvasPag = canvasPag.cloneNode(true);
            canvasPag.parentNode.replaceChild(newCanvasPag, canvasPag);
        }
    } catch(e) {
        console.log('Error limpiando gráfico pagos:', e);
    }

    // Agrupar por mes
    var meses = new Set();
    compras.forEach(c => {
        var fecha = new Date(c.fecha_emision);
        meses.add(fecha.getFullYear() + '-' + String(fecha.getMonth() + 1).padStart(2, '0'));
    });
    pagos.forEach(p => {
        var fecha = new Date(p.fecha_pago);
        meses.add(fecha.getFullYear() + '-' + String(fecha.getMonth() + 1).padStart(2, '0'));
    });

    meses = Array.from(meses).sort();

    // Calcular datos por mes
    var gastosXMes = meses.map(m => {
        return parseFloat(compras.filter(c => {
            var fecha = new Date(c.fecha_emision);
            return (fecha.getFullYear() + '-' + String(fecha.getMonth() + 1).padStart(2, '0')) === m;
        }).reduce((sum, c) => sum + (parseFloat(c.total_final) || 0), 0)) || 0;
    });

    var pagosXMes = meses.map(m => {
        return parseFloat(pagos.filter(p => {
            if (p.estado !== 'confirmado') return false;
            var fecha = new Date(p.fecha_pago);
            return (fecha.getFullYear() + '-' + String(fecha.getMonth() + 1).padStart(2, '0')) === m;
        }).reduce((sum, p) => sum + (parseFloat(p.monto) || 0), 0)) || 0;
    });

    var labMeses = meses.map(m => {
        var fecha = new Date(m + '-01');
        var monthName = fecha.toLocaleString('es-CL', { month: 'short', year: 'numeric' });
        return monthName.charAt(0).toUpperCase() + monthName.slice(1);
    });

    // Recrear gráfico comparativa después de limpiar
    setTimeout(() => {
        try {
            chartComparativa = new Chart(document.getElementById('chartComparativa'), {
                type: 'bar',
                data: {
                    labels: labMeses,
                    datasets: [
                        {
                            label: 'Gastos',
                            data: gastosXMes,
                            backgroundColor: 'rgba(231,76,60,0.7)',
                            borderColor: '#e74c3c',
                            borderWidth: 1
                        },
                        {
                            label: 'Pagos',
                            data: pagosXMes,
                            backgroundColor: 'rgba(39,174,96,0.7)',
                            borderColor: '#27ae60',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'top' } },
                    scales: { y: { beginAtZero: true, ticks: { callback: v => '$' + v.toLocaleString('es-CL') } } }
                }
            });
        } catch(e) {
            console.error('Error creando gráfico comparativa:', e);
        }

        // Recrear gráfico dona pagos
        try {
            var estPagos = {};
            pagos.forEach(p => {
                estPagos[p.estado] = (estPagos[p.estado] || 0) + 1;
            });

            chartPagos = new Chart(document.getElementById('chartPagos'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(estPagos),
                    datasets: [{
                        data: Object.values(estPagos),
                        backgroundColor: ['#f39c12', '#27ae60', '#e74c3c', '#7f8c8d']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        } catch(e) {
            console.error('Error creando gráfico pagos:', e);
        }
    }, 150);
}

/**
 * Actualizar tablas con datos filtrados
 */
function actualizar_tablas(compras, pagos) {
    // Destruir DataTables correctamente verificando si ya existen
    try {
        if ($.fn.dataTable.isDataTable('#tabla_compras')) {
            $('#tabla_compras').DataTable().destroy();
        }
        if ($.fn.dataTable.isDataTable('#tabla_pagos')) {
            $('#tabla_pagos').DataTable().destroy();
        }
    } catch(e) {
        console.log('Error destruyendo tablas:', e);
    }
    tabla_compras_dt = null;
    tabla_pagos_dt = null;

    // ── Tabla Compras ──
    var htmlTbodyCompras = '';
    var htmlTfootCompras = '';
    if (compras.length > 0) {
        var totalCompras = 0;
        compras.forEach(c => {
            var _partesFechaEmision = (c.fecha_emision || '').substring(0, 10).split('-');
            var fechaEmision = _partesFechaEmision.length === 3 ? _partesFechaEmision[2] + '-' + _partesFechaEmision[1] + '-' + _partesFechaEmision[0] : (c.fecha_emision || '');
            var detalles = (c.detalles && c.detalles.length > 0)
                ? c.detalles.map(d => '<small class="d-block"><i class="feather icon-box mr-1 text-muted"></i>' + (d.producto ? d.producto.nombre : 'Producto #' + d.id_producto) + ' <span class="text-muted">(x' + d.cantidad + ')</span></small>').join('')
                : '<small class="text-muted">Sin detalles</small>';
            var estado = c.estado == 1
                ? '<span class="badge badge-success">Pagada</span>'
                : '<span class="badge badge-warning">Pendiente</span>';

            htmlTbodyCompras += '<tr>';
            htmlTbodyCompras += '<td><span class="badge badge-secondary">' + (c.numero_factura || '-') + '</span></td>';
            htmlTbodyCompras += '<td>' + fechaEmision + '</td>';
            htmlTbodyCompras += '<td>' + (c.proveedor ? c.proveedor.nombre : 'N/A') + '</td>';
            htmlTbodyCompras += '<td>' + detalles + '</td>';
            htmlTbodyCompras += '<td class="text-right">$' + Number(c.total || 0).toLocaleString('es-CL') + '</td>';
            htmlTbodyCompras += '<td class="text-right">$' + Number(c.iva || 0).toLocaleString('es-CL') + '</td>';
            htmlTbodyCompras += '<td class="text-right font-weight-bold">$' + Number(c.total_final || 0).toLocaleString('es-CL') + '</td>';
            htmlTbodyCompras += '<td>' + estado + '</td>';
            htmlTbodyCompras += '<td class="text-center"><button class="btn btn-info btn-sm" onclick="ver_detalle_compra(' + c.id + ')"><i class="feather icon-eye"></i></button></td>';
            htmlTbodyCompras += '</tr>';
            totalCompras += parseFloat(c.total_final) || 0;
        });
        htmlTfootCompras = '<tr class="table-danger font-weight-bold"><td colspan="6" class="text-right">Total compras:</td><td class="text-right">$' + Number(totalCompras).toLocaleString('es-CL') + '</td><td colspan="2"></td></tr>';
    } else {
        htmlTbodyCompras = '<tr><td colspan="9" class="text-center text-muted py-4">No hay compras registradas en este período</td></tr>';
    }

    // Insertar correctamente tbody y tfoot por separado
    $('#tabla_compras tbody').html(htmlTbodyCompras);
    $('#tabla_compras tfoot').html(htmlTfootCompras);

    // ── Tabla Pagos ──
    var htmlTbodyPagos = '';
    var htmlTfootPagos = '';
    if (pagos.length > 0) {
        var totalPagado = 0;
        pagos.forEach(p => {
            var _partesFechaPago = (p.fecha_pago || '').substring(0, 10).split('-');
            var fechaPago = _partesFechaPago.length === 3 ? _partesFechaPago[2] + '-' + _partesFechaPago[1] + '-' + _partesFechaPago[0] : (p.fecha_pago || '');
            var estadoBadge = '';
            switch(p.estado) {
                case 'pendiente': estadoBadge = '<span class="badge badge-warning">Pendiente</span>'; break;
                case 'confirmado': estadoBadge = '<span class="badge badge-success">Confirmado</span>'; break;
                default: estadoBadge = '<span class="badge badge-light">' + p.estado + '</span>';
            }

            htmlTbodyPagos += '<tr>';
            htmlTbodyPagos += '<td><span class="badge badge-secondary">#' + (p.id || '-') + '</span></td>';
            htmlTbodyPagos += '<td>' + fechaPago + '</td>';
            htmlTbodyPagos += '<td>' + (p.cliente ? p.cliente.nombre : 'N/A') + '</td>';
            htmlTbodyPagos += '<td>' + (p.pedido ? p.pedido.numero_pedido : '-') + '</td>';
            htmlTbodyPagos += '<td>' + (p.formaPago ? p.formaPago.nombre : '-') + '</td>';
            htmlTbodyPagos += '<td>' + (p.numero_documento || '-') + '</td>';
            htmlTbodyPagos += '<td class="text-right font-weight-bold">$' + Number(p.monto || 0).toLocaleString('es-CL') + '</td>';
            htmlTbodyPagos += '<td>' + estadoBadge + '</td>';
            htmlTbodyPagos += '<td class="text-center text-muted">-</td>';
            htmlTbodyPagos += '<td class="text-center"><button class="btn btn-info btn-sm" onclick="imprimir_pago(' + p.id + ')"><i class="feather icon-printer"></i></button></td>';
            htmlTbodyPagos += '</tr>';
            if (p.estado === 'confirmado') {
                totalPagado += parseFloat(p.monto) || 0;
            }
        });
        if (pagos.some(p => p.estado === 'confirmado')) {
            htmlTfootPagos = '<tr class="table-success font-weight-bold"><td colspan="7" class="text-right">TOTAL PAGADO (CONFIRMADOS):</td><td class="text-right">$' + Number(totalPagado).toLocaleString('es-CL') + '</td><td colspan="2"></td></tr>';
        }
    } else {
        htmlTbodyPagos = '<tr><td colspan="10" class="text-center text-muted py-4">No hay pagos registrados en este período</td></tr>';
    }

    $('#tabla_pagos tbody').html(htmlTbodyPagos);
    $('#tabla_pagos tfoot').html(htmlTfootPagos);

    // Reinicializar DataTables con delay para asegurar que DOM está listo
    setTimeout(() => {
        try {
            tabla_compras_dt = $('#tabla_compras').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json' },
                responsive: true,
                pageLength: 10,
                order: [[1, 'desc']],
                destroy: true
            });
        } catch(e) {
            console.error('Error reinicializando tabla_compras:', e);
        }

        try {
            tabla_pagos_dt = $('#tabla_pagos').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json' },
                responsive: true,
                pageLength: 10,
                order: [[1, 'desc']],
                destroy: true
            });
        } catch(e) {
            console.error('Error reinicializando tabla_pagos:', e);
        }
    }, 200);
}

$(document).ready(function() {
    tabla_compras_dt = $('#tabla_compras').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json' },
        responsive: true,
        pageLength: 10,
        order: [[1, 'desc']]
    });

    tabla_pagos_dt = $('#tabla_pagos').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json' },
        responsive: true,
        pageLength: 10,
        order: [[1, 'desc']]
    });

    // --- Gráfico comparativa mensual ---
    @php
        $meses = collect();
        foreach($compras as $c) { $meses->push(\Carbon\Carbon::parse($c->fecha_emision)->format('Y-m')); }
        foreach($pagos as $p) { $meses->push($p->fecha_pago->format('Y-m')); }
        $meses = $meses->unique()->sort()->values()->take(12);

        $gastosXMes   = $meses->map(fn($m) => $compras->filter(fn($c) => \Carbon\Carbon::parse($c->fecha_emision)->format('Y-m') == $m)->sum('total_final'));
        $pagosXMes = $meses->map(fn($m) => $pagos->filter(fn($p) => $p->fecha_pago->format('Y-m') == $m && $p->estado == 'confirmado')->sum('monto'));
        $labMeses = $meses->map(fn($m) => \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y'));
    @endphp

    new Chart(document.getElementById('chartComparativa'), {
        type: 'bar',
        data: {
            labels: {!! $labMeses->values()->toJson() !!},
            datasets: [
                {
                    label: 'Gastos',
                    data: {!! $gastosXMes->values()->toJson() !!},
                    backgroundColor: 'rgba(231,76,60,0.7)',
                    borderColor: '#e74c3c', borderWidth: 1
                },
                {
                    label: 'Pagos',
                    data: {!! $pagosXMes->values()->toJson() !!},
                    backgroundColor: 'rgba(39,174,96,0.7)',
                    borderColor: '#27ae60', borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { position: 'top' } },
            scales: { y: { beginAtZero: true, ticks: { callback: v => '$' + v.toLocaleString('es-CL') } } }
        }
    });

    // --- Gráfico dona pagos ---
    @php
        $estPagos = $pagos->groupBy('estado')->map->count();
    @endphp
    new Chart(document.getElementById('chartPagos'), {
        type: 'doughnut',
        data: {
            labels: {!! $estPagos->keys()->toJson() !!},
            datasets: [{
                data: {!! $estPagos->values()->toJson() !!},
                backgroundColor: ['#f39c12','#27ae60','#e74c3c','#7f8c8d'],
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // Cargar datos del laboratorio al iniciar
    @if($institucion && isset($institucion->id_lugar_atencion))
        cargar_datos_laboratorio({{ $institucion->id_lugar_atencion }});
    @endif
});

function ver_detalle_compra(id) {
    $('#contenido_detalle_compra').html('<div class="text-center py-4"><i class="feather icon-loader f-30"></i> Cargando...</div>');
    $('#modal_detalle_compra').modal('show');

    var compras = @json($compras->keyBy('id'));
    var compra  = compras[id];
    if (!compra) return;

    var html = '<div class="row mb-3">';
    html += '<div class="col-md-6"><p class="mb-1"><strong>Nº Factura:</strong> ' + compra.numero_factura + '</p>';
    html += '<p class="mb-1"><strong>Fecha emisión:</strong> ' + compra.fecha_emision + '</p>';
    html += '<p class="mb-1"><strong>Proveedor:</strong> ' + (compra.proveedor ? compra.proveedor.nombre : 'N/A') + '</p></div>';
    html += '<div class="col-md-6"><p class="mb-1"><strong>Total:</strong> $' + Number(compra.total).toLocaleString('es-CL') + '</p>';
    html += '<p class="mb-1"><strong>IVA:</strong> $' + Number(compra.iva).toLocaleString('es-CL') + '</p>';
    html += '<p class="mb-1"><strong>Total final:</strong> <strong class="text-danger">$' + Number(compra.total_final).toLocaleString('es-CL') + '</strong></p>';
    html += (compra.observaciones ? '<p class="mb-1"><strong>Obs:</strong> ' + compra.observaciones + '</p>' : '');
    html += '</div></div>';

    if (compra.detalles && compra.detalles.length) {
        html += '<h6 class="font-weight-bold border-bottom pb-2 mb-2">Productos incluidos</h6>';
        html += '<table class="table table-sm table-bordered"><thead class="thead-light"><tr><th>Producto</th><th>Cantidad</th><th>Precio unitario</th><th>Lote</th><th>Vencimiento</th></tr></thead><tbody>';
        compra.detalles.forEach(function(d) {
            html += '<tr>';
            html += '<td>' + (d.producto ? d.producto.nombre : 'Producto #' + d.id_producto) + '</td>';
            html += '<td class="text-center">' + d.cantidad + '</td>';
            html += '<td class="text-right">$' + Number(d.precio_compra).toLocaleString('es-CL') + '</td>';
            html += '<td>' + (d.lote || '-') + '</td>';
            html += '<td>' + (d.fecha_vencimiento || '-') + '</td>';
            html += '</tr>';
        });
        html += '</tbody></table>';
    }

    $('#contenido_detalle_compra').html(html);
}
</script>
@endsection

