                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-secciones  nav-fill mb-3" id="lab_ev-fono_habla" role="tablist">
                            <li class="nav-item-secciones">
                                <a class="nav-secciones active text-uppercase" id="lab_test_avisual-tab" data-toggle="tab" href="#lab_test_avisual" role="tab" aria-controls="lab_test_avisual" aria-selected="false">Test Agudeza Visual</a>
                            </li>
                            <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="apoyo_monopodal_tab" data-toggle="tab" href="#lab_apoyo_monopodal" role="tab" aria-controls="lab_apoyo_monopodal" aria-selected="true">Test de apoyo monopodal</a>
                            </li>
                            <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="lab_alcance-func-tab" data-toggle="tab" href="#lab_alcance-func" role="tab" aria-controls="lab_alcance-func" aria-selected="true">Test alcance funcional</a>
                            </li>
                            <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="lab_tugo-tab" data-toggle="tab" href="#lab_tugo" role="tab" aria-controls="lab_tugo" aria-selected="false">Timed up and go</a>
                            </li>
                             <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="lab_ind_mar_din-tab" data-toggle="tab" href="#lab_ind_mar_din" role="tab" aria-controls="lab_ind_mar_din" aria-selected="false">Índice de marcha dinámica</a>
                            </li>
                            <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="lab_inc_mareo-tab" data-toggle="tab" href="#lab_inc_mareo" role="tab" aria-controls="lab_inc_mareo" aria-selected="false">Discapacidad por mareo</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="lab_ev-ofa">
                            <!--TEXT AGUDEZA VISUAL-->
                            <div class="tab-pane fade show active" id="lab_test_avisual" role="tabpanel" aria-labelledby="lab_test_avisual-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-white py-2">
                                                <h6 id="lab_tav" class="f-20 text-c-blue">Test de agudeza visual</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-lineal">
                                                            <div class="card-header-lineal">
                                                                EVALUACIÓN VOR (reflejo vestíbulo-ocular)
                                                            </div>
                                                            <div class="card-body-lineal">
                                                                <div class="form-row">
                                                                     <div class="col-sm-4 mt-2">
                                                                        <div class="form-group">
                                                                           <h6 class="text-dark f-18">Lectura A 2 Mts.</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 mt-2">
                                                                        <div class="form-group">
                                                                            <h6 class="text-dark f-18">Cartilla Snellen</h6>
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
                                                                                <option value="2"> mayor a 2 (Describir)</option>
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
                                                                                <option value="2"> mayor a 2 (Describir)</option>
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
                                                                                <option value="2"> mayor a 2 (Describir)</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="tav_div_m-vert-cab" style="display:none">
                                                                            <label id="" name="" class="floating-label-activo-sm" for="lab_m-vert-cab_obs">Mov. Verticales Cabeza</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tav_m-vert-cab_obs" id="tav_m-vert-cab_obs"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-12 mt-2">
                                                                        <h6 class="text-dark f-18 mb-3">Observaciones</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 mt-2">
                                                                        <div class="form-group" id="tav_div_vod_obs">
                                                                            <label id="" name="" class="floating-label-activo-sm" for="tav_vod_obs" >Obs. Examen Test agudeza visual</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tav_vod_obs" id="tav_vod_obs"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                        <div class="card  border border-success shadow-none" style="background-color: #ecf9f0;">
                                                                            <div class="card-body">
                                                                                <h6 class="f-18 text-dark"><i class="fas fa-check-circle text-success "></i> Normal</h6>
                                                                                <h6 class="pl-4 text-dark">0 – 1</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                        <div class="card  border border-danger shadow-none" style="background-color: #fff6f6;">
                                                                            <div class="card-body">
                                                                                <h6 class="f-18 text-dark"><i class="fas fa-times-circle text-danger"></i> Patológico</h6>
                                                                                <h6 class="pl-4 text-dark">2  o Mayor </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="form-row mt-2">
                                                                    <div class="col-sm-12">
                                                                        <table class="table table-sm table-bordered text-center">
                                                                            <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                                            <tbody>
                                                                                <tr class="table-success"><td>0 – 1</td><td>Normal</td></tr>
                                                                                <tr class="table-danger"><td>2  o mayor </td><td>Patológico</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>-->
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--------------TEST DE APOYO MONOPODAL------------------------->
                            <div class="tab-pane fade show" id="lab_apoyo_monopodal" role="tabpanel" aria-labelledby="apoyo_monopodal_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-white py-2">
                                                <h6 id="apoyo-monopodal" class="f-20 text-c-blue">Test de apoyo monopodal</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form>
                                                            <div class="form-row mb-4">
                                                                <div class="col-sm-12  col-md-2 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="f-18 text-dark">Intento 1</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pi_int_uno">Pierna Izquierda</label>
                                                                        <select name="pi_int_uno" id="pi_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi_int_uno','div_pi_int_uno','pi_int_uno_obs',2);">
                                                                            <option value="1">Igual o mayor de 5 segundos</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pi_int_uno" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pi_int_uno_obs">Obs. Pierna Izquierda uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_uno_obs" id="pi_int_uno_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pd_int_uno">Pierna Derecha</label>
                                                                        <select name="pd_int_uno" id="pd_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd_int_uno','div_pd_int_uno','pd_int_uno_obs',2);">
                                                                            <option value="1">Igual o mayor de 5 segundos</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pd_int_uno" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pd_int_uno_obs">Obs. Pierna Derecha uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_uno_obs" id="pd_int_uno_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="col-sm-12  col-md-2 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="f-18 text-dark">Intento 2</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pi_int_dos">Pierna Izquierda</label>
                                                                        <select name="pi_int_dos" id="pi_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi_int_dos','div_pi_int_dos','pi_int_dos_obs',2);">
                                                                            <option value="1">Igual o mayor de 5 segundos</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pi_int_dos" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pi_int_dos_obs">Obs. Pierna Izquierda uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_dos_obs" id="pi_int_dos_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pd_int_dos">Pierna Derecha</label>
                                                                        <select name="pd_int_dos" id="pd_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd_int_dos','div_pd_int_dos','pd_int_dos_obs',2);">
                                                                            <option value="1">Igual o mayor de 5 segundos</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pd_int_dos" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pd_int_dos_obs">Obs. Pierna Derecha uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_dos_obs" id="pd_int_dos_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="col-sm-12 col-md-2 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="f-18 text-dark">Intento 3</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pi_int_tres">Pierna Izquierda</label>
                                                                        <select name="pi_int_tres" id="pi_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi_int_tres','div_pi_int_tres','pi_int_tres_obs',2);">
                                                                            <option value="1">Igual o mayor de 5 segundos</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pi_int_tres" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pi_int_tres_obs">Obs. Pierna Izquierda uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi_int_tres_obs" id="pi_int_tres_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pd_int_tres">Pierna Derecha</label>
                                                                        <select name="pd_int_tres" id="pd_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd_int_tres','div_pd_int_tres','pd_int_tres_obs',2);">
                                                                            <option value="1">Igual o mayor de 5 segundos</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pd_int_tres" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pd_int_tres_obs">Obs. Pierna Derecha uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd_int_tres_obs" id="pd_int_tres_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-12 mt-2">
                                                                    <div class="form-group" id="div_ofa_vest_boc">
                                                                        <label  class="floating-label-activo-sm" for="obs_testamp" >Obs. Test de apoyo monopodal</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_testamp" id="obs_testamp"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mt-2">
                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card  border border-success shadow-none" style="background-color: #ecf9f0;">
                                                                        <div class="card-body">
                                                                            <h6 class="f-18 text-dark"><i class="fas fa-check-circle text-success "></i> Normal</h6>
                                                                            <h6 class="pl-4 text-dark">Mayor o igual a 5 seg.</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card  border border-danger shadow-none" style="background-color: #fff6f6;">
                                                                        <div class="card-body">
                                                                            <h6 class="f-18 text-dark"><i class="fas fa-times-circle text-danger"></i> Patológico</h6>
                                                                            <h6 class="pl-4 text-dark">Menor a 5 seg.</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--<div class="form-row mt-2">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-sm table-bordered text-center">
                                                                        <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                                        <tbody>
                                                                            <tr class="table-success"><td>Mayor o igual a 5 seg.</td><td>Normal</td></tr>
                                                                            <tr class="table-danger"><td>Menor a 5 seg. </td><td>Patológico</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------TEST DE ALCANCE FUNCIONAL------------------------------>
                            <div class="tab-pane fade show" id="lab_alcance-func" role="tabpanel" aria-labelledby="lab_alcance-func-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                             <div class="card-header bg-white py-2">
                                                <h6 id="alc_func" class="f-20 text-c-blue">Test de alcance funcional</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form>
                                                            <div class="form-row mb-4">
                                                                <div class="col-sm-12  col-md-2 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="f-18 text-dark">Intento 1</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pi-af_int_uno">Pierna Izquierda</label>
                                                                        <select name="pi-af_int_uno" id="pi-af_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi-af_int_uno','div_pi-af_int_uno','pi-af_int_uno_obs',2);">
                                                                            <option value="1">Igual o mayor de 15 cm.</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pi-af_int_uno" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pi-af_int_uno_obs">Obs. Pierna Izquierda uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_uno_obs" id="pi-af_int_uno_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pd-af_int_uno">Pierna Derecha</label>
                                                                        <select name="pd-af_int_uno" id="pd-af_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd-af_int_uno','div_pd-af_int_uno','pd-af_int_uno_obs',2);">
                                                                            <option value="1">Igual o mayor de 15 cm.</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pd-af_int_uno" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pd-af_int_uno_obs">Obs. Pierna Derecha uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_uno_obs" id="pd-af_int_uno_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="col-sm-12  col-md-2 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="text-darK f-18">Intento 2</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pi-af_int_dos">Pierna Izquierda</label>
                                                                        <select name="pi-af_int_dos" id="pi-af_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi-af_int_dos','div_pi-af_int_dos','pi-af_int_dos_obs',2);">
                                                                            <option value="1">Igual o mayor de 15 cm.</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pi-af_int_dos" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pi-af_int_dos_obs">Obs. Pierna Izquierda uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_dos_obs" id="pi-af_int_dos_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pd-af_int_dos">Pierna Derecha</label>
                                                                        <select name="pd-af_int_dos" id="pd-af_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd-af_int_dos','div_pd-af_int_dos','pd-af_int_dos_obs',2);">
                                                                            <option value="1">Igual o mayor de 15 cm.</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pd-af_int_dos" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pd-af_int_dos_obs">Obs. Pierna Derecha uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_dos_obs" id="pd-af_int_dos_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row mb-4">
                                                                 <div class="col-sm-12  col-md-2 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="f-18 text-dark">Intento 3</h6>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pi-af_int_tres">Pierna Izquierda</label>
                                                                        <select name="pi-af_int_tres" id="pi-af_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pi-af_int_tres','div_pi-af_int_tres','pi-af_int_tres_obs',2);">
                                                                            <option value="1">Igual o mayor de 15 cm.</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pi-af_int_tres" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pi-af_int_tres_obs">Obs. Pierna Izquierda uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pi-af_int_tres_obs" id="pi-af_int_tres_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-sm-12  col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="pd-af_int_tres">Pierna Derecha</label>
                                                                        <select name="pd-af_int_tres" id="pd-af_int_tres"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pd-af_int_tres','div_pd-af_int_tres','pd-af_int_tres_obs',2);">
                                                                            <option value="1">Igual o mayor de 15 cm.</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_pd-af_int_tres" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="pd-af_int_tres_obs">Obs. Pierna Derecha uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="pd-af_int_tres_obs" id="pd-af_int_tres_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 mt-2">
                                                                    <div class="form-group" id="div_ofa_vest_boc">
                                                                        <label  class="floating-label-activo-sm" for="obs_test-alcfunc" >Obs. Test de alcance funcional</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_test-alcfunc" id="obs_test-alcfunc"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mt-2">
                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card  border border-success shadow-none" style="background-color: #ecf9f0;">
                                                                        <div class="card-body">
                                                                            <h6 class="f-18 text-dark"><i class="fas fa-check-circle text-success "></i> Normal</h6>
                                                                            <h6 class="pl-4 text-dark">Mayor o igual a 15 seg.</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card  border border-danger shadow-none" style="background-color: #fff6f6;">
                                                                        <div class="card-body">
                                                                            <h6 class="f-18 text-dark"><i class="fas fa-times-circle text-danger"></i> Patológico</h6>
                                                                            <h6 class="pl-4 text-dark">Menor a 15 seg.</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--<div class="form-row mt-2">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-sm table-bordered text-center">
                                                                        <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                                        <tbody>
                                                                            <tr class="table-success"><td>Mayor o igual a 15 cm.</td><td>Normal</td></tr>
                                                                            <tr class="table-danger"><td>Menor a 15 cm. </td><td>Patológico</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------TIMED UP AND GO------------------------------>
                            <div class="tab-pane fade show" id="lab_tugo" role="tabpanel" aria-labelledby="lab_tugo-tab">

                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                             <!--<div class="card-header bg-white">
                                                <h6 id="alc_func" class="f-18 text-c-blue">Timed Up And Go</h6>
                                            </div>-->
                                              <div class="card-header bg-white py-2">
                                                <h6 id="lab_tav" class="f-18 text-c-blue">Timed Up And Go</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form>
                                                            <div id="alc_func" class="form-row mb-4">
                                                                <div class="col-sm-12 mt-2">
                                                                    <div class="form-group fill">
                                                                        <p>  Posición sedente a bípedo, caminar 3 Mts. en línea recta, girar y volver a posición sedente.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="text-dark f-18">Intento 1</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5">
                                                                    <div class="form-group-modern">
                                                                        <label class="floating-label-activo-sm" for="tuag_int_uno">Tiempo 1</label>
                                                                        <select name="tuag_int_uno" id="tuag_int_uno"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tuag_int_uno','div_tuag_int_uno','tuag_int_uno_obs',2);">
                                                                            <option value="1">Normal (< 10 segundos)</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="col-sm-12 col-md-5">
                                                                    <div class="form-group" id="div_tuag_int_uno" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="tuag_int_uno_obs">Obs. intento uno</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tuag_int_uno_obs" id="tuag_int_uno_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--<div class="form-row">
                                                                <div class="col-sm-6 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class=".text-muted">Intento 1</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mt-2">
                                                                    <div class="form-group-modern">
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
                                                            </div>-->
                                                            <div class="form-row mt-4">
                                                               <div class="col-12 col-md-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="text-dark f-18 mb-1">Intento 2</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="tuag_int_dos">Tiempo 2</label>
                                                                        <select name="tuag_int_dos" id="tuag_int_dos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tuag_int_dos','div_tuag_int_dos','tuag_int_dos_obs',2);">
                                                                            <option value="1">Normal (< 10 segundos)</option>
                                                                            <option value="2">Alterado </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 mt-2">
                                                                    <div class="form-group" id="div_tuag_int_dos" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="tuag_int_dos_obs">Obs. intento dos</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tuag_int_dos_obs" id="tuag_int_dos_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row mt-4">
                                                                <div class="col-sm-12 mt-2">
                                                                   <div class="form-group fill">
                                                                        <h6 class="text-dark f-18">Observaciones</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 mt-2">
                                                                    <div class="form-group" id="div_ofa_vest_boc">
                                                                        <label  class="floating-label-activo-sm" for="obs_test-tuag" >Obs. Test timed up and go</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_test-tuag" id="obs_test-tuag"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mt-2">
                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card  border border-success shadow-none" style="background-color: #ecf9f0;">
                                                                        <div class="card-body">
                                                                            <h6 class="f-18 text-dark"><i class="fas fa-check-circle text-success "></i> Normal</h6>
                                                                            <h6 class="pl-4 text-dark">Mayor de 10 seg.<br>(Media AM 60 años)</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card  border border-danger shadow-none pb-3" style="background-color: #fff6f6;">
                                                                        <div class="card-body">
                                                                            <h6 class="f-18 text-dark"><i class="fas fa-times-circle text-danger"></i> Patológico</h6>
                                                                            <h6 class="pl-4 text-dark">Menor a 10 seg.<br></h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--<div class="form-row mt-2">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-sm table-bordered text-center">
                                                                        <thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>
                                                                        <tbody>
                                                                            <tr class="table-success"><td>Menor de 10 seg.(media AM 60 años)</td><td>Normal</td></tr>
                                                                            <tr class="table-danger"><td>Mayor a 10 seg. </td><td>Patológico</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!------------------INDICE DE MARCHA DINÁMICA------------------------------>
                            <div class="tab-pane fade show" id="lab_ind_mar_din" role="tabpanel" aria-labelledby="lab_ind_mar_din-tab">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-white py-2">
                                                <h6 id="lab_tav" class="f-18 text-c-blue">Índice de Marca Dinámica</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="card-lineal">
                                                                    <div class="card-body-lineal">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill mb-1">
                                                                                    <h6 class="text-dark f-16 mb-1">Marcha normal</h6>
                                                                                </div>
                                                                            </div>
                                                                             <div class="col-sm-4 mt-2">
                                                                                <div class="form-group fill mb-1">
                                                                                    <label class="floating-label-activo-sm" for="imd_dgi">DGI</label>
                                                                                    <select name="imd_dgi" id="imd_dgi" class="form-control form-control-sm" onchange="actualizarLeyendaIMD_lab()">
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
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                        </div>
                                                         <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="card-lineal">
                                                                    <div class="card-body-lineal">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill mb-1">
                                                                                    <h6 class="text-dark f-16 mb-1">Marcha con cambio de velocidad</h6>
                                                                                </div>
                                                                            </div>
                                                                             <div class="col-sm-4 mt-2">
                                                                                <div class="form-group mb-1">
                                                                                    <label class="floating-label-activo-sm" for="imd_dgi">DGI</label>
                                                                                    <select name="imd_dgi1" id="imd_dgi1" class="form-control form-control-sm" onchange="actualizarLeyendaIMD1_lab()">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="card-lineal">
                                                                    <div class="card-body-lineal">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill mb-1">
                                                                                    <h6 class="text-dark f-16 mb-1">Marcha con movimientos de cabeza horizontales</h6>
                                                                                </div>
                                                                            </div>
                                                                             <div class="col-sm-4 mt-2">
                                                                                <div class="form-group mb-1">
                                                                                    <label class="floating-label-activo-sm" for="imd_dgi2">DGI</label>
                                                                                    <select name="imd_dgi2" id="imd_dgi2" class="form-control form-control-sm" onchange="actualizarLeyendaIMD2_lab()">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                         <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="card-lineal">
                                                                    <div class="card-body-lineal">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill mb-1">
                                                                                    <h6 class="text-dark f-16">Marcha con movimientos de cabeza verticales</h6>
                                                                                </div>
                                                                            </div>
                                                                             <div class="col-sm-4 mt-2">
                                                                                <div class="form-group fill mb-1">
                                                                                    <label class="floating-label-activo-sm" for="imd_dgi3">DGI</label>
                                                                                    <select name="imd_dgi3" id="imd_dgi3" class="form-control form-control-sm" onchange="actualizarLeyendaIMD3_lab()">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-4">
                                                                <div class="form-group">
                                                                    <h6 class="text-dark f-16 mb-1">Puntaje total</h6>
                                                                    <input type="number" class="form-control" name="dgi-1" id="dgi-1" readonly placeholder="--">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-row">
                                                             <div class="col-sm-12 mt-4">
                                                                <div class="form-group fill mb-1">
                                                                    <h6 class="text-dark f-16">Observaciones del exámen DGI</h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="imd_div_vod_obs">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="imd_vod_obs"></label>
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
                            </div>
                             <!------------------CUESTIONARIO INCAPACIDAD POR MAREO------------------------------>
                            <div class="tab-pane fade show" id="lab_inc_mareo" role="tabpanel" aria-labelledby="lab_inc_mareo-tab">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                             <div class="card-header bg-white">
                                                <h6 id="inc_tav" class="f-20 text-c-blue">Cuestionario incapacidad por mareo</h6>
                                            </div>

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c01_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c01')">
                                                                            <label class="form-check-label" for="lab_dhi_c01_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c01_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c01')">
                                                                            <label class="form-check-label" for="lab_dhi_c01_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c01_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c01')">
                                                                            <label class="form-check-label" for="lab_dhi_c01_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c02_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c02')">
                                                                            <label class="form-check-label" for="lab_dhi_c02_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c02_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c02')">
                                                                            <label class="form-check-label" for="lab_dhi_c02_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c02_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c02')">
                                                                            <label class="form-check-label" for="lab_dhi_c02_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c03_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c03')">
                                                                            <label class="form-check-label" for="lab_dhi_c03_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c03_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c03')">
                                                                            <label class="form-check-label" for="lab_dhi_c03_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c03_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c03')">
                                                                            <label class="form-check-label" for="lab_dhi_c03_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c04_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c04')">
                                                                            <label class="form-check-label" for="lab_dhi_c04_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c04_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c04')">
                                                                            <label class="form-check-label" for="lab_dhi_c04_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c04_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c04')">
                                                                            <label class="form-check-label" for="lab_dhi_c04_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c05_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c05')">
                                                                            <label class="form-check-label" for="lab_dhi_c05_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c05_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c05')">
                                                                            <label class="form-check-label" for="lab_dhi_c05_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c05_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c05')">
                                                                            <label class="form-check-label" for="lab_dhi_c05_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c06_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c06')">
                                                                            <label class="form-check-label" for="lab_dhi_c06_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c06_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c06')">
                                                                            <label class="form-check-label" for="lab_dhi_c06_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c06_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c06')">
                                                                            <label class="form-check-label" for="lab_dhi_c06_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c07_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c07')">
                                                                            <label class="form-check-label" for="lab_dhi_c07_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c07_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c07')">
                                                                            <label class="form-check-label" for="lab_dhi_c07_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c07_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c07')">
                                                                            <label class="form-check-label" for="lab_dhi_c07_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c08_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c08')">
                                                                            <label class="form-check-label" for="lab_dhi_c08_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c08_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c08')">
                                                                            <label class="form-check-label" for="lab_dhi_c08_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c08_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c08')">
                                                                            <label class="form-check-label" for="lab_dhi_c08_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c09_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c09')">
                                                                            <label class="form-check-label" for="lab_dhi_c09_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c09_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c09')">
                                                                            <label class="form-check-label" for="lab_dhi_c09_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c09_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c09')">
                                                                            <label class="form-check-label" for="lab_dhi_c09_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c10_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c10')">
                                                                                <label class="form-check-label" for="lab_dhi_c10_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c10_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c10')">
                                                                                <label class="form-check-label" for="lab_dhi_c10_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c10_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c10')">
                                                                                <label class="form-check-label" for="lab_dhi_c10_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c11_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c11')">
                                                                                <label class="form-check-label" for="lab_dhi_c11_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c11_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c11')">
                                                                                <label class="form-check-label" for="lab_dhi_c11_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c11_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c11')">
                                                                                <label class="form-check-label" for="lab_dhi_c11_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c12_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c12')">
                                                                                <label class="form-check-label" for="lab_dhi_c12_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c12_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c12')">
                                                                                <label class="form-check-label" for="lab_dhi_c12_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c12_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c12')">
                                                                                <label class="form-check-label" for="lab_dhi_c12_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c13_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c13')">
                                                                                <label class="form-check-label" for="lab_dhi_c13_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c13_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c13')">
                                                                                <label class="form-check-label" for="lab_dhi_c13_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c13_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c13')">
                                                                                <label class="form-check-label" for="lab_dhi_c13_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c14_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c14')">
                                                                                <label class="form-check-label" for="lab_dhi_c14_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c14_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c14')">
                                                                                <label class="form-check-label" for="lab_dhi_c14_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c14_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c14')">
                                                                                <label class="form-check-label" for="lab_dhi_c14_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c15_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c15')">
                                                                                <label class="form-check-label" for="lab_dhi_c15_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c15_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c15')">
                                                                                <label class="form-check-label" for="lab_dhi_c15_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c15_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c15')">
                                                                                <label class="form-check-label" for="lab_dhi_c15_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c16_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c16')">
                                                                                <label class="form-check-label" for="lab_dhi_c16_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c16_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c16')">
                                                                                <label class="form-check-label" for="lab_dhi_c16_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c16_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c16')">
                                                                                <label class="form-check-label" for="lab_dhi_c16_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c17_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c17')">
                                                                                <label class="form-check-label" for="lab_dhi_c17_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c17_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c17')">
                                                                                <label class="form-check-label" for="lab_dhi_c17_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c17_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c17')">
                                                                                <label class="form-check-label" for="lab_dhi_c17_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c18_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c18')">
                                                                                <label class="form-check-label" for="lab_dhi_c18_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c18_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c18')">
                                                                                <label class="form-check-label" for="lab_dhi_c18_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c18_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c18')">
                                                                                <label class="form-check-label" for="lab_dhi_c18_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c19_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c19')">
                                                                            <label class="form-check-label" for="lab_dhi_c19_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c19_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c19')">
                                                                            <label class="form-check-label" for="lab_dhi_c19_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c19_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c19')">
                                                                            <label class="form-check-label" for="lab_dhi_c19_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c20_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c20')">
                                                                            <label class="form-check-label" for="lab_dhi_c20_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c20_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c20')">
                                                                            <label class="form-check-label" for="lab_dhi_c20_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c20_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c20')">
                                                                            <label class="form-check-label" for="lab_dhi_c20_n">Nunca </label>
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
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c21_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c21')">
                                                                                <label class="form-check-label" for="lab_dhi_c21_s">Siempre</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c21_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c21')">
                                                                                <label class="form-check-label" for="lab_dhi_c21_av">A veces</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="lab_dhi_c21_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c21')">
                                                                                <label class="form-check-label" for="lab_dhi_c21_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c22_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c22')">
                                                                            <label class="form-check-label" for="lab_dhi_c22_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c22_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c22')">
                                                                            <label class="form-check-label" for="lab_dhi_c22_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c22_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c22')">
                                                                            <label class="form-check-label" for="lab_dhi_c22_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c23_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c23')">
                                                                            <label class="form-check-label" for="lab_dhi_c23_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c23_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c23')">
                                                                            <label class="form-check-label" for="lab_dhi_c23_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c23_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c23')">
                                                                            <label class="form-check-label" for="lab_dhi_c23_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c24_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c24')">
                                                                            <label class="form-check-label" for="lab_dhi_c24_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c24_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c24')">
                                                                            <label class="form-check-label" for="lab_dhi_c24_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c24_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c24')">
                                                                            <label class="form-check-label" for="lab_dhi_c24_n">Nunca </label>
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
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c25_s" value="4" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c25')">
                                                                            <label class="form-check-label" for="lab_dhi_c25_s">Siempre</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c25_av" value="2" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c25')">
                                                                            <label class="form-check-label" for="lab_dhi_c25_av">A veces</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lab_dhi_c25_n" value="0" onchange="seleccionarOpcionDHI_lab(this, 'lab_dhi_c25')">
                                                                            <label class="form-check-label" for="lab_dhi_c25_n">Nunca </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade show mb-2" id="result" role="tabpanel" aria-labelledby="result-tab">
                                                                <!-- Tablas de referencia -->
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-6">
                                                                        <h6 class="tit-gen">INTERPRETACIÓN Y RESULTADOS DHI</h6>
                                                                        <table class="table table-sm table-bordered text-center">
                                                                            <thead class="thead-light"><tr><th>Respuesta</th><th>Valor</th></tr></thead>
                                                                            <tbody>
                                                                                <tr><td class="font-weight-bold">Siempre</td><td><strong>4</strong></td></tr>
                                                                                <tr><td class="font-weight-bold">A veces</td><td><strong>2</strong></td></tr>
                                                                                <tr><td class="font-weight-bold">Nunca</td><td><strong>0</strong></td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h6 class="tit-gen">Rango de interpretación (DHI)</h6>
                                                                        <table class="table table-sm table-bordered text-center rounded-xl">
                                                                            <!--<thead class="thead-light"><tr><th>Rango total</th><th>Interpretación</th></tr></thead>-->
                                                                            <tbody>
                                                                                <tr class="table-success font-weight-bold"><td>0 – 16</td><td>Sin handicap</td></tr>
                                                                                <tr class="table-info font-weight-bold"><td>18 – 36</td><td>Handicap leve</td></tr>
                                                                                <tr class="table-warning font-weight-bold"><td>38 – 56</td><td>Handicap moderado</td></tr>
                                                                                <tr class="table-danger font-weight-bold"><td>58 – 100</td><td>Handicap severo</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- Puntajes por categoría -->
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-4 text-center">
                                                                        <div class="card border-primary">
                                                                            <div class="card-body py-2">
                                                                                <div class="media">
                                                                                    <img class="img-fluid wid-60 mr-3" src="{{ asset('images/iconos/emocion-ex.png') }}" class="mr-3" alt="Emocional">
                                                                                    <div class="media-body text-left">
                                                                                        <h5 class="font-weight-bold d-block">Emocional</h5>
                                                                                        <span class="h3 font-weight-bold text-success" id="dhi_score_emoc_lab">--</span>
                                                                                        <small class="font-weight-bold h6 text-muted"> / 36</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 text-center">
                                                                        <div class="card border-info">
                                                                            <div class="card-body py-2">
                                                                                <div class="media">
                                                                                    <img class="img-fluid wid-60 mr-3" src="{{ asset('images/iconos/funcional-ex.png') }}" class="mr-3" alt="Emocional">
                                                                                    <div class="media-body text-left">
                                                                                        <h5 class="font-weight-bold d-block">Funcional</h5>
                                                                                        <span class="h3 font-weight-bold text-info" id="dhi_score_func_lab">--</span>
                                                                                        <small class="font-weight-bold h6 text-muted"> / 36</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 text-center">
                                                                        <div class="card border-warning">
                                                                            <div class="card-body py-2">
                                                                                <div class="media">
                                                                                    <img class="img-fluid wid-60 mr-3" src="{{ asset('images/iconos/fisico-ex.png') }}" class="mr-3" alt="Emocional">
                                                                                    <div class="media-body text-left">
                                                                                        <h5 class="font-weight-bold d-block">Físico</h5>
                                                                                        <span class="h3 font-weight-bold text-warning" id="dhi_score_fisic_lab">--</span>
                                                                                        <small class="font-weight-bold h6 text-muted"> / 28</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Puntaje total e interpretación -->
                                                                <div class="form-row mt-3 align-items-center">
                                                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_disc_mareo">OBSERVACIONES INCAPACIDAD POR MAREO</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_disc_mareo" id="obs_disc_mareo"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Puntaje total DHI</label>
                                                                            <input type="number" class="form-control form-control-sm" name="dhi_total" id="dhi_total" readonly placeholder="--">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                        <div id="dhi_interpretacion_lab" class="alert py-2 px-3" style="display:none;"></div>
                                                                    </div>
                        
                                                                </div>
                                                                <hr>
                                                                <!-- Botones Guardar / PDF -->
                                                                <div class="row mt-2">
                                                                    <div class="col-sm-12 text-right">
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="generarPDFValoracionEquilibrio_lab()">
                                                                            <i class="fas fa-file-pdf"></i> Generar PDF
                                                                        </button>
                                                                        <button type="button" class="btn btn-info btn-sm ml-1" onclick="guardarValoracionEquilibrio_lab()">
                                                                            <i class="feather icon-save"></i> Guardar
                                                                        </button>
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
function calcularPuntajeIMD_lab() {
    var ids = ['imd_dgi', 'imd_dgi1', 'imd_dgi2', 'imd_dgi3'];
    var total = 0;
    var seleccionados = 0;
    ids.forEach(function(id) {
        var el = document.getElementById(id);
        if (el && el.value !== '') {
            total += parseInt(el.value, 10);
            seleccionados++;
        }
    });
    var salida = document.getElementById('dgi-1');
    if (salida) salida.value = seleccionados > 0 ? total : '';
    var tab = document.getElementById('lab_ind_mar_din-tab');
    if (tab) {
        tab.textContent = 'Índice de marcha dinámica' + (seleccionados > 0 ? ' (' + total + '/12)' : '');
    }
}

