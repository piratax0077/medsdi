<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-crec_des_trauma" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="pat-cro-tab" onclick="cargarRegistrosAntecedentesSidebar(1)" data-toggle="tab" href="#pat-cro" role="tab" aria-controls="pat-cro" aria-selected="true">Patologías crónicas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="anest-pac-tab" onclick="cargarRegistrosAntecedentesSidebar(2)" data-toggle="tab" href="#anest-pac" role="tab" aria-controls="anest-pac" aria-selected="false">Anestesias paciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="cirug-proce-tab" onclick="cargarRegistrosAntecedentesSidebar(3)" data-toggle="tab" href="#cirug-proce" role="tab" aria-controls="cirug-proce" aria-selected="false">Cirugías y procedimientos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="hemorragias-tab" onclick="cargarRegistrosAntecedentesSidebar(4)" data-toggle="tab" href="#hemorragias" role="tab" aria-controls="hemorragias" aria-selected="false">Hemorragias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="ant-serv-asistenciales-tab" onclick="cargarRegistrosAntecedentesSidebar(5)" data-toggle="tab" href="#ant-serv-asistenciales" role="tab" aria-controls="ant-serv-asistenciales" aria-selected="false">Solic. de antecedentes de servicios asistenciales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="alergias-tab" onclick="cargarRegistrosAntecedentesSidebar(6)" data-toggle="tab" href="#alergias" role="tab" aria-controls="alergias" aria-selected="false">Alergias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="med-cro-tab" onclick="cargarRegistrosAntecedentesSidebar(7)" data-toggle="tab" href="#med-cro" role="tab" aria-controls="med-cro" aria-selected="false">Medicamentos crónicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="discapacidad-tab" onclick="cargarRegistrosAntecedentesSidebar(8)" data-toggle="tab" href="#discapacidad" role="tab" aria-controls="discapacidad" aria-selected="false">Discapacidades</a>
            </li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" id="trauma">
            <!--PATOLOGÍAS CRÓNICAS-->
            <div class="tab-pane fade show active" id="pat-cro" role="tabpanel" aria-labelledby="pat-cro-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="text-c-blue d-inline">PATOLOGÍAS CRÓNICAS</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',1,0)">Añadir</button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Comentario</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar1">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--ANESTESIAS PACIENTE-->
            <div class="tab-pane fade show" id="anest-pac" role="tabpanel" aria-labelledby="anest-pac-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline mb-2">
                        <h6 class="text-c-blue d-inline float-left pt-3 f-16">ANESTESIAS PACIENTE</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-sm float-right d-inline" onclick="verModalAgregar('show',2,0)"><i class="fas fa-plus"></i> Añadir</button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Procedimiento</th>
                                        <th>Incidentes</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar2">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--CIRUGÍAS Y PROCEDIMIENTOS-->
            <div class="tab-pane fade show" id="cirug-proce" role="tabpanel" aria-labelledby="cirug-proce-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                        <h6 class="text-c-blue d-inline">CIRUGÍAS Y PROCEDIMIENTOS</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs  feather icon-plus d-inline" onclick="verModalAgregar('show',3,0)">Añadir</button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Procedimiento</th>
                                        <th>Incidente</th>
                                        <th>Profesional</th>
                                        <th>Fecha data</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar3">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--HEMORAGIAS-->
            <div class="tab-pane fade show" id="hemorragias" role="tabpanel" aria-labelledby="hemorragias-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                        <h6 class="text-c-blue d-inline">HEMORAGIAS</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs  feather icon-plus d-inline" onclick="verModalAgregar('show',4,0)">Añadir</button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Incidente</th>
                                        <th>Detalle</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar4">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--SOLICITUDES DE ANTECEDENTES DE SERVICIOS ASISTENCIALES-->
            <div class="tab-pane fade show" id="ant-serv-asistenciales" role="tabpanel" aria-labelledby="ant-serv-asistenciales-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="text-c-blue d-inline">SOLICITUDES DE ANTECEDENTES DE SERVICIOS ASISTENCIALES</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',5,0)">Añadir</button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Patología</th>
                                        <th>Clínica o servicio</th>
                                        <th>Fecha Aproximada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar5">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--ALERGIAS-->
            <div class="tab-pane fade show" id="alergias" role="tabpanel" aria-labelledby="alergias-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="text-c-blue d-inline">ALERGIAS</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs  feather icon-plus d-inline" onclick="verModalAgregar('show',6,0)"></button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Nombre Alergia</th>
                                        <th>Comentario</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar6">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--MEDICAMENTOS CRÓNICOS-->
            <div class="tab-pane fade show" id="med-cro" role="tabpanel" aria-labelledby="med-cro-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="text-c-blue d-inline">MEDICAMENTOS CRÓNICOS</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',7,0)"></button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Nombre Medicamento Crónico</th>
                                        <th>Dosis</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar7">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!--DISCAPACIDADES-->
            <div class="tab-pane fade show" id="discapacidad" role="tabpanel" aria-labelledby="discapacidad-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="text-c-blue d-inline">DISCAPACIDADES</h6>
                        @if(Auth::user()->hasRole('Profesional'))
                        <button type="button" class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',8,0)"></button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th>Discapacidad</th>
                                        <th>Grado</th>
                                        <th>Reversibilidad</th>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="bloque-registros-sidebar8">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--MODAL-->
    <div class="modal" id="modal-ingreso" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-antecedente">Agregar antecedente</h5>
                <button type="button" class="close" onclick="verModalAgregar('hide')" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body-modal-inputs">

            </div>
            <div class="modal-footer">
                <input type="hidden" value="" id="id-antecedente-m">
                <input type="hidden" value="" id="tipo-antecedente-m">
                @if(isset($userData))
                <input type="hidden" value="{{$userData['rut']}}" id="user-rut">
                <input type="hidden" value="{{$userData['profesion']}}" id="user-profesion">
                <input type="hidden" value="{{$userData['nombre']}} {{$userData['apellido_uno']}} {{$userData['apellido_dos']}}" id="user-profesional">
                @endif
                <input type="hidden" value="{{Auth::user()->id}}" id="user-id">
                <button type="button" class="btn btn-sm btn-primary-light-c" id="agregar-antecedente" onclick="agregarAntecedente()"><i class="feather icon-save"></i> Agregar antecedentes</button>
                <button type="button" class="btn btn-sm btn-primary-light-c" id="modificar-antecedente" onclick="modificarAntecedente()"><i class="feather icon-edit"></i> Modificar antecedentes</button>
                <button type="button" class="btn btn-sm btn-danger-light-c" onclick="verModalAgregar('hide')"><i class="feather icon-x"></i> Cerrar</button>
            </div>
            </div>
        </div>
    </div>
