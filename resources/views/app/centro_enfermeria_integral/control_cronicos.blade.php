@extends('template.adm_cm.template')
@section('content')
<style>
    .ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }
    </style>
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- Header -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Gestión de Patologías Crónicas</h5>
                        </div>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Patologías Crónicas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



                        <!-- Buscador de Pacientes -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5 class="text-white mb-0"><i class="feather icon-search"></i> Buscar Paciente</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="buscar_rut">RUT Paciente:</label>
                                                    <input type="text" class="form-control" id="buscar_rut" placeholder="Ej: 12345678-9" oninput="formatoRut(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="buscar_nombre">Nombre:</label>
                                                    <input type="text" class="form-control" id="buscar_nombre" placeholder="Nombre del paciente">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>&nbsp;</label><br>
                                                    <button type="button" class="btn btn-primary" id="buscar_paciente_btn" onclick="buscarPaciente();">
                                                        <i class="feather icon-search"></i> Buscar
                                                    </button>
                                                    <button type="button" class="btn btn-secondary ml-2" onclick="limpiarBusqueda();">
                                                        <i class="feather icon-x"></i> Limpiar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información del Paciente Seleccionado -->
                        <div class="row mb-3" id="paciente_seleccionado" style="display: none;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5 class="text-white mb-0"><i class="feather icon-user"></i> Paciente Seleccionado</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" id="paciente_id" value="">
                                            <div class="col-md-3">
                                                <strong>RUT:</strong> <span id="paciente_rut">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Nombre:</strong> <span id="paciente_nombre">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Fecha Nacimiento:</strong> <span id="paciente_fecha_nac">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Teléfono:</strong> <span id="paciente_telefono">-</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>📍 Dirección:</strong> <span id="paciente_direccion">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Registro de Controles Crónicos -->
                        <div class="row mb-3" id="controles_section" style="display: none;">
                            <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-success">
                                                <h4 class="text-white f-20 mb-0 ml-2"><i class="feather icon-activity"></i> Registrar Control Crónico</h4>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Controles de enfermedades crónicas</label>
                                                            <select class="form-control form-control-sm" id="cronicos" name="cronicos"
                                                                onchange="cambiar_enfermedad_cronica(this.value);">
                                                                <option value="n_C">Seleccione una opción</option>
                                                                <option value="cpeso">OBESIDAD</option>
                                                                <option value="chipertension">HIPERTENSIÓN ARTERIAL</option>
                                                                <option value="cdiabet">DIABETES</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                        <input type="date" class="form-control form-control-sm" name="fecha_control" id="fecha_control">
                                                    </div>
                                                </div>

                                                {{-- OBESIDAD --}}
                                                <div id="control_peso_div" class="card-row" style="display: none;">
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue text-center mt-1 mb-0">Control de obesidad</h5>
                                                    </div></div>
                                                    <hr>

                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue mt-2 mb-0">Evolución del Control de Obesidad</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <canvas id="grafico_obesidad" height="80"></canvas>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue mt-2 mb-0">Controles previos de obesidad</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <table id="control_obesidad" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle">Nº Control</th>
                                                                    <th class="text-center align-middle">Fecha</th>
                                                                    <th class="text-center align-middle">Peso</th>
                                                                    <th class="text-center align-middle">Variación</th>
                                                                    <th class="text-center align-middle">Peso Ideal</th>
                                                                    <th class="text-center align-middle">Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_obesidad">
                                                                <tr><td colspan="6" class="text-center text-muted">Cargando...</td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div></div>
                                                    <!-- boton de generar reporte -->
                                                    <div class="row mt-3"><div class="col-md-12 text-right">
                                                        <button class="btn btn-success" onclick="generarReporte('obesidad');">
                                                            <i class="feather icon-file-text"></i> Generar Reporte
                                                        </button>
                                                    </div></div>
                                                </div>

                                                {{-- HIPERTENSIÓN --}}
                                                <div id="hipertension_div" class="card-row" style="display: none;">
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue text-center mt-1 mb-0">Control de hipertensión</h5>
                                                    </div></div>
                                                    <hr>

                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue mt-2 mb-0">Evolución del Control de Hipertensión</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <canvas id="grafico_hipertension" height="80"></canvas>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue mt-2 mb-0">Controles previos de hipertensión</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <table id="control_hipertension" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle">Nº Control</th>
                                                                    <th class="text-center align-middle">Fecha</th>
                                                                    <th class="text-center align-middle">Presión Sistólica</th>
                                                                    <th class="text-center align-middle">Presión Diastólica</th>
                                                                    <th class="text-center align-middle">Presión Ideal</th>
                                                                    <th class="text-center align-middle">Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_hipertension">
                                                                <tr><td colspan="6" class="text-center text-muted">Cargando...</td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div></div>
                                                    <!-- boton de generar reporte -->
                                                    <div class="row mt-3"><div class="col-md-12 text-right">
                                                        <button class="btn btn-success" onclick="generarReporte('hipertension');">
                                                            <i class="feather icon-file-text"></i> Generar Reporte
                                                        </button>
                                                    </div></div>
                                                </div>

                                                {{-- DIABETES --}}
                                                <div id="diabetes_div" class="card-row" style="display: none;">
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue text-center mt-1 mb-0">Control de diabetes</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue mt-2 mb-0">Evolución del Control de Diabetes</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <canvas id="grafico_diabetes" height="80"></canvas>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <h5 class="text-c-blue mt-2 mb-0">Controles previos de diabetes</h5>
                                                    </div></div>
                                                    <hr>
                                                    <div class="row"><div class="col-md-12">
                                                        <div style="overflow-x:auto;">
                                                            <table id="control_diabetes" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">Nº Control</th>
                                                                        <th class="text-center align-middle">Fecha</th>
                                                                        <th class="text-center align-middle">Peso</th>
                                                                        <th class="text-center align-middle">Piés</th>
                                                                        <th class="text-center align-middle">Hg A1c</th>
                                                                        <th class="text-center align-middle">Colesterol</th>
                                                                        <th class="text-center align-middle">Creatina</th>
                                                                        <th class="text-center align-middle">Glicosilada ayuno</th>
                                                                        <th class="text-center align-middle">Glicosilada postprandial</th>
                                                                        <th class="text-center align-middle">Responsable</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbody_diabetes">
                                                                    <tr><td colspan="10" class="text-center text-muted">Cargando...</td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div></div>
                                                    <!-- boton de generar reporte -->
                                                    <div class="row mt-3"><div class="col-md-12 text-right">
                                                        <button class="btn btn-success" onclick="generarReporte('diabetes');">
                                                            <i class="feather icon-file-text"></i> Generar Reporte
                                                        </button>
                                                    </div>

                                                </div>
                                        </div>
                                        </div>
                            </div>

                        <!-- Patologías Crónicas del Paciente -->
                        <div class="row" id="patologias_section" style="display: none;">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h4 class="text-white f-20 mb-0 ml-2"><i class="feather icon-activity"></i> Patologías Crónicas del Paciente</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="patologias_cronicos" class="table table-striped table-sm table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Patología</th>
                                                        <th class="text-center">Fecha Registro</th>
                                                        <th class="text-center">Profesional</th>
                                                        <th class="text-center">RUT Responsable</th>
                                                        <th class="text-center">Comentario</th>
                                                        <th class="text-center">Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="patologias_tbody">
                                                    <tr>
                                                        <td colspan="7" class="text-center text-muted">
                                                            No hay patologías crónicas registradas para este paciente
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
    </div>
