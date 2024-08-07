<!DOCTYPE html>
<html lang="es">

<head>
	@include('auth/include/head')

	<link rel="stylesheet" href="{{ asset('css/form-registro.css') }}">
	<link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
</head>

<body>
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

        .error {
            color: red;
        }
    </style>

    <div class="auth-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-6 mx-auto py-2">
					<div class="card">
						<div class="card-header pt-2 pb-1">
							<h5>Nuestras APP</h5>
						</div>
						<div class="card-body">

                            <div class="" style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-around; align-items: center;">
                                <div class="ml-1 mr-1">
                                    <div class="text-center">
                                        <a href="{{ asset('app/download/sdipass.apk') }}">
                                            <img src="{{ asset('images/app_descarga/apk.png') }}" alt="logo_apk" class="img-fluid" style="max-width: 118px;">
                                            <div style="font-weight: bold;color: #0751ff;font-size: 15px;">Descarga<br>SDI-PASS APK</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="ml-1 mr-1">
                                    <div class="text-center">
                                        <div style="font-weight: bold;color: #0751ff;font-size: 15px;">PROXIMAMENTE</div>
                                        <img src="{{ asset('images/app_descarga/google_play_logo.png') }}" alt="google_play_logo" class="img-fluid">
                                        <div>SDI-PASS - PLAY STORE</div>
                                    </div>
                                </div>
                                <div class="ml-1 mr-1">
                                    <div class="text-center">
                                        <div style="font-weight: bold;color: #0751ff;font-size: 15px;">PROXIMAMENTE</div>
                                        <img src="{{ asset('images/app_descarga/app_store_logo.png') }}" alt="app_store_logo" class="img-fluid">
                                        <div>SDI-PASS - App Store</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                	</div>
				</div>
			</div>
		</div>
	</div>
    <!--Cierre de Formulario-->

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

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
