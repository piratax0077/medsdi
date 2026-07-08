 <!--EVALUACIÓN EXAMEN LOCOMOTOR-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="locomotor">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open " type="button" type="button" data-toggle="collapse" data-target="#locomotor_c" aria-expanded="false" aria-controls="locomotor_c">
                Evaluación examen sistema locomotor
            </button>
        </div>
        <div id="locomotor_c" class="open" aria-labelledby="locomotor" data-parent="#locomotor">
            <div class="card-body-aten-a">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ex_postural-tab" data-toggle="tab" href="#ex_postural" role="tab" aria-controls="ex_postural" aria-selected="true">Postura</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="columna-tab" data-toggle="tab" href="#columna" role="tab" aria-controls="columna" aria-selected="false">Columna</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="articul-tab" data-toggle="tab" href="#articul" role="tab" aria-controls="articul" aria-selected="false">Articulaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="tend_periart-tab" data-toggle="tab" href="#tend_periart" role="tab" aria-control="tend_periart" aria-selected="false">Tendones Tejido periarticular</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="ev-kine">
                                <!--POSTURA-->
                                <div class="tab-pane fade show active" id="ex_postural" role="tabpanel" aria-labelledby="ex_postural-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="floating-label-activo-sm">Examen postural</label>
                                                <select class="form-control form-control-sm" name="postura" id="postura">
                                                    <option value="0">No realizada</option>
                                                    <option value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">Muy alterado</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="floating-label-activo-sm">Alineación</label>
                                                <select class="form-control form-control-sm" name="alineacion_post" id="alineacion_post">
                                                    <option value="0">No Realizada</option>
                                                    <option value="1">Normal</option>
                                                    <option value="2">Alterada</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Descripción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="post_descripcion" id="post_descripcion"></textarea>
                                            </div>
                                            <!--<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <button type="button" class="btn btn-sm btn-info-light-c btn-block text-left" onclick="postura_m();"><i class="feather icon-plus"></i> Examen Motor Postura</button>
                                            </div>-->
                                        </div>
                                    </form>
                                </div>
                                <!--COLUMNA-->
                                <div class="tab-pane fade show" id="columna" role="tabpanel" aria-labelledby="columna-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active " id="col_total-tab" data-toggle="tab" href="#col_total" role="tab" aria-controls="col_total" aria-selected="false">Total</a>
                                                <a class="nav-link-aten text-reset" id="col_cerv-tab" data-toggle="tab" href="#col_cerv" role="tab" aria-controls="col_cerv" aria-selected="true">Cervical</a>
                                                <a class="nav-link-aten text-reset" id="dor_lumbar-tab" data-toggle="tab" href="#dor_lumbar" role="tab" aria-controls="dor_lumbar" aria-selected="false">Dorso-Lumbar</a>
                                                <a class="nav-link-aten text-reset" id="sacr_coxis-tab" data-toggle="tab" href="#sacr_coxis" role="tab" aria-controls="sacr_coxis" aria-selected="false">Sacro-coxis</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="col_total" role="tabpanel" aria-labelledby="col_total-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="exp_post" >Exploración Posterior</label>
                                                                <select name="exp_post" id="exp_post" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('exp_post','div_detalle_exp_post','obs_post',3)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">No examinada</option>
                                                                    <option value="2">Normal</option>
                                                                    <option value="3">Alterada</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group"  id="div_detalle_exp_post" style="display:none">
                                                                <label class="floating-label-activo-sm" for="obs_post">Obs. Exploración alterada</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post" id="obs_post"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="expl_lateral">Exploración Lateral</label>
                                                                <select name="expl_lateral" id="expl_lateral" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('expl_lateral','div_detalle_expl_lateral','aprec_expl_lateral',2)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Aceptable</option>
                                                                    <option value="2">Deficiente</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_detalle_expl_lateral" style="display:none">
                                                                <label class="floating-label-activo-sm" for="aprec_expl_lateral">Obs. Exploración alterada</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_expl_lateral" id="aprec_expl_lateral"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="obs_exp_columna_total">Obs. Examen Columna Total</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_exp_columna_total" id="obs_exp_columna_total"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="resultado_examenes_ct">Resultado exámenes</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_ct" id="resultado_examenes_ct"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="col_cerv" role="tabpanel" aria-labelledby="col_cerv-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="cerv_insp">Inspección</label>
                                                                <select name="cerv_insp" id="cerv_insp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cerv_insp','div_detalle_cerv_insp','ex_cerv_insp',2);">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_detalle_cerv_insp" style="display:none">
                                                                <label class="floating-label-activo-sm t-red" for="ex_cerv_insp">Inspección (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_cerv_insp" id="ex_cerv_insp"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="cerv_palp">Palpación</label>
                                                                <select name="cerv_palp" id="cerv_palp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cerv_palp','div_detalle_cerv_palp','ex_cerv_palp',2);">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group"  id="div_detalle_cerv_palp" style="display:none">
                                                                <label class="floating-label-activo-sm t-red" for="ex_cerv_palp">Palpación (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_cerv_palp" id="ex_cerv_palp"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="obs_ex_col_cerv">Obs. Columna Cervical</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_col_cerv" id="obs_ex_col_cerv"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="resultado_examenes_cc">Resultado Exámenes</label>
                                                                <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_cc" id="resultado_examenes_cc"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="dor_lumbar" role="tabpanel" aria-labelledby="dor_lumbar-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm"  for="dorso_lum_insp">Inspección</label>
                                                                <select name="dorso_lum_insp" id="dorso_lum_insp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dorso_lum_insp','div_detalle_dorso_lum_insp','ex_dorso_lum_insp',2);">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_detalle_dorso_lum_insp" style="display:none">
                                                                <label class="floating-label-activo-sm t-red"  for="ex_dorso_lum_insp">Inspección (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_dorso_lum_insp" id="ex_dorso_lum_insp"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm"  for="dors_lumb_palp">Palpación</label>
                                                                <select name="dors_lumb_palp" id="dors_lumb_palp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dors_lumb_palp','div_detalle_dors_lumb_palp','ex_dors_lumb_palp',2);">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group"  id="div_detalle_dors_lumb_palp" style="display:none">
                                                                <label class="floating-label-activo-sm t-red"  for="ex_dors_lumb_palp">Palpación (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_dors_lumb_palp" id="ex_dors_lumb_palp"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm"  for="obs_ex_col_dors_lumb">Observaciones Columna dorso-lumbar</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_col_dors_lumb" id="obs_ex_col_dors_lumb"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm"  for="resultado_examenes_dl">Resultado exámenes</label>
                                                                <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_dl" id="resultado_examenes_dl"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="sacr_coxis" role="tabpanel" aria-labelledby="sacr_coxis-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="sacro_dol">Zonas dolorosas</label>
                                                                <select name="sacro_dol" id="sacro_dol"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sacro_dol','div_detalle_sacro_dol','detalle_sacro_dol',3)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">No</option>
                                                                    <option value="2">Si</option>
                                                                    <option value="3">Observaciones (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_detalle_sacro_dol" style="display:none">
                                                                <label class="floating-label-activo-sm" for="detalle_sacro_dol">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_sacro_dol" id="detalle_sacro_dol"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="sacro_palp">Palpación</label>
                                                                <select name="sacro_palp" id="sacro_palp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sacro_palp','div_detalle_sacro_palp','detalle_sacro_palp',3)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">No</option>
                                                                    <option value="2">Si</option>
                                                                    <option value="3">Observaciones (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group"  id="div_detalle_sacro_palp" style="display:none">
                                                                <label class="floating-label-activo-sm" for="obs_sacro_palp">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sacro_palp" id="obs_sacro_palp"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm"  for="obs_ex_sacrocoxis">Obs. Examen Sacrocoxis</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_sacrocoxis" id="obs_ex_sacrocoxis"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="resultado_examenes_sc">Resultado exámenes</label>
                                                                <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_sc" id="resultado_examenes_sc"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ARTICULACIONES-->
                                <div class="tab-pane fade show" id="articul" role="tabpanel" aria-labelledby="articul-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                            <h6 class="t-aten d-inline my-2">EXAMEN ARTICULAR</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                            <div class="form-group">
                                                <button type="button" id="btn_nueva_articulacion" class="btn btn-info btn-xxs btn-agregar-grupo-articulacion float-right" onclick="nueva_articulacion()"><i class="feather icon-plus"></i> Añadir Articulación</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contenedor_grupo_articulacion" class="d-none">
                                        <div id="grupo_articulacion">
                                            <form>
                                                <div class="form-row mt-3">

                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="art_nomb" >Articulación</label>
                                                            <input type="text" class="form-control form-control-sm" name="art_nomb" id="art_nomb">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="art_dolor" >Dolor</label>
                                                            <select name="art_dolor" id="art_dolor" class="form-control form-control-sm">
                                                                <option selected  value="1">No</option>
                                                                <option value="2">Si</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="func_art" >Funcionalidad</label>
                                                            <select name="func_art" id="func_art" class="form-control form-control-sm">
                                                                <option selected  value="1">Normal</option>
                                                                <option value="2">Alterada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="def_art" >Deformaciones</label>
                                                            <select name="def_art" id="def_art" class="form-control form-control-sm">
                                                                <option selected  value="1">No</option>
                                                                <option value="2">Si</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="obs_artic">Observaciones</label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_artic" id="obs_artic" placeholder="COMENTARIOS DE ARTICULACIÓN O GRUPO EXAMINADO"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group text-center">
                                                            <button type="button" class="btn btn-info btn-sm mr-2" onclick="guardar_articulacion()"><i class="feather icon-save"></i> Guardar examen articular</button>
                                                            <button type="button" class="btn btn-secondary btn-sm" onclick="ocultar_articulacion()"><i class="feather icon-x"></i> Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Lista de articulaciones agregadas -->
                                    <div id="lista_articulaciones_agregadas" style="display: none;">
                                        <div id="contenedor_articul_lista"></div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="obs_gen_artic" >Observaciones generales</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gen_artic" id="obs_gen_artic"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--TENDONES PERIART-->
                                <div class="tab-pane fade show" id="tend_periart" role="tabpanel" aria-labelledby="tend_periart-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                            <h6 class="t-aten d-inline my-2">EXAMEN TENDONES Y TEJIDOS ARTICULARES</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                            <div class="form-group">
                                                <button type="button" id="btn_nuevo_grupo" class="btn btn-info btn-xxs btn-agregar-grupo-tendones float-right" onclick="nuevo_grupo()"><i class="feather icon-plus"></i> Añadir Otro Grupo</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contenedor_grupo_tendones" class="d-none">
                                        <div id="grupo_tendones">
                                            <form>
                                                <div class="form-row mt-3">
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="tend_nomb">Tendón</label>
                                                            <input type="text" class="form-control form-control-sm" name="tend_nomb" id="tend_nomb">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="tend_dolor">Dolor</label>
                                                            <select name="tend_dolor" id="tend_dolor" class="form-control form-control-sm">
                                                                <option selected  value="1">No</option>
                                                                <option value="2">Si</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="func_tend">Funcionalidad</label>
                                                            <select name="func_tend" id="func_tend" class="form-control form-control-sm">
                                                                <option selected  value="1">Normal</option>
                                                                <option value="2">Alterada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="def_tend">Deformaciones</label>
                                                            <select name="def_tend" id="def_tend" class="form-control form-control-sm">
                                                                <option selected  value="1">No</option>
                                                                <option value="2">Si</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"for="obs_tend" >Observaciones</label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tend" id="obs_tend"placeholder="COMENTARIOS DE TENDÓN O GRUPO EXAMINADO"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group text-center">
                                                            <button type="button" class="btn btn-info btn-sm mr-2" onclick="guardar_grupo()"><i class="feather icon-save"></i> Guardar Examen</button>
                                                            <button type="button" class="btn btn-secondary btn-sm" onclick="ocultar_grupo()"><i class="feather icon-x"></i> Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Lista de grupos agregados -->
                                    <div id="lista_grupos_agregados" style="display: none;">
                                        <div id="contenedor_grupos_lista"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="obs_gen_tendon">Observaciones generales</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gen_tendon" id="obs_gen_tendon"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Contador para IDs únicos de articulaciones
    var contadorArticulaciones = 0;
    // Contador para IDs únicos de grupos de tendones
    var contadorGrupos = 0;

    function nueva_articulacion(){
        var $contenedor = $('#contenedor_grupo_articulacion');
        var $btnNuevaArticulacion = $('#btn_nueva_articulacion');

        // Solo mostrar si está oculto
        if ($contenedor.hasClass('d-none')) {
            // Limpiar formulario antes de mostrar
            limpiar_formulario_articulacion();
            // Mostrar contenedor
            $contenedor.removeClass('d-none');
            // Ocultar botón "Añadir Articulación"
            $btnNuevaArticulacion.hide();
        }
    }

    function ocultar_articulacion(){
        var $contenedor = $('#contenedor_grupo_articulacion');
        var $btnNuevaArticulacion = $('#btn_nueva_articulacion');

        // Ocultar contenedor
        $contenedor.addClass('d-none');
        // Mostrar botón "Añadir Articulación"
        $btnNuevaArticulacion.show();
        // Limpiar formulario
        limpiar_formulario_articulacion();
    }

    function limpiar_formulario_articulacion(){
        // Limpiar todos los campos del formulario usando jQuery
        $('#art_nomb').val('');
        $('#art_dolor').val('1');
        $('#func_art').val('1');
        $('#def_art').val('1');
        $('#obs_artic').val('');
    }

    function guardar_articulacion(){
        // Obtener valores del formulario usando jQuery
        var articulacion = $('#art_nomb').val().trim();
        var $dolor = $('#art_dolor');
        var $funcionalidad = $('#func_art');
        var $deformaciones = $('#def_art');
        var observaciones = $('#obs_artic').val().trim();

        // Validar campo obligatorio
        if (articulacion === '') {
            swal("Error", "El campo 'Articulación' es obligatorio.", "error");
            $('#art_nomb').focus();
            return false;
        }

        // Incrementar contador para ID único
        contadorArticulaciones++;
        var idArticulacion = 'articulacion_' + contadorArticulaciones;

        // Agregar articulación a la lista
        agregarArticulacionALista(idArticulacion, {
            articulacion: articulacion,
            dolor: {
                valor: $dolor.val(),
                texto: $dolor.find('option:selected').text()
            },
            funcionalidad: {
                valor: $funcionalidad.val(),
                texto: $funcionalidad.find('option:selected').text()
            },
            deformaciones: {
                valor: $deformaciones.val(),
                texto: $deformaciones.find('option:selected').text()
            },
            observaciones: observaciones
        });

        // Mostrar mensaje de confirmación
        swal("Articulación Agregada", "La articulación '" + articulacion + "' ha sido agregada correctamente.", "success");

        // Ocultar formulario después de guardar
        ocultar_articulacion();

        return true;
    }

    function agregarArticulacionALista(id, datos) {
        var $lista = $('#contenedor_articul_lista');
        var $contenedorLista = $('#lista_articulaciones_agregadas');

        // Crear HTML para mostrar la articulación
        var htmlArticulacion = `
            <div class="card-lineal mb-2" id="card_${id}">
                <div class="card-header-lineal">
                    <h5>Articulaciones Registradas</h5>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="mb-1"><strong>${datos.articulacion}</strong></h6>
                            <small class="text-muted">
                                Dolor: ${datos.dolor.texto} |
                                Funcionalidad: ${datos.funcionalidad.texto} |
                                Deformaciones: ${datos.deformaciones.texto}
                            </small>
                            ${datos.observaciones ? '<br><small><i>Obs: ' + datos.observaciones + '</i></small>' : ''}
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-danger btn-xxs" onclick="eliminarArticulacion('${id}')">
                                <i class="feather icon-trash-2"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Agregar a la lista
        $lista.append(htmlArticulacion);

        // Crear campos hidden para enviar con el formulario principal
        crearCamposHiddenArticulacion(id, datos);

        // Mostrar la lista si no está visible
        $contenedorLista.show();
    }

    function crearCamposHiddenArticulacion(id, datos) {
        var $form = $('#locomotor_c form').first();

        // Crear campos hidden con los datos de la articulación
        var camposHidden = `
            <input type="hidden" name="articulaciones[${id}][nombre]" value="${datos.articulacion}">
            <input type="hidden" name="articulaciones[${id}][dolor]" value="${datos.dolor.valor}">
            <input type="hidden" name="articulaciones[${id}][funcionalidad]" value="${datos.funcionalidad.valor}">
            <input type="hidden" name="articulaciones[${id}][deformaciones]" value="${datos.deformaciones.valor}">
            <input type="hidden" name="articulaciones[${id}][observaciones]" value="${datos.observaciones}">
        `;

        // Crear contenedor para los campos si no existe
        if ($('#campos_articulaciones').length === 0) {
            $form.append('<div id="campos_articulaciones" style="display: none;"></div>');
        }

        $('#campos_articulaciones').append(`<div id="campos_${id}">${camposHidden}</div>`);
    }

    function eliminarArticulacion(id) {
        swal({
            title: "¿Está seguro?",
            text: "Esta acción eliminará la articulación de la lista.",
            icon: "warning",
            buttons: ["Cancelar", "Sí, eliminar"],
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                // Eliminar de la vista
                $('#card_' + id).remove();

                // Eliminar campos hidden
                $('#campos_' + id).remove();

                // Ocultar lista si no hay más articulaciones
                if ($('#contenedor_articul_lista .card').length === 0) {
                    $('#lista_articulaciones_agregadas').hide();
                }

                swal("Eliminado", "La articulación ha sido eliminada.", "success");
            }
        });
    }

    // ========== FUNCIONES PARA GRUPOS DE TENDONES ==========
    function nuevo_grupo(){
        var $contenedor = $('#contenedor_grupo_tendones');
        var $btnNuevoGrupo = $('#btn_nuevo_grupo');

        // Solo mostrar si está oculto
        if ($contenedor.hasClass('d-none')) {
            // Limpiar formulario antes de mostrar
            limpiar_formulario_grupo();
            // Mostrar contenedor
            $contenedor.removeClass('d-none');
            // Ocultar botón "Añadir Otro Grupo"
            $btnNuevoGrupo.hide();
        }
    }

    function ocultar_grupo(){
        var $contenedor = $('#contenedor_grupo_tendones');
        var $btnNuevoGrupo = $('#btn_nuevo_grupo');

        // Ocultar contenedor
        $contenedor.addClass('d-none');
        // Mostrar botón "Añadir Otro Grupo"
        $btnNuevoGrupo.show();
        // Limpiar formulario
        limpiar_formulario_grupo();
    }

    function limpiar_formulario_grupo(){
        // Limpiar todos los campos del formulario usando jQuery
        $('#tend_nomb').val('');
        $('#tend_dolor').val('1');
        $('#func_tend').val('1');
        $('#def_tend').val('1');
        $('#obs_tend').val('');
    }

    function guardar_grupo(){
        // Obtener valores del formulario usando jQuery
        var tendon = $('#tend_nomb').val().trim();
        var $dolor = $('#tend_dolor');
        var $funcionalidad = $('#func_tend');
        var $deformaciones = $('#def_tend');
        var observaciones = $('#obs_tend').val().trim();

        // Validar campo obligatorio
        if (tendon === '') {
            swal("Error", "El campo 'Tendón' es obligatorio.", "error");
            $('#tend_nomb').focus();
            return false;
        }

        // Incrementar contador para ID único
        contadorGrupos++;
        var idGrupo = 'grupo_' + contadorGrupos;

        // Agregar grupo a la lista
        agregarGrupoALista(idGrupo, {
            tendon: tendon,
            dolor: {
                valor: $dolor.val(),
                texto: $dolor.find('option:selected').text()
            },
            funcionalidad: {
                valor: $funcionalidad.val(),
                texto: $funcionalidad.find('option:selected').text()
            },
            deformaciones: {
                valor: $deformaciones.val(),
                texto: $deformaciones.find('option:selected').text()
            },
            observaciones: observaciones
        });

        // Mostrar mensaje de confirmación
        swal("Grupo Agregado", "El grupo de tendón '" + tendon + "' ha sido agregado correctamente.", "success");

        // Ocultar formulario después de guardar
        ocultar_grupo();

        return true;
    }

    function agregarGrupoALista(id, datos) {
        var $lista = $('#contenedor_grupos_lista');
        var $contenedorLista = $('#lista_grupos_agregados');

        // Crear HTML para mostrar el grupo
        var htmlGrupo = `
            <div class="card-lineal mb-3" id="card_${id}">
            <div class="card-header-lineal">
            <h5>Grupos de tendones registrados</h5>
            </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="mb-1"><strong>${datos.tendon}</strong></h6>
                            <small class="text-muted">
                                Dolor: ${datos.dolor.texto} |
                                Funcionalidad: ${datos.funcionalidad.texto} |
                                Deformaciones: ${datos.deformaciones.texto}
                            </small>
                            ${datos.observaciones ? '<br><small><i>Obs: ' + datos.observaciones + '</i></small>' : ''}
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-danger btn-xxs" onclick="eliminarGrupo('${id}')">
                                <i class="feather icon-trash-2"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Agregar a la lista
        $lista.append(htmlGrupo);

        // Crear campos hidden para enviar con el formulario principal
        crearCamposHiddenGrupo(id, datos);

        // Mostrar la lista si no está visible
        $contenedorLista.show();
    }

    function crearCamposHiddenGrupo(id, datos) {
        var $form = $('#locomotor_c form').first();

        // Crear campos hidden con los datos del grupo
        var camposHidden = `
            <input type="hidden" name="grupos_tendones[${id}][nombre]" value="${datos.tendon}">
            <input type="hidden" name="grupos_tendones[${id}][dolor]" value="${datos.dolor.valor}">
            <input type="hidden" name="grupos_tendones[${id}][funcionalidad]" value="${datos.funcionalidad.valor}">
            <input type="hidden" name="grupos_tendones[${id}][deformaciones]" value="${datos.deformaciones.valor}">
            <input type="hidden" name="grupos_tendones[${id}][observaciones]" value="${datos.observaciones}">
        `;

        // Crear contenedor para los campos si no existe
        if ($('#campos_grupos').length === 0) {
            $form.append('<div id="campos_grupos" style="display: none;"></div>');
        }

        $('#campos_grupos').append(`<div id="campos_${id}">${camposHidden}</div>`);
    }

    function eliminarGrupo(id) {
    swal({
        title: "¿Está seguro?",
        text: "Esta acción eliminará el grupo de tendones de la lista.",
        icon: "warning",
        buttons: ["Cancelar", "Sí, eliminar"],
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            // Eliminar de la vista
            $('#card_' + id).remove();

            // Eliminar campos hidden
            $('#campos_' + id).remove();

            // Ocultar lista si no hay más grupos
            if ($('#contenedor_grupos_lista .card').length === 0) {
                $('#lista_grupos_agregados').hide();
            }

            swal("Eliminado", "El grupo de tendones ha sido eliminado.", "success");
        }

    });
}


</script>
