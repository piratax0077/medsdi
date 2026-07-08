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
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Control de Farmacias</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!-- Tabla de farmacias -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h6 class="font-weight-bold text-dark f-20 d-inline">Farmacias disponibles</h6>

                        <button type="button" class="btn btn-info btn-sm float-md-right d-inline" onclick="abrir_modal_farmacia();">
                            <i class="feather icon-plus"></i> Añadir Nueva
                        </button>

                    </div>
                    <div class="card-body">
                        <!-- Filtros Región y Ciudad -->
                        <div class="form-row mb-3 align-items-end">
                            <div class="col-12">
                                <div class="card-lineal">
                                    <div class="card-body-lineal">
                                        <div class="form-row">
                                            <div class="form-group col-md-5 mb-2">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select class="form-control form-control-sm" id="filtro_region_farm" onchange="filtro_buscar_ciudad()">
                                                    <option value="">Todas</option>
                                                    @foreach($regiones as $region)
                                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5 mb-2">
                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                <select class="form-control form-control-sm" id="filtro_ciudad_farm">
                                                    <option value="">Todas</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2 mb-2">
                                                <button class="btn btn-primary-light-c btn-sm btn-block" onclick="cargar_farmacias()">
                                                    <i class="feather icon-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Spinner carga -->
                        <div id="spinner_farmacias" class="text-center py-4" style="display:none;">
                            <div class="spinner-border text-info" role="status"><span class="sr-only">Cargando...</span></div>
                            <p class="mt-2 text-muted small">Cargando farmacias...</p>
                        </div>
                        <!-- Tabla -->
                        <div class="table-responsive" id="contenedor_tabla_farmacias">
                            <table id="tabla_farmacias" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Responsable</th>
                                        <th>Teléfono</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_farmacias"></tbody>
                            </table>
                        </div>
                        <!-- Sin resultados -->
                        <div id="sin_resultados_farmacias" class="text-center py-4" style="display:none;">
                            <i class="feather icon-home" style="font-size:2.5rem;color:#ccc;"></i>
                            <p class="mt-2 text-muted">No hay farmacias registradas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario de datos de la reunión -->
        <div class="row" id="card_datos_reunion">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h6 class="font-weight-bold text-dark f-20">
                            Datos de la Reunión
                            <span id="reunion_farm_nombre_titulo" class="font-weight-normal"></span>
                            <small id="reunion_aviso" class="ml-2 font-italic" style="font-size:.85rem;opacity:.85;">
                                — Conecte con una farmacia para completar este formulario
                            </small>
                        </h6>
                    </div>
                    <div class="card-body" id="reunion_campos_wrapper">
                        <div class="form-row">
                            <input type="hidden" id="reunion_id_farmacia">
                            <div class="form-group col-sm-12 col-md-3">
                                <label class="floating-label-activo-sm">Farmacia</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_farmacia" readonly disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-2">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_fecha" readonly disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-2">
                                <label class="floating-label-activo-sm">Hora inicio</label>
                                <input type="time" class="form-control form-control-sm" id="reunion_hora_inicio" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-2">
                                <label class="floating-label-activo-sm">Hora término</label>
                                <input type="time" class="form-control form-control-sm" id="reunion_hora_termino" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label class="floating-label-activo-sm">Tipo de reunión</label>
                                <select class="form-control form-control-sm select2" id="reunion_tipo" disabled>
                                    <option value="control_stock">Control de stock</option>
                                    <option value="control_vencimientos">Control de vencimientos</option>
                                    <option value="fiscalizacion">Fiscalización</option>
                                    <option value="coordinacion">Coordinación</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 mb-2">
                                <label class="floating-label-activo-sm">Responsable farmacia (participante)</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_responsable"
                                    placeholder="Nombre del farmacéutico o encargado" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label class="floating-label-activo-sm">Enlace de la sesión</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_link" readonly disabled
                                    style="font-size:.75rem;background:#f8f9fa;">
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label class="floating-label-activo-sm">Estado de la reunión</label>
                                <select class="form-control form-control-sm" id="reunion_estado" disabled>
                                    <option value="en_curso">En curso</option>
                                    <option value="finalizada">Finalizada</option>
                                    <option value="cancelada">Cancelada</option>
                                    <option value="pendiente">Pendiente</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="floating-label-activo-sm">Acta / Observaciones de la reunión</label>
                                <textarea class="form-control form-control-sm" id="reunion_acta" rows="1"
                                    onfocus="this.rows=4" onblur="this.rows=1;"
                                    placeholder="Resumen de lo tratado, acuerdos, observaciones..." disabled></textarea>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-sm btn-outline-secondary mr-2" id="btn_limpiar_reunion"
                                    onclick="limpiar_datos_reunion()" disabled>
                                    <i class="feather icon-x"></i> Limpiar
                                </button>
                                <button type="button" class="btn btn-sm btn-info" id="btn_guardar_reunion"
                                    onclick="guardar_datos_reunion()" disabled>
                                    <i class="feather icon-save"></i> Guardar acta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: Sesión con Farmacia (Jitsi + Checklist Medicamentos) -->
        <div class="modal fade" id="modal_sesion_farmacia" tabindex="-1" role="dialog" aria-labelledby="modal_sesion_farmaciaLabel">
            <div class="modal-dialog modal-xl" role="document" style="max-width:95vw;">
                <div class="modal-content">
                    <div class="modal-header bg-primary border-bottom">
                        <h5 class="modal-title text-white font-weight-bold" id="modal_sesion_farmaciaLabel">
                             Sesión con Farmacia &mdash; <span id="sesion_farm_nombre"></span>
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-2">
                        <div class="row" style="min-height:540px;">

                            <!-- Columna izquierda: Videollamada Jitsi -->
                            <div class="col-md-6 d-flex flex-column" style="border-right:1px solid #dee2e6;">
                                <!--<h6 class="font-weight-bold text-c-blue mb-2 f-16">
                                    <i class="feather icon-video"></i> Videollamada
                                </h6>-->

                                <!-- Enlace para la farmacia -->
                                <div class="card-lineal  mb-3">
                                    <div class="card-header-lineal">
                                         <i class="feather icon-video"></i> Videollamada
                                    </div>
                                    <div class="card-body-lineal p-2">
                                        <p class="mb-1 text-dark" style="font-size:.78rem;">
                                            <i class="feather icon-link"></i>
                                            <strong>Envía este enlace al farmacéutico para que se una a la llamada</strong>
                                        </p>
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="sesion_jitsi_link" class="form-control form-control-sm" readonly
                                                style="font-size:.75rem;background:#f8f9fa;">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary btn-sm" type="button"
                                                    onclick="sesion_copiar_link()" title="Copiar enlace">
                                                    <i class="feather icon-copy"></i>
                                                </button>
                                                <button class="btn btn-outline-success btn-sm" type="button"
                                                    onclick="sesion_compartir_whatsapp()" title="Enviar por WhatsApp">
                                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                                </button>
                                            </div>
                                        </div>
                                        <small class="text-c-blue d-block mt-1">
                                            <i class="feather icon-alert-triangle"></i>
                                            El farmacéutico debe abrir el enlace directamente en su navegador.
                                        </small>
                                    </div>
                                </div>

                                <div id="jitsi_container" style="width:100%;flex:1;min-height:440px;background:#000;border-radius:6px;overflow:hidden;"></div>
                            </div>

                            <!-- Columna derecha: Checklist de medicamentos -->
                            <div class="col-md-6 d-flex flex-column">
                                <h6 class="font-weight-bold text-dark f-18 mb-3 mt-3">
                                     Control de Medicamentos
                                </h6>

                                <!-- Tarjetas resumen -->
                                <div class="row mb-2">
                                    <div class="col-4 mb-1">
                                        <div class="card-lineal text-center py-3 border-purple">
                                            <div class="card-body p-1">
                                                <h5 class="font-weight-bold text-purple mb-0 f-20" id="sesion_ctrl_total">0</h5>
                                                <h6 class="text-purple" style="font-size:.8rem;">Total</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-1">
                                        <div class="card-lineal text-center py-3 border-success">
                                            <div class="card-body p-1">
                                                <h5 class="font-weight-bold text-success mb-0 f-20" id="sesion_ctrl_verificados">0</h5>
                                                <h6 class="text-success" style="font-size:.8rem;">Verificados</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-1">
                                        <div class="card-lineal text-center py-3 border-warning">
                                            <div class="card-body p-1">
                                                <h5 class="font-weight-bold text-warning mb-0 f-20" id="sesion_ctrl_pendientes">0</h5>
                                                <h6 class="text-warning" style="font-size:.8rem;">Pendientes</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Barra de progreso -->
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Progreso</small>
                                        <small class="text-muted" id="sesion_ctrl_pct_label">0%</small>
                                    </div>
                                    <div class="progress" style="height:14px;">
                                        <div class="progress-bar bg-success" id="sesion_ctrl_progreso" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                </div>

                                <!-- Filtros + acciones marca -->
                                <div class="row mb-2 align-items-center">
                                    <div class="col-7 pr-1">
                                        <input type="text" class="form-control form-control-sm" id="sesion_ctrl_buscar"
                                            placeholder="Buscar medicamento..."
                                            oninput="sesion_filtrar_medicamentos()">
                                    </div>
                                    <div class="col-5 pl-1 text-right">
                                        <button class="btn btn-xs btn-outline-success mr-1" onclick="sesion_marcar_todos(true)" title="Marcar todos">
                                            <i class="feather icon-check-square"></i> Todos
                                        </button>
                                        <button class="btn btn-xs btn-outline-secondary" onclick="sesion_marcar_todos(false)" title="Desmarcar todos">
                                            <i class="feather icon-square"></i> Ninguno
                                        </button>
                                    </div>
                                </div>

                                <!-- Spinner -->
                                <div id="sesion_spinner_ctrl" class="text-center py-3" style="display:none;">
                                    <div class="spinner-border text-success" role="status"><span class="sr-only">Cargando...</span></div>
                                    <p class="mt-2 text-muted small">Cargando medicamentos...</p>
                                </div>

                                <!-- Tabla de medicamentos -->
                                <div class="table-responsive" id="sesion_contenedor_ctrl_tabla" style="display:none;max-height:310px;overflow-y:auto;">
                                    <table class="table table-sm mb-0" id="sesion_tabla_ctrl">
                                        <thead class="thead-light" style="position:sticky;top:0;">
                                            <tr>
                                                <th style="width:36px;" class="text-center">
                                                    <i class="feather icon-check" title="Verificado"></i>
                                                </th>
                                                <th>Nombre</th>
                                                <th>Código</th>
                                                <th class="text-center">Stock</th>
                                                <th class="text-center">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sesion_tbody_ctrl"></tbody>
                                    </table>
                                </div>

                                <!-- Sin resultados -->
                                <div id="sesion_sin_resultados_ctrl" class="text-center py-3" style="display:none;">
                                    <i class="feather icon-package" style="font-size:2rem;color:#ccc;"></i>
                                    <p class="text-muted mt-1 small">No se encontraron medicamentos.</p>
                                </div>
                            </div>

                        </div><!-- /.row -->
                    </div>
                    <div class="modal-footer">
                        <small class="text-muted mr-auto" id="sesion_ctrl_resumen_texto">— de — productos verificados</small>
                        <button type="button" class="btn btn-info btn-sm" onclick="generar_informe()"><i class="feather icon-check"></i> Generar informe</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="feather icon-power"></i> Cerrar sesión
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===== Modal Farmacia (Registrar / Editar) ===== -->
        <div class="modal fade" id="modal_farmacia" tabindex="-1" role="dialog" aria-labelledby="modal_farmaciaLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white font-weight-bold" id="modal_farmaciaLabel">
                            <span id="modal_farmacia_titulo">Nueva Farmacia</span>
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="farm_id" value="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="farm_nombre" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Código interno</label>
                                <input type="text" class="form-control form-control-sm" id="farm_codigo" maxlength="50">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select class="form-control form-control-sm" id="farm_tipo">
                                    <option value="">Seleccione</option>
                                    <option value="hospitalaria">Hospitalaria</option>
                                    <option value="comunitaria">Comunitaria</option>
                                    <option value="dispensario">Dispensario</option>
                                    <option value="otra">Otra</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Lugar de Atención</label>
                                <select class="form-control form-control-sm" id="farm_lugar_atencion">
                                    <option value="">Sin vincular</option>
                                    @foreach($lugares_atencion as $lugar)
                                        <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Responsable</label>
                                <input type="text" class="form-control form-control-sm" id="farm_responsable" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">RUT Responsable</label>
                                <input type="text" class="form-control form-control-sm" id="farm_rut_responsable" maxlength="12" placeholder="12.345.678-9">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input type="text" class="form-control form-control-sm" id="farm_telefono" maxlength="20">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input type="email" class="form-control form-control-sm" id="farm_email" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" id="farm_region" onchange="buscar_ciudad()">
                                    <option value="">Seleccione</option>
                                    @foreach($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm" id="farm_comuna">
                                    <option value="">Seleccione región primero</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Dirección</label>
                                <input type="text" class="form-control form-control-sm" id="farm_direccion" maxlength="255">
                            </div>
                            <div class="form-group col-md-12">
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
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Hora entrada</label>
                                <input type="time" class="form-control form-control-sm" id="hora_entrada" name="hora_entrada" value="08:00">
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Hora salida</label>
                                <input type="time" class="form-control form-control-sm" id="hora_salida" name="hora_salida" value="19:00">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" id="farm_observaciones" rows="2"></textarea>
                            </div>

                            <!-- Estado (solo en edición) -->
                            <div class="form-group col-md-12" id="farm_estado_row" style="display:none;">
                                <label class="floating-label-activo-sm">Estado</label>
                                <select class="form-control form-control-sm" id="farm_estado">
                                    <option value="1">Activa</option>
                                    <option value="0">Inactiva</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="guardar_farmacia();">
                            <i class="feather icon-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{--  <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-22 d-inline ml-4 my-1 py-1">Control de Farmacias</h4>
                                <!--<button type="button" class="btn btn-success btn-sm d-inline float-right mr-4 my-1" data-toggle="modal" data-target="#agregar_certificado_profesional_ro"> <i class="feather icon-plus"></i> Agregar certificado</button>-->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_certificado_profesional_ro"
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Farmacia Controlada</th>
                                            <th class="text-center align-middle">Controlador</th>
                                            <!--<th class="text-center align-middle">Acción</th>-->
                                            <!--<th class="text-center align-middle">Estado</th>-->
                                            <th class="text-center align-middle">Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ('')
                                            @foreach ($reposo as $rep)
                                                <tr>
                                                    <td class="text-wrap text-center align-middle">{{ $rep->created_at }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ $rep->Paciente()->first()->nombres }}<br>
                                                        {{ $rep->Paciente()->first()->rut }}
                                                    </td>
                                                    <td class="align-middle text-center">Certificado Reposo</td>
                                                    <!--
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">Enviado</td>
                                                    -->
                                                    <td class="align-middle text-center"> <div onclick="ver_pdf_certificado_reposo('{{ $rep->id_ficha_atencion }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </div></td>
                                                    <!--
                                                    <td class="align-middle text-center"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver</a></td>-->
                                                </tr>
                                            @endforeach
                                        @endif

                                        @if ('')
                                            @foreach ($interconsulta as $inter)
                                                <tr>
                                                    <td class="text-wrap text-center align-middle">
                                                        {{ $inter->created_at }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ $inter->Paciente()->first()->nombres }}<br>
                                                        {{ $inter->Paciente()->first()->rut }}
                                                    </td>
                                                    <td class="align-middle text-center">Interconsulta</td>
                                                    <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>
                                                <td class="align-middle text-center">Enviado</td>-->
                                                    <td class="align-middle text-center"> <div onclick="ver_pdf_interconsulta('{{ $inter->id }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </div></td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        @if ('')
                                            @foreach ($informesMedicos as $informe)
                                                <tr>
                                                    <td class="text-wrap text-center align-middle">
                                                        {{ $informe->created_at }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ $informe->Paciente()->first()->nombres }}<br>
                                                        {{ $informe->Paciente()->first()->rut }}
                                                    </td>
                                                    <td class="align-middle text-center">Informe Medico</td>
                                                    <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>
                                                <td class="align-middle text-center">Enviado</td>-->
                                                    <td class="align-middle text-center"> <div onclick="ver_pdf_informe_medico('{{ $informe->id_ficha_atencion }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </div></td>
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
        </div>  --}}
    </div>
