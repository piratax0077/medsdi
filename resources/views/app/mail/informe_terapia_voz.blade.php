<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Informe</title>
</head>

<body style="margin:0; padding:0; background:#eef3f9; font-family:Helvetica, Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#eef3f9;">
<tr>
<td align="center" style="padding:40px 15px;">

<!-- CONTENEDOR -->
<table width="100%"
       cellpadding="0"
       cellspacing="0"
       style="
            max-width:640px;
            background:#ffffff;
            border-radius:30px;
            overflow:hidden;
            box-shadow:0 12px 45px rgba(15,23,42,0.08);
       ">

<!-- TOP LINE -->
<tr>
    <td style="
        height:7px;
        background:linear-gradient(90deg,#1a49a3 0%, #31bebe 100%);
    "></td>
</tr>

<!-- HEADER -->
<tr>
    <td>

        <table width="100%"
               cellpadding="0"
               cellspacing="0"
               style="
                    background:linear-gradient(145deg,#1a49a3 0%, #4775c4 100%);
               ">

            <tr>
                <td style="padding:42px 35px; text-align:center;">

                    <img src="https://www.med-sdi.cl/images/sdi-white-v.svg"
                         width="100"
                         style="display:block; margin:auto;">

                    <p style="
                        margin:24px 0 10px 0;
                        font-size:13px;
                        letter-spacing:2px;
                        text-transform:uppercase;
                        color:rgba(255,255,255,0.75);
                        font-weight:700;
                    ">
                        Documento Clínico
                    </p>

                    <h1 style="
                        color:#ffffff;
                        margin:0;
                        font-size:30px;
                        line-height:40px;
                        font-weight:700;
                    ">
                        {{ $detalle['body']['tipo_examen'] == 'vppb' ? 'Informe de Tratamiento VPPB' : 'Informe de Terapia de Voz' }}
                    </h1>

                </td>
            </tr>

        </table>

    </td>
</tr>

<!-- SALUDO -->
<tr>
    <td style="
        padding:38px 40px 10px 40px;
        color:#0f172a;
        font-size:16px;
        line-height:30px;
    ">

        Hola <strong>{{ $detalle['body']['nombre_destinatario'] }}</strong>,

    </td>
</tr>

<!-- TEXTO -->
<tr>
    <td style="
        padding:0 40px 30px 40px;
        color:#475569;
        font-size:16px;
        line-height:30px;
    ">

        Te enviamos el informe de

        <strong style="color:#1a49a3;">
            {{ $detalle['body']['tipo_examen'] == 'vppb' ? 'tratamiento VPPB' : 'terapia de voz' }}
        </strong>

        @if($detalle['body']['es_paciente'])

            correspondiente a tu atención médica.

        @else

            del paciente
            <strong>{{ $detalle['body']['nombre_paciente'] }}</strong>.

        @endif

    </td>
</tr>

<!-- INFORMACION -->
<tr>
    <td style="padding:0 35px 30px 35px;">

        <table width="100%"
               cellpadding="0"
               cellspacing="0"
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
                        font-size:18px;
                        color:#1a49a3;
                        font-weight:700;
                    ">
                        Información del Informe
                    </p>

                </td>
            </tr>

            <!-- PACIENTE -->
            <tr>
                <td width="38%"
                    style="
                        padding:18px 24px;
                        font-size:14px;
                        color:#1a49a3;
                        font-weight:700;
                        border-bottom:1px solid #f1f5f9;
                    ">
                    Paciente
                </td>

                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#475569;
                    border-bottom:1px solid #f1f5f9;
                ">
                    {{ $detalle['body']['nombre_paciente'] }}
                </td>
            </tr>

            <!-- PROFESIONAL -->
            <tr style="background:#fcfdff;">
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
                    {{ $detalle['body']['nombre_profesional'] }}
                </td>
            </tr>

            <!-- FECHA -->
            <tr>
                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#1a49a3;
                    font-weight:700;
                    border-bottom:1px solid #f1f5f9;
                ">
                    Fecha del Informe
                </td>

                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#475569;
                    border-bottom:1px solid #f1f5f9;
                ">
                    {{ $detalle['body']['fecha_informe'] }}
                </td>
            </tr>

            <!-- TIPO -->
            <tr style="background:#fcfdff;">
                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#1a49a3;
                    font-weight:700;
                    border-bottom:1px solid #f1f5f9;
                ">
                    Tipo
                </td>

                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#475569;
                    border-bottom:1px solid #f1f5f9;
                ">
                    {{ $detalle['body']['tipo_examen'] == 'vppb' ? 'Tratamiento VPPB' : 'Terapia de Voz' }}
                </td>
            </tr>

            @if(isset($detalle['body']['lugar_atencion']))

            <!-- LUGAR -->
            <tr>
                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#1a49a3;
                    font-weight:700;
                ">
                    Lugar
                </td>

                <td style="
                    padding:18px 24px;
                    font-size:14px;
                    color:#475569;
                ">
                    {{ $detalle['body']['lugar_atencion'] }}
                </td>
            </tr>

            @endif

            </tbody>

        </table>

    </td>
</tr>

<!-- RESUMEN -->
@if($detalle['body']['total_sesiones'] > 0)

<tr>
    <td style="padding:0 35px 25px 35px;">

        <table width="100%"
               cellpadding="0"
               cellspacing="0"
               style="
                    background:#eef4ff;
                    border-left:5px solid #1a49a3;
                    border-radius:18px;
               ">

            <tr>
                <td style="
                    padding:22px 24px;
                    font-size:15px;
                    color:#1e3a8a;
                    line-height:28px;
                ">

                    <strong style="font-size:16px;">
                        Resumen del tratamiento
                    </strong>

                    <br>

                    Total de sesiones:
                    <strong>{{ $detalle['body']['total_sesiones'] }}</strong>

                </td>
            </tr>

        </table>

    </td>
</tr>

@endif

<!-- MENSAJE -->
<tr>
    <td style="
        padding:0 40px 25px 40px;
        font-size:15px;
        line-height:30px;
        color:#475569;
    ">

        El informe completo se encuentra adjunto en formato PDF.

    </td>
</tr>

<!-- ALERTA -->
@if($detalle['body']['es_paciente'])

<tr>
    <td style="padding:0 35px 30px 35px;">

        <table width="100%"
               cellpadding="0"
               cellspacing="0"
               style="
                    background:#fff7ed;
                    border-left:5px solid #f97316;
                    border-radius:18px;
               ">

            <tr>
                <td style="
                    padding:20px 22px;
                    font-size:14px;
                    line-height:26px;
                    color:#9a3412;
                ">

                    <strong>Información Confidencial</strong>

                    <br>

                    Este documento contiene información médica confidencial. Manténgalo seguro.

                </td>
            </tr>

        </table>

    </td>
</tr>

@endif

<!-- DESPEDIDA -->
<tr>
    <td style="
        padding:0 40px 40px 40px;
        font-size:15px;
        line-height:30px;
        color:#475569;
    ">

        Si tienes alguna duda, puedes responder este correo.

        <br><br>

        Saludos,
        <br>

        <strong style="color:#1a49a3;">
            Equipo MED-SDI
        </strong>

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

            Este correo fue enviado por

            <a href="https://med-sdi.cl/ingreso"
               style="
                    text-decoration:none;
                    font-weight:700;
               ">

                Salud Digital Integrada

            </a>

            <br>

            <span style="
                font-size:12px;
            ">
                © {{ date('Y') }} SDI · Todos los derechos reservados
            </span>

        </p>

    </td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
