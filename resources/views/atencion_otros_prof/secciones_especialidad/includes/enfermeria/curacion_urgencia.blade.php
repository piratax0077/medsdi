<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 w-100" >
        <div class="form-row mb-3 m-t-15">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($tipos_curaciones as $tc)
                        <a class="nav-link-aten text-reset @if($loop->first) active @endif" id="{{ $tc->id_html }}-tab" data-toggle="tab" href="#{{ $tc->href_html }}" role="tab" aria-controls="{{ $tc->href_html }}" aria-selected="true">{{ $tc->nombre }}</a>
                    @endforeach
                </div>
                
            </div>
            <div class="col-sm-12 col-md-8 col-md-8 col-lg-8 col-xl-8 col-xxl-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <!--CURACION PLANA-->
                    <div class="tab-pane fade show active" id="cur_plana" role="tabpanel" aria-labelledby="cur_plana-tab">
                        <div class="form-row mx-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="t-aten d-inline">Curaciones</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <ul class="nav nav-tabs-aten nav-fill mb-10" id="enf_urgencia" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset active" id="val_hda-tab" data-toggle="tab" href="#val_hda" role="tab" aria-controls="val_hda" aria-selected="true">Valoración</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="cur_hda-tab" data-toggle="tab" href="#cur_hda" role="tab" aria-controls="cur_hda" aria-selected="true">Curación</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                <div class="tab-content" id="Curación de lesiones planas">
                                    <div class="tab-pane fade show active" id="val_hda" role="tabpanel" aria-labelledby="val_hda-tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="alert alert-warning" role="alert">
                                                    Si desea ocupar el item de observaciones debe necesariamente elegir otra opción para sumar el puntaje.
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_asp">Aspecto</label>
                                                    <select name="cp_asp" id="cp_asp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_asp','div_cp_asp','obs_cp_asp',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Erimatoso </option>
                                                        <option value="2">Enrojecido</option>
                                                        <option value="3">Amarillo pálido</option>
                                                        <option value="4">Necrótico </option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_asp" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_asp">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_asp" id="obs_cp_asp"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-block"onclick="curac_hda();"> <i class="feather icon-plus"></i> Guía</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_me">Mayor Extensión</label>
                                                    <select name="cp_me" id="cp_me" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_me','div_cp_me','obs_cp_me',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">0-1 cm</option>
                                                        <option value="2">1-3 cm</option>
                                                        <option value="3">3-6 cm</option>
                                                        <option value="4">>6 cm</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_me" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_me">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_me" id="obs_cp_me"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_pro">Profundidad</label>
                                                    <select name="cp_pro" id="cp_pro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_pro','div_cp_pro','obs_cp_pro1',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">0 </option>
                                                        <option value="2">0-1 cm</option>
                                                        <option value="3">1-2 cm</option>
                                                        <option value="4">2-3 cm</option>
                                                        <option value="5"> >3 cm </option>
                                                        <option value="6">Otros</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_pro" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_pro">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pro" id="obs_cp_pro"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_ecant">Exudado-Cantidad</label>
                                                    <select name="cp_ecant" id="cp_ecant" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ecant','div_cp_ecant','obs_cp_ecant',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Ausente</option>
                                                        <option value="2">Escaso</option>
                                                        <option value="3">Moderado</option>
                                                        <option value="4">Abundante</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_ecant" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_ecant">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ecant" id="obs_cp_ecant"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_ecal">Exudado-Calidad</label>
                                                    <select name="cp_ecal" id="cp_ecal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ecal','div_cp_ecal','obs_cp_ecal',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Sin exudado </option>
                                                        <option value="2">Seroso</option>
                                                        <option value="3">Turbio</option>
                                                        <option value="4">Purulento </option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_ecal" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_ecal">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ecal" id="obs_cp_ecal"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_tn">Tejido esfacelado o necrótico</label>
                                                    <select name="cp_tn" id="cp_tn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_tn','div_cp_tn','obs_cp_tn',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Ausente</option>
                                                        <option value="2"><25 %</option>
                                                        <option value="3">25 - 50 %</option>
                                                        <option value="4">>50 - 75 %</option>
                                                        <option value="5">>75 %</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_tn" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_tn">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_tn" id="obs_cp_tn"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_tg">Tejido granulatorio</label>
                                                    <select name="cp_tg" id="cp_tg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_tg','div_cp_tg','obs_cp_tg',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">100- 75 % </option>
                                                        <option value="2"><75 - 50 %</option>
                                                        <option value="3"><50 - 25 %</option>
                                                        <option value="4"><25 %</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_tg" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_tg">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_tg" id="obs_cp_tg"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_ed">Edema</label>
                                                    <select name="cp_ed" id="cp_ed" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ed','div_cp_ed','obs_cp_ed',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Ausente </option>
                                                        <option value="2">+</option>
                                                        <option value="3">++</option>
                                                        <option value="4">+++</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_ed" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_ed">Obs.<i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ed" id="obs_cp_ed"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_dol">Dolor</label>
                                                    <select name="cp_dol" id="cp_dol" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_dol','div_cp_dol','obs_cp_dol',6);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">0 - 1</option>
                                                        <option value="2">2 - 3</option>
                                                        <option value="3">4 - 6</option>
                                                        <option value="4">7 - 10</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_dol" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_dol">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_dol" id="obs_cp_dol"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="cp_pielc">Piel circundante</label>
                                                    <select name="cp_pielc" id="cp_pielc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_pielc','div_cp_pielc','obs_cp_pielc',6);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Sana </option>
                                                        <option value="2">Descamada</option>
                                                        <option value="3">Erimatosa</option>
                                                        <option value="4">Macerada</option>
                                                        <option value="6">Observaciones</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_cp_pielc" style="display:none;">
                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_pielc">Obs. <i>(Describir)</i></label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pielc" id="obs_cp_pielc"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">P.Total</label>
                                                    <input type="number" class="form-control form-control-sm" name="ptos_tot_ev" id="ptos_tot_ev">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="tpo_les_curgen">Valoración</label>
                                                    <input type="text" class="form-control form-control-sm" name="tpo_les_curgen" id="tpo_les_curgen">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-outline-primary btn-sm  btn-block"onclick="cur_guia();"> <i class="feather icon-plus"></i> Guía</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="obs_cp_gral">Obs. Valoración Herida</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="obs_cp_gral" id="obs_cp_gral"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="obs_cur_plana">Obs. Curación Plana</label>
                                                    <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cur_plana" id="obs_cur_plana"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm w-100 my-2">Guardar</button>
                                    </div>
                                    <div class="tab-pane fade show" id="cur_hda" role="tabpanel" aria-labelledby="cur_hda-tab">
                                        @include('page.general.secciones_ficha.curacion_lpp')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CURACION LPP-->
                    <div class="tab-pane fade " id="cur_lpp" role="tabpanel" aria-labelledby="cur_lpp-tab">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <h6 class="t-aten">Curación LPP</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="val_lpp-tab" data-toggle="tab" href="#val_lpp" role="tab" aria-controls="val_lpp" aria-selected="true">Valoración</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="cur1_lpp-tab" data-toggle="tab" href="#cur1_lpp" role="tab" aria-controls="cur1_lpp" aria-selected="true">Curación</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                    <div class="tab-content" id="Curación de lesiones planas">
                                        <div class="tab-pane fade show active" id="val_lpp" role="tabpanel" aria-labelledby="val_lpp-tab">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Localización</label>
                                                        <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                            <option selected value="0">Seleccione </option>
                                                            <option value="1">Redón </option>
                                                            <option value="2">Torácico</option>
                                                            <option value="3">Teja</option>
                                                            <option value="4">Penrose</option>
                                                            <option value="5">Kher</option>
                                                            <option value="6">Jackson-Pratt</option>
                                                            <option value="7">Pezzer</option>
                                                            <option value="8">Nelaton</option>
                                                            <option value="9">Drenaje percutáneo Rx</option>
                                                            <option value="10">Tubo silicona Sarotoga</option>
                                                            <option value="11">Otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Diámetro</label>
                                                        <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                            <option selected  value="0">Seleccione</option>
                                                            <option value="1">Redón </option>
                                                            <option value="2">Torácico</option>
                                                            <option value="3">Teja</option>
                                                            <option value="4">Penrose</option>
                                                            <option value="5">Kher</option>
                                                            <option value="6">Jackson-Pratt</option>
                                                            <option value="7">Pezzer</option>
                                                            <option value="8">Nelaton</option>
                                                            <option value="9">Drenaje percutáneo Rx</option>
                                                            <option value="10">Tubo silicona Sarotoga</option>
                                                            <option value="11">Otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Profundidad</label>
                                                        <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                            <option selected  value="0">Seleccione</option>
                                                            <option value="1">Redón </option>
                                                            <option value="2">Torácico</option>
                                                            <option value="3">Teja</option>
                                                            <option value="4">Penrose</option>
                                                            <option value="5">Kher</option>
                                                            <option value="6">Jackson-Pratt</option>
                                                            <option value="7">Pezzer</option>
                                                            <option value="8">Nelaton</option>
                                                            <option value="9">Drenaje percutáneo Rx</option>
                                                            <option value="10">Tubo silicona Sarotoga</option>
                                                            <option value="11">Otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Infección</label>
                                                        <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                            <option selected  value="0">Seleccione</option>
                                                            <option value="1">Redón </option>
                                                            <option value="2">Torácico</option>
                                                            <option value="3">Teja</option>
                                                            <option value="4">Penrose</option>
                                                            <option value="5">Kher</option>
                                                            <option value="6">Jackson-Pratt</option>
                                                            <option value="7">Pezzer</option>
                                                            <option value="8">Nelaton</option>
                                                            <option value="9">Drenaje percutáneo Rx</option>
                                                            <option value="10">Tubo silicona Sarotoga</option>
                                                            <option value="11">Otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Tipo Curación</label>
                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                        <option selected  value="0">Seleccione</option>
                                                        <option value="1">Redón </option>
                                                        <option value="2">Torácico</option>
                                                        <option value="3">Teja</option>
                                                        <option value="4">Penrose</option>
                                                        <option value="5">Kher</option>
                                                        <option value="6">Jackson-Pratt</option>
                                                        <option value="7">Pezzer</option>
                                                        <option value="8">Nelaton</option>
                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                        <option value="11">Otros</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="obs_orin">Obs. Curación LPP1</label>
                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm w-100 my-2">Guardar</button>
                                        </div>
                                        <div class="tab-pane fade show" id="cur1_lpp" role="tabpanel" aria-labelledby="cur1_lpp-tab">
                                            @include('page.general.secciones_ficha.curacion_heridas')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PIE DIABÉTICO-->
                    <div class="tab-pane fade" id="cur_pd" role="tabpanel" aria-labelledby="cur_pd-tab">
                        @include('page.general.secciones_ficha.pie_diabetico')
                    </div>
                    <!--QUEMADOS-->
                    <div class="tab-pane fade" id="cur_quem" role="tabpanel" aria-labelledby="cur_quem-tab">
                        @include('page.general.secciones_ficha.quemados')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>