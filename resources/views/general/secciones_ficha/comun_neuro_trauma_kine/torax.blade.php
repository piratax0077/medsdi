   <!-- EVALUACIÓN TÓRAX Y RESPIRACIÓN-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_resp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open "  type="button" data-toggle="collapse" data-target="#eval_resp_c" aria-expanded="false" aria-controls="eval_resp_c">
                                            Evaluación tórax y respiración
                                        </button>
                                    </div>
                                    @php 
                                        $clase = '';
                                        if($profesional->id_sub_tipo_especialidad != 40){
                                            $clase = "show";
                                        }
                                    @endphp
                                    <div id="eval_resp_c" class="open {{ $clase }}" aria-labelledby="eval_resp" data-parent="#eval_resp">
                                        <div class="card-body-aten-a">
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-torax-resp" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="inspeccion-tab" data-toggle="tab" href="#inspeccion" role="tab" aria-controls="inspeccion" aria-selected="true">Inspección</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="palpacion-tab" data-toggle="tab" href="#palpacion" role="tab" aria-controls="palpacion" aria-selected="false">Palpación</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="percusion-tab" data-toggle="tab" href="#percusion" role="tab" aria-controls="percusion" aria-selected="false">Percusión</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="auscultacion-tab" data-toggle="tab" href="#auscultacion" role="tab" aria-control="auscultacion" aria-selected="false">Auscultación</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-control="evaluacion" aria-selected="false">Resumen evaluación</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="ev-torax-resp">
                                                            <!--INSPECCIÓN-->
                                                            <div class="tab-pane fade show active" id="inspeccion" role="tabpanel" aria-labelledby="inspeccion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">INSPECCIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-3">
                                                                            <label class="floating-label-activo-sm" for="resp_tipo">Tipo de respiración</label>
                                                                            <div class="form-group fill">
                                                                                <select class="form-control form-control-sm" name="resp_tipo" id="resp_tipo">
                                                                                    <option value="1">No Examinada</option>
                                                                                    <option value="2">• Normal</option>
                                                                                    <option value="3">Costal Superior</option>
                                                                                    <option value="4">Costo-Diafragmática</option>
                                                                                    <option value="5">Abdominal</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label id="" name="" class="floating-label-activo-sm" for="ftorax">Forma Toráxica</label>
                                                                            <select class="form-control form-control-sm" name="ftorax" id="ftorax">
                                                                                <option value="AL">Seleccione</option>
                                                                                <optgroup label="TORAX NORMAL">
                                                                                    <option value="1">Normal</option>
                                                                                </optgroup>
                                                                                <optgroup label="DEFORMACION CONGÉNITA">
                                                                                    <option value="2">Tórax Acanalado</option>
                                                                                    <option value="3">Pectus excavatum</option>
                                                                                    <option value="4">Tórax Piramidal</option>
                                                                                    <option value="5">Tórax Piriforme</option>
                                                                                </optgroup>
                                                                                <optgroup label="DEFORMACIÓN ADQUIRIDA">
                                                                                    <option value="6">Tórax Raquítico</option>
                                                                                    <option value="7">Tórax Enfisematoso</option>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label id="" name="" class="floating-label-activo-sm" for="storax">Simetría toráxica </label>
                                                                            <select class="form-control form-control-sm" name="storax" id="storax">
                                                                                <option value="1">Seleccione</option>
                                                                                <option value="2">Simétrico</option>
                                                                                <option value="3">Asimétrico</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-3 ">
                                                                            <label class="floating-label-activo-sm" for="resp_desc">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_desc" id="resp_desc"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label-activo-sm" for="resp_piel">Estado de la piel</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_piel" id="resp_piel"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label-activo-sm" for="resp_cian">Cianosis</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_cian" id="resp_cian"></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm" for="resp_mov">Movilidad respiratoria</label>
                                                                            <select class="form-control form-control-sm" name="resp_mov" id="resp_mov">
                                                                                <option value="1">No realizada</option>
                                                                                <option value="2">Alterada</option>
                                                                                <option value="3">Muy alterada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm" for="resp_tiraje">Tiraje</label>
                                                                            <select class="form-control form-control-sm" name="resp_tiraje" id="resp_tiraje">
                                                                                <option value="1">No realizada</option>
                                                                                <option value="2">Alterada</option>
                                                                                <option value="3">Muy alterada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm" for="resp_descrip">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_descrip" id="resp_descrip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PALPACIÓN-->
                                                            <div class="tab-pane fade show" id="palpacion" role="tabpanel" aria-labelledby="palpacion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">PALPACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="palp_pd">Puntos Dolorosos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_pd" id="palp_pd"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="palp_vv">Vibración Vocal</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_vv" id="palp_vv"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="palp_exp">Expansibilidad</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_exp" id="palp_exp"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="palp_elast">Elasticidad</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_elast" id="palp_elast"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="palp_frem">Frémitos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_frem" id="palp_frem"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="palp_desc">Descripción Examen</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="palp_desc" id="palp_desc"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PERCUSIÓN-->
                                                            <div class="tab-pane fade show" id="percusion" role="tabpanel" aria-labelledby="percusion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">PERCUSIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="perc_descrip">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="perc_descrip" id="perc_descrip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--AUSCULTACIÓN-->
                                                            <div class="tab-pane fade show" id="auscultacion" role="tabpanel" aria-labelledby="auscultacion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">AUSCULTACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                                                                            <h6 class="t-aten">Pre Kine</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_normal_pre">Ruidos respiratorios normales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_normal_pr" id="r_normal_pre"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_adv_pre">Ruidos adventicios</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_adv_pre" id="r_adv_pre"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                                                                            <h6 class="t-aten">Post Kine</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_normal_post">Ruidos respiratorios normales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_normal_post" id="r_normal_post"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_adv_post">Ruidos adventicios</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_adv_post" id="r_adv_post"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--EVALUACIÓN-->
                                                            <div class="tab-pane fade show" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">EVALUACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="resp_comen">Evaluación</label>
                                                                            <textarea type="text" class="form-control form-control-sm" placeholder="Comentarios"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="resp_comen" id="resp_comen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="ex_resp_descrip">Conclusión Ex. Tórax</label>
                                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ex_resp_descrip" id="ex_resp_descrip" placeholder="Descripción"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm"for="resp_desc_obj">Objs. y tto.</label>
                                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="resp_desc_obj" id="resp_desc_obj" placeholder="Descripción"></textarea>
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
