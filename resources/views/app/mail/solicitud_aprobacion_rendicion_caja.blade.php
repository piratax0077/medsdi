<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Aprobación - Rendición de Caja Chica</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        .greeting {
            font-size: 16px;
            color: #333333;
            margin-bottom: 20px;
        }
        .info-card {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .info-card h3 {
            margin: 0 0 15px 0;
            color: #667eea;
            font-size: 18px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #555555;
        }
        .info-value {
            color: #333333;
            text-align: right;
        }
        .total-row {
            background-color: #667eea;
            color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: center;
        }
        .total-row h2 {
            margin: 0;
            font-size: 24px;
        }
        .total-row p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .message-box {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            color: #856404;
        }
        .message-box strong {
            display: block;
            margin-bottom: 8px;
        }
        .action-buttons {
            text-align: center;
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            padding: 14px 35px;
            margin: 8px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-approve {
            background-color: #28a745;
            color: #ffffff;
            border: 2px solid #28a745;
        }
        .btn-approve:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-reject {
            background-color: #dc3545;
            color: #ffffff;
            border: 2px solid #dc3545;
        }
        .btn-reject:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 25px;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
            border-top: 1px solid #e0e0e0;
        }
        .email-footer p {
            margin: 5px 0;
        }
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 25px 0;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
            }
            .email-body {
                padding: 20px 15px;
            }
            .btn {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>🧾 Solicitud de Aprobación</h1>
            <p>Rendición de Caja Chica</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p class="greeting">
                Estimado/a <strong>{{ $nombre_asistente ?? 'Profesional' }}</strong>,
            </p>

            <p>
                Se ha generado una nueva rendición de caja chica que requiere su aprobación.
                A continuación encontrará los detalles de la rendición:
            </p>

            <!-- Información de la Rendición -->
            <div class="info-card">
                <h3>📋 Información de la Rendición</h3>
                <div class="info-row">
                    <span class="info-label">N° Rendición:</span>
                    <span class="info-value">#{{ $id_rendicion ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha de Emisión:</span>
                    <span class="info-value">{{ date('d/m/Y H:i', strtotime($fecha_rendicion ?? now())) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Solicitante:</span>
                    <span class="info-value">{{ $nombre_asistente ?? 'N/A' }}</span>
                </div>
            </div>            <!-- Total -->
            <div class="total-row">
                <h2>${{ number_format($total_rendicion ?? 0, 0, ',', '.') }}</h2>
                <p>Monto Total de la Rendición</p>
            </div>

            <!-- Mensaje importante -->
            <div class="message-box">
                <strong>⚠️ Acción Requerida</strong>
                Por favor, revise cuidadosamente los detalles de esta rendición y proceda a aprobarla o rechazarla
                según corresponda. Su decisión es importante para el proceso contable.
            </div>

            <div class="divider"></div>

            <!-- Botones de Acción -->
            <div class="action-buttons">
                <a href="#"
                   class="btn btn-approve">
                    ✓ Aprobar Rendición
                </a>
                <a href="#"
                   class="btn btn-reject">
                    ✗ Rechazar Rendición
                </a>
            </div>

            <p style="font-size: 13px; color: #6c757d; margin-top: 25px; text-align: center;">
                Si no reconoce esta solicitud o tiene alguna duda, por favor contacte al departamento de administración.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p><strong>{{ config('app.name', 'MediChile Sistema') }}</strong></p>
            <p>Este es un correo automático, por favor no responder.</p>
            <p style="margin-top: 15px;">
                © {{ date('Y') }} Todos los derechos reservados
            </p>
        </div>
    </div>
</body>
</html>
