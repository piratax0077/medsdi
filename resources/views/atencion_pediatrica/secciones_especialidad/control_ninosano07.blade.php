 <!--Recién nacido (0 y 7 días)-->
 <div class="tab-pane fade" id="pills-0-7-dias" role="tabpanel" aria-labelledby="pills-0-7-dias-tab">
    <div class="row bg-white shadow-none rounded mx-1">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-3 mb-0">
                    <h6 class="text-c-blue f-16">Recién nacido (0 y 7 días)</h6>
                    <hr>
                </div>
            </div>
            <div class="row">
                <hr>
                <div class="form-row">
                    <div class="col-md-12">
                        <h6>Control parámetros Generales</h6>
                    </div>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Anamnesis</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07anamnesis" name="p_07anamnesis" ></textarea>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Exper.Embarazo gral.</label>
                            <select name="p_07_p_puerp" data-titulo="Experiencia_parto" id="p_07_p_puerp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_puerp','div_p_07_p_puerp','obs_p_07_p_puerp',2);">
                                <option selected value="1">Normal y Felíz</option>
                                <option value="2">Anormal</option>
                                <option value="3">No Realizada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_puerp" style="display:none">
                            <label class="floating-label-activo-sm">Experiencia del embarazo parto y puerperio(describir)</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_puerp" id="obs_p_07_p_puerp"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Est. Emoc.redes </label>
                            <select name="p_07_p" id="p_07_p" data-titulo="Emoción"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p','div_p_07_p','obs_p_07_p',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterado</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p" style="display:none">
                            <label class="floating-label-activo-sm">Estado emocional familiar(describir)</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Emoción" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p" id="obs_p_07_p"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Lactancia </label>
                            <select name="p_07_p_lactancia" id="p_07_p_lactancia" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_lactancia','div_p_07_p_lactancia','obs_p_07_p_lactancia',2);">
                                <option selected value="1">Normal e Informada</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Examinada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_lactancia" style="display:none">
                            <label class="floating-label-activo-sm">Lactancia(describir)</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_lactancia" id="obs_p_07_p_lactancia"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ant. heredo-fam. Mat.</label>
                            <select name="p_07_p_ant_mat" id="p_07_p_ant_mat" data-titulo="Antec_mat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_mat','div_p_07_p_ant_mat','obs_p_07_p_ant_mat',2);">
                                <option selected value="1">No</option>
                                <option value="2">Si</option>
                                <option value="3">No Informada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_ant_mat" style="display:none">
                            <label class="floating-label-activo-sm">Ant. heredo-fam. Mat.</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ant_mat" id="obs_p_07_p_ant_mat"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ant. heredo-fam. Pat.</label>
                            <select name="p_07_p_ant_pat" id="p_07_p_ant_pat" data-titulo="Antec_pat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_pat','div_p_07_p_ant_pat','obs_p_07_p_ant_pat',2);">
                                <option selected value="1">No</option>
                                <option value="2">Si</option>
                                <option value="3">No Informada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_ant_pat" style="display:none">
                            <label class="floating-label-activo-sm">Ant. heredo-fam. Pat.</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ant_pat" id="obs_p_07_p_ant_pat"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-12">
                        <h6>Examen físico del menor</h6>
                    </div>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Inspección general</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07insp" name="p_07insp" ></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Actividad</label>
                            <select name="p_07_p_rnact" data-titulo="Actividad" id="p_07_p_rnact" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_rnact','div_p_07_p_rnact','obs_p_07_p_rnact',2);">
                                <option value="0">Seleccione</option>
                                <option selected value="1">Normal y Felíz</option>
                                <option value="2">Anormal</option>
                                <option value="3">No Realizada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_rnact" style="display:none">
                            <label class="floating-label-activo-sm">Actividad</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_rnact" id="obs_p_07_p_rnact"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Malformaciones</label>
                            <select name="p_07_malf" id="p_07_malf" data-titulo="Malf"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_malf','div_p_07_malf','obs_p_07_malf',2);">
                                <option selected value="1">No</option>
                                <option value="2">Si</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_malf" style="display:none">
                            <label class="floating-label-activo-sm">Malformaciones</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Malf" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_malf" id="obs_p_07_malf"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tono y Postura </label>
                            <select name="p_07_p_tp" id="p_07_p_tp" data-titulo="Tono"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tp','div_p_07_p_tp','obs_p_07_p_tp',2);">
                                <option selected value="1">Normal </option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_tp" style="display:none">
                            <label class="floating-label-activo-sm">Tono y Postura</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Tono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_tp" id="obs_p_07_p_tp"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Piél</label>
                            <select name="p_07_p_piel" id="p_07_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_piel','div_p_07_p_piel','obs_p_07_p_piel',2);">
                                <option selected value="1">Normal </option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_piel" style="display:none">
                            <label class="floating-label-activo-sm">Examen de Piél </label>
                            <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_piel" id="obs_p_07_p_piel"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                            <select name="p_07_p_ojo" id="p_07_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ojo','div_p_07_p_ojo','obs_p_07_p_ojo',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterado</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_ojo" style="display:none">
                            <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ojo" id="obs_p_07_p_ojo"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ex Buco-dental</label>
                            <select name="p_07_p_dental" id="p_07_p_dental" data-titulo="Dental"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_dental','div_p_07_p_dental','obs_p_07_p_dental',2);">
                                <option selected value="1">Normal </option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_dental" style="display:none">
                            <label class="floating-label-activo-sm">Ex Buco-dental</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_dental" id="obs_p_07_p_dental"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label">Cabeza y Cuello</label>
                            <select name="p_07_p_ccuello" data-titulo="Cab_cuello" id="p_07_p_ccuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ccuello','div_p_07_p_ccuello','obs_p_07_p_ccuello',2);">
                                <option selected value="1">Normal </option>
                                <option value="2">Anormal</option>
                                <option value="3">No Realizada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_ccuello" style="display:none">
                            <label class="floating-label">Cabeza y Cuello</label>
                            <textarea class="form-control form-control-sm" data-titulo="Cab_cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ccuello" id="obs_p_07_p_ccuello"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cordón</label>
                            <select name="p_07_pcordon" id="p_07_pcordon" data-titulo="Cordon"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_pcordon','div_p_07_pcordon','obs_p_07_pcordon',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterado</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_pcordon" style="display:none">
                            <label class="floating-label-activo-sm">Cordón</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Cordon" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_pcordon" id="obs_p_07_pcordon"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Abdomen</label>
                            <select name="p_07_p_abd" id="p_07_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_abd','div_p_07_p_abd','obs_p_07_p_abd',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_abd" style="display:none">
                            <label class="floating-label-activo-sm">Abdomen</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_abda" id="obs_p_07_p_abd"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tórax</label>
                            <select name="p_07_p_torax" id="p_07_p_torax" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_torax','div_p_07_p_torax','obs_p_07_p_torax',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_torax" style="display:none">
                            <label class="floating-label-activo-sm">Tórax</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_torax" id="obs_p_07_p_torax"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Columna</label>
                            <select name="p_07_p_col" id="p_07_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_col','div_p_07_p_col','obs_p_07_p_col',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_col" style="display:none">
                            <label class="floating-label-activo-sm">Columna</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_col" id="obs_p_07_p_col"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Extremidades</label>
                            <select name="p_07_p_ext" id="p_07_p_ext" data-titulo="Extrem"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ext','div_p_07_p_ext','obs_p_07_p_ext',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_ext" style="display:none">
                            <label class="floating-label-activo-sm">Extremidades<</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ext" id="obs_p_07_p_ext"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="floating-label">Cabeza y Cuello</label>
                            <select name="p_07_p_ccuello" data-titulo="Cab_cuello" id="p_07_p_ccuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ccuello','div_p_07_p_ccuello','obs_p_07_p_ccuello',2);">
                                <option selected value="1">Normal </option>
                                <option value="2">Anormal</option>
                                <option value="3">No Realizada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_p_ccuello" style="display:none">
                            <label class="floating-label">Cabeza y Cuello</label>
                            <textarea class="form-control form-control-sm" data-titulo="Cab_cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ccuello" id="obs_p_07_p_ccuello"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cordón</label>
                            <select name="p_07_pcordon" id="p_07_pcordon" data-titulo="Cordon"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_pcordon','div_p_07_pcordon','obs_p_07_pcordon',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterado</option>
                                <option value="3">No Informadas</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_p_07_pcordon" style="display:none">
                            <label class="floating-label-activo-sm">Cordón</label>
                            <textarea class="form-control form-control-sm"  data-titulo="Cordon" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_pcordon" id="obs_p_07_pcordon"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Genitales</label>
                            <select name="p_07_p_gen" id="p_07_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_gen','div_p_07_p_gen','obs_p_07_p_gen',2);">

                                <option selected value="1">Normal</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>

                            <div class="form-group col-md-12" id="div_p_07_p_gen" style="display:none;">
                                <label class="floating-label-activo-sm">Genitales</label>
                                <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_gen" id="obs_p_07_p_gen"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ex Neurológico</label>
                            <select name="p_07_p_neuro" id="p_07_p_neuro" data-titulo="Neuro"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_neuro','div_p_07_p_neuro','obs_p_07_p_neuro',2);">
                                <option selected value="1">Normal</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Informadas</option>
                            </select>

                            <div class="form-group col-md-12" id="div_p_07_p_neuro" style="display:none;">
                                <label class="floating-label-activo-sm">Ex Neurológico</label>
                                <textarea class="form-control form-control-sm"  data-titulo="Neuro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_neuro" id="obs_p_07_p_neuro"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <!--Antropometría-->
                <div class="form-row">
                    <div class="col-md-12">
                        <h6>Antropometría</h6>
                    </div>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="floating-label">Peso (gr.)</label>
                        <input type="number" class="form-control form-control-sm" name="p_07peso" id="p_07peso">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="floating-label">Longitud (cm.)</label>
                        <input type="number" class="form-control form-control-sm" name="p_07longitud" id="p_07longitud">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="floating-label">Perímetro cefálico (cm.)</label>
                        <input type="number" class="form-control form-control-sm" name="p_07peri_cef" id="p_07peri_cef">
                    </div>
                    <div class="form-group col-md-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Val referencial</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Val referencial</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Estado de salud materno-->
                <div class="form-row">
                    <div class="col-md-12">
                        <h6>Estado de salud materno</h6>
                    </div>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">Signos vitales</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_sv" name="p_07_sv"></textarea>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="floating-label">Peso (kg.)</label>
                        <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="floating-label">Variación (kg.)</label>
                        <input type="number" class="form-control form-control-sm" name="p_07_matpeso_var" id="p_07_matpeso_var">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Involución uterina</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_utero" name="p_07_mat_utero" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Hda. Operatoria</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_heridaop" name="p_07_mat_heridaop" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Zona genito-anal</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ga" name="p_07_mat_ga" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Extremidades inferiores (edemas)</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ext" name="p_07_mat_ext" ></textarea>
                    </div>
                </div>
                <hr>
                <!--Lactancia materna-->
                <div class="form-row">
                    <div class="col-md-12">
                        <h6>Lactancia materna</h6>
                    </div>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Lactancia en general</label>
                            <select name="p_07_mat_lact" id="p_07_mat_lact" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lact','div_p_07_mat_lact','obs_p_07_mat_lact',2);">
                                <option selected value="1">Normal e Informada</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Examinada</option>
                            </select>
                            <div class="form-group col-md-12" id="div_p_07_mat_lact" style="display:none;">
                                <label class="floating-label-activo-sm">Ex. mamas</label>
                                <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_mat_lact" id="obs_p_07_mat_lact"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Técnica</label>
                            <select name="p_07_p_tlactancia" id="p_07_p_tlactancia" data-titulo="TLactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tlactancia','div_p_07_p_tlactancia','obs_p_07_p_tlactancia',2);">
                                <option selected value="1">Informada</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Examinada</option>
                            </select>
                            <div class="form-group col-md-12" id="div_p_07_p_tlactancia" style="display:none;">
                                <label class="floating-label-activo-sm">Técnica</label>
                                <textarea class="form-control form-control-sm"  data-titulo="TLactancia" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_tlactancia" id="obs_p_07_p_tlactancia"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                        <label class="floating-label-activo-sm">Ex. mamas</label>
                            <select name="p_07_mat_lactmamas" id="p_07_mat_lactmamas" data-titulo="ex_mamas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lactmamas','div_p_07_mat_lactmamas','obs_p_07_mat_lactmamas',2);">
                                <option selected value="1">Normales</option>
                                <option value="2">Alterada</option>
                                <option value="3">No Examinadas</option>
                            </select>
                            <div class="form-group col-md-12" id="div_p_07_mat_lactmamas" style="display:none;">
                                <label class="floating-label-activo-sm">Ex. mamas</label>
                                <textarea class="form-control form-control-sm"  data-titulo="ex_mamas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_mat_lactmamas" id="obs_p_07_mat_lactmamas"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                                <h6>Diagnósticos</h6>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">General</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_gen" name="p_07_dg_gen" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Incremento ponderal</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_in_pon" name="p_07_in_pon" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Lactancia</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_idg_lac" name="p_07_idg_lac" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Salud del lactante</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_sallac" name="p_07_dg_sallac" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Salud de la madre</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_salmaterna" name="p_07_dg_salmaterna" ></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Salud sico-social</label>
                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_salsicoso" name="p_07_dg_salsicoso" ></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                                <h6>Indicaciones y Próximo Control</h6>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="floating-label-activo-sm">Fecha</label>
                        <input type="date" class="form-control form-control-sm" name="p_07_fecha_proxcontrol" id="p_07_fecha_proxcontrol">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Control con:</label>
                        <input type="text" class="form-control form-control-sm" name="p_07_control_con" id="p_07_control_con">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="floating-label">Indicaciones</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_ind" id="p_07_ind"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="floating-label">Sugerencias</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_sugerencias" id="p_07_sugerencias"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
