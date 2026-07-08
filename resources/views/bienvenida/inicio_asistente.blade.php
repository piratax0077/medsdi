@extends('template.bienvenida.bienvenida')

@section('page-styles')
    <style>
        .auth-wrapper{
            background-size: cover;
            background-image: url("{{ asset('images/background_2.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->

	<div class="auth-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-10 mx-auto py-2 px-5 text-center">
					<div class="col-sm-12 col-md-12 col-lg-10 mx-auto py-2 px-5 mb-3 text-center">
						<h3 class="text-dark mb-3">Bienvenido/a a SDI</h3>
						<h6>Estamos preparando tu escritorio de asistente, completa los 2 pasos de configuración para acceder a tu escritorio profesional.</h6>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mx-auto py-2 px-4">
					<div class="card-deck">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="pass();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/pass.png') }}" class="img-fluid wid-50 mb-2" alt="...">
									<h4 class="f-20 mt-0 text-dark">Cambiar contraseña</h4>
									<p class="card-text">Te recomendamos modificar la contraseña por motivos de seguridad</p>
									<button type="button" class="btn btn-primary btn-sm">Cambiar contraseña <i class="feather icon-arrow-right"></i></button>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-6">
							<a href="#" onclick="modalidad();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/mis_asistentes.svg') }}" class="img-fluid wid-50 mb-2" alt="...">
									<h4 class="f-20 mt-0 text-dark">Modalidad de trabajo</h4>
									<p class="card-text">Configura la modalidad en que deseas trabajar</p>
									<button type="button" class="btn btn-primary btn-sm">Configurar <i class="feather icon-arrow-right"></i></button>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 text-center">
					<button type="button" class="btn btn-primary" disabled>Acceder al escritorio <i class="feather icon-monitor"></i></button>
				</div>
			</div>
		</div>
	</div>
    @include("bienvenida.modal.c_pass");
    @include("bienvenida.modal.c_modalidad");
@endsection
