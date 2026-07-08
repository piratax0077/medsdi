<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendición Aprobada</title>
    <style>
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 650px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }
        .email-header p {
            margin: 8px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .email-body {
            padding: 35px 30px;
        }
        .success-icon {
            text-align: center;
            font-size: 60px;
            margin: 20px 0;
        }
        .info-card {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .info-card h3 {
            margin: 0 0 15px 0;
            color: #155724;
            font-size: 18px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
        }
        .info-label {
            font-weight: 600;
            color: #155724;
        }
        .info-value {
            color: #155724;
            text-align: right;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 25px;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
            border-top: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>✓ Rendición Aprobada</h1>
            <p>Su rendición ha sido aprobada exitosamente</p>
        </div>

        <div class="email-body">
            <div class="success-icon">🎉</div>

            <p style="text-align: center; font-size: 16px; color: #333;">
                <strong>¡Buenas noticias!</strong><br>
                Su Rendición de Caja ha sido aprobada
            </p>

            <div class="info-card">
                <h3>📋 Detalles de la Aprobación</h3>
                <div class="info-row">
                    <span class="info-label">N° Rendición:</span>
                    <span class="info-value">#{{ $id_rendicion ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Aprobado por:</span>
                    <span class="info-value">{{ $nombre_receptor ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha de Aprobación:</span>
                    <span class="info-value">{{ $fecha_aprobacion ?? now()->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <p style="text-align: center; color: #6c757d; font-size: 14px; margin-top: 25px;">
                La rendición ha sido procesada correctamente en el sistema.
            </p>
        </div>

        <div class="email-footer">
            <p><strong>{{ config('app.name', 'MediChile Sistema') }}</strong></p>
            <p>Este es un correo automático, por favor no responder.</p>
            <p>© {{ date('Y') }} Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>
