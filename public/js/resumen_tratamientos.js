/**
 * Genera un resumen narrativo de tratamientos desde el array de recetas
 * Uso: generarResumenTratamientos(recetas)
 */
function generarResumenTratamientos(recetas) {
    if (!recetas || recetas.length === 0) {
        return "No se han registrado tratamientos en el periodo actual.";
    }

    let resumen = "RESUMEN DE TRATAMIENTOS Y CONTROL DE ENFERMERÍA\n";
    const ahora = new Date();
    resumen += "Fecha: " + ahora.toLocaleDateString('es-CL') + " " + ahora.toLocaleTimeString('es-CL', {hour: '2-digit', minute: '2-digit'}) + " hrs\n\n";

    // Separar medicamentos por estado
    const administrados = recetas.filter(r => r.finalizado != 1 && r.estado_tratamiento == 1);
    const pendientes = recetas.filter(r => r.finalizado != 1 && r.estado_tratamiento != 1);
    const finalizados = recetas.filter(r => r.finalizado == 1);

    // Medicamentos administrados
    if (administrados.length > 0) {
        resumen += "TRATAMIENTOS ADMINISTRADOS:\n";
        administrados.forEach(r => {
            resumen += "• " + (r.nombre_medicamento || 'Medicamento no especificado');

            if (r.dosis) {
                resumen += " - " + r.dosis;
            }

            if (r.frecuencia || r.nombre_frecuencia) {
                resumen += " (" + (r.frecuencia || r.nombre_frecuencia) + ")";
            }

            resumen += " vía " + (r.via_administracion || 'no especificada');

            if (r.contador_dosis) {
                resumen += " - Dosis #" + r.contador_dosis;
            }

            if (r.tiempo_transcurrido) {
                resumen += " - Última administración hace " + r.tiempo_transcurrido;
            }

            resumen += ".\n";
        });
        resumen += "\n";
    }

    // Medicamentos pendientes
    if (pendientes.length > 0) {
        resumen += "TRATAMIENTOS PENDIENTES:\n";
        pendientes.forEach(r => {
            resumen += "• " + (r.nombre_medicamento || 'Medicamento no especificado');

            if (r.dosis) {
                resumen += " - " + r.dosis;
            }

            if (r.frecuencia || r.nombre_frecuencia) {
                resumen += " (" + (r.frecuencia || r.nombre_frecuencia) + ")";
            }

            resumen += " vía " + (r.via_administracion || 'no especificada');

            if (r.contador_dosis && r.contador_dosis > 0) {
                resumen += " - Próxima dosis programada";
            }

            resumen += ".\n";
        });
        resumen += "\n";
    }

    // Medicamentos finalizados
    if (finalizados.length > 0) {
        resumen += "TRATAMIENTOS FINALIZADOS:\n";
        finalizados.forEach(r => {
            resumen += "• " + (r.nombre_medicamento || 'Medicamento no especificado');

            if (r.contador_dosis) {
                resumen += " - Total de dosis administradas: " + r.contador_dosis;
            }

            resumen += ".\n";
        });
        resumen += "\n";
    }

    // Estadísticas generales
    resumen += "ESTADÍSTICAS:\n";
    resumen += "Total de tratamientos: " + recetas.length + "\n";
    resumen += "Administrados: " + administrados.length + "\n";
    resumen += "Pendientes: " + pendientes.length + "\n";
    resumen += "Finalizados: " + finalizados.length + "\n";

    return resumen;
}

/**
 * Actualiza el textarea del resumen automáticamente
 * Llamar después de administrar o modificar tratamientos
 */
function actualizarResumenTratamientos() {
    // Obtener recetas desde la tabla actual
    const recetas = [];

    $('#tabla_medicamento_cirugia_sdi_enfermera_adm tbody tr').each(function() {
        const $tr = $(this);
        const receta = {
            id: parseInt($tr.attr('id').replace('row', '')),
            nombre_medicamento: $tr.find('td:eq(3)').text().trim(),
            contador_dosis: parseInt($tr.find('td:eq(2)').text().trim()) || 0,
            frecuencia: $tr.find('td:eq(7)').text().trim(),
            via_administracion: $tr.find('td:eq(8)').text().trim(),
            tiempo_transcurrido: $tr.find('td:eq(9)').text().replace('Hace: ', '').trim(),
            estado_tratamiento: $tr.find('input[id^="registro_alternativo_paciente_enf_adm"]').is(':checked') ? 1 : 0,
            finalizado: $tr.find('input[id^="tratamiento_finalizado_enf_adm"]').is(':checked') ? 1 : 0
        };
        recetas.push(receta);
    });

    // Generar y mostrar resumen
    const resumen = generarResumenTratamientos(recetas);
    $('#resumen_tto_enf').val(resumen);
}

// Ejecutar al cargar la página
$(document).ready(function() {
    // Generar resumen inicial si existe la tabla
    if ($('#tabla_medicamento_cirugia_sdi_enfermera_adm').length > 0) {
        setTimeout(actualizarResumenTratamientos, 500);
    }
});
