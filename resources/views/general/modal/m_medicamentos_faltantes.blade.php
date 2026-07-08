<!-- ══ MODAL: Agregar Medicamento Faltante ════════════════════════════════ -->
<div class="modal fade" id="modal_medicamentos_faltantes" tabindex="-1" role="dialog" aria-labelledby="modal_medicamentos_faltantes_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_medicamentos_faltantes_label">
                    <i class="feather icon-plus-circle mr-1"></i> Agregar Medicamento Faltante
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_medicamentos_faltantes').modal('hide');" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">

                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ingrese Nombre Medicamento</label>
                            <input type="text" id="mf_nombre_medicamento" name="mf_nombre_medicamento" class="form-control form-control-sm">
                            <input type="hidden" id="mf_id_medicamento" name="mf_id_medicamento" value="0">
                            <input type="hidden" id="mf_med_faltante" value="">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fármaco</label>
                            <input type="text" id="mf_nombre_composicion_farmaco" name="mf_nombre_composicion_farmaco" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Control</label>
                            <select name="mf_tipo_control" id="mf_tipo_control" class="form-control form-control-sm">
                                <option value="">Seleccione</option>
                                @if(isset($receta_control))
                                    @foreach ($receta_control as $control)
                                        @if($control->cod_control !== 8)
                                            <option value="{{ $control->cod_control }}">{{ $control->descripcion }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Ingrese Presentación</label>
                            <input type="text" id="mf_dosis_medicamento" name="mf_dosis_medicamento" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Ingrese Posología</label>
                            <input type="text" id="mf_frecuencia_medicamento" name="mf_frecuencia_medicamento" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Vía de Administración</label>
                            <select class="form-control form-control-sm" id="mf_via_administracion" name="mf_via_administracion" onchange="validar_via_administracion_mf();">
                                <option value="0">Seleccione</option>
                                <option value="1">Vía Oral</option>
                                <option value="2">Vía Sublingual</option>
                                <option value="3">Vía Tópica</option>
                                <option value="4">Vía Oftalmológica</option>
                                <option value="5">Vía Ótica</option>
                                <option value="6">Vía Inhalatoria</option>
                                <option value="7">Vía Nasal</option>
                                <option value="8">Vía Rectal</option>
                                <option value="9">Vía Vaginal</option>
                                <option value="10">Vía Parenteral</option>
                                <option value="11">Otra Vía</option>
                            </select>
                        </div>
                        <div class="form-group fill" id="div_mf_observaciones_via" style="display: none;">
                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                            <input type="text" id="mf_observaciones_via" name="mf_observaciones_via" class="form-control form-control-sm" disabled>
                        </div>
                    </div>

                    <div class="col-sm-3 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Periodo</label>
                            <select class="form-control form-control-sm" id="mf_periodo" name="mf_periodo" onchange="validar_periodo_mf();">
                                <option value="0">Seleccione</option>
                                <option value="1">SOS</option>
                                <option value="2">Dosis única</option>
                                <option value="3">3 días</option>
                                <option value="4">5 días</option>
                                <option value="5">7 días</option>
                                <option value="6">10 días</option>
                                <option value="7">15 días</option>
                                <option value="8">30 días</option>
                                <option value="9">Permanente</option>
                                <option value="10">Vía parenteral</option>
                                <option value="11">Otro Periodo</option>
                            </select>
                        </div>
                        <div class="form-group fill" id="div_mf_observaciones_periodo" style="display: none;">
                            <label class="floating-label-activo-sm">Otro Periodo</label>
                            <input type="text" id="mf_observaciones_periodo" name="mf_observaciones_periodo" class="form-control form-control-sm" disabled>
                        </div>
                    </div>

                    <input type="hidden" id="mf_cantidad_comprar" name="mf_cantidad_comprar" value="">

                    <div class="col-sm-3 mt-2">
                        <label class="floating-label-activo-sm">Cantidad a Comprar</label>
                        <select name="mf_cantidad_numero" id="mf_cantidad_numero" class="form-control form-control-sm" onchange="cargarCantidadComprar('mf_cantidad_numero', 'mf_cantidad_tipo_unidad', 'mf_cantidad_comprar')">
                            <option value="1">(1) Uno</option>
                            <option value="2">(2) Dos</option>
                            <option value="3">(3) Tres</option>
                            <option value="4">(4) Cuatro</option>
                            <option value="5">(5) Cinco</option>
                            <option value="6">(6) Seis</option>
                            <option value="7">(7) Siete</option>
                            <option value="8">(8) Ocho</option>
                            <option value="9">(9) Nueve</option>
                        </select>
                    </div>

                    <div class="col-sm-3 mt-2">
                        <label class="floating-label-activo-sm">Presentación</label>
                        <select name="mf_cantidad_tipo_unidad" id="mf_cantidad_tipo_unidad" class="form-control form-control-sm" onchange="cargarCantidadComprar('mf_cantidad_numero', 'mf_cantidad_tipo_unidad', 'mf_cantidad_comprar')">
                            <option value="Ampolla(s)">Ampolla(s)</option>
                            <option value="Caja(s)">Caja(s)</option>
                            <option value="Franco(s)">Franco(s)</option>
                            <option value="Unidad(es)">Unidad(es)</option>
                        </select>
                    </div>

                    <div class="col-sm-3 mt-2 d-flex align-items-end">
                        <label id="mf_cantidad_comprar_label" class="font-weight-bold text-info"></label>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-1">
                                    <label><strong>Uso Crónico</strong></label>
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="mf_medicamento_uso_cronico">
                                        <label for="mf_medicamento_uso_cronico" class="cr"></label>
                                    </div>
                                    <div class="alert alert-primary py-1 px-2 mt-1" id="mf_mensaje_uso_cronico" style="display:none; font-size:11px;">
                                        Acaba de seleccionar medicamento como <strong>USO CRÓNICO</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-end">
                                <button type="button" onclick="indicar_medicamento_faltante()" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Agregar Medicamento Manual
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- ── Tabla de vista previa de medicamentos agregados ── --}}
                    <div class="col-sm-12 mt-3">
                        <hr>
                        <h6 class="text-info"><i class="feather icon-list mr-1"></i> Medicamentos agregados en esta sesión</h6>
                        <div class="table-responsive">
                            <table id="tabla_preview_med_faltantes" class="table table-sm table-bordered table-hover" style="width:100%; font-size:11px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Medicamento</th>
                                        <th class="text-center">Presentación</th>
                                        <th class="text-center">Posología</th>
                                        <th class="text-center">Vía</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_preview_med_faltantes">
                                    <tr class="sin_preview_med">
                                        <td colspan="8" class="text-center text-muted py-2">Sin medicamentos agregados aún</td>
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
    function medicamentos_faltantes() {
        $('#modal_medicamentos_faltantes').modal('show');
        cargarCantidadComprar('mf_cantidad_numero', 'mf_cantidad_tipo_unidad', 'mf_cantidad_comprar');
    }

    function validar_via_administracion_mf() {
        if ($('#mf_via_administracion').val() == 11) {
            $('#div_mf_observaciones_via').show();
            $('#mf_observaciones_via').removeAttr('disabled');
        } else {
            $('#div_mf_observaciones_via').hide();
            $('#mf_observaciones_via').attr('disabled', 'disabled').val('');
        }
    }

    function validar_periodo_mf() {
        if ($('#mf_periodo').val() == 11) {
            $('#div_mf_observaciones_periodo').show();
            $('#mf_observaciones_periodo').removeAttr('disabled');
        } else {
            $('#div_mf_observaciones_periodo').hide();
            $('#mf_observaciones_periodo').attr('disabled', 'disabled').val('');
        }
    }

    function quitarPreviewMedFaltante(rowRecetario, rowPreview) {
        // Quita de la tabla del recetario
        $('#tabla_medicamento_cirugia_sdi #' + rowRecetario).remove();
        // Quita de la tabla de vista previa
        $('#' + rowPreview).remove();
        // Si no quedan filas, muestra el mensaje vacío
        if ($('#tbody_preview_med_faltantes tr').length === 0) {
            $('#tbody_preview_med_faltantes').html(
                '<tr class="sin_preview_med"><td colspan="8" class="text-center text-muted py-2">Sin medicamentos agregados aún</td></tr>'
            );
        }
    }

    function indicar_medicamento_faltante()
    {
        let nombre_medicamento = $('#mf_nombre_medicamento').val();
        let id_medicamento = $('#mf_id_medicamento').val();
        let farmaco = $('#mf_nombre_composicion_farmaco').val();
        let tipo_control = $('#mf_tipo_control').val();

        let dosis_medicamento = $('#mf_dosis_medicamento').val();
        let frecuencia_medicamento = $('#mf_frecuencia_medicamento').val();

        let cantidad_numero_comprar = $('#mf_cantidad_numero').val();
        let cantidad_numero_texto   = $('#mf_cantidad_numero option:selected').text();
        let cantidad_tipo_unidad    = $('#mf_cantidad_tipo_unidad').val();
        let cantidad_comprar        = cantidad_numero_texto + ' ' + cantidad_tipo_unidad;
        $('#mf_cantidad_comprar').val(cantidad_comprar);

        let id_via_administracion = $('#mf_via_administracion').val();
        let via_administracion = $('#mf_via_administracion option:selected').text();
        let observaciones_via = $('#mf_observaciones_via').val();

        let id_periodo = $('#mf_periodo').val();
        let periodo = $('#mf_periodo option:selected').text();
        let observaciones_periodo = $('#mf_observaciones_periodo').val();

        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                var data = $(this).find("td");
                lista_med.push($.trim($(data[2]).text().split("\n").join("")));
            }
        });

        if($.inArray(nombre_medicamento, lista_med) == -1)
        {
            var medicamento_uso_cronico = 0;
            if($('#mf_medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if($.trim(tipo_control) == '' || $.trim(tipo_control) == '0')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Tipo Control.\n';
            }

            if($.trim(farmaco) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Farmaco.\n';
            }

            if($.trim(dosis_medicamento) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }

            if($.trim(frecuencia_medicamento) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }

            if($.trim(via_administracion) == '' || id_via_administracion == 0 || $.trim(via_administracion) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if(id_via_administracion == 11)
            {
                if($.trim(observaciones_via) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion = observaciones_via;
                }
            }

            if($.trim(periodo) == '' || id_periodo == 0 || $.trim(periodo) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if(id_periodo == 11)
            {
                if($.trim(observaciones_periodo) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo = observaciones_periodo;
                }
            }

            if($.trim(cantidad_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else
            {
                const regex = /\(\d+\) \w+ \w+/g;
                if (!regex.test(cantidad_comprar))
                {
                    valido = 1;
                    mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                }
            }

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove();

                var i = $('#tabla_medicamento_cirugia_sdi tr').length;
                var rowId = i;

                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + nombre_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + periodo + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + cantidad_numero_comprar + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +
                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** Agregar fila a la tabla de vista previa dentro del modal */
                $('.sin_preview_med').remove();
                var nPreview = $('#tbody_preview_med_faltantes tr').length + 1;
                var filaPreview = '<tr id="preview_row' + rowId + '">' +
                    '<td class="text-center">' + nPreview + '</td>' +
                    '<td>' + nombre_medicamento + '</td>' +
                    '<td>' + dosis_medicamento + '</td>' +
                    '<td>' + frecuencia_medicamento + '</td>' +
                    '<td>' + via_administracion + '</td>' +
                    '<td>' + periodo + '</td>' +
                    '<td>' + cantidad_comprar + '</td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger btn-xs" onclick="quitarPreviewMedFaltante(\'row' + rowId + '\', \'preview_row' + rowId + '\')">Quitar</button></td>' +
                    '</tr>';
                $('#tbody_preview_med_faltantes').append(filaPreview);

                /** enviando a table de medicamento faltante */
                if($('#id_medicamento_ficha_dental').val() == '')
                {
                    $('#mf_med_faltante').val(nombre_medicamento);
                    if (typeof enviar_medicamento_faltante_sdi === 'function') {
                        enviar_medicamento_faltante_sdi();
                    }
                }

                // Limpiar campos
                $('#mf_nombre_medicamento').val('');
                $('#mf_id_medicamento').val('0');
                $('#mf_nombre_composicion_farmaco').val('');
                $('#mf_dosis_medicamento').val('');
                $('#mf_frecuencia_medicamento').val('');
                $('#mf_cantidad_comprar').val('');
                $('#mf_via_administracion').val(0);
                $('#mf_observaciones_via').val('');
                $('#mf_periodo').val(0);
                $('#mf_observaciones_periodo').val('');
                $('#mf_medicamento_uso_cronico').prop('checked', false).change();
            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: mensaje,
                    icon: "error",
                });
            }
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
            });
        }
    }
</script>
