<div id="informe_nutri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_nutri" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">INFORME NUTRICIÓN</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="card" href="#"><!--Inicio de Card-->
				    <div class="card-body shadow-none" id="form_0_orl">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <script>
                                       var f = new Date();
                                       document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="floating-label-activo-sm">Procedencia del Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="med_tte" id="med_tte" value="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Diagnóstico Nutrición</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_fono" id="dg_fono">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sesiones</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Sesiones Pendientes</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Tratamiento Realizado</label>
                                    <input type="text" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                                </div>
                                <div class="form-group col-md-12">
                                    <label id="" name="" class="floating-label-activo-sm">Informe</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                    <!-- Dictado por voz -->
                                    <div class="d-flex align-items-center mt-1">
                                        <button type="button" id="nutri_btn_dict_iniciar" class="btn btn-sm btn-success mr-1" onclick="nutri_dictado_iniciar()">
                                            <i class="feather icon-mic"></i> Iniciar Dictado
                                        </button>
                                        <button type="button" id="nutri_btn_dict_detener" class="btn btn-sm btn-danger mr-2" onclick="nutri_dictado_detener()" disabled>
                                            <i class="feather icon-mic-off"></i> Detener
                                        </button>
                                        <span id="nutri_dictado_estado_badge" class="badge badge-light">⏸ Detenido</span>
                                    </div>
                                    <div id="nutri_dictado_interim_preview" class="mt-1 text-muted small font-italic" style="display:none;"></div>
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="floating-label-activo-sm">Nombre Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_nutri" id="nombre_nutri" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Proximo Control</label>
                                    <input type="date" class="form-control form-control-sm" name="prox_cont_nutri" id="prox_cont_nutri">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


				<div class="modal-footer">
                    <button type="button" class="btn btn-secondary has-ripple" onclick="generarPdfInformeNutricion()">Ver PDF</button>
                    <button type="button" class="btn btn-info has-ripple" onclick="abrirModalEmailNutri()">
                        <i class="feather icon-mail"></i> Enviar por Email
                    </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" name="email_paciente" id="email_paciente" value="{{ $paciente->email }}">

