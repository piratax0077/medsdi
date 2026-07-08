<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Resumen de Tratamiento</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .patient-info {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f5f5f5;
        }
        .patient-info table {
            width: 100%;
        }
        .patient-info td {
            padding: 5px;
        }
        .patient-info strong {
            display: inline-block;
            width: 120px;
        }
        .content {
            margin-top: 20px;
            line-height: 1.6;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>RESUMEN DE CONTROL Y TRATAMIENTO DE ENFERMERIA</h1>
    </div>

    <div class="patient-info">
        <table>
            <tr>
                <td><strong>Paciente:</strong> {{ $nombre_completo }}</td>
                <td><strong>RUT:</strong> {{ isset($paciente->rut) ? $paciente->rut : 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Fecha Nacimiento:</strong>
                    @if(isset($paciente->fecha_nac) && $paciente->fecha_nac)
                        {{ date('d-m-Y', strtotime($paciente->fecha_nac)) }}
                    @else
                        N/A
                    @endif
                </td>
                <td><strong>Fecha de Generacion:</strong> {{ date('d-m-Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <div class="content">
        {!! nl2br(e($resumen_text)) !!}
    </div>

    <div> class="content">
        <h3>Observaciones:</h3>
        {!! nl2br(e($observaciones)) !!}
    </div>

    <div class="footer">
        <p>Documento generado automaticamente el {{ date('d/m/Y') }} a las {{ date('H:i') }} hrs.</p>
    </div>
</body>
</html>
