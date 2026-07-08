@extends('template.direccion_salud.template')

@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">

        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title"></div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Control Salud Pública</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->

        <!-- KPIs resumen -->
        <div class="row mb-3">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-c-blue text-white shadow-sm">
                    <div class="card-body py-3 text-center">
                        <i class="feather icon-activity" style="font-size:2rem;"></i>
                        <h2 class="font-weight-bold mt-1 mb-0" id="kpi_eno">{{ $total_eno }}</h2>
                        <p class="mb-0 small">ENO declaradas {{ $anio }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-c-green text-white shadow-sm">
                    <div class="card-body py-3 text-center">
                        <img src="{{ asset('images/iconos/vacunatorio.svg') }}" style="width:2rem; filter:brightness(0) invert(1);">
                        <h2 class="font-weight-bold mt-1 mb-0" id="kpi_vacunados">{{ $total_vacunados }}</h2>
                        <p class="mb-0 small">Vacunaciones {{ $anio }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm" style="background:#8e44ad">
                    <div class="card-body py-3 text-center text-white">
                        <i class="feather icon-users" style="font-size:2rem;"></i>
                        <h2 class="font-weight-bold mt-1 mb-0">—</h2>
                        <p class="mb-0 small">Programas activos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm" style="background:#e67e22">
                    <div class="card-body py-3 text-center text-white">
                        <i class="feather icon-bar-chart-2" style="font-size:2rem;"></i>
                        <h2 class="font-weight-bold mt-1 mb-0">—</h2>
                        <p class="mb-0 small">Alertas epidemiológicas</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtro por año / mes para actualizar KPIs -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body py-2">
                        <div class="form-row align-items-end">
                            <div class="col-md-2">
                                <label class="floating-label-activo-sm mb-1">Año</label>
                                <select id="filtro_anio" class="form-control form-control-sm" onchange="actualizarKpis()">
                                    @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                                        <option value="{{ $y }}" {{ $y == $anio ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="floating-label-activo-sm mb-1">Mes (opcional)</label>
                                <select id="filtro_mes" class="form-control form-control-sm" onchange="actualizarKpis()">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sub-módulos de Salud Pública -->
        <div class="row mb-2">
            <div class="col-md-12">
                <h6 class="font-weight-bold text-dark mb-3">
                    <i class="feather icon-grid mr-1"></i> Módulos de Control
                </h6>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">

            <!-- Enfermedades de Notificación Obligatoria -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="{{ route('ministerio.enfer_noti_obliga') }}">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/eno.png') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">ENO</h6>
                            <p class="text-muted small mb-0">Enfermedades notificación obligatoria</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Vacunatorio -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="#" onclick="swal('Próximamente','Módulo de vacunatorio en desarrollo.','info');return false;">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/vacunatorio.svg') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">Vacunatorio</h6>
                            <p class="text-muted small mb-0">Registro y control de vacunaciones</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Programas preventivos -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="#" onclick="swal('Próximamente','Módulo de programas preventivos en desarrollo.','info');return false;">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/cronicos.svg') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">Programas Preventivos</h6>
                            <p class="text-muted small mb-0">Salud materno-infantil, EMPA, etc.</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Vigilancia epidemiológica -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="#" onclick="swal('Próximamente','Módulo de vigilancia epidemiológica en desarrollo.','info');return false;">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/estadisticas.svg') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">Vigilancia Epidemiológica</h6>
                            <p class="text-muted small mb-0">Monitoreo y alertas por brotes</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Pacientes crónicos -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="{{ route('ministerio.control_cronicos') }}">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/p-cronico.png') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">Crónicos</h6>
                            <p class="text-muted small mb-0">Control pacientes crónicos</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- GES -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="{{ route('ministerio.ges') }}">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/ges.png') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">GES</h6>
                            <p class="text-muted small mb-0">Garantías Explícitas de Salud</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Insumos vacunatorio -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="#" onclick="swal('Próximamente','Módulo de insumos y cadena de frío en desarrollo.','info');return false;">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/insumos_vacunatorio.svg') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">Insumos Vacunatorio</h6>
                            <p class="text-muted small mb-0">Stock y cadena de frío</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Estadísticas salud pública -->
            <div class="col mb-3">
                <div class="card subir h-100">
                    <a href="#" onclick="swal('Próximamente','Módulo de estadísticas de salud pública en desarrollo.','info');return false;">
                        <div class="card-body text-center px-2 py-3" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/estadisticas_2.svg') }}">
                            <h6 class="mt-2 mb-0 font-weight-bold">Estadísticas</h6>
                            <p class="text-muted small mb-0">Indicadores e informes de SP</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- Fin sub-módulos -->

    </div>
</div>

@endsection

@section('page-scripts')
<script>
function actualizarKpis() {
    var anio = $('#filtro_anio').val();
    var mes  = $('#filtro_mes').val();

    $.ajax({
        url: '{{ route("ministerio.salud_publica.indicadores") }}',
        method: 'GET',
        data: { anio: anio, mes: mes },
        success: function(resp) {
            $('#kpi_eno').text(resp.total_eno);
            $('#kpi_vacunados').text(resp.total_vacunados);
        }
    });
}
</script>
@endsection
