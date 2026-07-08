<!-- ══ MODAL: Agregar Examen Faltante ════════════════════════════════ -->
<div class="modal fade" id="modal_examenes_faltantes" tabindex="-1" role="dialog" aria-labelledby="modal_examenes_faltantes_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_examenes_faltantes_label">
                    <i class="feather icon-plus-circle mr-1"></i> Agregar Examen Faltante
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">

                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre del Examen</label>
                            <input type="text" id="ef_nombre_examen" name="ef_nombre_examen" class="form-control form-control-sm" placeholder="Ingrese nombre del examen">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo de Examen</label>
                            <select id="ef_tipo_examen" name="ef_tipo_examen" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="SANGRE">SANGRE</option>
                                <option value="ORINA">ORINA</option>
                                <option value="DEPOSICIONES">DEPOSICIONES</option>
                                <option value="IMAGENOLOGÍA">IMAGENOLOGÍA</option>
                                <option value="MICROBIOLOGÍA">MICROBIOLOGÍA</option>
                                <option value="ANATOMÍA PATOLÓGICA">ANATOMÍA PATOLÓGICA</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Prioridad</label>
                            <select id="ef_prioridad" name="ef_prioridad" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>
                                <option value="Urgente">Urgente</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Lado</label>
                            <select id="ef_lado" name="ef_lado" class="form-control form-control-sm">
                                <option value="Seleccione"> </option>
                                <option value="Ambos">Ambos</option>
                                <option value="Izquierdo">Izquierdo</option>
                                <option value="Derecho">Derecho</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-2 d-flex align-items-end">
                        <button type="button" onclick="indicar_examen_faltante()" class="btn btn-success btn-sm btn-block">
                            <i class="fa fa-plus"></i> Agregar Examen
                        </button>
                    </div>

                    {{-- ── Tabla de vista previa de exámenes agregados ── --}}
                    <div class="col-sm-12 mt-3">
                        <hr>
                        <h6 class="text-info"><i class="feather icon-list mr-1"></i> Exámenes agregados en esta sesión</h6>
                        <div class="table-responsive">
                            <table id="tabla_preview_exam_faltantes" class="table table-sm table-bordered table-hover" style="width:100%; font-size:11px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Examen</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Prioridad</th>
                                        <th class="text-center">Lado</th>
                                        <th class="text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_preview_exam_faltantes">
                                    <tr class="sin_preview_exam">
                                        <td colspan="6" class="text-center text-muted py-2">Sin exámenes agregados aún</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="feather icon-x mr-1"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function examenes_faltantes() {
        $('#modal_examenes_faltantes').modal('show');
    }

    function quitarPreviewExamFaltante(rowExamen, rowPreview) {
        $('#tabla_examen_cirugia #' + rowExamen).remove();
        $('#' + rowPreview).remove();
        if ($('#tbody_preview_exam_faltantes tr').length === 0) {
            $('#tbody_preview_exam_faltantes').html(
                '<tr class="sin_preview_exam"><td colspan="6" class="text-center text-muted py-2">Sin exámenes agregados aún</td></tr>'
            );
        }
    }

    function indicar_examen_faltante()
    {
        var nombre_examen  = $.trim($('#ef_nombre_examen').val());
        var tipo_examen    = $('#ef_tipo_examen').val();
        var texto_tipo     = $('#ef_tipo_examen option:selected').text();
        var prioridad      = $('#ef_prioridad').val();
        var texto_prioridad = $('#ef_prioridad option:selected').text();
        var lado           = $('#ef_lado option:selected').text();

        // Verificar duplicados en tabla_examen_cirugia (col 2 = nombre visible)
        var lista_exam = [];
        $('#tabla_examen_cirugia tr').each(function(i, fila) {
            if (i > 0) {
                var tds = $(fila).find('td');
                lista_exam.push($.trim($(tds[2]).text()));
            }
        });

        if ($.inArray(nombre_examen, lista_exam) !== -1) {
            swal({ title: "Ingreso de examen(es).", text: 'El examen ya está en la orden.', icon: "warning" });
            return;
        }

        var valido = 0;
        var mensaje = '';

        if (nombre_examen === '') {
            valido = 1;
            mensaje += 'Debe ingresar el nombre del examen.\n';
        }

        if (tipo_examen === '0') {
            valido = 1;
            mensaje += 'Debe seleccionar el Tipo de Examen.\n';
        }

        if (prioridad === '0') {
            valido = 1;
            mensaje += 'Debe seleccionar la Prioridad.\n';
        }

        if (valido !== 0) {
            swal({ title: "Ingreso de examen(es).", text: mensaje, icon: "error" });
            return;
        }

        $('.examenes_sin_registros').remove();

        var i = $('#tabla_examen_cirugia tr').length;
        var rowId = i;

        // Insertar en tabla_examen_cirugia (misma estructura que indicar_examen_cirugia)
        var fila  = '<tr class="tr_examen_cirugia" id="row' + rowId + '">';
        fila += '<td class="text-center align-middle text-wrap" style="display:none">0</td>';
        fila += '<td class="text-center align-middle text-wrap" style="display:none">' + nombre_examen + '</td>';
        fila += '<td class="text-center align-middle text-wrap">' + nombre_examen + '</td>';
        fila += '<td class="text-center align-middle text-wrap">' + (lado === 'Seleccione' ? '' : lado) + '</td>';
        fila += '<td class="text-center align-middle text-wrap">' + texto_tipo + '</td>';
        fila += '<td class="text-center align-middle text-wrap">' + texto_prioridad + '</td>';
        fila += '<td class="text-center align-middle text-wrap">N/C</td>';
        fila += '<td class="text-center align-middle"><div name="remove" id="' + rowId + '" class="btn btn-danger btn_remove" onclick="eliminar_examen(\'row' + rowId + '\');">Quitar</div></td>';
        fila += '</tr>';

        $('#tabla_examen_cirugia tr:first').after(fila);

        // Insertar en tabla de vista previa del modal
        $('.sin_preview_exam').remove();
        var nPreview = $('#tbody_preview_exam_faltantes tr').length + 1;
        var filaPreview = '<tr id="preview_exam_row' + rowId + '">' +
            '<td class="text-center">' + nPreview + '</td>' +
            '<td>' + nombre_examen + '</td>' +
            '<td>' + texto_tipo + '</td>' +
            '<td>' + texto_prioridad + '</td>' +
            '<td>' + (lado === 'Seleccione' ? '-' : lado) + '</td>' +
            '<td class="text-center"><button type="button" class="btn btn-danger btn-xs" onclick="quitarPreviewExamFaltante(\'row' + rowId + '\', \'preview_exam_row' + rowId + '\')">Quitar</button></td>' +
            '</tr>';
        $('#tbody_preview_exam_faltantes').append(filaPreview);

        // Limpiar campos
        $('#ef_nombre_examen').val('');
        $('#ef_tipo_examen').val('0');
        $('#ef_prioridad').val('0');
        $('#ef_lado').val('Seleccione');
    }
</script>
