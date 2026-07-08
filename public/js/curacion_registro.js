/**
 * ============================================================================
 * FUNCIONES JAVASCRIPT PARA CURACION_REGISTRO
 * ============================================================================
 *
 * Sistema unificado de curaciones usando el modelo CuracionRegistro
 * Soporta: Curación Plana, LPP, Pie Diabético, Quemados
 */

// ==================== CURACIÓN PLANA ====================

/**
 * Guardar VALORACIÓN de curación plana
 */
function guardar_valoracion_plana() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'plana');
    formData.append('etapa', 'valoracion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de VALORACIÓN
    formData.append('cp_asp', $('#cp_asp-1').val() || '');
    formData.append('cp_dol', $('#cp_dol').val() || '');
    formData.append('cp_ecal', $('#cp_ecal').val() || '');
    formData.append('cp_ecant', $('#cp_ecant').val() || '');
    formData.append('cp_ed', $('#cp_ed').val() || '');
    formData.append('cp_me', $('#cp_me').val() || '');
    formData.append('cp_pielc', $('#cp_pielc').val() || '');
    formData.append('cp_pro', $('#cp_pro').val() || '');
    formData.append('cp_tg', $('#cp_tg').val() || '');
    formData.append('cp_tn', $('#cp_tn').val() || '');
    formData.append('cp_obs', $('#cp_obs').val() || '');
    formData.append('tpo_les_curgen', $('#tpo_les_curgen').val() || '');
    formData.append('obs_cp_gral', $('#obs_cp_gral').val() || '');
    formData.append('obs_cur_plana', $('#obs_cur_plana').val() || '');
    formData.append('ptos_tot_ev', $('#ptos_tot_ev').val() || '');

    // Observaciones
    formData.append('obs_cp_asp', $('#obs_cp_asp-1').val() || '');
    formData.append('obs_cp_me', $('#obs_cp_me').val() || '');
    formData.append('obs_cp_pro', $('#obs_cp_pro').val() || '');
    formData.append('obs_cp_ecant', $('#obs_cp_ecant').val() || '');
    formData.append('obs_cp_ecal', $('#obs_cp_ecal').val() || '');
    formData.append('obs_cp_tn', $('#obs_cp_tn').val() || '');
    formData.append('obs_cp_tg', $('#obs_cp_tg').val() || '');
    formData.append('obs_cp_ed', $('#obs_cp_ed').val() || '');
    formData.append('obs_cp_dol', $('#obs_cp_dol').val() || '');
    formData.append('obs_cp_pielc', $('#obs_cp_pielc').val() || '');

    enviarCuracion(formData, 'Valoración de Curación Plana');
}

/**
 * Guardar CURACIÓN de curación plana
 */
function guardar_curacion_plana() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'plana');
    formData.append('etapa', 'curacion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de CURACIÓN
    formData.append('cp_cult_plana', $('#cp_cult_plana').val() || '');
    formData.append('cp_td_plana', $('#cp_td_plana').val() || '');
    formData.append('cp_duch_plana', $('#cp_duch_plana').val() || '');
    formData.append('cp_observaciones', $('#obs_cur_plana').val() || '');
    formData.append('cp_antisepticos', $('#desinf_plana').val() || '');
    formData.append('cp_apositos', $('#tpo_cub_plana').val() || '');

    enviarCuracion(formData, 'Curación Plana');
}

// ==================== LPP ====================

function obtenerPuntajeSuperficiePUSH(superficie) {
    superficie = parseFloat(superficie) || 0;

    if (superficie <= 0) return 0;
    if (superficie < 0.3) return 1;
    if (superficie <= 0.6) return 2;
    if (superficie <= 1.0) return 3;
    if (superficie <= 2.0) return 4;
    if (superficie <= 3.0) return 5;
    if (superficie <= 4.0) return 6;
    if (superficie <= 8.0) return 7;
    if (superficie <= 12.0) return 8;
    if (superficie <= 24.0) return 9;

    return 10;
}

function calcularPuntajePUSH() {
    const largo = parseFloat($('#upp_largo_eval').val()) || 0;
    const ancho = parseFloat($('#upp_ancho_eval').val()) || 0;
    const superficie = largo * ancho;

    $('#upp_superficie_eval').val(superficie.toFixed(2));

    const ptsSuperficie = obtenerPuntajeSuperficiePUSH(superficie);
    const ptsExudado = parseInt($('#upp_exudado_eval').val(), 10) || 0;
    const ptsTejido = parseInt($('#upp_tejido_eval').val(), 10) || 0;

    const total = ptsSuperficie + ptsExudado + ptsTejido;

    let clasificacion;

    if (total === 0) {
        clasificacion = { texto: '✅ Cerrada / Sin lesión', color: '#28a745', colorTexto: '#fff' };
    } else if (total <= 5) {
        clasificacion = { texto: '⚠️ Baja severidad', color: '#ffc107', colorTexto: '#000' };
    } else if (total <= 10) {
        clasificacion = { texto: '🔶 Severidad moderada', color: '#fd7e14', colorTexto: '#fff' };
    } else {
        clasificacion = { texto: '🔴 Alta severidad', color: '#dc3545', colorTexto: '#fff' };
    }

    $('#upp_puntaje')
        .val(total)
        .css({
            color: clasificacion.color,
            borderColor: clasificacion.color
        });

    $('#upp_clasificacion')
        .text(clasificacion.texto)
        .css({
            backgroundColor: clasificacion.color,
            color: clasificacion.colorTexto
        });

    return total;
}

function calcularPuntajeUPP() {
    return calcularPuntajePUSH();
}

function validarValoracionLPP() {
    const localizacion = $('#upp_local_eval').val();
    const largo = parseFloat($('#upp_largo_eval').val()) || 0;
    const ancho = parseFloat($('#upp_ancho_eval').val()) || 0;

    if (!localizacion || localizacion === '0') {
        swal('Validación', 'Debe seleccionar la localización de la LPP.', 'warning');
        $('#upp_local_eval').focus();
        return false;
    }

    if (largo <= 0) {
        swal('Validación', 'Debe ingresar el largo de la lesión.', 'warning');
        $('#upp_largo_eval').focus();
        return false;
    }

    if (ancho <= 0) {
        swal('Validación', 'Debe ingresar el ancho de la lesión.', 'warning');
        $('#upp_ancho_eval').focus();
        return false;
    }

    return true;
}

/**
 * Guardar VALORACIÓN de LPP
 */
function guardar_valoracion_lpp() {
    calcularPuntajePUSH();

    if (!validarValoracionLPP()) {
        return;
    }

    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'lpp');
    formData.append('etapa', 'valoracion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    formData.append('upp_local_eval', $('#upp_local_eval').val() || '');
    formData.append('obs_upp_local_eval', $('#obs_upp_local_eval').val() || '');
    formData.append('upp_gr_eval', $('#upp_gr_eval').val() || '');

    formData.append('upp_largo_eval', $('#upp_largo_eval').val() || 0);
    formData.append('upp_ancho_eval', $('#upp_ancho_eval').val() || 0);
    formData.append('upp_superficie_eval', $('#upp_superficie_eval').val() || 0);

    formData.append('upp_prof_eval', $('#upp_prof_eval').val() || '');
    formData.append('obs_upp_prof_eval', $('#obs_upp_prof_eval').val() || '');

    formData.append('upp_infeccion_eval', $('#upp_infeccion_eval').val() || '');
    formData.append('upp_exudado_eval', $('#upp_exudado_eval').val() || '');
    formData.append('upp_tejido_eval', $('#upp_tejido_eval').val() || '');
    formData.append('upp_puntaje', $('#upp_puntaje').val() || 0);

    formData.append('obs_pa_eval_upp', $('#obs_pa_eval_upp').val() || '');
    formData.append('obs_val_eval_upp', $('#obs_val_eval_upp').val() || '');

    enviarCuracion(formData, 'Valoración LPP');
}

/**
 * Guardar CURACIÓN de LPP
 */
function guardar_curacion_lpp() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'lpp');
    formData.append('etapa', 'curacion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de CURACIÓN LPP
    formData.append('lpp_cultivo', $('#cp_cult_curac_lpp').val() || '');
    formData.append('lpp_td', $('#cp_td_curac_lpp').val() || '');
    formData.append('lpp_ducha', $('#cp_duch_curac_lpp').val() || '');
    formData.append('lpp_antisep', $('#antisep_curac_lpp').val() || '');
    formData.append('lpp_apositos', $('#tpo_apos_curac_lpp').val() || '');
    formData.append('lpp_obs_curacion', $('#ot_pat_act_curac_lpp').val() || '');

    enviarCuracion(formData, 'Curación LPP');
}


// ==================== PIE DIABÉTICO ====================

/**
 * Guardar VALORACIÓN de Pie Diabético
 */
function guardar_valoracion_pie_diabetico() {
    let formData = new FormData();

    // ===== DIAGNÓSTICO: Verificar valores de los selects =====
    console.log('🔍 ===== DIAGNÓSTICO VALORES PIE DIABÉTICO =====');
    console.log('  Elementos #aspecto_pie_diab encontrados:', $('#aspecto_pie_diab').length);
    console.log('  aspecto_pie_diab (jQuery .val):', $('#aspecto_pie_diab').val());
    console.log('  aspecto_pie_diab (getElementById):', document.getElementById('aspecto_pie_diab') ? document.getElementById('aspecto_pie_diab').value : 'NO EXISTE');
    console.log('  mayor_extension:', $('#mayor_extension').val());
    console.log('  profundidad_curacion:', $('#profundidad_curacion').val());
    console.log('  tejido_esf:', $('#tejido_esf').val());
    console.log('  tejido_granu:', $('#tejido_granu').val());
    console.log('  ptos_tot_ev_diab:', $('#ptos_tot_ev_diab').val());
    console.log('🔍 ============================================');

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'pie_diabetico');
    formData.append('etapa', 'valoracion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de VALORACIÓN PIE DIABÉTICO
    formData.append('aspecto_pie_diab', $('#aspecto_pie_diab').val() || '');
    formData.append('obs_aspecto_pie_diab', $('#obs_aspecto_pie_diab').val() || '');
    formData.append('mayor_extension', $('#mayor_extension').val() || '');
    formData.append('obs_mayor_extension', $('#obs_mayor_extension').val() || '');
    formData.append('profundidad_curacion', $('#profundidad_curacion').val() || '');
    formData.append('obs_profundidad_curacion', $('#obs_profundidad_curacion').val() || '');
    formData.append('exudado_cantidad_curacion', $('#exudado_cantidad_curacion').val() || '');
    formData.append('obs_exudado_cantidad_curacion', $('#obs_exudado_cantidad_curacion').val() || '');
    formData.append('exudado_calidad_curacion', $('#exudado_calidad_curacion').val() || '');
    formData.append('obs_exudado_calidad_curacion', $('#obs_exudado_calidad_curacion').val() || '');
    formData.append('tejido_esf', $('#tejido_esf').val() || '');
    formData.append('obs_tejido_esf', $('#obs_tejido_esf').val() || '');
    formData.append('tejido_granu', $('#tejido_granu').val() || '');
    formData.append('obs_tejido_granu', $('#obs_tejido_granu').val() || '');
    formData.append('edema_curacion', $('#edema_curacion').val() || '');
    formData.append('obs_edema_curacion', $('#obs_edema_curacion').val() || '');
    formData.append('dolor_curacion', $('#dolor_curacion').val() || '');
    formData.append('obs_dolor_curacion', $('#obs_dolor_curacion').val() || '');
    formData.append('piel_circun', $('#piel_circun').val() || '');
    formData.append('obs_piel_circun', $('#obs_piel_circun').val() || '');
    formData.append('ptos_tot_ev_diab', $('#ptos_tot_ev_diab').val() || '');
    formData.append('obs_orin', $('#obs_orin').val() || '');
    formData.append('pat_prop', $('#pat_prop').val() || '');
    formData.append('sint_act', $('#sint_act').val() || '');
    formData.append('ot_pat_act', $('#ot_pat_act').val() || '');

    enviarCuracion(formData, 'Valoración Pie Diabético');
}

