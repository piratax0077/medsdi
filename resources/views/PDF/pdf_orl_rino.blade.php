<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}">
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>
        <div class="contenido-body" style="page-break-after: auto; margin-top: 15px;">

            {!! $cuerpo['template_pdf'] !!}

        </div>
    </main>
</html>
