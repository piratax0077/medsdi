<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-3" id="lab_ev-fono_habla" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="lab_test_avisual-tab" data-toggle="tab" href="#lab_test_avisual" role="tab" aria-controls="lab_test_avisual" aria-selected="false">Test Agudeza Visual</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="apoyo_monopodal_tab" data-toggle="tab" href="#lab_apoyo_monopodal" role="tab" aria-controls="lab_apoyo_monopodal" aria-selected="true">Test de apoyo monopodal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="lab_alcance-func-tab" data-toggle="tab" href="#lab_alcance-func" role="tab" aria-controls="lab_alcance-func" aria-selected="true">Test alcance funcional</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="lab_tugo-tab" data-toggle="tab" href="#lab_tugo" role="tab" aria-controls="lab_tugo" aria-selected="false">Timed up and go</a>
            </li>
                <li class="nav-item">
                <a class="nav-link-aten text-reset" id="lab_ind_mar_din-tab" data-toggle="tab" href="#lab_ind_mar_din" role="tab" aria-controls="lab_ind_mar_din" aria-selected="false">Índice de marcha dinámica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="lab_inc_mareo-tab" data-toggle="tab" href="#lab_inc_mareo" role="tab" aria-controls="lab_inc_mareo" aria-selected="false">Discapacidad por mareo</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" id="lab_ev-ofa">
            <!--EVALUACIÓN GENERAL-->
            <div class="tab-pane fade show active" id="lab_test_avisual" role="tabpanel" aria-labelledby="lab_test_avisual-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form>
                                        <div id="lab_tav" class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-center">TEST DE AGUDEZA VISUAL</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-left">EVALUACIÓN VOR(reflejo vestíbulo-ocular)</h6>
                                                </div>
                                            </div>
                                                <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <h6 class="floating-left">LECTURA A 2 Mts.</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                <h6 class="floating-left">Cartilla Snellen</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Metrónomo(bpm)</label>
                                                    <input type="num" class="form-control form-control-sm" name="tav_met_bpm" id="tav_met_bpm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="tav_c-est">Cabeza estática</label>
                                                    <select name="tav_c-est" id="tav_c-est" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tav_c-est','tav_div_c-est','tav_c-est_obs',2);">
                                                        <option value="1"> 0-1</option>
                                                        <option value="2"> mayor a 2 (describir)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="tav_div_c-est" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="tav_c-est_obs">P.Cabeza estática</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_c-est_obs" id="tav_c-est_obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="tav_m-horiz-cab">Mov. horizontales Cabeza</label>
                                                    <select name="tav_m-horiz-cab" id="tav_m-horiz-cab"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tav_m-horiz-cab','tav_div_m-horiz-cab','tav_m-horiz-cab_obs',2);">
                                                        <option value="1"> 0-1</option>
                                                        <option value="2"> mayor a 2 (describir)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="tav_div_m-horiz-cab" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="lab_m-horiz-cab_obs">Mov. horizontales Cabeza</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_m-horiz-cab_obs" id="tav_m-horiz-cab_obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="tav_m-vert-cab">Mov. Verticales Cabeza</label>
                                                    <select name="tav_m-vert-cab" id="tav_m-vert-cab"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tav_m-vert-cab','tav_div_m-vert-cab','tav_m-vert-cab_obs',2);">
                                                        <option value="1"> 0-1</option>
                                                        <option value="2"> mayor a 2 (describir)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="tav_div_m-vert-cab" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="lab_m-vert-cab_obs">Mov. Verticales Cabeza</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_m-vert-cab_obs" id="tav_m-vert-cab_obs"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group" id="tav_div_vod_obs">
                                                    <label id="" name="" class="floating-label-activo-sm" for="tav_vod_obs" >Obs Examen Test agudeza visual</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tav_vod_obs" id="tav_vod_obs"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-sm-12">
                                                <table class="table table-sm table-bordered text-center">
                                                    <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                    <tbody>
                                                        <tr class="table-success"><td>0 – 1</td><td>Normal</td></tr>
                                                        <tr class="table-danger"><td>2  o mayor </td><td>Patológico</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="lab_apoyo_monopodal" role="tabpanel" aria-labelledby="apoyo_monopodal_tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form>
                                        <div id="apoyo-monopodal" class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-center">TEST DE APOYO MONOPODAL</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 1</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pi_int_uno">Pierna Izquierda</label>
                                                    <select name="pi_int_uno" id="pi_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi_int_uno','div_pi_int_uno','pi_int_uno_obs',2);">
                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pi_int_uno" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pi_int_uno_obs">Obs Pierna Izquierda uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_uno_obs" id="pi_int_uno_obs"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pd_int_uno">Pierna Derecha</label>
                                                    <select name="pd_int_uno" id="pd_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd_int_uno','div_pd_int_uno','pd_int_uno_obs',2);">
                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pd_int_uno" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pd_int_uno_obs">Obs Pierna Derecha uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_uno_obs" id="pd_int_uno_obs"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 2</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pi_int_dos">Pierna Izquierda</label>
                                                    <select name="pi_int_dos" id="pi_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi_int_dos','div_pi_int_dos','pi_int_dos_obs',2);">
                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pi_int_dos" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pi_int_dos_obs">Obs Pierna Izquierda uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_dos_obs" id="pi_int_dos_obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pd_int_dos">Pierna Derecha</label>
                                                    <select name="pd_int_dos" id="pd_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd_int_dos','div_pd_int_dos','pd_int_dos_obs',2);">
                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pd_int_dos" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pd_int_dos_obs">Obs Pierna Derecha uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_dos_obs" id="pd_int_dos_obs"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 3</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pi_int_tres">Pierna Izquierda</label>
                                                    <select name="pi_int_tres" id="pi_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi_int_tres','div_pi_int_tres','pi_int_tres_obs',2);">
                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pi_int_tres" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pi_int_tres_obs">Obs Pierna Izquierda uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_tres_obs" id="pi_int_tres_obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pd_int_tres">Pierna Derecha</label>
                                                    <select name="pd_int_tres" id="pd_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd_int_tres','div_pd_int_tres','pd_int_tres_obs',2);">
                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pd_int_tres" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pd_int_tres_obs">Obs Pierna Derecha uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_tres_obs" id="pd_int_tres_obs"></textarea>
                                                </div>
                                            </div>

                                        </div>                                                      
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group" id="div_ofa_vest_boc">
                                                    <label  class="floating-label-activo-sm" for="obs_testamp" >Obs test de apoyo monopodal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_testamp" id="obs_testamp"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-sm-12">
                                                <table class="table table-sm table-bordered text-center">
                                                    <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                    <tbody>
                                                        <tr class="table-success"><td>Mayor o igual a 5 seg.</td><td>Normal</td></tr>
                                                        <tr class="table-danger"><td>Menor a 5 seg. </td><td>Patológico</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="lab_alcance-func" role="tabpanel" aria-labelledby="lab_alcance-func-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form>
                                        <div id="alc_func" class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-center">TEST DE ALCANCE FUNCIONAL </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 1</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pi-af_int_uno">Pierna Izquierda</label>
                                                    <select name="pi-af_int_uno" id="pi-af_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi-af_int_uno','div_pi-af_int_uno','pi-af_int_uno_obs',2);">
                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pi-af_int_uno" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pi-af_int_uno_obs">Obs Pierna Izquierda uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_uno_obs" id="pi-af_int_uno_obs"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pd-af_int_uno">Pierna Derecha</label>
                                                    <select name="pd-af_int_uno" id="pd-af_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd-af_int_uno','div_pd-af_int_uno','pd-af_int_uno_obs',2);">
                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pd-af_int_uno" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pd-af_int_uno_obs">Obs Pierna Derecha uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_uno_obs" id="pd-af_int_uno_obs"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 2</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pi-af_int_dos">Pierna Izquierda</label>
                                                    <select name="pi-af_int_dos" id="pi-af_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi-af_int_dos','div_pi-af_int_dos','pi-af_int_dos_obs',2);">
                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pi-af_int_dos" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pi-af_int_dos_obs">Obs Pierna Izquierda uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_dos_obs" id="pi-af_int_dos_obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pd-af_int_dos">Pierna Derecha</label>
                                                    <select name="pd-af_int_dos" id="pd-af_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd-af_int_dos','div_pd-af_int_dos','pd-af_int_dos_obs',2);">
                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pd-af_int_dos" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pd-af_int_dos_obs">Obs Pierna Derecha uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_dos_obs" id="pd-af_int_dos_obs"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 3</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pi-af_int_tres">Pierna Izquierda</label>
                                                    <select name="pi-af_int_tres" id="pi-af_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi-af_int_tres','div_pi-af_int_tres','pi-af_int_tres_obs',2);">
                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pi-af_int_tres" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pi-af_int_tres_obs">Obs Pierna Izquierda uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_tres_obs" id="pi-af_int_tres_obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="pd-af_int_tres">Pierna Derecha</label>
                                                    <select name="pd-af_int_tres" id="pd-af_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd-af_int_tres','div_pd-af_int_tres','pd-af_int_tres_obs',2);">
                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_pd-af_int_tres" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="pd-af_int_tres_obs">Obs Pierna Derecha uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_tres_obs" id="pd-af_int_tres_obs"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group" id="div_ofa_vest_boc">
                                                    <label  class="floating-label-activo-sm" for="obs_test-alcfunc" >Obs test de alcance funcional</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_test-alcfunc" id="obs_test-alcfunc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-sm-12">
                                                <table class="table table-sm table-bordered text-center">
                                                    <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                    <tbody>
                                                        <tr class="table-success"><td>Mayor o igual a 15 cm.</td><td>Normal</td></tr>
                                                        <tr class="table-danger"><td>Menor a 15 cm. </td><td>Patológico</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="lab_tugo" role="tabpanel" aria-labelledby="lab_tugo-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form>
                                        <div id="alc_func" class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-center">TIMED UP AND GO </h6>
                                                    <p>Posición sedente a bípedo, caminar 3 Mts. en línea recta,girar y volver a posición sedente</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 1</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="tuag_int_uno">Tiempo 1</label>
                                                    <select name="tuag_int_uno" id="tuag_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tuag_int_uno','div_tuag_int_uno','tuag_int_uno_obs',2);">
                                                        <option value="1">Normal(< 10 segundos)</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_tuag_int_uno" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="tuag_int_uno_obs">Obs intento uno</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tuag_int_uno_obs" id="tuag_int_uno_obs"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class=".text-muted">Intento 2</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="tuag_int_dos">Tiempo 2</label>
                                                    <select name="tuag_int_dos" id="tuag_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tuag_int_dos','div_tuag_int_dos','tuag_int_dos_obs',2);">
                                                        <option value="1">Normal(< 10 segundos)</option>
                                                        <option value="2">Alterado </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_tuag_int_dos" style="display:none">
                                                    <label id="" name="" class="floating-label-activo-sm" for="tuag_int_dos_obs">Obs intento dos</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tuag_int_dos_obs" id="tuag_int_dos_obs"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group" id="div_ofa_vest_boc">
                                                    <label  class="floating-label-activo-sm" for="obs_test-tuag" >Obs test timed up and go</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_test-tuag" id="obs_test-tuag"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-sm-12">
                                                <table class="table table-sm table-bordered text-center">
                                                    <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                    <tbody>
                                                        <tr class="table-success"><td>Menor de 10 seg.(media AM 60 años)</td><td>Normal</td></tr>
                                                        <tr class="table-danger"><td>Mayor a 10 seg. </td><td>Patológico</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="lab_ind_mar_din" role="tabpanel" aria-labelledby="lab_ind_mar_din-tab">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form>
                                        <div id="imd" class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-center">INDICE DE MARCHA DINÁMICA</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-left">Marcha normal</h6>
                                                </div>
                                            </div>
                                                <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="imd_dgi">DGI</label>
                                                    <select name="imd_dgi" id="imd_dgi" class="form-control form-control-sm" onchange="actualizarLeyendaIMD()">
                                                        <option value=""> -- Seleccione --</option>
                                                        <option value="0"> Deterioro severo</option>
                                                        <option value="1"> Deterioro moderado</option>
                                                        <option value="2"> Deterioro leve</option>
                                                        <option value="3"> Normal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 mt-2">
                                                <div id="imd_leyenda_dgi" class="alert mb-0 py-2 px-3" style="display:none;"></div>
                                            </div>
                                        </div>
                                            <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-left">Marcha Con cambio de velocidad</h6>
                                                </div>
                                            </div>
                                                <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="imd_dgi">DGI</label>
                                                    <select name="imd_dgi1" id="imd_dgi1" class="form-control form-control-sm" onchange="actualizarLeyendaIMD1()">
                                                        <option value=""> -- Seleccione --</option>
                                                        <option value="0"> Deterioro grave</option>
                                                        <option value="1"> Deterioro moderado</option>
                                                        <option value="2"> Deterioro leve</option>
                                                        <option value="3"> Normal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 mt-2">
                                                <div id="imd_leyenda_dgi1" class="alert mb-0 py-2 px-3" style="display:none;"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-left">Marcha con movimientos de cabeza horizontales</h6>
                                                </div>
                                            </div>
                                                <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="imd_dgi2">DGI</label>
                                                    <select name="imd_dgi2" id="imd_dgi2" class="form-control form-control-sm" onchange="actualizarLeyendaIMD2()">
                                                        <option value=""> -- Seleccione --</option>
                                                        <option value="0"> Deterioro severo</option>
                                                        <option value="1"> Deterioro moderado</option>
                                                        <option value="2"> Deterioro leve</option>
                                                        <option value="3"> Normal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-8 mt-2">
                                                <div id="imd_leyenda_dgi2" class="alert mb-0 py-2 px-3" style="display:none;"></div>
                                            </div>
                                        </div>
                                            <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <h6 class="floating-left">Marcha con movimientos de cabeza verticales</h6>
                                                </div>
                                            </div>
                                                <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="imd_dgi3">DGI</label>
                                                    <select name="imd_dgi3" id="imd_dgi3" class="form-control form-control-sm" onchange="actualizarLeyendaIMD3()">
                                                        <option value=""> -- Seleccione --</option>
                                                        <option value="0"> Deterioro severo</option>
                                                        <option value="1"> Deterioro moderado</option>
                                                        <option value="2"> Deterioro leve</option>
                                                        <option value="3"> Normal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-8 mt-2">
                                                <div id="imd_leyenda_dgi3" class="alert mb-0 py-2 px-3" style="display:none;"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Puntaje total</label>
                                                    <input type="number" class="form-control form-control-sm" name="dgi-1" id="dgi-1" readonly placeholder="--">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group" id="imd_div_vod_obs">
                                                    <label id="" name="" class="floating-label-activo-sm" for="imd_vod_obs" >Obs Examen DGI</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="imd_vod_obs" id="imd_vod_obs"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="lab_inc_mareo" role="tabpanel" aria-labelledby="lab_inc_mareo-tab">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div id="inc_tav" class="form-row">
                                            <div class="col-sm-12 mt-1">
                                                <div class="form-group fill">
                                                    <h6 class="floating-center">CUESTIONARIO INCAPACIDAD POR MAREO</h6>
                                                </div>
                                            </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <ul class="nav nav-tabs-secciones mb-3 mt-3" id="uro" role="tablist">
                                            <li class="nav-item-secciones">
                                                <a class="nav-secciones active text-uppercase" id="aspect_emoc-tab" data-toggle="tab" href="#aspect_emoc" role="tab" aria-controls="aspect_emoc" aria-selected="true">Aspectos emocionales</a>
                                            </li>
                                            <li class="nav-item-secciones">
                                                <a class="nav-secciones text-uppercase" id="asp_func-tab" data-toggle="tab" href="#asp_func" role="tab" aria-controls="asp_func" aria-selected="false">Aspectos funcionales</a>
                                            </li>
                                            <li class="nav-item-secciones">
                                                <a class="nav-secciones text-uppercase" id="asp_fisic-tab" data-toggle="tab" href="#asp_fisic" role="tab" aria-controls="asp_fisic" aria-selected="false">Aspectos físicos</a>
                                            </li>
                                                <li class="nav-item-secciones">
                                                <a class="nav-secciones text-uppercase" id="result-tab" data-toggle="tab" href="#result" role="tab" aria-controls="result" aria-selected="false">Interpretación y resultados</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="tab-content" id="tede_info">
                                            <!--aspectos-->
                                            <div class="tab-pane fade show active" id="aspect_emoc" role="tabpanel" aria-labelledby="aspect_emoc-tab">
                                                <div id="emocion" class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h6 class="tit-gen">ASPECTOS EMOCIONALES</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 ">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">2.- ¿Debido a su problema se siente molesto o decepcionado?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">9.- ¿Le da miedo salir solo sin acompañante?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">10.- ¿Debido a su problema se averguenza ante los demás?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">15.- ¿Teme que la gente piense que está intoxicado o borracho?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">18.- ¿Se le dificulta  concentrarse ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">20.- ¿Le da miedo estar solo/a en casa ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">21.- ¿se siente discapacitado/a ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">22.- ¿Su problema daña su relación con familiares y amigos?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">23.- ¿Por su problema se siente deprimido?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                                <div class="tab-pane fade show " id="asp_func" role="tabpanel" aria-labelledby="asp_func-tab">
                                                <div id="funcion" class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h6 class="tit-gen">ASPECTOS FUNCIONALES</h6>
                                                    </div>
                                                </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">3.-¿Debido a su problema lo/la limita en sus viajes o traslados?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">5.-¿Su problema hace mas difícil levantarse o recostarse en su cama?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">6.- ¿debido a su problema reduce significativamente su participación en actividades sociales, ir al cine o  bailar?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">7.- ¿debido a su problema se le dificulta leer?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">12.- ¿Debido a su problema evita lugares altos?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">14.- ¿Se le dificulta hacer trabajos en el hogar o trabajos pesados?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">16.- ¿Se le dificulta salir a caminar solo sin ayuda?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">19.- ¿Se le dificulta  caminar a oscuras en su casa ?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">24.- ¿Su problema interfiere con su trabajo o labores de casa?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="tab-pane fade show " id="asp_fisic" role="tabpanel" aria-labelledby="asp_fisic-tab">
                                                <div id="fisicos" class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h6 class="tit-gen">ASPECTOS FÍSICOS</h6>
                                                    </div>
                                                </div>
                                                    <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">1.- ¿Su problema empeora al mirar hacia arriba?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                        
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">4.-¿caminar por los pasillos del mercado aumenta sus problemas ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-8 mt-1">
                                                            <div class="form-group fill">
                                                                <p class="floating-left">8.- ¿Su problema empeora con actividades bailar, deportes barrer etc.?</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-1">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">11.- ¿Los movimientos rápido de cabeza aumentan sus problemas?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">13.- ¿Girar en la cama aumenta su problema?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">17.- ¿Se le dificulta  caminar por la vereda ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-8 mt-1">
                                                        <div class="form-group fill">
                                                            <p class="floating-left">25.- ¿Inclinarse aumenta su problema?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Siempre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                            <label class="form-check-label" for="inlineCheckbox2">A veces</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                            <label class="form-check-label" for="inlineCheckbox3">Nunca </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="result" role="tabpanel" aria-labelledby="result-tab">
                                                    <div id="fisicos" class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h6 class="tit-gen">INTERPRETACION Y RESULTADOS</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-4 mt-1">
                                                                    <div class="form-group fill">
                                                                        <p class="floating-left">Subpuntaje mínimo o puntaje total = 0</p>
                                                                        <p class="floating-left">Subpuntaje EMOCIONAL O FUNCIONAL máximos = 36</p>
                                                                        <p class="floating-left">Subpuntaje FÏSICO máximo = 28</p>
                                                                        <p class="floating-left">Puntaje total máximo = 100</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-1" style="border: 2px solid black;padding: 10px;">
                                                                    <p class="floating-left">Valor respuesta NO = 0</p>
                                                                    <p class="floating-left">Valor respuesta A VECES = 2</p>
                                                                    <p class="floating-left">Valor respuesta SI = 4</p>
                                                                </div>
                                                                
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Puntaje total</label>
                                                                        <input type="number" class="form-control form-control-sm" name="dgi-1" id="dgi-1" readonly placeholder="--">
                                                                    </div>
                                                                </div>
                                                                </div></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 ">
                                                        <div class="form-group" id="obs_disc_mareo">
                                                            <label id="" name="" class="floating-label-activo-sm" for="obs_disc_mareo">OBSERVACIONES INCAPACIDAD POR MAREO</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_disc_mareo" id="obs_disc_mareo"></textarea>
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
            </div>
        </div>
    </div>
