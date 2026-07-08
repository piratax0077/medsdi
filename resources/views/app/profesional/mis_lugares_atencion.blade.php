


@extends('template.profesional.template')
@section('content')

    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content mt-top">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-2">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Panel de Configuración</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis lugares de atención</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-white f-20 d-inline">Mis lugares de atención</h4>
                                        <button type="button" class="btn btn-light btn-xs float-md-right d-inline" data-toggle="modal" data-target="#nuevo_lugar_atencion">
                                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar lugar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @if (isset($mensaje))
                                    <span class="alert alert-warning"> {{ $mensaje }}</span>
                                @endif
                            </div>
                            @php
                                $lugaresVisibles = collect($lugares ?? [])->filter(function ($lugar) {
                                    return optional($lugar->pivot)->estado != 3;
                                });

                                $totalActivos = $lugaresVisibles->filter(function ($lugar) {
                                    return optional($lugar->pivot)->estado == 1;
                                })->count();

                                $totalInactivos = $lugaresVisibles->filter(function ($lugar) {
                                    return optional($lugar->pivot)->estado != 1;
                                })->count();
                            @endphp

                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <div class="card border mb-0 resumen-lugar-card">
                                        <div class="card-body py-2 d-flex align-items-center justify-content-between">
                                            <div>
                                                <small class="text-muted d-block">Total lugares</small>
                                                <strong id="contador_lugares_total" class="f-18">{{ $lugaresVisibles->count() }}</strong>
                                            </div>
                                            <i class="feather icon-map-pin text-info f-24"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <div class="card border mb-0 resumen-lugar-card">
                                        <div class="card-body py-2 d-flex align-items-center justify-content-between">
                                            <div>
                                                <small class="text-muted d-block">Activos</small>
                                                <strong id="contador_lugares_activos" class="text-success f-18">{{ $totalActivos }}</strong>
                                            </div>
                                            <i class="feather icon-check-circle text-success f-24"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <div class="card border mb-0 resumen-lugar-card">
                                        <div class="card-body py-2 d-flex align-items-center justify-content-between">
                                            <div>
                                                <small class="text-muted d-block">Inactivos</small>
                                                <strong id="contador_lugares_inactivos" class="text-secondary f-18">{{ $totalInactivos }}</strong>
                                            </div>
                                            <i class="feather icon-pause-circle text-secondary f-24"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="tabla_lugares_atencion"
                                class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Lugar</th>
                                        <th class="align-middle">Dirección</th>
                                        <th class="align-middle">Tipo</th>
                                        <th class="align-middle">Contacto</th>
                                        <th class="align-middle text-center">Estado</th>
                                        <th class="align-middle text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lugaresVisibles as $l)
                                        @php
                                            $estadoPivot = optional($l->pivot)->estado;
                                            $activo = $estadoPivot == 1;
                                            $direccion = $l->Direccion()->first();
                                            $ciudad = $direccion && method_exists($direccion, 'Ciudad')
                                                ? $direccion->Ciudad()->first()
                                                : null;

                                            $direccionTexto = trim((optional($direccion)->direccion ?? '').' '.(optional($direccion)->numero_dir ?? ''));
                                            $ciudadTexto = optional($ciudad)->nombre ?? '';
                                            $tipoTexto = $l->tipo == 1 ? 'Centro Médico' : 'Consulta Particular';
                                        @endphp

                                        <tr id="fila_lugar_atencion_{{ $l->id }}" class="{{ $activo ? '' : 'table-secondary text-muted' }}">
                                            <td class="align-middle">
                                                <strong>{{ $l->nombre }}</strong>
                                                <br>
                                                <small class="text-muted">ID: {{ $l->id }}</small>
                                            </td>

                                            <td class="align-middle">
                                                <span>{{ $direccionTexto ?: 'Sin dirección registrada' }}</span>
                                                <br>
                                                <small class="text-muted">{{ $ciudadTexto ?: 'Sin ciudad registrada' }}</small>
                                            </td>

                                            <td class="align-middle">
                                                <span class="badge badge-{{ $l->tipo == 1 ? 'info' : 'light' }}">
                                                    {{ $tipoTexto }}
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span>{{ $l->email ?: 'Sin correo' }}</span>
                                                <br>
                                                <small class="text-muted">{{ $l->telefono ?: 'Sin teléfono' }}</small>
                                            </td>

                                            <td class="align-middle text-center">
                                                @if ($activo)
                                                    <span id="texto_estado_lugar_atencion_{{ $l->id }}" class="badge badge-success mb-2">Activo</span>
                                                @else
                                                    <span id="texto_estado_lugar_atencion_{{ $l->id }}" class="badge badge-secondary mb-2">Inactivo</span>
                                                @endif

                                                <div class="mt-1">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox"
                                                            onclick="cambio_estado_lugar_atencion({{ $l->id }})"
                                                            id="estado_lugar_atencion_{{ $l->id }}"
                                                            {{ $activo ? 'checked' : '' }}>
                                                        <label for="estado_lugar_atencion_{{ $l->id }}" class="cr"></label>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center">
                                                <div class="btn-group btn-group-sm acciones-lugar" role="group" aria-label="Acciones lugar de atención">
                                                    <button type="button"
                                                        class="btn btn-info accion_editar_lugar_atencion"
                                                        data-toggle="modal"
                                                        data-target="#editar_lugar_atencion"
                                                        onclick="ver_lugar_atencion({{ $l->id }});"
                                                        title="Editar información principal">
                                                        <i class="feather icon-edit"></i> Editar
                                                    </button>

                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button id="dropdownLugar{{ $l->id }}" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Configurar
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLugar{{ $l->id }}">
                                                            <button type="button" class="dropdown-item" onclick="mi_horario_lugar_atencion({{ $l->id }})">
                                                                <i class="fas fa-clock mr-2 text-primary"></i> Horarios de atención
                                                            </button>
                                                            <button type="button" class="dropdown-item" onclick="mi_asistente_lugar_atencion({{ $l->id }})">
                                                                <i class="feather icon-user mr-2 text-warning"></i> Asistentes
                                                            </button>
                                                            <button type="button" class="dropdown-item" onclick="mis_valores_lugar_atencion({{ $l->id }}, '{{ e(addslashes($l->nombre)) }}')">
                                                                <i class="fas fa-dollar-sign mr-2 text-success"></i> Valores y convenios
                                                            </button>
                                                            <div class="dropdown-divider"></div>
                                                            <button type="button" class="dropdown-item text-danger" onclick="eliminar_lugar_atencion({{ $l->id }})">
                                                                <i class="feather icon-x mr-2"></i> Eliminar / desasociar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                No tienes lugares de atención asociados.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal nuevo lugar de atención-->
    <div id="nuevo_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_lugar_atencion"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Agregar lugar&nbsp;</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('profesional.agregar_centro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input class="form-control form-control-sm" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input class="form-control form-control-sm" name="direccion_lugar_atencion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nº</label>
                                    <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required>
                                        <option value="">Seleccione</option>
                                        @foreach ($region as $reg)
                                            @if (isset($region))
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion" class="js-example-basic-single form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Centro Médico</option>
                                        <option value="2">Consulta Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input class="form-control form-control-sm" name="email_lugar_atencion" id="email_lugar_atencion" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input class="form-control form-control-sm" name="telefono_lugar_atencion" id="telefono_lugar_atencion_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="notificar_pacientes" name="notificar_pacientes">
                                        <label for="notificar_pacientes" class="cr"></label>
                                        <label>Notificar a pacientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal editar lugar de atención-->
    <div id="editar_lugar_atencion" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_lugar_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="editar_lugar_atencion_titulo">Configurar lugar de atención</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_lugar_atencion">
                    <input type="hidden" name="id_lugar_atencion_modificar" id="id_lugar_atencion_modificar">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input name="editar_nombre_lugar_atencion" id="editar_nombre_lugar_atencion" type="text" val="" class="form-control form-control-sm">
                            </div>
                        </div>
                       <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n&nbsp;/&nbsp;Calle</label>
                                <input name="editar_direccion_lugar_atencion" id="editar_direccion_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nº</label>
                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select id="region_lugar_atencion_modificar" onchange="buscar_ciudades();" name="region_lugar_atencion_modificar" class="form-control form-control-sm" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select id="ciudad_lugar_atencion_modificar" name="ciudad_lugar_atencion_modificar" class="form-control form-control-sm" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select id="tipo_editar_lugar_atencion" name="tipo_editar_lugar_atencion" class="js-example-basic-single form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Centro Médico</option>
                                    <option value="2">Consulta Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input name="editar_email_lugar_atencion" id="editar_email_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="notificar_pacientes_modificar" name="notificar_pacientes_modificar">
                                    <label for="notificar_pacientes_modificar" class="cr"></label>
                                    <label>Notificar a pacientes modificación</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="button" onclick="editar_lugar_atencion();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal agregar lugar de atención existente-->
    <div id="modal_agregar_lugar_existente" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_lugar_existente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="">Desasociar o Agregar lugar existente</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Desasociar /Agregar</th>
                                            <th class="text-center align-middle">Nombre</th>
                                            <th class="text-center align-middle">Dirección</th>
                                            <th class="text-center align-middle">Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="agregar-1" checked="">
                                                    <label for="agregar-1" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">Centro Médico ISQ</td>
                                            <td class="text-center align-middle">Villanelo,123,Viña del Mar</td>
                                            <td class="text-center align-middle">Centro Médico</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="agregar-2" checked="">
                                                    <label for="agregar-2" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">Cemical</td>
                                            <td class="text-center align-middle">Papudo,123,La Ligua</td>
                                            <td class="text-center align-middle">Consulta Particular</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_4">
                                    <label for="not_pacientes_4" class="cr"></label>
                                    <label>Notificar a pacientes modificación</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal editar asistentes-->
    <div id="editar_asistentes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistentes">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar asistentes</h5>
                    <button type="button" id="cerrar_editar_asistentes" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="row" style="display: none">
                        <span><strong>Nombre: </strong></span><span id="nombre_asistente_agregar"></span>
                    </div>
                    <form id="">
                        <input type="hidden" name="mi_asistente_id_lugar_atencion" id="mi_asistente_id_lugar_atencion">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <h6 class="text-c-blue">Escriba rut de el o la asistente que desea asociar a su lugar de atención</h6>
                            </div>
                            <div id="buscar_datos_asistente" class="col-sm-6 col-md-6 mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Rut de asistente" name="rut_asistente" id="rut_asistente" aria-label="Rut" aria-describedby="button-addon2" onkeyup="formatoRut(this);">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" onclick="buscar_asistente($('#mi_asistente_id_lugar_atencion').val());" type="button" id="button-addon2">Asociar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="datos_asistente" style="display: none">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <table class="table table-borderless table-xs">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Rut:</strong></td>
                                                    <td><span id="datos_rut_asistente"></span>
                                                        <input type="hidden" id="id_asistente_lugar_atencion" name="id_asistente_lugar_atencion">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nombre:</strong></td>
                                                    <td><span id="datos_nombre_asistente"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Correo Electr&oacute;nico:</strong></td>
                                                    <td id="datos_email_asistente"></td>
                                                </tr>
                                                <tr>
                                                    <td> <strong>Tel&eacute;fono:</strong></td>
                                                    <td><span id="datos_telefono_asistente"></span></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" colspan="2">
                                                        <button type="button" id="confirmar_datos_asistente" name="confirmar_datos_asistente" onclick="datos_confirmar_asistente($('#mi_asistente_id_lugar_atencion').val());" class="btn btn-info-light-c btn-xxs"><i class="feather icon-check"></i> Confirmar datos</button>
                                                        <button type="button" id="confirmar_datos_asistente_examen" name="confirmar_datos_asistente_examen" onclick="datos_confirmar_asistente_examen($('#mi_asistente_id_lugar_atencion').val());" class="btn btn-success-light-c btn-xxs"><i class="feather icon-check"></i> Confirmar y dar permiso de carga de examen</button>
                                                        <button type="button" id="limpiar_datos_asistente" name="limpiar_datos_asistente" onclick="datos_limpiar_asistente();" class="btn btn-danger-light-c btn-xxs"><i class="feather icon-x"></i> Limpiar datos</button>
                                                    <td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                <table id="mi_asistente_table" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Habilitar / Deshabilitar</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer pt-2">
                    <button type="button" class="btn btn-danger btn-sm" id="cerrar_editar_asistentes1"><i class="feather icon-x"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal editar horario atencion-->
    <div id="modal_editar_horario_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_horario_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de atenci&oacute;n</h5>
                    <button type="button" id="cerrar_modal_editar_horario_atencion" class="close text-white" onclick="" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="">
                        <input type="hidden" name="mi_horario_id_lugar_atencion" id="mi_horario_id_lugar_atencion">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <h6 class="t-aten">Tipo de agenda</h6>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Seleccione </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class="form-control form-control-sm" onclick="validar_tipo_agenda();">

                                        @if($profesional->id_especialidad == 2)
                                            <option value="2">Atención Dental</option>
                                        @else
                                            <option value="0">Seleccione</option>
                                            <option value="1">Atención General</option>
                                            <option value="3">Atención Telemedicina</option>
                                            <option value="4">Exámenes</option>
                                            <option value="5">Procedimiento</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <h6 class="text-c-blue mb-3">Duraci&oacute;n</h6>
                            </div> --}}

                            <div class="col-sm-12 mb-1">
                                <h6 class="t-aten">Horario de Atenci&oacute;n</h6>
                            </div>
                            {{-- <div class="col-sm-6 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo Agenda </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class=" form-control" onclick="validar_tipo_agenda();">
                                        <option value="0">Seleccione tipo de agenda</option>
                                        <option value="1">Atención General</option>
                                        <option value="2">Atención Dental</option>
                                        <option value="3">Atención Telemedicina</option>
                                        <option value="4">Exámenes</option>
                                        <option value="5">Procedimiento</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Duraci&oacute;n de Consultas M&eacute;dicas </label>
                                    <select name="duracion_horario" id="duracion_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="00:15:00">15 minutos</option>
                                        <option value="00:30:00">30 minutos</option>
                                        <option value="00:45:00">45 minutos</option>
                                        <option value="01:00:00">60 minutos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Día de atención</label>
                                    <select name="dia_horario[]" id="dia_horario" class="form-control form-control-sm" multiple>

                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Mi&eacute;rcoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">S&aacute;bado</option>
                                        <option value="0">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Desde </label>
                                    <select name="hora_inicio_horario" id="hora_inicio_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione horario</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Hasta </label>
                                    <select name="hora_termino_horario" id="hora_termino_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione horario</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="alert alert-light border py-2 mb-2"><i class="feather icon-info text-info"></i> Recomendación: seleccione días, horario y duración. El sistema debe validar que no exista cruce antes de guardar.</div>
                                <button type="button" onclick="mi_horario_agregar();" class="btn btn-info btn-sm float-md-right"><i class="fa fa-plus"></i> Agregar horario de atención</button>
                                {{-- <button type="button" id="cerrar_modal_horario2" class="btn btn-danger btn-sm">Cancelar</button> --}}
                            </div>
                            <div class="col-sm-12 mt-2 mb-2">
                                <table id="mi_horario_table" class="table table-sm">
                                    <thead>
                                        <tr>
											<th class="align-middle">Agenda</th>
                                            <th class="align-middle">Desde</th>
                                            <th class="align-middle">Hasta</th>
                                            <th class="align-middle">D&iacute;a</th>
                                            <th class="text-center align-middle">Acci&oacute;n</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cerrar_modal_horario">Cancelar</button>
                    <button type="button" class="btn btn-info" id="cerrar_modal_horario1">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>

    <!--MODAL VALORES ATENCIÓN, GARANTIA, CONVENIOS-->
    <div id="modal_editar_valor_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_valor_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_convenio_titulo">Valores y convenios</h5>
                    <button type="button" id="cerrar_modal_editar_valor_atencion" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_lugar_atencion_valor" id="id_lugar_atencion_valor">
                    <div class="row">
                        <div class="col-md-6">
                              <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                        <a class="nav-link-aten text-reset active" id="convenio-info-tab" data-toggle="pill" href="#convenio-info" role="tab" aria-controls="convenio-info" aria-selected="true">
                                            Isapres
                                        </a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset " id="valor-aten-prof-tab" data-toggle="pill" href="#valor-aten-prof" role="tab" aria-controls="valor-aten-prof" aria-selected="true">
                                        Particular
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset " id="garantia-aten-prof-tab" data-toggle="pill" href="#garantia-aten-prof" role="tab" aria-controls="garantia-aten-prof" aria-selected="true">
                                        FONASA
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--PESTAÑAS-->
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                            <div class="tab-content">
                                 <!---ISAPRES-->
                                <div class="tab-pane show active" id="convenio-info" role="tabpanel" aria-labelledby="convenios-info-tab">
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                            <h5 class="text-c-blue f-18 mb-2">Isapres</h5>
                                        </div>
                                          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                            <p class="font-weight-bold mb-2">Selecciona las Isapres con las que el profesional está habilitado para atender</p>
                                          </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                                        <div class="alert alert-info py-2 px-3 mb-2">
                                                                                                Seleccione una o más Isapres y guarde. Para evitar errores, se recomienda modificar sólo el grupo que corresponda: Isapres, Particular o FONASA.
                                                                                        </div>
                                                                                    </div>
                                          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                            <div class="form-group fill">
                                                <select name="convenios[]" id="convenios" class="form-control form-control-sm" multiple>
                                                    <option>Banmédica</option>
                                                    <option>Colmena</option>
                                                    <option>Nueva Masvida</option>
                                                    <option>Cruz Blanca</option>
                                                    <option>Cruz del Norte</option>
                                                    <option>Vida Tres</option>
                                                    <option>Fundación</option>
                                                    <option>Isalud</option>
                                                </select>
                                                <small class="text-c-blue font-weight-bold"><i class="feather icon-info"></i> PUEDES SELECCIONAR UNO MÁS CONVENIOS</small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <hr>
                                            <button class="btn btn-info" onclick="guardarConvenio('Isapres')"><i class="feather icon-save" ></i> Guardar ISAPRES</button>
                                         </div>
                                    </div>
                                </div>


                                <!---PARTICULAR-->
                                <div class="tab-pane fade" id="valor-aten-prof" role="tabpanel" aria-labelledby="valor-aten-prof-tab">
                                    <div class="row mt-3">
                                         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                            <h5 class="text-c-blue f-18 mb-2">Particular</h5>
                                        </div>

                                        <div class="col-12">

                                            <p>Ingrese el valor que el profesional cobrara por la consulta particular</p>
                                        </div>
                                        <div class="form-group col-12  mt-2">
                                            <div class="contenedor-input">
                                                <label class="floating-label-negro"></label>
                                                <span class="signo">$</span>
                                                 <input class="form-control  input-icono" type="text" name="valor_particular" id="valor_particular" placeholder="0">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <hr>
                                            <button class="btn btn-info" onclick="guardarConvenio('Particular')"><i class="feather icon-save" ></i> Guardar PARTICULAR</button>
                                         </div>
                                    </div>

                                </div>

                                <!-- FONASA -->
                                <div class="tab-pane fade" id="garantia-aten-prof" role="tabpanel" aria-labelledby="garantia-aten-prof-tab">
                                    <div class="row mt-3">
                                         <div class="col-12 mb-3">
                                            <h6 class="text-c-blue f-18">FONASA</h6>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="text-dark f-16">Garantía por bono</h6>
                                            <p>Define el monto de garantía solicitado al paciente</p>
                                        </div>
                                        <div class="form-group col-12  mt-2">
                                            <div class="contenedor-input">
                                                <label class="floating-label-negro"></label>
                                                <span class="signo">$</span>
                                                <input class="form-control input-icono" type="text" id="garantia_fonasa" name="garantia_fonasa" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h6 class="text-dark f-16">Nivel</h6>
                                            <p>Establece el nivel de garantía solicitado al paciente</p>
                                        </div>
                                        <div class="form-group col-12 mt-2">
                                                <select class="form-control" id="nivel_fonasa" name="nivel_fonasa">
                                                    <option>Seleccione nivel</option>
                                                    <option value="1">Nivel 1</option>
                                                    <option value="2">Nivel 2</option>
                                                    <option value="3">Nivel 3</option>
                                                    <option value="4">Bono Especialidad</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h6 class="text-dark f-16">Vencimiento</h6>
                                            <p>Establece el tiempo de vencimiento de la garantía</p>
                                        </div>
                                        <div class="form-group col-12 mt-2">
                                                <select class="form-control" id="vencimiento_fonasa" name="vencimiento_fonasa">
                                                    <option>Seleccione tiempo</option>
                                                    <option value="1">1 Día</option>
                                                    <option value="2">2 Días</option>
                                                    <option value="3">3 Días</option>
                                                    <option value="4">4 Días</option>
                                                    <option value="5">5 Días</option>
                                                    <option value="6">6 Días</option>
                                                    <option value="7">7 Días</option>
                                                    <option value="8">8 Días</option>
                                                    <option value="9">9 Días</option>
                                                    <option value="10">10 Días</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <hr>
                                            <button class="btn btn-info" onclick="guardarConvenio('Fonasa')"><i class="feather icon-save" ></i> Guardar FONASA</button>
                                         </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6">
                              <div class="row">
                                    <!-- MOSTRAMOS UNA TABLA CON LOS CONVENIOS DEL PROFESIONAL EN ESE LUGAR DE ATENCION -->
                                    <div class="col-sm-12 mt-3 mb-3">
                                        <table id="tabla_convenios" class="display table table-striped dt-responsive nowrap table-sm w-100 table-responsive">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">Convenio</th>
                                                    <th class="align-middle">Valor o Bono</th>
                                                    <th class="align-middle">Garantía</th>
                                                    <th class="align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
    <!--****Cierre Container Completo****-->

    <!--Modal procedimientos-->
    <div id="modal_agrear_editar_procedimientos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agrear_editar_procedimientos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Procedimientos</h5>
                    <button type="button" id="cerrar_modal_editar_valor_atencion" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_agrear_editar_procedimientos();"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="modal_agrear_editar_procedimientos_id_lugar_atencion" id="modal_agrear_editar_procedimientos_id_lugar_atencion">
                    <input type="hidden" name="modal_agrear_editar_procedimientos_id_profesional" id="modal_agrear_editar_procedimientos_id_profesional">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Procedimientos</label>
                                <select name="agrear_editar_procedimientos_id_procedimiento" id="agrear_editar_procedimientos_id_procedimiento" class=" form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    {{--  --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Minutos por bloque</label>
                                <input name="agrear_editar_procedimientos_minutos_bloque" id="agrear_editar_procedimientos_minutos_bloque" type="number" class="form-control form-control-sm" value="15" readonly>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Cantidad Bloques</label>
                                <input name="agrear_editar_procedimientos_cantidad_bloques" id="agrear_editar_procedimientos_cantidad_bloques" type="number" class="form-control form-control-sm" value="0" min="1" step="1">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 mt-2">
                            <button type="button" onclick="registrar_mi_procedimiento_lugar_atencion()" class="btn btn-info float-md-right btn-sm"><i class="fa fa-plus"></i> Agregar convenio y valor</button>
                        </div>
                        <div class="col-sm-12 mt-3 mb-3">
                            {{--  <table id="" class="table table-sm table-responsive">  --}}
                            <table id="tabla_valores_proce_prof_lug_atencion" class="display table table-striped dt-responsive nowrap table-sm" style="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Procedimiento</th>
                                        <th class="align-middle">Min/Bloque</th>
                                        <th class="align-middle">Cant. Bloque</th>
                                        <th class="align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" id="cerrar_modal_agregar_editar_procedimiento" class="btn btn-danger" data-dismiss="modal" onclick="cerrar_modal_agrear_editar_procedimientos();">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>
    <!--****Cierre Container Completo****-->
 <!-- Modal editar convenio profesional -->
    <div id="modal_editar_convenio_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_editar_convenio_profesional" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar Convenio</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="$('#modal_editar_convenio_profesional').modal('hide')">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form_editar_convenio_profesional">
                    <div class="modal-body">
                        <input type="hidden" id="editar_convenio_id" name="editar_convenio_id">
                        <div class="form-group">
                            <label for="editar_convenio_nombre">Nombre Convenio</label>
                            <input type="text" class="form-control" id="editar_convenio_nombre" name="editar_convenio_nombre" readonly>
                        </div>
                        <div class="form-group">
                            <label for="editar_convenio_select">Convenios asociados</label>
                            <select id="editar_convenio_select" name="editar_convenio_select[]" multiple="multiple" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="editar_convenio_valor">Valor</label>
                            <input type="number" class="form-control" id="editar_convenio_valor" name="editar_convenio_valor" min="0">
                        </div>
                        <div class="form-group">
                            <label for="editar_convenio_valor_garantia">Valor Garantía</label>
                            <input type="number" class="form-control" id="editar_convenio_valor_garantia" name="editar_convenio_valor_garantia" min="0">
                        </div>
                        <div class="form-group">
                            <label for="editar_convenio_tpo_espera">Días de espera</label>
                            <select class="form-control" id="editar_convenio_tpo_espera" name="editar_convenio_tpo_espera">
                                <option value="">Seleccione días de espera</option>
                                <option value="1">1 día</option>
                                <option value="2">2 días</option>
                                <option value="3">3 días</option>
                                <option value="4">4 días</option>
                                <option value="5">5 días</option>
                                <option value="6">6 días</option>
                                <option value="7">7 días</option>
                                <option value="8">8 días</option>
                                <option value="9">9 días</option>
                                <option value="10">10 días</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_editar_convenio_profesional').modal('hide'); $('#modal_editar_valor_atencion').modal('show');"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="button" class="btn btn-info btn-sm" onclick="guardar_edicion_convenio_profesional()"><i class="feather icon-save"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@section('page-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {padding-left: 20px !important;}
        .resumen-lugar-card {border-radius: 12px; transition: .2s ease-in-out;}
        .resumen-lugar-card:hover {transform: translateY(-2px); box-shadow: 0 8px 18px rgba(0,0,0,.06);}
        .acciones-lugar .dropdown-menu {min-width: 220px;}
        .acciones-lugar .dropdown-item {font-size: 13px; padding: .55rem .9rem;}
        #tabla_lugares_atencion td {vertical-align: middle;}
        .modal-xl .nav-tabs-aten {border-bottom: 1px solid #e9ecef;}
        .modal-xl .nav-link-aten {display: block; padding: .7rem .8rem; border-radius: 8px 8px 0 0;}
        .modal-xl .nav-link-aten.active {background: #17a2b8; color: #fff !important; font-weight: 600;}
    </style>
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#tabla_lugares_atencion')) {
                $('#tabla_lugares_atencion').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [[4, 'asc'], [0, 'asc']],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                    }
                });
            }

            if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#tabla_convenios')) {
                $('#tabla_convenios').DataTable({
                    responsive: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                    }
                });
            }

            $('[data-toggle="tooltip"]').tooltip();
            actualizar_resumen_lugares();
        });

        function actualizar_badge_estado_lugar(id, activo) {
            let badge = $('#texto_estado_lugar_atencion_' + id);
            if (!badge.length) return;

            badge
                .removeClass('badge-success badge-secondary')
                .addClass(activo ? 'badge-success' : 'badge-secondary')
                .text(activo ? 'Activo' : 'Inactivo');

            let fila = $('#fila_lugar_atencion_' + id);
            fila.toggleClass('table-secondary text-muted', !activo);

            actualizar_resumen_lugares();

            if ($.fn.DataTable && $.fn.DataTable.isDataTable('#tabla_lugares_atencion')) {
                $('#tabla_lugares_atencion').DataTable().row(fila).invalidate('dom').draw(false);
            }
        }

        function actualizar_resumen_lugares() {
            let total = $('[id^="texto_estado_lugar_atencion_"]').length;
            let activos = 0;

            $('[id^="texto_estado_lugar_atencion_"]').each(function() {
                if ($.trim($(this).text()).toLowerCase() === 'activo') {
                    activos++;
                }
            });

            $('#contador_lugares_total').text(total);
            $('#contador_lugares_activos').text(activos);
            $('#contador_lugares_inactivos').text(total - activos);
        }

        function respuesta_estado_ok(data) {
            if (data === 'ok') return true;

            if (typeof data === 'string') {
                let limpio = $.trim(data).toLowerCase();
                if (limpio === 'ok') return true;

                try {
                    data = JSON.parse(data);
                } catch (e) {
                    return false;
                }
            }

            return data && (
                data.estado === 1 ||
                data.estado === '1' ||
                data.estado === 'ok' ||
                data.success === true
            );
        }

        function cambio_estado_lugar_atencion(id) {
            let checkbox = $('#estado_lugar_atencion_' + id);
            let nuevoEstadoChecked = checkbox.prop('checked');
            let estadoAnterior = !nuevoEstadoChecked;

            let id_lugar_atencion = id;
            let url = "{{ route('profesional.cambio_estado_lugar_atencion') }}";

            if (nuevoEstadoChecked) {
                swal({
                    title: "¿Habilitar lugar de atención?",
                    text:
                        "El lugar de atención volverá a quedar activo.\n\nRecuerde que deberá configurar nuevamente sus horarios de atención antes de recibir nuevas reservas.",
                    icon: "info",
                    buttons: ["Cancelar", "Habilitar"],
                    dangerMode: false,
                }).then((confirmado) => {
                    if (!confirmado) {
                        checkbox.prop('checked', estadoAnterior);
                        return;
                    }

                    checkbox.prop('disabled', true);

                    $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            id_lugar_atencion: id_lugar_atencion,
                            estado: 1
                        },
                    }).done(function(data) {
                        if (respuesta_estado_ok(data)) {
                            checkbox.prop('checked', true);
                            actualizar_badge_estado_lugar(id, true);

                            swal({
                                title: "Lugar de atención habilitado",
                                text: "Debe configurar nuevamente los horarios de atención para este lugar.",
                                icon: "success",
                                buttons: "Aceptar",
                            });
                        } else {
                            checkbox.prop('checked', false);
                            actualizar_badge_estado_lugar(id, false);

                            swal({
                                title: "Error",
                                text: "Error al habilitar el lugar de atención",
                                icon: "error",
                                buttons: "Aceptar",
                            });
                        }
                    }).fail(function() {
                        checkbox.prop('checked', false);
                        actualizar_badge_estado_lugar(id, false);

                        swal({
                            title: "Error",
                            text: "No se pudo comunicar con el servidor.",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }).always(function() {
                        checkbox.prop('disabled', false);
                    });
                });

            } else {
                swal({
                    title: "¿Deshabilitar lugar de atención?",
                    text:
                        "Al deshabilitar este lugar se eliminarán los horarios asociados, liberando esos bloques para otros lugares de atención.\n\nEsta acción no elimina las horas médicas ya agendadas.",
                    icon: "warning",
                    buttons: ["Cancelar", "Deshabilitar"],
                    dangerMode: true,
                }).then((confirmado) => {
                    if (!confirmado) {
                        checkbox.prop('checked', estadoAnterior);
                        return;
                    }

                    checkbox.prop('disabled', true);

                    $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            id_lugar_atencion: id_lugar_atencion,
                            estado: 0
                        },
                    }).done(function(data) {
                        if (respuesta_estado_ok(data)) {
                            checkbox.prop('checked', false);
                            actualizar_badge_estado_lugar(id, false);

                            swal({
                                title: "Lugar de atención deshabilitado",
                                text: "Los horarios asociados fueron liberados. Las horas médicas ya agendadas no fueron eliminadas.",
                                icon: "success",
                                buttons: "Aceptar",
                            });
                        } else {
                            checkbox.prop('checked', true);
                            actualizar_badge_estado_lugar(id, true);

                            swal({
                                title: "Error",
                                text: "Error al deshabilitar el lugar de atención",
                                icon: "error",
                                buttons: "Aceptar",
                            });
                        }
                    }).fail(function() {
                        checkbox.prop('checked', true);
                        actualizar_badge_estado_lugar(id, true);

                        swal({
                            title: "Error",
                            text: "No se pudo comunicar con el servidor.",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }).always(function() {
                        checkbox.prop('disabled', false);
                    });
                });
            }
        }

        // Guarda la edición del convenio profesional
        function guardar_edicion_convenio_profesional() {
            var id_convenio = $('#editar_convenio_id').val();
            var valor = $('#editar_convenio_valor').val();
            var tpo_espera = $('#editar_convenio_tpo_espera').val();
            var valor_garantia = $('#editar_convenio_valor_garantia').val();
            var convenios = $('#editar_convenio_select').val(); // array
            // Convertir a string separado por comas
            var convenios_str = Array.isArray(convenios) ? convenios.join(',') : '';

            $.ajax({
                url: '{{ route("adm_cm.editar_convenio") }}',
                type: 'post',
                data: {
                    id_convenio: id_convenio,
                    valor: valor,
                    valor_garantia: valor_garantia,
                    tpo_espera: tpo_espera,
                    convenios: convenios_str,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    if(response.estado == 1){
                        swal({
                            title: "Convenio actualizado",
                            text: response.msj,
                            icon: "success",
                            buttons: "Aceptar",
                        });
                        $('#modal_editar_convenio_profesional').modal('hide');
                        // Opcional: recargar tabla de convenios o actualizar vista
                    } else {
                        swal({
                            title: "Error",
                            text: response.msj || 'No se pudo guardar el convenio',
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                },
                error: function(xhr) {
                    swal({
                        title: "Error",
                        text: "No se pudo guardar el convenio. Intenta nuevamente.",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            });
        }

         // Abre el modal de edición de convenio profesional con los datos del convenio seleccionado
        function editar_convenio_profesional(id_convenio) {
            // Cierra el modal actual de valores/convenios
            $('#modal_editar_valor_atencion').modal('hide');

            // Realiza una petición AJAX para obtener los datos del convenio por su ID
            $.ajax({
                url: '{{ route("adm_cm.dame_convenio") }}',
                type: 'post',
                data: {
                    id: id_convenio,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.estado == 0){
                        swal({
                            title: "Convenio no encontrado",
                            text: "No se pudo encontrar el convenio para editar.",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    } else {
                        let convenio = response.convenio;
                        $('#editar_convenio_nombre').val(convenio.nombre_convenio);
                        $('#editar_convenio_valor').val(convenio.valor);
                        $('#editar_convenio_valor_garantia').val(convenio.valor_garantia);
                        $('#editar_convenio_tpo_espera').val(convenio.tpo_espera);
                        $('#editar_convenio_id').val(convenio.id);

                        // Procesar convenios string a array
                        let conveniosArray = [];
                        if (convenio.convenios) {
                            conveniosArray = convenio.convenios.split(',').map(function(item){ return item.trim(); }).filter(Boolean);
                        }
                        // Opcional: lista de todos los convenios posibles (ajusta según tus opciones reales)
                        let todosConvenios = [
                            'Particular','Fonasa','Banmédica','Colmena','Nueva Masvida','Cruz Blanca','Cruz del Norte','Vida Tres','Fundación','Isalud'
                        ];
                        let $select = $('#editar_convenio_select');
                        $select.empty();
                        todosConvenios.forEach(function(c){
                            let selected = conveniosArray.includes(c) ? 'selected' : '';
                            $select.append('<option value="'+c+'" '+selected+'>'+c+'</option>');
                        });
                        // Inicializar select2 si no está inicializado
                        if (!$select.hasClass('select2-hidden-accessible')) {
                            $select.select2({
                                placeholder: 'Seleccione convenios',
                                width: '100%',
                                dropdownParent: $('#modal_editar_convenio_profesional')
                            });
                        }
                        $select.val(conveniosArray).trigger('change');

                        $('#modal_editar_convenio_profesional').modal('show');
                    }
                },
                error: function(xhr) {
                    swal({
                        title: "Error al cargar convenio",
                        text: "No se pudo cargar el convenio para editar.",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            });
        }
                // Trae y muestra los convenios del profesional en el lugar de atención
        function mis_valores_lugar_atencion(id_convenio_profesional, lugar_atencion) {
            // Opcional: puedes mostrar un loader aquí
            $.ajax({
                url: '{{ route("profesional.obtener_convenios_lugar_atencion") }}', // Debes crear esta ruta en web.php y el método en el controlador
                type: 'get',
                data: {
                    id_convenio_profesional: id_convenio_profesional
                },
                success: function(response) {
                    $('#nuevo_convenio_titulo').text('Convenios y valores - ' + lugar_atencion); // Actualiza el título del modal con el nombre del lugar de atención
                    $('#id_lugar_atencion_valor').val(id_convenio_profesional); // Guarda el ID para usar al guardar cambios
                    console.log(response);
                    // Aquí puedes procesar la respuesta y mostrar los convenios en el modal
                    // Por ejemplo, llenar el select de convenios o mostrar en una tabla
                    // Supongamos que response es un array de convenios
                    if (Array.isArray(response)) {
                        // Limpia el select de convenios
                        $('#tabla_convenios tbody').empty();
                        response.forEach(function(convenio) {
                            console.log(convenio);
                            if(convenio.nombre == 'Fonasa'){
                                $('#tabla_convenios tbody').append('<tr><td>'+convenio.nombre+'</td><td>Nivel '+(convenio.nivel || '-')+'</td><td>'+ (convenio.valor_garantia || convenio.garantia || '-') +'</td><td><button class="btn btn-sm btn-info mr-1" onclick="editar_convenio_profesional('+convenio.id+')"><i class="feather icon-edit"></i></button><button class="btn btn-sm btn-danger" onclick="eliminar_convenio_profesional('+convenio.id+')"><i class="fas fa-trash"></i></button></td></tr>');
                            }else if(convenio.nombre == 'Particular'){
                                $('#tabla_convenios tbody').append('<tr><td>'+convenio.nombre+'</td><td>'+convenio.valor+'</td><td>No aplica</td><td><button class="btn btn-sm btn-info mr-1" onclick="editar_convenio_profesional('+convenio.id+')"><i class="feather icon-edit"></i></button><button class="btn btn-sm btn-danger" onclick="eliminar_convenio_profesional('+convenio.id+')"><i class="fas fa-trash"></i></button></td></tr>');
                            }else{
                                $('#tabla_convenios tbody').append('<tr><td>'+convenio.nombre+'</td><td>'+ (convenio.valor || 'Habilitado') +'</td><td>'+ (convenio.valor_garantia || 'Habilitado') +'</td><td><button class="btn btn-sm btn-info mr-1" onclick="editar_convenio_profesional('+convenio.id+')"><i class="feather icon-edit"></i></button><button class="btn btn-sm btn-danger" onclick="eliminar_convenio_profesional('+convenio.id+')"><i class="fas fa-trash"></i></button></td></tr>');
                            }

                        });
                    } else {
                        // Si la respuesta es un string o error
                        swal({
                            title: "Error al cargar convenios",
                            text: response,
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                    // Abre el modal de valores/convenios
                    $('#modal_editar_valor_atencion').modal('show');
                },
                error: function(xhr) {
                    swal({
                        title: "Error al cargar convenios",
                        text: "No se pudieron cargar los convenios. Intenta nuevamente.",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            });
        }
        /** modal editar_asistentes */
        function datos_confirmar_asistente(id) {
            let id_lugar_atencion = id;
            let id_asistente = $('#id_asistente_lugar_atencion').val();
            let url = "{{ route('profesional.agregar_asistente_lugar_atencion') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                    id_asistente: id_asistente
                },
            })
            .done(function(data) {
                if (data !== 'null') {
                    swal({
                        title: "Se ha agregado asistente al lugar de atención",
                        icon: "success",
                        buttons: "Aceptar",
                    }).then(function () {
                        // 🔄 Recarga la tabla de asistentes para ese lugar
                        if (typeof mi_asistente_lugar_atencion === 'function') {
                            mi_asistente_lugar_atencion(id_lugar_atencion);
                        }
                        // 🙈 Oculta la ficha y limpia datos
                        ocultarPanelDatosAsistente();
                    });
                } else {
                    swal({
                        title: "Error al agregar asistente",
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

        function guardarConvenio(tabActivo) {
          let conveniosSeleccionados = [];
          let data = {};

          if (tabActivo === 'Particular') {
            conveniosSeleccionados = ['Particular'];
            data.valor = document.getElementById('valor_particular').value;
            if (!data.valor) {
              swal({
                title: "Error",
                text: "Debe ingresar un valor para Particular",
                icon: "error",
                buttons: "Aceptar",
              })
              return;
            }
          } else if (tabActivo === 'Fonasa') {
            conveniosSeleccionados = ['Fonasa'];
            data.garantia = document.getElementById('garantia_fonasa').value;
            data.vencimiento = document.getElementById('vencimiento_fonasa').value;
            data.nivel = document.getElementById('nivel_fonasa').value;
            if (!data.garantia || !data.vencimiento || !data.nivel) {
              swal({
                title: "Error",
                text: "Debe ingresar garantía, tiempo de vencimiento y nivel para Fonasa",
                icon: "error",
                buttons: "Aceptar",
              });
              return;
            }
          } else if (tabActivo === 'Isapres') {
            conveniosSeleccionados = obtenerConveniosIsapresSeleccionados(); // tu función para obtener los seleccionados
          }

          data.convenios = conveniosSeleccionados;
          var convenios = '';

          if(Array.isArray(data.convenios) && data.convenios.length > 0){
              convenios = data.convenios.join(', ');
          }

          data.lugar_atencion_convenio = $('#nuevo_convenio_titulo').text().replace('Convenios y valores - ', ''); // Obtener el nombre del lugar de atención desde el título del modal
          data.id_lugar_atencion_valor = $('#id_lugar_atencion_valor').val(); // ID del lugar de atención para asociar los convenios

          // Aquí haces el submit por AJAX o como corresponda
            console.log('Datos a guardar:', data);
            $.ajax({
                url: '{{ route("profesional.guardar_valores_lugar_atencion") }}', // Ajusta esta ruta
                type: 'get',
                data: {
                    convenios: convenios,
                    valor: data.valor || null,
                    valor_garantia: data.garantia || null,
                    tpo_espera: data.vencimiento || null,
                    lugar_atencion_convenio: data.lugar_atencion_convenio,
                    id_lugar_atencion_valor: data.id_lugar_atencion_valor, // ID del lugar de atención para asociar los convenios
                    nivel: data.nivel || null,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    if(response.estado == 1){
                        swal({
                            title: "Convenios guardados",
                            text: response.msj,
                            icon: "success",
                            buttons: "Aceptar",
                        });
                        $('#modal_editar_valor_atencion').modal('hide');
                        // Opcional: recargar tabla de convenios o actualizar vista
                        mis_valores_lugar_atencion(data.id_lugar_atencion_valor, data.lugar_atencion_convenio); // Recarga los convenios del lugar de atención actual
                        limpiarFormularioConvenios(); // Limpia el formulario después de guardar
                    } else {
                        swal({
                            title: "Error",
                            text: response.msj || 'No se pudieron guardar los convenios',
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                },
                error: function(xhr) {
                    swal({
                        title: "Error",
                        text: "No se pudieron guardar los convenios. Intenta nuevamente.",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            })
        }

        function obtenerConveniosIsapresSeleccionados() {
          const select = document.getElementById('convenios');
          const selectedOptions = Array.from(select.selectedOptions);
          return selectedOptions.map(option => option.value);
        }

        function limpiarFormularioConvenios() {
          document.getElementById('valor_particular').value = '';
          document.getElementById('garantia_fonasa').value = '';
          document.getElementById('vencimiento_fonasa').value = '';
          $('#convenios').val(null).trigger('change'); // Limpia el select de convenios
        }

        function datos_confirmar_asistente_examen(id) {
            let id_lugar_atencion = id;
            let id_asistente = $('#id_asistente_lugar_atencion').val();
            let url = "{{ route('profesional.agregar_asistente_lugar_atencion') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                    id_asistente: id_asistente,
                    examen: 1,
                },
            })
            .done(function(data) {
                if (data !== 'null') {
                    swal({
                        title: "Se ha agregado asistente al lugar de atención",
                        icon: "success",
                        buttons: "Aceptar",
                    }).then(function () {
                        // 🔄 Recarga la tabla de asistentes para ese lugar
                        if (typeof mi_asistente_lugar_atencion === 'function') {
                            mi_asistente_lugar_atencion(id_lugar_atencion);
                        }
                        // 🙈 Oculta la ficha y limpia datos
                        ocultarPanelDatosAsistente();
                    });
                } else {
                    swal({
                        title: "Error al agregar asistente",
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

        /** fin modal editar_asistentes */

        /** modal procedimientos */
        function mi_procedimiento_lugar_atencion(id_lugar_atencion, id_profesional)
        {

            cargar_procedimientos_lugar_atencion(id_lugar_atencion);

            $('#agrear_editar_procedimientos_id_procedimiento').val(0);
            $('#agrear_editar_procedimientos_minutos_bloque').val(15);
            $('#agrear_editar_procedimientos_cantidad_bloques').val(0);

            $('#modal_agrear_editar_procedimientos').modal('show');
            cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional);

        };

        function cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional)
        {
            $('#tabla_valores_proce_prof_lug_atencion tbody').empty();

            let url = "{{ route('profesional.mis_procedimientos_lugar_atencion') }}";
            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                    estado: 1,
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {

                    $('#modal_agrear_editar_procedimientos_id_lugar_atencion').val(id_lugar_atencion);
                    $('#modal_agrear_editar_procedimientos_id_profesional').val(id_profesional);

                    $('#tabla_valores_proce_prof_lug_atencion tbody').empty();

                    $.each(data.registro, function (index, value) {
                        html ='';
                        html += '<tr>';
                        html += '    <td>'+value.nombre+'</td>';
                        html += '    <td>'+value.minutos_bloque+'</td>';
                        html += '    <td>'+value.cantidad_bloques+'</td>';
                        html += '    <td>';
                        // html += '       <button type="button" class="btn btn-info btn-sm btn-icon accion_editar_procedimiento has-ripple" data-toggle="modal" onclick="mi_procedimiento_lugar_atencion(83)">';
                        // html += '           <i class="fas fa-edit"></i><span class="ripple ripple-animate" style="height: 26px; width: 26px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: 2.9375px; left: 7px;"></span>';
                        // html += '       </button>';
                        html += '       <button type="button" class="btn btn-danger btn-sm btn-icon accion_eliminar_procedimiento has-ripple" data-toggle="modal" onclick="eliminar_procedimiento_lugar_atencion_profesional('+value.id+', '+id_lugar_atencion+', '+id_profesional+')">';
                        html += '           <i class="feather icon-trash-2"></i><span class="ripple ripple-animate" style="height: 26px; width: 26px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: 2.9375px; left: 7px;"></span>';
                        html += '       </button>';
                        html += '    </td>';
                        html += '</tr>';
                        $('#tabla_valores_proce_prof_lug_atencion tbody').append(html);
                    });


                } else {
                    console.log(resp)
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_procedimientos_lugar_atencion(id_lugar_atencion)
        {

            $('#agrear_editar_procedimientos_id_procedimiento').html('');
            let url = "{{ route('centro.procedimientos') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(data)
                {
                    console.log(data);
                    if (data.estado == 1)
                    {

                        $.each(data.registro, function (index, value) {
                            var html = '<option value="'+value.id+'">'+value.nombre+' '+value.cantidad_bloques+'Blq.</option>';
                            $('#agrear_editar_procedimientos_id_procedimiento').append(html);
                        });


                    } else {
                        console.log(resp)
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function registrar_mi_procedimiento_lugar_atencion()
        {
            let id_lugar_atencion = $('#modal_agrear_editar_procedimientos_id_lugar_atencion').val();
            let id_profesional = $('#modal_agrear_editar_procedimientos_id_profesional').val();
            let id_procedimiento = $('#agrear_editar_procedimientos_id_procedimiento').val();
            let nombre_procedimiento = $('#agrear_editar_procedimientos_id_procedimiento option:selected').text();
            let minutos_bloque = $('#agrear_editar_procedimientos_minutos_bloque').val();
            let cantidad_bloques = $('#agrear_editar_procedimientos_cantidad_bloques').val();
            let url = "{{ route('profesional.mis_procedimientos_lugar_atencion.registrar') }}";
            if (!id_procedimiento || id_procedimiento === "0") {
                swal({
                    title: "Procedimiento",
                    text: "Debes seleccionar un procedimiento.",
                    icon: "warning",
                    buttons: "Aceptar",
                });
                return;
            }

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lugar_atencion : id_lugar_atencion,
                        id_profesional : id_profesional,
                        id_procedimiento_centro : id_procedimiento,
                        nombre : nombre_procedimiento,
                        minutos_bloque : minutos_bloque,
                        cantidad_bloques : cantidad_bloques,
                    },
                })
                .done(function(data)
                {
                    console.log(data);
                    if (data.estado == 1)
                    {
                        cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional);
                        swal({
                            title: "Procedimiento",
                            text: "Registro Exitoso",
                            icon: "success",
                            buttons: "Aceptar",
                        });

                    }
                    else
                    {
                        swal({
                            title: "Procedimiento",
                            text: "Falla en Registro",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cancelar_modal_agrear_editar_procedimientos()
        {
            $('#agrear_editar_procedimientos_id_procedimiento').val(0);
            $('#agrear_editar_procedimientos_minutos_bloque').val(15);
            $('#agrear_editar_procedimientos_cantidad_bloques').val(0);
        }

        function cerrar_modal_agrear_editar_procedimientos()
        {
            $('#modal_agrear_editar_procedimientos').modal('hide');
        }

        function eliminar_procedimiento_lugar_atencion_profesional(id, id_lugar_atencion, id_profesional)
        {
            let url = "{{ route('centro.procedimientos.eliminar') }}";
            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id: id,
                    estado: 0,
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {
                    cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional);
                    swal({
                        title: "Procedimiento",
                        text: "Eliminar",
                        icon: "success",
                        buttons: "Aceptar",
                    });

                } else {
                    swal({
                        title: "Procedimiento",
                        text: "Falla al Eliminar",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        /** fin modal procedimientos */

        /** validar tipo agenda */
        function validar_tipo_agenda()
        {
            var valor = $('#tipo_agenda_medica').val();
            if(valor == 5 || valor == 2)
            {
                $('#duracion_horario').val('00:15:00');
                $('#duracion_horario').attr('disabled', true);
            }
            else
            {
                $('#duracion_horario').val('0');
                $('#duracion_horario').attr('disabled', false);
            }
        }
        /** cierre validar tipo agenda */

        function eliminar_lugar_atencion(id)
        {
            let id_lugar_atencion = id;
            let url = "{{ route('profesional.cambio_estado_lugar_atencion') }}";


                swal({
                    title: "¿Está seguro que desea eliminar/desasociar este lugar de atención?",
                    text: "Esta acción ocultará el lugar de la lista del profesional. Confirme sólo si está seguro.",
                    icon: "warning",
                    buttons: ["Cancelar", "Solicitar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete)
                    {
                        let estado = 3;

                        $.ajax({
                            url: url,
                            type: "get",
                            data: {
                                //_token: _token,
                                id_lugar_atencion: id_lugar_atencion,
                                estado: estado
                            },
                        })
                        .done(function(data) {
                            if (data == 'ok')
                            {
                                swal({
                                    title: "Lugar de atencion ELIMINADO",
                                    icon: "success",
                                    buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                                location.reload();
                            }
                            else
                            {
                                swal({
                                    title: "Error",
                                    text: "Error al ELIMINAR el lugar de atencion",
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
                            title: "Solicitud Cancelada",
                            icon: "success",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                });

        }
        function ocultarPanelDatosAsistente() {
    // Oculta la card
    $('#datos_asistente').hide();

    // Limpia inputs
    $('#rut_asistente').val('');
    $('#id_asistente_lugar_atencion').val('');
    $('#mi_asistente_id_lugar_atencion').val('');

    // Limpia textos
    $('#datos_rut_asistente').text('');
    $('#datos_nombre_asistente').text('');
    $('#datos_email_asistente').text('');
    $('#datos_telefono_asistente').text('');
}
 $(function () {
    $('#dia_horario').select2({
      placeholder: 'Seleccione días',
      width: '100%',
      closeOnSelect: false,
      dropdownParent: $('#dia_horario').closest('.form-group') // 🔑
    });
  });

 $(function () {
    $('#convenios').select2({
      placeholder: 'Seleccione Convenios',
      width: '100%',
      closeOnSelect: false,
      dropdownParent: $('#convenios').closest('.form-group') // 🔑
    });
  });


    //LIMPIAR
    function datos_limpiar_asistente() {
        $('#rut_asistente').val('');
        $('#datos_asistente').hide();
    }
    // Elimina un convenio profesional por ID
    function eliminar_convenio_profesional(id_convenio) {
        swal({
            title: "¿Está seguro que desea eliminar este convenio?",
            text: "Esta acción no se puede deshacer.",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '{{ route("adm_cm.eliminar_convenio") }}', // Ajusta la ruta si es necesario
                    type: 'post',
                    data: {
                        id: id_convenio,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.estado == 1){
                            swal({
                                title: "Convenio eliminado",
                                text: response.msj,
                                icon: "success",
                                buttons: "Aceptar",
                            });
                            mis_valores_lugar_atencion($('#id_lugar_atencion_valor').val(), $('#nuevo_convenio_titulo').text().replace('Convenios y valores - ', '')); // Recarga los convenios del lugar de atención actual
                        } else {
                            swal({
                                title: "Error",
                                text: response.msj || 'No se pudo eliminar el convenio',
                                icon: "error",
                                buttons: "Aceptar",
                            });
                        }
                    },
                    error: function(xhr) {
                        swal({
                            title: "Error",
                            text: "No se pudo eliminar el convenio. Intenta nuevamente.",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                });
            }
        });
    }
    </script>

@endsection
