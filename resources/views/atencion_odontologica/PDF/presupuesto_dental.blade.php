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
        .encabezado { margin: 0 0 14px; border: none; }
        .encabezado td { border: none; vertical-align: middle; }
        .logo-medsdi { width: 190px; height: auto; }
        .titulo-documento { text-align: right; color: #004a8f; }
        .titulo-documento h2 { margin: 0 0 4px; font-size: 20px; }
        .titulo-documento p { margin: 0; color: #66788a; }
        .datos-emision { margin-bottom: 12px; }
        .datos-emision td { width: 50%; padding: 9px 11px; text-align: left; vertical-align: top; }
        .datos-emision .titulo-bloque { display: block; margin-bottom: 5px; color: #004a8f; font-size: 12px; text-transform: uppercase; }
        .datos-emision span { display: block; margin-bottom: 2px; }
        .convenio { margin: 10px 0 14px; padding: 9px 12px; border: 1px solid #9ed9c0; background: #edf9f3; color: #176b45; }
        .resumen-total { width: 44%; margin: 16px 0 0 auto; }
        .resumen-total td { text-align: right; }
        .resumen-total .total td { background: #004a8f; color: white; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>
    @php
        $profesional = $profesional ?? null;
        $lugarAtencion = $lugarAtencion ?? null;
    @endphp
    <table class="encabezado">
        <tr>
            <td><img class="logo-medsdi" src="{{ public_path('images/logo_.png') }}" alt="MEDSDI"></td>
            <td class="titulo-documento">
                <h2>{{ !empty($esPresupuestoUrgencia) ? 'Presupuesto de Urgencia Odontol&oacute;gica' : 'Presupuesto Odontol&oacute;gico' }}</h2>
                @if(!empty($presupuestoReporte))
                    <p>Presupuesto N.&ordm; {{ $presupuestoReporte->id }}</p>
                @endif
            </td>
        </tr>
    </table>

    <table class="datos-emision">
        <tr>
            <td>
                <strong class="titulo-bloque">Profesional tratante</strong>
                <span><strong>{{ trim(($profesional->nombre ?? '').' '.($profesional->apellido_uno ?? '').' '.($profesional->apellido_dos ?? '')) }}</strong></span>
                @if(data_get($profesional ?? null, 'TipoEspecialidad.nombre'))<span>{{ data_get($profesional, 'TipoEspecialidad.nombre') }}</span>@endif
                @if($profesional->rut ?? null)<span>RUT: {{ $profesional->rut }}</span>@endif
                @if($profesional->telefono_uno ?? null)<span>Tel.: {{ $profesional->telefono_uno }}</span>@endif
                @if($profesional->email ?? null)<span>{{ $profesional->email }}</span>@endif
            </td>
            <td>
                <strong class="titulo-bloque">Lugar de atenci&oacute;n</strong>
                <span><strong>{{ $lugarAtencion->nombre ?? 'No informado' }}</strong></span>
                @if(data_get($lugarAtencion ?? null, 'Direccion.direccion'))
                    <span>{{ data_get($lugarAtencion, 'Direccion.direccion') }} {{ data_get($lugarAtencion, 'Direccion.numero_dir') }}</span>
                @endif
                @if(data_get($lugarAtencion ?? null, 'Direccion.Ciudad.nombre'))<span>{{ data_get($lugarAtencion, 'Direccion.Ciudad.nombre') }}</span>@endif
                @if($lugarAtencion->telefono ?? null)<span>Tel.: {{ $lugarAtencion->telefono }}</span>@endif
                @if($lugarAtencion->email ?? null)<span>{{ $lugarAtencion->email }}</span>@endif
            </td>
        </tr>
    </table>

    <!-- Resumen -->
    <table class="no-border">
        <tr>
            <td class="text-start"><strong>Paciente:</strong> {{ $paciente->nombres }} {{ $paciente->apellido_uno }}</td>
            <td class="text-end"><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</td>
        </tr>
    </table>

    @if(($porcentajeDescuento ?? 0) > 0)
        <div class="convenio">
            <strong>Convenio aplicado:</strong> {{ $convenioAplicado->nombre_convenio ?? 'Convenio' }}
            &mdash; {{ number_format($porcentajeDescuento, 0, ',', '.') }}% de descuento
        </div>
    @endif

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
                <th>Descuento</th>
                <th>Total</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($odontograma as $t)
            <tr>
                <td>{{ $t->pieza }}</td>
                <td>{{ $t->diagnostico }}</td>
                <td>{{ $t->tratamiento }}</td>
                <td>{{ $t->caras ?? '-' }}</td>
                <td>${{ number_format($t->valor, 0, ',', '.') }}</td>
                <td>${{ number_format(round($t->valor * (($porcentajeDescuento ?? 0) / 100)), 0, ',', '.') }}</td>
                <td>${{ number_format($t->valor - round($t->valor * (($porcentajeDescuento ?? 0) / 100)), 0, ',', '.') }}</td>
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
                <th>Sub-Total</th>
                <th>Descuento</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos->where('presupuesto',1) as $i)
            <tr>
                <td>{{ $i->insumos }}</td>
                <td>{{ $i->cantidad }}</td>
                <td>{{ $i->tipo_insumo }}</td>
                @php
                    $subtotalInsumo = $i->valor * $i->cantidad;
                    $descuentoInsumo = round($subtotalInsumo * (($porcentajeDescuento ?? 0) / 100));
                @endphp
                <td>${{ number_format($subtotalInsumo, 0, ',', '.') }}</td>
                <td>${{ number_format($descuentoInsumo, 0, ',', '.') }}</td>
                <td>${{ number_format($subtotalInsumo - $descuentoInsumo, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Final -->
    <table class="resumen-total">
        <tr><td><strong>Sub-Total</strong></td><td>${{ number_format($subtotalPresupuesto, 0, ',', '.') }}</td></tr>
        <tr><td><strong>Descuento ({{ number_format($porcentajeDescuento, 0, ',', '.') }}%)</strong></td><td>-${{ number_format($descuentoPresupuesto, 0, ',', '.') }}</td></tr>
        <tr class="total"><td>Total Presupuesto</td><td>${{ number_format($totalPresupuesto, 0, ',', '.') }}</td></tr>
    </table>

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
