<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_period_tab" data-toggle="tab" href="#atencion_dent_period" role="tab" aria-controls="atencion_dent_period" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto_adulto_tab" data-toggle="tab" href="#odonto_adulto" role="tab" aria-controls="odonto_adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eval_periimpl_tab" data-toggle="tab" href="#eval_periimpl" role="tab" aria-controls="eval_periimpl" aria-selected="false">Evaluación-Periodoncica</a>
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
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
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
                    <div class="tab-content" id="od_periodonto-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_period" role="tabpanel" aria-labelledby="atencion_dent_period_tab">
                           
                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                            <!--Motivo consulta-->
                            @include('atencion_odontologica.generales.motivo_consulta')

                            <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                            @include('atencion_odontologica.generales.includes.odontologia_general')
                            {{--  @include('atencion_odontologica.generales.includes.odontologia_preimplante')  --}}
                            <!--EVALUACION PERIODONCIA -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_period">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval_period_1" aria-expanded="false" aria-controls="eval_period_1">
                                           Evaluación Periodóncica 
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
                                                                <a class="nav-link-aten text-reset" id="eval_periodonto_tab" data-toggle="tab" href="#eval_periodonto" role="tab" aria-controls="eval_periodonto" aria-selected="true">Examen Periodontal</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="estudio_rx_period_tab" data-toggle="tab" href="#estudio_rx_period" role="tab" aria-controls="estudio_rx_period" aria-selected="true">Estudio radiológico</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_dg_period_tab" data-toggle="tab" href="#eval_dg_period" role="tab" aria-controls="eval_dg_period" aria-selected="true">Evaluación y Diagnóstico</a>
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
                                                                                            <a class="nav-link-aten text-reset" id="hist_piezas_period_hist_tab" data-toggle="tab" href="#hist_piezas_period_hist" role="tab" aria-controls="hist_piezas_period_hist" aria-selected="false">Historia de la Pieza</a>
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
                                                                                            <!--HISTORIA-->
                                                                                            <div class="tab-pane fade show " id="hist_piezas_period_hist" role="tabpanel" aria-labelledby="hist_piezas_period_hist_tab">
                                                                                                <div id="hist_piezas_period">
                                                                                                    @php $count_period = 1; @endphp
                                                                                                    @foreach ($examenes_period as $e)
                                                                                                    <div class="card-body mb-2">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                        <div class="form-group fill">
                                                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="{{ $e->numero_pieza }}">
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
                                                                                                    @php $count_period++; @endphp
                                                                                                    @endforeach
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                @php $count = 1; @endphp
                                                                                                                <div id="contenedor_piezas_hist_period"></div>
                                                                                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist({{ $count_period }},'period')"><i class="fas fa-save"></i> Mostrar nueva pieza</button>
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

                                                            <!--EVALUACION PERIODONCICA-->
                                                            <div class="tab-pane fade show " id="eval_periodonto" role="tabpanel" aria-labelledby="eval_periodonto_tab">
                                                                @foreach ($examenes_pre_implante as $e)
                                                                <div class="card mt-1">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset active" id="ex_period_general_tab" data-toggle="tab" href="#ex_period_general" role="tab" aria-controls="ex_period_general" aria-selected="false">Examen general</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset " id="ex_period_por_pieza_tab" data-toggle="tab" href="#ex_period_por_pieza" role="tab" aria-controls="ex_period_por_pieza" aria-selected="false">Examen por pieza</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="ex_period_por_grupo_tabb" data-toggle="tab" href="#ex_period_por_grupo" role="tab" aria-controls="ex_period_por_grupo" aria-selected="true">Examen Por grupos</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="ex_period_general" role="tabpanel" aria-labelledby="ex_period_general_tab">
                                                                                        <head>
                                                                                          
                                                                                            {{--  <title>Odontograma</title>
                                                                                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
                                                                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                                                                                            <link rel="stylesheet" href="js\periodoncia\style_period.css">
                                                                                            <script src="js\periodoncia\pincel_period.js"></script>
                                                                                            <script src="js\periodoncia\odontograma_period.js"></script>
                                                                                          
                                                                                        </head>
                                                                                        <body class="dark-mode">
                                                                                            <div id="control" class="container">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 mt-2">
                                                                                                        <div class="btn-group" role="group">
                                                                                                            <input type="radio" class="btn-check" name="ferramenta" id="mouse" autocomplete="off" checked>
                                                                                                            <label class="btn btn-secondary" for="mouse"><i class="fas fa-mouse-pointer"></i></label>
                                                                                        
                                                                                                            <input class="btn-check" type="radio" name="ferramenta" id="pincel" value="option1">
                                                                                                            <label class="btn btn-secondary" for="pincel"><i class="fas fa-pencil-alt"></i></label>
                                                                                        
                                                                                                            <input class="btn-check" type="radio" name="ferramenta" id="borracha" value="option2">
                                                                                                            <label class="btn btn-secondary" for="borracha"><i class="fas fa-eraser"></i></label>
                                                                                        
                                                                                                        </div>
                                                                                                        <div class="btn-group" role="group">
                                                                                                            <button id="configBtn" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                                <i class="fas fa-cog"></i>
                                                                                                            </button>
                                                                                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                                                                <li style="margin: 5px;">
                                                                                                                    <label for="customRange2" class="form-label">Tamanho</label>
                                                                                                                    <input type="range" class="form-range" min="1" max="5" id="tamanhoPincel">
                                                                                                                </li>
                                                                                                                <li style="margin: 5px;">
                                                                                                                    <label for="customRange2" class="form-label">Cor</label>
                                                                                                                    <input type="color" id="corPincel" class="form-control form-control-color" value="#563d7c" title="Choose your color">
                                                                                                                </li>
                                                                                                                <li style="margin: 5px;">
                                                                                                                    <button id="limparDesenho" type="button" class="btn btn-secondary">
                                                                                                                        Limpar desenhos
                                                                                                                    </button>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <button type="button" class="btn btn-secondary" id="saveBtn"><i class="fas fa-save"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div id="canva-group">
                                                                                                <canvas id="camada1Odontograma"></canvas>
                                                                                                <canvas id="camada2Odontograma"></canvas>
                                                                                                <canvas id="camada3Odontograma"></canvas>
                                                                                                <canvas id="camada4Odontograma"></canvas>
                                                                                        
                                                                                                <canvas id="camadaPincel"></canvas>
                                                                                            </div>
                                                                                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="modalLabel">Adicionar procedimento</h5>
                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <div class="form-row">
                                                                                                                <input type="hidden" id="procedimentosRemovidos" th:field="*{procedimentosRemovidos}">
                                                                                                                <div id="procedimentosDiv"></div>
                                                                                                                <div class="form-group col-md-12">
                                                                                                                    <label for="nomeProcedimento">Nome</label>
                                                                                                                    <i data-type="info" class="fas fa-info-circle fa-1x text-info" onclick="toast_message('.','info')" style="margin-left: 5px; cursor: pointer;"></i>
                                                                                                                    <select class="form-control" id="nomeProcedimento">
                                                                                                                        <option selected value="">-- Selecione uma opção --</option>
                                                                                                                        <!-- <option th:value="${null}" th:text="${'NÃO INFORMADO'}"></option> -->
                                                                                                                        <!-- <option th:each="model : ${modelEnums}" th:value="${model}" th:text="${model.denominacao}"></option> -->
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group col-12" id="colOutroProcedimento">
                                                                                                                    <label for="outroProcedimento">Outro procedimento</label>
                                                                                                                    <i style="margin-left:5px;cursor: pointer;" class="alerta fas fa-info-circle fa-1x text-info" data-type="info" onclick="mensagens('.','info')"></i>
                                                                                                                    <input id="outroProcedimento" class="form-control" type="text">
                                                                                                                </div>
                                                                                                                <div class="form-group col-12">
                                                                                                                    <label for="exampleColorInput" class="form-label">Cor</label>
                                                                                                                    <i style="margin-left:5px;cursor: pointer;" class="alerta fas fa-info-circle fa-1x text-info" data-type="info" onclick="mensagens('.','info')"></i>
                                                                                                                    <input type="color" id="cor" disabled class="form-control form-control-color" value="#563d7c" title="Choose your color">
                                                                                                                </div>
                                                                                                                <div class="form-group col-12">
                                                                                                                    <label for="informacoesAdicionais">Informações adicionais</label>
                                                                                                                    <i style="margin-left:5px;cursor: pointer;" class="alerta fas fa-info-circle fa-1x text-info" data-type="info" onclick="mensagens('.','info')"></i>
                                                                                                                    <textarea rows="5" id="informacoesAdicionais" maxlength="5000" class="form-control"></textarea>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-1 d-inline mt-2" style="text-align: center; margin: auto;">
                                                                                                                    <a id="botaoAdicionar" class="form-control btn-sigsaude btnCorNovo">
                                                                                                                        <i class="fas fa-plus"></i>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-row">
                                                                                                                <div class="form-group col-md-12">
                                                                                                                    <div class="panel panel-default">
                                                                                                                        <div class="table-responsive">
                                                                                                                            <table class="table display dataTable table-bordered table-striped" id="tabelaTestesEspecificosForm">
                                                                                                                                <thead>
                                                                                                                                    <tr>
                                                                                                                                        <th>NOME</th>
                                                                                                                                        <th>COR</th>
                                                                                                                                        <th>INFORMAÇÕES ADICIONAIS</th>
                                                                                                                                        <th class="text-center">AÇÕES</th>
                                                                                                                                    </tr>
                                                                                                                                </thead>
                                                                                                                                <tbody id="bodyProcedimentos">
                                                                                                                                    <tr>
                                                                                                                                        <td></td>
                                                                                                                                        <td></td>
                                                                                                                                        <td></td>
                                                                                                                                        <td></td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                            <div class="modal fade" id="configuracoesFerramenta" tabindex="-1" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            ...
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
                                                                                        </body>  --}}
                                                                                         <div class="row">
                                                                                             <div class="col-md-12">
                                                                                                 <div id="contenedor_piezas_period"></div>
                                                                                                 <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist()"><i class="fas fa-save"></i> Mostrar nueva Pieza</button>
                                                                                             </div>
                                                                                         </div>
                                                                                     </div>
                                                                                    <div class="tab-pane fade show " id="ex_period_por_pieza" role="tabpanel" aria-labelledby="ex_period_por_pieza_tab">
                                                                                       <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 mt-3">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                            <input type="number" class="form-control form-control-sm" name="period_pza" id="period_pza" value="3.2">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Sangrado</label>
                                                                                                            <select name="perio_sang" id="perio_sang" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sang','div_perio_sang','obs_perio_sang',3);">
                                                                                                                <option selected="" value="1">Espontáneo</option>
                                                                                                                <option value="2">Al cepillarse</option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_perio_sang" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sang" id="obs_perio_sang"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Supuración</label>
                                                                                                            <select name="perio_sup" id="perio_sup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sup','div_perio_sup','obs_perio_sup',3);">
                                                                                                                <option selected="" value="1">Espontánea mal olor</option>
                                                                                                                <option value="2">Espontánea sin mal olor</option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_perio_sup" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sup" id="obs_perio_sup"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Higiene</label>
                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                <option selected value="1">Aceptable</option>
                                                                                                                <option value="2">Deficiente </option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_period_hig" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro (describir)</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_hig" id="obs_period_hig"></textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Alt MG</label>
                                                                                                            <input type="number" class="form-control form-control-sm" name="period_alt_mg" id="period_alt_mg" value="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">P-Sondaje</label>
                                                                                                            <input type="number" class="form-control form-control-sm" name="period_prof_sond" id="period_prof_sond" value="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Movilidad-pieza</label>
                                                                                                            <select name="period_mov_dent" id="period_mov_dent" class="form-control form-control-sm">
                                                                                                                <option selected="" value="1">Grado 0</option>
                                                                                                                <option value="2">Grado 1</option>
                                                                                                                <option value="3">Grado 2</option>
                                                                                                                <option value="3">Grado 3</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Furcas</label>
                                                                                                            <select name="period_furca" id="period_furca" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_furca','div_period_furca','obs_period_furca',3);">
                                                                                                                <option selected="" value="1">Normales</option>
                                                                                                                <option value="2">N/correponde</option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_period_furca" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro daño</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_furca" id="obs_period_furca"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Tipo sonda</label>
                                                                                                            <select name="period_inst" id="period_inst" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_inst','div_period_inst','obs_period_inst',5);">
                                                                                                                <option selected="" value="1">Sonda MARQUIS(MP12B)</option>
                                                                                                                <option value="2">Sonda UNC 15(MPUNC 15RB)</option>
                                                                                                                <option value="3">Sonda OMS 11.5(MPWHOB)</option>
                                                                                                                <option value="4">Sonda NABERS 15(MPN2B)</option>
                                                                                                                <option value="5">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_period_inst" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro Tipo</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_inst" id="obs_period_inst"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_pza()" id="obs_period_pza()"></textarea>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-3 mt-2" >
                                                                                                <div class="form-group fill">

                                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                                        <input type="checkbox" onchange="biopsia_check_period(1)" id="biopsia_check_period1" name="biopsia_check_period1" value="" >
                                                                                                        <label for="biopsia_check_period1({{ $count }})" class="cr"></label>
                                                                                                    </div>
                                                                                                    <label>biopsia</label>
                                                                                                    <hr>
                                                                                                    <div class="form-group fill">
                                                                                                        <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="peri_biop_zona1" id="peri_biop_zona1">x</textarea>
                                                                                                    </div>
                                                                                                    <div class="form-group fill">
                                                                                                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="peri_obs_result_biopsia1" id="peri_obs_result_biopsia1">x</textarea>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                        <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
                                                                                                    <hr>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div id="contenedor_piezas_period"></div>
                                                                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist()"><i class="fas fa-save"></i> Mostrar nueva Pieza</button>
                                                                                            </div>
                                                                                        </div>1
                                                                                    </div>
                                                                                    <div class="tab-pane fade show" id="ex_period_por_grupo" role="tabpanel" aria-labelledby="ex_period_por_grupo_tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="3.2">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Sangrado</label>
                                                                                                            <select name="perdida" id="perdida" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perdida','div_perdida','obs_perdida',3);">
                                                                                                                <option selected="" value="1">Espontáneo</option>
                                                                                                                <option value="2">Al cepillarse</option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_perdida" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Supuración</label>
                                                                                                            <select name="perdida" id="perdida" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perdida','div_perdida','obs_perdida',3);">
                                                                                                                <option selected="" value="1">Espontánea mal olor</option>
                                                                                                                <option value="2">Espontánea sin mal olor</option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_perdida" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Higiene</label>
                                                                                                            <select name="perdida" id="perdida" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perdida','div_perdida','obs_perdida',3);">
                                                                                                                <option selected value="1">Aceptable</option>
                                                                                                                <option value="2">Deficiente </option>
                                                                                                                <option value="3">Otro describir</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_perdida" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Indice de O leary </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                                                                                            <input type="number" class="form-control form-control-sm" name="period_alt_mg" id="period_alt_mg" value="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Plataforma</label>
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
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Alt MG</label>
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
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">P-Sondaje</label>
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
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Furcas</label>
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
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Instrumento</label>
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
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                        <div class="form-group fill">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_anos_perd" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Años</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4 mt-2" >
                                                                                                <div class="form-group fill">

                                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                                        <input type="checkbox" onchange="biopsia_check_period_g(1)" id="biopsia_check_period_g1" name="biopsia_check_period_g1" value="" >
                                                                                                        <label for="biopsia_check_period_g1" class="cr"></label>
                                                                                                    </div>
                                                                                                    <label>biopsia</label>
                                                                                                    <hr>
                                                                                                    <div class="form-group fill">
                                                                                                        <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="peri_g_biop_zona1" id="peri_g_biop_zona1">x</textarea>
                                                                                                    </div>
                                                                                                    <div class="form-group fill">
                                                                                                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="peri_g_obs_result_biopsia1" id="peri_g_obs_result_biopsia1">x</textarea>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                        <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
                                                                                                    <hr>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <div id="contenedor_piezas_period"></div>
                                                                                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist()"><i class="fas fa-save"></i> Mostrar nueva Grupo</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                            <!--ESTUDIO RADIOLÓGICO POR PIEZA-->
                                                            <div class="tab-pane fade show" id="estudio_rx_period" role="tabpanel" aria-labelledby="estudio_rx_period_tab">
                                                                <div id="contenedor_imagenes_dent_period">
                                                                    @php $count = 1; @endphp
                                                                    @foreach ($imagenes_periodoncia as $imagen)
                                                                    <div class="form-row">
                                                                        <div class="col-sm-6 mt-2">
                                                                            <div class="card">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Pieza o zona</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral">{{ $e->observaciones }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Observaciones Radiológicas</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral">{{ $e->observaciones }}</textarea>
                                                                                                            </div>
                                                                                                        </div>
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
                                                                        <div class="col-sm-6 mt-2">
                                                                            <div class="card">
                                                                                <div class="card text-center">
                                                                                    <h6>EVALUACIÓN RADIOLÓGICA POR PIEZAS</h6>
                                                                                </div>
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row mb-1">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    {{--  <div class="form-row">
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
                                                                                                    </div>  --}}
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
                                                                    </div>
                                                                    @php $count++; @endphp
                                                                    @endforeach
                                                                </div>

                                                                <div id="contenedor_nueva_imagen_dent_period">

                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-3 col-lg-6 col-xl-6">
                                                                        <div class="form-group">

                                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nuevas_imagenes_dent_periodoncica({{ $count }})">CARGAR NUEVA IMAGEN</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EVALUACION DIAGNOSTICO-->
                                                            <div class="tab-pane fade show " id="eval_dg_period" role="tabpanel" aria-labelledby="eval_dg_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="eval_dg_p_pieza_tab" data-toggle="tab" href="#eval_dg_p_pieza" role="tab" aria-controls="eval_dg_p_pieza" aria-selected="true">Evaluación por piezas</a>
                                                                                            <a class="nav-link-aten text-reset" id="eval_dg_p_grupo_tab" data-toggle="tab" href="#eval_dg_p_grupo" role="tab" aria-controls="eval_dg_p_grupo" aria-selected="false">Evaluación por grupos</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="eval_dg_p_pieza" role="tabpanel" aria-labelledby="eval_dg_p_pieza_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_dg_periodonto_pp">
                                                                                                                    <div id="dg_periodontal" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="form-row">
                                                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                                            <input type="text" class="form-control form-control-sm" name="period_pza" id="period_pza" value="3.2">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Antecedentes</label>
                                                                                                                                            <select name="perio_sang" id="perio_sang" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sang','div_perio_sang','obs_perio_sang',3);">
                                                                                                                                                <option selected="" value="1">Espontáneo</option>
                                                                                                                                                <option value="2">Al cepillarse</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group" id="div_perio_sang" style="display:none;">
                                                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sang" id="obs_perio_sang"></textarea>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Eval-clínica</label>
                                                                                                                                            <select name="perio_sup" id="perio_sup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sup','div_perio_sup','obs_perio_sup',3);">
                                                                                                                                                <option selected="" value="1">Espontánea mal olor</option>
                                                                                                                                                <option value="2">Espontánea sin mal olor</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group" id="div_perio_sup" style="display:none;">
                                                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sup" id="obs_perio_sup"></textarea>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Estudio-rx.</label>
                                                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                                                <option selected value="1">Aceptable</option>
                                                                                                                                                <option value="2">Deficiente </option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group" id="div_period_hig" style="display:none;">
                                                                                                                                            <label class="floating-label-activo-sm">Otro (describir)</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_hig" id="obs_period_hig"></textarea>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Diagnóstico periodontal local</label>
                                                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                                                <option selected value="1">Sano</option>
                                                                                                                                                <option value="2">Gingivitis Leve</option>
                                                                                                                                                <option value="2">Gingivitis Moderada</option>
                                                                                                                                                <option value="2">Gingivitis Avanzada</option>
                                                                                                                                                <option value="2">Periodontitis Leve</option>
                                                                                                                                                <option value="2">Periodontitis Moderada</option>
                                                                                                                                                <option value="2">Periodontitis Avanzada</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Diagnóstico por Enfermedad sistémica</label>
                                                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                                                <option selected value="1">No</option>
                                                                                                                                                <option value="2">Diabetes</option>
                                                                                                                                                <option value="2">GReflujo Gastro-esofágico</option>
                                                                                                                                                <option value="2">Deformaciones arcadas</option>
                                                                                                                                                <option value="2">Por fuerzas oclusales</option>
                                                                                                                                                <option value="2">Por factores protésicos</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">

                                                                                                                                            <div class="form-group">
                                                                                                                                                <label class="floating-label-activo-sm">Diagnóstico Periodontal</label>
                                                                                                                                                <input type="text" class="form-control form-control-sm">
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_pza()" id="obs_period_pza()"></textarea>
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
                                                                                            <div class="tab-pane fade show" id="eval_dg_p_grupo" role="tabpanel" aria-labelledby="eval_dg_p_grupo_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_dg_periodonto_pg">
                                                                                                                    <div id="dg_periodontal" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="form-row">
                                                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Piezas N°s</label>
                                                                                                                                            <input type="text" class="form-control form-control-sm" name="period_pza" id="period_pza" value="3.2">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Antecedentes</label>
                                                                                                                                            <select name="perio_sang" id="perio_sang" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sang','div_perio_sang','obs_perio_sang',3);">
                                                                                                                                                <option selected="" value="1">Espontáneo</option>
                                                                                                                                                <option value="2">Al cepillarse</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group" id="div_perio_sang" style="display:none;">
                                                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sang" id="obs_perio_sang"></textarea>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Eval-clínica</label>
                                                                                                                                            <select name="perio_sup" id="perio_sup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sup','div_perio_sup','obs_perio_sup',3);">
                                                                                                                                                <option selected="" value="1">Espontánea mal olor</option>
                                                                                                                                                <option value="2">Espontánea sin mal olor</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group" id="div_perio_sup" style="display:none;">
                                                                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sup" id="obs_perio_sup"></textarea>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Estudio-rx.</label>
                                                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                                                <option selected value="1">Aceptable</option>
                                                                                                                                                <option value="2">Deficiente </option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group" id="div_period_hig" style="display:none;">
                                                                                                                                            <label class="floating-label-activo-sm">Otro (describir)</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_hig" id="obs_period_hig"></textarea>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Diagnóstico periodontal local</label>
                                                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                                                <option selected value="1">Sano</option>
                                                                                                                                                <option value="2">Gingivitis Leve</option>
                                                                                                                                                <option value="2">Gingivitis Moderada</option>
                                                                                                                                                <option value="2">Gingivitis Avanzada</option>
                                                                                                                                                <option value="2">Periodontitis Leve</option>
                                                                                                                                                <option value="2">Periodontitis Moderada</option>
                                                                                                                                                <option value="2">Periodontitis Avanzada</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Diagnóstico por Enfermedad sistémica</label>
                                                                                                                                            <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_peiod_higa','obs_period_hig',3);">
                                                                                                                                                <option selected value="1">No</option>
                                                                                                                                                <option value="2">Diabetes</option>
                                                                                                                                                <option value="2">GReflujo Gastro-esofágico</option>
                                                                                                                                                <option value="2">Deformaciones arcadas</option>
                                                                                                                                                <option value="2">Por fuerzas oclusales</option>
                                                                                                                                                <option value="2">Por factores protésicos</option>
                                                                                                                                                <option value="3">Otro describir</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                                        <div class="form-group fill">

                                                                                                                                            <div class="form-group">
                                                                                                                                                <label class="floating-label-activo-sm">Diagnóstico Periodontal</label>
                                                                                                                                                <input type="text" class="form-control form-control-sm">
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                                        <div class="form-group fill">
                                                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_pza()" id="obs_period_pza()"></textarea>
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
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_tto_period" role="tabpanel" aria-labelledby="plan_tto_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_implante">
                                                                                    {{-- <div id="pieza_dental" class="row">
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
                                                                                    </div> --}}
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="col-sm-4 col-md-4 col-xl-4">
                                                                                                <div class="form-row">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza2" onclick="mostrar_nueva_pieza_dental_tto_period()"><i class="fas fa-save"></i> Cargar otra pieza</button>
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
                                            Tratamiento Periodontal
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
                        </div>
                        <!--INFORME REHABILITACION-->
                        <div class="tab-pane fade" id="rehabdental" role="tabpanel" aria-labelledby="rehabdental-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Rehabilitación</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="div_form_examen_rfl">
                                        {!! $examen !!}
                                    </div>
                                </div>
                                <hr>
                                <!--GUARDAR EXAMEN-->
                                <div class="col-md-12 text-center mb-3">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                    <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('rfl');">Ver Examen PDF</bottom>
                                </div>
                            </div>
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
                        <!-- EVALUACION PERIODONCICA -->
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
                        <!-- EVALUACION PERIODONCICA -->
                        <!-- EVALUACIÓN GENERAL-->
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
                        <!--CIERRE: EVALUACION GENERAL --->
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
                </form>
            </div>

            
            <!--GUARDAR O IMPRIMIR FICHA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                        <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                    </div>
                </div>
            </div>
            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

        </div>
    </div>
