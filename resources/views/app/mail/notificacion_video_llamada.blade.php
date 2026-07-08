<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recordatorio de Teleconsulta</title>
</head>
<body style="margin:0; padding:0; background:#f4f7fb; font-family: Helvetica, Arial, sans-serif; color:#263238;">
    @php
        $body = $detalle['body'] ?? [];
        $nombrePaciente = $body['nombre_paciente'] ?? 'Paciente';
        $nombreProfesional = $body['nombre_profesional'] ?? 'Profesional';
        $fechaConsulta = $body['fecha_consulta'] ?? '';
        $horaConsulta = $body['hora_consulta'] ?? '';
        $lugarAtencion = $body['lugar_atencion'] ?? 'Telemedicina MED-SDI';
        $linkMeet = $body['link_meet'] ?? '#';

        try {
            $fechaFormateada = $fechaConsulta ? \Carbon\Carbon::parse($fechaConsulta)->locale('es')->translatedFormat('l d \d\e F \d\e Y') : 'Fecha por confirmar';
        } catch (\Exception $e) {
            $fechaFormateada = $fechaConsulta ?: 'Fecha por confirmar';
        }

        try {
            $horaFormateada = $horaConsulta ? \Carbon\Carbon::parse($horaConsulta)->format('H:i') . ' hrs' : 'Hora por confirmar';
        } catch (\Exception $e) {
            $horaFormateada = $horaConsulta ?: 'Hora por confirmar';
        }
    @endphp

    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f7fb;">
        <tr>
            <td align="center" style="padding:24px 12px;">
                <table border="0" width="100%" cellspacing="0" cellpadding="0" style="max-width:620px; background:#ffffff; border-radius:14px; overflow:hidden; box-shadow:0 8px 28px rgba(15,23,42,.08);">
                    <tr>
                        <td style="height:10px; background:#3366cc; background:linear-gradient(81deg, #3366cc 0%, #1cbebe 100%);"></td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:28px 24px 12px 24px;">
                            <img src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="MED-SDI" style="width:95px; display:block; border:0;">
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:8px 28px 0 28px;">
                            <h1 style="margin:0; font-size:24px; line-height:32px; color:#0071bc; font-weight:700;">
                                🎥 Recordatorio de Teleconsulta
                            </h1>
                            <p style="margin:12px 0 0 0; font-size:15px; line-height:24px; color:#5f6b7a;">
                                Estimado/a <strong>{{ $nombrePaciente }}</strong>, le recordamos que tiene una videoconsulta médica programada.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:24px 28px 8px 28px;">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background:#f8fbfd; border:1px solid #e6edf5; border-radius:12px;">
                                <tr>
                                    <td style="padding:18px 20px;">
                                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding:8px 0; font-size:13px; color:#7b8794; width:145px;">Paciente</td>
                                                <td style="padding:8px 0; font-size:14px; color:#263238; font-weight:600;">{{ $nombrePaciente }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:13px; color:#7b8794;">Profesional</td>
                                                <td style="padding:8px 0; font-size:14px; color:#263238; font-weight:600;">Dr. {{ $nombreProfesional }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:13px; color:#7b8794;">Modalidad</td>
                                                <td style="padding:8px 0; font-size:14px; color:#263238; font-weight:600;">{{ $lugarAtencion }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:13px; color:#7b8794;">Fecha</td>
                                                <td style="padding:8px 0; font-size:14px; color:#263238; font-weight:600;">{{ ucfirst($fechaFormateada) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:13px; color:#7b8794;">Hora</td>
                                                <td style="padding:8px 0; font-size:14px; color:#263238; font-weight:600;">{{ $horaFormateada }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:26px 28px 12px 28px;">
                            <a target="_blank" href="{{ $linkMeet }}" style="background:#009393; background:linear-gradient(148deg, #009393 0%, #1cbebe 100%); color:#ffffff; text-decoration:none; font-size:17px; font-weight:700; padding:15px 28px; border-radius:30px; display:inline-block;">
                                🎥 Unirme a la Videoconsulta
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:8px 32px 20px 32px; text-align:center;">
                            <p style="margin:0; font-size:12px; line-height:20px; color:#7b8794;">
                                Si el botón no funciona, copie y pegue este enlace en su navegador:
                            </p>
                            <p style="margin:6px 0 0 0; font-size:12px; line-height:18px; color:#0071bc; word-break:break-all;">
                                {{ $linkMeet }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 28px 24px 28px;">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background:#fff8e6; border:1px solid #ffe1a6; border-radius:12px;">
                                <tr>
                                    <td style="padding:16px 18px;">
                                        <p style="margin:0 0 8px 0; font-size:14px; font-weight:700; color:#8a6100;">
                                            Antes de ingresar
                                        </p>
                                        <p style="margin:0; font-size:13px; line-height:22px; color:#6b5b2a;">
                                            ✔ Conéctese 5 minutos antes.<br>
                                            ✔ Use Google Chrome o Microsoft Edge.<br>
                                            ✔ Permita el acceso a cámara y micrófono.<br>
                                            ✔ Procure estar en un lugar tranquilo y con buena conexión a internet.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 32px 28px 32px;">
                            <p style="margin:0; font-size:12px; line-height:20px; color:#7b8794; text-align:center;">
                                Este enlace es personal. No lo comparta con terceros.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="height:10px; background:#3366cc; background:linear-gradient(81deg, #3366cc 0%, #1cbebe 100%);"></td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:20px 24px; background:#ffffff;">
                            <p style="margin:0; color:#999999; font-size:12px; line-height:20px;">
                                Este correo electrónico fue enviado por
                                <a style="color:#0071bc; text-decoration:none;" href="https://www.medichile.cl">Salud Digital Integrada</a>.<br>
                                Salud Digital Integrada. Todos los derechos reservados © {{ date('Y') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