/**
 * Guardar CURACIÓN de Pie Diabético
 */
function guardar_curacion_pie_diabetico() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'pie_diabetico');
    formData.append('etapa', 'curacion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de CURACIÓN PIE DIABÉTICO
    formData.append('pd_cultivo', $('#cp_cult_curac_pie').val() || '');
    formData.append('pd_desbridamiento', $('#cp_td_curac_pie').val() || '');
    formData.append('pd_lavado', $('#cp_duch_curac_pie').val() || '');
    formData.append('pd_antiseptico', $('#pie_ant_curac_pie').val() || '');
    formData.append('pd_apositos', $('#tpo_aposc_curac_pie').val() || '');
    formData.append('pd_obs_curacion', $('#ot_pat_act_curac_pie').val() || '');


    enviarCuracion(formData, 'Curación Pie Diabético');
}

// ==================== QUEMADOS ====================

/**
 * Guardar VALORACIÓN de Quemados
 */
function guardar_valoracion_quemados() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'quemados');
    formData.append('etapa', 'valoracion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de VALORACIÓN QUEMADOS
    formData.append('quem_zona_afectada', $('#qmsupqm').val() || '');
    formData.append('quem_grado', $('#qmdr').val() || '');
    formData.append('quem_infeccion', $('#qm_presinf').val() || '');
    formData.append('quem_tipo_quemadura', $('#qm_tq').val() || '');
    formData.append('quem_tipo_curacion', $('#qm_tc').val() || '');
    formData.append('quem_enfermedad_actual', $('#pat_propq').val() || '');
    formData.append('med_quem', $('#med_quem').val() || '');
    formData.append('quem_obs_valoracion', $('#bs_ex_orl').val() || '');

    enviarCuracion(formData, 'Valoración Quemados');
}

/**
 * Guardar CURACIÓN de Quemados
 */
function guardar_curacion_quemados() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'quemados');
    formData.append('etapa', 'curacion');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de CURACIÓN QUEMADOS
    formData.append('quem_limpieza', $('#cp_cult_curac_quem').val() || '');
    formData.append('quem_desbridamiento', $('#cp_td_curac_quem').val() || '');
    formData.append('quem_duchoterapia', $('#cp_duch_curac_quem').val() || '');
    formData.append('quem_aposito', $('#cp_apos_curac_quem').val() || '');
    formData.append('quem_antiseptico', $('#ants_qm').val() || '');
    formData.append('quem_obs_curacion', $('#obs_gen_cur_qx').val() || '');

    enviarCuracion(formData, 'Curación Quemados');
}

// ==================== FUNCIONES AUXILIARES ====================

/**
 * Función genérica para enviar curaciones
 */
