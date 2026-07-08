<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de Hora - Exámenes Médicos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --info-color: #0dcaf0;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border: none;
        }

        .card-header h2 {
            margin: 0;
            font-weight: 600;
        }

        .card-header p {
            margin: 0.5rem 0 0 0;
            opacity: 0.9;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e9ecef;
            z-index: 0;
        }

        .step {
            position: relative;
            text-align: center;
            flex: 1;
            z-index: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .step.active .step-circle {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .step.completed .step-circle {
            background: var(--success-color);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        .step.active .step-label {
            color: var(--primary-color);
            font-weight: 600;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block !important;
            min-height: 300px !important;
            padding: 20px 0 !important;
        }

        .form-section.active h4 {
            display: block !important;
            font-size: 1.5rem !important;
            line-height: 1.5 !important;
            margin-bottom: 1rem !important;
        }

        .form-section.active .row {
            display: flex !important;
        }

        .form-section.active .col-md-6,
        .form-section.active .col-12 {
            display: block !important;
        }

        .form-section.active label,
        .form-section.active input,
        .form-section.active select,
        .form-section.active button {
            display: inline-block !important;
        }

        .form-section.active .d-flex {
            display: flex !important;
        }

        .form-section.active .btn {
            display: inline-block !important;
            padding: 0.75rem 2rem !important;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
        }

        .btn {
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-outline-secondary:hover {
            transform: translateY(-2px);
        }

        .examen-card {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
            cursor: pointer;
        }

        .examen-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.1);
        }

        .examen-card.selected {
            border-color: var(--primary-color);
            background-color: rgba(13, 110, 253, 0.05);
        }

        .examen-card .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .hora-slot {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 0.5rem;
        }

        .hora-slot:hover {
            border-color: var(--primary-color);
            background-color: rgba(13, 110, 253, 0.05);
        }

        .hora-slot.selected {
            border-color: var(--primary-color);
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        .hora-slot.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #f8f9fa;
        }

        .resumen-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .resumen-item:last-child {
            border-bottom: none;
        }

        .resumen-label {
            font-weight: 600;
            color: #6c757d;
        }

        .resumen-value {
            color: #212529;
        }

        .alert-custom {
            border-radius: 10px;
            border: none;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-calendar-check me-2"></i>Reserva de Hora para Exámenes</h2>
                <p>Complete los siguientes pasos para agendar su hora</p>
            </div>

            <div class="card-body p-4">
                <!-- Indicador de pasos -->
                <div class="step-indicator mb-4">
                    <div class="step active" data-step="1">
                        <div class="step-circle">1</div>
                        <div class="step-label">Exámenes</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-circle">2</div>
                        <div class="step-label">Datos Personales</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-circle">3</div>
                        <div class="step-label">Fecha y Hora</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-circle">4</div>
                        <div class="step-label">Confirmación</div>
                    </div>
                </div>

                <!-- PASO 1: Selección de Exámenes -->
                <div class="form-section active" id="step1">
                    <h4 class="mb-4"><i class="fas fa-stethoscope me-2 text-primary"></i>Seleccione los exámenes</h4>

                    <div class="mb-3">
                        <label class="form-label">Buscar examen</label>
                        <input type="text" class="form-control" id="buscar_examen" placeholder="Escriba el nombre del examen...">
                    </div>

                    <div id="lista_examenes" class="mb-4">
                        <div class="text-center py-4">
                            <div class="loader"></div>
                            <p class="mt-3 text-muted">Cargando exámenes disponibles...</p>
                        </div>
                    </div>

                    <div class="alert alert-custom alert-info d-none" id="info_examenes_seleccionados">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Exámenes seleccionados:</strong> <span id="count_examenes">0</span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="irPaso(2)" id="btn_siguiente_1">
                            Siguiente <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- PASO 2: Datos del Paciente -->
                <div class="form-section" id="step2">
                    <h4 class="mb-4"><i class="fas fa-user me-2 text-primary"></i>Datos del Paciente</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">RUT <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="rut_paciente" oninput="formatoRut(this)" onblur="buscarPacienteExamen(event)" placeholder="12.345.678-9" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombres_paciente" placeholder="Ingrese sus nombres" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellido Paterno <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="apellido_paterno" placeholder="Ingrese apellido paterno" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellido Materno <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="apellido_materno" placeholder="Ingrese apellido materno" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fecha_nacimiento" placeholder="Seleccione fecha" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo <span class="text-danger">*</span></label>
                            <select class="form-select" id="sexo_paciente" required>
                                <option value="">Seleccione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="telefono_paciente" placeholder="+56 9 1234 5678" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_paciente" placeholder="correo@ejemplo.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Región</label>
                            <select class="form-select" id="region_paciente">
                                <option value="">Seleccione región</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ciudad</label>
                            <select class="form-select" id="ciudad_paciente">
                                <option value="">Seleccione ciudad</option>
                            </select>
                        </div>
                        <div class="col-9 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion_paciente" placeholder="Calle, número, departamento">
                        </div>
                        <div class="col-3 mb-3">
                            <label class="form-label">N° </label>
                            <input type="text" class="form-control" id="numero_direccion" placeholder="Número">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" onclick="irPaso(1)">
                            <i class="fas fa-arrow-left me-2"></i> Anterior
                        </button>
                        <button type="button" class="btn btn-primary" onclick="validarYContinuar(2)">
                            Siguiente <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- PASO 3: Fecha y Hora -->
                <div class="form-section" id="step3">
                    <h4 class="mb-4"><i class="fas fa-calendar-alt me-2 text-primary"></i>Seleccione Fecha y Hora</h4>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sucursal <span class="text-danger">*</span></label>
                            <select class="form-select" id="sucursal" required>
                                <option value="">Seleccione una sucursal</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fecha_examen" placeholder="Seleccione fecha" required>
                        </div>
                    </div>

                    <!-- Profesionales disponibles -->
                    <div id="div_profesionales_container" class="mb-4" style="display: none;">
                        <h5 class="mb-3"><i class="fas fa-user-md me-2"></i>Profesionales disponibles</h5>
                        <div id="div_resultado_busqueda_examen" class="row">
                            <!-- Aquí se cargarán los profesionales -->
                        </div>
                    </div>

                    <div id="horas_disponibles" class="mb-4">
                        <h5 class="mb-3">Horas disponibles</h5>
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-clock fa-3x mb-3"></i>
                            <p>Seleccione una sucursal y fecha para ver horas disponibles</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" onclick="irPaso(2)">
                            <i class="fas fa-arrow-left me-2"></i> Anterior
                        </button>
                        <button type="button" class="btn btn-primary" onclick="validarYContinuar(3)" id="btn_siguiente_3">
                            Siguiente <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- PASO 4: Confirmación -->
                <div class="form-section" id="step4">
                    <h4 class="mb-4"><i class="fas fa-check-circle me-2 text-primary"></i>Confirmación de Reserva</h4>

                    <div class="alert alert-custom alert-warning mb-4">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Por favor, revise los datos antes de confirmar su reserva
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><i class="fas fa-stethoscope me-2"></i>Exámenes Seleccionados</h5>
                            <div id="resumen_examenes"></div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><i class="fas fa-user me-2"></i>Datos del Paciente</h5>
                            <div id="resumen_paciente"></div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><i class="fas fa-calendar-alt me-2"></i>Fecha y Hora</h5>
                            <div id="resumen_fecha_hora"></div>
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="acepto_terminos" required>
                        <label class="form-check-label" for="acepto_terminos">
                            Acepto los <a href="#" class="text-primary">términos y condiciones</a> y autorizo el tratamiento de mis datos personales
                        </label>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" onclick="irPaso(3)">
                            <i class="fas fa-arrow-left me-2"></i> Anterior
                        </button>
                        <button type="button" class="btn btn-success btn-lg" onclick="confirmarReserva()" id="btn_confirmar">
                            <i class="fas fa-check me-2"></i> Confirmar Reserva
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Éxito -->
    <div class="modal fade" id="modalExito" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    <h3 class="mb-3">¡Reserva Confirmada!</h3>
                    <p class="mb-4">Su hora ha sido reservada exitosamente. Recibirá un correo de confirmación con los detalles.</p>
                    <p><strong>Número de reserva:</strong> <span id="numero_reserva" class="text-primary"></span></p>
                    <button type="button" class="btn btn-primary mt-3" onclick="location.reload()">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var examenesSeleccionados = [];
        var horaSeleccionada = null;
        var datosReserva = {};

        $(document).ready(function() {
            inicializarComponentes();
            cargarExamenes();
            cargarSucursales();
            cargarRegiones();
        });

        function inicializarComponentes() {
            // Flatpickr para fecha de nacimiento
            flatpickr("#fecha_nacimiento", {
                locale: "es",
                dateFormat: "d-m-Y",
                maxDate: "today",
                yearSelectorType: "dropdown"
            });

            // Flatpickr para fecha de examen
            flatpickr("#fecha_examen", {
                locale: "es",
                dateFormat: "d-m-Y",
                minDate: "today",
                maxDate: new Date().fp_incr(60), // 60 días adelante
                onChange: function(selectedDates, dateStr, instance) {
                    if (dateStr && $('#sucursal').val()) {
                        cargarHorasDisponibles();
                    }
                }
            });

            // Select2 para sucursal
            $('#sucursal').select2({
                theme: 'bootstrap-5',
                placeholder: 'Seleccione una sucursal'
            });

            // Evento cambio de sucursal
            $('#sucursal').on('change', function() {
                let sucursal_seleccionada = $(this).val();

                if(sucursal_seleccionada) {
                    // Buscar profesionales disponibles
                    buscar_profesionales_examen();

                    // Si también hay fecha, cargar horas
                    if($('#fecha_examen').val()) {
                        cargarHorasDisponibles();
                    }
                } else {
                    // Ocultar profesionales si no hay sucursal
                    $('#div_profesionales_container').hide();
                    $('#div_resultado_busqueda_examen').empty();
                }
            });

            // Búsqueda de exámenes
            $('#buscar_examen').on('keyup', function() {
                var texto = $(this).val().toLowerCase();
                $('.examen-card').each(function() {
                    var nombre = $(this).find('.examen-nombre').text().toLowerCase();
                    $(this).toggle(nombre.indexOf(texto) > -1);
                });
            });

            // Formatear RUT
            $('#rut_paciente').on('blur', function() {
                var rut = $(this).val();
                if (rut) {
                    $(this).val(formatearRUT(rut));
                }
            });

            // Evento cambio de región
            $('#region_paciente').on('change', function() {
                var id_region = $(this).val();
                if(id_region) {
                    cargarCiudades(id_region);
                } else {
                    $('#ciudad_paciente').html('<option value="">Seleccione ciudad</option>');
                }
            });
        }

        function cargarRegiones() {
            $.ajax({
                url: 'https://med-sdi.cl/api/dame_regiones',
                type: 'GET',
                success: function(response) {
                    console.log('Regiones:', response);
                    var options = '<option value="">Seleccione región</option>';

                    // Verificar si la respuesta es un array o un objeto con regiones
                    var regiones = response.regiones || JSON.parse(response);

                    if(Array.isArray(regiones)) {
                        regiones.forEach(function(region) {
                            options += `<option value="${region.id}">${region.nombre}</option>`;
                        });
                    }

                    $('#region_paciente').html(options);
                },
                error: function(xhr, status, error) {
                    console.log('Error al cargar regiones:', error);
                }
            });
        }

        function cargarCiudades(id_region) {
            console.log('Cargando ciudades para región ID:', id_region);
            // Mostrar loader en el select de ciudades
            $('#ciudad_paciente').html('<option value="">Cargando ciudades...</option>');

            return $.ajax({
                url: 'https://med-sdi.cl/api/buscar_ciudad_region',
                type: 'GET',
                data: {
                    region: id_region
                },
                success: function(response) {
                    console.log('Ciudades:', JSON.parse(response));
                    var options = '<option value="">Seleccione ciudad</option>';

                    // Verificar si la respuesta es un array o un objeto con ciudades
                    var ciudades = JSON.parse(response) || response;

                    if(Array.isArray(ciudades)) {
                        ciudades.forEach(function(ciudad) {
                            options += `<option value="${ciudad.id}">${ciudad.nombre}</option>`;
                        });
                    }

                    $('#ciudad_paciente').html(options);
                },
                error: function(xhr, status, error) {
                    console.log('Error al cargar ciudades:', error);
                    $('#ciudad_paciente').html('<option value="">Error al cargar ciudades</option>');
                }
            });
        }

        function cargarExamenes() {
            $.ajax({
                url: 'https://med-sdi.cl/api/buscar_examenes_cm', // Ajusta esta ruta
                type: 'post',
                data:{
                    id_centro_medico: 83
                },
                success: function(response) {
                    console.log(response);
                    renderizarExamenes(response);
                },
                error: function() {
                    $('#lista_examenes').html(
                        '<div class="alert alert-danger">Error al cargar los exámenes. Por favor, intente nuevamente.</div>'
                    );
                }
            });
        }

        function renderizarExamenes(examenes) {
            var html = '';
            examenes.forEach(function(examen) {
                html += `
                    <div class="examen-card" data-id="${examen.id}">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="${examen.id}"
                                   id="examen_${examen.id}" onchange="toggleExamen(${examen.id}, '${examen.nombre}', ${examen.cantidad_bloques})">
                            <label class="form-check-label w-100" for="examen_${examen.id}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="examen-nombre">${examen.nombre}</strong>
                                        <p class="mb-0 text-muted small">${examen.descripcion || 'Examen médico'}</p>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-info">${examen.cantidad_bloques} bloques</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                `;
            });
            $('#lista_examenes').html(html);
        }

        function toggleExamen(id, nombre, bloques) {
            var index = examenesSeleccionados.findIndex(e => e.id === id);

            if (index === -1) {
                examenesSeleccionados.push({ id: id, nombre: nombre, bloques: bloques });
                $(`.examen-card[data-id="${id}"]`).addClass('selected');
            } else {
                examenesSeleccionados.splice(index, 1);
                $(`.examen-card[data-id="${id}"]`).removeClass('selected');
            }

            actualizarContadorExamenes();
        }

        function actualizarContadorExamenes() {
            var count = examenesSeleccionados.length;
            $('#count_examenes').text(count);

            if (count > 0) {
                $('#info_examenes_seleccionados').removeClass('d-none');
                $('#btn_siguiente_1').prop('disabled', false);
            } else {
                $('#info_examenes_seleccionados').addClass('d-none');
                $('#btn_siguiente_1').prop('disabled', true);
            }
        }

        function cargarSucursales() {
            $.ajax({
                url: 'https://med-sdi.cl/api/buscar_sucursales_laboratorio', // Ajusta esta ruta
                type:'post',
                data:{
                    id_laboratorio: 83 // Ajusta este ID según tu laboratorio
                },
                success: function(response) {
                    console.log(response);
                    var options = '<option value="">Seleccione una sucursal</option>';
                    response.forEach(function(sucursal) {
                        options += `<option value="${sucursal.id}">${sucursal.nombre} - ${sucursal.direccion}</option>`;
                    });
                    $('#sucursal').html(options);
                }
            });
        }

        // Buscar profesionales que realizan los exámenes seleccionados
		function buscar_profesionales_examen(){
			// Obtener los IDs de los exámenes seleccionados
			let examenes_ids = examenesSeleccionados.map(e => e.id);
			let id_sucursal = $('#sucursal').val();

			if(!examenes_ids || examenes_ids.length == 0){
				$('#div_profesionales_container').hide();
				$('#div_resultado_busqueda_examen').empty();
				return;
			}

			if(!id_sucursal || id_sucursal == ''){
				$('#div_profesionales_container').hide();
				$('#div_resultado_busqueda_examen').empty();
				return;
			}

			// Mostrar loader
			$('#div_profesionales_container').show();
			$('#div_resultado_busqueda_examen').html('<div class="col-12 text-center py-4"><div class="loader"></div><p class="mt-3 text-muted">Buscando profesionales disponibles...</p></div>');

			console.log('Buscando profesionales para exámenes:', examenes_ids);
			console.log('En sucursal:', id_sucursal);

			let url = "https://med-sdi.cl/api/buscar_profesionales_examen";
			$.ajax({
				url: url,
				type:'post',
				data:{
					examenes: examenes_ids,
					id_sucursal: id_sucursal
				},
				success: function(resp){
					console.log('Respuesta profesionales:', resp);
					let profesionales = resp.profesionales || resp;
					$('#div_resultado_busqueda_examen').empty();

					if(profesionales && profesionales.length > 0){
						profesionales.forEach(p => {
							var html = '';
							html += '<div class="col-sm-12 col-md-4 mb-3">';
							html += '  <div class="card shadow-sm border-0 rounded-3 p-3 text-center h-100 profesional-card" data-profesional-id="'+p.id+'" style="cursor: pointer; transition: all 0.3s;">';
							html += '    <img src="https://www.med-sdi.cl/images/iconos/usuario_profesional.svg" alt="'+p.nombre+' '+p.apellido_uno+'" class="rounded-circle mx-auto d-block mb-3" style="width: 80px; height: 80px;">';
							html += '    <h6 class="fw-bold">'+p.nombre+' '+p.apellido_uno+(p.apellido_dos ? ' '+p.apellido_dos : '')+'</h6>';
							html += '    <p class="text-muted mb-3 small">Disponible para realizar examen</p>';
							html += '    <button type="button" class="btn btn-primary btn-sm" onclick="seleccionar_profesional_examen('+p.id+', \''+p.nombre+' '+p.apellido_uno+(p.apellido_dos ? ' '+p.apellido_dos : '')+'\')">Seleccionar</button>';
							html += '  </div>';
							html += '</div>';
							$('#div_resultado_busqueda_examen').append(html);
						});

						// Agregar efecto hover a las tarjetas
						$('.profesional-card').hover(
							function() {
								$(this).css('transform', 'translateY(-5px)');
								$(this).css('box-shadow', '0 5px 20px rgba(0,0,0,0.15)');
							},
							function() {
								$(this).css('transform', 'translateY(0)');
								$(this).css('box-shadow', '');
							}
						);
					} else {
						$('#div_resultado_busqueda_examen').html('<div class="col-12"><div class="alert alert-info text-center"><i class="fas fa-info-circle me-2"></i>No hay profesionales disponibles para estos exámenes en esta sucursal.</div></div>');
					}
				},
				error: function(error){
					console.log('Error al buscar profesionales:', error.responseText);
					$('#div_resultado_busqueda_examen').html('<div class="col-12"><div class="alert alert-danger text-center"><i class="fas fa-exclamation-triangle me-2"></i>Error al buscar profesionales. Por favor, intente nuevamente.</div></div>');
				}
			});
		}

		// Variable para almacenar el profesional seleccionado
		var profesionalSeleccionado = null;
		var flatpickrInstance = null;

		// Seleccionar profesional para realizar el examen
		function seleccionar_profesional_examen(id_profesional, nombre_profesional){
			// Validar que exista un paciente
			let id_paciente = $('#id_paciente').val();
			if(!id_paciente || id_paciente == '0' || id_paciente == ''){
				Swal.fire({
					icon: 'warning',
					title: 'Atención',
					text: 'Debe completar los datos del paciente primero (Paso 2)',
				});
				return;
			}

			// Remover selección anterior
			$('.profesional-card').removeClass('border-primary').css('border-width', '');
			$('.profesional-card .btn').removeClass('btn-success').addClass('btn-primary').text('Seleccionar');

			// Marcar como seleccionado
			$('.profesional-card[data-profesional-id="'+id_profesional+'"]')
				.addClass('border-primary')
				.css('border-width', '3px');

			$('.profesional-card[data-profesional-id="'+id_profesional+'"] .btn')
				.removeClass('btn-primary')
				.addClass('btn-success')
				.html('<i class="fas fa-check me-2"></i>Seleccionado');

			// Guardar profesional seleccionado
			profesionalSeleccionado = {
				id: id_profesional,
				nombre: nombre_profesional
			};

			console.log('Profesional seleccionado:', profesionalSeleccionado);

			// Cargar horarios disponibles del profesional
			cargarHorariosProfesional(id_profesional, nombre_profesional);
		}

		// Cargar horarios disponibles del profesional
		function cargarHorariosProfesional(id_profesional, nombre_profesional){
			let id_paciente = $('#id_paciente').val();
			let id_sucursal = $('#sucursal').val();
			let id_lugar_atencion = 83;

			// Mostrar loader
			Swal.fire({
				title: 'Cargando horarios...',
				text: 'Obteniendo disponibilidad de ' + nombre_profesional,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading();
				}
			});

			let url = 'https://med-sdi.cl/api/horas_examen_profesional_lugar_atencion';

			$.ajax({
				url: url,
				type: "get",
				data: {
					id_profesional: id_profesional,
					id_sucursal: id_sucursal,
					id_paciente: id_paciente,
					id_lugar_atencion: id_lugar_atencion
				},
				success: function(data) {
					console.log('Horarios disponibles:', data);
					Swal.close();

					if (data.estado == 1 && data.registros.horario_agenda_laboral != '') {
						let dias = ['', 'LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO', 'DOMINGO'];
						var dias_activos = data.registros.horario_agenda_laboral.split(',');
						var dias_texto = '';
						var cant = 0;

						$.each(dias_activos, function(index, value) {
							if(cant > 0)
								dias_texto += ' - ' + dias[value];
							else
								dias_texto += dias[value];
							cant++;
						});

						console.log('Días disponibles:', dias_texto);

						// Destruir instancia anterior de flatpickr si existe
						if(flatpickrInstance) {
							flatpickrInstance.destroy();
						}

						// Reinicializar flatpickr con días específicos habilitados
						flatpickrInstance = flatpickr("#fecha_examen", {
							locale: "es",
							dateFormat: "d-m-Y",
							minDate: "today",
							maxDate: new Date().fp_incr(60),
							disable: [
								function(date) {
									// Deshabilitar días que NO están en dias_activos
									return !dias_activos.includes(String(date.getDay()));
								}
							],
							onChange: function(selectedDates, dateStr, instance) {
								if (dateStr && $('#sucursal').val()) {
									cargarHorasDisponibles();
								}
							}
						});

						// Habilitar el campo de fecha
						$('#fecha_examen').prop('disabled', false);

						// Mostrar mensaje de éxito
						Swal.fire({
							icon: 'success',
							title: 'Horarios cargados',
							html: '<strong>' + nombre_profesional + '</strong> atiende los días:<br><strong>' + dias_texto + '</strong>',
							timer: 2500,
							showConfirmButton: false
						});

					} else {
						// No hay horarios disponibles
						Swal.fire({
							icon: 'warning',
							title: 'Sin horarios',
							text: 'Este profesional no tiene horarios disponibles configurados',
						});

						// Deshabilitar fecha
						$('#fecha_examen').prop('disabled', true).val('');
					}
				},
				error: function(jqXHR, ajaxOptions, thrownError) {
					console.log('Error al cargar horarios:', jqXHR, ajaxOptions, thrownError);
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Error al cargar la disponibilidad del profesional',
					});
				}
			});
		}

        function cargarHorasDisponibles() {
            var fecha = $('#fecha_examen').val();
            var sucursal = $('#sucursal').val();

            // Validar que haya un profesional seleccionado
            if(!profesionalSeleccionado || !profesionalSeleccionado.id) {
                $('#horas_disponibles').html(
                    '<div class="alert alert-warning text-center"><i class="fas fa-exclamation-triangle me-2"></i>Debe seleccionar un profesional primero</div>'
                );
                return;
            }

            if(!fecha) {
                $('#horas_disponibles').html(
                    '<div class="text-center text-muted py-4"><i class="fas fa-clock fa-3x mb-3"></i><p>Seleccione una fecha para ver horas disponibles</p></div>'
                );
                return;
            }

            let id_profesional = profesionalSeleccionado.id;
            let id_lugar_atencion = 83;

            console.log('Cargando horas disponibles para:', {
                fecha: fecha,
                profesional: id_profesional,
                sucursal: sucursal
            });

            $('#horas_disponibles').html('<div class="text-center py-4"><div class="loader"></div><p class="mt-3 text-muted">Cargando horas disponibles...</p></div>');

            let url = 'https://med-sdi.cl/api/horas_disponibles_profesional_lugar_atencion';
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    dia: fecha
                },
                success: function(data) {
                    console.log('Horas disponibles:', data);

                    if (data.estado == 1 && data.registros && data.registros.length > 0) {
                        let htmlTitle = '<h5 class="mb-3">Horas disponibles para el día: ' + data.text_fecha + '</h5>';
                        let htmlHoras = '<div class="row">';

                        $.each(data.registros, function(index, value) {
                            // Formatear hora (eliminar segundos si vienen)
                            let hora = value.hora;
                            if(hora.length > 5) {
                                hora = hora.substring(0, 5);
                            }

                            htmlHoras += `
                                <div class="col-md-3 col-6 mb-2">
                                    <div class="hora-slot" data-hora="${value.hora}" onclick="seleccionarHora('${value.hora}')">
                                        <i class="fas fa-clock me-2"></i>${hora}
                                    </div>
                                </div>
                            `;
                        });

                        htmlHoras += '</div>';
                        $('#horas_disponibles').html(htmlTitle + htmlHoras);

                    } else {
                        $('#horas_disponibles').html(
                            '<div class="alert alert-info text-center"><i class="fas fa-info-circle me-2"></i><strong>Sin disponibilidad de horas</strong><br>No hay horas disponibles para la fecha seleccionada.</div>'
                        );
                    }
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Error al cargar horas:', jqXHR, ajaxOptions, thrownError);
                    $('#horas_disponibles').html(
                        '<div class="alert alert-danger text-center"><i class="fas fa-exclamation-triangle me-2"></i>Error al cargar horas disponibles. Por favor, intente nuevamente.</div>'
                    );
                }
            });
        }


        function seleccionarHora(hora) {
            $('.hora-slot').removeClass('selected');
            event.target.closest('.hora-slot').classList.add('selected');
            horaSeleccionada = hora;
            $('#btn_siguiente_3').prop('disabled', false);
        }

        function irPaso(paso) {
            console.log('irPaso llamado con paso:', paso);

            $('.form-section').removeClass('active').hide();
            $('.step').removeClass('active completed');

            $(`#step${paso}`).addClass('active').show();

            // Forzar estilos inline para asegurar visibilidad
            $(`#step${paso}`).css({
                'display': 'block',
                'visibility': 'visible',
                'opacity': '1',
                'min-height': '400px',
                'padding': '20px 0'
            });

            // Forzar que los hijos sean visibles
            $(`#step${paso} > *`).css('display', 'block');
            $(`#step${paso} .row`).css('display', 'flex');
            $(`#step${paso} .d-flex`).css('display', 'flex');

            console.log('Display del paso después de forzar:', $(`#step${paso}`).css('display'));
            console.log('Altura del paso:', $(`#step${paso}`).height());

            // Marcar pasos anteriores como completados
            for (let i = 1; i < paso; i++) {
                $(`.step[data-step="${i}"]`).addClass('completed');
            }

            // Marcar el paso actual como activo
            $(`.step[data-step="${paso}"]`).addClass('active');

            $('html, body').animate({ scrollTop: 0 }, 300);
            if (paso === 4) {
                generarResumen();
            }
            console.log('irPaso finalizado');
        }

        function validarYContinuar(pasoActual) {
            console.log('validarYContinuar llamado con paso:', pasoActual);

            if (pasoActual === 2) {
                console.log('Validando paso 2');
                if (!validarDatosPaciente()) {
                    console.log('Validación de datos falló');
                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos incompletos',
                        text: 'Por favor, complete todos los campos obligatorios'
                    });
                    return;
                }

                // Verificar si el paciente ya existe (fue encontrado por RUT)
                let id_paciente = $('#id_paciente').val();
                console.log('ID Paciente:', id_paciente);

                if(!id_paciente || id_paciente == '0' || id_paciente == '') {
                    console.log('Paciente no existe, registrando...');
                    // Paciente no existe, registrarlo primero
                    registrarPacienteNuevo();
                    return; // La función registrarPacienteNuevo() continuará al siguiente paso
                }
                console.log('Paciente existe, continuando...');
                // Si el paciente existe, continuar normalmente
            }

            if (pasoActual === 3) {
                if (!$('#sucursal').val() || !$('#fecha_examen').val() || !horaSeleccionada) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Selección incompleta',
                        text: 'Por favor, seleccione sucursal, fecha y hora'
                    });
                    return;
                }
            }

            console.log('Llamando a irPaso con:', pasoActual + 1);
            irPaso(pasoActual + 1);
        }

        function registrarPacienteNuevo() {
            // Mostrar loader
            Swal.fire({
                title: 'Registrando paciente...',
                text: 'Por favor espere',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Preparar datos del paciente
            let datosNuevoPaciente = {
                rut: $('#rut_paciente').val(),
                nombres: $('#nombres_paciente').val(),
                apellido_uno: $('#apellido_paterno').val(),
                apellido_dos: $('#apellido_materno').val(),
                fecha_nacimiento: $('#fecha_nacimiento').val(),
                sexo: $('#sexo_paciente').val(),
                telefono: $('#telefono_paciente').val(),
                email: $('#email_paciente').val(),
                region: $('#region_paciente').val(),
                comuna: $('#ciudad_paciente').val(),
                direccion: $('#direccion_paciente').val(),
                numero: $('#numero_direccion').val(),
                id_lugar_atencion: 83
            };

            console.log('Registrando nuevo paciente:', datosNuevoPaciente);

            let url = 'https://med-sdi.cl/api/insertPaciente';

            $.ajax({
                url: url,
                type: 'POST',
                data: datosNuevoPaciente,
                success: function(response) {
                    console.log('Respuesta registro paciente:', response);

                    if(response.estado == 1 || response.estado == 'ok' || response.success) {
                        // Obtener ID del paciente creado
                        let id_paciente = response.id_paciente || response.id || response.paciente?.id;

                        if(id_paciente) {
                            // Guardar ID del paciente
                            if(!$('#id_paciente').length){
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'id_paciente',
                                    name: 'id_paciente',
                                    value: id_paciente
                                }).appendTo('#step2');
                            } else {
                                $('#id_paciente').val(id_paciente);
                            }

                            Swal.fire({
                                icon: 'success',
                                title: '¡Paciente registrado!',
                                text: 'Sus datos han sido registrados exitosamente.',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                // Continuar al siguiente paso
                                irPaso(3);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudo obtener el ID del paciente registrado.'
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al registrar',
                            text: response.msj || response.mensaje || 'No se pudo registrar el paciente. Por favor, intente nuevamente.'
                        });
                    }
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Error al registrar paciente:', jqXHR, ajaxOptions, thrownError);

                    let errorMsg = 'Error al registrar el paciente.';

                    if(jqXHR.responseJSON) {
                        errorMsg = jqXHR.responseJSON.msj || jqXHR.responseJSON.mensaje || jqXHR.responseJSON.message || errorMsg;
                    } else if(jqXHR.responseText) {
                        try {
                            let response = JSON.parse(jqXHR.responseText);
                            errorMsg = response.msj || response.mensaje || response.message || errorMsg;
                        } catch(e) {
                            // No se pudo parsear
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMsg
                    });
                }
            });
        }

        function validarDatosPaciente() {
            var campos = ['rut_paciente', 'nombres_paciente', 'apellido_paterno', 'apellido_materno',
                          'fecha_nacimiento', 'sexo_paciente', 'telefono_paciente', 'email_paciente'];

            for (var campo of campos) {
                if (!$('#' + campo).val()) {
                    return false;
                }
            }
            return true;
        }

        function generarResumen() {
            // Resumen exámenes
            var htmlExamenes = '';
            console.log('Exámenes seleccionados para resumen:', examenesSeleccionados);
            examenesSeleccionados.forEach(function(examen) {
                htmlExamenes += `
                    <div class="resumen-item">
                        <span class="resumen-label"><i class="fas fa-check-circle text-success me-2"></i>${examen.nombre}</span>
                        <span class="resumen-value">${examen.bloques} bloques</span>
                    </div>
                `;
            });
            $('#resumen_examenes').html(htmlExamenes);

            // Resumen paciente
            var htmlPaciente = `
                <div class="resumen-item">
                    <span class="resumen-label">RUT:</span>
                    <span class="resumen-value">${$('#rut_paciente').val()}</span>
                </div>
                <div class="resumen-item">
                    <span class="resumen-label">Nombre:</span>
                    <span class="resumen-value">${$('#nombres_paciente').val()} ${$('#apellido_paterno').val()} ${$('#apellido_materno').val()}</span>
                </div>
                <div class="resumen-item">
                    <span class="resumen-label">Fecha Nacimiento:</span>
                    <span class="resumen-value">${$('#fecha_nacimiento').val()}</span>
                </div>
                <div class="resumen-item">
                    <span class="resumen-label">Teléfono:</span>
                    <span class="resumen-value">${$('#telefono_paciente').val()}</span>
                </div>
                <div class="resumen-item">
                    <span class="resumen-label">Email:</span>
                    <span class="resumen-value">${$('#email_paciente').val()}</span>
                </div>
            `;
            $('#resumen_paciente').html(htmlPaciente);

            // Resumen fecha/hora
            var sucursalNombre = $('#sucursal option:selected').text();
            var htmlFechaHora = `
                <div class="resumen-item">
                    <span class="resumen-label">Sucursal:</span>
                    <span class="resumen-value">${sucursalNombre}</span>
                </div>
            `;

            // Agregar profesional si fue seleccionado
            if(profesionalSeleccionado) {
                htmlFechaHora += `
                    <div class="resumen-item">
                        <span class="resumen-label">Profesional:</span>
                        <span class="resumen-value">${profesionalSeleccionado.nombre}</span>
                    </div>
                `;
            }

            htmlFechaHora += `
                <div class="resumen-item">
                    <span class="resumen-label">Fecha:</span>
                    <span class="resumen-value">${$('#fecha_examen').val()}</span>
                </div>
                <div class="resumen-item">
                    <span class="resumen-label">Hora:</span>
                    <span class="resumen-value">${horaSeleccionada}</span>
                </div>
            `;
            $('#resumen_fecha_hora').html(htmlFechaHora);
        }

        function confirmarReserva() {
            if (!$('#acepto_terminos').is(':checked')) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Términos y condiciones',
                    text: 'Debe aceptar los términos y condiciones para continuar'
                });
                return;
            }

            // Deshabilitar botón y mostrar loader
            $('#btn_confirmar').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Procesando...');

            // Preparar datos para la reserva
            let id_paciente = $('#id_paciente').val();
            let id_profesional = profesionalSeleccionado ? profesionalSeleccionado.id : null;
            let id_sucursal = $('#sucursal').val();
            let fecha_examen = $('#fecha_examen').val();
            let hora = horaSeleccionada;
            let examenes_seleccionados = examenesSeleccionados.map(e => e.id);

            // Validar datos requeridos
            if(!id_paciente || !id_profesional || !id_sucursal || !fecha_examen || !hora || examenes_seleccionados.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Datos incompletos',
                    text: 'Por favor, complete todos los datos requeridos'
                });
                $('#btn_confirmar').prop('disabled', false).html('<i class="fas fa-check me-2"></i> Confirmar Reserva');
                return;
            }

            console.log('Datos de reserva:', {
                id_paciente: id_paciente,
                id_profesional: id_profesional,
                id_sucursal: id_sucursal,
                fecha: fecha_examen,
                hora: hora,
                examenes: examenes_seleccionados
            });

            // Llamar API para crear la reserva
            let url = 'https://med-sdi.cl/api/confirmar_reserva_examen';

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id_paciente: id_paciente,
                    id_profesional: id_profesional,
                    id_lugar_atencion: 83,
                    id_sucursal: id_sucursal,
                    fecha_examen: fecha_examen,
                    hora_examen: hora,
                    examenes: examenes_seleccionados,
                    rut: $('#rut_paciente').val(),
                    nombres: $('#nombres_paciente').val(),
                    apellido_paterno: $('#apellido_paterno').val(),
                    apellido_materno: $('#apellido_materno').val(),
                    fecha_nacimiento: $('#fecha_nacimiento').val(),
                    sexo: $('#sexo_paciente').val(),
                    telefono: $('#telefono_paciente').val(),
                    email: $('#email_paciente').val(),
                    direccion: $('#direccion_paciente').val(),
                    numero: $('#numero_direccion').val(),
                    total_bloques: examenesSeleccionados.reduce((sum, e) => sum + e.bloques, 0)
                }
            })
            .done(function(data) {
                console.log('Respuesta reserva:', data);

                // Cerrar el modal de confirmación si existe (Bootstrap 5)
                let modalExito = bootstrap.Modal.getInstance(document.getElementById('modalExito'));

                // Esperar 300ms antes de mostrar mensaje
                setTimeout(function() {
                    // Limpiar estilos del body por si acaso
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open').css({'padding-right': '', 'overflow': ''});

                    if (data.estado == 1) {
                        // Obtener número de reserva
                        let numero_reserva = data.numero_reserva || data.id_reserva || data.id || 'Confirmada';
                        $('#numero_reserva').text(numero_reserva);

                        // Mostrar modal de éxito
                        $('#modalExito').modal('show');

                        // Limpiar formulario después de cerrar el modal
                        $('#modalExito').on('hidden.bs.modal', function() {
                            location.reload();
                        });

                    } else {
                        // Error en la respuesta
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.msj || data.mensaje || 'No se pudo confirmar la reserva del examen. Intente nuevamente.',
                            confirmButtonColor: '#007bff'
                        });
                        $('#btn_confirmar').prop('disabled', false).html('<i class="fas fa-check me-2"></i> Confirmar Reserva');
                    }
                }, 300);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Error al crear reserva:', jqXHR, ajaxOptions, thrownError);

                // Esperar 300ms antes de mostrar mensaje
                setTimeout(function() {
                    // Limpiar estilos del body por si acaso
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open').css({'padding-right': '', 'overflow': ''});

                    let errorMsg = 'Ocurrió un error al procesar su solicitud. Intente nuevamente.';

                    // Intentar obtener mensaje de error del servidor
                    if(jqXHR.responseJSON) {
                        errorMsg = jqXHR.responseJSON.msj || jqXHR.responseJSON.mensaje || jqXHR.responseJSON.message || errorMsg;
                    } else if(jqXHR.responseText) {
                        try {
                            let response = JSON.parse(jqXHR.responseText);
                            errorMsg = response.msj || response.mensaje || response.message || errorMsg;
                        } catch(e) {
                            // No se pudo parsear, usar mensaje por defecto
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMsg,
                        confirmButtonColor: '#007bff'
                    });

                    $('#btn_confirmar').prop('disabled', false).html('<i class="fas fa-check me-2"></i> Confirmar Reserva');
                }, 300);
            });
        }

        function formatearRUT(rut) {
            rut = rut.replace(/\./g, '').replace(/-/g, '');
            if (rut.length > 1) {
                var cuerpo = rut.slice(0, -1);
                var dv = rut.slice(-1);
                cuerpo = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return cuerpo + '-' + dv;
            }
            return rut;
        }

        function buscarPacienteExamen(event){
			var rut = $('#rut_paciente').val();
			if(rut == ''){
				return false;
			}

			// Mostrar indicador de carga
			$('#rut_paciente').prop('disabled', true);

			let url = 'https://med-sdi.cl/api/buscar_paciente';
			$.ajax({
				url: url,
				type: 'GET',
				data: {
					rut: rut
				},
				success: function(response){
                    console.log(response);
					if(response.estado == 'ok'){
						let paciente = response.paciente;
						console.log(paciente);

						// Rellenar formulario con datos del paciente
						$('#nombres_paciente').val(paciente.nombres || '');
						$('#apellido_paterno').val(paciente.apellido_uno || paciente.apellido_paterno || '');
						$('#apellido_materno').val(paciente.apellido_dos || paciente.apellido_materno || '');
						$('#email_paciente').val(paciente.email || '');
						$('#telefono_paciente').val(paciente.telefono_uno || paciente.telefono || '');
                        $('#region_paciente').val(paciente.ciudad.id_region || '');
                        //cargarCiudades(paciente.ciudad.id_region);
                        // setTimeout(() => {
                        //     $('#ciudad_paciente').val(paciente.ciudad.id || '');
                        // }, 500);

						// Fecha de nacimiento (convertir formato si es necesario)
						if(paciente.fecha_nac || paciente.fecha_nacimiento){
							let fecha = paciente.fecha_nac || paciente.fecha_nacimiento;
							// Convertir formato yyyy-mm-dd a dd-mm-yyyy si es necesario
							if(fecha.includes('-')){
								let partes = fecha.split('-');
								if(partes[0].length === 4){
									// Formato yyyy-mm-dd, convertir a dd-mm-yyyy
									fecha = partes[2] + '-' + partes[1] + '-' + partes[0];
								}
							}
							$('#fecha_nacimiento').val(fecha);
						}

						// Sexo
						if(paciente.sexo){
							$('#sexo_paciente').val(paciente.sexo.toUpperCase());
						}

						// Región y ciudad
						if(paciente.ciudad.id_region){
							$('#region_paciente').val(paciente.ciudad.id_region);
							// Cargar ciudades de la región seleccionada
							if(paciente.ciudad.id){
								cargarCiudades(paciente.ciudad.id_region).then(() => {
									$('#ciudad_paciente').val(paciente.ciudad.id || '');
								});
							} else {
								cargarCiudades(paciente.id_region);
							}
						}

						// Dirección
						if(paciente.direccion){
							let direccion = '';
							if(typeof paciente.direccion === 'object'){
								direccion = paciente.direccion.direccion + ' Nº ' + paciente.direccion.numero_dir;
							} else {
								direccion = paciente.direccion;
							}
							$('#direccion_paciente').val(direccion);
						}

						// Guardar ID del paciente
						if(!$('#id_paciente').length){
							$('<input>').attr({
								type: 'hidden',
								id: 'id_paciente',
								name: 'id_paciente',
								value: paciente.id
							}).appendTo('#step2');
						} else {
							$('#id_paciente').val(paciente.id);
						}

						// Mostrar mensaje de éxito
						Swal.fire({
							icon: 'success',
							title: '¡Paciente encontrado!',
							text: `Hola ${paciente.nombres}! Tus datos se han cargado correctamente.`,
							timer: 2000,
							showConfirmButton: false
						});

					}else{
						// Paciente no encontrado - LIMPIAR FORMULARIO
						limpiarFormularioPaciente();

						// Permitir registro manual
						Swal.fire({
							icon: 'info',
							title: 'Paciente no encontrado',
							text: 'Por favor, complete sus datos para registrarse',
							confirmButtonText: 'Aceptar'
						});
					}
				},
				error: function(error){
					// En caso de error también limpiar
					limpiarFormularioPaciente();

					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Error al buscar paciente. Por favor, intente nuevamente.',
					});
				},
				complete: function(){
					// Rehabilitar campo RUT
					$('#rut_paciente').prop('disabled', false);
				}
			});
		}

		function limpiarFormularioPaciente() {
			// Limpiar todos los campos excepto el RUT
			$('#nombres_paciente').val('');
			$('#apellido_paterno').val('');
			$('#apellido_materno').val('');
			$('#fecha_nacimiento').val('');
			$('#sexo_paciente').val('');
			$('#telefono_paciente').val('');
			$('#email_paciente').val('');
			$('#region_paciente').val('');
			$('#ciudad_paciente').html('<option value="">Seleccione ciudad</option>');
			$('#direccion_paciente').val('');

			// Eliminar o vaciar el ID del paciente
			if($('#id_paciente').length){
				$('#id_paciente').val('');
			}

			console.log('Formulario de paciente limpiado');
		}

        function formatoRut(rut)
		{
			var valor = rut.value.replace('.','');
			valor = valor.replace(/\-/g,'');

			cuerpo = valor.slice(0,-1);
			dv = valor.slice(-1).toUpperCase();
			rut.value = cuerpo + '-'+ dv

			if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

			suma = 0;
			multiplo = 2;

			for(i=1;i<=cuerpo.length;i++)
			{
				index = multiplo * valor.charAt(cuerpo.length - i);
				suma = suma + index;
				if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
			}

			dvEsperado = 11 - (suma % 11);
			dv = (dv == 'K')?10:dv;
			dv = (dv == 0)?11:dv;

			if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

			rut.setCustomValidity('');
		}
    </script>
</body>
</html>