</div>
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        // NO inicializar DataTable automáticamente para tablas dinámicas
        // Las tablas de control_obesidad, control_hipertension, control_diabetes,
        // y patologias_cronicos se inicializarán cuando se carguen los datos
    });
    // Variables globales
    let patologiasCronicas = [];

    // Función para cargar patologías crónicas - OPTIMIZADA
    function cargarPatologiasCronicas(idPaciente) {
        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registros';
        var tipo = 1; // Tipo para patologías crónicas

        data.id_tipo_antecedente = tipo;
        data.estado = 1;
        data.id_paciente = idPaciente;

        console.log('💊 Cargando patologías crónicas (tipo 1) para paciente:', idPaciente);
        console.log('📋 Datos enviados:', data);

        $.ajax({
            url: url,
            type: "GET",
            data: data,
            beforeSend: function() {
                $('#patologias_tbody').html('<tr><td colspan="7" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando patologías crónicas...</td></tr>');
            },
            success: function(response) {
                console.log('📊 Respuesta de patologías crónicas:', response);

                if (response.estado == 1 && response.registros) {
                    console.log('💊 Registros de patologías crónicas encontrados:', response.registros);
                    patologiasCronicas = response.registros;
                    llenarTablaPatologias();
                } else {
                    $('#patologias_tbody').html('<tr><td colspan="7" class="text-center text-muted">Sin patologías crónicas registradas</td></tr>');
                }
            },
            error: function(err) {
                console.error('❌ Error cargando patologías crónicas:', err);
                $('#patologias_tbody').html('<tr><td colspan="7" class="text-center text-danger">Error al cargar patologías crónicas</td></tr>');
            }
        });
    }

    // Función para llenar tabla de patologías crónicas
    function llenarTablaPatologias() {
        const tbody = $('#patologias_tbody');
        tbody.empty();

        if (!patologiasCronicas || patologiasCronicas.length === 0) {
            tbody.html('<tr><td colspan="7" class="text-center text-muted">No hay patologías crónicas registradas</td></tr>');
            $('#patologias_section').hide();
            return;
        }

        $('#patologias_section').show();

        let html = '';
        patologiasCronicas.forEach((patologia, index) => {
            const data = patologia.antecedente_data;
            const nombre = data.nombre || patologia.users?.name || 'Sin especificar';
            const fecha = data.fecha_regitro || data.fecha || '-';
            const profesional = data.profesional || patologia.users?.name || '-';
            const rutResponsable = data.rut_responsable || '-';
            const comentario = data.comentario || patologia.comentario || '-';
            const estado = patologia.estado == 1 ? '<span class="badge badge-success">Activa</span>' : '<span class="badge badge-danger">Inactiva</span>';

            html += `
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td><strong>${nombre}</strong></td>
                    <td class="text-center">${fecha}</td>
                    <td>${profesional}</td>
                    <td class="text-center">${rutResponsable}</td>
                    <td>${comentario}</td>
                    <td class="text-center">${estado}</td>
                </tr>
            `;
        });

        tbody.html(html);
        inicializarDataTablePatologias();
    }

    // Función para buscar paciente
    function buscarPaciente() {
        const rut = $('#buscar_rut').val().trim();
        const nombre = $('#buscar_nombre').val().trim();

        if (!rut && !nombre) {
            swal('Atención', 'Ingrese RUT o nombre del paciente', 'warning');
            return;
        }

        // Llamada AJAX para buscar pacientes
        $.ajax({
            url: '{{ route("agenda.buscar_rut_paciente") }}',
            method: 'get',
            data: {
                rut: rut,
                id_profesional: "{{ Auth::user()->profesional_id }}",
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                $('#buscar_paciente_btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Buscando...');
            },
            success: function(response) {
                console.log(response);
                let paciente = JSON.parse(response);
                console.log(paciente);
                if (paciente) {
                    if (paciente) {
                        mostrarPacienteSeleccionado(paciente);
                    } else {
                        // Si hay múltiples resultados, mostrar lista para seleccionar
                        mostrarListaPacientes(paciente.pacientes);
                    }
                } else {
                    swal('Sin resultados', 'No se encontraron pacientes con ese criterio', 'info');
                }
            },
            error: function() {
                swal('Error', 'Error al buscar pacientes', 'error');
            },
            complete: function() {
                $('#buscar_paciente_btn').prop('disabled', false).html('<i class="feather icon-search"></i> Buscar');
            }
        });
    }

    // Función para mostrar lista de pacientes cuando hay múltiples resultados
    function mostrarListaPacientes(pacientes) {
        let html = '<div class="list-group" style="max-height: 300px; overflow-y: auto;">';
        pacientes.forEach(function(paciente, index) {
            html += `
                <a href="#" class="list-group-item list-group-item-action" onclick="seleccionarPacienteDeLista(${index}); return false;">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">${paciente.nombres} ${paciente.apellido_uno}</h6>
                        <small>${paciente.rut}</small>
                    </div>
                    <p class="mb-1">Teléfono: ${paciente.telefono_uno || 'No registrado'}</p>
                    <small class="text-muted">📍 ${paciente.direccion && paciente.direccion.direccion ? paciente.direccion.direccion : 'Sin dirección'}</small>
                </a>
            `;
        });
        html += '</div>';

        // Guardar en variable temporal para que sea accesible
        window.pacientesListaModal = pacientes;

        swal({
            title: 'Seleccione un paciente',
            content: {
                element: "div",
                attributes: {
                    innerHTML: html
                }
            },
            button: "Cancelar"
        });
    }

    // Función para seleccionar un paciente de la lista modal
    function seleccionarPacienteDeLista(index) {
        const paciente = window.pacientesListaModal[index];
        if (paciente) {
            swal.close();
            mostrarPacienteSeleccionado(paciente);
        }
    }

    // Función para seleccionar un paciente de la lista
    function seleccionarPaciente(id, rut, nombres, apellido_uno, telefono_uno) {
        const paciente = { id, rut, nombres, apellido_uno, telefono_uno };
        swal.close();
        mostrarPacienteSeleccionado(paciente);
    }

    // Función para mostrar información del paciente
    function mostrarPacienteSeleccionado(paciente) {
        pacienteSeleccionado = paciente;

        $('#paciente_id').val(paciente.id);
        $('#paciente_rut').text(paciente.rut || '-');
        $('#paciente_nombre').text(paciente.nombres + ' ' + paciente.apellido_uno);
        $('#paciente_fecha_nac').text(paciente.fecha_nac || 'No registrada');
        $('#paciente_telefono').text(paciente.telefono_uno || 'No registrado');

        // Mostrar dirección si existe
        let direccionTexto = 'No registrada';
        // El backend puede devolver la dirección como 'Direccion' (mayúscula) o 'direccion' (minúscula)
        const direccionObj = paciente.Direccion || paciente.direccion || null;
        if (direccionObj) {
            const ciudadNombre = direccionObj.Ciudad?.nombre || direccionObj.ciudad?.nombre || '';
            direccionTexto = (direccionObj.direccion || '') +
                            (ciudadNombre ? ', ' + ciudadNombre : '');
        }
        $('#paciente_direccion').text(direccionTexto);

        $('#paciente_seleccionado').show();

        // Mostrar sección de controles y cargar historial
        $('#controles_section').show();
        // Resetear select y ocultar paneles
        $('#cronicos').val('n_C');
        $('#control_peso_div, #hipertension_div, #diabetes_div').hide();
        cargarControlesCronicos(paciente.id);
        cargarPatologiasCronicas(paciente.id);
    }

    // ─── Controles crónicos ──────────────────────────────────────────────────────

    function cambiar_enfermedad_cronica(valor) {
        $('#control_peso_div, #hipertension_div, #diabetes_div').hide();
        if (valor === 'cpeso')        $('#control_peso_div').show();
        else if (valor === 'chipertension') $('#hipertension_div').show();
        else if (valor === 'cdiabet') $('#diabetes_div').show();
    }

    // Carga los tres historiales al seleccionar un paciente
    function cargarControlesCronicos(idPaciente) {
        console.log('🔄 Iniciando cargarControlesCronicos para paciente:', idPaciente);
        console.log('1️⃣ Llamando cargarHistorialObesidad...');
        cargarHistorialObesidad(idPaciente);
        console.log('2️⃣ Llamando cargarHistorialHipertension...');
        cargarHistorialHipertension(idPaciente);
        console.log('3️⃣ Llamando cargarHistorialDiabetes...');
        cargarHistorialDiabetes(idPaciente);
    }

    function cargarHistorialObesidad(idPaciente) {
        console.log('📊 Cargando historial de obesidad para paciente:', idPaciente);
        $.get('{{ route("control_obesidad.getControlObesidad") }}', { id_paciente: idPaciente }, function(res) {
            console.log('📥 Respuesta de getControlObesidad:', res);
            const tbody = $('#tbody_obesidad');
            if (res.estado == 1 && res.registros && res.registros.length) {
                console.log('✅ Se encontraron registros:', res.registros);
                let html = '';
                const fechas = [];
                const pesos = [];

                res.registros.forEach(function(r, i) {
                    const fecha = r.created_at ? r.created_at.substring(0, 10).split('-').reverse().join('-') : '-';
                    fechas.push(fecha);
                    pesos.push(parseFloat(r.peso) || 0);

                    html += `<tr>
                        <td class="text-center">${i + 1}</td>
                        <td class="text-center">${fecha}</td>
                        <td class="text-center">${r.peso ?? '-'}</td>
                        <td class="text-center">${r.variacion ?? '-'}</td>
                        <td class="text-center">${r.ideal ?? '-'}</td>
                        <td class="text-center">${r.responsable ?? '-'}</td>
                    </tr>`;
                });
                tbody.html(html);
                console.log('📈 Creando gráfico con:', fechas, pesos);
                crearGraficoObesidad(fechas, pesos);
                inicializarDataTableObesidad();
            } else {
                console.log('❌ No hay registros:', res);
                tbody.html('<tr><td colspan="6" class="text-center text-muted">Sin registros previos</td></tr>');
                if (window.chartObesidad) window.chartObesidad.destroy();
            }
        }).fail(function(err) {
            console.error('❌ Error en getControlObesidad:', err);
            $('#tbody_obesidad').html('<tr><td colspan="6" class="text-center text-danger">Error al cargar registros</td></tr>');
        });
    }

    function cargarHistorialHipertension(idPaciente) {
        console.log('🩺 Cargando historial de hipertensión para paciente:', idPaciente);
        $.get('{{ route("hipertension.getHipertension") }}', { id_paciente: idPaciente }, function(res) {
            console.log('📥 Respuesta de getHipertension:', res);
            const tbody = $('#tbody_hipertension');
            if (res.estado == 1 && res.registros && res.registros.length) {
                console.log('✅ Se encontraron registros:', res.registros);
                let html = '';
                const fechas = [];
                const sistolica = [];
                const diastolica = [];

                res.registros.forEach(function(r, i) {
                    const fecha = r.created_at ? r.created_at.substring(0, 10).split('-').reverse().join('-') : '-';
                    fechas.push(fecha);
                    sistolica.push(parseFloat(r.sistolica) || 0);
                    diastolica.push(parseFloat(r.diastolica) || 0);

                    html += `<tr>
                        <td class="text-center">${i + 1}</td>
                        <td class="text-center">${fecha}</td>
                        <td class="text-center">${r.sistolica ?? '-'}</td>
                        <td class="text-center">${r.diastolica ?? '-'}</td>
                        <td class="text-center">${r.ideal ?? '-'}</td>
                        <td class="text-center">${r.responsable ?? '-'}</td>
                    </tr>`;
                });
                tbody.html(html);
                console.log('📈 Creando gráfico con:', fechas, sistolica, diastolica);
                crearGraficoHipertension(fechas, sistolica, diastolica);
                inicializarDataTableHipertension();
            } else {
                console.log('❌ No hay registros:', res);
                tbody.html('<tr><td colspan="6" class="text-center text-muted">Sin registros previos</td></tr>');
                if (window.chartHipertension) window.chartHipertension.destroy();
            }
        }).fail(function(err) {
            console.error('❌ Error en getHipertension:', err);
            $('#tbody_hipertension').html('<tr><td colspan="6" class="text-center text-danger">Error al cargar registros</td></tr>');
        });
    }

    function cargarHistorialDiabetes(idPaciente) {
        console.log('🩺 Cargando historial de diabetes para paciente:', idPaciente);
        $.get('{{ route("ficha_medica.diabetes.getDiabete") }}', { id_paciente: idPaciente }, function(res) {
            console.log('📥 Respuesta de getDiabete:', res);
            const tbody = $('#tbody_diabetes');
            if (res.estado == 1 && res.registros && res.registros.length) {
                console.log('✅ Se encontraron registros:', res.registros);
                let html = '';
                const fechas = [];
                const hgac1 = [];
                const colesterol = [];

                res.registros.forEach(function(r, i) {
                    const fecha = r.created_at ? r.created_at.substring(0, 10).split('-').reverse().join('-') : '-';
                    fechas.push(fecha);
                    hgac1.push(parseFloat(r.hgac1) || 0);
                    colesterol.push(parseFloat(r.colesterol) || 0);

                    html += `<tr>
                        <td class="text-center">${i + 1}</td>
                        <td class="text-center">${fecha}</td>
                        <td class="text-center">${r.peso ?? '-'}</td>
                        <td class="text-center">${r.pies ?? '-'}</td>
                        <td class="text-center">${r.hgac1 ?? '-'}</td>
                        <td class="text-center">${r.colesterol ?? '-'}</td>
                        <td class="text-center">${r.creatina ?? '-'}</td>
                        <td class="text-center">${r.glicosinada_ayuno ?? '-'}</td>
                        <td class="text-center">${r.glicosilada_postprandial ?? '-'}</td>
                        <td class="text-center">${r.responsable ?? '-'}</td>
                    </tr>`;
                });
                tbody.html(html);
                console.log('📈 Creando gráfico con:', fechas, hgac1, colesterol);
                crearGraficoDiabetes(fechas, hgac1, colesterol);
                inicializarDataTableDiabetes();
            } else {
                console.log('❌ No hay registros:', res);
                tbody.html('<tr><td colspan="10" class="text-center text-muted">Sin registros previos</td></tr>');
                if (window.chartDiabetes) window.chartDiabetes.destroy();
            }
        }).fail(function(err) {
            console.error('❌ Error en getDiabete:', err);
            $('#tbody_diabetes').html('<tr><td colspan="10" class="text-center text-danger">Error al cargar registros</td></tr>');
        });
    }

    // ─── Gráficos con Chart.js ────────────────────────────────────────────────────

    function crearGraficoObesidad(fechas, pesos) {
        if (window.chartObesidad) window.chartObesidad.destroy();

        const ctx = document.getElementById('grafico_obesidad')?.getContext('2d');
        if (!ctx) return;

        window.chartObesidad = new Chart(ctx, {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Peso (kg)',
                    data: pesos,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 5,
                    pointBackgroundColor: 'rgba(255, 99, 132, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: true, position: 'top' },
                    title: { display: true, text: 'Evolución del Peso - Control de Obesidad' }
                },
                scales: {
                    y: { beginAtZero: false, title: { display: true, text: 'Peso (kg)' } }
                }
            }
        });
    }

    function crearGraficoHipertension(fechas, sistolica, diastolica) {
        if (window.chartHipertension) window.chartHipertension.destroy();

        const ctx = document.getElementById('grafico_hipertension')?.getContext('2d');
        if (!ctx) return;

        window.chartHipertension = new Chart(ctx, {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [
                    {
                        label: 'Presión Sistólica (mmHg)',
                        data: sistolica,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.3,
                        pointRadius: 4
                    },
                    {
                        label: 'Presión Diastólica (mmHg)',
                        data: diastolica,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.3,
                        pointRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: true, position: 'top' },
                    title: { display: true, text: 'Evolución de Presión Arterial - Control de Hipertensión' }
                },
                scales: {
                    y: { beginAtZero: false, title: { display: true, text: 'Presión (mmHg)' } }
                }
            }
        });
    }

    function crearGraficoDiabetes(fechas, hgac1, colesterol) {
        if (window.chartDiabetes) window.chartDiabetes.destroy();

        const ctx = document.getElementById('grafico_diabetes')?.getContext('2d');
        if (!ctx) return;

        window.chartDiabetes = new Chart(ctx, {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [
                    {
                        label: 'HbA1c (%)',
                        data: hgac1,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.3,
                        pointRadius: 4,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Colesterol (mg/dL)',
                        data: colesterol,
                        borderColor: 'rgba(255, 159, 64, 1)',
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.3,
                        pointRadius: 4,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: true, position: 'top' },
                    title: { display: true, text: 'Evolución de Indicadores - Control de Diabetes' }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        title: { display: true, text: 'HbA1c (%)' }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        title: { display: true, text: 'Colesterol (mg/dL)' },
                        grid: { drawOnChartArea: false }
                    }
                }
            }
        });
    }
