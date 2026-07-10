@extends('template.profesional.template')



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
                                        <h6>¿Necesitas más funciones?</h6>
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
