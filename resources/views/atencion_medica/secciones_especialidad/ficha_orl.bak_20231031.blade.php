<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_orl-tab" data-toggle="tab" href="#atencion_orl" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="rinofibro-tab" data-toggle="tab" href="#rinofibro" role="tab" aria-controls="rinofibro" aria-selected="false">Rinofibrolaringoscopía</a>
                    </li>
                </ul>
            </div>
			 <!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                    <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    @csrf

                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_orl" role="tabpanel" aria-labelledby="atencion_orl-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="tit-gen">Ficha de atención general</h6>
                                </div>
                            </div>
                            <div class="row">
                                <!--FORMULARIOS-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--Formulario / Menor de edad-->
                                    @include('general.secciones_ficha.seccion_menor')
                                    <!--Cierre: Formulario / Menor de edad-->
                                </div>
                                <!--Motivo consulta-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="motivo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                Motivo de la consulta
                                            </button>
                                        </div>
                                        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                            <div class="card-body-aten-a">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label-activo-sm" for="descripcion_consulta_orl">Motivo de consulta</label>
                                                        <input type="text" class="form-control form-control-sm" name="descripcion_consulta_orl" id="descripcion_consulta_orl">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label-activo-sm" for="antec_especialidado">Antecedentes Especialidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="antec_especialidado" id="antec_especialidad">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTRO DOSL-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                            Examen especialidad
                                        </button>
                                    </div>
                                    <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                        <div class="card-body-aten-a">
                                            <div id="form-orl-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="orl_oido_tab" data-toggle="tab" href="#orl_oido" role="tab" aria-controls="orl_oido" aria-selected="true">Oídos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_nariz-tab" data-toggle="tab" href="#orl_ex_nariz" role="tab" aria-controls="orl_ex_nariz" aria-selected="true">Naríz</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="orl_flaringe-tab" data-toggle="tab" href="#orl_flaringe" role="tab" aria-controls="orl_flaringe" aria-selected="true">Faringo-laringe</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="cuello-tab" data-toggle="tab" href="#cuello" role="tab" aria-controls="cuello" aria-selected="true">Cuello-Gl.anexas-otros</a>
                                                            </li>
                                                            <!--<li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="in-hosp-tab" data-toggle="tab" href="#in-hosp" role="tab" aria-control="in-hosp" aria-selected="false">Hospitalización</a>
                                                            </li>-->
                                                        </ul>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="orl_adulto">
                                                            <!--OIDO-->
                                                            <div class="tab-pane fade show active" id="orl_oido" role="tabpanel" aria-labelledby="orl_oido_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active " id="audicion_gen-tab" data-toggle="tab" href="#audicion_gen" role="tab" aria-controls="audicion_gen" aria-selected="false">Audición</a>
                                                                                            <a class="nav-link-aten text-reset" id="oidos_ex-tab" data-toggle="tab" href="#oidos_ex" role="tab" aria-controls="oidos_ex" aria-selected="true">Examen-Oidos </a>
                                                                                            <a class="nav-link-aten text-reset" id="biomicrosc-tab" data-toggle="tab" href="#biomicrosc" role="tab" aria-controls="biomicrosc" aria-selected="false">Biomicroscopía</a>
                                                                                            <a class="nav-link-aten text-reset" id="ex_vestibular-tab" data-toggle="tab" href="#ex_vestibular" role="tab" aria-controls="ex_vestibular" aria-selected="false">Examen Vestibular</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="audicion_gen" role="tabpanel" aria-labelledby="audicion_gen-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="id_usa_audifono">Usa Audífono</label>
                                                                                                                <select name="usa_audifono" id="usa_audifono" data-titulo="Usa Audífono" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si OD</option>
                                                                                                                    <option value="3">Si OI</option>
                                                                                                                    <option value="4">Si Ambos</option>
                                                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_usa_audifono" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="audifono">Usa Audífono</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="audifono" id="audifono"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="apreciacion_auditiva">Apreciación Auditiva</label>
                                                                                                                <select name="apreciacion_auditiva" id="apreciacion_auditiva" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_apreciacion_auditiva" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="aprec_auditiva_def">Apreciación Auditiva</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_auditiva_def" id="aprec_auditiva_def"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="obs_ex_audicion">Observaciones Examen Auditívo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    {{-- <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="resultado_ex_audicion">Resultado Examenes</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_ex_audicion" id="resultado_ex_audicion"></textarea>
                                                                                                             </div>
                                                                                                        </div>
                                                                                                    </div> --}}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="oidos_ex" role="tabpanel" aria-labelledby="oidos_ex-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;" for="examen_od">Examen OD</label>
                                                                                                                <select name="examen_od" id="examen_od" data-titulo="Examen OD" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_od" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red" for="ex_od_anormal">Examen OD <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OD" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_od_anormal" id="ex_od_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;" for="examen_oi">Examen OI</label>
                                                                                                                <select name="examen_oi" id="examen_oi" data-titulo="Examen OI" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_examen_oi" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red" for="ex_oi_anormal">Examen OI <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OI" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_oi_anormal" id="ex_oi_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm" for="obs_ex_oidos">Observaciones Examen Oidos</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones oidos" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="biomicrosc" role="tabpanel" aria-labelledby="biomicrosc-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;" for="examen_bio_od">Biomicroscopía OD</label>
                                                                                                                <select name="examen_bio_od" id="examen_bio_od" data-titulo="Biomicroscopía OD" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                    <option value="3">No Realizada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_obs_examen_bio_od" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red" for="obs_examen_bio_od">Biomicroscopía OD<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_od" id="obs_examen_bio_od"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;" for="examen_bio_oi">Examen OI</label>
                                                                                                                <select name="examen_bio_oi" data-titulo="Biomicroscopía OI" id="examen_bio_oi" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                    <option value="3">No Realizada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_obs_examen_bio_oi" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red" for="obs_examen_bio_oi">Biomicroscopía OI<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_oi" id="obs_examen_bio_oi"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm" for="obs_ex_biom">Observaciones Examen Biomicroscópico</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="ex_vestibular" role="tabpanel" aria-labelledby="ex_vestibular-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="id_tipo_vertigo">Tipo Vertigo</label>
                                                                                                                <select name="id_tipo_vertigo" id="id_tipo_vertigo" data-titulo="Tipo Vertigo" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('id_tipo_vertigo','div_obs_tipo_vertigo','obs_tipo_vertigo',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Objetivo</option>
                                                                                                                    <option value="2">Subjetivo</option>
                                                                                                                    <option value="3">Otro Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_obs_tipo_vertigo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="obs_tipo_vertigo">Tipo Vertigo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Tipo Vertigo" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_vertigo" id="obs_tipo_vertigo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="id_tipo_sint_acomp">Sintomas Acompañantes</label>
                                                                                                                <select name="id_tipo_sint_acomp" id="id_tipo_sint_acomp" data-titulo="Sintomas Acompañantes" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('id_tipo_sint_acomp','div_detalle_sintomas_acompanantes','obs_sint_acomp',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si</option>
                                                                                                                    <option value="3">Otro Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_sintomas_acompanantes" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="obs_sint_acomp">Sintomas Acompañantes</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Sintomas Acompañantes" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sint_acomp" id="obs_sint_acomp"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                 <label class="floating-label-activo-sm" for="id_tipo_ng">Nistagmus</label>
                                                                                                                <select name="id_tipo_ng" id="id_tipo_ng" data-titulo="Nistagmus" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('id_tipo_ng','div_obs_ng','obs_ng',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_obs_ng" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="obs_ng">Nistagmus</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Nistagmus" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ng" id="obs_ng"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="id_tipo_episodios">Episodios</label>
                                                                                                                <select name="id_tipo_episodios" id="id_tipo_episodios" data-titulo="Episodios" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('id_tipo_episodios','div_obs_episodios','obs_episodios',3);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Primero</option>
                                                                                                                    <option value="3">Más de uno</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_obs_episodios" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="obs_episodios">Episodios</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Episodios" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_episodios" id="obs_episodios"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="id_tipo_equilibrio">Equilibrio</label>
                                                                                                                <select name="id_tipo_equilibrio" id="id_tipo_equilibrio" data-titulo="Equilibrio" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('id_tipo_equilibrio','div_obs_equilibrio','obs_equilibrio',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_obs_equilibrio" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="obs_equilibrio">Equilibrio</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Equilibrio" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_equilibrio" id="obs_equilibrio"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                 <label class="floating-label-activo-sm">Otros Antecedentes</label>
                                                                                                                <select name="ot_antec" id="ot_antec" data-titulo="Otros Antecedentes" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_antec','div_obs_ot_antec','obs_ot_antec',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_obs_ot_antec" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Otros Antecedentes</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Nistagmus" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ot_antec" id="obs_ot_antec"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Vestibular</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Oído</label>
                                                                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_oido" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad_oido','descripcion_ficha_tipo_especialidad_oido', 'form-orl-oido');">
                                                                                                <option value="">Seleccione</option>
                                                                                                @if(!empty($fichaTipo['oido']))
                                                                                                    @foreach ($fichaTipo['oido'] as $ft )
                                                                                                        <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_oido"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-orl-oido','registro_f_t_orl_detalle','oido');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Oído</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--EXAMEN  NARIZ-->
                                                            <div class="tab-pane fade show" id="orl_ex_nariz" role="tabpanel" aria-labelledby="orl_ex_nariz_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="exnasal_grl-tab" data-toggle="tab" href="#exnasal_grl" role="tab" aria-controls="exnasal_grl" aria-selected="true">Aspecto General</a>
                                                                                            <a class="nav-link-aten text-reset" id="nariz_ex_fisico-tab" data-toggle="tab" href="#nariz_ex_fisico" role="tab" aria-controls="nariz_ex_fisico" aria-selected="false">Examen Nasal</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="exnasal_grl" role="tabpanel" aria-labelledby="exnasal_grl-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Aspecto General</label>
                                                                                                                <select name="nariz_general" id="nariz_general" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_nariz_gen" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Aspecto General</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_nariz_general" id="det_nariz_general"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                                                                <select name="apreciacion_resp" id="apreciacion_resp" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_nariz_resp" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_resp_def" id="aprec_resp_def"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen General</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_general_nariz" id="obs_ex_general_nariz"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="nariz_ex_fisico" role="tabpanel" aria-labelledby="nariz_ex_fisico-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Examen Fosa Nasal Der.</label>
                                                                                                                <select name="examen_fnd" id="examen_fnd" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_fnd" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Examen Fosa Nasal Derecha<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fnd_anormal" id="ex_fnd_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Examen Fosa Nasal Izq.</label>
                                                                                                                <select name="examen_fni" id="examen_fni" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_examen_fni" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Examen Fosa Nasal Izquierda<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fni_anormal" id="ex_fni_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Nasal</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nasal" id="obs_ex_nasal"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Nariz</label>
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Nariz</label>
                                                                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_nariz" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad_nariz','descripcion_ficha_tipo_especialidad_nariz', 'form-orl-nariz');">
                                                                                                <option value="">Seleccione</option>
                                                                                                @if(!empty($fichaTipo['nariz']))
                                                                                                    @foreach ($fichaTipo['nariz'] as $ft )
                                                                                                        <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_nariz"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-orl-nariz','registro_f_t_orl_detalle','nariz');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Nariz</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EXAMEN  FARIGO-LARIGE-->
                                                            <div class="tab-pane fade show" id="orl_flaringe" role="tabpanel" aria-labelledby="orl_flaringe-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="faringe-tab" data-toggle="tab" href="#faringe" role="tab" aria-controls="faringe" aria-selected="true">Faringe</a>
                                                                                            <a class="nav-link-aten text-reset" id="laringe-tab" data-toggle="tab" href="#laringe" role="tab" aria-controls="laringe" aria-selected="false">Laringe</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Boca</label>
                                                                                                                <select name="ex_boca" id="ex_boca" class="form-control form-control-sm" data-titulo="Examen Boca"  data-seccion="Faringo-Laringe"  onchange="evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Alterado</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_ex_boca" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Examen Boca</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Examen Boca"  data-seccion="Faringo-Laringe"   onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ex_boca" id="detalle_ex_boca"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                                                                <select name="examen_faringe" id="examen_faringe" data-titulo="Examen Faríngeo"  data-seccion="Faringo-Laringe"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_faringe" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Examen Faríngeo"  data-seccion="Faringo-Laringe"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_farige_anormal" id="ex_farige_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
																									<div class="form-row">
																										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
																											<label class="floating-label-activo-sm">Observaciones Examen Faríngeo</label>
																											<textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Faríngeo" data-seccion="Faringo-Laringe" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_faringeo" id="obs_ex_faringeo"></textarea>
																										</div>
																									</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade " id="laringe" role="tabpanel" aria-labelledby="laringe-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Disfonía</label>
                                                                                                                <select name="disfonia" id="disfonia" class="form-control form-control-sm" data-titulo="Disfonía" data-seccion="Faringo-Laringe" onchange="evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Sí</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_disfonia" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Disfonía</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Disfonía" data-seccion="Faringo-Laringe" onfocus="this.rows=3" onblur="this.rows=1;" name="det_disfonia" id="det_disfonia"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                                                                <select name="examen_laringe" id="examen_laringe" data-titulo="Examen Laríngeo"  data-seccion="Faringo-Laringe"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_laringe" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Examen Laríngeo"  data-seccion="Faringo-Laringe"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_larige_anormal" id="ex_larige_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Laríngeo</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Laríngeo" data-seccion="Faringo-Laringe" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_laringeo" id="obs_ex_laringeo"></textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Faringo-Laringe</label>
                                                                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_of" onchange="cargar_info_ficha_tipo_oft_fo('select_ficha_tipo_especialidad_of','descripcion_ficha_tipo_especialidad_of');">
                                                                                                <option value="">Seleccione</option>
                                                                                                @if(!empty($fichaTipo['faringe']))
                                                                                                    @foreach ($fichaTipo['faringe'] as $ft )
                                                                                                        <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_faringe"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-orl-faringe','registro_f_t_orl_detalle','faringe');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Faringo-Laringe</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EXAMEN CUELLO-->
                                                            <div class="tab-pane fade show" id="cuello" role="tabpanel" aria-labelledby="cuello-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
																											<div class="form-group">
																												<label class="floating-label-activo-sm">Piel y Tegumentos</label>
																												<select name="piel_tegumnto" data-titulo="Piel y Tegumentos" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
																													<option selected  value="1">Normales</option>
																													<option value="2">Anormales</option>
																												</select>
																											</div>
																											<div class="form-group" id="div_piel_tegumnto" style="display:none;">
																												<label class="floating-label-activo-sm">Piel y Tegumentos</label>
																												<textarea class="form-control form-control-sm" data-titulo="Observacion Piel y Tegumentos" data-seccion="Cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
																											</div>
																										</div>
																										<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
																											<div class="form-group">
																												<label class="floating-label-activo-sm">Adenopatías</label>
																												<select name="adenopatias" data-titulo="Adenopatías" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);">
																													<option selected  value="1">Normales</option>
																													<option value="2">Anormales</option>
																												</select>
																											</div>
																											<div class="form-group" id="div_adenopatias" style="display:none;">
																												<label class="floating-label-activo-sm">Adenopatías</label>
																												<textarea class="form-control form-control-sm" data-titulo="Observacion Adenopatías"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_adenopatias" id="obs_adenopatias"></textarea>
																											</div>
																										</div>
																										<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
																											<div class="form-group">
																												<label class="floating-label-activo-sm">Tumores y Masas</label>
																												<select name="tumores_masas" data-titulo="Tumores y Masas" data-seccion="Cuello"  id="tumores_masas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);">
																													<option selected  value="1">Normales</option>
																													<option value="2">Anormales</option>
																												</select>
																											</div>
																											<div class="form-group" id="div_tumores_masas" style="display:none;">
																												<label class="floating-label-activo-sm">Tumores y Masas</label>
																												<textarea class="form-control form-control-sm" data-titulo="Observacion Tumores y Masas"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tumores_masas" id="obs_tumores_masas"></textarea>
																											</div>
																										</div>
																										<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
																											<div class="form-group">
																												<label class="floating-label-activo-sm">Glándulas Anexas</label>
																												<select name="gland_anexas" data-titulo="Glándulas Anexas" data-seccion="Cuello"  id="gland_anexas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);">
																													<option selected  value="1">Normales</option>
																													<option value="2">Anormales</option>
																												</select>
																											</div>
																											<div class="form-group" id="div_gland_anexas" style="display:none;">
																												<label class="floating-label-activo-sm">Glándulas Anexas</label>
																												<textarea class="form-control form-control-sm" data-titulo="Observacion Glándulas Anexas"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gland_anexas" id="obs_gland_anexas"></textarea>
																											</div>
																										</div>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Carga ficha tipo Cuello y otros</label>
                                                                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_cuello" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad_cuello','descripcion_ficha_tipo_especialidad_cuello', 'form-orl-cuello');">
                                                                                                <option value="">Seleccione</option>
                                                                                                @if(!empty($fichaTipo['cuello']))
                                                                                                    @foreach ($fichaTipo['cuello'] as $ft )
                                                                                                        <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_cuello"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-orl-cuello','registro_f_t_orl_detalle','cuello');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Cuello y otros</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--HOSPITALIZACION
															@php
                                                                $seccion_tipo = 'orl';
                                                            @endphp
                                                            @include('general.hospitalizacion.hospitalizar')-->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
								<!-- control post qx -->
								 @include('general.secciones_ficha.cirugia_control.control_cirugia_general')
								<!-- cierre control post qx -->
								<!--HOSPITALIZACION-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="hospitalizar_paciente">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                Hospitalizar Paciente
                                            </button>
                                        </div>
                                        <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                            <div class="card-body-aten-a shadow-none">
                                                @include('general.hospitalizacion.hospitalizar')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Formulario / Signos vitales y otros-->
                                @include('general.secciones_ficha.signos_vitales')
                                <!--Cierre: Formulario / Signos vitales y otros-->

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
                                                            <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,eno_diagnositico_confirmado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
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
                            <div class="row">
								<!--GUARDAR O IMPRIMIR FICHA-->
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="row mb-3">
										<div class="col-md-12 text-center">
											<input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
											<input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
										</div>
									</div>
								</div>
							</div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                        </div>
                        <!--INFORME RINOFIBROLARINGOSCOPÍA-->
                        <div class="tab-pane fade" id="rinofibro" role="tabpanel" aria-labelledby="rinofibro-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="tit-gen">Informe Rinofibrolaringoscopía</h6>
                                </div>
                            </div>
                            <div class="div_form_examen_rfl">
                                {!! $examen !!}
                            </div>
                            <!-- GUARDAR EXAMEN -->
                            <div class="col-md-12 text-center mb-3">
                                <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                <button type="button" class="btn btn-danger mt-1" onclick="visualizar_pdf_examen('rfl');">Ver Examen PDF</button>
                            </div>
                            <!-- CIERRE: GUARDAR EXAMEN -->
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

            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $('#descripcion_hipotesis').keyup(function(){
                if($.trim(this.value) != '')
                {
                   if( lic_token != '' && lic_estado == 1)
                    {
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
			/** MENSAJE*/
			    /** CARGAR mensaje */
				$('#mensaje_ficha').html('<strong>Solo el campo Hipótesis diagnóstica es obligatorio el resto es opcional</strong>');
				$('#mensaje_ficha').show();
				setTimeout(function(){
					$('#mensaje_ficha').hide();
				}, 5000);
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

        // function abrir_modal_guardar_tipo()
        // {
        //     $('#modal_registrar_ficha_tipo_orl').modal('show');
        //     cargarSeccion('registro_f_t_orl_detalle');
        // }

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle, tipo)
        {
            $('#f_t_orl_tipo').val(tipo);
            $("#btn_modal_registrar_ficha_tipo_orl").unbind();

            // if(tipo == 'orl_oido')
            // {
            //     $('#btn_modal_registrar_ficha_tipo_orl').click(function(){
            //         guardar_tipo_ficha_orl_oido();
            //     });
            // }
            // else if(tipo == 'orl_nariz')
            // {
            //     $('#btn_modal_registrar_ficha_tipo_orl').click(function(){
            //         guardar_tipo_ficha_orl_nariz();
            //     });
            // }
            // else if(tipo == 'orl_faringe')
            // {
            //     $('#btn_modal_registrar_ficha_tipo_orl').click(function(){
            //         guardar_tipo_ficha_orl_faringe();
            //     });
            // }
            // else if(tipo == 'orl_cuello')
            // {
            //     $('#btn_modal_registrar_ficha_tipo_orl').click(function(){
            //         guardar_tipo_ficha_orl_cuello();
            //     });
            // }
            $('#modal_registrar_ficha_tipo_orl').modal('show');

            cargarSeccion(div_id_detalle, div_id_data);
        }

        function cargarSeccion(div_destino, div_id_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#'+div_id_data).find('select,textarea').each(function(key, elemento)
            {
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

                if(seccion_actual !== seccion_previa)
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
            var f_t_orl_tipo = $('#f_t_orl_tipo').val();
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

                    tipo : f_t_orl_tipo,

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

                    modal_agregar_id_tipo_episodios: data.modal_agregar_id_tipo_episodios,
                    observaciones_obs_episodios: data.observaciones_obs_episodios,
                    modal_agregar_id_tipo_equilibrio: data.modal_agregar_id_tipo_equilibrio,
                    observaciones_obs_equilibrio: data.observaciones_obs_equilibrio,
                    modal_agregar_id_tipo_ng: data.modal_agregar_id_tipo_ng,
                    observaciones_obs_ng: data.observaciones_obs_ng,
                    modal_agregar_tipo_id_tipo_sint_acomp: data.modal_agregar_id_tipo_sint_acomp,
                    observaciones_obs_sint_acomp: data.observaciones_obs_sint_acomp,
                    modal_agregar_id_tipo_vertigo: data.modal_agregar_id_tipo_vertigo,
                    observaciones_obs_tipo_vertigo: data.observaciones_obs_tipo_vertigo,
                    observaciones_vestibular: data.observaciones_obs_vestibular,

                    modal_agregar_tipo_piel_tegumnto: data.modal_agregar_tipo_piel_tegumnto,
                    observaciones_obs_piel_tegumnto: data.observaciones_obs_piel_tegumnto,
                    modal_agregar_tipo_adenopatias: data.modal_agregar_tipo_adenopatias,
                    observaciones_obs_adenopatias: data.observaciones_obs_adenopatias,
                    modal_agregar_tipo_tumores_masas: data.modal_agregar_tipo_tumores_masas,
                    observaciones_obs_tumores_masas: data.observaciones_obs_tumores_masas,
                    modal_agregar_tipo_gland_anexas: data.modal_agregar_tipo_gland_anexas,
                    observaciones_obs_gland_anexas: data.observaciones_obs_gland_anexas,
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

        function cargar_info_ficha_tipo_orl(select, div_descripcion, seccion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#'+seccion).find('select,textarea').each(function(key, elemento){
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
                evaluar_para_carga_detalle('id_tipo_vertigo','div_obs_tipo_vertigo','obs_tipo_vertigo',3);
                evaluar_para_carga_detalle('id_tipo_sint_acomp','div_detalle_sintomas_acompanantes','obs_sint_acomp',3);
                evaluar_para_carga_detalle('id_tipo_ng','div_obs_ng','obs_ng',2);
                evaluar_para_carga_detalle('id_tipo_episodios','div_obs_episodios','obs_episodios',3);
                evaluar_para_carga_detalle('id_tipo_equilibrio','div_obs_equilibrio','obs_equilibrio',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

                evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);
                evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);
                evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);
                evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);
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
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        if(index == 'id_tipo_episodios')
                            index = 'id_tipo_episodios';

                        if(index == 'id_tipo_equilibrio')
                            index = 'id_tipo_equilibrio';

                        if(index == 'id_tipo_ng')
                            index = 'id_tipo_ng';

                        if(index == 'id_tipo_sint_acomp')
                            index = 'id_tipo_sint_acomp';

                        if(index == 'id_tipo_vertigo')
                            index = 'id_tipo_vertigo';

                        if(index == 'obs_tipo_vertigo')
                            index = 'obs_tipo_vertigo';

                        if(index == 'obs_sint_acomp')
                            index = 'obs_sint_acomp';

                        if(index == 'obs_ng')
                            index = 'obs_ng';

                        if(index == 'obs_episodios')
                            index = 'obs_episodios';

                        if(index == 'obs_equilibrio')
                            index = 'obs_equilibrio';

                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                    evaluar_para_carga_detalle('id_tipo_vertigo','div_obs_tipo_vertigo','obs_tipo_vertigo',3);
                    evaluar_para_carga_detalle('id_tipo_sint_acomp','div_detalle_sintomas_acompanantes','obs_sint_acomp',3);
                    evaluar_para_carga_detalle('id_tipo_ng','div_obs_ng','obs_ng',2);
                    evaluar_para_carga_detalle('id_tipo_episodios','div_obs_episodios','obs_episodios',3);
                    evaluar_para_carga_detalle('id_tipo_equilibrio','div_obs_equilibrio','obs_equilibrio',2);
                    evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                    evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                    evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                    evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                    evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                    evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                    evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                    evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

                    evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);
                    evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);
                    evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);
                    evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);

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

    </script>
@endsection