function enviarCuracion(formData, tipoTexto) {
    console.log('==========================================');
    console.log('=== Enviando curación ===');
    console.log('Tipo:', tipoTexto);
    console.log('URL:', $('#route_guardar_curacion_registro').val());
    console.log('==========================================');

    // Mostrar todos los datos que se están enviando
    for (let [key, value] of formData.entries()) {
        console.log(`  ${key}:`, value);
    }

    $.ajax({
        url: $('#route_guardar_curacion_registro').val(),
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(){
            swal({
                title: 'Guardando...',
                text: 'Por favor, espere mientras se guarda la información.',
                icon: 'info',
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false
            });
        },
        success: function (response) {
            swal.close();
            console.log('==========================================');
            console.log('✅ Respuesta exitosa del servidor');
            console.log('==========================================');
            console.log('Respuesta completa:', response);
            console.log('  - mensaje:', response.mensaje);
            console.log('  - msj:', response.msj);
            console.log('  - curacion:', response.curacion);
            console.log('  - datos_grafico:', response.datos_grafico);
            console.log('  - datos_grafico_pie_diabetico:', response.datos_grafico_pie_diabetico);
            console.log('==========================================');

            if (response.mensaje === 'OK') {
                swal({
                    title: '¡Éxito!',
                    text: response.msj || tipoTexto + ' guardada correctamente',
                    icon: 'success',
                    button: 'Aceptar'
                });

                // Actualizar la tabla de curaciones dinámicamente
                if (response.curacion) {
                    console.log('📋 Intentando agregar fila a las tablas...');
                    agregarFilaCuracion(response.curacion);

                    // Si es valoración de curación plana, también actualizar tabla específica
                    if (response.curacion.tipo_curacion === 'plana' && response.curacion.etapa === 'valoracion') {
                        agregarFilaCuracionPlana(response.curacion);
                    }

                    // Si es valoración de pie diabético, también actualizar tabla específica
                    if (response.curacion.tipo_curacion === 'pie_diabetico' && response.curacion.etapa === 'valoracion') {
                        agregarFilaPieDiabetico(response.curacion);
                    }

                    // Si es valoración de LPP, también actualizar tabla específica
                    if (response.curacion.tipo_curacion === 'lpp' && response.curacion.etapa === 'valoracion') {
                        agregarFilaLPP(response.curacion);
                    }

                    // Si es valoración de quemados, también actualizar tabla específica
                    if (response.curacion.tipo_curacion === 'quemados' && response.curacion.etapa === 'valoracion') {
                        agregarFilaQuemados(response.curacion);
                    }

                } else {
                    console.warn('⚠️ No se recibieron datos de curación en la respuesta');
                }

                // Actualizar gráfico de Curación Plana si vienen datos
                if (response.datos_grafico) {
                    console.log('📊 Intentando actualizar gráfico de Curación Plana...');
                    actualizarGraficoCuracionPlana(response.datos_grafico);
                } else {
                    console.log('ℹ️ No hay datos de gráfico de Curación Plana para actualizar');
                }

                // Actualizar gráfico de Pie Diabético si vienen datos
                if (response.datos_grafico_pie_diabetico) {
                    console.log('📊 Intentando actualizar gráfico de Pie Diabético...');
                    actualizarGraficoPieDiabetico(response.datos_grafico_pie_diabetico);
                } else {
                    console.log('ℹ️ No hay datos de gráfico de Pie Diabético para actualizar');
                }

                // Actualizar gráfico de LPP si vienen datos
                if (response.datos_grafico_lpp) {
                    console.log('📊 Intentando actualizar gráfico de LPP...');
                    actualizarGraficoLPP(response.datos_grafico_lpp);
                } else {
                    console.log('ℹ️ No hay datos de gráfico de LPP para actualizar');
                }

                // Cerrar modales si existen
                $('.modal').modal('hide');

                // Limpiar formularios
                limpiarFormulariosCuracion();


                 setTimeout(() => {
                        actualizar_informacion_atencion();
                    }, 2000);

            } else {
                console.error('❌ Error en la respuesta del servidor:', response);
                swal({
                    title: 'Error',
                    text: response.msj || 'Error al guardar',
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        },
        error: function (xhr, status, error) {
            console.log('==========================================');
            console.error('❌ Error AJAX');
            console.log('==========================================');
            console.error('  - Status:', status);
            console.error('  - Error:', error);
            console.error('  - Response:', xhr.responseText);
            console.error('  - Status Code:', xhr.status);
            console.log('==========================================');

            let mensaje = 'Error al guardar ' + tipoTexto;
            if (xhr.responseJSON && xhr.responseJSON.msj) {
                mensaje = xhr.responseJSON.msj;
            } else if (xhr.responseText) {
                try {
                    const errorData = JSON.parse(xhr.responseText);
                    mensaje = errorData.msj || errorData.message || mensaje;
                } catch (e) {
                    console.error('No se pudo parsear la respuesta de error');
                }
            }

            swal({
                title: 'Error',
                text: mensaje,
                icon: 'error',
                button: 'Aceptar'
            });
        }
    });
}

/**
 * Agregar fila de curación a la tabla dinámicamente
 */
function agregarFilaCuracion(curacion) {
    console.log('=== Iniciando agregarFilaCuracion ===');
    console.log('Datos de curación recibidos:', curacion);
    console.log('ID de curación:', curacion.id);
    console.log('Nombre procedimiento:', curacion.nombre_procedimiento);

    // Buscar la tabla
    const tabla = $('#tabla_curaciones_enfermera');
    console.log('Tabla #tabla_curaciones_enfermera encontrada:', tabla.length > 0 ? 'SÍ' : 'NO');

    const tbody = tabla.find('tbody');
    console.log('tbody encontrado:', tbody.length > 0 ? 'SÍ' : 'NO');

    if (tbody.length === 0) {
        console.error('❌ No se encontró la tabla #tabla_curaciones_enfermera tbody');
        console.log('Tablas disponibles en el DOM:', $('table').map(function () { return this.id; }).get());
        return;
    }

    // Verificar si ya existe una fila con este ID
    const filaExistente = $(`#curacion_row_${curacion.id}`);
    if (filaExistente.length > 0) {
        console.warn('⚠️ Ya existe una fila con ID curacion_row_' + curacion.id + '. No se agregará duplicado.');
        return;
    }

    const estadoBadge = curacion.estado == 1 ? 'badge-success' : 'badge-warning';
    const estadoTexto = curacion.estado == 1 ? 'Finalizado' : 'Pendiente';
    const disabledInput = curacion.estado == 1 ? 'disabled' : '';
    const checkedSwitch = curacion.estado == 1 ? 'checked' : '';

    console.log('Estado de la curación:', {
        estado: curacion.estado,
        estadoBadge,
        estadoTexto,
        disabledInput,
        checkedSwitch
    });

    const nuevaFila = `
        <tr id="curacion_row_${curacion.id}">
            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable || 'Sin asignar'}</td>
            <td class="align-middle">${curacion.nombre_procedimiento || 'Procedimiento'}</td>
            <td class="align-middle">
                <input type="text" class="form-control form-control-sm"
                    id="vigilancia_curacion_servicio${curacion.id}"
                    value="${curacion.otros || ''}"
                    ${disabledInput} />
            </td>
            <td class="align-middle">
                <div class="switch switch-success d-inline">
                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}"
                        onchange="cambiarTextoLabelCuracion(${curacion.id})" ${checkedSwitch}>
                    <label for="curaciones_servicio_listo${curacion.id}"
                        id="label_curacion_switch${curacion.id}" class="cr"></label>
                </div><br>
                <label for="" id="label_curacion_footer${curacion.id}"
                    class="badge ${estadoBadge}">
                    ${estadoTexto}
                </label>
            </td>
            <td class="align-middle">
                <button type="button" class="btn btn-primary-light-c btn-xxs"
                    onclick="cargarInsumosCuracion(${curacion.id})">
                    Insumos
                </button>
            </td>
            <td class="text-wrap">
                <button type="button" class="btn btn-icon btn-warning mr-1"
                    onclick="editar_curacion(${curacion.id})" title="Editar">
                    <i class="feather icon-edit"></i>
                </button>
                <button type="button" class="btn btn-icon btn-danger"
                    onclick="eliminar_registro(${curacion.id})"
                    title="Eliminar" disabled>
                    <i class="feather icon-x"></i>
                </button>
            </td>
        </tr>
    `;

    console.log('HTML generado para nueva fila:', nuevaFila.substring(0, 200) + '...');

    try {
        tbody.prepend(nuevaFila);
        console.log('✅ Fila agregada exitosamente a la tabla con ID: curacion_row_' + curacion.id);

        // Animación suave para resaltar la nueva fila
        $(`#curacion_row_${curacion.id}`).hide().fadeIn(800);

        // Scroll suave hacia la nueva fila
        $('html, body').animate({
            scrollTop: tbody.offset().top - 100
        }, 500);

    } catch (error) {
        console.error('❌ Error al agregar fila a la tabla:', error);
    }
}

/**
 * Agregar fila de pie diabético a las tablas (específica + resumen general)
 */
function agregarFilaPieDiabetico(curacion) {
    console.log('=== Iniciando agregarFilaPieDiabetico ===');
    console.log('Datos de curación recibidos:', curacion);

    // Parsear datos de valoración
    let datos_val = {};
    try {
        datos_val = typeof curacion.datos_valoracion === 'string'
            ? JSON.parse(curacion.datos_valoracion)
            : (curacion.datos_valoracion || {});
    } catch (e) {
        console.error('Error al parsear datos_valoracion:', e);
    }

    // Mapeos
    const aspectos_pd = {
        '0': 'No selec.',
        '1': 'Erimatoso',
        '2': 'Enrojecido',
        '3': 'Amarillo pálido',
        '4': 'Necrótico grisáceo',
        '5': 'Necrótico negruzco'
    };
    const profundidad_pd = {
        '0': 'No selec.',
        '1': 'Epidermis',
        '2': 'Dermis',
        '3': 'Subcutáneo',
        '4': 'Tendón/Músculo',
        '5': 'Hueso/Articulación'
    };

    const puntaje = datos_val.ptos_tot_ev_diab || 'N/A';
    const aspecto = aspectos_pd[datos_val.aspecto_pie_diab] || 'N/A';
    const profundidad = profundidad_pd[datos_val.profundidad_curacion] || 'N/A';

    // ========== 1. TABLA ESPECÍFICA DE PIE DIABÉTICO ==========
    const tablaEspecifica = $('#tabla_curaciones_pie_diabetico');
    const tbodyEspecifica = tablaEspecifica.find('tbody');

    if (tbodyEspecifica.length > 0) {
        const filaEspecifica = `
            <tr id="pd_row_${curacion.id}" class="table-success">
                <td class="text-center align-middle">
                    <small>${curacion.fecha_format || curacion.fecha || 'N/A'}</small>
                </td>
                <td class="text-center align-middle">
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small><strong>P.Total:</strong> ${puntaje}</small>
                </td>
                <td class="align-middle">
                    <small><strong>Aspecto:</strong> ${aspecto}</small><br>
                    <small><strong>Profundidad:</strong> ${profundidad}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.observaciones || 'Sin observaciones'}</small>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-outline-info mr-1"
                        onclick="verDetalleCuracionPieDiab(${curacion.id},'${curacion.tipo_curacion}')" title="Editar">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                        onclick="eliminarCuracionRegistro(${curacion.id},'${curacion.tipo_curacion}')"
                        title="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        `;

        try {
            // Mostrar el contenedor si estaba oculto
            let $contenedor = tablaEspecifica.closest('.form-row');
            if ($contenedor.length > 0 && ($contenedor.is(':hidden') || $contenedor.css('display') === 'none')) {
                $contenedor.show();
                console.log('✅ Contenedor de tabla específica mostrado');
            }

            tbodyEspecifica.prepend(filaEspecifica);
            console.log('✅ Fila agregada a tabla específica de Pie Diabético');

            // Animación
            const $newRow = $(`#pd_row_${curacion.id}`);
            $newRow.hide().fadeIn(800);
            setTimeout(() => $newRow.removeClass('table-success'), 3000);

            // Actualizar contador
            const $header = tablaEspecifica.closest('.card').find('.card-header h6');
            if ($header.length > 0) {
                const textoActual = $header.text();
                const match = textoActual.match(/\((\d+)\)/);
                if (match) {
                    const nuevoContador = parseInt(match[1]) + 1;
                    $header.html($header.html().replace(/\(\d+\)/, `(${nuevoContador})`));
                }
            }
        } catch (error) {
            console.error('❌ Error al agregar fila a tabla específica:', error);
        }
    } else {
        console.warn('⚠️ No se encontró tbody de tabla_curaciones_pie_diabetico');
    }

    // ========== 2. TABLA RESUMEN GENERAL ==========
    const tablaResumen = $('#tabla_resumen_curaciones');
    const tbodyResumen = tablaResumen.find('tbody');

    if (tbodyResumen.length > 0) {
        const detalles = `P.Total: ${puntaje} | Aspecto: ${aspecto} | Profundidad: ${profundidad}`;

        const filaResumen = `
            <tr id="resumen_pd_row_${curacion.id}" class="table-success">
                <td class="text-center align-middle">
                    <span class="badge badge-danger d-inline-flex align-items-center" style="font-size: 0.75rem;">
                        <i class="fas fa-socks mr-1"></i>
                        Pie Diabético
                    </span>
                </td>
                <td class="text-center align-middle">
                    <small class="d-block font-weight-bold">${curacion.fecha_format || curacion.fecha || 'N/A'}</small>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${detalles}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.observaciones || '-'}</small>
                </td>
            </tr>
        `;

        try {
            // Mostrar el contenedor de resumen si estaba oculto
            let $contenedorResumen = tablaResumen.closest('.card');
            if ($contenedorResumen.length > 0 && ($contenedorResumen.is(':hidden') || $contenedorResumen.css('display') === 'none')) {
                $contenedorResumen.show();
                console.log('✅ Contenedor de tabla resumen mostrado');
            }

            tbodyResumen.prepend(filaResumen);
            console.log('✅ Fila agregada a tabla resumen general');

            // Animación
            const $newRowResumen = $(`#resumen_pd_row_${curacion.id}`);
            $newRowResumen.hide().fadeIn(800);
            setTimeout(() => $newRowResumen.removeClass('table-success'), 3000);

            // Actualizar contador en header del resumen
            const $headerResumen = tablaResumen.closest('.card').find('.card-header h6');
            if ($headerResumen.length > 0) {
                const textoActual = $headerResumen.text();
                const match = textoActual.match(/\((\d+)\)/);
                if (match) {
                    const nuevoContador = parseInt(match[1]) + 1;
                    $headerResumen.html($headerResumen.html().replace(/\((\d+)\)/, `(${nuevoContador})`));
                }
            }

            // Scroll suave hacia el resumen
            $('html, body').animate({
                scrollTop: tablaResumen.offset().top - 100
            }, 500);

        } catch (error) {
            console.error('❌ Error al agregar fila a tabla resumen:', error);
        }
    } else {
        console.warn('⚠️ No se encontró tbody de tabla_resumen_curaciones');
    }
}

/**
 * Agregar fila de curación plana a las tablas (específica + resumen general)
 */
function agregarFilaCuracionPlana(curacion) {
    console.log('=== Iniciando agregarFilaCuracionPlana ===');
    console.log('Datos de curación recibidos:', curacion);

    // Parsear datos de valoración
    let datos_val = {};
    try {
        datos_val = typeof curacion.datos_valoracion === 'string'
            ? JSON.parse(curacion.datos_valoracion)
            : (curacion.datos_valoracion || {});
    } catch(e) {
        console.error('Error al parsear datos_valoracion:', e);
    }

    // Mapeos para Curación Plana
    const aspectos_plana = {
        '0': 'No selec.',
        '1': 'Eritematoso',
        '2': 'Enrojecido',
        '3': 'Amarillo pálido',
        '4': 'Necrótico'
    };
    const profundidad_plana = {
        '0': 'No selec.',
        '1': '0',
        '2': '0-1 cm',
        '3': '1-2 cm',
        '4': '2-3 cm',
        '5': '>3 cm'
    };

    const puntaje = datos_val.ptos_tot_ev || 'N/A';
    const valoracion = datos_val.tpo_les_curgen || 'N/A';
    const aspecto = aspectos_plana[datos_val.cp_asp] || 'N/A';
    const profundidad = profundidad_plana[datos_val.cp_pro] || 'N/A';

    // ========== 1. TABLA ESPECÍFICA DE CURACIÓN PLANA ==========
    const tablaEspecifica = $('#tabla_especifica_curaciones_registradas');
    const tbodyEspecifica = tablaEspecifica.find('tbody');

    if (tbodyEspecifica.length > 0) {
        const filaEspecifica = `
            <tr id="cp_row_${curacion.id}" class="table-success">
                <td>
                    <small>${curacion.fecha_format || curacion.fecha || 'N/A'}</small><br>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td>
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td>
                    <small><strong>P.Total:</strong> ${puntaje}</small><br>
                    <small><strong>Valoración:</strong> ${valoracion}</small>
                </td>
                <td>
                    <small><strong>Aspecto:</strong> ${aspecto}</small><br>
                    <small><strong>Profundidad:</strong> ${profundidad}</small>
                </td>
                <td>
                    <small>${curacion.observaciones || 'Sin observaciones'}</small>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-info"
                        onclick="verDetallesCuracionPlana(${curacion.id})"
                        title="Ver detalles">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                        onclick="eliminarCuracionPlana(${curacion.id})"
                        title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        try {
            // Mostrar el contenedor si estaba oculto (primer registro)
            let $contenedor = tablaEspecifica.closest('.form-row');
            if ($contenedor.length > 0 && ($contenedor.is(':hidden') || $contenedor.css('display') === 'none')) {
                $contenedor.show();
                console.log('✅ Contenedor de tabla específica mostrado');
            }

            tbodyEspecifica.prepend(filaEspecifica);
            console.log('✅ Fila agregada a tabla específica de Curación Plana');

            // Animación
            const $newRow = $(`#cp_row_${curacion.id}`);
            $newRow.hide().fadeIn(800);
            setTimeout(() => $newRow.removeClass('table-success'), 3000);

        } catch (error) {
            console.error('❌ Error al agregar fila a tabla específica:', error);
        }
    } else {
        console.warn('⚠️ No se encontró tbody de tabla_especifica_curaciones_registradas');
    }

    // ========== 2. TABLA RESUMEN GENERAL ==========
    const tablaResumen = $('#tabla_resumen_curaciones');
    const tbodyResumen = tablaResumen.find('tbody');

    if (tbodyResumen.length > 0) {
        const detalles = `Tipo: ${valoracion} | P.Total: ${puntaje} | Aspecto: ${aspecto} | Profundidad: ${profundidad}`;

        const filaResumen = `
            <tr id="resumen_cp_row_${curacion.id}" class="table-success">
                <td class="text-center align-middle">
                    <span class="badge badge-info d-inline-flex align-items-center" style="font-size: 0.75rem;">
                        <i class="fas fa-band-aid mr-1"></i>
                        Curación Plana
                    </span>
                </td>
                <td class="text-center align-middle">
                    <small class="d-block font-weight-bold">${curacion.fecha_format || curacion.fecha || 'N/A'}</small>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${detalles}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.observaciones || '-'}</small>
                </td>
            </tr>
        `;

        try {
            // Mostrar el contenedor de resumen si estaba oculto
            let $contenedorResumen = tablaResumen.closest('.card');
            if ($contenedorResumen.length > 0 && ($contenedorResumen.is(':hidden') || $contenedorResumen.css('display') === 'none')) {
                $contenedorResumen.show();
                console.log('✅ Contenedor de tabla resumen mostrado');
            }

            tbodyResumen.prepend(filaResumen);
            console.log('✅ Fila agregada a tabla resumen general');

            // Animación
            const $newRowResumen = $(`#resumen_cp_row_${curacion.id}`);
            $newRowResumen.hide().fadeIn(800);
            setTimeout(() => $newRowResumen.removeClass('table-success'), 3000);

            // Actualizar contador en header del resumen
            const $headerResumen = tablaResumen.closest('.card').find('.card-header h6');
            if ($headerResumen.length > 0) {
                const textoActual = $headerResumen.text();
                const match = textoActual.match(/\((\d+)\)/);
                if (match) {
                    const nuevoContador = parseInt(match[1]) + 1;
                    $headerResumen.html($headerResumen.html().replace(/\((\d+)\)/, `(${nuevoContador})`));
                }
            }

            // Scroll suave hacia el resumen
            $('html, body').animate({
                scrollTop: tablaResumen.offset().top - 100
            }, 500);

        } catch (error) {
            console.error('❌ Error al agregar fila a tabla resumen:', error);
        }
    } else {
        console.warn('⚠️ No se encontró tbody de tabla_resumen_curaciones');
    }
}

function agregarFilaLPP(curacion) {
    console.log('=== Iniciando agregarFilaLPP ===', curacion);

    let datos_val = {};
    try {
        datos_val = typeof curacion.datos_valoracion === 'string'
            ? JSON.parse(curacion.datos_valoracion)
            : (curacion.datos_valoracion || {});
    } catch (e) {
        console.error('Error al parsear datos_valoracion LPP:', e);
    }

    const grado_lpp = {
        '0': 'G-0', '1': 'G-1', '2': 'G-2', '3': 'G-3', '4': 'G-4', '5': 'G-5'
    };

    const exudado_push = {
        '0': 'Ninguno', '1': 'Ligero', '2': 'Moderado', '3': 'Abundante'
    };

    const tejido_push = {
        '0': 'Cerrado / cicatrizado',
        '1': 'Tejido epitelial',
        '2': 'Tejido de granulación',
        '3': 'Esfacelos',
        '4': 'Tejido necrótico'
    };

    const puntaje = datos_val.upp_puntaje || datos_val.lpp_puntaje_total || 'N/A';
    const grado = grado_lpp[datos_val.upp_gr_eval] || 'N/A';
    const localizacion = datos_val.upp_local_eval || 'N/A';
    const superficie = datos_val.upp_superficie_eval || '0';
    const largo = datos_val.upp_largo_eval || '0';
    const ancho = datos_val.upp_ancho_eval || '0';
    const exudado = exudado_push[datos_val.upp_exudado_eval] || 'N/A';
    const tejido = tejido_push[datos_val.upp_tejido_eval] || 'N/A';

    const tablaEspecifica = $('#tabla_curaciones_lpp');
    const tbodyEspecifica = tablaEspecifica.find('tbody');

    if (tbodyEspecifica.length > 0) {
        const filaEspecifica = `
            <tr id="lpp_row_${curacion.id}" class="table-success">
                <td>
                    <small>${curacion.fecha_format || curacion.fecha || 'N/A'}</small><br>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td>
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td>
                    <small><strong>PUSH:</strong> ${puntaje}</small><br>
                    <small><strong>Grado:</strong> ${grado}</small><br>
                    <span class="badge badge-warning">Valoración</span>
                </td>
                <td>
                    <small><strong>Localización:</strong> ${localizacion}</small><br>
                    <small><strong>Superficie:</strong> ${superficie} cm²</small><br>
                    <small><strong>Largo x Ancho:</strong> ${largo} x ${ancho} cm</small><br>
                    <small><strong>Exudado:</strong> ${exudado}</small><br>
                    <small><strong>Tejido:</strong> ${tejido}</small>
                </td>
                <td>
                    <small>${datos_val.obs_val_eval_upp || curacion.observaciones || 'Sin observaciones'}</small>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-info"
                        onclick="verDetalleCuracionLPP(${curacion.id}, 'valoracion')"
                        title="Ver detalles">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                        onclick="eliminarCuracionRegistro(${curacion.id}, '${curacion.tipo_curacion}')"
                        title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        const $contenedor = tablaEspecifica.closest('.form-row');
        if ($contenedor.length > 0) {
            $contenedor.show();
        }

        tbodyEspecifica.prepend(filaEspecifica);

        const $newRow = $(`#lpp_row_${curacion.id}`);
        $newRow.hide().fadeIn(800);
        setTimeout(() => $newRow.removeClass('table-success'), 3000);
    }

    const tablaResumen = $('#tabla_resumen_curaciones');
    const tbodyResumen = tablaResumen.find('tbody');

    if (tbodyResumen.length > 0) {
        const detalles = `PUSH: ${puntaje} | Sup: ${superficie} cm² | Exudado: ${exudado} | Tejido: ${tejido}`;

        const filaResumen = `
            <tr id="resumen_lpp_row_${curacion.id}" class="table-success">
                <td class="text-center align-middle">
                    <span class="badge badge-warning d-inline-flex align-items-center" style="font-size: 0.75rem;">
                        <i class="fas fa-heartbeat mr-1"></i>
                        Curación LPP
                    </span>
                </td>
                <td class="text-center align-middle">
                    <small class="d-block font-weight-bold">${curacion.fecha_format || curacion.fecha || 'N/A'}</small>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${detalles}</small>
                </td>
                <td class="align-middle">
                    <small>${datos_val.obs_val_eval_upp || curacion.observaciones || '-'}</small>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-outline-info"
                        onclick="verDetalleCuracionLPP(${curacion.id}, 'valoracion')">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
        `;

        tbodyResumen.prepend(filaResumen);

        const $newRowResumen = $(`#resumen_lpp_row_${curacion.id}`);
        $newRowResumen.hide().fadeIn(800);
        setTimeout(() => $newRowResumen.removeClass('table-success'), 3000);

        const $contador = $('#contador_curaciones');
        if ($contador.length > 0) {
            $contador.text((parseInt($contador.text()) || 0) + 1);
        }
    }
}

function agregarFilaQuemados(curacion) {
    console.log('=== Iniciando agregarFilaQuemados ===', curacion);

    let datos_val = {};
    try {
        datos_val = typeof curacion.datos_valoracion === 'string'
            ? JSON.parse(curacion.datos_valoracion)
            : (curacion.datos_valoracion || {});
    } catch (e) {
        console.error('Error al parsear datos_valoracion Quemados:', e);
    }

    const superficie_quemada = {
        '0': 'No selec.',
        '1': '<9%',
        '2': '9-18%',
        '3': '>18%',
        '4': 'Otros'
    };

    const grado_quemadura = {
        '0': 'No selec.',
        '1': 'Primer grado',
        '2': 'Segundo grado',
        '3': 'Tercer grado',
        '4': 'Mixto',
        '5': 'Otros'
    };

    const infeccion = {
        '0': 'No selec.',
        '1': 'No',
        '2': 'Sí'
    };

    const tipo_quemadura = {
        '0': 'No selec.',
        '1': 'Solar',
        '2': 'Por líquidos',
        '3': 'Vapores y gases',
        '4': 'Sust. químicas',
        '5': 'Electricidad',
        '6': 'Fuego directo',
        '7': 'Otros'
    };

    const sup = superficie_quemada[datos_val.quem_zona_afectada] || 'N/A';
    const grado = grado_quemadura[datos_val.quem_grado] || 'N/A';
    const inf = infeccion[datos_val.quem_infeccion] || 'N/A';
    const tipo = tipo_quemadura[datos_val.quem_tipo_quemadura] || 'N/A';

    const tablaEspecifica = $('#tabla_curaciones_quemados');
    const tbodyEspecifica = tablaEspecifica.find('tbody');

    if (tbodyEspecifica.length > 0) {
        const filaEspecifica = `
            <tr id="qm_row_${curacion.id}" class="table-success">
                <td>
                    <small>${curacion.fecha_format || curacion.fecha || 'N/A'}</small><br>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td>
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td>
                    <small><strong>Grado:</strong> ${grado}</small><br>
                    <small><strong>Superficie:</strong> ${sup}</small><br>
                    <span class="badge badge-success">Valoración</span>
                </td>
                <td>
                    <small><strong>Tipo:</strong> ${tipo}</small><br>
                    <small><strong>Infección:</strong> ${inf}</small>
                </td>
                <td>
                    <small>${datos_val.quem_obs_valoracion || curacion.observaciones || 'Sin observaciones'}</small>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-info"
                        onclick="verDetalleCuracionQuemados(${curacion.id}, 'valoracion')"
                        title="Ver detalles">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                        onclick="eliminarCuracionRegistro(${curacion.id})"
                        title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        const $contenedor = tablaEspecifica.closest('.form-row');
        if ($contenedor.length > 0) {
            $contenedor.show();
        }

        tbodyEspecifica.prepend(filaEspecifica);

        const $newRow = $(`#qm_row_${curacion.id}`);
        $newRow.hide().fadeIn(800);
        setTimeout(() => $newRow.removeClass('table-success'), 3000);
    }

    const tablaResumen = $('#tabla_resumen_curaciones');
    const tbodyResumen = tablaResumen.find('tbody');

    if (tbodyResumen.length > 0) {
        const detalles = `Superficie: ${sup} | Grado: ${grado} | Tipo: ${tipo} | Infección: ${inf}`;

        const filaResumen = `
            <tr id="resumen_qm_row_${curacion.id}" class="table-success">
                <td class="text-center align-middle">
                    <span class="badge badge-success d-inline-flex align-items-center" style="font-size: 0.75rem;">
                        <i class="fas fa-fire-alt mr-1"></i>
                        Quemados
                    </span>
                </td>
                <td class="text-center align-middle">
                    <small class="d-block font-weight-bold">${curacion.fecha_format || curacion.fecha || 'N/A'}</small>
                    <small class="text-muted">${curacion.hora || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${curacion.responsable || 'N/A'}</small>
                </td>
                <td class="align-middle">
                    <small>${detalles}</small>
                </td>
                <td class="align-middle">
                    <small>${datos_val.quem_obs_valoracion || curacion.observaciones || '-'}</small>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-outline-info"
                        onclick="verDetalleCuracionQuemados(${curacion.id}, 'valoracion')">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
        `;

        tbodyResumen.prepend(filaResumen);

        const $newRowResumen = $(`#resumen_qm_row_${curacion.id}`);
        $newRowResumen.hide().fadeIn(800);
        setTimeout(() => $newRowResumen.removeClass('table-success'), 3000);

        const $contador = $('#contador_curaciones');
        if ($contador.length > 0) {
            $contador.text((parseInt($contador.text()) || 0) + 1);
        }
    }
}

/**
 * Ver detalles completos de una Curación Plana en un modal
 */
function verDetallesCuracionPlana(id, etapa = 'valoracion') {

    console.log('=== verDetallesCuracionPlana ===', id);
    console.log('Etapa:', etapa);

    const baseUrl = $('#route_obtener_curacion_registro_detalle').val();

    if (!baseUrl) {
        console.error('No se encontró route_obtener_curacion_registro_detalle');

        swal(
            'Error',
            'No se pudo determinar la ruta de detalle',
            'error'
        );

        return;
    }

    const url = baseUrl.replace('__ID__', id);

    //=================================
    // MAPAS SEGÚN ETAPA
    //=================================

    let mapas = {};

    if (etapa === 'valoracion') {

        mapas = {

            aspectos_plana: {
                '0':'No selec.',
                '1':'Eritematoso',
                '2':'Enrojecido',
                '3':'Amarillo pálido',
                '4':'Necrótico',
                '5':'Necrótico negruzco',
                '6':'Observaciones'
            },

            extension_plana: {
                '0':'No selec.',
                '1':'0-1 cm',
                '2':'1-3 cm',
                '3':'3-6 cm',
                '4':'>6 cm',
                '5':'Observaciones'
            },

            profundidad_plana: {
                '0':'No selec.',
                '1':'0',
                '2':'0-1 cm',
                '3':'1-2 cm',
                '4':'2-3 cm',
                '5':'>3 cm',
                '6':'Otros'
            },

            exudado_cant: {
                '0':'No selec.',
                '1':'Ausente',
                '2':'Escaso',
                '3':'Moderado',
                '4':'Abundante',
                '6':'Observaciones'
            },

            exudado_cal: {
                '0':'No selec.',
                '1':'Sin exudado',
                '2':'Seroso',
                '3':'Turbio',
                '4':'Purulento',
                '6':'Observaciones'
            },

            tejido_nec: {
                '0':'No selec.',
                '1':'Ausente',
                '2':'25%',
                '3':'25-50%',
                '4':'>50-75%',
                '5':'>75%',
                '6':'Observaciones'
            },

            tejido_gran: {
                '0':'No selec.',
                '1':'100-75%',
                '2':'<75-50%',
                '3':'<50-25%',
                '4':'<25%',
                '6':'Observaciones'
            },

            edema_map: {
                '0':'No selec.',
                '1':'Ausente',
                '2':'+',
                '3':'++',
                '4':'+++',
                '6':'Observaciones'
            },

            dolor_map: {
                '0':'No selec.',
                '1':'0-1',
                '2':'2-3',
                '3':'4-6',
                '4':'7-10',
                '6':'Observaciones'
            },

            piel_circ: {
                '0':'No selec.',
                '1':'Sana',
                '2':'Descamada',
                '3':'Eritematosa',
                '4':'Macerada',
                '6':'Observaciones'
            }

        };

    }
    else if (etapa === 'curacion') {

        mapas = {

            cultivo_plana: {
                '0':'Seleccione',
                '1':'Sí',
                '2':'No'
            },

            tipos_debridamiento: {
                '0': 'No selec.',
                '1': 'Quirúrgico',
                '2': 'Cortante',
                '3': 'Enzimático',
                '4': 'Autolítico',
                '5': 'Biológico',
                '6': 'Observaciones'
            },

            tipos_antisepticos: {
                 '0': 'No selec.',
                 '1': 'Solución fisiológica',
                 '2': 'Bioalcohol',
            },

            tipos_apositos: {
                '0': 'No selec.',
                '1': 'Apósitos pasivos',
                '2': 'Apósitos interactivos',
                '3': 'Apósitos bioactivo',
                '4': 'Apósitos mixtos',
                '5': 'Vaso contrictores',
                '6': 'Otros'
            },

            duchoterapia: {
                '0':'Seleccione',
                '1':'Sí',
                '2':'No'
            }

        };

    }

    //=================================
    // FUNCIONES AUXILIARES
    //=================================

    const lbl = (mapa, valor) => {

        if (
            valor === undefined ||
            valor === null ||
            valor === ''
        ) {
            return 'N/A';
        }

        if (!mapa) {
            return valor;
        }

        return mapa[valor] || valor;
    };

    const fila = (label, valor) => `
        <tr>
            <td class="font-weight-bold text-muted" style="width:45%">
                <small>${label}</small>
            </td>

            <td>
                <small>${valor}</small>
            </td>
        </tr>
    `;

    //=================================
    // AJAX
    //=================================

    $.ajax({

        url: url,
        method: 'GET',

        success: function(response){

            if (
                response.mensaje !== 'OK' ||
                !response.curacion
            ){

                swal(
                    'Error',
                    response.msj ||
                    'No se pudieron cargar los detalles',
                    'error'
                );

                return;
            }

            const c = response.curacion || {};

            const datos =
                etapa === 'valoracion'
                ? (c.datos_valoracion || {})
                : (c.datos_curacion || {});

            let cuerpo = `

                <div class="mb-2">

                    <span class="badge badge-info">
                        <i class="fas fa-band-aid mr-1"></i>
                        Curación Plana
                    </span>

                    <span class="badge badge-secondary ml-1">
                        ${c.fecha || 'N/A'}
                        ${c.hora || ''}
                    </span>

                </div>

            `;

            //=================================
            // VALORACIÓN
            //=================================

            if (etapa === 'valoracion') {

                cuerpo += `

                    <table class="table table-sm table-bordered">

                        <tbody>

                            ${fila('Responsable', c.responsable || 'N/A')}

                            ${fila('Aspecto', lbl(mapas.aspectos_plana, datos.cp_asp))}
                            ${fila('Mayor Extensión', lbl(mapas.extension_plana, datos.cp_me))}
                            ${fila('Profundidad', lbl(mapas.profundidad_plana, datos.cp_pro))}
                            ${fila('Exudado (Cantidad)', lbl(mapas.exudado_cant, datos.cp_ecant))}
                            ${fila('Exudado (Calidad)', lbl(mapas.exudado_cal, datos.cp_ecal))}
                            ${fila('Tejido Necrótico', lbl(mapas.tejido_nec, datos.cp_tn))}
                            ${fila('Tejido Granulatorio', lbl(mapas.tejido_gran, datos.cp_tg))}
                            ${fila('Edema', lbl(mapas.edema_map, datos.cp_ed))}
                            ${fila('Dolor', lbl(mapas.dolor_map, datos.cp_dol))}
                            ${fila('Piel Circundante', lbl(mapas.piel_circ, datos.cp_pielc))}
                            ${fila('Puntaje Total', datos.ptos_tot_ev || 'N/A')}
                            ${fila('Valoración', datos.tpo_les_curgen || 'N/A')}

                        </tbody>

                    </table>

                `;
            }

            //=================================
            // CURACIÓN
            //=================================

            else if (etapa === 'curacion') {

                cuerpo += `

                    <table class="table table-sm table-bordered">

                        <tbody>

                            ${fila('Responsable', c.responsable || 'N/A')}

                            ${fila(
                                'Toma de Cultivo',
                                lbl(
                                    mapas.cultivo_plana,
                                    datos.cp_cult_plana
                                )
                            )}

                            ${fila(
                                'Tipos de debridamiento',
                                lbl(
                                    mapas.tipos_debridamiento,
                                    datos.cp_td_plana
                                )
                            )}

                            ${fila(
                                'Duchoterapia',
                                lbl(
                                    mapas.duchoterapia,
                                    datos.cp_duch_plana
                                )
                            )}

                            ${fila(
                                'Tipo de antisépticos',
                                lbl(
                                    mapas.tipos_antisepticos,
                                    datos.cp_antisepticos
                                )
                            )}

                            ${fila(
                                'Tipo de apósitos y materiales',
                                lbl(
                                    mapas.tipos_apositos,
                                    datos.cp_apositos
                                )
                            )}

                        </tbody>

                    </table>

                `;
            }

            //=================================
            // OBSERVACIONES
            //=================================

            const obs =
                c.observaciones ||
                datos.obs_cur_plana ||
                datos.obs_cp_gral ||
                '';

            if (obs) {

                cuerpo += `

                    <h6 class="text-primary mt-3">
                        Observaciones
                    </h6>

                    <p class="border rounded p-2 bg-light">

                        <small>
                            ${obs}
                        </small>

                    </p>

                `;
            }

            //=================================
            // MODAL
            //=================================

            $('#modalDetalleCuracionPlana').remove();

            const modal = `

                <div class="modal fade"
                     id="modalDetalleCuracionPlana">

                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <div class="modal-content">

                            <div class="modal-header bg-info text-white">

                                <h5 class="modal-title">

                                    <i class="fas fa-eye mr-2"></i>

                                    Detalle de Curación Plana

                                </h5>

                                <button
                                    type="button"
                                    class="close text-white"
                                    data-dismiss="modal">

                                    <span>&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                ${cuerpo}

                            </div>

                            <div class="modal-footer">

                                <button
                                    class="btn btn-secondary"
                                    data-dismiss="modal">

                                    Cerrar

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            `;

            $('body').append(modal);

            $('#modalDetalleCuracionPlana').modal('show');

            $('#modalDetalleCuracionPlana').on(
                'hidden.bs.modal',
                function(){
                    $(this).remove();
                }
            );

        },

        error:function(){

            swal(
                'Error',
                'No se pudieron cargar los detalles de la curación',
                'error'
            );

        }

    });

}

/**
 * Eliminar (desactivar) una Curación Plana
 */
function eliminarCuracionPlana(id) {
    swal({
        title: '¿Está seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true
            },
            confirm: {
                text: 'Sí, eliminar',
                closeModal: false
            }
        },
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: $('#route_eliminar_curacion_registro').val(),
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
                success: function (response) {
                    if (response.mensaje === 'OK') {
                        swal('Eliminado!', response.msj || 'Curación eliminada correctamente', 'success');

                        // Eliminar filas de ambas tablas (específica + resumen)
                        $(`#cp_row_${id}`).fadeOut(400, function () { $(this).remove(); });
                        $(`#cur_pd_${id}`).fadeOut(400, function () { $(this).remove(); });
                        $(`#resumen_cp_row_${id}`).fadeOut(400, function () { $(this).remove(); });
                        // Actualizar gráfico de Curación Plana si vienen datos
                        if (response.datos_grafico) {
                            console.log('📊 Intentando actualizar gráfico de Curación Plana...');
                            actualizarGraficoCuracionPlana(response.datos_grafico);
                        } else {
                            console.log('ℹ️ No hay datos de gráfico de Curación Plana para actualizar');
                        }

                        // Actualizar gráfico de Pie Diabético si vienen datos
                        if (response.datos_grafico_pie_diabetico) {
                            console.log('📊 Intentando actualizar gráfico de Pie Diabético...');
                            actualizarGraficoPieDiabetico(response.datos_grafico_pie_diabetico);
                        } else {
                            console.log('ℹ️ No hay datos de gráfico de Pie Diabético para actualizar');
                        }

                        // Actualizar grafico de LPP si vienen datos
                        if (response.datos_grafico_lpp) {
                            console.log('📊 Intentando actualizar gráfico de LPP...');
                            actualizarGraficoLPP(response.datos_grafico_lpp);
                        } else {
                            console.log('ℹ️ No hay datos de gráfico de LPP para actualizar');
                        }
                    } else {
                        swal('Error', response.msj || 'No se pudo eliminar', 'error');
                    }
                    actualizar_informacion_atencion();
                },
                error: function () {
                    swal('Error', 'No se pudo eliminar la curación', 'error');
                }
            });
        }
    });
}



