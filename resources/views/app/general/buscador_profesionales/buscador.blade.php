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

        .buscador-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(30, 40, 80, .08);
            overflow: hidden;
        }
        .buscador-card-header {
            background: #fff!important;
            padding: 15px 24px 15px;
            
        }
        .buscador-card-header h4 {
            color: #1a49a3;
            font-weight: 700;
            margin-bottom: 3px;
        }
        /* Boton "Volver al escritorio": alineado con el titulo desde md hacia
           arriba (gracias a float-md-right); en sm/xs no flota y queda como
           un bloque propio, separado del titulo. */
        .buscador-btn-volver {
            margin-top: 2px;
        }
        @media (max-width: 767.98px) {
            .buscador-btn-volver {
                display: block;
                width: 100%;
                margin: 0 0 12px;
                text-align: center;
            }
        }
        .buscador-card-header p {
            color: #343a40;
            margin-bottom: 0;
            font-size: .92rem;
        }
        .buscador-card-body {
            padding: 0 20px 24px;
            margin-top: 10px;
        }

        .buscador-tabs {
            background-color: #f7f7f7;
            border: none;
            border-radius: 14px;
            padding: 5px;
            display: flex;
            gap: 4px;
        }
        .buscador-tabs .nav-item {
            flex: 1;
            margin: 0 !important;
        }
        .buscador-tabs .nav-link {
            border: none !important;
            border-radius: 10px;
            color: #5f6b7a;
            font-weight: 700 !important;
            font-size: .82rem !important;
            text-transform: none;
            padding: 5px 6px;
            text-align: center;
            transition: background-color .2s ease, color .2s ease;
        }
        .buscador-tabs .nav-link i {
            display: block;
            font-size: 18px;
            margin-bottom: 4px;
        }
        .buscador-tabs .nav-link.active {
            background-color: #dae7ff !important;
            color: #1a49a3!important;
        }

        /* Telefonos muy angostos (320px): evita que "Videoconsulta" se corte */
        @media (max-width: 350px) {
            .buscador-tabs .nav-link {
                font-size: .68rem !important;
                padding: 8px 2px;
                white-space: normal;
                line-height: 1.15;
            }
            .buscador-tabs .nav-link i {
                font-size: 15px;
            }
        }

        .buscador-panel {
            padding-top: 24px;
        }
        .buscador-panel-instruccion {
            color: #8b93a7;
            font-size: .88rem;
        }

        .buscador-campo select.buscador-select,
        .buscador-campo input.buscador-select {
            border-radius: 8px;
        }

        .buscador-btn-buscar {
            background-color: #1a49a3;
            border-color: #1a49a3;
            border-radius: 30px;
            padding: 10px 36px;
            font-weight: 700;
        }
        .buscador-btn-buscar:hover {
            background-color: #14397f;
            border-color: #14397f;
        }
        .buscador-profesionales-content {
            margin-top: 8px !important;
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
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
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
                    <div class="card buscador-card">
                        <div class="buscador-card-header">
                            {{--<a href="{{ ROUTE('paciente.home') }}" class="btn btn-outline-primary btn-sm float-md-right buscador-btn-volver">
                                <i class="feather icon-home mr-1"></i> Volver al escritorio
                            </a>--}}
                            <h4><i class="feather icon-calendar mr-2"></i>Reserva tu hora médica</h4>
                            <p class="d-none d-sm-none d-md-block">Elige cómo quieres buscar tu hora: por especialidad, por profesional o por videoconsulta</p>
                            <input type="hidden" name="select_tipo_agenda" id="select_tipo_agenda" value="1,2">
                        </div>
                        <div class="buscador-card-body">
                            <ul class="nav buscador-tabs mb-3" id="Buscadores" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" onclick="$('#select_tipo_agenda').val(1);$('#div_resultado_busqueda').html('')" id="buscar_especialidad-tab" data-toggle="tab" href="#buscar_especialidad" role="tab" aria-controls="home" aria-selected="true">
                                        <i class="feather icon-heart"></i>Especialidad
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="$('#select_tipo_agenda').val(1);$('#div_resultado_busqueda').html('')" id="buscar_profesional-tab" data-toggle="tab" href="#buscar_profesional" role="tab" aria-controls="buscar_profesional" aria-selected="false">
                                        <i class="feather icon-user"></i>Profesional
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="$('#select_tipo_agenda').val(3);$('#div_resultado_busqueda').html('')" id="buscar_videoconsulta-tab" data-toggle="tab" href="#buscar_videoconsulta" role="tab" aria-controls="buscar_videoconsulta" aria-selected="false">
                                        <i class="feather icon-video"></i>Videoconsulta
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="BuscadoresContent">

                                <!--Hora por especialidad-->
                                <div class="tab-pane fade show active buscador-panel" id="buscar_especialidad" role="tabpanel" aria-labelledby="buscar_especialidad-tab">
                                    {{--  <form>  --}}
                                    {{--  <div class="form-row mt-n2">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <p class="buscador-panel-instruccion mb-4">Ingresa los datos solicitados para buscar horas por especialidad</p>
                                            </div>
                                        </div>--}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Profesión</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_especialidad_profesion" id="buscar_especialidad_profesion" onchange="buscar_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>

                                                        @if(isset($profesiones))
                                                            @foreach($profesiones as $pro_key => $pro)
                                                            @php
                                                                $selected_id1 = '';
                                                                if((int)$filtros['id_profesion']==$pro->id && (int)$filtros['id_profesion']>0)
                                                                $selected_id1 = 'selected';
                                                            @endphp
                                                                <option value="{{ $pro->id }}" {{$selected_id1}}>{{ $pro->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Especialidad</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_especialidad_especialidad" id="buscar_especialidad_especialidad" onchange="buscar_sub_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($especialidades))
                                                            @foreach($especialidades as $esp_key => $esp)
                                                            @php
                                                                $selected_id2 = '';
                                                                if($filtros['id_especialidad']==$esp->id && $filtros['id_especialidad']!=0)
                                                                $selected_id2 = 'selected';
                                                            @endphp
                                                                <option value="{{ $esp->id }}" {{$selected_id2}}>{{ $esp->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Sub-Especialidad</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_especialidad_subespec" id="buscar_especialidad_subespec">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($sub_especialidades))
                                                            @foreach($sub_especialidades as $sub_key => $sub)
                                                                @php
                                                                    $selected_id3 = '';
                                                                    if($filtros['id_subespecialidad']==$sub->id && $filtros['id_subespecialidad']!=0)
                                                                    $selected_id3 = 'selected';
                                                                @endphp
                                                                <option value="{{ $sub->id }}" {{$selected_id3}}>{{ $sub->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_especialidad_region" id="buscar_especialidad_region" onchange="buscar_ciudad(this);">
                                                        <option value="">Seleccione</option>
                                                        @foreach($regiones as $reg_key => $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_especialidad_comuna" id="buscar_especialidad_comuna">
                                                        <option value="">Seleccione</option>
                                                        @foreach($ciudades as $ciu_key => $ciu)
                                                            <option value="{{ $ciu->id }}">{{ $ciu->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">

                                                {{-- <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_especialidad_hora24" value="1">
                                                        <label for="buscar_especialidad_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Buscar horas para las próx. 24 hrs</strong></label>
                                                </div> --}}
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center mt-2">
                                                <button class="btn btn-info buscador-btn-buscar" type="bottom" id="btn_buscar_especialidad" onclick="buscar_profesional_especialidad();"><i class="feather icon-search mr-1"></i> Buscar horas</button>
                                            </div>
                                        </div>
                                    {{--  </form>  --}}
                                </div>

                                <!--Hora por profesional-->
                                <div class="tab-pane fade buscador-panel" id="buscar_profesional" role="tabpanel" aria-labelledby="buscar_profesional-tab">
                                    <form>
                                        {{-- <div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <p class="buscador-panel-instruccion mb-4">Ingresa los datos solicitados para buscar horas por profesional</p>
                                            </div>
                                        </div>--}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Nombre o Rut del profesional</label>
                                                    <input type="text" placeholder="Escribe nombre o RUT del profesional" class="form-control form-control-sm buscador-select" name="buscar_profesional_dato_profesional" id="buscar_profesional_dato_profesional">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_profesional_region" id="buscar_profesional_region" onchange="buscar_ciudad(this);">
                                                        <option value="">Seleccione</option>
                                                        @foreach($regiones as $reg_key => $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_profesional_comuna" id="buscar_profesional_comuna">
                                                        <option value="">Seleccione</option>
                                                        @foreach($ciudades as $ciu_key => $ciu)
                                                            <option value="{{ $ciu->id }}">{{ $ciu->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-sm-12 col-md-4">

                                                {{-- <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_profesional_hora24" value="1">
                                                        <label for="buscar_profesional_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Buscar horas para las próx. 24 hrs</strong></label>
                                                </div> --}}

                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center mt-2">
                                                <button class="btn btn-info buscador-btn-buscar" type="button" onclick="buscar_profesional_profesional();"><i class="feather icon-search mr-1"></i> Buscar horas</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--Hora por videoconsulta-->
                                <div class="tab-pane fade buscador-panel" id="buscar_videoconsulta" role="tabpanel" aria-labelledby="buscar_videoconsulta-tab">
                                    {{--  <form>  --}}
                                        {{--<div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <p class="buscador-panel-instruccion mb-4">Ingresa los datos solicitados para buscar horas por especialidad</p>
                                            </div>
                                        </div>--}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Profesión</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_videoconsulta_profesion" id="buscar_videoconsulta_profesion" onchange="buscar_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>

                                                        @if(isset($profesiones))
                                                            @foreach($profesiones as $pro_key => $pro)
                                                            @php
                                                                $selected_id1 = '';
                                                                if((int)$filtros['id_profesion']==$pro->id && (int)$filtros['id_profesion']>0)
                                                                $selected_id1 = 'selected';
                                                            @endphp
                                                                <option value="{{ $pro->id }}" {{$selected_id1}}>{{ $pro->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Especialidad</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_videoconsulta_especialidad" id="buscar_videoconsulta_especialidad" onchange="buscar_sub_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($especialidades))
                                                            @foreach($especialidades as $esp_key => $esp)
                                                            @php
                                                                $selected_id2 = '';
                                                                if($filtros['id_especialidad']==$esp->id && $filtros['id_especialidad']!=0)
                                                                $selected_id2 = 'selected';
                                                            @endphp
                                                                <option value="{{ $esp->id }}" {{$selected_id2}}>{{ $esp->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group buscador-campo">
                                                    <label class="floating-label-activo-sm">Sub-Especialidad</label>
                                                    <select class="form-control form-control-sm buscador-select" name="buscar_videoconsulta_subespec" id="buscar_videoconsulta_subespec">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($sub_especialidades))
                                                            @foreach($sub_especialidades as $sub_key => $sub)
                                                                @php
                                                                    $selected_id3 = '';
                                                                    if($filtros['id_subespecialidad']==$sub->id && $filtros['id_subespecialidad']!=0)
                                                                    $selected_id3 = 'selected';
                                                                @endphp
                                                                <option value="{{ $sub->id }}" {{$selected_id3}}>{{ $sub->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Previsión</label>
                                                    <select class="form-control form-control-sm" name="prevision" id="buscar_videoconsulta_prevision">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-12 col-md-4">
                                                {{-- <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_videoconsulta_hora24" value="1">
                                                        <label for="buscar_videoconsulta_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Buscar horas para las próx. 24 hrs</strong></label>
                                                </div> --}}
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center mt-2">
                                                <button class="btn btn-info" type="bottom" id="btn_buscar_especialidad_video_consulta" onclick="buscar_profesional_especialidad_video_consulta();"><i class="feather icon-search mr-1"></i> Buscar horas</button>
                                            </div>
                                        </div>
                                    {{--  </form>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="div_resultado_busqueda">
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!--Modals buscador -->
    @include("app.general.buscador_profesionales.modals.ficha_profesional")
    @include("app.general.buscador_profesionales.modals.reservar_hora")

@endsection


@section('page-script')
    <script>
     @if( $filtros['id_profesion'] !=0 && $filtros['id_especialidad'] !=0 )
        buscar_profesional_especialidad();
     @endif
    </script>
@endsection
