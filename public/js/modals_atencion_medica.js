/* Formularios generales */
/* Formularios generales */
/* Formulario certificado de reposo */
$('#formularios_atencion').on('click', ".accion_modal_certificado_reposo", function() {
    console.log("abrir modal accion_modal_certificado_reposo");
    $('#modal_certificado_reposo').modal();
});

/* Formulario de interconsulta */
$('#formularios_atencion').on('click', ".accion_modal_interconsulta", function() {
    console.log("abrir modal accion_modal_interconsulta");
    $('#hipotesis_interconsulta').val($('#descripcion_hipotesis').val());
    $('#modal_interconsulta').modal();
});

$('.accion_modal_interconsulta').click(function() {
    console.log("abrir modal accion_modal_interconsulta");
    $('#modal_interconsulta').modal();
});

$('#formularios_atencion').on('click', ".accion_modal_interconsulta_respuesta", function() {
    console.log("abrir modal accion_modal_interconsulta_respuesta");
    $('#modal_interconsulta_respuesta').modal();
});
$('.accion_modal_interconsulta_respuesta').click(function() {
    console.log("abrir modal accion_modal_interconsulta_respuesta");
    $('#modal_interconsulta_respuesta').modal();
});


/* Formulario de informe médico */
$('#formularios_atencion').on('click', ".accion_modal_inf_medico", function() {
    console.log("abrir modal accion_modal_inf_medico");
    $('#modal_inf_medico').modal();
});

/* Formulario de uso personal */
$('#formularios_atencion').on('click', ".accion_modal_uso_personal", function() {
    console.log("abrir modal accion_modal_uso_personal");
    $('#modal_uso_personal').modal();
});

/* Formularios de notificacion */
/* Constancia GES */
$('#formularios_atencion').on('click', ".accion_modal_constancia_ges", function() {
    console.log("abrir modal accion_modal_constancia_ges");
    $('#form_ges').modal();
});
/* Enfermedades enfermedades_declaracion obligatoria */
$('#formularios_atencion').on('click', ".accion_modal_enfermedades_declaracion_obligatoria", function() {
    console.log("abrir modal accion_modal_enfermedades_declaracion_obligatoria");
    $('#modal_enfermedades_declaracion_obligatoria').modal();
});
/* Reembolso Médico */
$('#formularios_atencion').on('click', ".accion_modal_reembolso_medico", function() {
    console.log("abrir modal accion_modal_reembolso_medico");
    $('#modal_reembolso_medico').modal();
});
/* Reembolso dentales */
$('#formularios_atencion').on('click', ".accion_modal_reembolso_dental", function() {
    console.log("abrir modal accion_modal_reembolso_dental");
    $('#modal_reembolso_dental').modal();
});

/* Consentimientos informados */
/* Anestesia */
$('#formularios_atencion').on('click', ".accion_modal_anestesia", function() {
    console.log("abrir modal accion_modal_anestesia");
    $('#modal_anestesia').modal();
});

/* Indicaciones*/
/* Indicar Médicamento*/
$('#formularios_atencion').on('click', ".accion_modal_medicamentos", function() {
    console.log("abrir modal accion_modal_medicamentos");
    $('#modal_indicar_medicamentos').modal();
});

/* Indicar Exámen*/
$('#formularios_atencion').on('click', ".accion_modal_examenes", function() {
    console.log("abrir modal accion_modal_examenes");
    $('#modal_indicar_examen').modal();
});

/* Indicar Audifonos*/
$('#formularios_atencion').on('click', ".accion_modal_audifonos", function() {
    console.log("abrir modal accion_modal_audifonos");
    $('#modal_audifonos').modal();
});

/* Indicar Reflujo Gastroesofagico*/
$('#formularios_atencion').on('click', ".accion_modal_reflujo_gastro", function() {
    console.log("abrir modal accion_modal_eflujo_gastro");
    $('#modal_reflujo_gastro').modal();
});

/* Modal añadir_examenes*/
function añadir_examen() {
    $('#añadir_examen_modal').modal('show');
}