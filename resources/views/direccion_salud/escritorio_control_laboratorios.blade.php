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
                                <li class="breadcrumb-item">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Control de Laboratorios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row m-b-10">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h6 class="font-weight-bold text-dark f-20">
                                Laboratorios registrados
                            </h6>
                        </div>

                        <div class="card-body">
                            <!-- Filtros Región y Ciudad -->
                            <div class="form-row mb-3">
                                <div class="col-12">
                                    <div class="card-lineal">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" id="filtro_region">
                                                        <option value="">Todas</option>
                                                        @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Ciudad</label>
                                                    <select class="form-control form-control-sm" id="filtro_ciudad">
                                                        <option value="">Todas</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" class="form-control" id="filtro_buscar_lab"
                                                            placeholder="Buscar por nombre, RUT o email..."
                                                            oninput="cargar_laboratorios()">
                                                        <div class="input-group-append ml-2">
                                                            <button  class="btn btn-primary-light-c btn-block mr-2" type="button" onclick="cargar_laboratorios()">
                                                                <i class="feather icon-search"></i> Buscar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Spinner -->
                            <div id="spinner_laboratorios" class="text-center py-4" style="display:none;">
                                <div class="spinner-border text-info" role="status"><span class="sr-only">Cargando...</span></div>
                                <p class="mt-2 text-muted small">Cargando laboratorios...</p>
                            </div>

                            <!-- Tabla -->
                            <div class="table-responsive" id="contenedor_tabla_laboratorios" style="display:none;">
                                <table id="tabla_laboratorios" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>RUT</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Ciudad</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_laboratorios"></tbody>
                                </table>
                            </div>

                            <!-- Sin resultados -->
                            <div id="sin_resultados_laboratorios" class="text-center py-4" style="display:none;">
                                <i class="feather icon-activity" style="font-size:2.5rem;color:#ccc;"></i>
                                <p class="mt-2 text-muted">No se encontraron laboratorios.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <!-- Formulario de datos de la reunión -->
        <div class="row" id="card_datos_reunion_lab">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h6 class="font-weight-bold text-dark f-18">
                             Datos de la Reunión
                            <span id="reunion_lab_nombre_titulo" class="font-weight-normal"></span>
                            <small id="reunion_lab_aviso" class="ml-2 font-italic" style="font-size:.79rem;opacity:.85;">
                                — Conecte con un laboratorio para completar este formulario
                            </small>
                        </h6>
                    </div>
                    <div class="card-body" id="reunion_lab_campos_wrapper">
                        <div class="form-row">
                            <input type="hidden" id="reunion_lab_id_laboratorio">
                            <div class="form-group col-sm-12 col-md-3">
                                <label class="floating-label-activo-sm">Laboratorio</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_lab_nombre" readonly disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-2">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_lab_fecha" readonly disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-2">
                                <label class="floating-label-activo-sm">Hora inicio</label>
                                <input type="time" class="form-control form-control-sm" id="reunion_lab_hora_inicio" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-2">
                                <label class="floating-label-activo-sm">Hora término</label>
                                <input type="time" class="form-control form-control-sm" id="reunion_lab_hora_termino" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label class="floating-label-activo-sm">Tipo de reunión</label>
                                <select class="form-control form-control-sm" id="reunion_lab_tipo" disabled>
                                    <option value="control_stock">Control de stock</option>
                                    <option value="control_calidad">Control de calidad</option>
                                    <option value="fiscalizacion">Fiscalización</option>
                                    <option value="coordinacion">Coordinación</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 mb-2">
                                <label class="floating-label-activo-sm">Responsable laboratorio (participante)</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_lab_responsable"
                                    placeholder="Nombre del encargado" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label class="floating-label-activo-sm">Enlace de la sesión</label>
                                <input type="text" class="form-control form-control-sm" id="reunion_lab_link" readonly disabled
                                    style="font-size:.75rem;background:#f8f9fa;">
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label class="floating-label-activo-sm">Estado de la reunión</label>
                                <select class="form-control form-control-sm" id="reunion_lab_estado" disabled>
                                    <option value="en_curso">En curso</option>
                                    <option value="finalizada">Finalizada</option>
                                    <option value="cancelada">Cancelada</option>
                                    <option value="pendiente">Pendiente</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="floating-label-activo-sm">Acta / Observaciones de la reunión</label>
                                <textarea class="form-control form-control-sm" id="reunion_lab_acta" rows="1"
                                    onfocus="this.rows=4" onblur="this.rows=1;"
                                    placeholder="Resumen de lo tratado, acuerdos, observaciones..." disabled></textarea>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-sm btn-outline-secondary mr-2" id="btn_limpiar_reunion_lab"
                                    onclick="limpiar_datos_reunion_lab()" disabled>
                                    <i class="feather icon-x"></i> Limpiar
                                </button>
                                <button type="button" class="btn btn-sm btn-info" id="btn_guardar_reunion_lab"
                                    onclick="guardar_datos_reunion_lab()" disabled>
                                    <i class="feather icon-save"></i> Guardar acta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

    <!-- Modal: Sesión con Laboratorio (Jitsi + Checklist Productos) -->
    <div class="modal fade" id="modal_sesion_laboratorio" tabindex="-1" role="dialog" aria-labelledby="modal_sesion_laboratorioLabel">
        <div class="modal-dialog modal-xl" role="document" style="max-width:95vw;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="modal_sesion_laboratorioLabel">
                        <i class="feather icon-video"></i> Sesión con Laboratorio &mdash; <span id="sesion_lab_nombre"></span>
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-2">
                    <div class="row" style="min-height:540px;">
                        <!-- Columna izquierda: Videollamada Jitsi -->
                        <div class="col-md-6 d-flex flex-column" style="border-right:1px solid #dee2e6;">
                            <h6 class="font-weight-bold text-primary mb-2">
                                <i class="feather icon-video"></i> Videollamada
                            </h6>
                            <div class="card border-info mb-2">
                                <div class="card-body p-2">
                                    <p class="mb-1 text-muted" style="font-size:.78rem;">
                                        <i class="feather icon-link"></i>
                                        <strong>Envía este enlace al laboratorio</strong> para que se una a la llamada:
                                    </p>
                                    <div class="input-group input-group-sm">
                                        <input type="text" id="sesion_lab_jitsi_link" class="form-control form-control-sm" readonly
                                            style="font-size:.75rem;background:#f8f9fa;">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary btn-sm" type="button"
                                                onclick="sesion_lab_copiar_link()" title="Copiar enlace">
                                                <i class="feather icon-copy"></i>
                                            </button>
                                            <button class="btn btn-outline-success btn-sm" type="button"
                                                onclick="sesion_lab_compartir_whatsapp()" title="Enviar por WhatsApp">
                                                <i class="feather icon-message-circle"></i> WhatsApp
                                            </button>
                                        </div>
                                    </div>
                                    <small class="text-warning d-block mt-1">
                                        <i class="feather icon-alert-triangle"></i>
                                        El laboratorio debe abrir el enlace directamente en su navegador.
                                    </small>
                                </div>
                            </div>
                            <div id="jitsi_container_lab" style="width:100%;flex:1;min-height:440px;background:#000;border-radius:6px;overflow:hidden;"></div>
                        </div>
                        <!-- Columna derecha: Checklist de productos -->
                        <div class="col-md-6 d-flex flex-column">
                            <h6 class="font-weight-bold text-success mb-2">
                                <i class="feather icon-clipboard"></i> Control de Productos
                            </h6>
                            <div class="row mb-2">
                                <div class="col-4 mb-1">
                                    <div class="card text-center py-1 border-primary">
                                        <div class="card-body p-1">
                                            <h5 class="font-weight-bold text-primary mb-0" id="sesion_lab_ctrl_total">0</h5>
                                            <small class="text-muted" style="font-size:.7rem;">Total</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 mb-1">
                                    <div class="card text-center py-1 border-success">
                                        <div class="card-body p-1">
                                            <h5 class="font-weight-bold text-success mb-0" id="sesion_lab_ctrl_verificados">0</h5>
                                            <small class="text-muted" style="font-size:.7rem;">Verificados</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 mb-1">
                                    <div class="card text-center py-1 border-warning">
                                        <div class="card-body p-1">
                                            <h5 class="font-weight-bold text-warning mb-0" id="sesion_lab_ctrl_pendientes">0</h5>
                                            <small class="text-muted" style="font-size:.7rem;">Pendientes</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-muted">Progreso</small>
                                    <small class="text-muted" id="sesion_lab_ctrl_pct_label">0%</small>
                                </div>
                                <div class="progress" style="height:14px;">
                                    <div class="progress-bar bg-success" id="sesion_lab_ctrl_progreso" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-7 pr-1">
                                    <input type="text" class="form-control form-control-sm" id="sesion_lab_ctrl_buscar"
                                        placeholder="Buscar producto..."
                                        oninput="sesion_lab_filtrar_productos()">
                                </div>
                                <div class="col-5 pl-1 text-right">
                                    <button class="btn btn-xs btn-outline-success mr-1" onclick="sesion_lab_marcar_todos(true)" title="Marcar todos">
                                        <i class="feather icon-check-square"></i> Todos
                                    </button>
                                    <button class="btn btn-xs btn-outline-secondary" onclick="sesion_lab_marcar_todos(false)" title="Desmarcar todos">
                                        <i class="feather icon-square"></i> Ninguno
                                    </button>
                                </div>
                            </div>
                            <div id="sesion_lab_spinner_ctrl" class="text-center py-3" style="display:none;">
                                <div class="spinner-border text-success" role="status"><span class="sr-only">Cargando...</span></div>
                                <p class="mt-2 text-muted small">Cargando productos...</p>
                            </div>
                            <div class="table-responsive" id="sesion_lab_contenedor_ctrl_tabla" style="display:none;max-height:310px;overflow-y:auto;">
                                <table class="table table-sm table-hover mb-0" id="sesion_lab_tabla_ctrl">
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
                                    <tbody id="sesion_lab_tbody_ctrl"></tbody>
                                </table>
                            </div>
                            <div id="sesion_lab_sin_resultados_ctrl" class="text-center py-3" style="display:none;">
                                <i class="feather icon-package" style="font-size:2rem;color:#ccc;"></i>
                                <p class="text-muted mt-1 small">No se encontraron productos.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <small class="text-muted mr-auto" id="sesion_lab_ctrl_resumen_texto">— de — productos verificados</small>
                    <button type="button" class="btn btn-success btn-sm" onclick="generar_informe_lab()">Generar informe</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar sesión
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Modal Editar Laboratorio ===== -->
    <div class="modal fade" id="modal_laboratorio" tabindex="-1" role="dialog" aria-labelledby="modal_laboratorioLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white border-bottom">
                    <h5 class="modal-title text-dark font-weight-bold" id="modal_laboratorioLabel">
                         Editar Laboratorio
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="lab_id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="lab_nombre" maxlength="255">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">RUT <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="lab_rut" maxlength="20" placeholder="12.345.678-9">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="lab_email" maxlength="255">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="lab_telefono" maxlength="20">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input type="text" class="form-control form-control-sm" id="lab_direccion" maxlength="255">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Número</label>
                            <input type="text" class="form-control form-control-sm" id="lab_numero_dir" maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-info btn-sm" onclick="guardar_laboratorio()">
                        <i class="feather icon-save"></i> Guardar cambios
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- Jitsi Meet External API -->
<script src="https://meet.jit.si/external_api.js"></script>

