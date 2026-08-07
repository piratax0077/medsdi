<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conoce MED-SDI</title>
</head>
<body style="margin:0;padding:0;background:#f4f7fb;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f7fb;">
<tr><td align="center" style="padding:24px 12px;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 8px 28px rgba(31,55,86,.10);">
<tr><td align="center" style="padding:26px 24px 14px;"><img src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="MED-SDI" style="width:95px;display:block;"></td></tr>
<tr><td align="center" style="padding:0 28px 12px;"><p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:28px;line-height:36px;font-weight:700;color:#1769aa;">Hola {{ $detalle['body']['nombre'] ?? 'Paciente' }}</p></td></tr>
<tr><td align="center" style="padding:0 28px 24px;"><p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:25px;color:#50657a;">Tu hora médica fue registrada correctamente. Queremos contarte que MED-SDI también dispone de herramientas digitales para ayudarte a gestionar tu atención de salud de forma simple, segura y ordenada.</p></td></tr>
<tr><td style="padding:0 24px 24px;"><table border="0" width="100%" cellspacing="0" cellpadding="0" style="background:#3366cc;border-radius:12px;"><tr><td style="padding:24px;"><p style="margin:0 0 14px;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:700;color:#fff;">¿Qué podrás hacer en MED-SDI?</p><p style="margin:0 0 9px;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:23px;color:#fff;">✓ Revisar información relacionada con tus atenciones.</p><p style="margin:0 0 9px;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:23px;color:#fff;">✓ Recibir recordatorios y comunicaciones de tus profesionales.</p><p style="margin:0 0 9px;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:23px;color:#fff;">✓ Acceder a servicios digitales habilitados por tu centro de salud.</p><p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:23px;color:#fff;">✓ Mantener tu información de salud organizada en un solo lugar.</p></td></tr></table></td></tr>
@if(!empty($detalle['body']['profesional']))
<tr><td style="padding:0 28px 20px;"><p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:22px;color:#62768a;text-align:center;">Esta invitación se generó a partir de tu atención con <strong>{{ $detalle['body']['profesional'] }}</strong>.</p></td></tr>
@endif
<tr><td align="center" style="padding:4px 24px 30px;"><table border="0" cellspacing="0" cellpadding="0"><tr><td align="center" style="background:#149b9b;border-radius:28px;padding:14px 24px;"><a target="_blank" href="{{ $detalle['body']['url_promocion'] ?? env('APP_URL') }}" style="font-family:Helvetica,Arial,sans-serif;color:#fff;text-decoration:none;font-size:17px;font-weight:700;">Conocer MED-SDI</a></td></tr></table></td></tr>
<tr><td align="center" style="padding:0 28px 26px;"><p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:19px;color:#8a9aaa;">Este mensaje es informativo. No se creó una cuenta de usuario ni se generó una contraseña.</p></td></tr>
<tr><td align="center" style="padding:20px 24px;border-top:1px solid #edf1f5;"><img src="https://www.med-sdi.cl/images/logo.png" alt="MED-SDI" style="width:90px;display:block;margin-bottom:12px;"><p style="margin:0;font-family:Helvetica,Arial,sans-serif;color:#8b98a5;font-size:12px;line-height:19px;">Este correo fue enviado por Salud Digital Integrada.<br>Todos los derechos reservados.</p></td></tr>
<tr><td style="height:8px;background:#1cbebe;"></td></tr>
</table></td></tr></table>
</body>
</html>
