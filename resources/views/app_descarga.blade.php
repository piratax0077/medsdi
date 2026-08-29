<!DOCTYPE html>
<html lang="es">

<head>
	@include('auth/include/head')

	<link rel="stylesheet" href="{{ asset('css/form-registro.css') }}">
	<link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
</head>

<body>
    <div class="auth-wrapper sdipass-auth">
        <div class="sdipass-shell">
            <div class="sdipass-card">

                <!-- Marca -->
                <div class="sdipass-hero">
                    <div class="sdipass-tile">
                        <img src="{{ asset('images/sdi-icon.png') }}" alt="SDI">
                    </div>
                    <h1>SDIPASS</h1>
                    <p>Gestiona sus autorizaciones y accede al escritorio.</p><br>
                    <h6 class="text-white">La salud, ahora en tu bolsillo.</h6>

                    <div class="sdipass-pulso" aria-hidden="true">
                        <svg viewBox="0 0 320 40" preserveAspectRatio="none" fill="none">
                            <path d="M0 20h58l9-13 11 26 10-20 8 7h32l7-16 12 32 9-23 7 7h40l8-11 10 22 9-18 7 7h83"
                                  stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <!-- Descarga -->
                <div class="sdipass-panel">
                    <h2>Descarga la app</h2>
                    <p class="sdipass-panel__intro">Escanea el código con la cámara de tu teléfono o descárgala directamente desde Google&nbsp;Play.</p>

                    <div class="sdipass-acciones">
                        @php
                            /*
                             * Código QR de muestra. Se dibuja con una grilla de 25x25 módulos e incluye
                             * los patrones reales de un QR (ojos, sincronización y alineación) sólo con
                             * fines visuales: todavía no existe el enlace de Google Play al que apuntar.
                             *
                             * Al publicar la app, reemplazar este bloque por el QR real, por ejemplo:
                             *     {!! QrCode::size(144)->margin(0)->generate($urlPlayStore) !!}
                             * (el paquete simplesoftwareio/simple-qrcode ya está instalado en el proyecto).
                             */
                            $qrModulos = 25;
                            $qrMatriz = [];

                            for ($fila = 0; $fila < $qrModulos; $fila++) {
                                for ($col = 0; $col < $qrModulos; $col++) {
                                    // Zonas reservadas: ojos con su separador, y el espacio del logo central.
                                    $enOjo = ($fila < 8 && $col < 8)
                                        || ($fila < 8 && $col >= $qrModulos - 8)
                                        || ($fila >= $qrModulos - 8 && $col < 8);
                                    $enMarca = $fila >= 9 && $fila <= 15 && $col >= 9 && $col <= 15;

                                    if ($enOjo || $enMarca) {
                                        $qrMatriz[] = false;
                                        continue;
                                    }

                                    // Patrón de alineación (anillo de 5x5) abajo a la derecha.
                                    if ($fila >= 16 && $fila <= 20 && $col >= 16 && $col <= 20) {
                                        $i = $fila - 16;
                                        $j = $col - 16;
                                        $qrMatriz[] = ($i === 0 || $i === 4 || $j === 0 || $j === 4 || ($i === 2 && $j === 2));
                                        continue;
                                    }

                                    // Patrones de sincronización: módulos alternados en la fila y columna 6.
                                    if ($fila === 6 || $col === 6) {
                                        $qrMatriz[] = (($fila + $col) % 2 === 0);
                                        continue;
                                    }

                                    // Resto: relleno determinista, para que el patrón luzca como datos reales.
                                    $qrMatriz[] = ((($fila * 73) + ($col * 151) + ($fila * $col * 31) + 17) % 100) < 47;
                                }
                            }
                        @endphp
                        <figure class="sdipass-qr-col">
                            <div class="sdipass-qr">
                                <div class="sdipass-qr__lienzo" aria-hidden="true">
                                    <div class="sdipass-qr__modulos">
                                        @foreach ($qrMatriz as $modulo)
                                            <span class="{{ $modulo ? 'on' : '' }}"></span>
                                        @endforeach
                                    </div>
                                    <div class="sdipass-qr__ojo sdipass-qr__ojo--tl"></div>
                                    <div class="sdipass-qr__ojo sdipass-qr__ojo--tr"></div>
                                    <div class="sdipass-qr__ojo sdipass-qr__ojo--bl"></div>
                                    <div class="sdipass-qr__marca">
                                        <img src="{{ asset('images/sdi-icon.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <figcaption>Apunta la cámara de tu celular al código</figcaption>
                        </figure>

                        <div class="sdipass-acciones__col">
                            {{-- TODO: reemplazar "#" por la URL de la ficha en Google Play cuando la app esté publicada --}}
                            <a href="#" class="btn-store" target="_blank" rel="noopener">
                                <svg viewBox="0 0 512 512" aria-hidden="true">
                                    <path fill="#00c3ff" d="M25.6 13.1C21.4 17.6 19 24.5 19 33.4v445.2c0 8.9 2.4 15.8 6.6 20.3l1.5 1.4 249.4-249.4v-5.9L27.1 11.6l-1.5 1.5z"/>
                                    <path fill="#ffd500" d="M359 338.1l-83.1-83.1v-5.9l83.2-83.2 1.9 1.1 98.5 56c28.1 16 28.1 42.2 0 58.2l-98.5 56-2 1.1z"/>
                                    <path fill="#ff3a44" d="M360.9 337l-85-85L25.6 502.3c9.3 9.8 24.5 11 41.8 1.2l293.5-166.5"/>
                                    <path fill="#00d07f" d="M360.9 167L67.4 .5C50.1-9.3 34.9-8.1 25.6 1.7L275.9 252 360.9 167z"/>
                                </svg>
                                <span class="btn-store__txt">
                                    <small>Disponible en</small>
                                    <strong>Google Play</strong>
                                </span>
                            </a>

                            <span class="btn-store btn-store--espera">
                                <svg viewBox="0 0 384 512" aria-hidden="true">
                                    <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/>
                                </svg>
                                <span class="btn-store__txt">
                                    <small>Próximamente en</small>
                                    <strong>App Store</strong>
                                </span>
                            </span>
                        </div>
                    </div>

                    <ol class="sdipass-pasos">
                        <li>Escanea el código QR o pulsa Google Play desde tu celular.</li>
                        <li>Instala SDIPASS en tu dispositivo Android.</li>
                        <li>Ábrela e inicia sesión con tu usuario y contraseña de siempre.</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{--
        Estructura anterior de esta vista: descarga directa del archivo .apk, badges estáticos
        e instrucciones para compartir el instalador por WhatsApp. Se deja oculta —no eliminada—
        porque la app pasa a distribuirse únicamente desde las tiendas oficiales.

        <div class="col-sm-6 col-md-6 mx-auto py-2">
            <div class="card">
                <div class="card-body text-center p-5">
                    <h4 class="mb-4 f-20">Descarga nuestra aplicación para telefonos Android</h4>
                    <div class="text-center">
                        <a href="{{ asset('app/download/sdipass.apk') }}">
                            <img src="{{ asset('images/app_descarga/apk.png') }}" alt="logo_apk" class="img-fluid rounded" style="max-width: 160px;">
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8 d-inline text-center mx-auto mt-5">
                            <div class="text-center d-inline">
                                <img src="{{ asset('images/app_descarga/google_play_logo.png') }}" alt="google_play_logo" class="img-fluid d-inline" width="150">
                            </div>
                            <div class="text-center d-inline">
                                <img src="{{ asset('images/app_descarga/app_store_logo.png') }}" alt="app_store_logo" class="img-fluid d-inline" width="150">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 mx-auto py-2">
            <div class="card">
                <div class="card-body text-center p-5">
                    <h4 class="mb-4 f-20">Instrucciones de instalación</h4>
                    <div>
                        <ul style="text-align: left">
                            <li>Desde el computador:
                                <ol>
                                    <li>Hacer click en "DESCARGAR".</li>
                                    <li>Espere que se complete la descarga.</li>
                                    <li>Debe abrir la carpeta donde se descargo el archivo.</li>
                                    <li>Abra WhatsApp desde el navegador.</li>
                                    <li>Envíe este archivo de WhatsApp a usted mismo o a otra persona.</li>
                                    <li>Ya en el celular descargue la aplicación.</li>
                                    <li>Al hacer click en ella se mostrará un mensaje de advertencia, confirme la apertura de la aplicación.</li>
                                    <li>Iniciara la instalación, confirme con Instalar.</li>
                                    <li>Su aplicación se encuentra lista para iniciar sesión.</li>
                                </ol>
                            </li>
                            <li>
                                Desde el celular:
                                <ol>
                                    <li>Hacer click en "DESCARGAR".</li>
                                    <li>Espere que se complete la descarga.</li>
                                    <li>Debe abrir la carpeta donde se descargo el archivo.</li>
                                    <li>Ya en el celular descargue la aplicación.</li>
                                    <li>Al hacer click en ella se mostrará un mensaje de advertencia, confirme la apertura de la aplicación.</li>
                                    <li>Iniciara la instalación, confirme con Instalar.</li>
                                    <li>Su aplicación se encuentra lista para iniciar sesión.</li>
                                </ol>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    --}}

    @include('auth/include/nocomplatible')

    <!--Cierre de Footer-->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/rut.js') }}"></script>
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    <script src="{{ asset('js/login/registro.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
