<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_orl-tab" data-toggle="tab" href="#atencion_orl" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_orl" role="tabpanel" aria-labelledby="atencion_orl-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención general</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_oftalmo" id="descripcion_consulta_oftalmo" onchange="cargarIgual('descripcion_consulta_oftalmo');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes Oftalmológicos:</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_oftalmo" id="antec_especialidad_oftalmo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->

                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="examen_oft_general">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#examen_oft_generalc" aria-expanded="false" aria-controls="examen_oft_generalc">
                                                        Examen General de la Especialidad
                                                    </button>
                                                </div>
                                                <div id="examen_oft_generalc" class="collapse" aria-labelledby="" data-parent="#examen_oft_general" style="examen_oft_general">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                        <option value="">Seleccione</option>
                                                                        @if(!empty($fichaTipo))
                                                                            @foreach ($fichaTipo as $ft )
                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <h6>Parámetros Generales</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Subj. OD</label>
                                                                    <select name="agudeza_visual_subj_od" data-titulo="Agudeza visual_sub_od" id="agudeza_visual_subj_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_subj_od','div_agudeza_visual_subj_od','obs_agudeza_visual_subj_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_subj_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Subj. OD(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Agudeza visual_sub_od" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_subj_od" id="obs_agudeza_visual_subj_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Agudeza visual Subj. OI</label>
                                                                    <select name="agudeza_visual_subj_oi" data-titulo="Agudeza visual_sub_oi" id="agudeza_visual_subj_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_subj_oi','div_agudeza_visual_subj_oi','obs_agudeza_visual_sub_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_subj_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Agudeza visual Subj. OI(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Agudeza visual_sub_oi" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_sub_oi" id="obs_agudeza_visual_sub_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Obj. OD</label>
                                                                    <select name="agudeza_visual_obj_od" data-titulo="Agudeza visual_obj_od" id="agudeza_visual_obj_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_obj_od','div_agudeza_visual_obj_od','obs_agudeza_visual_obj_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_obj_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Obj. OD(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Agudeza visual_obj_od" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_obj_od" id="obs_agudeza_visual_obj_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;">Agudeza visual Obj. OI</label>
                                                                    <select name="agudeza_visual_obj_oi" data-titulo="Agudeza visual_obj_oi" id="agudeza_visual_obj_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_obj_oi','div_agudeza_visual_obj_oi','obs_agudeza_visual_obj_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_obj_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Agudeza visual Obj. OI(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Agudeza visual_obj_oi" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_obj_oi" id="obs_agudeza_visual_obj_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Movimientos Oculares</label>
                                                                    <select name="mov_oculares" data-titulo="Movimientos Oculares" id="mov_oculares" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mov_oculares','div_mov_oculares','obs_mov_oculares',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_mov_oculares" style="display:none;">
                                                                    <label class="floating-label-activo-sm">Movimientos Oculares</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Movimientos Oculares" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mov_oculares" id="obs_mov_oculares"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Autorrefractometría OD</label>
                                                                    <select name="autorefracto_od" data-titulo="Autorefracto_OD" id="autorefracto_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('autorefracto_od','div_autorefracto_od','obs_autorefracto_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_autorefracto_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Autorrefractometría OD</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Autorefracto_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_autorefracto_od" id="obs_autorefracto_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Autorrefractometría OI</label>
                                                                    <select name="autorefracto_oi" data-titulo="Autorefracto_OI" id="autorefracto_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('autorefracto_oi','div_autorefracto_oi','obs_autorefracto_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_autorefracto_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;">Autorrefractometría OI</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Autorefracto_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_autorefracto_oi" id="obs_autorefracto_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Presión Ocular OD</label>
                                                                    <select name="presion_ocular_od" data-titulo="Marcha" id="presion_ocular_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('presion_ocular_od','div_presion_ocular_od','obs_presion_ocular_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_presion_ocular_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Presión Ocular(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Apoyo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_presion_ocular_od" id="obs_presion_ocular_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-1">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >P/O (Valor)</label>
                                                                        <input type="text" class="form-control form-control-sm" name="valor_presion_ocular_od" id="valor_presion_ocular_od">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;" >Presión Ocular OI</label>
                                                                    <select name="presion_ocular_oi" data-titulo="Presion_Ocular_OI" id="presion_ocular_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('presion_ocular_oi','div_presion_ocular_oi','obs_presion_ocular_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_presion_ocular_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;" >Presión Ocular(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Presion_Ocular_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_presion_ocular_oi" id="obs_presion_ocular_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-1">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;"  >Valor OI</label>
                                                                        <input type="text" class="form-control form-control-sm" name="valor_presion_ocular_oi" id="valor_presion_ocular_oi">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Campo Visual OD</label>
                                                                    <select name="campo_visual_od" data-titulo="Campo_der" id="campo_visual_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_campo_visual_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Campo Visual OD</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Campo_der" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_campo_visual_od" id="obs_campo_visual_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Campo Visual OI</label>
                                                                    <select name="campo_visual_oi" data-titulo="Campo_izq" id="campo_visual_oi"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_campo_visual_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Campo Visual OI</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Campo_izq" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_campo_visual_oi" id="obs_campo_visual_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                    <textarea class="form-control form-control-sm" id="campo_otros_ex_general" name="campo_otros_ex_general"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_otros_ex_general"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12 align-middle" style="margin:auto">
                                                                <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Biomicroscopía-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">

                                                <div class="card-header" id="bio_esp_oftalmo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#bio_oftalmo" aria-expanded="false" aria-controls="bio_oftalmo">
                                                       Biomicroscopía
                                                    </button>
                                                </div>
                                                <div id="bio_oftalmo" class="collapse show" aria-labelledby="bio_oftalmo" data-parent="#bio_oftalmo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                        <option value="">Seleccione</option>
                                                                        @if(!empty($fichaTipo))
                                                                            @foreach ($fichaTipo as $ft )
                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                 <h6 style="color:rgb(241, 13, 74);font-weight: bold;">OJO DERECHO</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Párpados</label>
                                                                    <select name="parpbiood" data-titulo="Bio_parpados_od" id="parpbiood" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);">
                                                                        <option selected  value="1">Normales</option>
                                                                        <option value="2">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_parpbiood" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Párpados (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_parpados_od" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_parpbiood" id="obs_parpbiood"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Conjuntivas</label>
                                                                    <select name="conjuntiva_bio_od" data-titulo="Bio_conjuntivas_od" id="conjuntiva_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_conjuntiva_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Conjuntivas (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_conjuntivas_od" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conjuntiva_bio_od" id="obs_conjuntiva_bio_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Córneas</label>
                                                                    <select name="biocornea_od" data-titulo="Córneas_bio" id="biocornea_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',3);">
                                                                        <option value="1">Claras y completamente epitelizadas</option>
                                                                        <option value="2">Anormales</option>
                                                                        <option value="3">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_biocornea_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Córneas</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Córneas_bio" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biocornea_od" id="obs_biocornea_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(241, 13, 74);font-weight: bold;" >Camara Anterior</label>
                                                                    <select name="camara_ant_od" data-titulo="Camara_ant_od" id="camara_ant_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_camara_ant_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;"  >Camara Anterior (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Camara_ant_od" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_camara_ant_od" id="obs_camara_ant_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Tyndall</label>
                                                                    <select name="tyndall_od" data-titulo="Tyndall_OD" id="tyndall_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_tyndall_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Tyndall</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Tyndall_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tyndall_od" id="obs_tyndall_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Cristalino</label>
                                                                    <select name="cristalino_bio_od" data-titulo="Cristalino_bio_OD" id="cristalino_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_cristalino_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Cristalino</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Cristalino_bio_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cristalino_bio_od" id="obs_cristalino_bio_od"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                    <textarea class="form-control form-control-sm" id="campo_otros_ex_general" name="campo_otros_ex_general"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_otros_ex_general"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <h6 style="color:rgb(12, 122, 241);font-weight: bold;">OJO IZQUIERDO</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Párpados</label>
                                                                    <select name="parpbiooi" data-titulo="Bio_parpados_oi" id="parpbiooi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);">
                                                                        <option selected  value="1">Normales</option>
                                                                        <option value="2">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_parpbiooi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Párpados (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_parpados_oi" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_parpbiooi" id="obs_parpbiooi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Conjuntivas</label>
                                                                    <select name="conjuntiva_bio_oi" data-titulo="Bio_conjuntivas_oi" id="conjuntiva_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_conjuntiva_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Conjuntivas (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_conjuntivas_oi" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conjuntiva_bio_oi" id="obs_conjuntiva_bio_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Córneas</label>
                                                                    <select name="biocornea_oi" data-titulo="Córneas_biooi" id="biocornea_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);">
                                                                        <option value="1">Claras y completamente epitelizadas</option>
                                                                        <option value="2">Anormales</option>
                                                                        <option value="3">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_biocornea_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Córneas</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Córneas_biooi" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biocornea_oi" id="obs_biocornea_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(12, 122, 241);font-weight: bold;" >Camara Anterior</label>
                                                                    <select name="camara_antbiooi" data-titulo="Camaraant_OI" id="camara_antbiooi"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('camara_antbiooi','div_camara_antbiooi','obs_camara_antbiooi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_camara_antbiooi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Camara Anterior (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Camaraant_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_camara_antbiooi" id="obs_camara_antbiooi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Tyndall</label>
                                                                    <select name="tyndall_oi" data-titulo="Tyndall_OI" id="tyndall_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_tyndall_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Tyndall</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Tyndall_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tyndall_oi" id="obs_tyndall_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Cristalino</label>
                                                                    <select name="cristalino_bio_oi" data-titulo="Cristalino_bio_OI" id="cristalino_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_cristalino_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Cristalino</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Cristalino_bio_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cristalino_bio_oi" id="obs_cristalino_bio_oi"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                    <textarea class="form-control form-control-sm" id="campo_otros_bio_oi" name="campo_otros_bio_oi"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_otros_bio_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12 align-middle" style="margin:auto">
                                                                <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Biomicroscopía Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--fondo de ojo-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="fo-esp_oftalmo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#fo-oftalmo" aria-expanded="false" aria-controls="fo-oftalmo">
                                                       Fondo de Ojo
                                                    </button>
                                                </div>
                                                <div id="fo-oftalmo" class="collapse show" aria-labelledby="fo-oftalmo" data-parent="#fo-oftalmo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                        <option value="">Seleccione</option>
                                                                        @if(!empty($fichaTipo))
                                                                            @foreach ($fichaTipo as $ft )
                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                 <h6 style="color:rgb(241, 13, 74);font-weight: bold;">OJO DERECHO</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Papilas</label>
                                                                    <select name="papilas_bio_od" data-titulo="Bio_Papilas_OD" id="papilas_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('papilas_bio_od','div_papilas_bio_od','obs_papilas_bio_od',2);">
                                                                        <option selected  value="1">Normales</option>
                                                                        <option value="2">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_papilas_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Papilas (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_Papilas_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_papilas_bio_od" id="obs_papilas_bio_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Excavación</label>
                                                                    <select name="excavacion_bio_od" data-titulo="Bio_Excavacion_OD" id="excavacion_bio_od" style="color:rgb(241, 13, 74);font-weight: bold;" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('excavacion_bio_od','div_excavacion_bio_od','obs_excavacion_bio_od',12);">
                                                                        <option value="1">0</option>
                                                                        <option value="2">0.1</option>
                                                                        <option value="3">0.2</option>
                                                                        <option selected value="4">0.3</option>
                                                                        <option value="5">0.4</option>
                                                                        <option value="6">0.5</option>
                                                                        <option value="7">0.6</option>
                                                                        <option value="8">0.7</option>
                                                                        <option value="9">0.8</option>
                                                                        <option value="10">0.9</option>
                                                                        <option value="11">Total</option>
                                                                        <option value="12">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_excavacion_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Excavación (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_Excavacion_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_excavacion_bio_od" id="obs_excavacion_bio_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Bordes</label>
                                                                    <select name="bordes_od" data-titulo="Bordes_OD_bio" id="bordes_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bordes_od','div_bordes_od','obs_bordes_od',2);">
                                                                        <option value="1">Bordes netos y Normales</option>
                                                                        <option value="2">Anormales</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_bordes_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Bordes</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bordes_OD_bio" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bordes_od" id="obs_bordes_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(241, 13, 74);font-weight: bold;" >Máculas</label>
                                                                    <select name="maculas_bio_od" data-titulo="Maculas_Bio_OD" id="maculas_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('maculas_bio_od','div_maculas_bio_od','obs_maculas_bio_od',2);">
                                                                        <option selected  value="1">Normales</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_maculas_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;"  >Máculas (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Maculas_Bio_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_maculas_bio_od" id="obs_maculas_bio_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Vasos</label>
                                                                    <select name="vasos_bio_od" data-titulo="Vasos_OD" id="vasos_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vasos_bio_od','div_vasos_bio_od','obs_vasos_bio_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vasos_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Vasos</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Vasos_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vasos_bio_od" id="obs_vasos_bio_od"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Periféria</label>
                                                                    <select name="periferia_bio_od" data-titulo="Periferia_bio_OD" id="periferia_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periferia_bio_od','div_periferia_bio_od','obs_periferia_bio_od',2);">
                                                                        <option selected  value="1">Sana</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_periferia_bio_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Periféria</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Periferia_bio_OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_periferia_bio_od" id="obs_periferia_bio_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                    <textarea class="form-control form-control-sm" id="campo_fo_od" name="campo_fo_od"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_fo_od"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                 <h6 style="color:rgb(41, 90, 189);font-weight: bold;">OJO IZQUIERDO</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Papilas</label>
                                                                    <select name="papilas_bio_oi" data-titulo="Bio_Papilas_OI" id="papilas_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('papilas_bio_oi','div_papilas_bio_oi','obs_papilas_bio_oi',2);">
                                                                        <option selected  value="1">Normales</option>
                                                                        <option value="2">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_papilas_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Papilas (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_Papilas_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_papilas_bio_oi" id="obs_papilas_bio_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Excavación</label>
                                                                    <select name="excavacion_bio_oi" data-titulo="Bio_Excavacion_OI" id="excavacion_bio_oi" style="color:rgb(41, 90, 189);font-weight: bold;" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('excavacion_bio_oi','div_excavacion_bio_oi','obs_excavacion_bio_oi',12);">
                                                                        <option value="1">0</option>
                                                                        <option value="2">0.1</option>
                                                                        <option value="3">0.2</option>
                                                                        <option selected value="4">0.3</option>
                                                                        <option value="5">0.4</option>
                                                                        <option value="6">0.5</option>
                                                                        <option value="7">0.6</option>
                                                                        <option value="8">0.7</option>
                                                                        <option value="9">0.8</option>
                                                                        <option value="10">0.9</option>
                                                                        <option value="11">Total</option>
                                                                        <option value="12">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_excavacion_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Excavación (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bio_Excavacion_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_excavacion_bio_oi" id="obs_excavacion_bio_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Bordes</label>
                                                                    <select name="bordes_oi" data-titulo="Bordes_OI_bio" id="bordes_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);">
                                                                        <option value="1">Bordes netos y Normales</option>
                                                                        <option value="2">Anormales</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_bordes_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Bordes</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Bordes_OI_bio" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bordes_oi" id="obs_bordes_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;" >Máculas</label>
                                                                    <select name="maculas_bio_oi" data-titulo="Maculas_Bio_OI" id="maculas_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('maculas_bio_oi','div_maculas_bio_oi','obs_maculas_bio_oi',2);">
                                                                        <option selected  value="1">Normales</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_maculas_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Máculas (describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Maculas_Bio_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_maculas_bio_oi" id="obs_maculas_bio_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Vasos</label>
                                                                    <select name="vasos_bio_oi" data-titulo="Vasos_OI" id="vasos_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vasos_bio_oi','div_vasos_bio_oi','obs_vasos_bio_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vasos_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Vasos</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Vasos_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vasos_bio_oi" id="obs_vasos_bio_oi"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Periféria</label>
                                                                    <select name="periferia_bio_oi" data-titulo="Periferia_bio_OI" id="periferia_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periferia_bio_oi','div_periferia_bio_oi','obs_periferia_bio_oi',2);">
                                                                        <option selected  value="1">Sana</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_periferia_bio_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Periféria</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Periferia_bio_OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_periferia_bio_oi" id="obs_periferia_bio_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                    <textarea class="form-control form-control-sm" id="campo_fo_oi" name="campo_fo_oi"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_fo_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12 align-middle" style="margin:auto">
                                                                <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nuevo Fondo de ojo Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--Diagnóstico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
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
                                        <!--ENFERMO CRÓNICO O GES-->
                                        <div class="col-sm-12">
                                            <div class="row">
                                                {{-- CRONICO --}}
                                                <div class="col-md-4 mx-auto">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onchange="es_cronico();" id="enf_cronico" name="enf_cronico" data-toggle="modal" data-target="#form_enfermo_cronico" value="{!! old('enf_cronico') !!}">
                                                                    <label for="enf_cronico" class="cr"></label>
                                                                </div>
                                                                <label>¿Es enfermo crónico?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row " hidden>
                                                        <div class="col-sm-12">
                                                            <div class="alert alert-warning mx-auto" role="alert">
                                                                <table class="table table-borderless mt-0 mb-0">
                                                                    <tbody>
                                                                        <tr id="tr_obesidad">
                                                                            <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                                            <td class="align-middle pb-1 pt-1">
                                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_diabetes">
                                                                            <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                                            <td class="align-middle pb-1 pt-1">
                                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_hipertesion">
                                                                            <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                                            <td class="align-middle pb-1 pt-1">
                                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- GES --}}
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                                                    <label for="modal_ges" class="cr"></label>
                                                                </div>
                                                                <label>Ges</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" hidden>
                                                        <div class="alert alert-warning mx-auto my-0" role="alert">
                                                            <table class="table table-borderless mt-0 mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02
                                                                        </td>
                                                                        <td class="align-middle pb-1 pt-1">
                                                                            <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                <i class="feather icon-x"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="confidencial" name="confidencial" value="{!! old('confidencial') !!}" />
                                                                <label for="confidencial" class="cr"></label>
                                                            </div>
                                                            <label>Confidencial</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="confidencial_descripcion" style="display: none">
                                                        <div class="col-sm-12">
                                                            <div class="alert alert-warning mx-auto" role="alert">
                                                                <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro
                                                                    de atención médica es confidencial
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Plan de tratamiento-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="plan_oftalmo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#plan_oft" aria-expanded="false" aria-controls="plan_oft">
                                                    Planificación de tratamiento
                                                    </button>
                                                </div>
                                                <div id="plan_oft" class="collapse show" aria-labelledby="plan_oft" data-parent="#plan_oft">
                                                    <div class="card-body-aten shadow-none">
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-3">
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        Solo Tratamiento Médico
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        Lentes
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        Procedimiento
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        Cirugía
                                                                    </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->


                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')



                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('atencion_medica.generales.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                            @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->

                            <hr>

                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--MODALES modal_enfermedades_cronicas-->
@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')

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

        function guardar_tipo_ficha_otorrino()
        {
            var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
            var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_orl_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_orl_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_orl_nombre = registro_f_t_orl_nombre;
            data.registro_f_t_orl_descripcion = registro_f_t_orl_descripcion;

            $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento){
                //console.log($(elemento).attr('id'));
                //console.log($(elemento).val());
                //console.log($(elemento).prop('nodeName'));
                //console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            console.log(data);

            url = "{{ route('profesional.ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional').val(),

                    modal_agregar_tipo_apreciacion_auditiva :  data.modal_agregar_tipo_apreciacion_auditiva,
                    modal_agregar_tipo_apreciacion_resp :  data.modal_agregar_tipo_apreciacion_resp,
                    modal_agregar_tipo_disfonia :  data.modal_agregar_tipo_disfonia,
                    modal_agregar_tipo_ex_boca :  data.modal_agregar_tipo_ex_boca,
                    modal_agregar_tipo_examen_bio_od :  data.modal_agregar_tipo_examen_bio_od,
                    modal_agregar_tipo_examen_bio_oi :  data.modal_agregar_tipo_examen_bio_oi,
                    modal_agregar_tipo_examen_faringe :  data.modal_agregar_tipo_examen_faringe,
                    modal_agregar_tipo_examen_fnd :  data.modal_agregar_tipo_examen_fnd,
                    modal_agregar_tipo_examen_fni :  data.modal_agregar_tipo_examen_fni,
                    modal_agregar_tipo_examen_laringe :  data.modal_agregar_tipo_examen_laringe,
                    modal_agregar_tipo_examen_od :  data.modal_agregar_tipo_examen_od,
                    modal_agregar_tipo_examen_oi :  data.modal_agregar_tipo_examen_oi,
                    modal_agregar_tipo_nariz_general :  data.modal_agregar_tipo_nariz_general,
                    modal_agregar_tipo_usa_audifono :  data.modal_agregar_tipo_usa_audifono,
                    observaciones_aprec_auditiva_def :  data.observaciones_aprec_auditiva_def,
                    observaciones_aprec_resp_def :  data.observaciones_aprec_resp_def,
                    observaciones_audifono :  data.observaciones_audifono,
                    observaciones_det_disfonia :  data.observaciones_det_disfonia,
                    observaciones_det_nariz_general :  data.observaciones_det_nariz_general,
                    observaciones_detalle_ex_boca :  data.observaciones_detalle_ex_boca,
                    observaciones_ex_farige_anormal :  data.observaciones_ex_farige_anormal,
                    observaciones_ex_fnd_anormal :  data.observaciones_ex_fnd_anormal,
                    observaciones_ex_fni_anormal :  data.observaciones_ex_fni_anormal,
                    observaciones_ex_larige_anormal :  data.observaciones_ex_larige_anormal,
                    observaciones_ex_od_anormal :  data.observaciones_ex_od_anormal,
                    observaciones_ex_oi_anormal :  data.observaciones_ex_oi_anormal,
                    observaciones_obs_ex_biom :  data.observaciones_obs_ex_biom,
                    observaciones_obs_ex_nasal :  data.observaciones_obs_ex_nasal,
                    observaciones_obs_ex_oidos :  data.observaciones_obs_ex_oidos,
                    observaciones_obs_ex_orl :  data.observaciones_obs_ex_orl,
                    observaciones_obs_examen_bio_od :  data.observaciones_obs_examen_bio_od,
                    observaciones_obs_examen_bio_oi :  data.observaciones_obs_examen_bio_oi,
                    observaciones_obs_examen_laringe :  data.observaciones_obs_examen_laringe,
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,

                    modal_agregar_tipo_episodios: data.modal_agregar_tipo_episodios,
                    observaciones_detalle_episodios: data.observaciones_detalle_episodios,
                    modal_agregar_tipo_equilibrio: data.modal_agregar_tipo_equilibrio,
                    observaciones_detalle_equilibrio: data.observaciones_detalle_equilibrio,
                    modal_agregar_tipo_ng: data.modal_agregar_tipo_ng,
                    observaciones_detalle_ng: data.observaciones_detalle_ng,
                    modal_agregar_tipo_sint_acomp: data.modal_agregar_tipo_sint_acomp,
                    observaciones_detalle_sint_acompanantes: data.observaciones_detalle_sint_acompanantes,
                    modal_agregar_tipo_vertigo: data.modal_agregar_tipo_tipo_vertigo,
                    observaciones_detalle_tipo_vertigo: data.observaciones_detalle_tipo_vertigo,
                    observaciones_vestibular: data.observaciones_obs_vestibular,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_orl').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
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

        function cargar_info_ficha_tipo_orl(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);
                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        // console.log(index);
                        // console.log(value);
                        // console.log($('#'+index));

                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        if(index == 'id_tipo_episodios')
                            index = 'episodios';

                        if(index == 'id_tipo_equilibrio')
                            index = 'equilibrio';

                        if(index == 'id_tipo_ng')
                            index = 'ng';

                        if(index == 'id_tipo_sint_acomp')
                            index = 'sint_acomp';

                        if(index == 'id_tipo_vertigo')
                            index = 'tipo_vertigo';

                        if(index == 'obs_tipo_vertigo')
                            index = 'detalle_tipo_vertigo';

                        if(index == 'obs_sint_acomp')
                            index = 'detalle_sint_acompanantes';

                        if(index == 'obs_ng')
                            index = 'detalle_ng';

                        if(index == 'obs_episodios')
                            index = 'detalle_episodios';

                        if(index == 'obs_equilibrio')
                            index = 'detalle_equilibrio';



                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                    evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                    evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                    evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                    evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                    evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                    evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                    evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                    evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                    evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                    evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                    evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                    evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                    evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
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

    </script>
@endsection
