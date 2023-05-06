<!--cirugia general-->
<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header" id="exam_esp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                Examen especialidad Cirugía General
            </button>
        </div>
        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
            <div class="card-body-aten shadow-none">
                <div id="form-cg-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="cg_adulto" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ft_cir_gen_tab" data-toggle="tab" href="#ft_cir_gen" role="tab" aria-controls="ft_cir_gen" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="examen_fisico_cg-tab" data-toggle="tab" href="#examen_fisico_cg" role="tab" aria-controls="examen_fisico_cg" aria-selected="true">Examen Físico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_plan_tto-tab" data-toggle="tab" href="#ex_plan_tto" role="tab" aria-controls="ex_plan_tto" aria-selected="false">Planificación de Tratamiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="in_hosp_cg-tab" data-toggle="tab" href="#in_hosp_cg" role="tab" aria-control="in_hosp_cg" aria-selected="false">Hospitalización</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="cg_adulto">
                                <!--FICHA TIPO-->
                                <div class="tab-pane fade show active" id="ft_cir_gen" role="tabpanel" aria-labelledby="ft_cir_gen_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_cg" data-no_mostrar="1" onchange="cargar_info_ficha_tipo_cg('select_ficha_tipo_especialidad_cg','descripcion_ficha_tipo_especialidad_cg');">
                                                <option value="">Seleccione</option>
                                                @if(!empty($fichaTipo['cg']))
                                                    @foreach ($fichaTipo['cg'] as $ft )
                                                        <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <span id="descripcion_ficha_tipo_especialidad_cg"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="abrir_modal_guardar_tipo_cg('form-cg-adulto','registro_f_t_cg_detalle','cg');"><i class="feather icon-save"></i> Guardar nueva ficha tipo</button>
                                    </div>
                                </div>

                                <!--EXAMEN FISICO CIR GEN-->
                                <div class="tab-pane fade show" id="examen_fisico_cg" role="tabpanel" aria-labelledby="examen_fisico_cg-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Examen General</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Apreciación Estado General</label>
                                                <select name="e_general" id="e_general" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_general','div_e_general','obs_e_general',2)">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_general" style="display:none">
                                                <label class="floating-label-activo-sm">Describir Apreciación Estado General</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_general" id="obs_e_general"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Signos Vitales</label>
                                                <select name="e_signos_vit" id="e_signos_vit" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_signos_vit','div_e_signos_vit','obs_e_signos_vit',3);">
                                                    <option selected value="1">Normales</option>
                                                    <option value="2">No Examinado</option>
                                                    <option value="3">Alterados Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_signos_vit" style="display:none">
                                                <label class="floating-label-activo-sm">Signos Vitales</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_signos_vit" id="obs_e_signos_vit"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Dolor Localización</label>
                                                <select name="e_dolor_loc" id="e_dolor_loc" data-titulo="Dolor Localización" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_dolor_loc','div_e_dolor_loc','obs_e_dolor_loc',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_dolor_loc" style="display:none">
                                                <label class="floating-label-activo-sm">Describir Dolor Localización</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Dolor Localización" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_dolor_loc" id="obs_e_dolor_loc"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Masas Palpables</label>
                                                <select name="masas_pal" id="masas_pal" data-titulo="Masas Palpables" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('masas_pal','div_masas_pal','obs_masas_pal',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_masas_pal" style="display:none">
                                                <label class="floating-label-activo-sm">Masas Palpables</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Masas Palpables" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_masas_pal" id="obs_masas_pal"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Examen segmentario</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Piel y fanéreos</label>
                                                <select name="e_piel_fan" id="e_piel_fan" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel_fan','div_e_piel_fan','obs_e_piel_fan',2)">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_piel_fan" style="display:none">
                                                <label class="floating-label-activo-sm">Describir examen de piel y fanéreos</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel_fan" id="obs_e_piel_fan"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cabeza y cuello</label>
                                                <select name="ex_cabcuello" id="ex_cabcuello" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_cabcuello','div_ex_cabcuello','obs_ex_cabcuello',3)">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">No Examinado</option>
                                                    <option value="3">Otro Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ex_cabcuello" style="display:none">
                                                <label class="floating-label-activo-sm">Describir examen de cuello</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_cabcuello" id="obs_ex_cabcuello"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tórax</label>
                                                <select name="ex_torax" id="ex_torax" data-titulo="Torax" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_torax','div_ex_torax','obs_ex_torax',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ex_torax" style="display:none">
                                                <label class="floating-label-activo-sm">Describir examen de tórax</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Torax" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_torax" id="obs_ex_torax"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <select name="ex_abdomen" id="ex_abdomen" data-titulo="Abdomen" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_abdomen','div_ex_abdomen','obs_ex_abdomen',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal(describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ex_abdomen" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de abdomen</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Abdomen" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_abdomen" id="obs_ex_abdomen"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                                <select name="ex_muscesq" id="ex_muscesq" data-titulo="Musculo-Esquelético" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_muscesq','div_ex_muscesq','obs_ex_muscesq',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ex_muscesq" style="display:none">
                                                <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Musculo-Esquelético" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_muscesq" id="obs_ex_muscesq"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Órganos de los sentidos</label>
                                                <select name="ex_o_sent" id="ex_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('ex_o_sent','div_ex_o_sent','obs_ex_o_sent',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ex_o_sent" style="display:none">
                                                <label class="floating-label-activo-sm">Examen órganos de los sentidos</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. O-Sentidos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_o_sent" id="obs_ex_o_sent"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo-sm">Observaciones Ex. Segmentario</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!--PLAN DE TRATAMIENTO-->
                                <div class="tab-pane fade show" id="ex_plan_tto" role="tabpanel" aria-labelledby="ex_plan_tto-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Plan de Tratamiento</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Es Urgencia Qx.?</label>
                                                <select name="urgencia_cg" id="urgencia_cg" data-titulo="Es Urgencia Qx.?" data-seccion=" Plan de tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_urgencia_cg" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Detalle Urgencia Qx</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_urgencia_cg" id="obs_urgencia_cg"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Requiere Hospitalizar?</label>
                                                <select name="hosp_cg" id="hosp_cg" data-titulo="Requiere Hospitalizacion?" data-seccion=" Plan de tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_cg','div_detalle_hosp_cg','obs_hosp_cg',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hosp_cg" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Requiere Hospitalizar en:</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Requiere Hospitalizacion?" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_cg" id="obs_hosp_cg"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Otro Tratamiento</label>
                                                <select name="otrotto_cg" id="otrotto_cg" data-titulo="Otro Tratamiento." data-seccion=" Plan de tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otrotto_cg','div_detalle_otrotto_cg','obs_otrotto_cg',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_otrotto_cg" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Otro Tratamiento." data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otrotto_cg" id="obs_otrotto_cg"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--HOSPITALIZACION-->
                                <div class="tab-pane fade show" id="in_hosp_cg" role="tabpanel" aria-labelledby="in_hosp_cg-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Detalle hospitalización</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Hospitalizar En:</label>
                                                <select name="hospen_cg" id="hospen_cg" data-titulo="Hospitalización" data-seccion="Hospitalizacion" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hospen_cg','div_detalle_hospen_cg','obs_hospen_cg',3);limpiar_hospitalizacion('hospen_cg',0,)">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Clínica</option>
                                                    <option value="2">Hospital</option>
                                                    <option value="3">Otro Describir</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hospen_cg" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Lugar Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" data-seccion="Hospitalizacion" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hospen_cg" id="obs_hospen_cg"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <select name="hosp_enserv_cg" id="hosp_enserv_cg" data-titulo="En Servicio" data-seccion="Hospitalizacion" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_enserv_cg','div_detalle_hosp_enserv_cg','obs_hosp_enserv_cg',4);">
                                                    <option value="1" selected>Servicio Cirugía</option>
                                                    <option value="2">UTI</option>
                                                    <option value="3">Servicio de urgencia</option>
                                                    <option value="4">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hosp_enserv_cg" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Servicio Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. En Servicio" data-seccion="Hospitalizacion" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv_cg" id="obs_hosp_enserv_cg"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Otro Tratamiento</label>
                                                <select name="otro_tto_cg" id="otro_tto_cg" data-titulo="Otro Tratamiento" data-seccion="Hospitalizacion" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro_tto_cg','div_detalle_otro_tto_cg','obs_otro_tto_cg',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_otro_tto_cg" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" data-seccion="Hospitalizacion" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro_tto_cg" id="obs_otro_tto_cg"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Observaciones a la Hospitalización</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Hospitalizacion" data-seccion="Hospitalizacion" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizacion_cg" id="obs_hospitalizacion_cg"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresomedico()";<i class="feather icon-save"></i> Orden de Hospitalización Tto Médico</button>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sol_pabellon()";<i class="feather icon-save"></i> Solicitar Pabellón</button>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingreso()";<i class="feather icon-save"></i> Orden de Hospitalización Cirugía</button>
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


<script>
    function ingreso() {
        $('#ingreso_modal').modal('show');
    }

    function ingresomedico() {
        $('#ingreso_m_modal').modal('show');
    }

    function cargar_info_ficha_tipo_cg(select, div_descripcion)
    {
        let id_ft = $('#'+select).val();
        if(id_ft == '')
        {
            $('#'+div_descripcion).html('');
            $('#form-cg').find('select,textarea').each(function(key, elemento){
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    $(elemento).val(1);
                }
                else
                {
                    $(elemento).val('');
                }
            });

            evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
            evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
            evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
            evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
            evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

            return false;
        }
        $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

        url = "{{ route('profesional.buscar_ficha_tipo_cg') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional : $('#id_profesional_fc').val(),
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

                    $('#'+index).val(value);
                });
                evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

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


    function abrir_modal_guardar_tipo_cg(div_id_data, div_id_detalle,tipo)
    {
        $('#btn_modal_registrar_ficha_tipo_dg').unbind('click');
        var titulo = 'Registre Su Ficha Tipo';
        if(tipo == 'cdg')
        {
            $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                guardar_tipo_ficha_cdg();
            });
        }
        else if(tipo == 'cg')
        {
            $('#btn_modal_registrar_ficha_tipo_dg').click(function(){

                guardar_tipo_ficha_cg();
            });
        }
        $('#modal_registrar_ficha_tipo_dg').find('.modal-title').html(titulo);
        $('#modal_registrar_ficha_tipo_dg').modal('show');

        cargarSeccion_cg(div_id_detalle,div_id_data);
    }

    function cargarSeccion_cg(div_destino, div_data)
    {
        console.log(div_data);
        // var tipo = $('#'+select+'').val();
        $('#'+div_destino).html('');
        $('#'+div_data).find('select,textarea').each(function(key, elemento){
            html ='';
            html +='<div class="row" style="margin-top:10px;">';
            if($(elemento).prop('nodeName') == 'SELECT')
            {
                if($(elemento).data('no_mostrar') != 1)
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
            }
            else if($(elemento).prop('nodeName') == 'TEXTAREA')
            {
                if($(elemento).data('no_mostrar') != 1)
                {
                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-6">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';
                }

            }
            html +='</div>';
            $('#'+div_destino).append(html);
        });
    }

    function guardar_tipo_ficha_cg()
    {
        var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
        var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
        var _token = CSRF_TOKEN;
        if(registro_f_t_cg_nombre == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }
        if(registro_f_t_cg_descripcion == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }


        var data = [];
        data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
        data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

        $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
            {{--  console.log($(elemento).attr('id'));  --}}
            {{--  console.log($(elemento).val());  --}}
            {{--  console.log($(elemento).prop('nodeName'));  --}}
            {{--  console.log('*******');  --}}

            data[$(elemento).attr('id')] = $(elemento).val();

        });

        console.log(data);
        url = "{{ route('profesional.ficha_tipo_cg') }}";
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional : $('#id_profesional_fc').val(),
                ind_esp_cirugia : '',
                nombre : data.registro_f_t_cg_nombre,
                descripcion : data.registro_f_t_cg_descripcion,
                e_general : data.modal_agregar_tipo_e_general,
                obs_e_general : data.observaciones_obs_e_general,
                e_signos_vit : data.modal_agregar_tipo_e_signos_vit,
                obs_e_signos_vit : data.observaciones_obs_e_signos_vit,
                e_dolor_loc : data.modal_agregar_tipo_e_dolor_loc,
                obs_e_dolor_loc : data.observaciones_obs_e_dolor_loc,
                masas_pal : data.modal_agregar_tipo_masas_pal,
                obs_masas_pal : data.observaciones_obs_masas_pal,
                e_piel_fan : data.modal_agregar_tipo_e_piel_fan,
                obs_e_piel_fan : data.observaciones_obs_e_piel_fan,
                ex_cabcuello : data.modal_agregar_tipo_ex_cabcuello,
                obs_ex_cabcuello : data.observaciones_obs_ex_cabcuello,
                ex_torax : data.modal_agregar_tipo_ex_torax,
                obs_ex_torax : data.observaciones_obs_ex_torax,
                ex_abdomen : data.modal_agregar_tipo_ex_abdomen,
                obs_ex_abdomen : data.observaciones_obs_ex_abdomen,
                ex_muscesq : data.modal_agregar_tipo_ex_muscesq,
                obs_ex_muscesq : data.observaciones_obs_ex_muscesq,
                ex_o_sent : data.modal_agregar_tipo_ex_o_sent,
                obs_ex_o_sent : data.observaciones_obs_ex_o_sent,
                obs_ex_segmentario : data.observaciones_obs_ex_segmentario,
                urgencia_cg : data.modal_agregar_tipo_urgencia_cg,
                obs_urgencia_cg : data.observaciones_obs_urgencia_cg,
                hosp_cg : data.modal_agregar_tipo_hosp_cg,
                obs_hosp_cg : data.observaciones_obs_hosp_cg,
                otrotto_cg : data.modal_agregar_tipo_otrotto_cg,
                obs_otrotto_cg : data.observaciones_obs_otrotto_cg,
                obs_plan_tratamiento : data.observaciones_obs_plan_tratamiento,
                hospen_cg : data.modal_agregar_tipo_hospen_cg,
                obs_hospen_cg : data.observaciones_obs_hospen_cg,
                hosp_enserv_cg : data.modal_agregar_tipo_hosp_enserv_cg,
                obs_hosp_enserv_cg : data.observaciones_obs_hosp_enserv_cg,
                otro_tto_cg : data.modal_agregar_tipo_otro_tto_cg,
                obs_otro_tto_cg : data.observaciones_obs_otro_tto_cg,
                obs_hospitalizacion_cg : data.observaciones_obs_hospitalizacion_cg,
            },
        })
        .done(function(data)
        {
            {{--  console.log('-----------------------');  --}}
            {{--  console.log(data);  --}}
            {{--  console.log('-----------------------');  --}}
            if(data.estado == 1)
            {
                cargar_lista_tipo_cg();
                $('#modal_registrar_ficha_tipo_dg').modal('hide');
                swal({
                    title: "Tipo Ficha Registrado",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
            else
            {
                cargar_lista_tipo_cg();
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

    function cargar_lista_tipo_cg()
    {
        $('#select_ficha_tipo_especialidad_cg').html('<option value="">Seleccione</option>');

        url = "{{ route('profesional.cargar_fichas_tipo_cg') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional : $('#id_profesional_fc').val(),
            },
        })
        .done(function(data)
        {
            if(data.estado == 1)
            {
                $.each(data.registros, function(index, value)
                {
                    $('#select_ficha_tipo_especialidad_cg').append('<option value="'+value.id+'" data-descripcion="'+value.descripcion+'">'+value.nombre+'</option>');
                });
                cargar_info_ficha_tipo_cg('select_ficha_tipo_especialidad_cg','descripcion_ficha_tipo_especialidad_cg');
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

</script>
