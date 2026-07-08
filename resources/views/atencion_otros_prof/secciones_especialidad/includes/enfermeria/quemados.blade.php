<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h6 class="t-aten">Curación Quemados</h6>
        </div>
        <ul class="nav nav-tabs-aten nav-fill mb-2" id="enf_urgencia" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="val_quem-tab" data-toggle="tab" href="#val_quem" role="tab" aria-controls="val_quem" aria-selected="true">Valoración</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="curac_quem-tab" data-toggle="tab" href="#curac_quem" role="tab" aria-controls="curac_quem" aria-selected="true">Curación</a>
            </li>
        </ul>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" id="quemados">
            <div class="tab-pane fade show active" id="val_quem" role="tabpanel" aria-labelledby="val_quem-tab">
                <div class="form-row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm t-red" for="qmsupqm">Superficie quemada</label>
                            <select name="qmsupqm" id="qmsupqm" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qmsupqm','div_qmsupqm','obs_qmsupqm',4);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">< 9% </option>
                                <option value="2">9-18%</option>
                                <option value="3"> >18%</option>
                                <option value="4">Otros</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_qmsupqm" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="obs_qmsupqm">Otras <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qmsupqm" id="obs_qmsupqm"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"onclick="quem();"> <i class="feather icon-plus"></i> Guía</button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm t-red" for="qmdr">Grado quemadura</label>
                            <select name="qmdr" id="qmdr" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qmdr','div_qmdr','obs_qmdr',11);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">Primer grado</option>
                                <option value="2">Segundo grado</option>
                                <option value="3">Tercer grado</option>
                                <option value="4">Mixta</option>
                                <option value="11">Observaciones</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_qmdr" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="obs_qmdr">Observaciones <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qmdr" id="obs_qmdr"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm t-red" for="bh_dren_1">Infección</label>
                            <select name="qm_presinf" id="qm_presinf" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qm_presinf','div_qm_presinf','obs_qm_presinf',2);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">No</option>
                                <option value="2">Si</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_qm_presinf" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="obs_qm_presinf">Observaciones Infección <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qm_presinf" id="obs_qm_presinfr"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm t-red" for="qm_tq">Tipo quemadura</label>
                            <select name="qm_tq" id="qm_tq" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qm_tq','div_qm_tq','obs_qm_tq',11);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">Solar</option>
                                <option value="2">Por Liquidos</option>
                                <option value="3">Vapores y gases</option>
                                <option value="4">Sust. Químicas</option>
                                <option value="5">Eléctricidad</option>
                                <option value="6">Fuego directo</option>
                                <option value="11">Otros</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_qm_tq" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="obs_qm_tq">Otra causa <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qm_tq" id="obs_qm_tq"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="qm_tc">Tipo curación</label>
                            <select name="qm_tc" id="qm_tc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qm_tc','div_qm_tc','obs_qm_tc',11);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">Plana superficial</option>
                                <option value="2">Con remoción de tejidos</option>
                                <option value="3">Aseo quirúrgico</option>
                                <option value="11">Otros</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_qm_tc" style="display:none;">
                            <label class="floating-label-activo-sm" for="obs_bh_dren_1">Observaciones <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qm_tc" id="obs_qm_tc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <!--ANTECEDENTES RELEVANTES-->
                        <div class="form-row mt-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="t-aten">Antecedentes relevantes</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6 col-xxl-4">
                                <label class="floating-label-activo-sm" for="pat_propq">Enfermedad actual</label>
                                <select class="form-control form-control-sm" name="pat_propq" id="pat_propq" multiple="multiple">
                                    <option value="1">Hipertensión</option>
                                    <option value="2">Diabetes</option>
                                    <option value="3">Hipercolesterolemia</option>
                                    <option value="4">Hiperlipidemia</option>
                                    <option value="5">Cáncer</option>
                                    <option value="6">Obesidad</option>
                                    <option value="7">Hipertiroidismo</option>
                                    <option value="8">Hipotiroidismo</option>
                                    <option value="9">Cirugías</option>
                                    <option value="10">Inmunodepresión</option>
                                    <option value="11">Tabaquismo</option>
                                    <option value="12">Insuficiencia venosa</option>
                                    <option value="13">Insuficiencia arterial</option>
                                    <option value="14">Sustancias Ilícitas</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                                <label class="floating-label-activo-sm" for="med_quem">Medicamentos / Tratamientos</label>
                                <select class="form-control form-control-sm" name="med_quem" id="med_quem" multiple="multiple">
                                    <option value="1">Hipoglicemiantes</option>
                                    <option value="2">Antibióticos</option>
                                    <option value="3">Corticosteroides</option>
                                    <option value="4">Tratamiento Anticoagulante</option>
                                    <option value="5">Otros</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                <label class="floating-label-activo-sm" for="ot_pat_act">Resultado de exámenes</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="curac_quem" role="tabpanel" aria-labelledby="curac_quem-tab">
                <div class="form-row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="cp_cult">Toma de Cultivo</label>
                            <select name="cp_cult" id="cp_cult" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',3);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">No</option>
                                <option value="2">Si</option>
                                <option value="3">Observaciones</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_cp_cult" style="display:none;">
                            <label class="floating-label-activo-sm" for="obs_cp_cult">Observaciones <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_cult" id="obs_cp_cult"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="cp_td">Tipos de debridamiento</label>
                            <select name="cp_td" id="cp_td" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">Quirúrgico </option>
                                <option value="2">Cortante</option>
                                <option value="3">Enzimático</option>
                                <option value="4">Autolítico</option>
                                <option value="5">Osmótico</option>
                                <option value="6">Larval</option>
                                <option value="7">Mecánico</option>
                                <option value="8">Otros</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_cp_td" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="obs_cp_td">Otras <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_td" id="obs_cp_td"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm t-red" for="cp_duch">Duchoterapia</label>
                            <select name="cp_duch" id="cp_duch" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                <option selected value="0">Seleccione </option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                                <option value="3">Observaciones</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_cp_duch" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="obs_cp_duch">Observaciones <i>(Describir)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_duch" id="obs_cp_duch"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-row mt-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="t-aten">Tipo de Antisépticos y materiales usados</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm" for="ants_qm">Tipo de antisepticos y cremas</label>
                                <select class="form-control form-control-sm" name="ants_qm" id="ants_qm" multiple="multiple">
                                    <option value="1">Solución fisiológica</option>
                                    <option value="2">Bialcohol</option>
                                    <option value="3">Sulfadiazina de plata(Platsul)</option>
                                    <option value="4">Otros</option>
                                </select>
                                <div class="form-group" style="margin-top:2%">
                                    <label class="floating-label-activo-sm" for="ot_qx_ac">Anote Otro Antiséptico o crema</label>
                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="ot_qx_ac" id="ot_qx_ac"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm" for="tpo_aposqm">Tipo de apósitos y materiales</label>
                                <select class="form-control form-control-sm" name="tpo_aposqm" id="tpo_aposqm" multiple="multiple">
                                    <option value="1">Apósitos Pasivos</option>
                                    <option value="2">Apósito Interactivo(Espuma Hidrofílica)</option>
                                    <option value="3">Apósito Bioactivo(Alginato)</option>
                                    <option value="4">Apósitos Mixtos</option>
                                    <option value="5">Vasocontrictores</option>
                                    <option value="6">Otros</option>
                                </select>
                                <div class="form-group" style="margin-top:2%">
                                    <label class="floating-label-activo-sm mt-10" for="ot_qx_apos">Anote Otro Tipo de apósitos</label>
                                    <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="ot_qx_apos" id="ot_qx_apos"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label class="floating-label-activo-sm" for="obs_gen_cur_qx">Observaciones Curación Quemados</label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_gen_cur_qx" id="obs_gen_cur_qx"></textarea>
        </div>
    </div>
</div>

<button class="btn btn-outline-primary btn-sm w-100 my-2">Guardar</button>