<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab" href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Atención General</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="atencion_fono-tab" data-toggle="tab" href="#atencion_fono" role="tab" aria-controls="atencion_fono" aria-selected="true">Atención Fonoaudiológica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="control-tab" data-toggle="tab" href="#control" role="tab" aria-controls="control" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="apoyo-tab" data-toggle="tab" href="#apoyo" role="tab" aria-controls="apoyo" aria-selected="false">Laminas y Material de Apoyo</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="fono-contenido">
                 <div class="tab-pane fade show active" id="atencion" role="tabpanel" aria-labelledby="atencion-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="col-md-12">
                            <br>
                            <div class="row">
                                <!--Formulario / Menor de edad-->
                                @include('atencion_otros_prof.generales.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                                <!--Motivo consulta-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="motivop">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivop_c" aria-expanded="false" aria-controls="motivop_c">
                                                Motivo de la consulta
                                            </button>
                                        </div>
                                        <div id="motivop_c" class="collapse" aria-labelledby="motivop" data-parent="#motivop">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label id="motivo_consulta" name="" class="floating-label-activo-sm">Tipo de Consulta</label>
                                                        <select class="form-control form-control-sm" name="" id="">
                                                            <option value="AL">Espontanea</option>
                                                            <option value="LA">Derivada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Derivado Por:</label>
                                                        <input type="text" class="form-control form-control-sm" name="deriv_por" id="deriv_por">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Diagn. de Ingreso:</label>
                                                        <input type="text" class="form-control form-control-sm" name="dg_ingreso" id="dg_ingreso">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Se Solicita:</label>
                                                        <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">N° de Sesiones:</label>
                                                        <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Otra:</label>
                                                        <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="antec_fam">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_fam_c" aria-expanded="false" aria-controls="antec_fam_c">
                                                Antecedentes Familiares de la Especialidad
                                            </button>
                                        </div>
                                        <div id="antec_fam_c" class="collapse" aria-labelledby="antec_fam" data-parent="#antec_fam">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Parámetros Paternos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Parámetros Maternos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="dg_plan_tto">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#dg_plan_tto_c" aria-expanded="false" aria-controls="dg_plan_tto_c">
                                                Diagnóstico y Plan de Tratamiento
                                            </button>
                                        </div>
                                        <div id="dg_plan_tto_c" class="collapse" aria-labelledby="dg_plan_tto" data-parent="#dg_plan_tto">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="cie-10" id="cie-10">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Plan de tratamiento</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success btn-block btn-sm " onclick="e_plan();"><i class="fa fa-plus"></i> Plan de Tratamiento</button>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">N° Sesiones</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Diagnóstico-->

                                <!--Medicamentos o Examen-->

                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="interfono();"><i class="fa fa-plus"></i> Indicar Interconsulta</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="examenes_fono();"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informefono();"><i class="fa fa-plus"></i> Enviar Informe</button>
                                </div>
                            </div>

                            <hr>
                            <!--Guardar o imprimir ficha-->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-success">Imprimir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                <div class="tab-pane fade" id="atencion_fono" role="tabpanel" aria-labelledby="atencion_fono-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="col-md-12">
                            <br>
                            <div class="row">
                                <!--RESPONSABLE-->
                                <!--Formulario / Menor de edad-->
                                @include('atencion_otros_prof.generales.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                                <!--Motivo consulta-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="motivop">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivop_c" aria-expanded="false" aria-controls="motivop_c">
                                                Motivo de la consulta
                                            </button>
                                        </div>
                                        <div id="motivop_c" class="collapse" aria-labelledby="motivop" data-parent="#motivop">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label id="motivo_consulta" name="" class="floating-label-activo-sm">Tipo de Consulta</label>
                                                        <select class="form-control form-control-sm" name="" id="">
                                                            <option value="AL">Espontanea</option>
                                                            <option value="LA">Derivada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Derivado Por:</label>
                                                        <input type="text" class="form-control form-control-sm" name="deriv_por" id="deriv_por">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Diagn. de Ingreso:</label>
                                                        <input type="text" class="form-control form-control-sm" name="dg_ingreso" id="dg_ingreso">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Se Solicita:</label>
                                                        <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">N° de Sesiones:</label>
                                                        <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Otra:</label>
                                                        <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--antec familiares-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="antec_fam">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_fam_c" aria-expanded="false" aria-controls="antec_fam_c">
                                                Antecedentes Familiares de la Especialidad
                                            </button>
                                        </div>
                                        <div id="antec_fam_c" class="collapse" aria-labelledby="antec_fam" data-parent="#antec_fam">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Parámetros Paternos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Parámetros Maternos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Habla  y lenguaje-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="eval_habla_leng">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#eval_habla_leng_c" aria-expanded="false" aria-controls="eval_habla_leng_c">
                                                Evaluación Habla y Lenguaje
                                            </button>
                                        </div>
                                        <div id="eval_habla_leng_c" class="collapse" aria-labelledby="eval_habla_leng" data-parent="#eval_habla_leng">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Evaluación OFA</h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="LA">Alterada</option>
                                                                    <option value="LA">Muy alterada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="est_ofa();"><i class="fa fa-plus"></i>Evaluación OFA</button>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Praxias</h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="LA">Alterada</option>
                                                                    <option value="LA">Muy alterada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="e_praxias();"><i class="fa fa-plus"></i>Praxias</button>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">H. Prearticultorias</h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="LA">Alterada</option>
                                                                    <option value="LA">Muy alterada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="habla();"><i class="fa fa-plus"></i> Hab. Pre-art.</button>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Respiración</h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="CS">•	Costal Superior</option>
                                                                    <option value="CD">•	Costo-Diafragmática</option>
                                                                    <option value="AB">•	Abdominal</option>
                                                                </select>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Modo</label>
                                                        <div class="form-group fill">
                                                            <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                                                <option value="NO">•	Normal</option>
                                                                <option value="NA">•	Nasal</option>
                                                                <option value="BU">•	Bucal</option>
                                                                <option value="MI">•	Mixta</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Coordinación</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">• No Realizada</option>
                                                                    <option value="LA">• Alterada</option>
                                                                    <option value="LA">• Muy alterada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Apreciación Audición</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="CS">•	Hipoacusia</option>
                                                                    <option value="CD">•	Dudosa</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Comprensión Lenguaje</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="DE">•	Deficiente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Lenguaje/ Edad</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="DE">•	Deficiente</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Dislalias</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="SI">•	Si</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 ">
                                                            <h6 class="form_fono">Disartrias</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="SI">•	Si</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Comunicación</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="CS">•	Deficiente</option>
                                                                    <option value="CD">•	Dudosa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Comentario de la Evaluación</label>
                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--comunicacion-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="eval_comunicacion">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#eval_comunicacion_c" aria-expanded="false" aria-controls="eval_comunicacion_c">
                                                Evaluación Comunicación
                                            </button>
                                        </div>
                                        <div id="eval_comunicacion_c" class="collapse" aria-labelledby="eval_comunicacion" data-parent="#eval_comunicacion">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Conciencia</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">• No Examinada</option>
                                                                    <option value="N">•	Lúcido</option>
                                                                    <option value="CS">•	Obnubilado</option>
                                                                    <option value="CD">•	Desorientado</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Orientación</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Orientado en Tpo y Espacio</option>
                                                                    <option value="DE">•	Perdido</option>
                                                                    <option value="DE">•	Dudosa</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Comportamiento</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Coherente</option>
                                                                    <option value="DE">•	Incoherente</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Colaboración</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="SI">•	Si</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Comentario de la Evaluación</label>
                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Diagnóstico-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="dg_plan_tto">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#dg_plan_tto_c" aria-expanded="false" aria-controls="dg_plan_tto_c">
                                                Diagnóstico y Plan de Tratamiento
                                            </button>
                                        </div>
                                        <div id="dg_plan_tto_c" class="collapse" aria-labelledby="dg_plan_tto" data-parent="#dg_plan_tto">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="cie-10" id="cie-10">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Plan de tratamiento</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success btn-block btn-sm " onclick="e_plan();"><i class="fa fa-plus"></i> Plan de Tratamiento</button>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">N° Sesiones</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Examen Informes-->

                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="interfono();"><i class="fa fa-plus"></i> Indicar Interconsulta</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="examenes_fono();"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informefono();"><i class="fa fa-plus"></i> Enviar Informe</button>
                                </div>
                            </div>

                            <hr>
                            <!--Guardar o imprimir ficha-->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-success">Imprimir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                <!--CONTROLES ATENCIÓN -->
                <div class="tab-pane fade" id="control" role="tabpanel" aria-labelledby="control-tab">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="form_fono d-inline">CONTROLES FONOAUDIOLÓGICOS</h6>
                            </div>
                            <div class="card-body shadow-none" id="form_0_fono">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">

                                            <div> <label class="form_fono">Fecha Control   </label>
                                                <script>
                                                date = new Date().toLocaleDateString();
                                                document.write(date);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Sesión N°</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Trabajo en :</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Colaboración</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="form-group fill">
                                                <label id="" name="" class="floating-label-activo-sm">Objetivo Logrado ?</label>
                                                <select class="form-control form-control-sm" name="" id="">
                                                    <option value="AL">SI</option>
                                                    <option value="LA">NO</option>
                                                    <option value="LA">PARCIALMENTE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Comentario de la Sesión</label>
                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="est_ofa();"><i class="fa fa-plus"></i> OFA</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="est_hpa();"><i class="fa fa-plus"></i> Habilidades Prearticulatorias</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="habla();"><i class="fa fa-plus"></i> Habla y Lenguaje
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="e_voz();"><i class="fa fa-plus"></i> VOZ</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="e_espasmo();"><i class="fa fa-plus"></i> Espasmofémia</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="l_praxias() ;"><i class="fa fa-plus"></i> Laminas Praxias</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="l_ling() ;"><i class="fa fa-plus"></i> Test de Ling</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="tede();"><i class="fa fa-plus"></i> Test TEDE</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="pragma();"><i class="fa fa-plus"></i> Habilidades Pragmáticas</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informefono();"><i class="fa fa-plus"></i> Informe Fonoaudiología</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE: CONTROLES ATENCIÓN-->
                <!--MATERIAL DE APOYO-->
                <div class="tab-pane fade" id="apoyo" role="tabpanel" aria-labelledby="apoyo-tab">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="float-left d-inline">MATERIAL DE APOYO</h6>
                            </div>
                            <div class="card-body shadow-none" id="form_0_orl">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="est_ofa();"><i class="fa fa-plus"></i> Eval OFA</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="habla();"><i class="fa fa-plus"></i> Habla y Lenguaje
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="e_voz();"><i class="fa fa-plus"></i> VOZ</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="e_espasmo();"><i class="fa fa-plus"></i> Espasmofémia</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="l_praxias() ;"><i class="fa fa-plus"></i> Laminas Praxias</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="l_ling() ;"><i class="fa fa-plus"></i> Test de Ling</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="tede_l();"><i class="fa fa-plus"></i> Test TEDE Simple</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="tede();"><i class="fa fa-plus"></i> Test TEDE Complejo</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="sopa_l();"><i class="fa fa-plus"></i> SOPA DE LETRAS</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="fon_r();"><i class="fa fa-plus"></i> FONEMA R</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="fon_p();"><i class="fa fa-plus"></i> FONEMA P</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informe();"><i class="fa fa-plus"></i> Informe Fonoaudiología</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE:MATERIAL DE APOYO-->
            </div>
        </div>
    </div>
</div>

@section('page-script-ficha-atencion')
<script>
$(document).ready(function() {
    $('#select_1').select2();
    $('#select_2').select2();
    $('#select_3').select2();
    $('#select_4').select2();
    $('#select_5').select2();
    $('#select_6').select2();
    $('#select_7').select2();
    $('#select_8').select2();
    $('#select_9').select2();
    $('#select_10').select2();
    $('#select_11').select2();
    $('#select_12').select2();
    $('#select_13').select2();
    $('#select_14').select2();
    $('#select_15').select2();
});
 /** fonoaudiologia **/
 function interfono() {
    $('#modal_interfono').modal('show');
}
function informefono() {
    $('#informe_fono').modal('show');
}
function examenes_fono() {
    $('#indicar_examen_fono').modal('show');
}
function est_ofa(){
    $('#est_ofa').modal('show');
}
function est_hpa() {
    $('#est_habpreart').modal('show');
}
function habla() {
    $('#m_habla').modal('show');
}
function e_plan() {
    $('#plan').modal('show');
}
function e_praxias() {
    $('#praxias').modal('show');
}
function e_voz() {
    $('#m_voz').modal('show');
}
function e_espasmo() {
    $('#m_eval_espasmof').modal('show');
}
function l_praxias() {
    $('#modal_lam_praxias').modal('show');
}
function l_ling() {
    $('#modal_lam_ling').modal('show');
}
function tede() {
    $('#modal_tede').modal('show');
}
function tede_1() {
    $('#tede_1').modal('show');
}
function pragma() {
    $('#h_pragmati').modal('show');
}
function fon_r() {
    $('#fonema_r').modal('show');
}
function fon_p() {
    $('#fonema_p').modal('show');
}
function sopa_l() {
    $('#sopa').modal('show');
}
function tede_l() {
    $('#tede_1').modal('show');
}


</script>
@endsection





