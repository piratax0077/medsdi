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
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold"></h5>
                            </div>
                            <ul class="breadcrumb">
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

            <style>
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
                }
                .creditos-banner {
                    background: linear-gradient(135deg, #31bebe 0%, #1a9d9d 100%);
                    border-radius: 14px;
                    color: #fff;
                    padding: 18px 22px;
                    height: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
                .creditos-banner .creditos-icono {
                    width: 46px;
                    height: 46px;
                    min-width: 46px;
                    border-radius: 50%;
                    background-color: rgba(255, 255, 255, .2);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.3rem;
                    margin-right: 14px;
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
                    background-color: #f8f9fc;
                    border: 1px dashed #31bebe;
                    border-radius: 10px;
                    padding: 10px 14px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
                .referidos-codigo-texto {
                    font-weight: 700;
                    letter-spacing: 1px;
                    color: #1f2957;
                }
                .referidos-enlace-texto {
                    font-size: .82rem;
                    color: #5f6b7a;
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
            </style>

            <!--Título + Créditos disponibles-->
            <div class="row mb-3">
                <div class="col-sm-12 col-md-7 col-lg-8 mb-3 mb-md-0 d-flex align-items-center">
                    <div>
                        <h3 class="referidos-titulo">Programa de referidos</h3>
                        <p class="referidos-subtitulo mb-0">Invita a más profesionales y gana créditos</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-4">
                    <a href="#" class="creditos-banner text-white text-decoration-none">
                        <div class="d-flex align-items-center">
                            <div class="creditos-icono">
                                <i class="feather icon-credit-card"></i>
                            </div>
                            <div>
                                <div class="small">Tus créditos disponibles</div>
                                <h4 class="mb-0 text-white font-weight-bold">$20.000</h4>
                                <div class="small">Equivale a 200 créditos</div>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>

            <!--Banner invitación-->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="invita-banner">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-2 mb-3 mb-md-0">
                                <div class="invita-banner-avatares">
                                    <div class="invita-banner-avatar avatar-1"><i class="feather icon-user"></i></div>
                                    <div class="invita-banner-avatar avatar-2"><i class="feather icon-user"></i></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 mb-3 mb-md-0">
                                <h4 class="font-weight-bold text-dark mb-1">¡Invita colegas y obtén créditos!</h4>
                                <p class="mb-0 text-muted">
                                    Cuando un profesional se registre con tu enlace y compre un plan,
                                    <strong>te regalamos créditos</strong> que puedes usar en el sistema.
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-2 text-md-center">
                                <div class="invita-banner-regalo d-inline-flex">
                                    <i class="feather icon-gift"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Estadísticas-->
            <div class="row">
                <div class="col-6 col-md-3 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon-soft icon-purple">
                                <i class="feather icon-user-plus"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 font-weight-bold">8</h4>
                                <div class="small text-dark">Referidos registrados</div>
                                <div class="text-muted" style="font-size:.75rem;">Total de profesionales invitados</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon-soft icon-green">
                                <i class="feather icon-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 font-weight-bold">5</h4>
                                <div class="small text-dark">Clientes activos</div>
                                <div class="text-muted" style="font-size:.75rem;">Profesionales que ya compraron</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon-soft icon-purple">
                                <i class="feather icon-credit-card"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 font-weight-bold">$20.000</h4>
                                <div class="small text-dark">Créditos acumulados</div>
                                <div class="text-muted" style="font-size:.75rem;">Equivale a 200 créditos</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon-soft icon-yellow">
                                <i class="feather icon-star"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 font-weight-bold">2</h4>
                                <div class="small text-dark">Pendientes de compra</div>
                                <div class="text-muted" style="font-size:.75rem;">Aún no han comprado</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Enlace / Cómo funciona / Actividad reciente-->
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold text-dark">Tu enlace de referido</h6>
                            <div class="small text-muted">Comparte tu código o enlace único</div>
                        </div>
                        <div class="card-body">
                            <p class="text-muted small mb-1">Tu código de referido</p>
                            <div class="referidos-codigo-box mb-3">
                                <span class="referidos-codigo-texto" id="codigo_referido">DRJUAN123</span>
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="copiar_texto('codigo_referido', this);">
                                    <i class="feather icon-copy"></i> Copiar
                                </button>
                            </div>

                            <p class="text-muted small mb-1">Tu enlace personalizado</p>
                            <div class="referidos-codigo-box mb-3">
                                <span class="referidos-enlace-texto" id="enlace_referido">https://saluddigitalintegrada.cl/registro?ref=DRJUAN123</span>
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="copiar_texto('enlace_referido', this);">
                                    <i class="feather icon-copy"></i>
                                </button>
                            </div>

                            <p class="text-muted small mb-2">Comparte tu enlace</p>
                            <div class="d-flex">
                                <a href="#" class="compartir-icono" style="background-color:#25D366;" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="compartir-icono" style="background-color:#1877F2;" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="compartir-icono" style="background-color:#0A66C2;" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="compartir-icono" style="background-color:#8b93a7;" title="Correo"><i class="fas fa-envelope"></i></a>
                                <a href="#" class="compartir-icono" style="background-color:#1a49a3;" title="Compartir"><i class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 mb-3">
                    <div class="card referidos-card h-100">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold text-dark">Cómo funciona</h6>
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
                        <div class="card-header bg-white d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 font-weight-bold text-dark">Actividad reciente</h6>
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
                                    <div class="font-weight-bold text-dark">Dra. Fernanda Chile</div>
                                    <span class="badge badge-light-primary">Registrado</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-muted small">09 Jul 2026</div>
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
                            <div class="actividad-item">
                                <div class="actividad-avatar"><i class="feather icon-user"></i></div>
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold text-dark">Dra. Valentina Díaz</div>
                                    <span class="badge badge-light-success">Compró Plan Básico</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-muted small">05 Jul 2026</div>
                                    <div class="text-c-green small font-weight-bold">+ $5.000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Info importante-->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="info-bar">
                        <i class="feather icon-info"></i>
                        <span><strong>Importante:</strong> Los créditos se acreditan cuando el pago del plan es aprobado y el período de garantía (7 días) ha finalizado.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection

@section('page-script')
    <script>
        function copiar_texto(idElemento, boton) {
            var texto = document.getElementById(idElemento).innerText;
            navigator.clipboard.writeText(texto).then(function () {
                var original = boton.innerHTML;
                boton.innerHTML = '<i class="feather icon-check"></i>';
                setTimeout(function () {
                    boton.innerHTML = original;
                }, 1500);
            });
        }
    </script>
@endsection
