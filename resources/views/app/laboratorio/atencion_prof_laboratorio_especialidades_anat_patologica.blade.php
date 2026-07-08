{{-- @extends('template.otros_profesionales.template_fono') --}}
@extends('template.laboratorio.laboratorio_profesional.template')
@section('page-script')
<script>
    // ========================================================================================
    // DESACTIVAR AUTO-DISCOVER DE DROPZONE (DEBE ESTAR ANTES DE DOCUMENT.READY)
    // ========================================================================================
    Dropzone.autoDiscover = false;

    // ========================================================================================
    // FUNCIONES DE INICIALIZACIÓN Y CONFIGURACIÓN
    // ========================================================================================

    $(document).ready(function() {
        console.log('Vista de Anatomía Patológica cargada');

        // Inicializar componentes
        inicializarDropzones();
        inicializarDatepickers();
        inicializarFormularios();
        cargarHistorialEstudios();

        // Event listeners para tabs
        configurarTabs();

        // Event listeners para botones
        configurarBotones();
    });

    // ========================================================================================
    // CONFIGURACIÓN DE DROPZONES
    // ========================================================================================

    function inicializarDropzones() {
        // Verificar y crear Dropzone para Recepción de Muestra
        if ($("#misArchivosRecepcion").length > 0 && !$("#misArchivosRecepcion").hasClass('dz-clickable')) {
            var dropzoneRecepcion = new Dropzone("#misArchivosRecepcion", {
                url: "{{ route('profesional.archivo.carga') }}",
                paramName: "file",
                maxFilesize: 10, // MB
                maxFiles: 10,
                acceptedFiles: "image/*,application/pdf,.doc,.docx",
                addRemoveLinks: true,
                dictDefaultMessage: "Arrastra archivos aquí o haz clic para seleccionar (imágenes macroscópicas, solicitud médica, etc.)",
                dictRemoveFile: "Eliminar",
                dictCancelUpload: "Cancelar",
                dictFileTooBig: "Archivo muy grande (MB). Máximo: MB",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function() {
                    this.on("success", function(file, response) {
                        console.log("Archivo de recepción cargado:", response);
                        file.serverFileName = response.fileName || response.file;
                    });
                    this.on("error", function(file, errorMessage) {
                        console.error("Error al cargar archivo:", errorMessage);
                        alert("Error al cargar el archivo: " + errorMessage);
                    });
                }
            });
        }

        // Verificar y crear Dropzone para Procesamiento
        if ($("#misArchivosProcesamiento").length > 0 && !$("#misArchivosProcesamiento").hasClass('dz-clickable')) {
            var dropzoneProcesamiento = new Dropzone("#misArchivosProcesamiento", {
                url: "{{ route('profesional.archivo.carga') }}",
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 10,
                acceptedFiles: "image/*,application/pdf",
                addRemoveLinks: true,
                dictDefaultMessage: "Arrastra archivos de procesamiento (fotos de cortes, casetes, etc.)",
                dictRemoveFile: "Eliminar",
                dictCancelUpload: "Cancelar",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function() {
                    this.on("success", function(file, response) {
                        console.log("Archivo de procesamiento cargado:", response);
                        file.serverFileName = response.fileName || response.file;
                    });
                }
            });
        }

        // Verificar y crear Dropzone para Diagnóstico
        if ($("#misArchivosDiagnostico").length > 0 && !$("#misArchivosDiagnostico").hasClass('dz-clickable')) {
            var dropzoneDiagnostico = new Dropzone("#misArchivosDiagnostico", {
                url: "{{ route('profesional.archivo.carga') }}",
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 10,
                acceptedFiles: "image/*,application/pdf",
                addRemoveLinks: true,
                dictDefaultMessage: "Arrastra imágenes microscópicas o documentos de diagnóstico",
                dictRemoveFile: "Eliminar",
                dictCancelUpload: "Cancelar",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function() {
                    this.on("success", function(file, response) {
                        console.log("Archivo de diagnóstico cargado:", response);
                        file.serverFileName = response.fileName || response.file;
                    });
                }
            });
        }
    }

    // ========================================================================================
    // CONFIGURACIÓN DE DATEPICKERS
    // ========================================================================================

    function inicializarDatepickers() {
        // Configuración para fechas de recepción y procesamiento
        if ($('.datepicker').length > 0) {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                language: 'es'
            });
        }
    }

    // ========================================================================================
    // CONFIGURACIÓN DE TABS
    // ========================================================================================

    function configurarTabs() {
        // Event listener para cambio de tabs
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var targetTab = $(e.target).attr('href');
            console.log('Tab activado:', targetTab);

            // Acciones específicas por tab
            if (targetTab === '#historial-tab') {
                cargarHistorialEstudios();
            }
        });
    }

    // ========================================================================================
    // CONFIGURACIÓN DE FORMULARIOS
    // ========================================================================================

    function inicializarFormularios() {
        // Validación de formularios
        $('.needs-validation').on('submit', function(e) {
            if (!this.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            $(this).addClass('was-validated');
        });
    }

    // ========================================================================================
    // FUNCIONES DE GUARDADO
    // ========================================================================================

    function guardarRecepcionMuestra() {
        var formData = {
            id_ficha_atencion: '{{ $id_ficha_atencion ?? "" }}',
            numero_muestra: $('#numero_muestra').val(),
            fecha_recepcion: $('#fecha_recepcion').val(),
            tipo_muestra: $('#tipo_muestra').val(),
            sitio_anatomico: $('#sitio_anatomico').val(),
            diagnostico_clinico: $('#diagnostico_clinico').val(),
            descripcion_macroscopica: $('#descripcion_macroscopica').val(),
            liquido_fijador: $('#liquido_fijador').val(),
            numero_casetes: $('#numero_casetes').val(),
            observaciones_recepcion: $('#observaciones_recepcion').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: '{{ route("ficha.otro.prof.registrar_lab_general") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Guardado exitoso',
                    text: 'Los datos de recepción han sido guardados correctamente',
                    timer: 2000
                });
                console.log('Recepción guardada:', response);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al guardar',
                    text: 'Hubo un problema al guardar los datos de recepción',
                });
                console.error('Error:', error);
            }
        });
    }

    function guardarProcesamiento() {
        var formData = {
            id_ficha_atencion: '{{ $id_ficha_atencion ?? "" }}',
            fecha_procesamiento: $('#fecha_procesamiento').val(),
            tecnico_procesamiento: $('#tecnico_procesamiento').val(),
            tecnicas_histologicas: $('input[name="tecnicas_histologicas[]"]:checked').map(function() {
                return $(this).val();
            }).get(),
            numero_cortes: $('#numero_cortes').val(),
            grosor_cortes: $('#grosor_cortes').val(),
            observaciones_procesamiento: $('#observaciones_procesamiento').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: '{{ route("ficha.otro.prof.registrar_lab_general") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Guardado exitoso',
                    text: 'Los datos de procesamiento han sido guardados correctamente',
                    timer: 2000
                });
                console.log('Procesamiento guardado:', response);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al guardar',
                    text: 'Hubo un problema al guardar los datos de procesamiento',
                });
                console.error('Error:', error);
            }
        });
    }

    function guardarDiagnostico() {
        var formData = {
            id_ficha_atencion: '{{ $id_ficha_atencion ?? "" }}',
            descripcion_microscopica: $('#descripcion_microscopica').val(),
            diagnostico_histopatologico: $('#diagnostico_histopatologico').val(),
            grado_diferenciacion: $('#grado_diferenciacion').val(),
            clasificacion_tnm: $('#clasificacion_tnm').val(),
            marcadores_ihq: $('#marcadores_ihq').val(),
            observaciones_diagnostico: $('#observaciones_diagnostico').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: '{{ route("ficha.otro.prof.registrar_lab_general") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Guardado exitoso',
                    text: 'El diagnóstico ha sido guardado correctamente',
                    timer: 2000
                });
                console.log('Diagnóstico guardado:', response);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al guardar',
                    text: 'Hubo un problema al guardar el diagnóstico',
                });
                console.error('Error:', error);
            }
        });
    }

    // ========================================================================================
    // FUNCIONES DE RESULTADOS E INFORMES
    // ========================================================================================

    function generarPrevisualizacion() {
        // Recopilar datos del estudio completo
        var datosEstudio = {
            // Datos del paciente
            paciente: {
                nombre: '{{ $paciente->paciente_nombres ?? "" }} {{ $paciente->paciente_apellidos ?? "" }}',
                rut: '{{ $paciente->paciente_rut ?? "" }}',
                edad: calcularEdad('{{ $paciente->paciente_fecha_nacimiento ?? "" }}'),
                sexo: '{{ $paciente->paciente_sexo ?? "" }}'
            },
            // Datos de recepción
            numero_muestra: $('#numero_muestra').val(),
            fecha_recepcion: $('#fecha_recepcion').val(),
            tipo_muestra: $('#tipo_muestra').val(),
            sitio_anatomico: $('#sitio_anatomico').val(),
            diagnostico_clinico: $('#diagnostico_clinico').val(),
            descripcion_macroscopica: $('#descripcion_macroscopica').val(),
            // Datos de procesamiento
            tecnicas: $('input[name="tecnicas_histologicas[]"]:checked').map(function() {
                return $(this).next('label').text();
            }).get().join(', '),
            // Datos de diagnóstico
            descripcion_microscopica: $('#descripcion_microscopica').val(),
            diagnostico_histopatologico: $('#diagnostico_histopatologico').val(),
            grado_diferenciacion: $('#grado_diferenciacion').val(),
            clasificacion_tnm: $('#clasificacion_tnm').val(),
            marcadores_ihq: $('#marcadores_ihq').val()
        };

        // Generar HTML de previsualización
        var previewHtml = `
            <div class="informe-preview">
                <div class="text-center mb-4">
                    <h4>INFORME ANATOMOPATOLÓGICO</h4>
                    <p>N° de Muestra: ${datosEstudio.numero_muestra}</p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Paciente:</strong> ${datosEstudio.paciente.nombre}<br>
                        <strong>RUT:</strong> ${datosEstudio.paciente.rut}
                    </div>
                    <div class="col-md-6">
                        <strong>Edad:</strong> ${datosEstudio.paciente.edad} años<br>
                        <strong>Sexo:</strong> ${datosEstudio.paciente.sexo}
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Fecha de Recepción:</strong> ${datosEstudio.fecha_recepcion}
                </div>

                <div class="mb-3">
                    <strong>DIAGNÓSTICO CLÍNICO:</strong><br>
                    ${datosEstudio.diagnostico_clinico || 'No especificado'}
                </div>

                <div class="mb-3">
                    <strong>MATERIAL REMITIDO:</strong><br>
                    ${datosEstudio.tipo_muestra} - ${datosEstudio.sitio_anatomico}
                </div>

                <div class="mb-3">
                    <strong>DESCRIPCIÓN MACROSCÓPICA:</strong><br>
                    ${datosEstudio.descripcion_macroscopica || 'No especificada'}
                </div>

                <div class="mb-3">
                    <strong>DESCRIPCIÓN MICROSCÓPICA:</strong><br>
                    ${datosEstudio.descripcion_microscopica || 'No especificada'}
                </div>

                <div class="mb-3">
                    <strong>DIAGNÓSTICO HISTOPATOLÓGICO:</strong><br>
                    <div class="alert alert-info">
                        ${datosEstudio.diagnostico_histopatologico || 'No especificado'}
                    </div>
                </div>

                ${datosEstudio.grado_diferenciacion ? `
                <div class="mb-3">
                    <strong>GRADO DE DIFERENCIACIÓN:</strong> ${datosEstudio.grado_diferenciacion}
                </div>` : ''}

                ${datosEstudio.clasificacion_tnm ? `
                <div class="mb-3">
                    <strong>CLASIFICACIÓN TNM:</strong> ${datosEstudio.clasificacion_tnm}
                </div>` : ''}

                ${datosEstudio.marcadores_ihq ? `
                <div class="mb-3">
                    <strong>MARCADORES INMUNOHISTOQUÍMICOS:</strong><br>
                    ${datosEstudio.marcadores_ihq}
                </div>` : ''}

                <div class="mt-4 text-right">
                    <p><strong>Patólogo:</strong> {{ $profesional->nombre ?? "" }} {{ $profesional->apellido ?? "" }}</p>
                    <p><strong>Fecha del informe:</strong> ${new Date().toLocaleDateString('es-CL')}</p>
                </div>
            </div>
        `;

        $('#preview-informe').html(previewHtml);

        Swal.fire({
            icon: 'success',
            title: 'Previsualización generada',
            text: 'La vista previa del informe ha sido actualizada',
            timer: 1500
        });
    }

    function generarPDF() {
        Swal.fire({
            title: '¿Generar PDF?',
            text: 'Se generará el informe anatomopatológico en formato PDF',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, generar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí iría la lógica para generar el PDF
                // Normalmente se enviaría a una ruta del servidor
                window.open('/generar-informe-anatomopatologico/{{ $id_ficha_atencion ?? "" }}', '_blank');
            }
        });
    }

    function enviarEmail() {
        Swal.fire({
            title: 'Enviar por Email',
            html: `
                <input type="email" id="email-destinatario" class="swal2-input" placeholder="Email del destinatario">
                <textarea id="email-mensaje" class="swal2-textarea" placeholder="Mensaje adicional (opcional)"></textarea>
            `,
            showCancelButton: true,
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const email = document.getElementById('email-destinatario').value;
                const mensaje = document.getElementById('email-mensaje').value;

                if (!email) {
                    Swal.showValidationMessage('Por favor ingresa un email válido');
                    return false;
                }

                return { email: email, mensaje: mensaje };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí iría la lógica para enviar el email
                $.ajax({
                    url: '/enviar-informe-email',
                    type: 'POST',
                    data: {
                        id_ficha: '{{ $id_ficha_atencion ?? "" }}',
                        email: result.value.email,
                        mensaje: result.value.mensaje,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        Swal.fire('Enviado', 'El informe ha sido enviado por email', 'success');
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo enviar el email', 'error');
                    }
                });
            }
        });
    }

    // ========================================================================================
    // FUNCIONES DE HISTORIAL
    // ========================================================================================

    function cargarHistorialEstudios() {
        var pacienteId = '{{ $paciente->id ?? "" }}';

        if (!pacienteId) {
            console.log('No hay ID de paciente disponible');
            return;
        }

        $.ajax({
            url: '/obtener-historial-anatomopatologico/' + pacienteId,
            type: 'GET',
            success: function(response) {
                mostrarHistorial(response.estudios || []);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar historial:', error);
                $('#tabla-historial tbody').html('<tr><td colspan="6" class="text-center">No se pudo cargar el historial</td></tr>');
            }
        });
    }

    function mostrarHistorial(estudios) {
        var tbody = $('#tabla-historial tbody');
        tbody.empty();

        if (estudios.length === 0) {
            tbody.html('<tr><td colspan="6" class="text-center text-muted">No hay estudios previos registrados</td></tr>');
            return;
        }

        estudios.forEach(function(estudio) {
            var row = `
                <tr>
                    <td>${estudio.fecha_recepcion || '-'}</td>
                    <td>${estudio.numero_muestra || '-'}</td>
                    <td>${estudio.tipo_muestra || '-'}</td>
                    <td>${estudio.sitio_anatomico || '-'}</td>
                    <td><span class="badge badge-${obtenerBadgeEstado(estudio.estado)}">${estudio.estado || 'Pendiente'}</span></td>
                    <td>
                        <button class="btn btn-sm btn-info" onclick="verDetalleEstudio(${estudio.id})">
                            <i class="fas fa-eye"></i> Ver
                        </button>
                    </td>
                </tr>
            `;
            tbody.append(row);
        });
    }

    function obtenerBadgeEstado(estado) {
        switch(estado?.toLowerCase()) {
            case 'completado':
            case 'finalizado':
                return 'success';
            case 'en proceso':
            case 'procesamiento':
                return 'warning';
            case 'pendiente':
                return 'secondary';
            default:
                return 'info';
        }
    }

    function verDetalleEstudio(id) {
        // Aquí iría la lógica para ver el detalle de un estudio previo
        window.location.href = '/anatomopatologia/estudio/' + id;
    }

    // ========================================================================================
    // FUNCIONES AUXILIARES
    // ========================================================================================

    function calcularEdad(fechaNacimiento) {
        if (!fechaNacimiento) return '';

        var hoy = new Date();
        var nacimiento = new Date(fechaNacimiento);
        var edad = hoy.getFullYear() - nacimiento.getFullYear();
        var mes = hoy.getMonth() - nacimiento.getMonth();

        if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }

        return edad;
    }

    function configurarBotones() {
        // Botones de guardado
        $('#btn-guardar-recepcion').on('click', function() {
            guardarRecepcionMuestra();
        });

        $('#btn-guardar-procesamiento').on('click', function() {
            guardarProcesamiento();
        });

        $('#btn-guardar-diagnostico').on('click', function() {
            guardarDiagnostico();
        });

        // Botones de resultados
        $('#btn-generar-preview').on('click', function() {
            generarPrevisualizacion();
        });

        $('#btn-generar-pdf').on('click', function() {
            generarPDF();
        });

        $('#btn-enviar-email').on('click', function() {
            enviarEmail();
        });
    }

    // Función para limpiar formularios
    function limpiarFormulario(formId) {
        $(formId)[0].reset();
        $(formId).removeClass('was-validated');
    }
