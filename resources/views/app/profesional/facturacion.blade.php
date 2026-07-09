@extends('template.profesional.template')

@section('page-styles')
<style>
    .billing-shell {
        background: #f4f7fb;
        border-radius: 0 0 18px 18px;
        padding: 24px;
    }

    .billing-card {
        border: 0;
        border-radius: 18px;
        box-shadow: 0 12px 28px rgba(22, 46, 58, .08);
        overflow: hidden;
        background: #fff;
    }

    .billing-header {
        background: linear-gradient(135deg, #2759A5 0%, #1699C6 100%) !important;
        padding: 24px 28px;
        border-bottom: 0 !important;
    }

    .billing-header h4 {
        font-weight: 800;
        margin-bottom: 4px;
        color: #fff !important;
    }

    .billing-header p {
        color: rgba(255,255,255,.88) !important;
        margin-bottom: 0;
    }

    .billing-layout {
        display: grid;
        grid-template-columns: 310px 1fr;
        gap: 24px;
    }

    .billing-sidebar {
        background: #fff;
        border: 1px solid #e7edf5;
        border-radius: 18px;
        padding: 22px;
        height: 100%;
    }

    .billing-sidebar-title {
        color: #7b8d9b;
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
        color: #637587;
        border-radius: 12px;
        font-weight: 700;
        margin-bottom: 8px;
        text-decoration: none;
        transition: all .2s ease;
        cursor: pointer;
    }

    .billing-nav-item:hover {
        color: #2759A5;
        background: #eef3ff;
        text-decoration: none;
    }

    .billing-nav-item.active {
        background: #2759A5;
        color: #fff;
    }

    .billing-nav-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #eef3ff;
        color: #2759A5;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 34px;
    }

    .billing-nav-item.active .billing-nav-icon {
        background: rgba(255,255,255,.16);
        color: #fff;
    }

    .billing-help {
        margin-top: 18px;
        padding: 20px;
        border-radius: 16px;
        color: #fff;
        background: linear-gradient(135deg, #2759A5 0%, #9B63D0 100%);
    }

    .billing-help h6 {
        color: #fff;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .billing-help p {
        color: rgba(255,255,255,.88);
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
        border: 1px solid #e7edf5;
        border-radius: 18px;
        padding: 28px;
    }

    .billing-main h4 {
        font-weight: 800;
        color: #172b3a;
        margin-bottom: 4px;
    }

    .billing-main .subtitle {
        color: #6f7f8f;
        margin-bottom: 26px;
    }

    .plan-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    .plan-card {
        position: relative;
        border: 1px solid #e7edf5;
        border-radius: 18px;
        padding: 24px 22px 20px;
        background: #fff;
        min-height: 380px;
        display: flex;
        flex-direction: column;
        transition: all .2s ease;
    }

    .plan-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 35px rgba(39, 89, 165, .10);
    }

    .plan-card.active {
        border: 2px solid #49B8C6;
        background: linear-gradient(180deg, #f6fbff 0%, #ffffff 55%);
    }

    .plan-card.recommended {
        border: 2px solid rgba(155, 99, 208, .50);
        background: #fff;
    }

    .plan-badge {
        position: absolute;
        top: -13px;
        left: 22px;
        background: #9B63D0;
        color: #fff;
        font-size: 11px;
        font-weight: 800;
        padding: 6px 14px;
        border-radius: 999px;
        box-shadow: 0 8px 18px rgba(155, 99, 208, .26);
    }

    .plan-name {
        font-weight: 800;
        color: #172b3a;
        margin-bottom: 8px;
        font-size: 17px;
    }

    .plan-price {
        display: flex;
        align-items: flex-start;
        gap: 3px;
        color: #0f1f2d;
        margin-bottom: 0;
    }

    .plan-price small {
        font-size: 15px;
        font-weight: 800;
        margin-top: 8px;
    }

    .plan-price strong {
        font-size: 38px;
        line-height: 1;
        font-weight: 900;
        letter-spacing: -1.5px;
    }

    .plan-period {
        color: #7d8b98;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .plan-limit {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #6f7f8f;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .plan-icons {
        display: flex;
        gap: 7px;
        margin-bottom: 24px;
        min-height: 20px;
    }

    .plan-icons i {
        color: #d6e0ea;
        font-size: 14px;
    }

    .plan-icons i.active {
        color: #2759A5;
    }

    .plan-card.active .plan-icons i.active {
        color: #49B8C6;
    }

    .plan-card.recommended .plan-icons i.active {
        color: #9B63D0;
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
        color: #405363;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .plan-features i {
        color: #2dbf7f;
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
        border: 1px solid #49B8C6;
        color: #2aa9b8;
        background: #fff;
        transition: all .2s ease;
    }

    .btn-plan:hover {
        color: #fff;
        background: #49B8C6;
        border-color: #49B8C6;
    }

    .btn-plan-active {
        background: #b9c1c8;
        border-color: #b9c1c8;
        color: #fff;
        cursor: default;
    }

    .btn-plan-active:hover {
        background: #b9c1c8;
        border-color: #b9c1c8;
        color: #fff;
    }

    .btn-plan-accent {
        background: #9B63D0;
        border-color: #9B63D0;
        color: #fff;
    }

    .btn-plan-accent:hover {
        background: #874fc4;
        border-color: #874fc4;
        color: #fff;
    }

    .section-panel {
        display: none;
    }

    .section-panel.active {
        display: block;
    }

    .payment-box,
    .invoice-box {
        border: 1px solid #e7edf5;
        border-radius: 16px;
        padding: 20px;
        background: #fff;
        margin-bottom: 16px;
    }

    .invoice-table th {
        color: #7b8d9b;
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
        background: #eef3ff;
        color: #2759A5;
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
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                       data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mi Plan y Facturación</a>
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
                        <div class="card-header billing-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="text-white f-20">Suscripciones y facturación</h4>
                                    <p>Administra tu plan, método de pago y documentos de cobro.</p>
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
                                        <h6>¿Necesitas más prestaciones?</h6>
                                        <p>Actualiza tu plan para aumentar cupos, habilitar más funciones y acceder a herramientas avanzadas.</p>
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
                                                    <span>Profesionales incluidos</span>
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
                                                    <li><i class="feather icon-check"></i><span>Agenda básica de citas</span></li>
                                                    <li><i class="feather icon-check"></i><span>Ficha clínica simple</span></li>
                                                    <li><i class="feather icon-check"></i><span>Soporte por correo</span></li>
                                                </ul>

                                                <div class="plan-actions">
                                                    <button class="btn btn-plan" onclick="solicitarCambioPlan('gratuito')">Cambiar plan</button>
                                                </div>
                                            </div>

                                            <div class="plan-card active">
                                                <div class="plan-name">Plan Básico</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>9.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Profesionales incluidos</span>
                                                    <span>1/3</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                </div>

                                                <ul class="plan-features">
                                                    <li><i class="feather icon-check"></i><span>Historial clínico digital</span></li>
                                                    <li><i class="feather icon-check"></i><span>Recetas y documentos online</span></li>
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
                                                    <strong>19.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Profesionales incluidos</span>
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
                                                    <li><i class="feather icon-check"></i><span>Ficha clínica completa</span></li>
                                                    <li><i class="feather icon-check"></i><span>Exámenes, recetas y consentimientos</span></li>
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
