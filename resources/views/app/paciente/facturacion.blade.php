@extends('template.paciente.template')

{{-- Ruta sugerida: Route::get('/paciente/facturacion', ...)->name('paciente.facturacion'); --}}

@section('page-styles')
<style>
    .billing-shell {
        background: #fff;
        border-radius: 0 0 6px 6px;
    }

    .billing-card {
        border: 0;
        border-radius: 6px;
        box-shadow: 0 8px 20px rgba(22, 46, 58, .06);
        overflow: visible;
    }

    .billing-header {
        padding: 18px 22px;
    }

    .billing-header h4 {
        font-weight: 800;
        margin-bottom: 4px;
    }

    .billing-header p {
        color: rgba(255,255,255,.82);
        margin-bottom: 0;
    }

    .billing-layout {
        display: grid;
        grid-template-columns: 310px 1fr;
        gap: 24px;
    }

    .billing-sidebar {
        background: #fff;
        border: 1px solid #e8eeee;
        border-radius: 12px;
        padding: 22px;
        height: 100%;
    }

    .billing-sidebar-title {
        color: #7b8d8b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .08em;
        margin-bottom: 18px;
        text-transform: uppercase;
    }

    .billing-nav-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 14px;
        color: #6f8180;
        border-radius: 12px;
        font-weight: 700;
        margin-bottom: 8px;
        text-decoration: none;
        transition: all .2s ease;
        cursor: pointer;
    }

    .billing-nav-item:hover {
        color: #08766e;
        background: #e8f6f4;
        text-decoration: none;
    }

    .billing-nav-item.active {
        color: #08766e;
        background: #dff1ee;
    }

    .billing-nav-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #f4faf9;
        color: #118579;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 34px;
    }

    .billing-nav-item.active .billing-nav-icon {
        background: #118579;
        color: #fff;
    }

    .billing-help {
        margin-top: 18px;
        padding: 20px;
        border-radius: 10px;
        color: #fff;
        background:
            radial-gradient(circle at 90% 0%, rgba(255,255,255,.18), transparent 30%),
            linear-gradient(135deg, #0b7168 0%, #0a8a7c 100%);
    }

    .billing-help h6 {
        color: #fff;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .billing-help p {
        color: rgba(255,255,255,.84);
        margin-bottom: 12px;
        font-size: 13px;
        line-height: 1.5;
    }

    .billing-help a {
        color: #fff;
        font-weight: 800;
        text-decoration: underline;
    }

    .billing-main {
        background: #fff;
        border: 1px solid #e8eeee;
        border-radius: 12px;
        padding: 26px;
    }

    .billing-main h4 {
        font-weight: 800;
        color: #263238;
        margin-bottom: 4px;
    }

    .billing-main .subtitle {
        color: #7a8b8b;
        margin-bottom: 24px;
    }

    .plan-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    .plan-card {
        position: relative;
        border: 1px solid #e8eeee;
        border-radius: 12px;
        padding: 24px 20px 20px;
        background: #fff;
        min-height: 365px;
        display: flex;
        flex-direction: column;
        transition: all .2s ease;
    }

    .plan-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 35px rgba(17, 133, 121, .12);
    }

    .plan-card.active {
        border: 2px solid rgba(17, 133, 121, .65);
        background: linear-gradient(180deg, #edf9f7 0%, #ffffff 52%);
    }

    .plan-card.recommended {
        border: 2px solid rgba(255, 118, 87, .45);
    }

    .plan-badge {
        position: absolute;
        top: -13px;
        left: 22px;
        background: #ff7657;
        color: #fff;
        font-size: 11px;
        font-weight: 800;
        padding: 6px 14px;
        border-radius: 999px;
        box-shadow: 0 8px 18px rgba(255, 118, 87, .26);
    }

    .plan-name {
        font-weight: 800;
        color: #253334;
        margin-bottom: 8px;
        font-size: 17px;
    }

    .plan-price {
        display: flex;
        align-items: flex-start;
        gap: 3px;
        color: #111c1d;
        margin-bottom: 0;
    }

    .plan-price small {
        font-size: 15px;
        font-weight: 800;
        margin-top: 8px;
    }

    .plan-price strong {
        font-size: 36px;
        line-height: 1;
        font-weight: 900;
        letter-spacing: -1.5px;
    }

    .plan-period {
        color: #8a9998;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 22px;
    }

    .plan-limit {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #7b8d8b;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .plan-icons {
        display: flex;
        gap: 7px;
        margin-bottom: 22px;
        min-height: 20px;
    }

    .plan-icons i {
        color: #d8e5e3;
        font-size: 14px;
    }

    .plan-icons i.active {
        color: #118579;
    }

    .plan-card.recommended .plan-icons i.active {
        color: #ff7657;
    }

    .plan-features {
        list-style: none;
        padding: 0;
        margin: 0 0 22px;
    }

    .plan-features li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #475b5b;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .plan-features i {
        color: #40b77a;
        margin-top: 2px;
    }

    .plan-actions {
        margin-top: auto;
    }

    .btn-plan {
        width: 100%;
        border-radius: 10px;
        padding: 12px 14px;
        font-weight: 800;
        border: 1px solid #118579;
        color: #08766e;
        background: #fff;
        transition: all .2s ease;
    }

    .btn-plan:hover {
        color: #fff;
        background: #118579;
    }

    .btn-plan-active {
        background: #7d8a87;
        border-color: #7d8a87;
        color: #fff;
        cursor: default;
    }

    .btn-plan-accent {
        background: #ff7657;
        border-color: #ff7657;
        color: #fff;
    }

    .btn-plan-accent:hover {
        background: #f36342;
        border-color: #f36342;
    }

    .section-panel {
        display: none;
    }

    .section-panel.active {
        display: block;
    }

    .payment-box,
    .invoice-box {
        border: 1px solid #e8eeee;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
        margin-bottom: 16px;
    }

    .invoice-table th {
        color: #7b8d8b;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .05em;
        border-top: none;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 999px;
        background: #e9f8f2;
        color: #18825b;
        font-weight: 800;
        font-size: 12px;
    }

    @media (max-width: 1199px) {
        .billing-layout {
            grid-template-columns: 1fr;
        }

        .plan-grid {
            grid-template-columns: 1fr;
        }

        .plan-card {
            min-height: auto;
        }
    }
