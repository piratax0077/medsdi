<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: center; }
        th { background-color: #004a8f; color: white; }
        .no-border td { border: none; }
        .text-end { text-align: right; }
        .firma td { border: none; padding-top: 40px; }
    </style>
</head>
<body>
    <h3>Presupuesto Odontológico</h3>

    <!-- Resumen -->
    <table class="no-border">
        <tr>
            <td class="text-start"><strong>Paciente:</strong> {{ $paciente->nombres }} {{ $paciente->apellido_uno }}</td>
            <td class="text-end"><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</td>
        </tr>
    </table>

    <!-- Detalle de Tratamientos -->
    <h4>Detalle de Tratamientos</h4>
    <table>
        <thead>
            <tr>
                <th>Pieza Dental</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
                <th>Caras</th>
                <th>Valor</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($odontograma as $t)
            @if($t->urgencia == 1) @continue @endif
            <tr>
                <td>{{ $t->pieza }}</td>
                <td>{{ $t->diagnostico }}</td>
                <td>{{ $t->tratamiento }}</td>
                <td>{{ $t->caras ?? '-' }}</td>
                <td>${{ number_format($t->valor, 0, ',', '.') }}</td>
                <td>{{ $t->comentarios ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Insumos -->
    <h4>Insumos Utilizados</h4>
    <table>
        <thead>
            <tr>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos->where('presupuesto',1) as $i)
            <tr>
                <td>{{ $i->insumos }}</td>
                <td>{{ $i->cantidad }}</td>
                <td>{{ $i->tipo_insumo }}</td>
                <td>${{ number_format($i->valor * $i->cantidad, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Final -->
    <div class="text-end mt-4">
        @php
            $totalTratamientos = $valores_odontograma[0] + $valores_odontograma[1] + $valores_odontograma[2];

        @endphp
        <h4>Total Presupuesto: <span style="color: #004a8f;">${{ number_format($totalTratamientos, 0, ',', '.') }}</span></h4>
    </div>

    <!-- Firmas -->
    <table class="firma w-100 text-center">
        <tr>
            <td>
                <p>__________________________</p>
                <p><strong>Firma Profesional</strong></p>
            </td>
            <td>
                <p>__________________________</p>
                <p><strong>Firma Paciente</strong></p>
            </td>
        </tr>
    </table>
</body>
</html>