</div>
@include('atencion_odontologica.modals.odontograma.tratamiento_boca_completa')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_inferior')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_superior')
@include('atencion_odontologica.modals.odontograma.tratamiento_laboratorio')
@include('atencion_odontologica.modals.odontograma.modal_odontograma')


<script>
    {{--  document.addEventListener('DOMContentLoaded', () => {

        const camada1 = document.querySelector('#camada1Odontograma')
        const contexto1 = camada1.getContext('2d')
    
        const camada2 = document.querySelector('#camada2Odontograma')
        const contexto2 = camada2.getContext('2d')
    
        const camada3 = document.querySelector('#camada3Odontograma')
        const contexto3 = camada3.getContext('2d')
    
        const camada4 = document.querySelector('#camada4Odontograma')
        const contexto4 = camada4.getContext('2d')
    
        const camadaPincel = document.querySelector('#camadaPincel')
        const contextoPincel = camadaPincel.getContext('2d')
    
        const modal = new bootstrap.Modal(document.getElementById('modal'))
    
        let posicoesPadrao = {
            posicaoYInicialDente: 2,
            margemXEntreDentes: 1,
            margemYEntreDentes: 2
        }
    
        const tamanhoTelaReferencia = 1895
        const alturaTelaReferencia = 872
    
        const itensProcedimento = [{
            nome: 'Lesão branca ativa de cárie',
            cor: '#008000'
        }, {
            nome: 'Lesão branca inativa de cárie',
            cor: '#FFFF00'
        }, {
            nome: 'Lesão de cárie cavitada',
            cor: '#FF0000'
        }, {
            nome: 'Cárie paralisada/ pigmentação do sulco',
            cor: '#000000'
        }, {
            nome: 'Restaurações em bom estado',
            cor: '#0000FF'
        }, {
            nome: 'Restauração a ser trocada',
            cor: '#FFC0CB'
        }, {
            nome: 'Lesão cervical não- cariosa',
            cor: '#8B0000'
        }, {
            nome: 'Faceta de desgaste',
            cor: '#FA8072'
        }, {
            nome: 'Limpar seção',
            cor: '#FFFFFF'
        }, {
            nome: 'Outro',
            cor: '#008080'
        }]
    
        let procedimentos = []
        class Procedimento {
            constructor(nome, cor, numeroDente, faceDente, informacoesAdicionais) {
                this.nome = nome;
                this.cor = cor;
                this.numeroDente = numeroDente;
                this.faceDente = faceDente;
                this.informacoesAdicionais = informacoesAdicionais;
            }
            valido() {
                const campos = ['nome', 'cor', 'numeroDente', 'faceDente']
                if (this.nome === null || this.nome === undefined || this.nome === '') return false
                if (this.cor === null || this.cor === undefined || this.cor === '') return false
                if (this.numeroDente === null || this.numeroDente === undefined || this.numeroDente === '') return false
                if (this.faceDente === null || this.faceDente === undefined || this.faceDente === '') return false
                return true
            }
            criaObjeto() {
                return {
                    nome: this.nome,
                    cor: this.cor,
                    numeroDente: this.numeroDente,
                    faceDente: this.faceDente,
                    informacoesAdicionais: this.informacoesAdicionais
                }
            }
            limpar() {
                this.nome = null;
                this.cor = null;
                this.numeroDente = null;
                this.faceDente = null;
                this.informacoesAdicionais = null;
            }
            salvar() {
                if (this.valido()) {
                    const procedimento = procedimentos.find(prc => prc.nome === this.nome && prc.numeroDente === this.numeroDente && prc.faceDente === this.faceDente)
                    if (procedimento === undefined) procedimentos.push(this.criaObjeto())
                    else procedimentos[procedimentos.indexOf(procedimento)] = this.criaObjeto()
                    storage.save(procedimentos)
                }
            }
            remover() {
                procedimentos.splice(procedimentos.indexOf(this.criaObjeto()), 1)
                storage.save(procedimentos)
            }
        }
    
        let procedimento = new Procedimento()
        procedimento.indice = null
    
        const storage = {
            fetch() {
                return JSON.parse(localStorage.getItem('procedimentos') || '[]')
            },
            save(procedimentos) {
                localStorage.setItem('procedimentos', JSON.stringify(procedimentos))
                procedimentos = this.fetch()
                return procedimentos
            }
        };
    
        let tamanhoColuna = camada1.width / 16
        let tamanhoDente = tamanhoColuna - (2 * posicoesPadrao.margemXEntreDentes)
    
        let dimensoesTrapezio = {
            // Base maior será a altura e largura do dente
            // Base menor será 3/4 da base maior
            // Lateral será 1/4 da base maior
    
            baseMaior: tamanhoDente,
            lateral: tamanhoDente / 4,
            baseMenor: (tamanhoDente / 4) * 3
        }
    
        let numeroDentes = {
            superior: ['18', '17', '16', '15', '14', '13', '12', '11', '21', '22', '23', '24', '25', '26', '27', '28'],
            inferior: ['48', '47', '46', '45', '44', '43', '42', '41', '31', '32', '33', '34', '35', '36', '37', '38']
        }
    
        let numeroDenteXOrdemExibicaoDente = new Array()
    
        /**
         *Define a posição inicial do dente no eixo x a partir de seu índice.
         * 
         * @example 
         *   definePosicaoXInicialDente(5)
         * 
         * @param   {Number}    index      Parâmetro obrigatório
         * @returns {Number}
         */
        const definePosicaoXInicialDente = (index) => {
            if (index === 0) return (index * tamanhoDente) + (posicoesPadrao.margemXEntreDentes * index) + posicoesPadrao.margemXEntreDentes;
            else return (index * tamanhoDente) + (2 * posicoesPadrao.margemXEntreDentes * index) + posicoesPadrao.margemXEntreDentes;
        }
    
        /**
         * Desenha os dentes com suas respectivas faces.
         * 
         * @example 
         *   desenharDente(20, 20)
         * 
         * @param   {Number} posicaoX      Parâmetro obrigatório
         * @param   {Number} posicaoY      Parâmetro obrigatório
         */
        const desenharDente = (posicaoX, posicaoY) => {
            contexto1.fillStyle = 'black';
            contexto1.strokeStyle = 'black';
    
            /* 1º trapézio */
            contexto1.beginPath();
            contexto1.moveTo(posicaoX, posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMaior + posicaoX, posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
            contexto1.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
            contexto1.closePath();
            contexto1.stroke();
    
            /* 2º trapézio */
            contexto1.beginPath();
            contexto1.moveTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMaior + posicaoX, posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
            contexto1.closePath();
            contexto1.stroke();
    
            /* 3º trapézio */
            contexto1.beginPath();
            contexto1.moveTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
            contexto1.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
            contexto1.lineTo(posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
            contexto1.closePath();
            contexto1.stroke();
    
            /* 4º trapézio */
            contexto1.beginPath();
            contexto1.moveTo(posicaoX, posicaoY);
            contexto1.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
            contexto1.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
            contexto1.lineTo(posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
            contexto1.closePath();
            contexto1.stroke();
        }
    
        /**
         * Faz o efeito 'hover' ao passar o mouse sobre alguma face.
         * 
         * @example 
         *   marcarSecao(contexto, 2, 5)
         * 
         * @param   {Object} contexto                Parâmetro obrigatório
         * @param   {Number} ordemExibicaoDente      Parâmetro obrigatório
         * @param   {Number} face                    Parâmetro obrigatório
         */
        const marcarSecao = (contexto, ordemExibicaoDente, face) => {
            contexto.lineWidth = 2
            let cor_linha = 'orange';
            let posicaoY = 0
    
            if (ordemExibicaoDente < 17) posicaoY = posicoesPadrao.posicaoYInicialDente;
            else {
                ordemExibicaoDente -= 16;
                posicaoY = dimensoesTrapezio.baseMaior + posicoesPadrao.margemYEntreDentes + posicoesPadrao.posicaoYInicialDente;
            }
    
            let posicaoX = definePosicaoXInicialDente(ordemExibicaoDente - 1)
    
            /* 1ª zona */
            if (face === 1) {
                if (contexto) {
                    contexto.fillStyle = cor_linha;
                    contexto.beginPath();
                    contexto.moveTo(posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.closePath();
                    contexto.strokeStyle = 'orange';
                    contexto.stroke();
                }
            }
            /* 2ª zona */
            if (face === 2) {
                if (contexto) {
                    contexto.fillStyle = cor_linha;
                    contexto.beginPath();
                    contexto.moveTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.closePath();
                    //contexto.fill();
                    contexto.strokeStyle = 'orange';
                    contexto.stroke();
                }
            }
            /* 3ª zona */
            if (face === 3) {
                if (contexto) {
                    contexto.fillStyle = cor_linha;
                    contexto.beginPath();
                    contexto.moveTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.lineTo(posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.closePath();
                    contexto.strokeStyle = 'orange';
                    contexto.stroke();
                }
            }
            /* 4ª zona */
            if (face === 4) {
                if (contexto) {
                    contexto.fillStyle = cor_linha;
                    contexto.beginPath();
                    contexto.moveTo(posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.closePath();
                    contexto.strokeStyle = 'orange';
                    contexto.stroke();
                }
            }
            /* 5ª zona(medio) */
            if (face === 5) {
                if (contexto) {
                    contexto.fillStyle = cor_linha;
                    contexto.beginPath();
                    contexto.moveTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.closePath();
                    contexto.strokeStyle = 'orange';
                    contexto.stroke();
                }
            }
        }
    
        camada4.onmousemove = (event) => {
            let x = event.x
            let y = event.y
    
            x -= camada1.offsetLeft
            y -= camada1.offsetTop
    
            procedimento.limpar()
            procedimento.indice = null
    
            procedimento = getInfoDentePosicaoatual(procedimento, x, y)
            if (getOrdemExibicaoPorNumeroDente(procedimento.numeroDente) > 0) {
                if (procedimento.faceDente) {
                    color = 'orange';
                    contexto3.clearRect(0, 0, camada3.width, camada3.height)
                    marcarSecao(contexto3, getOrdemExibicaoPorNumeroDente(procedimento.numeroDente), procedimento.faceDente);
                } else contexto3.clearRect(0, 0, camada3.width, camada3.height)
            } else contexto3.clearRect(0, 0, camada3.width, camada3.height)
        }
    
        camada4.touchstart = (event) => {
            alert('touch')
        }
    
        camada4.onclick = (event) => {
            let x = event.x
            let y = event.y
    
            x -= camada1.offsetLeft
            y -= camada1.offsetTop
    
            procedimento.limpar()
            procedimento.indice = null
    
            procedimento = getInfoDentePosicaoatual(procedimento, x, y)
    
            if (procedimento.faceDente) modal.show()
            atualizaTabela()
        }
    
        const atualizaTabela = () => {
            const tbody = document.getElementById('bodyProcedimentos')
            let trs = ''
            procedimentos.filter(prc => prc.numeroDente === procedimento.numeroDente && prc.faceDente === procedimento.faceDente).forEach(item => {
                const tr = `
                    <tr>
                        <td>
                            ${item.nome}
                        </td>
                        <td>
                            <input type="color" disabled class="form-control form-control-color" value="${item.cor}">
                        </td>
                        <td>
                            ${item.informacoesAdicionais || 'NÃO INFORMADO'}
                        </td>
                        <td>
                            <a onclick="apagar('${item.nome}', ${item.numeroDente}, ${item.faceDente})" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                `
                trs += tr
            })
            tbody.innerHTML = trs
        }
    
        window.apagar = (nome, numeroDente, faceDente) => {
            const procd = procedimentos.find(prc => prc.nome === nome && prc.numeroDente === numeroDente && prc.faceDente === faceDente)
            procedimentos.splice(procedimentos.indexOf(procd), 1)
            storage.save(procedimentos)
            atualizaTabela()
            resizeCanvas()
        }
    
        /**
         * Exibe o 'esqueleto' do odontograma (os dentes e sua numeração).
         */
        const exibirEstrutura = () => {
            // document.querySelector("#canva-group").style.display = 'block'
    
            for (let index = 0; index < 16; index++) {
                const posicaoX = definePosicaoXInicialDente(index)
                desenharDente(posicaoX, posicoesPadrao.posicaoYInicialDente)
            }
    
            for (let index = 0; index < 16; index++) {
                const posicaoX = definePosicaoXInicialDente(index)
                desenharDente(posicaoX, posicoesPadrao.margemYEntreDentes + tamanhoDente + posicoesPadrao.posicaoYInicialDente)
            }
    
            numeroDentes.superior.forEach((numero, index) => {
                const posicaoX = definePosicaoXInicialQuadrado(index)
                desenharQuadradoNumDente({
                    position: {
                        x: posicaoX,
                        y: (posicoesPadrao.margemYEntreDentes / 5) + tamanhoDente + posicoesPadrao.posicaoYInicialDente
                    },
                    primeiroOuUltimoDente: index === 0 || index === 15,
                    numeroDente: numero,
                    altura: tamanhoDente / 1.8,
                    largura: index === 0 || index === 15 ? tamanhoDente + posicoesPadrao.margemXEntreDentes : tamanhoDente + 2 * posicoesPadrao.margemXEntreDentes
                })
            })
    
            numeroDentes.inferior.forEach((numero, index) => {
                const posicaoX = definePosicaoXInicialQuadrado(index)
                desenharQuadradoNumDente({
                    position: {
                        x: posicaoX,
                        y: (posicoesPadrao.margemYEntreDentes / 5) + (tamanhoDente / 1.8) + tamanhoDente + posicoesPadrao.posicaoYInicialDente
                    },
                    primeiroOuUltimoDente: index === 0 || index === 15,
                    numeroDente: numero,
                    altura: tamanhoDente / 1.8,
                    largura: index === 0 || index === 15 ? tamanhoDente + posicoesPadrao.margemXEntreDentes : tamanhoDente + 2 * posicoesPadrao.margemXEntreDentes
                })
            })
        }
    
        /**
         * Define a posição inicial do quadrado no eixo x a partir de seu índice.
         *
         * @param {Number} index 
         */
        const definePosicaoXInicialQuadrado = (index) => {
            if (index === 0) return (index * tamanhoDente) + posicoesPadrao.margemXEntreDentes;
            else return (index * tamanhoDente) + (2 * index * posicoesPadrao.margemXEntreDentes);
        }
    
        /**
         * Desenha o quadrado que informa o número do dente.
         * 
         * @example 
         *   desenharQuadradoNumDente(quadrado)
         * 
         * @param   {Object} quadrado   Parâmetro obrigatório
         */
        const desenharQuadradoNumDente = (quadrado) => {
            let tamanhoFonte = (40 * (quadrado.primeiroOuUltimoDente ? quadrado.largura + posicoesPadrao.margemXEntreDentes : quadrado.largura)) / 118.4375
            contexto1.font = `${tamanhoFonte}px arial`
            contexto1.strokeRect(quadrado.position.x, quadrado.position.y, quadrado.largura, quadrado.altura)
            contexto1.fillText(quadrado.numeroDente, quadrado.position.x + tamanhoDente / 2.8, quadrado.position.y + (tamanhoDente / 2.5));
        }
    
        /**
         * Pinta a face do dente de acordo com o procedimento adicionado.
         * 
         * @example 
         *   pintarFace(contexto, procedimento, 'black', 'orange')
         * 
         * @param   {Object} contexto                Parâmetro obrigatório
         * @param   {Object} procedimento   Parâmetro obrigatório
         * @param   {String} cor_linha               Parâmetro obrigatório
         * @param   {String} cor_interior            Parâmetro obrigatório
         */
        const pintarFace = (contexto, procedimento, cor_linha, cor_interior) => {
            let numeroDente = getOrdemExibicaoPorNumeroDente(procedimento.numeroDente) - 1
            contexto.fillStyle = cor_interior
            contexto.strokeStyle = cor_linha
    
            let posicaoY = 0
    
            if (numeroDente < 16) posicaoY = posicoesPadrao.posicaoYInicialDente;
            else {
                numeroDente -= 16;
                posicaoY = dimensoesTrapezio.baseMaior + posicoesPadrao.margemYEntreDentes + posicoesPadrao.posicaoYInicialDente;
            }
    
            const prcdms = getProcedimentosPorDente(procedimento.numeroDente, procedimento.faceDente)
            const numeroDivisoes = prcdms.length - 1
            let dividir = false
            if (numeroDivisoes > 0) dividir = true
    
            let posicaoX = definePosicaoXInicialDente(numeroDente)
    
            /* 1ª zona */
            if (procedimento.faceDente === 1 && !dividir) {
                if (contexto) {
                    contexto.beginPath();
                    contexto.moveTo(posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.closePath();
                    contexto.fill();
                    contexto.stroke();
                }
            } else if (procedimento.faceDente === 1 && dividir) {
                if (contexto) {
                    const larguraDivisao = dimensoesTrapezio.baseMaior / (numeroDivisoes + 1)
                    prcdms.forEach((procedimentoItem, divisao) => {
                        contexto.fillStyle = procedimentoItem.cor
                        const ultimo = divisao === numeroDivisoes
                        const primeiro = divisao === 0
                        const dentroAreaTriangular = larguraDivisao * (divisao + 1) < dimensoesTrapezio.lateral
                        contexto.beginPath();
                        contexto.moveTo((larguraDivisao * divisao) + posicaoX, posicaoY);
                        contexto.lineTo(larguraDivisao * (divisao + 1) + posicaoX, posicaoY);
                        if (ultimo) {
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                            contexto.lineTo((larguraDivisao * divisao) + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                        } else if (!primeiro) {
                            contexto.lineTo(larguraDivisao * (divisao + 1) + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                            contexto.lineTo((larguraDivisao * divisao) + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                        } else {
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                            contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                        }
                        contexto.closePath();
                        contexto.fill();
                        contexto.stroke();
                    })
                }
            }
    
    
            /* 2ª zona */
            if (procedimento.faceDente === 2 && !dividir) {
                if (contexto) {
                    contexto.beginPath();
                    contexto.moveTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.closePath();
                    contexto.fill();
                    contexto.stroke();
                }
            } else if (procedimento.faceDente === 2 && dividir) {
                if (contexto) {
                    const larguraDivisao = dimensoesTrapezio.baseMaior / (numeroDivisoes + 1)
                    prcdms.forEach((procedimentoItem, divisao) => {
                        contexto.fillStyle = procedimentoItem.cor
                        const ultimo = divisao === numeroDivisoes
                        const primeiro = divisao === 0
                        contexto.beginPath();
                        contexto.moveTo(dimensoesTrapezio.baseMaior + posicaoX, (larguraDivisao * divisao) + posicaoY);
                        contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                        if (ultimo) {
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, (larguraDivisao * divisao) + posicaoY);
                        } else if (!primeiro) {
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, (larguraDivisao * divisao) + posicaoY);
                        } else {
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                        }
                        contexto.closePath();
                        contexto.fill();
                        contexto.stroke();
                    })
                }
            }
    
            /* 3ª zona */
            if (procedimento.faceDente === 3 && !dividir) {
                if (contexto) {
                    contexto.beginPath();
                    contexto.moveTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMaior + posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.lineTo(posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.closePath();
                    contexto.fill();
                    contexto.stroke();
                }
            } else if (procedimento.faceDente === 3 && dividir) {
                if (contexto) {
                    const larguraDivisao = dimensoesTrapezio.baseMaior / (numeroDivisoes + 1)
                    prcdms.forEach((procedimentoItem, divisao) => {
                        contexto.fillStyle = procedimentoItem.cor
                        const ultimo = divisao === numeroDivisoes
                        const primeiro = divisao === 0
                        const dentroAreaTriangular = larguraDivisao * (divisao + 1) < dimensoesTrapezio.lateral
                        contexto.beginPath();
                        contexto.moveTo((larguraDivisao * divisao) + posicaoX, posicaoY + tamanhoDente);
                        contexto.lineTo(larguraDivisao * (divisao + 1) + posicaoX, posicaoY + tamanhoDente);
                        if (ultimo) {
                            contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo((larguraDivisao * divisao) + posicaoX, dimensoesTrapezio.lateral + posicaoY + dimensoesTrapezio.baseMenor);
                        } else if (!primeiro) {
                            contexto.lineTo(larguraDivisao * (divisao + 1) + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo((larguraDivisao * divisao) + posicaoX, posicaoY + dimensoesTrapezio.baseMenor);
                        } else {
                            contexto.lineTo((larguraDivisao * (divisao + 1)) + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo(posicaoX, dimensoesTrapezio.lateral + posicaoY + dimensoesTrapezio.baseMenor);
                        }
                        contexto.closePath();
                        contexto.fill();
                        contexto.stroke();
                    })
                }
            }
    
            /* 4ª zona */
            if (procedimento.faceDente === 4 && !dividir) {
                if (contexto) {
                    contexto.beginPath();
                    contexto.moveTo(posicaoX, posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(posicaoX, dimensoesTrapezio.baseMaior + posicaoY);
                    contexto.closePath();
                    contexto.fill();
                    contexto.stroke();
                }
            } else if (procedimento.faceDente === 4 && dividir) {
                if (contexto) {
                    const larguraDivisao = dimensoesTrapezio.baseMaior / (numeroDivisoes + 1)
                    prcdms.forEach((procedimentoItem, divisao) => {
                        contexto.fillStyle = procedimentoItem.cor
                        const ultimo = divisao === numeroDivisoes
                        const primeiro = divisao === 0
                        contexto.beginPath();
                        contexto.moveTo(posicaoX, (larguraDivisao * divisao) + posicaoY);
                        contexto.lineTo(posicaoX, larguraDivisao * (divisao + 1) + posicaoY);
                        if (ultimo) {
                            contexto.lineTo(posicaoX + dimensoesTrapezio.lateral, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo(posicaoX + dimensoesTrapezio.lateral, (larguraDivisao * divisao) + posicaoY);
                        } else if (!primeiro) {
                            contexto.lineTo(posicaoX + dimensoesTrapezio.lateral, dimensoesTrapezio.baseMenor + posicaoY);
                            contexto.lineTo(posicaoX + dimensoesTrapezio.lateral, (larguraDivisao * divisao) + posicaoY);
                        } else {
                            contexto.lineTo(posicaoX + dimensoesTrapezio.lateral, larguraDivisao * (divisao + 1) + posicaoY);
                            contexto.lineTo(posicaoX + dimensoesTrapezio.lateral, dimensoesTrapezio.lateral + posicaoY);
                        }
                        contexto.closePath();
                        contexto.fill();
                        contexto.stroke();
                    })
                }
            }
    
            /* 5ª zona(medio) */
            if (procedimento.faceDente === 5 && !dividir) {
                if (contexto) {
                    contexto.beginPath();
                    contexto.moveTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.baseMenor + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.lineTo(dimensoesTrapezio.lateral + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                    contexto.closePath();
                    contexto.fill();
                    contexto.stroke();
                }
            } else if (procedimento.faceDente === 5 && dividir) {
                if (contexto) {
                    const larguraDivisao = (dimensoesTrapezio.baseMenor - dimensoesTrapezio.lateral) / (numeroDivisoes + 1)
                    prcdms.forEach((procedimentoItem, divisao) => {
                        contexto.fillStyle = procedimentoItem.cor
                        contexto.beginPath();
                        contexto.moveTo(dimensoesTrapezio.lateral + (divisao * larguraDivisao) + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                        contexto.lineTo(dimensoesTrapezio.lateral + ((divisao + 1) * larguraDivisao) + posicaoX, dimensoesTrapezio.lateral + posicaoY);
                        contexto.lineTo(dimensoesTrapezio.lateral + ((divisao + 1) * larguraDivisao) + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                        contexto.lineTo(dimensoesTrapezio.lateral + (divisao * larguraDivisao) + posicaoX, dimensoesTrapezio.baseMenor + posicaoY);
                        contexto.closePath();
                        contexto.fill();
                        contexto.stroke();
                    })
                }
            }
        }
    
        /**
         * Redimensiona os canvas do odontograma e seu conteúdo proporcionalmente ao tamanho da janela.
         */
        const resizeCanvas = () => {
            if (window.innerWidth >= 800) {
                document.querySelector("#canva-group").style.display = 'display'
            } else {
                alert("TELA MUITO PEQUENA! Acesse o odontrograma através de um dispositivo com uma tela maior!")
                document.querySelector("#canva-group").style.display = 'none'
            }
    
            camada1.width = camada2.width = camada3.width = camada4.width = window.innerWidth - 25
            const altura = (camada1.width * alturaTelaReferencia) / tamanhoTelaReferencia
            camada1.height = camada2.height = camada3.height = camada4.height = altura
    
            valoresBase = {
                x: (camada1.width * 24) / tamanhoTelaReferencia,
                y: (camada1.width * 20) / tamanhoTelaReferencia,
                largura: (camada1.width * 70) / tamanhoTelaReferencia,
                altura: (camada1.width * 150) / tamanhoTelaReferencia
            }
    
            base_image = new Image();
            base_image.src = 'images/dentes/18.png';
            base_image.onload = function() {
                contexto1.drawImage(base_image, valoresBase.x, valoresBase.y, valoresBase.largura, valoresBase.altura);
            }
    
            posicoesPadrao.margemXEntreDentes = (camada1.width * 8) / tamanhoTelaReferencia
            posicoesPadrao.margemYEntreDentes = (camada1.width * 200) / tamanhoTelaReferencia
            posicoesPadrao.posicaoYInicialDente = (camada1.width * 180) / tamanhoTelaReferencia
    
            tamanhoColuna = camada1.width / 16
            tamanhoDente = tamanhoColuna - (2 * posicoesPadrao.margemXEntreDentes)
    
            dimensoesTrapezio = {
                baseMaior: tamanhoDente,
                lateral: tamanhoDente / 4,
                baseMenor: (tamanhoDente / 4) * 3
            }
    
            exibeMarcacoes()
            exibirEstrutura()
        }
    
        /**
         * Retorna os dados do dente em relação a posição do mouse na tela
         * 
         * @example 
         *   getInfoDentePosicaoatual(infoDentePosicaoAtual, 300, 255)
         * 
         * @param   {Object} infoDentePosicaoAtual   Parâmetro obrigatório
         * @param   {Number} x                       Parâmetro obrigatório
         * @param   {Number} y                       Parâmetro obrigatório
         * @returns {Object}
         */
        const getInfoDentePosicaoatual = (procedimento, x, y) => {
            if (y >= posicoesPadrao.posicaoYInicialDente && y <= posicoesPadrao.posicaoYInicialDente + tamanhoDente) {
                if (x >= posicoesPadrao.margemXEntreDentes && x <= posicoesPadrao.margemXEntreDentes + tamanhoDente) procedimento.numeroDente = getNumeroDentePorOrdemExibicao(1);
                else if (x >= (tamanhoDente + posicoesPadrao.margemXEntreDentes * 3) && x <= (30 * posicoesPadrao.margemXEntreDentes + 16 * tamanhoDente)) {
                    procedimento.indice = parseInt(x / (tamanhoDente + 2 * posicoesPadrao.margemXEntreDentes), 10);
                    ini = (procedimento.indice * tamanhoDente) + (2 * posicoesPadrao.margemXEntreDentes * procedimento.indice) + posicoesPadrao.margemXEntreDentes;
                    fin = ini + tamanhoDente;
                    if (x >= ini && x <= fin) {
                        procedimento.numeroDente = getNumeroDentePorOrdemExibicao(procedimento.indice + 1)
                    }
                }
            } else if (y >= (tamanhoDente + posicoesPadrao.margemYEntreDentes + posicoesPadrao.posicaoYInicialDente) && y <= (2 * tamanhoDente + posicoesPadrao.margemYEntreDentes + posicoesPadrao.posicaoYInicialDente)) {
                if (x >= posicoesPadrao.margemXEntreDentes && x <= posicoesPadrao.margemXEntreDentes + tamanhoDente) {
                    procedimento.numeroDente = getNumeroDentePorOrdemExibicao(17);
                } else if (x >= (tamanhoDente + posicoesPadrao.margemXEntreDentes * 3) && x <= (30 * posicoesPadrao.margemXEntreDentes + 16 * tamanhoDente)) {
                    procedimento.indice = parseInt(x / (tamanhoDente + 2 * posicoesPadrao.margemXEntreDentes), 10);
                    ini = (procedimento.indice * tamanhoDente) + (2 * posicoesPadrao.margemXEntreDentes * procedimento.indice) + posicoesPadrao.margemXEntreDentes;
                    fin = ini + tamanhoDente;
                    if (x >= ini && x <= fin) procedimento.numeroDente = getNumeroDentePorOrdemExibicao(procedimento.indice + 17)
                }
            }
    
            let px = x - ((procedimento.indice * tamanhoDente) + (2 * posicoesPadrao.margemXEntreDentes * procedimento.indice) + posicoesPadrao.margemXEntreDentes)
            let py = y - posicoesPadrao.posicaoYInicialDente
    
            if (getOrdemExibicaoPorNumeroDente(procedimento.numeroDente) > 16) py -= (posicoesPadrao.margemYEntreDentes + tamanhoDente)
    
            if (py > 0 && py < (tamanhoDente / 4) && px > py && py < tamanhoDente - px) {
                procedimento.faceDente = 1;
            } else if (px > (tamanhoDente / 4) * 3 && px < tamanhoDente && py < px && tamanhoDente - px < py) {
                procedimento.faceDente = 2;
            } else if (py > (tamanhoDente / 4) * 3 && py < tamanhoDente && px < py && px > tamanhoDente - py) {
                procedimento.faceDente = 3;
            } else if (px > 0 && px < (tamanhoDente / 4) && py > px && px < tamanhoDente - py) {
                procedimento.faceDente = 4;
            } else if (px > (tamanhoDente / 4) && px < (tamanhoDente / 4) * 3 && py > (tamanhoDente / 4) && py < (tamanhoDente / 4) * 3) {
                procedimento.faceDente = 5;
            }
    
            return procedimento
        }
    
        /**
         * Exibe todos os procedimentos adicionados nos respectivos dentes e faces
         */
        const exibeMarcacoes = () => {
            procedimentos.forEach(element => {
                pintarFace(contexto2, element, 'black', element.cor)
            });
        }
    
        /**
         * Redimensiona o canvas do pincel e seu conteúdo proporcionalmente ao tamanho da janela.
         */
        const resizeCanvasPincel = () => {
            camadaPincel.width = window.innerWidth - 25
            const altura = (camadaPincel.width * alturaTelaReferencia) / tamanhoTelaReferencia
            camadaPincel.height = altura
    
            const dataImage = localStorage.getItem('desenho')
    
            desenho = new Image();
            desenho.src = dataImage;
            desenho.onload = function() {
                contextoPincel.clearRect(0, 0, camadaPincel.width, camadaPincel.height)
                contextoPincel.drawImage(desenho, 0, 0, camadaPincel.width, camadaPincel.height);
            }
        }
    
        /**
         * Dá o start no odontograma, Desenhando a estrutura, carregando os dados, etc.
         */
        const iniciaOdontograma = () => {
            const options = itensProcedimento.map(problema => {
                return `\n<option value='${problema.nome}'>${problema.nome}</option>`
            })
            document.querySelector("#nomeProcedimento").innerHTML += options
    
            document.querySelector("#nomeProcedimento").addEventListener('change', (event) => {
                let procedimento = document.querySelector("#nomeProcedimento")
                if (procedimento.value !== '') {
                    procedimento = itensProcedimento.find(problemaAtual => problemaAtual.nome === procedimento.value)
                    document.querySelector("#cor").value = procedimento.cor
                    if (procedimento.nome === 'Outro') {
                        document.querySelector("#cor").disabled = false
                        document.getElementById("colOutroProcedimento").style.display = 'block'
                    } else {
                        document.querySelector("#cor").disabled = true
                        document.getElementById("colOutroProcedimento").style.display = 'none'
                    }
                } else {
                    document.querySelector("#cor").disabled = true
                    document.getElementById("colOutroProcedimento").style.display = 'none'
                }
            })
    
            document.querySelector("#nomeProcedimento").dispatchEvent(new Event('change'))
    
            document.querySelector("#botaoAdicionar").onclick = (event) => {
                procedimento.nome = document.querySelector("#nomeProcedimento").value
                procedimento.cor = document.querySelector("#cor").value
                procedimento.informacoesAdicionais = document.querySelector("#informacoesAdicionais").value
    
                procedimento.salvar()
    
                pintarFace(contexto2, procedimento, 'black', procedimento.cor)
                atualizaTabela()
            }
    
            procedimentos = storage.fetch()
    
            numeroDentes.superior.forEach((numero, index) => numeroDenteXOrdemExibicaoDente[numero] = index)
            numeroDentes.inferior.forEach((numero, index) => numeroDenteXOrdemExibicaoDente[numero] = index + 16)
    
            resizeCanvas()
            resizeCanvasPincel()
        }
    
        /**
         * Retorna a ordem de exibição do dente a partir de seu número.
         * 
         * @example 
         *   getOrdemExibicaoPorNumeroDente(17); // 2
         * 
         * @param   {Number} numero   Parâmetro obrigatório
         * @returns {Number}
         */
        const getOrdemExibicaoPorNumeroDente = (numero) => {
            return numeroDenteXOrdemExibicaoDente[numero] + 1
        }
    
        /**
         * Retorna o número do dente a partir de sua ordem de exibição.
         * 
         * @example 
         *   getNumeroDentePorOrdemExibicao(2); // 17
         * 
         * @param   {Number} ordem   Parâmetro obrigatório
         * @returns {Number}
         */
        const getNumeroDentePorOrdemExibicao = (ordem) => {
            return numeroDenteXOrdemExibicaoDente.indexOf(ordem - 1)
        }
    
        /**
         * Retorna Todos os procedimentos adicionados para o dente informado.
         * 
         * @example 
         *   getProcedimentosPorDente(17); // [{...}]
         * 
         * @param   {Number} numero   Parâmetro obrigatório
         * @returns {Array}
         */
        const getProcedimentosPorDente = (numero, face) => {
            return procedimentos.filter(procedimento => procedimento.numeroDente === numero && procedimento.faceDente === face)
        }
    
        window.addEventListener("resize", () => {
            resizeCanvas()
            resizeCanvasPincel()
        })
    
        iniciaOdontograma()
    })
    document.addEventListener('DOMContentLoaded', () => {
        const pincel = {
            ativo: false,
            movendo: false,
            origem: null,
            destino: {
                x: 0,
                y: 0
            },
            cor: '#000000',
            espessura: '2'
        }
    
        const borracha = {
            ativo: false,
            movendo: false,
            coordenadas: {
                x: 0,
                y: 0
            },
            espessura: '2'
        }
    
        const camadaPincel = document.querySelector('#camadaPincel')
        const contexto = camadaPincel.getContext('2d')
        const saveBtn = document.getElementById("saveBtn");
    
        const desenhaLinha = (linha) => {
            contexto.lineWidth = pincel.espessura
            contexto.strokeStyle = pincel.cor
            contexto.beginPath()
            contexto.moveTo(linha.origem.x, linha.origem.y)
            contexto.lineTo(linha.destino.x, linha.destino.y)
            contexto.stroke()
        }
    
        const apagar = (coordenadas) => {
            contexto.lineWidth = borracha.espessura
            contexto.clearRect(coordenadas.x - 7, coordenadas.y - 7, 15, 15);
        }
    
    
        document.querySelector("#mouse").addEventListener('change', function() {
            usaPincel()
        })
    
        document.querySelector("#pincel").addEventListener('change', function() {
            usaPincel()
        })
    
        document.querySelector("#borracha").addEventListener('change', function() {
            usaBorracha()
        })
    
        document.querySelector("#limparDesenho").addEventListener('click', function() {
            limparDesenhos()
        })
    
        const usaBorracha = () => {
            let ativo = false
            const usarBorracha = document.getElementById("borracha").checked
            if (usarBorracha) {
                document.querySelector("#camadaPincel").style.zIndex = "5"
                document.querySelector("#configBtn").disabled = false
                document.querySelector("#saveBtn").disabled = false
                ativo = true
            } else if (!document.getElementById("pincel").checked) {
                ativo = false
                document.querySelector("#camadaPincel").style.zIndex = "3"
                document.querySelector("#configBtn").disabled = true
            }
            return ativo
        }
    
        const usaPincel = () => {
            let ativo = false
            const usarPincel = document.getElementById("pincel").checked
            if (usarPincel) {
                document.querySelector("#camadaPincel").style.zIndex = "5"
                document.querySelector("#configBtn").disabled = false
                document.querySelector("#saveBtn").disabled = false
                ativo = true
            } else if (!document.getElementById("borracha").checked) {
                ativo = false
                document.querySelector("#configBtn").disabled = true
                document.querySelector("#camadaPincel").style.zIndex = "3"
            }
            return ativo
        }
    
        camadaPincel.onmousedown = () => {
            if (usaPincel()) {
                pincel.ativo = true
            } else if (usaBorracha()) {
                borracha.ativo = true
            }
        }
    
        camadaPincel.onmouseup = () => {
            pincel.ativo = false
            borracha.ativo = false
        }
    
        camadaPincel.onmousemove = (event) => {
            pincel.destino.x = event.clientX - camadaPincel.offsetLeft
            pincel.destino.y = event.clientY - camadaPincel.offsetTop
            pincel.movendo = true
    
            borracha.coordenadas.x = event.clientX - camadaPincel.offsetLeft
            borracha.coordenadas.y = event.clientY - camadaPincel.offsetTop
            borracha.movendo = true
        }
    
        saveBtn.onclick = (event) => {
            localStorage.setItem('desenho', camadaPincel.toDataURL())
        }
    
        const limparDesenhos = () => {
            contexto.clearRect(0, 0, camadaPincel.width, camadaPincel.height);
        }
    
        const ciclo = () => {
            if (pincel.ativo && pincel.movendo && pincel.origem) {
                desenhaLinha({
                    destino: pincel.destino,
                    origem: pincel.origem
                })
                pincel.movendo = false
            }
            pincel.origem = {
                ...pincel.destino
            }
            if (borracha.ativo && borracha.movendo && borracha.coordenadas) {
                apagar(borracha.coordenadas)
                borracha.movendo = false
            }
            setTimeout(ciclo, 0.1)
        }
        ciclo()
    
        document.querySelector("#tamanhoPincel").addEventListener('change', function() {
            if (usaBorracha()) borracha.espessura = document.querySelector("#tamanhoPincel").value
            else pincel.espessura = document.querySelector("#tamanhoPincel").value
        })
    
        document.querySelector("#corPincel").addEventListener('change', function() {
            pincel.cor = document.querySelector("#corPincel").value
        })
    
        document.querySelector("#tamanhoPincel").dispatchEvent(new Event('change'))
        document.querySelector("#corPincel").dispatchEvent(new Event('change'))
    })  --}}
$(document).ready(function() {
    $('#tabla_odontologico_tratamiento').DataTable({
       responsive: true,
   });
   mostrar_nuevas_imagenes_dent_periodoncica();
 });

 $(document).ready(function() {
    $('#tabla_odontologicos_pieza').DataTable({
       responsive: true,
   });
 });

 $(document).ready(function () {
     $('#tabla_aranceles').DataTable({
         responsive: true,
     });
 });
</script>
@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {

            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $('#descripcion_hipotesis').keyup(function(){
                if($.trim(this.value) != ''){
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
            });

            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** cronico */
            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });

            /** autocomplete de medicamentos patologia */
            $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            /** accion check confidencial */
            $('#confidencial').change(function() {
                if ($('#confidencial').is(':checked')) {
                    $('#confidencial_descripcion').show();
                } else {
                    $('#confidencial_descripcion').hide();
                }
            });

            /** accion check ges */
            $('#modal_ges').change(function() {
                if ($('#modal_ges').is(':checked')) {
                    $('#form_ges').modal('show');
                } else {
                    $('#form_ges').modal('hide');
                }
            });

            /** busqueda de diagnostico GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    return false;
                }
            });


        })

        /** MANEJO DE IMAGENES */
        var myDropzone ;
        Dropzone.options.misImagenes = {
            init:function()
            {
                myDropzone = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

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
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes();

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
                cargar_lista_imagenes();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };



        var lista_imagenes = [];
        function cargar_lista_imagenes()
        {
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes = [];
            let temp  = myDropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var img_temp = JSON.parse(value.xhr.response);
                        lista_imagenes[index] = [
                            url=img_temp.img.url,
                            nombre_origian= img_temp.img.original_file_name,
                            nombre_img = img_temp.img.nombre_img,
                            file_extension = img_temp.img.file_extension,
                        ];
                        $('#input_lista_imagenes').val('');
                        $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                    }
                }
            });


        }
        $('#mensaje_ficha').html(' Para el mejor funcionamiento del sistema rogamos anotar cualquier tipo de incidente o antecedente nuevo del paciente esto aportará a usted o sus colegas mayor información  acerca del paciente a tratar ');
        $('#mensaje_ficha').show();
        setTimeout(function(){
            $('#mensaje_ficha').hide();
        }, 8000);
        /** MANEJO DE IMAGENES */

        /** REGISTO ANTECEDENTES */
        function carga_campos_antecedente_nuevo()
        {
            if($('#tipo_antecedente').val()!='')
            {
                $('#div_campos_antecedente_nuevo').html('');
                var html = '';
                if($('#tipo_antecedente').val() == 'alergia')
                {
                    html +='';

                    html += '<div class="form-row">';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                    html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                    html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Detalle</label>';
                    html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
                    html += '    </div>';
                    html += '</div>';

                    $('#div_campos_antecedente_nuevo').show();
                    $('#div_campos_antecedente_nuevo').html(html);

                     /** autocompletado de alergias */
                    $("#alergia_paciente").autocomplete({
                        source: function(request, response) {
                            // Fetch data
                            $.ajax({
                                url: "{{ route('alergias.ver_autocomplete') }}",
                                type: 'get',
                                dataType: "json",
                                data: {
                                    search: request.term
                                },
                                success: function(data) {
                                    console.log(data);
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            // Set selection
                            $('#alergia_paciente').val(ui.item.label); // display the selected text
                            $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                            return false;
                        }
                    });

                }
                if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'anestesias')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'cirugia')
                {
                    html +='';
                }
            }
            else
            {
                $('#div_campos_antecedente_nuevo').hide();
                $('#div_campos_antecedente_nuevo').html('');
            }
        }

        function agregar_alergia_paciente() {

            let alergia = $('#alergia_paciente').val();
            let id_alergia = $('#id_alergia_paciente').val();
            let comentario = $('#alergia_comentario_paciente').val();
            let paciente = $('#id_paciente_fc').val();
            let token = CSRF_TOKEN;
            var mensaje = '';
            var valido = 0;

            if(alergia=="")
            {
                mensaje +='Campo requerido alergia\n';
                valido = 1;
            }
            // if(id_alergia=="")
            // {
            //     mensaje +='Campo requerido id alergia\n';
            //     valido = 1;
            // }
            if(comentario=="")
            {
                mensaje +='Campo requerido Detalle\n';
                valido = 1;
            }
            if(paciente=="")
            {
                mensaje +='Campo requerido paciente\n';
                valido = 1;
            }

            if(valido == 0)
            {
                swal({
                    title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                    icon: "success",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
            else
            {
                swal({
                    title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }


            // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     dataType: 'json',
            //     data: {
            //         _token: CSRF_TOKEN,
            //         alergia: alergia,
            //         id_alergia: id_alergia,
            //         comentario: comentario,
            //         paciente: paciente
            //     },
            // })
            // .done(function(response) {

            //     if (response.success) {
            //         swal({
            //             title: "Alergia agregada correctamente",
            //             icon: "success",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         });

            //         $('#alergia_paciente').val('');
            //         $('#id_alergia_paciente').val('');

            //     }
            //     else
            //     {
            //         swal({
            //             title: "Error al agregar alergia",
            //             icon: "error",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         })
            //     }

            //     return response;
            // })
            // .fail(function() {
            //     console.log("error");
            // });

        }
        /** FIN REGISTRO ANTECEDENTES  */


        function cargarIgual(input)
        {

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });

            // let actual = $('#'+input);
            // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            // equivalente.val(actual.val());

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

        function abrir_modal_guardar_tipo()
        {
            $('#modal_registrar_ficha_tipo_orl').modal('show');
            cargarSeccion('registro_f_t_orl_detalle');
        }

        function cargarSeccion(div_destino)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){


                html ='';

                // if(seccion_previa == '' && seccion_actual == '')
                if(key == 0)
                {
                    seccion_actual = $(elemento).data('seccion').trim();
                    seccion_previa = $(elemento).data('seccion').trim();

                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }
                else
                {
                    if($(elemento).data('seccion'))
                    seccion_actual = $(elemento).data('seccion').trim();
                }

                if(seccion_actual == seccion_previa)
                {
                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }

                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-5">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                    html +='<div class="col-md-2"></div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    if($(elemento).data('tipo'))
                        html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    else
                        html +='<div class="col-md-5">Detalle</div>';
                    html +='<div class="col-md-5">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';

                }
                html +='</div>';
                $('#'+div_destino).append(html);
                seccion_previa = $(elemento).data('seccion');
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea)
        {
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }



        function agregar_medicamentos_ficha() {


            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                    rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos').val(JSON.stringify(rows1));


        }

        function agregar_examenes_ficha() {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));
        }

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        // $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

        /** CRONICO */
        function getDosis_cronico(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#'+div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function getCantCompCronica(div_dosis, div_comp) {

            var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
            console.log(cant_comp);

            let url = "{{ route('presentacion.getCantComp') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        cant_comp: cant_comp,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let select_cant_comp = $('#'+div_comp);

                        select_cant_comp.find('option').remove();
                        select_cant_comp.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                        })
                        select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function es_cronico() {
            if ($('#enf_cronico').prop('checked')) {
                $('#form_enfermedad_cronica').modal('show');
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#cronicos').val('n_C');
                ver_medicamento_cronico();
                $('.medicamento_cronico_div').show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');

                cambiar_enfermedad_cronica();

            }

        }

        function cambiar_enfermedad_cronica() {

            if($('#cronicos').val() != 'n_C')
            {
                var nombre_enfermedad = $("#cronicos option:selected").text();
                $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
                $('.medicamento_patologia').show();
                $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
                ver_medicamento_cronico_patologia();

                $('.medicamento_cronico_div').hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');

                switch ($('#cronicos').val()) {
                    case 'cpeso':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').show();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'chipertension':
                        $('#hipertension_div').show();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        ver_control_hipertension();

                    break;
                    case 'cdiabet':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').show();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;

                    case 'cinsufren':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').show();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'cmtumorales':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').show();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'creumato':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').show();
                        $('#clitemia').hide();
                    break;
                    case 'clitemia':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').show();
                    break;

                    default:
                        break;
                }
            }
            else
            {
                $('.medicamento_patologia').hide();
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#titulo_med_patologia').html( 'Medicamentos' );
            }
        }

        function registrar_control_obesidad() {

            let peso = $('#registro_peso').val();
            let variacion = $('#registro_peso_variacion').val();
            let ideal = $('#registro_peso_ideal').val();
            let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
            let hora_medica = $('#hora_medica').val();
            var validar = 0;
            var mensaje ='';

            if( peso == '' )
            {
                $('#registro_peso').focus();
                mensaje += 'Debe ingresar el Peso del Control Actual.\n';
                validar = 1;
            }
            if( variacion == '' )
            {
                $('#registro_peso_variacion').focus();
                mensaje += 'Debe ingresar la Variación.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#registro_peso_ideal').focus();
                mensaje += 'Debe ingresar el Peso Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        variacion: variacion,
                        ideal: ideal,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        {{--  location.reload();  --}}
                        $('#registro_peso').val('');
                        $('#registro_peso_variacion').val('');
                        $('#registro_peso_ideal').val('');
                        ver_control_obesidad();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_hipertension() {

            let sistolica = $('#presion_sistolica_hipertension').val();
            let diastolica = $('#presion_diastolica_hipertension').val();
            let ideal = $('#ideal_hipertension').val();
            let url = "{{ route('ficha_medica.registrar_hipertension') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            var validar = 0;
            var mensaje ='';

            if( sistolica == '' )
            {
                $('#presion_sistolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Sistólica.\n';
                validar = 1;
            }
            if( diastolica == '' )
            {
                $('#presion_diastolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Diastólica.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#ideal_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        sistolica: sistolica,
                        diastolica: diastolica,
                        ideal: ideal,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        $('#presion_sistolica_hipertension').val('');
                        $('#presion_diastolica_hipertension').val('');
                        $('#ideal_hipertension').val('');
                        ver_control_hipertension();

                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_diabetes() {

            let peso = $('#peso_diabetes').val();
            let pies = $('#pies_diabetes').val();
            let hgac1 = $('#hga1c_diabetes').val();
            let colesterol = $('#colesterol_diabetes').val();
            let creatina = $('#creatina_diabetes').val();
            let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
            let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
            let url = "{{ route('ficha_medica.registrar_diabetes') }}";
            let hora_medica = $('#hora_medica').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        pies: pies,
                        hgac1: hgac1,
                        colesterol: colesterol,
                        creatina: creatina,
                        glicosilada_postprandial: glicosilada_postprandial,
                        glicosinada_ayuno: glicosinada_ayuno,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function agregar_medicamento_cronico()
        {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron').val();
            var id_medicamento = $('#id_medicamentocron').val();
            var cantidad = $('#med_cronicomes option:selected').text()
            var tipo_enfermedad = 'cronico';

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    id_medicamento:id_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
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
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron').val('');

                        $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico();


                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
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

        function ver_medicamento_cronico()
        {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:'cronico'
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
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_medicamento_cronico').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico(id)
        {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id =id;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
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
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico();
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
        function agregar_medicamento_cronico_patologia(tipo)
        {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
            var cantidad = $('#med_cronicomes_patologia option:selected').text();
            var tipo_enfermedad = tipo;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
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
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron_patologia').val('');
                        $('#id_medicamentocron_patologia').val('');

                        $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico_patologia()
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
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

        function ver_medicamento_cronico_patologia()
        {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var tipo_enfermedad = $('#cronicos').val();
            $('#tabla_med_patologia').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:tipo_enfermedad
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
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_med_patologia').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico_patologia(id)
        {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id =id;
            var tipo_enfermedad = $('#cronicos').val();

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
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
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico_patologia(tipo_enfermedad);
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }


        {{--  mostrar div   --}}
        function mostrar_div(div)
        {
            if ($('.'+div).is(':visible')) {
                $('.'+div).hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');
            } else {
                $('.'+div).show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');
            }
        }


        {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
        function ver_control_hipertension()
        {

            let url = "{{ route('hipertension.getHipertension') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '         <th class="text-center align-middle">Nº Control</th>';
                    html += '         <th class="text-center align-middle">Fecha</th>';
                    html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                    html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                    html += '         <th class="text-center align-middle">Presión Ideal</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_hipertension').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
        function ver_control_obesidad()
        {

            let url = "{{ route('control_obesidad.getControlObesidad') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_obesidad').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '    <th class="text-center align-middle">Nº Control</th>';
                    html += '    <th class="text-center align-middle">Fecha</th>';
                    html += '    <th class="text-center align-middle">Peso</th>';
                    html += '    <th class="text-center align-middle">Variación</th>';
                    html += '    <th class="text-center align-middle">Peso Ideal</th>';
                    html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                    html += '</tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                            html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_obesidad').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
        /** FIN CRONICO */

        /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen)
        {
            if(tipo_examen!='')
            {
                var array_datos = {};
                $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                    array_datos[element.id] = element.value;
                });

                var imagenes = $('#input_lista_imagenes').val();
                if(imagenes != '')
                {
                    imagenes = JSON.stringify(imagenes);
                }

                var data ='id_ficha='+$('#id_fc').val()+'&contenido='+JSON.stringify(array_datos)+'&imagenes='+imagenes;
                Fancybox.show(
                    [
                        {
                        src: '{{ route("pdf.visualizar.examen") }}?'+data,
                        type: "iframe",
                        preload: false,
                        },
                    ]
                );
            }
            else
            {
                console.log('tipo examen no especificado');
            }
        }
        function dame_info_pieza() {
            let pieza = $('#historia_pza').val();
            console.log(pieza);
            let url ="{{ route('dental.dame_pieza') }}";
            let id_paciente = dame_id_paciente();
            if(id_paciente == '' || id_paciente == null){
                id_paciente = $('#id_paciente').val();
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    pieza: pieza,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function(){
                    swal({
                        title:'info',
                        text:'Cargando ...',
                        icon:'info'
                    });
                },
                success: function (response)  {
                    swal.close();
                    console.log(response);
                    // Mapea los datos si los nombres de las claves no coinciden
                    const tipoExamenMap = {
                        1: 'Gral',
                        2: 'Endodoncia',
                        3: 'Odontopediatría' // Ejemplo adicional
                    };
                // Mapea los datos si los nombres de las claves no coinciden
                const data = response.map(item => ({
                    fecha: item.fecha || 'N/A', // Asigna valor por defecto si falta
                    diagnostico:  item.diagnostico ? item.diagnostico : 'N/A',
                    tratamiento:  item.tratamiento ? item.tratamiento : 'N/A',
                    tipo_examen: tipoExamenMap[item.tipo_examen] || 'Otro',
                    caras: item.diagnosticocaras || 'N/A',
                    responsable: item.profesional || 'N/A',
                    estado: item.diagnostico.estado == 1 ? 'TERMINADO' : 'EN ESPERA'
                }));

                // Inicializa o actualiza la tabla
                $('#historia_odontograma_pieza').DataTable({
                    destroy: true,
                    data: data,
                    columns: [
                        { data: 'fecha' },
                        { data: 'diagnostico' },
                        { data: 'tratamiento' },
                        { data: 'tipo_examen' },
                        { data: 'caras' },
                        { data: 'responsable' },
                        { data: 'estado' }
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    }
                });
                mostrar_nueva_pieza_dental_tto(pieza);
            },
            })

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

        var contador = 0;
        var piezas_buscadas = new Set();

function mostrar_nueva_pieza_dental_tto(pieza){
    // Verificar si la pieza ya fue buscada
    // if (piezas_buscadas.has(pieza)) {
    //     console.log("La pieza ya ha sido buscada.");
    //     return; // Salir de la función si la pieza ya está en el set
    // }

    // Agregar la pieza al set de piezas buscadas
    // piezas_buscadas.add(pieza);

    contador++;
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            pieza: pieza,
            seccion:'impl',
            counter: contador,
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


function mostrar_nueva_pieza_dental_tto_period(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            seccion:'period',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_pieza_plan_implante').empty();
            $('#contenedor_pieza_plan_implante').append(resp.v);
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
    </script>
@endsection
