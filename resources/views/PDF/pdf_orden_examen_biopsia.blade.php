<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>
        <h3 style="text-align: center">Exámen de Biopsia</h3>

        @foreach($cuerpo['array_examenes'] as $examen)
        @php
            $zonas = [];
            if (!empty($examen['zona1'])) $zonas[] = 'Frasco 1: ' . $examen['zona1'];
            if (!empty($examen['zona2'])) $zonas[] = 'Frasco 2: ' . $examen['zona2'];
            if (!empty($examen['zona3'])) $zonas[] = 'Frasco 3: ' . $examen['zona3'];
            if (!empty($examen['zona4'])) $zonas[] = 'Frasco 4: ' . $examen['zona4'];
        @endphp
        <div style="margin-top: 18px; padding: 12px 16px; border: 1px solid #ccc; border-radius: 4px; page-break-inside: avoid;">
            <p style="margin: 4px 0;"><strong>Fecha:</strong> {{ $examen['fecha'] ?? '' }}</p>
            <p style="margin: 4px 0;"><strong>N° Orden:</strong> {{ $examen['n_orden'] ?? '' }}</p>
            @if(count($zonas))
                <p style="margin: 4px 0;"><strong>Zonas:</strong></p>
                @foreach($zonas as $zona)
                    <p style="margin: 2px 0 2px 16px;">• {{ $zona }}</p>
                @endforeach
            @endif
            <p style="margin: 4px 0;"><strong>Patólogo / Laboratorio:</strong> {{ $examen['patologo'] ?? '' }}</p>
            @if(!empty($examen['observaciones']))
                <p style="margin: 4px 0;"><strong>Observaciones:</strong> {{ $examen['observaciones'] }}</p>
            @endif
        </div>
        @endforeach
    </main>


</html>

