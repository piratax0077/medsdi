<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        /*Tipografia*/
        @font-face {
            font-family: 'Poppins';
            src:
            local("Poppins"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
            font-style: bold;
            font-weight: 600;
        }

        @font-face {
            font-family: 'Poppins';
            src:
            local("Poppins"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
            font-style: regular;
            font-weight: 400;
        }

        h1, h2, h3, h4, h5, h6, span, p, td, th {
            font-family: Poppins, sans-serif;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        span {
            text-transform: uppercase;
        }

        table {
            width: 100%;
        }

        hr {
            border: 1px solid #3C63AD;
            margin-bottom: 0.5rem !important;
            margin-top: 0.5rem !important;
        }

        .mb-5 { margin-bottom: 2rem; }
        .mt-3 { margin-top: 1.2rem; }
        .pl-3 { padding-left: 1.4rem; }
        .pr-3 { padding-right: 1.4rem; }
        .text-blue { color: #3C63AD; }

        .contenido-encabezado-uno {
            height: 124px;
            margin: auto;
            margin-bottom: 0;
        }

        .contenido-encabezado-dos {
            font-size: 0.8rem;
            height: 100px;
            margin: auto;
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .contenido-body {
            margin: auto;
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .contenido-footer {
            font-size: 0.8rem;
            height: 100px;
            margin: auto;
        }

        .contenido-infoprof {
            float: right;
            height: auto;
            line-height: 3px;
            font-size: 0.7rem;
            margin-top: 10px;
            padding-top: 5px;
            padding-right: 100px;
            padding-left: 10px;
            width: auto;
            border-left: 4px solid #3366CC;
        }

        .contenido-logo {
            float: left;
            vertical-align: middle;
            width: 150px;
            height: auto;
            padding-top: 28px;
        }

        .logo {
            width: 200px;
            padding-left: 80px;
        }

        img {
            align-items: center;
            width: 18%;
        }

        .centrar { text-align: center; }
        .text-center { text-align: center; }

        @page {
            margin: 285px 30px 160px 30px;
        }

        header {
            position: fixed;
            top: -285px;
            left: 0px;
            right: 0px;
            height: 25100;
        }

        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            height: 100px;
        }

        .texto-vertical-2 {
            font-size: 0.55em;
            position: fixed;
            writing-mode: vertical-lr;
            transform: rotate(270deg);
            right: -310px;
            top: 400px;
            font-family: Poppins;
        }

        .fecha {
            font-size: 0.9rem;
            text-align: right;
            font-family: Poppins;
        }

        .div-qr {
            border: 4px solid #3366CC;
            border-radius: 10px;
            width: 90px;
            margin: auto;
            padding: 2px;
        }

        .tabla-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .tabla-info td {
            padding: 6px 10px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .tabla-info td.label {
            background-color: #f0f4fb;
            font-weight: bold;
            color: #3C63AD;
            width: 28%;
        }

        .section-title {
            font-weight: bold;
            font-size: 0.9rem;
            color: #3C63AD;
            border-bottom: 2px solid #3C63AD;
            padding-bottom: 4px;
            margin-top: 1.2rem;
            margin-bottom: 0.6rem;
            text-transform: uppercase;
        }

        .descripcion-informe {
            text-align: justify;
            line-height: 1.6;
            padding: 12px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            font-size: 0.85rem;
        }
    </style>
</head>

<div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cod. Identificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

@include('PDF.header')
@include('PDF.footer')

<main>
    <div class="contenido-body">

        <h2 class="text-blue centrar" style="text-transform: uppercase; margin-bottom: 1rem;">{{ $titulo }}</h2>

        {{-- Informacion del Tratamiento --}}
        <div class="section-title">Informacion del Tratamiento</div>
        <table class="tabla-info">
            @if(!empty($cuerpo['datos_informe']['procedencia_paciente']))
            <tr>
                <td class="label">Procedencia del Paciente</td>
                <td colspan="3">{{ $cuerpo['datos_informe']['procedencia_paciente'] }}</td>
            </tr>
            @endif
            @if(!empty($cuerpo['datos_informe']['diagnostico_nutricion']))
            <tr>
                <td class="label">Diagnostico Nutricion</td>
                <td colspan="3">{{ $cuerpo['datos_informe']['diagnostico_nutricion'] }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Sesiones Realizadas</td>
                <td>{{ $cuerpo['datos_informe']['sesiones_realizadas'] ?? '-' }}</td>
                <td class="label">Sesiones Pendientes</td>
                <td>{{ $cuerpo['datos_informe']['sesiones_pendientes'] ?? '-' }}</td>
            </tr>
            @if(!empty($cuerpo['datos_informe']['tratamiento_realizado']))
            <tr>
                <td class="label">Tratamiento Realizado</td>
                <td colspan="3">
                    @if(is_array($cuerpo['datos_informe']['tratamiento_realizado']))
                        {{ implode(', ', $cuerpo['datos_informe']['tratamiento_realizado']) }}
                    @else
                        {{ $cuerpo['datos_informe']['tratamiento_realizado'] }}
                    @endif
                </td>
            </tr>
            @endif
            @if(!empty($cuerpo['datos_informe']['proximo_control']))
            <tr>
                <td class="label">Proximo Control</td>
                <td colspan="3">{{ $cuerpo['datos_informe']['proximo_control'] }}</td>
            </tr>
            @endif
        </table>

        {{-- Plan de Tratamiento (si existe) --}}
        @if(!empty($cuerpo['plan_tratamiento']))
        <div class="section-title">Plan de Tratamiento</div>
        <table class="tabla-info">
            <tr>
                <td class="label">Total Sesiones</td>
                <td>{{ $cuerpo['plan_tratamiento']->numero_sesiones ?? '-' }}</td>
                <td class="label">Sesion Actual</td>
                <td>{{ $cuerpo['plan_tratamiento']->sesion_actual ?? '-' }}</td>
            </tr>
            @if(!empty($cuerpo['plan_tratamiento']->objetivos))
            <tr>
                <td class="label">Objetivos</td>
                <td colspan="3">{{ $cuerpo['plan_tratamiento']->objetivos }}</td>
            </tr>
            @endif
            @if(!empty($cuerpo['plan_tratamiento']->peso_inicial))
            <tr>
                <td class="label">Peso Inicial</td>
                <td colspan="3">{{ $cuerpo['plan_tratamiento']->peso_inicial }} kg</td>
            </tr>
            @endif
        </table>
        @endif

        {{-- Descripcion del Informe --}}
        @if(!empty($cuerpo['datos_informe']['informe_descripcion']))
        <div class="section-title">Descripcion del Informe</div>
        <div class="descripcion-informe">
            {!! $cuerpo['datos_informe']['informe_descripcion'] !!}
        </div>
        @endif

    </div>
</main>

</html>
