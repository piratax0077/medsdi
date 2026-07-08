<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Confirmar Hora</title>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background-color:#eef3f9;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="padding:15px;">

                    <!-- CONTENEDOR -->
                    <table border="0"
                        width="100%"
                        cellspacing="0"
                        cellpadding="0"
                        style="
                            max-width:640px;
                            background:#ffffff;
                            border-radius:30px;
                            overflow:hidden;
                            box-shadow:0 12px 45px rgba(15,23,42,0.08);
                        ">

                        <tbody>

                            <!-- TOP LINE -->
                            <tr>
                                <td style="
                                    height:7px;
                                    background:linear-gradient(90deg,#1a49a3 0%, #31bebe 100%);
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
                                        <p style="margin:0;font-size:11px; font-family:Helvetica, Arial, sans-serif;letter-spacing:2px;text-transform:uppercase;color:#31bebe;font-weight:700;">
                                            Confirmación de cita
                                        </p>
                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>

                
                            <tr>
                                <td align="center"
                                    style="
                                        padding:6px 26px 10px 26px;
                                    ">

                                    <h1 style="
                                        margin:18px 0 18px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:17px;
                                        line-height:28px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        Hola {{ $detalle['body']['nombre_paciente'] }}
                                    </h1>

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:14px;
                                        line-height:24px;
                                        color:#475569;
                                    ">

                                        Le recordamos que tiene una cita médica programada. <br>Por favor, confirme su asistencia.

                                    </p>

                                </td>
                            </tr>

                            
                            <!-- FECHA HORA -->
                            <tr>
                                <td class="px-pad" style="padding:12px 22px;">

                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                    style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

                                    <tr>

                                        <td class="stack-cell" align="center" style="padding:12px;border-right:1px solid #edf2f7;">
                                             <img style="width:35px;"
                                                                src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                                alt="Día">
                                            <p style="font-family:Helvetica, Arial, sans-serif;margin:0;font-size:12px;color:#64748b;font-weight:700;">Fecha</p>
                                            <p style="font-family:Helvetica, Arial, sans-serif;margin:3px 0 0 0;font-size:14px;color:#1a49a3;font-weight:700;">
                                                {{ $detalle['body']['fecha'] }}
                                            </p>
                                        </td>

                                        <td class="stack-cell" align="center" style="padding:12px;">
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
                        </tr>

                            <!-- INFORMACION -->
                            <tr>
                                <td style="padding:18px 26px 12px 26px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                            background:#ffffff;
                                            border:1px solid #e2e8f0;
                                            border-radius:24px;
                                            overflow:hidden;
                                        ">

                                        <tbody>

                                            <!-- HEADER -->
                                            <tr>
                                                <td colspan="2"
                                                    style="
                                                        background:#f8fbff;
                                                        padding:12px 12px;
                                                        border-bottom:1px solid #e2e8f0;
                                                    ">

                                                    <p style="
                                                        margin:0;
                                                        font-size:12px;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                    ">
                                                        INFORMACIÓN DE SU CITA
                                                    </p>

                                                </td>
                                            </tr>

                                            <!-- FILAS -->
                                            <tr>
                                                <td width="38%"
                                                    style="
                                                        text-transform: uppercase;
                                                        padding:10px 10px;
                                                        font-size:11px;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                        border-bottom:1px solid #f1f5f9;
                                                    ">
                                                    Profesional
                                                </td>

                                                <td style="
                                                    text-transform: uppercase;
                                                    padding: 10px 5px 10px 5px;
                                                    font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_nombre'] }}
                                                </td>
                                            </tr>

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    text-transform: uppercase;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    padding:10px 10px;
                                                    font-size:11px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Profesión
                                                </td>

                                                <td style="
                                                    text-transform: uppercase;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    padding: 10px 5px 10px 5px;
                                                    font-size:11px;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_especialidad'] }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="
                                                    text-transform: uppercase;
                                                    padding:10px 10px;
                                                    font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Especialidad
                                                </td>

                                                <td style="
                                                    text-transform: uppercase;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    padding: 10px 5px 10px 5px;
                                                    font-size:11px;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_tipo_especialidad'] }}
                                                </td>
                                            </tr>

                                            @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    text-transform: uppercase;
                                                    padding:10px 10px;
                                                    font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Tipo Especialidad
                                                </td>

                                                <td style="
                                                    text-transform: uppercase;
                                                    padding: 10px 5px 10px 5px;
                                                    font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}
                                                </td>
                                            </tr>

                                            @endif

                                            <tr>
                                                <td style="
                                                    text-transform: uppercase;
                                                    padding:10px 10px;
                                                    font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Lugar Atención
                                                </td>

                                                <td style="
                                                    text-transform: uppercase;
                                                    padding: 10px 5px 10px 5px;
                                                    font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    <strong>{{ $detalle['body']['lugar_atencion'] }}</strong><br>
                                                    <i>{{ $detalle['body']['direccion'] }}</i>
                                                </td>
                                            </tr>

                                            <!--<tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:10px 10px;
                                                        font-size:11px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Dirección
                                                </td>

                                                <td style="
                                                    padding:12px 22px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                ">
                                                    {{ $detalle['body']['direccion'] }}
                                                </td>
                                            </tr>-->

                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- AVISO SI YA CONFIRMO POR OTRO MEDIO -->
                            <tr>
                                <td class="px-pad" style="padding:0 28px 16px 28px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                    style="font-family:Helvetica, Arial, sans-serif;background-color:#eaf1fb;border-left:4px solid #1a49a3;border-radius:10px;">
                                        <tr>
                                            <td style="padding:14px 16px;font-size:13px;color:#1a49a3;font-weight:600;line-height:19px;">
                                                Si ya realizó la confirmación por otro medio ignorare esta notificación.<br><br>
                                                ¡RECUERDE LLEGAR 15 MINUTOS ANTES A SU CITA!
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
                                                            <center style="color:#ffffff;font-family:Arial,sans-serif;font-size:14px;font-weight:bold;">Confirmar Hora</center>
                                                            </v:roundrect>
                                                            <![endif]-->
                                                            <!--[if !mso]><!-->
                                                             <a target="_blank"
                                                                        href="{{ $detalle['body']['url_aprobacion'] }}"
                                                            style="
                                                             font-family:Helvetica, Arial, sans-serif;
                                                            display:inline-block;
                                                            width:100%;
                                                            padding:11px 0px;
                                                            background:transparent;
                                                            color:#ffffff;
                                                            font-weight:700;
                                                            font-size:14px;
                                                            text-decoration:none;
                                                            mso-hide:all;
                                                            ">
                                                            Confirmar Asistencia
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
                                                            <center style="color:#ffffff;font-family:Arial,sans-serif;font-size:14px;font-weight:bold;">Cancelar Hora</center>
                                                            </v:roundrect>
                                                            <![endif]-->
                                                            <!--[if !mso]><!-->
                                                            <a target="_blank"
                                                                        href="{{ $detalle['body']['url_rechazo'] }}"
                                                                        style="
                                                             font-family:Helvetica, Arial, sans-serif;
                                                            display:inline-block;
                                                            width:100%;
                                                            padding:11px 0px;
                                                            background:transparent;
                                                            color:#ffffff;
                                                            font-weight:700;
                                                            font-size:14px;
                                                            text-decoration:none;
                                                            mso-hide:all;
                                                            ">
                                                            No asistire
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

            


                            <!-- BOTONES 
                            <tr>
                                <td align="center"
                                    style="padding:42px 30px 38px 30px;">

                                    <table border="0"
                                        cellspacing="0"
                                        cellpadding="0">

                                        <tbody>

                                            <tr>

                                             
                                                <td align="center"
                                                    style="
                                                        border-radius:50px;
                                                        background:linear-gradient(135deg,#31bebe 0%, #1995a8 100%);
                                                        box-shadow:0 10px 25px rgba(49,190,190,0.30);
                                                    ">

                                                    <a target="_blank"
                                                        href="{{ $detalle['body']['url_aprobacion'] }}"
                                                        style="
                                                            display:inline-block;
                                                            padding:12px 34px;
                                                            font-family:Helvetica, Arial, sans-serif;
                                                            font-size:14px;
                                                            font-weight:700;
                                                            color:#ffffff;
                                                            text-decoration:none;
                                                        ">

                                                        CONFIRMO MI ASISTENCIA

                                                    </a>

                                                </td>

                                            </tr>

                                            <tr>
                                                <td height="18"></td>
                                            </tr>

                                            <tr>

                                            
                                                <td align="center"
                                                    style="
                                                        border-radius:50px;
                                                        background:linear-gradient(135deg,#ef4444 0%, #dc2626 100%);
                                                        box-shadow:0 10px 25px rgba(239,68,68,0.22);
                                                    ">

                                                    <a target="_blank"
                                                        href="{{ $detalle['body']['url_rechazo'] }}"
                                                        style="
                                                            display:inline-block;
                                                            padding:12px 42px;
                                                            font-family:Helvetica, Arial, sans-serif;
                                                            font-size:14px;
                                                            font-weight:700;
                                                            color:#ffffff;
                                                            text-decoration:none;
                                                        ">

                                                        NO ASISTIRÉ

                                                    </a>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </td>
                            </tr>-->

                            <!-- FOOTER -->
                            <tr>
                                <td style="font-family:Helvetica, Arial, sans-serif;padding:16px;text-align:center;background:#f1f5f9;">

                                    <p style="margin:0;font-size:11px;color:#64748b;line-height:16px;">
                                        Este correo fue enviado por <strong>SDI</strong><br>
                                        &copy; {{ date('Y') }} &middot; Todos los derechos reservados
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