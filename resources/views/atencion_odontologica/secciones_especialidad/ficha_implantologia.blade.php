<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_impl_tab" data-toggle="tab" href="#atencion_dent_impl" role="tab" aria-controls="atencion_dent_impl" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto_adulto_tab" data-toggle="tab" href="#odonto_adulto" role="tab" aria-controls="odonto_adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eval_periimpl_tab" data-toggle="tab" href="#eval_periimpl" role="tab" aria-controls="eval_periimpl" aria-selected="false">Evaluación-Periodonto-pre-implantar</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_general_tab" data-toggle="tab" href="#evaluacion_general" role="tab" aria-controls="evaluacion_general" aria-selected="false">Evaluación General</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
                    </li>
                </ul>
            </div>
           <!-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>-->
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{ $profesional->id_especialidad }}">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                    @csrf
                    <div class="tab-content" id="od_imp-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_impl" role="tabpanel" aria-labelledby="atencion_dent_impl_tab">
                            <!--FORMULARIOS menor-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                            <!--Motivo consulta-->
                                 @include('atencion_odontologica.generales.motivo_consulta')
                            <!--EXAMEN ODONT GENERAL - PARAMETROS DE CONTROL-->
                                 @include('atencion_odontologica.generales.includes.odontologia_general')
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_impl">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_impl" aria-expanded="false" aria-controls="exam_esp_impl">
                                            Examen Evaluación Pre-Implante
                                        </button>
                                    </div>
                                    <div id="exam_esp_impl" class="collapse" aria-labelledby="exam_impl" data-parent="#exam_impl">
                                        <div class="card-body-aten-a">
                                            <div id="form-exam_esp_impl">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="ant_med_dent_tab" data-toggle="tab" href="#ant_med_dent" role="tab" aria-controls="ant_med_dent" aria-selected="false">Antecedentes</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="hist_piezas_hist_tab" data-toggle="tab" href="#hist_piezas_hist" role="tab" aria-controls="hist_piezas_hist" aria-selected="true">Historia de la pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="estudio_rx_tab" data-toggle="tab" href="#estudio_rx" role="tab" aria-controls="estudio_rx" aria-selected="true">Estudio radiológico y periodontal</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_tto_impl_tab" data-toggle="tab" href="#plan_tto_impl" role="tab" aria-controls="plan_tto_impl" aria-selected="true">Planificación Tratamiento | Presupuesto</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="impl">
                                                            <!--EVALUACION ESTADO PACIENTE-->
                                                            <div class="tab-pane fade show active" id="ant_med_dent" role="tabpanel" aria-labelledby="ant_med_dent_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="antec_med_tab" data-toggle="tab" href="#antec_med" role="tab" aria-controls="antec_med" aria-selected="true">Antecedentes Médicos</a>
                                                                                            <a class="nav-link-aten text-reset" id="antec_dent_tab" data-toggle="tab" href="#antec_dent" role="tab" aria-controls="antec_dent" aria-selected="false">Antecedentes dentales</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="antec_med" role="tabpanel" aria-labelledby="antec_med_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Antecedentes Generales</label>
                                                                                                                <div class="row">
                                                                                                                    {{-- Tratamientos en curso --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Tratamientos en curso</strong></li>
                                                                                                                                    @if (isset($tratamiento_activo))
                                                                                                                                        @foreach ( $tratamiento_activo as $receta)
                                                                                                                                            @foreach ( $receta['detalle'] as $detalle)
                                                                                                                                                @if ($detalle['id_tipo_control'] == 8)
                                                                                                                                                    <li style="font-size: 12px">
                                                                                                                                                        Receta Magistral<br/>&nbsp;&nbsp;
                                                                                                                                                        <span style="font-size: 9px; font-weight: bold;">
                                                                                                                                                            @php
                                                                                                                                                                $producto_detalle_temp = json_decode($detalle['producto']);
                                                                                                                                                                // var_dump($producto_detalle_temp[0]) ;
                                                                                                                                                            @endphp
                                                                                                                                                            @foreach ( $producto_detalle_temp as $det_temp)
                                                                                                                                                                {{ $det_temp->nombre }}: {{ $det_temp->cantidad }} |
                                                                                                                                                            @endforeach
                                                                                                                                                        </span>
                                                                                                                                                    </li>
                                                                                                                                                @else
                                                                                                                                                    <li style="font-size: 12px">{{ $detalle['producto'] }}<br/>&nbsp;&nbsp;<span style="font-size: 9px; font-weight: bold;">{{ $detalle['farmaco'] }}</span></li>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endforeach
                                                                                                                                    @else
                                                                                                                                        <li>No hay registros</li>
                                                                                                                                    @endif
                                                                                                                                    <li></li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Medicamentos crónicos --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Medicamentos crónicos</strong></li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Cirugías recientes --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Cirugías recientes</strong></li>
                                                                                                                                    @if(isset($antecedentes))
                                                                                                                                    @foreach ($antecedentes as $data)
                                                                                                                                        @if($data->id_tipo_antecedente==3)
                                                                                                                                            {{-- <li>{!! $data->antecedente_data->procedimiento.'<br/>&nbsp;&nbsp;&nbsp;- '.substr($data->comentario, 0, 30) !!}</li> --}}
                                                                                                                                            <li> * {!! $data->antecedente_data->procedimiento.' - '.$data->comentario !!}</li>
                                                                                                                                        @else
                                                                                                                                            {{-- <li>No hay registros</li> --}}
                                                                                                                                        @endif
                                                                                                                                    @endforeach
                                                                                                                                    @endif
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Medicamentos recientes --}}
                                                                                                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3"> --}}
                                                                                                                        {{-- <div class="card border-card-primary h-100"> --}}
                                                                                                                            {{-- <div class="card-body"> --}}
                                                                                                                                {{-- <ul> --}}
                                                                                                                                    {{-- <li><strong>Medicamentos recientes</strong></li> --}}
                                                                                                                                    {{-- <li>No hay registros</li> --}}
                                                                                                                                {{-- </ul> --}}
                                                                                                                            {{-- </div> --}}
                                                                                                                        {{-- </div> --}}
                                                                                                                    {{-- </div> --}}

                                                                                                                    {{-- Prótesis y ortesis --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Prótesis y ortesis</strong></li>
                                                                                                                                    <li>No hay registros</li>
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
                                                                                            <div class="tab-pane fade show" id="antec_dent" role="tabpanel" aria-labelledby="antec_dent_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Antecedentes Dentales</label>
                                                                                                                                <table id="table_antecedentes_unificada" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                                                                    <thead>
                                                                                                                                        <tr>
                                                                                                                                            <th class="text-center align-middle">Fecha</th>
                                                                                                                                            <th class="text-center align-middle">Procedimiento</th>
                                                                                                                                            <th class="text-center align-middle">Responsable</th>
                                                                                                                                            <th class="text-center align-middle">Detalles / Comentarios</th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>

                                                                                                                                    <!-- Sección Anestesia -->
                                                                                                                                    <tbody id="tbody_anestesia">
                                                                                                                                        <tr class="table-primary">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Anestesia</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 1 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
                                                                                                                                    </tbody>

                                                                                                                                    <!-- Sección Hemorragias -->
                                                                                                                                    <tbody id="tbody_hemorragias">
                                                                                                                                        <tr class="table-danger">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Hemorragia</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 4 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
                                                                                                                                    </tbody>

                                                                                                                                    <!-- Sección Fracturas -->
                                                                                                                                    <tbody id="tbody_fracturas">
                                                                                                                                        <tr class="table-warning">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Fracturas</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 9 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--HISTORIA-->
                                                            <div class="tab-pane fade show " id="hist_piezas_hist" role="tabpanel" aria-labelledby="hist_piezas_hist_tab">
                                                                <div id="hist_piezas">
                                                                    @php $count_hist = 1; @endphp
                                                                    @foreach ($examenes_pre_implante as $e)
                                                                    <div class="card-body mb-2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza{{ $count_hist }}" value="{{ $e->numero_pieza }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                                                                                            <input type="text" class="form-control form-control-sm" value="{{ $e->perdida }}">
                                                                                        </div>
                                                                                        <div class="form-group" id="div_perdida" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Años</label>
                                                                                            <input type="text" class="form-control form-control-sm" value="{{ $e->tiempo }}">
                                                                                        </div>
                                                                                        <div class="form-group" id="div_anos_perd" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Años</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral">{{ $e->observaciones }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_hist({{ $e->id }})">X</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $count_hist++; @endphp
                                                                    @endforeach
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">

                                                                                <div id="contenedor_piezas_hist"></div>
                                                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist({{ $count_hist }},'impl')"><i class="fas fa-save"></i> Mostrar nueva pieza</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <!--ESTUDIO RADIOLÓGICO POR PIEZA-->
                                                            <div class="tab-pane fade show" id="estudio_rx" role="tabpanel" aria-labelledby="estudio_rx_tab">
                                                                <div id="contenedor_imagenes_dent_estudio">
                                                                    @php $count = 1; @endphp
                                                                    @foreach ($imagenes_preimplante as $imagen)
                                                                    <div class="form-row">
                                                                        <div class="col-sm-8 mt-2">
                                                                            <div class="card">
                                                                                <div class="card text-center">
                                                                                    <h6>EVALUACIÓN RADIOLÓGICA GENERAL</h6>
                                                                                </div>

                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row mb-1">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row">
                                                                                                        @if (!empty($imagen->paths_imagenes) && is_array($imagen->paths_imagenes))
                                                                                                            @foreach ($imagen->paths_imagenes as $path)
                                                                                                                @if (isset($path['momento']) && $path['momento'] === 'Pre')
                                                                                                                    <div>
                                                                                                                        <!-- Botón para ampliar imagen -->
                                                                                                                        <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                                                                                            <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                                                                                                alt="Imagen del examen"
                                                                                                                                class="img-fluid mx-2 imagen_rx">
                                                                                                                        </a>

                                                                                                                        <!-- Botón para eliminar imagen -->
                                                                                                                        <button type="button"
                                                                                                                                class="btn btn-outline-danger btn-sm my-2"
                                                                                                                                onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                                            <i class="fas fa-trash"></i>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <p>No hay imágenes disponibles para este examen.</p>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-footer">

                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 mt-2">

                                                                                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 mt-2" >
                                                                            <div class="form-group fill">

                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia{{ $count }}" name="biopsia_check_implantologia{{ $count }}" value="" >
                                                                                    <label for="biopsia_check_implantologia{{ $count }}" class="cr"></label>
                                                                                </div>
                                                                                <label>biopsia</label>
                                                                                <hr>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $count }}" id="im_biop_zona{{ $count }}" disabled>{{ $imagen->zona_y_motivo }}</textarea>
                                                                                </div>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $count }}" id="im_obs_result_biopsia{{ $count }}" disabled>{{ $imagen->observaciones }}</textarea>
                                                                                </div>
                                                                                <hr>
                                                                                    <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
                                                                                <hr>
                                                                                <div class="form-group fill m-50" >
                                                                                    <button type="button" class="btn btn-outline-success btn-sm accion_modal_interconsulta_respuesta" onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
                                                                                </div>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $count++; @endphp
                                                                    @endforeach
                                                                </div>

                                                                <div id="contenedor_nueva_imagen_dent_estudio">

                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-12">
                                                                        <div class="form-group">

                                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nuevas_imagenes_dent_estudio()">CARGAR NUEVA IMAGEN</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_tto_impl" role="tabpanel" aria-labelledby="plan_tto_impl_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_tto_implante">

                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="col-sm-4 col-md-4 col-xl-4">
                                                                                                <div class="form-row">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza2" onclick="mostrar_nueva_pieza_dental_tto()"><i class="fas fa-save"></i> Cargar otra pieza</button>
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
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp_imp_col">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_imp_col_c" aria-expanded="false" aria-controls="exam_esp_imp_col_c">
                                            Colocación de Implantes
                                        </button>
                                    </div>
                                    <div id="exam_esp_imp_col_c" class="collapse" aria-labelledby="exam_esp_imp_col" data-parent="#exam_esp_imp_col">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-col_implantes">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="coloc_impl" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="col_implantes_tab" data-toggle="tab" href="#col_implantes" role="tab" aria-controls="col_implantes" aria-selected="true">Procedimiento</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="protocolo_implantes_tab" data-toggle="tab" href="#protocolo_implantes" role="tab" aria-controls="protocolo_implantes" aria-selected="true">Protocolo e Indicaciones</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="col_implante">
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="col_implantes" role="tabpanel" aria-labelledby="col_implantes_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_implantologia">
                                                                                    <div id="pieza_dental_dolor" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                                                                                        <select name="tpo_proc_imp" data-titulo="tpo_proc_imp" data-seccion="Implante"  id="tpo_proc_imp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp','div_tpo_proc_imp','obs_tpo_proc_impo',10);">
                                                                                                            <option selected  value="1">Anclaje de precisión s/implantes</option>
                                                                                                            <option value="2">Anclaje de presición sobre Implante</option>
                                                                                                            <option value="3">Barra para prótesis sobre Implante</option>
                                                                                                            <option value="4">Cirugía Periimplantaria de manejo de tejidos blandos, por sitio</option>
                                                                                                            <option value="5">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                                                                                            <option value="6">Conexión de Implante (No incluye valor aditamientos)</option>
                                                                                                            <option value="7">Corona de cerámica s/metal sobre implante cementada</option>
                                                                                                            <option value="8">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                                                                                            <option value="9"> Corona provisional s/implante</option>
                                                                                                            <option value="10">  Corona Temporal Sobre Implantes</option>
                                                                                                            <option value="10">  Otro proc Implantes</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tpo_proc_imp" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp" id="obs_tpo_proc_imp"></textarea>
                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">UCO?</label>
                                                                                                            <input type="text"class="form-control form-control-sm">
                                                                                                        </div>
                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                            <input type="text"class="form-control form-control-sm">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Anestesia</label>
                                                                                                        <select name="anestesia_impl" data-titulo="anestesia_impl" data-seccion="anestesia_impl"  id="anestesia_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl','div_anestesia_impl','obs_anestesia_impl',4);">
                                                                                                            <option selected  value="1">Local</option>
                                                                                                            <option value="2">Local mas sedación consciente</option>
                                                                                                            <option value="3">Anestesia General</option>
                                                                                                            <option value="4">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_anestesia_impl" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl" id="obs_anestesia_impl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Incidentes</label>
                                                                                                        <select name="incid_col_impl" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl','div_incid_col_impl','obs_incid_col_impl',2);">
                                                                                                            <option selected  value="1">Sin incidentes</option>
                                                                                                            <option value="2">Con Incidentes</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_incid_col_impl" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Describa Incidente</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl" id="obs_incid_col_impl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Material de injerto óseo</label>
                                                                                                        <select name="mat_inj_oseo" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo','div_mat_inj_oseo','obs_mat_inj_oseo',6);">
                                                                                                            <option selected  value="1">Sin Injerto Óseo</option>
                                                                                                            <option value="2">autoinjerto</option>
                                                                                                            <option value="3">aloinjerto</option>
                                                                                                            <option value="4">xenoinjerto</option>
                                                                                                            <option value="5">aloplástico</option>
                                                                                                            <option value="6">Otro (describir)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_mat_inj_oseo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseor" id="obs_mat_inj_oseo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Método de injerto óseo</label>
                                                                                                        <select name="tipo_inj_oseo" data-titulo="implantes"  id="tipo_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_inj_oseo','div_tipo_inj_oseo','obs_tipo_inj_oseo',6);">
                                                                                                            <option selected  value="1">Sin Injerto Óseo</option>
                                                                                                            <option value="2">Osteoplastia</option>
                                                                                                            <option value="3">implantes subperiosticos</option>
                                                                                                            <option value="4">técnicas de ensanchamiento</option>
                                                                                                            <option value="5">Elevación de piso seno</option>
                                                                                                            <option value="6">Otro (describir)</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tipo_inj_oseo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_inj_oseo" id="obs_tipo_inj_oseo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Suturas</label>
                                                                                                        <select name="suturas" data-titulo="suturas" data-seccion="suturas"  id="suturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas','div_suturas','obs_suturas',5);">
                                                                                                            <option selected  value="1">Catgut</option>
                                                                                                            <option value="2">Seda</option>
                                                                                                            <option value="3">Nylon</option>
                                                                                                            <option value="4">Polipropileno</option>
                                                                                                            <option value="5">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_suturas" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Describa</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas" id="obs_suturas"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--PROTOCOLO-->
                                                            <div class="tab-pane fade show" id="protocolo_implantes" role="tabpanel" aria-labelledby="protocolo_implantes_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="prot_impl_tab" data-toggle="tab" href="#prot_impl" role="tab" aria-controls="prot_impl" aria-selected="true">Protocolo</a>
                                                                                            <a class="nav-link-aten text-reset" id="ind_impl_tab" data-toggle="tab" href="#ind_impl" role="tab" aria-controls="ind_impl" aria-selected="false">Indicaciones</a>
                                                                                            <a class="nav-link-aten text-reset" id="cit_control_impl_tab" data-toggle="tab" href="#cit_control_impl" role="tab" aria-controls="cit_control_impl" aria-selected="false">Control</a>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="prot_impl" role="tabpanel" aria-labelledby="prot_impl_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Equipo Cirujanos</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_cirujanos_imp"id="prot_cirujanos_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Anestesista</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_anestesista_imp"id="prot_anestesista_imp">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tons</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_tons_imp"id="prot_tons_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Forma y material del Implante</label>
                                                                                                                <select name="prot_forma_mat" id="prot_forma_mat"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_forma_mat','div_prot_forma_mat','det_prot_forma_mat',13)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Cilíndricos Titanio</option>
                                                                                                                    <option value="2">Cilíndricos Porcelana</option>
                                                                                                                    <option value="3">Cilíndricos Zirconio</option>
                                                                                                                    <option value="4">Laminados Titanio</option>
                                                                                                                    <option value="5">Laminados Porcelana</option>
                                                                                                                    <option value="6">Laminados Zirconio</option>
                                                                                                                    <option value="7">Tornillo Titanio</option>
                                                                                                                    <option value="8">Tornillo Porcelana</option>
                                                                                                                    <option value="9">Tornillo Zirconio</option>
                                                                                                                    <option value="10">Cónicos Titanio</option>
                                                                                                                    <option value="11">Cónicos Porcelana</option>
                                                                                                                    <option value="12">Cónicos Zirconio</option>
                                                                                                                    <option value="13">Otro</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_forma_mat" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_forma_mat" id="det_prot_forma_mat"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Marca Inplante</label>
                                                                                                                <select name="prot_marc_implante"  id="prot_marc_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);">
                                                                                                                    <option selected  value="1">MARCA 1</option>
                                                                                                                    <option value="2">MARCA 2</option>
                                                                                                                    <option value="3">OTRO</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_prot_marc_implante" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Otra Marca</label>
                                                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Implantes</label>
                                                                                                                <select name="prot_proc" id="prot_proc"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_proc','div_prot_proc','det_prot_proc',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Implante único</option>
                                                                                                                    <option value="2">Implante Múltiple</option>
                                                                                                                    <option value="3">Otro</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_proc" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_proc" id="det_prot_proc"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Corona/Prot provisoria</label>
                                                                                                                <select name="prot_prot_corona" id="prot_prot_corona"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_prot_corona','div_prot_prot_corona','det_prot_prot_corona',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Si</option>
                                                                                                                    <option value="2">No</option>
                                                                                                                    <option value="3">Otro (describa)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_prot_corona" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_prot_corona" id="det_prot_prot_corona"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Piezas N°</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_pieza_imp"id="prot_pieza_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Detalle Cirugía</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 text-center">
                                                                                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                                                                                                PDF</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="ind_impl" role="tabpanel" aria-labelledby="ind_impl_tab">

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="recomendaciones_implante();" ><i class="fas fa-save"></i> Indicaciones Generales Post Implante </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="recomendaciones_esp_implante();" ><i class="fas fa-save"></i> Indicaciones Especiales para el paciente post Implante  </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="cit_control_impl" role="tabpanel" aria-labelledby="cit_control_impl_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Fecha de Próximo Control</label>
                                                                                                                                        <input class="form-control form-control-sm" type="date" name="f_control_impl"id="f_control_impl">
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                                <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Ir a Agendar</button>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp_imp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_imp_c" aria-expanded="false" aria-controls="exam_esp_imp_c">
                                            Control Implantes
                                        </button>
                                    </div>
                                    <div id="exam_esp_imp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp_imp">
                                        <div class="card-body-aten-a">
                                            <div id="form-endo-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="implantologia_control" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_post_implante_tab" data-toggle="tab" href="#eval_post_implante" role="tab" aria-controls="eval_post_implante" aria-selected="true">Evaluación Implante Único</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="grupos_de_imp_tab" data-toggle="tab" href="#grupos_de_imp" role="tab" aria-controls="grupos_de_imp" aria-selected="true">Evaluación Grupos de Implante</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="corona_prot_tab" data-toggle="tab" href="#corona_prot" role="tab" aria-controls="corona_prot" aria-selected="true">Instalación de Corona |  Prótesis</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="prox_cont_imp_tab" data-toggle="tab" href="#prox_cont_imp" role="tab" aria-controls="prox_cont_imp" aria-selected="true">Próximo control e Indicaciones</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                        <!--EVALUACION POST IMPLANTE UNICO-->
                                                                        <div class="tab-pane fade show active" id="eval_post_implante" role="tabpanel" aria-labelledby="eval_post_implante_tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div id="contenedor_pieza_dental_implantada">
                                                                                                <div id="pieza_dental_implantada" class="row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Estabilidad (ISQ)</label>
                                                                                                                    <select name="estab_implante"  data-seccion="General_endodoncia"  id="estab_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_implante','div_estab_implante','obs_estab_implante',8);">
                                                                                                                        <option value="1">30</option>
                                                                                                                        <option value="2">40</option>
                                                                                                                        <option value="3">50</option>
                                                                                                                        <option selected  value="4">60</option>
                                                                                                                        <option value="5">70</option>
                                                                                                                        <option value="6">80</option>
                                                                                                                        <option value="7">90</option>
                                                                                                                        <option value="8">Otra describir</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_estab_implante" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa otra observación</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_implante" id="obs_estab_implante"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Posición</label>
                                                                                                                    <select name="posc_impl" data-titulo="Ex_cuello" data-seccion="Cuello"  id="posc_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_impl','div_posc_impl','posc_vp',2);">
                                                                                                                        <option selected  value="1">Correcta</option>
                                                                                                                        <option value="2">Incorrecta(Describir)</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_posc_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                                                                                                    <input type="text"class="form-control form-control-sm" id="posc_vp">
                                                                                                                    <div class="form-group mt-1">
                                                                                                                        <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_vl">
                                                                                                                    </div>
                                                                                                                    <div class="form-group mt-1">
                                                                                                                        <label class="floating-label-activo-sm">Mesio-distal</label>
                                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_md">
                                                                                                                    </div>
                                                                                                                    <div class="form-group mt-1">
                                                                                                                        <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_cc">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Altura </label>
                                                                                                                    <input type="number" class="form-control form-control-sm ">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Dpa </label>
                                                                                                                    <input type="number" class="form-control form-control-sm " placeholder="dist. pieza adyacente">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Desgaste del implante</label>
                                                                                                                    <select name="desg_impl"  id="desg_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_impl','div_desg_impl','obs_desg_impl',2);">
                                                                                                                        <option value="1">No</option>
                                                                                                                        <option value="2">Si(describa)</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_desg_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa otro</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_impl" id="obs_desg_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Estado de la encía</label>
                                                                                                                    <select name="est_encia_impl" id="est_encia_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_impl','div_est_encia_impl','obs_est_encia_impl',2);">
                                                                                                                        <option value="1">Normal</option>
                                                                                                                        <option value="2">Anormal(describa)</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_est_encia_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa anormal</label>
                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_impl" id="obs_est_encia_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Hueso circundante</label>
                                                                                                                    <select name="hueso_cont_impl"  id="hueso_cont_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hueso_cont_impl','div_hueso_cont_impl','obs_hueso_cont_impl',2);">
                                                                                                                        <option selected  value="1">Normal</option>
                                                                                                                        <option value="2">Anormal describir</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_hueso_cont_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa Anormal</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hueso_cont_impl" id="obs_hueso_cont_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones al control del implante</label>
                                                                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_implante" id="obs_control_implante"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-12 col-md-12 mb-3">
                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--EVALUACION POST IMPLANTE MÚLTIPLE-->
                                                                        <div class="tab-pane fade show" id="grupos_de_imp" role="tabpanel" aria-labelledby="grupos_de_imp_tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div id="contenedor_pieza_dental_implantada">
                                                                                                <div id="pieza_dental_implantada" class="row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                                <label class="floating-label-activo-sm">Piezas N°</label><!--USAR SELECT 2 ?-->
                                                                                                                <input type="text" class="form-control form-control-sm" name="pzas_grupo_impl" id="pzas_grupo_impl">
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Estabilidad (ISQ)</label>
                                                                                                                    <select name="estab_grupo_implante"    id="estab_grupo_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_grupo_implante','div_estab_grupo_implante','obs_estab_grupo_implante',8);">
                                                                                                                        <option value="1">30</option>
                                                                                                                        <option value="2">40</option>
                                                                                                                        <option value="3">50</option>
                                                                                                                        <option selected  value="4">60</option>
                                                                                                                        <option value="5">70</option>
                                                                                                                        <option value="6">80</option>
                                                                                                                        <option value="7">90</option>
                                                                                                                        <option value="8">Otra describir</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_estab_grupo_implante" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa otra observación</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_grupo_implante" id="obs_estab_grupo_implante"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Posición</label>
                                                                                                                    <select name="posc_grupo_impl"  id="posc_grupo_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_grupo_impl','div_posc_grupo_impl','posc_grupo_vp',2);">
                                                                                                                        <option selected  value="1">Correcta</option>
                                                                                                                        <option value="2">Incorrecta(Describir)</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_posc_grupo_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                                                                                                    <input type="text"class="form-control form-control-sm" id="posc_grupo_vp">
                                                                                                                    <div class="form-group mt-1">
                                                                                                                        <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_vl">
                                                                                                                    </div>
                                                                                                                    <div class="form-group mt-1">
                                                                                                                        <label class="floating-label-activo-sm">Mesio-distal</label>
                                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_md">
                                                                                                                    </div>
                                                                                                                    <div class="form-group mt-1">
                                                                                                                        <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_cc">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Altura </label>
                                                                                                                    <input type="number" class="form-control form-control-sm ">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Dpa </label>
                                                                                                                    <input type="number" class="form-control form-control-sm " placeholder="dist. pieza adyacente">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Desgaste del implante</label>
                                                                                                                    <select name="desg_gpo_impl"  id="desg_gpo_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_gpo_impl','div_desg_gpo_impl','obs_desg_gpo_impl',2);">
                                                                                                                        <option value="1">No</option>
                                                                                                                        <option value="2">Si(describa)</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_desg_gpo_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa otro</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_gpo_impl" id="obs_desg_gpo_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Estado de la encía</label>
                                                                                                                    <select name="est_encia_gpo_impl" id="est_encia_gpo_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_gpo_impl','div_est_encia_gpo_impl','obs_est_encia_gpo_impl',2);">
                                                                                                                        <option value="1">Normal</option>
                                                                                                                        <option value="2">Anormal(describa)</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_est_encia_gpo_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa anormal</label>
                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_gpo_impl" id="obs_est_encia_gpo_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Hueso circundante</label>
                                                                                                                    <select name="hueso_cont_gpo_impl"  id="hueso_cont_gpo_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hueso_cont_gpo_impl','div_hueso_cont_gpo_impl','obs_hueso_cont_gpo_impl',2);">
                                                                                                                        <option selected  value="1">Normal</option>
                                                                                                                        <option value="2">Anormal describir</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_hueso_cont_gpo_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa Anormal</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hueso_cont_gpo_impl" id="obs_hueso_cont_gpo_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Evaluación Corona | Prótesis</label>
                                                                                                                    <select name="corprot_cont_impl"  id="corprot_cont_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corprot_cont_impl','div_corprot_cont_impl','obs_corprot_cont_impl',2);">
                                                                                                                        <option selected  value="1">Normal</option>
                                                                                                                        <option value="2">Anormal describir</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_corprot_cont_impl" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Describa Anormal</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_corprot_cont_impl" id="obs_corprot_cont_impl"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones al control grupo implante</label>
                                                                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_gpo_implante" id="obs_control_gpo_implante"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-12 col-md-12 mb-3">
                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" ><i class="fas fa-save"></i>Cargar Otro Grupo</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--INSTALACIÓN DE CORONA-->
                                                                        <div class="tab-pane fade show" id="corona_prot" role="tabpanel" aria-labelledby="corona_prot_tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                        <a class="nav-link-aten text-reset active" id="prot_impl_tab" data-toggle="tab" href="#corona_impl" role="tab" aria-controls="corona_impl" aria-selected="true">Corona</a>
                                                                                                        <a class="nav-link-aten text-reset" id="protesis_impl_tab" data-toggle="tab" href="#protesis_impl" role="tab" aria-controls="protesis_impl" aria-selected="false">Prótesis</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                                        <div class="tab-pane fade show active" id="corona_impl" role="tabpanel" aria-labelledby="corona_impl_tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Toma de medida y envío a laboratorio</label>
                                                                                                                            <select name="corona_toma_imp" id="corona_toma_imp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corona_toma_imp','div_corona_toma_imp','det_corona_toma_imp',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>

                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"   id="div_corona_toma_imp" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Nombre Paciente</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                            <div class="form-group mt-3">
                                                                                                                                <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                            </div>
                                                                                                                            <div class="form-group mt-3">
                                                                                                                                <label class="floating-label-activo-sm">Numero de orden</label>
                                                                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                                                                                                            <select name="prueba_ajuste_cor"  id="prueba_ajuste_cor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_cor','div_prueba_ajuste_cor','obs_prueba_ajuste_cor',2);">
                                                                                                                                <option selected  value="1">Buena </option>
                                                                                                                                <option value="2">No devuelta a laboratorio</option>

                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_prueba_ajuste_cor" style="display:none;">
                                                                                                                            <label class="floating-label-activo-sm">Otro describa</label>
                                                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_cor" id="obs_prueba_ajuste_cor"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Pulido</label>
                                                                                                                            <select name="pulido_ajuste" id="pulido_ajuste"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste','div_pulido_ajuste','det_pulido_ajuste',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Satisfactorio</option>
                                                                                                                                <option value="2">Deficiente se cita a control</option>

                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"   id="div_pulido_ajuste" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste" id="det_pulido_ajuste"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="tab-pane fade show" id="protesis_impl" role="tabpanel" aria-labelledby="protesis_impl_tab">
                                                                                                            <div class="form-row">
                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Tipo de Prótesis Superior</label>
                                                                                                                        <select name="protesis_imp_sup" id="protesis_imp_sup"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('protesis_imp_sup','div_protesis_imp_sup','det_protesis_imp_sup',2)">
                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                            <option value="1">Total superior</option>
                                                                                                                            <option value="2">Parcial superior</option>

                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group"   id="div_protesis_imp_sup" style="display:none">
                                                                                                                        <label class="floating-label-activo-sm">Nombre Paciente</label>
                                                                                                                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        <div class="form-group mt-3">
                                                                                                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                        <div class="form-group mt-3">
                                                                                                                            <label class="floating-label-activo-sm">Numero de orden</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Tipo de Prótesis Inferior</label>
                                                                                                                        <select name="protesis_imp_inf" id="protesis_imp_inf"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('protesis_imp_inf','div_protesis_imp_inf','det_protesis_imp_inf',2)">
                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                            <option value="1">Total Inferior</option>
                                                                                                                            <option value="2">Parcial Inferior</option>

                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group"   id="div_protesis_imp_inf" style="display:none">
                                                                                                                        <label class="floating-label-activo-sm">Nombre Paciente</label>
                                                                                                                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        <div class="form-group mt-3">
                                                                                                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                        <div class="form-group mt-3">
                                                                                                                            <label class="floating-label-activo-sm">Numero de orden</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Toma de impresión y envío a laboratorio</label>
                                                                                                                        <select name="protesis_toma_imp" id="protesis_toma_imp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('protesis_toma_imp','div_protesis_toma_imp','det_protesis_imp_sup',2)">
                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                            <option value="1">No</option>
                                                                                                                            <option value="2">Si</option>

                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group"   id="div_protesis_toma_imp" style="display:none">
                                                                                                                        <label class="floating-label-activo-sm">Nombre Paciente</label>
                                                                                                                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        <div class="form-group mt-3">
                                                                                                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                        <div class="form-group mt-3">
                                                                                                                            <label class="floating-label-activo-sm">Numero de orden</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                                                                                                        <select name="prueba_ajuste_protesis"  id="prueba_ajuste_protesis" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_protesis','div_prueba_ajuste_protesis','obs_prueba_ajuste_protesis',2);">
                                                                                                                            <option selected  value="1">Buena </option>
                                                                                                                            <option value="2">No devuelta a laboratorio</option>

                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group" id="div_prueba_ajuste_protesis" style="display:none;">
                                                                                                                        <label class="floating-label-activo-sm">Otro describa</label>
                                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_protesis" id="obs_prueba_ajuste_protesis"></textarea>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                {{--  <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Pulido y otros</label>
                                                                                                                        <select name="pulido_ajuste" id="pulido_ajuste"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste','div_pulido_ajuste','det_pulido_ajuste',2)">
                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                            <option value="1">Satisfactorio</option>
                                                                                                                            <option value="2">Deficiente se cita a control</option>

                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group"   id="div_pulido_ajuste" style="display:none">
                                                                                                                        <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste" id="det_pulido_ajuste"></textarea>
                                                                                                                    </div>
                                                                                                                </div>  --}}


                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{--  <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div id="contenedor_pieza_dental_endo">
                                                                                                <div id="pieza_dental" class="row">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Piezas N°s</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Toma de impresión</label>
                                                                                                                <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                                    <option selected  value="1"> No realizada</option>
                                                                                                                    <option selected  value="1">Normal</option>
                                                                                                                    <option value="2">Anormal describir</option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Prueba y cementado</label>
                                                                                                                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                                    <option selected  value="1"> No realizada</option>
                                                                                                                    <option selected  value="1">Normal</option>
                                                                                                                    <option value="2">Anormal describir</option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">corona | Protesis provisoria</label>
                                                                                                                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                                    <option value="1"> Corona</option>
                                                                                                                    <option value="2"> Prótesis</option>
                                                                                                                    <option value="3">Otra describir</option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Pulido</label>
                                                                                                                <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                                    <option selected  value="1"> No realizada</option>
                                                                                                                    <option selected  value="1">Normal</option>
                                                                                                                    <option value="2">Anormal describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones colacación corona</label>
                                                                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_implante" id="obs_control_implante"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4 col-md-4 mb-3">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>  --}}
                                                                        </div>
                                                                        <!--INDICACIONES Y PROXIMO CONTROL-->
                                                                        <div class="tab-pane fade show" id="prox_cont_imp" role="tabpanel" aria-labelledby="prox_cont_imp_tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="recomendaciones_implante();" ><i class="fas fa-save"></i> Indicaciones Generales Post Implante </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="recomendaciones_esp_implante();"><i class="fas fa-save"></i> Indicaciones Especiales para el paciente post Implante  </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Fecha de Próximo Control</label>
                                                                                                <input class="form-control form-control-sm" type="date" name="f_control_impl"id="f_control_impl">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Ir a Agendar</button>
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
                            <!--EVALUACION PERIODONCIA -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_period">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval_period_1" aria-expanded="false" aria-controls="eval_period_1">
                                           Evaluación Periodóncica EN PREPARACION
                                        </button>
                                    </div>
                                    <div id="eval_period_1" class="collapse" aria-labelledby="eval_period" data-parent="#eval_period">
                                        <div class="card-body-aten-a">
                                            <div id="form-exam_esp_period">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="ant_med_dent_period_tab" data-toggle="tab" href="#ant_med_dent_period" role="tab" aria-controls="ant_med_dent_period" aria-selected="false">Antecedentes</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="hist_piezas_period_tab" data-toggle="tab" href="#hist_piezas_period" role="tab" aria-controls="hist_pieza_periods" aria-selected="true">Historia de la pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="estudio_rx_period_tab" data-toggle="tab" href="#estudio_rx_period" role="tab" aria-controls="estudio_rx_period" aria-selected="true">Estudio radiológico y periodontal</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_tto_period_tab" data-toggle="tab" href="#plan_tto_period" role="tab" aria-controls="plan_tto_period" aria-selected="true">Planificación Tratamiento | Presupuesto</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="impl">
                                                            <!--EVALUACION ESTADO PACIENTE-->
                                                            <div class="tab-pane fade show active" id="ant_med_dent_period" role="tabpanel" aria-labelledby="ant_med_dent_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="antec_med_period_tab" data-toggle="tab" href="#antec_med_period" role="tab" aria-controls="antec_med_period" aria-selected="true">Antecedentes Médicos</a>
                                                                                            <a class="nav-link-aten text-reset" id="antec_dent_period_tab" data-toggle="tab" href="#antec_dent_period" role="tab" aria-controls="antec_dent_period" aria-selected="false">Antecedentes dentales</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="antec_med_period" role="tabpanel" aria-labelledby="antec_med_period_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Antecedentes Generales</label>
                                                                                                                <div class="row">
                                                                                                                    {{-- Tratamientos en curso --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Tratamientos en curso</strong></li>
                                                                                                                                    @if (isset($tratamiento_activo))
                                                                                                                                        @foreach ( $tratamiento_activo as $receta)
                                                                                                                                            @foreach ( $receta['detalle'] as $detalle)
                                                                                                                                                @if ($detalle['id_tipo_control'] == 8)
                                                                                                                                                    <li style="font-size: 12px">
                                                                                                                                                        Receta Magistral<br/>&nbsp;&nbsp;
                                                                                                                                                        <span style="font-size: 9px; font-weight: bold;">
                                                                                                                                                            @php
                                                                                                                                                                $producto_detalle_temp = json_decode($detalle['producto']);
                                                                                                                                                                // var_dump($producto_detalle_temp[0]) ;
                                                                                                                                                            @endphp
                                                                                                                                                            @foreach ( $producto_detalle_temp as $det_temp)
                                                                                                                                                                {{ $det_temp->nombre }}: {{ $det_temp->cantidad }} |
                                                                                                                                                            @endforeach
                                                                                                                                                        </span>
                                                                                                                                                    </li>
                                                                                                                                                @else
                                                                                                                                                    <li style="font-size: 12px">{{ $detalle['producto'] }}<br/>&nbsp;&nbsp;<span style="font-size: 9px; font-weight: bold;">{{ $detalle['farmaco'] }}</span></li>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endforeach
                                                                                                                                    @else
                                                                                                                                        <li>No hay registros</li>
                                                                                                                                    @endif
                                                                                                                                    <li></li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Medicamentos crónicos --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Medicamentos crónicos</strong></li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Cirugías recientes --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Cirugías recientes</strong></li>
                                                                                                                                    @if(isset($antecedentes))
                                                                                                                                    @foreach ($antecedentes as $data)
                                                                                                                                        @if($data->id_tipo_antecedente==3)
                                                                                                                                            {{-- <li>{!! $data->antecedente_data->procedimiento.'<br/>&nbsp;&nbsp;&nbsp;- '.substr($data->comentario, 0, 30) !!}</li> --}}
                                                                                                                                            <li> * {!! $data->antecedente_data->procedimiento.' - '.$data->comentario !!}</li>
                                                                                                                                        @else
                                                                                                                                            {{-- <li>No hay registros</li> --}}
                                                                                                                                        @endif
                                                                                                                                    @endforeach
                                                                                                                                    @endif
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Medicamentos recientes --}}
                                                                                                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3"> --}}
                                                                                                                        {{-- <div class="card border-card-primary h-100"> --}}
                                                                                                                            {{-- <div class="card-body"> --}}
                                                                                                                                {{-- <ul> --}}
                                                                                                                                    {{-- <li><strong>Medicamentos recientes</strong></li> --}}
                                                                                                                                    {{-- <li>No hay registros</li> --}}
                                                                                                                                {{-- </ul> --}}
                                                                                                                            {{-- </div> --}}
                                                                                                                        {{-- </div> --}}
                                                                                                                    {{-- </div> --}}

                                                                                                                    {{-- Prótesis y ortesis --}}
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Prótesis y ortesis</strong></li>
                                                                                                                                    <li>No hay registros</li>
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
                                                                                            <div class="tab-pane fade show" id="antec_dent_period" role="tabpanel" aria-labelledby="antec_dent_period_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Antecedentes Dentales</label>
                                                                                                                                <table id="table_antecedentes_unificada" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                                                                    <thead>
                                                                                                                                        <tr>
                                                                                                                                            <th class="text-center align-middle">Fecha</th>
                                                                                                                                            <th class="text-center align-middle">Procedimiento</th>
                                                                                                                                            <th class="text-center align-middle">Responsable</th>
                                                                                                                                            <th class="text-center align-middle">Detalles / Comentarios</th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>

                                                                                                                                    <!-- Sección Anestesia -->
                                                                                                                                    <tbody id="tbody_anestesia">
                                                                                                                                        <tr class="table-primary">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Anestesia</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 1 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
                                                                                                                                    </tbody>

                                                                                                                                    <!-- Sección Hemorragias -->
                                                                                                                                    <tbody id="tbody_hemorragias">
                                                                                                                                        <tr class="table-danger">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Hemorragia</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 4 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
                                                                                                                                    </tbody>

                                                                                                                                    <!-- Sección Fracturas -->
                                                                                                                                    <tbody id="tbody_fracturas">
                                                                                                                                        <tr class="table-warning">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Fracturas</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 9 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--HISTORIA-->
                                                            <div class="tab-pane fade show " id="hist_piezas_period" role="tabpanel" aria-labelledby="hist_piezas_period_tab">
                                                                {{-- @foreach ($examenes_period as $e)
                                                                <div class="card-body mb-2">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="3.2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                                                                                        <select name="perdida" id="perdida" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perdida','div_perdida','obs_perdida',3);">
                                                                                            <option selected="" value="1">Espontánea</option>
                                                                                            <option value="2">Extracción por Urgencia</option>
                                                                                            <option value="3">Otro describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_perdida" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label-activo-sm">Años</label>
                                                                                        <select name="anos_perd" id="anos_perd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anos_perd','div_anos_perd','obs_anos_perd',4);">
                                                                                            <option selected="" value="1">< 1 año</option>
                                                                                            <option value="2">2 años</option>
                                                                                            <option value="3">3 años</option>
                                                                                            <option value="4">Otro describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_anos_perd" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Años</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endforeach --}}

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                @php $count = 1; @endphp
                                                                                <div id="contenedor_piezas_hist_period"></div>
                                                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist({{ $count }},'period')"><i class="fas fa-save"></i> Mostrar nueva pieza</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <!--ESTUDIO RADIOLÓGICO POR PIEZA-->
                                                            <div class="tab-pane fade show" id="estudio_rx_period" role="tabpanel" aria-labelledby="estudio_rx_period_tab">
                                                                <div id="contenedor_imagenes_dent_period">
                                                                    @php $count = 1; @endphp
                                                                    @foreach ($imagenes_periodoncia as $imagen)
                                                                    <div class="form-row">
                                                                        <div class="col-sm-8 mt-2">
                                                                            <div class="card">
                                                                                <div class="card text-center">
                                                                                    <h6>EVALUACIÓN RADIOLÓGICA GENERAL</h6>
                                                                                </div>

                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row mb-1">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row">
                                                                                                        @if (!empty($imagen->paths_imagenes) && is_array($imagen->paths_imagenes))
                                                                                                            @foreach ($imagen->paths_imagenes as $path)
                                                                                                                @if (isset($path['momento']) && $path['momento'] === 'Pre')
                                                                                                                    <div>
                                                                                                                        <!-- Botón para ampliar imagen -->
                                                                                                                        <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                                                                                            <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                                                                                                alt="Imagen del examen"
                                                                                                                                class="img-fluid mx-2 imagen_rx">
                                                                                                                        </a>

                                                                                                                        <!-- Botón para eliminar imagen -->
                                                                                                                        <button type="button"
                                                                                                                                class="btn btn-outline-danger btn-sm my-2"
                                                                                                                                onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                                            <i class="fas fa-trash"></i>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <p>No hay imágenes disponibles para este examen.</p>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-footer">

                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 mt-2">

                                                                                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 mt-2" >
                                                                            <div class="form-group fill">
                                                                                <input type="check" name="biopsia_check_implantologia{{ $count }}" id="biopsia_check_implantologia{{ $count }}" value="">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia{{ $count }}" name="biopsia_check_implantologia{{ $count }}" value="" >
                                                                                    <label for="biopsia_check_implantologia({{ $count }})" class="cr"></label>
                                                                                </div>
                                                                                <label>biopsia</label>
                                                                                <hr>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $count }}" id="im_biop_zona{{ $count }}">{{ $imagen->zona_y_motivo }}</textarea>
                                                                                </div>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $count }}" id="im_obs_result_biopsia{{ $count }}">{{ $imagen->observaciones }}</textarea>
                                                                                </div>
                                                                                <hr>
                                                                                    <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
                                                                                <hr>
                                                                                <div class="form-group fill m-50" >
                                                                                    <button type="button" class="btn btn-outline-success btn-sm " onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
                                                                                </div>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $count++; @endphp
                                                                    @endforeach
                                                                </div>

                                                                <div id="contenedor_nueva_imagen_dent_period">

                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-12">
                                                                        <div class="form-group">

                                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nuevas_imagenes_dent_periodoncica()">CARGAR NUEVA IMAGEN</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_tto_period" role="tabpanel" aria-labelledby="plan_tto_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_implante">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="plan_implante" role="tabpanel" aria-labelledby="plan_implante_tab"><br>
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Piezas N° | Grupo</label>
                                                                                                                    <input type="text" class="form-control form-control-sm">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                                    <select name="tpo_tto_period" data-titulo="tpo_tto_period" data-seccion="Implante"  id="tpo_tto_period" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_tto_period','div_tpo_tto_period','obs_tpo_tto_period',5);">
                                                                                                                        <option selected  value="1">Raspado y alisado radicular</option>
                                                                                                                        <option value="2">antibióticos</option>
                                                                                                                        <option value="3">enjuagues bucales</option>
                                                                                                                        <option value="4">Cirugía</option>
                                                                                                                        <option value="5">  Otro proc periodontoógico</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_tpo_tto_period" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Otro proc periodontológico</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_tto_period" id="obs_tpo_tto_period"></textarea>
                                                                                                                    <div class="form-group mt-3">
                                                                                                                        <label class="floating-label-activo-sm">UCO?</label>
                                                                                                                        <input type="text"class="form-control form-control-sm">
                                                                                                                    </div>
                                                                                                                    <div class="form-group mt-3">
                                                                                                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                        <input type="text"class="form-control form-control-sm">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Cirugía</label>
                                                                                                                    <select name="cir_periodontal"  id="cir_periodontal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cir_periodontal','div_cir_periodontal','obs_cir_periodontal',6);">
                                                                                                                        <option selected  value="1">Cirugía con colgajos</option>
                                                                                                                        <option value="2">Injertos de tejido blando</option>
                                                                                                                        <option value="3">Injerto óseo</option>
                                                                                                                        <option value="4">Regeneración tisular guiada</option>
                                                                                                                        <option value="5">Proteínas estimulantes de tejidos</option>
                                                                                                                        <option value="6">OTRO</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_cir_periodontal" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Otra cirugía</label>
                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cir_periodontal" id="obs_cir_periodontal"></textarea>
                                                                                                                </div>
                                                                                                            </div>


                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                                    <select name="conv_odont_implante"   id="conv_odont_implante" class="form-control form-control-sm">
                                                                                                                        <option selected  value="1">Si</option>
                                                                                                                        <option value="2">No</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> Cargar a presupuesto</button>
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
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="col-sm-4 col-md-4 col-xl-4">
                                                                                                <div class="form-row">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza2"><i class="fas fa-save"></i> Cargar otra pieza</button>
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
                            <!--PROCEDIMIENTOS PERIODONCIA -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="tto_periodontal">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#tto_periodontal_c" aria-expanded="false" aria-controls="tto_periodontal_c">
                                            Tratamiento Periodontal EN PREPARACION
                                        </button>
                                    </div>
                                    <div id="tto_periodontal_c" class="collapse" aria-labelledby="tto_periodontal" data-parent="#tto_periodontal">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-col_implantes">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="tto_periodont" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="proc_periodontal_tab" data-toggle="tab" href="#proc_periodontal" role="tab" aria-controls="proc_periodontal" aria-selected="true">Procedimientos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="protocolo_period_tab" data-toggle="tab" href="#protocolo_period" role="tab" aria-controls="protocolo_period" aria-selected="true">Protocolo e Indicaciones</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="periodoncia_proc">
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="proc_periodontal" role="tabpanel" aria-labelledby="proc_periodontal_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_implantologia">
                                                                                    <div id="pieza_dental_dolor" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                                                                                        <select name="tpo_proc_imp" data-titulo="tpo_proc_imp" data-seccion="Implante"  id="tpo_proc_imp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp','div_tpo_proc_imp','obs_tpo_proc_impo',10);">
                                                                                                            <option selected  value="1">Anclaje de precisión s/implantes</option>
                                                                                                            <option value="2">Anclaje de presición sobre Implante</option>
                                                                                                            <option value="3">Barra para prótesis sobre Implante</option>
                                                                                                            <option value="4">Cirugía Periimplantaria de manejo de tejidos blandos, por sitio</option>
                                                                                                            <option value="5">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                                                                                            <option value="6">Conexión de Implante (No incluye valor aditamientos)</option>
                                                                                                            <option value="7">Corona de cerámica s/metal sobre implante cementada</option>
                                                                                                            <option value="8">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                                                                                            <option value="9"> Corona provisional s/implante</option>
                                                                                                            <option value="10">  Corona Temporal Sobre Implantes</option>
                                                                                                            <option value="10">  Otro proc Implantes</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tpo_proc_imp" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp" id="obs_tpo_proc_imp"></textarea>
                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">UCO?</label>
                                                                                                            <input type="text"class="form-control form-control-sm">
                                                                                                        </div>
                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                            <input type="text"class="form-control form-control-sm">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Anestesia</label>
                                                                                                        <select name="anestesia_impl" data-titulo="anestesia_impl" data-seccion="anestesia_impl"  id="anestesia_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl','div_anestesia_impl','obs_anestesia_impl',4);">
                                                                                                            <option selected  value="1">Local</option>
                                                                                                            <option value="2">Local mas sedación consciente</option>
                                                                                                            <option value="3">Anestesia General</option>
                                                                                                            <option value="4">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_anestesia_impl" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl" id="obs_anestesia_impl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Incidentes</label>
                                                                                                        <select name="incid_col_impl" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl','div_incid_col_impl','obs_incid_col_impl',2);">
                                                                                                            <option selected  value="1">Sin incidentes</option>
                                                                                                            <option value="2">Con Incidentes</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_incid_col_impl" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Describa Incidente</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl" id="obs_incid_col_impl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Material de injerto óseo</label>
                                                                                                        <select name="mat_inj_oseo" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo','div_mat_inj_oseo','obs_mat_inj_oseo',6);">
                                                                                                            <option selected  value="1">Sin Injerto Óseo</option>
                                                                                                            <option value="2">autoinjerto</option>
                                                                                                            <option value="3">aloinjerto</option>
                                                                                                            <option value="4">xenoinjerto</option>
                                                                                                            <option value="5">aloplástico</option>
                                                                                                            <option value="6">Otro (describir)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_mat_inj_oseo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseor" id="obs_mat_inj_oseo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Método de injerto óseo</label>
                                                                                                        <select name="tipo_inj_oseo" data-titulo="implantes"  id="tipo_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_inj_oseo','div_tipo_inj_oseo','obs_tipo_inj_oseo',6);">
                                                                                                            <option selected  value="1">Sin Injerto Óseo</option>
                                                                                                            <option value="2">Osteoplastia</option>
                                                                                                            <option value="3">implantes subperiosticos</option>
                                                                                                            <option value="4">técnicas de ensanchamiento</option>
                                                                                                            <option value="5">Elevación de piso seno</option>
                                                                                                            <option value="6">Otro (describir)</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tipo_inj_oseo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_inj_oseo" id="obs_tipo_inj_oseo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Suturas</label>
                                                                                                        <select name="suturas" data-titulo="suturas" data-seccion="suturas"  id="suturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas','div_suturas','obs_suturas',5);">
                                                                                                            <option selected  value="1">Catgut</option>
                                                                                                            <option value="2">Seda</option>
                                                                                                            <option value="3">Nylon</option>
                                                                                                            <option value="4">Polipropileno</option>
                                                                                                            <option value="5">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_suturas" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Describa</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas" id="obs_suturas"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--PROTOCOLO-->
                                                            <div class="tab-pane fade show" id="protocolo_period" role="tabpanel" aria-labelledby="protocolo_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="prot_period_tab" data-toggle="tab" href="#prot_period" role="tab" aria-controls="prot_period" aria-selected="true">Protocolo</a>
                                                                                            <a class="nav-link-aten text-reset" id="ind_period_tab" data-toggle="tab" href="#ind_period" role="tab" aria-controls="ind_period" aria-selected="false">Indicaciones</a>
                                                                                            <a class="nav-link-aten text-reset" id="cit_control_period_tab" data-toggle="tab" href="#cit_control_period" role="tab" aria-controls="cit_control_period" aria-selected="false">Control</a>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="prot_period" role="tabpanel" aria-labelledby="prot_period_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Equipo Cirujanos</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_cirujanos_imp"id="prot_cirujanos_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Anestesista</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_anestesista_imp"id="prot_anestesista_imp">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tons</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_tons_imp"id="prot_tons_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Forma y material del Implante</label>
                                                                                                                <select name="prot_forma_mat" id="prot_forma_mat"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_forma_mat','div_prot_forma_mat','det_prot_forma_mat',13)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Cilíndricos Titanio</option>
                                                                                                                    <option value="2">Cilíndricos Porcelana</option>
                                                                                                                    <option value="3">Cilíndricos Zirconio</option>
                                                                                                                    <option value="4">Laminados Titanio</option>
                                                                                                                    <option value="5">Laminados Porcelana</option>
                                                                                                                    <option value="6">Laminados Zirconio</option>
                                                                                                                    <option value="7">Tornillo Titanio</option>
                                                                                                                    <option value="8">Tornillo Porcelana</option>
                                                                                                                    <option value="9">Tornillo Zirconio</option>
                                                                                                                    <option value="10">Cónicos Titanio</option>
                                                                                                                    <option value="11">Cónicos Porcelana</option>
                                                                                                                    <option value="12">Cónicos Zirconio</option>
                                                                                                                    <option value="13">Otro</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_forma_mat" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_forma_mat" id="det_prot_forma_mat"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Marca Inplante</label>
                                                                                                                <select name="prot_marc_implante"  id="prot_marc_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);">
                                                                                                                    <option selected  value="1">MARCA 1</option>
                                                                                                                    <option value="2">MARCA 2</option>
                                                                                                                    <option value="3">OTRO</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_prot_marc_implante" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Otra Marca</label>
                                                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Implantes</label>
                                                                                                                <select name="prot_proc" id="prot_proc"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_proc','div_prot_proc','det_prot_proc',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Implante único</option>
                                                                                                                    <option value="2">Implante Múltiple</option>
                                                                                                                    <option value="3">Otro</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_proc" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_proc" id="det_prot_proc"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Corona/Prot provisoria</label>
                                                                                                                <select name="prot_prot_corona" id="prot_prot_corona"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_prot_corona','div_prot_prot_corona','det_prot_prot_corona',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Si</option>
                                                                                                                    <option value="2">No</option>
                                                                                                                    <option value="3">Otro (describa)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_prot_corona" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_prot_corona" id="det_prot_prot_corona"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Piezas N°</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_pieza_imp"id="prot_pieza_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Detalle Cirugía</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 text-center">
                                                                                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                                                                                                PDF</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="ind_period" role="tabpanel" aria-labelledby="ind_period_tab">

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Indicaciones Generales Periodóncia </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Indicaciones Especiales para el paciente Periodóncia </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="cit_control_period" role="tabpanel" aria-labelledby="cit_control_period_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Fecha de Próximo Control</label>
                                                                                                                                        <input class="form-control form-control-sm" type="date" name="f_control_impl"id="f_control_impl">
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                                <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Ir a Agendar</button>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--CRONICOS / GES / CONFIDENCIAL -->
                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                            <!--Diagnóstico-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a " id="diagnostico">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                            Diagnóstico
                                        </button>
                                    </div>
                                    <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                        <div class="card-body-aten-a  shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Indicaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="ind_oft" id="ind_oft">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                    <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                                                    <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                                            @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odonto_adulto" role="tabpanel" aria-labelledby="odonto_adulto-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <h5 class="text-c-blue mt-1 mb-1 f-16">Odontograma</h5>
                                                <hr>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="dt-responsive table-responsive table-borderless">
                                                    <table id="odontograma_adulto" class="display table dt-responsive nowrap"
                                                        style="width:100%">
                                                        <!-- ADULTO SUPERIOR -->
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t18">
                                                                        <img src="{{ asset('images/dental/dientes/d18.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma(1-8);">
                                                                    </div>
                                                                    <label data-ndiente="18" class="nav-label-dent">1.8</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto px-0 py-0" id="t17">
                                                                        <img src="{{ asset('images/dental/dientes/d17.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma(1-7);">
                                                                    </div>
                                                                    <label data-ndiente="17" class="nav-label-dent">1.7</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t16">
                                                                        <img src="{{ asset('images/dental/dientes/d16.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma(1-5);">
                                                                    </div>
                                                                    <label data-ndiente="16" class="nav-label-dent">1.6</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t15">
                                                                        <img src="{{ asset('images/dental/dientes/d15.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="15" class="nav-label-dent">1.5</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t14">
                                                                        <img src="{{ asset('images/dental/dientes/d14.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="14" class="nav-label-dent">1.4</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t13">
                                                                        <img src="{{ asset('images/dental/dientes/d13.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="13" class="nav-label-dent">1.3</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t12">
                                                                        <img src="{{ asset('images/dental/dientes/d12.png') }}"
                                                                            class="wid-40 img-fluid" role="button"
                                                                            onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="12" class="nav-label-dent">1.2</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t11">
                                                                        <img src="{{ asset('images/dental/dientes/d11.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="11" class="nav-label-dent">1.1</label>
                                                                </td>
                                                                <!--nnnn-->
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t21">
                                                                        <img src="{{ asset('images/dental/dientes/d21.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="21" class="nav-label-dent">2.1</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto px-1 py-1" id="t22">
                                                                        <img src="{{ asset('images/dental/dientes/d22.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="22" class="nav-label-dent">2.2</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t23">
                                                                        <img src="{{ asset('images/dental/dientes/d23.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="23" class="nav-label-dent">2.3</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t24">
                                                                        <img src="{{ asset('images/dental/dientes/d24.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="24" class="nav-label-dent">2.4</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t25">
                                                                        <img src="{{ asset('images/dental/dientes/d25.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="25" class="nav-label-dent">2.5</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t26">
                                                                        <img src="{{ asset('images/dental/dientes/d26.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="26" class="nav-label-dent">2.6</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t27">
                                                                        <img src="{{ asset('images/dental/dientes/d27.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="27" class="nav-label-dent">2.7</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t28">
                                                                        <img src="{{ asset('images/dental/dientes/d28.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="28" class="nav-label-dent">2.8</label>
                                                                </td>
                                                            </tr>
                                                            <!-- ADULTO INFERIOR -->
                                                            <tr>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="#" id="t48">
                                                                        <img src="{{ asset('images/dental/dientes/d48.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndente="48" class="nav-label-dent">4.8</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="#" id="t47">
                                                                        <img src="{{ asset('images/dental/dientes/d47.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="47" class="nav-label-dent">4.7</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t46">
                                                                        <img src="{{ asset('images/dental/dientes/d46.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="46" class="nav-label-dent">4.6</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t45">
                                                                        <img src="{{ asset('images/dental/dientes/d45.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="45" class="nav-label-dent">4.5</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t44">
                                                                        <img src="{{ asset('images/dental/dientes/d44.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="44" class="nav-label-dent">4.4</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t43">
                                                                        <img src="{{ asset('images/dental/dientes/d43.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="43" class="nav-label-dent">4.3</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t42">
                                                                        <img src="{{ asset('images/dental/dientes/d42.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="42" class="nav-label-dent">4.2</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t41">
                                                                        <img src="{{ asset('images/dental/dientes/d41.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="41" class="nav-label-dent">4.1</label>
                                                                </td>
                                                                <!--nnnn-->
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t31">
                                                                        <img src="{{ asset('images/dental/dientes/d31.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="31" class="nav-label-dent">3.1</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t32">
                                                                        <img src="{{ asset('images/dental/dientes/d32.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="32" class="nav-label-dent">3.2</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t33">
                                                                        <img src="{{ asset('images/dental/dientes/d33.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="33" class="nav-label-dent">3.3</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="diente_adulto" id="t34">
                                                                        <img src="{{ asset('images/dental/dientes/d34.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="34" class="nav-label-dent">3.4</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t35">
                                                                        <img src="{{ asset('images/dental/dientes/d35.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="35" class="nav-label-dent">3.5</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t36">
                                                                        <img src="{{ asset('images/dental/dientes/d36.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="36" class="nav-label-dent">3.6</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t37">
                                                                        <img src="{{ asset('images/dental/dientes/d37.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="37" class="nav-label-dent">3.7</label>
                                                                </td>
                                                                <td class="text-center px-0 py-0">
                                                                    <div class="relative diente_adulto" id="t38">
                                                                        <img src="{{ asset('images/dental/dientes/d38.png') }}"
                                                                            class="wid-40" role="button" onclick="info_odontograma();">
                                                                    </div>
                                                                    <label data-ndiente="38" class="nav-label-dent">3.8</label>
                                                                </td>
                                                            </tr>
                                                        <tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ODONTOGRAMA--->
                        <!-- PERIIMPLANTE -->
                        <div class="tab-pane fade" id="eval_periimpl" role="tabpanel" aria-labelledby="eval_periimpl_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill" id="gral_od_adulto" role="tablist">

                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="eval_18_tab" data-toggle="tab" href="#eval_18" role="tab" aria-controls="eval_18" aria-selected="true">1.8</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_17_tab" data-toggle="tab" href="#eval_17" role="tab" aria-controls="eval_17" aria-selected="false">1.7</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_16_tab" data-toggle="tab" href="#eval_16" role="tab" aria-controls="eval_16" aria-selected="false">1.6</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_15_tab" data-toggle="tab" href="#eval_15" role="tab" aria-controls="eval_15" aria-selected="false">1.5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_14_tab" data-toggle="tab" href="#eval_14" role="tab" aria-controls="eval_14" aria-selected="false">1.4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_13_tab" data-toggle="tab" href="#eval_13" role="tab" aria-controls="eval_13" aria-selected="false">1.3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_12_tab" data-toggle="tab" href="#eval_12" role="tab" aria-controls="eval_12" aria-selected="false">1.2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_11_tab" data-toggle="tab" href="#eval_11" role="tab" aria-controls="eval_11" aria-selected="false">1.1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_21_tab" data-toggle="tab" href="#eval_21" role="tab" aria-controls="eval_21" aria-selected="true">2.1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_22_tab" data-toggle="tab" href="#eval_22" role="tab" aria-controls="eval_22" aria-selected="false">2.2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_23_tab" data-toggle="tab" href="#eval_23" role="tab" aria-controls="eval_23" aria-selected="false">2.3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_24_tab" data-toggle="tab" href="#eval_24" role="tab" aria-controls="eval_24" aria-selected="false">2.4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_25_tab" data-toggle="tab" href="#eval_25" role="tab" aria-controls="eval_25" aria-selected="false">2.5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_26_tab" data-toggle="tab" href="#eval_26" role="tab" aria-controls="eval_26" aria-selected="false">2.6</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_27_tab" data-toggle="tab" href="#eval_27" role="tab" aria-controls="eval_27" aria-selected="false">2.7</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_28_tab" data-toggle="tab" href="#eval_28" role="tab" aria-controls="eval_28" aria-selected="false">2.8</a>
                                                                </li>



                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_48_tab" data-toggle="tab" href="#eval_48" role="tab" aria-controls="eval_48" aria-selected="true">4.8</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_47_tab" data-toggle="tab" href="#eval_47" role="tab" aria-controls="eval_47" aria-selected="false">4.7</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_46_tab" data-toggle="tab" href="#eval_46" role="tab" aria-controls="eval_46" aria-selected="false">4.6</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_45_tab" data-toggle="tab" href="#eval_45" role="tab" aria-controls="eval_45" aria-selected="false">4.5</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_44_tab" data-toggle="tab" href="#eval_44" role="tab" aria-controls="eval_44" aria-selected="false">4.4</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_43_tab" data-toggle="tab" href="#eval_43" role="tab" aria-controls="eval_43" aria-selected="false">4.3</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_42_tab" data-toggle="tab" href="#eval_42" role="tab" aria-controls="eval_42" aria-selected="false">4.2</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_41_tab" data-toggle="tab" href="#eval_41" role="tab" aria-controls="eval_41" aria-selected="false">4.1</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_31_tab" data-toggle="tab" href="#eval_31" role="tab" aria-controls="eval_31" aria-selected="true">3.1</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_32_tab" data-toggle="tab" href="#eval_32" role="tab" aria-controls="eval_32" aria-selected="false">3.2</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_33_tab" data-toggle="tab" href="#eval_33" role="tab" aria-controls="eval_33" aria-selected="false">3.3</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_34_tab" data-toggle="tab" href="#eval_34" role="tab" aria-controls="eval_34" aria-selected="false">3.4</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_35_tab" data-toggle="tab" href="#eval_35" role="tab" aria-controls="eval_35" aria-selected="false">3.5</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_36_tab" data-toggle="tab" href="#eval_36" role="tab" aria-controls="eval_36" aria-selected="false">3.6</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_37_tab" data-toggle="tab" href="#eval_37" role="tab" aria-controls="eval_37" aria-selected="false">3.7</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_38_tab" data-toggle="tab" href="#eval_38" role="tab" aria-controls="eval_38" aria-selected="false">3.8</a>
                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                   <!-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_48_tab" data-toggle="tab" href="#eval_48" role="tab" aria-controls="eval_48" aria-selected="true">4.8</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_47_tab" data-toggle="tab" href="#eval_47" role="tab" aria-controls="eval_47" aria-selected="false">4.7</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_46_tab" data-toggle="tab" href="#eval_46" role="tab" aria-controls="eval_46" aria-selected="false">4.6</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_45_tab" data-toggle="tab" href="#eval_45" role="tab" aria-controls="eval_45" aria-selected="false">4.5</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_44_tab" data-toggle="tab" href="#eval_44" role="tab" aria-controls="eval_44" aria-selected="false">4.4</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_43_tab" data-toggle="tab" href="#eval_43" role="tab" aria-controls="eval_43" aria-selected="false">4.3</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_42_tab" data-toggle="tab" href="#eval_42" role="tab" aria-controls="eval_42" aria-selected="false">4.2</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_41_tab" data-toggle="tab" href="#eval_41" role="tab" aria-controls="eval_41" aria-selected="false">4.1</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_31_tab" data-toggle="tab" href="#eval_31" role="tab" aria-controls="eval_31" aria-selected="true">3.1</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_32_tab" data-toggle="tab" href="#eval_32" role="tab" aria-controls="eval_32" aria-selected="false">3.2</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_33_tab" data-toggle="tab" href="#eval_33" role="tab" aria-controls="eval_33" aria-selected="false">3.3</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_34_tab" data-toggle="tab" href="#eval_34" role="tab" aria-controls="eval_34" aria-selected="false">3.4</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_35_tab" data-toggle="tab" href="#eval_35" role="tab" aria-controls="eval_35" aria-selected="false">3.5</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_36_tab" data-toggle="tab" href="#eval_36" role="tab" aria-controls="eval_36" aria-selected="false">3.6</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_37_tab" data-toggle="tab" href="#eval_37" role="tab" aria-controls="eval_37" aria-selected="false">3.7</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_38_tab" data-toggle="tab" href="#eval_38" role="tab" aria-controls="eval_38" aria-selected="false">3.8</a>
                                                            </li>
                                                        </ul>
                                                    </div>-->
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--IMPLANTES ADULTO-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="tab-content" id="periimplante_adulto">
                                            <!--ARCADA SUPERIOR-->
                                            <div class="tab-pane fade active show " id="eval_18" role="tabpanel" aria-labelledby="eval_18_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="eval_17" role="tabpanel" aria-labelledby="eval_17_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="eval_16" role="tabpanel" aria-labelledby="eval_16_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_15" role="tabpanel" aria-labelledby="eval_15_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_14" role="tabpanel" aria-labelledby="eval_14_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_13" role="tabpanel" aria-labelledby="eval_13_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_12" role="tabpanel" aria-labelledby="eval_12_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_11" role="tabpanel" aria-labelledby="eval_11_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_21" role="tabpanel" aria-labelledby="eval_21_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_22" role="tabpanel" aria-labelledby="eval_22_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_23" role="tabpanel" aria-labelledby="eval_23_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_24" role="tabpanel" aria-labelledby="eval_24_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_25" role="tabpanel" aria-labelledby="eval_25_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_26" role="tabpanel" aria-labelledby="eval_26_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_27" role="tabpanel" aria-labelledby="eval_27_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_28" role="tabpanel" aria-labelledby="eval_28_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--ARCADA INFERIOR-->
                                            <div class="tab-pane fade  show " id="eval_48" role="tabpanel" aria-labelledby="eval_48_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_47" role="tabpanel" aria-labelledby="eval_47_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_46" role="tabpanel" aria-labelledby="eval_46_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_45" role="tabpanel" aria-labelledby="eval_45_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_44" role="tabpanel" aria-labelledby="eval_44_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_43" role="tabpanel" aria-labelledby="eval_43_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_42" role="tabpanel" aria-labelledby="eval_42_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_41" role="tabpanel" aria-labelledby="eval_41_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_31" role="tabpanel" aria-labelledby="eval_31_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_32" role="tabpanel" aria-labelledby="eval_32_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_33" role="tabpanel" aria-labelledby="eval_33_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade  show " id="eval_34" role="tabpanel" aria-labelledby="eval_34_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_35" role="tabpanel" aria-labelledby="eval_35_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_36" role="tabpanel" aria-labelledby="eval_36_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_37" role="tabpanel" aria-labelledby="eval_37_tab">
                                               <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_38" role="tabpanel" aria-labelledby="eval_38_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- CIERRE PERIIMPLANTE -->
                        <!-- EVALUACIÓN-->
                        <div class="tab-pane fade" id="evaluacion_general" role="tabpanel" aria-labelledby="evaluacion_general_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_adults_tab" data-toggle="tab" href="#eval_adults" role="tab" aria-controls="eval_adults" aria-selected="true">Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Evaluación  Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!--ADULTO-->
                                                            <div class="tab-pane fade active show " id="eval_adults" role="tabpanel" aria-labelledby="eval_adults_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_adulto')
                                                            </div>
                                                            <!--NIÑOS-->
                                                            <div class="tab-pane fade" id="eval_infts" role="tabpanel" aria-labelledby="eval_infts_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_infantil')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: EVALUACION--->
                        <!-- TRATAMIENTO-->
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento_tab">
                           @include('atencion_odontologica.generales.tratamiento_presup')
                        </div>
                        <!--CIERRE: TRATAMIENTO--->
                        <!-- PRESUPUESTO -->
                        <div class="tab-pane fade" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto_tab">
                            @include('atencion_odontologica.generales.presupuesto')
                        </div>
                        <!--CIERRE: PRESUPUESTO--->
                    </div>
                    <div class="row">
                        <!--GUARDAR O IMPRIMIR FICHA-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                                    <input type="button" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                    <input type="button" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su agenda">
                                </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('atencion_odontologica.modals.odontograma.tratamiento_boca_completa')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_inferior')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_superior')
