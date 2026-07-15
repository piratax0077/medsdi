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

                            <button type="button"
                                class="btn btn-outline-primary btn-sm mt-2"
                                id="btnGrabarvoz">
                                <i class="feather icon-mic"></i> Dictar informe
                            </button>

                            <span id="estado_voz_voz" class="text-muted ml-2"></span>
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

        const formularioOriginal = document.getElementById('form_informe_psicologico');
        const formularioPdf = document.createElement('form');

        formularioPdf.method = 'POST';
        formularioPdf.action = "{{ route('ficha.otro.prof.psicologia.informe.pdf') }}";
        formularioPdf.target = '_blank';
        formularioPdf.style.display = 'none';

        const datos = new FormData(formularioOriginal);

        datos.forEach(function(valor, nombre) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = nombre;
            input.value = valor;
            formularioPdf.appendChild(input);
        });

        document.body.appendChild(formularioPdf);
        formularioPdf.submit();
        formularioPdf.remove();
    }
</script>
