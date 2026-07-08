@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Copagos y FONASA</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Copagos y FONASA</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="copagos" class="view active">
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
