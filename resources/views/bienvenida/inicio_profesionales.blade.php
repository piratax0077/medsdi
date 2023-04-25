@extends('template.bienvenida.profesionales')

@section('content')
    <!--Container Completo-->
    
	<div class="pcoded-content">
		<!--Header-->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center pb-2">
					<div class="col-md-6">
						<div class="page-header-title">
							<h5 class="text-white d-inline f-16 mt-1"><strong>SDI le da la Bienvenida Profesional nuevo</strong></h5>
							<p class="font-italic mt-0 mb-0 text-white">
								@php
									$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									$fecha = \Carbon\Carbon::parse(now());
									$mes = $meses[($fecha->format('n')) - 1];
									$fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
								@endphp
								{{ $fecha }}
							</p>

						</div>
					</div>
					<div class="col-md-6">
						{{--  <div class="page-header-title">
							<button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
						</div>  --}}
					</div>
				</div>
			</div>
		</div>
		<!--Cierre: Header-->
		<!-- TAB ATENCIÓN -->
		<!--
		<div class="user-profile user-card pt-0">
			<div class="card-body py-0">
				<div class="user-about-block m-0">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		-->
		<!-- tab general-->
		<!--Contenido de tab-->
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content" id="at-oftalmo">
					<!--Atender paciente-->
					<div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
					@include('bienvenida.profesionales')
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection
