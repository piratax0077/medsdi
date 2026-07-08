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
                                        padding:42px 40px 18px 40px;
                                        background:linear-gradient(180deg,#ffffff 0%, #f8fbff 100%);
                                    ">

                                    <img style="width:98px;"
                                        src="https://www.med-sdi.cl/images/logo_pais_vertical.png"
                                        alt="Medichile">

                                </td>
                            </tr>

                            <!-- HERO -->
                            <tr>
                                <td align="center"
                                    style="
                                        padding:0 48px 38px 48px;
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
                                        Confirmación de Cita
                                    </p>

                                    <h1 style="
                                        margin:18px 0 18px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:20px;
                                        line-height:44px;
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

                                        Le recordamos que tiene una cita médica programada.

                                    </p>

                                    <p style="
                                        margin:22px 0 0 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:16px;
                                        line-height:30px;
                                        color:#64748b;
                                    ">

                                        Necesitamos que confirme su asistencia para mantener activa su atención médica.

                                    </p>

                                </td>
                            </tr>

                            <!-- FECHA Y HORA -->
                            <tr>
                                <td align="center"
                                    style="padding:0 35px 10px 35px;">

                                    <table border="0"
                                        width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                            background:linear-gradient(135deg,#1a49a3 0%, #31bebe 100%);
                                            border-radius:24px;
                                            overflow:hidden;
                                        ">

                                        <tbody>
                                            <tr>

                                                <!-- FECHA -->
                                                <td width="50%"
                                                    align="center"
                                                    style="
                                                        padding:30px 15px;
                                                        border-right:1px solid rgba(255,255,255,0.12);
                                                    ">

                                                    <img style="width:42px;"
                                                        src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                        alt="Día">

                                                    <p style="
                                                        margin:15px 0 5px 0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:13px;
                                                        letter-spacing:1px;
                                                        text-transform:uppercase;
                                                        color:rgba(255,255,255,0.70);
                                                    ">
                                                        Fecha
                                                    </p>

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:17px;
                                                        font-weight:700;
                                                        color:#ffffff;
                                                    ">
                                                        {{ $detalle['body']['fecha'] }}
                                                    </p>

                                                </td>

                                                <!-- HORA -->
                                                <td width="50%"
                                                    align="center"
                                                    style="
                                                        padding:30px 15px;
                                                    ">

                                                    <img style="width:42px;"
                                                        src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                        alt="Hora">

                                                    <p style="
                                                        margin:15px 0 5px 0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:13px;
                                                        letter-spacing:1px;
                                                        text-transform:uppercase;
                                                        color:rgba(255,255,255,0.70);
                                                    ">
                                                        Hora
                                                    </p>

                                                    <p style="
                                                        margin:0;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:17px;
                                                        font-weight:700;
                                                        color:#ffffff;
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
                                <td style="padding:20px 35px 10px 35px;">

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
                                                        Información de tu Cita
                                                    </p>

                                                </td>
                                            </tr>

                                            <!-- FILAS -->
                                            <tr>
                                                <td width="38%"
                                                    style="
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

                            <!-- ALERTAS -->
                            <tr>
                                <td align="center"
                                    style="padding:30px 45px 10px 45px;">

                                    <p style="
                                        margin:0 0 18px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:17px;
                                        line-height:30px;
                                        color:#1a49a3;
                                        font-weight:700;
                                    ">
                                        ¡SI YA REALIZÓ LA CONFIRMACIÓN POR OTRO MEDIO ROGAMOS IGNORAR ESTA NOTIFICACIÓN!
                                    </p>

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:17px;
                                        line-height:30px;
                                        color:#1a49a3;
                                        font-weight:700;
                                    ">
                                        ¡RECUERDE LLEGAR 15 MINUTOS ANTES A SU CITA!
                                    </p>

                                </td>
                            </tr>

                            <!-- BOTONES -->
                            <tr>
                                <td align="center"
                                    style="padding:42px 30px 38px 30px;">

                                    <table border="0"
                                        cellspacing="0"
                                        cellpadding="0">

                                        <tbody>

                                            <tr>

                                                <!-- CONFIRMAR -->
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
                                                            padding:18px 34px;
                                                            font-family:Helvetica, Arial, sans-serif;
                                                            font-size:16px;
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

                                                <!-- RECHAZAR -->
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
                                                            padding:18px 42px;
                                                            font-family:Helvetica, Arial, sans-serif;
                                                            font-size:16px;
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

                                        Este correo electrónico fue enviado por

                                        <br>

                                        <span style="
                                            font-weight:700;
                                        ">
                                            Salud Digital Integrada
                                        </span>

                                        <br><br>

                                        <span style="
                                            color:#94a3b8;
                                            font-size:12px;
                                        ">
                                            ©<script>document.write(new Date().getFullYear())</script> SDI · Todos los derechos reservados
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
