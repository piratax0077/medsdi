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
                                            @endforeach --}}
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                    <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="">
                                                </div>
                                                <button type="button" class="btn btn-outline-success btn-sm my-2 w-100" onclick="dame_info_pieza()"><i class="fas fa-search"></i> Buscar</button>
                                            </div>
                                            <div class="col-md-10">
                                                <table class="display table table-striped dt-responsive nowrap table-xs" id="historia_odontograma_pieza">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">Diagnóstico</th>
                                                            <th class="text-center align-middle">Tratamiento</th>
                                                            <th class="text-center align-middle">Tipo especialidad</th>
                                                            <th class="text-center align-middle">Caras</th>
                                                            <th class="text-center align-middle">Responsable de atención</th>
                                                            <th class="text-center align-middle">Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="contenedor_pieza_tto_implante">

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
