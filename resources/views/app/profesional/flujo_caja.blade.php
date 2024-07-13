{{-- @extends('layouts.templateFlujoCaja') --}}
@extends('template.profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Flujo de Caja</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    @if(Auth::user()->hasRole('Profesional'))
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <a href="{{ route('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <a href="{{ route('institucion.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <a href="{{ route('servicio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>  --}}
                                    @endif
                                    {{--  <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>  --}}
                                </li>
                                <li class="breadcrumb-item"><a href="#">Flujo de Caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Pills-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                {{-- ENTREGA DE BONOS DE ASISTENTE AL PROFESIONAL O ENCARGADO - TIPO NO PROGRAMA--}}
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-outline-info mr-1 active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">
                                        Recibo de Caja
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="btn btn-sm btn-outline-info mr-1" id="pills-recibo_historico-tab" data-toggle="pill" href="#pills-recibo_historico" role="tab" aria-controls="pills-recibo_historico" aria-selected="true">
                                        Recibo de caja Historico
                                    </a>
                                </li>

                                {{-- ENTREGA DE BONOS DE ASISTENTE AL PROFESIONAL O ENCARGADO - TIPO PROGRAMA --}}
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-outline-info mr-1 " id="pills-programas-tab" data-toggle="pill" href="#pills-programas" role="tab" aria-controls="pills-programas" aria-selected="false">
                                        Recepción de programas
                                    </a>
                                </li>

                                {{--  Bonos rendidos   --}}
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-outline-info mr-1 " id="pills-gestion_bonos-tab" data-toggle="pill" href="#pills-gestion_bonos" role="tab" aria-controls="pills-gestion_bonos" aria-selected="false">
                                        Gestión de bonos
                                    </a>
                                </li>

                                {{-- Bonos rendidos progama --}}
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-outline-info mr-1 " id="pills-gestion_bonos_programa-tab" data-toggle="pill" href="#pills-gestion_bonos_programa" role="tab" aria-controls="pills-gestion_bonos_programa" aria-selected="false">
                                        Gestión de bonos Programas
                                    </a>
                                </li>
								{{-- <li class="nav-item">
                                    <a class="btn btn-sm btn-outline-info mr-1 " id="pills-gestion_bonos_programa-tab" data-toggle="pill" href="#pills-venta_bonos" role="tab" aria-controls="pills-venta_bonos" aria-selected="false">
                                        Venta de bonos
                                    </a>
                                </li> --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <div class="tab-content" id="pills-tabContent">

                                        {{-- PESTAÑA RENDICION DE CAJA --}}
                                        <div class="tab-pane fade show active " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Rendiciones de Caja</h5>


                                                    @if(Auth::user()->hasRole('Profesional'))
														{{--<button id="iniciar_procesocobro_rendicion" type="button" class="btn btn-outline-primary btn-sm float-right d-inline iniciar_procesocobro_rendicion" onclick="">Iniciar Proceso de Cobro</button>--}}
                                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_prof_1').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Asistente'))
                                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_asis_1').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Institucion'))
                                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_inst_1').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm float-right d-inline">Recibo Manual</button>
                                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_prof_1').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Servicio'))
                                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_serv_1').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('AsistenCaja'))
                                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                            <i class="feather icon-home"></i>
                                                        </a>
                                                    @endif

                                                    {{--  <button id="busqueda_avanzada_1" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_1').toggle();">Búsqueda avanzada</button>  --}}
                                                </div>
                                            </div>
                                            <hr>
                                            @if(Auth::user()->hasRole('Profesional'))
                                                <div id="busqueda_avanzada_aparecer_prof_1" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Asistente'))
                                                <div id="busqueda_avanzada_aparecer_asis_1" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Institucion'))
                                                <div id="busqueda_avanzada_aparecer_inst_1" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                                <div id="busqueda_avanzada_aparecer_prof_1" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Servicio'))
                                                <div id="busqueda_avanzada_aparecer_serv_1" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('AsistenCaja'))
                                                <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            @endif
                                            {{--  <div id="busqueda_avanzada_aparecer_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">  --}}
                                                     <div class="form-row">
                                                        <div class="col-sm-12 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Fecha de atención</label>
                                                                <input type="date" class="form-control form-control-sm" name="rinde_fecha" id="rinde_fecha">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Asistente</label>
                                                                <select id="rinde_asistente" name="rinde_asistente" class="form-control form-control-sm">
                                                                    <option value="">Seleccione</option>
                                                                    @if($lista_asistente)
                                                                        @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                            <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                <select id="rinde_convenio" name="rinde_convenio" class="form-control form-control-sm">
                                                                    <option value="">Seleccione</option>
                                                                    @if($lista_prevision)
                                                                        @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                            <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                        @endforeach
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Estado Consulta</label>
                                                                <select id="rinde_estado_consulta" name="rinde_estado_consulta" class="form-control form-control-sm">
                                                                    <option value="">Seleccione</option>
                                                                    @if($lista_estado_consulta)
                                                                        @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                            <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                        @endforeach
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm"> Lugar de Atención :</label>
                                                                <select name="lugares_atencion_agenda" id="lugares_atencion_agenda" class="form-control form-control-sm" onchange="buscar_hora_medica();">
																	<option value="0">Seleccione Lugar</option>
																	<option value="11">LA LIGUA</option>
																	<option value="12">INSI</option>
																	<option value="13">Los Andes Kriman</option>
																	<option value="19">CENTRO PRUEBA</option>
																</select>
                                                            </div>
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control-sm"></textarea>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 text-center">
                                                            <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja();">Buscar</button>
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- en este ejemplo esta seleccionado todos los medios de pago-->
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">
                                                    <table id="tabla_rendir_caja" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Id Recepcion</th>
                                                                <th class="text-center align-middle">Fecha</th>
                                                                <th class="text-center align-middle">Enviado por</th>
                                                                <th class="text-center align-middle">Tipo Autorizacion</th>
                                                                <th class="text-center align-middle">Estado</th>
                                                                <th class="text-center align-middle">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( isset($rendiciones) )
                                                                @foreach($rendiciones as $key_b => $value_b)
                                                                    <tr>
                                                                        <td class="align-middle text-center">{{ $value_b->id }}</td>
                                                                        <td class="align-middle text-center">{{ $value_b->fecha_rendicion }}</td>
                                                                        <td class="align-middle text-center">{{ $value_b->Asistente()->first()->nombres }} {{ $value_b->Asistente()->first()->apellido_uno }} {{ $value_b->Asistente()->first()->apellido_dos }}</td>
                                                                        <td class="align-middle text-center">2</td>
                                                                        <td class="align-middle text-center">{{ $value_b->estado }}</td>
                                                                        <td class="align-middle text-center">
                                                                            <div class="form-group">
                                                                                <button class="btn btn-outline-primary btn-sm" onclick="ver_rendicion({{ $value_b->id }})"><i class="fas fa-eye"></i>Ver</button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" id="enviar_todos" onchange="seleccionar_bonos_rendicion();">
                                                            <label for="enviar_todos"class="cr"></label>
                                                        </div>
                                                        <label>Recepción total</label>
                                                        {{--  (Este switch selecciona todas las recepciones del profesional y envia mensaje (correo electrónico) de validación (código) al profesional de recepción conforme)  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

												<div class="col-md-12">
                                                    <button id="iniciar_procesocobro_rendicion_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline iniciar_procesocobro_rendicion" onclick="">Iniciar Proceso de Cobro</button>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- PESTAÑA GESTION RECEPCION DE PROGRAMAS --}}
                                        <div class="tab-pane" id="pills-programas" role="tabpanel" aria-labelledby="pills-programas-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Rendición de programas</h5>

                                                    @if(Auth::user()->hasRole('Profesional'))
                                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_prof_2').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Asistente'))
                                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_asis_2').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Institucion'))
                                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_inst_2').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_prof_2').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Servicio'))
                                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_serv_2').toggle();">Búsqueda avanzada</button>
                                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                            <i class="feather icon-home"></i>
                                                        </a>  --}}
                                                    @endif
                                                    {{--  <button id="busqueda_avanzada_2" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_2').toggle();">Búsqueda avanzada</button>  --}}
                                                </div>
                                            </div>
                                            <hr>
                                            @if(Auth::user()->hasRole('Profesional'))
                                                <div id="busqueda_avanzada_aparecer_prof_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Asistente'))
                                                <div id="busqueda_avanzada_aparecer_asis_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Institucion'))
                                                <div id="busqueda_avanzada_aparecer_inst_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                                <div id="busqueda_avanzada_aparecer_prof_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Servicio'))
                                                <div id="busqueda_avanzada_aparecer_serv_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                                <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                    <i class="feather icon-home"></i>
                                                </a>  --}}
                                            @endif
                                            {{--  <div id="busqueda_avanzada_aparecer_2" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">  --}}
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha de atención</label>
                                                            <input type="date" class="form-control form-control-sm" name="rinde_progr_fecha" id="rinde_progr_fecha">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Asistente</label>
                                                            <select id="rinde_progr_asistente" name="rinde_progr_asistente" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_asistente)
                                                                    @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                        <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Convenio</label>
                                                            <select id="rinde_progr_convenio" name="rinde_progr_convenio" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_prevision)
                                                                    @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                        <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Estado Consulta</label>
                                                            <select id="rinde_progr_estado_consulta" name="rinde_progr_estado_consulta" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_estado_consulta)
                                                                    @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                        <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 text-center">
                                                        <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_programa();">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <table id="tabla_programas" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap text-center align-middle">Convenio</th>
                                                            <th class="text-center align-middle">Nº de Programa</th>
                                                            <th class="text-center align-middle">Codigo</th>
                                                            <th class="text-center align-middle">Tipo</th>
                                                            <th class="text-center align-middle">Fecha de Atención</th>
                                                            <th class="text-center align-middle">Paciente</th>
                                                            <th class="text-center align-middle">Valor </th>
                                                            <th class="text-center align-middle">Estado Consulta</th>
                                                            <th class="text-center align-middle">Recepción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( isset($bonos_programa) )
                                                            @foreach($bonos_programa as $key_bp => $value_bp)
                                                                <tr >
                                                                    <td class="align-middle text-center">{{ $value_bp->Convenio()->first()->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $value_bp->numero_sesiones }}</td>
                                                                    <td class="align-middle text-center">{{ $value_bp->numero_bono }}</td>
                                                                    <td class="align-middle text-center">{{ $value_bp->TipoBono()->first()->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $value_bp->fecha_atencion }}</td>
                                                                    <td class="align-middle text-center">
                                                                        <span>{{ $value_bp->Paciente()->first()->nombres }} {{ $value_bp->Paciente()->first()->apellido_uno }} {{ $value_bp->Paciente()->first()->apellido_dos }}</span><br>
                                                                        <span>{{ $value_bp->Paciente()->first()->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">${{ number_format($value_bp->valor_atencion, 2, ",", ".") }}</td>
                                                                    <td class="align-middle text-center">{{ $value_bp->estado_consulta }}</td>
                                                                    <td class="align-middle text-center">
                                                                        <div class="form-group">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="rendir_caja_programa_{{ $value_bp->id }}">
                                                                                <label for="rendir_caja_{{ $value_bp->id }}"
                                                                                    class="cr"></label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- PESTAÑA DE GESTION DE BONOS --}}
                                        <div class="tab-pane" id="pills-gestion_bonos" role="tabpanel" aria-labelledby="pills-gestion_bonos-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Gestión de Bonos</h5>

                                                    @if(Auth::user()->hasRole('Profesional'))
                                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_prof_3').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Asistente'))
                                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_asis_3').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Institucion'))
                                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_inst_3').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_prof_3').toggle();">Búsqueda avanzada</button>
                                                    @elseif(Auth::user()->hasRole('Servicio'))
                                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_serv_3').toggle();">Búsqueda avanzada</button>
                                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                            <i class="feather icon-home"></i>
                                                        </a>  --}}
                                                    @endif
                                                    {{--  <button id="busqueda_avanzada_3" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_3').toggle();">Búsqueda avanzada</button>  --}}
                                                    <div class="clearfix"></div>
                                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="btn btn-sm btn-outline-info mr-1 active" id="pills-bonos_por_cobrar-tab" data-toggle="pill" href="#pills-bonos_por_cobrar" role="tab" aria-controls="pills-bonos_por_cobrar" aria-selected="true">
                                                                Bonos por Cobrar
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="btn btn-sm btn-outline-info mr-1" id="pills-bonos_enviados-tab" data-toggle="pill" href="#pills-bonos_enviados" role="tab" aria-controls="pills-bonos_enviados" aria-selected="true">
                                                                Bonos enviados a cobro (archivo CSV)
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="btn btn-sm btn-outline-info mr-1" id="pills-bonos_totales-tab" data-toggle="pill" href="#pills-bonos_totales" role="tab" aria-controls="pills-bonos_totales" aria-selected="true">
                                                                Bonos Totales
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="pills-bonos_por_cobrar" role="tabpanel" aria-labelledby="pills-bonos_por_cobrar-tab">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Bonos por Cobrar</h5>
                                                                </div>
                                                                <table id="tabla_gestion_bonos" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-wrap text-center align-middle">Convenio</th>
                                                                            <th class="text-center align-middle">Codigo</th>
                                                                            <th class="text-center align-middle">Tipo</th>
                                                                            <th class="text-center align-middle">Clase</th>
                                                                            <th class="text-center align-middle">Fecha de Atención</th>
                                                                            <th class="text-center align-middle">Paciente</th>
                                                                            <th class="text-center align-middle">Valor Total</th>
                                                                            <th class="text-center align-middle">Estado Consulta</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @if( isset($bonos_rendidos) )

                                                                            @foreach($bonos_rendidos as $key_br => $value_br)
                                                                                <tr >
                                                                                    <td class="align-middle text-center">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                                    <td class="align-middle text-center">{{ $value_br->numero_bono }}</td>
                                                                                    <td class="align-middle text-center">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                                    <td class="align-middle text-center">
                                                                                        @if($value_br->id_clase_bono == 1)
                                                                                                    Bono Emitido por Institucion
                                                                                                @elseif($value_br->id_clase_bono == 2 || $value_br->id_clase_bono == 3)
                                                                                                    Boucher
                                                                                                @elseif($value_br->id_clase_bono == 4)
                                                                                                    Bono Web
                                                                                                @elseif($value_br->id_clase_bono == 5)
                                                                                                    Bono Web Pre-Pago
                                                                                                @elseif($value_br->id_clase_bono == 6)
                                                                                                    Particular
                                                                                                @elseif($value_br->id_clase_bono == 7)
                                                                                                    Copago
                                                                                                @else
                                                                                                    Otro
                                                                                                @endif
                                                                                    </td>
                                                                                    <td class="align-middle text-center">{{ $value_br->fecha_atencion }}</td>
                                                                                    <td class="align-middle text-center">
                                                                                        <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                                        <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                                    </td>
                                                                                    <td class="align-middle text-center">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                                    <td class="align-middle text-center">{{ $value_br->estado_consulta }}</td>

                                                                                </tr>
                                                                            @endforeach
                                                                        @endif

                                                                    </tbody>
                                                                </table>
                                                                <div class="row">
                                                                    <div class="col-md-4">

                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <button id="arch_csv" type="button" class="btn btn-outline-primary btn-sm float-right d-inline iniciar_procesocobro" onclick="generarCSV()">Generar archivo csv</button>
                                                                    </div>
                                                                    <div class="col-md-4">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="pills-bonos_enviados" role="tabpanel" aria-labelledby="pills-bonos_enviados-tab">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Bonos generados CSV</h5>
                                                                </div>
                                                                <table id="tabla_gestion_bonos_generados" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-wrap text-center align-middle">Convenio</th>
                                                                            <th class="text-center align-middle">Codigo</th>
                                                                            <th class="text-center align-middle">Tipo</th>
                                                                            <th class="text-center align-middle">Clase</th>
                                                                            <th class="text-center align-middle">Fecha de Atención</th>
                                                                            <th class="text-center align-middle">Paciente</th>
                                                                            <th class="text-center align-middle">Valor Total</th>
                                                                            <th class="text-center align-middle">Estado Consulta</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @if( isset($bonos_rendidos_generados) )

                                                                            @foreach($bonos_rendidos_generados as $key_br => $value_br)
                                                                                <tr >
                                                                                    <td class="align-middle text-center">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                                    <td class="align-middle text-center">{{ $value_br->numero_bono }}</td>
                                                                                    <td class="align-middle text-center">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                                    <td class="align-middle text-center">
                                                                                        @if($value_br->id_clase_bono == 1)
                                                                                                    Bono Emitido por Institucion
                                                                                                @elseif($value_br->id_clase_bono == 2 || $value_br->id_clase_bono == 3)
                                                                                                    Boucher
                                                                                                @elseif($value_br->id_clase_bono == 4)
                                                                                                    Bono Web
                                                                                                @elseif($value_br->id_clase_bono == 5)
                                                                                                    Bono Web Pre-Pago
                                                                                                @elseif($value_br->id_clase_bono == 6)
                                                                                                    Particular
                                                                                                @elseif($value_br->id_clase_bono == 7)
                                                                                                    Copago
                                                                                                @else
                                                                                                    Otro
                                                                                                @endif
                                                                                    </td>
                                                                                    <td class="align-middle text-center">{{ $value_br->fecha_atencion }}</td>
                                                                                    <td class="align-middle text-center">
                                                                                        <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                                        <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                                    </td>
                                                                                    <td class="align-middle text-center">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                                    <td class="align-middle text-center">{{ $value_br->estado_consulta }}</td>

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

                                            <hr>

                                            @if(Auth::user()->hasRole('Profesional'))
                                                <div id="busqueda_avanzada_aparecer_prof_3" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Asistente'))
                                                <div id="busqueda_avanzada_aparecer_asis_3" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Institucion'))
                                                <div id="busqueda_avanzada_aparecer_inst_3" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                                <div id="busqueda_avanzada_aparecer_prof_3" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            @elseif(Auth::user()->hasRole('Servicio'))
                                                <div id="busqueda_avanzada_aparecer_serv_3" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                            {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                                <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                    <i class="feather icon-home"></i>
                                                </a>  --}}
                                            @endif
                                            {{--  <div id="busqueda_avanzada_aparecer_3" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">  --}}
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha de atención</label>
                                                            <input type="date" class="form-control form-control-sm" name="gestion_fecha" id="gestion_fecha">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Asistente</label>
                                                            <select id="gestion_asistente" name="gestion_asistente" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_asistente)
                                                                    @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                        <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Convenio</label>
                                                            <select id="gestion_convenio" name="gestion_convenio" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_prevision)
                                                                    @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                        <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Estado Consulta</label>
                                                            <select id="gestion_estado_consulta" name="gestion_estado_consulta" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_estado_consulta)
                                                                    @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                        <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 text-center">
                                                        <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_rendicion();">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        {{-- PESTAÑA DE GESTION DE BONOS PROGRAMAS --}}
                                        <div class="tab-pane" id="pills-gestion_bonos_programa" role="tabpanel" aria-labelledby="pills-gestion_bonos_programa-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Gestión de Bonos Programa</h5>
                                                    <button id="busqueda_avanzada_4" type="button" class="btn btn-outline-primary btn-sm float-right d-inline" onclick="$('#busqueda_avanzada_aparecer_4').toggle();">Búsqueda avanzada</button>
                                                </div>
                                            </div>
                                            <hr>

                                            <div id="busqueda_avanzada_aparecer_4" style="display:none" class="bg-light pt-4 pb-2 px-3 mb-3">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha de atención</label>
                                                            <input type="date" class="form-control form-control-sm" name="gestion_progr_fecha" id="gestion_progr_fecha">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Asistente</label>
                                                            <select id="gestion_progr_asistente" name="gestion_progr_asistente" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_asistente)
                                                                    @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                        <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Convenio</label>
                                                            <select id="gestion_progr_convenio" name="gestion_progr_convenio" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_prevision)
                                                                    @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                        <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Estado Consulta</label>
                                                            <select id="gestion_progr_estado_consulta" name="gestion_progr_estado_consulta" class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if($lista_estado_consulta)
                                                                    @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                        <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 text-center">
                                                        <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_rendicion_programa();">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="tabla_gestion_bonos_programa" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Convenio</th>
                                                        <th class="text-center align-middle">Nº de Programa</th>
                                                        <th class="text-center align-middle">Codigo</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Fecha de Atención</th>
                                                        <th class="text-center align-middle">Paciente</th>
                                                        <th class="text-center align-middle">Valor Total</th>
                                                        <th class="text-center align-middle">Estado consulta</th>
                                                        <th class="text-center align-middle">Accion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if( isset($bonos_rendidos) )
                                                        @foreach($bonos_rendidos as $key_br => $value_br)
                                                            <tr >
                                                                <td class="align-middle text-center">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                <td class="align-middle text-center">{{ $value_br->numero_sesiones }}</td>
                                                                <td class="align-middle text-center">{{ $value_br->numero_bono }}</td>
                                                                <td class="align-middle text-center">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                <td class="align-middle text-center">{{ $value_br->fecha_atencion }}</td>
                                                                <td class="align-middle text-center">
                                                                    <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                    <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                </td>
                                                                <td class="align-middle text-center">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                <td class="align-middle text-center">{{ $value_br->estado_consulta }}</td>
                                                                <td class="align-middle text-center">
                                                                    <div class="form-group">
                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                            <input type="checkbox" id="rendir_caja_programa_{{ $value_br->id }}">
                                                                            <label for="rendir_caja_{{ $value_br->id }}"
                                                                                class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>

                                        </div>

										{{-- PESTAÑA DE VENTA DE BONOS PROGRAMAS --}}
                                        <div class="tab-pane" id="pills-venta_bonos" role="tabpanel" aria-labelledby="pills-venta_bonos-tab">
											<div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Venta de Bonos</h5>
                                                </div>
                                            </div>
                                            <hr>
											<div class="form-row">
												<div class="col-sm-12 col-md-2">
													<div class="form-group">
														<label class="floating-label-activo-sm">Fecha de Rendición</label>
														<input type="date" class="form-control form-control-sm" name="gestion_progr_fecha" id="gestion_progr_fecha">
													</div>
												</div>
												<div class="col-sm-12 col-md-2">
													<div class="form-group">
														<label class="floating-label-activo-sm">Rendir a:</label>
														<select id="gestion_progr_asistente" name="gestion_progr_asistente" class="form-control form-control-sm">
															<option value="">Seleccione</option>
															@if($lista_asistente)
																@foreach($lista_asistente as $key_asistente => $value_asistente)
																	<option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
																@endforeach
															@endif
														</select>
													</div>
												</div>
												<div class="col-sm-12 col-md-2">
													<div class="form-group">
														<label class="floating-label-activo-sm">Convenio</label>
														<select id="gestion_progr_convenio" name="gestion_progr_convenio" class="form-control form-control-sm">
															<option value="">Seleccione</option>
															@if($lista_prevision)
																@foreach($lista_prevision as $key_prevision => $value_prevision)
																	<option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>

																@endforeach
															@endif
															<option value="0000">Todos</option>
														</select>
													</div>
												</div>
												<div class="col-sm-12 col-md-2 text-center">
													<button class="btn btn-block btn-sm btn-primary" onclick="cargar_flujo_caja_rendicion_programa();">Solicitar Código</button>
												</div>
												<div class="col-sm-12 col-md-2">
													<div class="form-group">
														<label class="floating-label-activo-sm">Código Aceptación</label>
													   <input type="text" class="form-control form-control-sm" name="cod_acept_rendicion" id="cod_acept_rendicion"value="">
													</div>
												</div>
												<div class="col-sm-12 col-md-2 text-center">
													<button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_rendicion_programa();">Rendir Venta Diaria</button>
												</div>
											</div>
											<div>
                                                <table id="tabla_venta_bonos" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap text-center align-middle">Folio Bono</th>
                                                            <th class="text-center align-middle">Estado</th>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">Valor</th>
                                                            <th class="text-center align-middle">Ap.Seguro</th>
                                                            <th class="text-center align-middle">T.Copago</th>
                                                            <th class="text-center align-middle"><label>Rut Prestador</label><br><label>Nombre</label></th>
                                                            <th class="text-center align-middle">Convenio</th>
                                                            {{-- <th class="text-center align-middle">Asegurador</th> --}}
                                                            <th class="text-center align-middle">Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( isset($bonos_rendidos) )
                                                            @foreach($bonos_rendidos as $key_br => $value_br)
                                                                <tr >
                                                                    <td class="align-middle text-center">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $value_br->numero_sesiones }}</td>
                                                                    <td class="align-middle text-center">{{ $value_br->numero_bono }}</td>
                                                                    <td class="align-middle text-center">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $value_br->fecha_atencion }}</td>
                                                                    <td class="align-middle text-center">
                                                                        <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                        <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                    <td class="align-middle text-center">{{ $value_br->estado_consulta }}</td>
                                                                    <td class="align-middle text-center">
                                                                        <div class="form-group">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="rendir_caja_programa_{{ $value_br->id }}">
                                                                                <label for="rendir_caja_{{ $value_br->id }}"
                                                                                    class="cr"></label>
                                                                            </div>
                                                                        </div>
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
            </div>
        </div>
    </div>
    <input type="hidden" id="bonos_rendidos_fonasa" value="{{ $bonos_fonasa }}">
    <input type="hidden" id="bonos_rendidos_otros" value="{{ $bonos_otros }}">
    <input type="hidden" id="bonos_agrupados_convenio" value="{{ $bonos_agrupados_convenio }}">
    <!--Cierre: Container Completo-->
    {{-- @include('page.flujo_cajas.asistente_cm_publico.modales.ver_rendicion') --}}
    @include('app.profesional.modales.flujo_caja.ver_rendicion')
