<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_cirugia_gen-tab" data-toggle="tab" href="#atencion_cirugia_gen" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="endosc_gastrica-tab" data-toggle="tab" href="#endosc_gastrica" role="tab" aria-controls="endosc_gastrica" aria-selected="false">Endoscopía Digestiva Alta</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="colonoscopia-tab" data-toggle="tab" href="#colonoscopia" role="tab" aria-controls="colonoscopia" aria-selected="false">Endoscopía Digestiva Baja</a>
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
                        <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
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
                                                        <div id="form-cda">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h5 style="text-align:center;color blue">Cirugía Digestiva Alta</h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Dolor</label>
                                                                            <select name="dolor" id="dolor" placeholder="Dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dolor','div_detalle_dolor','dolor_cda',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_dolor" style="display:none">
                                                                            <label class="floating-label-activo-sm">Dolor</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dolor_cda" id="dolor_cda"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Compromiso estado General</label>
                                                                            <select name="ceg_cda" id="ceg_cda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ceg_cda','div_detalle_ceg_cda','ceg_cda',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_ceg_cda" style="display:none">
                                                                            <label class="floating-label-activo-sm">Compromiso estado General</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="ceg_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ceg_cda_def" id="ceg_cda_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                            <select name="masas_cda" id="masas_cda" data-titulo="masas_cda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('masas_cda','div_detalle_masas_cda','masas_cda',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_masas_cda" style="display:none">
                                                                            <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="masas_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_masas_cda" id="det_masas_cda"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Es Urgencia Qx.?</label>
                                                                            <select name="urgencia_cda" id="urgencia_cda" data-titulo="urgencia_cda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cda','div_detalle_urgencia_cda','urgencia_cda',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_urgencia_cda" style="display:none">
                                                                            <label class="floating-label-activo-sm">Es Urgencia Qx</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="urgencia_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_urgencia_cda" id="det_urgencia_cda"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Estado General Paciente</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_det_cda" id="obs_det_cda"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr><!--
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
                                                                            <label class="floating-label-activo-sm">Apreciación Respiratoriasss</label>
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
                                                            </div>-->
                                                            <div class="form-row">
                                                                <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_cda" id="obs_ex_cda"></textarea>
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
										<!--cirugia general-->
										<div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="cirugia_general">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#cirugia_general_c" aria-expanded="false" aria-controls="cirugia_general_c">
                                                        Cirugia General
                                                    </button>
                                                </div>
                                                <div id="cirugia_general_c" class="collapse" aria-labelledby="cirugia_general" data-parent="#cirugia_general">
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

                                                        <div id="form-cir_digest">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h5 style="text-align:center;color blue">Cirugía General</h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Organo</label>
                                                                            <select name="organo" id="organo" data-titulo="organo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('organo','div_detalle_organo','organo',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_organo" style="display:none">
                                                                            <label class="floating-label-activo-sm">organo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="organo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="organo" id="organo"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Compromiso estado General</label>
                                                                            <select name="ceg_cda" id="ceg_cda" data-titulo="ceg_cda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ceg_cda','div_detalle_ceg_cda','ceg_cda',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_ceg_cda" style="display:none">
                                                                            <label class="floating-label-activo-sm">Compromiso estado General</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="ceg_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ceg_cda_def" id="ceg_cda_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                            <select name="masas_cda" id="masas_cda" data-titulo="masas_cda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('masas_cda','div_detalle_masas_cda','masas_cda',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_masas_cda" style="display:none">
                                                                            <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="masas_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_masas_cda" id="det_masas_cda"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Es Urgencia Qx.?</label>
                                                                            <select name="urgencia_cda" id="urgencia_cda" data-titulo="urgencia_cda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cda','div_detalle_urgencia_cda','urgencia_cda',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_urgencia_cda" style="display:none">
                                                                            <label class="floating-label-activo-sm">Es Urgencia Qx</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="urgencia_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_urgencia_cda" id="det_urgencia_cda"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Estado General Paciente</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_det_cda" id="obs_det_cda"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
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
                                        <!--Formulario / Signos vitales y otros-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="signosvit-otros">
                                                    <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                                        Signos vitales y otros
                                                    </button>
                                                </div>
                                                <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-1">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->temperatura !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{!! old('temperatura') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-1">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo
                                                                != null)
                                                                <label class="floating-label-activo-sm">Frec.
                                                                    Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Frec.
                                                                    Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{!! old('frecuencia_reposo') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                                                                != null)
                                                                <label class="floating-label-activo-sm">Estado
                                                                    Nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Estado
                                                                    Nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Presión Arterial</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="p_arterial" value="{!! old('p_arterial') !!}">
                                                                    <label for="p_arterial" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_1" style="display:none">
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                                                null)
                                                                <label class="floating-label-activo-sm">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bd !=
                                                                null)
                                                                <label class="floating-label-activo-sm">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie !=
                                                                null)
                                                                <label class="floating-label-activo-sm">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{{ $fichaAtencion->presion_sentado }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{!! old('presion_sentado') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Comunicación y traslado</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="com_trasl" value="{!! old('com_trasl') !!}">
                                                                    <label for="com_trasl" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_2" style="display:none">
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) &&
                                                                $fichaAtencion->ct_estado_conciencia != null)
                                                                <label class="floating-label-activo-sm">Estado de
                                                                    conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Estado de
                                                                    conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{{ $fichaAtencion->ct_traslado }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{!! old('ct_traslado') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Signos vitales y otros-->
										<div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="Control_cirugia">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#cirugia_general_pc" aria-expanded="false" aria-controls="cirugia_general_pc">
                                                        Control Post Quirúrgico
                                                    </button>
                                                </div>
                                                <div id="cirugia_general_pc" class="collapse" aria-labelledby="cirugia_general" data-parent="#Control_cirugia">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>

                                                        <div id="form-cir_digest">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h5 style="text-align:center;color blue">Control</h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12" id="div_detalle_organo" >
                                                                            <label class="floating-label-activo-sm">Estado General</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="organo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="organo" id="organo"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">

                                                                        <div class="form-group col-md-12" id="div_detalle_ceg_cda" >
                                                                            <label class="floating-label-activo-sm">Herida Operatoria Curación</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="ceg_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ceg_cda_def" id="ceg_cda_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">

                                                                        <div class="form-group col-md-12" id="div_detalle_masas_cda" >
                                                                            <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="masas_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_masas_cda" id="det_masas_cda"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Estado General Paciente</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_det_cda" id="obs_det_cda"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ENFERMO CRÓNICO O GES-->
                                        <div class="col-sm-12 col-md-12">
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
                                                                    {{-- <label for="modal_ges" class="cr" data-toggle="modal"
                                                                            data-target="#form_ges"></label> --}}
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
                                        <hr>
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

                        <!--INFORME ENDOSCOPÍA DIGESTIVA ALTA-->
                        <div class="tab-pane fade" id="endosc_gastrica" role="tabpanel" aria-labelledby="endosc_gastrica-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Informe Endoscopía Digestiva</h6>
                                            <hr>
                                        </div>
                                    </div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4 mt-3 mb-0">
												<label class="floating-label-activo-sm">Solicitado por:</label>
												<input type="text" class="form-control form-control-sm" name="prof_sol_endogastrica" id="prof_sol_endogastrica">
												<hr>
											</div>
											<div class="col-md-4 mt-3 mb-0">
												<label class="floating-label-activo-sm">H.Diagnóstica</label>
												<input type="text" class="form-control form-control-sm" name="dg_sol_endogastrica" id="dg_sol_endogastrica">
												<hr>
											</div>
											<div class="col-md-4 mt-3 mb-0">
												<label class="floating-label-activo-sm">Premedicación</label>
												<input type="text" class="form-control form-control-sm" name="premed_endogastrica" id="premed_endogastrica">
												<hr>
											</div>
										</div>
									</div>
                                    <div class="row">
                                        <!--ANTECEDENTES-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="antec_gastro">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_endosc_gastro" aria-expanded="false" aria-controls="antec_endosc_gastro">
                                                        Antecedentes
                                                    </button>
                                                </div>
                                                <div id="antec_endosc_gastro" class="collapse show" aria-labelledby="antec_gastro" data-parent="#antec_gastro">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label-activo-sm">Antecedentes Generales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="antec_endo_gastrica_gen" id="antec_endo_gastrica_gen"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label-activo-sm">Antecedentes Gastroenterológicos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="antec_endo_gastrica_go" id="antec_endo_gastrica_go"></textarea>
                                                            </div>
                                                        </div>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TRAYECTO ESOFAGO-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="esof_endoscopia">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#esof_endoscopia_c"" aria-expanded="false" aria-controls="esof_endoscopia_c"">
                                                    Trayecto y Esófago
                                                    </button>
                                                </div>
                                                <div  id="esof_endoscopia_c"  class="collapse show" aria-labelledby="esof_endoscopia" data-parent="#esof_endoscopia">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label-activo-sm">Trayecto</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="esof_trayecto" id="esof_trayecto"></textarea>
                                                            </div>
                                                        </div><div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label-activo-sm">Esófago</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="esof_esofago" id="esof_esofago"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ESTOMAGO-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="orofar">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#orofar-c" aria-expanded="false" aria-controls="orofar-c">
                                                        Estómago
                                                    </button>
                                                </div>
                                                <div id="orofar-c" class="collapse show" aria-labelledby="orofar" data-parent="#orofar">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
															<div class="form group row">
																<div class="col-sm-4">
																	<div class="form-group fill">
																		<label class="floating-label" for="name">Cardias</label>
																		<input id="cardias" name="cardias" type="text" class="form-control form-control-sm">
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group fill">
																		<label class="floating-label" for="name">Contenido y Pliegues </label>
																		<input id="cont_pliegues" name="cont_pliegues" type="text" class="form-control form-control-sm">
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group fill">
																		<label class="floating-label" for="name">Mucosa</label>
																		<input id="mucosa" name="mucosa" type="text" class="form-control form-control-sm">
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group fill">
																		<label class="floating-label" for="name">Ángulo</label>
																		<input id="angulo" name="angulo" type="text" class="form-control form-control-sm">
																	</div>
																</div>

																<div class="col-sm-4">
																	<div class="form-group fill">
																		<label class="floating-label" for="name">Antro</label>
																		<input id="antro" name="antro" type="text" class="form-control form-control-sm">
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group fill">
																		<label class="floating-label" for="name">Píloro</label>
																		<input id="piloro" name="piloro" type="text" class="form-control form-control-sm">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<div class="switch switch-success d-inline m-r-10">
																			<input type="checkbox" onchange="biopsia_endo_gas();" id="biopsia_end_gast" name="biopsia_end_gast" value="">
																			<label for="biopsia_end_gast" class="cr"></label>
																		</div>
																		<label>biopsia</label>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="switch switch-success d-inline m-r-10">
																			<input type="checkbox" onchange="muestra_hp_abrir_div();" id="muestra_hp" name="muestra_hp" value="">
																			<label for="muestra_hp" class="cr"></label>
																		</div>
																		<label>Muestra H.P</label>
																	</div>
																</div>
																<div class="col-md-3" id="div_select_muestra_hp" style="display:none;">
																	<div class="form-group">
																		<label class="floating-label-activo-sm" for="name">Resultado</label>
																		<select id="muestra_hp_resultado" name="muestra_hp_resultado" class="form-control control-sm">
																			<option value="">Seleccione</option>
																			<option value="1">Positivo</option>
																			<option value="0">Negativo</option>
																		</select>
																	</div>
																</div>
															</div>


                                                            <div class="form-group col-sm-12 col-md-12">
                                                                <label class="floating-label-activo-sm">Descripción Examen</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="desc_endo_gast" id="desc_endo_gast"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--DUODENO-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="laring">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#laring-c" aria-expanded="false" aria-controls="laring-c">
                                                        Duodéno
                                                    </button>
                                                </div>
                                                <div id="laring-c" class="collapse show" aria-labelledby="laring" data-parent="#laring">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12">
                                                                <label class="floating-label-activo-sm">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="duodeno" id="duodeno"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<!--DIAGNÓSTICO-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="diag-endosc_alto">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diag-endosc_alto-c" aria-expanded="false" aria-controls="diag-endosc_alto-c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diag-endosc_alto-c" class="collapse show" aria-labelledby="diag-endosc_alto" data-parent="#diag-endosc_alto">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6">
                                                                <label class="floating-label-activo-sm">Diagnóstico endoscópico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endos" id="diag_endos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
                                                            </div>
															<div class="form-group col-sm-12 col-md-6">
                                                                <label class="floating-label-activo-sm">Test de Ureasa</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
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
                        <!--CIERRE: INFORME ENDOSCOPIA ALTA-->
                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')
                        <!--INFORME ENDOSCOPÍA DIGESTIVA BAJA-->
                       <div class="tab-pane fade" id="colonoscopia" role="tabpanel" aria-labelledby="colonoscopia-tab">
                           <div class="row bg-white shadow-none rounded mx-1">
                               <div class="col-md-12">
                                   <div class="row">
                                       <div class="col-md-12 mt-3 mb-0">
                                           <h6 class="f-16 text-c-blue">Informe Colonoscopía</h6>
                                           <hr>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="card">
                                           <div class="row">
                                               <div class="col-md-4 mt-3 mb-0">
                                                   <label class="floating-label-activo-sm">Solicitado por:</label>
                                                   <input type="text" class="form-control form-control-sm" name="prof_sol_endogastrica" id="prof_sol_endogastrica">

                                               </div>
                                               <div class="col-md-4 mt-3 mb-0">
                                                   <label class="floating-label-activo-sm">H.Diagnóstica</label>
                                                   <input type="text" class="form-control form-control-sm" name="dg_sol_endogastrica" id="dg_sol_endogastrica">

                                               </div>
                                               <div class="col-md-4 mt-3 mb-0">
                                                   <label class="floating-label-activo-sm">Premedicación</label>
                                                   <input type="text" class="form-control form-control-sm" name="premed_endogastrica" id="premed_endogastrica">

                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <!--ANTECEDENTES-->
                                       <div class="col-sm-12 col-md-12">
                                           <div class="card">
                                               <div class="card-header" id="antec_coloprocto">
                                                   <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_endosc_colo" aria-expanded="false" aria-controls="antec_endosc_colo">
                                                       Antecedentes
                                                   </button>
                                               </div>
                                               <div id="antec_endosc_colo" class="collapse show" aria-labelledby="antec_coloprocto" data-parent="#antec_coloprocto">
                                                   <div class="card-body-aten shadow-none">
                                                       <div class="form-row">
                                                           <div class="form-group col-md-12 mx-auto">
                                                               <label class="floating-label-activo-sm">Antecedentes Generales</label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="antec_endo_gastrica_gen" id="antec_endo_gastrica_gen"></textarea>
                                                           </div>
                                                           <div class="form-group col-md-12 mx-auto">
                                                               <label class="floating-label-activo-sm">Antecedentes Gastroenterológicos y de la Especialidad</label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="antec_endo_gastrica_go" id="antec_endo_gastrica_go"></textarea>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <!--TACTO RECTAL-->
                                       <div class="col-sm-12 col-md-12">
                                           <div class="card">
                                               <div class="card-header" id="tacto_rectal">
                                                   <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#tacto_rectal_endo" aria-expanded="false" aria-controls="tacto_rectal_endo">
                                                   Tacto Rectal y Preparación para el examen
                                                   </button>
                                               </div>
                                               <div id="tacto_rectal_endo" class="collapse show" aria-labelledby="tacto_rectal" data-parent="#tacto_rectal">
                                                   <div class="card-body-aten shadow-none">
                                                       <div class="form-row">
                                                           <div class="form-group col-md-12 mx-auto">
                                                               <label class="floating-label-activo-sm">Tacto</label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="Tacto_endos_rectal" id="Tacto_endos_rectal"></textarea>
                                                           </div>
                                                       </div>
                                                       <div class="form-row">
                                                           <div class="col-sm-12">
                                                               <div class="form-group fill">
                                                                   <label class="floating-label-activo-sm">Preparación de Boston Comentarios</label>
                                                                   <input id="cardias" name="cardias" type="text" class="form-control">
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="form-row">
                                                           <div class="form-group col-md-4">
                                                               <label id="" name="" class="floating-label-activo-sm">colon derecho</label>
                                                               <select class="form-control form-control-sm" name="" id="">
                                                                   <option value="0">0</option>
                                                                   <option value="1">1</option>
                                                                   <option value="2">2</option>
                                                                   <option value="3" selected>3</option>
                                                               </select>
                                                           </div>
                                                           <div class="form-group col-md-4">
                                                               <label id="" name="" class="floating-label-activo-sm">colon transverso</label>
                                                               <select class="form-control form-control-sm" name="" id="">
                                                                   <option value="0">0</option>
                                                                   <option value="1">1</option>
                                                                   <option value="2">2</option>
                                                                   <option value="3" selected>3</option>
                                                               </select>
                                                           </div>
                                                           <div class="form-group col-md-4">
                                                               <label id="" name="" class="floating-label-activo-sm">colon izquierdo</label>
                                                               <select class="form-control form-control-sm" name="" id="">
                                                                   <option value="0">0</option>
                                                                   <option value="1">1</option>
                                                                   <option value="2">2</option>
                                                                   <option value="3" selected>3</option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-sm-12 col-md-12">
                                           <div class="card">
                                               <div class="card-header" id="exploracion">
                                                   <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exploracion_endo" aria-expanded="false" aria-controls="exploracion_endo">
                                                   Exploración
                                                   </button>
                                               </div>
                                               <div id="exploracion_endo" class="collapse show" aria-labelledby="exploracion" data-parent="#exploracion">
                                                   <div class="card-body-aten shadow-none">
                                                       <div class="form-row">
                                                           <div class="form-group col-md-12 mx-auto">
                                                               <label class="floating-label-activo-sm">Exploración y Procedimientos </label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="Tacto_endos_rectal" id="Tacto_endos_rectal"></textarea>
                                                           </div>
                                                           <div class="form-group col-md-6 " style="margin:auto">
                                                               <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_clasificacion_colon();"><i class="me-2" data-feather="thumbs-up"></i>Ver Clasificación de Colon<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                           </div>
                                                           <div class="col-md-6">
                                                                   <div class="form-group">
                                                                       <div class="switch switch-success d-inline m-r-10">
                                                                           <input type="checkbox" onchange="biopsia_endo_colon();" id="biopsia_colon" name="biopsia_colon" value="">
                                                                           <label for="biopsia_colon" class="cr"></label>
                                                                       </div>
                                                                       <label>biopsia</label>
                                                                   </div>
                                                               </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <!--DIAGNÓSTICO-->
                                       <div class="col-sm-12 col-md-12">
                                           <div class="card">
                                               <div class="card-header" id="diag-endosc_bajo">
                                                   <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diag-endosc_bajo-c" aria-expanded="false" aria-controls="diag-endosc_bajo-c">
                                                       Diagnóstico
                                                   </button>
                                               </div>
                                               <div id="diag-endosc_bajo-c" class="collapse show" aria-labelledby="diag-endosc_bajo" data-parent="#diag-endosc_bajo">
                                                   <div class="card-body-aten shadow-none">
                                                       <div class="form-row">
                                                           <div class="form-group col-sm-12 col-md-6">
                                                               <label class="floating-label-activo-sm">Diagnóstico endoscópico</label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endos" id="diag_endos"></textarea>
                                                           </div>
                                                           <div class="form-group col-sm-12 col-md-6">
                                                               <label class="floating-label-activo-sm">Observaciones</label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
                                                           </div>
                                                           <div class="form-group col-sm-12 col-md-6">
                                                               <label class="floating-label-activo-sm">Test de Ureasa</label>
                                                               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
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
                       <!--CIERRE:INFORME ENDOSCOPÍA DIGESTIVA BAJA-->
                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('atencion_medica.generales.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                            {{--  @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')  --}}
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


		function biopsia_endo_gas() {
            if($('#biopsia_end_gast').prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
			}
        }
        function biopsia_endo_colon() {
            if($('#biopsia_colon').prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
			}
        }
		function muestra_hp_abrir_div()
		{
			if($('#muestra_hp').prop('checked'))
			{
				$('#div_select_muestra_hp').show();
			}
			else
			{
				$('#div_select_muestra_hp').hide();
				$('#muestra_hp_resultado').val('');
			}

		}
    </script>
@endsection


