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

                <td align="center" valign="top" style="padding:40px 15px;">

                    <!-- CONTENEDOR -->
                    <table border="0"
                        width="100%"
                        cellspacing="0"
                        cellpadding="0"
                        style="
                            max-width:640px;
                            border-radius:30px;
                            overflow:hidden;
                            box-shadow:0 12px 45px rgba(15,23,42,0.08);
                            font-family:'Segoe UI', Arial, sans-serif;
                        ">

                        <tbody>

                            <!-- TOP BAR -->
                            <tr>
                                <td style="
                                    height:7px;
                                    background:linear-gradient(90deg,#1a49a3 0%, #31bebe 100%);
                                "></td>
                            </tr>

                            <!-- HEADER -->
                            <tr>
                                <td align="center"
                                    style="
                                        padding:42px 30px 22px 30px;
                                        background:linear-gradient(180deg,#ffffff 0%, #f8fbff 100%);
                                    ">

                                    <img style="
                                            width:95px;
                           
                                            padding:14px;
                                        "
                                        src="https://www.med-sdi.cl/images/logo_pais_vertical.png"
                                        alt="Medichile">

                                </td>
                            </tr>

                            <!-- HERO -->
                            <tr>
                                <td align="center"
                                    style="padding:0 45px 20px 45px;">

                                    <p style="
                                        margin:0;
                                        font-size:13px;
                                        letter-spacing:2px;
                                        text-transform:uppercase;
                                        color:#31bebe;
                                        font-weight:700;
                                    ">
                                        Hora Médica Confirmada
                                    </p>

                                    <h2 style="
                                        margin:18px 0 12px 0;
                                        color:#0f172a;
                                        font-size:20px;
                                        line-height:42px;
                                        font-weight:700;
                                    ">

                                        Hola {{ $detalle['body']['nombre_paciente'] }}

                                    </h2>

                                    <p style="
                                        margin:0;
                                        color:#64748b;
                                        font-size:17px;
                                        line-height:30px;
                                    ">

                                        Tu hora médica fue confirmada correctamente.<br>
                                        Te esperamos en la fecha y horario programado.

                                    </p>

                                </td>
                            </tr>

                            <!-- FECHA Y HORA -->
                            <tr>
                                <td style="padding:10px 35px 10px 35px;">

                                    <table width="100%"
                                        style="
                                            background:#ffffff;
                                            border:1px solid #e2e8f0;
                                            border-radius:24px;
                                        ">

                                        <tr>

                                            <!-- FECHA -->
                                            <td width="50%"
                                                align="center"
                                                style="
                                                    padding:28px 20px;
                                                    border-right:1px solid #edf2f7;
                                                ">

                                                <img style="
                                                        width:34px;
                                                        margin-bottom:10px;
                                                    "
                                                    src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                    alt="Día">

                                                <p style="
                                                    margin:0;
                                                    font-size:14px;
                                                    font-weight: 700px;
                                                    color:#64748b;
                                                ">
                                                    Fecha
                                                </p>

                                                <p style="
                                                    margin:8px 0 0 0;
                                                    font-size:17px;
                                                    font-weight:700;
                                                    color:#1a49a3;
                                                ">
                                                    {{ $detalle['body']['fecha'] }}
                                                </p>

                                            </td>

                                            <!-- HORA -->
                                            <td width="50%"
                                                align="center"
                                                style="
                                                    padding:28px 20px;
                                                ">

                                                <img style="
                                                        width:34px;
                                                        margin-bottom:10px;
                                                    "
                                                    src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                    alt="Hora">

                                                <p style="
                                                    margin:0;
                                                    font-size:14px;
                                                    font-weight: 700px;
                                                    color:#64748b;
                                                ">
                                                    Hora
                                                </p>

                                                <p style="
                                                    margin:8px 0 0 0;
                                                    font-size:17px;
                                                    font-weight:700;
                                                    color:#1a49a3;
                                                ">
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
                                <td style="padding:0 35px 30px 35px;">

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
                                                    padding:22px 24px;
                                                    border-bottom:1px solid #e2e8f0;
                                                ">

                                                <p style="
                                                    margin:0;
                                                    font-size:18px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Información sobre su Cita
                                                </p>

                                            </td>
                                        </tr>

                                        @if (isset($detalle['body']['profesional_nombre']))

                                        <tr>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Profesional
                                            </td>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#475569;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_nombre'] }}
                                            </td>

                                        </tr>

                                        <tr style="background:#fcfdff;">

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Profesión
                                            </td>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#475569;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_especialidad'] }}
                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Especialidad
                                            </td>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#475569;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['profesional_tipo_especialidad'] }}
                                            </td>

                                        </tr>

                                        @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))

                                        <tr style="background:#fcfdff;">

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Tipo Especialidad
                                            </td>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
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
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#1a49a3;
                                                font-weight:700;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                Lugar de Atención
                                            </td>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#475569;
                                                border-bottom:1px solid #f1f5f9;
                                            ">
                                                {{ $detalle['body']['lugar_atencion'] }}
                                            </td>

                                        </tr>

                                        <tr style="background:#fcfdff;">

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#1a49a3;
                                                font-weight:700;
                                            ">
                                                Dirección
                                            </td>

                                            <td style="
                                                padding:18px 24px;
                                                font-size:14px;
                                                color:#475569;
                                            ">
                                                {{ $detalle['body']['direccion'] }}
                                            </td>

                                        </tr>

                                    </table>

                                </td>
                            </tr>

                            <!-- ALERTA -->
                            <tr>
                                <td style="padding:0 35px 30px 35px;">

                                    <table width="100%"
                                        style="
                                            background:#ecfdf5;
                                            border-left:4px solid #22c55e;
                                            border-radius:14px;
                                            padding:18px;
                                        ">

                                        <tr>
                                            <td style="
                                                font-size:14px;
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
                                <td style="
                                    background:#f1f5f9;
                                    border-top:1px solid #dbe4ee;
                                    padding:38px 40px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-size:13px;
                                        line-height:26px;
                                        color:#64748b;
                                    ">

                                        Este correo electrónico fue enviado por

                                        <br>

                                        <span style="font-weight:700;">
                                            Salud Digital Integrada
                                        </span>

                                        <br>

                                        <span style="
                                            color:#94a3b8;
                                            font-size:12px;
                                        ">
                                            © <script>document.write(new Date().getFullYear())</script> SDI · Todos los derechos reservados
                                        </span>

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
