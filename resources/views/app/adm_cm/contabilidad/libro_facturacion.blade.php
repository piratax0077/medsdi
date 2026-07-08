@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Libro y Facturación</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Libro y Facturación</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="libro" class="view active">
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
                    </main>

                    <div class="modal-backdrop" id="modal-backdrop"></div>

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

                    <div id="toast"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('js/app_dashboard.js') }}"></script>
@endsection
