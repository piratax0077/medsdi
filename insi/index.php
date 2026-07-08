<!DOCTYPE html>
<html lang="es">
<head>
	<?php
		require_once('include/head.php');
	?>
</head>
<body>
	<?php
		//require_once('include/conexion.php');
	?>
	<?php
		require_once('include/header.php');
	?>


<div class="container">
		<div class="row mt-n5">
			<div class="col-md-4 text-center my-1">
				<a href="#" data-toggle="modal" data-target="#modalAgendarHora" class="text-white" style="text-decoration: none;">
					<div class="card bg-info border-0 shadow" style="width: auto;">
						<div class="card-body">
							<i class="fa-solid fa-calendar-days fa-2x mb-2"></i>
							<h5 class="card-title">Agendar Hora</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 text-center my-1">
				<a href="#esp-med" data-ancla="esp-med" class="text-white data-ancla" style="text-decoration: none;">
					<div class="card bg-azul border-0 shadow" style="width: auto;">
						<div class="card-body">
							<i class="fa-solid fa-stethoscope fa-2x mb-2"></i>
							<h5 class="card-title">Especialidades médicas</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 text-center my-1">
				<a href="#exam-proc" data-ancla="exam-proc" class="text-white" style="text-decoration: none;">
					<div class="card bg-azul border-0 shadow" style="width: auto;">
						<div class="card-body">
							<i class="fa-sharp fa-solid fa-syringe fa-2x mb-2"></i>
							<h5 class="card-title">Exámenes y procedimientos</h5>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	<!--Especialidades Médicas-->
	<div id="esp-med">
		<div data-aos="fade-up"
			data-aos-easing="linear"
			data-aos-duration="1100">
			<div class="container mt-5 mb-5">
				<div class="row">
					<div class="col-md-12 mt-5 mb-4">
						<h2 class="text-petroleo">Nuestras especialidades médicas</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 text-center">
						<img class="img-fluid" src="assets/images/especialidades-medicas.png">
					</div>
					<div class="col-md-3 text-left mt-4 font-weight-bold text-petroleo">
						<ul>
							<li class="mb-2">Medicina general</li>
							<li class="mb-2">Broncopulmonar</li>
							<li class="mb-2">Cardiología</li>
							<li class="mb-2">Cirugía digestiva</li>
							<li class="mb-2">Gastroenterología</li>
							<li class="mb-2">Ginecología</li>
							<li class="mb-2">Dermatología</li>
							<li class="mb-2">Medicina Homeópata</li>
							<li class="mb-2">Neurología</li>
						</ul>
					</div>
					<div class="col-md-3 text-left mt-4 font-weight-bold text-petroleo">
						<ul>
							<li class="mb-2 especialidad">Oftalmoglogía</li>
							<li class="mb-2 especialidad">Otorrinolaringología</li>
							<li class="mb-2 especialidad">Pediatría</li>
							<li class="mb-2 especialidad">Psicología</li>
							<li class="mb-2 especialidad">Nutricionista</li>
							<li class="mb-2 especialidad">Psiquiatría</li>
							<li class="mb-2">Traumatología</li>
							<li class="mb-2">Urología</li>
							<li class="mb-2">Kinesiología</li>
							<li class="mb-2">Fonoaudiología</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Exámenes y procedimientos-->
	<div id="exam-proc">
		<div data-aos="fade-up"
			data-aos-easing="linear"
			data-aos-duration="1100">
			<div class="container mt-10 mb-8">
				<div class="row">
					<div class="col-md-12 text-petroleo text-center mb-3">
						<h2>Exámenes y procedimientos</h2>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-md-2">
							<div class="col mb-4">
								<div class="card shadow border-0 h-100">
									<img src="assets/images/ecotomografias.png" class="card-img-top img-fluid" alt="...">
									<div class="card-body text-center">
										<h5 class="card-title text-petroleo">Imagenología</h5>
										<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#m_imagenologia">
										+ Información
										</button>
									</div>
								</div>
							</div>
							<div class="col mb-4">
								<div class="card shadow border-0 h-100">
									<img src="assets/images/endoscopicos.png" class="card-img-top img-fluid" alt="...">
									<div class="card-body text-center">
										<h5 class="card-title text-petroleo">Procedimientos endoscópicos</h6>
										<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#m_endo">
										+ Información
										</button>
									</div>
								</div>
							</div>
							<div class="col mb-4">
								<div class="card shadow border-0 h-100">
									<img src="assets/images/enfermeria.png" class="card-img-top img-fluid" alt="...">
									<div class="card-body text-center">
										<h5 class="card-title text-petroleo">Procedimientos de enfermería</h5>
										<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#m_enfermeria">
										+ Información
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Alianzas-->
	<div data-aos="fade-up"
	    data-aos-easing="linear"
	    data-aos-duration="1100">
	    <div class="container mt-10 mb-8 px-4">
	    	<div class="row">
				<div class="col-md-12 text-petroleo text-center mb-3">
					<h3>Alianzas</h3>
				</div>
			</div>
			<div class="row col-md-12 d-flex align-items-center">
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="http://www.cronicos.cl/"target="black">
						<img class="img-fluid" src="assets/images/sdi/cronicos.svg" width="300" height="auto" alt="">
					</a>
				</div>
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="https://www.med-sdi.cl/sdinicio/"target="black">
						<img class="img-fluid" src="assets/images/sdi/medichile.svg" width="220" height="auto" alt="">
					</a>
				</div>
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="http://www.farmacronicos.cl/"target="black">
						<img class="img-fluid" src="assets/images/sdi/farmacronicos.svg" width="350" height="auto" alt="">
					</a>
				</div>
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="https://www.med-sdi.cl/sdinicio/"target="black">
						<img class="img-fluid" src="assets/images/sdi/logo.svg" width="200" height="auto" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>

	<!--Contacto-->
	<div id="contacto" class="container-fluid bg-azul-corp pt-4" style="overflow: hidden;">
	<div class="row mx-0">

<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4  py-4 px-4 bg-contacto border-xl mt-3">
	<div data-aos="fade-up"
		data-aos-duration="1000">
	<h3 class="text-white font-weight-bold  mb-3 ">Contacto</h3>

	<h6 class="mt-3 text-white font-weight-bold">Horario de atención</h6>
	<p class="text-white">Lunes a Viernes 08:00 a 19:00 hrs <br>
	Sábados 08:00 a 13:00 hrs</p>
	<h6 class="mt-3 text-white font-weight-bold">Teléfono:</h6>
	<p class="text-white">(32) 2188930 - (32) 2188940</p>
	<img class="img-fluid mb-2" src="assets/images/sdi/sellos.png" width="300" height="auto" alt="Sellos">
	</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-8 col-xl-8 ml-0 mt-3">
	<div data-aos="fade-up"
	data-aos-duration="1000">
	<iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13377.375335457635!2d-71.4448017!3d-33.0474136!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1e43483d05d5385d!2sCentro%20M%C3%A9dico%20INSI!5e0!3m2!1ses-419!2scl!4v1667515700481!5m2!1ses-419!2scl" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>
</div>

</div>
</div>


<a class="btn-whatsapp" href="https://api.whatsapp.com/send?phone=56985580587" target="_blank">
		<img src="assets/images/btn-wsp.png">
