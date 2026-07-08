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
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Registro nacional de enfermedades crónicas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row m-b-10">

                <div class="col-sm-12">
                    <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                        <li class="nav-item-secciones">
                            <a class="nav-secciones active text-uppercase" id="enfermedades_cronicas_min-tab" data-toggle="tab" href="#enfermedades_cronicas_min" role="tab" aria-controls="enfermedades_cronicas_min" aria-selected="true">Enfermedades Crónicas</a>
                        </li>
                        <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="medicamentos_cronicos_min-tab" data-toggle="tab" href="#medicamentos_cronicos_min" role="tab" aria-controls="medicamentos_cronicos_min" aria-selected="false">Medicamentos Crónicos</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h6 class="font-weight-bold text-dark f-18">
                                Registro nacional de enfermedades crónicas
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="enfermedades_cronicas_min" role="tabpanel" aria-labelledby="enfermedades_cronicas_min-tab">
                                    <!-- Filtros Región y Ciudad -->
                                    <div class="row mb-3">
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
                                        <div class="col-md-5">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" id="filtro_buscar_cronico"
                                                    placeholder="Buscar por nombre, RUT o diagnóstico..."
                                                    oninput="cargar_pacientes_cronicos()">
                                                <div class="input-group-append mr-2">
                                                    <button  class="btn btn-info mr-2" type="button" onclick="cargar_pacientes_cronicos()">
                                                        <i class="feather icon-search"></i> Buscar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Controles de estadísticas -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label class="floating-label-activo-sm">Ver</label>
                                            <select id="modo_vista_cronicos" class="form-control form-control-sm">
                                                <option value="lista">Lista de pacientes</option>
                                                <option value="estadisticas">Estadísticas por patología</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="floating-label-activo-sm">Agrupar por</label>
                                            <select id="agrupar_por_cronicos" class="form-control form-control-sm">
                                                <option value="region">Región</option>
                                                <option value="ciudad">Ciudad</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-end">
                                            <button class="btn btn-sm btn-success" type="button" onclick="cargar_estadisticas_cronicos()">
                                                <i class="feather icon-bar-chart-2"></i> Cargar estadísticas
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Spinner -->
                                    <div id="spinner_cronicos" class="text-center py-4" style="display:none;">
                                        <div class="spinner-border text-info" role="status"><span class="sr-only">Cargando...</span></div>
                                        <p class="mt-2 text-muted small">Cargando pacientes...</p>
                                    </div>

                                    <!-- Tabla -->
                                    <div class="table-responsive" id="contenedor_tabla_cronicos" style="display:none;">
                                        <table id="tabla_cronicos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Procedencia</th>
                                                    <th>RUT</th>
                                                    <th>Edad</th>
                                                    <th>Diagnóstico</th>
                                                    <th>Teléfono</th>
                                                    <th>Ciudad</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_cronicos"></tbody>
                                        </table>
                                    </div>

                                    <!-- Tabla de estadísticas -->
                                    <div class="table-responsive" id="contenedor_estadisticas_cronicos" style="display:none;">
                                        <table id="tabla_estadisticas_cronicos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Patología</th>
                                                    <th>Área</th>
                                                    <th class="text-center">Pacientes</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_estadisticas_cronicos"></tbody>
                                        </table>
                                        <div class="mt-3">
                                            <canvas id="chart_estadisticas_cronicos" style="max-height:400px;"></canvas>
                                        </div>
                                    </div>

                                    <!-- Sin resultados -->
                                    <div id="sin_resultados_cronicos" class="text-center py-4" style="display:none;">
                                        <i class="feather icon-activity" style="font-size:2.5rem;color:#ccc;"></i>
                                        <p class="mt-2 text-muted">No se encontraron pacientes crónicos.</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="medicamentos_cronicos_min" role="tabpanel" aria-labelledby="medicamentos_cronicos_min-tab">
                                    <!-- Filtros Región y Ciudad para Medicamentos -->
                                    <div class="row mb-3">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Región</label>
                                            <select class="form-control form-control-sm" id="filtro_region_medic">
                                                <option value="">Todas</option>
                                                @foreach ($regiones as $region)
                                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Ciudad</label>
                                            <select class="form-control form-control-sm" id="filtro_ciudad_medic">
                                                <option value="">Todas</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" id="filtro_buscar_medic" placeholder="Buscar por medicamento, presentación o paciente..." oninput="cargar_medicamentos_cronicos()">
                                                <div class="input-group-append mr-2">
                                                    <button  class="btn btn-info mr-2" type="button" onclick="cargar_medicamentos_cronicos()">
                                                        <i class="feather icon-search"></i> Buscar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Controles de estadísticas -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label class="floating-label-activo-sm">Ver</label>
                                            <select id="modo_vista_medicamentos" class="form-control form-control-sm">
                                                <option value="lista">Lista de medicamentos</option>
                                                <option value="estadisticas">Estadísticas por medicamento</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="floating-label-activo-sm">Agrupar por</label>
                                            <select id="agrupar_por_medicamentos" class="form-control form-control-sm">
                                                <option value="region">Región</option>
                                                <option value="ciudad">Ciudad</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-end">
                                            <button class="btn btn-sm btn-success" type="button" onclick="cargar_estadisticas_medicamentos()">
                                                <i class="feather icon-bar-chart-2"></i> Cargar estadísticas
                                            </button>
                                        </div>
                                    </div>

                                    <div id="spinner_medicamentos" class="text-center py-4" style="display:none;">
                                        <div class="spinner-border text-info" role="status"><span class="sr-only">Cargando...</span></div>
                                        <p class="mt-2 text-muted small">Cargando medicamentos...</p>
                                    </div>

                                    <div class="table-responsive" id="contenedor_tabla_medicamentos" style="display:none;">
                                        <table id="tabla_medicamentos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Medicamento</th>
                                                    <th>Presentación</th>
                                                    <th>Pacientes</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_medicamentos"></tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive" id="contenedor_estadisticas_medicamentos" style="display:none;">
                                        <table id="tabla_estadisticas_medicamentos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Medicamento</th>
                                                    <th>Área</th>
                                                    <th class="text-center">Suma cant.</th>
                                                    <th class="text-center">Pacientes</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_estadisticas_medicamentos"></tbody>
                                        </table>
                                        <div class="mt-3">
                                            <canvas id="chart_estadisticas_medicamentos" style="max-height:400px;"></canvas>
                                        </div>
                                        <div class="mt-3">
                                            <canvas id="chart_estadisticas_medicamentos_area" style="max-height:400px;"></canvas>
                                        </div>
                                    </div>

                                    <div id="sin_resultados_medicamentos" class="text-center py-4" style="display:block;">
                                        <i class="feather icon-activity" style="font-size:2.5rem;color:#ccc;"></i>
                                        <p class="mt-2 text-muted">No se encontraron medicamentos crónicos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal: detalle paciente crónico -->
    <div id="modal_detalle_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_detalle_paciente_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_detalle_paciente_label">
                        <i class="feather icon-user mr-1"></i> Detalle del paciente
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-bordered mb-0">
                        <tbody>
                            <tr>
                                <th class="bg-light" style="width:35%">Nombre completo</th>
                                <td id="pd_nombre" class="font-weight-bold">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">RUT</th>
                                <td id="pd_rut">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Edad</th>
                                <td id="pd_edad">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Teléfono</th>
                                <td id="pd_telefono">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Email</th>
                                <td id="pd_email">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Ciudad</th>
                                <td id="pd_ciudad">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Procedencia</th>
                                <td id="pd_procedencia">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Diagnóstico</th>
                                <td id="pd_diagnostico" class="font-weight-bold text-danger">—</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: detalle estadística medicamento -->
    <div id="modal_detalle_medicamento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_detalle_medicamento_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_detalle_medicamento_label">
                        <i class="feather icon-package mr-1"></i> Detalle de medicamento
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-bordered mb-0">
                        <tbody>
                            <tr>
                                <th class="bg-light" style="width:45%">Medicamento</th>
                                <td id="md_nombre" class="font-weight-bold">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Área</th>
                                <td id="md_area">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Suma de cantidades</th>
                                <td id="md_suma_cantidad">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Registros</th>
                                <td id="md_registros">—</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Pacientes</th>
                                <td id="md_pacientes">—</td>
                            </tr>
                        </tbody>
                    </table>
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
    var cronicosCache = [];
    var dtCronicos = null;
    var chartCronicos = null;

    // Medicamentos cronicos (placeholder)
    var medicamentosCache = [];
    var medicamentosEstadisticasCache = [];
    var dtMedicamentos = null;
    var chartMedicamentos = null;
    var chartMedicamentosArea = null;

    $(document).ready(function () {
        $('#filtro_region').on('change', function() { buscar_ciudad_filtro(); });
        // bind para filtros de medicamentos
        $('#filtro_region_medic').on('change', function() { buscar_ciudad_filtro('#filtro_region_medic','#filtro_ciudad_medic'); });
        $('#filtro_ciudad').on('change', function() { cargar_pacientes_cronicos(); });
        $('#filtro_ciudad_medic').on('change', function() { cargar_medicamentos_cronicos(); });
        $('#modo_vista_cronicos').on('change', toggle_vista_cronicos);
        $('#modo_vista_medicamentos').on('change', toggle_vista_medicamentos);
        // cargar lista inicial de cronicos
        cargar_pacientes_cronicos();

        // cuando se cambia de tab, cargar contenido correspondiente
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr('href');
            if (target === '#enfermedades_cronicas_min') {
                cargar_pacientes_cronicos();
            } else if (target === '#medicamentos_cronicos_min') {
                cargar_medicamentos_cronicos();
            }
        });
    });

    // buscar ciudades para un selector dado (por defecto usa los de crónicos)
    function buscar_ciudad_filtro(regionSelector, ciudadSelector) {
        regionSelector = regionSelector || '#filtro_region';
        ciudadSelector = ciudadSelector || '#filtro_ciudad';
        let region = $(regionSelector).val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: { region: region },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                let ciudades = $(ciudadSelector);
                ciudades.find('option').remove();
                ciudades.append('<option value="">Todas</option>');
                $(data).each(function(i, v) { ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>'); });
            } else {
                $(ciudadSelector).html('<option value="">Todas</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) { console.log(jqXHR, ajaxOptions, thrownError); });
    }

    function cargar_pacientes_cronicos() {
        var buscar = $('#filtro_buscar_cronico').val();

        $('#spinner_cronicos').show();
        $('#contenedor_tabla_cronicos').hide();
        $('#contenedor_estadisticas_cronicos').hide();
        $('#sin_resultados_cronicos').hide();

        if (dtCronicos && $.fn.DataTable.isDataTable('#tabla_cronicos')) {
            dtCronicos.destroy(); dtCronicos = null;
        }
        $('#tbody_cronicos').empty();

        var payload = {
            buscar: buscar,
            region: $('#filtro_region').val(),
            ciudad: $('#filtro_ciudad').val()
        };

        $.ajax({
            url: '{{ route("ministerio.cronicos.listar") }}',
            type: 'GET',
            data: payload,
            dataType: 'json',
        })
        .done(function (data) {
            console.log('Respuesta cronicos:', data);
            $('#spinner_cronicos').hide();

            if (data.estado === 1) {
                // Aceptar respuestas con clave `pacientes`, `cronicos`, `antecedentes` o `registros`
                cronicosCache = data.pacientes || data.cronicos || data.antecedentes || data.registros || [];

                if (cronicosCache.length === 0) { $('#sin_resultados_cronicos').show(); return; }

                $.each(cronicosCache, function (i, p) {
                    var paciente = p.paciente || p;
                    var edad = p.edad != null ? p.edad : (paciente && paciente.edad) ? paciente.edad : '—';
                    var diagnostico = p.antecedente_data.nombre || p.diagnostico || p.enfermedad_nombre || p.descripcion || '—';
                    var nombrePaciente = (paciente.nombres || paciente.nombre || '') + ' ' + (paciente.apellido_uno || '');

                    var fila = '<tr>' +

                        '<td class="align-middle font-weight-bold">' + (nombrePaciente.trim() || '—') + '</td>' +
                        '<td class="align-middle"><small>' + (paciente.procedencia || 'Interno') + '</small></td>' +
                        '<td class="align-middle"><small>' + (paciente.rut || '—') + '</small></td>' +
                        '<td class="align-middle text-center">' + edad + '</td>' +
                        '<td class="align-middle">' + diagnostico + '</td>' +
                        '<td class="align-middle"><small>' + (paciente.telefono_uno || '—') + '</small></td>' +
                        '<td class="align-middle"><small>' + (paciente.ciudad || '—') + '</small></td>' +
                        '<td class="align-middle text-center">' +
                            '<button class="btn btn-sm btn-info" onclick="ver_paciente(' + i + ')" title="Ver detalle">' +
                                '<i class="feather icon-eye"></i>' +
                            '</button>' +
                        '</td>' +
                        '</tr>';

                    $('#tbody_cronicos').append(fila);
                });

                $('#contenedor_tabla_cronicos').show();
                dtCronicos = $('#tabla_cronicos').DataTable({
                    responsive: true,
                    pageLength: 15,
                    language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' },
                    columnDefs: [{ orderable: false, targets: [7] }]
                });
            } else {
                $('#sin_resultados_cronicos').show();
            }
        })
        .fail(function () {
            $('#spinner_cronicos').hide();
            swal({ title: 'Error', text: 'No se pudo cargar la lista de pacientes.', icon: 'error', buttons: 'Aceptar' });
        });
    }

    function ver_paciente(index) {
        var p = cronicosCache[index]; if (!p) return;
        var paciente  = p.paciente || p;
        var edad      = p.edad != null ? p.edad : (paciente && paciente.edad) ? paciente.edad : '—';
        var diagnostico = (p.antecedente_data && p.antecedente_data.nombre)
                          ? p.antecedente_data.nombre
                          : (p.diagnostico || p.enfermedad_nombre || p.descripcion || '—');
        var nombre    = ((paciente.nombres || paciente.nombre || '') + ' ' + (paciente.apellido_uno || '') + ' ' + (paciente.apellido_dos || '')).trim() || '—';

        $('#pd_nombre').text(nombre);
        $('#pd_rut').text(paciente.rut || '—');
        $('#pd_edad').text(edad);
        $('#pd_telefono').text(paciente.telefono_uno || '—');
        $('#pd_ciudad').text(paciente.ciudad || '—');
        $('#pd_procedencia').text(paciente.procedencia || 'Interno');
        $('#pd_diagnostico').text(diagnostico);
        $('#pd_email').text(paciente.email || '—');
        $('#modal_detalle_paciente').modal('show');
    }

    function toggle_vista_cronicos() {
        var modo = $('#modo_vista_cronicos').val();
        if (modo === 'estadisticas') {
            $('#contenedor_tabla_cronicos').hide();
            $('#sin_resultados_cronicos').hide();
            cargar_estadisticas_cronicos();
        } else {
            $('#contenedor_estadisticas_cronicos').hide();
            cargar_pacientes_cronicos();
        }
    }

        /* Medicamentos crónicos: implementación de filtros y carga */
        function cargar_medicamentos_cronicos() {
            var buscar = $('#filtro_buscar_medic').val();

            $('#spinner_medicamentos').show();
            $('#contenedor_tabla_medicamentos').hide();
            $('#contenedor_estadisticas_medicamentos').hide();
            $('#sin_resultados_medicamentos').hide();

            if (dtMedicamentos && $.fn.DataTable.isDataTable('#tabla_medicamentos')) {
                dtMedicamentos.destroy(); dtMedicamentos = null;
            }
            $('#tbody_medicamentos').empty();

            var payload = {
                buscar: buscar,
                region: $('#filtro_region_medic').val(),
                ciudad: $('#filtro_ciudad_medic').val()
            };

            $.ajax({
                url: '{{ route("ministerio.medicamentos.listar") }}',
                type: 'GET',
                data: payload,
                dataType: 'json'
            })
            .done(function(data) {
                console.log('Respuesta medicamentos:', data);
                $('#spinner_medicamentos').hide();

                if (data.estado === 1) {
                    medicamentosCache = data.medicamentos || data.registros || data.lista || [];
                    if (medicamentosCache.length === 0) { $('#sin_resultados_medicamentos').show(); return; }

                    $.each(medicamentosCache, function(i, m) {
                        var nombre = m.nombre || m.medicamento_nombre || m.nombre_medicamento || '—';
                        var presentacion = m.presentacion || m.forma || '—';
                        var pacientes = m.pacientes || m.cantidad || m.total_pacientes || 0;

                        var fila = '<tr>' +
                            '<td class="align-middle">' + (i + 1) + '</td>' +
                            '<td class="align-middle font-weight-bold">' + nombre + '</td>' +
                            '<td class="align-middle">' + presentacion + '</td>' +
                            '<td class="align-middle text-center">' + pacientes + '</td>' +
                            '<td class="align-middle text-center">' +
                                '<button class="btn btn-sm btn-info" onclick="ver_medicamento(' + i + ')" title="Ver"><i class="feather icon-eye"></i></button>' +
                            '</td>' +
                            '</tr>';
                        $('#tbody_medicamentos').append(fila);
                    });

                    $('#contenedor_tabla_medicamentos').show();
                    dtMedicamentos = $('#tabla_medicamentos').DataTable({
                        responsive: true,
                        pageLength: 15,
                        language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' },
                        columnDefs: [{ orderable: false, targets: [4] }]
                    });
                } else {
                    $('#sin_resultados_medicamentos').show();
                }
            })
            .fail(function() {
                $('#spinner_medicamentos').hide();
                swal({ title: 'Error', text: 'No se pudo cargar la lista de medicamentos.', icon: 'error', buttons: 'Aceptar' });
            });
        }

        function ver_medicamento(index) {
            var m = medicamentosCache[index]; if (!m) return;
            // acción por defecto: si existe id intentar abrir detalle
            if (m.id) {
                window.location.href = '{{ url("direccion/salud/medicamentos") }}/' + m.id + '/ver';
            }
        }

        function ver_estadistica_medicamento(index) {
            var m = medicamentosEstadisticasCache[index]; if (!m) return;
            $('#md_nombre').text(m.medicamento || m.medicamento_nombre || m.nombre_medicamento || '—');
            $('#md_area').text(m.area_nombre || '—');
            $('#md_suma_cantidad').text(m.suma_cantidad || 0);
            $('#md_registros').text(m.registros || 0);
            $('#md_pacientes').text(m.pacientes || 0);
            $('#modal_detalle_medicamento').modal('show');
        }

        function toggle_vista_medicamentos() {
            var modo = $('#modo_vista_medicamentos').val();
            if (modo === 'estadisticas') {
                $('#contenedor_tabla_medicamentos').hide();
                $('#sin_resultados_medicamentos').hide();
                cargar_estadisticas_medicamentos();
            } else {
                $('#contenedor_estadisticas_medicamentos').hide();
                cargar_medicamentos_cronicos();
            }
        }

        function renderChartMedicamentos(datos, agrupar) {
            if (!window.Chart) return;
            var $chartWrap = $('#chart_estadisticas_medicamentos').parent();
            if (!datos || datos.length === 0) { if (chartMedicamentos) { chartMedicamentos.destroy(); chartMedicamentos = null; } $chartWrap.hide(); return; }
            $chartWrap.show();
            var MAX_LABELS = 12;
            var TRUNCATE_LEN = 40;

            // Agregar por nombre (sumar cantidades de distintas áreas; el gráfico ByArea muestra el desglose)
            var mapaAgr = {};
            datos.forEach(function(d) {
                var nombre = d.medicamento || d.medicamento_nombre || d.nombre_medicamento || d.nombre || 'Sin nombre';
                var count = parseFloat(d.suma_cantidad || d.prescripciones || d.cantidad || 0) || 0;
                if (!mapaAgr[nombre]) mapaAgr[nombre] = { nombre: nombre, count: 0 };
                mapaAgr[nombre].count += count;
            });
            var items = Object.keys(mapaAgr).map(function(k) { return mapaAgr[k]; });

            // ordenar por count desc
            items.sort(function(a,b){ return b.count - a.count; });

            var grouped = [];
            if (items.length > MAX_LABELS) {
                var top = items.slice(0, MAX_LABELS);
                var rest = items.slice(MAX_LABELS);
                var others = rest.reduce(function(acc, cur){ return acc + (cur.count || 0); }, 0);
                grouped = top.slice();
                if (others > 0) grouped.push({ id: null, nombre: 'Otros', area: '', count: others });
            } else {
                grouped = items;
            }

            var fullLabels = grouped.map(function(it){ return it.nombre; });
            var labelsShort = fullLabels.map(function(l){ return (l.length > TRUNCATE_LEN) ? (l.slice(0, TRUNCATE_LEN - 3) + '...') : l; });
            var values = grouped.map(function(it){ return Number(it.count || 0); });
            var background = grouped.map(function(_, i){ var hue = Math.floor((i * 47) % 360); return 'hsl(' + hue + ', 65%, 55%)'; });

            var canvas = document.getElementById('chart_estadisticas_medicamentos');
            var ctx = canvas.getContext('2d');
            var rowHeight = 30;
            canvas.height = Math.max(220, labelsShort.length * rowHeight);

            if (chartMedicamentos) { chartMedicamentos.destroy(); chartMedicamentos = null; }
            $chartWrap.show();
            chartMedicamentos = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsShort,
                    datasets: [{
                        label: 'Cantidades',
                        data: values,
                        backgroundColor: background,
                        borderColor: 'rgba(0,0,0,0.05)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: { beginAtZero: true, title: { display: true, text: 'Cantidades' }, grid: { display: true } },
                        y: { ticks: { autoSkip: false }, grid: { display: false } }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                title: function(tooltipItems) { var idx = tooltipItems[0].dataIndex; return fullLabels[idx] || tooltipItems[0].label; },
                                label: function(tooltipItem) { return 'Cantidad: ' + (Number(tooltipItem.raw || 0)).toLocaleString(); }
                            }
                        }
                    }
                }
            });
        }

        function renderChartMedicamentosByArea(datos) {
            if (!window.Chart) return;
            var $chartWrap = $('#chart_estadisticas_medicamentos_area').parent();
            if (!datos || datos.length === 0) { if (chartMedicamentosArea) { chartMedicamentosArea.destroy(); chartMedicamentosArea = null; } $chartWrap.hide(); return; }
            $chartWrap.show();

            // agrupar por area_id (o fallback a area_nombre)
            var map = {}; // area_id -> { id, nombre, count }
            datos.forEach(function(d) {
                var areaId = d.area_id || d.areaId || d.area || null;
                var areaNombre = d.area_nombre || d.area || (areaId ? String(areaId) : '—');
                var raw = d.suma_cantidad || d.prescripciones || d.cantidad || 0;
                var count = 0;
                if (typeof raw === 'number') count = Number(raw) || 0;
                else if (typeof raw === 'string') {
                    var m = raw.match(/[0-9]+([\.,][0-9]+)?/);
                    if (m) { count = Number(m[0].replace(',', '.')); } else { count = 1; }
                } else { count = 1; }

                var key = areaId !== null ? String(areaId) : areaNombre;
                if (!map[key]) map[key] = { id: areaId, nombre: areaNombre, count: 0 };
                map[key].count += count;
            });

            var items = Object.keys(map).map(function(k){ return map[k]; });
            items.sort(function(a,b){ return b.count - a.count; });

            var MAX_LABELS = 20; var TRUNCATE_LEN = 60;
            var grouped = [];
            if (items.length > MAX_LABELS) {
                var top = items.slice(0, MAX_LABELS);
                var rest = items.slice(MAX_LABELS);
                var others = rest.reduce(function(acc, cur){ return acc + (cur.count || 0); }, 0);
                grouped = top.slice();
                if (others > 0) grouped.push({ id: null, nombre: 'Otros', count: others });
            } else grouped = items;

            var fullLabels = grouped.map(function(it){ return it.nombre || '—'; });
            var labelsShort = fullLabels.map(function(l){ return (l.length > TRUNCATE_LEN) ? (l.slice(0, TRUNCATE_LEN - 3) + '...') : l; });
            var values = grouped.map(function(it){ return Number(it.count || 0); });
            var background = grouped.map(function(_, i){ var hue = Math.floor((i * 47) % 360); return 'hsl(' + hue + ', 65%, 55%)'; });

            var canvas = document.getElementById('chart_estadisticas_medicamentos_area');
            var ctx = canvas.getContext('2d');
            var rowHeight = 30;
            canvas.height = Math.max(220, labelsShort.length * rowHeight);

            if (chartMedicamentosArea) { chartMedicamentosArea.destroy(); chartMedicamentosArea = null; }
            chartMedicamentosArea = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsShort,
                    datasets: [{ label: 'Cantidades por área', data: values, backgroundColor: background, borderColor: 'rgba(0,0,0,0.05)', borderWidth: 1 }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { x: { beginAtZero: true, title: { display: true, text: 'Cantidades' }, grid: { display: true } }, y: { ticks: { autoSkip: false }, grid: { display: false } } },
                    plugins: {
                        legend: { display: false },
                        tooltip: { callbacks: { title: function(items){ var idx = items[0].dataIndex; return fullLabels[idx] || items[0].label; }, label: function(item){ return 'Cantidad: ' + (Number(item.raw || 0)).toLocaleString(); } } }
                    }
                }
            });
        }

        function cargar_estadisticas_medicamentos() {
            var agrupar = $('#agrupar_por_medicamentos').val();

            // Ocultar lista, limpiar y destruir DataTable ANTES de cualquier manipulación del DOM
            $('#contenedor_tabla_medicamentos').hide();
            $('#sin_resultados_medicamentos').hide();
            if ($.fn.DataTable.isDataTable('#tabla_estadisticas_medicamentos')) {
                $('#tabla_estadisticas_medicamentos').DataTable().destroy();
            }
            $('#tbody_estadisticas_medicamentos').empty();
            $('#contenedor_estadisticas_medicamentos').hide();
            $('#spinner_medicamentos').show();

            $.ajax({
                url: '{{ route("ministerio.medicamentos.listar") }}',
                type: 'GET',
                data: {
                    agrupar: agrupar,
                    region: $('#filtro_region_medic').val(),
                    ciudad: $('#filtro_ciudad_medic').val()
                },
                dataType: 'json'
            })
            .done(function(resp) {
                console.log('Respuesta estadísticas medicamentos:', resp);
                $('#spinner_medicamentos').hide();

                if (resp.estado === 1 && resp.datos && resp.datos.length > 0) {
                    medicamentosEstadisticasCache = resp.datos;

                    $(resp.datos).each(function(i, r) {
                        var nombre = r.medicamento || r.medicamento_nombre || r.nombre_medicamento || '—';
                        var fila = '<tr>' +
                            '<td class="font-weight-bold">' + nombre + '</td>' +
                            '<td>' + (r.area_nombre || '—') + '</td>' +
                            '<td class="text-center">' + (r.suma_cantidad || r.prescripciones || 0) + '</td>' +
                            '<td class="text-center">' + (r.pacientes || 0) + '</td>' +
                            '<td class="text-center">' +
                                '<button class="btn btn-sm btn-info" onclick="ver_estadistica_medicamento(' + i + ')" title="Ver detalle">' +
                                    '<i class="feather icon-eye"></i>' +
                                '</button>' +
                            '</td>' +
                            '</tr>';
                        $('#tbody_estadisticas_medicamentos').append(fila);
                    });

                    $('#contenedor_estadisticas_medicamentos').show();
                    $('#tabla_estadisticas_medicamentos').DataTable({
                        responsive: true,
                        pageLength: 25,
                        language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' },
                        columnDefs: [{ orderable: false, targets: [4] }]
                    });

                    try { renderChartMedicamentos(resp.datos, agrupar); } catch(e) { console.warn('renderChartMedicamentos:', e); }
                    try { renderChartMedicamentosByArea(resp.datos); } catch(e) { console.warn('renderChartMedicamentosByArea:', e); }
                } else {
                    medicamentosEstadisticasCache = [];
                    $('#tbody_estadisticas_medicamentos').append(
                        '<tr><td colspan="5" class="text-center text-muted">No hay datos para mostrar.</td></tr>'
                    );
                    $('#contenedor_estadisticas_medicamentos').show();
                    try { renderChartMedicamentos([], agrupar); } catch(e) {
                        if (chartMedicamentos) { chartMedicamentos.destroy(); chartMedicamentos = null; }
                        $('#chart_estadisticas_medicamentos').parent().hide();
                    }
                    try { renderChartMedicamentosByArea([]); } catch(e) {
                        if (chartMedicamentosArea) { chartMedicamentosArea.destroy(); chartMedicamentosArea = null; }
                        $('#chart_estadisticas_medicamentos_area').parent().hide();
                    }
                }
            })
            .fail(function() {
                $('#spinner_medicamentos').hide();
                swal({ title: 'Error', text: 'No se pudieron cargar las estadísticas.', icon: 'error', buttons: 'Aceptar' });
            });
        }

    function cargar_estadisticas_cronicos() {
        var agrupar = $('#agrupar_por_cronicos').val();

        // Destruir DataTable ANTES de vaciar el tbody para evitar crash de parentNode
        $('#contenedor_tabla_cronicos').hide();
        $('#sin_resultados_cronicos').hide();
        if ($.fn.DataTable.isDataTable('#tabla_estadisticas_cronicos')) {
            $('#tabla_estadisticas_cronicos').DataTable().destroy();
        }
        $('#tbody_estadisticas_cronicos').empty();
        $('#contenedor_estadisticas_cronicos').hide();
        $('#spinner_cronicos').show();

        $.ajax({
            url: '{{ route("ministerio.cronicos.listar") }}',
            type: 'GET',
            data: {
                agrupar: agrupar,
                region: $('#filtro_region').val(),
                ciudad: $('#filtro_ciudad').val()
            },
            dataType: 'json'
        })
        .done(function(resp) {
            console.log('Respuesta estadísticas cronicos:', resp);
            $('#spinner_cronicos').hide();
            if (resp.estado === 1 && resp.datos && resp.datos.length > 0) {
                $(resp.datos).each(function(i, r) {
                    var fila = '<tr>' +
                        '<td>' + (r.enfermedad_nombre || '—') + '</td>' +
                        '<td>' + (r.area_nombre || '—') + '</td>' +
                        '<td class="text-center font-weight-bold">' + (r.pacientes || 0) + '</td>' +
                        '</tr>';
                    $('#tbody_estadisticas_cronicos').append(fila);
                });
                $('#contenedor_estadisticas_cronicos').show();
                $('#tabla_estadisticas_cronicos').DataTable({ responsive: true, pageLength: 25, language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' } });
                renderChartCronicos(resp.datos, agrupar);
            } else {
                $('#tbody_estadisticas_cronicos').append('<tr><td colspan="3" class="text-center text-muted">No hay datos para mostrar.</td></tr>');
                $('#contenedor_estadisticas_cronicos').show();
                // Ocultar o destruir gráfico si existe
                try { renderChartCronicos([], agrupar); } catch (e) { if (chartCronicos) { chartCronicos.destroy(); chartCronicos = null; } $('#chart_estadisticas_cronicos').parent().hide(); }
            }
        })
        .fail(function() {
            $('#spinner_cronicos').hide();
            swal({ title: 'Error', text: 'No se pudieron cargar las estadísticas.', icon: 'error', buttons: 'Aceptar' });
        });
    }

    function renderChartCronicos(datos, agrupar) {
        if (!window.Chart) {
            console.warn('Chart.js no está disponible.');
            return;
        }

        var $chartWrap = $('#chart_estadisticas_cronicos').parent();
        if (!datos || datos.length === 0) {
            if (chartCronicos) { chartCronicos.destroy(); chartCronicos = null; }
            $chartWrap.hide();
            return;
        }

        var MAX_LABELS = 12; // mostrar top N y agrupar resto en 'Otros' (por defecto menor para evitar solapamiento)
        var TRUNCATE_LEN = 40; // longitud visible de cada label

        var items = datos.map(function(d) {
            return {
                id: d.enfermedad_id || d.id || null,
                nombre: d.enfermedad_nombre || d.nombre || (d.descripcion ? String(d.descripcion) : 'Sin nombre'),
                area: d.area_nombre || d.area || (agrupar || 'Área'),
                count: parseInt(d.pacientes || 0, 10)
            };
        });

        // ordenar por count desc
        items.sort(function(a,b){ return b.count - a.count; });

        var grouped = [];
        if (items.length > MAX_LABELS) {
            var top = items.slice(0, MAX_LABELS);
            var rest = items.slice(MAX_LABELS);
            var others = rest.reduce(function(acc, cur){ return acc + (cur.count || 0); }, 0);
            grouped = top.slice();
            if (others > 0) grouped.push({ id: null, nombre: 'Otros', area: '', count: others });
        } else {
            grouped = items;
        }

        // labels cortas para mostrar y array con etiquetas completas para tooltip
        var fullLabels = grouped.map(function(it){ return it.nombre + (it.area ? ' — ' + it.area : ''); });
        var labelsShort = fullLabels.map(function(l){ return (l.length > TRUNCATE_LEN) ? (l.slice(0, TRUNCATE_LEN - 3) + '...') : l; });
        var values = grouped.map(function(it){ return it.count || 0; });
        var background = grouped.map(function(_, i){ var hue = Math.floor((i * 47) % 360); return 'hsl(' + hue + ', 65%, 55%)'; });

        var canvas = document.getElementById('chart_estadisticas_cronicos');
        var ctx = canvas.getContext('2d');
        // ajustar alto del canvas según cantidad de labels
        var rowHeight = 30;
        canvas.height = Math.max(220, labelsShort.length * rowHeight);

        if (chartCronicos) { chartCronicos.destroy(); chartCronicos = null; }
        $chartWrap.show();
        chartCronicos = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelsShort,
                datasets: [{
                    label: 'Pacientes',
                    data: values,
                    backgroundColor: background,
                    borderColor: 'rgba(0,0,0,0.05)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { beginAtZero: true, title: { display: true, text: 'Pacientes' }, grid: { display: true } },
                    y: { ticks: { autoSkip: false }, grid: { display: false } }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                var idx = tooltipItems[0].dataIndex;
                                return fullLabels[idx] || tooltipItems[0].label;
                            },
                            label: function(tooltipItem) {
                                return 'Pacientes: ' + tooltipItem.formattedValue;
                            }
                        }
                    }
                }
            }
        });
    }
</script>

@endsection