</style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title"></div>
                            <ul class="breadcrumb mt-2">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                       data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Suscripciones y Facturación</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card billing-card">
                        <div class="card-header bg-info billing-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="text-white f-20">Suscripciones y facturación</h4>
                                    <p class="mb-0 text-white-50">Administra tu plan, método de pago y documentos de cobro.</p>
                                </div>
                                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                                    <button type="button" class="btn btn-light btn-sm" onclick="seleccionarSeccionFacturacion('facturas')">
                                        <i class="feather icon-file-text"></i> Ver facturas
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body billing-shell">
                            <div class="billing-layout">

                                <div class="billing-sidebar">
                                    <div class="billing-sidebar-title">Cuenta</div>

                                    <a class="billing-nav-item active" data-section="planes" href="javascript:void(0)">
                                        <span class="billing-nav-icon"><i class="feather icon-layers"></i></span>
                                        <span>Planes</span>
                                    </a>

                                    <a class="billing-nav-item" data-section="metodo_pago" href="javascript:void(0)">
                                        <span class="billing-nav-icon"><i class="feather icon-credit-card"></i></span>
                                        <span>Método de pago</span>
                                    </a>

                                    <a class="billing-nav-item" data-section="facturas" href="javascript:void(0)">
                                        <span class="billing-nav-icon"><i class="feather icon-file-text"></i></span>
                                        <span>Facturas</span>
                                    </a>

                                    <div class="billing-help">
                                        <h6>¿Necesitas agregar más dependientes?</h6>
                                        <p>Actualiza tu plan para administrar más pacientes dependientes, historial clínico y recordatorios.</p>
                                        <a href="javascript:void(0)" onclick="seleccionarSeccionFacturacion('planes')">Ver planes →</a>
                                    </div>
                                </div>

                                <div class="billing-main">

                                    <div id="section_planes" class="section-panel active">
                                        <h4>Elige el plan de tu cuenta</h4>
                                        <p class="subtitle">Puedes cambiar de plan cuando quieras. El cambio se aplicará en tu próximo cobro.</p>

                                        <div class="plan-grid">
                                            <div class="plan-card">
                                                <div class="plan-name">Plan Gratuito</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>0</strong>
                                                </div>
                                                <div class="plan-period">Siempre gratis</div>

                                                <div class="plan-limit">
                                                    <span>Pacientes incluidos</span>
                                                    <span>1/1</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                </div>

                                                <ul class="plan-features">
                                                    <li><i class="feather icon-check"></i><span>Reserva de horas médicas</span></li>
                                                    <li><i class="feather icon-check"></i><span>Receta online</span></li>
                                                    <li><i class="feather icon-check"></i><span>Acceso a ficha médica básica</span></li>
                                                </ul>

                                                <div class="plan-actions">
                                                    <button class="btn btn-plan" onclick="solicitarCambioPlan('gratuito')">Cambiar plan</button>
                                                </div>
                                            </div>

                                            <div class="plan-card active">
                                                <div class="plan-name">Plan Familiar</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>2.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Pacientes incluidos</span>
                                                    <span>3/5</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                </div>

                                                <ul class="plan-features">
                                                    <li><i class="feather icon-check"></i><span>Dependientes familiares</span></li>
                                                    <li><i class="feather icon-check"></i><span>Historial clínico digital</span></li>
                                                    <li><i class="feather icon-check"></i><span>Recordatorios por correo</span></li>
                                                </ul>

                                                <div class="plan-actions">
                                                    <button class="btn btn-plan btn-plan-active" disabled>Plan activo</button>
                                                </div>
                                            </div>

                                            <div class="plan-card recommended">
                                                <div class="plan-badge">Recomendado</div>

                                                <div class="plan-name">MedSDI Plus</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>5.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Pacientes incluidos</span>
                                                    <span>5/5</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                </div>

                                                <ul class="plan-features">
                                                    <li><i class="feather icon-check"></i><span>Historial clínico completo</span></li>
                                                    <li><i class="feather icon-check"></i><span>Exámenes y recetas online</span></li>
                                                    <li><i class="feather icon-check"></i><span>Soporte prioritario</span></li>
                                                </ul>

                                                <div class="plan-actions">
                                                    <button class="btn btn-plan btn-plan-accent" onclick="solicitarCambioPlan('plus')">Cambiar plan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="section_metodo_pago" class="section-panel">
                                        <h4>Método de pago</h4>
                                        <p class="subtitle">Administra el medio de pago asociado a tu suscripción.</p>

                                        <div class="payment-box d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                                <div class="billing-nav-icon mr-3">
                                                    <i class="feather icon-credit-card"></i>
                                                </div>
                                                <div>
                                                    <strong>Sin método de pago registrado</strong>
                                                    <div class="text-muted">Agrega una tarjeta o medio de pago para activar cobros automáticos.</div>
                                                </div>
                                            </div>

                                            <button class="btn btn-plan" style="max-width: 220px;" onclick="agregarMetodoPago()">
                                                Agregar método
                                            </button>
                                        </div>

                                        <div class="alert alert-info mb-0">
                                            <i class="feather icon-info mr-1"></i>
                                            Esta sección queda preparada para integrar Flow, Transbank, Mercado Pago o Stripe.
                                        </div>
                                    </div>

                                    <div id="section_facturas" class="section-panel">
                                        <h4>Facturas</h4>
                                        <p class="subtitle">Revisa el historial de documentos asociados a tus pagos.</p>

                                        <div class="invoice-box">
                                            <div class="table-responsive">
                                                <table class="table invoice-table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Fecha</th>
                                                            <th>Monto</th>
                                                            <th>Estado</th>
                                                            <th class="text-right">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="5" class="text-center text-muted py-4">
                                                                Aún no existen facturas registradas.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <span class="status-pill">
                                            <i class="feather icon-check-circle"></i>
                                            Cuenta al día
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-script')
<script>
    function seleccionarSeccionFacturacion(section) {
        $('.billing-nav-item').removeClass('active');
        $('.billing-nav-item[data-section="' + section + '"]').addClass('active');

        $('.section-panel').removeClass('active');
        $('#section_' + section).addClass('active');
    }

    $(document).on('click', '.billing-nav-item', function () {
        seleccionarSeccionFacturacion($(this).data('section'));
    });

    function solicitarCambioPlan(plan) {
        swal({
            title: "Cambio de plan",
            text: "Esta opción quedará conectada a la pasarela de pago. Plan seleccionado: " + plan,
            icon: "info",
            buttons: "Aceptar",
        });
    }

    function agregarMetodoPago() {
        swal({
            title: "Método de pago",
            text: "Esta opción quedará conectada a la pasarela de pago configurada para MedSDI.",
            icon: "info",
            buttons: "Aceptar",
        });
    }
</script>
@endsection
