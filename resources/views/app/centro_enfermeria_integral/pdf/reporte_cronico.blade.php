<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Control Crónico - {{ ucfirst($tipo) }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 30px 40px;
        }
        /* ── Encabezado ───────────────────────────── */
        .header {
            background-color: #2c6fad;
            color: #fff;
            padding: 12px 16px;
            margin-bottom: 14px;
        }
        .header h1 { font-size: 16px; margin-bottom: 2px; }
        .header p  { font-size: 10px; opacity: 0.85; }
        .header-meta {
            float: right;
            text-align: right;
            font-size: 10px;
        }
        /* ── Sección datos del paciente ──────────────*/
        .section-title {
            background-color: #eaf0fb;
            color: #2c6fad;
            font-weight: bold;
            font-size: 11px;
            padding: 5px 10px;
            border-left: 4px solid #2c6fad;
            margin-bottom: 8px;
            margin-top: 12px;
        }
        .patient-box {
            border: 1px solid #c9d8f0;
            border-radius: 4px;
            padding: 8px 12px;
            margin-bottom: 14px;
            background: #f7faff;
        }
        .patient-row {
            display: table;
            width: 100%;
            margin-bottom: 4px;
        }
        .patient-cell {
            display: table-cell;
            width: 33.33%;
        }
        .patient-cell strong { color: #2c6fad; }
        /* ── Tabla de registros ──────────────────── */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        thead tr th {
            background-color: #2c6fad;
            color: #fff;
            padding: 6px 8px;
            text-align: center;
            font-size: 10px;
        }
        tbody tr td {
            padding: 5px 8px;
            border-bottom: 1px solid #dde5f0;
            text-align: center;
            font-size: 10px;
        }
        tbody tr:nth-child(even) { background-color: #f2f6fc; }
        /* ── Resumen estadístico ─────────────────── */
        .stats-box {
            background: #f0f7ff;
            border: 1px solid #c9d8f0;
            border-radius: 4px;
            padding: 8px 12px;
            margin-bottom: 14px;
        }
        .stats-row {
            display: table;
            width: 100%;
        }
        .stats-cell {
            display: table-cell;
            padding: 4px 6px;
            text-align: center;
        }
        .stats-cell .value {
            font-size: 15px;
            font-weight: bold;
            color: #2c6fad;
        }
        .stats-cell .label {
            font-size: 9px;
            color: #666;
        }
        /* ── Alerta clínica ─────────────────────── */
        .alert-box {
            border-radius: 4px;
            padding: 6px 10px;
            margin-bottom: 10px;
            font-size: 10px;
        }
        .alert-warning { background:#fff8e1; border:1px solid #ffe082; color:#795548; }
        .alert-ok      { background:#e8f5e9; border:1px solid #a5d6a7; color:#2e7d32; }
        .alert-danger  { background:#ffebee; border:1px solid #ef9a9a; color:#c62828; }
        /* ── Pie de página ──────────────────────── */
        .footer {
            margin-top: 20px;
            border-top: 1px solid #c9d8f0;
            padding-top: 6px;
            font-size: 9px;
            color: #888;
            text-align: center;
        }
        .no-data {
            text-align: center;
            color: #999;
            padding: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>

{{-- ═══ ENCABEZADO ═══════════════════════════════ --}}
<div class="header">
    <div class="header-meta">
        Fecha emisión: {{ $fecha }}<br>
        Documento confidencial
    </div>
    <h1>Reporte de Control Crónico</h1>
    <p>
        @if($tipo === 'obesidad')   Control de Obesidad
        @elseif($tipo === 'hipertension') Control de Hipertensión Arterial
        @elseif($tipo === 'diabetes')     Control de Diabetes
        @endif
    </p>
</div>

{{-- ═══ DATOS DEL PACIENTE ══════════════════════ --}}
<div class="section-title">&#9679; Datos del Paciente</div>
<div class="patient-box">
    <div class="patient-row">
        <div class="patient-cell"><strong>RUT:</strong> {{ $paciente->rut ?? '-' }}</div>
        <div class="patient-cell"><strong>Nombre:</strong> {{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }} {{ $paciente->apellido_dos ?? '' }}</div>
        <div class="patient-cell"><strong>Fecha Nac.:</strong> {{ $paciente->fecha_nac ?? '-' }}</div>
    </div>
    <div class="patient-row">
        <div class="patient-cell"><strong>Teléfono:</strong> {{ $paciente->telefono_uno ?? '-' }}</div>
        <div class="patient-cell"><strong>Email:</strong> {{ $paciente->email ?? '-' }}</div>
        <div class="patient-cell">
            <strong>Dirección:</strong>
            {{ $paciente->Direccion->direccion ?? '-' }}
        </div>
    </div>
</div>

{{-- ═══ RESUMEN ESTADÍSTICO ══════════════════════ --}}
@if($registros->count() > 0)
<div class="section-title">&#9679; Resumen Estadístico</div>
<div class="stats-box">
    <div class="stats-row">
        <div class="stats-cell">
            <div class="value">{{ $registros->count() }}</div>
            <div class="label">Controles registrados</div>
        </div>

        {{-- ── Obesidad ── --}}
        @if($tipo === 'obesidad')
            @php
                $pesos  = $registros->pluck('peso')->filter()->map(fn($v) => (float)$v);
                $ultimo = $registros->last();
            @endphp
            <div class="stats-cell">
                <div class="value">{{ $pesos->min() ?? '-' }} kg</div>
                <div class="label">Peso mínimo</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $pesos->max() ?? '-' }} kg</div>
                <div class="label">Peso máximo</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $pesos->count() ? number_format($pesos->avg(), 1) : '-' }} kg</div>
                <div class="label">Promedio peso</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $ultimo->peso ?? '-' }} kg</div>
                <div class="label">Último peso</div>
            </div>
        @endif

        {{-- ── Hipertensión ── --}}
        @if($tipo === 'hipertension')
            @php
                $sis  = $registros->pluck('sistolica')->filter()->map(fn($v) => (float)$v);
                $dias = $registros->pluck('diastolica')->filter()->map(fn($v) => (float)$v);
                $ultimo = $registros->last();
            @endphp
            <div class="stats-cell">
                <div class="value">{{ $sis->count() ? number_format($sis->avg(), 0) : '-' }} mmHg</div>
                <div class="label">Sistólica promedio</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $dias->count() ? number_format($dias->avg(), 0) : '-' }} mmHg</div>
                <div class="label">Diastólica promedio</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ ($ultimo->sistolica ?? '-') . ' / ' . ($ultimo->diastolica ?? '-') }}</div>
                <div class="label">Última medición</div>
            </div>
        @endif

        {{-- ── Diabetes ── --}}
        @if($tipo === 'diabetes')
            @php
                $hgac1   = $registros->pluck('hgac1')->filter()->map(fn($v) => (float)$v);
                $ultimo  = $registros->last();
            @endphp
            <div class="stats-cell">
                <div class="value">{{ $hgac1->count() ? number_format($hgac1->avg(), 1) : '-' }} %</div>
                <div class="label">HbA1c promedio</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $hgac1->min() ?? '-' }} %</div>
                <div class="label">HbA1c mínimo</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $hgac1->max() ?? '-' }} %</div>
                <div class="label">HbA1c máximo</div>
            </div>
            <div class="stats-cell">
                <div class="value">{{ $ultimo->hgac1 ?? '-' }} %</div>
                <div class="label">Último HbA1c</div>
            </div>
        @endif
    </div>
