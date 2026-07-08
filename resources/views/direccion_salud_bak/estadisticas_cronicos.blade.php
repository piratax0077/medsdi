@extends('template.direccion_salud.template')

@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Estadísticas Medicamentos de Uso Crónico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('ministerio.home') }}">Mi Escritorio</a>
                            </li>
                            <li class="breadcrumb-item active">Estadísticas Crónicos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjetas resumen -->
        <div class="row m-b-10">
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center py-3 border-primary">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-primary mb-0" id="stat_pacientes_cronicos">—</h2>
                        <small class="text-muted">Pacientes crónicos</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center py-3 border-info">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-info mb-0" id="stat_recetas_anio">—</h2>
                        <small class="text-muted">Recetas este año</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center py-3 border-success">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-success mb-0" id="stat_med_distintos">—</h2>
                        <small class="text-muted">Medicamentos distintos</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center py-3 border-warning">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-warning mb-0" id="stat_recetas_mes">—</h2>
                        <small class="text-muted">Recetas este mes</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-b-10">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-top bg-info">
                        <h5 class="font-weight-bold">Estadísticas por Medicamento</h5>
                    </div>
                    <div class="card-body-aten-a shadow-none">

                        <!-- Filtros -->
                        <div class="row mb-3 align-items-end">
                            <div class="col-md-3 mb-2">
                                <label class="floating-label-activo-sm">Año</label>
                                <select class="form-control form-control-sm" id="cron_anio">
                                    @for($y = date('Y'); $y >= date('Y') - 4; $y--)
                                        <option value="{{ $y }}" {{ $y == date('Y') ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="floating-label-activo-sm">Mes</label>
                                <select class="form-control form-control-sm" id="cron_mes">
                                    <option value="">Todos</option>
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
                            <div class="col-md-4 mb-2">
                                <label class="floating-label-activo-sm">Buscar medicamento</label>
                                <input type="text" class="form-control form-control-sm" id="cron_buscar" placeholder="Nombre del medicamento...">
                            </div>
                            <div class="col-md-2 mb-2">
                                <button type="button" class="btn btn-info-light-c btn-sm w-100" onclick="buscar_estadisticas_cronicos();">
                                    <i class="feather icon-search"></i> Buscar
                                </button>
                            </div>
                        </div>

                        <div class="text-center py-5 text-muted">
                            <i class="feather icon-bar-chart-2" style="font-size:3rem; color:#ccc;"></i>
                            <p class="mt-3">Esta funcionalidad estará disponible próximamente.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function buscar_estadisticas_cronicos() {
        swal({ title: 'Próximamente', text: 'Esta funcionalidad estará disponible pronto.', icon: 'info', buttons: 'Aceptar' });
    }
</script>

@endsection
