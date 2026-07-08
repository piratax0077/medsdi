/**
 * ============================================================================
 * FUNCIONES JAVASCRIPT PARA USAR CURACION_REGISTRO
 * ============================================================================
 *
 * Este archivo contiene ejemplos de cómo usar el nuevo sistema de curaciones
 * con el modelo CuracionRegistro
 */

// ==================== CURACIÓN PLANA ====================

/**
 * Guardar SOLO VALORACIÓN de curación plana
 */
function guardar_valoracion_plana() {
    let formData = new FormData();

    // Datos obligatorios
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

    // Observaciones de cada campo
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
 * Guardar SOLO CURACIÓN de curación plana
 */
function guardar_curacion_plana() {
    let formData = new FormData();

    // Datos obligatorios
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'plana');
    formData.append('etapa', 'curacion');
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

    // Observaciones de cada campo
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

    // Datos de CURACIÓN (ver prepararDatosCuracionPlana en controlador)
    formData.append('cp_cult_plana', $('#cp_cult_plana').val() || '');
    formData.append('obs_cp_cult_plana', $('#obs_cp_cult_plana').val() || '');
    formData.append('cp_td_plana', $('#cp_td_plana').val() || '');
    formData.append('obs_cp_td_plana', $('#obs_cp_td_plana').val() || '');
    formData.append('cp_duch_plana', $('#cp_duch_plana').val() || '');
    formData.append('obs_cp_duch_plana', $('#obs_cp_duch_plana').val() || '');
    formData.append('cp_lav_plana', $('#cp_lav_plana').val() || '');
    formData.append('obs_cp_lav_plana', $('#obs_cp_lav_plana').val() || '');
    formData.append('cp_sec_plana', $('#cp_sec_plana').val() || '');
    formData.append('obs_cp_sec_plana', $('#obs_cp_sec_plana').val() || '');
    formData.append('cp_cober_plana', $('#cp_cober_plana').val() || '');
    formData.append('obs_cp_cober_plana', $('#obs_cp_cober_plana').val() || '');
    formData.append('cp_fijac_plana', $('#cp_fijac_plana').val() || '');
    formData.append('obs_cp_fijac_plana', $('#obs_cp_fijac_plana').val() || '');
    formData.append('desc_lesion_plana', $('#desc_lesion_plana').val() || '');

    // Observaciones generales
    formData.append('observaciones', $('#observaciones_plana').val() || '');

    // Enviar petición AJAX
    $.ajax({
        url: "{{ route('enfermeria.guardar_curacion_registro') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.mensaje === 'OK') {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.msj,
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    // Recargar lista de curaciones o redirigir
                    cargarCuracionesPlana();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.msj,
                    confirmButtonText: 'Aceptar'
                });
            }
        },
        error: function(xhr) {
            let mensaje = 'Error al guardar la curación';
            if (xhr.responseJSON && xhr.responseJSON.msj) {
                mensaje = xhr.responseJSON.msj;
            }
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje,
                confirmButtonText: 'Aceptar'
            });
        }
    });
}

/**
 * Guardar curación LPP usando CuracionRegistro
 */
function guardar_curacion_lpp_nuevo() {
    let formData = new FormData();

    // Datos obligatorios
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'lpp');
    formData.append('etapa', 'mixta');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de VALORACIÓN LPP
    formData.append('upp_local_eval', $('#upp_local_eval').val() || '');
    formData.append('upp_gr_eval', $('#upp_gr_eval').val() || '');
    formData.append('upp_diam_eval', $('#upp_diam_eval').val() || '');
    formData.append('upp_prof_eval', $('#upp_prof_eval').val() || '');
    formData.append('upp_Infec_eval', $('#upp_Infec_eval').val() || '');
    formData.append('upp_exud_eval', $('#upp_exud_eval').val() || '');
    formData.append('upp_tej_nec_eval', $('#upp_tej_nec_eval').val() || '');
    formData.append('upp_tej_gra_eval', $('#upp_tej_gra_eval').val() || '');
    formData.append('upp_epitel_eval', $('#upp_epitel_eval').val() || '');
    formData.append('lpp_patasoc', $('#lpp_patasoc').val() || '');
    formData.append('lpp_obs', $('#lpp_obs').val() || '');
    formData.append('lpp_puntaje_total', $('#lpp_puntaje_total').val() || '');

    // Datos de CURACIÓN LPP
    formData.append('lpp_cultivo', $('#lpp_cultivo').val() || '');
    formData.append('obs_lpp_cultivo', $('#obs_lpp_cultivo').val() || '');
    formData.append('lpp_td', $('#lpp_td').val() || '');
    formData.append('obs_lpp_td', $('#obs_lpp_td').val() || '');
    formData.append('lpp_ducha', $('#lpp_ducha').val() || '');
    formData.append('obs_lpp_ducha', $('#obs_lpp_ducha').val() || '');
    formData.append('lpp_lavado', $('#lpp_lavado').val() || '');
    formData.append('obs_lpp_lavado', $('#obs_lpp_lavado').val() || '');
    formData.append('lpp_secado', $('#lpp_secado').val() || '');
    formData.append('obs_lpp_secado', $('#obs_lpp_secado').val() || '');
    formData.append('lpp_cobertura', $('#lpp_cobertura').val() || '');
    formData.append('obs_lpp_cobertura', $('#obs_lpp_cobertura').val() || '');
    formData.append('lpp_fijacion', $('#lpp_fijacion').val() || '');
    formData.append('obs_lpp_fijacion', $('#obs_lpp_fijacion').val() || '');

    formData.append('observaciones', $('#observaciones_lpp').val() || '');

    $.ajax({
        url: "{{ route('enfermeria.guardar_curacion_registro') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.mensaje === 'OK') {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.msj
                }).then(() => {
                    cargarCuracionesLpp();
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: xhr.responseJSON?.msj || 'Error al guardar'
            });
        }
    });
}

