<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        {{-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> --}}
        <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
        {{-- <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}"> --}}
        <style>
            /*Tipografía*/
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

            h1, h2, h3, h4, h5, h6, span, p, td, th{
                font-family: Poppins, sans-serif;
            }

            h1 {
                text-align: center;
                text-transform: uppercase;
            }

            span {
                text-transform: uppercase;
            }

            /*Tablas*/
            table {
                width: 100%;
            }

            .tabla-receta table {
                font-size: 1rem;
            }

            .tabla-receta thead {
                background-color: #FAFAFA;
                font-size: 0.7rem;
            }

            .tabla-receta td, th{
                padding: 10px 15px;
            }

            .tabla-receta tbody{
                font-size: 0.7rem;
            }

            .tabla-receta tbody tr:nth-child(odd) {
                background-color: #fff
            }

            .tabla-receta tbody tr:nth-child(even) {
                background-color: #FAFAFA;
            }

            .tabla-receta tr {
                padding: 10px;
            }

            hr {
                border: 1px solid #3C63AD;
                margin-bottom: 0.5rem !important;
                margin-top: 0.5rem !important;
            }

            /*Margin*/
            .mb-5 {
                margin-bottom: 2rem;
            }

            .mt-3 {
                margin-top: 1.2rem;
            }

            /*Padding*/
            .pl-3{
                padding-left: 1.4rem;
            }

            .pr-3{
                padding-right: 1.4rem;
            }

            /*Colors*/
            .text-blue {
                color: #3C63AD;
            }

            .text-gray {
                color: #FAFAFA;
            }

            .text-gray {
                background-color: #FAFAFA;
            }

            /*Contenedores*/
            .contenido-encabezado-uno{
                /* font-size: 0.9rem; */
                /* width: 1000px; */
                height: 124px;
                margin: auto;
                margin-bottom: 0;
            }

            .contenido-encabezado-dos{
                font-size: 0.8rem;
                /* width: 1000px; */
                height: 110px;
                margin: auto;
                padding-right: 1rem;
                padding-left: 1rem;
            }


            .contenido-body {
                margin: auto;
                padding-right: 1rem;
                padding-left: 1rem;
                    /* width: 1000px; */
                /* height: 1000px; */
            }

            .contenido-footer{
                font-size: 0.8rem;
                /* align-item: flex-end; */
                /* width: 1000px; */
                height: 150px;
                /* margin: auto; */
                margin: auto;
            }


            .contenido-infoprof{
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

            /*Otros*/

            .logo {
                width: 200px;
                padding-left: 80px;
            }

            img {
                align-items: center;
                width: 18%;
            }

            .centrar {
                text-align: center;
            }

            .text-center {
                text-align: center;
            }

            @page {
                margin: 285px 30px 160px 30px ;
            }

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
                font-size: 0.75em;
                position: fixed;
                writing-mode: vertical-lr;
                transform: rotate(270deg);
                /* right: -320px; */
                right: -300px;
                top: 400px;
                font-family: Poppins;
            }
            .fecha{
                font-size: 0.9rem;
                text-align: right;
                font-family: Poppins;
            }
            .div-qr{
                border: 4px solid #3366CC;
                border-radius: 10px ;
                width: 90px;
                margin: auto;
                padding: 2px;
            }

        </style>
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>
<body>
    @include('PDF.header')
    @include('PDF.footer')

    @php
        $nombrePaciente = trim(($paciente->nombres ?? $paciente->nombre ?? '') . ' ' . ($paciente->apellido_uno ?? '') . ' ' . ($paciente->apellido_dos ?? ''));
        $rutPaciente = $paciente->rut ?? '';
        $inicio = $epicrisis->inicio_hospitalizacion ?? null;
        $fin = $epicrisis->fin_hospitalizacion ?? null;
        $totalDias = '';
        try {
            if ($inicio && $fin) {
                $totalDias = \Carbon\Carbon::parse($fin)->diffInDays(\Carbon\Carbon::parse($inicio));
            }
        } catch (\Exception $e) {
            $totalDias = '';
        }
        $fechaControl = $epicrisis->fecha_control ?? null;
    @endphp

    <h2>Epicrisis de Alta Médica</h2>

    <h3 class="section-title">I.- Diagnósticos</h3>
    <table>
        <tr>
            <th>Diagnóstico de ingreso</th>
            <th>Diagnóstico de alta</th>
        </tr>
        <tr>
            <td>{{ $epicrisis->diagnostico_ingreso ?? '' }}</td>
            <td>{{ $epicrisis->diagnostico_alta ?? '' }}</td>
        </tr>
    </table>

    <h3 class="section-title">II.- Tratamientos y cirugías realizadas</h3>
    <table>
        <tr>
            <th>Tratamientos</th>
            <th>Procedimientos quirúrgicos</th>
        </tr>
        <tr>
            <td>{{ $epicrisis->tratamientos_cirugias ?? '' }}</td>
            <td>{{ $epicrisis->procedimientos_quirurgicos_cirugia ?? '' }}</td>
        </tr>
        <tr>
            <th colspan="2">Otros procedimientos y/o tratamientos</th>
        </tr>
        <tr>
            <td colspan="2">{{ $epicrisis->otros_tratamientos_procedimientos ?? '' }}</td>
        </tr>
    </table>

    <h3 class="section-title">III.- Controles y evolución intrahospitalaria</h3>
    <table>
        <tr>
            <th>Tratamientos</th>
            <th>Procedimientos quirúrgicos</th>
        </tr>
        <tr>
            <td>{{ $epicrisis->tratamientos_controles ?? '' }}</td>
            <td>{{ $epicrisis->procedimientos_quirurgicos_controles ?? '' }}</td>
        </tr>
    </table>

    <h3 class="section-title">IV.- Controles e indicaciones al alta</h3>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Indicaciones</th>
        </tr>
        <tr>
            <td>{{ $fechaControl }}</td>
            <td>{{ $epicrisis->indicaciones_alta ?? '' }}</td>
        </tr>
    </table>

    <h3 class="section-title">V.- Profesional</h3>
    <table>
        <tr>
            <th>RUT</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>{{ $profesional->rut ?? '' }}</td>
            <td>{{ trim(($profesional->nombre ?? '') . ' ' . ($profesional->apellido_uno ?? '')) }}</td>
            <td>{{ $profesional->email ?? '' }}</td>
        </tr>
    </table>
</body>
</html>
