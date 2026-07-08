

<div id="c_lugar_prof" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_lugar_prof" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header-sdi bg-white">
				<h5 class="modal-title-sdi text-dark" id="nuevo_lugar_atencion_titulo"><i class="icono-primary feather icon-home"></i>Añadir lugar de
					atención&nbsp;</h5>
					<br>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">×</span></button>
			</div>
			<form action="{{ route('profesional.agregar_centro') }}" method="POST">
				@csrf
				<div class="modal-body">

					<div class="form-row">
						<div class="col-sm-12">
							<div class="form-group fill">
								<label class="floating-label-negro">Nombre</label>
								<input class="form-control" name="nombre_lugar_atencion" id="nombre_lugar_atencion"
									type="text" placeholder="Nombre del lugar de atención">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group fill">
								<label class="floating-label-negro">Rut</label>
								<input class="form-control" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" placeholder="Rut del lugar de atención" required>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label class="floating-label-negro">Direcci&oacute;n</label>
								<input class="form-control" name="direccion_lugar_atencion"
									id="direccion_lugar_atencion" type="text" placeholder="Dirección completa">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="floating-label-negro">N°</label>
								<input class="form-control" name="numero_lugar_atencion" id="numero_lugar_atencion"
									type="text" placeholder="Número">
							</div>
						</div>

						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="floating-label-negro">Regi&oacute;n</label>
								<select id="region_agregar" onchange="buscar_ciudad('region_agregar','ciudad_agregar','0');" name="region_agregar"
									class="form-control text-capitalize" required>
									<option value="">Seleccione una Regi&oacute;n</option>
                                    @if (isset($region))
									    @foreach ($region as $reg)
											<option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endforeach
                                    @endif
								</select>
							</div>
						</div>

						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="floating-label-negro">Ciudad</label>
								<select id="ciudad_agregar" name="ciudad_agregar" class="form-control text-capitalize" required>
									<option value="">Seleccione una ciudad</option>

								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group ">
								<label class="floating-label-negro">Tipo</label>
								<select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion"
									class="js-example-basic-single form-control">
									<option value="0">Seleccione el tipo de lugar</option>
									<option value="1">Centro Médico</option>
									<option value="2">Consulta Particular</option>
								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group fill">
								<label class="floating-label-negro">Correo Electr&oacute;nico</label>
								<input class="form-control" name="email_lugar_atencion" id="email_lugar_atencion"
									type="email" placeholder="correo@ejemplo.cl">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group fill">
								<label class="floating-label-negro">Tel&eacute;fono</label>
								<input class="form-control" name="telefono_lugar_atencion"
									id="telefono_lugar_atencion_1" type="text" placeholder="+569 1234 5678">
							</div>
						</div>
					</div>
					<div class="modal-footer pt-2">
						<button type="button" class="btn btn-outline-blue" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
						<button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Guardar información</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
    $(document).ready(function () {
        $("#rut_lugar_atencion").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
    });

    function lugar() {
        $('#c_lugar_prof').modal('show');
    }


</script>
