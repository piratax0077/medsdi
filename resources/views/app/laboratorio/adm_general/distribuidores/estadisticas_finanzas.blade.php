@extends('template.laboratorio.laboratorio_profesional.template')

@section('title', 'Estadísticas Financieras')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Compras</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    @if($institucion->id_tipo_institucion == 3)
                                    <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('adm_cm.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                    @endif
                                </li>
                                @php
                                $titulo = 'Distribución - ';
                                $ruta = route('laboratorio.distribucion_mayor');
                                @endphp
                                <li class="breadcrumb-item"><a href="{{ $ruta }}">{{ $titulo }} {{ $institucion->nombre }}</a></li>
                                <li class="breadcrumb-item"><a href="compras.php">Compras</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-chart-line"></i> Estadísticas Financieras
                                </h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">
                                    Visualiza y analiza el desempeño financiero de tu negocio de distribución.
                                </p>

                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Ingresos Totales</h6>
                                                <p class="display-5 text-success">$--</p>
                                                <p class="text-muted small">Este período</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Gastos Totales</h6>
                                                <p class="display-5 text-danger">$--</p>
                                                <p class="text-muted small">Este período</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Ganancia Neta</h6>
                                                <p class="display-5 text-info">$--</p>
                                                <p class="text-muted small">Este período</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Margen de Ganancia</h6>
                                                <p class="display-5 text-warning">--%</p>
                                                <p class="text-muted small">Este período</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Ventas por Mes</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="chartVentasMes"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Distribución de Gastos</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="chartGastos"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <h5>Resumen Detallado</h5>
                                        <table class="table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Concepto</th>
                                                    <th>Cantidad de Transacciones</th>
                                                    <th>Monto Total</th>
                                                    <th>Promedio por Transacción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">
                                                        No hay datos disponibles aún.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Scripts para estadísticas financieras
        document.addEventListener('DOMContentLoaded', function() {
            // Aquí irán los scripts para cargar y mostrar gráficos
            console.log('Estadísticas Financieras cargadas');

            // Ejemplo de gráfico (comentado)
            // const chartVentasCtx = document.getElementById('chartVentasMes').getContext('2d');
            // new Chart(chartVentasCtx, { ... });
        });
    </script>
@endpush