// ─── Inicializar DataTables ───────────────────────────────────────────────────

function inicializarDataTableObesidad() {
    try {
        console.log('🔧 inicializarDataTableObesidad: Iniciando...');
        const table = $('#control_obesidad');
        console.log('📋 Tabla encontrada:', table.length > 0 ? '✅ SÍ' : '❌ NO');
        console.log('📊 Contenido de tabla:', table.html()?.substring(0, 100));
        const isDataTable = $.fn.dataTable.isDataTable(table);
        console.log('📅 ¿Ya es DataTable?:', isDataTable ? 'SÍ' : 'NO');

        if (isDataTable) {
            console.log('🔄 Redibu jando DataTable existente...');
            table.DataTable().draw();
        } else {
            console.log('✨ Creando nueva instancia de DataTable...');
            table.DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                "responsive": true,
                "pageLength": 10,
                "order": [ [ 0, 'asc' ] ]
            });
            console.log('✅ DataTable creado exitosamente');
        }
    } catch(err) {
        console.error('❌ Error inicializar DataTable Obesidad:', err);
        console.error('Stack:', err.stack);
    }
}

function inicializarDataTableHipertension() {
    try {
        const table = $('#control_hipertension');
        const isDataTable = $.fn.dataTable.isDataTable(table);

        if (isDataTable) {
            // Si ya existe, solo redibuja
            table.DataTable().draw();
        } else {
            // Crea una nueva instancia
            table.DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                "responsive": true,
                "pageLength": 10,
                "order": [ [ 0, 'asc' ] ]
            });
        }
    } catch(err) {
        console.error('Error inicializar DataTable Hipertensión:', err);
    }
}

