<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="color-scheme" content="light" />
    <meta name="supported-color-schemes" content="light" />
    <title>Confirmación de Hora Telemedicina</title>
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

    @media screen and (max-width: 480px) {
        .email-container { width:100% !important; border-radius:0 !important; }
        .stack-cell { display:block !important; width:100% !important; border-right:none !important; border-bottom:1px solid #edf2f7; }
        .stack-cell:last-child { border-bottom:none; }
        .header-cell { display:block !important; width:100% !important; text-align:center !important; padding-bottom:10px !important; }
        .header-cell img { margin:0 auto !important; }
        .header-title-cell { display:block !important; width:100% !important; text-align:center !important; }
        .px-pad { padding-left:18px !important; padding-right:18px !important; }
        .stack-cell { padding-top:10px !important; padding-bottom:10px !important; }
        .btn-cell { display:block !important; width:100% !important; padding:0 0 10px 0 !important; }
        .btn-cell:last-child { padding-bottom:0 !important; }
    }
</style>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <!-- PREHEADER -->
    <div style="display:none; max-height:0; overflow:hidden; mso-hide:all; font-size:1px; line-height:1px; color:#eef3f9;">
        Confirma o cancela tu hora de telemedicina del {{ $detalle['body']['fecha'] }} a las {{ $detalle['body']['hora'] }}.
        &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;
    </div>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td align="center" style="padding:24px 15px;">

                    <!-- CONTAINER -->
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="email-container"
                    style="
                    max-width:620px;
                    border-radius:28px;
                    overflow:hidden;
                    box-shadow:0 14px 50px rgba(15,23,42,0.10);
                    font-family:'Segoe UI', Arial, sans-serif;
                    background:#ffffff;
                    ">

                    <!-- TOP BAR -->
                    <tr>
                        <td style="height:6px;background-color:#1a49a3;background-image:linear-gradient(90deg,#1a49a3,#31bebe);"></td>
                    </tr>

                    <!-- HEADER -->
                    <tr>
                        <td class="px-pad" style="padding:20px 32px 12px 32px;">

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
                                        <p style="margin:0;font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#31bebe;font-weight:700;">
                                            Confirmaci&oacute;n de Hora &middot; Telemedicina
                                        </p>
                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>


                    <tr>
                        <td class="px-pad" align="center" style="padding:4px 32px 4px 32px;">

                            <h2 style="margin:0 0 6px 0;font-size:19px;line-height:26px;color:#0f172a;">
                                Hola {{ $detalle['body']['nombre_paciente'] }}
                            </h2>

                            <p style="margin:0;font-size:14px;line-height:20px;color:#64748b;">
                                Tienes una hora de telemedicina agendada. Por favor conf&iacute;rmala o canc&eacute;lala usando los botones m&aacute;s abajo.
                            </p>

                        </td>
                    </tr>

                    <!-- FECHA HORA -->
                    <tr>
                        <td class="px-pad" style="padding:12px 28px;">

                            <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                            style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

                            <tr>

                                <td class="stack-cell" align="center" style="padding:12px;border-right:1px solid #edf2f7;">
                                     <img style="width:35px;"
                                                        src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                        alt="D&iacute;a">
                                    <p style="margin:0;font-size:12px;color:#64748b;font-weight:700;">Fecha</p>
                                    <p style="margin:3px 0 0 0;font-size:15px;color:#1a49a3;font-weight:700;">
                                        {{ $detalle['body']['fecha'] }}
                                    </p>
                                </td>

                                <td class="stack-cell" align="center" style="padding:12px;">
                                     <img style="width:35px;"
                                                        src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                        alt="Hora">
                                    <p style="margin:0;font-size:12px;color:#64748b;font-weight:700;">Hora</p>
                                    <p style="margin:3px 0 0 0;font-size:15px;color:#1a49a3;font-weight:700;">
                                        {{ $detalle['body']['hora'] }}
                                    </p>
                                </td>

                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- INFO DEL PROFESIONAL -->
                <tr>
                    <td class="px-pad" style="padding:0 28px 12px 28px;">

                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                        style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

                        <tr>
                            <td colspan="2" style="background:#f8fbff;padding:10px 16px;border-bottom:1px solid #e2e8f0;">
                                <p style="margin:0;font-size:14px;font-weight:700;color:#1a49a3;">
                                    Profesional
                                </p>
                            </td>
                        </tr>

                        @if (isset($detalle['body']['profesional_nombre']))

                        <tr>
                            <td style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;width:35%;">
                                Nombre
                            </td>
                            <td style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['profesional_nombre'] }}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;border-bottom:1px solid #f1f5f9;">
                                Especialidad
                            </td>
                            <td style="padding:9px 16px;font-size:13px;color:#475569;border-bottom:1px solid #f1f5f9;">
                                {{ $detalle['body']['profesional_especialidad'] }}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:9px 16px;font-size:13px;color:#1a49a3;font-weight:700;">
                                Lugar
                            </td>
                            <td style="padding:9px 16px;font-size:13px;color:#475569;">
                                {{ $detalle['body']['profesional_lugar'] }}
                            </td>
                        </tr>

                        @endif

                    </table>

                </td>
            </tr>

            <!-- AVISO LINK POST-CONFIRMACION -->
            <tr>
                <td class="px-pad" style="padding:0 28px 12px 28px;">

                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="background:#f8fafc;border-radius:14px;">
                        <tr>
                            <td style="padding:12px 14px;font-size:12px;color:#64748b;line-height:18px;">
                                <strong style="color:#1a49a3;">&iquest;C&oacute;mo accedo a la consulta?</strong><br>
                                Al confirmar tu hora te enviaremos un nuevo correo con el enlace de acceso para iniciar tu consulta de telemedicina.
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>

            <!-- BOTONES CONFIRMAR / CANCELAR -->
            <tr>
                <td class="px-pad" style="padding:0 28px 12px 28px;">

                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                        <tr>

                            <!-- CONFIRMAR -->
                            <td class="btn-cell" align="center" width="50%" style="padding:0 6px 0 0;">
                                <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                style="background-color:#1a49a3;background-image:linear-gradient(90deg,#1a49a3,#31bebe);border-radius:14px;">
                                    <tr>
                                        <td align="center" style="padding:14px;">
                                            <!--[if mso]>
                                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $detalle['body']['link_confirmar'] }}" style="height:40px;v-text-anchor:middle;width:180px;" arcsize="20%" strokecolor="#1a49a3" fillcolor="#1a49a3">
                                            <w:anchorlock/>
                                            <center style="color:#ffffff;font-family:Arial,sans-serif;font-size:16px;font-weight:bold;">Confirmar Hora</center>
                                            </v:roundrect>
                                            <![endif]-->
                                            <!--[if !mso]><!-->
                                            <a href="{{ $detalle['body']['link_confirmar'] }}"
                                            style="
                                            display:inline-block;
                                            width:100%;
                                            padding:11px 10px;
                                            background:transparent;
                                            color:#ffffff;
                                            font-weight:700;
                                            font-size:16px;
                                            text-decoration:none;
                                            mso-hide:all;
                                            ">
                                            Confirmar Hora
                                            </a>
                                            <!--<![endif]-->
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <!-- CANCELAR -->
                            <td class="btn-cell" align="center" width="50%" style="padding:0 0 0 6px;">
                                <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                style="background-color:#dc2626;border-radius:14px;">
                                    <tr>
                                        <td align="center" style="padding:14px;">
                                            <!--[if mso]>
                                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $detalle['body']['link_cancelar'] }}" style="height:40px;v-text-anchor:middle;width:180px;" arcsize="20%" strokecolor="#dc2626" fillcolor="#dc2626">
                                            <w:anchorlock/>
                                            <center style="color:#ffffff;font-family:Arial,sans-serif;font-size:16px;font-weight:bold;">Cancelar Hora</center>
                                            </v:roundrect>
                                            <![endif]-->
                                            <!--[if !mso]><!-->
                                            <a href="{{ $detalle['body']['link_cancelar'] }}"
                                            style="
                                            display:inline-block;
                                            width:100%;
                                            padding:11px 10px;
                                            background:transparent;
                                            color:#ffffff;
                                            font-weight:700;
                                            font-size:16px;
                                            text-decoration:none;
                                            mso-hide:all;
                                            ">
                                            Cancelar Hora
                                            </a>
                                            <!--<![endif]-->
                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    </table>

                </td>
            </tr>

            <!-- AVISO SI YA CONFIRMO POR OTRO MEDIO -->
            <tr>
                <td class="px-pad" style="padding:0 28px 16px 28px;">

                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                    style="background-color:#eaf1fb;border-left:4px solid #1a49a3;border-radius:10px;">
                        <tr>
                            <td style="padding:14px 16px;font-size:13px;color:#1a49a3;font-weight:600;line-height:19px;">
                                Si ya confirmaste tu hora de telemedicina por otro medio, puedes ignorar este mensaje.
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

                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
