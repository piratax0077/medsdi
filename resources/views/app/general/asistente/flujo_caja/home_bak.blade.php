{{-- @extends('layouts.templateFlujoCaja') --}}
@extends('template.asistente_cm_publico.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center mt-4">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/flujo-caja') }}">Flujo de caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="user-profile user-card pt-0 mt-2">
                        <div class="card-body py-0">
                            <div class="user-about-block m-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                          {{--  @if ($es_institucion)
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset " id="tab_redicion_cm-tab" data-toggle="tab" href="#tab_redicion_cm" role="tab" aria-controls="tab_redicion_cm" aria-selected="true">Rendición a CM</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="tab_redicion_prof-tab" data-toggle="tab" href="#tab_redicion_prof" role="tab" aria-controls="tab_redicion_prof" aria-selected="true">Rendición a profesional</a>
                                                </li>
                                            @else
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="tab_redicion_prof-tab" data-toggle="tab" href="#tab_redicion_prof" role="tab" aria-controls="tab_redicion_prof" aria-selected="true">Rendición a profesional</a>
                                                </li>
                                            @endif


                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="tab_recepcion_programas-tab" data-toggle="tab" href="#tab_recepcion_programas" role="tab" aria-controls="tab_recepcion_programas" aria-selected="true">Recepción de programas</a>
                                            </li>  --}}
                                            <li class="nav-item">
                                                <a class="nav-link text-reset active" id="rendiciones-tab" data-toggle="tab" href="#rendiciones" role="tab" aria-controls="rendiciones" aria-selected="true">Rendiciones</a>
                                            </li>

                                             <li class="nav-item">
                                                <a class="nav-link text-reset" id="caja-cm-tab" data-toggle="tab" href="#caja-cm" role="tab" aria-controls="caja-cm" aria-selected="true">Gestión de cajas</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="ventas-cm-tab" data-toggle="tab" href="#ventas-cm" role="tab" aria-controls="ventas-cm" aria-selected="true">Ventas</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="garantia-cm-tab" data-toggle="tab" href="#garantia-cm" role="tab" aria-controls="garantia-cm" aria-selected="true">Registro de Garantías</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="tab-content mt-4" id="pills-tabContent">
                        {{-- PESTAÑA RENDICION DE CAJA CM--}}
                        <div class="tab-pane fade  " id="tab_redicion_cm" role="tabpanel" aria-labelledby="tab_redicion_cm-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                     <h5 class="text-c-blue f-18 pt-1">Rendir caja del {{ date('d-m-Y') }}</h5>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <input type="hidden" name="lista_bonos" id="lista_bonos" value="{{ $lista_bonos }}">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Nº de Bonos</label>
                                                            <input type="number" class="form-control form-control-sm" id="numero_bonos" name="numero_bonos" value="{{ $total_bonos }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Efectivo</label>
                                                            <input type="number" class="form-control form-control-sm" id="efectivo" name="efectivo" value="{{ $total_efectivo }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Otros</label>
                                                            <input type="number" class="form-control form-control-sm" id="otros" name="otros" value="{{ $total_otros }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total documentos</label>
                                                            <input type="number" class="form-control form-control-sm" id="total" name="total" value="{{ $total }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxxl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Recibe caja</label>
                                                            <select name="id_asistente_receptor" id="id_asistente_receptor" class="form-control form-control-sm">
                                                                @if($listado_recibe)
                                                                    @foreach ( $listado_recibe as $recibe )
                                                                        <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombres.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="observaciones_rendicion" id="observaciones_rendicion"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">
                                                         <button class="btn btn-block btn-sm btn-outline-primary" onclick="$('#up_archivo_cm').toggle();"> <i class="feather icon-upload"></i> Subir archivo</button>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">
                                                        <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Rendir caja</button>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                        <button class="btn btn-block btn-sm btn-outline-secondary" onclick="generar_pdf_rendicion_cm();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Generar PDF</button>
                                                    </div>
                                                    <div id="up_archivo_cm" style="display:none" class="col-sm-12 col-md-12">
                                                        <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <!-- [ Main Content ] start -->
                                                                <div class="dropzone" id="mis-archivos-rendicion" action="{{ route('rendir.archivo.carga') }}">
                                                                </div>
                                                                <!-- [ file-upload ] end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label for="" class="floating-label-activo-sm">Fecha</label>
                                                        <input type="date" value="<?php echo date('Y-m-d'); ?>" id="fecha_rendicion" class="form-control form-control-sm">
                                                    </div>
                                                    <button type="button" class="btn btn-outline-success btn-sm mt-3 w-100" onclick="buscarRendicion()"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Tipo pago</th>
                                                                    <th class="align-middle">Aporte seguros</th>
                                                                    <th class="align-middle">Aporte convenio</th>

                                                                    <th class="align-middle">Copago paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">F/Atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Profesional</th>
                                                                    <th class="align-middle">Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if( isset($bono) )
                                                                    @foreach($bono as $key_b => $value_b)
                                                                        <tr >
                                                                            <td class="align-middle">{{ $value_b->TipoBono()->first()->nombre }}</td>
                                                                            <td class="align-middle">{{ $value_b->numero_bono }}</td>
                                                                            <td class="align-middle">{{ $value_b->Convenio()->first()->nombre }}</td>
                                                                            <td class="align-middle">
                                                                                @if($value_b->id_clase_bono == 1)
                                                                                    Emitido por la institución
                                                                                 @elseif($value_b->id_clase_bono == 2)
                                                                                    Control sin costo
                                                                                {{--@elseif($value_b->id_clase_bono == 3)
                                                                                    Caja Vecina
                                                                                @elseif($value_b->id_clase_bono == 4)
                                                                                    Bono Web
                                                                                @elseif($value_b->id_clase_bono == 5)
                                                                                    Bono Web Pre-Pago --}}
                                                                                @elseif($value_b->id_clase_bono == 6)
                                                                                    Particular
                                                                                @elseif($value_b->id_clase_bono == 8)
                                                                                    Garantía
                                                                                @elseif($value_b->id_clase_bono == 9)
                                                                                    Bono físico
                                                                                @else
                                                                                    Otro
                                                                                @endif
                                                                            </td>
                                                                            <td class="align-middle">@if($value_b->id_clase_bono != 6) ${{ number_format($value_b->aporte_seguro,0,',','.') }} <button class="btn btn-outline-success btn-xxs" data-toggle="tooltip" data-placement="top" title="Pago mediante: Efectivo, Tarjeta"><i class="fas fa-search"></i></button> @else $0  @endif </td>
                                                                            <td>${{ number_format($value_b->bonificacion,0,',','.') }}</td>
                                                                            <td class="align-middle">${{ number_format($value_b->valor_atencion, 0, ",", ".") }} <button class="btn btn-outline-success btn-xxs" data-toggle="tooltip" data-placement="top" title="Pago mediante: Efectivo, Tarjeta"><i class="fas fa-search"></i></button> </td>
                                                                            <td class="align-middle">${{ number_format($value_b->a_pagar,0,',','.') }}</td>


                                                                            <td class="align-middle">{{ $value_b->fecha_atencion }}</td>


                                                                            <td class="align-middle">
                                                                                <span>{{ $value_b->Paciente()->first()->nombres }} {{ $value_b->Paciente()->first()->apellido_uno }} {{ $value_b->Paciente()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Paciente()->first()->rut }}</span>
                                                                            </td>

                                                                            <td class="align-middle">
                                                                                <span>{{ $value_b->Profesional()->first()->nombres }} {{ $value_b->Profesional()->first()->apellido_uno }} {{ $value_b->Profesional()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Profesional()->first()->rut }}</span>
                                                                            </td>
                                                                            <td class="align-middle">{{ $value_b->responsable }}</td>
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

                        {{-- PESTAÑA RENDICION DE CAJA A PROFESIONAL
                        <div class="tab-pane fade" id="tab_redicion_prof" role="tabpanel" aria-labelledby="tab_redicion_prof-tab">

                        </div>--}}

                        {{-- PESTAÑA RENDICION PROGRAMAS DE CAJA A PROFESIONAL
                        <div class="tab-pane fade" id="tab_recepcion_programas" role="tabpanel" aria-labelledby="tab_recepcion_programas-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h5 class="text-c-blue f-18 pt-1">Recepción de programas del {{ date('d-m-Y') }}</h5>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Tipo Bono</th>
                                                                    <th class="align-middle">Aporte Convenio</th>
                                                                    <th class="align-middle">Aporte Seguros</th>
                                                                    <th class="align-middle">Copago Paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">F/Atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Profesional</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @if( isset($bono) )
                                                                    @foreach($bono as $key_b => $value_b)
                                                                        <tr >
                                                                            <td class="align-middle text-center">{{ $value_b->TipoBono()->first()->nombre }}</td>
                                                                            <td class="align-middle text-center">{{ $value_b->numero_bono }}</td>
                                                                            <td class="align-middle text-center">{{ $value_b->Convenio()->first()->nombre }}</td>
                                                                            <td class="align-middle text-center">
                                                                                @if($value_b->id_clase_bono == 1)
                                                                                    Bono Fisico
                                                                                @elseif($value_b->id_clase_bono == 2)
                                                                                    Sencillito
                                                                                @elseif($value_b->id_clase_bono == 3)
                                                                                    Caja Vecina
                                                                                @elseif($value_b->id_clase_bono == 4)
                                                                                    Bono Web
                                                                                @elseif($value_b->id_clase_bono == 5)
                                                                                    Bono Web Pre-Pago
                                                                                @elseif($value_b->id_clase_bono == 6)
                                                                                    Particular
                                                                                @else
                                                                                    Otro
                                                                                @endif
                                                                            </td>
                                                                            <td></td>

                                                                            <td></td>
                                                                            <td class="align-middle text-center"><button class="btn btn-outline-success btn-sm"><i class="fas fa-search"></i></button> </td>
                                                                            <td class="align-middle text-center">${{ number_format($value_b->valor_atencion, 2, ",", ".") }}</td>
                                                                            <td class="align-middle text-center">{{ $value_b->fecha_atencion }}</td>


                                                                            <td class="align-middle text-center">
                                                                                <span>{{ $value_b->Paciente()->first()->nombres }} {{ $value_b->Paciente()->first()->apellido_uno }} {{ $value_b->Paciente()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Paciente()->first()->rut }}</span>
                                                                            </td>

                                                                            <td class="align-middle text-center">
                                                                                <span>{{ $value_b->Profesional()->first()->nombres }} {{ $value_b->Profesional()->first()->apellido_uno }} {{ $value_b->Profesional()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Profesional()->first()->rut }}</span>
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
                        </div>--}}
                        {{-- RENDICIONES BONOS Y PROGRAMAS NUEVA VISTA--}}
                        <div class="tab-pane fade show active" id="rendiciones" role="tabpanel" aria-labelledby="tab-rendiciones-tab">
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="bono-rendicion-prof-tab" data-toggle="pill" href="#bono-rendicion-prof" role="tab" aria-controls="bono-rendicion-prof" aria-selected="true">
                                                        Rendición de bonos
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="programa-rendicion-prof-tab" data-toggle="pill" href="#programa-rendicion-prof" role="tab" aria-controls="programa-rendicion-prof" aria-selected="true">
                                                        Rendición de programas
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--PESTAÑAS-->
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="tab-content">
                                        <!---RENDICION DE BONOS-->
                                        <div class="tab-pane show active" id="bono-rendicion-prof" role="tabpanel" aria-labelledby="bono-rendicion-prof-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="text-c-blue f-18 pt-1">Rendir bonos del {{ date('d-m-Y') }}</h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <input type="hidden" name="lista_bonos_prof" id="lista_bonos_prof" value="">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nº de bonos</label>
                                                                                <input type="number" class="form-control form-control-sm" id="numero_bonos_prof" name="numero_bonos_prof" value="" readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Efectivo</label>
                                                                                <input type="number" class="form-control form-control-sm" id="efectivo_prof" name="efectivo_prof" value="" readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Otros</label>
                                                                                <input type="number" class="form-control form-control-sm" id="otros_prof" name="otros_prof" value="" readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Total documentos</label>
                                                                                <input type="number" class="form-control form-control-sm" id="total_prof" name="total_prof" value="" readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Recibe caja</label>
                                                                                <select name="id_asistente_receptor_prof" id="id_asistente_receptor_prof" class="form-control form-control-sm" onclick="cargar_registros_prof();">
                                                                                    @if($listado_recibe_prof)
                                                                                        @foreach ( $listado_recibe_prof as $recibe )
                                                                                            <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombre.' '.$recibe->apellido_uno).' ('.$recibe->rut.')' }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                            <button class="btn btn-block btn-sm btn-outline-primary" onclick="$('#up_archivo_prof').toggle();"> <i class="feather icon-upload"></i> Subir archivo</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                            <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Rendir Caja</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                            <button class="btn btn-block btn-sm btn-outline-secondary" onclick="generar_pdf_rendicion_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Generar PDF</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                            <div id="up_archivo_prof" style="display:none" >
                                                                                <input type="hidden" name="input_lista_archivo_prof" id="input_lista_archivo_prof" value="">
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-12">
                                                                                        <!-- [ Main Content ] start -->
                                                                                        <div class="dropzone" id="mis-archivos-rendicion-prof" action="{{ route('rendir.archivo.carga') }}">
                                                                                        </div>
                                                                                        <!-- [ file-upload ] end -->
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
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5>Bonos (Detalle)</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="dt-responsive table-responsive">
                                                                        <table id="tabla_rendir_caja_prof" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Fecha</th>
                                                                                    <th>Tipo de <br>atención</th>
                                                                                    <th>Convenio y código</th><!--Poner el codigo como small y salto de linea-->
                                                                                    <th>Medio de pago</th>
                                                                                    <th>Aporte seguros</th>
                                                                                    <th>Aporte convenio</th>
                                                                                    <th>Copago paciente</th>
                                                                                    <th>Valor total</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Profesional</th>
                                                                                    <th>Rendición</th><!--PONER EN BADGE AMARILLO PENDIENTE Y  VERDE RENDIDO-->
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
                                        <!--RENDICION PROGRAMAS-->
                                           <div class="tab-pane fade" id="programa-rendicion-prof" role="tabpanel" aria-labelledby="programa-rendicion-prof-tab">
                                              {{--<div id="busqueda_avanzada_aparecer_2" style="display:none">
                                                <div class="row">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5>Bonos <span class="badge badge-secondary">Detalle</span></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-row">
                                                                                <input type="hidden" name="lista_bonos_prof" id="lista_bonos_prof" value="">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Nº de programas</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="numero_bonos_prof" name="numero_bonos_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Efectivo</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="efectivo_prof" name="efectivo_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Otros</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="otros_prof" name="otros_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Total documentos</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="total_prof" name="total_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Recibe caja</label>
                                                                                                <select name="id_asistente_receptor_prof" id="id_asistente_receptor_prof" class="form-control form-control-sm" onclick="cargar_registros_prof();">
                                                                                                    @if($listado_recibe_prof)
                                                                                                        @foreach ( $listado_recibe_prof as $recibe )
                                                                                                            <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombre.' '.$recibe->apellido_uno).' ('.$recibe->rut.')' }}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                                            <button class="btn btn-block btn-sm btn-outline-primary" onclick="$('#up_archivo_prof').toggle();"> <i class="feather icon-upload"></i> Subir archivo</button>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                                            <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Rendir Caja</button>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                                            <button class="btn btn-block btn-sm btn-outline-secondary" onclick="generar_pdf_rendicion_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Generar PDF</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                                            <div id="up_archivo_prof" style="display:none" >
                                                                                                <input type="hidden" name="input_lista_archivo_prof" id="input_lista_archivo_prof" value="">
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-12">
                                                                                                        <!-- [ Main Content ] start -->
                                                                                                        <div class="dropzone" id="mis-archivos-rendicion-prof" action="{{ route('rendir.archivo.carga') }}">
                                                                                                        </div>
                                                                                                        <!-- [ file-upload ] end -->
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
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="dt-responsive table-responsive">
                                                                        <table id="tabla_rendir_caja_prof" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Fecha</th>
                                                                                    <th>Tipo de <br>atención</th>
                                                                                    <th>Convenio</th><!--Poner el codigo como small y salto de linea-->
                                                                                    <th>Medio de pago</th>
                                                                                    <th>Aporte seguros</th>
                                                                                    <th>Aporte convenio</th>
                                                                                    <th>Copago paciente</th>
                                                                                    <th>Valor total</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Profesional</th>
                                                                                    <th>Rendición</th><!--PONER EN BADGE AMARILLO PENDIENTE Y  VERDE RENDIDO-->
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
                                                </div>--}}

                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h5 class="text-c-blue f-18 pt-1">Rendición de programas del {{ date('d-m-Y') }}</h5>
                                                    </div>
                                                     <div class="col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-row">
                                                                                <input type="hidden" name="lista_bonos_prof" id="lista_bonos_prof" value="">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Nº de programas</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="numero_bonos_prof" name="numero_bonos_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Efectivo</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="efectivo_prof" name="efectivo_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Otros</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="otros_prof" name="otros_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Total documentos</label>
                                                                                                <input type="number" class="form-control form-control-sm" id="total_prof" name="total_prof" value="" readonly="readonly">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Recibe caja</label>
                                                                                                <select name="id_asistente_receptor_prof" id="id_asistente_receptor_prof" class="form-control form-control-sm" onclick="cargar_registros_prof();">
                                                                                                    @if($listado_recibe_prof)
                                                                                                        @foreach ( $listado_recibe_prof as $recibe )
                                                                                                            <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombre.' '.$recibe->apellido_uno).' ('.$recibe->rut.')' }}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                                            <button class="btn btn-block btn-sm btn-outline-primary" onclick="$('#up_archivo_prof').toggle();"> <i class="feather icon-upload"></i> Subir archivo</button>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                                            <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Rendir Caja</button>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                                                            <button class="btn btn-block btn-sm btn-outline-secondary" onclick="generar_pdf_rendicion_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Generar PDF</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                                            <div id="up_archivo_prof" style="display:none" >
                                                                                                <input type="hidden" name="input_lista_archivo_prof" id="input_lista_archivo_prof" value="">
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-12">
                                                                                                        <!-- [ Main Content ] start -->
                                                                                                        <div class="dropzone" id="mis-archivos-rendicion-prof" action="{{ route('rendir.archivo.carga') }}">
                                                                                                        </div>
                                                                                                        <!-- [ file-upload ] end -->
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
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                        <div class="card">
                                                             <div class="card-header-new-md">
                                                                <h5>Rendición de programas <span class="badge badge-secondary">Detalle</span></h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Fecha</th>
                                                                                        <th>Tipo de <br>atención</th>
                                                                                        <th>Convenio</th><!--Poner el codigo como small y salto de linea-->
                                                                                        <th>Medio de pago</th>
                                                                                        <th>Aporte seguros</th>
                                                                                        <th>Aporte convenio</th>
                                                                                        <th>Copago paciente</th>
                                                                                        <th>Valor total</th>
                                                                                        <th>Paciente</th>
                                                                                        <th>Profesional</th>
                                                                                        <th>Rendición</th><!--PONER EN BADGE AMARILLO PENDIENTE Y  VERDE RENDIDO-->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>00/00/0000</td>
                                                                                        <td>Programa<br>
                                                                                            N° 1223</td>
                                                                                        <td>Banmédica<br><small>CÓD: 23423</small></td>
                                                                                        <td>Débito</td>
                                                                                        <td>$0</td>
                                                                                        <td>$0</td>
                                                                                        <td>$0</td>
                                                                                        <td>$0</td>
                                                                                        <td>
                                                                                            <strong>Oscar Devia<br>
                                                                                            823982934-9</strong>
                                                                                            <br>
                                                                                            <small>Otorrinolaringología</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Jaime Kriman<br>
                                                                                            823982934-9</strong>
                                                                                            <br>
                                                                                            <small>Otorrinolaringología</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="badge badge-success">Rendido</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                      <tr>
                                                                                        <td>00/00/0000</td>
                                                                                        <td>Programa<br>
                                                                                            N° 1223</td>
                                                                                        <td>Banmédica<br><small>CÓD: 23423</small></td>
                                                                                        <td>Débito</td>
                                                                                        <td>$0</td>
                                                                                        <td>$0</td>
                                                                                        <td>$0</td>
                                                                                        <td>$0</td>
                                                                                        <td>
                                                                                            <strong>Oscar Devia<br>
                                                                                            823982934-9</strong>
                                                                                            <br>
                                                                                            <small>Otorrinolaringología</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Jaime Kriman<br>
                                                                                            823982934-9</strong>
                                                                                            <br>
                                                                                            <small>Otorrinolaringología</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="badge badge-warning">Pendiente</span>
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
                            </div>
                        </div>

                        {{-- CAJAS --}}
                        <div class="tab-pane fade" id="caja-cm" role="tabpanel" aria-labelledby="caja-cm-tab">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mb-2">
                                    <h6 class="f-22 text-c-blue mb-3 d-inline">Gestión de cajas</h6>
                                      <button type="button" class="btn btn-info d-inline float-md-right"  onclick="m_abrircaja();"> + Abrir nueva caja </button>
                                </div>
                            </div>
                            <!--CAJA ACTIVA(USANDO)-->
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5><i class="feather icon-credit-card icono-primary"></i> Mi caja actual</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Caja</th>
                                                                                <th>Responsable actual</th>
                                                                                <th>Estado</th>
                                                                                <th>Origen</th>
                                                                                <th>Saldo inicial del día</th>
                                                                                <th>Acumulado del día</th>
                                                                                 <th>Institución</th>
                                                                                 <th>Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($cajas_operativas as $caja)
                                                                                <tr>
                                                                                    <td>
                                                                                        <strong>{{ $caja->caja->nombre_caja }}</strong><br>
                                                                                        <small>{{ $caja->caja->ubicacion }}</small>
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja->responsable)
                                                                                            <strong>{{ $caja->responsable->nombre }} {{ $caja->responsable->apellido_uno }} {{ $caja->responsable->apellido_dos }}</strong><br>
                                                                                            <small>{{ $caja->responsable->rut }}</small>
                                                                                        @else
                                                                                            <span class="badge badge-warning">Sin responsable</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja->estado == 'abierta')
                                                                                            <span class="badge badge-success">Abierta</span>
                                                                                        @elseif($caja->estado == 'cerrada')
                                                                                            <span class="badge badge-danger">Cerrada</span>
                                                                                        @else
                                                                                            <span class="badge badge-secondary">{{ ucfirst($caja->estado) }}</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja->origen == 'apertura_propia')
                                                                                            <span class="badge badge-info">Apertura propia</span>
                                                                                        @elseif($caja->origen == 'recibida')
                                                                                            <span class="badge badge-info">Recibida</span><br>
                                                                                            <small><strong>Desde:</strong> {{ $caja->origen_usuario ? $caja->origen_usuario->nombre.' '.$caja->origen_usuario->apellido_uno.' '.$caja->origen_usuario->apellido_dos : 'N/A' }}</small><br>
                                                                                            <small><strong>RUT:</strong> {{ $caja->origen_usuario ? $caja->origen_usuario->rut : 'N/A' }}</small>
                                                                                        @else
                                                                                            <span class="badge badge-secondary">{{ ucfirst($caja->origen) }}</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        ${{ number_format($caja->monto_inicial, 0, ',', '.') }}
                                                                                    </td>
                                                                                    <td>
                                                                                        ${{ number_format($bonos_vendidos_dia->sum('monto'), 0, ',', '.') }}
                                                                                    </td>
                                                                                     <td>
                                                                                        {{ $caja->nombre_institucion }}
                                                                                    </td>
                                                                                        <td>
                                                                                            <button type="button" class="btn btn-info btn-xxs" onclick="m_detallecajaabierta({{ $caja->id }}, '{{ $caja->caja->nombre_caja }}', '{{ $caja->responsable ? $caja->responsable->nombre . ' ' . $caja->responsable->apellido_uno . ' ' . $caja->responsable->apellido_dos : 'Sin responsable' }}');"><i class="feather icon-search"></i> Ver caja</button>
                                                                                            <!-- editar caja operativa -->
                                                                                            <button type="button" class="btn btn-outline-secondary btn-xxs" onclick="m_editarcajaoperativa({{ $caja->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                                                        </td>

                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card  transfer-card">
                                                        <div class="card-body">
                
                <div class="row align-items-center">

                    <div class="col-md-6">

                        <h4 class="font-weight-bold text-warning f-22 mb-3">
                            <i class="feather icon-bell icono-primary bg-warning"></i>
                            Entrega de Caja Pendiente
                        </h4>

                        <p class="mb-3">
                            <strong>Carolina Vargas</strong> te está haciendo entrega de la
                            <strong>CAJA 1</strong> del lugar de atención
                            <strong>INSI</strong>.
                        </p>

                        <ul class="list-unstyled mb-3">
                            <li class="mb-3">
                                <i class="feather icon-calendar  icono-primary"></i>
                                <strong>Fecha:</strong> 04-06-2026
                            </li>

                            <li>
                                <i class="feather icon-clock  icono-primary"></i>
                                <strong>Hora:</strong> 14:30
                            </li>
                        </ul>

                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-search"></i>
                            Ver detalle de caja
                        </button>

                    </div>

                    <div class="col-md-6 text-center">

                        <button class="btn btn-warning btn-lg px-4 py-3 shadow-sm">
                            <i class="feather icon-check"></i>
                            Aceptar traspaso de caja
                        </button>
                         <button class="btn btn-danger  btn-lg px-4 py-3 shadow-sm">
                            <i class="feather icon-x"></i>
                            Rechazar caja
                        </button>

                    </div>

                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <!--TODAS LAS CAJAS(USANDO)-->
                                            {{-- <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5><i class="feather icon-credit-card icono-primary"></i>Mis cajas</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Caja</th>
                                                                                <th>Responsable actual</th>
                                                                                <th>Estado</th>
                                                                                <th>Origen</th>
                                                                                <th>Saldo inicial del día</th>
                                                                                <th>Acumulado del día</th>
                                                                                 <th>Institución</th>
                                                                                 <th>Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($cajas as $caja)
                                                                                <tr>
                                                                                    <td>
                                                                                        <strong>{{ $caja->nombre_caja }}</strong><br>
                                                                                        <small>{{ $caja->ubicacion }}</small>
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja->responsable)
                                                                                            <strong>{{ $caja->responsable->nombre }} {{ $caja->responsable->apellido_uno }} {{ $caja->responsable->apellido_dos }}</strong><br>
                                                                                            <small>{{ $caja->responsable->rut }}</small>
                                                                                        @else
                                                                                            <span class="badge badge-warning">Sin responsable</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja->estado == 'abierta')
                                                                                            <span class="badge badge-success">Abierta</span>
                                                                                        @elseif($caja->estado == 'cerrada')
                                                                                            <span class="badge badge-danger">Cerrada</span>
                                                                                        @else
                                                                                            <span class="badge badge-secondary">{{ ucfirst($caja->estado) }}</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja->origen == 'apertura_propia')
                                                                                            <span class="badge badge-info">Apertura propia</span>
                                                                                        @elseif($caja->origen == 'recibida')
                                                                                            <span class="badge badge-info">Recibida</span><br>
                                                                                            <small><strong>Desde:</strong> {{ $caja->origen_usuario ? $caja->origen_usuario->nombre.' '.$caja->origen_usuario->apellido_uno.' '.$caja->origen_usuario->apellido_dos : 'N/A' }}</small><br>
                                                                                            <small><strong>RUT:</strong> {{ $caja->origen_usuario ? $caja->origen_usuario->rut : 'N/A' }}</small>
                                                                                        @else
                                                                                            <span class="badge badge-secondary">{{ ucfirst($caja->origen) }}</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        ${{ number_format($caja->monto_inicial, 0, ',', '.') }}
                                                                                    </td>
                                                                                    <td>
                                                                                        ${{ number_format($caja->acumulado, 0, ',', '.') }}
                                                                                    </td>
                                                                                     <td>
                                                                                        {{ $caja->nombre_institucion }}
                                                                                    </td>
                                                                                        <td>
                                                                                                <button type="button" class="btn btn-danger btn-xxs" onclick="eliminarCaja({{ $caja->id }});"><i class="feather icon-trash-2"></i> Eliminar caja</button>
                                                                                            </td>

                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!--HISTORICO DE MIS CAJAS-->
                                            <div class="row mt-3">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5><i class="feather icon-file-text icono-primary"></i> Histórico de cajas</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Fecha</th>
                                                                                <th>Caja</th>
                                                                                <th>Origen</th>
                                                                                <th>Desde</th>
                                                                                <th>Hasta</th>
                                                                                <th>Estado final</th>
                                                                                <th>Recaudación</th>
                                                                                <th>Institución</th>
                                                                                <th>Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse($cajas_operativas_historico as $caja_hist)
                                                                                <tr>
                                                                                    <td>
                                                                                        {{ $caja_hist->fecha_apertura ? \Carbon\Carbon::parse($caja_hist->fecha_apertura)->format('d/m/Y') : '--/--/----' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <strong>{{ $caja_hist->caja->nombre_caja ?? 'N/A' }}</strong><br>
                                                                                        <small>{{ $caja_hist->caja->ubicacion ?? '' }}</small>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-secondary">--</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $caja_hist->fecha_apertura ? \Carbon\Carbon::parse($caja_hist->fecha_apertura)->format('H:i') : '--:--' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $caja_hist->fecha_cierre ? \Carbon\Carbon::parse($caja_hist->fecha_cierre)->format('H:i') : '--:--' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($caja_hist->estado == 'cerrada')
                                                                                            <span class="badge badge-danger">Cerrada</span>
                                                                                        @elseif($caja_hist->estado == 'entregada')
                                                                                            <span class="badge badge-warning">Entregada</span>
                                                                                            @if($caja_hist->entregador && $caja_hist->responsable)
                                                                                                <br><small class="text-muted">
                                                                                                    <i class="feather icon-user"></i>
                                                                                                    {{ $caja_hist->entregador->nombres ?? '' }} {{ $caja_hist->entregador->apellido_uno ?? '' }}
                                                                                                </small>
                                                                                                <br><small class="text-muted">
                                                                                                    <i class="feather icon-arrow-right"></i>
                                                                                                    {{ $caja_hist->responsable->nombres ?? '' }} {{ $caja_hist->responsable->apellido_uno ?? '' }}
                                                                                                </small>
                                                                                                @if($caja_hist->fecha_entrega)
                                                                                                    <br><small class="text-muted">
                                                                                                        <i class="feather icon-clock"></i>
                                                                                                        {{ \Carbon\Carbon::parse($caja_hist->fecha_entrega)->format('d/m/Y H:i') }}
                                                                                                    </small>
                                                                                                @endif
                                                                                            @elseif($caja_hist->responsable)
                                                                                                <br><small>{{ $caja_hist->responsable->nombres ?? '' }} {{ $caja_hist->responsable->apellido_uno ?? '' }}</small>
                                                                                                <br><small>{{ $caja_hist->responsable->rut ?? '' }}</small>
                                                                                            @endif
                                                                                        @else
                                                                                            <span class="badge badge-secondary">{{ ucfirst($caja_hist->estado) }}</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <strong>${{ number_format($caja_hist->total_acumulado ?? 0, 0, ',', '.') }}</strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $caja_hist->caja->lugarAtencion->nombre ?? 'N/A' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-info btn-xxs" onclick="m_detallecajaabierta({{ $caja_hist->id }}, '{{ $caja_hist->caja->nombre_caja ?? 'Caja' }}', '{{ $caja_hist->responsable ? $caja_hist->responsable->nombres . ' ' . $caja_hist->responsable->apellido_uno : 'Sin responsable' }}');"><i class="feather icon-search"></i> Ver caja</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="9" class="text-center">
                                                                                        <span class="text-muted">No hay registros de cajas cerradas o entregadas</span>
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
                             <!--<div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                 <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="micajadiaria-cm-tab" data-toggle="pill" href="#micajadiaria-cm" role="tab" aria-controls="micajadiaria-cm" aria-selected="true">
                                                        Mis cajas diarias
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="cabiertacm-tab" data-toggle="pill" href="#cabiertacm" role="tab" aria-controls="cabiertacm" aria-selected="true">
                                                        Cajas Abiertas
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="cerradacm-tab" data-toggle="pill" href="#cerradacm" role="tab" aria-controls="cerradacm" aria-selected="false">
                                                        Cajas Cerradas
                                                    </a>
                                                </li>-->
                                                <!-- <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="entregacajacm-tab" data-toggle="pill" href="#entregacajacm" role="tab" aria-controls="cerradacm" aria-selected="false">
                                                       Entregas de caja
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="micierrecajacm-tab" data-toggle="pill" href="#micierrecajacm" role="tab" aria-controls="micierrecajacm" aria-selected="false">
                                                       Mis cierres de caja
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!--<div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="micajadiaria-cm" role="tabpanel" aria-labelledby="micajadiaria-cm-tab">

                                        </div>
                                        <div class="tab-pane fade" id="cabiertacm" role="tabpanel" aria-labelledby="cabiertacm-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Cajas Abiertas</h5>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Caja</th>
                                                                                        <th>Responsable</th>
                                                                                        <th>Apertura</th>
                                                                                        <th>Detalle</th>
                                                                                        <th>Saldo Anterior</th>
                                                                                        <th>Saldo inicial</th>
                                                                                        <th>Acumulado</th>
                                                                                         <th>Institución</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Nombre o num caja</strong>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario <br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            12/05/2026 10:55

                                                                                        </td>
                                                                                        <td>
                                                                                                <button type="button" class="btn btn-info btn-xxs" onclick="m_detallecajaabierta();"><i class="feather icon-search"></i> Ver caja</button>
                                                                                        </td>
                                                                                        <td>
                                                                                            $0
                                                                                        </td>
                                                                                        <td>
                                                                                            $0
                                                                                        </td>
                                                                                        <td>
                                                                                            $550.465
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)
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
                                        <div class="tab-pane fade" id="cerradacm" role="tabpanel" aria-labelledby="cerradacm-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Cajas Cerradas</h5>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Caja</th>
                                                                                <th>Responsable</th>
                                                                                <th>Apertura</th>
                                                                                <th>Cierre</th>
                                                                                <th>Detalle</th>
                                                                                <th>Total Abonos</th>
                                                                                <th>Total gastos</th>
                                                                                <th>Saldo cierre</th>
                                                                                <th>Institución</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Nombre o num caja</strong>
                                                                                </td>
                                                                                <td>
                                                                                      <strong>Nombre Usuario <br>
                                                                                        18.233.434-1</strong><br>
                                                                                        <small>Asistente</small>
                                                                                </td>
                                                                                <td>
                                                                                    12/05/2026 10:55

                                                                                </td>
                                                                                <td>
                                                                                    12/05/2026 18:53

                                                                                </td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-info btn-xxs" onclick="m_detallecajacerrada();"><i class="feather icon-search"> Ver caja</button>
                                                                                </td>
                                                                                <td>
                                                                                    $0
                                                                                </td>
                                                                                <td>
                                                                                    $35.000
                                                                                </td>
                                                                                <td>
                                                                                    $550.465
                                                                                </td>
                                                                                <td>
                                                                                    INSI (Casa Matriz)
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

                                        <div class="tab-pane fade" id="entregacajacm" role="tabpanel" aria-labelledby="entregacajacm-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Entregas de cajas</h5>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Caja</th>
                                                                                        <th class="align-middle">Entrega</th>
                                                                                        <th class="align-middle">Recibe</th>
                                                                                        <th class="align-middle">Fecha / Hora</th>
                                                                                        <th class="align-middle">Monto</th>
                                                                                        <th class="align-middle">Institución</th>
                                                                                        <th class="align-middle">Estado</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                         <td>
                                                                                            <strong>Nombre de la caja</strong>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario <br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Laura mena  <br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Administrador</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            12/05/2026 10:55

                                                                                        </td>
                                                                                        <td>
                                                                                               $1.553.345
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)
                                                                                        </td>
                                                                                        <td><span class="badge badge-success">Aprobado</span></td>
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
                                </div>
                            </div>-->

                        </div>

                        {{--  VENTAS --}}
                        <div class="tab-pane fade" id="ventas-cm" role="tabpanel" aria-labelledby="ventas-cm-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mb-2">
                                    <h5 class="text-c-blue d-inline float-left f-22">Ventas </h5>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="venta-bonocm-tab" data-toggle="pill" href="#venta-bonocm" role="tab" aria-controls="venta-bonocm" aria-selected="true">
                                                        Venta de Bonos
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="ventaprogramacm-tab" data-toggle="pill" href="#ventaprogramacm" role="tab" aria-controls="ventaprogramacm" aria-selected="false">
                                                        Venta de programas
                                                    </a>
                                                </li>
                                                <!--<li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="ventatotalprofcm-tab" data-toggle="pill" href="#ventatotalprofcm" role="tab" aria-controls="ventatotalprofcm" aria-selected="false">
                                                        Resumen de ventas por profesional
                                                    </a>
                                                </li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="tab-content">
                                        <!--VENTA BONOS-->
                                        <div class="tab-pane show active" id="venta-bonocm" role="tabpanel" aria-labelledby="venta-bonocm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5>Venta de Bonos</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle">Paciente</th>
                                                                                <th class="align-middle">Convenio</th>
                                                                                <th class="align-middle">Tipo atención</th>
                                                                                <th class="align-middle">Fecha de atención</th>
                                                                                <th class="align-middle">Profesional</th>
                                                                                <th class="align-middle">Monto</th>
                                                                                <th class="align-middle">Medio de pago</th>
                                                                                <th class="align-middle">Vendido por</th>
                                                                                 <th class="align-middle">Institución</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse($bonos_vendidos_dia as $bono_venta)
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>{{ $bono_venta->paciente->nombres ?? 'N/A' }} {{ $bono_venta->paciente->apellido_uno ?? '' }} {{ $bono_venta->paciente->apellido_dos ?? '' }}<br>
                                                                                    {{ $bono_venta->paciente->rut ?? 'N/A' }}</strong>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $bono_venta->convenio->nombre ?? 'N/A' }}<br>
                                                                                    <small>CÓD: {{ $bono_venta->convenio->codigo ?? 'N/A' }}</small>
                                                                                </td>
                                                                                <td>
                                                                                    <span>{{ $bono_venta->tipoBono->nombre ?? 'N/A' }}</span><br>
                                                                                    @if($bono_venta->id_clase_bono == 1)
                                                                                        <small>Bono Físico</small>
                                                                                    @elseif($bono_venta->id_clase_bono == 2)
                                                                                        <small>Sencillito</small>
                                                                                    @elseif($bono_venta->id_clase_bono == 3)
                                                                                        <small>Caja Vecina</small>
                                                                                    @elseif($bono_venta->id_clase_bono == 4)
                                                                                        <small>Bono Web</small>
                                                                                    @elseif($bono_venta->id_clase_bono == 5)
                                                                                        <small>Bono Web Pre-Pago</small>
                                                                                    @elseif($bono_venta->id_clase_bono == 6)
                                                                                        <small>Particular</small>
                                                                                    @elseif($bono_venta->id_clase_bono == 7)
                                                                                        <small>Bono Institucional</small>
                                                                                    @else
                                                                                        <small>Otro</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    {{ $bono_venta->fecha_atencion ? \Carbon\Carbon::parse($bono_venta->fecha_atencion)->format('d/m/Y') : 'N/A' }}<br>
                                                                                    {{ $bono_venta->fecha_atencion ? \Carbon\Carbon::parse($bono_venta->fecha_atencion)->format('H:i') : '--:--' }}
                                                                                </td>
                                                                                <td>
                                                                                    <strong>{{ $bono_venta->profesional->nombre ?? 'N/A' }} {{ $bono_venta->profesional->apellido_uno ?? '' }}<br>
                                                                                    {{ $bono_venta->profesional->rut ?? 'N/A' }}</strong>
                                                                                    <br>
                                                                                    <small>{{ $bono_venta->profesional->especialidad->nombre ?? 'N/A' }}</small>
                                                                                </td>
                                                                                <td>
                                                                                    ${{ number_format($bono_venta->valor_atencion ?? 0, 0, ',', '.') }}
                                                                                </td>
                                                                                <td>
                                                                                    @if($bono_venta->id_clase_bono == 1)
                                                                                        Bono Físico
                                                                                    @elseif($bono_venta->id_clase_bono == 2)
                                                                                        Sencillito
                                                                                    @elseif($bono_venta->id_clase_bono == 3)
                                                                                        Caja Vecina
                                                                                    @elseif($bono_venta->id_clase_bono == 4)
                                                                                        Bono Web
                                                                                    @elseif($bono_venta->id_clase_bono == 5)
                                                                                        Bono Web Pre-Pago
                                                                                    @elseif($bono_venta->id_clase_bono == 6)
                                                                                        Efectivo
                                                                                    @else
                                                                                        Otro
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <strong>{{ $bono_venta->asistente->nombres ?? 'N/A' }} {{ $bono_venta->asistente->apellido_uno ?? '' }}<br>
                                                                                    {{ $bono_venta->asistente->rut ?? 'N/A' }}</strong><br>
                                                                                    <small>{{ $bono_venta->asistente->asistenteTipo->nombre ?? 'Asistente' }}</small>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $bono_venta->lugarAtencion->nombre ?? 'N/A' }}
                                                                                </td>
                                                                            </tr>
                                                                            @empty
                                                                            <tr>
                                                                                <td colspan="9" class="text-center text-muted">
                                                                                    <i class="feather icon-info"></i> No hay bonos vendidos el día de hoy
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
                                        </div>
                                        <!--VENTA PROGRAMAS-->
                                        <div class="tab-pane" id="ventaprogramacm" role="tabpanel" aria-labelledby="ventaprogramacm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                         <div class="card-header-new-md">
                                                            <h5>Venta de Programas</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle">Paciente</th>
                                                                                <th class="align-middle">Convenio</th>
                                                                                 <th class="align-middle">Tipo atención</th>
                                                                                <th class="align-middle">N° Programa</th>
                                                                                <th class="align-middle">Fecha de atención</th>
                                                                                <th class="align-middle">Profesional</th>
                                                                                <th class="align-middle">Monto</th>
                                                                                <th class="align-middle">Medio de pago</th>
                                                                                <th class="align-middle">Vendido por</th>
                                                                                 <th class="align-middle">Institución</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Juan Perez<br>
                                                                                    18.233.434-1</strong>
                                                                                </td>
                                                                                <td>
                                                                                    <span>Fonasa</span><br>
                                                                                    <small>849839</small><!--CLASE-->
                                                                                </td>
                                                                                <td>
                                                                                    <span>Consulta</span><br>
                                                                                    <small>Bono emitido por institución</small><!--CLASE-->
                                                                                </td>
                                                                                <td>
                                                                                    N° 10<br>
                                                                                    <small>CÓD: 48874</small>

                                                                                </td>
                                                                                <td>
                                                                                    8/6/2026<!--FECHA--><br>
                                                                                    15:13 <!--HORA-->
                                                                                </td>
                                                                                <td>
                                                                                    <strong>Jaime Kriman<br>
                                                                                    823982934-9</strong><br>
                                                                                    <small>Otorrinolaringología</small>
                                                                                </td>
                                                                                <td>
                                                                                    $105.000
                                                                                </td>
                                                                                <td>
                                                                                    Débito
                                                                                </td>

                                                                                <td>
                                                                                    <strong>Nombre Usuario <br>
                                                                                                    18.233.434-1</strong><br>
                                                                                                    <small>Asistente</small><!--TIPO USUARIO-->
                                                                                </td>
                                                                                <td>
                                                                                    INSI (Casa Matriz)
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
                                         <!--RESUMEN VENTAS POR PROFESIONAL-->
                                        <div class="tab-pane" id="ventatotalprofcm" role="tabpanel" aria-labelledby="ventatotalprofcm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-header-new-md">
                                                                    <h5>Resumen de ventas diarias por profesional</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Profesional</th>
                                                                                        <th class="align-middle">Fecha</th>
                                                                                        <th class="align-middle"> Particular</th>
                                                                                        <th class="align-middle"> Total Bonos</th>
                                                                                         <th class="align-middle"> Total Programas</th>
                                                                                         <th class="align-middle">Institución</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Juan Perez<br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Especialidad</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span>5/5/2026</span><br>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>2</strong><br>
                                                                                            <small>$50.000</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>10</strong><br>
                                                                                            <small>$100.234</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>5</strong><br>
                                                                                            <small>$55.000</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)
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
                                </div>
                            </div>

                        </div>
                        {{--  PESTAÑA DE REGISTRO GARANTIA --}}
                        <div class="tab-pane fade" id="garantia-cm" role="tabpanel" aria-labelledby="garantia-cm-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mb-2">
                                    <h5 class="text-c-blue d-inline float-left f-22">Registro de garantía</h5>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="garantia-pendiente-tab" data-toggle="pill" href="#garantia-pendiente" role="tab" aria-controls="garantia-pendiente" aria-selected="true">
                                                        Garantías pendientes de pago
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="garantia-pagada-tab" data-toggle="pill" href="#garantia-pagada" role="tab" aria-controls="garantia-pagada" aria-selected="false">
                                                        Garantías pagadas
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
                                        <!--GARANTIAS PENDIENTE DE PAGO-->
                                        <div class="tab-pane show active" id="garantia-pendiente" role="tabpanel" aria-labelledby="garantia-pendiente-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <div class="row">
                                                                <div class="d-flex align-items-end col-6 mb-2">
                                                                    <h5 class=" d-inline">Garantías pendiente de pago</h5>
                                                                </div>
                                                                <div class="d-inline col-6 mb-2">
                                                                    <div class="switch switch-success float-md-right m-l-5">
                                                                        <input type="checkbox" id="switch_pagogarantia_5"   checked="">
                                                                        <label for="switch_pagogarantia_5" class="cr"></label>
                                                                        <label class="font-weight-bold">PAGAR A TODOS</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Paciente</th>
                                                                                <th>Monto Garantía</th>
                                                                                <th>Convenio</th>
                                                                                <th>Tipo atención</th>
                                                                                <th>Emisión</th>
                                                                                <th>Vencimiento</th>
                                                                                <th>Profesional</th>
                                                                                <th>Institución</th>
                                                                                <th>Estado</th>
                                                                                <th>Atenciones</th>
                                                                                <th>Estado de pago</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Juan Perez</strong><br>
                                                                                    18.233.434-1
                                                                                </td>
                                                                                <td>
                                                                                    $30.000
                                                                                </td>
                                                                                 <td>
                                                                                    PONER CONVENIO<br>
                                                                                    <small>CÓD: PONER CODIGO</small>
                                                                                </td>
                                                                                <td>
                                                                                    Consulta<br>
                                                                                </td>
                                                                                <td>
                                                                                    0/0/2026
                                                                                </td>
                                                                                <td>
                                                                                    5/6/2026<br>
                                                                                   <small>Vence en 12 días</small>
                                                                                </td>
                                                                                <td>
                                                                                    <strong>Nombre profesional</strong><br>
                                                                                    2.265.585-4<br>
                                                                                    <small>Especialidad</small>
                                                                                </td>
                                                                                 <td>
                                                                                    INSI (Casa Matriz)
                                                                                </td>
                                                                                <td>
                                                                                    <h6><span class="badge badge-warning">Por vencer</span></h6>
                                                                                </td>
                                                                                <td><button type="button" class="btn btn-info btn-xxs"><i class="feather icon-search"></i> Ver</button></td>
                                                                                <td>
                                                                                    <label class="switch-moderno-pago">
                                                                                        <input type="checkbox" id="switchEstado">
                                                                                        <span class="switch-slider-pago">
                                                                                                <span class="switch-text-pago off">
                                                                                                 Pendiente
                                                                                                </span>
                                                                                                <span class="switch-text-pago on">
                                                                                                Pagado
                                                                                                </span>
                                                                                        </span>
                                                                                    </label>
                                                                                 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Pepito Perez</strong><br>
                                                                                    7.343.434-9
                                                                                </td>
                                                                                <td>
                                                                                    $18.500
                                                                                </td>
                                                                                <td>
                                                                                    PONER CONVENIO<br>
                                                                                    <small>CÓD: PONER CODIGO</small>
                                                                                </td>
                                                                                <td>
                                                                                    Programa<br>
                                                                                </td>
                                                                                <td>
                                                                                    0/0/2026
                                                                                </td>
                                                                                <td>
                                                                                    19/5/2026<br>
                                                                                   <small>Vence en 7 días</small>
                                                                                </td>
                                                                                 <td>
                                                                                    <strong>Nombre profesional</strong><br>
                                                                                    2.265.585-4<br>
                                                                                    <small>Especialidad</small>
                                                                                </td>
                                                                                 <td>
                                                                                    INSI (Casa Matriz)
                                                                                </td>
                                                                                <td>
                                                                                    <h6><span class="badge badge-danger">Vencido</span></h6>
                                                                                </td>
                                                                                 <td><button type="button" class="btn btn-info btn-xxs"><i class="feather icon-search"></i> Ver</button></td>
                                                                                 <td>
                                                                                    <label class="switch-moderno-pago">
                                                                                        <input type="checkbox" id="switchEstado">
                                                                                        <span class="switch-slider-pago">
                                                                                                <span class="switch-text-pago off">
                                                                                                 Pendiente
                                                                                                </span>
                                                                                                <span class="switch-text-pago on">
                                                                                                Pagado
                                                                                                </span>
                                                                                        </span>
                                                                                    </label>
                                                                                 </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>
                                                                                    <strong>Alejandra Perez</strong><br>
                                                                                    9.643.434-k
                                                                                </td>
                                                                                <td>
                                                                                    $50.500
                                                                                </td>
                                                                                <td>
                                                                                    PONER CONVENIO<br>
                                                                                    <small>CÓD: PONER CODIGO</small>
                                                                                </td>
                                                                                <td>
                                                                                    Consulta
                                                                                </td>
                                                                                <td>
                                                                                    0/0/2026
                                                                                </td>
                                                                                <td>
                                                                                    14/6/2026<br>
                                                                                    <small>Vence en 12 días</small>
                                                                                </td>
                                                                                 <td>
                                                                                    <strong>Nombre profesional</strong><br>
                                                                                    2.265.585-4<br>
                                                                                    <small>Especialidad</small>
                                                                                </td>
                                                                                 <td>
                                                                                    INSI (Casa Matriz)
                                                                                </td>
                                                                                <td>
                                                                                    <h6><span class="badge badge-success">Vigente</span></h6>
                                                                                </td>
                                                                                 <td><button type="button" class="btn btn-info btn-xxs"><i class="feather icon-search"></i> Ver</button></td>
                                                                                 <td>
                                                                                    <label class="switch-moderno-pago">
                                                                                        <input type="checkbox" id="switchEstado">
                                                                                        <span class="switch-slider-pago">
                                                                                                <span class="switch-text-pago off">
                                                                                                 Pendiente
                                                                                                </span>
                                                                                                <span class="switch-text-pago on">
                                                                                                Pagado
                                                                                                </span>
                                                                                        </span>
                                                                                    </label>
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

                                        <!--GARANTIAS PAGADAS-->
                                        <div class="tab-pane" id="garantia-pagada" role="tabpanel" aria-labelledby="garantia-pagada-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                        <div class="card-header-new-md">
                                                            <h5>Garantías pagadas</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle">Profesional</th>
                                                                                <th class="align-middle">Paciente</th>
                                                                                <th class="align-middle">Institución</th>
                                                                                <th class="align-middle">Monto <br>Garantía</th>
                                                                                <th class="align-middle">Convenio</th>
                                                                                <th class="align-middle">Tipo <br>atención</th>
                                                                                <th class="align-middle">Fecha <br>de pago</th>
                                                                                <th class="align-middle">Medio <br>de pago</th>
                                                                                <th class="align-middle">Estado</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Jaime Kriman</strong><br>
                                                                                    <strong>75465656-7</strong><br>
                                                                                    <small>Otorrinolaringología</small><!-- ESPECIALIDAD-->
                                                                                </td>
                                                                                <td>
                                                                                    <strong>Juan Perez</strong><br>
                                                                                    18.233.434-1
                                                                                </td>
                                                                                 <td>
                                                                                    INSI Casa Matriz
                                                                                </td>
                                                                                <td>
                                                                                    $30.000
                                                                                </td>
                                                                                 <td>
                                                                                    PONER CONVENIO<br>
                                                                                    <small>CÓD: PONER CODIGO</small>
                                                                                </td>
                                                                                  <td>
                                                                                    Consulta
                                                                                </td>
                                                                                 <td>
                                                                                    1/10/2026
                                                                                </td>
                                                                                <td>
                                                                                    Efectivo
                                                                                </td>

                                                                                <td>
                                                                                    <h6><span class="badge badge-success">Pagado</span></h6>
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

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<input type="hidden" name="numero_rendicion_hidde" id="numero_rendicion_hidde" value="">
<input type="hidden" name="id_profesional" id="id_profesional" value="">

    <!--Cierre: Container Completo-->
