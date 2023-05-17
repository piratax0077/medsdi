@extends('template.adm_cm.template')
@section('content')

<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Profesionales Del Centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="adm_cm.home">Profesionales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Médicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="odontologos-tab" data-toggle="tab" href="#odontologos" role="tab" aria-controls="odontologos" aria-selected="false">Odontólogos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="otros_prof-tab" data-toggle="tab" href="#otros_prof" role="tab" aria-controls="otros_prof" aria-selected="false">Otros Profesionales de la salud</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="Profesionales_cm">

                    <!--Tab medicos-->
                    <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales Médicos</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="asociar_profesional();"><i class="fa fa-plus" aria-hidden="true"></i> Asociar profesional</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="profesionales_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Especialidad</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
													<th class="text-center align-middle">Convenio</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($lista_profesionales['MEDICO'])
                                                    @foreach ($lista_profesionales['MEDICO'] as $prof_medico )
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                <span>{{ $prof_medico->rut }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span><br>
                                                                <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                    {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                    @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                        <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                    <!--Botón Modal contacto -->
                                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón Modal deposito-->
                                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>

                                                                    <!--Botón Modal horario-->
                                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón Modal convenios-->
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <button type="button" class="btn btn-danger btn-sm"><i class="feather icon-x-circle"></i> Desasociar</button>
                                                                </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <!--Cierre: Tab medicos-->

                    <!--Tab odontologos-->
                    <div class="tab-pane fade" id="odontologos" role="tabpanel" aria-labelledby="odontologos-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales Odontólogos</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_asistente();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo Odontólogo</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Odontólogo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="card-body">
											<table id="profesionales_odonto" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th class="text-center align-middle">Nombre / Rut</th>
														<th class="text-center align-middle">Especialidad</th>
														<th class="text-center align-middle">Sucursales</th>
														<th class="text-center align-middle">Contacto</th>
														<th class="text-center align-middle">Datos</th>
														<th class="text-center align-middle">Convenio</th>
														<th class="text-center align-middle">Rol y permisos</th>
														<th class="text-center align-middle">Acción</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="align-middle text-center">
															<span><strong>Jaime Kriman</strong></span><br>
															<span>4.345.466-2</span>
														</td>
														<td class="align-middle text-center">
															<span>Otorrinolaringología</span><br>
														</td>
														<td class="align-middle text-center">
															<span>Ist Viña del Mar</span><br>
															<span>Ist Quilpué</span><br>
															<span>Ist San Felipe</span>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
															 <!--Botón Modal-->
															<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
														</td>
														<td class="align-middle text-center">
															<button type="button" class="btn btn-success btn-sm" onclick="editar_datos_profesional();">
															<i class="feather icon-edit"></i> Editar</button>
															<button type="button" class="btn btn-danger btn-sm">
															<i class="feather icon-x-circle"></i> Desasociar</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab odontologos-->

                    <!--Tab otros profesionales-->
                    <div class="tab-pane fade" id="otros_prof" role="tabpanel" aria-labelledby="otros_prof-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Otros Profesionales de la Salud</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo profesional</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="card-body">
											<table id="profesionales_otros" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th class="text-center align-middle">Nombre / Rut</th>
														<th class="text-center align-middle">Profesión/Especialidad</th>
														<th class="text-center align-middle">Sucursales</th>
														<th class="text-center align-middle">Contacto</th>
														<th class="text-center align-middle">Datos</th>
														<th class="text-center align-middle">Convenio</th>
														<th class="text-center align-middle">Rol y permisos</th>
														<th class="text-center align-middle">Acción</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="align-middle text-center">
															<span><strong>Jaime Kriman</strong></span><br>
															<span>4.345.466-2</span>
														</td>
														<td class="align-middle text-center">
															<span>Fonoaudiólogo</span><br><span>Fonoaudiólogo Clínico</span>
														</td>
														<td class="align-middle text-center">
															<span>Ist Viña del Mar</span><br>
															<span>Ist Quilpué</span><br>
															<span>Ist San Felipe</span>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
															 <!--Botón Modal-->
															<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos_profesional();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
														</td>
														<td class="align-middle text-center">
															<button type="button" class="btn btn-success btn-sm" onclick="editar_datos_profesional();">
															<i class="feather icon-edit"></i> Editar</button>
															<button type="button" class="btn btn-danger btn-sm">
															<i class="feather icon-x-circle"></i> Desasociar</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab personal administrativo-->

                </div>
                <!--Cierre: Pills-->
            </div>
			</div>
		</div>
	</div>
</div>
<!--****Cierre Container Completo****-->

@endsection

@section('js-profesionales')
    <script>
        /*-Modals personal-*/
        function contacto(id)
        {
            let url = "{{ route('adm_cm.profesional_buscar') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id: id
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#contacto_prof_rut').html(data.registro.rut);
                    $('#contacto_prof_email').html(data.registro.email);
                    $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                    $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                    $('#contacto_prof_direccion').html(data.direccion);
                    $('#contacto_usuario').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** Modals datos bancarios */
        function datos_depositos(id) {

            $('#liquidaciones').html('');
            $('#liquidacion_pills').html('');
            let url = "{{ route('profesional.liquidacion_ver_profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_seccion: id
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    console.log(data.registros);
                    /** encontrado */
                    $('#liquidaciones').html('');
                    $('#liquidacion_pills').html('');


                    $.each(data.registros, function( index, element ) {
                        /** pills */
                        var html_p = '';
                        html_p += '<li class="nav-item">';
                        if(element.principal == 1)
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="true">'+element.banco.nombre+'</a>';
                        else
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="false">'+element.banco.nombre+'</a>';
                        html_p += '</li>';
                        $('#liquidacion_pills').append(html_p);

                        /** cuerpo */
                        var activo = ' active show ';

                        var html = '';
                        html += '<!-- tab '+index+'-->';
                        if(element.principal == 1)
                            html += '<div class="tab-pane fade '+activo+'" id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        else
                            html += '<div class="tab-pane fade " id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        html += '<div class="row info-basica" id="info-basica-1">';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_rut">'+element.serie+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Titular</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_nombre">'+element.autor+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Banco</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_banco">'+element.banco.nombre+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_cuenta">'+element.numero_control+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_tipo_cuenta">'+element.otro+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_email">'+element.email+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>';
                        if(element.principal == 1)
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Principal</div>';
                        else
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Opcional</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '</div>';
                        html += '</div>';
                        $('#liquidaciones').append(html);
                    });

                    $('#dat_bancarios').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "El Profesional no posee cuentas registradas.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** Modals Horario */
        function horario_profesional_cm(id_profesional, id_lugar_atencion) {

            $('#mi_horario_table tbody').html('');
            let url = "{{ route('adm_cm.prof_horario_lugar_atencion') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = data;
                    for (i = 0; i < data.length; i++) {
                        let id = data[i].id;
                        let hora_inicio = data[i].hora_inicio;
                        let hora_termino = data[i].hora_termino;
                        let dia = '';
                        dias = data[i].dia.split(',');
                        for (let i = 0; i < dias.length; i++) {
                            if (dias[i] == 1) {
                                dia += 'Lunes '
                            } else if (dias[i] == 2) {
                                dia += 'Martes '
                            } else if (dias[i] == 3) {
                                dia += 'Miercoles '
                            } else if (dias[i] == 4) {
                                dia += 'Jueves '
                            } else if (dias[i] == 5) {
                                dia += 'Viernes '
                            }
                        }

                        let j = 1; //contador para asignar id al boton que borrara la fila
                        var fila = '';
                        fila += '<tr class="tr_horario" id="row' + j +'">';
                        fila += '<td class="align-left">' + dia + '</td>';
                        fila += '<td class="align-left">'+hora_inicio + '</td>';
                        fila += '<td class="align-left">' + hora_termino + '</td>';
                        fila += '</tr>';

                        j++;

                        $('#mi_horario_table tbody').append(fila);
                        // $('#mi_horario_table').dataTable({
                        //     "searching": false,
                        //     responsive: true,
                        // })

                        $('#horario_usuario').modal('show');

                    }

                } else {
                    swal({
                        title: "El Profesional no ha configurado su horario.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
            $('#horario_usuario').modal('show');
        }

    </script>
@endsection

@section('modales-profesionales_inst')
    @include('app.adm_cm.modal_adm.asociar_profesional')


    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_usuario')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.contacto_usuario')
    {{-- @include('app.adm_cm.modales.personal.contacto_personal') --}}
    {{--  @include('app.adm_cm.modal_adm.editar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.registrar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.roles_permisos_prof')  --}}
    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
@endsection


