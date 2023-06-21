{{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
<div id="modal_agregar_personal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_agregar_personal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Agregar Empleado Nuevo</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="add_empleado_id_institucion" id="add_empleado_id_institucion" value="{{ $institucion->id }}">
				<input type="hidden" name="add_empleado_id_lugar_atencion" id="add_empleado_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
				<input type="hidden" name="add_empleado_id_admin_creador" id="add_empleado_id_admin_creador" value="{{ Auth::user()->id }}">
				<input type="hidden" name="add_empleado_id_tipo_admin_creador" id="add_empleado_id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">

				<table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
					<tbody>
						<tr>
							<th class="align-middle" colspan="2">Tipo Contrato</th>
							<th class="align-middle" colspan="2">
								<select class="form-control form-control-sm" name="add_empleado_tipo_contrato" id="add_empleado_tipo_contrato">
									<option value="">Seleccione</option>
									@if ($lista_tipo_contrato)
										@foreach ($lista_tipo_contrato as $item)
											<option value="{{ $item['nombre'] }}" data-id="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
										@endforeach
									@endif
									{{--  asistente tipo  --}}
									{{--  tipo institucion  --}}
									{{--  tipo administrador  --}}
								</select>
							</th>
						</tr>
						<tr>
							<th colspan="4"><h5>Información Personal</h5></th>
						</tr>
						<tr>
							<th class="align-middle">Rut</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_rut" id="add_empleado_rut">
							</th>
							<th class="align-middle">Nombres</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_nombre" id="add_empleado_nombre">
							</th>
						</tr>

						<tr>
							<th class="align-middle">Apellido Paterno</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_apellido_uno" id="add_empleado_apellido_uno">
							</th>
							<th class="align-middle">Apellido Materno</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_apellido_dos" id="add_empleado_apellido_dos">
							</th>
						</tr>
                        <tr>
							<th class="align-middle">Genero</th>
							<th class="align-middle">
								<select class="form-control form-control-sm" name="add_empleado_sexo" id="add_empleado_sexo">
                                    <option value="">Seleccione</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
							</th>
							<th class="align-middle">Fecha Nacimiento</th>
							<th class="align-middle">
								<input type="date" class="form-control form-control-sm" name="add_empleado_fecha_nacimiento" id="add_empleado_fecha_nacimiento">
							</th>
						</tr>
						<tr>
							<th class="align-middle">Email</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_email" id="add_empleado_email">
							</th>
							<th class="align-middle">Telefono</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_telefono" id="add_empleado_telefono">
							</th>
						</tr>

                        <tr>
							<th colspan="4"><h5>Dirección</h5></th>
						</tr>
						<tr>
							<th class="align-middle">Región</th>
							<th class="align-middle">
								<select class="form-control form-control-sm" name="add_empleado_region" id="add_empleado_region" onchange="buscar_ciudad_nuevo_empleado();">
									<option value="">Seleccione</option>
									@if($regiones)
										@foreach ($regiones as $reg )
											<option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
										@endforeach

									@endif
								</select>
							</th>
							<th class="align-middle">Ciudad</th>
							<th class="align-middle">
								<select class="form-control form-control-sm" name="add_empleado_ciudad" id="add_empleado_ciudad">
									<option value="">Seleccione</option>
								</select>
							</th>
						</tr>

						<tr>
							<th class="align-middle">Dirección</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_direccion" id="add_empleado_direccion">
							</th>
							<th class="align-middle">Número</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" name="add_empleado_numero" id="add_empleado_numero">
							</th>
						</tr>

                        <tr>
							<th colspan="4"><h5>Información de Contrato</h5></th>
						</tr>
                        <tr>
							<th class="align-middle">Fecha Inicio</th>
							<th class="align-middle">
								<input type="date" class="form-control form-control-sm" name="add_empleado_fecha_inicio" id="add_empleado_fecha_inicio">
							</th>
							<th class="align-middle">Fecha Termino</th>
							<th class="align-middle">
								<input type="date" class="form-control form-control-sm" name="add_empleado_fecha_termino" id="add_empleado_fecha_termino">
							</th>
						</tr>

                        <tr>
							<th class="align-middle">Monto Imponible</th>
							<th class="align-middle">
								<input type="number" class="form-control form-control-sm" name="add_empleado_monto_imponible" id="add_empleado_monto_imponible">
							</th>
							<th class="align-middle"></th>
							<th class="align-middle"></th>
						</tr>

                        <tr>
							<th class="align-middle">Locomoción</th>
							<th class="align-middle">
                                <div class="form-group">
                                    <input type="hidden" id="add_empleado_locomocion" name="add_empleado_locomocion" value="0">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" onchange="activar_check('add_empleado_check_locomocion', 'add_empleado_locomocion', 'add_empleado_locomocion_porcentaje');" id="add_empleado_check_locomocion" name="add_empleado_check_locomocion" value="">
                                        <label for="add_empleado_check_locomocion" class="cr"></label>
                                    </div>
                                </div>
							</th>
							<th class="align-middle">Valor</th>
							<th class="align-middle">
								<input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_locomocion_porcentaje" id="add_empleado_locomocion_porcentaje" value="N/A">
							</th>
						</tr>

                        <tr>
							<th class="align-middle">Colacion</th>
							<th class="align-middle">
                                <div class="form-group">
                                    <input type="hidden" id="add_empleado_colacion" name="add_empleado_colacion" value="0">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" onchange="activar_check('add_empleado_check_colacion', 'add_empleado_colacion', 'add_empleado_colacion_porcentaje');" id="add_empleado_check_colacion" name="add_empleado_check_colacion" value="">
                                        <label for="add_empleado_check_colacion" class="cr"></label>
                                    </div>
                                </div>
							</th>
							<th class="align-middle">Valor</th>
							<th class="align-middle">
								<input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_colacion_porcentaje" id="add_empleado_colacion_porcentaje" value="N/A">
							</th>
						</tr>

                        <tr>
							<th class="align-middle">Asignación Familar</th>
							<th class="align-middle">
                                <div class="form-group">
                                    <input type="hidden" id="add_empleado_asignacion_familiar" name="add_empleado_asignacion_familiar" value="0">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" onchange="activar_check('add_empleado_check_asignacion_familiar', 'add_empleado_asignacion_familiar', 'add_empleado_asignacion_familiar_cantidad');" id="add_empleado_check_asignacion_familiar" name="add_empleado_check_asignacion_familiar" value="">
                                        <label for="add_empleado_check_asignacion_familiar" class="cr"></label>
                                    </div>
                                </div>
							</th>
							<th class="align-middle">Valor</th>
							<th class="align-middle">
								<input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_asignacion_familiar_cantidad" id="add_empleado_asignacion_familiar_cantidad" value="N/A">
							</th>
						</tr>

                        <tr>
							<th class="align-middle">Compensación</th>
							<th class="align-middle">
                                <div class="form-group">
                                    <input type="hidden" id="add_empleado_caja_compensacion" name="add_empleado_caja_compensacion" value="0">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" onchange="activar_check('add_empleado_check_caja_compensacion', 'add_empleado_caja_compensacion', 'add_empleado_caja_compensacion_porcentaje');" id="add_empleado_check_caja_compensacion" name="add_empleado_check_caja_compensacion" value="">
                                        <label for="add_empleado_check_caja_compensacion" class="cr"></label>
                                    </div>
                                </div>
							</th>
							<th class="align-middle">Valor</th>
							<th class="align-middle">
								<input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_caja_compensacion_porcentaje" id="add_empleado_caja_compensacion_porcentaje" value="N/A">
							</th>
						</tr>

						<tr>
							<th colspan="4"><h5>Horario</h5></th>
						</tr>
						<tr>
							<th class="align-middle">Dias Laborales</th>
							<th class="align-middle" colspan="3">
								<select class="js-example-basic-multiple" name="add_empleado_dias_laborales" id="add_empleado_dias_laborales" multiple="multiple">
									<option value="1">Lunes</option>
									<option value="2">Martes</option>
									<option value="3">Miercoles</option>
									<option value="4">Jueves</option>
									<option value="5">Viernes</option>
									<option value="6">Sabado</option>
									<option value="7">Domingo</option>
								</select>
							</th>
						</tr>
						<tr>
							<th class="align-middle">Hora entrada</th>
							<th class="align-middle">
								<input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada" name="add_empleado_hora_entrada" value="08:00">
							</th>
							<th class="align-middle">Hora salida</th>
							<th class="align-middle">
								<input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida" name="add_empleado_hora_salida" value="19:00">
							</th>

						</tr>
						<tr>
							<th class="align-middle">Hora inicio colación</th>
							<th class="align-middle">
								<input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada_colacion" name="add_empleado_hora_entrada_colacion" value="12:00">
							</th>
							<th class="align-middle">Hora término colación</th>
							<th class="align-middle">
								<input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida_colacion" name="add_empleado_hora_salida_colacion" value="13:00">
							</th>
						</tr>
						<tr>
							<th colspan="4"><h5>Identificador a Institución</h5></th>
						</tr>
						<tr>
							<th class="align-middle">Clave de Ingreso</th>
							<th class="align-middle">
								<input type="text" class="form-control form-control-sm" id="add_empleado_clave_ingreso" name="add_empleado_clave_ingreso" placeholder="Clave ingreso Institución" value="">
							</th>
						</tr>

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info btn-sm mx-auto" onclick="registrar_nuevo_empleado();">Añadir al Equipo</button>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function() {
        {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
        $("#add_empleado_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
    });

    function registrar_personal() {
        $('#modal_agregar_personal').modal('show');
        limpiar_formulario();
    }

    {{-- BUSCAR CIUDAD DE REGISTRAR --}}
    function buscar_ciudad_nuevo_empleado(id_ciudad=0)
    {
        let region = $('#add_empleado_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                data = JSON.parse(data);

                let ciudades = $('#add_empleado_ciudad');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    {{-- REGISTRO DE NUEVO EMPLEADO --}}
    function registrar_nuevo_empleado(){
            var valido = 1;
            var mensaje = '';
            let id_institucion = $('#add_empleado_id_institucion').val();
            let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();
            let id_admin_creador = $('#add_empleado_id_admin_creador').val();
            let id_tipo_admin_creador = $('#add_empleado_id_tipo_admin_creador').val();
            let tipo_contrato = $('#add_empleado_tipo_contrato').val();
            let rut = $('#add_empleado_rut').val();
            let nombre = $('#add_empleado_nombre').val();
            let apellido_uno = $('#add_empleado_apellido_uno').val();
            let apellido_dos = $('#add_empleado_apellido_dos').val();
            let sexo = $('#add_empleado_sexo').val();
            let fecha_nacimiento = $('#add_empleado_fecha_nacimiento').val();
            let email = $('#add_empleado_email').val();

            let fecha_inicio = $('#add_empleado_fecha_inicio').val();
            let fecha_termino = $('#add_empleado_fecha_termino').val();
            let monto_imponible = $('#add_empleado_monto_imponible').val();

            let locomocion = $('#add_empleado_locomocion').val();
            var locomocion_porcentaje = '';
            if(locomocion == 1)
                locomocion_porcentaje = $('#add_empleado_locomocion_porcentaje').val();
            else
                locomocion_porcentaje = '0';

            let colacion = $('#add_empleado_colacion').val();
            var colacion_porcentaje = '';
            if(colacion == 1)
                colacion_porcentaje = $('#add_empleado_colacion_porcentaje').val();
            else
                colacion_porcentaje = '0';

            let asignacion_familiar = $('#add_empleado_asignacion_familiar').val();
            var asignacion_familiar_cantidad = '';
            if(asignacion_familiar == 1)
                asignacion_familiar_cantidad = $('#add_empleado_asignacion_familiar_cantidad').val();
            else
                asignacion_familiar_cantidad = '0';

            let caja_compensacion = $('#add_empleado_caja_compensacion').val();
            var caja_compensacion_porcentaje = '';
            if(caja_compensacion == 1)
                caja_compensacion_porcentaje = $('#add_empleado_caja_compensacion_porcentaje').val();
            else
                caja_compensacion_porcentaje = '0';


            let telefono = $('#add_empleado_telefono').val();
            let region = $('#add_empleado_region').val();
            let ciudad = $('#add_empleado_ciudad').val();
            let direccion = $('#add_empleado_direccion').val();
            let numero = $('#add_empleado_numero').val();
            let dias_laborales = $('#add_empleado_dias_laborales').val();
            let hora_entrada = $('#add_empleado_hora_entrada').val();
            let hora_salida = $('#add_empleado_hora_salida').val();
            let hora_entrada_colacion = $('#add_empleado_hora_entrada_colacion').val();
            let hora_salida_colacion = $('#add_empleado_hora_salida_colacion').val();
            let clave_ingreso = $('#add_empleado_clave_ingreso').val();
            let _token = CSRF_TOKEN;

            if(id_institucion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Institución\n';
            }
            if(id_lugar_atencion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Lugar Atención\n';
            }
            if(id_admin_creador == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Usuario Creador\n';
            }
            if(id_tipo_admin_creador == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Tipo Usuario Creador\n';
            }
            if(tipo_contrato == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Tipo Contrato\n';
            }
            if(rut == '')
            {
                valido = 0;
                mensaje += 'Campo requerido RUT\n';
            }
            if(nombre == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Nombre\n';
            }
            if(apellido_uno == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Apellido Paterno\n';
            }
            if(apellido_dos == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Apellido Materno\n';
            }
            if(email == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Email\n';
            }
            if(telefono == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Teléfono\n';
            }
            if(region == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Región\n';
            }
            if(ciudad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Ciudad\n';
            }
            if(direccion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Dirección\n';
            }
            // if(numero == '')
            // {
            //     valido = 0;
            //     mensaje += 'Campo requerido Número\n';
            // }


            if(fecha_inicio == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Fecha Inicio';
            }
            // if(fecha_termino == '')
            // {
            //     valido = 0;
            //     mensaje += 'Campo requerido Fecha Termino';
            // }
            if(monto_imponible == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Monto Imponible';
            }

            if(locomocion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Locomocion';
            }
            // if(locomocion_porcentaje == '')
            // {
            //     valido = 0;
            //     mensaje += 'Campo requerido locomocion_porcentaje';
            // }
            if(colacion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Colacion';
            }
            // if(colacion_porcentaje == '')
            // {
            //     valido = 0;
            //     mensaje += 'Campo requerido colacion_porcentaje';
            // }
            if(asignacion_familiar == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Asignacion Familiar';
            }
            // if(asignacion_familiar_cantidad == '')
            // {
            //     valido = 0;
            //     mensaje += 'Campo requerido asignacion_familiar_cantidad';
            // }
            if(caja_compensacion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Caja Compensacion';
            }
            // if(caja_compensacion_porcentaje == '')
            // {
            //     valido = 0;
            //     mensaje += 'Campo requerido caja_compensacion_porcentaje';
            // }

            if(dias_laborales == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Días laborales\n';
            }
            if(hora_entrada == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora entrada\n';
            }
            if(hora_salida == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora salida\n';
            }
            if(hora_entrada_colacion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora entrada colación\n';
            }
            if(hora_salida_colacion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora salida colación\n';
            }
            if(clave_ingreso == '')
            {
                valido = 0;
                mensaje += 'Campo requerido clave_ingreso\n';
            }

            if(valido == 1)
            {
                let url = "{{ route('adm_cm.registrar_personal') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_institucion: id_institucion,
                        id_lugar_atencion: id_lugar_atencion,
                        id_admin_creador: id_admin_creador,

                        id_tipo_admin_creador: id_tipo_admin_creador,

                        tipo_contrato: tipo_contrato,

                        rut: rut,
                        nombre: nombre,
                        apellido_uno: apellido_uno,
                        apellido_dos: apellido_dos,
                        fecha_nacimiento: fecha_nacimiento,
                        sexo: sexo,
                        email: email,
                        telefono: telefono,
                        region: region,
                        ciudad: ciudad,
                        direccion: direccion,
                        numero: numero,

                        fecha_inicio: fecha_inicio,
                        fecha_termino: fecha_termino,
                        monto_imponible: monto_imponible,

                        locomocion: locomocion,
                        locomocion_porcentaje: locomocion_porcentaje,
                        colacion: colacion,
                        colacion_porcentaje: colacion_porcentaje,
                        asignacion_familiar: asignacion_familiar,
                        asignacion_familiar_cantidad: asignacion_familiar_cantidad,
                        caja_compensacion: caja_compensacion,
                        caja_compensacion_porcentaje: caja_compensacion_porcentaje,

                        dias_laborales: dias_laborales,
                        hora_entrada: hora_entrada,
                        hora_salida: hora_salida,
                        hora_entrada_colacion: hora_entrada_colacion,
                        hora_salida_colacion: hora_salida_colacion,

                        otro: '',
                        otro_2: '',

                        clave_ingreso: clave_ingreso,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        if(data.estado == 1)
                        {
                            $('#modal_agregar_personal').modal('hide');

                            swal({
                                title: "Ingreso de Personal",
                                text: 'Registro Exitoso.',
                                icon: "success",
                                buttons: "Aceptar",
                            });
                            limpiar_formulario();
                        }
                        else
                        {

                            var mensaje = '';
                            if(data.error)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement)
                                {
                                    mensaje += valueOfElement+'\n';
                                });
                            }
                            else
                            {
                                mensaje += 'Intente nuevamente.';
                            }

                            swal({
                                title: "Ingreso de Personal",
                                text: mensaje,
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar personal",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

            }
            else
            {
                swal({
                    title: "Campos requeridos",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        }

        function activar_check(check, input_base, input_valor)
        {
            if($('#'+check).prop('checked'))
            {
                $('#'+input_base).val(1);
                $('#'+input_valor).val(0);
                $('#'+input_valor).attr('disabled', false);
            }
            else
            {
                $('#'+input_base).val(0);
                $('#'+input_valor).val('N/A');
                $('#'+input_valor).attr('disabled', true);
            }
        }

        function limpiar_formulario()
        {
            $('#modal_agregar_personal').find('input,textarea,select,checkbox').each(function(key, element){
                if($(element).attr('type') == 'checkbox')
                    $(element).prop('checked', '');
                else if($(element).attr('id') == 'add_empleado_hora_entrada')
                    $(element).val('08:00');
                else if($(element).attr('id') == 'add_empleado_hora_salida')
                    $(element).val('19:00');
                else if($(element).attr('id') == 'add_empleado_hora_entrada_colacion')
                    $(element).val('12:00');
                else if($(element).attr('id') == 'add_empleado_hora_salida_colacion')
                    $(element).val('13:00');
                else if($(element).attr('id') == 'add_empleado_hora_salida_colacion')
                    $(element).val('13:00');
                else if($(element).attr('id') == 'add_empleado_id_institucion')
                    $(element).val();
                else if($(element).attr('id') == 'add_empleado_id_lugar_atencion')
                    $(element).val();
                else if($(element).attr('id') == 'add_empleado_id_admin_creador')
                    $(element).val();
                else if($(element).attr('id') == 'add_empleado_id_tipo_admin_creador')
                    $(element).val();
                else
                    $(element).val('');
            });
        }
</script>
