<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de Implante</h1>
    <p><strong>Paciente ID:</strong> {{ $id_paciente }}</p>
    <p><strong>Cirujano:</strong> {{ $nombre_cir }}</p>
    <p><strong>Anestesista:</strong> {{ $nombre_anest }}</p>
    <p><strong>Arsenalera:</strong> {{ $nombre_ars }}</p>
    <p><strong>Implantes:</strong> {{ $implantes }}</p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach ($insumos_array as $implante)
                <tr>
                    <td>{{ $implante['insumos'] }}</td>
                    <td>{{ $implante['nombre_marca'] }}</td>
                    <td>{{ $implante['cantidad'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Forma del Material:</strong> {{ $forma_mat_impl }}</p>
    <p><strong>Prótesis sobre Implante:</strong> {{ $prot_prot_corona }}</p>
    <p><strong>Detalles de Cirugía:</strong> {{ $det_cir }}</p>
    <p><strong>Material de Toma de Impresión:</strong> {{ $nombre_tons }}</p>
    <p><strong>Piezas Implantadas:</strong></p>
    <ul>
        @foreach ($prot_pieza_imp as $pieza)
            <li>{{ $pieza }}</li>
        @endforeach
    </ul>
</body>
</html>
