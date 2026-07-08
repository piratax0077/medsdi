  <!--EVALUACIÓN EXAMEN NEUROLÓGICO-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="eval_neurol">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open" type="button" data-toggle="collapse" data-target="#eval_neurol_c" aria-expanded="false" aria-controls="eval_neurol_c">
                Evaluación examen neurológico
            </button>
        </div>
        <div id="eval_neurol_c" class="open" aria-labelledby="eval_neurol" data-parent="#eval_neurol">
            <div class="card-body-aten-a">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-kine_neuro" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="lenguaje-tab" data-toggle="tab" href="#lenguaje" role="tab" aria-controls="lenguaje" aria-selected="true">Audición-Lenguaje</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="memoria-tab" data-toggle="tab" href="#memoria" role="tab" aria-controls="memoria" aria-selected="false">Memoria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="praxias-tab" data-toggle="tab" href="#praxias" role="tab" aria-controls="praxias" aria-selected="false">Praxias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="fun-cog-tab" data-toggle="tab" href="#fun-cog" role="tab" aria-control="fun-cog" aria-selected="false">Funciones cognitivas superiores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="cap-visual-tab" data-toggle="tab" href="#cap-visual" role="tab" aria-control="cap-visual" aria-selected="false">Apreciación capacidad visual</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="viso-esp-tab" data-toggle="tab" href="#viso-esp" role="tab" aria-control="viso-esp" aria-selected="false">Percepción viso-espacial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="f_eval-tab" data-toggle="tab" href="#f_eval" role="tab" aria-control="f_eval" aria-selected="false">Formularios de Evaluación</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="ev-kine_neuro">
                                <!--LENGUAJE-->
                                <div class="tab-pane fade show active" id="lenguaje" role="tabpanel" aria-labelledby="lenguaje-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">AUDICIÓN LENGUAJE</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="lenguaje">Lenguaje</label>
                                                <select class="form-control form-control-sm" name="lenguaje" id="lenguaje">
                                                    <option value="1">No realizada</option>
                                                    <option value="2">Normal</option>
                                                    <option value="3">Alterado</option>
                                                    <option value="4">Muy alterado</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="t_alt_leng">Tipo Alteración lenguaje</label>
                                                <select class="form-control form-control-sm" name="t_alt_leng" id="t_alt_leng">
                                                    <option value="AL">No Realizada</option>
                                                    <option value="1">Alt de la denominación</option>
                                                    <option value="2">Alt de la Comprensión</option>
                                                    <option value="3">Alt de la Lecto-escritura</option>
                                                    <option value="4">Repeticiónes</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="leng_alt_mod">Alteración modo</label>
                                                <select class="form-control form-control-sm" name="leng_alt_mod" id="leng_alt_mod">
                                                    <option value="1">No Realizada</option>
                                                    <option value="2">Disartria</option>
                                                    <option value="3">Disfonía</option>
                                                    <option value="4">Afasia</option>
                                                    <option value="5">Disfasia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="audio">Audición</label>
                                                <select class="form-control form-control-sm" name="audio" id="audio">
                                                    <option value="AL">Normal</option>
                                                    <option value="1">Hipoacusia leve</option>
                                                    <option value="2">Hipoacusia Severa/option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="audifono">Usa Protesis(audífono)</label>
                                                <select class="form-control form-control-sm" name="audifono" id="audifono">
                                                    <option value="1">No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label" for="ap_capac">Apreciación Cap. auditiva y Comp. de lenguaje</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="ap_capac" id="ap_capac"></textarea>
                                            </div>

                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm"for="obs_leng" >Observaciones Examen</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_leng" id="obs_leng"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--MEMORIA-->
                                <div class="tab-pane fade show" id="memoria" role="tabpanel" aria-labelledby="memoria-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">MEMORIA</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="obs_leng" >Memoria</label>
                                                    <select class="form-control form-control-sm" name="mem_exam" id="mem_exam">
                                                        <option value="1">No Realizada</option>
                                                        <option value="2">Normal</option>
                                                        <option value="3">Alt. Memoria Inmediata</option>
                                                        <option value="4">Alt. Memoria Corto Plazo</option>
                                                        <option value="5">Alt. Memoria Largo Plazo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label class="floating-label-activo-sm" for="descrip_mem" >Descripción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="descrip_mem" id="descrip_mem"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--PRAXIAS-->
                                <div class="tab-pane fade show" id="praxias" role="tabpanel" aria-labelledby="praxias-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">PRAXIAS</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm" for="praxias" >Descripción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="praxias" id="praxias"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--FUNCIONES COGNITIVAS SUPERIORES-->
                                <div class="tab-pane fade show" id="fun-cog" role="tabpanel" aria-labelledby="fun-cog-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">FUNCIONES COGNITIVAS SUPERIORES</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm" for="fcs_descripcion" >Descripción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="fcs_descripcion" id="fcs_descripcion"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--APRECIACIÓN CAPACIDAD VISUAL-->
                                <div class="tab-pane fade show" id="cap-visual" role="tabpanel" aria-labelledby="cap-visual-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">APRECIACIÓN CAPACIDAD VISUAL</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="capvis_tipo">Tipo</label>
                                                <select class="form-control form-control-sm" name="capvis_tipo" id="capvis_tipo">
                                                    <option value="1">No Examinada</option>
                                                    <option value="2">Normal</option>
                                                    <option value="3">Presbicie</option>
                                                    <option value="4">Miopía</option>
                                                    <option value="5">Dudosa</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                <label class="floating-label-activo-sm" for="capvis_descrip" >Observaciones Capacidad visual</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="capvis_descrip" id="capvis_descrip"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--PERCEPCIÓN VISO-ESPACIAL-->
                                <div class="tab-pane fade show" id="viso-esp" role="tabpanel" aria-labelledby="viso-esp-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">PERCEPCIÓN VISO-ESPACIAL</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="percve_ex">Tipo</label>
                                                <select class="form-control form-control-sm" name="percve_ex" id="percve_ex">
                                                    <option value="NE">No examinada</option>
                                                    <option value="N">Normal</option>
                                                    <option value="DE">Deficiente</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                <label class="floating-label-activo-sm" for="percve_descrip">Descripción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="percve_descrip" id="percve_descrip"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--PERCEPCIÓN VISO-ESPACIAL-->
                                <div class="tab-pane fade show" id="f_eval" role="tabpanel" aria-labelledby="f_eval-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">FORMULARIOS DE EVALUACIÓN</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Examen Fuerza extremidad Inferior</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i>Examen Fuerza extremidad Superior</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="postura_m();"><i class="feather icon-plus"></i> Examen motor Postura y Marcha</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="tono();"><i class="feather icon-plus"></i> Examen Nervios Motores</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Examen Sensitivo</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="func_global();"><i class="feather icon-plus"></i> Funcionalidad Global</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="metria();"><i class="feather icon-plus"></i> Metría</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="pares();"><i class="feather icon-plus"></i> Pares Craneanos</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Reflejos Osteotendineos</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-10 p-10">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10col-xl-10 mt-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip" > Obs. Modal Fuerza extremidad Inferior</label>
                                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip" > Obs. Modal  Fuerza extremidad Superior</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip" >Obs. Modal  Examen motor Postura y Marcha</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="postura_m();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip" >Obs. Modal  Examen Nervios Motores</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="tono();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Examen Sensitivo</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Funcionalidad Global</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="func_global();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Metría</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="metria();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Pares Craneanos</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="pares();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Reflejos Osteotendineos</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Ver Modal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
