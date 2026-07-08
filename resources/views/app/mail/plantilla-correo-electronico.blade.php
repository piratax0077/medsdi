<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $asunto ?? 'Notificación MED-SDI' }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4; margin:0; padding:0; }
        .email-wrap { max-width:600px; margin:24px auto; background:#ffffff; padding:18px; border-radius:4px; }
        .header { text-align:center; padding-bottom:12px; }
        .logo { max-width:240px; }
        .content { color:#333; font-size:15px; line-height:1.5; }
        .footer { color:#888; font-size:12px; text-align:center; padding-top:18px; }
        .meta { font-size:13px; color:#555; margin-bottom:12px; }
        .btn { display:inline-block; background:#0071bc; color:#fff; padding:10px 14px; border-radius:4px; text-decoration:none; }
        .table { width:100%; border-collapse:collapse; margin-top:12px; }
        .table td { padding:6px 8px; border:1px solid #eee; }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
        <tr>
            <td align="center">
                <div class="email-wrap">
                    <div class="header">
                        <img class="logo" src="{{ asset('assets/images/email/bienvenida-medichile.jpg') }}" alt="Medichile">
                    </div>

                    <div class="content">
                        <p class="meta">Estimado/a,</p>

                        {{-- Mensaje principal --}}
                        <div>
                            @if(!empty($mensaje))
                                {!! nl2br(e($mensaje)) !!}
                            @endif
                        </div>

                        {{-- Datos de notificación --}}
                        <table class="table">
                            <tr>
                                <td><strong>Tipo</strong></td>
                                <td>{{ $tipo_notificacion ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Número resolución</strong></td>
                                <td>{{ $numero_resolucion ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Fecha</strong></td>
                                <td>{{ $fecha ?? date('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Remitente</strong></td>
                                <td>{{ $remitente ?? '-' }}</td>
                            </tr>
                        </table>

                        <p style="margin-top:12px;">Si necesitas más información, responde a este correo.</p>

                        <p style="margin-top:18px;"><a href="https://www.medichile.cl" class="btn">Visitar MED-SDI</a></p>
                    </div>

                    <div class="footer">
                        <p>Salud Integrada Medichile — Todos los derechos reservados ©</p>
                        <p style="font-size:11px;color:#aaa;">Este correo fue enviado automáticamente. Por favor no respondas al remitente automático.</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
