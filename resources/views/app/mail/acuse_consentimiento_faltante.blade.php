<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Solicitud de Consentimiento Recibida</title>
</head>
<body style="background-color: #f2f2f2; margin-top: 0px;">
    <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">
        <tbody>
            <tr>
                <td style="background-color: #f2f2f2;" align="center" valign="top">
                    <table style="width: 100%; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tr style="background-color: #fff;">
                            <td style="text-align: center;">
                                <img style="margin-bottom: 5px; margin-top: 0px; max-width: 100%;" src="https://www.med-sdi.cl/images/email/medichile-email.png" alt="Medichile">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding-top: 15px;" align="center">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; line-height: 24px; color: #3366cc; text-align: center; font-weight: 600;">
                                    Estimado/a paciente:<br>{{ $detalle['body']['nombre_paciente'] }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: rgb(51,102,204); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 14px 24px; border-radius: 20px;" align="center">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 500; color: #ffffff; margin: 0;">
                                    Hemos recibido su solicitud de consentimiento
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding: 20px 24px; text-align: justify;">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 15px; line-height: 24px; color: #424242;">
                                    Su solicitud de inclusión del consentimiento informado ha sido registrada correctamente.
                                    El equipo de <strong>{{ $detalle['body']['nombre_profesional'] }}</strong> la revisará a la brevedad.
                                </p>

                                <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse: collapse; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #333; margin-top: 10px;">
                                    <tr style="background-color: #eef2ff;">
                                        <td style="font-weight: bold; color: #3366cc; width: 40%;">Consentimiento solicitado</td>
                                        <td>{{ $detalle['body']['consentimiento'] }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; color: #3366cc;">Profesional</td>
                                        <td>{{ $detalle['body']['nombre_profesional'] }}</td>
                                    </tr>
                                    <tr style="background-color: #eef2ff;">
                                        <td style="font-weight: bold; color: #3366cc;">Fecha de solicitud</td>
                                        <td>{{ $detalle['body']['fecha'] }}</td>
                                    </tr>
                                    @if(!empty($detalle['body']['observaciones']))
                                    <tr>
                                        <td style="font-weight: bold; color: #3366cc;">Observaciones</td>
                                        <td>{{ $detalle['body']['observaciones'] }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding: 0 24px 20px 24px; text-align: center;">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; color: #888; margin-top: 20px;">
                                    Si usted no realizó esta solicitud o tiene dudas, por favor contáctenos.<br>
                                    Este es un correo automático, no responda a este mensaje.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="margin-top: 50px; background-color: #fff;">
                                <img style="margin-bottom: 5px; margin-top: 50px; max-width: 100%;" src="https://www.med-sdi.cl/images/email/pie-email.png" alt="Medichile">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; background-color: #fff;" align="center">
                                <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td style="font-family: Helvetica, Arial, sans-serif;" align="center" valign="top">
                                                <p style="text-align: center; color: #999999; font-size: 10px; font-weight: normal; line-height: 15px;">
                                                    Este correo electrónico fue enviado por
                                                    <a style="color: #000;" href="https://www.medichile.cl">Salud Digital Integrada</a><br>
                                                    <b>Salud Digital Integrada &copy; {{ date('Y') }}</b>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
