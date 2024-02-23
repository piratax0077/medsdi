SELECT
    -- declaraciones_eno.id,

    declaraciones_eno.diagnostico_cie,
    declaraciones_eno.diagnositico_confirmado,
    declaraciones_eno.primeros_sintomas,
    CASE
    	WHEN declaraciones_eno.pais_contagio = 1 THEN 'CHILE'
        WHEN declaraciones_eno.pais_contagio = 2 THEN 'EXTRANJERO'
    END pais_contagio,
    declaraciones_eno.pais,

    CASE
    	WHEN declaraciones_eno.vacunacion = 1 THEN 'SI'
        WHEN declaraciones_eno.vacunacion = 2 THEN 'NO'
        WHEN declaraciones_eno.vacunacion = 3 THEN 'IGNORADO'
        WHEN declaraciones_eno.vacunacion = 4 THEN 'NO CORRESPONDE'
        ELSE 'NO'
    END vacunacion,
    declaraciones_eno.fecha_ultima_dosis,
    declaraciones_eno.numero_ultima_dosis,

    declaraciones_eno.tbc,
    declaraciones_eno.tbc_recaidas,

    declaraciones_eno.fecha_notificacion,
    declaraciones_eno.hora_notificacion,

    -- declaraciones_eno.id_paciente,
    CONCAT( pacientes.nombres, ' ', pacientes.apellido_uno, ' ', pacientes.apellido_dos) paciente_nombre,
    pacientes.rut paciente_rut,

    declaraciones_eno.nacionalidad_paciente,
    -- declaraciones_eno.codigo_nacionalidad_paciente,
    declaraciones_eno.ocupacion_paciente,


    CASE
        WHEN declaraciones_eno.pueblo_originario_paciente = 1 THEN "Ninguna"
        WHEN declaraciones_eno.pueblo_originario_paciente = 2 THEN "Atacameño"
        WHEN declaraciones_eno.pueblo_originario_paciente = 3 THEN "Aimara"
        WHEN declaraciones_eno.pueblo_originario_paciente = 5 THEN "Colla"
        WHEN declaraciones_eno.pueblo_originario_paciente = 6 THEN "Otro"
        ELSE "Ninguna"
    END pueblo_originario_paciente,

    CASE
        WHEN declaraciones_eno.condicion_paciente = 1 THEN "Inactivo/a"
        WHEN declaraciones_eno.condicion_paciente = 2 THEN "Activo/a"
        ELSE "Inactivo/a"
    END condicion_paciente,

    CASE
        WHEN declaraciones_eno.categoria_paciente = 1 THEN "Patrón / Empresario"
        WHEN declaraciones_eno.categoria_paciente = 2 THEN "Empleado"
        WHEN declaraciones_eno.categoria_paciente = 3 THEN "Obrero"
        WHEN declaraciones_eno.categoria_paciente = 4 THEN "Trabajador Independiente"
    END categoria_paciente,

    -- declaraciones_eno.id_profesional,
    CONCAT( profesionales.nombre, ' ', profesionales.apellido_uno, ' ', profesionales.apellido_dos) profesional_nombre,
    profesionales.rut profesional_rut,

    declaraciones_eno.nombre_establecimiento,
    declaraciones_eno.codigo_establecimiento,
    declaraciones_eno.nombre_oficina,
    declaraciones_eno.codigo_oficina

FROM
    declaraciones_eno
    INNER JOIN pacientes ON (declaraciones_eno.id_paciente = pacientes.id)
    INNER JOIN profesionales ON (declaraciones_eno.id_profesional = profesionales.id)
WHERE
    YEAR(declaraciones_eno.fecha_notificacion) = '2023'
	-- and MONTH(declaraciones_eno.fecha_notificacion) = '01';
