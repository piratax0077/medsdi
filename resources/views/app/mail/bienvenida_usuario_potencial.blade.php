<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bienvenido a SDI</title>
</head>

<body style="margin:0; padding:0; background:#edf3fb;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#edf3fb;">
<tr>
<td align="center" style="padding:45px 15px;">

<!-- CONTENEDOR -->
<table width="100%" style="
    max-width:620px;
    font-family: Helvetica, Arial, sans-serif;
    background:#ffffff;
    border-radius:32px;
    overflow:hidden;
    box-shadow:0 18px 45px rgba(15,23,42,0.10);
;">

    <!-- HEADER -->
    <tr>
        <td style="
            background:linear-gradient(180deg,#1a49a3 0%, #12377b 100%);
            padding:55px 35px 50px 35px;
            text-align:center;
            position:relative;
        ">

            <div style="
                width:120px;
                height:120px;
                margin:0 auto 24px auto;
                border-radius:30px;
                text-align:center;
                line-height:120px;
            ">

                <img style="
                    width:95px;
                    vertical-align:middle;
                " src="https://www.med-sdi.cl/images/sdi-white-v.svg" alt="Medichile">

            </div>

            <p style="
                margin:0;
                color:#ffffff;
                font-size:30px;
                font-weight:700;
                letter-spacing:0.4px;
            ">
                Bienvenido a SDI
            </p>

            <p style="
                margin:14px 0 0 0;
                color:rgba(255,255,255,0.82);
                font-size:15px;
                line-height:28px;
            ">
                Plataforma integral para la gestión médica moderna
            </p>

        </td>
    </tr>

    <!-- HERO -->
    <tr>
        <td style="
            padding:50px 42px 25px 42px;
            text-align:center;
        ">

            <div style="
                display:inline-block;
                padding:8px 18px;
                border-radius:50px;
                background:#e0f7f7;
                color:#009393;
                font-size:12px;
                font-weight:700;
                letter-spacing:1.8px;
                text-transform:uppercase;
            ">
                Solicitud Recibida
            </div>

            <h1 style="
                margin:28px 0 22px 0;
                color:#0f172a;
                font-size:20px;
                line-height:42px;
                font-weight:700;
            ">
                ¡Hola, {{ $detalle['body']['nombre'] }}!
            </h1>

            <p style="
                margin:0;
                font-size:17px;
                line-height:34px;
                color:#475569;
            ">
                Hemos recibido tu solicitud correctamente.<br><br>

                Pronto uno de nuestros asesores se pondrá en contacto contigo para ayudarte a conocer todas las funcionalidades de SDI y cómo optimizar la gestión de tu centro médico.
            </p>

        </td>
    </tr>

    <!-- BENEFICIOS -->
    <tr>
        <td style="padding:0 35px 40px 35px;">

            <table width="100%" cellpadding="0" cellspacing="0">

                <tr>
                    <td style="
                        background:linear-gradient(180deg,#f8fcff 0%, #eef8ff 100%);
                        border:1px solid #e2e8f0;
                        border-radius:20px;
                        padding:20px 22px;
                        font-size:15px;
                        color:#334155;
                        box-shadow:0 5px 14px rgba(15,23,42,0.04);
                    ">
                        ✔ Gestión de agenda médica y horas de atención
                    </td>
                </tr>

                <tr><td height="15"></td></tr>

                <tr>
                    <td style="
                        background:linear-gradient(180deg,#f8fcff 0%, #eef8ff 100%);
                        border:1px solid #e2e8f0;
                        border-radius:20px;
                        padding:20px 22px;
                        font-size:15px;
                        color:#334155;
                        box-shadow:0 5px 14px rgba(15,23,42,0.04);
                    ">
                        ✔ Fichas clínicas electrónicas con múltiples especialidades
                    </td>
                </tr>

                <tr><td height="15"></td></tr>

                <tr>
                    <td style="
                        background:linear-gradient(180deg,#f8fcff 0%, #eef8ff 100%);
                        border:1px solid #e2e8f0;
                        border-radius:20px;
                        padding:20px 22px;
                        font-size:15px;
                        color:#334155;
                        box-shadow:0 5px 14px rgba(15,23,42,0.04);
                    ">
                        ✔ Portal del paciente: resultados, recetas y documentos
                    </td>
                </tr>

                <tr><td height="15"></td></tr>

                <tr>
                    <td style="
                        background:linear-gradient(180deg,#f8fcff 0%, #eef8ff 100%);
                        border:1px solid #e2e8f0;
                        border-radius:20px;
                        padding:20px 22px;
                        font-size:15px;
                        color:#334155;
                        box-shadow:0 5px 14px rgba(15,23,42,0.04);
                    ">
                        ✔ Telemedicina, laboratorio, farmacia y gestión clínica completa
                    </td>
                </tr>

                <tr><td height="15"></td></tr>

                <tr>
                    <td style="
                        background:linear-gradient(180deg,#f8fcff 0%, #eef8ff 100%);
                        border:1px solid #e2e8f0;
                        border-radius:20px;
                        padding:20px 22px;
                        font-size:15px;
                        color:#334155;
                        box-shadow:0 5px 14px rgba(15,23,42,0.04);
                    ">
                        ✔ Integración con Fonasa, Isapres y convenios institucionales
                    </td>
                </tr>

            </table>

        </td>
    </tr>

    <!-- CTA -->
    <tr>
        <td align="center" style="padding:0 35px 50px 35px;">

            <a target="_blank" href="https://www.med-sdi.cl/sdinicio/"
               style="
                    display:inline-block;
                    background:linear-gradient(135deg,#31bebe 0%, #1b9db1 100%);
                    color:#ffffff;
                    padding:20px 42px;
                    border-radius:60px;
                    text-decoration:none;
                    font-size:16px;
                    font-weight:700;
                    letter-spacing:0.3px;
                    box-shadow:0 14px 30px rgba(49,190,190,0.30);
               ">

                Ingresar a SDI

            </a>

            <p style="
                margin:18px 0 0 0;
                font-size:13px;
                color:#94a3b8;
                line-height:24px;
            ">
                Accede a una experiencia moderna y eficiente para tu centro médico.
            </p>

        </td>
    </tr>

    <!-- FOOTER -->
    <tr>
        <td style="
            background:#f8fafc;
            border-top:1px solid #e2e8f0;
            text-align:center;
            padding:38px 25px;
        ">

            <p style="
                margin:0;
                color:#64748b;
                font-size:13px;
                line-height:26px;
            ">

                Este correo fue enviado por 
                <strong>
                    Salud Digital Integrada
                </strong>

                <br>

                <span style="font-size:12px; color:#94a3b8;">
                    © <span id="year"></span> SDI · Todos los derechos reservados
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
