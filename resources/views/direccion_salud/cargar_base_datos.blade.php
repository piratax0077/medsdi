@extends('template.direccion_salud.template')

@section('content')
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!--Header-->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
							</li>
							<li class="breadcrumb-item">
								<a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Carga de Base de Datos</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--Cierre: Header-->

		<div class="row m-b-10">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header bg-white py-3">
						<h6 class="font-weight-bold text-dark f-18">
							Cargar Base de Datos
						</h6>
					</div>
					<div class="card-body">
						<!-- Formulario de carga de archivo -->
						<form id="form_cargar_base" enctype="multipart/form-data" method="POST" action="#">
							@csrf
							<div class="form-group">
								<label for="archivo_base" class="font-weight-bold">Seleccionar archivo</label>
								<input type="file" class="form-control-file" id="archivo_base" name="archivo_base" required>
							</div>
							<button type="submit" class="btn btn-primary">
								<i class="feather icon-upload"></i> Subir archivo
							</button>
						</form>
						<!-- Mensaje de resultado -->
						<div id="resultado_carga" class="mt-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
