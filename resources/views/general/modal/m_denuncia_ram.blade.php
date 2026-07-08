 <!-- ===== Modal: Nueva Denuncia RAM ===== -->
    <div class="modal fade" id="modal_ram" tabindex="-1" role="dialog" aria-labelledby="modal_ramLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white font-weight-bold" id="modal_ramLabel">
                        <i class="feather icon-alert-triangle"></i> Registrar Reacción Adversa a Medicamento (RAM)
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar" onclick="$('#modal_ram').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <!-- Medicamento -->
                        <div class="col-md-6 mb-2">
                            <label class="floating-label-activo-sm font-weight-bold">Nombre del Medicamento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="ram_nombre_medicamento"
                                placeholder="Ej: Amoxicilina 500mg">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="floating-label-activo-sm">Principio Activo</label>
                            <input type="text" class="form-control form-control-sm" id="ram_principio_activo"
                                placeholder="Ej: Amoxicilina">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="floating-label-activo-sm">Laboratorio Fabricante</label>
                            <input type="text" class="form-control form-control-sm" id="ram_laboratorio_fabricante">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="floating-label-activo-sm">Fecha de Reacción</label>
                            <input type="date" class="form-control form-control-sm" id="ram_fecha_reaccion">
                        </div>

                        <div class="col-12"><hr class="mt-1 mb-2"></div>

                        <!-- Paciente -->
                        <div class="col-md-8 mb-2">
                            <label class="floating-label-activo-sm font-weight-bold">Paciente <span class="text-muted small">(buscar por nombre o RUT)</span></label>
                            <input type="text" class="form-control form-control-sm" id="ram_paciente_buscar"
                                placeholder="Escriba nombre o RUT..."
                                autocomplete="off"
                                oninput="buscar_paciente_ram(this.value)">
                            <input type="hidden" id="ram_id_paciente">
                            <ul id="ram_lista_pacientes" class="list-group mt-1" style="display:none;position:absolute;z-index:9999;max-width:400px;max-height:200px;overflow-y:auto;"></ul>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="floating-label-activo-sm">RUT Paciente</label>
                            <input type="text" class="form-control form-control-sm" id="ram_paciente_rut" disabled>
                        </div>

                        <div class="col-12"><hr class="mt-1 mb-2"></div>

                        <!-- Reacción -->
                        <div class="col-md-6 mb-2">
                            <label class="floating-label-activo-sm font-weight-bold">Tipo de Reacción <span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm" id="ram_tipo_reaccion">
                                <option value="">— Seleccione —</option>
                                <option value="alergia">Alergia</option>
                                <option value="intolerancia">Intolerancia</option>
                                <option value="toxicidad">Toxicidad</option>
                                <option value="interaccion">Interacción medicamentosa</option>
                                <option value="efecto_secundario">Efecto secundario</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="floating-label-activo-sm font-weight-bold">Gravedad <span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm" id="ram_gravedad">
                                <option value="leve">Leve</option>
                                <option value="moderada">Moderada</option>
                                <option value="grave">Grave</option>
                                <option value="mortal">Mortal</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="floating-label-activo-sm font-weight-bold">Acción Tomada</label>
                            <select class="form-control form-control-sm" id="ram_accion_tomada">
                                <option value="">— Seleccione —</option>
                                <option value="suspendido">Medicamento suspendido</option>
                                <option value="disminuido">Dosis disminuida</option>
                                <option value="mantenido">Mantenido con monitoreo</option>
                                <option value="reemplazado">Reemplazado por otro</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="floating-label-activo-sm font-weight-bold">Descripción de la Reacción <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-sm" id="ram_descripcion_reaccion" rows="3"
                                placeholder="Describa detalladamente la reacción adversa observada..."></textarea>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="floating-label-activo-sm">Observaciones adicionales</label>
                            <textarea class="form-control form-control-sm" id="ram_observaciones" rows="2"
                                placeholder="Información adicional relevante..."></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="$('#modal_ram').modal('hide');">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="guardar_ram()">
                        <i class="feather icon-save"></i> Registrar Denuncia RAM
                    </button>
                </div>
            </div>
        </div>
    </div>