</div>

{{-- ── Alerta clínica ── --}}
@if($tipo === 'obesidad')
    @php $ultimoPeso = (float)($registros->last()->peso ?? 0); @endphp
    @if($ultimoPeso >= 30)
        <div class="alert-box alert-danger">&#9888; Alerta: Último peso registrado ({{ $ultimoPeso }} kg) sugiere revisar plan nutricional.</div>
    @elseif($ultimoPeso > 0)
        <div class="alert-box alert-ok">&#10003; Último peso dentro de rango monitoreable.</div>
    @endif
@elseif($tipo === 'hipertension')
    @php
        $ultimoSis  = (int)($registros->last()->sistolica ?? 0);
        $ultimoDias = (int)($registros->last()->diastolica ?? 0);
    @endphp
    @if($ultimoSis >= 140 || $ultimoDias >= 90)
        <div class="alert-box alert-danger">&#9888; Alerta: Última medición ({{ $ultimoSis }}/{{ $ultimoDias }} mmHg) indica hipertensión. Requiere atención.</div>
    @elseif($ultimoSis > 0)
        <div class="alert-box alert-ok">&#10003; Última presión arterial dentro de rangos normales.</div>
    @endif
@elseif($tipo === 'diabetes')
    @php $ultimoHba = (float)($registros->last()->hgac1 ?? 0); @endphp
    @if($ultimoHba >= 6.5)
        <div class="alert-box alert-danger">&#9888; Alerta: HbA1c {{ $ultimoHba }}% supera el límite diagnóstico de diabetes (≥6.5%).</div>
    @elseif($ultimoHba >= 5.7)
        <div class="alert-box alert-warning">&#9888; Precaución: HbA1c {{ $ultimoHba }}% en rango de prediabetes (5.7%-6.4%).</div>
    @elseif($ultimoHba > 0)
        <div class="alert-box alert-ok">&#10003; HbA1c {{ $ultimoHba }}% dentro de rangos normales.</div>
    @endif