function actualizarLeyendaIMD_lab() {
    var val = document.getElementById('imd_dgi').value;
    var el  = document.getElementById('imd_leyenda_dgi');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>No puede caminar sin ayuda,desviaciones severas de la marcha o equilibrio' },
        '1': { clase: 'alert-warning', texto: '<strong>Velocidad lenta, patrón de marcha anormal, evidencia de desequilibrio' },
        '2': { clase: 'alert-info',    texto: '<strong>Utiliza dispositivos de asistencia, velocidad lenta, desviaciones leves de la marcha' },
        '3': { clase: 'alert-success', texto: '<strong>Camina sin dipositivos de asistencia, buena velocidad, sin evidencia de desequilibrio, patrón de marcha normal' }
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
    calcularPuntajeIMD_lab();
}
function actualizarLeyendaIMD1_lab() {
    var val = document.getElementById('imd_dgi1').value;
    var el  = document.getElementById('imd_leyenda_dgi1');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>No puede cambiar de velocidad, o pierde el equilibrio y tiene que alcanzar la pared o ser atrapado' },
        '1': { clase: 'alert-warning', texto: '<strong>Hace solo ajustes menores a la velocidad de marcha, o logra un cambio de velocidad con desviaciones significatrivas de la marcha, o cambia la velocidad pero tiene desviaciones significativas de la marcha o cambia la velocidad pero pierde el equilibrio pero es capaz de recuperarse y continuar caminando' },
        '2': { clase: 'alert-info',    texto: '<strong> Es capaz de cambiar la velocidad pero demuestra desviaciones leves de la marcha o no desviaciones de la marchapero incapaz delograr un cambio significativo en la velocidad d, o utiliza un dispositivo de asistencia' },
        '3': { clase: 'alert-success', texto: '<strong>Capaz de cambiar suavementye la velocidad al caminar sin perder el equilibrio  o la desviación de la marcha. Muestra una diferencia significativa en la velocidad de caminar entre la velocidad normal, la rápida y la lenta' }
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
    calcularPuntajeIMD_lab();
}
function actualizarLeyendaIMD2_lab() {
    var val = document.getElementById('imd_dgi2').value;
    var el  = document.getElementById('imd_leyenda_dgi2');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>Realiza la tarea con una alteración severa de la marcha, es decir, se tambalea fuera del camino de 15", pierde el equilibrio, se detiene, alcanza la pared.' },
        '1': { clase: 'alert-warning', texto: '<strong>Realiza giros de la cabeza con un cambio moderado en la velocidad de marcha, se ralentiza, se tambalea pero se recupera, puede seguir caminando' },
        '2': { clase: 'alert-info',    texto: '<strong>Realiza giros de cabeza suavemente con un ligero cambio en la velocidad de la marcha, es decir, una pequeña interrupción en el camino de la marcha suave o utiliza ayuda para caminar' },
        '3': { clase: 'alert-success', texto: '<strong>Realiza giros de cabeza suavemente sin cambios en la marcha' }
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
    calcularPuntajeIMD_lab();
}
function actualizarLeyendaIMD3_lab() {
    var val = document.getElementById('imd_dgi3').value;
    var el  = document.getElementById('imd_leyenda_dgi3');
    var leyendas = {
        '0': { clase: 'alert-danger',  texto: '<strong>Realiza la tarea con una alteración severa de la marcha, es decir, se tambalea fuera del camino de 15", pierde el equilibrio, se detiene, alcanza la pared.' },
        '1': { clase: 'alert-warning', texto: '<strong>Realiza giros de la cabeza con un cambio moderado en la velocidad de marcha, se ralentiza, se tambalea pero se recupera, puede seguir caminando' },
        '2': { clase: 'alert-info',    texto: '<strong>Realiza giros de cabeza suavemente con un ligero cambio en la velocidad de la marcha, es decir, una pequeña interrupción en el camino de la marcha suave o utiliza ayuda para caminar' },
        '3': { clase: 'alert-success', texto: '<strong>Realiza giros de cabeza suavemente sin cambios en la marcha' }
    };
    if (val === '' || !leyendas[val]) {
        el.style.display = 'none';
        el.className = 'alert mb-0 py-2 px-3';
        return;
    }
    el.className = 'alert mb-0 py-2 px-3 ' + leyendas[val].clase;
    el.innerHTML = leyendas[val].texto;
    el.style.display = 'block';
    calcularPuntajeIMD_lab();
}

    // ─── DHI (Cuestionario Incapacidad por Mareo) ────────────────────────────
    // Preguntas por categoría (en orden de aparición → índice lab_dhi_cNN):
    //   Emocional (c01–c09): P2,P9,P10,P15,P18,P20,P21,P22,P23  → máx 36
    //   Funcional (c10–c18): P3,P5,P6,P7,P12,P14,P16,P19,P24    → máx 36
    //   Físico    (c19–c25): P1,P4,P8,P11,P13,P17,P25            → máx 28

    // ─── Guardar valoración (lab) ────────────────────────────────────────────
    function guardarValoracionEquilibrio_lab() {
        var datos = {};
        $('#lab_ev-ofa').find('input:not([type="hidden"]), select, textarea').each(function() {
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
        datos['dhi_score_emoc']  = $('#dhi_score_emoc_lab').text().trim()  || '0';
        datos['dhi_score_func']  = $('#dhi_score_func_lab').text().trim()  || '0';
        datos['dhi_score_fisic'] = $('#dhi_score_fisic_lab').text().trim() || '0';

        var btn = $('[onclick="guardarValoracionEquilibrio_lab()"]');
        btn.prop('disabled', true).html('<i class="feather icon-loader"></i> Guardando...');
        $.ajax({
            url: "{{ route('fono.valoracion.equilibrio.store') }}",
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                hora_medica:       $('#hora_medica').val(),
                id_paciente_fc:    $('#id_paciente_fc').val(),
                id_profesional_fc: $('#id_profesional_fc').val(),
                datos:             JSON.stringify(datos)
            },
            success: function(response) {
                btn.prop('disabled', false).html('<i class="feather icon-save"></i> Guardar');
                if (response.success) {
                    swal({ title: 'Guardado', text: response.mensaje, icon: 'success' });
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

    // ─── Generar PDF (lab) ───────────────────────────────────────────────────
    function generarPDFValoracionEquilibrio_lab() {
        var datos = {};
        $('#lab_ev-ofa').find('input:not([type="hidden"]), select, textarea').each(function() {
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
        datos['vfe_dhi_score_emoc']  = $('#dhi_score_emoc_lab').text().trim()  || '0';
        datos['vfe_dhi_score_func']  = $('#dhi_score_func_lab').text().trim()  || '0';
        datos['vfe_dhi_score_fisic'] = $('#dhi_score_fisic_lab').text().trim() || '0';
        datos['vfe_dhi_interpretacion_texto'] = $('#dhi_interpretacion_lab').text().trim() || '';

        // Normalizar claves a vfe_* para que el template PDF funcione igual que el modal
        var remapped = {};
        Object.keys(datos).forEach(function(k) {
            if (k.startsWith('lab_')) {
                // lab_dhi_c01_s  →  vfe_dhi_c01_s
                remapped['vfe_' + k.slice(4)] = datos[k];
            } else if (!k.startsWith('vfe_')) {
                // tav_met_bpm    →  vfe_tav_met_bpm
                remapped['vfe_' + k] = datos[k];
            }
            remapped[k] = datos[k]; // mantener original también
        });
        // Caso especial: dgi-1 (total DGI en lab) → vfe_dgi_imd_total
        if (datos['dgi-1'] !== undefined) remapped['vfe_dgi_imd_total'] = datos['dgi-1'];

        var btn = $('[onclick="generarPDFValoracionEquilibrio_lab()"]');
        btn.prop('disabled', true).html('<i class="feather icon-loader"></i> Generando...');
        $.ajax({
            url: "{{ route('fono.valoracion.equilibrio.pdf') }}",
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                hora_medica:       $('#hora_medica').val(),
                id_paciente_fc:    $('#id_paciente_fc').val(),
                id_profesional_fc: $('#id_profesional_fc').val(),
                datos:             JSON.stringify(remapped)
            },
            success: function(response) {
                btn.prop('disabled', false).html('<i class="feather icon-file-text"></i> Generar PDF');
                if (response.ruta) {
                    var w = 900, h = 650;
                    var l = (screen.width  - w) / 2;
                    var t = (screen.height - h) / 2;
                    window.open(response.ruta, 'PDF_VFE_LAB', 'width=' + w + ',height=' + h + ',top=' + t + ',left=' + l);
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

    function seleccionarOpcionDHI_lab(el, prefix) {
        if (el.checked) {
            ['_s', '_av', '_n'].forEach(function(suf) {
                var cb = document.getElementById(prefix + suf);
                if (cb && cb !== el) cb.checked = false;
            });
        }
        calcularDHI_lab();
    }

    function calcularDHI_lab() {
        function pad2(n) { return n < 10 ? '0' + n : '' + n; }
        function getScore(idx) {
            var s  = document.getElementById('lab_dhi_c' + pad2(idx) + '_s');
            var av = document.getElementById('lab_dhi_c' + pad2(idx) + '_av');
            if (s  && s.checked)  return 4;
            if (av && av.checked) return 2;
            return 0;
        }
        var emoc = 0, func = 0, fisic = 0;
        for (var i = 1;  i <= 9;  i++) emoc  += getScore(i);
        for (var i = 10; i <= 18; i++) func  += getScore(i);
        for (var i = 19; i <= 25; i++) fisic += getScore(i);
        var total = emoc + func + fisic;

        var eEl   = document.getElementById('dhi_score_emoc_lab');
        var fEl   = document.getElementById('dhi_score_func_lab');
        var phEl  = document.getElementById('dhi_score_fisic_lab');
        var inp   = document.getElementById('dhi_total');
        var intEl = document.getElementById('dhi_interpretacion_lab');

        if (eEl)  eEl.textContent  = emoc;
        if (fEl)  fEl.textContent  = func;
        if (phEl) phEl.textContent = fisic;
        if (inp)  inp.value        = total;

        var interp, cls;
        if      (total <= 16) { interp = 'Sin handicap';       cls = 'alert-success'; }
        else if (total <= 36) { interp = 'Handicap leve';      cls = 'alert-info';    }
        else if (total <= 56) { interp = 'Handicap moderado';  cls = 'alert-warning'; }
        else                  { interp = 'Handicap severo';    cls = 'alert-danger';  }

        if (intEl) {
            intEl.className   = 'alert py-2 px-3 ' + cls;
            intEl.innerHTML   = '<strong>' + interp + '</strong> — Puntaje: <strong>' + total + '</strong>/100';
            intEl.style.display = 'block';
        }
    }
</script>