<script>
        /* ─── ABRIR MODAL NUEVA RAM ─── */
    function abrir_modal_nueva_ram(nombre_medicamento) {
        // Limpiar formulario
        $('#ram_nombre_medicamento').val(nombre_medicamento || '');
        $('#ram_principio_activo, #ram_laboratorio_fabricante').val('');
        $('#ram_fecha_reaccion').val(new Date().toISOString().split('T')[0]);
        $('#ram_id_paciente').val('');
        $('#ram_paciente_buscar, #ram_paciente_rut').val('');
        $('#ram_tipo_reaccion').val('');
        $('#ram_gravedad').val('leve');
        $('#ram_accion_tomada').val('');
        $('#ram_descripcion_reaccion, #ram_observaciones').val('');
        $('#ram_lista_pacientes').hide().empty();
        $('#modal_ram').modal('show');
    }

    /* ─── BUSCAR PACIENTE (autocompletado) ─── */
    function buscar_paciente_ram(q) {
        clearTimeout(buscarPacienteTimer);
        if (q.length < 2) {
            $('#ram_lista_pacientes').hide().empty();
            return;
        }
        buscarPacienteTimer = setTimeout(function () {
            $.get('{{ route("ministerio.ram.buscar_paciente") }}', { q: q }, function (data) {
                var $lista = $('#ram_lista_pacientes');
                $lista.empty();
                if (!data || data.length === 0) {
                    $lista.hide();
                    return;
                }
                $.each(data, function (i, p) {
                    $lista.append(
                        '<li class="list-group-item list-group-item-action py-1 px-2" style="cursor:pointer;font-size:0.85rem" ' +
                        'onclick="seleccionar_paciente_ram(' + p.id + ', \'' + p.texto.replace(/'/g, "\\'") + '\')">' +
                        p.texto + '</li>'
                    );
                });
                $lista.show();
            });
        }, 300);
    }

    function seleccionar_paciente_ram(id, texto) {
        $('#ram_id_paciente').val(id);
        $('#ram_paciente_buscar').val(texto);
        // Extraer RUT del formato "Nombre Apellido (RUT)"
        var match = texto.match(/\(([^)]+)\)/);
        if (match) $('#ram_paciente_rut').val(match[1]);
        $('#ram_lista_pacientes').hide().empty();
    }

    // Cerrar lista al hacer click fuera
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#ram_paciente_buscar, #ram_lista_pacientes').length) {
            $('#ram_lista_pacientes').hide();
        }
    });

    /* ─── GUARDAR RAM ─── */
    function guardar_ram() {
        var nombre = $.trim($('#ram_nombre_medicamento').val());
        var desc   = $.trim($('#ram_descripcion_reaccion').val());
        var gravedad = $('#ram_gravedad').val();

        if (!nombre) {
            swal('Campo requerido', 'Ingrese el nombre del medicamento.', 'warning');
            return;
        }
        if (!desc) {
            swal('Campo requerido', 'Ingrese la descripción de la reacción.', 'warning');
            return;
        }

        var btn = $('[onclick="guardar_ram()"]').prop('disabled', true).html('<i class="feather icon-loader"></i> Guardando...');

        $.ajax({
            url: '{{ route("ministerio.ram.guardar") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                nombre_medicamento:    nombre,
                principio_activo:      $('#ram_principio_activo').val(),
                laboratorio_fabricante: $('#ram_laboratorio_fabricante').val(),
                id_paciente:           $('#ram_id_paciente').val(),
                tipo_reaccion:         $('#ram_tipo_reaccion').val(),
                gravedad:              gravedad,
                fecha_reaccion:        $('#ram_fecha_reaccion').val(),
                descripcion_reaccion:  desc,
                observaciones:         $('#ram_observaciones').val(),
                accion_tomada:         $('#ram_accion_tomada').val(),
            },
            dataType: 'json',
        })
        .done(function (data) {
            if (data.estado === 1) {
                $('#modal_ram').modal('hide');
                swal({ title: 'Registrado', text: data.msj, icon: 'success', timer: 2000, buttons: false });
                cargar_medicamentos();
                cargar_denuncias();
            } else {
                swal('Error', data.msj || 'No se pudo guardar.', 'error');
            }
        })
        .fail(function (xhr) {
            var errores = xhr.responseJSON && xhr.responseJSON.errores
                ? Object.values(xhr.responseJSON.errores).join('<br>')
                : 'Error al guardar la denuncia.';
            swal({ title: 'Error', html: errores, icon: 'error', buttons: 'Aceptar' });
        })
        .always(function () {
            $('[onclick="guardar_ram()"]').prop('disabled', false).html('<i class="feather icon-save"></i> Registrar Denuncia RAM');
        });
    }
</script>