@endsection

@section('modales')
    @include('app.general.asistente.flujo_caja.modal.m_detallecajaabierta')
   @include('app.general.asistente.flujo_caja.modal.m_detallecajacerrada')
   @include('app.general.asistente.flujo_caja.modal.m_editarcajaoperativa')
    {{-- @include('page.flujo_cajas.asistente_cm_publico.modales.modal_rendicion_caja_diaria') --}}
    @include('app.general.asistente.flujo_caja.modal.modal_rendicion_caja_diaria')
    {{-- @include('page.flujo_cajas.asistente_cm_publico.modales.modal_consulta_agenda') --}}
    @include('app.general.asistente.flujo_caja.modal.modal_consulta_agenda')
     @include('app.general.asistente.flujo_caja.modal.m_abrircaja')



@endsection

@section('page-script')

<script>

/* Apertura y cierre de cajas*/
function m_abrircaja(idCaja = null) {
    // Limpiar el mensaje de información
    $('#info_ultima_caja').html('');

    if (idCaja !== null) {
        $('#id_caja').val(idCaja).trigger('change');
    } else {
        // Limpiar campos si no hay caja preseleccionada
        $('#id_caja').val('0');
        $('#saldo_final_caja_anterior').val('');
        $('#abono_inicial_caja').val('');
    }

    $('#abrircaja').modal('show');
}

