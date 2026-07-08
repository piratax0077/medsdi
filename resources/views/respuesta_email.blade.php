<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            max-width: 600px;
            width: 100%;
            padding: 40px;
            text-align: center;
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

        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .icon.success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            animation: pulse 1.5s infinite;
        }

        .icon.error {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            color: white;
            animation: shake 0.5s;
        }

        .icon.warning {
            background: linear-gradient(135deg, #f2994a 0%, #f2c94c 100%);
            color: white;
            animation: bounce 1s;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(10px);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 28px;
        }

        .mensaje {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .detalles {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            text-align: left;
        }

        .detalles-titulo {
            font-weight: 600;
            font-size: 16px;
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detalles-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .detalles-item:last-child {
            border-bottom: none;
        }

        .detalles-label {
            font-weight: 600;
            color: #555;
        }

        .detalles-value {
            color: #333;
        }

        .btn-volver {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-volver:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-imprimir {
            display: inline-block;
            margin-top: 30px;
            margin-right: 10px;
            padding: 12px 30px;
            background: #fff;
            color: #667eea;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 2px solid #667eea;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-imprimir:hover {
            background: #f8f9fa;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #999;
            font-size: 14px;
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
            color: #999;
            font-size: 13px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
            }

            .mensaje {
                font-size: 14px;
            }

            .btn-volver, .btn-imprimir {
                display: block;
                margin: 10px 0;
            }
        }

        @media print {
            body {
                background: white;
            }

            .container {
                box-shadow: none;
            }

            .btn-volver, .btn-imprimir {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon {{ $estado }}">
            @if($estado == 'success')
                ✓
            @elseif($estado == 'error')
                ✕
            @else
                ⚠
            @endif
        </div>

        <h1>{{ $titulo }}</h1>
        <p class="mensaje">{{ $mensaje }}</p>

        @if(isset($detalles) && count($detalles) > 0)
            <div class="detalles">
                <div class="detalles-titulo">
                    <span>📋</span>
                    <span>Detalles</span>
                </div>
                @foreach($detalles as $label => $value)
                    <div class="detalles-item">
                        <span class="detalles-label">{{ $label }}:</span>
                        <span class="detalles-value">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="timestamp">
            <span>🕒</span>
            <span>{{ now()->format('d/m/Y H:i:s') }}</span>
        </div>

        <button onclick="window.print()" class="btn-imprimir">
            🖨️ Imprimir
        </button>
        <a href="javascript:window.close();" class="btn-volver">
            Cerrar ventana
        </a>

        <div class="footer">
            <p><strong>MED-SDI Sistema de Gestión Médica</strong></p>
            <p>© {{ date('Y') }} Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>
