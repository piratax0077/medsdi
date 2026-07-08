@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Vacaciones y Licencias</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Vacaciones y Licencias</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="ausencias" class="view active">
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
                    </main>

                    <div class="modal-backdrop" id="modal-backdrop"></div>

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