@endif

@endif {{-- fin si hay registros --}}

{{-- ═══ GRÁFICO DE EVOLUCIÓN ══════════════════════ --}}
@if(!empty($chart_image))
<div class="section-title">&#9679; Gráfico de Evolución</div>
<div style="text-align:center; margin-bottom:14px;">
    <img src="{{ $chart_image }}" style="max-width:100%; height:auto; border:1px solid #c9d8f0; border-radius:4px;" alt="Gráfico de evolución">
</div>
@endif

{{-- ═══ HISTORIAL DE CONTROLES ═════════════════════ --}}
<div class="section-title">&#9679; Historial de Controles</div>

@if($registros->count() === 0)
    <div class="no-data">No hay controles registrados para este paciente.</div>
@else

    {{-- ── Tabla Obesidad ── --}}
    @if($tipo === 'obesidad')
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Peso (kg)</th>
                <th>Variación</th>
                <th>Peso Ideal</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $i => $r)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ isset($r->created_at) ? \Carbon\Carbon::parse($r->created_at)->format('d-m-Y') : '-' }}</td>
                <td>{{ $r->peso ?? '-' }}</td>
                <td>{{ $r->variacion ?? '-' }}</td>
                <td>{{ $r->ideal ?? '-' }}</td>
                <td>{{ $r->responsable ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ── Tabla Hipertensión ── --}}
    @if($tipo === 'hipertension')
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Presión Sistólica (mmHg)</th>
                <th>Presión Diastólica (mmHg)</th>
                <th>Presión Ideal</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $i => $r)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ isset($r->created_at) ? \Carbon\Carbon::parse($r->created_at)->format('d-m-Y') : '-' }}</td>
                <td>{{ $r->sistolica ?? '-' }}</td>
                <td>{{ $r->diastolica ?? '-' }}</td>
                <td>{{ $r->ideal ?? '-' }}</td>
                <td>{{ $r->responsable ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ── Tabla Diabetes ── --}}
    @if($tipo === 'diabetes')
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Peso</th>
                <th>Piés</th>
                <th>HbA1c (%)</th>
                <th>Colesterol</th>
                <th>Creatina</th>
                <th>Glic. Ayuno</th>
                <th>Glic. Postprandial</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $i => $r)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ isset($r->created_at) ? \Carbon\Carbon::parse($r->created_at)->format('d-m-Y') : '-' }}</td>
                <td>{{ $r->peso ?? '-' }}</td>
                <td>{{ $r->pies ?? '-' }}</td>
                <td>{{ $r->hgac1 ?? '-' }}</td>
                <td>{{ $r->colesterol ?? '-' }}</td>
                <td>{{ $r->creatina ?? '-' }}</td>
                <td>{{ $r->glicosinada_ayuno ?? '-' }}</td>
                <td>{{ $r->glicosilada_postprandial ?? '-' }}</td>
                <td>{{ $r->responsable ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

@endif

{{-- ═══ PIE DE PÁGINA ═══════════════════════════════ --}}
<div class="footer">
    Reporte generado automáticamente por el sistema MediChile &mdash; {{ $fecha }} &mdash; Documento de uso interno, confidencial.
</div>

</body>
</html>
