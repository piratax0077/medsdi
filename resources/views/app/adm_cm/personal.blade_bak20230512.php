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
                            <h5 class="m-b-10 font-weight-bold">Personal del Centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="profesionales_cm">Personal</a></li>
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
                            {{--
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Profesionales de la salud</a>
                            </li> --}}

                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="asistentes-tab" data-toggle="tab" href="#asistentes" role="tab" aria-controls="asistentes" aria-selected="false">Asistentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="administrativos-tab" data-toggle="tab" href="#administrativos" role="tab" aria-controls="administrativos" aria-selected="false">Personal administrativo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="limpieza-mantencion-tab" data-toggle="tab" href="#limpieza-mantencion" role="tab" aria-controls="limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="personal_cm">
                    <!--Tab Profesionales de la salud-->
                    <div class="tab-pane fade" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales Contratados</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_profesional();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Contrato nuevo/a profesional</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar profesional</button>
                                                        </div>
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
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
														 <!--Botón Modal-->
														<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
													</td>
													<td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="contrato_ver();" data-toggle="tooltip" data-placement="top" title="Ver Contrato"><i class="fas fa-file-contract"></i></button>
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
                    <!--Cierre: Tab Profesionales de la salud-->

                    <!--Tab asistentes-->
                    <div class="tab-pane fade active show" id="asistentes" role="tabpanel" aria-labelledby="asistentes-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_asistente();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a asistente</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_asistente();">Asociar asistente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="asistentes_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($lista_asistente)
                                                    @foreach ( $lista_asistente as $asistente)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>{{ $asistente->nombre.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}</strong></span><br>
                                                            <span>{{ $asistente->rut }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Ist Viña del Mar</span><br>
                                                            <span>Ist Quilpué</span><br>
                                                            <span>Ist San Felipe</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto('asistente publico',{{ $asistente->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('asistente publico',{{ $asistente->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm('asistente publico',{{ $asistente->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_profesional_cm('asistente publico',{{ $asistente->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_administrativo('asistente publico',{{ $asistente->id }});"><i class="feather icon-edit"></i> Editar</button>
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
                    <!--Cierre: Tab asistentes-->

                    <!--Tab personal administrativo-->
                    <div class="tab-pane fade" id="administrativos" role="tabpanel" aria-labelledby="administrativos-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal administrativo</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal administrativo</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_administrativo();">Asociar personal administrativo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="administrativo_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Roberto Olguín Díaz</strong></span><br>
                                                        <span>18.564.323-k</span>
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
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
                                                        <!--Botón Modal-->
														<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
													</td>
                                                    <td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
													</td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_limpieza_mantencion();">
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
                    <!--Cierre: Tab personal administrativo-->

                    <!--Tab personal limpieza y mantencion-->
                    <div class="tab-pane fade" id="limpieza-mantencion" role="tabpanel" aria-labelledby="limpieza-mantencion-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Limpieza y mantención</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_limpieza_mantencion();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal de limpieza y mantencion</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_limpieza_mantencion();">Asociar personal de limpieza y mantencion</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="limpieza_mantencion_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Roberto Olguín Díaz</strong></span><br>
                                                        <span>18.564.323-k</span>
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
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
														 <!--Botón Modal-->
														<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
													</td>
                                                    <td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
													</td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_limpieza_mantencion();">
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
                    <!--Cierre: Tab personal limpieza y mantencion-->
                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->

<!--Modal Registrar contrato profesional-->
<div id="registrar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Contrato profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle / N°</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label">Dpto/Oficina</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Medicina General</option>
                                <option>Medicina Interna</option>
                                <option>Otorrinolaringologo</option>
                                <option>Odontologo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Sub-Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Otología</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Profesional Otorrinolaringólogo</option>
                            </select>
                        </div>
                    </div>
					<div class="col-sm-4">
						<div class="form-group fill">
							<label class="floating-label">Código Aceptación</label>
							<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
						</div>
					</div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Solicitar Código</label>
                        </div>
                    </div>

                </div>
				<div class="row">
				<div class="col-sm-12">
				 <h5 class="modal-title text-blue text-center">Condiciones Contrato profesional</h5>
				</div>
				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Tipo Contrato</label>
						<select class="form-control form-control-sm">
							<option>Seleccione una opción</option>
							<option>Otología</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Horas Semanales</label>
						<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Remuneración</label>
						<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
					</div>
				</div>

				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Horario</label>
						<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
					</div>
				</div>
			</div>
            </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-info">Registrar profesional</button>
			</div>
        </div>
    </div>
</div>

<!--datos Contrato-->
<div id="contrato_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contrato_usuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Contrato</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">

                <div class="row info-basica collapse show" id="info-basica-1">
                    <div class="col-md-12">
                        <h6 class="mb-0 d-inline">Rut</h6>
                        <button type="button" class="btn btn-link text-primary btn-sm float-right" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                            <i class="feather icon-edit"></i> Editar información
                        </button>
                        <ul>
                            <li>00.000.000-0</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-0">Tipo</h6>
                        <ul>
                            <li>Honorarios</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-0">Horas semanales</h6>
                        <ul>
                            <li><span>12 horas</span></li>

                        </ul>
                    </div>
					<div class="col-md-6">
                        <h6 class="mb-0">Días</h6>
                        <ul>
                            <li><span>Lunes</span></li>
							<li><span>jueves</span></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-0">Función</h6>
                        <ul>
                            <li><span>Atención Urgencias</span></li>
                        </ul>
                    </div>

                </div>
                <div class="row info-basica collapse" id="info-basica-2">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rut</label>
                            <input class="form-control form-control-sm" type="text" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo de Contrato</label>
                            <input type="email" class="form-control form-control-sm" name="email_cont" id="email_cont">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Horas semanales</label>
                            <input class="form-control form-control-sm" name="tel_contacto" id="tel_contacto" type="text">
                        </div>
                    </div>
					 <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Días de la semana</label>
                            <input class="form-control form-control-sm" name="tel_contacto" id="tel_contacto" type="text">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label">Función</label>
                            <input class="form-control form-control-sm" name="dir_contacto" id="dir_contacto" type="text">
                        </div>
                    </div>
					<div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label">Código</label>
                            <input class="form-control form-control-sm" name="dir_contacto" id="dir_contacto" type="text">
                        </div>
                    </div>
					<div class="col-sm-4">
                        <div class="form-group fill">
                            <button type="button" class="btn btn-info btn-sm ">Solicitar Código </button>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-info btn-sm float-right" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                            <i class="feather icon-check-square"></i> Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar Profesional-->
<div id="asociar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue"> Asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar profesional-->
<div id="editar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar Contrato profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle / N°</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label">Dpto/Oficina</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Medicina General</option>
                                <option>Medicina Interna</option>
                                <option>Otorrinolaringologo</option>
                                <option>Odontologo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Sub-Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Otología</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Profesional Otorrinolaringólogo</option>
                            </select>
                        </div>
                    </div>
					<div class="col-sm-4">
						<div class="form-group fill">
							<label class="floating-label">Código Aceptación</label>
							<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
						</div>
					</div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Solicitar Código</label>
                        </div>
                    </div>

                </div>
				<div class="row">
				<div class="col-sm-12">
				 <h5 class="modal-title text-blue text-center">Condiciones Contrato profesional</h5>
				</div>
				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Tipo Contrato</label>
						<select class="form-control form-control-sm">
							<option>Seleccione una opción</option>
							<option>Otología</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Horas Semanales</label>
						<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Remuneración</label>
						<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
					</div>
				</div>

				<div class="col-sm-3">
					<div class="form-group fill">
						<label class="floating-label">Horario</label>
						<input class="form-control form-control-sm" name="numero" id="numero" type="text" >
					</div>
				</div>
			</div>
            </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-info">Registrar profesional</button>
			</div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_profesional_cm" aria-hidden="true">
</div>

<!--/////////////MODALS ASISTENTES /////////-->

<!--Modal Registrar asistente-->
<!--Modal nuevo asistente-->
<div id="nuevo_asistente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_asistente_titulo">
                    Registrar nuevo/a asistente
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="form_nuevo_asistente" id="form_nuevo_asistente" action="{{ route('profesional.crear_asistente') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Rut</label>
                                <input type="text" class="form-control" name="rut_nuevo_asistente" id="rut_nuevo_asistente">
                                <span id="mensaje_asistente"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-info" onclick="buscar_asistente_profesional();" type="button" id="button-addon2">Buscar
                            </button>
                        </div>
                    </div>
                    <div class="row" id="inputs_nuevo_asistente" style="display:none">
                        <input type="hidden" id="id_asistente_registrado" name="id_asistente_registrado">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control" name="nombre_nuevo_asistente" id="nombre_nuevo_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                <input class="form-control" name="apellido_nuevo_asistente" id="apellido_nuevo_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                <input class="form-control" name="apellido_dos_nuevo_asistente" id="apellido_dos_nuevo_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input class="form-control" name="email_nuevo_asistente" id="email_nuevo_asistente" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono 1</label>
                                <input class="form-control" name="telefono_nuevo_asistente" id="telefono_nuevo_asistente" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="row" id="inputs_asistentes_dos" style="display:none">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección&nbsp;/&nbsp;Calle</label>
                                <input class="form-control" name="direccion_nuevo_asistente" id="direccion_nuevo_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                <input class="form-control" name="numero_nuevo_asistente" id="numero_nuevo_asistente" type="text">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Region</label>
                                <select id="region_agregar" onchange="#" name="region_agregar" class="form-control" required>
                                    <option value="">Seleccione...</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="correo-1" checked="">
                                    <label for="correo-1" class="cr"></label>
                                </div>
                                <label>Notificar por correo electrónico</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="registrar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Función que tipo de asistente es</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar asistente</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar asistente-->
<div id="asociar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del asistente y seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar asistente-->
<div id="editar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Función que tipo de asistente es</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos
<div id="rol_permisos_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Asistente</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Que rol de asistente cumple</span>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_1">
                                <label class="custom-control-label" for="perm_asis_1">Agenda</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_2">
                                <label class="custom-control-label" for="perm_asis_2">Pacientes</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_3">
                                <label class="custom-control-label" for="perm_asis_3">Panel de configuración</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_5">
                                <label class="custom-control-label" for="perm_asis_5">Estadísticas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>-->

<!--/////////////MODALS PERSONAL ADMINISTRATIVO /////////-->

<!--Modal Registrar personal administrativo-->
<div id="registrar_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_administrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Administrador</option>
                                <option>Cajero</option>
                                <option>Contador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar personal administrativo-->
<div id="asociar_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_administrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del personal administrativo y seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar personal administrativo-->
<div id="editar_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_administrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Administrador</option>
                                <option>Cajero</option>
                                <option>Contador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_pradministrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Personal administrativo</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Administrador</span><br>
                            <span>Contador</span>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                        <div class="col-sm-12 mb-3"><!--Se cargan según su rol-->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_1">
                                <label class="custom-control-label" for="perm_administrativo_1">Flujo de caja</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_2">
                                <label class="custom-control-label" for="perm_administrativo_2">Sucursales</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_3">
                                <label class="custom-control-label" for="perm_administrativo_3">Laboratorio</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_5">
                                <label class="custom-control-label" for="perm_administrativo_5">Estadísticas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!--///////////// MODALS PERSONAL LIMPIEZA Y MANTENCIÓN /////////-->

<!--Modal Registrar personal limpieza_mantencion-->
<div id="registrar_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Chofer</option>
                                <option>Limpieza</option>
                                <option>Eléctrico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar personal limpieza_mantencion-->
<div id="asociar_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar personal de limpieza y mantención </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del personal de limpieza y mantención seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar personal limpieza_mantencion-->
<div id="editar_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Chofer</option>
                                <option>Limpieza</option>
                                <option>Eléctrico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Limpieza y mantención</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Chofer</span><br>
                            <span>Limpieza</span>
                            <span>Eléctrico</span>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
            $("#agregar_profesional_int_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $(".js-example-basic-multiple").select2();

        })


        {{--  BUSQUEDA EN EL MODAL DE ASOCIAR NUEVO PROFESIONAL  --}}
        function buscar_profesional(){

            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();

            if(id_lugar_atencion == '')
            {
                swal({
                    title: "Debe seleccionar una sucursal",
                    icon: "error",
                });
                return false;
            }

            $('#agregar_profesional_btn_buscar_rut').attr('disabled', 'disabled');
            var rut = $('#agregar_profesional_int_rut').val();
            if(rut == ''){
                swal({
                    title: "Debe ingresar un RUT",
                    icon: "error",
                });
                return false;
            }
            if(!$.validateRut(rut))
            {
                swal({
                    title: "Debe ingresar un RUT valido",
                    icon: "error",
                });
                return false;
            }

            {{--  busqueda  --}}
            let profesional_inter = $('#profesional_inter');
            profesional_inter.find('option').remove();

            let url = "{{ route('profesional.buscador') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    rut: rut
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#agregar_profesional_texto_ver_nombre_profesional').html(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                    $('#agregar_profesional_texto_ver_telefono').html(data.registros[0].profesional_telefono_uno);
                    $('#agregar_profesional_texto_ver_email').html(data.registros[0].profesional_email);
                    $('#agregar_profesional_ver_nombre_profesional').val(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                    $('#agregar_profesional_ver_telefono').val(data.registros[0].profesional_telefono_uno);
                    $('#agregar_profesional_ver_email').val(data.registros[0].profesional_email);

                    $('#div_agregar_profesional_busqueda').hide();
                    $('#div_agregar_profesional_ver_info_prof').show();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();
                }
                else
                {
                    /** no encontrado */
                    /** REALIZAR BUSQUEDA TABLA DE PROFESIONALES EXISTENTES EXTERNOS (POR HACER) */
                    let url = "{{ route('personas.buscador') }}";
                    $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            rut: rut
                        },
                    })
                    .done(function(data2) {
                        if (data2.estado == 1)
                        {
                            /** encontrado */
                            $('#agregar_profesional_nuevo_apellido_p').val( data2.registros.appaterno );
                            $('#agregar_profesional_nuevo_apellido_m').val( data2.registros.apmaterno );
                            $('#agregar_profesional_nuevo_telefono').val( '' );
                            $('#agregar_profesional_nuevo_email').val( '' );

                            $('#div_agregar_profesional_busqueda').hide();
                            $('#div_agregar_profesional_ver_info_prof').hide();
                            $('#div_agregar_profesional_formulario_nuevo_prof').show();
                        }
                        else
                        {
                            /** no encontrado */
                            $('#agregar_profesional_nuevo_nombre').val();
                            $('#agregar_profesional_nuevo_apellido_p').val();
                            $('#agregar_profesional_nuevo_apellido_m').val();
                            $('#agregar_profesional_nuevo_telefono').val();
                            $('#agregar_profesional_nuevo_email').val();

                            $('#div_agregar_profesional_busqueda').hide();
                            $('#div_agregar_profesional_ver_info_prof').hide();
                            $('#div_agregar_profesional_formulario_nuevo_prof').show();

                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function regresar_a_busqueda()
        {
            $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
            $('#agregar_profesional_int_rut').val('');

            $('#div_agregar_profesional_busqueda').show();
            $('#div_agregar_profesional_ver_info_prof').hide();
            $('#div_agregar_profesional_formulario_nuevo_prof').hide();

            $('#agregar_profesional_id_profesional').val('');
            $('#agregar_profesional_texto_ver_nombre_profesional').html('');
            $('#agregar_profesional_texto_ver_telefono').html('');
            $('#agregar_profesional_texto_ver_email').html('');
            $('#agregar_profesional_ver_nombre_profesional').val('');
            $('#agregar_profesional_ver_telefono').val('');
            $('#agregar_profesional_ver_email').val('');

            $('#agregar_profesional_nuevo_nombre').val('');
            $('#agregar_profesional_nuevo_apellido_p').val('');
            $('#agregar_profesional_nuevo_apellido_m').val('');
            $('#agregar_profesional_nuevo_telefono').val('');
            $('#agregar_profesional_nuevo_email').val('');
        }

        function asociar_profesional_existente()
        {
            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
            let id_profesional = $('#agregar_profesional_id_profesional').val();
            let url = "{{ route('adm_cm.asociar_profesional_existente')}}";

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    swal({
                        title: "Invitación al Profesional Realizada con Exito.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "success",
                    });

                    $('#asociar_profesional_cm').modal('hide');

                    $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                    $('#agregar_profesional_int_rut').val('');

                    $('#div_agregar_profesional_busqueda').show();
                    $('#div_agregar_profesional_ver_info_prof').hide();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                    $('#agregar_profesional_id_profesional').val('');
                    $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                    $('#agregar_profesional_texto_ver_telefono').html('');
                    $('#agregar_profesional_texto_ver_email').html('');
                    $('#agregar_profesional_ver_nombre_profesional').val('');
                    $('#agregar_profesional_ver_telefono').val('');
                    $('#agregar_profesional_ver_email').val('');

                    $('#agregar_profesional_nuevo_nombre').val('');
                    $('#agregar_profesional_nuevo_apellido_p').val('');
                    $('#agregar_profesional_nuevo_apellido_m').val('');
                    $('#agregar_profesional_nuevo_telefono').val('');
                    $('#agregar_profesional_nuevo_email').val('');
                }
                else
                {
                    swal({
                        title: "Invitación al Profesional Fallida.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function asociar_nuevo_profesional()
        {
            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
            let nombre = $('#agregar_profesional_nuevo_nombre').val();
            let apellido_p = $('#agregar_profesional_nuevo_apellido_p').val();
            let apellido_m = $('#agregar_profesional_nuevo_apellido_m').val();
            let telefono = $('#agregar_profesional_nuevo_telefono').val();
            let email = $('#agregar_profesional_nuevo_email').val();
            let url = "{{ route('adm_cm.asociar_profesional_nuevo')}}";

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_lugar_atencion: id_lugar_atencion,
                    nombre: nombre,
                    apellido_uno: apellido_p,
                    apellido_dos: apellido_m,
                    telefono: telefono,
                    email: email,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    swal({
                        title: "Invitación al Profesional Realizada con Exito.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "success",
                    });

                    $('#asociar_profesional_cm').modal('hide');

                    $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                    $('#agregar_profesional_int_rut').val('');

                    $('#div_agregar_profesional_busqueda').show();
                    $('#div_agregar_profesional_ver_info_prof').hide();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                    $('#agregar_profesional_id_profesional').val('');
                    $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                    $('#agregar_profesional_texto_ver_telefono').html('');
                    $('#agregar_profesional_texto_ver_email').html('');
                    $('#agregar_profesional_ver_nombre_profesional').val('');
                    $('#agregar_profesional_ver_telefono').val('');
                    $('#agregar_profesional_ver_email').val('');

                    $('#agregar_profesional_nuevo_nombre').val('');
                    $('#agregar_profesional_nuevo_apellido_p').val('');
                    $('#agregar_profesional_nuevo_apellido_m').val('');
                    $('#agregar_profesional_nuevo_telefono').val('');
                    $('#agregar_profesional_nuevo_email').val('');
                }
                else
                {
                    swal({
                        title: "Invitación al Profesional Fallida.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /*-Modals personal-*/
        function contacto(tipo,id)
        {
            var url = "";
            if(tipo == 'profesional')
                url = "{{ route('adm_cm.profesional_buscar') }}";
            else if(tipo == 'asistente' || tipo == 'asistente publico')
                url = "{{ route('adm_cm.asistente_buscar') }}";
            else if(tipo == 'administrativo')
                url = "{{ route('adm_cm.profesional_buscar') }}";
            else if(tipo == 'limpieza')
                url = "{{ route('adm_cm.profesional_buscar') }}";
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
                        title: "Problema al cargar informacion del usuario.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** Modals datos bancarios */
        function datos_depositos(tipo, id) {

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
                        title: "El usuario no posee cuentas registradas.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** Modals Horariossss */
        function horario_profesional_cm(tipo, id_profesional, id_lugar_atencion) {


            $('#info_funcionario tbody').html('');
            let url = "{{ route('adm_cm.empleado_horario_lugar_atencion') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_empleado : id_profesional,
                    tipo_empleado : tipo.toUpperCase(),
                    id_lugar_atencion: id_lugar_atencion,
                    estado: 1,
                },
            })
            .done(function(data) {
                if (data.estado == 1) {

                    $.each(data.registros, function(key, value){
                        let id = value.id;
                        var hora_ingreso = value.hora_ingreso;
                        var hora_salida = value.hora_salida;
                        var hora_inicio_colacion = value.hora_inicio_colacion;
                        var hora_termino_colacion = value.hora_termino_colacion;
                        let dia = '';
                        dias = value.dias_laborales.split(',');
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
                            } else if (dias[i] == 6) {
                                dia += 'Sabado '
                            } else if (dias[i] == 7) {
                                dia += 'Domingo '
                            }

                        }

                        var fila = '';
                        fila +='<tr>';
                        fila +='    <th class="align-middle">Días Laborales</th>';
                        fila +='    <th class="align-middle">' + dia + '</th>';
                        fila +='</tr>';
                        fila +='<tr>';
                        fila +='    <th class="align-middle">Hora Entrada</th>';
                        fila +='    <th class="align-middle">' + hora_ingreso + '</th>';
                        fila +='</tr>';
                        fila +='<tr>';
                        fila +='    <th class="align-middle">Hora Salida</th>';
                        fila +='    <th class="align-middle">' + hora_salida + '</th>';
                        fila +='</tr>';
                        fila +='<tr>';
                        fila +='    <th class="align-middle">Hora inicio colación</th>';
                        fila +='    <th class="align-middle">' + hora_inicio_colacion + '</th>';
                        fila +='</tr>';
                        fila +='<tr>';
                        fila +='    <th class="align-middle">Hora término colación</th>';
                        fila +='    <th class="align-middle">' + hora_termino_colacion + '</th>';
                        fila +='</tr>';

                        $('#horario_dias_laborales').val(dias).select2();
                        $('#horario_hora_entrada').val(hora_ingreso);
                        $('#horario_hora_salida').val(hora_salida);
                        $('#horario_hora_entrada_colacion').val(hora_inicio_colacion);
                        $('#horario_hora_salida_colacion').val(hora_termino_colacion);

                        $('#info_funcionario tbody').append(fila);
                    });

                    $('#horario_dependiente').modal('show');

                } else {
                    swal({
                        title: "El usuario no registra datos de horario.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

    </script>
@endsection

@section('modales')
    @include('app.adm_cm.modal_adm.contacto_usuario')
    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_dependiente')
    @include('app.adm_cm.modal_adm.roles_permisos_prof')
    @include('app.adm_cm.modal_adm.asociar_profesional')
@endsection
