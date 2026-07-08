<!-- Modal mensaje directo a paciente -->
<div class="modal fade" id="modalMensajePaciente" tabindex="-1" role="dialog" aria-labelledby="modalMensajePacienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalMensajePacienteLabel">
                    <i class="feather icon-mail mr-1"></i> Mensaje a paciente
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-light border mb-3">
                    <strong>Mensaje directo</strong><br>
                    <small class="text-muted">Este mensaje será enviado solo al paciente seleccionado.</small>
                </div>

                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="asunto_mensaje_paciente">Asunto</label>
                            <input type="text" class="form-control form-control-sm" id="asunto_mensaje_paciente" autocomplete="off" maxlength="150">
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm" for="contenido_mensaje_paciente">Mensaje</label>
                        <textarea class="form-control form-control-sm" id="contenido_mensaje_paciente" rows="5" maxlength="2000"></textarea>
                        <small class="text-muted">Máximo 2000 caracteres.</small>
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Adjuntos</label>
                        <div class="dropzone" id="mis-archivos-paciente"></div>
                        <small class="text-muted">Opcional. Máximo 5 archivos de 5 MB. Permite imágenes y PDF.</small>
                    </div>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-info btn-sm" id="btn_enviar_mensaje_paciente" onclick="enviar_mensaje_paciente_confirmar()">
                    <i class="feather icon-mail"></i> Enviar mensaje
                </button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="id_paciente_mensaje" name="id_paciente_mensaje" value="">

<script>
    var dropzoneMensajePaciente = null;

    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Dropzone !== 'undefined') {
            Dropzone.autoDiscover = false;

            if (document.querySelector('#mis-archivos-paciente') && !dropzoneMensajePaciente) {
                dropzoneMensajePaciente = new Dropzone('#mis-archivos-paciente', {
                    // No se procesa automáticamente. Los archivos se adjuntan manualmente al FormData.
                    url: "{{ route('enviar_mensaje_paciente') }}",
                    addRemoveLinks: true,
                    uploadMultiple: false,
                    parallelUploads: 5,
                    maxFiles: 5,
                    maxFilesize: 5,
                    acceptedFiles: 'image/*,application/pdf',
                    autoProcessQueue: false,
                    dictDefaultMessage: '<div class="text-center"><i class="fas fa-cloud-upload-alt fa-3x"></i><h5 class="mt-2">Arrastra aquí tus archivos</h5><small>o haz clic para seleccionar</small></div>',
                    dictRemoveFile: 'Eliminar',
                    dictCancelUpload: 'Cancelar',
                    dictMaxFilesExceeded: 'No puedes subir más archivos',
                    dictFileTooBig: 'El archivo es muy grande. Máximo 5 MB.',
                    dictInvalidFileType: 'Tipo de archivo no permitido',
                    dictResponseError: 'Error al subir el archivo'
                });
            }
        }
    });

    $('#modalMensajePaciente').on('hidden.bs.modal', function () {
        $('#asunto_mensaje_paciente').val('');
        $('#contenido_mensaje_paciente').val('');
        $('#id_paciente_mensaje').val('');

        if (dropzoneMensajePaciente) {
            dropzoneMensajePaciente.removeAllFiles(true);
        }

        $('#btn_enviar_mensaje_paciente')
            .prop('disabled', false)
            .html('<i class="feather icon-mail"></i> Enviar mensaje');
    });

    function enviar_mensaje_paciente_confirmar() {
        var asunto = $.trim($('#asunto_mensaje_paciente').val());
        var mensaje = $.trim($('#contenido_mensaje_paciente').val());
        var id_paciente = $('#id_paciente_mensaje').val();

        if (!id_paciente) {
            swal({ title: 'Error', text: 'No se pudo identificar el paciente.', icon: 'error', button: 'Aceptar' });
            return false;
        }

        if (asunto === '') {
            swal({ title: 'Error', text: 'Ingrese el asunto.', icon: 'error', button: 'Aceptar' });
            return false;
        }

        if (mensaje === '') {
            swal({ title: 'Error', text: 'Ingrese el mensaje.', icon: 'error', button: 'Aceptar' });
            return false;
        }

        var formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('asunto', asunto);
        formData.append('mensaje', mensaje);
        formData.append('id_paciente', id_paciente);

        if (dropzoneMensajePaciente && dropzoneMensajePaciente.files.length > 0) {
            dropzoneMensajePaciente.files.forEach(function (file) {
                // Solo se agregan archivos aceptados y no removidos.
                if (file.accepted !== false && file.status !== Dropzone.CANCELED) {
                    formData.append('archivos[]', file, file.name);
                }
            });
        }

        $('#btn_enviar_mensaje_paciente')
            .prop('disabled', true)
            .html('<i class="feather icon-loader"></i> Enviando...');

        $.ajax({
            url: "{{ route('enviar_mensaje_paciente') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                if (response && response.estado == 1) {
                    swal({
                        title: 'Mensaje enviado',
                        text: response.mensaje || 'El mensaje ha sido enviado correctamente.',
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function () {
                        $('#modalMensajePaciente').modal('hide');
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: (response && response.mensaje) ? response.mensaje : 'Ocurrió un error al enviar el mensaje.',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function (xhr) {
                var texto = 'No se pudo conectar con el servidor.';

                if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                    texto = xhr.responseJSON.mensaje;
                }

                swal({ title: 'Error', text: texto, icon: 'error', button: 'Aceptar' });
            },
            complete: function () {
                $('#btn_enviar_mensaje_paciente')
                    .prop('disabled', false)
                    .html('<i class="feather icon-mail"></i> Enviar mensaje');
            }
        });
    }
</script>
