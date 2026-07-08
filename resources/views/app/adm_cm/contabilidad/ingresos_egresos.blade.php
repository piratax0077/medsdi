@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Ingresos y Egresos</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Ingresos y Egresos</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="movimientos" class="view active">
                            <div class="section-toolbar">
                                <div><p class="eyebrow">LIBRO CONTABLE</p><h2>Ingresos y egresos</h2><p>Movimientos financieros del centro médico.</p></div>
                                <button class="primary" data-modal="movement-modal">+ Registrar movimiento</button>
                            </div>

                            <!-- Métricas financieras -->
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="card" style="border-left: 4px solid #28a745;">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-2">Ingresos del período</h6>
                                            <h3 class="mb-0 text-success" id="metric-income">$0</h3>
                                            <small class="text-muted"><span id="metric-bonos-count">0</span> bonos registrados</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card" style="border-left: 4px solid #dc3545;">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-2">Egresos del período</h6>
                                            <h3 class="mb-0 text-danger" id="metric-expense">$0</h3>
                                            <small class="text-muted"><span id="metric-compras-count">0</span> compras, <span id="metric-gastos-count">0</span> gastos</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card" style="border-left: 4px solid #17a2b8;">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-2">Saldo</h6>
                                            <h3 class="mb-0 text-info" id="hero-result">$0</h3>
                                            <small class="text-muted">Balance del período</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gráfico de flujo -->
                            @if(!empty($flujo_6_meses))
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-3">Flujo de los últimos 6 meses</h6>
                                            <div id="cash-chart" class="chart-container" style="display: flex; gap: 12px; height: 180px; align-items: flex-end; justify-content: space-around;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

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
                    </main>

                    <div class="modal-backdrop" id="modal-backdrop"></div>

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

                    <div id="toast"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        // Pasar datos de movimientos desde PHP a JavaScript
        window.movimientosData = @json($ultimos_movimientos ?? []);
        window.movimientosStats = @json($movimientos_stats ?? []);
        window.flujoMeses = @json($flujo_6_meses ?? []);
    </script>
    <script src="{{ asset('js/app_dashboard.js') }}"></script>
@endsection
