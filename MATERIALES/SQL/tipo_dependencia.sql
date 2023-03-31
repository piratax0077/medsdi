INSERT INTO `tipo_dependencia`(
    `id`,
    `nombre`,
    `alias`,
    `descripcion`,
    `estado`,
    `created_at`,
    `updated_at`
)
VALUES
(
    NULL,
    'Menor de Edad',
    'menor-edad',
    'Menor de Edad\r\nHijo, Hija, dependientes económicos menor de edad',
    '1',
    CURRENT_DATE(), NULL
),
(
    NULL,
    'Incapacidad Mental Permanente',
    'incapacidad-mental-pemanente',
    'Incapacidad Mental Permanente\r\nInterdicción',
    '1',
    CURRENT_DATE(), NULL
),
(
    NULL,
    'Mayor de Edad con Incapacidad Temporal',
    'mayor-edad-incapacidad-temporal',
    'Mayor de Edad con Incapacidad Temporal',
    '1',
    CURRENT_DATE(), NULL
);
