@extends('template.profesional.template')

@section('page-styles')
<style>
    :root {
        --medsdi-primary: #2f80ed;
        --medsdi-primary-dark: #2468c4;
        --medsdi-primary-soft: #eaf4ff;
        --medsdi-secondary: #6c63ff;
        --medsdi-success: #27ae60;
        --medsdi-danger: #eb5757;
        --medsdi-warning: #f2c94c;
        --medsdi-bg: #f7f9fc;
        --medsdi-border: #e4eaf1;
        --medsdi-text: #25324b;
        --medsdi-muted: #7a8699;
    }

    p {
        color: #59636d;
        word-wrap: break-word !important;
        font-size: 14px;
    }

    .pcoded-content {
        background: var(--medsdi-bg);
    }

    .medsdi-hero {
        border-radius: 18px;
        background: linear-gradient(135deg, #2f80ed 0%, #5b6cff 100%);
        color: #fff;
        padding: 24px 26px;
        box-shadow: 0 10px 28px rgba(47, 128, 237, .18);
        margin-bottom: 22px;
    }

    .medsdi-hero h4 {
        color: #fff;
        margin-bottom: 6px;
        font-weight: 700;
    }

    .medsdi-hero p {
        color: rgba(255,255,255,.88);
        margin-bottom: 0;
        font-size: 14px;
    }

    .medsdi-card {
        border: 1px solid var(--medsdi-border);
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(31, 45, 61, .06);
        overflow: hidden;
        background: #fff;
    }

    .medsdi-card .card-header {
        background: #fff !important;
        border-bottom: 1px solid var(--medsdi-border);
        padding: 16px 18px;
    }

    .medsdi-card-title {
        margin: 0;
        color: var(--medsdi-text);
        font-weight: 700;
        font-size: 16px;
    }

    .medsdi-card-title i {
        color: var(--medsdi-primary);
        margin-right: 8px;
    }

    .medsdi-card .card-body {
        padding: 18px;
    }

    .medsdi-uco-value {
        font-size: 26px;
        font-weight: 700;
        color: var(--medsdi-primary);
    }

    .medsdi-help {
        color: var(--medsdi-muted);
        font-size: 12px;
    }

    .medsdi-btn-primary {
        background: var(--medsdi-primary);
        border-color: var(--medsdi-primary);
        color: #fff;
        border-radius: 10px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(47, 128, 237, .18);
    }

    .medsdi-btn-primary:hover,
    .medsdi-btn-primary:focus {
        background: var(--medsdi-primary-dark);
        border-color: var(--medsdi-primary-dark);
        color: #fff;
    }

    .medsdi-btn-soft {
        background: var(--medsdi-primary-soft);
        color: var(--medsdi-primary);
        border: 1px solid #cfe5ff;
        border-radius: 9px;
        font-weight: 600;
    }

    .medsdi-btn-soft:hover {
        background: #dceeff;
        color: var(--medsdi-primary-dark);
    }

    .medsdi-form-label {
        color: var(--medsdi-text);
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .medsdi-card .form-control {
        border: 1px solid #dfe6ee;
        border-radius: 10px;
        min-height: 38px;
        box-shadow: none;
    }

    .medsdi-card .form-control:focus {
        border-color: var(--medsdi-primary);
        box-shadow: 0 0 0 3px rgba(47, 128, 237, .10);
    }

    .medsdi-table-card .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .medsdi-table-wrap {
        overflow-x: auto;
    }

    #table_procedimientos_propios_dental {
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    #table_procedimientos_propios_dental thead th {
        border: 0 !important;
        color: #6b778c;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .35px;
        background: #f8fafc;
        padding: 12px 14px;
    }

    #table_procedimientos_propios_dental tbody tr {
        background: #fff;
        box-shadow: 0 2px 10px rgba(31, 45, 61, .05);
    }

    #table_procedimientos_propios_dental tbody td {
        border-top: 1px solid #edf1f5 !important;
        border-bottom: 1px solid #edf1f5 !important;
        vertical-align: middle;
        padding: 13px 14px;
    }

    #table_procedimientos_propios_dental tbody td:first-child {
        border-left: 1px solid #edf1f5 !important;
        border-radius: 10px 0 0 10px;
        font-weight: 600;
        color: var(--medsdi-text);
    }

    #table_procedimientos_propios_dental tbody td:last-child {
        border-right: 1px solid #edf1f5 !important;
        border-radius: 0 10px 10px 0;
    }

    .medsdi-badge-value {
        display: inline-flex;
        align-items: center;
        background: #eef8f2;
        color: var(--medsdi-success);
        border-radius: 999px;
        padding: 5px 10px;
        font-weight: 700;
        font-size: 12px;
    }

    .medsdi-action-btn {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 4px;
        border: 0;
    }

    .medsdi-action-edit {
        background: #fff5df;
        color: #b7791f;
    }

    .medsdi-action-delete {
        background: #fff0f0;
        color: var(--medsdi-danger);
    }

    .medsdi-modal .modal-content {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 18px 50px rgba(31,45,61,.18);
    }

    .medsdi-modal .modal-header {
        background: linear-gradient(135deg, #2f80ed 0%, #5b6cff 100%);
        color: #fff;
        border-bottom: 0;
        padding: 18px 22px;
    }

    .medsdi-modal .modal-title {
        color: #fff;
        font-weight: 700;
    }

    .medsdi-modal .modal-body {
        padding: 22px;
        background: #fbfcfe;
    }

    .ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid var(--medsdi-border);
        border-radius: 10px;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(31,45,61,.12);
    }

    .arancel-quick-card {
        border: 1px solid #dfe8f4;
        border-radius: 14px;
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        padding: 14px;
        margin-bottom: 14px;
    }
    .arancel-catalogo-wrap{max-height:470px;overflow:auto;border:1px solid #e3eaf3;border-radius:10px;background:#fff}
    #tabla_catalogo_aranceles{min-width:620px}
    #tabla_catalogo_aranceles thead th{position:sticky;top:0;z-index:2;background:#eef3f9;color:#526174;font-size:11px;text-transform:uppercase;vertical-align:middle}
    #tabla_catalogo_aranceles td{vertical-align:middle;font-size:12px}
    #tabla_catalogo_aranceles th:first-child,#tabla_catalogo_aranceles td:first-child{width:58px;text-align:center}
    #tabla_catalogo_aranceles .catalogo-arancel-bloques{width:72px}
    #tabla_catalogo_aranceles .catalogo-arancel-uco{width:84px}

    .arancel-step {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 12px;
        color: var(--medsdi-text);
        font-weight: 700;
        font-size: 13px;
    }

    .arancel-step-number {
        width: 25px;
        height: 25px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--medsdi-primary-soft);
        color: var(--medsdi-primary);
        font-size: 12px;
        flex: 0 0 25px;
    }

    .arancel-preview {
        border-radius: 12px;
        background: #eef8f2;
        border: 1px solid #d8efdf;
        padding: 12px 14px;
    }

    .arancel-preview small {
        display: block;
        color: #688273;
        font-size: 11px;
        margin-bottom: 2px;
    }

    .arancel-preview strong {
        color: var(--medsdi-success);
        font-size: 22px;
    }

    .bloque-quick-btn {
        border: 1px solid #dce6f1;
        background: #fff;
        color: #5c6b7a;
        border-radius: 8px;
        min-width: 34px;
        height: 32px;
        font-size: 12px;
        font-weight: 700;
        margin-right: 4px;
        margin-bottom: 5px;
    }

    .bloque-quick-btn:hover,
    .bloque-quick-btn.active {
        background: var(--medsdi-primary-soft);
        color: var(--medsdi-primary);
        border-color: #bcdcff;
    }

    .medsdi-switch-box {
        border: 1px solid #e5ebf2;
        border-radius: 10px;
        padding: 10px 12px;
        background: #fafcff;
    }

    .arancel-table-tools {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .arancel-search {
        position: relative;
        flex: 1 1 280px;
        max-width: 440px;
    }

    .arancel-search i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #8a98a8;
        z-index: 2;
    }

    .arancel-search input {
        padding-left: 36px;
        border: 1px solid #dfe6ee;
        border-radius: 10px;
        height: 38px;
        width: 100%;
        outline: none;
    }

    .arancel-summary-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border-radius: 999px;
        background: #f4f7fb;
        color: #687789;
        font-size: 12px;
        font-weight: 600;
    }


    /* Modal de edición de arancel */
    .arancel-edit-info {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 13px 15px;
        margin-bottom: 18px;
        border: 1px solid #d9e9fb;
        border-radius: 12px;
        background: #f3f8ff;
        color: #4c6178;
        font-size: 12px;
        line-height: 1.45;
    }

    .arancel-edit-info i {
        color: var(--medsdi-primary);
        font-size: 18px;
        margin-top: 1px;
    }

    .arancel-readonly-wrap {
        position: relative;
    }

    .arancel-readonly-wrap .form-control[readonly] {
        background: #f4f6f9 !important;
        color: #425466;
        border-color: #dfe5ec;
        padding-right: 42px;
        cursor: not-allowed;
        font-weight: 600;
    }

    .arancel-lock-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #8a98a8;
        pointer-events: none;
        display: none;
    }

    .arancel-edit-grid {
        border: 1px solid var(--medsdi-border);
        border-radius: 14px;
        background: #fff;
        padding: 16px;
    }

    .arancel-edit-grid .form-group {
        margin-bottom: 0;
    }

    .arancel-modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px solid var(--medsdi-border);
    }

    .arancel-modal-footer .btn {
        border-radius: 9px;
        min-width: 110px;
    }

    @media (max-width: 991px) {
        .medsdi-hero { padding: 20px; }
    }
