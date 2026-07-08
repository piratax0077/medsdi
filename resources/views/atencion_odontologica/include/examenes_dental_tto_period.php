<div class="form row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="form-row">
        <div class="col-md-2">
            <ul class="nav flex-column nav-pills mb-3" id="tto_period" role="tablist">
                <li class="nav-item">
                    <a class="nav-link-aten text-reset active" id="pieza_dental_period_tab" data-toggle="tab" href="#pieza_dental_period" role="tab" aria-controls="pieza_dental_period" aria-selected="true">Pieza dental</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-aten text-reset" id="grupo_dental_period_tab" data-toggle="tab" href="#grupo_dental_period" role="tab" aria-controls="grupo_dental_period" aria-selected="true">Grupo dental</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="tab-content" id="tto_periodContent">
                <div class="tab-pane fade show active" id="pieza_dental_period" role="tabpanel" aria-labelledby="pieza_dental_period_tab">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="card-informacion">
                                <div class="card-body">
                                    <div class="col-sm-12 col-md-9 col-lg-12 col-xl-12 mt-3">

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                        <select name="" id="" class="form-control form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            @foreach($odontograma as $diente)
                                                                <option value="{{ $diente->pieza }}">{{ $diente->pieza }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Sangrado</label>
                                                        <select name="perio_sang" id="perio_sang" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sang','div_perio_sang','obs_perio_sang',3);">
                                                            <option selected="" value="1">Espontáneo</option>
                                                            <option value="2">Al cepillarse</option>
                                                            <option value="3">Otro describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_perio_sang" style="display:none;">
                                                        <label class="floating-label-activo-sm">Otro motivo</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sang" id="obs_perio_sang"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Supuración</label>
                                                        <select name="perio_sup" id="perio_sup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sup','div_perio_sup','obs_perio_sup',3);">
                                                            <option selected="" value="1">Espontánea mal olor</option>
                                                            <option value="2">Espontánea sin mal olor</option>
                                                            <option value="3">Otro describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_perio_sup" style="display:none;">
                                                        <label class="floating-label-activo-sm">Otro motivo</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sup" id="obs_perio_sup"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Higiene</label>
                                                        <select name="period_hig" id="period_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig','div_period_hig','obs_period_hig',3);">
                                                            <option selected="" value="1">Aceptable</option>
                                                            <option value="2">Deficiente </option>
                                                            <option value="3">Otro describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_period_hig" style="display:none;">
                                                        <label class="floating-label-activo-sm">Otro (describir)</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_hig" id="obs_period_hig"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Alt MG</label>
                                                        <input type="number" class="form-control form-control-sm" name="period_alt_mg" id="period_alt_mg" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">P-Sondaje</label>
                                                        <input type="number" class="form-control form-control-sm" name="period_prof_sond" id="period_prof_sond" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Movilidad-pieza</label>
                                                        <select name="period_mov_dent" id="period_mov_dent" class="form-control form-control-sm">
                                                            <option selected="" value="0">Grado 0</option>
                                                            <option value="1">Grado 1</option>
                                                            <option value="2">Grado 2</option>
                                                            <option value="3">Grado 3</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Furcas</label>
                                                        <select name="period_furca" id="period_furca" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_furca','div_period_furca','obs_period_furca',3);">
                                                            <option selected="" value="1">Normales</option>
                                                            <option value="2">N/corresponde</option>
                                                            <option value="3">Otro describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_period_furca" style="display:none;">
                                                        <label class="floating-label-activo-sm">Otro daño</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_furca" id="obs_period_furca"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Tipo sonda</label>
                                                        <select name="period_inst" id="period_inst" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_inst','div_period_inst','obs_period_inst',5);">
                                                            <option selected="" value="1">Sonda MARQUIS(MP12B)</option>
                                                            <option value="2">Sonda UNC 15(MPUNC 15RB)</option>
                                                            <option value="3">Sonda OMS 11.5(MPWHOB)</option>
                                                            <option value="4">Sonda NABERS 15(MPN2B)</option>
                                                            <option value="5">Otro describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_period_inst" style="display:none;">
                                                        <label class="floating-label-activo-sm">Otro Tipo</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_inst" id="obs_period_inst"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_pza" id="obs_period_pza"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="form-group" style="text-align: right;">
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="guardar_pieza_examen_pieza(1000,'period')"><i class="feather icon-save"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="grupo_dental_period" role="tabpanel" aria-labelledby="grupo_dental_period_tab">
                   <div class="form-row">
                    <div class="card-informacion">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Sextante N°</label><!--USAR SELECT 2 ?-->
                                            <select class="js-example-basic-multiple select2-dental select2-hidden-accessible" name="pzas_grupo_peri" id="pzas_grupo_peri" multiple="" data-select2-id="pzas_grupo_peri" tabindex="-1" aria-hidden="true">
                                                <option value="1">SEXTANTE 1</option>
                                                <option value="2">SEXTANTE 2</option>
                                                <option value="3">SEXTANTE 3</option>
                                                <option value="4">SEXTANTE 4</option>
                                                <option value="5">SEXTANTE 5</option>
                                                <option value="6">SEXTANTE 6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Sangrado</label>
                                            <select name="his_sangrado" id="his_sangrado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('his_sangrado','div_his_sangrado','obs_his_sangrado',3);">
                                                <option selected="" value="1">Espontáneo</option>
                                                <option value="2">Al cepillarse</option>
                                                <option value="3">Otro describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_his_sangrado" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_his_sangrado" id="obs_his_sangrado"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Supuración</label>
                                            <select name="histsup" id="histsup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('histsup','div_histsup','obs_histsup',3);">
                                                <option selected="" value="1">Espontánea mal olor</option>
                                                <option value="2">Espontánea sin mal olor</option>
                                                <option value="3">Otro describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_histsup" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_histsup" id="obs_histsup"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Higiene</label>
                                            <select name="his_hig" id="his_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('his_hig','div_his_hig','obs_his_hig',3);">
                                                <option selected="" value="1">Aceptable</option>
                                                <option value="2">Deficiente </option>
                                                <option value="3">Otro describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_his_hig" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_his_hig" id="obs_his_hig"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Can.superficies teñidas </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                            <input type="number" class="form-control form-control-sm" name="cant_sup_tenidas" id="cant_sup_tenidas" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cant. sup presentes </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                            <input type="number" class="form-control form-control-sm" name="cant_sup_presentes" id="cant_sup_presentes" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ind.O'leary </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                            <input type="number" class="form-control form-control-sm" name="ind_oleary" id="ind_oleary" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Plataforma</label>
                                            <select name="plathi" id="plathi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('plathi','div_plathi','obs_plathi',2);">
                                                <option selected="" value="1">Normal</option>
                                                <option value="2">Alterada describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_plathi" style="display:none;">
                                            <label class="floating-label-activo-sm">Describir</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plathi" id="obs_plathi"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Alt MG</label>
                                            <select name="permg" id="permg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('permg','div_permg','obs_permg',2);">
                                                <option selected="" value="1">Normal</option>
                                                <option value="2">Alterada (describa)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_permg" style="display:none;">
                                            <label class="floating-label-activo-sm">Describa</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_permg" id="obs_permg"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">P-Sondaje</label>
                                            <select name="personda" id="personda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('personda','div_personda','obs_personda',2);">
                                                <option selected="" value="1">Aceptable</option>
                                                <option value="2">Alterada(describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_personda" style="display:none;">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_personda" id="obs_personda"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Furcas</label>
                                            <select name="pefurca" id="pefurca" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pefurca','div_pefurca','obs_pefurca',2);">
                                                <option selected="" value="1">Normales</option>
                                                <option value="2">Alteradas (describa)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_pefurca" style="display:none;">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pefurca" id="obs_pefurca"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Instrumento</label>
                                            <select name="per_sondatp" id="per_sondatp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('per_sondatp','div_per_sondatp','obs_per_sondatp',5);">
                                                    <option selected="" value="1">Sonda MARQUIS(MP12B)</option>
                                                <option value="2">Sonda UNC 15(MPUNC 15RB)</option>
                                                <option value="3">Sonda OMS 11.5(MPWHOB)</option>
                                                <option value="4">Sonda NABERS 15(MPN2B)</option>
                                                <option value="5">Otra describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_per_sondatp" style="display:none;">
                                            <label class="floating-label-activo-sm">Otra sonda</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_per_sondatp" id="obs_per_sondatp"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_per" id="obs_per"></textarea>
                                        </div>
                                        <div class="form-group" id="div_anos_perd" style="display:none;">
                                            <label class="floating-label-activo-sm">Años</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group" style="text-align: right;">
                                <button type="button" class="btn btn-sm btn-outline-info" onclick="guardar_pieza_examen_pieza_g(1000,'period')"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>

                        <!-- <div class="col-sm-4 mt-2">
                            <div class="form-group fill">

                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" onchange="biopsia_check_period_g(1)" id="biopsia_check_period_g1" name="biopsia_check_period_g1" value="">
                                    <label for="biopsia_check_period_g1" class="cr"></label>
                                </div>
                                <label>biopsia</label>
                                <hr>
                                <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="peri_g_biop_zona1" id="peri_g_biop_zona1">x</textarea>
                                </div>
                                <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="peri_g_obs_result_biopsia1" id="peri_g_obs_result_biopsia1">x</textarea>
                                </div>
                                <hr>
                                    <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
                                <hr>

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


