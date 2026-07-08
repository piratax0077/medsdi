<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="color-scheme" content="light" />
    <meta name="supported-color-schemes" content="light" />
    <title>Hora Cancelada</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        body, table, td, a { -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
        table, td { mso-table-lspace:0pt; mso-table-rspace:0pt; }
        img { -ms-interpolation-mode:bicubic; border:0; line-height:100%; outline:none; text-decoration:none; }
        body { margin:0; padding:0; width:100% !important; height:100% !important; }

        @media screen and (max-width: 480px) {
            .email-container { width:100% !important; border-radius:0 !important; }
            .px-pad { padding-left:18px !important; padding-right:18px !important; }
            .header-cell { display:block !important; width:100% !important; text-align:center !important; padding-bottom:8px !important; }
            .header-cell img { margin:0 auto !important; }
            .header-title-cell { display:block !important; width:100% !important; text-align:center !important; }
            .stack-cell { display:block !important; width:100% !important; margin-bottom:10px; }
            .stack-spacer { display:none !important; }
        }
    </style>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <!-- PREHEADER -->
    <div style="display:none; max-height:0; overflow:hidden; mso-hide:all; font-size:1px; line-height:1px; color:#eef3f9;">
        Tu hora m&eacute;dica del {{ $detalle['body']['fecha'] }} a las {{ $detalle['body']['hora'] }} fue cancelada.
        &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;
    </div>

    <table border="0" width="100%" cellspacing="0" cellpadding="0" role="presentation" style="background-color:#eef3f9;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="padding:24px 15px;">

                    <!-- CONTENEDOR -->
                    <table border="0"
                        width="100%"
                        cellspacing="0"
                        cellpadding="0"
                        role="presentation"
                        class="email-container"
                        style="
                            max-width:620px;
                            background:#ffffff;
                            border-radius:24px;
                            overflow:hidden;
                            box-shadow:0 12px 45px rgba(15,23,42,0.08);
                        ">

                        <tbody>
                            <!-- TOP LINE -->
                            <tr>
                                <td style="
                                    height:6px;
                                    background-color:#ef4444;
                                    background-image:linear-gradient(90deg,#ef4444 0%, #dc2626 100%);
                                "></td>
                            </tr>

                            <!-- HEADER -->
                            <tr>
                                <td class="px-pad" style="padding:18px 26px 12px 26px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                        <tr>

                                            <!-- LOGO -->
                                            <td class="header-cell" align="left" valign="middle" width="130">
                                                <img
                                                src="https://www.med-sdi.cl/images/sdi-color-h.svg"
                                                width="100"
                                                alt="Salud Digital Integrada"
                                                style="width:100px; display:block;">
                                            </td>

                                            <!-- TITULO -->
                                            <td class="header-title-cell" align="right" valign="middle">
                                                <p style="margin:0;font-size:11px; font-family:Helvetica, Arial, sans-serif;letter-spacing:2px;text-transform:uppercase;color:#ef4444;font-weight:700;">
                                                    Hora M&eacute;dica Cancelada
                                                </p>
                                            </td>

                                        </tr>
                                    </table>

                                </td>
                            </tr>

                            <!-- HERO -->
                            <tr>
                                <td class="px-pad" style="
                                    padding:4px 32px 16px 32px;
                                    text-align:center;
                                ">

                                    <h1 style="
                                        margin:0 0 2px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:19px;
                                        line-height:26px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        Estimado/a Paciente
                                    </h1>

                                    <p style="
                                        margin:0 0 14px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:15px;
                                        line-height:22px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        {{ $detalle['body']['nombre_paciente'] }}
                                    </p>

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        role="presentation"
                                        style="
                                            background-color:#dc2626;
                                            background-image:linear-gradient(135deg,#ef4444 0%, #dc2626 100%);
                                            border-radius:16px;
                                            box-shadow:0 8px 20px rgba(239,68,68,0.20);
                                        ">

                                        <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="
                                                        padding:14px 18px;
                                                    ">

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:15px;
                                                        line-height:22px;
                                                        color:#ffffff;
                                                        font-weight:700;
                                                    ">
                                                        Su hora m&eacute;dica ha sido cancelada exitosamente
                                                    </p>

                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- FECHA Y HORA -->
                            <tr>
                                <td class="px-pad" align="center"
                                    style="padding:0 28px 12px 28px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        role="presentation">

                                        <tbody>
                                            <!-- FECHA HORA -->
                            <tr>
                                <td class="px-pad" style="padding:12px 22px;">

                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                    style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

                                    <tr>

                                        <td class="stack-cell" align="center" style="padding:12px 0px;border-right:1px solid #edf2f7;">
                                             <img style="width:35px;"
                                                                src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                                alt="Día">
                                            <p style="font-family:Helvetica, Arial, sans-serif;margin:0;font-size:12px;color:#64748b;font-weight:700;">Fecha</p>
                                            <p style="font-family:Helvetica, Arial, sans-serif;margin:3px 0 0 0;font-size:14px;color:#1a49a3;font-weight:700;">
                                                {{ $detalle['body']['fecha'] }}
                                            </p>
                                        </td>

                                        <td class="stack-cell" align="center" style="padding:12px 0px;">
                                             <img style="width:35px;"
                                                                src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                                alt="Día">
                                            <p style="font-family:Helvetica, Arial, sans-serif;margin:0;font-size:12px;color:#64748b;font-weight:700;">Hora</p>
                                            <p style="font-family:Helvetica, Arial, sans-serif;margin:3px 0 0 0;font-size:14px;color:#1a49a3;font-weight:700;">
                                                {{ $detalle['body']['hora'] }}
                                            </p>
                                        </td>

                                    </tr>
                                </table>

                            </td>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- INFORMACION -->
                            <tr>
                                <td class="px-pad" style="padding:0 28px 12px 28px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        role="presentation"
                                        style="
                                            background:#ffffff;
                                            border:1px solid #e2e8f0;
                                            border-radius:16px;
                                            overflow:hidden;
                                        ">

                                        <tbody>

                                            <!-- HEADER -->
                                            <tr>
                                                <td colspan="2"
                                                    style="
                                                        padding:10px 16px;
                                                        background:#f8fbff;
                                                        border-bottom:1px solid #e2e8f0;
                                                    ">

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:13px;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                        text-transform: uppercase;
                                                    ">
                                                        Informaci&oacute;n de su Cita
                                                    </p>

                                                </td>
                                            </tr>

                                            @if (isset($detalle['body']['profesional_nombre']))

                                            <tr>
                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Profesional
                                                </td>

                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_nombre'] }}
                                                </td>
                                            </tr>

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Profesi&oacute;n
                                                </td>

                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_especialidad'] }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Especialidad
                                                </td>

                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_tipo_especialidad'] }}
                                                </td>
                                            </tr>

                                            @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Tipo Especialidad
                                                </td>

                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}
                                                </td>
                                            </tr>

                                            @endif
                                            @endif

                                            <tr>
                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Lugar Atenci&oacute;n
                                                </td>

                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:11px;
                                                    text-transform: uppercase;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    <strong>{{ $detalle['body']['lugar_atencion'] }}</strong><br>
                                                    <i>{{ $detalle['body']['direccion'] }}</i>
                                                </td>
                                            </tr>

                                           <!-- <tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:13px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Direcci&oacute;n
                                                </td>

                                                <td style="
                                                    padding:9px 16px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:13px;
                                                    color:#475569;
                                                ">
                                                    {{ $detalle['body']['direccion'] }}
                                                </td>
                                            </tr>-->

                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- MENSAJE -->
                            <tr>
                                <td class="px-pad" style="
                                    padding:0 28px 20px 28px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:13px;
                                        line-height:19px;
                                        color:#64748b;
                                    ">
                                        Si necesita reagendar una nueva atenci&oacute;n m&eacute;dica, puede hacerlo directamente desde la plataforma o comunic&aacute;ndose con el centro de atenci&oacute;n.
                                    </p>

                                </td>
                            </tr>

                            <!-- FOOTER -->
                            <tr>
                                <td style="
                                    background:#f1f5f9;
                                    border-top:1px solid #dbe4ee;
                                    padding:16px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:11px;
                                        line-height:16px;
                                        color:#64748b;
                                    ">
                                        Este correo fue enviado por <strong>Salud Digital Integrada</strong><br>
                                        &copy;{{ date('Y') }} SDI &middot; Todos los derechos reservados
                                    </p>

                                </td>
                            </tr>

                        </tbody>

                    </table>

                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>