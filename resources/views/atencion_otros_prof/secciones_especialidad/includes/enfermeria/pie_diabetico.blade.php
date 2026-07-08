<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="form-row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
            <div class="form-group">
            <h6 class="t-aten">Curación Pié Diabético</h6>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                <li class="nav-item">
                    <a class="nav-link-aten text-reset active" id="val_pie-tab" data-toggle="tab" href="#val_pie" role="tab" aria-controls="val_pie" aria-selected="true">Valoración</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-aten text-reset" id="curac_pie-tab" data-toggle="tab" href="#curac_pie" role="tab" aria-controls="curac_pie" aria-selected="true">Curación</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="alert alert-warning" role="alert">
                Si desea ocupar el item de observaciones debe necesariamente elegir otra opción para sumar el puntaje.
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
            <div class="tab-content" id="pie_diab">
                <div class="tab-pane fade show active" id="val_pie" role="tabpanel" aria-labelledby="val_pie-tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Aspecto</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">Erimatoso </option>
                                    <option value="2">Enrojecido</option>
                                    <option value="3">Amarillo pálido</option>
                                    <option value="4">Necrótico grisáceo</option>
                                    <option value="5">Necrótico negruzco</option>
                                    <option value="6">Observaciones</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-primary btn-sm  btn-block"onclick="p_diab();"> <i class="feather icon-plus"></i> Guía</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Mayor Extensión</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">0-1 cm</option>
                                    <option value="2">1-3 cm</option>
                                    <option value="3">3-6 cm</option>
                                    <option value="4">6-10 cm</option>
                                    <option value="5">>10 cm</option>
                                    <option value="6">Observaciones</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Profundidad</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="1">Seleccione </option>
                                    <option value="1">0 </option>
                                    <option value="2">0-1 cm</option>
                                    <option value="3">1-2 cm</option>
                                    <option value="4">2-3 cm</option>
                                    <option value="5"> >3 cm </option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Exudado-Cantidad</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">Ausente</option>
                                    <option value="2">Escaso</option>
                                    <option value="3">Moderado</option>
                                    <option value="4">Abundante</option>
                                    <option value="5">Muy abundante</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="bh_dren_1">Exudado-Calidad</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="1">Seleccione </option>
                                    <option value="1">Sin exudado </option>
                                    <option value="2">Seroso</option>
                                    <option value="3">Turbio</option>
                                    <option value="4">Purulento </option>
                                    <option value="5">Purulento gangrenoso</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="bh_dren_1">Tejido esfacelado o necrótico</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">Ausente</option>
                                    <option value="2"><25 %</option>
                                    <option value="3">25 - 50 %</option>
                                    <option value="4">>50 - 75 %</option>
                                    <option value="5">>75 %</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="bh_dren_1">Tejido granulatorio</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="1">Seleccione </option>
                                    <option value="1">100 % </option>
                                    <option value="2">99 - 75 %</option>
                                    <option value="3"><75 - 50 %</option>
                                    <option value="4"><50 - 25 %</option>
                                    <option value="5"><25 %</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="bh_dren_1">Edema</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">Ausente </option>
                                    <option value="2">+</option>
                                    <option value="3">++</option>
                                    <option value="4">+++</option>
                                    <option value="5">++++</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                        </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Dolor</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">0 - 1</option>
                                    <option value="2">2 - 3</option>
                                    <option value="3">4 - 6</option>
                                    <option value="4">7 - 8</option>
                                    <option value="5">9 - 10</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="bh_dren_1">Piel circundante</label>
                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                    <option selected value="0">Seleccione </option>
                                    <option value="1">Sana </option>
                                    <option value="2">Descamada</option>
                                    <option value="3">Erimatosa</option>
                                    <option value="4">Macerada</option>
                                    <option value="5">Gangrena</option>
                                    <option value="6">Otros</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="bh_dren_1">P.Total</label>
                                <input type="number" class="form-control form-control-sm" name="ptos_tot_ev" id="ptos_tot_ev">
                            </div>
                        </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                            <button type="button" class="btn btn-outline-primary btn-sm  btn-block"onclick="g_pdiab();"> <i class="feather icon-plus"></i> Guía</button>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="obs_orin">Obs. Curación Pié Diabético</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!--ANTECEDENTES RELEVANTES-->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="t-aten mt-2 mb-2">ANTECEDENTES RELEVANTES</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                    <label class="floating-label-activo-sm" for="pat_prop">Enfermedad actual</label>
                                    <select class="form-control form-control-sm" name="pat_prop" id="pat_prop" multiple="multiple">
                                        <option value="1">Hipertensión</option>
                                        <option value="2">Diabetes</option>
                                        <option value="3">Hipercolesterolemia</option>
                                        <option value="4">Hiperlipidemia</option>
                                        <option value="5">Cancer</option>
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
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                    <label class="floating-label-activo-sm" for="sint_act">Medicamentos / Tratamientos</label>
                                    <select class="form-control form-control-sm" name="sint_act" id="sint_act" multiple="multiple">
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
                <div class="tab-pane fade show" id="curac_pie" role="tabpanel" aria-labelledby="curac_pie-tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="cp_cult">Toma de Cultivo</label>
                                <select name="cp_cult" id="cp_cult" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',6);">
                                    <option selected value="0">Seleccione</option>
                                    <option value="1">No</option>
                                    <option value="2">Si</option>
                                    <option value="6">Observaciones</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_cp_cult" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_cp_cult">Observaciones <i>(Describir)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_cult" id="obs_cp_cult"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="cp_td">Tipos de debridamiento</label>
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
                                    <option selected value="0">Seleccione</option>
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
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-row mt-2">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="t-aten">Tipo de Antisépticos y materiales usados</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm" for="pie_ant">Tipo de antisepticos</label>
                                    <select class="form-control form-control-sm" name="pie_ant" id="pie_ant" multiple="multiple">
                                        <option value="1">Solución fisiológica</option>
                                        <option value="2">Bialcohol</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm" for="tpo_aposc">Tipo de apósitos y materiales</label>
                                    <select class="form-control form-control-sm" name="tpo_aposc" id="tpo_aposc" multiple="multiple">
                                        <option value="1">Apósitos Pasivos</option>
                                        <option value="2">Apósito Interactivo (Espuma Hidrofílica)</option>
                                        <option value="3">Apósito Bioactivo (Alginato)</option>
                                        <option value="4">Apósitos Mixtos</option>
                                        <option value="5">Vasocontrictores</option>
                                        <option value="6">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm" for="antisep">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-primary btn-sm w-100 my-2">Guardar</button>
    </div>
</div>