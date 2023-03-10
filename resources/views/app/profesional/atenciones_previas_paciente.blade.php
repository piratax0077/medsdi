@extends('template.profesional.template')
@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!--Header-->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Atenciones Realizadas</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</a></li>
							<li class="breadcrumb-item"><a href="#">Atenciones Realizadas</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--Cierre: Header-->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 pb-4">
								<!-- inculde -->
								<?php $fade = 'in'; $titulo = 'NO'; ?>
								@include('atencion_medica.formularios.atenciones_previas_form' )

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
