@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center mt-3">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}">Administración del centro médico</a></li> --}}
                            <li class="breadcrumb-item"><a href="#">Área de Odontología  {{ mb_strtoupper($institucion->nombre) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="wid-60 align-self-start mr-3"  src="{{ asset('images/iconos/dental.png') }}">
                          <div class="media-body">
                           <h4 class="text-c-blue">Odontología</h4>
                           <p>Área especializada en salud bucal y procedimientos odontológicos.</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card py-0">
                    <div class="card-body pb-2 pt-2">
                        <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="prof-odonto-cm-tab" data-toggle="pill" href="#prof-odonto-cm" role="tab" aria-controls="prof-odonto-cm" aria-selected="true">
                                    Profesionales odontólogos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ex-odonto-cm-tab" data-toggle="pill" href="#ex-odonto-cm" role="tab" aria-controls="ex-odonto-cm" aria-selected="false">
                                    Exámenes
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="proc-odonto-cm-tab" data-toggle="pill" href="#proc-odonto-cm" role="tab" aria-controls="proc-odonto-cm" aria-selected="false">
                                   Procedimientos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                <div class="tab-content">
                    <!--PROFESIONALES-->
                    <div class="tab-pane show active" id="prof-odonto-cm" role="tabpanel" aria-labelledby="prof-odonto-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-user icono-primary"></i>Profesionales odontólogos</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_odontologo();"><i class="feather icon-plus"></i> Añadir odontólogo</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_odontologos" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Profesional</th>
                                                    <th>Especialidad</th>
                                                    <th>Contacto</th>
                                                    <th>Lugar de Atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($odontologos))
                                                    @foreach($odontologos as $odontologo)
                                                    <tr>
                                                        <td>
                                                            <span><strong>{{ $odontologo->nombre.' '.$odontologo->apellido_uno.' '.$odontologo->apellido_dos }}</strong></span><br>
                                                            <span>{{ $odontologo->rut }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $odontologo->TipoEspecialidad()->first()->nombre }}</span>
                                                            @if (!empty($odontologo->id_sub_tipo_especialidad))
                                                                <br>
                                                                <span>{{ $odontologo->SubTipoEspecialidad()->first()->nombre }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span><i class="feather icon-phone icono-tabla"></i> {{ $odontologo->telefono_uno }}</span> <br>
                                                            <span><i class="feather icon-mail icono-tabla"></i> {{ $odontologo->email }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                        </td>
                                                        <td>
                                                            <label class="switch-moderno">
                                                                <input type="checkbox" id="switchEstado">
                                                                <span class="switch-slider">
                                                                        <span class="switch-text off">
                                                                         Inactivo
                                                                        </span>
                                                                        <span class="switch-text on">
                                                                        Activo
                                                                        </span>
                                                                </span>
                                                            </label>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                           {{-- <button type="button" class="btn btn-info btn-icon btn-sm" onclick="ver_odontologo({{ $odontologo->id }})" title="Ver detalles"><i class="feather icon-eye"></i></button>--}}
                                                            <button type="button" class="btn btn-warning btn-icon btn-sm" onclick="editar_odontologo({{ $odontologo->id }})" title="Editar"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="eliminar_odontologo({{ $odontologo->id }})" title="Eliminar"><i class="feather icon-trash-2"></i></button>
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
                    <!--EXÁMENES-->
                    <div class="tab-pane fade" id="ex-odonto-cm" role="tabpanel" aria-labelledby="ex-odonto-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                     <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-file icono-primary"></i>Exámenes</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_odontologo();"><i class="feather icon-plus"></i> Añadir exámenes</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_odontologos" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Procedimiento</th>
                                                    <th>Min. por bloque</th>
                                                    <th>Bloques</th>
                                                    <th>Valor</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nombre del procedimiento</td>
                                                    <td>15 min</td>
                                                    <td>2 bloques</td>
                                                    <td>$25.000</td>
                                                    <td>
                                                            <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>
                                                        <label class="switch-moderno">
                                                            <input type="checkbox" id="switchEstado">
                                                            <span class="switch-slider">
                                                                    <span class="switch-text off">
                                                                     Inactivo
                                                                    </span>
                                                                    <span class="switch-text on">
                                                                    Activo
                                                                    </span>
                                                            </span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button class="btn-warning btn btn-icon"><i class="feather icon-edit"></i></button>
                                                        <button class="btn-danger btn btn-icon"><i class="feather icon-x"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--Procedimientos-->
                    <div class="tab-pane fade" id="proc-odonto-cm" role="tabpanel" aria-labelledby="proc-odonto-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-file icono-primary"></i>Procedimiento</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_odontologo();"><i class="feather icon-plus"></i> Añadir procedimiento</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_odontologos" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre del exámen</th>
                                                    <th>Descripción</th>
                                                    <th>Cantidad de bloques</th>
                                                    <th>Valor</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>5665456</td>
                                                    <td>Nombre examen</td>
                                                    <td>Descripción</td>
                                                    <td>3</td>
                                                    <td>$30.000</td>
                                                    <td>
                                                        <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>
                                                        <label class="switch-moderno">
                                                            <input type="checkbox" id="switchEstado">
                                                            <span class="switch-slider">
                                                                    <span class="switch-text off">
                                                                     Inactivo
                                                                    </span>
                                                                    <span class="switch-text on">
                                                                    Activo
                                                                    </span>
                                                            </span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button class="btn-warning btn btn-icon"><i class="feather icon-edit"></i></button>
                                                        <button class="btn-danger btn btn-icon"><i class="feather icon-x"></i></button>
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
            </div>
        </div>

        <!--<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                  <table id="" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Área</th>
                                            <th>Ubicación</th>
                                            <th>Sucursal</th>
                                            <th>Ver gestión del área</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Odontología</td>
                                            <td>Primer piso</td>
                                            <td>Insi (Casa Matriz)<br><small>Dirección</small></td>
                                            <td><button class="btn btn-sm btn-info"><i class="feather icon-eye"></i> Ver</button></td>
                                            <td><button class="btn btn-icon btn-warning"><i class="feather icon-edit"></i></button>
                                                <button class="btn btn-icon btn-danger"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        
    </div>
</div>
<!--****Cierre Container Completo****-->
<!--Modal agregar odontólogo-->
<div id="agregar_odontologo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_odontologo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar Odontólogo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_agregar_odontologo">
                    <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tipo Odontólogo</label>
                                <select class="form-control form-control-sm" name="tipo_odontologo" id="a_tipo_odontologo">
                                    <option value="">Seleccione...</option>
                                    @foreach($tipos_odontologos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">RUT</label>
                                <input class="form-control form-control-sm" oninput="formatoRut(this)" name="rut" id="a_rut" type="text" placeholder="12.345.678-9">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha de Nacimiento</label>
                                <input class="form-control form-control-sm" name="fecha_nacimiento" id="a_fecha_nacimiento" type="date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombres</label>
                                <input class="form-control form-control-sm" name="nombre" id="a_nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                <input class="form-control form-control-sm" name="apellido_uno" id="a_apellido_uno" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                <input class="form-control form-control-sm" name="apellido_dos" id="a_apellido_dos" type="text">
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Sexo</label>
                                <select class="form-control form-control-sm" name="sexo" id="a_sexo">
                                    <option value="">Seleccione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Email</label>
                                <input class="form-control form-control-sm" name="email" id="a_email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Teléfono Principal</label>
                                <input class="form-control form-control-sm" name="telefono_uno" id="a_telefono_uno" type="text" placeholder="+56 9 1234 5678">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Teléfono Secundario</label>
                                <input class="form-control form-control-sm" name="telefono_dos" id="a_telefono_dos" type="text" placeholder="Opcional">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección</label>
                                <input class="form-control form-control-sm" name="direccion" id="a_direccion" type="text" placeholder="Calle, avenida, etc.">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Número</label>
                                <input class="form-control form-control-sm" name="numero" id="a_numero" type="text" placeholder="123">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select name="ciudad" id="a_ciudad" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" name="region" id="a_region" onchange="buscar_ciudad_profesional();">
                                    <option value="">Seleccione...</option>
                                    @if(isset($regiones))
                                        @foreach($regiones as $region)
                                            <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Lugar de Atención</label>
                                <select class="form-control form-control-sm" name="lugar_atencion" id="a_lugar_atencion">
                                    <option value="">Seleccione...</option>
                                    @if(isset($lugares_atencion))
                                        @foreach($lugares_atencion as $lugar)
                                            <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                                        @endforeach
                                    @else
                                        <option value="{{ $institucion->LugarAtencion->id }}">{{ $institucion->LugarAtencion->nombre }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo Convenio</label>
                                <select class="form-control form-control-sm" name="agregar_profesional_id_tipo_convenio_institucion" id="agregar_profesional_id_tipo_convenio_institucion" onchange="mostar_div_montos_tipo_convenio('agregar_profesional_id_tipo_convenio_institucion');">
                                    <option value="">Seleccione</option>
                                    <option value="1">Fijo</option>
                                    <option value="2">Variable</option>
                                </select>
                            </div>
                        </div>
                        <div class="div_fijo" style="display: none; padding: 20px;">
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro Unico</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" name="agregar_profesional_fijo" id="agregar_profesional_fijo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="div_variable" style="display: none; padding: 20px;">
                            <div class="row mt-1">
                                <div class="col-sm-4">Porcentaje por Atenciones</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" max="100" step="0.1" name="agregar_profesional_atencion" id="agregar_profesional_atencion" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Porcentaje por Ventas</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" max="100" step="0.1" name="agregar_profesional_ventas" id="agregar_profesional_ventas" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro por Confirmaicon de Agenda</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_confirmacion_agenda" id="agregar_profesional_confirmacion_agenda" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro por GGCC</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_ggcc" id="agregar_profesional_ggcc" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro arriendo BOX</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_box" id="agregar_profesional_box" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-info mb-0" onclick="guardar_odontologo()">Guardar Odontólogo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal ver odontólogo-->
<div id="ver_odontologo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ver_odontologo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Detalles del Odontólogo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">RUT:</label>
                            <p id="v_rut"></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nombre Completo:</label>
                            <p id="v_nombre_completo"></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Especialidad:</label>
                            <p id="v_especialidad"></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Email:</label>
                            <p id="v_email"></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Teléfono:</label>
                            <p id="v_telefono"></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Lugar de Atención:</label>
                            <p id="v_lugar_atencion"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal editar odontólogo-->
<div id="editar_odontologo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_odontologo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar Odontólogo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_editar_odontologo">
                    <input type="hidden" name="e_id" id="e_id">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">RUT</label>
                                <input class="form-control form-control-sm" name="e_rut" id="e_rut" type="text" placeholder="12.345.678-9">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha de Nacimiento</label>
                                <input class="form-control form-control-sm" name="e_fecha_nacimiento" id="e_fecha_nacimiento" type="date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombres</label>
                                <input class="form-control form-control-sm" name="e_nombre" id="e_nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                <input class="form-control form-control-sm" name="e_apellido_uno" id="e_apellido_uno" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                <input class="form-control form-control-sm" name="e_apellido_dos" id="e_apellido_dos" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Sexo</label>
                                <select class="form-control form-control-sm" name="e_sexo" id="e_sexo">
                                    <option value="">Seleccione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Email</label>
                                <input class="form-control form-control-sm" name="e_email" id="e_email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Teléfono Principal</label>
                                <input class="form-control form-control-sm" name="e_telefono_uno" id="e_telefono_uno" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Teléfono Secundario</label>
                                <input class="form-control form-control-sm" name="e_telefono_dos" id="e_telefono_dos" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección</label>
                                <input class="form-control form-control-sm" name="e_direccion" id="e_direccion" type="text" placeholder="Calle, avenida, etc.">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Número</label>
                                <input class="form-control form-control-sm" name="e_numero" id="e_numero" type="text" placeholder="123">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" name="e_region" id="e_region" onchange="buscar_ciudad_profesional_editar();">
                                    <option value="">Seleccione...</option>
                                    @if(isset($regiones))
                                        @foreach($regiones as $region)
                                            <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select name="e_ciudad" id="e_ciudad" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Especialidad</label>
                                <select class="form-control form-control-sm" name="e_especialidad" id="e_especialidad">
                                    <option value="">Seleccione...</option>
                                    @foreach($tipos_odontologos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Lugar de Atención</label>
                                <select class="form-control form-control-sm" name="e_lugar_atencion" id="e_lugar_atencion">
                                    <option value="">Seleccione...</option>
                                    @if(isset($lugares_atencion))
                                        @foreach($lugares_atencion as $lugar)
                                            <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                                        @endforeach
                                    @else
                                        <option value="{{ $institucion->LugarAtencion->id }}">{{ $institucion->LugarAtencion->nombre }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-info mb-0" onclick="actualizar_odontologo()">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    $(document).ready(function() {
        $('#tabla_odontologos').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            }
        });
    });

    function mostar_div_montos_tipo_convenio(select)
    {
        console.log('mostar_div_montos_tipo_convenio');
        var valor = $('#'+select).val();
        $('.div_fijo').hide();
        $('.div_variable').hide();
        console.log(valor);
        if(valor == 1)
        {
            $('.div_fijo').show();
            $('.div_variable').hide();
            $('#agregar_profesional_fijo').val(0);

        }
        else if(valor == 2)
        {
            $('.div_fijo').hide();
            $('.div_variable').show();
            $('#agregar_profesional_atencion').val(0);
            $('#agregar_profesional_confirmacion_agenda').val(0);
            $('#agregar_profesional_ggcc').val(0);
            $('#agregar_profesional_box').val(0);
        }
        else
        {
            $('#div_fijo').hide();
            $('#div_variable').hide();
        }
    }

    function agregar_odontologo() {
        $('#agregar_odontologo_modal').modal('show');
    }

    function guardar_odontologo() {
        // Validaciones básicas
        if(!$('#a_rut').val() || !$('#a_nombre').val() || !$('#a_apellido_uno').val()) {
            swal({
                title: "Campos requeridos",
                text: "Por favor complete todos los campos obligatorios (RUT, Nombre, Apellido Paterno)",
                icon: "warning",
                buttons: "Aceptar",
            });
            return;
        }

        if(!$('#a_lugar_atencion').val()) {
            swal({
                title: "Campos requeridos",
                text: "Por favor seleccione un lugar de atención",
                icon: "warning",
                buttons: "Aceptar",
            });
            return;
        }

        // Obtener datos del formulario
        let id_lugar_atencion = $('#a_lugar_atencion').val();
        let rut = $('#a_rut').val();
        let nombre = $('#a_nombre').val();
        let apellido_uno = $('#a_apellido_uno').val();
        let apellido_dos = $('#a_apellido_dos').val();
        let correo = $('#a_email').val();
        let telefono_uno = $('#a_telefono_uno').val();
        let direccion = $('#a_direccion').val();
        let numero = $('#a_numero').val();
        let ciudad = $('#a_ciudad').val();
        let region = $('#a_region').val();
        
        let profesion = $('#a_tipo_odontologo').val();
        let especialidad = 2; // Siempre 2 para odontología
        let sub_tipo_especialidad = ''; // No aplica para odontólogos
        
        let id_tipo_convenio_institucion = $('#agregar_profesional_id_tipo_convenio_institucion').val();
        let fijo = $('#agregar_profesional_fijo').val() || '';
        let atencion = $('#agregar_profesional_atencion').val() || '';
        let ventas = $('#agregar_profesional_ventas').val() || '';
        let confirmacion_agenda = $('#agregar_profesional_confirmacion_agenda').val() || '';
        let ggcc = $('#agregar_profesional_ggcc').val() || '';
        let box = $('#agregar_profesional_box').val() || '';

        let url = "{{ route('adm_cm.asociar_profesional_nuevo')}}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_lugar_atencion: id_lugar_atencion,
                rut: rut,
                nombre: nombre,
                apellido_uno: apellido_uno,
                apellido_dos: apellido_dos,
                correo: correo,
                telefono_uno: telefono_uno,
                direccion: direccion,
                numero: numero,
                ciudad: ciudad,
                region: region,
                profesion: profesion,
                especialidad: especialidad,
                sub_tipo_especialidad: sub_tipo_especialidad,
                id_tipo_convenio_institucion: id_tipo_convenio_institucion,
                fijo: fijo,
                atencion: atencion,
                ventas: ventas,
                confirmacion_agenda: confirmacion_agenda,
                ggcc: ggcc,
                box: box,
                observacion: '',
            },
        })
        .done(function(data) {
            if (data.estado == 1) {
                $('#agregar_odontologo_modal').modal('hide');
                swal({
                    title: "Odontólogo agregado correctamente",
                    text: "El profesional ha sido registrado exitosamente",
                    icon: "success",
                    buttons: "Aceptar",
                }).then(() => {
                    location.reload();
                });
            } else {
                swal({
                    title: "Error al agregar odontólogo",
                    text: data.mensaje || "No se pudo registrar el profesional",
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.error('Error:', jqXHR, ajaxOptions, thrownError);
            swal({
                title: "Error",
                text: "Error al guardar el odontólogo",
                icon: "error",
                buttons: "Aceptar",
            });
        });
    }

    function ver_odontologo(id) {
        let url = "{{ route('adm_cm.dame_profesional_cm') }}";

        $.ajax({
            url: url,
            type: "POST",
            data: { 
                id: id,
                _token: CSRF_TOKEN
            },
            success: function(data) {
                if(data.estado == 1) {
                    let profesional = data.profesional;
                    $('#v_rut').text(profesional.rut);
                    $('#v_nombre_completo').text(profesional.nombre + ' ' + profesional.apellido_uno + ' ' + profesional.apellido_dos);
                    
                    // Mostrar tipo de especialidad
                    let especialidad = 'Odontología';
                    if(profesional.tipo_especialidad) {
                        especialidad = profesional.tipo_especialidad.nombre;
                    }
                    if(profesional.sub_tipo_especialidad) {
                        especialidad += ' - ' + profesional.sub_tipo_especialidad.nombre;
                    }
                    $('#v_especialidad').text(especialidad);
                    
                    $('#v_email').text(profesional.email || 'N/A');
                    $('#v_telefono').text(profesional.telefono_uno || 'N/A');
                    
                    // Mostrar lugar de atención
                    let lugar = 'N/A';
                    if(profesional.lugar_atencion) {
                        lugar = profesional.lugar_atencion;
                    } else if(data.lugares_atencion && data.lugares_atencion.length > 0) {
                        lugar = data.lugares_atencion[0].nombre;
                    }
                    $('#v_lugar_atencion').text(lugar);
                    
                    $('#ver_odontologo_modal').modal('show');
                } else {
                    swal({
                        title: "Error",
                        text: "No se pudo obtener la información del odontólogo",
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los detalles:', error);
                swal({
                    title: "Error",
                    text: "Error al cargar los datos del odontólogo",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

      function editar_odontologo(id) {
        let url = "{{ route('adm_cm.dame_profesional_cm') }}";

        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
                _token: CSRF_TOKEN
            },
            success: function(data) {
                console.log(data);
                if(data.estado == 1) {
                    let profesional = data.profesional;
                    $('#e_id').val(profesional.id);
                    $('#e_rut').val(profesional.rut);
                    $('#e_nombre').val(profesional.nombre);
                    $('#e_apellido_uno').val(profesional.apellido_uno);
                    $('#e_apellido_dos').val(profesional.apellido_dos);
                    $('#e_sexo').val(profesional.sexo);
                    $('#e_fecha_nacimiento').val(profesional.fecha_nacimiento);
                    $('#e_email').val(profesional.email);
                    $('#e_telefono_uno').val(profesional.telefono_uno);
                    $('#e_telefono_dos').val(profesional.telefono_dos || '');

                    // Cargar dirección si existe
                    if(data.profesional.direccion) {
                        $('#e_direccion').val(data.profesional.direccion.direccion || '');
                        $('#e_numero').val(data.profesional.direccion.numero_dir || '');

                        $('#e_region').val(data.profesional.direccion.ciudad.id_region || '');
                        buscar_ciudad_region(data.profesional.direccion.ciudad.id);
                        $('#e_ciudad').val(data.profesional.direccion.ciudad.id || '');
                    }

                    // Cargar la especialidad si existe el select
                    if(profesional.id_tipo_especialidad) {
                        $('#e_especialidad').val(profesional.id_tipo_especialidad);
                    }

                    // Cargar el lugar de atención del contrato
                    if(data.contrato && data.contrato.id_lugar_atencion) {
                        $('#e_lugar_atencion').val(data.contrato.id_lugar_atencion);
                    }

                    $('#e_estado').val(profesional.estado);
                    $('#editar_odontologo_modal').modal('show');
                } else {
                    swal({
                        title: "Error",
                        text: "No se pudo obtener la información del odontólogo",
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los detalles:', error);
                swal({
                    title: "Error",
                    text: "Error al cargar los datos del odontólogo",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function buscar_ciudad_region(id_ciudad = 0) {

        let region = $('#e_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#e_ciudad');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function actualizar_odontologo() {
        // Validaciones básicas
        if(!$('#e_rut').val() || !$('#e_nombre').val() || !$('#e_apellido_uno').val()) {
            swal({
                title: "Campos requeridos",
                text: "Por favor complete todos los campos obligatorios",
                icon: "warning",
                buttons: "Aceptar",
            });
            return;
        }

        let url = "{{ route('adm_cm.editar_profesional') }}";

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id_prof: $('#e_id').val(),
                rut: $('#e_rut').val(),
                nombre: $('#e_nombre').val(),
                apellido1: $('#e_apellido_uno').val(),
                apellido2: $('#e_apellido_dos').val(),
                sexo: $('#e_sexo').val(),
                fecha_nacimiento: $('#e_fecha_nacimiento').val(),
                email: $('#e_email').val(),
                telefono1: $('#e_telefono_uno').val(),
                telefono2: $('#e_telefono_dos').val(),
                direccion: $('#e_direccion').val(),
                numero: $('#e_numero').val(),
                ciudad: $('#e_ciudad').val(),
                region: $('#e_region').val(),
                especialidad: $('#e_especialidad').val(),
                id_lugar_atencion: $('#e_lugar_atencion').val(),
                estado: $('#e_estado').val()
            },
            success: function(data) {
                console.log(data);
                if(data.estado == 1) {
                    $('#editar_odontologo_modal').modal('hide');
                    swal({
                        title: "Éxito",
                        text: "Odontólogo actualizado correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal({
                        title: "Error",
                        text: data.mensaje || "Error al actualizar el odontólogo",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "Error al actualizar el odontólogo",
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        });
    }

     function buscar_ciudad_profesional(id_ciudad = 0) {

        let region = $('#a_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#a_ciudad');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });



    };

    function buscar_ciudad_profesional_editar(id_ciudad = 0) {

        let region = $('#e_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#e_ciudad');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });



    }

    function eliminar_odontologo(id) {
        swal({
            title: "Eliminar Odontólogo",
            text: "¿Está seguro que desea eliminar este odontólogo?",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                let url = "#";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        id: id,
                        _token: CSRF_TOKEN
                    },
                    success: function(data) {
                        if(data.estado == 1) {
                            swal({
                                title: "Éxito",
                                text: "Odontólogo eliminado correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: data.mensaje || "Error al eliminar el odontólogo",
                                icon: "error",
                                buttons: "Aceptar",
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        swal({
                            title: "Error",
                            text: "Error al eliminar el odontólogo",
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