</style>
@endsection

@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content  m-top">
		<!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-2">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</a></li>
                            <li class="breadcrumb-item"><a href="#">Configuracion trabajos y aranceles</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="medsdi-hero mt-3">
            <div class="d-flex align-items-start justify-content-between flex-wrap">
                <div>
                    <h4><i class="feather icon-dollar-sign mr-2"></i>Configuración de aranceles</h4>
                    <p>Personaliza tus tratamientos, cantidad de bloques, UCO y valores para utilizarlos en presupuestos odontológicos.</p>
                </div>
                <div class="mt-2 mt-md-0 text-right">
                    <small class="d-block" style="opacity:.8;">Profesional</small>
                    <strong>{{ Auth::user()->name }}</strong>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-3">
                <div class="card medsdi-card mb-3">
                    <div class="card-header">
                        <h6 class="medsdi-card-title"><i class="feather icon-dollar-sign"></i>Valor UCO</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="medsdi-form-label" for="valor_uco">Valor UCO</label><div class="medsdi-help mb-2">Define el valor base utilizado para recalcular tus aranceles.</div>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input type="number" name="valor_uco" id="valor_uco" class="form-control form-control-sm" value="{{ $valor_uco }}" placeholder="Ingrese el valor de la UCO">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn medsdi-btn-primary btn-sm btn-block" type="button" onclick="recalcular_presupuestos()"><i class="feather icon-check"></i> Recalcular aranceles</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card medsdi-card">
                    <div class="card-header">
                        <h6 class="medsdi-card-title"><i class="feather icon-plus-circle"></i>Nuevo procedimiento</h6>
                        <small class="medsdi-help">{{ $profesional->TipoEspecialidad()->first()->nombre }}</small>
                    </div>
                    <div class="card-body">
                        <div class="arancel-quick-card">
                            <div class="arancel-step"><span class="arancel-step-number">1</span> Selecciona tratamientos del cat&aacute;logo</div>
                            <div class="arancel-search mb-2">
                                <i class="feather icon-search"></i>
                                <input type="text" id="buscar_catalogo_arancel" placeholder="Filtrar tratamientos disponibles...">
                            </div>
                            <small class="medsdi-help d-block mb-2">Configura bloques, UCO y laboratorio para cada tratamiento.</small>
                            <div class="table-responsive arancel-catalogo-wrap">
                                <table class="table table-sm mb-0" id="tabla_catalogo_aranceles">
                                    <thead><tr><th>Agregar</th><th>Tratamiento</th><th>Bloques</th><th>UCO</th><th>Lab.</th></tr></thead>
                                    <tbody><tr><td colspan="5" class="text-center text-muted py-3">Cargando tratamientos...</td></tr></tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn medsdi-btn-primary btn-sm my-2 btn-block" type="button" id="btn_guardar_aranceles_masivos" onclick="guardarArancelesMasivos()">
                            <i class="feather icon-plus-circle"></i> Agregar tratamientos seleccionados
                        </button>
                        <button type="button" class="btn btn-light btn-sm btn-block mb-3" onclick="limpiarSeleccionCatalogoAranceles()"><i class="feather icon-rotate-ccw"></i> Limpiar selecci&oacute;n</button>

                        <div class="d-none" aria-hidden="true">
                        <div class="arancel-quick-card">
                            <div class="arancel-step"><span class="arancel-step-number">1</span> Selecciona el tratamiento</div>
                            <div class="form-group mb-2">
                                @if(isset($profesional) && $profesional->id_tipo_especialidad == 16)
                                    <input type="text" name="nombre_procedimiento_impl" id="nombre_procedimiento_impl" class="form-control" placeholder="Buscar tratamiento..." autocomplete="off">
                                @else
                                    <input type="text" name="nombre_procedimiento" id="nombre_procedimiento" class="form-control" placeholder="Buscar tratamiento por nombre..." autocomplete="off">
                                @endif
                            </div>
                            <div class="diagnostico_activo"></div>
                            <div class="diagnostico_inactivo" style="display:none;"></div>
                            <input type="hidden" name="id_procedimiento" id="id_procedimiento">
                        </div>

                        <div class="arancel-quick-card">
                            <div class="arancel-step"><span class="arancel-step-number">2</span> Define bloques y UCO</div>
                            <div class="form-group mb-2">
                                <label for="cantidad_bloques_buscador" class="medsdi-form-label">Bloques de atención</label>
                                <input type="number" min="1" name="cantidad_bloques_buscador" id="cantidad_bloques_buscador" class="form-control form-control-sm" placeholder="Ej: 2">
                                <div class="mt-2">
                                    @for($i = 1; $i <= 6; $i++)
                                        <button type="button" class="bloque-quick-btn" data-bloques="{{ $i }}">{{ $i }}</button>
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="cantidad_uco_buscador" class="medsdi-form-label">Cantidad de UCO</label>
                                <input type="number" min="0" step="0.01" name="cantidad_uco_buscador" id="cantidad_uco_buscador" class="form-control form-control-sm" placeholder="Ej: 4">
                            </div>
                            <div class="medsdi-switch-box">
                                <div class="custom-control custom-switch">
                                    <input class="custom-control-input" type="checkbox" id="tiene_lab_buscador">
                                    <label class="custom-control-label" for="tiene_lab_buscador">Requiere laboratorio dental</label>
                                </div>
                            </div>
                        </div>

                        <div class="arancel-preview mb-3">
                            <small>Valor estimado del tratamiento</small>
                            <strong id="valor_tratamiento_preview">$0</strong>
                            <div class="medsdi-help mt-1"><span id="uco_preview">0 UCO</span> × $<span id="valor_uco_preview">{{ number_format($valor_uco,0,',','.') }}</span></div>
                        </div>
                        @if(isset($profesional) && $profesional->id_tipo_especialidad == 16)
                            <button class="btn medsdi-btn-primary btn-sm my-2 btn-block" role="button" onclick="guardarTratamientoProfesional({{ $profesional->id_tipo_especialidad }})"><i class="feather icon-save"></i> Guardar arancel</button>
                        @else
                            <button class="btn medsdi-btn-primary btn-sm my-2 btn-block" role="button" onclick="guardarTratamientoProfesional({{ $profesional->id_tipo_especialidad }})"><i class="feather icon-save"></i> Guardar arancel</button>
                        @endif
                        <button type="button" class="btn btn-light btn-sm btn-block" onclick="limpiarFormularioArancel()"><i class="feather icon-rotate-ccw"></i> Limpiar campos</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-9">
                <div class="card medsdi-card medsdi-table-card">
                    <div class="card-header">
                        <div>
                            <h5 class="medsdi-card-title mb-1"><i class="feather icon-list"></i>Mis trabajos y aranceles</h5>
                            <small class="medsdi-help">Valor UCO actual: $<span id="valor_uco_header">{{ number_format($valor_uco,0,',','.') }}</span></small>
                        </div>
                        <button class="btn medsdi-btn-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarDiagnosticoDental" type="button"><i class="feather icon-plus"></i> Agregar procedimiento</button>
                    </div>
                    <div class="card-body pt-2">
                        <div class="arancel-table-tools">
                            <div class="arancel-search">
                                <i class="feather icon-search"></i>
                                <input type="text" id="buscar_arancel_tabla" placeholder="Buscar dentro de mis aranceles...">
                            </div>
                            <span class="arancel-summary-badge"><i class="feather icon-layers"></i> {{ count($mis_trabajos_profesional ?? []) }} tratamientos configurados</span>
                        </div>
                        <div class="medsdi-table-wrap">
                        <table class="display table w-100 table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="table_procedimientos_propios_dental">
                            <thead>
                                <tr>
                                    <th>Procedimiento</th>
                                    <th>UCO</th>
                                    <th>Valor</th>
                                    <th>¿Laboratorio?</th>
                                    <th>Bloques</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($mis_trabajos_profesional))
                                @foreach ($mis_trabajos_profesional as $mi_trabajo)
                                    <tr>
                                        <td>{{ $mi_trabajo->descripcion }}</td>
                                        <td>{{ $mi_trabajo->cantidad_uco }}</td>
                                        <td><span class="medsdi-badge-value">${{ number_format($mi_trabajo->valor,0,',','.') }}</span></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onchange="guardarLaboratorio({{ $mi_trabajo->id }})" @if((int)$mi_trabajo->laboratorio === 1) checked @endif>
                                                <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                                    ¿Laboratorio?
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                                        <td>
                                            <button class="medsdi-action-btn medsdi-action-view btn-pack-insumos" type="button" title="Configurar pack de insumos" data-arancel-id="{{ $mi_trabajo->id }}" data-arancel-descripcion="{{ $mi_trabajo->descripcion }}"><i class="feather icon-package"></i></button>
                                            <button class="medsdi-action-btn medsdi-action-delete" type="button" title="Eliminar" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                            <button class="medsdi-action-btn medsdi-action-edit" type="button" title="Editar" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade medsdi-modal" id="modalPackInsumos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered"><div class="modal-content">
        <div class="modal-header"><div><h5 class="modal-title"><i class="feather icon-package mr-2"></i>Pack de insumos</h5><small id="pack_insumos_tratamiento"></small></div><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <div class="d-flex justify-content-between align-items-center mb-3"><p class="text-muted mb-0">Estos insumos se copiarán automáticamente al presupuesto al agregar el tratamiento.</p><button type="button" class="btn medsdi-btn-soft btn-sm" onclick="agregarFilaPackInsumos()"><i class="feather icon-plus"></i> Agregar insumo</button></div>
            <div class="table-responsive"><table class="table" id="tabla_pack_insumos"><thead><tr><th>Producto</th><th width="130">Cantidad</th><th width="160">Valor unitario</th><th>Observaciones</th><th width="60"></th></tr></thead><tbody></tbody></table></div>
        </div>
        <div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button><button type="button" class="btn medsdi-btn-primary" onclick="guardarPackInsumos()"><i class="feather icon-save"></i> Guardar pack</button></div>
    </div></div>
