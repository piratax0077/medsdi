<!--COMUNICACIÓN-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="eval_comunicacion">
            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#eval_comunicacion_c" aria-expanded="false" aria-controls="eval_comunicacion_c">
                Evaluación Psiconeurológica
            </button>
        </div>
        <div id="eval_comunicacion_c" class="collapse" aria-labelledby="eval_comunicacion" data-parent="#eval_comunicacion">
            <div class="card-body-aten-a shadow-none">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="eval_co_con" for="num_sesiones">Evalución Conciencia</label>
                                <select name="eval_co_con" id="eval_co_con" data-titulo="Evalución Conciencia" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_co_con','div_eval_co_con','eval_co_con_obs',4);">
                                    <option value="0">Seleccione</option>
                                    <option selected value="1">Lúcido</option>
                                    <option value="2">Obnubilado</option>
                                    <option value="3">Desorientado</option>
                                    <option value="4"> Observaciones (describir)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_eval_co_con" style="display:none">
                                <label class="floating-label-activo-sm" for="eval_co_con_obs" for="num_sesiones">Detalle Conciencia</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Conciencia" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_co_conobs" id="eval_co_con_obs"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="eval_co_or" for="num_sesiones">Orientación</label>
                                <select name="eval_co_or" id="eval_co_or" data-titulo="Orientación" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_co_or','div_eval_co_or','eval_co_or_obs',4);">
                                    <option value="0">Seleccione</option>
                                    <option selected value="1">Orientado en Tpo y Espacio</option>
                                    <option value="2">Perdido</option>
                                    <option value="3">Dudosa</option>
                                    <option value="4"> Observaciones (describir)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_eval_co_or" style="display:none">
                                <label class="floating-label-activo-sm" for="eval_co_or_obs">Detalle Orientación</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Orientación" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_co_or_obs" id="eval_co_or_obs"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="eval_com_com">Comportamiento</label>
                                <select name="eval_com_com" id="eval_com_com" data-titulo="Comportamiento" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_com_com','div_eval_com_com','eval_com_com_obs',3);">
                                    <option value="0">Seleccione</option>
                                    <option selected value="1">Coherente</option>
                                    <option value="2">Incoherente</option>
                                    <option value="3"> Observaciones (describir)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_eval_com_com" style="display:none">
                                <label class="floating-label-activo-sm" for="eval_com_com_obs">Detalle Comportamiento</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Comportamiento" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_com_com_obs" id="eval_com_com_obs"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="eval_com_cola">Colaboración</label>
                                <select name="eval_com_cola" id="eval_com_cola" data-titulo="Colaboración" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_com_cola','div_eval_com_cola','eval_com_cola_obs',3);">
                                    <option value="0">Seleccione</option>
                                    <option selected value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3"> Observaciones (describir)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_eval_com_cola" style="display:none">
                                <label class="floating-label-activo-sm" for="eval_com_cola_obs">Colaboración</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Colaboración" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_com_cola_obs" id="eval_com_cola_obs"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label" for="eval_com_coment">Comentario de la Evaluación</label>
                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="eval_com_coment" id="eval_com_coment"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
