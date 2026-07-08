@extends('template.compin.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_compin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Compin</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Pago</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="pago" class="view active">
                            <div class="grid">
                                <article class="panel">
                                    <div class="panel-head"><div><p class="eyebrow">PAGO SUBSIDIO</p><h3>Envío a entidad pagadora</h3></div><span class="badge green">Pago</span></div>
                                    <div class="panel-body">
                                        <table><thead><tr><th>Beneficiario</th><th>Entidad</th><th>Monto</th><th>Estado</th></tr></thead><tbody id="payment-table"></tbody></table>
                                        <div class="actions"><button class="action success" id="send-payment">Enviar a pago</button></div>
                                    </div>
                                </article>
                                <article class="panel"><div class="panel-head"><div><p class="eyebrow">RESULTADO</p><h3>Resolución</h3></div></div><div class="panel-body"><p id="payment-result">Aún falta visto bueno del controlador.</p></div></article>
                            </div>
                        </section>
                    </main>

                    <div class="modal-backdrop" id="modal-backdrop"></div>

                    {{-- <dialog id="payroll-modal">
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
                    </dialog> --}}

                    <div id="toast"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('js/app_compin.js') }}"></script>
@endsection