</div>
<!-- Modal -->
<div class="modal fade medsdi-modal" id="modalAgregarDiagnosticoDental" tabindex="-1" aria-labelledby="modalAgregarDiagnosticoDentalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarDiagnosticoDentalLabel"><i class="feather icon-plus-circle mr-2"></i>Agregar nuevo procedimiento / trabajo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="arancel-edit-info" id="arancel_modo_edicion_info" style="display:none;">
                <i class="feather icon-lock"></i>
                <div>
                    <strong>Nombre protegido</strong><br>
                    El tratamiento pertenece al catálogo odontológico de MedSDI. Puedes modificar UCO, bloques y laboratorio, pero no su descripción.
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="medsdi-form-label" for="nombre_procedimiento_nuevo">Nombre del procedimiento</label>
                <div class="arancel-readonly-wrap">
                    <input type="text" name="nombre_procedimiento_nuevo" id="nombre_procedimiento_nuevo" class="form-control" autocomplete="off">
                    <i class="feather icon-lock arancel-lock-icon" id="arancel_nombre_lock"></i>
                </div>
                <small class="medsdi-help" id="arancel_nombre_help">Ingresa el nombre del nuevo procedimiento.</small>
            </div>

            <div class="arancel-edit-grid">
                <div class="form-row align-items-end">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="form-group">
                            <label class="medsdi-form-label" for="cantidad_uco">Cantidad UCO</label>
                            <input type="number" min="0" step="0.01" name="cantidad_uco" id="cantidad_uco" class="form-control" placeholder="Ej: 3">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="form-group">
                            <label class="medsdi-form-label" for="cantidad_bloques">Cantidad de bloques</label>
                            <input type="number" min="1" name="cantidad_bloques" id="cantidad_bloques" class="form-control" placeholder="Ej: 2">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="medsdi-switch-box">
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" type="checkbox" id="tiene_lab">
                                <label class="custom-control-label" for="tiene_lab">Requiere laboratorio dental</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arancel-modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn medsdi-btn-primary btn-sm" id="btn_guardar_procedimiento" onclick="agregar_otro_procedimiento()">
                    <i class="feather icon-save mr-1"></i><span id="texto_btn_guardar_procedimiento">Guardar procedimiento</span>
                </button>
            </div>
            {{-- <table class="table w-100" id="table_procedimientos_propios_dental">
                <thead>
                    <tr>
                        <th>Procedimiento</th>
                        <th>UCO</th>
                        <th>¿Laboratorio?</th>
                        <th>Bloques</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mis_trabajos_profesional as $mi_trabajo)
                        <tr>
                            <td>{{ $mi_trabajo->descripcion }}</td>
                            <td>{{ $mi_trabajo->uco }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onchange="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                    <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                            </td>
                            <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                            <td>
                                <button class="medsdi-action-btn medsdi-action-delete" type="button" title="Eliminar" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                <button class="medsdi-action-btn medsdi-action-edit" type="button" title="Editar" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>-->
      </div>
    </div>
  </div>
@endsection

@section('page-script')
    <script>
        let arancelPackActual = null;
        let productosPackActuales = [];
        function escaparPack(valor){ return $('<div>').text(valor == null ? '' : valor).html(); }
        function agregarFilaPackInsumos(item = {}) {
            const opciones = productosPackActuales.map(p => `<option value="${p.id}" data-valor="${Number(p.precio_compra || p.precio_venta || 0)}" ${Number(item.id_producto) === Number(p.id) ? 'selected' : ''}>${escaparPack((p.codigo_interno ? p.codigo_interno+' · ' : '')+p.nombre)} (stock ${p.stock_actual || 0})</option>`).join('');
            $('#tabla_pack_insumos tbody').append(`<tr><td><select class="form-control producto-pack"><option value="">Seleccione</option>${opciones}</select></td><td><input type="number" min="0.01" step="0.01" class="form-control cantidad-pack" value="${item.cantidad || 1}"></td><td><input type="number" min="0" step="1" class="form-control valor-pack" value="${item.valor_unitario || 0}"></td><td><input class="form-control observacion-pack" value="${escaparPack(item.observaciones || '')}"></td><td><button type="button" class="btn btn-danger btn-sm" onclick="$(this).closest('tr').remove()"><i class="feather icon-x"></i></button></td></tr>`);
        }
        $(document).on('change', '.producto-pack', function(){ const valor=$(this).find(':selected').data('valor'); if(valor !== undefined) $(this).closest('tr').find('.valor-pack').val(valor); });
        function abrirPackInsumos(id, descripcion) {
            arancelPackActual=id; $('#pack_insumos_tratamiento').text(descripcion); $('#tabla_pack_insumos tbody').empty();
            $.get(`{{ url('/profesional/aranceles') }}/${id}/insumos`, function(r){ productosPackActuales=r.productos || []; (r.pack || []).forEach(agregarFilaPackInsumos); if(!(r.pack || []).length) agregarFilaPackInsumos(); $('#modalPackInsumos').modal('show'); });
        }
        $(document).on('click', '.btn-pack-insumos', function () {
            abrirPackInsumos(Number($(this).data('arancel-id')), String($(this).data('arancel-descripcion') || ''));
        });
        function guardarPackInsumos(){
            const insumos=[]; let valido=true;
            $('#tabla_pack_insumos tbody tr').each(function(){ const p=$(this).find('.producto-pack').val(); if(!p){valido=false;return;} insumos.push({id_producto:p,cantidad:$(this).find('.cantidad-pack').val(),valor_unitario:$(this).find('.valor-pack').val(),observaciones:$(this).find('.observacion-pack').val()}); });
            if(!valido){ swal('Datos requeridos','Seleccione un producto en cada fila.','warning'); return; }
            $.post(`{{ url('/profesional/aranceles') }}/${arancelPackActual}/insumos`, {_token:'{{ csrf_token() }}',insumos:insumos}, function(r){ $('#modalPackInsumos').modal('hide'); swal('Pack guardado',r.mensaje,'success'); }).fail(function(x){swal('Error',x.responseJSON?.message || 'No fue posible guardar el pack.','error');});
        }
        function formatoCLP(valor) {
            return '$' + (Number(valor || 0)).toLocaleString('es-CL', { maximumFractionDigits: 0 });
        }

        let catalogoArancelesDental = [];
        const arancelesConfigurados = @json(collect($mis_trabajos_profesional ?? [])->pluck('id_diagnostico')->map(function ($id) { return (int) $id; })->values());

        function escaparHtmlArancel(texto) {
            return $('<div>').text(String(texto || '')).html();
        }

        function renderCatalogoAranceles(filtro) {
            const termino = String(filtro || '').trim().toLowerCase();
            const filas = catalogoArancelesDental.filter(function (item) {
                return !termino || String(item.descripcion || item.label || '').toLowerCase().indexOf(termino) !== -1;
            });
            const $tbody = $('#tabla_catalogo_aranceles tbody').empty();

            if (!filas.length) {
                $tbody.html('<tr><td colspan="5" class="text-center text-muted py-3">No se encontraron tratamientos.</td></tr>');
                return;
            }

            filas.forEach(function (item) {
                const id = Number(item.value || item.id);
                const configurado = arancelesConfigurados.indexOf(id) !== -1;
                const uco = Number(item.uco || 0);
                $tbody.append(
                    '<tr class="catalogo-arancel-fila" data-id="' + id + '">' +
                        '<td><input type="checkbox" class="catalogo-arancel-check" ' + (configurado ? 'title="Ya configurado; al seleccionar se actualizar&aacute;"' : '') + '></td>' +
                        '<td><strong>' + escaparHtmlArancel(item.descripcion || item.label) + '</strong>' + (configurado ? '<small class="d-block text-success">Ya configurado</small>' : '') + '</td>' +
                        '<td><input type="number" class="form-control form-control-sm catalogo-arancel-bloques" min="1" value="1"></td>' +
                        '<td><input type="number" class="form-control form-control-sm catalogo-arancel-uco" min="0" step="0.01" value="' + uco + '"></td>' +
                        '<td><input type="checkbox" class="catalogo-arancel-lab"></td>' +
                    '</tr>'
                );
            });
        }

        function cargarCatalogoAranceles() {
            $.ajax({
                url: @json($url_tratamientos),
                type: 'POST',
                data: { search: '', catalogo: 1, _token: '{{ csrf_token() }}' },
                success: function (response) {
                    catalogoArancelesDental = Array.isArray(response) ? response : [];
                    renderCatalogoAranceles($('#buscar_catalogo_arancel').val());
                },
                error: function () {
                    $('#tabla_catalogo_aranceles tbody').html('<tr><td colspan="5" class="text-center text-danger py-3">No fue posible cargar el cat&aacute;logo.</td></tr>');
                }
            });
        }

        function limpiarSeleccionCatalogoAranceles() {
            $('#tabla_catalogo_aranceles .catalogo-arancel-check, #tabla_catalogo_aranceles .catalogo-arancel-lab').prop('checked', false);
        }

        function guardarArancelesMasivos() {
            const procedimientos = [];
            $('#tabla_catalogo_aranceles tbody tr').each(function () {
                const $fila = $(this);
                if (!$fila.find('.catalogo-arancel-check').is(':checked')) return;
                procedimientos.push({
                    id: Number($fila.data('id')),
                    bloques: Number($fila.find('.catalogo-arancel-bloques').val() || 1),
                    uco: Number($fila.find('.catalogo-arancel-uco').val() || 0),
                    laboratorio: $fila.find('.catalogo-arancel-lab').is(':checked') ? 1 : 0
                });
            });

            if (!procedimientos.length) {
                swal({ title: 'Seleccione tratamientos', text: 'Debe marcar al menos un tratamiento del cat&aacute;logo.', icon: 'warning' });
                return;
            }
            if (!(Number($('#valor_uco').val()) > 0)) {
                swal({ title: 'Valor UCO requerido', text: 'Ingrese el valor UCO antes de guardar.', icon: 'warning' });
                return;
            }

            const $boton = $('#btn_guardar_aranceles_masivos').prop('disabled', true);
            $.ajax({
                url: "{{ route('profesional.agregar_procedimiento') }}",
                type: 'POST',
                data: { procedimientos: procedimientos, valor_uco: $('#valor_uco').val(), _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.status !== 'ok') {
                        $boton.prop('disabled', false);
                        swal({ title: 'No fue posible guardar', text: response.mensaje || 'Revise los tratamientos seleccionados.', icon: 'error' });
                        return;
                    }
                    swal({ title: 'Aranceles guardados', text: response.mensaje, icon: 'success' }).then(function () { window.location.reload(); });
                },
                error: function (xhr) {
                    $boton.prop('disabled', false);
                    const mensaje = xhr.responseJSON && xhr.responseJSON.mensaje ? xhr.responseJSON.mensaje : 'No fue posible guardar los aranceles.';
                    swal({ title: 'Error', text: mensaje, icon: 'error' });
                }
            });
        }

        function actualizarPreviewArancel() {
            const uco = parseFloat($('#cantidad_uco_buscador').val()) || 0;
            const valorUco = parseFloat($('#valor_uco').val()) || 0;
            $('#valor_tratamiento_preview').text(formatoCLP(uco * valorUco));
            $('#uco_preview').text(uco.toLocaleString('es-CL') + ' UCO');
            $('#valor_uco_preview').text(valorUco.toLocaleString('es-CL', { maximumFractionDigits: 0 }));
        }

        function limpiarFormularioArancel() {
            $('#nombre_procedimiento, #nombre_procedimiento_impl').val('');
            $('#id_procedimiento').val('');
            $('#cantidad_bloques_buscador').val('');
            $('#cantidad_uco_buscador').val('');
            $('#tiene_lab_buscador').prop('checked', false);
            $('.bloque-quick-btn').removeClass('active');
            $('.diagnostico_activo').empty();
            $('.diagnostico_inactivo').empty().hide();
            actualizarPreviewArancel();
            const $campo = $('#nombre_procedimiento_impl').length ? $('#nombre_procedimiento_impl') : $('#nombre_procedimiento');
            $campo.trigger('focus');
        }

        $(document).ready(function() {
            actualizarPreviewArancel();
            cargarCatalogoAranceles();

            $('#buscar_catalogo_arancel').on('input', function () {
                renderCatalogoAranceles(this.value);
            });

            $('#cantidad_uco_buscador, #valor_uco').on('input change', actualizarPreviewArancel);

            $('.bloque-quick-btn').on('click', function() {
                $('.bloque-quick-btn').removeClass('active');
                $(this).addClass('active');
                $('#cantidad_bloques_buscador').val($(this).data('bloques')).trigger('change');
            });

            $('#cantidad_bloques_buscador').on('input change', function() {
                const valor = String($(this).val());
                $('.bloque-quick-btn').removeClass('active').filter(function() {
                    return String($(this).data('bloques')) === valor;
                }).addClass('active');
            });

            $('#buscar_arancel_tabla').on('keyup input', function() {
                if ($.fn.DataTable && $.fn.DataTable.isDataTable('#table_procedimientos_propios_dental')) {
                    $('#table_procedimientos_propios_dental').DataTable().search(this.value).draw();
                }
            });
        });

        function recalcular_presupuestos() {

    var valor_uco = $('#valor_uco').val();

    if (valor_uco == '') {
        swal({
            title: 'Error',
            text: 'Debe ingresar el valor de la UCO',
            icon: 'error'
        });
        return;
    }

    let url = "{{ route('profesional.recalcular_presupuestos') }}";

    let data = {
        valor_uco: valor_uco,
        _token: '{{ csrf_token() }}'
    };

    $.ajax({
        url: url,
        type: 'POST',
        data: data,

        success: function(response) {

            console.log(response);

            if (response.status == "ok") {

                $('#valor_uco_header').text(
                    parseFloat(valor_uco).toLocaleString('es-CL', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    })
                );

                swal({
                    title: 'Éxito',
                    text: 'Se han recalculado los aranceles correctamente',
                    icon: 'success'
                });

                let trabajos = response.mis_trabajos_profesional;

                let table = $('#table_procedimientos_propios_dental').DataTable();

                table.clear();

                trabajos.forEach(trabajo => {

                    let valorFormateado = parseFloat(trabajo.valor).toLocaleString(
                        'es-CL',
                        {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }
                    );

                    const isChecked =
                        parseInt(trabajo.laboratorio) === 1
                            ? 'checked'
                            : '';

                    table.row.add([

                        // PROCEDIMIENTO
                        `<span class="font-weight-600">
                            ${trabajo.descripcion}
                        </span>`,

                        // UCO
                        `<span class="medsdi-uco-badge">
                            ${trabajo.cantidad_uco}
                        </span>`,

                        // VALOR
                        `<span class="medsdi-badge-value">
                            $${valorFormateado}
                        </span>`,

                        // LABORATORIO
                        `
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value="${trabajo.id}"
                                id="existeLaboratorioDental${trabajo.id}"
                                onchange="guardarLaboratorio(${trabajo.id})"
                                ${isChecked}
                            >

                            <label
                                class="form-check-label"
                                for="existeLaboratorioDental${trabajo.id}">
                                ¿Laboratorio?
                            </label>
                        </div>
                        `,

                        // BLOQUES
                        `<span class="medsdi-bloques-badge">
                            ${trabajo.cantidad_bloques}
                        </span>`,

                        // ACCIONES
                        `
                        <button
                            class="medsdi-action-btn medsdi-action-delete"
                            type="button"
                            title="Eliminar"
                            onclick="eliminar_procedimiento(${trabajo.id})">

                            <i class="feather icon-x"></i>
                        </button>

                        <button
                            class="medsdi-action-btn medsdi-action-edit"
                            type="button"
                            title="Editar"
                            onclick="mostrar_procedimiento(${trabajo.id})">

                            <i class="feather icon-edit"></i>
                        </button>
                        `
                    ]);

                });

                table.draw(false);

            } else {

                swal({
                    title: 'Error',
                    text: 'No se han podido recalcular los aranceles',
                    icon: 'error'
                });

            }

        },

        error: function(xhr) {

            console.error(xhr);

            swal({
                title: 'Error',
                text: 'Ocurrió un problema al recalcular los aranceles.',
                icon: 'error'
            });

        }

    });
}

        function agregar_otro_procedimiento() {
            // La descripción se mantiene bloqueada: sólo editamos la configuración del arancel.
            var cantidad_uco = $('#cantidad_uco').val();
            var tiene_lab = $('#tiene_lab').is(':checked') ? 1 : 0;
            if (cantidad_uco == '') {
                swal({
                    title: 'Error',
                    text: 'Debe ingresar la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                cantidad_uco: cantidad_uco,
                tiene_lab: tiene_lab,
                nuevo_procedimiento: true,
                _token: '{{ csrf_token() }}'
            }

            let url = "{{ route('profesional.agregar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);

                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                    // Limpia los datos de la tabla
                    table_procedimientos_propios.clear();

                    // Agrega las nuevas filas
                    procedimientos.forEach(p => {
                        p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                        const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                        table_procedimientos_propios.row.add([
                            p.descripcion,
                            p.uco,
                            `<span class="medsdi-badge-value">$${p.valor}</span>`,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onchange="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            p.cantidad_bloques,
                            `<button class="medsdi-action-btn medsdi-action-view btn-pack-insumos" type="button" title="Insumos" data-arancel-id="${p.id}" data-arancel-descripcion="${escaparPack(p.descripcion)}"><i class="feather icon-package"></i></button><button class="medsdi-action-btn medsdi-action-delete" type="button" title="Eliminar" onclick="eliminar_procedimiento(${p.id})"><i class="fas feather icon-x"></i></button>
                            <button class="medsdi-action-btn medsdi-action-edit" type="button" title="Editar" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                        ]);
                    });

                    // Redibuja la tabla
                    table_procedimientos_propios.draw();

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onchange="guardarLaboratorio(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            `<button class="medsdi-action-btn medsdi-action-edit" role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        function eliminar_procedimiento(id){
            swal({
                title:'Eliminar Procedimiento Dental',
                text:'¿Está seguro que desea eliminar el procedimiento dental?',
                icon:'warning',
                buttons:["Cancelar","Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    confirmar_eliminar_procedimiento(id);
                }
            });
        }

        function confirmar_eliminar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.eliminar_procedimiento") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                    // Limpia los datos de la tabla
                    table_procedimientos_propios.clear();

                    // Agrega las nuevas filas
                    procedimientos.forEach(p => {
                        p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                        const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                        table_procedimientos_propios.row.add([
                            p.descripcion,
                            p.uco,
                            `<span class="medsdi-badge-value">$${p.valor}</span>`,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onchange="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            p.cantidad_bloques,
                            `<button class="medsdi-action-btn medsdi-action-view btn-pack-insumos" type="button" title="Insumos" data-arancel-id="${p.id}" data-arancel-descripcion="${escaparPack(p.descripcion)}"><i class="feather icon-package"></i></button><button class="medsdi-action-btn medsdi-action-delete" type="button" title="Eliminar" onclick="eliminar_procedimiento(${p.id})"><i class="feather icon-x"></i></button>
                            <button class="medsdi-action-btn medsdi-action-edit" type="button" title="Editar" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                        ]);
                    });

                    // Redibuja la tabla
                    table_procedimientos_propios.draw();

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onchange="guardarLaboratorio(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            `<button class="medsdi-action-btn medsdi-action-edit" role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }


        // Al abrir el modal desde "Agregar procedimiento", restaurar el modo creación.
        $('#modalAgregarDiagnosticoDental').on('show.bs.modal', function (event) {
            const trigger = $(event.relatedTarget);
            if (trigger && trigger.length) {
                $('#modalAgregarDiagnosticoDentalLabel').html('<i class="feather icon-plus-circle mr-2"></i>Agregar nuevo procedimiento / trabajo');
                $('#arancel_modo_edicion_info').hide();
                $('#arancel_nombre_lock').hide();
                $('#arancel_nombre_help').text('Ingresa el nombre del nuevo procedimiento.');
                $('#nombre_procedimiento_nuevo').prop('readonly', false).val('');
                $('#cantidad_uco').val('');
                $('#cantidad_bloques').val('');
                $('#tiene_lab').prop('checked', false);
                $('#btn_guardar_procedimiento').attr('onclick', 'agregar_otro_procedimiento()');
                $('#texto_btn_guardar_procedimiento').text('Guardar procedimiento');
            }
        });

        function mostrar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.mostrar_procedimiento") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    if(response.status == "ok"){
                        // swal({
                        //     title: 'Procedimiento dental',
                        //     text: 'Se ha encontrado el procedimiento dental',
                        //     icon: 'success'
                        // });
                        // Modo edición: el nombre proviene del catálogo y no debe modificarse.
                        $('#modalAgregarDiagnosticoDentalLabel').html('<i class="feather icon-edit mr-2"></i>Editar arancel del tratamiento');
                        $('#arancel_modo_edicion_info').show();
                        $('#arancel_nombre_lock').show();
                        $('#arancel_nombre_help').text('La descripción pertenece al catálogo odontológico y no puede modificarse desde el arancel.');

                        $('#nombre_procedimiento_nuevo')
                            .val(response.procedimiento.descripcion)
                            .prop('readonly', true);

                        $('#cantidad_uco').val(response.procedimiento.cantidad_uco);
                        $('#cantidad_bloques').val(response.procedimiento.cantidad_bloques);
                        $('#tiene_lab').prop('checked', parseInt(response.procedimiento.laboratorio) === 1);

                        $('#btn_guardar_procedimiento')
                            .attr('onclick', 'editarProcedimiento(' + id + ')')
                            .removeClass('btn-warning')
                            .addClass('medsdi-btn-primary');
                        $('#texto_btn_guardar_procedimiento').text('Guardar cambios');

                        $('#modalAgregarDiagnosticoDental').modal('show');
                        setTimeout(function(){ $('#cantidad_uco').trigger('focus').select(); }, 250);


                    }


                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function guardarLaboratorio(trabajoId) {
            const $checkbox = $('#existeLaboratorioDental' + trabajoId);

            if (!$checkbox.length) {
                console.error('No se encontró el checkbox del tratamiento:', trabajoId);
                return;
            }

            const nuevoEstado = $checkbox.is(':checked') ? 1 : 0;
            const estadoAnterior = nuevoEstado === 1 ? false : true;

            $checkbox.prop('disabled', true);

            $.ajax({
                url: "{{ route('dental.guardarLaboratorio') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    trabajo_id: trabajoId,
                    existe_laboratorio: nuevoEstado
                },
                success: function(response) {
                    if (parseInt(response.status) === 1) {
                        // No reconstruimos DataTables: el resto de la fila no cambió
                        // y así se conservan todos los estilos MedSDI.
                        $checkbox
                            .prop('checked', parseInt(response.trabajo.laboratorio) === 1)
                            .prop('disabled', false);

                        return;
                    }

                    $checkbox
                        .prop('checked', estadoAnterior)
                        .prop('disabled', false);

                    swal({
                        title: 'No fue posible guardar',
                        text: response.mensaje || 'No se pudo actualizar el laboratorio.',
                        icon: 'error'
                    });
                },
                error: function(xhr) {
                    $checkbox
                        .prop('checked', estadoAnterior)
                        .prop('disabled', false);

                    let mensaje = 'No fue posible actualizar el laboratorio.';

                    if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                        mensaje = xhr.responseJSON.mensaje;
                    }

                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error'
                    });
                }
            });
        }

        function guardarTratamientoProfesional(especialidad){
            if(especialidad == 16){
                var nombre_procedimiento = $('#nombre_procedimiento_impl').val();
            }else{
                var nombre_procedimiento = $('#nombre_procedimiento').val();
            }
            var cantidad_bloques = $('#cantidad_bloques_buscador').val();
            var cantidad_uco = $('#cantidad_uco_buscador').val();
            var tiene_lab = $('#tiene_lab_buscador').is(':checked') ? 1 : 0;
            var valor_uco = $('#valor_uco').val();
            if(valor_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el valor de la UCO',
                    icon: 'error'
                });
                return;
            }

            if(nombre_procedimiento == '' || cantidad_bloques == '' || cantidad_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el nombre del procedimiento, la cantidad de bloques y la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                nombre_procedimiento: nombre_procedimiento,
                cantidad_bloques: cantidad_bloques,
                cantidad_uco: cantidad_uco,
                tiene_lab: tiene_lab,
                nuevo_procedimiento: false,
                valor_uco: valor_uco,
                _token: '{{ csrf_token() }}'
            }

            console.log(data);

            let url = "{{ route('profesional.agregar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.status == 'ok' ){
                        swal({
                            title: 'Procedimiento guardado',
                            text: 'El procedimiento se ha guardado correctamente',
                            icon: 'success'
                        });
                        // limpiar campos
                        $('#nombre_procedimiento').val('');
                        $('#cantidad_bloques_buscador').val('');
                        $('#cantidad_uco_buscador').val('');
                        $('#tiene_lab_buscador').prop('checked', false);
                        $('.bloque-quick-btn').removeClass('active');
                        actualizarPreviewArancel();

                        // Actualizar procedimientos propios
                        let procedimientos = response.mis_trabajos_profesional;
                        var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                        // Limpia los datos de la tabla
                        table_procedimientos_propios.clear();

                        // Agrega las nuevas filas
                        procedimientos.forEach(p => {
                            const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                            let valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                            table_procedimientos_propios.row.add([
                                p.descripcion,
                                p.cantidad_uco,
                                `<span class="medsdi-badge-value">$${valor}</span>`,
                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onchange="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                    <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                p.cantidad_bloques,
                                `<button class="medsdi-action-btn medsdi-action-view btn-pack-insumos" type="button" title="Insumos" data-arancel-id="${p.id}" data-arancel-descripcion="${escaparPack(p.descripcion)}"><i class="feather icon-package"></i></button><button class="medsdi-action-btn medsdi-action-delete" type="button" title="Eliminar" onclick="eliminar_procedimiento(${p.id})"><i class="feather icon-x"></i></button>
                                <button class="medsdi-action-btn medsdi-action-edit" type="button" title="Editar" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                            ]);
                        });

                        // Redibuja la tabla
                        table_procedimientos_propios.draw();

                        // Actualizar la tabla DataTable
                        let trabajos = response.trabajos;
                        let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                        // Limpia los datos de la tabla correctamente
                        table.clear();

                        // Agrega las nuevas filas
                        trabajos.forEach(trabajo => {
                            const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                            table.row.add([
                                trabajo.descripcion,
                                trabajo.valor,
                                trabajo.uco,
                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onchange="guardarLaboratorio(${trabajo.id})" ${isChecked}>
                                    <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                `<button class="medsdi-action-btn medsdi-action-edit role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                            ]);
                        });

                        // Dibuja la tabla nuevamente
                        table.draw();
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function editarProcedimiento(id){
            var nombre_procedimiento_nuevo = $('#nombre_procedimiento_nuevo').val();
            var cantidad_uco = $('#cantidad_uco').val();
            var cantidad_bloques = $('#cantidad_bloques').val();
            var tiene_lab = $('#tiene_lab').is(':checked') ? 1 : 0;
            var valor_uco = $('#valor_uco').val();
            if(valor_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el valor de la UCO',
                    icon: 'error'
                });
                return;
            }
            if (nombre_procedimiento_nuevo == '' || cantidad_uco == '') {
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el nombre del procedimiento y la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                id: id,
                nombre_procedimiento_nuevo: nombre_procedimiento_nuevo,
                cantidad_uco: cantidad_uco,
                cantidad_bloques: cantidad_bloques,
                tiene_lab: tiene_lab,
                nuevo_procedimiento: false,
                valor_uco: valor_uco,
                _token: '{{ csrf_token() }}'
            }

            let url = "{{ route('profesional.editar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.status === 'ok'){
                        swal({
                            title: 'Procedimiento editado',
                            text: 'El procedimiento se ha editado correctamente',
                            icon: 'success'
                        });
                        // ocultar modal
                        $('#modalAgregarDiagnosticoDental').modal('hide');
                        // Actualizar procedimientos propios
                        let procedimientos = response.procedimientos;
                        console.log(procedimientos);
                        var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                        // Limpia los datos de la tabla
                        table_procedimientos_propios.clear();

                        // Agrega las nuevas filas
                        procedimientos.forEach(p => {
                            // formatear el valor a 0 decimales y separador de miles
                            p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                            const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                            table_procedimientos_propios.row.add([
                                p.descripcion,
                                p.cantidad_uco,
                                `<span class="medsdi-badge-value">$${p.valor}</span>`,
                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onchange="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                    <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                p.cantidad_bloques,
                                `<button class="medsdi-action-btn medsdi-action-view btn-pack-insumos" type="button" title="Insumos" data-arancel-id="${p.id}" data-arancel-descripcion="${escaparPack(p.descripcion)}"><i class="feather icon-package"></i></button><button class="medsdi-action-btn medsdi-action-delete" type="button" title="Eliminar" onclick="eliminar_procedimiento(${p.id})"><i class="feather icon-x"></i></button>
                                <button class="medsdi-action-btn medsdi-action-edit" type="button" title="Editar" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                            ]);
                        });

                        // Redibuja la tabla
                        table_procedimientos_propios.draw();
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection

