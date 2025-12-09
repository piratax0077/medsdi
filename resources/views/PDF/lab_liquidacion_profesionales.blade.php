<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo ?? 'Liquidación de Sueldo' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .header p {
            font-size: 10px;
            color: #666;
        }
        .info-empresa {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .info-empresa p {
            margin: 3px 0;
        }
        .info-trabajador {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .info-trabajador table {
            width: 100%;
        }
        .info-trabajador td {
            padding: 4px;
        }
        .info-trabajador td:first-child {
            font-weight: bold;
            width: 30%;
        }
        .liquidacion-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .liquidacion-table th {
            background-color: #4a5568;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }
        .liquidacion-table td {
            border: 1px solid #ddd;
            padding: 6px;
        }
        .liquidacion-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .columna-haberes {
            width: 50%;
            vertical-align: top;
        }
        .columna-descuentos {
            width: 50%;
            vertical-align: top;
        }
        .monto {
            text-align: right;
            font-weight: bold;
        }
        .total-row {
            background-color: #e2e8f0 !important;
            font-weight: bold;
        }
        .total-liquido {
            background-color: #4a5568 !important;
            color: white;
            font-size: 13px;
        }
        .firma-section {
            margin-top: 40px;
            text-align: center;
        }
        .firma-linea {
            width: 300px;
            border-top: 1px solid #333;
            margin: 0 auto;
            margin-top: 50px;
        }
        .fecha-emision {
            text-align: right;
            font-size: 10px;
            color: #666;
            margin-top: 20px;
        }
        .texto-vertical {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 8px;
            color: #999;
            transform: rotate(-90deg);
            transform-origin: right bottom;
        }
    </style>
</head>
<body>
    <div class="texto-vertical">Este documento lo puedes validar en www.med-sdi.cl - Cód. {{ $codigo ?? 'N/A' }}</div>

    <!-- Encabezado -->
    <div class="header">
        <h1>LIQUIDACIÓN DE SUELDO</h1>
        <p>Período: {{ $periodo ?? date('m/Y') }}</p>
    </div>

    <!-- Información de la Empresa -->
    <div class="info-empresa">
        <p><strong>{{ $empresa['nombre'] ?? 'Nombre de la Empresa' }}</strong></p>
        <p>RUT: {{ $empresa['rut'] ?? 'XX.XXX.XXX-X' }}</p>
        <p>Dirección: {{ $empresa['direccion'] ?? 'Dirección de la empresa' }}</p>
        <p>Teléfono: {{ $empresa['telefono'] ?? '+56 X XXXX XXXX' }}</p>
    </div>

    <!-- Información del Trabajador -->
    <div class="info-trabajador">
        <table>
            <tr>
                <td>Nombre:</td>
                <td>{{ $trabajador['nombre'] ?? 'Nombre del Trabajador' }}</td>
                <td>RUT:</td>
                <td>{{ $trabajador['rut'] ?? 'XX.XXX.XXX-X' }}</td>
            </tr>
            <tr>
                <td>Cargo:</td>
                <td>{{ $trabajador['cargo'] ?? 'Cargo/Especialidad' }}</td>
                <td>Fecha Ingreso:</td>
                <td>{{ $trabajador['fecha_ingreso'] ?? 'DD/MM/AAAA' }}</td>
            </tr>
            <tr>
                <td>AFP:</td>
                <td>{{ $trabajador['afp'] ?? 'N/A' }}</td>
                <td>Salud:</td>
                <td>{{ $trabajador['salud'] ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <!-- Tabla de Liquidación -->
    <table class="liquidacion-table">
        <thead>
            <tr>
                <th colspan="2">HABERES</th>
                <th colspan="2">DESCUENTOS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="columna-haberes">
                    <table style="width: 100%;">
                        @if(isset($haberes) && count($haberes) > 0)
                            @foreach($haberes as $haber)
                                <tr>
                                    <td>{{ $haber['concepto'] }}</td>
                                    <td class="monto">${{ number_format($haber['monto'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Sueldo Base</td>
                                <td class="monto">${{ number_format($sueldo_base ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Bonos</td>
                                <td class="monto">${{ number_format($bonos ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Comisiones</td>
                                <td class="monto">${{ number_format($comisiones ?? 0, 0, ',', '.') }}</td>
                            </tr>
                        @endif
                        <tr class="total-row">
                            <td><strong>TOTAL HABERES</strong></td>
                            <td class="monto">${{ number_format($total_haberes ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </td>
                <td class="columna-descuentos">
                    <table style="width: 100%;">
                        @if(isset($descuentos) && count($descuentos) > 0)
                            @foreach($descuentos as $descuento)
                                <tr>
                                    <td>{{ $descuento['concepto'] }}</td>
                                    <td class="monto">${{ number_format($descuento['monto'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>AFP ({{ $porcentaje_afp ?? '10' }}%)</td>
                                <td class="monto">${{ number_format($descuento_afp ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Salud ({{ $porcentaje_salud ?? '7' }}%)</td>
                                <td class="monto">${{ number_format($descuento_salud ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Otros Descuentos</td>
                                <td class="monto">${{ number_format($otros_descuentos ?? 0, 0, ',', '.') }}</td>
                            </tr>
                        @endif
                        <tr class="total-row">
                            <td><strong>TOTAL DESCUENTOS</strong></td>
                            <td class="monto">${{ number_format($total_descuentos ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="total-liquido">
                <td colspan="3" style="text-align: right; padding-right: 10px;">LÍQUIDO A PAGAR:</td>
                <td class="monto" style="font-size: 14px;">${{ number_format($liquido_pagar ?? 0, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Observaciones -->
    @if(isset($observaciones) && $observaciones)
    <div style="margin-top: 15px; padding: 10px; border: 1px solid #ddd; background-color: #fffbeb;">
        <p><strong>Observaciones:</strong></p>
        <p>{{ $observaciones }}</p>
    </div>
    @endif

    <!-- Firma -->
    <div class="firma-section">
        <div class="firma-linea"></div>
        <p style="margin-top: 5px;">Firma del Trabajador</p>
        <p style="font-size: 9px; color: #666;">{{ $trabajador['nombre'] ?? '' }}</p>
    </div>

    <!-- Fecha de Emisión -->
    <div class="fecha-emision">
        <p>Fecha de emisión: {{ $fecha_emision ?? date('d/m/Y') }}</p>
    </div>
</body>
</html>
