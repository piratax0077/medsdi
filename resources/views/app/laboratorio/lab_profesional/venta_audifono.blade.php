@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Ventas de audífonos</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Ventas de audífonos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="user-profile user-card mt-8">
                <div >
                    <div class="user-about-block mt-10">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="tab-content" id="myTabContent">
                                    <!--TAB INFORMACIÓN PERSONAL-->
                                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <!--Card Información Básica-->
                                                <div class="card">
                                                    <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                                        <h5 class="mb-0 text-white">Datos personales</h5>
                                                        <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </div>
                                                    <!--Datos Personales-->
                                                    <div class="card-body info_basica collapse show" id="info_basica-1">
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                                    {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                                                    {{--  <div> {{ $paciente->nombres }} </div>  --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Primer
                                                                    Apellido</label>
                                                                    {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Segundo
                                                                    Apellido</label>
                                                                    {{--  <div> {{ $paciente->apellido_dos }}
                                                                    </div>  --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                                    <div>
                                                                        {{--  @if ($paciente->sexo == 'F')
                                                                            Mujer
                                                                        @elseif ($paciente->sexo == 'M')
                                                                            Hombre
                                                                        @endif  --}}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                                                    <div>
                                                                        {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Previsión</label>
                                                                    <div> Fonasa </div>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="font-weight-bolder ml-0 mb-0">Deterioro Cognitivo?</label>
                                                                    <div> No </div>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <!--Cierre: Datos Personales-->
                                                    <!--(Editar)Datos Personales-->
                                                    <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Rut</label>
                                                                    <input type="text" class="form-control form-control-sm" placeholder="Rut" id="perfil_rut" name="perfil_rut" value="" disabled>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Nombre</label>
                                                                    <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="perfil_nombre" name="perfil_nombre" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Primer Apellido</label>
                                                                    <input type="text" class="form-control form-control-sm" id="perfil_apellido_uno" name="perfil_apellido_uno" placeholder="Primer Apellido" value="">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Segundo Apellido</label>
                                                                    <input type="text" class="form-control form-control-sm" id="perfil_apellido_dos" name="perfil_apellido_dos" placeholder="Segundo Apellido" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Sexo</label>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" value="M">
                                                                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" value="F">
                                                                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Nacimiento</label>
                                                                    <input type="date" class="form-control form-control-sm" id="perfil_nac" name="perfil_nac" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Previsión</label>
                                                                    <select class="form-control form-control-sm" id="perfil_prevision" name="perfil_prevision">
                                                                        <option value="">Seleccione su previsión</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo">Deterioro Cognitivo?</label>
                                                                    <select class="form-control form-control-sm" id="perfil_prevision" name="perfil_prevision">
                                                                        <option value="">Seleccione</option>
                                                                        <option value="">Si</option>
                                                                        <option value="">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                    <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--Cierre: (Editar)Datos Personales-->
                                                </div>
                                                <!--Cierre: Card Datos Personales-->
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <!--Card Información audifono-->
                                                <div class="card">
                                                    <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                                        <h5 class="mb-0 text-white">Venta Audífonos</h5>
                                                        <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_audifono" aria-expanded="false" aria-controls="info_audifono-1 info_audifono-2">
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </div>
                                                    <!--Datos audifono-->
                                                    <div class="card-body info_audifono collapse show" id="info_audifono-1">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Izq</label>
                                                                            {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                            {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                            {{--  <div> {{ $paciente->apellido_dos }}
                                                                            </div>  --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                            <div>
                                                                                {{--  @if ($paciente->sexo == 'F')
                                                                                    Mujer
                                                                                @elseif ($paciente->sexo == 'M')
                                                                                    Hombre
                                                                                @endif  --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                            <div>
                                                                                {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                            <div> Buena</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Der</label>
                                                                            {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                            {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                            {{--  <div> {{ $paciente->apellido_dos }}
                                                                            </div>  --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                            <div>
                                                                                {{--  @if ($paciente->sexo == 'F')
                                                                                    Mujer
                                                                                @elseif ($paciente->sexo == 'M')
                                                                                    Hombre
                                                                                @endif  --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                            <div>
                                                                                {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                            <div> Buena</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--Cierre: audifono-->
                                                    <!--(Editar)Datos audifono-->
                                                    <div class="card-body info_audifono collapse" id="pinfo_audifono_2">
                                                        <form>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_izq" name="n_serie_aud_izq" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Marca</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_izq" name="marca_aud_izq" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Modelo</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_izq" name="model_aud_izq" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Fecha de entrega</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_izq"name="fecha_ent_aud_izq" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Satisfacción</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_izq" name="satisf_aud_izq" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_der" name="n_serie_aud_der" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Marca</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_der" name="marca_aud_der" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Modelo</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_der" name="model_aud_der" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Fecha de entrega</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_der"name="fecha_ent_aud_der" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo">Satisfacción</label>
                                                                        <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_der" name="satisf_aud_der" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                    <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--Cierre: (Editar)Datos audifono-->
                                                </div>
                                                <!--Cierre: Card Datos audifono-->
                                            </div>


                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a " id="venta_ins">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ins_repuestos" aria-expanded="false" aria-controls="ins_repuestos">
                                                            Venta de Insumos y repuestos
                                                        </button>
                                                    </div>
                                                    <div id="ins_repuestos" class="collapse show" aria-labelledby="venta_ins" data-parent="#venta_ins">
                                                        <div class="card-body-aten-a">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="card">
                                                                        <div class="form-row">
                                                                            {{--  <div class="col-sm-4">
                                                                                <div class="card">
                                                                                    <div class="card-header bg-light pb-1 pt-2">
                                                                                        <h5 class="text-primary">Insumos y repuestos</h5>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <!--Buscador-->

                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Insumos y Repuestos</label>
                                                                                                        <select id="vent_ins" name="vent_ins" class="form-control form-control-sm">
                                                                                                            <option>Seleccione una opción</option>
                                                                                                            <option value="">Pilas</option>
                                                                                                            <option value="">Olivas</option>
                                                                                                            <option value="">Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group mb-0">
                                                                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="fecha" id="fecha">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group mb-0">
                                                                                                        <label class="floating-label-activo-sm">Marca</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="fecha" id="fecha">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group mb-0">
                                                                                                        <label class="floating-label-activo-sm">Precio venta</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="fecha" id="fecha">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="card-footer">
                                                                                        <button type="submit" class="btn btn-info btn-sm btn-block">Agregar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>  --}}
                                                                            <div class="col-sm-12">
                                                                                <div class="card">
                                                                                    <div class="card-header bg-light pb-1 pt-2">
                                                                                        <h5 class="text-primary">Tabla de Ventas</h5>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <div class="card-body">
                                                                                            <table id="vent_insumos" class="display table table-striped table-hover dt-responsive nowrap table-sm text-center align-middle" style="width:100%">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Fecha de venta</th>
                                                                                                        <th>Tipo de Audifono</th>
                                                                                                        <th>Marca</th>
                                                                                                        <th>N° serie</th>
                                                                                                        <th>Cantidad</th>
                                                                                                        <th>Precio</th>
                                                                                                        <th>Acción</th>

                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="align-middle text-center">00/00/00</td>
                                                                                                        <td class="align-middle text-center">Retroauricular</td>
                                                                                                        <td class="align-middle text-center">Danavox</td>
                                                                                                        <td class="align-middle text-center">0021235456</td>
                                                                                                        <td class="align-middle text-center">2</td>
                                                                                                        <td class="align-middle text-center">1000.000</td>
                                                                                                        <td class="align-middle text-center"><button type="button" class="btn btn-success" onclick="hacerfactura ();">hacer factura</button></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <hr>
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
        </div>
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.calibración_audifono")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.audiom_control_aud")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.mantencion_audifono")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.cita_control_aud")
    </div>
    <!--Cierre: Container Completo-->
   @endsection
