<div id="informe_psi" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="informe_psi_titulo" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="informe_psi_titulo">
                    Informe psicológico
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form_informe_psicologico">
                @csrf

                <input type="hidden" name="id_ficha_atencion" id="informe_id_ficha_atencion">
                <input type="hidden" name="id_paciente" id="informe_id_paciente">
                <input type="hidden" name="id_profesional" id="informe_id_profesional">
                <input type="hidden" name="id_lugar_atencion" id="informe_id_lugar_atencion">

                <div class="modal-body">
                    <div id="mensaje_informe_psicologico" class="alert d-none" role="alert"></div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label class="floating-label-activo-sm">Fecha del informe</label>
                            <input type="date"
                                class="form-control form-control-sm"
                                name="fecha_informe"
                                id="fecha_informe"
                                value="{{ now()->format('Y-m-d') }}"
                                required>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="floating-label-activo-sm">Procedencia del paciente</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                name="procedencia"
                                id="proc_pcte"
                                maxlength="255">
                        </div>

                        <div class="form-group col-12">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                name="diagnostico"
                                id="dg_psico"
                                maxlength="500"
                                required>
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label class="floating-label-activo-sm">Sesiones realizadas</label>
                            <input type="number"
                                min="0"
                                class="form-control form-control-sm"
                                name="sesiones_realizadas"
                                id="ses_real">
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label class="floating-label-activo-sm">Sesiones pendientes</label>
                            <input type="number"
                                min="0"
                                class="form-control form-control-sm"
                                name="sesiones_pendientes"
                                id="ses_pend">
                        </div>

                        <div class="form-group col-12">
                            <label class="floating-label-activo-sm">Tratamiento realizado</label>
                            <textarea class="form-control form-control-sm"
                                rows="3"
                                name="tratamiento_realizado"
                                id="tto_realizado"></textarea>
                        </div>

                        <div class="form-group col-12 mb-2">
                            <label class="floating-label-activo-sm">Informe</label>
                            <textarea class="form-control form-control-sm"
                                rows="7"
                                name="informe"
                                id="com_inf_fono"
                                required></textarea>

                            <div class="d-flex flex-wrap align-items-center mt-2" style="gap: 6px;">
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm"
                                    id="btnGrabarvoz"
                                    onclick="iniciarDictadoInformePsicologico()">
                                    <i class="feather icon-mic"></i> Dictar informe
                                </button>

                                <button type="button"
                                    class="btn btn-outline-secondary btn-sm"
                                    id="btnDetenervoz"
                                    onclick="detenerDictadoInformePsicologico()"
                                    disabled>
                                    <i class="feather icon-square"></i> Detener
                                </button>

                                <button type="button"
                                    class="btn btn-outline-danger btn-sm"
                                    id="btnLimpiarvoz"
                                    onclick="limpiarDictadoInformePsicologico()">
                                    <i class="feather icon-trash-2"></i> Limpiar
                                </button>

                                <span id="estado_voz_voz"
                                    class="badge badge-light ml-1"
                                    style="font-size: .78rem;">
                                    ⏸ Detenido
                                </span>
                            </div>

                            <div id="texto_interino_informe_psico"
                                class="mt-2 px-2 py-1"
                                style="display:none; background:#e8f7fa; border:1px solid #b8e8f0;
                                       color:#117a8b; border-radius:4px; font-style:italic;
                                       min-height:28px;">
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label class="floating-label-activo-sm">Nombre profesional</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                name="nombre_profesional"
                                id="nombre_sico"
                                value="{{ trim(($profesional->nombre ?? '') . ' ' . ($profesional->apellido_uno ?? '') . ' ' . ($profesional->apellido_dos ?? '')) }}"
                                readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Próximo control</label>
                            <input type="date"
                                class="form-control form-control-sm"
                                name="proximo_control"
                                id="prox_cont_sico">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-primary btn-sm"
                        id="btn_ver_pdf_informe_psicologico"
                        onclick="generarInformePsicologicoPdf()">
                        <i class="feather icon-file-text"></i> Ver PDF
                    </button>

                    <button type="button"
                        class="btn btn-danger btn-sm"
                        data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>

                    <button type="button"
                        class="btn btn-info btn-sm"
                        id="btn_guardar_informe_psicologico"
                        onclick="guardarInformePsicologico()">
                        <i class="feather icon-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function cargarIdentificadoresInformePsicologico() {
        $('#informe_id_ficha_atencion').val($('#id_fc').val() || '');
        $('#informe_id_paciente').val($('#id_paciente_fc').val() || '');
        $('#informe_id_profesional').val($('#id_profesional_fc').val() || '');
        $('#informe_id_lugar_atencion').val($('#id_lugar_atencion').val() || '');

        if (!$('#dg_psico').val()) {
            $('#dg_psico').val($('#hipotesis').val() || $('#descripcion_cie').val() || '');
        }
    }

    function informe_psi() {
        cargarIdentificadoresInformePsicologico();
        $('#mensaje_informe_psicologico').addClass('d-none').removeClass('alert-danger alert-success');
        $('#informe_psi').modal('show');
    }

    function validarInformePsicologico() {
        const diagnostico = $.trim($('#dg_psico').val());
        const informe = $.trim($('#com_inf_fono').val());

        if (!diagnostico) {
            swal({
                title: 'Datos incompletos',
                text: 'Debe ingresar el diagnóstico.',
                icon: 'warning',
                button: 'Aceptar'
            });
            $('#dg_psico').focus();
            return false;
        }

        if (!informe) {
            swal({
                title: 'Datos incompletos',
                text: 'Debe ingresar el contenido del informe psicológico.',
                icon: 'warning',
                button: 'Aceptar'
            });
            $('#com_inf_fono').focus();
            return false;
        }

        return true;
    }

    function guardarInformePsicologico() {
        if (!validarInformePsicologico()) {
            return;
        }

        cargarIdentificadoresInformePsicologico();

        const boton = $('#btn_guardar_informe_psicologico');
        boton.prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm mr-1"></span> Guardando...'
        );

        $.ajax({
            url: "{{ route('ficha.otro.prof.psicologia.informe.guardar') }}",
            type: 'POST',
            dataType: 'json',
            data: $('#form_informe_psicologico').serialize()
        })
        .done(function(response) {
            console.log(
                'Respuesta del servidor al guardar informe psicológico:',
                response
            );
            if (response && Number(response.estado) === 1) {
                swal({
                    title: 'Informe psicológico',
                    text: response.msj || 'Informe guardado correctamente.',
                    icon: 'success',
                    button: 'Aceptar'
                });

                if (response.informe && response.informe.id) {
                    $('#form_informe_psicologico')
                        .find('input[name="id_informe"]')
                        .remove();

                    $('<input>', {
                        type: 'hidden',
                        name: 'id_informe',
                        value: response.informe.id
                    }).appendTo('#form_informe_psicologico');
                }

                return;
            }

            swal({
                title: 'No fue posible guardar',
                text: response.msj || 'Revise los datos e intente nuevamente.',
                icon: 'error',
                button: 'Aceptar'
            });
        })
        .fail(function(xhr) {
            console.log('Error al guardar informe psicológico:', xhr);
            let mensaje = 'No fue posible guardar el informe psicológico.';

            if (xhr.responseJSON) {
                mensaje = xhr.responseJSON.msj ||
                    xhr.responseJSON.message ||
                    mensaje;

                if (xhr.responseJSON.errors) {
                    mensaje = Object.values(xhr.responseJSON.errors)
                        .flat()
                        .join('\n');
                }
            }

            swal({
                title: 'Error',
                text: mensaje,
                icon: 'error',
                button: 'Aceptar'
            });
        })
        .always(function() {
            boton.prop('disabled', false).html(
                '<i class="feather icon-save"></i> Guardar'
            );
        });
    }

    function generarInformePsicologicoPdf() {
        if (!validarInformePsicologico()) {
            return;
        }

        cargarIdentificadoresInformePsicologico();

        var formulario = $('#form_informe_psicologico');
        var boton = $('#btn_ver_pdf_informe_psicologico');
        var textoOriginalBoton = boton.html();

        /*
         * La ventana debe abrirse directamente desde el clic del usuario.
         * Si se abre dentro del callback AJAX, Chrome puede bloquearla.
         */
        var ventanaPdf = window.open(
            '',
            'informePsicologicoPdf',
            'width=1050,height=780,scrollbars=yes,resizable=yes'
        );

        if (!ventanaPdf) {
            swal({
                title: 'Ventana bloqueada',
                text: 'El navegador bloqueó la ventana emergente. Habilite las ventanas emergentes para este sitio.',
                icon: 'warning',
                button: 'Aceptar'
            });
            return;
        }

        /*
         * Mostrar una pantalla de carga mientras el backend genera el PDF.
         */
        ventanaPdf.document.open();
        ventanaPdf.document.write(
            '<!DOCTYPE html>' +
            '<html lang="es">' +
                '<head>' +
                    '<meta charset="UTF-8">' +
                    '<meta name="viewport" content="width=device-width, initial-scale=1.0">' +
                    '<title>Generando informe psicológico</title>' +
                    '<style>' +
                        'html,body{' +
                            'width:100%;height:100%;margin:0;' +
                            'font-family:Arial,sans-serif;background:#f8f9fa;' +
                        '}' +
                        '.contenedor{' +
                            'height:100%;display:flex;flex-direction:column;' +
                            'align-items:center;justify-content:center;color:#6c757d;' +
                        '}' +
                        '.spinner{' +
                            'width:44px;height:44px;border:4px solid #d9eff1;' +
                            'border-top-color:#17a2b8;border-radius:50%;' +
                            'animation:girar .8s linear infinite;margin-bottom:18px;' +
                        '}' +
                        '@keyframes girar{to{transform:rotate(360deg);}}' +
                    '</style>' +
                '</head>' +
                '<body>' +
                    '<div class="contenedor">' +
                        '<div class="spinner"></div>' +
                        '<div>Generando informe psicológico...</div>' +
                    '</div>' +
                '</body>' +
            '</html>'
        );
        ventanaPdf.document.close();

        boton.prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm mr-1"></span> Generando...'
        );

        $.ajax({
            url: "{{ route('ficha.otro.prof.psicologia.informe.pdf') }}",
            type: 'POST',
            dataType: 'json',
            data: formulario.serialize()
        })
        .done(function(response) {
            console.log(
                'Respuesta del servidor al generar PDF del informe psicológico:',
                response
            );

            if (
                response &&
                Number(response.estado) === 1 &&
                response.url
            ) {
                /*
                 * Agregar parámetro para evitar mostrar una versión anterior
                 * almacenada en caché.
                 */
                var urlPdf = response.url +
                    (response.url.indexOf('?') === -1 ? '?' : '&') +
                    't=' + Date.now();

                /*
                 * Reutilizar la misma ventana y navegar hacia el PDF.
                 */
                ventanaPdf.location.replace(urlPdf);
                ventanaPdf.focus();
                return;
            }

            if (ventanaPdf && !ventanaPdf.closed) {
                ventanaPdf.close();
            }

            swal({
                title: 'No fue posible generar el PDF',
                text: response && response.msj
                    ? response.msj
                    : 'El servidor no devolvió una URL válida.',
                icon: 'error',
                button: 'Aceptar'
            });
        })
        .fail(function(xhr) {
            console.log('error al generar PDF del informe psicológico:', xhr);
            if (ventanaPdf && !ventanaPdf.closed) {
                ventanaPdf.close();
            }

            var mensaje = 'Ocurrió un error al generar el informe psicológico.';

            if (xhr.responseJSON) {
                mensaje = xhr.responseJSON.msj ||
                    xhr.responseJSON.message ||
                    mensaje;

                if (xhr.responseJSON.errors) {
                    mensaje = Object.values(xhr.responseJSON.errors)
                        .flat()
                        .join('\n');

                }
            }

            swal({
                title: 'Error',
                text: mensaje,
                icon: 'error',
                button: 'Aceptar'
            });
        })
        .always(function() {
            boton.prop('disabled', false).html(textoOriginalBoton);
        });
    }

    // ================================================================
    // DICTADO POR VOZ PARA EL INFORME PSICOLÓGICO
    // Inserta el texto directamente en Summernote (#com_inf_fono).
    // ================================================================
    var reconocimientoInformePsicologico = null;
    var dictandoInformePsicologico = false;
    var reconocimientoInformePsicologicoActivo = false;
    var reinicioDictadoInformePendiente = null;

    function obtenerContenidoInformePsicologico() {
        if ($('#com_inf_fono').next('.note-editor').length) {
            return $('#com_inf_fono').summernote('code');
        }

        return $('#com_inf_fono').val() || '';
    }

    function obtenerTextoPlanoInformePsicologico() {
        var html = obtenerContenidoInformePsicologico();

        return $('<div>').html(html).text().replace(/\u00a0/g, ' ').trim();
    }

    function insertarTextoDictadoInformePsicologico(texto) {
        texto = $.trim(texto || '');

        if (!texto) {
            return;
        }

        var editorInicializado = $('#com_inf_fono').next('.note-editor').length > 0;

        if (editorInicializado) {
            /*
             * No usar pasteHTML porque Summernote requiere un rango de
             * selección activo y puede lanzar:
             * "Failed to execute setStart on Range".
             *
             * En su lugar obtenemos el HTML actual y agregamos el texto
             * escapado al final.
             */
            var htmlActual = $('#com_inf_fono').summernote('code') || '';
            var textoActual = $('<div>').html(htmlActual).text().trim();
            var textoSeguro = $('<div>').text(texto).html();

            if (
                htmlActual === '<p><br></p>' ||
                htmlActual === '<br>' ||
                textoActual === ''
            ) {
                htmlActual = '';
            }

            var separador = htmlActual !== '' ? '&nbsp;' : '';
            var nuevoHtml = htmlActual + separador + textoSeguro;

            $('#com_inf_fono').summernote('code', nuevoHtml);
        } else {
            var actual = $('#com_inf_fono').val() || '';
            var separadorTexto = actual.trim() !== '' ? ' ' : '';

            $('#com_inf_fono')
                .val(actual + separadorTexto + texto)
                .trigger('input');
        }
    }

    function actualizarEstadoDictadoInformePsicologico(estado, texto) {
        var badge = $('#estado_voz_voz');

        badge.removeClass('badge-light badge-success badge-danger badge-warning');

        if (estado === 'escuchando') {
            badge.addClass('badge-success').html('🎙️ Escuchando...');
        } else if (estado === 'error') {
            badge.addClass('badge-danger').html('❌ ' + texto);
        } else if (estado === 'procesando') {
            badge.addClass('badge-warning').html('💬 Procesando...');
        } else {
            badge.addClass('badge-light').html('⏸ Detenido');
        }
    }

    function iniciarDictadoInformePsicologico() {
        var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (!SpeechRecognition) {
            actualizarEstadoDictadoInformePsicologico('error', 'No compatible');

            swal({
                title: 'Dictado por voz no disponible',
                text: 'El navegador no soporta reconocimiento de voz. Utilice Google Chrome o Microsoft Edge.',
                icon: 'warning',
                button: 'Aceptar'
            });

            return;
        }

        /*
         * Evita crear o iniciar un reconocimiento cuando ya existe uno
         * escuchando o en proceso de inicio.
         */
        if (dictandoInformePsicologico || reconocimientoInformePsicologicoActivo) {
            return;
        }

        if (reinicioDictadoInformePendiente) {
            clearTimeout(reinicioDictadoInformePendiente);
            reinicioDictadoInformePendiente = null;
        }

        reconocimientoInformePsicologico = new SpeechRecognition();
        reconocimientoInformePsicologico.lang = 'es-CL';
        reconocimientoInformePsicologico.continuous = true;
        reconocimientoInformePsicologico.interimResults = true;

        reconocimientoInformePsicologico.onstart = function() {
            reconocimientoInformePsicologicoActivo = true;
            dictandoInformePsicologico = true;

            $('#btnGrabarvoz').prop('disabled', true);
            $('#btnDetenervoz').prop('disabled', false);
            $('#texto_interino_informe_psico').show().text('');

            actualizarEstadoDictadoInformePsicologico('escuchando');
        };

        reconocimientoInformePsicologico.onresult = function(event) {
            var textoFinal = '';
            var textoInterino = '';

            for (var i = event.resultIndex; i < event.results.length; i++) {
                var fragmento = event.results[i][0].transcript;

                if (event.results[i].isFinal) {
                    textoFinal += fragmento;
                } else {
                    textoInterino += fragmento;
                }
            }

            $('#texto_interino_informe_psico')
                .text(textoInterino ? '💬 ' + textoInterino : '');

            if ($.trim(textoFinal) !== '') {
                insertarTextoDictadoInformePsicologico(textoFinal);
                $('#texto_interino_informe_psico').text('');
            }
        };

        reconocimientoInformePsicologico.onend = function() {
            reconocimientoInformePsicologicoActivo = false;

            /*
             * Chrome puede cerrar una sesión de reconocimiento por silencio.
             * Se reinicia con una pequeña pausa y solo cuando el objeto ya
             * terminó realmente.
             */
            if (dictandoInformePsicologico) {
                reinicioDictadoInformePendiente = setTimeout(function() {
                    if (
                        dictandoInformePsicologico &&
                        reconocimientoInformePsicologico &&
                        !reconocimientoInformePsicologicoActivo
                    ) {
                        try {
                            reconocimientoInformePsicologico.start();
                        } catch (e) {
                            console.warn('No fue posible reiniciar el dictado:', e);
                        }
                    }
                }, 350);

                return;
            }

            $('#btnGrabarvoz').prop('disabled', false);
            $('#btnDetenervoz').prop('disabled', true);
            $('#texto_interino_informe_psico').hide().text('');

            actualizarEstadoDictadoInformePsicologico('detenido');
        };

        reconocimientoInformePsicologico.onerror = function(event) {
            reconocimientoInformePsicologicoActivo = false;

            if (event.error === 'no-speech') {
                return;
            }

            dictandoInformePsicologico = false;

            if (reinicioDictadoInformePendiente) {
                clearTimeout(reinicioDictadoInformePendiente);
                reinicioDictadoInformePendiente = null;
            }

            $('#btnGrabarvoz').prop('disabled', false);
            $('#btnDetenervoz').prop('disabled', true);
            $('#texto_interino_informe_psico').hide().text('');

            var mensajes = {
                'not-allowed': 'Permiso de micrófono denegado',
                'audio-capture': 'No se encontró micrófono',
                'network': 'Error de conexión',
                'aborted': 'Dictado cancelado'
            };

            actualizarEstadoDictadoInformePsicologico(
                'error',
                mensajes[event.error] || event.error
            );
        };

        try {
            reconocimientoInformePsicologico.start();
        } catch (e) {
            reconocimientoInformePsicologicoActivo = false;
            dictandoInformePsicologico = false;
            actualizarEstadoDictadoInformePsicologico('error', 'No se pudo iniciar');
            console.error(e);
        }
    }

    function detenerDictadoInformePsicologico() {
        dictandoInformePsicologico = false;

        if (reinicioDictadoInformePendiente) {
            clearTimeout(reinicioDictadoInformePendiente);
            reinicioDictadoInformePendiente = null;
        }

        if (reconocimientoInformePsicologico) {
            reconocimientoInformePsicologico.onend = function() {
                reconocimientoInformePsicologicoActivo = false;
            };

            try {
                reconocimientoInformePsicologico.stop();
            } catch (e) {
                console.warn('No fue posible detener el dictado:', e);
            }
        }

        reconocimientoInformePsicologicoActivo = false;
        reconocimientoInformePsicologico = null;

        $('#btnGrabarvoz').prop('disabled', false);
        $('#btnDetenervoz').prop('disabled', true);
        $('#texto_interino_informe_psico').hide().text('');

        actualizarEstadoDictadoInformePsicologico('detenido');
    }

    function limpiarDictadoInformePsicologico() {
        var contenido = obtenerTextoPlanoInformePsicologico();

        if (contenido === '') {
            return;
        }

        swal({
            title: 'Limpiar informe',
            text: '¿Desea eliminar todo el contenido del informe psicológico?',
            icon: 'warning',
            buttons: {
                cancel: 'Cancelar',
                confirm: {
                    text: 'Sí, limpiar',
                    value: true
                }
            },
            dangerMode: true
        }).then(function(confirmado) {
            if (!confirmado) {
                return;
            }

            if ($('#com_inf_fono').next('.note-editor').length) {
                $('#com_inf_fono').summernote('code', '');
            } else {
                $('#com_inf_fono').val('');
            }

            $('#texto_interino_informe_psico').hide().text('');
        });
    }

    /*
     * Detener el micrófono al cerrar el modal para evitar que siga
     * escuchando fuera del informe.
     */
    $('#informe_psi').on('hidden.bs.modal', function() {
        detenerDictadoInformePsicologico();
    });
</script>
