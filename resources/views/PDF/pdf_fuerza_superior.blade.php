<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación Fuerza Extremidad Superior</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 11px; margin: 18px; color: #222; }
        h1 { text-align: center; font-size: 14px; text-transform: uppercase; margin-bottom: 4px; color: #1a4a7a; }
        h2 { font-size: 11px; text-transform: uppercase; background: #1a4a7a; color: #fff; padding: 4px 8px; margin: 12px 0 6px 0; }
        .subtitle { text-align: center; font-size: 10px; color: #555; margin-bottom: 10px; }
        table.info { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        table.info td { padding: 4px 6px; border: 1px solid #ccc; vertical-align: top; }
        table.info td.lbl { background: #f0f4fa; font-weight: bold; width: 22%; }
        table.articul { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        table.articul th { background: #d6e4f7; padding: 5px 8px; border: 1px solid #bcd; font-size: 10px; text-align: left; }
        table.articul td { padding: 5px 8px; border: 1px solid #ccc; font-size: 10px; vertical-align: top; }
        table.articul tr:nth-child(even) td { background: #f8fbff; }
        table.articul td.movimiento { font-weight: bold; background: #f0f4fa; width: 20%; }
        .bloque { background: #fafafa; border: 1px solid #ddd; padding: 8px 10px; min-height: 30px; margin-top: 4px; color: #333; }
        .firma { margin-top: 40px; text-align: center; }
        .firma-linea { border-top: 1px solid #333; width: 220px; margin: 0 auto; }
        .firma-text { font-size: 10px; color: #555; margin-top: 4px; }
        .footer { margin-top: 20px; border-top: 1px solid #ccc; padding-top: 8px; }
        @page { margin: 15mm; }
    </style>
</head>
<body>

    <h1>Evaluación de Fuerza Extremidad Superior</h1>
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

    {{-- CINTURA ESCAPULAR --}}
    <h2>Articulaciones Cintura Escapular</h2>
    <table class="articul">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th style="width:47%">Derecha</th>
                <th style="width:47%">Izquierda</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="movimiento">Flexión</td>
                <td>{{ $cuerpo['datos']['ace_flex_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ace_flex_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Extensión</td>
                <td>{{ $cuerpo['datos']['ace_exten_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ace_exten_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Abducción</td>
                <td>{{ $cuerpo['datos']['ace_abd_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ace_abd_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Aducción</td>
                <td>{{ $cuerpo['datos']['ace_aduc_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ace_aduc_i'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($cuerpo['datos']['ace_obs']))
    <p style="font-size:10px; margin-top:2px;"><strong>Obs.:</strong> {{ $cuerpo['datos']['ace_obs'] }}</p>
    @endif

    {{-- HOMBRO --}}
    <h2>Articulaciones Hombro</h2>
    <table class="articul">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th style="width:47%">Derecha</th>
                <th style="width:47%">Izquierda</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="movimiento">Flexión</td>
                <td>{{ $cuerpo['datos']['ah_flex_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ah_flex_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Extensión</td>
                <td>{{ $cuerpo['datos']['ah_ext_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ah_ext_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Abducción</td>
                <td>{{ $cuerpo['datos']['ah_abd_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ah_abd_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Aducción</td>
                <td>{{ $cuerpo['datos']['ah_aduc_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ah_aduc_i'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($cuerpo['datos']['ah_obs']))
    <p style="font-size:10px; margin-top:2px;"><strong>Obs.:</strong> {{ $cuerpo['datos']['ah_obs'] }}</p>
    @endif

    {{-- CODO --}}
    <h2>Articulaciones Codo</h2>
    <table class="articul">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th style="width:47%">Derecha</th>
                <th style="width:47%">Izquierda</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="movimiento">Flexión</td>
                <td>{{ $cuerpo['datos']['ac_flex_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ac_flex_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Extensión</td>
                <td>{{ $cuerpo['datos']['ac_ext_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ac_ext_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Abducción</td>
                <td>{{ $cuerpo['datos']['ac_abd_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ac_abd_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Aducción</td>
                <td>{{ $cuerpo['datos']['ac_aduc_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['ac_aduc_i'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($cuerpo['datos']['ac_obs']))
    <p style="font-size:10px; margin-top:2px;"><strong>Obs.:</strong> {{ $cuerpo['datos']['ac_obs'] }}</p>
    @endif

    {{-- RADIO-CUBITAL DISTAL --}}
    <h2>Articulaciones Radio-Cubital Distal</h2>
    <table class="articul">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th style="width:47%">Derecha</th>
                <th style="width:47%">Izquierda</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="movimiento">Flexión</td>
                <td>{{ $cuerpo['datos']['arcd_flex_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['arcd_flex_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Extensión</td>
                <td>{{ $cuerpo['datos']['arcd_ext_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['arcd_ext_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Abducción</td>
                <td>{{ $cuerpo['datos']['arcd_abd_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['arcd_abd_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Aducción</td>
                <td>{{ $cuerpo['datos']['arcd_aduc_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['arcd_aduc_i'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($cuerpo['datos']['arcd_obs']))
    <p style="font-size:10px; margin-top:2px;"><strong>Obs.:</strong> {{ $cuerpo['datos']['arcd_obs'] }}</p>
    @endif

    {{-- MUÑECA --}}
    <h2>Articulaciones Muñeca</h2>
    <table class="articul">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th style="width:47%">Derecha</th>
                <th style="width:47%">Izquierda</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="movimiento">Flexión</td>
                <td>{{ $cuerpo['datos']['amu_flex_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['amu_flex_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Extensión</td>
                <td>{{ $cuerpo['datos']['amu_ext_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['amu_ext_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Abducción</td>
                <td>{{ $cuerpo['datos']['amu_abd_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['amu_abd_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Aducción</td>
                <td>{{ $cuerpo['datos']['amu_aduc_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['amu_aduc_i'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($cuerpo['datos']['amu_obs']))
    <p style="font-size:10px; margin-top:2px;"><strong>Obs.:</strong> {{ $cuerpo['datos']['amu_obs'] }}</p>
    @endif

    {{-- DEDOS --}}
    <h2>Articulaciones Dedos</h2>
    <table class="articul">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th style="width:47%">Derecha</th>
                <th style="width:47%">Izquierda</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="movimiento">Flexión</td>
                <td>{{ $cuerpo['datos']['aded_flex_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['aded_flex_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Extensión</td>
                <td>{{ $cuerpo['datos']['aded_ext_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['aded_ext_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Abducción</td>
                <td>{{ $cuerpo['datos']['aded_abd_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['aded_abd_i'] ?? '—' }}</td>
            </tr>
            <tr>
                <td class="movimiento">Aducción</td>
                <td>{{ $cuerpo['datos']['aded_aduc_d'] ?? '—' }}</td>
                <td>{{ $cuerpo['datos']['aded_aduc_i'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($cuerpo['datos']['aded_obs']))
    <p style="font-size:10px; margin-top:2px;"><strong>Obs.:</strong> {{ $cuerpo['datos']['aded_obs'] }}</p>
    @endif

    {{-- PRUEBA DE MINGAZZINI --}}
    @if(!empty($cuerpo['datos']['minga']))
    <h2>Prueba de Mingazzini</h2>
    <div class="bloque">
        {!! nl2br(e($cuerpo['datos']['minga'])) !!}
    </div>
    @endif

    {{-- OBSERVACIONES Y CONCLUSIONES --}}
    @if(!empty($cuerpo['datos']['extsup_coment']))
    <h2>Observaciones y Conclusiones</h2>
    <div class="bloque">
        {!! nl2br(e($cuerpo['datos']['extsup_coment'])) !!}
    </div>
    @endif

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
