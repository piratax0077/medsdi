<!DOCTYPE html>
<html>
<head>
    <title>Reporte Mensual - {{ $mes }} {{ $anio }}</title>
    <style>
        /* Agrega estilos personalizados para el PDF aquí */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte Mensual - {{ $mes }} {{ $anio }}</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Código Interno</th>
                <th>Tipo de Producto</th>
                <th>Unidad de Medida</th>
                <th>Marca</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reporteMensual as $detalle)
                <tr>
                    <td>{{ $detalle->producto }}</td>
                    <td>{{ $detalle->codigo_interno }}</td>
                    <td>{{ $detalle->tipo_producto }}</td>
                    <td>{{ $detalle->unidad_medida }}</td>
                    <td>{{ $detalle->marca }}</td>
                    <td>{{ $detalle->observaciones }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