</script>
@endsection

@section('page-style')
    <style type="text/css">
        .ng_esp {
            /* Common */
            font : 14px 'Wingdings 3';
            color : #0000ff;
            width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
            background-color: #f6faf9;
            text-align:center;
            font-weight: bold;
            display: block;
            width: 100%;
            padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
            font-size: 1.0rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @font-face {
            font-family: 'Wingdings 3';
        }

        /* === ESTILOS PARA ESTRELLAS DE CALIFICACIÓN === */
        .rating-display {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rating-stars {
            display: inline-flex;
            gap: 2px;
            font-size: 20px;
        }

        .rating-stars i {
            color: #ffc107; /* Amarillo/dorado */
        }

        .rating-stars .star-empty {
            color: #e0e0e0; /* Gris claro */
        }

        .rating-text {
            font-size: 13px;
            color: #6c757d;
            margin-left: 8px;
        }

        .rating-value {
            font-weight: 600;
            color: #495057;
        }

        /* Colores según nivel de satisfacción */
        .rating-5 { color: #28a745 !important; } /* Verde */
        .rating-4 { color: #5cb85c !important; } /* Verde claro */
        .rating-3 { color: #ffc107 !important; } /* Amarillo */
        .rating-2 { color: #ff9800 !important; } /* Naranja */
        .rating-1 { color: #dc3545 !important; } /* Rojo */
        .rating-0 { color: #e0e0e0 !important; } /* Gris - Sin calificar */

        /* Estilos para tabs deshabilitados */
        .nav-link.disabled {
            pointer-events: none !important;
            opacity: 0.5 !important;
            color: #6c757d !important;
            cursor: not-allowed !important;
            transition: all 0.3s ease;
        }

        .nav-link.disabled:hover {
            color: #6c757d !important;
            background-color: transparent !important;
        }

        /* Indicador visual adicional para tabs deshabilitados */
        .nav-link.disabled::after {
            content: " 🔒";
            font-size: 0.8em;
            opacity: 0.7;
        }

        /* Estilos para tarjetas de productos */
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
        }

        /* Cursor pointer para elementos clickeables */
        .cursor-pointer {
            cursor: pointer !important;
        }

        /* Estilos para modal de archivos */
        .archivo-item {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .archivo-item:hover {
            background: #e8f4fd;
            border-color: #007bff;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,123,255,0.15);
        }

        .archivo-nombre {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }

        .archivo-url {
            font-size: 0.85em;
            color: #6c757d;
            word-break: break-all;
        }

        .producto-card {
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .producto-card:hover {
            border-color: #007bff;
        }

        .producto-imagen {
            max-height: 150px;
            object-fit: contain;
            width: 100%;
        }

        .badge-stock-bajo {
            background-color: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.75rem;
        }

        .badge-stock-ok {
            background-color: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.75rem;
        }

        /* Estilos para el modal del carrito */
        .swal-wide {
            width: 80% !important;
            max-width: 900px !important;
        }

        .swal-modal {
            border-radius: 10px !important;
        }

        .carrito-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #28a745;
        }

        .carrito-header i {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: 10px;
        }

        .carrito-tabla {
            width: 100%;
            margin-top: 15px;
        }

        .carrito-total {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 1.2rem;
        }

        /* Estilos para botón del carrito en header */
        #btn-abrir-carrito {
            position: relative;
            transition: all 0.3s ease;
        }

        #btn-abrir-carrito:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        #badge-carrito-header {
            font-size: 0.75rem;
            padding: 3px 6px;
            border-radius: 10px;
            background-color: #dc3545 !important;
            color: white !important;
            font-weight: bold;
        }

        #total-carrito-header {
            color: #28a745;
            font-weight: bold;
            font-size: 0.85rem;
        }

        /* Animación para badge cuando se actualiza */
        @keyframes badgePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .badge-animated {
            animation: badgePulse 0.5s ease;
        }

        /* === ESTILOS PARA FORMULARIO AUDÍFONO EXTERNO === */
        .card.border-info {
            border-width: 2px;
            border-color: #17a2b8 !important;
        }

        .card-header.bg-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }

        #div_otro_proveedor .form-control:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
        }

        #div_otro_proveedor .form-group label span.text-danger {
            font-weight: bold;
        }

        #div_otro_proveedor hr {
            border-top: 2px solid #e9ecef;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        #div_otro_proveedor .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }

        /* Animación para mostrar formulario */
        #div_otro_proveedor {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === ESTILOS PARA CARDS DE AUDÍFONOS PROPIOS === */
        #lista_audifonos_control .card-audifono {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        #lista_audifonos_control .card-audifono:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            border-color: #c0c0c0;
        }

        /* Contenedor de imagen */
        #lista_audifonos_control .imagen-container {
            position: relative;
            background: #fff;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        #lista_audifonos_control .card-audifono .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: contain;
            mix-blend-mode: multiply;
        }

        /* Badge de stock */
        #lista_audifonos_control .card-audifono .badge-stock {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.98);
            color: #333;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border: 1px solid #e0e0e0;
        }

        #lista_audifonos_control .card-audifono .badge-stock.stock-bajo {
            background: #ff4d4d;
            color: white;
            border-color: #ff4d4d;
        }

        #lista_audifonos_control .card-audifono .badge-stock.stock-medio {
            background: #ffa107;
            color: #fff;
            border-color: #ffa107;
        }

        #lista_audifonos_control .card-audifono .badge-stock.stock-alto {
            background: #28a745;
            color: white;
            border-color: #28a745;
        }

        /* Cuerpo de la card */
        #lista_audifonos_control .card-body-audifono {
            padding: 15px;
            box-sizing: border-box;
        }

        /* Header del producto */
        #lista_audifonos_control .producto-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0f0f0;
        }

        #lista_audifonos_control .producto-header .icon-producto {
            font-size: 1.5rem;
            color: #5a67d8;
            margin-right: 10px;
        }

        #lista_audifonos_control .producto-nombre {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            line-height: 1.4;
        }

        /* Información del producto */
        #lista_audifonos_control .producto-info {
            margin-bottom: 15px;
        }

        #lista_audifonos_control .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.85rem;
            color: #4a5568;
        }

        #lista_audifonos_control .info-row i {
            font-size: 0.9rem;
            margin-right: 8px;
            color: #718096;
            min-width: 16px;
        }

        #lista_audifonos_control .info-row strong {
            color: #2d3748;
            font-weight: 600;
        }

        /* Precio */
        #lista_audifonos_control .producto-precio {
            text-align: center;
            font-size: 1.6rem;
            font-weight: 900;
            color: #1a49a3 !important;
            padding: 10px;
            margin-bottom: 15px;

        }

        /* Botones de acción */
        #lista_audifonos_control .botones-accion {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 8px;
        }

        /* Estilos base para botones */
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 14px 10px !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            cursor: pointer !important;
            text-align: center !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12) !important;
            line-height: 1.2 !important;
            text-decoration: none !important;
            width: 100%;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2) !important;
            text-decoration: none !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion:active {
            transform: translateY(0) !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(90, 103, 216, 0.3) !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion i {
            font-size: 1.2rem !important;
            margin-bottom: 5px !important;
            display: block !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion span {
            display: block !important;
            line-height: 1.3 !important;
            font-size: 0.8rem !important;
        }

        /* Botón Calibración - Especificidad máxima */
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion {
            background: #1a49a3 !important;
            background-color: #1a49a3 !important;
            color: white !important;
            border-color: #1a49a3 !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion:hover {
            background: #4e7acd !important;
            background-color: #4e7acd !important;
            color: white !important;
            border-color: #4e7acd !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion:focus,
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion:active {
            background: #4c51bf !important;
            background-color: #07aeb1 !important;
            color: white !important;
            border-color: #07aeb1 !important;
        }

        /* Botón Reparación - Especificidad máxima */
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion {
            background: #2aada4 !important;
            background-color: #2aada4 !important;
            color: white !important;
            border-color: #2aada4 !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion:hover {
            background: #24ced1 !important;
            background-color: #24ced1 !important;
            color: white !important;
            border-color: #24ced1 !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion:focus,
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion:active {
            background: #2aada4 !important;
            background-color: #2aada4 !important;
            color: white !important;
            border-color: #2aada4 !important;
        }

        /* Animación de carga para lista de audífonos */
        #lista_audifonos_control .loading-message {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }

        #lista_audifonos_control .loading-message i {
            font-size: 3rem;
            color: #667eea;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #lista_audifonos_control .empty-message {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        #lista_audifonos_control .empty-message i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 15px;
        }

        .badge-prestado {
            background: #f6ad55;
            color: #fff;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 8px;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        .card-lineal {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 2px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.60rem;
            margin-bottom: 20px;
        }

        .card-header-lineal {
            padding: 0.4rem  1rem 0.3rem;
            margin-bottom: 0;
            font-size: 0.95rem;
            font-weight: 700;
            background-color: #f7f7f7;
            color: #1a49a3;
            border-bottom: 2px solid rgba(0, 0, 0, 0.125);
            border-top-right-radius: 0.50rem;
            border-top-left-radius: 0.50rem;
        }

        .card-body-lineal {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }
            </style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2 mt-4">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="page-header-title">
                            <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN: </strong> <br>ANATOMÍA PATOLÓGICA - GESTIÓN DE MUESTRAS Y ESTUDIOS</h5>
                                <p class="font-weight-bold mt-0 mb-0 text-white float-md-right">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="recepcion_muestra-tab" data-toggle="tab" href="#recepcion_muestra" role="tab" aria-controls="recepcion_muestra" aria-selected="true">Recepción de Muestra</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="procesamiento-tab" data-toggle="tab" href="#procesamiento" role="tab" aria-controls="procesamiento" aria-selected="false">Procesamiento</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="diagnostico-tab" data-toggle="tab" href="#diagnostico" role="tab" aria-controls="diagnostico" aria-selected="false">Diagnóstico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="resultados-tab" data-toggle="tab" href="#resultados" role="tab" aria-controls="resultados" aria-selected="false">Resultados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="historial-tab" data-toggle="tab" href="#historial" role="tab" aria-controls="historial" onclick="dame_atenciones_previas_lab()" aria-selected="false">Historial de Estudios</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contenido de tabs -->
            <div class="row">
                        <!--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3 mt-3">
                            <div class="card-a">
                                <div class="card-header-a" id="sec_derivado_por">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#sec_derivado_por_c" aria-expanded="false" aria-controls="sec_derivado_por_c">
                                       Paciente y Derivación
                                    </button>
                                </div>
                                <div id="sec_derivado_por_c" class="collapse show" aria-labelledby="sec_derivado_por" data-parent="#sec_derivado_por">
                                    <div class="card-body-aten-a">
                                        <div class="form-row" >
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Fecha de examen</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Examinador</label>
                                                <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                            </div>
                                            <div class="form-group col-12">
                                                {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <input type="hidden" name="solicitado_id_profesional" id="solicitado_id_profesional" value="">
                                                        <label class="floating-label-activo-sm ml-3">Derivado por RUT</label>
                                                        <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                            onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
                                                            onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
                                                            oninput="formatoRut(this);"
                                                        >

                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm ml-3">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                    </div>
                                                    <div class="form-group col-12" id="div_mensaje"  style="display: none;">
                                                        <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_nombre" id="solicitado_nombre" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_apellido" id="solicitado_apellido" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Telefono</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_telefono" id="solicitado_telefono" >
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Email</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_email" id="solicitado_email" >
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Nombre paciente</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                <label class="floating-label-activo-sm">Edad</label>
                                                <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-8">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                @if (isset($paciente))
                                                    @if ($paciente->Direccion()->first() != null)
                                                        value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                    @else
                                                        value="No ha registrado dirección !"
                                                    @endif
                                                @else
                                                    value="No ha registrado dirección !"
                                                @endif
                                                readonly>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Email</label>
                                                <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="tab-content" id="at-tecn_anat_patologica">
                                {{-- Recepción de Muestra --}}
                                <div class="tab-pane fade show active" id="recepcion_muestra" role="tabpanel" aria-labelledby="recepcion_muestra-tab">
                                    <form action="{{ route('ficha.otro.prof.registrar_lab_general') }}" method="POST">
                                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                                        <input type="hidden" name="id_examen" value="{{ $id_ficha_atencion }}" id="id_examen">
                                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                                        <input type="hidden" name="listado_archivos" id="listado_archivos" value="">
                                        <input type="hidden" name="id_procedencia_paciente" id="id_procedencia_paciente" value="">
                                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <h6 class="tit-gen mb-2">Información de la Muestra</h6>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                <label class="floating-label-activo-sm">N° de Muestra</label>
                                                                <input type="text" class="form-control form-control-sm" name="numero_muestra" id="numero_muestra" placeholder="Ej: AP-2024-001">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                <label class="floating-label-activo-sm">Fecha de Recepción</label>
                                                                <input type="date" class="form-control form-control-sm" name="fecha_recepcion" id="fecha_recepcion" value="{{ date('Y-m-d') }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                <label class="floating-label-activo-sm">Hora de Recepción</label>
                                                                <input type="time" class="form-control form-control-sm" name="hora_recepcion" id="hora_recepcion" value="{{ date('H:i') }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                <label class="floating-label-activo-sm">Tipo de Estudio</label>
                                                                <select class="form-control form-control-sm" name="tipo_estudio" id="tipo_estudio">
                                                                    <option value="">Seleccione...</option>
                                                                    <option value="biopsia">Biopsia</option>
                                                                    <option value="citologia">Citología</option>
                                                                    <option value="histopatologia">Histopatología</option>
                                                                    <option value="inmunohistoquimica">Inmunohistoquímica</option>
                                                                    <option value="autopsia">Autopsia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Órgano/Tejido</label>
                                                                <input type="text" class="form-control form-control-sm" name="organo_tejido" id="organo_tejido" placeholder="Ej: Piel, Estómago, Mama, etc.">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sitio Anatómico</label>
                                                                <input type="text" class="form-control form-control-sm" name="sitio_anatomico" id="sitio_anatomico" placeholder="Ubicación específica">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Médico Solicitante</label>
                                                                <input type="text" class="form-control form-control-sm" name="medico_solicitante" id="medico_solicitante">
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Diagnóstico Clínico / Indicación</label>
                                                                <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=4" onblur="this.rows=2;" name="diagnostico_clinico" id="diagnostico_clinico" placeholder="Sospecha diagnóstica, motivo del estudio..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Descripción Macroscópica de la Muestra</label>
                                                                <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=5" onblur="this.rows=2;" name="descripcion_macroscopica" id="descripcion_macroscopica" placeholder="Tamaño, color, consistencia, características generales de la muestra..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Número de Fragmentos</label>
                                                                <input type="number" class="form-control form-control-sm" name="numero_fragmentos" id="numero_fragmentos" min="1" value="1">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Fijador Utilizado</label>
                                                                <select class="form-control form-control-sm" name="fijador" id="fijador">
                                                                    <option value="">Seleccione...</option>
                                                                    <option value="formol_10">Formol 10%</option>
                                                                    <option value="alcohol">Alcohol</option>
                                                                    <option value="bouin">Líquido de Bouin</option>
                                                                    <option value="otro">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Observaciones de Recepción</label>
                                                                <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=4" onblur="this.rows=2;" name="observaciones_recepcion" id="observaciones_recepcion" placeholder="Estado de la muestra, condiciones especiales..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CARGA DE ARCHIVOS -->
                                            <div class="col-12">
                                                <h6 class="tit-gen mb-2 mt-4">Documentación Adjunta</h6>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="dropzone" id="misArchivosRecepcion" action="{{ route('profesional.archivo.carga') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <!--GUARDAR O IMPRIMIR FICHA-->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="row mb-3">
                                                    <div class="col-md-12 text-center">
                                                        <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');" value="Guardar y Finalizar Atención">
                                                        <input type="submit" class="btn btn-success mt-1" value="Guardar e ir a Agenda">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- Procesamiento --}}
                                <div class="tab-pane fade show" id="procesamiento" role="tabpanel" aria-labelledby="procesamiento-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2 mt-3">Procesamiento de la Muestra</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                            <label class="floating-label-activo-sm">Fecha de Procesamiento</label>
                                                            <input type="date" class="form-control form-control-sm" name="fecha_procesamiento" id="fecha_procesamiento">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                            <label class="floating-label-activo-sm">Técnico Responsable</label>
                                                            <input type="text" class="form-control form-control-sm" name="tecnico_responsable" id="tecnico_responsable">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-6">
                                                            <label class="floating-label-activo-sm">Técnica Aplicada</label>
                                                            <select class="form-control form-control-sm" name="tecnica_aplicada" id="tecnica_aplicada">
                                                                <option value="">Seleccione...</option>
                                                                <option value="he">Hematoxilina-Eosina (H&E)</option>
                                                                <option value="pas">PAS</option>
                                                                <option value="gram">Gram</option>
                                                                <option value="ziehl">Ziehl-Neelsen</option>
                                                                <option value="tricromico">Tricrómico de Masson</option>
                                                                <option value="otro">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Número de Cortes</label>
                                                            <input type="number" class="form-control form-control-sm" name="numero_cortes" id="numero_cortes" min="1">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Grosor de Corte (μm)</label>
                                                            <input type="number" class="form-control form-control-sm" name="grosor_corte" id="grosor_corte" placeholder="Ej: 4">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Observaciones del Procesamiento</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=4" onblur="this.rows=2;" name="observaciones_procesamiento" id="observaciones_procesamiento" placeholder="Detalles técnicos, incidencias..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="muestra_incluida" id="muestra_incluida">
                                                                <label class="custom-control-label" for="muestra_incluida">Muestra incluida en parafina</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <button type="button" class="btn btn-info-light-c btn-sm float-right">
                                                                <i class="feather icon-save"></i> Guardar Procesamiento
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Archivos de Procesamiento -->
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2 mt-4">Imágenes del Procesamiento</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="dropzone" id="misArchivosProcesamiento" action="{{ route('profesional.archivo.carga') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Diagnóstico --}}
                                <div class="tab-pane fade show" id="diagnostico" role="tabpanel" aria-labelledby="diagnostico-tab">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2">Estudio Microscópico y Diagnóstico</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Fecha de Diagnóstico</label>
                                                            <input type="date" class="form-control form-control-sm" name="fecha_diagnostico" id="fecha_diagnostico">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Patólogo</label>
                                                            <input type="text" class="form-control form-control-sm" name="patologo" id="patologo" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Descripción Microscópica</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9" rows="3" onfocus="this.rows=6" onblur="this.rows=3;" name="descripcion_microscopica" id="descripcion_microscopica" placeholder="Hallazgos histológicos detallados..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Diagnóstico Histopatológico</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=4" onblur="this.rows=2;" name="diagnostico_histopatologico" id="diagnostico_histopatologico" placeholder="Conclusión diagnóstica..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Grado de Diferenciación</label>
                                                            <select class="form-control form-control-sm" name="grado_diferenciacion" id="grado_diferenciacion">
                                                                <option value="">Seleccione...</option>
                                                                <option value="bien_diferenciado">Bien diferenciado</option>
                                                                <option value="moderadamente_diferenciado">Moderadamente diferenciado</option>
                                                                <option value="poco_diferenciado">Poco diferenciado</option>
                                                                <option value="indiferenciado">Indiferenciado</option>
                                                                <option value="no_aplica">No aplica</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Clasificación TNM (si aplica)</label>
                                                            <input type="text" class="form-control form-control-sm" name="clasificacion_tnm" id="clasificacion_tnm" placeholder="Ej: T2N1M0">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Marcadores Inmunohistoquímicos</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=4" onblur="this.rows=2;" name="marcadores_ihq" id="marcadores_ihq" placeholder="Resultados de inmunohistoquímica si se realizaron..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Comentarios y Recomendaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9" rows="2" onfocus="this.rows=4" onblur="this.rows=2;" name="comentarios_diagnostico" id="comentarios_diagnostico" placeholder="Observaciones adicionales, recomendaciones de seguimiento..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <button type="button" class="btn btn-info-light-c btn-sm float-right">
                                                                <i class="feather icon-save"></i> Guardar Diagnóstico
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Archivos de Diagnóstico -->
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2 mt-4">Imágenes Microscópicas</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="dropzone" id="misArchivosDiagnostico" action="{{ route('profesional.archivo.carga') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Resultados --}}
                                <div class="tab-pane fade show" id="resultados" role="tabpanel" aria-labelledby="resultados-tab">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2">Generación de Informe Final</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Estado del Informe</label>
                                                            <select class="form-control form-control-sm" name="estado_informe" id="estado_informe">
                                                                <option value="borrador">Borrador</option>
                                                                <option value="revision">En Revisión</option>
                                                                <option value="finalizado">Finalizado</option>
                                                                <option value="enviado">Enviado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Fecha de Emisión</label>
                                                            <input type="date" class="form-control form-control-sm" name="fecha_emision" id="fecha_emision">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col-12">
                                                            <div class="card-lineal">
                                                                <div class="card-header-lineal">
                                                                    Vista Previa del Informe
                                                                </div>
                                                                <div class="card-body-lineal">
                                                                    <div class="informe-preview" style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
                                                                        <h6 class="text-center"><strong>INFORME ANATOMOPATOLÓGICO</strong></h6>
                                                                        <hr>
                                                                        <p><strong>Paciente:</strong> {{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}</p>
                                                                        <p><strong>RUT:</strong> {{ $paciente->rut }}</p>
                                                                        <p><strong>Fecha:</strong> <span id="preview_fecha">-</span></p>
                                                                        <p><strong>N° Muestra:</strong> <span id="preview_numero_muestra">-</span></p>
                                                                        <hr>
                                                                        <p><strong>DIAGNÓSTICO CLÍNICO:</strong></p>
                                                                        <p id="preview_diagnostico_clinico" style="margin-left: 15px;">-</p>
                                                                        <p><strong>DESCRIPCIÓN MACROSCÓPICA:</strong></p>
                                                                        <p id="preview_descripcion_macro" style="margin-left: 15px;">-</p>
                                                                        <p><strong>DESCRIPCIÓN MICROSCÓPICA:</strong></p>
                                                                        <p id="preview_descripcion_micro" style="margin-left: 15px;">-</p>
                                                                        <p><strong>DIAGNÓSTICO HISTOPATOLÓGICO:</strong></p>
                                                                        <p id="preview_diagnostico_final" style="margin-left: 15px;">-</p>
                                                                        <hr>
                                                                        <p class="text-right"><strong>Dr. {{ $profesional->apellido_uno }}</strong><br>Médico Patólogo</p>
                                                                    </div>
                                                                    <div class="mt-3 text-right">
                                                                        <button type="button" class="btn btn-danger-light-c btn-sm">
                                                                            <i class="fa fa-file-pdf"></i> Generar PDF
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-envelope"></i> Enviar por Email
                                                                        </button>
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

                                {{-- Historial de estudios previos --}}
                                <div class="tab-pane fade show" id="historial" role="tabpanel" aria-labelledby="historial-tab">
                                    <div class="row">
                                        <div class="col-12 pl-0">
                                            <h6 class="tit-gen mb-2 mt-3">Historial de Estudios Anatomopatológicos</h6>
                                        </div>
                                        <div class="card-a">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <table class="table table-hover" id="tabla_estudios_previos">
                                                            <thead>
                                                                <tr>
                                                                    <th>N° Muestra</th>
                                                                    <th>Fecha</th>
                                                                    <th>Tipo de Estudio</th>
                                                                    <th>Órgano/Tejido</th>
                                                                    <th>Diagnóstico</th>
                                                                    <th>Patólogo</th>
                                                                    <th>Estado</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="estudios-previos-body">
                                                                <!-- Contenido se llenará dinámicamente -->
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
    <!--Cierre: Container Completo-->
@endsection