/**
 * Guardar curación PIE DIABÉTICO usando CuracionRegistro
 */
function guardar_curacion_pie_diabetico_nuevo() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'pie_diabetico');
    formData.append('etapa', 'mixta');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de VALORACIÓN PIE DIABÉTICO
    formData.append('pd_zona_afectada', $('#pd_zona_afectada').val() || '');
    formData.append('pd_profundidad', $('#pd_profundidad').val() || '');
    formData.append('pd_infeccion', $('#pd_infeccion').val() || '');
    formData.append('pd_isquemia', $('#pd_isquemia').val() || '');
    formData.append('pd_puntaje_wagner', $('#pd_puntaje_wagner').val() || '');
    formData.append('pd_obs_valoracion', $('#pd_obs_valoracion').val() || '');

    // Datos de CURACIÓN PIE DIABÉTICO
    formData.append('pd_cultivo', $('#pd_cultivo').val() || '');
    formData.append('pd_desbridamiento', $('#pd_desbridamiento').val() || '');
    formData.append('pd_lavado', $('#pd_lavado').val() || '');
    formData.append('pd_antiseptico', $('#pd_antiseptico').val() || '');
    formData.append('pd_cobertura', $('#pd_cobertura').val() || '');
    formData.append('pd_vendaje', $('#pd_vendaje').val() || '');
    formData.append('pd_obs_curacion', $('#pd_obs_curacion').val() || '');

    formData.append('observaciones', $('#observaciones_pd').val() || '');

    $.ajax({
        url: "{{ route('enfermeria.guardar_curacion_registro') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.mensaje === 'OK') {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.msj
                }).then(() => {
                    cargarCuracionesPieDiabetico();
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: xhr.responseJSON?.msj || 'Error al guardar'
            });
        }
    });
}

/**
 * Guardar curación QUEMADOS usando CuracionRegistro
 */
function guardar_curacion_quemados_nuevo() {
    let formData = new FormData();

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'quemados');
    formData.append('etapa', 'mixta');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());

    // Datos de VALORACIÓN QUEMADOS
    formData.append('quem_zona_afectada', $('#quem_zona_afectada').val() || '');
    formData.append('quem_grado', $('#quem_grado').val() || '');
    formData.append('quem_superficie', $('#quem_superficie').val() || '');
    formData.append('quem_profundidad', $('#quem_profundidad').val() || '');
    formData.append('pat_propq', $('#pat_propq').val() || '');
    formData.append('med_quem', $('#med_quem').val() || '');
    formData.append('quem_obs_valoracion', $('#quem_obs_valoracion').val() || '');

    // Datos de CURACIÓN QUEMADOS
    formData.append('quem_limpieza', $('#quem_limpieza').val() || '');
    formData.append('quem_desbridamiento', $('#quem_desbridamiento').val() || '');
    formData.append('quem_topico', $('#quem_topico').val() || '');
    formData.append('quem_aposito', $('#quem_aposito').val() || '');
    formData.append('quem_vendaje', $('#quem_vendaje').val() || '');
    formData.append('quem_obs_curacion', $('#quem_obs_curacion').val() || '');

    formData.append('observaciones', $('#observaciones_quem').val() || '');

    $.ajax({
        url: "{{ route('enfermeria.guardar_curacion_registro') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.mensaje === 'OK') {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.msj
                }).then(() => {
                    cargarCuracionesQuemados();
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: xhr.responseJSON?.msj || 'Error al guardar'
            });
        }
    });
}

/**
 * Cargar curaciones registradas (por tipo)
 */
function cargarCuracionesPlana() {
    $.ajax({
        url: "{{ route('enfermeria.obtener_curaciones_registro') }}",
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id_ficha_atencion: $('#id_ficha_atencion').val(),
            tipo_curacion: 'plana'
        },
        success: function(response) {
            if (response.mensaje === 'OK') {
                mostrarCuracionesEnTabla(response.data, 'plana');
            }
        }
    });
}

function cargarCuracionesLpp() {
    $.ajax({
        url: "{{ route('enfermeria.obtener_curaciones_registro') }}",
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id_ficha_atencion: $('#id_ficha_atencion').val(),
            tipo_curacion: 'lpp'
        },
        success: function(response) {
            if (response.mensaje === 'OK') {
                mostrarCuracionesEnTabla(response.data, 'lpp');
            }
        }
    });
}

/**
 * Mostrar curaciones en tabla (ejemplo)
 */
function mostrarCuracionesEnTabla(curaciones, tipo) {
    let tbody = $('#tabla-curaciones-' + tipo + ' tbody');
    tbody.empty();

    curaciones.forEach(function(cur) {
        let html = `
            <tr>
                <td>${cur.fecha_format}</td>
                <td>${cur.hora || 'N/A'}</td>
                <td>${cur.responsable}</td>
                <td>${cur.estado}</td>
                <td>
                    <button onclick="verDetalleCuracion(${cur.id})" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> Ver
                    </button>
                    <button onclick="eliminarCuracion(${cur.id})" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        `;
        tbody.append(html);
    });
}

/**
 * Eliminar curación
 */
function eliminarCuracion(id) {
    Swal.fire({
        title: '¿Está seguro?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('enfermeria.eliminar_curacion_registro') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
                success: function(response) {
                    if (response.mensaje === 'OK') {
                        Swal.fire('Eliminado!', response.msj, 'success');
                        // Recargar tabla correspondiente
                    }
                }
            });
        }
    });
}
