<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="kine-contenido" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab" href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Ficha de atención</a>
                    </li>
                     <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eval_segmentaria-tab" data-toggle="tab" href="#eval_segmentaria" role="tab" aria-controls="eval_segmentaria" aria-selected="true">Ficha de Evaluación segmentaria</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="controles-tab" data-toggle="tab" href="#controles" role="tab" aria-controls="controles" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="historial-atencion-tab" data-toggle="tab" href="#historial-atencion" role="tab" aria-controls="historial-atencion" aria-selected="false">Historico de controles</a>
                    </li>
                </ul>
            </div>
           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row mb-1">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-success-b alert-dismissible fade show"  role="alert" id="mensaje_historias"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="kine-contenido">
                    <!--FICHA ATENCIÓN -->
                    <div class="tab-pane fade show active" id="atencion" role="tabpanel" aria-labelledby="atencion-tab">
                        <div class="row">
                            <!--Formulario / Menor de edad-->
                            @include('general.secciones_ficha.seccion_menor')
                            <!--Cierre: Formulario / Menor de edad-->
                            <!--INFORMACIÓN-->
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.motivo_cons')

                            <!--ANTECEDENTES FAMILIARES-->
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.antecedentes')
                            <!--EVALUACIÓN COMUNICACIÓN-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_comunicacion">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#eval_comunicacion_c" aria-expanded="false" aria-controls="eval_comunicacion_c">
                                            Evaluación comunicación
                                        </button>
                                    </div>
                                    <div id="eval_comunicacion_c" class="collapse" aria-labelledby="eval_comunicacion" data-parent="#eval_comunicacion">
                                        <div class="card-body-aten-a">
                                           @include('atencion_otros_prof.secciones_especialidad.includes.generales.comunicacion')
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                             <!--EVALUACIÓN EXAMEN LOCOMOTOR-->
                             {{--  @include('general.secciones_ficha.comun_neuro_trauma_kine.trauma_locomotor')  --}}
                            <!--EVALUACIÓN EXAMEN NEUROLÓGICO-->
                             {{--  @include('general.secciones_ficha.comun_neuro_trauma_kine.neuro')  --}}
                           
                            <!--    evaluacion torax y respiratoria->
                             {{--  @include('general.secciones_ficha.comun_neuro_trauma_kine.torax')  --}}
                            <!--DIAGNÓSTICO Y PLAN DE TRATAMIENTO-->
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.dg_plan')

                            <!--Interconsulta / examen /informe-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a pt-3 pb-3">
                                    <div class="row px-2">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="interkine();"><i class="feather icon-plus"></i> Indicar interconsulta</button>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="informekine();"><i class="feather icon-plus"></i> Enviar informe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--GUARDAR-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-info mt-1"><i class="feather icon-save"></i> Guardar ficha y finalizar consulta</button>
                                <button type="button" class="btn btn-purple mt-1"><i class="feather icon-calendar"></i> Guardar ficha e ir a la agenda</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="eval_segmentaria" role="tabpanel" aria-labelledby="eval_segmentaria-tab">
                        <div class="col-md-12 py-0 px-2 shadow-none">
                            <div class="row mx-0">
                                <div class="col-sm-12 col-md-12">
                                    <ul class="nav nav-tabs-secciones mb-3 mt-3" id="kine-contenido" role="tablist">
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones active text-uppercase" id="locomotor-tab" data-toggle="tab" href="#locomotor" role="tab" aria-controls="locomotor" aria-selected="true">Examen locomotor</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones  text-uppercase" id="eval_neurolog-tab" data-toggle="tab" href="#eval_neurolog" role="tab" aria-controls="eval_neurolog" aria-selected="true">Examen neurológico</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="torax-tab" data-toggle="tab" href="#torax" role="tab" aria-controls="torax" aria-selected="false">Examen Tórax y respiración</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="otra-tab" data-toggle="tab" href="#otra" role="tab" aria-controls="otra" aria-selected="false">Tercera edad</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="kine-contenido">
                                        <!--FICHA ATENCIÓN -->
                                        <div class="tab-pane fade show active" id="locomotor" role="tabpanel" aria-labelledby="locomotor-tab">
                                            <div class="row">
                                              <!--EVALUACIÓN EXAMEN LOCOMOTOR-->
                                                @include('general.secciones_ficha.comun_neuro_trauma_kine.trauma_locomotor')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show " id="eval_neurolog" role="tabpanel" aria-labelledby="eval_neurolog-tab">
                                            <!--EVALUACIÓN EXAMEN NEUROLÓGICO-->
                                            @include('general.secciones_ficha.comun_neuro_trauma_kine.neuro')
                                        </div>
                                        <div class="tab-pane fade show " id="torax" role="tabpanel" aria-labelledby="torax-tab">
                                            <div class="row">
                                                <!--    evaluacion torax y respiratoria->
                                                @include('general.secciones_ficha.comun_neuro_trauma_kine.torax')
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        <div class="tab-pane fade show" id="otra" role="tabpanel" aria-labelledby="otra-tab">
                                             <div class="card">
                                               <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="impresion_dg-tab" data-toggle="tab" href="#impresion_dg" role="tab" aria-controls="impresion_dg" aria-selected="true">Ananmnésis e impresión</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="eval_te_funcional-tab" data-toggle="tab" href="#eval_te_funcional" role="tab" aria-controls="eval_te_funcional" aria-selected="false">Evaluación Funcional</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="plan_te_terapia-tab" data-toggle="tab" href="#plan_te_terapia" role="tab" aria-control="plan_te_terapia" aria-selected="false">Plan terapéutico</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="ev-kine">
                                                                <!--POSTURA-->
                                                                <div class="tab-pane fade show active" id="impresion_dg" role="tabpanel" aria-labelledby="impresion_dg-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Percepción y conversación</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="imp_dg_convers" id="imp_dg_convers"></textarea>
                                                                            </div>
                                                                             <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">confiabilidad de los datos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="imp_dg_conf" id="imp_dg_conf"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Observaciones Generales</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="imp_dg_obs gen" id="imp_dg_obs gen"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--eval_te_funcional-->
                                                                <div class="tab-pane fade show" id="eval_te_funcional" role="tabpanel" aria-labelledby="eval_te_funcional-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link-aten text-reset active " id="func_te-tab" data-toggle="tab" href="#func_te" role="tab" aria-controls="func_te" aria-selected="false">Autovalencia</a>
                                                                                <a class="nav-link-aten text-reset" id="mot_fza_te-tab" data-toggle="tab" href="#mot_fza_te" role="tab" aria-controls="mot_fza_te" aria-selected="true">Motilidad y fuerza</a>
                                                                                <a class="nav-link-aten text-reset" id="func_resp_te-tab" data-toggle="tab" href="#func_resp_te" role="tab" aria-controls="func_resp_te" aria-selected="false">Función respiratoria</a>
                                                                                <a class="nav-link-aten text-reset" id="eval_cogn_te-tab" data-toggle="tab" href="#eval_cogn_te" role="tab" aria-controls="eval_cogn_te" aria-selected="false">Eval cognitiva</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="func_te" role="tabpanel" aria-labelledby="func_te-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="auto_val1" >autovalencia</label>
                                                                                                <select name="auto_val1" id="auto_val1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('auto_val1','div_detalle_auto_val1','aprec_auto_te',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normal</option>
                                                                                                    <option value="2">Alterada</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_auto_val1" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aprec_marcha_te">Obs. Autovalencia alterada</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_marcha_te" id="aprec_auto_te"></textarea>
                                                                                                <hr>
                                                                                                 <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 has-ripple" onclick="func_global();"><i class="feather icon-plus"></i>Evaluar reflejos</button>
                                                                                            </div>
                                                                                           
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="marcha_te">Marcha</label>
                                                                                                <select name="marcha_te" id="marcha_te" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('marcha_te','div_detalle_marcha_te','aprec_marcha_te',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Aceptable</option>
                                                                                                    <option value="2">Deficiente</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_marcha_te" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aprec_marcha_te">Obs. Marcha alterada</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_marcha_te" id="aprec_marcha_te"></textarea>
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                         <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="equilibrio_te" >Equilibrio</label>
                                                                                                <select name="equilibrio_te" id="equilibrio_te" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('equilibrio_te','div_detalle_equilibrio_te','aprec_equil_te',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normal</option>
                                                                                                    <option value="2">Alterado</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_equilibrio_te" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aprec_marcha_te">Obs. Equilibrio alterado</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_marcha_te" id="aprec_equil_te"></textarea>
                                                                                                <hr>
                                                                                                 <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 has-ripple" onclick="equilibrio();"><i class="feather icon-plus"></i>Evaluar equilibrio</button>
                                                                                            </div>
                                                                                           
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="refle_te">Reflejos</label>
                                                                                                <select name="refle_te" id="refle_te" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('refle_te','div_detalle_refle_te','aprec_refle_te',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Aceptable</option>
                                                                                                    <option value="2">Deficiente</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_refle_te" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aprec_refle_te">Obs. Reflejos alterados</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_refle_te" id="aprec_refle_te"></textarea>
                                                                                                <hr>
                                                                                                 <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 has-ripple" onclick="reflejos();"><i class="feather icon-plus"></i>Evaluar reflejos</button>
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade show" id="mot_fza_te" role="tabpanel" aria-labelledby="mot_fza_te-tab">
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
                                                                                                <label class="floating-label-activo-sm t-red" for="ex_cerv_insp">Inspección <i>(Describir)</i></label>
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
                                                                                                <label class="floating-label-activo-sm t-red" for="ex_cerv_palp">Palpación <i>(Describir)</i></label>
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
                                                                                <div class="tab-pane fade" id="func_resp_te" role="tabpanel" aria-labelledby="func_resp_te-tab">
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
                                                                                                <label class="floating-label-activo-sm t-red"  for="ex_dorso_lum_insp">Inspección <i>(Describir)</i></label>
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
                                                                                                <label class="floating-label-activo-sm t-red"  for="ex_dors_lumb_palp">Palpación <i>(Describir)</i></label>
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
                                                                                <div class="tab-pane fade" id="eval_cogn_te" role="tabpanel" aria-labelledby="eval_cogn_te-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="sacro_dol">Zonas dolorosas</label>
                                                                                                <select name="sacro_dol" id="sacro_dol"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sacro_dol','div_detalle_sacro_dol','detalle_sacro_dol',3)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">No</option>
                                                                                                    <option value="2">Si</option>
                                                                                                    <option value="3">Observaciones <i> (Describir)</i></option>
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
                                                                                                    <option value="3">Observaciones<i> (Describir)</i></option>
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
                                                                <div class="tab-pane fade show" id="eval_te_cognitiva" role="tabpanel" aria-labelledby="eval_te_cognitiva-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                            <h6 class="t-aten d-inline my-2">EXAMEN ARTICULAR</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-articulacion float-right"><i class="feather icon-plus"></i> Añadir Articulación</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="contenedor_grupo_articulacion">
                                                                        <div id="grupo_articulacion">
                                                                            <form>
                                                                                <div class="form-row">

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
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="obs_gen_artic" >Observaciones generales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gen_artic" id="obs_gen_artic"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--TENDONES PERIART-->
                                                                <div class="tab-pane fade show" id="plan_te_terapia" role="tabpanel" aria-labelledby="plan_te_terapia-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                            <h6 class="t-aten d-inline my-2">EXAMEN TENDONES Y TEJIDOS ARTICULARES</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-tendones float-right "><i class="feather icon-plus"></i> Añadir Otro Grupo</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="contenedor_grupo_tendones">
                                                                        <div id="grupo_tendones">
                                                                            <form>
                                                                                <div class="form-row">
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
                                                                            </form>
                                                                        </div>
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
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CONTROLES KINESIOLÓGICOS-->
                    <div class="tab-pane fade show" id="controles" role="tabpanel" aria-labelledby="controles-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                <h6 class="f-18 text-c-blue d-inline">Controles kinesiológicos</h6>
                                <h6 class="float-right d-inline text-c-blue f-14"><label id="f_cont_kine">FECHA CONTROL</label>
                                    <script>
                                    date = new Date().toLocaleDateString();
                                    document.write(date);
                                    </script>
                                </h6>
                            </div>
                        </div>
                        <!--SESIÓN-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                <h6 class="text-c-blue">SESIÓN</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm" for="cont_n_sesion">N° sesión</label>
                                                <input type="text" class="form-control form-control-sm" name="cont_n_sesion" id="cont_n_sesion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="cont_trabajo_en">Trabajo en</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="cont_trabajo_en" id="cont_trabajo_en"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="cont_colaboracion">Colaboración</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="cont_colaboracion" id="cont_colaboracion"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm" for="cont_obj">¿Se logra objetivo?</label>
                                                <select class="form-control form-control-sm" name="cont_obj" id="cont_obj">
                                                    <option value="1">Si</option>
                                                    <option value="2">No</option>
                                                    <option value="3">Parcialmente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--TRATAMIENTO-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 mt-2">
                                                <h6 class="float-left d-inline text-c-blue">TRATAMIENTO </h6>
                                                <button type="button" class="btn btn-info-light-c float-right d-inline btn-sm btn-agregar-tratamiento" ><i class="feather icon-plus"></i> Añadir tratamiento</button>
                                            </div>
                                        </div>
                                        <div id="contenedor_tratamiento">
                                            <div id="tratamiento">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label class="floating-label-activo-sm" for="tipo_trat">Tipo Tratamiento</label>
                                                            <select class="form-control form-control-sm" name="tipo_trat" id="tipo_trat">
                                                                <option value="1">Seleccione</option>
                                                                <option value="2">Crioterapia</option>
                                                                <option value="3">Galvanismo</option>
                                                                <option value="4">Hidroterapia</option>
                                                                <option value="5">Humidificación</option>
                                                                <option value="6">Infrarrojo</option>
                                                                <option value="7">Láser</option>
                                                                <option value="8">lontoferesis</option>
                                                                <option value="9">Magnetoterapia</option>
                                                                <option value="10">Nebulizadores comunes</option>
                                                                <option value="11">Nebulizadores ultrasónicos</option>
                                                                <option value="12">Onda corta</option>
                                                                <option value="13">Ultrasonoterapia</option>
                                                                <option value="14">Ultravioleta</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                            <label class="floating-label-activo-sm" for="r_comentario">Respuesta y comentarios de tratamiento</label>
                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="r_comentario" id="r_comentario"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--EXÁMENES-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                        	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                            	<h6 class="text-c-blue">EXÁMENES </h6>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            	<div class="dropdown">
            									  <button class="btn btn-primary-light-c btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            									    <i class="feather icon-plus"></i> Abrir fichas
            									  </button>
            									  <div class="dropdown-menu">
            									    <a class="dropdown-item" onclick="pares();">+ Pares craneanos</a>
            									    <a class="dropdown-item" onclick="postura_m();">+ Examen motor postura</a>
            									    <a class="dropdown-item" onclick="metria();">+ Metría</a>
            									    <a class="dropdown-item" onclick="fuerza_sup();">+ Examen fuerza extremidad superior</a>
            									    <a class="dropdown-item" onclick="fuerza_inf();">+ Examen fuerza extremidad inferior</a>
            									    <a class="dropdown-item" onclick="tono();">+ Examen Nervios Motores</a>
                                                    <a class="dropdown-item" onclick="reflejos();">+ Reflejos</a>
            									    <a class="dropdown-item" onclick="sensibilidad ();">+ Sensibilidad</a>
            									    <a class="dropdown-item" onclick="func_global();">+ Función global</a>
            									    <a class="dropdown-item" onclick="informekine();">+ Informe kinesiología</a>
            									  </div>
            									</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--GUARDAR-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-purple"><i class="feather icon-save"></i> Guardar control</button>
                            </div>
                        </div>
                     </div>
                    <!--HISTORICO DE CONTROLES KINESIOLÓGICOS-->
                    <div class="tab-pane fade show" id="historial-atencion" role="tabpanel" aria-labelledby="historial-atencion-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                <h6 class="f-18 text-c-blue mb-2">Histórico de controles</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div style="overflow-x:auto;">
                                                    <div class="table-responsive">
                                                        <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Fecha</th>
                                                                    <th class="align-middle">Sesion N°</th>
                                                                    <th class="align-middle">Sesiones Faltantes</th>
                                                                    <th class="align-middle">Trabajo en</th>
                                                                    <th class="align-middle">Objetivo Logrado?</th>
                                                                    <th class="align-middle">Técnicas</th>
                                                                    <th class="align-middle">Controles</th>
                                                                    <th class="align-middle">Documentos</th>
                                                                    <th class="align-middle">Informes Finales</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle">23/03/2020</td>
                                                                    <td class="align-middle">1</td>
                                                                    <td class="align-middle">9</td>
                                                                    <td class="align-middle">Hombro Der</td>
                                                                    <td class="align-middle">Si</td>
                                                                    <td class="align-middle">Ultrasonido</td>
                                                                    <td class="align-middle">
                                                                        <button class="btn btn-info-light btn-xxs"><i class="feather icon-file-text"></i> Ver control</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button class="btn btn-warning-light btn-xxs"><i class="feather icon-folder"></i> Ver archivo</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button class="btn btn-purple-light btn-xxs"><i class="feather icon-file-plus"></i> Ver informe</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center align-middle">30/03/2020</td>
                                                                    <td class="text-center align-middle">2</td>
                                                                    <td class="text-center align-middle">8</td>
                                                                    <td class="text-center align-middle">Hombro Der</td>
                                                                    <td class="text-center align-middle">Si</td>
                                                                    <td class="text-center align-middle">Ultrasonido</td>
                                                                    <td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-info-light btn-xxs"><i class="feather icon-file-text"></i> Ver control</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-warning-light btn-xxs"><i class="feather icon-folder"></i> Ver archivo</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-purple-light btn-xxs"><i class="feather icon-file-plus"></i> Ver informe</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
     /** cargar articulacion */
     function agregarArticulacion(){
        var html = '';
            html += '<div id="contenedor_grupo_articulacion">';
            html += '<div id="grupo_articulacion">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Articulación</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="art_nomb" id="art_nomb">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Dolor</label>';
            html += '         <select name="art_dolor" id="art_dolor" class="form-control form-control-sm">';
            html += '           <option selected  value="1">No</option>';
            html += '           <option value="2">Si</option>';
            html += '         <select>';
            html += '        </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Funcionalidad</label>';
            html += '                <select name="func_art" id="func_art" class="form-control form-control-sm">';
            html += '                  <option selected  value="1">Normal</option>';
            html += '                  <option value="2">Alterada</option>';
            html += '                <select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Deformaciones</label>';
            html += '               <select name="def_art" id="def_art" class="form-control form-control-sm">';
            html += '                   <option selected  value="1">No</option>';
            html += '                   <option value="2">Si</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       </div>';
            html += '       <div class="form-row">';
            html += '          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '              <div class="form-group">';
            html += '                  <label class="floating-label-activo-sm">Observaciones</label>';
            html += '                  <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_artic" id="obs_artic"  placeholder="COMENTARIOS DE ARTICULACIÓN O GRUPO EXAMINADO"></textarea>';
            html += '              </div>';
            html += '           </div>';
            html += '        </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_articulacion').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-articulacion').click(function(){
            agregarArticulacion()();
        });
    });
      /** cargar articulacion */
      function agregarTendones(){
        var html = '';
            html += '<div id="contenedor_grupo_tendones">';
            html += '<div id="grupo_tendones">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tendón</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="tend_nomb" id="tend_nomb">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Dolor</label>';
            html += '         <select name="tend_dolor" id="tend_dolor" class="form-control form-control-sm">';
            html += '           <option selected  value="1">No</option>';
            html += '           <option value="2">Si</option>';
            html += '         <select>';
            html += '        </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Funcionalidad</label>';
            html += '                <select name="func_tend" id="func_tend" class="form-control form-control-sm">';
            html += '                  <option selected  value="1">Normal</option>';
            html += '                  <option value="2">Alterada</option>';
            html += '                <select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Deformaciones</label>';
            html += '               <select name="def_tend" id="def_tend" class="form-control form-control-sm">';
            html += '                   <option selected  value="1">No</option>';
            html += '                   <option value="2">Si</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       </div>';
            html += '       <div class="form-row">';
            html += '          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '              <div class="form-group">';
            html += '                  <label class="floating-label-activo-sm">Observaciones</label>';
            html += '                  <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tend" id="obs_tend" placeholder="COMENTARIOS DE TENDÓN O GRUPO EXAMINADO"></textarea>';
            html += '              </div>';
            html += '           </div>';
            html += '        </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_tendones').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-tendones').click(function(){
            agregarTendones()();
        });
    });
