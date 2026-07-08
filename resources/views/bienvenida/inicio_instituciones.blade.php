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
				<div class="col-sm-12 col-md-12 col-lg-10 mx-auto py-2 px-5 mb-3 text-center">
					<h3 class="text-dark mb-3">Bienvenido/a a SDI</h3>
					<h6>Estamos preparando tu escritorio institucional, completa los 2 pasos de configuración para acceder a tu escritorio</h6>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 mx-auto py-2 px-4">
					<div class="card-deck">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="lugar();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/lugar.svg') }}" class="img-fluid wid-50 mb-2" alt="lugar">
									<h4 class=" f-20 mt-0 text-dark">Mi lugar de atención</h4>
									<p class="card-text mb-3">Configura el lugar de atención matriz</p>
									<button type="button" class="btn btn-primary btn-sm">Configurar lugar <i class="feather icon-arrow-right"></i></button>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="horario();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/horario.png') }}" class="img-fluid wid-60" alt="horario">
									<h4 class=" f-20 mt-0 text-dark">Horario de atención</h4>
									<p class="card-text mb-3">Configura el horario del lugar de atención matriz</p>
									<button type="button" class="btn btn-primary btn-sm">Configurar horario <i class="feather icon-arrow-right"></i></button>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 text-center">
					<button type="button" class="btn btn-primary" disabled>Acceder al escritorio <i class="feather icon-monitor"></i></button>
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include("bienvenida.modal.c_lugar_inst");
    @include("bienvenida.modal.c_horario_inst");
@endsection
