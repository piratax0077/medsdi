<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        h1, h2, h3, h4, h5, h6, span, p, td, th {
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 { text-align: center; text-transform: uppercase; }
        span { text-transform: uppercase; }

        table { width: 100%; }

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
        .centrar { text-align: center; }
        .text-center { text-align: center; }

        .contenido-encabezado-uno {
            height: 124px;
            margin: auto;
            margin-bottom: 0;
        }

        .contenido-encabezado-dos {
            font-size: 0.8rem;
            height: 110px;
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
            height: 150px;
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

        img { align-items: center; width: 18%; }

        @page { margin: 285px 30px 160px 30px; }

        header {
            position: fixed;
            top: -285px;
            left: 0px;
            right: 0px;
            height: 25085;
        }

        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            height: 150px;
        }

        .texto-vertical-2 {
            font-size: 0.65em;
            position: fixed;
            writing-mode: vertical-lr;
            transform: rotate(270deg);
            right: -325px;
            top: 400px;
            font-family: Arial;
        }

        .fecha {
            font-size: 0.9rem;
            text-align: right;
            font-family: Arial;
        }

        .div-qr {
            border: 4px solid #3366CC;
            border-radius: 10px;
            width: 90px;
            margin: auto;
            padding: 2px;
        }

        .titulo-seccion {
            color: #3366CC;
            font-weight: bold;
            margin-bottom: 0.8rem;
            font-size: 1rem;
        }

        .contenido-dictado {
            font-size: 0.82rem;
            line-height: 1.6;
            text-align: justify;
        }

        .contenido-dictado p { margin-bottom: 0.5rem; }
        .contenido-dictado ul, .contenido-dictado ol { padding-left: 1.2rem; }
    </style>
</head>

<div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl &ndash; Cód. Identificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

@include('PDF.header')
@include('PDF.footer')

<main>
    <div class="contenido-body" style="page-break-after: auto;">
        <h3 class="titulo-seccion">{{ $titulo }}</h3>
        <div class="contenido-dictado">
            {!! $cuerpo['contenido_html'] !!}
        </div>
    </div>
</main>

</html>
