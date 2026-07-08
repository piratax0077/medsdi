<div id="m_eval_espec" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="m_paciente">Datos de consulta de: </h5>
                <button type="button" class="close" onclick="$('#m_eval_espec').modal('hide'); " data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="eval_especialidad_contenido">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"
                    onclick="$('#m_eval_espec').modal('hide'); ">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_evaluaciones_especialidad(id_ficha_clinica) {

        const url = "{{ route('profesional.buscar_evaluaciones_especialidad') }}";

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id_ficha_atencion: id_ficha_clinica
            },

            success: function(data) {

                console.log(data);

                if (data.error) {
                    swal('Error', data.error, 'error');
                    return;
                }

                const paciente   = data.paciente;
                let evaluaciones = data.evaluaciones;

                // ── Nombre paciente ───────────────────────────────────────────
                const nombreCompleto = [
                    paciente.nombres,
                    paciente.apellido_uno ?? '',
                    paciente.apellido_dos ?? ''
                ].filter(Boolean).join(' ');

                $('#m_paciente').html(
                    `Datos de consulta de: <strong>${nombreCompleto}</strong>`
                );

                // ── Campos a ignorar ──────────────────────────────────────────
                const excluir = new Set([
                    'id', 'id_profesional', 'id_profesional_fc',
                    'id_ficha_atencion', 'id_fc', 'id_fichas_atenciones',
                    'id_ficha_cirugia', 'id_paciente', 'id_lugar_atencion',
                    'otro_acompanante_relacion', 'id_paciente_fc',
                    'created_at', 'updated_at', 'hora_medica',
                    'motivo', 'antecedentes', 'examen_fisico',
                    'descripcion_hipotesis', 'prevision_paciente_fc',
                    'rut_paciente_fc', '_token', 'estado'
                ]);

                // ── Mapeos PIE DIABÉTICO ──────────────────────────────────────
                const mapeos_pie_diabetico = {
                    aspecto_pie_diab: {
                        '0': 'No selec.',     '1': 'Sano',
                        '2': 'Enrojecido',    '3': 'Eritematosa',
                        '4': 'Amarillo pálido','5': 'Necrótico',
                        '6': 'Observaciones'
                    },
                    mayor_extension: {
                        '0': 'No selec.', '1': '0-1 cm',
                        '2': '1-3 cm',    '3': '3-6 cm',
                        '4': '6-10 cm',   '5': '>10 cm',
                        '6': 'Observaciones'
                    },
                    profundidad_curacion: {
                        '0': 'No selec.', '1': '0',
                        '2': '0-1 cm',    '3': '1-2 cm',
                        '4': '2-3 cm',    '5': '>3 cm',
                        '6': 'Observaciones'
                    },
                    exudado_cantidad_curacion: {
                        '0': 'No selec.', '1': 'Ausente',
                        '2': 'Escaso',    '3': 'Moderado',
                        '4': 'Abundante', '6': 'Observaciones'
                    },
                    exudado_calidad_curacion: {
                        '0': 'No selec.',   '1': 'Sin exudado',
                        '2': 'Seroso',      '3': 'Turbio',
                        '4': 'Purulento',   '6': 'Observaciones'
                    },
                    tejido_esf: {
                        '0': 'No selec.', '1': 'Ausente',
                        '2': '25%',       '3': '25-50%',
                        '4': '>50-75%',   '5': '>75%',
                        '6': 'Observaciones'
                    },
                    tejido_granu: {
                        '0': 'No selec.', '1': '100-75%',
                        '2': '<75-50%',   '3': '<50-25%',
                        '4': '<25%',      '6': 'Observaciones'
                    },
                    edema_curacion: {
                        '0': 'No selec.', '1': 'Ausente',
                        '2': '+',         '3': '++',
                        '4': '+++',       '6': 'Observaciones'
                    },
                    dolor_curacion: {
                        '0': 'No selec.', '1': '0-1',
                        '2': '2-3',       '3': '4-6',
                        '4': '7-10',      '6': 'Observaciones'
                    },
                    piel_circun: {
                        '0': 'No selec.', '1': 'Sana',
                        '2': 'Descamada', '3': 'Eritematosa',
                        '4': 'Macerada',  '6': 'Observaciones'
                    }
                };

                // ── Mapeos CURACIÓN ───────────────────────────────────────────
                const mapeos_curacion = {

                    cp_cult_plana: {
                        '0': 'No',
                        '1': 'Sí',
                        '6': 'Otros'
                    },

                    cp_td_plana: {
                        '0': 'No selec.',
                        '1': 'Quirúrgico',
                        '2': 'Cortante',
                        '3': 'Enzimático',
                        '4': 'Autolítico',
                        '5': 'Biológico',
                        '6': 'Observaciones'
                    },

                    cp_duch_plana: {
                        '0': 'No selec.',
                        '1': 'Sí',
                        '2': 'No',
                        '6': 'Observaciones'
                    },

                    cp_antisepticos: {
                        '0': 'No selec.',
                        '1': 'Solución fisiológica',
                        '2': 'Bioalcohol'
                    },

                    cp_apositos: {
                        '0': 'No selec.',
                        '1': 'Apósitos pasivos',
                        '2': 'Apósitos interactivos',
                        '3': 'Apósitos bioactivos',
                        '4': 'Apósitos mixtos',
                        '5': 'Vasoconstrictores',
                        '6': 'Otros'
                    }

                };


                // ── Normalizar a array ────────────────────────────────────────
                if (evaluaciones && !Array.isArray(evaluaciones)) {
                    evaluaciones = [evaluaciones];
                }

                let contenido        = '';
                let tieneInformacion = false;

                if (evaluaciones && evaluaciones.length > 0) {

                    evaluaciones.forEach((evaluacion, index) => {

                        const datos = evaluacion.datos ?? evaluacion;

                        // ── Seleccionar mapeo según etapa ─────────────────────
                        let mapeos = {};
                        switch (evaluacion.etapa?.toLowerCase()) {
                            case 'curacion':
                                mapeos = mapeos_curacion;
                                break;
                            case 'valoracion':
                            case 'pie_diabetico':
                                mapeos = mapeos_pie_diabetico;
                                break;
                            default:
                                mapeos = {};
                        }

                        // ── Cabecera card ─────────────────────────────────────
                        const cabecera = evaluacion.etapa
                            ? `<strong>${evaluacion.etapa.toUpperCase()}</strong>
                            <small class="ms-2 text-muted">
                                ${evaluacion.fecha ?? ''} ${evaluacion.hora ?? ''}
                            </small>`
                            : `<strong>Evaluación ${index + 1}</strong>`;

                        contenido += `
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light text-dark">
                                    ${cabecera}
                                </div>
                                <ul class="list-group list-group-flush">
                        `;

                        let hayDatosEnEstaEval = false;

                        // ── Filas ─────────────────────────────────────────────
                        for (const [key, value] of Object.entries(datos)) {

                            // Filtrar nulls, vacíos y excluidos
                            const tieneValor = (
                                value !== null      &&
                                value !== ''        &&
                                value !== undefined
                            );

                            if (!tieneValor || excluir.has(key) || key.includes('length')) {
                                continue;
                            }

                            tieneInformacion   = true;
                            hayDatosEnEstaEval = true;

                            const label = key.replace(/_/g, ' ').toUpperCase();

                            // ── Resolver valor legible ────────────────────────
                            let valorMostrar;

                            if (mapeos[key]?.[String(value)] !== undefined) {
                                // ✅ Mapeo exacto por key real del JSON
                                valorMostrar = mapeos[key][String(value)];
                            } else if (value === 0 || value === '0') {
                                valorMostrar = 'NO';
                            } else if (value === 1 || value === '1') {
                                valorMostrar = 'SÍ';
                            } else {
                                valorMostrar = value;
                            }

                            contenido += `
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-secondary small">${label}</strong>
                                    <span class="badge bg-light text-dark">${valorMostrar}</span>
                                </li>
                            `;
                        }

                        // Si la evaluación no tenía datos visibles
                        if (!hayDatosEnEstaEval) {
                            contenido += `
                                <li class="list-group-item text-muted text-center fst-italic">
                                    Sin datos registrados en esta etapa
                                </li>
                            `;
                        }

                        contenido += `
                                </ul>
                            </div>
                        `;

                    }); // fin forEach

                } // fin if evaluaciones

                // ── Renderizar ────────────────────────────────────────────────
                if (tieneInformacion) {
                    $('#eval_especialidad_contenido').html(contenido);
                } else {
                    $('#eval_especialidad_contenido').html(`
                        <div class="alert alert-warning text-center">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            Sin información registrada.
                        </div>
                    `);
                }

                $('#m_eval_espec').modal('show');
            },

            error: function(xhr) {
                console.error(xhr);
                swal('Error', 'No se pudo cargar la información', 'error');
            }

        }); // fin $.ajax

    } // fin función

</script>
