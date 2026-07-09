{{-- =====================================================================
     MODAL: Permisos del Asistente
     Abre mediante roles_permisos(id_asistente, nombre_asistente)
     ===================================================================== --}}
<div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white"><i class="feather icon-shield"></i> Permisos del Asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="hidden" id="permisos_rol_id_asistente" value="">
                <input type="hidden" id="permisos_rol_id_lugar_atencion" value="{{ isset($institucion) ? $institucion->id_lugar_atencion : '' }}">
            </div>
            <div class="modal-body">

                {{-- Nombre del asistente --}}
                <div class="mb-3">
                    <small class="text-muted">Asistente</small>
                    <p class="font-weight-bold mb-0" id="permisos_rol_nombre_asistente">—</p>
                </div>

                {{-- Spinner de carga --}}
                <div id="permisos_rol_spinner" class="text-center py-3">
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>

                {{-- Checkboxes de permisos --}}
                <div id="permisos_rol_contenido" style="display:none;">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_cotizar" data-permiso="permiso_cotizar">
                                <label class="custom-control-label" for="pa_permiso_cotizar">
                                    <i class="feather icon-dollar-sign text-success"></i> Cotizar
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_confirmar_hora" data-permiso="permiso_confirmar_hora">
                                <label class="custom-control-label" for="pa_permiso_confirmar_hora">
                                    <i class="feather icon-check-circle text-success"></i> Confirmar hora
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_anular_hora" data-permiso="permiso_anular_hora">
                                <label class="custom-control-label" for="pa_permiso_anular_hora">
                                    <i class="feather icon-x-circle text-danger"></i> Anular hora
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_subir_ver_archivos" data-permiso="permiso_subir_ver_archivos">
                                <label class="custom-control-label" for="pa_permiso_subir_ver_archivos">
                                    <i class="feather icon-upload-cloud text-primary"></i> Subir y ver archivos
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_eliminar_archivos" data-permiso="permiso_eliminar_archivos">
                                <label class="custom-control-label" for="pa_permiso_eliminar_archivos">
                                    <i class="feather icon-trash-2 text-danger"></i> Eliminar archivos
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_editar_pacientes" data-permiso="permiso_editar_pacientes">
                                <label class="custom-control-label" for="pa_permiso_editar_pacientes">
                                    <i class="feather icon-edit text-warning"></i> Editar pacientes
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_ver_pacientes" data-permiso="permiso_ver_pacientes">
                                <label class="custom-control-label" for="pa_permiso_ver_pacientes">
                                    <i class="feather icon-eye text-info"></i> Buscar pacientes
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_agendar_horas_extras" data-permiso="permiso_agendar_horas_extras">
                                <label class="custom-control-label" for="pa_permiso_agendar_horas_extras">
                                    <i class="feather icon-calendar text-primary"></i> Agendar horas extras
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_agendar_examenes" data-permiso="permiso_agendar_examenes">
                                <label class="custom-control-label" for="pa_permiso_agendar_examenes">
                                    <i class="feather icon-clipboard text-info"></i> Agendar exámenes
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_transcripcion_examenes" data-permiso="permiso_transcripcion_examenes">
                                <label class="custom-control-label" for="pa_permiso_transcripcion_examenes">
                                    <i class="feather icon-file-text text-warning"></i> Transcripción de exámenes
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_entrega_caja" data-permiso="permiso_entrega_caja">
                                <label class="custom-control-label" for="pa_permiso_entrega_caja">
                                    <i class="feather icon-credit-card text-success"></i> Entrega de caja
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-sm" id="permisos_rol_btn_guardar" onclick="guardar_permisos_asistente_modal()" style="display:none;">
                    <i class="feather icon-save"></i> Guardar permisos
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    /**
     * Abre el modal de permisos y carga los permisos actuales del asistente.
     * @param {number} id_asistente   - id de la tabla asistentes
     * @param {string} nombre         - nombre completo para mostrar en el modal
     * @param {number} id_lugar_atencion - lugar de atencion donde se aplican los permisos
     */
    function roles_permisos(id_asistente, nombre, id_lugar_atencion)
    {
        if (!id_asistente) {
            swal({ title: 'Campos requeridos', text: 'ID de asistente requerido.', icon: 'error', buttons: 'Aceptar' });
            return;
        }
        if (!id_lugar_atencion) {
            swal({ title: 'Campos requeridos', text: 'ID de lugar de atencion requerido.', icon: 'error', buttons: 'Aceptar' });
            return;
        }

        // Guardar id y mostrar nombre
        $('#permisos_rol_id_asistente').val(id_asistente);
        // $('#permisos_rol_id_lugar_atencion').val(id_lugar_atencion);
        $('#permisos_rol_nombre_asistente').text(nombre || '—');

        // Reset UI
        $('#permisos_rol_spinner').show();
        $('#permisos_rol_contenido').hide();
        $('#permisos_rol_btn_guardar').hide();
        $('.permiso-asistente-check').prop('checked', false);

        $('#permisos_rol').modal('show');

        // Cargar permisos actuales
        let url = "{{ route('adm_cm.personal.asistente.get.permisos') }}";
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id_asistente: id_asistente,
                id_lugar_atencion: id_lugar_atencion,
            },
        })
        .done(function(data) {
            if (data.estado == 1) {
                let p = data.permisos;
                $('#pa_permiso_cotizar').prop('checked',            p.permiso_cotizar);
                $('#pa_permiso_confirmar_hora').prop('checked',     p.permiso_confirmar_hora);
                $('#pa_permiso_anular_hora').prop('checked',        p.permiso_anular_hora);
                $('#pa_permiso_subir_ver_archivos').prop('checked', p.permiso_subir_ver_archivos);
                $('#pa_permiso_eliminar_archivos').prop('checked',  p.permiso_eliminar_archivos);
                $('#pa_permiso_editar_pacientes').prop('checked',   p.permiso_editar_pacientes);
                $('#pa_permiso_ver_pacientes').prop('checked',      p.permiso_ver_pacientes);
                $('#pa_permiso_agendar_horas_extras').prop('checked', p.permiso_agendar_horas_extras);
                $('#pa_permiso_agendar_examenes').prop('checked', p.permiso_agendar_examenes);
                $('#pa_permiso_transcripcion_examenes').prop('checked', p.permiso_transcripcion_examenes);
                $('#pa_permiso_entrega_caja').prop('checked', p.permiso_entrega_caja);
            }
            $('#permisos_rol_spinner').hide();
            $('#permisos_rol_contenido').show();
            $('#permisos_rol_btn_guardar').show();
        })
        .fail(function() {
            $('#permisos_rol_spinner').hide();
            swal({ title: 'Error', text: 'No se pudieron cargar los permisos.', icon: 'error', buttons: 'Aceptar' });
            $('#permisos_rol').modal('hide');
        });
    }

    function guardar_permisos_asistente_modal()
    {
        let id_asistente = $('#permisos_rol_id_asistente').val();
        let id_lugar_atencion = $('#permisos_rol_id_lugar_atencion').val();
        let url = "{{ route('adm_cm.personal.asistente.guardar.permisos') }}";

        let data = {
            _token:                    CSRF_TOKEN,
            id_asistente:              id_asistente,
            id_lugar_atencion:         id_lugar_atencion,
            permiso_cotizar:           $('#pa_permiso_cotizar').is(':checked')            ? 1 : 0,
            permiso_confirmar_hora:    $('#pa_permiso_confirmar_hora').is(':checked')     ? 1 : 0,
            permiso_anular_hora:       $('#pa_permiso_anular_hora').is(':checked')        ? 1 : 0,
            permiso_subir_ver_archivos:$('#pa_permiso_subir_ver_archivos').is(':checked') ? 1 : 0,
            permiso_eliminar_archivos: $('#pa_permiso_eliminar_archivos').is(':checked')  ? 1 : 0,
            permiso_editar_pacientes:  $('#pa_permiso_editar_pacientes').is(':checked')   ? 1 : 0,
            permiso_ver_pacientes:     $('#pa_permiso_ver_pacientes').is(':checked')      ? 1 : 0,
            permiso_agendar_horas_extras: $('#pa_permiso_agendar_horas_extras').is(':checked') ? 1 : 0,
            permiso_agendar_examenes: $('#pa_permiso_agendar_examenes').is(':checked') ? 1 : 0,
            permiso_transcripcion_examenes: $('#pa_permiso_transcripcion_examenes').is(':checked') ? 1 : 0,
            permiso_entrega_caja: $('#pa_permiso_entrega_caja').is(':checked') ? 1 : 0,
        };

        $.ajax({ url: url, type: 'POST', data: data })
        .done(function(resp) {
            console.log(resp);
            if (resp.estado == 1) {
                swal({ title: 'Permisos actualizados', text: resp.msj, icon: 'success', buttons: 'Aceptar' });
                $('#permisos_rol').modal('hide');
            } else {
                swal({ title: 'Error', text: resp.msj || 'Intente nuevamente.', icon: 'error', buttons: 'Aceptar' });
            }
        })
        .fail(function() {
            swal({ title: 'Error', text: 'Error de conexión. Intente nuevamente.', icon: 'error', buttons: 'Aceptar' });
        });
    }

</script>
