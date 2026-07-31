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
                                <li class="breadcrumb-item"><a href="#">Estadísticas y reportes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-md-center justify-content-between">
                                <div class="mb-3 mb-md-0">
                                    <h3 class="reportes-titulo">Estadísticas y Reportes</h3>
                                    <p class="reportes-subtitulo mb-0">Resumen general de la actividad médica y clínica</p>
                                </div>
                                <div class="d-flex flex-wrap filtros-reportes">
                                    <div class="filtro-item filtro-item-icon">
                                        <i class="feather icon-calendar filtro-icon"></i>
                                        <select class="form-control select-filtro-reportes" id="filtro_mes_reportes">
                                            <option value="actual" selected>Mes actual</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="filtro-item filtro-item-icon">
                                        <i class="feather icon-map-pin filtro-icon"></i>
                                        <select class="form-control select-filtro-reportes" id="filtro_lugar_reportes">
                                            <option value="todos" selected>Todos los lugares</option>
                                            <option value="1">Consulta particular</option>
                                            <option value="2">Clínica central</option>
                                            <option value="3">Teleconsulta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--CARDS PRINCIPALES-->
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-3 mb-4">
                    <div class="card kpi-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="kpi-icon bg-c-blue text-white mr-3">
                                <i class="feather icon-users"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Total de pacientes</p>
                                <h3 class="mb-1">2.453</h3>
                                <span class="small text-c-blue"><span class="kpi-dot bg-c-blue"></span>Total activo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 mb-4">
                    <div class="card kpi-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="kpi-icon bg-c-teal text-white mr-3">
                                <i class="feather icon-activity"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Atenciones realizadas</p>
                                <h3 class="mb-1">1.842</h3>
                                <span class="small text-c-teal"><span class="kpi-dot bg-c-teal"></span><span class="mes-caption-text">Este mes</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 mb-4">
                    <div class="card kpi-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="kpi-icon bg-c-green text-white mr-3">
                                <i class="feather icon-credit-card"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Ingreso total</p>
                                <h3 class="mb-1">$9.250.000</h3>
                                <span class="small text-c-green"><span class="kpi-dot bg-c-green"></span><span class="mes-caption-text">Este mes</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 mb-4">
                    <div class="card kpi-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="kpi-icon bg-c-yellow text-white mr-3">
                                <i class="feather icon-file-text"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Documentos emitidos</p>
                                <h3 class="mb-1">3.256</h3>
                                <span class="small text-c-yellow"><span class="kpi-dot bg-c-yellow"></span><span class="mes-caption-text">Este mes</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--AGENDA: ASISTENCIA VS AUSENTISMO / ATENCIONES POR MES-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                    <div class="card reportes-card h-100">
                        <div class="card-header-principal py-3 d-flex align-items-center justify-content-between">
                             <h6 class="mb-0 f-18 text-dark">Agenda: Asistencia vs Ausentismo</h6>
                            <i class="feather icon-info text-muted" data-toggle="tooltip" data-placement="top"
                                title="Resumen de asistencia de las horas agendadas en el período seleccionado."></i>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <div id="grafico_asistencia_ausentismo"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="kpi-dot bg-c-blue"></span>
                                        <span class="flex-grow-1">Asistieron</span>
                                        <span class="font-weight-bolder mr-2">190</span>
                                        <span class="text-muted small">(86,3%)</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="kpi-dot bg-c-red"></span>
                                        <span class="flex-grow-1">No asistieron</span>
                                        <span class="font-weight-bolder mr-2">20</span>
                                        <span class="text-muted small">(9,1%)</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="kpi-dot bg-c-yellow"></span>
                                        <span class="flex-grow-1">Canceladas por paciente</span>
                                        <span class="font-weight-bolder mr-2">6</span>
                                        <span class="text-muted small">(2,7%)</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="kpi-dot bg-c-green"></span>
                                        <span class="flex-grow-1">Canceladas por el lugar de atención</span>
                                        <span class="font-weight-bolder mr-2">4</span>
                                        <span class="text-muted small">(1,8%)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="stat-mini-card">
                                        <p class="text-muted mb-1 small">Tasa de asistencia</p>
                                        <h3 class="text-c-green">86,3%</h3>
                                        <span class="small text-c-green"><i class="feather icon-arrow-up"></i> 5,4% vs mes anterior</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-mini-card">
                                        <p class="text-muted mb-1 small">Tasa de ausentismo</p>
                                        <h3 class="text-c-red">9,1%</h3>
                                        <span class="small text-c-red"><i class="feather icon-arrow-down"></i> 2,3% vs mes anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                    <div class="card reportes-card h-100">
                        <div class="card-header-principal d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 f-18 text-dark">Atenciones por mes</h6>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownRangoAtenciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Últimos 6 meses
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownRangoAtenciones">
                                    <a class="dropdown-item" href="#">Últimos 6 meses</a>
                                    <a class="dropdown-item" href="#">Últimos 12 meses</a>
                                    <a class="dropdown-item" href="#">Este año</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="grafico_atenciones_mes"></div>
                            <div class=" d-flex align-items-center mt-2">
                                <div class="kpi-icon bg-c-green text-white mr-3" style="width:38px;height:38px;min-width:38px;border-radius:10px;font-size:1rem;">
                                    <i class="feather icon-trending-up"></i>
                                </div>
                                <div>
                                    <span class="text-c-green font-weight-bolder">14%</span> más que el mes anterior
                                    <div class="text-muted small">Julio 2025 vs Junio 2025</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--DOCUMENTOS EMITIDOS / PACIENTES SEGÚN PREVISIÓN-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                    <div class="card reportes-card h-100">
                        <div class="card-header-principal py-3">
                            <h6 class="mb-0 f-18 text-dark">Documentos emitidos</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex text-muted small mb-2">
                                <span class="flex-grow-1">Documento</span>
                                <span>Cantidad</span>
                            </div>
                            <div class="doc-list-item">
                                <div class="d-flex align-items-center">
                                    <span class="doc-icon bg-c-blue text-white"><i class="feather icon-file-text"></i></span>
                                    Recetas
                                </div>
                                <span class="font-weight-bolder">1.584</span>
                            </div>
                            <div class="doc-list-item">
                                <div class="d-flex align-items-center">
                                    <span class="doc-icon bg-c-yellow text-white"><i class="feather icon-award"></i></span>
                                    Certificados
                                </div>
                                <span class="font-weight-bolder">421</span>
                            </div>
                            <div class="doc-list-item">
                                <div class="d-flex align-items-center">
                                    <span class="doc-icon bg-c-purple text-white"><i class="feather icon-clipboard"></i></span>
                                    Licencias médicas
                                </div>
                                <span class="font-weight-bolder">198</span>
                            </div>
                            <div class="doc-list-item">
                                <div class="d-flex align-items-center">
                                    <span class="doc-icon bg-c-red text-white"><i class="feather icon-file"></i></span>
                                    Órdenes de examen
                                </div>
                                <span class="font-weight-bolder">272</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                    <div class="card reportes-card h-100">
                        <div class="card-header-principal py-3">
                            <h6 class="mb-0 f-18 text-dark">Pacientes según previsión</h6>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <div id="grafico_prevision"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="kpi-dot bg-c-blue"></span>
                                        <span class="flex-grow-1">Fonasa</span>
                                        <span class="font-weight-bolder mr-2">1.245</span>
                                        <span class="text-muted small">(50,8%)</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="kpi-dot bg-c-teal"></span>
                                        <span class="flex-grow-1">Isapre</span>
                                        <span class="font-weight-bolder mr-2">743</span>
                                        <span class="text-muted small">(30,3%)</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="kpi-dot bg-c-purple"></span>
                                        <span class="flex-grow-1">Particular</span>
                                        <span class="font-weight-bolder mr-2">328</span>
                                        <span class="text-muted small">(13,4%)</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="kpi-dot bg-c-yellow"></span>
                                        <span class="flex-grow-1">Convenio Empresa</span>
                                        <span class="font-weight-bolder mr-2">95</span>
                                        <span class="text-muted small">(3,9%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection

@section('page-script')
    <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            // Filtro de mes: actualiza en vivo el texto "Este mes" de las cards KPI
            var nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

            $('#filtro_mes_reportes').on('change', function () {
                var valor = $(this).val();
                var texto = (valor === 'actual') ? 'Este mes' : nombresMeses[parseInt(valor, 10) - 1];
                $('.mes-caption-text').text(texto);
            });

            // Donut: Asistencia vs Ausentismo
            new ApexCharts(document.querySelector('#grafico_asistencia_ausentismo'), {
                chart: { type: 'donut', height: 230 },
                series: [190, 20, 6, 4],
                labels: ['Asistieron', 'No asistieron', 'Canceladas por paciente', 'Canceladas por clínica'],
                colors: ['#1a49a3', '#ff5252', '#ffba57', '#72B02C'],
                legend: { show: false },
                dataLabels: { enabled: false },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total agendadas',
                                    fontSize: '13px',
                                    color: '#8b93a7',
                                    formatter: function () {
                                        return '220';
                                    }
                                },
                                value: {
                                    fontSize: '22px',
                                    fontWeight: 700,
                                    color: '#2b2f3a'
                                }
                            }
                        }
                    }
                },
                tooltip: { y: { formatter: function (val) { return val + ' horas'; } } }
            }).render();

            // Barras: Atenciones por mes
            new ApexCharts(document.querySelector('#grafico_atenciones_mes'), {
                chart: { type: 'bar', height: 260, toolbar: { show: false } },
                series: [{ name: 'Atenciones', data: [1210, 1354, 1487, 1620, 1615, 1842] }],
                xaxis: { categories: ['Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'] },
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        borderRadius: 6,
                        distributed: true,
                        dataLabels: { position: 'top' }
                    }
                },
                colors: ['#c9d9f5', '#c9d9f5', '#c9d9f5', '#c9d9f5', '#c9d9f5', '#1a49a3'],
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: { fontSize: '12px', colors: ['#5b6577'] }
                },
                legend: { show: false },
                grid: { borderColor: '#f0f1f5' },
                yaxis: { max: 2500 }
            }).render();

            // Donut: Pacientes según previsión
            new ApexCharts(document.querySelector('#grafico_prevision'), {
                chart: { type: 'donut', height: 230 },
                series: [1245, 743, 328, 95],
                labels: ['Fonasa', 'Isapre', 'Particular', 'Convenio Empresa'],
                colors: ['#1a49a3', '#17a2b8', '#A06CC1', '#ffba57'],
                legend: { show: false },
                dataLabels: { enabled: false },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total',
                                    fontSize: '13px',
                                    color: '#8b93a7',
                                    formatter: function () {
                                        return '2.453';
                                    }
                                },
                                value: {
                                    fontSize: '22px',
                                    fontWeight: 700,
                                    color: '#2b2f3a'
                                }
                            }
                        }
                    }
                }
            }).render();

        });
    </script>
@endsection
