<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Nutricion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #17a2b8;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #17a2b8;
            margin: 0;
            font-size: 22px;
        }
        .header p {
            color: #666;
            margin: 6px 0 0;
            font-size: 13px;
        }
        .content {
            line-height: 1.7;
            color: #333;
        }
        .info-box {
            background-color: #f0f9fb;
            border-left: 4px solid #17a2b8;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .info-row {
            margin: 8px 0;
            font-size: 14px;
        }
        .label {
            font-weight: bold;
            color: #17a2b8;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #999;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Informe de Nutricion</h1>
            <p>MED-SDI - Sistema de Informacion Medica</p>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $nombre_paciente ?? '' }}</strong>,</p>

            <p>Adjunto encontraras el informe de nutricion generado por tu profesional tratante.</p>

            <div class="info-box">
                @if(!empty($nombre_profesional))
                <div class="info-row">
                    <span class="label">Profesional:</span> {{ $nombre_profesional }}
                </div>
                @endif
                @if(!empty($especialidad_profesional))
                <div class="info-row">
                    <span class="label">Especialidad:</span> {{ $especialidad_profesional }}
                </div>
                @endif
                @if(!empty($lugar_atencion))
                <div class="info-row">
                    <span class="label">Centro:</span> {{ $lugar_atencion }}
                </div>
                @endif
                <div class="info-row">
                    <span class="label">Fecha:</span> {{ date('d/m/Y') }}
                </div>
            </div>

            <p>El documento se encuentra adjunto en formato PDF a este correo.</p>
            <p>Si tienes consultas, no dudes en contactar a tu centro de atencion.</p>
        </div>

        <div class="footer">
            <p>Este correo fue generado automaticamente por MED-SDI.</p>
            <p>Por favor no responder a este mensaje.</p>
        </div>
    </div>
</body>
</html>