</div>
<script>
function calcularPuntajeIMD() {
    var campos = [
        { id: 'imd_c-est',      obs: 'imd_div_c-est' },
        { id: 'imd_m-horiz-cab', obs: 'imd_div_m-horiz-cab' },
        { id: 'imd_m-vert-cab', obs: 'imd_div_m-vert-cab' }
    ];
    var total = 0;
    var completo = true;
    campos.forEach(function(campo) {
        var el  = document.getElementById(campo.id);
        var obs = document.getElementById(campo.obs);
        if (!el || el.value === '') { completo = false; return; }
        total += parseInt(el.value, 10);
        // Mostrar textarea de obs solo en Deterioro severo (0)
        if (obs) obs.style.display = (el.value === '0') ? 'block' : 'none';
    });
    var salida = document.getElementById('dgi-1');
    if (salida) salida.value = completo ? total : '';
}

function actualizarLeyendaIMD() {
    var val = document.getElementById('imd_dgi').value;
    var el  = document.getElementById('imd_leyenda_dgi');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>No puede caminar sin ayuda,desviaciones severas de la marcha o equilibrio' },<!--suma 0-->
        '1': { clase: 'alert-warning', texto: '<strong>Velocidad lenta, patrón de marcha anormal, evidencia de desequilibrio' },<!--suma 1-->
        '2': { clase: 'alert-info',    texto: '<strong>Utiliza dispositivos de asistencia, velocidad lenta, desviaciones leves de la marcha' },<!--suma 2-->
        '3': { clase: 'alert-success', texto: '<strong>Camina sin dipositivos de asistencia, buena velocidad, sin evidencia de desequilibrio, patrón de marcha normal' }<!--suma 3-->
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
}
function actualizarLeyendaIMD1() {
    var val = document.getElementById('imd_dgi1').value;
    var el  = document.getElementById('imd_leyenda_dgi1');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>No puede cambiar de velocidad, o pierde el equilibrio y tiene que alcanzar la pared o ser atrapado' },<!--suma 0-->
        '1': { clase: 'alert-warning', texto: '<strong>Hace solo ajustes menores a la velocidad de marcha, o logra un cambio de velocidad con desviaciones significatrivas de la marcha, o cambia la velocidad pero tiene desviaciones significativas de la marcha o cambia la velocidad pero pierde el equilibrio pero es capaz de recuperarse y continuar caminando' },<!--suma 1-->
        '2': { clase: 'alert-info',    texto: '<strong> Es capaz de cambiar la velocidad pero demuestra desviaciones leves de la marcha o no desviaciones de la marchapero incapaz delograr un cambio significativo en la velocidad d, o utiliza un dispositivo de asistencia' },<!--suma 2-->
        '3': { clase: 'alert-success', texto: '<strong>Capaz de cambiar suavementye la velocidad al caminar sin perder el equilibrio  o la desviación de la marcha. Muestra una diferencia significativa en la velocidad de caminar entre la velocidad normal, la rápida y la lenta' }<!--suma 3-->
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
}
function actualizarLeyendaIMD2() {
    var val = document.getElementById('imd_dgi2').value;
    var el  = document.getElementById('imd_leyenda_dgi2');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>Realiza la tarea con una alteración severa de la marcha, es decir, se tambalea fuera del camino de 15", pierde el equilibrio, se detiene, alcanza la pared.' },<!--suma 0-->
        '1': { clase: 'alert-warning', texto: '<strong>Realiza giros de la cabeza con un cambio moderado en la velocidad de marcha, se ralentiza, se tambalea pero se recupera, puede seguir caminando' },<!--suma 1-->
        '2': { clase: 'alert-info',    texto: '<strong>Realiza giros de cabeza suavemente con un ligero cambio en la velocidad de la marcha, es decir, una pequeña interrupción en el camino de la marcha suave o utiliza ayuda para caminar' },<!--suma 2-->
        '3': { clase: 'alert-success', texto: '<strong>Realiza giros de cabeza suavemente sin cambios en la marcha' }<!--suma 3-->
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
}
function actualizarLeyendaIMD3() {
    var val = document.getElementById('imd_dgi3').value;
    var el  = document.getElementById('imd_leyenda_dgi3');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>Realiza la tarea con una alteración severa de la marcha, es decir, se tambalea fuera del camino de 15", pierde el equilibrio, se detiene, alcanza la pared.' },<!--suma 0-->
        '1': { clase: 'alert-warning', texto: '<strong>Realiza giros de la cabeza con un cambio moderado en la velocidad de marcha, se ralentiza, se tambalea pero se recupera, puede seguir caminando' },<!--suma 1-->
        '2': { clase: 'alert-info',    texto: '<strong>Realiza giros de cabeza suavemente con un ligero cambio en la velocidad de la marcha, es decir, una pequeña interrupción en el camino de la marcha suave o utiliza ayuda para caminar' },<!--suma 2-->
        '3': { clase: 'alert-success', texto: '<strong>Realiza giros de cabeza suavemente sin cambios en la marcha' }<!--suma 3-->
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
}
</script>
