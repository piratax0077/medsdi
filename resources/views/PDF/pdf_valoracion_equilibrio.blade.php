<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Valoración Funcional del Equilibrio</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 11px; margin: 18px; color: #222; }
        h1 { text-align: center; font-size: 14px; text-transform: uppercase; margin-bottom: 4px; color: #1a4a7a; }
        h2 { font-size: 11px; text-transform: uppercase; background: #1a4a7a; color: #fff; padding: 4px 6px; margin: 12px 0 4px 0; }
        h3 { font-size: 10px; text-transform: uppercase; background: #e0e8f5; color: #1a4a7a; padding: 3px 6px; margin: 8px 0 4px 0; }
        .subtitle { text-align: center; font-size: 11px; color: #555; margin-bottom: 10px; }
        table.info { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        table.info td { padding: 4px 6px; border: 1px solid #ccc; vertical-align: top; }
        table.info td.lbl { background: #f0f4fa; font-weight: bold; width: 25%; }
        table.data { width: 100%; border-collapse: collapse; margin-bottom: 6px; }
        table.data th { background: #d6e4f7; padding: 4px 6px; border: 1px solid #bcd; font-size: 10px; text-align: left; }
        table.data td { padding: 4px 6px; border: 1px solid #ccc; font-size: 10px; }
        table.data tr:nth-child(even) td { background: #f8fbff; }
        .score-box { display: inline-block; border: 1px solid #aaa; padding: 6px 12px; text-align: center; margin: 4px; }
        .score-box .num { font-size: 18px; font-weight: bold; }
        .score-box .cat { font-size: 10px; color: #555; }
        .interp { padding: 6px 10px; border-radius: 3px; font-weight: bold; font-size: 11px; margin: 6px 0; display: inline-block; }
        .interp-ok   { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .interp-leve { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
        .interp-mod  { background: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .interp-sev  { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .obs { background: #fafafa; border: 1px solid #ddd; padding: 6px; font-style: italic; color: #444; min-height: 20px; margin-top: 4px; }
        .footer { margin-top: 30px; border-top: 1px solid #ccc; padding-top: 8px; display: table; width: 100%; }
        .footer-left  { display: table-cell; width: 60%; font-size: 10px; color: #555; }
        .footer-right { display: table-cell; text-align: right; font-size: 10px; color: #555; }
        .firma { margin-top: 50px; text-align: center; }
        .firma-linea { border-top: 1px solid #333; width: 220px; margin: 0 auto; }
        @page { margin: 15mm; }
    </style>
</head>
<body>

    <h1>Valoración Funcional del Equilibrio</h1>
    <p class="subtitle">MediChile — Fecha de emisión: {{ $fecha }}</p>

    {{-- ── DATOS PACIENTE ── --}}
    <h2>Datos del Paciente</h2>
    <table class="info">
        <tr>
            <td class="lbl">Nombre</td>
            <td>{{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }} {{ $paciente->apellido_dos ?? '' }}</td>
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

    {{-- ── DATOS PROFESIONAL ── --}}
    <h2>Profesional</h2>
    <table class="info">
        <tr>
            <td class="lbl">Nombre</td>
            <td>{{ $profesional->nombres ?? '' }} {{ $profesional->apellido_uno ?? '' }} {{ $profesional->apellido_dos ?? '' }}</td>
            <td class="lbl">Fecha atención</td>
            <td>{{ $hora_medica ? \Carbon\Carbon::parse($hora_medica->fecha)->format('d/m/Y') : $fecha }}</td>
        </tr>
    </table>

    {{-- ── TEST AGUDEZA VISUAL ── --}}
    <h2>Test de Agudeza Visual (VOR)</h2>
    <table class="data">
        <thead>
            <tr>
                <th>Parámetro</th>
                <th>Resultado</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Metrónomo (bpm)</td>
                <td>{{ $datos['vfe_tav_met_bpm'] ?? '—' }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Cabeza estática (líneas Snellen)</td>
                <td>{{ ($datos['vfe_tav_c-est'] ?? '') == '1' ? '0–1' : (($datos['vfe_tav_c-est'] ?? '') == '2' ? 'Mayor a 2' : '—') }}</td>
                <td>{{ $datos['vfe_tav_c-est_obs'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Mov. horizontales cabeza</td>
                <td>{{ ($datos['vfe_tav_m-horiz-cab'] ?? '') == '1' ? '0–1' : (($datos['vfe_tav_m-horiz-cab'] ?? '') == '2' ? 'Mayor a 2' : '—') }}</td>
                <td>{{ $datos['vfe_tav_m-horiz-cab_obs'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Mov. verticales cabeza</td>
                <td>{{ ($datos['vfe_tav_m-vert-cab'] ?? '') == '1' ? '0–1' : (($datos['vfe_tav_m-vert-cab'] ?? '') == '2' ? 'Mayor a 2' : '—') }}</td>
                <td>{{ $datos['vfe_tav_m-vert-cab_obs'] ?? '' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($datos['vfe_tav_vod_obs']))
    <div class="obs"><strong>Observaciones TAV:</strong> {{ $datos['vfe_tav_vod_obs'] }}</div>
    @endif

    {{-- ── APOYO MONOPODAL ── --}}
    <h2>Test de Apoyo Monopodal</h2>
    @php
        $piernas = [
            'PI' => ['int' => 'vfe_pi_int_', 'label' => 'Pie izquierdo'],
            'PD' => ['int' => 'vfe_pd_int_', 'label' => 'Pie derecho'],
        ];
        $intentos = ['uno' => '1°', 'dos' => '2°', 'tres' => '3°'];
    @endphp
    @foreach($piernas as $key => $pierna)
    <h3>{{ $pierna['label'] }}</h3>
    <table class="data">
        <thead><tr><th>Condición</th><th>1° intento</th><th>2° intento</th><th>3° intento</th></tr></thead>
        <tbody>
            @foreach(['ojo_ab' => 'Ojos abiertos', 'ojo_ce' => 'Ojos cerrados'] as $cond => $condLabel)
            <tr>
                <td>{{ $condLabel }}</td>
                @foreach(array_keys($intentos) as $i)
                <td>
                    @php $k = $pierna['int'] . strtolower($key == 'PI' ? 'oj' : 'oj') . ''; @endphp
                    {{-- Los campos tienen nombres como vfe_pi_int_uno, vfe_pi_int_dos, vfe_pi_int_tres  --}}
                    {{-- y vfe_pi_int_ceojos_uno etc. Tomamos lo que viene --}}
                    {{ $datos[$pierna['int'] . $cond . '_' . $i] ?? '—' }}
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
    @if(!empty($datos['vfe_pi_obs']) || !empty($datos['vfe_pd_obs']))
    <div class="obs"><strong>Observaciones apoyo monopodal:</strong>
        {{ $datos['vfe_pi_obs'] ?? '' }} {{ $datos['vfe_pd_obs'] ?? '' }}
    </div>
    @endif

    {{-- ── ALCANCE FUNCIONAL ── --}}
    <h2>Test de Alcance Funcional</h2>
    @php
        $alcancePies = [
            'pi-af' => 'Pie izquierdo',
            'pd-af' => 'Pie derecho',
        ];
    @endphp
    @foreach($alcancePies as $pref => $label)
    <h3>{{ $label }}</h3>
    <table class="data">
        <thead><tr><th>Intento</th><th>Alcance (cm)</th></tr></thead>
        <tbody>
            @foreach(['uno' => '1°', 'dos' => '2°', 'tres' => '3°'] as $i => $iLabel)
            @if(isset($datos['vfe_' . $pref . '_int_' . $i]) && $datos['vfe_' . $pref . '_int_' . $i] !== '')
            <tr>
                <td>{{ $iLabel }} intento</td>
                <td>{{ $datos['vfe_' . $pref . '_int_' . $i] }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endforeach
    @if(!empty($datos['vfe_obs_alcfunc']))
    <div class="obs"><strong>Observaciones alcance funcional:</strong> {{ $datos['vfe_obs_alcfunc'] }}</div>
    @endif

    {{-- ── TIMED UP AND GO ── --}}
    <h2>Timed Up and Go (TUG)</h2>
    <table class="data">
        <thead><tr><th>Parámetro</th><th>Valor</th></tr></thead>
        <tbody>
            <tr>
                <td>Tiempo intento 1 (seg)</td>
                <td>{{ $datos['vfe_tuag_int_uno'] ?? '—' }}</td>
            </tr>
            <tr>
                <td>Tiempo intento 2 (seg)</td>
                <td>{{ $datos['vfe_tuag_int_dos'] ?? '—' }}</td>
            </tr>
            <tr>
                <td>Ayuda técnica</td>
                <td>{{ $datos['vfe_tuag_ayuda_tecnica'] ?? '—' }}</td>
            </tr>
        </tbody>
    </table>
    @if(!empty($datos['vfe_obs_tuag']))
    <div class="obs"><strong>Observaciones TUG:</strong> {{ $datos['vfe_obs_tuag'] }}</div>
    @endif

    {{-- ── ÍNDICE MARCHA DINÁMICA (DGI) ── --}}
    <h2>Índice de Marcha Dinámica (DGI)</h2>
    @php
        $dgiItems = [
            'vfe_imd_dgi'  => 'Marcha en superficie plana',
            'vfe_imd_dgi1' => 'Cambio de velocidad',
            'vfe_imd_dgi2' => 'Marcha con mov. horizontales de cabeza',
            'vfe_imd_dgi3' => 'Marcha con mov. verticales de cabeza',
        ];
        $dgiValores = ['0' => '0 – Severo', '1' => '1 – Moderado', '2' => '2 – Leve', '3' => '3 – Normal'];
    @endphp
    <table class="data">
        <thead><tr><th>Ítem</th><th>Puntuación</th><th>Descripción</th></tr></thead>
        <tbody>
            @foreach($dgiItems as $campo => $desc)
            @php $val = $datos[$campo] ?? ''; @endphp
            <tr>
                <td>{{ $desc }}</td>
                <td>{{ $val !== '' ? $val : '—' }}</td>
                <td>{{ $val !== '' ? ($leyendasIMD[$val] ?? '') : '' }}</td>
            </tr>
            @endforeach
            <tr>
                <td><strong>Puntaje total DGI</strong></td>
                <td colspan="2"><strong>{{ $datos['vfe_dgi_imd_total'] ?? '—' }} / 24</strong></td>
            </tr>
        </tbody>
    </table>
    @if(!empty($datos['vfe_imd_vod_obs']))
    <div class="obs"><strong>Observaciones DGI:</strong> {{ $datos['vfe_imd_vod_obs'] }}</div>
    @endif

    {{-- ── DHI ── --}}
    <h2>Cuestionario Incapacidad por Mareo (DHI)</h2>

    {{-- Preguntas respondidas --}}
    @php
        $dhiPreguntas = [
            'c01' => ['dim' => 'E', 'txt' => '2. ¿Su problema le crea dificultad para mirar hacia arriba?'],
            'c02' => ['dim' => 'E', 'txt' => '9. ¿Su problema interfiere en sus actividades sociales como salir a comer...?'],
            'c03' => ['dim' => 'E', 'txt' => '10. ¿Por su problema ha tenido miedo de estar solo en casa?'],
            'c04' => ['dim' => 'E', 'txt' => '15. ¿Por su problema tiene dificultad para dar un paseo?'],
            'c05' => ['dim' => 'E', 'txt' => '18. ¿Por su problema le es difícil concentrarse?'],
            'c06' => ['dim' => 'E', 'txt' => '20. ¿Su problema le crea dificultad para leer?'],
            'c07' => ['dim' => 'E', 'txt' => '21. ¿Su problema le provoca vergüenza?'],
            'c08' => ['dim' => 'E', 'txt' => '22. ¿Su problema daña su relación con familiares y amigos?'],
            'c09' => ['dim' => 'E', 'txt' => '23. ¿Por su problema se siente deprimido?'],
            'c10' => ['dim' => 'F', 'txt' => '3. ¿Por su problema tiene dificultad para desplazarse por la casa?'],
            'c11' => ['dim' => 'F', 'txt' => '5. ¿Por su problema tiene dificultad para agacharse?'],
            'c12' => ['dim' => 'F', 'txt' => '6. ¿Su problema interfiere significativamente en las actividades de su hogar?'],
            'c13' => ['dim' => 'F', 'txt' => '7. ¿Por su problema tiene dificultad para subir escaleras?'],
            'c14' => ['dim' => 'F', 'txt' => '12. ¿Su problema le hace dificultoso caminar por la calle?'],
            'c15' => ['dim' => 'F', 'txt' => '14. ¿Por su problema le es difícil realizar trabajo duro en el hogar?'],
            'c16' => ['dim' => 'F', 'txt' => '16. ¿Por su problema ha tenido que faltar a actividades relevantes?'],
            'c17' => ['dim' => 'F', 'txt' => '19. ¿Por su problema tiene dificultad para caminar solo por la casa de noche?'],
            'c18' => ['dim' => 'F', 'txt' => '24. ¿Su problema interfiere en sus funciones laborales o domésticas?'],
            'c19' => ['dim' => 'P', 'txt' => '1. ¿Su problema empeora al mirar hacia arriba?'],
            'c20' => ['dim' => 'P', 'txt' => '4. ¿Caminar por los pasillos del mercado aumenta sus problemas?'],
            'c21' => ['dim' => 'P', 'txt' => '8. ¿Su problema empeora con actividades como bailar, deportes, barrer, etc.?'],
            'c22' => ['dim' => 'P', 'txt' => '11. ¿Los movimientos rápidos de cabeza aumentan sus problemas?'],
            'c23' => ['dim' => 'P', 'txt' => '13. ¿Girar en la cama aumenta su problema?'],
            'c24' => ['dim' => 'P', 'txt' => '17. ¿Se le dificulta caminar por la vereda?'],
            'c25' => ['dim' => 'P', 'txt' => '25. ¿Inclinarse aumenta su problema?'],
        ];
        $dimLabels = ['E' => 'Emocional', 'F' => 'Funcional', 'P' => 'Físico'];
        $respLabels = ['_s' => 'Siempre (4)', '_av' => 'A veces (2)', '_n' => 'Nunca (0)'];
    @endphp

    @foreach(['E' => 'Aspectos Emocionales', 'F' => 'Aspectos Funcionales', 'P' => 'Aspectos Físicos'] as $dim => $dimTitle)
    <h3>{{ $dimTitle }}</h3>
    <table class="data">
        <thead><tr><th style="width:70%">Pregunta</th><th>Respuesta</th><th>Puntaje</th></tr></thead>
        <tbody>
            @foreach($dhiPreguntas as $ckey => $preg)
            @if($preg['dim'] === $dim)
            @php
                $respuesta = '—';
                $puntaje   = '—';
                foreach(['_s' => ['Siempre', 4], '_av' => ['A veces', 2], '_n' => ['Nunca', 0]] as $suf => [$rLabel, $rVal]) {
                    if (isset($datos['vfe_dhi_' . $ckey . $suf])) {
                        $respuesta = $rLabel;
                        $puntaje   = $rVal;
                        break;
                    }
                }
            @endphp
            <tr>
                <td>{{ $preg['txt'] }}</td>
                <td>{{ $respuesta }}</td>
                <td>{{ $puntaje }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endforeach

    {{-- Puntajes DHI --}}
    <h3>Resultados DHI</h3>
    <table class="data">
        <thead><tr><th>Categoría</th><th>Puntaje</th><th>Máx.</th></tr></thead>
        <tbody>
            <tr>
                <td>Emocional</td>
                <td><strong>{{ $datos['vfe_dhi_score_emoc'] ?? '—' }}</strong></td>
                <td>36</td>
            </tr>
            <tr>
                <td>Funcional</td>
                <td><strong>{{ $datos['vfe_dhi_score_func'] ?? '—' }}</strong></td>
                <td>36</td>
            </tr>
            <tr>
                <td>Físico</td>
                <td><strong>{{ $datos['vfe_dhi_score_fisic'] ?? '—' }}</strong></td>
                <td>28</td>
            </tr>
            <tr>
                <td><strong>Total DHI</strong></td>
                <td><strong>{{ $datos['dhi_total'] ?? $datos['vfe_dhi_total'] ?? '—' }}</strong></td>
                <td><strong>100</strong></td>
            </tr>
        </tbody>
    </table>

    @php
        $total = (int)($datos['dhi_total'] ?? $datos['vfe_dhi_total'] ?? -1);
        if ($total < 0) { $interpClass = ''; $interpText = $datos['vfe_dhi_interpretacion_texto'] ?? ''; }
        elseif ($total <= 16) { $interpClass = 'interp-ok';   $interpText = 'Sin handicap'; }
        elseif ($total <= 36) { $interpClass = 'interp-leve'; $interpText = 'Handicap leve'; }
        elseif ($total <= 56) { $interpClass = 'interp-mod';  $interpText = 'Handicap moderado'; }
        else                  { $interpClass = 'interp-sev';  $interpText = 'Handicap severo'; }
    @endphp
    @if($interpText)
    <div class="interp {{ $interpClass }}">Interpretación: {{ $interpText }} — Puntaje total: {{ $total >= 0 ? $total : '—' }}/100</div>
    @endif

    @if(!empty($datos['vfe_obs_disc_mareo']))
    <div class="obs"><strong>Observaciones Incapacidad por Mareo:</strong> {{ $datos['vfe_obs_disc_mareo'] }}</div>
    @endif

    {{-- ── FIRMA ── --}}
    <div class="footer">
        <div class="footer-left">Documento generado el {{ $fecha }} — Sistema MediChile</div>
        <div class="footer-right">Valoración Funcional del Equilibrio</div>
    </div>
    <div class="firma">
        <div class="firma-linea"></div>
        <p style="margin-top:6px; font-size:10px;">
            {{ $profesional->nombres ?? '' }} {{ $profesional->apellido_uno ?? '' }} {{ $profesional->apellido_dos ?? '' }}<br>
            Fonoaudiólogo/a
        </p>
    </div>

</body>
</html>
