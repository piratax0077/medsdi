
@php
    $datosCuracionPlana = null;
    if (isset($curacion_plana) && isset($curacion_plana->datos_curacion_plana)) {
        $datosCuracionPlana = $curacion_plana->datos_curacion_plana;
        if (is_string($datosCuracionPlana)) {
            $decodedCurPlana = json_decode($datosCuracionPlana);
            if (json_last_error() === JSON_ERROR_NONE) {
                $datosCuracionPlana = $decodedCurPlana;
            }
        }
        if (is_array($datosCuracionPlana)) {
            $datosCuracionPlana = json_decode(json_encode($datosCuracionPlana));
        }
    }
    if (!is_object($datosCuracionPlana)) {
        $datosCuracionPlana = (object) [];
    }
@endphp
<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="form-group">
            <label class="floating-label-activo-sm t-red" for="cp_cult_plana">Toma de Cultivo</label>
            <select name="cp_cult_plana" id="cp_cult_plana" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_cult_plana','div_cp_cult_plana','obs_cp_cult_plana',6);">
                <option value="0">Seleccione</option>
                <option {{ ($datosCuracionPlana->cp_cult_plana ?? null) == 1 ? 'selected' : '' }} value="1">No</option>
                <option {{ ($datosCuracionPlana->cp_cult_plana ?? null) == 2 ? 'selected' : '' }} value="2">Si</option>
                <option {{ ($datosCuracionPlana->cp_cult_plana ?? null) == 6 ? 'selected' : '' }} value="6">Observaciones</option>
            </select>
        </div>
        <div class="form-group" id="div_cp_cult_plana" style="display:none;">
            <label class="floating-label-activo-sm t-red" for="obs_cp_cult_plana">Observaciones <i>(Describir)</i></label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_cult_plana" id="obs_cp_cult_plana"></textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="form-group">
            <label class="floating-label-activo-sm t-red" for="cp_td_plana">Tipos de debridamiento</label>
            <select name="cp_td_plana" id="cp_td_plana" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_td_plana','div_cp_td_plana','obs_cp_td_plana',8);">
                <option value="0">Seleccione</option>
                <option  {{ ($datosCuracionPlana->cp_td_plana ?? null) == 1 ? 'selected' : '' }} value="1">Quirúrgico </option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 2 ? 'selected' : '' }} value="2">Cortante</option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 3 ? 'selected' : '' }} value="3">Enzimático</option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 4 ? 'selected' : '' }} value="4">Autolítico</option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 5 ? 'selected' : '' }} value="5">Osmótico</option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 6 ? 'selected' : '' }} value="6">Larval</option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 7 ? 'selected' : '' }} value="7">Mecánico</option>
                <option {{ ($datosCuracionPlana->cp_td_plana ?? null) == 8 ? 'selected' : '' }} value="8">Otros</option>
            </select>
        </div>
        <div class="form-group" id="div_cp_td_plana" style="display:none;">
            <label class="floating-label-activo-sm t-red" for="obs_cp_td_plana">Otras <i>(Describir)</i></label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_td_plana" id="obs_cp_td_plana"></textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="form-group">
            <label class="floating-label-activo-sm t-red" for="cp_duch_plana">Duchoterapia</label>
            <select name="cp_duch_plana" id="cp_duch_plana" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_duch_plana','div_cp_duch_plana','obs_cp_duch_plana',3);">
                <option value="0">Seleccione</option>
                <option {{ ($datosCuracionPlana->cp_duch_plana ?? null) == 1 ? 'selected' : '' }} value="1">Si</option>
                <option {{ ($datosCuracionPlana->cp_duch_plana ?? null) == 2 ? 'selected' : '' }} value="2">No</option>
                <option {{ ($datosCuracionPlana->cp_duch_plana ?? null) == 3 ? 'selected' : '' }} value="3">Observaciones</option>
            </select>
        </div>
        <div class="form-group" id="div_cp_duch_plana" style="display:none;">
            <label class="floating-label-activo-sm t-red" for="obs_cp_duch_plana">Observaciones <i>(Describir)</i></label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_duch_plana" id="obs_cp_duch_plana"></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-row mt-2">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="t-aten mb-4">Tipo de Antisépticos y materiales usados</h6>
            </div>
        </div>
        @php
            $desinfPlanaSeleccionados = [];
            if (isset($datosCuracionPlana->desinf_plana)) {
                $desinfRaw = $datosCuracionPlana->desinf_plana;
                if (is_string($desinfRaw)) {
                    $decoded = json_decode($desinfRaw, true);
                    $desinfPlanaSeleccionados = json_last_error() === JSON_ERROR_NONE ? (array) $decoded : array_filter(explode(',', $desinfRaw), 'strlen');
                } elseif (is_array($desinfRaw)) {
                    $desinfPlanaSeleccionados = $desinfRaw;
                } elseif (is_object($desinfRaw)) {
                    $desinfPlanaSeleccionados = (array) $desinfRaw;
                }
            }

            $tpoCubPlanaSeleccionados = [];
            if (isset($datosCuracionPlana->tpo_cub_plana)) {
                $tpoCubRaw = $datosCuracionPlana->tpo_cub_plana;
                if (is_string($tpoCubRaw)) {
                    $decoded = json_decode($tpoCubRaw, true);
                    $tpoCubPlanaSeleccionados = json_last_error() === JSON_ERROR_NONE ? (array) $decoded : array_filter(explode(',', $tpoCubRaw), 'strlen');
                } elseif (is_array($tpoCubRaw)) {
                    $tpoCubPlanaSeleccionados = $tpoCubRaw;
                } elseif (is_object($tpoCubRaw)) {
                    $tpoCubPlanaSeleccionados = (array) $tpoCubRaw;
                }
            }
        @endphp
        <div class="form-row mt-1">
            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <label class="floating-label-activo-sm" for="desinf_plana">Tipo de antisepticos</label>
                <select class="form-control form-control-sm" name="desinf_plana" id="desinf_plana" multiple="multiple">
                    <option {{ in_array('1', $desinfPlanaSeleccionados) || in_array(1, $desinfPlanaSeleccionados) ? 'selected' : '' }} value="1">Solución fisiológica</option>
                    <option {{ in_array('2', $desinfPlanaSeleccionados) || in_array(2, $desinfPlanaSeleccionados) ? 'selected' : '' }} value="2">Bialcohol</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <label class="floating-label-activo-sm" for="tpo_cub_plana">Tipo de apósitos y materiales</label>
                <select class="form-control form-control-sm" name="tpo_cub_plana" id="tpo_cub_plana" multiple="multiple">
                    <option {{ in_array('1', $tpoCubPlanaSeleccionados) || in_array(1, $tpoCubPlanaSeleccionados) ? 'selected' : '' }} value="1">Apósitos Pasivos</option>
                    <option {{ in_array('2', $tpoCubPlanaSeleccionados) || in_array(2, $tpoCubPlanaSeleccionados) ? 'selected' : '' }} value="2">Apósito Interactivo(Espuma Hidrofílica)</option>
                    <option {{ in_array('3', $tpoCubPlanaSeleccionados) || in_array(3, $tpoCubPlanaSeleccionados) ? 'selected' : '' }} value="3">Apósito Bioactivo(Alginato)</option>
                    <option {{ in_array('4', $tpoCubPlanaSeleccionados) || in_array(4, $tpoCubPlanaSeleccionados) ? 'selected' : '' }} value="4">Apósitos Mixtos</option>
                    <option {{ in_array('5', $tpoCubPlanaSeleccionados) || in_array(5, $tpoCubPlanaSeleccionados) ? 'selected' : '' }} value="5">Vasocontrictores</option>
                    <option {{ in_array('6', $tpoCubPlanaSeleccionados) || in_array(6, $tpoCubPlanaSeleccionados) ? 'selected' : '' }} value="6">Otros</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label class="floating-label-activo-sm" for="obs_cur_plana">Observaciones</label>
                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_cur_plana" id="obs_cur_plana"></textarea>
            </div>
        </div>
        @if(isset($enfermera))
        <div class="form-row">
            <div class="col-sm-12 col-md-12 text-right mb-3">
                <button type="button" class="btn btn-success btn-sm" onclick="guardar_curacion_plana()">
                    <i class="fas fa-save"></i> Guardar Curación
                </button>
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
    /** cronico */
    $(document).ready(function() {
        $('#desinf_plana').select2();
        $('#tpo_cub_plana').select2();

        $('#desinf_plana').val(@json($desinfPlanaSeleccionados)).trigger('change');
        $('#tpo_cub_plana').val(@json($tpoCubPlanaSeleccionados)).trigger('change');
    });

    function cargarIgual(input)
    {
        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });
    }

    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }

    // function guardar_curacion_plana() {
    //     // Recopilar los datos del formulario
    //     let formData = new FormData();

    //     formData.append('_token', "{{ csrf_token() }}");
    //     formData.append('tipo_curacion', 'plana');
    //     formData.append('etapa', 'curacion');
    //     formData.append('id_ficha_atencion', $('#id_fc').val());
    //     formData.append('id_paciente', $('#id_paciente_fc').val());
    //     formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    //     // Datos de curación
    //     formData.append('cp_cult_plana', $('#cp_cult_plana').val() || '');
    //     formData.append('obs_cp_cult_plana', $('#obs_cp_cult_plana').val() || '');
    //     formData.append('cp_td_plana', $('#cp_td_plana').val() || '');
    //     formData.append('obs_cp_td_plana', $('#obs_cp_td_plana').val() || '');
    //     formData.append('cp_duch_plana', $('#cp_duch_plana').val() || '');
    //     formData.append('obs_cp_duch_plana', $('#obs_cp_duch_plana').val() || '');
    //     formData.append('desinf_plana', JSON.stringify($('#desinf_plana').val() || []));
    //     formData.append('tpo_cub_plana', JSON.stringify($('#tpo_cub_plana').val() || []));
    //     formData.append('obs_cur_plana', $('#obs_cur_plana').val() || '');

    //     console.log('Datos a enviar:');
    //     for (let pair of formData.entries()) {
    //         console.log(pair[0] + ': ' + pair[1]);
    //     }

    //     $.ajax({
    //         url: "{{ route('enfermeria.guardar_curacion_registro') }}",
    //         type: "POST",
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         dataType: "json",
    //         success: function(response) {
    //             console.log('Respuesta:', response);
    //             if (response.mensaje === 'OK') {
    //                 swal({
    //                     title: "¡Éxito!",
    //                     text: response.msj || "Curación plana guardada correctamente",
    //                     icon: "success",
    //                     button: "Aceptar",
    //                 }).then(() => {
    //                     // Limpiar el formulario
    //                     $('#cp_cult_plana').val('0');
    //                     $('#obs_cp_cult_plana').val('');
    //                     $('#div_cp_cult_plana').hide();
    //                     $('#cp_td_plana').val('0');
    //                     $('#obs_cp_td_plana').val('');
    //                     $('#div_cp_td_plana').hide();
    //                     $('#cp_duch_plana').val('0');
    //                     $('#obs_cp_duch_plana').val('');
    //                     $('#div_cp_duch_plana').hide();
    //                     $('#desinf_plana').val(null).trigger('change');
    //                     $('#tpo_cub_plana').val(null).trigger('change');
    //                     $('#obs_cur_plana').val('');
    //                 });
    //             } else {
    //                 swal({
    //                     title: "Error",
    //                     text: response.msj || "Ocurrió un error al guardar",
    //                     icon: "error",
    //                     button: "Aceptar",
    //                 });
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error:', error);
    //             console.error('Respuesta:', xhr.responseText);
    //             let mensaje = "Ocurrió un error al guardar la curación";
    //             if (xhr.responseJSON && xhr.responseJSON.msj) {
    //                 mensaje = xhr.responseJSON.msj;
    //             }
    //             swal({
    //                 title: "Error",
    //                 text: mensaje,
    //                 icon: "error",
    //                 button: "Aceptar",
    //             });
    //         }
    //     });
    // }

    function eliminarCuracion(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('eliminar_curacion') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "id_paciente": dame_id_paciente()
                    },
                    success: function(data){
                        // convertir json a objeto
                        var obj = JSON.parse(data);
                        var curaciones = obj.curaciones;
                        $('#tabla_curaciones_servicio tbody').empty();
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        curaciones.forEach(curacion => {
                            let datos = curacion.datos_curacion;
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            $('#tabla_curaciones_procedimientos tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                        swal("La curación ha sido eliminada correctamente.", {
                            icon: "success",
                        });
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });
    }
</script>

@include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.modal.insumos_servicios')
