<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        .header { background: #1abc9c; padding: 24px 32px; color: #fff; }
        .header h2 { margin: 0; font-size: 20px; }
        .header p { margin: 4px 0 0; font-size: 13px; opacity: .85; }
        .body { padding: 28px 32px; color: #333; }
        .body p { margin: 0 0 12px; line-height: 1.6; }
        .info-card { background: #f8f9fa; border-left: 4px solid #1abc9c; border-radius: 4px; padding: 16px 20px; margin: 20px 0; }
        .info-row { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; }
        .info-row:last-child { margin-bottom: 0; }
        .info-label { font-weight: bold; color: #555; }
        .info-value { color: #222; }
        .footer { background: #f0f0f0; padding: 16px 32px; text-align: center; font-size: 12px; color: #888; }
        .adjunto-aviso { background: #e8f8f4; border: 1px solid #1abc9c; border-radius: 4px; padding: 12px 16px; font-size: 13px; color: #1a7a60; margin-top: 18px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Certificado de Reposo Médico</h2>
            <p>Documento adjunto generado el {{ date('d/m/Y') }}</p>
        </div>
        <div class="body">
            <p>Estimado/a <strong>{{ $nombre_paciente ?? 'Paciente' }}</strong>,</p>
            <p>Se adjunta su certificado de reposo médico emitido por <strong>{{ $nombre_profesional ?? '' }}</strong>.</p>

            <div class="info-card">
                <div class="info-row">
                    <span class="info-label">Paciente:</span>
                    <span class="info-value">{{ $nombre_paciente ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">RUT:</span>
                    <span class="info-value">{{ $rut_paciente ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha inicio reposo:</span>
                    <span class="info-value">{{ $fecha_inicio ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha término reposo:</span>
                    <span class="info-value">{{ $fecha_termino ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Diagnóstico:</span>
                    <span class="info-value">{{ $hipotesis ?? '-' }}</span>
                </div>
                @if(!empty($comentarios))
                <div class="info-row">
                    <span class="info-label">Comentarios:</span>
                    <span class="info-value">{{ $comentarios }}</span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-label">Profesional:</span>
                    <span class="info-value">{{ $nombre_profesional ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Especialidad:</span>
                    <span class="info-value">{{ $especialidad_profesional ?? '-' }}</span>
                </div>
            </div>

            <div class="adjunto-aviso">
                <strong>&#x1F4CE; Adjunto:</strong> El PDF del certificado se encuentra adjunto a este correo.
            </div>
        </div>
        <div class="footer">
            Este es un correo automático generado por el sistema MediChile. Por favor no responda este mensaje.
        </div>
    </div>
</body>
</html>
