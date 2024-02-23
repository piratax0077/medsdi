SELECT
	ges_registros.nombre_ges,
    ges_registros.fecha_ficha_ges,
    ges_registros.hora_ficha_ges,
    
    -- ges_registros.id_paciente,
    CONCAT( pacientes.nombres, ' ', pacientes.apellido_uno, ' ', pacientes.apellido_dos) paciente_nombre,
    pacientes.rut paciente_rut,

    -- ges_registros.nombre_responsable_ficha_ges,
    -- ges_registros.rut_responsable_ficha_ges,
    
    -- ges_registros.id_profesional,
    CONCAT( profesionales.nombre, ' ', profesionales.apellido_uno, ' ', profesionales.apellido_dos) profesional_nombre,
    profesionales.rut profesional_rut,
    
    ges_registros.nombre_institucion_ficha_ges,
    ges_registros.direccion_institucion_ficha_ges,
    
    ges_registros.confirmacion_diagnostica_ficha_ges,
    ges_registros.paciente_tratamiento_ficha_ges,
    
    ges_registros.codigo_verificacion,
    ges_registros.created_at
FROM
    ges_registros
    INNER JOIN pacientes ON (ges_registros.id_paciente = pacientes.id) 
    INNER JOIN profesionales ON (ges_registros.id_profesional = profesionales.id)
WHERE
    YEAR(ges_registros.fecha_ficha_ges) = '2023'
	-- and MONTH(ges_registros.fecha_ficha_ges) = '01';