<script>
    // const activarMedicamentos = (input) => {
	// 	$("#"+input).autocomplete({
	// 		source: function(request, response) {
	// 			$.ajax({
	// 				url: "{{ route('dental.getArticulo') }}",
	// 				type: 'post',
	// 				dataType: "json",
	// 				data: {
	// 					_token: CSRF_TOKEN,
	// 					search: request.term
	// 				},
	// 				success: function(data) {
	// 					console.log(data.length);
	// 					response(data);
	// 				}
	// 			});
	// 		},
	// 		select: function(event, ui) {
	// 			$('#'+input).val(ui.item.label);
	// 			return false;
	// 		}
	// 	});
	// }
    const verModalAgregar = (fun,tipo,id)=>{

        $('#agregar-antecedente').show();
        $('#modificar-antecedente').hide();

        var html = '';

        switch(tipo){
            case 1:
                html+=`
                    <table>
						<tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 2:
                html+=`
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td><input class="form-control" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 3:
                html+=`
                    <table>
						<tr>
                            <td>Fecha Cirugía</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 4:
                html+=`
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;


            case 5:

                html+=`
                    <table>
                        <tr>
                            <td>Nombre antecedente</td>
                            <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Institución</td>
                            <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                        </tr>
						<tr>
                            <td>Fecha Evento</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                    </table>
                `;
            break;

            case 6:
                html+=`
                    <table>
                        <tr>
                            <td>Nombre alergia</td>
                            <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 7:
                html+=`
                    <table>
                        <tr>
                            <td>Nombre Medicamento</td>
                            <td>
								<div class="form-group">
									<input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico">
								</div>
							</td>
                        </tr>
                        <tr>
                            <td>Dosis</td>
                            <td><textarea class="form-control" id="dosis"></textarea></td>
                        </tr>

                    </table>
                `;
            break;
		    case 8:
                html+=`
                    <table>
                        <tr>
                            <td>Tipo de Discapacidad</td>
                            <td>
								<select class="form-control form-control-sm" name="discapacidad_tipo" id="discapacidad_tipo">
									<option value="Auditíva">Auditíva</option>
									<option value="Visual">Visual</option>
									<option value="Locomotora">Locomotora </option>
									<option value="Neurológica">Neurológica</option>
									<option value="Fonoarticulatoria">Fonoarticulatoria</option>
									<option value="Cognitiva">Cognitiva</option>
								</select>
							</td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td>
								<input class="form-control form-control-sm" type="text" id="discapacidad_grado">
							</td>
                        </tr>
						<tr>
                            <td>Permanente</td>
                            <td>
								<select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
									<option value="si">SI</option>
									<option value="no">NO</option>
								</select>
							</td>
                        </tr>

                    </table>
                `;
            break;
        }

        $('#body-modal-inputs').html(html);
		if( tipo == 7)
			activarMedicamentos('nombre_medicamento_cronico');
        $('#tipo-antecedente-m').val(tipo);
        $('#modal-ingreso').modal(fun);

        if(id!=0)
        {
            $('#agregar-antecedente').hide();
            $('#modificar-antecedente').show();
            $('#id-antecedente-m').val(id);
            cargarDatosAntecedente(id);
        }

    }

    function cambiar_antecedente_sidebar()
    {
        if($('#nuevo_antecedente').val() != 'n_C')
        {
            var nombre_enfermedad = $("#nuevo_antecedente option:selected").text();
            var tipo = $("#nuevo_antecedente").val();

            $('#agregar-antecedente').show();
            $('#modificar-antecedente').hide();
            $('#modificar-antecedente-cancelar').hide();

            $('#modal-body-input').html('');
            var html = '';
            console.log(tipo);
            switch(tipo)
            {
                case '2':
                    html+=`
                        <table class="display table  table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Procedimiento</td>
                                <td><input class="form-control" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Incidente</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '1':
                    html+=`
                        <table class="display table table-borderless  dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre</td>
                                <td>
                                    <select class="form-control form-control-sm" id="nombre" name="nombre" onchange="toggleOtraEnfermedadCronica(this.value)">
                                        <option value="">Seleccione enfermedad crónica</option>
                                        <option value="Obesidad">Obesidad</option>
                                        <option value="Hipertensión arterial">Hipertensión arterial</option>
                                        <option value="Diabetes">Diabetes</option>
                                        <option value="Insuficiencia renal">Insuficiencia renal</option>
                                        <option value="EPOC">EPOC</option>
                                        <option value="Dislipidemias">Dislipidemias</option>
                                        <option value="__otro__">Otra Patología Crónica (Especifique)</option>
                                    </select>
                                    <input type="text" class="form-control form-control-sm mt-2" id="nombre_otra_enfermedad" placeholder="Escriba la patología crónica..." style="display:none;">
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Comentarios</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '3':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Fecha Cirugía</td>
                                <td><input class="form-control" type="date" id="fecha"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Procedimiento</td>
                                <td><input class="form-control" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Incidente</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '4':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Procedimiento</td>
                                <td><input class="form-control" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Detalle</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '5':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre antecedente</td>
                                <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Institución</td>
                                <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Fecha Evento</td>
                                <td><input class="form-control" type="date" id="fecha"></td>
                            </tr>
                        </table>
                    `;
                break;
                case '6':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre alergia</td>
                                <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Detalle</td>
                                <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '7':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre Medicamento</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Dosis</td>
                                <td><textarea class="form-control" id="dosis"></textarea></td>
                            </tr>

                        </table>
                    `;
                break;
                case '8':
                    html+=`
                        <table class="display table table-borderless  dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Tipo de Discapacidad</td>
                                <td>
                                    <select class="form-control form-control-sm" name="nombre" id="nombre">
                                        <option value="Auditíva">Auditíva</option>
                                        <option value="Visual">Visual</option>
                                        <option value="Locomotora">Locomotora </option>
                                        <option value="Neurológica">Neurológica</option>
                                        <option value="Fonoarticulatoria">Fonoarticulatoria</option>
                                        <option value="Cognitiva">Cognitiva</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Grado</td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" id="discapacidad_grado">
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Permanente</td>
                                <td>
                                    <select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
                                        <option value="si">SI</option>
                                        <option value="no">NO</option>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    `;
                break;
            }
            console.log(tipo);
                cargarRegistrosAntecedentesSidebar(tipo);
            // if(tipo == 1){
            //     cargarRegistrosAntecedentes(tipo);
            // }

            $('#titulo_antecedente').html('Añadir '+nombre_enfermedad);
            $('#modal-body-input').html(html);
            $('#tipo-antecedente-m').val(tipo);
            $('#id-antecedente-m').val('');

            if( tipo == 7)
            {
                activarMedicamentos('nombre_medicamento_cronico');
                // ver_medicamento_cronico();// ver tabla medicamentos cronicos generales
            }

        }
        else
        {
            $('#modal-body-input').html('');
            $('#nuevo_antecedente').val(1);
            cambiar_antecedente();
        }
    }

     const cargarRegistrosAntecedentesSidebar = (tipo) => {

        const headersTabla = {
            1: ['Nombre', 'Comentario', 'Profesional', 'Fecha', 'Acción'],
            2: ['Procedimiento', 'Incidentes', 'Profesional', 'Fecha', 'Acción'],
            3: ['Fecha', 'Procedimiento', 'Incidente', 'Profesional', 'Fecha Registro', 'Acción'],
            4: ['Procedimiento', 'Comentario', 'RUT', 'Profesional', 'Fecha', 'Acción'],
            5: ['Patología', 'Clínica o servicio', 'Fecha Aproximada', 'Acción'],
            6: ['Nombre Alergia', 'Comentario', 'Fecha', 'Acción'],
            7: ['Nombre Medicamento', 'Dosis', 'Fecha', 'Acción'],
            8: ['Discapacidad', 'Grado', 'Reversibilidad', 'Fecha', 'Acción'],
        };

        // El sidebar no debe modificar la cabecera de la tabla modal
        // Solo actualiza el bloque correspondiente

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registros';
        var id_paciente = $('#id_paciente').val();
        if(id_paciente == undefined || id_paciente == '')
        {
            id_paciente = $('#id_paciente_fc').val();
        }
        data.id_tipo_antecedente = tipo;
        data.estado = 1;
        data.id_paciente = id_paciente;

        // Debug para tipo 7
        if(tipo == 7) {
            console.log('🔍 Cargando medicamentos crónicos (tipo 7)');
            console.log('📋 Datos enviados:', data);
        }

        $.ajax({
            url: url,
            type: "GET",
            data: data,
            success: (resp)=>{
                console.log(`📊 Respuesta para tipo ${tipo}:`, resp);
                console.log('hola:', resp); // Debug adicional
                if(resp.estado==1)
                {
                    var html_ = '';
                    var permiso_ = '';
                    var id_users = parseInt($('#user-id').val());

                    // Debug específico para tipo 7
                    if(tipo == 7) {
                        console.log('💊 Registros de medicamentos encontrados:', resp.registros);
                        console.log('🔢 Cantidad de registros:', resp.registros ? resp.registros.length : 0);
                    }

                    resp.registros.forEach(e => {

                        permiso_ = '';
                        if(e.id_users == id_users)
                        permiso_ = `
                            <buttom class="btn btn-icon btn-info feather icon-edit-2" onclick="verModalAgregar('show',${tipo},${e.id})"></buttom>
                            <buttom class="btn btn-icon btn-danger feather icon-x-square" onclick="verModalDesactivar('show',${tipo},${e.id})"></buttom>
                        `;

                        // Debug para cada registro tipo 7
                        if(tipo == 7) {
                            console.log('💊 Procesando medicamento:', e.antecedente_data);
                        }

                        switch(tipo)
                        {
                            case 1:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 2:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional}<br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 3:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 4:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.profesional}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 5:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.institucion}</td>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 6:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 7:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre_medicamento_cronico || 'Sin nombre'}</td>
                                        <td>${e.antecedente_data.dosis || 'Sin dosis'}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 8:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.discapacidad_tipo}</td>
                                        <td>${e.antecedente_data.discapacidad_grado}</td>
                                        <td>${e.antecedente_data.discapacidad_permanente}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                        }

                    });

                // Debug final para tipo 7
                if(tipo == 7) {
                    console.log('🎯 HTML generado para medicamentos:', html_);
                    console.log('📍 Insertando en:', '#bloque-registros-sidebar7');
                }

                $('#bloque-registros-sidebar'+tipo).html(html_);
                // No tocar la tabla del modal
                }
                else
                {
                    // No hay registros activos: limpiar la tabla del sidebar
                    $('#bloque-registros-sidebar'+tipo).html('');
                }
            },
            error: (resp)=>{
                console.warn(`❌ Error cargando tipo ${tipo}:`, resp);
            }
        });
    }

    // const cargarDatosAntecedente = (id) => {

    //     var data = {};
    //     var url = '{{Request::root()}}/api/antecedente/ver_registro';

    //     data.id = id;

    //     $.ajax({
    //     url: url,
    //     type: "GET",
    //     data: data,
    //     success: (resp)=>{
    //         if(resp.estado==1)
    //         {
    //             $('#procedimiento').val(resp.registros.antecedente_data.procedimiento);
    //             $('#comentario').val(resp.registros.antecedente_data.comentario);
    //             $('#nombre').val(resp.registros.antecedente_data.nombre);
    //             $('#fecha').val(resp.registros.antecedente_data.fecha);
    //             $('#nombre_medicamento_cronico').val(resp.registros.antecedente_data.nombre_medicamento_cronico);
    //             $('#dosis').val(resp.registros.antecedente_data.dosis);
    //             $('#institucion').val(resp.registros.antecedente_data.institucion);
    //             $('#discapacidad_tipo').val(resp.registros.antecedente_data.discapacidad_tipo);
    //             $('#discapacidad_grado').val(resp.registros.antecedente_data.discapacidad_grado);
    //             $('#discapacidad_permanente').val(resp.registros.antecedente_data.discapacidad_permanente);
    //         }
    //     },
    //     error: (resp)=>{
    //         console.warn(resp);
    //     }
    // });

    // }

    // Carga inicial de la pestaña activa por defecto (Patologías Crónicas = tipo 1)
    $(document).ready(function() {
        cargarRegistrosAntecedentesSidebar(1);
    });

    function toggleOtraEnfermedadCronica(valor) {
        if (valor === '__otro__') {
            $('#nombre_otra_enfermedad').show().focus();
        } else {
            $('#nombre_otra_enfermedad').hide().val('');
        }
    }

    // Intercepta el clic en "Agregar antecedentes" ANTES del onclick inline (capture phase)
    // para inyectar el texto libre en el select cuando se eligió "Otro (especifique)"
    document.addEventListener('click', function(e) {
        var btn = e.target.closest('#agregar-antecedente');
        if (!btn) return;
        var selectNombre = document.getElementById('nombre');
        if (selectNombre && selectNombre.value === '__otro__') {
            var texto = ($('#nombre_otra_enfermedad').val() || '').trim();
            if (texto) {
                // Crear opción temporal solo para el envío
                var opt = document.createElement('option');
                opt.value = texto;
                opt.text  = texto;
                opt.selected = true;
                opt.id    = '_tmp_otro_nombre';
                selectNombre.appendChild(opt);
                // Eliminar la opción temporal después de enviar
                setTimeout(function() {
                    var prev = document.getElementById('_tmp_otro_nombre');
                    if (prev) prev.remove();
                }, 1000);
            }
        }
    }, true);
</script>