@endsection

@section('page-script')
    <script>
        $(document).ready(function(){
            $('#tabla_rendir_caja').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_programas').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_gestion_bonos').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_gestion_bonos_programa').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_venta_bonos').DataTable({
                responsive: true,
            });
        });

        $(document).ready(function(){
            $('#tabla_gestion_bonos_generados').DataTable({
                responsive: true,
            });
        });

        function ver_rendicion(id){
            let url = "{{ route('flujo_caja.profesional.rendicion.show', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data){
                    // abrir modal
                    $('#ver_rendicion').modal('show');
                    $('#ver_rendicion .modal-body').html(data);
                },
                error: function(error){
                    console.log(error);
                }

            });

        }

        function generarCSV(){
            // preguntar si desea generar el archivo csv
            swal({
                title: "¿Está seguro de generar el archivo CSV?",
                text: "Una vez generado el archivo. \nSera destinado a la carpeta Descargas de su equipo.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((aceptar) => {
                if (aceptar) {
                    regenerarCSV();
                } else {
                    swal("La acción ha sido cancelada");
                }
            });


        }

        function regenerarCSV(){
            // crear array de prueba con el array de bonos rendidos
            let array_fonasa = JSON.parse($('#bonos_rendidos_fonasa').val());
            let array_otros = JSON.parse($('#bonos_rendidos_otros').val());
            let array_bonos_agrupados = JSON.parse($('#bonos_agrupados_convenio').val());
            console.log(array_bonos_agrupados);


            var url = "{{ route('flujo_caja.profesional.rendicion.cambiar_estado') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    bonos_fonasa: JSON.stringify(array_fonasa),
                    bonos_otros: JSON.stringify(array_otros),
                    bonos_agrupados: JSON.stringify(array_bonos_agrupados)
                },
                success: function(resp){
                    console.log(resp);
                    // let data = array_bonos_agrupados;
                    // console.log(data);
                    // // dar formato a la fecha
                    // let fecha_hoy = new Date();
                    // fecha_hoy = fecha_hoy.getDate() + '-' + (fecha_hoy.getMonth() + 1) + '-' + fecha_hoy.getFullYear();

                    // // Recorre cada propiedad del objeto
                    // for (let key in data) {
                    //     if (data.hasOwnProperty(key)) {
                    //         let array = data[key];
                    //         let csv = '';
                    //         let rut_profesional = array[0].rut_profesional;
                    //         let convenio = array[0].convenio;
                    //         console.log(rut_profesional);

                    //         // Recorre cada elemento del array
                    //         array.forEach(function(row){
                    //             csv += row.numero_bono + ',' + row.rut_paciente + ',' + fecha_hoy + '\n';
                    //         });

                    //         console.log(csv);
                    //         let hiddenElement = document.createElement('a');
                    //         hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                    //         hiddenElement.target = '_blank';
                    //         hiddenElement.download = 'gestionBonos_'+key+'_'+fecha_hoy+'_'+rut_profesional+'_'+convenio+'.csv';
                    //         hiddenElement.click();
                    //     }
                    // }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    </script>
@endsection

