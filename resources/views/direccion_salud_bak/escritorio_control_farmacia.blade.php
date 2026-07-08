@extends('template.direccion_salud.template')

@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Control de Farmacia</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('ministerio.home') }}">Mi Escritorio</a>
                            </li>
                            <li class="breadcrumb-item active">Control de Farmacia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->

        <!-- Pills de navegación -->
        <div class="row m-b-10">
            <div class="col-sm-12">
                <ul class="nav nav-pills mb-3" id="pills-farmacia" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-wizard active" id="pill-stock-tab" data-toggle="pill" href="#pill-stock" role="tab">
                            <i class="feather icon-box"></i> Control de Stock
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-wizard" id="pill-farmacias-tab" data-toggle="pill" href="#pill-farmacias" role="tab">
                            <i class="feather icon-home"></i> Farmacias
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-farmacia-content">

        <!-- ====== TAB 1: STOCK ====== -->
        <div class="tab-pane fade show active" id="pill-stock" role="tabpanel">

        <!-- Tarjetas resumen -->
        <div class="row m-b-10" id="tarjetas_resumen" style="display:none;">
            <div class="col-6 col-md-3">
                <div class="card text-center py-2">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-primary mb-0" id="stat_total">0</h2>
                        <small class="text-muted">Total productos</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center py-2">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-success mb-0" id="stat_normal">0</h2>
                        <small class="text-muted">Stock normal</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center py-2">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-warning mb-0" id="stat_bajo">0</h2>
                        <small class="text-muted">Stock bajo</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center py-2">
                    <div class="card-body p-2">
                        <h2 class="font-weight-bold text-danger mb-0" id="stat_critico">0</h2>
                        <small class="text-muted">Stock crítico</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros + Tabla -->
        <div class="row m-b-10">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-top bg-info" id="tabla-farmacia">
                        <h5 class="font-weight-bold">Productos en Farmacia</h5>
                    </div>
                    <div id="tabla-farmacia-c" class="collapse show" aria-labelledby="tabla-farmacia">
                        <div class="card-body-aten-a shadow-none">

                            <!-- Filtros -->
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2">
                                    <label class="floating-label-activo-sm">Buscar</label>
                                    <input type="text" class="form-control form-control-sm" id="filtro_buscar"
                                        placeholder="Nombre, código o descripción..."
                                        onkeydown="if(event.key==='Enter') buscar_productos_farmacia();">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="floating-label-activo-sm">Tipo de producto</label>
                                    <select class="form-control form-control-sm" id="filtro_tipo">
                                        <option value="0">Todos los tipos</option>
                                        @foreach ($tipos_producto as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="floating-label-activo-sm">Estado de stock</label>
                                    <select class="form-control form-control-sm" id="filtro_stock">
                                        <option value="">Todos</option>
                                        <option value="normal">Normal</option>
                                        <option value="bajo">Bajo</option>
                                        <option value="critico">Crítico</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-info-light-c btn-sm w-100"
                                        onclick="buscar_productos_farmacia();">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                </div>
                            </div>

                            <!-- Spinner -->
                            <div id="spinner_farmacia" class="text-center py-3" style="display:none;">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Cargando...</span>
                                </div>
                                <p class="mt-2 text-muted">Cargando productos...</p>
                            </div>

                            <!-- Tabla -->
                            <div class="table-responsive" id="contenedor_tabla_farmacia" style="display:none;">
                                <table id="tabla_productos_farmacia" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;">Imagen</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Unidad</th>
                                            <th class="text-center">Stock Mín.</th>
                                            <th class="text-center">Stock Act.</th>
                                            <th class="text-center">Stock Máx.</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_productos_farmacia">
                                    </tbody>
                                </table>
                            </div>

                            <!-- Sin resultados -->
                            <div id="sin_resultados_farmacia" class="text-center py-4" style="display:none;">
                                <i class="feather icon-package" style="font-size:2.5rem; color:#ccc;"></i>
                                <p class="text-muted mt-2">No se encontraron productos con los filtros aplicados.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div><!-- /.tab-pane pill-stock -->

        <!-- ====== TAB 2: FARMACIAS ====== -->
        <div class="tab-pane fade" id="pill-farmacias" role="tabpanel">
            <div class="row m-b-10">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-top bg-info">
                            <h5 class="font-weight-bold">Farmacias registradas</h5>
                        </div>
                        <div class="card-body-aten-a shadow-none">

                            <!-- Barra de acciones -->
                            <div class="row mb-3 align-items-end">
                                <div class="col-md-4 mb-2">
                                    <label class="floating-label-activo-sm">Buscar</label>
                                    <input type="text" class="form-control form-control-sm" id="farm_filtro_buscar"
                                        placeholder="Nombre, código, responsable..."
                                        onkeydown="if(event.key==='Enter') cargar_farmacias();">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="floating-label-activo-sm">Estado</label>
                                    <select class="form-control form-control-sm" id="farm_filtro_estado">
                                        <option value="">Todos</option>
                                        <option value="1">Activa</option>
                                        <option value="0">Inactiva</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button type="button" class="btn btn-info-light-c btn-sm w-100" onclick="cargar_farmacias();">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <button type="button" class="btn btn-success btn-sm w-100" onclick="abrir_modal_farmacia();">
                                        <i class="feather icon-plus"></i> Nueva
                                    </button>
                                </div>
                            </div>

                            <!-- Spinner farmacias -->
                            <div id="spinner_farmacias" class="text-center py-3" style="display:none;">
                                <div class="spinner-border text-info" role="status"><span class="sr-only">Cargando...</span></div>
                                <p class="mt-2 text-muted">Cargando farmacias...</p>
                            </div>

                            <!-- Tabla farmacias -->
                            <div class="table-responsive" id="contenedor_tabla_farmacias" style="display:none;">
                                <table id="tabla_farmacias" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                            <th>Tipo</th>
                                            <th>Responsable</th>
                                            <th>Teléfono</th>
                                            <th>Lugar de Atención</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_farmacias"></tbody>
                                </table>
                            </div>

                            <!-- Sin farmacias -->
                            <div id="sin_resultados_farmacias" class="text-center py-4" style="display:none;">
                                <i class="feather icon-home" style="font-size:2.5rem; color:#ccc;"></i>
                                <p class="text-muted mt-2">No se encontraron farmacias registradas.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.tab-pane pill-farmacias -->

        </div><!-- /.tab-content -->

    </div>
</div>

<!-- ===== Modal Farmacia (Registrar / Editar) ===== -->
<div class="modal fade" id="modal_farmacia" tabindex="-1" role="dialog" aria-labelledby="modal_farmaciaLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white font-weight-bold" id="modal_farmaciaLabel">
                    <i class="feather icon-home"></i> <span id="modal_farmacia_titulo">Nueva Farmacia</span>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="farm_id" value="">
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="farm_nombre" maxlength="255">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Código interno</label>
                        <input type="text" class="form-control form-control-sm" id="farm_codigo" maxlength="50">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Tipo</label>
                        <select class="form-control form-control-sm" id="farm_tipo">
                            <option value="">Seleccione</option>
                            <option value="hospitalaria">Hospitalaria</option>
                            <option value="comunitaria">Comunitaria</option>
                            <option value="dispensario">Dispensario</option>
                            <option value="otra">Otra</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Lugar de Atención</label>
                        <select class="form-control form-control-sm" id="farm_lugar_atencion">
                            <option value="">Sin vincular</option>
                            @foreach($lugares_atencion as $lugar)
                                <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Responsable</label>
                        <input type="text" class="form-control form-control-sm" id="farm_responsable" maxlength="255">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">RUT Responsable</label>
                        <input type="text" class="form-control form-control-sm" id="farm_rut_responsable" maxlength="12" placeholder="12.345.678-9">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Teléfono</label>
                        <input type="text" class="form-control form-control-sm" id="farm_telefono" maxlength="20">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Email</label>
                        <input type="email" class="form-control form-control-sm" id="farm_email" maxlength="255">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Región</label>
                        <select class="form-control form-control-sm" id="farm_region" onchange="buscar_ciudad()">
                            <option value="">Seleccione</option>
                            @foreach($regiones as $region)
                                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="floating-label-activo-sm">Comuna</label>
                        <select class="form-control form-control-sm" id="farm_comuna">
                            <option value="">Seleccione región primero</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="text" class="form-control form-control-sm" id="farm_direccion" maxlength="255">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="floating-label-activo-sm">Horario de atención</label>
                        <select class="js-example-basic-multiple" name="farm_horario" id="farm_horario" multiple="multiple">
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miércoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sábado</option>
                            <option value="7">Domingo</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                        <label class="floating-label-activo-sm">Hora entrada</label>
                        <input type="time" class="form-control form-control-sm" id="hora_entrada" name="hora_entrada" value="08:00">
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                        <label class="floating-label-activo-sm">Hora salida</label>
                        <input type="time" class="form-control form-control-sm" id="hora_salida" name="hora_salida" value="19:00">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control form-control-sm" id="farm_observaciones" rows="2"></textarea>
                    </div>

                    <!-- Estado (solo en edición) -->
                    <div class="col-md-12 mb-2" id="farm_estado_row" style="display:none;">
                        <label class="floating-label-activo-sm">Estado</label>
                        <select class="form-control form-control-sm" id="farm_estado">
                            <option value="1">Activa</option>
                            <option value="0">Inactiva</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="feather icon-x"></i> Cancelar
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="guardar_farmacia();">
                    <i class="feather icon-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Control de Medicamentos por Farmacia -->
<div class="modal fade" id="modal_medicamentos_farmacia" tabindex="-1" role="dialog" aria-labelledby="modal_medFarmLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="modal_medFarmLabel">
                    <i class="feather icon-clipboard"></i> Control de Medicamentos &mdash; <span id="ctrl_farm_nombre"></span>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Tarjetas resumen -->
                <div class="row mb-3">
                    <div class="col-6 col-md-3 mb-2">
                        <div class="card text-center py-2 border-primary">
                            <div class="card-body p-2">
                                <h3 class="font-weight-bold text-primary mb-0" id="ctrl_total">0</h3>
                                <small class="text-muted">Total productos</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-2">
                        <div class="card text-center py-2 border-success">
                            <div class="card-body p-2">
                                <h3 class="font-weight-bold text-success mb-0" id="ctrl_verificados">0</h3>
                                <small class="text-muted">Verificados</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-2">
                        <div class="card text-center py-2 border-warning">
                            <div class="card-body p-2">
                                <h3 class="font-weight-bold text-warning mb-0" id="ctrl_pendientes">0</h3>
                                <small class="text-muted">Pendientes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-2 d-flex align-items-center">
                        <div class="w-100">
                            <small class="text-muted d-block mb-1 text-center" id="ctrl_pct_label">0%</small>
                            <div class="progress" style="height:18px;">
                                <div class="progress-bar bg-success" id="ctrl_progreso" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtro y acciones -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-5 mb-2">
                        <input type="text" class="form-control form-control-sm" id="ctrl_buscar"
                            placeholder="Buscar por nombre, código o tipo..."
                            oninput="filtrar_ctrl_medicamentos()">
                    </div>
                    <div class="col-md-4 mb-2">
                        <select class="form-control form-control-sm" id="ctrl_filtro_stock" onchange="filtrar_ctrl_medicamentos()">
                            <option value="">Todos los estados</option>
                            <option value="normal">Normal</option>
                            <option value="bajo">Bajo</option>
                            <option value="critico">Crítico</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2 text-right">
                        <button class="btn btn-sm btn-outline-success mr-1" onclick="marcar_todos_ctrl(true)" title="Marcar todos">
                            <i class="feather icon-check-square"></i> Todos
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="marcar_todos_ctrl(false)" title="Desmarcar todos">
                            <i class="feather icon-square"></i> Ninguno
                        </button>
                    </div>
                </div>

                <!-- Spinner -->
                <div id="spinner_ctrl" class="text-center py-3" style="display:none;">
                    <div class="spinner-border text-success" role="status"><span class="sr-only">Cargando...</span></div>
                    <p class="mt-2 text-muted">Cargando productos...</p>
                </div>

                <!-- Tabla -->
                <div class="table-responsive" id="contenedor_ctrl_tabla" style="display:none;">
                    <table class="table table-sm table-hover" id="tabla_ctrl_medicamentos">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:42px;" class="text-center">
                                    <i class="feather icon-check" title="Verificado"></i>
                                </th>
                                <th style="width:50px;">Img</th>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>Tipo</th>
                                <th class="text-center">Stock Mín.</th>
                                <th class="text-center">Stock Act.</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_ctrl_medicamentos"></tbody>
                    </table>
                </div>

                <!-- Sin resultados -->
                <div id="sin_resultados_ctrl" class="text-center py-4" style="display:none;">
                    <i class="feather icon-package" style="font-size:2.5rem; color:#ccc;"></i>
                    <p class="text-muted mt-2">No se encontraron productos.</p>
                </div>

            </div>
            <div class="modal-footer">
                <small class="text-muted mr-auto" id="ctrl_resumen_texto">— de — productos verificados</small>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="feather icon-x"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal detalle producto -->
<div class="modal fade" id="modal_detalle_producto" tabindex="-1" role="dialog" aria-labelledby="modal_detalle_productoLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modal_detalle_productoLabel">
                    <i class="feather icon-box"></i> Detalle del Producto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Imagen -->
                    <div class="col-md-4 text-center mb-3">
                        <img id="detalle_imagen" src="" alt="Imagen producto"
                            class="img-fluid rounded border"
                            style="max-height:220px; object-fit:contain;"
                            onerror="this.src='{{ asset('images/farmacia/noimage.png') }}'">
                        <span id="detalle_badge_stock" class="badge badge-pill mt-2 d-block" style="font-size:.85rem;"></span>
                    </div>
                    <!-- Datos -->
                    <div class="col-md-8">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-muted" style="width:40%;">Código:</td>
                                    <td id="detalle_codigo"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Nombre:</td>
                                    <td id="detalle_nombre"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Tipo:</td>
                                    <td id="detalle_tipo"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Marca:</td>
                                    <td id="detalle_marca"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Unidad de medida:</td>
                                    <td id="detalle_unidad"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Stock mínimo:</td>
                                    <td id="detalle_stock_min"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Stock actual:</td>
                                    <td id="detalle_stock_act"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Stock máximo:</td>
                                    <td id="detalle_stock_max"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Precio unitario:</td>
                                    <td id="detalle_precio_unitario"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Precio venta:</td>
                                    <td id="detalle_precio_venta"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Almacenamiento:</td>
                                    <td id="detalle_almacenamiento"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-muted">Temperatura:</td>
                                    <td id="detalle_temperatura"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Descripción / Observaciones -->
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold text-muted">Descripción:</label>
                        <p id="detalle_descripcion" class="text-muted small mb-0"></p>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-muted">Observaciones:</label>
                        <p id="detalle_observaciones" class="text-muted small mb-0"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="feather icon-x"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var productosCache = [];
    var dtFarmacia = null;

    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            width: '100%',
            placeholder: 'Seleccione días de atención'
        });
        buscar_productos_farmacia();
    });

    function buscar_productos_farmacia() {
        var buscar      = $('#filtro_buscar').val();
        var tipo        = $('#filtro_tipo').val();
        var stock_estado = $('#filtro_stock').val();

        $('#spinner_farmacia').show();
        $('#contenedor_tabla_farmacia').hide();
        $('#sin_resultados_farmacia').hide();
        $('#tarjetas_resumen').hide();

        // Destruir DataTable previa si existe
        if (dtFarmacia && $.fn.DataTable.isDataTable('#tabla_productos_farmacia')) {
            dtFarmacia.destroy();
            dtFarmacia = null;
        }
        $('#tbody_productos_farmacia').empty();

        $.ajax({
            url: '{{ route("ministerio.control_farmacia.productos") }}',
            type: 'GET',
            data: { buscar: buscar, tipo: tipo, stock_estado: stock_estado },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_farmacia').hide();

            if (data.estado === 1) {
                productosCache = data.productos;

                // Actualizar tarjetas
                $('#stat_total').text(data.totales.total);
                $('#stat_normal').text(data.totales.normal);
                $('#stat_bajo').text(data.totales.bajo);
                $('#stat_critico').text(data.totales.critico);
                $('#tarjetas_resumen').show();

                if (data.productos.length === 0) {
                    $('#sin_resultados_farmacia').show();
                    return;
                }

                $.each(data.productos, function (i, p) {
                    var badgeHtml = buildBadgeStock(p);
                    var imageSrc = p.image_path
                        ? '/' + p.image_path
                        : '{{ asset("images/farmacia/noimage.png") }}';

                    var fila = '<tr>' +
                        '<td class="text-center align-middle">' +
                            '<img src="' + imageSrc + '" alt="" ' +
                            'style="width:48px;height:48px;object-fit:contain;border-radius:6px;border:1px solid #eee;" ' +
                            'onerror="this.src=\'{{ asset("images/farmacia/noimage.png") }}\'">' +
                        '</td>' +
                        '<td class="align-middle"><small>' + (p.codigo_interno || '—') + '</small></td>' +
                        '<td class="align-middle font-weight-bold">' + (p.nombre || '—') + '</td>' +
                        '<td class="align-middle"><small>' + (p.tipo_producto || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (p.marca || '—') + '</small></td>' +
                        '<td class="align-middle text-center"><small>' + (p.unidad_medida || '—') + '</small></td>' +
                        '<td class="align-middle text-center">' + (p.stock_minimo ?? '—') + '</td>' +
                        '<td class="align-middle text-center font-weight-bold">' + buildStockActual(p) + '</td>' +
                        '<td class="align-middle text-center">' + (p.stock_maximo ?? '—') + '</td>' +
                        '<td class="align-middle text-center">' + badgeHtml + '</td>' +
                        '<td class="align-middle text-center">' +
                            '<button type="button" class="btn btn-sm btn-outline-info" onclick="ver_detalle_producto(' + i + ')">' +
                            '<i class="feather icon-eye"></i></button>' +
                        '</td>' +
                        '</tr>';

                    $('#tbody_productos_farmacia').append(fila);
                });

                $('#contenedor_tabla_farmacia').show();

                dtFarmacia = $('#tabla_productos_farmacia').DataTable({
                    responsive: true,
                    pageLength: 25,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    },
                    columnDefs: [
                        { orderable: false, targets: [0, 10] }
                    ]
                });
            }
        })
        .fail(function () {
            $('#spinner_farmacia').hide();
            swal({ title: 'Error', text: 'No se pudo conectar con el servidor.', icon: 'error', buttons: 'Aceptar' });
        });
    }

    function buildBadgeStock(p) {
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        if (actual <= minimo) {
            return '<span class="badge badge-danger">Crítico</span>';
        } else if (actual <= minimo * 1.5) {
            return '<span class="badge badge-warning">Bajo</span>';
        }
        return '<span class="badge badge-success">Normal</span>';
    }

    function buildStockActual(p) {
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        var color = 'text-success';
        if (actual <= minimo) color = 'text-danger';
        else if (actual <= minimo * 1.5) color = 'text-warning';
        return '<span class="' + color + '">' + actual + '</span>';
    }

    function formatPrecio(valor) {
        if (!valor) return '—';
        return '$' + parseFloat(valor).toLocaleString('es-CL');
    }

    function ver_detalle_producto(index) {
        var p = productosCache[index];
        if (!p) return;

        var imageSrc = p.image_path
            ? '/' + p.image_path
            : '{{ asset("images/farmacia/noimage.png") }}';

        $('#detalle_imagen').attr('src', imageSrc);
        $('#detalle_codigo').text(p.codigo_interno || '—');
        $('#detalle_nombre').text(p.nombre || '—');
        $('#detalle_tipo').text(p.tipo_producto || '—');
        $('#detalle_marca').text(p.marca || '—');
        $('#detalle_unidad').text(p.unidad_medida || '—');
        $('#detalle_stock_min').text(p.stock_minimo ?? '—');
        $('#detalle_stock_act').text(p.stock_actual ?? '—');
        $('#detalle_stock_max').text(p.stock_maximo ?? '—');
        $('#detalle_precio_unitario').text(formatPrecio(p.precio_unitario));
        $('#detalle_precio_venta').text(formatPrecio(p.precio_venta));
        $('#detalle_almacenamiento').text(p.almacenamiento == 1 ? 'Requiere almacenamiento especial' : 'Normal');
        $('#detalle_temperatura').text(p.temperatura || '—');
        $('#detalle_descripcion').text(p.descripcion || '—');
        $('#detalle_observaciones').text(p.observaciones || '—');

        // Badge estado en modal
        var badgeClass = 'badge-success', badgeText = 'Stock Normal';
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        if (actual <= minimo) { badgeClass = 'badge-danger'; badgeText = 'Stock Crítico'; }
        else if (actual <= minimo * 1.5) { badgeClass = 'badge-warning'; badgeText = 'Stock Bajo'; }
        $('#detalle_badge_stock').attr('class', 'badge badge-pill mt-2 d-block ' + badgeClass).text(badgeText);

        $('#modal_detalle_producto').modal('show');
    }

    function buscar_ciudad(id_ciudad = 0) {

            let region = $('#farm_region').val();
            let url = "{{ route('profesional.buscar_ciudad_region') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        region: region,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);

                        let ciudades = $('#farm_comuna');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if (id_ciudad != 0)
                            ciudades.val(id_ciudad);

                    } else {

                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


        };

    /* ============================================================
       CRUD FARMACIAS
    ============================================================ */
    var farmaciasCache = [];
    var dtFarmacias = null;

    // Cargar al activar el pill
    $('a[href="#pill-farmacias"]').on('shown.bs.tab', function () {
        if (farmaciasCache.length === 0) cargar_farmacias();
    });

    function cargar_farmacias() {
        var buscar = $('#farm_filtro_buscar').val();
        var estado = $('#farm_filtro_estado').val();

        $('#spinner_farmacias').show();
        $('#contenedor_tabla_farmacias').hide();
        $('#sin_resultados_farmacias').hide();

        if (dtFarmacias && $.fn.DataTable.isDataTable('#tabla_farmacias')) {
            dtFarmacias.destroy();
            dtFarmacias = null;
        }
        $('#tbody_farmacias').empty();

        $.ajax({
            url: '{{ route("ministerio.farmacias.listar") }}',
            type: 'GET',
            data: { buscar: buscar, estado: estado },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_farmacias').hide();
            if (data.estado === 1) {
                farmaciasCache = data.farmacias;

                if (data.farmacias.length === 0) {
                    $('#sin_resultados_farmacias').show();
                    return;
                }

                $.each(data.farmacias, function (i, f) {
                    var badgeEstado = f.estado == 1
                        ? '<span class="badge badge-success">Activa</span>'
                        : '<span class="badge badge-secondary">Inactiva</span>';

                    var tipo = f.tipo
                        ? f.tipo.charAt(0).toUpperCase() + f.tipo.slice(1)
                        : '—';

                    var fila = '<tr>' +
                        '<td class="align-middle">' + (i + 1) + '</td>' +
                        '<td class="align-middle font-weight-bold">' + (f.nombre || '—') + '</td>' +
                        '<td class="align-middle"><small>' + (f.codigo || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + tipo + '</small></td>' +
                        '<td class="align-middle"><small>' + (f.responsable || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (f.telefono || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (f.lugar_atencion || '—') + '</small></td>' +
                        '<td class="align-middle text-center">' + badgeEstado + '</td>' +
                        '<td class="align-middle text-center">' +
                            '<button class="btn btn-sm btn-outline-primary mr-1" onclick="editar_farmacia(' + i + ')" title="Editar">' +
                                '<i class="feather icon-edit-2"></i>' +
                            '</button>' +
                            '<button class="btn btn-sm btn-outline-success mr-1" onclick="ver_medicamentos_farmacia(' + i + ')" title="Control de Medicamentos">' +
                                '<i class="feather icon-clipboard"></i>' +
                            '</button>' +
                            '<button class="btn btn-sm btn-outline-danger" onclick="eliminar_farmacia(' + f.id + ', \'' + (f.nombre || '') + '\')" title="Eliminar">' +
                                '<i class="feather icon-trash-2"></i>' +
                            '</button>' +
                        '</td>' +
                        '</tr>';

                    $('#tbody_farmacias').append(fila);
                });

                $('#contenedor_tabla_farmacias').show();
                dtFarmacias = $('#tabla_farmacias').DataTable({
                    responsive: true,
                    pageLength: 15,
                    language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' },
                    columnDefs: [{ orderable: false, targets: [8] }]
                });
            }
        })
        .fail(function () {
            $('#spinner_farmacias').hide();
            swal({ title: 'Error', text: 'No se pudo obtener las farmacias.', icon: 'error', buttons: 'Aceptar' });
        });
    }

    function abrir_modal_farmacia() {
        $('#farm_id').val('');
        $('#farm_nombre').val('');
        $('#farm_codigo').val('');
        $('#farm_tipo').val('');
        $('#farm_lugar_atencion').val('');
        $('#farm_responsable').val('');
        $('#farm_rut_responsable').val('');
        $('#farm_telefono').val('');
        $('#farm_email').val('');
        $('#farm_region').val('').trigger('change');
        $('#farm_comuna').html('<option value="">Seleccione región primero</option>');
        $('#farm_direccion').val('');
        $('#farm_horario').val(null).trigger('change');
        $('#hora_entrada').val('08:00');
        $('#hora_salida').val('19:00');
        $('#farm_observaciones').val('');
        $('#farm_estado_row').hide();
        $('#modal_farmacia_titulo').text('Nueva Farmacia');
        $('#modal_farmacia').modal('show');
    }

    function editar_farmacia(index) {
        var f = farmaciasCache[index];
        if (!f) return;

        $('#farm_id').val(f.id);
        $('#farm_nombre').val(f.nombre || '');
        $('#farm_codigo').val(f.codigo || '');
        $('#farm_tipo').val(f.tipo || '');
        $('#farm_lugar_atencion').val(f.id_lugar_atencion || '');
        $('#farm_responsable').val(f.responsable || '');
        $('#farm_rut_responsable').val(f.rut_responsable || '');
        $('#farm_telefono').val(f.telefono || '');
        $('#farm_email').val(f.email || '');
        // Región y comuna: cargar comunas primero y luego seleccionar
        if (f.id_region) {
            $('#farm_region').val(f.id_region);
            buscar_ciudad(f.id_ciudad);
        } else {
            $('#farm_region').val('');
            $('#farm_comuna').html('<option value="">Seleccione región primero</option>');
        }
        $('#farm_direccion').val(f.direccion || '');
        // Días de atención (multi-select)
        var dias = f.dias_atencion ? String(f.dias_atencion).split(',') : [];
        $('#farm_horario').val(dias).trigger('change');
        $('#hora_entrada').val(f.hora_entrada ? f.hora_entrada.substring(0,5) : '');
        $('#hora_salida').val(f.hora_salida ? f.hora_salida.substring(0,5) : '');
        $('#farm_observaciones').val(f.observaciones || '');
        $('#farm_estado').val(f.estado);
        $('#farm_estado_row').show();
        $('#modal_farmacia_titulo').text('Editar Farmacia');
        $('#modal_farmacia').modal('show');
    }

    function guardar_farmacia() {
        var id = $('#farm_id').val();
        var nombre = $.trim($('#farm_nombre').val());

        if (nombre === '') {
            swal({ title: 'Campo requerido', text: 'El nombre de la farmacia es obligatorio.', icon: 'warning', buttons: 'Aceptar' });
            return;
        }

        var payload = {
            _token:            '{{ csrf_token() }}',
            nombre:            nombre,
            codigo:            $.trim($('#farm_codigo').val()),
            tipo:              $('#farm_tipo').val(),
            id_lugar_atencion: $('#farm_lugar_atencion').val() || null,
            responsable:       $.trim($('#farm_responsable').val()),
            rut_responsable:   $.trim($('#farm_rut_responsable').val()),
            telefono:          $.trim($('#farm_telefono').val()),
            email:             $.trim($('#farm_email').val()),
            direccion:         $.trim($('#farm_direccion').val()),
            id_region:         $('#farm_region').val() || null,
            id_ciudad:         $('#farm_comuna').val() || null,
            dias_atencion:     $('#farm_horario').val() ? $('#farm_horario').val().join(',') : null,
            hora_entrada:      $('#hora_entrada').val() || null,
            hora_salida:       $('#hora_salida').val() || null,
            observaciones:     $.trim($('#farm_observaciones').val()),
        };

        var url, method;
        if (id) {
            url    = '{{ url("direccion/salud/control/farmacia/farmacias") }}/' + id;
            method = 'PUT';
            payload['estado'] = $('#farm_estado').val();
        } else {
            url    = '{{ route("ministerio.farmacias.registrar") }}';
            method = 'POST';
        }

        $.ajax({
            url:      url,
            type:     method,
            data:     payload,
            dataType: 'json',
        })
        .done(function (data) {
            if (data.estado === 1) {
                $('#modal_farmacia').modal('hide');
                swal({ title: 'Éxito', text: data.msj, icon: 'success', timer: 2000, buttons: false });
                farmaciasCache = [];
                cargar_farmacias();
            } else {
                var msgs = '';
                if (data.errores) {
                    $.each(data.errores, function (k, v) { msgs += v[0] + '\n'; });
                } else {
                    msgs = data.msj || 'Error desconocido.';
                }
                swal({ title: 'Error', text: msgs, icon: 'error', buttons: 'Aceptar' });
            }
        })
        .fail(function (xhr) {
            var msgs = 'No se pudo procesar la solicitud.';
            if (xhr.responseJSON && xhr.responseJSON.errores) {
                msgs = '';
                $.each(xhr.responseJSON.errores, function (k, v) { msgs += v[0] + '\n'; });
            }
            swal({ title: 'Error', text: msgs, icon: 'error', buttons: 'Aceptar' });
        });
    }

    function eliminar_farmacia(id, nombre) {
        swal({
            title: 'Eliminar farmacia',
            text:  '¿Está seguro que desea eliminar la farmacia "' + nombre + '"?',
            icon:  'warning',
            buttons: ['Cancelar', 'Eliminar'],
            dangerMode: true,
        }).then(function (confirmar) {
            if (!confirmar) return;
            $.ajax({
                url:      '{{ url("direccion/salud/control/farmacia/farmacias") }}/' + id,
                type:     'DELETE',
                data:     { _token: '{{ csrf_token() }}' },
                dataType: 'json',
            })
            .done(function (data) {
                if (data.estado === 1) {
                    swal({ title: 'Eliminada', text: data.msj, icon: 'success', timer: 1800, buttons: false });
                    farmaciasCache = [];
                    cargar_farmacias();
                } else {
                    swal({ title: 'Error', text: data.msj, icon: 'error', buttons: 'Aceptar' });
                }
            })
            .fail(function () {
                swal({ title: 'Error', text: 'No se pudo eliminar la farmacia.', icon: 'error', buttons: 'Aceptar' });
            });
        });
    }

    /* ============================================================
       CONTROL DE MEDICAMENTOS POR FARMACIA
    ============================================================ */
    var ctrlMedicamentosCache = [];

    function ver_medicamentos_farmacia(index) {
        var f = farmaciasCache[index];
        if (!f) return;

        ctrlMedicamentosCache = [];
        $('#ctrl_farm_nombre').text(f.nombre || '');
        $('#ctrl_buscar').val('');
        $('#ctrl_filtro_stock').val('');
        $('#tbody_ctrl_medicamentos').empty();
        $('#sin_resultados_ctrl').hide();
        $('#contenedor_ctrl_tabla').hide();
        $('#spinner_ctrl').show();
        actualizar_ctrl_contadores();

        $('#modal_medicamentos_farmacia').modal('show');

        $.ajax({
            url: '{{ route("ministerio.control_farmacia.productos") }}',
            type: 'GET',
            data: { buscar: '', tipo: 0, stock_estado: '' },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_ctrl').hide();
            if (data.estado === 1) {
                ctrlMedicamentosCache = $.map(data.productos, function (p) {
                    return $.extend({}, p, { verificado: false });
                });
                renderizar_ctrl_medicamentos(ctrlMedicamentosCache);
                $('#contenedor_ctrl_tabla').show();
                actualizar_ctrl_contadores();
            } else {
                $('#sin_resultados_ctrl').show();
            }
        })
        .fail(function () {
            $('#spinner_ctrl').hide();
            swal({ title: 'Error', text: 'No se pudieron cargar los productos.', icon: 'error', buttons: 'Aceptar' });
        });
    }

    function renderizar_ctrl_medicamentos(lista) {
        var tbody = $('#tbody_ctrl_medicamentos');
        tbody.empty();
        $('#sin_resultados_ctrl').hide();

        if (lista.length === 0) {
            $('#sin_resultados_ctrl').show();
            return;
        }

        $.each(lista, function (i, p) {
            // Buscar índice real en el cache completo para mantener estado verificado
            var idx = ctrlMedicamentosCache.indexOf(p);
            var imageSrc = p.image_path
                ? '/' + p.image_path
                : '{{ asset("images/farmacia/noimage.png") }}';
            var checked    = p.verificado ? ' checked' : '';
            var rowClass   = p.verificado ? 'table-success' : '';

            var fila = '<tr id="ctrl_row_' + idx + '" class="' + rowClass + '">' +
                '<td class="text-center align-middle">' +
                    '<input type="checkbox" class="ctrl-chk" data-idx="' + idx + '"' + checked + ' onchange="toggle_ctrl_medicamento(this)" style="width:18px;height:18px;cursor:pointer;">' +
                '</td>' +
                '<td class="align-middle">' +
                    '<img src="' + imageSrc + '" alt="" style="width:38px;height:38px;object-fit:contain;border-radius:4px;border:1px solid #eee;"' +
                    ' onerror="this.src=\'{{ asset("images/farmacia/noimage.png") }}\'">' +
                '</td>' +
                '<td class="align-middle font-weight-bold">' + (p.nombre || '—') + '</td>' +
                '<td class="align-middle"><small>' + (p.codigo_interno || '—') + '</small></td>' +
                '<td class="align-middle"><small>' + (p.tipo_producto || '—') + '</small></td>' +
                '<td class="align-middle text-center">' + (p.stock_minimo != null ? p.stock_minimo : '—') + '</td>' +
                '<td class="align-middle text-center">' + buildStockActual(p) + '</td>' +
                '<td class="align-middle text-center">' + buildBadgeStock(p) + '</td>' +
                '</tr>';

            tbody.append(fila);
        });
    }

    function toggle_ctrl_medicamento(el) {
        var idx = parseInt($(el).data('idx'));
        ctrlMedicamentosCache[idx].verificado = el.checked;
        var row = $('#ctrl_row_' + idx);
        if (el.checked) {
            row.addClass('table-success');
        } else {
            row.removeClass('table-success');
        }
        actualizar_ctrl_contadores();
    }

    function actualizar_ctrl_contadores() {
        var total       = ctrlMedicamentosCache.length;
        var verificados = 0;
        $.each(ctrlMedicamentosCache, function (i, p) { if (p.verificado) verificados++; });
        var pendientes  = total - verificados;
        var pct         = total > 0 ? Math.round((verificados / total) * 100) : 0;

        $('#ctrl_total').text(total);
        $('#ctrl_verificados').text(verificados);
        $('#ctrl_pendientes').text(pendientes);
        $('#ctrl_progreso').css('width', pct + '%').attr('aria-valuenow', pct).text(pct + '%');
        $('#ctrl_pct_label').text(pct + '%');
        $('#ctrl_resumen_texto').text(verificados + ' de ' + total + ' productos verificados');
    }

    function filtrar_ctrl_medicamentos() {
        var buscar = $('#ctrl_buscar').val().toLowerCase();
        var stockFiltro = $('#ctrl_filtro_stock').val();

        var filtrados = ctrlMedicamentosCache.filter(function (p) {
            var matchBuscar = !buscar ||
                (p.nombre        || '').toLowerCase().indexOf(buscar) !== -1 ||
                (p.codigo_interno || '').toLowerCase().indexOf(buscar) !== -1 ||
                (p.tipo_producto  || '').toLowerCase().indexOf(buscar) !== -1;

            var matchStock = true;
            if (stockFiltro) {
                var actual = parseFloat(p.stock_actual) || 0;
                var minimo = parseFloat(p.stock_minimo) || 0;
                if (stockFiltro === 'critico') matchStock = (actual <= minimo);
                else if (stockFiltro === 'bajo') matchStock = (actual > minimo && actual <= minimo * 1.5);
                else if (stockFiltro === 'normal') matchStock = (actual > minimo * 1.5);
            }

            return matchBuscar && matchStock;
        });

        renderizar_ctrl_medicamentos(filtrados);
    }

    function marcar_todos_ctrl(estado) {
        $.each(ctrlMedicamentosCache, function (i, p) { p.verificado = estado; });
        filtrar_ctrl_medicamentos();   // re-renderiza respetando filtros activos
        actualizar_ctrl_contadores();
    }
</script>

@endsection
