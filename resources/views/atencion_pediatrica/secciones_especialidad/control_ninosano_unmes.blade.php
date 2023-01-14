 <!--Recién nacido (1 mes)-->
 <div class="tab-pane fade" id="pills-1-mes" role="tabpanel" aria-labelledby="pills-1-mes-tab">
    <div class="row">
        <div class="col-md-12 mt-1">
            <h6 class="text-c-blue f-16">Control 1 mes</h6>
        </div>
    </div>
    <hr>
    <div class="form-row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="floating-label-activo-sm">Anamnesis</label>
                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_1anamnesis" name="p_1anamnesis" ></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="floating-label-activo-sm">Relaciones Fam</label>
                <select name="p_1_p_relfam" data-titulo="Relaciones_fam" id="p_1_p_relfam" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_relfam','div_p_1_relfam','obs_p_1_prelfam',2);">
                    <option selected value="1">Normal y Felíz</option>
                    <option value="2">Anormal</option>
                    <option value="3">No Realizada</option>
                </select>
            </div>
            <div class="form-group" id="div_p_1_relfam" style="display:none">
                <label class="floating-label-activo-sm">Relaciones Fam</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Relaciones_fam" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_relfam" id="obs_p_1_prelfam"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="form-row mb-2">
                <div class="col-md-12">
                    <h6>Examen físico del menor</h6>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Piél</label>
                        <select name="p_1_p_piel" id="p_1_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_piel','div_p_1_p_piel','obs_p_1_p_piel',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterada</option>
                            <option value="3">No Examinada</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_piel" style="display:none">
                        <label class="floating-label-activo-sm">Examen de Piél </label>
                        <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_piel" id="obs_p_1_p_piel"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Ganglios</label>
                        <select name="p_1_ganglios" id="p_1_ganglios" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_ganglios','div_p_1_ganglios','obs_p_1_ganglios',2);">
                            <option selected value="1">Normal</option>
                            <option value="2">Anormales</option>
                            <option value="3">No Examinados</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_ganglios" style="display:none">
                        <label class="floating-label-activo-sm">Ganglios</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_ganglios" id="obs_p_1_ganglios"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Cardio_pulmonar</label>
                        <select name="p_1_p_cpulm" data-titulo="Cardio_pulm" id="p_1_p_cpulm" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_cpulm','div_p_1_p_cpulm','obs_p_1_p_cpulm',2);">
                            <option value="0">Seleccione</option>
                            <option selected value="1">Normal </option>
                            <option value="2">Alterado</option>
                            <option value="3">No Realizado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_cpulm" style="display:none">
                        <label class="floating-label-activo-sm">Cardio_pulmonar</label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Cardio_pulm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_cpulm" id="obs_p_1_p_cpulm"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Abdomen</label>
                        <select name="p_1_p_abd" id="p_1_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_abd','div_p_1_p_abd','obs_p_1_p_abd',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterado</option>
                            <option value="3">No Realizado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_abd" style="display:none">
                        <label class="floating-label-activo-sm">Abdomen</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_abd" id="obs_p_1_p_abd"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Ex.Genito-anal</label>
                        <select name="p_1_exganal" id="p_1_exganal" data-titulo="Ex.Genito-anal"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_exganal','div_p_1_exganal','obs_p_1_exganal',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterado</option>
                            <option value="3">No Realizado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_exganal" style="display:none">
                        <label class="floating-label-activo-sm">Ex.Genito-anal</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Ex.Genito-anal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_exganal" id="obs_p_1_exganal"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Reflejos </label>
                        <select name="p_1_p_ref" id="p_1_p_ref" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ref','div_p_1_p_ref','obs_p_1_p_ref',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterados</option>
                            <option value="3">No Realizados</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_ref" style="display:none">
                        <label class="floating-label-activo-sm">Reflejos</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ref" id="obs_p_1_p_ref"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Motilidad</label>
                        <select name="p_1_p_mot" id="p_1_p_mot" data-titulo="Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_mot','div_p_1_p_mot','obs_p_1_p_mot',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterada</option>
                            <option value="3">No Examinada</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_mot" style="display:none">
                        <label class="floating-label-activo-sm">Examen de Motilidad </label>
                        <textarea class="form-control form-control-sm"  data-titulo="Motilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_mot" id="obs_p_1_p_mot"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Tono Axilar</label>
                        <select name="p_1_tonoaxil" id="p_1_tonoaxil" data-titulo="Tono Axilar"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_tonoaxil','div_p_1_tonoaxil','obs_p_1_tonoaxil',2);">
                            <option selected value="1">Normal</option>
                            <option value="2">Anormales</option>
                            <option value="3">No Examinados</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_tonoaxil" style="display:none">
                        <label class="floating-label-activo-sm">Tono Axilar</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Tono Axilar" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_tonoaxil" id="obs_p_1_tonoaxil"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Signos Par.Cer</label>
                        <select name="p_1_p_paralisis" data-titulo="Signos Par.Cer" id="p_1_p_paralisis" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_paralisis','div_p_1_p_paralisis','obs_p_1_p_paralisis',2);">
                            <option value="0">Seleccione</option>
                            <option selected value="1">No</option>
                            <option value="2">Si</option>
                            <option value="3">No Evaluado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_paralisis" style="display:none">
                        <label class="floating-label-activo-sm">Signos Par.Cer</label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Signos Par.Cer" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_paralisis" id="obs_p_1_p_paralisis"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Columna</label>
                        <select name="p_1_p_col" id="p_1_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_col','div_p_1_p_col','obs_p_1_p_col',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterado</option>
                            <option value="3">No Realizado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_col" style="display:none">
                        <label class="floating-label-activo-sm">Columna</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_col" id="obs_p_1_p_col"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Caderas</label>
                        <select name="p_1_cadera" id="p_1_cadera" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_cadera','div_p_1_cadera','obs_p_1_cadera',2);">
                            <option selected value="1">Normales </option>
                            <option value="2">Alteradas</option>
                            <option value="3">No Realizado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_cadera" style="display:none">
                        <label class="floating-label-activo-sm">Caderas</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_cadera" id="obs_p_1_cadera"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Extremidades</label>
                        <select name="p_1_p_ext" id="p_1_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ext','div_p_1_p_ext','obs_p_1_p_ext',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterados</option>
                            <option value="3">No Realizados</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_ext" style="display:none">
                        <label class="floating-label-activo-sm">Extremidades</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ext" id="obs_p_1_p_ext"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Oftalmología</label>
                        <select name="p_1_p_ojo" id="p_1_p_ojo" data-titulo="Oftalmología"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ojo','div_p_1_p_ojo','obs_p_1_p_ojo',2);">
                            <option selected value="1">Normal </option>
                            <option value="2">Alterada</option>
                            <option value="3">No Examinada</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_ojo" style="display:none">
                        <label class="floating-label-activo-sm">Oftalmología</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Oftalmología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ojo" id="obs_p_1_p_ojo"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Audición</label>
                        <select name="p_1_audio" id="p_1_audio" data-titulo="Audición"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_audio','div_p_1_audio','obs_p_1_audio',2);">
                            <option selected value="1">Normal</option>
                            <option value="2">Anormal</option>
                            <option value="3">No Examinada</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_audio" style="display:none">
                        <label class="floating-label-activo-sm">Audición</label>
                        <textarea class="form-control form-control-sm"  data-titulo="Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_audio" id="obs_p_1_audio"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Buco-Dental</label>
                        <select name="p_1_p_bd" data-titulo="Buco-Dental" id="p_1_p_bd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_bd','div_p_1_p_bd','obs_p_1_p_bd',2);">
                            <option value="0">Seleccione</option>
                            <option selected value="1">Normal </option>
                            <option value="2">Alterado</option>
                            <option value="3">No Realizado</option>
                        </select>
                    </div>
                    <div class="form-group" id="div_p_1_p_bd" style="display:none">
                        <label class="floating-label-activo-sm">Buco-Dental</label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Buco-Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_bd" id="obs_p_1_p_bd"></textarea>
                    </div>
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
