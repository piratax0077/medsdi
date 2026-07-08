<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Entrega de Medicamentos Crónicos</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f6fa; font-family: Helvetica, Arial, sans-serif;">
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="background-color: #f4f6fa;" align="center" valign="top">
                    <br>
                    <table style="width: 100%; max-width: 600px;" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <!-- Barra superior gradiente -->
                            <tr>
                                <td style="height: 8px; background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); border-top-left-radius: 12px; border-top-right-radius: 12px;"></td>
                            </tr>

                            <!-- Logo -->
                            <tr>
                                <td style="background-color: #ffffff; text-align: center; padding: 25px 0 10px 0;">
                                    <img style="width: 90px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="MED-SDI">
                                </td>
                            </tr>

                            <!-- Saludo paciente -->
                            <tr>
                                <td style="background-color: #ffffff; padding: 0 30px; text-align: center;">
                                    <p style="font-size: 22px; font-weight: 600; color: #0071bc; margin-bottom: 5px;">
                                        Estimado/a Paciente:
                                    </p>
                                    <p style="font-size: 20px; font-weight: 700; color: #333; margin-top: 0;">
                                        {{ $nombre_paciente }}
                                    </p>
                                </td>
                            </tr>

                            <!-- Banner principal -->
                            <tr>
                                <td style="padding: 0 30px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td style="background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 18px 24px; border-radius: 12px; text-align: center;">
                                                <p style="font-size: 18px; font-weight: 600; color: #ffffff; margin: 0;">
                                                    Notificación de Entrega de Medicamentos
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Mensaje de fecha de entrega -->
                            <tr>
                                <td style="background-color: #ffffff; padding: 20px 30px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td style="background-color: #e8f5e9; border-radius: 12px; padding: 20px; text-align: center; border: 1px solid #c8e6c9;">
                                                <p style="font-size: 14px; color: #2e7d32; margin: 0 0 5px 0; font-weight: 600;">
                                                    &#128197; FECHA ESTIMADA DE ENTREGA
                                                </p>
                                                <p style="font-size: 22px; color: #1b5e20; margin: 0; font-weight: 700;">
                                                    {{ $fecha_entrega_estimada }}
                                                </p>
                                                <p style="font-size: 13px; color: #388e3c; margin: 8px 0 0 0;">
                                                    (5 días hábiles desde la fecha de notificación)
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Medicamentos -->
                            <tr>
                                <td style="background-color: #ffffff; padding: 5px 30px 15px 30px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td style="background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 12px 20px; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                                <p style="font-size: 14px; font-weight: 600; color: #ffffff; margin: 0;">
                                                     MEDICAMENTOS A ENTREGAR
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9ff; padding: 15px 20px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; border: 1px solid #e0e7ff; border-top: none;">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <!-- Cabecera tabla -->
                                                    <tr>
                                                        <td style="padding: 8px 10px; font-size: 12px; font-weight: 700; color: #3366CC; border-bottom: 2px solid #3366CC; text-transform: uppercase;">Medicamento</td>
                                                        <td style="padding: 8px 10px; font-size: 12px; font-weight: 700; color: #3366CC; border-bottom: 2px solid #3366CC; text-transform: uppercase; text-align: center;">Presentación</td>
                                                        <td style="padding: 8px 10px; font-size: 12px; font-weight: 700; color: #3366CC; border-bottom: 2px solid #3366CC; text-transform: uppercase; text-align: center;">Posología</td>
                                                    </tr>
                                                    @if(isset($medicamentos) && is_array($medicamentos))
                                                        @foreach($medicamentos as $index => $medicamento)
                                                        <tr>
                                                            <td style="padding: 10px; font-size: 14px; color: #333; border-bottom: 1px solid #e9ecef;">
                                                                <strong>{{ $medicamento ?? 'N/A' }}</strong>
                                                            </td>
                                                            <td style="padding: 10px; font-size: 13px; color: #555; border-bottom: 1px solid #e9ecef; text-align: center;">
                                                                {{ $medicamento['presentacion'] ?? 'N/A' }}
                                                            </td>
                                                            <td style="padding: 10px; font-size: 13px; color: #555; border-bottom: 1px solid #e9ecef; text-align: center;">
                                                                {{ $medicamento['posologia'] ?? 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Info profesional y lugar -->
                            <tr>
                                <td style="background-color: #ffffff; padding: 5px 30px 20px 30px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td style="background-color: #f0f4ff; border-radius: 12px; padding: 15px 20px; border-left: 4px solid #3366CC;">
                                                <p style="font-size: 13px; color: #555; margin: 0 0 8px 0; line-height: 20px;">
                                                    <strong style="color: #3366CC;">Profesional:</strong><br>
                                                    {{ $profesional_nombre }}
                                                    @if(isset($profesional_especialidad))
                                                        - {{ $profesional_especialidad }}
                                                    @endif
                                                    @if(isset($profesional_tipo_especialidad))
                                                        / {{ $profesional_tipo_especialidad }}
                                                    @endif
                                                </p>
                                                <p style="font-size: 13px; color: #555; margin: 0 0 8px 0; line-height: 20px;">
                                                    <strong style="color: #3366CC;">Lugar de Atención:</strong><br>
                                                    {{ $lugar_atencion }}
                                                </p>
                                                <p style="font-size: 13px; color: #555; margin: 0; line-height: 20px;">
                                                    <strong style="color: #3366CC;">Dirección:</strong><br>
                                                    {{ $direccion }}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Separador -->
                            <tr>
                                <td style="background-color: #ffffff; padding: 0 30px;">
                                    <hr style="border: none; border-top: 2px dashed #e0e7ff; margin: 0;">
                                </td>
                            </tr>

                            <!-- Sección solicitar otro medicamento -->
                            <tr>
                                <td style="background-color: #ffffff; padding: 25px 30px; text-align: center;">
                                    <p style="font-size: 16px; font-weight: 600; color: #333; margin: 0 0 8px 0;">
                                        &#129514; ¿Necesita algún otro medicamento?
                                    </p>
                                    <p style="font-size: 14px; color: #666; margin: 0 0 20px 0;">
                                        Si desea solicitar medicamentos adicionales, haga clic en el siguiente botón:
                                    </p>

                                    <!-- Botón solicitar -->
                                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tr>
                                            <td style="border-radius: 10px; background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);">
                                                <a href="{{ $url_solicitud }}" target="_blank" style="display: inline-block; padding: 14px 40px; font-size: 16px; font-weight: 600; color: #ffffff; text-decoration: none; border-radius: 10px;">
                                                    &#128221; Solicitar Medicamentos
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Barra inferior gradiente -->
                            <tr>
                                <td style="height: 6px; background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></td>
                            </tr>

                            <!-- Footer -->
                            <tr>
                                <td style="text-align: center; padding: 20px;">
                                    <p style="text-align: center; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">
                                        Este correo electrónico fue enviado por
                                        <a style="color: #3366CC;" href="https://med-sdi.cl/ingreso">Salud Digital Integrada</a>
                                        <br>
                                        <strong>Salud Digital Integrada &copy; {{ date('Y') }}</strong>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
