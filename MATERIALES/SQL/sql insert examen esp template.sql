INSERT INTO `examen_especialidad_template` (`id`, `nombre`, `cuerpo`, `pdf`, `estructura`, `alias`, `estado`, `created_at`, `updated_at`) VALUES
(6,
'ECO GINECOLOGIA',
'',
'',
'id_fichas_atenciones|id_ficha_gineco_obstetrica|solicitado_id_profesional|solicitado_rut|solicitado_por|descripcion_examen|mot_examen|descripcion_motivo|antec_especialidad|mensaje_solicitado_por|solicitado_nombre|solicitado_apellido|solicitado_telefono|solicitado_email|tipo|general|endometrio|ovario_der|ovario_izq|trompa_der|trompa_izq|fondo_saco|diagnostico|observacion|mis_archivos',
'eco_gine',
'1',
CURRENT_DATE(),
NULL);
INSERT INTO `examen_especialidad_template` (`id`, `nombre`, `cuerpo`, `pdf`, `estructura`, `alias`, `estado`, `created_at`, `updated_at`) VALUES
(7,
'ECO OBSTETRICA',
'',
'',
'id_fichas_atenciones|id_ficha_gineco_obstetrica|solicitado_id_profesional|solicitado_rut|solicitado_por|descripcion_examen|mot_examen|descripcion_motivo|antec_especialidad|solicitado_nombre|solicitado_apellido|solicitado_telefono|solicitado_email|tipo|fur|fpp|e_gest|num_gest|lcc|diametro_cef|peso_fetal|edad_ecografia|placenta|liq_amniotico|sexo|dg_ecografico|observacion|mis_archivos',
'eco_obst',
'1',
CURRENT_DATE(),
NULL);
INSERT INTO `examen_especialidad_template` (`id`, `nombre`, `cuerpo`, `pdf`, `estructura`, `alias`, `estado`, `created_at`, `updated_at`) VALUES
(8,
'PROCEDIMIENTO',
'',
'',
'id_fichas_atenciones|id_ficha_gineco_obstetrica|solicitado_id_profesional|solicitado_rut|solicitado_por|descripcion_examen|mot_examen|descripcion_motivo|antec_especialidad|mensaje_solicitado_por|solicitado_nombre|solicitado_apellido|solicitado_telefono|solicitado_email|tipo|otro_tipo|biopsia_obs|ex_pap_obs|ex_diu|ant_obs',
'proced',
'1',
CURRENT_DATE(),
NULL);


INSERT INTO `examen_especialidad_tipo` (`id`, `id_template`, `id_sub_tipo_especialidad`, `nombre`, `descripcion`, `otro`, `estado`, `created_at`, `updated_at`) VALUES
(NULL, '6', '27', 'ECO GINECOLOGIA', 'ECO GINECOLOGIA', NULL, '1', CURRENT_DATE(), NULL);
INSERT INTO `examen_especialidad_tipo` (`id`, `id_template`, `id_sub_tipo_especialidad`, `nombre`, `descripcion`, `otro`, `estado`, `created_at`, `updated_at`) VALUES
(NULL, '7', '27', 'ECO OBSTETRICA', 'ECO OBSTETRICA', NULL, '1', CURRENT_DATE(), NULL);
INSERT INTO `examen_especialidad_tipo` (`id`, `id_template`, `id_sub_tipo_especialidad`, `nombre`, `descripcion`, `otro`, `estado`, `created_at`, `updated_at`) VALUES
(NULL, '8', '27', 'PROCEDIMIENTO', 'PROCEDIMIENTO', NULL, '1', CURRENT_DATE(), NULL);


