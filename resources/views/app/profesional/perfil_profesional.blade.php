@extends('template.profesional.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Editar Perfil</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home">
                                    </i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Editar Perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-profile user-card mb-4">
            <div class="card-body py-0">
                <div class="user-about-block m-0">
                    <div class="row">
                        <div class="col-md-12 text-center mt-n4">
                            <div class="change-profile text-center">
                                <div class="dropdown w-auto d-inline-block">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profile-dp">
                                            <div class="position-relative d-inline-block">
                                                <img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="User image">
                                            </div>
                                            <div class="overlay">
                                                <span>Actualizar</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil</a>
                                        <a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-md-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab" data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal" aria-selected="true"><i class="feather icon-user mr-2"></i>Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="academico-tab" data-toggle="tab" href="#info_academico" role="tab" aria-controls="info_academico" aria-selected="false"><i class="feather icon-lock mr-2"></i>Mi Perfil Académico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false"><i class="feather icon-lock mr-2"></i>Cambiar Contraseña</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="liquidacion-tab" data-toggle="tab" href="#info_liquidacion" role="tab" aria-controls="info_liquidacion" aria-selected="false"><i class="feather icon-lock mr-2"></i>Manejo de Liquidaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="myTabContent">

                    <!--Tab Información Personal-->
                    <div class="tab-pane fade show active" id="info_personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <!--Card Información Básica-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Datos Personales</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Datos Personales-->
                                    <div class="card-body border-top info_basica collapse show" id="info_basica-1">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Rut</label>
                                            <div class="col-sm-7 my-auto ml-2 font-weight-bolder"> {{ $profesional->rut }} </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nombres</label>
                                            <div class="col-sm-7 my-auto ml-2 font-weight-bolder"> {{ $profesional->nombre }} </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Primer Apellido</label>
                                            <div class="col-sm-7 my-auto ml-2 font-weight-bolder"> {{ $profesional->apellido_uno }} </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Segundo Apellido</label>
                                            <div class="col-sm-7 my-auto ml-2 font-weight-bolder"> {{ $profesional->apellido_dos }} </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Sexo</label>
                                            <div class="col-sm-7 my-auto ml-2 font-weight-bolder">
                                                @if ($profesional->sexo == 'M')
                                                    Masculino
                                                @elseif ($profesional->sexo == 'F')
                                                    Femenino
                                                @else
                                                    Otro
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Especialidad</label>
                                            <div class="col-sm-7 my-auto ml-2 font-weight-bolder"> {{ $profesional->Especialidad()->first()->nombre }} </div>
                                        </div>

                                    </div>
                                    <!--Cierre: Datos Personales-->
                                    <!--(Editar)Datos Personales-->
                                    <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Rut" value="{{ $profesional->rut }}" name="editar_rut" value="editar_rut">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombres</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Nombre" value="{{ $profesional->nombre }}" name="editar_nombres" id="editar_nombres">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Primer Apellido" value="{{ $profesional->apellido_uno }}" name="editar_apellido_uno" id="editar_apellido_uno">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Segundo Apellido" value="{{ $profesional->apellido_dos }}" name="editar_apellido_dos" id="editar_apellido_dos">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="editar_sexo" name="editar_sexo">
                                                        <option>Seleccione su Sexo</option>
                                                        <option value="M" @if ($profesional->sexo == 'M') selected @endif>Masculino
                                                        </option>
                                                        <option value="F" @if ($profesional->sexo == 'F') selected @endif>Femenino
                                                        </option>
                                                        <option value="O" @if ($profesional->sexo == 'O') selected @endif>Otro
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Seleccione su Profesión</option>
                                                        <option selected>Médico Cirujano</option>
                                                        <option>Cirujano Dentista</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="editar_especialidad" name="editar_especialidad">
                                                        <option>Seleccione su Especialidad</option>
                                                        @foreach ($especialidades as $especialidad)
                                                        @if ($especialidad->id == $profesional->id_especialidad)
                                                        <option value="{{ $especialidad->id }}" selected>
                                                            {{ $especialidad->nombre }}
                                                        </option>
                                                        @else
                                                        <option value="{{ $especialidad->id }}">
                                                            {{ $especialidad->nombre }}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Sub-Especialidad</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="editar_especialidad" name="editar_especialidad">
                                                        <option>Seleccione su Especialidad</option>
                                                        @foreach ($especialidades as $especialidad)
                                                        @if ($especialidad->id == $profesional->id_especialidad)
                                                        <option value="{{ $especialidad->id }}" selected>
                                                            {{ $especialidad->nombre }}
                                                        </option>
                                                        @else
                                                        <option value="{{ $especialidad->id }}">
                                                            {{ $especialidad->nombre }}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Atención</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Seleccione Preferencia Atención</option>
                                                        <option>Niños</option>
                                                        <option>Adultos</option>
                                                        <option>Adultos / Niños</option>
                                                        <option>Atención Domiciliaria</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_profesional_datos_personales({{ $profesional->id }});" class="btn btn-info">Guardar Cambios </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Datos Personales-->
                                </div>
                                <!--Cierre: Card Datos Personales-->
                            </div>
                            <div class="col-md-6">
                                <!--Card Contacto-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Contacto</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Contacto-->
                                    <div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $profesional->email }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $profesional->telefono_uno }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contacto-->
                                    <!--(Editar) Contacto-->
                                    <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Correo Electrónico" value="{{ $profesional->email }}" id="editar_email" name="editar_email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Teléfono" value="{{ $profesional->telefono_uno }}" name="editar_telefono_uno" id="editar_telefono_uno">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_datos_contacto_profesional();" class="btn btn-info">
                                                        Guardar Cambios
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--(Editar) Contacto-->
                                </div>
                                <!--Cierre: Card Contacto-->
                                <!--Card Residencia-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Residencia</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Residencia-->
                                    <div class="card-body border-top info_residencial collapse show" id="info_residencial_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $profesional->Direccion()->first()->Ciudad()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $profesional->Direccion()->first()->direccion . ' ' . $profesional->Direccion()->first()->numero_dir }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Residencia-->
                                    <!--(Editar) Residencia-->
                                    <div class="card-body border-top info_residencial collapse" id="info_residencial_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" onchange="buscar_ciudad_perfil();" id="perfil_region" name="perfil_region">
                                                        <option value="">Seleccione una Región</option>
                                                        @if (isset($regiones))
                                                            @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}" @if ($region->id ==
                                                                $profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                {{ $region->nombre }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                        <option value="">Seleccione su comuna</option>
                                                        @if (isset($ciudades))
                                                            @foreach ($ciudades as $ciudad)
                                                            <option value="{{ $ciudad->id }}" @if ($profesional->Direccion()->first()->id_ciudad) selected @endif>
                                                                {{ $ciudad->nombre }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{ $profesional->Direccion()->first()->direccion }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">N&uacute;mero#</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{ $profesional->Direccion()->first()->numero_dir }}">
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Comuna</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>Seleccione su comuna</option>

                                                            @foreach ($ciudades as $ciudad)
                                                                @if ($profesional->Direccion()->first()->id_ciudad == $ciudad->id)
                                                                    <option value="{{ $ciudad->id }}" selected>
                                                                        {{ $ciudad->nombre }}</option>
                                                                @else
                                                                    <option value="{{ $ciudad->id }}">
                                                                        {{ $ciudad->nombre }}</option>
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" placeholder="Dirección"
                                                            value="{{ $profesional->Direccion()->first()->direccion . ' #' . $profesional->Direccion()->first()->numero_dir }} ">
                                                    </div>
                                                </div> -->
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" class="btn btn-info" onclick="editar_datos_residencia_profesional()">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--(Editar) Residencia-->
                                </div>
                                <!--Cierre: Card Residencia-->
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab Información Personal-->

                    <!--Tab Cambiar Contraseña-->
                    <div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
                        @include('app.general.perfil.cambio_contrasena')
                    </div>

                    <!--Tab perfil profesional-->
                    <div class="tab-pane fade" id="info_academico" role="tabpanel" aria-labelledby="academico-tab">
                        {{-- formulario para agregar  --}}
                        <div class="row">
                            <div class="col-md-12">
                                <!--Card profesion-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Agregar Antecedentes Académicos</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".agregar_academico" aria-expanded="false" aria-controls="agregar_academico">
                                            <i class="feather icon-plus"></i>
                                        </button>
                                    </div>
                                    <!--(agregar)profesion-->
                                    @if($perfil_academico == NULL)
                                    <div class="card-body border-top collapse show agregar_academico" id="agregar">
                                    @else
                                    <div class="card-body border-top collapse agregar_academico" id="agregar">
                                    @endif
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Antecedente Académico</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                                    <option value="0">Seleccionar</option>
                                                    @foreach($tipo_ant_academico as $key_t_ant_acade => $value_t_ant_acade)
                                                        <option value="{{ $value_t_ant_acade->id }}">{{ $value_t_ant_acade->nombre }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Profesión" id="agregar_ant_academico_profesion" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Universidad</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Universidad de Titulo" id="agregar_ant_academico_universidad" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Año de Titulo</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Año de Titulo" id="agregar_ant_academico_anio" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Ciudad y País</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Ciudad y País" id="agregar_ant_academico_ciudad_pais" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">N° SUPERSALUD</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="N° SUPERSALUD" id="agregar_ant_academico_supersalud" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">N° Colegio Profesional</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="N° Colegio Profesional" id="agregar_ant_academico_numero_colegio" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label"></label>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button class="btn btn-info" onclick="agregar_registro_academico();">Guardar Cambios</button>
                                            </div>
                                        </div>
                                    </div>
                                        <!--Cierre: (Editar)profesion-->
                                </div>
                            </div>
                            <div class="row">
                                @if($perfil_academico != NULL)
                                    @foreach($perfil_academico as $key_academico => $value_academico)
                                        {{-- CAJA DE REGISTRO ACADEMICO  --}}
                                        <div class="col-md-6">
                                            <!--Card profesion-->
                                            <div class="card">
                                                <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                    <h5 class="mb-0 text-white">{{ $value_academico->TipoAntecedenteAcademico->nombre }}</h5>
                                                    <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".u_personal_{{ $value_academico->id }}" aria-expanded="false" aria-controls="u_personal_{{ $value_academico->id }}_1 u_personal_{{ $value_academico->id }}_2">
                                                        <i class="feather icon-edit"></i>
                                                    </button>
                                                </div>
                                                <!--profesion-->
                                                <div class="card-body border-top u_personal_{{ $value_academico->id }} collapse show" id="u_personal_{{ $value_academico->id }}_1">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label class="col-sm-5 col-form-label">Profesion</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->nombre }}</div>
                                                            <label class="col-sm-5 col-form-label">Universidad</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->universidad }}</div>
                                                            <label class="col-sm-5 col-form-label">Año de Titulo</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->anio }}</div>
                                                            <label class="col-sm-5 col-form-label">Ciudad y País</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->ciudad_pais }}</div>
                                                            <label class="col-sm-5 col-form-label">N° SUPERSALUD</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->supersalud }}</div>
                                                            <label class="col-sm-5 col-form-label">N° Colegio Profesional</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->numero_colegio }}</div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <!--Cierre: profesion->                                                                                                                                                                                                                                                                                                                                     <!--(Editar)profesion-->
                                                <div class="card-body border-top u_personal_{{ $value_academico->id }} collapse" id="u_personal_{{ $value_academico->id }}_2">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Profesión" id="{{ $value_academico->id }}_profesion" value="{{ $value_academico->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Universidad</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Universidad de Titulo" id="{{ $value_academico->id }}_universidad" value="{{ $value_academico->universidad }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Año de Titulo</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Año de Titulo" id="{{ $value_academico->id }}_anio" value="{{ $value_academico->anio }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Ciudad y País</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Ciudad y País" id="{{ $value_academico->id }}_ciudad_pais" value="{{ $value_academico->ciudad_pais }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">N° SUPERSALUD</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="N° SUPERSALUD" id="{{ $value_academico->id }}_supersalud" value="{{ $value_academico->supersalud }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">N° Colegio Profesional</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="N° Colegio Profesional" id="{{ $value_academico->id }}_numero_colegio" value="{{ $value_academico->numero_colegio }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <div data-toggle="collapse" data-target=".u_personal_{{ $value_academico->id }}" aria-expanded="false" aria-controls="u_personal_{{ $value_academico->id }}_1 u_personal_{{ $value_academico->id }}_2" class="btn btn-danger mr-2">Cancelar</div>
                                                            <button class="btn btn-info" onclick="modificar_registro_academico('{{ $value_academico->id }}');">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Cierre: (Editar)profesion-->
                                            </div>
                                            <!--Cierre: Card profesion-->
                                        </div>
                                    @endforeach
                                @endif


                            </div>

                        </div>
                    </div>


                    @include('general.seccion_perfil.seccion_liquidacion')

                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
    @endsection
