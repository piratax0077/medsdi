@extends('template.laboratorio.laboratorio_profesional.template')

@section('style')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <style>
        #campana_editor_quill {
            min-height: 180px;
            font-size: .95rem;
            line-height: 1.7;
            background: #fff;
        }
        .ql-toolbar.ql-snow {
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .ql-container.ql-snow { border: none; }
    </style>
@endsection

@section('content')

<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content mt-73">
        <div class="page-header mt-n70">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                           <li class="breadcrumb-item">
                               <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Campañas Promocionales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body bg-white">
                            <div class="row">
                                <div class="col-md-12 align-botton">
                                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-outline-light btn-sm" onclick="agregar_cliente();"><i class="feather icon-plus"></i>Agregar cliente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

                    <div class="row">
                        <div class="col-12 mt-4 d-inline">
                            <h5 class="text-c-blue f-22 mb-3 d-inline">
                                Campañas Promocionales
                            </h5>
                             {{-- <div class="float-right mb-2" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info" onclick="agregar_cliente();"><i class="feather icon-plus"></i>Añadir cliente</button>
                            </div> --}}
                        </div>
                    </div>

                            <!-- Formulario para crear campaña -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header-new-md">
                                            <h5><i class="feather icon-mail icono-primary"></i>Crear campañas promocionales de email</h5>
                                        </div>
                                        <div class="card-body">
                                            <form id="form_campana_promocional" onsubmit="enviar_campana_promocional(); return false;" enctype="multipart/form-data">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-bold">Título de la Campaña</label>
                                                        <input type="text" class="form-control" id="campana_titulo" name="campana_titulo" maxlength="100" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-bold">Remitente</label>
                                                        <input type="email" class="form-control" id="campana_remitente" name="campana_remitente" value="{{ $profesional->email ?? '' }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <input type="hidden" id="campana_mensaje" name="campana_mensaje" value="">
                                                        <div class="card border-0 shadow-sm">
                                                            <div class="card-header bg-c-info d-flex align-items-center justify-content-between py-2">
                                                                <h5 class="text-white mb-0" style="font-size:.95rem;">
                                                                    <i class="feather icon-mail mr-1"></i> Mensaje de la campa&ntilde;a
                                                                </h5>
                                                                <div class="d-flex align-items-center" style="gap:8px;">
                                                                    <span id="campana_dictado_badge"
                                                                        class="badge badge-light"
                                                                        style="font-size:.78rem; font-weight:500; min-width:110px; text-align:center;">
                                                                        ⏸ Detenido
                                                                    </span>
                                                                    <button id="btn_campana_dict_iniciar" type="button" class="btn btn-light btn-sm" onclick="campana_dictado_iniciar()">
                                                                        🎤 Iniciar
                                                                    </button>
                                                                    <button id="btn_campana_dict_detener" type="button" class="btn btn-secondary btn-sm" onclick="campana_dictado_detener()" disabled>
                                                                        ⏹ Detener
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-light btn-sm" onclick="campana_dictado_limpiar()" title="Limpiar texto">
                                                                        <i class="feather icon-trash-2"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0">
                                                                <div id="campana_dictado_interim_preview"
                                                                    style="background:#e8f7fa; padding:.35rem 1rem;
                                                                           font-style:italic; color:#117a8b; font-size:.83rem;
                                                                           min-height:22px; border-bottom:1px solid #b8e8f0; display:none;">
                                                                </div>
                                                                <div id="campana_editor_quill"></div>
                                                            </div>
                                                            <div class="card-footer py-2" style="background:#f8f9fa;">
                                                                <small class="text-muted">
                                                                    <i class="feather icon-info mr-1"></i>
                                                                    Escribe directamente o pulsa <strong>🎤 Iniciar</strong> para dictar por voz. El texto aparecerá en el editor.
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div class="alert alert-primary" role="alert">
                                                            <i class="feather icon-info mr-2"></i>
                                                            <strong>Destinatarios:</strong> Esta campaña se enviará a <strong>TODOS los clientes activos</strong> con correo registrado en el sistema.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- dropzone -->
                                                <div class="form-row">
                                                    <!-- Archivos Adjuntos -->
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-bold">Archivos Adjuntos</label>
                                                        <input type="file" name="archivos[]" id="archivos" multiple class="form-control">
                                                    </div>
                                                    <!-- Imágenes en la campaña -->
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-bold">Imágenes en la campaña</label>
                                                        <input type="file" name="imagenes[]" id="imagenes" multiple class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 text-right">
                                                        <button type="submit" class="btn btn-info">
                                                            <i class="feather icon-check"></i> Enviar Campaña
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Historial de campañas enviadas -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header-new-md">
                                            <h5><i class="feather icon-list icono-primary"></i>Historial de campañas</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table  table-xs" id="tabla_historial_campanas">
                                                    <thead>
                                                        <tr>
                                                            <th>Título</th>
                                                            <th>Fecha</th>
                                                            <th>Remitente</th>
                                                            <th>Destinatarios</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="campanas_promocionales_lista">
                                                        <tr>
                                                            <td colspan="6" class="text-center text-muted py-3">
                                                                <i class="feather icon-mail f-18 d-block mb-2"></i>
                                                                No hay campañas promocionales enviadas
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
<!--****Cierre Container Completo****-->

@endsection

@section('page-script')

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
    // =====================================================================
    // QUILL — editor del mensaje de campaña
    // =====================================================================
    var quill_campana = null;

    $(document).ready(function() {
        // Cargar historial de campañas al cargar la página
        cargar_historial_campanas_email();

        quill_campana = new Quill('#campana_editor_quill', {
            theme: 'snow',
            placeholder: 'Escribe aquí el contenido del correo o usa el dictado por voz...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['blockquote', 'link'],
                    ['clean']
                ]
            }
        });
    });

    // =====================================================================
    // DICTADO POR VOZ (mismo patrón que transcribir_examen)
    // =====================================================================
    var _campana_reconocimiento = null;
    var _campana_dictando       = false;

    function campana_dictado_iniciar() {
        var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
            $('#campana_dictado_badge').removeClass('badge-light badge-success badge-danger')
                .addClass('badge-danger').text('❌ No compatible');
            swal('No compatible', 'Tu navegador no soporta el dictado por voz. Usa Chrome o Edge.', 'warning');
            return;
        }

        _campana_reconocimiento = new SpeechRecognition();
        _campana_reconocimiento.lang           = 'es-CL';
        _campana_reconocimiento.continuous     = true;
        _campana_reconocimiento.interimResults = true;

        _campana_reconocimiento.onstart = function () {
            _campana_dictando = true;
            $('#btn_campana_dict_iniciar').prop('disabled', true);
            $('#btn_campana_dict_detener').prop('disabled', false);
            $('#campana_dictado_badge').removeClass('badge-light badge-danger')
                .addClass('badge-success').html('🎤 Escuchando…');
            $('#campana_dictado_interim_preview').show();
        };

        _campana_reconocimiento.onresult = function (event) {
            var textoFinal   = '';
            var textoInterim = '';
            for (var i = event.resultIndex; i < event.results.length; i++) {
                if (event.results[i].isFinal) {
                    textoFinal += event.results[i][0].transcript;
                } else {
                    textoInterim += event.results[i][0].transcript;
                }
            }
            $('#campana_dictado_interim_preview').text(textoInterim ? '💬 ' + textoInterim : '');
            if (textoFinal && quill_campana) {
                var pos = quill_campana.getLength() - 1;
                if (pos > 0) {
                    var ultimoChar = quill_campana.getText(pos - 1, 1);
                    if (ultimoChar !== ' ' && ultimoChar !== '\n') {
                        quill_campana.insertText(pos, ' ');
                        pos++;
                    }
                }
                quill_campana.insertText(pos, textoFinal);
                quill_campana.setSelection(quill_campana.getLength());
                $('#campana_dictado_interim_preview').text('');
            }
        };

        _campana_reconocimiento.onend = function () {
            if (_campana_dictando) {
                try { _campana_reconocimiento.start(); } catch(e) {}
            } else {
                $('#campana_dictado_badge').removeClass('badge-success badge-danger')
                    .addClass('badge-light').text('⏸ Detenido');
                $('#campana_dictado_interim_preview').hide().text('');
                $('#btn_campana_dict_iniciar').prop('disabled', false);
                $('#btn_campana_dict_detener').prop('disabled', true);
            }
        };

        _campana_reconocimiento.onerror = function (event) {
            if (event.error === 'no-speech') return;
            $('#campana_dictado_badge').removeClass('badge-success badge-light')
                .addClass('badge-danger').text('❌ Error: ' + event.error);
            _campana_dictando = false;
            $('#btn_campana_dict_iniciar').prop('disabled', false);
            $('#btn_campana_dict_detener').prop('disabled', true);
        };

        _campana_reconocimiento.start();
    }

    function campana_dictado_detener() {
        _campana_dictando = false;
        if (_campana_reconocimiento) {
            try { _campana_reconocimiento.stop(); } catch(e) {}
        }
    }

    function campana_dictado_limpiar() {
        if (!quill_campana || quill_campana.getText().trim() === '') return;
        swal({
            title: '¿Limpiar mensaje?',
            text: '¿Deseas limpiar todo el contenido del mensaje de la campaña? Esta acción no se puede deshacer.',
            icon: 'warning',
            buttons: {
                cancel: 'Cancelar',
                confirm: {
                    text: 'Limpiar',
                    value: true
                }
            }
        }).then(function(value) {
            if (value) {
                quill_campana.setContents([]);
                $('#campana_dictado_interim_preview').text('');
            }
        });
    }

    /**
     * Enviar campaña a todos los clientes
     * (mismo patrón que enviar_campana_promocional_confirmar en venta_audifono)
     */
    function enviar_campana_promocional() {
        var titulo    = $('#campana_titulo').val().trim();
        var remitente = $('#campana_remitente').val().trim();
        var mensaje   = quill_campana ? quill_campana.root.innerHTML : '';
        if (quill_campana && !quill_campana.getText().trim()) { mensaje = ''; }

        // Validación básica
        if (!titulo) {
            swal({ icon: 'warning', title: 'Faltan datos', text: 'Por favor ingrese el título de la campaña.' });
            return;
        }
        if (!remitente) {
            swal({ icon: 'warning', title: 'Faltan datos', text: 'Por favor ingrese el correo del remitente.' });
            return;
        }
        if (!mensaje) {
            swal({ icon: 'warning', title: 'Faltan datos', text: 'Por favor ingrese el mensaje de la campaña.' });
            return;
        }

        // 1) Confirmación primero
        swal({
            title: '¿Enviar campaña?',
            text: 'Se enviará a TODOS los clientes activos con correo registrado. Esta acción no se puede deshacer.',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    value: false,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Sí, enviar',
                    value: true,
                    visible: true,
                    className: 'btn-primary',
                    closeModal: false
                }
            }
        }).then(function(confirmar) {
            if (!confirmar) return;

            // 2) Loader
            swal({
                title: 'Enviando campaña...',
                text: 'Esto puede tardar unos segundos.',
                icon: 'info',
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false
            });

            // 3) FormData (incluye archivos adjuntos e imágenes)
            var formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('titulo',    titulo);
            formData.append('remitente', remitente);
            formData.append('mensaje',   mensaje);

            var archivos = $('#archivos')[0] ? $('#archivos')[0].files : [];
            for (var i = 0; i < archivos.length; i++) {
                formData.append('archivos[]', archivos[i]);
            }
            var imagenes = $('#imagenes')[0] ? $('#imagenes')[0].files : [];
            for (var j = 0; j < imagenes.length; j++) {
                formData.append('imagenes[]', imagenes[j]);
            }

            // 4) Paso 1: guardar borrador
            $.ajax({
                url: "{{ route('laboratorio.distribucion.guardar_campana_email') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status !== 'success') {
                        swal({ icon: 'error', title: 'Error', text: response.message || 'No se pudo guardar la campaña.' });
                        return;
                    }

                    // 5) Paso 2: enviar a todos los clientes
                    $.ajax({
                        url: '/Laboratorio/Distribuidores/campanas-email/' + response.campana_id + '/enviar',
                        type: 'POST',
                        data: { _token: $('meta[name="csrf-token"]').attr('content') },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res);
                            if (res.status === 'success') {
                                swal({
                                    icon: 'success',
                                    title: '¡Campaña enviada!',
                                    text: (res.message || '') + '\nEnviados: ' + res.campana.enviados + ' | Fallidos: ' + res.campana.fallidos
                                }).then(function() {
                                    $('#form_campana_promocional')[0].reset();
                                    if (quill_campana) { quill_campana.setContents([]); }
                                    cargar_historial_campanas_email();
                                });
                            } else {
                                swal({ icon: 'error', title: 'Error', text: res.message || 'No se pudo enviar la campaña.' });
                            }
                        },
                        error: function(xhr) {
                            var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Error al enviar la campaña.';
                            swal({ icon: 'error', title: 'Error', text: msg });
                        }
                    });
                },
                error: function(xhr) {
                    var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Error al procesar la campaña.';
                    swal({ icon: 'error', title: 'Error', text: msg });
                }
            });
        });
    }

    /**
     * Cargar historial de campañas de email
     */
    function cargar_historial_campanas_email() {
        $.ajax({
            url: "{{ route('laboratorio.distribucion.historial_campanas_email') }}",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.campanas.length > 0) {
                    let html = '';
                    response.campanas.forEach(function(campana) {
                        let badge_estado = 'badge-secondary';
                        if (campana.estado === 'Enviada') badge_estado = 'badge-success';
                        else if (campana.estado === 'Enviando') badge_estado = 'badge-info';
                        else if (campana.estado === 'Error') badge_estado = 'badge-danger';
                        else if (campana.estado === 'Borrador') badge_estado = 'badge-warning';

                        html += `
                            <tr>
                                <td class="font-weight-bold">${campana.titulo}</td>
                                <td>${campana.fecha_creacion}</td>
                                <td>${campana.remitente}</td>
                                <td class="text-center">
                                    <small>
                                        <span class="badge badge-success">${campana.enviados}</span> enviados
                                        <span class="badge badge-danger">${campana.fallidos}</span> fallidos
                                    </small>
                                </td>
                                <td class="text-center">
                                    <span class="badge ${badge_estado}">${campana.estado}</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info" onclick="ver_detalles_campana_email(${campana.id})" title="Ver detalles">
                                        <i class="feather icon-eye"></i>
                                    </button>
                                    ${campana.estado === 'Borrador' ? `
                                        <button class="btn btn-sm btn-danger" onclick="eliminar_campana_email(${campana.id})" title="Eliminar">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    ` : ''}
                                </td>
                            </tr>
                        `;
                    });
                    $('#campanas_promocionales_lista').html(html);
                }
            }
        });
    }

    /**
     * Ver detalles de una campaña
     */
    function ver_detalles_campana_email(id) {
        $.ajax({
            url: "/Laboratorio/Distribuidores/campanas-email/" + id + "/detalle",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let campana = response.campana;
                    let html = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Título:</strong> ${campana.titulo}
                            </div>
                            <div class="col-md-6">
                                <strong>Remitente:</strong> ${campana.remitente}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <strong>Mensaje:</strong>
                                <div class="border p-2 rounded bg-light mt-2">
                                    ${campana.mensaje}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <h6>${campana.total_destinatarios}</h6>
                                <small class="text-muted">Total Destinatarios</small>
                            </div>
                            <div class="col-md-3 text-center">
                                <h6 class="text-success">${campana.enviados}</h6>
                                <small class="text-muted">Enviados</small>
                            </div>
                            <div class="col-md-3 text-center">
                                <h6 class="text-danger">${campana.fallidos}</h6>
                                <small class="text-muted">Fallidos</small>
                            </div>
                            <div class="col-md-3 text-center">
                                <h6 class="text-info">${campana.porcentaje_exito}%</h6>
                                <small class="text-muted">Éxito</small>
                            </div>
                        </div>
                    `;
                    swal({
                        title: 'Detalles de Campaña',
                        content: {
                            element: 'div',
                            attributes: {
                                innerHTML: html
                            }
                        },
                        icon: 'info'
                    });
                }
            }
        });
    }

    /**
     * Eliminar campaña de email
     */
    function eliminar_campana_email(id) {
        swal({
            title: '¿Eliminar campaña?',
            text: 'Solo se pueden eliminar campañas en estado borrador.',
            icon: 'warning',
            buttons: {
                cancel: 'Cancelar',
                confirm: {
                    text: 'Eliminar',
                    value: true
                }
            }
        }).then(function(value) {
            if (value) {
                $.ajax({
                    url: "/Laboratorio/Distribuidores/campanas-email/" + id + "/eliminar",
                    method: 'DELETE',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            swal('Éxito', 'Campaña eliminada correctamente', 'success').then(function() {
                                cargar_historial_campanas_email();
                            });
                        }
                    },
                    error: function(err) {
                        swal('Error', 'No se pudo eliminar la campaña', 'error');
                    }
                });
            }
        });
    }
</script>

@endsection
