<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hora Agendada</title>
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
                            box-shadow:0 20px 60px rgba(15,23,42,0.10);
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
                                        padding:42px 40px 18px 40px;
                                        background:linear-gradient(180deg,#ffffff 0%, #f8fbff 100%);
                                    ">

                                    <img style="width:98px;"
                                        src="https://www.med-sdi.cl/images/logo_pais_vertical.png"
                                        alt="SDI">

                                </td>
                            </tr>

                            <!-- HERO -->
                            <tr>
                                <td style="
                                    padding:0 48px 35px 48px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:13px;
                                        letter-spacing:2px;
                                        text-transform:uppercase;
                                        color:#31bebe;
                                        font-weight:700;
                                    ">
                                        Confirmación de Hora
                                    </p>

                                    <h1 style="
                                        margin:18px 0 18px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:20px;
                                        line-height:44px;
                                        letter-spacing:-1px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">

                                        Hola {{ $detalle['body']['nombre_paciente'] }}

                                    </h1>

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:18px;
                                        line-height:32px;
                                        color:#475569;
                                    ">

                                        Su hora médica ha sido agendada exitosamente.

                                        <span style="
                                            color:#1a49a3;
                                            font-weight:700;
                                        ">
                                            
                                        </span>

                                    </p>

                                </td>
                            </tr>

                            <!-- CARD FECHA Y HORA -->
                            <tr>
                                <td style="padding:0 35px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                            border-radius:24px;
                                            overflow:hidden;
                                            background:linear-gradient(135deg,#1a49a3 0%, #31bebe 100%);
                                        ">

                                        <tbody>

                                            <tr>
                                                <td align="center"
                                                    style="
                                                        padding:35px 20px;
                                                    ">

                                                    <table border="0"
                                                        cellspacing="0"
                                                        cellpadding="0">

                                                        <tbody>
                                                            <tr>

                                                                <!-- FECHA -->
                                                                <td align="center"
                                                                    style="padding:0 25px;">

                                                                    <img style="
                                                                        width:42px;
                                                                        margin-bottom:12px;
                                                                    "
                                                                    src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                                    alt="Fecha">

                                                                    <p style="
                                                                        margin:0;
                                                                        font-family:Helvetica, Arial, sans-serif;
                                                                        font-size:14px;
                                                                        color:#dbeafe;
                                                                    ">
                                                                        Fecha
                                                                    </p>

                                                                    <p style="
                                                                        margin:8px 0 0 0;
                                                                        font-family:Helvetica, Arial, sans-serif;
                                                                        font-size:17px;
                                                                        color:#ffffff;
                                                                        font-weight:700;
                                                                    ">
                                                                        {{ $detalle['body']['fecha'] }}
                                                                    </p>

                                                                </td>

                                                                <!-- DIVIDER -->
                                                                <td width="1"
                                                                    style="
                                                                        background:rgba(255,255,255,0.2);
                                                                    ">
                                                                </td>

                                                                <!-- HORA -->
                                                                <td align="center"
                                                                    style="padding:0 25px;">

                                                                    <img style="
                                                                        width:42px;
                                                                        margin-bottom:12px;
                                                                    "
                                                                    src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                                    alt="Hora">

                                                                    <p style="
                                                                        margin:0;
                                                                        font-family:Helvetica, Arial, sans-serif;
                                                                        font-size:14px;
                                                                        color:#dbeafe;
                                                                    ">
                                                                        Hora
                                                                    </p>

                                                                    <p style="
                                                                        margin:8px 0 0 0;
                                                                        font-family:Helvetica, Arial, sans-serif;
                                                                        font-size:17px;
                                                                        color:#ffffff;
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

                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- ESPACIO -->
                            <tr>
                                <td height="30"></td>
                            </tr>

                            <!-- INFORMACION CITA -->
                            <tr>
                                <td style="padding:0 35px;">

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
                                                <td style="
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
                                                        Información de tu cita
                                                    </p>

                                                </td>
                                            </tr>

                                            <!-- CONTENIDO -->
                                            <tr>
                                                <td style="
                                                    padding:28px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:15px;
                                                    line-height:30px;
                                                    color:#475569;
                                                ">

                                                    <b style="color:#1a49a3;">Profesional:</b><br>
                                                    {{ $detalle['body']['profesional_nombre'] }}<br><br>

                                                    <b style="color:#1a49a3;">Profesión:</b><br>
                                                    {{ $detalle['body']['profesional_especialidad'] }}<br><br>

                                                    <b style="color:#1a49a3;">Especialidad:</b><br>
                                                    {{ $detalle['body']['profesional_tipo_especialidad'] }}<br><br>

                                                    @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))
                                                        <b style="color:#1a49a3;">Tipo Especialidad:</b><br>
                                                        {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}<br><br>
                                                    @endif

                                                    <b style="color:#1a49a3;">Lugar de Atención:</b><br>
                                                    {{ $detalle['body']['lugar_atencion'] }}<br><br>

                                                    <b style="color:#1a49a3;">Dirección:</b><br>
                                                    {{ $detalle['body']['direccion'] }}

                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- ALERTA -->
                            <tr>
                                <td style="padding:35px 40px 15px 40px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                            background:#fff7ed;
                                            border:1px solid #fed7aa;
                                            border-radius:20px;
                                        ">

                                        <tbody>
                                            <tr>
                                                <td style="
                                                    padding:22px 24px;
                                                    text-align:center;
                                                ">

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:15px;
                                                        line-height:28px;
                                                        color:#9a3412;
                                                        font-weight:700;
                                                    ">

                                                        ¡Recuerde confirmar previamente su hora y llegar 15 minutos antes a su cita!

                                                    </p>

                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <!-- FOOTER -->
                            <tr>
                                <td style="
                                    background:#f1f5f9;
                                    border-top:1px solid #dbe4ee;
                                    padding:45px 40px;
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
