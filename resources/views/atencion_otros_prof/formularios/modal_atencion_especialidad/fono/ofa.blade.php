<div id="est_ofa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="est_ofa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_ofa">Evaluación OFA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ofa-cara-tab" data-toggle="tab" href="#ofa_cara" role="tab" aria-controls="ofa_cara" aria-selected="false">Cara</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="boca-tab" data-toggle="tab" href="#boca" role="tab" aria-controls="boca" aria-selected="true">Boca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="lengua-tab" data-toggle="tab" href="#lengua" role="tab" aria-controls="lengua" aria-selected="true">Lengua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ofa-labios-tab" data-toggle="tab" href="#ofa_labios" role="tab" aria-controls="ofa_labios" aria-selected="false">Labios</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-ofa">
                            <!--CARA-->
                            <div class="tab-pane fade show active" id="ofa_cara" role="tabpanel" aria-labelledby="ofa-cara-tab">
                                <form>
                                    <div id="Boca" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN DE LA CARA</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Estructura ósea</label>
                                                <select name="ofa_ca_eo" id="ofa_ca_eo" data-titulo="Estructura ósea" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ca_eo','div_ofa_ca_eo','ofa_ca_eo_obs',2);">
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ca_eo" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Estructura ósea</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Estructura ósea" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ca_eo_obs" id="ofa_ca_eo_obs"></textarea>
                                            </div>
                                        </div>
                                       <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Forma Facial</label>
                                                <select name="ofa_ca_ff" id="ofa_ca_ff" data-titulo="Forma Facial" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ca_ff','div_ofa_ca_ff','ofa_ca_ff_obs',2);">
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ca_ff" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Forma Facial</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Forma Facial" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ca_ff_obs" id="ofa_ca_ff_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Apertura Bucal</label>
                                                <select name="ofa_ca_ab" id="ofa_ca_ab" data-titulo="Apertura Bucal" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ca_ab','div_ofa_ca_ab','ofa_ca_ab_obs',2);">
                                                    <option value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ca_ab" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Apertura Bucal</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Apertura Bucal" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ca_ab_obs" id="ofa_ca_ab_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Dientes</label>
                                                <select name="ofa_car_di" id="ofa_car_di" data-titulo="Dientes" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_car_di','div_ofa_car_di','ofa_car_di_obs',2);">
                                                    <option value="1">Normales</option>
                                                    <option value="2">Anormales</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_car_di" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Dientes</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Dientes" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_car_di_obs" id="ofa_car_di_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Mordida</label>
                                                <select name="ofa_ca_mord" id="ofa_ca_mord" data-titulo="Mordida" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ca_mord','div_ofa_ca_mord','ofa_ca_mord_obs',2);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ca_mord" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Mordida</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Mordida" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ca_mord_obs" id="ofa_ca_mord_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nariz</label>
                                                <select name="ofa_cara_na" id="ofa_cara_na" data-titulo="Nariz" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_cara_na','div_ofa_cara_na','ofa_cara_na_obs',2);">
                                                    <option value="1">Normal</option>
                                                    <option value="2">Con Alteraciones</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_cara_na" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Nariz</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Nariz" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_cara_na_obs" id="ofa_cara_na_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Examen de la Cara</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Cara" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_cara_obs" id="ofa_cara_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--BOCA-->
                            <div class="tab-pane fade show" id="boca" role="tabpanel" aria-labelledby="boca-tab">
                                <form>
                                    <div id="Boca" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">BOCA</h6> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Vestíbulo Bucal</label>
                                                <select name="ofa_vest_boc" id="ofa_vest_boc" data-titulo="Vestíbulo Bucal" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_vest_boc','div_ofa_vest_boc','ofa_vest_boc_obs',2);">
                                                    <option value="1"> Adecuado</option>
                                                    <option value="2"> Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_vest_boc" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Vestíbulo</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Vestíbulo Bucal" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_vest_boc_obs" id="ofa_vest_boc_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Frenillo Superior</label>
                                                <select name="ofa_fre_sup" id="ofa_fre_sup" data-titulo="Frenillo Superior" data-seccion="BOCA"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_fre_sup','div_ofa_fre_sup','ofa_fre_sup_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_fre_sup" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Frenillo Superior</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Superior" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_fre_sup_obs" id="ofa_fre_sup_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Frenillo Inferior</label>
                                                <select name="ofa_fr_inf" id="ofa_fr_inf" data-titulo="Frenillo Inferior" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_fr_inf','div_ofa_fr_inf','ofa_fr_inf_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_fr_inf" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Frenillo Inferior</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Frenillo Inferior" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_fr_inf_obs" id="ofa_fr_inf_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Frenillo Sublingual</label>
                                                <select name="ofa_fr_sl" id="ofa_fr_sl" data-titulo="Frenillo Sublingual" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_fr_sl','div_ofa_fr_sl','ofa_fr_sl_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_fr_sl" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Frenillo Sublingual</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Sublingual" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_fr_sl_obs" id="ofa_fr_sl_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Paladar Duro</label>
                                                <select name="ofa_pd" id="ofa_pd"data-titulo="Paladar Duro" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_pd','div_ofa_pd','ofa_pd_obs',7);">
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
                                            <div class="form-group" id="div_ofa_pd" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Paladar Duro</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Paladar Duro" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_pd_obs" id="ofa_pd_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Paladar Blando</label>
                                                <select name="ofa_pb" id="ofa_pb"data-titulo="Paladar Blando" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_pb','div_ofa_pb','ofa_pb_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_pb" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Paladar Blando</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Paladar Blando" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_pb_obs" id="ofa_pb_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cierre Velo-faringeo</label>
                                                <select name="ofa_cvf" id="ofa_cvf"data-titulo="Cierre Velo-faringeo" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_cvf','div_ofa_cvf','ofa_cvf_obs',5);">
                                                    <option value="1">Coronal</option>
                                                    <option value="2">Sagital</option>
                                                    <option value="3">Circular</option>
                                                    <option value="4">Circular en Rodete de Passavant</option>
                                                    <option value="5">Otro (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_cvf" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Cierre Velo-faringeo</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Cierre Velo-faringeo" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_cvf_obs" id="ofa_cvf_obs"></textarea>
                                            </div>
                                        </div>
                                       <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Úvula</label>
                                                <select name="ofa_uvul" id="ofa_uvul" data-titulo="Úvula" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_uvul','div_ofa_uvul','ofa_uvul_obs',7);">
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
                                            <div class="form-group" id="div_ofa_uvul" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Úvula</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Úvula" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_uvul_obs" id="ofa_uvul_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Amigdalas</label>
                                                <select name="ofa_amig" id="ofa_amig" data-titulo="Amigdalas" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_amig','div_ofa_amig','ofa_amig_obs',3);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2">Hipertroficas</option>
                                                    <option value="3"> Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_amig" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Amigdalas</label>
                                                <textarea class="form-control form-control-sm"data-titulo="Obs. Amigdalas" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_amig_obs" id="ofa_amig_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Adenoídes</label>
                                                <select name="ofa_aden" id="ofa_aden" data-titulo="Adenoídes" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_aden','div_ofa_aden','ofa_aden_obs',3);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2">Hipertroficas</option>
                                                    <option value="3"> Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_aden" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Adenoídes</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Adenoídes" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_aden_obs" id="ofa_aden_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label id="" name="" class="floating-label-activo-sm">Obs Examen de la Boca</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Boca" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_boc_obs" id="ofa_boc_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--LENGUA-->
                            <div class="tab-pane fade show" id="lengua" role="tabpanel" aria-labelledby="lengua-tab">
                                <form>
                                    <div id="Boca" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN DE LA LENGUA</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Forma Lingual</label>
                                                <select name="ofa_le_f" id="ofa_le_f" data-titulo="Forma Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_le_f','div_ofa_le_f','ofa_le_f_obs',2);">
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_le_f" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Forma Lingual</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Forma Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_le_f_obs" id="ofa_le_f_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Posición</label>
                                                <select name="ofa_le_po" id="ofa_le_po" data-titulo="Posición" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_le_po','div_ofa_le_po','ofa_le_po_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_le_po" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Posición</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Posición" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_le_po_obs" id="ofa_le_po_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tono Lingual</label>
                                                <select name="ofa_le_to" id="ofa_le_to" data-titulo="Tono Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_le_to','div_ofa_le_to','ofa_le_to_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_le_to" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Tono Lingual</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Tono Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_le_to_obs" id="ofa_le_to_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cicatrices</label>
                                                <select name="ofa_le_ci" id="ofa_le_ci" data-titulo="Cicatrices" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_le_ci','div_ofa_le_ci','ofa_le_ci_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_le_ci" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Cicatrices</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Cicatrices" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_le_ci_obs" id="ofa_le_ci_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tamaño</label>
                                                <select name="ofa_le_ta" id="ofa_le_ta" data-titulo="Tamaño" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_le_ta','div_ofa_le_ta','ofa_le_ta_obs',4);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Microglosia</option>
                                                    <option value="3"> Macroglosia</option>
                                                    <option value="4"> Otra (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_le_ta" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Tamaño</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs. Tamaño" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_le_ta_obs" id="ofa_le_ta_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Funcionalidad Lingual</label>
                                                <select name="ofa_le_fu" id="ofa_le_fu" data-titulo="Funcionalidad Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_le_fu','div_ofa_le_fu','ofa_le_fu_obs',2);">
                                                    <option value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_le_fu" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Funcionalidad Lingual</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_le_fu_obs" id="ofa_le_fu_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Examen de la Lengua</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Lengua" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_leng_obs" id="ofa_leng_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>                    
                            </div>
                            <!--LABIOS-->
                            <div class="tab-pane fade show" id="ofa_labios" role="tabpanel" aria-labelledby="ofa-labios-tab">
                                <form>
                                    <div id="labios" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">EXAMEN DE LOS LABIOS</h6>
                                        </div>
                                    </div>
                                    <div id="labios_sup" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten"> Labio Superior</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Forma Labio</label>
                                                <select name="ofa_ls_f" id="ofa_ls_f" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_f','div_ofa_ls_f','ofa_ls_f_obs',2);">
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
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
                                                <label class="floating-label-activo-sm">Cicatriz</label>
                                                <select name="ofa_ls_c" id="ofa_ls_c" data-titulo="Cicatriz" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_c','div_ofa_ls_c','ofa_ls_c_obs',2);">
                                                    <option value="1">No</option>
                                                    <option value="2">Si (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_c" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Cicatriz</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Cicatriz" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_c_obs" id="ofa_ls_c_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Posición</label>
                                                <select name="ofa_ls_ps" id="ofa_ls_ps" data-titulo="Posición" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_ps','div_ofa_ls_ps','ofa_ls_ps_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_ps" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Posición</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Posición" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_ps_obs" id="ofa_ls_ps_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tamaño</label>
                                                <select name="ofa_ls_tm" id="ofa_ls_tm" data-titulo="Tamaño" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_tm','div_ofa_ls_tm','ofa_ls_tm_obs',2);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Anormal (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_tm" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Tamaño</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Tamaño" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_tm_obs" id="ofa_ls_tm_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Funcionalidad Labial</label>
                                                <select name="ofa_ls_func" id="ofa_ls_func" data-titulo="Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_ls_func','div_ofa_ls_func','ofa_ls_func_obs',2);">
                                                    <option value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_ls_func" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Funcionalidad Labial</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_ls_func_obs" id="ofa_ls_func_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Examen del Labio Superior</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen del Labio Superior" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_lab_obs" id="ofa_lab_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="labios_inf" class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">  Labio Inferior</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Forma Labio</label>
                                                <select name="ofa_li_f" id="ofa_li_f" data-titulo="Forma Labios" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_li_f','div_ofa_li_f','ofa_li_f_obs',2);">
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Alterada (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_li_f" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Forma Labios</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_li_f_obs" id="ofa_li_f_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tono</label>
                                                <select name="ofa_li_t" id="ofa_li_t" data-titulo="Tono" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_li_t','div_ofa_li_t','ofa_li_t_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alterado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_li_t" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Tono</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Obs Tono" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_li_t_obs" id="ofa_li_t_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cicatriz</label>
                                                <select name="ofa_li_c" id="ofa_li_c" data-titulo="Cicatriz" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_li_c','div_ofa_li_c','ofa_li_c_obs',2);">
                                                    <option value="1">No</option>
                                                    <option value="2">Si (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_li_c" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Cicatriz</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs.Cicatriz" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_li_c_obs" id="ofa_li_c_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Posición</label>
                                                <select name="ofa_li_ps" id="ofa_li_ps" data-titulo="Posición" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_li_ps','div_ofa_li_ps','ofa_li_ps_obs',2);">
                                                    <option value="1">Adecuado</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_li_ps" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Posición</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Posición" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_li_ps_obs" id="ofa_li_ps_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tamaño</label>
                                                <select name="ofa_li_tm" id="ofa_li_tm" data-titulo="Tamaño" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_li_tm','div_ofa_li_tm','ofa_li_tm_obs',2);">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1"> Normal</option>
                                                    <option value="2"> Anormal (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_li_tm" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Tamaño</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Tamaño" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_li_tm_obs" id="ofa_li_tm_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Funcionalidad Labial</label>
                                                <select name="ofa_li_func" id="ofa_li_func" data-titulo="Funcionalidad Labial" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ofa_li_func','div_ofa_li_func','ofa_li_func_obs',2);">
                                                    <option value="1">Adecuada</option>
                                                    <option value="2">Alteracion Funcional</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_ofa_li_func" style="display:none">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Funcionalidad Labial</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Labial" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_li_func_obs" id="ofa_li_func_obs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label id="" name="" class="floating-label-activo-sm">Obs. Examen del Labio Inferior</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen del Labio Superior" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ofa_lab_obs" id="ofa_lab_obs"></textarea>
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
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"> <i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function est_ofa(){
        $('#est_ofa').modal('show');
    }
</script>
