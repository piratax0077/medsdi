<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Informe de Dictado</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 12px;
            color: #222;
            margin: 0;
            padding: 30px 40px;
        }
        .encabezado {
            text-align: center;
            border-bottom: 2px solid #17a2b8;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .encabezado h2 {
            font-size: 16px;
            margin: 0 0 4px 0;
            color: #17a2b8;
        }
        .encabezado .fecha {
            font-size: 11px;
            color: #555;
        }
        .contenido {
            line-height: 1.8;
            font-size: 12px;
        }
        .contenido p { margin: 6px 0; }
        .contenido ul, .contenido ol { margin: 6px 0 6px 20px; }
        .contenido h1 { font-size: 15px; }
        .contenido h2 { font-size: 14px; }
        .contenido h3 { font-size: 13px; }
        .pie {
            margin-top: 40px;
            border-top: 1px solid #ccc;
            padding-top: 8px;
            font-size: 10px;
            color: #999;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="encabezado">
        <h2>Informe de Dictado</h2>
        <div class="fecha">{{ \Carbon\Carbon::now()->isoFormat('D [de] MMMM [de] YYYY') }}</div>
    </div>

    <div class="contenido">
        {!! $contenido_html !!}
    </div>

    <div class="pie">
        Generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </div>
</body>
</html>
