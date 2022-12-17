@extends('template.templateBuscadorProfesionales')

@section('page-styles')
    <style>
        .titulos_tarjetas {
            font-size: 20px!important;
        }
        .btn.btn-icon {
            width: 35px!important;
            height: 35px!important;
            font-size: 15px!important;
        }
    </style>
@endsection


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
                                <h5 class="m-b-10 font-weight-bold">Reservar hora médica</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_paciente.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="buscador_profesional_paciente.php">Reservar hora médica</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Buscador de profesionales-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-white bg-light">
                            <h4 class="f-18 pt-1 text-c-blue text-center">
                            Reserve su hora médica</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3 justify-content-center" id="Buscadores" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-uppercase" id="buscar_especialidad-tab" data-toggle="tab" href="#buscar_especialidad" role="tab" aria-controls="home" aria-selected="true">Especialidad</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" id="buscar_profesional-tab" data-toggle="tab" href="#buscar_profesional" role="tab" aria-controls="buscar_profesional" aria-selected="false">Profesional</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" id="buscar_videoconsulta-tab" data-toggle="tab" href="#buscar_videoconsulta" role="tab" aria-controls="buscar_videoconsulta" aria-selected="false">Videoconsulta</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="BuscadoresContent">
                                <!--Hora por especialidad-->
                                <div class="tab-pane fade show active" id="buscar_especialidad" role="tabpanel" aria-labelledby="buscar_especialidad-tab">
                                    {{--  <form>  --}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por especialidad</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Profesión</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_profesion" id="buscar_especialidad_profesion" onchange="buscar_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($profesiones))
                                                            @foreach($profesiones as $pro_key => $pro)
                                                                <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Especialidad</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_especialidad" id="buscar_especialidad_especialidad" onchange="buscar_sub_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($especialidades))
                                                            @foreach($especialidades as $esp_key => $esp)
                                                                <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Sub-Especialidad</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_subespec" id="buscar_especialidad_subespec">
                                                        <option value="">Seleccione</option>
                                                        {{--  @if(isset($sub_especialidades))
                                                            @foreach($sub_especialidades as $sub_key => $sub)
                                                                <option value="{{ $sub->id }}">{{ $sub->nombre }}</option>
                                                            @endforeach
                                                        @endif  --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_region" id="buscar_especialidad_region" onchange="buscar_ciudad(this);">
                                                        <option value="">Seleccione</option>
                                                        @foreach($regiones as $reg_key => $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_comuna" id="buscar_especialidad_comuna">
                                                        <option value="">Seleccione</option>
                                                        @foreach($ciudades as $ciu_key => $ciu)
                                                            <option value="{{ $ciu->id }}">{{ $ciu->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                {{--  <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="buscar_especialidad_hora24">
                                                        <label class="custom-control-label" for="hora24">Buscar horas para las próx. 24 hrs</label>
                                                    </div>
                                                </div>  --}}

                                                <div class="form-group">

                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_especialidad_hora24" value="1">
                                                        <label for="buscar_especialidad_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Quiero hora para las próx. 24 hrs</strong></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button class="btn btn-info" type="bottom" id="btn_buscar_especialidad" onclick="buscar_profesional_especialidad();">Buscar hora</button>
                                            </div>
                                        </div>
                                    {{--  </form>  --}}
                                </div>
                                <!--Hora por profesional-->
                                <div class="tab-pane fade" id="buscar_profesional" role="tabpanel" aria-labelledby="buscar_profesional-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por profesional</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre o Rut del profesional</label>
                                                    <input type="text" class="form-control form-control-sm" name="buscar_profesional_dato_profesional" id="buscar_profesional_dato_profesional">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" name="buscar_profesional_region" id="buscar_profesional_region" onchange="buscar_ciudad(this);">
                                                        <option value="">Seleccione</option>
                                                        @foreach($regiones as $reg_key => $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" name="buscar_profesional_comuna" id="buscar_profesional_comuna">
                                                        <option value="">Seleccione</option>
                                                        @foreach($ciudades as $ciu_key => $ciu)
                                                            <option value="{{ $ciu->id }}">{{ $ciu->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="buscar_profesional_hora24">
                                                        <label class="custom-control-label" for="hora24">Buscar horas para las próx. 24 hrs</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button class="btn btn-info" type="submit">Buscar hora</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--Hora por videoconsulta-->
                                <div class="tab-pane fade" id="buscar_videoconsulta" role="tabpanel" aria-labelledby="buscar_videoconsulta-tab">
                                    <form id="buscador_videoconsulta">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <div class="form-group">
                                                    <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por videoconsulta</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Profesión</label>
                                                    <select class="form-control form-control-sm" name="profesion" id="buscar_videoconsulta_profesion" onchange="buscar_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($profesiones))
                                                            @foreach($profesiones as $pro_key => $pro)
                                                                <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Especialidad</label>
                                                    <select class="form-control form-control-sm" name="especialidad" id="buscar_videoconsulta_especialidad" onchange="buscar_sub_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($especialidades))
                                                            @foreach($especialidades as $esp_key => $esp)
                                                                <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Sub-Especialidad</label>
                                                    <select class="form-control form-control-sm" name="subespec" id="buscar_videoconsulta_subespec">
                                                        <option value="">Seleccione</option>
                                                        {{--  @if(isset($sub_especialidades))
                                                            @foreach($sub_especialidades as $sub_key => $sub)
                                                                <option value="{{ $sub->id }}">{{ $sub->nombre }}</option>
                                                            @endforeach
                                                        @endif  --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Previsión</label>
                                                    <select class="form-control form-control-sm" name="prevision" id="buscar_videoconsulta_prevision">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="buscar_videoconsulta_hora24">
                                                        <label class="custom-control-label" for="hora24">Buscar horas para las próx. 24 hrs</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button class="btn btn-info" type="submit">Buscar hora</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="div_resultado_busqueda">

                {{--  <!--Card Tomar Hora Perfil Médico -->
                <div class="col-sm-12 col-md-4">
                    <div class="card user-card user-card-1 mt-4">
                        <div class="card-body pt-0">
                            <div class="user-about-block text-center">
                                <div class="row align-items-end">
                                    <div class="col"><img class="img-radius img-fluid wid-70" src="{{ asset('images/img_perfil/usuario_profesional.svg') }}" alt="Nombre del Médico"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#!" data-toggle="modal" data-target="#modal-report">
                                    <span class="badge badge-primary mt-2">Medicina General</span>
                                    <h6 class="mb-1 mt-2">Nombre y Apellidos</h6>
                                </a>
                                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora 27/08/2021</p>
                                <button type="button" class="btn btn-outline-info btn-sm" onclick="f_profesional();"><i class="feather icon-file-plus"></i> Ver ficha</button>
                                <button type="button" class="btn btn-info btn-sm" onclick="hora_medica();"><i class="feather icon-calendar"></i> Reservar hora</button>
                            </div>
                        </div>
                    </div>
                </div>  --}}

            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!--Modals buscador -->
    @include("app.general.buscador_profesionales.modals.ficha_profesional")
    @include("app.general.buscador_profesionales.modals.reservar_hora")
@endsection


{{--  @section('page-script')
    <script>
    </script>
@endsection  --}}