</script>
@section('page-script-ficha-atencion')
<script>
    function cargarIgual(input)
    {
        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });
    }
          /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es opcional.');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);

            @if($fichas->count()>0)
                $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
            @else
                $('#mensaje_historias').html(' Primera consulta del paciente. ');
            @endif
                $('#mensaje_historias').show();
                setTimeout(function(){
                    $('#mensaje_historias').hide();
                }, 6000);
</script>
<script>

    function agregarTratamientoKine(){
       var html = '';
        html += '<div id="contenedor_tratamiento">';
        html += '<div id="tratamiento">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '<div class="form-group">';
        html += '<label class="floating-label-activo-sm">Tipo Tratamiento</label>';
        html += '<select class="form-control form-control-sm" name="kine_tto_tratamiento" id="kine_tto_tratamiento">';
        html += '<option value="1">Seleccione</option>';
        html += '<option value="2">Crioterapia</option>';
        html += '<option value="3">Galvanismo</option>';
        html += '<option value="4">Hidroterapia</option>';
        html += '<option value="5">Humidificación</option>';
        html += '<option value="6">Infrarrojo</option>';
        html += '<option value="7">Láser</option>';
        html += '<option value="8">lontoferesis</option>';
        html += '<option value="9">Magnetoterapia</option>';
        html += '<option value="10">Nebulizadores comunes</option>';
        html += '<option value="11">Nebulizadores ultrasónicos</option>';
        html += '<option value="12">Onda corta</option>';
        html += '<option value="13">Ultrasonoterapia</option>';
        html += '<option value="14">Ultravioleta</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">';
        html += '<div class="form-group">';
        html += '<label class="floating-label-activo-sm">Respuesta y comentarios de tratamiento</label>';
        html += '<textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="Kine_ttorespuesta_comentario" id="Kine_ttorespuesta_comentario"></textarea>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
       $('#contenedor_tratamiento').append(html);
   }
   $(document).ready(function(){
       $('.btn-agregar-tratamiento').click(function(){
        agregarTratamientoKine();
       });
   });
function examenes_kine() {
    $('#indicar_examen_kine').modal('show');
}
function evaluar_para_carga_detalle(select, div, input, valor)
{
    var valor_select = $('#'+select+'').val();
    if(valor_select == valor) $('#'+div+'').show();
    else {
        $('#'+div+'').hide();
        $('#'+input+'').val('');
    }
}
</script>
@endsection


