<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hora Confirmada</title>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <table border="0" width="100%" cellspacing="0" cellpadding="0">
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
                            border-radius:30px;
                            overflow:hidden;
                            background:#ffffff;
                            box-shadow:0 12px 45px rgba(15,23,42,0.08);
                            font-family:'Segoe UI', Arial, sans-serif;
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
                                                    Hora Confirmada
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
                                        font-size:15px;
                                        line-height:28px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        Hola {{ $detalle['body']['nombre_paciente'] }}
                                    </h1>

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:13px;
                                        line-height:24px;
                                        color:#475569;
                                    ">

                                       Tu hora médica fue confirmada correctamente.<br>
                                        Te esperamos en la fecha y horario programado.

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

                            <tr>
                                <td height="20"></td>
                            </tr>

                            <!-- INFORMACION -->
                            <tr>
                                <td style="padding:0 20px 20px 20px;">

                                    <table width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                            background:#ffffff;
                                            border:1px solid #e2e8f0;
                                            border-radius:24px;
                                            overflow:hidden;
                                        ">

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
                                                ">
                                                    INFORMACIÓN DE SU CITA
                                                </p>

                                            </td>
                                        </tr>

                                        @if (isset($detalle['body']['profesional_nombre']))

                                        <tr>

                                            <td style="
                                                padding:10px 10px;
                                                font-size:11px;
                                                color:#1a49a3;
                                                text-transform: uppercase;
                                                font-weight:700;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Profesional
                                            </td>

                                            <td style="
                                                padding: 10px 5px 10px 5px;
                                                font-size:11px;
                                                color:#475569;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_nombre'] }}
                                            </td>

                                        </tr>

                                        <tr style="background:#fcfdff;">

                                            <td style="
                                               padding:10px 10px;
                                                font-size:11px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Profesión
                                            </td>

                                            <td style="
                                                padding: 10px 5px 10px 5px;
                                                font-size:11px;
                                                color:#475569;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_especialidad'] }}
                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="
                                                padding:10px 10px;
                                                font-size:11px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Especialidad
                                            </td>

                                            <td style="
                                                padding: 10px 5px 10px 5px;
                                                font-size:11px;
                                                color:#475569;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_tipo_especialidad'] }}
                                            </td>

                                        </tr>

                                        @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))

                                        <tr style="background:#fcfdff;">

                                            <td style="
                                                padding:10px 10px;
                                                font-size:11px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Tipo Especialidad
                                            </td>

                                            <td style="
                                                padding: 10px 5px 10px 5px;
                                                font-size:11px;
                                                color:#475569;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}
                                            </td>

                                        </tr>

                                        @endif

                                        @endif

                                        <tr>

                                            <td style="
                                                padding:10px 10px;
                                                font-size:11px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Lugar de Atención
                                            </td>

                                            <td style="
                                                padding: 10px 5px 10px 5px;
                                                font-size:11px;
                                                color:#475569;
                                                text-transform: uppercase;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                <strong>{{ $detalle['body']['lugar_atencion'] }}</strong><br>
                                                 <i>{{ $detalle['body']['direccion'] }}</i>
                                            </td>

                                        </tr>

                                        <!--<tr style="background:#fcfdff;">

                                            <td style="
                                                padding:12px 12px;
                                                font-size:11px;
                                                color:#1a49a3;
                                                font-weight:700;
                                            ">
                                                Dirección
                                            </td>

                                            <td style="
                                                padding:12px 12px;
                                                font-size:11px;
                                                color:#475569;
                                            ">
                                                {{ $detalle['body']['direccion'] }}
                                            </td>

                                        </tr>-->

                                    </table>

                                </td>
                            </tr>

                            <!-- ALERTA -->
                            <tr>
                                <td style="padding:0 10px 10px 10px;">

                                    <table width="100%"
                                        style="
                                            background:#ecfdf5;
                                            border-left:4px solid #22c55e;
                                            border-radius:12px;
                                            padding:7px 10px;
                                        ">

                                        <tr>
                                            <td style="
                                                font-size:12px;
                                                color:#166534;
                                                line-height:24px;
                                            ">

                                                <strong>Importante:</strong><br>
                                                Recuerde llegar 15 minutos antes de su atención médica.

                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>

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