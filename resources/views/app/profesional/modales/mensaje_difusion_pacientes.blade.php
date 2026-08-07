<!-- Modal mensaje de difusión a pacientes -->
<div class="modal fade" id="modalMensajeDifusionPacientes" tabindex="-1" role="dialog" aria-labelledby="modalMensajeDifusionPacientesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalMensajeDifusionPacientesLabel">
                    <i class="feather icon-radio text-white mr-1"></i> Mensaje de difusión a mis pacientes
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar" onclick="cerrar_modal_difusion_pacientes();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-primary mb-3">
                    <i class="feather icon-info mr-1"></i> Este mensaje será enviado a todos los pacientes que tengan atenciones asociadas a usted.
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm" for="asunto_mensaje_difusion_pacientes">Asunto</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Escribe el asunto" placeholder="Escriba el asunto" id="asunto_mensaje_difusion_pacientes" autocomplete="off" maxlength="150">
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm" for="contenido_mensaje_difusion_pacientes">Mensaje</label>
                        <textarea class="form-control form-control-sm" id="contenido_mensaje_difusion_pacientes" rows="5" maxlength="2000" placeholder="Escriba la información que desea comunicar"></textarea>
                        <small class="text-muted">Máximo 0/2000 caracteres.</small>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrar_modal_difusion_pacientes();">
                    <i class="feather icon-x"></i> Cerrar
                </button>
                <button type="button" class="btn btn-info" id="btn_enviar_difusion_pacientes" onclick="enviar_mensaje_difusion_paciente_confirmar()">
                    <i class="feather icon-mail"></i> Enviar difusión
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function cerrar_modal_difusion_pacientes() {
        $('#modalMensajeDifusionPacientes').modal('hide');

        // Respaldo: fuerza el cierre y limpia el backdrop si quedara pegado
        setTimeout(function () {
            $('#modalMensajeDifusionPacientes').removeClass('show').css('display', 'none').attr('aria-hidden', 'true');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open').css({ 'overflow': '', 'padding-right': '' });
        }, 300);
    }

    $('#modalMensajeDifusionPacientes').on('hidden.bs.modal', function () {
        $('#asunto_mensaje_difusion_pacientes').val('');
        $('#contenido_mensaje_difusion_pacientes').val('');
        $('#btn_enviar_difusion_pacientes').prop('disabled', false).html('<i class="feather icon-mail"></i> Enviar difusión');
    });

    function enviar_mensaje_difusion_paciente_confirmar() {
        var asunto = $.trim($('#asunto_mensaje_difusion_pacientes').val());
        var mensaje = $.trim($('#contenido_mensaje_difusion_pacientes').val());

        if (asunto === '') {
            swal({ title: 'Error', text: 'Ingrese el asunto.', icon: 'error', button: 'Aceptar' });
            return false;
        }

        if (mensaje === '') {
            swal({ title: 'Error', text: 'Ingrese el mensaje.', icon: 'error', button: 'Aceptar' });
            return false;
        }

        swal({
            title: 'Confirmar difusión',
            text: 'Este mensaje será enviado a todos sus pacientes. ¿Desea continuar?',
            icon: 'warning',
            buttons: ['Cancelar', 'Enviar difusión'],
            dangerMode: false
        }).then(function (confirmado) {
            if (!confirmado) {
                return false;
            }

            $('#btn_enviar_difusion_pacientes').prop('disabled', true).html('<i class="feather icon-loader"></i> Enviando...');

            $.ajax({
                url: "{{ route('enviar_mensaje_difusion_pacientes') }}",
                type: 'POST',
                data: {
                    asunto: asunto,
                    mensaje: mensaje,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response && response.estado == 1) {
                        var texto = response.mensaje || 'El mensaje de difusión ha sido enviado correctamente.';

                        if (response.total_enviados) {
                            texto += ' Total enviados: ' + response.total_enviados + '.';
                        }

                        swal({
                            title: 'Difusión enviada',
                            text: texto,
                            icon: 'success',
                            button: 'Aceptar'
                        }).then(function () {
                            cerrar_modal_difusion_pacientes();
                        });
                    } else {
                        swal({
                            title: 'Error',
                            text: (response && response.mensaje) ? response.mensaje : 'Ocurrió un error al enviar la difusión.',
                            icon: 'error',
                            button: 'Aceptar'
                        });
                    }
                },
                error: function () {
                    swal({ title: 'Error', text: 'No se pudo conectar con el servidor.', icon: 'error', button: 'Aceptar' });
                },
                complete: function () {
                    $('#btn_enviar_difusion_pacientes').prop('disabled', false).html('<i class="feather icon-mail"></i> Enviar difusión');
                }
            });
        });
    }
</script>
