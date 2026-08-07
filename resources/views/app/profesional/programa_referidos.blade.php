@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content mb-3 referidos-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">

                            </div>
                            <ul class="breadcrumb  mt-n3">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Programa de referidos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="">

            <style>
                .referidos-fondo-full {
                    margin-left: -22px;
                    margin-right: -22px;
                    padding-left: 22px;
                    padding-right: 22px;
                }
                .referidos-titulo {
                    font-weight: 700;
                    color: #2b2f3a;
                    margin-bottom: 2px;
                }
                .referidos-subtitulo {
                    color: #8b93a7;
                    font-size: .95rem;
                }
                .bg-c-teal {
                    background-color: #31bebe;
                }
                .text-c-teal {
                    color: #31bebe;
                }
                .referidos-card {
                    border: none;
                    border-radius: 14px;
                    box-shadow: 0 2px 10px rgba(30, 40, 80, .06);
                    /* Recorta el header y el card-body al radio de la tarjeta,
                       si no sus fondos tapan las esquinas redondeadas */
                    overflow: hidden;
                }
                /* Solo las tarjetas de estadistica reaccionan al cursor */
                .referidos-card-stat {
                    transition: transform .15s ease, box-shadow .15s ease;
                }
                .referidos-card-stat:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 10px 24px rgba(30, 40, 80, .11);
                }
                /* Jerarquia de texto de las estadisticas */
                .stat-numero {
                    font-size: 1.5rem;
                    font-weight: 800;
                    color: #2b2f3a;
                    line-height: 1.1;
                }
                .stat-label {
                    font-size: .82rem;
                    font-weight: 700;
                    color: #4a5468;
                    line-height: 1.3;
                }
                .stat-hint {
                    font-size: .72rem;
                    color: #8b93a7;
                    line-height: 1.3;
                }
                /* Banner de creditos compacto */
                .creditos-banner {
                    background: linear-gradient(135deg, #31bebe 0%, #1a9d9d 100%);
                    border-radius: 12px;
                    color: #fff;
                    padding: 12px 16px;
                    border: none;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    box-shadow: 0 6px 16px rgba(26, 157, 157, .25);
                    transition: transform .15s ease, box-shadow .15s ease;
                }
                .creditos-banner:hover {
                    color: #fff;
                    transform: translateY(-2px);
                    box-shadow: 0 10px 22px rgba(26, 157, 157, .32);
                }
                .creditos-banner .creditos-icono {
                    width: 38px;
                    height: 38px;
                    min-width: 38px;
                    border-radius: 10px;
                    background-color: rgba(255, 255, 255, .22);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.05rem;
                    margin-right: 11px;
                }
                .creditos-label {
                    font-size: .68rem;
                    text-transform: uppercase;
                    letter-spacing: .05em;
                    opacity: .9;
                    line-height: 1.3;
                }
                .creditos-monto {
                    font-size: 1.25rem;
                    font-weight: 800;
                    line-height: 1.15;
                }
                .creditos-equiv {
                    font-size: .7rem;
                    opacity: .85;
                    line-height: 1.3;
                }
                .creditos-flecha {
                    font-size: .8rem;
                    opacity: .85;
                    margin-left: 10px;
                }
                .invita-banner {
                    background: linear-gradient(120deg, #eaf3fd 0%, #dcecfb 100%);
                    border-radius: 14px;
                    padding: 26px;
                }
                .invita-banner-avatares {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .invita-banner-avatar {
                    width: 64px;
                    height: 64px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.7rem;
                    color: #fff;
                    border: 3px solid #fff;
                    box-shadow: 0 4px 10px rgba(30, 40, 80, .12);
                }
                .invita-banner-avatar.avatar-1 {
                    background-color: #1a49a3;
                    margin-right: -14px;
                    z-index: 2;
                }
                .invita-banner-avatar.avatar-2 {
                    background-color: #31bebe;
                }
                .invita-banner-regalo {
                    width: 56px;
                    height: 56px;
                    min-width: 56px;
                    border-radius: 16px;
                    background-color: #ffba57;
                    color: #fff;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.6rem;
                }
                .stat-icon-soft {
                    width: 48px;
                    height: 48px;
                    min-width: 48px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.2rem;
                    margin-right: 12px;
                }
                .stat-icon-soft.icon-blue { background-color: rgba(26, 73, 163, .12); color: #1a49a3; }
                .stat-icon-soft.icon-green { background-color: rgba(114, 176, 44, .14); color: #72B02C; }
                .stat-icon-soft.icon-purple { background-color: rgba(160, 108, 193, .14); color: #A06CC1; }
                .stat-icon-soft.icon-yellow { background-color: rgba(255, 186, 87, .18); color: #d99a2b; }
                .referidos-codigo-box {
                    background-color: #F5F5FB;
                    border: 1px dashed #7857b4;
                    border-radius: 10px;
                    padding: 10px 14px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    flex-wrap: wrap;
                    gap: 8px;
                }
                .referidos-codigo-texto {
                    font-weight: 700;
                    letter-spacing: 1px;
                    color: #7857b4;
                    font-size: 1rem;
                }
                .referidos-enlace-texto {
                    font-size: .82rem;
                    color:#7857b4;
                    word-break: break-all;
                }
                .compartir-icono {
                    width: 38px;
                    height: 38px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #fff;
                    font-size: .95rem;
                    margin-right: 8px;
                }
                .pasos-lista {
                    list-style: none;
                    margin: 0;
                    padding: 0;
                }
                .pasos-lista li {
                    display: flex;
                    align-items: flex-start;
                    position: relative;
                    padding-bottom: 22px;
                }
                .pasos-lista li:last-child {
                    padding-bottom: 0;
                }
                .pasos-lista li:not(:last-child):before {
                    content: '';
                    position: absolute;
                    left: 15px;
                    top: 34px;
                    bottom: 0;
                    width: 2px;
                    background-color: #ececf5;
                }
                .paso-numero {
                    width: 32px;
                    height: 32px;
                    min-width: 32px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #fff;
                    font-weight: 700;
                    font-size: .9rem;
                    margin-right: 14px;
                    z-index: 1;
                }
                .actividad-item {
                    display: flex;
                    align-items: center;
                    padding: 10px 0;
                    border-bottom: 1px solid #f0f1f5;
                }
                .actividad-item:last-of-type {
                    border-bottom: none;
                }
                .actividad-avatar {
                    width: 40px;
                    height: 40px;
                    min-width: 40px;
                    border-radius: 50%;
                    background-color: rgba(26, 73, 163, .1);
                    color: #1a49a3;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 12px;
                }
                .info-bar {
                    background-color: #eaf6fb;
                    border-radius: 12px;
                    padding: 14px 18px;
                    color: #2b2f3a;
                    display: flex;
                    align-items: center;
                }
                .info-bar i {
                    color: #17a2b8;
                    margin-right: 10px;
                    font-size: 1.1rem;
                }

                .bg-referidos{
                	background-color: #F4F2FA!important;
                }

                .header-referidos {
                	background-color: #F4F2FA;
                }

                /* Separacion superior de la vista.
                   OJO: debe ser 140px en todos los tamanos porque .page-header
                   del sistema usa margin-top: -140px fijo. Si aqui se baja el
                   valor, el breadcrumb se monta sobre el logo del header. */
                .referidos-content {
                    margin-top: 140px;
                }

                /* Reduce el espacio azul entre el breadcrumb y el contenido */
                .referidos-content .page-header {
                    margin-bottom: 10px;
                }

                /* Franja gris a todo el ancho detras del titulo y los creditos.
                   Los margenes negativos compensan el padding de .pcoded-content */
                .referidos-hero {
                    background-color: #ecf0f5;
                    margin-left: -22px;
                    margin-right: -22px;
                    padding: 26px 22px 20px;
                    margin-bottom: 22px;
                }

                /* ---------- RESPONSIVE ---------- */

                /* Movil */
                @media (max-width: 767.98px) {
                    .referidos-titulo {
                        font-size: 1.3rem;
                    }
                    .referidos-subtitulo {
                        font-size: .86rem;
                    }
                    .referidos-hero {
                        padding: 20px 22px 16px;
                    }
                }

                @media (max-width: 575.98px) {
                    .referidos-hero {
                        margin-left: -16px;
                        margin-right: -16px;
                        padding: 18px 16px 14px;
                        margin-bottom: 16px;
                    }
                    /* El icono se apila sobre el texto para que no se aprieten */
                    .referidos-stat {
                        flex-direction: column;
                        align-items: flex-start !important;
                    }
                    .referidos-stat .stat-icon-soft {
                        margin-right: 0;
                        margin-bottom: 8px;
                    }
                    .stat-numero {
                        font-size: 1.3rem;
                    }
                    .stat-label {
                        font-size: .78rem;
                    }
                    .referidos-codigo-box {
                        justify-content: center;
                    }
                    .referidos-enlace-texto {
                        font-size: .78rem;
                    }
                }
            </style>

            <!--Título + Créditos disponibles-->
            <div class="referidos-hero">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 mb-3 mb-lg-0">
                        <h3 class="referidos-titulo">¡Invita colegas y obtén créditos!</h3>
                        <p class="referidos-subtitulo mb-0">Cuando un profesional se registre con tu enlace y compre un plan, te regalamos créditos que puedes usar en el sistema.</p>
                    </div>
                    <div class="col-12 col-lg-4">
                        <a href="#" class="creditos-banner text-white text-decoration-none">
                            <div class="d-flex align-items-center">
                                <div class="creditos-icono">
                                    <i class="feather icon-credit-card"></i>
                                </div>
                                <div>
                                    <div class="creditos-label">Créditos disponibles</div>
                                    <div class="creditos-monto">$20.000</div>
                                    <div class="creditos-equiv">Equivale a 200 créditos</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right creditos-flecha"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!--Estadísticas-->
            <div class="row">
                <div class="col-6 col-lg-6 col-xl-3 mb-3">
                    <div class="card referidos-card referidos-card-stat h-100">
                        <div class="card-body d-flex align-items-center referidos-stat">
                            <div class="stat-icon-soft icon-purple">
                                <i class="feather icon-user-plus"></i>
                            </div>
                            <div>
                                <div class="stat-numero">8</div>
                                <div class="stat-label">Referidos registrados</div>
                                <div class="stat-hint">Total de profesionales invitados</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-xl-3 mb-3">
                    <div class="card referidos-card referidos-card-stat h-100">
                        <div class="card-body d-flex align-items-center referidos-stat">
                            <div class="stat-icon-soft icon-green">
                                <i class="feather icon-check-circle"></i>
                            </div>
                            <div>
                                <div class="stat-numero">5</div>
                                <div class="stat-label">Clientes activos</div>
                                <div class="stat-hint">Profesionales que ya compraron</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-xl-3 mb-3">
                    <div class="card referidos-card referidos-card-stat h-100">
                        <div class="card-body d-flex align-items-center referidos-stat">
                            <div class="stat-icon-soft icon-blue">
                                <i class="feather icon-credit-card"></i>
                            </div>
                            <div>
                                <div class="stat-numero">$20.000</div>
                                <div class="stat-label">Créditos acumulados</div>
                                <div class="stat-hint">Equivale a 200 créditos</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-xl-3 mb-3">
                    <div class="card referidos-card referidos-card-stat h-100">
                        <div class="card-body d-flex align-items-center referidos-stat">
                            <div class="stat-icon-soft icon-yellow">
                                <i class="feather icon-star"></i>
                            </div>
                            <div>
                                <div class="stat-numero">2</div>
                                <div class="stat-label">Pendientes de compra</div>
                                <div class="stat-hint">Aún no han comprado</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Enlace / Cómo funciona / Actividad reciente-->
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-3">
                    <div class="card bg-referidos referidos-card h-100">
                        <div class="card-header-principal header-referidos">
                            <h6 class="mb-0 f-18 text-dark">Tu enlace de referido</h6>
                            <div class="small text-dark">Comparte tu código o enlace único</div>
                        </div>
                        <div class="card-body bg-referidos">
                            <h6 class="text-purple  mb-1">Tu código de referido</h6>
                            <div class="referidos-codigo-box mb-3">
                                <span class="referidos-codigo-texto" id="codigo_referido">DRJUAN123</span>
                                <button type="button" class="btn btn-sm btn-purple" onclick="copiar_texto('codigo_referido', this);">
                                    <i class="feather icon-copy"></i> Copiar
                                </button>
                            </div>

                            <h6 class="text-purple  mb-1">Tu enlace personalizado</h6>
                            <div class="referidos-codigo-box mb-3">
                                <span class="referidos-enlace-texto" id="enlace_referido">https://saluddigitalintegrada.cl/registro?ref=DRJUAN123</span>
                                <button type="button" class="btn btn-sm btn-purple" title="Copiar enlace" aria-label="Copiar enlace" onclick="copiar_texto('enlace_referido', this);">
                                    <i class="feather icon-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-header-principal bg-white">
                            <h6 class="mb-0 f-18 text-dark">Cómo funciona</h6>
                        </div>
                        <div class="card-body">
                            <ul class="pasos-lista">
                                <li>
                                    <div class="paso-numero bg-c-blue">1</div>
                                    <div>
                                        <div class="font-weight-bold text-dark">Invitas a un colega</div>
                                        <div class="text-muted small">Comparte tu enlace o código.</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="paso-numero bg-c-green">2</div>
                                    <div>
                                        <div class="font-weight-bold text-dark">Se registra</div>
                                        <div class="text-muted small">Tu colega crea su cuenta desde tu enlace.</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="paso-numero bg-c-yellow">3</div>
                                    <div>
                                        <div class="font-weight-bold text-dark">Compra un plan</div>
                                        <div class="text-muted small">Cuando compra, el sistema verifica el pago.</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="paso-numero bg-c-purple">4</div>
                                    <div>
                                        <div class="font-weight-bold text-dark">Ganas créditos</div>
                                        <div class="text-muted small">Te acreditamos créditos en tu cuenta automáticamente.</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-header-principal bg-white d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 f-18 text-dark">Actividad reciente</h6>
                            <a href="#" class="small text-c-blue">Ver todas</a>
                        </div>
                        <div class="card-body">
                            <div class="actividad-item">
                                <div class="actividad-avatar"><i class="feather icon-user"></i></div>
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold text-dark">Dra. María López</div>
                                    <span class="badge badge-light-primary">Registrado</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-muted small">12 Jul 2026</div>
                                </div>
                            </div>
                            <div class="actividad-item">
                                <div class="actividad-avatar"><i class="feather icon-user"></i></div>
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold text-dark">Dr. Carlos Rojas</div>
                                    <span class="badge badge-light-success">Compró Plan Pro</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-muted small">10 Jul 2026</div>
                                    <div class="text-c-green small font-weight-bold">+ $10.000</div>
                                </div>
                            </div>
                            <div class="actividad-item">
                                <div class="actividad-avatar"><i class="feather icon-user"></i></div>
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold text-dark">Dr. Diego Salinas</div>
                                    <span class="badge badge-light-warning">Pendiente</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-muted small">08 Jul 2026</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Info importante-->
            {{--<div class="row">
                <div class="col-12 mb-3">
                    <div class="info-bar">
                        <i class="feather icon-info"></i>
                        <span><strong>Importante:</strong> Los créditos se acreditan cuando el pago del plan es aprobado y el período de garantía (7 días) ha finalizado.</span>
                    </div>
                </div>
            </div>--}}

            </div>
            <!--Cierre: bg-gris-->

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection

@section('page-script')
    <script>
        function copiar_texto(idElemento, boton) {
            var elemento = document.getElementById(idElemento);

            if (!elemento) {
                return;
            }

            var texto = elemento.innerText;

            // Confirmacion visual en el boton
            function confirmar_copiado() {
                var original = boton.innerHTML;
                boton.innerHTML = '<i class="feather icon-check"></i>';
                setTimeout(function () {
                    boton.innerHTML = original;
                }, 1500);
            }

            // Respaldo para navegadores antiguos o cuando el sitio no va por https
            function copiar_respaldo() {
                var area = document.createElement('textarea');
                area.value = texto;
                area.style.position = 'fixed';
                area.style.opacity = '0';
                document.body.appendChild(area);
                area.select();

                try {
                    document.execCommand('copy');
                    confirmar_copiado();
                } catch (e) {
                    console.log('No se pudo copiar', e);
                }

                document.body.removeChild(area);
            }

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(texto).then(confirmar_copiado).catch(copiar_respaldo);
            } else {
                copiar_respaldo();
            }
        }
    </script>
@endsection
