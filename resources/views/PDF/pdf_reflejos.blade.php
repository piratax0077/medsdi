<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación Reflejos Osteotendineos</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 11px; margin: 18px; color: #222; }
        h1 { text-align: center; font-size: 14px; text-transform: uppercase; margin-bottom: 4px; color: #1a4a7a; }
        h2 { font-size: 11px; text-transform: uppercase; background: #1a4a7a; color: #fff; padding: 4px 8px; margin: 12px 0 4px 0; }
        .subtitle { text-align: center; font-size: 10px; color: #555; margin-bottom: 10px; }
        table.info { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        table.info td { padding: 4px 6px; border: 1px solid #ccc; vertical-align: top; }
        table.info td.lbl { background: #f0f4fa; font-weight: bold; width: 22%; }
        table.reflejos { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        table.reflejos th { background: #d6e4f7; padding: 5px 8px; border: 1px solid #bcd; font-size: 10px; text-align: left; }
        table.reflejos td { padding: 5px 8px; border: 1px solid #ccc; font-size: 10px; vertical-align: top; }
        table.reflejos tr:nth-child(even) td { background: #f8fbff; }
        table.reflejos td.num { text-align: center; font-weight: bold; color: #1a4a7a; width: 5%; }
        table.reflejos td.nombre { font-weight: bold; width: 28%; }
        .bloque { background: #fafafa; border: 1px solid #ddd; padding: 8px 10px; min-height: 30px; margin-top: 4px; color: #333; }
        .firma { margin-top: 50px; text-align: center; }
        .firma-linea { border-top: 1px solid #333; width: 220px; margin: 0 auto; }
        .firma-text { font-size: 10px; color: #555; margin-top: 4px; }
        .footer { margin-top: 20px; border-top: 1px solid #ccc; padding-top: 8px; }
        @page { margin: 15mm; }
    </style>
</head>
<body>

    <h1>Evaluación de Reflejos Osteotendineos</h1>
    <p class="subtitle">MediChile &mdash; Fecha de emisión: {{ $cuerpo['fecha'] ?? $date }}</p>

    {{-- DATOS PACIENTE --}}
    <h2>Datos del Paciente</h2>
    <table class="info">
        <tr>
            <td class="lbl">Nombre</td>
            <td>
                {{ $cuerpo['paciente']->nombres ?? '' }}
                {{ $cuerpo['paciente']->apellido_uno ?? '' }}
                {{ $cuerpo['paciente']->apellido_dos ?? '' }}
            </td>
            <td class="lbl">RUT</td>
            <td>{{ $cuerpo['paciente']->rut ?? '—' }}</td>
        </tr>
        @if(!empty($cuerpo['paciente']->fecha_nac))
        <tr>
            <td class="lbl">Fecha Nac.</td>
            <td>{{ \Carbon\Carbon::parse($cuerpo['paciente']->fecha_nac)->format('d/m/Y') }}</td>
            <td class="lbl">Edad</td>
            <td>{{ \Carbon\Carbon::parse($cuerpo['paciente']->fecha_nac)->age }} años</td>
        </tr>
        @endif
    </table>

    {{-- DATOS PROFESIONAL --}}
    <h2>Profesional Evaluador</h2>
    <table class="info">
        <tr>
            <td class="lbl">Nombre</td>
            <td>
                {{ $cuerpo['profesional']->nombre ?? '' }}
                {{ $cuerpo['profesional']->apellido_uno ?? '' }}
                {{ $cuerpo['profesional']->apellido_dos ?? '' }}
            </td>
            <td class="lbl">RUT</td>
            <td>{{ $cuerpo['profesional']->rut ?? '—' }}</td>
        </tr>
    </table>

    {{-- REFLEJOS OSTEOTENDINEOS --}}
    <h2>Reflejos Osteotendineos</h2>
    <table class="reflejos">
        <thead>
            <tr>
                <th style="width:5%">N°</th>
                <th style="width:30%">Reflejo</th>
                <th>Hallazgos / Resultado</th>
            </tr>
        </thead>
        <tbody>
            @php
                $reflejos = [
                    ['campo' => 'ref_bicip',   'romano' => 'I',    'nombre' => 'Bicipital'],
                    ['campo' => 'ref_tricip',  'romano' => 'II',   'nombre' => 'Tricipital'],
                    ['campo' => 'ref_est_rad', 'romano' => 'III',  'nombre' => 'Estilo-radial'],
                    ['campo' => 'ref_rot',     'romano' => 'IV',   'nombre' => 'Rotuliano'],
                    ['campo' => 'ref_aquil',   'romano' => 'V',    'nombre' => 'Aquiliano'],
                    ['campo' => 'ref_cut',     'romano' => 'VI',   'nombre' => 'Cutáneo'],
                    ['campo' => 'ref_cut_abd', 'romano' => 'VII',  'nombre' => 'Cutáneo Abdominal'],
                    ['campo' => 'ref_cremast', 'romano' => 'VIII', 'nombre' => 'Cremasteriano'],
                    ['campo' => 'ref_plant',   'romano' => 'IX',   'nombre' => 'Plantar'],
                ];
            @endphp
            @foreach($reflejos as $ref)
            <tr>
                <td class="num">{{ $ref['romano'] }}</td>
                <td class="nombre">{{ $ref['nombre'] }}</td>
                <td>{{ $cuerpo['datos'][$ref['campo']] ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- REFLEJOS PATOLÓGICOS --}}
    <h2>Reflejos Patológicos</h2>
    <div class="bloque">
        {!! nl2br(e($cuerpo['datos']['ref_pat'] ?? '—')) !!}
    </div>

    {{-- CONCLUSIONES --}}
    <h2>Conclusiones</h2>
    <div class="bloque" style="font-style: italic;">
        {!! nl2br(e($cuerpo['datos']['ref_concl'] ?? '—')) !!}
    </div>

    {{-- FIRMA --}}
    <div class="firma">
        <div class="firma-linea"></div>
        <p class="firma-text">
            {{ $cuerpo['profesional']->nombre ?? '' }}
            {{ $cuerpo['profesional']->apellido_uno ?? '' }}
            {{ $cuerpo['profesional']->apellido_dos ?? '' }}
        </p>
        <p class="firma-text">Kinesiólogo(a) — RUT: {{ $cuerpo['profesional']->rut ?? '' }}</p>
    </div>

    <div class="footer">
        <small>Documento generado el {{ $cuerpo['fecha'] ?? $date }} &mdash; MediChile Sistema Clínico</small>
    </div>

</body>
</html>
