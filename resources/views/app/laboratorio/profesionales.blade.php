@extends('template.adm_cm.template')
@section('content')

<!--****Container Completo****-->
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Profesionales del centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.profesionales_institucion') }}">Profesionales</a></li>
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
                            <li class="nav-item active">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Profesionales</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="personal_admin-tab" data-toggle="tab" href="#personal_admin" role="tab" aria-controls="empresas_apoyo" aria-selected="false">Personal Administrativo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="empresas_apoyo-tab" data-toggle="tab" href="#empresas_apoyo" role="tab" aria-controls="empresas_apoyo" aria-selected="false">Empresas de apoyo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="permisos-tab" data-toggle="tab" href="#permisos" role="tab" aria-controls="permisos" aria-selected="false">Autorizar uso del sistema</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="vacaciones-tab" data-toggle="tab" href="#vacaciones" role="tab" aria-controls="vacaciones" aria-selected="false">Vacaciones</a>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoprofesional">Asociar contrato profesional</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light mr-3" onclick="enviar_mensaje_difusion()" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i> Difusión</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="asociar_profesional(event);" @if(!$adm_medico) disabled @endif><i class="fa fa-plus" aria-hidden="true"></i> Asociar profesional</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table id="profesionales_personal" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle">Nombre / Rut / Especialidad</th>
                                                                <th class="align-middle">Sucursales</th>
                                                                <th class="align-middle">Estado</th>
                                                                <th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Convenio</th>
                                                                <th class="align-middle">Mensaje</th>
                                                                <th class="align-middle">Historial</th>
                                                                <th class="align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($lista_profesionales['MEDICO'] )
                                                                @foreach ($lista_profesionales['MEDICO'] as $prof_medico )
                                                                    <tr>
                                                                        <td class="align-middle">
                                                                            <strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong><br>
                                                                            <small class="text-muted">{{ $prof_medico->rut }}</small><br>
                                                                            <small class="text-info">{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</small>
                                                                            @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                                <br><small class="text-info">{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</small>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                                {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                                @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                    <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            @if($prof_medico->pivot->estado == 1)
                                                                                <span class="badge badge-success">Activo</span>
                                                                            @else
                                                                                <span class="badge badge-warning">Vacaciones</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                                <!--Botón Modal contacto -->
                                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal deposito-->
                                                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                                <!--Botón Modal horario-->
                                                                                <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <!--Botón Modal convenios-->
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_profesional({{ $prof_medico->id }},0,'{{ $prof_medico->nombre }} {{ $prof_medico->apellido_uno }}',{{ $institucion->id_lugar_atencion }})"><i class="feather icon-x"></i> Desasociar</button>
                                                                                <button type="button" class="btn btn-info btn-xxs ml-1" onclick="verHistorialVacaciones({{ $prof_medico->id }})" data-toggle="tooltip" data-placement="top" title="Ver historial de vacaciones"><i class="feather icon-calendar"></i> Vacaciones</button>
                                                                            </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            @if($lista_profesionales['OTROS'] )
                                                            @foreach ($lista_profesionales['OTROS'] as $prof_medico )
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong><br>
                                                                        <small class="text-muted">{{ $prof_medico->rut }}</small><br>
                                                                        <small class="text-info">{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</small>
                                                                        @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                            <br><small class="text-info">{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</small>
                                                                        @endif
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                            {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                            @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        @if($prof_medico->pivot->estado == 1)
                                                                            <span class="badge badge-success">Activo</span>
                                                                        @else
                                                                            <span class="badge badge-warning">Vacaciones</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="align-middle">
                                                                            <!--Botón Modal contacto -->
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal deposito-->
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                            <!--Botón Modal horario-->
                                                                            <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <!--Botón Modal convenios-->
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_profesional({{ $prof_medico->id }},0,'{{ $prof_medico->nombre }} {{ $prof_medico->apellido_uno }}',{{ $institucion->id_lugar_atencion }})"><i class="feather icon-x"></i> Desasociar</button>
                                                                            <button type="button" class="btn btn-info btn-xxs ml-1" onclick="verHistorialVacaciones({{ $prof_medico->id }})" data-toggle="tooltip" data-placement="top" title="Ver historial de vacaciones"><i class="feather icon-calendar"></i> Vacaciones</button>
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
                            </div>
                        </div>
					</div>
                    <!--Cierre: Tab medicos-->

                    <!--Tab personal administrativo-->
                    <div class="tab-pane fade" id="personal_admin" role="tabpanel" aria-labelledby="personal_admin-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal Administrativo</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">

                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_personal_lab();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a empleado/a</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>

                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="Asociar_personal();">Asociar asistente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="contenedor_asistentes_personal">
                                        <table id="asistentes_personal" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">Nombre / Rut / Profesión</th>
                                                    <th class="align-middle">Sucursales</th>
                                                    <th class="align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($lista_administrativo))
                                                    @foreach ( $lista_administrativo as $asistente)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <strong>{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}</strong><br>
                                                            <small class="text-muted">{{ $asistente->rut }}</small><br>
                                                            <small class="text-info">{{ $asistente->asistente_tipo ? $asistente->asistente_tipo->nombre : '-' }}</small>
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $asistente->direccion()->first()->direccion }} #{{ $asistente->direccion()->first()->numero_dir }}, {{ $asistente->direccion()->first()->ciudad()->first()->nombre }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto('asistente publico',{{ $asistente->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>

                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos('asistente publico',{{ $asistente->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos Bancarios"><i class="feather icon-credit-card"></i></button>
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_lab('{{ $asistente->asistente_tipo ? $asistente->asistente_tipo->nombre : '' }}',{{ $asistente->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather icon-clock"></i></button>

                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos({{ $asistente->asistente_tipo ? $asistente->asistente_tipo->id : 0 }}, {{ $asistente->id_usuario ?? 0 }}, '{{ $asistente->roles }}');" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>

                                                            <button type="button" class="btn btn-info btn-xxs" onclick="editar_datos_administrativo({{ $asistente->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                            @if($asistente->contrato !== null)
                                                            <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_administrativo({{ $asistente->id}}, {{ $asistente->contrato->id }}, '{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}');"><i class="feather icon-x"></i> Desasociar</button>
                                                            @endif
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
                    <!--Cierre: Tab odontologos-->

                    <!--Tab empresas apoyo-->
                    <div class="tab-pane fade" id="empresas_apoyo" role="tabpanel" aria-labelledby="empresas_apoyo-tab">
                        <div class="row">
                          <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                           <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Empresas apoyo</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_limpieza_mantencion();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo profesional</button>
                                                    <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional(event);">Asociar Otros profesionales</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
            										<table id="profesionales_otros" class="display table table-striped dt-responsive nowrap" style="width:100%">
            											<thead>
            												<tr>
            													<th class="align-middle">Nombre / Rut / Especialidad</th>
            													<th class="align-middle">Tipo</th>
            													<th class="align-middle">Sucursales</th>
            													<th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Acción</th>
            												</tr>
            											</thead>
            											<tbody>
            												@if(isset($lista_mantencion))
                                                            @foreach ( $lista_mantencion as $administrativo)
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <strong>{{ $administrativo->nombre.' '.$administrativo->apellido_paterno.' '.$administrativo->apellido_materno }}</strong><br>
                                                                    <small class="text-muted">{{ $administrativo->rut }}</small><br>
                                                                    <small class="text-info">{{ $administrativo->contrato->tipo_empleado }}</small>
                                                                </td>
                                                                <td class="align-middle">@if($administrativo->empresa) Empresa @else Persona @endif</td>
                                                                <td class="align-middle">
                                                                    {{ $administrativo->direccion()->first()->direccion }} #{{ $administrativo->direccion()->first()->numero_dir }}, {{ $administrativo->direccion()->first()->ciudad()->first()->nombre }}
                                                                </td>
                                                                <td class="align-middle">
                                                                    <!--Botón Modal contacto -->
                                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_mantenedor('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <!--Botón Modal deposito-->
                                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                    <!--Botón Modal horario-->
                                                                    <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_mantencion_cm('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <!--Botón Modal roles y permisos-->
                                                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>

                                                                    <button type="button" class="btn btn-info btn-xxs" onclick="editar_datos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                                    <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_otros_profesionales('mantencion',{{ $administrativo->id}}, {{ $administrativo->contrato->id }}, '{{ $administrativo->nombres.' '.$administrativo->apellido_uno.' '.$administrativo->apellido_dos }}');"><i class="feather icon-x"></i> Desasociar</button>
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
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab personal administrativo-->
                    <!--Tab permisos -->
                    <div class="tab-pane fade" id="permisos" role="tabpanel" aria-labelledby="permisos-tab">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Buscar profesional</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <h6 class="text-c-blue">Escriba rut y seleccione la sucursal</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="buscar_profesional_rut" id="buscar_profesional_rut" oninput="formatoRut(this)">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="button" class="btn btn-info btn-sm "  id="buscar_profesional_btn" onclick="buscar_profesional_permisos();">Buscar Profesional</button>
                                    </div>
                                    <div class="col-sm-12 d-none" id="info_profesional_permisos" >
                                        <hr>
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body bg-light">
                                                <div class="row align-items-center">
                                                    <div class="col-md-8">
                                                        <h6 class="mb-3 text-info"><i class="feather icon-user-check"></i> Profesional encontrado</h6>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <small class="text-muted d-block">Nombre completo</small>
                                                                <strong id="nombre_profesional_permisos" class="text-dark"></strong>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <small class="text-muted d-block">RUT</small>
                                                                <strong id="rut_profesional_permisos" class="text-dark"></strong>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <small class="text-muted d-block">Especialidad</small>
                                                                <span id="especialidad_profesional_permisos" class="badge badge-info"></span>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <small class="text-muted d-block">Sub Especialidad</small>
                                                                <span id="subtipo_especialidad_profesional_permisos" class="badge badge-secondary"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <div class="bg-white rounded p-3">
                                                            <i class="feather icon-user f-40 text-info"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0"><i class="feather icon-shield"></i> Permisos asignados</h6>
                            </div>
                            <div class="card-body">
                                @if($institucion->id_tipo_laboratorio == 4)
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_cotizar">
                                                <label class="custom-control-label" for="permiso_cotizar">
                                                    <i class="feather icon-dollar-sign text-success"></i> Permiso para cotizar
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_vender_audifonos">
                                                <label class="custom-control-label" for="permiso_vender_audifonos">
                                                    <i class="feather icon-headphones text-primary"></i> Permiso para vender audífonos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_control_audifonos">
                                                <label class="custom-control-label" for="permiso_control_audifonos">
                                                    <i class="feather icon-settings text-warning"></i> Permiso para controlar audífonos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_prestar_audifonos">
                                                <label class="custom-control-label" for="permiso_prestar_audifonos">
                                                    <i class="feather icon-share-2 text-info"></i> Permiso para prestar audífonos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_estadisticas_laboratorio">
                                                <label class="custom-control-label" for="permiso_estadisticas_laboratorio">
                                                    <i class="feather icon-bar-chart-2 text-purple"></i> Permiso para ver estadísticas del laboratorio
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_anular_hora">
                                                <label class="custom-control-label" for="permiso_anular_hora">
                                                    <i class="feather icon-x-circle text-danger"></i> Permiso para anular hora
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_subir_ver_archivos">
                                                <label class="custom-control-label" for="permiso_subir_ver_archivos">
                                                    <i class="feather icon-upload-cloud text-success"></i> Subir y ver archivos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_eliminar_archivos">
                                                <label class="custom-control-label" for="permiso_eliminar_archivos">
                                                    <i class="feather icon-trash-2 text-danger"></i> Eliminar archivos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_editar_pacientes">
                                                <label class="custom-control-label" for="permiso_editar_pacientes">
                                                    <i class="feather icon-edit text-primary"></i> Editar pacientes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_ver_pacientes_centro">
                                                <label class="custom-control-label" for="permiso_ver_pacientes_centro">
                                                    <i class="feather icon-eye text-info"></i> Ver pacientes del Centro
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($institucion->id_tipo_laboratorio == 6)
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_radiologia">
                                                <label class="custom-control-label" for="permiso_radiologia">
                                                    <i class="feather icon-image text-success"></i> Permiso para gestionar radiología
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_estadisticas_laboratorio">
                                                <label class="custom-control-label" for="permiso_estadisticas_laboratorio">
                                                    <i class="feather icon-bar-chart-2 text-purple"></i> Permiso para ver estadísticas del laboratorio
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_anular_hora">
                                                <label class="custom-control-label" for="permiso_anular_hora">
                                                    <i class="feather icon-x-circle text-danger"></i> Permiso para anular hora
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_subir_ver_archivos">
                                                <label class="custom-control-label" for="permiso_subir_ver_archivos">
                                                    <i class="feather icon-upload-cloud text-success"></i> Subir y ver archivos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_eliminar_archivos">
                                                <label class="custom-control-label" for="permiso_eliminar_archivos">
                                                    <i class="feather icon-trash-2 text-danger"></i> Eliminar archivos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_editar_pacientes">
                                                <label class="custom-control-label" for="permiso_editar_pacientes">
                                                    <i class="feather icon-edit text-primary"></i> Editar pacientes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="permiso_ver_pacientes_centro">
                                                <label class="custom-control-label" for="permiso_ver_pacientes_centro">
                                                    <i class="feather icon-eye text-info"></i> Ver pacientes del Centro
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <div class="text-right">
                                    <button class="btn btn-info" onclick="guardar_permisos()"><i class="feather icon-save"></i> Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Historial de permisos</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="tabla_historial_permisos">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Permiso</th>
                                            <th>Acción</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Renderizar historial desde backend -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab permisos-->
                    <!--Tab vacaciones -->
                    <div class="tab-pane fade" id="vacaciones" role="tabpanel" aria-labelledby="vacaciones-tab">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="feather icon-calendar"></i> Administración de Vacaciones</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla_vacaciones" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Profesional / RUT / Especialidad</th>
                                                <th class="align-middle">Contacto</th>
                                                <th class="align-middle">Estado</th>
                                                <th class="align-middle">Días Disponibles</th>
                                                <th class="align-middle">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($lista_profesionales['MEDICO']) && $lista_profesionales['MEDICO'])
                                                @foreach ($lista_profesionales['MEDICO'] as $profesional)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <strong>{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}</strong><br>
                                                            <small class="text-muted">{{ $profesional->rut }}</small><br>
                                                            <small class="text-info">{{ $profesional->TipoEspecialidad()->first()->nombre ?? 'N/A' }}</small>
                                                        </td>
                                                        <td class="align-middle">
                                                            <small><i class="feather icon-mail"></i> {{ $profesional->email }}</small><br>
                                                            <small><i class="feather icon-phone"></i> {{ $profesional->telefono_uno }}</small>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            @if($profesional->pivot->estado == 1)
                                                                <span class="badge badge-success">Activo</span>
                                                            @else
                                                                <span class="badge badge-warning">Vacaciones</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="badge badge-success">15 días</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="button"
                                                                    class="btn btn-primary btn-sm"
                                                                    onclick="abrirModalVacaciones({{ $profesional->id }}, '{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}')"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ $profesional->tiene_vacacion_vigente ? 'El profesional ya tiene vacaciones activas' : 'Registrar vacaciones' }}"
                                                                    {{ $profesional->tiene_vacacion_vigente ? 'disabled' : '' }}>
                                                                <i class="feather icon-calendar"></i>
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-info btn-sm"
                                                                    onclick="verHistorialVacaciones({{ $profesional->id }})"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="Ver historial">
                                                                <i class="feather icon-list"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if(isset($lista_profesionales['OTROS']) && $lista_profesionales['OTROS'])
                                                @foreach ($lista_profesionales['OTROS'] as $profesional)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <strong>{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}</strong><br>
                                                            <small class="text-muted">{{ $profesional->rut }}</small><br>
                                                            <small class="text-info">{{ $profesional->TipoEspecialidad()->first()->nombre ?? 'N/A' }}</small>
                                                        </td>
                                                        <td class="align-middle">
                                                            <small><i class="feather icon-mail"></i> {{ $profesional->email }}</small><br>
                                                            <small><i class="feather icon-phone"></i> {{ $profesional->telefono_uno }}</small>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            @if($profesional->pivot->estado == 1)
                                                                <span class="badge badge-success">Activo</span>
                                                            @else
                                                                <span class="badge badge-warning">Vacaciones</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="badge badge-success">15 días</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="button"
                                                                    class="btn btn-primary btn-sm"
                                                                    onclick="abrirModalVacaciones({{ $profesional->id }}, '{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}')"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ $profesional->tiene_vacacion_vigente ? 'El profesional ya tiene vacaciones activas' : 'Registrar vacaciones' }}"
                                                                    {{ $profesional->tiene_vacacion_vigente ? 'disabled' : '' }}>
                                                                <i class="feather icon-calendar"></i>
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-info btn-sm"
                                                                    onclick="verHistorialVacaciones({{ $profesional->id }})"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="Ver historial">
                                                                <i class="feather icon-list"></i>
                                                            </button>
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
                    <!--Cierre: Tab vacaciones-->
		</div>
	</div>
</div>
<!--****Cierre Container Completo****-->
<input type="hidden" name="id_profesional_mensaje" id="id_profesional_mensaje" value="">
@endsection

@section('js-profesionales')
    <script>
    // Deshabilitar autodiscover de Dropzone ANTES del document.ready
    Dropzone.autoDiscover = false;

    $(document).ready(function(){
        $('#tabla_vacaciones').DataTable({
            responsive: true,
        });
        $('#msj_para_difusion').select2();

        // Dropzone para mensaje a profesional individual
        var dropzoneProfesional = new Dropzone('#mis-archivos-a-profesional', {
            url: "{{ route('profesional.archivo.carga') }}",
            autoProcessQueue: false,
            uploadMultiple: false, // Cambiar a false para enviar archivos uno por uno
            parallelUploads: 1,
            maxFiles: 10,
            maxFilesize: 5, // 5 MB
            paramName: "file", // Nombre del parámetro que espera el servidor
            acceptedFiles: 'image/*,application/pdf,.doc,.docx,.xls,.xlsx',
            addRemoveLinks: true,
            dictDefaultMessage: '<i class="feather icon-upload-cloud f-40 text-muted"></i><br>Arrastra archivos aquí o haz clic para seleccionar',
            dictRemoveFile: 'Eliminar',
            dictFileTooBig: 'El archivo es muy grande (MB). Tamaño máximo: MB.',
            dictInvalidFileType: 'No puedes subir archivos de este tipo',
            dictCancelUpload: 'Cancelar subida',
            dictUploadCanceled: 'Subida cancelada',
            dictMaxFilesExceeded: 'No puedes subir más de archivos',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            sending: function(file, xhr, formData) {
                console.log('Configuración de envío para:', file.name);
            },
            init: function() {
                var myDropzoneProfesional = this;

                // Limpiar archivos al abrir el modal
                $('#mensaje_profesional').on('show.bs.modal', function() {
                    myDropzoneProfesional.removeAllFiles(true);
                });
            }
        });

        // Guardar la instancia globalmente para acceder desde la función enviar_mensaje_a_profesional
        window.dropzoneProfesional = dropzoneProfesional;
    });

    /** Modals Horariossss */
    function horario_profesional_lab(tipo, id_profesional, id_lugar_atencion)
    {
        $('#info_funcionario tbody').html('');
        let url = "{{ route('laboratorio.empleado_horario_lugar_atencion') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_empleado : id_profesional,
                tipo_empleado : tipo.toUpperCase(),
                id_lugar_atencion: id_lugar_atencion,
                estado: 2,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $.each(data.registros, function(key, value)
                {
                    let id = value.id;
                    let id_empleado = value.id_empleado;
                    var hora_ingreso = value.hora_ingreso;
                    var hora_salida = value.hora_salida;
                    var hora_inicio_colacion = value.hora_inicio_colacion;
                    var hora_termino_colacion = value.hora_termino_colacion;
                    let dia = '';
                    dias = value.dias_laborales.split(',');
                    for (let i = 0; i < dias.length; i++)
                    {
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

                    $('#horario_id_contrato_dependiente').val(id);
                    $('#horario_id_personal').val(id_empleado);

                    $('#horario_dias_laborales').val(dias).select2();
                    $('#horario_hora_entrada').val(hora_ingreso);
                    $('#horario_hora_salida').val(hora_salida);
                    $('#horario_hora_entrada_colacion').val(hora_inicio_colacion);
                    $('#horario_hora_salida_colacion').val(hora_termino_colacion);

                    $('#info_funcionario tbody').append(fila);
                });

                $('#horario_dependiente').modal('show');

            }
            else
            {
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

    function registrar_asistente(){
        console.log('registrar asistente');
    }
        /*-Modals personal-*/
        function contacto(id)
        {
            let url = "{{ route('laboratorio.profesional_buscar', ['id_profesional' => '__id__']) }}";
            url = url.replace('__id__', id);

            $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                console.log(data);
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
            let url = "{{ route('laboratorio.prof_horario_lugar_atencion') }}";
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

        function mensaje(id) {
            console.log(id);
            let url = "{{ ROUTE('laboratorio.dame_profesional_cm') }}";
            $.ajax({
                type:'post',
                url: url,
                data:{
                    id:id,
                    _token:CSRF_TOKEN
                },
                success: function(resp){
                    $('#id_profesional_mensaje').val(id);
                    console.log(resp);
                    let profesional = resp.profesional;
                    $('#para_destino').val(profesional.nombre+" "+profesional.apellido_uno+" "+profesional.apellido_dos);
                    $('#mensaje_profesional').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
            })

        }

        function enviar_mensaje_difusion() {
            $('#mensaje_difusion').modal('show');
        }

        function historial(id){
            // abrir modal de historial
            $('#historial_mensajes_profesional').modal('show');
            let url = "{{ ROUTE('laboratorio.historial_mensajes_profesional',['id' => '__ID__']) }}";
            url = url.replace('__ID__',id);

            $.ajax({
                type:'get',
                url: url,
                success: function(resp){
                    console.log(resp);
                    let mensajes = resp.mensajes;
                    let html = '';
                    if(mensajes.length == 0){
                        html += '<div class="row">';
                        html += '<div class="col-md-12">';
                        html += '<div class="card">';
                        html += '<div class="card-header">';
                        html += '<h4 class="card-title">No hay mensajes</h4>';
                        html += '</div>';
                        html += '<div class="card-body">';
                        html += '<p>No hay mensajes enviados a este profesional.</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }else{
                        mensajes.forEach(mensaje => {
                            html += '<div class="row mb-3">';
                            html += '<div class="col-md-12">';
                            html += '<div class="card">';
                            html += '<div class="card-header bg-light">';
                            html += '<h5 class="card-title mb-0"><i class="feather icon-mail"></i> ' + mensaje.datos_mensaje.titulo + '</h5>';
                            // Mostrar el nombre del emisor si existe
                            if(mensaje.profesional_emisor){
                                html += '<small class="text-muted"><i class="feather icon-user"></i> De: ' + mensaje.profesional_emisor.nombre + ' ' + mensaje.profesional_emisor.apellido_uno + ' ' + mensaje.profesional_emisor.apellido_dos + '</small>';
                            }
                            html += '</div>';
                            html += '<div class="card-body">';
                            html += '<p class="mb-2"><strong>Asunto:</strong> ' + mensaje.datos_mensaje.asunto + '</p>';
                            html += '<p class="mb-3">' + mensaje.datos_mensaje.mensaje + '</p>';

                            // Verificar si hay archivos adjuntos
                            if(mensaje.datos_mensaje.archivos && mensaje.datos_mensaje.archivos.length > 0){
                                html += '<hr>';
                                html += '<div class="mb-2"><strong><i class="feather icon-paperclip"></i> Archivos adjuntos (' + mensaje.datos_mensaje.archivos.length + '):</strong></div>';
                                html += '<div class="list-group">';

                                mensaje.datos_mensaje.archivos.forEach(archivo => {
                                    html += '<a href="' + archivo.url + '" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" download>';
                                    html += '<span><i class="feather icon-file"></i> ' + (archivo.nombre_original || archivo.nombre_archivo) + '</span>';
                                    html += '<span class="badge badge-primary badge-pill"><i class="feather icon-download"></i> Descargar</span>';
                                    html += '</a>';
                                });

                                html += '</div>';
                            }

                            html += '</div>';
                            html += '<div class="card-footer text-muted small">';
                            html += '<i class="feather icon-clock"></i> Enviado: ' + (mensaje.fecha_envio || 'Sin fecha');
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                    }

                    $('#historial_mensajes_profesional_body').html(html);
                },
                error: function(error){
                    console.log(error);
                    swal({
                        title: "Error",
                        text: "No se pudo cargar el historial de mensajes",
                        icon: "error",
                    });
                }
            })
        }

        function buscar_profesional_permisos() {
            let rut = $('#buscar_profesional_rut').val();
            if(rut == ""){
                swal({
                    title: "Error",
                    text: "Debe ingresar un RUT para buscar",
                    icon: "error",
                });
                return;
            }
            let id_lugar_atencion = "{{ $institucion->id_lugar_atencion }}";
            console.log(rut, id_lugar_atencion);
            let url = "{{ ROUTE('profesional.buscador') }}";
            $.ajax({
                type:'get',
                url: url,
                data:{
                    rut:rut,
                    id_lugar_atencion: id_lugar_atencion
                },
                success: function(resp){
                    console.log(resp);
                    let profesionales = resp.registros;
                    console.log(profesionales);
                    if(profesionales.length == 0){
                        // Ocultar info profesional
                        $('#info_profesional_permisos').addClass('d-none');
                        // Limpiar campos de info profesional
                        $('#nombre_profesional_permisos').text("");
                        $('#rut_profesional_permisos').text("");
                        $('#especialidad_profesional_permisos').text("");
                        $('#subtipo_especialidad_profesional_permisos').text("");
                        // Limpiar checkboxes de permisos
                        $('#permiso_cotizar').prop('checked', false);
                        $('#permiso_vender_audifonos').prop('checked', false);
                        $('#permiso_control_audifonos').prop('checked', false);
                        $('#permiso_estadisticas_laboratorio').prop('checked', false);
                        $('#permiso_anular_hora').prop('checked', false);
                        $('#permiso_subir_ver_archivos').prop('checked', false);
                        $('#permiso_eliminar_archivos').prop('checked', false);
                        $('#permiso_editar_pacientes').prop('checked', false);
                        $('#permiso_ver_pacientes_centro').prop('checked', false);
                        // Limpiar historial de permisos si existe
                        if(typeof limpiar_permisos_historial === 'function'){
                            limpiar_permisos_historial();
                        } else {
                            $('#tabla_historial_permisos tbody').html("");
                        }
                        swal({
                            title: "Profesional no encontrado",
                            icon: "error",
                        });
                        return;
                    }
                    $('#info_profesional_permisos').removeClass('d-none');
                    let profesional = profesionales[0];
                    $('#nombre_profesional_permisos').text(profesional.profesionales_nombre+" "+profesional.profesionales_apellido_uno+" "+profesional.profesionales_apellido_dos);
                    $('#rut_profesional_permisos').text(profesional.profesionales_rut);
                    $('#especialidad_profesional_permisos').text(profesional.tipos_especialidad_nombre);
                    $('#subtipo_especialidad_profesional_permisos').text(profesional.sub_tipo_especialidad_nombre);
                    $('#permiso_cotizar').prop('checked', profesional.permiso_cotizar == 1 ? true : false);
                    $('#permiso_vender_audifonos').prop('checked', profesional.permiso_vender_audifonos == 1 ? true : false);
                    $('#permiso_control_audifonos').prop('checked', profesional.permiso_control_audifonos == 1 ? true : false);
                    $('#permiso_estadisticas_laboratorio').prop('checked', profesional.permiso_estadisticas_laboratorio == 1 ? true : false);
                    $('#permiso_anular_hora').prop('checked', profesional.permiso_anular_hora == 1 ? true : false);
                    $('#permiso_subir_ver_archivos').prop('checked', profesional.permiso_subir_ver_archivos == 1 ? true : false);
                    $('#permiso_eliminar_archivos').prop('checked', profesional.permiso_eliminar_archivos == 1 ? true : false);
                    $('#permiso_editar_pacientes').prop('checked', profesional.permiso_editar_pacientes == 1 ? true : false);
                    $('#permiso_ver_pacientes_centro').prop('checked', profesional.permiso_ver_pacientes_centro == 1 ? true : false);
                    dame_permisos_historial(profesional.profesionales_id);
                },
                error: function(error){
                    console.log(error);
                }
            })
        }

        function dame_permisos_historial(id_profesional) {
            let id_lugar_atencion = "{{ $institucion->id_lugar_atencion }}";
            let url = "{{ ROUTE('laboratorio.profesional.obtener_permisos') }}";
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if(resp.estado != 1){
                        swal({
                            title: "Error al obtener historial de permisos",
                            text: resp.mensaje,
                            icon: "error",
                        });
                        return;
                    }
                    let permisos = resp.permisos;
                    let html = '';
                    permisos.forEach(entry => {
                        html += '<tr>';
                        html += '<td>' + (entry.created_at ? entry.created_at.substring(0, 19).replace('T', ' ') : '') + '</td>';
                        html +=  `
                        <td>
                            ${entry.permiso_cotizar == 1 ? 'Cotizar, ' : ''}
                            ${entry.permiso_vender_audifonos == 1 ? 'Vender Audífonos, ' : ''}
                            ${entry.permiso_anular_hora == 1 ? 'Anular Hora, ' : ''}
                            ${entry.permiso_control_audifonos == 1 ? 'Controlar Audífonos, ' : ''}
                            ${entry.permiso_estadisticas_laboratorio == 1 ? 'Ver Estadísticas del Laboratorio, ' : ''}
                            ${entry.permiso_subir_ver_archivos == 1 ? 'Subir y Ver Archivos, ' : ''}
                            ${entry.permiso_eliminar_archivos == 1 ? 'Eliminar Archivos, ' : ''}
                            ${entry.permiso_editar_pacientes == 1 ? 'Editar Pacientes, ' : ''}
                            ${entry.permisos_ver_pacientes == 1 ? 'Ver Pacientes del Centro, ' : ''}
                        </td>
                        `;

                        html += '<td>Asignado</td>';
                        html += '<td>' + (entry.usuario ? entry.usuario : '-') + '</td>';
                        html += '</tr>';
                    });
                    $('#tabla_historial_permisos tbody').html(html);

                    // Seleccionar los permisos del último registro (más reciente)
                    if (permisos.length > 0) {
                        let ultimo = permisos[0]; // Si el array está ordenado por fecha descendente
                        $('#permiso_cotizar').prop('checked', ultimo.permiso_cotizar == 1);
                        $('#permiso_vender_audifonos').prop('checked', ultimo.permiso_vender_audifonos == 1);
                        $('#permiso_control_audifonos').prop('checked', ultimo.permiso_control_audifonos == 1);
                        $('#permiso_estadisticas_laboratorio').prop('checked', ultimo.permiso_estadisticas_laboratorio == 1);
                        $('#permiso_anular_hora').prop('checked', ultimo.permiso_anular_hora == 1);
                        $('#permiso_subir_ver_archivos').prop('checked', ultimo.permiso_subir_ver_archivos == 1);
                        $('#permiso_eliminar_archivos').prop('checked', ultimo.permiso_eliminar_archivos == 1);
                        $('#permiso_editar_pacientes').prop('checked', ultimo.permiso_editar_pacientes == 1);
                        $('#permiso_ver_pacientes_centro').prop('checked', ultimo.permisos_ver_pacientes == 1);
                    }
                },
                error: function(error) {
                    console.log(error);
                    $('table tbody').html(`
                        <tr>
                            <td colspan="4">Error al cargar historial</td>
                        </tr>
                    `);
                }
            });
        }


        function guardar_permisos(){
            let rut = $('#buscar_profesional_rut').val();
            let permiso_cotizar = $('#permiso_cotizar').is(':checked') ? 1 : 0;
            let permiso_vender_audifonos = $('#permiso_vender_audifonos').is(':checked') ? 1 : 0;
            let permiso_control_audifonos = $('#permiso_control_audifonos').is(':checked') ? 1 : 0;
            let permiso_prestar_audifonos = $('#permiso_prestar_audifonos').is(':checked') ? 1 : 0;
            let permiso_estadisticas_laboratorio = $('#permiso_estadisticas_laboratorio').is(':checked') ? 1 : 0;
            let permiso_anular_hora = $('#permiso_anular_hora').is(':checked') ? 1 : 0;
            let permiso_subir_ver_archivos = $('#permiso_subir_ver_archivos').is(':checked') ? 1 : 0;
            let permiso_eliminar_archivos = $('#permiso_eliminar_archivos').is(':checked') ? 1 : 0;
            let permiso_editar_pacientes = $('#permiso_editar_pacientes').is(':checked') ? 1 : 0;
            let permiso_ver_pacientes_centro = $('#permiso_ver_pacientes_centro').is(':checked') ? 1 : 0;
            let url = "{{ ROUTE('laboratorio.profesional.guardar_permisos') }}";
            $.ajax({
                type:'post',
                url: url,
                data:{
                    rut:rut,
                    permiso_cotizar:permiso_cotizar,
                    permiso_vender_audifonos:permiso_vender_audifonos,
                    permiso_control_audifonos:permiso_control_audifonos,
                    permiso_prestar_audifonos:permiso_prestar_audifonos,
                    permiso_estadisticas_laboratorio:permiso_estadisticas_laboratorio,
                    permiso_anular_hora:permiso_anular_hora,
                    permiso_subir_ver_archivos:permiso_subir_ver_archivos,
                    permiso_eliminar_archivos:permiso_eliminar_archivos,
                    permiso_editar_pacientes:permiso_editar_pacientes,
                    permiso_ver_pacientes_centro:permiso_ver_pacientes_centro,
                    _token:CSRF_TOKEN
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.estado == 1){
                        swal({
                            title: "Permisos guardados correctamente",
                            icon: "success",
                        });
                    }else{
                        swal({
                            title: "Error al guardar permisos",
                            icon: "error",
                        });
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

    function registrar_nuevo_profesional(){
        console.log('registrar nuevo profesional');
        let valido = 1;
        let mensaje = '';

        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_admin_creador = $('#id_admin_creador').val();
        let id_tipo_admin_creador = $('#id_tipo_admin_creador').val();
        let tipo_contrato = $('#tipo_contrato').val();

        let rut = $('#rut_nuevo_profesional').val();
        let f_ingreso = $('#f_ingreso_nuevo_profesional').val();
        let nombre = $('#nombre_nuevo_profesional').val();
        let apellido1 = $('#apellido1_nuevo_profesional').val();
        let apellido2 = $('#apellido2_nuevo_profesional').val();
        let sexo = $('#empleado_sexo').val();
        let fecha_nacimiento = $('#fecha_nacimiento').val();
        let email = $('#email_nuevo_profesional').val();

        let fecha_inicio = $('#empleado_fecha_inicio').val();
        let fecha_termino = $('#empleado_fecha_termino').val();
        let monto_imponible = $('#empleado_monto_imponible').val();

        let locomocion = ( $('#empleado_locomocion').val() == ''?'0':$('#empleado_locomocion').val() );
        var locomocion_porcentaje = '';
        if(locomocion == 1)
            locomocion_porcentaje = $('#empleado_locomocion_porcentaje').val();
        else
            locomocion_porcentaje = '0';

        let colacion = ( $('#empleado_colacion').val() == ''?'0':$('#empleado_colacion').val() );
        var colacion_porcentaje = '';
        if(colacion == 1)
            colacion_porcentaje = $('#empleado_colacion_porcentaje').val();
        else
            colacion_porcentaje = '0';

        let asignacion_familiar = ( $('#empleado_asignacion_familiar').val() == ''?'0':$('#empleado_asignacion_familiar').val() );
        var asignacion_familiar_cantidad = '';
        if(asignacion_familiar == 1)
            asignacion_familiar_cantidad = $('#empleado_asignacion_familiar_cantidad').val();
        else
            asignacion_familiar_cantidad = '0';

        let caja_compensacion = ( $('#empleado_caja_compensacion').val() == ''?'0':$('#empleado_caja_compensacion').val() );
        var caja_compensacion_porcentaje = '';
        if(caja_compensacion == 1)
            caja_compensacion_porcentaje = $('#empleado_caja_compensacion_porcentaje').val();
        else
            caja_compensacion_porcentaje = '0';

        let telefono1 = $('#telefono1_nuevo_profesional').val();
        let telefono2 = $('#telefono2_nuevo_profesional').val();
        let direccion = $('#direccion_nuevo_profesional').val();
        let numero = $('#n_dpto_nuevo_profesional').val();
        let region = $('#region_nuevo_profesional').val();
        let comuna = $('#comuna_nuevo_profesional').val();
        let dias_laborales = $('#dias_laborales').val();
        let hora_entrada = $('#hora_entrada').val();
        let hora_salida = $('#hora_salida').val();
        let hora_entrada_colacion = $('#hora_entrada_colacion').val();
        let hora_salida_colacion = $('#hora_salida_colacion').val();
        let cargo = $('#cargo_nuevo_profesional').val();
        let profesion = $('#profesion_nuevo_profesional').val();
        let especialidad = $('#especialidad_nuevo_profesional').val();
        let sub_especialidad = $('#sub_especialidad_nuevo_profesional').val();
        let dias_atencion = $('#dias_atencion_nuevo_profesional').val();
        let horario = $('#horario_nuevo_profesional').val();
        let p_hora = $('#p_hora_nuevo_profesional').val();
        let correo_cont = $('#correo-cont').is(':checked');
        let banco = $('#banco_nuevo_profesional').val();
        let n_cta = $('#n_cta_nuevo_profesional').val();
        let sucursal = $('#sucursal_nuevo_profesional').val();



        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del profesional</li>';
        }
        if(f_ingreso == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de ingreso del profesional</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del profesional</li>';
        }
        if(apellido1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el primer apellido del profesional</li>';
        }
        if(apellido2 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el segundo apellido del profesional</li>';
        }
        if(sexo == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el sexo del profesional</li>';
        }
        if(fecha_nacimiento == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de nacimiento del profesional</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el correo electr&oacute;nico del profesional</li>';
        }
        if(fecha_inicio == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de inicio del contrato del profesional</li>';
        }
        if(monto_imponible == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el monto imponible del profesional</li>';
        }
        if(telefono1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el tel&eacute;fono del profesional</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la direcci&oacute;n del profesional</li>';
        }
        if(cargo == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el cargo del profesional</li>';
        }
        if(region == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la regi&oacute;n del profesional</li>';
        }
        if(comuna == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la comuna del profesional</li>';
        }
        if(dias_laborales == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los d&iacute;as laborales del profesional</li>';
        }
        if(hora_entrada == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de entrada del profesional</li>';
        }
        if(hora_salida == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de salida del profesional</li>';
        }
        if(hora_entrada_colacion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de entrada de colaci&oacute;n del profesional</li>';
        }
        if(hora_salida_colacion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de salida de colaci&oacute;n del profesional</li>';
        }
        if(cargo == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el cargo del profesional</li>';
        }
        if(profesion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la profesi&oacute;n del profesional</li>';
        }
        if(especialidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la especialidad del profesional</li>';
        }
        if(sub_especialidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sub-especialidad del profesional</li>';
        }
        if(dias_atencion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los d&iacute;as de atenci&oacute;n del profesional</li>';
        }
        if(horario == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el horario del profesional</li>';
        }
        if(p_hora == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la cantidad de pacientes por hora del profesional</li>';
        }
        if(banco == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el banco para el dep&oacute;sito del profesional</li>';
        }
        if(n_cta == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el n&uacute;mero de cuenta para el dep&oacute;sito del profesional</li>';
        }
        if(sucursal == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sucursal para el dep&oacute;sito del profesional</li>';
        }


        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            return false;
        }


        let data = {
            _token: "{{ csrf_token() }}",
            id_institucion: id_institucion,
            id_lugar_atencion: id_lugar_atencion,
            id_admin_creador: id_admin_creador,
            id_tipo_admin_creador: id_tipo_admin_creador,
            tipo_contrato: tipo_contrato,
            rut: rut,
            f_ingreso: f_ingreso,
            nombre: nombre,
            apellido1: apellido1,
            apellido2: apellido2,
            sexo: sexo,
            fecha_nacimiento: fecha_nacimiento,
            email: email,
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
            telefono1: telefono1,
            telefono2: telefono2,
            direccion: direccion,
            numero: numero,
            region: region,
            comuna: comuna,
            dias_laborales: dias_laborales,
            hora_entrada: hora_entrada,
            hora_salida: hora_salida,
            hora_entrada_colacion: hora_entrada_colacion,
            hora_salida_colacion: hora_salida_colacion,
            cargo: cargo,
            profesion: profesion,
            especialidad: especialidad,
            sub_especialidad: sub_especialidad,
            dias_atencion: dias_atencion,
            horario: horario,
            p_hora: p_hora,
            correo_cont: correo_cont,
            banco: banco,
            n_cta: n_cta,
            sucursal: sucursal,
        }

        console.log(data);


        let url = "{{ route('laboratorio.registrar_profesional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
             console.log(data);
            if (data != null) {
                if(data.estado == 1){
                    swal({
                        title: "Registro Exitoso",
                        text: data.message,
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    $('#card_body_profesionales_contratados').empty();
                    $('#card_body_profesionales_contratados').append(data.v);
                    // reload after 2 seconds
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
                }else{
                    swal({
                        title: "Error",
                        text: data.msj,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }
            } else {
                swal({
                    title: "Error",
                    text: "Error al registrar profesional",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    // Función para abrir el modal de registro de vacaciones
    function abrirModalVacaciones(id_profesional, nombre_profesional) {
        $('#id_profesional_vacaciones').val(id_profesional);
        $('#nombre_profesional_vacaciones').text(nombre_profesional);
        $('#form_vacaciones')[0].reset();
        $('#modal_registrar_vacaciones').modal('show');
    }

    // Función para formatear fecha de yyyy-mm-dd a dd/mm/yyyy
    function formatearFecha(fecha) {
        if (!fecha) return 'N/A';

        // Si la fecha incluye la hora (formato ISO), tomar solo la parte de la fecha
        if (fecha.includes('T')) {
            fecha = fecha.split('T')[0];
        }

        // Separar por guiones
        let partes = fecha.split('-');
        if (partes.length === 3) {
            return partes[2] + '/' + partes[1] + '/' + partes[0];
        }
        return fecha;
    }

    // Función para ver el historial de vacaciones
    function verHistorialVacaciones(id_profesional) {
        $.ajax({
            url: '{{ route("laboratorio.vacaciones.historial", "") }}/' + id_profesional,
            method: 'GET',
            success: function(response) {
                if (response.estado == 1 && response.vacaciones && response.vacaciones.length > 0) {
                    let html = '<div class="table-responsive"><table class="table table-bordered table-sm">';
                    html += '<thead class="thead-light"><tr><th>Fecha Inicio</th><th>Fecha Fin</th><th>Días</th><th>Observaciones</th><th>Estado</th><th class="text-center">Acciones</th></tr></thead><tbody>';

                    response.vacaciones.forEach(function(vacacion) {
                        html += '<tr>';
                        html += '<td>' + formatearFecha(vacacion.fecha_inicio) + '</td>';
                        html += '<td>' + formatearFecha(vacacion.fecha_fin) + '</td>';
                        html += '<td class="text-center"><span class="badge badge-primary">' + vacacion.total_dias + ' día' + (vacacion.total_dias > 1 ? 's' : '') + '</span></td>';
                        html += '<td><small>' + (vacacion.observaciones || 'Sin observaciones') + '</small></td>';
                        html += '<td class="text-center">' + (vacacion.estado == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-secondary">Inactivo</span>') + '</td>';
                        html += '<td class="text-center" style="white-space: nowrap;">';
                        html += '<button class="btn btn-sm btn-warning mr-1" onclick="editarVacacion(' + vacacion.id + ', \'' + vacacion.fecha_inicio + '\', \'' + vacacion.fecha_fin + '\', \'' + (vacacion.observaciones || '') + '\')" title="Editar"><i class="feather icon-edit"></i></button>';
                        html += '<button class="btn btn-sm btn-danger" onclick="eliminarVacacion(' + vacacion.id + ', ' + id_profesional + ')" title="Eliminar"><i class="feather icon-trash-2"></i></button>';
                        html += '</td>';
                        html += '</tr>';
                    });

                    html += '</tbody></table></div>';

                    swal({
                        title: "Historial de Vacaciones",
                        content: {
                            element: "div",
                            attributes: {
                                innerHTML: html
                            }
                        },
                        buttons: "Cerrar",
                    });
                } else {
                    swal({
                        title: "Historial de Vacaciones",
                        text: "No hay registros de vacaciones para este profesional",
                        icon: "info",
                        buttons: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Error al cargar el historial de vacaciones",
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        });
    }

    // Función para editar una vacación
    function editarVacacion(id, fecha_inicio, fecha_fin, observaciones) {
        swal.close(); // Cerrar el modal del historial

        // Limpiar las fechas si vienen en formato ISO (con la 'T' y la 'Z')
        if (fecha_inicio && fecha_inicio.includes('T')) {
            fecha_inicio = fecha_inicio.split('T')[0];
        }
        if (fecha_fin && fecha_fin.includes('T')) {
            fecha_fin = fecha_fin.split('T')[0];
        }

        // Rellenar el modal con los datos de la vacación a editar
        $('#id_vacacion_editar').val(id);
        $('#fecha_inicio_editar').val(fecha_inicio);
        $('#fecha_fin_editar').val(fecha_fin);
        $('#observaciones_editar').val(observaciones);

        // Calcular días
        calcularDiasEditar();

        // Mostrar el modal de edición
        $('#modal_editar_vacaciones').modal('show');
    }

    // Función para eliminar una vacación
    function eliminarVacacion(id, id_profesional) {
        swal.close(); // Cerrar el modal del historial

        swal({
            title: "¿Está seguro?",
            text: "Se eliminará el registro de vacaciones. Esta acción no se puede deshacer.",
            icon: "warning",
            buttons: ["Cancelar", "Sí, eliminar"],
            dangerMode: true,
        }).then((confirmar) => {
            if (confirmar) {
                $.ajax({
                    url: '{{ route("laboratorio.vacaciones.eliminar") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        if (response.estado == 1) {
                            swal({
                                title: "Eliminado",
                                text: response.msj || "Vacación eliminada correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                            }).then(() => {
                                verHistorialVacaciones(id_profesional);
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: response.msj || "Error al eliminar la vacación",
                                icon: "error",
                                buttons: "Aceptar",
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        swal({
                            title: "Error",
                            text: "Error al procesar la solicitud",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                });
            }
        });
    }

    // Función para guardar cambios de vacación editada
    function guardarEdicionVacacion() {
        let id = $('#id_vacacion_editar').val();
        let fecha_inicio = $('#fecha_inicio_editar').val();
        let fecha_fin = $('#fecha_fin_editar').val();
        let observaciones = $('#observaciones_editar').val();

        // Validaciones
        if (!fecha_inicio || !fecha_fin) {
            swal({
                title: "Error",
                text: "Por favor complete las fechas de inicio y fin",
                icon: "error",
                buttons: "Aceptar",
            });
            return;
        }

        if (new Date(fecha_fin) < new Date(fecha_inicio)) {
            swal({
                title: "Error",
                text: "La fecha de fin debe ser posterior a la fecha de inicio",
                icon: "error",
                buttons: "Aceptar",
            });
            return;
        }

        $.ajax({
            url: '{{ route("laboratorio.vacaciones.actualizar") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_fin,
                observaciones: observaciones
            },
            success: function(response) {
                if (response.estado == 1) {
                    swal({
                        title: "Éxito",
                        text: response.msj || "Vacación actualizada correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                    }).then(() => {
                        $('#modal_editar_vacaciones').modal('hide');
                        // Recargar la página para ver los cambios
                        location.reload();
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.msj || "Error al actualizar la vacación",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Error al procesar la solicitud",
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        });
    }

    // Calcular días para edición
    function calcularDiasEditar() {
        let fecha_inicio = $('#fecha_inicio_editar').val();
        let fecha_fin = $('#fecha_fin_editar').val();

        if (fecha_inicio && fecha_fin) {
            let inicio = new Date(fecha_inicio);
            let fin = new Date(fecha_fin);
            let diferencia = fin.getTime() - inicio.getTime();
            let dias = Math.ceil(diferencia / (1000 * 3600 * 24)) + 1;

            if (dias > 0) {
                $('#total_dias_editar').text(dias + ' día' + (dias > 1 ? 's' : ''));
            } else {
                $('#total_dias_editar').text('0 días');
            }
        }
    }

    // Función para guardar las vacaciones
    function guardarVacaciones() {
        let id_profesional = $('#id_profesional_vacaciones').val();
        let fecha_inicio = $('#fecha_inicio_vacaciones').val();
        let fecha_fin = $('#fecha_fin_vacaciones').val();
        let observaciones = $('#observaciones_vacaciones').val();
        let notificar = $('#notificar_profesional').is(':checked') ? 1 : 0;

        // Validaciones
        if (!fecha_inicio || !fecha_fin) {
            swal({
                title: "Error",
                text: "Por favor complete las fechas de inicio y fin",
                icon: "error",
                buttons: "Aceptar",
            });
            return;
        }

        // Validar que la fecha fin sea mayor que la fecha inicio
        if (new Date(fecha_fin) < new Date(fecha_inicio)) {
            swal({
                title: "Error",
                text: "La fecha de fin debe ser posterior a la fecha de inicio",
                icon: "error",
                buttons: "Aceptar",
            });
            return;
        }

        // Llamada AJAX al controlador
        $.ajax({
            url: '{{ route("laboratorio.vacaciones.guardar") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id_profesional: id_profesional,
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_fin,
                observaciones: observaciones,
                notificar_profesional: notificar,
                id_lugar_atencion: $('#id_lugar_atencion').val()
            },
            success: function(response) {
                if (response.estado == 1) {
                    swal({
                        title: "Éxito",
                        text: response.msj || "Vacaciones registradas correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                    }).then(() => {
                        $('#modal_registrar_vacaciones').modal('hide');
                        verHistorialVacaciones(id_profesional);
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.msj || "Error al registrar vacaciones",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
                swal({
                    title: "Error",
                    text: "Error al procesar la solicitud",
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        });
    }

    // Calcular días entre fechas
    function calcularDiasVacaciones() {
        let fecha_inicio = $('#fecha_inicio_vacaciones').val();
        let fecha_fin = $('#fecha_fin_vacaciones').val();

        if (fecha_inicio && fecha_fin) {
            let inicio = new Date(fecha_inicio);
            let fin = new Date(fecha_fin);
            let diferencia = fin.getTime() - inicio.getTime();
            let dias = Math.ceil(diferencia / (1000 * 3600 * 24)) + 1;

            if (dias > 0) {
                $('#total_dias_vacaciones').text(dias + ' día' + (dias > 1 ? 's' : ''));
            } else {
                $('#total_dias_vacaciones').text('0 días');
            }
        }
    }

    </script>
@endsection

@section('page-script')
<script>
function registrar_limpieza_mantencion(){
    // abrir modal
    console.log('abrir modal');
    $('#registrar_personalaseoymantencion').modal('show');
}
</script>
@endsection

@section('modales-profesionales_inst')
    @include('app.laboratorio.modales.profesional.asociar_profesional')
    @include('app.contabilidad.modals.datos_profesional')
    @include('app.laboratorio.modales.personal.finalizar_contrato')
    @include('app.laboratorio.modales.personal.finalizar_personal')
    @include('app.adm_cm.modales.personal.permisos_rol')



    @include('app.adm_cm.modal_adm.mensaje_profesional')
    @include('app.adm_cm.modal_adm.mensaje_difusion')
    @include('app.adm_cm.modal_adm.historial_mensajes')

    @include('app.adm_cm.modales.personal.horario_personal')
    @include('app.adm_cm.modales.personal.editar_personal')

    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_usuario')
    @include('app.laboratorio.modales.personal.horario_personal_mantencion')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.contacto_usuario')
    @include('app.laboratorio.modales.personal.registrar_personal')
    @include('app.adm_cm.modales.personal.asociar_personal')
    {{-- @include('app.adm_cm.modales.personal.contacto_personal') --}}
    {{--  @include('app.adm_cm.modal_adm.editar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.registrar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.roles_permisos_prof')  --}}
    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
    @include('app.adm_cm.modal_adm.registrar_vacaciones')
    @include('app.adm_cm.modal_adm.editar_vacaciones')


    @include('app.laboratorio.modales.personal.registrar_personal_limpieza_mantencion')
    @include('app.laboratorio.modales.personal.editar_mantencion')

@endsection


