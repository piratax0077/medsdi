<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Informe psicológico</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> --}}
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        p,
        td,
        th,
        div,
        span,
        h1,
        h2,
        h3,
        h4 {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            color: #252b35;
            font-size: 12px;
            line-height: 1.45;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .contenido-encabezado-uno {
            height: 124px;
            margin: auto;
        }

        .contenido-encabezado-dos {
            height: 110px;
            margin: auto;
            padding: 0 1rem;
            font-size: 0.8rem;
        }

        .contenido-body {
            margin: auto;
            padding: 0 1rem;
        }

        .contenido-footer {
            height: 150px;
            margin: auto;
            font-size: 0.8rem;
        }

        .contenido-infoprof {
            float: right;
            width: auto;
            height: auto;
            margin-top: 10px;
            padding: 5px 100px 0 10px;
            border-left: 4px solid #3366CC;
            font-size: 0.7rem;
            line-height: 3px;
        }

        .contenido-logo {
            float: left;
            width: 150px;
            height: auto;
            padding-top: 28px;
            vertical-align: middle;
        }

        .logo {
            width: 200px;
            padding-left: 80px;
        }

        img {
            width: 18%;
        }

        .text-center {
            text-align: center;
        }

        @page {
            margin: 285px 30px 160px 30px;
        }

        header {
            position: fixed;
            top: -285px;
            right: 0;
            left: 0;
            height: 250px;
        }

        footer {
            position: fixed;
            right: 0;
            bottom: -100px;
            left: 0;
            height: 150px;
        }

        .texto-vertical-2 {
            position: fixed;
            top: 400px;
            right: -325px;
            transform: rotate(270deg);
            writing-mode: vertical-lr;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 0.75em;
        }

        .cabecera-informe {
            margin-bottom: 18px;
            text-align: center;
        }

        .titulo-principal {
            margin: 0;
            color: #315fae;
            font-size: 21px;
            font-weight: bold;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        .linea-titulo {
            width: 74px;
            margin: 8px auto 0;
            border-top: 3px solid #315fae;
        }

        .resumen-atencion {
            margin-bottom: 15px;
            padding: 11px 14px;
            border-left: 4px solid #315fae;
            background-color: #f3f6fb;
        }

        .resumen-atencion td {
            padding: 3px 8px 3px 0;
            vertical-align: top;
        }

        .etiqueta {
            color: #556170;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .valor {
            margin-top: 2px;
            color: #202631;
            font-size: 12px;
        }

        .seccion {
            margin-top: 13px;
            padding: 0;
            border: 1px solid #d5dfef;
            border-radius: 7px;
            page-break-inside: avoid;
        }

        .seccion-titulo {
            padding: 8px 12px;
            border-bottom: 1px solid #d5dfef;
            background-color: #f5f8fc;
            color: #315fae;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .seccion-contenido {
            min-height: 32px;
            padding: 11px 13px;
            background-color: #ffffff;
            font-size: 12px;
            line-height: 1.55;
        }

        .seccion-contenido p {
            margin: 0 0 7px;
        }

        .seccion-contenido p:last-child {
            margin-bottom: 0;
        }

        .sesiones td {
            width: 50%;
            padding: 10px 13px;
            vertical-align: middle;
        }

        .sesiones td + td {
            border-left: 1px solid #e1e7f0;
        }

        .numero-sesion {
            display: block;
            margin-top: 3px;
            color: #315fae;
            font-size: 18px;
            font-weight: bold;
        }

        .informe-principal {
            margin-top: 16px;
            border-color: #aebfdb;
        }

        .informe-principal .seccion-titulo {
            background-color: #315fae;
            color: #ffffff;
        }

        .informe-principal .seccion-contenido {
            min-height: 145px;
            font-size: 12.5px;
        }

        .sin-informacion {
            color: #7a8491;
            font-style: italic;
        }
    </style>
</head>
<div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador
    {{ $cuerpo['array_ficha_atencion']['token'] ?? '' }}</div>

@include('PDF.header')
@include('PDF.footer')

<main>
    <div class="contenido-body" style="page-break-after: auto;">
        <div class="cabecera-informe">
            <h2 class="titulo-principal">{{ $titulo ?? 'Informe psicológico' }}</h2>
            <div class="linea-titulo"></div>
        </div>

        {{--
            Los datos del paciente y del profesional no se repiten aquí,
            porque ya forman parte del encabezado y pie institucional.
        --}}

        <div class="resumen-atencion">
            <table>
                <tr>
                    <td width="25%">
                        <div class="etiqueta">Fecha del informe</div>
                        <div class="valor">
                            {{ $cuerpo['arrayInforme']['fecha_informe'] ?? ($cuerpo['array_ficha_atencion']['created_at'] ?? 'Sin información') }}
                        </div>
                    </td>
                    <td width="25%">
                        <div class="etiqueta">Procedencia</div>
                        <div class="valor">
                            {{ $cuerpo['arrayInforme']['procedencia'] ?? 'No indicada' }}
                        </div>
                    </td>
                    <td width="25%">
                        <div class="etiqueta">Lugar de atención</div>
                        <div class="valor">
                            {{ $cuerpo['array_lugar_atencion']['nombre'] ?? 'Sin información' }}
                        </div>
                    </td>
                    <td width="25%">
                        <div class="etiqueta">Próximo control</div>
                        <div class="valor">
                            {{ $cuerpo['arrayInforme']['proximo_control'] ?? 'No indicado' }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="seccion">
            <div class="seccion-titulo">Diagnóstico</div>
            <div class="seccion-contenido">
                {!! nl2br(e($cuerpo['arrayInforme']['diagnostico'] ?? 'Sin información')) !!}
            </div>
        </div>

        <div class="seccion sesiones">
            <div class="seccion-titulo">Sesiones</div>
            <table>
                <tr>
                    <td>
                        <span class="etiqueta">Realizadas</span>
                        <span class="numero-sesion">
                            {{ $cuerpo['arrayInforme']['sesiones_realizadas'] ?? 0 }}
                        </span>
                    </td>
                    <td>
                        <span class="etiqueta">Pendientes</span>
                        <span class="numero-sesion">
                            {{ $cuerpo['arrayInforme']['sesiones_pendientes'] ?? 0 }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="seccion">
            <div class="seccion-titulo">Tratamiento realizado</div>
            <div class="seccion-contenido">
                {!! nl2br(e($cuerpo['arrayInforme']['tratamiento_realizado'] ?? 'Sin información')) !!}
            </div>
        </div>

        <div class="seccion informe-principal">
            <div class="seccion-titulo">Informe psicológico</div>
            <div class="seccion-contenido">
                {!! $cuerpo['arrayInforme']['informe'] ?? '<p class="sin-informacion">Sin información</p>' !!}
            </div>
        </div>
    </div>
</main>

</html>
