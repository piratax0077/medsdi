<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Reunión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #0056b3 0%, #003d82 100%);
            color: white;
            padding: 20px;
            border-radius: 6px 6px 0 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 1.5rem;
        }
        .header p {
            margin: 5px 0 0 0;
            opacity: 0.9;
        }
        .content {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 0 0 6px 6px;
        }
        .info-box {
            background: white;
            border-left: 4px solid #0056b3;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .info-box strong {
            color: #0056b3;
        }
        .button {
            display: inline-block;
            background: #0056b3;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Acta de Reunión</h1>
            <p>Control de Farmacia - Medichile</p>
        </div>

        <div class="content">
            <div class="info-box">
                <p>Estimado/a,</p>
                <p>Se adjunta el acta de la reunión de control de farmacia realizada con <strong>{{ $farmacia }}</strong>.</p>
                <p>Este documento contiene:</p>
                <ul>
                    <li>Datos de la reunión (fecha, hora, tipo)</li>
                    <li>Acta y observaciones</li>
                    <li>Resumen de productos verificados</li>
                    <li>Estado de los medicamentos controlados</li>
                </ul>
            </div>

            <div class="info-box">
                <p><strong>Archivo adjunto:</strong></p>
                <p>📄 Acta_Reunion_{{ str_replace(' ', '_', $farmacia) }}_{{ now()->format('Y-m-d') }}.pdf</p>
            </div>

            <div class="info-box">
                <p><strong>Instrucciones:</strong></p>
                <p>Por favor, descargue y guarde el PDF para sus registros. En caso de dudas, contacte con el equipo de Medichile.</p>
            </div>

            <hr style="border: none; border-top: 1px solid #dee2e6; margin: 20px 0;">

            <p style="font-size: 0.9rem; color: #6c757d;">
                <strong>Nota importante:</strong> Este es un mensaje automático generado por el sistema Medichile. Por favor, no responda a este correo. Si tiene preguntas, contacte al administrador del sistema.
            </p>
        </div>

        <div class="footer">
            <p>Medichile — Sistema de Salud</p>
            <p>{{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
