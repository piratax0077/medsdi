
<div class="container">
    <h2 class="mb-4">Estadística Comparativa: Ingresos vs Gastos</h2>

    <!-- Tarjetas de resumen -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"><i class="fas fa-arrow-up"></i> Total Ingresos</div>
                <div class="card-body">
                    <h4 class="card-title text-light">${{ number_format($total_ingresos, 0, ',', '.') }}</h4>
                    <p class="card-text mb-0"><small>Período seleccionado</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header"><i class="fas fa-arrow-down"></i> Total Gastos</div>
                <div class="card-body">
                    <h4 class="card-title text-light">${{ number_format($total_gastos, 0, ',', '.') }}</h4>
                    <p class="card-text mb-0"><small>Período seleccionado</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @php
                $balance = $total_ingresos - $total_gastos;
                $balance_class = $balance >= 0 ? 'bg-light text-dark' : 'bg-warning text-dark';
                $balance_icon = $balance >= 0 ? 'fa-check-circle' : 'fa-exclamation-triangle';
            @endphp
            <div class="card text-white {{ $balance_class }} mb-3">
                <div class="card-header"><i class="fas {{ $balance_icon }}"></i> Balance</div>
                <div class="card-body">
                    <h4 class="card-title">${{ number_format(abs($balance), 0, ',', '.') }}</h4>
                    <p class="card-text mb-0"><small>{{ $balance >= 0 ? 'Superávit' : 'Déficit' }}</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico comparativo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Comparativa Ingresos vs Gastos</h5>
                </div>
                <div class="card-body">
                    <canvas id="comparativaChart"></canvas>
                    <div id="leyendaComparativa" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Datos desde Blade
    let totalIngresos = {{ $total_ingresos }};
    let totalGastos = {{ $total_gastos }};
    let balance = totalIngresos - totalGastos;

    // Colores
    let colorIngresos = '#28a745';
    let colorGastos = '#dc3545';
    let colorBalance = balance >= 0 ? '#007bff' : '#ffc107';

    // Labels y datos
    let labels = ['Ingresos', 'Gastos', 'Balance'];
    let montos = [totalIngresos, totalGastos, Math.abs(balance)];
    let colores = [colorIngresos, colorGastos, colorBalance];

    // Crear gráfico
    let ctx = document.getElementById('comparativaChart')?.getContext('2d');
    if(ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monto ($)',
                    data: montos,
                    backgroundColor: colores,
                    borderColor: colores.map(c => c),
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += '$' + new Intl.NumberFormat('es-CL').format(context.parsed.y);
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Monto ($)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + new Intl.NumberFormat('es-CL').format(value);
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Categoría',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    }

    // Generar leyenda
    let leyendaHtml = '<div class="row">';
    leyendaHtml += '<div class="col-md-12"><strong>Resumen Financiero:</strong></div>';
    leyendaHtml += '<div class="col-md-4">';
    leyendaHtml += `<div class="d-flex align-items-center mt-2">`;
    leyendaHtml += `<span style="display:inline-block;width:30px;height:30px;background:${colorIngresos};margin-right:10px;border-radius:5px;"></span>`;
    leyendaHtml += `<div><strong>Ingresos:</strong> $${new Intl.NumberFormat('es-CL').format(totalIngresos)}</div>`;
    leyendaHtml += `</div></div>`;

    leyendaHtml += '<div class="col-md-4">';
    leyendaHtml += `<div class="d-flex align-items-center mt-2">`;
    leyendaHtml += `<span style="display:inline-block;width:30px;height:30px;background:${colorGastos};margin-right:10px;border-radius:5px;"></span>`;
    leyendaHtml += `<div><strong>Gastos:</strong> $${new Intl.NumberFormat('es-CL').format(totalGastos)}</div>`;
    leyendaHtml += `</div></div>`;

    leyendaHtml += '<div class="col-md-4">';
    leyendaHtml += `<div class="d-flex align-items-center mt-2">`;
    leyendaHtml += `<span style="display:inline-block;width:30px;height:30px;background:${colorBalance};margin-right:10px;border-radius:5px;"></span>`;
    leyendaHtml += `<div><strong>Balance:</strong> $${new Intl.NumberFormat('es-CL').format(Math.abs(balance))} <em>(${balance >= 0 ? 'Superávit' : 'Déficit'})</em></div>`;
    leyendaHtml += `</div></div>`;
    leyendaHtml += '</div>';

    let leyendaDiv = document.getElementById('leyendaComparativa');
    if(leyendaDiv) leyendaDiv.innerHTML = leyendaHtml;
})();
</script>
