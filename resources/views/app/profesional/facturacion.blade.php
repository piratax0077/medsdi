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

                                    <a class="billing-nav-item" data-section="complementos" href="javascript:void(0)">
                                        <span class="billing-nav-icon"><i class="feather icon-package"></i></span>
                                        <span>Complementos</span>
                                        <span class="billing-nav-badge" id="complementosBadge" style="display:none;">0</span>
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
                                        <p>Actualiza tu plan o suma complementos para aumentar cupos, habilitar más funciones y acceder a herramientas avanzadas.</p>
                                        <a href="javascript:void(0)" onclick="seleccionarSeccionFacturacion('planes')">Ver planes →</a>
                                        <a href="javascript:void(0)" onclick="seleccionarSeccionFacturacion('complementos')">Ver complementos →</a>
                                    </div>
                                </div>

                                <div class="billing-main">

                                    <div id="section_planes" class="section-panel active">
                                        <h4>Elige el plan de tu cuenta</h4>
                                        <p class="subtitle">Puedes cambiar de plan cuando quieras. El cambio se aplicará en tu próximo cobro.</p>

                                        <div class="plan-grid">
                                            <div class="plan-card">
                                                <div class="plan-name">Plan Profesional Starter</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>15.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Profesionales incluidos</span>
                                                    <span>1</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                </div>

                                                <ul class="plan-features">
                                                    <li><i class="feather icon-check"></i><span>Agendas independientes para cada consulta.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Atención presencial y telemedicina.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Ficha de atención adaptada a tu especialidad.</span></li>

                                                    <li><i class="feather icon-check"></i><span>Odontograma según especialidad.</span></li>
                                                      <li><i class="feather icon-check"></i><span>Consentimientos informados, formulario GES e interconsultas.</span></li>
                                                      <li><i class="feather icon-check"></i><span>Firma digital y validación.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Confirmación y recordatorios automáticos vía correo electrónico.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Gestión de procedimientos.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Gestión de pacientes.</span></li>
                                                    <li><i class="feather icon-check"></i><span>App Móvil para autorizaciones.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Correos automáticos de bienvenida.</span></li>
                                                </ul>

                                                <div class="plan-actions">
                                                    <button class="btn btn-plan" onclick="solicitarCambioPlan('gratuito')">Cambiar plan</button>
                                                </div>
                                            </div>

                                            <div class="plan-card active">
                                                <div class="plan-name">Plan Profesional Plus</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>29.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Profesionales incluidos</span>
                                                    <span>1</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                </div>

                                                
                                                <ul class="plan-features">
                                                    <li><i class="feather icon-check"></i><span>Agendas independientes para cada consulta.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Atención presencial y telemedicina.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Ficha de atención adaptada a tu especialidad.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Odontograma según especialidad.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Ficha de atención personalizable.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Consentimientos informados, formulario GES e interconsultas.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Firma digital y validación.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Confirmación y recordatorios automáticos vía correo electrónico.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Gestión de procedimientos y equipos de trabajo.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Registro de documentos emitidos.</span></li>
                                                     <li><i class="feather icon-check"></i><span>Flujo de caja.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Reportes y estadísticas.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Gestión de pacientes.</span></li>
                                                    <li><i class="feather icon-check"></i><span>App Móvil para autorizaciones.</span></li>
                                                     <li><i class="feather icon-check"></i><span>Mensajeria interna.</span></li>
                                                     <li><i class="feather icon-check"></i><span>Correos automáticos de bienvenida.</span></li>
                                                </ul>

                                                <div class="plan-actions">
                                                    <button class="btn btn-plan btn-plan-active" disabled>Plan activo</button>
                                                </div>
                                            </div>

                                            <div class="plan-card recommended">
                                                <div class="plan-badge">Recomendado</div>

                                                <div class="plan-name">Plan Profesional Conecta</div>
                                                <div class="plan-price">
                                                    <small>$</small>
                                                    <strong>74.990</strong>
                                                </div>
                                                <div class="plan-period">Por mes</div>

                                                <div class="plan-limit">
                                                    <span>Profesionales incluidos</span>
                                                    <span>3</span>
                                                </div>

                                                <div class="plan-icons">
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user active"></i>
                                                    <i class="feather icon-user"></i>
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                     <ul class="plan-features">
                                                 <li><i class="feather icon-check"></i><span>Agendas independientes para cada consulta.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Atención presencial y telemedicina.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Ficha de atención adaptada a tu especialidad.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Odontograma según especialidad.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Ficha de atención personalizable.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Consentimientos informados, formulario GES e interconsultas.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Firma digital y validación.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Confirmación y recordatorios automáticos vía correo electrónico.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Gestión de procedimientos y equipos de trabajo.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Registro de documentos emitidos.</span></li>
                                                     <li><i class="feather icon-check"></i><span>Flujo de caja.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Reportes y estadísticas.</span></li>
                                                    <li><i class="feather icon-check"></i><span>Gestión de pacientes.</span></li>
                                                    <li><i class="feather icon-check"></i><span>App Móvil para autorizaciones.</span></li>
                                                     <li><i class="feather icon-check"></i><span>Mensajeria interna.</span></li>
                                                      <li><i class="feather icon-check"></i><span>Correos automáticos de bienvenida.</span></li>
                                                </ul>
                                                <div class="plan-actions">
                                                    <button class="btn btn-plan btn-plan-accent" onclick="solicitarCambioPlan('plus')">Cambiar plan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="section_complementos" class="section-panel">
                                        <h4>Complementos para tu cuenta</h4>
                                        <p class="subtitle">Amplía las capacidades de tu plan con funciones opcionales.</p>

                                        <div class="filtros-complementos" id="filtrosComplementos"></div>

                                        <div class="addons-grid" id="complementosGrid"></div>
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

                                        <div class="resumen-cobro-box" id="resumenProximoCobro"></div>

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
    <!--Cierre: Container Completo-->

    <!-- Carrito flotante de complementos -->
    <div class="carrito-flotante" id="carritoFlotante">
        <div class="carrito-header">
            <span><i class="feather icon-shopping-cart"></i> Complementos seleccionados</span>
            <span id="carritoContador"></span>
        </div>
        <div class="carrito-lista" id="carritoLista"></div>
        <div class="carrito-total">
            <span>Total mensual</span>
            <span id="carritoTotal">$0</span>
        </div>
        <button class="btn btn-plan btn-block" onclick="seleccionarSeccionFacturacion('facturas')">
            Ver en facturación
        </button>
    </div>

    <style>
        :root {
            --add-primary: #4680ff;
            --add-success: #2ca87f;
            --add-danger: #ff5370;
            --add-border: #e4e9f0;
            --add-bg: #f7f9fc;
            --add-text: #2b2f3a;
            --add-muted: #7c8b9d;
        }

        .billing-nav-item {
            position: relative;
        }

        .billing-nav-badge {
            display: inline-block;
            margin-left: 8px;
            background: var(--add-primary);
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            line-height: 1;
            padding: 3px 7px;
            border-radius: 20px;
            vertical-align: middle;
        }

        .filtros-complementos {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 18px 0 22px;
        }

        .filtro-pill {
            border: 1px solid var(--add-border);
            background: #fff;
            color: var(--add-muted);
            font-size: 13px;
            font-weight: 500;
            padding: 6px 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: all .15s ease;
        }

        .filtro-pill:hover {
            border-color: var(--add-primary);
            color: var(--add-primary);
        }

        .filtro-pill.active {
            background: var(--add-primary);
            border-color: var(--add-primary);
            color: #fff;
        }

        .addons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            align-items: stretch;
        }

        .addon-card {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            background: #fff;
            border: 1px solid var(--add-border);
            border-radius: 14px;
            padding: 22px;
            transition: box-shadow .2s ease, border-color .2s ease, transform .2s ease;
        }

        .addon-card:hover {
            box-shadow: 0 8px 24px rgba(31, 45, 61, .08);
            transform: translateY(-2px);
        }

        .addon-card.active {
            border-color: var(--add-success);
        }

        .addon-active-flag {
            position: absolute;
            top: -10px;
            right: 16px;
            background: var(--add-success);
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .addon-active-flag i {
            width: 12px;
            height: 12px;
        }

        .addon-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--add-bg);
            color: var(--add-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .addon-badge-category {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: var(--add-primary);
            margin-bottom: 6px;
        }

        .addon-name {
            font-size: 15px;
            font-weight: 600;
            color: var(--add-text);
            margin-bottom: 6px;
        }

        .addon-description {
            font-size: 13px;
            color: var(--add-muted);
            line-height: 1.5;
            margin-bottom: 18px;
            min-height: 40px;
        }

        .addon-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px solid var(--add-border);
        }

        .addon-price small {
            font-size: 12px;
            color: var(--add-muted);
            vertical-align: top;
        }

        .addon-price strong {
            font-size: 18px;
            color: var(--add-text);
        }

        .addon-price span {
            font-size: 12px;
            color: var(--add-muted);
        }

        .btn-addon {
            border: 1px solid var(--add-primary);
            background: #fff;
            color: var(--add-primary);
            font-size: 13px;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 8px;
            white-space: nowrap;
            cursor: pointer;
            transition: all .15s ease;
        }

        .btn-addon:hover {
            background: var(--add-primary);
            color: #fff;
        }

        .btn-addon.added {
            border-color: var(--add-danger);
            color: var(--add-danger);
        }

        .btn-addon.added:hover {
            background: var(--add-danger);
            color: #fff;
        }

        .carrito-flotante {
            position: fixed;
            right: 24px;
            bottom: -420px;
            width: 300px;
            background: #fff;
            border: 1px solid var(--add-border);
            border-radius: 14px;
            box-shadow: 0 12px 32px rgba(31, 45, 61, .18);
            padding: 18px;
            z-index: 999;
            transition: bottom .3s ease;
        }

        .carrito-flotante.visible {
            bottom: 24px;
        }

        .carrito-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--add-text);
            margin-bottom: 10px;
        }

        .carrito-header i {
            width: 15px;
            height: 15px;
            margin-right: 4px;
        }

        #carritoContador {
            background: var(--add-bg);
            color: var(--add-muted);
            font-size: 11px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .carrito-lista {
            max-height: 160px;
            overflow-y: auto;
            margin-bottom: 12px;
        }

        .carrito-item {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 12.5px;
            color: var(--add-muted);
            padding: 6px 0;
            border-bottom: 1px dashed var(--add-border);
        }

        .carrito-total {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 700;
            color: var(--add-text);
            margin-bottom: 12px;
        }

        .resumen-cobro-box {
            background: var(--add-bg);
            border: 1px solid var(--add-border);
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 22px;
        }

        .resumen-cobro-box h6 {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .03em;
            color: var(--add-muted);
            margin-bottom: 12px;
        }

        .resumen-cobro-row {
            display: flex;
            justify-content: space-between;
            font-size: 13.5px;
            color: var(--add-text);
            padding: 6px 0;
        }

        .resumen-cobro-addon {
            color: var(--add-muted);
        }

        .resumen-cobro-addon i {
            width: 13px;
            height: 13px;
            margin-right: 4px;
        }

        .resumen-cobro-total {
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            font-weight: 700;
            color: var(--add-text);
            border-top: 1px solid var(--add-border);
            margin-top: 8px;
            padding-top: 10px;
        }

        .resumen-cobro-empty {
            font-size: 12.5px;
            color: var(--add-muted);
            margin: 10px 0 0;
        }

        .resumen-cobro-empty a {
            font-weight: 600;
        }

        @media (max-width: 576px) {
            .addons-grid {
                grid-template-columns: 1fr;
            }

            .carrito-flotante {
                left: 16px;
                right: 16px;
                width: auto;
            }
        }
    </style>
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

    /* =========================================================
       COMPLEMENTOS (add-ons)
       Todo lo de esta sección es "data-driven": para agregar un
       nuevo complemento solo hay que sumar un objeto al arreglo
       `complementos`. El grid, los filtros, el carrito y el
       resumen de facturación se generan solos.
       ========================================================= */

    // Plan actualmente contratado (para el resumen de facturación).
    // TODO backend: reemplazar por los datos reales del plan del usuario.
    const precioPlanActual = 29990;
    const nombrePlanActual = 'Plan Profesional Plus';

    // Complementos ya contratados por el usuario.
    // TODO backend: precargar desde el servidor, ej:
    // let complementosActivos = new Set(@json($complementosContratados ?? []));
    let complementosActivos = new Set();

    const complementos = [
        { id: 'sms', nombre: 'Recordatorios por SMS', descripcion: 'Envía recordatorios de hora automáticos vía mensaje de texto.', precio: 4990, categoria: 'Comunicación', icono: 'message-circle' },
        { id: 'whatsapp-500', nombre: 'Recordatorios y confirmaciones por WhatsApp', descripcion: 'Confirma y recuerda horas a tus pacientes por WhatsApp. 500 mensajes por mes.', precio: 6990, categoria: 'Comunicación', icono: 'smartphone' },
        { id: 'whatsapp-1000', nombre: 'Recordatorios y confirmaciones por WhatsApp', descripcion: 'Confirma y recuerda horas a tus pacientes por WhatsApp. 1.000 mensajes por mes.', precio: 14990, categoria: 'Comunicación', icono: 'smartphone' },
        { id: 'firma-avanzada', nombre: 'Firma digital avanzada', descripcion: 'Firma electrónica avanzada  con validez legal reforzada.', precio: 7990, categoria: 'Documentos', icono: 'edit-3' },
        { id: 'talonario-recetas', nombre: 'Talonario de Recetas Personalizado', descripcion: 'Diseña y personaliza tu talonario de recetas con tu identidad profesional, listo para imprimir en cualquier momento.', precio: 3990, categoria: 'Documentos', icono: 'edit-3' },
        { id: 'reportes-avanzados', nombre: 'Reportes y estadísticas', descripcion: 'Visualiza indicadores, reportes y estadísticas de tu actividad profesional.', precio: 4990, categoria: 'Analítica', icono: 'bar-chart-2' },
        { id: 'usuarios-adicionales', nombre: 'Asistente', descripcion: 'Incorpora asistentes con acceso seguro y permisos personalizados según sus funciones.', precio: 11990, categoria: 'Gestión', icono: 'users' },
        { id: 'profesionales-adicionales', nombre: 'Profesional adicional', descripcion: 'Añade profesionales con acceso independiente.', precio: 11990, categoria: 'Gestión', icono: 'users' },
        { id: 'google-calendar', nombre: 'Integración Google Calendar', descripcion: 'Sincroniza tu agenda MEDSDI con Google Calendar automáticamente.', precio: 3990, categoria: 'Gestión', icono: 'calendar' },
             { id: 'web-corporativa', nombre: 'Web Corporativa', descripcion: 'Crea un sitio web profesional para tu centro médico con información institucional y reserva de horas online integrada.', precio: 9990, categoria: 'Gestión', icono: 'calendar' },
        { id: 'web-profesional', nombre: 'Web Profesional', descripcion: 'Impulsa tu presencia digital con una página web que permita a tus pacientes reservar horas online en todos tus lugares de atención integrados en MEDSDI.', precio: 9990, categoria: 'Gestión', icono: 'calendar' },
    ];

    function formatCLP(numero) {
        return numero.toLocaleString('es-CL');
    }

    function crearTarjetaComplemento(item) {
        const activo = complementosActivos.has(item.id);
        return `
            <div class="addon-card${activo ? ' active' : ''}" data-categoria="${item.categoria}">
                ${activo ? '<div class="addon-active-flag"><i class="feather icon-check-circle"></i> Contratado</div>' : ''}
                <div>
                    <div class="addon-card-icon"><i class="feather icon-${item.icono}"></i></div>
                    <div class="addon-badge-category">${item.categoria}</div>
                    <div class="addon-name">${item.nombre}</div>
                    <p class="addon-description">${item.descripcion}</p>
                </div>
                <div class="addon-card-footer">
                    <div class="addon-price"><small>$</small><strong>${formatCLP(item.precio)}</strong><span>&nbsp;/mes</span></div>
                    <button class="btn-addon${activo ? ' added' : ''}" onclick="toggleComplemento('${item.id}')">
                        ${activo ? '<i class="feather icon-x"></i> Quitar' : '<i class="feather icon-plus"></i> Añadir'}
                    </button>
                </div>
            </div>
        `;
    }

    function renderComplementos(filtro) {
        filtro = filtro || 'Todos';
        const grid = document.getElementById('complementosGrid');
        const items = filtro === 'Todos' ? complementos : complementos.filter(c => c.categoria === filtro);
        grid.innerHTML = items.map(crearTarjetaComplemento).join('');
        if (window.feather) { feather.replace(); }
    }

    function renderFiltrosComplementos() {
        const categorias = ['Todos', ...new Set(complementos.map(c => c.categoria))];
        const cont = document.getElementById('filtrosComplementos');
        cont.innerHTML = categorias.map((cat, i) => `
            <button class="filtro-pill${i === 0 ? ' active' : ''}" onclick="filtrarComplementos('${cat}', this)">${cat}</button>
        `).join('');
    }

    function filtrarComplementos(categoria, el) {
        document.querySelectorAll('.filtro-pill').forEach(p => p.classList.remove('active'));
        el.classList.add('active');
        renderComplementos(categoria);
    }

    function toggleComplemento(id) {
        const item = complementos.find(c => c.id === id);
        if (!item) return;

        const seAgrego = !complementosActivos.has(id);
        if (seAgrego) {
            complementosActivos.add(id);
        } else {
            complementosActivos.delete(id);
        }

        // TODO backend: persistir el cambio, ej:
        // $.post('/profesional/complementos/toggle', { id: id, activo: seAgrego });

        const filtroActivo = document.querySelector('.filtro-pill.active');
        renderComplementos(filtroActivo ? filtroActivo.textContent.trim() : 'Todos');
        actualizarBadgeComplementos();
        actualizarCarrito();
        actualizarResumenFacturacion();

        swal({
            title: seAgrego ? "Complemento añadido" : "Complemento eliminado",
            text: seAgrego
                ? item.nombre + " se sumará a tu próxima facturación, junto a tu plan actual."
                : item.nombre + " ya no se incluirá en tu próxima facturación.",
            icon: "success",
            buttons: "Aceptar",
        });
    }

    function actualizarBadgeComplementos() {
        const badge = document.getElementById('complementosBadge');
        if (complementosActivos.size > 0) {
            badge.style.display = 'inline-block';
            badge.textContent = complementosActivos.size;
        } else {
            badge.style.display = 'none';
        }
    }

    function actualizarCarrito() {
        const cont = document.getElementById('carritoFlotante');
        const lista = document.getElementById('carritoLista');
        const totalEl = document.getElementById('carritoTotal');
        const contadorEl = document.getElementById('carritoContador');

        if (complementosActivos.size === 0) {
            cont.classList.remove('visible');
            return;
        }

        const seleccionados = complementos.filter(c => complementosActivos.has(c.id));
        const total = seleccionados.reduce((suma, c) => suma + c.precio, 0);

        lista.innerHTML = seleccionados.map(c => `
            <div class="carrito-item">
                <span>${c.nombre}</span>
                <span>$${formatCLP(c.precio)}</span>
            </div>
        `).join('');

        contadorEl.textContent = seleccionados.length + (seleccionados.length === 1 ? ' complemento' : ' complementos');
        totalEl.textContent = '$' + formatCLP(total);
        cont.classList.add('visible');
    }

    function actualizarResumenFacturacion() {
        const cont = document.getElementById('resumenProximoCobro');
        if (!cont) return;

        const seleccionados = complementos.filter(c => complementosActivos.has(c.id));
        const totalComplementos = seleccionados.reduce((suma, c) => suma + c.precio, 0);
        const totalGeneral = precioPlanActual + totalComplementos;

        let filas = `
            <div class="resumen-cobro-row">
                <span>${nombrePlanActual}</span>
                <span>$${formatCLP(precioPlanActual)}</span>
            </div>
        `;

        if (seleccionados.length > 0) {
            filas += seleccionados.map(c => `
                <div class="resumen-cobro-row resumen-cobro-addon">
                    <span><i class="feather icon-plus-circle"></i>${c.nombre}</span>
                    <span>$${formatCLP(c.precio)}</span>
                </div>
            `).join('');
        }

        cont.innerHTML = `
            <h6>Próximo cobro estimado</h6>
            ${filas}
            <div class="resumen-cobro-total">
                <span>Total mensual</span>
                <span>$${formatCLP(totalGeneral)}</span>
            </div>
            ${seleccionados.length === 0
                ? '<p class="resumen-cobro-empty">Aún no tienes complementos contratados. <a href="javascript:void(0)" onclick="seleccionarSeccionFacturacion(\'complementos\')">Explorar complementos</a></p>'
                : ''}
        `;
        if (window.feather) { feather.replace(); }
    }

    $(function () {
        renderFiltrosComplementos();
        renderComplementos();
        actualizarBadgeComplementos();
        actualizarCarrito();
        actualizarResumenFacturacion();
    });
</script>
@endsection