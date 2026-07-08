<!DOCTYPE html>
<html lang="es">

<head>
    <title>SDI</title>
    <!--[if lt IE 11]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}?t=<?= time() ?>">
</head>
<style type="text/css">
    .auth-wrapper {
        background-size: cover;
        background-image: url("{{ asset('images/background_1.jpg') }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .es-invalido {
        border-color: #ff5252;
        padding-right: calc(1.5em + 1.25rem);
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.3125rem) center;
        background-size: calc(0.75em + 0.625rem) calc(0.75em + 0.625rem);
    }

    .is-invalid {
        border-color: #ff5252 !important;
    }

    .error {
        color: red;
    }

    /* Estilos para reCAPTCHA */
    .g-recaptcha {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .captcha-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 0;
    }

</style>

<body>
    <div class="blur-bg-images"></div>
    <div class="auth-wrapper">
        <div class="auth-content">
            <!-- Ingreso a Medichile -->
            <div class="card text-center" id="ingreso">
                <div class="card-body">
                    <img src="{{ asset('images/logo_pais_vertical.png') }}" alt="" class="img-fluid mb-4 wid-100">
                    <h6 class="mb-4 mt-2 font-weight-bold text-dark f-18">¡Bienvenido a SDI!</h6>
                    <!-- mensaje -->
                    <div class="row div_mensaje">
                        @if(session('mensaje'))
                            <span class="col-sm-12 alert alert-success"> {{ session('mensaje') }}</span>
                        @endif
                        @if($errors->has('captcha'))
                            <span class="error">{{ $errors->first('captcha') }}</span>
                        @endif
                        @if($errors->any() && !$errors->getBag('registro')->any())
                            <span class="col-sm-12 alert alert-danger">{{ $errors->first() }}</span>
                        @endif
                    </div>
                    <!-- Ingreso -->
                    <div class="toggle-block">
                        <div class="form-group mb-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Ingrese email o RUT</label>
                                    <input type="text" class="form-control" name="email" id="email" value="" placeholder="correo@ejemplo.com o 12345678-9">
                                    <small>Escriba correo electrónico o RUT sin puntos y con guión</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Ingrese su contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        value="">
                                       <a href="javascript:void(0);" class="text-c-blue forgot-password" onclick="activar_recuperar_password();">
                                            ¿Olvidó su contraseña?
                                       </a>
                                </div>

                                <button class="btn btn-info mb-4" id="btn-ingresar">Ingresar</button>
                            </form>

                            <p class="mb-2 text-muted">¿Quieres conocer más?  <span class="font-weight-bold pointer text-c-blue" onclick="activar_registro();">crea tu cuenta</span> o <a charset="pointer text-c-blue font-weight-bold" style="color: #1848a1!important" href="https://www.med-sdi.cl/sdinicio/" target="_blank">descúbrelo aquí</a></p>
                        </div>

                    </div>
                    <!-- Cierre:Ingreso -->
                </div>
            </div>
            <!-- Cierre: Ingreso a Medichile -->

            <!-- Recuperar Contraseña -->
            <div class="card text-center" id="recuperar_password" style="display: none;">
                <div class="card-body">
                    <img src="{{ asset('images/logo_pais_vertical.png') }}" alt="" class="img-fluid mb-4 wid-100">
                    <h6 class="mb-3 f-18 text-dark"><i class="feather icon-lock"></i> Recuperar Contraseña</h6>
                    <!-- enlace para volver a login -->
                    <p class="mb-3 text-muted">¿Recordaste tu contraseña? <span class="text-c-blue font-weight-bold pointer" onclick="volver_login();">Volver a Login</span></p>
                    <!-- mensaje -->
                    <div class="row div_mensaje">
                        @if(session('mensaje'))
                            <span class="col-sm-12 alert alert-success"> {{ session('mensaje') }}</span>
                        @endif
                        @if($errors->has('captcha'))
                            <span class="col-sm-12 alert alert-danger">{{ $errors->first('captcha') }}</span>
                        @endif
                    </div>
                    <!-- Mensaje informativo -->
                    <div class="alert alert-info mb-4" role="alert">
                        <i class="feather icon-info"></i>
                        Ingresa tu correo electrónico y te enviaremos una nueva contraseña.
                    </div>

                    <!-- formulario recuperar -->
                    <div class="">
                        <div class="form-group mb-3">
                            <form method="POST" action="{{ route('home.recuperar_contrasena') }}" id="form_recuperar_password">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Correo electrónico</label>
                                    <input type="email" class="form-control @error('email') es-invalido @enderror" name="email" id="email_recuperar" placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                                    <small>Ingresa el correo asociado a tu cuenta</small>
                                    @error('email')<span class="error">{{ $message }}</span>@enderror
                                </div>

                                <!-- reCAPTCHA -->
                                @if(config('services.recaptcha.site_key'))
                                    <div class="form-group mb-3 captcha-container">
                                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" style="display: inline-block;"></div>
                                    </div>
                                    @error('g-recaptcha-response')
                                        <div class="form-group mb-3">
                                            <span class="error" style="display: block; text-align: center;">{{ $message }}</span>
                                        </div>
                                    @enderror
                                @else
                                    <div class="form-group mb-3">
                                        <div class="alert alert-warning text-center" style="font-size: 12px;">
                                            <i class="feather icon-alert-circle"></i> Captcha no configurado. Por favor, contacta al administrador.
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-info mb-4" id="btn-recuperar">
                                    <i class="feather icon-mail"></i> Recuperar contraseña
                                </button>
                                <button type="button" class="btn btn-outline-info mb-4" id="btn-cancelar-recuperar" onclick="volver_login();">
                                    <i class="feather icon-x"></i> Cancelar
                                </button>

                            </form>

                        </div>

                    </div>
                    <!-- Cierre: formulario recuperar -->
                </div>
            </div>
            <!-- Cierre: Recuperar Contraseña -->


            <!-- Registro Rápido -->
            <div class="card text-center" id="registro" style="display: none;">
                <div class="card-body">
                    <img src="{{ asset('images/logo_pais_vertical.png') }}" alt="" class="img-fluid mb-4 wid-100">
                    <h6 class="mb-3 f-18 text-dark">¡Registro Rápido!</h6>
                    <!-- enlace para volver a login -->
                    <p class="mb-3 text-muted">¿Ya tienes cuenta? <span class="text-c-blue font-weight-bold pointer" onclick="volver_login();">Volver a Login</span></p>
                    <!-- mensaje -->
                    <div class="row div_mensaje">
                        @if(session('mensaje'))
                            <span class="col-sm-12 alert alert-success"> {{ session('mensaje') }}</span>
                        @endif
                        @if($errors->has('registro_error'))
                            <span class="error mb-4">{{ $errors->first('registro_error') }}</span>
                        @endif
                    </div>
                    <!-- Mensaje informativo elegante -->
                    <div class="alert alert-primary mb-4" role="alert">
                            Regístrese y pronto nos comunicaremos con usted
                     </div>

                    <!-- formulario registro -->
                    <div class="">
                        <div class="form-group mb-3">
                            <form method="POST" action="{{ route('home.registrar_potencial') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">RUT</label>
                                    <input type="text" class="form-control @error('rut', 'registro') es-invalido @enderror" name="rut" id="rut" placeholder="12345678-9" value="{{ old('rut') }}"><small>Escriba RUT sin puntos y con guión</small>
                                    @error('rut', 'registro')<span class="error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Nombre Completo</label>
                                    <input type="text" class="form-control @error('nombre', 'registro') es-invalido @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}">
                                    @error('nombre', 'registro')<span class="error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="tel" class="form-control @error('telefono', 'registro') es-invalido @enderror" name="telefono" id="telefono" placeholder="+56 9 XXXX XXXX" value="{{ old('telefono') }}">
                                    @error('telefono', 'registro')<span class="error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Correo Electrónico</label>
                                    <input type="email" class="form-control @error('email', 'registro') es-invalido @enderror" name="email" id="email_registro" value="{{ old('email') }}">
                                    @error('email', 'registro')<span class="error">{{ $message }}</span>@enderror
                                </div>

                                <!-- reCAPTCHA -->
                                @if(config('services.recaptcha.site_key'))
                                    <div class="form-group mb-3 captcha-container">
                                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" style="display: inline-block;"></div>
                                    </div>
                                    @error('g-recaptcha-response', 'registro')
                                        <div class="form-group mb-3">
                                            <span class="error" style="display: block; text-align: center;">{{ $message }}</span>
                                        </div>
                                    @enderror
                                @else
                                    <div class="form-group mb-3">
                                        <div class="alert alert-warning text-center" style="font-size: 12px;">
                                            <i class="feather icon-alert-circle"></i> Captcha no configurado. Por favor, contacta al administrador.
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-info mb-4" id="btn-registrar">Registrarse</button>
                                <button type="button" class="btn btn-outline-info mb-4" id="btn-cancelar" onclick="volver_login();">Cancelar</button>

                            </form>

                        </div>

                    </div>
                    <!-- Cierre: formulario registro -->
                </div>
            </div>
            <!-- Cierre: Registro Rápido -->

        </div>
    </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/login/registro.js') }}"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function activar_registro()
        {
            $('#ingreso').hide();
            $('#recuperar_password').hide();
            $('#registro').show();
        }

        function volver_login()
        {
            $('#registro').hide();
            $('#recuperar_password').hide();
            $('#ingreso').show();
        }

        $(document).ready(function() {
			@if($errors->getBag('registro')->any())
            activar_registro();
            @endif

            // Mostrar formulario de recuperación si hay error de captcha
            @if($errors->has('captcha'))
            activar_recuperar_password();
            @endif
        });

        function activar_recuperar_password()
        {
            $('#ingreso').hide();
            $('#registro').hide();
            $('#recuperar_password').show();
        }

    </script>

</body>
