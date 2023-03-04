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
                position: fixed;
                writing-mode: vertical-lr;
                transform: rotate(270deg);
                right: -320px;
                top: 400px;
            }
            .fecha{
                font-size: 0.9rem;
                text-align: right;
            }
        </style>
    </head>
    <div class="texto-vertical-2">Este documento  lo puedes validar en www.med-sdi.cl - Cód. Indetificador 2315d1651sad65asd</div>
    <header>
        <div class="contenido-encabezado-uno">
            <div class="contenido-logo">
                <img class="logo" src="{{ asset('images/logos/logo_pais_horizontal.svg') }}">
            </div>
            <div class="contenido-infoprof">
                <p><strong>Jaime Kriman Astorga</strong></p>
                <p>Especialidad</p>
                <p>Rut: 00.000.000-0</p>
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
                        <td><strong>Paciente:</strong></td>
                        <td>Alan Alejandro Ramirez Quiroz</td>
                        <td><strong>Rut:</strong></td>
                        <td>00.000.000-0</td>
                        <td><strong>Sexo:</strong></td>
                        <td>Masculino</td>
                        <td><strong>Edad:</strong></td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td><strong>Dirección:</strong></td>
                        <td>Jorge Llanos, 153. Los Andes. V región</td>
                        <!--Calle, Nº, Comuna. Región-->
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="">
        <div class="fecha">Fecha: 04/03/2023 11:10</div>
    </header>

    <footer>
        <div class="contenido-footer">
            <table class="text-center" >
                <tbody>
                <tr>
                    <th style="width: 50%;">
                        <p><strong>Valide este documento escaneando el siguiente código</strong></p>
                        <img  src="{{ asset('images/qr_demo/qr_demo_documento.jpg') }}">
                    </th>
                    <th style="padding-top: 35px;width: 50%;">
                        <img  src="{{ asset('images/qr_demo/qr_demo_profesional.jpg') }}"><br>
                        <p>
                            <strong>Firma Digital Avanzada SDI</strong><br>
                            <strong>Dr.Jaime Kriman Astorga</strong><br>
                            37WjwqdEYJHWJsjdkjs
                        </p>
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