function inicializarDataTableDiabetes() {
    try {
        const table = $('#control_diabetes');
        const isDataTable = $.fn.dataTable.isDataTable(table);

        if (isDataTable) {
            // Si ya existe, solo redibuja
            table.DataTable().draw();
        } else {
            // Crea una nueva instancia
            table.DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                "responsive": true,
                "pageLength": 10,
                "order": [ [ 0, 'asc' ] ]
            });
        }
    } catch(err) {
        console.error('Error inicializar DataTable Diabetes:', err);
    }
}

function inicializarDataTablePatologias() {
    try {
        const table = $('#patologias_cronicos');
        const isDataTable = $.fn.dataTable.isDataTable(table);

        if (isDataTable) {
            // Si ya existe, solo redibuja
            table.DataTable().draw();
        } else {
            // Crea una nueva instancia
            table.DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                "responsive": true,
                "pageLength": 10,
                "order": [ [ 0, 'asc' ] ]
            });
        }
    } catch(err) {
        console.error('Error inicializar DataTable Patologías:', err);
    }
}


// ─── Guardar controles ────────────────────────────────────────────────────────

    function registrar_control_obesidad_dental() {
        const idPaciente = $('#paciente_id').val();
        if (!idPaciente) { swal('Atención', 'Seleccione un paciente primero', 'warning'); return; }

        const datos = {
            peso: $('#registro_peso').val(),
            variacion: $('#registro_peso_variacion').val(),
            ideal: $('#registro_peso_ideal').val(),
            paciente_atencion_dental: idPaciente,
            _token: '{{ csrf_token() }}'
        };

        $.get('{{ route("dental.registrar_control_obesidad") }}', datos, function(res) {
            swal('Éxito', 'Control de obesidad guardado correctamente', 'success');
            $('#registro_peso, #registro_peso_variacion, #registro_peso_ideal').val('');
            cargarHistorialObesidad(idPaciente);
        }).fail(function() {
            swal('Error', 'No se pudo guardar el control', 'error');
        });
    }

    function registrar_hipertension() {
        const idPaciente = $('#paciente_id').val();
        if (!idPaciente) { swal('Atención', 'Seleccione un paciente primero', 'warning'); return; }

        const datos = {
            sistolica: $('#presion_sistolica_hipertension').val(),
            diastolica: $('#presion_diastolica_hipertension').val(),
            ideal: $('#ideal_hipertension').val(),
            paciente_atencion_dental: idPaciente,
            _token: '{{ csrf_token() }}'
        };

        $.get('{{ route("dental.registrar_hipertension") }}', datos, function(res) {
            swal('Éxito', 'Control de hipertensión guardado correctamente', 'success');
            $('#presion_sistolica_hipertension, #presion_diastolica_hipertension, #ideal_hipertension').val('');
            cargarHistorialHipertension(idPaciente);
        }).fail(function() {
            swal('Error', 'No se pudo guardar el control', 'error');
        });
    }

    function registrar_diabetes() {
        const idPaciente = $('#paciente_id').val();
        if (!idPaciente) { swal('Atención', 'Seleccione un paciente primero', 'warning'); return; }

        const datos = {
            peso: $('#peso_diabetes').val(),
            pies: $('#pies_diabetes').val(),
            hgac1: $('#hga1c_diabetes').val(),
            colesterol: $('#colesterol_diabetes').val(),
            creatina: $('#creatina_diabetes').val(),
            glicosilada_postprandial: $('#glicosilada_postprandial_diabetes').val(),
            glicosinada_ayuno: $('#glicosilada_ayuno_diabetes').val(),
            paciente_atencion_dental: idPaciente,
            _token: '{{ csrf_token() }}'
        };

        $.get('{{ route("dental.registrar_diabetes") }}', datos, function(res) {
            swal('Éxito', 'Control de diabetes guardado correctamente', 'success');
            $('#peso_diabetes, #pies_diabetes, #hga1c_diabetes, #colesterol_diabetes, #creatina_diabetes, #glicosilada_postprandial_diabetes, #glicosilada_ayuno_diabetes').val('');
            cargarHistorialDiabetes(idPaciente);
        }).fail(function() {
            swal('Error', 'No se pudo guardar el control', 'error');
        });
    }

    // ─── Generar reporte PDF del control crónico ──────────────────────────────

    function generarReporte(tipo) {
        const idPaciente = $('#paciente_id').val();

        if (!idPaciente) {
            swal('Atención', 'Seleccione un paciente primero para generar el reporte', 'warning');
            return;
        }

        const tiposValidos = { obesidad: 'Obesidad', hipertension: 'Hipertensión Arterial', diabetes: 'Diabetes' };
        if (!tiposValidos[tipo]) {
            swal('Error', 'Tipo de reporte no válido', 'error');
            return;
        }

        // Capturar el gráfico Chart.js como imagen base64
        let chartBase64 = '';
        const chartMap = {
            obesidad:     window.chartObesidad,
            hipertension: window.chartHipertension,
            diabetes:     window.chartDiabetes
        };
        const chart = chartMap[tipo];
        if (chart) {
            chartBase64 = chart.toBase64Image('image/png', 1);
        }

        swal({
            title: 'Generar Reporte',
            text: 'Se generará el reporte de control de ' + tiposValidos[tipo] + ' en PDF.',
            icon: 'info',
            buttons: { cancelar: { text: 'Cancelar', value: false }, confirmar: { text: 'Generar PDF', value: true } }
        }).then(function(valor) {
            if (!valor) return;

            // Enviar via formulario POST para soportar la imagen base64 (puede ser grande para GET)
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("control_cronicos.reporte_pdf") }}';
            form.target = '_blank';

            const fields = {
                '_token':      '{{ csrf_token() }}',
                'id_paciente': idPaciente,
                'tipo':        tipo,
                'chart_image': chartBase64
            };

            Object.entries(fields).forEach(function([name, value]) {
                const input = document.createElement('input');
                input.type  = 'hidden';
                input.name  = name;
                input.value = value;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        });
    }

</script>
@endsection
