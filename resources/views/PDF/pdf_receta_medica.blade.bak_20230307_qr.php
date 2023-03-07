<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>PLANTILLA PDF</title>
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
    <header>
        <div class="contenido-encabezado-uno">
            <div class="contenido-logo">
                <!-- <img style="width: 100%;" class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}"> -->
                <img style="width: 100%;" class="logo" src="https://med-sdi.cl/images/pdf/sdi-logo.svg">
            </div>
            <div class="contenido-infoprof">
                <p><strong>{{ $cuerpo['array_profesional']['nombre'] }}</strong></p>
                <p>{{ $cuerpo['array_profesional']['especialidad'] }}</p>
                <p>Rut: {{ $cuerpo['array_profesional']['rut'] }}</p>
                <p>RCM: 00000-0</p>
                <p>Arlegui 934, Viña del Mar</p>
                <p>V región</p>
            </div>
        </div>
        <div class="contenido-encabezado-dos">
            <h2 class="text-blue centrar mb-1">RECETA MÉDICA</h2>
            <table>
                <tbody>
                    <tr>
                        <td style="padding: 0px;"><strong>Paciente:</strong></td>
                        <td style="padding-top: 8px;">{{ $cuerpo['array_paciente']['nombre'] }}</td>
                        <td style="padding: 0px;"><strong>Rut:</strong></td>
                        <td style="padding-top: 8px;">{{ $cuerpo['array_paciente']['rut'] }}</td>
                        <td style="padding: 0px;"><strong>Sexo:</strong></td>
                        <td style="padding-top: 8px;">{{ $cuerpo['array_paciente']['sexo'] }}</td>
                        <td style="padding: 0px;"><strong>Edad:</strong></td>
                        <td style="padding-top: 8px;">{{ \Carbon\Carbon::parse($cuerpo['array_paciente']['fecha_nac'])->age }}</td>
                    </tr>
                    <tr>
                        <td><strong>Dirección:</strong></td>
                        <td>{{ $cuerpo['array_paciente']['direccion'] }}</td>
                        <!--Calle, Nº, Comuna. Región-->
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="">
        <div class="fecha"><strong>Fecha:</strong> {{ $cuerpo['array_ficha_atencion']['created_at'] }}</div>
    </header>

    <footer>
        <div class="contenido-footer">
            <table class="text-center" >
                <tbody>
                <tr>
                    <th style="width: 50%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_ficha_atencion']['qr']) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Valide este documento<br>escaneando el código</div>
                    </th>
                    <th style="padding-top: 10px;width: 50%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_profesional']['qr']) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: lighter; font-family: Poppins; font-size: 10px;">Firma Digital Avanzada SDI</div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Dr. {{ $cuerpo['array_profesional']['nombre'] }}</div>
                        <div style="line-height: 10px; font-weight: lighter; font-family: Poppins;">{{ $cuerpo['array_profesional']['token'] }}</div>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </footer>

    <main>

        <div class="contenido-body" style="page-break-after: always;">
            <!--Inicio de información-->
            <h4 class="text-blue">Rp:</h4>
            <table class="tabla-receta">
                <thead>
                    <tr class="t-gris">
                        <th style="text-align: left;">Prescripción</th>
                        <th style="text-align: left;">Cantidad</th>
                        <th style="text-align: left;">Duración<br>tratamiento</th>
                        <th style="text-align: left;">Indicación <br>para paciente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>LEXAPRO 20 mg (Escitalopram)</strong><br>
                        28 comprimidos, <span>vía oral</span></td>
                        <td>2 cajas (dos)</td>
                        <td>3 días</td>
                        <td>1 comprimido por la mañana</td>
                    </tr>
                    <tr>
                        <td><strong>ENALAPRIL 10mg (Enalapril)</strong><br>
                        3 ampollas, <span>vía inyectable</span></td>
                        <td>1 caja (una)</td>
                        <td><span>uso crónico</span></td>
                        <td>1 comprimido cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>PACLITAXEL 80mg/4ml solución inyectable (Paclitaxel)</strong></td>
                        <td>3 frascos de amp. (tres)</td>
                        <td>3 días</td>
                        <td>1 ampolla cada 8 horas</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="contenido-body" style="page-break-after: auto;">
            <!--Inicio de información-->
            <h4 class="text-blue">Rp:</h4>
            <table class="tabla-receta">
                <thead>
                    <tr class="t-gris">
                        <th style="text-align: left;">Prescripción</th>
                        <th style="text-align: left;">Cantidad</th>
                        <th style="text-align: left;">Duración<br>tratamiento</th>
                        <th style="text-align: left;">Indicación <br>para paciente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1LEXAPRO 20 mg (Escitalopram)</strong><br>
                        28 comprimidos, <span>vía oral</span></td>
                        <td>2 cajas (dos)</td>
                        <td>3 días</td>
                        <td>1 comprimido por la mañana</td>
                    </tr>
                    <tr>
                        <td><strong>2ENALAPRIL 10mg (Enalapril)</strong><br>
                        3 ampollas, <span>vía inyectable</span></td>
                        <td>1 caja (una)</td>
                        <td><span>uso crónico</span></td>
                        <td>1 comprimido cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>3PACLITAXEL 80mg/4ml solución inyectable (Paclitaxel)</strong></td>
                        <td>3 frascos de amp. (tres)</td>
                        <td>3 días</td>
                        <td>1 ampolla cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>4LEXAPRO 20 mg (Escitalopram)</strong><br>
                        28 comprimidos, <span>vía oral</span></td>
                        <td>2 cajas (dos)</td>
                        <td>3 días</td>
                        <td>1 comprimido por la mañana</td>
                    </tr>
                    <tr>
                        <td><strong>5ENALAPRIL 10mg (Enalapril)</strong><br>
                        3 ampollas, <span>vía inyectable</span></td>
                        <td>1 caja (una)</td>
                        <td><span>uso crónico</span></td>
                        <td>1 comprimido cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>6PACLITAXEL 80mg/4ml solución inyectable (Paclitaxel)</strong></td>
                        <td>3 frascos de amp. (tres)</td>
                        <td>3 días</td>
                        <td>1 ampolla cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>7LEXAPRO 20 mg (Escitalopram)</strong><br>
                        28 comprimidos, <span>vía oral</span></td>
                        <td>2 cajas (dos)</td>
                        <td>3 días</td>
                        <td>1 comprimido por la mañana</td>
                    </tr>
                    <tr>
                        <td><strong>8ENALAPRIL 10mg (Enalapril)</strong><br>
                        3 ampollas, <span>vía inyectable</span></td>
                        <td>1 caja (una)</td>
                        <td><span>uso crónico</span></td>
                        <td>1 comprimido cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>9PACLITAXEL 80mg/4ml solución inyectable (Paclitaxel)</strong></td>
                        <td>3 frascos de amp. (tres)</td>
                        <td>3 días</td>
                        <td>1 ampolla cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>10LEXAPRO 20 mg (Escitalopram)</strong><br>
                        28 comprimidos, <span>vía oral</span></td>
                        <td>2 cajas (dos)</td>
                        <td>3 días</td>
                        <td>1 comprimido por la mañana</td>
                    </tr>
                    <tr>
                        <td><strong>11ENALAPRIL 10mg (Enalapril)</strong><br>
                        3 ampollas, <span>vía inyectable</span></td>
                        <td>1 caja (una)</td>
                        <td><span>uso crónico</span></td>
                        <td>1 comprimido cada 8 horas</td>
                    </tr>
                    <tr>
                        <td><strong>12PACLITAXEL 80mg/4ml solución inyectable (Paclitaxel)</strong></td>
                        <td>3 frascos de amp. (tres)</td>
                        <td>3 días</td>
                        <td>1 ampolla cada 8 horas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</html>