/**
 * Ver detalles completos de una Curación de Pie Diabético en un modal
 * Reutiliza la misma ruta de detalle (obtener_curacion_registro_detalle)
 */
function verDetalleCuracionPieDiab(id, etapa = 'valoracion') {

    console.log('=== verDetalleCuracionPieDiab ===', id);
    console.log('Etapa:', etapa);

    const baseUrl = $('#route_obtener_curacion_registro_detalle').val();

    if (!baseUrl) {
        console.error('❌ No se encontró route_obtener_curacion_registro_detalle');
        swal('Error', 'No se pudo determinar la ruta de detalle', 'error');
        return;
    }

    const url = baseUrl.replace('__ID__', id);

    // Inicializar mapas
    let toma_cultivo_pd = {};
    let tipo_debridamiento_pd = {};
    let duchoterapia_pd = {};
    let antisepticos_pd = {};
    let tipos_apositos_pd = {};

    let aspecto_pd = {};
    let extension_pd = {};
    let profundidad_pd = {};
    let exudado_cant_pd = {};
    let exudado_cal_pd = {};
    let tejido_nec_pd = {};
    let tejido_gran_pd = {};
    let edema_pd = {};
    let dolor_pd = {};
    let piel_circ_pd = {};

    // Función auxiliar SIEMPRE disponible
    const lbl = (mapa, valor) => {
        return (
            valor === undefined ||
            valor === null ||
            valor === ''
        )
        ? 'N/A'
        : (mapa[valor] || valor);
    };

    // Mapeos para etapa curación
    if (etapa === 'curacion') {

        toma_cultivo_pd = {
            '0': 'No',
            '1': 'Sí',
            '6': 'Otros'
        };

        tipo_debridamiento_pd = {
            '0': 'No selec.',
            '1': 'Quirúrgico',
            '2': 'Cortante',
            '3': 'Enzimático',
            '4': 'Autolítico',
            '5': 'Biológico',
            '6': 'Observaciones'
        };

        duchoterapia_pd = {
            '0': 'No selec.',
            '1': 'Sí',
            '2': 'No',
            '6': 'Observaciones'
        };

        antisepticos_pd = {
            '0': 'No selec.',
            '1': 'Solución fisiológica',
            '2': 'Bioalcohol'
        };

        tipos_apositos_pd = {
            '0': 'No selec.',
            '1': 'Apósitos pasivos',
            '2': 'Apósitos interactivos',
            '3': 'Apósitos bioactivos',
            '4': 'Apósitos mixtos',
            '5': 'Vasoconstrictores',
            '6': 'Otros'
        };
    }else{
       aspecto_pd = {
            '0':'No selec.',
            '1':'Sano',
            '2':'Enrojecido',
            '3':'Eritematosa',
            '4':'Amarillo pálido',
            '5':'Necrótico',
            '6':'Observaciones'
        };

        extension_pd = {
            '0':'No selec.',
            '1':'0-1 cm',
            '2':'1-3 cm',
            '3':'3-6 cm',
            '4':'6-10 cm',
            '5':'>10 cm',
            '6':'Observaciones'
        }

        profundidad_pd = {
            '0':'No selec.',
            '1':'0',
            '2':'0-1 cm',
            '3':'1-2 cm',
            '4':'2-3 cm',
            '5':'>3 cm',
            '6':'Observaciones'
        }

        exudado_cant_pd = {
            '0':'No selec.',
            '1':'Ausente',
            '2':'Escaso',
            '3':'Moderado',
            '4':'Abundante',
            '6':'Observaciones'
        };

        exudado_cal_pd = {
            '0':'No selec.',
            '1':'Sin exudado',
            '2':'Seroso',
            '3':'Turbio',
            '4':'Purulento',
            '6':'Observaciones'
        };

        tejido_nec_pd = {
            '0':'No selec.',
            '1':'Ausente',
            '2':'25%',
            '3':'25-50%',
            '4':'>50-75%',
            '5':'>75%',
            '6':'Observaciones'
        };

        tejido_gran_pd = {
            '0':'No selec.',
            '1':'100-75%',
            '2':'<75-50%',
            '3':'<50-25%',
            '4':'<25%',
            '6':'Observaciones'
        };

        edema_pd = {
            '0':'No selec.',
            '1':'Ausente',
            '2':'+',
            '3':'++',
            '4':'+++',
            '6':'Observaciones'
        };

        dolor_pd = {
            '0':'No selec.',
            '1':'0-1',
            '2':'2-3',
            '3':'4-6',
            '4':'7-10',
            '6':'Observaciones'
        };

        piel_circ_pd = {
            '0':'No selec.',
            '1':'Sana',
            '2':'Descamada',
            '3':'Eritematosa',
            '4':'Macerada',
            '6':'Observaciones'
        };
    }

    $.ajax({

        url: url,
        method: 'GET',

        success: function(response){

            if (
                response.mensaje !== 'OK' ||
                !response.curacion
            ){
                swal(
                    'Error',
                    response.msj || 'No se pudieron cargar detalles',
                    'error'
                );
                return;
            }

            const c = response.curacion;

            const dv = etapa === 'curacion'
                ? (c.datos_curacion || {})
                : (c.datos_valoracion || {});

            console.log('Datos:', dv);

            const fila = (label, valor)=>`
                <tr>
                    <td class="font-weight-bold text-muted"
                        style="width:45%">
                        <small>${label}</small>
                    </td>

                    <td>
                        <small>${valor}</small>
                    </td>
                </tr>
            `;

            let cuerpo = `
                <div class="mb-2">

                    <span class="badge badge-warning">
                        <i class="fas fa-socks mr-1"></i>
                        Pie Diabético
                    </span>

                    <span class="badge badge-secondary ml-1">
                        ${c.fecha || 'N/A'}
                        ${c.hora || ''}
                    </span>

                </div>

                <table class="table table-sm table-bordered">

                    <tbody>

                        ${fila(
                            'Responsable',
                            c.responsable || 'N/A'
                        )}
            `;

            if (etapa === 'curacion') {

                cuerpo += `
                    ${fila(
                        'Toma de cultivo',
                        lbl(toma_cultivo_pd,dv.toma_cultivo_pd)
                    )}

                    ${fila(
                        'Tipo de debridamiento',
                        lbl(tipo_debridamiento_pd,dv.pd_desbridamiento)
                    )}

                    ${fila(
                        'Duchoterapia',
                        lbl(duchoterapia_pd,dv.pd_lavado)
                    )}

                    ${fila(
                        'Antisépticos',
                        lbl(antisepticos_pd,dv.pd_antiseptico)
                    )}

                    ${fila(
                        'Tipos apósitos/materiales',
                        lbl(tipos_apositos_pd,dv.pd_apositos)
                    )}
                `;

            } else {

                cuerpo += `
                    ${fila(
                        'Aspecto',
                        aspecto_pd[dv.aspecto_pie_diab] || 'N/A'
                    )}

                    ${fila(
                        'Mayor extensión',
                        extension_pd[dv.mayor_extension] || 'N/A'
                    )}

                    ${fila(
                        'Profundidad',
                        profundidad_pd[dv.profundidad_curacion] || 'N/A'
                    )}

                    ${fila(
                        'Exudado (Cantidad)',
                        exudado_cant_pd[dv.exudado_cantidad_curacion] || 'N/A'
                    )}

                    ${fila(
                        'Exudado (Calidad)',
                        exudado_cal_pd[dv.exudado_calidad_curacion] || 'N/A'
                    )}

                    ${fila(
                        'Tejido necrótico',
                        tejido_nec_pd[dv.pd_tejido_nec] || 'N/A'
                    )}

                    ${fila(
                        'Tejido granulatorio',
                        tejido_gran_pd[dv.tejido_granu] || 'N/A'
                    )}

                    ${fila(
                        'Edema',
                        edema_pd[dv.edema_curacion] || 'N/A'
                    )}

                    ${fila(
                        'Dolor',
                        dolor_pd[dv.dolor_curacion] || 'N/A'
                    )}

                    ${fila(
                        'Piel circundante',
                        piel_circ_pd[dv.piel_circun] || 'N/A'
                    )}

                    ${fila(
                        'Puntaje total',
                        dv.ptos_tot_ev_diab || 'N/A'
                    )}

                    ${fila(
                        'Valoración',
                        dv.pd_valoracion || 'N/A'
                    )}
                `;
            }

            cuerpo += `
                    </tbody>
                </table>
            `;

            const obs =
                c.observaciones ||
                dv.obs_val_pd ||
                '';

            if(obs){

                cuerpo += `
                    <h6 class="text-primary mt-2">
                        Observaciones
                    </h6>

                    <p class="border rounded p-2 bg-light">
                        <small>${obs}</small>
                    </p>
                `;
            }

            $('#modalDetalleCuracionPieDiab').remove();

            const modal = `
                <div class="modal fade"
                    id="modalDetalleCuracionPieDiab">

                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <div class="modal-content">

                            <div class="modal-header bg-warning text-dark">

                                <h5 class="modal-title">
                                    <i class="fas fa-eye mr-2"></i>
                                    Detalle Curación Pie Diabético
                                </h5>

                                <button type="button"
                                        class="close"
                                        data-dismiss="modal">

                                    <span>&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">
                                ${cuerpo}
                            </div>

                            <div class="modal-footer">

                                <button class="btn btn-secondary"
                                        data-dismiss="modal">
                                    Cerrar
                                </button>

                            </div>

                        </div>

                    </div>

                </div>
            `;

            $('body').append(modal);

            $('#modalDetalleCuracionPieDiab')
                .modal('show')
                .on('hidden.bs.modal', function(){
                    $(this).remove();
                });

        },

        error:function(){

            swal(
                'Error',
                'No se pudieron cargar los detalles',
                'error'
            );
        }

    });

}

