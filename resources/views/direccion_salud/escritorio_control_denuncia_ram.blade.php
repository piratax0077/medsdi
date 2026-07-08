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
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Control y denuncia RAM</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- ===== TABLA: MEDICAMENTOS ===== -->
            <div class="row m-b-10">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="font-weight-bold text-dark f-20 d-inline">
                                    <i class="feather icon-alert-triangle text-danger"></i> Medicamentos — Registro de Reacciones Adversas (RAM)
                                </div>
                                 <div class="col-6 text-right">
                                    <button class="btn btn-danger btn-sm float-right d-inline" onclick="abrir_modal_nueva_ram('')">
                                        <i class="feather icon-plus-circle"></i> Nueva Denuncia RAM
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-3 align-items-center">
                                <div class="col-md-12">
                                    <div class="card-lineal">
                                        <div class="card-body-lineal">
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="filtro_medicamento"
                                                        placeholder="Buscar medicamento..."
                                                        oninput="cargar_medicamentos()">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary-light-c" type="button" onclick="cargar_medicamentos()">
                                                            <i class="feather icon-search"></i> Buscar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-md-7 text-right">
                                    <button class="btn btn-danger btn-sm" onclick="abrir_modal_nueva_ram('')">
                                        <i class="feather icon-plus-circle"></i> Nueva Denuncia RAM
                                    </button>
                                </div>-->
                            </div>

                            <!-- Spinner -->
                            <div id="spinner_medicamentos" class="text-center py-4" style="display:none;">
                                <div class="spinner-border text-danger" role="status"><span class="sr-only">Cargando...</span></div>
                                <p class="mt-2 text-muted small">Cargando medicamentos...</p>
                            </div>

                            <!-- Tabla medicamentos -->
                            <div class="table-responsive" id="contenedor_tabla_medicamentos" style="display:none;">
                                <table id="tabla_medicamentos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre Medicamento</th>
                                            <th class="text-center">Total Denuncias</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_medicamentos"></tbody>
                                </table>
                            </div>

                            <!-- Sin resultados -->
                            <div id="sin_resultados_medicamentos" class="text-center py-4" style="display:none;">
                                <i class="feather icon-package" style="font-size:2.5rem;color:#ccc;"></i>
                                <p class="mt-2 text-muted">No se encontraron medicamentos registrados.<br>
                                    <a href="javascript:void(0)" onclick="abrir_modal_nueva_ram('')" class="text-danger">
                                        <i class="feather icon-plus-circle"></i> Registrar nueva denuncia RAM
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== TABLA: DENUNCIAS RAM REGISTRADAS ===== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h6 class="font-weight-bold text-dark f-20">
                              Denuncias RAM Registradas
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col-md-3">
                                    <select class="form-control form-control-sm" id="filtro_estado_ram" onchange="cargar_denuncias()">
                                        <option value="">— Todos los estados —</option>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="en_revision">En revisión</option>
                                        <option value="cerrado">Cerrado</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control form-control-sm" id="filtro_gravedad_ram" onchange="cargar_denuncias()">
                                        <option value="">— Todas las gravedades —</option>
                                        <option value="leve">Leve</option>
                                        <option value="moderada">Moderada</option>
                                        <option value="grave">Grave</option>
                                        <option value="mortal">Mortal</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm" id="filtro_medicamento_ram"
                                        placeholder="Filtrar por medicamento..." oninput="cargar_denuncias()">
                                </div>
                            </div>

                            <!-- Spinner denuncias -->
                            <div id="spinner_denuncias" class="text-center py-4" style="display:none;">
                                <div class="spinner-border text-warning" role="status"><span class="sr-only">Cargando...</span></div>
                                <p class="mt-2 text-muted small">Cargando denuncias...</p>
                            </div>

                            <div class="table-responsive" id="contenedor_tabla_denuncias" style="display:none;">
                                <table id="tabla_denuncias" class="display table dt-responsive table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Medicamento</th>
                                            <th>Paciente</th>
                                            <th>Tipo Reacción</th>
                                            <th class="text-center">Gravedad</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_denuncias"></tbody>
                                </table>
                            </div>

                            <div id="sin_resultados_denuncias" class="text-center py-4" style="display:none;">
                                <i class="feather icon-alert-circle" style="font-size:2.5rem;color:#ccc;"></i>
                                <p class="mt-2 text-muted">No hay denuncias RAM registradas.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== Modal: Nueva Denuncia RAM ===== -->
    <div class="modal fade" id="modal_ram" tabindex="-1" role="dialog" aria-labelledby="modal_ramLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white border-bottom">
                    <h5 class="modal-title text-dark font-weight-bold" id="modal_ramLabel">
                        <i class="feather icon-alert-triangle text-danger"></i> Registrar Reacción Adversa a Medicamento (RAM)
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <!-- Medicamento -->
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm font-weight-bold">Nombre del Medicamento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="ram_nombre_medicamento"
                                placeholder="Ej: Amoxicilina 500mg">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Principio Activo</label>
                            <input type="text" class="form-control form-control-sm" id="ram_principio_activo"
                                placeholder="Ej: Amoxicilina">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Laboratorio Fabricante</label>
                            <input type="text" class="form-control form-control-sm" id="ram_laboratorio_fabricante">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Fecha de Reacción</label>
                            <input type="date" class="form-control form-control-sm" id="ram_fecha_reaccion">
                        </div>

                        <div class="col-12"><hr class="mt-3 mb-4"></div>

                        <!-- Paciente -->
                        <div class="form-group col-md-8">
                            <label class="floating-label-activo-sm font-weight-bold">Paciente <span class="text-muted small">(buscar por nombre o RUT)</span></label>
                            <input type="text" class="form-control form-control-sm" id="ram_paciente_buscar"
                                placeholder="Escriba nombre o RUT..."
                                autocomplete="off"
                                oninput="buscar_paciente_ram(this.value)">
                            <input type="hidden" id="ram_id_paciente">
                            <ul id="ram_lista_pacientes" class="list-group mt-1" style="display:none;position:absolute;z-index:9999;max-width:400px;max-height:200px;overflow-y:auto;"></ul>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">RUT Paciente</label>
                            <input type="text" class="form-control form-control-sm" id="ram_paciente_rut" disabled>
                        </div>

                        <div class="col-12"><hr class="mt-3 mb-4"></div>

                        <!-- Reacción -->
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm font-weight-bold">Tipo de Reacción <span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm" id="ram_tipo_reaccion">
                                <option value="">— Seleccione —</option>
                                <option value="alergia">Alergia</option>
                                <option value="intolerancia">Intolerancia</option>
                                <option value="toxicidad">Toxicidad</option>
                                <option value="interaccion">Interacción medicamentosa</option>
                                <option value="efecto_secundario">Efecto secundario</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm font-weight-bold">Gravedad <span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm" id="ram_gravedad">
                                <option value="leve">Leve</option>
                                <option value="moderada">Moderada</option>
                                <option value="grave">Grave</option>
                                <option value="mortal">Mortal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="floating-label-activo-sm font-weight-bold">Acción Tomada</label>
                            <select class="form-control form-control-sm" id="ram_accion_tomada">
                                <option value="">— Seleccione —</option>
                                <option value="suspendido">Medicamento suspendido</option>
                                <option value="disminuido">Dosis disminuida</option>
                                <option value="mantenido">Mantenido con monitoreo</option>
                                <option value="reemplazado">Reemplazado por otro</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class="floating-label-activo-sm font-weight-bold">Descripción de la Reacción <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-sm" id="ram_descripcion_reaccion" rows="3"
                                placeholder="Describa detalladamente la reacción adversa observada..."></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label class="floating-label-activo-sm">Observaciones adicionales</label>
                            <textarea class="form-control form-control-sm" id="ram_observaciones" rows="2"
                                placeholder="Información adicional relevante..."></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-info btn-sm" onclick="guardar_ram()">
                        <i class="feather icon-save"></i> Registrar Denuncia RAM
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Modal: Ver detalle denuncia ===== -->
    <div class="modal fade" id="modal_ver_ram" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-white font-weight-bold">
                        <i class="feather icon-eye"></i> Detalle Denuncia RAM
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body" id="detalle_ram_body"></div>
                <div class="modal-footer">
                    <div class="mr-auto d-flex align-items-center">
                        <label class="mb-0 mr-2 small">Cambiar estado:</label>
                        <select class="form-control form-control-sm" id="detalle_ram_estado" style="width:140px">
                            <option value="pendiente">Pendiente</option>
                            <option value="en_revision">En revisión</option>
                            <option value="cerrado">Cerrado</option>
                        </select>
                        <input type="hidden" id="detalle_ram_id">
                        <button class="btn btn-sm btn-primary ml-2" onclick="actualizar_estado_ram()">
                            <i class="feather icon-check"></i> Actualizar
                        </button>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<script>
    var medicamentosCache = [];
    var dt_medicamentos = null;
    var dt_denuncias = null;
    var buscarPacienteTimer = null;

    $(document).ready(function () {
        cargar_medicamentos();
        cargar_denuncias();
    });

    /* ─── MEDICAMENTOS ─── */
    function cargar_medicamentos() {
        var buscar = $('#filtro_medicamento').val();

        $('#spinner_medicamentos').show();
        $('#contenedor_tabla_medicamentos, #sin_resultados_medicamentos').hide();

        if (dt_medicamentos && $.fn.DataTable.isDataTable('#tabla_medicamentos')) {
            dt_medicamentos.destroy();
            dt_medicamentos = null;
        }
        $('#tbody_medicamentos').empty();

        $.ajax({
            url: '{{ route("ministerio.ram.medicamentos") }}',
            type: 'GET',
            data: { buscar: buscar },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_medicamentos').hide();
            if (!data.estado || data.medicamentos.length === 0) {
                $('#sin_resultados_medicamentos').show();
                return;
            }

            medicamentosCache = data.medicamentos;

            $.each(data.medicamentos, function (i, med) {
                var badgeCount = med.total_denuncias > 0
                    ? '<span class="badge badge-danger ml-1">' + med.total_denuncias + '</span>'
                    : '<span class="badge badge-secondary ml-1">0</span>';

                var fila = '<tr>' +
                    '<td class="align-middle">' + (i + 1) + '</td>' +
                    '<td class="align-middle font-weight-bold">' + (med.nombre || '—') + '</td>' +
                    '<td class="align-middle text-center">' + badgeCount + ' denuncias</td>' +
                    '<td class="align-middle text-center">' +
                    '<button class="btn btn-xxs btn-danger-light-c" title="Registrar RAM" onclick="abrir_modal_nueva_ram(\'' + (med.nombre || '').replace(/'/g, "\\'") + '\')">' +
                    '<i class="feather icon-alert-triangle"></i> Registrar RAM' +
                    '</button>' +
                    '</td>' +
                    '</tr>';
                $('#tbody_medicamentos').append(fila);
            });

            $('#contenedor_tabla_medicamentos').show();
            dt_medicamentos = $('#tabla_medicamentos').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json' },
                pageLength: 10,
                order: [[0, 'asc']],
                columnDefs: [{ targets: [2, 3], orderable: false }]
            });
        })
        .fail(function () {
            $('#spinner_medicamentos').hide();
            $('#sin_resultados_medicamentos').show();
        });
    }

    /* ─── DENUNCIAS ─── */
    function cargar_denuncias() {
        var estado   = $('#filtro_estado_ram').val();
        var gravedad = $('#filtro_gravedad_ram').val();
        var med      = $('#filtro_medicamento_ram').val();

        $('#spinner_denuncias').show();
        $('#contenedor_tabla_denuncias, #sin_resultados_denuncias').hide();

        if (dt_denuncias && $.fn.DataTable.isDataTable('#tabla_denuncias')) {
            dt_denuncias.destroy();
            dt_denuncias = null;
        }
        $('#tbody_denuncias').empty();

        $.ajax({
            url: '{{ route("ministerio.ram.listar") }}',
            type: 'GET',
            data: { estado: estado, gravedad: gravedad, medicamento: med },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_denuncias').hide();
            if (!data.estado || data.denuncias.length === 0) {
                $('#sin_resultados_denuncias').show();
                return;
            }

            $.each(data.denuncias, function (i, d) {
                var badgeGrav = {
                    leve:     '<span class="badge badge-success">Leve</span>',
                    moderada: '<span class="badge badge-warning">Moderada</span>',
                    grave:    '<span class="badge badge-danger">Grave</span>',
                    mortal:   '<span class="badge badge-dark">Mortal</span>',
                }[d.gravedad] || '<span class="badge badge-secondary">' + d.gravedad + '</span>';

                var badgeEstado = {
                    pendiente:   '<span class="badge badge-secondary">Pendiente</span>',
                    en_revision: '<span class="badge badge-info">En revisión</span>',
                    cerrado:     '<span class="badge badge-success">Cerrado</span>',
                }[d.estado] || '<span class="badge badge-light">' + d.estado + '</span>';

                var desc = d.descripcion_reaccion
                    ? (d.descripcion_reaccion.length > 60 ? d.descripcion_reaccion.substring(0, 60) + '...' : d.descripcion_reaccion)
                    : '—';

                var fila = '<tr>' +
                    '<td class="align-middle">' + (i + 1) + '</td>' +
                    '<td class="align-middle font-weight-bold"><small>' + (d.nombre_medicamento || '—') + '</small></td>' +
                    '<td class="align-middle"><small>' + (d.paciente_nombre || '—') + '<br><span class="text-muted">' + (d.paciente_rut || '') + '</span></small></td>' +
                    '<td class="align-middle"><small>' + (d.tipo_reaccion || '—') + '</small></td>' +
                    '<td class="align-middle text-center">' + badgeGrav + '</td>' +
                    '<td class="align-middle"><small>' + (d.fecha_reaccion || '—') + '</small></td>' +
                    '<td class="align-middle"><small>' + desc + '</small></td>' +
                    '<td class="align-middle text-center">' + badgeEstado + '</td>' +
                    '<td class="align-middle text-center">' +
                    '<button class="btn btn-xs btn-outline-secondary" title="Ver detalle" onclick="ver_denuncia(' + JSON.stringify(d).replace(/'/g, "\\'") + ')">' +
                    '<i class="feather icon-eye"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>';
                $('#tbody_denuncias').append(fila);
            });

            $('#contenedor_tabla_denuncias').show();
            dt_denuncias = $('#tabla_denuncias').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json' },
                pageLength: 10,
                columnDefs: [{ targets: [7, 8], orderable: false }]
            });
        })
        .fail(function () {
            $('#spinner_denuncias').hide();
            $('#sin_resultados_denuncias').show();
        });
    }

    /* ─── ABRIR MODAL NUEVA RAM ─── */
    function abrir_modal_nueva_ram(nombre_medicamento) {
        // Limpiar formulario
        $('#ram_nombre_medicamento').val(nombre_medicamento || '');
        $('#ram_principio_activo, #ram_laboratorio_fabricante').val('');
        $('#ram_fecha_reaccion').val(new Date().toISOString().split('T')[0]);
        $('#ram_id_paciente').val('');
        $('#ram_paciente_buscar, #ram_paciente_rut').val('');
        $('#ram_tipo_reaccion').val('');
        $('#ram_gravedad').val('leve');
        $('#ram_accion_tomada').val('');
        $('#ram_descripcion_reaccion, #ram_observaciones').val('');
        $('#ram_lista_pacientes').hide().empty();
        $('#modal_ram').modal('show');
    }

    /* ─── BUSCAR PACIENTE (autocompletado) ─── */
    function buscar_paciente_ram(q) {
        clearTimeout(buscarPacienteTimer);
        if (q.length < 2) {
            $('#ram_lista_pacientes').hide().empty();
            return;
        }
        buscarPacienteTimer = setTimeout(function () {
            $.get('{{ route("ministerio.ram.buscar_paciente") }}', { q: q }, function (data) {
                var $lista = $('#ram_lista_pacientes');
                $lista.empty();
                if (!data || data.length === 0) {
                    $lista.hide();
                    return;
                }
                $.each(data, function (i, p) {
                    $lista.append(
                        '<li class="list-group-item list-group-item-action py-1 px-2" style="cursor:pointer;font-size:0.85rem" ' +
                        'onclick="seleccionar_paciente_ram(' + p.id + ', \'' + p.texto.replace(/'/g, "\\'") + '\')">' +
                        p.texto + '</li>'
                    );
                });
                $lista.show();
            });
        }, 300);
    }

    function seleccionar_paciente_ram(id, texto) {
        $('#ram_id_paciente').val(id);
        $('#ram_paciente_buscar').val(texto);
        // Extraer RUT del formato "Nombre Apellido (RUT)"
        var match = texto.match(/\(([^)]+)\)/);
        if (match) $('#ram_paciente_rut').val(match[1]);
        $('#ram_lista_pacientes').hide().empty();
    }

    // Cerrar lista al hacer click fuera
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#ram_paciente_buscar, #ram_lista_pacientes').length) {
            $('#ram_lista_pacientes').hide();
        }
    });

    /* ─── GUARDAR RAM ─── */
    function guardar_ram() {
        var nombre = $.trim($('#ram_nombre_medicamento').val());
        var desc   = $.trim($('#ram_descripcion_reaccion').val());
        var gravedad = $('#ram_gravedad').val();

        if (!nombre) {
            Swal.fire('Campo requerido', 'Ingrese el nombre del medicamento.', 'warning');
            return;
        }
        if (!desc) {
            Swal.fire('Campo requerido', 'Ingrese la descripción de la reacción.', 'warning');
            return;
        }

        var btn = $('[onclick="guardar_ram()"]').prop('disabled', true).html('<i class="feather icon-loader"></i> Guardando...');

        $.ajax({
            url: '{{ route("ministerio.ram.guardar") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                nombre_medicamento:    nombre,
                principio_activo:      $('#ram_principio_activo').val(),
                laboratorio_fabricante: $('#ram_laboratorio_fabricante').val(),
                id_paciente:           $('#ram_id_paciente').val(),
                tipo_reaccion:         $('#ram_tipo_reaccion').val(),
                gravedad:              gravedad,
                fecha_reaccion:        $('#ram_fecha_reaccion').val(),
                descripcion_reaccion:  desc,
                observaciones:         $('#ram_observaciones').val(),
                accion_tomada:         $('#ram_accion_tomada').val(),
            },
            dataType: 'json',
        })
        .done(function (data) {
            if (data.estado === 1) {
                $('#modal_ram').modal('hide');
                Swal.fire({ icon: 'success', title: 'Registrado', text: data.msj, timer: 2000, showConfirmButton: false });
                cargar_medicamentos();
                cargar_denuncias();
            } else {
                Swal.fire('Error', data.msj || 'No se pudo guardar.', 'error');
            }
        })
        .fail(function (xhr) {
            var errores = xhr.responseJSON && xhr.responseJSON.errores
                ? Object.values(xhr.responseJSON.errores).join('<br>')
                : 'Error al guardar la denuncia.';
            Swal.fire({ icon: 'error', title: 'Error', html: errores });
        })
        .always(function () {
            $('[onclick="guardar_ram()"]').prop('disabled', false).html('<i class="feather icon-save"></i> Registrar Denuncia RAM');
        });
    }

    /* ─── VER DETALLE ─── */
    function ver_denuncia(d) {
        var html = '<dl class="row dl-sm">' +
            '<dt class="col-sm-4">Medicamento</dt><dd class="col-sm-8 font-weight-bold">' + (d.nombre_medicamento || '—') + '</dd>' +
            '<dt class="col-sm-4">Principio Activo</dt><dd class="col-sm-8">' + (d.principio_activo || '—') + '</dd>' +
            '<dt class="col-sm-4">Laboratorio</dt><dd class="col-sm-8">' + (d.laboratorio_fabricante || '—') + '</dd>' +
            '<dt class="col-sm-4">Paciente</dt><dd class="col-sm-8">' + (d.paciente_nombre || '—') + ' <span class="text-muted small">(' + (d.paciente_rut || '') + ')</span></dd>' +
            '<dt class="col-sm-4">Tipo Reacción</dt><dd class="col-sm-8">' + (d.tipo_reaccion || '—') + '</dd>' +
            '<dt class="col-sm-4">Gravedad</dt><dd class="col-sm-8">' + (d.gravedad || '—') + '</dd>' +
            '<dt class="col-sm-4">Fecha Reacción</dt><dd class="col-sm-8">' + (d.fecha_reaccion || '—') + '</dd>' +
            '<dt class="col-sm-4">Acción Tomada</dt><dd class="col-sm-8">' + (d.accion_tomada || '—') + '</dd>' +
            '<dt class="col-sm-4">Descripción</dt><dd class="col-sm-8"><p class="mb-0">' + (d.descripcion_reaccion || '—') + '</p></dd>' +
            '<dt class="col-sm-4">Observaciones</dt><dd class="col-sm-8"><p class="mb-0">' + (d.observaciones || '—') + '</p></dd>' +
            '</dl>';

        $('#detalle_ram_body').html(html);
        $('#detalle_ram_id').val(d.id);
        $('#detalle_ram_estado').val(d.estado);
        $('#modal_ver_ram').modal('show');
    }

    /* ─── ACTUALIZAR ESTADO ─── */
    function actualizar_estado_ram() {
        var id     = $('#detalle_ram_id').val();
        var estado = $('#detalle_ram_estado').val();

        $.ajax({
            url: '/direccion/salud/control/denuncia/ram/' + id,
            type: 'PUT',
            data: { _token: '{{ csrf_token() }}', estado: estado },
            dataType: 'json',
        })
        .done(function (data) {
            if (data.estado === 1) {
                $('#modal_ver_ram').modal('hide');
                Swal.fire({ icon: 'success', title: 'Actualizado', text: data.msj, timer: 1500, showConfirmButton: false });
                cargar_denuncias();
            }
        })
        .fail(function () {
            Swal.fire('Error', 'No se pudo actualizar el estado.', 'error');
        });
    }
</script>

@endsection

