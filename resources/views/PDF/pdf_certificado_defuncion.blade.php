<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
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

            h2 {
                text-align: center;
                color: #3C63AD;
                font-size: 1.4rem;
                margin-bottom: 1rem;
            }

            h3 {
                color: #3C63AD;
                font-size: 1rem;
                margin-top: 1rem;
                margin-bottom: 0.5rem;
                border-bottom: 2px solid #3C63AD;
                padding-bottom: 0.3rem;
            }

            span {
                text-transform: uppercase;
            }

            /*Tablas*/
            table {
                width: 100%;
                border-collapse: collapse;
            }

            .tabla-datos {
                font-size: 0.85rem;
                margin-bottom: 1rem;
            }

            .tabla-datos td {
                padding: 5px 10px;
                vertical-align: top;
            }

            .tabla-datos .label {
                font-weight: bold;
                width: 30%;
                color: #3C63AD;
            }

            .tabla-datos .valor {
                width: 70%;
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
                color: #666;
            }

            .bg-gray {
                background-color: #FAFAFA;
            }

            /*Contenedores*/
            .contenido-encabezado-uno{
                height: 124px;
                margin: auto;
                margin-bottom: 0;
            }

            .contenido-encabezado-dos{
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
                font-size: 0.9rem;
            }

            .contenido-footer{
                font-size: 0.8rem;
                height: 100px;
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
                height: 251px;
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
                right: -200px;
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

            .seccion {
                margin-bottom: 1.5rem;
            }

            .info-item {
                margin-bottom: 0.3rem;
            }

            .info-label {
                font-weight: bold;
                color: #3C63AD;
                display: inline-block;
                min-width: 180px;
            }

        </style>
    </head>

    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Identificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>
        <div class="contenido-body">
            <h2>{{ $titulo }}</h2>

            <div class="seccion">
                <h3>1. IDENTIDAD DEL FALLECIDO</h3>
                <div class="info-item">
                    <span class="info-label">Nombre:</span>
                    <span>{{ $cuerpo['detalle_certificado']['nombre_fallecido'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">RUT:</span>
                    <span>{{ $cuerpo['detalle_certificado']['rut_fallecido'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Sexo:</span>
                    <span>
                        @if($cuerpo['detalle_certificado']['sexo_fallecido'] == 1) Masculino
                        @elseif($cuerpo['detalle_certificado']['sexo_fallecido'] == 2) Femenino
                        @else Indeterminado
                        @endif
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">Edad:</span>
                    <span>{{ $cuerpo['detalle_certificado']['edad_fallecido'] }} años</span>
                </div>

                @if($cuerpo['detalle_certificado']['testigo_1_nombre'])
                <div style="margin-top: 0.8rem;">
                    <strong>Testigos:</strong><br/>
                    <div class="info-item" style="padding-left: 1rem;">
                        Testigo 1: {{ $cuerpo['detalle_certificado']['testigo_1_nombre'] }} - RUT: {{ $cuerpo['detalle_certificado']['testigo_1_rut'] }}
                    </div>
                    @if($cuerpo['detalle_certificado']['testigo_2_nombre'])
                    <div class="info-item" style="padding-left: 1rem;">
                        Testigo 2: {{ $cuerpo['detalle_certificado']['testigo_2_nombre'] }} - RUT: {{ $cuerpo['detalle_certificado']['testigo_2_rut'] }}
                    </div>
                    @endif
                </div>
                @endif
            </div>

            <div class="seccion">
                <h3>2. DATOS DE LA DEFUNCIÓN</h3>
                <div class="info-item">
                    <span class="info-label">Fecha de fallecimiento:</span>
                    <span>{{ \Carbon\Carbon::parse($cuerpo['detalle_certificado']['fecha_fallecimiento'])->format('d/m/Y') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Hora de fallecimiento:</span>
                    <span>{{ $cuerpo['detalle_certificado']['hora_fallecimiento'] }} hrs</span>
                </div>
                @if($cuerpo['detalle_certificado']['establecimiento_direccion'])
                <div class="info-item">
                    <span class="info-label">Lugar:</span>
                    <span>{{ $cuerpo['detalle_certificado']['establecimiento_direccion'] }}</span>
                </div>
                @endif
            </div>

            <div class="seccion">
                <h3>3. CAUSAS DE LA MUERTE</h3>
                <div class="info-item">
                    <span class="info-label">Causa inmediata:</span><br/>
                    <div style="padding-left: 1rem; margin-top: 0.3rem;">
                        {{ $cuerpo['detalle_certificado']['causa_inmediata'] }}
                    </div>
                </div>
                @if($cuerpo['detalle_certificado']['causas_originarias'])
                <div class="info-item" style="margin-top: 0.5rem;">
                    <span class="info-label">Causas originarias:</span><br/>
                    <div style="padding-left: 1rem; margin-top: 0.3rem;">
                        {{ $cuerpo['detalle_certificado']['causas_originarias'] }}
                    </div>
                </div>
                @endif
                @if($cuerpo['detalle_certificado']['estados_morbosos_concomitantes'])
                <div class="info-item" style="margin-top: 0.5rem;">
                    <span class="info-label">Estados morbosos concomitantes:</span><br/>
                    <div style="padding-left: 1rem; margin-top: 0.3rem;">
                        {{ $cuerpo['detalle_certificado']['estados_morbosos_concomitantes'] }}
                    </div>
                </div>
                @endif
            </div>

            @if($cuerpo['detalle_certificado']['tipo_menor_ano'])
            <div class="seccion">
                <h3>DATOS PARA MENOR DE 1 AÑO / DEFUNCIÓN FETAL</h3>
                @if($cuerpo['detalle_certificado']['peso_nacer'])
                <div class="info-item">
                    <span class="info-label">Peso al nacer:</span>
                    <span>{{ $cuerpo['detalle_certificado']['peso_nacer'] }} gr</span>
                </div>
                @endif
                @if($cuerpo['detalle_certificado']['semanas_gestacion'])
                <div class="info-item">
                    <span class="info-label">Semanas de gestación:</span>
                    <span>{{ $cuerpo['detalle_certificado']['semanas_gestacion'] }} semanas</span>
                </div>
                @endif
                @if($cuerpo['detalle_certificado']['nombre_gestante'])
                <div class="info-item">
                    <span class="info-label">Nombre gestante/madre:</span>
                    <span>{{ $cuerpo['detalle_certificado']['nombre_gestante'] }}</span>
                </div>
                @endif
                @if($cuerpo['detalle_certificado']['nombre_padre'])
                <div class="info-item">
                    <span class="info-label">Nombre padre:</span>
                    <span>{{ $cuerpo['detalle_certificado']['nombre_padre'] }}</span>
                </div>
                @endif
            </div>
            @endif

            <div class="seccion">
                <h3>MÉDICO CERTIFICANTE</h3>
                <div class="info-item">
                    <span class="info-label">Nombre:</span>
                    <span>{{ $cuerpo['detalle_certificado']['nombre_medico'] ?? $cuerpo['array_profesional']['nombre'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">RUT:</span>
                    <span>{{ $cuerpo['detalle_certificado']['rut_medico'] ?? $cuerpo['array_profesional']['rut'] }}</span>
                </div>
                @if($cuerpo['detalle_certificado']['calidad_firmante'])
                <div class="info-item">
                    <span class="info-label">Calidad:</span>
                    <span>
                        @if($cuerpo['detalle_certificado']['calidad_firmante'] == 1) Médico tratante
                        @elseif($cuerpo['detalle_certificado']['calidad_firmante'] == 2) Médico legista
                        @elseif($cuerpo['detalle_certificado']['calidad_firmante'] == 3) Patólogo
                        @else Otro
                        @endif
                    </span>
                </div>
                @endif
                <div class="info-item">
                    <span class="info-label">Fecha certificación:</span>
                    <span>{{ $cuerpo['array_ficha_atencion']['created_at'] }}</span>
                </div>
            </div>

            <div style="margin-top: 2rem; padding-top: 1rem; border-top: 2px solid #3C63AD; text-align: center; font-size: 0.75rem; color: #666;">
                <p>Este documento tiene validez legal y puede ser verificado en www.med-sdi.cl</p>
                <p>Código de verificación: {{ $cuerpo['array_ficha_atencion']['token'] }}</p>
            </div>
        </div>
    </main>
</html>
