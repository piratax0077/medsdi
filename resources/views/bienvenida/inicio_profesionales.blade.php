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

        body{
        	margin-bottom: 0px;
        	padding-bottom: 0px;
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
					<h6>Estamos preparando tu escritorio profesional, completa los 2 pasos de configuración para acceder a tu escritorio profesional.</h6>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 mx-auto py-2 px-4">
					<div class="card-deck">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="lugar();">
							<div class="card">
								<div class="card-body text-center">
								  <img src="{{ asset('images/iconos/lugar.svg') }}" class="img-fluid wid-50 mb-2" alt="...">
									<div class="media-body">
									    <h4 class="f-20 mt-0 text-dark">Mi lugar de atención</h4>
										<p class="card-text mb-3">Registra un lugar de atención, donde atenderás a tus pacientes</p>
										<button type="button" class="btn btn-primary btn-sm">Configurar lugar <i class="feather icon-arrow-right"></i></button>
									</div>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="perfil();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/academico.png') }}" class="img-fluid wid-60" alt="...">
									<h4 class=" f-20 mt-0 text-dark">Información académica</h4>
									<p class="card-text mb-3">Completa tu información profesional y antecedentes académicos</p>
									<button type="button" class="btn btn-primary btn-sm">Completar perfil <i class="feather icon-arrow-right"></i></button>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 text-center">
							<button type="button" class="btn btn-primary">Acceder al escritorio <i class="feather icon-monitor"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include("bienvenida.modal.c_lugar_prof");
    @include("bienvenida.modal.c_asistente_prof");
    @include("bienvenida.modal.c_perfil_prof");
@endsection