</a>

	<!--Modals-->
		<!--Radiografías-->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12 text-center">
					        	<h4 class="text-petroleo">Radiografías</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>ss</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

		<!--Imagenología-->
		<div class="modal fade" id="m_imagenologia" tabindex="-1" aria-labelledby="m_imagenologia" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Imagenología</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Abdominal</li>
					        		<li>Renal</li>
					        		<li>Tiroidea</li>
					        		<li>Cervical o cuello</li>
					        		<li>Partes blandas</li>
					        		<li>Testicular simple</li>
					        		<li>Pelviana femenina</li>
					        		<li>Pelviana masculina</li>
					        		<li>Mamaria</li>
					        		<li>Transvaginal</li>
					        		<li>Obstetrica</li>
					        		<li>Ginecológica</li>
					        		<li>Seguimiento Folicular</li>
					        		<li>Doppler fetal</li>
					        		<li>3D</li><br>
					        		<li><strong>Contacto:</strong> (32) 2188947 / (32) 2921287</li>
					        		<li><strong>Whatsapp:</strong> +569 42498385</li>
					        	</ul>
					        </div>
					    </div>
				  	</div>
				</div>
			</div>
		</div>

		<!--Cardiológicos-->
		<div class="modal fade" id="m_cardio" tabindex="-1" aria-labelledby="m_cardio" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Exámenes cardiológicos</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Holter de presión</li>
					        		<li>Holter de Arritmias</li>
					        		<li>Eco Cardiograma</li>
					        		<li>Eco Cardiograma Doppler</li>
					        		<li>Eco Cardiograma Doppler Color</li>
					        		<li>Test de esfuerzo</li>
					        		<li>E.K.G</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

		<!--Procedimientos endoscópicos-->
		<div class="modal fade" id="m_endo" tabindex="-1" aria-labelledby="m_endo" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Procedimientos endoscópicos</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Endoscopía digestiva</li>
					        		<li>Rectoscopía</li>
					        		<li>Citoscopía</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

		<!--Procedimientos de enfermería-->
		<div class="modal fade" id="m_enfermeria" tabindex="-1" aria-labelledby="m_enfermeria" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Procedimientos de enfermería</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Curaciones</li>
					        		<li>Inyecciones</li>
					        		<li>Toma de presión</li>
					        		<li>Uroflujometría</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

	<!-- DATOS DE VITAL IMPORTANCIA -->
	<input type="hidden" name="id_paciente" id="id_paciente" value="0">
	<input type="hidden" id="total_bloques_examenes" value="0">
	<input type="hidden" id="reserva_examen_id_paciente" value="">
	<input type="hidden" id="reserva_examen_id_profesional" value="">
	<input type="hidden" id="reserva_examen_id_lugar_atencion" value="">
	<input type="hidden" id="reserva_examen_fecha" value="">
	<input type="hidden" id="reserva_examen_hora" value="">
	<input type="hidden" id="reserva_examen_id_tipo_examen" value="">
	<input type="hidden" id="reserva_examen_total_bloques" value="0">

	<footer>
		<?php
		require_once('include/footer_es.php');
		?>
	</footer>

	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<!-- Select2 JS - debe ir después de jQuery -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!-- Flatpickr JS - debe ir después de jQuery -->
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/aos.js"></script>


	<script type="text/javascript">
		$('.carousel').carousel({
		interval: 3000
		})
	</script>
	<script>
	  $(document).ready(function(){
	    $(".ancla").click(function(evento){
	      evento.preventDefault();
	      var codigo = "#" + $(this).data("ancla");
	      $("html,body").animate({scrollTop: $(codigo).offset().top}, 1400);
	    });
	  });
	</script>

	  <script>
		// Cargar especialidades para modal de hora médica
		let url = "https://med-sdi.cl/api/buscar_profesionales_cm";
		$.ajax({
			url: url,
			type:'post',
			data:{
				id_centro_medico: 12
			},
			success: function(resp){
				let especialidades = resp;

				$('#modal_reserva_id_profesion').empty();
				$('#modal_reserva_id_profesion').append(`<option value="0">Seleccione </option>`);
				especialidades.forEach(e => {
					console.log(e);
					$('#modal_reserva_id_profesion').append(`
						<option value="${e.id}"> ${e.nombre} </option>
					`);
				});
			},
			error: function(error){
				console.log(error.responseText);
			}
		});

		// Cargar previsiones para formulario de nuevo paciente
		$.ajax({
			url: 'https://med-sdi.cl/api/dame_previsiones',
			type: 'get',
			success: function(resp) {
				$('#nuevo_id_convenio').empty().append('<option value="0">Seleccione</option>');
				resp.forEach(function(p) {
					$('#nuevo_id_convenio').append(`<option value="${p.id}">${p.nombre}</option>`);
				});
			}
		});

		// Cargar regiones para formulario de nuevo paciente
		$.ajax({
			url: 'https://med-sdi.cl/api/dame_regiones',
			type: 'get',
			success: function(resp) {
				let regiones = typeof resp === 'string' ? JSON.parse(resp) : resp;
				$('#nuevo_id_region').empty().append('<option value="0">Seleccione región</option>');
				regiones.forEach(function(r) {
					$('#nuevo_id_region').append(`<option value="${r.id}">${r.nombre}</option>`);
				});
			}
		});

		// Cargar lista de exámenes para modal de examen
		let urlExamenes = "https://med-sdi.cl/api/buscar_examenes_cm";
		$.ajax({
			url: urlExamenes,
			type:'post',
			data:{
				id_centro_medico: 83
			},
			success: function(resp){
				console.log(resp);
				let examenes = resp;

				$('#modal_examen_id_tipo_examen').empty();
				$('#modal_examen_id_tipo_examen').append(`<option value=""></option>`);
				examenes.forEach(e => {
					console.log(e);
					$('#modal_examen_id_tipo_examen').append(`
						<option value="${e.id}" data-cant_bloque="${e.cantidad_bloques}"> ${e.nombre} </option>
					`);
				});
			},
			error: function(error){
				console.log(error.responseText);
			}
		});

		// Cargar lista de sucursales para laboratorio
		let urlSucursales = "https://med-sdi.cl/api/buscar_sucursales_laboratorio";
		$.ajax({
			url: urlSucursales,
			type:'post',
			data:{
				id_laboratorio: 83 // Ajusta este ID según tu laboratorio
			},
			success: function(resp){
				console.log(resp);
				let sucursales = resp;

				$('#modal_examen_id_sucursal').empty();
				$('#modal_examen_id_sucursal').append(`<option value="">Seleccione una sucursal</option>`);
				sucursales.forEach(s => {
					console.log(s);
					$('#modal_examen_id_sucursal').append(`
						<option value="${s.id}" data-id_lugar_atencion="${s.id_lugar_atencion}"> ${s.nombre} - ${s.direccion || s.ciudad || ''} </option>
					`);
				});
			},
			error: function(error){
				console.log(error.responseText);
			}
		});

		// Inicializar Select2 cuando se abra el modal
		$('#modalAgendarHoraExamen').on('shown.bs.modal', function () {
			// Destruir Select2 si ya existe
			if ($('#modal_examen_id_tipo_examen').hasClass("select2-hidden-accessible")) {
				$('#modal_examen_id_tipo_examen').select2('destroy');
			}

			// Inicializar Select2 con selección múltiple
			$('#modal_examen_id_tipo_examen').select2({
				dropdownParent: $('#modalAgendarHoraExamen'),
				placeholder: "Seleccione uno o más exámenes",
				allowClear: true,
				width: '100%',
				language: {
					noResults: function() {
						return "No se encontraron resultados";
					},
					searching: function() {
						return "Buscando...";
					}
				}
			});

			// No agregar múltiples event listeners
		});

		// Evento cuando cambia la selección de exámenes (fuera del modal shown)
		$('#modal_examen_id_tipo_examen').on('change', function() {
			let examenes_seleccionados = $(this).val();

			// Calcular total de bloques
			let total_bloques = 0;
			$('#modal_examen_id_tipo_examen option:selected').each(function() {
				let cant_bloques = parseInt($(this).data('cant_bloque')) || 0;
				total_bloques += cant_bloques;
			});

			console.log('Total de bloques:', total_bloques);

			// Puedes almacenar el total en un input hidden o mostrarlo en algún lugar
			$('#total_bloques_examenes').val(total_bloques);

			// Mostrar u ocultar select de sucursales
			if(examenes_seleccionados && examenes_seleccionados.length > 0) {
				$('#div_sucursales_examen').removeClass('d-none').show();
			} else {
				$('#div_sucursales_examen').addClass('d-none').hide();
				$('#modal_examen_id_sucursal').val('');
			}
		});

		// Evento cuando cambia la selección de sucursal
		$('#modal_examen_id_sucursal').on('change', function() {
			let sucursal_seleccionada = $(this).val();

			// Si se seleccionó una sucursal, buscar profesionales
			if(sucursal_seleccionada) {
				buscar_profesionales_examen();
			}
		});
	  </script>

	  <script>
		function buscar_tipo_especialidad(value){
			$('#div_resultado_busqueda').html('');
			let id_profesion = value.value;
			console.log(id_profesion);
			let url = "https://med-sdi.cl/api/buscar_especialidades_cm";

			Swal.fire({
				title: 'Cargando...',
				html: 'Por favor espere',
				didOpen: () => {
					Swal.showLoading()
				},
				allowOutsideClick: false,
				allowEscapeKey: false
			});

			$.ajax({
				url: url,
				type:'post',
				data:{
					id_profesion: id_profesion,
					id_lugar_atencion: 12
				},
				success: function(resp){
					$('#modal_reserva_id_tipo_especialidad').empty();
					$('#div_resultado_busqueda').empty();
					$('#div_resultado_busqueda_hora').addClass('d-none');
					$('#div_resultado_busqueda_hora_').addClass('d-none');
					$('#modal_reserva_fecha').val('');
					$('#modal_reserva_dias_atencion').text('');
					console.log(resp);
					let especialidades = resp;

					$('#modal_reserva_id_especialidad').empty();
					$('#modal_reserva_id_especialidad').append(`<option value="0">Seleccione </option>`);
					especialidades.forEach(e => {
						console.log(e);
						$('#modal_reserva_id_especialidad').append(`
							<option value="${e.id}"> ${e.nombre} </option>
						`);
					});
					Swal.close();
				},
				error: function(error){
					console.log(error.responseText);
					Swal.close();
				}
			});
		}

		function buscar_subtipo_especialidad(value){
			let id_tipo_especialidad = value.value;
			console.log(id_tipo_especialidad);
			let url = "https://med-sdi.cl/api/buscar_sub_especialidades_cm";

			Swal.fire({
				title: 'Cargando...',
				html: 'Por favor espere',
				didOpen: () => {
					Swal.showLoading()
				},
				allowOutsideClick: false,
				allowEscapeKey: false
			});

			$.ajax({
				url: url,
				type:'post',
				data:{
					id_tipo_especialidad: id_tipo_especialidad,
					id_lugar_atencion: 12
				},
				success: function(resp){
					console.log(resp);
					if(resp.value == 'tipos_especialidades'){
						let especialidades = resp.tipos_especialidades;

						$('#modal_reserva_id_tipo_especialidad').empty();
						$('#modal_reserva_id_tipo_especialidad').append(`<option value="0">Seleccione </option>`);
						especialidades.forEach(e => {
							console.log(e);
							$('#modal_reserva_id_tipo_especialidad').append(`
								<option value="${e.id}"> ${e.nombre} </option>
							`);
						});
					}else{
						let profesionales = resp.profesionales;
						$('#div_resultado_busqueda').empty();
						profesionales.forEach(p => {
							console.log(p);
							var html = '';
							html += '<div class="col-sm-12 col-md-4">';
							html += '    <div class="card user-card user-card-1 mt-4">';
							html += '        <div class="card-body pt-0">';
							html += '            <div class="user-about-block text-center">';
							html += '                <div class="row align-items-end">';
							html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="https://www.med-sdi.cl/images/iconos/usuario_profesional.svg" alt="'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'"></div>';
							html += '                </div>';
							html += '            </div>';
							html += '            <div class="text-center">';
							html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
							html += '                    <span class="badge badge-primary mt-2">';

							html += '                    </span>';
							html += '                    <h6 class="mb-1 mt-2">'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'</h6>';
							html += '                </a>';



							html += '                <button type="button" class="btn btn-info btn-sm" data-nombre="'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'" onclick="hora_medica('+p.id+', this);"><i class="feather icon-calendar"></i> Reservar hora</button>';
							html += '            </div>';
							html += '        </div>';
							html += '    </div>';
							html += '</div>';

							$('#div_resultado_busqueda').append(html);
						});
					}
					Swal.close();
				},
				error: function(error){
					console.log(error.responseText);
					Swal.close();
				}
			});
		}

		function buscar_profesionales(){
			let id_profesion = $('#modal_reserva_id_profesion').val();
			let id_especialidad = $('#modal_reserva_id_especialidad').val();
			let id_tipo_especialidad = $('#modal_reserva_id_tipo_especialidad').val();
			let id_lugar_atencion = 12;

			let url = "https://med-sdi.cl/api/buscar_profesionales_cm_todos";

			Swal.fire({
				title: 'Cargando...',
				html: 'Por favor espere',
				didOpen: () => {
					Swal.showLoading()
				},
				allowOutsideClick: false,
				allowEscapeKey: false
			});

			$.ajax({
				url: url,
				type:'post',
				data:{
					id_profesion: id_profesion,
					id_especialidad: id_especialidad,
					id_tipo_especialidad: id_tipo_especialidad,
					id_lugar_atencion: id_lugar_atencion
				},
				success: function(resp){

					console.log(resp);
					let profesionales = resp.profesionales;
					$('#div_resultado_busqueda').empty();
					profesionales.forEach(p => {
						console.log(p);
						var html = '';
						html += '<div class="col-sm-12 col-md-4">';
						html += '    <div class="card user-card user-card-1 mt-4">';
						html += '        <div class="card-body pt-0">';
						html += '            <div class="user-about-block text-center">';
						html += '                <div class="row align-items-end">';
						html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="https://www.med-sdi.cl/images/iconos/usuario_profesional.svg" alt="'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'"></div>';
						html += '                </div>';
						html += '            </div>';
						html += '            <div class="text-center">';
						html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
						html += '                    <span class="badge badge-primary mt-2">';
						html += '                    </span>';
						html += '                    <h6 class="mb-1 mt-2">'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'</h6>';
						html += '                </a>';
						html += '                <button type="button" class="btn btn-info btn-sm" data-nombre="'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'" onclick="hora_medica('+p.id+', this);"><i class="feather icon-calendar"></i> Reservar hora</button>';
						html += '            </div>';
						html += '        </div>';
						html += '    </div>';
						html += '</div>';


						$('#div_resultado_busqueda').append(html);
					});
					Swal.close();
				},
				error: function(error){
					console.log(error.responseText);
					Swal.close();
				}
			});
		}

		function limpiar_horas_medicas(){
			$('#modal_reserva_hora_lista_horas_').empty();
			$('#modal_reserva_fecha').val('');
			$('#modal_reserva_fecha_seleccionada').empty();
		}

		function limpiar_busqueda_profesionales(){
			// Limpiar profesionales mostrados
			$('#div_resultado_busqueda').empty();
			// Limpiar horas disponibles del profesional anterior
			$('#modal_reserva_hora_lista_horas_').empty();
			// Limpiar fecha seleccionada
			$('#modal_reserva_fecha_seleccionada').empty();
			// Limpiar campo de fecha
			$('#modal_reserva_fecha').val('');
			// Ocultar sección de horas
			$('#div_resultado_busqueda_hora').addClass('d-none');
			$('#div_resultado_busqueda_hora_').addClass('d-none');
		}

	function cargarCiudadesRegistro(id_region) {
		if (!id_region || id_region == '0') return;

		Swal.fire({
			title: 'Cargando...',
			html: 'Por favor espere',
			didOpen: () => {
				Swal.showLoading()
			},
			allowOutsideClick: false,
			allowEscapeKey: false
		});

		$.ajax({
			url: 'https://med-sdi.cl/api/buscar_ciudad_region',
			type: 'get',
			data: { region: id_region },
			success: function(resp) {
				let ciudades = typeof resp === 'string' ? JSON.parse(resp) : resp;
				$('#nuevo_id_ciudad').empty().append('<option value="0">Seleccione ciudad</option>');
				ciudades.forEach(function(c) {
					$('#nuevo_id_ciudad').append(`<option value="${c.id}">${c.nombre}</option>`);
				});
				Swal.close();
			},
			error: function(error) {
				console.log(error);
				Swal.close();
			}
		});
	}

		function registrarNuevoPaciente() {
			let rut = $('#nuevo_rut').val().trim();
			if (!rut) {
				Swal.fire({ title: "Error", text: "Debe ingresar el RUT del paciente.", icon: "error" });
				return;
			}
			let nombre = $('#nuevo_nombre').val().trim();
			if (!nombre) {
				Swal.fire({ title: "Error", text: "Debe ingresar el nombre del paciente.", icon: "error" });
				return;
			}
			let apellido_uno = $('#nuevo_apellido_uno').val().trim();
			if (!apellido_uno) {
				Swal.fire({ title: "Error", text: "Debe ingresar el apellido paterno.", icon: "error" });
				return;
			}
			let fecha_nac = $('#nuevo_fecha_nac').val();
			if (!fecha_nac) {
				Swal.fire({ title: "Error", text: "Debe ingresar la fecha de nacimiento.", icon: "error" });
				return;
			}
			let sexo = $('#nuevo_sexo').val();
			if (!sexo || sexo === '0') {
				Swal.fire({ title: "Error", text: "Debe seleccionar el sexo del paciente.", icon: "error" });
				return;
			}
			let id_convenio = $('#nuevo_id_convenio').val();
			if (!id_convenio || id_convenio === '0') {
				Swal.fire({ title: "Error", text: "Debe seleccionar la previsión del paciente.", icon: "error" });
				return;
			}
			let direccion = $('#nuevo_direccion').val().trim();
			if (!direccion) {
				Swal.fire({ title: "Error", text: "Debe ingresar la dirección.", icon: "error" });
				return;
			}
			let id_ciudad = $('#nuevo_id_ciudad').val();
			if (!id_ciudad || id_ciudad === '0') {
				Swal.fire({ title: "Error", text: "Debe seleccionar la región y la ciudad.", icon: "error" });
				return;
			}

			// Marcar como paciente nuevo: los datos ya están en el formulario
			$('#id_paciente').val('nuevo');

			// Mostrar mensaje de confirmación y ocultar formulario
			$('#form_registro_paciente').hide();
			$('#paciente_saludo')
				.removeClass('d-none')
				.addClass('alert-success')
				.html('¡Datos cargados! Ahora selecciona el profesional, la fecha y la hora para continuar con la reserva.');

			Swal.fire({
				title: "¡Listo!",
				text: "Datos del nuevo paciente cargados correctamente. Continúa seleccionando el profesional y la hora.",
				icon: "success",
			});
		}

		function buscarPaciente(event){
			// AL INGRESAR EL RUT DEL PACIENTE Y SI SE ENCUENTRA PREGUNTAR SI DESEA CARGAR SU INFORMACION, SI ACEPTA
			// SE ENVIA UNA CORREO AL PACIENTE ENVIANDOLE UN CODIGO, CON ESE CODIGO SI COINCIDEN SE MUESTRAN LOS DATOS DEL
			//PACIENTE
			var rut = $('#rut_paciente').val();
			if(rut == ''){
				alert('Debe ingresar un rut');
				return false;
			}
			let url = 'https://med-sdi.cl/api/buscar_paciente';
			$.ajax({
				url: url,
				type: 'GET',
				data: {
					rut: rut
				},
				success: function(response){
					if(response.estado == 'ok'){
						// Mostrar info paciente
    					//$('#info_paciente_detalle').show();
    					$('#form_registro_paciente').hide();

						let paciente = response.paciente;
							console.log(paciente);
							// Mostrar saludo dentro del bloque
						$('#paciente_saludo')
							.removeClass('d-none')
							.addClass('alert-success')
							.html(`¡Hola <strong>${paciente.nombres}</strong>! Tu información se ha cargado correctamente.`);
						// Mostrar datos en la tarjeta
						$('#paciente_nombre').text(paciente.nombres);
						$('#paciente_apellido_uno').text(paciente.apellido_uno);
						$('#paciente_apellido_dos').text(paciente.apellido_dos);
						$('#paciente_rut').text(paciente.rut);
						$('#paciente_email').text(paciente.email);
						$('#paciente_telefono').text(paciente.telefono_uno);
						$('#paciente_nacimiento').text(paciente.fecha_nac);
						$('#paciente_ciudad').text(paciente.ciudad.nombre);
						$('#paciente_direccion').text(paciente.direccion.direccion + ' Nº ' + paciente.direccion.numero_dir);

						$('#id_paciente').val(paciente.id);

						//$('#info_paciente_detalle').show();

						// El resto de tu lógica para llenar los inputs o medicamentos puede seguir como ya está
						// setTimeout(() => {
						// 	$('#paciente_saludo').fadeOut();
						// }, 4000);
					}else{
						// Mostrar formulario, ocultar info
						$('#info_paciente_detalle').hide();
						$('#form_registro_paciente').show();

						// Prellenar el RUT automáticamente en el formulario de registro
						$('#nuevo_rut').val($('#rut_paciente').val());
					}

				},
				error: function(error){
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Error al buscar paciente',
					});
				}
			});

		}

		function buscarPacienteExamen(event){
			var rut = $('#rut_paciente_examen').val();
			if(rut == ''){
				alert('Debe ingresar un rut');
				return false;
			}
			let url = 'https://med-sdi.cl/api/buscar_paciente';
			$.ajax({
				url: url,
				type: 'GET',
				data: {
					rut: rut
				},
				success: function(response){
					if(response.estado == 'ok'){
						// Mostrar info paciente
						$('#info_paciente_detalle_examen').show();

						let paciente = response.paciente;
						console.log(paciente);

						// Mostrar saludo
						$('#paciente_saludo_examen')
							.removeClass('d-none')
							.addClass('alert-success')
							.html(`¡Hola <strong>${paciente.nombres}</strong>! Tu información se ha cargado correctamente.`);

						// Mostrar datos en la tarjeta
						$('#paciente_nombre_examen').text(paciente.nombres);
						$('#paciente_apellido_uno_examen').text(paciente.apellido_uno);
						$('#paciente_apellido_dos_examen').text(paciente.apellido_dos);
						$('#paciente_rut_examen').text(paciente.rut);
						$('#paciente_email_examen').text(paciente.email);
						$('#paciente_telefono_examen').text(paciente.telefono_uno);
						$('#paciente_nacimiento_examen').text(paciente.fecha_nac);
						$('#paciente_ciudad_examen').text(paciente.ciudad.nombre);
						$('#paciente_direccion_examen').text(paciente.direccion.direccion + ' Nº ' + paciente.direccion.numero_dir);

						$('#id_paciente').val(paciente.id);
					}else{
						$('#info_paciente_detalle_examen').hide();
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Paciente no encontrado',
						});
					}
				},
				error: function(error){
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Error al buscar paciente',
					});
				}
			});
		}

		// Buscar profesionales que realizan los exámenes seleccionados
		function buscar_profesionales_examen(){
			let examenes_seleccionados = $('#modal_examen_id_tipo_examen').val();
			let id_sucursal = $('#modal_examen_id_sucursal').val();

			if(!examenes_seleccionados || examenes_seleccionados.length == 0){
				$('#div_resultado_busqueda_examen').empty();
				return;
			}

			if(!id_sucursal || id_sucursal == ''){
				$('#div_resultado_busqueda_examen').html('<p class="text-center text-warning"><i class="fa-solid fa-exclamation-triangle"></i> Por favor, seleccione una sucursal del laboratorio.</p>');
				return;
			}

			console.log('Buscando profesionales para exámenes:', examenes_seleccionados);
			console.log('En sucursal:', id_sucursal);

			Swal.fire({
				title: 'Cargando...',
				html: 'Por favor espere',
				didOpen: () => {
					Swal.showLoading()
				},
				allowOutsideClick: false,
				allowEscapeKey: false
			});

			let url = "https://med-sdi.cl/api/buscar_profesionales_examen";
			$.ajax({
				url: url,
				type:'post',
				data:{
					examenes: examenes_seleccionados,
					id_sucursal: id_sucursal
				},
				success: function(resp){
					console.log(resp);
					let profesionales = resp.profesionales;
					$('#div_resultado_busqueda_examen').empty();

					if(profesionales && profesionales.length > 0){
						profesionales.forEach(p => {
							var html = '';
							html += '<div class="col-sm-12 col-md-4">';
							html += '  <div class="card shadow-sm border-0 rounded-3 p-3 text-center">';
							html += '    <img src="https://www.med-sdi.cl/images/iconos/usuario_profesional.svg" alt="'+p.nombre+' '+p.apellido_uno+'" class="rounded-circle mx-auto d-block mb-3" style="width: 80px; height: 80px;">';
							html += '    <h6 class="fw-bold">'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'</h6>';
							html += '    <p class="text-muted mb-3">Disponible para realizar examen</p>';
							html += '    <button type="button" class="btn btn-primary btn-sm" onclick="seleccionar_profesional_examen('+p.id+');">Seleccionar</button>';
							html += '  </div>';
							html += '</div>';
							$('#div_resultado_busqueda_examen').append(html);
						});
					} else {
						$('#div_resultado_busqueda_examen').html('<p class="text-center text-muted">No hay profesionales disponibles para este examen.</p>');
					}
					Swal.close();
				},
				error: function(error){
					console.log(error.responseText);
					Swal.close();
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Error al buscar profesionales',
					});
				}
			});
		}

		// Seleccionar profesional y mostrar calendario
		function seleccionar_profesional_examen(id_profesional){
			let id_paciente = $('#id_paciente').val();
			let id_sucursal = $('#modal_examen_id_sucursal').val();
			let id_lugar_atencion = 83;

			if(!id_paciente || id_paciente == '0'){
				Swal.fire({
					icon: 'warning',
					title: 'Atención',
					text: 'Debe buscar un paciente primero',
				});
				return;
			}

			$('#modal_examen_id_profesional').val(id_profesional);

			let url = 'https://med-sdi.cl/api/horas_examen_profesional_lugar_atencion';

			$.ajax({
				url: url,
				type: "get",
				data: {
					id_profesional: id_profesional,
					id_sucursal: id_sucursal,
					id_paciente: id_paciente,
					id_lugar_atencion: id_lugar_atencion
				},
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1 && data.registros.horario_agenda_laboral != '')
				{
					let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
					var dias_activos = data.registros.horario_agenda_laboral.split(',');
					var dias_texto = '';
					var cant = 0;

					$.each(dias_activos, function(index, value)
					{
						if(cant>0)
							dias_texto += ' - '+dias[value];
						else
							dias_texto += dias[value];
						cant++;
					});

					$('#div_resultado_busqueda_hora_examen').removeClass('d-none');
					$('#div_resultado_busqueda_hora_examen_').removeClass('d-none');
					$('#modal_examen_dias_atencion').html(dias_texto);

					// Inicializar flatpickr
					$('#modal_examen_fecha').attr('disabled',false);

					$("#modal_examen_fecha").flatpickr({
						"disable": [
							function(date) {
								return !dias_activos.includes(String(date.getDay()));
							}
						],
						minDate: "today",
						maxDate: new Date(new Date().setDate(new Date().getDate() + 60)),
						locale: {
							firstDayOfWeek: 1,
							weekdays: {
								shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
								longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
							},
							months: {
								shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
								longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
							},
						},
					});
				}
				else
				{
					$('#modal_examen_dias_atencion').html('NO INFORMADOS');
					$('#modal_examen_fecha').attr('disabled',true);
					$('#modal_examen_fecha_seleccionada').html('');
				}
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError);
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Error al cargar disponibilidad',
				});
			});
		}

		// Cargar horas disponibles para examen
		function cargar_horas_disponibles_examen(dia)
		{
			let id_profesional = $('#modal_examen_id_profesional').val();
			let id_lugar_atencion = 83; // Laboratorio central, ajustar si es necesario
			console.log('cargar_horas_disponibles_examen');
			console.log(dia);

			// Guardar la fecha seleccionada
			$('#modal_examen_fecha_examen').val(dia);

			let url = 'https://med-sdi.cl/api/horas_disponibles_profesional_lugar_atencion';
			$.ajax({
				url: url,
				type: "get",
				data: {
					id_profesional: id_profesional,
					id_lugar_atencion: id_lugar_atencion,
					dia: dia,
				},
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1) {
					$('#modal_examen_fecha_seleccionada').html('Horas disponibles para el día: '+data.text_fecha);

					$('#modal_examen_lista_horas').html('');
					$.each(data.registros, function(index, value)
					{
						var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
						var html = '';
						html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_examen(\''+value.hora+'\');">';
						html += ''+hr1;
						html += '</div>';

						$('#modal_examen_lista_horas').append(html);
					});
				} else {
					$('#modal_examen_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
				}
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError);
			});
		}

		// Generar reserva de examen (mostrar confirmación)
		function generar_reserva_examen(hora) {
			let id_paciente = $('#id_paciente').val();
			let id_profesional = $('#modal_examen_id_profesional').val();
			let id_lugar_atencion = parseInt($('#modal_examen_id_sucursal option:selected').data('id_lugar_atencion')) || 83;
			let fecha_examen = $('#modal_examen_fecha').val();
			let examenes_seleccionados = $('#modal_examen_id_tipo_examen').val();

			// Obtener nombres de los exámenes seleccionados
			let nombres_examenes = [];
			$('#modal_examen_id_tipo_examen option:selected').each(function() {
				nombres_examenes.push($(this).text());
			});

			let nombre_examenes_texto = nombres_examenes.join(', ');
			console.log(nombre_examenes_texto);
			// Mostrar en el div
			$('#confirmar_nombre_examen_').text(nombre_examenes_texto);

			// Obtener nombre de la sucursal seleccionada
			let nombre_sucursal = $('#modal_examen_id_sucursal option:selected').text();

			// Llamar a la API para obtener datos del paciente
			let url = "https://med-sdi.cl/api/obtener_datos_paciente_por_rut_agenda";

			$.ajax({
				url: url,
				type: "get",
				data: {
					id_dependiente_activo: id_paciente,
					id_profesional: id_profesional,
					id_lugar_atencion: id_lugar_atencion,
					fecha_consulta: fecha_examen,
					hora: hora
				},
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1)
				{
					// Llenar datos del paciente en la confirmación
					$('#confirmar_rut_examen').text(data.registro.rut);
					$('#confirmar_nombre_examen').text(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
					$('#confirmar_fecha_nac_examen').text(data.registro.fecha_nac);
					$('#confirmar_edad_examen').text(data.registro.edad + ' años');
					$('#confirmar_sexo_examen').text(data.registro.sexo == 'M' ? 'Masculino' : 'Femenino');
					$('#confirmar_prevision_examen').text(data.registro.prevision.nombre);
					$('#confirmar_email_examen').text(data.registro.email);
					$('#confirmar_telefono_examen').text(data.registro.telefono_uno);
					$('#confirmar_direccion_examen').text(data.registro.direccion.direccion + ' ' + data.registro.direccion.numero_dir);
					$('#confirmar_ciudad_examen').text(data.registro.direccion.ciudad.nombre);

					// Llenar datos del examen
					$('#confirmar_nombre_examen').text(nombre_examenes_texto);
					$('#confirmar_fecha_examen').text(fecha_examen);
					$('#confirmar_hora_examen').text(hora);
					$('#confirmar_profesional_examen').text(data.profesional.nombre + ' ' + data.profesional.apellido_uno + ' ' + data.profesional.apellido_dos);
					$('#confirmar_lugar_examen').text(nombre_sucursal);

					// Guardar datos en inputs ocultos
					$('#reserva_examen_id_paciente').val(data.registro.id);
					$('#reserva_examen_id_profesional').val(id_profesional);
					$('#reserva_examen_id_lugar_atencion').val(id_lugar_atencion);
					$('#reserva_examen_fecha').val(fecha_examen);
					$('#reserva_examen_hora').val(hora);
					$('#reserva_examen_id_tipo_examen').val(JSON.stringify(examenes_seleccionados));

					// Guardar también el total de bloques
					let total_bloques = $('#total_bloques_examenes').val();
					$('#reserva_examen_total_bloques').val(total_bloques);

					// Ocultar contenido de selección y mostrar confirmación
					$('#modal_contenido_seleccion_examen').hide();
					$('#divConfirmarReservaExamen').removeClass('d-none').show();
				}
				else
				{
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: data.msj || 'No se pudo obtener los datos del paciente',
					});
				}
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError);
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Error al obtener datos del paciente',
				});
			});
		}

		// Confirmar reserva de examen
		function confirmarReservaExamen() {
			let id_paciente = $('#reserva_examen_id_paciente').val();
			let id_profesional = $('#reserva_examen_id_profesional').val();
			let id_lugar_atencion = $('#reserva_examen_id_lugar_atencion').val();
			let fecha_examen = $('#reserva_examen_fecha').val();
			let hora_examen = $('#reserva_examen_hora').val();
			let id_tipo_examen = $('#reserva_examen_id_tipo_examen').val();
			let total_bloques = $('#reserva_examen_total_bloques').val();

			let url = "https://med-sdi.cl/api/confirmar_reserva_examen";

			$.ajax({
				url: url,
				type: "post",
				data: {
					id_paciente: id_paciente,
					id_profesional: id_profesional,
					id_lugar_atencion: id_lugar_atencion,
					fecha_examen: fecha_examen,
					hora_examen: hora_examen,
					id_tipo_examen: id_tipo_examen,
					total_bloques: total_bloques
				},
                beforeSend: function(){
                    Swal.fire({
                        title: 'Confirmando reserva...',
                        text: 'Por favor, espere mientras confirmamos su reserva de examen.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
			})
			.done(function(data) {
                Swal.close();
				console.log(data);

				// Limpiar modal PRIMERO
				limpiarModalAgendarExamen();

				// Cerrar el modal
				$('#modalAgendarHoraExamen').modal('hide');

				// Esperar 300ms y limpiar completamente los restos del modal
				setTimeout(function() {
					// Eliminar todos los backdrops
					$('.modal-backdrop').remove();
					// Limpiar estilos del body
					$('body').removeClass('modal-open').css({'padding-right': '', 'overflow': ''});
					// Eliminar atributos del modal
					$('#modalAgendarHoraExamen').removeAttr('aria-hidden').removeAttr('style').removeClass('show');

					// Mostrar mensaje de éxito/error
					if (data.estado == 1) {
						Swal.fire({
							icon: 'success',
							title: '¡Examen Agendado!',
							text: 'Su examen ha sido agendado exitosamente.',
							confirmButtonColor: '#007bff'
						});
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: data.msj || 'No se pudo confirmar la reserva del examen. Intente nuevamente.',
						});
					}
				}, 300);
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError);

				// Limpiar modal PRIMERO
				limpiarModalAgendarExamen();

				// Cerrar el modal
				$('#modalAgendarHoraExamen').modal('hide');

				// Esperar 300ms y limpiar completamente los restos del modal
				setTimeout(function() {
					// Eliminar todos los backdrops
					$('.modal-backdrop').remove();
					// Limpiar estilos del body
					$('body').removeClass('modal-open').css({'padding-right': '', 'overflow': ''});
					// Eliminar atributos del modal
					$('#modalAgendarHoraExamen').removeAttr('aria-hidden').removeAttr('style').removeClass('show');

					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Ocurrió un error al procesar su solicitud. Intente nuevamente.',
					});
				}, 300);
			});
		}

		// Ocultar confirmación de examen
		function ocultarConfirmacionExamen() {
			$('#divConfirmarReservaExamen').addClass('d-none').hide();
			$('#modal_contenido_seleccion_examen').show();
		}

		// Limpiar modal de agendar examen
		function limpiarModalAgendarExamen() {
			// Limpiar inputs
			$('#rut_paciente_examen').val('');
			$('#modal_examen_id_profesional').val('');
			$('#modal_examen_fecha_examen').val('');
			$('#modal_examen_fecha').val('');
			$('#id_paciente').val('0');

			// Limpiar select2 (resetear selección)
			$('#modal_examen_id_tipo_examen').val(null).trigger('change');

			// Limpiar select de sucursales y ocultarlo
			$('#modal_examen_id_sucursal').val('');
			$('#div_sucursales_examen').addClass('d-none').hide();

			// Limpiar resultados de búsqueda
			$('#div_resultado_busqueda_examen').empty();
			$('#modal_examen_lista_horas').empty();

			// Ocultar secciones
			$('#div_resultado_busqueda_hora_examen').addClass('d-none');
			$('#div_resultado_busqueda_hora_examen_').addClass('d-none');
			$('#info_paciente_detalle_examen').hide();
			$('#paciente_saludo_examen').addClass('d-none');

			// Limpiar textos
			$('#modal_examen_dias_atencion').text('');
			$('#modal_examen_fecha_seleccionada').text('');

			// Asegurarse de que el contenido de selección esté visible
			$('#modal_contenido_seleccion_examen').show();
			$('#divConfirmarReservaExamen').addClass('d-none').hide();

			// Limpiar campos de confirmación
			$('#confirmar_rut_examen, #confirmar_nombre_examen, #confirmar_fecha_nac_examen, #confirmar_edad_examen, #confirmar_sexo_examen').text('');
			$('#confirmar_prevision_examen, #confirmar_email_examen, #confirmar_telefono_examen, #confirmar_direccion_examen, #confirmar_ciudad_examen').text('');
			$('#confirmar_nombre_examen, #confirmar_fecha_examen, #confirmar_hora_examen, #confirmar_profesional_examen, #confirmar_lugar_examen').text('');
			$('#reserva_examen_id_paciente, #reserva_examen_id_profesional, #reserva_examen_id_lugar_atencion').val('');
			$('#reserva_examen_fecha, #reserva_examen_hora, #reserva_examen_id_tipo_examen').val('');
		}

		function hora_medica(id_profesional, btn){
			let id_paciente = $('#id_paciente').val();
			let id_lugar_atencion = 12;

			$('#modal_reserva_hora_id_profesional').val(id_profesional);

			// Guardar nombre del profesional para la pantalla de confirmación
			if (btn) {
				$('#modal_reserva_nombre_profesional').val($(btn).data('nombre') || '');
			}

			// Limpiar horas y fecha seleccionada del profesional anterior
			$('#modal_reserva_hora_lista_horas_').html('');
			$('#modal_reserva_fecha_seleccionada').html('');
			$('#modal_reserva_hora_fecha_consulta').val('');
			$('#modal_reserva_fecha').val('');

			// Destruir instancia anterior de flatpickr si existe
			let $fechaInput = $('#modal_reserva_fecha');
			if ($fechaInput[0] && $fechaInput[0]._flatpickr) {
				$fechaInput[0]._flatpickr.destroy();
			}

			let url = 'https://med-sdi.cl/api/horas_medicas_profesional_lugar_atencion';

			$.ajax({
				url: url,
				type: "get",
				data: {
					//_token: _token,
					id_profesional: id_profesional,
					lugar_atencion: id_lugar_atencion,
					id_paciente: id_paciente,
				},
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1)
				{

					if(data.registros.horario_agenda_laboral != '')
					{
						console.log(data);
						let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
						var dias_activos = data.registros.horario_agenda_laboral.split(',');
						var dias_texto = '';
						var cant = 0;

						$.each(dias_activos, function(index, value)
						{
							if(cant>0)
								dias_texto += ' - '+dias[value];
							else
								dias_texto += dias[value];

							cant++;
						});
						$('#div_resultado_busqueda_hora').removeClass('d-none');
						$('#div_resultado_busqueda_hora_').removeClass('d-none');
						$('#modal_reserva_dias_atencion').html(dias_texto);

					/** calendario */
					$('#modal_reserva_fecha').attr('disabled',false);

					$("#modal_reserva_fecha").flatpickr({
						"disable": [
							function(date) {
								return !dias_activos.includes(String(date.getDay()));
							}
						],
						minDate: "today",
						maxDate: new Date(new Date().setDate(new Date().getDate() + 60)), // 60 days from now
						locale: {
							firstDayOfWeek: 1,
							weekdays: {
							shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
							longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
							},
							months: {
							shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
							longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
							},
						},
					});
					/** fin calendario */					}
					else
					{
						$('#modal_reserva_dias_atencion').html('NO INFORMADOS');
						$('#modal_reserva_fecha').attr('disabled',true);
						$('#modal_reserva_fecha_seleccionada').html('');
					}

				} else {
					// alert('No se pudo Cargar las ciudades');
				}

			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError)
			});

		}

	function cargar_horas_disponibles_calendario_profesion(dia) {
		// Validación de entrada
		if (!dia) {
			console.error('Día no proporcionado');
			return;
		}

		let id_profesional = $('#modal_reserva_hora_id_profesional').val();
		let id_lugar_atencion = 12;

		// Validar que exista un profesional seleccionado
		if (!id_profesional) {
			console.error('No hay profesional seleccionado');
			$('#modal_reserva_hora_lista_horas_').html(
				'<div class="alert alert-warning text-center">Por favor, seleccione un profesional</div>'
			);
			return;
		}

		console.log('Cargando horas disponibles para:', { dia, id_profesional, id_lugar_atencion });

		// Guardar la fecha seleccionada
		$('#modal_reserva_hora_fecha_consulta').val(dia);

		// Mostrar indicador de carga
		let $listaHoras = $('#modal_reserva_hora_lista_horas_');
		let $fechaSeleccionada = $('#modal_reserva_fecha_seleccionada');

		$listaHoras.html('<div class="text-center py-4"><i class="fa fa-spinner fa-spin fa-2x"></i><br><small class="text-muted">Cargando horarios disponibles...</small></div>');
		$fechaSeleccionada.html('');

		// Abortar petición anterior si existe
		if (window.xhr_horas_disponibles && window.xhr_horas_disponibles.readyState !== 4) {
			window.xhr_horas_disponibles.abort();
		}

		let url = 'https://med-sdi.cl/api/horas_disponibles_profesional_lugar_atencion';

		window.xhr_horas_disponibles = $.ajax({
			url: url,
			type: "GET",
			data: {
				id_profesional: id_profesional,
				id_lugar_atencion: id_lugar_atencion,
				dia: dia,
			},
			timeout: 15000 // 15 segundos timeout
		})
		.done(function(data) {
			console.log('Respuesta del servidor:', data);

			if (data.estado == 1 && data.registros && data.registros.length > 0) {
				// Escapar HTML para prevenir XSS
				let textFecha = $('<div>').text(data.text_fecha || dia).html();
				$fechaSeleccionada.html('Horas disponibles para el día: <strong>' + textFecha + '</strong>');

				// Construir HTML de forma eficiente
				let horasHtml = data.registros.map(function(value) {
					let hr1 = moment(value.hora, 'HH:mm:ss').format('HH:mm');
					let horaEscapada = $('<div>').text(value.hora).html();

					return '<div class="col-md-2 col-sm-4 col-6 btn btn-outline-primary btn-sm my-1 mx-1" ' +
							'data-hora="' + horaEscapada + '" ' +
							'onclick="generar_reserva_cita(\'' + horaEscapada + '\');" ' +
							'role="button" ' +
							'tabindex="0" ' +
							'aria-label="Seleccionar hora ' + hr1 + '">' +
							hr1 +
							'</div>';
				}).join('');

				$listaHoras.html(horasHtml);

			} else {
				// Sin horas disponibles
				$fechaSeleccionada.html('Fecha seleccionada: <strong>' + $('<div>').text(data.text_fecha || dia).html() + '</strong>');
				$listaHoras.html(
					'<div class="alert alert-info text-center" role="alert">' +
					'<i class="fa fa-info-circle"></i> ' +
					'Sin disponibilidad de horas para esta fecha' +
					'</div>'
				);
			}
		})
		.fail(function(jqXHR, ajaxOptions, thrownError) {
			console.error('Error en la petición:', {
				status: jqXHR.status,
				statusText: jqXHR.statusText,
				error: thrownError,
				response: jqXHR.responseText
			});

			// Manejo específico de errores
			let mensajeError = 'Error al cargar las horas disponibles';

			if (jqXHR.status === 0 && jqXHR.statusText === 'abort') {
				console.log('Petición abortada');
				return; // No mostrar error si fue abortada intencionalmente
			} else if (jqXHR.status === 404) {
				mensajeError = 'Servicio no encontrado';
			} else if (jqXHR.status === 500) {
				mensajeError = 'Error en el servidor';
			} else if (jqXHR.status === 0) {
				mensajeError = 'Sin conexión a internet';
			} else if (ajaxOptions === 'timeout') {
				mensajeError = 'Tiempo de espera agotado';
			}

			$listaHoras.html(
				'<div class="alert alert-danger text-center" role="alert">' +
				'<i class="fa fa-exclamation-triangle"></i> ' +
				'<strong>' + mensajeError + '</strong><br>' +
				'<small>Por favor, intente nuevamente</small>' +
				'</div>'
			);
		})
		.always(function() {
			// Limpiar la referencia al finalizar
			window.xhr_horas_disponibles = null;
		});
	}

		function formatoRut(rut)
		{
			var valor = rut.value.replace('.','');
			valor = valor.replace(/\-/g,'');

			cuerpo = valor.slice(0,-1);
			dv = valor.slice(-1).toUpperCase();
			rut.value = cuerpo + '-'+ dv

			if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

			suma = 0;
			multiplo = 2;

			for(i=1;i<=cuerpo.length;i++)
			{
				index = multiplo * valor.charAt(cuerpo.length - i);
				suma = suma + index;
				if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
			}

			dvEsperado = 11 - (suma % 11);
			dv = (dv == 'K')?10:dv;
			dv = (dv == 0)?11:dv;

			if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

			rut.setCustomValidity('');
		}

		function generar_reserva_cita(hora)
		{
			console.log('generar_reserva_cita');

			let id_profesional = $('#modal_reserva_hora_id_profesional').val();
			let id_lugar_atencion = 12;
			let fecha_consulta = $('#modal_reserva_fecha').val();

			// Validar que haya un paciente seleccionado
			let id_dependiente_activo = $('#id_paciente').val();

			// ── CASO: PACIENTE NUEVO (registrado desde el formulario) ──
			if (id_dependiente_activo === 'nuevo') {
				let nombre      = $('#nuevo_nombre').val().trim();
				let apellido_uno = $('#nuevo_apellido_uno').val().trim();
				let apellido_dos = $('#nuevo_apellido_dos').val().trim();
				let rut         = $('#nuevo_rut').val().trim();
				let fecha_nac   = $('#nuevo_fecha_nac').val();
				let sexo        = $('#nuevo_sexo').val();
				let email       = $('#nuevo_email').val().trim();
				let telefono    = $('#nuevo_telefono').val().trim();
				let direccion   = $('#nuevo_direccion').val().trim();
				let numero_dir  = $('#nuevo_numero_dir').val().trim();
				let nombre_ciudad = $('#nuevo_id_ciudad option:selected').text().trim();
				let nombre_convenio = $('#nuevo_id_convenio option:selected').text().trim();

				// Calcular edad
				let fechaNacObj = new Date(fecha_nac);
				let hoy = new Date();
				let edad = hoy.getFullYear() - fechaNacObj.getFullYear();
				if (hoy.getMonth() < fechaNacObj.getMonth() || (hoy.getMonth() === fechaNacObj.getMonth() && hoy.getDate() < fechaNacObj.getDate())) edad--;

				// Llenar datos del paciente en la confirmación
				$('#confirmar_rut').text(rut);
				$('#confirmar_nombre').text(nombre + ' ' + apellido_uno + ' ' + apellido_dos);
				$('#confirmar_fecha_nac').text(fecha_nac);
				$('#confirmar_edad').text(edad);
				$('#confirmar_sexo').text(sexo === 'M' ? 'Masculino' : 'Femenino');
				$('#confirmar_prevision').text(nombre_convenio);
				$('#confirmar_email').text(email || 'No informado');
				$('#confirmar_telefono').text(telefono || 'No informado');
				$('#confirmar_direccion').text((direccion + ' ' + numero_dir).trim());
				$('#confirmar_ciudad').text(nombre_ciudad);

				// Llenar datos de la cita
				let horaFormateada = moment(hora, 'HH:mm:ss').isValid() ? moment(hora, 'HH:mm:ss').format('HH:mm') : hora;
				$('#confirmar_fecha_cita').text(fecha_consulta);
				$('#confirmar_hora_cita').text(horaFormateada);
				$('#confirmar_profesional').text($('#modal_reserva_nombre_profesional').val());
				$('#confirmar_especialidad').text('');

				// Guardar en inputs ocultos para la confirmación
				$('#reserva_id_paciente').val('nuevo');
				$('#reserva_id_profesional').val(id_profesional);
				$('#reserva_id_lugar_atencion').val(id_lugar_atencion);
				$('#reserva_fecha_consulta').val(fecha_consulta);
				$('#reserva_hora_consulta').val(hora);

				$('#modal_contenido_seleccion').hide();
				$('#divConfirmarReserva').removeClass('d-none').show();
				return;
			}

			if (!id_dependiente_activo || id_dependiente_activo == '0' || id_dependiente_activo == '') {
			Swal.fire({
				title: "Error",
				text: "Debe buscar y seleccionar un paciente antes de reservar la hora.",
				icon: "error",
			});
			return;
		}

		// Validar que haya un profesional seleccionado
		if (!id_profesional || id_profesional == '0' || id_profesional == '') {
			Swal.fire({
					text: "Debe seleccionar un profesional antes de continuar.",
					icon: "error",
				});
				return;
			}

			let url = "https://med-sdi.cl/api/obtener_datos_paciente_por_rut_agenda";
			var datos = {
				id_dependiente_activo: id_dependiente_activo,
				id_profesional: id_profesional
			};

			$.ajax({
				url: url,
				type: "get",
				data: datos,
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1)
				{
					let prevision = (data.registro.prevision && data.registro.prevision.nombre) ? data.registro.prevision.nombre : 'Sin previsión';
					let direccion = '';
					let ciudad = '';
					if (data.registro.direccion) {
						direccion = (data.registro.direccion.direccion || '') + ' ' + (data.registro.direccion.numero_dir || '');
						ciudad = (data.registro.direccion.ciudad && data.registro.direccion.ciudad.nombre) ? data.registro.direccion.ciudad.nombre : '';
					}

					// Llenar datos del paciente en el modal
					$('#confirmar_rut').text(data.registro.rut);
					$('#confirmar_nombre').text(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
					$('#confirmar_fecha_nac').text(data.registro.fecha_nac);
					$('#confirmar_edad').text(data.registro.edad);
					$('#confirmar_sexo').text(data.registro.sexo == 'M' ? 'Masculino' : 'Femenino');
					$('#confirmar_prevision').text(prevision);
					$('#confirmar_email').text(data.registro.email);
					$('#confirmar_telefono').text(data.registro.telefono_uno);
					$('#confirmar_direccion').text(direccion.trim());
					$('#confirmar_ciudad').text(ciudad);

					// Llenar datos de la cita (formatear hora a HH:mm)
					let horaFormateada = moment(hora, 'HH:mm:ss').isValid() ? moment(hora, 'HH:mm:ss').format('HH:mm') : hora;
					$('#confirmar_fecha_cita').text(fecha_consulta);
					$('#confirmar_hora_cita').text(horaFormateada);

					let profesionalNombre = (data.profesional)
						? (data.profesional.nombre + ' ' + data.profesional.apellido_uno + ' ' + data.profesional.apellido_dos)
						: '';
					$('#confirmar_profesional').text(profesionalNombre);

					let especialidad = '';
					if (data.profesional && data.profesional.tipo_especialidad) {
						especialidad = data.profesional.tipo_especialidad.nombre;
					}
					if (data.profesional && data.profesional.sub_tipo_especialidad) {
						especialidad += ' - ' + data.profesional.sub_tipo_especialidad.nombre;
					}
					$('#confirmar_especialidad').text(especialidad);

					// Guardar datos en inputs ocultos
					$('#reserva_id_paciente').val(data.registro.id);
					$('#reserva_id_profesional').val(id_profesional);
					$('#reserva_id_lugar_atencion').val(id_lugar_atencion);
					$('#reserva_fecha_consulta').val(fecha_consulta);
					$('#reserva_hora_consulta').val(hora);

					// Ocultar contenido de selección de hora y mostrar confirmación dentro del modal
					$('#modal_contenido_seleccion').hide();
					$('#divConfirmarReserva').removeClass('d-none').show();
				}
				else
				{
					swal({
						title: "Debe completar los datos de Inscripción",
						text: data.msj || 'El paciente no se encuentra inscrito en el sistema.',
						icon: "error",
					});
				}
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError);
				swal({
					title: "Error de comunicación",
					text: "No se pudo obtener los datos del paciente. Intente nuevamente.",
					icon: "error",
				});
			});
		}

		// Función para confirmar y guardar la reserva
		function confirmarReserva() {
			let id_paciente      = $('#reserva_id_paciente').val();
			let id_profesional   = $('#reserva_id_profesional').val();
			let id_lugar_atencion = $('#reserva_id_lugar_atencion').val();
			let fecha_consulta   = $('#reserva_fecha_consulta').val();
			let hora_consulta    = $('#reserva_hora_consulta').val();

			// ── CASO: PACIENTE NUEVO ──
			if (id_paciente === 'nuevo') {
				let url = "https://med-sdi.cl/api/agendar_hora_paciente_publico";
				$.ajax({
					url: url,
					type: "post",
                    beforeSend: function() {
                        $('#divConfirmarReserva').addClass('d-none').hide();
                        $('#modal_contenido_seleccion').show();
                        $('#modalAgendarHora').modal('hide');
                    },
					data: {
						rut_paciente:  $('#nuevo_rut').val().trim(),
						nombres:       $('#nuevo_nombre').val().trim(),
						apellido_uno:  $('#nuevo_apellido_uno').val().trim(),
						apellido_dos:  $('#nuevo_apellido_dos').val().trim(),
						fecha_nac:     $('#nuevo_fecha_nac').val(),
						sexo:          $('#nuevo_sexo').val(),
						id_convenio:   $('#nuevo_id_convenio').val(),
						email:         $('#nuevo_email').val().trim(),
						telefono:      $('#nuevo_telefono').val().trim(),
						direccion:     $('#nuevo_direccion').val().trim(),
						numero_dir:    $('#nuevo_numero_dir').val().trim() || 'S/N',
						id_ciudad:     $('#nuevo_id_ciudad').val(),
						id_profesional:    id_profesional,
						id_lugar_atencion: id_lugar_atencion,
						fecha_consulta:    fecha_consulta,
						hora_consulta:     hora_consulta,
						tipo_hora_medica:  'C'
					}
				})
				.done(function(data) {
					console.log(data);
					$('#divConfirmarReserva').addClass('d-none').hide();
					$('#modal_contenido_seleccion').show();
					$('#modalAgendarHora').modal('hide');
					if (data.estado == 1) {
						Swal.fire({ icon: 'success', title: 'Reserva Confirmada', text: 'Tu hora médica ha sido agendada exitosamente. Recibirás un correo de confirmación.' })
						.then(() => { location.reload(); });
					} else {
						Swal.fire({ icon: 'error', title: 'Error', text: data.msj || 'No se pudo confirmar la reserva.' });
					}
				})
				.fail(function(jqXHR, ajaxOptions, thrownError) {
					console.log(jqXHR, ajaxOptions, thrownError);
					$('#divConfirmarReserva').addClass('d-none').hide();
					$('#modal_contenido_seleccion').show();
					$('#modalAgendarHora').modal('hide');
					setTimeout(function() {
						$('.modal-backdrop').remove();
						$('body').removeClass('modal-open').css({'padding-right': '', 'overflow': ''});
						Swal.fire({ icon: 'error', title: 'Error', text: 'Ocurrió un error al procesar tu solicitud. Intenta nuevamente.' });
					}, 150);
				});
				return;
			}

			// ── CASO: PACIENTE EXISTENTE ──
			let url = "https://med-sdi.cl/api/confirmar_reserva";

			$.ajax({
				url: url,
				type: "post",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Procesando...',
                        text: 'Por favor espera.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
				data: {
					id_paciente:       id_paciente,
					id_profesional:    id_profesional,
					id_lugar_atencion: id_lugar_atencion,
					fecha_consulta:    fecha_consulta,
					hora_consulta:     hora_consulta
				},
			})
			.done(function(data) {
                swal.close();

				console.log(data);

				// Resetear el modal antes de cerrar
				$('#divConfirmarReserva').addClass('d-none').hide();
				$('#modal_contenido_seleccion').show();

				// Cerrar modal usando jQuery (Bootstrap 4)
				$('#modalAgendarHora').modal('hide');

				if (data.estado == 1) {
					Swal.fire({
						icon: 'success',
						title: 'Reserva Confirmada',
						text: 'Su reserva ha sido confirmada exitosamente.',
					})
					.then(() => {
						location.reload();
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: data.msj || 'Ocurrió un error al confirmar la reserva.',
					});
				}
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError);

				// Resetear el modal
				$('#divConfirmarReserva').addClass('d-none').hide();
				$('#modal_contenido_seleccion').show();

				// Cerrar modal usando jQuery (Bootstrap 4)
				$('#modalAgendarHora').modal('hide');

				// Esperar a que el modal se cierre completamente
				$('#modalAgendarHora').one('hidden.bs.modal', function () {
					limpiarModalAgendarHora();

					setTimeout(function() {
						$('.modal-backdrop').remove();
						$('body').removeClass('modal-open').css({'padding-right': '', 'overflow': ''});

						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Ocurrió un error al procesar su solicitud. Intente nuevamente.',
						});
					}, 150);
				});
			});
		}

		// Función para ocultar el div de confirmación
		function ocultarConfirmacion() {
			$('#divConfirmarReserva').addClass('d-none').hide();
			$('#modal_contenido_seleccion').show();
		}

		// Función para limpiar completamente el modal de agendar hora
		function limpiarModalAgendarHora() {
			// Limpiar inputs
			$('#rut_paciente').val('');
			$('#modal_reserva_hora_id_profesional').val('');
			$('#modal_reserva_hora_fecha_consulta').val('');
			$('#id_paciente').val('0');
			$('#modal_reserva_nombre_profesional').val('');

			// Limpiar selects
			$('#modal_reserva_id_profesion').val('');
			$('#modal_reserva_id_especialidad').empty().append('<option value="">Seleccione</option>');
			$('#modal_reserva_id_tipo_especialidad').empty().append('<option value="">Seleccione</option>');

			// Limpiar resultados de búsqueda
			$('#div_resultado_busqueda').empty();
			$('#modal_reserva_hora_lista_horas').empty();

			// Ocultar secciones
			$('#div_resultado_busqueda_hora').addClass('d-none');
			$('#div_resultado_busqueda_hora_').addClass('d-none');
			$('#info_paciente_detalle').hide();
			$('#paciente_saludo').addClass('d-none');
			$('#form_registro_paciente').hide();

			// Limpiar textos
			$('#modal_reserva_dias_atencion').text('');
			$('#modal_reserva_fecha_seleccionada').text('');

			// Asegurarse de que el contenido de selección esté visible
			$('#modal_contenido_seleccion').show();
			$('#divConfirmarReserva').addClass('d-none').hide();

			// Limpiar campos de confirmación
			$('#confirmar_rut, #confirmar_nombre, #confirmar_fecha_nac, #confirmar_edad, #confirmar_sexo').text('');
			$('#confirmar_prevision, #confirmar_email, #confirmar_telefono, #confirmar_direccion, #confirmar_ciudad').text('');
			$('#confirmar_fecha_cita, #confirmar_hora_cita, #confirmar_profesional, #confirmar_especialidad').text('');
			$('#reserva_id_paciente, #reserva_id_profesional, #reserva_id_lugar_atencion').val('');
			$('#reserva_fecha_consulta, #reserva_hora_consulta').val('');

			// Limpiar formulario de paciente nuevo
			$('#nuevo_rut, #nuevo_nombre, #nuevo_apellido_uno, #nuevo_apellido_dos').val('');
			$('#nuevo_fecha_nac, #nuevo_email, #nuevo_telefono, #nuevo_direccion, #nuevo_numero_dir').val('');
			$('#nuevo_sexo').val('0');
			$('#nuevo_id_convenio').val('');
			$('#nuevo_id_region').val('');
			$('#nuevo_id_ciudad').empty().append('<option value="">Seleccione ciudad</option>');

			// Limpiar atributos del modal que pueden bloquear la reapertura
			$('#modalAgendarHora').removeAttr('aria-hidden').removeAttr('style');
		}
	  </script>


	<script>
	  $(document).ready(function(){
	    $("#boton").click(function(evento){
	      $("html,body").animate({scrollTop:0}, "slow");
	    });
	  });
	</script>
	<script>
	  AOS.init();
	</script>
	<script>
		new DataTable('#example', {
    responsive: true
});
	</script>
</body>
</html>
