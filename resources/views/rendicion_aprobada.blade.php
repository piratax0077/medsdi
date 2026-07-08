<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendición Aprobada</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 100%;
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }

        .icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px;
        }

        .success-message {
            text-align: center;
            margin-bottom: 30px;
        }

        .success-message h2 {
            color: #11998e;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .success-message p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .info-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border-left: 4px solid #11998e;
            transition: transform 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .info-card-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .info-card-value {
            font-size: 20px;
            font-weight: 700;
            color: #11998e;
        }

        .details-section {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            border: 2px solid #28a745;
        }

        .details-title {
            font-size: 18px;
            font-weight: 600;
            color: #155724;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .details-title span {
            margin-right: 10px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(21, 87, 36, 0.1);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #155724;
        }

        .detail-value {
            color: #155724;
            font-weight: 500;
        }

        .total-section {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            margin: 30px 0;
        }

        .total-section h3 {
            font-size: 16px;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .total-section .amount {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            background: #28a745;
            color: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
        }

        .actions {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 14px 35px;
            margin: 8px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .footer {
            background: #f8f9fa;
            padding: 25px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            border-top: 1px solid #e0e0e0;
        }

        .footer p {
            margin: 5px 0;
        }

        .timestamp {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 14px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
            }

            .content {
                padding: 20px;
            }

            .info-cards {
                grid-template-columns: 1fr;
            }

            .btn {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="icon">✓</div>
            <h1>¡Rendición Aprobada!</h1>
            <p class="subtitle">La rendición ha sido procesada exitosamente</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="success-message">
                <h2>🎉 Aprobación Exitosa</h2>
                <p>
                    La Rendición de Caja N°<strong>{{ $id_rendicion }}</strong> ha sido aprobada correctamente.
                    Todos los bonos asociados han sido procesados y el registro está actualizado en el sistema.
                </p>
            </div>

            <!-- Info Cards -->
            <div class="info-cards">
                <div class="info-card">
                    <div class="info-card-icon">📋</div>
                    <div class="info-card-label">N° Rendición</div>
                    <div class="info-card-value">#{{ $id_rendicion }}</div>
                </div>

                <div class="info-card">
                    <div class="info-card-icon">📄</div>
                    <div class="info-card-label">Documentos</div>
                    <div class="info-card-value">{{ $total_documentos }}</div>
                </div>

                <div class="info-card">
                    <div class="info-card-icon">🎫</div>
                    <div class="info-card-label">Bonos</div>
                    <div class="info-card-value">{{ $total_bonos }}</div>
                </div>
            </div>

            <!-- Total Section -->
            <div class="total-section">
                <h3>Monto Total Aprobado</h3>
                <div class="amount">${{ number_format($total_efectivo, 0, ',', '.') }}</div>
                <span class="status-badge">✓ APROBADA</span>
            </div>

            <!-- Details Section -->
            <div class="details-section">
                <div class="details-title">
                    <span>ℹ️</span> Detalles de la Aprobación
                </div>

                <div class="detail-row">
                    <span class="detail-label">Aprobado por:</span>
                    <span class="detail-value">{{ $nombre_aprobador }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Fecha de Aprobación:</span>
                    <span class="detail-value">{{ $fecha_aprobacion }}</span>
                </div>

                @if(isset($observaciones) && !empty($observaciones))
                <div class="detail-row">
                    <span class="detail-label">Observaciones:</span>
                    <span class="detail-value">{{ $observaciones }}</span>
                </div>
                @endif
            </div>

            <div class="timestamp">
                <span>🕒</span>
                <span>Procesado el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i') }}</span>
            </div>

            <!-- Actions -->
            <div class="actions">
                <button onclick="window.print()" class="btn btn-secondary">
                    🖨️ Imprimir
                </button>
                <a href="javascript:window.close();" class="btn btn-primary">
                    Cerrar ventana
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>MED-SDI Sistema de Gestión Médica</strong></p>
            <p>Esta aprobación ha sido registrada en el sistema</p>
            <p>© {{ date('Y') }} Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>
