<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hora Cancelada</title>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background-color:#eef3f9;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="padding:45px 15px;">

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
                                <td align="center"
                                    style="
                                        padding:42px 40px 20px 40px;
                                       
                                    ">

                                    <img style="width:95px;"
                                        src="https://www.med-sdi.cl/images/logo_pais_vertical.png"
                                        alt="SDI">

                                </td>
                            </tr>

                            <!-- HERO -->
                            <tr>
                                <td style="
                                    padding:0 48px 38px 48px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:13px;
                                        letter-spacing:2px;
                                        text-transform:uppercase;
                                        color:#ef4444;
                                        font-weight:700;
                                    ">
                                        Hora Médica Cancelada
                                    </p>

                                    <h1 style="
                                        margin:18px 0 18px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:34px;
                                        line-height:44px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        Estimado/a Paciente
                                    </h1>

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:20px;
                                        line-height:38px;
                                        color:#1a49a3;
                                        font-weight:700;
                                    ">
                                        {{ $detalle['body']['nombre_paciente'] }}
                                    </p>

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                            margin-top:32px;
                                            background:linear-gradient(135deg,#ef4444 0%, #dc2626 100%);
                                            border-radius:24px;
                                            box-shadow:0 10px 30px rgba(239,68,68,0.20);
                                        ">

                                        <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="
                                                        padding:28px 25px;
                                                    ">

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:28px;
                                                        line-height:40px;
                                                        color:#ffffff;
                                                        font-weight:700;
                                                    ">
                                                        Su hora médica ha sido cancelada exitosamente
                                                    </p>

                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- FECHA Y HORA -->
                            <tr>
                                <td align="center"
                                    style="padding:0 35px 35px 35px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0">

                                        <tbody>
                                            <tr>

                                                <!-- FECHA -->
                                                <td width="48%"
                                                    align="center"
                                                    style="
                                                        background:#f8fbff;
                                                        border:1px solid #dbeafe;
                                                        border-radius:24px;
                                                        padding:28px 20px;
                                                    ">

                                                    <img style="width:42px;"
                                                        src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                        alt="Fecha">

                                                    <p style="
                                                        margin:16px 0 6px 0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:13px;
                                                        letter-spacing:1px;
                                                        text-transform:uppercase;
                                                        color:#64748b;
                                                        font-weight:700;
                                                    ">
                                                        Fecha
                                                    </p>

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:22px;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                    ">
                                                        {{ $detalle['body']['fecha'] }}
                                                    </p>

                                                </td>

                                                <td width="18"></td>

                                                <!-- HORA -->
                                                <td width="48%"
                                                    align="center"
                                                    style="
                                                        background:#f8fbff;
                                                        border:1px solid #dbeafe;
                                                        border-radius:24px;
                                                        padding:28px 20px;
                                                    ">

                                                    <img style="width:42px;"
                                                        src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                        alt="Hora">

                                                    <p style="
                                                        margin:16px 0 6px 0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:13px;
                                                        letter-spacing:1px;
                                                        text-transform:uppercase;
                                                        color:#64748b;
                                                        font-weight:700;
                                                    ">
                                                        Hora
                                                    </p>

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:22px;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                    ">
                                                        {{ $detalle['body']['hora'] }}
                                                    </p>

                                                </td>

                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- INFORMACION -->
                            <tr>
                                <td style="padding:0 35px 30px 35px;">

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
                                                        padding:22px 24px;
                                                        background:#f8fbff;
                                                        border-bottom:1px solid #e2e8f0;
                                                    ">

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:18px;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                    ">
                                                        Información de la Cita
                                                    </p>

                                                </td>
                                            </tr>

                                            @if (isset($detalle['body']['profesional_nombre']))

                                            <tr>
                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Profesional
                                                </td>

                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
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
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Profesión
                                                </td>

                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
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
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Especialidad
                                                </td>

                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
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
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Tipo Especialidad
                                                </td>

                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
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
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Lugar Atención
                                                </td>

                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
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
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Dirección
                                                </td>

                                                <td style="
                                                    padding:18px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                ">
                                                    {{ $detalle['body']['direccion'] }}
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- MENSAJE -->
                            <tr>
                                <td style="
                                    padding:0 45px 40px 45px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:17px;
                                        line-height:32px;
                                        color:#64748b;
                                    ">
                                        Si necesita reagendar una nueva atención médica, puede hacerlo directamente desde la plataforma o comunicándose con el centro de atención.
                                    </p>

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
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:13px;
                                        line-height:26px;
                                        color:#64748b;
                                    ">

                                        Este correo fue enviado por

                                        <span style="
                                            font-weight:700;
                                        ">
                                            Salud Digital Integrada
                                        </span>

                                        <br>

                                        <span style="
                                            color:#94a3b8;
                                            font-size:12px;
                                        ">
                                            ©{{ date('Y') }} SDI · Todos los derechos reservados
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
