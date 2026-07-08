<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hora cancelada</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef3f9;
            font-family: Arial, Helvetica, sans-serif;
            color: #0f172a;
        }
        .wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .card {
            width: 100%;
            max-width: 560px;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(15, 23, 42, .12);
        }
        .bar {
            height: 7px;
            background: linear-gradient(90deg, #dc2626, #f97316);
        }
        .content {
            padding: 34px 30px;
            text-align: center;
        }
        .icon {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: #fee2e2;
            color: #dc2626;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            margin-bottom: 18px;
            font-weight: bold;
        }
        h1 {
            margin: 0 0 10px 0;
            color: #dc2626;
            font-size: 25px;
            line-height: 32px;
        }
        p {
            margin: 0;
            color: #475569;
            font-size: 15px;
            line-height: 23px;
        }
        .box {
            margin-top: 22px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px;
            text-align: left;
        }
        .box p {
            font-size: 14px;
            margin-bottom: 6px;
        }
        .box p:last-child {
            margin-bottom: 0;
        }
        .footer {
            background: #f1f5f9;
            padding: 16px;
            text-align: center;
            color: #64748b;
            font-size: 12px;
        }
        .btn {
            margin-top: 24px;
            display: inline-block;
            background: #dc2626;
            color: #ffffff;
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            <div class="bar"></div>
            <div class="content">
                <div class="icon">×</div>
                <h1>{{ $titulo ?? 'Hora cancelada correctamente' }}</h1>
                <p>{{ $mensaje ?? 'Tu hora médica fue cancelada exitosamente.' }}</p>

                <div class="box">
                    <p><strong>Estado:</strong> Cancelada</p>
                    @if(isset($hora_medica))
                        <p><strong>Fecha:</strong> {{ $hora_medica->fecha_consulta ?? '' }}</p>
                        <p><strong>Hora:</strong> {{ $hora_medica->hora_inicio ?? '' }}</p>
                    @endif
                </div>

                <a href="{{ url('/') }}" class="btn">Volver al inicio</a>
            </div>
            <div class="footer">
                SDI · Salud Digital Integrada<br>
                &copy; {{ date('Y') }} · Todos los derechos reservados
            </div>
        </div>
    </div>
</body>
</html>
