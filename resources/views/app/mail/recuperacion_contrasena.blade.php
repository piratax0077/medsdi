
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar Contraseña</title>
</head>

<body style="margin:0;padding:0;background:#eef3f9;">

    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background:#eef3f9;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="padding:40px 15px;">

                    <table border="0" width="100%" cellspacing="0" cellpadding="0"
                        style="
                        max-width:640px;
                        background:#ffffff;
                        border-radius:24px;
                        overflow:hidden;
                        box-shadow:0 20px 60px rgba(15,23,42,.08);
                    ">

                        <tbody>

                            <!-- LINEA SUPERIOR -->
                            <tr>
                                <td style="height:6px;background:linear-gradient(90deg,#1a49a3 0%, #31bebe 100%);">
                                </td>
                            </tr>

                            <!-- HEADER -->
                            <tr>
                                <td style="padding:10px;">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>

                                            <td width="80" align="center">
                                                <img
                                                    src="https://www.med-sdi.cl/images/sdi-color-h.svg"
                                                    alt="SDI"
                                                    style="width:100px;">
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>

                            <!-- HEADER -->
                            <tr>
                                <td style="padding:10px; margin-bottom: 30px;">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                             <td align="center">

                                                <p style="
                                                    margin:0;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:13px;
                                                    letter-spacing:2px;
                                                    text-transform:uppercase;
                                                    color:#31bebe;
                                                    font-weight:700;
                                                    margin-bottom: 20px;
                                                  
                                                ">
                                                    Recuperación de Contraseña
                                                </p>

                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>


                            <!-- TITULO -->
                            <tr>
                                <td style="padding:0 45px;" align="center">

                                    <h1 style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:16px;
                                        color:#0f172a;
                                        font-weight:700;
                                    ">
                                        Hola {{ $detalle['body']['nombre'] }}
                                    </h1>

                                </td>
                            </tr>

                            <!-- MENSAJE -->
                            <tr>
                                <td style="padding:10px 20px 20px 20px;" align="center">

                                    <p style="
                                        margin:0;
                                        font-family:Helvetica, Arial, sans-serif;
                                        font-size:14px;
                                        line-height:21px;
                                        color:#475569;
                                    ">
                                        Se ha realizado correctamente la actualización de tu contraseña.
                                        A continuación encontrarás tu nueva clave de acceso.
                                    </p>

                                </td>
                            </tr>

                            <!-- PASSWORD -->
                            <tr>
                                <td style="padding:10px 20px 20px 20px;">

                                    <table width="100%"
                                        border="0"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                        background:#f8fbff;
                                        border:1px solid #dbeafe;
                                        border-radius:18px;
                                    ">

                                        <tr>
                                            <td style="
                                                padding:16px 24px;
                                                background:#eff6ff;
                                                border-bottom:1px solid #dbeafe;
                                            ">

                                                <span style="
                                                    text-align: center;
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:14px;
                                                    color:#1a49a3;
                                                    font-weight:700;
                                                ">
                                                    NUEVA CONTRASEÑA
                                                </span>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="
                                                padding:25px;
                                                text-align:center;
                                            ">

                                                <span style="
                                                    font-family:Helvetica, Arial, sans-serif;
                                                    font-size:20px;
                                                    font-weight:700;
                                                    color:#0f172a;
                                                    letter-spacing:2px;
                                                ">
                                                    {{ $detalle['body']['pass'] }}
                                                </span>

                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>

                            <!-- ACCESO -->
                            <!--<tr>
                                <td style="padding:0 35px 25px 35px;">

                                    <table width="100%"
                                        cellspacing="0"
                                        cellpadding="0"
                                        style="
                                        background:#f0fdf4;
                                        border:1px solid #bbf7d0;
                                        border-radius:14px;
                                    ">

                                        <tr>
                                            <td style="
                                                padding:18px 20px;
                                                text-align:center;
                                                font-family:Helvetica, Arial, sans-serif;
                                                color:#166534;
                                                font-size:14px;
                                                line-height:24px;
                                            ">

                                                Accede al sistema utilizando tus credenciales desde:

                                                <br><br>

                                                <strong>{{ env('APP_URL') }}</strong>

                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>-->

                            <!-- BOTON -->
                            <tr>
                                <td align="center" style="padding:0 30px 35px 30px;">

                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>

                                                <td align="center"
                                                    style="
                                                    border-radius:50px;
                                                    background:linear-gradient(135deg,#31bebe 0%, #1995a8 100%);
                                                    box-shadow:0 10px 25px rgba(49,190,190,0.30);
                                                ">

                                                    <a target="_blank"
                                                        href="{{ env('APP_URL') }}"
                                                        style="
                                                        display:inline-block;
                                                        padding:18px 40px;
                                                        font-family:Helvetica, Arial, sans-serif;
                                                        font-size:16px;
                                                        font-weight:700;
                                                        color:#ffffff;
                                                        text-decoration:none;
                                                    ">
                                                        Acceder a mi cuenta
                                                    </a>

                                                </td>

                                            </tr>
                                        </tbody>
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
