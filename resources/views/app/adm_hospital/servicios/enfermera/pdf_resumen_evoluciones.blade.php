<html>
<head>
    <title>Resumen de Evoluciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .evolucion {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #000;
            border-radius: 5px;
        }
        .evolucion-header {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .evolucion-content {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <h1>Resumen de Evoluciones</h1>

    @foreach($resumen as $evolucion)
        <div class="evolucion">
            <div class="evolucion-header">
                Fecha: {{ $evolucion['fecha'] }} | Responsable: {{ $evolucion['responsable'] }}
            </div>
            <div class="evolucion-content">
                {{ $evolucion['resumen'] }}
            </div>
        </div>
    @endforeach
</body>
</html>
