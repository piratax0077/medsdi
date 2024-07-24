@extends('template.adm_cm.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Configurar Mi Institución</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Configuración</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion->id }}">
        <input type="hidden" name="tipo_institucion" id="tipo_institucion" value="{{ $tipo_institucion }}">


        <div class="user-profile user-card mb-4">
            <div class="card-body py-0">
                <div class="user-about-block m-0">
                    <div class="row">
                        <div class="col-md-12 text-center mt-n3">
                            <div class="change-profile text-center">
                                <div class="dropdown w-auto d-inline-block">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profile-dp">
                                            <div class="position-relative d-inline-block">
                                                <img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/cm-perfiles.png') }}"> alt="User image">
                                            </div>
                                            <div class="overlay">
                                                <span>Actualizar</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"><i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil</a>
                                        <a class="dropdown-item"><i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <!-- tab general -->
                            <div class="user-profile user-card pt-0">
                                <div class="card-body py-0">
                                    <div class="user-about-block m-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link text-reset active" id="p-cm-tab" data-toggle="tab" href="#p-cm" role="tab" aria-controls="p-cm" aria-selected="false"><i class="feather icon-home mr-2"></i>Perfil de la Institución</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link text-reset " id="p-adm-tab" data-toggle="tab" href="#p-adm" role="tab" aria-controls="p-adm" aria-selected="true"><i class="feather icon-user mr-2"></i>Perfil administrador</a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a class="nav-link text-reset" id="rol-permiso-tab" data-toggle="tab" href="#rol-permiso" role="tab" aria-controls="rol-permiso" aria-selected="false"><i class="feather  icon-lock mr-2"></i>Asignar Usuario y Clave</a>
                                                    </li> --}}
                                                    <li class="nav-item">
                                                        <a class="nav-link text-reset" id="ar-dep-tab" data-toggle="tab" href="#ar-dep" role="tab" aria-controls="ar-dep" aria-selected="false"><i class="fa-solid fa-stethoscope mr-2"></i>Especialidades y áreas</a>
                                                    </li>
                                                    @if($institucion->sucursales == 1)
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset" id="sucursales-tab" data-toggle="tab" href="#sucursales" role="tab" aria-controls="sucursales" aria-selected="false"><i class="feather icon-home mr-2"></i>Sucursales</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="myTabContent">

                    <!--PERFIL CENTRO MEDICO-->
                    <div class="tab-pane fade show active" id="p-cm" role="tabpanel" aria-labelledby="p-cm-tab">
                        <div class="row mb-3 mt-0">
                            <div class="col-sm-12 col-md-12">
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <h4 class="f-18 mb-0 text-info">Perfil de la Institución</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!--Datos del centro médico-->
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Datos de la Institución</h5>
                                        <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Datos Personales-->
                                    <div class="card-body info_basica collapse show" id="info_basica-1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_rut">{{ $institucion->rut }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Razón social</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_razon_social">{{ $institucion->razon_social }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombre Fantasia</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_nombre">{{$institucion->nombre  }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nº de inscripción SuperSalud</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_certificado_supersalud">{{ $institucion->certificado_supersalud }}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Datos Personales-->
                                    <!--(Editar)Datos Personales-->
                                    <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Rut" id="editar_rut" value="{{ $institucion->rut }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Razón Social</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Razón Social" id="editar_razon_social" value="{{ $institucion->razon_social }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombre Fantasia</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="editar_nombre" value="{{$institucion->nombre  }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nº de inscripción SuperSalud</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Nº de inscripción" id="editar_certificado_supersalud" value="{{ $institucion->certificado_supersalud }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">Cancelar</button>
                                                    <button type="button" class="btn btn-sm btn-info" onclick="editar_datos_institucion();">Guardar cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Datos Personales-->
                                </div>
                                <!--Cierre: Datos del centro médico-->
                            </div>
                            <div class="col-md-6">

                                <!--Contacto-->
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Datos de Contacto</h5>
                                        <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Contacto-->
                                    <div class="card-body info_contacto collapse show" id="info_contacto_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_email" >{{ $institucion->email }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_telefono" >{{ $institucion->telefono }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Whatsapp</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_whatsapp" >{{ $institucion->whatsapp }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Sitio web</label>
                                                <div class="col-sm-7 my-auto ml-2" id="ver_sitio_web" >{{ $institucion->sitio_web }}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contacto-->
                                    <!--(Editar) Contacto-->
                                    <div class="card-body info_contacto collapse" id="info_contacto_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Correo electrónico</label>
                                                <div class="col-sm-7 font-weight-bolder">
                                                    <input type="text" class="form-control form-control-sm" id="editar_email" placeholder="Correo electrónico" value="{{ $institucion->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Teléfono</label>
                                                <div class="col-sm-7 font-weight-bolder">
                                                    <input type="text" class="form-control form-control-sm" id="editar_telefono" placeholder="Teléfono" value="{{ $institucion->telefono }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Whatsapp</label>
                                                <div class="col-sm-7 font-weight-bolder">
                                                    <input type="text" class="form-control form-control-sm" id="editar_whatsapp" placeholder="Whatsapp" value="{{ $institucion->whatsapp }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Sitio web</label>
                                                <div class="col-sm-7 font-weight-bolder">
                                                    <input type="text" class="form-control form-control-sm" id="editar_sitio_web" placeholder="Sitio web" value="{{ $institucion->sitio_web }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                    <button type="button" class="btn btn-sm btn-info" onclick="editar_contacto_institucion();">Guardar cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--(Editar) Contacto-->
                                </div>
                                <!--Cierre: Card Contacto-->

                                <!--Ubicación-->
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Ubicación (casa matriz)</h5>
                                        <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>

                                    <!--Ubicación-->
                                    <div class="card-body info_residencial collapse show" id="info_residencial_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $institucion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $institucion->Direccion()->first()->Ciudad()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $institucion->Direccion()->first()->direccion . ' ' . $institucion->Direccion()->first()->numero_dir }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Sucursales</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    @if($institucion->sucursales == 1)
                                                        Si Registra Sucursales
                                                    @else
                                                        No Registra Sucursales
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Ubicación-->
                                    <!--(Editar) Ubicación-->
                                    <div class="card-body info_residencial collapse " id="info_residencial_2">
                                        <form>

                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" onchange="buscar_ciudad();" id="editar_region" name="editar_region">
                                                        <option value="">Seleccione una Región</option>
                                                        @if (isset($regiones))
                                                            @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}" @if ($region->id ==
                                                                $institucion->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                {{ $region->nombre }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="editar_ciudad" name="editar_ciudad">
                                                        <option value="">Seleccione su comuna</option>
                                                        @if (isset($ciudades))
                                                            @foreach ($ciudades as $ciudad)
                                                            @if ($institucion->Direccion()->first()->id_ciudad ==  $ciudad->id)
                                                                <option value="{{ $ciudad->id }}" selected>
                                                            @else
                                                                <option value="{{ $ciudad->id }}" >
                                                            @endif

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
                                                    <input type="text" class="form-control" placeholder="Dirección" name="editar_direccion" id="editar_direccion" value="{{ $institucion->Direccion()->first()->direccion }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Oficina</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="n&uacute;mero #" name="editar_numero_dir" id="editar_numero_dir" value="{{ $institucion->Direccion()->first()->numero_dir }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Sucursal</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            @if($institucion->sucursales == 1)
                                                                <input type="checkbox" id="editar_sucursal" checked="checked">
                                                            @else
                                                                <input type="checkbox" id="editar_sucursal">
                                                            @endif
                                                            <label for="editar_sucursal" class="cr"></label>
                                                            <label>SI</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                    <button type="button" class="btn btn-sm btn-info" onclick="editar_direccion_institucion();">Guardar cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--(Editar) Ubicación-->
                                </div>
                                <!--Cierre: Ubicación-->
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: PERFIL CENTRO MEDICO-->

                    <!--PERFIL ADMINISTRADOR-->
                    <div class="tab-pane fade" id="p-adm" role="tabpanel" aria-labelledby="p-adm-tab">
                        <div class="row mb-3 mt-0">
                            <div class="col-sm-12 col-md-12">
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <h4 class="f-18 mb-0 text-info">Perfil administrador de la Institución</h4>
                                        <input type="hidden" name="id_responsable" id="id_responsable" value="{{ $responsable->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $responsable->rut }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $responsable->nombres }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                    Apellido</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $responsable->apellido_uno }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                    Apellido</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $responsable->apellido_dos }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    @if ($responsable->sexo == 'F')
                                                        Mujer
                                                    @elseif ($responsable->sexo == 'M')
                                                        Hombre
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ \Carbon\Carbon::parse($responsable->fecha_nac)->format('d-m-Y') }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Datos Personales-->
                                    <!--(Editar)Datos Personales-->
                                    <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Rut" id="perfil_rut" name="perfil_rut" value="{{ $responsable->rut }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre" name="perfil_nombre" value="{{ $responsable->nombres }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="perfil_apellido_uno" name="perfil_apellido_uno" placeholder="Primer Apellido" value="{{ $responsable->apellido_uno }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="perfil_apellido_dos" name="perfil_apellido_dos" placeholder="Segundo Apellido" value="{{ $responsable->apellido_dos }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                <div class="col-sm-7 my-auto">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" id="inlineRadio2" value="F" @if ($responsable->sexo == 'F') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" id="inlineRadio1" value="M" @if ($responsable->sexo == 'M') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control" id="perfil_nac" name="perfil_nac" value="{{ $responsable->fecha_nac }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_responsable_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Datos Personales-->
                                </div>
                                <!--Cierre: Card Datos Personales-->

                                <!--Contraseña-->
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                        <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Contraseña-->
                                    <div class="card-body pass_personal collapse show" id="pass_personal_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contraseña-->
                                    <!--(Editar)Contraseña-->
                                    <div class="card-body pass_personal collapse" id="pass_personal_2">
                                        <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                            <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual" placeholder="Contraseña Actual">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva" placeholder="Nueva Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion" placeholder="Repita la Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Contraseña-->
                                </div>
                                <!--Cierre:Contraseña-->
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
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                    Electrónico</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $responsable->email }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-6 my-auto ml-2">{{ $responsable->telefono_uno }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-6 my-auto ml-2">{{ $responsable->telefono_dos }}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contacto-->
                                    <!--(Editar) Contacto-->
                                    <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{ $responsable->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{ $responsable->telefono_uno }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{ $responsable->telefono_dos }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_responsable_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
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
                                                    {{ $responsable->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $responsable->Direccion()->first()->Ciudad()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $responsable->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Residencia-->
                                    <!--(Editar) Residencia-->
                                    <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                        <option value="">Seleccione una Región</option>
                                                        @if (isset($regiones))
                                                            @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}" @if ($region->id ==
                                                                $responsable->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
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
                                                            <option value="{{ $ciudad->id }}" @if ($responsable->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
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
                                                    <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{ $responsable->Direccion()->first()->direccion }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{ $responsable->Direccion()->first()->numero_dir }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_responsable_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
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
                    <!--CIERRE: PERFIL ADMINISTRADOR-->

                    <!--ADMINISTRADOR DE ROLES Y PERMISOS-->
                    <div class="tab-pane fade" id="rol-permiso" role="tabpanel" aria-labelledby="rol-permiso-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Contraseña-->
                                <div class="card">
                                    <div class="card-header pt-3 pb-2 bg-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="f-18 d-inline mt-3 text-info">Asignar y Desasociar Personal de La Institución</h6>
                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                    <button type="button" class="btn btn-sm btn-info" onclick="añadir_rol();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir Rol y Usuario</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-12">



                                                <table id="adm_roles" class="display table table-striped table-xs dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap text-left align-middle">Nombre</th>
                                                            <th class="text-wrap text-left align-middle">Rut</th>
															<th class="text-wrap text-left align-middle">Rol</th>
															<th class="text-wrap text-center align-middle">desasociar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @if($personal)
                                                            @foreach($personal as $per)
                                                                <tr>
                                                                    <td class="text-wrap text-left align-middle">{{ $per->nombres . ' ' . $per->apellido_uno . ' ' . $per->apellido_dos }}</td>
                                                                    <td class="text-wrap text-left align-middle">{{ $per->rut }}</td>
                                                                    @if($per->AsistenteTipo)
                                                                        <td class="align-middle text-left"><strong>{{ $per->AsistenteTipo->nombre }}</strong></td>
                                                                        <td class="text-wrap text-center align-middle">
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="anadir_permisos('{{ $per->AsistenteTipo->nombre }}', {{ $per->AsistenteTipo->id }},{{ $per->id }});" data-toggle="tooltip" data-placement="top" title="Permisos"><i class="feather icon-settings"></i></button>
                                                                        </td>
                                                                    @else
                                                                        <td class="align-middle text-left"><strong>{{ $per->TipoAdministrador->nombre }}</strong></td>
                                                                        <td class="text-wrap text-center align-middle">
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="anadir_permisos('{{ $per->TipoAdministrador->nombre }}', {{ $per->TipoAdministrador->id }},{{ $per->id }});" data-toggle="tooltip" data-placement="top" title="Permisos"><i class="feather icon-settings"></i></button>
                                                                        </td>
                                                                    @endif
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
                    <!--CIERRE: ADMINISTRADOR DE ROLES Y PERMISOS-->

                    <!--ESPECIALIDADES Y ÁREAS-->
                    <div class="tab-pane fade" id="ar-dep" role="tabpanel" aria-labelledby="ar-dep-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <!--Especialidades-->
                                <div class="card">
                                    <div class="card-header pt-3 pb-2 bg-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="f-18 d-inline mt-3 text-info">Especialidades Médicas</h6>
                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                    <button type="button" class="btn btn-sm btn-info" onclick="ag_especialidad();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-12">
                                                <table id="especialidades_cm" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap text-center align-middle">Especialidad</th>
                                                            <th class="text-wrap text-center align-middle">N° Profesionales</th>
                                                            <th class="text-wrap text-center align-middle">Acción</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(isset($especialidades_cm))
                                                        @foreach($especialidades_cm as $especialidad)
                                                        <tr>
                                                            <td class="align-middle text-center">{{ $especialidad->nombre }}</td>
                                                            <td class="align-middle text-center">5</td>
                                                            <td class="align-middle text-center">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="esp-{{ $especialidad->id }}">
                                                                    <label class="custom-control-label" for="esp-{{ $especialidad->id }}"></label>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm({{ $especialidad->id }});"><i class="feather icon-trash"></i></button>
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
                            <div class="col-md-4">
                                <!--Especialidades-->
                                <div class="card">
                                    <div class="card-header pt-3 pb-2 bg-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="f-18 d-inline mt-3 text-info">Otros Profesionales</h6>
                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                    <button type="button" class="btn btn-sm btn-info" onclick="ag_otra_especialidad();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-12">
                                                <table id="otros_profesionales_cm" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap text-center align-middle">Especialidad</th>
                                                            <th class="text-wrap text-center align-middle">N° Profesionales</th>
                                                            <th class="text-wrap text-center align-middle">Acción</th>
                                                            <th class="text-wrap"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(isset($otras_especialidades_cm))
                                                            @foreach($otras_especialidades_cm as $especialidad)
                                                            <tr>
                                                                <td class="align-middle text-center">{{ $especialidad->nombre }}</td>
                                                                <td class="align-middle text-center">5</td>
                                                                <td class="align-middle text-center">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="esp-{{ $especialidad->id }}">
                                                                        <label class="custom-control-label" for="esp-{{ $especialidad->id }}"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm({{ $especialidad->id }});"><i class="feather icon-trash"></i></button>
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
                            <div class="col-md-4">
                                <!--Área-->
                                <div class="card">
                                    <div class="card-header pt-3 pb-2 bg-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="f-18 d-inline mt-3 text-info">Áreas</h6>
                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                    <button type="button" class="btn btn-sm btn-info" onclick="ag_area();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-12">
                                                <table id="area_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap text-left align-middle">Área</th>
                                                            <th class="text-wrap text-left align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-left">Admin. Médica</td>
                                                            <td class="align-middle text-left">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="area-1">
                                                                    <label class="custom-control-label" for="area-1"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-left">Admin. comercial</td>
                                                            <td class="align-middle text-left">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="area-2">
                                                                    <label class="custom-control-label" for="area-2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-left">boxes y Consultas</td>
                                                            <td class="align-middle text-left">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="area-3">
                                                                    <label class="custom-control-label" for="area-3"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-left">Asistentes</td>
                                                            <td class="align-middle text-left">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="area-4">
                                                                    <label class="custom-control-label" for="area-4"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-left">Mantención y Limpieza</td>
                                                            <td class="align-middle text-left">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="area-5">
                                                                    <label class="custom-control-label" for="area-5"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-left">Farmacia y Bodega</td>
                                                            <td class="align-middle text-left">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="area-6">
                                                                    <label class="custom-control-label" for="area-6"></label>
                                                                </div>
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

                    <!--SUCURSALES-->
                    <div class="tab-pane fade" id="sucursales" role="tabpanel" aria-labelledby="sucursales-tab">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header pt-3 pb-2 bg-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="f-18 d-inline mt-3 text-info">Sucursales</h6>
                                                <div class="btn-group mb-2 mr-2 float-right">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="ag_sucursal();"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Añadir nueva</button>
                                                    <button type="button" class="btn btn-outline-info  btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" type="button" class="btn  btn-primary" data-toggle="modal" data-target="#modal_agregar_lugar_existente">Desasociar o agregar<br> lugar de atención <br>existente</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="sucursales_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Identificación</th>
                                                    <th class="text-center align-middle">Dirección</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center"><strong>CEMICAL (CASA MATRIZ)</strong><br>00.000.000-0</td>
                                                    <td class="align-middle text-center">
                                                        <span>Arlegui, 23</span><br>
                                                        <span>Viña del Mar</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>contacto@correo.cl</span><br>
                                                        <span>2178218</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ed_sucursal();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="asis_sucursal();" data-toggle="tooltip" data-placement="top" title="Asistentes"><i class="feather icon-user"></i></button>
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="hor_sucursal();" data-toggle="tooltip" data-placement="top" title="Horario de sucursal"><i class="feather icon-watch"></i></button>
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
    </div>
</div>

    {{--  MODALES CONFIGURACION  --}}

    {{--  MODAL  SUCURSAL  --}}
    {{--  <div id="a_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir nueva sucursal</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Región</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo electrónico</label>
                                    <input class="form-control form-control-sm" name="email" id="email" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono</label>
                                    <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono (opcional)</label>
                                    <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="not_pacientes_1">
                                        <label for="not_pacientes_1" class="cr"></label>
                                        <label>Notificar a pacientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm mx-auto">Añadir nueva sucursal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

     {{--  <div id="e_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="e_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar sucursal ( Nombre de sucursal)
                        <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Región</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo electrónico</label>
                                    <input class="form-control form-control-sm" name="email" id="email" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono</label>
                                    <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono (opcional)</label>
                                    <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="not_pacientes_1">
                                        <label for="not_pacientes_1" class="cr"></label>
                                        <label>Notificar a pacientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>  --}}

    {{--  <div id="asistentes_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asistentes_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Asistentes de ( Nombre de sucursal)
                        <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Ingrese Rut de el o la asistente que desea asociar a su lugar de atención</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Rut" aria-label="Rut" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-info btn-sm" type="button" id="button-addon2">Asociar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <!--TABLA RESPONSIVA HACIA ABAJO-->
                                <table id="res-config" class="display table table-striped dt-responsive nowrap text-center table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="habdes_1">
                                                    <label class="custom-control-label" for="habdes_1"></label>
                                                </div>
                                            </td>
                                            <td>00.000.000-0</td>
                                            <td>Pepita Sanchez Díaz</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

    {{--  <div id="horario_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Horario de ( Nombre de sucursal)
                        <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="text-c-blue">Horario de atención</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group fill">
                                    <label class="floating-label">Día</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Lunes a viernes</option>
                                        <option>Sabado y domingos</option>
                                        <option>Lunes</option>
                                        <option>Martes</option>
                                        <option>Miércoles</option>
                                        <option>Jueves</option>
                                        <option>Viernes</option>
                                        <option>Sábado</option>
                                        <option>Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group fill">
                                    <label class="floating-label">Desde</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Cargar horas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group fill">
                                    <label class="floating-label">Hasta</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Cargar horas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button type="button" class="btn btn-info btn-sm btn-block">Añadir horario</button></td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <!--TABLA RESPONSIVA HACIA ABAJO-->
                                <table id="res-config" class="display table table-striped dt-responsive nowrap table-xs text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Desde</th>
                                            <th>Hasta</th>
                                            <th>Día</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>8:00 am</td>
                                            <td>19:00 pm</td>
                                            <td>Martes</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>8:00 am</td>
                                            <td>19:00 pm</td>
                                            <td>Lunes a viernes</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>10:00 am</td>
                                            <td>14:00 pm</td>
                                            <td>Sábado</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

    {{--  MODAL DESASOCIAR  --}}
    <div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Desasociar Funcionario</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Datos del Funcionario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">Desasociar y cambiar clave</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas-remuneraciones">
                            <!--INFORMACION DE ACCESO-->
                            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
                                <div class="row haberes collapse show" id="info_funcionario-1">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <h5 class="text-info">DATOS DEL FUNCIONARIO</h5>
                                        <hr class="mt-1">
                                    </div>

                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="info_funcionario" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">Rut</th>
                                                        <th class="align-middle" id="personal_desha_rut"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Nombre</th>
                                                        <th class="align-middle" id="personal_desha_nombre"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Rol</th>
                                                        <th class="align-middle" id="personal_desha_rol"></th>
                                                    </tr>
													<tr>
                                                        <th class="align-middle">Usuario</th>
                                                        <th class="align-middle" id="personal_desha_correo"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Clave</th>
                                                        <th class="align-middle" id="personal_desha_clave"></th>
                                                        <input type="hidden" name="personal_desha_clave_id" id="personal_desha_clave_id" value="">
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-tfoot-info-claro">
                                                    <tr>
                                                        <th class="align-middle">La Contrataria Nuevamente?</th>
                                                        <th class="align-middle">NO</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--DEBERES-->
                            <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos_tab">
                                <div class="row deberes collapse show" id="deberes-1">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <h5 class="text-info">DESASOCIAR</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-info d-inline">CAMBIAR CREDENCIALES</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental"
                                                class="display table-bordered table table-striped dt-responsive nowrap table-xs"
                                                style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">CLAVE</th>
                                                        <th class="align-middle">
                                                            <input type="text" class="form-control form-control-sm" id="personal_desha_clave_edit" placeholder="Clave de Acceso">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_desha_clave_id_edit" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_id_persona" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_id_personal" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_id_lugar_atencion" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_tipo_personal_edit" value="">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">MOTIVO TÉRMINO RELACIÓN</th>
                                                        <th class="align-middle"><input type="text" class="form-control form-control-sm" id="personal_desha_motivo_temrino" placeholder="Motivo Término Relación"></th>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="align-middle bg-tfoot-info-claro">LA VOLVERIA A CONTRATAR ?</th>
                                                        <th class="align-middle"><input type="text" class="form-control form-control-sm" id="personal_desha_volver_contratar" placeholder="La volvería a contratar"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
								</div>
                                <div class="row-">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info btn-sm mx-auto" onclick="cambiarContrasenalugarAtencion()">Guardar cambios</button>
                                    </div>
                                </div>

							</div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div> -->

            </div>
        </div>
    </div>

    {{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
    <div id="a_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_rol" aria-hidden="true">
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
                    <input type="hidden" name="" id="">
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
                                <th colspan="4"><h5>Horario</h5></th>
                            </tr>
                            <tr>
                                <th class="align-middle">Dias Laborales</th>
                                <th class="align-middle" colspan="3">
                                    <select class="js-example-basic-multiple" name="add_empleado_dias_laborales" id="add_empleado_dias_laborales" multiple="multiple">
                                        <option value="">Seleccione</option>
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

    {{--  MODAL AREA  --}}
    <div id="a_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_area" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir área</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Área</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Administración financiera</option>
                                        <option>Administración comercial</option>
                                        <option>Otorrinolaringología</option>
                                        <option>Traumatología</option>
                                        <option>Rehabilitación</option>
                                        <option>Administración</option>
                                        <option>Mantención</option>
                                        <option>etc.. cargar todas las áreas de un centro médico</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL ESPECIALIDADES  --}}
    <div id="a_especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_especialidad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label">Especialidad</label>
                                    <select class="form-control form-control-sm" id="especialidad_cm" name="especialidad_cm">
                                        <option>Seleccione</option>
                                        @if(isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_especialidad_cm()">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
{{--  MODAL ESPECIALIDADES  --}}
<div id="a_otra_especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_otra_especialidad" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir otra especialidad</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <!--Cargar especialidades-->
                                <label class="floating-label">Especialidad</label>
                                <select class="form-control form-control-sm" id="especialidad_cm_otra" name="especialidad_cm_otra">
                                    <option>Seleccione</option>
                                    @if(isset($especialidades))
                                        @foreach ($especialidades as $especialidad)
                                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_otra_especialidad_cm()">Añadir</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--Cierre: Container Completo-->
@endsection


@section('page-script')
    <!--SCRIPT MODALS-->
    <script>
        {{--  /*-TABLAS CM-*/  --}}
        {{--  /*-adm_roles-*/  --}}
        {{--  $(document).ready(function() {
            $('#adm_roles').DataTable({
                responsive: true
            });
        });  --}}
        /*-Área_cm-*/
        $(document).ready(function() {
            {{--  $('#area_cm').DataTable({
                responsive: true
            });  --}}
        });

        /*-Especialidades_cm-*/
        $(document).ready(function() {
            {{--  $('#especialidades_cm').DataTable({
                responsive: true
            });  --}}
        });

        /*-Asistentes_cm-*/
        $(document).ready(function() {
            $('#asistentes_cm').DataTable({
                responsive: true
            });
            $(".js-example-basic-multiple").select2();
        });

        /*-Horarios_cm-*/
        $(document).ready(function() {
            $('#horarios_cm').DataTable({
                responsive: true
            });
        });

        /*-CENTRO MÉDICO-*/
        /*-Añadir especialidad-*/
        function ag_especialidad() {
            $('#a_especialidad').modal('show');
        }

        function ag_otra_especialidad(){
            $('#a_otra_especialidad').modal('show');
        }

        /*-Añadir área-*/
        function ag_area() {
            $('#a_area').modal('show');
        }

        /*-Rol-*/
        function añadir_rol() {
            $('#a_rol').modal('show');


        }

        /*-Permisos-*/
        function anadir_permisos(nombre_tipo, id_tipo, id)
        {
            let url = '{{ route("adm_cm.cargar_personal_persona") }}';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {
                    // _token: CSRF_TOKEN,
                    nombre_tipo : nombre_tipo,
                    id_tipo : id_tipo,
                    id : id,
                    id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
                },
            })
            .done(function(response) {

                if (response.estado == 1)
                {
                    $('#personal_id_persona').val(id);
                    $('#personal_id_personal').val(response.registro.rut);
                    $('#personal_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
                    $('#personal_desha_rut').html(response.registro.rut);
                    $('#personal_desha_rut').html(response.registro.rut);
                    $('#personal_desha_nombre').html(response.registro.nombres +' '+ response.registro.apellido_uno + ' ' + response.registro.apellido_dos);
                    $('#personal_desha_rol').html(response.registro.asistente_tipo.nombre);
                    $('#personal_desha_correo').html(response.registro.email);
                    $('#personal_desha_clave').html(response.registro.asistente_lugar.token);
                    $('#personal_desha_clave_id').val(response.registro.asistente_lugar.id);

                    $('#personal_desha_clave_edit').val(response.registro.asistente_lugar.token);
                    $('#personal_desha_clave_id_edit').val(response.registro.asistente_lugar.id);
                    $('#personal_tipo_personal_edit').val(nombre_tipo);

                    $('#permisos_rol').modal('show');

                }
                else
                {
                    swal({
                        title: "Error al Cargar Informacion de Personal",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }
            })
            .fail(function() {
                console.log("error");
            });
        }

        function cambiarContrasenalugarAtencion()
        {
            var id_persona = $('#personal_id_persona').val();
            var id_personal = $('#personal_id_personal').val();
            var id_lugar_atencion = $('#personal_id_lugar_atencion').val();
            var desha_clave_edit = $('#personal_desha_clave_edit').val();
            var desha_clave_id_edit = $('#personal_desha_clave_id_edit').val();
            var tipo_personal = $('#personal_tipo_personal_edit').val();

            let url = '{{ route("adm_cm.actualizar_acceso_personal") }}';
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    tipo_personal : tipo_personal,
                    id_persona : id_persona,
                    id_personal : id_personal,
                    id_lugar_atencion : id_lugar_atencion,
                    clave : desha_clave_edit,
                    id_edit : desha_clave_id_edit,
                },
            })
            .done(function(response) {

                if (response.estado == 1)
                {
                    $('#permisos_rol').modal('hide');
                    swal({
                        title: "Clave de personal Actualizada",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    swal({
                        title: "Error al Cargar Informacion de Personal",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function() {
                console.log("error");
            });
        }


        /*-SUCURSALES-*/
        /*-Agregar sucursal-*/
        function ag_sucursal() {
            $('#a_sucursal').modal('show');
        }
        /*-Editar sucursal-*/
        function ed_sucursal() {
            $('#e_sucursal').modal('show');
        }

        /*-Asistentes de sucursal-*/
        function asis_sucursal() {
            $('#asistentes_sucursal').modal('show');
        }

        /*-Horario sucursal -*/
        function hor_sucursal() {
            $('#horario_sucursal').modal('show');
        }

        /** PERFIL DE LA INSTITUCION */
        /** DATOS */
        function editar_datos_institucion()
        {

            let id_institucion = $('#id_institucion').val();
            let rut = $('#editar_rut').val();
            let razon_social = $('#editar_razon_social').val();
            let nombre = $('#editar_nombre').val();
            let certificado_supersalud = $('#editar_certificado_supersalud').val();
            let tipo_institucion = $('#tipo_institucion').val();
            let url = "{{ route('adm_cm.editar_datos_perfil') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_institucion : id_institucion,
                            rut : rut,
                            razon_social : razon_social,
                            nombre : nombre,
                            certificado_supersalud : certificado_supersalud,
                            tipo_institucion : tipo_institucion,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de la Institución editado correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);


                        } else {
                            swal({
                                title: "Error al Editar los datos de la Institución",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }


                    })
                    .fail(function() {
                        console.log("error");
                    });
        }

         /** CONTACTO */
        function editar_contacto_institucion()
        {
            let id_institucion = $('#id_institucion').val();
            let tipo_institucion = $('#tipo_institucion').val();
            let email = $('#editar_email').val();
            let telefono = $('#editar_telefono').val();
            let whatsapp = $('#editar_whatsapp').val();
            let sitio_web = $('#editar_sitio_web').val();
            let url = "{{ route('adm_cm.editar_datos_perfil') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_institucion : id_institucion,
                            tipo_institucion : tipo_institucion,
                            email : email,
                            telefono : telefono,
                            whatsapp : whatsapp,
                            sitio_web : sitio_web,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Contacto de la Institución editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            setTimeout(function() {
                                location.reload()
                            }, 100);


                        } else {
                            swal({
                                title: "Error al Editar los contactos de la Institución",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });

                        }
                    })
                    .fail(function() {
                        console.log("error");
                    });
        }


        /** DIRECCON */
        function editar_direccion_institucion()
        {
            let id_institucion = $('#id_institucion').val();
            let tipo_institucion = $('#tipo_institucion').val();
            let region = $('#editar_region').val();
            let ciudad = $('#editar_ciudad').val();
            let direccion = $('#editar_direccion').val();
            let numero_dir = $('#editar_numero_dir').val();
            let sucursal_val = $('#editar_sucursal').prop('checked')
            var sucursal = 0;
            if(sucursal_val)
                sucursal = 1;
            let url = "{{ route('adm_cm.editar_datos_perfil') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_institucion : id_institucion,
                            tipo_institucion : tipo_institucion,
                            region : region,
                            ciudad : ciudad,
                            direccion : direccion,
                            numero_dir : numero_dir,
                            sucursales : sucursal,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Ubicación de la Institución editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar la Ubicación de la Institución",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }


        /** PERFIL RESPONSABLE */
        function editar_responsable_datos_personales()
        {

            let id_responsable = $('#id_responsable').val();
            let rut = $('#perfil_rut').val();
            let nombre = $('#perfil_nombre').val();
            let apellido_uno = $('#perfil_apellido_uno').val();
            let apellido_dos = $('#perfil_apellido_dos').val();
            let sexo = $('input:radio[name=perfil_sexo]:checked').val();
            let nac = $('#perfil_nac').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_responsable:id_responsable,
                            rut:rut,
                            nombres:nombre,
                            apellido_uno:apellido_uno,
                            apellido_dos:apellido_dos,
                            sexo:sexo,
                            fecha_nac:nac,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar los Datos del Representante",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }

        function editar_responsable_datos_contacto()
        {
            let id_responsable = $('#id_responsable').val();
            let email = $('#Perfil_email').val();
            let fono = $('#Perfil_fono').val();
            let fono_dos = $('#Perfil_fono_dos').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_responsable:id_responsable,
                            email:email,
                            telefono_uno:fono,
                            telefono_dos:fono_dos,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos de contacto del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar los Datos de contacto del Representante",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }

        function editar_responsable_datos_residencia()
        {
            let id_responsable = $('#id_responsable').val();
            let region = $('#perfil_region').val();
            let ciudad = $('#perfil_ciudad').val();
            let dire = $('#perfil_dire').val();
            let numero_dir = $('#perfil_numero_dir').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_responsable:id_responsable,
                            region: region,
                            ciudad: ciudad,
                            direccion: dire,
                            numero_dir: numero_dir,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos de Residencia del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar los Datos de Residencia del Representante",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }

        /** buscar ciudad */
        function buscar_ciudad(id_ciudad=0) {

            let region = $('#editar_region').val();
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

                        let ciudades = $('#editar_ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if(id_ciudad != 0)
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

        function buscar_ciudad_responsable(id_ciudad=0) {

            let region = $('#perfil_region').val();
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

                        let ciudades = $('#perfil_ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if(id_ciudad != 0)
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

        // function buscar_ciudad_nuevo_empleado(id_ciudad=0) {


        //     let region = $('#add_empleado_region').val();
        //     let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        //     $.ajax({

        //             url: url,
        //             type: "get",
        //             data: {
        //                 //_token: _token,
        //                 region: region,
        //             },
        //         })
        //         .done(function(data) {
        //             if (data != null) {
        //                 data = JSON.parse(data);

        //                 let ciudades = $('#add_empleado_ciudad');

        //                 ciudades.find('option').remove();
        //                 ciudades.append('<option value="0">seleccione</option>');
        //                 $(data).each(function(i, v) { // indice, valor
        //                     ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
        //                 })

        //                 if(id_ciudad != 0)
        //                     ciudades.val(id_ciudad);

        //             } else {

        //                 swal({
        //                     title: "Error",
        //                     text: "Error al cargar las ciudades",
        //                     icon: "error",
        //                     buttons: "Aceptar",
        //                     DangerMode: true,
        //                 })
        //                 // alert('No se pudo Cargar las ciudades');
        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });


        // };

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
            let email = $('#add_empleado_email').val();
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
            if(numero == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Número\n';
            }
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
                    type: "get",
                    data: {
                        //_token: _token,
                        region: region,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        if(data.estado == 1)
                        {

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

        function guardar_especialidad_cm(){
            var valido = 1;
            var mensaje = '';
            let id_institucion = $('#id_institucion').val();
            let especialidad = $('#especialidad_cm').val();

            if(id_institucion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Institución\n';
            }
            if(especialidad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Especialidad\n';
            }

            if(valido == 1)
            {

                var data = {
                    id_institucion : id_institucion,
                    especialidad : especialidad,
                    _token: CSRF_TOKEN,
                    principal:1,
                };
                let url = "{{ route('adm_cm.registrar_especialidad') }}";
                $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                     console.log(data);
                    if (data != null) {
                        if(data.estado == 1)
                        {
                            let especialidades = data.especialidades;
                            let otras_especialidades = data.otras_especialidades;
                            $('#especialidades_cm tbody').empty();
                            $('#otras_especialidades_cm tbody').empty();
                            $(especialidades).each(function(i, v) { // indice, valor
                                $('#especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                            $(otras_especialidades).each(function(i, v) { // indice, valor
                                $('#otras_especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">5</td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                        }
                        else
                        {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar especialidad",
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
                            text: "Error al cargar ingresar especialidad",
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

        function guardar_otra_especialidad_cm(){
            var valido = 1;
            var mensaje = '';
            let id_institucion = $('#id_institucion').val();
            let especialidad = $('#especialidad_cm_otra').val();

            if(id_institucion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Institución\n';
            }
            if(especialidad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Especialidad\n';
            }

            if(valido == 1)
            {

                var data = {
                    id_institucion : id_institucion,
                    especialidad : especialidad,
                    _token: CSRF_TOKEN,
                    principal:0,
                };
                let url = "{{ route('adm_cm.registrar_especialidad') }}";
                $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                     console.log(data);
                    if (data != null) {
                        if(data.estado == 1)
                        {
                            let especialidades = data.especialidades;
                            let otras_especialidades = data.otras_especialidades;
                            $('#especialidades_cm tbody').empty();
                            $('#otros_profesionales_cm tbody').empty();
                            $(especialidades).each(function(i, v) { // indice, valor
                                $('#especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                            $(otras_especialidades).each(function(i, v) { // indice, valor
                                $('#otros_profesionales_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                        }
                        else
                        {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar especialidad",
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
                            text: "Error al cargar ingresar especialidad",
                            icon: "error",
                            buttons: "[Aceptar], [Cancelar]",
                            DangerMode: true,
                        });
                    }
                });
            }
        }

        function eliminar_especialidad_cm(id){
            // preguntar si desea eliminar
            swal({
                title: "Eliminar Especialidad",
                text: "¿Está seguro que desea eliminar la especialidad?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_especialidad_cm(id);
                }
            });

        }

        function confirmar_eliminar_especialidad_cm(id){
            let id_institucion = $('#id_institucion').val();
            let data = {
                id_institucion : id_institucion,
                id : id,
                _token: CSRF_TOKEN,
            };
            let url = "{{ route('adm_cm.eliminar_especialidad') }}";
            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        let especialidades = data.especialidades;
                        $('#especialidades_cm tbody').empty();
                        $(especialidades).each(function(i, v) { // indice, valor
                            $('#especialidades_cm tbody').append(`
                            <tr>
                                <td class="align-items-center text-center">${v.nombre}</td>
                                <td class="align-items-center text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                        <label class="custom-control-label" for="esp-${v.id}"></label>
                                    </div>
                                </td>
                                <td class="align-items-center text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar especialidad",
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
                        text: "Error al cargar ingresar especialidad",
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

        function eliminar_otra_especialidad_cm(id){
            // preguntar si desea eliminar
            swal({
                title: "Eliminar Especialidad",
                text: "¿Está seguro que desea eliminar la especialidad?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_otra_especialidad_cm(id);
                }
            });

        }

        function confirmar_eliminar_otra_especialidad_cm(id){
            let id_institucion = $('#id_institucion').val();
            let data = {
                id_institucion : id_institucion,
                id : id,
                _token: CSRF_TOKEN,
            };
            let url = "{{ route('adm_cm.eliminar_otra_especialidad') }}";
            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        let especialidades = data.especialidades;
                        let otras_especialidades = data.otras_especialidades;
                        $('#especialidades_cm tbody').empty();
                        $('#otros_profesionales_cm tbody').empty();
                        $(especialidades).each(function(i, v) { // indice, valor
                            $('#especialidades_cm tbody').append(`
                            <tr>
                                <td class="align-items-center text-center">${v.nombre}</td>
                                <td class="align-items-center text-center">5</td>
                                <td class="align-items-center text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                        <label class="custom-control-label" for="esp-${v.id}"></label>
                                    </div>
                                </td>
                                <td class="align-items-center text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                        $(otras_especialidades).each(function(i, v) { // indice, valor
                            $('#otros_profesionales_cm tbody').append(`
                            <tr>
                                <td class="align-items-center text-center">${v.nombre}</td>
                                <td class="align-items-center text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                        <label class="custom-control-label" for="esp-${v.id}"></label>
                                    </div>
                                </td>
                                <td class="align-items-center text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar especialidad",
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
                        text: "Error al cargar ingresar especialidad",
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

    </script>
@endsection