function cerrar_abrircaja() {
    $('#id_caja').val('0').trigger('change');
    $('#responsable_caja').val('0');
    $('#saldo_final_caja_anterior').val('');
    $('#abono_inicial_caja').val('');
    $('#info_ultima_caja').html('');
    $('#abrircaja').modal('hide');
  }
/* Apertura y cierre de cajas abiertas*/
  function m_detallecajaabierta(idCaja = null, nombreCaja = 'Caja', nombreResponsable = 'Nombre asistente') {
    // Validar que se haya proporcionado un ID
    if (!idCaja) {
        swal({
            title: 'Error',
            text: 'No se ha seleccionado una caja para mostrar.',
            icon: 'error',
            buttons: 'Aceptar',
        });
        return;
    }

    // Almacenar el ID de la caja operativa
    $('#id_caja_operativa_cierre').val(idCaja);

    // Limpiar campos del formulario de cierre
    $('#saldo_cierre').val('');
    $('#diferencia_cierre').val('');
    $('#observaciones_cierre').val('');

    // Limpiar campos del formulario de entrega
    $('#saldo_entregar').val('');
    $('#nuevo_responsable').val('');
    $('#observaciones_entrega').val('');

    // Cargar datos de la caja vía AJAX
    $.ajax({
        url: "{{ route('flujo_caja.detalle_caja_operativa', '') }}/" + idCaja,
        type: 'GET',
        beforeSend: function() {
            // Mostrar valores por defecto mientras carga
            $('#modal_caja_titulo').text('Cargando...');
            $('#modal_caja_responsable').text('...');
            $('#caja_saldo_anterior').text('$0');
            $('#caja_abono_inicial').text('$0');
            $('#caja_total_efectivo').text('$0');
            $('#caja_total_bonos').text('0');
            $('#caja_total_otros').text('$0');
            $('#caja_total_acumulado').text('$0');
            $('#caja_total_caja').text('$0');
            $('#caja_total_acumulado_card').text('$0');
            $('#caja_fecha_apertura').text('--/--/---- - --:--');
        },
        success: function(data) {
            console.log('Detalle de caja operativa:', data);
            if (data.estado === 1) {
                // Actualizar título y responsable
                $('#modal_caja_titulo').text('Detalle ' + data.nombre_caja);
                $('#modal_caja_responsable').text(data.responsable);

                // Actualizar responsable actual en la pestaña de entrega
                $('#responsable_actual_entrega').val(data.responsable);

                // Actualizar totales en la tabla
                $('#caja_saldo_anterior').text('$' + data.totales.saldo_anterior);
                $('#caja_abono_inicial').text('$' + data.totales.abono_inicial);
                $('#caja_total_efectivo').text('$' + data.totales.total_efectivo);
                $('#caja_total_bonos').text(data.totales.total_bonos);
                $('#caja_total_otros').text('$' + data.totales.total_otros);
                $('#caja_total_acumulado').text('$' + data.totales.total_acumulado);
                $('#caja_total_caja').text('$' + data.totales.total_caja);

                // Actualizar cards adicionales
                $('#caja_total_acumulado_card').text('$' + data.totales.total_acumulado);
                $('#caja_fecha_apertura').text(data.fecha_apertura);

                // Mostrar el modal
                $('#detallecajaabierta').modal('show');
            } else {
                swal({
                    title: 'Error',
                    text: data.mensaje || 'No se pudo cargar la información de la caja.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            }
        },
        error: function(error) {
            console.error('Error al cargar detalles de caja:', error);
            swal({
                title: 'Error',
                text: 'No se pudo cargar la información de la caja.',
                icon: 'error',
                buttons: 'Aceptar',
            });
        }
    });
}

function m_editarcajaoperativa(){
    $('#editarcajaoperativa').modal('show');
}

// Listener para actualizar el saldo de cierre en la tabla en tiempo real
$(document).on('input', '#saldo_cierre', function() {
    let valor = $(this).val();
    if (valor) {
        $('#caja_saldo_cierre_display').text('$' + parseFloat(valor).toLocaleString('es-CL'));
    } else {
        $('#caja_saldo_cierre_display').text('$0');
    }
});

function cerrarCaja() {
    const idCaja = $('#id_caja_operativa_cierre').val();
    const saldoCierre = $('#saldo_cierre').val();
    const diferencia = $('#diferencia_cierre').val();
    const observaciones = $('#observaciones_cierre').val();

    // Validaciones
    let valido = 1;
    let mensaje = "Corrija los siguientes errores:<br><br>";

    if (!idCaja || idCaja === '' || idCaja == 0) {
        valido = 0;
        mensaje += "- No se ha seleccionado una caja para cerrar.<br>";
    }

    if (saldoCierre === '' || saldoCierre === null) {
        valido = 0;
        mensaje += "- Debe ingresar el saldo de cierre.<br>";
    }

    if (valido === 0) {
        swal({
            title: 'Campos incompletos',
            html: mensaje,
            icon: 'warning',
            buttons: 'Aceptar',
        });
        return;
    }

    // Confirmación
    swal({
        title: '¿Cerrar caja?',
        text: 'Esta acción cerrará la caja operativa. ¿Desea continuar?',
        icon: 'warning',
        buttons: ['Cancelar', 'Cerrar caja'],
        dangerMode: true,
    }).then((willClose) => {
        if (!willClose) {
            return;
        }

        // Petición AJAX
        $.ajax({
            url: "{{ route('flujo_caja.cerrar_caja', '') }}/" + idCaja,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                saldo_cierre: saldoCierre,
                diferencia: diferencia,
                observaciones: observaciones,
            },
            success: function(data) {
                console.log(data);
                if (data.estado === 1) {
                    swal({
                        title: 'Caja cerrada',
                        text: data.mensaje || 'La caja fue cerrada correctamente.',
                        icon: 'success',
                        buttons: 'Aceptar',
                    }).then(() => {
                        $('#detallecajaabierta').modal('hide');
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: data.mensaje || 'No fue posible cerrar la caja.',
                        icon: 'error',
                        buttons: 'Aceptar',
                    });
                }
            },
            error: function(error) {
                let mensajeError = 'No fue posible cerrar la caja.';

                if (error.responseJSON && error.responseJSON.mensaje) {
                    mensajeError = error.responseJSON.mensaje;
                } else if (error.responseJSON && error.responseJSON.message) {
                    mensajeError = error.responseJSON.message;
                }

                swal({
                    title: 'Error al cerrar',
                    text: mensajeError,
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            }
        });
    });
}

function entregarCaja() {
    const idCaja = $('#id_caja_operativa_cierre').val();
    const saldoEntregar = $('#saldo_entregar').val();
    const nuevoResponsable = $('#nuevo_responsable').val();
    const observaciones = $('#observaciones_entrega').val();

    // Validaciones
    let valido = 1;
    let mensaje = "Corrija los siguientes errores:<br><br>";

    if (!idCaja || idCaja === '' || idCaja == 0) {
        valido = 0;
        mensaje += "- No se ha seleccionado una caja para entregar.<br>";
    }

    if (saldoEntregar === '' || saldoEntregar === null) {
        valido = 0;
        mensaje += "- Debe ingresar el saldo a entregar.<br>";
    }

    if (!nuevoResponsable || nuevoResponsable === '') {
        valido = 0;
        mensaje += "- Debe seleccionar el nuevo responsable de la caja.<br>";
    }

    if (valido === 0) {
        swal({
            title: 'Campos incompletos',
            html: mensaje,
            icon: 'warning',
            buttons: 'Aceptar',
        });
        return;
    }

    // Confirmación
    swal({
        title: '¿Entregar caja?',
        text: 'Esta acción cambiará el responsable de la caja operativa. ¿Desea continuar?',
        icon: 'warning',
        buttons: ['Cancelar', 'Entregar caja'],
    }).then((willTransfer) => {
        if (!willTransfer) {
            return;
        }

        // Petición AJAX
        $.ajax({
            url: "{{ route('flujo_caja.entregar_caja', '') }}/" + idCaja,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                saldo_entregar: saldoEntregar,
                nuevo_responsable: nuevoResponsable,
                observaciones: observaciones,
            },
            success: function(data) {
                console.log(data);
                if (data.estado === 1) {
                    swal({
                        title: 'Caja entregada',
                        text: data.mensaje || 'La caja fue entregada correctamente.',
                        icon: 'success',
                        buttons: 'Aceptar',
                    }).then(() => {
                        $('#detallecajaabierta').modal('hide');
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: data.mensaje || 'No fue posible entregar la caja.',
                        icon: 'error',
                        buttons: 'Aceptar',
                    });
                }
            },
            error: function(error) {
                let mensajeError = 'No fue posible entregar la caja.';

                if (error.responseJSON && error.responseJSON.mensaje) {
                    mensajeError = error.responseJSON.mensaje;
                } else if (error.responseJSON && error.responseJSON.message) {
                    mensajeError = error.responseJSON.message;
                }

                swal({
                    title: 'Error al entregar',
                    text: mensajeError,
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            }
        });
    });
}

function eliminarCaja(idCaja) {
    swal({
        title: '¿Eliminar caja?',
        text: 'Esta acción eliminará la caja seleccionada.',
        icon: 'warning',
        buttons: ['Cancelar', 'Eliminar'],
        dangerMode: true,
    }).then((willDelete) => {
        if (!willDelete) {
            return;
        }

        $.ajax({
            url: "{{ route('flujo_caja.eliminar_caja') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id: idCaja,
            },
            success: function(data) {
                if (data.estado === 1) {
                    swal({
                        title: 'Caja eliminada',
                        text: data.mensaje || 'La caja fue eliminada correctamente.',
                        icon: 'success',
                        buttons: 'Aceptar',
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: data.mensaje || 'No fue posible eliminar la caja.',
                        icon: 'error',
                        buttons: 'Aceptar',
                    });
                }
            },
            error: function(error) {
                let mensajeError = 'No fue posible eliminar la caja.';

                if (error.responseJSON && error.responseJSON.mensaje) {
                    mensajeError = error.responseJSON.mensaje;
                } else if (error.responseJSON && error.responseJSON.message) {
                    mensajeError = error.responseJSON.message;
                }

                swal({
                    title: 'Error al eliminar',
                    text: mensajeError,
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            }
        });
    });
}

function cerrar_detallecajaabierta() {
    // Limpiar campos del formulario
    $('#id_caja_operativa_cierre').val('');
    $('#saldo_cierre').val('');
    $('#diferencia_cierre').val('');
    $('#observaciones_cierre').val('');
    $('#modal_caja_titulo').text('Detalle de caja');
    $('#modal_caja_responsable').text('Nombre asistente');

    $('#detallecajaabierta').modal('hide');
}

  /* Apertura y cierre de cajas cerradas*/
  function m_detallecajacerrada() {
    $('#detallecajacerrada').modal('show');
}

function cerrar_detallecajacerrada() {
    $('#detallecajacerrada').modal ('hide');
  }

  function verificarUltimaCajaOperativa() {
    const idCaja = $('#id_caja').val();

    // Limpiar campos y mensajes anteriores
    $('#saldo_final_caja_anterior').val('');
    $('#info_ultima_caja').html('');

    // Si no hay caja seleccionada, salir
    if (!idCaja || idCaja == '0') {
        return;
    }

    // Hacer petición AJAX para obtener la última caja operativa
    $.ajax({
        url: "{{ route('flujo_caja.ultima_caja_operativa', '') }}/" + idCaja,
        type: 'GET',
        beforeSend: function() {
            $('#info_ultima_caja').html('<i class="feather icon-loader"></i> Consultando historial...');
        },
        success: function(data) {
            console.log('Respuesta última caja operativa:', data);
            if (data.estado === 1) {
                if (data.tiene_historial) {
                    // Si existe historial, prellenar el campo con el saldo de cierre
                    const saldoCierre = data.saldo_cierre || 0;
                    $('#saldo_final_caja_anterior').val(saldoCierre);

                    // Formatear fecha de manera más amigable
                    let fechaCierreFormateada = 'N/A';
                    if (data.fecha_cierre) {
                        const fecha = new Date(data.fecha_cierre);
                        fechaCierreFormateada = fecha.toLocaleDateString('es-CL', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                    }

                    // Formatear el saldo con separadores de miles
                    const saldoFormateado = new Intl.NumberFormat('es-CL').format(saldoCierre);

                    // Mostrar información útil
                    $('#info_ultima_caja').html(
                        '<div class="alert alert-info py-2 px-3 mb-0">' +
                        '<i class="feather icon-info"></i> ' +
                        '<strong>Último cierre:</strong> $' + saldoFormateado +
                        ' | <strong>Fecha:</strong> ' + fechaCierreFormateada +
                        ' | <strong>Responsable:</strong> ' + data.responsable +
                        '</div>'
                    );
                } else {
                    // Si no hay historial, informar al usuario
                    $('#info_ultima_caja').html(
                        '<div class="alert alert-warning py-2 px-3 mb-0">' +
                        '<i class="feather icon-alert-circle"></i> Esta caja no tiene historial de cierres anteriores. Ingrese el saldo inicial manualmente si es necesario.' +
                        '</div>'
                    );
                }
            } else {
                $('#info_ultima_caja').html(
                    '<div class="alert alert-danger py-2 px-3 mb-0">' +
                    '<i class="feather icon-x"></i> No se pudo obtener información del historial' +
                    '</div>'
                );
            }
        },
        error: function(error) {
            console.error('Error al consultar última caja operativa:', error);
            $('#info_ultima_caja').html(
                '<div class="alert alert-danger py-2 px-3 mb-0">' +
                '<i class="feather icon-x"></i> Error al consultar el historial de la caja' +
                '</div>'
            );
        }
    });
}

function abrir_caja(){
        let id_caja = $('#id_caja').val();
        let cajaSeleccionada = $('#id_caja option:selected');
        let id_lugar_atencion = cajaSeleccionada.data('id-lugar-atencion');
        // let id_responsable_caja = $('#responsable_caja').val();
        let saldo_final_caja_anterior = $('#saldo_final_caja_anterior').val();
        let abono_inicial_caja = $('#abono_inicial_caja').val();

        const normalizarMonto = (valor) => {
            if (valor === null || valor === undefined) {
                return 0;
            }
            let valorStr = String(valor).replace(/\./g, '').replace(/,/g, '.');
            return parseFloat(valorStr) || 0;
        };

        const saldoFinalNormalizado = normalizarMonto(saldo_final_caja_anterior);
        const abonoInicialNormalizado = normalizarMonto(abono_inicial_caja);

        let valido = 1;
        let mensaje = "Corrija los siguientes errores:<br><br>";

        if(id_caja === "" || id_caja === null || id_caja == 0){
            valido = 0;
            mensaje += "- Debe seleccionar una caja para realizar la apertura.<br>";
        }

        // if(id_responsable_caja === ""){
        //     valido = 0;
        //     mensaje += "- Debe seleccionar un responsable para la caja.<br>";
        // }

        if(!id_lugar_atencion){
            valido = 0;
            mensaje += "- La caja seleccionada no tiene lugar de atención asociado.<br>";
        }

        if(saldo_final_caja_anterior.trim() === "" || isNaN(saldoFinalNormalizado)){
            valido = 0;
            mensaje += "- El saldo final de la caja anterior es obligatorio y debe ser numérico.<br>";
        }

        if(abono_inicial_caja.trim() === "" || isNaN(abonoInicialNormalizado)){
            valido = 0;
            mensaje += "- El abono inicial de la caja es obligatorio y debe ser numérico.<br>";
        }

        if(valido === 0){
            swal({
                title: "Error",
                content: document.createElement('div'),
                icon: "error",
            });
            $('.swal-content').html(mensaje);
            return;
        }

        $.ajax({
            url: "{{ route('flujo_caja.abrir_caja_operativa') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id_caja: id_caja,
                // responsable_caja: id_responsable_caja,
                id_lugar_atencion: id_lugar_atencion,
                saldo_final_caja_anterior: saldoFinalNormalizado,
                abono_inicial_caja: abonoInicialNormalizado,
            },
            success: function(data) {
                console.log(data);
                $('#abrircaja').modal('hide');
                swal({
                    title: "Caja abierta",
                    text: data.mensaje || "La caja fue abierta correctamente.",
                    icon: "success",
                    buttons: "Aceptar",
                }).then(() => {
                    location.reload();
                });
            },
            error: function(error) {
                console.log(error);
                let mensajeError = "No fue posible abrir la caja. Intente nuevamente.";

                if (error.responseJSON && error.responseJSON.message) {
                    mensajeError = error.responseJSON.message;
                }

                swal({
                    title: "Error al abrir caja",
                    text: mensajeError,
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        });
    }

    let clase_bono = ['Bono Fisico' ,'Sencillito' ,'Caja Vecina' ,'Bono Web' ,'Bono Web Pre-Pago' ,'Particular'];
    var tiempo = 0; // CANTIDAD MINUTOS A ESPERAR PARA APROBACION
    var conteo_activo = 0; // valida si conteo esta activo

            $(document).ready(function(){
                $('#id_asistente_receptor').select2();
                $('#id_asistente_receptor_prof').select2();
                $('#id_asistente_receptor_prof').on('select2:select', function (e) {
                    cargar_registros_prof(); // tu función
                });
                $('#tabla_rendir_caja').DataTable({
                    responsive: true,
                });
                $('#tabla_rendir_caja_prof').DataTable({
                    responsive: true,
                });
                //cargar_registros();
                cargar_registros_prof();
            });

            function seleccionar_bonos_rendicion(){
                var estado  = $('#enviar_todos').is(':checked')
                $("input:checkbox").each(function() {
                    if($(this).attr('id') != 'enviar_todos')
                    {
                        if(estado != $(this).is(':checked'))
                        {
                            $(this).trigger('click');
                        }
                    }
                });
            }

            function cargar_flujo_caja() {
                var fecha = {{ date('Y-m-d') }};
                var convenio = $('#rinde_convenio').val();
                var estado_consulta = $('#rinde_estado_consulta').val();

                let url = "{{ route('flujo_caja.data_flujo_caja') }}";

                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            fecha : fecha,
                            convenio : convenio,
                            estado_consulta : estado_consulta,
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            $('#tabla_rendir_caja tbody').html('');
                            for (i = 0; i < data.registros.length; i++) {

                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila = '';
                                fila += '<tr >';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].tipo_bono.nombre+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].convenio.nombre+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].fecha_atencion+'</td>';
                                fila += '    <td class="align-middle text-center">';
                                fila += '        <span>'+ data.registros[i].paciente.nombres+' '+ data.registros[i].paciente.apellido_uno+' '+ data.registros[i].paciente.apellido_dos+'</span><br>';
                                fila += '        <span>'+ data.registros[i].paciente.rut +'</span>';
                                fila += '    </td>';
                                fila += '    <td class="align-middle text-center">$'+ data.registros[i].valor_atencion +'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].parametro.valor +'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].profesional.nombre+' '+ data.registros[i].profesional.apellido_uno+' '+ data.registros[i].profesional.apellido_dos+'</td>';
                                fila += '    {{--  <td class="align-middle text-center">{{ $value_b->observaciones }}</td>  --}}';
                                fila += '    <td class="align-middle text-center">';
                                fila += '        <div class="form-group">';
                                fila += '            <div class="switch switch-success d-inline m-r-10">';
                                fila += '                <input type="checkbox" id="rendir_caja_'+ data.registros[i].id +'">';
                                fila += '                <label for="rendir_caja_'+ data.registros[i].id +'"';
                                fila += '                    class="cr"></label>';
                                fila += '            </div>';
                                fila += '        </div>';
                                fila += '    </td>';
                                fila += '</tr>';
                                j++;

                                $('#tabla_rendir_caja tbody').append(fila);

                            }
                        }
                        else
                        {
                            $('#tabla_rendir_caja tbody').html('');
                            $('#tabla_rendir_caja tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function rendir_caja()
            {
                let url = "{{ route('asistentecm.solicitar_rendir_caja') }}";

                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            bonos : $('#lista_bonos').val(),
                            id_asistente_receptor : $('#id_asistente_receptor').val(),
                            archivos : $('#input_lista_archivo').val(),
                            observaciones : $('#observaciones_rendicion').val(),
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            $('#numero_rendicion_hidde').val(data.last_id);
                            $('#numero_rendicion').html(data.last_id);
                            $('#nombre_receptor').html(data.registro.asistente_receptor.nombres+' '+data.registro.asistente_receptor.apellido_uno+' '+data.registro.asistente_receptor.apellido_dos);
                            $('#total_documento').html(data.registro.total_documentos);
                            $('#total_bonos').html(data.registro.total_bono);
                            $('#total_efectivo').html(data.registro.total_efectivo);
                            $('#total_otros').html(data.registro.total_otros);

                            $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                            $('#rendicion_caja_diaria').modal('show',{backdrop: 'static', keyboard: false});

                            tiempo = data.autorizacion.tiempo;
                            console.log(data.autorizacion);
                            conteo_activo = 1;
                            validar_rendicion();
                        }
                        else
                        {
                            swal({
                                title: "Solicitud de Rendicion con Problema",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function cerrarModalRendicion()
            {
                swal({
                    title: "Rendición Diaria.",
                    text: 'Al "Aceptar" cierra la ventana sin Esperar Aprobación del receptor.',
                    icon: "warning",
                    buttons: ["Aceptar", 'Cancelar'],
                }).then((result) => {
                    if (result == true)
                    {
                        console.log('regresar');
                    } else {

                        $('#rendicion_caja_diaria').modal('hide');
                    }
                })
            }

            /** actualizar pagina */
            function actualizar_registros()
            {
                let url = "{{ route('asistentecm.rendir') }}";
                document.reload(url);
            }

            function validar_rendicion()
            {
                $('#aprobacion_tiempo').html(''+tiempo+' minutos');
                console.log(tiempo);
                console.log(conteo_activo);
                if(tiempo > 0 && conteo_activo == 1)
                {
                    setTimeout(function(){
                        tiempo = tiempo-1;
                        $('#aprobacion_tiempo').html(''+tiempo+' minutos');
                        var value_validacion = 0;

                        var id_rendicion = $('#numero_rendicion_hidde').val()
                        let url = "{{ route('asistentecm.rendir_caja_validar_autorizacion') }}";

                        $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id_rendicion : id_rendicion,
                                },
                            })
                            .done(function(data) {
                                console.log('success validar rendicion');
                                console.log(data);
                                if (data.estado == 1)
                                {
                                    if(data.registro.estado == 0)
                                    {
                                        console.log('espera aprobacion');
                                    }
                                    else
                                    {
                                        $('#numero_rendicion_hidde').val('');
                                        $('#numero_rendicion').html('');
                                        $('#nombre_receptor').html('');
                                        $('#total_documento').html('');
                                        $('#total_bonos').html('');
                                        $('#total_efectivo').html('');
                                        $('#total_otros').html('');
                                        $('#input_lista_archivo').html('');
                                        //myDropzone_rendicion_prof.removeAllFiles();

                                        $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');
                                        $('#rendicion_caja_diaria').modal('hide');

                                        tiempo = 0;
                                        conteo_activo = 0;

                                        if(data.registro.estado == 1)
                                        {
                                            swal({
                                                title: "Solicitud de Rendicion.",
                                                text: "Rendicion Aceptada conforme",
                                                icon: "success",
                                                buttons: "Aceptar",
                                                // DangerMode: true,
                                            });

                                            console.log('confirmado');
                                            value_validacion = 1;
                                            cargar_registros();
                                            cargar_registros_prof()
                                            return false;
                                        }
                                        else if(data.registro.estado == 2)
                                        {
                                            swal({
                                                title: "Solicitud de Rendicion.",
                                                text: "Autorizaión Vencida",
                                                icon: "success",
                                                buttons: "Aceptar",
                                                // DangerMode: true,
                                            });
                                        }
                                        else if(data.registro.estado == 3)
                                        {
                                            swal({
                                                title: "Solicitud de Rendicion.",
                                                text: "Autorizaión Rechazada",
                                                icon: "error",
                                                buttons: "Aceptar",
                                                // DangerMode: true,
                                            });
                                        }
                                    }
                                }
                                else
                                {
                                    swal({
                                        title: "Solicitud de Rendicion con Problema",
                                        text: data.msj,
                                        icon: "error",
                                        buttons: "Aceptar",
                                        // DangerMode: true,
                                    });
                                }

                                validar_rendicion(tiempo);
                                if(tiempo == 8)
                                {
                                    swal({
                                        title: "Solicitud de Rendicion",
                                        text: 'El tiempo para Autorizar Rendición esta por finalizar, Desea continuar presione el botón "Más Tiempo", si "Acepta" la Rendición quedará Anulada y debera realizarla de nuevo.',
                                        icon: "warning",
                                        buttons: ["Aceptar", 'Más Tiempo'],
                                    }).then((result) => {
                                        if (result == true)
                                        {
                                            reiniciar_rendicion( $('#numero_rendicion_hidde').val());
                                        }
                                    });
                                }

                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                console.log(jqXHR, ajaxOptions, thrownError)
                            });
                    }, 10000);// 600 = 1seg |  60000 = 1 minutos | 10000 = 10 seg | 600000 = 10 minutos
                }
                else
                {
                    conteo_activo = 0;
                    $('#aprobacion').html('Se a finalizado el tiempo para la aprobación, debe realizar la rendicion nuevamente');
                    console.log('desistir rendicion');
                    desistir_rendicion();
                }
            }

            function desistir_rendicion()
            {
                var id_rendicion = $('#numero_rendicion_hidde').val();

                let url = "{{ route('asistentecm.rendicion_caja_desistir') }}";

                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_rendicion : id_rendicion
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            $('#numero_rendicion_hidde').val('');
                            $('#numero_rendicion').html('');
                            $('#nombre_receptor').html('');
                            $('#total_documento').html('');
                            $('#total_bonos').html('');
                            $('#total_efectivo').html('');
                            $('#total_otros').html('');

                            $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                            $('#rendicion_caja_diaria').modal('hide');

                            tiempo = 0;
                            conteo_activo = 0;

                            swal({
                                title: "Solicitud de Rendicion.",
                                text: "Codigo no recibido a tiempo",
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }
                        else
                        {
                            swal({
                                title: "Falla Solicitud de Rendicion, Autorizacion no recibido a tiempo",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function reiniciar_rendicion(id_rendicion)
            {
                let url = "{{ route('asistentecm.rendicion_caja_extender_validacion') }}";

                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_rendicion : id_rendicion
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            tiempo = data.autorizacion.tiempo;
                            conteo_activo = 1;
                            validar_rendicion();
                        }
                        else
                        {
                            swal({
                                title: "Falla Solicitud de Rendicion Desistida",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function cargar_registros()
            {
                    let url = "{{ route('asistentecm.rendicion_carga_bonos') }}";

                    $.ajax({
                            url: url,
                            type: "GET",
                            data: {},
                        })
                        .done(function(data) {

                            console.log(data);
                            if (data.estado == 1)
                            {

                                $('#numero_bonos').val(data.total_bonos);
                                $('#efectivo').val(data.total_efectivo);
                                $('#otros').val(data.total_otros);
                                $('#total').val(data.total);

                                // var lista_bonos = '';
                                $('#tabla_rendir_caja tbody').html('');
                                $(data.bonos).each(function(index, value) { // indice, valor
                                    var html = '';
                                    let clase_bono = ['','Bono Fisico','Sencillito','Caja Vecina','Bono Web','Bono Web Pre-Pago','Particular','Otro'];
                                    html +='<tr >';
                                    html +='    <td class="align-middle text-center">'+value.TipoBono.nombre+'</td>';
                                    html +='    <td class="align-middle text-center">'+value.numero_bono+'</td>';
                                    html +='    <td class="align-middle text-center">'+clase_bono[value.id_clase_bono]+'</td>';
                                    html +='    <td class="align-middle text-center">'+value.Convenio.nombre+'</td>';
                                    html +='    <td class="align-middle text-center">'+value.fecha_atencion+'</td>';
                                    html +='    <td class="align-middle text-center">';
                                    html +='        <span>'+value.Paciente.nombres+' '+value.Paciente.apellido_uno+' '+value.Paciente.apellido_dos+'</span><br>';
                                    html +='        <span>'+value.Paciente.rut+'</span>';
                                    html +='    </td>';
                                    html +='    <td class="align-middle text-center">'+$.number( value.valor_atencion, 2, ',' )+'</td>';
                                    html +='    <td class="align-middle text-center">';
                                    html +='        <span>'+value.Profesional.nombres+' '+value.Profesional.apellido_uno+' '+value.Profesional.apellido_dos+'</span><br>';
                                    html +='        <span>'+value.Profesional.rut+'</span>';
                                    html +='    </td>';
                                    html +='</tr>';
                                    $('#tabla_rendir_caja tbody').append(html);
                                    // lista_bonos +='|'+value.id+'' ;
                                });

                                $('#tabla_rendir_caja').DataTable().destroy();
                                $('#tabla_rendir_caja').DataTable({
                                    responsive: true,
                                });

                                $('#lista_bonos').val(data.lista_bonos)

                            }
                            else
                            {
                                swal({
                                    title: "Problemas al cargar bonos del día",
                                    text: data.msj,
                                    icon: "error",
                                    buttons: "Aceptar",
                                    // DangerMode: true,
                                });
                                return '0';
                            }

                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });
            }

            /** MANEJO DE ARCHIVO */
            // mis-archivos-rendicion
            var myDropzone_rendicion ;
            Dropzone.options.misArchivosRendicion = {
                init:function()
                {
                    myDropzone_rendicion = this;
                },
                url: "{{ route('rendir.archivo.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, text/csv",
                maxFilesize: 4,
                maxFiles: 6,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre un Archivo PDF, XLS o CSV al recuadro para subirlo.",

                /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

                /**
                 * El texto que se agregará antes del formulario alternativo.
                 * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
                 * ser ignorado.
                 */
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

                /**
                 * Si el tamaño del archivo es demasiado grande.
                 * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
                 */
                 dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

                /** Si el archivo no coincide con el tipo de archivo. */
                dictInvalidFileType: "No puedes subir archivos de este tipo.",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
                dictCancelUpload: "Cancelar carga",

                /** El texto que se muestra si una carga se canceló manualmente */
                dictUploadCanceled: "Subida cancelada.",

                /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
                dictRemoveFile: "Eliminar archivo",

                /**
                 * Se muestra si `maxFiles` es st y se excede.
                 */
                dictMaxFilesExceeded: "No puede cargar más archivos.",

                // accept(file, done) {
                //     console.log('-------------accept-----------------------');
                //     cargar_lista_archivo();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion, 'rendicion', 'input_lista_archivo');

                    if (file.previewElement) {
                        return file.previewElement.classList.add("dz-success");
                    }
                },
                error(file, message) {
                    // console.log('-------------error-----------------------');
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        if (typeof message !== "string" && message.error)
                        {
                            message = message.error;
                        }
                        else
                        {
                            message = message.message;
                        }
                        for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                            node.textContent = message;
                        }
                    }
                },
                removedfile(file) {
                    // console.log('-------------removedfile-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion, 'rendicion', 'input_lista_archivo');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_archivo(myDropzone_rendicion, 'rendicion', 'input_lista_archivo');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };

            var lista_archivo = {};
            function cargar_lista_archivo(obj_dropzone, alias_archivo, input)
            {
                // console.log('--------------cargar_lista_archivo----------------------');
                lista_archivo = [];
                let temp  = obj_dropzone.getAcceptedFiles();
                $.each(temp, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[index] = [
                                url = archivo_temp.archivo.url,
                                nombre_original = archivo_temp.archivo.original_file_name,
                                nombre_archivo = archivo_temp.archivo.nombre_archivo,
                                file_extension = archivo_temp.archivo.file_extension,
                            ];
                            $('#'+input).val('');
                            $('#'+input).val(JSON.stringify(lista_archivo));
                        }
                    }
                });
            }

            function abrir_venta_bono(){
                console.log('abrir venta bono');
                $('#consulta').modal('show');
            }

            // ************ PROFESIONALES ************
            /** MANEJO DE ARCHIVO */
            // mis-archivos-rendicion-prof
            var myDropzone_rendicion_prof ;
            Dropzone.options.misArchivosRendicionProf = {
                init:function()
                {
                    myDropzone_rendicion_prof = this;
                },
                url: "{{ route('rendir.archivo.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, text/csv",
                maxFilesize: 4,
                maxFiles: 6,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre un Archivo PDF, XLS o CSV al recuadro para subirlo.",

                /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

                /**
                 * El texto que se agregará antes del formulario alternativo.
                 * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
                 * ser ignorado.
                 */
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

                /**
                 * Si el tamaño del archivo es demasiado grande.
                 * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
                 */
                 dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

                /** Si el archivo no coincide con el tipo de archivo. */
                dictInvalidFileType: "No puedes subir archivos de este tipo.",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
                dictCancelUpload: "Cancelar carga",

                /** El texto que se muestra si una carga se canceló manualmente */
                dictUploadCanceled: "Subida cancelada.",

                /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
                dictRemoveFile: "Eliminar archivo",

                /**
                 * Se muestra si `maxFiles` es st y se excede.
                 */
                dictMaxFilesExceeded: "No puede cargar más archivos.",

                // accept(file, done) {
                //     console.log('-------------accept-----------------------');
                //     cargar_lista_archivo();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion_prof, 'rendicion', 'input_lista_archivo_prof');

                    if (file.previewElement) {
                        return file.previewElement.classList.add("dz-success");
                    }
                },
                error(file, message) {
                    // console.log('-------------error-----------------------');
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        if (typeof message !== "string" && message.error)
                        {
                            message = message.error;
                        }
                        else
                        {
                            message = message.message;
                        }
                        for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                            node.textContent = message;
                        }
                    }
                },
                removedfile(file) {
                    // console.log('-------------removedfile-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion_prof, 'rendicion', 'input_lista_archivo_prof');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_archivo(myDropzone_rendicion_prof, 'rendicion', 'input_lista_archivo_prof');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };

            function seleccionar_bono_prof()
            {
                var lista = [];
                $('.id_check_bono').each(function(key, elemento){
                    if( $(elemento).prop('checked') ) {
                        lista.push($(elemento).attr('data-id'));
                    }
                });

                $('#lista_bonos_prof').val(lista.join("|"));

                console.log($('#lista_bonos_prof').val());
            }

            function cargar_registros_prof()
            {
                let url = "{{ route('asistentecm.rendicion_carga_bonos') }}";
                $('#tabla_rendir_caja').DataTable();
                $('#tabla_rendir_caja_prof').DataTable().destroy();
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        'id_profesional': $('#id_asistente_receptor_prof').val()
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {

                        $('#numero_bonos_prof').val(data.total_bonos);
                        $('#efectivo_prof').val(data.total_efectivo);
                        $('#otros_prof').val(data.total_otros);
                        $('#total_prof').val(data.total);


                        $('#tabla_rendir_caja_prof tbody').html('');

                        for (var i = 0; i < data.bono.length; i++) {

                            var fila = '';
                            fila += '<tr>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].tipo_bono.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].numero_bono + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].convenio.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + (data.bono[i].id_clase_bono || '') + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].aporte_seguro || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].bonificacion || 0) + '</td>';

                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].valor_atencion || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].a_pagar || data.bono[i].valor_atencion) + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].fecha_atencion + '</td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>' + data.bono[i].paciente.nombres + ' ' + data.bono[i].paciente.apellido_uno + ' ' + data.bono[i].paciente.apellido_dos + '</span><br>';
                            fila += '        <span>' + data.bono[i].paciente.rut + '</span>';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>' + data.bono[i].profesional.nombre + ' ' + data.bono[i].profesional.apellido_uno + ' ' + data.bono[i].profesional.apellido_dos + '</span>';
                            fila += '    </td>';
                            fila += '</tr>';

                            $('#tabla_rendir_caja_prof tbody').append(fila);
                        }

                        // Reactivar el DataTable
                        $('#tabla_rendir_caja_prof').DataTable({
                            responsive: true,
                            destroy: true // importante para evitar errores si recargas la tabla
                        });



                        $('#lista_bonos_prof').val(data.lista_bonos)

                    }
                    else
                    {
                        swal({
                            title: "Problemas al cargar bonos del día",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                        return '0';
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

            function rendir_caja_prof()
            {
                let url = "{{ route('asistentecm.solicitar_rendir_caja.prof') }}";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        bonos : $('#lista_bonos_prof').val(),
                        id_asistente_receptor : $('#id_asistente_receptor_prof').val(),
                        archivos : $('#input_lista_archivo_prof').val(),
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#numero_rendicion_hidde').val(data.last_id);
                        $('#numero_rendicion').html(data.last_id);
                        $('#nombre_receptor').html(data.registro.profesional_receptor.nombres+' '+data.registro.profesional_receptor.apellido_uno+' '+data.registro.profesional_receptor.apellido_dos);
                        $('#total_documento').html(data.registro.total_documentos);
                        $('#total_bonos').html(data.registro.total_bono);
                        $('#total_efectivo').html(data.registro.total_efectivo);
                        $('#total_otros').html(data.registro.total_otros);

                        $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                        $('#rendicion_caja_diaria').modal('show',{backdrop: 'static', keyboard: false});
                        console.log(data.autorizacion);
                        tiempo = data.autorizacion.tiempo;
                        conteo_activo = 1;
                        validar_rendicion();
                    }
                    else
                    {
                        swal({
                            title: "Solicitud de Rendicion con Problema",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

            function generar_pdf_rendicion_cm(){
                let url = "{{ route('asistentecm.pdf_bonos_cm_dia') }}";

                $.ajax({
                    url: url,
                    type: "get",
                })
                .done(function(data) {
                     console.log(data);
                    // Abrir el PDF en una ventana emergente
                    var width = 800;
                    var height = 600;
                    var left = (screen.width - width) / 2;
                    var top = (screen.height - height) / 2;
                    window.open(data.ruta, 'Rendición Caja', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError);
                    swal({
                        title: "Error al generar PDF Rendición Caja",
                        text: jqXHR.responseJSON.error || 'Intente nuevamente, si el problema persiste contacte al administrador',
                        icon: "error",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                });
            }

            function generar_pdf_rendicion_prof(){
                let id_profesional = $('#id_asistente_receptor_prof').val();
                let url = "{{ url('flujo_caja/caja/pdf/bonos/prof/dia') }}"+"/"+id_profesional;

                $.ajax({
                    url: url,
                    type: "get",
                })
                .done(function(data) {
                     console.log(data);
                   // Abrir el PDF en una ventana emergente
                   var width = 800;
                            var height = 600;
                            var left = (screen.width - width) / 2;
                            var top = (screen.height - height) / 2;
                            window.open(data.ruta, 'Rendición Caja', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

            function buscarRendicion(){
                console.log('buscarRendicion');
                let url = "{{ route('asistentecm.rendicion_carga_bonos_fecha') }}";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        'fecha': $('#fecha_rendicion').val()
                    },
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 1)
                    {

                        $('#numero_bonos').val(data.total_bonos);
                        $('#efectivo').val(data.total_efectivo);
                        $('#otros').val(data.total_otros);
                        $('#total').val(data.total);


                        $('#tabla_rendir_caja tbody').html('');

                        for (var i = 0; i < data.bono.length; i++) {
                            // formatear numero con separador de miles
                            var numeroBono = data.bono[i].numero_bono.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var valorAtencion = data.bono[i].valor_atencion.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var a_pagar = data.bono[i].a_pagar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var aporte_convenio = data.bono[i].aporte_seguro.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var bonificacion = data.bono[i].bonificacion.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                            var fila = '';
                            fila += '<tr>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].tipo_bono.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + numeroBono + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].convenio.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + (data.bono[i].tipo || '') + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (aporte_convenio || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (bonificacion || 0) + '</td>';

                            fila += '    <td class="align-middle text-center">$' + (valorAtencion || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (a_pagar || valorAtencion) + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].fecha_atencion + '</td>';

                            fila += '</tr>';

                            $('#tabla_rendir_caja tbody').append(fila);
                        }

                        $('#lista_bonos').val(data.lista_bonos)

                    }
                    else
                    {
                        swal({
                            title: "Problemas al cargar bonos del día",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                        return '0';
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
        </script>
    @endsection
