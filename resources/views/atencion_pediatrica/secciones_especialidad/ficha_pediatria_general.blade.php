<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_orl-tab" data-toggle="tab" href="#atencion_orl" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha Tradicional</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">vacunas</a>
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
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_orl" id="descripcion_consulta_orl" onchange="cargarIgual('descripcion_consulta_orl');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_orl" id="antec_especialidad_orl">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
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
                                                        <div id="form-otorrino">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Oídos Audición</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                            <select name="usa_audifono" id="usa_audifono" data-titulo="Usa Audífono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si OD</option>
                                                                                <option value="3">Si OI</option>
                                                                                <option value="4">Si Ambos</option>
                                                                                <option value="5">Anotar Observaciones</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_usa_audifono" style="display:none">
                                                                            <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="audifono" id="audifono"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                            <select name="apreciacion_auditiva" id="apreciacion_auditiva" data-titulo="Apreciación Auditiva" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Aceptable</option>
                                                                                <option value="2">Deficiente</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_apreciacion_auditiva" style="display:none">
                                                                            <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_auditiva_def" id="aprec_auditiva_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen OI</label>
                                                                            <select name="examen_oi" id="examen_oi" data-titulo="Examen OI" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_oi" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen OI</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_oi_anormal" id="ex_oi_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen OD</label>
                                                                            <select name="examen_od" id="examen_od" data-titulo="Examen OD" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_od" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen OD</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_od_anormal" id="ex_od_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Auditívo</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Biomicroscopía</h6>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="form-row">

                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OI</label>
                                                                            <select name="examen_bio_oi" data-titulo="Biomicroscopía OI" id="examen_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_obs_examen_bio_oi" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OI</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Biomicroscopía OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_oi" id="obs_examen_bio_oi"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OD</label>
                                                                            <select name="examen_bio_od" id="examen_bio_od" data-titulo="Biomicroscopía OD"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_obs_examen_bio_od" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OD</label>
                                                                            <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_od" id="obs_examen_bio_od"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Biomicroscópico</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
															<!--Vestibular-->

                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Sistema Vestibular</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Tipo Vertigo</label>
                                                                            <select name="tipo_vertigo" id="tipo_vertigo" data-titulo="Tipo_vertigo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','vertigo',3)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Objetivo</option>
                                                                                <option value="2">Subjetivo</option>
                                                                                <option value="3">Otro Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_tipo_vertigo" style="display:none">
                                                                            <label class="floating-label-activo-sm">Tipo Vertigo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Tipo_vertigo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="vertigo" id="vertigo"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Sintomas Acompañantes</label>
                                                                            <select name="sint_acomp" id="sint_acomp" data-titulo="Sint_acomp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                                <option value="3">Otro Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_sintomas_acompanantes" style="display:none">
                                                                            <label class="floating-label-activo-sm">Sintomas Acompañantes</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Sint_acomp" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_sint_acompanantes" id="detalle_sint_acompanantes"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Nistagmus</label>
                                                                            <select name="ng" id="ng" data-titulo="Ng" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ng','div_detalle_ng','ng_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_ng" style="display:none">
                                                                            <label class="floating-label-activo-sm">Nistagmus</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Ng" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ng_anormal" id="ng_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Equilibrio</label>
                                                                            <select name="equilib" id="equilib" data-titulo="Equilibrio" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','equil_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_equilibrio" style="display:none">
                                                                            <label class="floating-label-activo-sm">Romberg</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Equilibrio" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="equil_anormal" id="equil_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Vestibular</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen equilibrio" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_equilibrio" id="obs_equilibrio"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Naríz</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Aspecto General</label>
                                                                            <select name="nariz_general" id="nariz_general"  data-titulo="Aspecto General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_nariz_gen" style="display:none">
                                                                            <label class="floating-label-activo-sm">Detalle Aspecto General</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Aspecto General"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_nariz_general" id="det_nariz_general"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                            <select name="apreciacion_resp" id="apreciacion_resp" data-titulo="Apreciación Respiratoria" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Aceptable</option>
                                                                                <option value="2">Deficiente</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_nariz_resp" style="display:none">
                                                                            <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_resp_def" id="aprec_resp_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Izq.</label>
                                                                            <select name="examen_fni" id="examen_fni" data-titulo="Examen Fosa Nasal Izq." class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_fni" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Izquierda</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fni_anormal" id="ex_fni_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Der.</label>
                                                                            <select name="examen_fnd" id="examen_fnd" data-titulo="Examen Fosa Nasal Der." class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_fnd" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Derecha</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fnd_anormal" id="ex_fnd_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Nasal</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nasal" id="obs_ex_nasal"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Faringo-Laringe</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Disfonía</label>
                                                                            <select name="disfonia" id="disfonia" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Sí</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_disfonia" style="display:none">
                                                                            <label class="floating-label-activo-sm">Detalle Disfonía</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_disfonia" id="det_disfonia"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Boca</label>
                                                                            <select name="ex_boca" id="ex_boca" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Alterado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_ex_boca" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Boca</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ex_boca" id="detalle_ex_boca"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                            <select name="examen_faringe" id="examen_faringe" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_faringe" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_farige_anormal" id="ex_farige_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                            <select name="examen_laringe" id="examen_laringe" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_laringe" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_larige_anormal" id="ex_larige_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-3 align-middle" style="margin:auto">
                                                                    <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                                </div>
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
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                                <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
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
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->


                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')

                        <!--ATENCIÓN NIÑO SANO-->
                        <div class="tab-pane fade" id="ns" role="tabpanel" aria-labelledby="ns-tab">
                            <div class="row bg-white shadow-sm  rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención Niño Sano</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 mt-3 mb-2">
                                                    <h6 class="f-18 d-inline float-left">Control de parámetros  en crecimiento y desarrollo</h6>
                                                    <h6 class="f-16 d-inline float-right">Viernes, 18 de Marzo de 2022</h6>
                                                </div>
                                            </div>
                                            <hr class="mt-1">
                                            <!--Formularios (botones)-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills mt-1 mb-4" id="pills-tab-crec-desarrollo" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal active" id="pills-tab-parto-perpu" data-toggle="pill" href="#pills-parto-perpu" role="tab" aria-controls="pills-parto-perpu" aria-selected="true">Info del acompañante, parto y puerperio</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-0-7-dias-tab" data-toggle="pill" href="#pills-0-7-dias" role="tab" aria-controls="pills-0-7-dias" aria-selected="false">Recien nacido (0 y 7 días)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-1-mes-tab" data-toggle="pill" href="#pills-1-mes" role="tab" aria-controls="pills-1-mes" aria-selected="false">Control 1 mes</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-2-5-meses-tab" data-toggle="pill" href="#pills-2-5-meses" role="tab" aria-controls="pills-2-5-meses" aria-selected="false">Lactante menor (2 a 5 meses)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-6-11-meses-tab" data-toggle="pill" href="#pills-6-11-meses" role="tab" aria-controls="pills-6-11-meses" aria-selected="false">Lactante medio (6 a 11 meses)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-12-23-meses-tab" data-toggle="pill" href="#pills-12-23-meses" role="tab" aria-controls="pills-12-23-meses" aria-selected="false">Lactante mayor (12 a 23 meses)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-2-4-anos-tab" data-toggle="pill" href="#pills-2-4-anos" role="tab" aria-controls="pills-2-4-anos" aria-selected="false">Lactante menor (2 a 4 años)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-6-9-anos-tab" data-toggle="pill" href="#pills-6-9-anos" role="tab" aria-controls="pills-6-9-anos" aria-selected="false">Escolar (6 a 9 años)</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent-crec-desarrollo">
                                                        <!--Info del acompañante, parto y puerperio-->
                                                        <div class="tab-pane fade show active" id="pills-parto-perpu" role="tabpanel" aria-labelledby="pills-tab-parto-perpu">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-0">
                                                                    <h6 class="text-c-blue f-16">Información del acompañante, parto y puerperio</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form>
                                                                        <div class="form-row mb-2">
                                                                            <div class="col-md-12">
                                                                                <h6>Información del acompañente</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Rut</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Nombres</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Apellidos</label>
                                                                                <input type="text" class="form-control form-control-sm" name="apellidos_acompañante" id="apellidos_acompañante">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Relación</label>
                                                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row mb-2">
                                                                            <div class="col-md-12">
                                                                                <h6>Información del embarazo puerperio</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Clínica / Hospital</label>
                                                                                <input type="text" class="form-control form-control-sm" name="clinica_hospital" id="clinica_hospital">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Patología del Embarazo</label>
                                                                                <input type="text" class="form-control form-control-sm" name="pat_embarazo" id="pat_embarazo">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Semanas gestación</label>
                                                                                <input type="text" class="form-control form-control-sm" name="sem_gest" id="sem_gest">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Embarazo controlado</label>
                                                                                <input type="text" class="form-control form-control-sm" name="cont_emb" id="cont_emb">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Tipo de parto</label>
                                                                                <input type="text" class="form-control form-control-sm" name="tpo_parto" id="tpo_parto">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Lactancia</label>
                                                                                <input type="text" class="form-control form-control-sm" name="madre_lactancia" id="madre_lactancia">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Inscripción en Registro Civil</label>
                                                                                <input type="text" class="form-control form-control-sm" name="insc" id="insc">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Otros</label>
                                                                                <input type="text" class="form-control form-control-sm" name="otros_parto" id="otros_parto">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row mb-2">
                                                                            <div class="col-md-12">
                                                                                <h6>II. Datos del recién nacido <i id="btn_recien_nacido" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row" id="recien_nacido" style="display:none;">
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                                                                <input type="date" class="form-control form-control-sm" name="fn" id="fn">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label-activo-sm">Hora</label>
                                                                                <input type="time" class="form-control form-control-sm" name="hora" id="hora">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label">Peso (kg.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="p_nac" id="p_nac">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label">Talla (cm.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="talla" id="talla">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label">Perimetro cefálico (cm.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="pc" id="pc">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label">APGAR min</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label">APGAR 5 min</label>
                                                                                <input type="text" class="form-control form-control-sm" name="a_1" id="a_1">
                                                                            </div>
                                                                            <div class="form-group col-sm-3 col-md-3">
                                                                                <label class="floating-label">Edad gestacional</label>
                                                                                <input type="text" class="form-control form-control-sm" name="a_5" id="a_5">
                                                                            </div>
                                                                            <div class="form-group col-sm-6 col-md-6">
                                                                                <label class="floating-label">Reanimación</label>
                                                                                <input type="text" class="form-control form-control-sm" name="reanimacion" id="reanimacion">
                                                                            </div>
                                                                            <div class="form-group col-sm-6 col-md-6">
                                                                                <label class="floating-label">Medicamentos</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Diagnóstico</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="diag" id="diag"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Pronóstico</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="pronostico" id="pronostico"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="obs" id="obs"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row mb-2">
                                                                            <div class="col-md-12">
                                                                                <h6>III. Vacunas <i id="btn_vac_part_puerp" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row" id="vac_part_puerp" style="display:none;">
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">BCG</label>
                                                                                <input type="text" class="form-control form-control-sm" name="bcg" id="bcg">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Hepatitis B</label>
                                                                                <input type="text" class="form-control form-control-sm" name="hep_b" id="hep_b">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Otra</label>
                                                                                <input type="text" class="form-control form-control-sm" name="otra_vac" id="otra_vac">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="floating-label">Sueros y Medicamentos</label>
                                                                                <input type="text" class="form-control form-control-sm" name="otra_vac" id="otra_vac">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row mb-2">
                                                                            <div class="col-md-12">
                                                                                <h6>IV. Exámenes y Tamizaje <i id="btn_extamiz" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row" id="extamiz" style="display:none;">
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">TSH</label>
                                                                                <input type="text" class="form-control form-control-sm" name="tsh" id="tsh">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Evaluacion auditíva</label>
                                                                                <input type="text" class="form-control form-control-sm" name="eval_audit" id="eval_audit">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">PKU</label>
                                                                                <input type="text" class="form-control form-control-sm" name="pku" id="pku">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="floating-label">Otros</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Recién nacido (0 y 7 días)-->
                                                        <div class="tab-pane fade" id="pills-0-7-dias" role="tabpanel" aria-labelledby="pills-0-7-dias-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Recién nacido (0 y 7 días)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form>
                                                                        <!--Control parametros 0 y 7 días-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Control parámetros 0 y 7 días</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label class="floating-label">Anamnesis</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Experiencia del embarazo parto y puerperio</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Estado emocional familiar y redes de apoyo</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Lactancia (hasta el momento del control) </label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="floating-label">Antecedentes heredo-familiares maternos</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="floating-label">Antecedentes heredo-familiares paternos</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_pat" name="ant_pat" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <!--Examen físico del menor-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Examen físico del menor</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label class="floating-label">Inspección general</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Actividad</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="actividad" name="actividad" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Malformaciones</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="malf" name="malf" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Tono y postura</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tono" name="tono" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Piel</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Ex. oftalmológico</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Ex. Buco-dental</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucoden" name="bucoden" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Cabeza y cuello</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cab_cuello" name="cab_cuello" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Cordón</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cordon" name="cordon" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3" id="form_0">
                                                                                <label class="floating-label">Abdomen</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abd" name="abd" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Tórax</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="torax" name="torax" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Columna</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="columna" name="columna" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Extremidades</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extremidades" name="extremidades" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="floating-label">Genitales y Ano</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genit_ano" name="genit_ano" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="floating-label">Ex. Neurológico (reflejos)</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genit_ano" name="genit_ano" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <!--Antropometría-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Antropometría</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Peso (gr.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Longitud (cm.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="peri_cef" id="peri_cef">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label">Otros</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_ant" name="otros_ant" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <!--Estado de salud materno-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Estado de salud materno</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Signos vitales</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Peso (kg.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Involución uterina</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Hda. Operatoria</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Zona genito-anal</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Extremidades inferiores (edemas)</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <!--Lactancia materna-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Lactancia materna</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">General</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Técnica</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Ex. mamas</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <!--Diagnósticos-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Diagnósticos</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">General</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Incremento ponderal</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Lactancia</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Salud del lactante</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Salud de la madre</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Salud sico-social</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Recién nacido (1 mes)-->
                                                        <div class="tab-pane fade" id="pills-1-mes" role="tabpanel" aria-labelledby="pills-1-mes-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Control 1 mes</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=9" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Evaluación relación-familiares</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=9" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardio pulmonar</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cardiopulm" name="ex_cardiopulmf" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ex genito-anal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Motilidad</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="motilidad" name="motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Tono axilar</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Signos sug. parálisis cerebral</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="s_paralisis" name="s_paralisis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Columna</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="columna" name="columna" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extremidades" name="extremidades" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Auditivo</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Buco dental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucoden" name="bucoden" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Cefalohematomas Fontanella ant</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Lactancia materna</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="lac_general" name="lac_general" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Técnica</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tec" name="tec" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ex. Mamas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="mamas" name="mamas" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Nutricional</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud de la madre</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_madre" id="sal_madre"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Lactante menor (2 a 5 meses)-->
                                                        <div class="tab-pane fade" id="pills-2-5-meses" role="tabpanel" aria-labelledby="pills-2-5-meses-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Lactante menor (2 y 5 meses)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Antecedentes heredofamiliares maternos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Antecedentes heredofamiliares paternos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_pat" name="ant_pat" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Test de Edimburgo</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="edimburgo" name="edimburgo" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Rx. Caderas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="rx_cadera" name="rx_cadera" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluación DSM</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="rx_cadera" name="rx_cadera" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Tono y motilidad</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros (lesiones)</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Lactancia</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Lactante medio (6 a 11 meses)-->
                                                        <div class="tab-pane fade" id="pills-6-11-meses" role="tabpanel" aria-labelledby="pills-6-11-meses-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Lactante medio (6 y 11 meses)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Test de Edimburgo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="edimburgo" name="edimburgo"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pautas prevención accidentes</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="prev_accident" name="prev_accident"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros" name="otros"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Tono y motilidad</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros (lesiones)</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Lactancia</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Lactante mayor (12 a 23 meses)-->
                                                        <div class="tab-pane fade" id="pills-12-23-meses" role="tabpanel" aria-labelledby="pills-12-23-meses-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Lactante mayor (12 y 23 meses)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter" name="ev_anter" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Dieta</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta" name="dieta" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Hábitos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos" name="habitos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Rutinas de sueño alimentación</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Prevención de accidentes</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="accidentes" name="accidentes" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Cuidadores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores" name="cuidadores" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Tono y motilidad</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cefalico" id="per_cefalico">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros (lesiones)</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inscr_ponderal" id="inscr_ponderal"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Lactancia</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="lactancia" id="lactancia"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="salud_lactante" id="salud_lactante"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud de la madre</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="salud_madre" id="salud_madre"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Pre-escolar (2 a 4 años)-->
                                                        <div class="tab-pane fade" id="pills-2-4-anos" role="tabpanel" aria-labelledby="pills-2-4-anos-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Pre-escolar (2 y 4 años)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter" name="ev_anter" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Dieta</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta" name="dieta" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Hábitos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos" name="habitos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Rutinas de sueño alimentación</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Prevención de accidentes</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="accidentes" name="accidentes" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Cuidadores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores" name="cuidadores" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen Físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Presión arterial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_arterial" name="p_arterial" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Neurológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="neurl" name="neurl" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Marcha</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="marcha" name="marcha" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano flexible</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planof" name="p_planof" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano doloroso</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planod" name="p_planod" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Genu valgo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genu" name="genu" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cefal" id="per_cefal">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Bucodental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucodental" name="bucodental" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Otros</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Escolar (6 a 9 años)-->
                                                        <div class="tab-pane fade" id="pills-6-9-anos" role="tabpanel" aria-labelledby="pills-2-4-anos-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Escolar (6 y 9 años)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluaciones psicoafectivas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="ev_psicoa" name="ev_psicoa" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-1">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Peso (kg.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Talla (cms.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">IMC</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="imc" name="imc" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <button type="button" class="btn btn-info btn-block btn-sm">Calcular IMC</button>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12 mb-0">
                                                                            <p class="text-danger">Este examen se debe desarrollar con la presencia del adulto responsable del menor y con el consentimiento escolar*</p>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label text-danger">Desarrollo puberal *</label>
                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="desarr_pub" name="desarr_pub" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label text-danger">Desarrollo puberal *</label>
                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="abdomen" name="abdomen" placeholder="REVISAR RESPUESTAS DEL CUESTIONARIO (COMPLETADO POR PADRES)" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label text-danger">Ex. Genitoanal *</label>
                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Presión arterial</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_arterial" name="p_arterial" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Test de Adams</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="adams" name="adams" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <label class="floating-label">Ex. Tórax</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="torax" name="torax" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Bucodental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="buco_dent" name="buco_dent" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Marcha</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="marcha" name="marcha" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano flexible</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planof" name="p_planof" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano doloroso</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planod" name="p_planod" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Genu valgo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genu" name="genu" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Nutricional</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Salud (General)</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_gnal" id="sal_gnal"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="s_psicosocial" id="s_psicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Próximo control-->
                                            <div class="row mt-3">
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header bg-info align-middle">
                                                            <h6 class="float-left d-inline">Indicaciones de próximo control</h6>
                                                        </div>
                                                        <div class="card-body shadow-none">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label">Control con:</label>
                                                                        <input type="text" class="form-control form-control-sm" name="control" id="control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="floating-label">Sugerencias</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sug" id="sug"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label">Otras sugerencias</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="otras_sugerencias" id="otras_sugerencias"></textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Botones carnet vacunas-->
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="carnet_vac();"><i class="fa fa-plus"></i> Carnet de vacunas generales</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="inter();"><i class="fa fa-plus"></i> Interconsulta</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="otras_vac();"><i class="fa fa-plus"></i> Carnet de vacunas especiales</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <button type="reset" class="btn btn-danger">Borrar</button>
                                                    <button type="submit" class="btn btn-info">Guardar ficha</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN NIÑO SANO-->
                        <!--ATENCIÓN VACUNAS-->
                        <div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
                            <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-2">
                                            <h6 class="f-18 d-inline float-left">Vacunas</h6>

                                        </div>
                                    </div>
                                    <hr class="mt-1">
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        <div class="col-sm-12">
                                            <div class="card">

                                                <div class="card-body shadow-none" id="formulario_vac">
                                                    <form>

                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Información del estado de Vacunación del menor</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">

                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Estado de vacunación</label>
                                                                <select class="form-control form-control-sm" id="categoria">
                                                                    <option>Seleccione</option>
                                                                    <optgroup label="Programa Minsal">
                                                                        <option value="AL">Al día</option>
                                                                        <option value="LA">Atrasado</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                    <label class="floating-label">Vacuna correspondiente a edad</label>
                                                                    <select class="form-control form-control-sm" id="categoria">
                                                                        <option>Seleccione</option>
                                                                        <optgroup label="Recién Nacido">
                                                                            <option value="AL">BCG</option>
                                                                            <option value="LA">Hepatitis B</option>
                                                                        </optgroup>
                                                                        <optgroup label="2° mes , 4° mes , 6° mes">
                                                                            <option value="AL">Hexavalente</option>
                                                                            <option value="LA">Neumocócica Conjugada (prematuros)</option>
                                                                        </optgroup>
                                                                        <optgroup label="12 meses">
                                                                            <option value="AL">Tres Vírica 1ª Dosis</option>
                                                                            <option value="LA">Meningocócica Conjugada</option>
                                                                            <option value="LA">Neumocócica Conjugada</option>
                                                                        </optgroup>
                                                                        <optgroup label="18 meses">
                                                                            <option value="AL">Hexavalente</option>
                                                                            <option value="LA">Hepatitis A</option>
                                                                            <option value="LA">Varícela 1ª Dosis</option>
                                                                            <option value="LA">Fiebre Amarilla(Isla de Pascua)</option>
                                                                        </optgroup>
                                                                        <optgroup label="Pre-escolar">
                                                                            <option value="AL">Tres Vírica 2ª Dosis</option>
                                                                            <option value="LA">Varícela 2ª Dosis</option>
                                                                        </optgroup>
                                                                        <optgroup label="Escolar">
                                                                            <option value="AL">1º Básico dTp (acelular)</option>
                                                                            <option value="AL">4º Básico VPH 1ª Dosis</option>
                                                                            <option value="AL">5º Básico VPH 2ª Dosis</option>
                                                                            <option value="AL">8º Básico dTp (acelular)</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                        </div>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Vacuna administrada-->

                                        <!--Incidentes con la vacuna-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info align-middle">
                                                    <h6 class="float-left d-inline">Incidentes con la vacuna</h6>
                                                </div>
                                                <div class="card-body shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label">Incidentes</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="incidentes" id="incidentes"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Estado de Vacunación</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <!--Motivo de consulta-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <table id="tabla_profesionales_laboratorio" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">EDAD</th>
                                                            <th class="text-center align-middle">VACUNAS</th>
                                                            <th class="text-center align-middle">RECIBIDA</th>
                                                            <th class="text-center align-middle">FECHA</th>
                                                            <th class="text-center align-middle">INCIDENTES</th>
                                                            <th class="text-center align-middle">ACCIÓN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>RN</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>BCG</span><br>
                                                                <span>Hepatitis B</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                               <span>SI</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>20/12/2021</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>ERITEMA LOCAL</span>
                                                            </td>
                                                            <td class="align-middle text-center">

                                                                <button type="button" class="btn btn-danger btn-sm">
                                                                <i class="feather icon-x-circle"></i> INDICAR</button><!--SI LA OPCION RECIBIDA ES NO DEBE APARECER BOTON-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--Medicamentos o Examen-->
                                        <div class="form-group col-md-6">
                                             <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas();"><i class="fa fa-plus"></i> Indicar Vacunas Programa MINSAL</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas_otras();"><i class="fa fa-plus"></i> Indicar Otras Vacunas</button>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-info">Guardar</button>
                                            <button type="button" class="btn btn-success">Imprimir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN VACUNAS-->
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

@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {

            $('#hip-diag_spec').keyup(function(){
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

            $("#descripcion_cie_esp").autocomplete({
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
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
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

        })

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
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
            {{--  var tipo = $('#'+select+'').val();  --}}
            $('#'+div_destino).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                html ='';
                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    html +='<div class="col-md-4">Detalle</div>';
                    html +='<div class="col-md-6">';
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
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea){
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
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
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
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
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
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}
                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
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

    </script>
@endsection


