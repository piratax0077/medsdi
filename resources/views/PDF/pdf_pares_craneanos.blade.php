<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación Pares Craneanos</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 11px; margin: 18px; color: #222; }
        h1 { text-align: center; font-size: 14px; text-transform: uppercase; margin-bottom: 4px; color: #1a4a7a; }
        h2 { font-size: 11px; text-transform: uppercase; background: #1a4a7a; color: #fff; padding: 4px 8px; margin: 12px 0 4px 0; }
        .subtitle { text-align: center; font-size: 10px; color: #555; margin-bottom: 10px; }
        table.info { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        table.info td { padding: 4px 6px; border: 1px solid #ccc; vertical-align: top; }
        table.info td.lbl { background: #f0f4fa; font-weight: bold; width: 22%; }
        table.pares { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        table.pares th { background: #d6e4f7; padding: 5px 8px; border: 1px solid #bcd; font-size: 10px; text-align: left; }
        table.pares td { padding: 5px 8px; border: 1px solid #ccc; font-size: 10px; vertical-align: top; }
        table.pares tr:nth-child(even) td { background: #f8fbff; }
        table.pares td.num { text-align: center; font-weight: bold; color: #1a4a7a; width: 5%; }
        table.pares td.nombre { font-weight: bold; width: 30%; }
        .conclusiones { background: #fafafa; border: 1px solid #ddd; padding: 8px 10px; min-height: 40px; margin-top: 4px; font-style: italic; color: #333; }
        .footer { margin-top: 30px; border-top: 1px solid #ccc; padding-top: 8px; }
        .firma { margin-top: 50px; text-align: center; }
        .firma-linea { border-top: 1px solid #333; width: 220px; margin: 0 auto; }
        .firma-text { font-size: 10px; color: #555; margin-top: 4px; }
        @page { margin: 15mm; }
    </style>
</head>
<body>

    <h1>Evaluación de Pares Craneanos</h1>
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

    {{-- EVALUACIÓN PARES CRANEANOS --}}
    <h2>Resultados por Par Craneal</h2>
    <table class="pares">
        <thead>
            <tr>
                <th style="width:5%">N°</th>
                <th style="width:32%">Par Craneal</th>
                <th>Hallazgos / Resultado</th>
            </tr>
        </thead>
        <tbody>
            @php
                $pares = [
                    ['campo' => 'pc_uno',   'romano' => 'I',    'nombre' => 'Olfatorio'],
                    ['campo' => 'pc_dos',   'romano' => 'II',   'nombre' => 'Óptico'],
                    ['campo' => 'pc_tres',  'romano' => 'III',  'nombre' => 'Motor Ocular Común (Oculomotor)'],
                    ['campo' => 'pc_cuatro','romano' => 'IV',   'nombre' => 'Troclear (Patético)'],
                    ['campo' => 'pc_cinco', 'romano' => 'V',    'nombre' => 'Trigémino'],
                    ['campo' => 'pc_seis',  'romano' => 'VI',   'nombre' => 'Abducens (Motor Ocular Externo)'],
                    ['campo' => 'pc_siete', 'romano' => 'VII',  'nombre' => 'Facial'],
                    ['campo' => 'pc_ocho',  'romano' => 'VIII', 'nombre' => 'Vestibulococlear (Auditivo)'],
                    ['campo' => 'pc_nueve', 'romano' => 'IX',   'nombre' => 'Glosofaríngeo'],
                    ['campo' => 'pc_diez',  'romano' => 'X',    'nombre' => 'Vago (Neumogástrico)'],
                    ['campo' => 'pc_once',  'romano' => 'XI',   'nombre' => 'Espinal (Accesorio)'],
                    ['campo' => 'pc_doce',  'romano' => 'XII',  'nombre' => 'Hipogloso'],
                ];
            @endphp
            @foreach($pares as $par)
            <tr>
                <td class="num">{{ $par['romano'] }}</td>
                <td class="nombre">{{ $par['nombre'] }}</td>
                <td>{{ $cuerpo['datos'][$par['campo']] ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- CONCLUSIONES --}}
    <h2>Conclusiones</h2>
    <div class="conclusiones">
        {!! nl2br(e($cuerpo['datos']['pc_conclusiones'] ?? '—')) !!}
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
