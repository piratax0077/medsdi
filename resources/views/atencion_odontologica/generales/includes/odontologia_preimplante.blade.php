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
                                    <a class="nav-link-aten text-reset" id="estudio_rx_tab" data-toggle="tab" href="#estudio_rx" role="tab" aria-controls="estudio_rx" aria-selected="true">Estudio radiológico</a>
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
                                    <div class="form-row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 col-xxl-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="antec_med_tab" data-toggle="tab" href="#antec_med" role="tab" aria-controls="antec_med" aria-selected="true">Antecedentes Médicos</a>
                                                <a class="nav-link-aten text-reset" id="antec_dent_tab" data-toggle="tab" href="#antec_dent" role="tab" aria-controls="antec_dent" aria-selected="false">Antecedentes dentales</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 col-xxl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--ANT.GENERALES-->
                                                <div class="tab-pane fade show active" id="antec_med" role="tabpanel" aria-labelledby="antec_med_tab">
                                                    <div class="form-row mt-2">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="tit-gen">Antecedentes Generales</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        {{-- Tratamientos en curso --}}
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                            <div class="card border-card-primary h-100">
                                                                <div class="card-body">
                                                                    <ul>
                                                                        <li class="f-14 text-c-blue"><strong>Tratamientos en curso</strong></li>
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
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                            <div class="card border-card-primary h-100">
                                                                <div class="card-body">
                                                                    <ul>
                                                                        <li class="f-14 text-c-blue"><strong>Medicamentos crónicos</strong></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Cirugías recientes --}}
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                            <div class="card border-card-primary h-100">
                                                                <div class="card-body-aten-a">
                                                                    <ul>
                                                                        <li class="f-14 text-c-blue"><strong>Cirugías recientes</strong></li>
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
                                                        {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3  mb-3"> --}}
                                                            {{-- <div class="card border-card-primary h-100"> --}}
                                                                {{-- <div class="card-body"> --}}
                                                                    {{-- <ul> --}}
                                                                        {{-- <li class="f-14 text-c-blue"><strong>Medicamentos recientes</strong></li> --}}
                                                                        {{-- <li>No hay registros</li> --}}
                                                                    {{-- </ul> --}}
                                                                {{-- </div> --}}
                                                            {{-- </div> --}}
                                                        {{-- </div> --}}

                                                        {{-- Prótesis y ortesis --}}
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3  mb-3">
                                                            <div class="card border-card-primary h-100">
                                                                <div class="card-body">
                                                                    <ul>
                                                                        <li class="f-14 text-c-blue"><strong>Prótesis y ortesis</strong></li>
                                                                        <li>No hay registros</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--TABLA ANT. DENTALES-->
                                                <div class="tab-pane fade show" id="antec_dent" role="tabpanel" aria-labelledby="antec_dent_tab">
                                                    <div class="form-row mt-2">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="tit-gen">Antecedentes Dentales</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div id="contenedor_pieza_dental_endorx">
                                                                        <div id="pieza_dentalrx" class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset active" id="anestesia-ant-tab" data-toggle="tab" href="#anestesia-ant" role="tab" aria-controls="anestesia-ant" aria-selected="false">Anestesias</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="hemorragia-ant-tab" data-toggle="tab" href="#hemorragia-ant" role="tab" aria-controls="hemorragia-ant" aria-selected="true">Hemorragia</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="fractura-ant-tab" data-toggle="tab" href="#fractura-ant" role="tab" aria-controls="fractura-ant" aria-selected="true">Fractura</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="tab-content" id="impl">
                                                                                    <!--ANESTESIA-->
                                                                                    <div class="tab-pane fade show active" id="anestesia-ant" role="tabpanel" aria-labelledby="anestesia-ant-tab">
                                                                                        <div class="form-row mt-2">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="sub-aten">Anestesias</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="table-responsive">
                                                                                                    <table id="table_antecedentes_unificada" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th class="align-middle">Fecha</th>
                                                                                                                <th class="align-middle">Procedimiento</th>
                                                                                                                <th class="align-middle">Responsable</th>
                                                                                                                <th class="align-middle">Comentarios</th>
                                                                                                            </tr>
                                                                                                        </thead>

                                                                                                        <!-- Sección Anestesia -->
                                                                                                        <tbody id="tbody_anestesia">
                                                                                                            @if (isset($antecedentes))
                                                                                                                @foreach ($antecedentes as $antecedente)
                                                                                                                    @if ($antecedente->id_tipo_antecedente == 1 && $antecedente->estado == 1)
                                                                                                                        <tr>
                                                                                                                            <td class="align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                            <td class="align-middle text-wrap">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                            <td class="align-middle">
                                                                                                                                {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                            </td>
                                                                                                                            <td class="align-middle text-wrap">{{ $antecedente->comentario }}</td>
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
                                                                                    <!--HEMORRAGIA-->
                                                                                    <div class="tab-pane fade show" id="hemorragia-ant" role="tabpanel" aria-labelledby="hemorragia-ant-tab">
                                                                                        <div class="form-row mt-2">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="sub-aten">Hemorragias</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="table-responsive">
                                                                                                    <table id="table_antecedentes_unificada" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th class="align-middle">Fecha</th>
                                                                                                                <th class="align-middle">Procedimiento</th>
                                                                                                                <th class="align-middle">Responsable</th>
                                                                                                                <th class="align-middle">Comentarios</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <!-- Sección Hemorragias -->
                                                                                                        <tbody id="tbody_hemorragias">
                                                                                                            @if (isset($antecedentes))
                                                                                                                @foreach ($antecedentes as $antecedente)
                                                                                                                    @if ($antecedente->id_tipo_antecedente == 4 && $antecedente->estado == 1)
                                                                                                                        <tr>
                                                                                                                            <td class="align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                            <td class="align-middle text-wrap">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                            <td class="align-middle">
                                                                                                                                {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                            </td>
                                                                                                                            <td class="align-middle text-wrap">{{ $antecedente->comentario }}</td>
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
                                                                                    <!--FRACTURA-->
                                                                                    <div class="tab-pane fade show" id="fractura-ant" role="tabpanel" aria-labelledby="fractura-ant-tab">
                                                                                        <div class="form-row mt-2">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="sub-aten">Fracturas</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="table-responsive">
                                                                                                    <table id="table_antecedentes_unificada" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th class="align-middle">Fecha</th>
                                                                                                                <th class="align-middle">Procedimiento</th>
                                                                                                                <th class="align-middle">Responsable</th>
                                                                                                                <th class="align-middle">Comentarios</th>
                                                                                                            </tr>
                                                                                                        </thead>

                                                                                                        <!-- Sección Fracturas -->
                                                                                                        <tbody id="tbody_fracturas">
                                                                                                            @if (isset($antecedentes))
                                                                                                                @foreach ($antecedentes as $antecedente)
                                                                                                                    @if ($antecedente->id_tipo_antecedente == 9 && $antecedente->estado == 1)
                                                                                                                        <tr>
                                                                                                                            <td class="align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                            <td class="align-middle text-wrap">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                            <td class="align-middle">
                                                                                                                                {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                            </td>
                                                                                                                            <td class="align-middle text-wrap">{{ $antecedente->comentario }}</td>
                                                                                                                        </tr>
                                                                                                                    @endif
                                                                                                                @endforeach
                                                                                                            @endif
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
                                        <!--<div class="form-row mt-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="tit-gen">Historia de la pieza</h6>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                        <div id="hist_piezas" class="row">
                                                            {{-- @php $count_hist = 1; @endphp
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
                                                                            <label class="floating-label-activo-sm">Obs. Pérdida</label>
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
                                                            @endforeach --}}
                                                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mt-3">




                                                                <div class="input-group mb-3">
                                                                <label class="floating-label-activo-sm">Historia de la pieza N°</label>
                                                                    <input type="text" class="form-control form-control-sm"  aria-label="Recipient's username"  name="historia_pza" id="historia_pza" value="" >
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-info btn-sm" type="button"  onclick="dame_info_pieza()"><i class="fas fa-search"></i></button>
                                                                    </div>
                                                                    </div>



                                                            </div>
                                                            <div class="col-md-12">
                                                            <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="display table table-striped dt-responsive nowrap table-xs" id="historia_odontograma_pieza">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle">Fecha</th>
                                                                                <th class="align-middle">Diagnóstico</th>
                                                                                <th class="align-middle">Tratamiento</th>
                                                                                <th class="align-middle">Tipo especialidad</th>
                                                                                <th class="align-middle">Caras</th>
                                                                                <th class="align-middle">Responsable de atención</th>
                                                                                <th class="align-middle">Estado</th>
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




                                        {{-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <div id="contenedor_piezas_hist"></div>
                                                        <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist({{ $count_hist }},'impl')"><i class="fas fa-save"></i> Mostrar nueva pieza</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

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
                                                                            <div class="col-md-10">
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
                                                                            <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                    <label for="numero_pieza_ex_impl{{ $count }}" class="floating-label-activo-sm">N° Pieza</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="numero_pieza_ex_impl{{ $count }}" value="{{ $imagen->numero_pieza }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="observaciones_ex_impl{{$count}}" class="floating-label-activo-sm">Observaciones</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm mb-9" id="observaciones_ex_impl{{$count}}" name="observaciones_ex_impl{{ $count }}" onfocus="this.rows=4" onblur="this.rows=1;">{{ $imagen->observaciones_ex }}</textarea>
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
                                            <div class="col-sm-4 mt-2" >
                                                <div class="form-group fill">

                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia{{ $count }}" name="biopsia_check_implantologia{{ $count }}" value="" {{ $imagen->biopsia == 1 ? 'checked' : '' }} >
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
                                    <div class="form-row mt-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">Planificación del tratamiento</h6>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <!--SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                   <h6 class="text-uppercase text-c-blue">Seleccione por pieza o grupo de piezas</h6>
                                                </div>
                                                <div class="card-body">
                                                        <div class="row my-2">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                                <label class="custom-control-label" for="customSwitch1">Seleccione maxilar superior</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                                                <label class="custom-control-label" for="customSwitch2">Seleccione maxilar inferior</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                                            @include('atencion_odontologica.generales.odontograma_adulto_grupos')
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 mt-2">
                                                            <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label for="" class="floating-label-activo-sm">Grupos</label>
                                                                <select class="js-example-basic-multiple" name="paciente_piezas_dentales_ex" id="paciente_piezas_dentales_ex" multiple="multiple">
                                                                    <option value="1.1">1.1</option>
                                                                    <option value="1.2">1.2</option>
                                                                    <option value="1.3">1.3</option>
                                                                    <option value="1.4">1.4</option>
                                                                    <option value="1.5">1.5</option>
                                                                    <option value="1.6">1.6</option>
                                                                    <option value="1.7">1.7</option>
                                                                    <option value="1.8">1.8</option>
                                                                    <option value="2.1">2.1</option>
                                                                    <option value="2.2">2.2</option>
                                                                    <option value="2.3">2.3</option>
                                                                    <option value="2.4">2.4</option>
                                                                    <option value="2.5">2.5</option>
                                                                    <option value="2.6">2.6</option>
                                                                    <option value="2.7">2.7</option>
                                                                    <option value="2.8">2.8</option>
                                                                    <option value="3.1">3.1</option>
                                                                    <option value="3.2">3.2</option>
                                                                    <option value="3.3">3.3</option>
                                                                    <option value="3.4">3.4</option>
                                                                    <option value="3.5">3.5</option>
                                                                    <option value="3.6">3.6</option>
                                                                    <option value="3.7">3.7</option>
                                                                    <option value="3.8">3.8</option>
                                                                    <option value="4.1">4.1</option>
                                                                    <option value="4.2">4.2</option>
                                                                    <option value="4.3">4.3</option>
                                                                    <option value="4.4">4.4</option>
                                                                    <option value="4.5">4.5</option>
                                                                    <option value="4.6">4.6</option>
                                                                    <option value="4.7">4.7</option>
                                                                    <option value="4.8">4.8</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tratamiento</label>
                                                                <input type="text" name="diag_presupuesto_pieza_g" id="diag_presupuesto_pieza_g" placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS" class="form-control form-control-sm tratamiento-autocomplete ui-autocomplete-input" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="cargar_a_presupuesto_impl_g()"><i class="feather icon-save"></i> Guardar piezas</button>
                                                        </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!--<div class="form-row my-2">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="floating-label-activo-sm">Grupos</label>
                                                                <select class="js-example-basic-multiple" name="paciente_piezas_dentales_ex" id="paciente_piezas_dentales_ex" multiple="multiple">
                                                                    <option value="1.1">1.1</option>
                                                                    <option value="1.2">1.2</option>
                                                                    <option value="1.3">1.3</option>
                                                                    <option value="1.4">1.4</option>
                                                                    <option value="1.5">1.5</option>
                                                                    <option value="1.6">1.6</option>
                                                                    <option value="1.7">1.7</option>
                                                                    <option value="1.8">1.8</option>
                                                                    <option value="2.1">2.1</option>
                                                                    <option value="2.2">2.2</option>
                                                                    <option value="2.3">2.3</option>
                                                                    <option value="2.4">2.4</option>
                                                                    <option value="2.5">2.5</option>
                                                                    <option value="2.6">2.6</option>
                                                                    <option value="2.7">2.7</option>
                                                                    <option value="2.8">2.8</option>
                                                                    <option value="3.1">3.1</option>
                                                                    <option value="3.2">3.2</option>
                                                                    <option value="3.3">3.3</option>
                                                                    <option value="3.4">3.4</option>
                                                                    <option value="3.5">3.5</option>
                                                                    <option value="3.6">3.6</option>
                                                                    <option value="3.7">3.7</option>
                                                                    <option value="3.8">3.8</option>
                                                                    <option value="4.1">4.1</option>
                                                                    <option value="4.2">4.2</option>
                                                                    <option value="4.3">4.3</option>
                                                                    <option value="4.4">4.4</option>
                                                                    <option value="4.5">4.5</option>
                                                                    <option value="4.6">4.6</option>
                                                                    <option value="4.7">4.7</option>
                                                                    <option value="4.8">4.8</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tratamiento</label>
                                                                <input type="text" name="diag_presupuesto_pieza_g" id="diag_presupuesto_pieza_g" placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS" class="form-control form-control-sm tratamiento-autocomplete ui-autocomplete-input" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="cargar_a_presupuesto_impl_g()"><i class="feather icon-save"></i> Guardar piezas</button>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue">Tratamientos en piezas o grupos</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="table-responsive">
                                                                <table id="#" class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>Pieza o Grupo</td>
                                                                            <td>Tratamiento</td>
                                                                            <td>Valor</td>
                                                                            <td>Accion</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-icon btn-primary"><i class="feather icon-save"></i></button>
                                                                                <button type="button" class="btn btn-icon btn-danger"><i class="feather icon-x"></i></button>
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
                                         <!--TABLA INSUMOS-->
                                         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue d-inline">Insumos</h6>
                                                    <button type="button" class="btn btn-info btn-xxs float-md-right d-inline d-inline"  onclick="abrir_modal_insumos()"><i class="fas fa-plus"></i> Agregar Insumos</button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="table-responsive">
                                                                <table id="table_insumos_preimplante" class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>Insumo</td>
                                                                            <td>Cantidad</td>
                                                                            <td>Valor</td>
                                                                            <td>Total</td>
                                                                            <td>Acciones</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($insumos_tratamientos as $t)
                                                                            @php $total = $t->cantidad * $t->valor @endphp
                                                                            <tr>
                                                                                <td>{{ $t->insumos }} {{ $t->nombre_marca }}</td>
                                                                                <td>{{ $t->cantidad }}</td>
                                                                                <td>{{ number_format($t->valor)  }}</td>
                                                                                <td>{{ number_format($total)  }}</td>
                                                                                <td>
                                                                                    @if($t->presupuesto == 0 || $t->presupuesto == null)
                                                                                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo({{ $t->id }})"><i class="feather icon-save"></i></button>
                                                                                    @else
                                                                                    <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo({{ $t->id }})"><i class="fas fa-minus"></i></button>
                                                                                    @endif
                                                                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo({{ $t->id }})"><i class="feather icon-x"></i></button>
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
@include('atencion_odontologica.modals.odontograma.modal_insumos')
<script>
    function abrir_modal_insumos(){
        $('#modal_insumos').modal('show');
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cantidadInput = document.getElementById("cantidad");
        const precioInput = document.getElementById("precio");
        const totalInput = document.getElementById("total");

        // Calcula el total automáticamente cuando se ingresan datos
        function calcularTotal() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precio = parseFloat(precioInput.value) || 0;
            totalInput.value = (cantidad * precio).toFixed(2);
        }

        cantidadInput.addEventListener("input", calcularTotal);
        precioInput.addEventListener("input", calcularTotal);

    });

    function guardar_insumo(){
        let nombreInsumo = $('#nombreInsumo option:selected').text();
        let tipoInsumo = $('#tipoInsumo').val();
        if(tipoInsumo == 1){
            var marcaInsumo = $('#marcasImplantes option:selected').text();
        }else{
            var marcaInsumo = '';
        }
        var idMarcaInsumo = $('#marcasImplantes').val();
        console.log(idMarcaInsumo);
        let tipoInsumo_text = $('#tipoInsumo option:selected').text();
        let cantidad = $('#cantidad').val();
        let precio = $('#precio').val();
        let total = $('#total').val();

        console.log(tipoInsumo);

        let mensaje = '';
        let valido = 1;

        if(nombreInsumo == ''){
            valido = 0;
            mensaje += '<li>Nombre insumo </li>';
        }
        if(tipoInsumo == 0){
            valido = 0;
            mensaje += '<li>Tipo de Insumo </li>';
        }
        if(cantidad == '' || cantidad <= 0){
            valido = 0;
            mensaje += '<li>Cantidad </li>';
        }
        if(precio == '' || cantidad <= 0){
            valido = 0;
            mensaje += '<li>Precio </li>';
        }

        if(valido == 1){
            let data = {
                insumos: nombreInsumo,
                idTipoInsumo: tipoInsumo,
                tipoInsumo: tipoInsumo_text,
                marcaInsumo: marcaInsumo,
                idMarcaInsumo: idMarcaInsumo,
                cantidad: cantidad,
                valor: precio,
                total: total,
                id_paciente: dame_id_paciente(),
                id_ficha_atencion: $('#id_fc').val(),
                _token: CSRF_TOKEN
            }

            console.log(data);
            let url = '{{ ROUTE("dental.agregar_insumos_tto") }}';
            $.ajax({
                url: url,
                type:'post',
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.mensaje == 'ok'){
                        swal({
                            icon:'success',
                            text:'Se a agregado los insumos correctamente',
                            title:'Exito'
                        });
                        let nuevo_insumo = resp.insumo;
                        cargar_a_presupuesto_insumo(nuevo_insumo.id);
                        $('#modal_insumos').modal('hide');
                        //limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_preimplante').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();



                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                                                 // Botones de acción
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>`;
                            }
                            table.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
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
        }



    }


    function eliminar_insumo(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el insumo dental?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_insumo(id);
            }
        });
    }

    function confirmar_eliminar_insumo(id){
        console.log(id);
        let data = {
            id: id,
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        }
        let url = '{{ ROUTE("dental.eliminar_insumos_tto") }}';
        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'ok'){
                    swal({
                        icon:'success',
                        text:'Se a eliminado insumos correctamente',
                        title:'Exito'
                    });
                    let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#subtotal_presup').val(formatoMoneda);
                        $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));
                            $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                    let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_preimplante').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>`;
                            }
                            table.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();

                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1){
                                let total = insumo.cantidad * insumo.valor;
                                $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-center">

                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            }

                        });

                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 1){
                                if(insumo.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(insumo.estado_pago == 'intermedio'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }
                                let rowNode = table_insumos.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.cantidad,         // Nombre del insumo
                                formatoMoneda(insumo.valor),       // Cantidad utilizada
                                0,         // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle '+clase+'"></div>',
                                ''

                            ]).draw(false).node();
                             // Agregar clases a la fila
                             $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        table_insumos.draw();

                        $('#table_pagos_reasignar_insumos tbody').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1){
                                let total = insumo.cantidad * insumo.valor;
                                $('#table_pagos_reasignar_insumos tbody').append(`
                                <tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                    <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                    <td>${insumo.cantidad}</td>
                                    <td>${formatoMoneda(insumo.valor)}</td>
                                    <td>${formatoMoneda(total)}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            }

                        });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function cargar_a_presupuesto_insumo(id){
        let data = {
            id: id,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: dame_id_paciente(),
            tipo:'insumo',
            _token: CSRF_TOKEN
        }

        let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto') }}";
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.status == 1){
                        swal({
                            icon:'success',
                            title:'Info',
                            text: resp.mensaje
                        });
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#subtotal_presup').val(formatoMoneda(total_general));
                        $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));
                            $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));
                            //limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_preimplante').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            console.log(insumo);
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>`;
                            }

                            table.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();

                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1){
                                let total = insumo.cantidad * insumo.valor;
                                $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-center">

                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            }

                        });

                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 1){
                                if(insumo.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(insumo.estado_pago == 'intermedio'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }
                                let rowNode = table_insumos.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.cantidad,         // Nombre del insumo
                                formatoMoneda(insumo.valor),       // Cantidad utilizada
                                0,         // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle '+clase+'"></div>',
                                ''

                            ]).draw(false).node();
                             // Agregar clases a la fila
                             $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        $('#tratamiento_presupuesto tbody').empty();
                        let presupuesto = resp.presupuesto;
                        console.log(presupuesto);
                        $('#tratamiento_presupuesto tbody').append(`
                        <tr>
                            <td class="text-center align-middle">${presupuesto.fecha}</td>
                            <td class="text-center align-middle">${presupuesto.id}</td>
                            <td class="text-center align-middle">${presupuesto.aprobado}</td>
                            <td class="text-center align-middle">Sector I</td>
                            <td class="text-center align-middle">${presupuesto.boca}</td>

                            <td class="text-center align-middle">
                                <div class="form-group col-md-4">
                                    <div class="switch switch-success d-inline m-r-2">
                                        <input type="checkbox" id="info_finalizado" checked="">
                                        <label for="info_finalizado" class="cr"></label>
                                    </div>
                                    <label>Realizado?</label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                            ${presupuesto.fecha}
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                    <i class="fa fa-plus"></i> Trabajar en pieza
                                </button>
                            </td>
                        </tr>
                        `);

                        $('#table_pagos_reasignar_insumos tbody').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1){
                                let total = insumo.cantidad * insumo.valor;
                                $('#table_pagos_reasignar_insumos tbody').append(`
                                <tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                    <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                    <td>${insumo.cantidad}</td>
                                    <td>${formatoMoneda(insumo.valor)}</td>
                                    <td>${formatoMoneda(total)}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            }

                        });
                    }
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function sacar_de_presupuesto_insumo(id){
        let url = "{{ ROUTE('dental.sacar_tratamiento_presupuesto') }}";
        let data = {
            id: id,
            tipo:'insumo',
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
             _token: "{{ csrf_token() }}"
        }
        console.log(data);
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                    if(resp.status == 1){
                        swal({
                            icon:'success',
                            title:'Info',
                            text: resp.mensaje
                        });

                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_presupuesto_dental').val(total_general);
                                //limpiar_formulario_insumo();

                        let insumos = resp.insumos;
                        let table = $('#table_insumos_preimplante').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();



                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                            // Botones de acción
                            var botones = `
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                    <i class="fas fa-save"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>`;
                            }else{
                                var botones = `
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-save"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                            }
                            table.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();

                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1){
                                let total = insumo.cantidad * insumo.valor;
                                $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-center">

                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            }

                        });

                        console.log(insumos);
                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 1){
                                if(insumo.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(insumo.estado_pago == 'intermedio'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }
                                let rowNode = table_insumos.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.cantidad,         // Nombre del insumo
                                formatoMoneda(insumo.valor),       // Cantidad utilizada
                                0,         // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle '+clase+'"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table_insumos.draw();
                    }else{
                        swal({
                            icon:'error',
                            title:'info',
                            text: resp.mensaje
                        });
                    }


            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function dame_marcas_implantes(value){
        let id_tipo_insumo = value.value;
        let tipo_insumo_text = value.options[value.selectedIndex].text;
        console.log(tipo_insumo_text);
        $('#titulo_tipo_insumo').html(tipo_insumo_text);
        if(id_tipo_insumo == 1){
            // quitar la clase d-none al select de marcas
            $('#marcas_implantes_select').removeClass('d-none');
            $('#insumos_select').addClass('d-none');
        }else{
            // quitar la clase d-none al select de marcas
            $('#marcas_implantes_select').addClass('d-none');
            $('#insumos_select').removeClass('d-none');
        }
        let url = '{{ ROUTE("dental.dame_implantes_dental") }}';
        let data = {
            id_tipo_insumo: id_tipo_insumo,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                $('#nombreInsumo').empty();
                let insumos = resp;
                insumos.forEach(e => {
                    $('#nombreInsumo').append(`
                    <option value="${e.id}"> ${e.descripcion} </option>
                    `);
                });
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }
</script>
