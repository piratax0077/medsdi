<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Invitación de Registro</title>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background-color:#eef3f9;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="padding:45px 15px;">

                    <!-- CONTENEDOR -->
                    <table border="0" width="100%" cellspacing="0" cellpadding="0"
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
                            <!-- HEADER HORIZONTAL -->
                                <tr>
    <td style="padding:30px 40px 20px 40px;">

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>

                <!-- LOGO -->
                <td align="left" valign="middle" width="90">

                    <img
                        src="https://www.med-sdi.cl/images/sdi-color-h.svg"
                        alt="SDI"
                        style="width:120px; display:block;">

                </td>

                <!-- TITULO -->
                <td align="right" valign="middle">

                    <p style="
                        margin:0;
                        font-family:Helvetica, Arial, sans-serif;
                        font-size:14px;
                        letter-spacing:2px;
                        text-transform:uppercase;
                        color:#31bebe;
                        font-weight:700;
                    ">
                        Invitación Profesional
                    </p>

                </td>

            </tr>
        </table>

    </td>
                                </tr>

                                <!-- HERO -->
                             <tr>
            <td style="
                padding:0 48px 20px 48px;
                text-align:center;
            ">

                            
                            <tr>
                                <td style="
                                    padding:0 48px 30px 48px;
                                    text-align:center;
                                ">

                                    
                                    <h1 style="
                                        margin:5px 0 18px 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:20px;
                                        line-height:46px;
                                        letter-spacing:-1px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        Hola {{ strtoupper($detalle['body']['nombre']) }}
                                    </h1>

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:16px;
                                        line-height:20px;
                                        color:#475569;
                                    ">

                                        Has sido invitado por

                                        <span style="
                                            color:#1a49a3;
                                            font-weight:700;
                                        ">
                                            {{ strtoupper($detalle['body']['lugar_atencion']) }}
                                        </span>

                                        para integrarte al sistema

                                        <span style="
                                            font-weight:700;
                                            color:#1a49a3;
                                        ">
                                            SDI
                                        </span>.

                                    </p>

                                   <!-- <p style="
                                        margin:30px 0 0 0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:16px;
                                        line-height:30px;
                                        color:#64748b;
                                    ">

                                        Completa tu incorporación y accede a tu escritorio profesional para gestionar agendas, pacientes y atenciones desde una sola plataforma.

                                    </p>-->

                                </td>
                            </tr>

                                 <!-- BOTONES -->
                            <tr>
                                <td align="center"
                                    style="padding:0px 30px 35px 30px;">

                                    <table border="0"
                                        cellspacing="0"
                                        cellpadding="0">

                                        <tbody>
                                            <tr>

                                                <!-- ACEPTAR -->
                                                <td align="center"
                                                    style="
                                                        border-radius:50px;
                                                        background:linear-gradient(135deg,#31bebe 0%, #1995a8 100%);
                                                        box-shadow:0 10px 25px rgba(49,190,190,0.30);
                                                    ">

                                                    <a target="_blank"
                                                        href="{{ route('invitacion.convenio.profesional.confirmacion_rechazo', [ 'inv' => $detalle['body']['invitacion_token'], 'tpi' => '1', 'id_profesional' => $detalle['body']['id_profesional'] ]) }}"
                                                        style="
                                                            display:inline-block;
                                                            padding:18px 38px;
                                                            font-family:Helvetica, Arial, sans-serif;
                                                            font-size:16px;
                                                            font-weight:700;
                                                            color:#ffffff;
                                                            text-decoration:none;
                                                        ">

                                                        Aceptar Invitación

                                                    </a>

                                                </td>

                                                <td width="16"></td>

                                                <!-- RECHAZAR -->
                                                <td align="center"
                                                    style="
                                                        border-radius:50px;
                                                        background:linear-gradient(135deg,#fb7185 0%, #e11d48 100%);
                                                        box-shadow:0 10px 25px rgba(225,29,72,0.18);
                                                    ">

                                                    <a target="_blank"
                                                        href="{{ route('invitacion.convenio.profesional.confirmacion_rechazo', [ 'inv' => $detalle['body']['invitacion_token'], 'tpi' => '2', 'id_profesional' => $detalle['body']['id_profesional'] ]) }}"
                                                        style="
                                                            display:inline-block;
                                                            padding:18px 34px;
                                                            font-family:Helvetica, Arial, sans-serif;
                                                            font-size:16px;
                                                            font-weight:700;
                                                            color:#ffffff;
                                                            text-decoration:none;
                                                        ">

                                                        Rechazar

                                                    </a>

                                                </td>

                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>


                            <!-- INFORMACION -->
                            <tr>
                                <td style="padding:0 35px 20px 35px;">

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
                                                        padding:15px 24px;
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
                                                        Información de Convenio
                                                    </p>

                                                </td>
                                            </tr>

                                            <!-- FILAS -->
                                            <tr>
                                                <td width="38%"
                                                    style="
                                                        padding:10px 24px;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:14px;
                                                        color:#1a49a3;
                                                        font-weight:700;
                                                        border-bottom:1px solid #f1f5f9;
                                                    ">
                                                    Institución
                                                </td>

                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ isset($detalle['body']['convenio']['Institucion']['nombre']) ? $detalle['body']['convenio']['Institucion']['nombre'] : '' }}
                                                </td>
                                            </tr>

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Lugar Atención
                                                </td>

                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ isset($detalle['body']['convenio']['LugarAtencion']['nombre']) ? $detalle['body']['convenio']['LugarAtencion']['nombre'] : '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    Tipo Convenio
                                                </td>

                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                    border-bottom:1px solid #f1f5f9;
                                                ">
                                                    {{ isset($detalle['body']['convenio']['TipoConvenioInstitucion']['nombre']) ? $detalle['body']['convenio']['TipoConvenioInstitucion']['nombre'] : '' }}
                                                </td>
                                            </tr>

                                            @if (isset($detalle['body']['convenio']['id_tipo_convenio_institucion']) && $detalle['body']['convenio']['id_tipo_convenio_institucion'] == 1)

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Cobro Fijo
                                                </td>

                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                ">
                                                    {{ isset($detalle['body']['convenio']['fijo']) ? $detalle['body']['convenio']['fijo'] : '' }}
                                                </td>
                                            </tr>

                                            @elseif (isset($detalle['body']['convenio']['id_tipo_convenio_institucion']) && $detalle['body']['convenio']['id_tipo_convenio_institucion'] == 2)

                                            <tr style="background:#fcfdff;">
                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Porcentaje Atenciones
                                                </td>

                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                ">
                                                    {{ isset($detalle['body']['convenio']['atencion']) ? $detalle['body']['convenio']['atencion'] : '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    Confirmación Agenda
                                                </td>

                                                <td style="
                                                    padding:10px 24px;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#475569;
                                                ">
                                                    {{ isset($detalle['body']['convenio']['confirmacion_agenda']) ? $detalle['body']['convenio']['confirmacion_agenda'] : '' }}
                                                </td>
                                            </tr>

                                            @endif

                                        </tbody>
                                    </table>

                                </td>
                            </tr>

                       
                            <!-- FOOTER -->
                            <tr>
                                <td style="
                                    background:#f1f5f9;
                                    border-top:1px solid #dbe4ee;
                                    padding:20px 30px;
                                    text-align:center;
                                ">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:13px;
                                        line-height:26px;
                                        color:#64748b;
                                    ">


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
