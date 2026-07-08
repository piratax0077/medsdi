<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe Rehabilitación Vestibular</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 11px; margin: 18px; color: #222; }
        h1 { text-align: center; font-size: 14px; text-transform: uppercase; margin-bottom: 2px; color: #1a4a7a; }
        h2 { font-size: 11px; text-transform: uppercase; background: #1a4a7a; color: #fff; padding: 4px 6px; margin: 12px 0 4px 0; }
        h3 { font-size: 10px; text-transform: uppercase; background: #e0e8f5; color: #1a4a7a; padding: 3px 6px; margin: 8px 0 4px 0; }
        .subtitle { text-align: center; font-size: 10px; color: #555; margin-bottom: 10px; }
        table.info { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        table.info td { padding: 4px 6px; border: 1px solid #ccc; vertical-align: top; }
        table.info td.lbl { background: #f0f4fa; font-weight: bold; width: 22%; }
        table.tests { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        table.tests thead tr th { background: #d6e4f7; padding: 4px 6px; border: 1px solid #bcd; font-size: 10px; text-align: left; }
        table.tests tbody tr td { padding: 4px 6px; border: 1px solid #ccc; font-size: 10px; vertical-align: top; }
        table.tests tbody tr:nth-child(even) td { background: #f8fbff; }
        .score-ini  { color: #856404; font-weight: bold; }
        .score-act  { color: #155724; font-weight: bold; }
        .obs-box { background: #fafafa; border: 1px solid #ddd; padding: 5px 8px; font-style: italic; color: #444; min-height: 16px; }
        .conclusion-box { background: #fff8e1; border: 1px solid #ffe082; padding: 8px 10px; font-size: 11px; min-height: 24px; }
        .footer { margin-top: 30px; border-top: 1px solid #ccc; padding-top: 8px; display: table; width: 100%; }
        .footer-left  { display: table-cell; width: 60%; font-size: 10px; color: #555; }
        .footer-right { display: table-cell; text-align: right; font-size: 10px; color: #555; }
        .firma { margin-top: 50px; text-align: center; }
        .firma-linea { border-top: 1px solid #333; width: 220px; margin: 0 auto; padding-top: 4px; font-size: 10px; color: #333; }
        @page { margin: 15mm; }
    </style>
</head>
<body>

    <h1>Informe de Rehabilitación Vestibular</h1>
    <p class="subtitle">MediChile — Fecha de emisión: {{ $fecha }}</p>

    {{-- ── DATOS PACIENTE ── --}}
    <h2>Datos del Paciente</h2>
    <table class="info">
        <tr>
            <td class="lbl">Nombre</td>
            <td>{{ ($paciente->nombres ?? '') . ' ' . ($paciente->apellido_uno ?? '') . ' ' . ($paciente->apellido_dos ?? '') }}</td>
            <td class="lbl">RUT</td>
            <td>{{ $paciente->rut ?? '—' }}</td>
        </tr>
        <tr>
            <td class="lbl">Fecha Nac.</td>
            <td>{{ $paciente && $paciente->fecha_nac ? \Carbon\Carbon::parse($paciente->fecha_nac)->format('d/m/Y') : '—' }}</td>
            <td class="lbl">Edad</td>
            <td>{{ $edad }}</td>
        </tr>
    </table>

    {{-- ── DATOS INFORME ── --}}
    <h2>Datos del Informe</h2>
    <table class="info">
        <tr>
            <td class="lbl">Fecha informe</td>
            <td>{{ !empty($datos['fecha']) ? \Carbon\Carbon::parse($datos['fecha'])->format('d/m/Y') : $fecha }}</td>
            <td class="lbl">Médico tratante</td>
            <td>{{ $datos['med_tte'] ?? '—' }}</td>
        </tr>
        <tr>
            <td class="lbl">Diagnóstico</td>
            <td colspan="3">{{ $datos['dg'] ?? '—' }}</td>
        </tr>
        <tr>
            <td class="lbl">Sesiones programadas</td>
            <td>{{ $datos['ses_prog'] ?? '—' }}</td>
            <td class="lbl">Sesiones pendientes</td>
            <td>{{ $datos['ses_pend'] ?? '—' }}</td>
        </tr>
        <tr>
            <td class="lbl">Fecha eval. inicial</td>
            <td>{{ !empty($datos['eval_ini']) ? \Carbon\Carbon::parse($datos['eval_ini'])->format('d/m/Y') : '—' }}</td>
            <td class="lbl">Fecha eval. actual</td>
            <td>{{ !empty($datos['eval_act']) ? \Carbon\Carbon::parse($datos['eval_act'])->format('d/m/Y') : '—' }}</td>
        </tr>
    </table>

    {{-- ── APRECIACION E INTERPRETACION ── --}}
    <h2>Apreciación e Interpretación del Tratamiento</h2>

    <table class="tests">
        <thead>
            <tr>
                <th style="width:35%">Test</th>
                <th style="width:15%">Puntos Inicio</th>
                <th style="width:15%">Puntos Actuales</th>
                <th style="width:35%">Comentario</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Test Agudeza Visual</strong></td>
                <td class="score-ini">{{ $datos['avisual_ini'] ?? '—' }}</td>
                <td class="score-act">{{ $datos['avisual_act'] ?? '—' }}</td>
                <td>{{ $datos['com_avisual'] ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Test Apoyo Monopodal</strong></td>
                <td class="score-ini">{{ $datos['amonopodal_ini'] ?? '—' }}</td>
                <td class="score-act">{{ $datos['amonopodal_act'] ?? '—' }}</td>
                <td>{{ $datos['com_amonopodal'] ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Test Alcance Funcional</strong></td>
                <td class="score-ini">{{ $datos['alcfunc_ini'] ?? '—' }}</td>
                <td class="score-act">{{ $datos['alcfunc_act'] ?? '—' }}</td>
                <td>{{ $datos['com_alcfunc'] ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Timed Up and Go (TUG)</strong></td>
                <td class="score-ini">{{ $datos['tugo_ini'] ?? '—' }}</td>
                <td class="score-act">{{ $datos['tugo_act'] ?? '—' }}</td>
                <td>{{ $datos['com_tugo'] ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Test Marcha Dinámica (DGI)</strong></td>
                <td class="score-ini">{{ $datos['dgi_ini'] ?? '—' }}</td>
                <td class="score-act">{{ $datos['dgi_act'] ?? '—' }}</td>
                <td>{{ $datos['com_dgi'] ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Discapacidad por Mareo (DHI)</strong></td>
                <td class="score-ini">{{ $datos['dhi_ini'] ?? '—' }}</td>
                <td class="score-act">{{ $datos['dhi_act'] ?? '—' }}</td>
                <td>{{ $datos['com_dhi'] ?? '' }}</td>
            </tr>
        </tbody>
    </table>

    {{-- ── CONCLUSION ── --}}
    <h2>Conclusión y Apreciación del Profesional</h2>
    <div class="conclusion-box">
        {{ $datos['conclusion'] ?? '' }}
    </div>

    {{-- ── PROXIMO CONTROL ── --}}
    @if(!empty($datos['prox_ctrl']))
    <h2>Próximo Control</h2>
    <table class="info">
        <tr>
            <td class="lbl">Fecha próximo control</td>
            <td>{{ \Carbon\Carbon::parse($datos['prox_ctrl'])->format('d/m/Y') }}</td>
        </tr>
    </table>
    @endif

    {{-- ── FIRMA ── --}}
    <div class="firma">
        <div class="firma-linea">
            {{ $datos['nomb_prof'] ?? (($profesional->nombres ?? '') . ' ' . ($profesional->apellido_uno ?? '')) }}<br>
            Fonoaudiólogo/a
        </div>
    </div>

    {{-- ── FOOTER ── --}}
    <div class="footer">
        <div class="footer-left">
            MediChile — Informe de Rehabilitación Vestibular
        </div>
        <div class="footer-right">
            Emitido el {{ $fecha }}
        </div>
    </div>

</body>
</html>