<script>
    var laboratoriosCache = [];
    var dtLaboratorios = null;

    $(document).ready(function () {
        // Evento para cargar ciudades al cambiar región
        $('#filtro_region').on('change', function() {
            buscar_ciudad_filtro();
        });
        cargar_laboratorios();
    });

    // Nueva función para buscar ciudades en el filtro
    function buscar_ciudad_filtro() {
        let region = $('#filtro_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                let ciudades = $('#filtro_ciudad');
                ciudades.find('option').remove();
                ciudades.append('<option value="">Todas</option>');
                $(data).each(function(i, v) {
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            } else {
                $('#filtro_ciudad').html('<option value="">Todas</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_laboratorios() {
        var buscar = $('#filtro_buscar_lab').val();

        $('#spinner_laboratorios').show();
        $('#contenedor_tabla_laboratorios').hide();
        $('#sin_resultados_laboratorios').hide();

        if (dtLaboratorios && $.fn.DataTable.isDataTable('#tabla_laboratorios')) {
            dtLaboratorios.destroy();
            dtLaboratorios = null;
        }
        $('#tbody_laboratorios').empty();

        $.ajax({
            url: '{{ route("ministerio.laboratorios.listar") }}',
            type: 'GET',
            data: {
                buscar: buscar,
                region: $('#filtro_region').val(),
                ciudad: $('#filtro_ciudad').val()
            },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_laboratorios').hide();

            if (data.estado === 1) {
                laboratoriosCache = data.laboratorios;

                if (data.laboratorios.length === 0) {
                    $('#sin_resultados_laboratorios').show();
                    return;
                }

                $.each(data.laboratorios, function (i, lab) {
                    var direccionCompleta = '';
                    if (lab.direccion) {
                        direccionCompleta = lab.direccion;
                        if (lab.numero_dir) direccionCompleta += ' ' + lab.numero_dir;
                    } else {
                        direccionCompleta = '—';
                    }

                    var fila = '<tr>' +
                        '<td class="align-middle">' + (i + 1) + '</td>' +
                        '<td class="align-middle font-weight-bold">' + (lab.nombre || '—') + '</td>' +
                        '<td class="align-middle"><small>' + (lab.rut || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (lab.email || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (lab.telefono || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + direccionCompleta + '</small></td>' +
                        '<td class="align-middle"><small>' + (lab.ciudad || '—') + '</small></td>' +
                        '<td class="align-middle text-center">' +
                            '<button class="btn btn-xxs btn-warning-light-c mr-1" onclick="editar_laboratorio(' + i + ')" title="Editar">' +
                                '<i class="feather icon-edit-2"></i>' +
                            '</button>' +
                            '<button class="btn btn-xxs btn-primary-light-c" onclick="abrir_sesion_laboratorio(' + lab.id + ', \'' + (lab.nombre || '').replace(/'/g, "\\'" ) + '\')" title="Conectar por videollamada">' +
                                '<i class="feather icon-video"></i> Conectar' +
                            '</button>' +
                        '</td>' +
                        '</tr>';

                    $('#tbody_laboratorios').append(fila);
                });

                $('#contenedor_tabla_laboratorios').show();
                dtLaboratorios = $('#tabla_laboratorios').DataTable({
                    responsive: true,
                    pageLength: 15,
                    language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' },
                    columnDefs: [{ orderable: false, targets: [7] }]
                });
            } else {
                $('#sin_resultados_laboratorios').show();
            }
        })
        .fail(function () {
            $('#spinner_laboratorios').hide();
            swal({ title: 'Error', text: 'No se pudo cargar la lista de laboratorios.', icon: 'error', buttons: 'Aceptar' });
        });
    }

    function editar_laboratorio(index) {
        var lab = laboratoriosCache[index];
        if (!lab) return;

        $('#lab_id').val(lab.id);
        $('#lab_nombre').val(lab.nombre || '');
        $('#lab_rut').val(lab.rut || '');
        $('#lab_email').val(lab.email || '');
        $('#lab_telefono').val(lab.telefono || '');
        $('#lab_direccion').val(lab.direccion || '');
        $('#lab_numero_dir').val(lab.numero_dir || '');
        $('#modal_laboratorio').modal('show');
    }

    function guardar_laboratorio() {
        var id     = $('#lab_id').val();
        var nombre = $.trim($('#lab_nombre').val());
        var rut    = $.trim($('#lab_rut').val());
        var email  = $.trim($('#lab_email').val());
        var tel    = $.trim($('#lab_telefono').val());

        if (!nombre || !rut || !email || !tel) {
            swal({ title: 'Campos requeridos', text: 'Nombre, RUT, email y teléfono son obligatorios.', icon: 'warning', buttons: 'Aceptar' });
            return;
        }

        $.ajax({
            url:      '{{ url("direccion/salud/control/laboratorios") }}/' + id,
            type:     'PUT',
            dataType: 'json',
            data: {
                _token:     '{{ csrf_token() }}',
                nombre:     nombre,
                rut:        rut,
                email:      email,
                telefono:   tel,
                direccion:  $.trim($('#lab_direccion').val()),
                numero_dir: $.trim($('#lab_numero_dir').val()),
            },
        })
        .done(function (data) {
            if (data.estado === 1) {
                $('#modal_laboratorio').modal('hide');
                swal({ title: 'Guardado', text: data.msj, icon: 'success', timer: 2000, buttons: false });
                cargar_laboratorios();
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

    /* ============================================================
       SESIÓN CON LABORATORIO — Jitsi + Checklist Productos
    ============================================================ */
    var sesionLabJitsiAPI = null;
    var sesionLabCtrlCache = [];

    function abrir_sesion_laboratorio(laboratorioId, laboratorioNombre) {
        $('#sesion_lab_nombre').text(laboratorioNombre);

        sesionLabCtrlCache = [];
        $('#sesion_lab_tbody_ctrl').empty();
        $('#sesion_lab_sin_resultados_ctrl').hide();
        $('#sesion_lab_contenedor_ctrl_tabla').hide();
        $('#sesion_lab_spinner_ctrl').show();
        $('#sesion_lab_ctrl_buscar').val('');
        sesion_lab_actualizar_contadores();

        var ahora  = new Date();
        var fecha  = ahora.toLocaleDateString('es-CL', { day:'2-digit', month:'2-digit', year:'numeric' });
        var hora   = ahora.toTimeString().substring(0, 5);
        $('#reunion_lab_nombre_titulo').html('&mdash; ' + laboratorioNombre);
        $('#reunion_lab_id_laboratorio').val(laboratorioId);
        $('#reunion_lab_nombre').val(laboratorioNombre);
        $('#reunion_lab_fecha').val(fecha);
        $('#reunion_lab_hora_inicio').val(hora);
        $('#reunion_lab_hora_termino').val('');
        $('#reunion_lab_tipo').val('control_stock');
        $('#reunion_lab_estado').val('en_curso');
        $('#reunion_lab_responsable').val('');
        $('#reunion_lab_acta').val('');
        $('#reunion_lab_campos_wrapper').find('input, select, textarea, button').prop('disabled', false);
        $('#reunion_lab_aviso').hide();
        $('html, body').animate({ scrollTop: $('#card_datos_reunion_lab').offset().top - 20 }, 400);

        $('#modal_sesion_laboratorio').modal('show');

        $('#modal_sesion_laboratorio').one('shown.bs.modal', function () {
            sesion_lab_iniciar_jitsi(laboratorioNombre);
        });

        sesion_lab_cargar_productos();
    }

    function sesion_lab_iniciar_jitsi(laboratorioNombre) {
        if (sesionLabJitsiAPI) {
            try { sesionLabJitsiAPI.dispose(); } catch(e) {}
            sesionLabJitsiAPI = null;
        }

        var container = document.getElementById('jitsi_container_lab');
        container.innerHTML = '';

        var sala = 'medichile-laboratorio-' + laboratorioNombre
            .toLowerCase()
            .replace(/[^a-z0-9]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');

        var domain = 'meet.jit.si';
        var linkLab = 'https://' + domain + '/' + sala;

        $('#sesion_lab_jitsi_link').val(linkLab);
        reunion_lab_set_link(linkLab);

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
            sesionLabJitsiAPI = new JitsiMeetExternalAPI(domain, options);
        } catch(e) {
            container.innerHTML = '<div class="d-flex align-items-center justify-content-center h-100 text-white"><div class="text-center"><i class="feather icon-wifi-off" style="font-size:3rem;"></i><p class="mt-2">No se pudo iniciar la videollamada.<br><small>Verifique su conexión a internet.</small></p></div></div>';
        }
    }

    function sesion_lab_copiar_link() {
        var input = document.getElementById('sesion_lab_jitsi_link');
        input.select();
        input.setSelectionRange(0, 99999);
        try {
            document.execCommand('copy');
            swal({ title: 'Copiado', text: 'El enlace fue copiado al portapapeles.', icon: 'success', timer: 1500, buttons: false });
        } catch(e) {
            swal({ title: 'Error', text: 'No se pudo copiar el enlace.', icon: 'error', buttons: 'Aceptar' });
        }
    }

    function sesion_lab_compartir_whatsapp() {
        var link   = $('#sesion_lab_jitsi_link').val();
        var nombre = $('#sesion_lab_nombre').text();
        var texto  = encodeURIComponent('Hola, te invito a conectarte a la sesión de control de laboratorio Medichile.\n\nLaboratorio: ' + nombre + '\nEnlace: ' + link);
        window.open('https://wa.me/?text=' + texto, '_blank');
    }

    $('#modal_sesion_laboratorio').on('hidden.bs.modal', function () {
        if (sesionLabJitsiAPI) {
            try { sesionLabJitsiAPI.dispose(); } catch(e) {}
            sesionLabJitsiAPI = null;
        }
        document.getElementById('jitsi_container_lab').innerHTML = '';
    });

    /* ---- Carga de productos ---- */
    function sesion_lab_cargar_productos() {
        $.ajax({
            url: '{{ route("ministerio.control_farmacia.productos") }}',
            type: 'GET',
            data: { buscar: '', tipo: 0, stock_estado: '' },
            dataType: 'json',
        })
        .done(function (data) {
            $('#sesion_lab_spinner_ctrl').hide();
            if (data.estado === 1 && data.productos.length > 0) {
                sesionLabCtrlCache = $.map(data.productos, function (p) {
                    return $.extend({}, p, { verificado: false });
                });
                sesion_lab_renderizar_productos(sesionLabCtrlCache);
                $('#sesion_lab_contenedor_ctrl_tabla').show();
            } else {
                $('#sesion_lab_sin_resultados_ctrl').show();
            }
            sesion_lab_actualizar_contadores();
        })
        .fail(function () {
            $('#sesion_lab_spinner_ctrl').hide();
            $('#sesion_lab_sin_resultados_ctrl').show();
        });
    }

    function sesion_lab_renderizar_productos(lista) {
        var tbody = $('#sesion_lab_tbody_ctrl');
        tbody.empty();
        $('#sesion_lab_sin_resultados_ctrl').hide();

        if (lista.length === 0) {
            $('#sesion_lab_sin_resultados_ctrl').show();
            return;
        }

        $.each(lista, function (i, p) {
            var idx      = sesionLabCtrlCache.indexOf(p);
            var checked  = p.verificado ? ' checked' : '';
            var rowClass = p.verificado ? 'table-success' : '';
            var badgeHtml  = sesion_lab_buildBadge(p);
            var stockHtml  = sesion_lab_buildStock(p);

            var fila = '<tr id="sesion_lab_ctrl_row_' + idx + '" class="' + rowClass + '">' +
                '<td class="text-center align-middle">' +
                    '<input type="checkbox" class="sesion-lab-ctrl-chk" data-idx="' + idx + '"' + checked +
                    ' onchange="sesion_lab_toggle_producto(this)" style="width:16px;height:16px;cursor:pointer;">' +
                '</td>' +
                '<td class="align-middle font-weight-bold" style="max-width:160px;white-space:normal;">' + (p.nombre || '—') + '</td>' +
                '<td class="align-middle"><small>' + (p.codigo_interno || '—') + '</small></td>' +
                '<td class="align-middle text-center">' + stockHtml + '</td>' +
                '<td class="align-middle text-center">' + badgeHtml + '</td>' +
                '</tr>';

            tbody.append(fila);
        });
    }

    function sesion_lab_toggle_producto(el) {
        var idx = parseInt($(el).data('idx'));
        sesionLabCtrlCache[idx].verificado = el.checked;
        var row = $('#sesion_lab_ctrl_row_' + idx);
        el.checked ? row.addClass('table-success') : row.removeClass('table-success');
        sesion_lab_actualizar_contadores();
    }

    function sesion_lab_actualizar_contadores() {
        var total       = sesionLabCtrlCache.length;
        var verificados = 0;
        $.each(sesionLabCtrlCache, function (i, p) { if (p.verificado) verificados++; });
        var pendientes  = total - verificados;
        var pct         = total > 0 ? Math.round((verificados / total) * 100) : 0;

        $('#sesion_lab_ctrl_total').text(total);
        $('#sesion_lab_ctrl_verificados').text(verificados);
        $('#sesion_lab_ctrl_pendientes').text(pendientes);
        $('#sesion_lab_ctrl_progreso').css('width', pct + '%').attr('aria-valuenow', pct).text(pct + '%');
        $('#sesion_lab_ctrl_pct_label').text(pct + '%');
        $('#sesion_lab_ctrl_resumen_texto').text(verificados + ' de ' + total + ' productos verificados');
    }

    function sesion_lab_filtrar_productos() {
        var buscar = $('#sesion_lab_ctrl_buscar').val().toLowerCase();
        var filtrados = sesionLabCtrlCache.filter(function (p) {
            return !buscar ||
                (p.nombre         || '').toLowerCase().indexOf(buscar) !== -1 ||
                (p.codigo_interno  || '').toLowerCase().indexOf(buscar) !== -1 ||
                (p.tipo_producto   || '').toLowerCase().indexOf(buscar) !== -1;
        });
        sesion_lab_renderizar_productos(filtrados);
    }

    function sesion_lab_marcar_todos(estado) {
        $.each(sesionLabCtrlCache, function (i, p) { p.verificado = estado; });
        sesion_lab_filtrar_productos();
        sesion_lab_actualizar_contadores();
    }

    function sesion_lab_buildBadge(p) {
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        if (actual <= minimo)          return '<span class="badge badge-danger">Crítico</span>';
        if (actual <= minimo * 1.5)    return '<span class="badge badge-warning">Bajo</span>';
        return '<span class="badge badge-success">Normal</span>';
    }

    function sesion_lab_buildStock(p) {
        var actual = parseFloat(p.stock_actual) || 0;
        var minimo = parseFloat(p.stock_minimo) || 0;
        var color = 'text-success';
        if (actual <= minimo)          color = 'text-danger';
        else if (actual <= minimo * 1.5) color = 'text-warning';
        return '<span class="' + color + ' font-weight-bold">' + actual + '</span>';
    }

    /* ============================================================
       FORMULARIO DATOS DE REUNIÓN — LABORATORIO
    ============================================================ */
    function limpiar_datos_reunion_lab() {
        $('#reunion_lab_responsable').val('');
        $('#reunion_lab_hora_termino').val('');
        $('#reunion_lab_acta').val('');
        $('#reunion_lab_tipo').val('control_stock');
        $('#reunion_lab_estado').val('en_curso');
    }

    function guardar_datos_reunion_lab() {
        var idLab       = $('#reunion_lab_id_laboratorio').val();
        var labNombre   = $('#reunion_lab_nombre').val();
        var fecha       = $('#reunion_lab_fecha').val();
        var horaInicio  = $('#reunion_lab_hora_inicio').val();
        var horaTermino = $('#reunion_lab_hora_termino').val();
        var tipo        = $('#reunion_lab_tipo').val();
        var estado      = $('#reunion_lab_estado').val();
        var responsable = $.trim($('#reunion_lab_responsable').val());
        var acta        = $.trim($('#reunion_lab_acta').val());
        var link        = $('#reunion_lab_link').val();

        if (!acta) {
            swal({ title: 'Campo requerido', text: 'Por favor ingrese el acta u observaciones de la reunión.', icon: 'warning', buttons: 'Aceptar' });
            return;
        }

        var productosVerificados = sesionLabCtrlCache.map(function(p) {
            return { id: p.id, nombre: p.nombre, verificado: p.verificado };
        });

        var partes = fecha.split('/');
        var fechaBackend = partes.length === 3 ? partes[2] + '-' + partes[1] + '-' + partes[0] : fecha;

        $.ajax({
            url:      '{{ route("ministerio.control_laboratorio.guardar") }}',
            method:   'POST',
            dataType: 'json',
            headers:  { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id_laboratorio:        idLab || null,
                laboratorio_nombre:    labNombre,
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
                    swal({ title: 'Acta guardada', text: 'Los datos de la reunión con ' + labNombre + ' fueron registrados correctamente. Preparando envío por email...', icon: 'success', timer: 2500, buttons: false });
                    $('#reunion_lab_campos_wrapper').find('input:not([readonly]):not([type=hidden]), select, textarea, button:not(.btn-danger):not(.btn-secondary)').prop('disabled', true);
                    generar_y_enviar_acta_pdf_lab(resp);
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

    function reunion_lab_set_link(url) {
        $('#reunion_lab_link').val(url);
    }

    function generar_informe_lab() {
        var total       = sesionLabCtrlCache.length;
        var verificados = sesionLabCtrlCache.filter(function (p) { return p.verificado; });
        var pendientes  = sesionLabCtrlCache.filter(function (p) { return !p.verificado; });

        if (total === 0) {
            swal({ title: 'Sin datos', text: 'No hay productos cargados para generar un informe.', icon: 'info', buttons: 'Aceptar' });
            return;
        }

        var labNombre = $('#sesion_lab_nombre').text();
        var fechaHoy  = new Date().toLocaleDateString('es-CL', { day:'2-digit', month:'long', year:'numeric' });
        var horaHoy   = new Date().toLocaleTimeString('es-CL', { hour:'2-digit', minute:'2-digit' });
        var pct       = total > 0 ? Math.round((verificados.length / total) * 100) : 0;

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
            '<title>Informe Control Laboratorio — ' + labNombre + '</title>' +
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
                '.barra-acciones { background: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 10px 40px; display: flex; gap: 10px; align-items: center; position: sticky; top: 0; z-index: 10; }' +
                '.btn-impr { background: #0056b3; color: #fff; border: none; padding: 7px 20px; border-radius: 4px; cursor: pointer; font-size: .88rem; font-weight: bold; }' +
                '.btn-impr:hover { background: #003d82; }' +
                '.btn-cerrar { background: #6c757d; color: #fff; border: none; padding: 7px 16px; border-radius: 4px; cursor: pointer; font-size: .88rem; }' +
                '@media print { .barra-acciones { display: none !important; } body { -webkit-print-color-adjust: exact; print-color-adjust: exact; } }' +
            '</style></head><body>' +
            '<div class="barra-acciones">' +
                '<button class="btn-impr" onclick="window.print()">&#128438; Imprimir / Guardar PDF</button>' +
                '<button class="btn-cerrar" onclick="window.close()">&#10005; Cerrar</button>' +
                '<span style="margin-left:auto;font-size:.8rem;color:#6c757d;">Informe generado el ' + fechaHoy + ' a las ' + horaHoy + '</span>' +
            '</div>' +
            '<div class="pagina">' +
                '<div class="encabezado">' +
                    '<div><div class="logo-texto">Medichile</div><small>Sistema de Salud</small></div>' +
                    '<div style="text-align:right;">' +
                        '<h2>Informe de Control de Laboratorio</h2>' +
                        '<small><strong>Laboratorio:</strong> ' + labNombre + '</small><br>' +
                        '<small><strong>Fecha:</strong> ' + fechaHoy + ' &nbsp; <strong>Hora:</strong> ' + horaHoy + '</small>' +
                    '</div>' +
                '</div>' +
                '<div class="resumen-cards">' +
                    '<div class="card-stat" style="border-color:#0056b3;"><div class="valor" style="color:#0056b3;">' + total + '</div><div class="etiq">Total productos</div></div>' +
                    '<div class="card-stat" style="border-color:#28a745;"><div class="valor" style="color:#28a745;">' + verificados.length + '</div><div class="etiq">Verificados</div></div>' +
                    '<div class="card-stat" style="border-color:#ffc107;"><div class="valor" style="color:#e0a800;">' + pendientes.length + '</div><div class="etiq">Pendientes</div></div>' +
                    '<div class="card-stat" style="border-color:#6c757d;"><div class="valor" style="color:#6c757d;">' + pct + '%</div><div class="etiq">Completado</div></div>' +
                '</div>' +
                '<div class="progreso-bar"><div class="fill" style="width:' + pct + '%;">' + (pct > 8 ? pct + '%' : '') + '</div></div>' +
                (verificados.length > 0 ? (
                    '<h5 class="seccion" style="color:#28a745;">&#10003; Productos Verificados (' + verificados.length + ')</h5>' +
                    '<table><thead><tr><th style="width:32px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasVerif + '</tbody></table>'
                ) : '') +
                (pendientes.length > 0 ? (
                    '<h5 class="seccion" style="color:#dc3545;">&#9744; Productos Pendientes (' + pendientes.length + ')</h5>' +
                    '<table><thead><tr><th style="width:32px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasPend + '</tbody></table>'
                ) : '') +
                '<div class="pie-pagina"><span>Medichile — Sistema de Salud</span><span>Informe generado el ' + fechaHoy + ' a las ' + horaHoy + '</span></div>' +
            '</div></body></html>';

        var ancho = Math.min(1000, screen.availWidth - 80);
        var alto  = Math.min(780,  screen.availHeight - 80);
        var left  = Math.round((screen.availWidth  - ancho) / 2);
        var top   = Math.round((screen.availHeight - alto)  / 2);
        var win = window.open('', 'informe_laboratorio_' + Date.now(),
            'width=' + ancho + ',height=' + alto + ',left=' + left + ',top=' + top +
            ',resizable=yes,scrollbars=yes,status=no,toolbar=no,menubar=no');
        win.document.open();
        win.document.write(html);
        win.document.close();
        win.focus();
    }

    /* ============================================================
       Generar y Enviar Acta de Reunión por Email — LABORATORIO
    ============================================================ */
    function generar_y_enviar_acta_pdf_lab(respBackend) {
        var labNombre   = $('#reunion_lab_nombre').val();
        var fecha       = $('#reunion_lab_fecha').val();
        var horaInicio  = $('#reunion_lab_hora_inicio').val();
        var horaTermino = $('#reunion_lab_hora_termino').val();
        var tipo        = $('#reunion_lab_tipo').val();
        var estado      = $('#reunion_lab_estado').val();
        var responsable = $('#reunion_lab_responsable').val();
        var acta        = $('#reunion_lab_acta').val();
        var link        = $('#reunion_lab_link').val();

        var total       = sesionLabCtrlCache.length;
        var verificados = sesionLabCtrlCache.filter(function (p) { return p.verificado; });
        var pendientes  = sesionLabCtrlCache.filter(function (p) { return !p.verificado; });
        var pct         = total > 0 ? Math.round((verificados.length / total) * 100) : 0;

        var fechaHoy = new Date().toLocaleDateString('es-CL', { day:'2-digit', month:'long', year:'numeric' });
        var horaHoy  = new Date().toLocaleTimeString('es-CL', { hour:'2-digit', minute:'2-digit' });

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
            'control_calidad': 'Control de Calidad',
            'fiscalizacion': 'Fiscalización',
            'coordinacion': 'Coordinación',
            'otro': 'Otro'
        };

        var filasVerif = '';
        $.each(verificados, function (i, p) { filasVerif += filaProducto(p, true); });
        var filasPend = '';
        $.each(pendientes,  function (i, p) { filasPend  += filaProducto(p, false); });

        var htmlPdf = '<!DOCTYPE html><html lang="es"><head>' +
            '<meta charset="UTF-8"><title>Acta de Reunión — ' + labNombre + '</title>' +
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
            '</style></head><body>' +
            '<div class="pagina">' +
                '<div class="encabezado">' +
                    '<div><div class="logo-texto">Medichile</div><small>Sistema de Salud</small></div>' +
                    '<div style="text-align:right;"><h2>Acta de Reunión — Laboratorio</h2>' +
                        '<small><strong>Laboratorio:</strong> ' + labNombre + '</small><br>' +
                        '<small><strong>Generado:</strong> ' + fechaHoy + ' a las ' + horaHoy + '</small></div>' +
                '</div>' +
                '<div class="datos-reunion">' +
                    '<strong style="display:block;margin-bottom:10px;color:#0056b3;">Datos de la Reunión</strong>' +
                    '<div class="fila-datos"><strong>Fecha:</strong> <span>' + fecha + '</span></div>' +
                    '<div class="fila-datos"><strong>Hora inicio:</strong> <span>' + horaInicio + '</span></div>' +
                    '<div class="fila-datos"><strong>Hora término:</strong> <span>' + (horaTermino || '—') + '</span></div>' +
                    '<div class="fila-datos"><strong>Tipo:</strong> <span>' + (tiposReunion[tipo] || tipo) + '</span></div>' +
                    '<div class="fila-datos"><strong>Estado:</strong> <span>' + estado + '</span></div>' +
                    '<div class="fila-datos"><strong>Responsable Laboratorio:</strong> <span>' + (responsable || '—') + '</span></div>' +
                    '<div class="fila-datos"><strong>Enlace Jitsi:</strong> <span style="font-size:.7rem;word-break:break-all;">' + link + '</span></div>' +
                '</div>' +
                '<div><strong style="display:block;margin-bottom:8px;color:#0056b3;">Acta y Observaciones</strong>' +
                    '<div class="acta-contenido">' + acta + '</div></div>' +
                '<strong style="display:block;margin-bottom:10px;margin-top:20px;color:#0056b3;">Resumen de Control de Productos</strong>' +
                '<div class="resumen-cards">' +
                    '<div class="card-stat" style="border-color:#0056b3;"><div class="valor" style="color:#0056b3;">' + total + '</div><div class="etiq">Total</div></div>' +
                    '<div class="card-stat" style="border-color:#28a745;"><div class="valor" style="color:#28a745;">' + verificados.length + '</div><div class="etiq">Verificados</div></div>' +
                    '<div class="card-stat" style="border-color:#ffc107;"><div class="valor" style="color:#e0a800;">' + pendientes.length + '</div><div class="etiq">Pendientes</div></div>' +
                    '<div class="card-stat" style="border-color:#6c757d;"><div class="valor" style="color:#6c757d;">' + pct + '%</div><div class="etiq">Completado</div></div>' +
                '</div>' +
                '<div class="progreso-bar"><div class="fill" style="width:' + pct + '%;">' + (pct > 8 ? pct + '%' : '') + '</div></div>' +
                (verificados.length > 0 ? (
                    '<h5 class="seccion" style="color:#28a745;">&#10003; Productos Verificados (' + verificados.length + ')</h5>' +
                    '<table><thead><tr><th style="width:30px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasVerif + '</tbody></table>'
                ) : '') +
                (pendientes.length > 0 ? (
                    '<h5 class="seccion" style="color:#dc3545;">&#10007; Productos Pendientes (' + pendientes.length + ')</h5>' +
                    '<table><thead><tr><th style="width:30px;"></th><th>Nombre</th><th>Código</th><th>Tipo</th><th style="text-align:center;">Stock Mín.</th><th style="text-align:center;">Stock Act.</th><th style="text-align:center;">Estado</th></tr></thead>' +
                    '<tbody>' + filasPend + '</tbody></table>'
                ) : '') +
                '<div class="pie-pagina"><span>Medichile — Sistema de Salud</span><span>Acta generada el ' + fechaHoy + '</span></div>' +
            '</div></body></html>';

        $.ajax({
            url: '{{ route("ministerio.control_laboratorio.enviar_acta_email") }}',
            method: 'POST',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id_control_laboratorio: respBackend.id_control_laboratorio || null,
                laboratorio_nombre: labNombre,
                html_pdf: htmlPdf
            },
            success: function(resp) {
                if (resp.estado === 'ok') {
                    swal({ title: 'Acta enviada', text: 'El acta de la reunión ha sido enviada al email del laboratorio.', icon: 'success', timer: 3000, buttons: false });
                } else {
                    console.warn('Email no enviado:', resp.mensaje);
                }
            },
            error: function(xhr) {
                console.error('Error al enviar email:', xhr);
            }
        });
    }
</script>

@endsection

