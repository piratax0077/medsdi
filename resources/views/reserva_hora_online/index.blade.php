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
            animation: fadeIn 0.3s;
        }

        .form-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
                            <input type="text" class="form-control" id="rut_paciente" placeholder="12.345.678-9" required>
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
                        <div class="col-12 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion_paciente" placeholder="Calle, número, departamento">
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
                if ($(this).val() && $('#fecha_examen').val()) {
                    cargarHorasDisponibles();
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
        }

        function cargarExamenes() {
            $.ajax({
                url: '/api/examenes/listar', // Ajusta esta ruta
                type: 'GET',
                success: function(response) {
                    renderizarExamenes(response.examenes);
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
                                   id="examen_${examen.id}" onchange="toggleExamen(${examen.id}, '${examen.nombre}', ${examen.bloques})">
                            <label class="form-check-label w-100" for="examen_${examen.id}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="examen-nombre">${examen.nombre}</strong>
                                        <p class="mb-0 text-muted small">${examen.descripcion || 'Examen médico'}</p>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-info">${examen.bloques} bloques</span>
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
                url: '/api/sucursales/listar', // Ajusta esta ruta
                type: 'GET',
                success: function(response) {
                    var options = '<option value="">Seleccione una sucursal</option>';
                    response.sucursales.forEach(function(sucursal) {
                        options += `<option value="${sucursal.id}">${sucursal.nombre} - ${sucursal.direccion}</option>`;
                    });
                    $('#sucursal').html(options);
                }
            });
        }

        function cargarHorasDisponibles() {
            var fecha = $('#fecha_examen').val();
            var sucursal = $('#sucursal').val();
            var bloques_totales = examenesSeleccionados.reduce((sum, e) => sum + e.bloques, 0);

            $('#horas_disponibles').html('<div class="text-center py-4"><div class="loader"></div></div>');

            $.ajax({
                url: '/api/horas/disponibles', // Ajusta esta ruta
                type: 'GET',
                data: {
                    fecha: fecha,
                    id_sucursal: sucursal,
                    bloques_requeridos: bloques_totales
                },
                success: function(response) {
                    renderizarHorasDisponibles(response.horas);
                },
                error: function() {
                    $('#horas_disponibles').html(
                        '<div class="alert alert-danger">Error al cargar horas disponibles.</div>'
                    );
                }
            });
        }

        function renderizarHorasDisponibles(horas) {
            if (horas.length === 0) {
                $('#horas_disponibles').html(
                    '<div class="alert alert-info"><i class="fas fa-info-circle me-2"></i>No hay horas disponibles para la fecha seleccionada.</div>'
                );
                return;
            }

            var html = '<h5 class="mb-3">Horas disponibles</h5><div class="row">';
            horas.forEach(function(hora) {
                html += `
                    <div class="col-md-3 col-6">
                        <div class="hora-slot" onclick="seleccionarHora('${hora.hora}')">
                            <i class="fas fa-clock me-2"></i>${hora.hora}
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            $('#horas_disponibles').html(html);
        }

        function seleccionarHora(hora) {
            $('.hora-slot').removeClass('selected');
            event.target.closest('.hora-slot').classList.add('selected');
            horaSeleccionada = hora;
            $('#btn_siguiente_3').prop('disabled', false);
        }

        function irPaso(paso) {
            // Ocultar todas las secciones
            $('.form-section').removeClass('active');
            $('.step').removeClass('active completed');

            // Mostrar sección actual
            $(`#step${paso}`).addClass('active');
            $(`.step[data-step="${paso}"]`).addClass('active');

            // Marcar pasos anteriores como completados
            for (let i = 1; i < paso; i++) {
                $(`.step[data-step="${i}"]`).addClass('completed');
            }

            // Scroll al inicio
            $('html, body').animate({ scrollTop: 0 }, 300);

            // Generar resumen si es paso 4
            if (paso === 4) {
                generarResumen();
            }
        }

        function validarYContinuar(pasoActual) {
            if (pasoActual === 2) {
                if (!validarDatosPaciente()) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos incompletos',
                        text: 'Por favor, complete todos los campos obligatorios'
                    });
                    return;
                }
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

            irPaso(pasoActual + 1);
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

            $('#btn_confirmar').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Procesando...');

            var datosReserva = {
                examenes: examenesSeleccionados.map(e => e.id),
                rut: $('#rut_paciente').val(),
                nombres: $('#nombres_paciente').val(),
                apellido_paterno: $('#apellido_paterno').val(),
                apellido_materno: $('#apellido_materno').val(),
                fecha_nacimiento: $('#fecha_nacimiento').val(),
                sexo: $('#sexo_paciente').val(),
                telefono: $('#telefono_paciente').val(),
                email: $('#email_paciente').val(),
                direccion: $('#direccion_paciente').val(),
                id_sucursal: $('#sucursal').val(),
                fecha: $('#fecha_examen').val(),
                hora: horaSeleccionada
            };

            $.ajax({
                url: '/api/reservas/crear', // Ajusta esta ruta
                type: 'POST',
                data: JSON.stringify(datosReserva),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                success: function(response) {
                    $('#numero_reserva').text(response.numero_reserva);
                    $('#modalExito').modal('show');
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Error al procesar la reserva'
                    });
                    $('#btn_confirmar').prop('disabled', false).html('<i class="fas fa-check me-2"></i> Confirmar Reserva');
                }
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
    </script>
</body>
</html>
