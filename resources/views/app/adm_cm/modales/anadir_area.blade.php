<div id="a_area_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_area_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir área de la institución</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
				<form>
					<div class="form-row">
						<div class="col-12">
							<div class="form-group">
								<!--Cargar áreas-->
								<label class="floating-label-activo-sm">Área</label>
								<select class="form-control" id="tipo_area">
									<option value="0">Seleccione área</option>
									@foreach ($tipos_areas_cm as $tipo_area_cm)
                                        <option value="{{ $tipo_area_cm->id }}">{{ $tipo_area_cm->nombre }}</option>
                                    @endforeach
								</select>
							</div>
						</div>
    					<div class="col-12">
    						<div class="form-group">
    							<label class="floating-label-activo-sm">Ubicación</label>
    							<input type="text" class="form-control" name="ubicacion_area" id="ubicacion_area" placeholder="Ej: Primer piso">
    						</div>
    					</div>
    					<div class="col-12">
    						<div class="form-group">
    							<label class="floating-label-activo-sm">Institución</label>
    							<select class="form-control" id="institucion_area">
                                    <option value="0">Seleccione</option>
                                    <option value="{{ $institucion->id }}" selected>{{ $institucion->nombre }}</option>
                                    @foreach($sucursales as $sucursal)
                                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                    @endforeach
                                </select>
    						</div>
    					</div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Responsable</label>
                                <select class="form-control" id="responsable_cargo_area">
                                    <option value="0">Seleccione responsable</option>
                                   @if (isset($profesionales))
                                            @foreach ($profesionales as $profesional)
                                                <option value="{{ $profesional->id_profesional }}">
                                                    {{ $profesional->nombre }} {{ $profesional->apellido_uno }}
                                                    {{ $profesional->apellido_dos }}</option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>
                        </div>
				    </div>
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info mx-auto" onclick="guardar_area_cm();"><i class="feather icon-plus"></i> Añadir área</button>
			</div>

			</form>
		</div>
	</div>
</div>

<script>
 function ag_area_cm() {
            $('#a_area_cm').modal('show');
        }

function guardar_area_cm(){
    var tipo_area = $('#tipo_area').val();
    // var area = $('#area').val();
    var responsable_cargo = $('#responsable_cargo_area').val();
    var ubicacion_area = $('#ubicacion_area').val();
    var id_institucion = $('#institucion_area').val();
    var token = '{{csrf_token()}}';

    var valido = 1;
    var mensaje = '';

    if (tipo_area == 0) {
        valido = 0;
        mensaje += '<li>Debe seleccionar un tipo de área</li>';
    }

    // if (area == '') {
    //     valido = 0;
    //     mensaje += '<li>Debe seleccionar un área</li>';
    // }

    if (responsable_cargo == 0) {
        valido = 0;
        mensaje += '<li>Debe seleccionar un responsable</li>';
    }

    if (ubicacion_area == '') {
        valido = 0;
        mensaje += '<li>Debe ingresar una ubicación</li>';
    }

     if (id_institucion == 0) {
        valido = 0;
        mensaje += '<li>Debe seleccionar una institución</li>';
    }

    if(valido == 0){
        $('#mensaje').html('<div class="alert alert-danger"><ul>'+mensaje+'</ul></div>');
        swal({
            title: "Error",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje
                }
            },
            icon: "error",
        })
        return false;
    }

    $.ajax({
        url: '{{ ROUTE("adm_cm.agregar_area_cm") }}',
        type: 'POST',
        data: {
            // area: area,
            responsable_cargo: responsable_cargo,
            ubicacion_area: ubicacion_area,
            // tel_c: tel_c,
            // n_pers: n_pers,
            tipo_area: tipo_area,
            id_institucion: id_institucion,
            _token: token
        },
        success: function (data) {
            console.log(data);
            if (data.estado == 1) {
                $('#a_area_cm').modal('hide');
                $('#area').val('');
                $('#responsable_cargo_area').val('');
                $('#ubicacion_area').val('');
                // $('#tel_c').val('');
                // $('#n_pers').val('');
                $('#tabla_area_cm').load('/adm_cm/tabla_area_cm');
                $('#contenedor_areas_cm').empty();
                $('#contenedor_areas_cm').append(data.v);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
</script>
