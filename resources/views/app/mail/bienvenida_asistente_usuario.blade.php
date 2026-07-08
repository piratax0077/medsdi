<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Acceso a plataforma</title>
</head>

<body style="margin:0; padding:0; background:#eef2f7;">

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center">

<!-- CONTENEDOR -->
<table width="100%" style="max-width:620px; font-family: Helvetica, Arial, sans-serif;">

    <!-- HEADER -->
    <tr>
        <td style="padding:20px;">
            <table width="100%" style="background: linear-gradient(152deg,rgba(26, 73, 163, 1) 27%, rgba(71, 117, 196, 1) 100%); border-radius:12px;">
                <tr>
                    <td style="padding:20px; text-align:center;">
                        <img src="https://www.med-sdi.cl/images/sdi-white-v.svg" width="100">
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- CARD PRINCIPAL -->
    <tr>
        <td style="padding:0 20px;">
            <table width="100%" style="background:#ffffff; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                <!-- BIENVENIDA -->
                <tr>
                    <td style="padding:25px 25px 10px 25px;">
                        <p style="margin:0; font-size:14px; color:#888;">Bienvenido/a</p>
                        <h2 style="margin:5px 0 0 0; color:#1a49a3;">
                            {{ $detalle['body']['nombre'] }}
                        </h2>
                    </td>
                </tr>

                <!-- INFO ROL -->
                <tr>
                    <td style="padding:0 25px 15px 25px;">
                        <p style="margin:0; font-size:14px; color:#555; line-height:1.6;">
                            ¡Tu cuenta ya está lista! Ahora formas parte del equipo como 
                            <strong style="color:#1a49a3;">Asistente</strong>. 
                            Puedes ingresar cuando quieras usando tus credenciales.
                        </p>
                    </td>
                </tr>

                <!-- DIVISOR -->
                <tr>
                    <td style="padding:0 25px;">
                        <hr style="border:none; border-top:1px solid #eee;">
                    </td>
                </tr>

                <!-- CREDENCIALES TIPO DASHBOARD -->
                <tr>
                    <td style="padding:20px 25px;">
                        <table width="100%">

                            <tr>
                                <td style="background:#f6f9fc; border-radius:10px; padding:15px;">
                                    <p style="margin:0; font-size:12px; color:#999;">Usuario</p>
                                    <p style="margin:5px 0 0 0; font-size:15px; font-weight:bold; color:#333;">
                                        {{ $detalle['body']['user'] }}
                                    </p>
                                </td>
                            </tr>

                            <tr><td height="10"></td></tr>

                            <tr>
                                <td style="background:#f6f9fc; border-radius:10px; padding:15px;">
                                    <p style="margin:0; font-size:12px; color:#999;">Contraseña</p>
                                    <p style="margin:5px 0 0 0; font-size:15px; font-weight:bold; color:#333;">
                                        {{ $detalle['body']['pass'] }}
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>

                <!-- BOTÓN -->
                <tr>
                    <td align="center" style="padding:10px 25px 25px 25px;">
                        <a href="https://www.med-sdi.cl/Ingreso"
                           style="background:linear-gradient(148deg, rgba(0,147,147,1) 0%, rgba(28,190,190,1) 100%);
                                  color:#ffffff;
                                  padding:14px 30px;
                                  border-radius:8px;
                                  text-decoration:none;
                                  font-size:15px;
                                  font-weight:bold;
                                  display:inline-block;">
                            Ingresar al sistema
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding:0 25px 25px 25px;">
                        <p style="margin:10px 0 0 0; font-size:12px; color:#9aa0a6;">
                            Por seguridad, evita compartir tus datos de acceso con otras personas.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

  
    <!-- FOOTER -->
    <tr>
        <td style="padding:10px 20px 30px 20px;">
            <p style="text-align:center; font-size:12px; color:#999;">
                © {{ date('Y') }} Salud Digital Integrada<br>
                Todos los derechos reservados
            </p>
        </td>
    </tr>

</table>

</td>
</tr>
</table>

</body>
</html>