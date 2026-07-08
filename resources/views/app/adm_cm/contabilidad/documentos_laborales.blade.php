@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Documentos Laborales</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Documentos Laborales</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="documentos" class="view active">
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
                    </main>

                    <div class="modal-backdrop" id="modal-backdrop"></div>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('js/app_dashboard.js') }}"></script>
@endsection