@include('atencion_odontologica.modals.odontograma.tratamiento_laboratorio')
@include('atencion_odontologica.modals.odontograma.modal_odontograma')

@include('atencion_odontologica.modals.infantil.tratamiento_boca_completainf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_inferiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_superiorinf')

<script>

    $(document).ready(function(){
        $('.tratamiento-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getDiagnosticoDental') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
                    return false;
                }
            });
        });
    });

    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }
    /** SECCION PERIODONTOGRAMA GENERAL */

        function getSangrado(){
            $("#suma").text(Math.round((totalSangrado/(totalDientes*6)*100)));

        }

        function getPlaca(){
            $("#suma2").text(Math.round((totalPlaca/(totalDientes*6)*100)));
        }

        function getSupuracion(){
            $("#suma3").text(Math.round((totalSupuracion/(totalDientes*6)*100)));

        }

        function getDefectos(){

            var datops18a=document.getElementById('ps18-a').value;
            var datops18b=document.getElementById('ps18-b').value;
            var datops18c=document.getElementById('ps18-c').value;

            var datops17a=document.getElementById('ps17-a').value;
            var datops17b=document.getElementById('ps17-b').value;
            var datops17c=document.getElementById('ps17-c').value;

            var datops16a=document.getElementById('ps16-a').value;
            var datops16b=document.getElementById('ps16-b').value;
            var datops16c=document.getElementById('ps16-c').value;

            var datops15a=document.getElementById('ps15-a').value;
            var datops15b=document.getElementById('ps15-b').value;
            var datops15c=document.getElementById('ps15-c').value;

            var datops14a=document.getElementById('ps14-a').value;
            var datops14b=document.getElementById('ps14-b').value;
            var datops14c=document.getElementById('ps14-c').value;

            var datops13a=document.getElementById('ps13-a').value;
            var datops13b=document.getElementById('ps13-b').value;
            var datops13c=document.getElementById('ps13-c').value;

            var datops12a=document.getElementById('ps12-a').value;
            var datops12b=document.getElementById('ps12-b').value;
            var datops12c=document.getElementById('ps12-c').value;

            var datops11a=document.getElementById('ps11-a').value;
            var datops11b=document.getElementById('ps11-b').value;
            var datops11c=document.getElementById('ps11-c').value;

            var total18=parseInt(datops18a)+parseInt(datops18b)+parseInt(datops18c)+
                        parseInt(datops17a)+parseInt(datops17b)+parseInt(datops17c)+
                        parseInt(datops16a)+parseInt(datops16b)+parseInt(datops16c)+
                        parseInt(datops15a)+parseInt(datops15b)+parseInt(datops15c)+
                        parseInt(datops14a)+parseInt(datops14b)+parseInt(datops14c)+
                        parseInt(datops13a)+parseInt(datops13b)+parseInt(datops13c)+
                        parseInt(datops12a)+parseInt(datops12b)+parseInt(datops12c)+
                        parseInt(datops11a)+parseInt(datops11b)+parseInt(datops11c);

            var datops28a=document.getElementById('ps28-a').value;
            var datops28b=document.getElementById('ps28-b').value;
            var datops28c=document.getElementById('ps28-c').value;

            var datops27a=document.getElementById('ps27-a').value;
            var datops27b=document.getElementById('ps27-b').value;
            var datops27c=document.getElementById('ps27-c').value;

            var datops26a=document.getElementById('ps26-a').value;
            var datops26b=document.getElementById('ps26-b').value;
            var datops26c=document.getElementById('ps26-c').value;

            var datops25a=document.getElementById('ps25-a').value;
            var datops25b=document.getElementById('ps25-b').value;
            var datops25c=document.getElementById('ps25-c').value;

            var datops24a=document.getElementById('ps24-a').value;
            var datops24b=document.getElementById('ps24-b').value;
            var datops24c=document.getElementById('ps24-c').value;

            var datops23a=document.getElementById('ps23-a').value;
            var datops23b=document.getElementById('ps23-b').value;
            var datops23c=document.getElementById('ps23-c').value;

            var datops22a=document.getElementById('ps22-a').value;
            var datops22b=document.getElementById('ps22-b').value;
            var datops22c=document.getElementById('ps22-c').value;

            var datops21a=document.getElementById('ps21-a').value;
            var datops21b=document.getElementById('ps21-b').value;
            var datops21c=document.getElementById('ps21-c').value;

            var total28=parseInt(datops28a)+parseInt(datops28b)+parseInt(datops28c)+
                        parseInt(datops27a)+parseInt(datops27b)+parseInt(datops27c)+
                        parseInt(datops26a)+parseInt(datops26b)+parseInt(datops26c)+
                        parseInt(datops25a)+parseInt(datops25b)+parseInt(datops25c)+
                        parseInt(datops24a)+parseInt(datops24b)+parseInt(datops24c)+
                        parseInt(datops23a)+parseInt(datops23b)+parseInt(datops23c)+
                        parseInt(datops22a)+parseInt(datops22b)+parseInt(datops22c)+
                        parseInt(datops21a)+parseInt(datops21b)+parseInt(datops21c);


            var datops38a=document.getElementById('ps38-a').value;
            var datops38b=document.getElementById('ps38-b').value;
            var datops38c=document.getElementById('ps38-c').value;

            var datops37a=document.getElementById('ps37-a').value;
            var datops37b=document.getElementById('ps37-b').value;
            var datops37c=document.getElementById('ps37-c').value;

            var datops36a=document.getElementById('ps36-a').value;
            var datops36b=document.getElementById('ps36-b').value;
            var datops36c=document.getElementById('ps36-c').value;

            var datops35a=document.getElementById('ps35-a').value;
            var datops35b=document.getElementById('ps35-b').value;
            var datops35c=document.getElementById('ps35-c').value;

            var datops34a=document.getElementById('ps34-a').value;
            var datops34b=document.getElementById('ps34-b').value;
            var datops34c=document.getElementById('ps34-c').value;

            var datops33a=document.getElementById('ps33-a').value;
            var datops33b=document.getElementById('ps33-b').value;
            var datops33c=document.getElementById('ps33-c').value;

            var datops32a=document.getElementById('ps32-a').value;
            var datops32b=document.getElementById('ps32-b').value;
            var datops32c=document.getElementById('ps32-c').value;

            var datops31a=document.getElementById('ps31-a').value;
            var datops31b=document.getElementById('ps31-b').value;
            var datops31c=document.getElementById('ps31-c').value;

            var total38=parseInt(datops38a)+parseInt(datops38b)+parseInt(datops38c)+
                        parseInt(datops37a)+parseInt(datops37b)+parseInt(datops37c)+
                        parseInt(datops36a)+parseInt(datops36b)+parseInt(datops36c)+
                        parseInt(datops35a)+parseInt(datops35b)+parseInt(datops35c)+
                        parseInt(datops34a)+parseInt(datops34b)+parseInt(datops34c)+
                        parseInt(datops33a)+parseInt(datops33b)+parseInt(datops33c)+
                        parseInt(datops32a)+parseInt(datops32b)+parseInt(datops32c)+
                        parseInt(datops31a)+parseInt(datops31b)+parseInt(datops31c);

            var datops48a=document.getElementById('ps48-a').value;
            var datops48b=document.getElementById('ps48-b').value;
            var datops48c=document.getElementById('ps48-c').value;

            var datops47a=document.getElementById('ps47-a').value;
            var datops47b=document.getElementById('ps47-b').value;
            var datops47c=document.getElementById('ps47-c').value;

            var datops46a=document.getElementById('ps46-a').value;
            var datops46b=document.getElementById('ps46-b').value;
            var datops46c=document.getElementById('ps46-c').value;

            var datops45a=document.getElementById('ps45-a').value;
            var datops45b=document.getElementById('ps45-b').value;
            var datops45c=document.getElementById('ps45-c').value;

            var datops44a=document.getElementById('ps44-a').value;
            var datops44b=document.getElementById('ps44-b').value;
            var datops44c=document.getElementById('ps44-c').value;

            var datops43a=document.getElementById('ps43-a').value;
            var datops43b=document.getElementById('ps43-b').value;
            var datops43c=document.getElementById('ps43-c').value;

            var datops42a=document.getElementById('ps42-a').value;
            var datops42b=document.getElementById('ps42-b').value;
            var datops42c=document.getElementById('ps42-c').value;

            var datops41a=document.getElementById('ps41-a').value;
            var datops41b=document.getElementById('ps41-b').value;
            var datops41c=document.getElementById('ps41-c').value;

            var total48=parseInt(datops48a)+parseInt(datops48b)+parseInt(datops48c)+
                        parseInt(datops47a)+parseInt(datops47b)+parseInt(datops47c)+
                        parseInt(datops46a)+parseInt(datops46b)+parseInt(datops46c)+
                        parseInt(datops45a)+parseInt(datops45b)+parseInt(datops45c)+
                        parseInt(datops44a)+parseInt(datops44b)+parseInt(datops44c)+
                        parseInt(datops43a)+parseInt(datops43b)+parseInt(datops43c)+
                        parseInt(datops42a)+parseInt(datops42b)+parseInt(datops42c)+
                        parseInt(datops41a)+parseInt(datops41b)+parseInt(datops41c);

            var datops18ba=document.getElementById('ps18b-a').value;
            var datops18bb=document.getElementById('ps18b-b').value;
            var datops18bc=document.getElementById('ps18b-c').value;

            var datops17ba=document.getElementById('ps17b-a').value;
            var datops17bb=document.getElementById('ps17b-b').value;
            var datops17bc=document.getElementById('ps17b-c').value;

            var datops16ba=document.getElementById('ps16b-a').value;
            var datops16bb=document.getElementById('ps16b-b').value;
            var datops16bc=document.getElementById('ps16b-c').value;

            var datops15ba=document.getElementById('ps15b-a').value;
            var datops15bb=document.getElementById('ps15b-b').value;
            var datops15bc=document.getElementById('ps15b-c').value;

            var datops14ba=document.getElementById('ps14b-a').value;
            var datops14bb=document.getElementById('ps14b-b').value;
            var datops14bc=document.getElementById('ps14b-c').value;

            var datops13ba=document.getElementById('ps13b-a').value;
            var datops13bb=document.getElementById('ps13b-b').value;
            var datops13bc=document.getElementById('ps13b-c').value;

            var datops12ba=document.getElementById('ps12b-a').value;
            var datops12bb=document.getElementById('ps12b-b').value;
            var datops12bc=document.getElementById('ps12b-c').value;

            var datops11ba=document.getElementById('ps11b-a').value;
            var datops11bb=document.getElementById('ps11b-b').value;
            var datops11bc=document.getElementById('ps11b-c').value;

            var total18b=parseInt(datops18ba)+parseInt(datops18bb)+parseInt(datops18bc)+
                        parseInt(datops17ba)+parseInt(datops17bb)+parseInt(datops17bc)+
                        parseInt(datops16ba)+parseInt(datops16bb)+parseInt(datops16bc)+
                        parseInt(datops15ba)+parseInt(datops15bb)+parseInt(datops15bc)+
                        parseInt(datops14ba)+parseInt(datops14bb)+parseInt(datops14bc)+
                        parseInt(datops13ba)+parseInt(datops13bb)+parseInt(datops13bc)+
                        parseInt(datops12ba)+parseInt(datops12bb)+parseInt(datops12bc)+
                        parseInt(datops11ba)+parseInt(datops11bb)+parseInt(datops11bc);


            var datops28ba=document.getElementById('ps28b-a').value;
            var datops28bb=document.getElementById('ps28b-b').value;
            var datops28bc=document.getElementById('ps28b-c').value;

            var datops27ba=document.getElementById('ps27b-a').value;
            var datops27bb=document.getElementById('ps27b-b').value;
            var datops27bc=document.getElementById('ps27b-c').value;

            var datops26ba=document.getElementById('ps26b-a').value;
            var datops26bb=document.getElementById('ps26b-b').value;
            var datops26bc=document.getElementById('ps26b-c').value;

            var datops25ba=document.getElementById('ps25b-a').value;
            var datops25bb=document.getElementById('ps25b-b').value;
            var datops25bc=document.getElementById('ps25b-c').value;

            var datops24ba=document.getElementById('ps24b-a').value;
            var datops24bb=document.getElementById('ps24b-b').value;
            var datops24bc=document.getElementById('ps24b-c').value;

            var datops23ba=document.getElementById('ps23b-a').value;
            var datops23bb=document.getElementById('ps23b-b').value;
            var datops23bc=document.getElementById('ps23b-c').value;

            var datops22ba=document.getElementById('ps22b-a').value;
            var datops22bb=document.getElementById('ps22b-b').value;
            var datops22bc=document.getElementById('ps22b-c').value;

            var datops21ba=document.getElementById('ps21b-a').value;
            var datops21bb=document.getElementById('ps21b-b').value;
            var datops21bc=document.getElementById('ps21b-c').value;

            var total28b=parseInt(datops28ba)+parseInt(datops28bb)+parseInt(datops28bc)+
                        parseInt(datops27ba)+parseInt(datops27bb)+parseInt(datops27bc)+
                        parseInt(datops26ba)+parseInt(datops26bb)+parseInt(datops26bc)+
                        parseInt(datops25ba)+parseInt(datops25bb)+parseInt(datops25bc)+
                        parseInt(datops24ba)+parseInt(datops24bb)+parseInt(datops24bc)+
                        parseInt(datops23ba)+parseInt(datops23bb)+parseInt(datops23bc)+
                        parseInt(datops22ba)+parseInt(datops22bb)+parseInt(datops22bc)+
                        parseInt(datops21ba)+parseInt(datops21bb)+parseInt(datops21bc);

            var datops38ba=document.getElementById('ps38b-a').value;
            var datops38bb=document.getElementById('ps38b-b').value;
            var datops38bc=document.getElementById('ps38b-c').value;

            var datops37ba=document.getElementById('ps37b-a').value;
            var datops37bb=document.getElementById('ps37b-b').value;
            var datops37bc=document.getElementById('ps37b-c').value;

            var datops36ba=document.getElementById('ps36b-a').value;
            var datops36bb=document.getElementById('ps36b-b').value;
            var datops36bc=document.getElementById('ps36b-c').value;

            var datops35ba=document.getElementById('ps35b-a').value;
            var datops35bb=document.getElementById('ps35b-b').value;
            var datops35bc=document.getElementById('ps35b-c').value;

            var datops34ba=document.getElementById('ps34b-a').value;
            var datops34bb=document.getElementById('ps34b-b').value;
            var datops34bc=document.getElementById('ps34b-c').value;

            var datops33ba=document.getElementById('ps33b-a').value;
            var datops33bb=document.getElementById('ps33b-b').value;
            var datops33bc=document.getElementById('ps33b-c').value;

            var datops32ba=document.getElementById('ps32b-a').value;
            var datops32bb=document.getElementById('ps32b-b').value;
            var datops32bc=document.getElementById('ps32b-c').value;

            var datops31ba=document.getElementById('ps31b-a').value;
            var datops31bb=document.getElementById('ps31b-b').value;
            var datops31bc=document.getElementById('ps31b-c').value;

            var total38b=parseInt(datops38ba)+parseInt(datops38bb)+parseInt(datops38bc)+
                        parseInt(datops37ba)+parseInt(datops37bb)+parseInt(datops37bc)+
                        parseInt(datops36ba)+parseInt(datops36bb)+parseInt(datops36bc)+
                        parseInt(datops35ba)+parseInt(datops35bb)+parseInt(datops35bc)+
                        parseInt(datops34ba)+parseInt(datops34bb)+parseInt(datops34bc)+
                        parseInt(datops33ba)+parseInt(datops33bb)+parseInt(datops33bc)+
                        parseInt(datops32ba)+parseInt(datops32bb)+parseInt(datops32bc)+
                        parseInt(datops31ba)+parseInt(datops31bb)+parseInt(datops31bc);

            var datops48ba=document.getElementById('ps48b-a').value;
            var datops48bb=document.getElementById('ps48b-b').value;
            var datops48bc=document.getElementById('ps48b-c').value;

            var datops47ba=document.getElementById('ps47b-a').value;
            var datops47bb=document.getElementById('ps47b-b').value;
            var datops47bc=document.getElementById('ps47b-c').value;

            var datops46ba=document.getElementById('ps46b-a').value;
            var datops46bb=document.getElementById('ps46b-b').value;
            var datops46bc=document.getElementById('ps46b-c').value;

            var datops45ba=document.getElementById('ps45b-a').value;
            var datops45bb=document.getElementById('ps45b-b').value;
            var datops45bc=document.getElementById('ps45b-c').value;

            var datops44ba=document.getElementById('ps44b-a').value;
            var datops44bb=document.getElementById('ps44b-b').value;
            var datops44bc=document.getElementById('ps44b-c').value;

            var datops43ba=document.getElementById('ps43b-a').value;
            var datops43bb=document.getElementById('ps43b-b').value;
            var datops43bc=document.getElementById('ps43b-c').value;

            var datops42ba=document.getElementById('ps42b-a').value;
            var datops42bb=document.getElementById('ps42b-b').value;
            var datops42bc=document.getElementById('ps42b-c').value;

            var datops41ba=document.getElementById('ps41b-a').value;
            var datops41bb=document.getElementById('ps41b-b').value;
            var datops41bc=document.getElementById('ps41b-c').value;

            var total48b=parseInt(datops48ba)+parseInt(datops48bb)+parseInt(datops48bc)+
                        parseInt(datops47ba)+parseInt(datops47bb)+parseInt(datops47bc)+
                        parseInt(datops46ba)+parseInt(datops46bb)+parseInt(datops46bc)+
                        parseInt(datops45ba)+parseInt(datops45bb)+parseInt(datops45bc)+
                        parseInt(datops44ba)+parseInt(datops44bb)+parseInt(datops44bc)+
                        parseInt(datops43ba)+parseInt(datops43bb)+parseInt(datops43bc)+
                        parseInt(datops42ba)+parseInt(datops42bb)+parseInt(datops42bc)+
                        parseInt(datops41ba)+parseInt(datops41bb)+parseInt(datops41bc);

            var totalps=total18+total28+total38+total48+total18b+total28b+total38b+total48b;
            var mediaps=totalps/(totalDientes*3);
            var redondeado = Math.round(mediaps*Math.pow(10,2))/Math.pow(10,2);

            $("#suma4").text(redondeado);


            var datomg18a=document.getElementById('mg18-a').value;
            var datomg18b=document.getElementById('mg18-b').value;
            var datomg18c=document.getElementById('mg18-c').value;

            var datomg17a=document.getElementById('mg17-a').value;
            var datomg17b=document.getElementById('mg17-b').value;
            var datomg17c=document.getElementById('mg17-c').value;

            var datomg16a=document.getElementById('mg16-a').value;
            var datomg16b=document.getElementById('mg16-b').value;
            var datomg16c=document.getElementById('mg16-c').value;

            var datomg15a=document.getElementById('mg15-a').value;
            var datomg15b=document.getElementById('mg15-b').value;
            var datomg15c=document.getElementById('mg15-c').value;

            var datomg14a=document.getElementById('mg14-a').value;
            var datomg14b=document.getElementById('mg14-b').value;
            var datomg14c=document.getElementById('mg14-c').value;

            var datomg13a=document.getElementById('mg13-a').value;
            var datomg13b=document.getElementById('mg13-b').value;
            var datomg13c=document.getElementById('mg13-c').value;

            var datomg12a=document.getElementById('mg12-a').value;
            var datomg12b=document.getElementById('mg12-b').value;
            var datomg12c=document.getElementById('mg12-c').value;

            var datomg11a=document.getElementById('mg11-a').value;
            var datomg11b=document.getElementById('mg11-b').value;
            var datomg11c=document.getElementById('mg11-c').value;

            var total18m=parseInt(datomg18a)+parseInt(datomg18b)+parseInt(datomg18c)+
                        parseInt(datomg17a)+parseInt(datomg17b)+parseInt(datomg17c)+
                        parseInt(datomg16a)+parseInt(datomg16b)+parseInt(datomg16c)+
                        parseInt(datomg15a)+parseInt(datomg15b)+parseInt(datomg15c)+
                        parseInt(datomg14a)+parseInt(datomg14b)+parseInt(datomg14c)+
                        parseInt(datomg13a)+parseInt(datomg13b)+parseInt(datomg13c)+
                        parseInt(datomg12a)+parseInt(datomg12b)+parseInt(datomg12c)+
                        parseInt(datomg11a)+parseInt(datomg11b)+parseInt(datomg11c);

            var datomg28a=document.getElementById('mg28-a').value;
            var datomg28b=document.getElementById('mg28-b').value;
            var datomg28c=document.getElementById('mg28-c').value;

            var datomg27a=document.getElementById('mg27-a').value;
            var datomg27b=document.getElementById('mg27-b').value;
            var datomg27c=document.getElementById('mg27-c').value;

            var datomg26a=document.getElementById('mg26-a').value;
            var datomg26b=document.getElementById('mg26-b').value;
            var datomg26c=document.getElementById('mg26-c').value;

            var datomg25a=document.getElementById('mg25-a').value;
            var datomg25b=document.getElementById('mg25-b').value;
            var datomg25c=document.getElementById('mg25-c').value;

            var datomg24a=document.getElementById('mg24-a').value;
            var datomg24b=document.getElementById('mg24-b').value;
            var datomg24c=document.getElementById('mg24-c').value;

            var datomg23a=document.getElementById('mg23-a').value;
            var datomg23b=document.getElementById('mg23-b').value;
            var datomg23c=document.getElementById('mg23-c').value;

            var datomg22a=document.getElementById('mg22-a').value;
            var datomg22b=document.getElementById('mg22-b').value;
            var datomg22c=document.getElementById('mg22-c').value;

            var datomg21a=document.getElementById('mg21-a').value;
            var datomg21b=document.getElementById('mg21-b').value;
            var datomg21c=document.getElementById('mg21-c').value;

            var total28m=parseInt(datomg28a)+parseInt(datomg28b)+parseInt(datomg28c)+
                        parseInt(datomg27a)+parseInt(datomg27b)+parseInt(datomg27c)+
                        parseInt(datomg26a)+parseInt(datomg26b)+parseInt(datomg26c)+
                        parseInt(datomg25a)+parseInt(datomg25b)+parseInt(datomg25c)+
                        parseInt(datomg24a)+parseInt(datomg24b)+parseInt(datomg24c)+
                        parseInt(datomg23a)+parseInt(datomg23b)+parseInt(datomg23c)+
                        parseInt(datomg22a)+parseInt(datomg22b)+parseInt(datomg22c)+
                        parseInt(datomg21a)+parseInt(datomg21b)+parseInt(datomg21c);


            var datomg38a=document.getElementById('mg38-a').value;
            var datomg38b=document.getElementById('mg38-b').value;
            var datomg38c=document.getElementById('mg38-c').value;

            var datomg37a=document.getElementById('mg37-a').value;
            var datomg37b=document.getElementById('mg37-b').value;
            var datomg37c=document.getElementById('mg37-c').value;

            var datomg36a=document.getElementById('mg36-a').value;
            var datomg36b=document.getElementById('mg36-b').value;
            var datomg36c=document.getElementById('mg36-c').value;

            var datomg35a=document.getElementById('mg35-a').value;
            var datomg35b=document.getElementById('mg35-b').value;
            var datomg35c=document.getElementById('mg35-c').value;

            var datomg34a=document.getElementById('mg34-a').value;
            var datomg34b=document.getElementById('mg34-b').value;
            var datomg34c=document.getElementById('mg34-c').value;

            var datomg33a=document.getElementById('mg33-a').value;
            var datomg33b=document.getElementById('mg33-b').value;
            var datomg33c=document.getElementById('mg33-c').value;

            var datomg32a=document.getElementById('mg32-a').value;
            var datomg32b=document.getElementById('mg32-b').value;
            var datomg32c=document.getElementById('mg32-c').value;

            var datomg31a=document.getElementById('mg31-a').value;
            var datomg31b=document.getElementById('mg31-b').value;
            var datomg31c=document.getElementById('mg31-c').value;

            var total38m=parseInt(datomg38a)+parseInt(datomg38b)+parseInt(datomg38c)+
                        parseInt(datomg37a)+parseInt(datomg37b)+parseInt(datomg37c)+
                        parseInt(datomg36a)+parseInt(datomg36b)+parseInt(datomg36c)+
                        parseInt(datomg35a)+parseInt(datomg35b)+parseInt(datomg35c)+
                        parseInt(datomg34a)+parseInt(datomg34b)+parseInt(datomg34c)+
                        parseInt(datomg33a)+parseInt(datomg33b)+parseInt(datomg33c)+
                        parseInt(datomg32a)+parseInt(datomg32b)+parseInt(datomg32c)+
                        parseInt(datomg31a)+parseInt(datomg31b)+parseInt(datomg31c);

            var datomg48a=document.getElementById('mg48-a').value;
            var datomg48b=document.getElementById('mg48-b').value;
            var datomg48c=document.getElementById('mg48-c').value;

            var datomg47a=document.getElementById('mg47-a').value;
            var datomg47b=document.getElementById('mg47-b').value;
            var datomg47c=document.getElementById('mg47-c').value;

            var datomg46a=document.getElementById('mg46-a').value;
            var datomg46b=document.getElementById('mg46-b').value;
            var datomg46c=document.getElementById('mg46-c').value;

            var datomg45a=document.getElementById('mg45-a').value;
            var datomg45b=document.getElementById('mg45-b').value;
            var datomg45c=document.getElementById('mg45-c').value;

            var datomg44a=document.getElementById('mg44-a').value;
            var datomg44b=document.getElementById('mg44-b').value;
            var datomg44c=document.getElementById('mg44-c').value;

            var datomg43a=document.getElementById('mg43-a').value;
            var datomg43b=document.getElementById('mg43-b').value;
            var datomg43c=document.getElementById('mg43-c').value;

            var datomg42a=document.getElementById('mg42-a').value;
            var datomg42b=document.getElementById('mg42-b').value;
            var datomg42c=document.getElementById('mg42-c').value;

            var datomg41a=document.getElementById('mg41-a').value;
            var datomg41b=document.getElementById('mg41-b').value;
            var datomg41c=document.getElementById('mg41-c').value;

            var total48m=parseInt(datomg48a)+parseInt(datomg48b)+parseInt(datomg48c)+
                        parseInt(datomg47a)+parseInt(datomg47b)+parseInt(datomg47c)+
                        parseInt(datomg46a)+parseInt(datomg46b)+parseInt(datomg46c)+
                        parseInt(datomg45a)+parseInt(datomg45b)+parseInt(datomg45c)+
                        parseInt(datomg44a)+parseInt(datomg44b)+parseInt(datomg44c)+
                        parseInt(datomg43a)+parseInt(datomg43b)+parseInt(datomg43c)+
                        parseInt(datomg42a)+parseInt(datomg42b)+parseInt(datomg42c)+
                        parseInt(datomg41a)+parseInt(datomg41b)+parseInt(datomg41c);

            var datomg18ba=document.getElementById('mg18b-a').value;
            var datomg18bb=document.getElementById('mg18b-b').value;
            var datomg18bc=document.getElementById('mg18b-c').value;

            var datomg17ba=document.getElementById('mg17b-a').value;
            var datomg17bb=document.getElementById('mg17b-b').value;
            var datomg17bc=document.getElementById('mg17b-c').value;

            var datomg16ba=document.getElementById('mg16b-a').value;
            var datomg16bb=document.getElementById('mg16b-b').value;
            var datomg16bc=document.getElementById('mg16b-c').value;

            var datomg15ba=document.getElementById('mg15b-a').value;
            var datomg15bb=document.getElementById('mg15b-b').value;
            var datomg15bc=document.getElementById('mg15b-c').value;

            var datomg14ba=document.getElementById('mg14b-a').value;
            var datomg14bb=document.getElementById('mg14b-b').value;
            var datomg14bc=document.getElementById('mg14b-c').value;

            var datomg13ba=document.getElementById('mg13b-a').value;
            var datomg13bb=document.getElementById('mg13b-b').value;
            var datomg13bc=document.getElementById('mg13b-c').value;

            var datomg12ba=document.getElementById('mg12b-a').value;
            var datomg12bb=document.getElementById('mg12b-b').value;
            var datomg12bc=document.getElementById('mg12b-c').value;

            var datomg11ba=document.getElementById('mg11b-a').value;
            var datomg11bb=document.getElementById('mg11b-b').value;
            var datomg11bc=document.getElementById('mg11b-c').value;

            var total18bm=parseInt(datomg18ba)+parseInt(datomg18bb)+parseInt(datomg18bc)+
                        parseInt(datomg17ba)+parseInt(datomg17bb)+parseInt(datomg17bc)+
                        parseInt(datomg16ba)+parseInt(datomg16bb)+parseInt(datomg16bc)+
                        parseInt(datomg15ba)+parseInt(datomg15bb)+parseInt(datomg15bc)+
                        parseInt(datomg14ba)+parseInt(datomg14bb)+parseInt(datomg14bc)+
                        parseInt(datomg13ba)+parseInt(datomg13bb)+parseInt(datomg13bc)+
                        parseInt(datomg12ba)+parseInt(datomg12bb)+parseInt(datomg12bc)+
                        parseInt(datomg11ba)+parseInt(datomg11bb)+parseInt(datomg11bc);


            var datomg28ba=document.getElementById('mg28b-a').value;
            var datomg28bb=document.getElementById('mg28b-b').value;
            var datomg28bc=document.getElementById('mg28b-c').value;

            var datomg27ba=document.getElementById('mg27b-a').value;
            var datomg27bb=document.getElementById('mg27b-b').value;
            var datomg27bc=document.getElementById('mg27b-c').value;

            var datomg26ba=document.getElementById('mg26b-a').value;
            var datomg26bb=document.getElementById('mg26b-b').value;
            var datomg26bc=document.getElementById('mg26b-c').value;

            var datomg25ba=document.getElementById('mg25b-a').value;
            var datomg25bb=document.getElementById('mg25b-b').value;
            var datomg25bc=document.getElementById('mg25b-c').value;

            var datomg24ba=document.getElementById('mg24b-a').value;
            var datomg24bb=document.getElementById('mg24b-b').value;
            var datomg24bc=document.getElementById('mg24b-c').value;

            var datomg23ba=document.getElementById('mg23b-a').value;
            var datomg23bb=document.getElementById('mg23b-b').value;
            var datomg23bc=document.getElementById('mg23b-c').value;

            var datomg22ba=document.getElementById('mg22b-a').value;
            var datomg22bb=document.getElementById('mg22b-b').value;
            var datomg22bc=document.getElementById('mg22b-c').value;

            var datomg21ba=document.getElementById('mg21b-a').value;
            var datomg21bb=document.getElementById('mg21b-b').value;
            var datomg21bc=document.getElementById('mg21b-c').value;

            var total28bm=parseInt(datomg28ba)+parseInt(datomg28bb)+parseInt(datomg28bc)+
                        parseInt(datomg27ba)+parseInt(datomg27bb)+parseInt(datomg27bc)+
                        parseInt(datomg26ba)+parseInt(datomg26bb)+parseInt(datomg26bc)+
                        parseInt(datomg25ba)+parseInt(datomg25bb)+parseInt(datomg25bc)+
                        parseInt(datomg24ba)+parseInt(datomg24bb)+parseInt(datomg24bc)+
                        parseInt(datomg23ba)+parseInt(datomg23bb)+parseInt(datomg23bc)+
                        parseInt(datomg22ba)+parseInt(datomg22bb)+parseInt(datomg22bc)+
                        parseInt(datomg21ba)+parseInt(datomg21bb)+parseInt(datomg21bc);

            var datomg38ba=document.getElementById('mg38b-a').value;
            var datomg38bb=document.getElementById('mg38b-b').value;
            var datomg38bc=document.getElementById('mg38b-c').value;

            var datomg37ba=document.getElementById('mg37b-a').value;
            var datomg37bb=document.getElementById('mg37b-b').value;
            var datomg37bc=document.getElementById('mg37b-c').value;

            var datomg36ba=document.getElementById('mg36b-a').value;
            var datomg36bb=document.getElementById('mg36b-b').value;
            var datomg36bc=document.getElementById('mg36b-c').value;

            var datomg35ba=document.getElementById('mg35b-a').value;
            var datomg35bb=document.getElementById('mg35b-b').value;
            var datomg35bc=document.getElementById('mg35b-c').value;

            var datomg34ba=document.getElementById('mg34b-a').value;
            var datomg34bb=document.getElementById('mg34b-b').value;
            var datomg34bc=document.getElementById('mg34b-c').value;

            var datomg33ba=document.getElementById('mg33b-a').value;
            var datomg33bb=document.getElementById('mg33b-b').value;
            var datomg33bc=document.getElementById('mg33b-c').value;

            var datomg32ba=document.getElementById('mg32b-a').value;
            var datomg32bb=document.getElementById('mg32b-b').value;
            var datomg32bc=document.getElementById('mg32b-c').value;

            var datomg31ba=document.getElementById('mg31b-a').value;
            var datomg31bb=document.getElementById('mg31b-b').value;
            var datomg31bc=document.getElementById('mg31b-c').value;

            var total38bm=parseInt(datomg38ba)+parseInt(datomg38bb)+parseInt(datomg38bc)+
                        parseInt(datomg37ba)+parseInt(datomg37bb)+parseInt(datomg37bc)+
                        parseInt(datomg36ba)+parseInt(datomg36bb)+parseInt(datomg36bc)+
                        parseInt(datomg35ba)+parseInt(datomg35bb)+parseInt(datomg35bc)+
                        parseInt(datomg34ba)+parseInt(datomg34bb)+parseInt(datomg34bc)+
                        parseInt(datomg33ba)+parseInt(datomg33bb)+parseInt(datomg33bc)+
                        parseInt(datomg32ba)+parseInt(datomg32bb)+parseInt(datomg32bc)+
                        parseInt(datomg31ba)+parseInt(datomg31bb)+parseInt(datomg31bc);

            var datomg48ba=document.getElementById('mg48b-a').value;
            var datomg48bb=document.getElementById('mg48b-b').value;
            var datomg48bc=document.getElementById('mg48b-c').value;

            var datomg47ba=document.getElementById('mg47b-a').value;
            var datomg47bb=document.getElementById('mg47b-b').value;
            var datomg47bc=document.getElementById('mg47b-c').value;

            var datomg46ba=document.getElementById('mg46b-a').value;
            var datomg46bb=document.getElementById('mg46b-b').value;
            var datomg46bc=document.getElementById('mg46b-c').value;

            var datomg45ba=document.getElementById('mg45b-a').value;
            var datomg45bb=document.getElementById('mg45b-b').value;
            var datomg45bc=document.getElementById('mg45b-c').value;

            var datomg44ba=document.getElementById('mg44b-a').value;
            var datomg44bb=document.getElementById('mg44b-b').value;
            var datomg44bc=document.getElementById('mg44b-c').value;

            var datomg43ba=document.getElementById('mg43b-a').value;
            var datomg43bb=document.getElementById('mg43b-b').value;
            var datomg43bc=document.getElementById('mg43b-c').value;

            var datomg42ba=document.getElementById('mg42b-a').value;
            var datomg42bb=document.getElementById('mg42b-b').value;
            var datomg42bc=document.getElementById('mg42b-c').value;

            var datomg41ba=document.getElementById('mg41b-a').value;
            var datomg41bb=document.getElementById('mg41b-b').value;
            var datomg41bc=document.getElementById('mg41b-c').value;

            var total48bm=parseInt(datomg48ba)+parseInt(datomg48bb)+parseInt(datomg48bc)+
                        parseInt(datomg47ba)+parseInt(datomg47bb)+parseInt(datomg47bc)+
                        parseInt(datomg46ba)+parseInt(datomg46bb)+parseInt(datomg46bc)+
                        parseInt(datomg45ba)+parseInt(datomg45bb)+parseInt(datomg45bc)+
                        parseInt(datomg44ba)+parseInt(datomg44bb)+parseInt(datomg44bc)+
                        parseInt(datomg43ba)+parseInt(datomg43bb)+parseInt(datomg43bc)+
                        parseInt(datomg42ba)+parseInt(datomg42bb)+parseInt(datomg42bc)+
                        parseInt(datomg41ba)+parseInt(datomg41bb)+parseInt(datomg41bc);

            var totalmg=total18m+total28m+total38m+total48m+total18bm+total28bm+total38bm+total48bm;
            var mediapsmg=(totalps+totalmg)/(totalDientes*3);
            var redondeadopsmg = Math.round(mediapsmg*Math.pow(10,2))/Math.pow(10,2);

            $("#suma5").text(redondeadopsmg);
        }

        function mostrar_nueva_pieza_dental(counter){
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#nueva_pieza_dental_odontodolor').empty();
                    $('#nueva_pieza_dental_odontodolor').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

function mostrar_nueva_pieza_dental_tto(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_pieza_tto_implante').empty();
                    $('#contenedor_pieza_tto_implante').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
}

function mostrar_nueva_pieza_dental_end(counter){
let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_end') }}";
$.ajax({
    url: url,
    type: 'post',
    data: {
        counter: counter,
        _token: '{{ csrf_token() }}'
    },
    success: function(resp) {
        console.log(resp);
        $('#contenedor_nuevo_examen_end').empty();
        $('#contenedor_nuevo_examen_end').append(resp.v);
    },
    error: function(error) {
        console.log(error);
    }
});
}

function ocultarExamen(counter){
$('#nueva_pieza_dental_odontodolor').empty();
}

function ocultarExamenEnd(counter){
$('#contenedor_nuevo_examen_end').empty();
}

function guardar_pieza_dental_dolor(count){
let derivado_por = $('#ex_grl_deriv').val();
let zona_dolor = $('#ex_grl_zdolor').val();
let historia_anterior = $('#ex_grl_hp').val();

let pieza_numero = $('#numero_pieza'+count).val();
let tipo_dolor = $('#tipo_dolor'+count).val();
let intensidad = $('#intensidad'+count).val();
let modo_dolor = $('#modo_dolor'+count).val();
let loc_dolor = $('#loc_dolor'+count).val();
let provocacion_dolor = $('#provocacion_dolor'+count).val();
let cdo_duele = $('#cdo_duele'+count).val();
let tpo_evolucion = $('#tpo_evolucion'+count).val();
let obs_anal_dolor = $('#obs_anal_dolor'+count).val();

let valido = 1;
let mensaje = '';

if(derivado_por == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Derivado por </li>';
}
if(zona_dolor == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Zona dolor </li>';
}
if(historia_anterior == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Historia anterior </li>';
}
if(pieza_numero == ''){
    valido = 0;
    mensaje += '<li>Campo requerido N° Pieza </li>';
}
if(tipo_dolor == 0){
    valido = 0;
    mensaje += '<li>Campo requerido Tipo Dolor </li>';
}
if(intensidad == 0){
    valido = 0;
    mensaje += '<li>Campo requerido Intensidad </li>';
}
if(obs_anal_dolor == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
}

if(valido == 0){
    swal({
        title: "Campos requeridos",
        content:{
            element: "div",
            attributes:{
                innerHTML: mensaje,
            },
        },
        icon: "error",
        buttons: "Aceptar",
        DangerMode: true,
    });
    return false;
}

let data = {
    _token: CSRF_TOKEN,
    derivado_por: derivado_por,
    zona_dolor: zona_dolor,
    historia_anterior: historia_anterior,
    pieza_numero: pieza_numero,
    tipo_dolor: tipo_dolor,
    intensidad: intensidad,
    modo_dolor: modo_dolor,
    loc_dolor: loc_dolor,
    provocacion_dolor: provocacion_dolor,
    cdo_duele: cdo_duele,
    tpo_evolucion: tpo_evolucion,
    obs_anal_dolor: obs_anal_dolor,
    id_paciente: $('#id_paciente_fc').val(),
    id_lugar_atencion : $('#id_lugar_atencion').val(),
    id_ficha_atencion: $('#id_ficha_atencion').val(),
    id_profesional: $('#id_profesional_fc').val(),
    count: count
}

let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_dolor') }}";

$.ajax({
    url: url,
    type:'post',
    data: data,
    success: function(resp){
        console.log(resp);
        $('#contenedor_pieza_dental_odontodolor').empty();
        $('#contenedor_pieza_dental_odontodolor').append(resp.v);
        $('#nueva_pieza_dental_odontodolor').empty();
    },
    error: function(error){
        console.log(error);
    }
});
}

function mostrar_pieza_dental_examen(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen') }}";
    let data = {
        count: count,
        id_paciente: dame_id_paciente(),
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_nueva_pieza_dental').empty();
                $('#contenedor_nueva_pieza_dental').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function guardar_pieza_dental_end(count){
let derivado_por = $('#ex_end_derivado_por').val();
let zona_dolor = $('#ex_end_zona_dolor').val();
let historia_anterior = $('#ex_end_hist_ant').val();

let pieza_numero = $('#end_numero_pieza'+count).val();
let tipo_dolor = $('#end_tipo_dolor'+count).val();
let intensidad = $('#end_intensidad'+count).val();
let modo_dolor = $('#end_modo_dolor'+count).val();
let loc_dolor = $('#end_loc_dolor'+count).val();
let provocacion_dolor = $('#end_provocacion_dolor'+count).val();
let cdo_duele = $('#end_cdo_duele'+count).val();
let tpo_evolucion = $('#end_tpo_evolucion'+count).val();
let obs_anal_dolor = $('#end_obs_loc_dolor'+count).val();

let valido = 1;
let mensaje = '';

if(derivado_por == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Derivado por </li>';
}
if(zona_dolor == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Zona dolor </li>';
}
if(historia_anterior == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Historia anterior </li>';
}
if(pieza_numero == ''){
    valido = 0;
    mensaje += '<li>Campo requerido N° Pieza </li>';
}
if(tipo_dolor == 0){
    valido = 0;
    mensaje += '<li>Campo requerido Tipo Dolor </li>';
}
if(intensidad == 0){
    valido = 0;
    mensaje += '<li>Campo requerido Intensidad </li>';
}
if(obs_anal_dolor == ''){
    valido = 0;
    mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
}

if(valido == 0){
    swal({
        title: "Campos requeridos",
        content:{
            element: "div",
            attributes:{
                innerHTML: mensaje,
            },
        },
        icon: "error",
        buttons: "Aceptar",
        DangerMode: true,
    });
    return false;
}

let data = {
    _token: CSRF_TOKEN,
    derivado_por: derivado_por,
    zona_dolor: zona_dolor,
    historia_anterior: historia_anterior,
    pieza_numero: pieza_numero,
    tipo_dolor: tipo_dolor,
    intensidad: intensidad,
    modo_dolor: modo_dolor,
    loc_dolor: loc_dolor,
    provocacion_dolor: provocacion_dolor,
    cdo_duele: cdo_duele,
    tpo_evolucion: tpo_evolucion,
    obs_anal_dolor: obs_anal_dolor,
    id_paciente: $('#id_paciente_fc').val(),
    id_lugar_atencion : $('#id_lugar_atencion').val(),
    id_ficha_atencion: $('#id_ficha_atencion').val(),
    id_profesional: $('#id_profesional_fc').val(),
    count: count
}

let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_end_dolor') }}";

$.ajax({
    url: url,
    type:'post',
    data: data,
    success: function(resp){
        console.log(resp);
        $('#contenedor_examen_dolor_end').empty();
        $('#contenedor_examen_dolor_end').append(resp.v);
        $('#contenedor_nuevo_examen_end').empty();
    },
    error: function(error){
        console.log(error);
    }
});
}

function eliminarExamenAgregado(id) {
swal({
    title: 'Advertencia',
    text: '¿Está seguro de eliminar este examen?',
    icon: 'warning',
    buttons: ['Cancelar', 'Aceptar'],
    dangerMode: true
}).then((aceptar) => {
    if (aceptar) {
        confirmarEliminarExamenAgregado(id);
    }
})
}

function eliminarExamenEndAgregado(id, tipo_examen) {
swal({
    title: 'Advertencia',
    text: '¿Está seguro de eliminar este examen?',
    icon: 'warning',
    buttons: ['Cancelar', 'Aceptar'],
    dangerMode: true
}).then((aceptar) => {
    if (aceptar) {
        confirmarEliminarExamenEndAgregado(id, tipo_examen);
    }
})
}

function confirmarEliminarExamenAgregado(id){
let url = "{{ route('profesional.eliminar_nueva_pieza_dental') }}";
var idPaciente = $('#id_paciente_fc').val();
$.ajax({
    url: url,
    type: 'post',
    data: {
        id: id,
        id_paciente: idPaciente,
        _token: '{{ csrf_token() }}'
    },
    success: function(resp) {
        console.log(resp);
        let mensaje = resp.mensaje;
        let vista = resp.vista;
        if (mensaje == 'OK') {
            swal({
                title: 'Éxito',
                text: 'Evolución eliminada correctamente',
                icon: 'success',
                button: 'Aceptar'
            });
            $('#contenedor_pieza_dental_odontodolor').empty();
            $('#contenedor_pieza_dental_odontodolor').append(vista);
        } else {
            swal({
                title: 'Error',
                text: 'mensaje',
                icon: 'error',
                button: 'Aceptar'
            })
        }
    },
    error: function(error) {
        console.log(error);
    }
});
}

function confirmarEliminarExamenEndAgregado(id, tipo_examen){
let url = "{{ route('profesional.eliminar_nueva_pieza_dental_end') }}";
var idPaciente = $('#id_paciente_fc').val();
$.ajax({
    url: url,
    type: 'post',
    data: {
        id: id,
        id_paciente: idPaciente,
        tipo_examen: tipo_examen,
        _token: '{{ csrf_token() }}'
    },
    success: function(resp) {
        console.log(resp);
        let mensaje = resp.mensaje;
        let vista = resp.vista;
        if (mensaje == 'OK') {
            swal({
                title: 'Éxito',
                text: 'Evolución eliminada correctamente',
                icon: 'success',
                button: 'Aceptar'
            });
            if(tipo_examen == 'endo'){
                $('#contenedor_examen_dolor_end').empty();
                $('#contenedor_examen_dolor_end').append(vista);
            }else if(tipo_examen == 'odontop'){
                $('#contenedor_pieza_dental_od_general').empty();
                $('#contenedor_pieza_dental_od_general').append(vista);
            }

        } else {
            swal({
                title: 'Error',
                text: 'mensaje',
                icon: 'error',
                button: 'Aceptar'
            })
        }
    },
    error: function(error) {
        console.log(error);
    }
});
}

function mostrarFormularioReceta(id) {
    console.log(id);
    if (id == 1) {
        $('#rec_1').addClass('show active');
        $('#rec_2').removeClass('show active');
        $('#procedimiento_div').removeClass('show active');
        $('#curaciones_div').removeClass('show active');
    } else if (id == 2) {
        $('#rec_2').addClass('show active');
        $('#rec_1').removeClass('show active');
        $('#procedimiento_div').removeClass('show active');
        $('#curaciones_div').removeClass('show active');
    } else if (id == 3) {
        $('#rec_1').removeClass('show active');
        $('#rec_2').removeClass('show active');
        $('#procedimiento_div').addClass('show active');
        $('#curaciones_div').removeClass('show active');
    }else{
        console.log('es 4');
        $('#rec_1').removeClass('show active');
        $('#rec_2').removeClass('show active');
        $('#procedimiento_div').removeClass('show active');
        $('#curaciones_div').addClass('show active');
    }
}

function indicar_procedimiento_sdi() {
    var ind_med = $('#ind_med').val();
    var ind_cur = $('#ind_cur').val();
    var ind_proc = $('#ind_proc').val();
    var ind_inmmed = $('#ind_inmmed').val();
    var ind_cc = $('#ind_cv_inmmed_urg').val();
    var ind_pp = $('#ind_pp').val();
    var ind_vig_sig = $('#ind_vig_sig').val();

    var obs_ind_med = $('#obs_ind_med_servicio').val();
    var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

    var params = new URLSearchParams(location.search);
    var id_paciente = $('#id_paciente').val();

    var valido = 0;
    var mensaje = '';

    // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
    // }

    // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Curaciones.\n';
    // }

    // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
    // }

    // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
    // }

    // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Control de ciclo.\n';
    // }

    // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Preparar para.\n';
    // }

    // if ($.trim(ind_vig_sig) == '') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
    // }

    // if ($.trim(obs_ind_med) == '') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Observaciones.\n';
    // }

    // if ($.trim(obs_detalle_ind_med) == '') {
    //     valido = 1;
    //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
    // }


    if (valido == 0) {
        let data = {
            ind_med: ind_med,
            ind_cur: ind_cur,
            ind_proc: ind_proc,
            ind_inmmed: ind_inmmed,
            ind_cc: ind_cc,
            ind_pp: ind_pp,
            ind_vig_sig: ind_vig_sig,
            id_paciente: id_paciente,
            obs_ind_med: obs_ind_med,
            obs_detalle_ind_med: obs_detalle_ind_med,
            _token: "{{ csrf_token() }}"
        };

        console.log(data);
        var url = "{{ route('indicar_procedimiento_sdi') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
                dataType: "json",
            })
            .done(function(data) {
                if (data.status == 1) {
                    let procedimientos = data.procedimientos;
                    let curaciones = data.curaciones;

                    $('#tabla_procedimientos_servicio tbody').empty();
                    $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                    $('#tabla_curaciones_servicio tbody').empty();
                    $('#tabla_curaciones_procedimientos tbody').empty();
                    $('#tabla_procedimientos_hosp tbody').empty();
                    procedimientos.forEach(function(procedimiento) {
                        console.log(procedimiento.id);
                        if (procedimiento.estado == 0) {
                            var html = '<span class="badge badge-warning">Suspendido </span>';
                        } else {
                            var html = '';
                        }
                        let datos = JSON.parse(procedimiento.datos_procedimiento);
                        // Ahora puedes trabajar con datos como un objeto JSON

                        $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);

                        $('#tabla_procedimientos_hosp tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap">
                                    <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);
                    });
                    if (curaciones.length > 0) {
                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);

                            $('#tabla_curaciones_procedimientos tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                            </tr>
                            `);
                        });
                    }

                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    } else {
        swal({
            title: "Indicación de Procedimiento.",
            text: mensaje,
            icon: "error",
            buttons: "Aceptar",
            //SuccessMode: true,
        });
    }
}

function evaluar_para_carga_detalle(select, div, input, valor)
{
    var valor_select = $('#'+select+'').val();
    if(valor_select == valor) $('#'+div+'').show();
    else {
        $('#'+div+'').hide();
        $('#'+input+'').val('');
    }
}

function eliminar_procedimiento_sdi(id) {
    swal({
        title: "Eliminar Procedimiento.",
        text: 'Al "Aceptar" Elimina el procedimiento.\n',
        icon: "warning",
        buttons: ["Cancelar", 'Aceptar'],
    }).then((result) => {
        console.log(result);
        if (result == true) {
            eliminar_procedimiento_sdi_ajax(id);
        } else {
            console.log('regresar');
        }
    });
}

function suspender_procedimiento_sdi(id) {
    var url = "{{ route('suspender_procedimiento_sdi') }}";
    var id_paciente = $('#id_paciente').val();

    $.ajax({
            url: url,
            type: "post",
            data: {
                id: id,
                id_paciente: id_paciente,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 'success') {
                let procedimientos = data.procedimientos;
                let curaciones = data.curaciones;
                console.log(procedimientos);
                $('#tabla_procedimientos_servicio tbody').empty();
                $('#tabla_procedimientos_hosp tbody').empty();
                $('#tabla_curaciones_servicio tbody').empty();
                procedimientos.forEach(function(procedimiento) {
                    if (procedimiento.estado == 0) {
                        var html = '<span class="badge badge-warning">Suspendido </span>';
                    } else {
                        var html = '';
                    }
                    let datos = JSON.parse(procedimiento.datos_procedimiento);
                    // Ahora puedes trabajar con datos como un objeto JSON
                    console.log(datos);
                    $('#tabla_procedimientos_servicio tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                            <td class="text-center align-middle text-wrap">
                                <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                            </td>
                            <td class="text-center align-middle text-wrap">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                    <i class="fas fa-trash"></i>Eliminar
                                </button>
                                <button type="button"
                                    class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                    onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                    <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                    ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                </button>
                            </td>
                        </tr>
                    `);

                    $('#tabla_procedimientos_hosp tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                            <td class="text-center align-middle text-wrap">
                                <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                            </td>
                            <td class="text-center align-middle text-wrap">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                    <i class="fas fa-trash"></i>Eliminar
                                </button>
                                <button type="button"
                                    class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                    onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                    <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                    ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                </button>
                            </td>
                        </tr>
                    `);

                });

                curaciones.forEach(function(curacion) {
                    let datos = curacion.datos_curacion;
                    // Ahora puedes trabajar con datos como un objeto JSON
                    console.log(curacion);
                    $('#tabla_curaciones_servicio tbody').append(`
                        <tr>
                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle">
                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                            </td>
                            <td class="text-center align-middle">
                                <div class="switch switch-success d-inline">
                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                    Insumos
                                </button>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                    <i class="fas fa-edit"></i>

                                </button>
                            </td>
                        </tr>
                    `);
                });

                swal({
                    title: "Indicación de Procedimiento.",
                    text: data.mensaje,
                    icon: "success",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                })
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: data.mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
}

function eliminar_procedimiento_sdi_ajax(id) {
    var url = "{{ route('eliminar_procedimiento_sdi') }}";
    var id_paciente = $('#id_paciente').val();
    $.ajax({
            url: url,
            type: "post",
            data: {
                id: id,
                id_paciente: id_paciente,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 'success') {
                let procedimientos = data.procedimientos;
                let curaciones = data.curaciones;
                console.log(curaciones);
                $('#tabla_procedimientos_servicio tbody').empty();
                $('#tabla_procedimientos_hosp tbody').empty();
                $('#tabla_curaciones_servicio tbody').empty();
                procedimientos.forEach(function(procedimiento) {
                    if (procedimiento.estado == 0) {
                            var html = '<span class="badge badge-warning">Suspendido </span>';
                        } else {
                            var html = '';
                        }
                    let datos = JSON.parse(procedimiento.datos_procedimiento);
                    // Ahora puedes trabajar con datos como un objeto JSON
                    console.log(datos);
                    $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);

                        $('#tabla_procedimientos_hosp tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap">
                                    <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);
                });

                curaciones.forEach(function(curacion) {
                    let datos = curacion.datos_curacion;
                    // Ahora puedes trabajar con datos como un objeto JSON
                    console.log(curacion);
                    $('#tabla_curaciones_servicio tbody').append(`
                        <tr>
                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle">
                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                            </td>
                            <td class="text-center align-middle">
                                <div class="switch switch-success d-inline">
                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                    Insumos
                                </button>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                    <i class="fas fa-edit"></i>

                                </button>
                            </td>
                        </tr>
                    `);
                });

                swal({
                    title: "Indicación de Procedimiento.",
                    text: data.mensaje,
                    icon: "success",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                })
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: data.mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

}

function eliminarCuracion(id) {
    swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('eliminar_curacion') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "id_paciente": $('#id_paciente').val()
                    },
                    success: function(data) {

                        // convertir json a objeto
                        var obj = JSON.parse(data);
                        var curaciones = obj.curaciones;
                        $('#tabla_curaciones_servicio tbody').empty();
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        curaciones.forEach(curacion => {
                            let datos = curacion.datos_curacion;
                            $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                            $('#tabla_curaciones_procedimientos tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        `);
                        });

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

}

function eliminar_medicamento_sdi(id) {
    swal({
        title: "Eliminar Medicamento",
        text: "¿Está seguro de eliminar el medicamento?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let url = "{{ route('detalle_receta.eliminar') }}";
            var _token = CSRF_TOKEN;
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id: id,
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.status;
                    if (mensaje == 'success') {
                        let medicamentos = resp.data;
                        $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                        $('#tbody_tabla_medicamento_manual').empty();
                        $('#tabla_tratamientos_servicio tbody').empty();
                        medicamentos.forEach(medicamento => {
                            console.log(medicamento);
                            if (medicamento.id_dosis == null) {
                                medicamento.dosis = medicamento.nombre_dosis;
                            }

                            if (medicamento.id_frecuencia == null || medicamento
                                .id_frecuencia == 0) {
                                medicamento.indicaciones = medicamento
                                .nombre_frecuencia;
                            }

                            let fila = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                    </tr>`;

                            let fila_ = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td><input type="text" disabled></td>
                                        <td class="p-0">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="tratamiento_listo${medicamento.id}">
                                                <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                            </div><br>
                                            <label>Listo</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                        </td>
                                        <td><button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"> </i></button> </td>
                                    </tr>`;
                            $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                            $('#tbody_tabla_medicamento_manual').append(fila);
                            $('#tabla_tratamientos_servicio tbody').append(fila_);
                        });
                        swal({
                            title: "Medicamento Eliminado",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            })
        }
    });
}

function enviar_medicamento_faltante_sdi()
{
    var med_faltante = $.trim($('#med_faltante').val());
    var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

    if(med_faltante != '')
    {
        /** registro */
        let url = "{{ route('medicamentoFaltante.registro')}}";


        var _token = CSRF_TOKEN;
        var id_profesional = $('#id_profesional').val();

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional: id_profesional,
                nombre: med_faltante,
                droga: med_droga,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    $('#med_faltante').val('');
                    $('#no_existe_switch').prop( "checked", false );
                    $('#no_existe').hide();

                }
                else{

                    swal({
                        title: "Problema al Enviar solicitud.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
    else
    {
        swal({
            title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
            icon: "error",
            // buttons: "Aceptar",
            //SuccessMode: true,
        })
    }

}
function indicar_medicamento_manual_sdi()
{
    let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
    let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
    let farmaco = $('#manual_nombre_composicion_farmaco').val();
    let tipo_control = $('#manual_tipo_control').val();

    let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
    let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

    let cantidad_comprar = $('#manual_cantidad_comprar').val();
    let cantidad_numero_comprar = $('#manual_cantidad_numero').val();

    let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
    let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

    let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

    let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
    let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();

    let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();



    var lista_med = [];
    $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
        if (i > 0) {
            rol = {};
            var data = $(this).find("td");
            lista_med.push($.trim($(data[2]).text().split("\n").join("")));
        }
    });

    if($.inArray(nombre_medicamento_ficha_dental,lista_med) == -1)
    {

        var medicamento_uso_cronico = 0;
        if($('#manual_medicamento_uso_cronico').is(':checked'))
            medicamento_uso_cronico = 1;

        var valido = 0;
        var mensaje = '';

        if($.trim(nombre_medicamento_ficha_dental) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Medicamento.\n';
        }

        if($.trim(tipo_control) == '0')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Tipo Control.\n';
        }

        if($.trim(farmaco) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Farmaco.\n';
        }

        if($.trim(dosis_medicamento_ficha_dental) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Presentación.\n';
        }

        if($.trim(frecuencia_medicamento_ficha_dental) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Posología.\n';
        }


        if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Via de Administración.\n';
        }
        else if($('#via_administracion_ficha_dental').val() == 11)
        {
            if( $.trim(observaciones_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe ingresar Otra Vía Administración\n';
            }
            else
            {
                via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
            }
        }

        // if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
        // {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Periodo.\n';
        // }
        // else if($('#periodo_ficha_dental').val() == 11)
        // {
        //     if( $.trim(observaciones_periodo_ficha_dental) == '')
        //     {
        //         valido = 1;
        //         mensaje += 'Debe ingresar Otro Periodo\n';
        //     }
        //     else
        //     {
        //         periodo_ficha_dental = observaciones_periodo_ficha_dental;
        //     }
        // }

        // if($.trim(cantidad_comprar) == '')
        // {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
        // }
        // else
        // {
        //     const regex = /\(\d+\) \w+ \w+/g;
        //     if (!regex.test(cantidad_comprar))
        //     {
        //         console.log('no cuadra');
        //         valido = 1;
        //         mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
        //     }
        //     else
        //     {
        //         console.log('correcto');
        //     }
        // }

        if(valido == 0)
        {
            var parametros = {
                "id_tipo_control": tipo_control,
                "id_medicamento": id_medicamento,
                "nombre_medicamento_ficha_dental": nombre_medicamento_ficha_dental,
                "farmaco": farmaco,
                "dosis_medicamento_ficha_dental": dosis_medicamento_ficha_dental,
                "frecuencia_medicamento_ficha_dental": frecuencia_medicamento_ficha_dental,
                "via_administracion_ficha_dental": via_administracion_ficha_dental,
                "observaciones_medicamento_ficha_dental": observaciones_medicamento_ficha_dental,
                "medicamento_uso_cronico": medicamento_uso_cronico,

            }

            console.log(parametros);
            $('.medicamentos_sin_registros').remove();
            agregarMedicamentoManualReceta(parametros, 1);

            /** enviando a table de medicamento faltante */
            if($('#id_medicamento_ficha_dental').val() == '')
            {
                $('#med_faltante').val(nombre_medicamento_ficha_dental);
                enviar_medicamento_faltante_sdi();
            }


            $('#manual_nombre_medicamento_ficha_dental').val('');
            $('#manual_id_medicamento_ficha_dental').val('');
            $('#manual_nombre_composicion_farmaco').val('');
            $('#manual_dosis_medicamento_ficha_dental').val('');
            $('#manual_frecuencia_medicamento_ficha_dental').val('');
            $('#manual_cantidad_comprar').val('');
            $('#manual_via_administracion_ficha_dental').val(0);
            $('#manual_observaciones_via_administracion_ficha_dental').val('');
            $('#manual_periodo_ficha_dental').val(0);
            $('#manual_observaciones_periodo_ficha_dental').val('');

            $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();

        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text: mensaje,
                icon: "error",
            });
        }
    }
    else
    {
        swal({
            title: "Ingreso de medicamento(s).",
            text:'El medicamento está Recetado',
            icon: "warning",
            // buttons: "Aceptar",
            //SuccessMode: true,
        });
    }
}