<script>
    $(document).ready(function(){
        $('#com_inf_fono').summernote();
    });

    // =====================================================================
    // DICTADO POR VOZ — Informe Nutrición
    // =====================================================================
    var _nutri_reconocimiento = null;
    var _nutri_dictando       = false;

    function nutri_dictado_iniciar() {
        var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
            $('#nutri_dictado_estado_badge').removeClass('badge-light badge-success badge-danger')
                .addClass('badge-danger').text('❌ No compatible');
            alert('Tu navegador no soporta dictado por voz. Usa Chrome o Edge.');
            return;
        }

        _nutri_reconocimiento = new SpeechRecognition();
        _nutri_reconocimiento.lang           = 'es-CL';
        _nutri_reconocimiento.continuous     = true;
        _nutri_reconocimiento.interimResults = true;

        _nutri_reconocimiento.onstart = function () {
            _nutri_dictando = true;
            $('#nutri_btn_dict_iniciar').prop('disabled', true);
            $('#nutri_btn_dict_detener').prop('disabled', false);
            $('#nutri_dictado_estado_badge').removeClass('badge-light badge-danger')
                .addClass('badge-success').html('🎙️ Escuchando…');
            $('#nutri_dictado_interim_preview').show();
        };

        _nutri_reconocimiento.onresult = function (event) {
            var textoFinal   = '';
            var textoInterim = '';
            for (var i = event.resultIndex; i < event.results.length; i++) {
                if (event.results[i].isFinal) {
                    textoFinal += event.results[i][0].transcript;
                } else {
                    textoInterim += event.results[i][0].transcript;
                }
            }
            $('#nutri_dictado_interim_preview').text(textoInterim ? '💬 ' + textoInterim : '');
            if (textoFinal) {
                var contenidoActual = $('#com_inf_fono').summernote('code');
                if (contenidoActual === '<p><br></p>' || contenidoActual === '') {
                    $('#com_inf_fono').summernote('code', '<p>' + textoFinal + '</p>');
                } else {
                    var contenidoLimpio = contenidoActual.replace(/<\/p>$/, '');
                    $('#com_inf_fono').summernote('code', contenidoLimpio + ' ' + textoFinal + '</p>');
                }
                $('#nutri_dictado_interim_preview').text('');
            }
        };

        _nutri_reconocimiento.onend = function () {
            if (_nutri_dictando) {
                try { _nutri_reconocimiento.start(); } catch(e) {}
            } else {
                $('#nutri_dictado_estado_badge').removeClass('badge-success badge-danger')
                    .addClass('badge-light').text('⏸ Detenido');
                $('#nutri_dictado_interim_preview').hide().text('');
                $('#nutri_btn_dict_iniciar').prop('disabled', false);
                $('#nutri_btn_dict_detener').prop('disabled', true);
            }
        };

        _nutri_reconocimiento.onerror = function (event) {
            if (event.error === 'no-speech') return;
            $('#nutri_dictado_estado_badge').removeClass('badge-success badge-light')
                .addClass('badge-danger').text('❌ Error: ' + event.error);
            _nutri_dictando = false;
            $('#nutri_btn_dict_iniciar').prop('disabled', false);
            $('#nutri_btn_dict_detener').prop('disabled', true);
        };

        _nutri_reconocimiento.start();
    }

    function nutri_dictado_detener() {
        _nutri_dictando = false;
        if (_nutri_reconocimiento) {
            try { _nutri_reconocimiento.stop(); } catch(e) {}
        }
    }

    // Detener dictado al cerrar el modal
    $('#informe_nutri').on('hidden.bs.modal', function () {
        if (_nutri_dictando) nutri_dictado_detener();
    });

    // Limpiar blob URL al cerrar el modal de previsualización
    $('#modal_preview_pdf_nutri').on('hidden.bs.modal', function () {
        var iframe = document.getElementById('iframe_preview_pdf_nutri');
        if (iframe.src && iframe.src.startsWith('blob:')) {
            URL.revokeObjectURL(iframe.src);
        }
        iframe.src = '';
    });

    // Fix z-index para modal de PDF apilado sobre modal principal (Bootstrap 4)
    $('#modal_preview_pdf_nutri').on('shown.bs.modal', function () {
        $(this).css('z-index', 1060);
        $('.modal-backdrop').not(':first').css('z-index', 1050);
    });
    $('#modal_preview_pdf_nutri').on('hidden.bs.modal', function () {
        if ($('.modal.show').length) $('body').addClass('modal-open');
    });

function generarPdfInformeNutricion() {
    var btnVer = $('button[onclick="generarPdfInformeNutricion()"]');
    btnVer.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status"></span> Generando…');

    var formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').first().val());

    // Campos de texto
    var campos = ['med_tte', 'dg_fono', 'ses_real', 'ses_pend', 'tto_realizado', 'nombre_nutri', 'prox_cont_nutri'];
    campos.forEach(function(campo) {
        formData.append(campo, $('#' + campo).val() || '');
    });

    // Summernote
    formData.append('com_inf_fono', $('#com_inf_fono').summernote('code') || '');

    // IDs de contexto
    var ids = [
        { name: 'id_ficha_atencion', selector: '#id_fc' },
        { name: 'id_hora_medica',    selector: '#hora_medica' },
        { name: 'id_profesional',    selector: '#id_profesional_fc' },
        { name: 'id_lugar_atencion', selector: '#id_lugar_atencion' },
        { name: 'id_paciente',       selector: '#id_paciente_fc' }
    ];
    ids.forEach(function(item) {
        formData.append(item.name, $(item.selector).val() || '');
    });

    fetch('{{ route("profesional.generar_pdf_informe_nutricion") }}', {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        if (!response.ok) {
            return response.text().then(function(text) { throw new Error(text); });
        }
        return response.blob();
    })
    .then(function(blob) {
        var blobUrl = URL.createObjectURL(blob);
        document.getElementById('iframe_preview_pdf_nutri').src = blobUrl;
        $('#modal_preview_pdf_nutri').modal('show');
    })
    .catch(function(err) {
        console.error('Error al generar PDF:', err);
        alert('Error al generar el PDF. Revisa la consola para más detalles.');
    })
    .finally(function() {
        btnVer.prop('disabled', false).html('Ver PDF');
    });
}

