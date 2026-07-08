<div id="val_func_equil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="est_ofa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_ofa">VALORACIÓN FUNCIONAL DEL EQUILIBRIO</h5>
              <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#val_func_equil').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="vfe_ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="vfe_test_avisual-tab" data-toggle="tab" href="#vfe_test_avisual" role="tab" aria-controls="vfe_test_avisual" aria-selected="false">Test Agudeza Visual</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="vfe_apoyo_monopodal_tab" data-toggle="tab" href="#vfe_apoyo_monopodal" role="tab" aria-controls="vfe_apoyo_monopodal" aria-selected="true">Test de apoyo monopodal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="vfe_alcance-func-tab" data-toggle="tab" href="#vfe_alcance-func" role="tab" aria-controls="vfe_alcance-func" aria-selected="true">Test alcance funcional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="vfe_tugo-tab" data-toggle="tab" href="#vfe_tugo" role="tab" aria-controls="vfe_tugo" aria-selected="false">Timed up and go</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="vfe_ind_mar_din-tab" data-toggle="tab" href="#vfe_ind_mar_din" role="tab" aria-controls="vfe_ind_mar_din" aria-selected="false">Índice de marcha dinámica</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="vfe_inc_mareo-tab" data-toggle="tab" href="#vfe_inc_mareo" role="tab" aria-controls="vfe_inc_mareo" aria-selected="false">Discapacidad por mareo</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="vfe_ev-ofa">
                            <!--EVALUACIÓN GENERAL-->
                            <div class="tab-pane fade show active" id="vfe_test_avisual" role="tabpanel" aria-labelledby="vfe_test_avisual-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="vfe_tav" class="form-row">
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
                                                                    <input type="num" class="form-control form-control-sm" name="tav_met_bpm" id="vfe_tav_met_bpm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_tav_c-est">Cabeza estática</label>
                                                                    <select name="tav_c-est" id="vfe_tav_c-est" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_tav_c-est','vfe_tav_div_c-est','vfe_tav_c-est_obs',2);">
                                                                        <option value="1"> 0-1</option>
                                                                        <option value="2"> mayor a 2 (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_tav_div_c-est" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_tav_c-est_obs">P.Cabeza estática</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_c-est_obs" id="vfe_tav_c-est_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_tav_m-horiz-cab">Mov. horizontales Cabeza</label>
                                                                    <select name="tav_m-horiz-cab" id="vfe_tav_m-horiz-cab"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_tav_m-horiz-cab','vfe_tav_div_m-horiz-cab','vfe_tav_m-horiz-cab_obs',2);">
                                                                        <option value="1"> 0-1</option>
                                                                        <option value="2"> mayor a 2 (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_tav_div_m-horiz-cab" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="lab_m-horiz-cab_obs">Mov. horizontales Cabeza</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_m-horiz-cab_obs" id="vfe_tav_m-horiz-cab_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_tav_m-vert-cab">Mov. Verticales Cabeza</label>
                                                                    <select name="tav_m-vert-cab" id="vfe_tav_m-vert-cab"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_tav_m-vert-cab','vfe_tav_div_m-vert-cab','vfe_tav_m-vert-cab_obs',2);">
                                                                        <option value="1"> 0-1</option>
                                                                        <option value="2"> mayor a 2 (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_tav_div_m-vert-cab" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="lab_m-vert-cab_obs">Mov. Verticales Cabeza</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_m-vert-cab_obs" id="vfe_tav_m-vert-cab_obs"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="vfe_tav_div_vod_obs">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_tav_vod_obs" >Obs Examen Test agudeza visual</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tav_vod_obs" id="vfe_tav_vod_obs"></textarea>
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
                            <div class="tab-pane fade show" id="vfe_apoyo_monopodal" role="tabpanel" aria-labelledby="vfe_apoyo_monopodal_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="vfe_apoyo-monopodal" class="form-row">
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
                                                                    <label class="floating-label-activo-sm" for="vfe_pi_int_uno">Pierna Izquierda</label>
                                                                    <select name="pi_int_uno" id="vfe_pi_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pi_int_uno','vfe_div_pi_int_uno','vfe_pi_int_uno_obs',2);">
                                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pi_int_uno" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pi_int_uno_obs">Obs Pierna Izquierda uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_uno_obs" id="vfe_pi_int_uno_obs"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_pd_int_uno">Pierna Derecha</label>
                                                                    <select name="pd_int_uno" id="vfe_pd_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pd_int_uno','vfe_div_pd_int_uno','vfe_pd_int_uno_obs',2);">
                                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pd_int_uno" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pd_int_uno_obs">Obs Pierna Derecha uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_uno_obs" id="vfe_pd_int_uno_obs"></textarea>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_pi_int_dos">Pierna Izquierda</label>
                                                                    <select name="pi_int_dos" id="vfe_pi_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pi_int_dos','vfe_div_pi_int_dos','vfe_pi_int_dos_obs',2);">
                                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pi_int_dos" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pi_int_dos_obs">Obs Pierna Izquierda uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_dos_obs" id="vfe_pi_int_dos_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_pd_int_dos">Pierna Derecha</label>
                                                                    <select name="pd_int_dos" id="vfe_pd_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pd_int_dos','vfe_div_pd_int_dos','vfe_pd_int_dos_obs',2);">
                                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pd_int_dos" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pd_int_dos_obs">Obs Pierna Derecha uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_dos_obs" id="vfe_pd_int_dos_obs"></textarea>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_pi_int_tres">Pierna Izquierda</label>
                                                                    <select name="pi_int_tres" id="vfe_pi_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pi_int_tres','vfe_div_pi_int_tres','vfe_pi_int_tres_obs',2);">
                                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pi_int_tres" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pi_int_tres_obs">Obs Pierna Izquierda uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_tres_obs" id="vfe_pi_int_tres_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_pd_int_tres">Pierna Derecha</label>
                                                                    <select name="pd_int_tres" id="vfe_pd_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pd_int_tres','vfe_div_pd_int_tres','vfe_pd_int_tres_obs',2);">
                                                                        <option value="1">igual o mayor de 5 segundos</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pd_int_tres" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pd_int_tres_obs">Obs Pierna Derecha uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_tres_obs" id="vfe_pd_int_tres_obs"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="vfe_div_obs_testamp">
                                                                    <label  class="floating-label-activo-sm" for="vfe_obs_testamp" >Obs test de apoyo monopodal</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_testamp" id="vfe_obs_testamp"></textarea>
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
                            <div class="tab-pane fade show" id="vfe_alcance-func" role="tabpanel" aria-labelledby="vfe_alcance-func-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="vfe_alc_func" class="form-row">
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
                                                                    <label class="floating-label-activo-sm" for="vfe_pi-af_int_uno">Pierna Izquierda</label>
                                                                    <select name="pi-af_int_uno" id="vfe_pi-af_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pi-af_int_uno','vfe_div_pi-af_int_uno','vfe_pi-af_int_uno_obs',2);">
                                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pi-af_int_uno" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pi-af_int_uno_obs">Obs Pierna Izquierda uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_uno_obs" id="vfe_pi-af_int_uno_obs"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_pd-af_int_uno">Pierna Derecha</label>
                                                                    <select name="pd-af_int_uno" id="vfe_pd-af_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pd-af_int_uno','vfe_div_pd-af_int_uno','vfe_pd-af_int_uno_obs',2);">
                                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pd-af_int_uno" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pd-af_int_uno_obs">Obs Pierna Derecha uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_uno_obs" id="vfe_pd-af_int_uno_obs"></textarea>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_pi-af_int_dos">Pierna Izquierda</label>
                                                                    <select name="pi-af_int_dos" id="vfe_pi-af_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pi-af_int_dos','vfe_div_pi-af_int_dos','vfe_pi-af_int_dos_obs',2);">
                                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pi-af_int_dos" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pi-af_int_dos_obs">Obs Pierna Izquierda uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_dos_obs" id="vfe_pi-af_int_dos_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_pd-af_int_dos">Pierna Derecha</label>
                                                                    <select name="pd-af_int_dos" id="vfe_pd-af_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pd-af_int_dos','vfe_div_pd-af_int_dos','vfe_pd-af_int_dos_obs',2);">
                                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pd-af_int_dos" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pd-af_int_dos_obs">Obs Pierna Derecha uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_dos_obs" id="vfe_pd-af_int_dos_obs"></textarea>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_pi-af_int_tres">Pierna Izquierda</label>
                                                                    <select name="pi-af_int_tres" id="vfe_pi-af_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pi-af_int_tres','vfe_div_pi-af_int_tres','vfe_pi-af_int_tres_obs',2);">
                                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pi-af_int_tres" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pi-af_int_tres_obs">Obs Pierna Izquierda uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_tres_obs" id="vfe_pi-af_int_tres_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vfe_pd-af_int_tres">Pierna Derecha</label>
                                                                    <select name="pd-af_int_tres" id="vfe_pd-af_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_pd-af_int_tres','vfe_div_pd-af_int_tres','vfe_pd-af_int_tres_obs',2);">
                                                                        <option value="1">igual o mayor de 15 cm.</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_pd-af_int_tres" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_pd-af_int_tres_obs">Obs Pierna Derecha uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_tres_obs" id="vfe_pd-af_int_tres_obs"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="vfe_div_obs_alcfunc">
                                                                    <label  class="floating-label-activo-sm" for="vfe_obs_test-alcfunc" >Obs test de alcance funcional</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_test-alcfunc" id="vfe_obs_test-alcfunc"></textarea>
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
                            <div class="tab-pane fade show" id="vfe_tugo" role="tabpanel" aria-labelledby="vfe_tugo-tab">
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="vfe_alc_func" class="form-row">
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
                                                                    <label class="floating-label-activo-sm" for="vfe_tuag_int_uno">Tiempo 1</label>
                                                                    <select name="tuag_int_uno" id="vfe_tuag_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_tuag_int_uno','vfe_div_tuag_int_uno','vfe_tuag_int_uno_obs',2);">
                                                                        <option value="1">Normal(< 10 segundos)</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_tuag_int_uno" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_tuag_int_uno_obs">Obs intento uno</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tuag_int_uno_obs" id="vfe_tuag_int_uno_obs"></textarea>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_tuag_int_dos">Tiempo 2</label>
                                                                    <select name="tuag_int_dos" id="vfe_tuag_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vfe_tuag_int_dos','vfe_div_tuag_int_dos','vfe_tuag_int_dos_obs',2);">
                                                                        <option value="1">Normal(< 10 segundos)</option>
                                                                        <option value="2">Alterado </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="vfe_div_tuag_int_dos" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_tuag_int_dos_obs">Obs intento dos</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tuag_int_dos_obs" id="vfe_tuag_int_dos_obs"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="vfe_div_obs_tuag">
                                                                    <label  class="floating-label-activo-sm" for="vfe_obs_test-tuag" >Obs test timed up and go</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_test-tuag" id="vfe_obs_test-tuag"></textarea>
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
                            <div class="tab-pane fade show" id="vfe_ind_mar_din" role="tabpanel" aria-labelledby="vfe_ind_mar_din-tab">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="vfe_imd" class="form-row">
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
                                                                    <label class="floating-label-activo-sm" for="vfe_imd_dgi">DGI</label>
                                                                    <select name="imd_dgi" id="vfe_imd_dgi" class="form-control form-control-sm" onchange="actualizarLeyendaIMD()">
                                                                        <option value=""> -- Seleccione --</option>
                                                                        <option value="0"> Deterioro severo</option>
                                                                        <option value="1"> Deterioro moderado</option>
                                                                        <option value="2"> Deterioro leve</option>
                                                                        <option value="3"> Normal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 mt-2">
                                                                <div id="vfe_imd_leyenda_dgi" class="alert mb-0 py-2 px-3" style="display:none;"></div>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_imd_dgi">DGI</label>
                                                                    <select name="imd_dgi1" id="vfe_imd_dgi1" class="form-control form-control-sm" onchange="actualizarLeyendaIMD1()">
                                                                        <option value=""> -- Seleccione --</option>
                                                                        <option value="0"> Deterioro grave</option>
                                                                        <option value="1"> Deterioro moderado</option>
                                                                        <option value="2"> Deterioro leve</option>
                                                                        <option value="3"> Normal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 mt-2">
                                                                <div id="vfe_imd_leyenda_dgi1" class="alert mb-0 py-2 px-3" style="display:none;"></div>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_imd_dgi2">DGI</label>
                                                                    <select name="imd_dgi2" id="vfe_imd_dgi2" class="form-control form-control-sm" onchange="actualizarLeyendaIMD2()">
                                                                        <option value=""> -- Seleccione --</option>
                                                                        <option value="0"> Deterioro severo</option>
                                                                        <option value="1"> Deterioro moderado</option>
                                                                        <option value="2"> Deterioro leve</option>
                                                                        <option value="3"> Normal</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-8 mt-2">
                                                                <div id="vfe_imd_leyenda_dgi2" class="alert mb-0 py-2 px-3" style="display:none;"></div>
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
                                                                    <label class="floating-label-activo-sm" for="vfe_imd_dgi3">DGI</label>
                                                                    <select name="imd_dgi3" id="vfe_imd_dgi3" class="form-control form-control-sm" onchange="actualizarLeyendaIMD3()">
                                                                        <option value=""> -- Seleccione --</option>
                                                                        <option value="0"> Deterioro severo</option>
                                                                        <option value="1"> Deterioro moderado</option>
                                                                        <option value="2"> Deterioro leve</option>
                                                                        <option value="3"> Normal</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-8 mt-2">
                                                                <div id="vfe_imd_leyenda_dgi3" class="alert mb-0 py-2 px-3" style="display:none;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Puntaje total</label>
                                                                    <input type="number" class="form-control form-control-sm" name="vfe_dgi_imd_total" id="vfe_dgi_imd_total" readonly placeholder="--">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="vfe_imd_div_vod_obs">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vfe_imd_vod_obs" >Obs Examen DGI</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="imd_vod_obs" id="vfe_imd_vod_obs"></textarea>
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
                            <div class="tab-pane fade show" id="vfe_inc_mareo" role="tabpanel" aria-labelledby="vfe_inc_mareo-tab">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                <div id="vfe_inc_tav" class="form-row">
                                                            <div class="col-sm-12 mt-1">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">CUESTIONARIO INCAPACIDAD POR MAREO</h6>
                                                                </div>
                                                            </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <ul class="nav nav-tabs-secciones mb-3 mt-3" id="vfe_uro" role="tablist">
                                                            <li class="nav-item-secciones">
                                                                <a class="nav-secciones active text-uppercase" id="vfe_aspect_emoc-tab" data-toggle="tab" href="#vfe_aspect_emoc" role="tab" aria-controls="vfe_aspect_emoc" aria-selected="true">Aspectos emocionales</a>
                                                            </li>
                                                            <li class="nav-item-secciones">
                                                                <a class="nav-secciones text-uppercase" id="vfe_asp_func-tab" data-toggle="tab" href="#vfe_asp_func" role="tab" aria-controls="vfe_asp_func" aria-selected="false">Aspectos funcionales</a>
                                                            </li>
                                                            <li class="nav-item-secciones">
                                                                <a class="nav-secciones text-uppercase" id="vfe_asp_fisic-tab" data-toggle="tab" href="#vfe_asp_fisic" role="tab" aria-controls="vfe_asp_fisic" aria-selected="false">Aspectos físicos</a>
                                                            </li>
                                                             <li class="nav-item-secciones">
                                                                <a class="nav-secciones text-uppercase" id="vfe_result-tab" data-toggle="tab" href="#vfe_result" role="tab" aria-controls="vfe_result" aria-selected="false">Interpretación y resultados</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="vfe_tede_info">
                                                            <!--aspectos-->
                                                            <div class="tab-pane fade show active" id="vfe_aspect_emoc" role="tabpanel" aria-labelledby="vfe_aspect_emoc-tab">
                                                                <div id="vfe_emocion" class="form-row">
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c01_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c01')">
                                                                            <label class="form-check-label" for="vfe_dhi_c01_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c01_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c01')">
                                                                            <label class="form-check-label" for="vfe_dhi_c01_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c01_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c01')">
                                                                            <label class="form-check-label" for="vfe_dhi_c01_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c02_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c02')">
                                                                            <label class="form-check-label" for="vfe_dhi_c02_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c02_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c02')">
                                                                            <label class="form-check-label" for="vfe_dhi_c02_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c02_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c02')">
                                                                            <label class="form-check-label" for="vfe_dhi_c02_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c03_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c03')">
                                                                            <label class="form-check-label" for="vfe_dhi_c03_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c03_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c03')">
                                                                            <label class="form-check-label" for="vfe_dhi_c03_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c03_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c03')">
                                                                            <label class="form-check-label" for="vfe_dhi_c03_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c04_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c04')">
                                                                            <label class="form-check-label" for="vfe_dhi_c04_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c04_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c04')">
                                                                            <label class="form-check-label" for="vfe_dhi_c04_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c04_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c04')">
                                                                            <label class="form-check-label" for="vfe_dhi_c04_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c05_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c05')">
                                                                            <label class="form-check-label" for="vfe_dhi_c05_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c05_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c05')">
                                                                            <label class="form-check-label" for="vfe_dhi_c05_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c05_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c05')">
                                                                            <label class="form-check-label" for="vfe_dhi_c05_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c06_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c06')">
                                                                            <label class="form-check-label" for="vfe_dhi_c06_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c06_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c06')">
                                                                            <label class="form-check-label" for="vfe_dhi_c06_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c06_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c06')">
                                                                            <label class="form-check-label" for="vfe_dhi_c06_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c07_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c07')">
                                                                            <label class="form-check-label" for="vfe_dhi_c07_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c07_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c07')">
                                                                            <label class="form-check-label" for="vfe_dhi_c07_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c07_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c07')">
                                                                            <label class="form-check-label" for="vfe_dhi_c07_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c08_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c08')">
                                                                            <label class="form-check-label" for="vfe_dhi_c08_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c08_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c08')">
                                                                            <label class="form-check-label" for="vfe_dhi_c08_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c08_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c08')">
                                                                            <label class="form-check-label" for="vfe_dhi_c08_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c09_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c09')">
                                                                            <label class="form-check-label" for="vfe_dhi_c09_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c09_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c09')">
                                                                            <label class="form-check-label" for="vfe_dhi_c09_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c09_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c09')">
                                                                            <label class="form-check-label" for="vfe_dhi_c09_n">Nunca </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                             <div class="tab-pane fade show " id="vfe_asp_func" role="tabpanel" aria-labelledby="vfe_asp_func-tab">
                                                                <div id="vfe_funcion" class="form-row">
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c10_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c10')">
                                                                                <label class="form-check-label" for="vfe_dhi_c10_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c10_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c10')">
                                                                                <label class="form-check-label" for="vfe_dhi_c10_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c10_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c10')">
                                                                                <label class="form-check-label" for="vfe_dhi_c10_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c11_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c11')">
                                                                                <label class="form-check-label" for="vfe_dhi_c11_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c11_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c11')">
                                                                                <label class="form-check-label" for="vfe_dhi_c11_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c11_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c11')">
                                                                                <label class="form-check-label" for="vfe_dhi_c11_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c12_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c12')">
                                                                                <label class="form-check-label" for="vfe_dhi_c12_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c12_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c12')">
                                                                                <label class="form-check-label" for="vfe_dhi_c12_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c12_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c12')">
                                                                                <label class="form-check-label" for="vfe_dhi_c12_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c13_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c13')">
                                                                                <label class="form-check-label" for="vfe_dhi_c13_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c13_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c13')">
                                                                                <label class="form-check-label" for="vfe_dhi_c13_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c13_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c13')">
                                                                                <label class="form-check-label" for="vfe_dhi_c13_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c14_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c14')">
                                                                                <label class="form-check-label" for="vfe_dhi_c14_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c14_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c14')">
                                                                                <label class="form-check-label" for="vfe_dhi_c14_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c14_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c14')">
                                                                                <label class="form-check-label" for="vfe_dhi_c14_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c15_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c15')">
                                                                                <label class="form-check-label" for="vfe_dhi_c15_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c15_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c15')">
                                                                                <label class="form-check-label" for="vfe_dhi_c15_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c15_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c15')">
                                                                                <label class="form-check-label" for="vfe_dhi_c15_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c16_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c16')">
                                                                                <label class="form-check-label" for="vfe_dhi_c16_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c16_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c16')">
                                                                                <label class="form-check-label" for="vfe_dhi_c16_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c16_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c16')">
                                                                                <label class="form-check-label" for="vfe_dhi_c16_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c17_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c17')">
                                                                                <label class="form-check-label" for="vfe_dhi_c17_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c17_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c17')">
                                                                                <label class="form-check-label" for="vfe_dhi_c17_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c17_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c17')">
                                                                                <label class="form-check-label" for="vfe_dhi_c17_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c18_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c18')">
                                                                                <label class="form-check-label" for="vfe_dhi_c18_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c18_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c18')">
                                                                                <label class="form-check-label" for="vfe_dhi_c18_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c18_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c18')">
                                                                                <label class="form-check-label" for="vfe_dhi_c18_n">Nunca </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="tab-pane fade show " id="vfe_asp_fisic" role="tabpanel" aria-labelledby="vfe_asp_fisic-tab">
                                                                <div id="vfe_fisicos_asp" class="form-row">
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c19_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c19')">
                                                                            <label class="form-check-label" for="vfe_dhi_c19_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c19_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c19')">
                                                                            <label class="form-check-label" for="vfe_dhi_c19_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c19_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c19')">
                                                                            <label class="form-check-label" for="vfe_dhi_c19_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c20_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c20')">
                                                                            <label class="form-check-label" for="vfe_dhi_c20_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c20_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c20')">
                                                                            <label class="form-check-label" for="vfe_dhi_c20_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c20_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c20')">
                                                                            <label class="form-check-label" for="vfe_dhi_c20_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c21_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c21')">
                                                                                <label class="form-check-label" for="vfe_dhi_c21_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c21_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c21')">
                                                                                <label class="form-check-label" for="vfe_dhi_c21_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="vfe_dhi_c21_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c21')">
                                                                                <label class="form-check-label" for="vfe_dhi_c21_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c22_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c22')">
                                                                            <label class="form-check-label" for="vfe_dhi_c22_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c22_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c22')">
                                                                            <label class="form-check-label" for="vfe_dhi_c22_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c22_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c22')">
                                                                            <label class="form-check-label" for="vfe_dhi_c22_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c23_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c23')">
                                                                            <label class="form-check-label" for="vfe_dhi_c23_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c23_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c23')">
                                                                            <label class="form-check-label" for="vfe_dhi_c23_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c23_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c23')">
                                                                            <label class="form-check-label" for="vfe_dhi_c23_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c24_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c24')">
                                                                            <label class="form-check-label" for="vfe_dhi_c24_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c24_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c24')">
                                                                            <label class="form-check-label" for="vfe_dhi_c24_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c24_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c24')">
                                                                            <label class="form-check-label" for="vfe_dhi_c24_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c25_s" value="4" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c25')">
                                                                            <label class="form-check-label" for="vfe_dhi_c25_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c25_av" value="2" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c25')">
                                                                            <label class="form-check-label" for="vfe_dhi_c25_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vfe_dhi_c25_n" value="0" onchange="seleccionarOpcionDHI_vfe(this, 'vfe_dhi_c25')">
                                                                            <label class="form-check-label" for="vfe_dhi_c25_n">Nunca </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade show" id="vfe_result" role="tabpanel" aria-labelledby="vfe_result-tab">
                                                                <div class="form-row mt-1">
                                                                    <div class="col-sm-12">
                                                                        <h6 class="tit-gen">INTERPRETACIÓN Y RESULTADOS DHI</h6>
                                                                    </div>
                                                                </div>
                                                                <!-- Tablas de referencia -->
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-6">
                                                                        <table class="table table-sm table-bordered text-center">
                                                                            <thead class="thead-light"><tr><th>Respuesta</th><th>Valor</th></tr></thead>
                                                                            <tbody>
                                                                                <tr><td>Siempre</td><td><strong>4</strong></td></tr>
                                                                                <tr><td>A veces</td><td><strong>2</strong></td></tr>
                                                                                <tr><td>Nunca</td><td><strong>0</strong></td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <table class="table table-sm table-bordered text-center">
                                                                            <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                                            <tbody>
                                                                                <tr class="table-success"><td>0 – 16</td><td>Sin handicap</td></tr>
                                                                                <tr class="table-info"><td>18 – 36</td><td>Handicap leve</td></tr>
                                                                                <tr class="table-warning"><td>38 – 56</td><td>Handicap moderado</td></tr>
                                                                                <tr class="table-danger"><td>58 – 100</td><td>Handicap severo</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- Puntajes por categoría -->
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-4 text-center">
                                                                        <div class="card border-primary">
                                                                            <div class="card-body py-2">
                                                                                <small class="text-muted d-block">Emocional</small>
                                                                                <span class="h4 font-weight-bold text-primary" id="vfe_dhi_score_emoc">--</span>
                                                                                <small class="text-muted"> /36</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 text-center">
                                                                        <div class="card border-info">
                                                                            <div class="card-body py-2">
                                                                                <small class="text-muted d-block">Funcional</small>
                                                                                <span class="h4 font-weight-bold text-info" id="vfe_dhi_score_func">--</span>
                                                                                <small class="text-muted"> /36</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 text-center">
                                                                        <div class="card border-warning">
                                                                            <div class="card-body py-2">
                                                                                <small class="text-muted d-block">Físico</small>
                                                                                <span class="h4 font-weight-bold text-warning" id="vfe_dhi_score_fisic">--</span>
                                                                                <small class="text-muted"> /28</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Puntaje total e interpretación -->
                                                                <div class="form-row mt-3 align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Puntaje total DHI</label>
                                                                            <input type="number" class="form-control form-control-sm" name="dhi_total" id="vfe_dhi_total" readonly placeholder="--">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div id="vfe_dhi_interpretacion" class="alert py-2 px-3" style="display:none;"></div>
                                                                    </div>
                                                                </div>
                                                                <!-- Observaciones -->
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="vfe_obs_disc_mareo">OBSERVACIONES INCAPACIDAD POR MAREO</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_disc_mareo" id="vfe_obs_disc_mareo"></textarea>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="$('#val_func_equil').modal('hide')">
                    <i class="feather icon-x"></i> Cerrar
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="generarPDFValoracionEquilibrio()">
                    <i class="feather icon-file-text"></i> Generar PDF
                </button>
                <button type="button" class="btn btn-primary btn-sm" onclick="guardarValoracionEquilibrio()">
                    <i class="feather icon-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function val_equilibrio() {
        $('#val_func_equil').modal('show');
    }
    function guardarValoracionEquilibrio() {
        var datos = {};
        $('#vfe_ev-ofa').find('input:not([type="hidden"]), select, textarea').each(function() {
            if ($(this).attr('type') === 'checkbox') {
                if ($(this).is(':checked')) {
                    var key = $(this).attr('id') || $(this).attr('name');
                    if (key) datos[key] = $(this).val();
                }
                return;
            }
            var key = $(this).attr('id') || $(this).attr('name');
            if (key) datos[key] = $(this).val();
        });
        // Puntajes DHI por categoría (calculados en spans, no se capturan con find)
        datos['vfe_dhi_score_emoc']  = $('#vfe_dhi_score_emoc').text().trim()  || '0';
        datos['vfe_dhi_score_func']  = $('#vfe_dhi_score_func').text().trim()  || '0';
        datos['vfe_dhi_score_fisic'] = $('#vfe_dhi_score_fisic').text().trim() || '0';
        var btn = $('[onclick="guardarValoracionEquilibrio()"]');
        btn.prop('disabled', true).html('<i class="feather icon-loader"></i> Guardando...');
        $.ajax({
            url: "{{ route('fono.valoracion.equilibrio.store') }}",
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                hora_medica: $('#hora_medica').val(),
                id_paciente_fc: $('#id_paciente_fc').val(),
                id_profesional_fc: $('#id_profesional_fc').val(),
                datos: JSON.stringify(datos)
            },
            success: function(response) {
                console.log(response);
                btn.prop('disabled', false).html('<i class="feather icon-save"></i> Guardar');
                if (response.success) {
                    swal({ title: 'Guardado', text: response.mensaje, icon: 'success' });
                    $('#val_func_equil').modal('hide');
                } else {
                    swal({ title: 'Error', text: response.mensaje, icon: 'warning' });
                }
            },
            error: function() {
                btn.prop('disabled', false).html('<i class="feather icon-save"></i> Guardar');
                swal({ title: 'Error', text: 'No se pudo conectar con el servidor.', icon: 'error' });
            }
        });
    }
    function calcularPuntajeIMD_vfe() {
        var ids = ['vfe_imd_dgi', 'vfe_imd_dgi1', 'vfe_imd_dgi2', 'vfe_imd_dgi3'];
        var total = 0;
        var seleccionados = 0;
        ids.forEach(function(id) {
            var el = document.getElementById(id);
            if (el && el.value !== '') {
                total += parseInt(el.value, 10);
                seleccionados++;
            }
        });
        var salida = document.getElementById('vfe_dgi_imd_total');
        if (salida) salida.value = seleccionados > 0 ? total : '';
        var tab = document.getElementById('vfe_ind_mar_din-tab');
        if (tab) {
            tab.textContent = 'Índice de marcha dinámica' + (seleccionados > 0 ? ' (' + total + '/12)' : '');
        }
    }
    function actualizarLeyendaIMD() {
        var val = document.getElementById('vfe_imd_dgi').value;
        var el  = document.getElementById('vfe_imd_leyenda_dgi');
        var leyendas = {
            '0': { clase: 'alert-danger',  texto: '<strong>No puede caminar sin ayuda, desviaciones severas de la marcha o equilibrio</strong>' },
            '1': { clase: 'alert-warning', texto: '<strong>Velocidad lenta, patrón de marcha anormal, evidencia de desequilibrio</strong>' },
            '2': { clase: 'alert-info',    texto: '<strong>Utiliza dispositivos de asistencia, velocidad lenta, desviaciones leves de la marcha</strong>' },
            '3': { clase: 'alert-success', texto: '<strong>Camina sin dispositivos de asistencia, buena velocidad, sin evidencia de desequilibrio, patrón de marcha normal</strong>' }
        };
        if (val === '' || !leyendas[val]) {
            el.style.display = 'none';
            el.className = 'alert mb-0 py-2 px-3';
            return;
        }
        el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
        el.innerHTML = leyendas[val].texto;
        el.style.display = 'block';
        calcularPuntajeIMD_vfe();
    }
    function actualizarLeyendaIMD1() {
        var val = document.getElementById('vfe_imd_dgi1').value;
        var el  = document.getElementById('vfe_imd_leyenda_dgi1');
        var leyendas = {
            '0': { clase: 'alert-danger',  texto: '<strong>No puede cambiar de velocidad, o pierde el equilibrio y tiene que alcanzar la pared o ser atrapado</strong>' },
            '1': { clase: 'alert-warning', texto: '<strong>Hace solo ajustes menores a la velocidad de marcha, o logra un cambio de velocidad con desviaciones significativas de la marcha</strong>' },
            '2': { clase: 'alert-info',    texto: '<strong>Es capaz de cambiar la velocidad pero demuestra desviaciones leves de la marcha, o utiliza un dispositivo de asistencia</strong>' },
            '3': { clase: 'alert-success', texto: '<strong>Capaz de cambiar suavemente la velocidad al caminar sin perder el equilibrio o la desviación de la marcha</strong>' }
        };
        if (val === '' || !leyendas[val]) {
            el.style.display = 'none';
            el.className = 'alert mb-0 py-2 px-3';
            return;
        }
        el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
        el.innerHTML = leyendas[val].texto;
        el.style.display = 'block';
        calcularPuntajeIMD_vfe();
    }
    function actualizarLeyendaIMD2() {
        var val = document.getElementById('vfe_imd_dgi2').value;
        var el  = document.getElementById('vfe_imd_leyenda_dgi2');
        var leyendas = {
            '0': { clase: 'alert-danger',  texto: '<strong>Realiza la tarea con una alteración severa de la marcha, pierde el equilibrio, se detiene, alcanza la pared.</strong>' },
            '1': { clase: 'alert-warning', texto: '<strong>Realiza giros de la cabeza con un cambio moderado en la velocidad de marcha, se ralentiza, se tambalea pero se recupera</strong>' },
            '2': { clase: 'alert-info',    texto: '<strong>Realiza giros de cabeza suavemente con un ligero cambio en la velocidad de la marcha o utiliza ayuda para caminar</strong>' },
            '3': { clase: 'alert-success', texto: '<strong>Realiza giros de cabeza suavemente sin cambios en la marcha</strong>' }
        };
        if (val === '' || !leyendas[val]) {
            el.style.display = 'none';
            el.className = 'alert mb-0 py-2 px-3';
            return;
        }
        el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
        el.innerHTML = leyendas[val].texto;
        el.style.display = 'block';
        calcularPuntajeIMD_vfe();
    }
    function actualizarLeyendaIMD3() {
        var val = document.getElementById('vfe_imd_dgi3').value;
        var el  = document.getElementById('vfe_imd_leyenda_dgi3');
        var leyendas = {
            '0': { clase: 'alert-danger',  texto: '<strong>Realiza la tarea con una alteración severa de la marcha, pierde el equilibrio, se detiene, alcanza la pared.</strong>' },
            '1': { clase: 'alert-warning', texto: '<strong>Realiza giros de la cabeza con un cambio moderado en la velocidad de marcha, se ralentiza, se tambalea pero se recupera</strong>' },
            '2': { clase: 'alert-info',    texto: '<strong>Realiza giros de cabeza suavemente con un ligero cambio en la velocidad de la marcha o utiliza ayuda para caminar</strong>' },
            '3': { clase: 'alert-success', texto: '<strong>Realiza giros de cabeza suavemente sin cambios en la marcha</strong>' }
        };
        if (val === '' || !leyendas[val]) {
            el.style.display = 'none';
            el.className = 'alert mb-0 py-2 px-3';
            return;
        }
        el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
        el.innerHTML = leyendas[val].texto;
        el.style.display = 'block';
        calcularPuntajeIMD_vfe();
    }

    // ─── DHI modal (vfe_) ────────────────────────────────────────────────────
    function seleccionarOpcionDHI_vfe(el, prefix) {
        if (el.checked) {
            ['_s', '_av', '_n'].forEach(function(suf) {
                var cb = document.getElementById(prefix + suf);
                if (cb && cb !== el) cb.checked = false;
            });
        }
        calcularDHI_vfe();
    }

    function generarPDFValoracionEquilibrio() {
        var datos = {};
        $('#vfe_ev-ofa').find('input:not([type="hidden"]), select, textarea').each(function() {
            if ($(this).attr('type') === 'checkbox') {
                if ($(this).is(':checked')) {
                    var key = $(this).attr('id') || $(this).attr('name');
                    if (key) datos[key] = $(this).val();
                }
                return;
            }
            var key = $(this).attr('id') || $(this).attr('name');
            if (key) datos[key] = $(this).val();
        });
        // Puntajes DHI calculados en spans
        datos['vfe_dhi_score_emoc']  = $('#vfe_dhi_score_emoc').text().trim()  || '0';
        datos['vfe_dhi_score_func']  = $('#vfe_dhi_score_func').text().trim()  || '0';
        datos['vfe_dhi_score_fisic'] = $('#vfe_dhi_score_fisic').text().trim() || '0';
        // Interpretación DHI (texto del alert)
        datos['vfe_dhi_interpretacion_texto'] = $('#vfe_dhi_interpretacion').text().trim() || '';

        var btn = $('[onclick="generarPDFValoracionEquilibrio()"]');
        btn.prop('disabled', true).html('<i class="feather icon-loader"></i> Generando...');

        $.ajax({
            url: "{{ route('fono.valoracion.equilibrio.pdf') }}",
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                hora_medica:       $('#hora_medica').val(),
                id_paciente_fc:    $('#id_paciente_fc').val(),
                id_profesional_fc: $('#id_profesional_fc').val(),
                datos:             JSON.stringify(datos)
            },
            success: function(response) {
                btn.prop('disabled', false).html('<i class="feather icon-file-text"></i> Generar PDF');
                if (response.ruta) {
                    var w = 900, h = 650;
                    var l = (screen.width  - w) / 2;
                    var t = (screen.height - h) / 2;
                    window.open(response.ruta, 'PDF_VFE', 'width=' + w + ',height=' + h + ',top=' + t + ',left=' + l);
                } else {
                    swal({ title: 'Error', text: response.error || 'No se pudo generar el PDF.', icon: 'error' });
                }
            },
            error: function() {
                btn.prop('disabled', false).html('<i class="feather icon-file-text"></i> Generar PDF');
                swal({ title: 'Error', text: 'No se pudo conectar con el servidor.', icon: 'error' });
            }
        });
    }

    function calcularDHI_vfe() {
        function pad2(n) { return n < 10 ? '0' + n : '' + n; }
        function getScore(idx) {
            var s  = document.getElementById('vfe_dhi_c' + pad2(idx) + '_s');
            var av = document.getElementById('vfe_dhi_c' + pad2(idx) + '_av');
            if (s  && s.checked)  return 4;
            if (av && av.checked) return 2;
            return 0;
        }
        var emoc = 0, func = 0, fisic = 0;
        for (var i = 1;  i <= 9;  i++) emoc  += getScore(i);
        for (var i = 10; i <= 18; i++) func  += getScore(i);
        for (var i = 19; i <= 25; i++) fisic += getScore(i);
        var total = emoc + func + fisic;

        var eEl   = document.getElementById('vfe_dhi_score_emoc');
        var fEl   = document.getElementById('vfe_dhi_score_func');
        var phEl  = document.getElementById('vfe_dhi_score_fisic');
        var inp   = document.getElementById('vfe_dhi_total');
        var intEl = document.getElementById('vfe_dhi_interpretacion');

        if (eEl)  eEl.textContent  = emoc;
        if (fEl)  fEl.textContent  = func;
        if (phEl) phEl.textContent = fisic;
        if (inp)  inp.value        = total;

        var interp, cls;
        if      (total <= 16) { interp = 'Sin handicap';      cls = 'alert-success'; }
        else if (total <= 36) { interp = 'Handicap leve';     cls = 'alert-info';    }
        else if (total <= 56) { interp = 'Handicap moderado'; cls = 'alert-warning'; }
        else                  { interp = 'Handicap severo';   cls = 'alert-danger';  }

        if (intEl) {
            intEl.className    = 'alert py-2 px-3 ' + cls;
            intEl.innerHTML    = '<strong>' + interp + '</strong> — Puntaje: <strong>' + total + '</strong>/100';
            intEl.style.display = 'block';
        }
    }
</script>