function validar_via_administracion_manual_sdi() {
    if ($('#manual_via_administracion_ficha_dental').val() == 11) {
        $('#div_manual_observaciones_via_administracion_ficha_dental').show();
        $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
    } else {
        $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
        $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled', 'disabled');
        $('#manual_observaciones_via_administracion_ficha_dental').val('');
    }
}

function agregarMedicamentoManualReceta(parametros, receta_am) {

let url = "{{ route('detalle_receta.registro_manual_receta') }}";
let id_paciente = $('#id_paciente').val();
let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
let dataId = selectedOption.data('id');
var _token = CSRF_TOKEN;
$.ajax({

    url: url,
    type: "POST",
    data: {
        _token: _token,
        id_ficha: $('#id_fc').val(),
        id_tipo_control: parametros.id_tipo_control,
        id_medicamento: parametros.id_medicamento,
        nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
        nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
        nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
        via_administracion: parametros.via_administracion_ficha_dental,
        farmaco: parametros.farmaco,
        observaciones: parametros.observaciones_medicamento_ficha_dental,
        uso_cronico: parametros.medicamento_uso_cronico,
        id_paciente: id_paciente,
        receta_am: receta_am,
    },
    success: function(resp) {
        console.log(resp);
        let mensaje = resp.status;
        if (mensaje == 'success') {
            let medicamentos = resp.data;
            $('#tbody_tabla_medicamento_cirugia_sdi').empty();
            $('#tbody_tabla_medicamento_manual').empty();
            $('#tabla_tratamientos_servicio tbody').empty();
            medicamentos.forEach(medicamento => {
                console.log(medicamento);
                if (medicamento.id_dosis == null) {
                    medicamento.dosis = medicamento.nombre_dosis;
                }

                if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                    medicamento.id_frecuencia == 1000) {
                    medicamento.indicaciones = medicamento.nombre_frecuencia;
                }
                let fila = `<tr id="row${medicamento.id}">
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                            </tr>`;

                let fila_ = `<tr id="row${medicamento.id}">
                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                <td><input type="text" disabled></td>
                                <td class="p-0">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                        <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                    </div><br>
                                    <label>Pendiente</label>
                                </td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                </td>
                                <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                            </tr>`;
                $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                $('#tbody_tabla_medicamento_manual').append(fila);
                $('#tabla_tratamientos_servicio tbody').append(fila_);
            });
            swal({
                title: "Medicamento Agregado",
                icon: "success",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    },
    error: function(error) {
        console.log(error.responseText);
    }
})
}


function mostrar_nuevas_imagenes_dent(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_nueva_imagen_dent').empty();
            $('#contenedor_nueva_imagen_dent').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function mostrar_nuevas_imagenes_dent_estudio(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            tipo: 'preimplante',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_nueva_imagen_dent_estudio').empty();
            $('#contenedor_nueva_imagen_dent_estudio').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function mostrar_nuevas_imagenes_dent_periodoncica(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            tipo: 'periodoncica',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_nueva_imagen_dent_period').empty();
            $('#contenedor_nueva_imagen_dent_period').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function ocultar_pieza_imagenes_rx(){
    $('#contenedor_nueva_imagen_dent').empty();
}

function ocultar_pieza_imagenes_rx_estudio(){
    $('#contenedor_nueva_imagen_dent_estudio').empty();
}

function mostrar_nueva_pieza_ex_radio(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_rx') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_examenes_oral_rx').empty();
            $('#contenedor_examenes_oral_rx').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}



function eliminar_pieza_dental_rx(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar este examen?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_eliminar_pieza_dental_rx(id);
            }
        })
}

function editar_pieza_dental_rx(id){
    // abrir_modal
    $('#modal_agregar_imagenes_dental_paciente').modal('show');
}


function confirmar_eliminar_pieza_dental_rx(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_rx') }}";
    let id_paciente = dame_id_paciente();

    $.ajax({
        type:'post',
        url: url,
        data:{
            id: id,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        },
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function amplificar_imagen(path){
    // abrir modal
    $('#modal_imagen_dental_rx').modal('show');
    $('.zoom-container').on('mousemove', function (e) {
            const $img = $(this).find('img');
            const offsetX = e.offsetX; // Posición X del mouse dentro del contenedor
            const offsetY = e.offsetY; // Posición Y del mouse dentro del contenedor
            const width = $(this).width();
            const height = $(this).height();
            const xPercent = (offsetX / width) * 100; // Porcentaje X
            const yPercent = (offsetY / height) * 100; // Porcentaje Y

            $img.css('transform-origin', `${xPercent}% ${yPercent}%`); // Ajusta el origen de transformación
        });
    $('#imagen_paciente_rx').attr('src',"{{ asset('storage') }}"+"/"+path);
}

function eliminar_rx(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta RX?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarImagenRx(id);
            }
        })
}

function confirmarEliminarImagenRx(id){
    let url = "{{ ROUTE('profesional.eliminar_imagen_rx_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        id_paciente: dame_id_paciente()
    }

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }else{
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_imagen_dental(id,path){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar esta imagen?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true,
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',

    })
    .then((confirm) => {
        if (confirm) {
            confirmar_eliminar_imagen_dental(id,path);
        } else {
            swal('Cancelado', 'La imagen no fue eliminada :(', 'error');
        }
    });

}