function abrirModalEmailNutri() {
    var emailPaciente = $('#email_paciente').val() || '';

    // Cerrar el modal Bootstrap primero para que swal pueda recibir el foco
    $('#informe_nutri').modal('hide');

    $('#informe_nutri').one('hidden.bs.modal', function () {
        swal({
            title: 'Enviar Informe por Email',
            text: 'Ingresa el correo de destino:',
            content: {
                element: 'input',
                attributes: {
                    type: 'email',
                    placeholder: 'ejemplo@correo.cl',
                    value: emailPaciente
                }
            },
            buttons: {
                cancel: 'Cancelar',
                confirm: 'Enviar'
            }
        })
        .then(function(email) {
            if(email == '') email = emailPaciente; // Convertir cadena vacía a null
            console.log('Email ingresado:', email);
            if (!email) {
                // Canceló → reabrir el modal
                $('#informe_nutri').modal('show');
                return;
            }
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.trim())) {
                console.log('Correo inválido:', email);
                swal('Correo inválido', 'El formato del correo no es válido.', 'error')
                .then(function() { $('#informe_nutri').modal('show'); });
                return;
            }
            enviarEmailInformeNutricion(email.trim());
        });
    });
}

function enviarEmailInformeNutricion(email) {
    swal({
        title: 'Enviando informe\u2026',
        text: 'Por favor espera.',
        buttons: false,
        closeOnClickOutside: false
    });

    var formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').first().val());
    formData.append('email_destino', email);

    var campos = ['med_tte', 'dg_fono', 'ses_real', 'ses_pend', 'tto_realizado', 'nombre_nutri', 'prox_cont_nutri'];
    campos.forEach(function(campo) {
        formData.append(campo, $('#' + campo).val() || '');
    });
    formData.append('com_inf_fono', $('#com_inf_fono').summernote('code') || '');

    var ids = [
        { name: 'id_ficha_atencion', selector: '#id_fc' },
        { name: 'id_hora_medica',    selector: '#hora_medica' },
        { name: 'id_profesional',    selector: '#id_profesional_fc' },
        { name: 'id_lugar_atencion', selector: '#id_lugar_atencion' },
        { name: 'id_paciente',       selector: '#id_paciente_fc' }
    ];
    ids.forEach(function(item) {
        formData.append(item.name, $(item.selector).val() || '');
    });

    fetch('{{ route("profesional.enviar_email_informe_nutricion") }}', {
        method: 'POST',
        body: formData
    })
    .then(function(response) { return response.json(); })
    .then(function(data) {
        console.log(data);
        if (data.estado == 1) {
            swal('¡Enviado!', data.msj || 'Informe enviado correctamente.', 'success')
            .then(function() { $('#informe_nutri').modal('show'); });
        } else {
            swal('Error al enviar', data.msj || 'No se pudo enviar el correo.', 'error')
            .then(function() { $('#informe_nutri').modal('show'); });
        }
    })
    .catch(function(err) {
        console.error(err);
        swal('Error de conexión', 'Intenta nuevamente.', 'error')
        .then(function() { $('#informe_nutri').modal('show'); });
    });
}
</script>

<!-- Modal previsualización PDF Informe Nutrición -->
<div id="modal_preview_pdf_nutri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_preview_pdf_nutri_label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="max-width:92vw;">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_preview_pdf_nutri_label">
                    <i class="feather icon-file-text mr-1"></i> Previsualización — Informe Nutrición
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0" style="height:82vh;">
                <iframe id="iframe_preview_pdf_nutri"
                        src=""
                        style="width:100%; height:100%; border:none;"
                        title="Informe Nutrición PDF">
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
