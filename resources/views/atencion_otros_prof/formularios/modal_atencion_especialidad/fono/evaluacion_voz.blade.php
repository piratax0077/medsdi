<div id="m_voz" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_voz" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación de la voz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="eval_voz_general-tab" data-toggle="tab" href="#eval_voz_general" role="tab" aria-controls="eval_voz_general" aria-selected="false">P. Generales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_orofacial-tab" data-toggle="tab" href="#eval_voz_orofacial" role="tab" aria-controls="eval_voz_orofacial" aria-selected="true">Evaluación Orofacial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_postura-tab" data-toggle="tab" href="#eval_voz_postura" role="tab" aria-controls="eval_voz_postura" aria-selected="true">Evaluación Postural</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_respirac-tab" data-toggle="tab" href="#eval_voz_respirac" role="tab" aria-controls="eval_voz_respirac" aria-selected="false">Respiración</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_pvocales-tab" data-toggle="tab" href="#eval_voz_pvocales" role="tab" aria-controls="eval_voz_pvocales" aria-selected="false">Parámetros vocales</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-ofa">
                            <!--PARÁMETROS GENERALES-->
                            <div class="tab-pane fade show active" id="eval_voz_general" role="tabpanel" aria-labelledby="eval_voz_general-tab">
                                <form>
                                    <div id="Boca" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">PARÁMETROS GENERALES</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                            <label class="floating-label-activo-sm">Edad</label>
                                             <input type="text" class="form-control form-control-sm" name="edad_voz" id="edad_voz">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-5 col-xl-5">
                                            <label class="floating-label-activo-sm">Ocupación y horas uso</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-5 col-xl-5">
                                            <label class="floating-label-activo-sm">Data de la disfonía</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Exposición a ruidos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Audición</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Cuadros respiratórios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Medicamentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Patologias anteriores</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Hábitos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Tratamientos Anteriores</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                            <label class="floating-label-activo-sm">Observaciones Generales</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Superior" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fre_sup_obs" id="ev_voz_fre_sup_obs"></textarea>
                                        </div>
                                    </div>
                                </form>  
                            </div>
                            <!--EV. OROFACIAL-->
                            <div class="tab-pane fade show" id="eval_voz_orofacial" role="tabpanel" aria-labelledby="eval_voz_orofacial-tab">
                                <form>
                                    <div id="Boca" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN OROFACIAL</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Vestíbulo Bucal</label>
                                                <select name="ev_voz_vest_boc" id="ev_voz_vest_boc" data-titulo="Vestíbulo Bucal" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_vest_boc','div_ev_voz_vest_boc','ev_voz_vest_boc_obs',2);">
                                                    <option value="1"> Adecuado</option>
                                                    <option value="2"> Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_vest_boc" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Vestíbulo</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Vestíbulo Bucal" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_vest_boc_obs" id="ev_voz_vest_boc_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Frenillo Superior</label>
                                                <select name="ev_voz_fre_sup" id="ev_voz_fre_sup" data-titulo="Frenillo Superior" data-seccion="BOCA"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_fre_sup','div_ev_voz_fre_sup','ev_voz_fre_sup_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_fre_sup" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Frenillo Superior</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Superior" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fre_sup_obs" id="ev_voz_fre_sup_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Frenillo Inferior</label>
                                                <select name="ev_voz_fr_inf" id="ev_voz_fr_inf" data-titulo="Frenillo Inferior" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_fr_inf','div_ev_voz_fr_inf','ev_voz_fr_inf_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_fr_inf" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Frenillo Inferior</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Frenillo Inferior" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fr_inf_obs" id="ev_voz_fr_inf_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Frenillo Sublingual</label>
                                                <select name="ev_voz_fr_sl" id="ev_voz_fr_sl" data-titulo="Frenillo Sublingual" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_fr_sl','div_ev_voz_fr_sl','ev_voz_fr_sl_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_fr_sl" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Frenillo Sublingual</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Sublingual" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fr_sl_obs" id="ev_voz_fr_sl_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Paladar Duro</label>
                                                <select name="ev_voz_pd" id="ev_voz_pd"data-titulo="Paladar Duro" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_pd','div_ev_voz_pd','ev_voz_pd_obs',7);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Ojival</option>
                                                    <option value="3"> Plano</option>
                                                    <option value="4"> Fisurado Evidente</option>
                                                    <option value="5"> Sospecha Fisura Submucosa</option>
                                                    <option value="6"> Tumor</option>
                                                    <option value="7"> Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_pd" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Paladar Duro</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Paladar Duro" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_pd_obs" id="ev_voz_pd_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Paladar Blando</label>
                                                <select name="ev_voz_pb" id="ev_voz_pb"data-titulo="Paladar Blando" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_pb','div_ev_voz_pb','ev_voz_pb_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_pb" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Paladar Blando</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Paladar Blando" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_pb_obs" id="ev_voz_pb_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cierre Velo-faringeo</label>
                                                <select name="ev_voz_cvf" id="ev_voz_cvf"data-titulo="Cierre Velo-faringeo" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_cvf','div_ev_voz_cvf','ev_voz_cvf_obs',5);">
                                                    <option value="1">Coronal</option>
                                                    <option value="2">Sagital</option>
                                                    <option value="3">Circular</option>
                                                    <option value="4">Circular en Rodete de Passavant</option>
                                                    <option value="5">Otro (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_cvf" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Cierre Velo-faringeo</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Cierre Velo-faringeo" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_cvf_obs" id="ev_voz_cvf_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Úvula</label>
                                                <select name="ev_voz_uvul" id="ev_voz_uvul" data-titulo="Úvula" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_uvul','div_ev_voz_uvul','ev_voz_uvul_obs',7);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Ausente</option>
                                                    <option value="3"> Bífida</option>
                                                    <option value="4"> Larga</option>
                                                    <option value="5"> Corta</option>
                                                    <option value="6"> Tumor</option>
                                                    <option value="7"> Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_uvul" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Úvula</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Úvula" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_uvul_obs" id="ev_voz_uvul_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Amigdalas</label>
                                                <select name="ev_voz_amig" id="ev_voz_amig" data-titulo="Amigdalas" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_amig','div_ev_voz_amig','ev_voz_amig_obs',3);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2">Hipertroficas</option>
                                                    <option value="3"> Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_amig" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Amigdalas</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Amigdalas" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_amig_obs" id="ev_voz_amig_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Adenoídes</label>
                                                <select name="ev_voz_aden" id="ev_voz_aden" data-titulo="Adenoídes" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_aden','div_ev_voz_aden','ev_voz_aden_obs',3);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2">Hipertroficas</option>
                                                    <option value="3"> Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_voz_aden" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Adenoídes</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Adenoídes" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_aden_obs" id="ev_voz_aden_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                            <div class="form-group" id="div_ev_voz_vest_boc">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Examen de la Boca</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Boca" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_boc_obs" id="ev_voz_boc_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--EV. POSTURAL-->
                            <div class="tab-pane fade show" id="eval_voz_postura" role="tabpanel" aria-labelledby="eval_voz_postura-tab">
                                <form>
                                    <div id="Boca" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN POSTURAL</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Estática</label>
                                            <input type="text" class="form-control form-control-sm" name="tpo_max" id="tpo_max">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Dinámica</label>
                                            <input type="text" class="form-control form-control-sm" name="tpo_max" id="tpo_max">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-lg-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Flexión</label>
                                                <select name="ev_vf" id="ev_vf" data-titulo="Forma Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vf','div_ev_vf','ev_vf_obs',2);">
                                                    <option selected value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_vf" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Flexión</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Forma Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vf_obs" id="ev_vf_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Extensión</label>
                                                <select name="ev_vext" id="ev_vext" data-titulo="Posición" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vext','div_ev_vext','ev_vext_obs',2);">
                                                    <option selected value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_vext" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Extensión</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Posición" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vext_obs" id="ev_vext_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Rotación</label>
                                                <select name="ev_vro" id="ev_vro" data-titulo="Tono Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vro','div_ev_vro','ev_vro_obs',2);">
                                                    <option selected value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_vro" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Rotación</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Tono Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vro_obs" id="ev_vro_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Flexión Lateral</label>
                                                <select name="ev_vflat" id="ev_vflat" data-titulo="Cicatrices" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vflat','div_ev_vflat','ev_vflat_obs',2);">
                                                    <option selected value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_vflat" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Flexión Lateral</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Cicatrices" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vflat_obs" id="ev_vflat_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Altura Laríngea</label>
                                                <select name="ev_val" id="ev_val" data-titulo="Tamaño" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_val','div_ev_val','ev_val_obs',2);">
                                                    <option value="0">Seleccione</option>
                                                    <option selected value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ev_val" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Altura Laríngea</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Tamaño" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_val_obs" id="ev_val_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12" id="div_ofa_vest_boc">
                                            <label class="floating-label-activo-sm">Obs. Examen Postural</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Lengua" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_val_ep_obs" id="ev_val_ep_obs"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--RESPIRACION-->
                            <div class="tab-pane fade show" id="eval_voz_respirac" role="tabpanel" aria-labelledby="eval_voz_respirac-tab">
                                <form>
                                    <div id="labios" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN DE LA RESPIRACIÓN</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tórax</label>
                                                <select name="ofa_ls_f" id="ofa_ls_f" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_f','div_ofa_ls_f','ofa_ls_f_obs',2);">
                                                    <option selected value="1"> Normal</option>
                                                    <option value="2"> Alterado (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_f" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Tórax</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_f_obs" id="ofa_ls_f_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Dinámica</label>
                                                <input type="text" class="form-control form-control-sm" name="tpo_max" id="tpo_max">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Columna</label>
                                                <select name="ofa_ls_t" id="ofa_ls_t" data-titulo="Tono" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_t','div_ofa_ls_t','ofa_ls_t_obs',2);">
                                                    <option selected value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_t" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Columna</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Obs Tono" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_t_obs" id="ofa_ls_t_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tipo Respiratorio</label>
                                                <select name="ofa_ls_c" id="ofa_ls_c" data-titulo="Cicatriz" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_c','div_ofa_ls_c','ofa_ls_c_obs',2);">
                                                    <option selected value="1"> Normal</option>
                                                    <option value="2"> Alterado (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_c" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Tipo Respiratorio</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Cicatriz" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_c_obs" id="ofa_ls_c_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Modo</label>
                                                <select name="ofa_ls_ps" id="ofa_ls_ps" data-titulo="Posición" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_ps','div_ofa_ls_ps','ofa_ls_ps_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_ps" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Modo</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Posición" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_ps_obs" id="ofa_ls_ps_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Duración Soplo</label>
                                                <select name="ofa_ls_tm" id="ofa_ls_tm" data-titulo="Tamaño" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_tm','div_ofa_ls_tm','ofa_ls_tm_obs',2);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Anormal (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_tm" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Duración Soplo</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Tamaño" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_tm_obs" id="ofa_ls_tm_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Fuerza del Soplo</label>
                                                <select name="ofa_ls_func" id="ofa_ls_func" data-titulo="Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_func','div_ofa_ls_func','ofa_ls_func_obs',2);">
                                                    <option value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_func" style="display:none">
                                                <label class="floating-label-activo-sm">Obs. Fuerza del Soplo</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_func_obs" id="ofa_ls_func_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Coordinación Fono-resp</label>
                                                <select name="ofa_ls_func" id="ofa_ls_func" data-titulo="Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_func','div_ofa_ls_func','ofa_ls_func_obs',2);">
                                                    <option value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_func" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Coordinación Fono-resp</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_func_obs" id="ofa_ls_func_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label class="floating-label-activo-sm">Obs. Examen Respiratorio</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Examen Respiratorio" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_lab_obs" id="ofa_lab_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--PARAMETROS VOCALES-->
                            <div class="tab-pane fade show" id="eval_voz_pvocales" role="tabpanel" aria-labelledby="eval_voz_pvocales-tab">
                                <form>
                                    <div id="labios" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN DE PARÁMETROS VOCALES</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ataque</label>
                                                <select name="ofa_ls_f" id="ofa_ls_f" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_f','div_ofa_ls_f','ofa_ls_f_obs',2);">
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Alterada (describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_f" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Forma Labios</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_f_obs" id="ofa_ls_f_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tono</label>
                                                <select name="ofa_ls_t" id="ofa_ls_t" data-titulo="Tono" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_t','div_ofa_ls_t','ofa_ls_t_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alterado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_t" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Tono</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Obs Tono" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_t_obs" id="ofa_ls_t_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                <select name="ofa_ls_c" id="ofa_ls_c" data-titulo="Cicatriz" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_c','div_ofa_ls_c','ofa_ls_c_obs',2);">
                                                    <option value="1">No</option>
                                                    <option value="2">Si (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_c" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Intensidad</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Cicatriz" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_c_obs" id="ofa_ls_c_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function e_voz() {
        $('#m_voz').modal('show');
    }
</script>