function verDetalleCuracionQuemados(id, etapa = 'valoracion') {

    console.log('=== verDetalleCuracionQuemados ===', id);
    console.log('Etapa:', etapa);

    const baseUrl = $('#route_obtener_curacion_registro_detalle').val();

    if (!baseUrl) {
        console.error('❌ No se encontró route_obtener_curacion_registro_detalle');
        swal('Error', 'No se pudo determinar la ruta de detalle', 'error');
        return;
    }

    const url = baseUrl.replace('__ID__', id);

    // Inicializar variables
    let superficie_quemada = {};
    let grado_quemadura = {};
    let infeccion = {};
    let tipo_quemadura = {};
    let tipo_curacion = {};
    let toma_cultivo = {};

    // Mapeos según etapa
    if (etapa === 'valoracion') {

        superficie_quemada = {
            '0': 'No selec.',
            '1': '<9%',
            '2': '9-18%',
            '3': '>18%',
            '4': 'Otros'
        };

        grado_quemadura = {
            '0': 'No selec.',
            '1': 'Primer grado',
            '2': 'Segundo grado',
            '3': 'Tercer grado',
            '4': 'Mixto',
            '5': 'Otros'
        };

        infeccion = {
            '0': 'No selec.',
            '1': 'No',
            '2': 'Sí'
        };

        tipo_quemadura = {
            '0': 'No selec.',
            '1': 'Solar',
            '2': 'Por líquidos',
            '3': 'Vapores y gases',
            '4': 'Sust. químicas',
            '5': 'Electricidad',
            '6': 'Fuego directo',
            '7': 'Otros'
        };

        tipo_curacion = {
            '0': 'No selec.',
            '1': 'Plana superficial',
            '2': 'Con remoción de tejidos',
            '3': 'Aseo quirúrgico',
            '4': 'Otros'
        };

    } else {

        toma_cultivo = {
            '0': 'No selec.',
            '1': 'No',
            '2': 'Sí'
        };

        grado_quemadura = {
            '0': 'No selec.',
            '1': 'Quirúrgico',
            '2': 'Cortante',
            '3': 'Enzimático',
            '4': 'Autolítico',
            '5': 'Biológico',
            '6': 'Observaciones'
        };

        infeccion = {
            '0': 'No selec.',
            '1': 'Sí',
            '2': 'No',
            '6': 'Observaciones'
        };

        tipo_quemadura = {
            '0': 'No selec.',
            '1': 'Solución fisiológica',
            '2': 'Bioalcohol'
        };

        tipo_curacion = {
            '0': 'No selec.',
            '1': 'Apósitos pasivos',
            '2': 'Apósitos interactivos',
            '3': 'Apósitos bioactivos',
            '4': 'Apósitos mixtos',
            '5': 'Vasoconstrictores',
            '6': 'Otros'
        };
    }

    const lbl = (mapa, valor) => {
        return (valor === undefined || valor === null || valor === '')
            ? 'N/A'
            : (mapa[valor] || valor);
    };

    $.ajax({
        url: url,
        method: 'GET',

        success: function(response) {

            if (response.mensaje !== 'OK' || !response.curacion) {
                swal(
                    'Error',
                    response.msj || 'No se pudieron cargar los detalles',
                    'error'
                );
                return;
            }

            const c = response.curacion;
            const dv = etapa === 'valoracion'
                ? (c.datos_valoracion || {})
                : (c.datos_curacion || {});

            console.log('Datos:', dv);
            console.log('Completo:', c);

            const fila = (label, valor) => `
                <tr>
                    <td class="font-weight-bold text-muted" style="width:45%">
                        <small>${label}</small>
                    </td>
                    <td>
                        <small>${valor}</small>
                    </td>
                </tr>
            `;

            let cuerpo = `
                <div class="mb-2">
                    <span class="badge badge-warning">
                        <i class="fas fa-fire mr-1"></i>
                        Quemados
                    </span>

                    <span class="badge badge-secondary ml-1">
                        ${c.fecha || 'N/A'}
                        ${c.hora || ''}
                    </span>
                </div>

                <table class="table table-sm table-bordered mb-2">
                    <tbody>
                        ${fila(
                            'Responsable',
                            c.responsable || 'N/A'
                        )}
            `;

            if (etapa === 'valoracion') {

                cuerpo += `
                    ${fila(
                        'Superficie quemada',
                        lbl(superficie_quemada, dv.quem_zona_afectada)
                    )}

                    ${fila(
                        'Grado quemadura',
                        lbl(grado_quemadura, dv.quem_grado)
                    )}

                    ${fila(
                        'Infección',
                        lbl(infeccion, dv.quem_infeccion)
                    )}

                    ${fila(
                        'Tipo quemadura',
                        lbl(tipo_quemadura, dv.quem_tipo_quemadura)
                    )}

                    ${fila(
                        'Tipo curación',
                        lbl(tipo_curacion, dv.quem_tipo_curacion)
                    )}
                `;

            } else {

                cuerpo += `
                    ${fila(
                        'Toma de cultivo',
                        lbl(toma_cultivo, dv.quem_limpieza)
                    )}

                    ${fila(
                        'Tipos de desbridamiento',
                        lbl(grado_quemadura, dv.quem_desbridamiento)
                    )}

                    ${fila(
                        'Duchoterapia',
                        lbl(infeccion, dv.quem_duchoterapia)
                    )}

                    ${fila(
                        'Tipos de antisépticos',
                        lbl(tipo_quemadura, dv.quem_antiseptico)
                    )}

                    ${fila(
                        'Tipos de apósitos',
                        lbl(tipo_curacion, dv.quem_aposito)
                    )}
                `;
            }

            cuerpo += `
                    </tbody>
                </table>
            `;

            const obs = c.observaciones ||
                       dv.obs_cur_quem ||
                       dv.obs_orin ||
                       '';

            if (obs) {
                cuerpo += `
                    <h6 class="text-primary mt-2">
                        Observaciones
                    </h6>

                    <p class="border rounded p-2 bg-light">
                        <small>${obs}</small>
                    </p>
                `;
            }

            // eliminar modal anterior
            $('#modalDetalleCuracionQuemados').remove();

            const modal = `
                <div class="modal fade"
                     id="modalDetalleCuracionQuemados"
                     tabindex="-1"
                     role="dialog">

                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <div class="modal-content">

                            <div class="modal-header bg-warning text-dark">

                                <h5 class="modal-title">
                                    <i class="fas fa-eye mr-2"></i>
                                    Detalle de Curación Quemados
                                </h5>

                                <button type="button"
                                        class="close text-dark"
                                        data-dismiss="modal">

                                    <span>&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">
                                ${cuerpo}
                            </div>

                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal">

                                    Cerrar

                                </button>

                            </div>

                        </div>

                    </div>

                </div>
            `;

            $('body').append(modal);

            $('#modalDetalleCuracionQuemados')
                .modal('show')
                .on('hidden.bs.modal', function() {
                    $(this).remove();
                });

        },

        error: function(xhr) {

            console.error(xhr);

            swal(
                'Error',
                'No se pudieron cargar los detalles de la curación',
                'error'
            );
        }
    });
}