</div>

<!-- Jitsi Meet External API -->
<script src="https://meet.jit.si/external_api.js"></script>

<script>
    // Filtros dinámicos región/ciudad para la tabla
    function filtro_buscar_ciudad() {
        let region = $('#filtro_region_farm').val();
        let url = "{{ route('profesional.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: { region: region },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                let ciudades = $('#filtro_ciudad_farm');
                ciudades.find('option').remove();
                ciudades.append('<option value="">Todas</option>');
                $(data).each(function(i, v) {
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            } else {
                $('#filtro_ciudad_farm').html('<option value="">Todas</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    // Modificar cargar_farmacias para usar los filtros
    var cargar_farmacias_original = cargar_farmacias;
    cargar_farmacias = function() {
        var region = $('#filtro_region_farm').val();
        var ciudad = $('#filtro_ciudad_farm').val();
        // Si la función original acepta parámetros, pásalos aquí
        cargar_farmacias_original(region, ciudad);
    }


    var farmaciasCache = [];
    var dtFarmacias = null;

    $(document).ready(function() {
        cargar_farmacias();

        // Inicializar Select2 para el select reunion_tipo
        $('#reunion_tipo').select2({
            placeholder: 'Seleccione tipo de reunión',
            allowClear: false,
            width: '100%',
            language: 'es'
        });
        $('#farm_horario').select2({
            width: '100%',
            placeholder: 'Seleccione días de atención'
        });
    });

    /* ============================================================
       CRUD FARMACIAS — carga dinámica
    ============================================================ */
    function cargar_farmacias() {
        $('#spinner_farmacias').show();
        $('#contenedor_tabla_farmacias').hide();
        $('#sin_resultados_farmacias').hide();

        if (dtFarmacias && $.fn.DataTable.isDataTable('#tabla_farmacias')) {
            dtFarmacias.destroy();
            dtFarmacias = null;
        }
        $('#tbody_farmacias').empty();

        var region = $('#filtro_region_farm').val();
        var ciudad = $('#filtro_ciudad_farm').val();
        $.ajax({
            url: '{{ route("ministerio.farmacias.listar") }}',
            type: 'GET',
            data: {
                region: region,
                ciudad: ciudad
            },
            dataType: 'json',
        })
        .done(function (data) {
            console.log('Farmacias obtenidas:', data);
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
                        '<td class="align-middle"><small>' + tipo + '</small></td>' +
                        '<td class="align-middle"><small>' + (f.responsable || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (f.telefono || '—') + '</small></td>' +
                        '<td class="align-middle text-center">' + badgeEstado + '</td>' +
                        '<td class="align-middle text-center">' +
                            '<button class="btn btn-xxs btn-warning-light-c mr-1" onclick="editar_farmacia(' + i + ')" title="Editar">' +
                                '<i class="feather icon-edit-2"></i>' +
                            '</button>' +
                            '<button class="btn btn-xxs btn-primary-light-c" onclick="abrir_sesion_farmacia(' + f.id + ', \'' + (f.nombre || '').replace(/'/g, "\\'" ) + '\')" title="Conectar por videollamada">' +
                                '<i class="feather icon-video"></i> Conectar' +
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
                    columnDefs: [{ orderable: false, targets: [6] }]
                });
            } else {
                $('#sin_resultados_farmacias').show();
            }
        })
        .fail(function () {
            $('#spinner_farmacias').hide();
            $('#contenedor_tabla_farmacias').show();
            swal({ title: 'Error', text: 'No se pudo obtener las farmacias.', icon: 'error', buttons: 'Aceptar' });
        });
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
        if (f.id_region) {
            $('#farm_region').val(f.id_region);
            buscar_ciudad(f.id_ciudad);
        } else {
            $('#farm_region').val('');
            $('#farm_comuna').html('<option value="">Seleccione región primero</option>');
        }
        $('#farm_direccion').val(f.direccion || '');
        var dias = f.dias_atencion ? String(f.dias_atencion).split(',') : [];
        $('#farm_horario').val(dias).trigger('change');
        $('#hora_entrada').val(f.hora_entrada ? f.hora_entrada.substring(0, 5) : '');
        $('#hora_salida').val(f.hora_salida ? f.hora_salida.substring(0, 5) : '');
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

    /* ============================================================
       SESIÓN CON FARMACIA — Jitsi + Checklist Medicamentos
    ============================================================ */
    var sesionJitsiAPI = null;
    var sesionCtrlCache = [];

    function abrir_sesion_farmacia(farmaciaId, farmaciaNombre) {
        // Nombre del modal
        $('#sesion_farm_nombre').text(farmaciaNombre);

        // Limpiar checklist
        sesionCtrlCache = [];
        $('#sesion_tbody_ctrl').empty();
        $('#sesion_sin_resultados_ctrl').hide();
        $('#sesion_contenedor_ctrl_tabla').hide();
        $('#sesion_spinner_ctrl').show();
        $('#sesion_ctrl_buscar').val('');
        sesion_actualizar_contadores();

        // Poblar y habilitar formulario de reunión
        var ahora  = new Date();
        var fecha  = ahora.toLocaleDateString('es-CL', { day:'2-digit', month:'2-digit', year:'numeric' });
        var hora   = ahora.toTimeString().substring(0, 5);
        $('#reunion_farm_nombre_titulo').text('&mdash; ' + farmaciaNombre);
        $('#reunion_id_farmacia').val(farmaciaId);
        $('#reunion_farmacia').val(farmaciaNombre);
        $('#reunion_fecha').val(fecha);
        $('#reunion_hora_inicio').val(hora);
        $('#reunion_hora_termino').val('');
        $('#reunion_tipo').val('control_stock');
        $('#reunion_estado').val('en_curso');
        $('#reunion_responsable').val('');
        $('#reunion_acta').val('');
        // Habilitar todos los campos e indicador
        $('#reunion_campos_wrapper').find('input, select, textarea, button').prop('disabled', false);
        $('#reunion_aviso').hide();
        $('html, body').animate({ scrollTop: $('#card_datos_reunion').offset().top - 20 }, 400);

        // Abrir modal
        $('#modal_sesion_farmacia').modal('show');

        // Iniciar Jitsi cuando el modal termina de abrirse
        $('#modal_sesion_farmacia').one('shown.bs.modal', function () {
            sesion_iniciar_jitsi(farmaciaNombre);
        });

        // Cargar medicamentos
        sesion_cargar_medicamentos();
    }

    function sesion_iniciar_jitsi(farmaciaNombre) {
        // Destruir instancia previa si existe
        if (sesionJitsiAPI) {
            try { sesionJitsiAPI.dispose(); } catch(e) {}
            sesionJitsiAPI = null;
        }

        var container = document.getElementById('jitsi_container');
        container.innerHTML = '';

        // Generar nombre de sala seguro (sin espacios ni caracteres especiales)
        var sala = 'medichile-farmacia-' + farmaciaNombre
            .toLowerCase()
            .replace(/[^a-z0-9]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');

        var domain = 'meet.jit.si';
        var linkFarmacia = 'https://' + domain + '/' + sala;

        // Mostrar enlace para la farmacia
        $('#sesion_jitsi_link').val(linkFarmacia);
        // Sincronizar con formulario de reunión
        reunion_set_link(linkFarmacia);

        var options = {
            roomName: sala,
            width:    '100%',
            height:   440,
            parentNode: container,
            lang: 'es',
            configOverwrite: {
                startWithAudioMuted: false,
                startWithVideoMuted: false,
                disableDeepLinking: true,
            },
            interfaceConfigOverwrite: {
                TOOLBAR_BUTTONS: [
                    'microphone', 'camera', 'closedcaptions', 'desktop',
                    'fullscreen', 'fodeviceselection', 'hangup', 'chat',
                    'raisehand', 'tileview', 'settings',
                ],
                SHOW_JITSI_WATERMARK: false,
                SHOW_WATERMARK_FOR_GUESTS: false,
            },
        };

        try {
            sesionJitsiAPI = new JitsiMeetExternalAPI(domain, options);
        } catch(e) {
            container.innerHTML = '<div class="d-flex align-items-center justify-content-center h-100 text-white"><div class="text-center"><i class="feather icon-wifi-off" style="font-size:3rem;"></i><p class="mt-2">No se pudo iniciar la videollamada.<br><small>Verifique su conexión a internet.</small></p></div></div>';
        }
    }

    function sesion_copiar_link() {
        var input = document.getElementById('sesion_jitsi_link');
        input.select();
        input.setSelectionRange(0, 99999);
        try {
            document.execCommand('copy');
            swal({ title: 'Copiado', text: 'El enlace fue copiado al portapapeles.', icon: 'success', timer: 1500, buttons: false });
        } catch(e) {
            swal({ title: 'Error', text: 'No se pudo copiar el enlace.', icon: 'error', buttons: 'Aceptar' });
        }
    }

    function sesion_compartir_whatsapp() {
        var link  = $('#sesion_jitsi_link').val();
        var nombre = $('#sesion_farm_nombre').text();
        var texto  = encodeURIComponent('Hola, te invito a conectarte a la sesión de control de farmacia Medichile.\n\nFarmacia: ' + nombre + '\nEnlace: ' + link);
        window.open('https://wa.me/?text=' + texto, '_blank');
    }

    // Destruir Jitsi al cerrar el modal
    $('#modal_sesion_farmacia').on('hidden.bs.modal', function () {
        if (sesionJitsiAPI) {
            try { sesionJitsiAPI.dispose(); } catch(e) {}
            sesionJitsiAPI = null;
        }
        document.getElementById('jitsi_container').innerHTML = '';
    });

    /* ---- Carga de medicamentos ---- */
    function sesion_cargar_medicamentos() {
        $.ajax({
            url: '{{ route("ministerio.control_farmacia.productos") }}',
            type: 'GET',
            data: { buscar: '', tipo: 0, stock_estado: '' },
            dataType: 'json',
        })
        .done(function (data) {
            $('#sesion_spinner_ctrl').hide();
            if (data.estado === 1 && data.productos.length > 0) {
                sesionCtrlCache = $.map(data.productos, function (p) {
                    return $.extend({}, p, { verificado: false });
                });
                sesion_renderizar_medicamentos(sesionCtrlCache);
                $('#sesion_contenedor_ctrl_tabla').show();
            } else {
                $('#sesion_sin_resultados_ctrl').show();
            }
            sesion_actualizar_contadores();
        })
        .fail(function () {
            $('#sesion_spinner_ctrl').hide();
            $('#sesion_sin_resultados_ctrl').show();
        });
    }

    function sesion_renderizar_medicamentos(lista) {
        var tbody = $('#sesion_tbody_ctrl');
        tbody.empty();
        $('#sesion_sin_resultados_ctrl').hide();

        if (lista.length === 0) {
            $('#sesion_sin_resultados_ctrl').show();
            return;
        }

        $.each(lista, function (i, p) {
            var idx      = sesionCtrlCache.indexOf(p);
            var checked  = p.verificado ? ' checked' : '';
            var rowClass = p.verificado ? 'table-success' : '';

            var badgeHtml  = sesion_buildBadge(p);
            var stockHtml  = sesion_buildStock(p);

            var fila = '<tr id="sesion_ctrl_row_' + idx + '" class="' + rowClass + '">' +
                '<td class="text-center align-middle">' +
                    '<input type="checkbox" class="sesion-ctrl-chk" data-idx="' + idx + '"' + checked +
                    ' onchange="sesion_toggle_medicamento(this)" style="width:16px;height:16px;cursor:pointer;">' +
                '</td>' +
                '<td class="align-middle font-weight-bold" style="max-width:160px;white-space:normal;">' + (p.nombre || '—') + '</td>' +
                '<td class="align-middle"><small>' + (p.codigo_interno || '—') + '</small></td>' +
                '<td class="align-middle text-center">' + stockHtml + '</td>' +
                '<td class="align-middle text-center">' + badgeHtml + '</td>' +
                '</tr>';

            tbody.append(fila);
        });
    }

    function sesion_toggle_medicamento(el) {
        var idx = parseInt($(el).data('idx'));
        sesionCtrlCache[idx].verificado = el.checked;
        var row = $('#sesion_ctrl_row_' + idx);
        el.checked ? row.addClass('table-success') : row.removeClass('table-success');
        sesion_actualizar_contadores();
    }

    function sesion_actualizar_contadores() {
        var total       = sesionCtrlCache.length;
        var verificados = 0;
        $.each(sesionCtrlCache, function (i, p) { if (p.verificado) verificados++; });
        var pendientes  = total - verificados;
        var pct         = total > 0 ? Math.round((verificados / total) * 100) : 0;

        $('#sesion_ctrl_total').text(total);
        $('#sesion_ctrl_verificados').text(verificados);
        $('#sesion_ctrl_pendientes').text(pendientes);
        $('#sesion_ctrl_progreso').css('width', pct + '%').attr('aria-valuenow', pct).text(pct + '%');
        $('#sesion_ctrl_pct_label').text(pct + '%');
        $('#sesion_ctrl_resumen_texto').text(verificados + ' de ' + total + ' productos verificados');
    }

    function sesion_filtrar_medicamentos() {
        var buscar = $('#sesion_ctrl_buscar').val().toLowerCase();
        var filtrados = sesionCtrlCache.filter(function (p) {
            return !buscar ||
                (p.nombre         || '').toLowerCase().indexOf(buscar) !== -1 ||
                (p.codigo_interno  || '').toLowerCase().indexOf(buscar) !== -1 ||
                (p.tipo_producto   || '').toLowerCase().indexOf(buscar) !== -1;
        });
        sesion_renderizar_medicamentos(filtrados);
    }

    function sesion_marcar_todos(estado) {
        $.each(sesionCtrlCache, function (i, p) { p.verificado = estado; });
        sesion_filtrar_medicamentos();
        sesion_actualizar_contadores();
    }

    function sesion_buildBadge(p) {
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        if (actual <= minimo)          return '<span class="badge badge-danger">Crítico</span>';
        if (actual <= minimo * 1.5)    return '<span class="badge badge-warning">Bajo</span>';
        return '<span class="badge badge-success">Normal</span>';
    }

    function sesion_buildStock(p) {
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        var color = 'text-success';
        if (actual <= minimo)          color = 'text-danger';
        else if (actual <= minimo * 1.5) color = 'text-warning';
        return '<span class="' + color + ' font-weight-bold">' + actual + '</span>';
    }

    /* ============================================================
       FORMULARIO DATOS DE REUNIÓN
    ============================================================ */
    function limpiar_datos_reunion() {
        $('#reunion_responsable').val('');
        $('#reunion_hora_termino').val('');
        $('#reunion_acta').val('');
        $('#reunion_tipo').val('control_stock');
        $('#reunion_estado').val('en_curso');
    }

    function guardar_datos_reunion() {
        var idFarmacia  = $('#reunion_id_farmacia').val();
        var farmacia    = $('#reunion_farmacia').val();
        var fecha       = $('#reunion_fecha').val();
        var horaInicio  = $('#reunion_hora_inicio').val();
        var horaTermino = $('#reunion_hora_termino').val();
        var tipo        = $('#reunion_tipo').val();
        var estado      = $('#reunion_estado').val();
        var responsable = $.trim($('#reunion_responsable').val());
        var acta        = $.trim($('#reunion_acta').val());
        var link        = $('#reunion_link').val();

        if (!acta) {
            swal({ title: 'Campo requerido', text: 'Por favor ingrese el acta u observaciones de la reunión.', icon: 'warning', buttons: 'Aceptar' });
            return;
        }

        /* Construir lista de productos verificados desde el checklist actual */
        var productosVerificados = sesionCtrlCache.map(function(p) {
            return { id: p.id, nombre: p.nombre, verificado: p.verificado };
        });

        /* Convertir fecha de formato dd/mm/yyyy a yyyy-mm-dd para el backend */
        var partes = fecha.split('/');
        var fechaBackend = partes.length === 3 ? partes[2] + '-' + partes[1] + '-' + partes[0] : fecha;

        $.ajax({
            url:      '{{ route("ministerio.control_farmacia.guardar") }}',
            method:   'POST',
            dataType: 'json',
            headers:  { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id_farmacia:           idFarmacia || null,
                farmacia_nombre:       farmacia,
                fecha:                 fechaBackend,
                hora_inicio:           horaInicio,
                hora_termino:          horaTermino,
                tipo:                  tipo,
                estado:                estado,
                responsable:           responsable,
                enlace_jitsi:          link,
                acta:                  acta,
                productos_verificados: JSON.stringify(productosVerificados)
            },
            success: function(resp) {
                if (resp.estado === 'ok') {
                    swal({ title: 'Acta guardada', text: 'Los datos de la reunión con ' + farmacia + ' fueron registrados correctamente. Preparando envío por email...', icon: 'success', timer: 2500, buttons: false });
                    $('#reunion_campos_wrapper').find('input:not([readonly]):not([type=hidden]), select, textarea, button:not(.btn-danger):not(.btn-secondary)').prop('disabled', true);

                    /* Generar y enviar acta por email */
                    generar_y_enviar_acta_pdf(resp);
                } else {
                    swal({ title: 'Error', text: resp.mensaje || 'No se pudo guardar el control.', icon: 'error', buttons: 'Aceptar' });
                }
            },
            error: function(xhr) {
                var msg = xhr.responseJSON && xhr.responseJSON.mensaje ? xhr.responseJSON.mensaje : 'Error al guardar. Verifique los datos.';
                swal({ title: 'Error', text: msg, icon: 'error', buttons: 'Aceptar' });
            }
        });
    }

    /* Actualiza el enlace en el formulario cuando Jitsi lo genera */
    function reunion_set_link(url) {
        $('#reunion_link').val(url);
    }

    function generar_informe() {
        var total       = sesionCtrlCache.length;
        var verificados = sesionCtrlCache.filter(function (p) { return p.verificado; });
        var pendientes  = sesionCtrlCache.filter(function (p) { return !p.verificado; });

        if (total === 0) {
            swal({ title: 'Sin datos', text: 'No hay productos cargados para generar un informe.', icon: 'info', buttons: 'Aceptar' });
            return;
        }

        var farmNombre = $('#sesion_farm_nombre').text();
        var fechaHoy   = new Date().toLocaleDateString('es-CL', { day:'2-digit', month:'long', year:'numeric' });
        var horaHoy    = new Date().toLocaleTimeString('es-CL', { hour:'2-digit', minute:'2-digit' });
        var pct        = total > 0 ? Math.round((verificados.length / total) * 100) : 0;

        function filaProducto(p, estaVerificado) {
            var actual  = parseFloat(p.stock_actual) || 0;
            var minimo  = parseFloat(p.stock_minimo) || 0;
            var estadoTxt, estadoColor;
            if (actual <= minimo)            { estadoTxt = 'Crítico'; estadoColor = '#dc3545'; }
            else if (actual <= minimo * 1.5) { estadoTxt = 'Bajo';    estadoColor = '#fd7e14'; }
            else                             { estadoTxt = 'Normal';  estadoColor = '#28a745'; }

            var bgFila = estaVerificado ? '#f0fff4' : '#fff';
            var icono  = estaVerificado
                ? '<span style="color:#28a745;font-weight:bold;">&#10003;</span>'
                : '<span style="color:#aaa;">&#9744;</span>';

            return '<tr style="background:' + bgFila + ';">' +
                '<td style="text-align:center;">' + icono + '</td>' +
                '<td>' + (p.nombre || '—') + '</td>' +
                '<td style="text-align:center;">' + (p.codigo_interno || '—') + '</td>' +
                '<td style="text-align:center;">' + (p.tipo_producto || '—') + '</td>' +
                '<td style="text-align:center;">' + (p.stock_minimo != null ? p.stock_minimo : '—') + '</td>' +
                '<td style="text-align:center;font-weight:bold;color:' + estadoColor + ';">' + actual + '</td>' +
                '<td style="text-align:center;"><span style="background:' + estadoColor + ';color:#fff;padding:2px 8px;border-radius:4px;font-size:.8rem;">' + estadoTxt + '</span></td>' +
            '</tr>';
        }

        var filasVerif = '';
        $.each(verificados, function (i, p) { filasVerif += filaProducto(p, true); });

        var filasPend = '';
        $.each(pendientes,  function (i, p) { filasPend  += filaProducto(p, false); });

        var html = '<!DOCTYPE html><html lang="es"><head>' +
            '<meta charset="UTF-8">' +
            '<title>Informe Control Farmacia — ' + farmNombre + '</title>' +
            '<style>' +
                'body { font-family: Arial, sans-serif; font-size: 13px; color: #212529; margin: 0; padding: 0; }' +
                '.pagina { padding: 30px 40px; }' +
                '.encabezado { display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 3px solid #0056b3; padding-bottom: 14px; margin-bottom: 20px; }' +
                '.encabezado h2 { margin: 0; color: #0056b3; font-size: 1.25rem; }' +
                '.encabezado small { color: #6c757d; font-size: .78rem; }' +
                '.logo-texto { font-size: 1.5rem; font-weight: bold; color: #0056b3; letter-spacing: 1px; }' +
                '.resumen-cards { display: flex; gap: 12px; margin-bottom: 20px; }' +
                '.card-stat { flex: 1; border: 1px solid #dee2e6; border-radius: 6px; padding: 10px 8px; text-align: center; }' +
                '.card-stat .valor { font-size: 2rem; font-weight: bold; line-height: 1; }' +
                '.card-stat .etiq  { font-size: .72rem; color: #6c757d; }' +
                '.progreso-bar { height: 14px; background: #e9ecef; border-radius: 8px; overflow: hidden; margin-bottom: 20px; }' +
                '.progreso-bar .fill { height: 100%; background: #28a745; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: .7rem; font-weight: bold; }' +
                'table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }' +
                'thead th { background: #0056b3; color: #fff; padding: 7px 10px; font-size: .8rem; text-align: left; }' +
                'td { padding: 6px 10px; border-bottom: 1px solid #dee2e6; font-size: .8rem; vertical-align: middle; }' +
                'tr:last-child td { border-bottom: none; }' +
                'h5.seccion { border-left: 4px solid #0056b3; padding-left: 8px; margin-bottom: 8px; font-size: .95rem; }' +
                '.pie-pagina { border-top: 1px solid #dee2e6; padding-top: 10px; margin-top: 10px; font-size: .72rem; color: #aaa; display: flex; justify-content: space-between; }' +
                /* Barra de acciones (solo pantalla, no imprime) */
                '.barra-acciones { background: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 10px 40px; display: flex; gap: 10px; align-items: center; position: sticky; top: 0; z-index: 10; }' +
                '.btn-impr { background: #0056b3; color: #fff; border: none; padding: 7px 20px; border-radius: 4px; cursor: pointer; font-size: .88rem; font-weight: bold; }' +
                '.btn-impr:hover { background: #003d82; }' +
                '.btn-cerrar { background: #6c757d; color: #fff; border: none; padding: 7px 16px; border-radius: 4px; cursor: pointer; font-size: .88rem; }' +
                '@media print {' +
                    '.barra-acciones { display: none !important; }' +
                    'body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }' +
                '}' +
            '</style>' +
            '</head><body>' +

            /* Barra de acciones */
            '<div class="barra-acciones">' +
                '<button class="btn-impr" onclick="window.print()">&#128438; Imprimir / Guardar PDF</button>' +
                '<button class="btn-cerrar" onclick="window.close()">&#10005; Cerrar</button>' +
                '<span style="margin-left:auto;font-size:.8rem;color:#6c757d;">Informe generado el ' + fechaHoy + ' a las ' + horaHoy + '</span>' +
            '</div>' +

            '<div class="pagina">' +

                /* Encabezado */
                '<div class="encabezado">' +
                    '<div>' +
                        '<div class="logo-texto">Medichile</div>' +
                        '<small>Sistema de Salud</small>' +
                    '</div>' +
                    '<div style="text-align:right;">' +
                        '<h2>Informe de Control de Farmacia</h2>' +
                        '<small><strong>Farmacia:</strong> ' + farmNombre + '</small><br>' +
                        '<small><strong>Fecha:</strong> ' + fechaHoy + ' &nbsp; <strong>Hora:</strong> ' + horaHoy + '</small>' +
                    '</div>' +
                '</div>' +

                /* Tarjetas resumen */
                '<div class="resumen-cards">' +
                    '<div class="card-stat" style="border-color:#0056b3;"><div class="valor" style="color:#0056b3;">' + total + '</div><div class="etiq">Total productos</div></div>' +
                    '<div class="card-stat" style="border-color:#28a745;"><div class="valor" style="color:#28a745;">' + verificados.length + '</div><div class="etiq">Verificados</div></div>' +
                    '<div class="card-stat" style="border-color:#ffc107;"><div class="valor" style="color:#e0a800;">' + pendientes.length + '</div><div class="etiq">Pendientes</div></div>' +
                    '<div class="card-stat" style="border-color:#6c757d;"><div class="valor" style="color:#6c757d;">' + pct + '%</div><div class="etiq">Completado</div></div>' +
                '</div>' +

                /* Barra progreso */
                '<div class="progreso-bar"><div class="fill" style="width:' + pct + '%;">' + (pct > 8 ? pct + '%' : '') + '</div></div>' +

                /* Tabla verificados */
                (verificados.length > 0 ? (
                    '<h5 class="seccion" style="color:#28a745;">&#10003; Productos Verificados (' + verificados.length + ')</h5>' +
                    '<table><thead><tr><th style="width:32px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasVerif + '</tbody></table>'
                ) : '') +

                /* Tabla pendientes */
                (pendientes.length > 0 ? (
                    '<h5 class="seccion" style="color:#dc3545;">&#9744; Productos Pendientes (' + pendientes.length + ')</h5>' +
                    '<table><thead><tr><th style="width:32px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasPend + '</tbody></table>'
                ) : '') +

                /* Pie de página */
                '<div class="pie-pagina">' +
                    '<span>Medichile — Sistema de Salud</span>' +
                    '<span>Informe generado el ' + fechaHoy + ' a las ' + horaHoy + '</span>' +
                '</div>' +

            '</div>' + /* /.pagina */
            '</body></html>';

        /* Abrir en ventana restaurada (no pestaña, no maximizada) */
        var ancho  = Math.min(1000, screen.availWidth  - 80);
        var alto   = Math.min(780,  screen.availHeight - 80);
        var left   = Math.round((screen.availWidth  - ancho) / 2);
        var top    = Math.round((screen.availHeight - alto)  / 2);

        var win = window.open(
            '',
            'informe_farmacia_' + Date.now(),
            'width=' + ancho + ',height=' + alto + ',left=' + left + ',top=' + top +
            ',resizable=yes,scrollbars=yes,status=no,toolbar=no,menubar=no'
        );
        win.document.open();
        win.document.write(html);
        win.document.close();
        win.focus();
    }

    /* ============================================================
       Generar y Enviar Acta de Reunión por Email
    ============================================================ */
    function generar_y_enviar_acta_pdf(respBackend) {
        var farmacia    = $('#reunion_farmacia').val();
        var fecha       = $('#reunion_fecha').val();
        var horaInicio  = $('#reunion_hora_inicio').val();
        var horaTermino = $('#reunion_hora_termino').val();
        var tipo        = $('#reunion_tipo').val();
        var estado      = $('#reunion_estado').val();
        var responsable = $('#reunion_responsable').val();
        var acta        = $('#reunion_acta').val();
        var link        = $('#reunion_link').val();

        var total       = sesionCtrlCache.length;
        var verificados = sesionCtrlCache.filter(function (p) { return p.verificado; });
        var pendientes  = sesionCtrlCache.filter(function (p) { return !p.verificado; });
        var pct         = total > 0 ? Math.round((verificados.length / total) * 100) : 0;

        var fechaHoy   = new Date().toLocaleDateString('es-CL', { day:'2-digit', month:'long', year:'numeric' });
        var horaHoy    = new Date().toLocaleTimeString('es-CL', { hour:'2-digit', minute:'2-digit' });

        function filaProducto(p, estaVerificado) {
            var actual  = parseFloat(p.stock_actual) || 0;
            var minimo  = parseFloat(p.stock_minimo) || 0;
            var estadoTxt, estadoColor;
            if (actual <= minimo)            { estadoTxt = 'Crítico'; estadoColor = '#dc3545'; }
            else if (actual <= minimo * 1.5) { estadoTxt = 'Bajo';    estadoColor = '#fd7e14'; }
            else                             { estadoTxt = 'Normal';  estadoColor = '#28a745'; }

            var bgFila = estaVerificado ? '#f0fff4' : '#fff';
            var icono  = estaVerificado
                ? '<span style="color:#28a745;font-weight:bold;">&#10003;</span>'
                : '<span style="color:#aaa;">&#9744;</span>';

            return '<tr style="background:' + bgFila + ';">' +
                '<td style="text-align:center;">' + icono + '</td>' +
                '<td>' + (p.nombre || '—') + '</td>' +
                '<td style="text-align:center;">' + (p.codigo_interno || '—') + '</td>' +
                '<td style="text-align:center;">' + (p.tipo_producto || '—') + '</td>' +
                '<td style="text-align:center;">' + (p.stock_minimo != null ? p.stock_minimo : '—') + '</td>' +
                '<td style="text-align:center;font-weight:bold;color:' + estadoColor + ';">' + actual + '</td>' +
                '<td style="text-align:center;"><span style="background:' + estadoColor + ';color:#fff;padding:2px 8px;border-radius:4px;font-size:.8rem;">' + estadoTxt + '</span></td>' +
            '</tr>';
        }

        var tiposReunion = {
            'control_stock': 'Control de Stock',
            'control_vencimientos': 'Control de Vencimientos',
            'fiscalizacion': 'Fiscalización',
            'coordinacion': 'Coordinación',
            'otro': 'Otro'
        };

        var filasVerif = '';
        $.each(verificados, function (i, p) { filasVerif += filaProducto(p, true); });

        var filasPend = '';
        $.each(pendientes,  function (i, p) { filasPend  += filaProducto(p, false); });

        var htmlPdf = '<!DOCTYPE html><html lang="es"><head>' +
            '<meta charset="UTF-8">' +
            '<title>Acta de Reunión — ' + farmacia + '</title>' +
            '<style>' +
                'body { font-family: Arial, sans-serif; font-size: 12px; color: #212529; margin: 0; padding: 0; }' +
                '.pagina { padding: 30px 40px; }' +
                '.encabezado { display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 3px solid #0056b3; padding-bottom: 14px; margin-bottom: 20px; }' +
                '.encabezado h2 { margin: 0; color: #0056b3; font-size: 1.3rem; }' +
                '.encabezado small { color: #6c757d; font-size: .75rem; }' +
                '.logo-texto { font-size: 1.5rem; font-weight: bold; color: #0056b3; letter-spacing: 1px; }' +
                '.datos-reunion { background: #f8f9fa; border: 1px solid #dee2e6; padding: 12px; border-radius: 6px; margin-bottom: 20px; }' +
                '.fila-datos { display: flex; margin-bottom: 8px; font-size: .85rem; }' +
                '.fila-datos strong { width: 180px; color: #0056b3; }' +
                '.acta-contenido { background: #fff; border: 1px solid #dee2e6; padding: 12px; border-radius: 6px; margin-bottom: 20px; line-height: 1.6; white-space: pre-wrap; word-wrap: break-word; }' +
                '.resumen-cards { display: flex; gap: 12px; margin-bottom: 20px; }' +
                '.card-stat { flex: 1; border: 1px solid #dee2e6; border-radius: 6px; padding: 10px 8px; text-align: center; }' +
                '.card-stat .valor { font-size: 1.8rem; font-weight: bold; line-height: 1; }' +
                '.card-stat .etiq  { font-size: .7rem; color: #6c757d; }' +
                '.progreso-bar { height: 12px; background: #e9ecef; border-radius: 8px; overflow: hidden; margin-bottom: 20px; }' +
                '.progreso-bar .fill { height: 100%; background: #28a745; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: .65rem; font-weight: bold; }' +
                'table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }' +
                'thead th { background: #0056b3; color: #fff; padding: 6px 9px; font-size: .75rem; text-align: left; }' +
                'td { padding: 5px 9px; border-bottom: 1px solid #dee2e6; font-size: .75rem; vertical-align: middle; }' +
                'tr:last-child td { border-bottom: none; }' +
                'h5.seccion { border-left: 4px solid #0056b3; padding-left: 8px; margin-bottom: 8px; font-size: .9rem; }' +
                '.pie-pagina { border-top: 1px solid #dee2e6; padding-top: 10px; margin-top: 10px; font-size: .7rem; color: #aaa; display: flex; justify-content: space-between; }' +
            '</style>' +
            '</head><body>' +

            '<div class="pagina">' +

                /* Encabezado */
                '<div class="encabezado">' +
                    '<div>' +
                        '<div class="logo-texto">Medichile</div>' +
                        '<small>Sistema de Salud</small>' +
                    '</div>' +
                    '<div style="text-align:right;">' +
                        '<h2>Acta de Reunión</h2>' +
                        '<small><strong>Farmacia:</strong> ' + farmacia + '</small><br>' +
                        '<small><strong>Generado:</strong> ' + fechaHoy + ' a las ' + horaHoy + '</small>' +
                    '</div>' +
                '</div>' +

                /* Datos de la reunión */
                '<div class="datos-reunion">' +
                    '<strong style="display:block;margin-bottom:10px;color:#0056b3;">Datos de la Reunión</strong>' +
                    '<div class="fila-datos"><strong>Fecha:</strong> <span>' + fecha + '</span></div>' +
                    '<div class="fila-datos"><strong>Hora inicio:</strong> <span>' + horaInicio + '</span></div>' +
                    '<div class="fila-datos"><strong>Hora término:</strong> <span>' + (horaTermino || '—') + '</span></div>' +
                    '<div class="fila-datos"><strong>Tipo:</strong> <span>' + (tiposReunion[tipo] || tipo) + '</span></div>' +
                    '<div class="fila-datos"><strong>Estado:</strong> <span>' + estado + '</span></div>' +
                    '<div class="fila-datos"><strong>Responsable Farmacia:</strong> <span>' + (responsable || '—') + '</span></div>' +
                    '<div class="fila-datos"><strong>Enlace Jitsi:</strong> <span style="font-size:.7rem;word-break:break-all;">' + link + '</span></div>' +
                '</div>' +

                /* Acta/Observaciones */
                '<div>' +
                    '<strong style="display:block;margin-bottom:8px;color:#0056b3;">Acta y Observaciones</strong>' +
                    '<div class="acta-contenido">' + acta + '</div>' +
                '</div>' +

                /* Tarjetas resumen */
                '<strong style="display:block;margin-bottom:10px;margin-top:20px;color:#0056b3;">Resumen de Control de Productos</strong>' +
                '<div class="resumen-cards">' +
                    '<div class="card-stat" style="border-color:#0056b3;"><div class="valor" style="color:#0056b3;">' + total + '</div><div class="etiq">Total</div></div>' +
                    '<div class="card-stat" style="border-color:#28a745;"><div class="valor" style="color:#28a745;">' + verificados.length + '</div><div class="etiq">Verificados</div></div>' +
                    '<div class="card-stat" style="border-color:#ffc107;"><div class="valor" style="color:#e0a800;">' + pendientes.length + '</div><div class="etiq">Pendientes</div></div>' +
                    '<div class="card-stat" style="border-color:#6c757d;"><div class="valor" style="color:#6c757d;">' + pct + '%</div><div class="etiq">Completado</div></div>' +
                '</div>' +

                /* Barra progreso */
                '<div class="progreso-bar"><div class="fill" style="width:' + pct + '%;">' + (pct > 8 ? pct + '%' : '') + '</div></div>' +

                /* Tabla verificados */
                (verificados.length > 0 ? (
                    '<h5 class="seccion" style="color:#28a745;">✓ Productos Verificados (' + verificados.length + ')</h5>' +
                    '<table><thead><tr><th style="width:30px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasVerif + '</tbody></table>'
                ) : '') +

                /* Tabla pendientes */
                (pendientes.length > 0 ? (
                    '<h5 class="seccion" style="color:#dc3545;">✗ Productos Pendientes (' + pendientes.length + ')</h5>' +
                    '<table><thead><tr><th style="width:30px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasPend + '</tbody></table>'
                ) : '') +

                /* Pie de página */
                '<div class="pie-pagina">' +
                    '<span>Medichile — Sistema de Salud</span>' +
                    '<span>Acta generada el ' + fechaHoy + '</span>' +
                '</div>' +

            '</div>' +
            '</body></html>';

        /* Enviar al backend para que lo convierta a PDF y lo envíe por email */
        $.ajax({
            url: '{{ route("ministerio.control_farmacia.enviar_acta_email") }}',
            method: 'POST',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id_control_farmacia: respBackend.id_control_farmacia || null,
                farmacia_nombre: farmacia,
                html_pdf: htmlPdf
            },
            success: function(resp) {
                if (resp.estado === 'ok') {
                    swal({
                        title: 'Acta enviada',
                        text: 'El acta de la reunión ha sido enviada al email de la farmacia.',
                        icon: 'success',
                        timer: 3000,
                        buttons: false
                    });
                } else {
                    console.warn('Email no enviado:', resp.mensaje);
                    /* No mostrar error para no interrumpir el flujo, solo log */
                }
            },
            error: function(xhr) {
                console.error('Error al enviar email:', xhr);
                /* Silenciar errores para no interrumpir flujo principal */
            }
        });
    }

</script>

@endsection
