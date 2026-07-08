@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
    <style>
        body.admin-dashboard-solo .view {
            display: none !important;
        }

        body.admin-dashboard-solo #admin-dashboard {
            display: block !important;
        }

        body.admin-dashboard-solo [data-go] {
            display: none !important;
        }

        .date-range-filter {
            margin-top: 14px;
            display: flex;
            flex-wrap: wrap;
            align-items: end;
            gap: 10px;
        }

        .date-range-filter .filter-field {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 170px;
        }

        .date-range-filter .filter-field small {
            font-size: 11px;
            color: #6b7b8c;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .date-range-filter input[type='date'] {
            height: 38px;
            border: 1px solid #d6dfe6;
            border-radius: 10px;
            padding: 0 10px;
            background: #fff;
            color: #213549;
        }

        .date-range-filter .filter-actions {
            display: flex;
            gap: 8px;
        }
    </style>
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Escritorio contabilidad</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_comercial') }}">Escritorio Adm. Comercial</a></li>
</ul>
@endsection

@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="feather icon-check-circle mr-2"></i>
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="feather icon-alert-circle mr-2"></i>
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
            <main>

                <section id="admin-dashboard" class="view">
                    <div class="hero admin-hero">
                        <div>
                            <p class="eyebrow">CENTRO MEDICO · JUNIO 2026</p>
                            <h2>Panel del administrador</h2>
                            <p>Finanzas, personal y operacion diaria en una sola vista.</p>
                            <div class="hero-actions">
                                <button class="secondary" data-go="movimientos">Registrar movimiento</button>
                                <button class="primary" data-go="copagos">Revisar FONASA</button>
                            </div>
                        </div>
                        <div class="hero-balance">
                            <small>Resultado del mes</small>
                            <strong id="admin-result">$0</strong>
                            <span id="admin-result-status">Balance del periodo</span>
                        </div>
                    </div>

                    <div class="metrics admin-metrics">
                        <article class="metric"><span class="metric-icon green">+</span><div><small>Ingresos del mes</small><strong id="admin-income">$0</strong><em id="admin-income-detail"></em></div></article>
                        <article class="metric"><span class="metric-icon red">-</span><div><small>Egresos del mes</small><strong id="admin-expense">$0</strong><em id="admin-expense-detail"></em></div></article>
                        <article class="metric"><span class="metric-icon blue">F</span><div><small>Por cobrar FONASA</small><strong id="admin-fonasa">$0</strong><em id="admin-fonasa-detail"></em></div></article>
                        <article class="metric"><span class="metric-icon green">$</span><div><small>Copagos recibidos</small><strong id="admin-copays">$0</strong><em id="admin-copays-detail"></em></div></article>
                        <article class="metric"><span class="metric-icon blue">P</span><div><small>Personal activo</small><strong id="admin-workers">0</strong><em id="admin-workers-detail"></em></div></article>
                        <article class="metric"><span class="metric-icon amber">R</span><div><small>Sueldos pendientes</small><strong id="admin-payroll">$0</strong><em id="admin-payroll-detail"></em></div></article>
                    </div>

                    <div class="operations-strip">
                        <article><span class="operation-icon blue">A</span><div><strong>42</strong><small>Atenciones hoy</small></div><b>31 completadas</b></article>
                        <article><span class="operation-icon green">$</span><div><strong id="admin-cash">$0</strong><small>Caja disponible</small></div><b class="text-green">+8,4% mensual</b></article>
                        <article><span class="operation-icon green">C</span><div><strong id="admin-active-registers">0</strong><small>Cajas activas</small></div><b id="admin-registers-detail">Turnos abiertos</b></article>
                        <article><span class="operation-icon amber">V</span><div><strong id="admin-absences">0</strong><small>Solicitudes pendientes</small></div><b>Requieren revision</b></article>
                        <article><span class="operation-icon purple">D</span><div><strong id="admin-documents">0</strong><small>Respaldos requeridos</small></div><b>Documentacion FONASA</b></article>
                    </div>

                    <article class="panel cash-register-panel">
                        <div class="panel-head">
                            <div><p class="eyebrow">CAJAS Y TURNOS</p><h3>Cajas activas del centro medico</h3></div>
                            <div class="cash-register-summary"><span class="status-dot"></span><strong id="admin-register-total">$0 recaudado</strong></div>
                        </div>
                        <div id="admin-cash-registers" class="cash-register-grid"></div>
                    </article>

                    <div class="dashboard-grid">
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">FLUJO MENSUAL</p><h3>Ingresos vs. egresos</h3></div><span class="pill">Ultimos 6 meses</span></div>
                            <div class="chart" id="admin-cash-chart"></div>
                            <div class="chart-legend"><span><i class="legend income"></i>Ingresos</span><span><i class="legend expense"></i>Egresos</span></div>
                        </article>
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">OPERACION</p><h3>Estado de la jornada</h3></div></div>
                            <div class="progress-list">
                                <div class="progress-item"><div><span>Atenciones completadas</span><strong>74%</strong></div><i><b style="width:74%"></b></i></div>
                                <div class="progress-item"><div><span>Ocupacion de agenda</span><strong>78%</strong></div><i><b style="width:78%"></b></i></div>
                                <div class="progress-item"><div><span>Bonos con respaldo</span><strong id="admin-bonds-progress">0%</strong></div><i><b id="admin-bonds-bar"></b></i></div>
                                <div class="progress-item"><div><span>Remuneraciones pagadas</span><strong id="admin-payroll-progress">0%</strong></div><i><b id="admin-payroll-bar"></b></i></div>
                            </div>
                        </article>
                    </div>

                    <div class="dashboard-grid dashboard-row">
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">PROFESIONALES</p><h3>Actividad y cobranza</h3></div><button class="link-button" data-go="copagos">Ver detalle</button></div>
                            <div class="table-wrap"><table class="compact-table"><thead><tr><th>Profesional</th><th>Bonos</th><th>Copagos</th><th>A cobrar</th></tr></thead><tbody id="admin-professionals"></tbody></table></div>
                        </article>
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">PENDIENTES</p><h3>Acciones requeridas</h3></div></div>
                            <div class="task-list">
                                <button data-go="remuneraciones"><span class="task-icon amber">R</span><div><strong>Remuneraciones</strong><small id="admin-task-payroll"></small></div><b>&gt;</b></button>
                                <button data-go="ausencias"><span class="task-icon blue">V</span><div><strong>Vacaciones</strong><small id="admin-task-absences"></small></div><b>&gt;</b></button>
                                <button data-go="copagos"><span class="task-icon green">F</span><div><strong>Cobranza FONASA</strong><small id="admin-task-fonasa"></small></div><b>&gt;</b></button>
                            </div>
                        </article>
                    </div>

                    <div class="dashboard-grid dashboard-row">
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">TESORERIA</p><h3>Ultimos movimientos</h3></div><button class="link-button" data-go="movimientos">Ver todos</button></div>
                            <div id="admin-movements" class="recent-movements"></div>
                        </article>
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">ACCESOS RAPIDOS</p><h3>Gestion habitual</h3></div></div>
                            <div class="quick-actions">
                                <button data-go="rrhh"><span>PE</span><strong>Personal</strong><small>Contratos y fichas</small></button>
                                <button data-go="remuneraciones"><span>RE</span><strong>Remuneraciones</strong><small>Haberes y descuentos</small></button>
                                <button data-go="documentos"><span>PDF</span><strong>Documentos</strong><small>Formularios laborales</small></button>
                                <button data-go="copagos"><span>FO</span><strong>FONASA</strong><small>Copagos y planillas</small></button>
                                <button data-go="libro"><span>LC</span><strong>Libro contable</strong><small>Facturas y cobranza</small></button>
                            </div>
                        </article>
                    </div>
                </section>

                <section id="dashboard" class="view active">
                    <div class="hero">
                        <div>
                            <p class="eyebrow">RESUMEN JUNIO 2026</p>
                            <h2 class="text-light">Todo el centro, en orden.</h2>
                            <p>Personal, remuneraciones y movimientos financieros en un solo lugar.</p>
                        </div>
                        <div class="hero-balance">
                            <small>Resultado del mes</small>
                            <strong id="hero-result">$12.185.000</strong>
                            <span>↑ 8,4% respecto al mes anterior</span>
                        </div>
                    </div>

                    <div class="metrics">
                        <article class="metric"><span class="metric-icon blue">♙</span><div><small>Personal activo</small><strong id="metric-workers">8</strong><em>2 profesionales nuevos</em></div></article>
                        <article class="metric"><span class="metric-icon green">↗</span><div><small>Ingresos</small><strong id="metric-income">$28.450.000</strong><em>12 movimientos</em></div></article>
                        <article class="metric"><span class="metric-icon red">↘</span><div><small>Egresos</small><strong id="metric-expense">$16.265.000</strong><em>9 movimientos</em></div></article>
                        <article class="metric"><span class="metric-icon amber">$</span><div><small>Sueldos pendientes</small><strong id="metric-payroll">$3.890.000</strong><em>4 por pagar</em></div></article>
                    </div>

                    <div class="dashboard-grid">
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">FLUJO MENSUAL</p><h3>Ingresos vs. egresos</h3></div><span class="pill">Últimos 6 meses</span></div>
                            <div class="chart" id="cash-chart"></div>
                            <div class="chart-legend"><span><i class="legend income"></i>Ingresos</span><span><i class="legend expense"></i>Egresos</span></div>
                        </article>
                        <article class="panel">
                            <div class="panel-head"><div><p class="eyebrow">PENDIENTES</p><h3>Acciones requeridas</h3></div></div>
                            <div class="task-list">
                                <button data-go="remuneraciones"><span class="task-icon amber">$</span><div><strong>4 remuneraciones</strong><small>Vencen el 30 de junio</small></div><b>›</b></button>
                                <button data-go="ausencias"><span class="task-icon blue">□</span><div><strong>2 solicitudes</strong><small>Pendientes de autorización</small></div><b>›</b></button>
                                <button data-go="movimientos"><span class="task-icon red">!</span><div><strong>3 facturas</strong><small>Próximas a vencer</small></div><b>›</b></button>
                            </div>
                        </article>
                    </div>
                </section>

                <section id="rrhh" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">RECURSOS HUMANOS</p><h2>Personal del centro</h2><p>Contratos, contacto y datos bancarios.</p></div>
                        <button class="primary" data-modal="worker-modal">+ Registrar trabajador</button>
                    </div>
                    <div class="tabs" data-table-tabs>
                        <button class="active" data-filter="all">Todos</button>
                        <button data-filter="profesional">Profesionales de salud</button>
                        <button data-filter="administrativo">Administrativos</button>
                        <button data-filter="mantencion">Mantención</button>
                    </div>
                    <article class="panel table-panel">
                        <div class="table-tools"><input id="worker-search" type="search" placeholder="Buscar por nombre, RUT o cargo"><span id="worker-count"></span></div>
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Trabajador</th><th>Cargo</th><th>Contrato</th><th>Remuneración</th><th>Estado</th><th></th></tr></thead>
                                <tbody id="workers-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>

                <section id="remuneraciones" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">REMUNERACIONES</p><h2>Pago de remuneraciones</h2><p>Haberes, descuentos y sueldo líquido.</p></div>
                        <button class="primary" data-modal="payroll-modal">+ Nueva remuneración</button>
                    </div>
                    <div class="summary-strip">
                        <div><small>Total haberes</small><strong id="payroll-gross"></strong></div>
                        <div><small>Total descuentos</small><strong id="payroll-discounts"></strong></div>
                        <div><small>Líquido a pagar</small><strong id="payroll-net"></strong></div>
                        <div><small>Estado período</small><strong class="text-amber">En proceso</strong></div>
                    </div>
                    <article class="panel table-panel">
                        <div class="panel-head"><div><p class="eyebrow">JUNIO 2026</p><h3>Libro de remuneraciones</h3></div><span class="pill">8 trabajadores</span></div>
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Trabajador</th><th>AFP</th><th>Salud</th><th>Cesantía</th><th>Caja</th><th>Total descuentos</th><th>Líquido</th><th>Estado</th><th></th></tr></thead>
                                <tbody id="payroll-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>

                <section id="ausencias" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">PERSONAL</p><h2>Vacaciones, permisos y licencias</h2><p>Solicitudes, saldos y autorizaciones.</p></div>
                        <button class="primary" data-modal="absence-modal">+ Nueva solicitud</button>
                    </div>
                    <div class="metrics compact">
                        <article class="metric"><span class="metric-icon blue">□</span><div><small>Solicitudes pendientes</small><strong id="pending-absences">2</strong></div></article>
                        <article class="metric"><span class="metric-icon green">✓</span><div><small>Autorizadas este mes</small><strong>5</strong></div></article>
                        <article class="metric"><span class="metric-icon red">+</span><div><small>Licencias activas</small><strong>1</strong></div></article>
                    </div>
                    <article class="panel table-panel">
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Trabajador</th><th>Tipo</th><th>Período</th><th>Días</th><th>Estado</th><th></th></tr></thead>
                                <tbody id="absence-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>

                <section id="libro" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">GESTION TRIBUTARIA</p><h2>Libro contable y facturacion</h2><p>Ventas, compras, cuentas pendientes y documentos tributarios.</p></div>
                        <button class="primary" data-modal="tax-document-modal">+ Emitir documento</button>
                    </div>

                    <div class="metrics accounting-metrics">
                        <article class="metric"><span class="metric-icon green">C</span><div><small>Pendiente de cobro</small><strong id="book-receivable">$0</strong><em id="book-receivable-count"></em></div></article>
                        <article class="metric"><span class="metric-icon red">P</span><div><small>Pendiente de pago</small><strong id="book-payable">$0</strong><em id="book-payable-count"></em></div></article>
                        <article class="metric"><span class="metric-icon blue">V</span><div><small>Ventas del periodo</small><strong id="book-sales">$0</strong><em>Documentos emitidos</em></div></article>
                        <article class="metric"><span class="metric-icon amber">IVA</span><div><small>IVA debito estimado</small><strong id="book-tax">$0</strong><em>No reemplaza declaracion SII</em></div></article>
                    </div>

                    <div class="tabs book-tabs" id="book-tabs">
                        <button class="active" data-book-filter="all">Libro diario</button>
                        <button data-book-filter="receivable">Por cobrar</button>
                        <button data-book-filter="payable">Por pagar</button>
                        <button data-book-filter="sales">Ventas</button>
                        <button data-book-filter="purchases">Compras</button>
                        <button data-book-filter="issued">Documentos emitidos</button>
                    </div>

                    <article class="panel table-panel">
                        <div class="table-tools book-tools">
                            <input id="book-search" type="search" placeholder="Buscar folio, RUT, cliente, proveedor o glosa">
                            <select id="book-document-type">
                                <option value="all">Todos los documentos</option>
                                <option value="Factura">Facturas</option>
                                <option value="Boleta">Boletas</option>
                                <option value="Guia de despacho">Guias de despacho</option>
                                <option value="Nota de credito">Notas de credito</option>
                            </select>
                            <span id="book-result-count"></span>
                        </div>
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Documento</th><th>Emision / vencimiento</th><th>Cliente o proveedor</th><th>Glosa</th><th>Neto</th><th>IVA</th><th>Total</th><th>Estado</th><th>Acciones</th></tr></thead>
                                <tbody id="book-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>

                <section id="movimientos" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">LIBRO CONTABLE</p><h2>Ingresos y egresos</h2><p>Movimientos financieros del centro médico.</p></div>
                        <button class="primary" data-modal="movement-modal">+ Registrar movimiento</button>
                    </div>
                    <div class="tabs" data-movement-tabs>
                        <button class="active" data-filter="all">Todos</button>
                        <button data-filter="ingreso">Ingresos</button>
                        <button data-filter="egreso">Egresos</button>
                    </div>
                    <article class="panel table-panel">
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Fecha</th><th>Tipo</th><th>Categoría</th><th>Glosa</th><th>Monto</th><th>Estado</th></tr></thead>
                                <tbody id="movements-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>

                <section id="documentos" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">GESTIÓN DOCUMENTAL</p><h2>Formularios y documentos laborales</h2><p>Complete, previsualice e imprima documentos en formato PDF.</p></div>
                        <span class="legal-notice">Modelos sujetos a revisión legal</span>
                    </div>
                    <div class="document-grid">
                        <article class="document-card">
                            <span class="document-icon blue">VA</span>
                            <div><h3>Comprobante de vacaciones</h3><p>Solicitud, autorización y constancia del período de descanso.</p></div>
                            <button class="primary" data-document-type="vacaciones">Crear formulario</button>
                        </article>
                        <article class="document-card">
                            <span class="document-icon green">CT</span>
                            <div><h3>Contrato de trabajo</h3><p>Contrato individual con cargo, jornada, remuneración y vigencia.</p></div>
                            <button class="primary" data-document-type="contrato">Crear contrato</button>
                        </article>
                        <article class="document-card">
                            <span class="document-icon red">TD</span>
                            <div><h3>Carta de término</h3><p>Comunicación de término o despido con causal y fecha efectiva.</p></div>
                            <button class="primary" data-document-type="despido">Crear carta</button>
                        </article>
                        <article class="document-card">
                            <span class="document-icon amber">FI</span>
                            <div><h3>Finiquito</h3><p>Resumen de haberes, indemnizaciones, descuentos y total a pagar.</p></div>
                            <button class="primary" data-document-type="finiquito">Crear finiquito</button>
                        </article>
                    </div>
                    <article class="panel table-panel">
                        <div class="panel-head"><div><p class="eyebrow">ARCHIVO DIGITAL</p><h3>Documentos generados</h3></div><span class="pill" id="document-count">0 documentos</span></div>
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Fecha</th><th>Documento</th><th>Trabajador</th><th>Estado</th><th></th></tr></thead>
                                <tbody id="documents-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>

                <section id="copagos" class="view">
                    <div class="section-toolbar">
                        <div><p class="eyebrow">COBRANZA FONASA</p><h2>Copagos por profesional</h2><p>Recepción de copagos y planillas de cobro separadas por prestador.</p></div>
                        <button class="primary" data-modal="copay-modal">+ Registrar atención</button>
                    </div>
                    <div class="metrics compact">
                        <article class="metric"><span class="metric-icon blue">BAS</span><div><small>Atenciones registradas</small><strong id="copay-count">0</strong></div></article>
                        <article class="metric"><span class="metric-icon green">$</span><div><small>Total bonificación FONASA</small><strong id="copay-bonus">$0</strong></div></article>
                        <article class="metric"><span class="metric-icon amber">$</span><div><small>Total copagos recibidos</small><strong id="copay-total">$0</strong></div></article>
                    </div>
                    <div id="professional-copay-summary" class="professional-summary"></div>
                    <article class="panel table-panel">
                        <div class="panel-head">
                            <div><p class="eyebrow">DETALLE DE ATENCIONES</p><h3>Bonos y copagos recibidos</h3></div>
                            <select id="copay-professional-filter" class="compact-select"><option value="all">Todos los profesionales</option></select>
                        </div>
                        <div class="table-wrap">
                            <table>
                                <thead><tr><th>Fecha</th><th>Profesional</th><th>Nro BAS</th><th>Valor</th><th>Bonificación</th><th>Copago</th><th>A cobrar</th><th>Documento</th></tr></thead>
                                <tbody id="copays-body"></tbody>
                            </table>
                        </div>
                    </article>
                </section>
            </main>

    <div class="modal-backdrop" id="modal-backdrop"></div>

    <dialog id="worker-modal">
        <form id="worker-form">
            <div class="modal-head"><div><p class="eyebrow">RECURSOS HUMANOS</p><h3>Registrar trabajador</h3></div><button type="button" class="close">×</button></div>
            <div class="form-grid">
                <label>RUT<input name="rut" required placeholder="12.345.678-9"></label>
                <label>Tipo<select name="type" required><option value="profesional">Profesional de salud</option><option value="administrativo">Administrativo</option><option value="mantencion">Mantención</option></select></label>
                <label class="wide">Nombre completo<input name="name" required></label>
                <label>Cargo<input name="role" required></label>
                <label>Especialidad<input name="specialty"></label>
                <label>Fecha de ingreso<input name="start" type="date" required></label>
                <label>Sueldo base<input name="salary" type="number" min="0" required></label>
                <label>Correo<input name="email" type="email"></label>
                <label>Teléfono<input name="phone"></label>
            </div>
            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button class="primary">Guardar trabajador</button></div>
        </form>
    </dialog>

    <dialog id="payroll-modal">
        <form id="payroll-form">
            <div class="modal-head"><div><p class="eyebrow">REMUNERACIONES</p><h3>Calcular remuneración</h3></div><button type="button" class="close">×</button></div>
            <p class="form-note">Tasas de demostración configurables. En producción deben obtenerse desde parámetros previsionales vigentes.</p>
            <div class="form-grid">
                <label class="wide">Trabajador<select name="workerId" id="payroll-worker" required></select></label>
                <label>Sueldo base<input name="base" type="number" min="0" required></label>
                <label>Bonos<input name="bonus" type="number" min="0" value="0"></label>
                <label>Colación<input name="meal" type="number" min="0" value="0"></label>
                <label>Movilización<input name="transport" type="number" min="0" value="0"></label>
                <label>AFP
                    <select name="afpName" id="payroll-afp">
                        <option value="Capital" data-rate="11.44">AFP Capital · 11,44%</option>
                        <option value="Cuprum" data-rate="11.44">AFP Cuprum · 11,44%</option>
                        <option value="Habitat" data-rate="11.27">AFP Habitat · 11,27%</option>
                        <option value="Modelo" data-rate="10.58">AFP Modelo · 10,58%</option>
                        <option value="PlanVital" data-rate="11.16">AFP PlanVital · 11,16%</option>
                        <option value="Provida" data-rate="11.45">AFP Provida · 11,45%</option>
                        <option value="Uno" data-rate="10.49">AFP Uno · 10,49%</option>
                    </select>
                </label>
                <label>Tasa AFP %<input name="afpRate" id="payroll-afp-rate" type="number" min="0" step="0.01" value="11.44"></label>
                <label>Sistema de salud
                    <select name="healthName">
                        <option value="Fonasa">Fonasa</option>
                        <option value="Isapre">Isapre</option>
                    </select>
                </label>
                <label>Salud %<input name="healthRate" type="number" min="0" step="0.01" value="7"></label>
                <label>Adicional Isapre<input name="healthExtra" type="number" min="0" value="0"></label>
                <label>Seguro cesantía %<input name="unemploymentRate" type="number" min="0" step="0.01" value="0.6"></label>
                <label>Caja de compensación
                    <select name="compensationName">
                        <option value="Sin caja">Sin caja</option>
                        <option value="Los Andes">Los Andes</option>
                        <option value="La Araucana">La Araucana</option>
                        <option value="18 de Septiembre">18 de Septiembre</option>
                        <option value="Los Héroes">Los Héroes</option>
                    </select>
                </label>
                <label>Descuento caja<input name="compensation" type="number" min="0" value="0"></label>
                <label>APV / ahorro voluntario<input name="apv" type="number" min="0" value="0"></label>
                <label>Anticipos<input name="advance" type="number" min="0" value="0"></label>
                <label>Préstamos<input name="loan" type="number" min="0" value="0"></label>
                <label>Otros descuentos<input name="otherDiscount" type="number" min="0" value="0"></label>
            </div>
            <div class="calculation payroll-calculation">
                <div><span>AFP</span><strong id="preview-afp">$0</strong></div>
                <div><span>Salud</span><strong id="preview-health">$0</strong></div>
                <div><span>Cesantía</span><strong id="preview-unemployment">$0</strong></div>
                <div><span>Total descuentos</span><strong id="preview-discounts">$0</strong></div>
                <div><span>Líquido estimado</span><strong id="payroll-preview">$0</strong></div>
            </div>
            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button class="primary">Registrar cálculo</button></div>
        </form>
    </dialog>

    <dialog id="payroll-detail-modal">
        <div class="detail-dialog">
            <div class="modal-head"><div><p class="eyebrow">LIQUIDACIÓN SIMULADA</p><h3 id="detail-worker-name">Detalle previsional</h3></div><button type="button" class="close">×</button></div>
            <div id="payroll-detail"></div>
            <div class="modal-actions"><button type="button" class="secondary close">Cerrar</button></div>
        </div>
    </dialog>

    <dialog id="absence-modal">
        <form id="absence-form">
            <div class="modal-head"><div><p class="eyebrow">AUSENCIAS</p><h3>Nueva solicitud</h3></div><button type="button" class="close">×</button></div>
            <div class="form-grid">
                <label class="wide">Trabajador<select name="workerId" id="absence-worker" required></select></label>
                <label>Tipo<select name="type"><option>Vacaciones legales</option><option>Permiso con goce</option><option>Permiso sin goce</option><option>Licencia médica</option></select></label>
                <label>Días hábiles<input name="days" type="number" min="1" required></label>
                <label>Desde<input name="start" type="date" required></label>
                <label>Hasta<input name="end" type="date" required></label>
            </div>
            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button class="primary">Registrar solicitud</button></div>
        </form>
    </dialog>

    <dialog id="movement-modal">
        <form id="movement-form">
            <div class="modal-head"><div><p class="eyebrow">LIBRO CONTABLE</p><h3>Registrar movimiento</h3></div><button type="button" class="close">×</button></div>
            <div class="form-grid">
                <label>Tipo<select name="type"><option value="ingreso">Ingreso</option><option value="egreso">Egreso</option></select></label>
                <label>Fecha<input name="date" type="date" required></label>
                <label>Categoría<input name="category" required></label>
                <label>Monto<input name="amount" type="number" min="1" required></label>
                <label class="wide">Glosa<input name="description" required></label>
            </div>
            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button class="primary">Registrar movimiento</button></div>
        </form>
    </dialog>

    <dialog id="tax-document-modal" class="document-modal">
        <form id="tax-document-form">
            <div class="modal-head"><div><p class="eyebrow">DOCUMENTO TRIBUTARIO</p><h3>Emitir nuevo documento</h3></div><button type="button" class="close">×</button></div>
            <p class="form-note">Simulacion contable. La emision fiscal real requiere integracion con SII o un proveedor de facturacion electronica autorizado.</p>
            <div class="form-grid">
                <label>Tipo de operacion<select name="nature" required><option value="venta">Venta / por cobrar</option><option value="compra">Compra / por pagar</option></select></label>
                <label>Tipo de documento<select name="documentType" required><option>Factura</option><option>Boleta</option><option>Guia de despacho</option><option>Nota de credito</option></select></label>
                <label>Folio<input name="folio" required placeholder="F-000125"></label>
                <label>Fecha de emision<input name="issueDate" type="date" required></label>
                <label>Fecha de vencimiento<input name="dueDate" type="date"></label>
                <label>RUT cliente / proveedor<input name="rut" required placeholder="76.123.456-7"></label>
                <label class="wide">Razon social<input name="businessName" required placeholder="Empresa o persona receptora"></label>
                <label>Giro<input name="businessActivity" placeholder="Servicios medicos"></label>
                <label>Correo<input name="email" type="email" placeholder="facturacion@empresa.cl"></label>
                <label class="wide">Direccion<input name="address" placeholder="Direccion, comuna y region"></label>
                <label class="wide">Descripcion<input name="description" required placeholder="Prestaciones medicas, insumos o servicios"></label>
                <label>Codigo<input name="code" placeholder="SERV-001"></label>
                <label>Cantidad<input name="quantity" type="number" min="0.01" step="0.01" value="1" required></label>
                <label>Valor unitario neto<input name="unitPrice" type="number" min="0" value="0" required></label>
                <label>Descuento %<input name="discount" type="number" min="0" max="100" step="0.01" value="0"></label>
                <label>Condicion de pago<select name="paymentCondition"><option value="pendiente">Credito / pendiente</option><option value="pagado">Contado / pagado</option></select></label>
            </div>
            <div class="tax-calculation">
                <span>Neto<strong id="tax-preview-net">$0</strong></span>
                <span>IVA 19%<strong id="tax-preview-tax">$0</strong></span>
                <span>Total<strong id="tax-preview-total">$0</strong></span>
            </div>
            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button type="submit" class="primary">Emitir y registrar</button></div>
        </form>
    </dialog>

    <dialog id="tax-preview-modal" class="document-preview-modal">
        <div class="preview-shell">
            <div class="modal-head preview-toolbar">
                <div><p class="eyebrow">DOCUMENTO TRIBUTARIO</p><h3>Vista previa para imprimir</h3></div>
                <div><button type="button" class="primary" id="print-tax-document">Imprimir / Guardar PDF</button><button type="button" class="close">×</button></div>
            </div>
            <article id="tax-document-preview" class="pdf-page tax-document-page"></article>
        </div>
    </dialog>

    <dialog id="document-modal" class="document-modal">
        <form id="document-form">
            <div class="modal-head"><div><p class="eyebrow">DOCUMENTO LABORAL</p><h3 id="document-form-title">Generar documento</h3></div><button type="button" class="close">×</button></div>
            <p class="form-note">Esta es una plantilla demostrativa. Revise el contenido, la causal y los antecedentes con asesoría laboral antes de firmar.</p>
            <input type="hidden" name="documentType" id="document-type">
            <div class="form-grid">
                <label class="wide">Trabajador<select name="workerId" id="document-worker" required></select></label>
                <label>Fecha de emisión<input name="issueDate" type="date" required></label>
                <label id="document-secondary-date-label">Fecha de inicio<input name="secondaryDate" type="date" required></label>
                <label class="wide" id="document-reason-label">Motivo / causal<textarea name="reason" rows="3"></textarea></label>
                <label id="document-days-label">Días<input name="days" type="number" min="0" value="0"></label>
                <label id="document-amount-label">Monto / total<input name="amount" type="number" min="0" value="0"></label>
                <label class="wide">Observaciones<textarea name="notes" rows="3"></textarea></label>
            </div>
            <div class="modal-actions">
                <button type="button" class="secondary close">Cancelar</button>
                <button type="button" class="secondary" id="preview-document">Vista previa</button>
                <button class="primary">Generar documento</button>
            </div>
        </form>
    </dialog>

    <dialog id="copay-modal">
        <form id="copay-form">
            <div class="modal-head"><div><p class="eyebrow">ATENCIÓN FONASA</p><h3>Registrar bono y copago</h3></div><button type="button" class="close">×</button></div>
            <p class="form-note">La simulación usa identificadores ficticios y no almacena información clínica.</p>
            <div class="form-grid">
                <label class="wide">Profesional<select name="professionalId" id="copay-professional" required></select></label>
                <label>Fecha de atención<input name="date" type="date" required></label>
                <label>Nro BAS<input name="basNumber" required placeholder="Ej. 975001234"></label>
                <label>Valor prestación<input name="value" type="number" min="0" required></label>
                <label>Bonificación FONASA<input name="bonus" type="number" min="0" required></label>
                <label>Copago recibido<input name="copay" type="number" min="0" required></label>
                <label>Condición especial<input name="specialCondition" type="number" min="0" value="0"></label>
                <label>Monto a cobrar<input name="toCollect" type="number" min="0" required></label>
                <label>Exige documento<select name="requiresDocument"><option value="No">No</option><option value="Sí">Sí</option></select></label>
            </div>
            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button class="primary">Registrar atención</button></div>
        </form>
    </dialog>

    <dialog id="fonasa-report-modal" class="document-preview-modal">
        <div class="preview-shell">
            <div class="modal-head preview-toolbar">
                <div><p class="eyebrow">INFORME DE COBRANZA</p><h3>Planilla FONASA por profesional</h3></div>
                <div><button type="button" class="primary" id="print-fonasa-report">Imprimir / Guardar PDF</button><button type="button" class="close">×</button></div>
            </div>
            <article id="fonasa-report-preview" class="pdf-page fonasa-page"></article>
        </div>
    </dialog>

    <dialog id="document-preview-modal" class="document-preview-modal">
        <div class="preview-shell">
            <div class="modal-head preview-toolbar">
                <div><p class="eyebrow">VISTA PREVIA</p><h3>Documento listo para PDF</h3></div>
                <div><button type="button" class="primary" id="print-document">Imprimir / Guardar PDF</button><button type="button" class="close">×</button></div>
            </div>
            <article id="document-preview" class="pdf-page"></article>
        </div>
    </dialog>

    <div id="toast"></div>

    <!-- Modal de selección de lugar de atención -->
    @include('app.adm_cm.contabilidad.seleccionar_lugar')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')

    <script src="{{ asset('js/app_dashboard.js') }}"></script>

    <script>
        // Pasar datos del backend al frontend
        window.dashboardData = {
            stats: @json($dashboard_stats ?? []),
            professionals: @json($admin_professionals ?? [])
        };

        // Actualizar métricas del dashboard cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            const stats = window.dashboardData.stats;
            const professionals = window.dashboardData.professionals;

            if (Object.keys(stats).length > 0) {
                // Actualizar métricas principales
                const adminWorkersEl = document.getElementById('admin-workers');
                if (adminWorkersEl) {
                    adminWorkersEl.textContent = stats.responsables_count || 0;
                    const detailEl = document.getElementById('admin-workers-detail');
                    if (detailEl) {
                        detailEl.textContent = professionals.length + ' con atenciones';
                    }
                }

                const metricWorkersEl = document.getElementById('metric-workers');
                if (metricWorkersEl) {
                    metricWorkersEl.textContent = stats.responsables_count || 0;
                }

                // Actualizar ingresos del mes
                const adminIncomeEl = document.getElementById('admin-income');
                if (adminIncomeEl && stats.total_mes) {
                    adminIncomeEl.textContent = '$' + parseInt(stats.total_mes).toLocaleString('es-CL');
                    const detailEl = document.getElementById('admin-income-detail');
                    if (detailEl) {
                        detailEl.textContent = stats.cant_bonos_mes + ' bonos emitidos';
                    }
                }

                const metricIncomeEl = document.getElementById('metric-income');
                if (metricIncomeEl && stats.total_mes) {
                    metricIncomeEl.textContent = '$' + parseInt(stats.total_mes).toLocaleString('es-CL');
                }

                // Actualizar resultado del mes (simple: ingresos como resultado)
                const adminResultEl = document.getElementById('admin-result');
                if (adminResultEl && stats.total_mes) {
                    adminResultEl.textContent = '$' + parseInt(stats.total_mes).toLocaleString('es-CL');
                }

                const heroResultEl = document.getElementById('hero-result');
                if (heroResultEl && stats.total_mes) {
                    heroResultEl.textContent = '$' + parseInt(stats.total_mes).toLocaleString('es-CL');
                }
            }

            console.log('Dashboard stats loaded:', stats);
            console.log('Professionals loaded:', professionals);
        });
    </script>
@endsection