function confirmar_eliminar_imagen_dental(id,path){
    let url = "{{ route('profesional.eliminar_imagen_dental_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        path: path,
        id_paciente: dame_id_paciente()
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);

            if(resp.mensaje == 'OK'){
                let seccion = resp.seccion;
                if(seccion == 'gral'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                }else if(seccion == 'implantologia'){
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                }else{
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                }

            }else{
                // $('#contenedor_imagenes_dent').empty();
                // $('#contenedor_imagenes_dent').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_imagenes(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta información?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_eliminar_pieza_dental_imagenes(id);
            }
        })
}

function confirmar_eliminar_pieza_dental_imagenes(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
    let id_paciente = dame_id_paciente();

    let data = {
        _token: CSRF_TOKEN,
        id_paciente: id_paciente,
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_imagenes_dent').empty();
                $('#contenedor_imagenes_dent').append(resp.v);
                swal({
                    title:'Exito',
                    text:'Se ha guardado con exito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_imagenes_estudio(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta información?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_eliminar_pieza_dental_imagenes_estudio(id);
            }
        })
}

function confirmar_eliminar_pieza_dental_imagenes_estudio(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
    let id_paciente = dame_id_paciente();

    let data = {
        _token: CSRF_TOKEN,
        id_paciente: id_paciente,
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_imagenes_dent_estudio').empty();
                $('#contenedor_imagenes_dent_estudio').append(resp.v);
                swal({
                    title:'Exito',
                    text:'Se ha guardado con exito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_pieza_dental_examen(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen') }}";
    let data = {
        count: count,
        id_paciente: dame_id_paciente(),
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_nueva_pieza_dental').empty();
                $('#contenedor_nueva_pieza_dental').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

    function pedir_autorizacion_presupuesto_dental(){
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de solicitar la autorización del presupuesto?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_pedir_autorizacion_presupuesto_dental();
            }
        })
    }

    function  confirmar_pedir_autorizacion_presupuesto_dental()
    {
        $('#modal_autorizacion_presupuesto').modal('show');
        $('#modal_autorizacion_imagen').html('');
        $('#modal_autorizacion_mensaje').html('');
        $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
    }

    function  cerrar_autorizacion_presupuesto()
    {
        $('#modal_autorizacion_presupuesto').modal('hide');
    }

    function mostrar_nueva_pieza_dental_hist(count, tipo){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_hist') }}";
        let data = {
            count: count,
            id_paciente: dame_id_paciente(),
            seccion: tipo,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    if(tipo == 'impl'){
                        $('#contenedor_piezas_hist').empty();
                        $('#contenedor_piezas_hist').append(resp.v);
                    }else{
                        $('#contenedor_piezas_hist_period').empty();
                        $('#contenedor_piezas_hist_period').append(resp.v);
                    }


                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function solicitar_ic_periodoncia(){
        $('#modal_interconsulta_respuesta').modal('show');
    }

    function biopsia_check_implantologia(count) {
        // Obtén el checkbox
        var checkbox = $('#biopsia_check_implantologia' + count);

        // Obtén los textareas
        var textareaZona = $('#im_biop_zona' + count);
        var textareaObservaciones = $('#im_obs_result_biopsia' + count);

        // Verifica si el checkbox está marcado
        if (checkbox.is(':checked')) {
            // Si está marcado, habilita los textareas (remueve el atributo disabled)
            textareaZona.removeAttr('disabled');
            textareaObservaciones.removeAttr('disabled');
        } else {
            // Si no está marcado, deshabilita los textareas (añade el atributo disabled)
            textareaZona.attr('disabled', 'disabled');
            textareaObservaciones.attr('disabled', 'disabled');
        }
    }
</script>

<script>
    function eliminar_pieza_dental_hist(id){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar esta pieza?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true
    })
    .then((aceptar) => {
        if (aceptar) {
            confirmar_eliminar_pieza_dental_hist(id);
        } else {
            swal('Cancelado', 'La pieza no fue eliminada :(', 'error');
        }
    });
}

function confirmar_eliminar_pieza_dental_hist(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_hist') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: dame_id_paciente(),
        id: id,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val()
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#hist_piezas').empty();
                $('#hist_piezas').append(resp.v);

                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                });


            }
        },
        error: function(error){
            console.log(error);
        }
    })
}
</script>


