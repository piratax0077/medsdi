<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no" />
    <meta name="color-scheme" content="light" />
    <meta name="supported-color-schemes" content="light" />
    <title>Hora Agendada</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <style>
        table {border-collapse:collapse;}
        .fallback-gradient { background-color:#1a49a3 !important; }
    </style>
    <![endif]-->
    <style>
        body, table, td, a { -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
        table, td { mso-table-lspace:0pt; mso-table-rspace:0pt; }
        img { -ms-interpolation-mode:bicubic; border:0; line-height:100%; outline:none; text-decoration:none; }
        body { margin:0; padding:0; width:100% !important; height:100% !important; }
        td { word-break:break-word; }

        /* Evita que iOS convierta fechas/horas en enlaces azules */
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration:none !important;
            font-size:inherit !important;
            font-family:inherit !important;
            font-weight:inherit !important;
            line-height:inherit !important;
        }

        @media screen and (max-width: 600px) {
            /* width:auto + border-box evita que el padding desborde la celda al pasar a block */
            .header-cell, .header-title-cell, .stack-cell, .data-label, .data-value {
                box-sizing:border-box !important;
            }

            .email-container { width:100% !important; max-width:100% !important; border-radius:0 !important; }
            .px-pad { padding-left:18px !important; padding-right:18px !important; }

            /* Header: logo arriba centrado, titulo abajo centrado */
            .header-cell { display:block !important; width:auto !important; text-align:center !important; padding:0 0 10px 0 !important; }
            .header-cell img { margin:0 auto !important; }
            .header-title-cell { display:block !important; width:auto !important; text-align:center !important; padding:0 !important; }

            /* Fecha y hora se mantienen lado a lado, solo mas compactas */
            .stack-cell { padding:12px 8px !important; }

            /* Tabla de datos: etiqueta arriba, valor abajo */
            .data-label { display:block !important; width:auto !important; padding:12px 16px 0 16px !important; border-bottom:none !important; }
            .data-value { display:block !important; width:auto !important; padding:2px 16px 12px 16px !important; }
        }

        /* Solo en pantallas muy pequenas: fecha y hora una debajo de la otra */
        @media screen and (max-width: 360px) {
            .stack-cell { display:block !important; width:auto !important; text-align:center !important; border-right:none !important; border-bottom:1px solid #edf2f7 !important; padding:14px 12px !important; }
            .stack-cell img { margin:0 auto !important; }
            .stack-cell-last { border-bottom:none !important; }
        }
    </style>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <!-- PREHEADER -->
    <div style="display:none; max-height:0; overflow:hidden; mso-hide:all; font-size:1px; line-height:1px; color:#eef3f9;">
        Tu hora médica fue agendada para el {{ empty($detalle['body']['fecha']) ? '' : rescue(fn() => \Carbon\Carbon::parse($detalle['body']['fecha'])->format('d/m/Y'), $detalle['body']['fecha'], false) }} a las {{ empty($detalle['body']['hora']) ? '' : rescue(fn() => \Carbon\Carbon::parse($detalle['body']['hora'])->format('H:i'), $detalle['body']['hora'], false) }}.
        &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;
    </div>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#eef3f9;">
        <tbody>
            <tr>
                <td align="center" style="padding:24px 15px;">

                    <!--[if mso]>
                    <table width="620" cellspacing="0" cellpadding="0" border="0" align="center"><tr><td>
                    <![endif]-->

                    <!-- CONTAINER -->
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="email-container"
                    style="
                    width:100%;
                    max-width:620px;
                    border-radius:28px;
                    overflow:hidden;
                    box-shadow:0 14px 50px rgba(15,23,42,0.10);
                    font-family:'Segoe UI', Arial, sans-serif;
                    background:#ffffff;
                    ">

                    <!-- TOP BAR -->
                    <tr>
                        <td style="height:6px;line-height:6px;font-size:0;background-color:#1a49a3;background-image:linear-gradient(90deg,#1a49a3,#31bebe);">&nbsp;</td>
                    </tr>

                    <!-- HEADER -->
                    <tr>
                        <td class="px-pad" style="padding:20px 32px 12px 32px;">

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                <tr>

                                    <!-- LOGO -->
                                    <td class="header-cell" valign="middle" width="130" style="text-align:left;">
                                        <img
                                        src="{{ asset('images/sdi-color-h.svg') }}"
                                        width="100"
                                        alt="Salud Digital Integrada"
                                        style="width:100px; max-width:100px; display:block; margin:0;">
                                    </td>

                                    <!-- TITULO -->
                                    <td class="header-title-cell" valign="middle" style="text-align:right;">
                                        <p style="margin:0;font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#31bebe;font-weight:700;">
                                            Hora Agendada
                                        </p>
                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- SALUDO -->
                    <tr>
                        <td class="px-pad" align="center" style="padding:4px 32px 4px 32px;">

                            <h2 style="margin:0 0 6px 0;font-size:19px;line-height:26px;color:#0f172a;">
                                Hola {{ $detalle['body']['nombre_paciente'] }}
                            </h2>

                            <p style="margin:0;font-size:14px;line-height:20px;color:#64748b;">
                                Su hora médica ha sido agendada exitosamente.
                            </p>

                        </td>
                    </tr>

                    <!-- FECHA HORA -->
                    <tr>
                        <td class="px-pad" style="padding:12px 28px;">

                            <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                            style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

                            <tr>

                                <td class="stack-cell" align="center" width="50%" style="padding:12px;border-right:1px solid #edf2f7;">
                                    <img style="width:35px;max-width:35px;"
                                                        src="{{ asset('images/email/calendario_1.png') }}"
                                                        alt="D&iacute;a">
                                    <p style="margin:0;font-size:12px;color:#64748b;font-weight:700;">Fecha</p>
                                    <p style="margin:3px 0 0 0;font-size:15px;color:#1a49a3;font-weight:700;">
                                        {{ empty($detalle['body']['fecha']) ? '' : rescue(fn() => \Carbon\Carbon::parse($detalle['body']['fecha'])->format('d/m/Y'), $detalle['body']['fecha'], false) }}
                                    </p>
                                </td>

                                <td class="stack-cell stack-cell-last" align="center" width="50%" style="padding:12px;">
                                    <img style="width:35px;max-width:35px;"
                                                        src="{{ asset('images/email/reloj_1.png') }}"
                                                        alt="Hora">
                                    <p style="margin:0;font-size:12px;color:#64748b;font-weight:700;">Hora</p>
                                    <p style="margin:3px 0 0 0;font-size:15px;color:#1a49a3;font-weight:700;">
                                        {{ empty($detalle['body']['hora']) ? '' : rescue(fn() => \Carbon\Carbon::parse($detalle['body']['hora'])->format('H:i'), $detalle['body']['hora'], false) }}
                                    </p>
                                </td>

                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- INFORMACION DE LA CITA -->
                <tr>
                    <td class="px-pad" style="padding:0 28px 12px 28px;">

                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                        style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

                        <tr>
                            <td colspan="2" style="background:#f8fbff;padding:10px 16px;border-bottom:1px solid #e2e8f0;">
                                <p style="margin:0;font-size:14px;font-weight:700;color:#1a49a3;">
                                    Información de tu cita
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td class="data-label" valign="top" style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;width:38%;">
                                Profesional
                            </td>
                            <td class="data-value" valign="top" style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['profesional_nombre'] }}
                            </td>
                        </tr>

                        <tr>
                            <td class="data-label" valign="top" style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;">
                                Profesión
                            </td>
                            <td class="data-value" valign="top" style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['profesional_especialidad'] }}
                            </td>
                        </tr>

                        <tr>
                            <td class="data-label" valign="top" style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;">
                                Especialidad
                            </td>
                            <td class="data-value" valign="top" style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['profesional_tipo_especialidad'] }}
                            </td>
                        </tr>

                        @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))
                        <tr>
                            <td class="data-label" valign="top" style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;">
                                Tipo Especialidad
                            </td>
                            <td class="data-value" valign="top" style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td class="data-label" valign="top" style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;">
                                Lugar de Atención
                            </td>
                            <td class="data-value" valign="top" style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['lugar_atencion'] }}
                            </td>
                        </tr>

                        <tr>
                            <td class="data-label" valign="top" style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;">
                                Dirección
                            </td>
                            <td class="data-value" valign="top" style="padding:9px 16px;font-size:13px;color:#475569;">
                                {{ $detalle['body']['direccion'] }}
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>

            <!-- ALERTA -->
            <tr>
                <td class="px-pad" style="padding:0 28px 16px 28px;">

                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                    style="background-color:#fff7ed;border-left:4px solid #f97316;border-radius:10px;">
                        <tr>
                            <td style="padding:14px 16px;font-size:13px;color:#9a3412;line-height:19px;">
                                <p style="margin:0 0 8px 0;font-weight:700;">
                                    Antes de su cita recibirá un mensaje de confirmación. Confirme su hora y llegue 15 minutos antes.
                                </p>
                                <p style="margin:0;font-weight:400;">
                                    Si tiene una cuenta activa en <a href="https://www.med-sdi.cl/Ingreso" target="_blank" style="color:#9a3412;font-weight:700;text-decoration:underline;">MED-SDI</a>, puede confirmar su cita a contar de hoy, ingresando a su Escritorio de Paciente.
                                </p>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>

            <!-- FOOTER -->
            <tr>
                <td style="padding:16px;text-align:center;background:#f1f5f9;">

                    <p style="margin:0;font-size:11px;color:#64748b;line-height:16px;">
                        Este correo fue enviado por <strong>SDI</strong><br>
                        &copy; {{ date('Y') }} &middot; Todos los derechos reservados
                    </p>

                </td>
            </tr>

                    </table>

                    <!--[if mso]>
                    </td></tr></table>
                    <![endif]-->

                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