function verDetalleCuracionLPP(id, etapa = 'valoracion') {
    console.log('=== verDetalleCuracionLPP ===', id);
    console.log('Etapa:', etapa);

    const baseUrl = $('#route_obtener_curacion_registro_detalle').val();

    if (!baseUrl) {
        console.error('❌ No se encontró route_obtener_curacion_registro_detalle');
        swal('Error', 'No se pudo determinar la ruta de detalle', 'error');
        return;
    }

    const url = baseUrl.replace('__ID__', id);

    const gradoLPP = {
        '0': 'G-0',
        '1': 'G-1',
        '2': 'G-2',
        '3': 'G-3',
        '4': 'G-4',
        '5': 'G-5'
    };

    const profundidadLPP = {
        '0': 'No selec.',
        '1': 'Epidermis',
        '2': 'Dermis',
        '3': 'Hipodermis',
        '4': 'Otros'
    };

    const infeccionLPP = {
        '0': 'Sin infección / No selec.',
        '2': 'Infección local',
        '4': 'Infección sistémica'
    };

    const exudadoPUSH = {
        '0': 'Ninguno',
        '1': 'Ligero',
        '2': 'Moderado',
        '3': 'Abundante'
    };

    const tejidoPUSH = {
        '0': 'Cerrado / cicatrizado',
        '1': 'Tejido epitelial',
        '2': 'Tejido de granulación',
        '3': 'Esfacelos',
        '4': 'Tejido necrótico'
    };

    const tomaCultivo = {
        '0': 'No selec.',
        '1': 'Sí',
        '2': 'No',
        '6': 'Otros'
    };

    const tipoDebridamiento = {
        '0': 'No selec.',
        '1': 'Quirúrgico',
        '2': 'Cortante',
        '3': 'Enzimático',
        '4': 'Autolítico',
        '5': 'Biológico',
        '6': 'Observaciones'
    };

    const duchoterapia = {
        '0': 'No selec.',
        '1': 'Sí',
        '2': 'No',
        '6': 'Observaciones'
    };

    const antisepticos = {
        '0': 'No selec.',
        '1': 'Solución fisiológica',
        '2': 'Bioalcohol'
    };

    const tiposApositos = {
        '0': 'No selec.',
        '1': 'Apósitos pasivos',
        '2': 'Apósitos interactivos',
        '3': 'Apósitos bioactivo',
        '4': 'Apósitos mixtos',
        '5': 'Vasoconstrictores',
        '6': 'Otros'
    };

    const lbl = (mapa, valor) => {
        return (valor === undefined || valor === null || valor === '')
            ? 'N/A'
            : (mapa[valor] || valor);
    };

    const fila = (label, valor) => `
        <tr>
            <td class="font-weight-bold text-muted" style="width:45%">
                <small>${label}</small>
            </td>
            <td>
                <small>${valor}</small>
            </td>
        </tr>
    `;

    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            if (response.mensaje !== 'OK' || !response.curacion) {
                swal('Error', response.msj || 'No se pudieron cargar los detalles', 'error');
                return;
            }

            const c = response.curacion;
            const dv = etapa === 'curacion'
                ? (c.datos_curacion || {})
                : (c.datos_valoracion || {});

            let cuerpo = `
                <div class="mb-2">
                    <span class="badge badge-warning">
                        <i class="fas fa-heartbeat mr-1"></i>
                        Curación LPP
                    </span>
                    <span class="badge badge-secondary ml-1">
                        ${c.fecha || 'N/A'} ${c.hora || ''}
                    </span>
                </div>
            `;

            if (etapa === 'valoracion') {
                cuerpo += `
                    <table class="table table-sm table-bordered mb-2">
                        <tbody>
                            ${fila('Responsable', c.responsable || 'N/A')}
                            ${fila('Localización', dv.upp_local_eval || 'N/A')}
                            ${fila('Otra localización', dv.obs_upp_local_eval || 'N/A')}
                            ${fila('Grado', lbl(gradoLPP, dv.upp_gr_eval))}
                            ${fila('Profundidad', lbl(profundidadLPP, dv.upp_prof_eval))}
                            ${fila('Otra profundidad', dv.obs_upp_prof_eval || 'N/A')}
                            ${fila('Infección', lbl(infeccionLPP, dv.upp_infeccion_eval))}
                            ${fila('Largo', (dv.upp_largo_eval || '0') + ' cm')}
                            ${fila('Ancho', (dv.upp_ancho_eval || '0') + ' cm')}
                            ${fila('Superficie', (dv.upp_superficie_eval || '0') + ' cm²')}
                            ${fila('Exudado PUSH', lbl(exudadoPUSH, dv.upp_exudado_eval))}
                            ${fila('Tipo de tejido PUSH', lbl(tejidoPUSH, dv.upp_tejido_eval))}
                            ${fila('Puntaje PUSH', dv.upp_puntaje || '0')}
                        </tbody>
                    </table>
                `;

                const obsPatologia = dv.obs_pa_eval_upp || '';
                const obsValoracion = c.observaciones || dv.obs_val_eval_upp || '';

                if (obsPatologia) {
                    cuerpo += `
                        <h6 class="text-primary mt-2">Observaciones Patología Asociada</h6>
                        <p class="border rounded p-2 bg-light"><small>${obsPatologia}</small></p>
                    `;
                }

                if (obsValoracion) {
                    cuerpo += `
                        <h6 class="text-primary mt-2">Observaciones Valoración LPP</h6>
                        <p class="border rounded p-2 bg-light"><small>${obsValoracion}</small></p>
                    `;
                }
            } else {
                cuerpo += `
                    <table class="table table-sm table-bordered mb-2">
                        <tbody>
                            ${fila('Responsable', c.responsable || 'N/A')}
                            ${fila('Toma de cultivo', lbl(tomaCultivo, dv.lpp_cultivo))}
                            ${fila('Tipo de debridamiento', lbl(tipoDebridamiento, dv.lpp_td))}
                            ${fila('Duchoterapia', lbl(duchoterapia, dv.lpp_ducha))}
                            ${fila('Antisépticos', lbl(antisepticos, dv.lpp_antisep))}
                            ${fila('Tipos de apósitos y materiales', lbl(tiposApositos, dv.lpp_apositos))}
                        </tbody>
                    </table>
                `;

                const obs = c.observaciones || dv.lpp_obs_curacion || '';

                if (obs) {
                    cuerpo += `
                        <h6 class="text-primary mt-2">Observaciones Curación LPP</h6>
                        <p class="border rounded p-2 bg-light"><small>${obs}</small></p>
                    `;
                }
            }

            $('#modalDetalleCuracionLPP').remove();

            const modal = `
                <div class="modal fade" id="modalDetalleCuracionLPP" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-dark">
                                <h5 class="modal-title">
                                    <i class="fas fa-eye mr-2"></i>
                                    Detalle de Curación LPP
                                </h5>
                                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">${cuerpo}</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('body').append(modal);

            $('#modalDetalleCuracionLPP')
                .modal('show')
                .on('hidden.bs.modal', function () {
                    $(this).remove();
                });
        },
        error: function () {
            swal('Error', 'No se pudieron cargar los detalles de la curación LPP', 'error');
        }
    });
}

    /**
     * Limpiar formularios de curaciones
     */
    function limpiarFormulariosCuracion() {
        console.log('=== Limpiando formularios de curación ===');

        try {
            // Limpiar campos de curación plana
            $('#cp_asp-1, #cp_dol, #cp_ecal, #cp_ecant, #cp_ed, #cp_me, #cp_pielc, #cp_pro, #cp_tg, #cp_tn, #cp_obs').val('');
            $('#tpo_les_curgen, #obs_cp_gral, #obs_cur_plana, #ptos_tot_ev').val('');
            $('#obs_cp_asp-1, #obs_cp_me, #obs_cp_pro, #obs_cp_ecant, #obs_cp_ecal, #obs_cp_tn, #obs_cp_tg, #obs_cp_ed, #obs_cp_dol, #obs_cp_pielc').val('');
            $('#cp_cult_plana, #obs_cp_cult_plana, #cp_td_plana, #obs_cp_td_plana, #cp_duch_plana, #obs_cp_duch_plana').val('');
            $('#cp_lav_plana, #obs_cp_lav_plana, #cp_sec_plana, #obs_cp_sec_plana, #cp_cober_plana, #obs_cp_cober_plana').val('');
            $('#cp_fijac_plana, #obs_cp_fijac_plana, #desc_lesion_plana').val('');

            // Limpiar campos de LPP
           $('#upp_local_eval, #obs_upp_local_eval, #upp_gr_eval, #upp_largo_eval, #upp_ancho_eval, #upp_superficie_eval, #upp_prof_eval, #obs_upp_prof_eval, #upp_infeccion_eval, #upp_exudado_eval, #upp_tejido_eval, #upp_puntaje, #obs_pa_eval_upp, #obs_val_eval_upp').val('');

$('#upp_clasificacion')
    .text('✅ Cerrada / Sin lesión')
    .css({
        backgroundColor: '#28a745',
        color: '#fff'
    });
            $('#lpp_cultivo, #obs_lpp_cultivo, #lpp_td, #obs_lpp_td, #lpp_ducha, #obs_lpp_ducha').val('');
            $('#lpp_lavado, #obs_lpp_lavado, #lpp_secado, #obs_lpp_secado, #lpp_cobertura, #obs_lpp_cobertura').val('');
            $('#lpp_fijacion, #obs_lpp_fijacion').val('');

            // Limpiar campos de Pie Diabético
            $('#pd_zona_afectada, #pd_profundidad, #pd_infeccion, #pd_isquemia, #pd_puntaje_wagner, #pd_obs_valoracion').val('');
            $('#pd_cultivo, #pd_desbridamiento, #pd_lavado, #pd_antiseptico, #pd_cobertura, #pd_vendaje, #pd_obs_curacion').val('');

            // Limpiar campos de Quemados
            $('#quem_zona_afectada, #quem_grado, #quem_superficie, #quem_profundidad, #pat_propq, #med_quem, #quem_obs_valoracion').val('');
            $('#quem_limpieza, #quem_desbridamiento, #quem_topico, #quem_aposito, #quem_vendaje, #quem_obs_curacion').val('');

            console.log('Formularios limpiados correctamente');
        } catch (error) {
            console.error('Error al limpiar formularios:', error);
        }
    }

    /**
     * Eliminar curación
     */
    function eliminarCuracion(id) {
        swal({
            title: '¿Está seguro?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    visible: true,
                    closeModal: true
                },
                confirm: {
                    text: 'Sí, eliminar',
                    closeModal: false
                }
            },
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: $('#route_eliminar_curacion_registro').val(),
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id
                    },
                    success: function (response) {
                        if (response.mensaje === 'OK') {
                            swal('Eliminado!', response.msj, 'success');

                            // Eliminar la fila de la tabla dinámicamente
                            $(`#curacion_row_${id}`).fadeOut(400, function () {
                                $(this).remove();
                            });
                        }
                    },
                    error: function () {
                        swal('Error', 'No se pudo eliminar la curación', 'error');
                    }
                });
            }
        });
    }

    /**
     * Actualizar gráfico de Curación Plana
     */
    function actualizarGraficoCuracionPlana(datos) {
        console.log('==========================================');
        console.log('=== Actualizando gráfico de Curación Plana ===');
        console.log('==========================================');
        console.log('Datos recibidos:', datos);

        // PASO 1: Verificar si el gráfico está inicializado
        console.log('PASO 1: Verificando si el gráfico existe...');
        console.log('  - window.chartPuntajesCuracion:', typeof window.chartPuntajesCuracion);
        console.log('  - window.graficoCuracionPlanaInicializado:', window.graficoCuracionPlanaInicializado);

        // PASO 2: Si no está inicializado, intentar inicializarlo
        if (!window.chartPuntajesCuracion || !window.graficoCuracionPlanaInicializado) {
            console.warn('⚠️ El gráfico no está inicializado. Intentando inicializarlo ahora...');

            if (typeof window.inicializarGraficoCuracionPlana === 'function') {
                console.log('✅ Función de inicialización encontrada. Ejecutando...');

                // Mostrar el div del gráfico temporalmente para que Chart.js pueda renderizarlo
                const divGrafico = document.getElementById('grafico-curacion-plana');
                if (divGrafico) {
                    const estabaOculto = divGrafico.style.display === 'none';
                    if (estabaOculto) {
                        console.log('📦 Mostrando div del gráfico temporalmente...');
                        divGrafico.style.display = 'block';
                    }

                    window.inicializarGraficoCuracionPlana();
                } else {
                    console.error('❌ No se encontró el div grafico-curacion-plana');
                    return;
                }
            } else {
                console.error('❌ Función inicializarGraficoCuracionPlana no disponible');
                return;
            }
        }

        // PASO 3: Verificar nuevamente que el gráfico existe
        if (!window.chartPuntajesCuracion) {
            console.error('❌ El gráfico sigue sin estar disponible después de intentar inicializarlo');
            return;
        }

        // PASO 4: Actualizar los datos del gráfico
        try {
            console.log('PASO 4: Actualizando datos del gráfico...');

            // Actualizar datos del gráfico
            window.chartPuntajesCuracion.data.labels = datos.fechas;
            window.chartPuntajesCuracion.data.datasets[0].data = datos.puntajes;

            // Actualizar también los valores para el tooltip
            window.valoresCuracion = datos.valores;

            // Redibujar el gráfico
            window.chartPuntajesCuracion.update();

            console.log('✅ Gráfico de Curación Plana actualizado correctamente');
            console.log('  - Nuevas etiquetas:', window.chartPuntajesCuracion.data.labels);
            console.log('  - Nuevos datos:', window.chartPuntajesCuracion.data.datasets[0].data);
            console.log('==========================================');
        } catch (error) {
            console.error('❌ Error al actualizar gráfico de Curación Plana:', error);
            console.error('Stack trace:', error.stack);
            console.log('==========================================');
        }
    }

    /**
     * Actualizar gráfico de Pie Diabético
     */
    function actualizarGraficoPieDiabetico(datos) {
        console.log('==========================================');
        console.log('=== Actualizando gráfico de Pie Diabético ===');
        console.log('==========================================');
        console.log('Datos recibidos:', datos);
        console.log('  - Fechas:', datos.fechas);
        console.log('  - Puntajes:', datos.puntajes);

        // PASO 1: Verificar si el gráfico está inicializado
        console.log('PASO 1: Verificando si el gráfico existe...');
        console.log('  - window.chartPuntajesPieDiabetico:', typeof window.chartPuntajesPieDiabetico);
        console.log('  - window.graficoPieDiabeticoInicializado:', window.graficoPieDiabeticoInicializado);

        // PASO 2: Si no está inicializado, intentar inicializarlo
        if (!window.chartPuntajesPieDiabetico || !window.graficoPieDiabeticoInicializado) {
            console.warn('⚠️ El gráfico no está inicializado. Intentando inicializarlo ahora...');

            // Verificar que existe la función de inicialización
            if (typeof window.inicializarGraficoPieDiabetico === 'function') {
                console.log('✅ Función de inicialización encontrada. Ejecutando...');

                // Mostrar el div del gráfico temporalmente para que Chart.js pueda renderizarlo
                const divGrafico = document.getElementById('grafico-pie-diabetico');
                if (divGrafico) {
                    const estabaOculto = divGrafico.style.display === 'none';
                    if (estabaOculto) {
                        console.log('📦 Mostrando div del gráfico temporalmente...');
                        divGrafico.style.display = 'block';
                    }

                    // Inicializar el gráfico
                    window.inicializarGraficoPieDiabetico();

                    // Si estaba oculto, volver a ocultarlo (se mostrará cuando se seleccione el tab)
                    if (estabaOculto) {
                        // No lo ocultamos de nuevo, dejamos que mostrarGraficoSegunTab lo maneje
                        console.log('✅ Gráfico inicializado y visible');
                    }
                } else {
                    console.error('❌ No se encontró el div grafico-pie-diabetico');
                    return;
                }
            } else {
                console.error('❌ Función inicializarGraficoPieDiabetico no disponible');
                return;
            }
        }

        // PASO 3: Verificar nuevamente que el gráfico existe
        if (!window.chartPuntajesPieDiabetico) {
            console.error('❌ El gráfico sigue sin estar disponible después de intentar inicializarlo');
            return;
        }

        // PASO 4: Actualizar los datos del gráfico
        try {
            console.log('PASO 4: Actualizando datos del gráfico...');

            // Actualizar datos del gráfico
            window.chartPuntajesPieDiabetico.data.labels = datos.fechas;
            window.chartPuntajesPieDiabetico.data.datasets[0].data = datos.puntajes;

            // Redibujar el gráfico
            window.chartPuntajesPieDiabetico.update();

            console.log('✅ Gráfico de Pie Diabético actualizado correctamente');
            console.log('  - Nuevas etiquetas:', window.chartPuntajesPieDiabetico.data.labels);
            console.log('  - Nuevos datos:', window.chartPuntajesPieDiabetico.data.datasets[0].data);
            console.log('==========================================');
        } catch (error) {
            console.error('❌ Error al actualizar gráfico de Pie Diabético:', error);
            console.error('Stack trace:', error.stack);
            console.log('==========================================');
        }
    }

    /**
     * Actualizar gráfico de LPP
     */
    function actualizarGraficoLPP(datos) {
        console.log('==========================================');
        console.log('=== Actualizando gráfico de LPP ===');
        console.log('==========================================');
        console.log('Datos recibidos:', datos);
        console.log('  - Fechas:', datos.fechas);
        console.log('  - Puntajes:', datos.puntajes);

        // PASO 1: Verificar si el gráfico está inicializado
        console.log('PASO 1: Verificando si el gráfico existe...');
        console.log('  - window.chartPuntajesLPP:', typeof window.chartPuntajesLPP);
        console.log('  - window.graficoLPPInicializado:', window.graficoLPPInicializado);

        // PASO 2: Si no está inicializado, intentar inicializarlo
        if (!window.chartPuntajesLPP || !window.graficoLPPInicializado) {
            console.warn('⚠️ El gráfico no está inicializado. Intentando inicializarlo ahora...');

            // Verificar que existe la función de inicialización
            if (typeof window.inicializarGraficoLPP === 'function') {
                console.log('✅ Función de inicialización encontrada. Ejecutando...');

                // Mostrar el div del gráfico temporalmente para que Chart.js pueda renderizarlo
                const divGrafico = document.getElementById('grafico-lpp');
                if (divGrafico) {
                    const estabaOculto = divGrafico.style.display === 'none';
                    if (estabaOculto) {
                        console.log('📦 Mostrando div del gráfico temporalmente...');
                        divGrafico.style.display = 'block';
                    }

                    // Inicializar el gráfico
                    window.inicializarGraficoLPP();

                    // Si estaba oculto, volver a ocultarlo (se mostrará cuando se seleccione el tab)
                    if (estabaOculto) {
                        // No lo ocultamos de nuevo, dejamos que mostrarGraficoSegunTab lo maneje
                        console.log('✅ Gráfico inicializado y visible');
                    }
                } else {
                    console.error('❌ No se encontró el div grafico-lpp');
                    return;
                }
            }
            else {
                console.error('❌ Función inicializarGraficoLPP no disponible');
                return;
            }
        }

        // PASO 3: Verificar nuevamente que el gráfico existe
        if (!window.chartPuntajesLPP) {
            console.error('❌ El gráfico sigue sin estar disponible después de intentar inicializarlo');
            return;
        }

        // PASO 4: Actualizar los datos del gráfico
        try {
            console.log('PASO 4: Actualizando datos del gráfico...');

            // Actualizar datos del gráfico
            window.chartPuntajesLPP.data.labels = datos.fechas;
            window.chartPuntajesLPP.data.datasets[0].data = datos.puntajes;

            // Redibujar el gráfico
            window.chartPuntajesLPP.update();

            console.log('✅ Gráfico de LPP actualizado correctamente');
            console.log('  - Nuevas etiquetas:', window.chartPuntajesLPP.data.labels);
            console.log('  - Nuevos datos:', window.chartPuntajesLPP.data.datasets[0].data);
            console.log('==========================================');
        } catch (error) {
            console.error('❌ Error al actualizar gráfico de LPP:', error);
            console.error('Stack trace:', error.stack);
            console.log('==========================================');
        }
    }

    function eliminarCuracionRegistro(id, tipo){
        // Aquí puedes agregar la lógica para eliminar la curación con el ID proporcionado
        console.log('Eliminar curación con ID:', id);
        swal({
        title: '¿Está seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true
            },
            confirm: {
                text: 'Sí, eliminar',
                closeModal: false
            }
        },
        dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: $('#route_eliminar_curacion_registro').val(),
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id
                    },
                    success: function (response) {
                        if (response.mensaje === 'OK') {
                            swal('Eliminado!', response.msj || 'Curación eliminada correctamente', 'success');

                            if(tipo == 'plana'){
                                $(`#cp_row_${id}`).fadeOut(400, function () { $(this).remove(); });
                            }else if(tipo == 'pie_diabetico'){
                                 // Eliminar filas de ambas tablas (específica + resumen)
                                $(`#cur_pd_${id}`).fadeOut(400, function () { $(this).remove(); });
                            }else if(tipo == 'lpp'){
                                $(`#lpp_row_${id}`).fadeOut(400, function () { $(this).remove(); });
                            }

                        } else {
                            swal('Error', response.msj || 'No se pudo eliminar', 'error');
                        }
                        actualizar_informacion_atencion();
                        if(response.datos_grafico) {
                            actualizarGraficoCuracionPlana(response.datos_grafico);
                        }
                        if(response.datos_grafico_pie_diabetico) {
                            actualizarGraficoPieDiabetico(response.datos_grafico_pie_diabetico);
                        }
                        if(response.datos_grafico_lpp) {
                            actualizarGraficoLPP(response.datos_grafico_lpp);
                        }
                        $('#contador_curaciones_pie_diabetico').text(response.curaciones.length || '0');
                    },
                    error: function () {
                        swal('Error', 'No se pudo eliminar la curación', 'error');
                    }
                });
            }
        });
    }

